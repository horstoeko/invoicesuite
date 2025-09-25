<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\MaximumValue;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\MinimumValue;

class ItemPropertyRangeType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\MinimumValue|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\MinimumValue")
     * @JMS\Expose
     * @JMS\SerializedName("MinimumValue")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMinimumValue", setter="setMinimumValue")
     */
    private $minimumValue;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\MaximumValue|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\MaximumValue")
     * @JMS\Expose
     * @JMS\SerializedName("MaximumValue")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMaximumValue", setter="setMaximumValue")
     */
    private $maximumValue;

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\MinimumValue|null
     */
    public function getMinimumValue(): ?MinimumValue
    {
        return $this->minimumValue;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\MinimumValue
     */
    public function getMinimumValueWithCreate(): MinimumValue
    {
        $this->minimumValue = is_null($this->minimumValue) ? new MinimumValue() : $this->minimumValue;

        return $this->minimumValue;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\MinimumValue|null $minimumValue
     * @return self
     */
    public function setMinimumValue(?MinimumValue $minimumValue = null): self
    {
        $this->minimumValue = $minimumValue;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetMinimumValue(): self
    {
        $this->minimumValue = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\MaximumValue|null
     */
    public function getMaximumValue(): ?MaximumValue
    {
        return $this->maximumValue;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\MaximumValue
     */
    public function getMaximumValueWithCreate(): MaximumValue
    {
        $this->maximumValue = is_null($this->maximumValue) ? new MaximumValue() : $this->maximumValue;

        return $this->maximumValue;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\MaximumValue|null $maximumValue
     * @return self
     */
    public function setMaximumValue(?MaximumValue $maximumValue = null): self
    {
        $this->maximumValue = $maximumValue;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetMaximumValue(): self
    {
        $this->maximumValue = null;

        return $this;
    }
}
