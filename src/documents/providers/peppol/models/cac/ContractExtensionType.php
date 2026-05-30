<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MaximumNumberNumeric;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MinimumNumberNumeric;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\OptionsDescription;
use JMS\Serializer\Annotation as JMS;

class ContractExtensionType
{
    use HandlesObjectFlags;

    /**
     * @var null|array<OptionsDescription>
     */
    #[JMS\Accessor(getter: 'getOptionsDescription', setter: 'setOptionsDescription')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('OptionsDescription')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\OptionsDescription>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'OptionsDescription', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $optionsDescription;

    /**
     * @var null|MinimumNumberNumeric
     */
    #[JMS\Accessor(getter: 'getMinimumNumberNumeric', setter: 'setMinimumNumberNumeric')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MinimumNumberNumeric')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MinimumNumberNumeric')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $minimumNumberNumeric;

    /**
     * @var null|MaximumNumberNumeric
     */
    #[JMS\Accessor(getter: 'getMaximumNumberNumeric', setter: 'setMaximumNumberNumeric')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MaximumNumberNumeric')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MaximumNumberNumeric')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $maximumNumberNumeric;

    /**
     * @var null|OptionValidityPeriod
     */
    #[JMS\Accessor(getter: 'getOptionValidityPeriod', setter: 'setOptionValidityPeriod')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('OptionValidityPeriod')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\OptionValidityPeriod')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $optionValidityPeriod;

    /**
     * @var null|array<Renewal>
     */
    #[JMS\Accessor(getter: 'getRenewal', setter: 'setRenewal')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Renewal')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\Renewal>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'Renewal', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $renewal;

    /**
     * @return null|array<OptionsDescription>
     */
    public function getOptionsDescription(): ?array
    {
        return $this->optionsDescription;
    }

