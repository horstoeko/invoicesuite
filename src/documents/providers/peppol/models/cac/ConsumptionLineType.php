<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\InvoicedQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LineExtensionAmount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ParentDocumentLineReferenceID;
use JMS\Serializer\Annotation as JMS;

class ConsumptionLineType
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
     * @var null|ParentDocumentLineReferenceID
     */
    #[JMS\Accessor(getter: 'getParentDocumentLineReferenceID', setter: 'setParentDocumentLineReferenceID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ParentDocumentLineReferenceID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ParentDocumentLineReferenceID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $parentDocumentLineReferenceID;

    /**
     * @var null|InvoicedQuantity
     */
    #[JMS\Accessor(getter: 'getInvoicedQuantity', setter: 'setInvoicedQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('InvoicedQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\InvoicedQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $invoicedQuantity;

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
     * @var null|Period
     */
    #[JMS\Accessor(getter: 'getPeriod', setter: 'setPeriod')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Period')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\Period')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $period;

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
     * @var null|UtilityItem
     */
    #[JMS\Accessor(getter: 'getUtilityItem', setter: 'setUtilityItem')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('UtilityItem')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\UtilityItem')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $utilityItem;

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
     * @var null|UnstructuredPrice
     */
    #[JMS\Accessor(getter: 'getUnstructuredPrice', setter: 'setUnstructuredPrice')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('UnstructuredPrice')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\UnstructuredPrice')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $unstructuredPrice;

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
     * @return null|ParentDocumentLineReferenceID
     */
    public function getParentDocumentLineReferenceID(): ?ParentDocumentLineReferenceID
    {
        return $this->parentDocumentLineReferenceID;
    }

    /**
     * @return ParentDocumentLineReferenceID
     */
    public function getParentDocumentLineReferenceIDWithCreate(): ParentDocumentLineReferenceID
    {
        $this->parentDocumentLineReferenceID ??= new ParentDocumentLineReferenceID();

        return $this->parentDocumentLineReferenceID;
    }

    /**
     * @param  null|ParentDocumentLineReferenceID $parentDocumentLineReferenceID
     * @return static
     */
    public function setParentDocumentLineReferenceID(
        ?ParentDocumentLineReferenceID $parentDocumentLineReferenceID = null,
    ): static {
        $this->parentDocumentLineReferenceID = $parentDocumentLineReferenceID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetParentDocumentLineReferenceID(): static
    {
        $this->parentDocumentLineReferenceID = null;

        return $this;
    }

    /**
     * @return null|InvoicedQuantity
     */
    public function getInvoicedQuantity(): ?InvoicedQuantity
    {
        return $this->invoicedQuantity;
    }

    /**
     * @return InvoicedQuantity
     */
    public function getInvoicedQuantityWithCreate(): InvoicedQuantity
    {
        $this->invoicedQuantity ??= new InvoicedQuantity();

        return $this->invoicedQuantity;
    }

    /**
     * @param  null|InvoicedQuantity $invoicedQuantity
     * @return static
     */
    public function setInvoicedQuantity(
        ?InvoicedQuantity $invoicedQuantity = null
    ): static {
        $this->invoicedQuantity = $invoicedQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetInvoicedQuantity(): static
    {
        $this->invoicedQuantity = null;

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
     * @return null|Period
     */
    public function getPeriod(): ?Period
    {
        return $this->period;
    }

    /**
     * @return Period
     */
    public function getPeriodWithCreate(): Period
    {
        $this->period ??= new Period();

        return $this->period;
    }

    /**
     * @param  null|Period $period
     * @return static
     */
    public function setPeriod(
        ?Period $period = null
    ): static {
        $this->period = $period;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPeriod(): static
    {
        $this->period = null;

        return $this;
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
        $this->addToDelivery($delivery = new Delivery());

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
            $this->addOnceToDelivery(new Delivery());
        }

        return $this->delivery[0];
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
        $this->addToAllowanceCharge($allowanceCharge = new AllowanceCharge());

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
            $this->addOnceToAllowanceCharge(new AllowanceCharge());
        }

        return $this->allowanceCharge[0];
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
        $this->addToTaxTotal($taxTotal = new TaxTotal());

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
            $this->addOnceToTaxTotal(new TaxTotal());
        }

        return $this->taxTotal[0];
    }

    /**
     * @return null|UtilityItem
     */
    public function getUtilityItem(): ?UtilityItem
    {
        return $this->utilityItem;
    }

    /**
     * @return UtilityItem
     */
    public function getUtilityItemWithCreate(): UtilityItem
    {
        $this->utilityItem ??= new UtilityItem();

        return $this->utilityItem;
    }

    /**
     * @param  null|UtilityItem $utilityItem
     * @return static
     */
    public function setUtilityItem(
        ?UtilityItem $utilityItem = null
    ): static {
        $this->utilityItem = $utilityItem;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetUtilityItem(): static
    {
        $this->utilityItem = null;

        return $this;
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
     * @return null|UnstructuredPrice
     */
    public function getUnstructuredPrice(): ?UnstructuredPrice
    {
        return $this->unstructuredPrice;
    }

    /**
     * @return UnstructuredPrice
     */
    public function getUnstructuredPriceWithCreate(): UnstructuredPrice
    {
        $this->unstructuredPrice ??= new UnstructuredPrice();

        return $this->unstructuredPrice;
    }

    /**
     * @param  null|UnstructuredPrice $unstructuredPrice
     * @return static
     */
    public function setUnstructuredPrice(
        ?UnstructuredPrice $unstructuredPrice = null
    ): static {
        $this->unstructuredPrice = $unstructuredPrice;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetUnstructuredPrice(): static
    {
        $this->unstructuredPrice = null;

        return $this;
    }
}
