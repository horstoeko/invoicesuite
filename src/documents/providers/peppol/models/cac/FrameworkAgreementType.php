<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ExpectedOperatorQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Frequency;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Justification;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MaximumOperatorQuantity;
use JMS\Serializer\Annotation as JMS;

class FrameworkAgreementType
{
    use HandlesObjectFlags;

    /**
     * @var null|ExpectedOperatorQuantity
     */
    #[JMS\Accessor(getter: 'getExpectedOperatorQuantity', setter: 'setExpectedOperatorQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ExpectedOperatorQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ExpectedOperatorQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $expectedOperatorQuantity;

    /**
     * @var null|MaximumOperatorQuantity
     */
    #[JMS\Accessor(getter: 'getMaximumOperatorQuantity', setter: 'setMaximumOperatorQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MaximumOperatorQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MaximumOperatorQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $maximumOperatorQuantity;

    /**
     * @var null|array<Justification>
     */
    #[JMS\Accessor(getter: 'getJustification', setter: 'setJustification')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Justification')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Justification>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'Justification', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $justification;

    /**
     * @var null|array<Frequency>
     */
    #[JMS\Accessor(getter: 'getFrequency', setter: 'setFrequency')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Frequency')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Frequency>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'Frequency', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $frequency;

    /**
     * @var null|DurationPeriod
     */
    #[JMS\Accessor(getter: 'getDurationPeriod', setter: 'setDurationPeriod')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('DurationPeriod')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\DurationPeriod')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $durationPeriod;

    /**
     * @var null|array<SubsequentProcessTenderRequirement>
     */
    #[JMS\Accessor(getter: 'getSubsequentProcessTenderRequirement', setter: 'setSubsequentProcessTenderRequirement')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SubsequentProcessTenderRequirement')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\SubsequentProcessTenderRequirement>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'SubsequentProcessTenderRequirement', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $subsequentProcessTenderRequirement;

    /**
     * @return null|ExpectedOperatorQuantity
     */
    public function getExpectedOperatorQuantity(): ?ExpectedOperatorQuantity
    {
        return $this->expectedOperatorQuantity;
    }

    /**
     * @return ExpectedOperatorQuantity
     */
    public function getExpectedOperatorQuantityWithCreate(): ExpectedOperatorQuantity
    {
        $this->expectedOperatorQuantity ??= new ExpectedOperatorQuantity();

        return $this->expectedOperatorQuantity;
    }

