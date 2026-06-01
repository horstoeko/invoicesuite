<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\AdjustmentReasonCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Description;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Note;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\RevisedForecastLineID;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use JMS\Serializer\Annotation as JMS;

class ForecastRevisionLineType
{
    use HandlesObjectFlags;

    /**
     * @var null|ID
     */
    #[JMS\Accessor(getter: 'getID', setter: 'setID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $iD;

    /**
     * @var null|array<Note>
     */
    #[JMS\Accessor(getter: 'getNote', setter: 'setNote')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Note')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Note>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'Note', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $note;

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
     * @var null|RevisedForecastLineID
     */
    #[JMS\Accessor(getter: 'getRevisedForecastLineID', setter: 'setRevisedForecastLineID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('RevisedForecastLineID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\RevisedForecastLineID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $revisedForecastLineID;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getSourceForecastIssueDate', setter: 'setSourceForecastIssueDate')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SourceForecastIssueDate')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $sourceForecastIssueDate;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getSourceForecastIssueTime', setter: 'setSourceForecastIssueTime')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SourceForecastIssueTime')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $sourceForecastIssueTime;

    /**
     * @var null|AdjustmentReasonCode
     */
    #[JMS\Accessor(getter: 'getAdjustmentReasonCode', setter: 'setAdjustmentReasonCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('AdjustmentReasonCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\AdjustmentReasonCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $adjustmentReasonCode;

    /**
     * @var null|ForecastPeriod
     */
    #[JMS\Accessor(getter: 'getForecastPeriod', setter: 'setForecastPeriod')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ForecastPeriod')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\ForecastPeriod')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $forecastPeriod;

    /**
     * @var null|SalesItem
     */
    #[JMS\Accessor(getter: 'getSalesItem', setter: 'setSalesItem')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SalesItem')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\SalesItem')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
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
        $this->iD ??= new ID();

        return $this->iD;
    }

    /**
     * @param  null|ID $iD
     * @return static
     */
    public function setID(
        ?ID $iD = null
    ): static {
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
    public function setNote(
        ?array $note = null
    ): static {
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
    public function addToNote(
        Note $note
    ): static {
        $this->note[] = $note;

        return $this;
    }

    /**
     * @return Note
     */
    public function addToNoteWithCreate(): Note
    {
        $this->addToNote($note = new Note());

        return $note;
    }

    /**
     * @param  Note   $note
     * @return static
     */
    public function addOnceToNote(
        Note $note
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->note)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->note)) {
            $this->note = [];
        }

        if ([] === $this->note) {
            $this->addOnceToNote(new Note());
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
        $this->revisedForecastLineID ??= new RevisedForecastLineID();

        return $this->revisedForecastLineID;
    }

    /**
     * @param  null|RevisedForecastLineID $revisedForecastLineID
     * @return static
     */
    public function setRevisedForecastLineID(
        ?RevisedForecastLineID $revisedForecastLineID = null
    ): static {
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
    public function setSourceForecastIssueDate(
        ?DateTimeInterface $sourceForecastIssueDate = null
    ): static {
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
    public function setSourceForecastIssueTime(
        ?DateTimeInterface $sourceForecastIssueTime = null
    ): static {
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
        $this->adjustmentReasonCode ??= new AdjustmentReasonCode();

        return $this->adjustmentReasonCode;
    }

    /**
     * @param  null|AdjustmentReasonCode $adjustmentReasonCode
     * @return static
     */
    public function setAdjustmentReasonCode(
        ?AdjustmentReasonCode $adjustmentReasonCode = null
    ): static {
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
        $this->forecastPeriod ??= new ForecastPeriod();

        return $this->forecastPeriod;
    }

    /**
     * @param  null|ForecastPeriod $forecastPeriod
     * @return static
     */
    public function setForecastPeriod(
        ?ForecastPeriod $forecastPeriod = null
    ): static {
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
        $this->salesItem ??= new SalesItem();

        return $this->salesItem;
    }

    /**
     * @param  null|SalesItem $salesItem
     * @return static
     */
    public function setSalesItem(
        ?SalesItem $salesItem = null
    ): static {
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
