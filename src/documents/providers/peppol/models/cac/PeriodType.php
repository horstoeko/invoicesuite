<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Description;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\DescriptionCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\DurationMeasure;
use JMS\Serializer\Annotation as JMS;

class PeriodType
{
    use HandlesObjectFlags;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getStartDate', setter: 'setStartDate')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('StartDate')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $startDate;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getStartTime', setter: 'setStartTime')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('StartTime')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $startTime;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getEndDate', setter: 'setEndDate')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('EndDate')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $endDate;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getEndTime', setter: 'setEndTime')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('EndTime')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $endTime;

    /**
     * @var null|DurationMeasure
     */
    #[JMS\Accessor(getter: 'getDurationMeasure', setter: 'setDurationMeasure')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('DurationMeasure')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\DurationMeasure')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $durationMeasure;

    /**
     * @var null|array<DescriptionCode>
     */
    #[JMS\Accessor(getter: 'getDescriptionCode', setter: 'setDescriptionCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('DescriptionCode')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\DescriptionCode>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'DescriptionCode', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
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
     * @return null|DateTimeInterface
     */
    public function getStartDate(): ?DateTimeInterface
    {
        return $this->startDate;
    }

    /**
     * @param  null|DateTimeInterface $startDate
     * @return static
     */
    public function setStartDate(
        ?DateTimeInterface $startDate = null
    ): static {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetStartDate(): static
    {
        $this->startDate = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getStartTime(): ?DateTimeInterface
    {
        return $this->startTime;
    }

    /**
     * @param  null|DateTimeInterface $startTime
     * @return static
     */
    public function setStartTime(
        ?DateTimeInterface $startTime = null
    ): static {
        $this->startTime = $startTime;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetStartTime(): static
    {
        $this->startTime = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getEndDate(): ?DateTimeInterface
    {
        return $this->endDate;
    }

    /**
     * @param  null|DateTimeInterface $endDate
     * @return static
     */
    public function setEndDate(
        ?DateTimeInterface $endDate = null
    ): static {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetEndDate(): static
    {
        $this->endDate = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getEndTime(): ?DateTimeInterface
    {
        return $this->endTime;
    }

    /**
     * @param  null|DateTimeInterface $endTime
     * @return static
     */
    public function setEndTime(
        ?DateTimeInterface $endTime = null
    ): static {
        $this->endTime = $endTime;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetEndTime(): static
    {
        $this->endTime = null;

        return $this;
    }

    /**
     * @return null|DurationMeasure
     */
    public function getDurationMeasure(): ?DurationMeasure
    {
        return $this->durationMeasure;
    }

    /**
     * @return DurationMeasure
     */
    public function getDurationMeasureWithCreate(): DurationMeasure
    {
        $this->durationMeasure ??= new DurationMeasure();

        return $this->durationMeasure;
    }

    /**
     * @param  null|DurationMeasure $durationMeasure
     * @return static
     */
    public function setDurationMeasure(
        ?DurationMeasure $durationMeasure = null
    ): static {
        $this->durationMeasure = $durationMeasure;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDurationMeasure(): static
    {
        $this->durationMeasure = null;

        return $this;
    }

    /**
     * @return null|array<DescriptionCode>
     */
    public function getDescriptionCode(): ?array
    {
        return $this->descriptionCode;
    }

    /**
     * @param  null|array<DescriptionCode> $descriptionCode
     * @return static
     */
    public function setDescriptionCode(
        ?array $descriptionCode = null
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
     * @return static
     */
    public function clearDescriptionCode(): static
    {
        $this->descriptionCode = [];

        return $this;
    }

    /**
     * @return null|DescriptionCode
     */
    public function firstDescriptionCode(): ?DescriptionCode
    {
        $descriptionCode = $this->descriptionCode ?? [];
        $descriptionCode = reset($descriptionCode);

        if (false === $descriptionCode) {
            return null;
        }

        return $descriptionCode;
    }

    /**
     * @return null|DescriptionCode
     */
    public function lastDescriptionCode(): ?DescriptionCode
    {
        $descriptionCode = $this->descriptionCode ?? [];
        $descriptionCode = end($descriptionCode);

        if (false === $descriptionCode) {
            return null;
        }

        return $descriptionCode;
    }

    /**
     * @param  DescriptionCode $descriptionCode
     * @return static
     */
    public function addToDescriptionCode(
        DescriptionCode $descriptionCode
    ): static {
        $this->descriptionCode[] = $descriptionCode;

        return $this;
    }

    /**
     * @return DescriptionCode
     */
    public function addToDescriptionCodeWithCreate(): DescriptionCode
    {
        $this->addTodescriptionCode($descriptionCode = new DescriptionCode());

        return $descriptionCode;
    }

    /**
     * @param  DescriptionCode $descriptionCode
     * @return static
     */
    public function addOnceToDescriptionCode(
        DescriptionCode $descriptionCode
    ): static {
        if (!is_array($this->descriptionCode)) {
            $this->descriptionCode = [];
        }

        $this->descriptionCode[0] = $descriptionCode;

        return $this;
    }

    /**
     * @return DescriptionCode
     */
    public function addOnceToDescriptionCodeWithCreate(): DescriptionCode
    {
        if (!is_array($this->descriptionCode)) {
            $this->descriptionCode = [];
        }

        if ([] === $this->descriptionCode) {
            $this->addOnceTodescriptionCode(new DescriptionCode());
        }

        return $this->descriptionCode[0];
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
        $this->addTodescription($description = new Description());

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
            $this->addOnceTodescription(new Description());
        }

        return $this->description[0];
    }
}
