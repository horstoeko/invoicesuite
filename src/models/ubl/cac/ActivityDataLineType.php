<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\ID;
use horstoeko\invoicesuite\models\ubl\cbc\SupplyChainActivityTypeCode;

class ActivityDataLineType
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
     * @var \horstoeko\invoicesuite\models\ubl\cbc\SupplyChainActivityTypeCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\SupplyChainActivityTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("SupplyChainActivityTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSupplyChainActivityTypeCode", setter="setSupplyChainActivityTypeCode")
     */
    private $supplyChainActivityTypeCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\BuyerCustomerParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\BuyerCustomerParty")
     * @JMS\Expose
     * @JMS\SerializedName("BuyerCustomerParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getBuyerCustomerParty", setter="setBuyerCustomerParty")
     */
    private $buyerCustomerParty;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\SellerSupplierParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\SellerSupplierParty")
     * @JMS\Expose
     * @JMS\SerializedName("SellerSupplierParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSellerSupplierParty", setter="setSellerSupplierParty")
     */
    private $sellerSupplierParty;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\ActivityPeriod|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\ActivityPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("ActivityPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getActivityPeriod", setter="setActivityPeriod")
     */
    private $activityPeriod;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\ActivityOriginLocation|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\ActivityOriginLocation")
     * @JMS\Expose
     * @JMS\SerializedName("ActivityOriginLocation")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getActivityOriginLocation", setter="setActivityOriginLocation")
     */
    private $activityOriginLocation;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\ActivityFinalLocation|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\ActivityFinalLocation")
     * @JMS\Expose
     * @JMS\SerializedName("ActivityFinalLocation")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getActivityFinalLocation", setter="setActivityFinalLocation")
     */
    private $activityFinalLocation;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\SalesItem>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\SalesItem>")
     * @JMS\Expose
     * @JMS\SerializedName("SalesItem")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="SalesItem", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
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
     * @return \horstoeko\invoicesuite\models\ubl\cbc\SupplyChainActivityTypeCode|null
     */
    public function getSupplyChainActivityTypeCode(): ?SupplyChainActivityTypeCode
    {
        return $this->supplyChainActivityTypeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\SupplyChainActivityTypeCode
     */
    public function getSupplyChainActivityTypeCodeWithCreate(): SupplyChainActivityTypeCode
    {
        $this->supplyChainActivityTypeCode = is_null($this->supplyChainActivityTypeCode) ? new SupplyChainActivityTypeCode() : $this->supplyChainActivityTypeCode;

        return $this->supplyChainActivityTypeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\SupplyChainActivityTypeCode|null $supplyChainActivityTypeCode
     * @return self
     */
    public function setSupplyChainActivityTypeCode(
        ?SupplyChainActivityTypeCode $supplyChainActivityTypeCode = null,
    ): self {
        $this->supplyChainActivityTypeCode = $supplyChainActivityTypeCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\BuyerCustomerParty|null
     */
    public function getBuyerCustomerParty(): ?BuyerCustomerParty
    {
        return $this->buyerCustomerParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\BuyerCustomerParty
     */
    public function getBuyerCustomerPartyWithCreate(): BuyerCustomerParty
    {
        $this->buyerCustomerParty = is_null($this->buyerCustomerParty) ? new BuyerCustomerParty() : $this->buyerCustomerParty;

        return $this->buyerCustomerParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\BuyerCustomerParty|null $buyerCustomerParty
     * @return self
     */
    public function setBuyerCustomerParty(?BuyerCustomerParty $buyerCustomerParty = null): self
    {
        $this->buyerCustomerParty = $buyerCustomerParty;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\SellerSupplierParty|null
     */
    public function getSellerSupplierParty(): ?SellerSupplierParty
    {
        return $this->sellerSupplierParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\SellerSupplierParty
     */
    public function getSellerSupplierPartyWithCreate(): SellerSupplierParty
    {
        $this->sellerSupplierParty = is_null($this->sellerSupplierParty) ? new SellerSupplierParty() : $this->sellerSupplierParty;

        return $this->sellerSupplierParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\SellerSupplierParty|null $sellerSupplierParty
     * @return self
     */
    public function setSellerSupplierParty(?SellerSupplierParty $sellerSupplierParty = null): self
    {
        $this->sellerSupplierParty = $sellerSupplierParty;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ActivityPeriod|null
     */
    public function getActivityPeriod(): ?ActivityPeriod
    {
        return $this->activityPeriod;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ActivityPeriod
     */
    public function getActivityPeriodWithCreate(): ActivityPeriod
    {
        $this->activityPeriod = is_null($this->activityPeriod) ? new ActivityPeriod() : $this->activityPeriod;

        return $this->activityPeriod;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ActivityPeriod|null $activityPeriod
     * @return self
     */
    public function setActivityPeriod(?ActivityPeriod $activityPeriod = null): self
    {
        $this->activityPeriod = $activityPeriod;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ActivityOriginLocation|null
     */
    public function getActivityOriginLocation(): ?ActivityOriginLocation
    {
        return $this->activityOriginLocation;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ActivityOriginLocation
     */
    public function getActivityOriginLocationWithCreate(): ActivityOriginLocation
    {
        $this->activityOriginLocation = is_null($this->activityOriginLocation) ? new ActivityOriginLocation() : $this->activityOriginLocation;

        return $this->activityOriginLocation;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ActivityOriginLocation|null $activityOriginLocation
     * @return self
     */
    public function setActivityOriginLocation(?ActivityOriginLocation $activityOriginLocation = null): self
    {
        $this->activityOriginLocation = $activityOriginLocation;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ActivityFinalLocation|null
     */
    public function getActivityFinalLocation(): ?ActivityFinalLocation
    {
        return $this->activityFinalLocation;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ActivityFinalLocation
     */
    public function getActivityFinalLocationWithCreate(): ActivityFinalLocation
    {
        $this->activityFinalLocation = is_null($this->activityFinalLocation) ? new ActivityFinalLocation() : $this->activityFinalLocation;

        return $this->activityFinalLocation;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ActivityFinalLocation|null $activityFinalLocation
     * @return self
     */
    public function setActivityFinalLocation(?ActivityFinalLocation $activityFinalLocation = null): self
    {
        $this->activityFinalLocation = $activityFinalLocation;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\SalesItem>|null
     */
    public function getSalesItem(): ?array
    {
        return $this->salesItem;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\SalesItem>|null $salesItem
     * @return self
     */
    public function setSalesItem(?array $salesItem = null): self
    {
        $this->salesItem = $salesItem;

        return $this;
    }

    /**
     * @return self
     */
    public function clearSalesItem(): self
    {
        $this->salesItem = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\SalesItem $salesItem
     * @return self
     */
    public function addToSalesItem(SalesItem $salesItem): self
    {
        $this->salesItem[] = $salesItem;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\SalesItem
     */
    public function addToSalesItemWithCreate(): SalesItem
    {
        $this->addTosalesItem($salesItem = new SalesItem());

        return $salesItem;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\SalesItem $salesItem
     * @return self
     */
    public function addOnceToSalesItem(SalesItem $salesItem): self
    {
        if (!is_array($this->salesItem)) {
            $this->salesItem = [];
        }

        $this->salesItem[0] = $salesItem;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\SalesItem
     */
    public function addOnceToSalesItemWithCreate(): SalesItem
    {
        if (!is_array($this->salesItem)) {
            $this->salesItem = [];
        }

        if ($this->salesItem === []) {
            $this->addOnceTosalesItem(new SalesItem());
        }

        return $this->salesItem[0];
    }
}
