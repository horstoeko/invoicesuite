<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\ChargeableQuantity;
use horstoeko\invoicesuite\models\ubl\cbc\ChargeableWeightMeasure;
use horstoeko\invoicesuite\models\ubl\cbc\CustomsStatusCode;
use horstoeko\invoicesuite\models\ubl\cbc\CustomsTariffQuantity;
use horstoeko\invoicesuite\models\ubl\cbc\DeclaredCustomsValueAmount;
use horstoeko\invoicesuite\models\ubl\cbc\DeclaredForCarriageValueAmount;
use horstoeko\invoicesuite\models\ubl\cbc\DeclaredStatisticsValueAmount;
use horstoeko\invoicesuite\models\ubl\cbc\Description;
use horstoeko\invoicesuite\models\ubl\cbc\FreeOnBoardValueAmount;
use horstoeko\invoicesuite\models\ubl\cbc\GrossVolumeMeasure;
use horstoeko\invoicesuite\models\ubl\cbc\GrossWeightMeasure;
use horstoeko\invoicesuite\models\ubl\cbc\ID;
use horstoeko\invoicesuite\models\ubl\cbc\InsuranceValueAmount;
use horstoeko\invoicesuite\models\ubl\cbc\NetNetWeightMeasure;
use horstoeko\invoicesuite\models\ubl\cbc\NetVolumeMeasure;
use horstoeko\invoicesuite\models\ubl\cbc\NetWeightMeasure;
use horstoeko\invoicesuite\models\ubl\cbc\PreferenceCriterionCode;
use horstoeko\invoicesuite\models\ubl\cbc\Quantity;
use horstoeko\invoicesuite\models\ubl\cbc\RequiredCustomsID;
use horstoeko\invoicesuite\models\ubl\cbc\ReturnableQuantity;
use horstoeko\invoicesuite\models\ubl\cbc\SequenceNumberID;
use horstoeko\invoicesuite\models\ubl\cbc\TraceID;
use horstoeko\invoicesuite\models\ubl\cbc\ValueAmount;

