<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\ubl\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\ubl\cbc\Amount;
use horstoeko\invoicesuite\documents\models\ubl\cbc\ID;
use horstoeko\invoicesuite\documents\models\ubl\cbc\LossRisk;
use horstoeko\invoicesuite\documents\models\ubl\cbc\LossRiskResponsibilityCode;
use horstoeko\invoicesuite\documents\models\ubl\cbc\SpecialTerms;
use JMS\Serializer\Annotation as JMS;

class DeliveryTermsType
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
     * @var null|array<SpecialTerms>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cbc\SpecialTerms>")
     * @JMS\Expose
     * @JMS\SerializedName("SpecialTerms")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="SpecialTerms", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getSpecialTerms", setter="setSpecialTerms")
     */
    private $specialTerms;

    /**
     * @var null|LossRiskResponsibilityCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\LossRiskResponsibilityCode")
     * @JMS\Expose
     * @JMS\SerializedName("LossRiskResponsibilityCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLossRiskResponsibilityCode", setter="setLossRiskResponsibilityCode")
     */
    private $lossRiskResponsibilityCode;

    /**
     * @var null|array<LossRisk>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cbc\LossRisk>")
     * @JMS\Expose
     * @JMS\SerializedName("LossRisk")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="LossRisk", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getLossRisk", setter="setLossRisk")
     */
    private $lossRisk;

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
     * @var null|DeliveryLocation
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\DeliveryLocation")
     * @JMS\Expose
     * @JMS\SerializedName("DeliveryLocation")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDeliveryLocation", setter="setDeliveryLocation")
     */
    private $deliveryLocation;

    /**
     * @var null|AllowanceCharge
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\AllowanceCharge")
     * @JMS\Expose
     * @JMS\SerializedName("AllowanceCharge")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAllowanceCharge", setter="setAllowanceCharge")
     */
    private $allowanceCharge;

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
     * @return null|array<SpecialTerms>
     */
    public function getSpecialTerms(): ?array
    {
        return $this->specialTerms;
    }

    /**
     * @param  null|array<SpecialTerms> $specialTerms
     * @return static
     */
    public function setSpecialTerms(?array $specialTerms = null): static
    {
        $this->specialTerms = $specialTerms;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSpecialTerms(): static
    {
        $this->specialTerms = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearSpecialTerms(): static
    {
        $this->specialTerms = [];

        return $this;
    }

    /**
     * @return null|SpecialTerms
     */
    public function firstSpecialTerms(): ?SpecialTerms
    {
        $specialTerms = $this->specialTerms ?? [];
        $specialTerms = reset($specialTerms);

        if (false === $specialTerms) {
            return null;
        }

        return $specialTerms;
    }

    /**
     * @return null|SpecialTerms
     */
    public function lastSpecialTerms(): ?SpecialTerms
    {
        $specialTerms = $this->specialTerms ?? [];
        $specialTerms = end($specialTerms);

        if (false === $specialTerms) {
            return null;
        }

        return $specialTerms;
    }

    /**
     * @param  SpecialTerms $specialTerms
     * @return static
     */
    public function addToSpecialTerms(SpecialTerms $specialTerms): static
    {
        $this->specialTerms[] = $specialTerms;

        return $this;
    }

    /**
     * @return SpecialTerms
     */
    public function addToSpecialTermsWithCreate(): SpecialTerms
    {
        $this->addTospecialTerms($specialTerms = new SpecialTerms());

        return $specialTerms;
    }

    /**
     * @param  SpecialTerms $specialTerms
     * @return static
     */
    public function addOnceToSpecialTerms(SpecialTerms $specialTerms): static
    {
        if (!is_array($this->specialTerms)) {
            $this->specialTerms = [];
        }

        $this->specialTerms[0] = $specialTerms;

        return $this;
    }

    /**
     * @return SpecialTerms
     */
    public function addOnceToSpecialTermsWithCreate(): SpecialTerms
    {
        if (!is_array($this->specialTerms)) {
            $this->specialTerms = [];
        }

        if ([] === $this->specialTerms) {
            $this->addOnceTospecialTerms(new SpecialTerms());
        }

        return $this->specialTerms[0];
    }

    /**
     * @return null|LossRiskResponsibilityCode
     */
    public function getLossRiskResponsibilityCode(): ?LossRiskResponsibilityCode
    {
        return $this->lossRiskResponsibilityCode;
    }

    /**
     * @return LossRiskResponsibilityCode
     */
    public function getLossRiskResponsibilityCodeWithCreate(): LossRiskResponsibilityCode
    {
        $this->lossRiskResponsibilityCode = is_null($this->lossRiskResponsibilityCode) ? new LossRiskResponsibilityCode() : $this->lossRiskResponsibilityCode;

        return $this->lossRiskResponsibilityCode;
    }

    /**
     * @param  null|LossRiskResponsibilityCode $lossRiskResponsibilityCode
     * @return static
     */
    public function setLossRiskResponsibilityCode(
        ?LossRiskResponsibilityCode $lossRiskResponsibilityCode = null,
    ): static {
        $this->lossRiskResponsibilityCode = $lossRiskResponsibilityCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLossRiskResponsibilityCode(): static
    {
        $this->lossRiskResponsibilityCode = null;

        return $this;
    }

    /**
     * @return null|array<LossRisk>
     */
    public function getLossRisk(): ?array
    {
        return $this->lossRisk;
    }

    /**
     * @param  null|array<LossRisk> $lossRisk
     * @return static
     */
    public function setLossRisk(?array $lossRisk = null): static
    {
        $this->lossRisk = $lossRisk;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLossRisk(): static
    {
        $this->lossRisk = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearLossRisk(): static
    {
        $this->lossRisk = [];

        return $this;
    }

    /**
     * @return null|LossRisk
     */
    public function firstLossRisk(): ?LossRisk
    {
        $lossRisk = $this->lossRisk ?? [];
        $lossRisk = reset($lossRisk);

        if (false === $lossRisk) {
            return null;
        }

        return $lossRisk;
    }

    /**
     * @return null|LossRisk
     */
    public function lastLossRisk(): ?LossRisk
    {
        $lossRisk = $this->lossRisk ?? [];
        $lossRisk = end($lossRisk);

        if (false === $lossRisk) {
            return null;
        }

        return $lossRisk;
    }

    /**
     * @param  LossRisk $lossRisk
     * @return static
     */
    public function addToLossRisk(LossRisk $lossRisk): static
    {
        $this->lossRisk[] = $lossRisk;

        return $this;
    }

    /**
     * @return LossRisk
     */
    public function addToLossRiskWithCreate(): LossRisk
    {
        $this->addTolossRisk($lossRisk = new LossRisk());

        return $lossRisk;
    }

    /**
     * @param  LossRisk $lossRisk
     * @return static
     */
    public function addOnceToLossRisk(LossRisk $lossRisk): static
    {
        if (!is_array($this->lossRisk)) {
            $this->lossRisk = [];
        }

        $this->lossRisk[0] = $lossRisk;

        return $this;
    }

    /**
     * @return LossRisk
     */
    public function addOnceToLossRiskWithCreate(): LossRisk
    {
        if (!is_array($this->lossRisk)) {
            $this->lossRisk = [];
        }

        if ([] === $this->lossRisk) {
            $this->addOnceTolossRisk(new LossRisk());
        }

        return $this->lossRisk[0];
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
     * @return null|DeliveryLocation
     */
    public function getDeliveryLocation(): ?DeliveryLocation
    {
        return $this->deliveryLocation;
    }

    /**
     * @return DeliveryLocation
     */
    public function getDeliveryLocationWithCreate(): DeliveryLocation
    {
        $this->deliveryLocation = is_null($this->deliveryLocation) ? new DeliveryLocation() : $this->deliveryLocation;

        return $this->deliveryLocation;
    }

    /**
     * @param  null|DeliveryLocation $deliveryLocation
     * @return static
     */
    public function setDeliveryLocation(?DeliveryLocation $deliveryLocation = null): static
    {
        $this->deliveryLocation = $deliveryLocation;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDeliveryLocation(): static
    {
        $this->deliveryLocation = null;

        return $this;
    }

    /**
     * @return null|AllowanceCharge
     */
    public function getAllowanceCharge(): ?AllowanceCharge
    {
        return $this->allowanceCharge;
    }

    /**
     * @return AllowanceCharge
     */
    public function getAllowanceChargeWithCreate(): AllowanceCharge
    {
        $this->allowanceCharge = is_null($this->allowanceCharge) ? new AllowanceCharge() : $this->allowanceCharge;

        return $this->allowanceCharge;
    }

    /**
     * @param  null|AllowanceCharge $allowanceCharge
     * @return static
     */
    public function setAllowanceCharge(?AllowanceCharge $allowanceCharge = null): static
    {
        $this->allowanceCharge = $allowanceCharge;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAllowanceCharge(): static
    {
        $this->allowanceCharge = null;

        return $this;
    }
}
