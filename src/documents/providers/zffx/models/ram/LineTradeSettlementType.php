<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\zffx\models\ram;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use JMS\Serializer\Annotation as JMS;

class LineTradeSettlementType
{
    use HandlesObjectFlags;

    /**
     * @var null|array<TradeTaxType>
     */
    #[JMS\Accessor(getter: 'getApplicableTradeTax', setter: 'setApplicableTradeTax')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('ApplicableTradeTax')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradeTaxType>')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'ApplicableTradeTax', namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    private $applicableTradeTax;

    /**
     * @var null|SpecifiedPeriodType
     */
    #[JMS\Accessor(getter: 'getBillingSpecifiedPeriod', setter: 'setBillingSpecifiedPeriod')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('BillingSpecifiedPeriod')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\SpecifiedPeriodType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $billingSpecifiedPeriod;

    /**
     * @var null|array<TradeAllowanceChargeType>
     */
    #[JMS\Accessor(getter: 'getSpecifiedTradeAllowanceCharge', setter: 'setSpecifiedTradeAllowanceCharge')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('SpecifiedTradeAllowanceCharge')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradeAllowanceChargeType>')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'SpecifiedTradeAllowanceCharge', namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    private $specifiedTradeAllowanceCharge;

    /**
     * @var null|TradeSettlementLineMonetarySummationType
     */
    #[JMS\Accessor(getter: 'getSpecifiedTradeSettlementLineMonetarySummation', setter: 'setSpecifiedTradeSettlementLineMonetarySummation')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('SpecifiedTradeSettlementLineMonetarySummation')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradeSettlementLineMonetarySummationType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $specifiedTradeSettlementLineMonetarySummation;

    /**
     * @var null|ReferencedDocumentType
     */
    #[JMS\Accessor(getter: 'getInvoiceReferencedDocument', setter: 'setInvoiceReferencedDocument')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('InvoiceReferencedDocument')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\ReferencedDocumentType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $invoiceReferencedDocument;

    /**
     * @var null|array<ReferencedDocumentType>
     */
    #[JMS\Accessor(getter: 'getAdditionalReferencedDocument', setter: 'setAdditionalReferencedDocument')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('AdditionalReferencedDocument')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\zffx\models\ram\ReferencedDocumentType>')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'AdditionalReferencedDocument', namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    private $additionalReferencedDocument;

    /**
     * @var null|array<TradeAccountingAccountType>
     */
    #[JMS\Accessor(getter: 'getReceivableSpecifiedTradeAccountingAccount', setter: 'setReceivableSpecifiedTradeAccountingAccount')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('ReceivableSpecifiedTradeAccountingAccount')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradeAccountingAccountType>')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'ReceivableSpecifiedTradeAccountingAccount', namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    private $receivableSpecifiedTradeAccountingAccount;

    /**
     * @return null|array<TradeTaxType>
     */
    public function getApplicableTradeTax(): ?array
    {
        return $this->applicableTradeTax;
    }

