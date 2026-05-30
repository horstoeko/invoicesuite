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
use horstoeko\invoicesuite\utils\InvoiceSuiteMessageBagItem;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use horstoeko\invoicesuite\validators\InvoiceSuiteXsdDocumentValidator;
use JMS\Serializer\Exception\RuntimeException;

/**
 * Legacy-class representing the validator against a XSD
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class ZugferdXsdValidator
{
    /**
     * Internal XSD-Validator instance
     *
     * @var null|InvoiceSuiteXsdDocumentValidator
     */
    private $xsdValidator;

    /**
     * Constructor
     *
     * @param null|string|ZugferdDocument $document $document
     *
     * @throws InvoiceSuiteFormatProviderNotFoundException
     * @throws InvoiceSuiteInvalidArgumentException
     * @throws RuntimeException
     */
    public function __construct(
        $document = null
    ) {
        $this->setDocument($document);
    }

    /**
     * Undocumented function
     *
     * @param  null|string|ZugferdDocumentBuilder|ZugferdDocumentReader $document $document
     * @return ZugferdXsdValidator
     *
     * @throws InvoiceSuiteFormatProviderNotFoundException
     * @throws InvoiceSuiteInvalidArgumentException
     * @throws RuntimeException
     */
    public function setDocument(
        $document
    ): self {
        $this->xsdValidator = null;

        if (!InvoiceSuiteStringUtils::is($document) && !($document instanceof ZugferdDocument)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::is($document)) {
            $this->xsdValidator = InvoiceSuiteXsdDocumentValidator::createFromContent(
                $document
            );
        }

        if ($document instanceof ZugferdDocumentBuilder) {
            $this->xsdValidator = InvoiceSuiteXsdDocumentValidator::createFromDocumentBuilder(
                $document->getDocumentBuilderInstance()
            );
        }

        if ($document instanceof ZugferdDocumentReader) {
            $this->xsdValidator = InvoiceSuiteXsdDocumentValidator::createFromDocumentReader(
                $document->getDocumentReaderInstance()
            );
        }

        return $this;
    }

    /**
     * Perform validation of document
     *
     * @return ZugferdXsdValidator
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function validate(): self
    {
        $this->xsdValidator->validate();

        return $this;
    }

    /**
     * Returns true if validation passed otherwise false
     *
     * @return bool
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function validationPased(): bool
    {
        return [] === $this->convertMessageBagMessagesToSimpleArray($this->xsdValidator->getErrorMessagesInMessageBag());
    }

    /**
     * Returns true if validation failed otherwise false
     *
     * @return bool
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function validationFailed(): bool
    {
        return !$this->validationPased();
    }

    /**
     * Returns true if validation passed otherwise false
     *
     * @return bool
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function hasNoValidationErrors(): bool
    {
        return [] === $this->convertMessageBagMessagesToSimpleArray($this->xsdValidator->getErrorMessagesInMessageBag());
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
        return !$this->hasNoValidationErrors();
    }

    /**
     * Returns an array of all validation errors
     *
     * @return array<int,string>
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function validationErrors(): array
    {
        return $this->convertMessageBagMessagesToSimpleArray($this->xsdValidator->getErrorMessagesInMessageBag());
    }

    /**
     * Converts a message bag array of messages to simple int,string array
     *
     * @param  array<int, InvoiceSuiteMessageBagItem> $messages
     * @return array<int, string>
     */
    private function convertMessageBagMessagesToSimpleArray(
        array $messages
    ): array {
        return array_map(
            static fn (InvoiceSuiteMessageBagItem $messageBagItem) => $messageBagItem->getMessageContent(),
            $messages
        );
    }
}
