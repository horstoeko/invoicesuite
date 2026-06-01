<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ConsignmentQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\DeclaredCustomsValueAmount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\DeclaredForCarriageValueAmount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\DeclaredStatisticsValueAmount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\DeliveryInstructions;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\FreeOnBoardValueAmount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\GrossVolumeMeasure;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\GrossWeightMeasure;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\HandlingCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\HandlingInstructions;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Information;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\InsuranceValueAmount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\NetNetWeightMeasure;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\NetVolumeMeasure;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\NetWeightMeasure;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ShippingPriorityLevelCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SpecialInstructions;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TotalGoodsItemQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TotalTransportHandlingUnitQuantity;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use JMS\Serializer\Annotation as JMS;

class ShipmentType
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
     * @var null|ShippingPriorityLevelCode
     */
    #[JMS\Accessor(getter: 'getShippingPriorityLevelCode', setter: 'setShippingPriorityLevelCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ShippingPriorityLevelCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ShippingPriorityLevelCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $shippingPriorityLevelCode;

    /**
     * @var null|HandlingCode
     */
    #[JMS\Accessor(getter: 'getHandlingCode', setter: 'setHandlingCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('HandlingCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\HandlingCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $handlingCode;

    /**
     * @var null|array<HandlingInstructions>
     */
    #[JMS\Accessor(getter: 'getHandlingInstructions', setter: 'setHandlingInstructions')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('HandlingInstructions')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\HandlingInstructions>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'HandlingInstructions', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $handlingInstructions;

    /**
     * @var null|array<Information>
     */
    #[JMS\Accessor(getter: 'getInformation', setter: 'setInformation')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Information')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Information>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'Information', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $information;

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
     * @var null|TotalGoodsItemQuantity
     */
    #[JMS\Accessor(getter: 'getTotalGoodsItemQuantity', setter: 'setTotalGoodsItemQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TotalGoodsItemQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TotalGoodsItemQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $totalGoodsItemQuantity;

    /**
     * @var null|TotalTransportHandlingUnitQuantity
     */
    #[JMS\Accessor(getter: 'getTotalTransportHandlingUnitQuantity', setter: 'setTotalTransportHandlingUnitQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TotalTransportHandlingUnitQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TotalTransportHandlingUnitQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $totalTransportHandlingUnitQuantity;

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
     * @var null|array<SpecialInstructions>
     */
    #[JMS\Accessor(getter: 'getSpecialInstructions', setter: 'setSpecialInstructions')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SpecialInstructions')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SpecialInstructions>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'SpecialInstructions', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $specialInstructions;

    /**
     * @var null|array<DeliveryInstructions>
     */
    #[JMS\Accessor(getter: 'getDeliveryInstructions', setter: 'setDeliveryInstructions')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('DeliveryInstructions')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\DeliveryInstructions>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'DeliveryInstructions', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $deliveryInstructions;

    /**
     * @var null|bool
     */
    #[JMS\Accessor(getter: 'getSplitConsignmentIndicator', setter: 'setSplitConsignmentIndicator')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SplitConsignmentIndicator')]
    #[JMS\Type('bool')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $splitConsignmentIndicator;

    /**
     * @var null|ConsignmentQuantity
     */
    #[JMS\Accessor(getter: 'getConsignmentQuantity', setter: 'setConsignmentQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ConsignmentQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ConsignmentQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $consignmentQuantity;

    /**
     * @var null|array<Consignment>
     */
    #[JMS\Accessor(getter: 'getConsignment', setter: 'setConsignment')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Consignment')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\Consignment>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'Consignment', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $consignment;

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
     * @var null|array<ShipmentStage>
     */
    #[JMS\Accessor(getter: 'getShipmentStage', setter: 'setShipmentStage')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ShipmentStage')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\ShipmentStage>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'ShipmentStage', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $shipmentStage;

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
     * @var null|array<TransportHandlingUnit>
     */
    #[JMS\Accessor(getter: 'getTransportHandlingUnit', setter: 'setTransportHandlingUnit')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TransportHandlingUnit')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\TransportHandlingUnit>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'TransportHandlingUnit', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $transportHandlingUnit;

    /**
     * @var null|ReturnAddress
     */
    #[JMS\Accessor(getter: 'getReturnAddress', setter: 'setReturnAddress')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ReturnAddress')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\ReturnAddress')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $returnAddress;

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
     * @var null|FirstArrivalPortLocation
     */
    #[JMS\Accessor(getter: 'getFirstArrivalPortLocation', setter: 'setFirstArrivalPortLocation')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('FirstArrivalPortLocation')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\FirstArrivalPortLocation')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $firstArrivalPortLocation;

    /**
     * @var null|LastExitPortLocation
     */
    #[JMS\Accessor(getter: 'getLastExitPortLocation', setter: 'setLastExitPortLocation')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('LastExitPortLocation')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\LastExitPortLocation')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $lastExitPortLocation;

    /**
     * @var null|ExportCountry
     */
    #[JMS\Accessor(getter: 'getExportCountry', setter: 'setExportCountry')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ExportCountry')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\ExportCountry')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $exportCountry;

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
     * @return null|ShippingPriorityLevelCode
     */
    public function getShippingPriorityLevelCode(): ?ShippingPriorityLevelCode
    {
        return $this->shippingPriorityLevelCode;
    }

    /**
     * @return ShippingPriorityLevelCode
     */
    public function getShippingPriorityLevelCodeWithCreate(): ShippingPriorityLevelCode
    {
        $this->shippingPriorityLevelCode ??= new ShippingPriorityLevelCode();

        return $this->shippingPriorityLevelCode;
    }

    /**
     * @param  null|ShippingPriorityLevelCode $shippingPriorityLevelCode
     * @return static
     */
    public function setShippingPriorityLevelCode(
        ?ShippingPriorityLevelCode $shippingPriorityLevelCode = null
    ): static {
        $this->shippingPriorityLevelCode = $shippingPriorityLevelCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetShippingPriorityLevelCode(): static
    {
        $this->shippingPriorityLevelCode = null;

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
        $this->handlingCode ??= new HandlingCode();

        return $this->handlingCode;
    }

    /**
     * @param  null|HandlingCode $handlingCode
     * @return static
     */
    public function setHandlingCode(
        ?HandlingCode $handlingCode = null
    ): static {
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
    public function setHandlingInstructions(
        ?array $handlingInstructions = null
    ): static {
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
    public function addToHandlingInstructions(
        HandlingInstructions $handlingInstructions
    ): static {
        $this->handlingInstructions[] = $handlingInstructions;

        return $this;
    }

    /**
     * @return HandlingInstructions
     */
    public function addToHandlingInstructionsWithCreate(): HandlingInstructions
    {
        $this->addToHandlingInstructions($handlingInstructions = new HandlingInstructions());

        return $handlingInstructions;
    }

    /**
     * @param  HandlingInstructions $handlingInstructions
     * @return static
     */
    public function addOnceToHandlingInstructions(
        HandlingInstructions $handlingInstructions
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->handlingInstructions)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->handlingInstructions)) {
            $this->handlingInstructions = [];
        }

        if ([] === $this->handlingInstructions) {
            $this->addOnceToHandlingInstructions(new HandlingInstructions());
        }

        return $this->handlingInstructions[0];
    }

    /**
     * @return null|array<Information>
     */
    public function getInformation(): ?array
    {
        return $this->information;
    }

    /**
     * @param  null|array<Information> $information
     * @return static
     */
    public function setInformation(
        ?array $information = null
    ): static {
        $this->information = $information;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetInformation(): static
    {
        $this->information = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearInformation(): static
    {
        $this->information = [];

        return $this;
    }

    /**
     * @return null|Information
     */
    public function firstInformation(): ?Information
    {
        $information = $this->information ?? [];
        $information = reset($information);

        if (false === $information) {
            return null;
        }

        return $information;
    }

    /**
     * @return null|Information
     */
    public function lastInformation(): ?Information
    {
        $information = $this->information ?? [];
        $information = end($information);

        if (false === $information) {
            return null;
        }

        return $information;
    }

    /**
     * @param  Information $information
     * @return static
     */
    public function addToInformation(
        Information $information
    ): static {
        $this->information[] = $information;

        return $this;
    }

    /**
     * @return Information
     */
    public function addToInformationWithCreate(): Information
    {
        $this->addToInformation($information = new Information());

        return $information;
    }

    /**
     * @param  Information $information
     * @return static
     */
    public function addOnceToInformation(
        Information $information
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->information)) {
            $this->information = [];
        }

        $this->information[0] = $information;

        return $this;
    }

    /**
     * @return Information
     */
    public function addOnceToInformationWithCreate(): Information
    {
        if (!InvoiceSuiteArrayUtils::is($this->information)) {
            $this->information = [];
        }

        if ([] === $this->information) {
            $this->addOnceToInformation(new Information());
        }

        return $this->information[0];
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
        $this->totalGoodsItemQuantity ??= new TotalGoodsItemQuantity();

        return $this->totalGoodsItemQuantity;
    }

    /**
     * @param  null|TotalGoodsItemQuantity $totalGoodsItemQuantity
     * @return static
     */
    public function setTotalGoodsItemQuantity(
        ?TotalGoodsItemQuantity $totalGoodsItemQuantity = null
    ): static {
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
     * @return null|TotalTransportHandlingUnitQuantity
     */
    public function getTotalTransportHandlingUnitQuantity(): ?TotalTransportHandlingUnitQuantity
    {
        return $this->totalTransportHandlingUnitQuantity;
    }

    /**
     * @return TotalTransportHandlingUnitQuantity
     */
    public function getTotalTransportHandlingUnitQuantityWithCreate(): TotalTransportHandlingUnitQuantity
    {
        $this->totalTransportHandlingUnitQuantity ??= new TotalTransportHandlingUnitQuantity();

        return $this->totalTransportHandlingUnitQuantity;
    }

    /**
     * @param  null|TotalTransportHandlingUnitQuantity $totalTransportHandlingUnitQuantity
     * @return static
     */
    public function setTotalTransportHandlingUnitQuantity(
        ?TotalTransportHandlingUnitQuantity $totalTransportHandlingUnitQuantity = null,
    ): static {
        $this->totalTransportHandlingUnitQuantity = $totalTransportHandlingUnitQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTotalTransportHandlingUnitQuantity(): static
    {
        $this->totalTransportHandlingUnitQuantity = null;

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
     * @return null|array<SpecialInstructions>
     */
    public function getSpecialInstructions(): ?array
    {
        return $this->specialInstructions;
    }

    /**
     * @param  null|array<SpecialInstructions> $specialInstructions
     * @return static
     */
    public function setSpecialInstructions(
        ?array $specialInstructions = null
    ): static {
        $this->specialInstructions = $specialInstructions;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSpecialInstructions(): static
    {
        $this->specialInstructions = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearSpecialInstructions(): static
    {
        $this->specialInstructions = [];

        return $this;
    }

    /**
     * @return null|SpecialInstructions
     */
    public function firstSpecialInstructions(): ?SpecialInstructions
    {
        $specialInstructions = $this->specialInstructions ?? [];
        $specialInstructions = reset($specialInstructions);

        if (false === $specialInstructions) {
            return null;
        }

        return $specialInstructions;
    }

    /**
     * @return null|SpecialInstructions
     */
    public function lastSpecialInstructions(): ?SpecialInstructions
    {
        $specialInstructions = $this->specialInstructions ?? [];
        $specialInstructions = end($specialInstructions);

        if (false === $specialInstructions) {
            return null;
        }

        return $specialInstructions;
    }

    /**
     * @param  SpecialInstructions $specialInstructions
     * @return static
     */
    public function addToSpecialInstructions(
        SpecialInstructions $specialInstructions
    ): static {
        $this->specialInstructions[] = $specialInstructions;

        return $this;
    }

    /**
     * @return SpecialInstructions
     */
    public function addToSpecialInstructionsWithCreate(): SpecialInstructions
    {
        $this->addToSpecialInstructions($specialInstructions = new SpecialInstructions());

        return $specialInstructions;
    }

    /**
     * @param  SpecialInstructions $specialInstructions
     * @return static
     */
    public function addOnceToSpecialInstructions(
        SpecialInstructions $specialInstructions
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->specialInstructions)) {
            $this->specialInstructions = [];
        }

        $this->specialInstructions[0] = $specialInstructions;

        return $this;
    }

    /**
     * @return SpecialInstructions
     */
    public function addOnceToSpecialInstructionsWithCreate(): SpecialInstructions
    {
        if (!InvoiceSuiteArrayUtils::is($this->specialInstructions)) {
            $this->specialInstructions = [];
        }

        if ([] === $this->specialInstructions) {
            $this->addOnceToSpecialInstructions(new SpecialInstructions());
        }

        return $this->specialInstructions[0];
    }

    /**
     * @return null|array<DeliveryInstructions>
     */
    public function getDeliveryInstructions(): ?array
    {
        return $this->deliveryInstructions;
    }

    /**
     * @param  null|array<DeliveryInstructions> $deliveryInstructions
     * @return static
     */
    public function setDeliveryInstructions(
        ?array $deliveryInstructions = null
    ): static {
        $this->deliveryInstructions = $deliveryInstructions;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDeliveryInstructions(): static
    {
        $this->deliveryInstructions = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearDeliveryInstructions(): static
    {
        $this->deliveryInstructions = [];

        return $this;
    }

    /**
     * @return null|DeliveryInstructions
     */
    public function firstDeliveryInstructions(): ?DeliveryInstructions
    {
        $deliveryInstructions = $this->deliveryInstructions ?? [];
        $deliveryInstructions = reset($deliveryInstructions);

        if (false === $deliveryInstructions) {
            return null;
        }

        return $deliveryInstructions;
    }

    /**
     * @return null|DeliveryInstructions
     */
    public function lastDeliveryInstructions(): ?DeliveryInstructions
    {
        $deliveryInstructions = $this->deliveryInstructions ?? [];
        $deliveryInstructions = end($deliveryInstructions);

        if (false === $deliveryInstructions) {
            return null;
        }

        return $deliveryInstructions;
    }

    /**
     * @param  DeliveryInstructions $deliveryInstructions
     * @return static
     */
    public function addToDeliveryInstructions(
        DeliveryInstructions $deliveryInstructions
    ): static {
        $this->deliveryInstructions[] = $deliveryInstructions;

        return $this;
    }

    /**
     * @return DeliveryInstructions
     */
    public function addToDeliveryInstructionsWithCreate(): DeliveryInstructions
    {
        $this->addToDeliveryInstructions($deliveryInstructions = new DeliveryInstructions());

        return $deliveryInstructions;
    }

    /**
     * @param  DeliveryInstructions $deliveryInstructions
     * @return static
     */
    public function addOnceToDeliveryInstructions(
        DeliveryInstructions $deliveryInstructions
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->deliveryInstructions)) {
            $this->deliveryInstructions = [];
        }

        $this->deliveryInstructions[0] = $deliveryInstructions;

        return $this;
    }

    /**
     * @return DeliveryInstructions
     */
    public function addOnceToDeliveryInstructionsWithCreate(): DeliveryInstructions
    {
        if (!InvoiceSuiteArrayUtils::is($this->deliveryInstructions)) {
            $this->deliveryInstructions = [];
        }

        if ([] === $this->deliveryInstructions) {
            $this->addOnceToDeliveryInstructions(new DeliveryInstructions());
        }

        return $this->deliveryInstructions[0];
    }

    /**
     * @return null|bool
     */
    public function getSplitConsignmentIndicator(): ?bool
    {
        return $this->splitConsignmentIndicator;
    }

    /**
     * @param  null|bool $splitConsignmentIndicator
     * @return static
     */
    public function setSplitConsignmentIndicator(
        ?bool $splitConsignmentIndicator = null
    ): static {
        $this->splitConsignmentIndicator = $splitConsignmentIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSplitConsignmentIndicator(): static
    {
        $this->splitConsignmentIndicator = null;

        return $this;
    }

    /**
     * @return null|ConsignmentQuantity
     */
    public function getConsignmentQuantity(): ?ConsignmentQuantity
    {
        return $this->consignmentQuantity;
    }

    /**
     * @return ConsignmentQuantity
     */
    public function getConsignmentQuantityWithCreate(): ConsignmentQuantity
    {
        $this->consignmentQuantity ??= new ConsignmentQuantity();

        return $this->consignmentQuantity;
    }

    /**
     * @param  null|ConsignmentQuantity $consignmentQuantity
     * @return static
     */
    public function setConsignmentQuantity(
        ?ConsignmentQuantity $consignmentQuantity = null
    ): static {
        $this->consignmentQuantity = $consignmentQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetConsignmentQuantity(): static
    {
        $this->consignmentQuantity = null;

        return $this;
    }

    /**
     * @return null|array<Consignment>
     */
    public function getConsignment(): ?array
    {
        return $this->consignment;
    }

    /**
     * @param  null|array<Consignment> $consignment
     * @return static
     */
    public function setConsignment(
        ?array $consignment = null
    ): static {
        $this->consignment = $consignment;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetConsignment(): static
    {
        $this->consignment = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearConsignment(): static
    {
        $this->consignment = [];

        return $this;
    }

    /**
     * @return null|Consignment
     */
    public function firstConsignment(): ?Consignment
    {
        $consignment = $this->consignment ?? [];
        $consignment = reset($consignment);

        if (false === $consignment) {
            return null;
        }

        return $consignment;
    }

    /**
     * @return null|Consignment
     */
    public function lastConsignment(): ?Consignment
    {
        $consignment = $this->consignment ?? [];
        $consignment = end($consignment);

        if (false === $consignment) {
            return null;
        }

        return $consignment;
    }

    /**
     * @param  Consignment $consignment
     * @return static
     */
    public function addToConsignment(
        Consignment $consignment
    ): static {
        $this->consignment[] = $consignment;

        return $this;
    }

    /**
     * @return Consignment
     */
    public function addToConsignmentWithCreate(): Consignment
    {
        $this->addToConsignment($consignment = new Consignment());

        return $consignment;
    }

    /**
     * @param  Consignment $consignment
     * @return static
     */
    public function addOnceToConsignment(
        Consignment $consignment
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->consignment)) {
            $this->consignment = [];
        }

        $this->consignment[0] = $consignment;

        return $this;
    }

    /**
     * @return Consignment
     */
    public function addOnceToConsignmentWithCreate(): Consignment
    {
        if (!InvoiceSuiteArrayUtils::is($this->consignment)) {
            $this->consignment = [];
        }

        if ([] === $this->consignment) {
            $this->addOnceToConsignment(new Consignment());
        }

        return $this->consignment[0];
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
     * @return null|array<ShipmentStage>
     */
    public function getShipmentStage(): ?array
    {
        return $this->shipmentStage;
    }

    /**
     * @param  null|array<ShipmentStage> $shipmentStage
     * @return static
     */
    public function setShipmentStage(
        ?array $shipmentStage = null
    ): static {
        $this->shipmentStage = $shipmentStage;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetShipmentStage(): static
    {
        $this->shipmentStage = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearShipmentStage(): static
    {
        $this->shipmentStage = [];

        return $this;
    }

    /**
     * @return null|ShipmentStage
     */
    public function firstShipmentStage(): ?ShipmentStage
    {
        $shipmentStage = $this->shipmentStage ?? [];
        $shipmentStage = reset($shipmentStage);

        if (false === $shipmentStage) {
            return null;
        }

        return $shipmentStage;
    }

    /**
     * @return null|ShipmentStage
     */
    public function lastShipmentStage(): ?ShipmentStage
    {
        $shipmentStage = $this->shipmentStage ?? [];
        $shipmentStage = end($shipmentStage);

        if (false === $shipmentStage) {
            return null;
        }

        return $shipmentStage;
    }

    /**
     * @param  ShipmentStage $shipmentStage
     * @return static
     */
    public function addToShipmentStage(
        ShipmentStage $shipmentStage
    ): static {
        $this->shipmentStage[] = $shipmentStage;

        return $this;
    }

    /**
     * @return ShipmentStage
     */
    public function addToShipmentStageWithCreate(): ShipmentStage
    {
        $this->addToShipmentStage($shipmentStage = new ShipmentStage());

        return $shipmentStage;
    }

    /**
     * @param  ShipmentStage $shipmentStage
     * @return static
     */
    public function addOnceToShipmentStage(
        ShipmentStage $shipmentStage
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->shipmentStage)) {
            $this->shipmentStage = [];
        }

        $this->shipmentStage[0] = $shipmentStage;

        return $this;
    }

    /**
     * @return ShipmentStage
     */
    public function addOnceToShipmentStageWithCreate(): ShipmentStage
    {
        if (!InvoiceSuiteArrayUtils::is($this->shipmentStage)) {
            $this->shipmentStage = [];
        }

        if ([] === $this->shipmentStage) {
            $this->addOnceToShipmentStage(new ShipmentStage());
        }

        return $this->shipmentStage[0];
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
     * @return null|array<TransportHandlingUnit>
     */
    public function getTransportHandlingUnit(): ?array
    {
        return $this->transportHandlingUnit;
    }

    /**
     * @param  null|array<TransportHandlingUnit> $transportHandlingUnit
     * @return static
     */
    public function setTransportHandlingUnit(
        ?array $transportHandlingUnit = null
    ): static {
        $this->transportHandlingUnit = $transportHandlingUnit;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTransportHandlingUnit(): static
    {
        $this->transportHandlingUnit = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearTransportHandlingUnit(): static
    {
        $this->transportHandlingUnit = [];

        return $this;
    }

    /**
     * @return null|TransportHandlingUnit
     */
    public function firstTransportHandlingUnit(): ?TransportHandlingUnit
    {
        $transportHandlingUnit = $this->transportHandlingUnit ?? [];
        $transportHandlingUnit = reset($transportHandlingUnit);

        if (false === $transportHandlingUnit) {
            return null;
        }

        return $transportHandlingUnit;
    }

    /**
     * @return null|TransportHandlingUnit
     */
    public function lastTransportHandlingUnit(): ?TransportHandlingUnit
    {
        $transportHandlingUnit = $this->transportHandlingUnit ?? [];
        $transportHandlingUnit = end($transportHandlingUnit);

        if (false === $transportHandlingUnit) {
            return null;
        }

        return $transportHandlingUnit;
    }

    /**
     * @param  TransportHandlingUnit $transportHandlingUnit
     * @return static
     */
    public function addToTransportHandlingUnit(
        TransportHandlingUnit $transportHandlingUnit
    ): static {
        $this->transportHandlingUnit[] = $transportHandlingUnit;

        return $this;
    }

    /**
     * @return TransportHandlingUnit
     */
    public function addToTransportHandlingUnitWithCreate(): TransportHandlingUnit
    {
        $this->addToTransportHandlingUnit($transportHandlingUnit = new TransportHandlingUnit());

        return $transportHandlingUnit;
    }

    /**
     * @param  TransportHandlingUnit $transportHandlingUnit
     * @return static
     */
    public function addOnceToTransportHandlingUnit(
        TransportHandlingUnit $transportHandlingUnit
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->transportHandlingUnit)) {
            $this->transportHandlingUnit = [];
        }

        $this->transportHandlingUnit[0] = $transportHandlingUnit;

        return $this;
    }

    /**
     * @return TransportHandlingUnit
     */
    public function addOnceToTransportHandlingUnitWithCreate(): TransportHandlingUnit
    {
        if (!InvoiceSuiteArrayUtils::is($this->transportHandlingUnit)) {
            $this->transportHandlingUnit = [];
        }

        if ([] === $this->transportHandlingUnit) {
            $this->addOnceToTransportHandlingUnit(new TransportHandlingUnit());
        }

        return $this->transportHandlingUnit[0];
    }

    /**
     * @return null|ReturnAddress
     */
    public function getReturnAddress(): ?ReturnAddress
    {
        return $this->returnAddress;
    }

    /**
     * @return ReturnAddress
     */
    public function getReturnAddressWithCreate(): ReturnAddress
    {
        $this->returnAddress ??= new ReturnAddress();

        return $this->returnAddress;
    }

    /**
     * @param  null|ReturnAddress $returnAddress
     * @return static
     */
    public function setReturnAddress(
        ?ReturnAddress $returnAddress = null
    ): static {
        $this->returnAddress = $returnAddress;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetReturnAddress(): static
    {
        $this->returnAddress = null;

        return $this;
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
     * @return null|FirstArrivalPortLocation
     */
    public function getFirstArrivalPortLocation(): ?FirstArrivalPortLocation
    {
        return $this->firstArrivalPortLocation;
    }

    /**
     * @return FirstArrivalPortLocation
     */
    public function getFirstArrivalPortLocationWithCreate(): FirstArrivalPortLocation
    {
        $this->firstArrivalPortLocation ??= new FirstArrivalPortLocation();

        return $this->firstArrivalPortLocation;
    }

    /**
     * @param  null|FirstArrivalPortLocation $firstArrivalPortLocation
     * @return static
     */
    public function setFirstArrivalPortLocation(
        ?FirstArrivalPortLocation $firstArrivalPortLocation = null
    ): static {
        $this->firstArrivalPortLocation = $firstArrivalPortLocation;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetFirstArrivalPortLocation(): static
    {
        $this->firstArrivalPortLocation = null;

        return $this;
    }

    /**
     * @return null|LastExitPortLocation
     */
    public function getLastExitPortLocation(): ?LastExitPortLocation
    {
        return $this->lastExitPortLocation;
    }

    /**
     * @return LastExitPortLocation
     */
    public function getLastExitPortLocationWithCreate(): LastExitPortLocation
    {
        $this->lastExitPortLocation ??= new LastExitPortLocation();

        return $this->lastExitPortLocation;
    }

    /**
     * @param  null|LastExitPortLocation $lastExitPortLocation
     * @return static
     */
    public function setLastExitPortLocation(
        ?LastExitPortLocation $lastExitPortLocation = null
    ): static {
        $this->lastExitPortLocation = $lastExitPortLocation;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLastExitPortLocation(): static
    {
        $this->lastExitPortLocation = null;

        return $this;
    }

    /**
     * @return null|ExportCountry
     */
    public function getExportCountry(): ?ExportCountry
    {
        return $this->exportCountry;
    }

    /**
     * @return ExportCountry
     */
    public function getExportCountryWithCreate(): ExportCountry
    {
        $this->exportCountry ??= new ExportCountry();

        return $this->exportCountry;
    }

    /**
     * @param  null|ExportCountry $exportCountry
     * @return static
     */
    public function setExportCountry(
        ?ExportCountry $exportCountry = null
    ): static {
        $this->exportCountry = $exportCountry;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetExportCountry(): static
    {
        $this->exportCountry = null;

        return $this;
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
        $this->addToFreightAllowanceCharge($freightAllowanceCharge = new FreightAllowanceCharge());

        return $freightAllowanceCharge;
    }

    /**
     * @param  FreightAllowanceCharge $freightAllowanceCharge
     * @return static
     */
    public function addOnceToFreightAllowanceCharge(
        FreightAllowanceCharge $freightAllowanceCharge
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->freightAllowanceCharge)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->freightAllowanceCharge)) {
            $this->freightAllowanceCharge = [];
        }

        if ([] === $this->freightAllowanceCharge) {
            $this->addOnceToFreightAllowanceCharge(new FreightAllowanceCharge());
        }

        return $this->freightAllowanceCharge[0];
    }
}