    /**
     * @param  null|array<TradeTaxType> $applicableTradeTax
     * @return static
     */
    public function setApplicableTradeTax(
        ?array $applicableTradeTax = null
    ): static {
        $this->applicableTradeTax = $applicableTradeTax;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetApplicableTradeTax(): static
    {
        $this->applicableTradeTax = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearApplicableTradeTax(): static
    {
        $this->applicableTradeTax = [];

        return $this;
    }

    /**
     * @param  TradeTaxType $applicableTradeTax
     * @return static
     */
    public function addToApplicableTradeTax(
        TradeTaxType $applicableTradeTax
    ): static {
        $this->applicableTradeTax[] = $applicableTradeTax;

        return $this;
    }

    /**
     * @return TradeTaxType
     */
    public function addToApplicableTradeTaxWithCreate(): TradeTaxType
    {
        $this->addToApplicableTradeTax($applicableTradeTax = new TradeTaxType());

        return $applicableTradeTax;
    }

    /**
     * @param  TradeTaxType $applicableTradeTax
     * @return static
     */
    public function addOnceToApplicableTradeTax(
        TradeTaxType $applicableTradeTax
    ): static {
        if (!is_array($this->applicableTradeTax)) {
            $this->applicableTradeTax = [];
        }

        $this->applicableTradeTax[0] = $applicableTradeTax;

        return $this;
    }

    /**
     * @return TradeTaxType
     */
    public function addOnceToApplicableTradeTaxWithCreate(): TradeTaxType
    {
        if (!is_array($this->applicableTradeTax)) {
            $this->applicableTradeTax = [];
        }

        if ([] === $this->applicableTradeTax) {
            $this->addOnceToApplicableTradeTax(new TradeTaxType());
        }

        return $this->applicableTradeTax[0];
    }

    /**
     * @return null|SpecifiedPeriodType
     */
    public function getBillingSpecifiedPeriod(): ?SpecifiedPeriodType
    {
        return $this->billingSpecifiedPeriod;
    }

    /**
     * @return SpecifiedPeriodType
     */
    public function getBillingSpecifiedPeriodWithCreate(): SpecifiedPeriodType
    {
        $this->billingSpecifiedPeriod ??= new SpecifiedPeriodType();

        return $this->billingSpecifiedPeriod;
    }

    /**
     * @param  null|SpecifiedPeriodType $billingSpecifiedPeriod
     * @return static
     */
    public function setBillingSpecifiedPeriod(
        ?SpecifiedPeriodType $billingSpecifiedPeriod = null
    ): static {
        $this->billingSpecifiedPeriod = $billingSpecifiedPeriod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetBillingSpecifiedPeriod(): static
    {
        $this->billingSpecifiedPeriod = null;

        return $this;
    }

    /**
     * @return null|array<TradeAllowanceChargeType>
     */
    public function getSpecifiedTradeAllowanceCharge(): ?array
    {
        return $this->specifiedTradeAllowanceCharge;
    }

    /**
     * @param  null|array<TradeAllowanceChargeType> $specifiedTradeAllowanceCharge
     * @return static
     */
    public function setSpecifiedTradeAllowanceCharge(
        ?array $specifiedTradeAllowanceCharge = null
    ): static {
        $this->specifiedTradeAllowanceCharge = $specifiedTradeAllowanceCharge;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSpecifiedTradeAllowanceCharge(): static
    {
        $this->specifiedTradeAllowanceCharge = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearSpecifiedTradeAllowanceCharge(): static
    {
        $this->specifiedTradeAllowanceCharge = [];

        return $this;
    }

    /**
     * @param  TradeAllowanceChargeType $specifiedTradeAllowanceCharge
     * @return static
     */
    public function addToSpecifiedTradeAllowanceCharge(
        TradeAllowanceChargeType $specifiedTradeAllowanceCharge
    ): static {
        $this->specifiedTradeAllowanceCharge[] = $specifiedTradeAllowanceCharge;

        return $this;
    }

    /**
     * @return TradeAllowanceChargeType
     */
    public function addToSpecifiedTradeAllowanceChargeWithCreate(): TradeAllowanceChargeType
    {
        $this->addToSpecifiedTradeAllowanceCharge($specifiedTradeAllowanceCharge = new TradeAllowanceChargeType());

        return $specifiedTradeAllowanceCharge;
    }

    /**
     * @param  TradeAllowanceChargeType $specifiedTradeAllowanceCharge
     * @return static
     */
    public function addOnceToSpecifiedTradeAllowanceCharge(
        TradeAllowanceChargeType $specifiedTradeAllowanceCharge,
    ): static {
        if (!is_array($this->specifiedTradeAllowanceCharge)) {
            $this->specifiedTradeAllowanceCharge = [];
        }

        $this->specifiedTradeAllowanceCharge[0] = $specifiedTradeAllowanceCharge;

        return $this;
    }

    /**
     * @return TradeAllowanceChargeType
     */
    public function addOnceToSpecifiedTradeAllowanceChargeWithCreate(): TradeAllowanceChargeType
    {
        if (!is_array($this->specifiedTradeAllowanceCharge)) {
            $this->specifiedTradeAllowanceCharge = [];
        }

        if ([] === $this->specifiedTradeAllowanceCharge) {
            $this->addOnceToSpecifiedTradeAllowanceCharge(new TradeAllowanceChargeType());
        }

        return $this->specifiedTradeAllowanceCharge[0];
    }

    /**
     * @return null|TradeSettlementLineMonetarySummationType
     */
    public function getSpecifiedTradeSettlementLineMonetarySummation(): ?TradeSettlementLineMonetarySummationType
    {
        return $this->specifiedTradeSettlementLineMonetarySummation;
    }

    /**
     * @return TradeSettlementLineMonetarySummationType
     */
    public function getSpecifiedTradeSettlementLineMonetarySummationWithCreate(): TradeSettlementLineMonetarySummationType
    {
        $this->specifiedTradeSettlementLineMonetarySummation ??= new TradeSettlementLineMonetarySummationType();

        return $this->specifiedTradeSettlementLineMonetarySummation;
    }

    /**
     * @param  null|TradeSettlementLineMonetarySummationType $specifiedTradeSettlementLineMonetarySummation
     * @return static
     */
    public function setSpecifiedTradeSettlementLineMonetarySummation(
        ?TradeSettlementLineMonetarySummationType $specifiedTradeSettlementLineMonetarySummation = null,
    ): static {
        $this->specifiedTradeSettlementLineMonetarySummation = $specifiedTradeSettlementLineMonetarySummation;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSpecifiedTradeSettlementLineMonetarySummation(): static
    {
        $this->specifiedTradeSettlementLineMonetarySummation = null;

        return $this;
    }

    /**
     * @return null|ReferencedDocumentType
     */
    public function getInvoiceReferencedDocument(): ?ReferencedDocumentType
    {
        return $this->invoiceReferencedDocument;
    }

    /**
     * @return ReferencedDocumentType
     */
    public function getInvoiceReferencedDocumentWithCreate(): ReferencedDocumentType
    {
        $this->invoiceReferencedDocument ??= new ReferencedDocumentType();

        return $this->invoiceReferencedDocument;
    }

    /**
     * @param  null|ReferencedDocumentType $invoiceReferencedDocument
     * @return static
     */
    public function setInvoiceReferencedDocument(
        ?ReferencedDocumentType $invoiceReferencedDocument = null
    ): static {
        $this->invoiceReferencedDocument = $invoiceReferencedDocument;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetInvoiceReferencedDocument(): static
    {
        $this->invoiceReferencedDocument = null;

        return $this;
    }

    /**
     * @return null|array<ReferencedDocumentType>
     */
    public function getAdditionalReferencedDocument(): ?array
    {
        return $this->additionalReferencedDocument;
    }

    /**
     * @param  null|array<ReferencedDocumentType> $additionalReferencedDocument
     * @return static
     */
    public function setAdditionalReferencedDocument(
        ?array $additionalReferencedDocument = null
    ): static {
        $this->additionalReferencedDocument = $additionalReferencedDocument;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAdditionalReferencedDocument(): static
    {
        $this->additionalReferencedDocument = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearAdditionalReferencedDocument(): static
    {
        $this->additionalReferencedDocument = [];

        return $this;
    }

    /**
     * @param  ReferencedDocumentType $additionalReferencedDocument
     * @return static
     */
    public function addToAdditionalReferencedDocument(
        ReferencedDocumentType $additionalReferencedDocument
    ): static {
        $this->additionalReferencedDocument[] = $additionalReferencedDocument;

        return $this;
    }

    /**
     * @return ReferencedDocumentType
     */
    public function addToAdditionalReferencedDocumentWithCreate(): ReferencedDocumentType
    {
        $this->addToAdditionalReferencedDocument($additionalReferencedDocument = new ReferencedDocumentType());

        return $additionalReferencedDocument;
    }

    /**
     * @param  ReferencedDocumentType $additionalReferencedDocument
     * @return static
     */
    public function addOnceToAdditionalReferencedDocument(
        ReferencedDocumentType $additionalReferencedDocument
    ): static {
        if (!is_array($this->additionalReferencedDocument)) {
            $this->additionalReferencedDocument = [];
        }

        $this->additionalReferencedDocument[0] = $additionalReferencedDocument;

        return $this;
    }

    /**
     * @return ReferencedDocumentType
     */
    public function addOnceToAdditionalReferencedDocumentWithCreate(): ReferencedDocumentType
    {
        if (!is_array($this->additionalReferencedDocument)) {
            $this->additionalReferencedDocument = [];
        }

        if ([] === $this->additionalReferencedDocument) {
            $this->addOnceToAdditionalReferencedDocument(new ReferencedDocumentType());
        }

        return $this->additionalReferencedDocument[0];
    }

    /**
     * @return null|array<TradeAccountingAccountType>
     */
    public function getReceivableSpecifiedTradeAccountingAccount(): ?array
    {
        return $this->receivableSpecifiedTradeAccountingAccount;
    }

    /**
     * @param  null|array<TradeAccountingAccountType> $receivableSpecifiedTradeAccountingAccount
     * @return static
     */
    public function setReceivableSpecifiedTradeAccountingAccount(
        ?array $receivableSpecifiedTradeAccountingAccount = null,
    ): static {
        $this->receivableSpecifiedTradeAccountingAccount = $receivableSpecifiedTradeAccountingAccount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetReceivableSpecifiedTradeAccountingAccount(): static
    {
        $this->receivableSpecifiedTradeAccountingAccount = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearReceivableSpecifiedTradeAccountingAccount(): static
    {
        $this->receivableSpecifiedTradeAccountingAccount = [];

        return $this;
    }

    /**
     * @param  TradeAccountingAccountType $receivableSpecifiedTradeAccountingAccount
     * @return static
     */
    public function addToReceivableSpecifiedTradeAccountingAccount(
        TradeAccountingAccountType $receivableSpecifiedTradeAccountingAccount,
    ): static {
        $this->receivableSpecifiedTradeAccountingAccount[] = $receivableSpecifiedTradeAccountingAccount;

        return $this;
    }

    /**
     * @return TradeAccountingAccountType
     */
    public function addToReceivableSpecifiedTradeAccountingAccountWithCreate(): TradeAccountingAccountType
    {
        $this->addToReceivableSpecifiedTradeAccountingAccount($receivableSpecifiedTradeAccountingAccount = new TradeAccountingAccountType());

        return $receivableSpecifiedTradeAccountingAccount;
    }

    /**
     * @param  TradeAccountingAccountType $receivableSpecifiedTradeAccountingAccount
     * @return static
     */
    public function addOnceToReceivableSpecifiedTradeAccountingAccount(
        TradeAccountingAccountType $receivableSpecifiedTradeAccountingAccount,
    ): static {
        if (!is_array($this->receivableSpecifiedTradeAccountingAccount)) {
            $this->receivableSpecifiedTradeAccountingAccount = [];
        }

        $this->receivableSpecifiedTradeAccountingAccount[0] = $receivableSpecifiedTradeAccountingAccount;

        return $this;
    }

    /**
     * @return TradeAccountingAccountType
     */
    public function addOnceToReceivableSpecifiedTradeAccountingAccountWithCreate(): TradeAccountingAccountType
    {
        if (!is_array($this->receivableSpecifiedTradeAccountingAccount)) {
            $this->receivableSpecifiedTradeAccountingAccount = [];
        }

        if ([] === $this->receivableSpecifiedTradeAccountingAccount) {
            $this->addOnceToReceivableSpecifiedTradeAccountingAccount(new TradeAccountingAccountType());
        }

        return $this->receivableSpecifiedTradeAccountingAccount[0];
    }
}
