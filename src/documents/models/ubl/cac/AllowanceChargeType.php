<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\ubl\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\ubl\cbc\AccountingCost;
use horstoeko\invoicesuite\documents\models\ubl\cbc\AccountingCostCode;
use horstoeko\invoicesuite\documents\models\ubl\cbc\AllowanceChargeReason;
use horstoeko\invoicesuite\documents\models\ubl\cbc\AllowanceChargeReasonCode;
use horstoeko\invoicesuite\documents\models\ubl\cbc\Amount;
use horstoeko\invoicesuite\documents\models\ubl\cbc\BaseAmount;
use horstoeko\invoicesuite\documents\models\ubl\cbc\ID;
use horstoeko\invoicesuite\documents\models\ubl\cbc\MultiplierFactorNumeric;
use horstoeko\invoicesuite\documents\models\ubl\cbc\PerUnitAmount;
use horstoeko\invoicesuite\documents\models\ubl\cbc\SequenceNumeric;
use JMS\Serializer\Annotation as JMS;

class AllowanceChargeType
{
    use HandlesObjectFlags;

    /**
     * @var null|ID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\ID")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var null|bool
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("ChargeIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getChargeIndicator", setter="setChargeIndicator")
     */
    private $chargeIndicator;

    /**
     * @var null|AllowanceChargeReasonCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\AllowanceChargeReasonCode")
     * @JMS\Expose
     * @JMS\SerializedName("AllowanceChargeReasonCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAllowanceChargeReasonCode", setter="setAllowanceChargeReasonCode")
     */
    private $allowanceChargeReasonCode;

    /**
     * @var null|array<AllowanceChargeReason>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cbc\AllowanceChargeReason>")
     * @JMS\Expose
     * @JMS\SerializedName("AllowanceChargeReason")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="AllowanceChargeReason", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getAllowanceChargeReason", setter="setAllowanceChargeReason")
     */
    private $allowanceChargeReason;

    /**
     * @var null|MultiplierFactorNumeric
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\MultiplierFactorNumeric")
     * @JMS\Expose
     * @JMS\SerializedName("MultiplierFactorNumeric")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMultiplierFactorNumeric", setter="setMultiplierFactorNumeric")
     */
    private $multiplierFactorNumeric;

    /**
     * @var null|bool
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("PrepaidIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPrepaidIndicator", setter="setPrepaidIndicator")
     */
    private $prepaidIndicator;

    /**
     * @var null|SequenceNumeric
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\SequenceNumeric")
     * @JMS\Expose
     * @JMS\SerializedName("SequenceNumeric")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSequenceNumeric", setter="setSequenceNumeric")
     */
    private $sequenceNumeric;

    /**
     * @var null|Amount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\Amount")
     * @JMS\Expose
     * @JMS\SerializedName("Amount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAmount", setter="setAmount")
     */
    private $amount;

    /**
     * @var null|BaseAmount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\BaseAmount")
     * @JMS\Expose
     * @JMS\SerializedName("BaseAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getBaseAmount", setter="setBaseAmount")
     */
    private $baseAmount;

    /**
     * @var null|AccountingCostCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\AccountingCostCode")
     * @JMS\Expose
     * @JMS\SerializedName("AccountingCostCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAccountingCostCode", setter="setAccountingCostCode")
     */
    private $accountingCostCode;

    /**
     * @var null|AccountingCost
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\AccountingCost")
     * @JMS\Expose
     * @JMS\SerializedName("AccountingCost")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAccountingCost", setter="setAccountingCost")
     */
    private $accountingCost;

    /**
     * @var null|PerUnitAmount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\PerUnitAmount")
     * @JMS\Expose
     * @JMS\SerializedName("PerUnitAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPerUnitAmount", setter="setPerUnitAmount")
     */
    private $perUnitAmount;

    /**
     * @var null|array<TaxCategory>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\TaxCategory>")
     * @JMS\Expose
     * @JMS\SerializedName("TaxCategory")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TaxCategory", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getTaxCategory", setter="setTaxCategory")
     */
    private $taxCategory;

