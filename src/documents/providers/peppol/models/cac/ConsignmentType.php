<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\BrokerAssignedID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CarrierAssignedID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CarrierServiceInstructions;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ChargeableWeightMeasure;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ChildConsignmentQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ConsigneeAssignedID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ConsignmentQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ConsignorAssignedID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ContractedCarrierAssignedID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CustomsClearanceServiceInstructions;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\DeclaredCustomsValueAmount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\DeclaredForCarriageValueAmount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\DeclaredStatisticsValueAmount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\DeliveryInstructions;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ForwarderServiceInstructions;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\FreeOnBoardValueAmount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\FreightForwarderAssignedID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\GrossVolumeMeasure;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\GrossWeightMeasure;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\HandlingCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\HandlingInstructions;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\HaulageInstructions;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Information;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\InsurancePremiumAmount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\InsuranceValueAmount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LoadingLengthMeasure;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LoadingSequenceID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\NetNetWeightMeasure;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\NetVolumeMeasure;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\NetWeightMeasure;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PerformingCarrierAssignedID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Remarks;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SequenceID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ShippingPriorityLevelCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SpecialInstructions;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SpecialServiceInstructions;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SummaryDescription;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TariffCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TariffDescription;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TotalGoodsItemQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TotalInvoiceAmount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TotalPackagesQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TotalTransportHandlingUnitQuantity;
use JMS\Serializer\Annotation as JMS;

