<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\ExpectedQuantity;
use horstoeko\invoicesuite\models\ubl\cbc\LimitationDescription;
use horstoeko\invoicesuite\models\ubl\cbc\MaximumQuantity;
use horstoeko\invoicesuite\models\ubl\cbc\MinimumQuantity;

class EconomicOperatorShortListType
{
    use HandlesObjectFlags;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\LimitationDescription>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\LimitationDescription>")
     * @JMS\Expose
     * @JMS\SerializedName("LimitationDescription")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="LimitationDescription", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getLimitationDescription", setter="setLimitationDescription")
     */
    private $limitationDescription;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ExpectedQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ExpectedQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("ExpectedQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getExpectedQuantity", setter="setExpectedQuantity")
     */
    private $expectedQuantity;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\MaximumQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\MaximumQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("MaximumQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMaximumQuantity", setter="setMaximumQuantity")
     */
    private $maximumQuantity;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\MinimumQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\MinimumQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("MinimumQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMinimumQuantity", setter="setMinimumQuantity")
     */
    private $minimumQuantity;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\PreSelectedParty>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\PreSelectedParty>")
     * @JMS\Expose
     * @JMS\SerializedName("PreSelectedParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PreSelectedParty", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getPreSelectedParty", setter="setPreSelectedParty")
     */
    private $preSelectedParty;

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\LimitationDescription>|null
     */
    public function getLimitationDescription(): ?array
    {
        return $this->limitationDescription;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\LimitationDescription>|null $limitationDescription
     * @return self
     */
    public function setLimitationDescription(?array $limitationDescription = null): self
    {
        $this->limitationDescription = $limitationDescription;

        return $this;
    }

    /**
     * @return self
     */
    public function clearLimitationDescription(): self
    {
        $this->limitationDescription = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\LimitationDescription $limitationDescription
     * @return self
     */
    public function addToLimitationDescription(LimitationDescription $limitationDescription): self
    {
        $this->limitationDescription[] = $limitationDescription;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\LimitationDescription
     */
    public function addToLimitationDescriptionWithCreate(): LimitationDescription
    {
        $this->addTolimitationDescription($limitationDescription = new LimitationDescription());

        return $limitationDescription;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\LimitationDescription $limitationDescription
     * @return self
     */
    public function addOnceToLimitationDescription(LimitationDescription $limitationDescription): self
    {
        if (!is_array($this->limitationDescription)) {
            $this->limitationDescription = [];
        }

        $this->limitationDescription[0] = $limitationDescription;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\LimitationDescription
     */
    public function addOnceToLimitationDescriptionWithCreate(): LimitationDescription
    {
        if (!is_array($this->limitationDescription)) {
            $this->limitationDescription = [];
        }

        if ($this->limitationDescription === []) {
            $this->addOnceTolimitationDescription(new LimitationDescription());
        }

        return $this->limitationDescription[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ExpectedQuantity|null
     */
    public function getExpectedQuantity(): ?ExpectedQuantity
    {
        return $this->expectedQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ExpectedQuantity
     */
    public function getExpectedQuantityWithCreate(): ExpectedQuantity
    {
        $this->expectedQuantity = is_null($this->expectedQuantity) ? new ExpectedQuantity() : $this->expectedQuantity;

        return $this->expectedQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ExpectedQuantity|null $expectedQuantity
     * @return self
     */
    public function setExpectedQuantity(?ExpectedQuantity $expectedQuantity = null): self
    {
        $this->expectedQuantity = $expectedQuantity;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MaximumQuantity|null
     */
    public function getMaximumQuantity(): ?MaximumQuantity
    {
        return $this->maximumQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MaximumQuantity
     */
    public function getMaximumQuantityWithCreate(): MaximumQuantity
    {
        $this->maximumQuantity = is_null($this->maximumQuantity) ? new MaximumQuantity() : $this->maximumQuantity;

        return $this->maximumQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\MaximumQuantity|null $maximumQuantity
     * @return self
     */
    public function setMaximumQuantity(?MaximumQuantity $maximumQuantity = null): self
    {
        $this->maximumQuantity = $maximumQuantity;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MinimumQuantity|null
     */
    public function getMinimumQuantity(): ?MinimumQuantity
    {
        return $this->minimumQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MinimumQuantity
     */
    public function getMinimumQuantityWithCreate(): MinimumQuantity
    {
        $this->minimumQuantity = is_null($this->minimumQuantity) ? new MinimumQuantity() : $this->minimumQuantity;

        return $this->minimumQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\MinimumQuantity|null $minimumQuantity
     * @return self
     */
    public function setMinimumQuantity(?MinimumQuantity $minimumQuantity = null): self
    {
        $this->minimumQuantity = $minimumQuantity;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\PreSelectedParty>|null
     */
    public function getPreSelectedParty(): ?array
    {
        return $this->preSelectedParty;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\PreSelectedParty>|null $preSelectedParty
     * @return self
     */
    public function setPreSelectedParty(?array $preSelectedParty = null): self
    {
        $this->preSelectedParty = $preSelectedParty;

        return $this;
    }

    /**
     * @return self
     */
    public function clearPreSelectedParty(): self
    {
        $this->preSelectedParty = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\PreSelectedParty $preSelectedParty
     * @return self
     */
    public function addToPreSelectedParty(PreSelectedParty $preSelectedParty): self
    {
        $this->preSelectedParty[] = $preSelectedParty;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\PreSelectedParty
     */
    public function addToPreSelectedPartyWithCreate(): PreSelectedParty
    {
        $this->addTopreSelectedParty($preSelectedParty = new PreSelectedParty());

        return $preSelectedParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\PreSelectedParty $preSelectedParty
     * @return self
     */
    public function addOnceToPreSelectedParty(PreSelectedParty $preSelectedParty): self
    {
        if (!is_array($this->preSelectedParty)) {
            $this->preSelectedParty = [];
        }

        $this->preSelectedParty[0] = $preSelectedParty;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\PreSelectedParty
     */
    public function addOnceToPreSelectedPartyWithCreate(): PreSelectedParty
    {
        if (!is_array($this->preSelectedParty)) {
            $this->preSelectedParty = [];
        }

        if ($this->preSelectedParty === []) {
            $this->addOnceTopreSelectedParty(new PreSelectedParty());
        }

        return $this->preSelectedParty[0];
    }
}
