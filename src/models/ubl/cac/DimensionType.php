<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\AttributeID;
use horstoeko\invoicesuite\models\ubl\cbc\Description;
use horstoeko\invoicesuite\models\ubl\cbc\MaximumMeasure;
use horstoeko\invoicesuite\models\ubl\cbc\Measure;
use horstoeko\invoicesuite\models\ubl\cbc\MinimumMeasure;

class DimensionType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\AttributeID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\AttributeID")
     * @JMS\Expose
     * @JMS\SerializedName("AttributeID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAttributeID", setter="setAttributeID")
     */
    private $attributeID;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\Measure|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\Measure")
     * @JMS\Expose
     * @JMS\SerializedName("Measure")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMeasure", setter="setMeasure")
     */
    private $measure;

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
     * @var \horstoeko\invoicesuite\models\ubl\cbc\MinimumMeasure|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\MinimumMeasure")
     * @JMS\Expose
     * @JMS\SerializedName("MinimumMeasure")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMinimumMeasure", setter="setMinimumMeasure")
     */
    private $minimumMeasure;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\MaximumMeasure|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\MaximumMeasure")
     * @JMS\Expose
     * @JMS\SerializedName("MaximumMeasure")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMaximumMeasure", setter="setMaximumMeasure")
     */
    private $maximumMeasure;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\AttributeID|null
     */
    public function getAttributeID(): ?AttributeID
    {
        return $this->attributeID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\AttributeID
     */
    public function getAttributeIDWithCreate(): AttributeID
    {
        $this->attributeID = is_null($this->attributeID) ? new AttributeID() : $this->attributeID;

        return $this->attributeID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\AttributeID|null $attributeID
     * @return self
     */
    public function setAttributeID(?AttributeID $attributeID = null): self
    {
        $this->attributeID = $attributeID;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Measure|null
     */
    public function getMeasure(): ?Measure
    {
        return $this->measure;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Measure
     */
    public function getMeasureWithCreate(): Measure
    {
        $this->measure = is_null($this->measure) ? new Measure() : $this->measure;

        return $this->measure;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Measure|null $measure
     * @return self
     */
    public function setMeasure(?Measure $measure = null): self
    {
        $this->measure = $measure;

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
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MinimumMeasure|null
     */
    public function getMinimumMeasure(): ?MinimumMeasure
    {
        return $this->minimumMeasure;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MinimumMeasure
     */
    public function getMinimumMeasureWithCreate(): MinimumMeasure
    {
        $this->minimumMeasure = is_null($this->minimumMeasure) ? new MinimumMeasure() : $this->minimumMeasure;

        return $this->minimumMeasure;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\MinimumMeasure|null $minimumMeasure
     * @return self
     */
    public function setMinimumMeasure(?MinimumMeasure $minimumMeasure = null): self
    {
        $this->minimumMeasure = $minimumMeasure;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MaximumMeasure|null
     */
    public function getMaximumMeasure(): ?MaximumMeasure
    {
        return $this->maximumMeasure;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MaximumMeasure
     */
    public function getMaximumMeasureWithCreate(): MaximumMeasure
    {
        $this->maximumMeasure = is_null($this->maximumMeasure) ? new MaximumMeasure() : $this->maximumMeasure;

        return $this->maximumMeasure;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\MaximumMeasure|null $maximumMeasure
     * @return self
     */
    public function setMaximumMeasure(?MaximumMeasure $maximumMeasure = null): self
    {
        $this->maximumMeasure = $maximumMeasure;

        return $this;
    }
}
