<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\BaseUnitMeasure;
use horstoeko\invoicesuite\models\ubl\cbc\CalculationSequenceNumeric;
use horstoeko\invoicesuite\models\ubl\cbc\PerUnitAmount;
use horstoeko\invoicesuite\models\ubl\cbc\Percent;
use horstoeko\invoicesuite\models\ubl\cbc\TaxAmount;
use horstoeko\invoicesuite\models\ubl\cbc\TaxableAmount;
use horstoeko\invoicesuite\models\ubl\cbc\TierRange;
use horstoeko\invoicesuite\models\ubl\cbc\TierRatePercent;
use horstoeko\invoicesuite\models\ubl\cbc\TransactionCurrencyTaxAmount;

class TaxSubtotalType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\TaxableAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\TaxableAmount")
     * @JMS\Expose
     * @JMS\SerializedName("TaxableAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTaxableAmount", setter="setTaxableAmount")
     */
    private $taxableAmount;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\TaxAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\TaxAmount")
     * @JMS\Expose
     * @JMS\SerializedName("TaxAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTaxAmount", setter="setTaxAmount")
     */
    private $taxAmount;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\CalculationSequenceNumeric|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\CalculationSequenceNumeric")
     * @JMS\Expose
     * @JMS\SerializedName("CalculationSequenceNumeric")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCalculationSequenceNumeric", setter="setCalculationSequenceNumeric")
     */
    private $calculationSequenceNumeric;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\TransactionCurrencyTaxAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\TransactionCurrencyTaxAmount")
     * @JMS\Expose
     * @JMS\SerializedName("TransactionCurrencyTaxAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTransactionCurrencyTaxAmount", setter="setTransactionCurrencyTaxAmount")
     */
    private $transactionCurrencyTaxAmount;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\Percent|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\Percent")
     * @JMS\Expose
     * @JMS\SerializedName("Percent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPercent", setter="setPercent")
     */
    private $percent;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\BaseUnitMeasure|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\BaseUnitMeasure")
     * @JMS\Expose
     * @JMS\SerializedName("BaseUnitMeasure")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getBaseUnitMeasure", setter="setBaseUnitMeasure")
     */
    private $baseUnitMeasure;

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
     * @var \horstoeko\invoicesuite\models\ubl\cbc\TierRange|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\TierRange")
     * @JMS\Expose
     * @JMS\SerializedName("TierRange")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTierRange", setter="setTierRange")
     */
    private $tierRange;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\TierRatePercent|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\TierRatePercent")
     * @JMS\Expose
     * @JMS\SerializedName("TierRatePercent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTierRatePercent", setter="setTierRatePercent")
     */
    private $tierRatePercent;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\TaxCategory|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\TaxCategory")
     * @JMS\Expose
     * @JMS\SerializedName("TaxCategory")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTaxCategory", setter="setTaxCategory")
     */
    private $taxCategory;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TaxableAmount|null
     */
    public function getTaxableAmount(): ?TaxableAmount
    {
        return $this->taxableAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TaxableAmount
     */
    public function getTaxableAmountWithCreate(): TaxableAmount
    {
        $this->taxableAmount = is_null($this->taxableAmount) ? new TaxableAmount() : $this->taxableAmount;

        return $this->taxableAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\TaxableAmount|null $taxableAmount
     * @return self
     */
    public function setTaxableAmount(?TaxableAmount $taxableAmount = null): self
    {
        $this->taxableAmount = $taxableAmount;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTaxableAmount(): self
    {
        $this->taxableAmount = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TaxAmount|null
     */
    public function getTaxAmount(): ?TaxAmount
    {
        return $this->taxAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TaxAmount
     */
    public function getTaxAmountWithCreate(): TaxAmount
    {
        $this->taxAmount = is_null($this->taxAmount) ? new TaxAmount() : $this->taxAmount;

        return $this->taxAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\TaxAmount|null $taxAmount
     * @return self
     */
    public function setTaxAmount(?TaxAmount $taxAmount = null): self
    {
        $this->taxAmount = $taxAmount;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTaxAmount(): self
    {
        $this->taxAmount = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\CalculationSequenceNumeric|null
     */
    public function getCalculationSequenceNumeric(): ?CalculationSequenceNumeric
    {
        return $this->calculationSequenceNumeric;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\CalculationSequenceNumeric
     */
    public function getCalculationSequenceNumericWithCreate(): CalculationSequenceNumeric
    {
        $this->calculationSequenceNumeric = is_null($this->calculationSequenceNumeric) ? new CalculationSequenceNumeric() : $this->calculationSequenceNumeric;

        return $this->calculationSequenceNumeric;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\CalculationSequenceNumeric|null $calculationSequenceNumeric
     * @return self
     */
    public function setCalculationSequenceNumeric(
        ?CalculationSequenceNumeric $calculationSequenceNumeric = null,
    ): self {
        $this->calculationSequenceNumeric = $calculationSequenceNumeric;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetCalculationSequenceNumeric(): self
    {
        $this->calculationSequenceNumeric = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TransactionCurrencyTaxAmount|null
     */
    public function getTransactionCurrencyTaxAmount(): ?TransactionCurrencyTaxAmount
    {
        return $this->transactionCurrencyTaxAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TransactionCurrencyTaxAmount
     */
    public function getTransactionCurrencyTaxAmountWithCreate(): TransactionCurrencyTaxAmount
    {
        $this->transactionCurrencyTaxAmount = is_null($this->transactionCurrencyTaxAmount) ? new TransactionCurrencyTaxAmount() : $this->transactionCurrencyTaxAmount;

        return $this->transactionCurrencyTaxAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\TransactionCurrencyTaxAmount|null $transactionCurrencyTaxAmount
     * @return self
     */
    public function setTransactionCurrencyTaxAmount(
        ?TransactionCurrencyTaxAmount $transactionCurrencyTaxAmount = null,
    ): self {
        $this->transactionCurrencyTaxAmount = $transactionCurrencyTaxAmount;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTransactionCurrencyTaxAmount(): self
    {
        $this->transactionCurrencyTaxAmount = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Percent|null
     */
    public function getPercent(): ?Percent
    {
        return $this->percent;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Percent
     */
    public function getPercentWithCreate(): Percent
    {
        $this->percent = is_null($this->percent) ? new Percent() : $this->percent;

        return $this->percent;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Percent|null $percent
     * @return self
     */
    public function setPercent(?Percent $percent = null): self
    {
        $this->percent = $percent;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPercent(): self
    {
        $this->percent = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\BaseUnitMeasure|null
     */
    public function getBaseUnitMeasure(): ?BaseUnitMeasure
    {
        return $this->baseUnitMeasure;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\BaseUnitMeasure
     */
    public function getBaseUnitMeasureWithCreate(): BaseUnitMeasure
    {
        $this->baseUnitMeasure = is_null($this->baseUnitMeasure) ? new BaseUnitMeasure() : $this->baseUnitMeasure;

        return $this->baseUnitMeasure;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\BaseUnitMeasure|null $baseUnitMeasure
     * @return self
     */
    public function setBaseUnitMeasure(?BaseUnitMeasure $baseUnitMeasure = null): self
    {
        $this->baseUnitMeasure = $baseUnitMeasure;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetBaseUnitMeasure(): self
    {
        $this->baseUnitMeasure = null;

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
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TierRange|null
     */
    public function getTierRange(): ?TierRange
    {
        return $this->tierRange;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TierRange
     */
    public function getTierRangeWithCreate(): TierRange
    {
        $this->tierRange = is_null($this->tierRange) ? new TierRange() : $this->tierRange;

        return $this->tierRange;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\TierRange|null $tierRange
     * @return self
     */
    public function setTierRange(?TierRange $tierRange = null): self
    {
        $this->tierRange = $tierRange;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTierRange(): self
    {
        $this->tierRange = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TierRatePercent|null
     */
    public function getTierRatePercent(): ?TierRatePercent
    {
        return $this->tierRatePercent;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TierRatePercent
     */
    public function getTierRatePercentWithCreate(): TierRatePercent
    {
        $this->tierRatePercent = is_null($this->tierRatePercent) ? new TierRatePercent() : $this->tierRatePercent;

        return $this->tierRatePercent;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\TierRatePercent|null $tierRatePercent
     * @return self
     */
    public function setTierRatePercent(?TierRatePercent $tierRatePercent = null): self
    {
        $this->tierRatePercent = $tierRatePercent;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTierRatePercent(): self
    {
        $this->tierRatePercent = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TaxCategory|null
     */
    public function getTaxCategory(): ?TaxCategory
    {
        return $this->taxCategory;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TaxCategory
     */
    public function getTaxCategoryWithCreate(): TaxCategory
    {
        $this->taxCategory = is_null($this->taxCategory) ? new TaxCategory() : $this->taxCategory;

        return $this->taxCategory;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\TaxCategory|null $taxCategory
     * @return self
     */
    public function setTaxCategory(?TaxCategory $taxCategory = null): self
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
}
