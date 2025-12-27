<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\ubl\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\ubl\cbc\ChargeableQuantity;
use horstoeko\invoicesuite\documents\models\ubl\cbc\ChargeableWeightMeasure;
use horstoeko\invoicesuite\documents\models\ubl\cbc\CustomsStatusCode;
use horstoeko\invoicesuite\documents\models\ubl\cbc\CustomsTariffQuantity;
use horstoeko\invoicesuite\documents\models\ubl\cbc\DeclaredCustomsValueAmount;
use horstoeko\invoicesuite\documents\models\ubl\cbc\DeclaredForCarriageValueAmount;
use horstoeko\invoicesuite\documents\models\ubl\cbc\DeclaredStatisticsValueAmount;
use horstoeko\invoicesuite\documents\models\ubl\cbc\Description;
use horstoeko\invoicesuite\documents\models\ubl\cbc\FreeOnBoardValueAmount;
use horstoeko\invoicesuite\documents\models\ubl\cbc\GrossVolumeMeasure;
use horstoeko\invoicesuite\documents\models\ubl\cbc\GrossWeightMeasure;
use horstoeko\invoicesuite\documents\models\ubl\cbc\ID;
use horstoeko\invoicesuite\documents\models\ubl\cbc\InsuranceValueAmount;
use horstoeko\invoicesuite\documents\models\ubl\cbc\NetNetWeightMeasure;
use horstoeko\invoicesuite\documents\models\ubl\cbc\NetVolumeMeasure;
use horstoeko\invoicesuite\documents\models\ubl\cbc\NetWeightMeasure;
use horstoeko\invoicesuite\documents\models\ubl\cbc\PreferenceCriterionCode;
use horstoeko\invoicesuite\documents\models\ubl\cbc\Quantity;
use horstoeko\invoicesuite\documents\models\ubl\cbc\RequiredCustomsID;
use horstoeko\invoicesuite\documents\models\ubl\cbc\ReturnableQuantity;
use horstoeko\invoicesuite\documents\models\ubl\cbc\SequenceNumberID;
use horstoeko\invoicesuite\documents\models\ubl\cbc\TraceID;
use horstoeko\invoicesuite\documents\models\ubl\cbc\ValueAmount;
use JMS\Serializer\Annotation as JMS;

class GoodsItemType
{
    use HandlesObjectFlags;

    /**
     * @var null|ID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\ID")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var null|SequenceNumberID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\SequenceNumberID")
     * @JMS\Expose
     * @JMS\SerializedName("SequenceNumberID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSequenceNumberID", setter="setSequenceNumberID")
     */
    private $sequenceNumberID;

    /**
     * @var null|array<Description>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cbc\Description>")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Description", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $description;

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
     * @var null|DeclaredCustomsValueAmount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\DeclaredCustomsValueAmount")
     * @JMS\Expose
     * @JMS\SerializedName("DeclaredCustomsValueAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDeclaredCustomsValueAmount", setter="setDeclaredCustomsValueAmount")
     */
    private $declaredCustomsValueAmount;

    /**
     * @var null|DeclaredForCarriageValueAmount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\DeclaredForCarriageValueAmount")
     * @JMS\Expose
     * @JMS\SerializedName("DeclaredForCarriageValueAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDeclaredForCarriageValueAmount", setter="setDeclaredForCarriageValueAmount")
     */
    private $declaredForCarriageValueAmount;

    /**
     * @var null|DeclaredStatisticsValueAmount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\DeclaredStatisticsValueAmount")
     * @JMS\Expose
     * @JMS\SerializedName("DeclaredStatisticsValueAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDeclaredStatisticsValueAmount", setter="setDeclaredStatisticsValueAmount")
     */
    private $declaredStatisticsValueAmount;

    /**
     * @var null|FreeOnBoardValueAmount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\FreeOnBoardValueAmount")
     * @JMS\Expose
     * @JMS\SerializedName("FreeOnBoardValueAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getFreeOnBoardValueAmount", setter="setFreeOnBoardValueAmount")
     */
    private $freeOnBoardValueAmount;

    /**
     * @var null|InsuranceValueAmount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\InsuranceValueAmount")
     * @JMS\Expose
     * @JMS\SerializedName("InsuranceValueAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getInsuranceValueAmount", setter="setInsuranceValueAmount")
     */
    private $insuranceValueAmount;

    /**
     * @var null|ValueAmount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\ValueAmount")
     * @JMS\Expose
     * @JMS\SerializedName("ValueAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getValueAmount", setter="setValueAmount")
     */
    private $valueAmount;

    /**
     * @var null|GrossWeightMeasure
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\GrossWeightMeasure")
     * @JMS\Expose
     * @JMS\SerializedName("GrossWeightMeasure")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getGrossWeightMeasure", setter="setGrossWeightMeasure")
     */
    private $grossWeightMeasure;

    /**
     * @var null|NetWeightMeasure
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\NetWeightMeasure")
     * @JMS\Expose
     * @JMS\SerializedName("NetWeightMeasure")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getNetWeightMeasure", setter="setNetWeightMeasure")
     */
    private $netWeightMeasure;

    /**
     * @var null|NetNetWeightMeasure
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\NetNetWeightMeasure")
     * @JMS\Expose
     * @JMS\SerializedName("NetNetWeightMeasure")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getNetNetWeightMeasure", setter="setNetNetWeightMeasure")
     */
    private $netNetWeightMeasure;

    /**
     * @var null|ChargeableWeightMeasure
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\ChargeableWeightMeasure")
     * @JMS\Expose
     * @JMS\SerializedName("ChargeableWeightMeasure")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getChargeableWeightMeasure", setter="setChargeableWeightMeasure")
     */
    private $chargeableWeightMeasure;

    /**
     * @var null|GrossVolumeMeasure
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\GrossVolumeMeasure")
     * @JMS\Expose
     * @JMS\SerializedName("GrossVolumeMeasure")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getGrossVolumeMeasure", setter="setGrossVolumeMeasure")
     */
    private $grossVolumeMeasure;

    /**
     * @var null|NetVolumeMeasure
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\NetVolumeMeasure")
     * @JMS\Expose
     * @JMS\SerializedName("NetVolumeMeasure")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getNetVolumeMeasure", setter="setNetVolumeMeasure")
     */
    private $netVolumeMeasure;

