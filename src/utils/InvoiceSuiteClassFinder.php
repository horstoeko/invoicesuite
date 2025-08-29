<?php

namespace horstoeko\invoicesuite\utils;

use Composer\Autoload\ClassLoader;
use horstoeko\stringmanagement\PathUtils;
use Throwable;

/**
 * class representing tools for classes finding
 *
 * @category InvoiceSuite
 * @package  InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteClassFinder
{
    /**
     * Instance
     *
     * @var InvoiceSuiteClassFinder
     */
    protected static $invoiceSuiteClassFinder;

    /**
     * Classes
     *
     * @var array<int,string>
     */
    private $classNames = [];

    /**
     * Create a new instance of InvoiceSuiteClassFinder if needed
     *
     * @return InvoiceSuiteClassFinder
     */
    public static function factory(): InvoiceSuiteClassFinder
    {
        if (is_null(static::$invoiceSuiteClassFinder)) {
            static::$invoiceSuiteClassFinder = new static();
        }

        return static::$invoiceSuiteClassFinder;
    }

    /**
     * Constructor (Hidden)
     */
    final protected function __construct()
    {
        $this->init();
    }

    /**
     * Clear
     *
     * @return InvoiceSuiteClassFinder
     */
    public function clear(): InvoiceSuiteClassFinder
    {
        $this->classNames = [];

        return $this;
    }

    /**
     * Load classes
     *
     * @return InvoiceSuiteClassFinder
     */
    public function init(): InvoiceSuiteClassFinder
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
     * @param string $isSubClassOf
     * @param boolean $disableCache
     * @return array<string>
     */
    public function getClassesWhenItsSubClassOf(string $isSubClassOf, bool $disableCache = false): array
    {
        if (!$disableCache) {
            $cacheFilename = md5(preg_replace("/[^a-zA-Z0-9]/", "", sprintf("invoicesuite-cf-%s", $isSubClassOf))) . ".cache";
            $cacheFilepath = PathUtils::combineAllPaths(__DIR__, "..", "cache");
            $cacheFilenameFq = PathUtils::combinePathWithFile($cacheFilepath, $cacheFilename);

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
            } catch (\Throwable) {
                // Do nothing
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
        $files = glob(__DIR__ . '/../cache/*.cache');

        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
                echo "Deleted: " . basename($file) . PHP_EOL;
            }
        }
    }
}
