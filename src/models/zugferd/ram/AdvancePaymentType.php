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
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\AmountType")
     * @JMS\Expose
     * @JMS\SerializedName("PaidAmount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getPaidAmount", setter="setPaidAmount")
     */
    private $amountType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\qdt\FormattedDateTimeType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\qdt\FormattedDateTimeType")
     * @JMS\Expose
     * @JMS\SerializedName("FormattedReceivedDateTime")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getFormattedReceivedDateTime", setter="setFormattedReceivedDateTime")
     */
    private $formattedDateTimeType;

    /**
     * @var array<\horstoeko\invoicesuite\models\zugferd\ram\TradeTaxType>
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("array<horstoeko\zugferd\entities\extended\ram\TradeTaxType>")
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
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\ReferencedDocumentType")
     * @JMS\Expose
     * @JMS\SerializedName("InvoiceSpecifiedReferencedDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getInvoiceSpecifiedReferencedDocument", setter="setInvoiceSpecifiedReferencedDocument")
     */
    private $referencedDocumentType;

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType|null
     */
    public function getPaidAmount(): ?\horstoeko\invoicesuite\models\zugferd\udt\AmountType
    {
        return $this->amountType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     */
    public function getPaidAmountWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\AmountType
    {
        $this->amountType = is_null($this->amountType) ? new AmountType() : $this->amountType;

        return $this->amountType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     * @return self
     */
    public function setPaidAmount(\horstoeko\invoicesuite\models\zugferd\udt\AmountType $amountType): self
    {
        $this->amountType = $amountType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\FormattedDateTimeType|null
     */
    public function getFormattedReceivedDateTime(): ?\horstoeko\invoicesuite\models\zugferd\qdt\FormattedDateTimeType
    {
        return $this->formattedDateTimeType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\FormattedDateTimeType
     */
    public function getFormattedReceivedDateTimeWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\qdt\FormattedDateTimeType {
        $this->formattedDateTimeType = is_null($this->formattedDateTimeType) ? new FormattedDateTimeType() : $this->formattedDateTimeType;

        return $this->formattedDateTimeType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\qdt\FormattedDateTimeType
     * @return self
     */
    public function setFormattedReceivedDateTime(
        \horstoeko\invoicesuite\models\zugferd\qdt\FormattedDateTimeType $formattedDateTimeType,
    ): self {
        $this->formattedDateTimeType = $formattedDateTimeType;

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
     * @param array<\horstoeko\invoicesuite\models\zugferd\ram\TradeTaxType>
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
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradeTaxType $tradeTaxType
     * @return self
     */
    public function addToIncludedTradeTax(
        \horstoeko\invoicesuite\models\zugferd\ram\TradeTaxType $tradeTaxType,
    ): self {
        $this->includedTradeTax[] = $tradeTaxType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradeTaxType
     */
    public function addToIncludedTradeTaxWithCreate(): \horstoeko\invoicesuite\models\zugferd\ram\TradeTaxType
    {
        $this->addToincludedTradeTax($tradeTaxType = new TradeTaxType());

        return $tradeTaxType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType|null
     */
    public function getInvoiceSpecifiedReferencedDocument(
    ): ?\horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType {
        return $this->referencedDocumentType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType
     */
    public function getInvoiceSpecifiedReferencedDocumentWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType {
        $this->referencedDocumentType = is_null($this->referencedDocumentType) ? new ReferencedDocumentType() : $this->referencedDocumentType;

        return $this->referencedDocumentType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType
     * @return self
     */
    public function setInvoiceSpecifiedReferencedDocument(
        \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType $referencedDocumentType,
    ): self {
        $this->referencedDocumentType = $referencedDocumentType;

        return $this;
    }
}
