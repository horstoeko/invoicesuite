<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\CodeValue;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Description;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Name;
use JMS\Serializer\Annotation as JMS;

class ClassificationCategoryType
{
    use HandlesObjectFlags;

    /**
     * @var null|Name
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\Name")
     * @JMS\Expose
     * @JMS\SerializedName("Name")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getName", setter="setName")
     */
    private $name;

    /**
     * @var null|CodeValue
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\CodeValue")
     * @JMS\Expose
     * @JMS\SerializedName("CodeValue")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCodeValue", setter="setCodeValue")
     */
    private $codeValue;

    /**
     * @var null|array<Description>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\Description>")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Description", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $description;

    /**
     * @var null|array<CategorizesClassificationCategory>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\CategorizesClassificationCategory>")
     * @JMS\Expose
     * @JMS\SerializedName("CategorizesClassificationCategory")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="CategorizesClassificationCategory", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getCategorizesClassificationCategory", setter="setCategorizesClassificationCategory")
     */
    private $categorizesClassificationCategory;

    /**
     * @return null|Name
     */
    public function getName(): ?Name
    {
        return $this->name;
    }

    /**
     * @return Name
     */
    public function getNameWithCreate(): Name
    {
        $this->name = is_null($this->name) ? new Name() : $this->name;

        return $this->name;
    }

    /**
     * @param  null|Name $name
     * @return static
     */
    public function setName(?Name $name = null): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetName(): static
    {
        $this->name = null;

        return $this;
    }

    /**
     * @return null|CodeValue
     */
    public function getCodeValue(): ?CodeValue
    {
        return $this->codeValue;
    }

    /**
     * @return CodeValue
     */
    public function getCodeValueWithCreate(): CodeValue
    {
        $this->codeValue = is_null($this->codeValue) ? new CodeValue() : $this->codeValue;

        return $this->codeValue;
    }

    /**
     * @param  null|CodeValue $codeValue
     * @return static
     */
    public function setCodeValue(?CodeValue $codeValue = null): static
    {
        $this->codeValue = $codeValue;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCodeValue(): static
    {
        $this->codeValue = null;

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

    /**
     * @return null|array<CategorizesClassificationCategory>
     */
    public function getCategorizesClassificationCategory(): ?array
    {
        return $this->categorizesClassificationCategory;
    }

    /**
     * @param  null|array<CategorizesClassificationCategory> $categorizesClassificationCategory
     * @return static
     */
    public function setCategorizesClassificationCategory(?array $categorizesClassificationCategory = null): static
    {
        $this->categorizesClassificationCategory = $categorizesClassificationCategory;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCategorizesClassificationCategory(): static
    {
        $this->categorizesClassificationCategory = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearCategorizesClassificationCategory(): static
    {
        $this->categorizesClassificationCategory = [];

        return $this;
    }

    /**
     * @return null|CategorizesClassificationCategory
     */
    public function firstCategorizesClassificationCategory(): ?CategorizesClassificationCategory
    {
        $categorizesClassificationCategory = $this->categorizesClassificationCategory ?? [];
        $categorizesClassificationCategory = reset($categorizesClassificationCategory);

        if (false === $categorizesClassificationCategory) {
            return null;
        }

        return $categorizesClassificationCategory;
    }

    /**
     * @return null|CategorizesClassificationCategory
     */
    public function lastCategorizesClassificationCategory(): ?CategorizesClassificationCategory
    {
        $categorizesClassificationCategory = $this->categorizesClassificationCategory ?? [];
        $categorizesClassificationCategory = end($categorizesClassificationCategory);

        if (false === $categorizesClassificationCategory) {
            return null;
        }

        return $categorizesClassificationCategory;
    }

    /**
     * @param  CategorizesClassificationCategory $categorizesClassificationCategory
     * @return static
     */
    public function addToCategorizesClassificationCategory(
        CategorizesClassificationCategory $categorizesClassificationCategory,
    ): static {
        $this->categorizesClassificationCategory[] = $categorizesClassificationCategory;

        return $this;
    }

    /**
     * @return CategorizesClassificationCategory
     */
    public function addToCategorizesClassificationCategoryWithCreate(): CategorizesClassificationCategory
    {
        $this->addTocategorizesClassificationCategory($categorizesClassificationCategory = new CategorizesClassificationCategory());

        return $categorizesClassificationCategory;
    }

    /**
     * @param  CategorizesClassificationCategory $categorizesClassificationCategory
     * @return static
     */
    public function addOnceToCategorizesClassificationCategory(
        CategorizesClassificationCategory $categorizesClassificationCategory,
    ): static {
        if (!is_array($this->categorizesClassificationCategory)) {
            $this->categorizesClassificationCategory = [];
        }

        $this->categorizesClassificationCategory[0] = $categorizesClassificationCategory;

        return $this;
    }

    /**
     * @return CategorizesClassificationCategory
     */
    public function addOnceToCategorizesClassificationCategoryWithCreate(): CategorizesClassificationCategory
    {
        if (!is_array($this->categorizesClassificationCategory)) {
            $this->categorizesClassificationCategory = [];
        }

        if ([] === $this->categorizesClassificationCategory) {
            $this->addOnceTocategorizesClassificationCategory(new CategorizesClassificationCategory());
        }

        return $this->categorizesClassificationCategory[0];
    }
}
