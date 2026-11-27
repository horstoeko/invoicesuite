<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use JMS\Serializer\Annotation as JMS;

class TendererPartyQualificationType
{
    use HandlesObjectFlags;

    /**
     * @var null|array<InterestedProcurementProjectLot>
     */
    #[JMS\Accessor(getter: 'getInterestedProcurementProjectLot', setter: 'setInterestedProcurementProjectLot')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('InterestedProcurementProjectLot')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\InterestedProcurementProjectLot>')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[JMS\XmlList(entry: 'InterestedProcurementProjectLot', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $interestedProcurementProjectLot;

    /**
     * @var null|MainQualifyingParty
     */
    #[JMS\Accessor(getter: 'getMainQualifyingParty', setter: 'setMainQualifyingParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MainQualifyingParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\MainQualifyingParty')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $mainQualifyingParty;

    /**
     * @var null|array<AdditionalQualifyingParty>
     */
    #[JMS\Accessor(getter: 'getAdditionalQualifyingParty', setter: 'setAdditionalQualifyingParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('AdditionalQualifyingParty')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\AdditionalQualifyingParty>')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[JMS\XmlList(entry: 'AdditionalQualifyingParty', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
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
    public function setInterestedProcurementProjectLot(
        ?array $interestedProcurementProjectLot = null
    ): static {
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
        $interestedProcurementProjectLot = InvoiceSuiteArrayUtils::first($interestedProcurementProjectLot);

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
        $interestedProcurementProjectLot = InvoiceSuiteArrayUtils::last($interestedProcurementProjectLot);

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
        $this->addToInterestedProcurementProjectLot($interestedProcurementProjectLot = new InterestedProcurementProjectLot());

        return $interestedProcurementProjectLot;
    }

    /**
     * @param  InterestedProcurementProjectLot $interestedProcurementProjectLot
     * @return static
     */
    public function addOnceToInterestedProcurementProjectLot(
        InterestedProcurementProjectLot $interestedProcurementProjectLot,
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->interestedProcurementProjectLot)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->interestedProcurementProjectLot)) {
            $this->interestedProcurementProjectLot = [];
        }

        if (InvoiceSuiteArrayUtils::empty($this->interestedProcurementProjectLot)) {
            $this->addOnceToInterestedProcurementProjectLot(new InterestedProcurementProjectLot());
        }

        return $this->interestedProcurementProjectLot[0];
    }

    /**
     * Execute a callback for each item
     *
     * @param  callable(InterestedProcurementProjectLot): mixed $callback
     * @return static
     */
    public function forEachInterestedProcurementProjectLot(
        callable $callback
    ): static {
        foreach ($this->interestedProcurementProjectLot ?? [] as $interestedProcurementProjectLot) {
            $callback($interestedProcurementProjectLot);
        }

        return $this;
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
        $this->mainQualifyingParty ??= new MainQualifyingParty();

        return $this->mainQualifyingParty;
    }

    /**
     * @param  null|MainQualifyingParty $mainQualifyingParty
     * @return static
     */
    public function setMainQualifyingParty(
        ?MainQualifyingParty $mainQualifyingParty = null
    ): static {
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
    public function setAdditionalQualifyingParty(
        ?array $additionalQualifyingParty = null
    ): static {
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
        $additionalQualifyingParty = InvoiceSuiteArrayUtils::first($additionalQualifyingParty);

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
        $additionalQualifyingParty = InvoiceSuiteArrayUtils::last($additionalQualifyingParty);

        if (false === $additionalQualifyingParty) {
            return null;
        }

        return $additionalQualifyingParty;
    }

    /**
     * @param  AdditionalQualifyingParty $additionalQualifyingParty
     * @return static
     */
    public function addToAdditionalQualifyingParty(
        AdditionalQualifyingParty $additionalQualifyingParty
    ): static {
        $this->additionalQualifyingParty[] = $additionalQualifyingParty;

        return $this;
    }

    /**
     * @return AdditionalQualifyingParty
     */
    public function addToAdditionalQualifyingPartyWithCreate(): AdditionalQualifyingParty
    {
        $this->addToAdditionalQualifyingParty($additionalQualifyingParty = new AdditionalQualifyingParty());

        return $additionalQualifyingParty;
    }

    /**
     * @param  AdditionalQualifyingParty $additionalQualifyingParty
     * @return static
     */
    public function addOnceToAdditionalQualifyingParty(
        AdditionalQualifyingParty $additionalQualifyingParty
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->additionalQualifyingParty)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->additionalQualifyingParty)) {
            $this->additionalQualifyingParty = [];
        }

        if (InvoiceSuiteArrayUtils::empty($this->additionalQualifyingParty)) {
            $this->addOnceToAdditionalQualifyingParty(new AdditionalQualifyingParty());
        }

        return $this->additionalQualifyingParty[0];
    }

    /**
     * Execute a callback for each item
     *
     * @param  callable(AdditionalQualifyingParty): mixed $callback
     * @return static
     */
    public function forEachAdditionalQualifyingParty(
        callable $callback
    ): static {
        foreach ($this->additionalQualifyingParty ?? [] as $additionalQualifyingParty) {
            $callback($additionalQualifyingParty);
        }

        return $this;
    }
}
