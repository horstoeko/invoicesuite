<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\ExpectedOperatorQuantity;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\Frequency;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\Justification;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\MaximumOperatorQuantity;

class FrameworkAgreementType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\ExpectedOperatorQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\ExpectedOperatorQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("ExpectedOperatorQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getExpectedOperatorQuantity", setter="setExpectedOperatorQuantity")
     */
    private $expectedOperatorQuantity;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\MaximumOperatorQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\MaximumOperatorQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("MaximumOperatorQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMaximumOperatorQuantity", setter="setMaximumOperatorQuantity")
     */
    private $maximumOperatorQuantity;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Justification>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cbc\Justification>")
     * @JMS\Expose
     * @JMS\SerializedName("Justification")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Justification", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getJustification", setter="setJustification")
     */
    private $justification;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Frequency>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cbc\Frequency>")
     * @JMS\Expose
     * @JMS\SerializedName("Frequency")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Frequency", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getFrequency", setter="setFrequency")
     */
    private $frequency;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\DurationPeriod|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\DurationPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("DurationPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDurationPeriod", setter="setDurationPeriod")
     */
    private $durationPeriod;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\SubsequentProcessTenderRequirement>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\SubsequentProcessTenderRequirement>")
     * @JMS\Expose
     * @JMS\SerializedName("SubsequentProcessTenderRequirement")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="SubsequentProcessTenderRequirement", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getSubsequentProcessTenderRequirement", setter="setSubsequentProcessTenderRequirement")
     */
    private $subsequentProcessTenderRequirement;

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ExpectedOperatorQuantity|null
     */
    public function getExpectedOperatorQuantity(): ?ExpectedOperatorQuantity
    {
        return $this->expectedOperatorQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ExpectedOperatorQuantity
     */
    public function getExpectedOperatorQuantityWithCreate(): ExpectedOperatorQuantity
    {
        $this->expectedOperatorQuantity = is_null($this->expectedOperatorQuantity) ? new ExpectedOperatorQuantity() : $this->expectedOperatorQuantity;

        return $this->expectedOperatorQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ExpectedOperatorQuantity|null $expectedOperatorQuantity
     * @return self
     */
    public function setExpectedOperatorQuantity(?ExpectedOperatorQuantity $expectedOperatorQuantity = null): self
    {
        $this->expectedOperatorQuantity = $expectedOperatorQuantity;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetExpectedOperatorQuantity(): self
    {
        $this->expectedOperatorQuantity = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\MaximumOperatorQuantity|null
     */
    public function getMaximumOperatorQuantity(): ?MaximumOperatorQuantity
    {
        return $this->maximumOperatorQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\MaximumOperatorQuantity
     */
    public function getMaximumOperatorQuantityWithCreate(): MaximumOperatorQuantity
    {
        $this->maximumOperatorQuantity = is_null($this->maximumOperatorQuantity) ? new MaximumOperatorQuantity() : $this->maximumOperatorQuantity;

        return $this->maximumOperatorQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\MaximumOperatorQuantity|null $maximumOperatorQuantity
     * @return self
     */
    public function setMaximumOperatorQuantity(?MaximumOperatorQuantity $maximumOperatorQuantity = null): self
    {
        $this->maximumOperatorQuantity = $maximumOperatorQuantity;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetMaximumOperatorQuantity(): self
    {
        $this->maximumOperatorQuantity = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Justification>|null
     */
    public function getJustification(): ?array
    {
        return $this->justification;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Justification>|null $justification
     * @return self
     */
    public function setJustification(?array $justification = null): self
    {
        $this->justification = $justification;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetJustification(): self
    {
        $this->justification = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearJustification(): self
    {
        $this->justification = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Justification|null
     */
    public function firstJustification(): ?Justification
    {
        $justification = $this->justification ?? [];
        $justification = reset($justification);

        if ($justification === false) {
            return null;
        }

        return $justification;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Justification|null
     */
    public function lastJustification(): ?Justification
    {
        $justification = $this->justification ?? [];
        $justification = end($justification);

        if ($justification === false) {
            return null;
        }

        return $justification;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Justification $justification
     * @return self
     */
    public function addToJustification(Justification $justification): self
    {
        $this->justification[] = $justification;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Justification
     */
    public function addToJustificationWithCreate(): Justification
    {
        $this->addTojustification($justification = new Justification());

        return $justification;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Justification $justification
     * @return self
     */
    public function addOnceToJustification(Justification $justification): self
    {
        if (!is_array($this->justification)) {
            $this->justification = [];
        }

        $this->justification[0] = $justification;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Justification
     */
    public function addOnceToJustificationWithCreate(): Justification
    {
        if (!is_array($this->justification)) {
            $this->justification = [];
        }

        if ($this->justification === []) {
            $this->addOnceTojustification(new Justification());
        }

        return $this->justification[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Frequency>|null
     */
    public function getFrequency(): ?array
    {
        return $this->frequency;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Frequency>|null $frequency
     * @return self
     */
    public function setFrequency(?array $frequency = null): self
    {
        $this->frequency = $frequency;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetFrequency(): self
    {
        $this->frequency = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearFrequency(): self
    {
        $this->frequency = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Frequency|null
     */
    public function firstFrequency(): ?Frequency
    {
        $frequency = $this->frequency ?? [];
        $frequency = reset($frequency);

        if ($frequency === false) {
            return null;
        }

        return $frequency;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Frequency|null
     */
    public function lastFrequency(): ?Frequency
    {
        $frequency = $this->frequency ?? [];
        $frequency = end($frequency);

        if ($frequency === false) {
            return null;
        }

        return $frequency;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Frequency $frequency
     * @return self
     */
    public function addToFrequency(Frequency $frequency): self
    {
        $this->frequency[] = $frequency;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Frequency
     */
    public function addToFrequencyWithCreate(): Frequency
    {
        $this->addTofrequency($frequency = new Frequency());

        return $frequency;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Frequency $frequency
     * @return self
     */
    public function addOnceToFrequency(Frequency $frequency): self
    {
        if (!is_array($this->frequency)) {
            $this->frequency = [];
        }

        $this->frequency[0] = $frequency;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Frequency
     */
    public function addOnceToFrequencyWithCreate(): Frequency
    {
        if (!is_array($this->frequency)) {
            $this->frequency = [];
        }

        if ($this->frequency === []) {
            $this->addOnceTofrequency(new Frequency());
        }

        return $this->frequency[0];
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\DurationPeriod|null
     */
    public function getDurationPeriod(): ?DurationPeriod
    {
        return $this->durationPeriod;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\DurationPeriod
     */
    public function getDurationPeriodWithCreate(): DurationPeriod
    {
        $this->durationPeriod = is_null($this->durationPeriod) ? new DurationPeriod() : $this->durationPeriod;

        return $this->durationPeriod;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\DurationPeriod|null $durationPeriod
     * @return self
     */
    public function setDurationPeriod(?DurationPeriod $durationPeriod = null): self
    {
        $this->durationPeriod = $durationPeriod;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDurationPeriod(): self
    {
        $this->durationPeriod = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\SubsequentProcessTenderRequirement>|null
     */
    public function getSubsequentProcessTenderRequirement(): ?array
    {
        return $this->subsequentProcessTenderRequirement;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\SubsequentProcessTenderRequirement>|null $subsequentProcessTenderRequirement
     * @return self
     */
    public function setSubsequentProcessTenderRequirement(?array $subsequentProcessTenderRequirement = null): self
    {
        $this->subsequentProcessTenderRequirement = $subsequentProcessTenderRequirement;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSubsequentProcessTenderRequirement(): self
    {
        $this->subsequentProcessTenderRequirement = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearSubsequentProcessTenderRequirement(): self
    {
        $this->subsequentProcessTenderRequirement = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\SubsequentProcessTenderRequirement|null
     */
    public function firstSubsequentProcessTenderRequirement(): ?SubsequentProcessTenderRequirement
    {
        $subsequentProcessTenderRequirement = $this->subsequentProcessTenderRequirement ?? [];
        $subsequentProcessTenderRequirement = reset($subsequentProcessTenderRequirement);

        if ($subsequentProcessTenderRequirement === false) {
            return null;
        }

        return $subsequentProcessTenderRequirement;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\SubsequentProcessTenderRequirement|null
     */
    public function lastSubsequentProcessTenderRequirement(): ?SubsequentProcessTenderRequirement
    {
        $subsequentProcessTenderRequirement = $this->subsequentProcessTenderRequirement ?? [];
        $subsequentProcessTenderRequirement = end($subsequentProcessTenderRequirement);

        if ($subsequentProcessTenderRequirement === false) {
            return null;
        }

        return $subsequentProcessTenderRequirement;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\SubsequentProcessTenderRequirement $subsequentProcessTenderRequirement
     * @return self
     */
    public function addToSubsequentProcessTenderRequirement(
        SubsequentProcessTenderRequirement $subsequentProcessTenderRequirement,
    ): self {
        $this->subsequentProcessTenderRequirement[] = $subsequentProcessTenderRequirement;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\SubsequentProcessTenderRequirement
     */
    public function addToSubsequentProcessTenderRequirementWithCreate(): SubsequentProcessTenderRequirement
    {
        $this->addTosubsequentProcessTenderRequirement($subsequentProcessTenderRequirement = new SubsequentProcessTenderRequirement());

        return $subsequentProcessTenderRequirement;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\SubsequentProcessTenderRequirement $subsequentProcessTenderRequirement
     * @return self
     */
    public function addOnceToSubsequentProcessTenderRequirement(
        SubsequentProcessTenderRequirement $subsequentProcessTenderRequirement,
    ): self {
        if (!is_array($this->subsequentProcessTenderRequirement)) {
            $this->subsequentProcessTenderRequirement = [];
        }

        $this->subsequentProcessTenderRequirement[0] = $subsequentProcessTenderRequirement;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\SubsequentProcessTenderRequirement
     */
    public function addOnceToSubsequentProcessTenderRequirementWithCreate(): SubsequentProcessTenderRequirement
    {
        if (!is_array($this->subsequentProcessTenderRequirement)) {
            $this->subsequentProcessTenderRequirement = [];
        }

        if ($this->subsequentProcessTenderRequirement === []) {
            $this->addOnceTosubsequentProcessTenderRequirement(new SubsequentProcessTenderRequirement());
        }

        return $this->subsequentProcessTenderRequirement[0];
    }
}
