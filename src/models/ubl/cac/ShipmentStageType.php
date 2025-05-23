<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\CrewQuantity;
use horstoeko\invoicesuite\models\ubl\cbc\DemurrageInstructions;
use horstoeko\invoicesuite\models\ubl\cbc\ID;
use horstoeko\invoicesuite\models\ubl\cbc\Instructions;
use horstoeko\invoicesuite\models\ubl\cbc\LoadingSequenceID;
use horstoeko\invoicesuite\models\ubl\cbc\PassengerQuantity;
use horstoeko\invoicesuite\models\ubl\cbc\SuccessiveSequenceID;
use horstoeko\invoicesuite\models\ubl\cbc\TransitDirectionCode;
use horstoeko\invoicesuite\models\ubl\cbc\TransportMeansTypeCode;
use horstoeko\invoicesuite\models\ubl\cbc\TransportModeCode;

class ShipmentStageType
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
     * @var \horstoeko\invoicesuite\models\ubl\cbc\TransportModeCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\TransportModeCode")
     * @JMS\Expose
     * @JMS\SerializedName("TransportModeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTransportModeCode", setter="setTransportModeCode")
     */
    private $transportModeCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\TransportMeansTypeCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\TransportMeansTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("TransportMeansTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTransportMeansTypeCode", setter="setTransportMeansTypeCode")
     */
    private $transportMeansTypeCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\TransitDirectionCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\TransitDirectionCode")
     * @JMS\Expose
     * @JMS\SerializedName("TransitDirectionCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTransitDirectionCode", setter="setTransitDirectionCode")
     */
    private $transitDirectionCode;

    /**
     * @var bool|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("PreCarriageIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPreCarriageIndicator", setter="setPreCarriageIndicator")
     */
    private $preCarriageIndicator;

    /**
     * @var bool|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("OnCarriageIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOnCarriageIndicator", setter="setOnCarriageIndicator")
     */
    private $onCarriageIndicator;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("EstimatedDeliveryDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEstimatedDeliveryDate", setter="setEstimatedDeliveryDate")
     */
    private $estimatedDeliveryDate;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time")
     * @JMS\Expose
     * @JMS\SerializedName("EstimatedDeliveryTime")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEstimatedDeliveryTime", setter="setEstimatedDeliveryTime")
     */
    private $estimatedDeliveryTime;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("RequiredDeliveryDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRequiredDeliveryDate", setter="setRequiredDeliveryDate")
     */
    private $requiredDeliveryDate;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time")
     * @JMS\Expose
     * @JMS\SerializedName("RequiredDeliveryTime")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRequiredDeliveryTime", setter="setRequiredDeliveryTime")
     */
    private $requiredDeliveryTime;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\LoadingSequenceID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\LoadingSequenceID")
     * @JMS\Expose
     * @JMS\SerializedName("LoadingSequenceID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLoadingSequenceID", setter="setLoadingSequenceID")
     */
    private $loadingSequenceID;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\SuccessiveSequenceID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\SuccessiveSequenceID")
     * @JMS\Expose
     * @JMS\SerializedName("SuccessiveSequenceID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSuccessiveSequenceID", setter="setSuccessiveSequenceID")
     */
    private $successiveSequenceID;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\Instructions>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\Instructions>")
     * @JMS\Expose
     * @JMS\SerializedName("Instructions")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Instructions", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getInstructions", setter="setInstructions")
     */
    private $instructions;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\DemurrageInstructions>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\DemurrageInstructions>")
     * @JMS\Expose
     * @JMS\SerializedName("DemurrageInstructions")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="DemurrageInstructions", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getDemurrageInstructions", setter="setDemurrageInstructions")
     */
    private $demurrageInstructions;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\CrewQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\CrewQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("CrewQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCrewQuantity", setter="setCrewQuantity")
     */
    private $crewQuantity;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\PassengerQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\PassengerQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("PassengerQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPassengerQuantity", setter="setPassengerQuantity")
     */
    private $passengerQuantity;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\TransitPeriod|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\TransitPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("TransitPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTransitPeriod", setter="setTransitPeriod")
     */
    private $transitPeriod;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\CarrierParty>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\CarrierParty>")
     * @JMS\Expose
     * @JMS\SerializedName("CarrierParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="CarrierParty", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getCarrierParty", setter="setCarrierParty")
     */
    private $carrierParty;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\TransportMeans|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\TransportMeans")
     * @JMS\Expose
     * @JMS\SerializedName("TransportMeans")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTransportMeans", setter="setTransportMeans")
     */
    private $transportMeans;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\LoadingPortLocation|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\LoadingPortLocation")
     * @JMS\Expose
     * @JMS\SerializedName("LoadingPortLocation")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLoadingPortLocation", setter="setLoadingPortLocation")
     */
    private $loadingPortLocation;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\UnloadingPortLocation|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\UnloadingPortLocation")
     * @JMS\Expose
     * @JMS\SerializedName("UnloadingPortLocation")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getUnloadingPortLocation", setter="setUnloadingPortLocation")
     */
    private $unloadingPortLocation;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\TransshipPortLocation|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\TransshipPortLocation")
     * @JMS\Expose
     * @JMS\SerializedName("TransshipPortLocation")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTransshipPortLocation", setter="setTransshipPortLocation")
     */
    private $transshipPortLocation;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\LoadingTransportEvent|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\LoadingTransportEvent")
     * @JMS\Expose
     * @JMS\SerializedName("LoadingTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLoadingTransportEvent", setter="setLoadingTransportEvent")
     */
    private $loadingTransportEvent;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\ExaminationTransportEvent|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\ExaminationTransportEvent")
     * @JMS\Expose
     * @JMS\SerializedName("ExaminationTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getExaminationTransportEvent", setter="setExaminationTransportEvent")
     */
    private $examinationTransportEvent;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\AvailabilityTransportEvent|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\AvailabilityTransportEvent")
     * @JMS\Expose
     * @JMS\SerializedName("AvailabilityTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAvailabilityTransportEvent", setter="setAvailabilityTransportEvent")
     */
    private $availabilityTransportEvent;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\ExportationTransportEvent|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\ExportationTransportEvent")
     * @JMS\Expose
     * @JMS\SerializedName("ExportationTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getExportationTransportEvent", setter="setExportationTransportEvent")
     */
    private $exportationTransportEvent;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\DischargeTransportEvent|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\DischargeTransportEvent")
     * @JMS\Expose
     * @JMS\SerializedName("DischargeTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDischargeTransportEvent", setter="setDischargeTransportEvent")
     */
    private $dischargeTransportEvent;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\WarehousingTransportEvent|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\WarehousingTransportEvent")
     * @JMS\Expose
     * @JMS\SerializedName("WarehousingTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getWarehousingTransportEvent", setter="setWarehousingTransportEvent")
     */
    private $warehousingTransportEvent;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\TakeoverTransportEvent|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\TakeoverTransportEvent")
     * @JMS\Expose
     * @JMS\SerializedName("TakeoverTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTakeoverTransportEvent", setter="setTakeoverTransportEvent")
     */
    private $takeoverTransportEvent;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\OptionalTakeoverTransportEvent|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\OptionalTakeoverTransportEvent")
     * @JMS\Expose
     * @JMS\SerializedName("OptionalTakeoverTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOptionalTakeoverTransportEvent", setter="setOptionalTakeoverTransportEvent")
     */
    private $optionalTakeoverTransportEvent;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\DropoffTransportEvent|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\DropoffTransportEvent")
     * @JMS\Expose
     * @JMS\SerializedName("DropoffTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDropoffTransportEvent", setter="setDropoffTransportEvent")
     */
    private $dropoffTransportEvent;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\ActualPickupTransportEvent|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\ActualPickupTransportEvent")
     * @JMS\Expose
     * @JMS\SerializedName("ActualPickupTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getActualPickupTransportEvent", setter="setActualPickupTransportEvent")
     */
    private $actualPickupTransportEvent;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\DeliveryTransportEvent|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\DeliveryTransportEvent")
     * @JMS\Expose
     * @JMS\SerializedName("DeliveryTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDeliveryTransportEvent", setter="setDeliveryTransportEvent")
     */
    private $deliveryTransportEvent;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\ReceiptTransportEvent|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\ReceiptTransportEvent")
     * @JMS\Expose
     * @JMS\SerializedName("ReceiptTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getReceiptTransportEvent", setter="setReceiptTransportEvent")
     */
    private $receiptTransportEvent;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\StorageTransportEvent|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\StorageTransportEvent")
     * @JMS\Expose
     * @JMS\SerializedName("StorageTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getStorageTransportEvent", setter="setStorageTransportEvent")
     */
    private $storageTransportEvent;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\AcceptanceTransportEvent|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\AcceptanceTransportEvent")
     * @JMS\Expose
     * @JMS\SerializedName("AcceptanceTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAcceptanceTransportEvent", setter="setAcceptanceTransportEvent")
     */
    private $acceptanceTransportEvent;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\TerminalOperatorParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\TerminalOperatorParty")
     * @JMS\Expose
     * @JMS\SerializedName("TerminalOperatorParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTerminalOperatorParty", setter="setTerminalOperatorParty")
     */
    private $terminalOperatorParty;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\CustomsAgentParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\CustomsAgentParty")
     * @JMS\Expose
     * @JMS\SerializedName("CustomsAgentParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCustomsAgentParty", setter="setCustomsAgentParty")
     */
    private $customsAgentParty;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\EstimatedTransitPeriod|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\EstimatedTransitPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("EstimatedTransitPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEstimatedTransitPeriod", setter="setEstimatedTransitPeriod")
     */
    private $estimatedTransitPeriod;

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
     * @var \horstoeko\invoicesuite\models\ubl\cac\FreightChargeLocation|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\FreightChargeLocation")
     * @JMS\Expose
     * @JMS\SerializedName("FreightChargeLocation")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getFreightChargeLocation", setter="setFreightChargeLocation")
     */
    private $freightChargeLocation;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\DetentionTransportEvent>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\DetentionTransportEvent>")
     * @JMS\Expose
     * @JMS\SerializedName("DetentionTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="DetentionTransportEvent", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getDetentionTransportEvent", setter="setDetentionTransportEvent")
     */
    private $detentionTransportEvent;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\RequestedDepartureTransportEvent|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\RequestedDepartureTransportEvent")
     * @JMS\Expose
     * @JMS\SerializedName("RequestedDepartureTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRequestedDepartureTransportEvent", setter="setRequestedDepartureTransportEvent")
     */
    private $requestedDepartureTransportEvent;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\RequestedArrivalTransportEvent|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\RequestedArrivalTransportEvent")
     * @JMS\Expose
     * @JMS\SerializedName("RequestedArrivalTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRequestedArrivalTransportEvent", setter="setRequestedArrivalTransportEvent")
     */
    private $requestedArrivalTransportEvent;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\RequestedWaypointTransportEvent>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\RequestedWaypointTransportEvent>")
     * @JMS\Expose
     * @JMS\SerializedName("RequestedWaypointTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="RequestedWaypointTransportEvent", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getRequestedWaypointTransportEvent", setter="setRequestedWaypointTransportEvent")
     */
    private $requestedWaypointTransportEvent;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\PlannedDepartureTransportEvent|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\PlannedDepartureTransportEvent")
     * @JMS\Expose
     * @JMS\SerializedName("PlannedDepartureTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPlannedDepartureTransportEvent", setter="setPlannedDepartureTransportEvent")
     */
    private $plannedDepartureTransportEvent;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\PlannedArrivalTransportEvent|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\PlannedArrivalTransportEvent")
     * @JMS\Expose
     * @JMS\SerializedName("PlannedArrivalTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPlannedArrivalTransportEvent", setter="setPlannedArrivalTransportEvent")
     */
    private $plannedArrivalTransportEvent;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\PlannedWaypointTransportEvent>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\PlannedWaypointTransportEvent>")
     * @JMS\Expose
     * @JMS\SerializedName("PlannedWaypointTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PlannedWaypointTransportEvent", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getPlannedWaypointTransportEvent", setter="setPlannedWaypointTransportEvent")
     */
    private $plannedWaypointTransportEvent;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\ActualDepartureTransportEvent|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\ActualDepartureTransportEvent")
     * @JMS\Expose
     * @JMS\SerializedName("ActualDepartureTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getActualDepartureTransportEvent", setter="setActualDepartureTransportEvent")
     */
    private $actualDepartureTransportEvent;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\ActualWaypointTransportEvent|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\ActualWaypointTransportEvent")
     * @JMS\Expose
     * @JMS\SerializedName("ActualWaypointTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getActualWaypointTransportEvent", setter="setActualWaypointTransportEvent")
     */
    private $actualWaypointTransportEvent;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\ActualArrivalTransportEvent|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\ActualArrivalTransportEvent")
     * @JMS\Expose
     * @JMS\SerializedName("ActualArrivalTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getActualArrivalTransportEvent", setter="setActualArrivalTransportEvent")
     */
    private $actualArrivalTransportEvent;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\TransportEvent>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\TransportEvent>")
     * @JMS\Expose
     * @JMS\SerializedName("TransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TransportEvent", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getTransportEvent", setter="setTransportEvent")
     */
    private $transportEvent;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\EstimatedDepartureTransportEvent|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\EstimatedDepartureTransportEvent")
     * @JMS\Expose
     * @JMS\SerializedName("EstimatedDepartureTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEstimatedDepartureTransportEvent", setter="setEstimatedDepartureTransportEvent")
     */
    private $estimatedDepartureTransportEvent;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\EstimatedArrivalTransportEvent|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\EstimatedArrivalTransportEvent")
     * @JMS\Expose
     * @JMS\SerializedName("EstimatedArrivalTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEstimatedArrivalTransportEvent", setter="setEstimatedArrivalTransportEvent")
     */
    private $estimatedArrivalTransportEvent;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\PassengerPerson>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\PassengerPerson>")
     * @JMS\Expose
     * @JMS\SerializedName("PassengerPerson")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PassengerPerson", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getPassengerPerson", setter="setPassengerPerson")
     */
    private $passengerPerson;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\DriverPerson>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\DriverPerson>")
     * @JMS\Expose
     * @JMS\SerializedName("DriverPerson")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="DriverPerson", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getDriverPerson", setter="setDriverPerson")
     */
    private $driverPerson;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\ReportingPerson|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\ReportingPerson")
     * @JMS\Expose
     * @JMS\SerializedName("ReportingPerson")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getReportingPerson", setter="setReportingPerson")
     */
    private $reportingPerson;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\CrewMemberPerson>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\CrewMemberPerson>")
     * @JMS\Expose
     * @JMS\SerializedName("CrewMemberPerson")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="CrewMemberPerson", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getCrewMemberPerson", setter="setCrewMemberPerson")
     */
    private $crewMemberPerson;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\SecurityOfficerPerson|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\SecurityOfficerPerson")
     * @JMS\Expose
     * @JMS\SerializedName("SecurityOfficerPerson")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSecurityOfficerPerson", setter="setSecurityOfficerPerson")
     */
    private $securityOfficerPerson;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\MasterPerson|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\MasterPerson")
     * @JMS\Expose
     * @JMS\SerializedName("MasterPerson")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMasterPerson", setter="setMasterPerson")
     */
    private $masterPerson;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\ShipsSurgeonPerson|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\ShipsSurgeonPerson")
     * @JMS\Expose
     * @JMS\SerializedName("ShipsSurgeonPerson")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getShipsSurgeonPerson", setter="setShipsSurgeonPerson")
     */
    private $shipsSurgeonPerson;

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
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TransportModeCode|null
     */
    public function getTransportModeCode(): ?TransportModeCode
    {
        return $this->transportModeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TransportModeCode
     */
    public function getTransportModeCodeWithCreate(): TransportModeCode
    {
        $this->transportModeCode = is_null($this->transportModeCode) ? new TransportModeCode() : $this->transportModeCode;

        return $this->transportModeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\TransportModeCode|null $transportModeCode
     * @return self
     */
    public function setTransportModeCode(?TransportModeCode $transportModeCode = null): self
    {
        $this->transportModeCode = $transportModeCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TransportMeansTypeCode|null
     */
    public function getTransportMeansTypeCode(): ?TransportMeansTypeCode
    {
        return $this->transportMeansTypeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TransportMeansTypeCode
     */
    public function getTransportMeansTypeCodeWithCreate(): TransportMeansTypeCode
    {
        $this->transportMeansTypeCode = is_null($this->transportMeansTypeCode) ? new TransportMeansTypeCode() : $this->transportMeansTypeCode;

        return $this->transportMeansTypeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\TransportMeansTypeCode|null $transportMeansTypeCode
     * @return self
     */
    public function setTransportMeansTypeCode(?TransportMeansTypeCode $transportMeansTypeCode = null): self
    {
        $this->transportMeansTypeCode = $transportMeansTypeCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TransitDirectionCode|null
     */
    public function getTransitDirectionCode(): ?TransitDirectionCode
    {
        return $this->transitDirectionCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TransitDirectionCode
     */
    public function getTransitDirectionCodeWithCreate(): TransitDirectionCode
    {
        $this->transitDirectionCode = is_null($this->transitDirectionCode) ? new TransitDirectionCode() : $this->transitDirectionCode;

        return $this->transitDirectionCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\TransitDirectionCode|null $transitDirectionCode
     * @return self
     */
    public function setTransitDirectionCode(?TransitDirectionCode $transitDirectionCode = null): self
    {
        $this->transitDirectionCode = $transitDirectionCode;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getPreCarriageIndicator(): ?bool
    {
        return $this->preCarriageIndicator;
    }

    /**
     * @param bool|null $preCarriageIndicator
     * @return self
     */
    public function setPreCarriageIndicator(?bool $preCarriageIndicator = null): self
    {
        $this->preCarriageIndicator = $preCarriageIndicator;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getOnCarriageIndicator(): ?bool
    {
        return $this->onCarriageIndicator;
    }

    /**
     * @param bool|null $onCarriageIndicator
     * @return self
     */
    public function setOnCarriageIndicator(?bool $onCarriageIndicator = null): self
    {
        $this->onCarriageIndicator = $onCarriageIndicator;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getEstimatedDeliveryDate(): ?\DateTimeInterface
    {
        return $this->estimatedDeliveryDate;
    }

    /**
     * @param \DateTimeInterface|null $estimatedDeliveryDate
     * @return self
     */
    public function setEstimatedDeliveryDate(?\DateTimeInterface $estimatedDeliveryDate = null): self
    {
        $this->estimatedDeliveryDate = $estimatedDeliveryDate;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getEstimatedDeliveryTime(): ?\DateTimeInterface
    {
        return $this->estimatedDeliveryTime;
    }

    /**
     * @param \DateTimeInterface|null $estimatedDeliveryTime
     * @return self
     */
    public function setEstimatedDeliveryTime(?\DateTimeInterface $estimatedDeliveryTime = null): self
    {
        $this->estimatedDeliveryTime = $estimatedDeliveryTime;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getRequiredDeliveryDate(): ?\DateTimeInterface
    {
        return $this->requiredDeliveryDate;
    }

    /**
     * @param \DateTimeInterface|null $requiredDeliveryDate
     * @return self
     */
    public function setRequiredDeliveryDate(?\DateTimeInterface $requiredDeliveryDate = null): self
    {
        $this->requiredDeliveryDate = $requiredDeliveryDate;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getRequiredDeliveryTime(): ?\DateTimeInterface
    {
        return $this->requiredDeliveryTime;
    }

    /**
     * @param \DateTimeInterface|null $requiredDeliveryTime
     * @return self
     */
    public function setRequiredDeliveryTime(?\DateTimeInterface $requiredDeliveryTime = null): self
    {
        $this->requiredDeliveryTime = $requiredDeliveryTime;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\LoadingSequenceID|null
     */
    public function getLoadingSequenceID(): ?LoadingSequenceID
    {
        return $this->loadingSequenceID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\LoadingSequenceID
     */
    public function getLoadingSequenceIDWithCreate(): LoadingSequenceID
    {
        $this->loadingSequenceID = is_null($this->loadingSequenceID) ? new LoadingSequenceID() : $this->loadingSequenceID;

        return $this->loadingSequenceID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\LoadingSequenceID|null $loadingSequenceID
     * @return self
     */
    public function setLoadingSequenceID(?LoadingSequenceID $loadingSequenceID = null): self
    {
        $this->loadingSequenceID = $loadingSequenceID;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\SuccessiveSequenceID|null
     */
    public function getSuccessiveSequenceID(): ?SuccessiveSequenceID
    {
        return $this->successiveSequenceID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\SuccessiveSequenceID
     */
    public function getSuccessiveSequenceIDWithCreate(): SuccessiveSequenceID
    {
        $this->successiveSequenceID = is_null($this->successiveSequenceID) ? new SuccessiveSequenceID() : $this->successiveSequenceID;

        return $this->successiveSequenceID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\SuccessiveSequenceID|null $successiveSequenceID
     * @return self
     */
    public function setSuccessiveSequenceID(?SuccessiveSequenceID $successiveSequenceID = null): self
    {
        $this->successiveSequenceID = $successiveSequenceID;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\Instructions>|null
     */
    public function getInstructions(): ?array
    {
        return $this->instructions;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\Instructions>|null $instructions
     * @return self
     */
    public function setInstructions(?array $instructions = null): self
    {
        $this->instructions = $instructions;

        return $this;
    }

    /**
     * @return self
     */
    public function clearInstructions(): self
    {
        $this->instructions = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Instructions $instructions
     * @return self
     */
    public function addToInstructions(Instructions $instructions): self
    {
        $this->instructions[] = $instructions;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Instructions
     */
    public function addToInstructionsWithCreate(): Instructions
    {
        $this->addToinstructions($instructions = new Instructions());

        return $instructions;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Instructions $instructions
     * @return self
     */
    public function addOnceToInstructions(Instructions $instructions): self
    {
        if (!is_array($this->instructions)) {
            $this->instructions = [];
        }

        $this->instructions[0] = $instructions;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Instructions
     */
    public function addOnceToInstructionsWithCreate(): Instructions
    {
        if (!is_array($this->instructions)) {
            $this->instructions = [];
        }

        if ($this->instructions === []) {
            $this->addOnceToinstructions(new Instructions());
        }

        return $this->instructions[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\DemurrageInstructions>|null
     */
    public function getDemurrageInstructions(): ?array
    {
        return $this->demurrageInstructions;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\DemurrageInstructions>|null $demurrageInstructions
     * @return self
     */
    public function setDemurrageInstructions(?array $demurrageInstructions = null): self
    {
        $this->demurrageInstructions = $demurrageInstructions;

        return $this;
    }

    /**
     * @return self
     */
    public function clearDemurrageInstructions(): self
    {
        $this->demurrageInstructions = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\DemurrageInstructions $demurrageInstructions
     * @return self
     */
    public function addToDemurrageInstructions(DemurrageInstructions $demurrageInstructions): self
    {
        $this->demurrageInstructions[] = $demurrageInstructions;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\DemurrageInstructions
     */
    public function addToDemurrageInstructionsWithCreate(): DemurrageInstructions
    {
        $this->addTodemurrageInstructions($demurrageInstructions = new DemurrageInstructions());

        return $demurrageInstructions;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\DemurrageInstructions $demurrageInstructions
     * @return self
     */
    public function addOnceToDemurrageInstructions(DemurrageInstructions $demurrageInstructions): self
    {
        if (!is_array($this->demurrageInstructions)) {
            $this->demurrageInstructions = [];
        }

        $this->demurrageInstructions[0] = $demurrageInstructions;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\DemurrageInstructions
     */
    public function addOnceToDemurrageInstructionsWithCreate(): DemurrageInstructions
    {
        if (!is_array($this->demurrageInstructions)) {
            $this->demurrageInstructions = [];
        }

        if ($this->demurrageInstructions === []) {
            $this->addOnceTodemurrageInstructions(new DemurrageInstructions());
        }

        return $this->demurrageInstructions[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\CrewQuantity|null
     */
    public function getCrewQuantity(): ?CrewQuantity
    {
        return $this->crewQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\CrewQuantity
     */
    public function getCrewQuantityWithCreate(): CrewQuantity
    {
        $this->crewQuantity = is_null($this->crewQuantity) ? new CrewQuantity() : $this->crewQuantity;

        return $this->crewQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\CrewQuantity|null $crewQuantity
     * @return self
     */
    public function setCrewQuantity(?CrewQuantity $crewQuantity = null): self
    {
        $this->crewQuantity = $crewQuantity;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PassengerQuantity|null
     */
    public function getPassengerQuantity(): ?PassengerQuantity
    {
        return $this->passengerQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PassengerQuantity
     */
    public function getPassengerQuantityWithCreate(): PassengerQuantity
    {
        $this->passengerQuantity = is_null($this->passengerQuantity) ? new PassengerQuantity() : $this->passengerQuantity;

        return $this->passengerQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\PassengerQuantity|null $passengerQuantity
     * @return self
     */
    public function setPassengerQuantity(?PassengerQuantity $passengerQuantity = null): self
    {
        $this->passengerQuantity = $passengerQuantity;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TransitPeriod|null
     */
    public function getTransitPeriod(): ?TransitPeriod
    {
        return $this->transitPeriod;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TransitPeriod
     */
    public function getTransitPeriodWithCreate(): TransitPeriod
    {
        $this->transitPeriod = is_null($this->transitPeriod) ? new TransitPeriod() : $this->transitPeriod;

        return $this->transitPeriod;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\TransitPeriod|null $transitPeriod
     * @return self
     */
    public function setTransitPeriod(?TransitPeriod $transitPeriod = null): self
    {
        $this->transitPeriod = $transitPeriod;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\CarrierParty>|null
     */
    public function getCarrierParty(): ?array
    {
        return $this->carrierParty;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\CarrierParty>|null $carrierParty
     * @return self
     */
    public function setCarrierParty(?array $carrierParty = null): self
    {
        $this->carrierParty = $carrierParty;

        return $this;
    }

    /**
     * @return self
     */
    public function clearCarrierParty(): self
    {
        $this->carrierParty = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\CarrierParty $carrierParty
     * @return self
     */
    public function addToCarrierParty(CarrierParty $carrierParty): self
    {
        $this->carrierParty[] = $carrierParty;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\CarrierParty
     */
    public function addToCarrierPartyWithCreate(): CarrierParty
    {
        $this->addTocarrierParty($carrierParty = new CarrierParty());

        return $carrierParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\CarrierParty $carrierParty
     * @return self
     */
    public function addOnceToCarrierParty(CarrierParty $carrierParty): self
    {
        if (!is_array($this->carrierParty)) {
            $this->carrierParty = [];
        }

        $this->carrierParty[0] = $carrierParty;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\CarrierParty
     */
    public function addOnceToCarrierPartyWithCreate(): CarrierParty
    {
        if (!is_array($this->carrierParty)) {
            $this->carrierParty = [];
        }

        if ($this->carrierParty === []) {
            $this->addOnceTocarrierParty(new CarrierParty());
        }

        return $this->carrierParty[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TransportMeans|null
     */
    public function getTransportMeans(): ?TransportMeans
    {
        return $this->transportMeans;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TransportMeans
     */
    public function getTransportMeansWithCreate(): TransportMeans
    {
        $this->transportMeans = is_null($this->transportMeans) ? new TransportMeans() : $this->transportMeans;

        return $this->transportMeans;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\TransportMeans|null $transportMeans
     * @return self
     */
    public function setTransportMeans(?TransportMeans $transportMeans = null): self
    {
        $this->transportMeans = $transportMeans;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\LoadingPortLocation|null
     */
    public function getLoadingPortLocation(): ?LoadingPortLocation
    {
        return $this->loadingPortLocation;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\LoadingPortLocation
     */
    public function getLoadingPortLocationWithCreate(): LoadingPortLocation
    {
        $this->loadingPortLocation = is_null($this->loadingPortLocation) ? new LoadingPortLocation() : $this->loadingPortLocation;

        return $this->loadingPortLocation;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\LoadingPortLocation|null $loadingPortLocation
     * @return self
     */
    public function setLoadingPortLocation(?LoadingPortLocation $loadingPortLocation = null): self
    {
        $this->loadingPortLocation = $loadingPortLocation;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\UnloadingPortLocation|null
     */
    public function getUnloadingPortLocation(): ?UnloadingPortLocation
    {
        return $this->unloadingPortLocation;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\UnloadingPortLocation
     */
    public function getUnloadingPortLocationWithCreate(): UnloadingPortLocation
    {
        $this->unloadingPortLocation = is_null($this->unloadingPortLocation) ? new UnloadingPortLocation() : $this->unloadingPortLocation;

        return $this->unloadingPortLocation;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\UnloadingPortLocation|null $unloadingPortLocation
     * @return self
     */
    public function setUnloadingPortLocation(?UnloadingPortLocation $unloadingPortLocation = null): self
    {
        $this->unloadingPortLocation = $unloadingPortLocation;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TransshipPortLocation|null
     */
    public function getTransshipPortLocation(): ?TransshipPortLocation
    {
        return $this->transshipPortLocation;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TransshipPortLocation
     */
    public function getTransshipPortLocationWithCreate(): TransshipPortLocation
    {
        $this->transshipPortLocation = is_null($this->transshipPortLocation) ? new TransshipPortLocation() : $this->transshipPortLocation;

        return $this->transshipPortLocation;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\TransshipPortLocation|null $transshipPortLocation
     * @return self
     */
    public function setTransshipPortLocation(?TransshipPortLocation $transshipPortLocation = null): self
    {
        $this->transshipPortLocation = $transshipPortLocation;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\LoadingTransportEvent|null
     */
    public function getLoadingTransportEvent(): ?LoadingTransportEvent
    {
        return $this->loadingTransportEvent;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\LoadingTransportEvent
     */
    public function getLoadingTransportEventWithCreate(): LoadingTransportEvent
    {
        $this->loadingTransportEvent = is_null($this->loadingTransportEvent) ? new LoadingTransportEvent() : $this->loadingTransportEvent;

        return $this->loadingTransportEvent;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\LoadingTransportEvent|null $loadingTransportEvent
     * @return self
     */
    public function setLoadingTransportEvent(?LoadingTransportEvent $loadingTransportEvent = null): self
    {
        $this->loadingTransportEvent = $loadingTransportEvent;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ExaminationTransportEvent|null
     */
    public function getExaminationTransportEvent(): ?ExaminationTransportEvent
    {
        return $this->examinationTransportEvent;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ExaminationTransportEvent
     */
    public function getExaminationTransportEventWithCreate(): ExaminationTransportEvent
    {
        $this->examinationTransportEvent = is_null($this->examinationTransportEvent) ? new ExaminationTransportEvent() : $this->examinationTransportEvent;

        return $this->examinationTransportEvent;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ExaminationTransportEvent|null $examinationTransportEvent
     * @return self
     */
    public function setExaminationTransportEvent(?ExaminationTransportEvent $examinationTransportEvent = null): self
    {
        $this->examinationTransportEvent = $examinationTransportEvent;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\AvailabilityTransportEvent|null
     */
    public function getAvailabilityTransportEvent(): ?AvailabilityTransportEvent
    {
        return $this->availabilityTransportEvent;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\AvailabilityTransportEvent
     */
    public function getAvailabilityTransportEventWithCreate(): AvailabilityTransportEvent
    {
        $this->availabilityTransportEvent = is_null($this->availabilityTransportEvent) ? new AvailabilityTransportEvent() : $this->availabilityTransportEvent;

        return $this->availabilityTransportEvent;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\AvailabilityTransportEvent|null $availabilityTransportEvent
     * @return self
     */
    public function setAvailabilityTransportEvent(
        ?AvailabilityTransportEvent $availabilityTransportEvent = null,
    ): self {
        $this->availabilityTransportEvent = $availabilityTransportEvent;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ExportationTransportEvent|null
     */
    public function getExportationTransportEvent(): ?ExportationTransportEvent
    {
        return $this->exportationTransportEvent;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ExportationTransportEvent
     */
    public function getExportationTransportEventWithCreate(): ExportationTransportEvent
    {
        $this->exportationTransportEvent = is_null($this->exportationTransportEvent) ? new ExportationTransportEvent() : $this->exportationTransportEvent;

        return $this->exportationTransportEvent;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ExportationTransportEvent|null $exportationTransportEvent
     * @return self
     */
    public function setExportationTransportEvent(?ExportationTransportEvent $exportationTransportEvent = null): self
    {
        $this->exportationTransportEvent = $exportationTransportEvent;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\DischargeTransportEvent|null
     */
    public function getDischargeTransportEvent(): ?DischargeTransportEvent
    {
        return $this->dischargeTransportEvent;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\DischargeTransportEvent
     */
    public function getDischargeTransportEventWithCreate(): DischargeTransportEvent
    {
        $this->dischargeTransportEvent = is_null($this->dischargeTransportEvent) ? new DischargeTransportEvent() : $this->dischargeTransportEvent;

        return $this->dischargeTransportEvent;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\DischargeTransportEvent|null $dischargeTransportEvent
     * @return self
     */
    public function setDischargeTransportEvent(?DischargeTransportEvent $dischargeTransportEvent = null): self
    {
        $this->dischargeTransportEvent = $dischargeTransportEvent;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\WarehousingTransportEvent|null
     */
    public function getWarehousingTransportEvent(): ?WarehousingTransportEvent
    {
        return $this->warehousingTransportEvent;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\WarehousingTransportEvent
     */
    public function getWarehousingTransportEventWithCreate(): WarehousingTransportEvent
    {
        $this->warehousingTransportEvent = is_null($this->warehousingTransportEvent) ? new WarehousingTransportEvent() : $this->warehousingTransportEvent;

        return $this->warehousingTransportEvent;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\WarehousingTransportEvent|null $warehousingTransportEvent
     * @return self
     */
    public function setWarehousingTransportEvent(?WarehousingTransportEvent $warehousingTransportEvent = null): self
    {
        $this->warehousingTransportEvent = $warehousingTransportEvent;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TakeoverTransportEvent|null
     */
    public function getTakeoverTransportEvent(): ?TakeoverTransportEvent
    {
        return $this->takeoverTransportEvent;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TakeoverTransportEvent
     */
    public function getTakeoverTransportEventWithCreate(): TakeoverTransportEvent
    {
        $this->takeoverTransportEvent = is_null($this->takeoverTransportEvent) ? new TakeoverTransportEvent() : $this->takeoverTransportEvent;

        return $this->takeoverTransportEvent;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\TakeoverTransportEvent|null $takeoverTransportEvent
     * @return self
     */
    public function setTakeoverTransportEvent(?TakeoverTransportEvent $takeoverTransportEvent = null): self
    {
        $this->takeoverTransportEvent = $takeoverTransportEvent;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\OptionalTakeoverTransportEvent|null
     */
    public function getOptionalTakeoverTransportEvent(): ?OptionalTakeoverTransportEvent
    {
        return $this->optionalTakeoverTransportEvent;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\OptionalTakeoverTransportEvent
     */
    public function getOptionalTakeoverTransportEventWithCreate(): OptionalTakeoverTransportEvent
    {
        $this->optionalTakeoverTransportEvent = is_null($this->optionalTakeoverTransportEvent) ? new OptionalTakeoverTransportEvent() : $this->optionalTakeoverTransportEvent;

        return $this->optionalTakeoverTransportEvent;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\OptionalTakeoverTransportEvent|null $optionalTakeoverTransportEvent
     * @return self
     */
    public function setOptionalTakeoverTransportEvent(
        ?OptionalTakeoverTransportEvent $optionalTakeoverTransportEvent = null,
    ): self {
        $this->optionalTakeoverTransportEvent = $optionalTakeoverTransportEvent;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\DropoffTransportEvent|null
     */
    public function getDropoffTransportEvent(): ?DropoffTransportEvent
    {
        return $this->dropoffTransportEvent;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\DropoffTransportEvent
     */
    public function getDropoffTransportEventWithCreate(): DropoffTransportEvent
    {
        $this->dropoffTransportEvent = is_null($this->dropoffTransportEvent) ? new DropoffTransportEvent() : $this->dropoffTransportEvent;

        return $this->dropoffTransportEvent;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\DropoffTransportEvent|null $dropoffTransportEvent
     * @return self
     */
    public function setDropoffTransportEvent(?DropoffTransportEvent $dropoffTransportEvent = null): self
    {
        $this->dropoffTransportEvent = $dropoffTransportEvent;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ActualPickupTransportEvent|null
     */
    public function getActualPickupTransportEvent(): ?ActualPickupTransportEvent
    {
        return $this->actualPickupTransportEvent;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ActualPickupTransportEvent
     */
    public function getActualPickupTransportEventWithCreate(): ActualPickupTransportEvent
    {
        $this->actualPickupTransportEvent = is_null($this->actualPickupTransportEvent) ? new ActualPickupTransportEvent() : $this->actualPickupTransportEvent;

        return $this->actualPickupTransportEvent;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ActualPickupTransportEvent|null $actualPickupTransportEvent
     * @return self
     */
    public function setActualPickupTransportEvent(
        ?ActualPickupTransportEvent $actualPickupTransportEvent = null,
    ): self {
        $this->actualPickupTransportEvent = $actualPickupTransportEvent;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\DeliveryTransportEvent|null
     */
    public function getDeliveryTransportEvent(): ?DeliveryTransportEvent
    {
        return $this->deliveryTransportEvent;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\DeliveryTransportEvent
     */
    public function getDeliveryTransportEventWithCreate(): DeliveryTransportEvent
    {
        $this->deliveryTransportEvent = is_null($this->deliveryTransportEvent) ? new DeliveryTransportEvent() : $this->deliveryTransportEvent;

        return $this->deliveryTransportEvent;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\DeliveryTransportEvent|null $deliveryTransportEvent
     * @return self
     */
    public function setDeliveryTransportEvent(?DeliveryTransportEvent $deliveryTransportEvent = null): self
    {
        $this->deliveryTransportEvent = $deliveryTransportEvent;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ReceiptTransportEvent|null
     */
    public function getReceiptTransportEvent(): ?ReceiptTransportEvent
    {
        return $this->receiptTransportEvent;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ReceiptTransportEvent
     */
    public function getReceiptTransportEventWithCreate(): ReceiptTransportEvent
    {
        $this->receiptTransportEvent = is_null($this->receiptTransportEvent) ? new ReceiptTransportEvent() : $this->receiptTransportEvent;

        return $this->receiptTransportEvent;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ReceiptTransportEvent|null $receiptTransportEvent
     * @return self
     */
    public function setReceiptTransportEvent(?ReceiptTransportEvent $receiptTransportEvent = null): self
    {
        $this->receiptTransportEvent = $receiptTransportEvent;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\StorageTransportEvent|null
     */
    public function getStorageTransportEvent(): ?StorageTransportEvent
    {
        return $this->storageTransportEvent;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\StorageTransportEvent
     */
    public function getStorageTransportEventWithCreate(): StorageTransportEvent
    {
        $this->storageTransportEvent = is_null($this->storageTransportEvent) ? new StorageTransportEvent() : $this->storageTransportEvent;

        return $this->storageTransportEvent;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\StorageTransportEvent|null $storageTransportEvent
     * @return self
     */
    public function setStorageTransportEvent(?StorageTransportEvent $storageTransportEvent = null): self
    {
        $this->storageTransportEvent = $storageTransportEvent;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\AcceptanceTransportEvent|null
     */
    public function getAcceptanceTransportEvent(): ?AcceptanceTransportEvent
    {
        return $this->acceptanceTransportEvent;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\AcceptanceTransportEvent
     */
    public function getAcceptanceTransportEventWithCreate(): AcceptanceTransportEvent
    {
        $this->acceptanceTransportEvent = is_null($this->acceptanceTransportEvent) ? new AcceptanceTransportEvent() : $this->acceptanceTransportEvent;

        return $this->acceptanceTransportEvent;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\AcceptanceTransportEvent|null $acceptanceTransportEvent
     * @return self
     */
    public function setAcceptanceTransportEvent(?AcceptanceTransportEvent $acceptanceTransportEvent = null): self
    {
        $this->acceptanceTransportEvent = $acceptanceTransportEvent;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TerminalOperatorParty|null
     */
    public function getTerminalOperatorParty(): ?TerminalOperatorParty
    {
        return $this->terminalOperatorParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TerminalOperatorParty
     */
    public function getTerminalOperatorPartyWithCreate(): TerminalOperatorParty
    {
        $this->terminalOperatorParty = is_null($this->terminalOperatorParty) ? new TerminalOperatorParty() : $this->terminalOperatorParty;

        return $this->terminalOperatorParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\TerminalOperatorParty|null $terminalOperatorParty
     * @return self
     */
    public function setTerminalOperatorParty(?TerminalOperatorParty $terminalOperatorParty = null): self
    {
        $this->terminalOperatorParty = $terminalOperatorParty;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\CustomsAgentParty|null
     */
    public function getCustomsAgentParty(): ?CustomsAgentParty
    {
        return $this->customsAgentParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\CustomsAgentParty
     */
    public function getCustomsAgentPartyWithCreate(): CustomsAgentParty
    {
        $this->customsAgentParty = is_null($this->customsAgentParty) ? new CustomsAgentParty() : $this->customsAgentParty;

        return $this->customsAgentParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\CustomsAgentParty|null $customsAgentParty
     * @return self
     */
    public function setCustomsAgentParty(?CustomsAgentParty $customsAgentParty = null): self
    {
        $this->customsAgentParty = $customsAgentParty;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\EstimatedTransitPeriod|null
     */
    public function getEstimatedTransitPeriod(): ?EstimatedTransitPeriod
    {
        return $this->estimatedTransitPeriod;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\EstimatedTransitPeriod
     */
    public function getEstimatedTransitPeriodWithCreate(): EstimatedTransitPeriod
    {
        $this->estimatedTransitPeriod = is_null($this->estimatedTransitPeriod) ? new EstimatedTransitPeriod() : $this->estimatedTransitPeriod;

        return $this->estimatedTransitPeriod;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\EstimatedTransitPeriod|null $estimatedTransitPeriod
     * @return self
     */
    public function setEstimatedTransitPeriod(?EstimatedTransitPeriod $estimatedTransitPeriod = null): self
    {
        $this->estimatedTransitPeriod = $estimatedTransitPeriod;

        return $this;
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
     * @return \horstoeko\invoicesuite\models\ubl\cac\FreightChargeLocation|null
     */
    public function getFreightChargeLocation(): ?FreightChargeLocation
    {
        return $this->freightChargeLocation;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\FreightChargeLocation
     */
    public function getFreightChargeLocationWithCreate(): FreightChargeLocation
    {
        $this->freightChargeLocation = is_null($this->freightChargeLocation) ? new FreightChargeLocation() : $this->freightChargeLocation;

        return $this->freightChargeLocation;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\FreightChargeLocation|null $freightChargeLocation
     * @return self
     */
    public function setFreightChargeLocation(?FreightChargeLocation $freightChargeLocation = null): self
    {
        $this->freightChargeLocation = $freightChargeLocation;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\DetentionTransportEvent>|null
     */
    public function getDetentionTransportEvent(): ?array
    {
        return $this->detentionTransportEvent;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\DetentionTransportEvent>|null $detentionTransportEvent
     * @return self
     */
    public function setDetentionTransportEvent(?array $detentionTransportEvent = null): self
    {
        $this->detentionTransportEvent = $detentionTransportEvent;

        return $this;
    }

    /**
     * @return self
     */
    public function clearDetentionTransportEvent(): self
    {
        $this->detentionTransportEvent = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\DetentionTransportEvent $detentionTransportEvent
     * @return self
     */
    public function addToDetentionTransportEvent(DetentionTransportEvent $detentionTransportEvent): self
    {
        $this->detentionTransportEvent[] = $detentionTransportEvent;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\DetentionTransportEvent
     */
    public function addToDetentionTransportEventWithCreate(): DetentionTransportEvent
    {
        $this->addTodetentionTransportEvent($detentionTransportEvent = new DetentionTransportEvent());

        return $detentionTransportEvent;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\DetentionTransportEvent $detentionTransportEvent
     * @return self
     */
    public function addOnceToDetentionTransportEvent(DetentionTransportEvent $detentionTransportEvent): self
    {
        if (!is_array($this->detentionTransportEvent)) {
            $this->detentionTransportEvent = [];
        }

        $this->detentionTransportEvent[0] = $detentionTransportEvent;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\DetentionTransportEvent
     */
    public function addOnceToDetentionTransportEventWithCreate(): DetentionTransportEvent
    {
        if (!is_array($this->detentionTransportEvent)) {
            $this->detentionTransportEvent = [];
        }

        if ($this->detentionTransportEvent === []) {
            $this->addOnceTodetentionTransportEvent(new DetentionTransportEvent());
        }

        return $this->detentionTransportEvent[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\RequestedDepartureTransportEvent|null
     */
    public function getRequestedDepartureTransportEvent(): ?RequestedDepartureTransportEvent
    {
        return $this->requestedDepartureTransportEvent;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\RequestedDepartureTransportEvent
     */
    public function getRequestedDepartureTransportEventWithCreate(): RequestedDepartureTransportEvent
    {
        $this->requestedDepartureTransportEvent = is_null($this->requestedDepartureTransportEvent) ? new RequestedDepartureTransportEvent() : $this->requestedDepartureTransportEvent;

        return $this->requestedDepartureTransportEvent;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\RequestedDepartureTransportEvent|null $requestedDepartureTransportEvent
     * @return self
     */
    public function setRequestedDepartureTransportEvent(
        ?RequestedDepartureTransportEvent $requestedDepartureTransportEvent = null,
    ): self {
        $this->requestedDepartureTransportEvent = $requestedDepartureTransportEvent;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\RequestedArrivalTransportEvent|null
     */
    public function getRequestedArrivalTransportEvent(): ?RequestedArrivalTransportEvent
    {
        return $this->requestedArrivalTransportEvent;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\RequestedArrivalTransportEvent
     */
    public function getRequestedArrivalTransportEventWithCreate(): RequestedArrivalTransportEvent
    {
        $this->requestedArrivalTransportEvent = is_null($this->requestedArrivalTransportEvent) ? new RequestedArrivalTransportEvent() : $this->requestedArrivalTransportEvent;

        return $this->requestedArrivalTransportEvent;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\RequestedArrivalTransportEvent|null $requestedArrivalTransportEvent
     * @return self
     */
    public function setRequestedArrivalTransportEvent(
        ?RequestedArrivalTransportEvent $requestedArrivalTransportEvent = null,
    ): self {
        $this->requestedArrivalTransportEvent = $requestedArrivalTransportEvent;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\RequestedWaypointTransportEvent>|null
     */
    public function getRequestedWaypointTransportEvent(): ?array
    {
        return $this->requestedWaypointTransportEvent;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\RequestedWaypointTransportEvent>|null $requestedWaypointTransportEvent
     * @return self
     */
    public function setRequestedWaypointTransportEvent(?array $requestedWaypointTransportEvent = null): self
    {
        $this->requestedWaypointTransportEvent = $requestedWaypointTransportEvent;

        return $this;
    }

    /**
     * @return self
     */
    public function clearRequestedWaypointTransportEvent(): self
    {
        $this->requestedWaypointTransportEvent = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\RequestedWaypointTransportEvent $requestedWaypointTransportEvent
     * @return self
     */
    public function addToRequestedWaypointTransportEvent(
        RequestedWaypointTransportEvent $requestedWaypointTransportEvent,
    ): self {
        $this->requestedWaypointTransportEvent[] = $requestedWaypointTransportEvent;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\RequestedWaypointTransportEvent
     */
    public function addToRequestedWaypointTransportEventWithCreate(): RequestedWaypointTransportEvent
    {
        $this->addTorequestedWaypointTransportEvent($requestedWaypointTransportEvent = new RequestedWaypointTransportEvent());

        return $requestedWaypointTransportEvent;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\RequestedWaypointTransportEvent $requestedWaypointTransportEvent
     * @return self
     */
    public function addOnceToRequestedWaypointTransportEvent(
        RequestedWaypointTransportEvent $requestedWaypointTransportEvent,
    ): self {
        if (!is_array($this->requestedWaypointTransportEvent)) {
            $this->requestedWaypointTransportEvent = [];
        }

        $this->requestedWaypointTransportEvent[0] = $requestedWaypointTransportEvent;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\RequestedWaypointTransportEvent
     */
    public function addOnceToRequestedWaypointTransportEventWithCreate(): RequestedWaypointTransportEvent
    {
        if (!is_array($this->requestedWaypointTransportEvent)) {
            $this->requestedWaypointTransportEvent = [];
        }

        if ($this->requestedWaypointTransportEvent === []) {
            $this->addOnceTorequestedWaypointTransportEvent(new RequestedWaypointTransportEvent());
        }

        return $this->requestedWaypointTransportEvent[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\PlannedDepartureTransportEvent|null
     */
    public function getPlannedDepartureTransportEvent(): ?PlannedDepartureTransportEvent
    {
        return $this->plannedDepartureTransportEvent;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\PlannedDepartureTransportEvent
     */
    public function getPlannedDepartureTransportEventWithCreate(): PlannedDepartureTransportEvent
    {
        $this->plannedDepartureTransportEvent = is_null($this->plannedDepartureTransportEvent) ? new PlannedDepartureTransportEvent() : $this->plannedDepartureTransportEvent;

        return $this->plannedDepartureTransportEvent;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\PlannedDepartureTransportEvent|null $plannedDepartureTransportEvent
     * @return self
     */
    public function setPlannedDepartureTransportEvent(
        ?PlannedDepartureTransportEvent $plannedDepartureTransportEvent = null,
    ): self {
        $this->plannedDepartureTransportEvent = $plannedDepartureTransportEvent;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\PlannedArrivalTransportEvent|null
     */
    public function getPlannedArrivalTransportEvent(): ?PlannedArrivalTransportEvent
    {
        return $this->plannedArrivalTransportEvent;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\PlannedArrivalTransportEvent
     */
    public function getPlannedArrivalTransportEventWithCreate(): PlannedArrivalTransportEvent
    {
        $this->plannedArrivalTransportEvent = is_null($this->plannedArrivalTransportEvent) ? new PlannedArrivalTransportEvent() : $this->plannedArrivalTransportEvent;

        return $this->plannedArrivalTransportEvent;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\PlannedArrivalTransportEvent|null $plannedArrivalTransportEvent
     * @return self
     */
    public function setPlannedArrivalTransportEvent(
        ?PlannedArrivalTransportEvent $plannedArrivalTransportEvent = null,
    ): self {
        $this->plannedArrivalTransportEvent = $plannedArrivalTransportEvent;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\PlannedWaypointTransportEvent>|null
     */
    public function getPlannedWaypointTransportEvent(): ?array
    {
        return $this->plannedWaypointTransportEvent;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\PlannedWaypointTransportEvent>|null $plannedWaypointTransportEvent
     * @return self
     */
    public function setPlannedWaypointTransportEvent(?array $plannedWaypointTransportEvent = null): self
    {
        $this->plannedWaypointTransportEvent = $plannedWaypointTransportEvent;

        return $this;
    }

    /**
     * @return self
     */
    public function clearPlannedWaypointTransportEvent(): self
    {
        $this->plannedWaypointTransportEvent = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\PlannedWaypointTransportEvent $plannedWaypointTransportEvent
     * @return self
     */
    public function addToPlannedWaypointTransportEvent(
        PlannedWaypointTransportEvent $plannedWaypointTransportEvent,
    ): self {
        $this->plannedWaypointTransportEvent[] = $plannedWaypointTransportEvent;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\PlannedWaypointTransportEvent
     */
    public function addToPlannedWaypointTransportEventWithCreate(): PlannedWaypointTransportEvent
    {
        $this->addToplannedWaypointTransportEvent($plannedWaypointTransportEvent = new PlannedWaypointTransportEvent());

        return $plannedWaypointTransportEvent;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\PlannedWaypointTransportEvent $plannedWaypointTransportEvent
     * @return self
     */
    public function addOnceToPlannedWaypointTransportEvent(
        PlannedWaypointTransportEvent $plannedWaypointTransportEvent,
    ): self {
        if (!is_array($this->plannedWaypointTransportEvent)) {
            $this->plannedWaypointTransportEvent = [];
        }

        $this->plannedWaypointTransportEvent[0] = $plannedWaypointTransportEvent;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\PlannedWaypointTransportEvent
     */
    public function addOnceToPlannedWaypointTransportEventWithCreate(): PlannedWaypointTransportEvent
    {
        if (!is_array($this->plannedWaypointTransportEvent)) {
            $this->plannedWaypointTransportEvent = [];
        }

        if ($this->plannedWaypointTransportEvent === []) {
            $this->addOnceToplannedWaypointTransportEvent(new PlannedWaypointTransportEvent());
        }

        return $this->plannedWaypointTransportEvent[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ActualDepartureTransportEvent|null
     */
    public function getActualDepartureTransportEvent(): ?ActualDepartureTransportEvent
    {
        return $this->actualDepartureTransportEvent;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ActualDepartureTransportEvent
     */
    public function getActualDepartureTransportEventWithCreate(): ActualDepartureTransportEvent
    {
        $this->actualDepartureTransportEvent = is_null($this->actualDepartureTransportEvent) ? new ActualDepartureTransportEvent() : $this->actualDepartureTransportEvent;

        return $this->actualDepartureTransportEvent;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ActualDepartureTransportEvent|null $actualDepartureTransportEvent
     * @return self
     */
    public function setActualDepartureTransportEvent(
        ?ActualDepartureTransportEvent $actualDepartureTransportEvent = null,
    ): self {
        $this->actualDepartureTransportEvent = $actualDepartureTransportEvent;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ActualWaypointTransportEvent|null
     */
    public function getActualWaypointTransportEvent(): ?ActualWaypointTransportEvent
    {
        return $this->actualWaypointTransportEvent;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ActualWaypointTransportEvent
     */
    public function getActualWaypointTransportEventWithCreate(): ActualWaypointTransportEvent
    {
        $this->actualWaypointTransportEvent = is_null($this->actualWaypointTransportEvent) ? new ActualWaypointTransportEvent() : $this->actualWaypointTransportEvent;

        return $this->actualWaypointTransportEvent;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ActualWaypointTransportEvent|null $actualWaypointTransportEvent
     * @return self
     */
    public function setActualWaypointTransportEvent(
        ?ActualWaypointTransportEvent $actualWaypointTransportEvent = null,
    ): self {
        $this->actualWaypointTransportEvent = $actualWaypointTransportEvent;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ActualArrivalTransportEvent|null
     */
    public function getActualArrivalTransportEvent(): ?ActualArrivalTransportEvent
    {
        return $this->actualArrivalTransportEvent;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ActualArrivalTransportEvent
     */
    public function getActualArrivalTransportEventWithCreate(): ActualArrivalTransportEvent
    {
        $this->actualArrivalTransportEvent = is_null($this->actualArrivalTransportEvent) ? new ActualArrivalTransportEvent() : $this->actualArrivalTransportEvent;

        return $this->actualArrivalTransportEvent;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ActualArrivalTransportEvent|null $actualArrivalTransportEvent
     * @return self
     */
    public function setActualArrivalTransportEvent(
        ?ActualArrivalTransportEvent $actualArrivalTransportEvent = null,
    ): self {
        $this->actualArrivalTransportEvent = $actualArrivalTransportEvent;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\TransportEvent>|null
     */
    public function getTransportEvent(): ?array
    {
        return $this->transportEvent;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\TransportEvent>|null $transportEvent
     * @return self
     */
    public function setTransportEvent(?array $transportEvent = null): self
    {
        $this->transportEvent = $transportEvent;

        return $this;
    }

    /**
     * @return self
     */
    public function clearTransportEvent(): self
    {
        $this->transportEvent = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\TransportEvent $transportEvent
     * @return self
     */
    public function addToTransportEvent(TransportEvent $transportEvent): self
    {
        $this->transportEvent[] = $transportEvent;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TransportEvent
     */
    public function addToTransportEventWithCreate(): TransportEvent
    {
        $this->addTotransportEvent($transportEvent = new TransportEvent());

        return $transportEvent;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\TransportEvent $transportEvent
     * @return self
     */
    public function addOnceToTransportEvent(TransportEvent $transportEvent): self
    {
        if (!is_array($this->transportEvent)) {
            $this->transportEvent = [];
        }

        $this->transportEvent[0] = $transportEvent;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TransportEvent
     */
    public function addOnceToTransportEventWithCreate(): TransportEvent
    {
        if (!is_array($this->transportEvent)) {
            $this->transportEvent = [];
        }

        if ($this->transportEvent === []) {
            $this->addOnceTotransportEvent(new TransportEvent());
        }

        return $this->transportEvent[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\EstimatedDepartureTransportEvent|null
     */
    public function getEstimatedDepartureTransportEvent(): ?EstimatedDepartureTransportEvent
    {
        return $this->estimatedDepartureTransportEvent;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\EstimatedDepartureTransportEvent
     */
    public function getEstimatedDepartureTransportEventWithCreate(): EstimatedDepartureTransportEvent
    {
        $this->estimatedDepartureTransportEvent = is_null($this->estimatedDepartureTransportEvent) ? new EstimatedDepartureTransportEvent() : $this->estimatedDepartureTransportEvent;

        return $this->estimatedDepartureTransportEvent;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\EstimatedDepartureTransportEvent|null $estimatedDepartureTransportEvent
     * @return self
     */
    public function setEstimatedDepartureTransportEvent(
        ?EstimatedDepartureTransportEvent $estimatedDepartureTransportEvent = null,
    ): self {
        $this->estimatedDepartureTransportEvent = $estimatedDepartureTransportEvent;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\EstimatedArrivalTransportEvent|null
     */
    public function getEstimatedArrivalTransportEvent(): ?EstimatedArrivalTransportEvent
    {
        return $this->estimatedArrivalTransportEvent;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\EstimatedArrivalTransportEvent
     */
    public function getEstimatedArrivalTransportEventWithCreate(): EstimatedArrivalTransportEvent
    {
        $this->estimatedArrivalTransportEvent = is_null($this->estimatedArrivalTransportEvent) ? new EstimatedArrivalTransportEvent() : $this->estimatedArrivalTransportEvent;

        return $this->estimatedArrivalTransportEvent;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\EstimatedArrivalTransportEvent|null $estimatedArrivalTransportEvent
     * @return self
     */
    public function setEstimatedArrivalTransportEvent(
        ?EstimatedArrivalTransportEvent $estimatedArrivalTransportEvent = null,
    ): self {
        $this->estimatedArrivalTransportEvent = $estimatedArrivalTransportEvent;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\PassengerPerson>|null
     */
    public function getPassengerPerson(): ?array
    {
        return $this->passengerPerson;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\PassengerPerson>|null $passengerPerson
     * @return self
     */
    public function setPassengerPerson(?array $passengerPerson = null): self
    {
        $this->passengerPerson = $passengerPerson;

        return $this;
    }

    /**
     * @return self
     */
    public function clearPassengerPerson(): self
    {
        $this->passengerPerson = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\PassengerPerson $passengerPerson
     * @return self
     */
    public function addToPassengerPerson(PassengerPerson $passengerPerson): self
    {
        $this->passengerPerson[] = $passengerPerson;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\PassengerPerson
     */
    public function addToPassengerPersonWithCreate(): PassengerPerson
    {
        $this->addTopassengerPerson($passengerPerson = new PassengerPerson());

        return $passengerPerson;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\PassengerPerson $passengerPerson
     * @return self
     */
    public function addOnceToPassengerPerson(PassengerPerson $passengerPerson): self
    {
        if (!is_array($this->passengerPerson)) {
            $this->passengerPerson = [];
        }

        $this->passengerPerson[0] = $passengerPerson;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\PassengerPerson
     */
    public function addOnceToPassengerPersonWithCreate(): PassengerPerson
    {
        if (!is_array($this->passengerPerson)) {
            $this->passengerPerson = [];
        }

        if ($this->passengerPerson === []) {
            $this->addOnceTopassengerPerson(new PassengerPerson());
        }

        return $this->passengerPerson[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\DriverPerson>|null
     */
    public function getDriverPerson(): ?array
    {
        return $this->driverPerson;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\DriverPerson>|null $driverPerson
     * @return self
     */
    public function setDriverPerson(?array $driverPerson = null): self
    {
        $this->driverPerson = $driverPerson;

        return $this;
    }

    /**
     * @return self
     */
    public function clearDriverPerson(): self
    {
        $this->driverPerson = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\DriverPerson $driverPerson
     * @return self
     */
    public function addToDriverPerson(DriverPerson $driverPerson): self
    {
        $this->driverPerson[] = $driverPerson;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\DriverPerson
     */
    public function addToDriverPersonWithCreate(): DriverPerson
    {
        $this->addTodriverPerson($driverPerson = new DriverPerson());

        return $driverPerson;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\DriverPerson $driverPerson
     * @return self
     */
    public function addOnceToDriverPerson(DriverPerson $driverPerson): self
    {
        if (!is_array($this->driverPerson)) {
            $this->driverPerson = [];
        }

        $this->driverPerson[0] = $driverPerson;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\DriverPerson
     */
    public function addOnceToDriverPersonWithCreate(): DriverPerson
    {
        if (!is_array($this->driverPerson)) {
            $this->driverPerson = [];
        }

        if ($this->driverPerson === []) {
            $this->addOnceTodriverPerson(new DriverPerson());
        }

        return $this->driverPerson[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ReportingPerson|null
     */
    public function getReportingPerson(): ?ReportingPerson
    {
        return $this->reportingPerson;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ReportingPerson
     */
    public function getReportingPersonWithCreate(): ReportingPerson
    {
        $this->reportingPerson = is_null($this->reportingPerson) ? new ReportingPerson() : $this->reportingPerson;

        return $this->reportingPerson;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ReportingPerson|null $reportingPerson
     * @return self
     */
    public function setReportingPerson(?ReportingPerson $reportingPerson = null): self
    {
        $this->reportingPerson = $reportingPerson;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\CrewMemberPerson>|null
     */
    public function getCrewMemberPerson(): ?array
    {
        return $this->crewMemberPerson;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\CrewMemberPerson>|null $crewMemberPerson
     * @return self
     */
    public function setCrewMemberPerson(?array $crewMemberPerson = null): self
    {
        $this->crewMemberPerson = $crewMemberPerson;

        return $this;
    }

    /**
     * @return self
     */
    public function clearCrewMemberPerson(): self
    {
        $this->crewMemberPerson = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\CrewMemberPerson $crewMemberPerson
     * @return self
     */
    public function addToCrewMemberPerson(CrewMemberPerson $crewMemberPerson): self
    {
        $this->crewMemberPerson[] = $crewMemberPerson;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\CrewMemberPerson
     */
    public function addToCrewMemberPersonWithCreate(): CrewMemberPerson
    {
        $this->addTocrewMemberPerson($crewMemberPerson = new CrewMemberPerson());

        return $crewMemberPerson;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\CrewMemberPerson $crewMemberPerson
     * @return self
     */
    public function addOnceToCrewMemberPerson(CrewMemberPerson $crewMemberPerson): self
    {
        if (!is_array($this->crewMemberPerson)) {
            $this->crewMemberPerson = [];
        }

        $this->crewMemberPerson[0] = $crewMemberPerson;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\CrewMemberPerson
     */
    public function addOnceToCrewMemberPersonWithCreate(): CrewMemberPerson
    {
        if (!is_array($this->crewMemberPerson)) {
            $this->crewMemberPerson = [];
        }

        if ($this->crewMemberPerson === []) {
            $this->addOnceTocrewMemberPerson(new CrewMemberPerson());
        }

        return $this->crewMemberPerson[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\SecurityOfficerPerson|null
     */
    public function getSecurityOfficerPerson(): ?SecurityOfficerPerson
    {
        return $this->securityOfficerPerson;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\SecurityOfficerPerson
     */
    public function getSecurityOfficerPersonWithCreate(): SecurityOfficerPerson
    {
        $this->securityOfficerPerson = is_null($this->securityOfficerPerson) ? new SecurityOfficerPerson() : $this->securityOfficerPerson;

        return $this->securityOfficerPerson;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\SecurityOfficerPerson|null $securityOfficerPerson
     * @return self
     */
    public function setSecurityOfficerPerson(?SecurityOfficerPerson $securityOfficerPerson = null): self
    {
        $this->securityOfficerPerson = $securityOfficerPerson;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\MasterPerson|null
     */
    public function getMasterPerson(): ?MasterPerson
    {
        return $this->masterPerson;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\MasterPerson
     */
    public function getMasterPersonWithCreate(): MasterPerson
    {
        $this->masterPerson = is_null($this->masterPerson) ? new MasterPerson() : $this->masterPerson;

        return $this->masterPerson;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\MasterPerson|null $masterPerson
     * @return self
     */
    public function setMasterPerson(?MasterPerson $masterPerson = null): self
    {
        $this->masterPerson = $masterPerson;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ShipsSurgeonPerson|null
     */
    public function getShipsSurgeonPerson(): ?ShipsSurgeonPerson
    {
        return $this->shipsSurgeonPerson;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ShipsSurgeonPerson
     */
    public function getShipsSurgeonPersonWithCreate(): ShipsSurgeonPerson
    {
        $this->shipsSurgeonPerson = is_null($this->shipsSurgeonPerson) ? new ShipsSurgeonPerson() : $this->shipsSurgeonPerson;

        return $this->shipsSurgeonPerson;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ShipsSurgeonPerson|null $shipsSurgeonPerson
     * @return self
     */
    public function setShipsSurgeonPerson(?ShipsSurgeonPerson $shipsSurgeonPerson = null): self
    {
        $this->shipsSurgeonPerson = $shipsSurgeonPerson;

        return $this;
    }
}
