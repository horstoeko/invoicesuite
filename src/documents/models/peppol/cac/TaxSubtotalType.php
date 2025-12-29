<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\BaseUnitMeasure;
use horstoeko\invoicesuite\documents\models\peppol\cbc\CalculationSequenceNumeric;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Percent;
use horstoeko\invoicesuite\documents\models\peppol\cbc\PerUnitAmount;
use horstoeko\invoicesuite\documents\models\peppol\cbc\TaxableAmount;
use horstoeko\invoicesuite\documents\models\peppol\cbc\TaxAmount;
use horstoeko\invoicesuite\documents\models\peppol\cbc\TierRange;
use horstoeko\invoicesuite\documents\models\peppol\cbc\TierRatePercent;
use horstoeko\invoicesuite\documents\models\peppol\cbc\TransactionCurrencyTaxAmount;
use JMS\Serializer\Annotation as JMS;

class TaxSubtotalType
{
    use HandlesObjectFlags;

    /**
     * @var null|TaxableAmount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\TaxableAmount")
     * @JMS\Expose
     * @JMS\SerializedName("TaxableAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTaxableAmount", setter="setTaxableAmount")
     */
    private $taxableAmount;

    /**
     * @var null|TaxAmount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\TaxAmount")
     * @JMS\Expose
     * @JMS\SerializedName("TaxAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTaxAmount", setter="setTaxAmount")
     */
    private $taxAmount;

    /**
     * @var null|CalculationSequenceNumeric
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\CalculationSequenceNumeric")
     * @JMS\Expose
     * @JMS\SerializedName("CalculationSequenceNumeric")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCalculationSequenceNumeric", setter="setCalculationSequenceNumeric")
     */
    private $calculationSequenceNumeric;

    /**
     * @var null|TransactionCurrencyTaxAmount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\TransactionCurrencyTaxAmount")
     * @JMS\Expose
     * @JMS\SerializedName("TransactionCurrencyTaxAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTransactionCurrencyTaxAmount", setter="setTransactionCurrencyTaxAmount")
     */
    private $transactionCurrencyTaxAmount;

    /**
     * @var null|Percent
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\Percent")
     * @JMS\Expose
     * @JMS\SerializedName("Percent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPercent", setter="setPercent")
     */
    private $percent;

    /**
     * @var null|BaseUnitMeasure
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\BaseUnitMeasure")
     * @JMS\Expose
     * @JMS\SerializedName("BaseUnitMeasure")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getBaseUnitMeasure", setter="setBaseUnitMeasure")
     */
    private $baseUnitMeasure;

    /**
     * @var null|PerUnitAmount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\PerUnitAmount")
     * @JMS\Expose
     * @JMS\SerializedName("PerUnitAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPerUnitAmount", setter="setPerUnitAmount")
     */
    private $perUnitAmount;

    /**
     * @var null|TierRange
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\TierRange")
     * @JMS\Expose
     * @JMS\SerializedName("TierRange")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTierRange", setter="setTierRange")
     */
    private $tierRange;

    /**
     * @var null|TierRatePercent
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\TierRatePercent")
     * @JMS\Expose
     * @JMS\SerializedName("TierRatePercent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTierRatePercent", setter="setTierRatePercent")
     */
    private $tierRatePercent;

    /**
     * @var null|TaxCategory
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\TaxCategory")
     * @JMS\Expose
     * @JMS\SerializedName("TaxCategory")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTaxCategory", setter="setTaxCategory")
     */
    private $taxCategory;

    /**
     * @return null|TaxableAmount
     */
    public function getTaxableAmount(): ?TaxableAmount
    {
        return $this->taxableAmount;
    }

    /**
     * @return TaxableAmount
     */
    public function getTaxableAmountWithCreate(): TaxableAmount
    {
        $this->taxableAmount = is_null($this->taxableAmount) ? new TaxableAmount() : $this->taxableAmount;

        return $this->taxableAmount;
    }

