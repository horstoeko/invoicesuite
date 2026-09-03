<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\validators;

use horstoeko\invoicesuite\concerns\HandlesDocumentFormatProviders;
use horstoeko\invoicesuite\documents\abstracts\InvoiceSuiteAbstractDocumentFormatProvider;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteInvalidArgumentException;
use horstoeko\invoicesuite\InvoiceSuiteDocumentBuilder;
use horstoeko\invoicesuite\InvoiceSuiteDocumentReader;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteContentType;
use horstoeko\invoicesuite\utils\InvoiceSuiteContentTypeResolver;
use horstoeko\invoicesuite\utils\InvoiceSuiteFileUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteXmlUtils;
use horstoeko\invoicesuite\validators\abstracts\InvoiceSuiteAbstractDocumentValidator;
use JMS\Serializer\Exception\RuntimeException as JMSSerializerRuntimeException;
use Throwable;

/**
 * Class representing the implementation for a XSD Validator
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteXsdDocumentValidator extends InvoiceSuiteAbstractDocumentValidator
{
    use HandlesDocumentFormatProviders;

    /**
     * The location of the mein XSD-scheme file
     *
     * @var string
     */
    private $xsdFilename = '';

    /**
     * Returns the configurred location of the mein XSD-scheme file
     *
     * @return string
     */
    public function getXsdFilename(): string
    {
        return $this->xsdFilename;
    }

    /**
     * Sets the location of the mein XSD-scheme file
     *
     * @return static
     *
     * @throws InvoiceSuiteFileNotFoundException
     */
    public function setXsdFilename(
        string $newXsdFilename
    ): static {
        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newXsdFilename)) {
            return $this;
        }

        if (!InvoiceSuiteFileUtils::isReadableFile($newXsdFilename)) {
            throw new InvoiceSuiteFileNotFoundException($newXsdFilename);
        }

        $this->xsdFilename = $newXsdFilename;

        return $this;
    }

    /**
     * Internal method to set a document builder from which to get the content from. This will check
     * if the given provider has an enabled XSD validation support
     *
     * @param  InvoiceSuiteDocumentBuilder $fromDocumentBuilder
     * @return static
     *
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteInvalidArgumentException
     * @throws JMSSerializerRuntimeException
     */
    protected function setDocumentBuilder(
        InvoiceSuiteDocumentBuilder $fromDocumentBuilder
    ): static {
        parent::setDocumentBuilder($fromDocumentBuilder);

        $this->setXsdFilename($fromDocumentBuilder->getCurrentDocumentFormatProvider()->getValidationXsdFilename());

        return $this;
    }

    /**
     * Internal method to set a document reader from which to get the content from. This will check
     * if the given provider has an enabled XSD validation support
     *
     * @param  InvoiceSuiteDocumentReader $fromDocumentReader
     * @return static
     *
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteInvalidArgumentException
     */
    protected function setDocumentReader(
        InvoiceSuiteDocumentReader $fromDocumentReader
    ): static {
        parent::setDocumentReader($fromDocumentReader);

        $this->setXsdFilename($fromDocumentReader->getCurrentDocumentFormatProvider()->getValidationXsdFilename());

        return $this;
    }

    /**
     * Perform additional checks for a given format provider
     *
     * @param  InvoiceSuiteAbstractDocumentFormatProvider $formatProvider
     * @return bool
     */
    protected function checkFormatProviderRequirements(
        InvoiceSuiteAbstractDocumentFormatProvider $formatProvider
    ): bool {
        return $formatProvider->getValidationXsdAvailable();
    }

    /**
     * The validator-specifc validation entry point
     *
     * @return static
     *
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteInvalidArgumentException
     */
    protected function doValidate(): static
    {
        $this->clearMessageBag();

        if (false === $this->checkRequirements()) {
            return $this;
        }

        $this->performValidation();

        return $this;
    }

    /**
     * Check Requirements
     *
     * @return bool
     *
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteInvalidArgumentException
     */
    private function checkRequirements(): bool
    {
        if (false === $this->checkContentTypeIsXML()) {
            return false;
        }

        return $this->checkXsdFilename();
    }

    /**
     * Checks, that the content type of the document to validate is a XML
     *
     * @return bool
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    private function checkContentTypeIsXML(): bool
    {
        if (InvoiceSuiteContentType::XML !== InvoiceSuiteContentTypeResolver::resolveContentType($this->getRawDocumentContent())) {
            $this->addInternalErrorMessageToMessageBag('Only XML content can be validated with this Validator');

            return false;
        }

        return true;
    }

    /**
     * Checks for a valid mein XSD-scheme file
     *
     * @return bool
     *
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteInvalidArgumentException
     */
    private function checkXsdFilename(): bool
    {
        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($this->getXsdFilename())) {
            return true;
        }

        $this->resolveAvailableDocumentFormatProviders();

        $formatProviders = InvoiceSuiteArrayUtils::filter(
            $this->getRegisteredDocumentFormatProviders(),
            fn ($formatProvider): bool => (
                $formatProvider->getIsSatisfiableBySerializedContent($this->getRawDocumentContent())
                && $formatProvider->getValidationXsdAvailable()
            )
        );

        if (InvoiceSuiteArrayUtils::empty($formatProviders)) {
            $this->addInternalErrorMessageToMessageBag('No format provider for the specified content available');

            return false;
        }

        $formatProvider = InvoiceSuiteArrayUtils::first($formatProviders);

        $this->setXsdFilename($formatProvider->getValidationXsdFilename());

        return true;
    }

    /**
     * Validate XML agains the specified XSD
     *
     * @return bool
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    private function performValidation(): bool
    {
        $prevUseInternalErrors = libxml_use_internal_errors(true);

        libxml_clear_errors();

        try {
            $doc = InvoiceSuiteXmlUtils::loadXmlOrFail(
                source: $this->getRawDocumentContent(),
                exceptionMessage: 'Failed to create DOMDocument from Content'
            );

            if ($doc->schemaValidate($this->getXsdFilename(), LIBXML_NONET)) {
                return true;
            }

            foreach (libxml_get_errors() as $xmlError) {
                $validationMessage = InvoiceSuiteStringUtils::sprintf(
                    '[line %d] %s : %s',
                    $xmlError->line,
                    $xmlError->code,
                    $xmlError->message
                );

                if ($xmlError->code >= 1801 && $xmlError->code <= 1899) {
                    $this->addErrorMessageToMessageBag($validationMessage);
                } else {
                    $this->addInternalErrorMessageToMessageBag($validationMessage);
                }
            }
        } catch (Throwable $throwable) {
            $this->addInternalErrorMessageToMessageBag($throwable->getMessage());
        } finally {
            libxml_clear_errors();
            libxml_use_internal_errors($prevUseInternalErrors);
        }

        return false;
    }
}
