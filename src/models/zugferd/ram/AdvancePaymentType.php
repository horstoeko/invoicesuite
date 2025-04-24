<?php

namespace horstoeko\invoicesuite\models\zugferd\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zugferd\qdt\FormattedDateTimeType;
use horstoeko\invoicesuite\models\zugferd\udt\AmountType;

class AdvancePaymentType
{
    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\AmountType")
     * @JMS\Expose
     * @JMS\SerializedName("PaidAmount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getPaidAmount", setter="setPaidAmount")
     */
    private $paidAmount;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\qdt\FormattedDateTimeType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\qdt\FormattedDateTimeType")
     * @JMS\Expose
     * @JMS\SerializedName("FormattedReceivedDateTime")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getFormattedReceivedDateTime", setter="setFormattedReceivedDateTime")
     */
    private $formattedReceivedDateTime;

    /**
     * @var array<\horstoeko\invoicesuite\models\zugferd\ram\TradeTaxType>
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zugferd\ram\TradeTaxType>")
     * @JMS\Expose
     * @JMS\SerializedName("IncludedTradeTax")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="IncludedTradeTax", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getIncludedTradeTax", setter="setIncludedTradeTax")
     */
    private $includedTradeTax;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType")
     * @JMS\Expose
     * @JMS\SerializedName("InvoiceSpecifiedReferencedDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getInvoiceSpecifiedReferencedDocument", setter="setInvoiceSpecifiedReferencedDocument")
     */
    private $invoiceSpecifiedReferencedDocument;

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType|null
     */
    public function getPaidAmount(): ?AmountType
    {
        return $this->paidAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     */
    public function getPaidAmountWithCreate(): AmountType
    {
        $this->paidAmount = is_null($this->paidAmount) ? new AmountType() : $this->paidAmount;

        return $this->paidAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\AmountType $paidAmount
     * @return self
     */
    public function setPaidAmount(AmountType $paidAmount): self
    {
        $this->paidAmount = $paidAmount;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\FormattedDateTimeType|null
     */
    public function getFormattedReceivedDateTime(): ?FormattedDateTimeType
    {
        return $this->formattedReceivedDateTime;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\FormattedDateTimeType
     */
    public function getFormattedReceivedDateTimeWithCreate(): FormattedDateTimeType
    {
        $this->formattedReceivedDateTime = is_null($this->formattedReceivedDateTime) ? new FormattedDateTimeType() : $this->formattedReceivedDateTime;

        return $this->formattedReceivedDateTime;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\qdt\FormattedDateTimeType $formattedReceivedDateTime
     * @return self
     */
    public function setFormattedReceivedDateTime(FormattedDateTimeType $formattedReceivedDateTime): self
    {
        $this->formattedReceivedDateTime = $formattedReceivedDateTime;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zugferd\ram\TradeTaxType>|null
     */
    public function getIncludedTradeTax(): ?array
    {
        return $this->includedTradeTax;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zugferd\ram\TradeTaxType> $includedTradeTax
     * @return self
     */
    public function setIncludedTradeTax(array $includedTradeTax): self
    {
        $this->includedTradeTax = $includedTradeTax;

        return $this;
    }

    /**
     * @return self
     */
    public function clearIncludedTradeTax(): self
    {
        $this->includedTradeTax = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradeTaxType $includedTradeTax
     * @return self
     */
    public function addToIncludedTradeTax(TradeTaxType $includedTradeTax): self
    {
        $this->includedTradeTax[] = $includedTradeTax;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradeTaxType
     */
    public function addToIncludedTradeTaxWithCreate(): TradeTaxType
    {
        $this->addToincludedTradeTax($includedTradeTax = new TradeTaxType());

        return $includedTradeTax;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType|null
     */
    public function getInvoiceSpecifiedReferencedDocument(): ?ReferencedDocumentType
    {
        return $this->invoiceSpecifiedReferencedDocument;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType
     */
    public function getInvoiceSpecifiedReferencedDocumentWithCreate(): ReferencedDocumentType
    {
        $this->invoiceSpecifiedReferencedDocument = is_null($this->invoiceSpecifiedReferencedDocument) ? new ReferencedDocumentType() : $this->invoiceSpecifiedReferencedDocument;

        return $this->invoiceSpecifiedReferencedDocument;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType $invoiceSpecifiedReferencedDocument
     * @return self
     */
    public function setInvoiceSpecifiedReferencedDocument(
        ReferencedDocumentType $invoiceSpecifiedReferencedDocument,
    ): self {
        $this->invoiceSpecifiedReferencedDocument = $invoiceSpecifiedReferencedDocument;

        return $this;
    }
}
