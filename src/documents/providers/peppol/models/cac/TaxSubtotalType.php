<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\BaseUnitMeasure;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CalculationSequenceNumeric;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Percent;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PerUnitAmount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TaxableAmount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TaxAmount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TierRange;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TierRatePercent;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TransactionCurrencyTaxAmount;
use JMS\Serializer\Annotation as JMS;

class TaxSubtotalType
{
    use HandlesObjectFlags;

    /**
     * @var null|TaxableAmount
     */
    #[JMS\Accessor(getter: 'getTaxableAmount', setter: 'setTaxableAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TaxableAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TaxableAmount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $taxableAmount;

    /**
     * @var null|TaxAmount
     */
    #[JMS\Accessor(getter: 'getTaxAmount', setter: 'setTaxAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TaxAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TaxAmount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $taxAmount;

    /**
     * @var null|CalculationSequenceNumeric
     */
    #[JMS\Accessor(getter: 'getCalculationSequenceNumeric', setter: 'setCalculationSequenceNumeric')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CalculationSequenceNumeric')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CalculationSequenceNumeric')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $calculationSequenceNumeric;

    /**
     * @var null|TransactionCurrencyTaxAmount
     */
    #[JMS\Accessor(getter: 'getTransactionCurrencyTaxAmount', setter: 'setTransactionCurrencyTaxAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TransactionCurrencyTaxAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TransactionCurrencyTaxAmount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $transactionCurrencyTaxAmount;

    /**
     * @var null|Percent
     */
    #[JMS\Accessor(getter: 'getPercent', setter: 'setPercent')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Percent')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Percent')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $percent;

    /**
     * @var null|BaseUnitMeasure
     */
    #[JMS\Accessor(getter: 'getBaseUnitMeasure', setter: 'setBaseUnitMeasure')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('BaseUnitMeasure')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\BaseUnitMeasure')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $baseUnitMeasure;

    /**
     * @var null|PerUnitAmount
     */
    #[JMS\Accessor(getter: 'getPerUnitAmount', setter: 'setPerUnitAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PerUnitAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PerUnitAmount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $perUnitAmount;

    /**
     * @var null|TierRange
     */
    #[JMS\Accessor(getter: 'getTierRange', setter: 'setTierRange')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TierRange')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TierRange')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $tierRange;

    /**
     * @var null|TierRatePercent
     */
    #[JMS\Accessor(getter: 'getTierRatePercent', setter: 'setTierRatePercent')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TierRatePercent')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TierRatePercent')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $tierRatePercent;

    /**
     * @var null|TaxCategory
     */
    #[JMS\Accessor(getter: 'getTaxCategory', setter: 'setTaxCategory')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TaxCategory')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\TaxCategory')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
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
        $this->taxableAmount ??= new TaxableAmount();

        return $this->taxableAmount;
    }

    /**
     * @param  null|TaxableAmount $taxableAmount
     * @return static
     */
    public function setTaxableAmount(
        ?TaxableAmount $taxableAmount = null
    ): static {
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
        $this->taxAmount ??= new TaxAmount();

        return $this->taxAmount;
    }

    /**
     * @param  null|TaxAmount $taxAmount
     * @return static
     */
    public function setTaxAmount(
        ?TaxAmount $taxAmount = null
    ): static {
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
        $this->calculationSequenceNumeric ??= new CalculationSequenceNumeric();

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
        $this->transactionCurrencyTaxAmount ??= new TransactionCurrencyTaxAmount();

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
        $this->percent ??= new Percent();

        return $this->percent;
    }

    /**
     * @param  null|Percent $percent
     * @return static
     */
    public function setPercent(
        ?Percent $percent = null
    ): static {
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
        $this->baseUnitMeasure ??= new BaseUnitMeasure();

        return $this->baseUnitMeasure;
    }

    /**
     * @param  null|BaseUnitMeasure $baseUnitMeasure
     * @return static
     */
    public function setBaseUnitMeasure(
        ?BaseUnitMeasure $baseUnitMeasure = null
    ): static {
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
        $this->perUnitAmount ??= new PerUnitAmount();

        return $this->perUnitAmount;
    }

    /**
     * @param  null|PerUnitAmount $perUnitAmount
     * @return static
     */
    public function setPerUnitAmount(
        ?PerUnitAmount $perUnitAmount = null
    ): static {
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
        $this->tierRange ??= new TierRange();

        return $this->tierRange;
    }

    /**
     * @param  null|TierRange $tierRange
     * @return static
     */
    public function setTierRange(
        ?TierRange $tierRange = null
    ): static {
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
        $this->tierRatePercent ??= new TierRatePercent();

        return $this->tierRatePercent;
    }

    /**
     * @param  null|TierRatePercent $tierRatePercent
     * @return static
     */
    public function setTierRatePercent(
        ?TierRatePercent $tierRatePercent = null
    ): static {
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
        $this->taxCategory ??= new TaxCategory();

        return $this->taxCategory;
    }

    /**
     * @param  null|TaxCategory $taxCategory
     * @return static
     */
    public function setTaxCategory(
        ?TaxCategory $taxCategory = null
    ): static {
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
