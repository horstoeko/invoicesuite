<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\BrokerAssignedID;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\CarrierAssignedID;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\CarrierServiceInstructions;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\ChargeableWeightMeasure;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\ChildConsignmentQuantity;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\ConsigneeAssignedID;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\ConsignmentQuantity;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\ConsignorAssignedID;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\ContractedCarrierAssignedID;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\CustomsClearanceServiceInstructions;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\DeclaredCustomsValueAmount;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\DeclaredForCarriageValueAmount;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\DeclaredStatisticsValueAmount;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\DeliveryInstructions;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\ForwarderServiceInstructions;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\FreeOnBoardValueAmount;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\FreightForwarderAssignedID;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\GrossVolumeMeasure;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\GrossWeightMeasure;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\HandlingCode;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\HandlingInstructions;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\HaulageInstructions;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\ID;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\Information;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\InsurancePremiumAmount;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\InsuranceValueAmount;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\LoadingLengthMeasure;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\LoadingSequenceID;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\NetNetWeightMeasure;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\NetVolumeMeasure;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\NetWeightMeasure;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\PerformingCarrierAssignedID;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\Remarks;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\SequenceID;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\ShippingPriorityLevelCode;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\SpecialInstructions;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\SpecialServiceInstructions;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\SummaryDescription;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\TariffCode;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\TariffDescription;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\TotalGoodsItemQuantity;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\TotalInvoiceAmount;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\TotalPackagesQuantity;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\TotalTransportHandlingUnitQuantity;

