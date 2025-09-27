<?php

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\abstracts;

use Closure;

/**
 * Class representing methods for a document format provider definition
 *
 * @category InvoiceSuite
 * @package  InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/invoicesuite
 */
abstract class InvoiceSuiteAbstractDocumentFormatProvider
{
    /**
     * The instance of the internal reader class
     *
     * @var InvoiceSuiteAbstractDocumentFormatReader
     */
    public $readerInstance;

    /**
     * The intance of the internal builder class
     *
     * @var InvoiceSuiteAbstractDocumentFormatBuilder
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
     * Get parameters
     *
     * @return array<string,mixed>
     */
    abstract public function getParameters(): array;

    /**
     * Get meta data directories
     *
     * @return array<string,string>
     */
    abstract public function getSerializerMetadataDirectories(): array;

    /**
     * Get custom handlers
     *
     * @return array<integer,string>
     */
    abstract public function getSerializerHandlers(): array;

    /**
     * Get custom listeners
     *
     * @return array<string,Closure>
     */
    abstract public function getSerializerListeners(): array;

    /**
     * Get event subscribers
     *
     * @return array<integer,string>
     */
    abstract public function getSerializerSubscribers(): array;

    /**
     * Get context groups
     *
     * @return array<string>
     */
    abstract public function getSerializerGroups(): array;

    /**
     * Returns true if the content matches the requirements for this format provider, otherwise false
     *
     * @param  string $serializedContent
     * @return boolean
     */
    abstract public function isSatisfiableBySerializedContent(string $serializedContent): bool;

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
     * @return InvoiceSuiteAbstractDocumentFormatProvider
     */
    public function initReader(): InvoiceSuiteAbstractDocumentFormatProvider
    {
        $this->readerInstance = new ($this->getReaderClassName())($this);

        return $this;
    }

    /**
     * Returns the reader for this format provider
     *
     * @return InvoiceSuiteAbstractDocumentFormatReader
     */
    public function getReader(): InvoiceSuiteAbstractDocumentFormatReader
    {
        return $this->readerInstance;
    }

    /**
     * Create a new builder instance
     *
     * @return InvoiceSuiteAbstractDocumentFormatProvider
     */
    public function initBuilder(): InvoiceSuiteAbstractDocumentFormatProvider
    {
        $this->builderInstance = new ($this->getBuilderClassName())($this);

        return $this;
    }

    /**
     * Returns the builder for this format provider
     *
     * @return InvoiceSuiteAbstractDocumentFormatBuilder
     */
    public function getBuilder(): InvoiceSuiteAbstractDocumentFormatBuilder
    {
        return $this->builderInstance;
    }

    /**
     * Returns true if the given group is supported by SerializerGroups
     *
     * @param string $group
     * @return boolean
     */
    public function hasSerializerGroup(string $group): bool
    {
        return in_array($group, $this->getSerializerGroups());
    }

    /**
     * Returns true if a parameter exists for the requested format provider
     *
     * @param string $parameterName
     * @return boolean
     */
    public function hasFormatProviderParameter(string $parameterName): bool
    {
        return array_key_exists($parameterName, $this->getParameters());
    }

    /**
     * Returns the parameter value for the request parameter for the requested format provider
     *
     * @param string $parameterName
     * @param mixed $defaultValue
     * @return mixed
     */
    public function getFormatProviderParameterValue(string $parameterName, $defaultValue)
    {
        if (!$this->hasFormatProviderParameter($parameterName)) {
            return $defaultValue;
        }

        return $this->getParameters()[$parameterName];
    }
}