    /**
     * @var null|Quantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\Quantity")
     * @JMS\Expose
     * @JMS\SerializedName("Quantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getQuantity", setter="setQuantity")
     */
    private $quantity;

    /**
     * @var null|PreferenceCriterionCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\PreferenceCriterionCode")
     * @JMS\Expose
     * @JMS\SerializedName("PreferenceCriterionCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPreferenceCriterionCode", setter="setPreferenceCriterionCode")
     */
    private $preferenceCriterionCode;

    /**
     * @var null|RequiredCustomsID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\RequiredCustomsID")
     * @JMS\Expose
     * @JMS\SerializedName("RequiredCustomsID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRequiredCustomsID", setter="setRequiredCustomsID")
     */
    private $requiredCustomsID;

    /**
     * @var null|CustomsStatusCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\CustomsStatusCode")
     * @JMS\Expose
     * @JMS\SerializedName("CustomsStatusCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCustomsStatusCode", setter="setCustomsStatusCode")
     */
    private $customsStatusCode;

    /**
     * @var null|CustomsTariffQuantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\CustomsTariffQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("CustomsTariffQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCustomsTariffQuantity", setter="setCustomsTariffQuantity")
     */
    private $customsTariffQuantity;

    /**
     * @var null|bool
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("CustomsImportClassifiedIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCustomsImportClassifiedIndicator", setter="setCustomsImportClassifiedIndicator")
     */
    private $customsImportClassifiedIndicator;

    /**
     * @var null|ChargeableQuantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\ChargeableQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("ChargeableQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getChargeableQuantity", setter="setChargeableQuantity")
     */
    private $chargeableQuantity;

    /**
     * @var null|ReturnableQuantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\ReturnableQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("ReturnableQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getReturnableQuantity", setter="setReturnableQuantity")
     */
    private $returnableQuantity;

    /**
     * @var null|TraceID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\TraceID")
     * @JMS\Expose
     * @JMS\SerializedName("TraceID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTraceID", setter="setTraceID")
     */
    private $traceID;

    /**
     * @var null|array<Item>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\Item>")
     * @JMS\Expose
     * @JMS\SerializedName("Item")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Item", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getItem", setter="setItem")
     */
    private $item;

    /**
     * @var null|array<GoodsItemContainer>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\GoodsItemContainer>")
     * @JMS\Expose
     * @JMS\SerializedName("GoodsItemContainer")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="GoodsItemContainer", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getGoodsItemContainer", setter="setGoodsItemContainer")
     */
    private $goodsItemContainer;

    /**
     * @var null|array<FreightAllowanceCharge>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\FreightAllowanceCharge>")
     * @JMS\Expose
     * @JMS\SerializedName("FreightAllowanceCharge")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="FreightAllowanceCharge", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getFreightAllowanceCharge", setter="setFreightAllowanceCharge")
     */
    private $freightAllowanceCharge;

    /**
     * @var null|array<InvoiceLine>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\InvoiceLine>")
     * @JMS\Expose
     * @JMS\SerializedName("InvoiceLine")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="InvoiceLine", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getInvoiceLine", setter="setInvoiceLine")
     */
    private $invoiceLine;

    /**
     * @var null|array<Temperature>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\Temperature>")
     * @JMS\Expose
     * @JMS\SerializedName("Temperature")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Temperature", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getTemperature", setter="setTemperature")
     */
    private $temperature;

    /**
     * @var null|array<ContainedGoodsItem>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\ContainedGoodsItem>")
     * @JMS\Expose
     * @JMS\SerializedName("ContainedGoodsItem")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ContainedGoodsItem", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getContainedGoodsItem", setter="setContainedGoodsItem")
     */
    private $containedGoodsItem;

    /**
     * @var null|OriginAddress
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\OriginAddress")
     * @JMS\Expose
     * @JMS\SerializedName("OriginAddress")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOriginAddress", setter="setOriginAddress")
     */
    private $originAddress;

    /**
     * @var null|Delivery
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\Delivery")
     * @JMS\Expose
     * @JMS\SerializedName("Delivery")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDelivery", setter="setDelivery")
     */
    private $delivery;

    /**
     * @var null|Pickup
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\Pickup")
     * @JMS\Expose
     * @JMS\SerializedName("Pickup")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPickup", setter="setPickup")
     */
    private $pickup;

    /**
     * @var null|Despatch
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\Despatch")
     * @JMS\Expose
     * @JMS\SerializedName("Despatch")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDespatch", setter="setDespatch")
     */
    private $despatch;

    /**
     * @var null|array<MeasurementDimension>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\MeasurementDimension>")
     * @JMS\Expose
     * @JMS\SerializedName("MeasurementDimension")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="MeasurementDimension", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getMeasurementDimension", setter="setMeasurementDimension")
     */
    private $measurementDimension;

    /**
     * @var null|array<ContainingPackage>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\ContainingPackage>")
     * @JMS\Expose
     * @JMS\SerializedName("ContainingPackage")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ContainingPackage", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getContainingPackage", setter="setContainingPackage")
     */
    private $containingPackage;

    /**
     * @var null|ShipmentDocumentReference
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\ShipmentDocumentReference")
     * @JMS\Expose
     * @JMS\SerializedName("ShipmentDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getShipmentDocumentReference", setter="setShipmentDocumentReference")
     */
    private $shipmentDocumentReference;

    /**
     * @var null|MinimumTemperature
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\MinimumTemperature")
     * @JMS\Expose
     * @JMS\SerializedName("MinimumTemperature")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMinimumTemperature", setter="setMinimumTemperature")
     */
    private $minimumTemperature;

    /**
     * @var null|MaximumTemperature
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\MaximumTemperature")
     * @JMS\Expose
     * @JMS\SerializedName("MaximumTemperature")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMaximumTemperature", setter="setMaximumTemperature")
     */
    private $maximumTemperature;

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
     * @return null|SequenceNumberID
     */
    public function getSequenceNumberID(): ?SequenceNumberID
    {
        return $this->sequenceNumberID;
    }

    /**
     * @return SequenceNumberID
     */
    public function getSequenceNumberIDWithCreate(): SequenceNumberID
    {
        $this->sequenceNumberID = is_null($this->sequenceNumberID) ? new SequenceNumberID() : $this->sequenceNumberID;

        return $this->sequenceNumberID;
    }

