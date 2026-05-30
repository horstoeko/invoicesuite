<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ConsumptionID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Note;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SpecificationTypeCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TotalMeteredQuantity;
use JMS\Serializer\Annotation as JMS;

class SubscriberConsumptionType
{
    use HandlesObjectFlags;

    /**
     * @var null|ConsumptionID
     */
    #[JMS\Accessor(getter: 'getConsumptionID', setter: 'setConsumptionID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ConsumptionID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ConsumptionID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $consumptionID;

    /**
     * @var null|SpecificationTypeCode
     */
    #[JMS\Accessor(getter: 'getSpecificationTypeCode', setter: 'setSpecificationTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SpecificationTypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SpecificationTypeCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $specificationTypeCode;

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
     * @var null|TotalMeteredQuantity
     */
    #[JMS\Accessor(getter: 'getTotalMeteredQuantity', setter: 'setTotalMeteredQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TotalMeteredQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TotalMeteredQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $totalMeteredQuantity;

    /**
     * @var null|SubscriberParty
     */
    #[JMS\Accessor(getter: 'getSubscriberParty', setter: 'setSubscriberParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SubscriberParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\SubscriberParty')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $subscriberParty;

    /**
     * @var null|UtilityConsumptionPoint
     */
    #[JMS\Accessor(getter: 'getUtilityConsumptionPoint', setter: 'setUtilityConsumptionPoint')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('UtilityConsumptionPoint')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\UtilityConsumptionPoint')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $utilityConsumptionPoint;

    /**
     * @var null|array<OnAccountPayment>
     */
    #[JMS\Accessor(getter: 'getOnAccountPayment', setter: 'setOnAccountPayment')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('OnAccountPayment')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\OnAccountPayment>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'OnAccountPayment', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $onAccountPayment;

    /**
     * @var null|Consumption
     */
    #[JMS\Accessor(getter: 'getConsumption', setter: 'setConsumption')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Consumption')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\Consumption')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $consumption;

    /**
     * @var null|array<SupplierConsumption>
     */
    #[JMS\Accessor(getter: 'getSupplierConsumption', setter: 'setSupplierConsumption')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SupplierConsumption')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\SupplierConsumption>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'SupplierConsumption', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $supplierConsumption;

    /**
     * @return null|ConsumptionID
     */
    public function getConsumptionID(): ?ConsumptionID
    {
        return $this->consumptionID;
    }

    /**
     * @return ConsumptionID
     */
    public function getConsumptionIDWithCreate(): ConsumptionID
    {
        $this->consumptionID ??= new ConsumptionID();

        return $this->consumptionID;
    }

