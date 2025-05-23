<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\ID;
use horstoeko\invoicesuite\models\ubl\cbc\InvoicedQuantity;
use horstoeko\invoicesuite\models\ubl\cbc\LineExtensionAmount;
use horstoeko\invoicesuite\models\ubl\cbc\ParentDocumentLineReferenceID;

class ConsumptionLineType
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
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ParentDocumentLineReferenceID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ParentDocumentLineReferenceID")
     * @JMS\Expose
     * @JMS\SerializedName("ParentDocumentLineReferenceID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getParentDocumentLineReferenceID", setter="setParentDocumentLineReferenceID")
     */
    private $parentDocumentLineReferenceID;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\InvoicedQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\InvoicedQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("InvoicedQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getInvoicedQuantity", setter="setInvoicedQuantity")
     */
    private $invoicedQuantity;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\LineExtensionAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\LineExtensionAmount")
     * @JMS\Expose
     * @JMS\SerializedName("LineExtensionAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLineExtensionAmount", setter="setLineExtensionAmount")
     */
    private $lineExtensionAmount;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\Period|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\Period")
     * @JMS\Expose
     * @JMS\SerializedName("Period")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPeriod", setter="setPeriod")
     */
    private $period;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\Delivery>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\Delivery>")
     * @JMS\Expose
     * @JMS\SerializedName("Delivery")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Delivery", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getDelivery", setter="setDelivery")
     */
    private $delivery;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\AllowanceCharge>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\AllowanceCharge>")
     * @JMS\Expose
     * @JMS\SerializedName("AllowanceCharge")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="AllowanceCharge", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getAllowanceCharge", setter="setAllowanceCharge")
     */
    private $allowanceCharge;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\TaxTotal>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\TaxTotal>")
     * @JMS\Expose
     * @JMS\SerializedName("TaxTotal")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TaxTotal", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getTaxTotal", setter="setTaxTotal")
     */
    private $taxTotal;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\UtilityItem|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\UtilityItem")
     * @JMS\Expose
     * @JMS\SerializedName("UtilityItem")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getUtilityItem", setter="setUtilityItem")
     */
    private $utilityItem;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\Price|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\Price")
     * @JMS\Expose
     * @JMS\SerializedName("Price")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPrice", setter="setPrice")
     */
    private $price;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\UnstructuredPrice|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\UnstructuredPrice")
     * @JMS\Expose
     * @JMS\SerializedName("UnstructuredPrice")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getUnstructuredPrice", setter="setUnstructuredPrice")
     */
    private $unstructuredPrice;

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
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ParentDocumentLineReferenceID|null
     */
    public function getParentDocumentLineReferenceID(): ?ParentDocumentLineReferenceID
    {
        return $this->parentDocumentLineReferenceID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ParentDocumentLineReferenceID
     */
    public function getParentDocumentLineReferenceIDWithCreate(): ParentDocumentLineReferenceID
    {
        $this->parentDocumentLineReferenceID = is_null($this->parentDocumentLineReferenceID) ? new ParentDocumentLineReferenceID() : $this->parentDocumentLineReferenceID;

        return $this->parentDocumentLineReferenceID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ParentDocumentLineReferenceID|null $parentDocumentLineReferenceID
     * @return self
     */
    public function setParentDocumentLineReferenceID(
        ?ParentDocumentLineReferenceID $parentDocumentLineReferenceID = null,
    ): self {
        $this->parentDocumentLineReferenceID = $parentDocumentLineReferenceID;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\InvoicedQuantity|null
     */
    public function getInvoicedQuantity(): ?InvoicedQuantity
    {
        return $this->invoicedQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\InvoicedQuantity
     */
    public function getInvoicedQuantityWithCreate(): InvoicedQuantity
    {
        $this->invoicedQuantity = is_null($this->invoicedQuantity) ? new InvoicedQuantity() : $this->invoicedQuantity;

        return $this->invoicedQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\InvoicedQuantity|null $invoicedQuantity
     * @return self
     */
    public function setInvoicedQuantity(?InvoicedQuantity $invoicedQuantity = null): self
    {
        $this->invoicedQuantity = $invoicedQuantity;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\LineExtensionAmount|null
     */
    public function getLineExtensionAmount(): ?LineExtensionAmount
    {
        return $this->lineExtensionAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\LineExtensionAmount
     */
    public function getLineExtensionAmountWithCreate(): LineExtensionAmount
    {
        $this->lineExtensionAmount = is_null($this->lineExtensionAmount) ? new LineExtensionAmount() : $this->lineExtensionAmount;

        return $this->lineExtensionAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\LineExtensionAmount|null $lineExtensionAmount
     * @return self
     */
    public function setLineExtensionAmount(?LineExtensionAmount $lineExtensionAmount = null): self
    {
        $this->lineExtensionAmount = $lineExtensionAmount;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Period|null
     */
    public function getPeriod(): ?Period
    {
        return $this->period;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Period
     */
    public function getPeriodWithCreate(): Period
    {
        $this->period = is_null($this->period) ? new Period() : $this->period;

        return $this->period;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Period|null $period
     * @return self
     */
    public function setPeriod(?Period $period = null): self
    {
        $this->period = $period;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\Delivery>|null
     */
    public function getDelivery(): ?array
    {
        return $this->delivery;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\Delivery>|null $delivery
     * @return self
     */
    public function setDelivery(?array $delivery = null): self
    {
        $this->delivery = $delivery;

        return $this;
    }

    /**
     * @return self
     */
    public function clearDelivery(): self
    {
        $this->delivery = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Delivery $delivery
     * @return self
     */
    public function addToDelivery(Delivery $delivery): self
    {
        $this->delivery[] = $delivery;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Delivery
     */
    public function addToDeliveryWithCreate(): Delivery
    {
        $this->addTodelivery($delivery = new Delivery());

        return $delivery;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Delivery $delivery
     * @return self
     */
    public function addOnceToDelivery(Delivery $delivery): self
    {
        if (!is_array($this->delivery)) {
            $this->delivery = [];
        }

        $this->delivery[0] = $delivery;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Delivery
     */
    public function addOnceToDeliveryWithCreate(): Delivery
    {
        if (!is_array($this->delivery)) {
            $this->delivery = [];
        }

        if ($this->delivery === []) {
            $this->addOnceTodelivery(new Delivery());
        }

        return $this->delivery[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\AllowanceCharge>|null
     */
    public function getAllowanceCharge(): ?array
    {
        return $this->allowanceCharge;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\AllowanceCharge>|null $allowanceCharge
     * @return self
     */
    public function setAllowanceCharge(?array $allowanceCharge = null): self
    {
        $this->allowanceCharge = $allowanceCharge;

        return $this;
    }

    /**
     * @return self
     */
    public function clearAllowanceCharge(): self
    {
        $this->allowanceCharge = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\AllowanceCharge $allowanceCharge
     * @return self
     */
    public function addToAllowanceCharge(AllowanceCharge $allowanceCharge): self
    {
        $this->allowanceCharge[] = $allowanceCharge;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\AllowanceCharge
     */
    public function addToAllowanceChargeWithCreate(): AllowanceCharge
    {
        $this->addToallowanceCharge($allowanceCharge = new AllowanceCharge());

        return $allowanceCharge;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\AllowanceCharge $allowanceCharge
     * @return self
     */
    public function addOnceToAllowanceCharge(AllowanceCharge $allowanceCharge): self
    {
        if (!is_array($this->allowanceCharge)) {
            $this->allowanceCharge = [];
        }

        $this->allowanceCharge[0] = $allowanceCharge;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\AllowanceCharge
     */
    public function addOnceToAllowanceChargeWithCreate(): AllowanceCharge
    {
        if (!is_array($this->allowanceCharge)) {
            $this->allowanceCharge = [];
        }

        if ($this->allowanceCharge === []) {
            $this->addOnceToallowanceCharge(new AllowanceCharge());
        }

        return $this->allowanceCharge[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\TaxTotal>|null
     */
    public function getTaxTotal(): ?array
    {
        return $this->taxTotal;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\TaxTotal>|null $taxTotal
     * @return self
     */
    public function setTaxTotal(?array $taxTotal = null): self
    {
        $this->taxTotal = $taxTotal;

        return $this;
    }

    /**
     * @return self
     */
    public function clearTaxTotal(): self
    {
        $this->taxTotal = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\TaxTotal $taxTotal
     * @return self
     */
    public function addToTaxTotal(TaxTotal $taxTotal): self
    {
        $this->taxTotal[] = $taxTotal;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TaxTotal
     */
    public function addToTaxTotalWithCreate(): TaxTotal
    {
        $this->addTotaxTotal($taxTotal = new TaxTotal());

        return $taxTotal;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\TaxTotal $taxTotal
     * @return self
     */
    public function addOnceToTaxTotal(TaxTotal $taxTotal): self
    {
        if (!is_array($this->taxTotal)) {
            $this->taxTotal = [];
        }

        $this->taxTotal[0] = $taxTotal;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TaxTotal
     */
    public function addOnceToTaxTotalWithCreate(): TaxTotal
    {
        if (!is_array($this->taxTotal)) {
            $this->taxTotal = [];
        }

        if ($this->taxTotal === []) {
            $this->addOnceTotaxTotal(new TaxTotal());
        }

        return $this->taxTotal[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\UtilityItem|null
     */
    public function getUtilityItem(): ?UtilityItem
    {
        return $this->utilityItem;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\UtilityItem
     */
    public function getUtilityItemWithCreate(): UtilityItem
    {
        $this->utilityItem = is_null($this->utilityItem) ? new UtilityItem() : $this->utilityItem;

        return $this->utilityItem;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\UtilityItem|null $utilityItem
     * @return self
     */
    public function setUtilityItem(?UtilityItem $utilityItem = null): self
    {
        $this->utilityItem = $utilityItem;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Price|null
     */
    public function getPrice(): ?Price
    {
        return $this->price;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Price
     */
    public function getPriceWithCreate(): Price
    {
        $this->price = is_null($this->price) ? new Price() : $this->price;

        return $this->price;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Price|null $price
     * @return self
     */
    public function setPrice(?Price $price = null): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\UnstructuredPrice|null
     */
    public function getUnstructuredPrice(): ?UnstructuredPrice
    {
        return $this->unstructuredPrice;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\UnstructuredPrice
     */
    public function getUnstructuredPriceWithCreate(): UnstructuredPrice
    {
        $this->unstructuredPrice = is_null($this->unstructuredPrice) ? new UnstructuredPrice() : $this->unstructuredPrice;

        return $this->unstructuredPrice;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\UnstructuredPrice|null $unstructuredPrice
     * @return self
     */
    public function setUnstructuredPrice(?UnstructuredPrice $unstructuredPrice = null): self
    {
        $this->unstructuredPrice = $unstructuredPrice;

        return $this;
    }
}
