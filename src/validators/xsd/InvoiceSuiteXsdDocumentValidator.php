<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\validators\xsd;

use DOMDocument;
use horstoeko\invoicesuite\concerns\HandlesDocumentFormatProviders;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotReadableException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteInvalidArgumentException;
use horstoeko\invoicesuite\InvoiceSuiteDocumentBuilder;
use horstoeko\invoicesuite\InvoiceSuiteDocumentReader;
use horstoeko\invoicesuite\utils\InvoiceSuiteContentType;
use horstoeko\invoicesuite\utils\InvoiceSuiteContentTypeResolver;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use horstoeko\invoicesuite\validators\abstracts\InvoiceSuiteAbstractDocumentValidator;
use JMS\Serializer\Exception\RuntimeException;
use Throwable;

/**
 * Class representing the implementation for a KosIT Validator
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
     * Create a validator instance by the XML content of a given InvoiceSuiteDocumentReader
     *
     * @param  InvoiceSuiteDocumentReader $fromDocumentReader
     * @return static
     *
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     */
    public static function createFromDocumentReader(InvoiceSuiteDocumentReader $fromDocumentReader): static
    {
        $validator = parent::createFromDocumentReader($fromDocumentReader);

        $validator->setXsdFilename($fromDocumentReader->getCurrentDocumentFormatProvider()->getXsdFilename());

        return $validator;
    }

    /**
     * Create a validator instance by the XML content of a given InvoiceSuiteDocumentBuilder
     *
     * @param  InvoiceSuiteDocumentBuilder $fromDocumentBuilder
     * @return static
     *
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws RuntimeException
     */
    public static function createFromDocumentBuilder(InvoiceSuiteDocumentBuilder $fromDocumentBuilder): static
    {
        $validator = parent::createFromDocumentBuilder($fromDocumentBuilder);

        $validator->setXsdFilename($fromDocumentBuilder->getCurrentDocumentFormatProvider()->getXsdFilename());

        return $validator;
    }

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
     * @throws InvoiceSuiteFileNotReadableException
     */
    public function setXsdFilename(string $newXsdFilename): static
    {
        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newXsdFilename)) {
            return $this;
        }

        if (!is_file($newXsdFilename)) {
            throw new InvoiceSuiteFileNotFoundException($newXsdFilename);
        }

        if (!is_readable($newXsdFilename)) {
            throw new InvoiceSuiteFileNotReadableException($newXsdFilename);
        }

        $this->xsdFilename = $newXsdFilename;

        return $this;
    }

    /**
     * The validator-specifc validation entry point
     *
     * @return static
     *
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
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
     * @throws InvoiceSuiteFileNotReadableException
     * @throws InvoiceSuiteInvalidArgumentException
     */
    private function checkRequirements(): bool
    {
        if (false === $this->checkContentTypeIsXML()) {
            return false;
        }

        if (false === $this->checkXsdFilename()) {
            return false;
        }

        return true;
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
        if (InvoiceSuiteContentType::XML != InvoiceSuiteContentTypeResolver::resolveContentType($this->getRawDocumentContent())) {
            $this->addErrorMessageToMessageBag('Only XML content can be validated with this Validator');

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
     * @throws InvoiceSuiteFileNotReadableException
     * @throws InvoiceSuiteInvalidArgumentException
     */
    private function checkXsdFilename(): bool
    {
        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($this->getXsdFilename())) {
            return true;
        }

        $this->resolveAvailableDocumentFormatProviders();

        $formatProviders = array_filter(
            $this->getRegisteredDocumentFormatProviders(),
            fn ($formatProvider) => $formatProvider->getIsSatisfiableBySerializedContent($this->getRawDocumentContent())
        );

        if ([] === $formatProviders) {
            $this->addErrorMessageToMessageBag('No format provider for the specified content available');

            return false;
        }

        $formatProvider = reset($formatProviders);

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($formatProvider->getXsdFilename())) {
            $this->addErrorMessageToMessageBag(sprintf('Format provider %s did not present a XSD filename', $formatProvider->getUniqueId()));

            return false;
        }

        $this->setXsdFilename($formatProvider->getXsdFilename());

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
            $doc = new DOMDocument();

            if (true === $doc->loadXML($this->getRawDocumentContent())) {
                if (true === $doc->schemaValidate($this->getXsdFilename())) {
                    return true;
                }

                foreach (libxml_get_errors() as $xmlError) {
                    $this->addErrorMessageToMessageBag(
                        sprintf(
                            '[line %d] %s : %s',
                            $xmlError->line,
                            $xmlError->code,
                            $xmlError->message
                        )
                    );
                }
            } else {
                $this->addErrorMessageToMessageBag('Failed to create DOMDocument from Content');
            }
        } catch (Throwable $exception) {
            $this->addErrorMessageToMessageBag($exception->getMessage());
        } finally {
            libxml_clear_errors();
            libxml_use_internal_errors($prevUseInternalErrors);
        }

        return false;
    }
}