    /**
     * @param  null|SequenceNumberID $sequenceNumberID
     * @return static
     */
    public function setSequenceNumberID(?SequenceNumberID $sequenceNumberID = null): static
    {
        $this->sequenceNumberID = $sequenceNumberID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSequenceNumberID(): static
    {
        $this->sequenceNumberID = null;

        return $this;
    }

    /**
     * @return null|array<Description>
     */
    public function getDescription(): ?array
    {
        return $this->description;
    }

    /**
     * @param  null|array<Description> $description
     * @return static
     */
    public function setDescription(?array $description = null): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDescription(): static
    {
        $this->description = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearDescription(): static
    {
        $this->description = [];

        return $this;
    }

    /**
     * @return null|Description
     */
    public function firstDescription(): ?Description
    {
        $description = $this->description ?? [];
        $description = reset($description);

        if (false === $description) {
            return null;
        }

        return $description;
    }

    /**
     * @return null|Description
     */
    public function lastDescription(): ?Description
    {
        $description = $this->description ?? [];
        $description = end($description);

        if (false === $description) {
            return null;
        }

        return $description;
    }

    /**
     * @param  Description $description
     * @return static
     */
    public function addToDescription(Description $description): static
    {
        $this->description[] = $description;

        return $this;
    }

    /**
     * @return Description
     */
    public function addToDescriptionWithCreate(): Description
    {
        $this->addTodescription($description = new Description());

        return $description;
    }

    /**
     * @param  Description $description
     * @return static
     */
    public function addOnceToDescription(Description $description): static
    {
        if (!is_array($this->description)) {
            $this->description = [];
        }

        $this->description[0] = $description;

        return $this;
    }

    /**
     * @return Description
     */
    public function addOnceToDescriptionWithCreate(): Description
    {
        if (!is_array($this->description)) {
            $this->description = [];
        }

        if ([] === $this->description) {
            $this->addOnceTodescription(new Description());
        }

        return $this->description[0];
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
     * @return null|DeclaredCustomsValueAmount
     */
    public function getDeclaredCustomsValueAmount(): ?DeclaredCustomsValueAmount
    {
        return $this->declaredCustomsValueAmount;
    }

    /**
     * @return DeclaredCustomsValueAmount
     */
    public function getDeclaredCustomsValueAmountWithCreate(): DeclaredCustomsValueAmount
    {
        $this->declaredCustomsValueAmount = is_null($this->declaredCustomsValueAmount) ? new DeclaredCustomsValueAmount() : $this->declaredCustomsValueAmount;

        return $this->declaredCustomsValueAmount;
    }

    /**
     * @param  null|DeclaredCustomsValueAmount $declaredCustomsValueAmount
     * @return static
     */
    public function setDeclaredCustomsValueAmount(
        ?DeclaredCustomsValueAmount $declaredCustomsValueAmount = null,
    ): static {
        $this->declaredCustomsValueAmount = $declaredCustomsValueAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDeclaredCustomsValueAmount(): static
    {
        $this->declaredCustomsValueAmount = null;

        return $this;
    }

    /**
     * @return null|DeclaredForCarriageValueAmount
     */
    public function getDeclaredForCarriageValueAmount(): ?DeclaredForCarriageValueAmount
    {
        return $this->declaredForCarriageValueAmount;
    }

    /**
     * @return DeclaredForCarriageValueAmount
     */
    public function getDeclaredForCarriageValueAmountWithCreate(): DeclaredForCarriageValueAmount
    {
        $this->declaredForCarriageValueAmount = is_null($this->declaredForCarriageValueAmount) ? new DeclaredForCarriageValueAmount() : $this->declaredForCarriageValueAmount;

        return $this->declaredForCarriageValueAmount;
    }

    /**
     * @param  null|DeclaredForCarriageValueAmount $declaredForCarriageValueAmount
     * @return static
     */
    public function setDeclaredForCarriageValueAmount(
        ?DeclaredForCarriageValueAmount $declaredForCarriageValueAmount = null,
    ): static {
        $this->declaredForCarriageValueAmount = $declaredForCarriageValueAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDeclaredForCarriageValueAmount(): static
    {
        $this->declaredForCarriageValueAmount = null;

        return $this;
    }

    /**
     * @return null|DeclaredStatisticsValueAmount
     */
    public function getDeclaredStatisticsValueAmount(): ?DeclaredStatisticsValueAmount
    {
        return $this->declaredStatisticsValueAmount;
    }

    /**
     * @return DeclaredStatisticsValueAmount
     */
    public function getDeclaredStatisticsValueAmountWithCreate(): DeclaredStatisticsValueAmount
    {
        $this->declaredStatisticsValueAmount = is_null($this->declaredStatisticsValueAmount) ? new DeclaredStatisticsValueAmount() : $this->declaredStatisticsValueAmount;

        return $this->declaredStatisticsValueAmount;
    }

    /**
     * @param  null|DeclaredStatisticsValueAmount $declaredStatisticsValueAmount
     * @return static
     */
    public function setDeclaredStatisticsValueAmount(
        ?DeclaredStatisticsValueAmount $declaredStatisticsValueAmount = null,
    ): static {
        $this->declaredStatisticsValueAmount = $declaredStatisticsValueAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDeclaredStatisticsValueAmount(): static
    {
        $this->declaredStatisticsValueAmount = null;

        return $this;
    }

    /**
     * @return null|FreeOnBoardValueAmount
     */
    public function getFreeOnBoardValueAmount(): ?FreeOnBoardValueAmount
    {
        return $this->freeOnBoardValueAmount;
    }

    /**
     * @return FreeOnBoardValueAmount
     */
    public function getFreeOnBoardValueAmountWithCreate(): FreeOnBoardValueAmount
    {
        $this->freeOnBoardValueAmount = is_null($this->freeOnBoardValueAmount) ? new FreeOnBoardValueAmount() : $this->freeOnBoardValueAmount;

        return $this->freeOnBoardValueAmount;
    }

    /**
     * @param  null|FreeOnBoardValueAmount $freeOnBoardValueAmount
     * @return static
     */
    public function setFreeOnBoardValueAmount(?FreeOnBoardValueAmount $freeOnBoardValueAmount = null): static
    {
        $this->freeOnBoardValueAmount = $freeOnBoardValueAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetFreeOnBoardValueAmount(): static
    {
        $this->freeOnBoardValueAmount = null;

        return $this;
    }

    /**
     * @return null|InsuranceValueAmount
     */
    public function getInsuranceValueAmount(): ?InsuranceValueAmount
    {
        return $this->insuranceValueAmount;
    }

    /**
     * @return InsuranceValueAmount
     */
    public function getInsuranceValueAmountWithCreate(): InsuranceValueAmount
    {
        $this->insuranceValueAmount = is_null($this->insuranceValueAmount) ? new InsuranceValueAmount() : $this->insuranceValueAmount;

        return $this->insuranceValueAmount;
    }

    /**
     * @param  null|InsuranceValueAmount $insuranceValueAmount
     * @return static
     */
    public function setInsuranceValueAmount(?InsuranceValueAmount $insuranceValueAmount = null): static
    {
        $this->insuranceValueAmount = $insuranceValueAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetInsuranceValueAmount(): static
    {
        $this->insuranceValueAmount = null;

        return $this;
    }

    /**
     * @return null|ValueAmount
     */
    public function getValueAmount(): ?ValueAmount
    {
        return $this->valueAmount;
    }

    /**
     * @return ValueAmount
     */
    public function getValueAmountWithCreate(): ValueAmount
    {
        $this->valueAmount = is_null($this->valueAmount) ? new ValueAmount() : $this->valueAmount;

        return $this->valueAmount;
    }

    /**
     * @param  null|ValueAmount $valueAmount
     * @return static
     */
    public function setValueAmount(?ValueAmount $valueAmount = null): static
    {
        $this->valueAmount = $valueAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetValueAmount(): static
    {
        $this->valueAmount = null;

        return $this;
    }

    /**
     * @return null|GrossWeightMeasure
     */
    public function getGrossWeightMeasure(): ?GrossWeightMeasure
    {
        return $this->grossWeightMeasure;
    }

    /**
     * @return GrossWeightMeasure
     */
    public function getGrossWeightMeasureWithCreate(): GrossWeightMeasure
    {
        $this->grossWeightMeasure = is_null($this->grossWeightMeasure) ? new GrossWeightMeasure() : $this->grossWeightMeasure;

        return $this->grossWeightMeasure;
    }

    /**
     * @param  null|GrossWeightMeasure $grossWeightMeasure
     * @return static
     */
    public function setGrossWeightMeasure(?GrossWeightMeasure $grossWeightMeasure = null): static
    {
        $this->grossWeightMeasure = $grossWeightMeasure;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetGrossWeightMeasure(): static
    {
        $this->grossWeightMeasure = null;

        return $this;
    }

    /**
     * @return null|NetWeightMeasure
     */
    public function getNetWeightMeasure(): ?NetWeightMeasure
    {
        return $this->netWeightMeasure;
    }

    /**
     * @return NetWeightMeasure
     */
    public function getNetWeightMeasureWithCreate(): NetWeightMeasure
    {
        $this->netWeightMeasure = is_null($this->netWeightMeasure) ? new NetWeightMeasure() : $this->netWeightMeasure;

        return $this->netWeightMeasure;
    }

    /**
     * @param  null|NetWeightMeasure $netWeightMeasure
     * @return static
     */
    public function setNetWeightMeasure(?NetWeightMeasure $netWeightMeasure = null): static
    {
        $this->netWeightMeasure = $netWeightMeasure;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetNetWeightMeasure(): static
    {
        $this->netWeightMeasure = null;

        return $this;
    }

    /**
     * @return null|NetNetWeightMeasure
     */
    public function getNetNetWeightMeasure(): ?NetNetWeightMeasure
    {
        return $this->netNetWeightMeasure;
    }

    /**
     * @return NetNetWeightMeasure
     */
    public function getNetNetWeightMeasureWithCreate(): NetNetWeightMeasure
    {
        $this->netNetWeightMeasure = is_null($this->netNetWeightMeasure) ? new NetNetWeightMeasure() : $this->netNetWeightMeasure;

        return $this->netNetWeightMeasure;
    }

    /**
     * @param  null|NetNetWeightMeasure $netNetWeightMeasure
     * @return static
     */
    public function setNetNetWeightMeasure(?NetNetWeightMeasure $netNetWeightMeasure = null): static
    {
        $this->netNetWeightMeasure = $netNetWeightMeasure;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetNetNetWeightMeasure(): static
    {
        $this->netNetWeightMeasure = null;

        return $this;
    }

    /**
     * @return null|ChargeableWeightMeasure
     */
    public function getChargeableWeightMeasure(): ?ChargeableWeightMeasure
    {
        return $this->chargeableWeightMeasure;
    }

    /**
     * @return ChargeableWeightMeasure
     */
    public function getChargeableWeightMeasureWithCreate(): ChargeableWeightMeasure
    {
        $this->chargeableWeightMeasure = is_null($this->chargeableWeightMeasure) ? new ChargeableWeightMeasure() : $this->chargeableWeightMeasure;

        return $this->chargeableWeightMeasure;
    }

    /**
     * @param  null|ChargeableWeightMeasure $chargeableWeightMeasure
     * @return static
     */
    public function setChargeableWeightMeasure(?ChargeableWeightMeasure $chargeableWeightMeasure = null): static
    {
        $this->chargeableWeightMeasure = $chargeableWeightMeasure;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetChargeableWeightMeasure(): static
    {
        $this->chargeableWeightMeasure = null;

        return $this;
    }

    /**
     * @return null|GrossVolumeMeasure
     */
    public function getGrossVolumeMeasure(): ?GrossVolumeMeasure
    {
        return $this->grossVolumeMeasure;
    }

    /**
     * @return GrossVolumeMeasure
     */
    public function getGrossVolumeMeasureWithCreate(): GrossVolumeMeasure
    {
        $this->grossVolumeMeasure = is_null($this->grossVolumeMeasure) ? new GrossVolumeMeasure() : $this->grossVolumeMeasure;

        return $this->grossVolumeMeasure;
    }

    /**
     * @param  null|GrossVolumeMeasure $grossVolumeMeasure
     * @return static
     */
    public function setGrossVolumeMeasure(?GrossVolumeMeasure $grossVolumeMeasure = null): static
    {
        $this->grossVolumeMeasure = $grossVolumeMeasure;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetGrossVolumeMeasure(): static
    {
        $this->grossVolumeMeasure = null;

        return $this;
    }

    /**
     * @return null|NetVolumeMeasure
     */
    public function getNetVolumeMeasure(): ?NetVolumeMeasure
    {
        return $this->netVolumeMeasure;
    }

    /**
     * @return NetVolumeMeasure
     */
    public function getNetVolumeMeasureWithCreate(): NetVolumeMeasure
    {
        $this->netVolumeMeasure = is_null($this->netVolumeMeasure) ? new NetVolumeMeasure() : $this->netVolumeMeasure;

        return $this->netVolumeMeasure;
    }

    /**
     * @param  null|NetVolumeMeasure $netVolumeMeasure
     * @return static
     */
    public function setNetVolumeMeasure(?NetVolumeMeasure $netVolumeMeasure = null): static
    {
        $this->netVolumeMeasure = $netVolumeMeasure;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetNetVolumeMeasure(): static
    {
        $this->netVolumeMeasure = null;

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
        $this->quantity = is_null($this->quantity) ? new Quantity() : $this->quantity;

        return $this->quantity;
    }

    /**
     * @param  null|Quantity $quantity
     * @return static
     */
    public function setQuantity(?Quantity $quantity = null): static
    {
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
     * @return null|PreferenceCriterionCode
     */
    public function getPreferenceCriterionCode(): ?PreferenceCriterionCode
    {
        return $this->preferenceCriterionCode;
    }

    /**
     * @return PreferenceCriterionCode
     */
    public function getPreferenceCriterionCodeWithCreate(): PreferenceCriterionCode
    {
        $this->preferenceCriterionCode = is_null($this->preferenceCriterionCode) ? new PreferenceCriterionCode() : $this->preferenceCriterionCode;

        return $this->preferenceCriterionCode;
    }

    /**
     * @param  null|PreferenceCriterionCode $preferenceCriterionCode
     * @return static
     */
    public function setPreferenceCriterionCode(?PreferenceCriterionCode $preferenceCriterionCode = null): static
    {
        $this->preferenceCriterionCode = $preferenceCriterionCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPreferenceCriterionCode(): static
    {
        $this->preferenceCriterionCode = null;

        return $this;
    }

    /**
     * @return null|RequiredCustomsID
     */
    public function getRequiredCustomsID(): ?RequiredCustomsID
    {
        return $this->requiredCustomsID;
    }

    /**
     * @return RequiredCustomsID
     */
    public function getRequiredCustomsIDWithCreate(): RequiredCustomsID
    {
        $this->requiredCustomsID = is_null($this->requiredCustomsID) ? new RequiredCustomsID() : $this->requiredCustomsID;

        return $this->requiredCustomsID;
    }

    /**
     * @param  null|RequiredCustomsID $requiredCustomsID
     * @return static
     */
    public function setRequiredCustomsID(?RequiredCustomsID $requiredCustomsID = null): static
    {
        $this->requiredCustomsID = $requiredCustomsID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRequiredCustomsID(): static
    {
        $this->requiredCustomsID = null;

        return $this;
    }

    /**
     * @return null|CustomsStatusCode
     */
    public function getCustomsStatusCode(): ?CustomsStatusCode
    {
        return $this->customsStatusCode;
    }

    /**
     * @return CustomsStatusCode
     */
    public function getCustomsStatusCodeWithCreate(): CustomsStatusCode
    {
        $this->customsStatusCode = is_null($this->customsStatusCode) ? new CustomsStatusCode() : $this->customsStatusCode;

        return $this->customsStatusCode;
    }

    /**
     * @param  null|CustomsStatusCode $customsStatusCode
     * @return static
     */
    public function setCustomsStatusCode(?CustomsStatusCode $customsStatusCode = null): static
    {
        $this->customsStatusCode = $customsStatusCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCustomsStatusCode(): static
    {
        $this->customsStatusCode = null;

        return $this;
    }

    /**
     * @return null|CustomsTariffQuantity
     */
    public function getCustomsTariffQuantity(): ?CustomsTariffQuantity
    {
        return $this->customsTariffQuantity;
    }

    /**
     * @return CustomsTariffQuantity
     */
    public function getCustomsTariffQuantityWithCreate(): CustomsTariffQuantity
    {
        $this->customsTariffQuantity = is_null($this->customsTariffQuantity) ? new CustomsTariffQuantity() : $this->customsTariffQuantity;

        return $this->customsTariffQuantity;
    }

    /**
     * @param  null|CustomsTariffQuantity $customsTariffQuantity
     * @return static
     */
    public function setCustomsTariffQuantity(?CustomsTariffQuantity $customsTariffQuantity = null): static
    {
        $this->customsTariffQuantity = $customsTariffQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCustomsTariffQuantity(): static
    {
        $this->customsTariffQuantity = null;

        return $this;
    }

    /**
     * @return null|bool
     */
    public function getCustomsImportClassifiedIndicator(): ?bool
    {
        return $this->customsImportClassifiedIndicator;
    }

    /**
     * @param  null|bool $customsImportClassifiedIndicator
     * @return static
     */
    public function setCustomsImportClassifiedIndicator(?bool $customsImportClassifiedIndicator = null): static
    {
        $this->customsImportClassifiedIndicator = $customsImportClassifiedIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCustomsImportClassifiedIndicator(): static
    {
        $this->customsImportClassifiedIndicator = null;

        return $this;
    }

    /**
     * @return null|ChargeableQuantity
     */
    public function getChargeableQuantity(): ?ChargeableQuantity
    {
        return $this->chargeableQuantity;
    }

    /**
     * @return ChargeableQuantity
     */
    public function getChargeableQuantityWithCreate(): ChargeableQuantity
    {
        $this->chargeableQuantity = is_null($this->chargeableQuantity) ? new ChargeableQuantity() : $this->chargeableQuantity;

        return $this->chargeableQuantity;
    }

    /**
     * @param  null|ChargeableQuantity $chargeableQuantity
     * @return static
     */
    public function setChargeableQuantity(?ChargeableQuantity $chargeableQuantity = null): static
    {
        $this->chargeableQuantity = $chargeableQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetChargeableQuantity(): static
    {
        $this->chargeableQuantity = null;

        return $this;
    }

    /**
     * @return null|ReturnableQuantity
     */
    public function getReturnableQuantity(): ?ReturnableQuantity
    {
        return $this->returnableQuantity;
    }

    /**
     * @return ReturnableQuantity
     */
    public function getReturnableQuantityWithCreate(): ReturnableQuantity
    {
        $this->returnableQuantity = is_null($this->returnableQuantity) ? new ReturnableQuantity() : $this->returnableQuantity;

        return $this->returnableQuantity;
    }

    /**
     * @param  null|ReturnableQuantity $returnableQuantity
     * @return static
     */
    public function setReturnableQuantity(?ReturnableQuantity $returnableQuantity = null): static
    {
        $this->returnableQuantity = $returnableQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetReturnableQuantity(): static
    {
        $this->returnableQuantity = null;

        return $this;
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
     * @return null|array<Item>
     */
    public function getItem(): ?array
    {
        return $this->item;
    }

    /**
     * @param  null|array<Item> $item
     * @return static
     */
    public function setItem(?array $item = null): static
    {
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
     * @return static
     */
    public function clearItem(): static
    {
        $this->item = [];

        return $this;
    }

    /**
     * @return null|Item
     */
    public function firstItem(): ?Item
    {
        $item = $this->item ?? [];
        $item = reset($item);

        if (false === $item) {
            return null;
        }

        return $item;
    }

    /**
     * @return null|Item
     */
    public function lastItem(): ?Item
    {
        $item = $this->item ?? [];
        $item = end($item);

        if (false === $item) {
            return null;
        }

        return $item;
    }

    /**
     * @param  Item   $item
     * @return static
     */
    public function addToItem(Item $item): static
    {
        $this->item[] = $item;

        return $this;
    }

    /**
     * @return Item
     */
    public function addToItemWithCreate(): Item
    {
        $this->addToitem($item = new Item());

        return $item;
    }

    /**
     * @param  Item   $item
     * @return static
     */
    public function addOnceToItem(Item $item): static
    {
        if (!is_array($this->item)) {
            $this->item = [];
        }

        $this->item[0] = $item;

        return $this;
    }

    /**
     * @return Item
     */
    public function addOnceToItemWithCreate(): Item
    {
        if (!is_array($this->item)) {
            $this->item = [];
        }

        if ([] === $this->item) {
            $this->addOnceToitem(new Item());
        }

        return $this->item[0];
    }

    /**
     * @return null|array<GoodsItemContainer>
     */
    public function getGoodsItemContainer(): ?array
    {
        return $this->goodsItemContainer;
    }

    /**
     * @param  null|array<GoodsItemContainer> $goodsItemContainer
     * @return static
     */
    public function setGoodsItemContainer(?array $goodsItemContainer = null): static
    {
        $this->goodsItemContainer = $goodsItemContainer;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetGoodsItemContainer(): static
    {
        $this->goodsItemContainer = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearGoodsItemContainer(): static
    {
        $this->goodsItemContainer = [];

        return $this;
    }

    /**
     * @return null|GoodsItemContainer
     */
    public function firstGoodsItemContainer(): ?GoodsItemContainer
    {
        $goodsItemContainer = $this->goodsItemContainer ?? [];
        $goodsItemContainer = reset($goodsItemContainer);

        if (false === $goodsItemContainer) {
            return null;
        }

        return $goodsItemContainer;
    }

    /**
     * @return null|GoodsItemContainer
     */
    public function lastGoodsItemContainer(): ?GoodsItemContainer
    {
        $goodsItemContainer = $this->goodsItemContainer ?? [];
        $goodsItemContainer = end($goodsItemContainer);

        if (false === $goodsItemContainer) {
            return null;
        }

        return $goodsItemContainer;
    }

    /**
     * @param  GoodsItemContainer $goodsItemContainer
     * @return static
     */
    public function addToGoodsItemContainer(GoodsItemContainer $goodsItemContainer): static
    {
        $this->goodsItemContainer[] = $goodsItemContainer;

        return $this;
    }

    /**
     * @return GoodsItemContainer
     */
    public function addToGoodsItemContainerWithCreate(): GoodsItemContainer
    {
        $this->addTogoodsItemContainer($goodsItemContainer = new GoodsItemContainer());

        return $goodsItemContainer;
    }

    /**
     * @param  GoodsItemContainer $goodsItemContainer
     * @return static
     */
    public function addOnceToGoodsItemContainer(GoodsItemContainer $goodsItemContainer): static
    {
        if (!is_array($this->goodsItemContainer)) {
            $this->goodsItemContainer = [];
        }

        $this->goodsItemContainer[0] = $goodsItemContainer;

        return $this;
    }

    /**
     * @return GoodsItemContainer
     */
    public function addOnceToGoodsItemContainerWithCreate(): GoodsItemContainer
    {
        if (!is_array($this->goodsItemContainer)) {
            $this->goodsItemContainer = [];
        }

        if ([] === $this->goodsItemContainer) {
            $this->addOnceTogoodsItemContainer(new GoodsItemContainer());
        }

        return $this->goodsItemContainer[0];
    }

    /**
     * @return null|array<FreightAllowanceCharge>
     */
    public function getFreightAllowanceCharge(): ?array
    {
        return $this->freightAllowanceCharge;
    }

    /**
     * @param  null|array<FreightAllowanceCharge> $freightAllowanceCharge
     * @return static
     */
    public function setFreightAllowanceCharge(?array $freightAllowanceCharge = null): static
    {
        $this->freightAllowanceCharge = $freightAllowanceCharge;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetFreightAllowanceCharge(): static
    {
        $this->freightAllowanceCharge = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearFreightAllowanceCharge(): static
    {
        $this->freightAllowanceCharge = [];

        return $this;
    }

    /**
     * @return null|FreightAllowanceCharge
     */
    public function firstFreightAllowanceCharge(): ?FreightAllowanceCharge
    {
        $freightAllowanceCharge = $this->freightAllowanceCharge ?? [];
        $freightAllowanceCharge = reset($freightAllowanceCharge);

        if (false === $freightAllowanceCharge) {
            return null;
        }

        return $freightAllowanceCharge;
    }

    /**
     * @return null|FreightAllowanceCharge
     */
    public function lastFreightAllowanceCharge(): ?FreightAllowanceCharge
    {
        $freightAllowanceCharge = $this->freightAllowanceCharge ?? [];
        $freightAllowanceCharge = end($freightAllowanceCharge);

        if (false === $freightAllowanceCharge) {
            return null;
        }

        return $freightAllowanceCharge;
    }

    /**
     * @param  FreightAllowanceCharge $freightAllowanceCharge
     * @return static
     */
    public function addToFreightAllowanceCharge(FreightAllowanceCharge $freightAllowanceCharge): static
    {
        $this->freightAllowanceCharge[] = $freightAllowanceCharge;

        return $this;
    }

    /**
     * @return FreightAllowanceCharge
     */
    public function addToFreightAllowanceChargeWithCreate(): FreightAllowanceCharge
    {
        $this->addTofreightAllowanceCharge($freightAllowanceCharge = new FreightAllowanceCharge());

        return $freightAllowanceCharge;
    }

    /**
     * @param  FreightAllowanceCharge $freightAllowanceCharge
     * @return static
     */
    public function addOnceToFreightAllowanceCharge(FreightAllowanceCharge $freightAllowanceCharge): static
    {
        if (!is_array($this->freightAllowanceCharge)) {
            $this->freightAllowanceCharge = [];
        }

        $this->freightAllowanceCharge[0] = $freightAllowanceCharge;

        return $this;
    }

    /**
     * @return FreightAllowanceCharge
     */
    public function addOnceToFreightAllowanceChargeWithCreate(): FreightAllowanceCharge
    {
        if (!is_array($this->freightAllowanceCharge)) {
            $this->freightAllowanceCharge = [];
        }

        if ([] === $this->freightAllowanceCharge) {
            $this->addOnceTofreightAllowanceCharge(new FreightAllowanceCharge());
        }

        return $this->freightAllowanceCharge[0];
    }

    /**
     * @return null|array<InvoiceLine>
     */
    public function getInvoiceLine(): ?array
    {
        return $this->invoiceLine;
    }

    /**
     * @param  null|array<InvoiceLine> $invoiceLine
     * @return static
     */
    public function setInvoiceLine(?array $invoiceLine = null): static
    {
        $this->invoiceLine = $invoiceLine;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetInvoiceLine(): static
    {
        $this->invoiceLine = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearInvoiceLine(): static
    {
        $this->invoiceLine = [];

        return $this;
    }

    /**
     * @return null|InvoiceLine
     */
    public function firstInvoiceLine(): ?InvoiceLine
    {
        $invoiceLine = $this->invoiceLine ?? [];
        $invoiceLine = reset($invoiceLine);

        if (false === $invoiceLine) {
            return null;
        }

        return $invoiceLine;
    }

    /**
     * @return null|InvoiceLine
     */
    public function lastInvoiceLine(): ?InvoiceLine
    {
        $invoiceLine = $this->invoiceLine ?? [];
        $invoiceLine = end($invoiceLine);

        if (false === $invoiceLine) {
            return null;
        }

        return $invoiceLine;
    }

    /**
     * @param  InvoiceLine $invoiceLine
     * @return static
     */
    public function addToInvoiceLine(InvoiceLine $invoiceLine): static
    {
        $this->invoiceLine[] = $invoiceLine;

        return $this;
    }

    /**
     * @return InvoiceLine
     */
    public function addToInvoiceLineWithCreate(): InvoiceLine
    {
        $this->addToinvoiceLine($invoiceLine = new InvoiceLine());

        return $invoiceLine;
    }

    /**
     * @param  InvoiceLine $invoiceLine
     * @return static
     */
    public function addOnceToInvoiceLine(InvoiceLine $invoiceLine): static
    {
        if (!is_array($this->invoiceLine)) {
            $this->invoiceLine = [];
        }

        $this->invoiceLine[0] = $invoiceLine;

        return $this;
    }

    /**
     * @return InvoiceLine
     */
    public function addOnceToInvoiceLineWithCreate(): InvoiceLine
    {
        if (!is_array($this->invoiceLine)) {
            $this->invoiceLine = [];
        }

        if ([] === $this->invoiceLine) {
            $this->addOnceToinvoiceLine(new InvoiceLine());
        }

        return $this->invoiceLine[0];
    }

    /**
     * @return null|array<Temperature>
     */
    public function getTemperature(): ?array
    {
        return $this->temperature;
    }

    /**
     * @param  null|array<Temperature> $temperature
     * @return static
     */
    public function setTemperature(?array $temperature = null): static
    {
        $this->temperature = $temperature;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTemperature(): static
    {
        $this->temperature = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearTemperature(): static
    {
        $this->temperature = [];

        return $this;
    }

    /**
     * @return null|Temperature
     */
    public function firstTemperature(): ?Temperature
    {
        $temperature = $this->temperature ?? [];
        $temperature = reset($temperature);

        if (false === $temperature) {
            return null;
        }

        return $temperature;
    }

    /**
     * @return null|Temperature
     */
    public function lastTemperature(): ?Temperature
    {
        $temperature = $this->temperature ?? [];
        $temperature = end($temperature);

        if (false === $temperature) {
            return null;
        }

        return $temperature;
    }

    /**
     * @param  Temperature $temperature
     * @return static
     */
    public function addToTemperature(Temperature $temperature): static
    {
        $this->temperature[] = $temperature;

        return $this;
    }

    /**
     * @return Temperature
     */
    public function addToTemperatureWithCreate(): Temperature
    {
        $this->addTotemperature($temperature = new Temperature());

        return $temperature;
    }

    /**
     * @param  Temperature $temperature
     * @return static
     */
    public function addOnceToTemperature(Temperature $temperature): static
    {
        if (!is_array($this->temperature)) {
            $this->temperature = [];
        }

        $this->temperature[0] = $temperature;

        return $this;
    }

    /**
     * @return Temperature
     */
    public function addOnceToTemperatureWithCreate(): Temperature
    {
        if (!is_array($this->temperature)) {
            $this->temperature = [];
        }

        if ([] === $this->temperature) {
            $this->addOnceTotemperature(new Temperature());
        }

        return $this->temperature[0];
    }

    /**
     * @return null|array<ContainedGoodsItem>
     */
    public function getContainedGoodsItem(): ?array
    {
        return $this->containedGoodsItem;
    }

    /**
     * @param  null|array<ContainedGoodsItem> $containedGoodsItem
     * @return static
     */
    public function setContainedGoodsItem(?array $containedGoodsItem = null): static
    {
        $this->containedGoodsItem = $containedGoodsItem;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetContainedGoodsItem(): static
    {
        $this->containedGoodsItem = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearContainedGoodsItem(): static
    {
        $this->containedGoodsItem = [];

        return $this;
    }

    /**
     * @return null|ContainedGoodsItem
     */
    public function firstContainedGoodsItem(): ?ContainedGoodsItem
    {
        $containedGoodsItem = $this->containedGoodsItem ?? [];
        $containedGoodsItem = reset($containedGoodsItem);

        if (false === $containedGoodsItem) {
            return null;
        }

        return $containedGoodsItem;
    }

    /**
     * @return null|ContainedGoodsItem
     */
    public function lastContainedGoodsItem(): ?ContainedGoodsItem
    {
        $containedGoodsItem = $this->containedGoodsItem ?? [];
        $containedGoodsItem = end($containedGoodsItem);

        if (false === $containedGoodsItem) {
            return null;
        }

        return $containedGoodsItem;
    }

    /**
     * @param  ContainedGoodsItem $containedGoodsItem
     * @return static
     */
    public function addToContainedGoodsItem(ContainedGoodsItem $containedGoodsItem): static
    {
        $this->containedGoodsItem[] = $containedGoodsItem;

        return $this;
    }

    /**
     * @return ContainedGoodsItem
     */
    public function addToContainedGoodsItemWithCreate(): ContainedGoodsItem
    {
        $this->addTocontainedGoodsItem($containedGoodsItem = new ContainedGoodsItem());

        return $containedGoodsItem;
    }

    /**
     * @param  ContainedGoodsItem $containedGoodsItem
     * @return static
     */
    public function addOnceToContainedGoodsItem(ContainedGoodsItem $containedGoodsItem): static
    {
        if (!is_array($this->containedGoodsItem)) {
            $this->containedGoodsItem = [];
        }

        $this->containedGoodsItem[0] = $containedGoodsItem;

        return $this;
    }

    /**
     * @return ContainedGoodsItem
     */
    public function addOnceToContainedGoodsItemWithCreate(): ContainedGoodsItem
    {
        if (!is_array($this->containedGoodsItem)) {
            $this->containedGoodsItem = [];
        }

        if ([] === $this->containedGoodsItem) {
            $this->addOnceTocontainedGoodsItem(new ContainedGoodsItem());
        }

        return $this->containedGoodsItem[0];
    }

    /**
     * @return null|OriginAddress
     */
    public function getOriginAddress(): ?OriginAddress
    {
        return $this->originAddress;
    }

    /**
     * @return OriginAddress
     */
    public function getOriginAddressWithCreate(): OriginAddress
    {
        $this->originAddress = is_null($this->originAddress) ? new OriginAddress() : $this->originAddress;

        return $this->originAddress;
    }

    /**
     * @param  null|OriginAddress $originAddress
     * @return static
     */
    public function setOriginAddress(?OriginAddress $originAddress = null): static
    {
        $this->originAddress = $originAddress;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetOriginAddress(): static
    {
        $this->originAddress = null;

        return $this;
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
        $this->delivery = is_null($this->delivery) ? new Delivery() : $this->delivery;

        return $this->delivery;
    }

    /**
     * @param  null|Delivery $delivery
     * @return static
     */
    public function setDelivery(?Delivery $delivery = null): static
    {
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
        $this->pickup = is_null($this->pickup) ? new Pickup() : $this->pickup;

        return $this->pickup;
    }

    /**
     * @param  null|Pickup $pickup
     * @return static
     */
    public function setPickup(?Pickup $pickup = null): static
    {
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
        $this->despatch = is_null($this->despatch) ? new Despatch() : $this->despatch;

        return $this->despatch;
    }

    /**
     * @param  null|Despatch $despatch
     * @return static
     */
    public function setDespatch(?Despatch $despatch = null): static
    {
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
     * @return null|array<ContainingPackage>
     */
    public function getContainingPackage(): ?array
    {
        return $this->containingPackage;
    }

    /**
     * @param  null|array<ContainingPackage> $containingPackage
     * @return static
     */
    public function setContainingPackage(?array $containingPackage = null): static
    {
        $this->containingPackage = $containingPackage;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetContainingPackage(): static
    {
        $this->containingPackage = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearContainingPackage(): static
    {
        $this->containingPackage = [];

        return $this;
    }

    /**
     * @return null|ContainingPackage
     */
    public function firstContainingPackage(): ?ContainingPackage
    {
        $containingPackage = $this->containingPackage ?? [];
        $containingPackage = reset($containingPackage);

        if (false === $containingPackage) {
            return null;
        }

        return $containingPackage;
    }

    /**
     * @return null|ContainingPackage
     */
    public function lastContainingPackage(): ?ContainingPackage
    {
        $containingPackage = $this->containingPackage ?? [];
        $containingPackage = end($containingPackage);

        if (false === $containingPackage) {
            return null;
        }

        return $containingPackage;
    }

    /**
     * @param  ContainingPackage $containingPackage
     * @return static
     */
    public function addToContainingPackage(ContainingPackage $containingPackage): static
    {
        $this->containingPackage[] = $containingPackage;

        return $this;
    }

    /**
     * @return ContainingPackage
     */
    public function addToContainingPackageWithCreate(): ContainingPackage
    {
        $this->addTocontainingPackage($containingPackage = new ContainingPackage());

        return $containingPackage;
    }

    /**
     * @param  ContainingPackage $containingPackage
     * @return static
     */
    public function addOnceToContainingPackage(ContainingPackage $containingPackage): static
    {
        if (!is_array($this->containingPackage)) {
            $this->containingPackage = [];
        }

        $this->containingPackage[0] = $containingPackage;

        return $this;
    }

    /**
     * @return ContainingPackage
     */
    public function addOnceToContainingPackageWithCreate(): ContainingPackage
    {
        if (!is_array($this->containingPackage)) {
            $this->containingPackage = [];
        }

        if ([] === $this->containingPackage) {
            $this->addOnceTocontainingPackage(new ContainingPackage());
        }

        return $this->containingPackage[0];
    }

    /**
     * @return null|ShipmentDocumentReference
     */
    public function getShipmentDocumentReference(): ?ShipmentDocumentReference
    {
        return $this->shipmentDocumentReference;
    }

    /**
     * @return ShipmentDocumentReference
     */
    public function getShipmentDocumentReferenceWithCreate(): ShipmentDocumentReference
    {
        $this->shipmentDocumentReference = is_null($this->shipmentDocumentReference) ? new ShipmentDocumentReference() : $this->shipmentDocumentReference;

        return $this->shipmentDocumentReference;
    }

    /**
     * @param  null|ShipmentDocumentReference $shipmentDocumentReference
     * @return static
     */
    public function setShipmentDocumentReference(?ShipmentDocumentReference $shipmentDocumentReference = null): static
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
}
