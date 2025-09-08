<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\Amount;
use horstoeko\invoicesuite\models\ubl\cbc\Description;
use horstoeko\invoicesuite\models\ubl\cbc\MaximumPercent;
use horstoeko\invoicesuite\models\ubl\cbc\MinimumPercent;
use horstoeko\invoicesuite\models\ubl\cbc\Rate;
use horstoeko\invoicesuite\models\ubl\cbc\SubcontractingConditionsCode;

class SubcontractTermsType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\Rate|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\Rate")
     * @JMS\Expose
     * @JMS\SerializedName("Rate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRate", setter="setRate")
     */
    private $rate;

    /**
     * @var bool|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("UnknownPriceIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getUnknownPriceIndicator", setter="setUnknownPriceIndicator")
     */
    private $unknownPriceIndicator;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\Description>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\Description>")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Description", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $description;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\Amount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\Amount")
     * @JMS\Expose
     * @JMS\SerializedName("Amount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAmount", setter="setAmount")
     */
    private $amount;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\SubcontractingConditionsCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\SubcontractingConditionsCode")
     * @JMS\Expose
     * @JMS\SerializedName("SubcontractingConditionsCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSubcontractingConditionsCode", setter="setSubcontractingConditionsCode")
     */
    private $subcontractingConditionsCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\MaximumPercent|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\MaximumPercent")
     * @JMS\Expose
     * @JMS\SerializedName("MaximumPercent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMaximumPercent", setter="setMaximumPercent")
     */
    private $maximumPercent;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\MinimumPercent|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\MinimumPercent")
     * @JMS\Expose
     * @JMS\SerializedName("MinimumPercent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMinimumPercent", setter="setMinimumPercent")
     */
    private $minimumPercent;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Rate|null
     */
    public function getRate(): ?Rate
    {
        return $this->rate;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Rate
     */
    public function getRateWithCreate(): Rate
    {
        $this->rate = is_null($this->rate) ? new Rate() : $this->rate;

        return $this->rate;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Rate|null $rate
     * @return self
     */
    public function setRate(?Rate $rate = null): self
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetRate(): self
    {
        $this->rate = null;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getUnknownPriceIndicator(): ?bool
    {
        return $this->unknownPriceIndicator;
    }

    /**
     * @param bool|null $unknownPriceIndicator
     * @return self
     */
    public function setUnknownPriceIndicator(?bool $unknownPriceIndicator = null): self
    {
        $this->unknownPriceIndicator = $unknownPriceIndicator;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetUnknownPriceIndicator(): self
    {
        $this->unknownPriceIndicator = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\Description>|null
     */
    public function getDescription(): ?array
    {
        return $this->description;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\Description>|null $description
     * @return self
     */
    public function setDescription(?array $description = null): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDescription(): self
    {
        $this->description = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearDescription(): self
    {
        $this->description = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Description $description
     * @return self
     */
    public function addToDescription(Description $description): self
    {
        $this->description[] = $description;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Description
     */
    public function addToDescriptionWithCreate(): Description
    {
        $this->addTodescription($description = new Description());

        return $description;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Description $description
     * @return self
     */
    public function addOnceToDescription(Description $description): self
    {
        if (!is_array($this->description)) {
            $this->description = [];
        }

        $this->description[0] = $description;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Description
     */
    public function addOnceToDescriptionWithCreate(): Description
    {
        if (!is_array($this->description)) {
            $this->description = [];
        }

        if ($this->description === []) {
            $this->addOnceTodescription(new Description());
        }

        return $this->description[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Amount|null
     */
    public function getAmount(): ?Amount
    {
        return $this->amount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Amount
     */
    public function getAmountWithCreate(): Amount
    {
        $this->amount = is_null($this->amount) ? new Amount() : $this->amount;

        return $this->amount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Amount|null $amount
     * @return self
     */
    public function setAmount(?Amount $amount = null): self
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetAmount(): self
    {
        $this->amount = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\SubcontractingConditionsCode|null
     */
    public function getSubcontractingConditionsCode(): ?SubcontractingConditionsCode
    {
        return $this->subcontractingConditionsCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\SubcontractingConditionsCode
     */
    public function getSubcontractingConditionsCodeWithCreate(): SubcontractingConditionsCode
    {
        $this->subcontractingConditionsCode = is_null($this->subcontractingConditionsCode) ? new SubcontractingConditionsCode() : $this->subcontractingConditionsCode;

        return $this->subcontractingConditionsCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\SubcontractingConditionsCode|null $subcontractingConditionsCode
     * @return self
     */
    public function setSubcontractingConditionsCode(
        ?SubcontractingConditionsCode $subcontractingConditionsCode = null,
    ): self {
        $this->subcontractingConditionsCode = $subcontractingConditionsCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSubcontractingConditionsCode(): self
    {
        $this->subcontractingConditionsCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MaximumPercent|null
     */
    public function getMaximumPercent(): ?MaximumPercent
    {
        return $this->maximumPercent;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MaximumPercent
     */
    public function getMaximumPercentWithCreate(): MaximumPercent
    {
        $this->maximumPercent = is_null($this->maximumPercent) ? new MaximumPercent() : $this->maximumPercent;

        return $this->maximumPercent;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\MaximumPercent|null $maximumPercent
     * @return self
     */
    public function setMaximumPercent(?MaximumPercent $maximumPercent = null): self
    {
        $this->maximumPercent = $maximumPercent;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetMaximumPercent(): self
    {
        $this->maximumPercent = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MinimumPercent|null
     */
    public function getMinimumPercent(): ?MinimumPercent
    {
        return $this->minimumPercent;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MinimumPercent
     */
    public function getMinimumPercentWithCreate(): MinimumPercent
    {
        $this->minimumPercent = is_null($this->minimumPercent) ? new MinimumPercent() : $this->minimumPercent;

        return $this->minimumPercent;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\MinimumPercent|null $minimumPercent
     * @return self
     */
    public function setMinimumPercent(?MinimumPercent $minimumPercent = null): self
    {
        $this->minimumPercent = $minimumPercent;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetMinimumPercent(): self
    {
        $this->minimumPercent = null;

        return $this;
    }
}
