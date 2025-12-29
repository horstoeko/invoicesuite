<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ConsignmentQuantity;
use horstoeko\invoicesuite\documents\models\peppol\cbc\DeclaredCustomsValueAmount;
use horstoeko\invoicesuite\documents\models\peppol\cbc\DeclaredForCarriageValueAmount;
use horstoeko\invoicesuite\documents\models\peppol\cbc\DeclaredStatisticsValueAmount;
use horstoeko\invoicesuite\documents\models\peppol\cbc\DeliveryInstructions;
use horstoeko\invoicesuite\documents\models\peppol\cbc\FreeOnBoardValueAmount;
use horstoeko\invoicesuite\documents\models\peppol\cbc\GrossVolumeMeasure;
use horstoeko\invoicesuite\documents\models\peppol\cbc\GrossWeightMeasure;
use horstoeko\invoicesuite\documents\models\peppol\cbc\HandlingCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\HandlingInstructions;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Information;
use horstoeko\invoicesuite\documents\models\peppol\cbc\InsuranceValueAmount;
use horstoeko\invoicesuite\documents\models\peppol\cbc\NetNetWeightMeasure;
use horstoeko\invoicesuite\documents\models\peppol\cbc\NetVolumeMeasure;
use horstoeko\invoicesuite\documents\models\peppol\cbc\NetWeightMeasure;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ShippingPriorityLevelCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\SpecialInstructions;
use horstoeko\invoicesuite\documents\models\peppol\cbc\TotalGoodsItemQuantity;
use horstoeko\invoicesuite\documents\models\peppol\cbc\TotalTransportHandlingUnitQuantity;
use JMS\Serializer\Annotation as JMS;

