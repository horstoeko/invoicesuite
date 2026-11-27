<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MaximumNumberNumeric;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MinimumNumberNumeric;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\OptionsDescription;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
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
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[JMS\XmlList(entry: 'OptionsDescription', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $optionsDescription;

    /**
     * @var null|MinimumNumberNumeric
     */
    #[JMS\Accessor(getter: 'getMinimumNumberNumeric', setter: 'setMinimumNumberNumeric')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MinimumNumberNumeric')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MinimumNumberNumeric')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $minimumNumberNumeric;

    /**
     * @var null|MaximumNumberNumeric
     */
    #[JMS\Accessor(getter: 'getMaximumNumberNumeric', setter: 'setMaximumNumberNumeric')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MaximumNumberNumeric')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MaximumNumberNumeric')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $maximumNumberNumeric;

    /**
     * @var null|OptionValidityPeriod
     */
    #[JMS\Accessor(getter: 'getOptionValidityPeriod', setter: 'setOptionValidityPeriod')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('OptionValidityPeriod')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\OptionValidityPeriod')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $optionValidityPeriod;

    /**
     * @var null|array<Renewal>
     */
    #[JMS\Accessor(getter: 'getRenewal', setter: 'setRenewal')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Renewal')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\Renewal>')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[JMS\XmlList(entry: 'Renewal', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
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
        $optionsDescription = InvoiceSuiteArrayUtils::first($optionsDescription);

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
        $optionsDescription = InvoiceSuiteArrayUtils::last($optionsDescription);

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
        $this->addToOptionsDescription($optionsDescription = new OptionsDescription());

        return $optionsDescription;
    }

    /**
     * @param  OptionsDescription $optionsDescription
     * @return static
     */
    public function addOnceToOptionsDescription(
        OptionsDescription $optionsDescription
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->optionsDescription)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->optionsDescription)) {
            $this->optionsDescription = [];
        }

        if (InvoiceSuiteArrayUtils::empty($this->optionsDescription)) {
            $this->addOnceToOptionsDescription(new OptionsDescription());
        }

        return $this->optionsDescription[0];
    }

    /**
     * Execute a callback for each item
     *
     * @param  callable(OptionsDescription): mixed $callback
     * @return static
     */
    public function forEachOptionsDescription(
        callable $callback
    ): static {
        foreach ($this->optionsDescription ?? [] as $optionsDescription) {
            $callback($optionsDescription);
        }

        return $this;
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
        $renewal = InvoiceSuiteArrayUtils::first($renewal);

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
        $renewal = InvoiceSuiteArrayUtils::last($renewal);

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
        $this->addToRenewal($renewal = new Renewal());

        return $renewal;
    }

    /**
     * @param  Renewal $renewal
     * @return static
     */
    public function addOnceToRenewal(
        Renewal $renewal
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->renewal)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->renewal)) {
            $this->renewal = [];
        }

        if (InvoiceSuiteArrayUtils::empty($this->renewal)) {
            $this->addOnceToRenewal(new Renewal());
        }

        return $this->renewal[0];
    }

    /**
     * Execute a callback for each item
     *
     * @param  callable(Renewal): mixed $callback
     * @return static
     */
    public function forEachRenewal(
        callable $callback
    ): static {
        foreach ($this->renewal ?? [] as $renewal) {
            $callback($renewal);
        }

        return $this;
    }
}
