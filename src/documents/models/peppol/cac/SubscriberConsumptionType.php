<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ConsumptionID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Note;
use horstoeko\invoicesuite\documents\models\peppol\cbc\SpecificationTypeCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\TotalMeteredQuantity;
use JMS\Serializer\Annotation as JMS;

class SubscriberConsumptionType
{
    use HandlesObjectFlags;

    /**
     * @var null|ConsumptionID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ConsumptionID")
     * @JMS\Expose
     * @JMS\SerializedName("ConsumptionID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getConsumptionID", setter="setConsumptionID")
     */
    private $consumptionID;

    /**
     * @var null|SpecificationTypeCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\SpecificationTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("SpecificationTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSpecificationTypeCode", setter="setSpecificationTypeCode")
     */
    private $specificationTypeCode;

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
     * @var null|TotalMeteredQuantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\TotalMeteredQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("TotalMeteredQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTotalMeteredQuantity", setter="setTotalMeteredQuantity")
     */
    private $totalMeteredQuantity;

    /**
     * @var null|SubscriberParty
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\SubscriberParty")
     * @JMS\Expose
     * @JMS\SerializedName("SubscriberParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSubscriberParty", setter="setSubscriberParty")
     */
    private $subscriberParty;

    /**
     * @var null|UtilityConsumptionPoint
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\UtilityConsumptionPoint")
     * @JMS\Expose
     * @JMS\SerializedName("UtilityConsumptionPoint")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getUtilityConsumptionPoint", setter="setUtilityConsumptionPoint")
     */
    private $utilityConsumptionPoint;

    /**
     * @var null|array<OnAccountPayment>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\OnAccountPayment>")
     * @JMS\Expose
     * @JMS\SerializedName("OnAccountPayment")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="OnAccountPayment", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getOnAccountPayment", setter="setOnAccountPayment")
     */
    private $onAccountPayment;

    /**
     * @var null|Consumption
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\Consumption")
     * @JMS\Expose
     * @JMS\SerializedName("Consumption")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getConsumption", setter="setConsumption")
     */
    private $consumption;

    /**
     * @var null|array<SupplierConsumption>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\SupplierConsumption>")
     * @JMS\Expose
     * @JMS\SerializedName("SupplierConsumption")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="SupplierConsumption", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getSupplierConsumption", setter="setSupplierConsumption")
     */
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
        $this->consumptionID = is_null($this->consumptionID) ? new ConsumptionID() : $this->consumptionID;

        return $this->consumptionID;
    }

    /**
     * @param  null|ConsumptionID $consumptionID
     * @return static
     */
    public function setConsumptionID(?ConsumptionID $consumptionID = null): static
    {
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
        $this->specificationTypeCode = is_null($this->specificationTypeCode) ? new SpecificationTypeCode() : $this->specificationTypeCode;

        return $this->specificationTypeCode;
    }

    /**
     * @param  null|SpecificationTypeCode $specificationTypeCode
     * @return static
     */
    public function setSpecificationTypeCode(?SpecificationTypeCode $specificationTypeCode = null): static
    {
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
        $this->totalMeteredQuantity = is_null($this->totalMeteredQuantity) ? new TotalMeteredQuantity() : $this->totalMeteredQuantity;

        return $this->totalMeteredQuantity;
    }

    /**
     * @param  null|TotalMeteredQuantity $totalMeteredQuantity
     * @return static
     */
    public function setTotalMeteredQuantity(?TotalMeteredQuantity $totalMeteredQuantity = null): static
    {
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
        $this->subscriberParty = is_null($this->subscriberParty) ? new SubscriberParty() : $this->subscriberParty;

        return $this->subscriberParty;
    }

    /**
     * @param  null|SubscriberParty $subscriberParty
     * @return static
     */
    public function setSubscriberParty(?SubscriberParty $subscriberParty = null): static
    {
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
        $this->utilityConsumptionPoint = is_null($this->utilityConsumptionPoint) ? new UtilityConsumptionPoint() : $this->utilityConsumptionPoint;

        return $this->utilityConsumptionPoint;
    }

    /**
     * @param  null|UtilityConsumptionPoint $utilityConsumptionPoint
     * @return static
     */
    public function setUtilityConsumptionPoint(?UtilityConsumptionPoint $utilityConsumptionPoint = null): static
    {
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
    public function setOnAccountPayment(?array $onAccountPayment = null): static
    {
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
    public function addToOnAccountPayment(OnAccountPayment $onAccountPayment): static
    {
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
    public function addOnceToOnAccountPayment(OnAccountPayment $onAccountPayment): static
    {
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
        $this->consumption = is_null($this->consumption) ? new Consumption() : $this->consumption;

        return $this->consumption;
    }

    /**
     * @param  null|Consumption $consumption
     * @return static
     */
    public function setConsumption(?Consumption $consumption = null): static
    {
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
    public function setSupplierConsumption(?array $supplierConsumption = null): static
    {
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
    public function addToSupplierConsumption(SupplierConsumption $supplierConsumption): static
    {
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
    public function addOnceToSupplierConsumption(SupplierConsumption $supplierConsumption): static
    {
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
