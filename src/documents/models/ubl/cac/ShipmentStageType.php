<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\ubl\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\ubl\cbc\CrewQuantity;
use horstoeko\invoicesuite\documents\models\ubl\cbc\DemurrageInstructions;
use horstoeko\invoicesuite\documents\models\ubl\cbc\ID;
use horstoeko\invoicesuite\documents\models\ubl\cbc\Instructions;
use horstoeko\invoicesuite\documents\models\ubl\cbc\LoadingSequenceID;
use horstoeko\invoicesuite\documents\models\ubl\cbc\PassengerQuantity;
use horstoeko\invoicesuite\documents\models\ubl\cbc\SuccessiveSequenceID;
use horstoeko\invoicesuite\documents\models\ubl\cbc\TransitDirectionCode;
use horstoeko\invoicesuite\documents\models\ubl\cbc\TransportMeansTypeCode;
use horstoeko\invoicesuite\documents\models\ubl\cbc\TransportModeCode;
use JMS\Serializer\Annotation as JMS;

class ShipmentStageType
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
     * @var null|TransportModeCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\TransportModeCode")
     * @JMS\Expose
     * @JMS\SerializedName("TransportModeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTransportModeCode", setter="setTransportModeCode")
     */
    private $transportModeCode;

    /**
     * @var null|TransportMeansTypeCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\TransportMeansTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("TransportMeansTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTransportMeansTypeCode", setter="setTransportMeansTypeCode")
     */
    private $transportMeansTypeCode;

    /**
     * @var null|TransitDirectionCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\TransitDirectionCode")
     * @JMS\Expose
     * @JMS\SerializedName("TransitDirectionCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTransitDirectionCode", setter="setTransitDirectionCode")
     */
    private $transitDirectionCode;

    /**
     * @var null|bool
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("PreCarriageIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPreCarriageIndicator", setter="setPreCarriageIndicator")
     */
    private $preCarriageIndicator;

    /**
     * @var null|bool
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("OnCarriageIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOnCarriageIndicator", setter="setOnCarriageIndicator")
     */
    private $onCarriageIndicator;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("EstimatedDeliveryDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEstimatedDeliveryDate", setter="setEstimatedDeliveryDate")
     */
    private $estimatedDeliveryDate;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time")
     * @JMS\Expose
     * @JMS\SerializedName("EstimatedDeliveryTime")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEstimatedDeliveryTime", setter="setEstimatedDeliveryTime")
     */
    private $estimatedDeliveryTime;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("RequiredDeliveryDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRequiredDeliveryDate", setter="setRequiredDeliveryDate")
     */
    private $requiredDeliveryDate;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time")
     * @JMS\Expose
     * @JMS\SerializedName("RequiredDeliveryTime")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRequiredDeliveryTime", setter="setRequiredDeliveryTime")
     */
    private $requiredDeliveryTime;

    /**
     * @var null|LoadingSequenceID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\LoadingSequenceID")
     * @JMS\Expose
     * @JMS\SerializedName("LoadingSequenceID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLoadingSequenceID", setter="setLoadingSequenceID")
     */
    private $loadingSequenceID;

    /**
     * @var null|SuccessiveSequenceID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\SuccessiveSequenceID")
     * @JMS\Expose
     * @JMS\SerializedName("SuccessiveSequenceID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSuccessiveSequenceID", setter="setSuccessiveSequenceID")
     */
    private $successiveSequenceID;

    /**
     * @var null|array<Instructions>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cbc\Instructions>")
     * @JMS\Expose
     * @JMS\SerializedName("Instructions")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Instructions", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getInstructions", setter="setInstructions")
     */
    private $instructions;

    /**
     * @var null|array<DemurrageInstructions>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cbc\DemurrageInstructions>")
     * @JMS\Expose
     * @JMS\SerializedName("DemurrageInstructions")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="DemurrageInstructions", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getDemurrageInstructions", setter="setDemurrageInstructions")
     */
    private $demurrageInstructions;

    /**
     * @var null|CrewQuantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\CrewQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("CrewQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCrewQuantity", setter="setCrewQuantity")
     */
    private $crewQuantity;

    /**
     * @var null|PassengerQuantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\PassengerQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("PassengerQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPassengerQuantity", setter="setPassengerQuantity")
     */
    private $passengerQuantity;

    /**
     * @var null|TransitPeriod
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\TransitPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("TransitPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTransitPeriod", setter="setTransitPeriod")
     */
    private $transitPeriod;

    /**
     * @var null|array<CarrierParty>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\CarrierParty>")
     * @JMS\Expose
     * @JMS\SerializedName("CarrierParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="CarrierParty", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getCarrierParty", setter="setCarrierParty")
     */
    private $carrierParty;

    /**
     * @var null|TransportMeans
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\TransportMeans")
     * @JMS\Expose
     * @JMS\SerializedName("TransportMeans")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTransportMeans", setter="setTransportMeans")
     */
    private $transportMeans;

    /**
     * @var null|LoadingPortLocation
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\LoadingPortLocation")
     * @JMS\Expose
     * @JMS\SerializedName("LoadingPortLocation")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLoadingPortLocation", setter="setLoadingPortLocation")
     */
    private $loadingPortLocation;

    /**
     * @var null|UnloadingPortLocation
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\UnloadingPortLocation")
     * @JMS\Expose
     * @JMS\SerializedName("UnloadingPortLocation")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getUnloadingPortLocation", setter="setUnloadingPortLocation")
     */
    private $unloadingPortLocation;

    /**
     * @var null|TransshipPortLocation
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\TransshipPortLocation")
     * @JMS\Expose
     * @JMS\SerializedName("TransshipPortLocation")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTransshipPortLocation", setter="setTransshipPortLocation")
     */
    private $transshipPortLocation;

    /**
     * @var null|LoadingTransportEvent
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\LoadingTransportEvent")
     * @JMS\Expose
     * @JMS\SerializedName("LoadingTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLoadingTransportEvent", setter="setLoadingTransportEvent")
     */
    private $loadingTransportEvent;

    /**
     * @var null|ExaminationTransportEvent
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\ExaminationTransportEvent")
     * @JMS\Expose
     * @JMS\SerializedName("ExaminationTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getExaminationTransportEvent", setter="setExaminationTransportEvent")
     */
    private $examinationTransportEvent;

    /**
     * @var null|AvailabilityTransportEvent
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\AvailabilityTransportEvent")
     * @JMS\Expose
     * @JMS\SerializedName("AvailabilityTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAvailabilityTransportEvent", setter="setAvailabilityTransportEvent")
     */
    private $availabilityTransportEvent;

    /**
     * @var null|ExportationTransportEvent
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\ExportationTransportEvent")
     * @JMS\Expose
     * @JMS\SerializedName("ExportationTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getExportationTransportEvent", setter="setExportationTransportEvent")
     */
    private $exportationTransportEvent;

    /**
     * @var null|DischargeTransportEvent
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\DischargeTransportEvent")
     * @JMS\Expose
     * @JMS\SerializedName("DischargeTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDischargeTransportEvent", setter="setDischargeTransportEvent")
     */
    private $dischargeTransportEvent;

    /**
     * @var null|WarehousingTransportEvent
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\WarehousingTransportEvent")
     * @JMS\Expose
     * @JMS\SerializedName("WarehousingTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getWarehousingTransportEvent", setter="setWarehousingTransportEvent")
     */
    private $warehousingTransportEvent;

    /**
     * @var null|TakeoverTransportEvent
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\TakeoverTransportEvent")
     * @JMS\Expose
     * @JMS\SerializedName("TakeoverTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTakeoverTransportEvent", setter="setTakeoverTransportEvent")
     */
    private $takeoverTransportEvent;

    /**
     * @var null|OptionalTakeoverTransportEvent
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\OptionalTakeoverTransportEvent")
     * @JMS\Expose
     * @JMS\SerializedName("OptionalTakeoverTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOptionalTakeoverTransportEvent", setter="setOptionalTakeoverTransportEvent")
     */
    private $optionalTakeoverTransportEvent;

    /**
     * @var null|DropoffTransportEvent
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\DropoffTransportEvent")
     * @JMS\Expose
     * @JMS\SerializedName("DropoffTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDropoffTransportEvent", setter="setDropoffTransportEvent")
     */
    private $dropoffTransportEvent;

    /**
     * @var null|ActualPickupTransportEvent
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\ActualPickupTransportEvent")
     * @JMS\Expose
     * @JMS\SerializedName("ActualPickupTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getActualPickupTransportEvent", setter="setActualPickupTransportEvent")
     */
    private $actualPickupTransportEvent;

    /**
     * @var null|DeliveryTransportEvent
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\DeliveryTransportEvent")
     * @JMS\Expose
     * @JMS\SerializedName("DeliveryTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDeliveryTransportEvent", setter="setDeliveryTransportEvent")
     */
    private $deliveryTransportEvent;

    /**
     * @var null|ReceiptTransportEvent
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\ReceiptTransportEvent")
     * @JMS\Expose
     * @JMS\SerializedName("ReceiptTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getReceiptTransportEvent", setter="setReceiptTransportEvent")
     */
    private $receiptTransportEvent;

    /**
     * @var null|StorageTransportEvent
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\StorageTransportEvent")
     * @JMS\Expose
     * @JMS\SerializedName("StorageTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getStorageTransportEvent", setter="setStorageTransportEvent")
     */
    private $storageTransportEvent;

    /**
     * @var null|AcceptanceTransportEvent
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\AcceptanceTransportEvent")
     * @JMS\Expose
     * @JMS\SerializedName("AcceptanceTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAcceptanceTransportEvent", setter="setAcceptanceTransportEvent")
     */
    private $acceptanceTransportEvent;

    /**
     * @var null|TerminalOperatorParty
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\TerminalOperatorParty")
     * @JMS\Expose
     * @JMS\SerializedName("TerminalOperatorParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTerminalOperatorParty", setter="setTerminalOperatorParty")
     */
    private $terminalOperatorParty;

    /**
     * @var null|CustomsAgentParty
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\CustomsAgentParty")
     * @JMS\Expose
     * @JMS\SerializedName("CustomsAgentParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCustomsAgentParty", setter="setCustomsAgentParty")
     */
    private $customsAgentParty;

    /**
     * @var null|EstimatedTransitPeriod
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\EstimatedTransitPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("EstimatedTransitPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEstimatedTransitPeriod", setter="setEstimatedTransitPeriod")
     */
    private $estimatedTransitPeriod;

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
     * @var null|FreightChargeLocation
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\FreightChargeLocation")
     * @JMS\Expose
     * @JMS\SerializedName("FreightChargeLocation")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getFreightChargeLocation", setter="setFreightChargeLocation")
     */
    private $freightChargeLocation;

    /**
     * @var null|array<DetentionTransportEvent>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\DetentionTransportEvent>")
     * @JMS\Expose
     * @JMS\SerializedName("DetentionTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="DetentionTransportEvent", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getDetentionTransportEvent", setter="setDetentionTransportEvent")
     */
    private $detentionTransportEvent;

    /**
     * @var null|RequestedDepartureTransportEvent
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\RequestedDepartureTransportEvent")
     * @JMS\Expose
     * @JMS\SerializedName("RequestedDepartureTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRequestedDepartureTransportEvent", setter="setRequestedDepartureTransportEvent")
     */
    private $requestedDepartureTransportEvent;

    /**
     * @var null|RequestedArrivalTransportEvent
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\RequestedArrivalTransportEvent")
     * @JMS\Expose
     * @JMS\SerializedName("RequestedArrivalTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRequestedArrivalTransportEvent", setter="setRequestedArrivalTransportEvent")
     */
    private $requestedArrivalTransportEvent;

    /**
     * @var null|array<RequestedWaypointTransportEvent>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\RequestedWaypointTransportEvent>")
     * @JMS\Expose
     * @JMS\SerializedName("RequestedWaypointTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="RequestedWaypointTransportEvent", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getRequestedWaypointTransportEvent", setter="setRequestedWaypointTransportEvent")
     */
    private $requestedWaypointTransportEvent;

    /**
     * @var null|PlannedDepartureTransportEvent
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\PlannedDepartureTransportEvent")
     * @JMS\Expose
     * @JMS\SerializedName("PlannedDepartureTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPlannedDepartureTransportEvent", setter="setPlannedDepartureTransportEvent")
     */
    private $plannedDepartureTransportEvent;

    /**
     * @var null|PlannedArrivalTransportEvent
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\PlannedArrivalTransportEvent")
     * @JMS\Expose
     * @JMS\SerializedName("PlannedArrivalTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPlannedArrivalTransportEvent", setter="setPlannedArrivalTransportEvent")
     */
    private $plannedArrivalTransportEvent;

    /**
     * @var null|array<PlannedWaypointTransportEvent>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\PlannedWaypointTransportEvent>")
     * @JMS\Expose
     * @JMS\SerializedName("PlannedWaypointTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PlannedWaypointTransportEvent", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getPlannedWaypointTransportEvent", setter="setPlannedWaypointTransportEvent")
     */
    private $plannedWaypointTransportEvent;

    /**
     * @var null|ActualDepartureTransportEvent
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\ActualDepartureTransportEvent")
     * @JMS\Expose
     * @JMS\SerializedName("ActualDepartureTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getActualDepartureTransportEvent", setter="setActualDepartureTransportEvent")
     */
    private $actualDepartureTransportEvent;

    /**
     * @var null|ActualWaypointTransportEvent
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\ActualWaypointTransportEvent")
     * @JMS\Expose
     * @JMS\SerializedName("ActualWaypointTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getActualWaypointTransportEvent", setter="setActualWaypointTransportEvent")
     */
    private $actualWaypointTransportEvent;

    /**
     * @var null|ActualArrivalTransportEvent
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\ActualArrivalTransportEvent")
     * @JMS\Expose
     * @JMS\SerializedName("ActualArrivalTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getActualArrivalTransportEvent", setter="setActualArrivalTransportEvent")
     */
    private $actualArrivalTransportEvent;

    /**
     * @var null|array<TransportEvent>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\TransportEvent>")
     * @JMS\Expose
     * @JMS\SerializedName("TransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TransportEvent", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getTransportEvent", setter="setTransportEvent")
     */
    private $transportEvent;

    /**
     * @var null|EstimatedDepartureTransportEvent
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\EstimatedDepartureTransportEvent")
     * @JMS\Expose
     * @JMS\SerializedName("EstimatedDepartureTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEstimatedDepartureTransportEvent", setter="setEstimatedDepartureTransportEvent")
     */
    private $estimatedDepartureTransportEvent;

    /**
     * @var null|EstimatedArrivalTransportEvent
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\EstimatedArrivalTransportEvent")
     * @JMS\Expose
     * @JMS\SerializedName("EstimatedArrivalTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEstimatedArrivalTransportEvent", setter="setEstimatedArrivalTransportEvent")
     */
    private $estimatedArrivalTransportEvent;

    /**
     * @var null|array<PassengerPerson>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\PassengerPerson>")
     * @JMS\Expose
     * @JMS\SerializedName("PassengerPerson")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PassengerPerson", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getPassengerPerson", setter="setPassengerPerson")
     */
    private $passengerPerson;

    /**
     * @var null|array<DriverPerson>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\DriverPerson>")
     * @JMS\Expose
     * @JMS\SerializedName("DriverPerson")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="DriverPerson", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getDriverPerson", setter="setDriverPerson")
     */
    private $driverPerson;

    /**
     * @var null|ReportingPerson
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\ReportingPerson")
     * @JMS\Expose
     * @JMS\SerializedName("ReportingPerson")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getReportingPerson", setter="setReportingPerson")
     */
    private $reportingPerson;

    /**
     * @var null|array<CrewMemberPerson>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\CrewMemberPerson>")
     * @JMS\Expose
     * @JMS\SerializedName("CrewMemberPerson")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="CrewMemberPerson", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getCrewMemberPerson", setter="setCrewMemberPerson")
     */
    private $crewMemberPerson;

    /**
     * @var null|SecurityOfficerPerson
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\SecurityOfficerPerson")
     * @JMS\Expose
     * @JMS\SerializedName("SecurityOfficerPerson")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSecurityOfficerPerson", setter="setSecurityOfficerPerson")
     */
    private $securityOfficerPerson;

    /**
     * @var null|MasterPerson
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\MasterPerson")
     * @JMS\Expose
     * @JMS\SerializedName("MasterPerson")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMasterPerson", setter="setMasterPerson")
     */
    private $masterPerson;

    /**
     * @var null|ShipsSurgeonPerson
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\ShipsSurgeonPerson")
     * @JMS\Expose
     * @JMS\SerializedName("ShipsSurgeonPerson")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getShipsSurgeonPerson", setter="setShipsSurgeonPerson")
     */
    private $shipsSurgeonPerson;

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
     * @return null|TransportModeCode
     */
    public function getTransportModeCode(): ?TransportModeCode
    {
        return $this->transportModeCode;
    }

    /**
     * @return TransportModeCode
     */
    public function getTransportModeCodeWithCreate(): TransportModeCode
    {
        $this->transportModeCode = is_null($this->transportModeCode) ? new TransportModeCode() : $this->transportModeCode;

        return $this->transportModeCode;
    }

    /**
     * @param  null|TransportModeCode $transportModeCode
     * @return static
     */
    public function setTransportModeCode(?TransportModeCode $transportModeCode = null): static
    {
        $this->transportModeCode = $transportModeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTransportModeCode(): static
    {
        $this->transportModeCode = null;

        return $this;
    }

    /**
     * @return null|TransportMeansTypeCode
     */
    public function getTransportMeansTypeCode(): ?TransportMeansTypeCode
    {
        return $this->transportMeansTypeCode;
    }

    /**
     * @return TransportMeansTypeCode
     */
    public function getTransportMeansTypeCodeWithCreate(): TransportMeansTypeCode
    {
        $this->transportMeansTypeCode = is_null($this->transportMeansTypeCode) ? new TransportMeansTypeCode() : $this->transportMeansTypeCode;

        return $this->transportMeansTypeCode;
    }

    /**
     * @param  null|TransportMeansTypeCode $transportMeansTypeCode
     * @return static
     */
    public function setTransportMeansTypeCode(?TransportMeansTypeCode $transportMeansTypeCode = null): static
    {
        $this->transportMeansTypeCode = $transportMeansTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTransportMeansTypeCode(): static
    {
        $this->transportMeansTypeCode = null;

        return $this;
    }

    /**
     * @return null|TransitDirectionCode
     */
    public function getTransitDirectionCode(): ?TransitDirectionCode
    {
        return $this->transitDirectionCode;
    }

    /**
     * @return TransitDirectionCode
     */
    public function getTransitDirectionCodeWithCreate(): TransitDirectionCode
    {
        $this->transitDirectionCode = is_null($this->transitDirectionCode) ? new TransitDirectionCode() : $this->transitDirectionCode;

        return $this->transitDirectionCode;
    }

    /**
     * @param  null|TransitDirectionCode $transitDirectionCode
     * @return static
     */
    public function setTransitDirectionCode(?TransitDirectionCode $transitDirectionCode = null): static
    {
        $this->transitDirectionCode = $transitDirectionCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTransitDirectionCode(): static
    {
        $this->transitDirectionCode = null;

        return $this;
    }

    /**
     * @return null|bool
     */
    public function getPreCarriageIndicator(): ?bool
    {
        return $this->preCarriageIndicator;
    }

    /**
     * @param  null|bool $preCarriageIndicator
     * @return static
     */
    public function setPreCarriageIndicator(?bool $preCarriageIndicator = null): static
    {
        $this->preCarriageIndicator = $preCarriageIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPreCarriageIndicator(): static
    {
        $this->preCarriageIndicator = null;

        return $this;
    }

    /**
     * @return null|bool
     */
    public function getOnCarriageIndicator(): ?bool
    {
        return $this->onCarriageIndicator;
    }

    /**
     * @param  null|bool $onCarriageIndicator
     * @return static
     */
    public function setOnCarriageIndicator(?bool $onCarriageIndicator = null): static
    {
        $this->onCarriageIndicator = $onCarriageIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetOnCarriageIndicator(): static
    {
        $this->onCarriageIndicator = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getEstimatedDeliveryDate(): ?DateTimeInterface
    {
        return $this->estimatedDeliveryDate;
    }

    /**
     * @param  null|DateTimeInterface $estimatedDeliveryDate
     * @return static
     */
    public function setEstimatedDeliveryDate(?DateTimeInterface $estimatedDeliveryDate = null): static
    {
        $this->estimatedDeliveryDate = $estimatedDeliveryDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetEstimatedDeliveryDate(): static
    {
        $this->estimatedDeliveryDate = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getEstimatedDeliveryTime(): ?DateTimeInterface
    {
        return $this->estimatedDeliveryTime;
    }

    /**
     * @param  null|DateTimeInterface $estimatedDeliveryTime
     * @return static
     */
    public function setEstimatedDeliveryTime(?DateTimeInterface $estimatedDeliveryTime = null): static
    {
        $this->estimatedDeliveryTime = $estimatedDeliveryTime;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetEstimatedDeliveryTime(): static
    {
        $this->estimatedDeliveryTime = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getRequiredDeliveryDate(): ?DateTimeInterface
    {
        return $this->requiredDeliveryDate;
    }

    /**
     * @param  null|DateTimeInterface $requiredDeliveryDate
     * @return static
     */
    public function setRequiredDeliveryDate(?DateTimeInterface $requiredDeliveryDate = null): static
    {
        $this->requiredDeliveryDate = $requiredDeliveryDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRequiredDeliveryDate(): static
    {
        $this->requiredDeliveryDate = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getRequiredDeliveryTime(): ?DateTimeInterface
    {
        return $this->requiredDeliveryTime;
    }

    /**
     * @param  null|DateTimeInterface $requiredDeliveryTime
     * @return static
     */
    public function setRequiredDeliveryTime(?DateTimeInterface $requiredDeliveryTime = null): static
    {
        $this->requiredDeliveryTime = $requiredDeliveryTime;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRequiredDeliveryTime(): static
    {
        $this->requiredDeliveryTime = null;

        return $this;
    }

    /**
     * @return null|LoadingSequenceID
     */
    public function getLoadingSequenceID(): ?LoadingSequenceID
    {
        return $this->loadingSequenceID;
    }

    /**
     * @return LoadingSequenceID
     */
    public function getLoadingSequenceIDWithCreate(): LoadingSequenceID
    {
        $this->loadingSequenceID = is_null($this->loadingSequenceID) ? new LoadingSequenceID() : $this->loadingSequenceID;

        return $this->loadingSequenceID;
    }

    /**
     * @param  null|LoadingSequenceID $loadingSequenceID
     * @return static
     */
    public function setLoadingSequenceID(?LoadingSequenceID $loadingSequenceID = null): static
    {
        $this->loadingSequenceID = $loadingSequenceID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLoadingSequenceID(): static
    {
        $this->loadingSequenceID = null;

        return $this;
    }

    /**
     * @return null|SuccessiveSequenceID
     */
    public function getSuccessiveSequenceID(): ?SuccessiveSequenceID
    {
        return $this->successiveSequenceID;
    }

    /**
     * @return SuccessiveSequenceID
     */
    public function getSuccessiveSequenceIDWithCreate(): SuccessiveSequenceID
    {
        $this->successiveSequenceID = is_null($this->successiveSequenceID) ? new SuccessiveSequenceID() : $this->successiveSequenceID;

        return $this->successiveSequenceID;
    }

    /**
     * @param  null|SuccessiveSequenceID $successiveSequenceID
     * @return static
     */
    public function setSuccessiveSequenceID(?SuccessiveSequenceID $successiveSequenceID = null): static
    {
        $this->successiveSequenceID = $successiveSequenceID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSuccessiveSequenceID(): static
    {
        $this->successiveSequenceID = null;

        return $this;
    }

    /**
     * @return null|array<Instructions>
     */
    public function getInstructions(): ?array
    {
        return $this->instructions;
    }

    /**
     * @param  null|array<Instructions> $instructions
     * @return static
     */
    public function setInstructions(?array $instructions = null): static
    {
        $this->instructions = $instructions;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetInstructions(): static
    {
        $this->instructions = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearInstructions(): static
    {
        $this->instructions = [];

        return $this;
    }

    /**
     * @return null|Instructions
     */
    public function firstInstructions(): ?Instructions
    {
        $instructions = $this->instructions ?? [];
        $instructions = reset($instructions);

        if (false === $instructions) {
            return null;
        }

        return $instructions;
    }

    /**
     * @return null|Instructions
     */
    public function lastInstructions(): ?Instructions
    {
        $instructions = $this->instructions ?? [];
        $instructions = end($instructions);

        if (false === $instructions) {
            return null;
        }

        return $instructions;
    }

    /**
     * @param  Instructions $instructions
     * @return static
     */
    public function addToInstructions(Instructions $instructions): static
    {
        $this->instructions[] = $instructions;

        return $this;
    }

    /**
     * @return Instructions
     */
    public function addToInstructionsWithCreate(): Instructions
    {
        $this->addToinstructions($instructions = new Instructions());

        return $instructions;
    }

    /**
     * @param  Instructions $instructions
     * @return static
     */
    public function addOnceToInstructions(Instructions $instructions): static
    {
        if (!is_array($this->instructions)) {
            $this->instructions = [];
        }

        $this->instructions[0] = $instructions;

        return $this;
    }

    /**
     * @return Instructions
     */
    public function addOnceToInstructionsWithCreate(): Instructions
    {
        if (!is_array($this->instructions)) {
            $this->instructions = [];
        }

        if ([] === $this->instructions) {
            $this->addOnceToinstructions(new Instructions());
        }

        return $this->instructions[0];
    }

    /**
     * @return null|array<DemurrageInstructions>
     */
    public function getDemurrageInstructions(): ?array
    {
        return $this->demurrageInstructions;
    }

    /**
     * @param  null|array<DemurrageInstructions> $demurrageInstructions
     * @return static
     */
    public function setDemurrageInstructions(?array $demurrageInstructions = null): static
    {
        $this->demurrageInstructions = $demurrageInstructions;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDemurrageInstructions(): static
    {
        $this->demurrageInstructions = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearDemurrageInstructions(): static
    {
        $this->demurrageInstructions = [];

        return $this;
    }

    /**
     * @return null|DemurrageInstructions
     */
    public function firstDemurrageInstructions(): ?DemurrageInstructions
    {
        $demurrageInstructions = $this->demurrageInstructions ?? [];
        $demurrageInstructions = reset($demurrageInstructions);

        if (false === $demurrageInstructions) {
            return null;
        }

        return $demurrageInstructions;
    }

    /**
     * @return null|DemurrageInstructions
     */
    public function lastDemurrageInstructions(): ?DemurrageInstructions
    {
        $demurrageInstructions = $this->demurrageInstructions ?? [];
        $demurrageInstructions = end($demurrageInstructions);

        if (false === $demurrageInstructions) {
            return null;
        }

        return $demurrageInstructions;
    }

    /**
     * @param  DemurrageInstructions $demurrageInstructions
     * @return static
     */
    public function addToDemurrageInstructions(DemurrageInstructions $demurrageInstructions): static
    {
        $this->demurrageInstructions[] = $demurrageInstructions;

        return $this;
    }

    /**
     * @return DemurrageInstructions
     */
    public function addToDemurrageInstructionsWithCreate(): DemurrageInstructions
    {
        $this->addTodemurrageInstructions($demurrageInstructions = new DemurrageInstructions());

        return $demurrageInstructions;
    }

    /**
     * @param  DemurrageInstructions $demurrageInstructions
     * @return static
     */
    public function addOnceToDemurrageInstructions(DemurrageInstructions $demurrageInstructions): static
    {
        if (!is_array($this->demurrageInstructions)) {
            $this->demurrageInstructions = [];
        }

        $this->demurrageInstructions[0] = $demurrageInstructions;

        return $this;
    }

    /**
     * @return DemurrageInstructions
     */
    public function addOnceToDemurrageInstructionsWithCreate(): DemurrageInstructions
    {
        if (!is_array($this->demurrageInstructions)) {
            $this->demurrageInstructions = [];
        }

        if ([] === $this->demurrageInstructions) {
            $this->addOnceTodemurrageInstructions(new DemurrageInstructions());
        }

        return $this->demurrageInstructions[0];
    }

    /**
     * @return null|CrewQuantity
     */
    public function getCrewQuantity(): ?CrewQuantity
    {
        return $this->crewQuantity;
    }

    /**
     * @return CrewQuantity
     */
    public function getCrewQuantityWithCreate(): CrewQuantity
    {
        $this->crewQuantity = is_null($this->crewQuantity) ? new CrewQuantity() : $this->crewQuantity;

        return $this->crewQuantity;
    }

    /**
     * @param  null|CrewQuantity $crewQuantity
     * @return static
     */
    public function setCrewQuantity(?CrewQuantity $crewQuantity = null): static
    {
        $this->crewQuantity = $crewQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCrewQuantity(): static
    {
        $this->crewQuantity = null;

        return $this;
    }

    /**
     * @return null|PassengerQuantity
     */
    public function getPassengerQuantity(): ?PassengerQuantity
    {
        return $this->passengerQuantity;
    }

    /**
     * @return PassengerQuantity
     */
    public function getPassengerQuantityWithCreate(): PassengerQuantity
    {
        $this->passengerQuantity = is_null($this->passengerQuantity) ? new PassengerQuantity() : $this->passengerQuantity;

        return $this->passengerQuantity;
    }

    /**
     * @param  null|PassengerQuantity $passengerQuantity
     * @return static
     */
    public function setPassengerQuantity(?PassengerQuantity $passengerQuantity = null): static
    {
        $this->passengerQuantity = $passengerQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPassengerQuantity(): static
    {
        $this->passengerQuantity = null;

        return $this;
    }

    /**
     * @return null|TransitPeriod
     */
    public function getTransitPeriod(): ?TransitPeriod
    {
        return $this->transitPeriod;
    }

    /**
     * @return TransitPeriod
     */
    public function getTransitPeriodWithCreate(): TransitPeriod
    {
        $this->transitPeriod = is_null($this->transitPeriod) ? new TransitPeriod() : $this->transitPeriod;

        return $this->transitPeriod;
    }

    /**
     * @param  null|TransitPeriod $transitPeriod
     * @return static
     */
    public function setTransitPeriod(?TransitPeriod $transitPeriod = null): static
    {
        $this->transitPeriod = $transitPeriod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTransitPeriod(): static
    {
        $this->transitPeriod = null;

        return $this;
    }

    /**
     * @return null|array<CarrierParty>
     */
    public function getCarrierParty(): ?array
    {
        return $this->carrierParty;
    }

    /**
     * @param  null|array<CarrierParty> $carrierParty
     * @return static
     */
    public function setCarrierParty(?array $carrierParty = null): static
    {
        $this->carrierParty = $carrierParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCarrierParty(): static
    {
        $this->carrierParty = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearCarrierParty(): static
    {
        $this->carrierParty = [];

        return $this;
    }

    /**
     * @return null|CarrierParty
     */
    public function firstCarrierParty(): ?CarrierParty
    {
        $carrierParty = $this->carrierParty ?? [];
        $carrierParty = reset($carrierParty);

        if (false === $carrierParty) {
            return null;
        }

        return $carrierParty;
    }

    /**
     * @return null|CarrierParty
     */
    public function lastCarrierParty(): ?CarrierParty
    {
        $carrierParty = $this->carrierParty ?? [];
        $carrierParty = end($carrierParty);

        if (false === $carrierParty) {
            return null;
        }

        return $carrierParty;
    }

    /**
     * @param  CarrierParty $carrierParty
     * @return static
     */
    public function addToCarrierParty(CarrierParty $carrierParty): static
    {
        $this->carrierParty[] = $carrierParty;

        return $this;
    }

    /**
     * @return CarrierParty
     */
    public function addToCarrierPartyWithCreate(): CarrierParty
    {
        $this->addTocarrierParty($carrierParty = new CarrierParty());

        return $carrierParty;
    }

    /**
     * @param  CarrierParty $carrierParty
     * @return static
     */
    public function addOnceToCarrierParty(CarrierParty $carrierParty): static
    {
        if (!is_array($this->carrierParty)) {
            $this->carrierParty = [];
        }

        $this->carrierParty[0] = $carrierParty;

        return $this;
    }

    /**
     * @return CarrierParty
     */
    public function addOnceToCarrierPartyWithCreate(): CarrierParty
    {
        if (!is_array($this->carrierParty)) {
            $this->carrierParty = [];
        }

        if ([] === $this->carrierParty) {
            $this->addOnceTocarrierParty(new CarrierParty());
        }

        return $this->carrierParty[0];
    }

    /**
     * @return null|TransportMeans
     */
    public function getTransportMeans(): ?TransportMeans
    {
        return $this->transportMeans;
    }

    /**
     * @return TransportMeans
     */
    public function getTransportMeansWithCreate(): TransportMeans
    {
        $this->transportMeans = is_null($this->transportMeans) ? new TransportMeans() : $this->transportMeans;

        return $this->transportMeans;
    }

    /**
     * @param  null|TransportMeans $transportMeans
     * @return static
     */
    public function setTransportMeans(?TransportMeans $transportMeans = null): static
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
     * @return null|LoadingPortLocation
     */
    public function getLoadingPortLocation(): ?LoadingPortLocation
    {
        return $this->loadingPortLocation;
    }

    /**
     * @return LoadingPortLocation
     */
    public function getLoadingPortLocationWithCreate(): LoadingPortLocation
    {
        $this->loadingPortLocation = is_null($this->loadingPortLocation) ? new LoadingPortLocation() : $this->loadingPortLocation;

        return $this->loadingPortLocation;
    }

    /**
     * @param  null|LoadingPortLocation $loadingPortLocation
     * @return static
     */
    public function setLoadingPortLocation(?LoadingPortLocation $loadingPortLocation = null): static
    {
        $this->loadingPortLocation = $loadingPortLocation;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLoadingPortLocation(): static
    {
        $this->loadingPortLocation = null;

        return $this;
    }

    /**
     * @return null|UnloadingPortLocation
     */
    public function getUnloadingPortLocation(): ?UnloadingPortLocation
    {
        return $this->unloadingPortLocation;
    }

    /**
     * @return UnloadingPortLocation
     */
    public function getUnloadingPortLocationWithCreate(): UnloadingPortLocation
    {
        $this->unloadingPortLocation = is_null($this->unloadingPortLocation) ? new UnloadingPortLocation() : $this->unloadingPortLocation;

        return $this->unloadingPortLocation;
    }

    /**
     * @param  null|UnloadingPortLocation $unloadingPortLocation
     * @return static
     */
    public function setUnloadingPortLocation(?UnloadingPortLocation $unloadingPortLocation = null): static
    {
        $this->unloadingPortLocation = $unloadingPortLocation;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetUnloadingPortLocation(): static
    {
        $this->unloadingPortLocation = null;

        return $this;
    }

    /**
     * @return null|TransshipPortLocation
     */
    public function getTransshipPortLocation(): ?TransshipPortLocation
    {
        return $this->transshipPortLocation;
    }

    /**
     * @return TransshipPortLocation
     */
    public function getTransshipPortLocationWithCreate(): TransshipPortLocation
    {
        $this->transshipPortLocation = is_null($this->transshipPortLocation) ? new TransshipPortLocation() : $this->transshipPortLocation;

        return $this->transshipPortLocation;
    }

    /**
     * @param  null|TransshipPortLocation $transshipPortLocation
     * @return static
     */
    public function setTransshipPortLocation(?TransshipPortLocation $transshipPortLocation = null): static
    {
        $this->transshipPortLocation = $transshipPortLocation;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTransshipPortLocation(): static
    {
        $this->transshipPortLocation = null;

        return $this;
    }

    /**
     * @return null|LoadingTransportEvent
     */
    public function getLoadingTransportEvent(): ?LoadingTransportEvent
    {
        return $this->loadingTransportEvent;
    }

    /**
     * @return LoadingTransportEvent
     */
    public function getLoadingTransportEventWithCreate(): LoadingTransportEvent
    {
        $this->loadingTransportEvent = is_null($this->loadingTransportEvent) ? new LoadingTransportEvent() : $this->loadingTransportEvent;

        return $this->loadingTransportEvent;
    }

    /**
     * @param  null|LoadingTransportEvent $loadingTransportEvent
     * @return static
     */
    public function setLoadingTransportEvent(?LoadingTransportEvent $loadingTransportEvent = null): static
    {
        $this->loadingTransportEvent = $loadingTransportEvent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLoadingTransportEvent(): static
    {
        $this->loadingTransportEvent = null;

        return $this;
    }

    /**
     * @return null|ExaminationTransportEvent
     */
    public function getExaminationTransportEvent(): ?ExaminationTransportEvent
    {
        return $this->examinationTransportEvent;
    }

    /**
     * @return ExaminationTransportEvent
     */
    public function getExaminationTransportEventWithCreate(): ExaminationTransportEvent
    {
        $this->examinationTransportEvent = is_null($this->examinationTransportEvent) ? new ExaminationTransportEvent() : $this->examinationTransportEvent;

        return $this->examinationTransportEvent;
    }

    /**
     * @param  null|ExaminationTransportEvent $examinationTransportEvent
     * @return static
     */
    public function setExaminationTransportEvent(?ExaminationTransportEvent $examinationTransportEvent = null): static
    {
        $this->examinationTransportEvent = $examinationTransportEvent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetExaminationTransportEvent(): static
    {
        $this->examinationTransportEvent = null;

        return $this;
    }

    /**
     * @return null|AvailabilityTransportEvent
     */
    public function getAvailabilityTransportEvent(): ?AvailabilityTransportEvent
    {
        return $this->availabilityTransportEvent;
    }

    /**
     * @return AvailabilityTransportEvent
     */
    public function getAvailabilityTransportEventWithCreate(): AvailabilityTransportEvent
    {
        $this->availabilityTransportEvent = is_null($this->availabilityTransportEvent) ? new AvailabilityTransportEvent() : $this->availabilityTransportEvent;

        return $this->availabilityTransportEvent;
    }

    /**
     * @param  null|AvailabilityTransportEvent $availabilityTransportEvent
     * @return static
     */
    public function setAvailabilityTransportEvent(
        ?AvailabilityTransportEvent $availabilityTransportEvent = null,
    ): static {
        $this->availabilityTransportEvent = $availabilityTransportEvent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAvailabilityTransportEvent(): static
    {
        $this->availabilityTransportEvent = null;

        return $this;
    }

    /**
     * @return null|ExportationTransportEvent
     */
    public function getExportationTransportEvent(): ?ExportationTransportEvent
    {
        return $this->exportationTransportEvent;
    }

    /**
     * @return ExportationTransportEvent
     */
    public function getExportationTransportEventWithCreate(): ExportationTransportEvent
    {
        $this->exportationTransportEvent = is_null($this->exportationTransportEvent) ? new ExportationTransportEvent() : $this->exportationTransportEvent;

        return $this->exportationTransportEvent;
    }

    /**
     * @param  null|ExportationTransportEvent $exportationTransportEvent
     * @return static
     */
    public function setExportationTransportEvent(?ExportationTransportEvent $exportationTransportEvent = null): static
    {
        $this->exportationTransportEvent = $exportationTransportEvent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetExportationTransportEvent(): static
    {
        $this->exportationTransportEvent = null;

        return $this;
    }

    /**
     * @return null|DischargeTransportEvent
     */
    public function getDischargeTransportEvent(): ?DischargeTransportEvent
    {
        return $this->dischargeTransportEvent;
    }

    /**
     * @return DischargeTransportEvent
     */
    public function getDischargeTransportEventWithCreate(): DischargeTransportEvent
    {
        $this->dischargeTransportEvent = is_null($this->dischargeTransportEvent) ? new DischargeTransportEvent() : $this->dischargeTransportEvent;

        return $this->dischargeTransportEvent;
    }

    /**
     * @param  null|DischargeTransportEvent $dischargeTransportEvent
     * @return static
     */
    public function setDischargeTransportEvent(?DischargeTransportEvent $dischargeTransportEvent = null): static
    {
        $this->dischargeTransportEvent = $dischargeTransportEvent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDischargeTransportEvent(): static
    {
        $this->dischargeTransportEvent = null;

        return $this;
    }

    /**
     * @return null|WarehousingTransportEvent
     */
    public function getWarehousingTransportEvent(): ?WarehousingTransportEvent
    {
        return $this->warehousingTransportEvent;
    }

    /**
     * @return WarehousingTransportEvent
     */
    public function getWarehousingTransportEventWithCreate(): WarehousingTransportEvent
    {
        $this->warehousingTransportEvent = is_null($this->warehousingTransportEvent) ? new WarehousingTransportEvent() : $this->warehousingTransportEvent;

        return $this->warehousingTransportEvent;
    }

    /**
     * @param  null|WarehousingTransportEvent $warehousingTransportEvent
     * @return static
     */
    public function setWarehousingTransportEvent(?WarehousingTransportEvent $warehousingTransportEvent = null): static
    {
        $this->warehousingTransportEvent = $warehousingTransportEvent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetWarehousingTransportEvent(): static
    {
        $this->warehousingTransportEvent = null;

        return $this;
    }

    /**
     * @return null|TakeoverTransportEvent
     */
    public function getTakeoverTransportEvent(): ?TakeoverTransportEvent
    {
        return $this->takeoverTransportEvent;
    }

    /**
     * @return TakeoverTransportEvent
     */
    public function getTakeoverTransportEventWithCreate(): TakeoverTransportEvent
    {
        $this->takeoverTransportEvent = is_null($this->takeoverTransportEvent) ? new TakeoverTransportEvent() : $this->takeoverTransportEvent;

        return $this->takeoverTransportEvent;
    }

    /**
     * @param  null|TakeoverTransportEvent $takeoverTransportEvent
     * @return static
     */
    public function setTakeoverTransportEvent(?TakeoverTransportEvent $takeoverTransportEvent = null): static
    {
        $this->takeoverTransportEvent = $takeoverTransportEvent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTakeoverTransportEvent(): static
    {
        $this->takeoverTransportEvent = null;

        return $this;
    }

    /**
     * @return null|OptionalTakeoverTransportEvent
     */
    public function getOptionalTakeoverTransportEvent(): ?OptionalTakeoverTransportEvent
    {
        return $this->optionalTakeoverTransportEvent;
    }

    /**
     * @return OptionalTakeoverTransportEvent
     */
    public function getOptionalTakeoverTransportEventWithCreate(): OptionalTakeoverTransportEvent
    {
        $this->optionalTakeoverTransportEvent = is_null($this->optionalTakeoverTransportEvent) ? new OptionalTakeoverTransportEvent() : $this->optionalTakeoverTransportEvent;

        return $this->optionalTakeoverTransportEvent;
    }

    /**
     * @param  null|OptionalTakeoverTransportEvent $optionalTakeoverTransportEvent
     * @return static
     */
    public function setOptionalTakeoverTransportEvent(
        ?OptionalTakeoverTransportEvent $optionalTakeoverTransportEvent = null,
    ): static {
        $this->optionalTakeoverTransportEvent = $optionalTakeoverTransportEvent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetOptionalTakeoverTransportEvent(): static
    {
        $this->optionalTakeoverTransportEvent = null;

        return $this;
    }

    /**
     * @return null|DropoffTransportEvent
     */
    public function getDropoffTransportEvent(): ?DropoffTransportEvent
    {
        return $this->dropoffTransportEvent;
    }

    /**
     * @return DropoffTransportEvent
     */
    public function getDropoffTransportEventWithCreate(): DropoffTransportEvent
    {
        $this->dropoffTransportEvent = is_null($this->dropoffTransportEvent) ? new DropoffTransportEvent() : $this->dropoffTransportEvent;

        return $this->dropoffTransportEvent;
    }

    /**
     * @param  null|DropoffTransportEvent $dropoffTransportEvent
     * @return static
     */
    public function setDropoffTransportEvent(?DropoffTransportEvent $dropoffTransportEvent = null): static
    {
        $this->dropoffTransportEvent = $dropoffTransportEvent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDropoffTransportEvent(): static
    {
        $this->dropoffTransportEvent = null;

        return $this;
    }

    /**
     * @return null|ActualPickupTransportEvent
     */
    public function getActualPickupTransportEvent(): ?ActualPickupTransportEvent
    {
        return $this->actualPickupTransportEvent;
    }

    /**
     * @return ActualPickupTransportEvent
     */
    public function getActualPickupTransportEventWithCreate(): ActualPickupTransportEvent
    {
        $this->actualPickupTransportEvent = is_null($this->actualPickupTransportEvent) ? new ActualPickupTransportEvent() : $this->actualPickupTransportEvent;

        return $this->actualPickupTransportEvent;
    }

    /**
     * @param  null|ActualPickupTransportEvent $actualPickupTransportEvent
     * @return static
     */
    public function setActualPickupTransportEvent(
        ?ActualPickupTransportEvent $actualPickupTransportEvent = null,
    ): static {
        $this->actualPickupTransportEvent = $actualPickupTransportEvent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetActualPickupTransportEvent(): static
    {
        $this->actualPickupTransportEvent = null;

        return $this;
    }

    /**
     * @return null|DeliveryTransportEvent
     */
    public function getDeliveryTransportEvent(): ?DeliveryTransportEvent
    {
        return $this->deliveryTransportEvent;
    }

    /**
     * @return DeliveryTransportEvent
     */
    public function getDeliveryTransportEventWithCreate(): DeliveryTransportEvent
    {
        $this->deliveryTransportEvent = is_null($this->deliveryTransportEvent) ? new DeliveryTransportEvent() : $this->deliveryTransportEvent;

        return $this->deliveryTransportEvent;
    }

    /**
     * @param  null|DeliveryTransportEvent $deliveryTransportEvent
     * @return static
     */
    public function setDeliveryTransportEvent(?DeliveryTransportEvent $deliveryTransportEvent = null): static
    {
        $this->deliveryTransportEvent = $deliveryTransportEvent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDeliveryTransportEvent(): static
    {
        $this->deliveryTransportEvent = null;

        return $this;
    }

    /**
     * @return null|ReceiptTransportEvent
     */
    public function getReceiptTransportEvent(): ?ReceiptTransportEvent
    {
        return $this->receiptTransportEvent;
    }

    /**
     * @return ReceiptTransportEvent
     */
    public function getReceiptTransportEventWithCreate(): ReceiptTransportEvent
    {
        $this->receiptTransportEvent = is_null($this->receiptTransportEvent) ? new ReceiptTransportEvent() : $this->receiptTransportEvent;

        return $this->receiptTransportEvent;
    }

    /**
     * @param  null|ReceiptTransportEvent $receiptTransportEvent
     * @return static
     */
    public function setReceiptTransportEvent(?ReceiptTransportEvent $receiptTransportEvent = null): static
    {
        $this->receiptTransportEvent = $receiptTransportEvent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetReceiptTransportEvent(): static
    {
        $this->receiptTransportEvent = null;

        return $this;
    }

    /**
     * @return null|StorageTransportEvent
     */
    public function getStorageTransportEvent(): ?StorageTransportEvent
    {
        return $this->storageTransportEvent;
    }

    /**
     * @return StorageTransportEvent
     */
    public function getStorageTransportEventWithCreate(): StorageTransportEvent
    {
        $this->storageTransportEvent = is_null($this->storageTransportEvent) ? new StorageTransportEvent() : $this->storageTransportEvent;

        return $this->storageTransportEvent;
    }

    /**
     * @param  null|StorageTransportEvent $storageTransportEvent
     * @return static
     */
    public function setStorageTransportEvent(?StorageTransportEvent $storageTransportEvent = null): static
    {
        $this->storageTransportEvent = $storageTransportEvent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetStorageTransportEvent(): static
    {
        $this->storageTransportEvent = null;

        return $this;
    }

    /**
     * @return null|AcceptanceTransportEvent
     */
    public function getAcceptanceTransportEvent(): ?AcceptanceTransportEvent
    {
        return $this->acceptanceTransportEvent;
    }

    /**
     * @return AcceptanceTransportEvent
     */
    public function getAcceptanceTransportEventWithCreate(): AcceptanceTransportEvent
    {
        $this->acceptanceTransportEvent = is_null($this->acceptanceTransportEvent) ? new AcceptanceTransportEvent() : $this->acceptanceTransportEvent;

        return $this->acceptanceTransportEvent;
    }

    /**
     * @param  null|AcceptanceTransportEvent $acceptanceTransportEvent
     * @return static
     */
    public function setAcceptanceTransportEvent(?AcceptanceTransportEvent $acceptanceTransportEvent = null): static
    {
        $this->acceptanceTransportEvent = $acceptanceTransportEvent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAcceptanceTransportEvent(): static
    {
        $this->acceptanceTransportEvent = null;

        return $this;
    }

    /**
     * @return null|TerminalOperatorParty
     */
    public function getTerminalOperatorParty(): ?TerminalOperatorParty
    {
        return $this->terminalOperatorParty;
    }

    /**
     * @return TerminalOperatorParty
     */
    public function getTerminalOperatorPartyWithCreate(): TerminalOperatorParty
    {
        $this->terminalOperatorParty = is_null($this->terminalOperatorParty) ? new TerminalOperatorParty() : $this->terminalOperatorParty;

        return $this->terminalOperatorParty;
    }

    /**
     * @param  null|TerminalOperatorParty $terminalOperatorParty
     * @return static
     */
    public function setTerminalOperatorParty(?TerminalOperatorParty $terminalOperatorParty = null): static
    {
        $this->terminalOperatorParty = $terminalOperatorParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTerminalOperatorParty(): static
    {
        $this->terminalOperatorParty = null;

        return $this;
    }

    /**
     * @return null|CustomsAgentParty
     */
    public function getCustomsAgentParty(): ?CustomsAgentParty
    {
        return $this->customsAgentParty;
    }

    /**
     * @return CustomsAgentParty
     */
    public function getCustomsAgentPartyWithCreate(): CustomsAgentParty
    {
        $this->customsAgentParty = is_null($this->customsAgentParty) ? new CustomsAgentParty() : $this->customsAgentParty;

        return $this->customsAgentParty;
    }

    /**
     * @param  null|CustomsAgentParty $customsAgentParty
     * @return static
     */
    public function setCustomsAgentParty(?CustomsAgentParty $customsAgentParty = null): static
    {
        $this->customsAgentParty = $customsAgentParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCustomsAgentParty(): static
    {
        $this->customsAgentParty = null;

        return $this;
    }

    /**
     * @return null|EstimatedTransitPeriod
     */
    public function getEstimatedTransitPeriod(): ?EstimatedTransitPeriod
    {
        return $this->estimatedTransitPeriod;
    }

    /**
     * @return EstimatedTransitPeriod
     */
    public function getEstimatedTransitPeriodWithCreate(): EstimatedTransitPeriod
    {
        $this->estimatedTransitPeriod = is_null($this->estimatedTransitPeriod) ? new EstimatedTransitPeriod() : $this->estimatedTransitPeriod;

        return $this->estimatedTransitPeriod;
    }

    /**
     * @param  null|EstimatedTransitPeriod $estimatedTransitPeriod
     * @return static
     */
    public function setEstimatedTransitPeriod(?EstimatedTransitPeriod $estimatedTransitPeriod = null): static
    {
        $this->estimatedTransitPeriod = $estimatedTransitPeriod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetEstimatedTransitPeriod(): static
    {
        $this->estimatedTransitPeriod = null;

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

    /**
     * @return null|FreightChargeLocation
     */
    public function getFreightChargeLocation(): ?FreightChargeLocation
    {
        return $this->freightChargeLocation;
    }

    /**
     * @return FreightChargeLocation
     */
    public function getFreightChargeLocationWithCreate(): FreightChargeLocation
    {
        $this->freightChargeLocation = is_null($this->freightChargeLocation) ? new FreightChargeLocation() : $this->freightChargeLocation;

        return $this->freightChargeLocation;
    }

    /**
     * @param  null|FreightChargeLocation $freightChargeLocation
     * @return static
     */
    public function setFreightChargeLocation(?FreightChargeLocation $freightChargeLocation = null): static
    {
        $this->freightChargeLocation = $freightChargeLocation;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetFreightChargeLocation(): static
    {
        $this->freightChargeLocation = null;

        return $this;
    }

    /**
     * @return null|array<DetentionTransportEvent>
     */
    public function getDetentionTransportEvent(): ?array
    {
        return $this->detentionTransportEvent;
    }

    /**
     * @param  null|array<DetentionTransportEvent> $detentionTransportEvent
     * @return static
     */
    public function setDetentionTransportEvent(?array $detentionTransportEvent = null): static
    {
        $this->detentionTransportEvent = $detentionTransportEvent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDetentionTransportEvent(): static
    {
        $this->detentionTransportEvent = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearDetentionTransportEvent(): static
    {
        $this->detentionTransportEvent = [];

        return $this;
    }

    /**
     * @return null|DetentionTransportEvent
     */
    public function firstDetentionTransportEvent(): ?DetentionTransportEvent
    {
        $detentionTransportEvent = $this->detentionTransportEvent ?? [];
        $detentionTransportEvent = reset($detentionTransportEvent);

        if (false === $detentionTransportEvent) {
            return null;
        }

        return $detentionTransportEvent;
    }

    /**
     * @return null|DetentionTransportEvent
     */
    public function lastDetentionTransportEvent(): ?DetentionTransportEvent
    {
        $detentionTransportEvent = $this->detentionTransportEvent ?? [];
        $detentionTransportEvent = end($detentionTransportEvent);

        if (false === $detentionTransportEvent) {
            return null;
        }

        return $detentionTransportEvent;
    }

    /**
     * @param  DetentionTransportEvent $detentionTransportEvent
     * @return static
     */
    public function addToDetentionTransportEvent(DetentionTransportEvent $detentionTransportEvent): static
    {
        $this->detentionTransportEvent[] = $detentionTransportEvent;

        return $this;
    }

    /**
     * @return DetentionTransportEvent
     */
    public function addToDetentionTransportEventWithCreate(): DetentionTransportEvent
    {
        $this->addTodetentionTransportEvent($detentionTransportEvent = new DetentionTransportEvent());

        return $detentionTransportEvent;
    }

    /**
     * @param  DetentionTransportEvent $detentionTransportEvent
     * @return static
     */
    public function addOnceToDetentionTransportEvent(DetentionTransportEvent $detentionTransportEvent): static
    {
        if (!is_array($this->detentionTransportEvent)) {
            $this->detentionTransportEvent = [];
        }

        $this->detentionTransportEvent[0] = $detentionTransportEvent;

        return $this;
    }

    /**
     * @return DetentionTransportEvent
     */
    public function addOnceToDetentionTransportEventWithCreate(): DetentionTransportEvent
    {
        if (!is_array($this->detentionTransportEvent)) {
            $this->detentionTransportEvent = [];
        }

        if ([] === $this->detentionTransportEvent) {
            $this->addOnceTodetentionTransportEvent(new DetentionTransportEvent());
        }

        return $this->detentionTransportEvent[0];
    }

    /**
     * @return null|RequestedDepartureTransportEvent
     */
    public function getRequestedDepartureTransportEvent(): ?RequestedDepartureTransportEvent
    {
        return $this->requestedDepartureTransportEvent;
    }

    /**
     * @return RequestedDepartureTransportEvent
     */
    public function getRequestedDepartureTransportEventWithCreate(): RequestedDepartureTransportEvent
    {
        $this->requestedDepartureTransportEvent = is_null($this->requestedDepartureTransportEvent) ? new RequestedDepartureTransportEvent() : $this->requestedDepartureTransportEvent;

        return $this->requestedDepartureTransportEvent;
    }

    /**
     * @param  null|RequestedDepartureTransportEvent $requestedDepartureTransportEvent
     * @return static
     */
    public function setRequestedDepartureTransportEvent(
        ?RequestedDepartureTransportEvent $requestedDepartureTransportEvent = null,
    ): static {
        $this->requestedDepartureTransportEvent = $requestedDepartureTransportEvent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRequestedDepartureTransportEvent(): static
    {
        $this->requestedDepartureTransportEvent = null;

        return $this;
    }

    /**
     * @return null|RequestedArrivalTransportEvent
     */
    public function getRequestedArrivalTransportEvent(): ?RequestedArrivalTransportEvent
    {
        return $this->requestedArrivalTransportEvent;
    }

    /**
     * @return RequestedArrivalTransportEvent
     */
    public function getRequestedArrivalTransportEventWithCreate(): RequestedArrivalTransportEvent
    {
        $this->requestedArrivalTransportEvent = is_null($this->requestedArrivalTransportEvent) ? new RequestedArrivalTransportEvent() : $this->requestedArrivalTransportEvent;

        return $this->requestedArrivalTransportEvent;
    }

    /**
     * @param  null|RequestedArrivalTransportEvent $requestedArrivalTransportEvent
     * @return static
     */
    public function setRequestedArrivalTransportEvent(
        ?RequestedArrivalTransportEvent $requestedArrivalTransportEvent = null,
    ): static {
        $this->requestedArrivalTransportEvent = $requestedArrivalTransportEvent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRequestedArrivalTransportEvent(): static
    {
        $this->requestedArrivalTransportEvent = null;

        return $this;
    }

    /**
     * @return null|array<RequestedWaypointTransportEvent>
     */
    public function getRequestedWaypointTransportEvent(): ?array
    {
        return $this->requestedWaypointTransportEvent;
    }

    /**
     * @param  null|array<RequestedWaypointTransportEvent> $requestedWaypointTransportEvent
     * @return static
     */
    public function setRequestedWaypointTransportEvent(?array $requestedWaypointTransportEvent = null): static
    {
        $this->requestedWaypointTransportEvent = $requestedWaypointTransportEvent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRequestedWaypointTransportEvent(): static
    {
        $this->requestedWaypointTransportEvent = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearRequestedWaypointTransportEvent(): static
    {
        $this->requestedWaypointTransportEvent = [];

        return $this;
    }

    /**
     * @return null|RequestedWaypointTransportEvent
     */
    public function firstRequestedWaypointTransportEvent(): ?RequestedWaypointTransportEvent
    {
        $requestedWaypointTransportEvent = $this->requestedWaypointTransportEvent ?? [];
        $requestedWaypointTransportEvent = reset($requestedWaypointTransportEvent);

        if (false === $requestedWaypointTransportEvent) {
            return null;
        }

        return $requestedWaypointTransportEvent;
    }

    /**
     * @return null|RequestedWaypointTransportEvent
     */
    public function lastRequestedWaypointTransportEvent(): ?RequestedWaypointTransportEvent
    {
        $requestedWaypointTransportEvent = $this->requestedWaypointTransportEvent ?? [];
        $requestedWaypointTransportEvent = end($requestedWaypointTransportEvent);

        if (false === $requestedWaypointTransportEvent) {
            return null;
        }

        return $requestedWaypointTransportEvent;
    }

    /**
     * @param  RequestedWaypointTransportEvent $requestedWaypointTransportEvent
     * @return static
     */
    public function addToRequestedWaypointTransportEvent(
        RequestedWaypointTransportEvent $requestedWaypointTransportEvent,
    ): static {
        $this->requestedWaypointTransportEvent[] = $requestedWaypointTransportEvent;

        return $this;
    }

    /**
     * @return RequestedWaypointTransportEvent
     */
    public function addToRequestedWaypointTransportEventWithCreate(): RequestedWaypointTransportEvent
    {
        $this->addTorequestedWaypointTransportEvent($requestedWaypointTransportEvent = new RequestedWaypointTransportEvent());

        return $requestedWaypointTransportEvent;
    }

    /**
     * @param  RequestedWaypointTransportEvent $requestedWaypointTransportEvent
     * @return static
     */
    public function addOnceToRequestedWaypointTransportEvent(
        RequestedWaypointTransportEvent $requestedWaypointTransportEvent,
    ): static {
        if (!is_array($this->requestedWaypointTransportEvent)) {
            $this->requestedWaypointTransportEvent = [];
        }

        $this->requestedWaypointTransportEvent[0] = $requestedWaypointTransportEvent;

        return $this;
    }

    /**
     * @return RequestedWaypointTransportEvent
     */
    public function addOnceToRequestedWaypointTransportEventWithCreate(): RequestedWaypointTransportEvent
    {
        if (!is_array($this->requestedWaypointTransportEvent)) {
            $this->requestedWaypointTransportEvent = [];
        }

        if ([] === $this->requestedWaypointTransportEvent) {
            $this->addOnceTorequestedWaypointTransportEvent(new RequestedWaypointTransportEvent());
        }

        return $this->requestedWaypointTransportEvent[0];
    }

    /**
     * @return null|PlannedDepartureTransportEvent
     */
    public function getPlannedDepartureTransportEvent(): ?PlannedDepartureTransportEvent
    {
        return $this->plannedDepartureTransportEvent;
    }

    /**
     * @return PlannedDepartureTransportEvent
     */
    public function getPlannedDepartureTransportEventWithCreate(): PlannedDepartureTransportEvent
    {
        $this->plannedDepartureTransportEvent = is_null($this->plannedDepartureTransportEvent) ? new PlannedDepartureTransportEvent() : $this->plannedDepartureTransportEvent;

        return $this->plannedDepartureTransportEvent;
    }

    /**
     * @param  null|PlannedDepartureTransportEvent $plannedDepartureTransportEvent
     * @return static
     */
    public function setPlannedDepartureTransportEvent(
        ?PlannedDepartureTransportEvent $plannedDepartureTransportEvent = null,
    ): static {
        $this->plannedDepartureTransportEvent = $plannedDepartureTransportEvent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPlannedDepartureTransportEvent(): static
    {
        $this->plannedDepartureTransportEvent = null;

        return $this;
    }

    /**
     * @return null|PlannedArrivalTransportEvent
     */
    public function getPlannedArrivalTransportEvent(): ?PlannedArrivalTransportEvent
    {
        return $this->plannedArrivalTransportEvent;
    }

    /**
     * @return PlannedArrivalTransportEvent
     */
    public function getPlannedArrivalTransportEventWithCreate(): PlannedArrivalTransportEvent
    {
        $this->plannedArrivalTransportEvent = is_null($this->plannedArrivalTransportEvent) ? new PlannedArrivalTransportEvent() : $this->plannedArrivalTransportEvent;

        return $this->plannedArrivalTransportEvent;
    }

    /**
     * @param  null|PlannedArrivalTransportEvent $plannedArrivalTransportEvent
     * @return static
     */
    public function setPlannedArrivalTransportEvent(
        ?PlannedArrivalTransportEvent $plannedArrivalTransportEvent = null,
    ): static {
        $this->plannedArrivalTransportEvent = $plannedArrivalTransportEvent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPlannedArrivalTransportEvent(): static
    {
        $this->plannedArrivalTransportEvent = null;

        return $this;
    }

    /**
     * @return null|array<PlannedWaypointTransportEvent>
     */
    public function getPlannedWaypointTransportEvent(): ?array
    {
        return $this->plannedWaypointTransportEvent;
    }

    /**
     * @param  null|array<PlannedWaypointTransportEvent> $plannedWaypointTransportEvent
     * @return static
     */
    public function setPlannedWaypointTransportEvent(?array $plannedWaypointTransportEvent = null): static
    {
        $this->plannedWaypointTransportEvent = $plannedWaypointTransportEvent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPlannedWaypointTransportEvent(): static
    {
        $this->plannedWaypointTransportEvent = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearPlannedWaypointTransportEvent(): static
    {
        $this->plannedWaypointTransportEvent = [];

        return $this;
    }

    /**
     * @return null|PlannedWaypointTransportEvent
     */
    public function firstPlannedWaypointTransportEvent(): ?PlannedWaypointTransportEvent
    {
        $plannedWaypointTransportEvent = $this->plannedWaypointTransportEvent ?? [];
        $plannedWaypointTransportEvent = reset($plannedWaypointTransportEvent);

        if (false === $plannedWaypointTransportEvent) {
            return null;
        }

        return $plannedWaypointTransportEvent;
    }

    /**
     * @return null|PlannedWaypointTransportEvent
     */
    public function lastPlannedWaypointTransportEvent(): ?PlannedWaypointTransportEvent
    {
        $plannedWaypointTransportEvent = $this->plannedWaypointTransportEvent ?? [];
        $plannedWaypointTransportEvent = end($plannedWaypointTransportEvent);

        if (false === $plannedWaypointTransportEvent) {
            return null;
        }

        return $plannedWaypointTransportEvent;
    }

    /**
     * @param  PlannedWaypointTransportEvent $plannedWaypointTransportEvent
     * @return static
     */
    public function addToPlannedWaypointTransportEvent(
        PlannedWaypointTransportEvent $plannedWaypointTransportEvent,
    ): static {
        $this->plannedWaypointTransportEvent[] = $plannedWaypointTransportEvent;

        return $this;
    }

    /**
     * @return PlannedWaypointTransportEvent
     */
    public function addToPlannedWaypointTransportEventWithCreate(): PlannedWaypointTransportEvent
    {
        $this->addToplannedWaypointTransportEvent($plannedWaypointTransportEvent = new PlannedWaypointTransportEvent());

        return $plannedWaypointTransportEvent;
    }

    /**
     * @param  PlannedWaypointTransportEvent $plannedWaypointTransportEvent
     * @return static
     */
    public function addOnceToPlannedWaypointTransportEvent(
        PlannedWaypointTransportEvent $plannedWaypointTransportEvent,
    ): static {
        if (!is_array($this->plannedWaypointTransportEvent)) {
            $this->plannedWaypointTransportEvent = [];
        }

        $this->plannedWaypointTransportEvent[0] = $plannedWaypointTransportEvent;

        return $this;
    }

    /**
     * @return PlannedWaypointTransportEvent
     */
    public function addOnceToPlannedWaypointTransportEventWithCreate(): PlannedWaypointTransportEvent
    {
        if (!is_array($this->plannedWaypointTransportEvent)) {
            $this->plannedWaypointTransportEvent = [];
        }

        if ([] === $this->plannedWaypointTransportEvent) {
            $this->addOnceToplannedWaypointTransportEvent(new PlannedWaypointTransportEvent());
        }

        return $this->plannedWaypointTransportEvent[0];
    }

    /**
     * @return null|ActualDepartureTransportEvent
     */
    public function getActualDepartureTransportEvent(): ?ActualDepartureTransportEvent
    {
        return $this->actualDepartureTransportEvent;
    }

    /**
     * @return ActualDepartureTransportEvent
     */
    public function getActualDepartureTransportEventWithCreate(): ActualDepartureTransportEvent
    {
        $this->actualDepartureTransportEvent = is_null($this->actualDepartureTransportEvent) ? new ActualDepartureTransportEvent() : $this->actualDepartureTransportEvent;

        return $this->actualDepartureTransportEvent;
    }

    /**
     * @param  null|ActualDepartureTransportEvent $actualDepartureTransportEvent
     * @return static
     */
    public function setActualDepartureTransportEvent(
        ?ActualDepartureTransportEvent $actualDepartureTransportEvent = null,
    ): static {
        $this->actualDepartureTransportEvent = $actualDepartureTransportEvent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetActualDepartureTransportEvent(): static
    {
        $this->actualDepartureTransportEvent = null;

        return $this;
    }

    /**
     * @return null|ActualWaypointTransportEvent
     */
    public function getActualWaypointTransportEvent(): ?ActualWaypointTransportEvent
    {
        return $this->actualWaypointTransportEvent;
    }

    /**
     * @return ActualWaypointTransportEvent
     */
    public function getActualWaypointTransportEventWithCreate(): ActualWaypointTransportEvent
    {
        $this->actualWaypointTransportEvent = is_null($this->actualWaypointTransportEvent) ? new ActualWaypointTransportEvent() : $this->actualWaypointTransportEvent;

        return $this->actualWaypointTransportEvent;
    }

    /**
     * @param  null|ActualWaypointTransportEvent $actualWaypointTransportEvent
     * @return static
     */
    public function setActualWaypointTransportEvent(
        ?ActualWaypointTransportEvent $actualWaypointTransportEvent = null,
    ): static {
        $this->actualWaypointTransportEvent = $actualWaypointTransportEvent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetActualWaypointTransportEvent(): static
    {
        $this->actualWaypointTransportEvent = null;

        return $this;
    }

    /**
     * @return null|ActualArrivalTransportEvent
     */
    public function getActualArrivalTransportEvent(): ?ActualArrivalTransportEvent
    {
        return $this->actualArrivalTransportEvent;
    }

    /**
     * @return ActualArrivalTransportEvent
     */
    public function getActualArrivalTransportEventWithCreate(): ActualArrivalTransportEvent
    {
        $this->actualArrivalTransportEvent = is_null($this->actualArrivalTransportEvent) ? new ActualArrivalTransportEvent() : $this->actualArrivalTransportEvent;

        return $this->actualArrivalTransportEvent;
    }

    /**
     * @param  null|ActualArrivalTransportEvent $actualArrivalTransportEvent
     * @return static
     */
    public function setActualArrivalTransportEvent(
        ?ActualArrivalTransportEvent $actualArrivalTransportEvent = null,
    ): static {
        $this->actualArrivalTransportEvent = $actualArrivalTransportEvent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetActualArrivalTransportEvent(): static
    {
        $this->actualArrivalTransportEvent = null;

        return $this;
    }

    /**
     * @return null|array<TransportEvent>
     */
    public function getTransportEvent(): ?array
    {
        return $this->transportEvent;
    }

    /**
     * @param  null|array<TransportEvent> $transportEvent
     * @return static
     */
    public function setTransportEvent(?array $transportEvent = null): static
    {
        $this->transportEvent = $transportEvent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTransportEvent(): static
    {
        $this->transportEvent = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearTransportEvent(): static
    {
        $this->transportEvent = [];

        return $this;
    }

    /**
     * @return null|TransportEvent
     */
    public function firstTransportEvent(): ?TransportEvent
    {
        $transportEvent = $this->transportEvent ?? [];
        $transportEvent = reset($transportEvent);

        if (false === $transportEvent) {
            return null;
        }

        return $transportEvent;
    }

    /**
     * @return null|TransportEvent
     */
    public function lastTransportEvent(): ?TransportEvent
    {
        $transportEvent = $this->transportEvent ?? [];
        $transportEvent = end($transportEvent);

        if (false === $transportEvent) {
            return null;
        }

        return $transportEvent;
    }

    /**
     * @param  TransportEvent $transportEvent
     * @return static
     */
    public function addToTransportEvent(TransportEvent $transportEvent): static
    {
        $this->transportEvent[] = $transportEvent;

        return $this;
    }

    /**
     * @return TransportEvent
     */
    public function addToTransportEventWithCreate(): TransportEvent
    {
        $this->addTotransportEvent($transportEvent = new TransportEvent());

        return $transportEvent;
    }

    /**
     * @param  TransportEvent $transportEvent
     * @return static
     */
    public function addOnceToTransportEvent(TransportEvent $transportEvent): static
    {
        if (!is_array($this->transportEvent)) {
            $this->transportEvent = [];
        }

        $this->transportEvent[0] = $transportEvent;

        return $this;
    }

    /**
     * @return TransportEvent
     */
    public function addOnceToTransportEventWithCreate(): TransportEvent
    {
        if (!is_array($this->transportEvent)) {
            $this->transportEvent = [];
        }

        if ([] === $this->transportEvent) {
            $this->addOnceTotransportEvent(new TransportEvent());
        }

        return $this->transportEvent[0];
    }

    /**
     * @return null|EstimatedDepartureTransportEvent
     */
    public function getEstimatedDepartureTransportEvent(): ?EstimatedDepartureTransportEvent
    {
        return $this->estimatedDepartureTransportEvent;
    }

    /**
     * @return EstimatedDepartureTransportEvent
     */
    public function getEstimatedDepartureTransportEventWithCreate(): EstimatedDepartureTransportEvent
    {
        $this->estimatedDepartureTransportEvent = is_null($this->estimatedDepartureTransportEvent) ? new EstimatedDepartureTransportEvent() : $this->estimatedDepartureTransportEvent;

        return $this->estimatedDepartureTransportEvent;
    }

    /**
     * @param  null|EstimatedDepartureTransportEvent $estimatedDepartureTransportEvent
     * @return static
     */
    public function setEstimatedDepartureTransportEvent(
        ?EstimatedDepartureTransportEvent $estimatedDepartureTransportEvent = null,
    ): static {
        $this->estimatedDepartureTransportEvent = $estimatedDepartureTransportEvent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetEstimatedDepartureTransportEvent(): static
    {
        $this->estimatedDepartureTransportEvent = null;

        return $this;
    }

    /**
     * @return null|EstimatedArrivalTransportEvent
     */
    public function getEstimatedArrivalTransportEvent(): ?EstimatedArrivalTransportEvent
    {
        return $this->estimatedArrivalTransportEvent;
    }

    /**
     * @return EstimatedArrivalTransportEvent
     */
    public function getEstimatedArrivalTransportEventWithCreate(): EstimatedArrivalTransportEvent
    {
        $this->estimatedArrivalTransportEvent = is_null($this->estimatedArrivalTransportEvent) ? new EstimatedArrivalTransportEvent() : $this->estimatedArrivalTransportEvent;

        return $this->estimatedArrivalTransportEvent;
    }

    /**
     * @param  null|EstimatedArrivalTransportEvent $estimatedArrivalTransportEvent
     * @return static
     */
    public function setEstimatedArrivalTransportEvent(
        ?EstimatedArrivalTransportEvent $estimatedArrivalTransportEvent = null,
    ): static {
        $this->estimatedArrivalTransportEvent = $estimatedArrivalTransportEvent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetEstimatedArrivalTransportEvent(): static
    {
        $this->estimatedArrivalTransportEvent = null;

        return $this;
    }

    /**
     * @return null|array<PassengerPerson>
     */
    public function getPassengerPerson(): ?array
    {
        return $this->passengerPerson;
    }

    /**
     * @param  null|array<PassengerPerson> $passengerPerson
     * @return static
     */
    public function setPassengerPerson(?array $passengerPerson = null): static
    {
        $this->passengerPerson = $passengerPerson;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPassengerPerson(): static
    {
        $this->passengerPerson = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearPassengerPerson(): static
    {
        $this->passengerPerson = [];

        return $this;
    }

    /**
     * @return null|PassengerPerson
     */
    public function firstPassengerPerson(): ?PassengerPerson
    {
        $passengerPerson = $this->passengerPerson ?? [];
        $passengerPerson = reset($passengerPerson);

        if (false === $passengerPerson) {
            return null;
        }

        return $passengerPerson;
    }

    /**
     * @return null|PassengerPerson
     */
    public function lastPassengerPerson(): ?PassengerPerson
    {
        $passengerPerson = $this->passengerPerson ?? [];
        $passengerPerson = end($passengerPerson);

        if (false === $passengerPerson) {
            return null;
        }

        return $passengerPerson;
    }

    /**
     * @param  PassengerPerson $passengerPerson
     * @return static
     */
    public function addToPassengerPerson(PassengerPerson $passengerPerson): static
    {
        $this->passengerPerson[] = $passengerPerson;

        return $this;
    }

    /**
     * @return PassengerPerson
     */
    public function addToPassengerPersonWithCreate(): PassengerPerson
    {
        $this->addTopassengerPerson($passengerPerson = new PassengerPerson());

        return $passengerPerson;
    }

    /**
     * @param  PassengerPerson $passengerPerson
     * @return static
     */
    public function addOnceToPassengerPerson(PassengerPerson $passengerPerson): static
    {
        if (!is_array($this->passengerPerson)) {
            $this->passengerPerson = [];
        }

        $this->passengerPerson[0] = $passengerPerson;

        return $this;
    }

    /**
     * @return PassengerPerson
     */
    public function addOnceToPassengerPersonWithCreate(): PassengerPerson
    {
        if (!is_array($this->passengerPerson)) {
            $this->passengerPerson = [];
        }

        if ([] === $this->passengerPerson) {
            $this->addOnceTopassengerPerson(new PassengerPerson());
        }

        return $this->passengerPerson[0];
    }

    /**
     * @return null|array<DriverPerson>
     */
    public function getDriverPerson(): ?array
    {
        return $this->driverPerson;
    }

    /**
     * @param  null|array<DriverPerson> $driverPerson
     * @return static
     */
    public function setDriverPerson(?array $driverPerson = null): static
    {
        $this->driverPerson = $driverPerson;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDriverPerson(): static
    {
        $this->driverPerson = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearDriverPerson(): static
    {
        $this->driverPerson = [];

        return $this;
    }

    /**
     * @return null|DriverPerson
     */
    public function firstDriverPerson(): ?DriverPerson
    {
        $driverPerson = $this->driverPerson ?? [];
        $driverPerson = reset($driverPerson);

        if (false === $driverPerson) {
            return null;
        }

        return $driverPerson;
    }

    /**
     * @return null|DriverPerson
     */
    public function lastDriverPerson(): ?DriverPerson
    {
        $driverPerson = $this->driverPerson ?? [];
        $driverPerson = end($driverPerson);

        if (false === $driverPerson) {
            return null;
        }

        return $driverPerson;
    }

    /**
     * @param  DriverPerson $driverPerson
     * @return static
     */
    public function addToDriverPerson(DriverPerson $driverPerson): static
    {
        $this->driverPerson[] = $driverPerson;

        return $this;
    }

    /**
     * @return DriverPerson
     */
    public function addToDriverPersonWithCreate(): DriverPerson
    {
        $this->addTodriverPerson($driverPerson = new DriverPerson());

        return $driverPerson;
    }

    /**
     * @param  DriverPerson $driverPerson
     * @return static
     */
    public function addOnceToDriverPerson(DriverPerson $driverPerson): static
    {
        if (!is_array($this->driverPerson)) {
            $this->driverPerson = [];
        }

        $this->driverPerson[0] = $driverPerson;

        return $this;
    }

    /**
     * @return DriverPerson
     */
    public function addOnceToDriverPersonWithCreate(): DriverPerson
    {
        if (!is_array($this->driverPerson)) {
            $this->driverPerson = [];
        }

        if ([] === $this->driverPerson) {
            $this->addOnceTodriverPerson(new DriverPerson());
        }

        return $this->driverPerson[0];
    }

    /**
     * @return null|ReportingPerson
     */
    public function getReportingPerson(): ?ReportingPerson
    {
        return $this->reportingPerson;
    }

    /**
     * @return ReportingPerson
     */
    public function getReportingPersonWithCreate(): ReportingPerson
    {
        $this->reportingPerson = is_null($this->reportingPerson) ? new ReportingPerson() : $this->reportingPerson;

        return $this->reportingPerson;
    }

    /**
     * @param  null|ReportingPerson $reportingPerson
     * @return static
     */
    public function setReportingPerson(?ReportingPerson $reportingPerson = null): static
    {
        $this->reportingPerson = $reportingPerson;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetReportingPerson(): static
    {
        $this->reportingPerson = null;

        return $this;
    }

    /**
     * @return null|array<CrewMemberPerson>
     */
    public function getCrewMemberPerson(): ?array
    {
        return $this->crewMemberPerson;
    }

    /**
     * @param  null|array<CrewMemberPerson> $crewMemberPerson
     * @return static
     */
    public function setCrewMemberPerson(?array $crewMemberPerson = null): static
    {
        $this->crewMemberPerson = $crewMemberPerson;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCrewMemberPerson(): static
    {
        $this->crewMemberPerson = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearCrewMemberPerson(): static
    {
        $this->crewMemberPerson = [];

        return $this;
    }

    /**
     * @return null|CrewMemberPerson
     */
    public function firstCrewMemberPerson(): ?CrewMemberPerson
    {
        $crewMemberPerson = $this->crewMemberPerson ?? [];
        $crewMemberPerson = reset($crewMemberPerson);

        if (false === $crewMemberPerson) {
            return null;
        }

        return $crewMemberPerson;
    }

    /**
     * @return null|CrewMemberPerson
     */
    public function lastCrewMemberPerson(): ?CrewMemberPerson
    {
        $crewMemberPerson = $this->crewMemberPerson ?? [];
        $crewMemberPerson = end($crewMemberPerson);

        if (false === $crewMemberPerson) {
            return null;
        }

        return $crewMemberPerson;
    }

    /**
     * @param  CrewMemberPerson $crewMemberPerson
     * @return static
     */
    public function addToCrewMemberPerson(CrewMemberPerson $crewMemberPerson): static
    {
        $this->crewMemberPerson[] = $crewMemberPerson;

        return $this;
    }

    /**
     * @return CrewMemberPerson
     */
    public function addToCrewMemberPersonWithCreate(): CrewMemberPerson
    {
        $this->addTocrewMemberPerson($crewMemberPerson = new CrewMemberPerson());

        return $crewMemberPerson;
    }

    /**
     * @param  CrewMemberPerson $crewMemberPerson
     * @return static
     */
    public function addOnceToCrewMemberPerson(CrewMemberPerson $crewMemberPerson): static
    {
        if (!is_array($this->crewMemberPerson)) {
            $this->crewMemberPerson = [];
        }

        $this->crewMemberPerson[0] = $crewMemberPerson;

        return $this;
    }

    /**
     * @return CrewMemberPerson
     */
    public function addOnceToCrewMemberPersonWithCreate(): CrewMemberPerson
    {
        if (!is_array($this->crewMemberPerson)) {
            $this->crewMemberPerson = [];
        }

        if ([] === $this->crewMemberPerson) {
            $this->addOnceTocrewMemberPerson(new CrewMemberPerson());
        }

        return $this->crewMemberPerson[0];
    }

    /**
     * @return null|SecurityOfficerPerson
     */
    public function getSecurityOfficerPerson(): ?SecurityOfficerPerson
    {
        return $this->securityOfficerPerson;
    }

    /**
     * @return SecurityOfficerPerson
     */
    public function getSecurityOfficerPersonWithCreate(): SecurityOfficerPerson
    {
        $this->securityOfficerPerson = is_null($this->securityOfficerPerson) ? new SecurityOfficerPerson() : $this->securityOfficerPerson;

        return $this->securityOfficerPerson;
    }

    /**
     * @param  null|SecurityOfficerPerson $securityOfficerPerson
     * @return static
     */
    public function setSecurityOfficerPerson(?SecurityOfficerPerson $securityOfficerPerson = null): static
    {
        $this->securityOfficerPerson = $securityOfficerPerson;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSecurityOfficerPerson(): static
    {
        $this->securityOfficerPerson = null;

        return $this;
    }

    /**
     * @return null|MasterPerson
     */
    public function getMasterPerson(): ?MasterPerson
    {
        return $this->masterPerson;
    }

    /**
     * @return MasterPerson
     */
    public function getMasterPersonWithCreate(): MasterPerson
    {
        $this->masterPerson = is_null($this->masterPerson) ? new MasterPerson() : $this->masterPerson;

        return $this->masterPerson;
    }

    /**
     * @param  null|MasterPerson $masterPerson
     * @return static
     */
    public function setMasterPerson(?MasterPerson $masterPerson = null): static
    {
        $this->masterPerson = $masterPerson;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMasterPerson(): static
    {
        $this->masterPerson = null;

        return $this;
    }

    /**
     * @return null|ShipsSurgeonPerson
     */
    public function getShipsSurgeonPerson(): ?ShipsSurgeonPerson
    {
        return $this->shipsSurgeonPerson;
    }

    /**
     * @return ShipsSurgeonPerson
     */
    public function getShipsSurgeonPersonWithCreate(): ShipsSurgeonPerson
    {
        $this->shipsSurgeonPerson = is_null($this->shipsSurgeonPerson) ? new ShipsSurgeonPerson() : $this->shipsSurgeonPerson;

        return $this->shipsSurgeonPerson;
    }

    /**
     * @param  null|ShipsSurgeonPerson $shipsSurgeonPerson
     * @return static
     */
    public function setShipsSurgeonPerson(?ShipsSurgeonPerson $shipsSurgeonPerson = null): static
    {
        $this->shipsSurgeonPerson = $shipsSurgeonPerson;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetShipsSurgeonPerson(): static
    {
        $this->shipsSurgeonPerson = null;

        return $this;
    }
}
