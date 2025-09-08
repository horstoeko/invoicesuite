<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\AccountingCost;
use horstoeko\invoicesuite\models\ubl\cbc\AccountingCostCode;
use horstoeko\invoicesuite\models\ubl\cbc\AllowanceChargeReason;
use horstoeko\invoicesuite\models\ubl\cbc\AllowanceChargeReasonCode;
use horstoeko\invoicesuite\models\ubl\cbc\Amount;
use horstoeko\invoicesuite\models\ubl\cbc\BaseAmount;
use horstoeko\invoicesuite\models\ubl\cbc\ID;
use horstoeko\invoicesuite\models\ubl\cbc\MultiplierFactorNumeric;
use horstoeko\invoicesuite\models\ubl\cbc\PerUnitAmount;
use horstoeko\invoicesuite\models\ubl\cbc\SequenceNumeric;

class AllowanceChargeType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ID")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var bool|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("ChargeIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getChargeIndicator", setter="setChargeIndicator")
     */
    private $chargeIndicator;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\AllowanceChargeReasonCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\AllowanceChargeReasonCode")
     * @JMS\Expose
     * @JMS\SerializedName("AllowanceChargeReasonCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAllowanceChargeReasonCode", setter="setAllowanceChargeReasonCode")
     */
    private $allowanceChargeReasonCode;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\AllowanceChargeReason>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\AllowanceChargeReason>")
     * @JMS\Expose
     * @JMS\SerializedName("AllowanceChargeReason")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="AllowanceChargeReason", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getAllowanceChargeReason", setter="setAllowanceChargeReason")
     */
    private $allowanceChargeReason;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\MultiplierFactorNumeric|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\MultiplierFactorNumeric")
     * @JMS\Expose
     * @JMS\SerializedName("MultiplierFactorNumeric")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMultiplierFactorNumeric", setter="setMultiplierFactorNumeric")
     */
    private $multiplierFactorNumeric;

    /**
     * @var bool|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("PrepaidIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPrepaidIndicator", setter="setPrepaidIndicator")
     */
    private $prepaidIndicator;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\SequenceNumeric|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\SequenceNumeric")
     * @JMS\Expose
     * @JMS\SerializedName("SequenceNumeric")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSequenceNumeric", setter="setSequenceNumeric")
     */
    private $sequenceNumeric;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\Amount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\Amount")
     * @JMS\Expose
     * @JMS\SerializedName("Amount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAmount", setter="setAmount")
     */
    private $amount;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\BaseAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\BaseAmount")
     * @JMS\Expose
     * @JMS\SerializedName("BaseAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getBaseAmount", setter="setBaseAmount")
     */
    private $baseAmount;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\AccountingCostCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\AccountingCostCode")
     * @JMS\Expose
     * @JMS\SerializedName("AccountingCostCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAccountingCostCode", setter="setAccountingCostCode")
     */
    private $accountingCostCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\AccountingCost|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\AccountingCost")
     * @JMS\Expose
     * @JMS\SerializedName("AccountingCost")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAccountingCost", setter="setAccountingCost")
     */
    private $accountingCost;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\PerUnitAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\PerUnitAmount")
     * @JMS\Expose
     * @JMS\SerializedName("PerUnitAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPerUnitAmount", setter="setPerUnitAmount")
     */
    private $perUnitAmount;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\TaxCategory>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\TaxCategory>")
     * @JMS\Expose
     * @JMS\SerializedName("TaxCategory")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TaxCategory", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getTaxCategory", setter="setTaxCategory")
     */
    private $taxCategory;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\TaxTotal|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\TaxTotal")
     * @JMS\Expose
     * @JMS\SerializedName("TaxTotal")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTaxTotal", setter="setTaxTotal")
     */
    private $taxTotal;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\PaymentMeans>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\PaymentMeans>")
     * @JMS\Expose
     * @JMS\SerializedName("PaymentMeans")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PaymentMeans", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getPaymentMeans", setter="setPaymentMeans")
     */
    private $paymentMeans;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ID|null
     */
    public function getID(): ?ID
    {
        return $this->iD;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ID
     */
    public function getIDWithCreate(): ID
    {
        $this->iD = is_null($this->iD) ? new ID() : $this->iD;

        return $this->iD;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ID|null $iD
     * @return self
     */
    public function setID(?ID $iD = null): self
    {
        $this->iD = $iD;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetID(): self
    {
        $this->iD = null;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getChargeIndicator(): ?bool
    {
        return $this->chargeIndicator;
    }

    /**
     * @param bool|null $chargeIndicator
     * @return self
     */
    public function setChargeIndicator(?bool $chargeIndicator = null): self
    {
        $this->chargeIndicator = $chargeIndicator;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetChargeIndicator(): self
    {
        $this->chargeIndicator = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\AllowanceChargeReasonCode|null
     */
    public function getAllowanceChargeReasonCode(): ?AllowanceChargeReasonCode
    {
        return $this->allowanceChargeReasonCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\AllowanceChargeReasonCode
     */
    public function getAllowanceChargeReasonCodeWithCreate(): AllowanceChargeReasonCode
    {
        $this->allowanceChargeReasonCode = is_null($this->allowanceChargeReasonCode) ? new AllowanceChargeReasonCode() : $this->allowanceChargeReasonCode;

        return $this->allowanceChargeReasonCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\AllowanceChargeReasonCode|null $allowanceChargeReasonCode
     * @return self
     */
    public function setAllowanceChargeReasonCode(?AllowanceChargeReasonCode $allowanceChargeReasonCode = null): self
    {
        $this->allowanceChargeReasonCode = $allowanceChargeReasonCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetAllowanceChargeReasonCode(): self
    {
        $this->allowanceChargeReasonCode = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\AllowanceChargeReason>|null
     */
    public function getAllowanceChargeReason(): ?array
    {
        return $this->allowanceChargeReason;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\AllowanceChargeReason>|null $allowanceChargeReason
     * @return self
     */
    public function setAllowanceChargeReason(?array $allowanceChargeReason = null): self
    {
        $this->allowanceChargeReason = $allowanceChargeReason;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetAllowanceChargeReason(): self
    {
        $this->allowanceChargeReason = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearAllowanceChargeReason(): self
    {
        $this->allowanceChargeReason = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\AllowanceChargeReason $allowanceChargeReason
     * @return self
     */
    public function addToAllowanceChargeReason(AllowanceChargeReason $allowanceChargeReason): self
    {
        $this->allowanceChargeReason[] = $allowanceChargeReason;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\AllowanceChargeReason
     */
    public function addToAllowanceChargeReasonWithCreate(): AllowanceChargeReason
    {
        $this->addToallowanceChargeReason($allowanceChargeReason = new AllowanceChargeReason());

        return $allowanceChargeReason;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\AllowanceChargeReason $allowanceChargeReason
     * @return self
     */
    public function addOnceToAllowanceChargeReason(AllowanceChargeReason $allowanceChargeReason): self
    {
        if (!is_array($this->allowanceChargeReason)) {
            $this->allowanceChargeReason = [];
        }

        $this->allowanceChargeReason[0] = $allowanceChargeReason;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\AllowanceChargeReason
     */
    public function addOnceToAllowanceChargeReasonWithCreate(): AllowanceChargeReason
    {
        if (!is_array($this->allowanceChargeReason)) {
            $this->allowanceChargeReason = [];
        }

        if ($this->allowanceChargeReason === []) {
            $this->addOnceToallowanceChargeReason(new AllowanceChargeReason());
        }

        return $this->allowanceChargeReason[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MultiplierFactorNumeric|null
     */
    public function getMultiplierFactorNumeric(): ?MultiplierFactorNumeric
    {
        return $this->multiplierFactorNumeric;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MultiplierFactorNumeric
     */
    public function getMultiplierFactorNumericWithCreate(): MultiplierFactorNumeric
    {
        $this->multiplierFactorNumeric = is_null($this->multiplierFactorNumeric) ? new MultiplierFactorNumeric() : $this->multiplierFactorNumeric;

        return $this->multiplierFactorNumeric;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\MultiplierFactorNumeric|null $multiplierFactorNumeric
     * @return self
     */
    public function setMultiplierFactorNumeric(?MultiplierFactorNumeric $multiplierFactorNumeric = null): self
    {
        $this->multiplierFactorNumeric = $multiplierFactorNumeric;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetMultiplierFactorNumeric(): self
    {
        $this->multiplierFactorNumeric = null;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getPrepaidIndicator(): ?bool
    {
        return $this->prepaidIndicator;
    }

    /**
     * @param bool|null $prepaidIndicator
     * @return self
     */
    public function setPrepaidIndicator(?bool $prepaidIndicator = null): self
    {
        $this->prepaidIndicator = $prepaidIndicator;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPrepaidIndicator(): self
    {
        $this->prepaidIndicator = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\SequenceNumeric|null
     */
    public function getSequenceNumeric(): ?SequenceNumeric
    {
        return $this->sequenceNumeric;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\SequenceNumeric
     */
    public function getSequenceNumericWithCreate(): SequenceNumeric
    {
        $this->sequenceNumeric = is_null($this->sequenceNumeric) ? new SequenceNumeric() : $this->sequenceNumeric;

        return $this->sequenceNumeric;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\SequenceNumeric|null $sequenceNumeric
     * @return self
     */
    public function setSequenceNumeric(?SequenceNumeric $sequenceNumeric = null): self
    {
        $this->sequenceNumeric = $sequenceNumeric;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSequenceNumeric(): self
    {
        $this->sequenceNumeric = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Amount|null
     */
    public function getAmount(): ?Amount
    {
        return $this->amount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Amount
     */
    public function getAmountWithCreate(): Amount
    {
        $this->amount = is_null($this->amount) ? new Amount() : $this->amount;

        return $this->amount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Amount|null $amount
     * @return self
     */
    public function setAmount(?Amount $amount = null): self
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetAmount(): self
    {
        $this->amount = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\BaseAmount|null
     */
    public function getBaseAmount(): ?BaseAmount
    {
        return $this->baseAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\BaseAmount
     */
    public function getBaseAmountWithCreate(): BaseAmount
    {
        $this->baseAmount = is_null($this->baseAmount) ? new BaseAmount() : $this->baseAmount;

        return $this->baseAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\BaseAmount|null $baseAmount
     * @return self
     */
    public function setBaseAmount(?BaseAmount $baseAmount = null): self
    {
        $this->baseAmount = $baseAmount;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetBaseAmount(): self
    {
        $this->baseAmount = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\AccountingCostCode|null
     */
    public function getAccountingCostCode(): ?AccountingCostCode
    {
        return $this->accountingCostCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\AccountingCostCode
     */
    public function getAccountingCostCodeWithCreate(): AccountingCostCode
    {
        $this->accountingCostCode = is_null($this->accountingCostCode) ? new AccountingCostCode() : $this->accountingCostCode;

        return $this->accountingCostCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\AccountingCostCode|null $accountingCostCode
     * @return self
     */
    public function setAccountingCostCode(?AccountingCostCode $accountingCostCode = null): self
    {
        $this->accountingCostCode = $accountingCostCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetAccountingCostCode(): self
    {
        $this->accountingCostCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\AccountingCost|null
     */
    public function getAccountingCost(): ?AccountingCost
    {
        return $this->accountingCost;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\AccountingCost
     */
    public function getAccountingCostWithCreate(): AccountingCost
    {
        $this->accountingCost = is_null($this->accountingCost) ? new AccountingCost() : $this->accountingCost;

        return $this->accountingCost;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\AccountingCost|null $accountingCost
     * @return self
     */
    public function setAccountingCost(?AccountingCost $accountingCost = null): self
    {
        $this->accountingCost = $accountingCost;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetAccountingCost(): self
    {
        $this->accountingCost = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PerUnitAmount|null
     */
    public function getPerUnitAmount(): ?PerUnitAmount
    {
        return $this->perUnitAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PerUnitAmount
     */
    public function getPerUnitAmountWithCreate(): PerUnitAmount
    {
        $this->perUnitAmount = is_null($this->perUnitAmount) ? new PerUnitAmount() : $this->perUnitAmount;

        return $this->perUnitAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\PerUnitAmount|null $perUnitAmount
     * @return self
     */
    public function setPerUnitAmount(?PerUnitAmount $perUnitAmount = null): self
    {
        $this->perUnitAmount = $perUnitAmount;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPerUnitAmount(): self
    {
        $this->perUnitAmount = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\TaxCategory>|null
     */
    public function getTaxCategory(): ?array
    {
        return $this->taxCategory;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\TaxCategory>|null $taxCategory
     * @return self
     */
    public function setTaxCategory(?array $taxCategory = null): self
    {
        $this->taxCategory = $taxCategory;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTaxCategory(): self
    {
        $this->taxCategory = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearTaxCategory(): self
    {
        $this->taxCategory = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\TaxCategory $taxCategory
     * @return self
     */
    public function addToTaxCategory(TaxCategory $taxCategory): self
    {
        $this->taxCategory[] = $taxCategory;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TaxCategory
     */
    public function addToTaxCategoryWithCreate(): TaxCategory
    {
        $this->addTotaxCategory($taxCategory = new TaxCategory());

        return $taxCategory;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\TaxCategory $taxCategory
     * @return self
     */
    public function addOnceToTaxCategory(TaxCategory $taxCategory): self
    {
        if (!is_array($this->taxCategory)) {
            $this->taxCategory = [];
        }

        $this->taxCategory[0] = $taxCategory;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TaxCategory
     */
    public function addOnceToTaxCategoryWithCreate(): TaxCategory
    {
        if (!is_array($this->taxCategory)) {
            $this->taxCategory = [];
        }

        if ($this->taxCategory === []) {
            $this->addOnceTotaxCategory(new TaxCategory());
        }

        return $this->taxCategory[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TaxTotal|null
     */
    public function getTaxTotal(): ?TaxTotal
    {
        return $this->taxTotal;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TaxTotal
     */
    public function getTaxTotalWithCreate(): TaxTotal
    {
        $this->taxTotal = is_null($this->taxTotal) ? new TaxTotal() : $this->taxTotal;

        return $this->taxTotal;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\TaxTotal|null $taxTotal
     * @return self
     */
    public function setTaxTotal(?TaxTotal $taxTotal = null): self
    {
        $this->taxTotal = $taxTotal;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTaxTotal(): self
    {
        $this->taxTotal = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\PaymentMeans>|null
     */
    public function getPaymentMeans(): ?array
    {
        return $this->paymentMeans;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\PaymentMeans>|null $paymentMeans
     * @return self
     */
    public function setPaymentMeans(?array $paymentMeans = null): self
    {
        $this->paymentMeans = $paymentMeans;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPaymentMeans(): self
    {
        $this->paymentMeans = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearPaymentMeans(): self
    {
        $this->paymentMeans = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\PaymentMeans $paymentMeans
     * @return self
     */
    public function addToPaymentMeans(PaymentMeans $paymentMeans): self
    {
        $this->paymentMeans[] = $paymentMeans;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\PaymentMeans
     */
    public function addToPaymentMeansWithCreate(): PaymentMeans
    {
        $this->addTopaymentMeans($paymentMeans = new PaymentMeans());

        return $paymentMeans;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\PaymentMeans $paymentMeans
     * @return self
     */
    public function addOnceToPaymentMeans(PaymentMeans $paymentMeans): self
    {
        if (!is_array($this->paymentMeans)) {
            $this->paymentMeans = [];
        }

        $this->paymentMeans[0] = $paymentMeans;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\PaymentMeans
     */
    public function addOnceToPaymentMeansWithCreate(): PaymentMeans
    {
        if (!is_array($this->paymentMeans)) {
            $this->paymentMeans = [];
        }

        if ($this->paymentMeans === []) {
            $this->addOnceTopaymentMeans(new PaymentMeans());
        }

        return $this->paymentMeans[0];
    }
}
