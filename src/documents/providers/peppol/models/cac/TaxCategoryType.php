<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\BaseUnitMeasure;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Name;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Percent;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PerUnitAmount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TaxExemptionReason;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TaxExemptionReasonCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TierRange;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TierRatePercent;
use JMS\Serializer\Annotation as JMS;

class TaxCategoryType
{
    use HandlesObjectFlags;

    /**
     * @var null|ID
     */
    #[JMS\Accessor(getter: 'getID', setter: 'setID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $iD;

    /**
     * @var null|Name
     */
    #[JMS\Accessor(getter: 'getName', setter: 'setName')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Name')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Name')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $name;

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
     * @var null|TaxExemptionReasonCode
     */
    #[JMS\Accessor(getter: 'getTaxExemptionReasonCode', setter: 'setTaxExemptionReasonCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TaxExemptionReasonCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TaxExemptionReasonCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $taxExemptionReasonCode;

    /**
     * @var null|array<TaxExemptionReason>
     */
    #[JMS\Accessor(getter: 'getTaxExemptionReason', setter: 'setTaxExemptionReason')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TaxExemptionReason')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TaxExemptionReason>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'TaxExemptionReason', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $taxExemptionReason;

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
     * @var null|TaxScheme
     */
    #[JMS\Accessor(getter: 'getTaxScheme', setter: 'setTaxScheme')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TaxScheme')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\TaxScheme')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $taxScheme;

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
        $this->iD ??= new ID();

        return $this->iD;
    }

    /**
     * @param  null|ID $iD
     * @return static
     */
    public function setID(
        ?ID $iD = null
    ): static {
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
     * @return null|Name
     */
    public function getName(): ?Name
    {
        return $this->name;
    }

    /**
     * @return Name
     */
    public function getNameWithCreate(): Name
    {
        $this->name ??= new Name();

        return $this->name;
    }

    /**
     * @param  null|Name $name
     * @return static
     */
    public function setName(
        ?Name $name = null
    ): static {
        $this->name = $name;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetName(): static
    {
        $this->name = null;

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
     * @return null|TaxExemptionReasonCode
     */
    public function getTaxExemptionReasonCode(): ?TaxExemptionReasonCode
    {
        return $this->taxExemptionReasonCode;
    }

    /**
     * @return TaxExemptionReasonCode
     */
    public function getTaxExemptionReasonCodeWithCreate(): TaxExemptionReasonCode
    {
        $this->taxExemptionReasonCode ??= new TaxExemptionReasonCode();

        return $this->taxExemptionReasonCode;
    }

    /**
     * @param  null|TaxExemptionReasonCode $taxExemptionReasonCode
     * @return static
     */
    public function setTaxExemptionReasonCode(
        ?TaxExemptionReasonCode $taxExemptionReasonCode = null
    ): static {
        $this->taxExemptionReasonCode = $taxExemptionReasonCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTaxExemptionReasonCode(): static
    {
        $this->taxExemptionReasonCode = null;

        return $this;
    }

    /**
     * @return null|array<TaxExemptionReason>
     */
    public function getTaxExemptionReason(): ?array
    {
        return $this->taxExemptionReason;
    }

    /**
     * @param  null|array<TaxExemptionReason> $taxExemptionReason
     * @return static
     */
    public function setTaxExemptionReason(
        ?array $taxExemptionReason = null
    ): static {
        $this->taxExemptionReason = $taxExemptionReason;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTaxExemptionReason(): static
    {
        $this->taxExemptionReason = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearTaxExemptionReason(): static
    {
        $this->taxExemptionReason = [];

        return $this;
    }

    /**
     * @return null|TaxExemptionReason
     */
    public function firstTaxExemptionReason(): ?TaxExemptionReason
    {
        $taxExemptionReason = $this->taxExemptionReason ?? [];
        $taxExemptionReason = reset($taxExemptionReason);

        if (false === $taxExemptionReason) {
            return null;
        }

        return $taxExemptionReason;
    }

    /**
     * @return null|TaxExemptionReason
     */
    public function lastTaxExemptionReason(): ?TaxExemptionReason
    {
        $taxExemptionReason = $this->taxExemptionReason ?? [];
        $taxExemptionReason = end($taxExemptionReason);

        if (false === $taxExemptionReason) {
            return null;
        }

        return $taxExemptionReason;
    }

    /**
     * @param  TaxExemptionReason $taxExemptionReason
     * @return static
     */
    public function addToTaxExemptionReason(
        TaxExemptionReason $taxExemptionReason
    ): static {
        $this->taxExemptionReason[] = $taxExemptionReason;

        return $this;
    }

    /**
     * @return TaxExemptionReason
     */
    public function addToTaxExemptionReasonWithCreate(): TaxExemptionReason
    {
        $this->addToTaxExemptionReason($taxExemptionReason = new TaxExemptionReason());

        return $taxExemptionReason;
    }

    /**
     * @param  TaxExemptionReason $taxExemptionReason
     * @return static
     */
    public function addOnceToTaxExemptionReason(
        TaxExemptionReason $taxExemptionReason
    ): static {
        if (!is_array($this->taxExemptionReason)) {
            $this->taxExemptionReason = [];
        }

        $this->taxExemptionReason[0] = $taxExemptionReason;

        return $this;
    }

    /**
     * @return TaxExemptionReason
     */
    public function addOnceToTaxExemptionReasonWithCreate(): TaxExemptionReason
    {
        if (!is_array($this->taxExemptionReason)) {
            $this->taxExemptionReason = [];
        }

        if ([] === $this->taxExemptionReason) {
            $this->addOnceToTaxExemptionReason(new TaxExemptionReason());
        }

        return $this->taxExemptionReason[0];
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
     * @return null|TaxScheme
     */
    public function getTaxScheme(): ?TaxScheme
    {
        return $this->taxScheme;
    }

    /**
     * @return TaxScheme
     */
    public function getTaxSchemeWithCreate(): TaxScheme
    {
        $this->taxScheme ??= new TaxScheme();

        return $this->taxScheme;
    }

    /**
     * @param  null|TaxScheme $taxScheme
     * @return static
     */
    public function setTaxScheme(
        ?TaxScheme $taxScheme = null
    ): static {
        $this->taxScheme = $taxScheme;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTaxScheme(): static
    {
        $this->taxScheme = null;

        return $this;
    }
}
