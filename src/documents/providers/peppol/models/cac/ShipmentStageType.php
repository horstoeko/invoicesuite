<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CrewQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\DemurrageInstructions;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Instructions;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LoadingSequenceID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PassengerQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SuccessiveSequenceID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TransitDirectionCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TransportMeansTypeCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TransportModeCode;
use JMS\Serializer\Annotation as JMS;

class ShipmentStageType
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
     * @var null|TransportModeCode
     */
    #[JMS\Accessor(getter: 'getTransportModeCode', setter: 'setTransportModeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TransportModeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TransportModeCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $transportModeCode;

    /**
     * @var null|TransportMeansTypeCode
     */
    #[JMS\Accessor(getter: 'getTransportMeansTypeCode', setter: 'setTransportMeansTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TransportMeansTypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TransportMeansTypeCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $transportMeansTypeCode;

    /**
     * @var null|TransitDirectionCode
     */
    #[JMS\Accessor(getter: 'getTransitDirectionCode', setter: 'setTransitDirectionCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TransitDirectionCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TransitDirectionCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $transitDirectionCode;

    /**
     * @var null|bool
     */
    #[JMS\Accessor(getter: 'getPreCarriageIndicator', setter: 'setPreCarriageIndicator')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PreCarriageIndicator')]
    #[JMS\Type('bool')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $preCarriageIndicator;

    /**
     * @var null|bool
     */
    #[JMS\Accessor(getter: 'getOnCarriageIndicator', setter: 'setOnCarriageIndicator')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('OnCarriageIndicator')]
    #[JMS\Type('bool')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $onCarriageIndicator;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getEstimatedDeliveryDate', setter: 'setEstimatedDeliveryDate')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('EstimatedDeliveryDate')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $estimatedDeliveryDate;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getEstimatedDeliveryTime', setter: 'setEstimatedDeliveryTime')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('EstimatedDeliveryTime')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $estimatedDeliveryTime;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getRequiredDeliveryDate', setter: 'setRequiredDeliveryDate')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('RequiredDeliveryDate')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $requiredDeliveryDate;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getRequiredDeliveryTime', setter: 'setRequiredDeliveryTime')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('RequiredDeliveryTime')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $requiredDeliveryTime;

    /**
     * @var null|LoadingSequenceID
     */
    #[JMS\Accessor(getter: 'getLoadingSequenceID', setter: 'setLoadingSequenceID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('LoadingSequenceID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LoadingSequenceID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $loadingSequenceID;

    /**
     * @var null|SuccessiveSequenceID
     */
    #[JMS\Accessor(getter: 'getSuccessiveSequenceID', setter: 'setSuccessiveSequenceID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SuccessiveSequenceID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SuccessiveSequenceID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $successiveSequenceID;

    /**
     * @var null|array<Instructions>
     */
    #[JMS\Accessor(getter: 'getInstructions', setter: 'setInstructions')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Instructions')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Instructions>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'Instructions', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $instructions;

    /**
     * @var null|array<DemurrageInstructions>
     */
    #[JMS\Accessor(getter: 'getDemurrageInstructions', setter: 'setDemurrageInstructions')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('DemurrageInstructions')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\DemurrageInstructions>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'DemurrageInstructions', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $demurrageInstructions;

    /**
     * @var null|CrewQuantity
     */
    #[JMS\Accessor(getter: 'getCrewQuantity', setter: 'setCrewQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CrewQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CrewQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $crewQuantity;

    /**
     * @var null|PassengerQuantity
     */
    #[JMS\Accessor(getter: 'getPassengerQuantity', setter: 'setPassengerQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PassengerQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PassengerQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $passengerQuantity;

    /**
     * @var null|TransitPeriod
     */
    #[JMS\Accessor(getter: 'getTransitPeriod', setter: 'setTransitPeriod')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TransitPeriod')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\TransitPeriod')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $transitPeriod;

    /**
     * @var null|array<CarrierParty>
     */
    #[JMS\Accessor(getter: 'getCarrierParty', setter: 'setCarrierParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CarrierParty')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\CarrierParty>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'CarrierParty', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $carrierParty;

    /**
     * @var null|TransportMeans
     */
    #[JMS\Accessor(getter: 'getTransportMeans', setter: 'setTransportMeans')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TransportMeans')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\TransportMeans')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $transportMeans;

    /**
     * @var null|LoadingPortLocation
     */
    #[JMS\Accessor(getter: 'getLoadingPortLocation', setter: 'setLoadingPortLocation')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('LoadingPortLocation')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\LoadingPortLocation')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $loadingPortLocation;

    /**
     * @var null|UnloadingPortLocation
     */
    #[JMS\Accessor(getter: 'getUnloadingPortLocation', setter: 'setUnloadingPortLocation')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('UnloadingPortLocation')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\UnloadingPortLocation')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $unloadingPortLocation;

    /**
     * @var null|TransshipPortLocation
     */
    #[JMS\Accessor(getter: 'getTransshipPortLocation', setter: 'setTransshipPortLocation')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TransshipPortLocation')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\TransshipPortLocation')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $transshipPortLocation;

    /**
     * @var null|LoadingTransportEvent
     */
    #[JMS\Accessor(getter: 'getLoadingTransportEvent', setter: 'setLoadingTransportEvent')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('LoadingTransportEvent')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\LoadingTransportEvent')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $loadingTransportEvent;

    /**
     * @var null|ExaminationTransportEvent
     */
    #[JMS\Accessor(getter: 'getExaminationTransportEvent', setter: 'setExaminationTransportEvent')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ExaminationTransportEvent')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\ExaminationTransportEvent')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $examinationTransportEvent;

    /**
     * @var null|AvailabilityTransportEvent
     */
    #[JMS\Accessor(getter: 'getAvailabilityTransportEvent', setter: 'setAvailabilityTransportEvent')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('AvailabilityTransportEvent')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\AvailabilityTransportEvent')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $availabilityTransportEvent;

    /**
     * @var null|ExportationTransportEvent
     */
    #[JMS\Accessor(getter: 'getExportationTransportEvent', setter: 'setExportationTransportEvent')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ExportationTransportEvent')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\ExportationTransportEvent')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $exportationTransportEvent;

    /**
     * @var null|DischargeTransportEvent
     */
    #[JMS\Accessor(getter: 'getDischargeTransportEvent', setter: 'setDischargeTransportEvent')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('DischargeTransportEvent')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\DischargeTransportEvent')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $dischargeTransportEvent;

    /**
     * @var null|WarehousingTransportEvent
     */
    #[JMS\Accessor(getter: 'getWarehousingTransportEvent', setter: 'setWarehousingTransportEvent')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('WarehousingTransportEvent')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\WarehousingTransportEvent')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $warehousingTransportEvent;

    /**
     * @var null|TakeoverTransportEvent
     */
    #[JMS\Accessor(getter: 'getTakeoverTransportEvent', setter: 'setTakeoverTransportEvent')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TakeoverTransportEvent')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\TakeoverTransportEvent')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $takeoverTransportEvent;

    /**
     * @var null|OptionalTakeoverTransportEvent
     */
    #[JMS\Accessor(getter: 'getOptionalTakeoverTransportEvent', setter: 'setOptionalTakeoverTransportEvent')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('OptionalTakeoverTransportEvent')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\OptionalTakeoverTransportEvent')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $optionalTakeoverTransportEvent;

    /**
     * @var null|DropoffTransportEvent
     */
    #[JMS\Accessor(getter: 'getDropoffTransportEvent', setter: 'setDropoffTransportEvent')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('DropoffTransportEvent')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\DropoffTransportEvent')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $dropoffTransportEvent;

    /**
     * @var null|ActualPickupTransportEvent
     */
    #[JMS\Accessor(getter: 'getActualPickupTransportEvent', setter: 'setActualPickupTransportEvent')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ActualPickupTransportEvent')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\ActualPickupTransportEvent')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $actualPickupTransportEvent;

    /**
     * @var null|DeliveryTransportEvent
     */
    #[JMS\Accessor(getter: 'getDeliveryTransportEvent', setter: 'setDeliveryTransportEvent')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('DeliveryTransportEvent')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\DeliveryTransportEvent')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $deliveryTransportEvent;

    /**
     * @var null|ReceiptTransportEvent
     */
    #[JMS\Accessor(getter: 'getReceiptTransportEvent', setter: 'setReceiptTransportEvent')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ReceiptTransportEvent')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\ReceiptTransportEvent')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $receiptTransportEvent;

    /**
     * @var null|StorageTransportEvent
     */
    #[JMS\Accessor(getter: 'getStorageTransportEvent', setter: 'setStorageTransportEvent')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('StorageTransportEvent')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\StorageTransportEvent')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $storageTransportEvent;

    /**
     * @var null|AcceptanceTransportEvent
     */
    #[JMS\Accessor(getter: 'getAcceptanceTransportEvent', setter: 'setAcceptanceTransportEvent')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('AcceptanceTransportEvent')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\AcceptanceTransportEvent')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $acceptanceTransportEvent;

    /**
     * @var null|TerminalOperatorParty
     */
    #[JMS\Accessor(getter: 'getTerminalOperatorParty', setter: 'setTerminalOperatorParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TerminalOperatorParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\TerminalOperatorParty')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $terminalOperatorParty;

    /**
     * @var null|CustomsAgentParty
     */
    #[JMS\Accessor(getter: 'getCustomsAgentParty', setter: 'setCustomsAgentParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CustomsAgentParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\CustomsAgentParty')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $customsAgentParty;

    /**
     * @var null|EstimatedTransitPeriod
     */
    #[JMS\Accessor(getter: 'getEstimatedTransitPeriod', setter: 'setEstimatedTransitPeriod')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('EstimatedTransitPeriod')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\EstimatedTransitPeriod')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $estimatedTransitPeriod;

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
     * @var null|FreightChargeLocation
     */
    #[JMS\Accessor(getter: 'getFreightChargeLocation', setter: 'setFreightChargeLocation')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('FreightChargeLocation')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\FreightChargeLocation')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $freightChargeLocation;

    /**
     * @var null|array<DetentionTransportEvent>
     */
    #[JMS\Accessor(getter: 'getDetentionTransportEvent', setter: 'setDetentionTransportEvent')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('DetentionTransportEvent')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\DetentionTransportEvent>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'DetentionTransportEvent', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $detentionTransportEvent;

    /**
     * @var null|RequestedDepartureTransportEvent
     */
    #[JMS\Accessor(getter: 'getRequestedDepartureTransportEvent', setter: 'setRequestedDepartureTransportEvent')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('RequestedDepartureTransportEvent')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\RequestedDepartureTransportEvent')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $requestedDepartureTransportEvent;

    /**
     * @var null|RequestedArrivalTransportEvent
     */
    #[JMS\Accessor(getter: 'getRequestedArrivalTransportEvent', setter: 'setRequestedArrivalTransportEvent')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('RequestedArrivalTransportEvent')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\RequestedArrivalTransportEvent')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $requestedArrivalTransportEvent;

    /**
     * @var null|array<RequestedWaypointTransportEvent>
     */
    #[JMS\Accessor(getter: 'getRequestedWaypointTransportEvent', setter: 'setRequestedWaypointTransportEvent')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('RequestedWaypointTransportEvent')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\RequestedWaypointTransportEvent>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'RequestedWaypointTransportEvent', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $requestedWaypointTransportEvent;

    /**
     * @var null|PlannedDepartureTransportEvent
     */
    #[JMS\Accessor(getter: 'getPlannedDepartureTransportEvent', setter: 'setPlannedDepartureTransportEvent')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PlannedDepartureTransportEvent')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\PlannedDepartureTransportEvent')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $plannedDepartureTransportEvent;

    /**
     * @var null|PlannedArrivalTransportEvent
     */
    #[JMS\Accessor(getter: 'getPlannedArrivalTransportEvent', setter: 'setPlannedArrivalTransportEvent')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PlannedArrivalTransportEvent')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\PlannedArrivalTransportEvent')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $plannedArrivalTransportEvent;

    /**
     * @var null|array<PlannedWaypointTransportEvent>
     */
    #[JMS\Accessor(getter: 'getPlannedWaypointTransportEvent', setter: 'setPlannedWaypointTransportEvent')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PlannedWaypointTransportEvent')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\PlannedWaypointTransportEvent>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'PlannedWaypointTransportEvent', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $plannedWaypointTransportEvent;

    /**
     * @var null|ActualDepartureTransportEvent
     */
    #[JMS\Accessor(getter: 'getActualDepartureTransportEvent', setter: 'setActualDepartureTransportEvent')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ActualDepartureTransportEvent')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\ActualDepartureTransportEvent')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $actualDepartureTransportEvent;

    /**
     * @var null|ActualWaypointTransportEvent
     */
    #[JMS\Accessor(getter: 'getActualWaypointTransportEvent', setter: 'setActualWaypointTransportEvent')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ActualWaypointTransportEvent')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\ActualWaypointTransportEvent')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $actualWaypointTransportEvent;

    /**
     * @var null|ActualArrivalTransportEvent
     */
    #[JMS\Accessor(getter: 'getActualArrivalTransportEvent', setter: 'setActualArrivalTransportEvent')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ActualArrivalTransportEvent')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\ActualArrivalTransportEvent')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $actualArrivalTransportEvent;

    /**
     * @var null|array<TransportEvent>
     */
    #[JMS\Accessor(getter: 'getTransportEvent', setter: 'setTransportEvent')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TransportEvent')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\TransportEvent>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'TransportEvent', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $transportEvent;

    /**
     * @var null|EstimatedDepartureTransportEvent
     */
    #[JMS\Accessor(getter: 'getEstimatedDepartureTransportEvent', setter: 'setEstimatedDepartureTransportEvent')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('EstimatedDepartureTransportEvent')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\EstimatedDepartureTransportEvent')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $estimatedDepartureTransportEvent;

    /**
     * @var null|EstimatedArrivalTransportEvent
     */
    #[JMS\Accessor(getter: 'getEstimatedArrivalTransportEvent', setter: 'setEstimatedArrivalTransportEvent')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('EstimatedArrivalTransportEvent')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\EstimatedArrivalTransportEvent')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $estimatedArrivalTransportEvent;

    /**
     * @var null|array<PassengerPerson>
     */
    #[JMS\Accessor(getter: 'getPassengerPerson', setter: 'setPassengerPerson')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PassengerPerson')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\PassengerPerson>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'PassengerPerson', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $passengerPerson;

    /**
     * @var null|array<DriverPerson>
     */
    #[JMS\Accessor(getter: 'getDriverPerson', setter: 'setDriverPerson')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('DriverPerson')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\DriverPerson>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'DriverPerson', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $driverPerson;

    /**
     * @var null|ReportingPerson
     */
    #[JMS\Accessor(getter: 'getReportingPerson', setter: 'setReportingPerson')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ReportingPerson')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\ReportingPerson')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $reportingPerson;

    /**
     * @var null|array<CrewMemberPerson>
     */
    #[JMS\Accessor(getter: 'getCrewMemberPerson', setter: 'setCrewMemberPerson')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CrewMemberPerson')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\CrewMemberPerson>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'CrewMemberPerson', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $crewMemberPerson;

    /**
     * @var null|SecurityOfficerPerson
     */
    #[JMS\Accessor(getter: 'getSecurityOfficerPerson', setter: 'setSecurityOfficerPerson')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SecurityOfficerPerson')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\SecurityOfficerPerson')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $securityOfficerPerson;

    /**
     * @var null|MasterPerson
     */
    #[JMS\Accessor(getter: 'getMasterPerson', setter: 'setMasterPerson')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MasterPerson')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\MasterPerson')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $masterPerson;

    /**
     * @var null|ShipsSurgeonPerson
     */
    #[JMS\Accessor(getter: 'getShipsSurgeonPerson', setter: 'setShipsSurgeonPerson')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ShipsSurgeonPerson')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\ShipsSurgeonPerson')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
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
        $this->transportModeCode ??= new TransportModeCode();

        return $this->transportModeCode;
    }

    /**
     * @param  null|TransportModeCode $transportModeCode
     * @return static
     */
    public function setTransportModeCode(
        ?TransportModeCode $transportModeCode = null
    ): static {
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
        $this->transportMeansTypeCode ??= new TransportMeansTypeCode();

        return $this->transportMeansTypeCode;
    }

    /**
     * @param  null|TransportMeansTypeCode $transportMeansTypeCode
     * @return static
     */
    public function setTransportMeansTypeCode(
        ?TransportMeansTypeCode $transportMeansTypeCode = null
    ): static {
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
        $this->transitDirectionCode ??= new TransitDirectionCode();

        return $this->transitDirectionCode;
    }

    /**
     * @param  null|TransitDirectionCode $transitDirectionCode
     * @return static
     */
    public function setTransitDirectionCode(
        ?TransitDirectionCode $transitDirectionCode = null
    ): static {
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
    public function setPreCarriageIndicator(
        ?bool $preCarriageIndicator = null
    ): static {
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
    public function setOnCarriageIndicator(
        ?bool $onCarriageIndicator = null
    ): static {
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
    public function setEstimatedDeliveryDate(
        ?DateTimeInterface $estimatedDeliveryDate = null
    ): static {
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
    public function setEstimatedDeliveryTime(
        ?DateTimeInterface $estimatedDeliveryTime = null
    ): static {
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
    public function setRequiredDeliveryDate(
        ?DateTimeInterface $requiredDeliveryDate = null
    ): static {
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
    public function setRequiredDeliveryTime(
        ?DateTimeInterface $requiredDeliveryTime = null
    ): static {
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
        $this->loadingSequenceID ??= new LoadingSequenceID();

        return $this->loadingSequenceID;
    }

    /**
     * @param  null|LoadingSequenceID $loadingSequenceID
     * @return static
     */
    public function setLoadingSequenceID(
        ?LoadingSequenceID $loadingSequenceID = null
    ): static {
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
        $this->successiveSequenceID ??= new SuccessiveSequenceID();

        return $this->successiveSequenceID;
    }

    /**
     * @param  null|SuccessiveSequenceID $successiveSequenceID
     * @return static
     */
    public function setSuccessiveSequenceID(
        ?SuccessiveSequenceID $successiveSequenceID = null
    ): static {
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
    public function setInstructions(
        ?array $instructions = null
    ): static {
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
    public function addToInstructions(
        Instructions $instructions
    ): static {
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
    public function addOnceToInstructions(
        Instructions $instructions
    ): static {
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
    public function setDemurrageInstructions(
        ?array $demurrageInstructions = null
    ): static {
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
    public function addToDemurrageInstructions(
        DemurrageInstructions $demurrageInstructions
    ): static {
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
    public function addOnceToDemurrageInstructions(
        DemurrageInstructions $demurrageInstructions
    ): static {
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
        $this->crewQuantity ??= new CrewQuantity();

        return $this->crewQuantity;
    }

    /**
     * @param  null|CrewQuantity $crewQuantity
     * @return static
     */
    public function setCrewQuantity(
        ?CrewQuantity $crewQuantity = null
    ): static {
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
        $this->passengerQuantity ??= new PassengerQuantity();

        return $this->passengerQuantity;
    }

    /**
     * @param  null|PassengerQuantity $passengerQuantity
     * @return static
     */
    public function setPassengerQuantity(
        ?PassengerQuantity $passengerQuantity = null
    ): static {
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
        $this->transitPeriod ??= new TransitPeriod();

        return $this->transitPeriod;
    }

    /**
     * @param  null|TransitPeriod $transitPeriod
     * @return static
     */
    public function setTransitPeriod(
        ?TransitPeriod $transitPeriod = null
    ): static {
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
    public function setCarrierParty(
        ?array $carrierParty = null
    ): static {
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
    public function addToCarrierParty(
        CarrierParty $carrierParty
    ): static {
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
    public function addOnceToCarrierParty(
        CarrierParty $carrierParty
    ): static {
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
        $this->transportMeans ??= new TransportMeans();

        return $this->transportMeans;
    }

    /**
     * @param  null|TransportMeans $transportMeans
     * @return static
     */
    public function setTransportMeans(
        ?TransportMeans $transportMeans = null
    ): static {
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
        $this->loadingPortLocation ??= new LoadingPortLocation();

        return $this->loadingPortLocation;
    }

    /**
     * @param  null|LoadingPortLocation $loadingPortLocation
     * @return static
     */
    public function setLoadingPortLocation(
        ?LoadingPortLocation $loadingPortLocation = null
    ): static {
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
        $this->unloadingPortLocation ??= new UnloadingPortLocation();

        return $this->unloadingPortLocation;
    }

    /**
     * @param  null|UnloadingPortLocation $unloadingPortLocation
     * @return static
     */
    public function setUnloadingPortLocation(
        ?UnloadingPortLocation $unloadingPortLocation = null
    ): static {
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
        $this->transshipPortLocation ??= new TransshipPortLocation();

        return $this->transshipPortLocation;
    }

    /**
     * @param  null|TransshipPortLocation $transshipPortLocation
     * @return static
     */
    public function setTransshipPortLocation(
        ?TransshipPortLocation $transshipPortLocation = null
    ): static {
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
        $this->loadingTransportEvent ??= new LoadingTransportEvent();

        return $this->loadingTransportEvent;
    }

    /**
     * @param  null|LoadingTransportEvent $loadingTransportEvent
     * @return static
     */
    public function setLoadingTransportEvent(
        ?LoadingTransportEvent $loadingTransportEvent = null
    ): static {
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
        $this->examinationTransportEvent ??= new ExaminationTransportEvent();

        return $this->examinationTransportEvent;
    }

    /**
     * @param  null|ExaminationTransportEvent $examinationTransportEvent
     * @return static
     */
    public function setExaminationTransportEvent(
        ?ExaminationTransportEvent $examinationTransportEvent = null
    ): static {
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
        $this->availabilityTransportEvent ??= new AvailabilityTransportEvent();

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
        $this->exportationTransportEvent ??= new ExportationTransportEvent();

        return $this->exportationTransportEvent;
    }

    /**
     * @param  null|ExportationTransportEvent $exportationTransportEvent
     * @return static
     */
    public function setExportationTransportEvent(
        ?ExportationTransportEvent $exportationTransportEvent = null
    ): static {
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
        $this->dischargeTransportEvent ??= new DischargeTransportEvent();

        return $this->dischargeTransportEvent;
    }

    /**
     * @param  null|DischargeTransportEvent $dischargeTransportEvent
     * @return static
     */
    public function setDischargeTransportEvent(
        ?DischargeTransportEvent $dischargeTransportEvent = null
    ): static {
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
        $this->warehousingTransportEvent ??= new WarehousingTransportEvent();

        return $this->warehousingTransportEvent;
    }

    /**
     * @param  null|WarehousingTransportEvent $warehousingTransportEvent
     * @return static
     */
    public function setWarehousingTransportEvent(
        ?WarehousingTransportEvent $warehousingTransportEvent = null
    ): static {
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
        $this->takeoverTransportEvent ??= new TakeoverTransportEvent();

        return $this->takeoverTransportEvent;
    }

    /**
     * @param  null|TakeoverTransportEvent $takeoverTransportEvent
     * @return static
     */
    public function setTakeoverTransportEvent(
        ?TakeoverTransportEvent $takeoverTransportEvent = null
    ): static {
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
        $this->optionalTakeoverTransportEvent ??= new OptionalTakeoverTransportEvent();

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
        $this->dropoffTransportEvent ??= new DropoffTransportEvent();

        return $this->dropoffTransportEvent;
    }

    /**
     * @param  null|DropoffTransportEvent $dropoffTransportEvent
     * @return static
     */
    public function setDropoffTransportEvent(
        ?DropoffTransportEvent $dropoffTransportEvent = null
    ): static {
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
        $this->actualPickupTransportEvent ??= new ActualPickupTransportEvent();

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
        $this->deliveryTransportEvent ??= new DeliveryTransportEvent();

        return $this->deliveryTransportEvent;
    }

    /**
     * @param  null|DeliveryTransportEvent $deliveryTransportEvent
     * @return static
     */
    public function setDeliveryTransportEvent(
        ?DeliveryTransportEvent $deliveryTransportEvent = null
    ): static {
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
        $this->receiptTransportEvent ??= new ReceiptTransportEvent();

        return $this->receiptTransportEvent;
    }

    /**
     * @param  null|ReceiptTransportEvent $receiptTransportEvent
     * @return static
     */
    public function setReceiptTransportEvent(
        ?ReceiptTransportEvent $receiptTransportEvent = null
    ): static {
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
        $this->storageTransportEvent ??= new StorageTransportEvent();

        return $this->storageTransportEvent;
    }

    /**
     * @param  null|StorageTransportEvent $storageTransportEvent
     * @return static
     */
    public function setStorageTransportEvent(
        ?StorageTransportEvent $storageTransportEvent = null
    ): static {
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
        $this->acceptanceTransportEvent ??= new AcceptanceTransportEvent();

        return $this->acceptanceTransportEvent;
    }

    /**
     * @param  null|AcceptanceTransportEvent $acceptanceTransportEvent
     * @return static
     */
    public function setAcceptanceTransportEvent(
        ?AcceptanceTransportEvent $acceptanceTransportEvent = null
    ): static {
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
        $this->terminalOperatorParty ??= new TerminalOperatorParty();

        return $this->terminalOperatorParty;
    }

    /**
     * @param  null|TerminalOperatorParty $terminalOperatorParty
     * @return static
     */
    public function setTerminalOperatorParty(
        ?TerminalOperatorParty $terminalOperatorParty = null
    ): static {
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
        $this->customsAgentParty ??= new CustomsAgentParty();

        return $this->customsAgentParty;
    }

    /**
     * @param  null|CustomsAgentParty $customsAgentParty
     * @return static
     */
    public function setCustomsAgentParty(
        ?CustomsAgentParty $customsAgentParty = null
    ): static {
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
        $this->estimatedTransitPeriod ??= new EstimatedTransitPeriod();

        return $this->estimatedTransitPeriod;
    }

    /**
     * @param  null|EstimatedTransitPeriod $estimatedTransitPeriod
     * @return static
     */
    public function setEstimatedTransitPeriod(
        ?EstimatedTransitPeriod $estimatedTransitPeriod = null
    ): static {
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
        $this->freightChargeLocation ??= new FreightChargeLocation();

        return $this->freightChargeLocation;
    }

    /**
     * @param  null|FreightChargeLocation $freightChargeLocation
     * @return static
     */
    public function setFreightChargeLocation(
        ?FreightChargeLocation $freightChargeLocation = null
    ): static {
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
    public function setDetentionTransportEvent(
        ?array $detentionTransportEvent = null
    ): static {
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
    public function addToDetentionTransportEvent(
        DetentionTransportEvent $detentionTransportEvent
    ): static {
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
    public function addOnceToDetentionTransportEvent(
        DetentionTransportEvent $detentionTransportEvent
    ): static {
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
        $this->requestedDepartureTransportEvent ??= new RequestedDepartureTransportEvent();

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
        $this->requestedArrivalTransportEvent ??= new RequestedArrivalTransportEvent();

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
    public function setRequestedWaypointTransportEvent(
        ?array $requestedWaypointTransportEvent = null
    ): static {
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
        $this->plannedDepartureTransportEvent ??= new PlannedDepartureTransportEvent();

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
        $this->plannedArrivalTransportEvent ??= new PlannedArrivalTransportEvent();

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
    public function setPlannedWaypointTransportEvent(
        ?array $plannedWaypointTransportEvent = null
    ): static {
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
        $this->actualDepartureTransportEvent ??= new ActualDepartureTransportEvent();

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
        $this->actualWaypointTransportEvent ??= new ActualWaypointTransportEvent();

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
        $this->actualArrivalTransportEvent ??= new ActualArrivalTransportEvent();

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
    public function setTransportEvent(
        ?array $transportEvent = null
    ): static {
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
    public function addToTransportEvent(
        TransportEvent $transportEvent
    ): static {
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
    public function addOnceToTransportEvent(
        TransportEvent $transportEvent
    ): static {
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
        $this->estimatedDepartureTransportEvent ??= new EstimatedDepartureTransportEvent();

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
        $this->estimatedArrivalTransportEvent ??= new EstimatedArrivalTransportEvent();

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
    public function setPassengerPerson(
        ?array $passengerPerson = null
    ): static {
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
    public function addToPassengerPerson(
        PassengerPerson $passengerPerson
    ): static {
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
    public function addOnceToPassengerPerson(
        PassengerPerson $passengerPerson
    ): static {
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
    public function setDriverPerson(
        ?array $driverPerson = null
    ): static {
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
    public function addToDriverPerson(
        DriverPerson $driverPerson
    ): static {
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
    public function addOnceToDriverPerson(
        DriverPerson $driverPerson
    ): static {
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
        $this->reportingPerson ??= new ReportingPerson();

        return $this->reportingPerson;
    }

    /**
     * @param  null|ReportingPerson $reportingPerson
     * @return static
     */
    public function setReportingPerson(
        ?ReportingPerson $reportingPerson = null
    ): static {
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
    public function setCrewMemberPerson(
        ?array $crewMemberPerson = null
    ): static {
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
    public function addToCrewMemberPerson(
        CrewMemberPerson $crewMemberPerson
    ): static {
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
    public function addOnceToCrewMemberPerson(
        CrewMemberPerson $crewMemberPerson
    ): static {
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
        $this->securityOfficerPerson ??= new SecurityOfficerPerson();

        return $this->securityOfficerPerson;
    }

    /**
     * @param  null|SecurityOfficerPerson $securityOfficerPerson
     * @return static
     */
    public function setSecurityOfficerPerson(
        ?SecurityOfficerPerson $securityOfficerPerson = null
    ): static {
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
        $this->masterPerson ??= new MasterPerson();

        return $this->masterPerson;
    }

    /**
     * @param  null|MasterPerson $masterPerson
     * @return static
     */
    public function setMasterPerson(
        ?MasterPerson $masterPerson = null
    ): static {
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
        $this->shipsSurgeonPerson ??= new ShipsSurgeonPerson();

        return $this->shipsSurgeonPerson;
    }

    /**
     * @param  null|ShipsSurgeonPerson $shipsSurgeonPerson
     * @return static
     */
    public function setShipsSurgeonPerson(
        ?ShipsSurgeonPerson $shipsSurgeonPerson = null
    ): static {
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
