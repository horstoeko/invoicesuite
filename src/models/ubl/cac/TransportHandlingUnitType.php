<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\DamageRemarks;
use horstoeko\invoicesuite\models\ubl\cbc\HandlingCode;
use horstoeko\invoicesuite\models\ubl\cbc\HandlingInstructions;
use horstoeko\invoicesuite\models\ubl\cbc\ID;
use horstoeko\invoicesuite\models\ubl\cbc\ShippingMarks;
use horstoeko\invoicesuite\models\ubl\cbc\TotalGoodsItemQuantity;
use horstoeko\invoicesuite\models\ubl\cbc\TotalPackageQuantity;
use horstoeko\invoicesuite\models\ubl\cbc\TraceID;
use horstoeko\invoicesuite\models\ubl\cbc\TransportHandlingUnitTypeCode;

class TransportHandlingUnitType
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
     * @var \horstoeko\invoicesuite\models\ubl\cbc\TransportHandlingUnitTypeCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\TransportHandlingUnitTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("TransportHandlingUnitTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTransportHandlingUnitTypeCode", setter="setTransportHandlingUnitTypeCode")
     */
    private $transportHandlingUnitTypeCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\HandlingCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\HandlingCode")
     * @JMS\Expose
     * @JMS\SerializedName("HandlingCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getHandlingCode", setter="setHandlingCode")
     */
    private $handlingCode;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\HandlingInstructions>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\HandlingInstructions>")
     * @JMS\Expose
     * @JMS\SerializedName("HandlingInstructions")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="HandlingInstructions", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getHandlingInstructions", setter="setHandlingInstructions")
     */
    private $handlingInstructions;

    /**
     * @var bool|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("HazardousRiskIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getHazardousRiskIndicator", setter="setHazardousRiskIndicator")
     */
    private $hazardousRiskIndicator;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\TotalGoodsItemQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\TotalGoodsItemQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("TotalGoodsItemQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTotalGoodsItemQuantity", setter="setTotalGoodsItemQuantity")
     */
    private $totalGoodsItemQuantity;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\TotalPackageQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\TotalPackageQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("TotalPackageQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTotalPackageQuantity", setter="setTotalPackageQuantity")
     */
    private $totalPackageQuantity;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\DamageRemarks>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\DamageRemarks>")
     * @JMS\Expose
     * @JMS\SerializedName("DamageRemarks")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="DamageRemarks", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getDamageRemarks", setter="setDamageRemarks")
     */
    private $damageRemarks;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\ShippingMarks>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\ShippingMarks>")
     * @JMS\Expose
     * @JMS\SerializedName("ShippingMarks")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ShippingMarks", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getShippingMarks", setter="setShippingMarks")
     */
    private $shippingMarks;

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
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\HandlingUnitDespatchLine>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\HandlingUnitDespatchLine>")
     * @JMS\Expose
     * @JMS\SerializedName("HandlingUnitDespatchLine")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="HandlingUnitDespatchLine", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getHandlingUnitDespatchLine", setter="setHandlingUnitDespatchLine")
     */
    private $handlingUnitDespatchLine;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\ActualPackage>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\ActualPackage>")
     * @JMS\Expose
     * @JMS\SerializedName("ActualPackage")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ActualPackage", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getActualPackage", setter="setActualPackage")
     */
    private $actualPackage;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\ReceivedHandlingUnitReceiptLine>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\ReceivedHandlingUnitReceiptLine>")
     * @JMS\Expose
     * @JMS\SerializedName("ReceivedHandlingUnitReceiptLine")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ReceivedHandlingUnitReceiptLine", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getReceivedHandlingUnitReceiptLine", setter="setReceivedHandlingUnitReceiptLine")
     */
    private $receivedHandlingUnitReceiptLine;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\TransportEquipment>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\TransportEquipment>")
     * @JMS\Expose
     * @JMS\SerializedName("TransportEquipment")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TransportEquipment", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getTransportEquipment", setter="setTransportEquipment")
     */
    private $transportEquipment;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\TransportMeans>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\TransportMeans>")
     * @JMS\Expose
     * @JMS\SerializedName("TransportMeans")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TransportMeans", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getTransportMeans", setter="setTransportMeans")
     */
    private $transportMeans;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\HazardousGoodsTransit>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\HazardousGoodsTransit>")
     * @JMS\Expose
     * @JMS\SerializedName("HazardousGoodsTransit")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="HazardousGoodsTransit", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getHazardousGoodsTransit", setter="setHazardousGoodsTransit")
     */
    private $hazardousGoodsTransit;

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
     * @var \horstoeko\invoicesuite\models\ubl\cac\MinimumTemperature|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\MinimumTemperature")
     * @JMS\Expose
     * @JMS\SerializedName("MinimumTemperature")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMinimumTemperature", setter="setMinimumTemperature")
     */
    private $minimumTemperature;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\MaximumTemperature|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\MaximumTemperature")
     * @JMS\Expose
     * @JMS\SerializedName("MaximumTemperature")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMaximumTemperature", setter="setMaximumTemperature")
     */
    private $maximumTemperature;

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
     * @var \horstoeko\invoicesuite\models\ubl\cac\FloorSpaceMeasurementDimension|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\FloorSpaceMeasurementDimension")
     * @JMS\Expose
     * @JMS\SerializedName("FloorSpaceMeasurementDimension")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getFloorSpaceMeasurementDimension", setter="setFloorSpaceMeasurementDimension")
     */
    private $floorSpaceMeasurementDimension;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\PalletSpaceMeasurementDimension|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\PalletSpaceMeasurementDimension")
     * @JMS\Expose
     * @JMS\SerializedName("PalletSpaceMeasurementDimension")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPalletSpaceMeasurementDimension", setter="setPalletSpaceMeasurementDimension")
     */
    private $palletSpaceMeasurementDimension;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\ShipmentDocumentReference>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\ShipmentDocumentReference>")
     * @JMS\Expose
     * @JMS\SerializedName("ShipmentDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ShipmentDocumentReference", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getShipmentDocumentReference", setter="setShipmentDocumentReference")
     */
    private $shipmentDocumentReference;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\Status>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\Status>")
     * @JMS\Expose
     * @JMS\SerializedName("Status")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Status", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getStatus", setter="setStatus")
     */
    private $status;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\CustomsDeclaration>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\CustomsDeclaration>")
     * @JMS\Expose
     * @JMS\SerializedName("CustomsDeclaration")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="CustomsDeclaration", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getCustomsDeclaration", setter="setCustomsDeclaration")
     */
    private $customsDeclaration;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\ReferencedShipment>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\ReferencedShipment>")
     * @JMS\Expose
     * @JMS\SerializedName("ReferencedShipment")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ReferencedShipment", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getReferencedShipment", setter="setReferencedShipment")
     */
    private $referencedShipment;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\Package>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\Package>")
     * @JMS\Expose
     * @JMS\SerializedName("Package")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Package", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getPackage", setter="setPackage")
     */
    private $package;

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
     * @return self
     */
    public function unsetID(): self
    {
        $this->iD = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TransportHandlingUnitTypeCode|null
     */
    public function getTransportHandlingUnitTypeCode(): ?TransportHandlingUnitTypeCode
    {
        return $this->transportHandlingUnitTypeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TransportHandlingUnitTypeCode
     */
    public function getTransportHandlingUnitTypeCodeWithCreate(): TransportHandlingUnitTypeCode
    {
        $this->transportHandlingUnitTypeCode = is_null($this->transportHandlingUnitTypeCode) ? new TransportHandlingUnitTypeCode() : $this->transportHandlingUnitTypeCode;

        return $this->transportHandlingUnitTypeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\TransportHandlingUnitTypeCode|null $transportHandlingUnitTypeCode
     * @return self
     */
    public function setTransportHandlingUnitTypeCode(
        ?TransportHandlingUnitTypeCode $transportHandlingUnitTypeCode = null,
    ): self {
        $this->transportHandlingUnitTypeCode = $transportHandlingUnitTypeCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTransportHandlingUnitTypeCode(): self
    {
        $this->transportHandlingUnitTypeCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\HandlingCode|null
     */
    public function getHandlingCode(): ?HandlingCode
    {
        return $this->handlingCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\HandlingCode
     */
    public function getHandlingCodeWithCreate(): HandlingCode
    {
        $this->handlingCode = is_null($this->handlingCode) ? new HandlingCode() : $this->handlingCode;

        return $this->handlingCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\HandlingCode|null $handlingCode
     * @return self
     */
    public function setHandlingCode(?HandlingCode $handlingCode = null): self
    {
        $this->handlingCode = $handlingCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetHandlingCode(): self
    {
        $this->handlingCode = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\HandlingInstructions>|null
     */
    public function getHandlingInstructions(): ?array
    {
        return $this->handlingInstructions;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\HandlingInstructions>|null $handlingInstructions
     * @return self
     */
    public function setHandlingInstructions(?array $handlingInstructions = null): self
    {
        $this->handlingInstructions = $handlingInstructions;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetHandlingInstructions(): self
    {
        $this->handlingInstructions = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearHandlingInstructions(): self
    {
        $this->handlingInstructions = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\HandlingInstructions $handlingInstructions
     * @return self
     */
    public function addToHandlingInstructions(HandlingInstructions $handlingInstructions): self
    {
        $this->handlingInstructions[] = $handlingInstructions;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\HandlingInstructions
     */
    public function addToHandlingInstructionsWithCreate(): HandlingInstructions
    {
        $this->addTohandlingInstructions($handlingInstructions = new HandlingInstructions());

        return $handlingInstructions;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\HandlingInstructions $handlingInstructions
     * @return self
     */
    public function addOnceToHandlingInstructions(HandlingInstructions $handlingInstructions): self
    {
        if (!is_array($this->handlingInstructions)) {
            $this->handlingInstructions = [];
        }

        $this->handlingInstructions[0] = $handlingInstructions;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\HandlingInstructions
     */
    public function addOnceToHandlingInstructionsWithCreate(): HandlingInstructions
    {
        if (!is_array($this->handlingInstructions)) {
            $this->handlingInstructions = [];
        }

        if ($this->handlingInstructions === []) {
            $this->addOnceTohandlingInstructions(new HandlingInstructions());
        }

        return $this->handlingInstructions[0];
    }

    /**
     * @return bool|null
     */
    public function getHazardousRiskIndicator(): ?bool
    {
        return $this->hazardousRiskIndicator;
    }

    /**
     * @param bool|null $hazardousRiskIndicator
     * @return self
     */
    public function setHazardousRiskIndicator(?bool $hazardousRiskIndicator = null): self
    {
        $this->hazardousRiskIndicator = $hazardousRiskIndicator;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetHazardousRiskIndicator(): self
    {
        $this->hazardousRiskIndicator = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TotalGoodsItemQuantity|null
     */
    public function getTotalGoodsItemQuantity(): ?TotalGoodsItemQuantity
    {
        return $this->totalGoodsItemQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TotalGoodsItemQuantity
     */
    public function getTotalGoodsItemQuantityWithCreate(): TotalGoodsItemQuantity
    {
        $this->totalGoodsItemQuantity = is_null($this->totalGoodsItemQuantity) ? new TotalGoodsItemQuantity() : $this->totalGoodsItemQuantity;

        return $this->totalGoodsItemQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\TotalGoodsItemQuantity|null $totalGoodsItemQuantity
     * @return self
     */
    public function setTotalGoodsItemQuantity(?TotalGoodsItemQuantity $totalGoodsItemQuantity = null): self
    {
        $this->totalGoodsItemQuantity = $totalGoodsItemQuantity;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTotalGoodsItemQuantity(): self
    {
        $this->totalGoodsItemQuantity = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TotalPackageQuantity|null
     */
    public function getTotalPackageQuantity(): ?TotalPackageQuantity
    {
        return $this->totalPackageQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TotalPackageQuantity
     */
    public function getTotalPackageQuantityWithCreate(): TotalPackageQuantity
    {
        $this->totalPackageQuantity = is_null($this->totalPackageQuantity) ? new TotalPackageQuantity() : $this->totalPackageQuantity;

        return $this->totalPackageQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\TotalPackageQuantity|null $totalPackageQuantity
     * @return self
     */
    public function setTotalPackageQuantity(?TotalPackageQuantity $totalPackageQuantity = null): self
    {
        $this->totalPackageQuantity = $totalPackageQuantity;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTotalPackageQuantity(): self
    {
        $this->totalPackageQuantity = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\DamageRemarks>|null
     */
    public function getDamageRemarks(): ?array
    {
        return $this->damageRemarks;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\DamageRemarks>|null $damageRemarks
     * @return self
     */
    public function setDamageRemarks(?array $damageRemarks = null): self
    {
        $this->damageRemarks = $damageRemarks;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDamageRemarks(): self
    {
        $this->damageRemarks = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearDamageRemarks(): self
    {
        $this->damageRemarks = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\DamageRemarks $damageRemarks
     * @return self
     */
    public function addToDamageRemarks(DamageRemarks $damageRemarks): self
    {
        $this->damageRemarks[] = $damageRemarks;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\DamageRemarks
     */
    public function addToDamageRemarksWithCreate(): DamageRemarks
    {
        $this->addTodamageRemarks($damageRemarks = new DamageRemarks());

        return $damageRemarks;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\DamageRemarks $damageRemarks
     * @return self
     */
    public function addOnceToDamageRemarks(DamageRemarks $damageRemarks): self
    {
        if (!is_array($this->damageRemarks)) {
            $this->damageRemarks = [];
        }

        $this->damageRemarks[0] = $damageRemarks;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\DamageRemarks
     */
    public function addOnceToDamageRemarksWithCreate(): DamageRemarks
    {
        if (!is_array($this->damageRemarks)) {
            $this->damageRemarks = [];
        }

        if ($this->damageRemarks === []) {
            $this->addOnceTodamageRemarks(new DamageRemarks());
        }

        return $this->damageRemarks[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\ShippingMarks>|null
     */
    public function getShippingMarks(): ?array
    {
        return $this->shippingMarks;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\ShippingMarks>|null $shippingMarks
     * @return self
     */
    public function setShippingMarks(?array $shippingMarks = null): self
    {
        $this->shippingMarks = $shippingMarks;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetShippingMarks(): self
    {
        $this->shippingMarks = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearShippingMarks(): self
    {
        $this->shippingMarks = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ShippingMarks $shippingMarks
     * @return self
     */
    public function addToShippingMarks(ShippingMarks $shippingMarks): self
    {
        $this->shippingMarks[] = $shippingMarks;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ShippingMarks
     */
    public function addToShippingMarksWithCreate(): ShippingMarks
    {
        $this->addToshippingMarks($shippingMarks = new ShippingMarks());

        return $shippingMarks;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ShippingMarks $shippingMarks
     * @return self
     */
    public function addOnceToShippingMarks(ShippingMarks $shippingMarks): self
    {
        if (!is_array($this->shippingMarks)) {
            $this->shippingMarks = [];
        }

        $this->shippingMarks[0] = $shippingMarks;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ShippingMarks
     */
    public function addOnceToShippingMarksWithCreate(): ShippingMarks
    {
        if (!is_array($this->shippingMarks)) {
            $this->shippingMarks = [];
        }

        if ($this->shippingMarks === []) {
            $this->addOnceToshippingMarks(new ShippingMarks());
        }

        return $this->shippingMarks[0];
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
     * @return self
     */
    public function unsetTraceID(): self
    {
        $this->traceID = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\HandlingUnitDespatchLine>|null
     */
    public function getHandlingUnitDespatchLine(): ?array
    {
        return $this->handlingUnitDespatchLine;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\HandlingUnitDespatchLine>|null $handlingUnitDespatchLine
     * @return self
     */
    public function setHandlingUnitDespatchLine(?array $handlingUnitDespatchLine = null): self
    {
        $this->handlingUnitDespatchLine = $handlingUnitDespatchLine;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetHandlingUnitDespatchLine(): self
    {
        $this->handlingUnitDespatchLine = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearHandlingUnitDespatchLine(): self
    {
        $this->handlingUnitDespatchLine = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\HandlingUnitDespatchLine $handlingUnitDespatchLine
     * @return self
     */
    public function addToHandlingUnitDespatchLine(HandlingUnitDespatchLine $handlingUnitDespatchLine): self
    {
        $this->handlingUnitDespatchLine[] = $handlingUnitDespatchLine;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\HandlingUnitDespatchLine
     */
    public function addToHandlingUnitDespatchLineWithCreate(): HandlingUnitDespatchLine
    {
        $this->addTohandlingUnitDespatchLine($handlingUnitDespatchLine = new HandlingUnitDespatchLine());

        return $handlingUnitDespatchLine;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\HandlingUnitDespatchLine $handlingUnitDespatchLine
     * @return self
     */
    public function addOnceToHandlingUnitDespatchLine(HandlingUnitDespatchLine $handlingUnitDespatchLine): self
    {
        if (!is_array($this->handlingUnitDespatchLine)) {
            $this->handlingUnitDespatchLine = [];
        }

        $this->handlingUnitDespatchLine[0] = $handlingUnitDespatchLine;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\HandlingUnitDespatchLine
     */
    public function addOnceToHandlingUnitDespatchLineWithCreate(): HandlingUnitDespatchLine
    {
        if (!is_array($this->handlingUnitDespatchLine)) {
            $this->handlingUnitDespatchLine = [];
        }

        if ($this->handlingUnitDespatchLine === []) {
            $this->addOnceTohandlingUnitDespatchLine(new HandlingUnitDespatchLine());
        }

        return $this->handlingUnitDespatchLine[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\ActualPackage>|null
     */
    public function getActualPackage(): ?array
    {
        return $this->actualPackage;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\ActualPackage>|null $actualPackage
     * @return self
     */
    public function setActualPackage(?array $actualPackage = null): self
    {
        $this->actualPackage = $actualPackage;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetActualPackage(): self
    {
        $this->actualPackage = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearActualPackage(): self
    {
        $this->actualPackage = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ActualPackage $actualPackage
     * @return self
     */
    public function addToActualPackage(ActualPackage $actualPackage): self
    {
        $this->actualPackage[] = $actualPackage;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ActualPackage
     */
    public function addToActualPackageWithCreate(): ActualPackage
    {
        $this->addToactualPackage($actualPackage = new ActualPackage());

        return $actualPackage;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ActualPackage $actualPackage
     * @return self
     */
    public function addOnceToActualPackage(ActualPackage $actualPackage): self
    {
        if (!is_array($this->actualPackage)) {
            $this->actualPackage = [];
        }

        $this->actualPackage[0] = $actualPackage;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ActualPackage
     */
    public function addOnceToActualPackageWithCreate(): ActualPackage
    {
        if (!is_array($this->actualPackage)) {
            $this->actualPackage = [];
        }

        if ($this->actualPackage === []) {
            $this->addOnceToactualPackage(new ActualPackage());
        }

        return $this->actualPackage[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\ReceivedHandlingUnitReceiptLine>|null
     */
    public function getReceivedHandlingUnitReceiptLine(): ?array
    {
        return $this->receivedHandlingUnitReceiptLine;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\ReceivedHandlingUnitReceiptLine>|null $receivedHandlingUnitReceiptLine
     * @return self
     */
    public function setReceivedHandlingUnitReceiptLine(?array $receivedHandlingUnitReceiptLine = null): self
    {
        $this->receivedHandlingUnitReceiptLine = $receivedHandlingUnitReceiptLine;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetReceivedHandlingUnitReceiptLine(): self
    {
        $this->receivedHandlingUnitReceiptLine = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearReceivedHandlingUnitReceiptLine(): self
    {
        $this->receivedHandlingUnitReceiptLine = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ReceivedHandlingUnitReceiptLine $receivedHandlingUnitReceiptLine
     * @return self
     */
    public function addToReceivedHandlingUnitReceiptLine(
        ReceivedHandlingUnitReceiptLine $receivedHandlingUnitReceiptLine,
    ): self {
        $this->receivedHandlingUnitReceiptLine[] = $receivedHandlingUnitReceiptLine;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ReceivedHandlingUnitReceiptLine
     */
    public function addToReceivedHandlingUnitReceiptLineWithCreate(): ReceivedHandlingUnitReceiptLine
    {
        $this->addToreceivedHandlingUnitReceiptLine($receivedHandlingUnitReceiptLine = new ReceivedHandlingUnitReceiptLine());

        return $receivedHandlingUnitReceiptLine;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ReceivedHandlingUnitReceiptLine $receivedHandlingUnitReceiptLine
     * @return self
     */
    public function addOnceToReceivedHandlingUnitReceiptLine(
        ReceivedHandlingUnitReceiptLine $receivedHandlingUnitReceiptLine,
    ): self {
        if (!is_array($this->receivedHandlingUnitReceiptLine)) {
            $this->receivedHandlingUnitReceiptLine = [];
        }

        $this->receivedHandlingUnitReceiptLine[0] = $receivedHandlingUnitReceiptLine;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ReceivedHandlingUnitReceiptLine
     */
    public function addOnceToReceivedHandlingUnitReceiptLineWithCreate(): ReceivedHandlingUnitReceiptLine
    {
        if (!is_array($this->receivedHandlingUnitReceiptLine)) {
            $this->receivedHandlingUnitReceiptLine = [];
        }

        if ($this->receivedHandlingUnitReceiptLine === []) {
            $this->addOnceToreceivedHandlingUnitReceiptLine(new ReceivedHandlingUnitReceiptLine());
        }

        return $this->receivedHandlingUnitReceiptLine[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\TransportEquipment>|null
     */
    public function getTransportEquipment(): ?array
    {
        return $this->transportEquipment;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\TransportEquipment>|null $transportEquipment
     * @return self
     */
    public function setTransportEquipment(?array $transportEquipment = null): self
    {
        $this->transportEquipment = $transportEquipment;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTransportEquipment(): self
    {
        $this->transportEquipment = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearTransportEquipment(): self
    {
        $this->transportEquipment = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\TransportEquipment $transportEquipment
     * @return self
     */
    public function addToTransportEquipment(TransportEquipment $transportEquipment): self
    {
        $this->transportEquipment[] = $transportEquipment;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TransportEquipment
     */
    public function addToTransportEquipmentWithCreate(): TransportEquipment
    {
        $this->addTotransportEquipment($transportEquipment = new TransportEquipment());

        return $transportEquipment;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\TransportEquipment $transportEquipment
     * @return self
     */
    public function addOnceToTransportEquipment(TransportEquipment $transportEquipment): self
    {
        if (!is_array($this->transportEquipment)) {
            $this->transportEquipment = [];
        }

        $this->transportEquipment[0] = $transportEquipment;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TransportEquipment
     */
    public function addOnceToTransportEquipmentWithCreate(): TransportEquipment
    {
        if (!is_array($this->transportEquipment)) {
            $this->transportEquipment = [];
        }

        if ($this->transportEquipment === []) {
            $this->addOnceTotransportEquipment(new TransportEquipment());
        }

        return $this->transportEquipment[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\TransportMeans>|null
     */
    public function getTransportMeans(): ?array
    {
        return $this->transportMeans;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\TransportMeans>|null $transportMeans
     * @return self
     */
    public function setTransportMeans(?array $transportMeans = null): self
    {
        $this->transportMeans = $transportMeans;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTransportMeans(): self
    {
        $this->transportMeans = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearTransportMeans(): self
    {
        $this->transportMeans = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\TransportMeans $transportMeans
     * @return self
     */
    public function addToTransportMeans(TransportMeans $transportMeans): self
    {
        $this->transportMeans[] = $transportMeans;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TransportMeans
     */
    public function addToTransportMeansWithCreate(): TransportMeans
    {
        $this->addTotransportMeans($transportMeans = new TransportMeans());

        return $transportMeans;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\TransportMeans $transportMeans
     * @return self
     */
    public function addOnceToTransportMeans(TransportMeans $transportMeans): self
    {
        if (!is_array($this->transportMeans)) {
            $this->transportMeans = [];
        }

        $this->transportMeans[0] = $transportMeans;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TransportMeans
     */
    public function addOnceToTransportMeansWithCreate(): TransportMeans
    {
        if (!is_array($this->transportMeans)) {
            $this->transportMeans = [];
        }

        if ($this->transportMeans === []) {
            $this->addOnceTotransportMeans(new TransportMeans());
        }

        return $this->transportMeans[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\HazardousGoodsTransit>|null
     */
    public function getHazardousGoodsTransit(): ?array
    {
        return $this->hazardousGoodsTransit;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\HazardousGoodsTransit>|null $hazardousGoodsTransit
     * @return self
     */
    public function setHazardousGoodsTransit(?array $hazardousGoodsTransit = null): self
    {
        $this->hazardousGoodsTransit = $hazardousGoodsTransit;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetHazardousGoodsTransit(): self
    {
        $this->hazardousGoodsTransit = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearHazardousGoodsTransit(): self
    {
        $this->hazardousGoodsTransit = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\HazardousGoodsTransit $hazardousGoodsTransit
     * @return self
     */
    public function addToHazardousGoodsTransit(HazardousGoodsTransit $hazardousGoodsTransit): self
    {
        $this->hazardousGoodsTransit[] = $hazardousGoodsTransit;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\HazardousGoodsTransit
     */
    public function addToHazardousGoodsTransitWithCreate(): HazardousGoodsTransit
    {
        $this->addTohazardousGoodsTransit($hazardousGoodsTransit = new HazardousGoodsTransit());

        return $hazardousGoodsTransit;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\HazardousGoodsTransit $hazardousGoodsTransit
     * @return self
     */
    public function addOnceToHazardousGoodsTransit(HazardousGoodsTransit $hazardousGoodsTransit): self
    {
        if (!is_array($this->hazardousGoodsTransit)) {
            $this->hazardousGoodsTransit = [];
        }

        $this->hazardousGoodsTransit[0] = $hazardousGoodsTransit;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\HazardousGoodsTransit
     */
    public function addOnceToHazardousGoodsTransitWithCreate(): HazardousGoodsTransit
    {
        if (!is_array($this->hazardousGoodsTransit)) {
            $this->hazardousGoodsTransit = [];
        }

        if ($this->hazardousGoodsTransit === []) {
            $this->addOnceTohazardousGoodsTransit(new HazardousGoodsTransit());
        }

        return $this->hazardousGoodsTransit[0];
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
    public function unsetMeasurementDimension(): self
    {
        $this->measurementDimension = null;

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
     * @return \horstoeko\invoicesuite\models\ubl\cac\MinimumTemperature|null
     */
    public function getMinimumTemperature(): ?MinimumTemperature
    {
        return $this->minimumTemperature;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\MinimumTemperature
     */
    public function getMinimumTemperatureWithCreate(): MinimumTemperature
    {
        $this->minimumTemperature = is_null($this->minimumTemperature) ? new MinimumTemperature() : $this->minimumTemperature;

        return $this->minimumTemperature;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\MinimumTemperature|null $minimumTemperature
     * @return self
     */
    public function setMinimumTemperature(?MinimumTemperature $minimumTemperature = null): self
    {
        $this->minimumTemperature = $minimumTemperature;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetMinimumTemperature(): self
    {
        $this->minimumTemperature = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\MaximumTemperature|null
     */
    public function getMaximumTemperature(): ?MaximumTemperature
    {
        return $this->maximumTemperature;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\MaximumTemperature
     */
    public function getMaximumTemperatureWithCreate(): MaximumTemperature
    {
        $this->maximumTemperature = is_null($this->maximumTemperature) ? new MaximumTemperature() : $this->maximumTemperature;

        return $this->maximumTemperature;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\MaximumTemperature|null $maximumTemperature
     * @return self
     */
    public function setMaximumTemperature(?MaximumTemperature $maximumTemperature = null): self
    {
        $this->maximumTemperature = $maximumTemperature;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetMaximumTemperature(): self
    {
        $this->maximumTemperature = null;

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
    public function unsetGoodsItem(): self
    {
        $this->goodsItem = null;

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
     * @return \horstoeko\invoicesuite\models\ubl\cac\FloorSpaceMeasurementDimension|null
     */
    public function getFloorSpaceMeasurementDimension(): ?FloorSpaceMeasurementDimension
    {
        return $this->floorSpaceMeasurementDimension;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\FloorSpaceMeasurementDimension
     */
    public function getFloorSpaceMeasurementDimensionWithCreate(): FloorSpaceMeasurementDimension
    {
        $this->floorSpaceMeasurementDimension = is_null($this->floorSpaceMeasurementDimension) ? new FloorSpaceMeasurementDimension() : $this->floorSpaceMeasurementDimension;

        return $this->floorSpaceMeasurementDimension;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\FloorSpaceMeasurementDimension|null $floorSpaceMeasurementDimension
     * @return self
     */
    public function setFloorSpaceMeasurementDimension(
        ?FloorSpaceMeasurementDimension $floorSpaceMeasurementDimension = null,
    ): self {
        $this->floorSpaceMeasurementDimension = $floorSpaceMeasurementDimension;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetFloorSpaceMeasurementDimension(): self
    {
        $this->floorSpaceMeasurementDimension = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\PalletSpaceMeasurementDimension|null
     */
    public function getPalletSpaceMeasurementDimension(): ?PalletSpaceMeasurementDimension
    {
        return $this->palletSpaceMeasurementDimension;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\PalletSpaceMeasurementDimension
     */
    public function getPalletSpaceMeasurementDimensionWithCreate(): PalletSpaceMeasurementDimension
    {
        $this->palletSpaceMeasurementDimension = is_null($this->palletSpaceMeasurementDimension) ? new PalletSpaceMeasurementDimension() : $this->palletSpaceMeasurementDimension;

        return $this->palletSpaceMeasurementDimension;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\PalletSpaceMeasurementDimension|null $palletSpaceMeasurementDimension
     * @return self
     */
    public function setPalletSpaceMeasurementDimension(
        ?PalletSpaceMeasurementDimension $palletSpaceMeasurementDimension = null,
    ): self {
        $this->palletSpaceMeasurementDimension = $palletSpaceMeasurementDimension;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPalletSpaceMeasurementDimension(): self
    {
        $this->palletSpaceMeasurementDimension = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\ShipmentDocumentReference>|null
     */
    public function getShipmentDocumentReference(): ?array
    {
        return $this->shipmentDocumentReference;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\ShipmentDocumentReference>|null $shipmentDocumentReference
     * @return self
     */
    public function setShipmentDocumentReference(?array $shipmentDocumentReference = null): self
    {
        $this->shipmentDocumentReference = $shipmentDocumentReference;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetShipmentDocumentReference(): self
    {
        $this->shipmentDocumentReference = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearShipmentDocumentReference(): self
    {
        $this->shipmentDocumentReference = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ShipmentDocumentReference $shipmentDocumentReference
     * @return self
     */
    public function addToShipmentDocumentReference(ShipmentDocumentReference $shipmentDocumentReference): self
    {
        $this->shipmentDocumentReference[] = $shipmentDocumentReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ShipmentDocumentReference
     */
    public function addToShipmentDocumentReferenceWithCreate(): ShipmentDocumentReference
    {
        $this->addToshipmentDocumentReference($shipmentDocumentReference = new ShipmentDocumentReference());

        return $shipmentDocumentReference;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ShipmentDocumentReference $shipmentDocumentReference
     * @return self
     */
    public function addOnceToShipmentDocumentReference(ShipmentDocumentReference $shipmentDocumentReference): self
    {
        if (!is_array($this->shipmentDocumentReference)) {
            $this->shipmentDocumentReference = [];
        }

        $this->shipmentDocumentReference[0] = $shipmentDocumentReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ShipmentDocumentReference
     */
    public function addOnceToShipmentDocumentReferenceWithCreate(): ShipmentDocumentReference
    {
        if (!is_array($this->shipmentDocumentReference)) {
            $this->shipmentDocumentReference = [];
        }

        if ($this->shipmentDocumentReference === []) {
            $this->addOnceToshipmentDocumentReference(new ShipmentDocumentReference());
        }

        return $this->shipmentDocumentReference[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\Status>|null
     */
    public function getStatus(): ?array
    {
        return $this->status;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\Status>|null $status
     * @return self
     */
    public function setStatus(?array $status = null): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetStatus(): self
    {
        $this->status = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearStatus(): self
    {
        $this->status = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Status $status
     * @return self
     */
    public function addToStatus(Status $status): self
    {
        $this->status[] = $status;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Status
     */
    public function addToStatusWithCreate(): Status
    {
        $this->addTostatus($status = new Status());

        return $status;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Status $status
     * @return self
     */
    public function addOnceToStatus(Status $status): self
    {
        if (!is_array($this->status)) {
            $this->status = [];
        }

        $this->status[0] = $status;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Status
     */
    public function addOnceToStatusWithCreate(): Status
    {
        if (!is_array($this->status)) {
            $this->status = [];
        }

        if ($this->status === []) {
            $this->addOnceTostatus(new Status());
        }

        return $this->status[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\CustomsDeclaration>|null
     */
    public function getCustomsDeclaration(): ?array
    {
        return $this->customsDeclaration;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\CustomsDeclaration>|null $customsDeclaration
     * @return self
     */
    public function setCustomsDeclaration(?array $customsDeclaration = null): self
    {
        $this->customsDeclaration = $customsDeclaration;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetCustomsDeclaration(): self
    {
        $this->customsDeclaration = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearCustomsDeclaration(): self
    {
        $this->customsDeclaration = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\CustomsDeclaration $customsDeclaration
     * @return self
     */
    public function addToCustomsDeclaration(CustomsDeclaration $customsDeclaration): self
    {
        $this->customsDeclaration[] = $customsDeclaration;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\CustomsDeclaration
     */
    public function addToCustomsDeclarationWithCreate(): CustomsDeclaration
    {
        $this->addTocustomsDeclaration($customsDeclaration = new CustomsDeclaration());

        return $customsDeclaration;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\CustomsDeclaration $customsDeclaration
     * @return self
     */
    public function addOnceToCustomsDeclaration(CustomsDeclaration $customsDeclaration): self
    {
        if (!is_array($this->customsDeclaration)) {
            $this->customsDeclaration = [];
        }

        $this->customsDeclaration[0] = $customsDeclaration;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\CustomsDeclaration
     */
    public function addOnceToCustomsDeclarationWithCreate(): CustomsDeclaration
    {
        if (!is_array($this->customsDeclaration)) {
            $this->customsDeclaration = [];
        }

        if ($this->customsDeclaration === []) {
            $this->addOnceTocustomsDeclaration(new CustomsDeclaration());
        }

        return $this->customsDeclaration[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\ReferencedShipment>|null
     */
    public function getReferencedShipment(): ?array
    {
        return $this->referencedShipment;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\ReferencedShipment>|null $referencedShipment
     * @return self
     */
    public function setReferencedShipment(?array $referencedShipment = null): self
    {
        $this->referencedShipment = $referencedShipment;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetReferencedShipment(): self
    {
        $this->referencedShipment = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearReferencedShipment(): self
    {
        $this->referencedShipment = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ReferencedShipment $referencedShipment
     * @return self
     */
    public function addToReferencedShipment(ReferencedShipment $referencedShipment): self
    {
        $this->referencedShipment[] = $referencedShipment;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ReferencedShipment
     */
    public function addToReferencedShipmentWithCreate(): ReferencedShipment
    {
        $this->addToreferencedShipment($referencedShipment = new ReferencedShipment());

        return $referencedShipment;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ReferencedShipment $referencedShipment
     * @return self
     */
    public function addOnceToReferencedShipment(ReferencedShipment $referencedShipment): self
    {
        if (!is_array($this->referencedShipment)) {
            $this->referencedShipment = [];
        }

        $this->referencedShipment[0] = $referencedShipment;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ReferencedShipment
     */
    public function addOnceToReferencedShipmentWithCreate(): ReferencedShipment
    {
        if (!is_array($this->referencedShipment)) {
            $this->referencedShipment = [];
        }

        if ($this->referencedShipment === []) {
            $this->addOnceToreferencedShipment(new ReferencedShipment());
        }

        return $this->referencedShipment[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\Package>|null
     */
    public function getPackage(): ?array
    {
        return $this->package;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\Package>|null $package
     * @return self
     */
    public function setPackage(?array $package = null): self
    {
        $this->package = $package;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPackage(): self
    {
        $this->package = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearPackage(): self
    {
        $this->package = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Package $package
     * @return self
     */
    public function addToPackage(Package $package): self
    {
        $this->package[] = $package;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Package
     */
    public function addToPackageWithCreate(): Package
    {
        $this->addTopackage($package = new Package());

        return $package;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Package $package
     * @return self
     */
    public function addOnceToPackage(Package $package): self
    {
        if (!is_array($this->package)) {
            $this->package = [];
        }

        $this->package[0] = $package;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Package
     */
    public function addOnceToPackageWithCreate(): Package
    {
        if (!is_array($this->package)) {
            $this->package = [];
        }

        if ($this->package === []) {
            $this->addOnceTopackage(new Package());
        }

        return $this->package[0];
    }
}
