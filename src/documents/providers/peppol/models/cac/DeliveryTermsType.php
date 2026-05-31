<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Amount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LossRisk;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LossRiskResponsibilityCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SpecialTerms;
use JMS\Serializer\Annotation as JMS;

class DeliveryTermsType
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
     * @var null|array<SpecialTerms>
     */
    #[JMS\Accessor(getter: 'getSpecialTerms', setter: 'setSpecialTerms')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SpecialTerms')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SpecialTerms>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'SpecialTerms', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $specialTerms;

    /**
     * @var null|LossRiskResponsibilityCode
     */
    #[JMS\Accessor(getter: 'getLossRiskResponsibilityCode', setter: 'setLossRiskResponsibilityCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('LossRiskResponsibilityCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LossRiskResponsibilityCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $lossRiskResponsibilityCode;

    /**
     * @var null|array<LossRisk>
     */
    #[JMS\Accessor(getter: 'getLossRisk', setter: 'setLossRisk')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('LossRisk')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LossRisk>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'LossRisk', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $lossRisk;

    /**
     * @var null|Amount
     */
    #[JMS\Accessor(getter: 'getAmount', setter: 'setAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Amount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Amount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $amount;

    /**
     * @var null|DeliveryLocation
     */
    #[JMS\Accessor(getter: 'getDeliveryLocation', setter: 'setDeliveryLocation')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('DeliveryLocation')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\DeliveryLocation')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $deliveryLocation;

    /**
     * @var null|AllowanceCharge
     */
    #[JMS\Accessor(getter: 'getAllowanceCharge', setter: 'setAllowanceCharge')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('AllowanceCharge')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\AllowanceCharge')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
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
    public function setSpecialTerms(
        ?array $specialTerms = null
    ): static {
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
    public function addToSpecialTerms(
        SpecialTerms $specialTerms
    ): static {
        $this->specialTerms[] = $specialTerms;

        return $this;
    }

    /**
     * @return SpecialTerms
     */
    public function addToSpecialTermsWithCreate(): SpecialTerms
    {
        $this->addToSpecialTerms($specialTerms = new SpecialTerms());

        return $specialTerms;
    }

    /**
     * @param  SpecialTerms $specialTerms
     * @return static
     */
    public function addOnceToSpecialTerms(
        SpecialTerms $specialTerms
    ): static {
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
            $this->addOnceToSpecialTerms(new SpecialTerms());
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
        $this->lossRiskResponsibilityCode ??= new LossRiskResponsibilityCode();

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
    public function setLossRisk(
        ?array $lossRisk = null
    ): static {
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
    public function addToLossRisk(
        LossRisk $lossRisk
    ): static {
        $this->lossRisk[] = $lossRisk;

        return $this;
    }

    /**
     * @return LossRisk
     */
    public function addToLossRiskWithCreate(): LossRisk
    {
        $this->addToLossRisk($lossRisk = new LossRisk());

        return $lossRisk;
    }

    /**
     * @param  LossRisk $lossRisk
     * @return static
     */
    public function addOnceToLossRisk(
        LossRisk $lossRisk
    ): static {
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
            $this->addOnceToLossRisk(new LossRisk());
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
        $this->amount ??= new Amount();

        return $this->amount;
    }

    /**
     * @param  null|Amount $amount
     * @return static
     */
    public function setAmount(
        ?Amount $amount = null
    ): static {
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
        $this->deliveryLocation ??= new DeliveryLocation();

        return $this->deliveryLocation;
    }

    /**
     * @param  null|DeliveryLocation $deliveryLocation
     * @return static
     */
    public function setDeliveryLocation(
        ?DeliveryLocation $deliveryLocation = null
    ): static {
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
        $this->allowanceCharge ??= new AllowanceCharge();

        return $this->allowanceCharge;
    }

    /**
     * @param  null|AllowanceCharge $allowanceCharge
     * @return static
     */
    public function setAllowanceCharge(
        ?AllowanceCharge $allowanceCharge = null
    ): static {
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
