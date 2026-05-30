<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CapabilityTypeCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Description;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ValueAmount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ValueQuantity;
use JMS\Serializer\Annotation as JMS;

class CapabilityType
{
    use HandlesObjectFlags;

    /**
     * @var null|CapabilityTypeCode
     */
    #[JMS\Accessor(getter: 'getCapabilityTypeCode', setter: 'setCapabilityTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CapabilityTypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CapabilityTypeCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $capabilityTypeCode;

    /**
     * @var null|array<Description>
     */
    #[JMS\Accessor(getter: 'getDescription', setter: 'setDescription')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Description')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Description>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'Description', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $description;

    /**
     * @var null|ValueAmount
     */
    #[JMS\Accessor(getter: 'getValueAmount', setter: 'setValueAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ValueAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ValueAmount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $valueAmount;

    /**
     * @var null|ValueQuantity
     */
    #[JMS\Accessor(getter: 'getValueQuantity', setter: 'setValueQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ValueQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ValueQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $valueQuantity;

    /**
     * @var null|array<EvidenceSupplied>
     */
    #[JMS\Accessor(getter: 'getEvidenceSupplied', setter: 'setEvidenceSupplied')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('EvidenceSupplied')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\EvidenceSupplied>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'EvidenceSupplied', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $evidenceSupplied;

    /**
     * @var null|ValidityPeriod
     */
    #[JMS\Accessor(getter: 'getValidityPeriod', setter: 'setValidityPeriod')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ValidityPeriod')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\ValidityPeriod')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $validityPeriod;

    /**
     * @return null|CapabilityTypeCode
     */
    public function getCapabilityTypeCode(): ?CapabilityTypeCode
    {
        return $this->capabilityTypeCode;
    }

    /**
     * @return CapabilityTypeCode
     */
    public function getCapabilityTypeCodeWithCreate(): CapabilityTypeCode
    {
        $this->capabilityTypeCode ??= new CapabilityTypeCode();

        return $this->capabilityTypeCode;
    }

