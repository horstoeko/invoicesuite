<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\utils;

use Composer\Autoload\ClassLoader;
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
     * @phpstan-var static|null
     */
    protected static $invoiceSuiteClassFinder;

    /**
     * Classes
     *
     * @var array<int,string>
     */
    private $classNames = [];

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

        return $this;
    }

    /**
     * Load classes
     *
     * @return static
     */
    public function init(): static
    {
        $classMaps = array_values(ClassLoader::getRegisteredLoaders())[0]->getClassMap();

        foreach (array_keys($classMaps) as $className) {
            $this->classNames[] = $className;
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
    public function getClassesWhenItsSubClassOf(string $isSubClassOf, bool $disableCache = false): array
    {
        if (!$disableCache) {
            $cacheFilename = md5((string) preg_replace('/[^a-zA-Z0-9]/', '', sprintf('invoicesuite-cf-%s', $isSubClassOf))).'.cache';
            $cacheFilepath = InvoiceSuitePathUtils::combineAllPaths(__DIR__, '..', 'cache');
            $cacheFilenameFq = InvoiceSuitePathUtils::combinePathWithFile($cacheFilepath, $cacheFilename);

            if (file_exists($cacheFilenameFq)) {
                $cacheFilenameContent = file_get_contents($cacheFilenameFq);

                if ($cacheFilenameContent !== false) {
                    $cacheFilenameContentUnserialized = unserialize($cacheFilenameContent);

                    if (is_array($cacheFilenameContentUnserialized)) {
                        return $cacheFilenameContentUnserialized;
                    }
                }
            }
        }

        $classes = [];

        foreach ($this->classNames as $className) {
            $previousErrorReportingState = error_reporting();
            error_reporting(E_ALL & ~E_DEPRECATED);

            try {
                if (is_subclass_of($className, $isSubClassOf)) {
                    $classes[] = $className;
                }
                // @phpstan-ignore catch.neverThrown
            } catch (Throwable $e) {
                // Nothing here
            } finally {
                error_reporting($previousErrorReportingState);
            }
        }

        if (!$disableCache) {
            @mkdir(directory: $cacheFilepath, recursive: true);
            file_put_contents($cacheFilenameFq, serialize($classes));
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
        $files = glob(__DIR__.'/../cache/*.cache');

        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }

        $files = glob(__DIR__.'/../cache/jms/**/*.*', GLOB_BRACE);

        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }
    }
}
