<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\ubl\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\ubl\cbc\ExpectedQuantity;
use horstoeko\invoicesuite\documents\models\ubl\cbc\LimitationDescription;
use horstoeko\invoicesuite\documents\models\ubl\cbc\MaximumQuantity;
use horstoeko\invoicesuite\documents\models\ubl\cbc\MinimumQuantity;
use JMS\Serializer\Annotation as JMS;

class EconomicOperatorShortListType
{
    use HandlesObjectFlags;

    /**
     * @var null|array<LimitationDescription>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cbc\LimitationDescription>")
     * @JMS\Expose
     * @JMS\SerializedName("LimitationDescription")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="LimitationDescription", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getLimitationDescription", setter="setLimitationDescription")
     */
    private $limitationDescription;

    /**
     * @var null|ExpectedQuantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\ExpectedQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("ExpectedQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getExpectedQuantity", setter="setExpectedQuantity")
     */
    private $expectedQuantity;

    /**
     * @var null|MaximumQuantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\MaximumQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("MaximumQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMaximumQuantity", setter="setMaximumQuantity")
     */
    private $maximumQuantity;

    /**
     * @var null|MinimumQuantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\MinimumQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("MinimumQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMinimumQuantity", setter="setMinimumQuantity")
     */
    private $minimumQuantity;

    /**
     * @var null|array<PreSelectedParty>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\PreSelectedParty>")
     * @JMS\Expose
     * @JMS\SerializedName("PreSelectedParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PreSelectedParty", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getPreSelectedParty", setter="setPreSelectedParty")
     */
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
    public function setLimitationDescription(?array $limitationDescription = null): static
    {
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
    public function addToLimitationDescription(LimitationDescription $limitationDescription): static
    {
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
    public function addOnceToLimitationDescription(LimitationDescription $limitationDescription): static
    {
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
        $this->expectedQuantity = is_null($this->expectedQuantity) ? new ExpectedQuantity() : $this->expectedQuantity;

        return $this->expectedQuantity;
    }

    /**
     * @param  null|ExpectedQuantity $expectedQuantity
     * @return static
     */
    public function setExpectedQuantity(?ExpectedQuantity $expectedQuantity = null): static
    {
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
        $this->maximumQuantity = is_null($this->maximumQuantity) ? new MaximumQuantity() : $this->maximumQuantity;

        return $this->maximumQuantity;
    }

    /**
     * @param  null|MaximumQuantity $maximumQuantity
     * @return static
     */
    public function setMaximumQuantity(?MaximumQuantity $maximumQuantity = null): static
    {
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
        $this->minimumQuantity = is_null($this->minimumQuantity) ? new MinimumQuantity() : $this->minimumQuantity;

        return $this->minimumQuantity;
    }

    /**
     * @param  null|MinimumQuantity $minimumQuantity
     * @return static
     */
    public function setMinimumQuantity(?MinimumQuantity $minimumQuantity = null): static
    {
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
    public function setPreSelectedParty(?array $preSelectedParty = null): static
    {
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
    public function addToPreSelectedParty(PreSelectedParty $preSelectedParty): static
    {
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
    public function addOnceToPreSelectedParty(PreSelectedParty $preSelectedParty): static
    {
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
