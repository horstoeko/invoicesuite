<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\utils;

use Composer\Autoload\ClassLoader;
use horstoeko\invoicesuite\InvoiceSuiteSettings;
use Throwable;

/**
 * class representing tools for classes finding
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteClassFinder
{
    /**
     * Instance
     *
     * @var null|static
     *
     * @phpstan-var null|static
     */
    protected static $invoiceSuiteClassFinder;

    /**
     * Classes
     *
     * @var array<int,string>
     */
    private $classNames = [];

    /**
     * In-memory cache for subclass lookups
     *
     * @var array<string,array<int,string>>
     */
    private $subClassNames = [];

    /**
     * Constructor (Hidden)
     */
    final protected function __construct()
    {
        $this->init();
    }

    /**
     * Create a new instance of InvoiceSuiteClassFinder if needed
     *
     * @return static
     */
    public static function factory(): static
    {
        static::$invoiceSuiteClassFinder ??= new static();

        return static::$invoiceSuiteClassFinder;
    }

    /**
     * Clear
     *
     * @return static
     */
    public function clear(): static
    {
        $this->classNames = [];
        $this->subClassNames = [];

        return $this;
    }

    /**
     * Load classes
     *
     * @return static
     */
    public function init(): static
    {
        $this->clear();

        foreach (ClassLoader::getRegisteredLoaders() as $loader) {
            $this->classNames = InvoiceSuiteArrayUtils::merge($this->classNames, InvoiceSuiteArrayUtils::keys($loader->getClassMap()));
        }

        return $this;
    }

    /**
     * Returns an array of all classes which are a subclass of $subClassOf. When $discoveryNamespaces
     * is not empty, only classes belonging to one of these namespaces are considered, which avoids
     * autoloading (and thus loading into memory) every other class known to the composer classloader
     *
     * @param  string        $isSubClassOf
     * @param  bool          $disableCache
     * @return array<string>
     */
    public function getClassesWhenItsSubClassOf(
        string $isSubClassOf,
        bool $disableCache = false
    ): array {
        $discoveryNamespaces = self::getDiscoveryNamespaces();
        $cacheKey = self::buildCacheKey($isSubClassOf, $discoveryNamespaces);

        if (!$disableCache && InvoiceSuiteArrayUtils::keyExists($this->subClassNames, $cacheKey)) {
            return $this->subClassNames[$cacheKey];
        }

        $cacheFilename = InvoiceSuiteStringUtils::md5((string) preg_replace('/[^a-zA-Z0-9]/', '', InvoiceSuiteStringUtils::sprintf('invoicesuite-cf-%s', $cacheKey))) . '.cache';
        $cacheFilepath = InvoiceSuitePathUtils::combineAllPaths(__DIR__, '..', 'cache');
        $cacheFilenameFq = InvoiceSuitePathUtils::combinePathWithFile($cacheFilepath, $cacheFilename);

        if (!$disableCache && InvoiceSuiteFileUtils::isReadableFile($cacheFilenameFq)) {
            $cached = @require $cacheFilenameFq;

            if (InvoiceSuiteArrayUtils::is($cached)) {
                $this->subClassNames[$cacheKey] = $cached;

                return $cached;
            }
        }

        $classNamesToScan = InvoiceSuiteArrayUtils::empty($discoveryNamespaces)
            ? $this->classNames
            : InvoiceSuiteArrayUtils::filter(
                $this->classNames,
                static function (string $className) use ($discoveryNamespaces): bool {
                    foreach ($discoveryNamespaces as $discoveryNamespace) {
                        if (InvoiceSuiteStringUtils::startsWith($className, $discoveryNamespace . '\\')) {
                            return true;
                        }
                    }

                    return false;
                }
            );

        $classes = [];

        $previousErrorReportingState = error_reporting();
        error_reporting(E_ALL & ~E_DEPRECATED);

        try {
            foreach ($classNamesToScan as $className) {
                try {
                    if (is_subclass_of($className, $isSubClassOf)) {
                        $classes[] = $className;
                    }

                    // @phpstan-ignore catch.neverThrown
                } catch (Throwable) {
                }
            }
        } finally {
            error_reporting($previousErrorReportingState);
        }

        if (!$disableCache) {
            @mkdir(directory: $cacheFilepath, recursive: true);

            $cacheFilePhpCode = "<?php\ndeclare(strict_types=1);\nreturn " . var_export(InvoiceSuiteArrayUtils::values($classes), true) . ";\n";

            InvoiceSuiteFileUtils::putContentToFile($cacheFilenameFq, $cacheFilePhpCode);
        }

        return $classes;
    }

    /**
     * Composer helper for clearing cache
     *
     * @return void
     */
    public static function clearCache(): void
    {
        $files = glob(__DIR__ . '/../cache/*.cache');

        foreach ($files as $file) {
            if (InvoiceSuiteFileUtils::isReadableFile($file)) {
                unlink($file);
            }
        }

        $files = glob(__DIR__ . '/../cache/jms/**/*.*', GLOB_BRACE);

        foreach ($files as $file) {
            if (InvoiceSuiteFileUtils::isReadableFile($file)) {
                unlink($file);
            }
        }
    }

    /**
     * Normalize and return the list of discovery namespaces so that equivalent but differently
     * ordered/formatted lists resolve to the exact same cache key:
     *  - trim trailing separators
     *  - drop empties
     *  - deduplicate
     *  - sort
     *
     * @return array<int,string>
     */
    private static function getDiscoveryNamespaces(): array
    {
        $discoveryNamespaces = InvoiceSuiteSettings::getDiscoveryNamespaces();

        $normalized = InvoiceSuiteArrayUtils::map(
            static fn (string $discoveryNamespace): string => InvoiceSuiteStringUtils::trim($discoveryNamespace, '\\'),
            $discoveryNamespaces
        );

        $normalized = InvoiceSuiteArrayUtils::filter(
            $normalized,
            static fn (string $discoveryNamespace): bool => '' !== $discoveryNamespace
        );

        $normalized = array_values(array_unique($normalized));

        sort($normalized);

        return $normalized;
    }

    /**
     * Build a cache key to include $discoveryNamespaces if specified. Empty list should keep the same value.
     * The list of namespaces should be normalized to ensure same key is generated.
     *
     * @param  string            $isSubClassOf
     * @param  array<int,string> $discoveryNamespaces
     * @return string
     */
    private static function buildCacheKey(string $isSubClassOf, array $discoveryNamespaces): string
    {
        if (InvoiceSuiteArrayUtils::empty($discoveryNamespaces)) {
            return $isSubClassOf;
        }

        return $isSubClassOf . '|' . implode(',', $discoveryNamespaces);
    }
}
