<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ChargeableQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ChargeableWeightMeasure;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CustomsStatusCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CustomsTariffQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\DeclaredCustomsValueAmount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\DeclaredForCarriageValueAmount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\DeclaredStatisticsValueAmount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Description;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\FreeOnBoardValueAmount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\GrossVolumeMeasure;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\GrossWeightMeasure;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\InsuranceValueAmount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\NetNetWeightMeasure;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\NetVolumeMeasure;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\NetWeightMeasure;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PreferenceCriterionCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Quantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\RequiredCustomsID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ReturnableQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SequenceNumberID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TraceID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ValueAmount;
use JMS\Serializer\Annotation as JMS;

class GoodsItemType
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
     * @var null|SequenceNumberID
     */
    #[JMS\Accessor(getter: 'getSequenceNumberID', setter: 'setSequenceNumberID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SequenceNumberID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SequenceNumberID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $sequenceNumberID;

    /**
     * @var null|array<Description>
     */
    #[JMS\Accessor(getter: 'getDescription', setter: 'setDescription')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Description')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Description>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'Description', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $description;

    /**
     * @var null|bool
     */
    #[JMS\Accessor(getter: 'getHazardousRiskIndicator', setter: 'setHazardousRiskIndicator')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('HazardousRiskIndicator')]
    #[JMS\Type('bool')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $hazardousRiskIndicator;

    /**
     * @var null|DeclaredCustomsValueAmount
     */
    #[JMS\Accessor(getter: 'getDeclaredCustomsValueAmount', setter: 'setDeclaredCustomsValueAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('DeclaredCustomsValueAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\DeclaredCustomsValueAmount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $declaredCustomsValueAmount;

    /**
     * @var null|DeclaredForCarriageValueAmount
     */
    #[JMS\Accessor(getter: 'getDeclaredForCarriageValueAmount', setter: 'setDeclaredForCarriageValueAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('DeclaredForCarriageValueAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\DeclaredForCarriageValueAmount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $declaredForCarriageValueAmount;

    /**
     * @var null|DeclaredStatisticsValueAmount
     */
    #[JMS\Accessor(getter: 'getDeclaredStatisticsValueAmount', setter: 'setDeclaredStatisticsValueAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('DeclaredStatisticsValueAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\DeclaredStatisticsValueAmount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $declaredStatisticsValueAmount;

    /**
     * @var null|FreeOnBoardValueAmount
     */
    #[JMS\Accessor(getter: 'getFreeOnBoardValueAmount', setter: 'setFreeOnBoardValueAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('FreeOnBoardValueAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\FreeOnBoardValueAmount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $freeOnBoardValueAmount;

    /**
     * @var null|InsuranceValueAmount
     */
    #[JMS\Accessor(getter: 'getInsuranceValueAmount', setter: 'setInsuranceValueAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('InsuranceValueAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\InsuranceValueAmount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $insuranceValueAmount;

    /**
     * @var null|ValueAmount
     */
    #[JMS\Accessor(getter: 'getValueAmount', setter: 'setValueAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ValueAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ValueAmount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $valueAmount;

    /**
     * @var null|GrossWeightMeasure
     */
    #[JMS\Accessor(getter: 'getGrossWeightMeasure', setter: 'setGrossWeightMeasure')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('GrossWeightMeasure')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\GrossWeightMeasure')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $grossWeightMeasure;

    /**
     * @var null|NetWeightMeasure
     */
    #[JMS\Accessor(getter: 'getNetWeightMeasure', setter: 'setNetWeightMeasure')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('NetWeightMeasure')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\NetWeightMeasure')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $netWeightMeasure;

    /**
     * @var null|NetNetWeightMeasure
     */
    #[JMS\Accessor(getter: 'getNetNetWeightMeasure', setter: 'setNetNetWeightMeasure')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('NetNetWeightMeasure')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\NetNetWeightMeasure')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $netNetWeightMeasure;

    /**
     * @var null|ChargeableWeightMeasure
     */
    #[JMS\Accessor(getter: 'getChargeableWeightMeasure', setter: 'setChargeableWeightMeasure')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ChargeableWeightMeasure')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ChargeableWeightMeasure')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $chargeableWeightMeasure;

    /**
     * @var null|GrossVolumeMeasure
     */
    #[JMS\Accessor(getter: 'getGrossVolumeMeasure', setter: 'setGrossVolumeMeasure')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('GrossVolumeMeasure')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\GrossVolumeMeasure')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $grossVolumeMeasure;

    /**
     * @var null|NetVolumeMeasure
     */
    #[JMS\Accessor(getter: 'getNetVolumeMeasure', setter: 'setNetVolumeMeasure')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('NetVolumeMeasure')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\NetVolumeMeasure')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $netVolumeMeasure;

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
     * @var null|PreferenceCriterionCode
     */
    #[JMS\Accessor(getter: 'getPreferenceCriterionCode', setter: 'setPreferenceCriterionCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PreferenceCriterionCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PreferenceCriterionCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $preferenceCriterionCode;

    /**
     * @var null|RequiredCustomsID
     */
    #[JMS\Accessor(getter: 'getRequiredCustomsID', setter: 'setRequiredCustomsID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('RequiredCustomsID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\RequiredCustomsID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $requiredCustomsID;

    /**
     * @var null|CustomsStatusCode
     */
    #[JMS\Accessor(getter: 'getCustomsStatusCode', setter: 'setCustomsStatusCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CustomsStatusCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CustomsStatusCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $customsStatusCode;

    /**
     * @var null|CustomsTariffQuantity
     */
    #[JMS\Accessor(getter: 'getCustomsTariffQuantity', setter: 'setCustomsTariffQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CustomsTariffQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CustomsTariffQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $customsTariffQuantity;

    /**
     * @var null|bool
     */
    #[JMS\Accessor(getter: 'getCustomsImportClassifiedIndicator', setter: 'setCustomsImportClassifiedIndicator')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CustomsImportClassifiedIndicator')]
    #[JMS\Type('bool')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $customsImportClassifiedIndicator;

    /**
     * @var null|ChargeableQuantity
     */
    #[JMS\Accessor(getter: 'getChargeableQuantity', setter: 'setChargeableQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ChargeableQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ChargeableQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $chargeableQuantity;

    /**
     * @var null|ReturnableQuantity
     */
    #[JMS\Accessor(getter: 'getReturnableQuantity', setter: 'setReturnableQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ReturnableQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ReturnableQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $returnableQuantity;

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
     * @var null|array<Item>
     */
    #[JMS\Accessor(getter: 'getItem', setter: 'setItem')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Item')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\Item>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'Item', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $item;

    /**
     * @var null|array<GoodsItemContainer>
     */
    #[JMS\Accessor(getter: 'getGoodsItemContainer', setter: 'setGoodsItemContainer')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('GoodsItemContainer')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\GoodsItemContainer>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'GoodsItemContainer', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $goodsItemContainer;

    /**
     * @var null|array<FreightAllowanceCharge>
     */
    #[JMS\Accessor(getter: 'getFreightAllowanceCharge', setter: 'setFreightAllowanceCharge')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('FreightAllowanceCharge')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\FreightAllowanceCharge>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'FreightAllowanceCharge', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $freightAllowanceCharge;

    /**
     * @var null|array<InvoiceLine>
     */
    #[JMS\Accessor(getter: 'getInvoiceLine', setter: 'setInvoiceLine')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('InvoiceLine')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\InvoiceLine>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'InvoiceLine', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $invoiceLine;

    /**
     * @var null|array<Temperature>
     */
    #[JMS\Accessor(getter: 'getTemperature', setter: 'setTemperature')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Temperature')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\Temperature>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'Temperature', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $temperature;

    /**
     * @var null|array<ContainedGoodsItem>
     */
    #[JMS\Accessor(getter: 'getContainedGoodsItem', setter: 'setContainedGoodsItem')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ContainedGoodsItem')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\ContainedGoodsItem>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'ContainedGoodsItem', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $containedGoodsItem;

    /**
     * @var null|OriginAddress
     */
    #[JMS\Accessor(getter: 'getOriginAddress', setter: 'setOriginAddress')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('OriginAddress')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\OriginAddress')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $originAddress;

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
     * @var null|array<ContainingPackage>
     */
    #[JMS\Accessor(getter: 'getContainingPackage', setter: 'setContainingPackage')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ContainingPackage')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\ContainingPackage>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'ContainingPackage', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $containingPackage;

    /**
     * @var null|ShipmentDocumentReference
     */
    #[JMS\Accessor(getter: 'getShipmentDocumentReference', setter: 'setShipmentDocumentReference')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ShipmentDocumentReference')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\ShipmentDocumentReference')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $shipmentDocumentReference;

    /**
     * @var null|MinimumTemperature
     */
    #[JMS\Accessor(getter: 'getMinimumTemperature', setter: 'setMinimumTemperature')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MinimumTemperature')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\MinimumTemperature')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $minimumTemperature;

    /**
     * @var null|MaximumTemperature
     */
    #[JMS\Accessor(getter: 'getMaximumTemperature', setter: 'setMaximumTemperature')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MaximumTemperature')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\MaximumTemperature')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
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
        $this->sequenceNumberID ??= new SequenceNumberID();

        return $this->sequenceNumberID;
    }

    /**
     * @param  null|SequenceNumberID $sequenceNumberID
     * @return static
     */
    public function setSequenceNumberID(
        ?SequenceNumberID $sequenceNumberID = null
    ): static {
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
    public function setDescription(
        ?array $description = null
    ): static {
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
    public function addToDescription(
        Description $description
    ): static {
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
    public function addOnceToDescription(
        Description $description
    ): static {
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
    public function setHazardousRiskIndicator(
        ?bool $hazardousRiskIndicator = null
    ): static {
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
        $this->declaredCustomsValueAmount ??= new DeclaredCustomsValueAmount();

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
        $this->declaredForCarriageValueAmount ??= new DeclaredForCarriageValueAmount();

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
        $this->declaredStatisticsValueAmount ??= new DeclaredStatisticsValueAmount();

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
        $this->freeOnBoardValueAmount ??= new FreeOnBoardValueAmount();

        return $this->freeOnBoardValueAmount;
    }

    /**
     * @param  null|FreeOnBoardValueAmount $freeOnBoardValueAmount
     * @return static
     */
    public function setFreeOnBoardValueAmount(
        ?FreeOnBoardValueAmount $freeOnBoardValueAmount = null
    ): static {
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
        $this->insuranceValueAmount ??= new InsuranceValueAmount();

        return $this->insuranceValueAmount;
    }

    /**
     * @param  null|InsuranceValueAmount $insuranceValueAmount
     * @return static
     */
    public function setInsuranceValueAmount(
        ?InsuranceValueAmount $insuranceValueAmount = null
    ): static {
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
        $this->valueAmount ??= new ValueAmount();

        return $this->valueAmount;
    }

    /**
     * @param  null|ValueAmount $valueAmount
     * @return static
     */
    public function setValueAmount(
        ?ValueAmount $valueAmount = null
    ): static {
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
        $this->grossWeightMeasure ??= new GrossWeightMeasure();

        return $this->grossWeightMeasure;
    }

    /**
     * @param  null|GrossWeightMeasure $grossWeightMeasure
     * @return static
     */
    public function setGrossWeightMeasure(
        ?GrossWeightMeasure $grossWeightMeasure = null
    ): static {
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
        $this->netWeightMeasure ??= new NetWeightMeasure();

        return $this->netWeightMeasure;
    }

    /**
     * @param  null|NetWeightMeasure $netWeightMeasure
     * @return static
     */
    public function setNetWeightMeasure(
        ?NetWeightMeasure $netWeightMeasure = null
    ): static {
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
        $this->netNetWeightMeasure ??= new NetNetWeightMeasure();

        return $this->netNetWeightMeasure;
    }

    /**
     * @param  null|NetNetWeightMeasure $netNetWeightMeasure
     * @return static
     */
    public function setNetNetWeightMeasure(
        ?NetNetWeightMeasure $netNetWeightMeasure = null
    ): static {
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
        $this->chargeableWeightMeasure ??= new ChargeableWeightMeasure();

        return $this->chargeableWeightMeasure;
    }

    /**
     * @param  null|ChargeableWeightMeasure $chargeableWeightMeasure
     * @return static
     */
    public function setChargeableWeightMeasure(
        ?ChargeableWeightMeasure $chargeableWeightMeasure = null
    ): static {
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
        $this->grossVolumeMeasure ??= new GrossVolumeMeasure();

        return $this->grossVolumeMeasure;
    }

    /**
     * @param  null|GrossVolumeMeasure $grossVolumeMeasure
     * @return static
     */
    public function setGrossVolumeMeasure(
        ?GrossVolumeMeasure $grossVolumeMeasure = null
    ): static {
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
        $this->netVolumeMeasure ??= new NetVolumeMeasure();

        return $this->netVolumeMeasure;
    }

    /**
     * @param  null|NetVolumeMeasure $netVolumeMeasure
     * @return static
     */
    public function setNetVolumeMeasure(
        ?NetVolumeMeasure $netVolumeMeasure = null
    ): static {
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
        $this->preferenceCriterionCode ??= new PreferenceCriterionCode();

        return $this->preferenceCriterionCode;
    }

    /**
     * @param  null|PreferenceCriterionCode $preferenceCriterionCode
     * @return static
     */
    public function setPreferenceCriterionCode(
        ?PreferenceCriterionCode $preferenceCriterionCode = null
    ): static {
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
        $this->requiredCustomsID ??= new RequiredCustomsID();

        return $this->requiredCustomsID;
    }

    /**
     * @param  null|RequiredCustomsID $requiredCustomsID
     * @return static
     */
    public function setRequiredCustomsID(
        ?RequiredCustomsID $requiredCustomsID = null
    ): static {
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
        $this->customsStatusCode ??= new CustomsStatusCode();

        return $this->customsStatusCode;
    }

    /**
     * @param  null|CustomsStatusCode $customsStatusCode
     * @return static
     */
    public function setCustomsStatusCode(
        ?CustomsStatusCode $customsStatusCode = null
    ): static {
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
        $this->customsTariffQuantity ??= new CustomsTariffQuantity();

        return $this->customsTariffQuantity;
    }

    /**
     * @param  null|CustomsTariffQuantity $customsTariffQuantity
     * @return static
     */
    public function setCustomsTariffQuantity(
        ?CustomsTariffQuantity $customsTariffQuantity = null
    ): static {
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
    public function setCustomsImportClassifiedIndicator(
        ?bool $customsImportClassifiedIndicator = null
    ): static {
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
        $this->chargeableQuantity ??= new ChargeableQuantity();

        return $this->chargeableQuantity;
    }

    /**
     * @param  null|ChargeableQuantity $chargeableQuantity
     * @return static
     */
    public function setChargeableQuantity(
        ?ChargeableQuantity $chargeableQuantity = null
    ): static {
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
        $this->returnableQuantity ??= new ReturnableQuantity();

        return $this->returnableQuantity;
    }

    /**
     * @param  null|ReturnableQuantity $returnableQuantity
     * @return static
     */
    public function setReturnableQuantity(
        ?ReturnableQuantity $returnableQuantity = null
    ): static {
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
    public function setItem(
        ?array $item = null
    ): static {
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
    public function addToItem(
        Item $item
    ): static {
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
    public function addOnceToItem(
        Item $item
    ): static {
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
    public function setGoodsItemContainer(
        ?array $goodsItemContainer = null
    ): static {
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
    public function addToGoodsItemContainer(
        GoodsItemContainer $goodsItemContainer
    ): static {
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
    public function addOnceToGoodsItemContainer(
        GoodsItemContainer $goodsItemContainer
    ): static {
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
    public function setFreightAllowanceCharge(
        ?array $freightAllowanceCharge = null
    ): static {
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
    public function addToFreightAllowanceCharge(
        FreightAllowanceCharge $freightAllowanceCharge
    ): static {
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
    public function addOnceToFreightAllowanceCharge(
        FreightAllowanceCharge $freightAllowanceCharge
    ): static {
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
    public function setInvoiceLine(
        ?array $invoiceLine = null
    ): static {
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
    public function addToInvoiceLine(
        InvoiceLine $invoiceLine
    ): static {
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
    public function addOnceToInvoiceLine(
        InvoiceLine $invoiceLine
    ): static {
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
    public function setTemperature(
        ?array $temperature = null
    ): static {
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
    public function addToTemperature(
        Temperature $temperature
    ): static {
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
    public function addOnceToTemperature(
        Temperature $temperature
    ): static {
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
    public function setContainedGoodsItem(
        ?array $containedGoodsItem = null
    ): static {
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
    public function addToContainedGoodsItem(
        ContainedGoodsItem $containedGoodsItem
    ): static {
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
    public function addOnceToContainedGoodsItem(
        ContainedGoodsItem $containedGoodsItem
    ): static {
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
        $this->originAddress ??= new OriginAddress();

        return $this->originAddress;
    }

    /**
     * @param  null|OriginAddress $originAddress
     * @return static
     */
    public function setOriginAddress(
        ?OriginAddress $originAddress = null
    ): static {
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
        $this->addTomeasurementDimension($measurementDimension = new MeasurementDimension());

        return $measurementDimension;
    }

    /**
     * @param  MeasurementDimension $measurementDimension
     * @return static
     */
    public function addOnceToMeasurementDimension(
        MeasurementDimension $measurementDimension
    ): static {
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
    public function setContainingPackage(
        ?array $containingPackage = null
    ): static {
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
    public function addToContainingPackage(
        ContainingPackage $containingPackage
    ): static {
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
    public function addOnceToContainingPackage(
        ContainingPackage $containingPackage
    ): static {
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
        $this->shipmentDocumentReference ??= new ShipmentDocumentReference();

        return $this->shipmentDocumentReference;
    }

    /**
     * @param  null|ShipmentDocumentReference $shipmentDocumentReference
     * @return static
     */
    public function setShipmentDocumentReference(
        ?ShipmentDocumentReference $shipmentDocumentReference = null
    ): static {
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
        $this->minimumTemperature ??= new MinimumTemperature();

        return $this->minimumTemperature;
    }

    /**
     * @param  null|MinimumTemperature $minimumTemperature
     * @return static
     */
    public function setMinimumTemperature(
        ?MinimumTemperature $minimumTemperature = null
    ): static {
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
        $this->maximumTemperature ??= new MaximumTemperature();

        return $this->maximumTemperature;
    }

    /**
     * @param  null|MaximumTemperature $maximumTemperature
     * @return static
     */
    public function setMaximumTemperature(
        ?MaximumTemperature $maximumTemperature = null
    ): static {
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