    /**
     * @param  null|ExpectedOperatorQuantity $expectedOperatorQuantity
     * @return static
     */
    public function setExpectedOperatorQuantity(
        ?ExpectedOperatorQuantity $expectedOperatorQuantity = null
    ): static {
        $this->expectedOperatorQuantity = $expectedOperatorQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetExpectedOperatorQuantity(): static
    {
        $this->expectedOperatorQuantity = null;

        return $this;
    }

    /**
     * @return null|MaximumOperatorQuantity
     */
    public function getMaximumOperatorQuantity(): ?MaximumOperatorQuantity
    {
        return $this->maximumOperatorQuantity;
    }

    /**
     * @return MaximumOperatorQuantity
     */
    public function getMaximumOperatorQuantityWithCreate(): MaximumOperatorQuantity
    {
        $this->maximumOperatorQuantity ??= new MaximumOperatorQuantity();

        return $this->maximumOperatorQuantity;
    }

    /**
     * @param  null|MaximumOperatorQuantity $maximumOperatorQuantity
     * @return static
     */
    public function setMaximumOperatorQuantity(
        ?MaximumOperatorQuantity $maximumOperatorQuantity = null
    ): static {
        $this->maximumOperatorQuantity = $maximumOperatorQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMaximumOperatorQuantity(): static
    {
        $this->maximumOperatorQuantity = null;

        return $this;
    }

    /**
     * @return null|array<Justification>
     */
    public function getJustification(): ?array
    {
        return $this->justification;
    }

    /**
     * @param  null|array<Justification> $justification
     * @return static
     */
    public function setJustification(
        ?array $justification = null
    ): static {
        $this->justification = $justification;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetJustification(): static
    {
        $this->justification = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearJustification(): static
    {
        $this->justification = [];

        return $this;
    }

    /**
     * @return null|Justification
     */
    public function firstJustification(): ?Justification
    {
        $justification = $this->justification ?? [];
        $justification = reset($justification);

        if (false === $justification) {
            return null;
        }

        return $justification;
    }

    /**
     * @return null|Justification
     */
    public function lastJustification(): ?Justification
    {
        $justification = $this->justification ?? [];
        $justification = end($justification);

        if (false === $justification) {
            return null;
        }

        return $justification;
    }

    /**
     * @param  Justification $justification
     * @return static
     */
    public function addToJustification(
        Justification $justification
    ): static {
        $this->justification[] = $justification;

        return $this;
    }

    /**
     * @return Justification
     */
    public function addToJustificationWithCreate(): Justification
    {
        $this->addTojustification($justification = new Justification());

        return $justification;
    }

    /**
     * @param  Justification $justification
     * @return static
     */
    public function addOnceToJustification(
        Justification $justification
    ): static {
        if (!is_array($this->justification)) {
            $this->justification = [];
        }

        $this->justification[0] = $justification;

        return $this;
    }

    /**
     * @return Justification
     */
    public function addOnceToJustificationWithCreate(): Justification
    {
        if (!is_array($this->justification)) {
            $this->justification = [];
        }

        if ([] === $this->justification) {
            $this->addOnceTojustification(new Justification());
        }

        return $this->justification[0];
    }

    /**
     * @return null|array<Frequency>
     */
    public function getFrequency(): ?array
    {
        return $this->frequency;
    }

    /**
     * @param  null|array<Frequency> $frequency
     * @return static
     */
    public function setFrequency(
        ?array $frequency = null
    ): static {
        $this->frequency = $frequency;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetFrequency(): static
    {
        $this->frequency = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearFrequency(): static
    {
        $this->frequency = [];

        return $this;
    }

    /**
     * @return null|Frequency
     */
    public function firstFrequency(): ?Frequency
    {
        $frequency = $this->frequency ?? [];
        $frequency = reset($frequency);

        if (false === $frequency) {
            return null;
        }

        return $frequency;
    }

    /**
     * @return null|Frequency
     */
    public function lastFrequency(): ?Frequency
    {
        $frequency = $this->frequency ?? [];
        $frequency = end($frequency);

        if (false === $frequency) {
            return null;
        }

        return $frequency;
    }

    /**
     * @param  Frequency $frequency
     * @return static
     */
    public function addToFrequency(
        Frequency $frequency
    ): static {
        $this->frequency[] = $frequency;

        return $this;
    }

    /**
     * @return Frequency
     */
    public function addToFrequencyWithCreate(): Frequency
    {
        $this->addTofrequency($frequency = new Frequency());

        return $frequency;
    }

    /**
     * @param  Frequency $frequency
     * @return static
     */
    public function addOnceToFrequency(
        Frequency $frequency
    ): static {
        if (!is_array($this->frequency)) {
            $this->frequency = [];
        }

        $this->frequency[0] = $frequency;

        return $this;
    }

    /**
     * @return Frequency
     */
    public function addOnceToFrequencyWithCreate(): Frequency
    {
        if (!is_array($this->frequency)) {
            $this->frequency = [];
        }

        if ([] === $this->frequency) {
            $this->addOnceTofrequency(new Frequency());
        }

        return $this->frequency[0];
    }

    /**
     * @return null|DurationPeriod
     */
    public function getDurationPeriod(): ?DurationPeriod
    {
        return $this->durationPeriod;
    }

    /**
     * @return DurationPeriod
     */
    public function getDurationPeriodWithCreate(): DurationPeriod
    {
        $this->durationPeriod ??= new DurationPeriod();

        return $this->durationPeriod;
    }

    /**
     * @param  null|DurationPeriod $durationPeriod
     * @return static
     */
    public function setDurationPeriod(
        ?DurationPeriod $durationPeriod = null
    ): static {
        $this->durationPeriod = $durationPeriod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDurationPeriod(): static
    {
        $this->durationPeriod = null;

        return $this;
    }

    /**
     * @return null|array<SubsequentProcessTenderRequirement>
     */
    public function getSubsequentProcessTenderRequirement(): ?array
    {
        return $this->subsequentProcessTenderRequirement;
    }

    /**
     * @param  null|array<SubsequentProcessTenderRequirement> $subsequentProcessTenderRequirement
     * @return static
     */
    public function setSubsequentProcessTenderRequirement(
        ?array $subsequentProcessTenderRequirement = null
    ): static {
        $this->subsequentProcessTenderRequirement = $subsequentProcessTenderRequirement;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSubsequentProcessTenderRequirement(): static
    {
        $this->subsequentProcessTenderRequirement = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearSubsequentProcessTenderRequirement(): static
    {
        $this->subsequentProcessTenderRequirement = [];

        return $this;
    }

    /**
     * @return null|SubsequentProcessTenderRequirement
     */
    public function firstSubsequentProcessTenderRequirement(): ?SubsequentProcessTenderRequirement
    {
        $subsequentProcessTenderRequirement = $this->subsequentProcessTenderRequirement ?? [];
        $subsequentProcessTenderRequirement = reset($subsequentProcessTenderRequirement);

        if (false === $subsequentProcessTenderRequirement) {
            return null;
        }

        return $subsequentProcessTenderRequirement;
    }

    /**
     * @return null|SubsequentProcessTenderRequirement
     */
    public function lastSubsequentProcessTenderRequirement(): ?SubsequentProcessTenderRequirement
    {
        $subsequentProcessTenderRequirement = $this->subsequentProcessTenderRequirement ?? [];
        $subsequentProcessTenderRequirement = end($subsequentProcessTenderRequirement);

        if (false === $subsequentProcessTenderRequirement) {
            return null;
        }

        return $subsequentProcessTenderRequirement;
    }

    /**
     * @param  SubsequentProcessTenderRequirement $subsequentProcessTenderRequirement
     * @return static
     */
    public function addToSubsequentProcessTenderRequirement(
        SubsequentProcessTenderRequirement $subsequentProcessTenderRequirement,
    ): static {
        $this->subsequentProcessTenderRequirement[] = $subsequentProcessTenderRequirement;

        return $this;
    }

    /**
     * @return SubsequentProcessTenderRequirement
     */
    public function addToSubsequentProcessTenderRequirementWithCreate(): SubsequentProcessTenderRequirement
    {
        $this->addTosubsequentProcessTenderRequirement($subsequentProcessTenderRequirement = new SubsequentProcessTenderRequirement());

        return $subsequentProcessTenderRequirement;
    }

    /**
     * @param  SubsequentProcessTenderRequirement $subsequentProcessTenderRequirement
     * @return static
     */
    public function addOnceToSubsequentProcessTenderRequirement(
        SubsequentProcessTenderRequirement $subsequentProcessTenderRequirement,
    ): static {
        if (!is_array($this->subsequentProcessTenderRequirement)) {
            $this->subsequentProcessTenderRequirement = [];
        }

        $this->subsequentProcessTenderRequirement[0] = $subsequentProcessTenderRequirement;

        return $this;
    }

    /**
     * @return SubsequentProcessTenderRequirement
     */
    public function addOnceToSubsequentProcessTenderRequirementWithCreate(): SubsequentProcessTenderRequirement
    {
        if (!is_array($this->subsequentProcessTenderRequirement)) {
            $this->subsequentProcessTenderRequirement = [];
        }

        if ([] === $this->subsequentProcessTenderRequirement) {
            $this->addOnceTosubsequentProcessTenderRequirement(new SubsequentProcessTenderRequirement());
        }

        return $this->subsequentProcessTenderRequirement[0];
    }
}
