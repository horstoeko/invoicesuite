<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\AdjustmentReasonCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Description;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Note;
use horstoeko\invoicesuite\documents\models\peppol\cbc\RevisedForecastLineID;
use JMS\Serializer\Annotation as JMS;

class ForecastRevisionLineType
{
    use HandlesObjectFlags;

    /**
     * @var null|ID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ID")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var null|array<Note>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\Note>")
     * @JMS\Expose
     * @JMS\SerializedName("Note")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Note", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getNote", setter="setNote")
     */
    private $note;

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
     * @var null|RevisedForecastLineID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\RevisedForecastLineID")
     * @JMS\Expose
     * @JMS\SerializedName("RevisedForecastLineID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRevisedForecastLineID", setter="setRevisedForecastLineID")
     */
    private $revisedForecastLineID;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("SourceForecastIssueDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSourceForecastIssueDate", setter="setSourceForecastIssueDate")
     */
    private $sourceForecastIssueDate;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time")
     * @JMS\Expose
     * @JMS\SerializedName("SourceForecastIssueTime")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSourceForecastIssueTime", setter="setSourceForecastIssueTime")
     */
    private $sourceForecastIssueTime;

    /**
     * @var null|AdjustmentReasonCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\AdjustmentReasonCode")
     * @JMS\Expose
     * @JMS\SerializedName("AdjustmentReasonCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAdjustmentReasonCode", setter="setAdjustmentReasonCode")
     */
    private $adjustmentReasonCode;

    /**
     * @var null|ForecastPeriod
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\ForecastPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("ForecastPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getForecastPeriod", setter="setForecastPeriod")
     */
    private $forecastPeriod;

    /**
     * @var null|SalesItem
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\SalesItem")
     * @JMS\Expose
     * @JMS\SerializedName("SalesItem")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSalesItem", setter="setSalesItem")
     */
    private $salesItem;

    /**
     * @return null|ID
     */
    public function getID(): ?ID
    {
        return $this->iD;
    }

    /**
     * @return ID
     */
    public function getIDWithCreate(): ID
    {
        $this->iD = is_null($this->iD) ? new ID() : $this->iD;

        return $this->iD;
    }

