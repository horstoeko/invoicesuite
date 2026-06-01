<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PackageLevelCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PackagingTypeCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PackingMaterial;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Quantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TraceID;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use JMS\Serializer\Annotation as JMS;

class PackageType
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
     * @var null|bool
     */
    #[JMS\Accessor(getter: 'getReturnableMaterialIndicator', setter: 'setReturnableMaterialIndicator')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ReturnableMaterialIndicator')]
    #[JMS\Type('bool')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $returnableMaterialIndicator;

    /**
     * @var null|PackageLevelCode
     */
    #[JMS\Accessor(getter: 'getPackageLevelCode', setter: 'setPackageLevelCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PackageLevelCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PackageLevelCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $packageLevelCode;

    /**
     * @var null|PackagingTypeCode
     */
    #[JMS\Accessor(getter: 'getPackagingTypeCode', setter: 'setPackagingTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PackagingTypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PackagingTypeCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $packagingTypeCode;

    /**
     * @var null|array<PackingMaterial>
     */
    #[JMS\Accessor(getter: 'getPackingMaterial', setter: 'setPackingMaterial')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PackingMaterial')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PackingMaterial>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'PackingMaterial', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $packingMaterial;

    /**
     * @var null|TraceID
     */
    #[JMS\Accessor(getter: 'getTraceID', setter: 'setTraceID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TraceID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TraceID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $traceID;

    /**
     * @var null|array<ContainedPackage>
     */
    #[JMS\Accessor(getter: 'getContainedPackage', setter: 'setContainedPackage')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ContainedPackage')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\ContainedPackage>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'ContainedPackage', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $containedPackage;

    /**
     * @var null|ContainingTransportEquipment
     */
    #[JMS\Accessor(getter: 'getContainingTransportEquipment', setter: 'setContainingTransportEquipment')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ContainingTransportEquipment')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\ContainingTransportEquipment')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $containingTransportEquipment;

    /**
     * @var null|array<GoodsItem>
     */
    #[JMS\Accessor(getter: 'getGoodsItem', setter: 'setGoodsItem')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('GoodsItem')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\GoodsItem>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'GoodsItem', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $goodsItem;

    /**
     * @var null|array<MeasurementDimension>
     */
    #[JMS\Accessor(getter: 'getMeasurementDimension', setter: 'setMeasurementDimension')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MeasurementDimension')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\MeasurementDimension>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'MeasurementDimension', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $measurementDimension;

    /**
     * @var null|array<DeliveryUnit>
     */
    #[JMS\Accessor(getter: 'getDeliveryUnit', setter: 'setDeliveryUnit')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('DeliveryUnit')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\DeliveryUnit>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'DeliveryUnit', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $deliveryUnit;

    /**
     * @var null|Delivery
     */
    #[JMS\Accessor(getter: 'getDelivery', setter: 'setDelivery')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Delivery')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\Delivery')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $delivery;

    /**
     * @var null|Pickup
     */
    #[JMS\Accessor(getter: 'getPickup', setter: 'setPickup')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Pickup')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\Pickup')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $pickup;

    /**
     * @var null|Despatch
     */
    #[JMS\Accessor(getter: 'getDespatch', setter: 'setDespatch')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Despatch')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\Despatch')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $despatch;

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
     * @return null|bool
     */
    public function getReturnableMaterialIndicator(): ?bool
    {
        return $this->returnableMaterialIndicator;
    }

    /**
     * @param  null|bool $returnableMaterialIndicator
     * @return static
     */
    public function setReturnableMaterialIndicator(
        ?bool $returnableMaterialIndicator = null
    ): static {
        $this->returnableMaterialIndicator = $returnableMaterialIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetReturnableMaterialIndicator(): static
    {
        $this->returnableMaterialIndicator = null;

        return $this;
    }

    /**
     * @return null|PackageLevelCode
     */
    public function getPackageLevelCode(): ?PackageLevelCode
    {
        return $this->packageLevelCode;
    }

    /**
     * @return PackageLevelCode
     */
    public function getPackageLevelCodeWithCreate(): PackageLevelCode
    {
        $this->packageLevelCode ??= new PackageLevelCode();

        return $this->packageLevelCode;
    }

    /**
     * @param  null|PackageLevelCode $packageLevelCode
     * @return static
     */
    public function setPackageLevelCode(
        ?PackageLevelCode $packageLevelCode = null
    ): static {
        $this->packageLevelCode = $packageLevelCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPackageLevelCode(): static
    {
        $this->packageLevelCode = null;

        return $this;
    }

    /**
     * @return null|PackagingTypeCode
     */
    public function getPackagingTypeCode(): ?PackagingTypeCode
    {
        return $this->packagingTypeCode;
    }

    /**
     * @return PackagingTypeCode
     */
    public function getPackagingTypeCodeWithCreate(): PackagingTypeCode
    {
        $this->packagingTypeCode ??= new PackagingTypeCode();

        return $this->packagingTypeCode;
    }

    /**
     * @param  null|PackagingTypeCode $packagingTypeCode
     * @return static
     */
    public function setPackagingTypeCode(
        ?PackagingTypeCode $packagingTypeCode = null
    ): static {
        $this->packagingTypeCode = $packagingTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPackagingTypeCode(): static
    {
        $this->packagingTypeCode = null;

        return $this;
    }

    /**
     * @return null|array<PackingMaterial>
     */
    public function getPackingMaterial(): ?array
    {
        return $this->packingMaterial;
    }

    /**
     * @param  null|array<PackingMaterial> $packingMaterial
     * @return static
     */
    public function setPackingMaterial(
        ?array $packingMaterial = null
    ): static {
        $this->packingMaterial = $packingMaterial;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPackingMaterial(): static
    {
        $this->packingMaterial = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearPackingMaterial(): static
    {
        $this->packingMaterial = [];

        return $this;
    }

    /**
     * @return null|PackingMaterial
     */
    public function firstPackingMaterial(): ?PackingMaterial
    {
        $packingMaterial = $this->packingMaterial ?? [];
        $packingMaterial = reset($packingMaterial);

        if (false === $packingMaterial) {
            return null;
        }

        return $packingMaterial;
    }

    /**
     * @return null|PackingMaterial
     */
    public function lastPackingMaterial(): ?PackingMaterial
    {
        $packingMaterial = $this->packingMaterial ?? [];
        $packingMaterial = end($packingMaterial);

        if (false === $packingMaterial) {
            return null;
        }

        return $packingMaterial;
    }

    /**
     * @param  PackingMaterial $packingMaterial
     * @return static
     */
    public function addToPackingMaterial(
        PackingMaterial $packingMaterial
    ): static {
        $this->packingMaterial[] = $packingMaterial;

        return $this;
    }

    /**
     * @return PackingMaterial
     */
    public function addToPackingMaterialWithCreate(): PackingMaterial
    {
        $this->addToPackingMaterial($packingMaterial = new PackingMaterial());

        return $packingMaterial;
    }

    /**
     * @param  PackingMaterial $packingMaterial
     * @return static
     */
    public function addOnceToPackingMaterial(
        PackingMaterial $packingMaterial
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->packingMaterial)) {
            $this->packingMaterial = [];
        }

        $this->packingMaterial[0] = $packingMaterial;

        return $this;
    }

    /**
     * @return PackingMaterial
     */
    public function addOnceToPackingMaterialWithCreate(): PackingMaterial
    {
        if (!InvoiceSuiteArrayUtils::is($this->packingMaterial)) {
            $this->packingMaterial = [];
        }

        if ([] === $this->packingMaterial) {
            $this->addOnceToPackingMaterial(new PackingMaterial());
        }

        return $this->packingMaterial[0];
    }

    /**
     * @return null|TraceID
     */
    public function getTraceID(): ?TraceID
    {
        return $this->traceID;
    }

    /**
     * @return TraceID
     */
    public function getTraceIDWithCreate(): TraceID
    {
        $this->traceID ??= new TraceID();

        return $this->traceID;
    }

    /**
     * @param  null|TraceID $traceID
     * @return static
     */
    public function setTraceID(
        ?TraceID $traceID = null
    ): static {
        $this->traceID = $traceID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTraceID(): static
    {
        $this->traceID = null;

        return $this;
    }

    /**
     * @return null|array<ContainedPackage>
     */
    public function getContainedPackage(): ?array
    {
        return $this->containedPackage;
    }

    /**
     * @param  null|array<ContainedPackage> $containedPackage
     * @return static
     */
    public function setContainedPackage(
        ?array $containedPackage = null
    ): static {
        $this->containedPackage = $containedPackage;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetContainedPackage(): static
    {
        $this->containedPackage = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearContainedPackage(): static
    {
        $this->containedPackage = [];

        return $this;
    }

    /**
     * @return null|ContainedPackage
     */
    public function firstContainedPackage(): ?ContainedPackage
    {
        $containedPackage = $this->containedPackage ?? [];
        $containedPackage = reset($containedPackage);

        if (false === $containedPackage) {
            return null;
        }

        return $containedPackage;
    }

    /**
     * @return null|ContainedPackage
     */
    public function lastContainedPackage(): ?ContainedPackage
    {
        $containedPackage = $this->containedPackage ?? [];
        $containedPackage = end($containedPackage);

        if (false === $containedPackage) {
            return null;
        }

        return $containedPackage;
    }

    /**
     * @param  ContainedPackage $containedPackage
     * @return static
     */
    public function addToContainedPackage(
        ContainedPackage $containedPackage
    ): static {
        $this->containedPackage[] = $containedPackage;

        return $this;
    }

    /**
     * @return ContainedPackage
     */
    public function addToContainedPackageWithCreate(): ContainedPackage
    {
        $this->addToContainedPackage($containedPackage = new ContainedPackage());

        return $containedPackage;
    }

    /**
     * @param  ContainedPackage $containedPackage
     * @return static
     */
    public function addOnceToContainedPackage(
        ContainedPackage $containedPackage
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->containedPackage)) {
            $this->containedPackage = [];
        }

        $this->containedPackage[0] = $containedPackage;

        return $this;
    }

    /**
     * @return ContainedPackage
     */
    public function addOnceToContainedPackageWithCreate(): ContainedPackage
    {
        if (!InvoiceSuiteArrayUtils::is($this->containedPackage)) {
            $this->containedPackage = [];
        }

        if ([] === $this->containedPackage) {
            $this->addOnceToContainedPackage(new ContainedPackage());
        }

        return $this->containedPackage[0];
    }

    /**
     * @return null|ContainingTransportEquipment
     */
    public function getContainingTransportEquipment(): ?ContainingTransportEquipment
    {
        return $this->containingTransportEquipment;
    }

    /**
     * @return ContainingTransportEquipment
     */
    public function getContainingTransportEquipmentWithCreate(): ContainingTransportEquipment
    {
        $this->containingTransportEquipment ??= new ContainingTransportEquipment();

        return $this->containingTransportEquipment;
    }

    /**
     * @param  null|ContainingTransportEquipment $containingTransportEquipment
     * @return static
     */
    public function setContainingTransportEquipment(
        ?ContainingTransportEquipment $containingTransportEquipment = null,
    ): static {
        $this->containingTransportEquipment = $containingTransportEquipment;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetContainingTransportEquipment(): static
    {
        $this->containingTransportEquipment = null;

        return $this;
    }

    /**
     * @return null|array<GoodsItem>
     */
    public function getGoodsItem(): ?array
    {
        return $this->goodsItem;
    }

    /**
     * @param  null|array<GoodsItem> $goodsItem
     * @return static
     */
    public function setGoodsItem(
        ?array $goodsItem = null
    ): static {
        $this->goodsItem = $goodsItem;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetGoodsItem(): static
    {
        $this->goodsItem = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearGoodsItem(): static
    {
        $this->goodsItem = [];

        return $this;
    }

    /**
     * @return null|GoodsItem
     */
    public function firstGoodsItem(): ?GoodsItem
    {
        $goodsItem = $this->goodsItem ?? [];
        $goodsItem = reset($goodsItem);

        if (false === $goodsItem) {
            return null;
        }

        return $goodsItem;
    }

    /**
     * @return null|GoodsItem
     */
    public function lastGoodsItem(): ?GoodsItem
    {
        $goodsItem = $this->goodsItem ?? [];
        $goodsItem = end($goodsItem);

        if (false === $goodsItem) {
            return null;
        }

        return $goodsItem;
    }

    /**
     * @param  GoodsItem $goodsItem
     * @return static
     */
    public function addToGoodsItem(
        GoodsItem $goodsItem
    ): static {
        $this->goodsItem[] = $goodsItem;

        return $this;
    }

    /**
     * @return GoodsItem
     */
    public function addToGoodsItemWithCreate(): GoodsItem
    {
        $this->addToGoodsItem($goodsItem = new GoodsItem());

        return $goodsItem;
    }

    /**
     * @param  GoodsItem $goodsItem
     * @return static
     */
    public function addOnceToGoodsItem(
        GoodsItem $goodsItem
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->goodsItem)) {
            $this->goodsItem = [];
        }

        $this->goodsItem[0] = $goodsItem;

        return $this;
    }

    /**
     * @return GoodsItem
     */
    public function addOnceToGoodsItemWithCreate(): GoodsItem
    {
        if (!InvoiceSuiteArrayUtils::is($this->goodsItem)) {
            $this->goodsItem = [];
        }

        if ([] === $this->goodsItem) {
            $this->addOnceToGoodsItem(new GoodsItem());
        }

        return $this->goodsItem[0];
    }

    /**
     * @return null|array<MeasurementDimension>
     */
    public function getMeasurementDimension(): ?array
    {
        return $this->measurementDimension;
    }

    /**
     * @param  null|array<MeasurementDimension> $measurementDimension
     * @return static
     */
    public function setMeasurementDimension(
        ?array $measurementDimension = null
    ): static {
        $this->measurementDimension = $measurementDimension;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMeasurementDimension(): static
    {
        $this->measurementDimension = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearMeasurementDimension(): static
    {
        $this->measurementDimension = [];

        return $this;
    }

    /**
     * @return null|MeasurementDimension
     */
    public function firstMeasurementDimension(): ?MeasurementDimension
    {
        $measurementDimension = $this->measurementDimension ?? [];
        $measurementDimension = reset($measurementDimension);

        if (false === $measurementDimension) {
            return null;
        }

        return $measurementDimension;
    }

    /**
     * @return null|MeasurementDimension
     */
    public function lastMeasurementDimension(): ?MeasurementDimension
    {
        $measurementDimension = $this->measurementDimension ?? [];
        $measurementDimension = end($measurementDimension);

        if (false === $measurementDimension) {
            return null;
        }

        return $measurementDimension;
    }

    /**
     * @param  MeasurementDimension $measurementDimension
     * @return static
     */
    public function addToMeasurementDimension(
        MeasurementDimension $measurementDimension
    ): static {
        $this->measurementDimension[] = $measurementDimension;

        return $this;
    }

    /**
     * @return MeasurementDimension
     */
    public function addToMeasurementDimensionWithCreate(): MeasurementDimension
    {
        $this->addToMeasurementDimension($measurementDimension = new MeasurementDimension());

        return $measurementDimension;
    }

    /**
     * @param  MeasurementDimension $measurementDimension
     * @return static
     */
    public function addOnceToMeasurementDimension(
        MeasurementDimension $measurementDimension
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->measurementDimension)) {
            $this->measurementDimension = [];
        }

        $this->measurementDimension[0] = $measurementDimension;

        return $this;
    }

    /**
     * @return MeasurementDimension
     */
    public function addOnceToMeasurementDimensionWithCreate(): MeasurementDimension
    {
        if (!InvoiceSuiteArrayUtils::is($this->measurementDimension)) {
            $this->measurementDimension = [];
        }

        if ([] === $this->measurementDimension) {
            $this->addOnceToMeasurementDimension(new MeasurementDimension());
        }

        return $this->measurementDimension[0];
    }

    /**
     * @return null|array<DeliveryUnit>
     */
    public function getDeliveryUnit(): ?array
    {
        return $this->deliveryUnit;
    }

    /**
     * @param  null|array<DeliveryUnit> $deliveryUnit
     * @return static
     */
    public function setDeliveryUnit(
        ?array $deliveryUnit = null
    ): static {
        $this->deliveryUnit = $deliveryUnit;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDeliveryUnit(): static
    {
        $this->deliveryUnit = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearDeliveryUnit(): static
    {
        $this->deliveryUnit = [];

        return $this;
    }

    /**
     * @return null|DeliveryUnit
     */
    public function firstDeliveryUnit(): ?DeliveryUnit
    {
        $deliveryUnit = $this->deliveryUnit ?? [];
        $deliveryUnit = reset($deliveryUnit);

        if (false === $deliveryUnit) {
            return null;
        }

        return $deliveryUnit;
    }

    /**
     * @return null|DeliveryUnit
     */
    public function lastDeliveryUnit(): ?DeliveryUnit
    {
        $deliveryUnit = $this->deliveryUnit ?? [];
        $deliveryUnit = end($deliveryUnit);

        if (false === $deliveryUnit) {
            return null;
        }

        return $deliveryUnit;
    }

    /**
     * @param  DeliveryUnit $deliveryUnit
     * @return static
     */
    public function addToDeliveryUnit(
        DeliveryUnit $deliveryUnit
    ): static {
        $this->deliveryUnit[] = $deliveryUnit;

        return $this;
    }

    /**
     * @return DeliveryUnit
     */
    public function addToDeliveryUnitWithCreate(): DeliveryUnit
    {
        $this->addToDeliveryUnit($deliveryUnit = new DeliveryUnit());

        return $deliveryUnit;
    }

    /**
     * @param  DeliveryUnit $deliveryUnit
     * @return static
     */
    public function addOnceToDeliveryUnit(
        DeliveryUnit $deliveryUnit
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->deliveryUnit)) {
            $this->deliveryUnit = [];
        }

        $this->deliveryUnit[0] = $deliveryUnit;

        return $this;
    }

    /**
     * @return DeliveryUnit
     */
    public function addOnceToDeliveryUnitWithCreate(): DeliveryUnit
    {
        if (!InvoiceSuiteArrayUtils::is($this->deliveryUnit)) {
            $this->deliveryUnit = [];
        }

        if ([] === $this->deliveryUnit) {
            $this->addOnceToDeliveryUnit(new DeliveryUnit());
        }

        return $this->deliveryUnit[0];
    }

    /**
     * @return null|Delivery
     */
    public function getDelivery(): ?Delivery
    {
        return $this->delivery;
    }

    /**
     * @return Delivery
     */
    public function getDeliveryWithCreate(): Delivery
    {
        $this->delivery ??= new Delivery();

        return $this->delivery;
    }

    /**
     * @param  null|Delivery $delivery
     * @return static
     */
    public function setDelivery(
        ?Delivery $delivery = null
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
     * @return null|Pickup
     */
    public function getPickup(): ?Pickup
    {
        return $this->pickup;
    }

    /**
     * @return Pickup
     */
    public function getPickupWithCreate(): Pickup
    {
        $this->pickup ??= new Pickup();

        return $this->pickup;
    }

    /**
     * @param  null|Pickup $pickup
     * @return static
     */
    public function setPickup(
        ?Pickup $pickup = null
    ): static {
        $this->pickup = $pickup;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPickup(): static
    {
        $this->pickup = null;

        return $this;
    }

    /**
     * @return null|Despatch
     */
    public function getDespatch(): ?Despatch
    {
        return $this->despatch;
    }

    /**
     * @return Despatch
     */
    public function getDespatchWithCreate(): Despatch
    {
        $this->despatch ??= new Despatch();

        return $this->despatch;
    }

    /**
     * @param  null|Despatch $despatch
     * @return static
     */
    public function setDespatch(
        ?Despatch $despatch = null
    ): static {
        $this->despatch = $despatch;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDespatch(): static
    {
        $this->despatch = null;

        return $this;
    }
}
