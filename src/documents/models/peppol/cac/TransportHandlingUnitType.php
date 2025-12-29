<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\DamageRemarks;
use horstoeko\invoicesuite\documents\models\peppol\cbc\HandlingCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\HandlingInstructions;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ShippingMarks;
use horstoeko\invoicesuite\documents\models\peppol\cbc\TotalGoodsItemQuantity;
use horstoeko\invoicesuite\documents\models\peppol\cbc\TotalPackageQuantity;
use horstoeko\invoicesuite\documents\models\peppol\cbc\TraceID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\TransportHandlingUnitTypeCode;
use JMS\Serializer\Annotation as JMS;

class TransportHandlingUnitType
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
     * @var null|TransportHandlingUnitTypeCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\TransportHandlingUnitTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("TransportHandlingUnitTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTransportHandlingUnitTypeCode", setter="setTransportHandlingUnitTypeCode")
     */
    private $transportHandlingUnitTypeCode;

    /**
     * @var null|HandlingCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\HandlingCode")
     * @JMS\Expose
     * @JMS\SerializedName("HandlingCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getHandlingCode", setter="setHandlingCode")
     */
    private $handlingCode;

    /**
     * @var null|array<HandlingInstructions>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\HandlingInstructions>")
     * @JMS\Expose
     * @JMS\SerializedName("HandlingInstructions")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="HandlingInstructions", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getHandlingInstructions", setter="setHandlingInstructions")
     */
    private $handlingInstructions;

    /**
     * @var null|bool
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("HazardousRiskIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getHazardousRiskIndicator", setter="setHazardousRiskIndicator")
     */
    private $hazardousRiskIndicator;

    /**
     * @var null|TotalGoodsItemQuantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\TotalGoodsItemQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("TotalGoodsItemQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTotalGoodsItemQuantity", setter="setTotalGoodsItemQuantity")
     */
    private $totalGoodsItemQuantity;

    /**
     * @var null|TotalPackageQuantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\TotalPackageQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("TotalPackageQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTotalPackageQuantity", setter="setTotalPackageQuantity")
     */
    private $totalPackageQuantity;

    /**
     * @var null|array<DamageRemarks>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\DamageRemarks>")
     * @JMS\Expose
     * @JMS\SerializedName("DamageRemarks")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="DamageRemarks", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getDamageRemarks", setter="setDamageRemarks")
     */
    private $damageRemarks;

    /**
     * @var null|array<ShippingMarks>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\ShippingMarks>")
     * @JMS\Expose
     * @JMS\SerializedName("ShippingMarks")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ShippingMarks", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getShippingMarks", setter="setShippingMarks")
     */
    private $shippingMarks;

    /**
     * @var null|TraceID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\TraceID")
     * @JMS\Expose
     * @JMS\SerializedName("TraceID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTraceID", setter="setTraceID")
     */
    private $traceID;

    /**
     * @var null|array<HandlingUnitDespatchLine>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\HandlingUnitDespatchLine>")
     * @JMS\Expose
     * @JMS\SerializedName("HandlingUnitDespatchLine")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="HandlingUnitDespatchLine", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getHandlingUnitDespatchLine", setter="setHandlingUnitDespatchLine")
     */
    private $handlingUnitDespatchLine;

    /**
     * @var null|array<ActualPackage>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\ActualPackage>")
     * @JMS\Expose
     * @JMS\SerializedName("ActualPackage")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ActualPackage", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getActualPackage", setter="setActualPackage")
     */
    private $actualPackage;

    /**
     * @var null|array<ReceivedHandlingUnitReceiptLine>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\ReceivedHandlingUnitReceiptLine>")
     * @JMS\Expose
     * @JMS\SerializedName("ReceivedHandlingUnitReceiptLine")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ReceivedHandlingUnitReceiptLine", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getReceivedHandlingUnitReceiptLine", setter="setReceivedHandlingUnitReceiptLine")
     */
    private $receivedHandlingUnitReceiptLine;

    /**
     * @var null|array<TransportEquipment>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\TransportEquipment>")
     * @JMS\Expose
     * @JMS\SerializedName("TransportEquipment")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TransportEquipment", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getTransportEquipment", setter="setTransportEquipment")
     */
    private $transportEquipment;

    /**
     * @var null|array<TransportMeans>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\TransportMeans>")
     * @JMS\Expose
     * @JMS\SerializedName("TransportMeans")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TransportMeans", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getTransportMeans", setter="setTransportMeans")
     */
    private $transportMeans;

    /**
     * @var null|array<HazardousGoodsTransit>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\HazardousGoodsTransit>")
     * @JMS\Expose
     * @JMS\SerializedName("HazardousGoodsTransit")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="HazardousGoodsTransit", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getHazardousGoodsTransit", setter="setHazardousGoodsTransit")
     */
    private $hazardousGoodsTransit;

    /**
     * @var null|array<MeasurementDimension>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\MeasurementDimension>")
     * @JMS\Expose
     * @JMS\SerializedName("MeasurementDimension")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="MeasurementDimension", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getMeasurementDimension", setter="setMeasurementDimension")
     */
    private $measurementDimension;

    /**
     * @var null|MinimumTemperature
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\MinimumTemperature")
     * @JMS\Expose
     * @JMS\SerializedName("MinimumTemperature")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMinimumTemperature", setter="setMinimumTemperature")
     */
    private $minimumTemperature;

    /**
     * @var null|MaximumTemperature
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\MaximumTemperature")
     * @JMS\Expose
     * @JMS\SerializedName("MaximumTemperature")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMaximumTemperature", setter="setMaximumTemperature")
     */
    private $maximumTemperature;

    /**
     * @var null|array<GoodsItem>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\GoodsItem>")
     * @JMS\Expose
     * @JMS\SerializedName("GoodsItem")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="GoodsItem", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getGoodsItem", setter="setGoodsItem")
     */
    private $goodsItem;

    /**
     * @var null|FloorSpaceMeasurementDimension
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\FloorSpaceMeasurementDimension")
     * @JMS\Expose
     * @JMS\SerializedName("FloorSpaceMeasurementDimension")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getFloorSpaceMeasurementDimension", setter="setFloorSpaceMeasurementDimension")
     */
    private $floorSpaceMeasurementDimension;

    /**
     * @var null|PalletSpaceMeasurementDimension
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\PalletSpaceMeasurementDimension")
     * @JMS\Expose
     * @JMS\SerializedName("PalletSpaceMeasurementDimension")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPalletSpaceMeasurementDimension", setter="setPalletSpaceMeasurementDimension")
     */
    private $palletSpaceMeasurementDimension;

    /**
     * @var null|array<ShipmentDocumentReference>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\ShipmentDocumentReference>")
     * @JMS\Expose
     * @JMS\SerializedName("ShipmentDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ShipmentDocumentReference", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getShipmentDocumentReference", setter="setShipmentDocumentReference")
     */
    private $shipmentDocumentReference;

    /**
     * @var null|array<Status>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\Status>")
     * @JMS\Expose
     * @JMS\SerializedName("Status")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Status", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getStatus", setter="setStatus")
     */
    private $status;

    /**
     * @var null|array<CustomsDeclaration>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\CustomsDeclaration>")
     * @JMS\Expose
     * @JMS\SerializedName("CustomsDeclaration")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="CustomsDeclaration", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getCustomsDeclaration", setter="setCustomsDeclaration")
     */
    private $customsDeclaration;

    /**
     * @var null|array<ReferencedShipment>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\ReferencedShipment>")
     * @JMS\Expose
     * @JMS\SerializedName("ReferencedShipment")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ReferencedShipment", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getReferencedShipment", setter="setReferencedShipment")
     */
    private $referencedShipment;

    /**
     * @var null|array<Package>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\Package>")
     * @JMS\Expose
     * @JMS\SerializedName("Package")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Package", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getPackage", setter="setPackage")
     */
    private $package;

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
     * @return null|TransportHandlingUnitTypeCode
     */
    public function getTransportHandlingUnitTypeCode(): ?TransportHandlingUnitTypeCode
    {
        return $this->transportHandlingUnitTypeCode;
    }

    /**
     * @return TransportHandlingUnitTypeCode
     */
    public function getTransportHandlingUnitTypeCodeWithCreate(): TransportHandlingUnitTypeCode
    {
        $this->transportHandlingUnitTypeCode = is_null($this->transportHandlingUnitTypeCode) ? new TransportHandlingUnitTypeCode() : $this->transportHandlingUnitTypeCode;

        return $this->transportHandlingUnitTypeCode;
    }

    /**
     * @param  null|TransportHandlingUnitTypeCode $transportHandlingUnitTypeCode
     * @return static
     */
    public function setTransportHandlingUnitTypeCode(
        ?TransportHandlingUnitTypeCode $transportHandlingUnitTypeCode = null,
    ): static {
        $this->transportHandlingUnitTypeCode = $transportHandlingUnitTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTransportHandlingUnitTypeCode(): static
    {
        $this->transportHandlingUnitTypeCode = null;

        return $this;
    }

    /**
     * @return null|HandlingCode
     */
    public function getHandlingCode(): ?HandlingCode
    {
        return $this->handlingCode;
    }

    /**
     * @return HandlingCode
     */
    public function getHandlingCodeWithCreate(): HandlingCode
    {
        $this->handlingCode = is_null($this->handlingCode) ? new HandlingCode() : $this->handlingCode;

        return $this->handlingCode;
    }

    /**
     * @param  null|HandlingCode $handlingCode
     * @return static
     */
    public function setHandlingCode(?HandlingCode $handlingCode = null): static
    {
        $this->handlingCode = $handlingCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetHandlingCode(): static
    {
        $this->handlingCode = null;

        return $this;
    }

    /**
     * @return null|array<HandlingInstructions>
     */
    public function getHandlingInstructions(): ?array
    {
        return $this->handlingInstructions;
    }

    /**
     * @param  null|array<HandlingInstructions> $handlingInstructions
     * @return static
     */
    public function setHandlingInstructions(?array $handlingInstructions = null): static
    {
        $this->handlingInstructions = $handlingInstructions;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetHandlingInstructions(): static
    {
        $this->handlingInstructions = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearHandlingInstructions(): static
    {
        $this->handlingInstructions = [];

        return $this;
    }

    /**
     * @return null|HandlingInstructions
     */
    public function firstHandlingInstructions(): ?HandlingInstructions
    {
        $handlingInstructions = $this->handlingInstructions ?? [];
        $handlingInstructions = reset($handlingInstructions);

        if (false === $handlingInstructions) {
            return null;
        }

        return $handlingInstructions;
    }

    /**
     * @return null|HandlingInstructions
     */
    public function lastHandlingInstructions(): ?HandlingInstructions
    {
        $handlingInstructions = $this->handlingInstructions ?? [];
        $handlingInstructions = end($handlingInstructions);

        if (false === $handlingInstructions) {
            return null;
        }

        return $handlingInstructions;
    }

    /**
     * @param  HandlingInstructions $handlingInstructions
     * @return static
     */
    public function addToHandlingInstructions(HandlingInstructions $handlingInstructions): static
    {
        $this->handlingInstructions[] = $handlingInstructions;

        return $this;
    }

    /**
     * @return HandlingInstructions
     */
    public function addToHandlingInstructionsWithCreate(): HandlingInstructions
    {
        $this->addTohandlingInstructions($handlingInstructions = new HandlingInstructions());

        return $handlingInstructions;
    }

    /**
     * @param  HandlingInstructions $handlingInstructions
     * @return static
     */
    public function addOnceToHandlingInstructions(HandlingInstructions $handlingInstructions): static
    {
        if (!is_array($this->handlingInstructions)) {
            $this->handlingInstructions = [];
        }

        $this->handlingInstructions[0] = $handlingInstructions;

        return $this;
    }

    /**
     * @return HandlingInstructions
     */
    public function addOnceToHandlingInstructionsWithCreate(): HandlingInstructions
    {
        if (!is_array($this->handlingInstructions)) {
            $this->handlingInstructions = [];
        }

        if ([] === $this->handlingInstructions) {
            $this->addOnceTohandlingInstructions(new HandlingInstructions());
        }

        return $this->handlingInstructions[0];
    }

    /**
     * @return null|bool
     */
    public function getHazardousRiskIndicator(): ?bool
    {
        return $this->hazardousRiskIndicator;
    }

    /**
     * @param  null|bool $hazardousRiskIndicator
     * @return static
     */
    public function setHazardousRiskIndicator(?bool $hazardousRiskIndicator = null): static
    {
        $this->hazardousRiskIndicator = $hazardousRiskIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetHazardousRiskIndicator(): static
    {
        $this->hazardousRiskIndicator = null;

        return $this;
    }

    /**
     * @return null|TotalGoodsItemQuantity
     */
    public function getTotalGoodsItemQuantity(): ?TotalGoodsItemQuantity
    {
        return $this->totalGoodsItemQuantity;
    }

    /**
     * @return TotalGoodsItemQuantity
     */
    public function getTotalGoodsItemQuantityWithCreate(): TotalGoodsItemQuantity
    {
        $this->totalGoodsItemQuantity = is_null($this->totalGoodsItemQuantity) ? new TotalGoodsItemQuantity() : $this->totalGoodsItemQuantity;

        return $this->totalGoodsItemQuantity;
    }

    /**
     * @param  null|TotalGoodsItemQuantity $totalGoodsItemQuantity
     * @return static
     */
    public function setTotalGoodsItemQuantity(?TotalGoodsItemQuantity $totalGoodsItemQuantity = null): static
    {
        $this->totalGoodsItemQuantity = $totalGoodsItemQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTotalGoodsItemQuantity(): static
    {
        $this->totalGoodsItemQuantity = null;

        return $this;
    }

    /**
     * @return null|TotalPackageQuantity
     */
    public function getTotalPackageQuantity(): ?TotalPackageQuantity
    {
        return $this->totalPackageQuantity;
    }

    /**
     * @return TotalPackageQuantity
     */
    public function getTotalPackageQuantityWithCreate(): TotalPackageQuantity
    {
        $this->totalPackageQuantity = is_null($this->totalPackageQuantity) ? new TotalPackageQuantity() : $this->totalPackageQuantity;

        return $this->totalPackageQuantity;
    }

    /**
     * @param  null|TotalPackageQuantity $totalPackageQuantity
     * @return static
     */
    public function setTotalPackageQuantity(?TotalPackageQuantity $totalPackageQuantity = null): static
    {
        $this->totalPackageQuantity = $totalPackageQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTotalPackageQuantity(): static
    {
        $this->totalPackageQuantity = null;

        return $this;
    }

    /**
     * @return null|array<DamageRemarks>
     */
    public function getDamageRemarks(): ?array
    {
        return $this->damageRemarks;
    }

    /**
     * @param  null|array<DamageRemarks> $damageRemarks
     * @return static
     */
    public function setDamageRemarks(?array $damageRemarks = null): static
    {
        $this->damageRemarks = $damageRemarks;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDamageRemarks(): static
    {
        $this->damageRemarks = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearDamageRemarks(): static
    {
        $this->damageRemarks = [];

        return $this;
    }

    /**
     * @return null|DamageRemarks
     */
    public function firstDamageRemarks(): ?DamageRemarks
    {
        $damageRemarks = $this->damageRemarks ?? [];
        $damageRemarks = reset($damageRemarks);

        if (false === $damageRemarks) {
            return null;
        }

        return $damageRemarks;
    }

    /**
     * @return null|DamageRemarks
     */
    public function lastDamageRemarks(): ?DamageRemarks
    {
        $damageRemarks = $this->damageRemarks ?? [];
        $damageRemarks = end($damageRemarks);

        if (false === $damageRemarks) {
            return null;
        }

        return $damageRemarks;
    }

    /**
     * @param  DamageRemarks $damageRemarks
     * @return static
     */
    public function addToDamageRemarks(DamageRemarks $damageRemarks): static
    {
        $this->damageRemarks[] = $damageRemarks;

        return $this;
    }

    /**
     * @return DamageRemarks
     */
    public function addToDamageRemarksWithCreate(): DamageRemarks
    {
        $this->addTodamageRemarks($damageRemarks = new DamageRemarks());

        return $damageRemarks;
    }

    /**
     * @param  DamageRemarks $damageRemarks
     * @return static
     */
    public function addOnceToDamageRemarks(DamageRemarks $damageRemarks): static
    {
        if (!is_array($this->damageRemarks)) {
            $this->damageRemarks = [];
        }

        $this->damageRemarks[0] = $damageRemarks;

        return $this;
    }

    /**
     * @return DamageRemarks
     */
    public function addOnceToDamageRemarksWithCreate(): DamageRemarks
    {
        if (!is_array($this->damageRemarks)) {
            $this->damageRemarks = [];
        }

        if ([] === $this->damageRemarks) {
            $this->addOnceTodamageRemarks(new DamageRemarks());
        }

        return $this->damageRemarks[0];
    }

    /**
     * @return null|array<ShippingMarks>
     */
    public function getShippingMarks(): ?array
    {
        return $this->shippingMarks;
    }

    /**
     * @param  null|array<ShippingMarks> $shippingMarks
     * @return static
     */
    public function setShippingMarks(?array $shippingMarks = null): static
    {
        $this->shippingMarks = $shippingMarks;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetShippingMarks(): static
    {
        $this->shippingMarks = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearShippingMarks(): static
    {
        $this->shippingMarks = [];

        return $this;
    }

    /**
     * @return null|ShippingMarks
     */
    public function firstShippingMarks(): ?ShippingMarks
    {
        $shippingMarks = $this->shippingMarks ?? [];
        $shippingMarks = reset($shippingMarks);

        if (false === $shippingMarks) {
            return null;
        }

        return $shippingMarks;
    }

    /**
     * @return null|ShippingMarks
     */
    public function lastShippingMarks(): ?ShippingMarks
    {
        $shippingMarks = $this->shippingMarks ?? [];
        $shippingMarks = end($shippingMarks);

        if (false === $shippingMarks) {
            return null;
        }

        return $shippingMarks;
    }

    /**
     * @param  ShippingMarks $shippingMarks
     * @return static
     */
    public function addToShippingMarks(ShippingMarks $shippingMarks): static
    {
        $this->shippingMarks[] = $shippingMarks;

        return $this;
    }

    /**
     * @return ShippingMarks
     */
    public function addToShippingMarksWithCreate(): ShippingMarks
    {
        $this->addToshippingMarks($shippingMarks = new ShippingMarks());

        return $shippingMarks;
    }

    /**
     * @param  ShippingMarks $shippingMarks
     * @return static
     */
    public function addOnceToShippingMarks(ShippingMarks $shippingMarks): static
    {
        if (!is_array($this->shippingMarks)) {
            $this->shippingMarks = [];
        }

        $this->shippingMarks[0] = $shippingMarks;

        return $this;
    }

    /**
     * @return ShippingMarks
     */
    public function addOnceToShippingMarksWithCreate(): ShippingMarks
    {
        if (!is_array($this->shippingMarks)) {
            $this->shippingMarks = [];
        }

        if ([] === $this->shippingMarks) {
            $this->addOnceToshippingMarks(new ShippingMarks());
        }

        return $this->shippingMarks[0];
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
        $this->traceID = is_null($this->traceID) ? new TraceID() : $this->traceID;

        return $this->traceID;
    }

    /**
     * @param  null|TraceID $traceID
     * @return static
     */
    public function setTraceID(?TraceID $traceID = null): static
    {
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
     * @return null|array<HandlingUnitDespatchLine>
     */
    public function getHandlingUnitDespatchLine(): ?array
    {
        return $this->handlingUnitDespatchLine;
    }

    /**
     * @param  null|array<HandlingUnitDespatchLine> $handlingUnitDespatchLine
     * @return static
     */
    public function setHandlingUnitDespatchLine(?array $handlingUnitDespatchLine = null): static
    {
        $this->handlingUnitDespatchLine = $handlingUnitDespatchLine;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetHandlingUnitDespatchLine(): static
    {
        $this->handlingUnitDespatchLine = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearHandlingUnitDespatchLine(): static
    {
        $this->handlingUnitDespatchLine = [];

        return $this;
    }

    /**
     * @return null|HandlingUnitDespatchLine
     */
    public function firstHandlingUnitDespatchLine(): ?HandlingUnitDespatchLine
    {
        $handlingUnitDespatchLine = $this->handlingUnitDespatchLine ?? [];
        $handlingUnitDespatchLine = reset($handlingUnitDespatchLine);

        if (false === $handlingUnitDespatchLine) {
            return null;
        }

        return $handlingUnitDespatchLine;
    }

    /**
     * @return null|HandlingUnitDespatchLine
     */
    public function lastHandlingUnitDespatchLine(): ?HandlingUnitDespatchLine
    {
        $handlingUnitDespatchLine = $this->handlingUnitDespatchLine ?? [];
        $handlingUnitDespatchLine = end($handlingUnitDespatchLine);

        if (false === $handlingUnitDespatchLine) {
            return null;
        }

        return $handlingUnitDespatchLine;
    }

    /**
     * @param  HandlingUnitDespatchLine $handlingUnitDespatchLine
     * @return static
     */
    public function addToHandlingUnitDespatchLine(HandlingUnitDespatchLine $handlingUnitDespatchLine): static
    {
        $this->handlingUnitDespatchLine[] = $handlingUnitDespatchLine;

        return $this;
    }

    /**
     * @return HandlingUnitDespatchLine
     */
    public function addToHandlingUnitDespatchLineWithCreate(): HandlingUnitDespatchLine
    {
        $this->addTohandlingUnitDespatchLine($handlingUnitDespatchLine = new HandlingUnitDespatchLine());

        return $handlingUnitDespatchLine;
    }

    /**
     * @param  HandlingUnitDespatchLine $handlingUnitDespatchLine
     * @return static
     */
    public function addOnceToHandlingUnitDespatchLine(HandlingUnitDespatchLine $handlingUnitDespatchLine): static
    {
        if (!is_array($this->handlingUnitDespatchLine)) {
            $this->handlingUnitDespatchLine = [];
        }

        $this->handlingUnitDespatchLine[0] = $handlingUnitDespatchLine;

        return $this;
    }

    /**
     * @return HandlingUnitDespatchLine
     */
    public function addOnceToHandlingUnitDespatchLineWithCreate(): HandlingUnitDespatchLine
    {
        if (!is_array($this->handlingUnitDespatchLine)) {
            $this->handlingUnitDespatchLine = [];
        }

        if ([] === $this->handlingUnitDespatchLine) {
            $this->addOnceTohandlingUnitDespatchLine(new HandlingUnitDespatchLine());
        }

        return $this->handlingUnitDespatchLine[0];
    }

    /**
     * @return null|array<ActualPackage>
     */
    public function getActualPackage(): ?array
    {
        return $this->actualPackage;
    }

    /**
     * @param  null|array<ActualPackage> $actualPackage
     * @return static
     */
    public function setActualPackage(?array $actualPackage = null): static
    {
        $this->actualPackage = $actualPackage;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetActualPackage(): static
    {
        $this->actualPackage = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearActualPackage(): static
    {
        $this->actualPackage = [];

        return $this;
    }

    /**
     * @return null|ActualPackage
     */
    public function firstActualPackage(): ?ActualPackage
    {
        $actualPackage = $this->actualPackage ?? [];
        $actualPackage = reset($actualPackage);

        if (false === $actualPackage) {
            return null;
        }

        return $actualPackage;
    }

    /**
     * @return null|ActualPackage
     */
    public function lastActualPackage(): ?ActualPackage
    {
        $actualPackage = $this->actualPackage ?? [];
        $actualPackage = end($actualPackage);

        if (false === $actualPackage) {
            return null;
        }

        return $actualPackage;
    }

    /**
     * @param  ActualPackage $actualPackage
     * @return static
     */
    public function addToActualPackage(ActualPackage $actualPackage): static
    {
        $this->actualPackage[] = $actualPackage;

        return $this;
    }

    /**
     * @return ActualPackage
     */
    public function addToActualPackageWithCreate(): ActualPackage
    {
        $this->addToactualPackage($actualPackage = new ActualPackage());

        return $actualPackage;
    }

    /**
     * @param  ActualPackage $actualPackage
     * @return static
     */
    public function addOnceToActualPackage(ActualPackage $actualPackage): static
    {
        if (!is_array($this->actualPackage)) {
            $this->actualPackage = [];
        }

        $this->actualPackage[0] = $actualPackage;

        return $this;
    }

    /**
     * @return ActualPackage
     */
    public function addOnceToActualPackageWithCreate(): ActualPackage
    {
        if (!is_array($this->actualPackage)) {
            $this->actualPackage = [];
        }

        if ([] === $this->actualPackage) {
            $this->addOnceToactualPackage(new ActualPackage());
        }

        return $this->actualPackage[0];
    }

    /**
     * @return null|array<ReceivedHandlingUnitReceiptLine>
     */
    public function getReceivedHandlingUnitReceiptLine(): ?array
    {
        return $this->receivedHandlingUnitReceiptLine;
    }

    /**
     * @param  null|array<ReceivedHandlingUnitReceiptLine> $receivedHandlingUnitReceiptLine
     * @return static
     */
    public function setReceivedHandlingUnitReceiptLine(?array $receivedHandlingUnitReceiptLine = null): static
    {
        $this->receivedHandlingUnitReceiptLine = $receivedHandlingUnitReceiptLine;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetReceivedHandlingUnitReceiptLine(): static
    {
        $this->receivedHandlingUnitReceiptLine = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearReceivedHandlingUnitReceiptLine(): static
    {
        $this->receivedHandlingUnitReceiptLine = [];

        return $this;
    }

    /**
     * @return null|ReceivedHandlingUnitReceiptLine
     */
    public function firstReceivedHandlingUnitReceiptLine(): ?ReceivedHandlingUnitReceiptLine
    {
        $receivedHandlingUnitReceiptLine = $this->receivedHandlingUnitReceiptLine ?? [];
        $receivedHandlingUnitReceiptLine = reset($receivedHandlingUnitReceiptLine);

        if (false === $receivedHandlingUnitReceiptLine) {
            return null;
        }

        return $receivedHandlingUnitReceiptLine;
    }

    /**
     * @return null|ReceivedHandlingUnitReceiptLine
     */
    public function lastReceivedHandlingUnitReceiptLine(): ?ReceivedHandlingUnitReceiptLine
    {
        $receivedHandlingUnitReceiptLine = $this->receivedHandlingUnitReceiptLine ?? [];
        $receivedHandlingUnitReceiptLine = end($receivedHandlingUnitReceiptLine);

        if (false === $receivedHandlingUnitReceiptLine) {
            return null;
        }

        return $receivedHandlingUnitReceiptLine;
    }

    /**
     * @param  ReceivedHandlingUnitReceiptLine $receivedHandlingUnitReceiptLine
     * @return static
     */
    public function addToReceivedHandlingUnitReceiptLine(
        ReceivedHandlingUnitReceiptLine $receivedHandlingUnitReceiptLine,
    ): static {
        $this->receivedHandlingUnitReceiptLine[] = $receivedHandlingUnitReceiptLine;

        return $this;
    }

    /**
     * @return ReceivedHandlingUnitReceiptLine
     */
    public function addToReceivedHandlingUnitReceiptLineWithCreate(): ReceivedHandlingUnitReceiptLine
    {
        $this->addToreceivedHandlingUnitReceiptLine($receivedHandlingUnitReceiptLine = new ReceivedHandlingUnitReceiptLine());

        return $receivedHandlingUnitReceiptLine;
    }

    /**
     * @param  ReceivedHandlingUnitReceiptLine $receivedHandlingUnitReceiptLine
     * @return static
     */
    public function addOnceToReceivedHandlingUnitReceiptLine(
        ReceivedHandlingUnitReceiptLine $receivedHandlingUnitReceiptLine,
    ): static {
        if (!is_array($this->receivedHandlingUnitReceiptLine)) {
            $this->receivedHandlingUnitReceiptLine = [];
        }

        $this->receivedHandlingUnitReceiptLine[0] = $receivedHandlingUnitReceiptLine;

        return $this;
    }

    /**
     * @return ReceivedHandlingUnitReceiptLine
     */
    public function addOnceToReceivedHandlingUnitReceiptLineWithCreate(): ReceivedHandlingUnitReceiptLine
    {
        if (!is_array($this->receivedHandlingUnitReceiptLine)) {
            $this->receivedHandlingUnitReceiptLine = [];
        }

        if ([] === $this->receivedHandlingUnitReceiptLine) {
            $this->addOnceToreceivedHandlingUnitReceiptLine(new ReceivedHandlingUnitReceiptLine());
        }

        return $this->receivedHandlingUnitReceiptLine[0];
    }

    /**
     * @return null|array<TransportEquipment>
     */
    public function getTransportEquipment(): ?array
    {
        return $this->transportEquipment;
    }

    /**
     * @param  null|array<TransportEquipment> $transportEquipment
     * @return static
     */
    public function setTransportEquipment(?array $transportEquipment = null): static
    {
        $this->transportEquipment = $transportEquipment;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTransportEquipment(): static
    {
        $this->transportEquipment = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearTransportEquipment(): static
    {
        $this->transportEquipment = [];

        return $this;
    }

    /**
     * @return null|TransportEquipment
     */
    public function firstTransportEquipment(): ?TransportEquipment
    {
        $transportEquipment = $this->transportEquipment ?? [];
        $transportEquipment = reset($transportEquipment);

        if (false === $transportEquipment) {
            return null;
        }

        return $transportEquipment;
    }

    /**
     * @return null|TransportEquipment
     */
    public function lastTransportEquipment(): ?TransportEquipment
    {
        $transportEquipment = $this->transportEquipment ?? [];
        $transportEquipment = end($transportEquipment);

        if (false === $transportEquipment) {
            return null;
        }

        return $transportEquipment;
    }

    /**
     * @param  TransportEquipment $transportEquipment
     * @return static
     */
    public function addToTransportEquipment(TransportEquipment $transportEquipment): static
    {
        $this->transportEquipment[] = $transportEquipment;

        return $this;
    }

    /**
     * @return TransportEquipment
     */
    public function addToTransportEquipmentWithCreate(): TransportEquipment
    {
        $this->addTotransportEquipment($transportEquipment = new TransportEquipment());

        return $transportEquipment;
    }

    /**
     * @param  TransportEquipment $transportEquipment
     * @return static
     */
    public function addOnceToTransportEquipment(TransportEquipment $transportEquipment): static
    {
        if (!is_array($this->transportEquipment)) {
            $this->transportEquipment = [];
        }

        $this->transportEquipment[0] = $transportEquipment;

        return $this;
    }

    /**
     * @return TransportEquipment
     */
    public function addOnceToTransportEquipmentWithCreate(): TransportEquipment
    {
        if (!is_array($this->transportEquipment)) {
            $this->transportEquipment = [];
        }

        if ([] === $this->transportEquipment) {
            $this->addOnceTotransportEquipment(new TransportEquipment());
        }

        return $this->transportEquipment[0];
    }

    /**
     * @return null|array<TransportMeans>
     */
    public function getTransportMeans(): ?array
    {
        return $this->transportMeans;
    }

    /**
     * @param  null|array<TransportMeans> $transportMeans
     * @return static
     */
    public function setTransportMeans(?array $transportMeans = null): static
    {
        $this->transportMeans = $transportMeans;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTransportMeans(): static
    {
        $this->transportMeans = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearTransportMeans(): static
    {
        $this->transportMeans = [];

        return $this;
    }

    /**
     * @return null|TransportMeans
     */
    public function firstTransportMeans(): ?TransportMeans
    {
        $transportMeans = $this->transportMeans ?? [];
        $transportMeans = reset($transportMeans);

        if (false === $transportMeans) {
            return null;
        }

        return $transportMeans;
    }

    /**
     * @return null|TransportMeans
     */
    public function lastTransportMeans(): ?TransportMeans
    {
        $transportMeans = $this->transportMeans ?? [];
        $transportMeans = end($transportMeans);

        if (false === $transportMeans) {
            return null;
        }

        return $transportMeans;
    }

    /**
     * @param  TransportMeans $transportMeans
     * @return static
     */
    public function addToTransportMeans(TransportMeans $transportMeans): static
    {
        $this->transportMeans[] = $transportMeans;

        return $this;
    }

    /**
     * @return TransportMeans
     */
    public function addToTransportMeansWithCreate(): TransportMeans
    {
        $this->addTotransportMeans($transportMeans = new TransportMeans());

        return $transportMeans;
    }

    /**
     * @param  TransportMeans $transportMeans
     * @return static
     */
    public function addOnceToTransportMeans(TransportMeans $transportMeans): static
    {
        if (!is_array($this->transportMeans)) {
            $this->transportMeans = [];
        }

        $this->transportMeans[0] = $transportMeans;

        return $this;
    }

    /**
     * @return TransportMeans
     */
    public function addOnceToTransportMeansWithCreate(): TransportMeans
    {
        if (!is_array($this->transportMeans)) {
            $this->transportMeans = [];
        }

        if ([] === $this->transportMeans) {
            $this->addOnceTotransportMeans(new TransportMeans());
        }

        return $this->transportMeans[0];
    }

    /**
     * @return null|array<HazardousGoodsTransit>
     */
    public function getHazardousGoodsTransit(): ?array
    {
        return $this->hazardousGoodsTransit;
    }

    /**
     * @param  null|array<HazardousGoodsTransit> $hazardousGoodsTransit
     * @return static
     */
    public function setHazardousGoodsTransit(?array $hazardousGoodsTransit = null): static
    {
        $this->hazardousGoodsTransit = $hazardousGoodsTransit;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetHazardousGoodsTransit(): static
    {
        $this->hazardousGoodsTransit = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearHazardousGoodsTransit(): static
    {
        $this->hazardousGoodsTransit = [];

        return $this;
    }

    /**
     * @return null|HazardousGoodsTransit
     */
    public function firstHazardousGoodsTransit(): ?HazardousGoodsTransit
    {
        $hazardousGoodsTransit = $this->hazardousGoodsTransit ?? [];
        $hazardousGoodsTransit = reset($hazardousGoodsTransit);

        if (false === $hazardousGoodsTransit) {
            return null;
        }

        return $hazardousGoodsTransit;
    }

    /**
     * @return null|HazardousGoodsTransit
     */
    public function lastHazardousGoodsTransit(): ?HazardousGoodsTransit
    {
        $hazardousGoodsTransit = $this->hazardousGoodsTransit ?? [];
        $hazardousGoodsTransit = end($hazardousGoodsTransit);

        if (false === $hazardousGoodsTransit) {
            return null;
        }

        return $hazardousGoodsTransit;
    }

    /**
     * @param  HazardousGoodsTransit $hazardousGoodsTransit
     * @return static
     */
    public function addToHazardousGoodsTransit(HazardousGoodsTransit $hazardousGoodsTransit): static
    {
        $this->hazardousGoodsTransit[] = $hazardousGoodsTransit;

        return $this;
    }

    /**
     * @return HazardousGoodsTransit
     */
    public function addToHazardousGoodsTransitWithCreate(): HazardousGoodsTransit
    {
        $this->addTohazardousGoodsTransit($hazardousGoodsTransit = new HazardousGoodsTransit());

        return $hazardousGoodsTransit;
    }

    /**
     * @param  HazardousGoodsTransit $hazardousGoodsTransit
     * @return static
     */
    public function addOnceToHazardousGoodsTransit(HazardousGoodsTransit $hazardousGoodsTransit): static
    {
        if (!is_array($this->hazardousGoodsTransit)) {
            $this->hazardousGoodsTransit = [];
        }

        $this->hazardousGoodsTransit[0] = $hazardousGoodsTransit;

        return $this;
    }

    /**
     * @return HazardousGoodsTransit
     */
    public function addOnceToHazardousGoodsTransitWithCreate(): HazardousGoodsTransit
    {
        if (!is_array($this->hazardousGoodsTransit)) {
            $this->hazardousGoodsTransit = [];
        }

        if ([] === $this->hazardousGoodsTransit) {
            $this->addOnceTohazardousGoodsTransit(new HazardousGoodsTransit());
        }

        return $this->hazardousGoodsTransit[0];
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
    public function setMeasurementDimension(?array $measurementDimension = null): static
    {
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
    public function addToMeasurementDimension(MeasurementDimension $measurementDimension): static
    {
        $this->measurementDimension[] = $measurementDimension;

        return $this;
    }

    /**
     * @return MeasurementDimension
     */
    public function addToMeasurementDimensionWithCreate(): MeasurementDimension
    {
        $this->addTomeasurementDimension($measurementDimension = new MeasurementDimension());

        return $measurementDimension;
    }

    /**
     * @param  MeasurementDimension $measurementDimension
     * @return static
     */
    public function addOnceToMeasurementDimension(MeasurementDimension $measurementDimension): static
    {
        if (!is_array($this->measurementDimension)) {
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
        if (!is_array($this->measurementDimension)) {
            $this->measurementDimension = [];
        }

        if ([] === $this->measurementDimension) {
            $this->addOnceTomeasurementDimension(new MeasurementDimension());
        }

        return $this->measurementDimension[0];
    }

    /**
     * @return null|MinimumTemperature
     */
    public function getMinimumTemperature(): ?MinimumTemperature
    {
        return $this->minimumTemperature;
    }

    /**
     * @return MinimumTemperature
     */
    public function getMinimumTemperatureWithCreate(): MinimumTemperature
    {
        $this->minimumTemperature = is_null($this->minimumTemperature) ? new MinimumTemperature() : $this->minimumTemperature;

        return $this->minimumTemperature;
    }

    /**
     * @param  null|MinimumTemperature $minimumTemperature
     * @return static
     */
    public function setMinimumTemperature(?MinimumTemperature $minimumTemperature = null): static
    {
        $this->minimumTemperature = $minimumTemperature;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMinimumTemperature(): static
    {
        $this->minimumTemperature = null;

        return $this;
    }

    /**
     * @return null|MaximumTemperature
     */
    public function getMaximumTemperature(): ?MaximumTemperature
    {
        return $this->maximumTemperature;
    }

    /**
     * @return MaximumTemperature
     */
    public function getMaximumTemperatureWithCreate(): MaximumTemperature
    {
        $this->maximumTemperature = is_null($this->maximumTemperature) ? new MaximumTemperature() : $this->maximumTemperature;

        return $this->maximumTemperature;
    }

    /**
     * @param  null|MaximumTemperature $maximumTemperature
     * @return static
     */
    public function setMaximumTemperature(?MaximumTemperature $maximumTemperature = null): static
    {
        $this->maximumTemperature = $maximumTemperature;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMaximumTemperature(): static
    {
        $this->maximumTemperature = null;

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
    public function setGoodsItem(?array $goodsItem = null): static
    {
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
    public function addToGoodsItem(GoodsItem $goodsItem): static
    {
        $this->goodsItem[] = $goodsItem;

        return $this;
    }

    /**
     * @return GoodsItem
     */
    public function addToGoodsItemWithCreate(): GoodsItem
    {
        $this->addTogoodsItem($goodsItem = new GoodsItem());

        return $goodsItem;
    }

    /**
     * @param  GoodsItem $goodsItem
     * @return static
     */
    public function addOnceToGoodsItem(GoodsItem $goodsItem): static
    {
        if (!is_array($this->goodsItem)) {
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
        if (!is_array($this->goodsItem)) {
            $this->goodsItem = [];
        }

        if ([] === $this->goodsItem) {
            $this->addOnceTogoodsItem(new GoodsItem());
        }

        return $this->goodsItem[0];
    }

    /**
     * @return null|FloorSpaceMeasurementDimension
     */
    public function getFloorSpaceMeasurementDimension(): ?FloorSpaceMeasurementDimension
    {
        return $this->floorSpaceMeasurementDimension;
    }

    /**
     * @return FloorSpaceMeasurementDimension
     */
    public function getFloorSpaceMeasurementDimensionWithCreate(): FloorSpaceMeasurementDimension
    {
        $this->floorSpaceMeasurementDimension = is_null($this->floorSpaceMeasurementDimension) ? new FloorSpaceMeasurementDimension() : $this->floorSpaceMeasurementDimension;

        return $this->floorSpaceMeasurementDimension;
    }

    /**
     * @param  null|FloorSpaceMeasurementDimension $floorSpaceMeasurementDimension
     * @return static
     */
    public function setFloorSpaceMeasurementDimension(
        ?FloorSpaceMeasurementDimension $floorSpaceMeasurementDimension = null,
    ): static {
        $this->floorSpaceMeasurementDimension = $floorSpaceMeasurementDimension;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetFloorSpaceMeasurementDimension(): static
    {
        $this->floorSpaceMeasurementDimension = null;

        return $this;
    }

    /**
     * @return null|PalletSpaceMeasurementDimension
     */
    public function getPalletSpaceMeasurementDimension(): ?PalletSpaceMeasurementDimension
    {
        return $this->palletSpaceMeasurementDimension;
    }

    /**
     * @return PalletSpaceMeasurementDimension
     */
    public function getPalletSpaceMeasurementDimensionWithCreate(): PalletSpaceMeasurementDimension
    {
        $this->palletSpaceMeasurementDimension = is_null($this->palletSpaceMeasurementDimension) ? new PalletSpaceMeasurementDimension() : $this->palletSpaceMeasurementDimension;

        return $this->palletSpaceMeasurementDimension;
    }

    /**
     * @param  null|PalletSpaceMeasurementDimension $palletSpaceMeasurementDimension
     * @return static
     */
    public function setPalletSpaceMeasurementDimension(
        ?PalletSpaceMeasurementDimension $palletSpaceMeasurementDimension = null,
    ): static {
        $this->palletSpaceMeasurementDimension = $palletSpaceMeasurementDimension;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPalletSpaceMeasurementDimension(): static
    {
        $this->palletSpaceMeasurementDimension = null;

        return $this;
    }

    /**
     * @return null|array<ShipmentDocumentReference>
     */
    public function getShipmentDocumentReference(): ?array
    {
        return $this->shipmentDocumentReference;
    }

    /**
     * @param  null|array<ShipmentDocumentReference> $shipmentDocumentReference
     * @return static
     */
    public function setShipmentDocumentReference(?array $shipmentDocumentReference = null): static
    {
        $this->shipmentDocumentReference = $shipmentDocumentReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetShipmentDocumentReference(): static
    {
        $this->shipmentDocumentReference = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearShipmentDocumentReference(): static
    {
        $this->shipmentDocumentReference = [];

        return $this;
    }

    /**
     * @return null|ShipmentDocumentReference
     */
    public function firstShipmentDocumentReference(): ?ShipmentDocumentReference
    {
        $shipmentDocumentReference = $this->shipmentDocumentReference ?? [];
        $shipmentDocumentReference = reset($shipmentDocumentReference);

        if (false === $shipmentDocumentReference) {
            return null;
        }

        return $shipmentDocumentReference;
    }

    /**
     * @return null|ShipmentDocumentReference
     */
    public function lastShipmentDocumentReference(): ?ShipmentDocumentReference
    {
        $shipmentDocumentReference = $this->shipmentDocumentReference ?? [];
        $shipmentDocumentReference = end($shipmentDocumentReference);

        if (false === $shipmentDocumentReference) {
            return null;
        }

        return $shipmentDocumentReference;
    }

    /**
     * @param  ShipmentDocumentReference $shipmentDocumentReference
     * @return static
     */
    public function addToShipmentDocumentReference(ShipmentDocumentReference $shipmentDocumentReference): static
    {
        $this->shipmentDocumentReference[] = $shipmentDocumentReference;

        return $this;
    }

    /**
     * @return ShipmentDocumentReference
     */
    public function addToShipmentDocumentReferenceWithCreate(): ShipmentDocumentReference
    {
        $this->addToshipmentDocumentReference($shipmentDocumentReference = new ShipmentDocumentReference());

        return $shipmentDocumentReference;
    }

    /**
     * @param  ShipmentDocumentReference $shipmentDocumentReference
     * @return static
     */
    public function addOnceToShipmentDocumentReference(ShipmentDocumentReference $shipmentDocumentReference): static
    {
        if (!is_array($this->shipmentDocumentReference)) {
            $this->shipmentDocumentReference = [];
        }

        $this->shipmentDocumentReference[0] = $shipmentDocumentReference;

        return $this;
    }

    /**
     * @return ShipmentDocumentReference
     */
    public function addOnceToShipmentDocumentReferenceWithCreate(): ShipmentDocumentReference
    {
        if (!is_array($this->shipmentDocumentReference)) {
            $this->shipmentDocumentReference = [];
        }

        if ([] === $this->shipmentDocumentReference) {
            $this->addOnceToshipmentDocumentReference(new ShipmentDocumentReference());
        }

        return $this->shipmentDocumentReference[0];
    }

    /**
     * @return null|array<Status>
     */
    public function getStatus(): ?array
    {
        return $this->status;
    }

    /**
     * @param  null|array<Status> $status
     * @return static
     */
    public function setStatus(?array $status = null): static
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetStatus(): static
    {
        $this->status = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearStatus(): static
    {
        $this->status = [];

        return $this;
    }

    /**
     * @return null|Status
     */
    public function firstStatus(): ?Status
    {
        $status = $this->status ?? [];
        $status = reset($status);

        if (false === $status) {
            return null;
        }

        return $status;
    }

    /**
     * @return null|Status
     */
    public function lastStatus(): ?Status
    {
        $status = $this->status ?? [];
        $status = end($status);

        if (false === $status) {
            return null;
        }

        return $status;
    }

    /**
     * @param  Status $status
     * @return static
     */
    public function addToStatus(Status $status): static
    {
        $this->status[] = $status;

        return $this;
    }

    /**
     * @return Status
     */
    public function addToStatusWithCreate(): Status
    {
        $this->addTostatus($status = new Status());

        return $status;
    }

    /**
     * @param  Status $status
     * @return static
     */
    public function addOnceToStatus(Status $status): static
    {
        if (!is_array($this->status)) {
            $this->status = [];
        }

        $this->status[0] = $status;

        return $this;
    }

    /**
     * @return Status
     */
    public function addOnceToStatusWithCreate(): Status
    {
        if (!is_array($this->status)) {
            $this->status = [];
        }

        if ([] === $this->status) {
            $this->addOnceTostatus(new Status());
        }

        return $this->status[0];
    }

    /**
     * @return null|array<CustomsDeclaration>
     */
    public function getCustomsDeclaration(): ?array
    {
        return $this->customsDeclaration;
    }

    /**
     * @param  null|array<CustomsDeclaration> $customsDeclaration
     * @return static
     */
    public function setCustomsDeclaration(?array $customsDeclaration = null): static
    {
        $this->customsDeclaration = $customsDeclaration;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCustomsDeclaration(): static
    {
        $this->customsDeclaration = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearCustomsDeclaration(): static
    {
        $this->customsDeclaration = [];

        return $this;
    }

    /**
     * @return null|CustomsDeclaration
     */
    public function firstCustomsDeclaration(): ?CustomsDeclaration
    {
        $customsDeclaration = $this->customsDeclaration ?? [];
        $customsDeclaration = reset($customsDeclaration);

        if (false === $customsDeclaration) {
            return null;
        }

        return $customsDeclaration;
    }

    /**
     * @return null|CustomsDeclaration
     */
    public function lastCustomsDeclaration(): ?CustomsDeclaration
    {
        $customsDeclaration = $this->customsDeclaration ?? [];
        $customsDeclaration = end($customsDeclaration);

        if (false === $customsDeclaration) {
            return null;
        }

        return $customsDeclaration;
    }

    /**
     * @param  CustomsDeclaration $customsDeclaration
     * @return static
     */
    public function addToCustomsDeclaration(CustomsDeclaration $customsDeclaration): static
    {
        $this->customsDeclaration[] = $customsDeclaration;

        return $this;
    }

    /**
     * @return CustomsDeclaration
     */
    public function addToCustomsDeclarationWithCreate(): CustomsDeclaration
    {
        $this->addTocustomsDeclaration($customsDeclaration = new CustomsDeclaration());

        return $customsDeclaration;
    }

    /**
     * @param  CustomsDeclaration $customsDeclaration
     * @return static
     */
    public function addOnceToCustomsDeclaration(CustomsDeclaration $customsDeclaration): static
    {
        if (!is_array($this->customsDeclaration)) {
            $this->customsDeclaration = [];
        }

        $this->customsDeclaration[0] = $customsDeclaration;

        return $this;
    }

    /**
     * @return CustomsDeclaration
     */
    public function addOnceToCustomsDeclarationWithCreate(): CustomsDeclaration
    {
        if (!is_array($this->customsDeclaration)) {
            $this->customsDeclaration = [];
        }

        if ([] === $this->customsDeclaration) {
            $this->addOnceTocustomsDeclaration(new CustomsDeclaration());
        }

        return $this->customsDeclaration[0];
    }

    /**
     * @return null|array<ReferencedShipment>
     */
    public function getReferencedShipment(): ?array
    {
        return $this->referencedShipment;
    }

    /**
     * @param  null|array<ReferencedShipment> $referencedShipment
     * @return static
     */
    public function setReferencedShipment(?array $referencedShipment = null): static
    {
        $this->referencedShipment = $referencedShipment;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetReferencedShipment(): static
    {
        $this->referencedShipment = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearReferencedShipment(): static
    {
        $this->referencedShipment = [];

        return $this;
    }

    /**
     * @return null|ReferencedShipment
     */
    public function firstReferencedShipment(): ?ReferencedShipment
    {
        $referencedShipment = $this->referencedShipment ?? [];
        $referencedShipment = reset($referencedShipment);

        if (false === $referencedShipment) {
            return null;
        }

        return $referencedShipment;
    }

    /**
     * @return null|ReferencedShipment
     */
    public function lastReferencedShipment(): ?ReferencedShipment
    {
        $referencedShipment = $this->referencedShipment ?? [];
        $referencedShipment = end($referencedShipment);

        if (false === $referencedShipment) {
            return null;
        }

        return $referencedShipment;
    }

    /**
     * @param  ReferencedShipment $referencedShipment
     * @return static
     */
    public function addToReferencedShipment(ReferencedShipment $referencedShipment): static
    {
        $this->referencedShipment[] = $referencedShipment;

        return $this;
    }

    /**
     * @return ReferencedShipment
     */
    public function addToReferencedShipmentWithCreate(): ReferencedShipment
    {
        $this->addToreferencedShipment($referencedShipment = new ReferencedShipment());

        return $referencedShipment;
    }

    /**
     * @param  ReferencedShipment $referencedShipment
     * @return static
     */
    public function addOnceToReferencedShipment(ReferencedShipment $referencedShipment): static
    {
        if (!is_array($this->referencedShipment)) {
            $this->referencedShipment = [];
        }

        $this->referencedShipment[0] = $referencedShipment;

        return $this;
    }

    /**
     * @return ReferencedShipment
     */
    public function addOnceToReferencedShipmentWithCreate(): ReferencedShipment
    {
        if (!is_array($this->referencedShipment)) {
            $this->referencedShipment = [];
        }

        if ([] === $this->referencedShipment) {
            $this->addOnceToreferencedShipment(new ReferencedShipment());
        }

        return $this->referencedShipment[0];
    }

    /**
     * @return null|array<Package>
     */
    public function getPackage(): ?array
    {
        return $this->package;
    }

    /**
     * @param  null|array<Package> $package
     * @return static
     */
    public function setPackage(?array $package = null): static
    {
        $this->package = $package;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPackage(): static
    {
        $this->package = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearPackage(): static
    {
        $this->package = [];

        return $this;
    }

    /**
     * @return null|Package
     */
    public function firstPackage(): ?Package
    {
        $package = $this->package ?? [];
        $package = reset($package);

        if (false === $package) {
            return null;
        }

        return $package;
    }

    /**
     * @return null|Package
     */
    public function lastPackage(): ?Package
    {
        $package = $this->package ?? [];
        $package = end($package);

        if (false === $package) {
            return null;
        }

        return $package;
    }

    /**
     * @param  Package $package
     * @return static
     */
    public function addToPackage(Package $package): static
    {
        $this->package[] = $package;

        return $this;
    }

    /**
     * @return Package
     */
    public function addToPackageWithCreate(): Package
    {
        $this->addTopackage($package = new Package());

        return $package;
    }

    /**
     * @param  Package $package
     * @return static
     */
    public function addOnceToPackage(Package $package): static
    {
        if (!is_array($this->package)) {
            $this->package = [];
        }

        $this->package[0] = $package;

        return $this;
    }

    /**
     * @return Package
     */
    public function addOnceToPackageWithCreate(): Package
    {
        if (!is_array($this->package)) {
            $this->package = [];
        }

        if ([] === $this->package) {
            $this->addOnceTopackage(new Package());
        }

        return $this->package[0];
    }
}
