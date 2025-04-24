<?php

namespace horstoeko\invoicesuite\utils;

use Composer\Autoload\ClassLoader;
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
    protected function init(): InvoiceSuiteClassFinder
    {
        $classMaps = array_values(ClassLoader::getRegisteredLoaders())[0]->getClassMap();

        foreach ($classMaps as $className => $classFile) {
            $this->classNames[] = $className;
        }

        return $this;
    }

    /**
     * Returns an array of all classes which are a subclass of $subClassOf
     *
     * @param string $isSubClassOf
     * @return array<string>
     */
    public function getClassesWhenItsSubClassOf(string $isSubClassOf): array
    {
        $classes = [];

        foreach ($this->classNames as $className) {
            $previousErrorReportingState = error_reporting();
            error_reporting(E_ALL & ~E_DEPRECATED);
            try {
                if (is_subclass_of($className, $isSubClassOf)) {
                    $classes[] = $className;
                }
            } catch (\Throwable $ex) {
                // Do nothing
            } finally {
                error_reporting($previousErrorReportingState);
            }
        }

        return $classes;
    }
}