    /**
     * @param  null|CapabilityTypeCode $capabilityTypeCode
     * @return static
     */
    public function setCapabilityTypeCode(
        ?CapabilityTypeCode $capabilityTypeCode = null
    ): static {
        $this->capabilityTypeCode = $capabilityTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCapabilityTypeCode(): static
    {
        $this->capabilityTypeCode = null;

        return $this;
    }

    /**
     * @return null|array<Description>
     */
    public function getDescription(): ?array
    {
        return $this->description;
    }

    /**
     * @param  null|array<Description> $description
     * @return static
     */
    public function setDescription(
        ?array $description = null
    ): static {
        $this->description = $description;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDescription(): static
    {
        $this->description = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearDescription(): static
    {
        $this->description = [];

        return $this;
    }

    /**
     * @return null|Description
     */
    public function firstDescription(): ?Description
    {
        $description = $this->description ?? [];
        $description = reset($description);

        if (false === $description) {
            return null;
        }

        return $description;
    }

    /**
     * @return null|Description
     */
    public function lastDescription(): ?Description
    {
        $description = $this->description ?? [];
        $description = end($description);

        if (false === $description) {
            return null;
        }

        return $description;
    }

    /**
     * @param  Description $description
     * @return static
     */
    public function addToDescription(
        Description $description
    ): static {
        $this->description[] = $description;

        return $this;
    }

    /**
     * @return Description
     */
    public function addToDescriptionWithCreate(): Description
    {
        $this->addTodescription($description = new Description());

        return $description;
    }

    /**
     * @param  Description $description
     * @return static
     */
    public function addOnceToDescription(
        Description $description
    ): static {
        if (!is_array($this->description)) {
            $this->description = [];
        }

        $this->description[0] = $description;

        return $this;
    }

    /**
     * @return Description
     */
    public function addOnceToDescriptionWithCreate(): Description
    {
        if (!is_array($this->description)) {
            $this->description = [];
        }

        if ([] === $this->description) {
            $this->addOnceTodescription(new Description());
        }

        return $this->description[0];
    }

    /**
     * @return null|ValueAmount
     */
    public function getValueAmount(): ?ValueAmount
    {
        return $this->valueAmount;
    }

    /**
     * @return ValueAmount
     */
    public function getValueAmountWithCreate(): ValueAmount
    {
        $this->valueAmount ??= new ValueAmount();

        return $this->valueAmount;
    }

    /**
     * @param  null|ValueAmount $valueAmount
     * @return static
     */
    public function setValueAmount(
        ?ValueAmount $valueAmount = null
    ): static {
        $this->valueAmount = $valueAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetValueAmount(): static
    {
        $this->valueAmount = null;

        return $this;
    }

    /**
     * @return null|ValueQuantity
     */
    public function getValueQuantity(): ?ValueQuantity
    {
        return $this->valueQuantity;
    }

    /**
     * @return ValueQuantity
     */
    public function getValueQuantityWithCreate(): ValueQuantity
    {
        $this->valueQuantity ??= new ValueQuantity();

        return $this->valueQuantity;
    }

    /**
     * @param  null|ValueQuantity $valueQuantity
     * @return static
     */
    public function setValueQuantity(
        ?ValueQuantity $valueQuantity = null
    ): static {
        $this->valueQuantity = $valueQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetValueQuantity(): static
    {
        $this->valueQuantity = null;

        return $this;
    }

    /**
     * @return null|array<EvidenceSupplied>
     */
    public function getEvidenceSupplied(): ?array
    {
        return $this->evidenceSupplied;
    }

    /**
     * @param  null|array<EvidenceSupplied> $evidenceSupplied
     * @return static
     */
    public function setEvidenceSupplied(
        ?array $evidenceSupplied = null
    ): static {
        $this->evidenceSupplied = $evidenceSupplied;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetEvidenceSupplied(): static
    {
        $this->evidenceSupplied = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearEvidenceSupplied(): static
    {
        $this->evidenceSupplied = [];

        return $this;
    }

    /**
     * @return null|EvidenceSupplied
     */
    public function firstEvidenceSupplied(): ?EvidenceSupplied
    {
        $evidenceSupplied = $this->evidenceSupplied ?? [];
        $evidenceSupplied = reset($evidenceSupplied);

        if (false === $evidenceSupplied) {
            return null;
        }

        return $evidenceSupplied;
    }

    /**
     * @return null|EvidenceSupplied
     */
    public function lastEvidenceSupplied(): ?EvidenceSupplied
    {
        $evidenceSupplied = $this->evidenceSupplied ?? [];
        $evidenceSupplied = end($evidenceSupplied);

        if (false === $evidenceSupplied) {
            return null;
        }

        return $evidenceSupplied;
    }

    /**
     * @param  EvidenceSupplied $evidenceSupplied
     * @return static
     */
    public function addToEvidenceSupplied(
        EvidenceSupplied $evidenceSupplied
    ): static {
        $this->evidenceSupplied[] = $evidenceSupplied;

        return $this;
    }

    /**
     * @return EvidenceSupplied
     */
    public function addToEvidenceSuppliedWithCreate(): EvidenceSupplied
    {
        $this->addToevidenceSupplied($evidenceSupplied = new EvidenceSupplied());

        return $evidenceSupplied;
    }

    /**
     * @param  EvidenceSupplied $evidenceSupplied
     * @return static
     */
    public function addOnceToEvidenceSupplied(
        EvidenceSupplied $evidenceSupplied
    ): static {
        if (!is_array($this->evidenceSupplied)) {
            $this->evidenceSupplied = [];
        }

        $this->evidenceSupplied[0] = $evidenceSupplied;

        return $this;
    }

    /**
     * @return EvidenceSupplied
     */
    public function addOnceToEvidenceSuppliedWithCreate(): EvidenceSupplied
    {
        if (!is_array($this->evidenceSupplied)) {
            $this->evidenceSupplied = [];
        }

        if ([] === $this->evidenceSupplied) {
            $this->addOnceToevidenceSupplied(new EvidenceSupplied());
        }

        return $this->evidenceSupplied[0];
    }

    /**
     * @return null|ValidityPeriod
     */
    public function getValidityPeriod(): ?ValidityPeriod
    {
        return $this->validityPeriod;
    }

    /**
     * @return ValidityPeriod
     */
    public function getValidityPeriodWithCreate(): ValidityPeriod
    {
        $this->validityPeriod ??= new ValidityPeriod();

        return $this->validityPeriod;
    }

    /**
     * @param  null|ValidityPeriod $validityPeriod
     * @return static
     */
    public function setValidityPeriod(
        ?ValidityPeriod $validityPeriod = null
    ): static {
        $this->validityPeriod = $validityPeriod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetValidityPeriod(): static
    {
        $this->validityPeriod = null;

        return $this;
    }
}
