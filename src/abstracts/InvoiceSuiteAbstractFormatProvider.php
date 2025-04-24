<?php

namespace horstoeko\invoicesuite\abstracts;

use Closure;

/**
 * Class representing methods for a provider definition
 *
 * @category InvoiceSuite
 * @package  InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/invoicesuite
 */
abstract class InvoiceSuiteAbstractFormatProvider
{
    /**
     * The instance of the internal reader class
     *
     * @var InvoiceSuiteAbstractFormatProviderReader
     */
    public $readerInstance;

    /**
     * The intance of the internal builder class
     *
     * @var InvoiceSuiteAbstractFormatProviderBuilder
     */
    public $builderInstance;

    /**
     * Get the unique identificator for this provider
     *
     * @return string
     */
    abstract public function getUniqueId(): string;

    /**
     * Get a short description for the provider
     *
     * @return string
     */
    abstract public function getDescription(): string;

    /**
     * Get meta data directories
     *
     * @return array<string,string>
     */
    abstract public function getMetadataDirectories(): array;

    /**
     * Get custom handlers
     *
     * @return array<integer,string>
     */
    abstract public function getHandlers(): array;

    /**
     * Get custom listeners
     *
     * @return array<string,Closure>
     */
    abstract public function getListeners(): array;

    /**
     * Get event subscribers
     *
     * @return array<integer,string>
     */
    abstract public function getSubscribers(): array;

    /**
     * Get context groups
     *
     * @return array<string>
     */
    abstract public function getGroups(): array;

    /**
     * Returns true if the content matches the requirements for this format provider, otherwise false
     *
     * @param string $content
     * @return boolean
     */
    abstract public function isSatisfiableBy(string $content): bool;

    /**
     * Returns the classname of the root invoice-object
     *
     * @return string
     */
    abstract public function getRootClassName(): string;

    /**
     * Returns the reader classname for this format provider
     *
     * @return string
     */
    abstract public function getReaderClassName(): string;

    /**
     * Returns the builder classname for this format provider
     *
     * @return string
     */
    abstract public function getBuilderClassName(): string;

    /**
     * Create a new reader instance
     *
     * @return InvoiceSuiteAbstractFormatProvider
     */
    public function initReader(): InvoiceSuiteAbstractFormatProvider
    {
        $this->readerInstance = new ($this->getReaderClassName())($this);

        return $this;
    }

    /**
     * Returns the reader for this format provider
     *
     * @return InvoiceSuiteAbstractFormatProviderReader
     */
    public function getReader(): InvoiceSuiteAbstractFormatProviderReader
    {
        return $this->readerInstance;
    }

    /**
     * Create a new builder instance
     *
     * @return InvoiceSuiteAbstractFormatProvider
     */
    public function initBuilder(): InvoiceSuiteAbstractFormatProvider
    {
        $this->builderInstance = new ($this->getBuilderClassName())($this);

        return $this;
    }

    /**
     * Returns the builder for this format provider
     *
     * @return InvoiceSuiteAbstractFormatProviderBuilder
     */
    public function getBuilder(): InvoiceSuiteAbstractFormatProviderBuilder
    {
        return $this->builderInstance;
    }
}
