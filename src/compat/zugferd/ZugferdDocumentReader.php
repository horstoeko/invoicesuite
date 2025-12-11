<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\zugferd;

use DateTime;
use horstoeko\invoicesuite\InvoiceSuiteDocumentReader;

/**
 * Legacy-class representing the ZUGFeRD document reader for incoming documents
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class ZugferdDocumentReader
{
    /**
     * Internal document reader
     *
     * @var InvoiceSuiteDocumentReader
     */
    protected InvoiceSuiteDocumentReader $documentReader;

    /**
     * Constructor (hidden)
     *
     * @param  InvoiceSuiteDocumentReader $documentReader
     * @return void
     */
    final protected function __construct(
        InvoiceSuiteDocumentReader $documentReader
    ) {
        $this->documentReader = $documentReader;
    }

    /**
     * Guess the profile type of a xml file.
     *
     * @param  string                $xmlFilename
     * @return ZugferdDocumentReader
     */
    public static function readAndGuessFromFile(string $xmlFilename): static
    {
        return new static(InvoiceSuiteDocumentReader::createFromFile($xmlFilename));
    }

    /**
     * Guess the profile type of the readden xml document.
     *
     * @param  string                $xmlContent
     * @return ZugferdDocumentReader
     */
    public static function readAndGuessFromContent(string $xmlContent): static
    {
        return new static(InvoiceSuiteDocumentReader::createFromContent($xmlContent));
    }

    /**
     * Read general information about the document.
     *
     * @param  null|string           $documentNo               __BT-1, From MINIMUM__ The document no issued by the seller
     * @param  null|string           $documentTypeCode         __BT-3, From MINIMUM__ The type of the document, See \horstoeko\codelists\ZugferdInvoiceType for details
     * @param  null|DateTime         $documentDate             __BT-2, From MINIMUM__ Date of invoice. The date when the document was issued by the seller
     * @param  null|string           $invoiceCurrency          __BT-5, From MINIMUM__ Code for the invoice currency
     * @param  null|string           $taxCurrency              __BT-6, From BASIC WL__ Code for the currency of the VAT entry
     * @param  null|string           $documentName             __BT-X-2, From EXTENDED__ Document Type. The documenttype (free text)
     * @param  null|string           $documentLanguage         __BT-X-4, From EXTENDED__ Language indicator. The language code in which the document was written
     * @param  null|DateTime         $effectiveSpecifiedPeriod __BT-X-6-000, From EXTENDED__ The contractual due date of the invoice
     * @return ZugferdDocumentReader
     */
    public function getDocumentInformation(
        ?string &$documentNo,
        ?string &$documentTypeCode,
        ?DateTime &$documentDate,
        ?string &$invoiceCurrency,
        ?string &$taxCurrency,
        ?string &$documentName,
        ?string &$documentLanguage,
        ?DateTime &$effectiveSpecifiedPeriod
    ): self {
        $this->documentReader->getDocumentNo($documentNo);
        $this->documentReader->getDocumentType($documentTypeCode);
        $this->documentReader->getDocumentDate($documentDate);
        $this->documentReader->getDocumentCurrency($invoiceCurrency);
        $this->documentReader->getDocumentTaxCurrency($taxCurrency);
        $this->documentReader->getDocumentDescription($documentName);
        $this->documentReader->getDocumentLanguage($documentLanguage);
        $this->documentReader->getDocumentCompleteDate($effectiveSpecifiedPeriod);

        return $this;
    }

    /**
     * Read general payment information.
     *
     * @param  null|string           $creditorReferenceID __BT-90, From BASIC WL__ Identifier of the creditor
     * @param  null|string           $paymentReference    __BT-83, From BASIC WL__ Intended use for payment
     * @return ZugferdDocumentReader
     */
    public function getDocumentGeneralPaymentInformation(
        ?string &$creditorReferenceID,
        ?string &$paymentReference
    ): self {
        $this->documentReader->getDocumentPaymentCreditorReferenceID($creditorReferenceID);
        $this->documentReader->getDocumentPaymentReference($paymentReference);

        return $this;
    }

    /**
     * Get the identifier assigned by the buyer and used for internal routing.
     *
     * @param  null|string           $buyerReference __BT-10, From MINIMUM__ An identifier assigned by the buyer and used for internal routing
     * @return ZugferdDocumentReader
     */
    public function getDocumentBuyerReference(
        ?string &$buyerReference
    ): self {
        $this->documentReader->getDocumentBuyerReference($buyerReference);

        return $this;
    }

    /**
     * Get the routing-id (needed for German XRechnung).
     *
     * This is an alias-method for getDocumentBuyerReference.
     *
     * @param  string                $routingId __BT-10, From MINIMUM__ An identifier assigned by the buyer and used for internal routing
     * @return ZugferdDocumentReader
     */
    public function getDocumentRoutingId(
        string $routingId
    ): self {
        return $this->getDocumentBuyerReference($routingId);
    }

    /**
     * Get the copy-identifier.
     *
     * @param  null|bool             $copyIndicator __BT-X-3-00, BT-X-3, From EXTENDED__ Returns true if this document is a copy from the original document
     * @return ZugferdDocumentReader
     */
    public function getIsDocumentCopy(
        ?bool &$copyIndicator
    ): self {
        $this->documentReader->getDocumentIsCopy($copyIndicator);

        return $this;
    }

    /**
     * Get the test-docukent-identifier.
     *
     * @param  null|bool             $testDocumentIndicator Returns true if this document is only for test purposes
     * @return ZugferdDocumentReader
     */
    public function getIsTestDocument(
        ?bool &$testDocumentIndicator
    ): self {
        $this->documentReader->getDocumentIsTest($testDocumentIndicator);

        return $this;
    }

    /**
     * Retrieve document notes.
     *
     * @param  array|null $notes __BT-22, From BASIC WL__, __BT-X-5, From EXTENDED__, __BT-21, From BASIC WL__ Returns an array with all document notes. Each array element contains an assiociative array containing the following keys: _contentcode_, _subjectcode_ and _content_
     * @return ZugferdDocumentReader
     */
    public function getDocumentNotes(?array &$notes): ZugferdDocumentReader
    {
        /*
        $notes = $this->getInvoiceValueByPath("getExchangedDocument.getIncludedNote", []);
        $notes = $this->convertToArray(
            $notes,
            [
                "contentcode" => ["getContentCode.value", ""],
                "subjectcode" => ["getSubjectCode.value", ""],
                "content" => ["getContent.value", ""],
            ]
        );
        */

        return $this;
    }
}
