<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\BaseUnitMeasure;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\ID;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\Name;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\PerUnitAmount;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\Percent;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\TaxExemptionReason;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\TaxExemptionReasonCode;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\TierRange;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\TierRatePercent;

class TaxCategoryType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\ID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\ID")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\Name|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\Name")
     * @JMS\Expose
     * @JMS\SerializedName("Name")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getName", setter="setName")
     */
    private $name;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\Percent|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\Percent")
     * @JMS\Expose
     * @JMS\SerializedName("Percent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPercent", setter="setPercent")
     */
    private $percent;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\BaseUnitMeasure|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\BaseUnitMeasure")
     * @JMS\Expose
     * @JMS\SerializedName("BaseUnitMeasure")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getBaseUnitMeasure", setter="setBaseUnitMeasure")
     */
    private $baseUnitMeasure;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\PerUnitAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\PerUnitAmount")
     * @JMS\Expose
     * @JMS\SerializedName("PerUnitAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPerUnitAmount", setter="setPerUnitAmount")
     */
    private $perUnitAmount;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\TaxExemptionReasonCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\TaxExemptionReasonCode")
     * @JMS\Expose
     * @JMS\SerializedName("TaxExemptionReasonCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTaxExemptionReasonCode", setter="setTaxExemptionReasonCode")
     */
    private $taxExemptionReasonCode;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\TaxExemptionReason>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cbc\TaxExemptionReason>")
     * @JMS\Expose
     * @JMS\SerializedName("TaxExemptionReason")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TaxExemptionReason", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getTaxExemptionReason", setter="setTaxExemptionReason")
     */
    private $taxExemptionReason;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\TierRange|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\TierRange")
     * @JMS\Expose
     * @JMS\SerializedName("TierRange")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTierRange", setter="setTierRange")
     */
    private $tierRange;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\TierRatePercent|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\TierRatePercent")
     * @JMS\Expose
     * @JMS\SerializedName("TierRatePercent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTierRatePercent", setter="setTierRatePercent")
     */
    private $tierRatePercent;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\TaxScheme|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\TaxScheme")
     * @JMS\Expose
     * @JMS\SerializedName("TaxScheme")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTaxScheme", setter="setTaxScheme")
     */
    private $taxScheme;

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ID|null
     */
    public function getID(): ?ID
    {
        return $this->iD;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ID
     */
    public function getIDWithCreate(): ID
    {
        $this->iD = is_null($this->iD) ? new ID() : $this->iD;

        return $this->iD;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ID|null $iD
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
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Name|null
     */
    public function getName(): ?Name
    {
        return $this->name;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Name
     */
    public function getNameWithCreate(): Name
    {
        $this->name = is_null($this->name) ? new Name() : $this->name;

        return $this->name;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Name|null $name
     * @return self
     */
    public function setName(?Name $name = null): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetName(): self
    {
        $this->name = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Percent|null
     */
    public function getPercent(): ?Percent
    {
        return $this->percent;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Percent
     */
    public function getPercentWithCreate(): Percent
    {
        $this->percent = is_null($this->percent) ? new Percent() : $this->percent;

        return $this->percent;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Percent|null $percent
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
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\BaseUnitMeasure|null
     */
    public function getBaseUnitMeasure(): ?BaseUnitMeasure
    {
        return $this->baseUnitMeasure;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\BaseUnitMeasure
     */
    public function getBaseUnitMeasureWithCreate(): BaseUnitMeasure
    {
        $this->baseUnitMeasure = is_null($this->baseUnitMeasure) ? new BaseUnitMeasure() : $this->baseUnitMeasure;

        return $this->baseUnitMeasure;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\BaseUnitMeasure|null $baseUnitMeasure
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
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\PerUnitAmount|null
     */
    public function getPerUnitAmount(): ?PerUnitAmount
    {
        return $this->perUnitAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\PerUnitAmount
     */
    public function getPerUnitAmountWithCreate(): PerUnitAmount
    {
        $this->perUnitAmount = is_null($this->perUnitAmount) ? new PerUnitAmount() : $this->perUnitAmount;

        return $this->perUnitAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\PerUnitAmount|null $perUnitAmount
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
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TaxExemptionReasonCode|null
     */
    public function getTaxExemptionReasonCode(): ?TaxExemptionReasonCode
    {
        return $this->taxExemptionReasonCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TaxExemptionReasonCode
     */
    public function getTaxExemptionReasonCodeWithCreate(): TaxExemptionReasonCode
    {
        $this->taxExemptionReasonCode = is_null($this->taxExemptionReasonCode) ? new TaxExemptionReasonCode() : $this->taxExemptionReasonCode;

        return $this->taxExemptionReasonCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\TaxExemptionReasonCode|null $taxExemptionReasonCode
     * @return self
     */
    public function setTaxExemptionReasonCode(?TaxExemptionReasonCode $taxExemptionReasonCode = null): self
    {
        $this->taxExemptionReasonCode = $taxExemptionReasonCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTaxExemptionReasonCode(): self
    {
        $this->taxExemptionReasonCode = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\TaxExemptionReason>|null
     */
    public function getTaxExemptionReason(): ?array
    {
        return $this->taxExemptionReason;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\TaxExemptionReason>|null $taxExemptionReason
     * @return self
     */
    public function setTaxExemptionReason(?array $taxExemptionReason = null): self
    {
        $this->taxExemptionReason = $taxExemptionReason;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTaxExemptionReason(): self
    {
        $this->taxExemptionReason = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearTaxExemptionReason(): self
    {
        $this->taxExemptionReason = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TaxExemptionReason|null
     */
    public function firstTaxExemptionReason(): ?TaxExemptionReason
    {
        $taxExemptionReason = $this->taxExemptionReason ?? [];
        $taxExemptionReason = reset($taxExemptionReason);

        if ($taxExemptionReason === false) {
            return null;
        }

        return $taxExemptionReason;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TaxExemptionReason|null
     */
    public function lastTaxExemptionReason(): ?TaxExemptionReason
    {
        $taxExemptionReason = $this->taxExemptionReason ?? [];
        $taxExemptionReason = end($taxExemptionReason);

        if ($taxExemptionReason === false) {
            return null;
        }

        return $taxExemptionReason;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\TaxExemptionReason $taxExemptionReason
     * @return self
     */
    public function addToTaxExemptionReason(TaxExemptionReason $taxExemptionReason): self
    {
        $this->taxExemptionReason[] = $taxExemptionReason;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TaxExemptionReason
     */
    public function addToTaxExemptionReasonWithCreate(): TaxExemptionReason
    {
        $this->addTotaxExemptionReason($taxExemptionReason = new TaxExemptionReason());

        return $taxExemptionReason;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\TaxExemptionReason $taxExemptionReason
     * @return self
     */
    public function addOnceToTaxExemptionReason(TaxExemptionReason $taxExemptionReason): self
    {
        if (!is_array($this->taxExemptionReason)) {
            $this->taxExemptionReason = [];
        }

        $this->taxExemptionReason[0] = $taxExemptionReason;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TaxExemptionReason
     */
    public function addOnceToTaxExemptionReasonWithCreate(): TaxExemptionReason
    {
        if (!is_array($this->taxExemptionReason)) {
            $this->taxExemptionReason = [];
        }

        if ($this->taxExemptionReason === []) {
            $this->addOnceTotaxExemptionReason(new TaxExemptionReason());
        }

        return $this->taxExemptionReason[0];
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TierRange|null
     */
    public function getTierRange(): ?TierRange
    {
        return $this->tierRange;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TierRange
     */
    public function getTierRangeWithCreate(): TierRange
    {
        $this->tierRange = is_null($this->tierRange) ? new TierRange() : $this->tierRange;

        return $this->tierRange;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\TierRange|null $tierRange
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
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TierRatePercent|null
     */
    public function getTierRatePercent(): ?TierRatePercent
    {
        return $this->tierRatePercent;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TierRatePercent
     */
    public function getTierRatePercentWithCreate(): TierRatePercent
    {
        $this->tierRatePercent = is_null($this->tierRatePercent) ? new TierRatePercent() : $this->tierRatePercent;

        return $this->tierRatePercent;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\TierRatePercent|null $tierRatePercent
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
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\TaxScheme|null
     */
    public function getTaxScheme(): ?TaxScheme
    {
        return $this->taxScheme;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\TaxScheme
     */
    public function getTaxSchemeWithCreate(): TaxScheme
    {
        $this->taxScheme = is_null($this->taxScheme) ? new TaxScheme() : $this->taxScheme;

        return $this->taxScheme;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\TaxScheme|null $taxScheme
     * @return self
     */
    public function setTaxScheme(?TaxScheme $taxScheme = null): self
    {
        $this->taxScheme = $taxScheme;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTaxScheme(): self
    {
        $this->taxScheme = null;

        return $this;
    }
}