class ConsignmentType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\ID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\ID")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\CarrierAssignedID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\CarrierAssignedID")
     * @JMS\Expose
     * @JMS\SerializedName("CarrierAssignedID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCarrierAssignedID", setter="setCarrierAssignedID")
     */
    private $carrierAssignedID;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\ConsigneeAssignedID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\ConsigneeAssignedID")
     * @JMS\Expose
     * @JMS\SerializedName("ConsigneeAssignedID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getConsigneeAssignedID", setter="setConsigneeAssignedID")
     */
    private $consigneeAssignedID;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\ConsignorAssignedID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\ConsignorAssignedID")
     * @JMS\Expose
     * @JMS\SerializedName("ConsignorAssignedID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getConsignorAssignedID", setter="setConsignorAssignedID")
     */
    private $consignorAssignedID;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\FreightForwarderAssignedID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\FreightForwarderAssignedID")
     * @JMS\Expose
     * @JMS\SerializedName("FreightForwarderAssignedID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getFreightForwarderAssignedID", setter="setFreightForwarderAssignedID")
     */
    private $freightForwarderAssignedID;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\BrokerAssignedID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\BrokerAssignedID")
     * @JMS\Expose
     * @JMS\SerializedName("BrokerAssignedID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getBrokerAssignedID", setter="setBrokerAssignedID")
     */
    private $brokerAssignedID;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\ContractedCarrierAssignedID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\ContractedCarrierAssignedID")
     * @JMS\Expose
     * @JMS\SerializedName("ContractedCarrierAssignedID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getContractedCarrierAssignedID", setter="setContractedCarrierAssignedID")
     */
    private $contractedCarrierAssignedID;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\PerformingCarrierAssignedID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\PerformingCarrierAssignedID")
     * @JMS\Expose
     * @JMS\SerializedName("PerformingCarrierAssignedID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPerformingCarrierAssignedID", setter="setPerformingCarrierAssignedID")
     */
    private $performingCarrierAssignedID;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\SummaryDescription>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cbc\SummaryDescription>")
     * @JMS\Expose
     * @JMS\SerializedName("SummaryDescription")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="SummaryDescription", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getSummaryDescription", setter="setSummaryDescription")
     */
    private $summaryDescription;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\TotalInvoiceAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\TotalInvoiceAmount")
     * @JMS\Expose
     * @JMS\SerializedName("TotalInvoiceAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTotalInvoiceAmount", setter="setTotalInvoiceAmount")
     */
    private $totalInvoiceAmount;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\DeclaredCustomsValueAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\DeclaredCustomsValueAmount")
     * @JMS\Expose
     * @JMS\SerializedName("DeclaredCustomsValueAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDeclaredCustomsValueAmount", setter="setDeclaredCustomsValueAmount")
     */
    private $declaredCustomsValueAmount;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\TariffDescription>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cbc\TariffDescription>")
     * @JMS\Expose
     * @JMS\SerializedName("TariffDescription")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TariffDescription", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getTariffDescription", setter="setTariffDescription")
     */
    private $tariffDescription;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\TariffCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\TariffCode")
     * @JMS\Expose
     * @JMS\SerializedName("TariffCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTariffCode", setter="setTariffCode")
     */
    private $tariffCode;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\InsurancePremiumAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\InsurancePremiumAmount")
     * @JMS\Expose
     * @JMS\SerializedName("InsurancePremiumAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getInsurancePremiumAmount", setter="setInsurancePremiumAmount")
     */
    private $insurancePremiumAmount;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\GrossWeightMeasure|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\GrossWeightMeasure")
     * @JMS\Expose
     * @JMS\SerializedName("GrossWeightMeasure")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getGrossWeightMeasure", setter="setGrossWeightMeasure")
     */
    private $grossWeightMeasure;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\NetWeightMeasure|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\NetWeightMeasure")
     * @JMS\Expose
     * @JMS\SerializedName("NetWeightMeasure")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getNetWeightMeasure", setter="setNetWeightMeasure")
     */
    private $netWeightMeasure;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\NetNetWeightMeasure|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\NetNetWeightMeasure")
     * @JMS\Expose
     * @JMS\SerializedName("NetNetWeightMeasure")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getNetNetWeightMeasure", setter="setNetNetWeightMeasure")
     */
    private $netNetWeightMeasure;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\ChargeableWeightMeasure|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\ChargeableWeightMeasure")
     * @JMS\Expose
     * @JMS\SerializedName("ChargeableWeightMeasure")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getChargeableWeightMeasure", setter="setChargeableWeightMeasure")
     */
    private $chargeableWeightMeasure;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\GrossVolumeMeasure|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\GrossVolumeMeasure")
     * @JMS\Expose
     * @JMS\SerializedName("GrossVolumeMeasure")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getGrossVolumeMeasure", setter="setGrossVolumeMeasure")
     */
    private $grossVolumeMeasure;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\NetVolumeMeasure|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\NetVolumeMeasure")
     * @JMS\Expose
     * @JMS\SerializedName("NetVolumeMeasure")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getNetVolumeMeasure", setter="setNetVolumeMeasure")
     */
    private $netVolumeMeasure;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\LoadingLengthMeasure|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\LoadingLengthMeasure")
     * @JMS\Expose
     * @JMS\SerializedName("LoadingLengthMeasure")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLoadingLengthMeasure", setter="setLoadingLengthMeasure")
     */
    private $loadingLengthMeasure;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Remarks>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cbc\Remarks>")
     * @JMS\Expose
     * @JMS\SerializedName("Remarks")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Remarks", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getRemarks", setter="setRemarks")
     */
    private $remarks;

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
     * @var bool|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("AnimalFoodIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAnimalFoodIndicator", setter="setAnimalFoodIndicator")
     */
    private $animalFoodIndicator;

    /**
     * @var bool|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("HumanFoodIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getHumanFoodIndicator", setter="setHumanFoodIndicator")
     */
    private $humanFoodIndicator;

    /**
     * @var bool|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("LivestockIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLivestockIndicator", setter="setLivestockIndicator")
     */
    private $livestockIndicator;

    /**
     * @var bool|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("BulkCargoIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getBulkCargoIndicator", setter="setBulkCargoIndicator")
     */
    private $bulkCargoIndicator;

    /**
     * @var bool|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("ContainerizedIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getContainerizedIndicator", setter="setContainerizedIndicator")
     */
    private $containerizedIndicator;

    /**
     * @var bool|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("GeneralCargoIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getGeneralCargoIndicator", setter="setGeneralCargoIndicator")
     */
    private $generalCargoIndicator;

    /**
     * @var bool|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("SpecialSecurityIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSpecialSecurityIndicator", setter="setSpecialSecurityIndicator")
     */
    private $specialSecurityIndicator;

    /**
     * @var bool|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("ThirdPartyPayerIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getThirdPartyPayerIndicator", setter="setThirdPartyPayerIndicator")
     */
    private $thirdPartyPayerIndicator;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\CarrierServiceInstructions>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cbc\CarrierServiceInstructions>")
     * @JMS\Expose
     * @JMS\SerializedName("CarrierServiceInstructions")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="CarrierServiceInstructions", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getCarrierServiceInstructions", setter="setCarrierServiceInstructions")
     */
    private $carrierServiceInstructions;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\CustomsClearanceServiceInstructions>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cbc\CustomsClearanceServiceInstructions>")
     * @JMS\Expose
     * @JMS\SerializedName("CustomsClearanceServiceInstructions")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="CustomsClearanceServiceInstructions", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getCustomsClearanceServiceInstructions", setter="setCustomsClearanceServiceInstructions")
     */
    private $customsClearanceServiceInstructions;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\ForwarderServiceInstructions>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cbc\ForwarderServiceInstructions>")
     * @JMS\Expose
     * @JMS\SerializedName("ForwarderServiceInstructions")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ForwarderServiceInstructions", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getForwarderServiceInstructions", setter="setForwarderServiceInstructions")
     */
    private $forwarderServiceInstructions;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\SpecialServiceInstructions>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cbc\SpecialServiceInstructions>")
     * @JMS\Expose
     * @JMS\SerializedName("SpecialServiceInstructions")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="SpecialServiceInstructions", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getSpecialServiceInstructions", setter="setSpecialServiceInstructions")
     */
    private $specialServiceInstructions;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\SequenceID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\SequenceID")
     * @JMS\Expose
     * @JMS\SerializedName("SequenceID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSequenceID", setter="setSequenceID")
     */
    private $sequenceID;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\ShippingPriorityLevelCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\ShippingPriorityLevelCode")
     * @JMS\Expose
     * @JMS\SerializedName("ShippingPriorityLevelCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getShippingPriorityLevelCode", setter="setShippingPriorityLevelCode")
     */
    private $shippingPriorityLevelCode;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\HandlingCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\HandlingCode")
     * @JMS\Expose
     * @JMS\SerializedName("HandlingCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getHandlingCode", setter="setHandlingCode")
     */
    private $handlingCode;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\HandlingInstructions>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cbc\HandlingInstructions>")
     * @JMS\Expose
     * @JMS\SerializedName("HandlingInstructions")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="HandlingInstructions", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getHandlingInstructions", setter="setHandlingInstructions")
     */
    private $handlingInstructions;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Information>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cbc\Information>")
     * @JMS\Expose
     * @JMS\SerializedName("Information")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Information", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getInformation", setter="setInformation")
     */
    private $information;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\TotalGoodsItemQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\TotalGoodsItemQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("TotalGoodsItemQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTotalGoodsItemQuantity", setter="setTotalGoodsItemQuantity")
     */
    private $totalGoodsItemQuantity;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\TotalTransportHandlingUnitQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\TotalTransportHandlingUnitQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("TotalTransportHandlingUnitQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTotalTransportHandlingUnitQuantity", setter="setTotalTransportHandlingUnitQuantity")
     */
    private $totalTransportHandlingUnitQuantity;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\InsuranceValueAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\InsuranceValueAmount")
     * @JMS\Expose
     * @JMS\SerializedName("InsuranceValueAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getInsuranceValueAmount", setter="setInsuranceValueAmount")
     */
    private $insuranceValueAmount;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\DeclaredForCarriageValueAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\DeclaredForCarriageValueAmount")
     * @JMS\Expose
     * @JMS\SerializedName("DeclaredForCarriageValueAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDeclaredForCarriageValueAmount", setter="setDeclaredForCarriageValueAmount")
     */
    private $declaredForCarriageValueAmount;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\DeclaredStatisticsValueAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\DeclaredStatisticsValueAmount")
     * @JMS\Expose
     * @JMS\SerializedName("DeclaredStatisticsValueAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDeclaredStatisticsValueAmount", setter="setDeclaredStatisticsValueAmount")
     */
    private $declaredStatisticsValueAmount;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\FreeOnBoardValueAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\FreeOnBoardValueAmount")
     * @JMS\Expose
     * @JMS\SerializedName("FreeOnBoardValueAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getFreeOnBoardValueAmount", setter="setFreeOnBoardValueAmount")
     */
    private $freeOnBoardValueAmount;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\SpecialInstructions>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cbc\SpecialInstructions>")
     * @JMS\Expose
     * @JMS\SerializedName("SpecialInstructions")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="SpecialInstructions", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getSpecialInstructions", setter="setSpecialInstructions")
     */
    private $specialInstructions;

    /**
     * @var bool|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("SplitConsignmentIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSplitConsignmentIndicator", setter="setSplitConsignmentIndicator")
     */
    private $splitConsignmentIndicator;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\DeliveryInstructions>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cbc\DeliveryInstructions>")
     * @JMS\Expose
     * @JMS\SerializedName("DeliveryInstructions")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="DeliveryInstructions", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getDeliveryInstructions", setter="setDeliveryInstructions")
     */
    private $deliveryInstructions;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\ConsignmentQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\ConsignmentQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("ConsignmentQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getConsignmentQuantity", setter="setConsignmentQuantity")
     */
    private $consignmentQuantity;

    /**
     * @var bool|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("ConsolidatableIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getConsolidatableIndicator", setter="setConsolidatableIndicator")
     */
    private $consolidatableIndicator;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\HaulageInstructions>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cbc\HaulageInstructions>")
     * @JMS\Expose
     * @JMS\SerializedName("HaulageInstructions")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="HaulageInstructions", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getHaulageInstructions", setter="setHaulageInstructions")
     */
    private $haulageInstructions;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\LoadingSequenceID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\LoadingSequenceID")
     * @JMS\Expose
     * @JMS\SerializedName("LoadingSequenceID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLoadingSequenceID", setter="setLoadingSequenceID")
     */
    private $loadingSequenceID;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\ChildConsignmentQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\ChildConsignmentQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("ChildConsignmentQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getChildConsignmentQuantity", setter="setChildConsignmentQuantity")
     */
    private $childConsignmentQuantity;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\TotalPackagesQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\TotalPackagesQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("TotalPackagesQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTotalPackagesQuantity", setter="setTotalPackagesQuantity")
     */
    private $totalPackagesQuantity;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\ConsolidatedShipment>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\ConsolidatedShipment>")
     * @JMS\Expose
     * @JMS\SerializedName("ConsolidatedShipment")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ConsolidatedShipment", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getConsolidatedShipment", setter="setConsolidatedShipment")
     */
    private $consolidatedShipment;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\CustomsDeclaration>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\CustomsDeclaration>")
     * @JMS\Expose
     * @JMS\SerializedName("CustomsDeclaration")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="CustomsDeclaration", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getCustomsDeclaration", setter="setCustomsDeclaration")
     */
    private $customsDeclaration;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\RequestedPickupTransportEvent|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\RequestedPickupTransportEvent")
     * @JMS\Expose
     * @JMS\SerializedName("RequestedPickupTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRequestedPickupTransportEvent", setter="setRequestedPickupTransportEvent")
     */
    private $requestedPickupTransportEvent;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\RequestedDeliveryTransportEvent|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\RequestedDeliveryTransportEvent")
     * @JMS\Expose
     * @JMS\SerializedName("RequestedDeliveryTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRequestedDeliveryTransportEvent", setter="setRequestedDeliveryTransportEvent")
     */
    private $requestedDeliveryTransportEvent;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\PlannedPickupTransportEvent|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\PlannedPickupTransportEvent")
     * @JMS\Expose
     * @JMS\SerializedName("PlannedPickupTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPlannedPickupTransportEvent", setter="setPlannedPickupTransportEvent")
     */
    private $plannedPickupTransportEvent;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\PlannedDeliveryTransportEvent|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\PlannedDeliveryTransportEvent")
     * @JMS\Expose
     * @JMS\SerializedName("PlannedDeliveryTransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPlannedDeliveryTransportEvent", setter="setPlannedDeliveryTransportEvent")
     */
    private $plannedDeliveryTransportEvent;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\Status>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\Status>")
     * @JMS\Expose
     * @JMS\SerializedName("Status")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Status", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getStatus", setter="setStatus")
     */
    private $status;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\ChildConsignment>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\ChildConsignment>")
     * @JMS\Expose
     * @JMS\SerializedName("ChildConsignment")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ChildConsignment", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getChildConsignment", setter="setChildConsignment")
     */
    private $childConsignment;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\ConsigneeParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\ConsigneeParty")
     * @JMS\Expose
     * @JMS\SerializedName("ConsigneeParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getConsigneeParty", setter="setConsigneeParty")
     */
    private $consigneeParty;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\ExporterParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\ExporterParty")
     * @JMS\Expose
     * @JMS\SerializedName("ExporterParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getExporterParty", setter="setExporterParty")
     */
    private $exporterParty;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\ConsignorParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\ConsignorParty")
     * @JMS\Expose
     * @JMS\SerializedName("ConsignorParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getConsignorParty", setter="setConsignorParty")
     */
    private $consignorParty;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\ImporterParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\ImporterParty")
     * @JMS\Expose
     * @JMS\SerializedName("ImporterParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getImporterParty", setter="setImporterParty")
     */
    private $importerParty;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\CarrierParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\CarrierParty")
     * @JMS\Expose
     * @JMS\SerializedName("CarrierParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCarrierParty", setter="setCarrierParty")
     */
    private $carrierParty;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\FreightForwarderParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\FreightForwarderParty")
     * @JMS\Expose
     * @JMS\SerializedName("FreightForwarderParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getFreightForwarderParty", setter="setFreightForwarderParty")
     */
    private $freightForwarderParty;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\NotifyParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\NotifyParty")
     * @JMS\Expose
     * @JMS\SerializedName("NotifyParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getNotifyParty", setter="setNotifyParty")
     */
    private $notifyParty;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\OriginalDespatchParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\OriginalDespatchParty")
     * @JMS\Expose
     * @JMS\SerializedName("OriginalDespatchParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOriginalDespatchParty", setter="setOriginalDespatchParty")
     */
    private $originalDespatchParty;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\FinalDeliveryParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\FinalDeliveryParty")
     * @JMS\Expose
     * @JMS\SerializedName("FinalDeliveryParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getFinalDeliveryParty", setter="setFinalDeliveryParty")
     */
    private $finalDeliveryParty;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\PerformingCarrierParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\PerformingCarrierParty")
     * @JMS\Expose
     * @JMS\SerializedName("PerformingCarrierParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPerformingCarrierParty", setter="setPerformingCarrierParty")
     */
    private $performingCarrierParty;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\SubstituteCarrierParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\SubstituteCarrierParty")
     * @JMS\Expose
     * @JMS\SerializedName("SubstituteCarrierParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSubstituteCarrierParty", setter="setSubstituteCarrierParty")
     */
    private $substituteCarrierParty;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\LogisticsOperatorParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\LogisticsOperatorParty")
     * @JMS\Expose
     * @JMS\SerializedName("LogisticsOperatorParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLogisticsOperatorParty", setter="setLogisticsOperatorParty")
     */
    private $logisticsOperatorParty;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\TransportAdvisorParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\TransportAdvisorParty")
     * @JMS\Expose
     * @JMS\SerializedName("TransportAdvisorParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTransportAdvisorParty", setter="setTransportAdvisorParty")
     */
    private $transportAdvisorParty;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\HazardousItemNotificationParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\HazardousItemNotificationParty")
     * @JMS\Expose
     * @JMS\SerializedName("HazardousItemNotificationParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getHazardousItemNotificationParty", setter="setHazardousItemNotificationParty")
     */
    private $hazardousItemNotificationParty;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\InsuranceParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\InsuranceParty")
     * @JMS\Expose
     * @JMS\SerializedName("InsuranceParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getInsuranceParty", setter="setInsuranceParty")
     */
    private $insuranceParty;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\MortgageHolderParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\MortgageHolderParty")
     * @JMS\Expose
     * @JMS\SerializedName("MortgageHolderParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMortgageHolderParty", setter="setMortgageHolderParty")
     */
    private $mortgageHolderParty;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\BillOfLadingHolderParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\BillOfLadingHolderParty")
     * @JMS\Expose
     * @JMS\SerializedName("BillOfLadingHolderParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getBillOfLadingHolderParty", setter="setBillOfLadingHolderParty")
     */
    private $billOfLadingHolderParty;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\OriginalDepartureCountry|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\OriginalDepartureCountry")
     * @JMS\Expose
     * @JMS\SerializedName("OriginalDepartureCountry")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOriginalDepartureCountry", setter="setOriginalDepartureCountry")
     */
    private $originalDepartureCountry;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\FinalDestinationCountry|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\FinalDestinationCountry")
     * @JMS\Expose
     * @JMS\SerializedName("FinalDestinationCountry")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getFinalDestinationCountry", setter="setFinalDestinationCountry")
     */
    private $finalDestinationCountry;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\TransitCountry>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\TransitCountry>")
     * @JMS\Expose
     * @JMS\SerializedName("TransitCountry")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TransitCountry", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getTransitCountry", setter="setTransitCountry")
     */
    private $transitCountry;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\TransportContract|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\TransportContract")
     * @JMS\Expose
     * @JMS\SerializedName("TransportContract")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTransportContract", setter="setTransportContract")
     */
    private $transportContract;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\TransportEvent>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\TransportEvent>")
     * @JMS\Expose
     * @JMS\SerializedName("TransportEvent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TransportEvent", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getTransportEvent", setter="setTransportEvent")
     */
    private $transportEvent;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\OriginalDespatchTransportationService|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\OriginalDespatchTransportationService")
     * @JMS\Expose
     * @JMS\SerializedName("OriginalDespatchTransportationService")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOriginalDespatchTransportationService", setter="setOriginalDespatchTransportationService")
     */
    private $originalDespatchTransportationService;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\FinalDeliveryTransportationService|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\FinalDeliveryTransportationService")
     * @JMS\Expose
     * @JMS\SerializedName("FinalDeliveryTransportationService")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getFinalDeliveryTransportationService", setter="setFinalDeliveryTransportationService")
     */
    private $finalDeliveryTransportationService;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\DeliveryTerms|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\DeliveryTerms")
     * @JMS\Expose
     * @JMS\SerializedName("DeliveryTerms")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDeliveryTerms", setter="setDeliveryTerms")
     */
    private $deliveryTerms;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\PaymentTerms|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\PaymentTerms")
     * @JMS\Expose
     * @JMS\SerializedName("PaymentTerms")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPaymentTerms", setter="setPaymentTerms")
     */
    private $paymentTerms;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\CollectPaymentTerms|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\CollectPaymentTerms")
     * @JMS\Expose
     * @JMS\SerializedName("CollectPaymentTerms")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCollectPaymentTerms", setter="setCollectPaymentTerms")
     */
    private $collectPaymentTerms;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\DisbursementPaymentTerms|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\DisbursementPaymentTerms")
     * @JMS\Expose
     * @JMS\SerializedName("DisbursementPaymentTerms")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDisbursementPaymentTerms", setter="setDisbursementPaymentTerms")
     */
    private $disbursementPaymentTerms;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\PrepaidPaymentTerms|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\PrepaidPaymentTerms")
     * @JMS\Expose
     * @JMS\SerializedName("PrepaidPaymentTerms")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPrepaidPaymentTerms", setter="setPrepaidPaymentTerms")
     */
    private $prepaidPaymentTerms;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\FreightAllowanceCharge>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\FreightAllowanceCharge>")
     * @JMS\Expose
     * @JMS\SerializedName("FreightAllowanceCharge")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="FreightAllowanceCharge", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getFreightAllowanceCharge", setter="setFreightAllowanceCharge")
     */
    private $freightAllowanceCharge;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\ExtraAllowanceCharge>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\ExtraAllowanceCharge>")
     * @JMS\Expose
     * @JMS\SerializedName("ExtraAllowanceCharge")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ExtraAllowanceCharge", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getExtraAllowanceCharge", setter="setExtraAllowanceCharge")
     */
    private $extraAllowanceCharge;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\MainCarriageShipmentStage>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\MainCarriageShipmentStage>")
     * @JMS\Expose
     * @JMS\SerializedName("MainCarriageShipmentStage")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="MainCarriageShipmentStage", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getMainCarriageShipmentStage", setter="setMainCarriageShipmentStage")
     */
    private $mainCarriageShipmentStage;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\PreCarriageShipmentStage>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\PreCarriageShipmentStage>")
     * @JMS\Expose
     * @JMS\SerializedName("PreCarriageShipmentStage")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PreCarriageShipmentStage", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getPreCarriageShipmentStage", setter="setPreCarriageShipmentStage")
     */
    private $preCarriageShipmentStage;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\OnCarriageShipmentStage>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\OnCarriageShipmentStage>")
     * @JMS\Expose
     * @JMS\SerializedName("OnCarriageShipmentStage")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="OnCarriageShipmentStage", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getOnCarriageShipmentStage", setter="setOnCarriageShipmentStage")
     */
    private $onCarriageShipmentStage;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\TransportHandlingUnit>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\TransportHandlingUnit>")
     * @JMS\Expose
     * @JMS\SerializedName("TransportHandlingUnit")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TransportHandlingUnit", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getTransportHandlingUnit", setter="setTransportHandlingUnit")
     */
    private $transportHandlingUnit;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\FirstArrivalPortLocation|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\FirstArrivalPortLocation")
     * @JMS\Expose
     * @JMS\SerializedName("FirstArrivalPortLocation")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getFirstArrivalPortLocation", setter="setFirstArrivalPortLocation")
     */
    private $firstArrivalPortLocation;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\LastExitPortLocation|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\LastExitPortLocation")
     * @JMS\Expose
     * @JMS\SerializedName("LastExitPortLocation")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLastExitPortLocation", setter="setLastExitPortLocation")
     */
    private $lastExitPortLocation;

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ID|null
     */
    public function getID(): ?ID
    {
        return $this->iD;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ID
     */
    public function getIDWithCreate(): ID
    {
        $this->iD = is_null($this->iD) ? new ID() : $this->iD;

        return $this->iD;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ID|null $iD
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
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\CarrierAssignedID|null
     */
    public function getCarrierAssignedID(): ?CarrierAssignedID
    {
        return $this->carrierAssignedID;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\CarrierAssignedID
     */
    public function getCarrierAssignedIDWithCreate(): CarrierAssignedID
    {
        $this->carrierAssignedID = is_null($this->carrierAssignedID) ? new CarrierAssignedID() : $this->carrierAssignedID;

        return $this->carrierAssignedID;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\CarrierAssignedID|null $carrierAssignedID
     * @return self
     */
    public function setCarrierAssignedID(?CarrierAssignedID $carrierAssignedID = null): self
    {
        $this->carrierAssignedID = $carrierAssignedID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetCarrierAssignedID(): self
    {
        $this->carrierAssignedID = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ConsigneeAssignedID|null
     */
    public function getConsigneeAssignedID(): ?ConsigneeAssignedID
    {
        return $this->consigneeAssignedID;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ConsigneeAssignedID
     */
    public function getConsigneeAssignedIDWithCreate(): ConsigneeAssignedID
    {
        $this->consigneeAssignedID = is_null($this->consigneeAssignedID) ? new ConsigneeAssignedID() : $this->consigneeAssignedID;

        return $this->consigneeAssignedID;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ConsigneeAssignedID|null $consigneeAssignedID
     * @return self
     */
    public function setConsigneeAssignedID(?ConsigneeAssignedID $consigneeAssignedID = null): self
    {
        $this->consigneeAssignedID = $consigneeAssignedID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetConsigneeAssignedID(): self
    {
        $this->consigneeAssignedID = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ConsignorAssignedID|null
     */
    public function getConsignorAssignedID(): ?ConsignorAssignedID
    {
        return $this->consignorAssignedID;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ConsignorAssignedID
     */
    public function getConsignorAssignedIDWithCreate(): ConsignorAssignedID
    {
        $this->consignorAssignedID = is_null($this->consignorAssignedID) ? new ConsignorAssignedID() : $this->consignorAssignedID;

        return $this->consignorAssignedID;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ConsignorAssignedID|null $consignorAssignedID
     * @return self
     */
    public function setConsignorAssignedID(?ConsignorAssignedID $consignorAssignedID = null): self
    {
        $this->consignorAssignedID = $consignorAssignedID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetConsignorAssignedID(): self
    {
        $this->consignorAssignedID = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\FreightForwarderAssignedID|null
     */
    public function getFreightForwarderAssignedID(): ?FreightForwarderAssignedID
    {
        return $this->freightForwarderAssignedID;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\FreightForwarderAssignedID
     */
    public function getFreightForwarderAssignedIDWithCreate(): FreightForwarderAssignedID
    {
        $this->freightForwarderAssignedID = is_null($this->freightForwarderAssignedID) ? new FreightForwarderAssignedID() : $this->freightForwarderAssignedID;

        return $this->freightForwarderAssignedID;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\FreightForwarderAssignedID|null $freightForwarderAssignedID
     * @return self
     */
    public function setFreightForwarderAssignedID(
        ?FreightForwarderAssignedID $freightForwarderAssignedID = null,
    ): self {
        $this->freightForwarderAssignedID = $freightForwarderAssignedID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetFreightForwarderAssignedID(): self
    {
        $this->freightForwarderAssignedID = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\BrokerAssignedID|null
     */
    public function getBrokerAssignedID(): ?BrokerAssignedID
    {
        return $this->brokerAssignedID;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\BrokerAssignedID
     */
    public function getBrokerAssignedIDWithCreate(): BrokerAssignedID
    {
        $this->brokerAssignedID = is_null($this->brokerAssignedID) ? new BrokerAssignedID() : $this->brokerAssignedID;

        return $this->brokerAssignedID;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\BrokerAssignedID|null $brokerAssignedID
     * @return self
     */
    public function setBrokerAssignedID(?BrokerAssignedID $brokerAssignedID = null): self
    {
        $this->brokerAssignedID = $brokerAssignedID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetBrokerAssignedID(): self
    {
        $this->brokerAssignedID = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ContractedCarrierAssignedID|null
     */
    public function getContractedCarrierAssignedID(): ?ContractedCarrierAssignedID
    {
        return $this->contractedCarrierAssignedID;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ContractedCarrierAssignedID
     */
    public function getContractedCarrierAssignedIDWithCreate(): ContractedCarrierAssignedID
    {
        $this->contractedCarrierAssignedID = is_null($this->contractedCarrierAssignedID) ? new ContractedCarrierAssignedID() : $this->contractedCarrierAssignedID;

        return $this->contractedCarrierAssignedID;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ContractedCarrierAssignedID|null $contractedCarrierAssignedID
     * @return self
     */
    public function setContractedCarrierAssignedID(
        ?ContractedCarrierAssignedID $contractedCarrierAssignedID = null,
    ): self {
        $this->contractedCarrierAssignedID = $contractedCarrierAssignedID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetContractedCarrierAssignedID(): self
    {
        $this->contractedCarrierAssignedID = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\PerformingCarrierAssignedID|null
     */
    public function getPerformingCarrierAssignedID(): ?PerformingCarrierAssignedID
    {
        return $this->performingCarrierAssignedID;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\PerformingCarrierAssignedID
     */
    public function getPerformingCarrierAssignedIDWithCreate(): PerformingCarrierAssignedID
    {
        $this->performingCarrierAssignedID = is_null($this->performingCarrierAssignedID) ? new PerformingCarrierAssignedID() : $this->performingCarrierAssignedID;

        return $this->performingCarrierAssignedID;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\PerformingCarrierAssignedID|null $performingCarrierAssignedID
     * @return self
     */
    public function setPerformingCarrierAssignedID(
        ?PerformingCarrierAssignedID $performingCarrierAssignedID = null,
    ): self {
        $this->performingCarrierAssignedID = $performingCarrierAssignedID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPerformingCarrierAssignedID(): self
    {
        $this->performingCarrierAssignedID = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\SummaryDescription>|null
     */
    public function getSummaryDescription(): ?array
    {
        return $this->summaryDescription;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\SummaryDescription>|null $summaryDescription
     * @return self
     */
    public function setSummaryDescription(?array $summaryDescription = null): self
    {
        $this->summaryDescription = $summaryDescription;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSummaryDescription(): self
    {
        $this->summaryDescription = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearSummaryDescription(): self
    {
        $this->summaryDescription = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\SummaryDescription|null
     */
    public function firstSummaryDescription(): ?SummaryDescription
    {
        $summaryDescription = $this->summaryDescription ?? [];
        $summaryDescription = reset($summaryDescription);

        if ($summaryDescription === false) {
            return null;
        }

        return $summaryDescription;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\SummaryDescription|null
     */
    public function lastSummaryDescription(): ?SummaryDescription
    {
        $summaryDescription = $this->summaryDescription ?? [];
        $summaryDescription = end($summaryDescription);

        if ($summaryDescription === false) {
            return null;
        }

        return $summaryDescription;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\SummaryDescription $summaryDescription
     * @return self
     */
    public function addToSummaryDescription(SummaryDescription $summaryDescription): self
    {
        $this->summaryDescription[] = $summaryDescription;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\SummaryDescription
     */
    public function addToSummaryDescriptionWithCreate(): SummaryDescription
    {
        $this->addTosummaryDescription($summaryDescription = new SummaryDescription());

        return $summaryDescription;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\SummaryDescription $summaryDescription
     * @return self
     */
    public function addOnceToSummaryDescription(SummaryDescription $summaryDescription): self
    {
        if (!is_array($this->summaryDescription)) {
            $this->summaryDescription = [];
        }

        $this->summaryDescription[0] = $summaryDescription;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\SummaryDescription
     */
    public function addOnceToSummaryDescriptionWithCreate(): SummaryDescription
    {
        if (!is_array($this->summaryDescription)) {
            $this->summaryDescription = [];
        }

        if ($this->summaryDescription === []) {
            $this->addOnceTosummaryDescription(new SummaryDescription());
        }

        return $this->summaryDescription[0];
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TotalInvoiceAmount|null
     */
    public function getTotalInvoiceAmount(): ?TotalInvoiceAmount
    {
        return $this->totalInvoiceAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TotalInvoiceAmount
     */
    public function getTotalInvoiceAmountWithCreate(): TotalInvoiceAmount
    {
        $this->totalInvoiceAmount = is_null($this->totalInvoiceAmount) ? new TotalInvoiceAmount() : $this->totalInvoiceAmount;

        return $this->totalInvoiceAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\TotalInvoiceAmount|null $totalInvoiceAmount
     * @return self
     */
    public function setTotalInvoiceAmount(?TotalInvoiceAmount $totalInvoiceAmount = null): self
    {
        $this->totalInvoiceAmount = $totalInvoiceAmount;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTotalInvoiceAmount(): self
    {
        $this->totalInvoiceAmount = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\DeclaredCustomsValueAmount|null
     */
    public function getDeclaredCustomsValueAmount(): ?DeclaredCustomsValueAmount
    {
        return $this->declaredCustomsValueAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\DeclaredCustomsValueAmount
     */
    public function getDeclaredCustomsValueAmountWithCreate(): DeclaredCustomsValueAmount
    {
        $this->declaredCustomsValueAmount = is_null($this->declaredCustomsValueAmount) ? new DeclaredCustomsValueAmount() : $this->declaredCustomsValueAmount;

        return $this->declaredCustomsValueAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\DeclaredCustomsValueAmount|null $declaredCustomsValueAmount
     * @return self
     */
    public function setDeclaredCustomsValueAmount(
        ?DeclaredCustomsValueAmount $declaredCustomsValueAmount = null,
    ): self {
        $this->declaredCustomsValueAmount = $declaredCustomsValueAmount;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDeclaredCustomsValueAmount(): self
    {
        $this->declaredCustomsValueAmount = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\TariffDescription>|null
     */
    public function getTariffDescription(): ?array
    {
        return $this->tariffDescription;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\TariffDescription>|null $tariffDescription
     * @return self
     */
    public function setTariffDescription(?array $tariffDescription = null): self
    {
        $this->tariffDescription = $tariffDescription;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTariffDescription(): self
    {
        $this->tariffDescription = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearTariffDescription(): self
    {
        $this->tariffDescription = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TariffDescription|null
     */
    public function firstTariffDescription(): ?TariffDescription
    {
        $tariffDescription = $this->tariffDescription ?? [];
        $tariffDescription = reset($tariffDescription);

        if ($tariffDescription === false) {
            return null;
        }

        return $tariffDescription;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TariffDescription|null
     */
    public function lastTariffDescription(): ?TariffDescription
    {
        $tariffDescription = $this->tariffDescription ?? [];
        $tariffDescription = end($tariffDescription);

        if ($tariffDescription === false) {
            return null;
        }

        return $tariffDescription;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\TariffDescription $tariffDescription
     * @return self
     */
    public function addToTariffDescription(TariffDescription $tariffDescription): self
    {
        $this->tariffDescription[] = $tariffDescription;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TariffDescription
     */
    public function addToTariffDescriptionWithCreate(): TariffDescription
    {
        $this->addTotariffDescription($tariffDescription = new TariffDescription());

        return $tariffDescription;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\TariffDescription $tariffDescription
     * @return self
     */
    public function addOnceToTariffDescription(TariffDescription $tariffDescription): self
    {
        if (!is_array($this->tariffDescription)) {
            $this->tariffDescription = [];
        }

        $this->tariffDescription[0] = $tariffDescription;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TariffDescription
     */
    public function addOnceToTariffDescriptionWithCreate(): TariffDescription
    {
        if (!is_array($this->tariffDescription)) {
            $this->tariffDescription = [];
        }

        if ($this->tariffDescription === []) {
            $this->addOnceTotariffDescription(new TariffDescription());
        }

        return $this->tariffDescription[0];
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TariffCode|null
     */
    public function getTariffCode(): ?TariffCode
    {
        return $this->tariffCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TariffCode
     */
    public function getTariffCodeWithCreate(): TariffCode
    {
        $this->tariffCode = is_null($this->tariffCode) ? new TariffCode() : $this->tariffCode;

        return $this->tariffCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\TariffCode|null $tariffCode
     * @return self
     */
    public function setTariffCode(?TariffCode $tariffCode = null): self
    {
        $this->tariffCode = $tariffCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTariffCode(): self
    {
        $this->tariffCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\InsurancePremiumAmount|null
     */
    public function getInsurancePremiumAmount(): ?InsurancePremiumAmount
    {
        return $this->insurancePremiumAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\InsurancePremiumAmount
     */
    public function getInsurancePremiumAmountWithCreate(): InsurancePremiumAmount
    {
        $this->insurancePremiumAmount = is_null($this->insurancePremiumAmount) ? new InsurancePremiumAmount() : $this->insurancePremiumAmount;

        return $this->insurancePremiumAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\InsurancePremiumAmount|null $insurancePremiumAmount
     * @return self
     */
    public function setInsurancePremiumAmount(?InsurancePremiumAmount $insurancePremiumAmount = null): self
    {
        $this->insurancePremiumAmount = $insurancePremiumAmount;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetInsurancePremiumAmount(): self
    {
        $this->insurancePremiumAmount = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\GrossWeightMeasure|null
     */
    public function getGrossWeightMeasure(): ?GrossWeightMeasure
    {
        return $this->grossWeightMeasure;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\GrossWeightMeasure
     */
    public function getGrossWeightMeasureWithCreate(): GrossWeightMeasure
    {
        $this->grossWeightMeasure = is_null($this->grossWeightMeasure) ? new GrossWeightMeasure() : $this->grossWeightMeasure;

        return $this->grossWeightMeasure;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\GrossWeightMeasure|null $grossWeightMeasure
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
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\NetWeightMeasure|null
     */
    public function getNetWeightMeasure(): ?NetWeightMeasure
    {
        return $this->netWeightMeasure;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\NetWeightMeasure
     */
    public function getNetWeightMeasureWithCreate(): NetWeightMeasure
    {
        $this->netWeightMeasure = is_null($this->netWeightMeasure) ? new NetWeightMeasure() : $this->netWeightMeasure;

        return $this->netWeightMeasure;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\NetWeightMeasure|null $netWeightMeasure
     * @return self
     */
    public function setNetWeightMeasure(?NetWeightMeasure $netWeightMeasure = null): self
    {
        $this->netWeightMeasure = $netWeightMeasure;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetNetWeightMeasure(): self
    {
        $this->netWeightMeasure = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\NetNetWeightMeasure|null
     */
    public function getNetNetWeightMeasure(): ?NetNetWeightMeasure
    {
        return $this->netNetWeightMeasure;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\NetNetWeightMeasure
     */
    public function getNetNetWeightMeasureWithCreate(): NetNetWeightMeasure
    {
        $this->netNetWeightMeasure = is_null($this->netNetWeightMeasure) ? new NetNetWeightMeasure() : $this->netNetWeightMeasure;

        return $this->netNetWeightMeasure;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\NetNetWeightMeasure|null $netNetWeightMeasure
     * @return self
     */
    public function setNetNetWeightMeasure(?NetNetWeightMeasure $netNetWeightMeasure = null): self
    {
        $this->netNetWeightMeasure = $netNetWeightMeasure;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetNetNetWeightMeasure(): self
    {
        $this->netNetWeightMeasure = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ChargeableWeightMeasure|null
     */
    public function getChargeableWeightMeasure(): ?ChargeableWeightMeasure
    {
        return $this->chargeableWeightMeasure;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ChargeableWeightMeasure
     */
    public function getChargeableWeightMeasureWithCreate(): ChargeableWeightMeasure
    {
        $this->chargeableWeightMeasure = is_null($this->chargeableWeightMeasure) ? new ChargeableWeightMeasure() : $this->chargeableWeightMeasure;

        return $this->chargeableWeightMeasure;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ChargeableWeightMeasure|null $chargeableWeightMeasure
     * @return self
     */
    public function setChargeableWeightMeasure(?ChargeableWeightMeasure $chargeableWeightMeasure = null): self
    {
        $this->chargeableWeightMeasure = $chargeableWeightMeasure;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetChargeableWeightMeasure(): self
    {
        $this->chargeableWeightMeasure = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\GrossVolumeMeasure|null
     */
    public function getGrossVolumeMeasure(): ?GrossVolumeMeasure
    {
        return $this->grossVolumeMeasure;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\GrossVolumeMeasure
     */
    public function getGrossVolumeMeasureWithCreate(): GrossVolumeMeasure
    {
        $this->grossVolumeMeasure = is_null($this->grossVolumeMeasure) ? new GrossVolumeMeasure() : $this->grossVolumeMeasure;

        return $this->grossVolumeMeasure;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\GrossVolumeMeasure|null $grossVolumeMeasure
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
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\NetVolumeMeasure|null
     */
    public function getNetVolumeMeasure(): ?NetVolumeMeasure
    {
        return $this->netVolumeMeasure;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\NetVolumeMeasure
     */
    public function getNetVolumeMeasureWithCreate(): NetVolumeMeasure
    {
        $this->netVolumeMeasure = is_null($this->netVolumeMeasure) ? new NetVolumeMeasure() : $this->netVolumeMeasure;

        return $this->netVolumeMeasure;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\NetVolumeMeasure|null $netVolumeMeasure
     * @return self
     */
    public function setNetVolumeMeasure(?NetVolumeMeasure $netVolumeMeasure = null): self
    {
        $this->netVolumeMeasure = $netVolumeMeasure;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetNetVolumeMeasure(): self
    {
        $this->netVolumeMeasure = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\LoadingLengthMeasure|null
     */
    public function getLoadingLengthMeasure(): ?LoadingLengthMeasure
    {
        return $this->loadingLengthMeasure;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\LoadingLengthMeasure
     */
    public function getLoadingLengthMeasureWithCreate(): LoadingLengthMeasure
    {
        $this->loadingLengthMeasure = is_null($this->loadingLengthMeasure) ? new LoadingLengthMeasure() : $this->loadingLengthMeasure;

        return $this->loadingLengthMeasure;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\LoadingLengthMeasure|null $loadingLengthMeasure
     * @return self
     */
    public function setLoadingLengthMeasure(?LoadingLengthMeasure $loadingLengthMeasure = null): self
    {
        $this->loadingLengthMeasure = $loadingLengthMeasure;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetLoadingLengthMeasure(): self
    {
        $this->loadingLengthMeasure = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Remarks>|null
     */
    public function getRemarks(): ?array
    {
        return $this->remarks;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Remarks>|null $remarks
     * @return self
     */
    public function setRemarks(?array $remarks = null): self
    {
        $this->remarks = $remarks;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetRemarks(): self
    {
        $this->remarks = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearRemarks(): self
    {
        $this->remarks = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Remarks|null
     */
    public function firstRemarks(): ?Remarks
    {
        $remarks = $this->remarks ?? [];
        $remarks = reset($remarks);

        if ($remarks === false) {
            return null;
        }

        return $remarks;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Remarks|null
     */
    public function lastRemarks(): ?Remarks
    {
        $remarks = $this->remarks ?? [];
        $remarks = end($remarks);

        if ($remarks === false) {
            return null;
        }

        return $remarks;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Remarks $remarks
     * @return self
     */
    public function addToRemarks(Remarks $remarks): self
    {
        $this->remarks[] = $remarks;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Remarks
     */
    public function addToRemarksWithCreate(): Remarks
    {
        $this->addToremarks($remarks = new Remarks());

        return $remarks;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Remarks $remarks
     * @return self
     */
    public function addOnceToRemarks(Remarks $remarks): self
    {
        if (!is_array($this->remarks)) {
            $this->remarks = [];
        }

        $this->remarks[0] = $remarks;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Remarks
     */
    public function addOnceToRemarksWithCreate(): Remarks
    {
        if (!is_array($this->remarks)) {
            $this->remarks = [];
        }

        if ($this->remarks === []) {
            $this->addOnceToremarks(new Remarks());
        }

        return $this->remarks[0];
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
     * @return self
     */
    public function unsetHazardousRiskIndicator(): self
    {
        $this->hazardousRiskIndicator = null;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getAnimalFoodIndicator(): ?bool
    {
        return $this->animalFoodIndicator;
    }

    /**
     * @param bool|null $animalFoodIndicator
     * @return self
     */
    public function setAnimalFoodIndicator(?bool $animalFoodIndicator = null): self
    {
        $this->animalFoodIndicator = $animalFoodIndicator;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetAnimalFoodIndicator(): self
    {
        $this->animalFoodIndicator = null;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getHumanFoodIndicator(): ?bool
    {
        return $this->humanFoodIndicator;
    }

    /**
     * @param bool|null $humanFoodIndicator
     * @return self
     */
    public function setHumanFoodIndicator(?bool $humanFoodIndicator = null): self
    {
        $this->humanFoodIndicator = $humanFoodIndicator;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetHumanFoodIndicator(): self
    {
        $this->humanFoodIndicator = null;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getLivestockIndicator(): ?bool
    {
        return $this->livestockIndicator;
    }

    /**
     * @param bool|null $livestockIndicator
     * @return self
     */
    public function setLivestockIndicator(?bool $livestockIndicator = null): self
    {
        $this->livestockIndicator = $livestockIndicator;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetLivestockIndicator(): self
    {
        $this->livestockIndicator = null;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getBulkCargoIndicator(): ?bool
    {
        return $this->bulkCargoIndicator;
    }

    /**
     * @param bool|null $bulkCargoIndicator
     * @return self
     */
    public function setBulkCargoIndicator(?bool $bulkCargoIndicator = null): self
    {
        $this->bulkCargoIndicator = $bulkCargoIndicator;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetBulkCargoIndicator(): self
    {
        $this->bulkCargoIndicator = null;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getContainerizedIndicator(): ?bool
    {
        return $this->containerizedIndicator;
    }

    /**
     * @param bool|null $containerizedIndicator
     * @return self
     */
    public function setContainerizedIndicator(?bool $containerizedIndicator = null): self
    {
        $this->containerizedIndicator = $containerizedIndicator;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetContainerizedIndicator(): self
    {
        $this->containerizedIndicator = null;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getGeneralCargoIndicator(): ?bool
    {
        return $this->generalCargoIndicator;
    }

    /**
     * @param bool|null $generalCargoIndicator
     * @return self
     */
    public function setGeneralCargoIndicator(?bool $generalCargoIndicator = null): self
    {
        $this->generalCargoIndicator = $generalCargoIndicator;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetGeneralCargoIndicator(): self
    {
        $this->generalCargoIndicator = null;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getSpecialSecurityIndicator(): ?bool
    {
        return $this->specialSecurityIndicator;
    }

    /**
     * @param bool|null $specialSecurityIndicator
     * @return self
     */
    public function setSpecialSecurityIndicator(?bool $specialSecurityIndicator = null): self
    {
        $this->specialSecurityIndicator = $specialSecurityIndicator;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSpecialSecurityIndicator(): self
    {
        $this->specialSecurityIndicator = null;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getThirdPartyPayerIndicator(): ?bool
    {
        return $this->thirdPartyPayerIndicator;
    }

    /**
     * @param bool|null $thirdPartyPayerIndicator
     * @return self
     */
    public function setThirdPartyPayerIndicator(?bool $thirdPartyPayerIndicator = null): self
    {
        $this->thirdPartyPayerIndicator = $thirdPartyPayerIndicator;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetThirdPartyPayerIndicator(): self
    {
        $this->thirdPartyPayerIndicator = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\CarrierServiceInstructions>|null
     */
    public function getCarrierServiceInstructions(): ?array
    {
        return $this->carrierServiceInstructions;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\CarrierServiceInstructions>|null $carrierServiceInstructions
     * @return self
     */
    public function setCarrierServiceInstructions(?array $carrierServiceInstructions = null): self
    {
        $this->carrierServiceInstructions = $carrierServiceInstructions;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetCarrierServiceInstructions(): self
    {
        $this->carrierServiceInstructions = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearCarrierServiceInstructions(): self
    {
        $this->carrierServiceInstructions = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\CarrierServiceInstructions|null
     */
    public function firstCarrierServiceInstructions(): ?CarrierServiceInstructions
    {
        $carrierServiceInstructions = $this->carrierServiceInstructions ?? [];
        $carrierServiceInstructions = reset($carrierServiceInstructions);

        if ($carrierServiceInstructions === false) {
            return null;
        }

        return $carrierServiceInstructions;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\CarrierServiceInstructions|null
     */
    public function lastCarrierServiceInstructions(): ?CarrierServiceInstructions
    {
        $carrierServiceInstructions = $this->carrierServiceInstructions ?? [];
        $carrierServiceInstructions = end($carrierServiceInstructions);

        if ($carrierServiceInstructions === false) {
            return null;
        }

        return $carrierServiceInstructions;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\CarrierServiceInstructions $carrierServiceInstructions
     * @return self
     */
    public function addToCarrierServiceInstructions(CarrierServiceInstructions $carrierServiceInstructions): self
    {
        $this->carrierServiceInstructions[] = $carrierServiceInstructions;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\CarrierServiceInstructions
     */
    public function addToCarrierServiceInstructionsWithCreate(): CarrierServiceInstructions
    {
        $this->addTocarrierServiceInstructions($carrierServiceInstructions = new CarrierServiceInstructions());

        return $carrierServiceInstructions;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\CarrierServiceInstructions $carrierServiceInstructions
     * @return self
     */
    public function addOnceToCarrierServiceInstructions(CarrierServiceInstructions $carrierServiceInstructions): self
    {
        if (!is_array($this->carrierServiceInstructions)) {
            $this->carrierServiceInstructions = [];
        }

        $this->carrierServiceInstructions[0] = $carrierServiceInstructions;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\CarrierServiceInstructions
     */
    public function addOnceToCarrierServiceInstructionsWithCreate(): CarrierServiceInstructions
    {
        if (!is_array($this->carrierServiceInstructions)) {
            $this->carrierServiceInstructions = [];
        }

        if ($this->carrierServiceInstructions === []) {
            $this->addOnceTocarrierServiceInstructions(new CarrierServiceInstructions());
        }

        return $this->carrierServiceInstructions[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\CustomsClearanceServiceInstructions>|null
     */
    public function getCustomsClearanceServiceInstructions(): ?array
    {
        return $this->customsClearanceServiceInstructions;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\CustomsClearanceServiceInstructions>|null $customsClearanceServiceInstructions
     * @return self
     */
    public function setCustomsClearanceServiceInstructions(?array $customsClearanceServiceInstructions = null): self
    {
        $this->customsClearanceServiceInstructions = $customsClearanceServiceInstructions;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetCustomsClearanceServiceInstructions(): self
    {
        $this->customsClearanceServiceInstructions = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearCustomsClearanceServiceInstructions(): self
    {
        $this->customsClearanceServiceInstructions = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\CustomsClearanceServiceInstructions|null
     */
    public function firstCustomsClearanceServiceInstructions(): ?CustomsClearanceServiceInstructions
    {
        $customsClearanceServiceInstructions = $this->customsClearanceServiceInstructions ?? [];
        $customsClearanceServiceInstructions = reset($customsClearanceServiceInstructions);

        if ($customsClearanceServiceInstructions === false) {
            return null;
        }

        return $customsClearanceServiceInstructions;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\CustomsClearanceServiceInstructions|null
     */
    public function lastCustomsClearanceServiceInstructions(): ?CustomsClearanceServiceInstructions
    {
        $customsClearanceServiceInstructions = $this->customsClearanceServiceInstructions ?? [];
        $customsClearanceServiceInstructions = end($customsClearanceServiceInstructions);

        if ($customsClearanceServiceInstructions === false) {
            return null;
        }

        return $customsClearanceServiceInstructions;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\CustomsClearanceServiceInstructions $customsClearanceServiceInstructions
     * @return self
     */
    public function addToCustomsClearanceServiceInstructions(
        CustomsClearanceServiceInstructions $customsClearanceServiceInstructions,
    ): self {
        $this->customsClearanceServiceInstructions[] = $customsClearanceServiceInstructions;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\CustomsClearanceServiceInstructions
     */
    public function addToCustomsClearanceServiceInstructionsWithCreate(): CustomsClearanceServiceInstructions
    {
        $this->addTocustomsClearanceServiceInstructions($customsClearanceServiceInstructions = new CustomsClearanceServiceInstructions());

        return $customsClearanceServiceInstructions;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\CustomsClearanceServiceInstructions $customsClearanceServiceInstructions
     * @return self
     */
    public function addOnceToCustomsClearanceServiceInstructions(
        CustomsClearanceServiceInstructions $customsClearanceServiceInstructions,
    ): self {
        if (!is_array($this->customsClearanceServiceInstructions)) {
            $this->customsClearanceServiceInstructions = [];
        }

        $this->customsClearanceServiceInstructions[0] = $customsClearanceServiceInstructions;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\CustomsClearanceServiceInstructions
     */
    public function addOnceToCustomsClearanceServiceInstructionsWithCreate(): CustomsClearanceServiceInstructions
    {
        if (!is_array($this->customsClearanceServiceInstructions)) {
            $this->customsClearanceServiceInstructions = [];
        }

        if ($this->customsClearanceServiceInstructions === []) {
            $this->addOnceTocustomsClearanceServiceInstructions(new CustomsClearanceServiceInstructions());
        }

        return $this->customsClearanceServiceInstructions[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\ForwarderServiceInstructions>|null
     */
    public function getForwarderServiceInstructions(): ?array
    {
        return $this->forwarderServiceInstructions;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\ForwarderServiceInstructions>|null $forwarderServiceInstructions
     * @return self
     */
    public function setForwarderServiceInstructions(?array $forwarderServiceInstructions = null): self
    {
        $this->forwarderServiceInstructions = $forwarderServiceInstructions;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetForwarderServiceInstructions(): self
    {
        $this->forwarderServiceInstructions = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearForwarderServiceInstructions(): self
    {
        $this->forwarderServiceInstructions = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ForwarderServiceInstructions|null
     */
    public function firstForwarderServiceInstructions(): ?ForwarderServiceInstructions
    {
        $forwarderServiceInstructions = $this->forwarderServiceInstructions ?? [];
        $forwarderServiceInstructions = reset($forwarderServiceInstructions);

        if ($forwarderServiceInstructions === false) {
            return null;
        }

        return $forwarderServiceInstructions;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ForwarderServiceInstructions|null
     */
    public function lastForwarderServiceInstructions(): ?ForwarderServiceInstructions
    {
        $forwarderServiceInstructions = $this->forwarderServiceInstructions ?? [];
        $forwarderServiceInstructions = end($forwarderServiceInstructions);

        if ($forwarderServiceInstructions === false) {
            return null;
        }

        return $forwarderServiceInstructions;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ForwarderServiceInstructions $forwarderServiceInstructions
     * @return self
     */
    public function addToForwarderServiceInstructions(
        ForwarderServiceInstructions $forwarderServiceInstructions,
    ): self {
        $this->forwarderServiceInstructions[] = $forwarderServiceInstructions;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ForwarderServiceInstructions
     */
    public function addToForwarderServiceInstructionsWithCreate(): ForwarderServiceInstructions
    {
        $this->addToforwarderServiceInstructions($forwarderServiceInstructions = new ForwarderServiceInstructions());

        return $forwarderServiceInstructions;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ForwarderServiceInstructions $forwarderServiceInstructions
     * @return self
     */
    public function addOnceToForwarderServiceInstructions(
        ForwarderServiceInstructions $forwarderServiceInstructions,
    ): self {
        if (!is_array($this->forwarderServiceInstructions)) {
            $this->forwarderServiceInstructions = [];
        }

        $this->forwarderServiceInstructions[0] = $forwarderServiceInstructions;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ForwarderServiceInstructions
     */
    public function addOnceToForwarderServiceInstructionsWithCreate(): ForwarderServiceInstructions
    {
        if (!is_array($this->forwarderServiceInstructions)) {
            $this->forwarderServiceInstructions = [];
        }

        if ($this->forwarderServiceInstructions === []) {
            $this->addOnceToforwarderServiceInstructions(new ForwarderServiceInstructions());
        }

        return $this->forwarderServiceInstructions[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\SpecialServiceInstructions>|null
     */
    public function getSpecialServiceInstructions(): ?array
    {
        return $this->specialServiceInstructions;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\SpecialServiceInstructions>|null $specialServiceInstructions
     * @return self
     */
    public function setSpecialServiceInstructions(?array $specialServiceInstructions = null): self
    {
        $this->specialServiceInstructions = $specialServiceInstructions;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSpecialServiceInstructions(): self
    {
        $this->specialServiceInstructions = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearSpecialServiceInstructions(): self
    {
        $this->specialServiceInstructions = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\SpecialServiceInstructions|null
     */
    public function firstSpecialServiceInstructions(): ?SpecialServiceInstructions
    {
        $specialServiceInstructions = $this->specialServiceInstructions ?? [];
        $specialServiceInstructions = reset($specialServiceInstructions);

        if ($specialServiceInstructions === false) {
            return null;
        }

        return $specialServiceInstructions;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\SpecialServiceInstructions|null
     */
    public function lastSpecialServiceInstructions(): ?SpecialServiceInstructions
    {
        $specialServiceInstructions = $this->specialServiceInstructions ?? [];
        $specialServiceInstructions = end($specialServiceInstructions);

        if ($specialServiceInstructions === false) {
            return null;
        }

        return $specialServiceInstructions;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\SpecialServiceInstructions $specialServiceInstructions
     * @return self
     */
    public function addToSpecialServiceInstructions(SpecialServiceInstructions $specialServiceInstructions): self
    {
        $this->specialServiceInstructions[] = $specialServiceInstructions;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\SpecialServiceInstructions
     */
    public function addToSpecialServiceInstructionsWithCreate(): SpecialServiceInstructions
    {
        $this->addTospecialServiceInstructions($specialServiceInstructions = new SpecialServiceInstructions());

        return $specialServiceInstructions;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\SpecialServiceInstructions $specialServiceInstructions
     * @return self
     */
    public function addOnceToSpecialServiceInstructions(SpecialServiceInstructions $specialServiceInstructions): self
    {
        if (!is_array($this->specialServiceInstructions)) {
            $this->specialServiceInstructions = [];
        }

        $this->specialServiceInstructions[0] = $specialServiceInstructions;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\SpecialServiceInstructions
     */
    public function addOnceToSpecialServiceInstructionsWithCreate(): SpecialServiceInstructions
    {
        if (!is_array($this->specialServiceInstructions)) {
            $this->specialServiceInstructions = [];
        }

        if ($this->specialServiceInstructions === []) {
            $this->addOnceTospecialServiceInstructions(new SpecialServiceInstructions());
        }

        return $this->specialServiceInstructions[0];
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\SequenceID|null
     */
    public function getSequenceID(): ?SequenceID
    {
        return $this->sequenceID;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\SequenceID
     */
    public function getSequenceIDWithCreate(): SequenceID
    {
        $this->sequenceID = is_null($this->sequenceID) ? new SequenceID() : $this->sequenceID;

        return $this->sequenceID;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\SequenceID|null $sequenceID
     * @return self
     */
    public function setSequenceID(?SequenceID $sequenceID = null): self
    {
        $this->sequenceID = $sequenceID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSequenceID(): self
    {
        $this->sequenceID = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ShippingPriorityLevelCode|null
     */
    public function getShippingPriorityLevelCode(): ?ShippingPriorityLevelCode
    {
        return $this->shippingPriorityLevelCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ShippingPriorityLevelCode
     */
    public function getShippingPriorityLevelCodeWithCreate(): ShippingPriorityLevelCode
    {
        $this->shippingPriorityLevelCode = is_null($this->shippingPriorityLevelCode) ? new ShippingPriorityLevelCode() : $this->shippingPriorityLevelCode;

        return $this->shippingPriorityLevelCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ShippingPriorityLevelCode|null $shippingPriorityLevelCode
     * @return self
     */
    public function setShippingPriorityLevelCode(?ShippingPriorityLevelCode $shippingPriorityLevelCode = null): self
    {
        $this->shippingPriorityLevelCode = $shippingPriorityLevelCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetShippingPriorityLevelCode(): self
    {
        $this->shippingPriorityLevelCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\HandlingCode|null
     */
    public function getHandlingCode(): ?HandlingCode
    {
        return $this->handlingCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\HandlingCode
     */
    public function getHandlingCodeWithCreate(): HandlingCode
    {
        $this->handlingCode = is_null($this->handlingCode) ? new HandlingCode() : $this->handlingCode;

        return $this->handlingCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\HandlingCode|null $handlingCode
     * @return self
     */
    public function setHandlingCode(?HandlingCode $handlingCode = null): self
    {
        $this->handlingCode = $handlingCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetHandlingCode(): self
    {
        $this->handlingCode = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\HandlingInstructions>|null
     */
    public function getHandlingInstructions(): ?array
    {
        return $this->handlingInstructions;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\HandlingInstructions>|null $handlingInstructions
     * @return self
     */
    public function setHandlingInstructions(?array $handlingInstructions = null): self
    {
        $this->handlingInstructions = $handlingInstructions;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetHandlingInstructions(): self
    {
        $this->handlingInstructions = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearHandlingInstructions(): self
    {
        $this->handlingInstructions = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\HandlingInstructions|null
     */
    public function firstHandlingInstructions(): ?HandlingInstructions
    {
        $handlingInstructions = $this->handlingInstructions ?? [];
        $handlingInstructions = reset($handlingInstructions);

        if ($handlingInstructions === false) {
            return null;
        }

        return $handlingInstructions;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\HandlingInstructions|null
     */
    public function lastHandlingInstructions(): ?HandlingInstructions
    {
        $handlingInstructions = $this->handlingInstructions ?? [];
        $handlingInstructions = end($handlingInstructions);

        if ($handlingInstructions === false) {
            return null;
        }

        return $handlingInstructions;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\HandlingInstructions $handlingInstructions
     * @return self
     */
    public function addToHandlingInstructions(HandlingInstructions $handlingInstructions): self
    {
        $this->handlingInstructions[] = $handlingInstructions;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\HandlingInstructions
     */
    public function addToHandlingInstructionsWithCreate(): HandlingInstructions
    {
        $this->addTohandlingInstructions($handlingInstructions = new HandlingInstructions());

        return $handlingInstructions;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\HandlingInstructions $handlingInstructions
     * @return self
     */
    public function addOnceToHandlingInstructions(HandlingInstructions $handlingInstructions): self
    {
        if (!is_array($this->handlingInstructions)) {
            $this->handlingInstructions = [];
        }

        $this->handlingInstructions[0] = $handlingInstructions;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\HandlingInstructions
     */
    public function addOnceToHandlingInstructionsWithCreate(): HandlingInstructions
    {
        if (!is_array($this->handlingInstructions)) {
            $this->handlingInstructions = [];
        }

        if ($this->handlingInstructions === []) {
            $this->addOnceTohandlingInstructions(new HandlingInstructions());
        }

        return $this->handlingInstructions[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Information>|null
     */
    public function getInformation(): ?array
    {
        return $this->information;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Information>|null $information
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
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Information|null
     */
    public function firstInformation(): ?Information
    {
        $information = $this->information ?? [];
        $information = reset($information);

        if ($information === false) {
            return null;
        }

        return $information;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Information|null
     */
    public function lastInformation(): ?Information
    {
        $information = $this->information ?? [];
        $information = end($information);

        if ($information === false) {
            return null;
        }

        return $information;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Information $information
     * @return self
     */
    public function addToInformation(Information $information): self
    {
        $this->information[] = $information;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Information
     */
    public function addToInformationWithCreate(): Information
    {
        $this->addToinformation($information = new Information());

        return $information;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Information $information
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
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Information
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
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TotalGoodsItemQuantity|null
     */
    public function getTotalGoodsItemQuantity(): ?TotalGoodsItemQuantity
    {
        return $this->totalGoodsItemQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TotalGoodsItemQuantity
     */
    public function getTotalGoodsItemQuantityWithCreate(): TotalGoodsItemQuantity
    {
        $this->totalGoodsItemQuantity = is_null($this->totalGoodsItemQuantity) ? new TotalGoodsItemQuantity() : $this->totalGoodsItemQuantity;

        return $this->totalGoodsItemQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\TotalGoodsItemQuantity|null $totalGoodsItemQuantity
     * @return self
     */
    public function setTotalGoodsItemQuantity(?TotalGoodsItemQuantity $totalGoodsItemQuantity = null): self
    {
        $this->totalGoodsItemQuantity = $totalGoodsItemQuantity;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTotalGoodsItemQuantity(): self
    {
        $this->totalGoodsItemQuantity = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TotalTransportHandlingUnitQuantity|null
     */
    public function getTotalTransportHandlingUnitQuantity(): ?TotalTransportHandlingUnitQuantity
    {
        return $this->totalTransportHandlingUnitQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TotalTransportHandlingUnitQuantity
     */
    public function getTotalTransportHandlingUnitQuantityWithCreate(): TotalTransportHandlingUnitQuantity
    {
        $this->totalTransportHandlingUnitQuantity = is_null($this->totalTransportHandlingUnitQuantity) ? new TotalTransportHandlingUnitQuantity() : $this->totalTransportHandlingUnitQuantity;

        return $this->totalTransportHandlingUnitQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\TotalTransportHandlingUnitQuantity|null $totalTransportHandlingUnitQuantity
     * @return self
     */
    public function setTotalTransportHandlingUnitQuantity(
        ?TotalTransportHandlingUnitQuantity $totalTransportHandlingUnitQuantity = null,
    ): self {
        $this->totalTransportHandlingUnitQuantity = $totalTransportHandlingUnitQuantity;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTotalTransportHandlingUnitQuantity(): self
    {
        $this->totalTransportHandlingUnitQuantity = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\InsuranceValueAmount|null
     */
    public function getInsuranceValueAmount(): ?InsuranceValueAmount
    {
        return $this->insuranceValueAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\InsuranceValueAmount
     */
    public function getInsuranceValueAmountWithCreate(): InsuranceValueAmount
    {
        $this->insuranceValueAmount = is_null($this->insuranceValueAmount) ? new InsuranceValueAmount() : $this->insuranceValueAmount;

        return $this->insuranceValueAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\InsuranceValueAmount|null $insuranceValueAmount
     * @return self
     */
    public function setInsuranceValueAmount(?InsuranceValueAmount $insuranceValueAmount = null): self
    {
        $this->insuranceValueAmount = $insuranceValueAmount;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetInsuranceValueAmount(): self
    {
        $this->insuranceValueAmount = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\DeclaredForCarriageValueAmount|null
     */
    public function getDeclaredForCarriageValueAmount(): ?DeclaredForCarriageValueAmount
    {
        return $this->declaredForCarriageValueAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\DeclaredForCarriageValueAmount
     */
    public function getDeclaredForCarriageValueAmountWithCreate(): DeclaredForCarriageValueAmount
    {
        $this->declaredForCarriageValueAmount = is_null($this->declaredForCarriageValueAmount) ? new DeclaredForCarriageValueAmount() : $this->declaredForCarriageValueAmount;

        return $this->declaredForCarriageValueAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\DeclaredForCarriageValueAmount|null $declaredForCarriageValueAmount
     * @return self
     */
    public function setDeclaredForCarriageValueAmount(
        ?DeclaredForCarriageValueAmount $declaredForCarriageValueAmount = null,
    ): self {
        $this->declaredForCarriageValueAmount = $declaredForCarriageValueAmount;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDeclaredForCarriageValueAmount(): self
    {
        $this->declaredForCarriageValueAmount = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\DeclaredStatisticsValueAmount|null
     */
    public function getDeclaredStatisticsValueAmount(): ?DeclaredStatisticsValueAmount
    {
        return $this->declaredStatisticsValueAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\DeclaredStatisticsValueAmount
     */
    public function getDeclaredStatisticsValueAmountWithCreate(): DeclaredStatisticsValueAmount
    {
        $this->declaredStatisticsValueAmount = is_null($this->declaredStatisticsValueAmount) ? new DeclaredStatisticsValueAmount() : $this->declaredStatisticsValueAmount;

        return $this->declaredStatisticsValueAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\DeclaredStatisticsValueAmount|null $declaredStatisticsValueAmount
     * @return self
     */
    public function setDeclaredStatisticsValueAmount(
        ?DeclaredStatisticsValueAmount $declaredStatisticsValueAmount = null,
    ): self {
        $this->declaredStatisticsValueAmount = $declaredStatisticsValueAmount;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDeclaredStatisticsValueAmount(): self
    {
        $this->declaredStatisticsValueAmount = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\FreeOnBoardValueAmount|null
     */
    public function getFreeOnBoardValueAmount(): ?FreeOnBoardValueAmount
    {
        return $this->freeOnBoardValueAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\FreeOnBoardValueAmount
     */
    public function getFreeOnBoardValueAmountWithCreate(): FreeOnBoardValueAmount
    {
        $this->freeOnBoardValueAmount = is_null($this->freeOnBoardValueAmount) ? new FreeOnBoardValueAmount() : $this->freeOnBoardValueAmount;

        return $this->freeOnBoardValueAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\FreeOnBoardValueAmount|null $freeOnBoardValueAmount
     * @return self
     */
    public function setFreeOnBoardValueAmount(?FreeOnBoardValueAmount $freeOnBoardValueAmount = null): self
    {
        $this->freeOnBoardValueAmount = $freeOnBoardValueAmount;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetFreeOnBoardValueAmount(): self
    {
        $this->freeOnBoardValueAmount = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\SpecialInstructions>|null
     */
    public function getSpecialInstructions(): ?array
    {
        return $this->specialInstructions;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\SpecialInstructions>|null $specialInstructions
     * @return self
     */
    public function setSpecialInstructions(?array $specialInstructions = null): self
    {
        $this->specialInstructions = $specialInstructions;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSpecialInstructions(): self
    {
        $this->specialInstructions = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearSpecialInstructions(): self
    {
        $this->specialInstructions = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\SpecialInstructions|null
     */
    public function firstSpecialInstructions(): ?SpecialInstructions
    {
        $specialInstructions = $this->specialInstructions ?? [];
        $specialInstructions = reset($specialInstructions);

        if ($specialInstructions === false) {
            return null;
        }

        return $specialInstructions;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\SpecialInstructions|null
     */
    public function lastSpecialInstructions(): ?SpecialInstructions
    {
        $specialInstructions = $this->specialInstructions ?? [];
        $specialInstructions = end($specialInstructions);

        if ($specialInstructions === false) {
            return null;
        }

        return $specialInstructions;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\SpecialInstructions $specialInstructions
     * @return self
     */
    public function addToSpecialInstructions(SpecialInstructions $specialInstructions): self
    {
        $this->specialInstructions[] = $specialInstructions;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\SpecialInstructions
     */
    public function addToSpecialInstructionsWithCreate(): SpecialInstructions
    {
        $this->addTospecialInstructions($specialInstructions = new SpecialInstructions());

        return $specialInstructions;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\SpecialInstructions $specialInstructions
     * @return self
     */
    public function addOnceToSpecialInstructions(SpecialInstructions $specialInstructions): self
    {
        if (!is_array($this->specialInstructions)) {
            $this->specialInstructions = [];
        }

        $this->specialInstructions[0] = $specialInstructions;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\SpecialInstructions
     */
    public function addOnceToSpecialInstructionsWithCreate(): SpecialInstructions
    {
        if (!is_array($this->specialInstructions)) {
            $this->specialInstructions = [];
        }

        if ($this->specialInstructions === []) {
            $this->addOnceTospecialInstructions(new SpecialInstructions());
        }

        return $this->specialInstructions[0];
    }

    /**
     * @return bool|null
     */
    public function getSplitConsignmentIndicator(): ?bool
    {
        return $this->splitConsignmentIndicator;
    }

    /**
     * @param bool|null $splitConsignmentIndicator
     * @return self
     */
    public function setSplitConsignmentIndicator(?bool $splitConsignmentIndicator = null): self
    {
        $this->splitConsignmentIndicator = $splitConsignmentIndicator;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSplitConsignmentIndicator(): self
    {
        $this->splitConsignmentIndicator = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\DeliveryInstructions>|null
     */
    public function getDeliveryInstructions(): ?array
    {
        return $this->deliveryInstructions;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\DeliveryInstructions>|null $deliveryInstructions
     * @return self
     */
    public function setDeliveryInstructions(?array $deliveryInstructions = null): self
    {
        $this->deliveryInstructions = $deliveryInstructions;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDeliveryInstructions(): self
    {
        $this->deliveryInstructions = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearDeliveryInstructions(): self
    {
        $this->deliveryInstructions = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\DeliveryInstructions|null
     */
    public function firstDeliveryInstructions(): ?DeliveryInstructions
    {
        $deliveryInstructions = $this->deliveryInstructions ?? [];
        $deliveryInstructions = reset($deliveryInstructions);

        if ($deliveryInstructions === false) {
            return null;
        }

        return $deliveryInstructions;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\DeliveryInstructions|null
     */
    public function lastDeliveryInstructions(): ?DeliveryInstructions
    {
        $deliveryInstructions = $this->deliveryInstructions ?? [];
        $deliveryInstructions = end($deliveryInstructions);

        if ($deliveryInstructions === false) {
            return null;
        }

        return $deliveryInstructions;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\DeliveryInstructions $deliveryInstructions
     * @return self
     */
    public function addToDeliveryInstructions(DeliveryInstructions $deliveryInstructions): self
    {
        $this->deliveryInstructions[] = $deliveryInstructions;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\DeliveryInstructions
     */
    public function addToDeliveryInstructionsWithCreate(): DeliveryInstructions
    {
        $this->addTodeliveryInstructions($deliveryInstructions = new DeliveryInstructions());

        return $deliveryInstructions;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\DeliveryInstructions $deliveryInstructions
     * @return self
     */
    public function addOnceToDeliveryInstructions(DeliveryInstructions $deliveryInstructions): self
    {
        if (!is_array($this->deliveryInstructions)) {
            $this->deliveryInstructions = [];
        }

        $this->deliveryInstructions[0] = $deliveryInstructions;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\DeliveryInstructions
     */
    public function addOnceToDeliveryInstructionsWithCreate(): DeliveryInstructions
    {
        if (!is_array($this->deliveryInstructions)) {
            $this->deliveryInstructions = [];
        }

        if ($this->deliveryInstructions === []) {
            $this->addOnceTodeliveryInstructions(new DeliveryInstructions());
        }

        return $this->deliveryInstructions[0];
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ConsignmentQuantity|null
     */
    public function getConsignmentQuantity(): ?ConsignmentQuantity
    {
        return $this->consignmentQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ConsignmentQuantity
     */
    public function getConsignmentQuantityWithCreate(): ConsignmentQuantity
    {
        $this->consignmentQuantity = is_null($this->consignmentQuantity) ? new ConsignmentQuantity() : $this->consignmentQuantity;

        return $this->consignmentQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ConsignmentQuantity|null $consignmentQuantity
     * @return self
     */
    public function setConsignmentQuantity(?ConsignmentQuantity $consignmentQuantity = null): self
    {
        $this->consignmentQuantity = $consignmentQuantity;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetConsignmentQuantity(): self
    {
        $this->consignmentQuantity = null;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getConsolidatableIndicator(): ?bool
    {
        return $this->consolidatableIndicator;
    }

    /**
     * @param bool|null $consolidatableIndicator
     * @return self
     */
    public function setConsolidatableIndicator(?bool $consolidatableIndicator = null): self
    {
        $this->consolidatableIndicator = $consolidatableIndicator;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetConsolidatableIndicator(): self
    {
        $this->consolidatableIndicator = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\HaulageInstructions>|null
     */
    public function getHaulageInstructions(): ?array
    {
        return $this->haulageInstructions;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\HaulageInstructions>|null $haulageInstructions
     * @return self
     */
    public function setHaulageInstructions(?array $haulageInstructions = null): self
    {
        $this->haulageInstructions = $haulageInstructions;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetHaulageInstructions(): self
    {
        $this->haulageInstructions = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearHaulageInstructions(): self
    {
        $this->haulageInstructions = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\HaulageInstructions|null
     */
    public function firstHaulageInstructions(): ?HaulageInstructions
    {
        $haulageInstructions = $this->haulageInstructions ?? [];
        $haulageInstructions = reset($haulageInstructions);

        if ($haulageInstructions === false) {
            return null;
        }

        return $haulageInstructions;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\HaulageInstructions|null
     */
    public function lastHaulageInstructions(): ?HaulageInstructions
    {
        $haulageInstructions = $this->haulageInstructions ?? [];
        $haulageInstructions = end($haulageInstructions);

        if ($haulageInstructions === false) {
            return null;
        }

        return $haulageInstructions;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\HaulageInstructions $haulageInstructions
     * @return self
     */
    public function addToHaulageInstructions(HaulageInstructions $haulageInstructions): self
    {
        $this->haulageInstructions[] = $haulageInstructions;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\HaulageInstructions
     */
    public function addToHaulageInstructionsWithCreate(): HaulageInstructions
    {
        $this->addTohaulageInstructions($haulageInstructions = new HaulageInstructions());

        return $haulageInstructions;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\HaulageInstructions $haulageInstructions
     * @return self
     */
    public function addOnceToHaulageInstructions(HaulageInstructions $haulageInstructions): self
    {
        if (!is_array($this->haulageInstructions)) {
            $this->haulageInstructions = [];
        }

        $this->haulageInstructions[0] = $haulageInstructions;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\HaulageInstructions
     */
    public function addOnceToHaulageInstructionsWithCreate(): HaulageInstructions
    {
        if (!is_array($this->haulageInstructions)) {
            $this->haulageInstructions = [];
        }

        if ($this->haulageInstructions === []) {
            $this->addOnceTohaulageInstructions(new HaulageInstructions());
        }

        return $this->haulageInstructions[0];
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\LoadingSequenceID|null
     */
    public function getLoadingSequenceID(): ?LoadingSequenceID
    {
        return $this->loadingSequenceID;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\LoadingSequenceID
     */
    public function getLoadingSequenceIDWithCreate(): LoadingSequenceID
    {
        $this->loadingSequenceID = is_null($this->loadingSequenceID) ? new LoadingSequenceID() : $this->loadingSequenceID;

        return $this->loadingSequenceID;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\LoadingSequenceID|null $loadingSequenceID
     * @return self
     */
    public function setLoadingSequenceID(?LoadingSequenceID $loadingSequenceID = null): self
    {
        $this->loadingSequenceID = $loadingSequenceID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetLoadingSequenceID(): self
    {
        $this->loadingSequenceID = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ChildConsignmentQuantity|null
     */
    public function getChildConsignmentQuantity(): ?ChildConsignmentQuantity
    {
        return $this->childConsignmentQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ChildConsignmentQuantity
     */
    public function getChildConsignmentQuantityWithCreate(): ChildConsignmentQuantity
    {
        $this->childConsignmentQuantity = is_null($this->childConsignmentQuantity) ? new ChildConsignmentQuantity() : $this->childConsignmentQuantity;

        return $this->childConsignmentQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ChildConsignmentQuantity|null $childConsignmentQuantity
     * @return self
     */
    public function setChildConsignmentQuantity(?ChildConsignmentQuantity $childConsignmentQuantity = null): self
    {
        $this->childConsignmentQuantity = $childConsignmentQuantity;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetChildConsignmentQuantity(): self
    {
        $this->childConsignmentQuantity = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TotalPackagesQuantity|null
     */
    public function getTotalPackagesQuantity(): ?TotalPackagesQuantity
    {
        return $this->totalPackagesQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TotalPackagesQuantity
     */
    public function getTotalPackagesQuantityWithCreate(): TotalPackagesQuantity
    {
        $this->totalPackagesQuantity = is_null($this->totalPackagesQuantity) ? new TotalPackagesQuantity() : $this->totalPackagesQuantity;

        return $this->totalPackagesQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\TotalPackagesQuantity|null $totalPackagesQuantity
     * @return self
     */
    public function setTotalPackagesQuantity(?TotalPackagesQuantity $totalPackagesQuantity = null): self
    {
        $this->totalPackagesQuantity = $totalPackagesQuantity;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTotalPackagesQuantity(): self
    {
        $this->totalPackagesQuantity = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\ConsolidatedShipment>|null
     */
    public function getConsolidatedShipment(): ?array
    {
        return $this->consolidatedShipment;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\ConsolidatedShipment>|null $consolidatedShipment
     * @return self
     */
    public function setConsolidatedShipment(?array $consolidatedShipment = null): self
    {
        $this->consolidatedShipment = $consolidatedShipment;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetConsolidatedShipment(): self
    {
        $this->consolidatedShipment = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearConsolidatedShipment(): self
    {
        $this->consolidatedShipment = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ConsolidatedShipment|null
     */
    public function firstConsolidatedShipment(): ?ConsolidatedShipment
    {
        $consolidatedShipment = $this->consolidatedShipment ?? [];
        $consolidatedShipment = reset($consolidatedShipment);

        if ($consolidatedShipment === false) {
            return null;
        }

        return $consolidatedShipment;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ConsolidatedShipment|null
     */
    public function lastConsolidatedShipment(): ?ConsolidatedShipment
    {
        $consolidatedShipment = $this->consolidatedShipment ?? [];
        $consolidatedShipment = end($consolidatedShipment);

        if ($consolidatedShipment === false) {
            return null;
        }

        return $consolidatedShipment;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\ConsolidatedShipment $consolidatedShipment
     * @return self
     */
    public function addToConsolidatedShipment(ConsolidatedShipment $consolidatedShipment): self
    {
        $this->consolidatedShipment[] = $consolidatedShipment;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ConsolidatedShipment
     */
    public function addToConsolidatedShipmentWithCreate(): ConsolidatedShipment
    {
        $this->addToconsolidatedShipment($consolidatedShipment = new ConsolidatedShipment());

        return $consolidatedShipment;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\ConsolidatedShipment $consolidatedShipment
     * @return self
     */
    public function addOnceToConsolidatedShipment(ConsolidatedShipment $consolidatedShipment): self
    {
        if (!is_array($this->consolidatedShipment)) {
            $this->consolidatedShipment = [];
        }

        $this->consolidatedShipment[0] = $consolidatedShipment;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ConsolidatedShipment
     */
    public function addOnceToConsolidatedShipmentWithCreate(): ConsolidatedShipment
    {
        if (!is_array($this->consolidatedShipment)) {
            $this->consolidatedShipment = [];
        }

        if ($this->consolidatedShipment === []) {
            $this->addOnceToconsolidatedShipment(new ConsolidatedShipment());
        }

        return $this->consolidatedShipment[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\CustomsDeclaration>|null
     */
    public function getCustomsDeclaration(): ?array
    {
        return $this->customsDeclaration;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\CustomsDeclaration>|null $customsDeclaration
     * @return self
     */
    public function setCustomsDeclaration(?array $customsDeclaration = null): self
    {
        $this->customsDeclaration = $customsDeclaration;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetCustomsDeclaration(): self
    {
        $this->customsDeclaration = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearCustomsDeclaration(): self
    {
        $this->customsDeclaration = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\CustomsDeclaration|null
     */
    public function firstCustomsDeclaration(): ?CustomsDeclaration
    {
        $customsDeclaration = $this->customsDeclaration ?? [];
        $customsDeclaration = reset($customsDeclaration);

        if ($customsDeclaration === false) {
            return null;
        }

        return $customsDeclaration;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\CustomsDeclaration|null
     */
    public function lastCustomsDeclaration(): ?CustomsDeclaration
    {
        $customsDeclaration = $this->customsDeclaration ?? [];
        $customsDeclaration = end($customsDeclaration);

        if ($customsDeclaration === false) {
            return null;
        }

        return $customsDeclaration;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\CustomsDeclaration $customsDeclaration
     * @return self
     */
    public function addToCustomsDeclaration(CustomsDeclaration $customsDeclaration): self
    {
        $this->customsDeclaration[] = $customsDeclaration;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\CustomsDeclaration
     */
    public function addToCustomsDeclarationWithCreate(): CustomsDeclaration
    {
        $this->addTocustomsDeclaration($customsDeclaration = new CustomsDeclaration());

        return $customsDeclaration;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\CustomsDeclaration $customsDeclaration
     * @return self
     */
    public function addOnceToCustomsDeclaration(CustomsDeclaration $customsDeclaration): self
    {
        if (!is_array($this->customsDeclaration)) {
            $this->customsDeclaration = [];
        }

        $this->customsDeclaration[0] = $customsDeclaration;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\CustomsDeclaration
     */
    public function addOnceToCustomsDeclarationWithCreate(): CustomsDeclaration
    {
        if (!is_array($this->customsDeclaration)) {
            $this->customsDeclaration = [];
        }

        if ($this->customsDeclaration === []) {
            $this->addOnceTocustomsDeclaration(new CustomsDeclaration());
        }

        return $this->customsDeclaration[0];
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\RequestedPickupTransportEvent|null
     */
    public function getRequestedPickupTransportEvent(): ?RequestedPickupTransportEvent
    {
        return $this->requestedPickupTransportEvent;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\RequestedPickupTransportEvent
     */
    public function getRequestedPickupTransportEventWithCreate(): RequestedPickupTransportEvent
    {
        $this->requestedPickupTransportEvent = is_null($this->requestedPickupTransportEvent) ? new RequestedPickupTransportEvent() : $this->requestedPickupTransportEvent;

        return $this->requestedPickupTransportEvent;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\RequestedPickupTransportEvent|null $requestedPickupTransportEvent
     * @return self
     */
    public function setRequestedPickupTransportEvent(
        ?RequestedPickupTransportEvent $requestedPickupTransportEvent = null,
    ): self {
        $this->requestedPickupTransportEvent = $requestedPickupTransportEvent;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetRequestedPickupTransportEvent(): self
    {
        $this->requestedPickupTransportEvent = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\RequestedDeliveryTransportEvent|null
     */
    public function getRequestedDeliveryTransportEvent(): ?RequestedDeliveryTransportEvent
    {
        return $this->requestedDeliveryTransportEvent;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\RequestedDeliveryTransportEvent
     */
    public function getRequestedDeliveryTransportEventWithCreate(): RequestedDeliveryTransportEvent
    {
        $this->requestedDeliveryTransportEvent = is_null($this->requestedDeliveryTransportEvent) ? new RequestedDeliveryTransportEvent() : $this->requestedDeliveryTransportEvent;

        return $this->requestedDeliveryTransportEvent;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\RequestedDeliveryTransportEvent|null $requestedDeliveryTransportEvent
     * @return self
     */
    public function setRequestedDeliveryTransportEvent(
        ?RequestedDeliveryTransportEvent $requestedDeliveryTransportEvent = null,
    ): self {
        $this->requestedDeliveryTransportEvent = $requestedDeliveryTransportEvent;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetRequestedDeliveryTransportEvent(): self
    {
        $this->requestedDeliveryTransportEvent = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\PlannedPickupTransportEvent|null
     */
    public function getPlannedPickupTransportEvent(): ?PlannedPickupTransportEvent
    {
        return $this->plannedPickupTransportEvent;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\PlannedPickupTransportEvent
     */
    public function getPlannedPickupTransportEventWithCreate(): PlannedPickupTransportEvent
    {
        $this->plannedPickupTransportEvent = is_null($this->plannedPickupTransportEvent) ? new PlannedPickupTransportEvent() : $this->plannedPickupTransportEvent;

        return $this->plannedPickupTransportEvent;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\PlannedPickupTransportEvent|null $plannedPickupTransportEvent
     * @return self
     */
    public function setPlannedPickupTransportEvent(
        ?PlannedPickupTransportEvent $plannedPickupTransportEvent = null,
    ): self {
        $this->plannedPickupTransportEvent = $plannedPickupTransportEvent;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPlannedPickupTransportEvent(): self
    {
        $this->plannedPickupTransportEvent = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\PlannedDeliveryTransportEvent|null
     */
    public function getPlannedDeliveryTransportEvent(): ?PlannedDeliveryTransportEvent
    {
        return $this->plannedDeliveryTransportEvent;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\PlannedDeliveryTransportEvent
     */
    public function getPlannedDeliveryTransportEventWithCreate(): PlannedDeliveryTransportEvent
    {
        $this->plannedDeliveryTransportEvent = is_null($this->plannedDeliveryTransportEvent) ? new PlannedDeliveryTransportEvent() : $this->plannedDeliveryTransportEvent;

        return $this->plannedDeliveryTransportEvent;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\PlannedDeliveryTransportEvent|null $plannedDeliveryTransportEvent
     * @return self
     */
    public function setPlannedDeliveryTransportEvent(
        ?PlannedDeliveryTransportEvent $plannedDeliveryTransportEvent = null,
    ): self {
        $this->plannedDeliveryTransportEvent = $plannedDeliveryTransportEvent;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPlannedDeliveryTransportEvent(): self
    {
        $this->plannedDeliveryTransportEvent = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\Status>|null
     */
    public function getStatus(): ?array
    {
        return $this->status;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\Status>|null $status
     * @return self
     */
    public function setStatus(?array $status = null): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetStatus(): self
    {
        $this->status = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearStatus(): self
    {
        $this->status = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\Status|null
     */
    public function firstStatus(): ?Status
    {
        $status = $this->status ?? [];
        $status = reset($status);

        if ($status === false) {
            return null;
        }

        return $status;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\Status|null
     */
    public function lastStatus(): ?Status
    {
        $status = $this->status ?? [];
        $status = end($status);

        if ($status === false) {
            return null;
        }

        return $status;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\Status $status
     * @return self
     */
    public function addToStatus(Status $status): self
    {
        $this->status[] = $status;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\Status
     */
    public function addToStatusWithCreate(): Status
    {
        $this->addTostatus($status = new Status());

        return $status;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\Status $status
     * @return self
     */
    public function addOnceToStatus(Status $status): self
    {
        if (!is_array($this->status)) {
            $this->status = [];
        }

        $this->status[0] = $status;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\Status
     */
    public function addOnceToStatusWithCreate(): Status
    {
        if (!is_array($this->status)) {
            $this->status = [];
        }

        if ($this->status === []) {
            $this->addOnceTostatus(new Status());
        }

        return $this->status[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\ChildConsignment>|null
     */
    public function getChildConsignment(): ?array
    {
        return $this->childConsignment;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\ChildConsignment>|null $childConsignment
     * @return self
     */
    public function setChildConsignment(?array $childConsignment = null): self
    {
        $this->childConsignment = $childConsignment;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetChildConsignment(): self
    {
        $this->childConsignment = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearChildConsignment(): self
    {
        $this->childConsignment = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ChildConsignment|null
     */
    public function firstChildConsignment(): ?ChildConsignment
    {
        $childConsignment = $this->childConsignment ?? [];
        $childConsignment = reset($childConsignment);

        if ($childConsignment === false) {
            return null;
        }

        return $childConsignment;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ChildConsignment|null
     */
    public function lastChildConsignment(): ?ChildConsignment
    {
        $childConsignment = $this->childConsignment ?? [];
        $childConsignment = end($childConsignment);

        if ($childConsignment === false) {
            return null;
        }

        return $childConsignment;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\ChildConsignment $childConsignment
     * @return self
     */
    public function addToChildConsignment(ChildConsignment $childConsignment): self
    {
        $this->childConsignment[] = $childConsignment;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ChildConsignment
     */
    public function addToChildConsignmentWithCreate(): ChildConsignment
    {
        $this->addTochildConsignment($childConsignment = new ChildConsignment());

        return $childConsignment;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\ChildConsignment $childConsignment
     * @return self
     */
    public function addOnceToChildConsignment(ChildConsignment $childConsignment): self
    {
        if (!is_array($this->childConsignment)) {
            $this->childConsignment = [];
        }

        $this->childConsignment[0] = $childConsignment;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ChildConsignment
     */
    public function addOnceToChildConsignmentWithCreate(): ChildConsignment
    {
        if (!is_array($this->childConsignment)) {
            $this->childConsignment = [];
        }

        if ($this->childConsignment === []) {
            $this->addOnceTochildConsignment(new ChildConsignment());
        }

        return $this->childConsignment[0];
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ConsigneeParty|null
     */
    public function getConsigneeParty(): ?ConsigneeParty
    {
        return $this->consigneeParty;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ConsigneeParty
     */
    public function getConsigneePartyWithCreate(): ConsigneeParty
    {
        $this->consigneeParty = is_null($this->consigneeParty) ? new ConsigneeParty() : $this->consigneeParty;

        return $this->consigneeParty;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\ConsigneeParty|null $consigneeParty
     * @return self
     */
    public function setConsigneeParty(?ConsigneeParty $consigneeParty = null): self
    {
        $this->consigneeParty = $consigneeParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetConsigneeParty(): self
    {
        $this->consigneeParty = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ExporterParty|null
     */
    public function getExporterParty(): ?ExporterParty
    {
        return $this->exporterParty;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ExporterParty
     */
    public function getExporterPartyWithCreate(): ExporterParty
    {
        $this->exporterParty = is_null($this->exporterParty) ? new ExporterParty() : $this->exporterParty;

        return $this->exporterParty;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\ExporterParty|null $exporterParty
     * @return self
     */
    public function setExporterParty(?ExporterParty $exporterParty = null): self
    {
        $this->exporterParty = $exporterParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetExporterParty(): self
    {
        $this->exporterParty = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ConsignorParty|null
     */
    public function getConsignorParty(): ?ConsignorParty
    {
        return $this->consignorParty;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ConsignorParty
     */
    public function getConsignorPartyWithCreate(): ConsignorParty
    {
        $this->consignorParty = is_null($this->consignorParty) ? new ConsignorParty() : $this->consignorParty;

        return $this->consignorParty;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\ConsignorParty|null $consignorParty
     * @return self
     */
    public function setConsignorParty(?ConsignorParty $consignorParty = null): self
    {
        $this->consignorParty = $consignorParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetConsignorParty(): self
    {
        $this->consignorParty = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ImporterParty|null
     */
    public function getImporterParty(): ?ImporterParty
    {
        return $this->importerParty;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ImporterParty
     */
    public function getImporterPartyWithCreate(): ImporterParty
    {
        $this->importerParty = is_null($this->importerParty) ? new ImporterParty() : $this->importerParty;

        return $this->importerParty;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\ImporterParty|null $importerParty
     * @return self
     */
    public function setImporterParty(?ImporterParty $importerParty = null): self
    {
        $this->importerParty = $importerParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetImporterParty(): self
    {
        $this->importerParty = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\CarrierParty|null
     */
    public function getCarrierParty(): ?CarrierParty
    {
        return $this->carrierParty;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\CarrierParty
     */
    public function getCarrierPartyWithCreate(): CarrierParty
    {
        $this->carrierParty = is_null($this->carrierParty) ? new CarrierParty() : $this->carrierParty;

        return $this->carrierParty;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\CarrierParty|null $carrierParty
     * @return self
     */
    public function setCarrierParty(?CarrierParty $carrierParty = null): self
    {
        $this->carrierParty = $carrierParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetCarrierParty(): self
    {
        $this->carrierParty = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\FreightForwarderParty|null
     */
    public function getFreightForwarderParty(): ?FreightForwarderParty
    {
        return $this->freightForwarderParty;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\FreightForwarderParty
     */
    public function getFreightForwarderPartyWithCreate(): FreightForwarderParty
    {
        $this->freightForwarderParty = is_null($this->freightForwarderParty) ? new FreightForwarderParty() : $this->freightForwarderParty;

        return $this->freightForwarderParty;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\FreightForwarderParty|null $freightForwarderParty
     * @return self
     */
    public function setFreightForwarderParty(?FreightForwarderParty $freightForwarderParty = null): self
    {
        $this->freightForwarderParty = $freightForwarderParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetFreightForwarderParty(): self
    {
        $this->freightForwarderParty = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\NotifyParty|null
     */
    public function getNotifyParty(): ?NotifyParty
    {
        return $this->notifyParty;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\NotifyParty
     */
    public function getNotifyPartyWithCreate(): NotifyParty
    {
        $this->notifyParty = is_null($this->notifyParty) ? new NotifyParty() : $this->notifyParty;

        return $this->notifyParty;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\NotifyParty|null $notifyParty
     * @return self
     */
    public function setNotifyParty(?NotifyParty $notifyParty = null): self
    {
        $this->notifyParty = $notifyParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetNotifyParty(): self
    {
        $this->notifyParty = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\OriginalDespatchParty|null
     */
    public function getOriginalDespatchParty(): ?OriginalDespatchParty
    {
        return $this->originalDespatchParty;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\OriginalDespatchParty
     */
    public function getOriginalDespatchPartyWithCreate(): OriginalDespatchParty
    {
        $this->originalDespatchParty = is_null($this->originalDespatchParty) ? new OriginalDespatchParty() : $this->originalDespatchParty;

        return $this->originalDespatchParty;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\OriginalDespatchParty|null $originalDespatchParty
     * @return self
     */
    public function setOriginalDespatchParty(?OriginalDespatchParty $originalDespatchParty = null): self
    {
        $this->originalDespatchParty = $originalDespatchParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetOriginalDespatchParty(): self
    {
        $this->originalDespatchParty = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\FinalDeliveryParty|null
     */
    public function getFinalDeliveryParty(): ?FinalDeliveryParty
    {
        return $this->finalDeliveryParty;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\FinalDeliveryParty
     */
    public function getFinalDeliveryPartyWithCreate(): FinalDeliveryParty
    {
        $this->finalDeliveryParty = is_null($this->finalDeliveryParty) ? new FinalDeliveryParty() : $this->finalDeliveryParty;

        return $this->finalDeliveryParty;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\FinalDeliveryParty|null $finalDeliveryParty
     * @return self
     */
    public function setFinalDeliveryParty(?FinalDeliveryParty $finalDeliveryParty = null): self
    {
        $this->finalDeliveryParty = $finalDeliveryParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetFinalDeliveryParty(): self
    {
        $this->finalDeliveryParty = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\PerformingCarrierParty|null
     */
    public function getPerformingCarrierParty(): ?PerformingCarrierParty
    {
        return $this->performingCarrierParty;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\PerformingCarrierParty
     */
    public function getPerformingCarrierPartyWithCreate(): PerformingCarrierParty
    {
        $this->performingCarrierParty = is_null($this->performingCarrierParty) ? new PerformingCarrierParty() : $this->performingCarrierParty;

        return $this->performingCarrierParty;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\PerformingCarrierParty|null $performingCarrierParty
     * @return self
     */
    public function setPerformingCarrierParty(?PerformingCarrierParty $performingCarrierParty = null): self
    {
        $this->performingCarrierParty = $performingCarrierParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPerformingCarrierParty(): self
    {
        $this->performingCarrierParty = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\SubstituteCarrierParty|null
     */
    public function getSubstituteCarrierParty(): ?SubstituteCarrierParty
    {
        return $this->substituteCarrierParty;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\SubstituteCarrierParty
     */
    public function getSubstituteCarrierPartyWithCreate(): SubstituteCarrierParty
    {
        $this->substituteCarrierParty = is_null($this->substituteCarrierParty) ? new SubstituteCarrierParty() : $this->substituteCarrierParty;

        return $this->substituteCarrierParty;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\SubstituteCarrierParty|null $substituteCarrierParty
     * @return self
     */
    public function setSubstituteCarrierParty(?SubstituteCarrierParty $substituteCarrierParty = null): self
    {
        $this->substituteCarrierParty = $substituteCarrierParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSubstituteCarrierParty(): self
    {
        $this->substituteCarrierParty = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\LogisticsOperatorParty|null
     */
    public function getLogisticsOperatorParty(): ?LogisticsOperatorParty
    {
        return $this->logisticsOperatorParty;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\LogisticsOperatorParty
     */
    public function getLogisticsOperatorPartyWithCreate(): LogisticsOperatorParty
    {
        $this->logisticsOperatorParty = is_null($this->logisticsOperatorParty) ? new LogisticsOperatorParty() : $this->logisticsOperatorParty;

        return $this->logisticsOperatorParty;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\LogisticsOperatorParty|null $logisticsOperatorParty
     * @return self
     */
    public function setLogisticsOperatorParty(?LogisticsOperatorParty $logisticsOperatorParty = null): self
    {
        $this->logisticsOperatorParty = $logisticsOperatorParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetLogisticsOperatorParty(): self
    {
        $this->logisticsOperatorParty = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\TransportAdvisorParty|null
     */
    public function getTransportAdvisorParty(): ?TransportAdvisorParty
    {
        return $this->transportAdvisorParty;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\TransportAdvisorParty
     */
    public function getTransportAdvisorPartyWithCreate(): TransportAdvisorParty
    {
        $this->transportAdvisorParty = is_null($this->transportAdvisorParty) ? new TransportAdvisorParty() : $this->transportAdvisorParty;

        return $this->transportAdvisorParty;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\TransportAdvisorParty|null $transportAdvisorParty
     * @return self
     */
    public function setTransportAdvisorParty(?TransportAdvisorParty $transportAdvisorParty = null): self
    {
        $this->transportAdvisorParty = $transportAdvisorParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTransportAdvisorParty(): self
    {
        $this->transportAdvisorParty = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\HazardousItemNotificationParty|null
     */
    public function getHazardousItemNotificationParty(): ?HazardousItemNotificationParty
    {
        return $this->hazardousItemNotificationParty;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\HazardousItemNotificationParty
     */
    public function getHazardousItemNotificationPartyWithCreate(): HazardousItemNotificationParty
    {
        $this->hazardousItemNotificationParty = is_null($this->hazardousItemNotificationParty) ? new HazardousItemNotificationParty() : $this->hazardousItemNotificationParty;

        return $this->hazardousItemNotificationParty;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\HazardousItemNotificationParty|null $hazardousItemNotificationParty
     * @return self
     */
    public function setHazardousItemNotificationParty(
        ?HazardousItemNotificationParty $hazardousItemNotificationParty = null,
    ): self {
        $this->hazardousItemNotificationParty = $hazardousItemNotificationParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetHazardousItemNotificationParty(): self
    {
        $this->hazardousItemNotificationParty = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\InsuranceParty|null
     */
    public function getInsuranceParty(): ?InsuranceParty
    {
        return $this->insuranceParty;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\InsuranceParty
     */
    public function getInsurancePartyWithCreate(): InsuranceParty
    {
        $this->insuranceParty = is_null($this->insuranceParty) ? new InsuranceParty() : $this->insuranceParty;

        return $this->insuranceParty;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\InsuranceParty|null $insuranceParty
     * @return self
     */
    public function setInsuranceParty(?InsuranceParty $insuranceParty = null): self
    {
        $this->insuranceParty = $insuranceParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetInsuranceParty(): self
    {
        $this->insuranceParty = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\MortgageHolderParty|null
     */
    public function getMortgageHolderParty(): ?MortgageHolderParty
    {
        return $this->mortgageHolderParty;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\MortgageHolderParty
     */
    public function getMortgageHolderPartyWithCreate(): MortgageHolderParty
    {
        $this->mortgageHolderParty = is_null($this->mortgageHolderParty) ? new MortgageHolderParty() : $this->mortgageHolderParty;

        return $this->mortgageHolderParty;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\MortgageHolderParty|null $mortgageHolderParty
     * @return self
     */
    public function setMortgageHolderParty(?MortgageHolderParty $mortgageHolderParty = null): self
    {
        $this->mortgageHolderParty = $mortgageHolderParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetMortgageHolderParty(): self
    {
        $this->mortgageHolderParty = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\BillOfLadingHolderParty|null
     */
    public function getBillOfLadingHolderParty(): ?BillOfLadingHolderParty
    {
        return $this->billOfLadingHolderParty;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\BillOfLadingHolderParty
     */
    public function getBillOfLadingHolderPartyWithCreate(): BillOfLadingHolderParty
    {
        $this->billOfLadingHolderParty = is_null($this->billOfLadingHolderParty) ? new BillOfLadingHolderParty() : $this->billOfLadingHolderParty;

        return $this->billOfLadingHolderParty;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\BillOfLadingHolderParty|null $billOfLadingHolderParty
     * @return self
     */
    public function setBillOfLadingHolderParty(?BillOfLadingHolderParty $billOfLadingHolderParty = null): self
    {
        $this->billOfLadingHolderParty = $billOfLadingHolderParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetBillOfLadingHolderParty(): self
    {
        $this->billOfLadingHolderParty = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\OriginalDepartureCountry|null
     */
    public function getOriginalDepartureCountry(): ?OriginalDepartureCountry
    {
        return $this->originalDepartureCountry;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\OriginalDepartureCountry
     */
    public function getOriginalDepartureCountryWithCreate(): OriginalDepartureCountry
    {
        $this->originalDepartureCountry = is_null($this->originalDepartureCountry) ? new OriginalDepartureCountry() : $this->originalDepartureCountry;

        return $this->originalDepartureCountry;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\OriginalDepartureCountry|null $originalDepartureCountry
     * @return self
     */
    public function setOriginalDepartureCountry(?OriginalDepartureCountry $originalDepartureCountry = null): self
    {
        $this->originalDepartureCountry = $originalDepartureCountry;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetOriginalDepartureCountry(): self
    {
        $this->originalDepartureCountry = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\FinalDestinationCountry|null
     */
    public function getFinalDestinationCountry(): ?FinalDestinationCountry
    {
        return $this->finalDestinationCountry;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\FinalDestinationCountry
     */
    public function getFinalDestinationCountryWithCreate(): FinalDestinationCountry
    {
        $this->finalDestinationCountry = is_null($this->finalDestinationCountry) ? new FinalDestinationCountry() : $this->finalDestinationCountry;

        return $this->finalDestinationCountry;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\FinalDestinationCountry|null $finalDestinationCountry
     * @return self
     */
    public function setFinalDestinationCountry(?FinalDestinationCountry $finalDestinationCountry = null): self
    {
        $this->finalDestinationCountry = $finalDestinationCountry;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetFinalDestinationCountry(): self
    {
        $this->finalDestinationCountry = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\TransitCountry>|null
     */
    public function getTransitCountry(): ?array
    {
        return $this->transitCountry;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\TransitCountry>|null $transitCountry
     * @return self
     */
    public function setTransitCountry(?array $transitCountry = null): self
    {
        $this->transitCountry = $transitCountry;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTransitCountry(): self
    {
        $this->transitCountry = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearTransitCountry(): self
    {
        $this->transitCountry = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\TransitCountry|null
     */
    public function firstTransitCountry(): ?TransitCountry
    {
        $transitCountry = $this->transitCountry ?? [];
        $transitCountry = reset($transitCountry);

        if ($transitCountry === false) {
            return null;
        }

        return $transitCountry;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\TransitCountry|null
     */
    public function lastTransitCountry(): ?TransitCountry
    {
        $transitCountry = $this->transitCountry ?? [];
        $transitCountry = end($transitCountry);

        if ($transitCountry === false) {
            return null;
        }

        return $transitCountry;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\TransitCountry $transitCountry
     * @return self
     */
    public function addToTransitCountry(TransitCountry $transitCountry): self
    {
        $this->transitCountry[] = $transitCountry;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\TransitCountry
     */
    public function addToTransitCountryWithCreate(): TransitCountry
    {
        $this->addTotransitCountry($transitCountry = new TransitCountry());

        return $transitCountry;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\TransitCountry $transitCountry
     * @return self
     */
    public function addOnceToTransitCountry(TransitCountry $transitCountry): self
    {
        if (!is_array($this->transitCountry)) {
            $this->transitCountry = [];
        }

        $this->transitCountry[0] = $transitCountry;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\TransitCountry
     */
    public function addOnceToTransitCountryWithCreate(): TransitCountry
    {
        if (!is_array($this->transitCountry)) {
            $this->transitCountry = [];
        }

        if ($this->transitCountry === []) {
            $this->addOnceTotransitCountry(new TransitCountry());
        }

        return $this->transitCountry[0];
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\TransportContract|null
     */
    public function getTransportContract(): ?TransportContract
    {
        return $this->transportContract;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\TransportContract
     */
    public function getTransportContractWithCreate(): TransportContract
    {
        $this->transportContract = is_null($this->transportContract) ? new TransportContract() : $this->transportContract;

        return $this->transportContract;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\TransportContract|null $transportContract
     * @return self
     */
    public function setTransportContract(?TransportContract $transportContract = null): self
    {
        $this->transportContract = $transportContract;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTransportContract(): self
    {
        $this->transportContract = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\TransportEvent>|null
     */
    public function getTransportEvent(): ?array
    {
        return $this->transportEvent;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\TransportEvent>|null $transportEvent
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
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\TransportEvent|null
     */
    public function firstTransportEvent(): ?TransportEvent
    {
        $transportEvent = $this->transportEvent ?? [];
        $transportEvent = reset($transportEvent);

        if ($transportEvent === false) {
            return null;
        }

        return $transportEvent;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\TransportEvent|null
     */
    public function lastTransportEvent(): ?TransportEvent
    {
        $transportEvent = $this->transportEvent ?? [];
        $transportEvent = end($transportEvent);

        if ($transportEvent === false) {
            return null;
        }

        return $transportEvent;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\TransportEvent $transportEvent
     * @return self
     */
    public function addToTransportEvent(TransportEvent $transportEvent): self
    {
        $this->transportEvent[] = $transportEvent;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\TransportEvent
     */
    public function addToTransportEventWithCreate(): TransportEvent
    {
        $this->addTotransportEvent($transportEvent = new TransportEvent());

        return $transportEvent;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\TransportEvent $transportEvent
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
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\TransportEvent
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
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\OriginalDespatchTransportationService|null
     */
    public function getOriginalDespatchTransportationService(): ?OriginalDespatchTransportationService
    {
        return $this->originalDespatchTransportationService;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\OriginalDespatchTransportationService
     */
    public function getOriginalDespatchTransportationServiceWithCreate(): OriginalDespatchTransportationService
    {
        $this->originalDespatchTransportationService = is_null($this->originalDespatchTransportationService) ? new OriginalDespatchTransportationService() : $this->originalDespatchTransportationService;

        return $this->originalDespatchTransportationService;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\OriginalDespatchTransportationService|null $originalDespatchTransportationService
     * @return self
     */
    public function setOriginalDespatchTransportationService(
        ?OriginalDespatchTransportationService $originalDespatchTransportationService = null,
    ): self {
        $this->originalDespatchTransportationService = $originalDespatchTransportationService;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetOriginalDespatchTransportationService(): self
    {
        $this->originalDespatchTransportationService = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\FinalDeliveryTransportationService|null
     */
    public function getFinalDeliveryTransportationService(): ?FinalDeliveryTransportationService
    {
        return $this->finalDeliveryTransportationService;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\FinalDeliveryTransportationService
     */
    public function getFinalDeliveryTransportationServiceWithCreate(): FinalDeliveryTransportationService
    {
        $this->finalDeliveryTransportationService = is_null($this->finalDeliveryTransportationService) ? new FinalDeliveryTransportationService() : $this->finalDeliveryTransportationService;

        return $this->finalDeliveryTransportationService;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\FinalDeliveryTransportationService|null $finalDeliveryTransportationService
     * @return self
     */
    public function setFinalDeliveryTransportationService(
        ?FinalDeliveryTransportationService $finalDeliveryTransportationService = null,
    ): self {
        $this->finalDeliveryTransportationService = $finalDeliveryTransportationService;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetFinalDeliveryTransportationService(): self
    {
        $this->finalDeliveryTransportationService = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\DeliveryTerms|null
     */
    public function getDeliveryTerms(): ?DeliveryTerms
    {
        return $this->deliveryTerms;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\DeliveryTerms
     */
    public function getDeliveryTermsWithCreate(): DeliveryTerms
    {
        $this->deliveryTerms = is_null($this->deliveryTerms) ? new DeliveryTerms() : $this->deliveryTerms;

        return $this->deliveryTerms;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\DeliveryTerms|null $deliveryTerms
     * @return self
     */
    public function setDeliveryTerms(?DeliveryTerms $deliveryTerms = null): self
    {
        $this->deliveryTerms = $deliveryTerms;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDeliveryTerms(): self
    {
        $this->deliveryTerms = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\PaymentTerms|null
     */
    public function getPaymentTerms(): ?PaymentTerms
    {
        return $this->paymentTerms;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\PaymentTerms
     */
    public function getPaymentTermsWithCreate(): PaymentTerms
    {
        $this->paymentTerms = is_null($this->paymentTerms) ? new PaymentTerms() : $this->paymentTerms;

        return $this->paymentTerms;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\PaymentTerms|null $paymentTerms
     * @return self
     */
    public function setPaymentTerms(?PaymentTerms $paymentTerms = null): self
    {
        $this->paymentTerms = $paymentTerms;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPaymentTerms(): self
    {
        $this->paymentTerms = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\CollectPaymentTerms|null
     */
    public function getCollectPaymentTerms(): ?CollectPaymentTerms
    {
        return $this->collectPaymentTerms;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\CollectPaymentTerms
     */
    public function getCollectPaymentTermsWithCreate(): CollectPaymentTerms
    {
        $this->collectPaymentTerms = is_null($this->collectPaymentTerms) ? new CollectPaymentTerms() : $this->collectPaymentTerms;

        return $this->collectPaymentTerms;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\CollectPaymentTerms|null $collectPaymentTerms
     * @return self
     */
    public function setCollectPaymentTerms(?CollectPaymentTerms $collectPaymentTerms = null): self
    {
        $this->collectPaymentTerms = $collectPaymentTerms;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetCollectPaymentTerms(): self
    {
        $this->collectPaymentTerms = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\DisbursementPaymentTerms|null
     */
    public function getDisbursementPaymentTerms(): ?DisbursementPaymentTerms
    {
        return $this->disbursementPaymentTerms;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\DisbursementPaymentTerms
     */
    public function getDisbursementPaymentTermsWithCreate(): DisbursementPaymentTerms
    {
        $this->disbursementPaymentTerms = is_null($this->disbursementPaymentTerms) ? new DisbursementPaymentTerms() : $this->disbursementPaymentTerms;

        return $this->disbursementPaymentTerms;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\DisbursementPaymentTerms|null $disbursementPaymentTerms
     * @return self
     */
    public function setDisbursementPaymentTerms(?DisbursementPaymentTerms $disbursementPaymentTerms = null): self
    {
        $this->disbursementPaymentTerms = $disbursementPaymentTerms;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDisbursementPaymentTerms(): self
    {
        $this->disbursementPaymentTerms = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\PrepaidPaymentTerms|null
     */
    public function getPrepaidPaymentTerms(): ?PrepaidPaymentTerms
    {
        return $this->prepaidPaymentTerms;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\PrepaidPaymentTerms
     */
    public function getPrepaidPaymentTermsWithCreate(): PrepaidPaymentTerms
    {
        $this->prepaidPaymentTerms = is_null($this->prepaidPaymentTerms) ? new PrepaidPaymentTerms() : $this->prepaidPaymentTerms;

        return $this->prepaidPaymentTerms;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\PrepaidPaymentTerms|null $prepaidPaymentTerms
     * @return self
     */
    public function setPrepaidPaymentTerms(?PrepaidPaymentTerms $prepaidPaymentTerms = null): self
    {
        $this->prepaidPaymentTerms = $prepaidPaymentTerms;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPrepaidPaymentTerms(): self
    {
        $this->prepaidPaymentTerms = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\FreightAllowanceCharge>|null
     */
    public function getFreightAllowanceCharge(): ?array
    {
        return $this->freightAllowanceCharge;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\FreightAllowanceCharge>|null $freightAllowanceCharge
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
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\FreightAllowanceCharge|null
     */
    public function firstFreightAllowanceCharge(): ?FreightAllowanceCharge
    {
        $freightAllowanceCharge = $this->freightAllowanceCharge ?? [];
        $freightAllowanceCharge = reset($freightAllowanceCharge);

        if ($freightAllowanceCharge === false) {
            return null;
        }

        return $freightAllowanceCharge;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\FreightAllowanceCharge|null
     */
    public function lastFreightAllowanceCharge(): ?FreightAllowanceCharge
    {
        $freightAllowanceCharge = $this->freightAllowanceCharge ?? [];
        $freightAllowanceCharge = end($freightAllowanceCharge);

        if ($freightAllowanceCharge === false) {
            return null;
        }

        return $freightAllowanceCharge;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\FreightAllowanceCharge $freightAllowanceCharge
     * @return self
     */
    public function addToFreightAllowanceCharge(FreightAllowanceCharge $freightAllowanceCharge): self
    {
        $this->freightAllowanceCharge[] = $freightAllowanceCharge;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\FreightAllowanceCharge
     */
    public function addToFreightAllowanceChargeWithCreate(): FreightAllowanceCharge
    {
        $this->addTofreightAllowanceCharge($freightAllowanceCharge = new FreightAllowanceCharge());

        return $freightAllowanceCharge;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\FreightAllowanceCharge $freightAllowanceCharge
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
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\FreightAllowanceCharge
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
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\ExtraAllowanceCharge>|null
     */
    public function getExtraAllowanceCharge(): ?array
    {
        return $this->extraAllowanceCharge;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\ExtraAllowanceCharge>|null $extraAllowanceCharge
     * @return self
     */
    public function setExtraAllowanceCharge(?array $extraAllowanceCharge = null): self
    {
        $this->extraAllowanceCharge = $extraAllowanceCharge;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetExtraAllowanceCharge(): self
    {
        $this->extraAllowanceCharge = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearExtraAllowanceCharge(): self
    {
        $this->extraAllowanceCharge = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ExtraAllowanceCharge|null
     */
    public function firstExtraAllowanceCharge(): ?ExtraAllowanceCharge
    {
        $extraAllowanceCharge = $this->extraAllowanceCharge ?? [];
        $extraAllowanceCharge = reset($extraAllowanceCharge);

        if ($extraAllowanceCharge === false) {
            return null;
        }

        return $extraAllowanceCharge;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ExtraAllowanceCharge|null
     */
    public function lastExtraAllowanceCharge(): ?ExtraAllowanceCharge
    {
        $extraAllowanceCharge = $this->extraAllowanceCharge ?? [];
        $extraAllowanceCharge = end($extraAllowanceCharge);

        if ($extraAllowanceCharge === false) {
            return null;
        }

        return $extraAllowanceCharge;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\ExtraAllowanceCharge $extraAllowanceCharge
     * @return self
     */
    public function addToExtraAllowanceCharge(ExtraAllowanceCharge $extraAllowanceCharge): self
    {
        $this->extraAllowanceCharge[] = $extraAllowanceCharge;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ExtraAllowanceCharge
     */
    public function addToExtraAllowanceChargeWithCreate(): ExtraAllowanceCharge
    {
        $this->addToextraAllowanceCharge($extraAllowanceCharge = new ExtraAllowanceCharge());

        return $extraAllowanceCharge;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\ExtraAllowanceCharge $extraAllowanceCharge
     * @return self
     */
    public function addOnceToExtraAllowanceCharge(ExtraAllowanceCharge $extraAllowanceCharge): self
    {
        if (!is_array($this->extraAllowanceCharge)) {
            $this->extraAllowanceCharge = [];
        }

        $this->extraAllowanceCharge[0] = $extraAllowanceCharge;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ExtraAllowanceCharge
     */
    public function addOnceToExtraAllowanceChargeWithCreate(): ExtraAllowanceCharge
    {
        if (!is_array($this->extraAllowanceCharge)) {
            $this->extraAllowanceCharge = [];
        }

        if ($this->extraAllowanceCharge === []) {
            $this->addOnceToextraAllowanceCharge(new ExtraAllowanceCharge());
        }

        return $this->extraAllowanceCharge[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\MainCarriageShipmentStage>|null
     */
    public function getMainCarriageShipmentStage(): ?array
    {
        return $this->mainCarriageShipmentStage;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\MainCarriageShipmentStage>|null $mainCarriageShipmentStage
     * @return self
     */
    public function setMainCarriageShipmentStage(?array $mainCarriageShipmentStage = null): self
    {
        $this->mainCarriageShipmentStage = $mainCarriageShipmentStage;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetMainCarriageShipmentStage(): self
    {
        $this->mainCarriageShipmentStage = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearMainCarriageShipmentStage(): self
    {
        $this->mainCarriageShipmentStage = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\MainCarriageShipmentStage|null
     */
    public function firstMainCarriageShipmentStage(): ?MainCarriageShipmentStage
    {
        $mainCarriageShipmentStage = $this->mainCarriageShipmentStage ?? [];
        $mainCarriageShipmentStage = reset($mainCarriageShipmentStage);

        if ($mainCarriageShipmentStage === false) {
            return null;
        }

        return $mainCarriageShipmentStage;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\MainCarriageShipmentStage|null
     */
    public function lastMainCarriageShipmentStage(): ?MainCarriageShipmentStage
    {
        $mainCarriageShipmentStage = $this->mainCarriageShipmentStage ?? [];
        $mainCarriageShipmentStage = end($mainCarriageShipmentStage);

        if ($mainCarriageShipmentStage === false) {
            return null;
        }

        return $mainCarriageShipmentStage;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\MainCarriageShipmentStage $mainCarriageShipmentStage
     * @return self
     */
    public function addToMainCarriageShipmentStage(MainCarriageShipmentStage $mainCarriageShipmentStage): self
    {
        $this->mainCarriageShipmentStage[] = $mainCarriageShipmentStage;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\MainCarriageShipmentStage
     */
    public function addToMainCarriageShipmentStageWithCreate(): MainCarriageShipmentStage
    {
        $this->addTomainCarriageShipmentStage($mainCarriageShipmentStage = new MainCarriageShipmentStage());

        return $mainCarriageShipmentStage;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\MainCarriageShipmentStage $mainCarriageShipmentStage
     * @return self
     */
    public function addOnceToMainCarriageShipmentStage(MainCarriageShipmentStage $mainCarriageShipmentStage): self
    {
        if (!is_array($this->mainCarriageShipmentStage)) {
            $this->mainCarriageShipmentStage = [];
        }

        $this->mainCarriageShipmentStage[0] = $mainCarriageShipmentStage;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\MainCarriageShipmentStage
     */
    public function addOnceToMainCarriageShipmentStageWithCreate(): MainCarriageShipmentStage
    {
        if (!is_array($this->mainCarriageShipmentStage)) {
            $this->mainCarriageShipmentStage = [];
        }

        if ($this->mainCarriageShipmentStage === []) {
            $this->addOnceTomainCarriageShipmentStage(new MainCarriageShipmentStage());
        }

        return $this->mainCarriageShipmentStage[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\PreCarriageShipmentStage>|null
     */
    public function getPreCarriageShipmentStage(): ?array
    {
        return $this->preCarriageShipmentStage;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\PreCarriageShipmentStage>|null $preCarriageShipmentStage
     * @return self
     */
    public function setPreCarriageShipmentStage(?array $preCarriageShipmentStage = null): self
    {
        $this->preCarriageShipmentStage = $preCarriageShipmentStage;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPreCarriageShipmentStage(): self
    {
        $this->preCarriageShipmentStage = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearPreCarriageShipmentStage(): self
    {
        $this->preCarriageShipmentStage = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\PreCarriageShipmentStage|null
     */
    public function firstPreCarriageShipmentStage(): ?PreCarriageShipmentStage
    {
        $preCarriageShipmentStage = $this->preCarriageShipmentStage ?? [];
        $preCarriageShipmentStage = reset($preCarriageShipmentStage);

        if ($preCarriageShipmentStage === false) {
            return null;
        }

        return $preCarriageShipmentStage;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\PreCarriageShipmentStage|null
     */
    public function lastPreCarriageShipmentStage(): ?PreCarriageShipmentStage
    {
        $preCarriageShipmentStage = $this->preCarriageShipmentStage ?? [];
        $preCarriageShipmentStage = end($preCarriageShipmentStage);

        if ($preCarriageShipmentStage === false) {
            return null;
        }

        return $preCarriageShipmentStage;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\PreCarriageShipmentStage $preCarriageShipmentStage
     * @return self
     */
    public function addToPreCarriageShipmentStage(PreCarriageShipmentStage $preCarriageShipmentStage): self
    {
        $this->preCarriageShipmentStage[] = $preCarriageShipmentStage;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\PreCarriageShipmentStage
     */
    public function addToPreCarriageShipmentStageWithCreate(): PreCarriageShipmentStage
    {
        $this->addTopreCarriageShipmentStage($preCarriageShipmentStage = new PreCarriageShipmentStage());

        return $preCarriageShipmentStage;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\PreCarriageShipmentStage $preCarriageShipmentStage
     * @return self
     */
    public function addOnceToPreCarriageShipmentStage(PreCarriageShipmentStage $preCarriageShipmentStage): self
    {
        if (!is_array($this->preCarriageShipmentStage)) {
            $this->preCarriageShipmentStage = [];
        }

        $this->preCarriageShipmentStage[0] = $preCarriageShipmentStage;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\PreCarriageShipmentStage
     */
    public function addOnceToPreCarriageShipmentStageWithCreate(): PreCarriageShipmentStage
    {
        if (!is_array($this->preCarriageShipmentStage)) {
            $this->preCarriageShipmentStage = [];
        }

        if ($this->preCarriageShipmentStage === []) {
            $this->addOnceTopreCarriageShipmentStage(new PreCarriageShipmentStage());
        }

        return $this->preCarriageShipmentStage[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\OnCarriageShipmentStage>|null
     */
    public function getOnCarriageShipmentStage(): ?array
    {
        return $this->onCarriageShipmentStage;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\OnCarriageShipmentStage>|null $onCarriageShipmentStage
     * @return self
     */
    public function setOnCarriageShipmentStage(?array $onCarriageShipmentStage = null): self
    {
        $this->onCarriageShipmentStage = $onCarriageShipmentStage;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetOnCarriageShipmentStage(): self
    {
        $this->onCarriageShipmentStage = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearOnCarriageShipmentStage(): self
    {
        $this->onCarriageShipmentStage = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\OnCarriageShipmentStage|null
     */
    public function firstOnCarriageShipmentStage(): ?OnCarriageShipmentStage
    {
        $onCarriageShipmentStage = $this->onCarriageShipmentStage ?? [];
        $onCarriageShipmentStage = reset($onCarriageShipmentStage);

        if ($onCarriageShipmentStage === false) {
            return null;
        }

        return $onCarriageShipmentStage;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\OnCarriageShipmentStage|null
     */
    public function lastOnCarriageShipmentStage(): ?OnCarriageShipmentStage
    {
        $onCarriageShipmentStage = $this->onCarriageShipmentStage ?? [];
        $onCarriageShipmentStage = end($onCarriageShipmentStage);

        if ($onCarriageShipmentStage === false) {
            return null;
        }

        return $onCarriageShipmentStage;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\OnCarriageShipmentStage $onCarriageShipmentStage
     * @return self
     */
    public function addToOnCarriageShipmentStage(OnCarriageShipmentStage $onCarriageShipmentStage): self
    {
        $this->onCarriageShipmentStage[] = $onCarriageShipmentStage;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\OnCarriageShipmentStage
     */
    public function addToOnCarriageShipmentStageWithCreate(): OnCarriageShipmentStage
    {
        $this->addToonCarriageShipmentStage($onCarriageShipmentStage = new OnCarriageShipmentStage());

        return $onCarriageShipmentStage;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\OnCarriageShipmentStage $onCarriageShipmentStage
     * @return self
     */
    public function addOnceToOnCarriageShipmentStage(OnCarriageShipmentStage $onCarriageShipmentStage): self
    {
        if (!is_array($this->onCarriageShipmentStage)) {
            $this->onCarriageShipmentStage = [];
        }

        $this->onCarriageShipmentStage[0] = $onCarriageShipmentStage;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\OnCarriageShipmentStage
     */
    public function addOnceToOnCarriageShipmentStageWithCreate(): OnCarriageShipmentStage
    {
        if (!is_array($this->onCarriageShipmentStage)) {
            $this->onCarriageShipmentStage = [];
        }

        if ($this->onCarriageShipmentStage === []) {
            $this->addOnceToonCarriageShipmentStage(new OnCarriageShipmentStage());
        }

        return $this->onCarriageShipmentStage[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\TransportHandlingUnit>|null
     */
    public function getTransportHandlingUnit(): ?array
    {
        return $this->transportHandlingUnit;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\TransportHandlingUnit>|null $transportHandlingUnit
     * @return self
     */
    public function setTransportHandlingUnit(?array $transportHandlingUnit = null): self
    {
        $this->transportHandlingUnit = $transportHandlingUnit;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTransportHandlingUnit(): self
    {
        $this->transportHandlingUnit = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearTransportHandlingUnit(): self
    {
        $this->transportHandlingUnit = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\TransportHandlingUnit|null
     */
    public function firstTransportHandlingUnit(): ?TransportHandlingUnit
    {
        $transportHandlingUnit = $this->transportHandlingUnit ?? [];
        $transportHandlingUnit = reset($transportHandlingUnit);

        if ($transportHandlingUnit === false) {
            return null;
        }

        return $transportHandlingUnit;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\TransportHandlingUnit|null
     */
    public function lastTransportHandlingUnit(): ?TransportHandlingUnit
    {
        $transportHandlingUnit = $this->transportHandlingUnit ?? [];
        $transportHandlingUnit = end($transportHandlingUnit);

        if ($transportHandlingUnit === false) {
            return null;
        }

        return $transportHandlingUnit;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\TransportHandlingUnit $transportHandlingUnit
     * @return self
     */
    public function addToTransportHandlingUnit(TransportHandlingUnit $transportHandlingUnit): self
    {
        $this->transportHandlingUnit[] = $transportHandlingUnit;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\TransportHandlingUnit
     */
    public function addToTransportHandlingUnitWithCreate(): TransportHandlingUnit
    {
        $this->addTotransportHandlingUnit($transportHandlingUnit = new TransportHandlingUnit());

        return $transportHandlingUnit;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\TransportHandlingUnit $transportHandlingUnit
     * @return self
     */
    public function addOnceToTransportHandlingUnit(TransportHandlingUnit $transportHandlingUnit): self
    {
        if (!is_array($this->transportHandlingUnit)) {
            $this->transportHandlingUnit = [];
        }

        $this->transportHandlingUnit[0] = $transportHandlingUnit;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\TransportHandlingUnit
     */
    public function addOnceToTransportHandlingUnitWithCreate(): TransportHandlingUnit
    {
        if (!is_array($this->transportHandlingUnit)) {
            $this->transportHandlingUnit = [];
        }

        if ($this->transportHandlingUnit === []) {
            $this->addOnceTotransportHandlingUnit(new TransportHandlingUnit());
        }

        return $this->transportHandlingUnit[0];
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\FirstArrivalPortLocation|null
     */
    public function getFirstArrivalPortLocation(): ?FirstArrivalPortLocation
    {
        return $this->firstArrivalPortLocation;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\FirstArrivalPortLocation
     */
    public function getFirstArrivalPortLocationWithCreate(): FirstArrivalPortLocation
    {
        $this->firstArrivalPortLocation = is_null($this->firstArrivalPortLocation) ? new FirstArrivalPortLocation() : $this->firstArrivalPortLocation;

        return $this->firstArrivalPortLocation;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\FirstArrivalPortLocation|null $firstArrivalPortLocation
     * @return self
     */
    public function setFirstArrivalPortLocation(?FirstArrivalPortLocation $firstArrivalPortLocation = null): self
    {
        $this->firstArrivalPortLocation = $firstArrivalPortLocation;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetFirstArrivalPortLocation(): self
    {
        $this->firstArrivalPortLocation = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\LastExitPortLocation|null
     */
    public function getLastExitPortLocation(): ?LastExitPortLocation
    {
        return $this->lastExitPortLocation;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\LastExitPortLocation
     */
    public function getLastExitPortLocationWithCreate(): LastExitPortLocation
    {
        $this->lastExitPortLocation = is_null($this->lastExitPortLocation) ? new LastExitPortLocation() : $this->lastExitPortLocation;

        return $this->lastExitPortLocation;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\LastExitPortLocation|null $lastExitPortLocation
     * @return self
     */
    public function setLastExitPortLocation(?LastExitPortLocation $lastExitPortLocation = null): self
    {
        $this->lastExitPortLocation = $lastExitPortLocation;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetLastExitPortLocation(): self
    {
        $this->lastExitPortLocation = null;

        return $this;
    }
}
