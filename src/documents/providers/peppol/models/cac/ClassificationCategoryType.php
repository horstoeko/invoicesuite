<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CodeValue;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Description;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Name;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use JMS\Serializer\Annotation as JMS;

class ClassificationCategoryType
{
    use HandlesObjectFlags;

    /**
     * @var null|Name
     */
    #[JMS\Accessor(getter: 'getName', setter: 'setName')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Name')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Name')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $name;

    /**
     * @var null|CodeValue
     */
    #[JMS\Accessor(getter: 'getCodeValue', setter: 'setCodeValue')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CodeValue')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CodeValue')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $codeValue;

    /**
     * @var null|array<Description>
     */
    #[JMS\Accessor(getter: 'getDescription', setter: 'setDescription')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Description')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Description>')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[JMS\XmlList(entry: 'Description', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $description;

    /**
     * @var null|array<CategorizesClassificationCategory>
     */
    #[JMS\Accessor(getter: 'getCategorizesClassificationCategory', setter: 'setCategorizesClassificationCategory')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CategorizesClassificationCategory')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\CategorizesClassificationCategory>')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[JMS\XmlList(entry: 'CategorizesClassificationCategory', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
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
        $this->name ??= new Name();

        return $this->name;
    }

    /**
     * @param  null|Name $name
     * @return static
     */
    public function setName(
        ?Name $name = null
    ): static {
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
        $this->codeValue ??= new CodeValue();

        return $this->codeValue;
    }

    /**
     * @param  null|CodeValue $codeValue
     * @return static
     */
    public function setCodeValue(
        ?CodeValue $codeValue = null
    ): static {
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
        $description = InvoiceSuiteArrayUtils::first($description);

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
        $description = InvoiceSuiteArrayUtils::last($description);

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

        if (InvoiceSuiteArrayUtils::empty($this->description)) {
            $this->addOnceToDescription(new Description());
        }

        return $this->description[0];
    }

    /**
     * Execute a callback for each item
     *
     * @param  callable(Description): mixed $callback
     * @return static
     */
    public function forEachDescription(
        callable $callback
    ): static {
        foreach ($this->description ?? [] as $description) {
            $callback($description);
        }

        return $this;
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
    public function setCategorizesClassificationCategory(
        ?array $categorizesClassificationCategory = null
    ): static {
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
        $categorizesClassificationCategory = InvoiceSuiteArrayUtils::first($categorizesClassificationCategory);

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
        $categorizesClassificationCategory = InvoiceSuiteArrayUtils::last($categorizesClassificationCategory);

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
        $this->addToCategorizesClassificationCategory($categorizesClassificationCategory = new CategorizesClassificationCategory());

        return $categorizesClassificationCategory;
    }

    /**
     * @param  CategorizesClassificationCategory $categorizesClassificationCategory
     * @return static
     */
    public function addOnceToCategorizesClassificationCategory(
        CategorizesClassificationCategory $categorizesClassificationCategory,
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->categorizesClassificationCategory)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->categorizesClassificationCategory)) {
            $this->categorizesClassificationCategory = [];
        }

        if (InvoiceSuiteArrayUtils::empty($this->categorizesClassificationCategory)) {
            $this->addOnceToCategorizesClassificationCategory(new CategorizesClassificationCategory());
        }

        return $this->categorizesClassificationCategory[0];
    }

    /**
     * Execute a callback for each item
     *
     * @param  callable(CategorizesClassificationCategory): mixed $callback
     * @return static
     */
    public function forEachCategorizesClassificationCategory(
        callable $callback
    ): static {
        foreach ($this->categorizesClassificationCategory ?? [] as $categorizesClassificationCategory) {
            $callback($categorizesClassificationCategory);
        }

        return $this;
    }
}
