<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\AttributeID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Description;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\DescriptionCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PositionCode;
use JMS\Serializer\Annotation as JMS;

class PhysicalAttributeType
{
    use HandlesObjectFlags;

    /**
     * @var null|AttributeID
     */
    #[JMS\Accessor(getter: 'getAttributeID', setter: 'setAttributeID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('AttributeID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\AttributeID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $attributeID;

    /**
     * @var null|PositionCode
     */
    #[JMS\Accessor(getter: 'getPositionCode', setter: 'setPositionCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PositionCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PositionCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $positionCode;

    /**
     * @var null|DescriptionCode
     */
    #[JMS\Accessor(getter: 'getDescriptionCode', setter: 'setDescriptionCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('DescriptionCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\DescriptionCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $descriptionCode;

    /**
     * @var null|array<Description>
     */
    #[JMS\Accessor(getter: 'getDescription', setter: 'setDescription')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Description')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Description>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'Description', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
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
        $this->attributeID ??= new AttributeID();

        return $this->attributeID;
    }

    /**
     * @param  null|AttributeID $attributeID
     * @return static
     */
    public function setAttributeID(
        ?AttributeID $attributeID = null
    ): static {
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
        $this->positionCode ??= new PositionCode();

        return $this->positionCode;
    }

    /**
     * @param  null|PositionCode $positionCode
     * @return static
     */
    public function setPositionCode(
        ?PositionCode $positionCode = null
    ): static {
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
        $this->descriptionCode ??= new DescriptionCode();

        return $this->descriptionCode;
    }

    /**
     * @param  null|DescriptionCode $descriptionCode
     * @return static
     */
    public function setDescriptionCode(
        ?DescriptionCode $descriptionCode = null
    ): static {
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
    public function setDescription(
        ?array $description = null
    ): static {
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
    public function addToDescription(
        Description $description
    ): static {
        $this->description[] = $description;

        return $this;
    }

    /**
     * @return Description
     */
    public function addToDescriptionWithCreate(): Description
    {
        $this->addToDescription($description = new Description());

        return $description;
    }

    /**
     * @param  Description $description
     * @return static
     */
    public function addOnceToDescription(
        Description $description
    ): static {
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
            $this->addOnceToDescription(new Description());
        }

        return $this->description[0];
    }
}
