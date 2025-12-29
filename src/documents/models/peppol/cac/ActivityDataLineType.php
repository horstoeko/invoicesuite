<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\SupplyChainActivityTypeCode;
use JMS\Serializer\Annotation as JMS;

class ActivityDataLineType
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
     * @var null|SupplyChainActivityTypeCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\SupplyChainActivityTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("SupplyChainActivityTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSupplyChainActivityTypeCode", setter="setSupplyChainActivityTypeCode")
     */
    private $supplyChainActivityTypeCode;

    /**
     * @var null|BuyerCustomerParty
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\BuyerCustomerParty")
     * @JMS\Expose
     * @JMS\SerializedName("BuyerCustomerParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getBuyerCustomerParty", setter="setBuyerCustomerParty")
     */
    private $buyerCustomerParty;

    /**
     * @var null|SellerSupplierParty
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\SellerSupplierParty")
     * @JMS\Expose
     * @JMS\SerializedName("SellerSupplierParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSellerSupplierParty", setter="setSellerSupplierParty")
     */
    private $sellerSupplierParty;

    /**
     * @var null|ActivityPeriod
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\ActivityPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("ActivityPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getActivityPeriod", setter="setActivityPeriod")
     */
    private $activityPeriod;

    /**
     * @var null|ActivityOriginLocation
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\ActivityOriginLocation")
     * @JMS\Expose
     * @JMS\SerializedName("ActivityOriginLocation")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getActivityOriginLocation", setter="setActivityOriginLocation")
     */
    private $activityOriginLocation;

    /**
     * @var null|ActivityFinalLocation
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\ActivityFinalLocation")
     * @JMS\Expose
     * @JMS\SerializedName("ActivityFinalLocation")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getActivityFinalLocation", setter="setActivityFinalLocation")
     */
    private $activityFinalLocation;

    /**
     * @var null|array<SalesItem>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\SalesItem>")
     * @JMS\Expose
     * @JMS\SerializedName("SalesItem")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="SalesItem", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
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
     * @return null|SupplyChainActivityTypeCode
     */
    public function getSupplyChainActivityTypeCode(): ?SupplyChainActivityTypeCode
    {
        return $this->supplyChainActivityTypeCode;
    }

    /**
     * @return SupplyChainActivityTypeCode
     */
    public function getSupplyChainActivityTypeCodeWithCreate(): SupplyChainActivityTypeCode
    {
        $this->supplyChainActivityTypeCode = is_null($this->supplyChainActivityTypeCode) ? new SupplyChainActivityTypeCode() : $this->supplyChainActivityTypeCode;

        return $this->supplyChainActivityTypeCode;
    }

    /**
     * @param  null|SupplyChainActivityTypeCode $supplyChainActivityTypeCode
     * @return static
     */
    public function setSupplyChainActivityTypeCode(
        ?SupplyChainActivityTypeCode $supplyChainActivityTypeCode = null,
    ): static {
        $this->supplyChainActivityTypeCode = $supplyChainActivityTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSupplyChainActivityTypeCode(): static
    {
        $this->supplyChainActivityTypeCode = null;

        return $this;
    }

    /**
     * @return null|BuyerCustomerParty
     */
    public function getBuyerCustomerParty(): ?BuyerCustomerParty
    {
        return $this->buyerCustomerParty;
    }

    /**
     * @return BuyerCustomerParty
     */
    public function getBuyerCustomerPartyWithCreate(): BuyerCustomerParty
    {
        $this->buyerCustomerParty = is_null($this->buyerCustomerParty) ? new BuyerCustomerParty() : $this->buyerCustomerParty;

        return $this->buyerCustomerParty;
    }

    /**
     * @param  null|BuyerCustomerParty $buyerCustomerParty
     * @return static
     */
    public function setBuyerCustomerParty(?BuyerCustomerParty $buyerCustomerParty = null): static
    {
        $this->buyerCustomerParty = $buyerCustomerParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetBuyerCustomerParty(): static
    {
        $this->buyerCustomerParty = null;

        return $this;
    }

    /**
     * @return null|SellerSupplierParty
     */
    public function getSellerSupplierParty(): ?SellerSupplierParty
    {
        return $this->sellerSupplierParty;
    }

    /**
     * @return SellerSupplierParty
     */
    public function getSellerSupplierPartyWithCreate(): SellerSupplierParty
    {
        $this->sellerSupplierParty = is_null($this->sellerSupplierParty) ? new SellerSupplierParty() : $this->sellerSupplierParty;

        return $this->sellerSupplierParty;
    }

    /**
     * @param  null|SellerSupplierParty $sellerSupplierParty
     * @return static
     */
    public function setSellerSupplierParty(?SellerSupplierParty $sellerSupplierParty = null): static
    {
        $this->sellerSupplierParty = $sellerSupplierParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSellerSupplierParty(): static
    {
        $this->sellerSupplierParty = null;

        return $this;
    }

    /**
     * @return null|ActivityPeriod
     */
    public function getActivityPeriod(): ?ActivityPeriod
    {
        return $this->activityPeriod;
    }

    /**
     * @return ActivityPeriod
     */
    public function getActivityPeriodWithCreate(): ActivityPeriod
    {
        $this->activityPeriod = is_null($this->activityPeriod) ? new ActivityPeriod() : $this->activityPeriod;

        return $this->activityPeriod;
    }

    /**
     * @param  null|ActivityPeriod $activityPeriod
     * @return static
     */
    public function setActivityPeriod(?ActivityPeriod $activityPeriod = null): static
    {
        $this->activityPeriod = $activityPeriod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetActivityPeriod(): static
    {
        $this->activityPeriod = null;

        return $this;
    }

    /**
     * @return null|ActivityOriginLocation
     */
    public function getActivityOriginLocation(): ?ActivityOriginLocation
    {
        return $this->activityOriginLocation;
    }

    /**
     * @return ActivityOriginLocation
     */
    public function getActivityOriginLocationWithCreate(): ActivityOriginLocation
    {
        $this->activityOriginLocation = is_null($this->activityOriginLocation) ? new ActivityOriginLocation() : $this->activityOriginLocation;

        return $this->activityOriginLocation;
    }

    /**
     * @param  null|ActivityOriginLocation $activityOriginLocation
     * @return static
     */
    public function setActivityOriginLocation(?ActivityOriginLocation $activityOriginLocation = null): static
    {
        $this->activityOriginLocation = $activityOriginLocation;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetActivityOriginLocation(): static
    {
        $this->activityOriginLocation = null;

        return $this;
    }

    /**
     * @return null|ActivityFinalLocation
     */
    public function getActivityFinalLocation(): ?ActivityFinalLocation
    {
        return $this->activityFinalLocation;
    }

    /**
     * @return ActivityFinalLocation
     */
    public function getActivityFinalLocationWithCreate(): ActivityFinalLocation
    {
        $this->activityFinalLocation = is_null($this->activityFinalLocation) ? new ActivityFinalLocation() : $this->activityFinalLocation;

        return $this->activityFinalLocation;
    }

    /**
     * @param  null|ActivityFinalLocation $activityFinalLocation
     * @return static
     */
    public function setActivityFinalLocation(?ActivityFinalLocation $activityFinalLocation = null): static
    {
        $this->activityFinalLocation = $activityFinalLocation;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetActivityFinalLocation(): static
    {
        $this->activityFinalLocation = null;

        return $this;
    }

    /**
     * @return null|array<SalesItem>
     */
    public function getSalesItem(): ?array
    {
        return $this->salesItem;
    }

    /**
     * @param  null|array<SalesItem> $salesItem
     * @return static
     */
    public function setSalesItem(?array $salesItem = null): static
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

    /**
     * @return static
     */
    public function clearSalesItem(): static
    {
        $this->salesItem = [];

        return $this;
    }

    /**
     * @return null|SalesItem
     */
    public function firstSalesItem(): ?SalesItem
    {
        $salesItem = $this->salesItem ?? [];
        $salesItem = reset($salesItem);

        if (false === $salesItem) {
            return null;
        }

        return $salesItem;
    }

    /**
     * @return null|SalesItem
     */
    public function lastSalesItem(): ?SalesItem
    {
        $salesItem = $this->salesItem ?? [];
        $salesItem = end($salesItem);

        if (false === $salesItem) {
            return null;
        }

        return $salesItem;
    }

    /**
     * @param  SalesItem $salesItem
     * @return static
     */
    public function addToSalesItem(SalesItem $salesItem): static
    {
        $this->salesItem[] = $salesItem;

        return $this;
    }

    /**
     * @return SalesItem
     */
    public function addToSalesItemWithCreate(): SalesItem
    {
        $this->addTosalesItem($salesItem = new SalesItem());

        return $salesItem;
    }

    /**
     * @param  SalesItem $salesItem
     * @return static
     */
    public function addOnceToSalesItem(SalesItem $salesItem): static
    {
        if (!is_array($this->salesItem)) {
            $this->salesItem = [];
        }

        $this->salesItem[0] = $salesItem;

        return $this;
    }

    /**
     * @return SalesItem
     */
    public function addOnceToSalesItemWithCreate(): SalesItem
    {
        if (!is_array($this->salesItem)) {
            $this->salesItem = [];
        }

        if ([] === $this->salesItem) {
            $this->addOnceTosalesItem(new SalesItem());
        }

        return $this->salesItem[0];
    }
}
