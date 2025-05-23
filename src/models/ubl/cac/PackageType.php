<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\ID;
use horstoeko\invoicesuite\models\ubl\cbc\PackageLevelCode;
use horstoeko\invoicesuite\models\ubl\cbc\PackagingTypeCode;
use horstoeko\invoicesuite\models\ubl\cbc\PackingMaterial;
use horstoeko\invoicesuite\models\ubl\cbc\Quantity;
use horstoeko\invoicesuite\models\ubl\cbc\TraceID;

class PackageType
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
     * @var \horstoeko\invoicesuite\models\ubl\cbc\Quantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\Quantity")
     * @JMS\Expose
     * @JMS\SerializedName("Quantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getQuantity", setter="setQuantity")
     */
    private $quantity;

    /**
     * @var bool|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("ReturnableMaterialIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getReturnableMaterialIndicator", setter="setReturnableMaterialIndicator")
     */
    private $returnableMaterialIndicator;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\PackageLevelCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\PackageLevelCode")
     * @JMS\Expose
     * @JMS\SerializedName("PackageLevelCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPackageLevelCode", setter="setPackageLevelCode")
     */
    private $packageLevelCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\PackagingTypeCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\PackagingTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("PackagingTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPackagingTypeCode", setter="setPackagingTypeCode")
     */
    private $packagingTypeCode;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\PackingMaterial>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\PackingMaterial>")
     * @JMS\Expose
     * @JMS\SerializedName("PackingMaterial")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PackingMaterial", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getPackingMaterial", setter="setPackingMaterial")
     */
    private $packingMaterial;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\TraceID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\TraceID")
     * @JMS\Expose
     * @JMS\SerializedName("TraceID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTraceID", setter="setTraceID")
     */
    private $traceID;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\ContainedPackage>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\ContainedPackage>")
     * @JMS\Expose
     * @JMS\SerializedName("ContainedPackage")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ContainedPackage", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getContainedPackage", setter="setContainedPackage")
     */
    private $containedPackage;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\ContainingTransportEquipment|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\ContainingTransportEquipment")
     * @JMS\Expose
     * @JMS\SerializedName("ContainingTransportEquipment")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getContainingTransportEquipment", setter="setContainingTransportEquipment")
     */
    private $containingTransportEquipment;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\GoodsItem>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\GoodsItem>")
     * @JMS\Expose
     * @JMS\SerializedName("GoodsItem")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="GoodsItem", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getGoodsItem", setter="setGoodsItem")
     */
    private $goodsItem;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\MeasurementDimension>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\MeasurementDimension>")
     * @JMS\Expose
     * @JMS\SerializedName("MeasurementDimension")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="MeasurementDimension", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getMeasurementDimension", setter="setMeasurementDimension")
     */
    private $measurementDimension;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\DeliveryUnit>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\DeliveryUnit>")
     * @JMS\Expose
     * @JMS\SerializedName("DeliveryUnit")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="DeliveryUnit", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getDeliveryUnit", setter="setDeliveryUnit")
     */
    private $deliveryUnit;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\Delivery|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\Delivery")
     * @JMS\Expose
     * @JMS\SerializedName("Delivery")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDelivery", setter="setDelivery")
     */
    private $delivery;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\Pickup|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\Pickup")
     * @JMS\Expose
     * @JMS\SerializedName("Pickup")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPickup", setter="setPickup")
     */
    private $pickup;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\Despatch|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\Despatch")
     * @JMS\Expose
     * @JMS\SerializedName("Despatch")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDespatch", setter="setDespatch")
     */
    private $despatch;

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
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Quantity|null
     */
    public function getQuantity(): ?Quantity
    {
        return $this->quantity;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Quantity
     */
    public function getQuantityWithCreate(): Quantity
    {
        $this->quantity = is_null($this->quantity) ? new Quantity() : $this->quantity;

        return $this->quantity;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Quantity|null $quantity
     * @return self
     */
    public function setQuantity(?Quantity $quantity = null): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getReturnableMaterialIndicator(): ?bool
    {
        return $this->returnableMaterialIndicator;
    }

    /**
     * @param bool|null $returnableMaterialIndicator
     * @return self
     */
    public function setReturnableMaterialIndicator(?bool $returnableMaterialIndicator = null): self
    {
        $this->returnableMaterialIndicator = $returnableMaterialIndicator;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PackageLevelCode|null
     */
    public function getPackageLevelCode(): ?PackageLevelCode
    {
        return $this->packageLevelCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PackageLevelCode
     */
    public function getPackageLevelCodeWithCreate(): PackageLevelCode
    {
        $this->packageLevelCode = is_null($this->packageLevelCode) ? new PackageLevelCode() : $this->packageLevelCode;

        return $this->packageLevelCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\PackageLevelCode|null $packageLevelCode
     * @return self
     */
    public function setPackageLevelCode(?PackageLevelCode $packageLevelCode = null): self
    {
        $this->packageLevelCode = $packageLevelCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PackagingTypeCode|null
     */
    public function getPackagingTypeCode(): ?PackagingTypeCode
    {
        return $this->packagingTypeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PackagingTypeCode
     */
    public function getPackagingTypeCodeWithCreate(): PackagingTypeCode
    {
        $this->packagingTypeCode = is_null($this->packagingTypeCode) ? new PackagingTypeCode() : $this->packagingTypeCode;

        return $this->packagingTypeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\PackagingTypeCode|null $packagingTypeCode
     * @return self
     */
    public function setPackagingTypeCode(?PackagingTypeCode $packagingTypeCode = null): self
    {
        $this->packagingTypeCode = $packagingTypeCode;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\PackingMaterial>|null
     */
    public function getPackingMaterial(): ?array
    {
        return $this->packingMaterial;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\PackingMaterial>|null $packingMaterial
     * @return self
     */
    public function setPackingMaterial(?array $packingMaterial = null): self
    {
        $this->packingMaterial = $packingMaterial;

        return $this;
    }

    /**
     * @return self
     */
    public function clearPackingMaterial(): self
    {
        $this->packingMaterial = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\PackingMaterial $packingMaterial
     * @return self
     */
    public function addToPackingMaterial(PackingMaterial $packingMaterial): self
    {
        $this->packingMaterial[] = $packingMaterial;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PackingMaterial
     */
    public function addToPackingMaterialWithCreate(): PackingMaterial
    {
        $this->addTopackingMaterial($packingMaterial = new PackingMaterial());

        return $packingMaterial;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\PackingMaterial $packingMaterial
     * @return self
     */
    public function addOnceToPackingMaterial(PackingMaterial $packingMaterial): self
    {
        if (!is_array($this->packingMaterial)) {
            $this->packingMaterial = [];
        }

        $this->packingMaterial[0] = $packingMaterial;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PackingMaterial
     */
    public function addOnceToPackingMaterialWithCreate(): PackingMaterial
    {
        if (!is_array($this->packingMaterial)) {
            $this->packingMaterial = [];
        }

        if ($this->packingMaterial === []) {
            $this->addOnceTopackingMaterial(new PackingMaterial());
        }

        return $this->packingMaterial[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TraceID|null
     */
    public function getTraceID(): ?TraceID
    {
        return $this->traceID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TraceID
     */
    public function getTraceIDWithCreate(): TraceID
    {
        $this->traceID = is_null($this->traceID) ? new TraceID() : $this->traceID;

        return $this->traceID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\TraceID|null $traceID
     * @return self
     */
    public function setTraceID(?TraceID $traceID = null): self
    {
        $this->traceID = $traceID;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\ContainedPackage>|null
     */
    public function getContainedPackage(): ?array
    {
        return $this->containedPackage;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\ContainedPackage>|null $containedPackage
     * @return self
     */
    public function setContainedPackage(?array $containedPackage = null): self
    {
        $this->containedPackage = $containedPackage;

        return $this;
    }

    /**
     * @return self
     */
    public function clearContainedPackage(): self
    {
        $this->containedPackage = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ContainedPackage $containedPackage
     * @return self
     */
    public function addToContainedPackage(ContainedPackage $containedPackage): self
    {
        $this->containedPackage[] = $containedPackage;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ContainedPackage
     */
    public function addToContainedPackageWithCreate(): ContainedPackage
    {
        $this->addTocontainedPackage($containedPackage = new ContainedPackage());

        return $containedPackage;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ContainedPackage $containedPackage
     * @return self
     */
    public function addOnceToContainedPackage(ContainedPackage $containedPackage): self
    {
        if (!is_array($this->containedPackage)) {
            $this->containedPackage = [];
        }

        $this->containedPackage[0] = $containedPackage;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ContainedPackage
     */
    public function addOnceToContainedPackageWithCreate(): ContainedPackage
    {
        if (!is_array($this->containedPackage)) {
            $this->containedPackage = [];
        }

        if ($this->containedPackage === []) {
            $this->addOnceTocontainedPackage(new ContainedPackage());
        }

        return $this->containedPackage[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ContainingTransportEquipment|null
     */
    public function getContainingTransportEquipment(): ?ContainingTransportEquipment
    {
        return $this->containingTransportEquipment;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ContainingTransportEquipment
     */
    public function getContainingTransportEquipmentWithCreate(): ContainingTransportEquipment
    {
        $this->containingTransportEquipment = is_null($this->containingTransportEquipment) ? new ContainingTransportEquipment() : $this->containingTransportEquipment;

        return $this->containingTransportEquipment;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ContainingTransportEquipment|null $containingTransportEquipment
     * @return self
     */
    public function setContainingTransportEquipment(
        ?ContainingTransportEquipment $containingTransportEquipment = null,
    ): self {
        $this->containingTransportEquipment = $containingTransportEquipment;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\GoodsItem>|null
     */
    public function getGoodsItem(): ?array
    {
        return $this->goodsItem;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\GoodsItem>|null $goodsItem
     * @return self
     */
    public function setGoodsItem(?array $goodsItem = null): self
    {
        $this->goodsItem = $goodsItem;

        return $this;
    }

    /**
     * @return self
     */
    public function clearGoodsItem(): self
    {
        $this->goodsItem = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\GoodsItem $goodsItem
     * @return self
     */
    public function addToGoodsItem(GoodsItem $goodsItem): self
    {
        $this->goodsItem[] = $goodsItem;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\GoodsItem
     */
    public function addToGoodsItemWithCreate(): GoodsItem
    {
        $this->addTogoodsItem($goodsItem = new GoodsItem());

        return $goodsItem;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\GoodsItem $goodsItem
     * @return self
     */
    public function addOnceToGoodsItem(GoodsItem $goodsItem): self
    {
        if (!is_array($this->goodsItem)) {
            $this->goodsItem = [];
        }

        $this->goodsItem[0] = $goodsItem;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\GoodsItem
     */
    public function addOnceToGoodsItemWithCreate(): GoodsItem
    {
        if (!is_array($this->goodsItem)) {
            $this->goodsItem = [];
        }

        if ($this->goodsItem === []) {
            $this->addOnceTogoodsItem(new GoodsItem());
        }

        return $this->goodsItem[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\MeasurementDimension>|null
     */
    public function getMeasurementDimension(): ?array
    {
        return $this->measurementDimension;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\MeasurementDimension>|null $measurementDimension
     * @return self
     */
    public function setMeasurementDimension(?array $measurementDimension = null): self
    {
        $this->measurementDimension = $measurementDimension;

        return $this;
    }

    /**
     * @return self
     */
    public function clearMeasurementDimension(): self
    {
        $this->measurementDimension = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\MeasurementDimension $measurementDimension
     * @return self
     */
    public function addToMeasurementDimension(MeasurementDimension $measurementDimension): self
    {
        $this->measurementDimension[] = $measurementDimension;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\MeasurementDimension
     */
    public function addToMeasurementDimensionWithCreate(): MeasurementDimension
    {
        $this->addTomeasurementDimension($measurementDimension = new MeasurementDimension());

        return $measurementDimension;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\MeasurementDimension $measurementDimension
     * @return self
     */
    public function addOnceToMeasurementDimension(MeasurementDimension $measurementDimension): self
    {
        if (!is_array($this->measurementDimension)) {
            $this->measurementDimension = [];
        }

        $this->measurementDimension[0] = $measurementDimension;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\MeasurementDimension
     */
    public function addOnceToMeasurementDimensionWithCreate(): MeasurementDimension
    {
        if (!is_array($this->measurementDimension)) {
            $this->measurementDimension = [];
        }

        if ($this->measurementDimension === []) {
            $this->addOnceTomeasurementDimension(new MeasurementDimension());
        }

        return $this->measurementDimension[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\DeliveryUnit>|null
     */
    public function getDeliveryUnit(): ?array
    {
        return $this->deliveryUnit;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\DeliveryUnit>|null $deliveryUnit
     * @return self
     */
    public function setDeliveryUnit(?array $deliveryUnit = null): self
    {
        $this->deliveryUnit = $deliveryUnit;

        return $this;
    }

    /**
     * @return self
     */
    public function clearDeliveryUnit(): self
    {
        $this->deliveryUnit = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\DeliveryUnit $deliveryUnit
     * @return self
     */
    public function addToDeliveryUnit(DeliveryUnit $deliveryUnit): self
    {
        $this->deliveryUnit[] = $deliveryUnit;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\DeliveryUnit
     */
    public function addToDeliveryUnitWithCreate(): DeliveryUnit
    {
        $this->addTodeliveryUnit($deliveryUnit = new DeliveryUnit());

        return $deliveryUnit;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\DeliveryUnit $deliveryUnit
     * @return self
     */
    public function addOnceToDeliveryUnit(DeliveryUnit $deliveryUnit): self
    {
        if (!is_array($this->deliveryUnit)) {
            $this->deliveryUnit = [];
        }

        $this->deliveryUnit[0] = $deliveryUnit;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\DeliveryUnit
     */
    public function addOnceToDeliveryUnitWithCreate(): DeliveryUnit
    {
        if (!is_array($this->deliveryUnit)) {
            $this->deliveryUnit = [];
        }

        if ($this->deliveryUnit === []) {
            $this->addOnceTodeliveryUnit(new DeliveryUnit());
        }

        return $this->deliveryUnit[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Delivery|null
     */
    public function getDelivery(): ?Delivery
    {
        return $this->delivery;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Delivery
     */
    public function getDeliveryWithCreate(): Delivery
    {
        $this->delivery = is_null($this->delivery) ? new Delivery() : $this->delivery;

        return $this->delivery;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Delivery|null $delivery
     * @return self
     */
    public function setDelivery(?Delivery $delivery = null): self
    {
        $this->delivery = $delivery;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Pickup|null
     */
    public function getPickup(): ?Pickup
    {
        return $this->pickup;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Pickup
     */
    public function getPickupWithCreate(): Pickup
    {
        $this->pickup = is_null($this->pickup) ? new Pickup() : $this->pickup;

        return $this->pickup;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Pickup|null $pickup
     * @return self
     */
    public function setPickup(?Pickup $pickup = null): self
    {
        $this->pickup = $pickup;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Despatch|null
     */
    public function getDespatch(): ?Despatch
    {
        return $this->despatch;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Despatch
     */
    public function getDespatchWithCreate(): Despatch
    {
        $this->despatch = is_null($this->despatch) ? new Despatch() : $this->despatch;

        return $this->despatch;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Despatch|null $despatch
     * @return self
     */
    public function setDespatch(?Despatch $despatch = null): self
    {
        $this->despatch = $despatch;

        return $this;
    }
}
