<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\Description;
use horstoeko\invoicesuite\models\ubl\cbc\DescriptionCode;
use horstoeko\invoicesuite\models\ubl\cbc\DurationMeasure;

class PeriodType
{
    use HandlesObjectFlags;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("StartDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getStartDate", setter="setStartDate")
     */
    private $startDate;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time")
     * @JMS\Expose
     * @JMS\SerializedName("StartTime")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getStartTime", setter="setStartTime")
     */
    private $startTime;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("EndDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEndDate", setter="setEndDate")
     */
    private $endDate;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time")
     * @JMS\Expose
     * @JMS\SerializedName("EndTime")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEndTime", setter="setEndTime")
     */
    private $endTime;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\DurationMeasure|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\DurationMeasure")
     * @JMS\Expose
     * @JMS\SerializedName("DurationMeasure")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDurationMeasure", setter="setDurationMeasure")
     */
    private $durationMeasure;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\DescriptionCode>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\DescriptionCode>")
     * @JMS\Expose
     * @JMS\SerializedName("DescriptionCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="DescriptionCode", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getDescriptionCode", setter="setDescriptionCode")
     */
    private $descriptionCode;

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
     * @return \DateTimeInterface|null
     */
    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    /**
     * @param \DateTimeInterface|null $startDate
     * @return self
     */
    public function setStartDate(?\DateTimeInterface $startDate = null): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getStartTime(): ?\DateTimeInterface
    {
        return $this->startTime;
    }

    /**
     * @param \DateTimeInterface|null $startTime
     * @return self
     */
    public function setStartTime(?\DateTimeInterface $startTime = null): self
    {
        $this->startTime = $startTime;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    /**
     * @param \DateTimeInterface|null $endDate
     * @return self
     */
    public function setEndDate(?\DateTimeInterface $endDate = null): self
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getEndTime(): ?\DateTimeInterface
    {
        return $this->endTime;
    }

    /**
     * @param \DateTimeInterface|null $endTime
     * @return self
     */
    public function setEndTime(?\DateTimeInterface $endTime = null): self
    {
        $this->endTime = $endTime;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\DurationMeasure|null
     */
    public function getDurationMeasure(): ?DurationMeasure
    {
        return $this->durationMeasure;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\DurationMeasure
     */
    public function getDurationMeasureWithCreate(): DurationMeasure
    {
        $this->durationMeasure = is_null($this->durationMeasure) ? new DurationMeasure() : $this->durationMeasure;

        return $this->durationMeasure;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\DurationMeasure|null $durationMeasure
     * @return self
     */
    public function setDurationMeasure(?DurationMeasure $durationMeasure = null): self
    {
        $this->durationMeasure = $durationMeasure;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\DescriptionCode>|null
     */
    public function getDescriptionCode(): ?array
    {
        return $this->descriptionCode;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\DescriptionCode>|null $descriptionCode
     * @return self
     */
    public function setDescriptionCode(?array $descriptionCode = null): self
    {
        $this->descriptionCode = $descriptionCode;

        return $this;
    }

    /**
     * @return self
     */
    public function clearDescriptionCode(): self
    {
        $this->descriptionCode = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\DescriptionCode $descriptionCode
     * @return self
     */
    public function addToDescriptionCode(DescriptionCode $descriptionCode): self
    {
        $this->descriptionCode[] = $descriptionCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\DescriptionCode
     */
    public function addToDescriptionCodeWithCreate(): DescriptionCode
    {
        $this->addTodescriptionCode($descriptionCode = new DescriptionCode());

        return $descriptionCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\DescriptionCode $descriptionCode
     * @return self
     */
    public function addOnceToDescriptionCode(DescriptionCode $descriptionCode): self
    {
        if (!is_array($this->descriptionCode)) {
            $this->descriptionCode = [];
        }

        $this->descriptionCode[0] = $descriptionCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\DescriptionCode
     */
    public function addOnceToDescriptionCodeWithCreate(): DescriptionCode
    {
        if (!is_array($this->descriptionCode)) {
            $this->descriptionCode = [];
        }

        if ($this->descriptionCode === []) {
            $this->addOnceTodescriptionCode(new DescriptionCode());
        }

        return $this->descriptionCode[0];
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
}
