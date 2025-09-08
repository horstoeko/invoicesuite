<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\AirFlowPercent;
use horstoeko\invoicesuite\models\ubl\cbc\Characteristics;
use horstoeko\invoicesuite\models\ubl\cbc\DamageRemarks;
use horstoeko\invoicesuite\models\ubl\cbc\Description;
use horstoeko\invoicesuite\models\ubl\cbc\DispositionCode;
use horstoeko\invoicesuite\models\ubl\cbc\FullnessIndicationCode;
use horstoeko\invoicesuite\models\ubl\cbc\GrossVolumeMeasure;
use horstoeko\invoicesuite\models\ubl\cbc\GrossWeightMeasure;
use horstoeko\invoicesuite\models\ubl\cbc\HumidityPercent;
use horstoeko\invoicesuite\models\ubl\cbc\ID;
use horstoeko\invoicesuite\models\ubl\cbc\Information;
use horstoeko\invoicesuite\models\ubl\cbc\OwnerTypeCode;
use horstoeko\invoicesuite\models\ubl\cbc\ProviderTypeCode;
use horstoeko\invoicesuite\models\ubl\cbc\ReferencedConsignmentID;
use horstoeko\invoicesuite\models\ubl\cbc\SizeTypeCode;
use horstoeko\invoicesuite\models\ubl\cbc\SpecialTransportRequirements;
use horstoeko\invoicesuite\models\ubl\cbc\TareWeightMeasure;
use horstoeko\invoicesuite\models\ubl\cbc\TraceID;
use horstoeko\invoicesuite\models\ubl\cbc\TrackingDeviceCode;
use horstoeko\invoicesuite\models\ubl\cbc\TransportEquipmentTypeCode;

