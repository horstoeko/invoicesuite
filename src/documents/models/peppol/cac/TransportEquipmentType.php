<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\AirFlowPercent;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Characteristics;
use horstoeko\invoicesuite\documents\models\peppol\cbc\DamageRemarks;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Description;
use horstoeko\invoicesuite\documents\models\peppol\cbc\DispositionCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\FullnessIndicationCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\GrossVolumeMeasure;
use horstoeko\invoicesuite\documents\models\peppol\cbc\GrossWeightMeasure;
use horstoeko\invoicesuite\documents\models\peppol\cbc\HumidityPercent;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Information;
use horstoeko\invoicesuite\documents\models\peppol\cbc\OwnerTypeCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ProviderTypeCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ReferencedConsignmentID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\SizeTypeCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\SpecialTransportRequirements;
use horstoeko\invoicesuite\documents\models\peppol\cbc\TareWeightMeasure;
use horstoeko\invoicesuite\documents\models\peppol\cbc\TraceID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\TrackingDeviceCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\TransportEquipmentTypeCode;
use JMS\Serializer\Annotation as JMS;

class TransportEquipmentType
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
     * @var null|array<ReferencedConsignmentID>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\ReferencedConsignmentID>")
     * @JMS\Expose
     * @JMS\SerializedName("ReferencedConsignmentID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ReferencedConsignmentID", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getReferencedConsignmentID", setter="setReferencedConsignmentID")
     */
    private $referencedConsignmentID;

    /**
     * @var null|TransportEquipmentTypeCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\TransportEquipmentTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("TransportEquipmentTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTransportEquipmentTypeCode", setter="setTransportEquipmentTypeCode")
     */
    private $transportEquipmentTypeCode;

    /**
     * @var null|ProviderTypeCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ProviderTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("ProviderTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getProviderTypeCode", setter="setProviderTypeCode")
     */
    private $providerTypeCode;

    /**
     * @var null|OwnerTypeCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\OwnerTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("OwnerTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOwnerTypeCode", setter="setOwnerTypeCode")
     */
    private $ownerTypeCode;

    /**
     * @var null|SizeTypeCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\SizeTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("SizeTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSizeTypeCode", setter="setSizeTypeCode")
     */
    private $sizeTypeCode;

    /**
     * @var null|DispositionCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\DispositionCode")
     * @JMS\Expose
     * @JMS\SerializedName("DispositionCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDispositionCode", setter="setDispositionCode")
     */
    private $dispositionCode;

    /**
     * @var null|FullnessIndicationCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\FullnessIndicationCode")
     * @JMS\Expose
     * @JMS\SerializedName("FullnessIndicationCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getFullnessIndicationCode", setter="setFullnessIndicationCode")
     */
    private $fullnessIndicationCode;

    /**
     * @var null|bool
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("RefrigerationOnIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRefrigerationOnIndicator", setter="setRefrigerationOnIndicator")
     */
    private $refrigerationOnIndicator;

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
     * @var null|bool
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("ReturnabilityIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getReturnabilityIndicator", setter="setReturnabilityIndicator")
     */
    private $returnabilityIndicator;

    /**
     * @var null|bool
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("LegalStatusIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLegalStatusIndicator", setter="setLegalStatusIndicator")
     */
    private $legalStatusIndicator;

    /**
     * @var null|AirFlowPercent
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\AirFlowPercent")
     * @JMS\Expose
     * @JMS\SerializedName("AirFlowPercent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAirFlowPercent", setter="setAirFlowPercent")
     */
    private $airFlowPercent;

    /**
     * @var null|HumidityPercent
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\HumidityPercent")
     * @JMS\Expose
     * @JMS\SerializedName("HumidityPercent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getHumidityPercent", setter="setHumidityPercent")
     */
    private $humidityPercent;

    /**
     * @var null|bool
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("AnimalFoodApprovedIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAnimalFoodApprovedIndicator", setter="setAnimalFoodApprovedIndicator")
     */
    private $animalFoodApprovedIndicator;

    /**
     * @var null|bool
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("HumanFoodApprovedIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getHumanFoodApprovedIndicator", setter="setHumanFoodApprovedIndicator")
     */
    private $humanFoodApprovedIndicator;

    /**
     * @var null|bool
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("DangerousGoodsApprovedIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDangerousGoodsApprovedIndicator", setter="setDangerousGoodsApprovedIndicator")
     */
    private $dangerousGoodsApprovedIndicator;

    /**
     * @var null|bool
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("RefrigeratedIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRefrigeratedIndicator", setter="setRefrigeratedIndicator")
     */
    private $refrigeratedIndicator;

    /**
     * @var null|Characteristics
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\Characteristics")
     * @JMS\Expose
     * @JMS\SerializedName("Characteristics")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCharacteristics", setter="setCharacteristics")
     */
    private $characteristics;

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
     * @var null|array<Description>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\Description>")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Description", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $description;

    /**
     * @var null|array<SpecialTransportRequirements>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\SpecialTransportRequirements>")
     * @JMS\Expose
     * @JMS\SerializedName("SpecialTransportRequirements")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="SpecialTransportRequirements", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getSpecialTransportRequirements", setter="setSpecialTransportRequirements")
     */
    private $specialTransportRequirements;

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
     * @var null|TareWeightMeasure
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\TareWeightMeasure")
     * @JMS\Expose
     * @JMS\SerializedName("TareWeightMeasure")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTareWeightMeasure", setter="setTareWeightMeasure")
     */
    private $tareWeightMeasure;

    /**
     * @var null|TrackingDeviceCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\TrackingDeviceCode")
     * @JMS\Expose
     * @JMS\SerializedName("TrackingDeviceCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTrackingDeviceCode", setter="setTrackingDeviceCode")
     */
    private $trackingDeviceCode;

    /**
     * @var null|bool
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("PowerIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPowerIndicator", setter="setPowerIndicator")
     */
    private $powerIndicator;

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
     * @var null|array<TransportEquipmentSeal>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\TransportEquipmentSeal>")
     * @JMS\Expose
     * @JMS\SerializedName("TransportEquipmentSeal")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TransportEquipmentSeal", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getTransportEquipmentSeal", setter="setTransportEquipmentSeal")
     */
    private $transportEquipmentSeal;

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
     * @var null|ProviderParty
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\ProviderParty")
     * @JMS\Expose
     * @JMS\SerializedName("ProviderParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getProviderParty", setter="setProviderParty")
     */
    private $providerParty;

    /**
     * @var null|LoadingProofParty
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\LoadingProofParty")
     * @JMS\Expose
     * @JMS\SerializedName("LoadingProofParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLoadingProofParty", setter="setLoadingProofParty")
     */
    private $loadingProofParty;

    /**
     * @var null|SupplierParty
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\SupplierParty")
     * @JMS\Expose
     * @JMS\SerializedName("SupplierParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSupplierParty", setter="setSupplierParty")
     */
    private $supplierParty;

    /**
     * @var null|OwnerParty
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\OwnerParty")
     * @JMS\Expose
     * @JMS\SerializedName("OwnerParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOwnerParty", setter="setOwnerParty")
     */
    private $ownerParty;

    /**
     * @var null|OperatingParty
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\OperatingParty")
     * @JMS\Expose
     * @JMS\SerializedName("OperatingParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOperatingParty", setter="setOperatingParty")
     */
    private $operatingParty;

    /**
     * @var null|LoadingLocation
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\LoadingLocation")
     * @JMS\Expose
     * @JMS\SerializedName("LoadingLocation")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLoadingLocation", setter="setLoadingLocation")
     */
    private $loadingLocation;

    /**
     * @var null|UnloadingLocation
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\UnloadingLocation")
     * @JMS\Expose
     * @JMS\SerializedName("UnloadingLocation")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getUnloadingLocation", setter="setUnloadingLocation")
     */
    private $unloadingLocation;

    /**
     * @var null|StorageLocation
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\StorageLocation")
     * @JMS\Expose
     * @JMS\SerializedName("StorageLocation")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getStorageLocation", setter="setStorageLocation")
     */
    private $storageLocation;

    /**
     * @var null|array<PositioningTransportEvent>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\PositioningTransportEvent>")
     * @JMS\Expose
     * @JMS\SerializedName("PositioningTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PositioningTransportEvent", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getPositioningTransportEvent", setter="setPositioningTransportEvent")
     */
    private $positioningTransportEvent;

    /**
     * @var null|array<QuarantineTransportEvent>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\QuarantineTransportEvent>")
     * @JMS\Expose
     * @JMS\SerializedName("QuarantineTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="QuarantineTransportEvent", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getQuarantineTransportEvent", setter="setQuarantineTransportEvent")
     */
    private $quarantineTransportEvent;

    /**
     * @var null|array<DeliveryTransportEvent>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\DeliveryTransportEvent>")
     * @JMS\Expose
     * @JMS\SerializedName("DeliveryTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="DeliveryTransportEvent", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getDeliveryTransportEvent", setter="setDeliveryTransportEvent")
     */
    private $deliveryTransportEvent;

    /**
     * @var null|array<PickupTransportEvent>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\PickupTransportEvent>")
     * @JMS\Expose
     * @JMS\SerializedName("PickupTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PickupTransportEvent", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getPickupTransportEvent", setter="setPickupTransportEvent")
     */
    private $pickupTransportEvent;

    /**
     * @var null|array<HandlingTransportEvent>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\HandlingTransportEvent>")
     * @JMS\Expose
     * @JMS\SerializedName("HandlingTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="HandlingTransportEvent", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getHandlingTransportEvent", setter="setHandlingTransportEvent")
     */
    private $handlingTransportEvent;

    /**
     * @var null|array<LoadingTransportEvent>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\LoadingTransportEvent>")
     * @JMS\Expose
     * @JMS\SerializedName("LoadingTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="LoadingTransportEvent", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getLoadingTransportEvent", setter="setLoadingTransportEvent")
     */
    private $loadingTransportEvent;

    /**
     * @var null|array<TransportEvent>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\TransportEvent>")
     * @JMS\Expose
     * @JMS\SerializedName("TransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TransportEvent", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getTransportEvent", setter="setTransportEvent")
     */
    private $transportEvent;

    /**
     * @var null|ApplicableTransportMeans
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\ApplicableTransportMeans")
     * @JMS\Expose
     * @JMS\SerializedName("ApplicableTransportMeans")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getApplicableTransportMeans", setter="setApplicableTransportMeans")
     */
    private $applicableTransportMeans;

    /**
     * @var null|array<HaulageTradingTerms>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\HaulageTradingTerms>")
     * @JMS\Expose
     * @JMS\SerializedName("HaulageTradingTerms")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="HaulageTradingTerms", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getHaulageTradingTerms", setter="setHaulageTradingTerms")
     */
    private $haulageTradingTerms;

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
     * @var null|array<PackagedTransportHandlingUnit>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\PackagedTransportHandlingUnit>")
     * @JMS\Expose
     * @JMS\SerializedName("PackagedTransportHandlingUnit")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PackagedTransportHandlingUnit", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getPackagedTransportHandlingUnit", setter="setPackagedTransportHandlingUnit")
     */
    private $packagedTransportHandlingUnit;

    /**
     * @var null|array<ServiceAllowanceCharge>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\ServiceAllowanceCharge>")
     * @JMS\Expose
     * @JMS\SerializedName("ServiceAllowanceCharge")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ServiceAllowanceCharge", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getServiceAllowanceCharge", setter="setServiceAllowanceCharge")
     */
    private $serviceAllowanceCharge;

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
     * @var null|array<AttachedTransportEquipment>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\AttachedTransportEquipment>")
     * @JMS\Expose
     * @JMS\SerializedName("AttachedTransportEquipment")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="AttachedTransportEquipment", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getAttachedTransportEquipment", setter="setAttachedTransportEquipment")
     */
    private $attachedTransportEquipment;

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
     * @var null|Pickup
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\Pickup")
     * @JMS\Expose
     * @JMS\SerializedName("Pickup")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPickup", setter="setPickup")
     */
    private $pickup;

    /**
     * @var null|Despatch
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\Despatch")
     * @JMS\Expose
     * @JMS\SerializedName("Despatch")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDespatch", setter="setDespatch")
     */
    private $despatch;

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
     * @var null|array<ContainedInTransportEquipment>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\ContainedInTransportEquipment>")
     * @JMS\Expose
     * @JMS\SerializedName("ContainedInTransportEquipment")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ContainedInTransportEquipment", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getContainedInTransportEquipment", setter="setContainedInTransportEquipment")
     */
    private $containedInTransportEquipment;

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
     * @return null|array<ReferencedConsignmentID>
     */
    public function getReferencedConsignmentID(): ?array
    {
        return $this->referencedConsignmentID;
    }

    /**
     * @param  null|array<ReferencedConsignmentID> $referencedConsignmentID
     * @return static
     */
    public function setReferencedConsignmentID(?array $referencedConsignmentID = null): static
    {
        $this->referencedConsignmentID = $referencedConsignmentID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetReferencedConsignmentID(): static
    {
        $this->referencedConsignmentID = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearReferencedConsignmentID(): static
    {
        $this->referencedConsignmentID = [];

        return $this;
    }

    /**
     * @return null|ReferencedConsignmentID
     */
    public function firstReferencedConsignmentID(): ?ReferencedConsignmentID
    {
        $referencedConsignmentID = $this->referencedConsignmentID ?? [];
        $referencedConsignmentID = reset($referencedConsignmentID);

        if (false === $referencedConsignmentID) {
            return null;
        }

        return $referencedConsignmentID;
    }

    /**
     * @return null|ReferencedConsignmentID
     */
    public function lastReferencedConsignmentID(): ?ReferencedConsignmentID
    {
        $referencedConsignmentID = $this->referencedConsignmentID ?? [];
        $referencedConsignmentID = end($referencedConsignmentID);

        if (false === $referencedConsignmentID) {
            return null;
        }

        return $referencedConsignmentID;
    }

    /**
     * @param  ReferencedConsignmentID $referencedConsignmentID
     * @return static
     */
    public function addToReferencedConsignmentID(ReferencedConsignmentID $referencedConsignmentID): static
    {
        $this->referencedConsignmentID[] = $referencedConsignmentID;

        return $this;
    }

    /**
     * @return ReferencedConsignmentID
     */
    public function addToReferencedConsignmentIDWithCreate(): ReferencedConsignmentID
    {
        $this->addToreferencedConsignmentID($referencedConsignmentID = new ReferencedConsignmentID());

        return $referencedConsignmentID;
    }

    /**
     * @param  ReferencedConsignmentID $referencedConsignmentID
     * @return static
     */
    public function addOnceToReferencedConsignmentID(ReferencedConsignmentID $referencedConsignmentID): static
    {
        if (!is_array($this->referencedConsignmentID)) {
            $this->referencedConsignmentID = [];
        }

        $this->referencedConsignmentID[0] = $referencedConsignmentID;

        return $this;
    }

    /**
     * @return ReferencedConsignmentID
     */
    public function addOnceToReferencedConsignmentIDWithCreate(): ReferencedConsignmentID
    {
        if (!is_array($this->referencedConsignmentID)) {
            $this->referencedConsignmentID = [];
        }

        if ([] === $this->referencedConsignmentID) {
            $this->addOnceToreferencedConsignmentID(new ReferencedConsignmentID());
        }

        return $this->referencedConsignmentID[0];
    }

    /**
     * @return null|TransportEquipmentTypeCode
     */
    public function getTransportEquipmentTypeCode(): ?TransportEquipmentTypeCode
    {
        return $this->transportEquipmentTypeCode;
    }

    /**
     * @return TransportEquipmentTypeCode
     */
    public function getTransportEquipmentTypeCodeWithCreate(): TransportEquipmentTypeCode
    {
        $this->transportEquipmentTypeCode = is_null($this->transportEquipmentTypeCode) ? new TransportEquipmentTypeCode() : $this->transportEquipmentTypeCode;

        return $this->transportEquipmentTypeCode;
    }

    /**
     * @param  null|TransportEquipmentTypeCode $transportEquipmentTypeCode
     * @return static
     */
    public function setTransportEquipmentTypeCode(
        ?TransportEquipmentTypeCode $transportEquipmentTypeCode = null,
    ): static {
        $this->transportEquipmentTypeCode = $transportEquipmentTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTransportEquipmentTypeCode(): static
    {
        $this->transportEquipmentTypeCode = null;

        return $this;
    }

    /**
     * @return null|ProviderTypeCode
     */
    public function getProviderTypeCode(): ?ProviderTypeCode
    {
        return $this->providerTypeCode;
    }

    /**
     * @return ProviderTypeCode
     */
    public function getProviderTypeCodeWithCreate(): ProviderTypeCode
    {
        $this->providerTypeCode = is_null($this->providerTypeCode) ? new ProviderTypeCode() : $this->providerTypeCode;

        return $this->providerTypeCode;
    }

    /**
     * @param  null|ProviderTypeCode $providerTypeCode
     * @return static
     */
    public function setProviderTypeCode(?ProviderTypeCode $providerTypeCode = null): static
    {
        $this->providerTypeCode = $providerTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetProviderTypeCode(): static
    {
        $this->providerTypeCode = null;

        return $this;
    }

    /**
     * @return null|OwnerTypeCode
     */
    public function getOwnerTypeCode(): ?OwnerTypeCode
    {
        return $this->ownerTypeCode;
    }

    /**
     * @return OwnerTypeCode
     */
    public function getOwnerTypeCodeWithCreate(): OwnerTypeCode
    {
        $this->ownerTypeCode = is_null($this->ownerTypeCode) ? new OwnerTypeCode() : $this->ownerTypeCode;

        return $this->ownerTypeCode;
    }

    /**
     * @param  null|OwnerTypeCode $ownerTypeCode
     * @return static
     */
    public function setOwnerTypeCode(?OwnerTypeCode $ownerTypeCode = null): static
    {
        $this->ownerTypeCode = $ownerTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetOwnerTypeCode(): static
    {
        $this->ownerTypeCode = null;

        return $this;
    }

    /**
     * @return null|SizeTypeCode
     */
    public function getSizeTypeCode(): ?SizeTypeCode
    {
        return $this->sizeTypeCode;
    }

    /**
     * @return SizeTypeCode
     */
    public function getSizeTypeCodeWithCreate(): SizeTypeCode
    {
        $this->sizeTypeCode = is_null($this->sizeTypeCode) ? new SizeTypeCode() : $this->sizeTypeCode;

        return $this->sizeTypeCode;
    }

    /**
     * @param  null|SizeTypeCode $sizeTypeCode
     * @return static
     */
    public function setSizeTypeCode(?SizeTypeCode $sizeTypeCode = null): static
    {
        $this->sizeTypeCode = $sizeTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSizeTypeCode(): static
    {
        $this->sizeTypeCode = null;

        return $this;
    }

    /**
     * @return null|DispositionCode
     */
    public function getDispositionCode(): ?DispositionCode
    {
        return $this->dispositionCode;
    }

    /**
     * @return DispositionCode
     */
    public function getDispositionCodeWithCreate(): DispositionCode
    {
        $this->dispositionCode = is_null($this->dispositionCode) ? new DispositionCode() : $this->dispositionCode;

        return $this->dispositionCode;
    }

    /**
     * @param  null|DispositionCode $dispositionCode
     * @return static
     */
    public function setDispositionCode(?DispositionCode $dispositionCode = null): static
    {
        $this->dispositionCode = $dispositionCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDispositionCode(): static
    {
        $this->dispositionCode = null;

        return $this;
    }

    /**
     * @return null|FullnessIndicationCode
     */
    public function getFullnessIndicationCode(): ?FullnessIndicationCode
    {
        return $this->fullnessIndicationCode;
    }

    /**
     * @return FullnessIndicationCode
     */
    public function getFullnessIndicationCodeWithCreate(): FullnessIndicationCode
    {
        $this->fullnessIndicationCode = is_null($this->fullnessIndicationCode) ? new FullnessIndicationCode() : $this->fullnessIndicationCode;

        return $this->fullnessIndicationCode;
    }

    /**
     * @param  null|FullnessIndicationCode $fullnessIndicationCode
     * @return static
     */
    public function setFullnessIndicationCode(?FullnessIndicationCode $fullnessIndicationCode = null): static
    {
        $this->fullnessIndicationCode = $fullnessIndicationCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetFullnessIndicationCode(): static
    {
        $this->fullnessIndicationCode = null;

        return $this;
    }

    /**
     * @return null|bool
     */
    public function getRefrigerationOnIndicator(): ?bool
    {
        return $this->refrigerationOnIndicator;
    }

    /**
     * @param  null|bool $refrigerationOnIndicator
     * @return static
     */
    public function setRefrigerationOnIndicator(?bool $refrigerationOnIndicator = null): static
    {
        $this->refrigerationOnIndicator = $refrigerationOnIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRefrigerationOnIndicator(): static
    {
        $this->refrigerationOnIndicator = null;

        return $this;
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
     * @return null|bool
     */
    public function getReturnabilityIndicator(): ?bool
    {
        return $this->returnabilityIndicator;
    }

    /**
     * @param  null|bool $returnabilityIndicator
     * @return static
     */
    public function setReturnabilityIndicator(?bool $returnabilityIndicator = null): static
    {
        $this->returnabilityIndicator = $returnabilityIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetReturnabilityIndicator(): static
    {
        $this->returnabilityIndicator = null;

        return $this;
    }

    /**
     * @return null|bool
     */
    public function getLegalStatusIndicator(): ?bool
    {
        return $this->legalStatusIndicator;
    }

    /**
     * @param  null|bool $legalStatusIndicator
     * @return static
     */
    public function setLegalStatusIndicator(?bool $legalStatusIndicator = null): static
    {
        $this->legalStatusIndicator = $legalStatusIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLegalStatusIndicator(): static
    {
        $this->legalStatusIndicator = null;

        return $this;
    }

    /**
     * @return null|AirFlowPercent
     */
    public function getAirFlowPercent(): ?AirFlowPercent
    {
        return $this->airFlowPercent;
    }

    /**
     * @return AirFlowPercent
     */
    public function getAirFlowPercentWithCreate(): AirFlowPercent
    {
        $this->airFlowPercent = is_null($this->airFlowPercent) ? new AirFlowPercent() : $this->airFlowPercent;

        return $this->airFlowPercent;
    }

    /**
     * @param  null|AirFlowPercent $airFlowPercent
     * @return static
     */
    public function setAirFlowPercent(?AirFlowPercent $airFlowPercent = null): static
    {
        $this->airFlowPercent = $airFlowPercent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAirFlowPercent(): static
    {
        $this->airFlowPercent = null;

        return $this;
    }

    /**
     * @return null|HumidityPercent
     */
    public function getHumidityPercent(): ?HumidityPercent
    {
        return $this->humidityPercent;
    }

    /**
     * @return HumidityPercent
     */
    public function getHumidityPercentWithCreate(): HumidityPercent
    {
        $this->humidityPercent = is_null($this->humidityPercent) ? new HumidityPercent() : $this->humidityPercent;

        return $this->humidityPercent;
    }

    /**
     * @param  null|HumidityPercent $humidityPercent
     * @return static
     */
    public function setHumidityPercent(?HumidityPercent $humidityPercent = null): static
    {
        $this->humidityPercent = $humidityPercent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetHumidityPercent(): static
    {
        $this->humidityPercent = null;

        return $this;
    }

    /**
     * @return null|bool
     */
    public function getAnimalFoodApprovedIndicator(): ?bool
    {
        return $this->animalFoodApprovedIndicator;
    }

    /**
     * @param  null|bool $animalFoodApprovedIndicator
     * @return static
     */
    public function setAnimalFoodApprovedIndicator(?bool $animalFoodApprovedIndicator = null): static
    {
        $this->animalFoodApprovedIndicator = $animalFoodApprovedIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAnimalFoodApprovedIndicator(): static
    {
        $this->animalFoodApprovedIndicator = null;

        return $this;
    }

    /**
     * @return null|bool
     */
    public function getHumanFoodApprovedIndicator(): ?bool
    {
        return $this->humanFoodApprovedIndicator;
    }

    /**
     * @param  null|bool $humanFoodApprovedIndicator
     * @return static
     */
    public function setHumanFoodApprovedIndicator(?bool $humanFoodApprovedIndicator = null): static
    {
        $this->humanFoodApprovedIndicator = $humanFoodApprovedIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetHumanFoodApprovedIndicator(): static
    {
        $this->humanFoodApprovedIndicator = null;

        return $this;
    }

    /**
     * @return null|bool
     */
    public function getDangerousGoodsApprovedIndicator(): ?bool
    {
        return $this->dangerousGoodsApprovedIndicator;
    }

    /**
     * @param  null|bool $dangerousGoodsApprovedIndicator
     * @return static
     */
    public function setDangerousGoodsApprovedIndicator(?bool $dangerousGoodsApprovedIndicator = null): static
    {
        $this->dangerousGoodsApprovedIndicator = $dangerousGoodsApprovedIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDangerousGoodsApprovedIndicator(): static
    {
        $this->dangerousGoodsApprovedIndicator = null;

        return $this;
    }

    /**
     * @return null|bool
     */
    public function getRefrigeratedIndicator(): ?bool
    {
        return $this->refrigeratedIndicator;
    }

    /**
     * @param  null|bool $refrigeratedIndicator
     * @return static
     */
    public function setRefrigeratedIndicator(?bool $refrigeratedIndicator = null): static
    {
        $this->refrigeratedIndicator = $refrigeratedIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRefrigeratedIndicator(): static
    {
        $this->refrigeratedIndicator = null;

        return $this;
    }

    /**
     * @return null|Characteristics
     */
    public function getCharacteristics(): ?Characteristics
    {
        return $this->characteristics;
    }

    /**
     * @return Characteristics
     */
    public function getCharacteristicsWithCreate(): Characteristics
    {
        $this->characteristics = is_null($this->characteristics) ? new Characteristics() : $this->characteristics;

        return $this->characteristics;
    }

    /**
     * @param  null|Characteristics $characteristics
     * @return static
     */
    public function setCharacteristics(?Characteristics $characteristics = null): static
    {
        $this->characteristics = $characteristics;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCharacteristics(): static
    {
        $this->characteristics = null;

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
     * @return null|array<SpecialTransportRequirements>
     */
    public function getSpecialTransportRequirements(): ?array
    {
        return $this->specialTransportRequirements;
    }

    /**
     * @param  null|array<SpecialTransportRequirements> $specialTransportRequirements
     * @return static
     */
    public function setSpecialTransportRequirements(?array $specialTransportRequirements = null): static
    {
        $this->specialTransportRequirements = $specialTransportRequirements;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSpecialTransportRequirements(): static
    {
        $this->specialTransportRequirements = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearSpecialTransportRequirements(): static
    {
        $this->specialTransportRequirements = [];

        return $this;
    }

    /**
     * @return null|SpecialTransportRequirements
     */
    public function firstSpecialTransportRequirements(): ?SpecialTransportRequirements
    {
        $specialTransportRequirements = $this->specialTransportRequirements ?? [];
        $specialTransportRequirements = reset($specialTransportRequirements);

        if (false === $specialTransportRequirements) {
            return null;
        }

        return $specialTransportRequirements;
    }

    /**
     * @return null|SpecialTransportRequirements
     */
    public function lastSpecialTransportRequirements(): ?SpecialTransportRequirements
    {
        $specialTransportRequirements = $this->specialTransportRequirements ?? [];
        $specialTransportRequirements = end($specialTransportRequirements);

        if (false === $specialTransportRequirements) {
            return null;
        }

        return $specialTransportRequirements;
    }

    /**
     * @param  SpecialTransportRequirements $specialTransportRequirements
     * @return static
     */
    public function addToSpecialTransportRequirements(
        SpecialTransportRequirements $specialTransportRequirements,
    ): static {
        $this->specialTransportRequirements[] = $specialTransportRequirements;

        return $this;
    }

    /**
     * @return SpecialTransportRequirements
     */
    public function addToSpecialTransportRequirementsWithCreate(): SpecialTransportRequirements
    {
        $this->addTospecialTransportRequirements($specialTransportRequirements = new SpecialTransportRequirements());

        return $specialTransportRequirements;
    }

    /**
     * @param  SpecialTransportRequirements $specialTransportRequirements
     * @return static
     */
    public function addOnceToSpecialTransportRequirements(
        SpecialTransportRequirements $specialTransportRequirements,
    ): static {
        if (!is_array($this->specialTransportRequirements)) {
            $this->specialTransportRequirements = [];
        }

        $this->specialTransportRequirements[0] = $specialTransportRequirements;

        return $this;
    }

    /**
     * @return SpecialTransportRequirements
     */
    public function addOnceToSpecialTransportRequirementsWithCreate(): SpecialTransportRequirements
    {
        if (!is_array($this->specialTransportRequirements)) {
            $this->specialTransportRequirements = [];
        }

        if ([] === $this->specialTransportRequirements) {
            $this->addOnceTospecialTransportRequirements(new SpecialTransportRequirements());
        }

        return $this->specialTransportRequirements[0];
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
     * @return null|TareWeightMeasure
     */
    public function getTareWeightMeasure(): ?TareWeightMeasure
    {
        return $this->tareWeightMeasure;
    }

    /**
     * @return TareWeightMeasure
     */
    public function getTareWeightMeasureWithCreate(): TareWeightMeasure
    {
        $this->tareWeightMeasure = is_null($this->tareWeightMeasure) ? new TareWeightMeasure() : $this->tareWeightMeasure;

        return $this->tareWeightMeasure;
    }

    /**
     * @param  null|TareWeightMeasure $tareWeightMeasure
     * @return static
     */
    public function setTareWeightMeasure(?TareWeightMeasure $tareWeightMeasure = null): static
    {
        $this->tareWeightMeasure = $tareWeightMeasure;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTareWeightMeasure(): static
    {
        $this->tareWeightMeasure = null;

        return $this;
    }

    /**
     * @return null|TrackingDeviceCode
     */
    public function getTrackingDeviceCode(): ?TrackingDeviceCode
    {
        return $this->trackingDeviceCode;
    }

    /**
     * @return TrackingDeviceCode
     */
    public function getTrackingDeviceCodeWithCreate(): TrackingDeviceCode
    {
        $this->trackingDeviceCode = is_null($this->trackingDeviceCode) ? new TrackingDeviceCode() : $this->trackingDeviceCode;

        return $this->trackingDeviceCode;
    }

    /**
     * @param  null|TrackingDeviceCode $trackingDeviceCode
     * @return static
     */
    public function setTrackingDeviceCode(?TrackingDeviceCode $trackingDeviceCode = null): static
    {
        $this->trackingDeviceCode = $trackingDeviceCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTrackingDeviceCode(): static
    {
        $this->trackingDeviceCode = null;

        return $this;
    }

    /**
     * @return null|bool
     */
    public function getPowerIndicator(): ?bool
    {
        return $this->powerIndicator;
    }

    /**
     * @param  null|bool $powerIndicator
     * @return static
     */
    public function setPowerIndicator(?bool $powerIndicator = null): static
    {
        $this->powerIndicator = $powerIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPowerIndicator(): static
    {
        $this->powerIndicator = null;

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
     * @return null|array<TransportEquipmentSeal>
     */
    public function getTransportEquipmentSeal(): ?array
    {
        return $this->transportEquipmentSeal;
    }

    /**
     * @param  null|array<TransportEquipmentSeal> $transportEquipmentSeal
     * @return static
     */
    public function setTransportEquipmentSeal(?array $transportEquipmentSeal = null): static
    {
        $this->transportEquipmentSeal = $transportEquipmentSeal;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTransportEquipmentSeal(): static
    {
        $this->transportEquipmentSeal = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearTransportEquipmentSeal(): static
    {
        $this->transportEquipmentSeal = [];

        return $this;
    }

    /**
     * @return null|TransportEquipmentSeal
     */
    public function firstTransportEquipmentSeal(): ?TransportEquipmentSeal
    {
        $transportEquipmentSeal = $this->transportEquipmentSeal ?? [];
        $transportEquipmentSeal = reset($transportEquipmentSeal);

        if (false === $transportEquipmentSeal) {
            return null;
        }

        return $transportEquipmentSeal;
    }

    /**
     * @return null|TransportEquipmentSeal
     */
    public function lastTransportEquipmentSeal(): ?TransportEquipmentSeal
    {
        $transportEquipmentSeal = $this->transportEquipmentSeal ?? [];
        $transportEquipmentSeal = end($transportEquipmentSeal);

        if (false === $transportEquipmentSeal) {
            return null;
        }

        return $transportEquipmentSeal;
    }

    /**
     * @param  TransportEquipmentSeal $transportEquipmentSeal
     * @return static
     */
    public function addToTransportEquipmentSeal(TransportEquipmentSeal $transportEquipmentSeal): static
    {
        $this->transportEquipmentSeal[] = $transportEquipmentSeal;

        return $this;
    }

    /**
     * @return TransportEquipmentSeal
     */
    public function addToTransportEquipmentSealWithCreate(): TransportEquipmentSeal
    {
        $this->addTotransportEquipmentSeal($transportEquipmentSeal = new TransportEquipmentSeal());

        return $transportEquipmentSeal;
    }

    /**
     * @param  TransportEquipmentSeal $transportEquipmentSeal
     * @return static
     */
    public function addOnceToTransportEquipmentSeal(TransportEquipmentSeal $transportEquipmentSeal): static
    {
        if (!is_array($this->transportEquipmentSeal)) {
            $this->transportEquipmentSeal = [];
        }

        $this->transportEquipmentSeal[0] = $transportEquipmentSeal;

        return $this;
    }

    /**
     * @return TransportEquipmentSeal
     */
    public function addOnceToTransportEquipmentSealWithCreate(): TransportEquipmentSeal
    {
        if (!is_array($this->transportEquipmentSeal)) {
            $this->transportEquipmentSeal = [];
        }

        if ([] === $this->transportEquipmentSeal) {
            $this->addOnceTotransportEquipmentSeal(new TransportEquipmentSeal());
        }

        return $this->transportEquipmentSeal[0];
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
     * @return null|ProviderParty
     */
    public function getProviderParty(): ?ProviderParty
    {
        return $this->providerParty;
    }

    /**
     * @return ProviderParty
     */
    public function getProviderPartyWithCreate(): ProviderParty
    {
        $this->providerParty = is_null($this->providerParty) ? new ProviderParty() : $this->providerParty;

        return $this->providerParty;
    }

    /**
     * @param  null|ProviderParty $providerParty
     * @return static
     */
    public function setProviderParty(?ProviderParty $providerParty = null): static
    {
        $this->providerParty = $providerParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetProviderParty(): static
    {
        $this->providerParty = null;

        return $this;
    }

    /**
     * @return null|LoadingProofParty
     */
    public function getLoadingProofParty(): ?LoadingProofParty
    {
        return $this->loadingProofParty;
    }

    /**
     * @return LoadingProofParty
     */
    public function getLoadingProofPartyWithCreate(): LoadingProofParty
    {
        $this->loadingProofParty = is_null($this->loadingProofParty) ? new LoadingProofParty() : $this->loadingProofParty;

        return $this->loadingProofParty;
    }

    /**
     * @param  null|LoadingProofParty $loadingProofParty
     * @return static
     */
    public function setLoadingProofParty(?LoadingProofParty $loadingProofParty = null): static
    {
        $this->loadingProofParty = $loadingProofParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLoadingProofParty(): static
    {
        $this->loadingProofParty = null;

        return $this;
    }

    /**
     * @return null|SupplierParty
     */
    public function getSupplierParty(): ?SupplierParty
    {
        return $this->supplierParty;
    }

    /**
     * @return SupplierParty
     */
    public function getSupplierPartyWithCreate(): SupplierParty
    {
        $this->supplierParty = is_null($this->supplierParty) ? new SupplierParty() : $this->supplierParty;

        return $this->supplierParty;
    }

    /**
     * @param  null|SupplierParty $supplierParty
     * @return static
     */
    public function setSupplierParty(?SupplierParty $supplierParty = null): static
    {
        $this->supplierParty = $supplierParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSupplierParty(): static
    {
        $this->supplierParty = null;

        return $this;
    }

    /**
     * @return null|OwnerParty
     */
    public function getOwnerParty(): ?OwnerParty
    {
        return $this->ownerParty;
    }

    /**
     * @return OwnerParty
     */
    public function getOwnerPartyWithCreate(): OwnerParty
    {
        $this->ownerParty = is_null($this->ownerParty) ? new OwnerParty() : $this->ownerParty;

        return $this->ownerParty;
    }

    /**
     * @param  null|OwnerParty $ownerParty
     * @return static
     */
    public function setOwnerParty(?OwnerParty $ownerParty = null): static
    {
        $this->ownerParty = $ownerParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetOwnerParty(): static
    {
        $this->ownerParty = null;

        return $this;
    }

    /**
     * @return null|OperatingParty
     */
    public function getOperatingParty(): ?OperatingParty
    {
        return $this->operatingParty;
    }

    /**
     * @return OperatingParty
     */
    public function getOperatingPartyWithCreate(): OperatingParty
    {
        $this->operatingParty = is_null($this->operatingParty) ? new OperatingParty() : $this->operatingParty;

        return $this->operatingParty;
    }

    /**
     * @param  null|OperatingParty $operatingParty
     * @return static
     */
    public function setOperatingParty(?OperatingParty $operatingParty = null): static
    {
        $this->operatingParty = $operatingParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetOperatingParty(): static
    {
        $this->operatingParty = null;

        return $this;
    }

    /**
     * @return null|LoadingLocation
     */
    public function getLoadingLocation(): ?LoadingLocation
    {
        return $this->loadingLocation;
    }

    /**
     * @return LoadingLocation
     */
    public function getLoadingLocationWithCreate(): LoadingLocation
    {
        $this->loadingLocation = is_null($this->loadingLocation) ? new LoadingLocation() : $this->loadingLocation;

        return $this->loadingLocation;
    }

    /**
     * @param  null|LoadingLocation $loadingLocation
     * @return static
     */
    public function setLoadingLocation(?LoadingLocation $loadingLocation = null): static
    {
        $this->loadingLocation = $loadingLocation;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLoadingLocation(): static
    {
        $this->loadingLocation = null;

        return $this;
    }

    /**
     * @return null|UnloadingLocation
     */
    public function getUnloadingLocation(): ?UnloadingLocation
    {
        return $this->unloadingLocation;
    }

    /**
     * @return UnloadingLocation
     */
    public function getUnloadingLocationWithCreate(): UnloadingLocation
    {
        $this->unloadingLocation = is_null($this->unloadingLocation) ? new UnloadingLocation() : $this->unloadingLocation;

        return $this->unloadingLocation;
    }

    /**
     * @param  null|UnloadingLocation $unloadingLocation
     * @return static
     */
    public function setUnloadingLocation(?UnloadingLocation $unloadingLocation = null): static
    {
        $this->unloadingLocation = $unloadingLocation;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetUnloadingLocation(): static
    {
        $this->unloadingLocation = null;

        return $this;
    }

    /**
     * @return null|StorageLocation
     */
    public function getStorageLocation(): ?StorageLocation
    {
        return $this->storageLocation;
    }

    /**
     * @return StorageLocation
     */
    public function getStorageLocationWithCreate(): StorageLocation
    {
        $this->storageLocation = is_null($this->storageLocation) ? new StorageLocation() : $this->storageLocation;

        return $this->storageLocation;
    }

    /**
     * @param  null|StorageLocation $storageLocation
     * @return static
     */
    public function setStorageLocation(?StorageLocation $storageLocation = null): static
    {
        $this->storageLocation = $storageLocation;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetStorageLocation(): static
    {
        $this->storageLocation = null;

        return $this;
    }

    /**
     * @return null|array<PositioningTransportEvent>
     */
    public function getPositioningTransportEvent(): ?array
    {
        return $this->positioningTransportEvent;
    }

    /**
     * @param  null|array<PositioningTransportEvent> $positioningTransportEvent
     * @return static
     */
    public function setPositioningTransportEvent(?array $positioningTransportEvent = null): static
    {
        $this->positioningTransportEvent = $positioningTransportEvent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPositioningTransportEvent(): static
    {
        $this->positioningTransportEvent = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearPositioningTransportEvent(): static
    {
        $this->positioningTransportEvent = [];

        return $this;
    }

    /**
     * @return null|PositioningTransportEvent
     */
    public function firstPositioningTransportEvent(): ?PositioningTransportEvent
    {
        $positioningTransportEvent = $this->positioningTransportEvent ?? [];
        $positioningTransportEvent = reset($positioningTransportEvent);

        if (false === $positioningTransportEvent) {
            return null;
        }

        return $positioningTransportEvent;
    }

    /**
     * @return null|PositioningTransportEvent
     */
    public function lastPositioningTransportEvent(): ?PositioningTransportEvent
    {
        $positioningTransportEvent = $this->positioningTransportEvent ?? [];
        $positioningTransportEvent = end($positioningTransportEvent);

        if (false === $positioningTransportEvent) {
            return null;
        }

        return $positioningTransportEvent;
    }

    /**
     * @param  PositioningTransportEvent $positioningTransportEvent
     * @return static
     */
    public function addToPositioningTransportEvent(PositioningTransportEvent $positioningTransportEvent): static
    {
        $this->positioningTransportEvent[] = $positioningTransportEvent;

        return $this;
    }

    /**
     * @return PositioningTransportEvent
     */
    public function addToPositioningTransportEventWithCreate(): PositioningTransportEvent
    {
        $this->addTopositioningTransportEvent($positioningTransportEvent = new PositioningTransportEvent());

        return $positioningTransportEvent;
    }

    /**
     * @param  PositioningTransportEvent $positioningTransportEvent
     * @return static
     */
    public function addOnceToPositioningTransportEvent(PositioningTransportEvent $positioningTransportEvent): static
    {
        if (!is_array($this->positioningTransportEvent)) {
            $this->positioningTransportEvent = [];
        }

        $this->positioningTransportEvent[0] = $positioningTransportEvent;

        return $this;
    }

    /**
     * @return PositioningTransportEvent
     */
    public function addOnceToPositioningTransportEventWithCreate(): PositioningTransportEvent
    {
        if (!is_array($this->positioningTransportEvent)) {
            $this->positioningTransportEvent = [];
        }

        if ([] === $this->positioningTransportEvent) {
            $this->addOnceTopositioningTransportEvent(new PositioningTransportEvent());
        }

        return $this->positioningTransportEvent[0];
    }

    /**
     * @return null|array<QuarantineTransportEvent>
     */
    public function getQuarantineTransportEvent(): ?array
    {
        return $this->quarantineTransportEvent;
    }

    /**
     * @param  null|array<QuarantineTransportEvent> $quarantineTransportEvent
     * @return static
     */
    public function setQuarantineTransportEvent(?array $quarantineTransportEvent = null): static
    {
        $this->quarantineTransportEvent = $quarantineTransportEvent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetQuarantineTransportEvent(): static
    {
        $this->quarantineTransportEvent = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearQuarantineTransportEvent(): static
    {
        $this->quarantineTransportEvent = [];

        return $this;
    }

    /**
     * @return null|QuarantineTransportEvent
     */
    public function firstQuarantineTransportEvent(): ?QuarantineTransportEvent
    {
        $quarantineTransportEvent = $this->quarantineTransportEvent ?? [];
        $quarantineTransportEvent = reset($quarantineTransportEvent);

        if (false === $quarantineTransportEvent) {
            return null;
        }

        return $quarantineTransportEvent;
    }

    /**
     * @return null|QuarantineTransportEvent
     */
    public function lastQuarantineTransportEvent(): ?QuarantineTransportEvent
    {
        $quarantineTransportEvent = $this->quarantineTransportEvent ?? [];
        $quarantineTransportEvent = end($quarantineTransportEvent);

        if (false === $quarantineTransportEvent) {
            return null;
        }

        return $quarantineTransportEvent;
    }

    /**
     * @param  QuarantineTransportEvent $quarantineTransportEvent
     * @return static
     */
    public function addToQuarantineTransportEvent(QuarantineTransportEvent $quarantineTransportEvent): static
    {
        $this->quarantineTransportEvent[] = $quarantineTransportEvent;

        return $this;
    }

    /**
     * @return QuarantineTransportEvent
     */
    public function addToQuarantineTransportEventWithCreate(): QuarantineTransportEvent
    {
        $this->addToquarantineTransportEvent($quarantineTransportEvent = new QuarantineTransportEvent());

        return $quarantineTransportEvent;
    }

    /**
     * @param  QuarantineTransportEvent $quarantineTransportEvent
     * @return static
     */
    public function addOnceToQuarantineTransportEvent(QuarantineTransportEvent $quarantineTransportEvent): static
    {
        if (!is_array($this->quarantineTransportEvent)) {
            $this->quarantineTransportEvent = [];
        }

        $this->quarantineTransportEvent[0] = $quarantineTransportEvent;

        return $this;
    }

    /**
     * @return QuarantineTransportEvent
     */
    public function addOnceToQuarantineTransportEventWithCreate(): QuarantineTransportEvent
    {
        if (!is_array($this->quarantineTransportEvent)) {
            $this->quarantineTransportEvent = [];
        }

        if ([] === $this->quarantineTransportEvent) {
            $this->addOnceToquarantineTransportEvent(new QuarantineTransportEvent());
        }

        return $this->quarantineTransportEvent[0];
    }

    /**
     * @return null|array<DeliveryTransportEvent>
     */
    public function getDeliveryTransportEvent(): ?array
    {
        return $this->deliveryTransportEvent;
    }

    /**
     * @param  null|array<DeliveryTransportEvent> $deliveryTransportEvent
     * @return static
     */
    public function setDeliveryTransportEvent(?array $deliveryTransportEvent = null): static
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
     * @return static
     */
    public function clearDeliveryTransportEvent(): static
    {
        $this->deliveryTransportEvent = [];

        return $this;
    }

    /**
     * @return null|DeliveryTransportEvent
     */
    public function firstDeliveryTransportEvent(): ?DeliveryTransportEvent
    {
        $deliveryTransportEvent = $this->deliveryTransportEvent ?? [];
        $deliveryTransportEvent = reset($deliveryTransportEvent);

        if (false === $deliveryTransportEvent) {
            return null;
        }

        return $deliveryTransportEvent;
    }

    /**
     * @return null|DeliveryTransportEvent
     */
    public function lastDeliveryTransportEvent(): ?DeliveryTransportEvent
    {
        $deliveryTransportEvent = $this->deliveryTransportEvent ?? [];
        $deliveryTransportEvent = end($deliveryTransportEvent);

        if (false === $deliveryTransportEvent) {
            return null;
        }

        return $deliveryTransportEvent;
    }

    /**
     * @param  DeliveryTransportEvent $deliveryTransportEvent
     * @return static
     */
    public function addToDeliveryTransportEvent(DeliveryTransportEvent $deliveryTransportEvent): static
    {
        $this->deliveryTransportEvent[] = $deliveryTransportEvent;

        return $this;
    }

    /**
     * @return DeliveryTransportEvent
     */
    public function addToDeliveryTransportEventWithCreate(): DeliveryTransportEvent
    {
        $this->addTodeliveryTransportEvent($deliveryTransportEvent = new DeliveryTransportEvent());

        return $deliveryTransportEvent;
    }

    /**
     * @param  DeliveryTransportEvent $deliveryTransportEvent
     * @return static
     */
    public function addOnceToDeliveryTransportEvent(DeliveryTransportEvent $deliveryTransportEvent): static
    {
        if (!is_array($this->deliveryTransportEvent)) {
            $this->deliveryTransportEvent = [];
        }

        $this->deliveryTransportEvent[0] = $deliveryTransportEvent;

        return $this;
    }

    /**
     * @return DeliveryTransportEvent
     */
    public function addOnceToDeliveryTransportEventWithCreate(): DeliveryTransportEvent
    {
        if (!is_array($this->deliveryTransportEvent)) {
            $this->deliveryTransportEvent = [];
        }

        if ([] === $this->deliveryTransportEvent) {
            $this->addOnceTodeliveryTransportEvent(new DeliveryTransportEvent());
        }

        return $this->deliveryTransportEvent[0];
    }

    /**
     * @return null|array<PickupTransportEvent>
     */
    public function getPickupTransportEvent(): ?array
    {
        return $this->pickupTransportEvent;
    }

    /**
     * @param  null|array<PickupTransportEvent> $pickupTransportEvent
     * @return static
     */
    public function setPickupTransportEvent(?array $pickupTransportEvent = null): static
    {
        $this->pickupTransportEvent = $pickupTransportEvent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPickupTransportEvent(): static
    {
        $this->pickupTransportEvent = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearPickupTransportEvent(): static
    {
        $this->pickupTransportEvent = [];

        return $this;
    }

    /**
     * @return null|PickupTransportEvent
     */
    public function firstPickupTransportEvent(): ?PickupTransportEvent
    {
        $pickupTransportEvent = $this->pickupTransportEvent ?? [];
        $pickupTransportEvent = reset($pickupTransportEvent);

        if (false === $pickupTransportEvent) {
            return null;
        }

        return $pickupTransportEvent;
    }

    /**
     * @return null|PickupTransportEvent
     */
    public function lastPickupTransportEvent(): ?PickupTransportEvent
    {
        $pickupTransportEvent = $this->pickupTransportEvent ?? [];
        $pickupTransportEvent = end($pickupTransportEvent);

        if (false === $pickupTransportEvent) {
            return null;
        }

        return $pickupTransportEvent;
    }

    /**
     * @param  PickupTransportEvent $pickupTransportEvent
     * @return static
     */
    public function addToPickupTransportEvent(PickupTransportEvent $pickupTransportEvent): static
    {
        $this->pickupTransportEvent[] = $pickupTransportEvent;

        return $this;
    }

    /**
     * @return PickupTransportEvent
     */
    public function addToPickupTransportEventWithCreate(): PickupTransportEvent
    {
        $this->addTopickupTransportEvent($pickupTransportEvent = new PickupTransportEvent());

        return $pickupTransportEvent;
    }

    /**
     * @param  PickupTransportEvent $pickupTransportEvent
     * @return static
     */
    public function addOnceToPickupTransportEvent(PickupTransportEvent $pickupTransportEvent): static
    {
        if (!is_array($this->pickupTransportEvent)) {
            $this->pickupTransportEvent = [];
        }

        $this->pickupTransportEvent[0] = $pickupTransportEvent;

        return $this;
    }

    /**
     * @return PickupTransportEvent
     */
    public function addOnceToPickupTransportEventWithCreate(): PickupTransportEvent
    {
        if (!is_array($this->pickupTransportEvent)) {
            $this->pickupTransportEvent = [];
        }

        if ([] === $this->pickupTransportEvent) {
            $this->addOnceTopickupTransportEvent(new PickupTransportEvent());
        }

        return $this->pickupTransportEvent[0];
    }

    /**
     * @return null|array<HandlingTransportEvent>
     */
    public function getHandlingTransportEvent(): ?array
    {
        return $this->handlingTransportEvent;
    }

    /**
     * @param  null|array<HandlingTransportEvent> $handlingTransportEvent
     * @return static
     */
    public function setHandlingTransportEvent(?array $handlingTransportEvent = null): static
    {
        $this->handlingTransportEvent = $handlingTransportEvent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetHandlingTransportEvent(): static
    {
        $this->handlingTransportEvent = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearHandlingTransportEvent(): static
    {
        $this->handlingTransportEvent = [];

        return $this;
    }

    /**
     * @return null|HandlingTransportEvent
     */
    public function firstHandlingTransportEvent(): ?HandlingTransportEvent
    {
        $handlingTransportEvent = $this->handlingTransportEvent ?? [];
        $handlingTransportEvent = reset($handlingTransportEvent);

        if (false === $handlingTransportEvent) {
            return null;
        }

        return $handlingTransportEvent;
    }

    /**
     * @return null|HandlingTransportEvent
     */
    public function lastHandlingTransportEvent(): ?HandlingTransportEvent
    {
        $handlingTransportEvent = $this->handlingTransportEvent ?? [];
        $handlingTransportEvent = end($handlingTransportEvent);

        if (false === $handlingTransportEvent) {
            return null;
        }

        return $handlingTransportEvent;
    }

    /**
     * @param  HandlingTransportEvent $handlingTransportEvent
     * @return static
     */
    public function addToHandlingTransportEvent(HandlingTransportEvent $handlingTransportEvent): static
    {
        $this->handlingTransportEvent[] = $handlingTransportEvent;

        return $this;
    }

    /**
     * @return HandlingTransportEvent
     */
    public function addToHandlingTransportEventWithCreate(): HandlingTransportEvent
    {
        $this->addTohandlingTransportEvent($handlingTransportEvent = new HandlingTransportEvent());

        return $handlingTransportEvent;
    }

    /**
     * @param  HandlingTransportEvent $handlingTransportEvent
     * @return static
     */
    public function addOnceToHandlingTransportEvent(HandlingTransportEvent $handlingTransportEvent): static
    {
        if (!is_array($this->handlingTransportEvent)) {
            $this->handlingTransportEvent = [];
        }

        $this->handlingTransportEvent[0] = $handlingTransportEvent;

        return $this;
    }

    /**
     * @return HandlingTransportEvent
     */
    public function addOnceToHandlingTransportEventWithCreate(): HandlingTransportEvent
    {
        if (!is_array($this->handlingTransportEvent)) {
            $this->handlingTransportEvent = [];
        }

        if ([] === $this->handlingTransportEvent) {
            $this->addOnceTohandlingTransportEvent(new HandlingTransportEvent());
        }

        return $this->handlingTransportEvent[0];
    }

    /**
     * @return null|array<LoadingTransportEvent>
     */
    public function getLoadingTransportEvent(): ?array
    {
        return $this->loadingTransportEvent;
    }

    /**
     * @param  null|array<LoadingTransportEvent> $loadingTransportEvent
     * @return static
     */
    public function setLoadingTransportEvent(?array $loadingTransportEvent = null): static
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
     * @return static
     */
    public function clearLoadingTransportEvent(): static
    {
        $this->loadingTransportEvent = [];

        return $this;
    }

    /**
     * @return null|LoadingTransportEvent
     */
    public function firstLoadingTransportEvent(): ?LoadingTransportEvent
    {
        $loadingTransportEvent = $this->loadingTransportEvent ?? [];
        $loadingTransportEvent = reset($loadingTransportEvent);

        if (false === $loadingTransportEvent) {
            return null;
        }

        return $loadingTransportEvent;
    }

    /**
     * @return null|LoadingTransportEvent
     */
    public function lastLoadingTransportEvent(): ?LoadingTransportEvent
    {
        $loadingTransportEvent = $this->loadingTransportEvent ?? [];
        $loadingTransportEvent = end($loadingTransportEvent);

        if (false === $loadingTransportEvent) {
            return null;
        }

        return $loadingTransportEvent;
    }

    /**
     * @param  LoadingTransportEvent $loadingTransportEvent
     * @return static
     */
    public function addToLoadingTransportEvent(LoadingTransportEvent $loadingTransportEvent): static
    {
        $this->loadingTransportEvent[] = $loadingTransportEvent;

        return $this;
    }

    /**
     * @return LoadingTransportEvent
     */
    public function addToLoadingTransportEventWithCreate(): LoadingTransportEvent
    {
        $this->addToloadingTransportEvent($loadingTransportEvent = new LoadingTransportEvent());

        return $loadingTransportEvent;
    }

    /**
     * @param  LoadingTransportEvent $loadingTransportEvent
     * @return static
     */
    public function addOnceToLoadingTransportEvent(LoadingTransportEvent $loadingTransportEvent): static
    {
        if (!is_array($this->loadingTransportEvent)) {
            $this->loadingTransportEvent = [];
        }

        $this->loadingTransportEvent[0] = $loadingTransportEvent;

        return $this;
    }

    /**
     * @return LoadingTransportEvent
     */
    public function addOnceToLoadingTransportEventWithCreate(): LoadingTransportEvent
    {
        if (!is_array($this->loadingTransportEvent)) {
            $this->loadingTransportEvent = [];
        }

        if ([] === $this->loadingTransportEvent) {
            $this->addOnceToloadingTransportEvent(new LoadingTransportEvent());
        }

        return $this->loadingTransportEvent[0];
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
     * @return null|ApplicableTransportMeans
     */
    public function getApplicableTransportMeans(): ?ApplicableTransportMeans
    {
        return $this->applicableTransportMeans;
    }

    /**
     * @return ApplicableTransportMeans
     */
    public function getApplicableTransportMeansWithCreate(): ApplicableTransportMeans
    {
        $this->applicableTransportMeans = is_null($this->applicableTransportMeans) ? new ApplicableTransportMeans() : $this->applicableTransportMeans;

        return $this->applicableTransportMeans;
    }

    /**
     * @param  null|ApplicableTransportMeans $applicableTransportMeans
     * @return static
     */
    public function setApplicableTransportMeans(?ApplicableTransportMeans $applicableTransportMeans = null): static
    {
        $this->applicableTransportMeans = $applicableTransportMeans;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetApplicableTransportMeans(): static
    {
        $this->applicableTransportMeans = null;

        return $this;
    }

    /**
     * @return null|array<HaulageTradingTerms>
     */
    public function getHaulageTradingTerms(): ?array
    {
        return $this->haulageTradingTerms;
    }

    /**
     * @param  null|array<HaulageTradingTerms> $haulageTradingTerms
     * @return static
     */
    public function setHaulageTradingTerms(?array $haulageTradingTerms = null): static
    {
        $this->haulageTradingTerms = $haulageTradingTerms;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetHaulageTradingTerms(): static
    {
        $this->haulageTradingTerms = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearHaulageTradingTerms(): static
    {
        $this->haulageTradingTerms = [];

        return $this;
    }

    /**
     * @return null|HaulageTradingTerms
     */
    public function firstHaulageTradingTerms(): ?HaulageTradingTerms
    {
        $haulageTradingTerms = $this->haulageTradingTerms ?? [];
        $haulageTradingTerms = reset($haulageTradingTerms);

        if (false === $haulageTradingTerms) {
            return null;
        }

        return $haulageTradingTerms;
    }

    /**
     * @return null|HaulageTradingTerms
     */
    public function lastHaulageTradingTerms(): ?HaulageTradingTerms
    {
        $haulageTradingTerms = $this->haulageTradingTerms ?? [];
        $haulageTradingTerms = end($haulageTradingTerms);

        if (false === $haulageTradingTerms) {
            return null;
        }

        return $haulageTradingTerms;
    }

    /**
     * @param  HaulageTradingTerms $haulageTradingTerms
     * @return static
     */
    public function addToHaulageTradingTerms(HaulageTradingTerms $haulageTradingTerms): static
    {
        $this->haulageTradingTerms[] = $haulageTradingTerms;

        return $this;
    }

    /**
     * @return HaulageTradingTerms
     */
    public function addToHaulageTradingTermsWithCreate(): HaulageTradingTerms
    {
        $this->addTohaulageTradingTerms($haulageTradingTerms = new HaulageTradingTerms());

        return $haulageTradingTerms;
    }

    /**
     * @param  HaulageTradingTerms $haulageTradingTerms
     * @return static
     */
    public function addOnceToHaulageTradingTerms(HaulageTradingTerms $haulageTradingTerms): static
    {
        if (!is_array($this->haulageTradingTerms)) {
            $this->haulageTradingTerms = [];
        }

        $this->haulageTradingTerms[0] = $haulageTradingTerms;

        return $this;
    }

    /**
     * @return HaulageTradingTerms
     */
    public function addOnceToHaulageTradingTermsWithCreate(): HaulageTradingTerms
    {
        if (!is_array($this->haulageTradingTerms)) {
            $this->haulageTradingTerms = [];
        }

        if ([] === $this->haulageTradingTerms) {
            $this->addOnceTohaulageTradingTerms(new HaulageTradingTerms());
        }

        return $this->haulageTradingTerms[0];
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
     * @return null|array<PackagedTransportHandlingUnit>
     */
    public function getPackagedTransportHandlingUnit(): ?array
    {
        return $this->packagedTransportHandlingUnit;
    }

    /**
     * @param  null|array<PackagedTransportHandlingUnit> $packagedTransportHandlingUnit
     * @return static
     */
    public function setPackagedTransportHandlingUnit(?array $packagedTransportHandlingUnit = null): static
    {
        $this->packagedTransportHandlingUnit = $packagedTransportHandlingUnit;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPackagedTransportHandlingUnit(): static
    {
        $this->packagedTransportHandlingUnit = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearPackagedTransportHandlingUnit(): static
    {
        $this->packagedTransportHandlingUnit = [];

        return $this;
    }

    /**
     * @return null|PackagedTransportHandlingUnit
     */
    public function firstPackagedTransportHandlingUnit(): ?PackagedTransportHandlingUnit
    {
        $packagedTransportHandlingUnit = $this->packagedTransportHandlingUnit ?? [];
        $packagedTransportHandlingUnit = reset($packagedTransportHandlingUnit);

        if (false === $packagedTransportHandlingUnit) {
            return null;
        }

        return $packagedTransportHandlingUnit;
    }

    /**
     * @return null|PackagedTransportHandlingUnit
     */
    public function lastPackagedTransportHandlingUnit(): ?PackagedTransportHandlingUnit
    {
        $packagedTransportHandlingUnit = $this->packagedTransportHandlingUnit ?? [];
        $packagedTransportHandlingUnit = end($packagedTransportHandlingUnit);

        if (false === $packagedTransportHandlingUnit) {
            return null;
        }

        return $packagedTransportHandlingUnit;
    }

    /**
     * @param  PackagedTransportHandlingUnit $packagedTransportHandlingUnit
     * @return static
     */
    public function addToPackagedTransportHandlingUnit(
        PackagedTransportHandlingUnit $packagedTransportHandlingUnit,
    ): static {
        $this->packagedTransportHandlingUnit[] = $packagedTransportHandlingUnit;

        return $this;
    }

    /**
     * @return PackagedTransportHandlingUnit
     */
    public function addToPackagedTransportHandlingUnitWithCreate(): PackagedTransportHandlingUnit
    {
        $this->addTopackagedTransportHandlingUnit($packagedTransportHandlingUnit = new PackagedTransportHandlingUnit());

        return $packagedTransportHandlingUnit;
    }

    /**
     * @param  PackagedTransportHandlingUnit $packagedTransportHandlingUnit
     * @return static
     */
    public function addOnceToPackagedTransportHandlingUnit(
        PackagedTransportHandlingUnit $packagedTransportHandlingUnit,
    ): static {
        if (!is_array($this->packagedTransportHandlingUnit)) {
            $this->packagedTransportHandlingUnit = [];
        }

        $this->packagedTransportHandlingUnit[0] = $packagedTransportHandlingUnit;

        return $this;
    }

    /**
     * @return PackagedTransportHandlingUnit
     */
    public function addOnceToPackagedTransportHandlingUnitWithCreate(): PackagedTransportHandlingUnit
    {
        if (!is_array($this->packagedTransportHandlingUnit)) {
            $this->packagedTransportHandlingUnit = [];
        }

        if ([] === $this->packagedTransportHandlingUnit) {
            $this->addOnceTopackagedTransportHandlingUnit(new PackagedTransportHandlingUnit());
        }

        return $this->packagedTransportHandlingUnit[0];
    }

    /**
     * @return null|array<ServiceAllowanceCharge>
     */
    public function getServiceAllowanceCharge(): ?array
    {
        return $this->serviceAllowanceCharge;
    }

    /**
     * @param  null|array<ServiceAllowanceCharge> $serviceAllowanceCharge
     * @return static
     */
    public function setServiceAllowanceCharge(?array $serviceAllowanceCharge = null): static
    {
        $this->serviceAllowanceCharge = $serviceAllowanceCharge;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetServiceAllowanceCharge(): static
    {
        $this->serviceAllowanceCharge = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearServiceAllowanceCharge(): static
    {
        $this->serviceAllowanceCharge = [];

        return $this;
    }

    /**
     * @return null|ServiceAllowanceCharge
     */
    public function firstServiceAllowanceCharge(): ?ServiceAllowanceCharge
    {
        $serviceAllowanceCharge = $this->serviceAllowanceCharge ?? [];
        $serviceAllowanceCharge = reset($serviceAllowanceCharge);

        if (false === $serviceAllowanceCharge) {
            return null;
        }

        return $serviceAllowanceCharge;
    }

    /**
     * @return null|ServiceAllowanceCharge
     */
    public function lastServiceAllowanceCharge(): ?ServiceAllowanceCharge
    {
        $serviceAllowanceCharge = $this->serviceAllowanceCharge ?? [];
        $serviceAllowanceCharge = end($serviceAllowanceCharge);

        if (false === $serviceAllowanceCharge) {
            return null;
        }

        return $serviceAllowanceCharge;
    }

    /**
     * @param  ServiceAllowanceCharge $serviceAllowanceCharge
     * @return static
     */
    public function addToServiceAllowanceCharge(ServiceAllowanceCharge $serviceAllowanceCharge): static
    {
        $this->serviceAllowanceCharge[] = $serviceAllowanceCharge;

        return $this;
    }

    /**
     * @return ServiceAllowanceCharge
     */
    public function addToServiceAllowanceChargeWithCreate(): ServiceAllowanceCharge
    {
        $this->addToserviceAllowanceCharge($serviceAllowanceCharge = new ServiceAllowanceCharge());

        return $serviceAllowanceCharge;
    }

    /**
     * @param  ServiceAllowanceCharge $serviceAllowanceCharge
     * @return static
     */
    public function addOnceToServiceAllowanceCharge(ServiceAllowanceCharge $serviceAllowanceCharge): static
    {
        if (!is_array($this->serviceAllowanceCharge)) {
            $this->serviceAllowanceCharge = [];
        }

        $this->serviceAllowanceCharge[0] = $serviceAllowanceCharge;

        return $this;
    }

    /**
     * @return ServiceAllowanceCharge
     */
    public function addOnceToServiceAllowanceChargeWithCreate(): ServiceAllowanceCharge
    {
        if (!is_array($this->serviceAllowanceCharge)) {
            $this->serviceAllowanceCharge = [];
        }

        if ([] === $this->serviceAllowanceCharge) {
            $this->addOnceToserviceAllowanceCharge(new ServiceAllowanceCharge());
        }

        return $this->serviceAllowanceCharge[0];
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
     * @return null|array<AttachedTransportEquipment>
     */
    public function getAttachedTransportEquipment(): ?array
    {
        return $this->attachedTransportEquipment;
    }

    /**
     * @param  null|array<AttachedTransportEquipment> $attachedTransportEquipment
     * @return static
     */
    public function setAttachedTransportEquipment(?array $attachedTransportEquipment = null): static
    {
        $this->attachedTransportEquipment = $attachedTransportEquipment;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAttachedTransportEquipment(): static
    {
        $this->attachedTransportEquipment = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearAttachedTransportEquipment(): static
    {
        $this->attachedTransportEquipment = [];

        return $this;
    }

    /**
     * @return null|AttachedTransportEquipment
     */
    public function firstAttachedTransportEquipment(): ?AttachedTransportEquipment
    {
        $attachedTransportEquipment = $this->attachedTransportEquipment ?? [];
        $attachedTransportEquipment = reset($attachedTransportEquipment);

        if (false === $attachedTransportEquipment) {
            return null;
        }

        return $attachedTransportEquipment;
    }

    /**
     * @return null|AttachedTransportEquipment
     */
    public function lastAttachedTransportEquipment(): ?AttachedTransportEquipment
    {
        $attachedTransportEquipment = $this->attachedTransportEquipment ?? [];
        $attachedTransportEquipment = end($attachedTransportEquipment);

        if (false === $attachedTransportEquipment) {
            return null;
        }

        return $attachedTransportEquipment;
    }

    /**
     * @param  AttachedTransportEquipment $attachedTransportEquipment
     * @return static
     */
    public function addToAttachedTransportEquipment(AttachedTransportEquipment $attachedTransportEquipment): static
    {
        $this->attachedTransportEquipment[] = $attachedTransportEquipment;

        return $this;
    }

    /**
     * @return AttachedTransportEquipment
     */
    public function addToAttachedTransportEquipmentWithCreate(): AttachedTransportEquipment
    {
        $this->addToattachedTransportEquipment($attachedTransportEquipment = new AttachedTransportEquipment());

        return $attachedTransportEquipment;
    }

    /**
     * @param  AttachedTransportEquipment $attachedTransportEquipment
     * @return static
     */
    public function addOnceToAttachedTransportEquipment(AttachedTransportEquipment $attachedTransportEquipment): static
    {
        if (!is_array($this->attachedTransportEquipment)) {
            $this->attachedTransportEquipment = [];
        }

        $this->attachedTransportEquipment[0] = $attachedTransportEquipment;

        return $this;
    }

    /**
     * @return AttachedTransportEquipment
     */
    public function addOnceToAttachedTransportEquipmentWithCreate(): AttachedTransportEquipment
    {
        if (!is_array($this->attachedTransportEquipment)) {
            $this->attachedTransportEquipment = [];
        }

        if ([] === $this->attachedTransportEquipment) {
            $this->addOnceToattachedTransportEquipment(new AttachedTransportEquipment());
        }

        return $this->attachedTransportEquipment[0];
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
     * @return null|array<ContainedInTransportEquipment>
     */
    public function getContainedInTransportEquipment(): ?array
    {
        return $this->containedInTransportEquipment;
    }

    /**
     * @param  null|array<ContainedInTransportEquipment> $containedInTransportEquipment
     * @return static
     */
    public function setContainedInTransportEquipment(?array $containedInTransportEquipment = null): static
    {
        $this->containedInTransportEquipment = $containedInTransportEquipment;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetContainedInTransportEquipment(): static
    {
        $this->containedInTransportEquipment = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearContainedInTransportEquipment(): static
    {
        $this->containedInTransportEquipment = [];

        return $this;
    }

    /**
     * @return null|ContainedInTransportEquipment
     */
    public function firstContainedInTransportEquipment(): ?ContainedInTransportEquipment
    {
        $containedInTransportEquipment = $this->containedInTransportEquipment ?? [];
        $containedInTransportEquipment = reset($containedInTransportEquipment);

        if (false === $containedInTransportEquipment) {
            return null;
        }

        return $containedInTransportEquipment;
    }

    /**
     * @return null|ContainedInTransportEquipment
     */
    public function lastContainedInTransportEquipment(): ?ContainedInTransportEquipment
    {
        $containedInTransportEquipment = $this->containedInTransportEquipment ?? [];
        $containedInTransportEquipment = end($containedInTransportEquipment);

        if (false === $containedInTransportEquipment) {
            return null;
        }

        return $containedInTransportEquipment;
    }

    /**
     * @param  ContainedInTransportEquipment $containedInTransportEquipment
     * @return static
     */
    public function addToContainedInTransportEquipment(
        ContainedInTransportEquipment $containedInTransportEquipment,
    ): static {
        $this->containedInTransportEquipment[] = $containedInTransportEquipment;

        return $this;
    }

    /**
     * @return ContainedInTransportEquipment
     */
    public function addToContainedInTransportEquipmentWithCreate(): ContainedInTransportEquipment
    {
        $this->addTocontainedInTransportEquipment($containedInTransportEquipment = new ContainedInTransportEquipment());

        return $containedInTransportEquipment;
    }

    /**
     * @param  ContainedInTransportEquipment $containedInTransportEquipment
     * @return static
     */
    public function addOnceToContainedInTransportEquipment(
        ContainedInTransportEquipment $containedInTransportEquipment,
    ): static {
        if (!is_array($this->containedInTransportEquipment)) {
            $this->containedInTransportEquipment = [];
        }

        $this->containedInTransportEquipment[0] = $containedInTransportEquipment;

        return $this;
    }

    /**
     * @return ContainedInTransportEquipment
     */
    public function addOnceToContainedInTransportEquipmentWithCreate(): ContainedInTransportEquipment
    {
        if (!is_array($this->containedInTransportEquipment)) {
            $this->containedInTransportEquipment = [];
        }

        if ([] === $this->containedInTransportEquipment) {
            $this->addOnceTocontainedInTransportEquipment(new ContainedInTransportEquipment());
        }

        return $this->containedInTransportEquipment[0];
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
}
