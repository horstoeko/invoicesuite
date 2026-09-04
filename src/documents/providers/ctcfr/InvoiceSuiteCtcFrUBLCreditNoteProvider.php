<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\documents\providers\ctcfr;

use horstoeko\invoicesuite\documents\providers\peppol\InvoiceSuitePeppol30CreditNoteProvider;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteXmlUtils;

class InvoiceSuiteCtcFrUBLCreditNoteProvider extends InvoiceSuitePeppol30CreditNoteProvider
{
    /**
     * {@inheritDoc}
     */
    public function getUniqueId(): string
    {
        return 'ctcfrublcreditnote';
    }

    /**
     * {@inheritDoc}
     */
    public function getDescription(): string
    {
        return 'CTC-FR EXTENDED (AFNOR XP Z12-012) - French extension of EN 16931 in UBL syntax (Credit Note)';
    }

    /**
     * {@inheritDoc}
     */
    public function getParameters(): array
    {
        return [
            'CustomizationId' => 'urn:cen.eu:en16931:2017#conformant#urn.cpro.gouv.fr:1p0:extended-ctc-fr',
            // The business process (BT-23) of a CTC-FR document is an AFNOR "cadre de facturation"
            // code (B1, S1, M1, B2, S2, M2, S3, B4, S4, M4, S5, ...) chosen per document, never a
            // profile URN, so no default can be supplied here. The empty value makes the builder
            // omit cbc:ProfileID. Callers pass the code themselves, together with the
            // CustomizationId above:
            //     $documentBuilder->setContextParameter($customizationId, 'B1');
            'ProfileId' => '',
            'AllowInvoiceDocumentReferenceDocumentType' => false,
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function getSerializerHandlers(): array
    {
        return [InvoiceSuiteCtcFrUBLCreditNoteSerializerHandler::class];
    }

    /**
     * Unlike Peppol BIS and XRechnung, the business process identifier (BT-23) of a CTC-FR
     * document is not a profile URN but an AFNOR "cadre de facturation" code which is chosen
     * per document, and which is sometimes absent altogether. Matching therefore only takes the
     * specification identifier (BT-24) into account.
     *
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

            $contentQuery = InvoiceSuiteStringUtils::sprintf("//inv:CreditNote/cbc:CustomizationID[text()='%s']", $this->getFormatProviderParameterValue('CustomizationId', ''));

            $contentEntries = $contentDomXPath->query($contentQuery);

            if (false === $contentEntries) {
                return false;
            }

            if (1 !== $contentEntries->length) {
                return false;
            }

            $allowedDocumentTypes = InvoiceSuiteArrayUtils::ensure(
                $this->getFormatProviderParameterValue('AllowedDocumentTypes', [])
            );

            if (InvoiceSuiteArrayUtils::empty($allowedDocumentTypes)) {
                return true;
            }

            $contentEntries = $contentDomXPath->query('//inv:CreditNote/cbc:CreditNoteTypeCode');

            if (false === $contentEntries || 1 !== $contentEntries->length) {
                return false;
            }

            return InvoiceSuiteArrayUtils::arrayContains(
                $allowedDocumentTypes,
                (string) $contentEntries->item(0)?->nodeValue
            );
        } finally {
            libxml_clear_errors();
            libxml_use_internal_errors($prevUseInternalErrors);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getReaderClassName(): string
    {
        return InvoiceSuiteCtcFrUBLCreditNoteProviderReader::class;
    }

    /**
     * {@inheritDoc}
     */
    public function getBuilderClassName(): string
    {
        return InvoiceSuiteCtcFrUBLCreditNoteProviderBuilder::class;
    }
}
