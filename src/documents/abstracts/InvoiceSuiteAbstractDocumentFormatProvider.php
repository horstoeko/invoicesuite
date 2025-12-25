<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\documents\abstracts;

use Closure;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteUnknownProviderParameterException;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;

/**
 * Class representing methods for a document format provider definition
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
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
     * @return array<int,string>
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
     * @return array<int,string>
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
     * @return bool
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
     * Returns true if PDF support is available
     *
     * @return bool
     */
    abstract public function isPdfSupportAvailable(): bool;

    /**
     * Returns a list of valid PDF attachment filenames
     *
     * @return array<string>
     */
    abstract public function getAllowedPdfAttachmentFilenames(): array;

    /**
     * Get the default PDF attachment filename
     *
     * @return string
     */
    abstract public function getDefaultPdfAttachmentFilename(): string;

    /**
     * Returns the PDF constructor classname for this format provider
     *
     * @return string
     */
    abstract public function getPdfConstructorClassName(): string;

    /**
     * Create a new reader instance
     *
     * @return static
     */
    public function initReader(): static
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
        if (is_null($this->readerInstance)) {
            $this->initReader();
        }

        return $this->readerInstance;
    }

    /**
     * Create a new builder instance
     *
     * @return static
     */
    public function initBuilder(): static
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
        if (is_null($this->builderInstance)) {
            $this->initBuilder();
        }

        return $this->builderInstance;
    }

    /**
     * Returns true if the given group is supported by SerializerGroups
     *
     * @param  string $group
     * @return bool
     */
    public function hasSerializerGroup(string $group): bool
    {
        return in_array($group, $this->getSerializerGroups());
    }

    /**
     * Returns true if a parameter exists for the requested format provider
     *
     * @param  string $parameterName
     * @return bool
     */
    public function hasFormatProviderParameter(string $parameterName): bool
    {
        return array_key_exists($parameterName, $this->getParameters());
    }

    /**
     * Returns the parameter value for the requested parameter
     *
     * @param  string $parameterName
     * @param  mixed  $defaultValue
     * @return mixed
     */
    public function getFormatProviderParameterValue(string $parameterName, $defaultValue)
    {
        if (!$this->hasFormatProviderParameter($parameterName)) {
            return $defaultValue;
        }

        return $this->getParameters()[$parameterName];
    }

    /**
     * Returns the parameter value for the requested parameter. If the parameter does not exist an
     * InvoiceSuiteUnknownProviderParameterException is thrown
     *
     * @param  string $parameterName
     * @return mixed
     */
    public function getFormatProviderRequiredParameterValue(string $parameterName)
    {
        if (!$this->hasFormatProviderParameter($parameterName)) {
            throw new InvoiceSuiteUnknownProviderParameterException($parameterName);
        }

        return $this->getParameters()[$parameterName];
    }

    /**
     * Returns true if the given filename is a valid PDF attachment filename
     *
     * @param  string $filename
     * @return bool
     */
    public function isValidPdfAttachmentFilename(string $filename): bool
    {
        return InvoiceSuiteArrayUtils::inArrayNoCase($this->getAllowedPdfAttachmentFilenames(), $filename);
    }
}
