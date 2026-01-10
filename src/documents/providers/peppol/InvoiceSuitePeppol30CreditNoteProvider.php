<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\documents\providers\peppol;

use DOMDocument;
use DOMXPath;
use horstoeko\invoicesuite\documents\abstracts\InvoiceSuiteAbstractDocumentFormatProvider;
use horstoeko\invoicesuite\documents\models\peppol\main\CreditNote;
use horstoeko\invoicesuite\utils\InvoiceSuiteContentType;
use horstoeko\invoicesuite\utils\InvoiceSuiteContentTypeResolver;

class InvoiceSuitePeppol30CreditNoteProvider extends InvoiceSuiteAbstractDocumentFormatProvider
{
    /**
     * {@inheritDoc}
     */
    public function getUniqueId(): string
    {
        return 'peppol30creditnote';
    }

    /**
     * {@inheritDoc}
     */
    public function getContentType(): InvoiceSuiteContentType
    {
        return InvoiceSuiteContentType::XML;
    }

    /**
     * {@inheritDoc}
     */
    public function getDescription(): string
    {
        return 'Peppol BIS Billing 3.0 - May 2025 Release (Credit Note)';
    }

    /**
     * {@inheritDoc}
     */
    public function getParameters(): array
    {
        return [
            'CustomizationId' => 'urn:cen.eu:en16931:2017#compliant#urn:fdc:peppol.eu:2017:poacc:billing:3.0',
            'ProfileId' => 'urn:fdc:peppol.eu:2017:poacc:billing:01:1.0',
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function getSerializerMetadataDirectories(): array
    {
        return [];
    }

    /**
     * {@inheritDoc}
     */
    public function getSerializerHandlers(): array
    {
        return [
            InvoiceSuitePeppol30CreditNoteSerializerHandler::class,
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function getSerializerListeners(): array
    {
        return [];
    }

    /**
     * {@inheritDoc}
     */
    public function getSerializerSubscribers(): array
    {
        return [];
    }

    /**
     * {@inheritDoc}
     */
    public function getSerializerGroups(): array
    {
        return ['ubl'];
    }

    /**
     * {@inheritDoc}
     */
    public function isSatisfiableBySerializedContent(string $serializedContent): bool
    {
        if ($this->getContentType() !== InvoiceSuiteContentTypeResolver::resolveContentType($serializedContent)) {
            return false;
        }

        $prevUseInternalErrors = libxml_use_internal_errors(true);
        libxml_clear_errors();

        try {
            $contentDomDocument = new DOMDocument();

            if (!$contentDomDocument->loadXML($serializedContent)) {
                return false;
            }

            $contentDomXPath = new DOMXPath($contentDomDocument);
            $contentDomXPath->registerNamespace('inv', 'urn:oasis:names:specification:ubl:schema:xsd:CreditNote-2');
            $contentDomXPath->registerNamespace('cbc', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');

            $contentQuery = sprintf("//inv:CreditNote/cbc:CustomizationID[text()='%s']", $this->getFormatProviderParameterValue('CustomizationId', ''));

            $contentEntries = $contentDomXPath->query($contentQuery);

            if (false === $contentEntries) {
                return false;
            }

            if (1 !== $contentEntries->length) {
                return false;
            }

            $contentQuery = sprintf("//inv:CreditNote/cbc:ProfileID[text()='%s']", $this->getFormatProviderParameterValue('ProfileId', ''));

            $contentEntries = $contentDomXPath->query($contentQuery);

            if (false === $contentEntries) {
                return false;
            }

            return 1 === $contentEntries->length;
        } finally {
            libxml_clear_errors();
            libxml_use_internal_errors($prevUseInternalErrors);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getRootClassName(): string
    {
        return CreditNote::class;
    }

    /**
     * {@inheritDoc}
     */
    public function getReaderClassName(): string
    {
        return InvoiceSuitePeppol30CreditNoteProviderReader::class;
    }

    /**
     * {@inheritDoc}
     */
    public function getBuilderClassName(): string
    {
        return InvoiceSuitePeppol30CreditNoteProviderBuilder::class;
    }

    /**
     * Returns true if PDF support is available
     *
     * @return bool
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
        return '';
    }

    /**
     * Returns the PDF constructor classname for this format provider
     *
     * @return string
     */
    public function getPdfConstructorClassName(): string
    {
        return '';
    }

    /**
     * Returns the full file name (including path) for the XSD schema that matches this provider.
     *
     * @return string
     */
    public function getXsdFilename(): string
    {
        return '';
    }
}