class GoodsItemType
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
     * @var \horstoeko\invoicesuite\models\ubl\cbc\SequenceNumberID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\SequenceNumberID")
     * @JMS\Expose
     * @JMS\SerializedName("SequenceNumberID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSequenceNumberID", setter="setSequenceNumberID")
     */
    private $sequenceNumberID;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\Description>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\Description>")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Description", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $description;

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
     * @var \horstoeko\invoicesuite\models\ubl\cbc\DeclaredCustomsValueAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\DeclaredCustomsValueAmount")
     * @JMS\Expose
     * @JMS\SerializedName("DeclaredCustomsValueAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDeclaredCustomsValueAmount", setter="setDeclaredCustomsValueAmount")
     */
    private $declaredCustomsValueAmount;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\DeclaredForCarriageValueAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\DeclaredForCarriageValueAmount")
     * @JMS\Expose
     * @JMS\SerializedName("DeclaredForCarriageValueAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDeclaredForCarriageValueAmount", setter="setDeclaredForCarriageValueAmount")
     */
    private $declaredForCarriageValueAmount;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\DeclaredStatisticsValueAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\DeclaredStatisticsValueAmount")
     * @JMS\Expose
     * @JMS\SerializedName("DeclaredStatisticsValueAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDeclaredStatisticsValueAmount", setter="setDeclaredStatisticsValueAmount")
     */
    private $declaredStatisticsValueAmount;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\FreeOnBoardValueAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\FreeOnBoardValueAmount")
     * @JMS\Expose
     * @JMS\SerializedName("FreeOnBoardValueAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getFreeOnBoardValueAmount", setter="setFreeOnBoardValueAmount")
     */
    private $freeOnBoardValueAmount;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\InsuranceValueAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\InsuranceValueAmount")
     * @JMS\Expose
     * @JMS\SerializedName("InsuranceValueAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getInsuranceValueAmount", setter="setInsuranceValueAmount")
     */
    private $insuranceValueAmount;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ValueAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ValueAmount")
     * @JMS\Expose
     * @JMS\SerializedName("ValueAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getValueAmount", setter="setValueAmount")
     */
    private $valueAmount;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\GrossWeightMeasure|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\GrossWeightMeasure")
     * @JMS\Expose
     * @JMS\SerializedName("GrossWeightMeasure")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getGrossWeightMeasure", setter="setGrossWeightMeasure")
     */
    private $grossWeightMeasure;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\NetWeightMeasure|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\NetWeightMeasure")
     * @JMS\Expose
     * @JMS\SerializedName("NetWeightMeasure")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getNetWeightMeasure", setter="setNetWeightMeasure")
     */
    private $netWeightMeasure;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\NetNetWeightMeasure|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\NetNetWeightMeasure")
     * @JMS\Expose
     * @JMS\SerializedName("NetNetWeightMeasure")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getNetNetWeightMeasure", setter="setNetNetWeightMeasure")
     */
    private $netNetWeightMeasure;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ChargeableWeightMeasure|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ChargeableWeightMeasure")
     * @JMS\Expose
     * @JMS\SerializedName("ChargeableWeightMeasure")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getChargeableWeightMeasure", setter="setChargeableWeightMeasure")
     */
    private $chargeableWeightMeasure;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\GrossVolumeMeasure|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\GrossVolumeMeasure")
     * @JMS\Expose
     * @JMS\SerializedName("GrossVolumeMeasure")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getGrossVolumeMeasure", setter="setGrossVolumeMeasure")
     */
    private $grossVolumeMeasure;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\NetVolumeMeasure|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\NetVolumeMeasure")
     * @JMS\Expose
     * @JMS\SerializedName("NetVolumeMeasure")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getNetVolumeMeasure", setter="setNetVolumeMeasure")
     */
    private $netVolumeMeasure;

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
     * @var \horstoeko\invoicesuite\models\ubl\cbc\PreferenceCriterionCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\PreferenceCriterionCode")
     * @JMS\Expose
     * @JMS\SerializedName("PreferenceCriterionCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPreferenceCriterionCode", setter="setPreferenceCriterionCode")
     */
    private $preferenceCriterionCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\RequiredCustomsID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\RequiredCustomsID")
     * @JMS\Expose
     * @JMS\SerializedName("RequiredCustomsID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRequiredCustomsID", setter="setRequiredCustomsID")
     */
    private $requiredCustomsID;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\CustomsStatusCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\CustomsStatusCode")
     * @JMS\Expose
     * @JMS\SerializedName("CustomsStatusCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCustomsStatusCode", setter="setCustomsStatusCode")
     */
    private $customsStatusCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\CustomsTariffQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\CustomsTariffQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("CustomsTariffQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCustomsTariffQuantity", setter="setCustomsTariffQuantity")
     */
    private $customsTariffQuantity;

    /**
     * @var bool|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("CustomsImportClassifiedIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCustomsImportClassifiedIndicator", setter="setCustomsImportClassifiedIndicator")
     */
    private $customsImportClassifiedIndicator;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ChargeableQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ChargeableQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("ChargeableQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getChargeableQuantity", setter="setChargeableQuantity")
     */
    private $chargeableQuantity;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ReturnableQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ReturnableQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("ReturnableQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getReturnableQuantity", setter="setReturnableQuantity")
     */
    private $returnableQuantity;

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
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\Item>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\Item>")
     * @JMS\Expose
     * @JMS\SerializedName("Item")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Item", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getItem", setter="setItem")
     */
    private $item;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\GoodsItemContainer>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\GoodsItemContainer>")
     * @JMS\Expose
     * @JMS\SerializedName("GoodsItemContainer")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="GoodsItemContainer", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getGoodsItemContainer", setter="setGoodsItemContainer")
     */
    private $goodsItemContainer;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\FreightAllowanceCharge>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\FreightAllowanceCharge>")
     * @JMS\Expose
     * @JMS\SerializedName("FreightAllowanceCharge")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="FreightAllowanceCharge", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getFreightAllowanceCharge", setter="setFreightAllowanceCharge")
     */
    private $freightAllowanceCharge;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\InvoiceLine>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\InvoiceLine>")
     * @JMS\Expose
     * @JMS\SerializedName("InvoiceLine")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="InvoiceLine", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getInvoiceLine", setter="setInvoiceLine")
     */
    private $invoiceLine;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\Temperature>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\Temperature>")
     * @JMS\Expose
     * @JMS\SerializedName("Temperature")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Temperature", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getTemperature", setter="setTemperature")
     */
    private $temperature;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\ContainedGoodsItem>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\ContainedGoodsItem>")
     * @JMS\Expose
     * @JMS\SerializedName("ContainedGoodsItem")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ContainedGoodsItem", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getContainedGoodsItem", setter="setContainedGoodsItem")
     */
    private $containedGoodsItem;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\OriginAddress|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\OriginAddress")
     * @JMS\Expose
     * @JMS\SerializedName("OriginAddress")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOriginAddress", setter="setOriginAddress")
     */
    private $originAddress;

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
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\ContainingPackage>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\ContainingPackage>")
     * @JMS\Expose
     * @JMS\SerializedName("ContainingPackage")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ContainingPackage", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getContainingPackage", setter="setContainingPackage")
     */
    private $containingPackage;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\ShipmentDocumentReference|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\ShipmentDocumentReference")
     * @JMS\Expose
     * @JMS\SerializedName("ShipmentDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getShipmentDocumentReference", setter="setShipmentDocumentReference")
     */
    private $shipmentDocumentReference;

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
     * @return \horstoeko\invoicesuite\models\ubl\cbc\SequenceNumberID|null
     */
    public function getSequenceNumberID(): ?SequenceNumberID
    {
        return $this->sequenceNumberID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\SequenceNumberID
     */
    public function getSequenceNumberIDWithCreate(): SequenceNumberID
    {
        $this->sequenceNumberID = is_null($this->sequenceNumberID) ? new SequenceNumberID() : $this->sequenceNumberID;

        return $this->sequenceNumberID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\SequenceNumberID|null $sequenceNumberID
     * @return self
     */
    public function setSequenceNumberID(?SequenceNumberID $sequenceNumberID = null): self
    {
        $this->sequenceNumberID = $sequenceNumberID;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\Description>|null
     */
    public function getDescription(): ?array
    {
        return $this->description;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\Description>|null $description
     * @return self
     */
    public function setDescription(?array $description = null): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return self
     */
    public function clearDescription(): self
    {
        $this->description = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Description $description
     * @return self
     */
    public function addToDescription(Description $description): self
    {
        $this->description[] = $description;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Description
     */
    public function addToDescriptionWithCreate(): Description
    {
        $this->addTodescription($description = new Description());

        return $description;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Description $description
     * @return self
     */
    public function addOnceToDescription(Description $description): self
    {
        if (!is_array($this->description)) {
            $this->description = [];
        }

        $this->description[0] = $description;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Description
     */
    public function addOnceToDescriptionWithCreate(): Description
    {
        if (!is_array($this->description)) {
            $this->description = [];
        }

        if ($this->description === []) {
            $this->addOnceTodescription(new Description());
        }

        return $this->description[0];
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
     * @return \horstoeko\invoicesuite\models\ubl\cbc\DeclaredCustomsValueAmount|null
     */
    public function getDeclaredCustomsValueAmount(): ?DeclaredCustomsValueAmount
    {
        return $this->declaredCustomsValueAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\DeclaredCustomsValueAmount
     */
    public function getDeclaredCustomsValueAmountWithCreate(): DeclaredCustomsValueAmount
    {
        $this->declaredCustomsValueAmount = is_null($this->declaredCustomsValueAmount) ? new DeclaredCustomsValueAmount() : $this->declaredCustomsValueAmount;

        return $this->declaredCustomsValueAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\DeclaredCustomsValueAmount|null $declaredCustomsValueAmount
     * @return self
     */
    public function setDeclaredCustomsValueAmount(
        ?DeclaredCustomsValueAmount $declaredCustomsValueAmount = null,
    ): self {
        $this->declaredCustomsValueAmount = $declaredCustomsValueAmount;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\DeclaredForCarriageValueAmount|null
     */
    public function getDeclaredForCarriageValueAmount(): ?DeclaredForCarriageValueAmount
    {
        return $this->declaredForCarriageValueAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\DeclaredForCarriageValueAmount
     */
    public function getDeclaredForCarriageValueAmountWithCreate(): DeclaredForCarriageValueAmount
    {
        $this->declaredForCarriageValueAmount = is_null($this->declaredForCarriageValueAmount) ? new DeclaredForCarriageValueAmount() : $this->declaredForCarriageValueAmount;

        return $this->declaredForCarriageValueAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\DeclaredForCarriageValueAmount|null $declaredForCarriageValueAmount
     * @return self
     */
    public function setDeclaredForCarriageValueAmount(
        ?DeclaredForCarriageValueAmount $declaredForCarriageValueAmount = null,
    ): self {
        $this->declaredForCarriageValueAmount = $declaredForCarriageValueAmount;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\DeclaredStatisticsValueAmount|null
     */
    public function getDeclaredStatisticsValueAmount(): ?DeclaredStatisticsValueAmount
    {
        return $this->declaredStatisticsValueAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\DeclaredStatisticsValueAmount
     */
    public function getDeclaredStatisticsValueAmountWithCreate(): DeclaredStatisticsValueAmount
    {
        $this->declaredStatisticsValueAmount = is_null($this->declaredStatisticsValueAmount) ? new DeclaredStatisticsValueAmount() : $this->declaredStatisticsValueAmount;

        return $this->declaredStatisticsValueAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\DeclaredStatisticsValueAmount|null $declaredStatisticsValueAmount
     * @return self
     */
    public function setDeclaredStatisticsValueAmount(
        ?DeclaredStatisticsValueAmount $declaredStatisticsValueAmount = null,
    ): self {
        $this->declaredStatisticsValueAmount = $declaredStatisticsValueAmount;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\FreeOnBoardValueAmount|null
     */
    public function getFreeOnBoardValueAmount(): ?FreeOnBoardValueAmount
    {
        return $this->freeOnBoardValueAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\FreeOnBoardValueAmount
     */
    public function getFreeOnBoardValueAmountWithCreate(): FreeOnBoardValueAmount
    {
        $this->freeOnBoardValueAmount = is_null($this->freeOnBoardValueAmount) ? new FreeOnBoardValueAmount() : $this->freeOnBoardValueAmount;

        return $this->freeOnBoardValueAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\FreeOnBoardValueAmount|null $freeOnBoardValueAmount
     * @return self
     */
    public function setFreeOnBoardValueAmount(?FreeOnBoardValueAmount $freeOnBoardValueAmount = null): self
    {
        $this->freeOnBoardValueAmount = $freeOnBoardValueAmount;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\InsuranceValueAmount|null
     */
    public function getInsuranceValueAmount(): ?InsuranceValueAmount
    {
        return $this->insuranceValueAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\InsuranceValueAmount
     */
    public function getInsuranceValueAmountWithCreate(): InsuranceValueAmount
    {
        $this->insuranceValueAmount = is_null($this->insuranceValueAmount) ? new InsuranceValueAmount() : $this->insuranceValueAmount;

        return $this->insuranceValueAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\InsuranceValueAmount|null $insuranceValueAmount
     * @return self
     */
    public function setInsuranceValueAmount(?InsuranceValueAmount $insuranceValueAmount = null): self
    {
        $this->insuranceValueAmount = $insuranceValueAmount;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ValueAmount|null
     */
    public function getValueAmount(): ?ValueAmount
    {
        return $this->valueAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ValueAmount
     */
    public function getValueAmountWithCreate(): ValueAmount
    {
        $this->valueAmount = is_null($this->valueAmount) ? new ValueAmount() : $this->valueAmount;

        return $this->valueAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ValueAmount|null $valueAmount
     * @return self
     */
    public function setValueAmount(?ValueAmount $valueAmount = null): self
    {
        $this->valueAmount = $valueAmount;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\GrossWeightMeasure|null
     */
    public function getGrossWeightMeasure(): ?GrossWeightMeasure
    {
        return $this->grossWeightMeasure;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\GrossWeightMeasure
     */
    public function getGrossWeightMeasureWithCreate(): GrossWeightMeasure
    {
        $this->grossWeightMeasure = is_null($this->grossWeightMeasure) ? new GrossWeightMeasure() : $this->grossWeightMeasure;

        return $this->grossWeightMeasure;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\GrossWeightMeasure|null $grossWeightMeasure
     * @return self
     */
    public function setGrossWeightMeasure(?GrossWeightMeasure $grossWeightMeasure = null): self
    {
        $this->grossWeightMeasure = $grossWeightMeasure;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\NetWeightMeasure|null
     */
    public function getNetWeightMeasure(): ?NetWeightMeasure
    {
        return $this->netWeightMeasure;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\NetWeightMeasure
     */
    public function getNetWeightMeasureWithCreate(): NetWeightMeasure
    {
        $this->netWeightMeasure = is_null($this->netWeightMeasure) ? new NetWeightMeasure() : $this->netWeightMeasure;

        return $this->netWeightMeasure;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\NetWeightMeasure|null $netWeightMeasure
     * @return self
     */
    public function setNetWeightMeasure(?NetWeightMeasure $netWeightMeasure = null): self
    {
        $this->netWeightMeasure = $netWeightMeasure;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\NetNetWeightMeasure|null
     */
    public function getNetNetWeightMeasure(): ?NetNetWeightMeasure
    {
        return $this->netNetWeightMeasure;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\NetNetWeightMeasure
     */
    public function getNetNetWeightMeasureWithCreate(): NetNetWeightMeasure
    {
        $this->netNetWeightMeasure = is_null($this->netNetWeightMeasure) ? new NetNetWeightMeasure() : $this->netNetWeightMeasure;

        return $this->netNetWeightMeasure;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\NetNetWeightMeasure|null $netNetWeightMeasure
     * @return self
     */
    public function setNetNetWeightMeasure(?NetNetWeightMeasure $netNetWeightMeasure = null): self
    {
        $this->netNetWeightMeasure = $netNetWeightMeasure;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ChargeableWeightMeasure|null
     */
    public function getChargeableWeightMeasure(): ?ChargeableWeightMeasure
    {
        return $this->chargeableWeightMeasure;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ChargeableWeightMeasure
     */
    public function getChargeableWeightMeasureWithCreate(): ChargeableWeightMeasure
    {
        $this->chargeableWeightMeasure = is_null($this->chargeableWeightMeasure) ? new ChargeableWeightMeasure() : $this->chargeableWeightMeasure;

        return $this->chargeableWeightMeasure;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ChargeableWeightMeasure|null $chargeableWeightMeasure
     * @return self
     */
    public function setChargeableWeightMeasure(?ChargeableWeightMeasure $chargeableWeightMeasure = null): self
    {
        $this->chargeableWeightMeasure = $chargeableWeightMeasure;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\GrossVolumeMeasure|null
     */
    public function getGrossVolumeMeasure(): ?GrossVolumeMeasure
    {
        return $this->grossVolumeMeasure;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\GrossVolumeMeasure
     */
    public function getGrossVolumeMeasureWithCreate(): GrossVolumeMeasure
    {
        $this->grossVolumeMeasure = is_null($this->grossVolumeMeasure) ? new GrossVolumeMeasure() : $this->grossVolumeMeasure;

        return $this->grossVolumeMeasure;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\GrossVolumeMeasure|null $grossVolumeMeasure
     * @return self
     */
    public function setGrossVolumeMeasure(?GrossVolumeMeasure $grossVolumeMeasure = null): self
    {
        $this->grossVolumeMeasure = $grossVolumeMeasure;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\NetVolumeMeasure|null
     */
    public function getNetVolumeMeasure(): ?NetVolumeMeasure
    {
        return $this->netVolumeMeasure;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\NetVolumeMeasure
     */
    public function getNetVolumeMeasureWithCreate(): NetVolumeMeasure
    {
        $this->netVolumeMeasure = is_null($this->netVolumeMeasure) ? new NetVolumeMeasure() : $this->netVolumeMeasure;

        return $this->netVolumeMeasure;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\NetVolumeMeasure|null $netVolumeMeasure
     * @return self
     */
    public function setNetVolumeMeasure(?NetVolumeMeasure $netVolumeMeasure = null): self
    {
        $this->netVolumeMeasure = $netVolumeMeasure;

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
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PreferenceCriterionCode|null
     */
    public function getPreferenceCriterionCode(): ?PreferenceCriterionCode
    {
        return $this->preferenceCriterionCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PreferenceCriterionCode
     */
    public function getPreferenceCriterionCodeWithCreate(): PreferenceCriterionCode
    {
        $this->preferenceCriterionCode = is_null($this->preferenceCriterionCode) ? new PreferenceCriterionCode() : $this->preferenceCriterionCode;

        return $this->preferenceCriterionCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\PreferenceCriterionCode|null $preferenceCriterionCode
     * @return self
     */
    public function setPreferenceCriterionCode(?PreferenceCriterionCode $preferenceCriterionCode = null): self
    {
        $this->preferenceCriterionCode = $preferenceCriterionCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\RequiredCustomsID|null
     */
    public function getRequiredCustomsID(): ?RequiredCustomsID
    {
        return $this->requiredCustomsID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\RequiredCustomsID
     */
    public function getRequiredCustomsIDWithCreate(): RequiredCustomsID
    {
        $this->requiredCustomsID = is_null($this->requiredCustomsID) ? new RequiredCustomsID() : $this->requiredCustomsID;

        return $this->requiredCustomsID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\RequiredCustomsID|null $requiredCustomsID
     * @return self
     */
    public function setRequiredCustomsID(?RequiredCustomsID $requiredCustomsID = null): self
    {
        $this->requiredCustomsID = $requiredCustomsID;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\CustomsStatusCode|null
     */
    public function getCustomsStatusCode(): ?CustomsStatusCode
    {
        return $this->customsStatusCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\CustomsStatusCode
     */
    public function getCustomsStatusCodeWithCreate(): CustomsStatusCode
    {
        $this->customsStatusCode = is_null($this->customsStatusCode) ? new CustomsStatusCode() : $this->customsStatusCode;

        return $this->customsStatusCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\CustomsStatusCode|null $customsStatusCode
     * @return self
     */
    public function setCustomsStatusCode(?CustomsStatusCode $customsStatusCode = null): self
    {
        $this->customsStatusCode = $customsStatusCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\CustomsTariffQuantity|null
     */
    public function getCustomsTariffQuantity(): ?CustomsTariffQuantity
    {
        return $this->customsTariffQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\CustomsTariffQuantity
     */
    public function getCustomsTariffQuantityWithCreate(): CustomsTariffQuantity
    {
        $this->customsTariffQuantity = is_null($this->customsTariffQuantity) ? new CustomsTariffQuantity() : $this->customsTariffQuantity;

        return $this->customsTariffQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\CustomsTariffQuantity|null $customsTariffQuantity
     * @return self
     */
    public function setCustomsTariffQuantity(?CustomsTariffQuantity $customsTariffQuantity = null): self
    {
        $this->customsTariffQuantity = $customsTariffQuantity;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCustomsImportClassifiedIndicator(): ?bool
    {
        return $this->customsImportClassifiedIndicator;
    }

    /**
     * @param bool|null $customsImportClassifiedIndicator
     * @return self
     */
    public function setCustomsImportClassifiedIndicator(?bool $customsImportClassifiedIndicator = null): self
    {
        $this->customsImportClassifiedIndicator = $customsImportClassifiedIndicator;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ChargeableQuantity|null
     */
    public function getChargeableQuantity(): ?ChargeableQuantity
    {
        return $this->chargeableQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ChargeableQuantity
     */
    public function getChargeableQuantityWithCreate(): ChargeableQuantity
    {
        $this->chargeableQuantity = is_null($this->chargeableQuantity) ? new ChargeableQuantity() : $this->chargeableQuantity;

        return $this->chargeableQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ChargeableQuantity|null $chargeableQuantity
     * @return self
     */
    public function setChargeableQuantity(?ChargeableQuantity $chargeableQuantity = null): self
    {
        $this->chargeableQuantity = $chargeableQuantity;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ReturnableQuantity|null
     */
    public function getReturnableQuantity(): ?ReturnableQuantity
    {
        return $this->returnableQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ReturnableQuantity
     */
    public function getReturnableQuantityWithCreate(): ReturnableQuantity
    {
        $this->returnableQuantity = is_null($this->returnableQuantity) ? new ReturnableQuantity() : $this->returnableQuantity;

        return $this->returnableQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ReturnableQuantity|null $returnableQuantity
     * @return self
     */
    public function setReturnableQuantity(?ReturnableQuantity $returnableQuantity = null): self
    {
        $this->returnableQuantity = $returnableQuantity;

        return $this;
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
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\Item>|null
     */
    public function getItem(): ?array
    {
        return $this->item;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\Item>|null $item
     * @return self
     */
    public function setItem(?array $item = null): self
    {
        $this->item = $item;

        return $this;
    }

    /**
     * @return self
     */
    public function clearItem(): self
    {
        $this->item = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Item $item
     * @return self
     */
    public function addToItem(Item $item): self
    {
        $this->item[] = $item;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Item
     */
    public function addToItemWithCreate(): Item
    {
        $this->addToitem($item = new Item());

        return $item;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Item $item
     * @return self
     */
    public function addOnceToItem(Item $item): self
    {
        if (!is_array($this->item)) {
            $this->item = [];
        }

        $this->item[0] = $item;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Item
     */
    public function addOnceToItemWithCreate(): Item
    {
        if (!is_array($this->item)) {
            $this->item = [];
        }

        if ($this->item === []) {
            $this->addOnceToitem(new Item());
        }

        return $this->item[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\GoodsItemContainer>|null
     */
    public function getGoodsItemContainer(): ?array
    {
        return $this->goodsItemContainer;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\GoodsItemContainer>|null $goodsItemContainer
     * @return self
     */
    public function setGoodsItemContainer(?array $goodsItemContainer = null): self
    {
        $this->goodsItemContainer = $goodsItemContainer;

        return $this;
    }

    /**
     * @return self
     */
    public function clearGoodsItemContainer(): self
    {
        $this->goodsItemContainer = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\GoodsItemContainer $goodsItemContainer
     * @return self
     */
    public function addToGoodsItemContainer(GoodsItemContainer $goodsItemContainer): self
    {
        $this->goodsItemContainer[] = $goodsItemContainer;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\GoodsItemContainer
     */
    public function addToGoodsItemContainerWithCreate(): GoodsItemContainer
    {
        $this->addTogoodsItemContainer($goodsItemContainer = new GoodsItemContainer());

        return $goodsItemContainer;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\GoodsItemContainer $goodsItemContainer
     * @return self
     */
    public function addOnceToGoodsItemContainer(GoodsItemContainer $goodsItemContainer): self
    {
        if (!is_array($this->goodsItemContainer)) {
            $this->goodsItemContainer = [];
        }

        $this->goodsItemContainer[0] = $goodsItemContainer;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\GoodsItemContainer
     */
    public function addOnceToGoodsItemContainerWithCreate(): GoodsItemContainer
    {
        if (!is_array($this->goodsItemContainer)) {
            $this->goodsItemContainer = [];
        }

        if ($this->goodsItemContainer === []) {
            $this->addOnceTogoodsItemContainer(new GoodsItemContainer());
        }

        return $this->goodsItemContainer[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\FreightAllowanceCharge>|null
     */
    public function getFreightAllowanceCharge(): ?array
    {
        return $this->freightAllowanceCharge;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\FreightAllowanceCharge>|null $freightAllowanceCharge
     * @return self
     */
    public function setFreightAllowanceCharge(?array $freightAllowanceCharge = null): self
    {
        $this->freightAllowanceCharge = $freightAllowanceCharge;

        return $this;
    }

    /**
     * @return self
     */
    public function clearFreightAllowanceCharge(): self
    {
        $this->freightAllowanceCharge = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\FreightAllowanceCharge $freightAllowanceCharge
     * @return self
     */
    public function addToFreightAllowanceCharge(FreightAllowanceCharge $freightAllowanceCharge): self
    {
        $this->freightAllowanceCharge[] = $freightAllowanceCharge;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\FreightAllowanceCharge
     */
    public function addToFreightAllowanceChargeWithCreate(): FreightAllowanceCharge
    {
        $this->addTofreightAllowanceCharge($freightAllowanceCharge = new FreightAllowanceCharge());

        return $freightAllowanceCharge;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\FreightAllowanceCharge $freightAllowanceCharge
     * @return self
     */
    public function addOnceToFreightAllowanceCharge(FreightAllowanceCharge $freightAllowanceCharge): self
    {
        if (!is_array($this->freightAllowanceCharge)) {
            $this->freightAllowanceCharge = [];
        }

        $this->freightAllowanceCharge[0] = $freightAllowanceCharge;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\FreightAllowanceCharge
     */
    public function addOnceToFreightAllowanceChargeWithCreate(): FreightAllowanceCharge
    {
        if (!is_array($this->freightAllowanceCharge)) {
            $this->freightAllowanceCharge = [];
        }

        if ($this->freightAllowanceCharge === []) {
            $this->addOnceTofreightAllowanceCharge(new FreightAllowanceCharge());
        }

        return $this->freightAllowanceCharge[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\InvoiceLine>|null
     */
    public function getInvoiceLine(): ?array
    {
        return $this->invoiceLine;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\InvoiceLine>|null $invoiceLine
     * @return self
     */
    public function setInvoiceLine(?array $invoiceLine = null): self
    {
        $this->invoiceLine = $invoiceLine;

        return $this;
    }

    /**
     * @return self
     */
    public function clearInvoiceLine(): self
    {
        $this->invoiceLine = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\InvoiceLine $invoiceLine
     * @return self
     */
    public function addToInvoiceLine(InvoiceLine $invoiceLine): self
    {
        $this->invoiceLine[] = $invoiceLine;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\InvoiceLine
     */
    public function addToInvoiceLineWithCreate(): InvoiceLine
    {
        $this->addToinvoiceLine($invoiceLine = new InvoiceLine());

        return $invoiceLine;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\InvoiceLine $invoiceLine
     * @return self
     */
    public function addOnceToInvoiceLine(InvoiceLine $invoiceLine): self
    {
        if (!is_array($this->invoiceLine)) {
            $this->invoiceLine = [];
        }

        $this->invoiceLine[0] = $invoiceLine;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\InvoiceLine
     */
    public function addOnceToInvoiceLineWithCreate(): InvoiceLine
    {
        if (!is_array($this->invoiceLine)) {
            $this->invoiceLine = [];
        }

        if ($this->invoiceLine === []) {
            $this->addOnceToinvoiceLine(new InvoiceLine());
        }

        return $this->invoiceLine[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\Temperature>|null
     */
    public function getTemperature(): ?array
    {
        return $this->temperature;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\Temperature>|null $temperature
     * @return self
     */
    public function setTemperature(?array $temperature = null): self
    {
        $this->temperature = $temperature;

        return $this;
    }

    /**
     * @return self
     */
    public function clearTemperature(): self
    {
        $this->temperature = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Temperature $temperature
     * @return self
     */
    public function addToTemperature(Temperature $temperature): self
    {
        $this->temperature[] = $temperature;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Temperature
     */
    public function addToTemperatureWithCreate(): Temperature
    {
        $this->addTotemperature($temperature = new Temperature());

        return $temperature;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Temperature $temperature
     * @return self
     */
    public function addOnceToTemperature(Temperature $temperature): self
    {
        if (!is_array($this->temperature)) {
            $this->temperature = [];
        }

        $this->temperature[0] = $temperature;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Temperature
     */
    public function addOnceToTemperatureWithCreate(): Temperature
    {
        if (!is_array($this->temperature)) {
            $this->temperature = [];
        }

        if ($this->temperature === []) {
            $this->addOnceTotemperature(new Temperature());
        }

        return $this->temperature[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\ContainedGoodsItem>|null
     */
    public function getContainedGoodsItem(): ?array
    {
        return $this->containedGoodsItem;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\ContainedGoodsItem>|null $containedGoodsItem
     * @return self
     */
    public function setContainedGoodsItem(?array $containedGoodsItem = null): self
    {
        $this->containedGoodsItem = $containedGoodsItem;

        return $this;
    }

    /**
     * @return self
     */
    public function clearContainedGoodsItem(): self
    {
        $this->containedGoodsItem = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ContainedGoodsItem $containedGoodsItem
     * @return self
     */
    public function addToContainedGoodsItem(ContainedGoodsItem $containedGoodsItem): self
    {
        $this->containedGoodsItem[] = $containedGoodsItem;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ContainedGoodsItem
     */
    public function addToContainedGoodsItemWithCreate(): ContainedGoodsItem
    {
        $this->addTocontainedGoodsItem($containedGoodsItem = new ContainedGoodsItem());

        return $containedGoodsItem;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ContainedGoodsItem $containedGoodsItem
     * @return self
     */
    public function addOnceToContainedGoodsItem(ContainedGoodsItem $containedGoodsItem): self
    {
        if (!is_array($this->containedGoodsItem)) {
            $this->containedGoodsItem = [];
        }

        $this->containedGoodsItem[0] = $containedGoodsItem;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ContainedGoodsItem
     */
    public function addOnceToContainedGoodsItemWithCreate(): ContainedGoodsItem
    {
        if (!is_array($this->containedGoodsItem)) {
            $this->containedGoodsItem = [];
        }

        if ($this->containedGoodsItem === []) {
            $this->addOnceTocontainedGoodsItem(new ContainedGoodsItem());
        }

        return $this->containedGoodsItem[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\OriginAddress|null
     */
    public function getOriginAddress(): ?OriginAddress
    {
        return $this->originAddress;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\OriginAddress
     */
    public function getOriginAddressWithCreate(): OriginAddress
    {
        $this->originAddress = is_null($this->originAddress) ? new OriginAddress() : $this->originAddress;

        return $this->originAddress;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\OriginAddress|null $originAddress
     * @return self
     */
    public function setOriginAddress(?OriginAddress $originAddress = null): self
    {
        $this->originAddress = $originAddress;

        return $this;
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
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\ContainingPackage>|null
     */
    public function getContainingPackage(): ?array
    {
        return $this->containingPackage;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\ContainingPackage>|null $containingPackage
     * @return self
     */
    public function setContainingPackage(?array $containingPackage = null): self
    {
        $this->containingPackage = $containingPackage;

        return $this;
    }

    /**
     * @return self
     */
    public function clearContainingPackage(): self
    {
        $this->containingPackage = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ContainingPackage $containingPackage
     * @return self
     */
    public function addToContainingPackage(ContainingPackage $containingPackage): self
    {
        $this->containingPackage[] = $containingPackage;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ContainingPackage
     */
    public function addToContainingPackageWithCreate(): ContainingPackage
    {
        $this->addTocontainingPackage($containingPackage = new ContainingPackage());

        return $containingPackage;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ContainingPackage $containingPackage
     * @return self
     */
    public function addOnceToContainingPackage(ContainingPackage $containingPackage): self
    {
        if (!is_array($this->containingPackage)) {
            $this->containingPackage = [];
        }

        $this->containingPackage[0] = $containingPackage;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ContainingPackage
     */
    public function addOnceToContainingPackageWithCreate(): ContainingPackage
    {
        if (!is_array($this->containingPackage)) {
            $this->containingPackage = [];
        }

        if ($this->containingPackage === []) {
            $this->addOnceTocontainingPackage(new ContainingPackage());
        }

        return $this->containingPackage[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ShipmentDocumentReference|null
     */
    public function getShipmentDocumentReference(): ?ShipmentDocumentReference
    {
        return $this->shipmentDocumentReference;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ShipmentDocumentReference
     */
    public function getShipmentDocumentReferenceWithCreate(): ShipmentDocumentReference
    {
        $this->shipmentDocumentReference = is_null($this->shipmentDocumentReference) ? new ShipmentDocumentReference() : $this->shipmentDocumentReference;

        return $this->shipmentDocumentReference;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ShipmentDocumentReference|null $shipmentDocumentReference
     * @return self
     */
    public function setShipmentDocumentReference(?ShipmentDocumentReference $shipmentDocumentReference = null): self
    {
        $this->shipmentDocumentReference = $shipmentDocumentReference;

        return $this;
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
}
