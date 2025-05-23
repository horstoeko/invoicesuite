<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\AdjustmentReasonCode;
use horstoeko\invoicesuite\models\ubl\cbc\Description;
use horstoeko\invoicesuite\models\ubl\cbc\ID;
use horstoeko\invoicesuite\models\ubl\cbc\Note;
use horstoeko\invoicesuite\models\ubl\cbc\RevisedForecastLineID;

class ForecastRevisionLineType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ID")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\Note>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\Note>")
     * @JMS\Expose
     * @JMS\SerializedName("Note")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Note", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getNote", setter="setNote")
     */
    private $note;

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
     * @var \horstoeko\invoicesuite\models\ubl\cbc\RevisedForecastLineID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\RevisedForecastLineID")
     * @JMS\Expose
     * @JMS\SerializedName("RevisedForecastLineID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRevisedForecastLineID", setter="setRevisedForecastLineID")
     */
    private $revisedForecastLineID;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("SourceForecastIssueDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSourceForecastIssueDate", setter="setSourceForecastIssueDate")
     */
    private $sourceForecastIssueDate;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time")
     * @JMS\Expose
     * @JMS\SerializedName("SourceForecastIssueTime")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSourceForecastIssueTime", setter="setSourceForecastIssueTime")
     */
    private $sourceForecastIssueTime;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\AdjustmentReasonCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\AdjustmentReasonCode")
     * @JMS\Expose
     * @JMS\SerializedName("AdjustmentReasonCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAdjustmentReasonCode", setter="setAdjustmentReasonCode")
     */
    private $adjustmentReasonCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\ForecastPeriod|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\ForecastPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("ForecastPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getForecastPeriod", setter="setForecastPeriod")
     */
    private $forecastPeriod;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\SalesItem|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\SalesItem")
     * @JMS\Expose
     * @JMS\SerializedName("SalesItem")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSalesItem", setter="setSalesItem")
     */
    private $salesItem;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ID|null
     */
    public function getID(): ?ID
    {
        return $this->iD;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ID
     */
    public function getIDWithCreate(): ID
    {
        $this->iD = is_null($this->iD) ? new ID() : $this->iD;

        return $this->iD;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ID|null $iD
     * @return self
     */
    public function setID(?ID $iD = null): self
    {
        $this->iD = $iD;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\Note>|null
     */
    public function getNote(): ?array
    {
        return $this->note;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\Note>|null $note
     * @return self
     */
    public function setNote(?array $note = null): self
    {
        $this->note = $note;

        return $this;
    }

    /**
     * @return self
     */
    public function clearNote(): self
    {
        $this->note = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Note $note
     * @return self
     */
    public function addToNote(Note $note): self
    {
        $this->note[] = $note;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Note
     */
    public function addToNoteWithCreate(): Note
    {
        $this->addTonote($note = new Note());

        return $note;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Note $note
     * @return self
     */
    public function addOnceToNote(Note $note): self
    {
        if (!is_array($this->note)) {
            $this->note = [];
        }

        $this->note[0] = $note;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Note
     */
    public function addOnceToNoteWithCreate(): Note
    {
        if (!is_array($this->note)) {
            $this->note = [];
        }

        if ($this->note === []) {
            $this->addOnceTonote(new Note());
        }

        return $this->note[0];
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
     * @return \horstoeko\invoicesuite\models\ubl\cbc\RevisedForecastLineID|null
     */
    public function getRevisedForecastLineID(): ?RevisedForecastLineID
    {
        return $this->revisedForecastLineID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\RevisedForecastLineID
     */
    public function getRevisedForecastLineIDWithCreate(): RevisedForecastLineID
    {
        $this->revisedForecastLineID = is_null($this->revisedForecastLineID) ? new RevisedForecastLineID() : $this->revisedForecastLineID;

        return $this->revisedForecastLineID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\RevisedForecastLineID|null $revisedForecastLineID
     * @return self
     */
    public function setRevisedForecastLineID(?RevisedForecastLineID $revisedForecastLineID = null): self
    {
        $this->revisedForecastLineID = $revisedForecastLineID;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getSourceForecastIssueDate(): ?\DateTimeInterface
    {
        return $this->sourceForecastIssueDate;
    }

    /**
     * @param \DateTimeInterface|null $sourceForecastIssueDate
     * @return self
     */
    public function setSourceForecastIssueDate(?\DateTimeInterface $sourceForecastIssueDate = null): self
    {
        $this->sourceForecastIssueDate = $sourceForecastIssueDate;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getSourceForecastIssueTime(): ?\DateTimeInterface
    {
        return $this->sourceForecastIssueTime;
    }

    /**
     * @param \DateTimeInterface|null $sourceForecastIssueTime
     * @return self
     */
    public function setSourceForecastIssueTime(?\DateTimeInterface $sourceForecastIssueTime = null): self
    {
        $this->sourceForecastIssueTime = $sourceForecastIssueTime;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\AdjustmentReasonCode|null
     */
    public function getAdjustmentReasonCode(): ?AdjustmentReasonCode
    {
        return $this->adjustmentReasonCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\AdjustmentReasonCode
     */
    public function getAdjustmentReasonCodeWithCreate(): AdjustmentReasonCode
    {
        $this->adjustmentReasonCode = is_null($this->adjustmentReasonCode) ? new AdjustmentReasonCode() : $this->adjustmentReasonCode;

        return $this->adjustmentReasonCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\AdjustmentReasonCode|null $adjustmentReasonCode
     * @return self
     */
    public function setAdjustmentReasonCode(?AdjustmentReasonCode $adjustmentReasonCode = null): self
    {
        $this->adjustmentReasonCode = $adjustmentReasonCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ForecastPeriod|null
     */
    public function getForecastPeriod(): ?ForecastPeriod
    {
        return $this->forecastPeriod;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ForecastPeriod
     */
    public function getForecastPeriodWithCreate(): ForecastPeriod
    {
        $this->forecastPeriod = is_null($this->forecastPeriod) ? new ForecastPeriod() : $this->forecastPeriod;

        return $this->forecastPeriod;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ForecastPeriod|null $forecastPeriod
     * @return self
     */
    public function setForecastPeriod(?ForecastPeriod $forecastPeriod = null): self
    {
        $this->forecastPeriod = $forecastPeriod;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\SalesItem|null
     */
    public function getSalesItem(): ?SalesItem
    {
        return $this->salesItem;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\SalesItem
     */
    public function getSalesItemWithCreate(): SalesItem
    {
        $this->salesItem = is_null($this->salesItem) ? new SalesItem() : $this->salesItem;

        return $this->salesItem;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\SalesItem|null $salesItem
     * @return self
     */
    public function setSalesItem(?SalesItem $salesItem = null): self
    {
        $this->salesItem = $salesItem;

        return $this;
    }
}