    /**
     * @param  null|ID $iD
     * @return static
     */
    public function setID(?ID $iD = null): static
    {
        $this->iD = $iD;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetID(): static
    {
        $this->iD = null;

        return $this;
    }

    /**
     * @return null|array<Note>
     */
    public function getNote(): ?array
    {
        return $this->note;
    }

    /**
     * @param  null|array<Note> $note
     * @return static
     */
    public function setNote(?array $note = null): static
    {
        $this->note = $note;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetNote(): static
    {
        $this->note = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearNote(): static
    {
        $this->note = [];

        return $this;
    }

    /**
     * @return null|Note
     */
    public function firstNote(): ?Note
    {
        $note = $this->note ?? [];
        $note = reset($note);

        if (false === $note) {
            return null;
        }

        return $note;
    }

    /**
     * @return null|Note
     */
    public function lastNote(): ?Note
    {
        $note = $this->note ?? [];
        $note = end($note);

        if (false === $note) {
            return null;
        }

        return $note;
    }

    /**
     * @param  Note   $note
     * @return static
     */
    public function addToNote(Note $note): static
    {
        $this->note[] = $note;

        return $this;
    }

    /**
     * @return Note
     */
    public function addToNoteWithCreate(): Note
    {
        $this->addTonote($note = new Note());

        return $note;
    }

    /**
     * @param  Note   $note
     * @return static
     */
    public function addOnceToNote(Note $note): static
    {
        if (!is_array($this->note)) {
            $this->note = [];
        }

        $this->note[0] = $note;

        return $this;
    }

    /**
     * @return Note
     */
    public function addOnceToNoteWithCreate(): Note
    {
        if (!is_array($this->note)) {
            $this->note = [];
        }

        if ([] === $this->note) {
            $this->addOnceTonote(new Note());
        }

        return $this->note[0];
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
     * @return null|RevisedForecastLineID
     */
    public function getRevisedForecastLineID(): ?RevisedForecastLineID
    {
        return $this->revisedForecastLineID;
    }

    /**
     * @return RevisedForecastLineID
     */
    public function getRevisedForecastLineIDWithCreate(): RevisedForecastLineID
    {
        $this->revisedForecastLineID = is_null($this->revisedForecastLineID) ? new RevisedForecastLineID() : $this->revisedForecastLineID;

        return $this->revisedForecastLineID;
    }

    /**
     * @param  null|RevisedForecastLineID $revisedForecastLineID
     * @return static
     */
    public function setRevisedForecastLineID(?RevisedForecastLineID $revisedForecastLineID = null): static
    {
        $this->revisedForecastLineID = $revisedForecastLineID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRevisedForecastLineID(): static
    {
        $this->revisedForecastLineID = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getSourceForecastIssueDate(): ?DateTimeInterface
    {
        return $this->sourceForecastIssueDate;
    }

    /**
     * @param  null|DateTimeInterface $sourceForecastIssueDate
     * @return static
     */
    public function setSourceForecastIssueDate(?DateTimeInterface $sourceForecastIssueDate = null): static
    {
        $this->sourceForecastIssueDate = $sourceForecastIssueDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSourceForecastIssueDate(): static
    {
        $this->sourceForecastIssueDate = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getSourceForecastIssueTime(): ?DateTimeInterface
    {
        return $this->sourceForecastIssueTime;
    }

    /**
     * @param  null|DateTimeInterface $sourceForecastIssueTime
     * @return static
     */
    public function setSourceForecastIssueTime(?DateTimeInterface $sourceForecastIssueTime = null): static
    {
        $this->sourceForecastIssueTime = $sourceForecastIssueTime;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSourceForecastIssueTime(): static
    {
        $this->sourceForecastIssueTime = null;

        return $this;
    }

    /**
     * @return null|AdjustmentReasonCode
     */
    public function getAdjustmentReasonCode(): ?AdjustmentReasonCode
    {
        return $this->adjustmentReasonCode;
    }

    /**
     * @return AdjustmentReasonCode
     */
    public function getAdjustmentReasonCodeWithCreate(): AdjustmentReasonCode
    {
        $this->adjustmentReasonCode = is_null($this->adjustmentReasonCode) ? new AdjustmentReasonCode() : $this->adjustmentReasonCode;

        return $this->adjustmentReasonCode;
    }

    /**
     * @param  null|AdjustmentReasonCode $adjustmentReasonCode
     * @return static
     */
    public function setAdjustmentReasonCode(?AdjustmentReasonCode $adjustmentReasonCode = null): static
    {
        $this->adjustmentReasonCode = $adjustmentReasonCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAdjustmentReasonCode(): static
    {
        $this->adjustmentReasonCode = null;

        return $this;
    }

    /**
     * @return null|ForecastPeriod
     */
    public function getForecastPeriod(): ?ForecastPeriod
    {
        return $this->forecastPeriod;
    }

    /**
     * @return ForecastPeriod
     */
    public function getForecastPeriodWithCreate(): ForecastPeriod
    {
        $this->forecastPeriod = is_null($this->forecastPeriod) ? new ForecastPeriod() : $this->forecastPeriod;

        return $this->forecastPeriod;
    }

    /**
     * @param  null|ForecastPeriod $forecastPeriod
     * @return static
     */
    public function setForecastPeriod(?ForecastPeriod $forecastPeriod = null): static
    {
        $this->forecastPeriod = $forecastPeriod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetForecastPeriod(): static
    {
        $this->forecastPeriod = null;

        return $this;
    }

    /**
     * @return null|SalesItem
     */
    public function getSalesItem(): ?SalesItem
    {
        return $this->salesItem;
    }

    /**
     * @return SalesItem
     */
    public function getSalesItemWithCreate(): SalesItem
    {
        $this->salesItem = is_null($this->salesItem) ? new SalesItem() : $this->salesItem;

        return $this->salesItem;
    }

    /**
     * @param  null|SalesItem $salesItem
     * @return static
     */
    public function setSalesItem(?SalesItem $salesItem = null): static
    {
        $this->salesItem = $salesItem;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSalesItem(): static
    {
        $this->salesItem = null;

        return $this;
    }
}
