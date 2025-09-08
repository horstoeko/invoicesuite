<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;

class TendererPartyQualificationType
{
    use HandlesObjectFlags;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\InterestedProcurementProjectLot>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\InterestedProcurementProjectLot>")
     * @JMS\Expose
     * @JMS\SerializedName("InterestedProcurementProjectLot")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="InterestedProcurementProjectLot", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getInterestedProcurementProjectLot", setter="setInterestedProcurementProjectLot")
     */
    private $interestedProcurementProjectLot;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\MainQualifyingParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\MainQualifyingParty")
     * @JMS\Expose
     * @JMS\SerializedName("MainQualifyingParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMainQualifyingParty", setter="setMainQualifyingParty")
     */
    private $mainQualifyingParty;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\AdditionalQualifyingParty>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\AdditionalQualifyingParty>")
     * @JMS\Expose
     * @JMS\SerializedName("AdditionalQualifyingParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="AdditionalQualifyingParty", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getAdditionalQualifyingParty", setter="setAdditionalQualifyingParty")
     */
    private $additionalQualifyingParty;

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\InterestedProcurementProjectLot>|null
     */
    public function getInterestedProcurementProjectLot(): ?array
    {
        return $this->interestedProcurementProjectLot;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\InterestedProcurementProjectLot>|null $interestedProcurementProjectLot
     * @return self
     */
    public function setInterestedProcurementProjectLot(?array $interestedProcurementProjectLot = null): self
    {
        $this->interestedProcurementProjectLot = $interestedProcurementProjectLot;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetInterestedProcurementProjectLot(): self
    {
        $this->interestedProcurementProjectLot = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearInterestedProcurementProjectLot(): self
    {
        $this->interestedProcurementProjectLot = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\InterestedProcurementProjectLot $interestedProcurementProjectLot
     * @return self
     */
    public function addToInterestedProcurementProjectLot(
        InterestedProcurementProjectLot $interestedProcurementProjectLot,
    ): self {
        $this->interestedProcurementProjectLot[] = $interestedProcurementProjectLot;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\InterestedProcurementProjectLot
     */
    public function addToInterestedProcurementProjectLotWithCreate(): InterestedProcurementProjectLot
    {
        $this->addTointerestedProcurementProjectLot($interestedProcurementProjectLot = new InterestedProcurementProjectLot());

        return $interestedProcurementProjectLot;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\InterestedProcurementProjectLot $interestedProcurementProjectLot
     * @return self
     */
    public function addOnceToInterestedProcurementProjectLot(
        InterestedProcurementProjectLot $interestedProcurementProjectLot,
    ): self {
        if (!is_array($this->interestedProcurementProjectLot)) {
            $this->interestedProcurementProjectLot = [];
        }

        $this->interestedProcurementProjectLot[0] = $interestedProcurementProjectLot;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\InterestedProcurementProjectLot
     */
    public function addOnceToInterestedProcurementProjectLotWithCreate(): InterestedProcurementProjectLot
    {
        if (!is_array($this->interestedProcurementProjectLot)) {
            $this->interestedProcurementProjectLot = [];
        }

        if ($this->interestedProcurementProjectLot === []) {
            $this->addOnceTointerestedProcurementProjectLot(new InterestedProcurementProjectLot());
        }

        return $this->interestedProcurementProjectLot[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\MainQualifyingParty|null
     */
    public function getMainQualifyingParty(): ?MainQualifyingParty
    {
        return $this->mainQualifyingParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\MainQualifyingParty
     */
    public function getMainQualifyingPartyWithCreate(): MainQualifyingParty
    {
        $this->mainQualifyingParty = is_null($this->mainQualifyingParty) ? new MainQualifyingParty() : $this->mainQualifyingParty;

        return $this->mainQualifyingParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\MainQualifyingParty|null $mainQualifyingParty
     * @return self
     */
    public function setMainQualifyingParty(?MainQualifyingParty $mainQualifyingParty = null): self
    {
        $this->mainQualifyingParty = $mainQualifyingParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetMainQualifyingParty(): self
    {
        $this->mainQualifyingParty = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\AdditionalQualifyingParty>|null
     */
    public function getAdditionalQualifyingParty(): ?array
    {
        return $this->additionalQualifyingParty;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\AdditionalQualifyingParty>|null $additionalQualifyingParty
     * @return self
     */
    public function setAdditionalQualifyingParty(?array $additionalQualifyingParty = null): self
    {
        $this->additionalQualifyingParty = $additionalQualifyingParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetAdditionalQualifyingParty(): self
    {
        $this->additionalQualifyingParty = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearAdditionalQualifyingParty(): self
    {
        $this->additionalQualifyingParty = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\AdditionalQualifyingParty $additionalQualifyingParty
     * @return self
     */
    public function addToAdditionalQualifyingParty(AdditionalQualifyingParty $additionalQualifyingParty): self
    {
        $this->additionalQualifyingParty[] = $additionalQualifyingParty;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\AdditionalQualifyingParty
     */
    public function addToAdditionalQualifyingPartyWithCreate(): AdditionalQualifyingParty
    {
        $this->addToadditionalQualifyingParty($additionalQualifyingParty = new AdditionalQualifyingParty());

        return $additionalQualifyingParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\AdditionalQualifyingParty $additionalQualifyingParty
     * @return self
     */
    public function addOnceToAdditionalQualifyingParty(AdditionalQualifyingParty $additionalQualifyingParty): self
    {
        if (!is_array($this->additionalQualifyingParty)) {
            $this->additionalQualifyingParty = [];
        }

        $this->additionalQualifyingParty[0] = $additionalQualifyingParty;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\AdditionalQualifyingParty
     */
    public function addOnceToAdditionalQualifyingPartyWithCreate(): AdditionalQualifyingParty
    {
        if (!is_array($this->additionalQualifyingParty)) {
            $this->additionalQualifyingParty = [];
        }

        if ($this->additionalQualifyingParty === []) {
            $this->addOnceToadditionalQualifyingParty(new AdditionalQualifyingParty());
        }

        return $this->additionalQualifyingParty[0];
    }
}
