<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\ubl\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use JMS\Serializer\Annotation as JMS;

class TendererPartyQualificationType
{
    use HandlesObjectFlags;

    /**
     * @var null|array<InterestedProcurementProjectLot>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\InterestedProcurementProjectLot>")
     * @JMS\Expose
     * @JMS\SerializedName("InterestedProcurementProjectLot")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="InterestedProcurementProjectLot", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getInterestedProcurementProjectLot", setter="setInterestedProcurementProjectLot")
     */
    private $interestedProcurementProjectLot;

    /**
     * @var null|MainQualifyingParty
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\MainQualifyingParty")
     * @JMS\Expose
     * @JMS\SerializedName("MainQualifyingParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMainQualifyingParty", setter="setMainQualifyingParty")
     */
    private $mainQualifyingParty;

    /**
     * @var null|array<AdditionalQualifyingParty>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\AdditionalQualifyingParty>")
     * @JMS\Expose
     * @JMS\SerializedName("AdditionalQualifyingParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="AdditionalQualifyingParty", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getAdditionalQualifyingParty", setter="setAdditionalQualifyingParty")
     */
    private $additionalQualifyingParty;

    /**
     * @return null|array<InterestedProcurementProjectLot>
     */
    public function getInterestedProcurementProjectLot(): ?array
    {
        return $this->interestedProcurementProjectLot;
    }