class ConsignmentType
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
     * @var null|CarrierAssignedID
     */
    #[JMS\Accessor(getter: 'getCarrierAssignedID', setter: 'setCarrierAssignedID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CarrierAssignedID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CarrierAssignedID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $carrierAssignedID;

    /**
     * @var null|ConsigneeAssignedID
     */
    #[JMS\Accessor(getter: 'getConsigneeAssignedID', setter: 'setConsigneeAssignedID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ConsigneeAssignedID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ConsigneeAssignedID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $consigneeAssignedID;

    /**
     * @var null|ConsignorAssignedID
     */
    #[JMS\Accessor(getter: 'getConsignorAssignedID', setter: 'setConsignorAssignedID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ConsignorAssignedID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ConsignorAssignedID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $consignorAssignedID;

    /**
     * @var null|FreightForwarderAssignedID
     */
    #[JMS\Accessor(getter: 'getFreightForwarderAssignedID', setter: 'setFreightForwarderAssignedID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('FreightForwarderAssignedID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\FreightForwarderAssignedID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $freightForwarderAssignedID;

    /**
     * @var null|BrokerAssignedID
     */
    #[JMS\Accessor(getter: 'getBrokerAssignedID', setter: 'setBrokerAssignedID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('BrokerAssignedID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\BrokerAssignedID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $brokerAssignedID;

    /**
     * @var null|ContractedCarrierAssignedID
     */
    #[JMS\Accessor(getter: 'getContractedCarrierAssignedID', setter: 'setContractedCarrierAssignedID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ContractedCarrierAssignedID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ContractedCarrierAssignedID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $contractedCarrierAssignedID;

    /**
     * @var null|PerformingCarrierAssignedID
     */
    #[JMS\Accessor(getter: 'getPerformingCarrierAssignedID', setter: 'setPerformingCarrierAssignedID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PerformingCarrierAssignedID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PerformingCarrierAssignedID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $performingCarrierAssignedID;

    /**
     * @var null|array<SummaryDescription>
     */
    #[JMS\Accessor(getter: 'getSummaryDescription', setter: 'setSummaryDescription')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SummaryDescription')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SummaryDescription>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'SummaryDescription', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $summaryDescription;

    /**
     * @var null|TotalInvoiceAmount
     */
    #[JMS\Accessor(getter: 'getTotalInvoiceAmount', setter: 'setTotalInvoiceAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TotalInvoiceAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TotalInvoiceAmount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $totalInvoiceAmount;

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
     * @var null|array<TariffDescription>
     */
    #[JMS\Accessor(getter: 'getTariffDescription', setter: 'setTariffDescription')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TariffDescription')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TariffDescription>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'TariffDescription', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $tariffDescription;

    /**
     * @var null|TariffCode
     */
    #[JMS\Accessor(getter: 'getTariffCode', setter: 'setTariffCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TariffCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TariffCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $tariffCode;

    /**
     * @var null|InsurancePremiumAmount
     */
    #[JMS\Accessor(getter: 'getInsurancePremiumAmount', setter: 'setInsurancePremiumAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('InsurancePremiumAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\InsurancePremiumAmount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $insurancePremiumAmount;

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
     * @var null|LoadingLengthMeasure
     */
    #[JMS\Accessor(getter: 'getLoadingLengthMeasure', setter: 'setLoadingLengthMeasure')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('LoadingLengthMeasure')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LoadingLengthMeasure')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $loadingLengthMeasure;

    /**
     * @var null|array<Remarks>
     */
    #[JMS\Accessor(getter: 'getRemarks', setter: 'setRemarks')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Remarks')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Remarks>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'Remarks', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $remarks;

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
     * @var null|bool
     */
    #[JMS\Accessor(getter: 'getAnimalFoodIndicator', setter: 'setAnimalFoodIndicator')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('AnimalFoodIndicator')]
    #[JMS\Type('bool')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $animalFoodIndicator;

    /**
     * @var null|bool
     */
    #[JMS\Accessor(getter: 'getHumanFoodIndicator', setter: 'setHumanFoodIndicator')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('HumanFoodIndicator')]
    #[JMS\Type('bool')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $humanFoodIndicator;

    /**
     * @var null|bool
     */
    #[JMS\Accessor(getter: 'getLivestockIndicator', setter: 'setLivestockIndicator')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('LivestockIndicator')]
    #[JMS\Type('bool')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $livestockIndicator;

    /**
     * @var null|bool
     */
    #[JMS\Accessor(getter: 'getBulkCargoIndicator', setter: 'setBulkCargoIndicator')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('BulkCargoIndicator')]
    #[JMS\Type('bool')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $bulkCargoIndicator;

    /**
     * @var null|bool
     */
    #[JMS\Accessor(getter: 'getContainerizedIndicator', setter: 'setContainerizedIndicator')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ContainerizedIndicator')]
    #[JMS\Type('bool')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $containerizedIndicator;

    /**
     * @var null|bool
     */
    #[JMS\Accessor(getter: 'getGeneralCargoIndicator', setter: 'setGeneralCargoIndicator')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('GeneralCargoIndicator')]
    #[JMS\Type('bool')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $generalCargoIndicator;

    /**
     * @var null|bool
     */
    #[JMS\Accessor(getter: 'getSpecialSecurityIndicator', setter: 'setSpecialSecurityIndicator')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SpecialSecurityIndicator')]
    #[JMS\Type('bool')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $specialSecurityIndicator;

    /**
     * @var null|bool
     */
    #[JMS\Accessor(getter: 'getThirdPartyPayerIndicator', setter: 'setThirdPartyPayerIndicator')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ThirdPartyPayerIndicator')]
    #[JMS\Type('bool')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $thirdPartyPayerIndicator;

    /**
     * @var null|array<CarrierServiceInstructions>
     */
    #[JMS\Accessor(getter: 'getCarrierServiceInstructions', setter: 'setCarrierServiceInstructions')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CarrierServiceInstructions')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CarrierServiceInstructions>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'CarrierServiceInstructions', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $carrierServiceInstructions;

    /**
     * @var null|array<CustomsClearanceServiceInstructions>
     */
    #[JMS\Accessor(getter: 'getCustomsClearanceServiceInstructions', setter: 'setCustomsClearanceServiceInstructions')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CustomsClearanceServiceInstructions')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CustomsClearanceServiceInstructions>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'CustomsClearanceServiceInstructions', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $customsClearanceServiceInstructions;

    /**
     * @var null|array<ForwarderServiceInstructions>
     */
    #[JMS\Accessor(getter: 'getForwarderServiceInstructions', setter: 'setForwarderServiceInstructions')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ForwarderServiceInstructions')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ForwarderServiceInstructions>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'ForwarderServiceInstructions', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $forwarderServiceInstructions;

    /**
     * @var null|array<SpecialServiceInstructions>
     */
    #[JMS\Accessor(getter: 'getSpecialServiceInstructions', setter: 'setSpecialServiceInstructions')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SpecialServiceInstructions')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SpecialServiceInstructions>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'SpecialServiceInstructions', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $specialServiceInstructions;

    /**
     * @var null|SequenceID
     */
    #[JMS\Accessor(getter: 'getSequenceID', setter: 'setSequenceID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SequenceID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SequenceID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $sequenceID;

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
     * @var null|bool
     */
    #[JMS\Accessor(getter: 'getConsolidatableIndicator', setter: 'setConsolidatableIndicator')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ConsolidatableIndicator')]
    #[JMS\Type('bool')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $consolidatableIndicator;

    /**
     * @var null|array<HaulageInstructions>
     */
    #[JMS\Accessor(getter: 'getHaulageInstructions', setter: 'setHaulageInstructions')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('HaulageInstructions')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\HaulageInstructions>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'HaulageInstructions', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $haulageInstructions;

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
     * @var null|ChildConsignmentQuantity
     */
    #[JMS\Accessor(getter: 'getChildConsignmentQuantity', setter: 'setChildConsignmentQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ChildConsignmentQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ChildConsignmentQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $childConsignmentQuantity;

    /**
     * @var null|TotalPackagesQuantity
     */
    #[JMS\Accessor(getter: 'getTotalPackagesQuantity', setter: 'setTotalPackagesQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TotalPackagesQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TotalPackagesQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $totalPackagesQuantity;

    /**
     * @var null|array<ConsolidatedShipment>
     */
    #[JMS\Accessor(getter: 'getConsolidatedShipment', setter: 'setConsolidatedShipment')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ConsolidatedShipment')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\ConsolidatedShipment>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'ConsolidatedShipment', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $consolidatedShipment;

    /**
     * @var null|array<CustomsDeclaration>
     */
    #[JMS\Accessor(getter: 'getCustomsDeclaration', setter: 'setCustomsDeclaration')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CustomsDeclaration')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\CustomsDeclaration>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'CustomsDeclaration', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $customsDeclaration;

    /**
     * @var null|RequestedPickupTransportEvent
     */
    #[JMS\Accessor(getter: 'getRequestedPickupTransportEvent', setter: 'setRequestedPickupTransportEvent')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('RequestedPickupTransportEvent')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\RequestedPickupTransportEvent')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $requestedPickupTransportEvent;

    /**
     * @var null|RequestedDeliveryTransportEvent
     */
    #[JMS\Accessor(getter: 'getRequestedDeliveryTransportEvent', setter: 'setRequestedDeliveryTransportEvent')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('RequestedDeliveryTransportEvent')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\RequestedDeliveryTransportEvent')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $requestedDeliveryTransportEvent;

    /**
     * @var null|PlannedPickupTransportEvent
     */
    #[JMS\Accessor(getter: 'getPlannedPickupTransportEvent', setter: 'setPlannedPickupTransportEvent')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PlannedPickupTransportEvent')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\PlannedPickupTransportEvent')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $plannedPickupTransportEvent;

    /**
     * @var null|PlannedDeliveryTransportEvent
     */
    #[JMS\Accessor(getter: 'getPlannedDeliveryTransportEvent', setter: 'setPlannedDeliveryTransportEvent')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PlannedDeliveryTransportEvent')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\PlannedDeliveryTransportEvent')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $plannedDeliveryTransportEvent;

    /**
     * @var null|array<Status>
     */
    #[JMS\Accessor(getter: 'getStatus', setter: 'setStatus')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Status')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\Status>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'Status', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $status;

    /**
     * @var null|array<ChildConsignment>
     */
    #[JMS\Accessor(getter: 'getChildConsignment', setter: 'setChildConsignment')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ChildConsignment')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\ChildConsignment>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'ChildConsignment', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $childConsignment;

    /**
     * @var null|ConsigneeParty
     */
    #[JMS\Accessor(getter: 'getConsigneeParty', setter: 'setConsigneeParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ConsigneeParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\ConsigneeParty')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $consigneeParty;

    /**
     * @var null|ExporterParty
     */
    #[JMS\Accessor(getter: 'getExporterParty', setter: 'setExporterParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ExporterParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\ExporterParty')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $exporterParty;

    /**
     * @var null|ConsignorParty
     */
    #[JMS\Accessor(getter: 'getConsignorParty', setter: 'setConsignorParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ConsignorParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\ConsignorParty')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $consignorParty;

    /**
     * @var null|ImporterParty
     */
    #[JMS\Accessor(getter: 'getImporterParty', setter: 'setImporterParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ImporterParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\ImporterParty')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $importerParty;

    /**
     * @var null|CarrierParty
     */
    #[JMS\Accessor(getter: 'getCarrierParty', setter: 'setCarrierParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CarrierParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\CarrierParty')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $carrierParty;

    /**
     * @var null|FreightForwarderParty
     */
    #[JMS\Accessor(getter: 'getFreightForwarderParty', setter: 'setFreightForwarderParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('FreightForwarderParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\FreightForwarderParty')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $freightForwarderParty;

    /**
     * @var null|NotifyParty
     */
    #[JMS\Accessor(getter: 'getNotifyParty', setter: 'setNotifyParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('NotifyParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\NotifyParty')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $notifyParty;

    /**
     * @var null|OriginalDespatchParty
     */
    #[JMS\Accessor(getter: 'getOriginalDespatchParty', setter: 'setOriginalDespatchParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('OriginalDespatchParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\OriginalDespatchParty')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $originalDespatchParty;

    /**
     * @var null|FinalDeliveryParty
     */
    #[JMS\Accessor(getter: 'getFinalDeliveryParty', setter: 'setFinalDeliveryParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('FinalDeliveryParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\FinalDeliveryParty')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $finalDeliveryParty;

    /**
     * @var null|PerformingCarrierParty
     */
    #[JMS\Accessor(getter: 'getPerformingCarrierParty', setter: 'setPerformingCarrierParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PerformingCarrierParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\PerformingCarrierParty')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $performingCarrierParty;

    /**
     * @var null|SubstituteCarrierParty
     */
    #[JMS\Accessor(getter: 'getSubstituteCarrierParty', setter: 'setSubstituteCarrierParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SubstituteCarrierParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\SubstituteCarrierParty')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $substituteCarrierParty;

    /**
     * @var null|LogisticsOperatorParty
     */
    #[JMS\Accessor(getter: 'getLogisticsOperatorParty', setter: 'setLogisticsOperatorParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('LogisticsOperatorParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\LogisticsOperatorParty')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $logisticsOperatorParty;

    /**
     * @var null|TransportAdvisorParty
     */
    #[JMS\Accessor(getter: 'getTransportAdvisorParty', setter: 'setTransportAdvisorParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TransportAdvisorParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\TransportAdvisorParty')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $transportAdvisorParty;

    /**
     * @var null|HazardousItemNotificationParty
     */
    #[JMS\Accessor(getter: 'getHazardousItemNotificationParty', setter: 'setHazardousItemNotificationParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('HazardousItemNotificationParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\HazardousItemNotificationParty')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $hazardousItemNotificationParty;

    /**
     * @var null|InsuranceParty
     */
    #[JMS\Accessor(getter: 'getInsuranceParty', setter: 'setInsuranceParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('InsuranceParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\InsuranceParty')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $insuranceParty;

    /**
     * @var null|MortgageHolderParty
     */
    #[JMS\Accessor(getter: 'getMortgageHolderParty', setter: 'setMortgageHolderParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MortgageHolderParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\MortgageHolderParty')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $mortgageHolderParty;

    /**
     * @var null|BillOfLadingHolderParty
     */
    #[JMS\Accessor(getter: 'getBillOfLadingHolderParty', setter: 'setBillOfLadingHolderParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('BillOfLadingHolderParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\BillOfLadingHolderParty')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $billOfLadingHolderParty;

    /**
     * @var null|OriginalDepartureCountry
     */
    #[JMS\Accessor(getter: 'getOriginalDepartureCountry', setter: 'setOriginalDepartureCountry')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('OriginalDepartureCountry')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\OriginalDepartureCountry')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $originalDepartureCountry;

    /**
     * @var null|FinalDestinationCountry
     */
    #[JMS\Accessor(getter: 'getFinalDestinationCountry', setter: 'setFinalDestinationCountry')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('FinalDestinationCountry')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\FinalDestinationCountry')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $finalDestinationCountry;

    /**
     * @var null|array<TransitCountry>
     */
    #[JMS\Accessor(getter: 'getTransitCountry', setter: 'setTransitCountry')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TransitCountry')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\TransitCountry>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'TransitCountry', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $transitCountry;

    /**
     * @var null|TransportContract
     */
    #[JMS\Accessor(getter: 'getTransportContract', setter: 'setTransportContract')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TransportContract')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\TransportContract')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $transportContract;

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
     * @var null|OriginalDespatchTransportationService
     */
    #[JMS\Accessor(getter: 'getOriginalDespatchTransportationService', setter: 'setOriginalDespatchTransportationService')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('OriginalDespatchTransportationService')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\OriginalDespatchTransportationService')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $originalDespatchTransportationService;

    /**
     * @var null|FinalDeliveryTransportationService
     */
    #[JMS\Accessor(getter: 'getFinalDeliveryTransportationService', setter: 'setFinalDeliveryTransportationService')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('FinalDeliveryTransportationService')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\FinalDeliveryTransportationService')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $finalDeliveryTransportationService;

    /**
     * @var null|DeliveryTerms
     */
    #[JMS\Accessor(getter: 'getDeliveryTerms', setter: 'setDeliveryTerms')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('DeliveryTerms')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\DeliveryTerms')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $deliveryTerms;

    /**
     * @var null|PaymentTerms
     */
    #[JMS\Accessor(getter: 'getPaymentTerms', setter: 'setPaymentTerms')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PaymentTerms')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\PaymentTerms')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $paymentTerms;

    /**
     * @var null|CollectPaymentTerms
     */
    #[JMS\Accessor(getter: 'getCollectPaymentTerms', setter: 'setCollectPaymentTerms')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CollectPaymentTerms')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\CollectPaymentTerms')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $collectPaymentTerms;

    /**
     * @var null|DisbursementPaymentTerms
     */
    #[JMS\Accessor(getter: 'getDisbursementPaymentTerms', setter: 'setDisbursementPaymentTerms')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('DisbursementPaymentTerms')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\DisbursementPaymentTerms')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $disbursementPaymentTerms;

    /**
     * @var null|PrepaidPaymentTerms
     */
    #[JMS\Accessor(getter: 'getPrepaidPaymentTerms', setter: 'setPrepaidPaymentTerms')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PrepaidPaymentTerms')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\PrepaidPaymentTerms')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $prepaidPaymentTerms;

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
     * @var null|array<ExtraAllowanceCharge>
     */
    #[JMS\Accessor(getter: 'getExtraAllowanceCharge', setter: 'setExtraAllowanceCharge')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ExtraAllowanceCharge')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\ExtraAllowanceCharge>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'ExtraAllowanceCharge', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $extraAllowanceCharge;

    /**
     * @var null|array<MainCarriageShipmentStage>
     */
    #[JMS\Accessor(getter: 'getMainCarriageShipmentStage', setter: 'setMainCarriageShipmentStage')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MainCarriageShipmentStage')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\MainCarriageShipmentStage>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'MainCarriageShipmentStage', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $mainCarriageShipmentStage;

    /**
     * @var null|array<PreCarriageShipmentStage>
     */
    #[JMS\Accessor(getter: 'getPreCarriageShipmentStage', setter: 'setPreCarriageShipmentStage')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PreCarriageShipmentStage')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\PreCarriageShipmentStage>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'PreCarriageShipmentStage', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $preCarriageShipmentStage;

    /**
     * @var null|array<OnCarriageShipmentStage>
     */
    #[JMS\Accessor(getter: 'getOnCarriageShipmentStage', setter: 'setOnCarriageShipmentStage')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('OnCarriageShipmentStage')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\OnCarriageShipmentStage>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'OnCarriageShipmentStage', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $onCarriageShipmentStage;

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
     * @return null|CarrierAssignedID
     */
    public function getCarrierAssignedID(): ?CarrierAssignedID
    {
        return $this->carrierAssignedID;
    }

    /**
     * @return CarrierAssignedID
     */
    public function getCarrierAssignedIDWithCreate(): CarrierAssignedID
    {
        $this->carrierAssignedID ??= new CarrierAssignedID();

        return $this->carrierAssignedID;
    }

    /**
     * @param  null|CarrierAssignedID $carrierAssignedID
     * @return static
     */
    public function setCarrierAssignedID(
        ?CarrierAssignedID $carrierAssignedID = null
    ): static {
        $this->carrierAssignedID = $carrierAssignedID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCarrierAssignedID(): static
    {
        $this->carrierAssignedID = null;

        return $this;
    }

    /**
     * @return null|ConsigneeAssignedID
     */
    public function getConsigneeAssignedID(): ?ConsigneeAssignedID
    {
        return $this->consigneeAssignedID;
    }

    /**
     * @return ConsigneeAssignedID
     */
    public function getConsigneeAssignedIDWithCreate(): ConsigneeAssignedID
    {
        $this->consigneeAssignedID ??= new ConsigneeAssignedID();

        return $this->consigneeAssignedID;
    }

    /**
     * @param  null|ConsigneeAssignedID $consigneeAssignedID
     * @return static
     */
    public function setConsigneeAssignedID(
        ?ConsigneeAssignedID $consigneeAssignedID = null
    ): static {
        $this->consigneeAssignedID = $consigneeAssignedID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetConsigneeAssignedID(): static
    {
        $this->consigneeAssignedID = null;

        return $this;
    }

    /**
     * @return null|ConsignorAssignedID
     */
    public function getConsignorAssignedID(): ?ConsignorAssignedID
    {
        return $this->consignorAssignedID;
    }

    /**
     * @return ConsignorAssignedID
     */
    public function getConsignorAssignedIDWithCreate(): ConsignorAssignedID
    {
        $this->consignorAssignedID ??= new ConsignorAssignedID();

        return $this->consignorAssignedID;
    }

    /**
     * @param  null|ConsignorAssignedID $consignorAssignedID
     * @return static
     */
    public function setConsignorAssignedID(
        ?ConsignorAssignedID $consignorAssignedID = null
    ): static {
        $this->consignorAssignedID = $consignorAssignedID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetConsignorAssignedID(): static
    {
        $this->consignorAssignedID = null;

        return $this;
    }

    /**
     * @return null|FreightForwarderAssignedID
     */
    public function getFreightForwarderAssignedID(): ?FreightForwarderAssignedID
    {
        return $this->freightForwarderAssignedID;
    }

    /**
     * @return FreightForwarderAssignedID
     */
    public function getFreightForwarderAssignedIDWithCreate(): FreightForwarderAssignedID
    {
        $this->freightForwarderAssignedID ??= new FreightForwarderAssignedID();

        return $this->freightForwarderAssignedID;
    }

    /**
     * @param  null|FreightForwarderAssignedID $freightForwarderAssignedID
     * @return static
     */
    public function setFreightForwarderAssignedID(
        ?FreightForwarderAssignedID $freightForwarderAssignedID = null,
    ): static {
        $this->freightForwarderAssignedID = $freightForwarderAssignedID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetFreightForwarderAssignedID(): static
    {
        $this->freightForwarderAssignedID = null;

        return $this;
    }

    /**
     * @return null|BrokerAssignedID
     */
    public function getBrokerAssignedID(): ?BrokerAssignedID
    {
        return $this->brokerAssignedID;
    }

    /**
     * @return BrokerAssignedID
     */
    public function getBrokerAssignedIDWithCreate(): BrokerAssignedID
    {
        $this->brokerAssignedID ??= new BrokerAssignedID();

        return $this->brokerAssignedID;
    }

    /**
     * @param  null|BrokerAssignedID $brokerAssignedID
     * @return static
     */
    public function setBrokerAssignedID(
        ?BrokerAssignedID $brokerAssignedID = null
    ): static {
        $this->brokerAssignedID = $brokerAssignedID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetBrokerAssignedID(): static
    {
        $this->brokerAssignedID = null;

        return $this;
    }

    /**
     * @return null|ContractedCarrierAssignedID
     */
    public function getContractedCarrierAssignedID(): ?ContractedCarrierAssignedID
    {
        return $this->contractedCarrierAssignedID;
    }

    /**
     * @return ContractedCarrierAssignedID
     */
    public function getContractedCarrierAssignedIDWithCreate(): ContractedCarrierAssignedID
    {
        $this->contractedCarrierAssignedID ??= new ContractedCarrierAssignedID();

        return $this->contractedCarrierAssignedID;
    }

    /**
     * @param  null|ContractedCarrierAssignedID $contractedCarrierAssignedID
     * @return static
     */
    public function setContractedCarrierAssignedID(
        ?ContractedCarrierAssignedID $contractedCarrierAssignedID = null,
    ): static {
        $this->contractedCarrierAssignedID = $contractedCarrierAssignedID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetContractedCarrierAssignedID(): static
    {
        $this->contractedCarrierAssignedID = null;

        return $this;
    }

    /**
     * @return null|PerformingCarrierAssignedID
     */
    public function getPerformingCarrierAssignedID(): ?PerformingCarrierAssignedID
    {
        return $this->performingCarrierAssignedID;
    }

    /**
     * @return PerformingCarrierAssignedID
     */
    public function getPerformingCarrierAssignedIDWithCreate(): PerformingCarrierAssignedID
    {
        $this->performingCarrierAssignedID ??= new PerformingCarrierAssignedID();

        return $this->performingCarrierAssignedID;
    }

    /**
     * @param  null|PerformingCarrierAssignedID $performingCarrierAssignedID
     * @return static
     */
    public function setPerformingCarrierAssignedID(
        ?PerformingCarrierAssignedID $performingCarrierAssignedID = null,
    ): static {
        $this->performingCarrierAssignedID = $performingCarrierAssignedID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPerformingCarrierAssignedID(): static
    {
        $this->performingCarrierAssignedID = null;

        return $this;
    }

    /**
     * @return null|array<SummaryDescription>
     */
    public function getSummaryDescription(): ?array
    {
        return $this->summaryDescription;
    }

    /**
     * @param  null|array<SummaryDescription> $summaryDescription
     * @return static
     */
    public function setSummaryDescription(
        ?array $summaryDescription = null
    ): static {
        $this->summaryDescription = $summaryDescription;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSummaryDescription(): static
    {
        $this->summaryDescription = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearSummaryDescription(): static
    {
        $this->summaryDescription = [];

        return $this;
    }

    /**
     * @return null|SummaryDescription
     */
    public function firstSummaryDescription(): ?SummaryDescription
    {
        $summaryDescription = $this->summaryDescription ?? [];
        $summaryDescription = reset($summaryDescription);

        if (false === $summaryDescription) {
            return null;
        }

        return $summaryDescription;
    }

    /**
     * @return null|SummaryDescription
     */
    public function lastSummaryDescription(): ?SummaryDescription
    {
        $summaryDescription = $this->summaryDescription ?? [];
        $summaryDescription = end($summaryDescription);

        if (false === $summaryDescription) {
            return null;
        }

        return $summaryDescription;
    }

    /**
     * @param  SummaryDescription $summaryDescription
     * @return static
     */
    public function addToSummaryDescription(
        SummaryDescription $summaryDescription
    ): static {
        $this->summaryDescription[] = $summaryDescription;

        return $this;
    }

    /**
     * @return SummaryDescription
     */
    public function addToSummaryDescriptionWithCreate(): SummaryDescription
    {
        $this->addTosummaryDescription($summaryDescription = new SummaryDescription());

        return $summaryDescription;
    }

    /**
     * @param  SummaryDescription $summaryDescription
     * @return static
     */
    public function addOnceToSummaryDescription(
        SummaryDescription $summaryDescription
    ): static {
        if (!is_array($this->summaryDescription)) {
            $this->summaryDescription = [];
        }

        $this->summaryDescription[0] = $summaryDescription;

        return $this;
    }

    /**
     * @return SummaryDescription
     */
    public function addOnceToSummaryDescriptionWithCreate(): SummaryDescription
    {
        if (!is_array($this->summaryDescription)) {
            $this->summaryDescription = [];
        }

        if ([] === $this->summaryDescription) {
            $this->addOnceTosummaryDescription(new SummaryDescription());
        }

        return $this->summaryDescription[0];
    }

    /**
     * @return null|TotalInvoiceAmount
     */
    public function getTotalInvoiceAmount(): ?TotalInvoiceAmount
    {
        return $this->totalInvoiceAmount;
    }

    /**
     * @return TotalInvoiceAmount
     */
    public function getTotalInvoiceAmountWithCreate(): TotalInvoiceAmount
    {
        $this->totalInvoiceAmount ??= new TotalInvoiceAmount();

        return $this->totalInvoiceAmount;
    }

    /**
     * @param  null|TotalInvoiceAmount $totalInvoiceAmount
     * @return static
     */
    public function setTotalInvoiceAmount(
        ?TotalInvoiceAmount $totalInvoiceAmount = null
    ): static {
        $this->totalInvoiceAmount = $totalInvoiceAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTotalInvoiceAmount(): static
    {
        $this->totalInvoiceAmount = null;

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
     * @return null|array<TariffDescription>
     */
    public function getTariffDescription(): ?array
    {
        return $this->tariffDescription;
    }

    /**
     * @param  null|array<TariffDescription> $tariffDescription
     * @return static
     */
    public function setTariffDescription(
        ?array $tariffDescription = null
    ): static {
        $this->tariffDescription = $tariffDescription;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTariffDescription(): static
    {
        $this->tariffDescription = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearTariffDescription(): static
    {
        $this->tariffDescription = [];

        return $this;
    }

    /**
     * @return null|TariffDescription
     */
    public function firstTariffDescription(): ?TariffDescription
    {
        $tariffDescription = $this->tariffDescription ?? [];
        $tariffDescription = reset($tariffDescription);

        if (false === $tariffDescription) {
            return null;
        }

        return $tariffDescription;
    }

    /**
     * @return null|TariffDescription
     */
    public function lastTariffDescription(): ?TariffDescription
    {
        $tariffDescription = $this->tariffDescription ?? [];
        $tariffDescription = end($tariffDescription);

        if (false === $tariffDescription) {
            return null;
        }

        return $tariffDescription;
    }

    /**
     * @param  TariffDescription $tariffDescription
     * @return static
     */
    public function addToTariffDescription(
        TariffDescription $tariffDescription
    ): static {
        $this->tariffDescription[] = $tariffDescription;

        return $this;
    }

    /**
     * @return TariffDescription
     */
    public function addToTariffDescriptionWithCreate(): TariffDescription
    {
        $this->addTotariffDescription($tariffDescription = new TariffDescription());

        return $tariffDescription;
    }

    /**
     * @param  TariffDescription $tariffDescription
     * @return static
     */
    public function addOnceToTariffDescription(
        TariffDescription $tariffDescription
    ): static {
        if (!is_array($this->tariffDescription)) {
            $this->tariffDescription = [];
        }

        $this->tariffDescription[0] = $tariffDescription;

        return $this;
    }

    /**
     * @return TariffDescription
     */
    public function addOnceToTariffDescriptionWithCreate(): TariffDescription
    {
        if (!is_array($this->tariffDescription)) {
            $this->tariffDescription = [];
        }

        if ([] === $this->tariffDescription) {
            $this->addOnceTotariffDescription(new TariffDescription());
        }

        return $this->tariffDescription[0];
    }

    /**
     * @return null|TariffCode
     */
    public function getTariffCode(): ?TariffCode
    {
        return $this->tariffCode;
    }

    /**
     * @return TariffCode
     */
    public function getTariffCodeWithCreate(): TariffCode
    {
        $this->tariffCode ??= new TariffCode();

        return $this->tariffCode;
    }

    /**
     * @param  null|TariffCode $tariffCode
     * @return static
     */
    public function setTariffCode(
        ?TariffCode $tariffCode = null
    ): static {
        $this->tariffCode = $tariffCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTariffCode(): static
    {
        $this->tariffCode = null;

        return $this;
    }

    /**
     * @return null|InsurancePremiumAmount
     */
    public function getInsurancePremiumAmount(): ?InsurancePremiumAmount
    {
        return $this->insurancePremiumAmount;
    }

    /**
     * @return InsurancePremiumAmount
     */
    public function getInsurancePremiumAmountWithCreate(): InsurancePremiumAmount
    {
        $this->insurancePremiumAmount ??= new InsurancePremiumAmount();

        return $this->insurancePremiumAmount;
    }

    /**
     * @param  null|InsurancePremiumAmount $insurancePremiumAmount
     * @return static
     */
    public function setInsurancePremiumAmount(
        ?InsurancePremiumAmount $insurancePremiumAmount = null
    ): static {
        $this->insurancePremiumAmount = $insurancePremiumAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetInsurancePremiumAmount(): static
    {
        $this->insurancePremiumAmount = null;

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
     * @return null|LoadingLengthMeasure
     */
    public function getLoadingLengthMeasure(): ?LoadingLengthMeasure
    {
        return $this->loadingLengthMeasure;
    }

    /**
     * @return LoadingLengthMeasure
     */
    public function getLoadingLengthMeasureWithCreate(): LoadingLengthMeasure
    {
        $this->loadingLengthMeasure ??= new LoadingLengthMeasure();

        return $this->loadingLengthMeasure;
    }

    /**
     * @param  null|LoadingLengthMeasure $loadingLengthMeasure
     * @return static
     */
    public function setLoadingLengthMeasure(
        ?LoadingLengthMeasure $loadingLengthMeasure = null
    ): static {
        $this->loadingLengthMeasure = $loadingLengthMeasure;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLoadingLengthMeasure(): static
    {
        $this->loadingLengthMeasure = null;

        return $this;
    }

    /**
     * @return null|array<Remarks>
     */
    public function getRemarks(): ?array
    {
        return $this->remarks;
    }

    /**
     * @param  null|array<Remarks> $remarks
     * @return static
     */
    public function setRemarks(
        ?array $remarks = null
    ): static {
        $this->remarks = $remarks;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRemarks(): static
    {
        $this->remarks = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearRemarks(): static
    {
        $this->remarks = [];

        return $this;
    }

    /**
     * @return null|Remarks
     */
    public function firstRemarks(): ?Remarks
    {
        $remarks = $this->remarks ?? [];
        $remarks = reset($remarks);

        if (false === $remarks) {
            return null;
        }

        return $remarks;
    }

    /**
     * @return null|Remarks
     */
    public function lastRemarks(): ?Remarks
    {
        $remarks = $this->remarks ?? [];
        $remarks = end($remarks);

        if (false === $remarks) {
            return null;
        }

        return $remarks;
    }

    /**
     * @param  Remarks $remarks
     * @return static
     */
    public function addToRemarks(
        Remarks $remarks
    ): static {
        $this->remarks[] = $remarks;

        return $this;
    }

    /**
     * @return Remarks
     */
    public function addToRemarksWithCreate(): Remarks
    {
        $this->addToremarks($remarks = new Remarks());

        return $remarks;
    }

    /**
     * @param  Remarks $remarks
     * @return static
     */
    public function addOnceToRemarks(
        Remarks $remarks
    ): static {
        if (!is_array($this->remarks)) {
            $this->remarks = [];
        }

        $this->remarks[0] = $remarks;

        return $this;
    }

    /**
     * @return Remarks
     */
    public function addOnceToRemarksWithCreate(): Remarks
    {
        if (!is_array($this->remarks)) {
            $this->remarks = [];
        }

        if ([] === $this->remarks) {
            $this->addOnceToremarks(new Remarks());
        }

        return $this->remarks[0];
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
     * @return null|bool
     */
    public function getAnimalFoodIndicator(): ?bool
    {
        return $this->animalFoodIndicator;
    }

    /**
     * @param  null|bool $animalFoodIndicator
     * @return static
     */
    public function setAnimalFoodIndicator(
        ?bool $animalFoodIndicator = null
    ): static {
        $this->animalFoodIndicator = $animalFoodIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAnimalFoodIndicator(): static
    {
        $this->animalFoodIndicator = null;

        return $this;
    }

    /**
     * @return null|bool
     */
    public function getHumanFoodIndicator(): ?bool
    {
        return $this->humanFoodIndicator;
    }

    /**
     * @param  null|bool $humanFoodIndicator
     * @return static
     */
    public function setHumanFoodIndicator(
        ?bool $humanFoodIndicator = null
    ): static {
        $this->humanFoodIndicator = $humanFoodIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetHumanFoodIndicator(): static
    {
        $this->humanFoodIndicator = null;

        return $this;
    }

    /**
     * @return null|bool
     */
    public function getLivestockIndicator(): ?bool
    {
        return $this->livestockIndicator;
    }

    /**
     * @param  null|bool $livestockIndicator
     * @return static
     */
    public function setLivestockIndicator(
        ?bool $livestockIndicator = null
    ): static {
        $this->livestockIndicator = $livestockIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLivestockIndicator(): static
    {
        $this->livestockIndicator = null;

        return $this;
    }

    /**
     * @return null|bool
     */
    public function getBulkCargoIndicator(): ?bool
    {
        return $this->bulkCargoIndicator;
    }

    /**
     * @param  null|bool $bulkCargoIndicator
     * @return static
     */
    public function setBulkCargoIndicator(
        ?bool $bulkCargoIndicator = null
    ): static {
        $this->bulkCargoIndicator = $bulkCargoIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetBulkCargoIndicator(): static
    {
        $this->bulkCargoIndicator = null;

        return $this;
    }

    /**
     * @return null|bool
     */
    public function getContainerizedIndicator(): ?bool
    {
        return $this->containerizedIndicator;
    }

    /**
     * @param  null|bool $containerizedIndicator
     * @return static
     */
    public function setContainerizedIndicator(
        ?bool $containerizedIndicator = null
    ): static {
        $this->containerizedIndicator = $containerizedIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetContainerizedIndicator(): static
    {
        $this->containerizedIndicator = null;

        return $this;
    }

    /**
     * @return null|bool
     */
    public function getGeneralCargoIndicator(): ?bool
    {
        return $this->generalCargoIndicator;
    }

    /**
     * @param  null|bool $generalCargoIndicator
     * @return static
     */
    public function setGeneralCargoIndicator(
        ?bool $generalCargoIndicator = null
    ): static {
        $this->generalCargoIndicator = $generalCargoIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetGeneralCargoIndicator(): static
    {
        $this->generalCargoIndicator = null;

        return $this;
    }

    /**
     * @return null|bool
     */
    public function getSpecialSecurityIndicator(): ?bool
    {
        return $this->specialSecurityIndicator;
    }

    /**
     * @param  null|bool $specialSecurityIndicator
     * @return static
     */
    public function setSpecialSecurityIndicator(
        ?bool $specialSecurityIndicator = null
    ): static {
        $this->specialSecurityIndicator = $specialSecurityIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSpecialSecurityIndicator(): static
    {
        $this->specialSecurityIndicator = null;

        return $this;
    }

    /**
     * @return null|bool
     */
    public function getThirdPartyPayerIndicator(): ?bool
    {
        return $this->thirdPartyPayerIndicator;
    }

    /**
     * @param  null|bool $thirdPartyPayerIndicator
     * @return static
     */
    public function setThirdPartyPayerIndicator(
        ?bool $thirdPartyPayerIndicator = null
    ): static {
        $this->thirdPartyPayerIndicator = $thirdPartyPayerIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetThirdPartyPayerIndicator(): static
    {
        $this->thirdPartyPayerIndicator = null;

        return $this;
    }

    /**
     * @return null|array<CarrierServiceInstructions>
     */
    public function getCarrierServiceInstructions(): ?array
    {
        return $this->carrierServiceInstructions;
    }

    /**
     * @param  null|array<CarrierServiceInstructions> $carrierServiceInstructions
     * @return static
     */
    public function setCarrierServiceInstructions(
        ?array $carrierServiceInstructions = null
    ): static {
        $this->carrierServiceInstructions = $carrierServiceInstructions;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCarrierServiceInstructions(): static
    {
        $this->carrierServiceInstructions = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearCarrierServiceInstructions(): static
    {
        $this->carrierServiceInstructions = [];

        return $this;
    }

    /**
     * @return null|CarrierServiceInstructions
     */
    public function firstCarrierServiceInstructions(): ?CarrierServiceInstructions
    {
        $carrierServiceInstructions = $this->carrierServiceInstructions ?? [];
        $carrierServiceInstructions = reset($carrierServiceInstructions);

        if (false === $carrierServiceInstructions) {
            return null;
        }

        return $carrierServiceInstructions;
    }

    /**
     * @return null|CarrierServiceInstructions
     */
    public function lastCarrierServiceInstructions(): ?CarrierServiceInstructions
    {
        $carrierServiceInstructions = $this->carrierServiceInstructions ?? [];
        $carrierServiceInstructions = end($carrierServiceInstructions);

        if (false === $carrierServiceInstructions) {
            return null;
        }

        return $carrierServiceInstructions;
    }

    /**
     * @param  CarrierServiceInstructions $carrierServiceInstructions
     * @return static
     */
    public function addToCarrierServiceInstructions(
        CarrierServiceInstructions $carrierServiceInstructions
    ): static {
        $this->carrierServiceInstructions[] = $carrierServiceInstructions;

        return $this;
    }

    /**
     * @return CarrierServiceInstructions
     */
    public function addToCarrierServiceInstructionsWithCreate(): CarrierServiceInstructions
    {
        $this->addTocarrierServiceInstructions($carrierServiceInstructions = new CarrierServiceInstructions());

        return $carrierServiceInstructions;
    }

    /**
     * @param  CarrierServiceInstructions $carrierServiceInstructions
     * @return static
     */
    public function addOnceToCarrierServiceInstructions(
        CarrierServiceInstructions $carrierServiceInstructions
    ): static {
        if (!is_array($this->carrierServiceInstructions)) {
            $this->carrierServiceInstructions = [];
        }

        $this->carrierServiceInstructions[0] = $carrierServiceInstructions;

        return $this;
    }

    /**
     * @return CarrierServiceInstructions
     */
    public function addOnceToCarrierServiceInstructionsWithCreate(): CarrierServiceInstructions
    {
        if (!is_array($this->carrierServiceInstructions)) {
            $this->carrierServiceInstructions = [];
        }

        if ([] === $this->carrierServiceInstructions) {
            $this->addOnceTocarrierServiceInstructions(new CarrierServiceInstructions());
        }

        return $this->carrierServiceInstructions[0];
    }

    /**
     * @return null|array<CustomsClearanceServiceInstructions>
     */
    public function getCustomsClearanceServiceInstructions(): ?array
    {
        return $this->customsClearanceServiceInstructions;
    }

    /**
     * @param  null|array<CustomsClearanceServiceInstructions> $customsClearanceServiceInstructions
     * @return static
     */
    public function setCustomsClearanceServiceInstructions(
        ?array $customsClearanceServiceInstructions = null
    ): static {
        $this->customsClearanceServiceInstructions = $customsClearanceServiceInstructions;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCustomsClearanceServiceInstructions(): static
    {
        $this->customsClearanceServiceInstructions = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearCustomsClearanceServiceInstructions(): static
    {
        $this->customsClearanceServiceInstructions = [];

        return $this;
    }

    /**
     * @return null|CustomsClearanceServiceInstructions
     */
    public function firstCustomsClearanceServiceInstructions(): ?CustomsClearanceServiceInstructions
    {
        $customsClearanceServiceInstructions = $this->customsClearanceServiceInstructions ?? [];
        $customsClearanceServiceInstructions = reset($customsClearanceServiceInstructions);

        if (false === $customsClearanceServiceInstructions) {
            return null;
        }

        return $customsClearanceServiceInstructions;
    }

    /**
     * @return null|CustomsClearanceServiceInstructions
     */
    public function lastCustomsClearanceServiceInstructions(): ?CustomsClearanceServiceInstructions
    {
        $customsClearanceServiceInstructions = $this->customsClearanceServiceInstructions ?? [];
        $customsClearanceServiceInstructions = end($customsClearanceServiceInstructions);

        if (false === $customsClearanceServiceInstructions) {
            return null;
        }

        return $customsClearanceServiceInstructions;
    }

    /**
     * @param  CustomsClearanceServiceInstructions $customsClearanceServiceInstructions
     * @return static
     */
    public function addToCustomsClearanceServiceInstructions(
        CustomsClearanceServiceInstructions $customsClearanceServiceInstructions,
    ): static {
        $this->customsClearanceServiceInstructions[] = $customsClearanceServiceInstructions;

        return $this;
    }

    /**
     * @return CustomsClearanceServiceInstructions
     */
    public function addToCustomsClearanceServiceInstructionsWithCreate(): CustomsClearanceServiceInstructions
    {
        $this->addTocustomsClearanceServiceInstructions($customsClearanceServiceInstructions = new CustomsClearanceServiceInstructions());

        return $customsClearanceServiceInstructions;
    }

    /**
     * @param  CustomsClearanceServiceInstructions $customsClearanceServiceInstructions
     * @return static
     */
    public function addOnceToCustomsClearanceServiceInstructions(
        CustomsClearanceServiceInstructions $customsClearanceServiceInstructions,
    ): static {
        if (!is_array($this->customsClearanceServiceInstructions)) {
            $this->customsClearanceServiceInstructions = [];
        }

        $this->customsClearanceServiceInstructions[0] = $customsClearanceServiceInstructions;

        return $this;
    }

    /**
     * @return CustomsClearanceServiceInstructions
     */
    public function addOnceToCustomsClearanceServiceInstructionsWithCreate(): CustomsClearanceServiceInstructions
    {
        if (!is_array($this->customsClearanceServiceInstructions)) {
            $this->customsClearanceServiceInstructions = [];
        }

        if ([] === $this->customsClearanceServiceInstructions) {
            $this->addOnceTocustomsClearanceServiceInstructions(new CustomsClearanceServiceInstructions());
        }

        return $this->customsClearanceServiceInstructions[0];
    }

    /**
     * @return null|array<ForwarderServiceInstructions>
     */
    public function getForwarderServiceInstructions(): ?array
    {
        return $this->forwarderServiceInstructions;
    }

    /**
     * @param  null|array<ForwarderServiceInstructions> $forwarderServiceInstructions
     * @return static
     */
    public function setForwarderServiceInstructions(
        ?array $forwarderServiceInstructions = null
    ): static {
        $this->forwarderServiceInstructions = $forwarderServiceInstructions;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetForwarderServiceInstructions(): static
    {
        $this->forwarderServiceInstructions = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearForwarderServiceInstructions(): static
    {
        $this->forwarderServiceInstructions = [];

        return $this;
    }

    /**
     * @return null|ForwarderServiceInstructions
     */
    public function firstForwarderServiceInstructions(): ?ForwarderServiceInstructions
    {
        $forwarderServiceInstructions = $this->forwarderServiceInstructions ?? [];
        $forwarderServiceInstructions = reset($forwarderServiceInstructions);

        if (false === $forwarderServiceInstructions) {
            return null;
        }

        return $forwarderServiceInstructions;
    }

    /**
     * @return null|ForwarderServiceInstructions
     */
    public function lastForwarderServiceInstructions(): ?ForwarderServiceInstructions
    {
        $forwarderServiceInstructions = $this->forwarderServiceInstructions ?? [];
        $forwarderServiceInstructions = end($forwarderServiceInstructions);

        if (false === $forwarderServiceInstructions) {
            return null;
        }

        return $forwarderServiceInstructions;
    }

    /**
     * @param  ForwarderServiceInstructions $forwarderServiceInstructions
     * @return static
     */
    public function addToForwarderServiceInstructions(
        ForwarderServiceInstructions $forwarderServiceInstructions,
    ): static {
        $this->forwarderServiceInstructions[] = $forwarderServiceInstructions;

        return $this;
    }

    /**
     * @return ForwarderServiceInstructions
     */
    public function addToForwarderServiceInstructionsWithCreate(): ForwarderServiceInstructions
    {
        $this->addToforwarderServiceInstructions($forwarderServiceInstructions = new ForwarderServiceInstructions());

        return $forwarderServiceInstructions;
    }

    /**
     * @param  ForwarderServiceInstructions $forwarderServiceInstructions
     * @return static
     */
    public function addOnceToForwarderServiceInstructions(
        ForwarderServiceInstructions $forwarderServiceInstructions,
    ): static {
        if (!is_array($this->forwarderServiceInstructions)) {
            $this->forwarderServiceInstructions = [];
        }

        $this->forwarderServiceInstructions[0] = $forwarderServiceInstructions;

        return $this;
    }

    /**
     * @return ForwarderServiceInstructions
     */
    public function addOnceToForwarderServiceInstructionsWithCreate(): ForwarderServiceInstructions
    {
        if (!is_array($this->forwarderServiceInstructions)) {
            $this->forwarderServiceInstructions = [];
        }

        if ([] === $this->forwarderServiceInstructions) {
            $this->addOnceToforwarderServiceInstructions(new ForwarderServiceInstructions());
        }

        return $this->forwarderServiceInstructions[0];
    }

    /**
     * @return null|array<SpecialServiceInstructions>
     */
    public function getSpecialServiceInstructions(): ?array
    {
        return $this->specialServiceInstructions;
    }

    /**
     * @param  null|array<SpecialServiceInstructions> $specialServiceInstructions
     * @return static
     */
    public function setSpecialServiceInstructions(
        ?array $specialServiceInstructions = null
    ): static {
        $this->specialServiceInstructions = $specialServiceInstructions;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSpecialServiceInstructions(): static
    {
        $this->specialServiceInstructions = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearSpecialServiceInstructions(): static
    {
        $this->specialServiceInstructions = [];

        return $this;
    }

    /**
     * @return null|SpecialServiceInstructions
     */
    public function firstSpecialServiceInstructions(): ?SpecialServiceInstructions
    {
        $specialServiceInstructions = $this->specialServiceInstructions ?? [];
        $specialServiceInstructions = reset($specialServiceInstructions);

        if (false === $specialServiceInstructions) {
            return null;
        }

        return $specialServiceInstructions;
    }

    /**
     * @return null|SpecialServiceInstructions
     */
    public function lastSpecialServiceInstructions(): ?SpecialServiceInstructions
    {
        $specialServiceInstructions = $this->specialServiceInstructions ?? [];
        $specialServiceInstructions = end($specialServiceInstructions);

        if (false === $specialServiceInstructions) {
            return null;
        }

        return $specialServiceInstructions;
    }

    /**
     * @param  SpecialServiceInstructions $specialServiceInstructions
     * @return static
     */
    public function addToSpecialServiceInstructions(
        SpecialServiceInstructions $specialServiceInstructions
    ): static {
        $this->specialServiceInstructions[] = $specialServiceInstructions;

        return $this;
    }

    /**
     * @return SpecialServiceInstructions
     */
    public function addToSpecialServiceInstructionsWithCreate(): SpecialServiceInstructions
    {
        $this->addTospecialServiceInstructions($specialServiceInstructions = new SpecialServiceInstructions());

        return $specialServiceInstructions;
    }

    /**
     * @param  SpecialServiceInstructions $specialServiceInstructions
     * @return static
     */
    public function addOnceToSpecialServiceInstructions(
        SpecialServiceInstructions $specialServiceInstructions
    ): static {
        if (!is_array($this->specialServiceInstructions)) {
            $this->specialServiceInstructions = [];
        }

        $this->specialServiceInstructions[0] = $specialServiceInstructions;

        return $this;
    }

    /**
     * @return SpecialServiceInstructions
     */
    public function addOnceToSpecialServiceInstructionsWithCreate(): SpecialServiceInstructions
    {
        if (!is_array($this->specialServiceInstructions)) {
            $this->specialServiceInstructions = [];
        }

        if ([] === $this->specialServiceInstructions) {
            $this->addOnceTospecialServiceInstructions(new SpecialServiceInstructions());
        }

        return $this->specialServiceInstructions[0];
    }

    /**
     * @return null|SequenceID
     */
    public function getSequenceID(): ?SequenceID
    {
        return $this->sequenceID;
    }

    /**
     * @return SequenceID
     */
    public function getSequenceIDWithCreate(): SequenceID
    {
        $this->sequenceID ??= new SequenceID();

        return $this->sequenceID;
    }

    /**
     * @param  null|SequenceID $sequenceID
     * @return static
     */
    public function setSequenceID(
        ?SequenceID $sequenceID = null
    ): static {
        $this->sequenceID = $sequenceID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSequenceID(): static
    {
        $this->sequenceID = null;

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
        $this->addTohandlingInstructions($handlingInstructions = new HandlingInstructions());

        return $handlingInstructions;
    }

    /**
     * @param  HandlingInstructions $handlingInstructions
     * @return static
     */
    public function addOnceToHandlingInstructions(
        HandlingInstructions $handlingInstructions
    ): static {
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
        $this->addToinformation($information = new Information());

        return $information;
    }

    /**
     * @param  Information $information
     * @return static
     */
    public function addOnceToInformation(
        Information $information
    ): static {
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
        $this->addTospecialInstructions($specialInstructions = new SpecialInstructions());

        return $specialInstructions;
    }

    /**
     * @param  SpecialInstructions $specialInstructions
     * @return static
     */
    public function addOnceToSpecialInstructions(
        SpecialInstructions $specialInstructions
    ): static {
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
        $this->addTodeliveryInstructions($deliveryInstructions = new DeliveryInstructions());

        return $deliveryInstructions;
    }

    /**
     * @param  DeliveryInstructions $deliveryInstructions
     * @return static
     */
    public function addOnceToDeliveryInstructions(
        DeliveryInstructions $deliveryInstructions
    ): static {
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
     * @return null|bool
     */
    public function getConsolidatableIndicator(): ?bool
    {
        return $this->consolidatableIndicator;
    }

    /**
     * @param  null|bool $consolidatableIndicator
     * @return static
     */
    public function setConsolidatableIndicator(
        ?bool $consolidatableIndicator = null
    ): static {
        $this->consolidatableIndicator = $consolidatableIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetConsolidatableIndicator(): static
    {
        $this->consolidatableIndicator = null;

        return $this;
    }

    /**
     * @return null|array<HaulageInstructions>
     */
    public function getHaulageInstructions(): ?array
    {
        return $this->haulageInstructions;
    }

    /**
     * @param  null|array<HaulageInstructions> $haulageInstructions
     * @return static
     */
    public function setHaulageInstructions(
        ?array $haulageInstructions = null
    ): static {
        $this->haulageInstructions = $haulageInstructions;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetHaulageInstructions(): static
    {
        $this->haulageInstructions = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearHaulageInstructions(): static
    {
        $this->haulageInstructions = [];

        return $this;
    }

    /**
     * @return null|HaulageInstructions
     */
    public function firstHaulageInstructions(): ?HaulageInstructions
    {
        $haulageInstructions = $this->haulageInstructions ?? [];
        $haulageInstructions = reset($haulageInstructions);

        if (false === $haulageInstructions) {
            return null;
        }

        return $haulageInstructions;
    }

    /**
     * @return null|HaulageInstructions
     */
    public function lastHaulageInstructions(): ?HaulageInstructions
    {
        $haulageInstructions = $this->haulageInstructions ?? [];
        $haulageInstructions = end($haulageInstructions);

        if (false === $haulageInstructions) {
            return null;
        }

        return $haulageInstructions;
    }

    /**
     * @param  HaulageInstructions $haulageInstructions
     * @return static
     */
    public function addToHaulageInstructions(
        HaulageInstructions $haulageInstructions
    ): static {
        $this->haulageInstructions[] = $haulageInstructions;

        return $this;
    }

    /**
     * @return HaulageInstructions
     */
    public function addToHaulageInstructionsWithCreate(): HaulageInstructions
    {
        $this->addTohaulageInstructions($haulageInstructions = new HaulageInstructions());

        return $haulageInstructions;
    }

    /**
     * @param  HaulageInstructions $haulageInstructions
     * @return static
     */
    public function addOnceToHaulageInstructions(
        HaulageInstructions $haulageInstructions
    ): static {
        if (!is_array($this->haulageInstructions)) {
            $this->haulageInstructions = [];
        }

        $this->haulageInstructions[0] = $haulageInstructions;

        return $this;
    }

    /**
     * @return HaulageInstructions
     */
    public function addOnceToHaulageInstructionsWithCreate(): HaulageInstructions
    {
        if (!is_array($this->haulageInstructions)) {
            $this->haulageInstructions = [];
        }

        if ([] === $this->haulageInstructions) {
            $this->addOnceTohaulageInstructions(new HaulageInstructions());
        }

        return $this->haulageInstructions[0];
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
     * @return null|ChildConsignmentQuantity
     */
    public function getChildConsignmentQuantity(): ?ChildConsignmentQuantity
    {
        return $this->childConsignmentQuantity;
    }

    /**
     * @return ChildConsignmentQuantity
     */
    public function getChildConsignmentQuantityWithCreate(): ChildConsignmentQuantity
    {
        $this->childConsignmentQuantity ??= new ChildConsignmentQuantity();

        return $this->childConsignmentQuantity;
    }

    /**
     * @param  null|ChildConsignmentQuantity $childConsignmentQuantity
     * @return static
     */
    public function setChildConsignmentQuantity(
        ?ChildConsignmentQuantity $childConsignmentQuantity = null
    ): static {
        $this->childConsignmentQuantity = $childConsignmentQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetChildConsignmentQuantity(): static
    {
        $this->childConsignmentQuantity = null;

        return $this;
    }

    /**
     * @return null|TotalPackagesQuantity
     */
    public function getTotalPackagesQuantity(): ?TotalPackagesQuantity
    {
        return $this->totalPackagesQuantity;
    }

    /**
     * @return TotalPackagesQuantity
     */
    public function getTotalPackagesQuantityWithCreate(): TotalPackagesQuantity
    {
        $this->totalPackagesQuantity ??= new TotalPackagesQuantity();

        return $this->totalPackagesQuantity;
    }

    /**
     * @param  null|TotalPackagesQuantity $totalPackagesQuantity
     * @return static
     */
    public function setTotalPackagesQuantity(
        ?TotalPackagesQuantity $totalPackagesQuantity = null
    ): static {
        $this->totalPackagesQuantity = $totalPackagesQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTotalPackagesQuantity(): static
    {
        $this->totalPackagesQuantity = null;

        return $this;
    }

    /**
     * @return null|array<ConsolidatedShipment>
     */
    public function getConsolidatedShipment(): ?array
    {
        return $this->consolidatedShipment;
    }

    /**
     * @param  null|array<ConsolidatedShipment> $consolidatedShipment
     * @return static
     */
    public function setConsolidatedShipment(
        ?array $consolidatedShipment = null
    ): static {
        $this->consolidatedShipment = $consolidatedShipment;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetConsolidatedShipment(): static
    {
        $this->consolidatedShipment = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearConsolidatedShipment(): static
    {
        $this->consolidatedShipment = [];

        return $this;
    }

    /**
     * @return null|ConsolidatedShipment
     */
    public function firstConsolidatedShipment(): ?ConsolidatedShipment
    {
        $consolidatedShipment = $this->consolidatedShipment ?? [];
        $consolidatedShipment = reset($consolidatedShipment);

        if (false === $consolidatedShipment) {
            return null;
        }

        return $consolidatedShipment;
    }

    /**
     * @return null|ConsolidatedShipment
     */
    public function lastConsolidatedShipment(): ?ConsolidatedShipment
    {
        $consolidatedShipment = $this->consolidatedShipment ?? [];
        $consolidatedShipment = end($consolidatedShipment);

        if (false === $consolidatedShipment) {
            return null;
        }

        return $consolidatedShipment;
    }

    /**
     * @param  ConsolidatedShipment $consolidatedShipment
     * @return static
     */
    public function addToConsolidatedShipment(
        ConsolidatedShipment $consolidatedShipment
    ): static {
        $this->consolidatedShipment[] = $consolidatedShipment;

        return $this;
    }

    /**
     * @return ConsolidatedShipment
     */
    public function addToConsolidatedShipmentWithCreate(): ConsolidatedShipment
    {
        $this->addToconsolidatedShipment($consolidatedShipment = new ConsolidatedShipment());

        return $consolidatedShipment;
    }

    /**
     * @param  ConsolidatedShipment $consolidatedShipment
     * @return static
     */
    public function addOnceToConsolidatedShipment(
        ConsolidatedShipment $consolidatedShipment
    ): static {
        if (!is_array($this->consolidatedShipment)) {
            $this->consolidatedShipment = [];
        }

        $this->consolidatedShipment[0] = $consolidatedShipment;

        return $this;
    }

    /**
     * @return ConsolidatedShipment
     */
    public function addOnceToConsolidatedShipmentWithCreate(): ConsolidatedShipment
    {
        if (!is_array($this->consolidatedShipment)) {
            $this->consolidatedShipment = [];
        }

        if ([] === $this->consolidatedShipment) {
            $this->addOnceToconsolidatedShipment(new ConsolidatedShipment());
        }

        return $this->consolidatedShipment[0];
    }

    /**
     * @return null|array<CustomsDeclaration>
     */
    public function getCustomsDeclaration(): ?array
    {
        return $this->customsDeclaration;
    }

    /**
     * @param  null|array<CustomsDeclaration> $customsDeclaration
     * @return static
     */
    public function setCustomsDeclaration(
        ?array $customsDeclaration = null
    ): static {
        $this->customsDeclaration = $customsDeclaration;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCustomsDeclaration(): static
    {
        $this->customsDeclaration = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearCustomsDeclaration(): static
    {
        $this->customsDeclaration = [];

        return $this;
    }

    /**
     * @return null|CustomsDeclaration
     */
    public function firstCustomsDeclaration(): ?CustomsDeclaration
    {
        $customsDeclaration = $this->customsDeclaration ?? [];
        $customsDeclaration = reset($customsDeclaration);

        if (false === $customsDeclaration) {
            return null;
        }

        return $customsDeclaration;
    }

    /**
     * @return null|CustomsDeclaration
     */
    public function lastCustomsDeclaration(): ?CustomsDeclaration
    {
        $customsDeclaration = $this->customsDeclaration ?? [];
        $customsDeclaration = end($customsDeclaration);

        if (false === $customsDeclaration) {
            return null;
        }

        return $customsDeclaration;
    }

    /**
     * @param  CustomsDeclaration $customsDeclaration
     * @return static
     */
    public function addToCustomsDeclaration(
        CustomsDeclaration $customsDeclaration
    ): static {
        $this->customsDeclaration[] = $customsDeclaration;

        return $this;
    }

    /**
     * @return CustomsDeclaration
     */
    public function addToCustomsDeclarationWithCreate(): CustomsDeclaration
    {
        $this->addTocustomsDeclaration($customsDeclaration = new CustomsDeclaration());

        return $customsDeclaration;
    }

    /**
     * @param  CustomsDeclaration $customsDeclaration
     * @return static
     */
    public function addOnceToCustomsDeclaration(
        CustomsDeclaration $customsDeclaration
    ): static {
        if (!is_array($this->customsDeclaration)) {
            $this->customsDeclaration = [];
        }

        $this->customsDeclaration[0] = $customsDeclaration;

        return $this;
    }

    /**
     * @return CustomsDeclaration
     */
    public function addOnceToCustomsDeclarationWithCreate(): CustomsDeclaration
    {
        if (!is_array($this->customsDeclaration)) {
            $this->customsDeclaration = [];
        }

        if ([] === $this->customsDeclaration) {
            $this->addOnceTocustomsDeclaration(new CustomsDeclaration());
        }

        return $this->customsDeclaration[0];
    }

    /**
     * @return null|RequestedPickupTransportEvent
     */
    public function getRequestedPickupTransportEvent(): ?RequestedPickupTransportEvent
    {
        return $this->requestedPickupTransportEvent;
    }

    /**
     * @return RequestedPickupTransportEvent
     */
    public function getRequestedPickupTransportEventWithCreate(): RequestedPickupTransportEvent
    {
        $this->requestedPickupTransportEvent ??= new RequestedPickupTransportEvent();

        return $this->requestedPickupTransportEvent;
    }

    /**
     * @param  null|RequestedPickupTransportEvent $requestedPickupTransportEvent
     * @return static
     */
    public function setRequestedPickupTransportEvent(
        ?RequestedPickupTransportEvent $requestedPickupTransportEvent = null,
    ): static {
        $this->requestedPickupTransportEvent = $requestedPickupTransportEvent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRequestedPickupTransportEvent(): static
    {
        $this->requestedPickupTransportEvent = null;

        return $this;
    }

    /**
     * @return null|RequestedDeliveryTransportEvent
     */
    public function getRequestedDeliveryTransportEvent(): ?RequestedDeliveryTransportEvent
    {
        return $this->requestedDeliveryTransportEvent;
    }

    /**
     * @return RequestedDeliveryTransportEvent
     */
    public function getRequestedDeliveryTransportEventWithCreate(): RequestedDeliveryTransportEvent
    {
        $this->requestedDeliveryTransportEvent ??= new RequestedDeliveryTransportEvent();

        return $this->requestedDeliveryTransportEvent;
    }

    /**
     * @param  null|RequestedDeliveryTransportEvent $requestedDeliveryTransportEvent
     * @return static
     */
    public function setRequestedDeliveryTransportEvent(
        ?RequestedDeliveryTransportEvent $requestedDeliveryTransportEvent = null,
    ): static {
        $this->requestedDeliveryTransportEvent = $requestedDeliveryTransportEvent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRequestedDeliveryTransportEvent(): static
    {
        $this->requestedDeliveryTransportEvent = null;

        return $this;
    }

    /**
     * @return null|PlannedPickupTransportEvent
     */
    public function getPlannedPickupTransportEvent(): ?PlannedPickupTransportEvent
    {
        return $this->plannedPickupTransportEvent;
    }

    /**
     * @return PlannedPickupTransportEvent
     */
    public function getPlannedPickupTransportEventWithCreate(): PlannedPickupTransportEvent
    {
        $this->plannedPickupTransportEvent ??= new PlannedPickupTransportEvent();

        return $this->plannedPickupTransportEvent;
    }

    /**
     * @param  null|PlannedPickupTransportEvent $plannedPickupTransportEvent
     * @return static
     */
    public function setPlannedPickupTransportEvent(
        ?PlannedPickupTransportEvent $plannedPickupTransportEvent = null,
    ): static {
        $this->plannedPickupTransportEvent = $plannedPickupTransportEvent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPlannedPickupTransportEvent(): static
    {
        $this->plannedPickupTransportEvent = null;

        return $this;
    }

    /**
     * @return null|PlannedDeliveryTransportEvent
     */
    public function getPlannedDeliveryTransportEvent(): ?PlannedDeliveryTransportEvent
    {
        return $this->plannedDeliveryTransportEvent;
    }

    /**
     * @return PlannedDeliveryTransportEvent
     */
    public function getPlannedDeliveryTransportEventWithCreate(): PlannedDeliveryTransportEvent
    {
        $this->plannedDeliveryTransportEvent ??= new PlannedDeliveryTransportEvent();

        return $this->plannedDeliveryTransportEvent;
    }

    /**
     * @param  null|PlannedDeliveryTransportEvent $plannedDeliveryTransportEvent
     * @return static
     */
    public function setPlannedDeliveryTransportEvent(
        ?PlannedDeliveryTransportEvent $plannedDeliveryTransportEvent = null,
    ): static {
        $this->plannedDeliveryTransportEvent = $plannedDeliveryTransportEvent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPlannedDeliveryTransportEvent(): static
    {
        $this->plannedDeliveryTransportEvent = null;

        return $this;
    }

    /**
     * @return null|array<Status>
     */
    public function getStatus(): ?array
    {
        return $this->status;
    }

    /**
     * @param  null|array<Status> $status
     * @return static
     */
    public function setStatus(
        ?array $status = null
    ): static {
        $this->status = $status;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetStatus(): static
    {
        $this->status = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearStatus(): static
    {
        $this->status = [];

        return $this;
    }

    /**
     * @return null|Status
     */
    public function firstStatus(): ?Status
    {
        $status = $this->status ?? [];
        $status = reset($status);

        if (false === $status) {
            return null;
        }

        return $status;
    }

    /**
     * @return null|Status
     */
    public function lastStatus(): ?Status
    {
        $status = $this->status ?? [];
        $status = end($status);

        if (false === $status) {
            return null;
        }

        return $status;
    }

    /**
     * @param  Status $status
     * @return static
     */
    public function addToStatus(
        Status $status
    ): static {
        $this->status[] = $status;

        return $this;
    }

    /**
     * @return Status
     */
    public function addToStatusWithCreate(): Status
    {
        $this->addTostatus($status = new Status());

        return $status;
    }

    /**
     * @param  Status $status
     * @return static
     */
    public function addOnceToStatus(
        Status $status
    ): static {
        if (!is_array($this->status)) {
            $this->status = [];
        }

        $this->status[0] = $status;

        return $this;
    }

    /**
     * @return Status
     */
    public function addOnceToStatusWithCreate(): Status
    {
        if (!is_array($this->status)) {
            $this->status = [];
        }

        if ([] === $this->status) {
            $this->addOnceTostatus(new Status());
        }

        return $this->status[0];
    }

    /**
     * @return null|array<ChildConsignment>
     */
    public function getChildConsignment(): ?array
    {
        return $this->childConsignment;
    }

    /**
     * @param  null|array<ChildConsignment> $childConsignment
     * @return static
     */
    public function setChildConsignment(
        ?array $childConsignment = null
    ): static {
        $this->childConsignment = $childConsignment;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetChildConsignment(): static
    {
        $this->childConsignment = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearChildConsignment(): static
    {
        $this->childConsignment = [];

        return $this;
    }

    /**
     * @return null|ChildConsignment
     */
    public function firstChildConsignment(): ?ChildConsignment
    {
        $childConsignment = $this->childConsignment ?? [];
        $childConsignment = reset($childConsignment);

        if (false === $childConsignment) {
            return null;
        }

        return $childConsignment;
    }

    /**
     * @return null|ChildConsignment
     */
    public function lastChildConsignment(): ?ChildConsignment
    {
        $childConsignment = $this->childConsignment ?? [];
        $childConsignment = end($childConsignment);

        if (false === $childConsignment) {
            return null;
        }

        return $childConsignment;
    }

    /**
     * @param  ChildConsignment $childConsignment
     * @return static
     */
    public function addToChildConsignment(
        ChildConsignment $childConsignment
    ): static {
        $this->childConsignment[] = $childConsignment;

        return $this;
    }

    /**
     * @return ChildConsignment
     */
    public function addToChildConsignmentWithCreate(): ChildConsignment
    {
        $this->addTochildConsignment($childConsignment = new ChildConsignment());

        return $childConsignment;
    }

    /**
     * @param  ChildConsignment $childConsignment
     * @return static
     */
    public function addOnceToChildConsignment(
        ChildConsignment $childConsignment
    ): static {
        if (!is_array($this->childConsignment)) {
            $this->childConsignment = [];
        }

        $this->childConsignment[0] = $childConsignment;

        return $this;
    }

    /**
     * @return ChildConsignment
     */
    public function addOnceToChildConsignmentWithCreate(): ChildConsignment
    {
        if (!is_array($this->childConsignment)) {
            $this->childConsignment = [];
        }

        if ([] === $this->childConsignment) {
            $this->addOnceTochildConsignment(new ChildConsignment());
        }

        return $this->childConsignment[0];
    }

    /**
     * @return null|ConsigneeParty
     */
    public function getConsigneeParty(): ?ConsigneeParty
    {
        return $this->consigneeParty;
    }

    /**
     * @return ConsigneeParty
     */
    public function getConsigneePartyWithCreate(): ConsigneeParty
    {
        $this->consigneeParty ??= new ConsigneeParty();

        return $this->consigneeParty;
    }

    /**
     * @param  null|ConsigneeParty $consigneeParty
     * @return static
     */
    public function setConsigneeParty(
        ?ConsigneeParty $consigneeParty = null
    ): static {
        $this->consigneeParty = $consigneeParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetConsigneeParty(): static
    {
        $this->consigneeParty = null;

        return $this;
    }

    /**
     * @return null|ExporterParty
     */
    public function getExporterParty(): ?ExporterParty
    {
        return $this->exporterParty;
    }

    /**
     * @return ExporterParty
     */
    public function getExporterPartyWithCreate(): ExporterParty
    {
        $this->exporterParty ??= new ExporterParty();

        return $this->exporterParty;
    }

    /**
     * @param  null|ExporterParty $exporterParty
     * @return static
     */
    public function setExporterParty(
        ?ExporterParty $exporterParty = null
    ): static {
        $this->exporterParty = $exporterParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetExporterParty(): static
    {
        $this->exporterParty = null;

        return $this;
    }

    /**
     * @return null|ConsignorParty
     */
    public function getConsignorParty(): ?ConsignorParty
    {
        return $this->consignorParty;
    }

    /**
     * @return ConsignorParty
     */
    public function getConsignorPartyWithCreate(): ConsignorParty
    {
        $this->consignorParty ??= new ConsignorParty();

        return $this->consignorParty;
    }

    /**
     * @param  null|ConsignorParty $consignorParty
     * @return static
     */
    public function setConsignorParty(
        ?ConsignorParty $consignorParty = null
    ): static {
        $this->consignorParty = $consignorParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetConsignorParty(): static
    {
        $this->consignorParty = null;

        return $this;
    }

    /**
     * @return null|ImporterParty
     */
    public function getImporterParty(): ?ImporterParty
    {
        return $this->importerParty;
    }

    /**
     * @return ImporterParty
     */
    public function getImporterPartyWithCreate(): ImporterParty
    {
        $this->importerParty ??= new ImporterParty();

        return $this->importerParty;
    }

    /**
     * @param  null|ImporterParty $importerParty
     * @return static
     */
    public function setImporterParty(
        ?ImporterParty $importerParty = null
    ): static {
        $this->importerParty = $importerParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetImporterParty(): static
    {
        $this->importerParty = null;

        return $this;
    }

    /**
     * @return null|CarrierParty
     */
    public function getCarrierParty(): ?CarrierParty
    {
        return $this->carrierParty;
    }

    /**
     * @return CarrierParty
     */
    public function getCarrierPartyWithCreate(): CarrierParty
    {
        $this->carrierParty ??= new CarrierParty();

        return $this->carrierParty;
    }

    /**
     * @param  null|CarrierParty $carrierParty
     * @return static
     */
    public function setCarrierParty(
        ?CarrierParty $carrierParty = null
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
     * @return null|FreightForwarderParty
     */
    public function getFreightForwarderParty(): ?FreightForwarderParty
    {
        return $this->freightForwarderParty;
    }

    /**
     * @return FreightForwarderParty
     */
    public function getFreightForwarderPartyWithCreate(): FreightForwarderParty
    {
        $this->freightForwarderParty ??= new FreightForwarderParty();

        return $this->freightForwarderParty;
    }

    /**
     * @param  null|FreightForwarderParty $freightForwarderParty
     * @return static
     */
    public function setFreightForwarderParty(
        ?FreightForwarderParty $freightForwarderParty = null
    ): static {
        $this->freightForwarderParty = $freightForwarderParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetFreightForwarderParty(): static
    {
        $this->freightForwarderParty = null;

        return $this;
    }

    /**
     * @return null|NotifyParty
     */
    public function getNotifyParty(): ?NotifyParty
    {
        return $this->notifyParty;
    }

    /**
     * @return NotifyParty
     */
    public function getNotifyPartyWithCreate(): NotifyParty
    {
        $this->notifyParty ??= new NotifyParty();

        return $this->notifyParty;
    }

    /**
     * @param  null|NotifyParty $notifyParty
     * @return static
     */
    public function setNotifyParty(
        ?NotifyParty $notifyParty = null
    ): static {
        $this->notifyParty = $notifyParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetNotifyParty(): static
    {
        $this->notifyParty = null;

        return $this;
    }

    /**
     * @return null|OriginalDespatchParty
     */
    public function getOriginalDespatchParty(): ?OriginalDespatchParty
    {
        return $this->originalDespatchParty;
    }

    /**
     * @return OriginalDespatchParty
     */
    public function getOriginalDespatchPartyWithCreate(): OriginalDespatchParty
    {
        $this->originalDespatchParty ??= new OriginalDespatchParty();

        return $this->originalDespatchParty;
    }

    /**
     * @param  null|OriginalDespatchParty $originalDespatchParty
     * @return static
     */
    public function setOriginalDespatchParty(
        ?OriginalDespatchParty $originalDespatchParty = null
    ): static {
        $this->originalDespatchParty = $originalDespatchParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetOriginalDespatchParty(): static
    {
        $this->originalDespatchParty = null;

        return $this;
    }

    /**
     * @return null|FinalDeliveryParty
     */
    public function getFinalDeliveryParty(): ?FinalDeliveryParty
    {
        return $this->finalDeliveryParty;
    }

    /**
     * @return FinalDeliveryParty
     */
    public function getFinalDeliveryPartyWithCreate(): FinalDeliveryParty
    {
        $this->finalDeliveryParty ??= new FinalDeliveryParty();

        return $this->finalDeliveryParty;
    }

    /**
     * @param  null|FinalDeliveryParty $finalDeliveryParty
     * @return static
     */
    public function setFinalDeliveryParty(
        ?FinalDeliveryParty $finalDeliveryParty = null
    ): static {
        $this->finalDeliveryParty = $finalDeliveryParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetFinalDeliveryParty(): static
    {
        $this->finalDeliveryParty = null;

        return $this;
    }

    /**
     * @return null|PerformingCarrierParty
     */
    public function getPerformingCarrierParty(): ?PerformingCarrierParty
    {
        return $this->performingCarrierParty;
    }

    /**
     * @return PerformingCarrierParty
     */
    public function getPerformingCarrierPartyWithCreate(): PerformingCarrierParty
    {
        $this->performingCarrierParty ??= new PerformingCarrierParty();

        return $this->performingCarrierParty;
    }

    /**
     * @param  null|PerformingCarrierParty $performingCarrierParty
     * @return static
     */
    public function setPerformingCarrierParty(
        ?PerformingCarrierParty $performingCarrierParty = null
    ): static {
        $this->performingCarrierParty = $performingCarrierParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPerformingCarrierParty(): static
    {
        $this->performingCarrierParty = null;

        return $this;
    }

    /**
     * @return null|SubstituteCarrierParty
     */
    public function getSubstituteCarrierParty(): ?SubstituteCarrierParty
    {
        return $this->substituteCarrierParty;
    }

    /**
     * @return SubstituteCarrierParty
     */
    public function getSubstituteCarrierPartyWithCreate(): SubstituteCarrierParty
    {
        $this->substituteCarrierParty ??= new SubstituteCarrierParty();

        return $this->substituteCarrierParty;
    }

    /**
     * @param  null|SubstituteCarrierParty $substituteCarrierParty
     * @return static
     */
    public function setSubstituteCarrierParty(
        ?SubstituteCarrierParty $substituteCarrierParty = null
    ): static {
        $this->substituteCarrierParty = $substituteCarrierParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSubstituteCarrierParty(): static
    {
        $this->substituteCarrierParty = null;

        return $this;
    }

    /**
     * @return null|LogisticsOperatorParty
     */
    public function getLogisticsOperatorParty(): ?LogisticsOperatorParty
    {
        return $this->logisticsOperatorParty;
    }

    /**
     * @return LogisticsOperatorParty
     */
    public function getLogisticsOperatorPartyWithCreate(): LogisticsOperatorParty
    {
        $this->logisticsOperatorParty ??= new LogisticsOperatorParty();

        return $this->logisticsOperatorParty;
    }

    /**
     * @param  null|LogisticsOperatorParty $logisticsOperatorParty
     * @return static
     */
    public function setLogisticsOperatorParty(
        ?LogisticsOperatorParty $logisticsOperatorParty = null
    ): static {
        $this->logisticsOperatorParty = $logisticsOperatorParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLogisticsOperatorParty(): static
    {
        $this->logisticsOperatorParty = null;

        return $this;
    }

    /**
     * @return null|TransportAdvisorParty
     */
    public function getTransportAdvisorParty(): ?TransportAdvisorParty
    {
        return $this->transportAdvisorParty;
    }

    /**
     * @return TransportAdvisorParty
     */
    public function getTransportAdvisorPartyWithCreate(): TransportAdvisorParty
    {
        $this->transportAdvisorParty ??= new TransportAdvisorParty();

        return $this->transportAdvisorParty;
    }

    /**
     * @param  null|TransportAdvisorParty $transportAdvisorParty
     * @return static
     */
    public function setTransportAdvisorParty(
        ?TransportAdvisorParty $transportAdvisorParty = null
    ): static {
        $this->transportAdvisorParty = $transportAdvisorParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTransportAdvisorParty(): static
    {
        $this->transportAdvisorParty = null;

        return $this;
    }

    /**
     * @return null|HazardousItemNotificationParty
     */
    public function getHazardousItemNotificationParty(): ?HazardousItemNotificationParty
    {
        return $this->hazardousItemNotificationParty;
    }

    /**
     * @return HazardousItemNotificationParty
     */
    public function getHazardousItemNotificationPartyWithCreate(): HazardousItemNotificationParty
    {
        $this->hazardousItemNotificationParty ??= new HazardousItemNotificationParty();

        return $this->hazardousItemNotificationParty;
    }

    /**
     * @param  null|HazardousItemNotificationParty $hazardousItemNotificationParty
     * @return static
     */
    public function setHazardousItemNotificationParty(
        ?HazardousItemNotificationParty $hazardousItemNotificationParty = null,
    ): static {
        $this->hazardousItemNotificationParty = $hazardousItemNotificationParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetHazardousItemNotificationParty(): static
    {
        $this->hazardousItemNotificationParty = null;

        return $this;
    }

    /**
     * @return null|InsuranceParty
     */
    public function getInsuranceParty(): ?InsuranceParty
    {
        return $this->insuranceParty;
    }

    /**
     * @return InsuranceParty
     */
    public function getInsurancePartyWithCreate(): InsuranceParty
    {
        $this->insuranceParty ??= new InsuranceParty();

        return $this->insuranceParty;
    }

    /**
     * @param  null|InsuranceParty $insuranceParty
     * @return static
     */
    public function setInsuranceParty(
        ?InsuranceParty $insuranceParty = null
    ): static {
        $this->insuranceParty = $insuranceParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetInsuranceParty(): static
    {
        $this->insuranceParty = null;

        return $this;
    }

    /**
     * @return null|MortgageHolderParty
     */
    public function getMortgageHolderParty(): ?MortgageHolderParty
    {
        return $this->mortgageHolderParty;
    }

    /**
     * @return MortgageHolderParty
     */
    public function getMortgageHolderPartyWithCreate(): MortgageHolderParty
    {
        $this->mortgageHolderParty ??= new MortgageHolderParty();

        return $this->mortgageHolderParty;
    }

    /**
     * @param  null|MortgageHolderParty $mortgageHolderParty
     * @return static
     */
    public function setMortgageHolderParty(
        ?MortgageHolderParty $mortgageHolderParty = null
    ): static {
        $this->mortgageHolderParty = $mortgageHolderParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMortgageHolderParty(): static
    {
        $this->mortgageHolderParty = null;

        return $this;
    }

    /**
     * @return null|BillOfLadingHolderParty
     */
    public function getBillOfLadingHolderParty(): ?BillOfLadingHolderParty
    {
        return $this->billOfLadingHolderParty;
    }

    /**
     * @return BillOfLadingHolderParty
     */
    public function getBillOfLadingHolderPartyWithCreate(): BillOfLadingHolderParty
    {
        $this->billOfLadingHolderParty ??= new BillOfLadingHolderParty();

        return $this->billOfLadingHolderParty;
    }

    /**
     * @param  null|BillOfLadingHolderParty $billOfLadingHolderParty
     * @return static
     */
    public function setBillOfLadingHolderParty(
        ?BillOfLadingHolderParty $billOfLadingHolderParty = null
    ): static {
        $this->billOfLadingHolderParty = $billOfLadingHolderParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetBillOfLadingHolderParty(): static
    {
        $this->billOfLadingHolderParty = null;

        return $this;
    }

    /**
     * @return null|OriginalDepartureCountry
     */
    public function getOriginalDepartureCountry(): ?OriginalDepartureCountry
    {
        return $this->originalDepartureCountry;
    }

    /**
     * @return OriginalDepartureCountry
     */
    public function getOriginalDepartureCountryWithCreate(): OriginalDepartureCountry
    {
        $this->originalDepartureCountry ??= new OriginalDepartureCountry();

        return $this->originalDepartureCountry;
    }

    /**
     * @param  null|OriginalDepartureCountry $originalDepartureCountry
     * @return static
     */
    public function setOriginalDepartureCountry(
        ?OriginalDepartureCountry $originalDepartureCountry = null
    ): static {
        $this->originalDepartureCountry = $originalDepartureCountry;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetOriginalDepartureCountry(): static
    {
        $this->originalDepartureCountry = null;

        return $this;
    }

    /**
     * @return null|FinalDestinationCountry
     */
    public function getFinalDestinationCountry(): ?FinalDestinationCountry
    {
        return $this->finalDestinationCountry;
    }

    /**
     * @return FinalDestinationCountry
     */
    public function getFinalDestinationCountryWithCreate(): FinalDestinationCountry
    {
        $this->finalDestinationCountry ??= new FinalDestinationCountry();

        return $this->finalDestinationCountry;
    }

    /**
     * @param  null|FinalDestinationCountry $finalDestinationCountry
     * @return static
     */
    public function setFinalDestinationCountry(
        ?FinalDestinationCountry $finalDestinationCountry = null
    ): static {
        $this->finalDestinationCountry = $finalDestinationCountry;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetFinalDestinationCountry(): static
    {
        $this->finalDestinationCountry = null;

        return $this;
    }

    /**
     * @return null|array<TransitCountry>
     */
    public function getTransitCountry(): ?array
    {
        return $this->transitCountry;
    }

    /**
     * @param  null|array<TransitCountry> $transitCountry
     * @return static
     */
    public function setTransitCountry(
        ?array $transitCountry = null
    ): static {
        $this->transitCountry = $transitCountry;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTransitCountry(): static
    {
        $this->transitCountry = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearTransitCountry(): static
    {
        $this->transitCountry = [];

        return $this;
    }

    /**
     * @return null|TransitCountry
     */
    public function firstTransitCountry(): ?TransitCountry
    {
        $transitCountry = $this->transitCountry ?? [];
        $transitCountry = reset($transitCountry);

        if (false === $transitCountry) {
            return null;
        }

        return $transitCountry;
    }

    /**
     * @return null|TransitCountry
     */
    public function lastTransitCountry(): ?TransitCountry
    {
        $transitCountry = $this->transitCountry ?? [];
        $transitCountry = end($transitCountry);

        if (false === $transitCountry) {
            return null;
        }

        return $transitCountry;
    }

    /**
     * @param  TransitCountry $transitCountry
     * @return static
     */
    public function addToTransitCountry(
        TransitCountry $transitCountry
    ): static {
        $this->transitCountry[] = $transitCountry;

        return $this;
    }

    /**
     * @return TransitCountry
     */
    public function addToTransitCountryWithCreate(): TransitCountry
    {
        $this->addTotransitCountry($transitCountry = new TransitCountry());

        return $transitCountry;
    }

    /**
     * @param  TransitCountry $transitCountry
     * @return static
     */
    public function addOnceToTransitCountry(
        TransitCountry $transitCountry
    ): static {
        if (!is_array($this->transitCountry)) {
            $this->transitCountry = [];
        }

        $this->transitCountry[0] = $transitCountry;

        return $this;
    }

    /**
     * @return TransitCountry
     */
    public function addOnceToTransitCountryWithCreate(): TransitCountry
    {
        if (!is_array($this->transitCountry)) {
            $this->transitCountry = [];
        }

        if ([] === $this->transitCountry) {
            $this->addOnceTotransitCountry(new TransitCountry());
        }

        return $this->transitCountry[0];
    }

    /**
     * @return null|TransportContract
     */
    public function getTransportContract(): ?TransportContract
    {
        return $this->transportContract;
    }

    /**
     * @return TransportContract
     */
    public function getTransportContractWithCreate(): TransportContract
    {
        $this->transportContract ??= new TransportContract();

        return $this->transportContract;
    }

    /**
     * @param  null|TransportContract $transportContract
     * @return static
     */
    public function setTransportContract(
        ?TransportContract $transportContract = null
    ): static {
        $this->transportContract = $transportContract;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTransportContract(): static
    {
        $this->transportContract = null;

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
     * @return null|OriginalDespatchTransportationService
     */
    public function getOriginalDespatchTransportationService(): ?OriginalDespatchTransportationService
    {
        return $this->originalDespatchTransportationService;
    }

    /**
     * @return OriginalDespatchTransportationService
     */
    public function getOriginalDespatchTransportationServiceWithCreate(): OriginalDespatchTransportationService
    {
        $this->originalDespatchTransportationService ??= new OriginalDespatchTransportationService();

        return $this->originalDespatchTransportationService;
    }

    /**
     * @param  null|OriginalDespatchTransportationService $originalDespatchTransportationService
     * @return static
     */
    public function setOriginalDespatchTransportationService(
        ?OriginalDespatchTransportationService $originalDespatchTransportationService = null,
    ): static {
        $this->originalDespatchTransportationService = $originalDespatchTransportationService;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetOriginalDespatchTransportationService(): static
    {
        $this->originalDespatchTransportationService = null;

        return $this;
    }

    /**
     * @return null|FinalDeliveryTransportationService
     */
    public function getFinalDeliveryTransportationService(): ?FinalDeliveryTransportationService
    {
        return $this->finalDeliveryTransportationService;
    }

    /**
     * @return FinalDeliveryTransportationService
     */
    public function getFinalDeliveryTransportationServiceWithCreate(): FinalDeliveryTransportationService
    {
        $this->finalDeliveryTransportationService ??= new FinalDeliveryTransportationService();

        return $this->finalDeliveryTransportationService;
    }

    /**
     * @param  null|FinalDeliveryTransportationService $finalDeliveryTransportationService
     * @return static
     */
    public function setFinalDeliveryTransportationService(
        ?FinalDeliveryTransportationService $finalDeliveryTransportationService = null,
    ): static {
        $this->finalDeliveryTransportationService = $finalDeliveryTransportationService;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetFinalDeliveryTransportationService(): static
    {
        $this->finalDeliveryTransportationService = null;

        return $this;
    }

    /**
     * @return null|DeliveryTerms
     */
    public function getDeliveryTerms(): ?DeliveryTerms
    {
        return $this->deliveryTerms;
    }

    /**
     * @return DeliveryTerms
     */
    public function getDeliveryTermsWithCreate(): DeliveryTerms
    {
        $this->deliveryTerms ??= new DeliveryTerms();

        return $this->deliveryTerms;
    }

    /**
     * @param  null|DeliveryTerms $deliveryTerms
     * @return static
     */
    public function setDeliveryTerms(
        ?DeliveryTerms $deliveryTerms = null
    ): static {
        $this->deliveryTerms = $deliveryTerms;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDeliveryTerms(): static
    {
        $this->deliveryTerms = null;

        return $this;
    }

    /**
     * @return null|PaymentTerms
     */
    public function getPaymentTerms(): ?PaymentTerms
    {
        return $this->paymentTerms;
    }

    /**
     * @return PaymentTerms
     */
    public function getPaymentTermsWithCreate(): PaymentTerms
    {
        $this->paymentTerms ??= new PaymentTerms();

        return $this->paymentTerms;
    }

    /**
     * @param  null|PaymentTerms $paymentTerms
     * @return static
     */
    public function setPaymentTerms(
        ?PaymentTerms $paymentTerms = null
    ): static {
        $this->paymentTerms = $paymentTerms;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPaymentTerms(): static
    {
        $this->paymentTerms = null;

        return $this;
    }

    /**
     * @return null|CollectPaymentTerms
     */
    public function getCollectPaymentTerms(): ?CollectPaymentTerms
    {
        return $this->collectPaymentTerms;
    }

    /**
     * @return CollectPaymentTerms
     */
    public function getCollectPaymentTermsWithCreate(): CollectPaymentTerms
    {
        $this->collectPaymentTerms ??= new CollectPaymentTerms();

        return $this->collectPaymentTerms;
    }

    /**
     * @param  null|CollectPaymentTerms $collectPaymentTerms
     * @return static
     */
    public function setCollectPaymentTerms(
        ?CollectPaymentTerms $collectPaymentTerms = null
    ): static {
        $this->collectPaymentTerms = $collectPaymentTerms;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCollectPaymentTerms(): static
    {
        $this->collectPaymentTerms = null;

        return $this;
    }

    /**
     * @return null|DisbursementPaymentTerms
     */
    public function getDisbursementPaymentTerms(): ?DisbursementPaymentTerms
    {
        return $this->disbursementPaymentTerms;
    }

    /**
     * @return DisbursementPaymentTerms
     */
    public function getDisbursementPaymentTermsWithCreate(): DisbursementPaymentTerms
    {
        $this->disbursementPaymentTerms ??= new DisbursementPaymentTerms();

        return $this->disbursementPaymentTerms;
    }

    /**
     * @param  null|DisbursementPaymentTerms $disbursementPaymentTerms
     * @return static
     */
    public function setDisbursementPaymentTerms(
        ?DisbursementPaymentTerms $disbursementPaymentTerms = null
    ): static {
        $this->disbursementPaymentTerms = $disbursementPaymentTerms;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDisbursementPaymentTerms(): static
    {
        $this->disbursementPaymentTerms = null;

        return $this;
    }

    /**
     * @return null|PrepaidPaymentTerms
     */
    public function getPrepaidPaymentTerms(): ?PrepaidPaymentTerms
    {
        return $this->prepaidPaymentTerms;
    }

    /**
     * @return PrepaidPaymentTerms
     */
    public function getPrepaidPaymentTermsWithCreate(): PrepaidPaymentTerms
    {
        $this->prepaidPaymentTerms ??= new PrepaidPaymentTerms();

        return $this->prepaidPaymentTerms;
    }

    /**
     * @param  null|PrepaidPaymentTerms $prepaidPaymentTerms
     * @return static
     */
    public function setPrepaidPaymentTerms(
        ?PrepaidPaymentTerms $prepaidPaymentTerms = null
    ): static {
        $this->prepaidPaymentTerms = $prepaidPaymentTerms;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPrepaidPaymentTerms(): static
    {
        $this->prepaidPaymentTerms = null;

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
     * @return null|array<ExtraAllowanceCharge>
     */
    public function getExtraAllowanceCharge(): ?array
    {
        return $this->extraAllowanceCharge;
    }

    /**
     * @param  null|array<ExtraAllowanceCharge> $extraAllowanceCharge
     * @return static
     */
    public function setExtraAllowanceCharge(
        ?array $extraAllowanceCharge = null
    ): static {
        $this->extraAllowanceCharge = $extraAllowanceCharge;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetExtraAllowanceCharge(): static
    {
        $this->extraAllowanceCharge = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearExtraAllowanceCharge(): static
    {
        $this->extraAllowanceCharge = [];

        return $this;
    }

    /**
     * @return null|ExtraAllowanceCharge
     */
    public function firstExtraAllowanceCharge(): ?ExtraAllowanceCharge
    {
        $extraAllowanceCharge = $this->extraAllowanceCharge ?? [];
        $extraAllowanceCharge = reset($extraAllowanceCharge);

        if (false === $extraAllowanceCharge) {
            return null;
        }

        return $extraAllowanceCharge;
    }

    /**
     * @return null|ExtraAllowanceCharge
     */
    public function lastExtraAllowanceCharge(): ?ExtraAllowanceCharge
    {
        $extraAllowanceCharge = $this->extraAllowanceCharge ?? [];
        $extraAllowanceCharge = end($extraAllowanceCharge);

        if (false === $extraAllowanceCharge) {
            return null;
        }

        return $extraAllowanceCharge;
    }

    /**
     * @param  ExtraAllowanceCharge $extraAllowanceCharge
     * @return static
     */
    public function addToExtraAllowanceCharge(
        ExtraAllowanceCharge $extraAllowanceCharge
    ): static {
        $this->extraAllowanceCharge[] = $extraAllowanceCharge;

        return $this;
    }

    /**
     * @return ExtraAllowanceCharge
     */
    public function addToExtraAllowanceChargeWithCreate(): ExtraAllowanceCharge
    {
        $this->addToextraAllowanceCharge($extraAllowanceCharge = new ExtraAllowanceCharge());

        return $extraAllowanceCharge;
    }

    /**
     * @param  ExtraAllowanceCharge $extraAllowanceCharge
     * @return static
     */
    public function addOnceToExtraAllowanceCharge(
        ExtraAllowanceCharge $extraAllowanceCharge
    ): static {
        if (!is_array($this->extraAllowanceCharge)) {
            $this->extraAllowanceCharge = [];
        }

        $this->extraAllowanceCharge[0] = $extraAllowanceCharge;

        return $this;
    }

    /**
     * @return ExtraAllowanceCharge
     */
    public function addOnceToExtraAllowanceChargeWithCreate(): ExtraAllowanceCharge
    {
        if (!is_array($this->extraAllowanceCharge)) {
            $this->extraAllowanceCharge = [];
        }

        if ([] === $this->extraAllowanceCharge) {
            $this->addOnceToextraAllowanceCharge(new ExtraAllowanceCharge());
        }

        return $this->extraAllowanceCharge[0];
    }

    /**
     * @return null|array<MainCarriageShipmentStage>
     */
    public function getMainCarriageShipmentStage(): ?array
    {
        return $this->mainCarriageShipmentStage;
    }

    /**
     * @param  null|array<MainCarriageShipmentStage> $mainCarriageShipmentStage
     * @return static
     */
    public function setMainCarriageShipmentStage(
        ?array $mainCarriageShipmentStage = null
    ): static {
        $this->mainCarriageShipmentStage = $mainCarriageShipmentStage;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMainCarriageShipmentStage(): static
    {
        $this->mainCarriageShipmentStage = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearMainCarriageShipmentStage(): static
    {
        $this->mainCarriageShipmentStage = [];

        return $this;
    }

    /**
     * @return null|MainCarriageShipmentStage
     */
    public function firstMainCarriageShipmentStage(): ?MainCarriageShipmentStage
    {
        $mainCarriageShipmentStage = $this->mainCarriageShipmentStage ?? [];
        $mainCarriageShipmentStage = reset($mainCarriageShipmentStage);

        if (false === $mainCarriageShipmentStage) {
            return null;
        }

        return $mainCarriageShipmentStage;
    }

    /**
     * @return null|MainCarriageShipmentStage
     */
    public function lastMainCarriageShipmentStage(): ?MainCarriageShipmentStage
    {
        $mainCarriageShipmentStage = $this->mainCarriageShipmentStage ?? [];
        $mainCarriageShipmentStage = end($mainCarriageShipmentStage);

        if (false === $mainCarriageShipmentStage) {
            return null;
        }

        return $mainCarriageShipmentStage;
    }

    /**
     * @param  MainCarriageShipmentStage $mainCarriageShipmentStage
     * @return static
     */
    public function addToMainCarriageShipmentStage(
        MainCarriageShipmentStage $mainCarriageShipmentStage
    ): static {
        $this->mainCarriageShipmentStage[] = $mainCarriageShipmentStage;

        return $this;
    }

    /**
     * @return MainCarriageShipmentStage
     */
    public function addToMainCarriageShipmentStageWithCreate(): MainCarriageShipmentStage
    {
        $this->addTomainCarriageShipmentStage($mainCarriageShipmentStage = new MainCarriageShipmentStage());

        return $mainCarriageShipmentStage;
    }

    /**
     * @param  MainCarriageShipmentStage $mainCarriageShipmentStage
     * @return static
     */
    public function addOnceToMainCarriageShipmentStage(
        MainCarriageShipmentStage $mainCarriageShipmentStage
    ): static {
        if (!is_array($this->mainCarriageShipmentStage)) {
            $this->mainCarriageShipmentStage = [];
        }

        $this->mainCarriageShipmentStage[0] = $mainCarriageShipmentStage;

        return $this;
    }

    /**
     * @return MainCarriageShipmentStage
     */
    public function addOnceToMainCarriageShipmentStageWithCreate(): MainCarriageShipmentStage
    {
        if (!is_array($this->mainCarriageShipmentStage)) {
            $this->mainCarriageShipmentStage = [];
        }

        if ([] === $this->mainCarriageShipmentStage) {
            $this->addOnceTomainCarriageShipmentStage(new MainCarriageShipmentStage());
        }

        return $this->mainCarriageShipmentStage[0];
    }

    /**
     * @return null|array<PreCarriageShipmentStage>
     */
    public function getPreCarriageShipmentStage(): ?array
    {
        return $this->preCarriageShipmentStage;
    }

    /**
     * @param  null|array<PreCarriageShipmentStage> $preCarriageShipmentStage
     * @return static
     */
    public function setPreCarriageShipmentStage(
        ?array $preCarriageShipmentStage = null
    ): static {
        $this->preCarriageShipmentStage = $preCarriageShipmentStage;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPreCarriageShipmentStage(): static
    {
        $this->preCarriageShipmentStage = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearPreCarriageShipmentStage(): static
    {
        $this->preCarriageShipmentStage = [];

        return $this;
    }

    /**
     * @return null|PreCarriageShipmentStage
     */
    public function firstPreCarriageShipmentStage(): ?PreCarriageShipmentStage
    {
        $preCarriageShipmentStage = $this->preCarriageShipmentStage ?? [];
        $preCarriageShipmentStage = reset($preCarriageShipmentStage);

        if (false === $preCarriageShipmentStage) {
            return null;
        }

        return $preCarriageShipmentStage;
    }

    /**
     * @return null|PreCarriageShipmentStage
     */
    public function lastPreCarriageShipmentStage(): ?PreCarriageShipmentStage
    {
        $preCarriageShipmentStage = $this->preCarriageShipmentStage ?? [];
        $preCarriageShipmentStage = end($preCarriageShipmentStage);

        if (false === $preCarriageShipmentStage) {
            return null;
        }

        return $preCarriageShipmentStage;
    }

    /**
     * @param  PreCarriageShipmentStage $preCarriageShipmentStage
     * @return static
     */
    public function addToPreCarriageShipmentStage(
        PreCarriageShipmentStage $preCarriageShipmentStage
    ): static {
        $this->preCarriageShipmentStage[] = $preCarriageShipmentStage;

        return $this;
    }

    /**
     * @return PreCarriageShipmentStage
     */
    public function addToPreCarriageShipmentStageWithCreate(): PreCarriageShipmentStage
    {
        $this->addTopreCarriageShipmentStage($preCarriageShipmentStage = new PreCarriageShipmentStage());

        return $preCarriageShipmentStage;
    }

    /**
     * @param  PreCarriageShipmentStage $preCarriageShipmentStage
     * @return static
     */
    public function addOnceToPreCarriageShipmentStage(
        PreCarriageShipmentStage $preCarriageShipmentStage
    ): static {
        if (!is_array($this->preCarriageShipmentStage)) {
            $this->preCarriageShipmentStage = [];
        }

        $this->preCarriageShipmentStage[0] = $preCarriageShipmentStage;

        return $this;
    }

    /**
     * @return PreCarriageShipmentStage
     */
    public function addOnceToPreCarriageShipmentStageWithCreate(): PreCarriageShipmentStage
    {
        if (!is_array($this->preCarriageShipmentStage)) {
            $this->preCarriageShipmentStage = [];
        }

        if ([] === $this->preCarriageShipmentStage) {
            $this->addOnceTopreCarriageShipmentStage(new PreCarriageShipmentStage());
        }

        return $this->preCarriageShipmentStage[0];
    }

    /**
     * @return null|array<OnCarriageShipmentStage>
     */
    public function getOnCarriageShipmentStage(): ?array
    {
        return $this->onCarriageShipmentStage;
    }

    /**
     * @param  null|array<OnCarriageShipmentStage> $onCarriageShipmentStage
     * @return static
     */
    public function setOnCarriageShipmentStage(
        ?array $onCarriageShipmentStage = null
    ): static {
        $this->onCarriageShipmentStage = $onCarriageShipmentStage;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetOnCarriageShipmentStage(): static
    {
        $this->onCarriageShipmentStage = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearOnCarriageShipmentStage(): static
    {
        $this->onCarriageShipmentStage = [];

        return $this;
    }

    /**
     * @return null|OnCarriageShipmentStage
     */
    public function firstOnCarriageShipmentStage(): ?OnCarriageShipmentStage
    {
        $onCarriageShipmentStage = $this->onCarriageShipmentStage ?? [];
        $onCarriageShipmentStage = reset($onCarriageShipmentStage);

        if (false === $onCarriageShipmentStage) {
            return null;
        }

        return $onCarriageShipmentStage;
    }

    /**
     * @return null|OnCarriageShipmentStage
     */
    public function lastOnCarriageShipmentStage(): ?OnCarriageShipmentStage
    {
        $onCarriageShipmentStage = $this->onCarriageShipmentStage ?? [];
        $onCarriageShipmentStage = end($onCarriageShipmentStage);

        if (false === $onCarriageShipmentStage) {
            return null;
        }

        return $onCarriageShipmentStage;
    }

    /**
     * @param  OnCarriageShipmentStage $onCarriageShipmentStage
     * @return static
     */
    public function addToOnCarriageShipmentStage(
        OnCarriageShipmentStage $onCarriageShipmentStage
    ): static {
        $this->onCarriageShipmentStage[] = $onCarriageShipmentStage;

        return $this;
    }

    /**
     * @return OnCarriageShipmentStage
     */
    public function addToOnCarriageShipmentStageWithCreate(): OnCarriageShipmentStage
    {
        $this->addToonCarriageShipmentStage($onCarriageShipmentStage = new OnCarriageShipmentStage());

        return $onCarriageShipmentStage;
    }

    /**
     * @param  OnCarriageShipmentStage $onCarriageShipmentStage
     * @return static
     */
    public function addOnceToOnCarriageShipmentStage(
        OnCarriageShipmentStage $onCarriageShipmentStage
    ): static {
        if (!is_array($this->onCarriageShipmentStage)) {
            $this->onCarriageShipmentStage = [];
        }

        $this->onCarriageShipmentStage[0] = $onCarriageShipmentStage;

        return $this;
    }

    /**
     * @return OnCarriageShipmentStage
     */
    public function addOnceToOnCarriageShipmentStageWithCreate(): OnCarriageShipmentStage
    {
        if (!is_array($this->onCarriageShipmentStage)) {
            $this->onCarriageShipmentStage = [];
        }

        if ([] === $this->onCarriageShipmentStage) {
            $this->addOnceToonCarriageShipmentStage(new OnCarriageShipmentStage());
        }

        return $this->onCarriageShipmentStage[0];
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
        $this->addTotransportHandlingUnit($transportHandlingUnit = new TransportHandlingUnit());

        return $transportHandlingUnit;
    }

    /**
     * @param  TransportHandlingUnit $transportHandlingUnit
     * @return static
     */
    public function addOnceToTransportHandlingUnit(
        TransportHandlingUnit $transportHandlingUnit
    ): static {
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
}
