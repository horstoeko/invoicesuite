<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\zugferd;

use horstoeko\invoicesuite\exceptions\InvoiceSuiteFormatProviderNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteInvalidArgumentException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteValidationContentNotSpecifiedException;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteMessageBagItem;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use horstoeko\invoicesuite\validators\InvoiceSuiteDocuflairDocumentValidator;
use JMS\Serializer\Exception\RuntimeException as JMSSerializerRuntimeException;

/**
 * Legacy-class representing the Docuflair document validator for incoming documents
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class ZugferdDocuflairValidator
{
    /**
     * Internal Docuflair-Validator instance
     *
     * @var null|InvoiceSuiteDocuflairDocumentValidator
     */
    private $docuflairValidator;

    /**
     * Constructor
     *
     * @param null|string|ZugferdDocument $document
     *
     * @throws InvoiceSuiteFormatProviderNotFoundException
     * @throws InvoiceSuiteInvalidArgumentException
     * @throws JMSSerializerRuntimeException
     */
    public function __construct(
        $document = null
    ) {
        $this->setDocument($document);
    }

    /**
     * Set the document to validate
     *
     * @param  null|string|ZugferdDocumentBuilder|ZugferdDocumentReader $document
     * @return ZugferdDocuflairValidator
     *
     * @throws InvoiceSuiteFormatProviderNotFoundException
     * @throws InvoiceSuiteInvalidArgumentException
     * @throws JMSSerializerRuntimeException
     */
    public function setDocument(
        $document
    ): self {
        $this->docuflairValidator = null;

        if (!InvoiceSuiteStringUtils::is($document) && !($document instanceof ZugferdDocument)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::is($document)) {
            $this->docuflairValidator = InvoiceSuiteDocuflairDocumentValidator::createFromContent(
                $document
            );
        }

        if ($document instanceof ZugferdDocumentBuilder) {
            $this->docuflairValidator = InvoiceSuiteDocuflairDocumentValidator::createFromDocumentBuilder(
                $document->getDocumentBuilderInstance()
            );
        }

        if ($document instanceof ZugferdDocumentReader) {
            $this->docuflairValidator = InvoiceSuiteDocuflairDocumentValidator::createFromDocumentReader(
                $document->getDocumentReaderInstance()
            );
        }

        return $this;
    }

    /**
     * Create a Docuflair validator instance from document content
     *
     * @param  string                    $document
     * @return ZugferdDocuflairValidator
     *
     * @throws InvoiceSuiteFormatProviderNotFoundException
     * @throws InvoiceSuiteInvalidArgumentException
     * @throws JMSSerializerRuntimeException
     */
    public static function fromString(
        string $document
    ): self {
        return new self($document);
    }

    /**
     * Create a Docuflair validator instance from a ZugferdDocument
     *
     * @param  ZugferdDocument           $zugferdDocument
     * @return ZugferdDocuflairValidator
     *
     * @throws InvoiceSuiteFormatProviderNotFoundException
     * @throws InvoiceSuiteInvalidArgumentException
     * @throws JMSSerializerRuntimeException
     */
    public static function fromZugferdDocument(
        ZugferdDocument $zugferdDocument
    ): self {
        return new self($zugferdDocument);
    }

    /**
     * Set the base URL of the Docuflair validation endpoint
     *
     * @param  string                    $newBaseUrl
     * @return ZugferdDocuflairValidator
     */
    public function setBaseUrl(
        string $newBaseUrl
    ): self {
        $this->docuflairValidator->setBaseUrl($newBaseUrl);

        return $this;
    }

    /**
     * Set the personal Docuflair API key
     *
     * @param  string                    $newApiKey
     * @return ZugferdDocuflairValidator
     */
    public function setApiKey(
        string $newApiKey
    ): self {
        $this->docuflairValidator->setApiKey($newApiKey);

        return $this;
    }

    /**
     * Perform validation
     *
     * @return ZugferdDocuflairValidator
     *
     * @throws InvoiceSuiteValidationContentNotSpecifiedException
     */
    public function validate(): self
    {
        $this->docuflairValidator->validate();

        return $this;
    }

    /**
     * Returns an array of all validation errors
     *
     * @return array<int,string>
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function getValidationErrors(): array
    {
        return $this->convertMessageBagMessagesToSimpleArray($this->docuflairValidator->getErrorMessagesInMessageBag());
    }

    /**
     * Returns true if __no__ validation errors are present otherwise false
     *
     * @return bool
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function hasNoValidationErrors(): bool
    {
        return !$this->docuflairValidator->hasErrorMessagesInMessageBag();
    }

    /**
     * Returns true if validation errors are present otherwise false
     *
     * @return bool
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function hasValidationErrors(): bool
    {
        return $this->docuflairValidator->hasErrorMessagesInMessageBag();
    }

    /**
     * Returns an array of all validation warnings
     *
     * @return array<int,string>
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function getValidationWarnings(): array
    {
        return $this->convertMessageBagMessagesToSimpleArray($this->docuflairValidator->getWarningMessagesInMessageBag());
    }

    /**
     * Returns true if __no__ validation warnings are present otherwise false
     *
     * @return bool
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function hasNoValidationWarnings(): bool
    {
        return !$this->docuflairValidator->hasWarningMessagesInMessageBag();
    }

    /**
     * Returns true if validation warnings are present otherwise false
     *
     * @return bool
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function hasValidationWarnings(): bool
    {
        return $this->docuflairValidator->hasWarningMessagesInMessageBag();
    }

    /**
     * Returns an array of all validation information
     *
     * @return array<int,string>
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function getValidationInformation(): array
    {
        return $this->convertMessageBagMessagesToSimpleArray($this->docuflairValidator->getInfoMessagesInMessageBag());
    }

    /**
     * Returns true if __no__ validation information are present otherwise false
     *
     * @return bool
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function hasNoValidationInformation(): bool
    {
        return !$this->docuflairValidator->hasInfoMessagesInMessageBag();
    }

    /**
     * Returns true if validation information are present otherwise false
     *
     * @return bool
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function hasValidationInformation(): bool
    {
        return $this->docuflairValidator->hasInfoMessagesInMessageBag();
    }

    /**
     * Return an array of all internal process errors
     *
     * @return array<int,string>
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function getProcessErrors(): array
    {
        return $this->convertMessageBagMessagesToSimpleArray($this->docuflairValidator->getInternalErrorMessagesInMessageBag());
    }

    /**
     * Returns true if there are __no__ internal process errors
     *
     * @return bool
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function hasNoProcessErrors(): bool
    {
        return !$this->docuflairValidator->hasInternalErrorMessagesInMessageBag();
    }

    /**
     * Returns true if there are internal process errors
     *
     * @return bool
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function hasProcessErrors(): bool
    {
        return $this->docuflairValidator->hasInternalErrorMessagesInMessageBag();
    }

    /**
     * Returns an array of all process output messages
     *
     * @return array<int,string>
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function getProcessOutput(): array
    {
        return $this->convertMessageBagMessagesToSimpleArray($this->docuflairValidator->getInfoMessagesInMessageBag());
    }

    /**
     * Converts message bag items to a simple string array
     *
     * @param  array<int, InvoiceSuiteMessageBagItem> $messages
     * @return array<int, string>
     */
    private function convertMessageBagMessagesToSimpleArray(
        array $messages
    ): array {
        return InvoiceSuiteArrayUtils::map(
            static fn (InvoiceSuiteMessageBagItem $messageBagItem) => $messageBagItem->getMessageContent(),
            $messages
        );
    }
}
