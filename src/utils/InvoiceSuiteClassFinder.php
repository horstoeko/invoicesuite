<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\utils;

use Composer\Autoload\ClassLoader;
use Symfony\Component\Finder\Finder;
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
        if (is_null(static::$invoiceSuiteClassFinder)) {
            static::$invoiceSuiteClassFinder = new static();
        }

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

        foreach (ClassLoader::getRegisteredLoaders() as $vendorDirectory => $loader) {
            $this->classNames = InvoiceSuiteArrayUtils::merge($this->classNames, InvoiceSuiteArrayUtils::keys($loader->getClassMap()));

            $vendorDirectory = realpath($vendorDirectory);

            foreach ($loader->getPrefixesPsr4() as $namespacePrefix => $sourceDirectories) {
                foreach ($sourceDirectories as $sourceDirectory) {
                    $sourceDirectory = realpath($sourceDirectory);

                    if (false === $sourceDirectory) {
                        continue;
                    }

                    if ($sourceDirectory === $vendorDirectory) {
                        continue;
                    }

                    if (InvoiceSuiteStringUtils::startsWith($sourceDirectory, $vendorDirectory . DIRECTORY_SEPARATOR)) {
                        continue;
                    }

                    if (InvoiceSuiteStringUtils::startsWith(__DIR__, $sourceDirectory . DIRECTORY_SEPARATOR)) {
                        continue;
                    }

                    try {
                        foreach (Finder::create()->files()->name('*.php')->in($sourceDirectory) as $sourceFile) {
                            $relativeFilename = InvoiceSuiteStringUtils::substring($sourceFile->getRelativePathname(), 0, -4);
                            $className = $namespacePrefix . InvoiceSuiteStringUtils::replace(['/', '\\'], '\\', $relativeFilename);

                            if (!InvoiceSuiteArrayUtils::arrayContains($this->classNames, $className) && class_exists($className)) {
                                $this->classNames[] = $className;
                            }
                        }
                    } catch (Throwable) {
                    }
                }
            }
        }

        return $this;
    }

    /**
     * Returns an array of all classes which are a subclass of $subClassOf
     *
     * @param  string        $isSubClassOf
     * @param  bool          $disableCache
     * @return array<string>
     */
    public function getClassesWhenItsSubClassOf(
        string $isSubClassOf,
        bool $disableCache = false
    ): array {
        if (!$disableCache && InvoiceSuiteArrayUtils::keyExists($this->subClassNames, $isSubClassOf)) {
            return $this->subClassNames[$isSubClassOf];
        }

        $cacheFilename = InvoiceSuiteStringUtils::md5((string) preg_replace('/[^a-zA-Z0-9]/', '', InvoiceSuiteStringUtils::sprintf('invoicesuite-cf-%s', $isSubClassOf))) . '.cache';
        $cacheFilepath = InvoiceSuitePathUtils::combineAllPaths(__DIR__, '..', 'cache');
        $cacheFilenameFq = InvoiceSuitePathUtils::combinePathWithFile($cacheFilepath, $cacheFilename);

        if (!$disableCache && InvoiceSuiteFileUtils::isReadableFile($cacheFilenameFq)) {
            $cached = @require $cacheFilenameFq;

            if (InvoiceSuiteArrayUtils::is($cached)) {
                $this->subClassNames[$isSubClassOf] = $cached;

                return $cached;
            }
        }

        $classes = [];

        $previousErrorReportingState = error_reporting();
        error_reporting(E_ALL & ~E_DEPRECATED);

        try {
            foreach ($this->classNames as $className) {
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
}