    /**
     * @var null|TaxTotal
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\TaxTotal")
     * @JMS\Expose
     * @JMS\SerializedName("TaxTotal")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTaxTotal", setter="setTaxTotal")
     */
    private $taxTotal;

    /**
     * @var null|array<PaymentMeans>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\PaymentMeans>")
     * @JMS\Expose
     * @JMS\SerializedName("PaymentMeans")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PaymentMeans", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getPaymentMeans", setter="setPaymentMeans")
     */
    private $paymentMeans;

    /**
     * @return null|ID
     */
    public function getID(): ?ID
    {
        return $this->iD;
    }

    /**
     * @return ID
     */
    public function getIDWithCreate(): ID
    {
        $this->iD = is_null($this->iD) ? new ID() : $this->iD;

        return $this->iD;
    }

    /**
     * @param  null|ID $iD
     * @return static
     */
    public function setID(?ID $iD = null): static
    {
        $this->iD = $iD;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetID(): static
    {
        $this->iD = null;

        return $this;
    }

    /**
     * @return null|bool
     */
    public function getChargeIndicator(): ?bool
    {
        return $this->chargeIndicator;
    }

    /**
     * @param  null|bool $chargeIndicator
     * @return static
     */
    public function setChargeIndicator(?bool $chargeIndicator = null): static
    {
        $this->chargeIndicator = $chargeIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetChargeIndicator(): static
    {
        $this->chargeIndicator = null;

        return $this;
    }

    /**
     * @return null|AllowanceChargeReasonCode
     */
    public function getAllowanceChargeReasonCode(): ?AllowanceChargeReasonCode
    {
        return $this->allowanceChargeReasonCode;
    }

    /**
     * @return AllowanceChargeReasonCode
     */
    public function getAllowanceChargeReasonCodeWithCreate(): AllowanceChargeReasonCode
    {
        $this->allowanceChargeReasonCode = is_null($this->allowanceChargeReasonCode) ? new AllowanceChargeReasonCode() : $this->allowanceChargeReasonCode;

        return $this->allowanceChargeReasonCode;
    }

    /**
     * @param  null|AllowanceChargeReasonCode $allowanceChargeReasonCode
     * @return static
     */
    public function setAllowanceChargeReasonCode(?AllowanceChargeReasonCode $allowanceChargeReasonCode = null): static
    {
        $this->allowanceChargeReasonCode = $allowanceChargeReasonCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAllowanceChargeReasonCode(): static
    {
        $this->allowanceChargeReasonCode = null;

        return $this;
    }

    /**
     * @return null|array<AllowanceChargeReason>
     */
    public function getAllowanceChargeReason(): ?array
    {
        return $this->allowanceChargeReason;
    }

    /**
     * @param  null|array<AllowanceChargeReason> $allowanceChargeReason
     * @return static
     */
    public function setAllowanceChargeReason(?array $allowanceChargeReason = null): static
    {
        $this->allowanceChargeReason = $allowanceChargeReason;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAllowanceChargeReason(): static
    {
        $this->allowanceChargeReason = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearAllowanceChargeReason(): static
    {
        $this->allowanceChargeReason = [];

        return $this;
    }

    /**
     * @return null|AllowanceChargeReason
     */
    public function firstAllowanceChargeReason(): ?AllowanceChargeReason
    {
        $allowanceChargeReason = $this->allowanceChargeReason ?? [];
        $allowanceChargeReason = reset($allowanceChargeReason);

        if (false === $allowanceChargeReason) {
            return null;
        }

        return $allowanceChargeReason;
    }

    /**
     * @return null|AllowanceChargeReason
     */
    public function lastAllowanceChargeReason(): ?AllowanceChargeReason
    {
        $allowanceChargeReason = $this->allowanceChargeReason ?? [];
        $allowanceChargeReason = end($allowanceChargeReason);

        if (false === $allowanceChargeReason) {
            return null;
        }

        return $allowanceChargeReason;
    }

    /**
     * @param  AllowanceChargeReason $allowanceChargeReason
     * @return static
     */
    public function addToAllowanceChargeReason(AllowanceChargeReason $allowanceChargeReason): static
    {
        $this->allowanceChargeReason[] = $allowanceChargeReason;

        return $this;
    }

    /**
     * @return AllowanceChargeReason
     */
    public function addToAllowanceChargeReasonWithCreate(): AllowanceChargeReason
    {
        $this->addToallowanceChargeReason($allowanceChargeReason = new AllowanceChargeReason());

        return $allowanceChargeReason;
    }

    /**
     * @param  AllowanceChargeReason $allowanceChargeReason
     * @return static
     */
    public function addOnceToAllowanceChargeReason(AllowanceChargeReason $allowanceChargeReason): static
    {
        if (!is_array($this->allowanceChargeReason)) {
            $this->allowanceChargeReason = [];
        }

        $this->allowanceChargeReason[0] = $allowanceChargeReason;

        return $this;
    }

    /**
     * @return AllowanceChargeReason
     */
    public function addOnceToAllowanceChargeReasonWithCreate(): AllowanceChargeReason
    {
        if (!is_array($this->allowanceChargeReason)) {
            $this->allowanceChargeReason = [];
        }

        if ([] === $this->allowanceChargeReason) {
            $this->addOnceToallowanceChargeReason(new AllowanceChargeReason());
        }

        return $this->allowanceChargeReason[0];
    }

    /**
     * @return null|MultiplierFactorNumeric
     */
    public function getMultiplierFactorNumeric(): ?MultiplierFactorNumeric
    {
        return $this->multiplierFactorNumeric;
    }

    /**
     * @return MultiplierFactorNumeric
     */
    public function getMultiplierFactorNumericWithCreate(): MultiplierFactorNumeric
    {
        $this->multiplierFactorNumeric = is_null($this->multiplierFactorNumeric) ? new MultiplierFactorNumeric() : $this->multiplierFactorNumeric;

        return $this->multiplierFactorNumeric;
    }

    /**
     * @param  null|MultiplierFactorNumeric $multiplierFactorNumeric
     * @return static
     */
    public function setMultiplierFactorNumeric(?MultiplierFactorNumeric $multiplierFactorNumeric = null): static
    {
        $this->multiplierFactorNumeric = $multiplierFactorNumeric;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMultiplierFactorNumeric(): static
    {
        $this->multiplierFactorNumeric = null;

        return $this;
    }

    /**
     * @return null|bool
     */
    public function getPrepaidIndicator(): ?bool
    {
        return $this->prepaidIndicator;
    }

    /**
     * @param  null|bool $prepaidIndicator
     * @return static
     */
    public function setPrepaidIndicator(?bool $prepaidIndicator = null): static
    {
        $this->prepaidIndicator = $prepaidIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPrepaidIndicator(): static
    {
        $this->prepaidIndicator = null;

        return $this;
    }

    /**
     * @return null|SequenceNumeric
     */
    public function getSequenceNumeric(): ?SequenceNumeric
    {
        return $this->sequenceNumeric;
    }

    /**
     * @return SequenceNumeric
     */
    public function getSequenceNumericWithCreate(): SequenceNumeric
    {
        $this->sequenceNumeric = is_null($this->sequenceNumeric) ? new SequenceNumeric() : $this->sequenceNumeric;

        return $this->sequenceNumeric;
    }

    /**
     * @param  null|SequenceNumeric $sequenceNumeric
     * @return static
     */
    public function setSequenceNumeric(?SequenceNumeric $sequenceNumeric = null): static
    {
        $this->sequenceNumeric = $sequenceNumeric;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSequenceNumeric(): static
    {
        $this->sequenceNumeric = null;

        return $this;
    }

    /**
     * @return null|Amount
     */
    public function getAmount(): ?Amount
    {
        return $this->amount;
    }

    /**
     * @return Amount
     */
    public function getAmountWithCreate(): Amount
    {
        $this->amount = is_null($this->amount) ? new Amount() : $this->amount;

        return $this->amount;
    }

    /**
     * @param  null|Amount $amount
     * @return static
     */
    public function setAmount(?Amount $amount = null): static
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAmount(): static
    {
        $this->amount = null;

        return $this;
    }

    /**
     * @return null|BaseAmount
     */
    public function getBaseAmount(): ?BaseAmount
    {
        return $this->baseAmount;
    }

    /**
     * @return BaseAmount
     */
    public function getBaseAmountWithCreate(): BaseAmount
    {
        $this->baseAmount = is_null($this->baseAmount) ? new BaseAmount() : $this->baseAmount;

        return $this->baseAmount;
    }

    /**
     * @param  null|BaseAmount $baseAmount
     * @return static
     */
    public function setBaseAmount(?BaseAmount $baseAmount = null): static
    {
        $this->baseAmount = $baseAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetBaseAmount(): static
    {
        $this->baseAmount = null;

        return $this;
    }

    /**
     * @return null|AccountingCostCode
     */
    public function getAccountingCostCode(): ?AccountingCostCode
    {
        return $this->accountingCostCode;
    }

    /**
     * @return AccountingCostCode
     */
    public function getAccountingCostCodeWithCreate(): AccountingCostCode
    {
        $this->accountingCostCode = is_null($this->accountingCostCode) ? new AccountingCostCode() : $this->accountingCostCode;

        return $this->accountingCostCode;
    }

    /**
     * @param  null|AccountingCostCode $accountingCostCode
     * @return static
     */
    public function setAccountingCostCode(?AccountingCostCode $accountingCostCode = null): static
    {
        $this->accountingCostCode = $accountingCostCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAccountingCostCode(): static
    {
        $this->accountingCostCode = null;

        return $this;
    }

    /**
     * @return null|AccountingCost
     */
    public function getAccountingCost(): ?AccountingCost
    {
        return $this->accountingCost;
    }

    /**
     * @return AccountingCost
     */
    public function getAccountingCostWithCreate(): AccountingCost
    {
        $this->accountingCost = is_null($this->accountingCost) ? new AccountingCost() : $this->accountingCost;

        return $this->accountingCost;
    }

    /**
     * @param  null|AccountingCost $accountingCost
     * @return static
     */
    public function setAccountingCost(?AccountingCost $accountingCost = null): static
    {
        $this->accountingCost = $accountingCost;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAccountingCost(): static
    {
        $this->accountingCost = null;

        return $this;
    }

    /**
     * @return null|PerUnitAmount
     */
    public function getPerUnitAmount(): ?PerUnitAmount
    {
        return $this->perUnitAmount;
    }

    /**
     * @return PerUnitAmount
     */
    public function getPerUnitAmountWithCreate(): PerUnitAmount
    {
        $this->perUnitAmount = is_null($this->perUnitAmount) ? new PerUnitAmount() : $this->perUnitAmount;

        return $this->perUnitAmount;
    }

    /**
     * @param  null|PerUnitAmount $perUnitAmount
     * @return static
     */
    public function setPerUnitAmount(?PerUnitAmount $perUnitAmount = null): static
    {
        $this->perUnitAmount = $perUnitAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPerUnitAmount(): static
    {
        $this->perUnitAmount = null;

        return $this;
    }

    /**
     * @return null|array<TaxCategory>
     */
    public function getTaxCategory(): ?array
    {
        return $this->taxCategory;
    }

    /**
     * @param  null|array<TaxCategory> $taxCategory
     * @return static
     */
    public function setTaxCategory(?array $taxCategory = null): static
    {
        $this->taxCategory = $taxCategory;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTaxCategory(): static
    {
        $this->taxCategory = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearTaxCategory(): static
    {
        $this->taxCategory = [];

        return $this;
    }

    /**
     * @return null|TaxCategory
     */
    public function firstTaxCategory(): ?TaxCategory
    {
        $taxCategory = $this->taxCategory ?? [];
        $taxCategory = reset($taxCategory);

        if (false === $taxCategory) {
            return null;
        }

        return $taxCategory;
    }

    /**
     * @return null|TaxCategory
     */
    public function lastTaxCategory(): ?TaxCategory
    {
        $taxCategory = $this->taxCategory ?? [];
        $taxCategory = end($taxCategory);

        if (false === $taxCategory) {
            return null;
        }

        return $taxCategory;
    }

    /**
     * @param  TaxCategory $taxCategory
     * @return static
     */
    public function addToTaxCategory(TaxCategory $taxCategory): static
    {
        $this->taxCategory[] = $taxCategory;

        return $this;
    }

    /**
     * @return TaxCategory
     */
    public function addToTaxCategoryWithCreate(): TaxCategory
    {
        $this->addTotaxCategory($taxCategory = new TaxCategory());

        return $taxCategory;
    }

    /**
     * @param  TaxCategory $taxCategory
     * @return static
     */
    public function addOnceToTaxCategory(TaxCategory $taxCategory): static
    {
        if (!is_array($this->taxCategory)) {
            $this->taxCategory = [];
        }

        $this->taxCategory[0] = $taxCategory;

        return $this;
    }

    /**
     * @return TaxCategory
     */
    public function addOnceToTaxCategoryWithCreate(): TaxCategory
    {
        if (!is_array($this->taxCategory)) {
            $this->taxCategory = [];
        }

        if ([] === $this->taxCategory) {
            $this->addOnceTotaxCategory(new TaxCategory());
        }

        return $this->taxCategory[0];
    }

    /**
     * @return null|TaxTotal
     */
    public function getTaxTotal(): ?TaxTotal
    {
        return $this->taxTotal;
    }

    /**
     * @return TaxTotal
     */
    public function getTaxTotalWithCreate(): TaxTotal
    {
        $this->taxTotal = is_null($this->taxTotal) ? new TaxTotal() : $this->taxTotal;

        return $this->taxTotal;
    }

    /**
     * @param  null|TaxTotal $taxTotal
     * @return static
     */
    public function setTaxTotal(?TaxTotal $taxTotal = null): static
    {
        $this->taxTotal = $taxTotal;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTaxTotal(): static
    {
        $this->taxTotal = null;

        return $this;
    }

    /**
     * @return null|array<PaymentMeans>
     */
    public function getPaymentMeans(): ?array
    {
        return $this->paymentMeans;
    }

    /**
     * @param  null|array<PaymentMeans> $paymentMeans
     * @return static
     */
    public function setPaymentMeans(?array $paymentMeans = null): static
    {
        $this->paymentMeans = $paymentMeans;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPaymentMeans(): static
    {
        $this->paymentMeans = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearPaymentMeans(): static
    {
        $this->paymentMeans = [];

        return $this;
    }

    /**
     * @return null|PaymentMeans
     */
    public function firstPaymentMeans(): ?PaymentMeans
    {
        $paymentMeans = $this->paymentMeans ?? [];
        $paymentMeans = reset($paymentMeans);

        if (false === $paymentMeans) {
            return null;
        }

        return $paymentMeans;
    }

    /**
     * @return null|PaymentMeans
     */
    public function lastPaymentMeans(): ?PaymentMeans
    {
        $paymentMeans = $this->paymentMeans ?? [];
        $paymentMeans = end($paymentMeans);

        if (false === $paymentMeans) {
            return null;
        }

        return $paymentMeans;
    }

    /**
     * @param  PaymentMeans $paymentMeans
     * @return static
     */
    public function addToPaymentMeans(PaymentMeans $paymentMeans): static
    {
        $this->paymentMeans[] = $paymentMeans;

        return $this;
    }

    /**
     * @return PaymentMeans
     */
    public function addToPaymentMeansWithCreate(): PaymentMeans
    {
        $this->addTopaymentMeans($paymentMeans = new PaymentMeans());

        return $paymentMeans;
    }

    /**
     * @param  PaymentMeans $paymentMeans
     * @return static
     */
    public function addOnceToPaymentMeans(PaymentMeans $paymentMeans): static
    {
        if (!is_array($this->paymentMeans)) {
            $this->paymentMeans = [];
        }

        $this->paymentMeans[0] = $paymentMeans;

        return $this;
    }

    /**
     * @return PaymentMeans
     */
    public function addOnceToPaymentMeansWithCreate(): PaymentMeans
    {
        if (!is_array($this->paymentMeans)) {
            $this->paymentMeans = [];
        }

        if ([] === $this->paymentMeans) {
            $this->addOnceTopaymentMeans(new PaymentMeans());
        }

        return $this->paymentMeans[0];
    }
}
