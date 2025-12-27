<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\zffxextended\ram;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\zffxextended\qdt\FormattedDateTimeType;
use horstoeko\invoicesuite\documents\models\zffxextended\udt\AmountType;
use JMS\Serializer\Annotation as JMS;

class AdvancePaymentType
{
    use HandlesObjectFlags;

    /**
     * @var null|AmountType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\udt\AmountType")
     * @JMS\Expose
     * @JMS\SerializedName("PaidAmount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getPaidAmount", setter="setPaidAmount")
     */
    private $paidAmount;

    /**
     * @var null|FormattedDateTimeType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\qdt\FormattedDateTimeType")
     * @JMS\Expose
     * @JMS\SerializedName("FormattedReceivedDateTime")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getFormattedReceivedDateTime", setter="setFormattedReceivedDateTime")
     */
    private $formattedReceivedDateTime;

    /**
     * @var null|array<TradeTaxType>
     * @JMS\Groups({"zffx"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\zffxextended\ram\TradeTaxType>")
     * @JMS\Expose
     * @JMS\SerializedName("IncludedTradeTax")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="IncludedTradeTax", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getIncludedTradeTax", setter="setIncludedTradeTax")
     */
    private $includedTradeTax;

    /**
     * @var null|ReferencedDocumentType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\ram\ReferencedDocumentType")
     * @JMS\Expose
     * @JMS\SerializedName("InvoiceSpecifiedReferencedDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getInvoiceSpecifiedReferencedDocument", setter="setInvoiceSpecifiedReferencedDocument")
     */
    private $invoiceSpecifiedReferencedDocument;

    /**
     * @return null|AmountType
     */
    public function getPaidAmount(): ?AmountType
    {
        return $this->paidAmount;
    }

    /**
     * @return AmountType
     */
    public function getPaidAmountWithCreate(): AmountType
    {
        $this->paidAmount = is_null($this->paidAmount) ? new AmountType() : $this->paidAmount;

        return $this->paidAmount;
    }

    /**
     * @param  null|AmountType $paidAmount
     * @return static
     */
    public function setPaidAmount(?AmountType $paidAmount = null): static
    {
        $this->paidAmount = $paidAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPaidAmount(): static
    {
        $this->paidAmount = null;

        return $this;
    }

    /**
     * @return null|FormattedDateTimeType
     */
    public function getFormattedReceivedDateTime(): ?FormattedDateTimeType
    {
        return $this->formattedReceivedDateTime;
    }

    /**
     * @return FormattedDateTimeType
     */
    public function getFormattedReceivedDateTimeWithCreate(): FormattedDateTimeType
    {
        $this->formattedReceivedDateTime = is_null($this->formattedReceivedDateTime) ? new FormattedDateTimeType() : $this->formattedReceivedDateTime;

        return $this->formattedReceivedDateTime;
    }

    /**
     * @param  null|FormattedDateTimeType $formattedReceivedDateTime
     * @return static
     */
    public function setFormattedReceivedDateTime(?FormattedDateTimeType $formattedReceivedDateTime = null): static
    {
        $this->formattedReceivedDateTime = $formattedReceivedDateTime;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetFormattedReceivedDateTime(): static
    {
        $this->formattedReceivedDateTime = null;

        return $this;
    }

    /**
     * @return null|array<TradeTaxType>
     */
    public function getIncludedTradeTax(): ?array
    {
        return $this->includedTradeTax;
    }

    /**
     * @param  null|array<TradeTaxType> $includedTradeTax
     * @return static
     */
    public function setIncludedTradeTax(?array $includedTradeTax = null): static
    {
        $this->includedTradeTax = $includedTradeTax;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetIncludedTradeTax(): static
    {
        $this->includedTradeTax = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearIncludedTradeTax(): static
    {
        $this->includedTradeTax = [];

        return $this;
    }

    /**
     * @param  TradeTaxType $includedTradeTax
     * @return static
     */
    public function addToIncludedTradeTax(TradeTaxType $includedTradeTax): static
    {
        $this->includedTradeTax[] = $includedTradeTax;

        return $this;
    }

    /**
     * @return TradeTaxType
     */
    public function addToIncludedTradeTaxWithCreate(): TradeTaxType
    {
        $this->addToincludedTradeTax($includedTradeTax = new TradeTaxType());

        return $includedTradeTax;
    }

    /**
     * @param  TradeTaxType $includedTradeTax
     * @return static
     */
    public function addOnceToIncludedTradeTax(TradeTaxType $includedTradeTax): static
    {
        if (!is_array($this->includedTradeTax)) {
            $this->includedTradeTax = [];
        }

        $this->includedTradeTax[0] = $includedTradeTax;

        return $this;
    }

    /**
     * @return TradeTaxType
     */
    public function addOnceToIncludedTradeTaxWithCreate(): TradeTaxType
    {
        if (!is_array($this->includedTradeTax)) {
            $this->includedTradeTax = [];
        }

        if ([] === $this->includedTradeTax) {
            $this->addOnceToincludedTradeTax(new TradeTaxType());
        }

        return $this->includedTradeTax[0];
    }

    /**
     * @return null|ReferencedDocumentType
     */
    public function getInvoiceSpecifiedReferencedDocument(): ?ReferencedDocumentType
    {
        return $this->invoiceSpecifiedReferencedDocument;
    }

    /**
     * @return ReferencedDocumentType
     */
    public function getInvoiceSpecifiedReferencedDocumentWithCreate(): ReferencedDocumentType
    {
        $this->invoiceSpecifiedReferencedDocument = is_null($this->invoiceSpecifiedReferencedDocument) ? new ReferencedDocumentType() : $this->invoiceSpecifiedReferencedDocument;

        return $this->invoiceSpecifiedReferencedDocument;
    }

    /**
     * @param  null|ReferencedDocumentType $invoiceSpecifiedReferencedDocument
     * @return static
     */
    public function setInvoiceSpecifiedReferencedDocument(
        ?ReferencedDocumentType $invoiceSpecifiedReferencedDocument = null,
    ): static {
        $this->invoiceSpecifiedReferencedDocument = $invoiceSpecifiedReferencedDocument;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetInvoiceSpecifiedReferencedDocument(): static
    {
        $this->invoiceSpecifiedReferencedDocument = null;

        return $this;
    }
}