    /**
     * @param  null|TaxableAmount $taxableAmount
     * @return static
     */
    public function setTaxableAmount(?TaxableAmount $taxableAmount = null): static
    {
        $this->taxableAmount = $taxableAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTaxableAmount(): static
    {
        $this->taxableAmount = null;

        return $this;
    }

    /**
     * @return null|TaxAmount
     */
    public function getTaxAmount(): ?TaxAmount
    {
        return $this->taxAmount;
    }

    /**
     * @return TaxAmount
     */
    public function getTaxAmountWithCreate(): TaxAmount
    {
        $this->taxAmount = is_null($this->taxAmount) ? new TaxAmount() : $this->taxAmount;

        return $this->taxAmount;
    }

    /**
     * @param  null|TaxAmount $taxAmount
     * @return static
     */
    public function setTaxAmount(?TaxAmount $taxAmount = null): static
    {
        $this->taxAmount = $taxAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTaxAmount(): static
    {
        $this->taxAmount = null;

        return $this;
    }

    /**
     * @return null|CalculationSequenceNumeric
     */
    public function getCalculationSequenceNumeric(): ?CalculationSequenceNumeric
    {
        return $this->calculationSequenceNumeric;
    }

    /**
     * @return CalculationSequenceNumeric
     */
    public function getCalculationSequenceNumericWithCreate(): CalculationSequenceNumeric
    {
        $this->calculationSequenceNumeric = is_null($this->calculationSequenceNumeric) ? new CalculationSequenceNumeric() : $this->calculationSequenceNumeric;

        return $this->calculationSequenceNumeric;
    }

    /**
     * @param  null|CalculationSequenceNumeric $calculationSequenceNumeric
     * @return static
     */
    public function setCalculationSequenceNumeric(
        ?CalculationSequenceNumeric $calculationSequenceNumeric = null,
    ): static {
        $this->calculationSequenceNumeric = $calculationSequenceNumeric;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCalculationSequenceNumeric(): static
    {
        $this->calculationSequenceNumeric = null;

        return $this;
    }

    /**
     * @return null|TransactionCurrencyTaxAmount
     */
    public function getTransactionCurrencyTaxAmount(): ?TransactionCurrencyTaxAmount
    {
        return $this->transactionCurrencyTaxAmount;
    }

    /**
     * @return TransactionCurrencyTaxAmount
     */
    public function getTransactionCurrencyTaxAmountWithCreate(): TransactionCurrencyTaxAmount
    {
        $this->transactionCurrencyTaxAmount = is_null($this->transactionCurrencyTaxAmount) ? new TransactionCurrencyTaxAmount() : $this->transactionCurrencyTaxAmount;

        return $this->transactionCurrencyTaxAmount;
    }

    /**
     * @param  null|TransactionCurrencyTaxAmount $transactionCurrencyTaxAmount
     * @return static
     */
    public function setTransactionCurrencyTaxAmount(
        ?TransactionCurrencyTaxAmount $transactionCurrencyTaxAmount = null,
    ): static {
        $this->transactionCurrencyTaxAmount = $transactionCurrencyTaxAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTransactionCurrencyTaxAmount(): static
    {
        $this->transactionCurrencyTaxAmount = null;

        return $this;
    }

    /**
     * @return null|Percent
     */
    public function getPercent(): ?Percent
    {
        return $this->percent;
    }

    /**
     * @return Percent
     */
    public function getPercentWithCreate(): Percent
    {
        $this->percent = is_null($this->percent) ? new Percent() : $this->percent;

        return $this->percent;
    }

    /**
     * @param  null|Percent $percent
     * @return static
     */
    public function setPercent(?Percent $percent = null): static
    {
        $this->percent = $percent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPercent(): static
    {
        $this->percent = null;

        return $this;
    }

    /**
     * @return null|BaseUnitMeasure
     */
    public function getBaseUnitMeasure(): ?BaseUnitMeasure
    {
        return $this->baseUnitMeasure;
    }

    /**
     * @return BaseUnitMeasure
     */
    public function getBaseUnitMeasureWithCreate(): BaseUnitMeasure
    {
        $this->baseUnitMeasure = is_null($this->baseUnitMeasure) ? new BaseUnitMeasure() : $this->baseUnitMeasure;

        return $this->baseUnitMeasure;
    }

    /**
     * @param  null|BaseUnitMeasure $baseUnitMeasure
     * @return static
     */
    public function setBaseUnitMeasure(?BaseUnitMeasure $baseUnitMeasure = null): static
    {
        $this->baseUnitMeasure = $baseUnitMeasure;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetBaseUnitMeasure(): static
    {
        $this->baseUnitMeasure = null;

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
     * @return null|TierRange
     */
    public function getTierRange(): ?TierRange
    {
        return $this->tierRange;
    }

    /**
     * @return TierRange
     */
    public function getTierRangeWithCreate(): TierRange
    {
        $this->tierRange = is_null($this->tierRange) ? new TierRange() : $this->tierRange;

        return $this->tierRange;
    }

    /**
     * @param  null|TierRange $tierRange
     * @return static
     */
    public function setTierRange(?TierRange $tierRange = null): static
    {
        $this->tierRange = $tierRange;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTierRange(): static
    {
        $this->tierRange = null;

        return $this;
    }

    /**
     * @return null|TierRatePercent
     */
    public function getTierRatePercent(): ?TierRatePercent
    {
        return $this->tierRatePercent;
    }

    /**
     * @return TierRatePercent
     */
    public function getTierRatePercentWithCreate(): TierRatePercent
    {
        $this->tierRatePercent = is_null($this->tierRatePercent) ? new TierRatePercent() : $this->tierRatePercent;

        return $this->tierRatePercent;
    }

    /**
     * @param  null|TierRatePercent $tierRatePercent
     * @return static
     */
    public function setTierRatePercent(?TierRatePercent $tierRatePercent = null): static
    {
        $this->tierRatePercent = $tierRatePercent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTierRatePercent(): static
    {
        $this->tierRatePercent = null;

        return $this;
    }

    /**
     * @return null|TaxCategory
     */
    public function getTaxCategory(): ?TaxCategory
    {
        return $this->taxCategory;
    }

    /**
     * @return TaxCategory
     */
    public function getTaxCategoryWithCreate(): TaxCategory
    {
        $this->taxCategory = is_null($this->taxCategory) ? new TaxCategory() : $this->taxCategory;

        return $this->taxCategory;
    }

    /**
     * @param  null|TaxCategory $taxCategory
     * @return static
     */
    public function setTaxCategory(?TaxCategory $taxCategory = null): static
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
}
