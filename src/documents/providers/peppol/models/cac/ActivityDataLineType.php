<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SupplyChainActivityTypeCode;
use JMS\Serializer\Annotation as JMS;

class ActivityDataLineType
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
     * @var null|SupplyChainActivityTypeCode
     */
    #[JMS\Accessor(getter: 'getSupplyChainActivityTypeCode', setter: 'setSupplyChainActivityTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SupplyChainActivityTypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SupplyChainActivityTypeCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $supplyChainActivityTypeCode;

    /**
     * @var null|BuyerCustomerParty
     */
    #[JMS\Accessor(getter: 'getBuyerCustomerParty', setter: 'setBuyerCustomerParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('BuyerCustomerParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\BuyerCustomerParty')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $buyerCustomerParty;

    /**
     * @var null|SellerSupplierParty
     */
    #[JMS\Accessor(getter: 'getSellerSupplierParty', setter: 'setSellerSupplierParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SellerSupplierParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\SellerSupplierParty')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $sellerSupplierParty;

    /**
     * @var null|ActivityPeriod
     */
    #[JMS\Accessor(getter: 'getActivityPeriod', setter: 'setActivityPeriod')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ActivityPeriod')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\ActivityPeriod')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $activityPeriod;

    /**
     * @var null|ActivityOriginLocation
     */
    #[JMS\Accessor(getter: 'getActivityOriginLocation', setter: 'setActivityOriginLocation')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ActivityOriginLocation')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\ActivityOriginLocation')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $activityOriginLocation;

    /**
     * @var null|ActivityFinalLocation
     */
    #[JMS\Accessor(getter: 'getActivityFinalLocation', setter: 'setActivityFinalLocation')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ActivityFinalLocation')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\ActivityFinalLocation')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $activityFinalLocation;

    /**
     * @var null|array<SalesItem>
     */
    #[JMS\Accessor(getter: 'getSalesItem', setter: 'setSalesItem')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SalesItem')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\SalesItem>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'SalesItem', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
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
        $this->supplyChainActivityTypeCode ??= new SupplyChainActivityTypeCode();

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
        $this->buyerCustomerParty ??= new BuyerCustomerParty();

        return $this->buyerCustomerParty;
    }

    /**
     * @param  null|BuyerCustomerParty $buyerCustomerParty
     * @return static
     */
    public function setBuyerCustomerParty(
        ?BuyerCustomerParty $buyerCustomerParty = null
    ): static {
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
        $this->sellerSupplierParty ??= new SellerSupplierParty();

        return $this->sellerSupplierParty;
    }

    /**
     * @param  null|SellerSupplierParty $sellerSupplierParty
     * @return static
     */
    public function setSellerSupplierParty(
        ?SellerSupplierParty $sellerSupplierParty = null
    ): static {
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
        $this->activityPeriod ??= new ActivityPeriod();

        return $this->activityPeriod;
    }

    /**
     * @param  null|ActivityPeriod $activityPeriod
     * @return static
     */
    public function setActivityPeriod(
        ?ActivityPeriod $activityPeriod = null
    ): static {
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
        $this->activityOriginLocation ??= new ActivityOriginLocation();

        return $this->activityOriginLocation;
    }

    /**
     * @param  null|ActivityOriginLocation $activityOriginLocation
     * @return static
     */
    public function setActivityOriginLocation(
        ?ActivityOriginLocation $activityOriginLocation = null
    ): static {
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
        $this->activityFinalLocation ??= new ActivityFinalLocation();

        return $this->activityFinalLocation;
    }

    /**
     * @param  null|ActivityFinalLocation $activityFinalLocation
     * @return static
     */
    public function setActivityFinalLocation(
        ?ActivityFinalLocation $activityFinalLocation = null
    ): static {
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
    public function setSalesItem(
        ?array $salesItem = null
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
    public function addToSalesItem(
        SalesItem $salesItem
    ): static {
        $this->salesItem[] = $salesItem;

        return $this;
    }

    /**
     * @return SalesItem
     */
    public function addToSalesItemWithCreate(): SalesItem
    {
        $this->addToSalesItem($salesItem = new SalesItem());

        return $salesItem;
    }

    /**
     * @param  SalesItem $salesItem
     * @return static
     */
    public function addOnceToSalesItem(
        SalesItem $salesItem
    ): static {
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
            $this->addOnceToSalesItem(new SalesItem());
        }

        return $this->salesItem[0];
    }
}
