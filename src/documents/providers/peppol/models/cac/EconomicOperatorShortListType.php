<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ExpectedQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LimitationDescription;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MaximumQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MinimumQuantity;
use JMS\Serializer\Annotation as JMS;

class EconomicOperatorShortListType
{
    use HandlesObjectFlags;

    /**
     * @var null|array<LimitationDescription>
     */
    #[JMS\Accessor(getter: 'getLimitationDescription', setter: 'setLimitationDescription')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('LimitationDescription')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LimitationDescription>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'LimitationDescription', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $limitationDescription;

    /**
     * @var null|ExpectedQuantity
     */
    #[JMS\Accessor(getter: 'getExpectedQuantity', setter: 'setExpectedQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ExpectedQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ExpectedQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $expectedQuantity;

    /**
     * @var null|MaximumQuantity
     */
    #[JMS\Accessor(getter: 'getMaximumQuantity', setter: 'setMaximumQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MaximumQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MaximumQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $maximumQuantity;

    /**
     * @var null|MinimumQuantity
     */
    #[JMS\Accessor(getter: 'getMinimumQuantity', setter: 'setMinimumQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MinimumQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MinimumQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $minimumQuantity;

    /**
     * @var null|array<PreSelectedParty>
     */
    #[JMS\Accessor(getter: 'getPreSelectedParty', setter: 'setPreSelectedParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PreSelectedParty')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\PreSelectedParty>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'PreSelectedParty', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $preSelectedParty;

    /**
     * @return null|array<LimitationDescription>
     */
    public function getLimitationDescription(): ?array
    {
        return $this->limitationDescription;
    }

