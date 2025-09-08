<?php

namespace horstoeko\invoicesuite\models\zffxextended\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\zffxextended\qdt\FormattedDateTimeType;
use horstoeko\invoicesuite\models\zffxextended\udt\AmountType;

class AdvancePaymentType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\zffxextended\udt\AmountType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxextended\udt\AmountType")
     * @JMS\Expose
     * @JMS\SerializedName("PaidAmount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getPaidAmount", setter="setPaidAmount")
     */
    private $paidAmount;

    /**
     * @var \horstoeko\invoicesuite\models\zffxextended\qdt\FormattedDateTimeType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxextended\qdt\FormattedDateTimeType")
     * @JMS\Expose
     * @JMS\SerializedName("FormattedReceivedDateTime")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getFormattedReceivedDateTime", setter="setFormattedReceivedDateTime")
     */
    private $formattedReceivedDateTime;

    /**
     * @var array<\horstoeko\invoicesuite\models\zffxextended\ram\TradeTaxType>|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zffxextended\ram\TradeTaxType>")
     * @JMS\Expose
     * @JMS\SerializedName("IncludedTradeTax")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="IncludedTradeTax", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getIncludedTradeTax", setter="setIncludedTradeTax")
     */
    private $includedTradeTax;

    /**
     * @var \horstoeko\invoicesuite\models\zffxextended\ram\ReferencedDocumentType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxextended\ram\ReferencedDocumentType")
     * @JMS\Expose
     * @JMS\SerializedName("InvoiceSpecifiedReferencedDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getInvoiceSpecifiedReferencedDocument", setter="setInvoiceSpecifiedReferencedDocument")
     */
    private $invoiceSpecifiedReferencedDocument;

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\AmountType|null
     */
    public function getPaidAmount(): ?AmountType
    {
        return $this->paidAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\AmountType
     */
    public function getPaidAmountWithCreate(): AmountType
    {
        $this->paidAmount = is_null($this->paidAmount) ? new AmountType() : $this->paidAmount;

        return $this->paidAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\udt\AmountType|null $paidAmount
     * @return self
     */
    public function setPaidAmount(?AmountType $paidAmount = null): self
    {
        $this->paidAmount = $paidAmount;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPaidAmount(): self
    {
        $this->paidAmount = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\qdt\FormattedDateTimeType|null
     */
    public function getFormattedReceivedDateTime(): ?FormattedDateTimeType
    {
        return $this->formattedReceivedDateTime;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\qdt\FormattedDateTimeType
     */
    public function getFormattedReceivedDateTimeWithCreate(): FormattedDateTimeType
    {
        $this->formattedReceivedDateTime = is_null($this->formattedReceivedDateTime) ? new FormattedDateTimeType() : $this->formattedReceivedDateTime;

        return $this->formattedReceivedDateTime;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\qdt\FormattedDateTimeType|null $formattedReceivedDateTime
     * @return self
     */
    public function setFormattedReceivedDateTime(?FormattedDateTimeType $formattedReceivedDateTime = null): self
    {
        $this->formattedReceivedDateTime = $formattedReceivedDateTime;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetFormattedReceivedDateTime(): self
    {
        $this->formattedReceivedDateTime = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zffxextended\ram\TradeTaxType>|null
     */
    public function getIncludedTradeTax(): ?array
    {
        return $this->includedTradeTax;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zffxextended\ram\TradeTaxType>|null $includedTradeTax
     * @return self
     */
    public function setIncludedTradeTax(?array $includedTradeTax = null): self
    {
        $this->includedTradeTax = $includedTradeTax;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetIncludedTradeTax(): self
    {
        $this->includedTradeTax = null;

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
     * @param \horstoeko\invoicesuite\models\zffxextended\ram\TradeTaxType $includedTradeTax
     * @return self
     */
    public function addToIncludedTradeTax(TradeTaxType $includedTradeTax): self
    {
        $this->includedTradeTax[] = $includedTradeTax;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\ram\TradeTaxType
     */
    public function addToIncludedTradeTaxWithCreate(): TradeTaxType
    {
        $this->addToincludedTradeTax($includedTradeTax = new TradeTaxType());

        return $includedTradeTax;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\ram\TradeTaxType $includedTradeTax
     * @return self
     */
    public function addOnceToIncludedTradeTax(TradeTaxType $includedTradeTax): self
    {
        if (!is_array($this->includedTradeTax)) {
            $this->includedTradeTax = [];
        }

        $this->includedTradeTax[0] = $includedTradeTax;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\ram\TradeTaxType
     */
    public function addOnceToIncludedTradeTaxWithCreate(): TradeTaxType
    {
        if (!is_array($this->includedTradeTax)) {
            $this->includedTradeTax = [];
        }

        if ($this->includedTradeTax === []) {
            $this->addOnceToincludedTradeTax(new TradeTaxType());
        }

        return $this->includedTradeTax[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\ram\ReferencedDocumentType|null
     */
    public function getInvoiceSpecifiedReferencedDocument(): ?ReferencedDocumentType
    {
        return $this->invoiceSpecifiedReferencedDocument;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\ram\ReferencedDocumentType
     */
    public function getInvoiceSpecifiedReferencedDocumentWithCreate(): ReferencedDocumentType
    {
        $this->invoiceSpecifiedReferencedDocument = is_null($this->invoiceSpecifiedReferencedDocument) ? new ReferencedDocumentType() : $this->invoiceSpecifiedReferencedDocument;

        return $this->invoiceSpecifiedReferencedDocument;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\ram\ReferencedDocumentType|null $invoiceSpecifiedReferencedDocument
     * @return self
     */
    public function setInvoiceSpecifiedReferencedDocument(
        ?ReferencedDocumentType $invoiceSpecifiedReferencedDocument = null,
    ): self {
        $this->invoiceSpecifiedReferencedDocument = $invoiceSpecifiedReferencedDocument;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetInvoiceSpecifiedReferencedDocument(): self
    {
        $this->invoiceSpecifiedReferencedDocument = null;

        return $this;
    }
}
