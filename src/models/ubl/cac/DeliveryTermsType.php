<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\Amount;
use horstoeko\invoicesuite\models\ubl\cbc\ID;
use horstoeko\invoicesuite\models\ubl\cbc\LossRisk;
use horstoeko\invoicesuite\models\ubl\cbc\LossRiskResponsibilityCode;
use horstoeko\invoicesuite\models\ubl\cbc\SpecialTerms;

class DeliveryTermsType
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
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\SpecialTerms>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\SpecialTerms>")
     * @JMS\Expose
     * @JMS\SerializedName("SpecialTerms")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="SpecialTerms", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getSpecialTerms", setter="setSpecialTerms")
     */
    private $specialTerms;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\LossRiskResponsibilityCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\LossRiskResponsibilityCode")
     * @JMS\Expose
     * @JMS\SerializedName("LossRiskResponsibilityCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLossRiskResponsibilityCode", setter="setLossRiskResponsibilityCode")
     */
    private $lossRiskResponsibilityCode;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\LossRisk>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\LossRisk>")
     * @JMS\Expose
     * @JMS\SerializedName("LossRisk")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="LossRisk", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getLossRisk", setter="setLossRisk")
     */
    private $lossRisk;

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
     * @var \horstoeko\invoicesuite\models\ubl\cac\DeliveryLocation|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\DeliveryLocation")
     * @JMS\Expose
     * @JMS\SerializedName("DeliveryLocation")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDeliveryLocation", setter="setDeliveryLocation")
     */
    private $deliveryLocation;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\AllowanceCharge|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\AllowanceCharge")
     * @JMS\Expose
     * @JMS\SerializedName("AllowanceCharge")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAllowanceCharge", setter="setAllowanceCharge")
     */
    private $allowanceCharge;

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
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\SpecialTerms>|null
     */
    public function getSpecialTerms(): ?array
    {
        return $this->specialTerms;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\SpecialTerms>|null $specialTerms
     * @return self
     */
    public function setSpecialTerms(?array $specialTerms = null): self
    {
        $this->specialTerms = $specialTerms;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSpecialTerms(): self
    {
        $this->specialTerms = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearSpecialTerms(): self
    {
        $this->specialTerms = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\SpecialTerms $specialTerms
     * @return self
     */
    public function addToSpecialTerms(SpecialTerms $specialTerms): self
    {
        $this->specialTerms[] = $specialTerms;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\SpecialTerms
     */
    public function addToSpecialTermsWithCreate(): SpecialTerms
    {
        $this->addTospecialTerms($specialTerms = new SpecialTerms());

        return $specialTerms;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\SpecialTerms $specialTerms
     * @return self
     */
    public function addOnceToSpecialTerms(SpecialTerms $specialTerms): self
    {
        if (!is_array($this->specialTerms)) {
            $this->specialTerms = [];
        }

        $this->specialTerms[0] = $specialTerms;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\SpecialTerms
     */
    public function addOnceToSpecialTermsWithCreate(): SpecialTerms
    {
        if (!is_array($this->specialTerms)) {
            $this->specialTerms = [];
        }

        if ($this->specialTerms === []) {
            $this->addOnceTospecialTerms(new SpecialTerms());
        }

        return $this->specialTerms[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\LossRiskResponsibilityCode|null
     */
    public function getLossRiskResponsibilityCode(): ?LossRiskResponsibilityCode
    {
        return $this->lossRiskResponsibilityCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\LossRiskResponsibilityCode
     */
    public function getLossRiskResponsibilityCodeWithCreate(): LossRiskResponsibilityCode
    {
        $this->lossRiskResponsibilityCode = is_null($this->lossRiskResponsibilityCode) ? new LossRiskResponsibilityCode() : $this->lossRiskResponsibilityCode;

        return $this->lossRiskResponsibilityCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\LossRiskResponsibilityCode|null $lossRiskResponsibilityCode
     * @return self
     */
    public function setLossRiskResponsibilityCode(
        ?LossRiskResponsibilityCode $lossRiskResponsibilityCode = null,
    ): self {
        $this->lossRiskResponsibilityCode = $lossRiskResponsibilityCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetLossRiskResponsibilityCode(): self
    {
        $this->lossRiskResponsibilityCode = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\LossRisk>|null
     */
    public function getLossRisk(): ?array
    {
        return $this->lossRisk;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\LossRisk>|null $lossRisk
     * @return self
     */
    public function setLossRisk(?array $lossRisk = null): self
    {
        $this->lossRisk = $lossRisk;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetLossRisk(): self
    {
        $this->lossRisk = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearLossRisk(): self
    {
        $this->lossRisk = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\LossRisk $lossRisk
     * @return self
     */
    public function addToLossRisk(LossRisk $lossRisk): self
    {
        $this->lossRisk[] = $lossRisk;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\LossRisk
     */
    public function addToLossRiskWithCreate(): LossRisk
    {
        $this->addTolossRisk($lossRisk = new LossRisk());

        return $lossRisk;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\LossRisk $lossRisk
     * @return self
     */
    public function addOnceToLossRisk(LossRisk $lossRisk): self
    {
        if (!is_array($this->lossRisk)) {
            $this->lossRisk = [];
        }

        $this->lossRisk[0] = $lossRisk;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\LossRisk
     */
    public function addOnceToLossRiskWithCreate(): LossRisk
    {
        if (!is_array($this->lossRisk)) {
            $this->lossRisk = [];
        }

        if ($this->lossRisk === []) {
            $this->addOnceTolossRisk(new LossRisk());
        }

        return $this->lossRisk[0];
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
     * @return \horstoeko\invoicesuite\models\ubl\cac\DeliveryLocation|null
     */
    public function getDeliveryLocation(): ?DeliveryLocation
    {
        return $this->deliveryLocation;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\DeliveryLocation
     */
    public function getDeliveryLocationWithCreate(): DeliveryLocation
    {
        $this->deliveryLocation = is_null($this->deliveryLocation) ? new DeliveryLocation() : $this->deliveryLocation;

        return $this->deliveryLocation;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\DeliveryLocation|null $deliveryLocation
     * @return self
     */
    public function setDeliveryLocation(?DeliveryLocation $deliveryLocation = null): self
    {
        $this->deliveryLocation = $deliveryLocation;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDeliveryLocation(): self
    {
        $this->deliveryLocation = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\AllowanceCharge|null
     */
    public function getAllowanceCharge(): ?AllowanceCharge
    {
        return $this->allowanceCharge;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\AllowanceCharge
     */
    public function getAllowanceChargeWithCreate(): AllowanceCharge
    {
        $this->allowanceCharge = is_null($this->allowanceCharge) ? new AllowanceCharge() : $this->allowanceCharge;

        return $this->allowanceCharge;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\AllowanceCharge|null $allowanceCharge
     * @return self
     */
    public function setAllowanceCharge(?AllowanceCharge $allowanceCharge = null): self
    {
        $this->allowanceCharge = $allowanceCharge;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetAllowanceCharge(): self
    {
        $this->allowanceCharge = null;

        return $this;
    }
}