    /**
     * @param  null|array<OptionsDescription> $optionsDescription
     * @return static
     */
    public function setOptionsDescription(
        ?array $optionsDescription = null
    ): static {
        $this->optionsDescription = $optionsDescription;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetOptionsDescription(): static
    {
        $this->optionsDescription = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearOptionsDescription(): static
    {
        $this->optionsDescription = [];

        return $this;
    }

    /**
     * @return null|OptionsDescription
     */
    public function firstOptionsDescription(): ?OptionsDescription
    {
        $optionsDescription = $this->optionsDescription ?? [];
        $optionsDescription = reset($optionsDescription);

        if (false === $optionsDescription) {
            return null;
        }

        return $optionsDescription;
    }

    /**
     * @return null|OptionsDescription
     */
    public function lastOptionsDescription(): ?OptionsDescription
    {
        $optionsDescription = $this->optionsDescription ?? [];
        $optionsDescription = end($optionsDescription);

        if (false === $optionsDescription) {
            return null;
        }

        return $optionsDescription;
    }

    /**
     * @param  OptionsDescription $optionsDescription
     * @return static
     */
    public function addToOptionsDescription(
        OptionsDescription $optionsDescription
    ): static {
        $this->optionsDescription[] = $optionsDescription;

        return $this;
    }

    /**
     * @return OptionsDescription
     */
    public function addToOptionsDescriptionWithCreate(): OptionsDescription
    {
        $this->addTooptionsDescription($optionsDescription = new OptionsDescription());

        return $optionsDescription;
    }

    /**
     * @param  OptionsDescription $optionsDescription
     * @return static
     */
    public function addOnceToOptionsDescription(
        OptionsDescription $optionsDescription
    ): static {
        if (!is_array($this->optionsDescription)) {
            $this->optionsDescription = [];
        }

        $this->optionsDescription[0] = $optionsDescription;

        return $this;
    }

    /**
     * @return OptionsDescription
     */
    public function addOnceToOptionsDescriptionWithCreate(): OptionsDescription
    {
        if (!is_array($this->optionsDescription)) {
            $this->optionsDescription = [];
        }

        if ([] === $this->optionsDescription) {
            $this->addOnceTooptionsDescription(new OptionsDescription());
        }

        return $this->optionsDescription[0];
    }

    /**
     * @return null|MinimumNumberNumeric
     */
    public function getMinimumNumberNumeric(): ?MinimumNumberNumeric
    {
        return $this->minimumNumberNumeric;
    }

    /**
     * @return MinimumNumberNumeric
     */
    public function getMinimumNumberNumericWithCreate(): MinimumNumberNumeric
    {
        $this->minimumNumberNumeric ??= new MinimumNumberNumeric();

        return $this->minimumNumberNumeric;
    }

    /**
     * @param  null|MinimumNumberNumeric $minimumNumberNumeric
     * @return static
     */
    public function setMinimumNumberNumeric(
        ?MinimumNumberNumeric $minimumNumberNumeric = null
    ): static {
        $this->minimumNumberNumeric = $minimumNumberNumeric;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMinimumNumberNumeric(): static
    {
        $this->minimumNumberNumeric = null;

        return $this;
    }

    /**
     * @return null|MaximumNumberNumeric
     */
    public function getMaximumNumberNumeric(): ?MaximumNumberNumeric
    {
        return $this->maximumNumberNumeric;
    }

    /**
     * @return MaximumNumberNumeric
     */
    public function getMaximumNumberNumericWithCreate(): MaximumNumberNumeric
    {
        $this->maximumNumberNumeric ??= new MaximumNumberNumeric();

        return $this->maximumNumberNumeric;
    }

    /**
     * @param  null|MaximumNumberNumeric $maximumNumberNumeric
     * @return static
     */
    public function setMaximumNumberNumeric(
        ?MaximumNumberNumeric $maximumNumberNumeric = null
    ): static {
        $this->maximumNumberNumeric = $maximumNumberNumeric;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMaximumNumberNumeric(): static
    {
        $this->maximumNumberNumeric = null;

        return $this;
    }

    /**
     * @return null|OptionValidityPeriod
     */
    public function getOptionValidityPeriod(): ?OptionValidityPeriod
    {
        return $this->optionValidityPeriod;
    }

    /**
     * @return OptionValidityPeriod
     */
    public function getOptionValidityPeriodWithCreate(): OptionValidityPeriod
    {
        $this->optionValidityPeriod ??= new OptionValidityPeriod();

        return $this->optionValidityPeriod;
    }

    /**
     * @param  null|OptionValidityPeriod $optionValidityPeriod
     * @return static
     */
    public function setOptionValidityPeriod(
        ?OptionValidityPeriod $optionValidityPeriod = null
    ): static {
        $this->optionValidityPeriod = $optionValidityPeriod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetOptionValidityPeriod(): static
    {
        $this->optionValidityPeriod = null;

        return $this;
    }

    /**
     * @return null|array<Renewal>
     */
    public function getRenewal(): ?array
    {
        return $this->renewal;
    }

    /**
     * @param  null|array<Renewal> $renewal
     * @return static
     */
    public function setRenewal(
        ?array $renewal = null
    ): static {
        $this->renewal = $renewal;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRenewal(): static
    {
        $this->renewal = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearRenewal(): static
    {
        $this->renewal = [];

        return $this;
    }

    /**
     * @return null|Renewal
     */
    public function firstRenewal(): ?Renewal
    {
        $renewal = $this->renewal ?? [];
        $renewal = reset($renewal);

        if (false === $renewal) {
            return null;
        }

        return $renewal;
    }

    /**
     * @return null|Renewal
     */
    public function lastRenewal(): ?Renewal
    {
        $renewal = $this->renewal ?? [];
        $renewal = end($renewal);

        if (false === $renewal) {
            return null;
        }

        return $renewal;
    }

    /**
     * @param  Renewal $renewal
     * @return static
     */
    public function addToRenewal(
        Renewal $renewal
    ): static {
        $this->renewal[] = $renewal;

        return $this;
    }

    /**
     * @return Renewal
     */
    public function addToRenewalWithCreate(): Renewal
    {
        $this->addTorenewal($renewal = new Renewal());

        return $renewal;
    }

    /**
     * @param  Renewal $renewal
     * @return static
     */
    public function addOnceToRenewal(
        Renewal $renewal
    ): static {
        if (!is_array($this->renewal)) {
            $this->renewal = [];
        }

        $this->renewal[0] = $renewal;

        return $this;
    }

    /**
     * @return Renewal
     */
    public function addOnceToRenewalWithCreate(): Renewal
    {
        if (!is_array($this->renewal)) {
            $this->renewal = [];
        }

        if ([] === $this->renewal) {
            $this->addOnceTorenewal(new Renewal());
        }

        return $this->renewal[0];
    }
}
