<?php

namespace horstoeko\invoicesuite\models\zffx\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zffx\qdt\FormattedDateTimeType;
use horstoeko\invoicesuite\models\zffx\udt\AmountType;

class AdvancePaymentType
{
    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\AmountType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\AmountType")
     * @JMS\Expose
     * @JMS\SerializedName("PaidAmount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getPaidAmount", setter="setPaidAmount")
     */
    private $amountType;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\qdt\FormattedDateTimeType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\qdt\FormattedDateTimeType")
     * @JMS\Expose
     * @JMS\SerializedName("FormattedReceivedDateTime")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getFormattedReceivedDateTime", setter="setFormattedReceivedDateTime")
     */
    private $formattedDateTimeType;

    /**
     * @var array<\horstoeko\invoicesuite\models\zffx\ram\TradeTaxType>
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zffx\ram\TradeTaxType>")
     * @JMS\Expose
     * @JMS\SerializedName("IncludedTradeTax")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="IncludedTradeTax", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getIncludedTradeTax", setter="setIncludedTradeTax")
     */
    private $includedTradeTax;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType")
     * @JMS\Expose
     * @JMS\SerializedName("InvoiceSpecifiedReferencedDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getInvoiceSpecifiedReferencedDocument", setter="setInvoiceSpecifiedReferencedDocument")
     */
    private $referencedDocumentType;

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\AmountType|null
     */
    public function getPaidAmount(): ?AmountType
    {
        return $this->amountType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\AmountType
     */
    public function getPaidAmountWithCreate(): AmountType
    {
        $this->amountType = is_null($this->amountType) ? new AmountType() : $this->amountType;

        return $this->amountType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\AmountType $amountType
     * @return self
     */
    public function setPaidAmount(AmountType $amountType): self
    {
        $this->amountType = $amountType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\qdt\FormattedDateTimeType|null
     */
    public function getFormattedReceivedDateTime(): ?FormattedDateTimeType
    {
        return $this->formattedDateTimeType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\qdt\FormattedDateTimeType
     */
    public function getFormattedReceivedDateTimeWithCreate(): FormattedDateTimeType
    {
        $this->formattedDateTimeType = is_null($this->formattedDateTimeType) ? new FormattedDateTimeType() : $this->formattedDateTimeType;

        return $this->formattedDateTimeType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\qdt\FormattedDateTimeType $formattedDateTimeType
     * @return self
     */
    public function setFormattedReceivedDateTime(FormattedDateTimeType $formattedDateTimeType): self
    {
        $this->formattedDateTimeType = $formattedDateTimeType;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zffx\ram\TradeTaxType>|null
     */
    public function getIncludedTradeTax(): ?array
    {
        return $this->includedTradeTax;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zffx\ram\TradeTaxType> $includedTradeTax
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
     * @param \horstoeko\invoicesuite\models\zffx\ram\TradeTaxType $tradeTaxType
     * @return self
     */
    public function addToIncludedTradeTax(TradeTaxType $tradeTaxType): self
    {
        $this->includedTradeTax[] = $tradeTaxType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradeTaxType
     */
    public function addToIncludedTradeTaxWithCreate(): TradeTaxType
    {
        $this->addToincludedTradeTax($tradeTaxType = new TradeTaxType());

        return $tradeTaxType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\TradeTaxType $tradeTaxType
     * @return self
     */
    public function addOnceToIncludedTradeTax(TradeTaxType $tradeTaxType): self
    {
        $this->includedTradeTax[0] = $tradeTaxType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradeTaxType
     */
    public function addOnceToIncludedTradeTaxWithCreate(): TradeTaxType
    {
        if ($this->includedTradeTax === []) {
            $this->addOnceToincludedTradeTax(new TradeTaxType());
        }

        return $this->includedTradeTax[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType|null
     */
    public function getInvoiceSpecifiedReferencedDocument(): ?ReferencedDocumentType
    {
        return $this->referencedDocumentType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType
     */
    public function getInvoiceSpecifiedReferencedDocumentWithCreate(): ReferencedDocumentType
    {
        $this->referencedDocumentType = is_null($this->referencedDocumentType) ? new ReferencedDocumentType() : $this->referencedDocumentType;

        return $this->referencedDocumentType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType $referencedDocumentType
     * @return self
     */
    public function setInvoiceSpecifiedReferencedDocument(
        ReferencedDocumentType $referencedDocumentType,
    ): self {
        $this->referencedDocumentType = $referencedDocumentType;

        return $this;
    }
}
