<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\documents\providers\xr;

use horstoeko\invoicesuite\documents\abstracts\InvoiceSuiteAbstractDocumentFormatProvider;
use horstoeko\invoicesuite\documents\providers\peppol\models\main\CreditNote;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteContentType;
use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteXmlUtils;
use z4kn4fein\SemVer\Version;

class InvoiceSuiteXRechnungUBLCreditNoteProvider extends InvoiceSuiteAbstractDocumentFormatProvider
{
    /**
     * {@inheritDoc}
     */
    public function getUniqueId(): string
    {
        return 'xrechnungublcreditnote';
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
        return 'The reference profile is based on the CIUS XRechnung, which is maintained by KoSIT. It represents an '
            . 'extension of EN 16931-1 with its own business rules, the national German laws and regulations. This provider '
            . 'used the UBL Syntax.';
    }

    /**
     * {@inheritDoc}
     */
    public function getVersion(): Version
    {
        return Version::create(1, 0, 0);
    }

    /**
     * {@inheritDoc}
     */
    public function getParameters(): array
    {
        return [
            'CustomizationId' => 'urn:cen.eu:en16931:2017#compliant#urn:xeinkauf.de:kosit:xrechnung_3.0',
            'ProfileId' => 'urn:fdc:peppol.eu:2017:poacc:billing:01:1.0',
            'AllowInvoiceDocumentReferenceDocumentType' => false,
            'AlternativeCustomizationIds' => ['urn:cen.eu:en16931:2017'],
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
            InvoiceSuiteXRechnungUBLCreditNoteSerializerHandler::class,
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
    public function getSerializedContentMatchesScheme(
        string $serializedContent
    ): bool {
        $prevUseInternalErrors = libxml_use_internal_errors(true);
        libxml_clear_errors();

        try {
            $contentDomDocument = InvoiceSuiteXmlUtils::loadXml($serializedContent);

            if (false === $contentDomDocument) {
                return false;
            }

            $contentDomXPath = InvoiceSuiteXmlUtils::createDomXPath($contentDomDocument);
            $contentDomXPath->registerNamespace('inv', 'urn:oasis:names:specification:ubl:schema:xsd:CreditNote-2');
            $contentDomXPath->registerNamespace('cbc', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');

            $contextParameters = InvoiceSuiteArrayUtils::merge(
                InvoiceSuiteArrayUtils::ensure($this->getFormatProviderParameterValue('CustomizationId', '')),
                InvoiceSuiteArrayUtils::ensure($this->getFormatProviderParameterValue('AlternativeCustomizationIds', ''))
            );

            $contextParameterFound = false;

            foreach ($contextParameters as $contextParameter) {
                $contentQuery = InvoiceSuiteStringUtils::sprintf("//inv:CreditNote/cbc:CustomizationID[text()='%s']", $contextParameter);

                $contentEntries = $contentDomXPath->query($contentQuery);

                if (false === $contentEntries) {
                    continue;
                }

                if (1 !== $contentEntries->length) {
                    continue;
                }

                $contextParameterFound = true;

                break;
            }

            if (false === $contextParameterFound) {
                return false;
            }

            $contentQuery = InvoiceSuiteStringUtils::sprintf("//inv:CreditNote/cbc:ProfileID[text()='%s']", $this->getFormatProviderParameterValue('ProfileId', ''));

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
        return InvoiceSuiteXRechnungUBLCreditNoteProviderReader::class;
    }

    /**
     * {@inheritDoc}
     */
    public function getBuilderClassName(): string
    {
        return InvoiceSuiteXRechnungUBLCreditNoteProviderBuilder::class;
    }

    /**
     * Returns a list of valid PDF attachment filenames
     *
     * @return array<string>
     */
    public function getPdfAllowedAttachmentFilenames(): array
    {
        return [];
    }

    /**
     * Get the default PDF attachment filename
     *
     * @return string
     */
    public function getPdfDefaultAttachmentFilename(): string
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
    public function getValidationXsdFilename(): string
    {
        return InvoiceSuitePathUtils::combinePathWithFile(
            InvoiceSuitePathUtils::combineAllPaths(__DIR__, '..', 'peppol', 'xsd', 'maindoc'),
            'UBL-CreditNote-2.1.xsd'
        );
    }
}