    /**
     * @param  null|array<InterestedProcurementProjectLot> $interestedProcurementProjectLot
     * @return static
     */
    public function setInterestedProcurementProjectLot(?array $interestedProcurementProjectLot = null): static
    {
        $this->interestedProcurementProjectLot = $interestedProcurementProjectLot;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetInterestedProcurementProjectLot(): static
    {
        $this->interestedProcurementProjectLot = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearInterestedProcurementProjectLot(): static
    {
        $this->interestedProcurementProjectLot = [];

        return $this;
    }

    /**
     * @return null|InterestedProcurementProjectLot
     */
    public function firstInterestedProcurementProjectLot(): ?InterestedProcurementProjectLot
    {
        $interestedProcurementProjectLot = $this->interestedProcurementProjectLot ?? [];
        $interestedProcurementProjectLot = reset($interestedProcurementProjectLot);

        if (false === $interestedProcurementProjectLot) {
            return null;
        }

        return $interestedProcurementProjectLot;
    }

    /**
     * @return null|InterestedProcurementProjectLot
     */
    public function lastInterestedProcurementProjectLot(): ?InterestedProcurementProjectLot
    {
        $interestedProcurementProjectLot = $this->interestedProcurementProjectLot ?? [];
        $interestedProcurementProjectLot = end($interestedProcurementProjectLot);

        if (false === $interestedProcurementProjectLot) {
            return null;
        }

        return $interestedProcurementProjectLot;
    }

    /**
     * @param  InterestedProcurementProjectLot $interestedProcurementProjectLot
     * @return static
     */
    public function addToInterestedProcurementProjectLot(
        InterestedProcurementProjectLot $interestedProcurementProjectLot,
    ): static {
        $this->interestedProcurementProjectLot[] = $interestedProcurementProjectLot;

        return $this;
    }

    /**
     * @return InterestedProcurementProjectLot
     */
    public function addToInterestedProcurementProjectLotWithCreate(): InterestedProcurementProjectLot
    {
        $this->addTointerestedProcurementProjectLot($interestedProcurementProjectLot = new InterestedProcurementProjectLot());

        return $interestedProcurementProjectLot;
    }

    /**
     * @param  InterestedProcurementProjectLot $interestedProcurementProjectLot
     * @return static
     */
    public function addOnceToInterestedProcurementProjectLot(
        InterestedProcurementProjectLot $interestedProcurementProjectLot,
    ): static {
        if (!is_array($this->interestedProcurementProjectLot)) {
            $this->interestedProcurementProjectLot = [];
        }

        $this->interestedProcurementProjectLot[0] = $interestedProcurementProjectLot;

        return $this;
    }

    /**
     * @return InterestedProcurementProjectLot
     */
    public function addOnceToInterestedProcurementProjectLotWithCreate(): InterestedProcurementProjectLot
    {
        if (!is_array($this->interestedProcurementProjectLot)) {
            $this->interestedProcurementProjectLot = [];
        }

        if ([] === $this->interestedProcurementProjectLot) {
            $this->addOnceTointerestedProcurementProjectLot(new InterestedProcurementProjectLot());
        }

        return $this->interestedProcurementProjectLot[0];
    }

    /**
     * @return null|MainQualifyingParty
     */
    public function getMainQualifyingParty(): ?MainQualifyingParty
    {
        return $this->mainQualifyingParty;
    }

    /**
     * @return MainQualifyingParty
     */
    public function getMainQualifyingPartyWithCreate(): MainQualifyingParty
    {
        $this->mainQualifyingParty = is_null($this->mainQualifyingParty) ? new MainQualifyingParty() : $this->mainQualifyingParty;

        return $this->mainQualifyingParty;
    }

    /**
     * @param  null|MainQualifyingParty $mainQualifyingParty
     * @return static
     */
    public function setMainQualifyingParty(?MainQualifyingParty $mainQualifyingParty = null): static
    {
        $this->mainQualifyingParty = $mainQualifyingParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMainQualifyingParty(): static
    {
        $this->mainQualifyingParty = null;

        return $this;
    }

    /**
     * @return null|array<AdditionalQualifyingParty>
     */
    public function getAdditionalQualifyingParty(): ?array
    {
        return $this->additionalQualifyingParty;
    }

    /**
     * @param  null|array<AdditionalQualifyingParty> $additionalQualifyingParty
     * @return static
     */
    public function setAdditionalQualifyingParty(?array $additionalQualifyingParty = null): static
    {
        $this->additionalQualifyingParty = $additionalQualifyingParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAdditionalQualifyingParty(): static
    {
        $this->additionalQualifyingParty = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearAdditionalQualifyingParty(): static
    {
        $this->additionalQualifyingParty = [];

        return $this;
    }

    /**
     * @return null|AdditionalQualifyingParty
     */
    public function firstAdditionalQualifyingParty(): ?AdditionalQualifyingParty
    {
        $additionalQualifyingParty = $this->additionalQualifyingParty ?? [];
        $additionalQualifyingParty = reset($additionalQualifyingParty);

        if (false === $additionalQualifyingParty) {
            return null;
        }

        return $additionalQualifyingParty;
    }

    /**
     * @return null|AdditionalQualifyingParty
     */
    public function lastAdditionalQualifyingParty(): ?AdditionalQualifyingParty
    {
        $additionalQualifyingParty = $this->additionalQualifyingParty ?? [];
        $additionalQualifyingParty = end($additionalQualifyingParty);

        if (false === $additionalQualifyingParty) {
            return null;
        }

        return $additionalQualifyingParty;
    }

    /**
     * @param  AdditionalQualifyingParty $additionalQualifyingParty
     * @return static
     */
    public function addToAdditionalQualifyingParty(AdditionalQualifyingParty $additionalQualifyingParty): static
    {
        $this->additionalQualifyingParty[] = $additionalQualifyingParty;

        return $this;
    }

    /**
     * @return AdditionalQualifyingParty
     */
    public function addToAdditionalQualifyingPartyWithCreate(): AdditionalQualifyingParty
    {
        $this->addToadditionalQualifyingParty($additionalQualifyingParty = new AdditionalQualifyingParty());

        return $additionalQualifyingParty;
    }

    /**
     * @param  AdditionalQualifyingParty $additionalQualifyingParty
     * @return static
     */
    public function addOnceToAdditionalQualifyingParty(AdditionalQualifyingParty $additionalQualifyingParty): static
    {
        if (!is_array($this->additionalQualifyingParty)) {
            $this->additionalQualifyingParty = [];
        }

        $this->additionalQualifyingParty[0] = $additionalQualifyingParty;

        return $this;
    }

    /**
     * @return AdditionalQualifyingParty
     */
    public function addOnceToAdditionalQualifyingPartyWithCreate(): AdditionalQualifyingParty
    {
        if (!is_array($this->additionalQualifyingParty)) {
            $this->additionalQualifyingParty = [];
        }

        if ([] === $this->additionalQualifyingParty) {
            $this->addOnceToadditionalQualifyingParty(new AdditionalQualifyingParty());
        }

        return $this->additionalQualifyingParty[0];
    }
}
