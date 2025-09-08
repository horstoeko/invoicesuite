<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\MaximumNumberNumeric;
use horstoeko\invoicesuite\models\ubl\cbc\MinimumNumberNumeric;
use horstoeko\invoicesuite\models\ubl\cbc\OptionsDescription;

class ContractExtensionType
{
    use HandlesObjectFlags;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\OptionsDescription>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\OptionsDescription>")
     * @JMS\Expose
     * @JMS\SerializedName("OptionsDescription")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="OptionsDescription", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getOptionsDescription", setter="setOptionsDescription")
     */
    private $optionsDescription;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\MinimumNumberNumeric|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\MinimumNumberNumeric")
     * @JMS\Expose
     * @JMS\SerializedName("MinimumNumberNumeric")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMinimumNumberNumeric", setter="setMinimumNumberNumeric")
     */
    private $minimumNumberNumeric;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\MaximumNumberNumeric|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\MaximumNumberNumeric")
     * @JMS\Expose
     * @JMS\SerializedName("MaximumNumberNumeric")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMaximumNumberNumeric", setter="setMaximumNumberNumeric")
     */
    private $maximumNumberNumeric;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\OptionValidityPeriod|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\OptionValidityPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("OptionValidityPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOptionValidityPeriod", setter="setOptionValidityPeriod")
     */
    private $optionValidityPeriod;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\Renewal>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\Renewal>")
     * @JMS\Expose
     * @JMS\SerializedName("Renewal")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Renewal", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getRenewal", setter="setRenewal")
     */
    private $renewal;

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\OptionsDescription>|null
     */
    public function getOptionsDescription(): ?array
    {
        return $this->optionsDescription;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\OptionsDescription>|null $optionsDescription
     * @return self
     */
    public function setOptionsDescription(?array $optionsDescription = null): self
    {
        $this->optionsDescription = $optionsDescription;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetOptionsDescription(): self
    {
        $this->optionsDescription = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearOptionsDescription(): self
    {
        $this->optionsDescription = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\OptionsDescription $optionsDescription
     * @return self
     */
    public function addToOptionsDescription(OptionsDescription $optionsDescription): self
    {
        $this->optionsDescription[] = $optionsDescription;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\OptionsDescription
     */
    public function addToOptionsDescriptionWithCreate(): OptionsDescription
    {
        $this->addTooptionsDescription($optionsDescription = new OptionsDescription());

        return $optionsDescription;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\OptionsDescription $optionsDescription
     * @return self
     */
    public function addOnceToOptionsDescription(OptionsDescription $optionsDescription): self
    {
        if (!is_array($this->optionsDescription)) {
            $this->optionsDescription = [];
        }

        $this->optionsDescription[0] = $optionsDescription;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\OptionsDescription
     */
    public function addOnceToOptionsDescriptionWithCreate(): OptionsDescription
    {
        if (!is_array($this->optionsDescription)) {
            $this->optionsDescription = [];
        }

        if ($this->optionsDescription === []) {
            $this->addOnceTooptionsDescription(new OptionsDescription());
        }

        return $this->optionsDescription[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MinimumNumberNumeric|null
     */
    public function getMinimumNumberNumeric(): ?MinimumNumberNumeric
    {
        return $this->minimumNumberNumeric;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MinimumNumberNumeric
     */
    public function getMinimumNumberNumericWithCreate(): MinimumNumberNumeric
    {
        $this->minimumNumberNumeric = is_null($this->minimumNumberNumeric) ? new MinimumNumberNumeric() : $this->minimumNumberNumeric;

        return $this->minimumNumberNumeric;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\MinimumNumberNumeric|null $minimumNumberNumeric
     * @return self
     */
    public function setMinimumNumberNumeric(?MinimumNumberNumeric $minimumNumberNumeric = null): self
    {
        $this->minimumNumberNumeric = $minimumNumberNumeric;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetMinimumNumberNumeric(): self
    {
        $this->minimumNumberNumeric = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MaximumNumberNumeric|null
     */
    public function getMaximumNumberNumeric(): ?MaximumNumberNumeric
    {
        return $this->maximumNumberNumeric;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MaximumNumberNumeric
     */
    public function getMaximumNumberNumericWithCreate(): MaximumNumberNumeric
    {
        $this->maximumNumberNumeric = is_null($this->maximumNumberNumeric) ? new MaximumNumberNumeric() : $this->maximumNumberNumeric;

        return $this->maximumNumberNumeric;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\MaximumNumberNumeric|null $maximumNumberNumeric
     * @return self
     */
    public function setMaximumNumberNumeric(?MaximumNumberNumeric $maximumNumberNumeric = null): self
    {
        $this->maximumNumberNumeric = $maximumNumberNumeric;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetMaximumNumberNumeric(): self
    {
        $this->maximumNumberNumeric = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\OptionValidityPeriod|null
     */
    public function getOptionValidityPeriod(): ?OptionValidityPeriod
    {
        return $this->optionValidityPeriod;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\OptionValidityPeriod
     */
    public function getOptionValidityPeriodWithCreate(): OptionValidityPeriod
    {
        $this->optionValidityPeriod = is_null($this->optionValidityPeriod) ? new OptionValidityPeriod() : $this->optionValidityPeriod;

        return $this->optionValidityPeriod;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\OptionValidityPeriod|null $optionValidityPeriod
     * @return self
     */
    public function setOptionValidityPeriod(?OptionValidityPeriod $optionValidityPeriod = null): self
    {
        $this->optionValidityPeriod = $optionValidityPeriod;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetOptionValidityPeriod(): self
    {
        $this->optionValidityPeriod = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\Renewal>|null
     */
    public function getRenewal(): ?array
    {
        return $this->renewal;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\Renewal>|null $renewal
     * @return self
     */
    public function setRenewal(?array $renewal = null): self
    {
        $this->renewal = $renewal;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetRenewal(): self
    {
        $this->renewal = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearRenewal(): self
    {
        $this->renewal = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Renewal $renewal
     * @return self
     */
    public function addToRenewal(Renewal $renewal): self
    {
        $this->renewal[] = $renewal;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Renewal
     */
    public function addToRenewalWithCreate(): Renewal
    {
        $this->addTorenewal($renewal = new Renewal());

        return $renewal;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Renewal $renewal
     * @return self
     */
    public function addOnceToRenewal(Renewal $renewal): self
    {
        if (!is_array($this->renewal)) {
            $this->renewal = [];
        }

        $this->renewal[0] = $renewal;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Renewal
     */
    public function addOnceToRenewalWithCreate(): Renewal
    {
        if (!is_array($this->renewal)) {
            $this->renewal = [];
        }

        if ($this->renewal === []) {
            $this->addOnceTorenewal(new Renewal());
        }

        return $this->renewal[0];
    }
}