    /**
     * @param  null|array<LimitationDescription> $limitationDescription
     * @return static
     */
    public function setLimitationDescription(
        ?array $limitationDescription = null
    ): static {
        $this->limitationDescription = $limitationDescription;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLimitationDescription(): static
    {
        $this->limitationDescription = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearLimitationDescription(): static
    {
        $this->limitationDescription = [];

        return $this;
    }

    /**
     * @return null|LimitationDescription
     */
    public function firstLimitationDescription(): ?LimitationDescription
    {
        $limitationDescription = $this->limitationDescription ?? [];
        $limitationDescription = reset($limitationDescription);

        if (false === $limitationDescription) {
            return null;
        }

        return $limitationDescription;
    }

    /**
     * @return null|LimitationDescription
     */
    public function lastLimitationDescription(): ?LimitationDescription
    {
        $limitationDescription = $this->limitationDescription ?? [];
        $limitationDescription = end($limitationDescription);

        if (false === $limitationDescription) {
            return null;
        }

        return $limitationDescription;
    }

    /**
     * @param  LimitationDescription $limitationDescription
     * @return static
     */
    public function addToLimitationDescription(
        LimitationDescription $limitationDescription
    ): static {
        $this->limitationDescription[] = $limitationDescription;

        return $this;
    }

    /**
     * @return LimitationDescription
     */
    public function addToLimitationDescriptionWithCreate(): LimitationDescription
    {
        $this->addTolimitationDescription($limitationDescription = new LimitationDescription());

        return $limitationDescription;
    }

    /**
     * @param  LimitationDescription $limitationDescription
     * @return static
     */
    public function addOnceToLimitationDescription(
        LimitationDescription $limitationDescription
    ): static {
        if (!is_array($this->limitationDescription)) {
            $this->limitationDescription = [];
        }

        $this->limitationDescription[0] = $limitationDescription;

        return $this;
    }

    /**
     * @return LimitationDescription
     */
    public function addOnceToLimitationDescriptionWithCreate(): LimitationDescription
    {
        if (!is_array($this->limitationDescription)) {
            $this->limitationDescription = [];
        }

        if ([] === $this->limitationDescription) {
            $this->addOnceTolimitationDescription(new LimitationDescription());
        }

        return $this->limitationDescription[0];
    }

    /**
     * @return null|ExpectedQuantity
     */
    public function getExpectedQuantity(): ?ExpectedQuantity
    {
        return $this->expectedQuantity;
    }

    /**
     * @return ExpectedQuantity
     */
    public function getExpectedQuantityWithCreate(): ExpectedQuantity
    {
        $this->expectedQuantity ??= new ExpectedQuantity();

        return $this->expectedQuantity;
    }

    /**
     * @param  null|ExpectedQuantity $expectedQuantity
     * @return static
     */
    public function setExpectedQuantity(
        ?ExpectedQuantity $expectedQuantity = null
    ): static {
        $this->expectedQuantity = $expectedQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetExpectedQuantity(): static
    {
        $this->expectedQuantity = null;

        return $this;
    }

    /**
     * @return null|MaximumQuantity
     */
    public function getMaximumQuantity(): ?MaximumQuantity
    {
        return $this->maximumQuantity;
    }

    /**
     * @return MaximumQuantity
     */
    public function getMaximumQuantityWithCreate(): MaximumQuantity
    {
        $this->maximumQuantity ??= new MaximumQuantity();

        return $this->maximumQuantity;
    }

    /**
     * @param  null|MaximumQuantity $maximumQuantity
     * @return static
     */
    public function setMaximumQuantity(
        ?MaximumQuantity $maximumQuantity = null
    ): static {
        $this->maximumQuantity = $maximumQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMaximumQuantity(): static
    {
        $this->maximumQuantity = null;

        return $this;
    }

    /**
     * @return null|MinimumQuantity
     */
    public function getMinimumQuantity(): ?MinimumQuantity
    {
        return $this->minimumQuantity;
    }

    /**
     * @return MinimumQuantity
     */
    public function getMinimumQuantityWithCreate(): MinimumQuantity
    {
        $this->minimumQuantity ??= new MinimumQuantity();

        return $this->minimumQuantity;
    }

    /**
     * @param  null|MinimumQuantity $minimumQuantity
     * @return static
     */
    public function setMinimumQuantity(
        ?MinimumQuantity $minimumQuantity = null
    ): static {
        $this->minimumQuantity = $minimumQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMinimumQuantity(): static
    {
        $this->minimumQuantity = null;

        return $this;
    }

    /**
     * @return null|array<PreSelectedParty>
     */
    public function getPreSelectedParty(): ?array
    {
        return $this->preSelectedParty;
    }

    /**
     * @param  null|array<PreSelectedParty> $preSelectedParty
     * @return static
     */
    public function setPreSelectedParty(
        ?array $preSelectedParty = null
    ): static {
        $this->preSelectedParty = $preSelectedParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPreSelectedParty(): static
    {
        $this->preSelectedParty = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearPreSelectedParty(): static
    {
        $this->preSelectedParty = [];

        return $this;
    }

    /**
     * @return null|PreSelectedParty
     */
    public function firstPreSelectedParty(): ?PreSelectedParty
    {
        $preSelectedParty = $this->preSelectedParty ?? [];
        $preSelectedParty = reset($preSelectedParty);

        if (false === $preSelectedParty) {
            return null;
        }

        return $preSelectedParty;
    }

    /**
     * @return null|PreSelectedParty
     */
    public function lastPreSelectedParty(): ?PreSelectedParty
    {
        $preSelectedParty = $this->preSelectedParty ?? [];
        $preSelectedParty = end($preSelectedParty);

        if (false === $preSelectedParty) {
            return null;
        }

        return $preSelectedParty;
    }

    /**
     * @param  PreSelectedParty $preSelectedParty
     * @return static
     */
    public function addToPreSelectedParty(
        PreSelectedParty $preSelectedParty
    ): static {
        $this->preSelectedParty[] = $preSelectedParty;

        return $this;
    }

    /**
     * @return PreSelectedParty
     */
    public function addToPreSelectedPartyWithCreate(): PreSelectedParty
    {
        $this->addTopreSelectedParty($preSelectedParty = new PreSelectedParty());

        return $preSelectedParty;
    }

    /**
     * @param  PreSelectedParty $preSelectedParty
     * @return static
     */
    public function addOnceToPreSelectedParty(
        PreSelectedParty $preSelectedParty
    ): static {
        if (!is_array($this->preSelectedParty)) {
            $this->preSelectedParty = [];
        }

        $this->preSelectedParty[0] = $preSelectedParty;

        return $this;
    }

    /**
     * @return PreSelectedParty
     */
    public function addOnceToPreSelectedPartyWithCreate(): PreSelectedParty
    {
        if (!is_array($this->preSelectedParty)) {
            $this->preSelectedParty = [];
        }

        if ([] === $this->preSelectedParty) {
            $this->addOnceTopreSelectedParty(new PreSelectedParty());
        }

        return $this->preSelectedParty[0];
    }
}