    /**
     * @param  null|ConsumptionID $consumptionID
     * @return static
     */
    public function setConsumptionID(
        ?ConsumptionID $consumptionID = null
    ): static {
        $this->consumptionID = $consumptionID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetConsumptionID(): static
    {
        $this->consumptionID = null;

        return $this;
    }

    /**
     * @return null|SpecificationTypeCode
     */
    public function getSpecificationTypeCode(): ?SpecificationTypeCode
    {
        return $this->specificationTypeCode;
    }

    /**
     * @return SpecificationTypeCode
     */
    public function getSpecificationTypeCodeWithCreate(): SpecificationTypeCode
    {
        $this->specificationTypeCode ??= new SpecificationTypeCode();

        return $this->specificationTypeCode;
    }

    /**
     * @param  null|SpecificationTypeCode $specificationTypeCode
     * @return static
     */
    public function setSpecificationTypeCode(
        ?SpecificationTypeCode $specificationTypeCode = null
    ): static {
        $this->specificationTypeCode = $specificationTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSpecificationTypeCode(): static
    {
        $this->specificationTypeCode = null;

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
     * @return null|TotalMeteredQuantity
     */
    public function getTotalMeteredQuantity(): ?TotalMeteredQuantity
    {
        return $this->totalMeteredQuantity;
    }

    /**
     * @return TotalMeteredQuantity
     */
    public function getTotalMeteredQuantityWithCreate(): TotalMeteredQuantity
    {
        $this->totalMeteredQuantity ??= new TotalMeteredQuantity();

        return $this->totalMeteredQuantity;
    }

    /**
     * @param  null|TotalMeteredQuantity $totalMeteredQuantity
     * @return static
     */
    public function setTotalMeteredQuantity(
        ?TotalMeteredQuantity $totalMeteredQuantity = null
    ): static {
        $this->totalMeteredQuantity = $totalMeteredQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTotalMeteredQuantity(): static
    {
        $this->totalMeteredQuantity = null;

        return $this;
    }

    /**
     * @return null|SubscriberParty
     */
    public function getSubscriberParty(): ?SubscriberParty
    {
        return $this->subscriberParty;
    }

    /**
     * @return SubscriberParty
     */
    public function getSubscriberPartyWithCreate(): SubscriberParty
    {
        $this->subscriberParty ??= new SubscriberParty();

        return $this->subscriberParty;
    }

    /**
     * @param  null|SubscriberParty $subscriberParty
     * @return static
     */
    public function setSubscriberParty(
        ?SubscriberParty $subscriberParty = null
    ): static {
        $this->subscriberParty = $subscriberParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSubscriberParty(): static
    {
        $this->subscriberParty = null;

        return $this;
    }

    /**
     * @return null|UtilityConsumptionPoint
     */
    public function getUtilityConsumptionPoint(): ?UtilityConsumptionPoint
    {
        return $this->utilityConsumptionPoint;
    }

    /**
     * @return UtilityConsumptionPoint
     */
    public function getUtilityConsumptionPointWithCreate(): UtilityConsumptionPoint
    {
        $this->utilityConsumptionPoint ??= new UtilityConsumptionPoint();

        return $this->utilityConsumptionPoint;
    }

    /**
     * @param  null|UtilityConsumptionPoint $utilityConsumptionPoint
     * @return static
     */
    public function setUtilityConsumptionPoint(
        ?UtilityConsumptionPoint $utilityConsumptionPoint = null
    ): static {
        $this->utilityConsumptionPoint = $utilityConsumptionPoint;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetUtilityConsumptionPoint(): static
    {
        $this->utilityConsumptionPoint = null;

        return $this;
    }

    /**
     * @return null|array<OnAccountPayment>
     */
    public function getOnAccountPayment(): ?array
    {
        return $this->onAccountPayment;
    }

    /**
     * @param  null|array<OnAccountPayment> $onAccountPayment
     * @return static
     */
    public function setOnAccountPayment(
        ?array $onAccountPayment = null
    ): static {
        $this->onAccountPayment = $onAccountPayment;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetOnAccountPayment(): static
    {
        $this->onAccountPayment = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearOnAccountPayment(): static
    {
        $this->onAccountPayment = [];

        return $this;
    }

    /**
     * @return null|OnAccountPayment
     */
    public function firstOnAccountPayment(): ?OnAccountPayment
    {
        $onAccountPayment = $this->onAccountPayment ?? [];
        $onAccountPayment = reset($onAccountPayment);

        if (false === $onAccountPayment) {
            return null;
        }

        return $onAccountPayment;
    }

    /**
     * @return null|OnAccountPayment
     */
    public function lastOnAccountPayment(): ?OnAccountPayment
    {
        $onAccountPayment = $this->onAccountPayment ?? [];
        $onAccountPayment = end($onAccountPayment);

        if (false === $onAccountPayment) {
            return null;
        }

        return $onAccountPayment;
    }

    /**
     * @param  OnAccountPayment $onAccountPayment
     * @return static
     */
    public function addToOnAccountPayment(
        OnAccountPayment $onAccountPayment
    ): static {
        $this->onAccountPayment[] = $onAccountPayment;

        return $this;
    }

    /**
     * @return OnAccountPayment
     */
    public function addToOnAccountPaymentWithCreate(): OnAccountPayment
    {
        $this->addToonAccountPayment($onAccountPayment = new OnAccountPayment());

        return $onAccountPayment;
    }

    /**
     * @param  OnAccountPayment $onAccountPayment
     * @return static
     */
    public function addOnceToOnAccountPayment(
        OnAccountPayment $onAccountPayment
    ): static {
        if (!is_array($this->onAccountPayment)) {
            $this->onAccountPayment = [];
        }

        $this->onAccountPayment[0] = $onAccountPayment;

        return $this;
    }

    /**
     * @return OnAccountPayment
     */
    public function addOnceToOnAccountPaymentWithCreate(): OnAccountPayment
    {
        if (!is_array($this->onAccountPayment)) {
            $this->onAccountPayment = [];
        }

        if ([] === $this->onAccountPayment) {
            $this->addOnceToonAccountPayment(new OnAccountPayment());
        }

        return $this->onAccountPayment[0];
    }

    /**
     * @return null|Consumption
     */
    public function getConsumption(): ?Consumption
    {
        return $this->consumption;
    }

    /**
     * @return Consumption
     */
    public function getConsumptionWithCreate(): Consumption
    {
        $this->consumption ??= new Consumption();

        return $this->consumption;
    }

    /**
     * @param  null|Consumption $consumption
     * @return static
     */
    public function setConsumption(
        ?Consumption $consumption = null
    ): static {
        $this->consumption = $consumption;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetConsumption(): static
    {
        $this->consumption = null;

        return $this;
    }

    /**
     * @return null|array<SupplierConsumption>
     */
    public function getSupplierConsumption(): ?array
    {
        return $this->supplierConsumption;
    }

    /**
     * @param  null|array<SupplierConsumption> $supplierConsumption
     * @return static
     */
    public function setSupplierConsumption(
        ?array $supplierConsumption = null
    ): static {
        $this->supplierConsumption = $supplierConsumption;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSupplierConsumption(): static
    {
        $this->supplierConsumption = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearSupplierConsumption(): static
    {
        $this->supplierConsumption = [];

        return $this;
    }

    /**
     * @return null|SupplierConsumption
     */
    public function firstSupplierConsumption(): ?SupplierConsumption
    {
        $supplierConsumption = $this->supplierConsumption ?? [];
        $supplierConsumption = reset($supplierConsumption);

        if (false === $supplierConsumption) {
            return null;
        }

        return $supplierConsumption;
    }

    /**
     * @return null|SupplierConsumption
     */
    public function lastSupplierConsumption(): ?SupplierConsumption
    {
        $supplierConsumption = $this->supplierConsumption ?? [];
        $supplierConsumption = end($supplierConsumption);

        if (false === $supplierConsumption) {
            return null;
        }

        return $supplierConsumption;
    }

    /**
     * @param  SupplierConsumption $supplierConsumption
     * @return static
     */
    public function addToSupplierConsumption(
        SupplierConsumption $supplierConsumption
    ): static {
        $this->supplierConsumption[] = $supplierConsumption;

        return $this;
    }

    /**
     * @return SupplierConsumption
     */
    public function addToSupplierConsumptionWithCreate(): SupplierConsumption
    {
        $this->addTosupplierConsumption($supplierConsumption = new SupplierConsumption());

        return $supplierConsumption;
    }

    /**
     * @param  SupplierConsumption $supplierConsumption
     * @return static
     */
    public function addOnceToSupplierConsumption(
        SupplierConsumption $supplierConsumption
    ): static {
        if (!is_array($this->supplierConsumption)) {
            $this->supplierConsumption = [];
        }

        $this->supplierConsumption[0] = $supplierConsumption;

        return $this;
    }

    /**
     * @return SupplierConsumption
     */
    public function addOnceToSupplierConsumptionWithCreate(): SupplierConsumption
    {
        if (!is_array($this->supplierConsumption)) {
            $this->supplierConsumption = [];
        }

        if ([] === $this->supplierConsumption) {
            $this->addOnceTosupplierConsumption(new SupplierConsumption());
        }

        return $this->supplierConsumption[0];
    }
}
