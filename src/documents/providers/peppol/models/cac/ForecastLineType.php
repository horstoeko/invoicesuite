<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ForecastTypeCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Note;
use JMS\Serializer\Annotation as JMS;

class ForecastLineType
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
     * @var null|bool
     */
    #[JMS\Accessor(getter: 'getFrozenDocumentIndicator', setter: 'setFrozenDocumentIndicator')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('FrozenDocumentIndicator')]
    #[JMS\Type('bool')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $frozenDocumentIndicator;

    /**
     * @var null|ForecastTypeCode
     */
    #[JMS\Accessor(getter: 'getForecastTypeCode', setter: 'setForecastTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ForecastTypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ForecastTypeCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $forecastTypeCode;

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
        $this->addTonote($note = new Note());

        return $note;
    }

    /**
     * @param  Note   $note
     * @return static
     */
    public function addOnceToNote(
        Note $note
    ): static {
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
     * @return null|bool
     */
    public function getFrozenDocumentIndicator(): ?bool
    {
        return $this->frozenDocumentIndicator;
    }

    /**
     * @param  null|bool $frozenDocumentIndicator
     * @return static
     */
    public function setFrozenDocumentIndicator(
        ?bool $frozenDocumentIndicator = null
    ): static {
        $this->frozenDocumentIndicator = $frozenDocumentIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetFrozenDocumentIndicator(): static
    {
        $this->frozenDocumentIndicator = null;

        return $this;
    }

    /**
     * @return null|ForecastTypeCode
     */
    public function getForecastTypeCode(): ?ForecastTypeCode
    {
        return $this->forecastTypeCode;
    }

    /**
     * @return ForecastTypeCode
     */
    public function getForecastTypeCodeWithCreate(): ForecastTypeCode
    {
        $this->forecastTypeCode ??= new ForecastTypeCode();

        return $this->forecastTypeCode;
    }

    /**
     * @param  null|ForecastTypeCode $forecastTypeCode
     * @return static
     */
    public function setForecastTypeCode(
        ?ForecastTypeCode $forecastTypeCode = null
    ): static {
        $this->forecastTypeCode = $forecastTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetForecastTypeCode(): static
    {
        $this->forecastTypeCode = null;

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
