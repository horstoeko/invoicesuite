<?php

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\documentproviders\ubl;

use horstoeko\invoicesuite\documentabstracts\InvoiceSuiteAbstractDocumentFormatProvider;
use horstoeko\invoicesuite\documentmodels\ubl\main\Invoice;

class InvoiceSuiteUblInvoiceProvider extends InvoiceSuiteAbstractDocumentFormatProvider
{
    /**
     * @inheritDoc
     */
    public function getUniqueId(): string
    {
        return 'ublinvoice';
    }

    /**
     * @inheritDoc
     */
    public function getDescription(): string
    {
        return 'Common Invoice in UBL syntax';
    }

    /**
     * @inheritDoc
     */
    public function getParameters(): array
    {
        return [
            'QuotationDocTypeCode' => '325',
            'QuotationDocDescription' => 'Quotation',
            'CustomizationId' => 'urn:cen.eu:en16931:2017',
            'ProfileId' => 'urn:fdc:peppol.eu:2017:poacc:billing:01:1.0',
        ];
    }

    /**
     * @inheritDoc
     */
    public function getSerializerMetadataDirectories(): array
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function getSerializerHandlers(): array
    {
        return [
            InvoiceSuiteUblInvoiceSerializerHandler::class
        ];
    }

    /**
     * @inheritDoc
     */
    public function getSerializerListeners(): array
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function getSerializerSubscribers(): array
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function getSerializerGroups(): array
    {
        return ["ubl"];
    }

    /**
     * @inheritDoc
     */
    public function isSatisfiableBySerializedContent(string $serializedContent): bool
    {
        $prevUseInternalErrors = libxml_use_internal_errors(true);
        libxml_clear_errors();

        try {
            $contentDomDocument = new \DOMDocument();
            $contentDomDocument->loadXML($serializedContent);
            $contentDomXPath = new \DOMXPath($contentDomDocument);
            $contentDomXPath->registerNamespace('inv', 'urn:oasis:names:specification:ubl:schema:xsd:Invoice-2');
            $contentDomXPath->registerNamespace('cbc', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');

            $contentQuery = sprintf("//inv:Invoice/cbc:CustomizationID[text()='%s']", $this->getFormatProviderParameterValue('CustomizationId', ''));

            $contentEntries = $contentDomXPath->query($contentQuery);

            if ($contentEntries === false) {
                return false;
            }

            if ($contentEntries->length !== 1) {
                return false;
            }

            $contentQuery = sprintf("//inv:Invoice/cbc:ProfileID[text()='%s']", $this->getFormatProviderParameterValue('ProfileId', ''));

            $contentEntries = $contentDomXPath->query($contentQuery);

            if ($contentEntries === false) {
                return false;
            }

            return $contentEntries->length === 1;
        } catch (\Throwable) {
            // Do nothing
        } finally {
            libxml_clear_errors();
            libxml_use_internal_errors($prevUseInternalErrors);
        }

        return false;
    }

    /**
     * @inheritDoc
     */
    public function getRootClassName(): string
    {
        return Invoice::class;
    }

    /**
     * @inheritDoc
     */
    public function getReaderClassName(): string
    {
        return InvoiceSuiteUblInvoiceProviderReader::class;
    }

    /**
     * @inheritDoc
     */
    public function getBuilderClassName(): string
    {
        return InvoiceSuiteUblInvoiceProviderBuilder::class;
    }

    /**
     * Returns true if PDF support is available
     *
     * @return boolean
     */
    public function isPdfSupportAvailable(): bool
    {
        return false;
    }

    /**
     * Returns a list of valid PDF attachment filenames
     *
     * @return array<string>
     */
    public function getAllowedPdfAttachmentFilenames(): array
    {
        return [];
    }

    /**
     * Get the default PDF attachment filename
     *
     * @return string
     */
    public function getDefaultPdfAttachmentFilename(): string
    {
        return "";
    }

    /**
     * Returns the PDF constructor classname for this format provider
     *
     * @return string
     */
    public function getPdfConstructorClassName(): string
    {
        return "";
    }
}
