<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\zffx\models\ram;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\zffx\models\qdt\FormattedDateTimeType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\AmountType;
use JMS\Serializer\Annotation as JMS;

class AdvancePaymentType
{
    use HandlesObjectFlags;

    /**
     * @var null|AmountType
     */
    #[JMS\Accessor(getter: 'getPaidAmount', setter: 'setPaidAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('PaidAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\AmountType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $paidAmount;

    /**
     * @var null|FormattedDateTimeType
     */
    #[JMS\Accessor(getter: 'getFormattedReceivedDateTime', setter: 'setFormattedReceivedDateTime')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('FormattedReceivedDateTime')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\qdt\FormattedDateTimeType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $formattedReceivedDateTime;

    /**
     * @var null|array<TradeTaxType>
     */
    #[JMS\Accessor(getter: 'getIncludedTradeTax', setter: 'setIncludedTradeTax')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('IncludedTradeTax')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradeTaxType>')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'IncludedTradeTax', namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    private $includedTradeTax;

    /**
     * @var null|ReferencedDocumentType
     */
    #[JMS\Accessor(getter: 'getInvoiceSpecifiedReferencedDocument', setter: 'setInvoiceSpecifiedReferencedDocument')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('InvoiceSpecifiedReferencedDocument')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\ReferencedDocumentType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
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
        $this->paidAmount ??= new AmountType();

        return $this->paidAmount;
    }

    /**
     * @param  null|AmountType $paidAmount
     * @return static
     */
    public function setPaidAmount(
        ?AmountType $paidAmount = null
    ): static {
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
        $this->formattedReceivedDateTime ??= new FormattedDateTimeType();

        return $this->formattedReceivedDateTime;
    }

    /**
     * @param  null|FormattedDateTimeType $formattedReceivedDateTime
     * @return static
     */
    public function setFormattedReceivedDateTime(
        ?FormattedDateTimeType $formattedReceivedDateTime = null
    ): static {
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
    public function setIncludedTradeTax(
        ?array $includedTradeTax = null
    ): static {
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
    public function addToIncludedTradeTax(
        TradeTaxType $includedTradeTax
    ): static {
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
    public function addOnceToIncludedTradeTax(
        TradeTaxType $includedTradeTax
    ): static {
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
        $this->invoiceSpecifiedReferencedDocument ??= new ReferencedDocumentType();

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
