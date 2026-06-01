<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\AttributeID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Description;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MaximumMeasure;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Measure;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MinimumMeasure;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use JMS\Serializer\Annotation as JMS;

class DimensionType
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
     * @var null|Measure
     */
    #[JMS\Accessor(getter: 'getMeasure', setter: 'setMeasure')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Measure')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Measure')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $measure;

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
     * @var null|MinimumMeasure
     */
    #[JMS\Accessor(getter: 'getMinimumMeasure', setter: 'setMinimumMeasure')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MinimumMeasure')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MinimumMeasure')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $minimumMeasure;

    /**
     * @var null|MaximumMeasure
     */
    #[JMS\Accessor(getter: 'getMaximumMeasure', setter: 'setMaximumMeasure')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MaximumMeasure')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MaximumMeasure')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $maximumMeasure;

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
     * @return null|Measure
     */
    public function getMeasure(): ?Measure
    {
        return $this->measure;
    }

    /**
     * @return Measure
     */
    public function getMeasureWithCreate(): Measure
    {
        $this->measure ??= new Measure();

        return $this->measure;
    }

    /**
     * @param  null|Measure $measure
     * @return static
     */
    public function setMeasure(
        ?Measure $measure = null
    ): static {
        $this->measure = $measure;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMeasure(): static
    {
        $this->measure = null;

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
        if (!InvoiceSuiteArrayUtils::is($this->description)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->description)) {
            $this->description = [];
        }

        if ([] === $this->description) {
            $this->addOnceToDescription(new Description());
        }

        return $this->description[0];
    }

    /**
     * @return null|MinimumMeasure
     */
    public function getMinimumMeasure(): ?MinimumMeasure
    {
        return $this->minimumMeasure;
    }

    /**
     * @return MinimumMeasure
     */
    public function getMinimumMeasureWithCreate(): MinimumMeasure
    {
        $this->minimumMeasure ??= new MinimumMeasure();

        return $this->minimumMeasure;
    }

    /**
     * @param  null|MinimumMeasure $minimumMeasure
     * @return static
     */
    public function setMinimumMeasure(
        ?MinimumMeasure $minimumMeasure = null
    ): static {
        $this->minimumMeasure = $minimumMeasure;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMinimumMeasure(): static
    {
        $this->minimumMeasure = null;

        return $this;
    }

    /**
     * @return null|MaximumMeasure
     */
    public function getMaximumMeasure(): ?MaximumMeasure
    {
        return $this->maximumMeasure;
    }

    /**
     * @return MaximumMeasure
     */
    public function getMaximumMeasureWithCreate(): MaximumMeasure
    {
        $this->maximumMeasure ??= new MaximumMeasure();

        return $this->maximumMeasure;
    }

    /**
     * @param  null|MaximumMeasure $maximumMeasure
     * @return static
     */
    public function setMaximumMeasure(
        ?MaximumMeasure $maximumMeasure = null
    ): static {
        $this->maximumMeasure = $maximumMeasure;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMaximumMeasure(): static
    {
        $this->maximumMeasure = null;

        return $this;
    }
}
