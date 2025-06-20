<?php

namespace horstoeko\invoicesuite\providers\ubl;

use DateTime;
use DateTimeInterface;
use horstoeko\invoicesuite\models\ubl\main\Invoice;
use horstoeko\invoicesuite\abstracts\InvoiceSuiteAbstractFormatProviderReader;

class InvoiceSuiteUblInvoiceProviderReader extends InvoiceSuiteAbstractFormatProviderReader
{
    /**
     * Returns the root object as a Invoice
     *
     * @return Invoice
     */
    protected function getUblInvoiceRootObject(): Invoice
    {
        return $this->getRootObject();
    }

    /**
     * Gets the document number (e.g. invoice number)
     *
     * @param string|null $newDocumentNo The document no issued by the seller
     * @return static
     *
     * @phpstan-param-out string $newDocumentNo
     */
    public function getDocumentNo(
        ?string &$newDocumentNo
    ): self {
        $newDocumentNo = $this->getUblInvoiceRootObject()->getID()?->getValue() ?? "";

        return $this;
    }

    /**
     * Gets the document type code
     *
     * @param string|null $newDocumentType The type of the document
     * @return static
     *
     * @phpstan-param-out string $newDocumentType
     */
    public function getDocumentType(
        ?string &$newDocumentType
    ): self {
        $newDocumentType = $this->getUblInvoiceRootObject()->getInvoiceTypeCode()?->getValue() ?? "";

        return $this;
    }

    /**
     * Gets the document description
     *
     * @param string|null $newDocumentDescription The documenttype as free text
     * @return self
     *
     * @phpstan-param-out string $newDocumentDescription
     */
    public function getDocumentDescription(
        ?string &$newDocumentDescription
    ): self {
        $newDocumentDescription = $this->getUblInvoiceRootObject()->getInvoiceTypeCode()?->getName() ?? "";

        return $this;
    }

    /**
     * Gets the document language
     *
     * @param string|null $newDocumentLanguage Language indicator. The language code in which the document was written
     * @return self
     *
     * @phpstan-param-out string $newDocumentLanguage
     */
    public function getDocumentLanguage(
        ?string &$newDocumentLanguage
    ): self {
        $newDocumentLanguage = $this->getUblInvoiceRootObject()->getInvoiceTypeCode()?->getLanguageID() ?? "";

        return $this;
    }

    /**
     * Gets the document date (e.g. invoice date)
     *
     * @param DateTimeInterface|null $newDocumentDate Date of the document. The date when the document was issued by the seller
     * @return self
     *
     * @phpstan-param-out DateTimeInterface $newDocumentDate
     */
    public function getDocumentDate(
        ?DateTimeInterface &$newDocumentDate
    ): self {
        $newDocumentDate = $this->getUblInvoiceRootObject()->getIssueDate() ?? new DateTime();

        return $this;
    }
}