class ShipmentType
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
     * @var null|ShippingPriorityLevelCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ShippingPriorityLevelCode")
     * @JMS\Expose
     * @JMS\SerializedName("ShippingPriorityLevelCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getShippingPriorityLevelCode", setter="setShippingPriorityLevelCode")
     */
    private $shippingPriorityLevelCode;

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
     * @var null|array<Information>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\Information>")
     * @JMS\Expose
     * @JMS\SerializedName("Information")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Information", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getInformation", setter="setInformation")
     */
    private $information;

    /**
     * @var null|GrossWeightMeasure
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\GrossWeightMeasure")
     * @JMS\Expose
     * @JMS\SerializedName("GrossWeightMeasure")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getGrossWeightMeasure", setter="setGrossWeightMeasure")
     */
    private $grossWeightMeasure;

    /**
     * @var null|NetWeightMeasure
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\NetWeightMeasure")
     * @JMS\Expose
     * @JMS\SerializedName("NetWeightMeasure")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getNetWeightMeasure", setter="setNetWeightMeasure")
     */
    private $netWeightMeasure;

    /**
     * @var null|NetNetWeightMeasure
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\NetNetWeightMeasure")
     * @JMS\Expose
     * @JMS\SerializedName("NetNetWeightMeasure")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getNetNetWeightMeasure", setter="setNetNetWeightMeasure")
     */
    private $netNetWeightMeasure;

    /**
     * @var null|GrossVolumeMeasure
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\GrossVolumeMeasure")
     * @JMS\Expose
     * @JMS\SerializedName("GrossVolumeMeasure")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getGrossVolumeMeasure", setter="setGrossVolumeMeasure")
     */
    private $grossVolumeMeasure;

    /**
     * @var null|NetVolumeMeasure
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\NetVolumeMeasure")
     * @JMS\Expose
     * @JMS\SerializedName("NetVolumeMeasure")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getNetVolumeMeasure", setter="setNetVolumeMeasure")
     */
    private $netVolumeMeasure;

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
     * @var null|TotalTransportHandlingUnitQuantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\TotalTransportHandlingUnitQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("TotalTransportHandlingUnitQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTotalTransportHandlingUnitQuantity", setter="setTotalTransportHandlingUnitQuantity")
     */
    private $totalTransportHandlingUnitQuantity;

    /**
     * @var null|InsuranceValueAmount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\InsuranceValueAmount")
     * @JMS\Expose
     * @JMS\SerializedName("InsuranceValueAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getInsuranceValueAmount", setter="setInsuranceValueAmount")
     */
    private $insuranceValueAmount;

    /**
     * @var null|DeclaredCustomsValueAmount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\DeclaredCustomsValueAmount")
     * @JMS\Expose
     * @JMS\SerializedName("DeclaredCustomsValueAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDeclaredCustomsValueAmount", setter="setDeclaredCustomsValueAmount")
     */
    private $declaredCustomsValueAmount;

    /**
     * @var null|DeclaredForCarriageValueAmount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\DeclaredForCarriageValueAmount")
     * @JMS\Expose
     * @JMS\SerializedName("DeclaredForCarriageValueAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDeclaredForCarriageValueAmount", setter="setDeclaredForCarriageValueAmount")
     */
    private $declaredForCarriageValueAmount;

    /**
     * @var null|DeclaredStatisticsValueAmount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\DeclaredStatisticsValueAmount")
     * @JMS\Expose
     * @JMS\SerializedName("DeclaredStatisticsValueAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDeclaredStatisticsValueAmount", setter="setDeclaredStatisticsValueAmount")
     */
    private $declaredStatisticsValueAmount;

    /**
     * @var null|FreeOnBoardValueAmount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\FreeOnBoardValueAmount")
     * @JMS\Expose
     * @JMS\SerializedName("FreeOnBoardValueAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getFreeOnBoardValueAmount", setter="setFreeOnBoardValueAmount")
     */
    private $freeOnBoardValueAmount;

    /**
     * @var null|array<SpecialInstructions>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\SpecialInstructions>")
     * @JMS\Expose
     * @JMS\SerializedName("SpecialInstructions")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="SpecialInstructions", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getSpecialInstructions", setter="setSpecialInstructions")
     */
    private $specialInstructions;

    /**
     * @var null|array<DeliveryInstructions>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\DeliveryInstructions>")
     * @JMS\Expose
     * @JMS\SerializedName("DeliveryInstructions")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="DeliveryInstructions", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getDeliveryInstructions", setter="setDeliveryInstructions")
     */
    private $deliveryInstructions;

    /**
     * @var null|bool
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("SplitConsignmentIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSplitConsignmentIndicator", setter="setSplitConsignmentIndicator")
     */
    private $splitConsignmentIndicator;

    /**
     * @var null|ConsignmentQuantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ConsignmentQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("ConsignmentQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getConsignmentQuantity", setter="setConsignmentQuantity")
     */
    private $consignmentQuantity;

    /**
     * @var null|array<Consignment>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\Consignment>")
     * @JMS\Expose
     * @JMS\SerializedName("Consignment")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Consignment", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getConsignment", setter="setConsignment")
     */
    private $consignment;

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
     * @var null|array<ShipmentStage>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\ShipmentStage>")
     * @JMS\Expose
     * @JMS\SerializedName("ShipmentStage")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ShipmentStage", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getShipmentStage", setter="setShipmentStage")
     */
    private $shipmentStage;

    /**
     * @var null|Delivery
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\Delivery")
     * @JMS\Expose
     * @JMS\SerializedName("Delivery")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDelivery", setter="setDelivery")
     */
    private $delivery;

    /**
     * @var null|array<TransportHandlingUnit>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\TransportHandlingUnit>")
     * @JMS\Expose
     * @JMS\SerializedName("TransportHandlingUnit")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TransportHandlingUnit", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getTransportHandlingUnit", setter="setTransportHandlingUnit")
     */
    private $transportHandlingUnit;

    /**
     * @var null|ReturnAddress
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\ReturnAddress")
     * @JMS\Expose
     * @JMS\SerializedName("ReturnAddress")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getReturnAddress", setter="setReturnAddress")
     */
    private $returnAddress;

    /**
     * @var null|OriginAddress
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\OriginAddress")
     * @JMS\Expose
     * @JMS\SerializedName("OriginAddress")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOriginAddress", setter="setOriginAddress")
     */
    private $originAddress;

    /**
     * @var null|FirstArrivalPortLocation
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\FirstArrivalPortLocation")
     * @JMS\Expose
     * @JMS\SerializedName("FirstArrivalPortLocation")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getFirstArrivalPortLocation", setter="setFirstArrivalPortLocation")
     */
    private $firstArrivalPortLocation;

    /**
     * @var null|LastExitPortLocation
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\LastExitPortLocation")
     * @JMS\Expose
     * @JMS\SerializedName("LastExitPortLocation")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLastExitPortLocation", setter="setLastExitPortLocation")
     */
    private $lastExitPortLocation;

    /**
     * @var null|ExportCountry
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\ExportCountry")
     * @JMS\Expose
     * @JMS\SerializedName("ExportCountry")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getExportCountry", setter="setExportCountry")
     */
    private $exportCountry;

    /**
     * @var null|array<FreightAllowanceCharge>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\FreightAllowanceCharge>")
     * @JMS\Expose
     * @JMS\SerializedName("FreightAllowanceCharge")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="FreightAllowanceCharge", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getFreightAllowanceCharge", setter="setFreightAllowanceCharge")
     */
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
        $this->shippingPriorityLevelCode = is_null($this->shippingPriorityLevelCode) ? new ShippingPriorityLevelCode() : $this->shippingPriorityLevelCode;

        return $this->shippingPriorityLevelCode;
    }

    /**
     * @param  null|ShippingPriorityLevelCode $shippingPriorityLevelCode
     * @return static
     */
    public function setShippingPriorityLevelCode(?ShippingPriorityLevelCode $shippingPriorityLevelCode = null): static
    {
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
    public function setInformation(?array $information = null): static
    {
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
    public function addToInformation(Information $information): static
    {
        $this->information[] = $information;

        return $this;
    }

    /**
     * @return Information
     */
    public function addToInformationWithCreate(): Information
    {
        $this->addToinformation($information = new Information());

        return $information;
    }

    /**
     * @param  Information $information
     * @return static
     */
    public function addOnceToInformation(Information $information): static
    {
        if (!is_array($this->information)) {
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
        if (!is_array($this->information)) {
            $this->information = [];
        }

        if ([] === $this->information) {
            $this->addOnceToinformation(new Information());
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
        $this->totalTransportHandlingUnitQuantity = is_null($this->totalTransportHandlingUnitQuantity) ? new TotalTransportHandlingUnitQuantity() : $this->totalTransportHandlingUnitQuantity;

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
    public function setSpecialInstructions(?array $specialInstructions = null): static
    {
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
    public function addToSpecialInstructions(SpecialInstructions $specialInstructions): static
    {
        $this->specialInstructions[] = $specialInstructions;

        return $this;
    }

    /**
     * @return SpecialInstructions
     */
    public function addToSpecialInstructionsWithCreate(): SpecialInstructions
    {
        $this->addTospecialInstructions($specialInstructions = new SpecialInstructions());

        return $specialInstructions;
    }

    /**
     * @param  SpecialInstructions $specialInstructions
     * @return static
     */
    public function addOnceToSpecialInstructions(SpecialInstructions $specialInstructions): static
    {
        if (!is_array($this->specialInstructions)) {
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
        if (!is_array($this->specialInstructions)) {
            $this->specialInstructions = [];
        }

        if ([] === $this->specialInstructions) {
            $this->addOnceTospecialInstructions(new SpecialInstructions());
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
    public function setDeliveryInstructions(?array $deliveryInstructions = null): static
    {
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
    public function addToDeliveryInstructions(DeliveryInstructions $deliveryInstructions): static
    {
        $this->deliveryInstructions[] = $deliveryInstructions;

        return $this;
    }

    /**
     * @return DeliveryInstructions
     */
    public function addToDeliveryInstructionsWithCreate(): DeliveryInstructions
    {
        $this->addTodeliveryInstructions($deliveryInstructions = new DeliveryInstructions());

        return $deliveryInstructions;
    }

    /**
     * @param  DeliveryInstructions $deliveryInstructions
     * @return static
     */
    public function addOnceToDeliveryInstructions(DeliveryInstructions $deliveryInstructions): static
    {
        if (!is_array($this->deliveryInstructions)) {
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
        if (!is_array($this->deliveryInstructions)) {
            $this->deliveryInstructions = [];
        }

        if ([] === $this->deliveryInstructions) {
            $this->addOnceTodeliveryInstructions(new DeliveryInstructions());
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
    public function setSplitConsignmentIndicator(?bool $splitConsignmentIndicator = null): static
    {
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
        $this->consignmentQuantity = is_null($this->consignmentQuantity) ? new ConsignmentQuantity() : $this->consignmentQuantity;

        return $this->consignmentQuantity;
    }

    /**
     * @param  null|ConsignmentQuantity $consignmentQuantity
     * @return static
     */
    public function setConsignmentQuantity(?ConsignmentQuantity $consignmentQuantity = null): static
    {
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
    public function setConsignment(?array $consignment = null): static
    {
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
    public function addToConsignment(Consignment $consignment): static
    {
        $this->consignment[] = $consignment;

        return $this;
    }

    /**
     * @return Consignment
     */
    public function addToConsignmentWithCreate(): Consignment
    {
        $this->addToconsignment($consignment = new Consignment());

        return $consignment;
    }

    /**
     * @param  Consignment $consignment
     * @return static
     */
    public function addOnceToConsignment(Consignment $consignment): static
    {
        if (!is_array($this->consignment)) {
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
        if (!is_array($this->consignment)) {
            $this->consignment = [];
        }

        if ([] === $this->consignment) {
            $this->addOnceToconsignment(new Consignment());
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
    public function setShipmentStage(?array $shipmentStage = null): static
    {
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
    public function addToShipmentStage(ShipmentStage $shipmentStage): static
    {
        $this->shipmentStage[] = $shipmentStage;

        return $this;
    }

    /**
     * @return ShipmentStage
     */
    public function addToShipmentStageWithCreate(): ShipmentStage
    {
        $this->addToshipmentStage($shipmentStage = new ShipmentStage());

        return $shipmentStage;
    }

    /**
     * @param  ShipmentStage $shipmentStage
     * @return static
     */
    public function addOnceToShipmentStage(ShipmentStage $shipmentStage): static
    {
        if (!is_array($this->shipmentStage)) {
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
        if (!is_array($this->shipmentStage)) {
            $this->shipmentStage = [];
        }

        if ([] === $this->shipmentStage) {
            $this->addOnceToshipmentStage(new ShipmentStage());
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
    public function setTransportHandlingUnit(?array $transportHandlingUnit = null): static
    {
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
    public function addToTransportHandlingUnit(TransportHandlingUnit $transportHandlingUnit): static
    {
        $this->transportHandlingUnit[] = $transportHandlingUnit;

        return $this;
    }

    /**
     * @return TransportHandlingUnit
     */
    public function addToTransportHandlingUnitWithCreate(): TransportHandlingUnit
    {
        $this->addTotransportHandlingUnit($transportHandlingUnit = new TransportHandlingUnit());

        return $transportHandlingUnit;
    }

    /**
     * @param  TransportHandlingUnit $transportHandlingUnit
     * @return static
     */
    public function addOnceToTransportHandlingUnit(TransportHandlingUnit $transportHandlingUnit): static
    {
        if (!is_array($this->transportHandlingUnit)) {
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
        if (!is_array($this->transportHandlingUnit)) {
            $this->transportHandlingUnit = [];
        }

        if ([] === $this->transportHandlingUnit) {
            $this->addOnceTotransportHandlingUnit(new TransportHandlingUnit());
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
        $this->returnAddress = is_null($this->returnAddress) ? new ReturnAddress() : $this->returnAddress;

        return $this->returnAddress;
    }

    /**
     * @param  null|ReturnAddress $returnAddress
     * @return static
     */
    public function setReturnAddress(?ReturnAddress $returnAddress = null): static
    {
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
        $this->firstArrivalPortLocation = is_null($this->firstArrivalPortLocation) ? new FirstArrivalPortLocation() : $this->firstArrivalPortLocation;

        return $this->firstArrivalPortLocation;
    }

    /**
     * @param  null|FirstArrivalPortLocation $firstArrivalPortLocation
     * @return static
     */
    public function setFirstArrivalPortLocation(?FirstArrivalPortLocation $firstArrivalPortLocation = null): static
    {
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
        $this->lastExitPortLocation = is_null($this->lastExitPortLocation) ? new LastExitPortLocation() : $this->lastExitPortLocation;

        return $this->lastExitPortLocation;
    }

    /**
     * @param  null|LastExitPortLocation $lastExitPortLocation
     * @return static
     */
    public function setLastExitPortLocation(?LastExitPortLocation $lastExitPortLocation = null): static
    {
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
        $this->exportCountry = is_null($this->exportCountry) ? new ExportCountry() : $this->exportCountry;

        return $this->exportCountry;
    }

    /**
     * @param  null|ExportCountry $exportCountry
     * @return static
     */
    public function setExportCountry(?ExportCountry $exportCountry = null): static
    {
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
}