class TransportEquipmentType
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
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\ReferencedConsignmentID>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\ReferencedConsignmentID>")
     * @JMS\Expose
     * @JMS\SerializedName("ReferencedConsignmentID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ReferencedConsignmentID", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getReferencedConsignmentID", setter="setReferencedConsignmentID")
     */
    private $referencedConsignmentID;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\TransportEquipmentTypeCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\TransportEquipmentTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("TransportEquipmentTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTransportEquipmentTypeCode", setter="setTransportEquipmentTypeCode")
     */
    private $transportEquipmentTypeCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ProviderTypeCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ProviderTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("ProviderTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getProviderTypeCode", setter="setProviderTypeCode")
     */
    private $providerTypeCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\OwnerTypeCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\OwnerTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("OwnerTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOwnerTypeCode", setter="setOwnerTypeCode")
     */
    private $ownerTypeCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\SizeTypeCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\SizeTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("SizeTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSizeTypeCode", setter="setSizeTypeCode")
     */
    private $sizeTypeCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\DispositionCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\DispositionCode")
     * @JMS\Expose
     * @JMS\SerializedName("DispositionCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDispositionCode", setter="setDispositionCode")
     */
    private $dispositionCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\FullnessIndicationCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\FullnessIndicationCode")
     * @JMS\Expose
     * @JMS\SerializedName("FullnessIndicationCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getFullnessIndicationCode", setter="setFullnessIndicationCode")
     */
    private $fullnessIndicationCode;

    /**
     * @var bool|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("RefrigerationOnIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRefrigerationOnIndicator", setter="setRefrigerationOnIndicator")
     */
    private $refrigerationOnIndicator;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\Information>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\Information>")
     * @JMS\Expose
     * @JMS\SerializedName("Information")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Information", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getInformation", setter="setInformation")
     */
    private $information;

    /**
     * @var bool|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("ReturnabilityIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getReturnabilityIndicator", setter="setReturnabilityIndicator")
     */
    private $returnabilityIndicator;

    /**
     * @var bool|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("LegalStatusIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLegalStatusIndicator", setter="setLegalStatusIndicator")
     */
    private $legalStatusIndicator;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\AirFlowPercent|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\AirFlowPercent")
     * @JMS\Expose
     * @JMS\SerializedName("AirFlowPercent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAirFlowPercent", setter="setAirFlowPercent")
     */
    private $airFlowPercent;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\HumidityPercent|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\HumidityPercent")
     * @JMS\Expose
     * @JMS\SerializedName("HumidityPercent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getHumidityPercent", setter="setHumidityPercent")
     */
    private $humidityPercent;

    /**
     * @var bool|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("AnimalFoodApprovedIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAnimalFoodApprovedIndicator", setter="setAnimalFoodApprovedIndicator")
     */
    private $animalFoodApprovedIndicator;

    /**
     * @var bool|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("HumanFoodApprovedIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getHumanFoodApprovedIndicator", setter="setHumanFoodApprovedIndicator")
     */
    private $humanFoodApprovedIndicator;

    /**
     * @var bool|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("DangerousGoodsApprovedIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDangerousGoodsApprovedIndicator", setter="setDangerousGoodsApprovedIndicator")
     */
    private $dangerousGoodsApprovedIndicator;

    /**
     * @var bool|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("RefrigeratedIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRefrigeratedIndicator", setter="setRefrigeratedIndicator")
     */
    private $refrigeratedIndicator;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\Characteristics|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\Characteristics")
     * @JMS\Expose
     * @JMS\SerializedName("Characteristics")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCharacteristics", setter="setCharacteristics")
     */
    private $characteristics;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\DamageRemarks>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\DamageRemarks>")
     * @JMS\Expose
     * @JMS\SerializedName("DamageRemarks")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="DamageRemarks", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getDamageRemarks", setter="setDamageRemarks")
     */
    private $damageRemarks;

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
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\SpecialTransportRequirements>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\SpecialTransportRequirements>")
     * @JMS\Expose
     * @JMS\SerializedName("SpecialTransportRequirements")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="SpecialTransportRequirements", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getSpecialTransportRequirements", setter="setSpecialTransportRequirements")
     */
    private $specialTransportRequirements;

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
     * @var \horstoeko\invoicesuite\models\ubl\cbc\TareWeightMeasure|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\TareWeightMeasure")
     * @JMS\Expose
     * @JMS\SerializedName("TareWeightMeasure")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTareWeightMeasure", setter="setTareWeightMeasure")
     */
    private $tareWeightMeasure;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\TrackingDeviceCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\TrackingDeviceCode")
     * @JMS\Expose
     * @JMS\SerializedName("TrackingDeviceCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTrackingDeviceCode", setter="setTrackingDeviceCode")
     */
    private $trackingDeviceCode;

    /**
     * @var bool|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("PowerIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPowerIndicator", setter="setPowerIndicator")
     */
    private $powerIndicator;

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
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\TransportEquipmentSeal>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\TransportEquipmentSeal>")
     * @JMS\Expose
     * @JMS\SerializedName("TransportEquipmentSeal")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TransportEquipmentSeal", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getTransportEquipmentSeal", setter="setTransportEquipmentSeal")
     */
    private $transportEquipmentSeal;

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
     * @var \horstoeko\invoicesuite\models\ubl\cac\ProviderParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\ProviderParty")
     * @JMS\Expose
     * @JMS\SerializedName("ProviderParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getProviderParty", setter="setProviderParty")
     */
    private $providerParty;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\LoadingProofParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\LoadingProofParty")
     * @JMS\Expose
     * @JMS\SerializedName("LoadingProofParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLoadingProofParty", setter="setLoadingProofParty")
     */
    private $loadingProofParty;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\SupplierParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\SupplierParty")
     * @JMS\Expose
     * @JMS\SerializedName("SupplierParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSupplierParty", setter="setSupplierParty")
     */
    private $supplierParty;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\OwnerParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\OwnerParty")
     * @JMS\Expose
     * @JMS\SerializedName("OwnerParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOwnerParty", setter="setOwnerParty")
     */
    private $ownerParty;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\OperatingParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\OperatingParty")
     * @JMS\Expose
     * @JMS\SerializedName("OperatingParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOperatingParty", setter="setOperatingParty")
     */
    private $operatingParty;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\LoadingLocation|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\LoadingLocation")
     * @JMS\Expose
     * @JMS\SerializedName("LoadingLocation")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLoadingLocation", setter="setLoadingLocation")
     */
    private $loadingLocation;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\UnloadingLocation|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\UnloadingLocation")
     * @JMS\Expose
     * @JMS\SerializedName("UnloadingLocation")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getUnloadingLocation", setter="setUnloadingLocation")
     */
    private $unloadingLocation;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\StorageLocation|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\StorageLocation")
     * @JMS\Expose
     * @JMS\SerializedName("StorageLocation")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getStorageLocation", setter="setStorageLocation")
     */
    private $storageLocation;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\PositioningTransportEvent>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\PositioningTransportEvent>")
     * @JMS\Expose
     * @JMS\SerializedName("PositioningTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PositioningTransportEvent", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getPositioningTransportEvent", setter="setPositioningTransportEvent")
     */
    private $positioningTransportEvent;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\QuarantineTransportEvent>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\QuarantineTransportEvent>")
     * @JMS\Expose
     * @JMS\SerializedName("QuarantineTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="QuarantineTransportEvent", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getQuarantineTransportEvent", setter="setQuarantineTransportEvent")
     */
    private $quarantineTransportEvent;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\DeliveryTransportEvent>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\DeliveryTransportEvent>")
     * @JMS\Expose
     * @JMS\SerializedName("DeliveryTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="DeliveryTransportEvent", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getDeliveryTransportEvent", setter="setDeliveryTransportEvent")
     */
    private $deliveryTransportEvent;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\PickupTransportEvent>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\PickupTransportEvent>")
     * @JMS\Expose
     * @JMS\SerializedName("PickupTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PickupTransportEvent", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getPickupTransportEvent", setter="setPickupTransportEvent")
     */
    private $pickupTransportEvent;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\HandlingTransportEvent>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\HandlingTransportEvent>")
     * @JMS\Expose
     * @JMS\SerializedName("HandlingTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="HandlingTransportEvent", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getHandlingTransportEvent", setter="setHandlingTransportEvent")
     */
    private $handlingTransportEvent;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\LoadingTransportEvent>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\LoadingTransportEvent>")
     * @JMS\Expose
     * @JMS\SerializedName("LoadingTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="LoadingTransportEvent", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getLoadingTransportEvent", setter="setLoadingTransportEvent")
     */
    private $loadingTransportEvent;

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
     * @var \horstoeko\invoicesuite\models\ubl\cac\ApplicableTransportMeans|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\ApplicableTransportMeans")
     * @JMS\Expose
     * @JMS\SerializedName("ApplicableTransportMeans")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getApplicableTransportMeans", setter="setApplicableTransportMeans")
     */
    private $applicableTransportMeans;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\HaulageTradingTerms>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\HaulageTradingTerms>")
     * @JMS\Expose
     * @JMS\SerializedName("HaulageTradingTerms")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="HaulageTradingTerms", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getHaulageTradingTerms", setter="setHaulageTradingTerms")
     */
    private $haulageTradingTerms;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\HazardousGoodsTransit>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\HazardousGoodsTransit>")
     * @JMS\Expose
     * @JMS\SerializedName("HazardousGoodsTransit")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="HazardousGoodsTransit", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getHazardousGoodsTransit", setter="setHazardousGoodsTransit")
     */
    private $hazardousGoodsTransit;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\PackagedTransportHandlingUnit>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\PackagedTransportHandlingUnit>")
     * @JMS\Expose
     * @JMS\SerializedName("PackagedTransportHandlingUnit")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PackagedTransportHandlingUnit", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getPackagedTransportHandlingUnit", setter="setPackagedTransportHandlingUnit")
     */
    private $packagedTransportHandlingUnit;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\ServiceAllowanceCharge>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\ServiceAllowanceCharge>")
     * @JMS\Expose
     * @JMS\SerializedName("ServiceAllowanceCharge")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ServiceAllowanceCharge", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getServiceAllowanceCharge", setter="setServiceAllowanceCharge")
     */
    private $serviceAllowanceCharge;

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
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\AttachedTransportEquipment>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\AttachedTransportEquipment>")
     * @JMS\Expose
     * @JMS\SerializedName("AttachedTransportEquipment")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="AttachedTransportEquipment", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getAttachedTransportEquipment", setter="setAttachedTransportEquipment")
     */
    private $attachedTransportEquipment;

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
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\ShipmentDocumentReference>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\ShipmentDocumentReference>")
     * @JMS\Expose
     * @JMS\SerializedName("ShipmentDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ShipmentDocumentReference", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getShipmentDocumentReference", setter="setShipmentDocumentReference")
     */
    private $shipmentDocumentReference;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\ContainedInTransportEquipment>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\ContainedInTransportEquipment>")
     * @JMS\Expose
     * @JMS\SerializedName("ContainedInTransportEquipment")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ContainedInTransportEquipment", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getContainedInTransportEquipment", setter="setContainedInTransportEquipment")
     */
    private $containedInTransportEquipment;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\Package>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\Package>")
     * @JMS\Expose
     * @JMS\SerializedName("Package")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Package", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getPackage", setter="setPackage")
     */
    private $package;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\GoodsItem>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\GoodsItem>")
     * @JMS\Expose
     * @JMS\SerializedName("GoodsItem")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="GoodsItem", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getGoodsItem", setter="setGoodsItem")
     */
    private $goodsItem;

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
     * @return self
     */
    public function unsetID(): self
    {
        $this->iD = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\ReferencedConsignmentID>|null
     */
    public function getReferencedConsignmentID(): ?array
    {
        return $this->referencedConsignmentID;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\ReferencedConsignmentID>|null $referencedConsignmentID
     * @return self
     */
    public function setReferencedConsignmentID(?array $referencedConsignmentID = null): self
    {
        $this->referencedConsignmentID = $referencedConsignmentID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetReferencedConsignmentID(): self
    {
        $this->referencedConsignmentID = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearReferencedConsignmentID(): self
    {
        $this->referencedConsignmentID = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ReferencedConsignmentID $referencedConsignmentID
     * @return self
     */
    public function addToReferencedConsignmentID(ReferencedConsignmentID $referencedConsignmentID): self
    {
        $this->referencedConsignmentID[] = $referencedConsignmentID;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ReferencedConsignmentID
     */
    public function addToReferencedConsignmentIDWithCreate(): ReferencedConsignmentID
    {
        $this->addToreferencedConsignmentID($referencedConsignmentID = new ReferencedConsignmentID());

        return $referencedConsignmentID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ReferencedConsignmentID $referencedConsignmentID
     * @return self
     */
    public function addOnceToReferencedConsignmentID(ReferencedConsignmentID $referencedConsignmentID): self
    {
        if (!is_array($this->referencedConsignmentID)) {
            $this->referencedConsignmentID = [];
        }

        $this->referencedConsignmentID[0] = $referencedConsignmentID;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ReferencedConsignmentID
     */
    public function addOnceToReferencedConsignmentIDWithCreate(): ReferencedConsignmentID
    {
        if (!is_array($this->referencedConsignmentID)) {
            $this->referencedConsignmentID = [];
        }

        if ($this->referencedConsignmentID === []) {
            $this->addOnceToreferencedConsignmentID(new ReferencedConsignmentID());
        }

        return $this->referencedConsignmentID[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TransportEquipmentTypeCode|null
     */
    public function getTransportEquipmentTypeCode(): ?TransportEquipmentTypeCode
    {
        return $this->transportEquipmentTypeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TransportEquipmentTypeCode
     */
    public function getTransportEquipmentTypeCodeWithCreate(): TransportEquipmentTypeCode
    {
        $this->transportEquipmentTypeCode = is_null($this->transportEquipmentTypeCode) ? new TransportEquipmentTypeCode() : $this->transportEquipmentTypeCode;

        return $this->transportEquipmentTypeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\TransportEquipmentTypeCode|null $transportEquipmentTypeCode
     * @return self
     */
    public function setTransportEquipmentTypeCode(
        ?TransportEquipmentTypeCode $transportEquipmentTypeCode = null,
    ): self {
        $this->transportEquipmentTypeCode = $transportEquipmentTypeCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTransportEquipmentTypeCode(): self
    {
        $this->transportEquipmentTypeCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ProviderTypeCode|null
     */
    public function getProviderTypeCode(): ?ProviderTypeCode
    {
        return $this->providerTypeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ProviderTypeCode
     */
    public function getProviderTypeCodeWithCreate(): ProviderTypeCode
    {
        $this->providerTypeCode = is_null($this->providerTypeCode) ? new ProviderTypeCode() : $this->providerTypeCode;

        return $this->providerTypeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ProviderTypeCode|null $providerTypeCode
     * @return self
     */
    public function setProviderTypeCode(?ProviderTypeCode $providerTypeCode = null): self
    {
        $this->providerTypeCode = $providerTypeCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetProviderTypeCode(): self
    {
        $this->providerTypeCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\OwnerTypeCode|null
     */
    public function getOwnerTypeCode(): ?OwnerTypeCode
    {
        return $this->ownerTypeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\OwnerTypeCode
     */
    public function getOwnerTypeCodeWithCreate(): OwnerTypeCode
    {
        $this->ownerTypeCode = is_null($this->ownerTypeCode) ? new OwnerTypeCode() : $this->ownerTypeCode;

        return $this->ownerTypeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\OwnerTypeCode|null $ownerTypeCode
     * @return self
     */
    public function setOwnerTypeCode(?OwnerTypeCode $ownerTypeCode = null): self
    {
        $this->ownerTypeCode = $ownerTypeCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetOwnerTypeCode(): self
    {
        $this->ownerTypeCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\SizeTypeCode|null
     */
    public function getSizeTypeCode(): ?SizeTypeCode
    {
        return $this->sizeTypeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\SizeTypeCode
     */
    public function getSizeTypeCodeWithCreate(): SizeTypeCode
    {
        $this->sizeTypeCode = is_null($this->sizeTypeCode) ? new SizeTypeCode() : $this->sizeTypeCode;

        return $this->sizeTypeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\SizeTypeCode|null $sizeTypeCode
     * @return self
     */
    public function setSizeTypeCode(?SizeTypeCode $sizeTypeCode = null): self
    {
        $this->sizeTypeCode = $sizeTypeCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSizeTypeCode(): self
    {
        $this->sizeTypeCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\DispositionCode|null
     */
    public function getDispositionCode(): ?DispositionCode
    {
        return $this->dispositionCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\DispositionCode
     */
    public function getDispositionCodeWithCreate(): DispositionCode
    {
        $this->dispositionCode = is_null($this->dispositionCode) ? new DispositionCode() : $this->dispositionCode;

        return $this->dispositionCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\DispositionCode|null $dispositionCode
     * @return self
     */
    public function setDispositionCode(?DispositionCode $dispositionCode = null): self
    {
        $this->dispositionCode = $dispositionCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDispositionCode(): self
    {
        $this->dispositionCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\FullnessIndicationCode|null
     */
    public function getFullnessIndicationCode(): ?FullnessIndicationCode
    {
        return $this->fullnessIndicationCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\FullnessIndicationCode
     */
    public function getFullnessIndicationCodeWithCreate(): FullnessIndicationCode
    {
        $this->fullnessIndicationCode = is_null($this->fullnessIndicationCode) ? new FullnessIndicationCode() : $this->fullnessIndicationCode;

        return $this->fullnessIndicationCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\FullnessIndicationCode|null $fullnessIndicationCode
     * @return self
     */
    public function setFullnessIndicationCode(?FullnessIndicationCode $fullnessIndicationCode = null): self
    {
        $this->fullnessIndicationCode = $fullnessIndicationCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetFullnessIndicationCode(): self
    {
        $this->fullnessIndicationCode = null;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getRefrigerationOnIndicator(): ?bool
    {
        return $this->refrigerationOnIndicator;
    }

    /**
     * @param bool|null $refrigerationOnIndicator
     * @return self
     */
    public function setRefrigerationOnIndicator(?bool $refrigerationOnIndicator = null): self
    {
        $this->refrigerationOnIndicator = $refrigerationOnIndicator;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetRefrigerationOnIndicator(): self
    {
        $this->refrigerationOnIndicator = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\Information>|null
     */
    public function getInformation(): ?array
    {
        return $this->information;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\Information>|null $information
     * @return self
     */
    public function setInformation(?array $information = null): self
    {
        $this->information = $information;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetInformation(): self
    {
        $this->information = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearInformation(): self
    {
        $this->information = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Information $information
     * @return self
     */
    public function addToInformation(Information $information): self
    {
        $this->information[] = $information;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Information
     */
    public function addToInformationWithCreate(): Information
    {
        $this->addToinformation($information = new Information());

        return $information;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Information $information
     * @return self
     */
    public function addOnceToInformation(Information $information): self
    {
        if (!is_array($this->information)) {
            $this->information = [];
        }

        $this->information[0] = $information;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Information
     */
    public function addOnceToInformationWithCreate(): Information
    {
        if (!is_array($this->information)) {
            $this->information = [];
        }

        if ($this->information === []) {
            $this->addOnceToinformation(new Information());
        }

        return $this->information[0];
    }

    /**
     * @return bool|null
     */
    public function getReturnabilityIndicator(): ?bool
    {
        return $this->returnabilityIndicator;
    }

    /**
     * @param bool|null $returnabilityIndicator
     * @return self
     */
    public function setReturnabilityIndicator(?bool $returnabilityIndicator = null): self
    {
        $this->returnabilityIndicator = $returnabilityIndicator;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetReturnabilityIndicator(): self
    {
        $this->returnabilityIndicator = null;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getLegalStatusIndicator(): ?bool
    {
        return $this->legalStatusIndicator;
    }

    /**
     * @param bool|null $legalStatusIndicator
     * @return self
     */
    public function setLegalStatusIndicator(?bool $legalStatusIndicator = null): self
    {
        $this->legalStatusIndicator = $legalStatusIndicator;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetLegalStatusIndicator(): self
    {
        $this->legalStatusIndicator = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\AirFlowPercent|null
     */
    public function getAirFlowPercent(): ?AirFlowPercent
    {
        return $this->airFlowPercent;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\AirFlowPercent
     */
    public function getAirFlowPercentWithCreate(): AirFlowPercent
    {
        $this->airFlowPercent = is_null($this->airFlowPercent) ? new AirFlowPercent() : $this->airFlowPercent;

        return $this->airFlowPercent;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\AirFlowPercent|null $airFlowPercent
     * @return self
     */
    public function setAirFlowPercent(?AirFlowPercent $airFlowPercent = null): self
    {
        $this->airFlowPercent = $airFlowPercent;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetAirFlowPercent(): self
    {
        $this->airFlowPercent = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\HumidityPercent|null
     */
    public function getHumidityPercent(): ?HumidityPercent
    {
        return $this->humidityPercent;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\HumidityPercent
     */
    public function getHumidityPercentWithCreate(): HumidityPercent
    {
        $this->humidityPercent = is_null($this->humidityPercent) ? new HumidityPercent() : $this->humidityPercent;

        return $this->humidityPercent;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\HumidityPercent|null $humidityPercent
     * @return self
     */
    public function setHumidityPercent(?HumidityPercent $humidityPercent = null): self
    {
        $this->humidityPercent = $humidityPercent;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetHumidityPercent(): self
    {
        $this->humidityPercent = null;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getAnimalFoodApprovedIndicator(): ?bool
    {
        return $this->animalFoodApprovedIndicator;
    }

    /**
     * @param bool|null $animalFoodApprovedIndicator
     * @return self
     */
    public function setAnimalFoodApprovedIndicator(?bool $animalFoodApprovedIndicator = null): self
    {
        $this->animalFoodApprovedIndicator = $animalFoodApprovedIndicator;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetAnimalFoodApprovedIndicator(): self
    {
        $this->animalFoodApprovedIndicator = null;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getHumanFoodApprovedIndicator(): ?bool
    {
        return $this->humanFoodApprovedIndicator;
    }

    /**
     * @param bool|null $humanFoodApprovedIndicator
     * @return self
     */
    public function setHumanFoodApprovedIndicator(?bool $humanFoodApprovedIndicator = null): self
    {
        $this->humanFoodApprovedIndicator = $humanFoodApprovedIndicator;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetHumanFoodApprovedIndicator(): self
    {
        $this->humanFoodApprovedIndicator = null;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getDangerousGoodsApprovedIndicator(): ?bool
    {
        return $this->dangerousGoodsApprovedIndicator;
    }

    /**
     * @param bool|null $dangerousGoodsApprovedIndicator
     * @return self
     */
    public function setDangerousGoodsApprovedIndicator(?bool $dangerousGoodsApprovedIndicator = null): self
    {
        $this->dangerousGoodsApprovedIndicator = $dangerousGoodsApprovedIndicator;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDangerousGoodsApprovedIndicator(): self
    {
        $this->dangerousGoodsApprovedIndicator = null;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getRefrigeratedIndicator(): ?bool
    {
        return $this->refrigeratedIndicator;
    }

    /**
     * @param bool|null $refrigeratedIndicator
     * @return self
     */
    public function setRefrigeratedIndicator(?bool $refrigeratedIndicator = null): self
    {
        $this->refrigeratedIndicator = $refrigeratedIndicator;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetRefrigeratedIndicator(): self
    {
        $this->refrigeratedIndicator = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Characteristics|null
     */
    public function getCharacteristics(): ?Characteristics
    {
        return $this->characteristics;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Characteristics
     */
    public function getCharacteristicsWithCreate(): Characteristics
    {
        $this->characteristics = is_null($this->characteristics) ? new Characteristics() : $this->characteristics;

        return $this->characteristics;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Characteristics|null $characteristics
     * @return self
     */
    public function setCharacteristics(?Characteristics $characteristics = null): self
    {
        $this->characteristics = $characteristics;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetCharacteristics(): self
    {
        $this->characteristics = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\DamageRemarks>|null
     */
    public function getDamageRemarks(): ?array
    {
        return $this->damageRemarks;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\DamageRemarks>|null $damageRemarks
     * @return self
     */
    public function setDamageRemarks(?array $damageRemarks = null): self
    {
        $this->damageRemarks = $damageRemarks;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDamageRemarks(): self
    {
        $this->damageRemarks = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearDamageRemarks(): self
    {
        $this->damageRemarks = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\DamageRemarks $damageRemarks
     * @return self
     */
    public function addToDamageRemarks(DamageRemarks $damageRemarks): self
    {
        $this->damageRemarks[] = $damageRemarks;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\DamageRemarks
     */
    public function addToDamageRemarksWithCreate(): DamageRemarks
    {
        $this->addTodamageRemarks($damageRemarks = new DamageRemarks());

        return $damageRemarks;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\DamageRemarks $damageRemarks
     * @return self
     */
    public function addOnceToDamageRemarks(DamageRemarks $damageRemarks): self
    {
        if (!is_array($this->damageRemarks)) {
            $this->damageRemarks = [];
        }

        $this->damageRemarks[0] = $damageRemarks;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\DamageRemarks
     */
    public function addOnceToDamageRemarksWithCreate(): DamageRemarks
    {
        if (!is_array($this->damageRemarks)) {
            $this->damageRemarks = [];
        }

        if ($this->damageRemarks === []) {
            $this->addOnceTodamageRemarks(new DamageRemarks());
        }

        return $this->damageRemarks[0];
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
    public function unsetDescription(): self
    {
        $this->description = null;

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
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\SpecialTransportRequirements>|null
     */
    public function getSpecialTransportRequirements(): ?array
    {
        return $this->specialTransportRequirements;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\SpecialTransportRequirements>|null $specialTransportRequirements
     * @return self
     */
    public function setSpecialTransportRequirements(?array $specialTransportRequirements = null): self
    {
        $this->specialTransportRequirements = $specialTransportRequirements;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSpecialTransportRequirements(): self
    {
        $this->specialTransportRequirements = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearSpecialTransportRequirements(): self
    {
        $this->specialTransportRequirements = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\SpecialTransportRequirements $specialTransportRequirements
     * @return self
     */
    public function addToSpecialTransportRequirements(
        SpecialTransportRequirements $specialTransportRequirements,
    ): self {
        $this->specialTransportRequirements[] = $specialTransportRequirements;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\SpecialTransportRequirements
     */
    public function addToSpecialTransportRequirementsWithCreate(): SpecialTransportRequirements
    {
        $this->addTospecialTransportRequirements($specialTransportRequirements = new SpecialTransportRequirements());

        return $specialTransportRequirements;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\SpecialTransportRequirements $specialTransportRequirements
     * @return self
     */
    public function addOnceToSpecialTransportRequirements(
        SpecialTransportRequirements $specialTransportRequirements,
    ): self {
        if (!is_array($this->specialTransportRequirements)) {
            $this->specialTransportRequirements = [];
        }

        $this->specialTransportRequirements[0] = $specialTransportRequirements;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\SpecialTransportRequirements
     */
    public function addOnceToSpecialTransportRequirementsWithCreate(): SpecialTransportRequirements
    {
        if (!is_array($this->specialTransportRequirements)) {
            $this->specialTransportRequirements = [];
        }

        if ($this->specialTransportRequirements === []) {
            $this->addOnceTospecialTransportRequirements(new SpecialTransportRequirements());
        }

        return $this->specialTransportRequirements[0];
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
     * @return self
     */
    public function unsetGrossWeightMeasure(): self
    {
        $this->grossWeightMeasure = null;

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
     * @return self
     */
    public function unsetGrossVolumeMeasure(): self
    {
        $this->grossVolumeMeasure = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TareWeightMeasure|null
     */
    public function getTareWeightMeasure(): ?TareWeightMeasure
    {
        return $this->tareWeightMeasure;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TareWeightMeasure
     */
    public function getTareWeightMeasureWithCreate(): TareWeightMeasure
    {
        $this->tareWeightMeasure = is_null($this->tareWeightMeasure) ? new TareWeightMeasure() : $this->tareWeightMeasure;

        return $this->tareWeightMeasure;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\TareWeightMeasure|null $tareWeightMeasure
     * @return self
     */
    public function setTareWeightMeasure(?TareWeightMeasure $tareWeightMeasure = null): self
    {
        $this->tareWeightMeasure = $tareWeightMeasure;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTareWeightMeasure(): self
    {
        $this->tareWeightMeasure = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TrackingDeviceCode|null
     */
    public function getTrackingDeviceCode(): ?TrackingDeviceCode
    {
        return $this->trackingDeviceCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TrackingDeviceCode
     */
    public function getTrackingDeviceCodeWithCreate(): TrackingDeviceCode
    {
        $this->trackingDeviceCode = is_null($this->trackingDeviceCode) ? new TrackingDeviceCode() : $this->trackingDeviceCode;

        return $this->trackingDeviceCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\TrackingDeviceCode|null $trackingDeviceCode
     * @return self
     */
    public function setTrackingDeviceCode(?TrackingDeviceCode $trackingDeviceCode = null): self
    {
        $this->trackingDeviceCode = $trackingDeviceCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTrackingDeviceCode(): self
    {
        $this->trackingDeviceCode = null;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getPowerIndicator(): ?bool
    {
        return $this->powerIndicator;
    }

    /**
     * @param bool|null $powerIndicator
     * @return self
     */
    public function setPowerIndicator(?bool $powerIndicator = null): self
    {
        $this->powerIndicator = $powerIndicator;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPowerIndicator(): self
    {
        $this->powerIndicator = null;

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
     * @return self
     */
    public function unsetTraceID(): self
    {
        $this->traceID = null;

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
    public function unsetMeasurementDimension(): self
    {
        $this->measurementDimension = null;

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
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\TransportEquipmentSeal>|null
     */
    public function getTransportEquipmentSeal(): ?array
    {
        return $this->transportEquipmentSeal;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\TransportEquipmentSeal>|null $transportEquipmentSeal
     * @return self
     */
    public function setTransportEquipmentSeal(?array $transportEquipmentSeal = null): self
    {
        $this->transportEquipmentSeal = $transportEquipmentSeal;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTransportEquipmentSeal(): self
    {
        $this->transportEquipmentSeal = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearTransportEquipmentSeal(): self
    {
        $this->transportEquipmentSeal = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\TransportEquipmentSeal $transportEquipmentSeal
     * @return self
     */
    public function addToTransportEquipmentSeal(TransportEquipmentSeal $transportEquipmentSeal): self
    {
        $this->transportEquipmentSeal[] = $transportEquipmentSeal;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TransportEquipmentSeal
     */
    public function addToTransportEquipmentSealWithCreate(): TransportEquipmentSeal
    {
        $this->addTotransportEquipmentSeal($transportEquipmentSeal = new TransportEquipmentSeal());

        return $transportEquipmentSeal;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\TransportEquipmentSeal $transportEquipmentSeal
     * @return self
     */
    public function addOnceToTransportEquipmentSeal(TransportEquipmentSeal $transportEquipmentSeal): self
    {
        if (!is_array($this->transportEquipmentSeal)) {
            $this->transportEquipmentSeal = [];
        }

        $this->transportEquipmentSeal[0] = $transportEquipmentSeal;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TransportEquipmentSeal
     */
    public function addOnceToTransportEquipmentSealWithCreate(): TransportEquipmentSeal
    {
        if (!is_array($this->transportEquipmentSeal)) {
            $this->transportEquipmentSeal = [];
        }

        if ($this->transportEquipmentSeal === []) {
            $this->addOnceTotransportEquipmentSeal(new TransportEquipmentSeal());
        }

        return $this->transportEquipmentSeal[0];
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
     * @return self
     */
    public function unsetMinimumTemperature(): self
    {
        $this->minimumTemperature = null;

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

    /**
     * @return self
     */
    public function unsetMaximumTemperature(): self
    {
        $this->maximumTemperature = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ProviderParty|null
     */
    public function getProviderParty(): ?ProviderParty
    {
        return $this->providerParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ProviderParty
     */
    public function getProviderPartyWithCreate(): ProviderParty
    {
        $this->providerParty = is_null($this->providerParty) ? new ProviderParty() : $this->providerParty;

        return $this->providerParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ProviderParty|null $providerParty
     * @return self
     */
    public function setProviderParty(?ProviderParty $providerParty = null): self
    {
        $this->providerParty = $providerParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetProviderParty(): self
    {
        $this->providerParty = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\LoadingProofParty|null
     */
    public function getLoadingProofParty(): ?LoadingProofParty
    {
        return $this->loadingProofParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\LoadingProofParty
     */
    public function getLoadingProofPartyWithCreate(): LoadingProofParty
    {
        $this->loadingProofParty = is_null($this->loadingProofParty) ? new LoadingProofParty() : $this->loadingProofParty;

        return $this->loadingProofParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\LoadingProofParty|null $loadingProofParty
     * @return self
     */
    public function setLoadingProofParty(?LoadingProofParty $loadingProofParty = null): self
    {
        $this->loadingProofParty = $loadingProofParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetLoadingProofParty(): self
    {
        $this->loadingProofParty = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\SupplierParty|null
     */
    public function getSupplierParty(): ?SupplierParty
    {
        return $this->supplierParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\SupplierParty
     */
    public function getSupplierPartyWithCreate(): SupplierParty
    {
        $this->supplierParty = is_null($this->supplierParty) ? new SupplierParty() : $this->supplierParty;

        return $this->supplierParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\SupplierParty|null $supplierParty
     * @return self
     */
    public function setSupplierParty(?SupplierParty $supplierParty = null): self
    {
        $this->supplierParty = $supplierParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSupplierParty(): self
    {
        $this->supplierParty = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\OwnerParty|null
     */
    public function getOwnerParty(): ?OwnerParty
    {
        return $this->ownerParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\OwnerParty
     */
    public function getOwnerPartyWithCreate(): OwnerParty
    {
        $this->ownerParty = is_null($this->ownerParty) ? new OwnerParty() : $this->ownerParty;

        return $this->ownerParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\OwnerParty|null $ownerParty
     * @return self
     */
    public function setOwnerParty(?OwnerParty $ownerParty = null): self
    {
        $this->ownerParty = $ownerParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetOwnerParty(): self
    {
        $this->ownerParty = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\OperatingParty|null
     */
    public function getOperatingParty(): ?OperatingParty
    {
        return $this->operatingParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\OperatingParty
     */
    public function getOperatingPartyWithCreate(): OperatingParty
    {
        $this->operatingParty = is_null($this->operatingParty) ? new OperatingParty() : $this->operatingParty;

        return $this->operatingParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\OperatingParty|null $operatingParty
     * @return self
     */
    public function setOperatingParty(?OperatingParty $operatingParty = null): self
    {
        $this->operatingParty = $operatingParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetOperatingParty(): self
    {
        $this->operatingParty = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\LoadingLocation|null
     */
    public function getLoadingLocation(): ?LoadingLocation
    {
        return $this->loadingLocation;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\LoadingLocation
     */
    public function getLoadingLocationWithCreate(): LoadingLocation
    {
        $this->loadingLocation = is_null($this->loadingLocation) ? new LoadingLocation() : $this->loadingLocation;

        return $this->loadingLocation;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\LoadingLocation|null $loadingLocation
     * @return self
     */
    public function setLoadingLocation(?LoadingLocation $loadingLocation = null): self
    {
        $this->loadingLocation = $loadingLocation;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetLoadingLocation(): self
    {
        $this->loadingLocation = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\UnloadingLocation|null
     */
    public function getUnloadingLocation(): ?UnloadingLocation
    {
        return $this->unloadingLocation;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\UnloadingLocation
     */
    public function getUnloadingLocationWithCreate(): UnloadingLocation
    {
        $this->unloadingLocation = is_null($this->unloadingLocation) ? new UnloadingLocation() : $this->unloadingLocation;

        return $this->unloadingLocation;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\UnloadingLocation|null $unloadingLocation
     * @return self
     */
    public function setUnloadingLocation(?UnloadingLocation $unloadingLocation = null): self
    {
        $this->unloadingLocation = $unloadingLocation;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetUnloadingLocation(): self
    {
        $this->unloadingLocation = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\StorageLocation|null
     */
    public function getStorageLocation(): ?StorageLocation
    {
        return $this->storageLocation;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\StorageLocation
     */
    public function getStorageLocationWithCreate(): StorageLocation
    {
        $this->storageLocation = is_null($this->storageLocation) ? new StorageLocation() : $this->storageLocation;

        return $this->storageLocation;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\StorageLocation|null $storageLocation
     * @return self
     */
    public function setStorageLocation(?StorageLocation $storageLocation = null): self
    {
        $this->storageLocation = $storageLocation;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetStorageLocation(): self
    {
        $this->storageLocation = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\PositioningTransportEvent>|null
     */
    public function getPositioningTransportEvent(): ?array
    {
        return $this->positioningTransportEvent;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\PositioningTransportEvent>|null $positioningTransportEvent
     * @return self
     */
    public function setPositioningTransportEvent(?array $positioningTransportEvent = null): self
    {
        $this->positioningTransportEvent = $positioningTransportEvent;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPositioningTransportEvent(): self
    {
        $this->positioningTransportEvent = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearPositioningTransportEvent(): self
    {
        $this->positioningTransportEvent = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\PositioningTransportEvent $positioningTransportEvent
     * @return self
     */
    public function addToPositioningTransportEvent(PositioningTransportEvent $positioningTransportEvent): self
    {
        $this->positioningTransportEvent[] = $positioningTransportEvent;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\PositioningTransportEvent
     */
    public function addToPositioningTransportEventWithCreate(): PositioningTransportEvent
    {
        $this->addTopositioningTransportEvent($positioningTransportEvent = new PositioningTransportEvent());

        return $positioningTransportEvent;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\PositioningTransportEvent $positioningTransportEvent
     * @return self
     */
    public function addOnceToPositioningTransportEvent(PositioningTransportEvent $positioningTransportEvent): self
    {
        if (!is_array($this->positioningTransportEvent)) {
            $this->positioningTransportEvent = [];
        }

        $this->positioningTransportEvent[0] = $positioningTransportEvent;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\PositioningTransportEvent
     */
    public function addOnceToPositioningTransportEventWithCreate(): PositioningTransportEvent
    {
        if (!is_array($this->positioningTransportEvent)) {
            $this->positioningTransportEvent = [];
        }

        if ($this->positioningTransportEvent === []) {
            $this->addOnceTopositioningTransportEvent(new PositioningTransportEvent());
        }

        return $this->positioningTransportEvent[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\QuarantineTransportEvent>|null
     */
    public function getQuarantineTransportEvent(): ?array
    {
        return $this->quarantineTransportEvent;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\QuarantineTransportEvent>|null $quarantineTransportEvent
     * @return self
     */
    public function setQuarantineTransportEvent(?array $quarantineTransportEvent = null): self
    {
        $this->quarantineTransportEvent = $quarantineTransportEvent;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetQuarantineTransportEvent(): self
    {
        $this->quarantineTransportEvent = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearQuarantineTransportEvent(): self
    {
        $this->quarantineTransportEvent = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\QuarantineTransportEvent $quarantineTransportEvent
     * @return self
     */
    public function addToQuarantineTransportEvent(QuarantineTransportEvent $quarantineTransportEvent): self
    {
        $this->quarantineTransportEvent[] = $quarantineTransportEvent;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\QuarantineTransportEvent
     */
    public function addToQuarantineTransportEventWithCreate(): QuarantineTransportEvent
    {
        $this->addToquarantineTransportEvent($quarantineTransportEvent = new QuarantineTransportEvent());

        return $quarantineTransportEvent;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\QuarantineTransportEvent $quarantineTransportEvent
     * @return self
     */
    public function addOnceToQuarantineTransportEvent(QuarantineTransportEvent $quarantineTransportEvent): self
    {
        if (!is_array($this->quarantineTransportEvent)) {
            $this->quarantineTransportEvent = [];
        }

        $this->quarantineTransportEvent[0] = $quarantineTransportEvent;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\QuarantineTransportEvent
     */
    public function addOnceToQuarantineTransportEventWithCreate(): QuarantineTransportEvent
    {
        if (!is_array($this->quarantineTransportEvent)) {
            $this->quarantineTransportEvent = [];
        }

        if ($this->quarantineTransportEvent === []) {
            $this->addOnceToquarantineTransportEvent(new QuarantineTransportEvent());
        }

        return $this->quarantineTransportEvent[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\DeliveryTransportEvent>|null
     */
    public function getDeliveryTransportEvent(): ?array
    {
        return $this->deliveryTransportEvent;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\DeliveryTransportEvent>|null $deliveryTransportEvent
     * @return self
     */
    public function setDeliveryTransportEvent(?array $deliveryTransportEvent = null): self
    {
        $this->deliveryTransportEvent = $deliveryTransportEvent;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDeliveryTransportEvent(): self
    {
        $this->deliveryTransportEvent = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearDeliveryTransportEvent(): self
    {
        $this->deliveryTransportEvent = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\DeliveryTransportEvent $deliveryTransportEvent
     * @return self
     */
    public function addToDeliveryTransportEvent(DeliveryTransportEvent $deliveryTransportEvent): self
    {
        $this->deliveryTransportEvent[] = $deliveryTransportEvent;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\DeliveryTransportEvent
     */
    public function addToDeliveryTransportEventWithCreate(): DeliveryTransportEvent
    {
        $this->addTodeliveryTransportEvent($deliveryTransportEvent = new DeliveryTransportEvent());

        return $deliveryTransportEvent;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\DeliveryTransportEvent $deliveryTransportEvent
     * @return self
     */
    public function addOnceToDeliveryTransportEvent(DeliveryTransportEvent $deliveryTransportEvent): self
    {
        if (!is_array($this->deliveryTransportEvent)) {
            $this->deliveryTransportEvent = [];
        }

        $this->deliveryTransportEvent[0] = $deliveryTransportEvent;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\DeliveryTransportEvent
     */
    public function addOnceToDeliveryTransportEventWithCreate(): DeliveryTransportEvent
    {
        if (!is_array($this->deliveryTransportEvent)) {
            $this->deliveryTransportEvent = [];
        }

        if ($this->deliveryTransportEvent === []) {
            $this->addOnceTodeliveryTransportEvent(new DeliveryTransportEvent());
        }

        return $this->deliveryTransportEvent[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\PickupTransportEvent>|null
     */
    public function getPickupTransportEvent(): ?array
    {
        return $this->pickupTransportEvent;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\PickupTransportEvent>|null $pickupTransportEvent
     * @return self
     */
    public function setPickupTransportEvent(?array $pickupTransportEvent = null): self
    {
        $this->pickupTransportEvent = $pickupTransportEvent;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPickupTransportEvent(): self
    {
        $this->pickupTransportEvent = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearPickupTransportEvent(): self
    {
        $this->pickupTransportEvent = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\PickupTransportEvent $pickupTransportEvent
     * @return self
     */
    public function addToPickupTransportEvent(PickupTransportEvent $pickupTransportEvent): self
    {
        $this->pickupTransportEvent[] = $pickupTransportEvent;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\PickupTransportEvent
     */
    public function addToPickupTransportEventWithCreate(): PickupTransportEvent
    {
        $this->addTopickupTransportEvent($pickupTransportEvent = new PickupTransportEvent());

        return $pickupTransportEvent;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\PickupTransportEvent $pickupTransportEvent
     * @return self
     */
    public function addOnceToPickupTransportEvent(PickupTransportEvent $pickupTransportEvent): self
    {
        if (!is_array($this->pickupTransportEvent)) {
            $this->pickupTransportEvent = [];
        }

        $this->pickupTransportEvent[0] = $pickupTransportEvent;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\PickupTransportEvent
     */
    public function addOnceToPickupTransportEventWithCreate(): PickupTransportEvent
    {
        if (!is_array($this->pickupTransportEvent)) {
            $this->pickupTransportEvent = [];
        }

        if ($this->pickupTransportEvent === []) {
            $this->addOnceTopickupTransportEvent(new PickupTransportEvent());
        }

        return $this->pickupTransportEvent[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\HandlingTransportEvent>|null
     */
    public function getHandlingTransportEvent(): ?array
    {
        return $this->handlingTransportEvent;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\HandlingTransportEvent>|null $handlingTransportEvent
     * @return self
     */
    public function setHandlingTransportEvent(?array $handlingTransportEvent = null): self
    {
        $this->handlingTransportEvent = $handlingTransportEvent;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetHandlingTransportEvent(): self
    {
        $this->handlingTransportEvent = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearHandlingTransportEvent(): self
    {
        $this->handlingTransportEvent = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\HandlingTransportEvent $handlingTransportEvent
     * @return self
     */
    public function addToHandlingTransportEvent(HandlingTransportEvent $handlingTransportEvent): self
    {
        $this->handlingTransportEvent[] = $handlingTransportEvent;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\HandlingTransportEvent
     */
    public function addToHandlingTransportEventWithCreate(): HandlingTransportEvent
    {
        $this->addTohandlingTransportEvent($handlingTransportEvent = new HandlingTransportEvent());

        return $handlingTransportEvent;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\HandlingTransportEvent $handlingTransportEvent
     * @return self
     */
    public function addOnceToHandlingTransportEvent(HandlingTransportEvent $handlingTransportEvent): self
    {
        if (!is_array($this->handlingTransportEvent)) {
            $this->handlingTransportEvent = [];
        }

        $this->handlingTransportEvent[0] = $handlingTransportEvent;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\HandlingTransportEvent
     */
    public function addOnceToHandlingTransportEventWithCreate(): HandlingTransportEvent
    {
        if (!is_array($this->handlingTransportEvent)) {
            $this->handlingTransportEvent = [];
        }

        if ($this->handlingTransportEvent === []) {
            $this->addOnceTohandlingTransportEvent(new HandlingTransportEvent());
        }

        return $this->handlingTransportEvent[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\LoadingTransportEvent>|null
     */
    public function getLoadingTransportEvent(): ?array
    {
        return $this->loadingTransportEvent;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\LoadingTransportEvent>|null $loadingTransportEvent
     * @return self
     */
    public function setLoadingTransportEvent(?array $loadingTransportEvent = null): self
    {
        $this->loadingTransportEvent = $loadingTransportEvent;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetLoadingTransportEvent(): self
    {
        $this->loadingTransportEvent = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearLoadingTransportEvent(): self
    {
        $this->loadingTransportEvent = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\LoadingTransportEvent $loadingTransportEvent
     * @return self
     */
    public function addToLoadingTransportEvent(LoadingTransportEvent $loadingTransportEvent): self
    {
        $this->loadingTransportEvent[] = $loadingTransportEvent;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\LoadingTransportEvent
     */
    public function addToLoadingTransportEventWithCreate(): LoadingTransportEvent
    {
        $this->addToloadingTransportEvent($loadingTransportEvent = new LoadingTransportEvent());

        return $loadingTransportEvent;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\LoadingTransportEvent $loadingTransportEvent
     * @return self
     */
    public function addOnceToLoadingTransportEvent(LoadingTransportEvent $loadingTransportEvent): self
    {
        if (!is_array($this->loadingTransportEvent)) {
            $this->loadingTransportEvent = [];
        }

        $this->loadingTransportEvent[0] = $loadingTransportEvent;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\LoadingTransportEvent
     */
    public function addOnceToLoadingTransportEventWithCreate(): LoadingTransportEvent
    {
        if (!is_array($this->loadingTransportEvent)) {
            $this->loadingTransportEvent = [];
        }

        if ($this->loadingTransportEvent === []) {
            $this->addOnceToloadingTransportEvent(new LoadingTransportEvent());
        }

        return $this->loadingTransportEvent[0];
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
    public function unsetTransportEvent(): self
    {
        $this->transportEvent = null;

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
     * @return \horstoeko\invoicesuite\models\ubl\cac\ApplicableTransportMeans|null
     */
    public function getApplicableTransportMeans(): ?ApplicableTransportMeans
    {
        return $this->applicableTransportMeans;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ApplicableTransportMeans
     */
    public function getApplicableTransportMeansWithCreate(): ApplicableTransportMeans
    {
        $this->applicableTransportMeans = is_null($this->applicableTransportMeans) ? new ApplicableTransportMeans() : $this->applicableTransportMeans;

        return $this->applicableTransportMeans;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ApplicableTransportMeans|null $applicableTransportMeans
     * @return self
     */
    public function setApplicableTransportMeans(?ApplicableTransportMeans $applicableTransportMeans = null): self
    {
        $this->applicableTransportMeans = $applicableTransportMeans;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetApplicableTransportMeans(): self
    {
        $this->applicableTransportMeans = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\HaulageTradingTerms>|null
     */
    public function getHaulageTradingTerms(): ?array
    {
        return $this->haulageTradingTerms;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\HaulageTradingTerms>|null $haulageTradingTerms
     * @return self
     */
    public function setHaulageTradingTerms(?array $haulageTradingTerms = null): self
    {
        $this->haulageTradingTerms = $haulageTradingTerms;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetHaulageTradingTerms(): self
    {
        $this->haulageTradingTerms = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearHaulageTradingTerms(): self
    {
        $this->haulageTradingTerms = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\HaulageTradingTerms $haulageTradingTerms
     * @return self
     */
    public function addToHaulageTradingTerms(HaulageTradingTerms $haulageTradingTerms): self
    {
        $this->haulageTradingTerms[] = $haulageTradingTerms;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\HaulageTradingTerms
     */
    public function addToHaulageTradingTermsWithCreate(): HaulageTradingTerms
    {
        $this->addTohaulageTradingTerms($haulageTradingTerms = new HaulageTradingTerms());

        return $haulageTradingTerms;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\HaulageTradingTerms $haulageTradingTerms
     * @return self
     */
    public function addOnceToHaulageTradingTerms(HaulageTradingTerms $haulageTradingTerms): self
    {
        if (!is_array($this->haulageTradingTerms)) {
            $this->haulageTradingTerms = [];
        }

        $this->haulageTradingTerms[0] = $haulageTradingTerms;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\HaulageTradingTerms
     */
    public function addOnceToHaulageTradingTermsWithCreate(): HaulageTradingTerms
    {
        if (!is_array($this->haulageTradingTerms)) {
            $this->haulageTradingTerms = [];
        }

        if ($this->haulageTradingTerms === []) {
            $this->addOnceTohaulageTradingTerms(new HaulageTradingTerms());
        }

        return $this->haulageTradingTerms[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\HazardousGoodsTransit>|null
     */
    public function getHazardousGoodsTransit(): ?array
    {
        return $this->hazardousGoodsTransit;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\HazardousGoodsTransit>|null $hazardousGoodsTransit
     * @return self
     */
    public function setHazardousGoodsTransit(?array $hazardousGoodsTransit = null): self
    {
        $this->hazardousGoodsTransit = $hazardousGoodsTransit;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetHazardousGoodsTransit(): self
    {
        $this->hazardousGoodsTransit = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearHazardousGoodsTransit(): self
    {
        $this->hazardousGoodsTransit = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\HazardousGoodsTransit $hazardousGoodsTransit
     * @return self
     */
    public function addToHazardousGoodsTransit(HazardousGoodsTransit $hazardousGoodsTransit): self
    {
        $this->hazardousGoodsTransit[] = $hazardousGoodsTransit;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\HazardousGoodsTransit
     */
    public function addToHazardousGoodsTransitWithCreate(): HazardousGoodsTransit
    {
        $this->addTohazardousGoodsTransit($hazardousGoodsTransit = new HazardousGoodsTransit());

        return $hazardousGoodsTransit;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\HazardousGoodsTransit $hazardousGoodsTransit
     * @return self
     */
    public function addOnceToHazardousGoodsTransit(HazardousGoodsTransit $hazardousGoodsTransit): self
    {
        if (!is_array($this->hazardousGoodsTransit)) {
            $this->hazardousGoodsTransit = [];
        }

        $this->hazardousGoodsTransit[0] = $hazardousGoodsTransit;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\HazardousGoodsTransit
     */
    public function addOnceToHazardousGoodsTransitWithCreate(): HazardousGoodsTransit
    {
        if (!is_array($this->hazardousGoodsTransit)) {
            $this->hazardousGoodsTransit = [];
        }

        if ($this->hazardousGoodsTransit === []) {
            $this->addOnceTohazardousGoodsTransit(new HazardousGoodsTransit());
        }

        return $this->hazardousGoodsTransit[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\PackagedTransportHandlingUnit>|null
     */
    public function getPackagedTransportHandlingUnit(): ?array
    {
        return $this->packagedTransportHandlingUnit;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\PackagedTransportHandlingUnit>|null $packagedTransportHandlingUnit
     * @return self
     */
    public function setPackagedTransportHandlingUnit(?array $packagedTransportHandlingUnit = null): self
    {
        $this->packagedTransportHandlingUnit = $packagedTransportHandlingUnit;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPackagedTransportHandlingUnit(): self
    {
        $this->packagedTransportHandlingUnit = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearPackagedTransportHandlingUnit(): self
    {
        $this->packagedTransportHandlingUnit = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\PackagedTransportHandlingUnit $packagedTransportHandlingUnit
     * @return self
     */
    public function addToPackagedTransportHandlingUnit(
        PackagedTransportHandlingUnit $packagedTransportHandlingUnit,
    ): self {
        $this->packagedTransportHandlingUnit[] = $packagedTransportHandlingUnit;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\PackagedTransportHandlingUnit
     */
    public function addToPackagedTransportHandlingUnitWithCreate(): PackagedTransportHandlingUnit
    {
        $this->addTopackagedTransportHandlingUnit($packagedTransportHandlingUnit = new PackagedTransportHandlingUnit());

        return $packagedTransportHandlingUnit;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\PackagedTransportHandlingUnit $packagedTransportHandlingUnit
     * @return self
     */
    public function addOnceToPackagedTransportHandlingUnit(
        PackagedTransportHandlingUnit $packagedTransportHandlingUnit,
    ): self {
        if (!is_array($this->packagedTransportHandlingUnit)) {
            $this->packagedTransportHandlingUnit = [];
        }

        $this->packagedTransportHandlingUnit[0] = $packagedTransportHandlingUnit;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\PackagedTransportHandlingUnit
     */
    public function addOnceToPackagedTransportHandlingUnitWithCreate(): PackagedTransportHandlingUnit
    {
        if (!is_array($this->packagedTransportHandlingUnit)) {
            $this->packagedTransportHandlingUnit = [];
        }

        if ($this->packagedTransportHandlingUnit === []) {
            $this->addOnceTopackagedTransportHandlingUnit(new PackagedTransportHandlingUnit());
        }

        return $this->packagedTransportHandlingUnit[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\ServiceAllowanceCharge>|null
     */
    public function getServiceAllowanceCharge(): ?array
    {
        return $this->serviceAllowanceCharge;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\ServiceAllowanceCharge>|null $serviceAllowanceCharge
     * @return self
     */
    public function setServiceAllowanceCharge(?array $serviceAllowanceCharge = null): self
    {
        $this->serviceAllowanceCharge = $serviceAllowanceCharge;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetServiceAllowanceCharge(): self
    {
        $this->serviceAllowanceCharge = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearServiceAllowanceCharge(): self
    {
        $this->serviceAllowanceCharge = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ServiceAllowanceCharge $serviceAllowanceCharge
     * @return self
     */
    public function addToServiceAllowanceCharge(ServiceAllowanceCharge $serviceAllowanceCharge): self
    {
        $this->serviceAllowanceCharge[] = $serviceAllowanceCharge;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ServiceAllowanceCharge
     */
    public function addToServiceAllowanceChargeWithCreate(): ServiceAllowanceCharge
    {
        $this->addToserviceAllowanceCharge($serviceAllowanceCharge = new ServiceAllowanceCharge());

        return $serviceAllowanceCharge;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ServiceAllowanceCharge $serviceAllowanceCharge
     * @return self
     */
    public function addOnceToServiceAllowanceCharge(ServiceAllowanceCharge $serviceAllowanceCharge): self
    {
        if (!is_array($this->serviceAllowanceCharge)) {
            $this->serviceAllowanceCharge = [];
        }

        $this->serviceAllowanceCharge[0] = $serviceAllowanceCharge;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ServiceAllowanceCharge
     */
    public function addOnceToServiceAllowanceChargeWithCreate(): ServiceAllowanceCharge
    {
        if (!is_array($this->serviceAllowanceCharge)) {
            $this->serviceAllowanceCharge = [];
        }

        if ($this->serviceAllowanceCharge === []) {
            $this->addOnceToserviceAllowanceCharge(new ServiceAllowanceCharge());
        }

        return $this->serviceAllowanceCharge[0];
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
    public function unsetFreightAllowanceCharge(): self
    {
        $this->freightAllowanceCharge = null;

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
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\AttachedTransportEquipment>|null
     */
    public function getAttachedTransportEquipment(): ?array
    {
        return $this->attachedTransportEquipment;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\AttachedTransportEquipment>|null $attachedTransportEquipment
     * @return self
     */
    public function setAttachedTransportEquipment(?array $attachedTransportEquipment = null): self
    {
        $this->attachedTransportEquipment = $attachedTransportEquipment;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetAttachedTransportEquipment(): self
    {
        $this->attachedTransportEquipment = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearAttachedTransportEquipment(): self
    {
        $this->attachedTransportEquipment = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\AttachedTransportEquipment $attachedTransportEquipment
     * @return self
     */
    public function addToAttachedTransportEquipment(AttachedTransportEquipment $attachedTransportEquipment): self
    {
        $this->attachedTransportEquipment[] = $attachedTransportEquipment;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\AttachedTransportEquipment
     */
    public function addToAttachedTransportEquipmentWithCreate(): AttachedTransportEquipment
    {
        $this->addToattachedTransportEquipment($attachedTransportEquipment = new AttachedTransportEquipment());

        return $attachedTransportEquipment;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\AttachedTransportEquipment $attachedTransportEquipment
     * @return self
     */
    public function addOnceToAttachedTransportEquipment(AttachedTransportEquipment $attachedTransportEquipment): self
    {
        if (!is_array($this->attachedTransportEquipment)) {
            $this->attachedTransportEquipment = [];
        }

        $this->attachedTransportEquipment[0] = $attachedTransportEquipment;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\AttachedTransportEquipment
     */
    public function addOnceToAttachedTransportEquipmentWithCreate(): AttachedTransportEquipment
    {
        if (!is_array($this->attachedTransportEquipment)) {
            $this->attachedTransportEquipment = [];
        }

        if ($this->attachedTransportEquipment === []) {
            $this->addOnceToattachedTransportEquipment(new AttachedTransportEquipment());
        }

        return $this->attachedTransportEquipment[0];
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
     * @return self
     */
    public function unsetDelivery(): self
    {
        $this->delivery = null;

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
     * @return self
     */
    public function unsetPickup(): self
    {
        $this->pickup = null;

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
     * @return self
     */
    public function unsetDespatch(): self
    {
        $this->despatch = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\ShipmentDocumentReference>|null
     */
    public function getShipmentDocumentReference(): ?array
    {
        return $this->shipmentDocumentReference;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\ShipmentDocumentReference>|null $shipmentDocumentReference
     * @return self
     */
    public function setShipmentDocumentReference(?array $shipmentDocumentReference = null): self
    {
        $this->shipmentDocumentReference = $shipmentDocumentReference;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetShipmentDocumentReference(): self
    {
        $this->shipmentDocumentReference = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearShipmentDocumentReference(): self
    {
        $this->shipmentDocumentReference = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ShipmentDocumentReference $shipmentDocumentReference
     * @return self
     */
    public function addToShipmentDocumentReference(ShipmentDocumentReference $shipmentDocumentReference): self
    {
        $this->shipmentDocumentReference[] = $shipmentDocumentReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ShipmentDocumentReference
     */
    public function addToShipmentDocumentReferenceWithCreate(): ShipmentDocumentReference
    {
        $this->addToshipmentDocumentReference($shipmentDocumentReference = new ShipmentDocumentReference());

        return $shipmentDocumentReference;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ShipmentDocumentReference $shipmentDocumentReference
     * @return self
     */
    public function addOnceToShipmentDocumentReference(ShipmentDocumentReference $shipmentDocumentReference): self
    {
        if (!is_array($this->shipmentDocumentReference)) {
            $this->shipmentDocumentReference = [];
        }

        $this->shipmentDocumentReference[0] = $shipmentDocumentReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ShipmentDocumentReference
     */
    public function addOnceToShipmentDocumentReferenceWithCreate(): ShipmentDocumentReference
    {
        if (!is_array($this->shipmentDocumentReference)) {
            $this->shipmentDocumentReference = [];
        }

        if ($this->shipmentDocumentReference === []) {
            $this->addOnceToshipmentDocumentReference(new ShipmentDocumentReference());
        }

        return $this->shipmentDocumentReference[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\ContainedInTransportEquipment>|null
     */
    public function getContainedInTransportEquipment(): ?array
    {
        return $this->containedInTransportEquipment;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\ContainedInTransportEquipment>|null $containedInTransportEquipment
     * @return self
     */
    public function setContainedInTransportEquipment(?array $containedInTransportEquipment = null): self
    {
        $this->containedInTransportEquipment = $containedInTransportEquipment;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetContainedInTransportEquipment(): self
    {
        $this->containedInTransportEquipment = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearContainedInTransportEquipment(): self
    {
        $this->containedInTransportEquipment = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ContainedInTransportEquipment $containedInTransportEquipment
     * @return self
     */
    public function addToContainedInTransportEquipment(
        ContainedInTransportEquipment $containedInTransportEquipment,
    ): self {
        $this->containedInTransportEquipment[] = $containedInTransportEquipment;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ContainedInTransportEquipment
     */
    public function addToContainedInTransportEquipmentWithCreate(): ContainedInTransportEquipment
    {
        $this->addTocontainedInTransportEquipment($containedInTransportEquipment = new ContainedInTransportEquipment());

        return $containedInTransportEquipment;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ContainedInTransportEquipment $containedInTransportEquipment
     * @return self
     */
    public function addOnceToContainedInTransportEquipment(
        ContainedInTransportEquipment $containedInTransportEquipment,
    ): self {
        if (!is_array($this->containedInTransportEquipment)) {
            $this->containedInTransportEquipment = [];
        }

        $this->containedInTransportEquipment[0] = $containedInTransportEquipment;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ContainedInTransportEquipment
     */
    public function addOnceToContainedInTransportEquipmentWithCreate(): ContainedInTransportEquipment
    {
        if (!is_array($this->containedInTransportEquipment)) {
            $this->containedInTransportEquipment = [];
        }

        if ($this->containedInTransportEquipment === []) {
            $this->addOnceTocontainedInTransportEquipment(new ContainedInTransportEquipment());
        }

        return $this->containedInTransportEquipment[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\Package>|null
     */
    public function getPackage(): ?array
    {
        return $this->package;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\Package>|null $package
     * @return self
     */
    public function setPackage(?array $package = null): self
    {
        $this->package = $package;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPackage(): self
    {
        $this->package = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearPackage(): self
    {
        $this->package = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Package $package
     * @return self
     */
    public function addToPackage(Package $package): self
    {
        $this->package[] = $package;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Package
     */
    public function addToPackageWithCreate(): Package
    {
        $this->addTopackage($package = new Package());

        return $package;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Package $package
     * @return self
     */
    public function addOnceToPackage(Package $package): self
    {
        if (!is_array($this->package)) {
            $this->package = [];
        }

        $this->package[0] = $package;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Package
     */
    public function addOnceToPackageWithCreate(): Package
    {
        if (!is_array($this->package)) {
            $this->package = [];
        }

        if ($this->package === []) {
            $this->addOnceTopackage(new Package());
        }

        return $this->package[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\GoodsItem>|null
     */
    public function getGoodsItem(): ?array
    {
        return $this->goodsItem;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\GoodsItem>|null $goodsItem
     * @return self
     */
    public function setGoodsItem(?array $goodsItem = null): self
    {
        $this->goodsItem = $goodsItem;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetGoodsItem(): self
    {
        $this->goodsItem = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearGoodsItem(): self
    {
        $this->goodsItem = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\GoodsItem $goodsItem
     * @return self
     */
    public function addToGoodsItem(GoodsItem $goodsItem): self
    {
        $this->goodsItem[] = $goodsItem;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\GoodsItem
     */
    public function addToGoodsItemWithCreate(): GoodsItem
    {
        $this->addTogoodsItem($goodsItem = new GoodsItem());

        return $goodsItem;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\GoodsItem $goodsItem
     * @return self
     */
    public function addOnceToGoodsItem(GoodsItem $goodsItem): self
    {
        if (!is_array($this->goodsItem)) {
            $this->goodsItem = [];
        }

        $this->goodsItem[0] = $goodsItem;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\GoodsItem
     */
    public function addOnceToGoodsItemWithCreate(): GoodsItem
    {
        if (!is_array($this->goodsItem)) {
            $this->goodsItem = [];
        }

        if ($this->goodsItem === []) {
            $this->addOnceTogoodsItem(new GoodsItem());
        }

        return $this->goodsItem[0];
    }
}
