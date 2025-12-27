<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\ubl\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\ubl\cbc\AttributeID;
use horstoeko\invoicesuite\documents\models\ubl\cbc\Description;
use horstoeko\invoicesuite\documents\models\ubl\cbc\DescriptionCode;
use horstoeko\invoicesuite\documents\models\ubl\cbc\PositionCode;
use JMS\Serializer\Annotation as JMS;

class PhysicalAttributeType
{
    use HandlesObjectFlags;

    /**
     * @var null|AttributeID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\AttributeID")
     * @JMS\Expose
     * @JMS\SerializedName("AttributeID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAttributeID", setter="setAttributeID")
     */
    private $attributeID;

    /**
     * @var null|PositionCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\PositionCode")
     * @JMS\Expose
     * @JMS\SerializedName("PositionCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPositionCode", setter="setPositionCode")
     */
    private $positionCode;

    /**
     * @var null|DescriptionCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\DescriptionCode")
     * @JMS\Expose
     * @JMS\SerializedName("DescriptionCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDescriptionCode", setter="setDescriptionCode")
     */
    private $descriptionCode;

    /**
     * @var null|array<Description>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cbc\Description>")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Description", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $description;

    /**
     * @return null|AttributeID
     */
    public function getAttributeID(): ?AttributeID
    {
        return $this->attributeID;
    }

    /**
     * @return AttributeID
     */
    public function getAttributeIDWithCreate(): AttributeID
    {
        $this->attributeID = is_null($this->attributeID) ? new AttributeID() : $this->attributeID;

        return $this->attributeID;
    }

    /**
     * @param  null|AttributeID $attributeID
     * @return static
     */
    public function setAttributeID(?AttributeID $attributeID = null): static
    {
        $this->attributeID = $attributeID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAttributeID(): static
    {
        $this->attributeID = null;

        return $this;
    }

    /**
     * @return null|PositionCode
     */
    public function getPositionCode(): ?PositionCode
    {
        return $this->positionCode;
    }

    /**
     * @return PositionCode
     */
    public function getPositionCodeWithCreate(): PositionCode
    {
        $this->positionCode = is_null($this->positionCode) ? new PositionCode() : $this->positionCode;

        return $this->positionCode;
    }

    /**
     * @param  null|PositionCode $positionCode
     * @return static
     */
    public function setPositionCode(?PositionCode $positionCode = null): static
    {
        $this->positionCode = $positionCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPositionCode(): static
    {
        $this->positionCode = null;

        return $this;
    }

    /**
     * @return null|DescriptionCode
     */
    public function getDescriptionCode(): ?DescriptionCode
    {
        return $this->descriptionCode;
    }

    /**
     * @return DescriptionCode
     */
    public function getDescriptionCodeWithCreate(): DescriptionCode
    {
        $this->descriptionCode = is_null($this->descriptionCode) ? new DescriptionCode() : $this->descriptionCode;

        return $this->descriptionCode;
    }

    /**
     * @param  null|DescriptionCode $descriptionCode
     * @return static
     */
    public function setDescriptionCode(?DescriptionCode $descriptionCode = null): static
    {
        $this->descriptionCode = $descriptionCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDescriptionCode(): static
    {
        $this->descriptionCode = null;

        return $this;
    }

    /**
     * @return null|array<Description>
     */
    public function getDescription(): ?array
    {
        return $this->description;
    }

    /**
     * @param  null|array<Description> $description
     * @return static
     */
    public function setDescription(?array $description = null): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDescription(): static
    {
        $this->description = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearDescription(): static
    {
        $this->description = [];

        return $this;
    }

    /**
     * @return null|Description
     */
    public function firstDescription(): ?Description
    {
        $description = $this->description ?? [];
        $description = reset($description);

        if (false === $description) {
            return null;
        }

        return $description;
    }

    /**
     * @return null|Description
     */
    public function lastDescription(): ?Description
    {
        $description = $this->description ?? [];
        $description = end($description);

        if (false === $description) {
            return null;
        }

        return $description;
    }

    /**
     * @param  Description $description
     * @return static
     */
    public function addToDescription(Description $description): static
    {
        $this->description[] = $description;

        return $this;
    }

    /**
     * @return Description
     */
    public function addToDescriptionWithCreate(): Description
    {
        $this->addTodescription($description = new Description());

        return $description;
    }

    /**
     * @param  Description $description
     * @return static
     */
    public function addOnceToDescription(Description $description): static
    {
        if (!is_array($this->description)) {
            $this->description = [];
        }

        $this->description[0] = $description;

        return $this;
    }

    /**
     * @return Description
     */
    public function addOnceToDescriptionWithCreate(): Description
    {
        if (!is_array($this->description)) {
            $this->description = [];
        }

        if ([] === $this->description) {
            $this->addOnceTodescription(new Description());
        }

        return $this->description[0];
    }
}
