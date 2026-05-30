<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\AccountingCost;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\AccountingCostCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\InspectionMethodCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LineExtensionAmount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LineStatusCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MaximumBackorderQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MaximumQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MinimumBackorderQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MinimumQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Note;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Quantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SalesOrderID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TotalTaxAmount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\UUID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\WarrantyInformation;
use JMS\Serializer\Annotation as JMS;

class LineItemType
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
     * @var null|SalesOrderID
     */
    #[JMS\Accessor(getter: 'getSalesOrderID', setter: 'setSalesOrderID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SalesOrderID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SalesOrderID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $salesOrderID;

    /**
     * @var null|UUID
     */
    #[JMS\Accessor(getter: 'getUUID', setter: 'setUUID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('UUID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\UUID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $uUID;

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
     * @var null|LineStatusCode
     */
    #[JMS\Accessor(getter: 'getLineStatusCode', setter: 'setLineStatusCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('LineStatusCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LineStatusCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $lineStatusCode;

    /**
     * @var null|Quantity
     */
    #[JMS\Accessor(getter: 'getQuantity', setter: 'setQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Quantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Quantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $quantity;

    /**
     * @var null|LineExtensionAmount
     */
    #[JMS\Accessor(getter: 'getLineExtensionAmount', setter: 'setLineExtensionAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('LineExtensionAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LineExtensionAmount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $lineExtensionAmount;

    /**
     * @var null|TotalTaxAmount
     */
    #[JMS\Accessor(getter: 'getTotalTaxAmount', setter: 'setTotalTaxAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TotalTaxAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TotalTaxAmount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $totalTaxAmount;

    /**
     * @var null|MinimumQuantity
     */
    #[JMS\Accessor(getter: 'getMinimumQuantity', setter: 'setMinimumQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MinimumQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MinimumQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $minimumQuantity;

    /**
     * @var null|MaximumQuantity
     */
    #[JMS\Accessor(getter: 'getMaximumQuantity', setter: 'setMaximumQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MaximumQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MaximumQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $maximumQuantity;

    /**
     * @var null|MinimumBackorderQuantity
     */
    #[JMS\Accessor(getter: 'getMinimumBackorderQuantity', setter: 'setMinimumBackorderQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MinimumBackorderQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MinimumBackorderQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $minimumBackorderQuantity;

    /**
     * @var null|MaximumBackorderQuantity
     */
    #[JMS\Accessor(getter: 'getMaximumBackorderQuantity', setter: 'setMaximumBackorderQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MaximumBackorderQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MaximumBackorderQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $maximumBackorderQuantity;

    /**
     * @var null|InspectionMethodCode
     */
    #[JMS\Accessor(getter: 'getInspectionMethodCode', setter: 'setInspectionMethodCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('InspectionMethodCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\InspectionMethodCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $inspectionMethodCode;

    /**
     * @var null|bool
     */
    #[JMS\Accessor(getter: 'getPartialDeliveryIndicator', setter: 'setPartialDeliveryIndicator')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PartialDeliveryIndicator')]
    #[JMS\Type('bool')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $partialDeliveryIndicator;

    /**
     * @var null|bool
     */
    #[JMS\Accessor(getter: 'getBackOrderAllowedIndicator', setter: 'setBackOrderAllowedIndicator')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('BackOrderAllowedIndicator')]
    #[JMS\Type('bool')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $backOrderAllowedIndicator;

    /**
     * @var null|AccountingCostCode
     */
    #[JMS\Accessor(getter: 'getAccountingCostCode', setter: 'setAccountingCostCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('AccountingCostCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\AccountingCostCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $accountingCostCode;

    /**
     * @var null|AccountingCost
     */
    #[JMS\Accessor(getter: 'getAccountingCost', setter: 'setAccountingCost')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('AccountingCost')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\AccountingCost')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $accountingCost;

    /**
     * @var null|array<WarrantyInformation>
     */
    #[JMS\Accessor(getter: 'getWarrantyInformation', setter: 'setWarrantyInformation')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('WarrantyInformation')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\WarrantyInformation>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'WarrantyInformation', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $warrantyInformation;

    /**
     * @var null|array<Delivery>
     */
    #[JMS\Accessor(getter: 'getDelivery', setter: 'setDelivery')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Delivery')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\Delivery>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'Delivery', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $delivery;

    /**
     * @var null|DeliveryTerms
     */
    #[JMS\Accessor(getter: 'getDeliveryTerms', setter: 'setDeliveryTerms')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('DeliveryTerms')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\DeliveryTerms')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $deliveryTerms;

    /**
     * @var null|OriginatorParty
     */
    #[JMS\Accessor(getter: 'getOriginatorParty', setter: 'setOriginatorParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('OriginatorParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\OriginatorParty')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $originatorParty;

    /**
     * @var null|array<OrderedShipment>
     */
    #[JMS\Accessor(getter: 'getOrderedShipment', setter: 'setOrderedShipment')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('OrderedShipment')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\OrderedShipment>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'OrderedShipment', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $orderedShipment;

    /**
     * @var null|PricingReference
     */
    #[JMS\Accessor(getter: 'getPricingReference', setter: 'setPricingReference')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PricingReference')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\PricingReference')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $pricingReference;

    /**
     * @var null|array<AllowanceCharge>
     */
    #[JMS\Accessor(getter: 'getAllowanceCharge', setter: 'setAllowanceCharge')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('AllowanceCharge')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\AllowanceCharge>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'AllowanceCharge', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $allowanceCharge;

    /**
     * @var null|Price
     */
    #[JMS\Accessor(getter: 'getPrice', setter: 'setPrice')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Price')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\Price')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $price;

    /**
     * @var null|Item
     */
    #[JMS\Accessor(getter: 'getItem', setter: 'setItem')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Item')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\Item')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $item;

    /**
     * @var null|array<SubLineItem>
     */
    #[JMS\Accessor(getter: 'getSubLineItem', setter: 'setSubLineItem')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SubLineItem')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\SubLineItem>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'SubLineItem', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $subLineItem;

    /**
     * @var null|WarrantyValidityPeriod
     */
    #[JMS\Accessor(getter: 'getWarrantyValidityPeriod', setter: 'setWarrantyValidityPeriod')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('WarrantyValidityPeriod')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\WarrantyValidityPeriod')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $warrantyValidityPeriod;

    /**
     * @var null|WarrantyParty
     */
    #[JMS\Accessor(getter: 'getWarrantyParty', setter: 'setWarrantyParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('WarrantyParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\WarrantyParty')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $warrantyParty;

    /**
     * @var null|array<TaxTotal>
     */
    #[JMS\Accessor(getter: 'getTaxTotal', setter: 'setTaxTotal')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TaxTotal')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\TaxTotal>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'TaxTotal', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $taxTotal;

    /**
     * @var null|ItemPriceExtension
     */
    #[JMS\Accessor(getter: 'getItemPriceExtension', setter: 'setItemPriceExtension')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ItemPriceExtension')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\ItemPriceExtension')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $itemPriceExtension;

    /**
     * @var null|array<LineReference>
     */
    #[JMS\Accessor(getter: 'getLineReference', setter: 'setLineReference')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('LineReference')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\LineReference>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'LineReference', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $lineReference;

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
     * @return null|SalesOrderID
     */
    public function getSalesOrderID(): ?SalesOrderID
    {
        return $this->salesOrderID;
    }

    /**
     * @return SalesOrderID
     */
    public function getSalesOrderIDWithCreate(): SalesOrderID
    {
        $this->salesOrderID ??= new SalesOrderID();

        return $this->salesOrderID;
    }

    /**
     * @param  null|SalesOrderID $salesOrderID
     * @return static
     */
    public function setSalesOrderID(
        ?SalesOrderID $salesOrderID = null
    ): static {
        $this->salesOrderID = $salesOrderID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSalesOrderID(): static
    {
        $this->salesOrderID = null;

        return $this;
    }

    /**
     * @return null|UUID
     */
    public function getUUID(): ?UUID
    {
        return $this->uUID;
    }

    /**
     * @return UUID
     */
    public function getUUIDWithCreate(): UUID
    {
        $this->uUID ??= new UUID();

        return $this->uUID;
    }

    /**
     * @param  null|UUID $uUID
     * @return static
     */
    public function setUUID(
        ?UUID $uUID = null
    ): static {
        $this->uUID = $uUID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetUUID(): static
    {
        $this->uUID = null;

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
     * @return null|LineStatusCode
     */
    public function getLineStatusCode(): ?LineStatusCode
    {
        return $this->lineStatusCode;
    }

    /**
     * @return LineStatusCode
     */
    public function getLineStatusCodeWithCreate(): LineStatusCode
    {
        $this->lineStatusCode ??= new LineStatusCode();

        return $this->lineStatusCode;
    }

    /**
     * @param  null|LineStatusCode $lineStatusCode
     * @return static
     */
    public function setLineStatusCode(
        ?LineStatusCode $lineStatusCode = null
    ): static {
        $this->lineStatusCode = $lineStatusCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLineStatusCode(): static
    {
        $this->lineStatusCode = null;

        return $this;
    }

    /**
     * @return null|Quantity
     */
    public function getQuantity(): ?Quantity
    {
        return $this->quantity;
    }

    /**
     * @return Quantity
     */
    public function getQuantityWithCreate(): Quantity
    {
        $this->quantity ??= new Quantity();

        return $this->quantity;
    }

    /**
     * @param  null|Quantity $quantity
     * @return static
     */
    public function setQuantity(
        ?Quantity $quantity = null
    ): static {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetQuantity(): static
    {
        $this->quantity = null;

        return $this;
    }

    /**
     * @return null|LineExtensionAmount
     */
    public function getLineExtensionAmount(): ?LineExtensionAmount
    {
        return $this->lineExtensionAmount;
    }

    /**
     * @return LineExtensionAmount
     */
    public function getLineExtensionAmountWithCreate(): LineExtensionAmount
    {
        $this->lineExtensionAmount ??= new LineExtensionAmount();

        return $this->lineExtensionAmount;
    }

    /**
     * @param  null|LineExtensionAmount $lineExtensionAmount
     * @return static
     */
    public function setLineExtensionAmount(
        ?LineExtensionAmount $lineExtensionAmount = null
    ): static {
        $this->lineExtensionAmount = $lineExtensionAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLineExtensionAmount(): static
    {
        $this->lineExtensionAmount = null;

        return $this;
    }

    /**
     * @return null|TotalTaxAmount
     */
    public function getTotalTaxAmount(): ?TotalTaxAmount
    {
        return $this->totalTaxAmount;
    }

    /**
     * @return TotalTaxAmount
     */
    public function getTotalTaxAmountWithCreate(): TotalTaxAmount
    {
        $this->totalTaxAmount ??= new TotalTaxAmount();

        return $this->totalTaxAmount;
    }

    /**
     * @param  null|TotalTaxAmount $totalTaxAmount
     * @return static
     */
    public function setTotalTaxAmount(
        ?TotalTaxAmount $totalTaxAmount = null
    ): static {
        $this->totalTaxAmount = $totalTaxAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTotalTaxAmount(): static
    {
        $this->totalTaxAmount = null;

        return $this;
    }

    /**
     * @return null|MinimumQuantity
     */
    public function getMinimumQuantity(): ?MinimumQuantity
    {
        return $this->minimumQuantity;
    }

    /**
     * @return MinimumQuantity
     */
    public function getMinimumQuantityWithCreate(): MinimumQuantity
    {
        $this->minimumQuantity ??= new MinimumQuantity();

        return $this->minimumQuantity;
    }

    /**
     * @param  null|MinimumQuantity $minimumQuantity
     * @return static
     */
    public function setMinimumQuantity(
        ?MinimumQuantity $minimumQuantity = null
    ): static {
        $this->minimumQuantity = $minimumQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMinimumQuantity(): static
    {
        $this->minimumQuantity = null;

        return $this;
    }

    /**
     * @return null|MaximumQuantity
     */
    public function getMaximumQuantity(): ?MaximumQuantity
    {
        return $this->maximumQuantity;
    }

    /**
     * @return MaximumQuantity
     */
    public function getMaximumQuantityWithCreate(): MaximumQuantity
    {
        $this->maximumQuantity ??= new MaximumQuantity();

        return $this->maximumQuantity;
    }

    /**
     * @param  null|MaximumQuantity $maximumQuantity
     * @return static
     */
    public function setMaximumQuantity(
        ?MaximumQuantity $maximumQuantity = null
    ): static {
        $this->maximumQuantity = $maximumQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMaximumQuantity(): static
    {
        $this->maximumQuantity = null;

        return $this;
    }

    /**
     * @return null|MinimumBackorderQuantity
     */
    public function getMinimumBackorderQuantity(): ?MinimumBackorderQuantity
    {
        return $this->minimumBackorderQuantity;
    }

    /**
     * @return MinimumBackorderQuantity
     */
    public function getMinimumBackorderQuantityWithCreate(): MinimumBackorderQuantity
    {
        $this->minimumBackorderQuantity ??= new MinimumBackorderQuantity();

        return $this->minimumBackorderQuantity;
    }

    /**
     * @param  null|MinimumBackorderQuantity $minimumBackorderQuantity
     * @return static
     */
    public function setMinimumBackorderQuantity(
        ?MinimumBackorderQuantity $minimumBackorderQuantity = null
    ): static {
        $this->minimumBackorderQuantity = $minimumBackorderQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMinimumBackorderQuantity(): static
    {
        $this->minimumBackorderQuantity = null;

        return $this;
    }

    /**
     * @return null|MaximumBackorderQuantity
     */
    public function getMaximumBackorderQuantity(): ?MaximumBackorderQuantity
    {
        return $this->maximumBackorderQuantity;
    }

    /**
     * @return MaximumBackorderQuantity
     */
    public function getMaximumBackorderQuantityWithCreate(): MaximumBackorderQuantity
    {
        $this->maximumBackorderQuantity ??= new MaximumBackorderQuantity();

        return $this->maximumBackorderQuantity;
    }

    /**
     * @param  null|MaximumBackorderQuantity $maximumBackorderQuantity
     * @return static
     */
    public function setMaximumBackorderQuantity(
        ?MaximumBackorderQuantity $maximumBackorderQuantity = null
    ): static {
        $this->maximumBackorderQuantity = $maximumBackorderQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMaximumBackorderQuantity(): static
    {
        $this->maximumBackorderQuantity = null;

        return $this;
    }

    /**
     * @return null|InspectionMethodCode
     */
    public function getInspectionMethodCode(): ?InspectionMethodCode
    {
        return $this->inspectionMethodCode;
    }

    /**
     * @return InspectionMethodCode
     */
    public function getInspectionMethodCodeWithCreate(): InspectionMethodCode
    {
        $this->inspectionMethodCode ??= new InspectionMethodCode();

        return $this->inspectionMethodCode;
    }

    /**
     * @param  null|InspectionMethodCode $inspectionMethodCode
     * @return static
     */
    public function setInspectionMethodCode(
        ?InspectionMethodCode $inspectionMethodCode = null
    ): static {
        $this->inspectionMethodCode = $inspectionMethodCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetInspectionMethodCode(): static
    {
        $this->inspectionMethodCode = null;

        return $this;
    }

    /**
     * @return null|bool
     */
    public function getPartialDeliveryIndicator(): ?bool
    {
        return $this->partialDeliveryIndicator;
    }

    /**
     * @param  null|bool $partialDeliveryIndicator
     * @return static
     */
    public function setPartialDeliveryIndicator(
        ?bool $partialDeliveryIndicator = null
    ): static {
        $this->partialDeliveryIndicator = $partialDeliveryIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPartialDeliveryIndicator(): static
    {
        $this->partialDeliveryIndicator = null;

        return $this;
    }

    /**
     * @return null|bool
     */
    public function getBackOrderAllowedIndicator(): ?bool
    {
        return $this->backOrderAllowedIndicator;
    }

    /**
     * @param  null|bool $backOrderAllowedIndicator
     * @return static
     */
    public function setBackOrderAllowedIndicator(
        ?bool $backOrderAllowedIndicator = null
    ): static {
        $this->backOrderAllowedIndicator = $backOrderAllowedIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetBackOrderAllowedIndicator(): static
    {
        $this->backOrderAllowedIndicator = null;

        return $this;
    }

    /**
     * @return null|AccountingCostCode
     */
    public function getAccountingCostCode(): ?AccountingCostCode
    {
        return $this->accountingCostCode;
    }

    /**
     * @return AccountingCostCode
     */
    public function getAccountingCostCodeWithCreate(): AccountingCostCode
    {
        $this->accountingCostCode ??= new AccountingCostCode();

        return $this->accountingCostCode;
    }

    /**
     * @param  null|AccountingCostCode $accountingCostCode
     * @return static
     */
    public function setAccountingCostCode(
        ?AccountingCostCode $accountingCostCode = null
    ): static {
        $this->accountingCostCode = $accountingCostCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAccountingCostCode(): static
    {
        $this->accountingCostCode = null;

        return $this;
    }

    /**
     * @return null|AccountingCost
     */
    public function getAccountingCost(): ?AccountingCost
    {
        return $this->accountingCost;
    }

    /**
     * @return AccountingCost
     */
    public function getAccountingCostWithCreate(): AccountingCost
    {
        $this->accountingCost ??= new AccountingCost();

        return $this->accountingCost;
    }

    /**
     * @param  null|AccountingCost $accountingCost
     * @return static
     */
    public function setAccountingCost(
        ?AccountingCost $accountingCost = null
    ): static {
        $this->accountingCost = $accountingCost;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAccountingCost(): static
    {
        $this->accountingCost = null;

        return $this;
    }

    /**
     * @return null|array<WarrantyInformation>
     */
    public function getWarrantyInformation(): ?array
    {
        return $this->warrantyInformation;
    }

    /**
     * @param  null|array<WarrantyInformation> $warrantyInformation
     * @return static
     */
    public function setWarrantyInformation(
        ?array $warrantyInformation = null
    ): static {
        $this->warrantyInformation = $warrantyInformation;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetWarrantyInformation(): static
    {
        $this->warrantyInformation = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearWarrantyInformation(): static
    {
        $this->warrantyInformation = [];

        return $this;
    }

    /**
     * @return null|WarrantyInformation
     */
    public function firstWarrantyInformation(): ?WarrantyInformation
    {
        $warrantyInformation = $this->warrantyInformation ?? [];
        $warrantyInformation = reset($warrantyInformation);

        if (false === $warrantyInformation) {
            return null;
        }

        return $warrantyInformation;
    }

    /**
     * @return null|WarrantyInformation
     */
    public function lastWarrantyInformation(): ?WarrantyInformation
    {
        $warrantyInformation = $this->warrantyInformation ?? [];
        $warrantyInformation = end($warrantyInformation);

        if (false === $warrantyInformation) {
            return null;
        }

        return $warrantyInformation;
    }

    /**
     * @param  WarrantyInformation $warrantyInformation
     * @return static
     */
    public function addToWarrantyInformation(
        WarrantyInformation $warrantyInformation
    ): static {
        $this->warrantyInformation[] = $warrantyInformation;

        return $this;
    }

    /**
     * @return WarrantyInformation
     */
    public function addToWarrantyInformationWithCreate(): WarrantyInformation
    {
        $this->addTowarrantyInformation($warrantyInformation = new WarrantyInformation());

        return $warrantyInformation;
    }

    /**
     * @param  WarrantyInformation $warrantyInformation
     * @return static
     */
    public function addOnceToWarrantyInformation(
        WarrantyInformation $warrantyInformation
    ): static {
        if (!is_array($this->warrantyInformation)) {
            $this->warrantyInformation = [];
        }

        $this->warrantyInformation[0] = $warrantyInformation;

        return $this;
    }

    /**
     * @return WarrantyInformation
     */
    public function addOnceToWarrantyInformationWithCreate(): WarrantyInformation
    {
        if (!is_array($this->warrantyInformation)) {
            $this->warrantyInformation = [];
        }

        if ([] === $this->warrantyInformation) {
            $this->addOnceTowarrantyInformation(new WarrantyInformation());
        }

        return $this->warrantyInformation[0];
    }

    /**
     * @return null|array<Delivery>
     */
    public function getDelivery(): ?array
    {
        return $this->delivery;
    }

    /**
     * @param  null|array<Delivery> $delivery
     * @return static
     */
    public function setDelivery(
        ?array $delivery = null
    ): static {
        $this->delivery = $delivery;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDelivery(): static
    {
        $this->delivery = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearDelivery(): static
    {
        $this->delivery = [];

        return $this;
    }

    /**
     * @return null|Delivery
     */
    public function firstDelivery(): ?Delivery
    {
        $delivery = $this->delivery ?? [];
        $delivery = reset($delivery);

        if (false === $delivery) {
            return null;
        }

        return $delivery;
    }

    /**
     * @return null|Delivery
     */
    public function lastDelivery(): ?Delivery
    {
        $delivery = $this->delivery ?? [];
        $delivery = end($delivery);

        if (false === $delivery) {
            return null;
        }

        return $delivery;
    }

    /**
     * @param  Delivery $delivery
     * @return static
     */
    public function addToDelivery(
        Delivery $delivery
    ): static {
        $this->delivery[] = $delivery;

        return $this;
    }

    /**
     * @return Delivery
     */
    public function addToDeliveryWithCreate(): Delivery
    {
        $this->addTodelivery($delivery = new Delivery());

        return $delivery;
    }

    /**
     * @param  Delivery $delivery
     * @return static
     */
    public function addOnceToDelivery(
        Delivery $delivery
    ): static {
        if (!is_array($this->delivery)) {
            $this->delivery = [];
        }

        $this->delivery[0] = $delivery;

        return $this;
    }

    /**
     * @return Delivery
     */
    public function addOnceToDeliveryWithCreate(): Delivery
    {
        if (!is_array($this->delivery)) {
            $this->delivery = [];
        }

        if ([] === $this->delivery) {
            $this->addOnceTodelivery(new Delivery());
        }

        return $this->delivery[0];
    }

    /**
     * @return null|DeliveryTerms
     */
    public function getDeliveryTerms(): ?DeliveryTerms
    {
        return $this->deliveryTerms;
    }

    /**
     * @return DeliveryTerms
     */
    public function getDeliveryTermsWithCreate(): DeliveryTerms
    {
        $this->deliveryTerms ??= new DeliveryTerms();

        return $this->deliveryTerms;
    }

    /**
     * @param  null|DeliveryTerms $deliveryTerms
     * @return static
     */
    public function setDeliveryTerms(
        ?DeliveryTerms $deliveryTerms = null
    ): static {
        $this->deliveryTerms = $deliveryTerms;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDeliveryTerms(): static
    {
        $this->deliveryTerms = null;

        return $this;
    }

    /**
     * @return null|OriginatorParty
     */
    public function getOriginatorParty(): ?OriginatorParty
    {
        return $this->originatorParty;
    }

    /**
     * @return OriginatorParty
     */
    public function getOriginatorPartyWithCreate(): OriginatorParty
    {
        $this->originatorParty ??= new OriginatorParty();

        return $this->originatorParty;
    }

    /**
     * @param  null|OriginatorParty $originatorParty
     * @return static
     */
    public function setOriginatorParty(
        ?OriginatorParty $originatorParty = null
    ): static {
        $this->originatorParty = $originatorParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetOriginatorParty(): static
    {
        $this->originatorParty = null;

        return $this;
    }

    /**
     * @return null|array<OrderedShipment>
     */
    public function getOrderedShipment(): ?array
    {
        return $this->orderedShipment;
    }

    /**
     * @param  null|array<OrderedShipment> $orderedShipment
     * @return static
     */
    public function setOrderedShipment(
        ?array $orderedShipment = null
    ): static {
        $this->orderedShipment = $orderedShipment;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetOrderedShipment(): static
    {
        $this->orderedShipment = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearOrderedShipment(): static
    {
        $this->orderedShipment = [];

        return $this;
    }

    /**
     * @return null|OrderedShipment
     */
    public function firstOrderedShipment(): ?OrderedShipment
    {
        $orderedShipment = $this->orderedShipment ?? [];
        $orderedShipment = reset($orderedShipment);

        if (false === $orderedShipment) {
            return null;
        }

        return $orderedShipment;
    }

    /**
     * @return null|OrderedShipment
     */
    public function lastOrderedShipment(): ?OrderedShipment
    {
        $orderedShipment = $this->orderedShipment ?? [];
        $orderedShipment = end($orderedShipment);

        if (false === $orderedShipment) {
            return null;
        }

        return $orderedShipment;
    }

    /**
     * @param  OrderedShipment $orderedShipment
     * @return static
     */
    public function addToOrderedShipment(
        OrderedShipment $orderedShipment
    ): static {
        $this->orderedShipment[] = $orderedShipment;

        return $this;
    }

    /**
     * @return OrderedShipment
     */
    public function addToOrderedShipmentWithCreate(): OrderedShipment
    {
        $this->addToorderedShipment($orderedShipment = new OrderedShipment());

        return $orderedShipment;
    }

    /**
     * @param  OrderedShipment $orderedShipment
     * @return static
     */
    public function addOnceToOrderedShipment(
        OrderedShipment $orderedShipment
    ): static {
        if (!is_array($this->orderedShipment)) {
            $this->orderedShipment = [];
        }

        $this->orderedShipment[0] = $orderedShipment;

        return $this;
    }

    /**
     * @return OrderedShipment
     */
    public function addOnceToOrderedShipmentWithCreate(): OrderedShipment
    {
        if (!is_array($this->orderedShipment)) {
            $this->orderedShipment = [];
        }

        if ([] === $this->orderedShipment) {
            $this->addOnceToorderedShipment(new OrderedShipment());
        }

        return $this->orderedShipment[0];
    }

    /**
     * @return null|PricingReference
     */
    public function getPricingReference(): ?PricingReference
    {
        return $this->pricingReference;
    }

    /**
     * @return PricingReference
     */
    public function getPricingReferenceWithCreate(): PricingReference
    {
        $this->pricingReference ??= new PricingReference();

        return $this->pricingReference;
    }

    /**
     * @param  null|PricingReference $pricingReference
     * @return static
     */
    public function setPricingReference(
        ?PricingReference $pricingReference = null
    ): static {
        $this->pricingReference = $pricingReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPricingReference(): static
    {
        $this->pricingReference = null;

        return $this;
    }

    /**
     * @return null|array<AllowanceCharge>
     */
    public function getAllowanceCharge(): ?array
    {
        return $this->allowanceCharge;
    }

    /**
     * @param  null|array<AllowanceCharge> $allowanceCharge
     * @return static
     */
    public function setAllowanceCharge(
        ?array $allowanceCharge = null
    ): static {
        $this->allowanceCharge = $allowanceCharge;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAllowanceCharge(): static
    {
        $this->allowanceCharge = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearAllowanceCharge(): static
    {
        $this->allowanceCharge = [];

        return $this;
    }

    /**
     * @return null|AllowanceCharge
     */
    public function firstAllowanceCharge(): ?AllowanceCharge
    {
        $allowanceCharge = $this->allowanceCharge ?? [];
        $allowanceCharge = reset($allowanceCharge);

        if (false === $allowanceCharge) {
            return null;
        }

        return $allowanceCharge;
    }

    /**
     * @return null|AllowanceCharge
     */
    public function lastAllowanceCharge(): ?AllowanceCharge
    {
        $allowanceCharge = $this->allowanceCharge ?? [];
        $allowanceCharge = end($allowanceCharge);

        if (false === $allowanceCharge) {
            return null;
        }

        return $allowanceCharge;
    }

    /**
     * @param  AllowanceCharge $allowanceCharge
     * @return static
     */
    public function addToAllowanceCharge(
        AllowanceCharge $allowanceCharge
    ): static {
        $this->allowanceCharge[] = $allowanceCharge;

        return $this;
    }

    /**
     * @return AllowanceCharge
     */
    public function addToAllowanceChargeWithCreate(): AllowanceCharge
    {
        $this->addToallowanceCharge($allowanceCharge = new AllowanceCharge());

        return $allowanceCharge;
    }

    /**
     * @param  AllowanceCharge $allowanceCharge
     * @return static
     */
    public function addOnceToAllowanceCharge(
        AllowanceCharge $allowanceCharge
    ): static {
        if (!is_array($this->allowanceCharge)) {
            $this->allowanceCharge = [];
        }

        $this->allowanceCharge[0] = $allowanceCharge;

        return $this;
    }

    /**
     * @return AllowanceCharge
     */
    public function addOnceToAllowanceChargeWithCreate(): AllowanceCharge
    {
        if (!is_array($this->allowanceCharge)) {
            $this->allowanceCharge = [];
        }

        if ([] === $this->allowanceCharge) {
            $this->addOnceToallowanceCharge(new AllowanceCharge());
        }

        return $this->allowanceCharge[0];
    }

    /**
     * @return null|Price
     */
    public function getPrice(): ?Price
    {
        return $this->price;
    }

    /**
     * @return Price
     */
    public function getPriceWithCreate(): Price
    {
        $this->price ??= new Price();

        return $this->price;
    }

    /**
     * @param  null|Price $price
     * @return static
     */
    public function setPrice(
        ?Price $price = null
    ): static {
        $this->price = $price;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPrice(): static
    {
        $this->price = null;

        return $this;
    }

    /**
     * @return null|Item
     */
    public function getItem(): ?Item
    {
        return $this->item;
    }

    /**
     * @return Item
     */
    public function getItemWithCreate(): Item
    {
        $this->item ??= new Item();

        return $this->item;
    }

    /**
     * @param  null|Item $item
     * @return static
     */
    public function setItem(
        ?Item $item = null
    ): static {
        $this->item = $item;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetItem(): static
    {
        $this->item = null;

        return $this;
    }

    /**
     * @return null|array<SubLineItem>
     */
    public function getSubLineItem(): ?array
    {
        return $this->subLineItem;
    }

    /**
     * @param  null|array<SubLineItem> $subLineItem
     * @return static
     */
    public function setSubLineItem(
        ?array $subLineItem = null
    ): static {
        $this->subLineItem = $subLineItem;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSubLineItem(): static
    {
        $this->subLineItem = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearSubLineItem(): static
    {
        $this->subLineItem = [];

        return $this;
    }

    /**
     * @return null|SubLineItem
     */
    public function firstSubLineItem(): ?SubLineItem
    {
        $subLineItem = $this->subLineItem ?? [];
        $subLineItem = reset($subLineItem);

        if (false === $subLineItem) {
            return null;
        }

        return $subLineItem;
    }

    /**
     * @return null|SubLineItem
     */
    public function lastSubLineItem(): ?SubLineItem
    {
        $subLineItem = $this->subLineItem ?? [];
        $subLineItem = end($subLineItem);

        if (false === $subLineItem) {
            return null;
        }

        return $subLineItem;
    }

    /**
     * @param  SubLineItem $subLineItem
     * @return static
     */
    public function addToSubLineItem(
        SubLineItem $subLineItem
    ): static {
        $this->subLineItem[] = $subLineItem;

        return $this;
    }

    /**
     * @return SubLineItem
     */
    public function addToSubLineItemWithCreate(): SubLineItem
    {
        $this->addTosubLineItem($subLineItem = new SubLineItem());

        return $subLineItem;
    }

    /**
     * @param  SubLineItem $subLineItem
     * @return static
     */
    public function addOnceToSubLineItem(
        SubLineItem $subLineItem
    ): static {
        if (!is_array($this->subLineItem)) {
            $this->subLineItem = [];
        }

        $this->subLineItem[0] = $subLineItem;

        return $this;
    }

    /**
     * @return SubLineItem
     */
    public function addOnceToSubLineItemWithCreate(): SubLineItem
    {
        if (!is_array($this->subLineItem)) {
            $this->subLineItem = [];
        }

        if ([] === $this->subLineItem) {
            $this->addOnceTosubLineItem(new SubLineItem());
        }

        return $this->subLineItem[0];
    }

    /**
     * @return null|WarrantyValidityPeriod
     */
    public function getWarrantyValidityPeriod(): ?WarrantyValidityPeriod
    {
        return $this->warrantyValidityPeriod;
    }

    /**
     * @return WarrantyValidityPeriod
     */
    public function getWarrantyValidityPeriodWithCreate(): WarrantyValidityPeriod
    {
        $this->warrantyValidityPeriod ??= new WarrantyValidityPeriod();

        return $this->warrantyValidityPeriod;
    }

    /**
     * @param  null|WarrantyValidityPeriod $warrantyValidityPeriod
     * @return static
     */
    public function setWarrantyValidityPeriod(
        ?WarrantyValidityPeriod $warrantyValidityPeriod = null
    ): static {
        $this->warrantyValidityPeriod = $warrantyValidityPeriod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetWarrantyValidityPeriod(): static
    {
        $this->warrantyValidityPeriod = null;

        return $this;
    }

    /**
     * @return null|WarrantyParty
     */
    public function getWarrantyParty(): ?WarrantyParty
    {
        return $this->warrantyParty;
    }

    /**
     * @return WarrantyParty
     */
    public function getWarrantyPartyWithCreate(): WarrantyParty
    {
        $this->warrantyParty ??= new WarrantyParty();

        return $this->warrantyParty;
    }

    /**
     * @param  null|WarrantyParty $warrantyParty
     * @return static
     */
    public function setWarrantyParty(
        ?WarrantyParty $warrantyParty = null
    ): static {
        $this->warrantyParty = $warrantyParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetWarrantyParty(): static
    {
        $this->warrantyParty = null;

        return $this;
    }

    /**
     * @return null|array<TaxTotal>
     */
    public function getTaxTotal(): ?array
    {
        return $this->taxTotal;
    }

    /**
     * @param  null|array<TaxTotal> $taxTotal
     * @return static
     */
    public function setTaxTotal(
        ?array $taxTotal = null
    ): static {
        $this->taxTotal = $taxTotal;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTaxTotal(): static
    {
        $this->taxTotal = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearTaxTotal(): static
    {
        $this->taxTotal = [];

        return $this;
    }

    /**
     * @return null|TaxTotal
     */
    public function firstTaxTotal(): ?TaxTotal
    {
        $taxTotal = $this->taxTotal ?? [];
        $taxTotal = reset($taxTotal);

        if (false === $taxTotal) {
            return null;
        }

        return $taxTotal;
    }

    /**
     * @return null|TaxTotal
     */
    public function lastTaxTotal(): ?TaxTotal
    {
        $taxTotal = $this->taxTotal ?? [];
        $taxTotal = end($taxTotal);

        if (false === $taxTotal) {
            return null;
        }

        return $taxTotal;
    }

    /**
     * @param  TaxTotal $taxTotal
     * @return static
     */
    public function addToTaxTotal(
        TaxTotal $taxTotal
    ): static {
        $this->taxTotal[] = $taxTotal;

        return $this;
    }

    /**
     * @return TaxTotal
     */
    public function addToTaxTotalWithCreate(): TaxTotal
    {
        $this->addTotaxTotal($taxTotal = new TaxTotal());

        return $taxTotal;
    }

    /**
     * @param  TaxTotal $taxTotal
     * @return static
     */
    public function addOnceToTaxTotal(
        TaxTotal $taxTotal
    ): static {
        if (!is_array($this->taxTotal)) {
            $this->taxTotal = [];
        }

        $this->taxTotal[0] = $taxTotal;

        return $this;
    }

    /**
     * @return TaxTotal
     */
    public function addOnceToTaxTotalWithCreate(): TaxTotal
    {
        if (!is_array($this->taxTotal)) {
            $this->taxTotal = [];
        }

        if ([] === $this->taxTotal) {
            $this->addOnceTotaxTotal(new TaxTotal());
        }

        return $this->taxTotal[0];
    }

    /**
     * @return null|ItemPriceExtension
     */
    public function getItemPriceExtension(): ?ItemPriceExtension
    {
        return $this->itemPriceExtension;
    }

    /**
     * @return ItemPriceExtension
     */
    public function getItemPriceExtensionWithCreate(): ItemPriceExtension
    {
        $this->itemPriceExtension ??= new ItemPriceExtension();

        return $this->itemPriceExtension;
    }

    /**
     * @param  null|ItemPriceExtension $itemPriceExtension
     * @return static
     */
    public function setItemPriceExtension(
        ?ItemPriceExtension $itemPriceExtension = null
    ): static {
        $this->itemPriceExtension = $itemPriceExtension;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetItemPriceExtension(): static
    {
        $this->itemPriceExtension = null;

        return $this;
    }

    /**
     * @return null|array<LineReference>
     */
    public function getLineReference(): ?array
    {
        return $this->lineReference;
    }

    /**
     * @param  null|array<LineReference> $lineReference
     * @return static
     */
    public function setLineReference(
        ?array $lineReference = null
    ): static {
        $this->lineReference = $lineReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLineReference(): static
    {
        $this->lineReference = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearLineReference(): static
    {
        $this->lineReference = [];

        return $this;
    }

    /**
     * @return null|LineReference
     */
    public function firstLineReference(): ?LineReference
    {
        $lineReference = $this->lineReference ?? [];
        $lineReference = reset($lineReference);

        if (false === $lineReference) {
            return null;
        }

        return $lineReference;
    }

    /**
     * @return null|LineReference
     */
    public function lastLineReference(): ?LineReference
    {
        $lineReference = $this->lineReference ?? [];
        $lineReference = end($lineReference);

        if (false === $lineReference) {
            return null;
        }

        return $lineReference;
    }

    /**
     * @param  LineReference $lineReference
     * @return static
     */
    public function addToLineReference(
        LineReference $lineReference
    ): static {
        $this->lineReference[] = $lineReference;

        return $this;
    }

    /**
     * @return LineReference
     */
    public function addToLineReferenceWithCreate(): LineReference
    {
        $this->addTolineReference($lineReference = new LineReference());

        return $lineReference;
    }

    /**
     * @param  LineReference $lineReference
     * @return static
     */
    public function addOnceToLineReference(
        LineReference $lineReference
    ): static {
        if (!is_array($this->lineReference)) {
            $this->lineReference = [];
        }

        $this->lineReference[0] = $lineReference;

        return $this;
    }

    /**
     * @return LineReference
     */
    public function addOnceToLineReferenceWithCreate(): LineReference
    {
        if (!is_array($this->lineReference)) {
            $this->lineReference = [];
        }

        if ([] === $this->lineReference) {
            $this->addOnceTolineReference(new LineReference());
        }

        return $this->lineReference[0];
    }
}
