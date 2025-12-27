<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\ubl\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\ubl\cbc\AcceptedVariantsDescription;
use horstoeko\invoicesuite\documents\models\ubl\cbc\AdditionalConditions;
use horstoeko\invoicesuite\documents\models\ubl\cbc\AwardingMethodTypeCode;
use horstoeko\invoicesuite\documents\models\ubl\cbc\DocumentationFeeAmount;
use horstoeko\invoicesuite\documents\models\ubl\cbc\EconomicOperatorRegistryURI;
use horstoeko\invoicesuite\documents\models\ubl\cbc\FundingProgram;
use horstoeko\invoicesuite\documents\models\ubl\cbc\FundingProgramCode;
use horstoeko\invoicesuite\documents\models\ubl\cbc\MaximumAdvertisementAmount;
use horstoeko\invoicesuite\documents\models\ubl\cbc\MaximumVariantQuantity;
use horstoeko\invoicesuite\documents\models\ubl\cbc\Note;
use horstoeko\invoicesuite\documents\models\ubl\cbc\PaymentFrequencyCode;
use horstoeko\invoicesuite\documents\models\ubl\cbc\PriceEvaluationCode;
use horstoeko\invoicesuite\documents\models\ubl\cbc\PriceRevisionFormulaDescription;
use JMS\Serializer\Annotation as JMS;

class TenderingTermsType
{
    use HandlesObjectFlags;

    /**
     * @var null|AwardingMethodTypeCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\AwardingMethodTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("AwardingMethodTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAwardingMethodTypeCode", setter="setAwardingMethodTypeCode")
     */
    private $awardingMethodTypeCode;

    /**
     * @var null|PriceEvaluationCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\PriceEvaluationCode")
     * @JMS\Expose
     * @JMS\SerializedName("PriceEvaluationCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPriceEvaluationCode", setter="setPriceEvaluationCode")
     */
    private $priceEvaluationCode;

    /**
     * @var null|MaximumVariantQuantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\MaximumVariantQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("MaximumVariantQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMaximumVariantQuantity", setter="setMaximumVariantQuantity")
     */
    private $maximumVariantQuantity;

    /**
     * @var null|bool
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("VariantConstraintIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getVariantConstraintIndicator", setter="setVariantConstraintIndicator")
     */
    private $variantConstraintIndicator;

    /**
     * @var null|array<AcceptedVariantsDescription>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cbc\AcceptedVariantsDescription>")
     * @JMS\Expose
     * @JMS\SerializedName("AcceptedVariantsDescription")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="AcceptedVariantsDescription", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getAcceptedVariantsDescription", setter="setAcceptedVariantsDescription")
     */
    private $acceptedVariantsDescription;

    /**
     * @var null|array<PriceRevisionFormulaDescription>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cbc\PriceRevisionFormulaDescription>")
     * @JMS\Expose
     * @JMS\SerializedName("PriceRevisionFormulaDescription")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PriceRevisionFormulaDescription", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getPriceRevisionFormulaDescription", setter="setPriceRevisionFormulaDescription")
     */
    private $priceRevisionFormulaDescription;

    /**
     * @var null|FundingProgramCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\FundingProgramCode")
     * @JMS\Expose
     * @JMS\SerializedName("FundingProgramCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getFundingProgramCode", setter="setFundingProgramCode")
     */
    private $fundingProgramCode;

    /**
     * @var null|array<FundingProgram>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cbc\FundingProgram>")
     * @JMS\Expose
     * @JMS\SerializedName("FundingProgram")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="FundingProgram", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getFundingProgram", setter="setFundingProgram")
     */
    private $fundingProgram;

    /**
     * @var null|MaximumAdvertisementAmount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\MaximumAdvertisementAmount")
     * @JMS\Expose
     * @JMS\SerializedName("MaximumAdvertisementAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMaximumAdvertisementAmount", setter="setMaximumAdvertisementAmount")
     */
    private $maximumAdvertisementAmount;

    /**
     * @var null|array<Note>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cbc\Note>")
     * @JMS\Expose
     * @JMS\SerializedName("Note")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Note", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getNote", setter="setNote")
     */
    private $note;

    /**
     * @var null|PaymentFrequencyCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\PaymentFrequencyCode")
     * @JMS\Expose
     * @JMS\SerializedName("PaymentFrequencyCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPaymentFrequencyCode", setter="setPaymentFrequencyCode")
     */
    private $paymentFrequencyCode;

    /**
     * @var null|EconomicOperatorRegistryURI
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\EconomicOperatorRegistryURI")
     * @JMS\Expose
     * @JMS\SerializedName("EconomicOperatorRegistryURI")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEconomicOperatorRegistryURI", setter="setEconomicOperatorRegistryURI")
     */
    private $economicOperatorRegistryURI;

    /**
     * @var null|bool
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("RequiredCurriculaIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRequiredCurriculaIndicator", setter="setRequiredCurriculaIndicator")
     */
    private $requiredCurriculaIndicator;

    /**
     * @var null|bool
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("OtherConditionsIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOtherConditionsIndicator", setter="setOtherConditionsIndicator")
     */
    private $otherConditionsIndicator;

    /**
     * @var null|array<AdditionalConditions>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cbc\AdditionalConditions>")
     * @JMS\Expose
     * @JMS\SerializedName("AdditionalConditions")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="AdditionalConditions", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getAdditionalConditions", setter="setAdditionalConditions")
     */
    private $additionalConditions;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("LatestSecurityClearanceDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLatestSecurityClearanceDate", setter="setLatestSecurityClearanceDate")
     */
    private $latestSecurityClearanceDate;

    /**
     * @var null|DocumentationFeeAmount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\DocumentationFeeAmount")
     * @JMS\Expose
     * @JMS\SerializedName("DocumentationFeeAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDocumentationFeeAmount", setter="setDocumentationFeeAmount")
     */
    private $documentationFeeAmount;

    /**
     * @var null|array<PenaltyClause>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\PenaltyClause>")
     * @JMS\Expose
     * @JMS\SerializedName("PenaltyClause")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PenaltyClause", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getPenaltyClause", setter="setPenaltyClause")
     */
    private $penaltyClause;

    /**
     * @var null|array<RequiredFinancialGuarantee>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\RequiredFinancialGuarantee>")
     * @JMS\Expose
     * @JMS\SerializedName("RequiredFinancialGuarantee")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="RequiredFinancialGuarantee", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getRequiredFinancialGuarantee", setter="setRequiredFinancialGuarantee")
     */
    private $requiredFinancialGuarantee;

    /**
     * @var null|ProcurementLegislationDocumentReference
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\ProcurementLegislationDocumentReference")
     * @JMS\Expose
     * @JMS\SerializedName("ProcurementLegislationDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getProcurementLegislationDocumentReference", setter="setProcurementLegislationDocumentReference")
     */
    private $procurementLegislationDocumentReference;

    /**
     * @var null|FiscalLegislationDocumentReference
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\FiscalLegislationDocumentReference")
     * @JMS\Expose
     * @JMS\SerializedName("FiscalLegislationDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getFiscalLegislationDocumentReference", setter="setFiscalLegislationDocumentReference")
     */
    private $fiscalLegislationDocumentReference;

    /**
     * @var null|EnvironmentalLegislationDocumentReference
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\EnvironmentalLegislationDocumentReference")
     * @JMS\Expose
     * @JMS\SerializedName("EnvironmentalLegislationDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEnvironmentalLegislationDocumentReference", setter="setEnvironmentalLegislationDocumentReference")
     */
    private $environmentalLegislationDocumentReference;

    /**
     * @var null|EmploymentLegislationDocumentReference
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\EmploymentLegislationDocumentReference")
     * @JMS\Expose
     * @JMS\SerializedName("EmploymentLegislationDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEmploymentLegislationDocumentReference", setter="setEmploymentLegislationDocumentReference")
     */
    private $employmentLegislationDocumentReference;

    /**
     * @var null|array<ContractualDocumentReference>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\ContractualDocumentReference>")
     * @JMS\Expose
     * @JMS\SerializedName("ContractualDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ContractualDocumentReference", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getContractualDocumentReference", setter="setContractualDocumentReference")
     */
    private $contractualDocumentReference;

    /**
     * @var null|CallForTendersDocumentReference
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\CallForTendersDocumentReference")
     * @JMS\Expose
     * @JMS\SerializedName("CallForTendersDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCallForTendersDocumentReference", setter="setCallForTendersDocumentReference")
     */
    private $callForTendersDocumentReference;

    /**
     * @var null|WarrantyValidityPeriod
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\WarrantyValidityPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("WarrantyValidityPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getWarrantyValidityPeriod", setter="setWarrantyValidityPeriod")
     */
    private $warrantyValidityPeriod;

    /**
     * @var null|array<PaymentTerms>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\PaymentTerms>")
     * @JMS\Expose
     * @JMS\SerializedName("PaymentTerms")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PaymentTerms", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getPaymentTerms", setter="setPaymentTerms")
     */
    private $paymentTerms;

    /**
     * @var null|array<TendererQualificationRequest>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\TendererQualificationRequest>")
     * @JMS\Expose
     * @JMS\SerializedName("TendererQualificationRequest")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TendererQualificationRequest", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getTendererQualificationRequest", setter="setTendererQualificationRequest")
     */
    private $tendererQualificationRequest;

    /**
     * @var null|array<AllowedSubcontractTerms>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\AllowedSubcontractTerms>")
     * @JMS\Expose
     * @JMS\SerializedName("AllowedSubcontractTerms")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="AllowedSubcontractTerms", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getAllowedSubcontractTerms", setter="setAllowedSubcontractTerms")
     */
    private $allowedSubcontractTerms;

    /**
     * @var null|array<TenderPreparation>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\TenderPreparation>")
     * @JMS\Expose
     * @JMS\SerializedName("TenderPreparation")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TenderPreparation", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getTenderPreparation", setter="setTenderPreparation")
     */
    private $tenderPreparation;

    /**
     * @var null|array<ContractExecutionRequirement>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\ContractExecutionRequirement>")
     * @JMS\Expose
     * @JMS\SerializedName("ContractExecutionRequirement")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ContractExecutionRequirement", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getContractExecutionRequirement", setter="setContractExecutionRequirement")
     */
    private $contractExecutionRequirement;

    /**
     * @var null|AwardingTerms
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\AwardingTerms")
     * @JMS\Expose
     * @JMS\SerializedName("AwardingTerms")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAwardingTerms", setter="setAwardingTerms")
     */
    private $awardingTerms;

    /**
     * @var null|AdditionalInformationParty
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\AdditionalInformationParty")
     * @JMS\Expose
     * @JMS\SerializedName("AdditionalInformationParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAdditionalInformationParty", setter="setAdditionalInformationParty")
     */
    private $additionalInformationParty;

    /**
     * @var null|DocumentProviderParty
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\DocumentProviderParty")
     * @JMS\Expose
     * @JMS\SerializedName("DocumentProviderParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDocumentProviderParty", setter="setDocumentProviderParty")
     */
    private $documentProviderParty;

    /**
     * @var null|TenderRecipientParty
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\TenderRecipientParty")
     * @JMS\Expose
     * @JMS\SerializedName("TenderRecipientParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTenderRecipientParty", setter="setTenderRecipientParty")
     */
    private $tenderRecipientParty;

    /**
     * @var null|ContractResponsibleParty
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\ContractResponsibleParty")
     * @JMS\Expose
     * @JMS\SerializedName("ContractResponsibleParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getContractResponsibleParty", setter="setContractResponsibleParty")
     */
    private $contractResponsibleParty;

    /**
     * @var null|array<TenderEvaluationParty>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\TenderEvaluationParty>")
     * @JMS\Expose
     * @JMS\SerializedName("TenderEvaluationParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TenderEvaluationParty", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getTenderEvaluationParty", setter="setTenderEvaluationParty")
     */
    private $tenderEvaluationParty;

    /**
     * @var null|TenderValidityPeriod
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\TenderValidityPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("TenderValidityPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTenderValidityPeriod", setter="setTenderValidityPeriod")
     */
    private $tenderValidityPeriod;

    /**
     * @var null|ContractAcceptancePeriod
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\ContractAcceptancePeriod")
     * @JMS\Expose
     * @JMS\SerializedName("ContractAcceptancePeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getContractAcceptancePeriod", setter="setContractAcceptancePeriod")
     */
    private $contractAcceptancePeriod;

    /**
     * @var null|AppealTerms
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\AppealTerms")
     * @JMS\Expose
     * @JMS\SerializedName("AppealTerms")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAppealTerms", setter="setAppealTerms")
     */
    private $appealTerms;

    /**
     * @var null|array<Language>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\Language>")
     * @JMS\Expose
     * @JMS\SerializedName("Language")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Language", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getLanguage", setter="setLanguage")
     */
    private $language;

    /**
     * @var null|array<BudgetAccountLine>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\BudgetAccountLine>")
     * @JMS\Expose
     * @JMS\SerializedName("BudgetAccountLine")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="BudgetAccountLine", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getBudgetAccountLine", setter="setBudgetAccountLine")
     */
    private $budgetAccountLine;

    /**
     * @var null|ReplacedNoticeDocumentReference
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\ReplacedNoticeDocumentReference")
     * @JMS\Expose
     * @JMS\SerializedName("ReplacedNoticeDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getReplacedNoticeDocumentReference", setter="setReplacedNoticeDocumentReference")
     */
    private $replacedNoticeDocumentReference;

    /**
     * @return null|AwardingMethodTypeCode
     */
    public function getAwardingMethodTypeCode(): ?AwardingMethodTypeCode
    {
        return $this->awardingMethodTypeCode;
    }

    /**
     * @return AwardingMethodTypeCode
     */
    public function getAwardingMethodTypeCodeWithCreate(): AwardingMethodTypeCode
    {
        $this->awardingMethodTypeCode = is_null($this->awardingMethodTypeCode) ? new AwardingMethodTypeCode() : $this->awardingMethodTypeCode;

        return $this->awardingMethodTypeCode;
    }

    /**
     * @param  null|AwardingMethodTypeCode $awardingMethodTypeCode
     * @return static
     */
    public function setAwardingMethodTypeCode(?AwardingMethodTypeCode $awardingMethodTypeCode = null): static
    {
        $this->awardingMethodTypeCode = $awardingMethodTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAwardingMethodTypeCode(): static
    {
        $this->awardingMethodTypeCode = null;

        return $this;
    }

    /**
     * @return null|PriceEvaluationCode
     */
    public function getPriceEvaluationCode(): ?PriceEvaluationCode
    {
        return $this->priceEvaluationCode;
    }

    /**
     * @return PriceEvaluationCode
     */
    public function getPriceEvaluationCodeWithCreate(): PriceEvaluationCode
    {
        $this->priceEvaluationCode = is_null($this->priceEvaluationCode) ? new PriceEvaluationCode() : $this->priceEvaluationCode;

        return $this->priceEvaluationCode;
    }

    /**
     * @param  null|PriceEvaluationCode $priceEvaluationCode
     * @return static
     */
    public function setPriceEvaluationCode(?PriceEvaluationCode $priceEvaluationCode = null): static
    {
        $this->priceEvaluationCode = $priceEvaluationCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPriceEvaluationCode(): static
    {
        $this->priceEvaluationCode = null;

        return $this;
    }

    /**
     * @return null|MaximumVariantQuantity
     */
    public function getMaximumVariantQuantity(): ?MaximumVariantQuantity
    {
        return $this->maximumVariantQuantity;
    }

    /**
     * @return MaximumVariantQuantity
     */
    public function getMaximumVariantQuantityWithCreate(): MaximumVariantQuantity
    {
        $this->maximumVariantQuantity = is_null($this->maximumVariantQuantity) ? new MaximumVariantQuantity() : $this->maximumVariantQuantity;

        return $this->maximumVariantQuantity;
    }

    /**
     * @param  null|MaximumVariantQuantity $maximumVariantQuantity
     * @return static
     */
    public function setMaximumVariantQuantity(?MaximumVariantQuantity $maximumVariantQuantity = null): static
    {
        $this->maximumVariantQuantity = $maximumVariantQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMaximumVariantQuantity(): static
    {
        $this->maximumVariantQuantity = null;

        return $this;
    }

    /**
     * @return null|bool
     */
    public function getVariantConstraintIndicator(): ?bool
    {
        return $this->variantConstraintIndicator;
    }

    /**
     * @param  null|bool $variantConstraintIndicator
     * @return static
     */
    public function setVariantConstraintIndicator(?bool $variantConstraintIndicator = null): static
    {
        $this->variantConstraintIndicator = $variantConstraintIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetVariantConstraintIndicator(): static
    {
        $this->variantConstraintIndicator = null;

        return $this;
    }

    /**
     * @return null|array<AcceptedVariantsDescription>
     */
    public function getAcceptedVariantsDescription(): ?array
    {
        return $this->acceptedVariantsDescription;
    }

    /**
     * @param  null|array<AcceptedVariantsDescription> $acceptedVariantsDescription
     * @return static
     */
    public function setAcceptedVariantsDescription(?array $acceptedVariantsDescription = null): static
    {
        $this->acceptedVariantsDescription = $acceptedVariantsDescription;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAcceptedVariantsDescription(): static
    {
        $this->acceptedVariantsDescription = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearAcceptedVariantsDescription(): static
    {
        $this->acceptedVariantsDescription = [];

        return $this;
    }

    /**
     * @return null|AcceptedVariantsDescription
     */
    public function firstAcceptedVariantsDescription(): ?AcceptedVariantsDescription
    {
        $acceptedVariantsDescription = $this->acceptedVariantsDescription ?? [];
        $acceptedVariantsDescription = reset($acceptedVariantsDescription);

        if (false === $acceptedVariantsDescription) {
            return null;
        }

        return $acceptedVariantsDescription;
    }

    /**
     * @return null|AcceptedVariantsDescription
     */
    public function lastAcceptedVariantsDescription(): ?AcceptedVariantsDescription
    {
        $acceptedVariantsDescription = $this->acceptedVariantsDescription ?? [];
        $acceptedVariantsDescription = end($acceptedVariantsDescription);

        if (false === $acceptedVariantsDescription) {
            return null;
        }

        return $acceptedVariantsDescription;
    }

    /**
     * @param  AcceptedVariantsDescription $acceptedVariantsDescription
     * @return static
     */
    public function addToAcceptedVariantsDescription(AcceptedVariantsDescription $acceptedVariantsDescription): static
    {
        $this->acceptedVariantsDescription[] = $acceptedVariantsDescription;

        return $this;
    }

    /**
     * @return AcceptedVariantsDescription
     */
    public function addToAcceptedVariantsDescriptionWithCreate(): AcceptedVariantsDescription
    {
        $this->addToacceptedVariantsDescription($acceptedVariantsDescription = new AcceptedVariantsDescription());

        return $acceptedVariantsDescription;
    }

    /**
     * @param  AcceptedVariantsDescription $acceptedVariantsDescription
     * @return static
     */
    public function addOnceToAcceptedVariantsDescription(
        AcceptedVariantsDescription $acceptedVariantsDescription,
    ): static {
        if (!is_array($this->acceptedVariantsDescription)) {
            $this->acceptedVariantsDescription = [];
        }

        $this->acceptedVariantsDescription[0] = $acceptedVariantsDescription;

        return $this;
    }

    /**
     * @return AcceptedVariantsDescription
     */
    public function addOnceToAcceptedVariantsDescriptionWithCreate(): AcceptedVariantsDescription
    {
        if (!is_array($this->acceptedVariantsDescription)) {
            $this->acceptedVariantsDescription = [];
        }

        if ([] === $this->acceptedVariantsDescription) {
            $this->addOnceToacceptedVariantsDescription(new AcceptedVariantsDescription());
        }

        return $this->acceptedVariantsDescription[0];
    }

    /**
     * @return null|array<PriceRevisionFormulaDescription>
     */
    public function getPriceRevisionFormulaDescription(): ?array
    {
        return $this->priceRevisionFormulaDescription;
    }

    /**
     * @param  null|array<PriceRevisionFormulaDescription> $priceRevisionFormulaDescription
     * @return static
     */
    public function setPriceRevisionFormulaDescription(?array $priceRevisionFormulaDescription = null): static
    {
        $this->priceRevisionFormulaDescription = $priceRevisionFormulaDescription;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPriceRevisionFormulaDescription(): static
    {
        $this->priceRevisionFormulaDescription = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearPriceRevisionFormulaDescription(): static
    {
        $this->priceRevisionFormulaDescription = [];

        return $this;
    }

    /**
     * @return null|PriceRevisionFormulaDescription
     */
    public function firstPriceRevisionFormulaDescription(): ?PriceRevisionFormulaDescription
    {
        $priceRevisionFormulaDescription = $this->priceRevisionFormulaDescription ?? [];
        $priceRevisionFormulaDescription = reset($priceRevisionFormulaDescription);

        if (false === $priceRevisionFormulaDescription) {
            return null;
        }

        return $priceRevisionFormulaDescription;
    }

    /**
     * @return null|PriceRevisionFormulaDescription
     */
    public function lastPriceRevisionFormulaDescription(): ?PriceRevisionFormulaDescription
    {
        $priceRevisionFormulaDescription = $this->priceRevisionFormulaDescription ?? [];
        $priceRevisionFormulaDescription = end($priceRevisionFormulaDescription);

        if (false === $priceRevisionFormulaDescription) {
            return null;
        }

        return $priceRevisionFormulaDescription;
    }

    /**
     * @param  PriceRevisionFormulaDescription $priceRevisionFormulaDescription
     * @return static
     */
    public function addToPriceRevisionFormulaDescription(
        PriceRevisionFormulaDescription $priceRevisionFormulaDescription,
    ): static {
        $this->priceRevisionFormulaDescription[] = $priceRevisionFormulaDescription;

        return $this;
    }

    /**
     * @return PriceRevisionFormulaDescription
     */
    public function addToPriceRevisionFormulaDescriptionWithCreate(): PriceRevisionFormulaDescription
    {
        $this->addTopriceRevisionFormulaDescription($priceRevisionFormulaDescription = new PriceRevisionFormulaDescription());

        return $priceRevisionFormulaDescription;
    }

    /**
     * @param  PriceRevisionFormulaDescription $priceRevisionFormulaDescription
     * @return static
     */
    public function addOnceToPriceRevisionFormulaDescription(
        PriceRevisionFormulaDescription $priceRevisionFormulaDescription,
    ): static {
        if (!is_array($this->priceRevisionFormulaDescription)) {
            $this->priceRevisionFormulaDescription = [];
        }

        $this->priceRevisionFormulaDescription[0] = $priceRevisionFormulaDescription;

        return $this;
    }

    /**
     * @return PriceRevisionFormulaDescription
     */
    public function addOnceToPriceRevisionFormulaDescriptionWithCreate(): PriceRevisionFormulaDescription
    {
        if (!is_array($this->priceRevisionFormulaDescription)) {
            $this->priceRevisionFormulaDescription = [];
        }

        if ([] === $this->priceRevisionFormulaDescription) {
            $this->addOnceTopriceRevisionFormulaDescription(new PriceRevisionFormulaDescription());
        }

        return $this->priceRevisionFormulaDescription[0];
    }

    /**
     * @return null|FundingProgramCode
     */
    public function getFundingProgramCode(): ?FundingProgramCode
    {
        return $this->fundingProgramCode;
    }

    /**
     * @return FundingProgramCode
     */
    public function getFundingProgramCodeWithCreate(): FundingProgramCode
    {
        $this->fundingProgramCode = is_null($this->fundingProgramCode) ? new FundingProgramCode() : $this->fundingProgramCode;

        return $this->fundingProgramCode;
    }

    /**
     * @param  null|FundingProgramCode $fundingProgramCode
     * @return static
     */
    public function setFundingProgramCode(?FundingProgramCode $fundingProgramCode = null): static
    {
        $this->fundingProgramCode = $fundingProgramCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetFundingProgramCode(): static
    {
        $this->fundingProgramCode = null;

        return $this;
    }

    /**
     * @return null|array<FundingProgram>
     */
    public function getFundingProgram(): ?array
    {
        return $this->fundingProgram;
    }

    /**
     * @param  null|array<FundingProgram> $fundingProgram
     * @return static
     */
    public function setFundingProgram(?array $fundingProgram = null): static
    {
        $this->fundingProgram = $fundingProgram;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetFundingProgram(): static
    {
        $this->fundingProgram = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearFundingProgram(): static
    {
        $this->fundingProgram = [];

        return $this;
    }

    /**
     * @return null|FundingProgram
     */
    public function firstFundingProgram(): ?FundingProgram
    {
        $fundingProgram = $this->fundingProgram ?? [];
        $fundingProgram = reset($fundingProgram);

        if (false === $fundingProgram) {
            return null;
        }

        return $fundingProgram;
    }

    /**
     * @return null|FundingProgram
     */
    public function lastFundingProgram(): ?FundingProgram
    {
        $fundingProgram = $this->fundingProgram ?? [];
        $fundingProgram = end($fundingProgram);

        if (false === $fundingProgram) {
            return null;
        }

        return $fundingProgram;
    }

    /**
     * @param  FundingProgram $fundingProgram
     * @return static
     */
    public function addToFundingProgram(FundingProgram $fundingProgram): static
    {
        $this->fundingProgram[] = $fundingProgram;

        return $this;
    }

    /**
     * @return FundingProgram
     */
    public function addToFundingProgramWithCreate(): FundingProgram
    {
        $this->addTofundingProgram($fundingProgram = new FundingProgram());

        return $fundingProgram;
    }

    /**
     * @param  FundingProgram $fundingProgram
     * @return static
     */
    public function addOnceToFundingProgram(FundingProgram $fundingProgram): static
    {
        if (!is_array($this->fundingProgram)) {
            $this->fundingProgram = [];
        }

        $this->fundingProgram[0] = $fundingProgram;

        return $this;
    }

    /**
     * @return FundingProgram
     */
    public function addOnceToFundingProgramWithCreate(): FundingProgram
    {
        if (!is_array($this->fundingProgram)) {
            $this->fundingProgram = [];
        }

        if ([] === $this->fundingProgram) {
            $this->addOnceTofundingProgram(new FundingProgram());
        }

        return $this->fundingProgram[0];
    }

    /**
     * @return null|MaximumAdvertisementAmount
     */
    public function getMaximumAdvertisementAmount(): ?MaximumAdvertisementAmount
    {
        return $this->maximumAdvertisementAmount;
    }

    /**
     * @return MaximumAdvertisementAmount
     */
    public function getMaximumAdvertisementAmountWithCreate(): MaximumAdvertisementAmount
    {
        $this->maximumAdvertisementAmount = is_null($this->maximumAdvertisementAmount) ? new MaximumAdvertisementAmount() : $this->maximumAdvertisementAmount;

        return $this->maximumAdvertisementAmount;
    }

    /**
     * @param  null|MaximumAdvertisementAmount $maximumAdvertisementAmount
     * @return static
     */
    public function setMaximumAdvertisementAmount(
        ?MaximumAdvertisementAmount $maximumAdvertisementAmount = null,
    ): static {
        $this->maximumAdvertisementAmount = $maximumAdvertisementAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMaximumAdvertisementAmount(): static
    {
        $this->maximumAdvertisementAmount = null;

        return $this;
    }

    /**
     * @return null|array<Note>
     */
    public function getNote(): ?array
    {
        return $this->note;
    }

    /**
     * @param  null|array<Note> $note
     * @return static
     */
    public function setNote(?array $note = null): static
    {
        $this->note = $note;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetNote(): static
    {
        $this->note = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearNote(): static
    {
        $this->note = [];

        return $this;
    }

    /**
     * @return null|Note
     */
    public function firstNote(): ?Note
    {
        $note = $this->note ?? [];
        $note = reset($note);

        if (false === $note) {
            return null;
        }

        return $note;
    }

    /**
     * @return null|Note
     */
    public function lastNote(): ?Note
    {
        $note = $this->note ?? [];
        $note = end($note);

        if (false === $note) {
            return null;
        }

        return $note;
    }

    /**
     * @param  Note   $note
     * @return static
     */
    public function addToNote(Note $note): static
    {
        $this->note[] = $note;

        return $this;
    }

    /**
     * @return Note
     */
    public function addToNoteWithCreate(): Note
    {
        $this->addTonote($note = new Note());

        return $note;
    }

    /**
     * @param  Note   $note
     * @return static
     */
    public function addOnceToNote(Note $note): static
    {
        if (!is_array($this->note)) {
            $this->note = [];
        }

        $this->note[0] = $note;

        return $this;
    }

    /**
     * @return Note
     */
    public function addOnceToNoteWithCreate(): Note
    {
        if (!is_array($this->note)) {
            $this->note = [];
        }

        if ([] === $this->note) {
            $this->addOnceTonote(new Note());
        }

        return $this->note[0];
    }

    /**
     * @return null|PaymentFrequencyCode
     */
    public function getPaymentFrequencyCode(): ?PaymentFrequencyCode
    {
        return $this->paymentFrequencyCode;
    }

    /**
     * @return PaymentFrequencyCode
     */
    public function getPaymentFrequencyCodeWithCreate(): PaymentFrequencyCode
    {
        $this->paymentFrequencyCode = is_null($this->paymentFrequencyCode) ? new PaymentFrequencyCode() : $this->paymentFrequencyCode;

        return $this->paymentFrequencyCode;
    }

    /**
     * @param  null|PaymentFrequencyCode $paymentFrequencyCode
     * @return static
     */
    public function setPaymentFrequencyCode(?PaymentFrequencyCode $paymentFrequencyCode = null): static
    {
        $this->paymentFrequencyCode = $paymentFrequencyCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPaymentFrequencyCode(): static
    {
        $this->paymentFrequencyCode = null;

        return $this;
    }

    /**
     * @return null|EconomicOperatorRegistryURI
     */
    public function getEconomicOperatorRegistryURI(): ?EconomicOperatorRegistryURI
    {
        return $this->economicOperatorRegistryURI;
    }

    /**
     * @return EconomicOperatorRegistryURI
     */
    public function getEconomicOperatorRegistryURIWithCreate(): EconomicOperatorRegistryURI
    {
        $this->economicOperatorRegistryURI = is_null($this->economicOperatorRegistryURI) ? new EconomicOperatorRegistryURI() : $this->economicOperatorRegistryURI;

        return $this->economicOperatorRegistryURI;
    }

    /**
     * @param  null|EconomicOperatorRegistryURI $economicOperatorRegistryURI
     * @return static
     */
    public function setEconomicOperatorRegistryURI(
        ?EconomicOperatorRegistryURI $economicOperatorRegistryURI = null,
    ): static {
        $this->economicOperatorRegistryURI = $economicOperatorRegistryURI;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetEconomicOperatorRegistryURI(): static
    {
        $this->economicOperatorRegistryURI = null;

        return $this;
    }

    /**
     * @return null|bool
     */
    public function getRequiredCurriculaIndicator(): ?bool
    {
        return $this->requiredCurriculaIndicator;
    }

    /**
     * @param  null|bool $requiredCurriculaIndicator
     * @return static
     */
    public function setRequiredCurriculaIndicator(?bool $requiredCurriculaIndicator = null): static
    {
        $this->requiredCurriculaIndicator = $requiredCurriculaIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRequiredCurriculaIndicator(): static
    {
        $this->requiredCurriculaIndicator = null;

        return $this;
    }

    /**
     * @return null|bool
     */
    public function getOtherConditionsIndicator(): ?bool
    {
        return $this->otherConditionsIndicator;
    }

    /**
     * @param  null|bool $otherConditionsIndicator
     * @return static
     */
    public function setOtherConditionsIndicator(?bool $otherConditionsIndicator = null): static
    {
        $this->otherConditionsIndicator = $otherConditionsIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetOtherConditionsIndicator(): static
    {
        $this->otherConditionsIndicator = null;

        return $this;
    }

    /**
     * @return null|array<AdditionalConditions>
     */
    public function getAdditionalConditions(): ?array
    {
        return $this->additionalConditions;
    }

    /**
     * @param  null|array<AdditionalConditions> $additionalConditions
     * @return static
     */
    public function setAdditionalConditions(?array $additionalConditions = null): static
    {
        $this->additionalConditions = $additionalConditions;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAdditionalConditions(): static
    {
        $this->additionalConditions = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearAdditionalConditions(): static
    {
        $this->additionalConditions = [];

        return $this;
    }

    /**
     * @return null|AdditionalConditions
     */
    public function firstAdditionalConditions(): ?AdditionalConditions
    {
        $additionalConditions = $this->additionalConditions ?? [];
        $additionalConditions = reset($additionalConditions);

        if (false === $additionalConditions) {
            return null;
        }

        return $additionalConditions;
    }

    /**
     * @return null|AdditionalConditions
     */
    public function lastAdditionalConditions(): ?AdditionalConditions
    {
        $additionalConditions = $this->additionalConditions ?? [];
        $additionalConditions = end($additionalConditions);

        if (false === $additionalConditions) {
            return null;
        }

        return $additionalConditions;
    }

    /**
     * @param  AdditionalConditions $additionalConditions
     * @return static
     */
    public function addToAdditionalConditions(AdditionalConditions $additionalConditions): static
    {
        $this->additionalConditions[] = $additionalConditions;

        return $this;
    }

    /**
     * @return AdditionalConditions
     */
    public function addToAdditionalConditionsWithCreate(): AdditionalConditions
    {
        $this->addToadditionalConditions($additionalConditions = new AdditionalConditions());

        return $additionalConditions;
    }

    /**
     * @param  AdditionalConditions $additionalConditions
     * @return static
     */
    public function addOnceToAdditionalConditions(AdditionalConditions $additionalConditions): static
    {
        if (!is_array($this->additionalConditions)) {
            $this->additionalConditions = [];
        }

        $this->additionalConditions[0] = $additionalConditions;

        return $this;
    }

    /**
     * @return AdditionalConditions
     */
    public function addOnceToAdditionalConditionsWithCreate(): AdditionalConditions
    {
        if (!is_array($this->additionalConditions)) {
            $this->additionalConditions = [];
        }

        if ([] === $this->additionalConditions) {
            $this->addOnceToadditionalConditions(new AdditionalConditions());
        }

        return $this->additionalConditions[0];
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getLatestSecurityClearanceDate(): ?DateTimeInterface
    {
        return $this->latestSecurityClearanceDate;
    }

    /**
     * @param  null|DateTimeInterface $latestSecurityClearanceDate
     * @return static
     */
    public function setLatestSecurityClearanceDate(?DateTimeInterface $latestSecurityClearanceDate = null): static
    {
        $this->latestSecurityClearanceDate = $latestSecurityClearanceDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLatestSecurityClearanceDate(): static
    {
        $this->latestSecurityClearanceDate = null;

        return $this;
    }

    /**
     * @return null|DocumentationFeeAmount
     */
    public function getDocumentationFeeAmount(): ?DocumentationFeeAmount
    {
        return $this->documentationFeeAmount;
    }

    /**
     * @return DocumentationFeeAmount
     */
    public function getDocumentationFeeAmountWithCreate(): DocumentationFeeAmount
    {
        $this->documentationFeeAmount = is_null($this->documentationFeeAmount) ? new DocumentationFeeAmount() : $this->documentationFeeAmount;

        return $this->documentationFeeAmount;
    }

    /**
     * @param  null|DocumentationFeeAmount $documentationFeeAmount
     * @return static
     */
    public function setDocumentationFeeAmount(?DocumentationFeeAmount $documentationFeeAmount = null): static
    {
        $this->documentationFeeAmount = $documentationFeeAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDocumentationFeeAmount(): static
    {
        $this->documentationFeeAmount = null;

        return $this;
    }

    /**
     * @return null|array<PenaltyClause>
     */
    public function getPenaltyClause(): ?array
    {
        return $this->penaltyClause;
    }

    /**
     * @param  null|array<PenaltyClause> $penaltyClause
     * @return static
     */
    public function setPenaltyClause(?array $penaltyClause = null): static
    {
        $this->penaltyClause = $penaltyClause;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPenaltyClause(): static
    {
        $this->penaltyClause = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearPenaltyClause(): static
    {
        $this->penaltyClause = [];

        return $this;
    }

    /**
     * @return null|PenaltyClause
     */
    public function firstPenaltyClause(): ?PenaltyClause
    {
        $penaltyClause = $this->penaltyClause ?? [];
        $penaltyClause = reset($penaltyClause);

        if (false === $penaltyClause) {
            return null;
        }

        return $penaltyClause;
    }

    /**
     * @return null|PenaltyClause
     */
    public function lastPenaltyClause(): ?PenaltyClause
    {
        $penaltyClause = $this->penaltyClause ?? [];
        $penaltyClause = end($penaltyClause);

        if (false === $penaltyClause) {
            return null;
        }

        return $penaltyClause;
    }

    /**
     * @param  PenaltyClause $penaltyClause
     * @return static
     */
    public function addToPenaltyClause(PenaltyClause $penaltyClause): static
    {
        $this->penaltyClause[] = $penaltyClause;

        return $this;
    }

    /**
     * @return PenaltyClause
     */
    public function addToPenaltyClauseWithCreate(): PenaltyClause
    {
        $this->addTopenaltyClause($penaltyClause = new PenaltyClause());

        return $penaltyClause;
    }

    /**
     * @param  PenaltyClause $penaltyClause
     * @return static
     */
    public function addOnceToPenaltyClause(PenaltyClause $penaltyClause): static
    {
        if (!is_array($this->penaltyClause)) {
            $this->penaltyClause = [];
        }

        $this->penaltyClause[0] = $penaltyClause;

        return $this;
    }

    /**
     * @return PenaltyClause
     */
    public function addOnceToPenaltyClauseWithCreate(): PenaltyClause
    {
        if (!is_array($this->penaltyClause)) {
            $this->penaltyClause = [];
        }

        if ([] === $this->penaltyClause) {
            $this->addOnceTopenaltyClause(new PenaltyClause());
        }

        return $this->penaltyClause[0];
    }

    /**
     * @return null|array<RequiredFinancialGuarantee>
     */
    public function getRequiredFinancialGuarantee(): ?array
    {
        return $this->requiredFinancialGuarantee;
    }

    /**
     * @param  null|array<RequiredFinancialGuarantee> $requiredFinancialGuarantee
     * @return static
     */
    public function setRequiredFinancialGuarantee(?array $requiredFinancialGuarantee = null): static
    {
        $this->requiredFinancialGuarantee = $requiredFinancialGuarantee;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRequiredFinancialGuarantee(): static
    {
        $this->requiredFinancialGuarantee = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearRequiredFinancialGuarantee(): static
    {
        $this->requiredFinancialGuarantee = [];

        return $this;
    }

    /**
     * @return null|RequiredFinancialGuarantee
     */
    public function firstRequiredFinancialGuarantee(): ?RequiredFinancialGuarantee
    {
        $requiredFinancialGuarantee = $this->requiredFinancialGuarantee ?? [];
        $requiredFinancialGuarantee = reset($requiredFinancialGuarantee);

        if (false === $requiredFinancialGuarantee) {
            return null;
        }

        return $requiredFinancialGuarantee;
    }

    /**
     * @return null|RequiredFinancialGuarantee
     */
    public function lastRequiredFinancialGuarantee(): ?RequiredFinancialGuarantee
    {
        $requiredFinancialGuarantee = $this->requiredFinancialGuarantee ?? [];
        $requiredFinancialGuarantee = end($requiredFinancialGuarantee);

        if (false === $requiredFinancialGuarantee) {
            return null;
        }

        return $requiredFinancialGuarantee;
    }

    /**
     * @param  RequiredFinancialGuarantee $requiredFinancialGuarantee
     * @return static
     */
    public function addToRequiredFinancialGuarantee(RequiredFinancialGuarantee $requiredFinancialGuarantee): static
    {
        $this->requiredFinancialGuarantee[] = $requiredFinancialGuarantee;

        return $this;
    }

    /**
     * @return RequiredFinancialGuarantee
     */
    public function addToRequiredFinancialGuaranteeWithCreate(): RequiredFinancialGuarantee
    {
        $this->addTorequiredFinancialGuarantee($requiredFinancialGuarantee = new RequiredFinancialGuarantee());

        return $requiredFinancialGuarantee;
    }

    /**
     * @param  RequiredFinancialGuarantee $requiredFinancialGuarantee
     * @return static
     */
    public function addOnceToRequiredFinancialGuarantee(RequiredFinancialGuarantee $requiredFinancialGuarantee): static
    {
        if (!is_array($this->requiredFinancialGuarantee)) {
            $this->requiredFinancialGuarantee = [];
        }

        $this->requiredFinancialGuarantee[0] = $requiredFinancialGuarantee;

        return $this;
    }

    /**
     * @return RequiredFinancialGuarantee
     */
    public function addOnceToRequiredFinancialGuaranteeWithCreate(): RequiredFinancialGuarantee
    {
        if (!is_array($this->requiredFinancialGuarantee)) {
            $this->requiredFinancialGuarantee = [];
        }

        if ([] === $this->requiredFinancialGuarantee) {
            $this->addOnceTorequiredFinancialGuarantee(new RequiredFinancialGuarantee());
        }

        return $this->requiredFinancialGuarantee[0];
    }

    /**
     * @return null|ProcurementLegislationDocumentReference
     */
    public function getProcurementLegislationDocumentReference(): ?ProcurementLegislationDocumentReference
    {
        return $this->procurementLegislationDocumentReference;
    }

    /**
     * @return ProcurementLegislationDocumentReference
     */
    public function getProcurementLegislationDocumentReferenceWithCreate(): ProcurementLegislationDocumentReference
    {
        $this->procurementLegislationDocumentReference = is_null($this->procurementLegislationDocumentReference) ? new ProcurementLegislationDocumentReference() : $this->procurementLegislationDocumentReference;

        return $this->procurementLegislationDocumentReference;
    }

    /**
     * @param  null|ProcurementLegislationDocumentReference $procurementLegislationDocumentReference
     * @return static
     */
    public function setProcurementLegislationDocumentReference(
        ?ProcurementLegislationDocumentReference $procurementLegislationDocumentReference = null,
    ): static {
        $this->procurementLegislationDocumentReference = $procurementLegislationDocumentReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetProcurementLegislationDocumentReference(): static
    {
        $this->procurementLegislationDocumentReference = null;

        return $this;
    }

    /**
     * @return null|FiscalLegislationDocumentReference
     */
    public function getFiscalLegislationDocumentReference(): ?FiscalLegislationDocumentReference
    {
        return $this->fiscalLegislationDocumentReference;
    }

    /**
     * @return FiscalLegislationDocumentReference
     */
    public function getFiscalLegislationDocumentReferenceWithCreate(): FiscalLegislationDocumentReference
    {
        $this->fiscalLegislationDocumentReference = is_null($this->fiscalLegislationDocumentReference) ? new FiscalLegislationDocumentReference() : $this->fiscalLegislationDocumentReference;

        return $this->fiscalLegislationDocumentReference;
    }

    /**
     * @param  null|FiscalLegislationDocumentReference $fiscalLegislationDocumentReference
     * @return static
     */
    public function setFiscalLegislationDocumentReference(
        ?FiscalLegislationDocumentReference $fiscalLegislationDocumentReference = null,
    ): static {
        $this->fiscalLegislationDocumentReference = $fiscalLegislationDocumentReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetFiscalLegislationDocumentReference(): static
    {
        $this->fiscalLegislationDocumentReference = null;

        return $this;
    }

    /**
     * @return null|EnvironmentalLegislationDocumentReference
     */
    public function getEnvironmentalLegislationDocumentReference(): ?EnvironmentalLegislationDocumentReference
    {
        return $this->environmentalLegislationDocumentReference;
    }

    /**
     * @return EnvironmentalLegislationDocumentReference
     */
    public function getEnvironmentalLegislationDocumentReferenceWithCreate(): EnvironmentalLegislationDocumentReference
    {
        $this->environmentalLegislationDocumentReference = is_null($this->environmentalLegislationDocumentReference) ? new EnvironmentalLegislationDocumentReference() : $this->environmentalLegislationDocumentReference;

        return $this->environmentalLegislationDocumentReference;
    }

    /**
     * @param  null|EnvironmentalLegislationDocumentReference $environmentalLegislationDocumentReference
     * @return static
     */
    public function setEnvironmentalLegislationDocumentReference(
        ?EnvironmentalLegislationDocumentReference $environmentalLegislationDocumentReference = null,
    ): static {
        $this->environmentalLegislationDocumentReference = $environmentalLegislationDocumentReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetEnvironmentalLegislationDocumentReference(): static
    {
        $this->environmentalLegislationDocumentReference = null;

        return $this;
    }

    /**
     * @return null|EmploymentLegislationDocumentReference
     */
    public function getEmploymentLegislationDocumentReference(): ?EmploymentLegislationDocumentReference
    {
        return $this->employmentLegislationDocumentReference;
    }

    /**
     * @return EmploymentLegislationDocumentReference
     */
    public function getEmploymentLegislationDocumentReferenceWithCreate(): EmploymentLegislationDocumentReference
    {
        $this->employmentLegislationDocumentReference = is_null($this->employmentLegislationDocumentReference) ? new EmploymentLegislationDocumentReference() : $this->employmentLegislationDocumentReference;

        return $this->employmentLegislationDocumentReference;
    }

    /**
     * @param  null|EmploymentLegislationDocumentReference $employmentLegislationDocumentReference
     * @return static
     */
    public function setEmploymentLegislationDocumentReference(
        ?EmploymentLegislationDocumentReference $employmentLegislationDocumentReference = null,
    ): static {
        $this->employmentLegislationDocumentReference = $employmentLegislationDocumentReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetEmploymentLegislationDocumentReference(): static
    {
        $this->employmentLegislationDocumentReference = null;

        return $this;
    }

    /**
     * @return null|array<ContractualDocumentReference>
     */
    public function getContractualDocumentReference(): ?array
    {
        return $this->contractualDocumentReference;
    }

    /**
     * @param  null|array<ContractualDocumentReference> $contractualDocumentReference
     * @return static
     */
    public function setContractualDocumentReference(?array $contractualDocumentReference = null): static
    {
        $this->contractualDocumentReference = $contractualDocumentReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetContractualDocumentReference(): static
    {
        $this->contractualDocumentReference = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearContractualDocumentReference(): static
    {
        $this->contractualDocumentReference = [];

        return $this;
    }

    /**
     * @return null|ContractualDocumentReference
     */
    public function firstContractualDocumentReference(): ?ContractualDocumentReference
    {
        $contractualDocumentReference = $this->contractualDocumentReference ?? [];
        $contractualDocumentReference = reset($contractualDocumentReference);

        if (false === $contractualDocumentReference) {
            return null;
        }

        return $contractualDocumentReference;
    }

    /**
     * @return null|ContractualDocumentReference
     */
    public function lastContractualDocumentReference(): ?ContractualDocumentReference
    {
        $contractualDocumentReference = $this->contractualDocumentReference ?? [];
        $contractualDocumentReference = end($contractualDocumentReference);

        if (false === $contractualDocumentReference) {
            return null;
        }

        return $contractualDocumentReference;
    }

    /**
     * @param  ContractualDocumentReference $contractualDocumentReference
     * @return static
     */
    public function addToContractualDocumentReference(
        ContractualDocumentReference $contractualDocumentReference,
    ): static {
        $this->contractualDocumentReference[] = $contractualDocumentReference;

        return $this;
    }

    /**
     * @return ContractualDocumentReference
     */
    public function addToContractualDocumentReferenceWithCreate(): ContractualDocumentReference
    {
        $this->addTocontractualDocumentReference($contractualDocumentReference = new ContractualDocumentReference());

        return $contractualDocumentReference;
    }

    /**
     * @param  ContractualDocumentReference $contractualDocumentReference
     * @return static
     */
    public function addOnceToContractualDocumentReference(
        ContractualDocumentReference $contractualDocumentReference,
    ): static {
        if (!is_array($this->contractualDocumentReference)) {
            $this->contractualDocumentReference = [];
        }

        $this->contractualDocumentReference[0] = $contractualDocumentReference;

        return $this;
    }

    /**
     * @return ContractualDocumentReference
     */
    public function addOnceToContractualDocumentReferenceWithCreate(): ContractualDocumentReference
    {
        if (!is_array($this->contractualDocumentReference)) {
            $this->contractualDocumentReference = [];
        }

        if ([] === $this->contractualDocumentReference) {
            $this->addOnceTocontractualDocumentReference(new ContractualDocumentReference());
        }

        return $this->contractualDocumentReference[0];
    }

    /**
     * @return null|CallForTendersDocumentReference
     */
    public function getCallForTendersDocumentReference(): ?CallForTendersDocumentReference
    {
        return $this->callForTendersDocumentReference;
    }

    /**
     * @return CallForTendersDocumentReference
     */
    public function getCallForTendersDocumentReferenceWithCreate(): CallForTendersDocumentReference
    {
        $this->callForTendersDocumentReference = is_null($this->callForTendersDocumentReference) ? new CallForTendersDocumentReference() : $this->callForTendersDocumentReference;

        return $this->callForTendersDocumentReference;
    }

    /**
     * @param  null|CallForTendersDocumentReference $callForTendersDocumentReference
     * @return static
     */
    public function setCallForTendersDocumentReference(
        ?CallForTendersDocumentReference $callForTendersDocumentReference = null,
    ): static {
        $this->callForTendersDocumentReference = $callForTendersDocumentReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCallForTendersDocumentReference(): static
    {
        $this->callForTendersDocumentReference = null;

        return $this;
    }

    /**
     * @return null|WarrantyValidityPeriod
     */
    public function getWarrantyValidityPeriod(): ?WarrantyValidityPeriod
    {
        return $this->warrantyValidityPeriod;
    }

    /**
     * @return WarrantyValidityPeriod
     */
    public function getWarrantyValidityPeriodWithCreate(): WarrantyValidityPeriod
    {
        $this->warrantyValidityPeriod = is_null($this->warrantyValidityPeriod) ? new WarrantyValidityPeriod() : $this->warrantyValidityPeriod;

        return $this->warrantyValidityPeriod;
    }

    /**
     * @param  null|WarrantyValidityPeriod $warrantyValidityPeriod
     * @return static
     */
    public function setWarrantyValidityPeriod(?WarrantyValidityPeriod $warrantyValidityPeriod = null): static
    {
        $this->warrantyValidityPeriod = $warrantyValidityPeriod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetWarrantyValidityPeriod(): static
    {
        $this->warrantyValidityPeriod = null;

        return $this;
    }

    /**
     * @return null|array<PaymentTerms>
     */
    public function getPaymentTerms(): ?array
    {
        return $this->paymentTerms;
    }

    /**
     * @param  null|array<PaymentTerms> $paymentTerms
     * @return static
     */
    public function setPaymentTerms(?array $paymentTerms = null): static
    {
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
     * @return static
     */
    public function clearPaymentTerms(): static
    {
        $this->paymentTerms = [];

        return $this;
    }

    /**
     * @return null|PaymentTerms
     */
    public function firstPaymentTerms(): ?PaymentTerms
    {
        $paymentTerms = $this->paymentTerms ?? [];
        $paymentTerms = reset($paymentTerms);

        if (false === $paymentTerms) {
            return null;
        }

        return $paymentTerms;
    }

    /**
     * @return null|PaymentTerms
     */
    public function lastPaymentTerms(): ?PaymentTerms
    {
        $paymentTerms = $this->paymentTerms ?? [];
        $paymentTerms = end($paymentTerms);

        if (false === $paymentTerms) {
            return null;
        }

        return $paymentTerms;
    }

    /**
     * @param  PaymentTerms $paymentTerms
     * @return static
     */
    public function addToPaymentTerms(PaymentTerms $paymentTerms): static
    {
        $this->paymentTerms[] = $paymentTerms;

        return $this;
    }

    /**
     * @return PaymentTerms
     */
    public function addToPaymentTermsWithCreate(): PaymentTerms
    {
        $this->addTopaymentTerms($paymentTerms = new PaymentTerms());

        return $paymentTerms;
    }

    /**
     * @param  PaymentTerms $paymentTerms
     * @return static
     */
    public function addOnceToPaymentTerms(PaymentTerms $paymentTerms): static
    {
        if (!is_array($this->paymentTerms)) {
            $this->paymentTerms = [];
        }

        $this->paymentTerms[0] = $paymentTerms;

        return $this;
    }

    /**
     * @return PaymentTerms
     */
    public function addOnceToPaymentTermsWithCreate(): PaymentTerms
    {
        if (!is_array($this->paymentTerms)) {
            $this->paymentTerms = [];
        }

        if ([] === $this->paymentTerms) {
            $this->addOnceTopaymentTerms(new PaymentTerms());
        }

        return $this->paymentTerms[0];
    }

    /**
     * @return null|array<TendererQualificationRequest>
     */
    public function getTendererQualificationRequest(): ?array
    {
        return $this->tendererQualificationRequest;
    }

    /**
     * @param  null|array<TendererQualificationRequest> $tendererQualificationRequest
     * @return static
     */
    public function setTendererQualificationRequest(?array $tendererQualificationRequest = null): static
    {
        $this->tendererQualificationRequest = $tendererQualificationRequest;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTendererQualificationRequest(): static
    {
        $this->tendererQualificationRequest = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearTendererQualificationRequest(): static
    {
        $this->tendererQualificationRequest = [];

        return $this;
    }

    /**
     * @return null|TendererQualificationRequest
     */
    public function firstTendererQualificationRequest(): ?TendererQualificationRequest
    {
        $tendererQualificationRequest = $this->tendererQualificationRequest ?? [];
        $tendererQualificationRequest = reset($tendererQualificationRequest);

        if (false === $tendererQualificationRequest) {
            return null;
        }

        return $tendererQualificationRequest;
    }

    /**
     * @return null|TendererQualificationRequest
     */
    public function lastTendererQualificationRequest(): ?TendererQualificationRequest
    {
        $tendererQualificationRequest = $this->tendererQualificationRequest ?? [];
        $tendererQualificationRequest = end($tendererQualificationRequest);

        if (false === $tendererQualificationRequest) {
            return null;
        }

        return $tendererQualificationRequest;
    }

    /**
     * @param  TendererQualificationRequest $tendererQualificationRequest
     * @return static
     */
    public function addToTendererQualificationRequest(
        TendererQualificationRequest $tendererQualificationRequest,
    ): static {
        $this->tendererQualificationRequest[] = $tendererQualificationRequest;

        return $this;
    }

    /**
     * @return TendererQualificationRequest
     */
    public function addToTendererQualificationRequestWithCreate(): TendererQualificationRequest
    {
        $this->addTotendererQualificationRequest($tendererQualificationRequest = new TendererQualificationRequest());

        return $tendererQualificationRequest;
    }

    /**
     * @param  TendererQualificationRequest $tendererQualificationRequest
     * @return static
     */
    public function addOnceToTendererQualificationRequest(
        TendererQualificationRequest $tendererQualificationRequest,
    ): static {
        if (!is_array($this->tendererQualificationRequest)) {
            $this->tendererQualificationRequest = [];
        }

        $this->tendererQualificationRequest[0] = $tendererQualificationRequest;

        return $this;
    }

    /**
     * @return TendererQualificationRequest
     */
    public function addOnceToTendererQualificationRequestWithCreate(): TendererQualificationRequest
    {
        if (!is_array($this->tendererQualificationRequest)) {
            $this->tendererQualificationRequest = [];
        }

        if ([] === $this->tendererQualificationRequest) {
            $this->addOnceTotendererQualificationRequest(new TendererQualificationRequest());
        }

        return $this->tendererQualificationRequest[0];
    }

    /**
     * @return null|array<AllowedSubcontractTerms>
     */
    public function getAllowedSubcontractTerms(): ?array
    {
        return $this->allowedSubcontractTerms;
    }

    /**
     * @param  null|array<AllowedSubcontractTerms> $allowedSubcontractTerms
     * @return static
     */
    public function setAllowedSubcontractTerms(?array $allowedSubcontractTerms = null): static
    {
        $this->allowedSubcontractTerms = $allowedSubcontractTerms;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAllowedSubcontractTerms(): static
    {
        $this->allowedSubcontractTerms = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearAllowedSubcontractTerms(): static
    {
        $this->allowedSubcontractTerms = [];

        return $this;
    }

    /**
     * @return null|AllowedSubcontractTerms
     */
    public function firstAllowedSubcontractTerms(): ?AllowedSubcontractTerms
    {
        $allowedSubcontractTerms = $this->allowedSubcontractTerms ?? [];
        $allowedSubcontractTerms = reset($allowedSubcontractTerms);

        if (false === $allowedSubcontractTerms) {
            return null;
        }

        return $allowedSubcontractTerms;
    }

    /**
     * @return null|AllowedSubcontractTerms
     */
    public function lastAllowedSubcontractTerms(): ?AllowedSubcontractTerms
    {
        $allowedSubcontractTerms = $this->allowedSubcontractTerms ?? [];
        $allowedSubcontractTerms = end($allowedSubcontractTerms);

        if (false === $allowedSubcontractTerms) {
            return null;
        }

        return $allowedSubcontractTerms;
    }

    /**
     * @param  AllowedSubcontractTerms $allowedSubcontractTerms
     * @return static
     */
    public function addToAllowedSubcontractTerms(AllowedSubcontractTerms $allowedSubcontractTerms): static
    {
        $this->allowedSubcontractTerms[] = $allowedSubcontractTerms;

        return $this;
    }

    /**
     * @return AllowedSubcontractTerms
     */
    public function addToAllowedSubcontractTermsWithCreate(): AllowedSubcontractTerms
    {
        $this->addToallowedSubcontractTerms($allowedSubcontractTerms = new AllowedSubcontractTerms());

        return $allowedSubcontractTerms;
    }

    /**
     * @param  AllowedSubcontractTerms $allowedSubcontractTerms
     * @return static
     */
    public function addOnceToAllowedSubcontractTerms(AllowedSubcontractTerms $allowedSubcontractTerms): static
    {
        if (!is_array($this->allowedSubcontractTerms)) {
            $this->allowedSubcontractTerms = [];
        }

        $this->allowedSubcontractTerms[0] = $allowedSubcontractTerms;

        return $this;
    }

    /**
     * @return AllowedSubcontractTerms
     */
    public function addOnceToAllowedSubcontractTermsWithCreate(): AllowedSubcontractTerms
    {
        if (!is_array($this->allowedSubcontractTerms)) {
            $this->allowedSubcontractTerms = [];
        }

        if ([] === $this->allowedSubcontractTerms) {
            $this->addOnceToallowedSubcontractTerms(new AllowedSubcontractTerms());
        }

        return $this->allowedSubcontractTerms[0];
    }

    /**
     * @return null|array<TenderPreparation>
     */
    public function getTenderPreparation(): ?array
    {
        return $this->tenderPreparation;
    }

    /**
     * @param  null|array<TenderPreparation> $tenderPreparation
     * @return static
     */
    public function setTenderPreparation(?array $tenderPreparation = null): static
    {
        $this->tenderPreparation = $tenderPreparation;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTenderPreparation(): static
    {
        $this->tenderPreparation = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearTenderPreparation(): static
    {
        $this->tenderPreparation = [];

        return $this;
    }

    /**
     * @return null|TenderPreparation
     */
    public function firstTenderPreparation(): ?TenderPreparation
    {
        $tenderPreparation = $this->tenderPreparation ?? [];
        $tenderPreparation = reset($tenderPreparation);

        if (false === $tenderPreparation) {
            return null;
        }

        return $tenderPreparation;
    }

    /**
     * @return null|TenderPreparation
     */
    public function lastTenderPreparation(): ?TenderPreparation
    {
        $tenderPreparation = $this->tenderPreparation ?? [];
        $tenderPreparation = end($tenderPreparation);

        if (false === $tenderPreparation) {
            return null;
        }

        return $tenderPreparation;
    }

    /**
     * @param  TenderPreparation $tenderPreparation
     * @return static
     */
    public function addToTenderPreparation(TenderPreparation $tenderPreparation): static
    {
        $this->tenderPreparation[] = $tenderPreparation;

        return $this;
    }

    /**
     * @return TenderPreparation
     */
    public function addToTenderPreparationWithCreate(): TenderPreparation
    {
        $this->addTotenderPreparation($tenderPreparation = new TenderPreparation());

        return $tenderPreparation;
    }

    /**
     * @param  TenderPreparation $tenderPreparation
     * @return static
     */
    public function addOnceToTenderPreparation(TenderPreparation $tenderPreparation): static
    {
        if (!is_array($this->tenderPreparation)) {
            $this->tenderPreparation = [];
        }

        $this->tenderPreparation[0] = $tenderPreparation;

        return $this;
    }

    /**
     * @return TenderPreparation
     */
    public function addOnceToTenderPreparationWithCreate(): TenderPreparation
    {
        if (!is_array($this->tenderPreparation)) {
            $this->tenderPreparation = [];
        }

        if ([] === $this->tenderPreparation) {
            $this->addOnceTotenderPreparation(new TenderPreparation());
        }

        return $this->tenderPreparation[0];
    }

    /**
     * @return null|array<ContractExecutionRequirement>
     */
    public function getContractExecutionRequirement(): ?array
    {
        return $this->contractExecutionRequirement;
    }

    /**
     * @param  null|array<ContractExecutionRequirement> $contractExecutionRequirement
     * @return static
     */
    public function setContractExecutionRequirement(?array $contractExecutionRequirement = null): static
    {
        $this->contractExecutionRequirement = $contractExecutionRequirement;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetContractExecutionRequirement(): static
    {
        $this->contractExecutionRequirement = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearContractExecutionRequirement(): static
    {
        $this->contractExecutionRequirement = [];

        return $this;
    }

    /**
     * @return null|ContractExecutionRequirement
     */
    public function firstContractExecutionRequirement(): ?ContractExecutionRequirement
    {
        $contractExecutionRequirement = $this->contractExecutionRequirement ?? [];
        $contractExecutionRequirement = reset($contractExecutionRequirement);

        if (false === $contractExecutionRequirement) {
            return null;
        }

        return $contractExecutionRequirement;
    }

    /**
     * @return null|ContractExecutionRequirement
     */
    public function lastContractExecutionRequirement(): ?ContractExecutionRequirement
    {
        $contractExecutionRequirement = $this->contractExecutionRequirement ?? [];
        $contractExecutionRequirement = end($contractExecutionRequirement);

        if (false === $contractExecutionRequirement) {
            return null;
        }

        return $contractExecutionRequirement;
    }

    /**
     * @param  ContractExecutionRequirement $contractExecutionRequirement
     * @return static
     */
    public function addToContractExecutionRequirement(
        ContractExecutionRequirement $contractExecutionRequirement,
    ): static {
        $this->contractExecutionRequirement[] = $contractExecutionRequirement;

        return $this;
    }

    /**
     * @return ContractExecutionRequirement
     */
    public function addToContractExecutionRequirementWithCreate(): ContractExecutionRequirement
    {
        $this->addTocontractExecutionRequirement($contractExecutionRequirement = new ContractExecutionRequirement());

        return $contractExecutionRequirement;
    }

    /**
     * @param  ContractExecutionRequirement $contractExecutionRequirement
     * @return static
     */
    public function addOnceToContractExecutionRequirement(
        ContractExecutionRequirement $contractExecutionRequirement,
    ): static {
        if (!is_array($this->contractExecutionRequirement)) {
            $this->contractExecutionRequirement = [];
        }

        $this->contractExecutionRequirement[0] = $contractExecutionRequirement;

        return $this;
    }

    /**
     * @return ContractExecutionRequirement
     */
    public function addOnceToContractExecutionRequirementWithCreate(): ContractExecutionRequirement
    {
        if (!is_array($this->contractExecutionRequirement)) {
            $this->contractExecutionRequirement = [];
        }

        if ([] === $this->contractExecutionRequirement) {
            $this->addOnceTocontractExecutionRequirement(new ContractExecutionRequirement());
        }

        return $this->contractExecutionRequirement[0];
    }

    /**
     * @return null|AwardingTerms
     */
    public function getAwardingTerms(): ?AwardingTerms
    {
        return $this->awardingTerms;
    }

    /**
     * @return AwardingTerms
     */
    public function getAwardingTermsWithCreate(): AwardingTerms
    {
        $this->awardingTerms = is_null($this->awardingTerms) ? new AwardingTerms() : $this->awardingTerms;

        return $this->awardingTerms;
    }

    /**
     * @param  null|AwardingTerms $awardingTerms
     * @return static
     */
    public function setAwardingTerms(?AwardingTerms $awardingTerms = null): static
    {
        $this->awardingTerms = $awardingTerms;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAwardingTerms(): static
    {
        $this->awardingTerms = null;

        return $this;
    }

    /**
     * @return null|AdditionalInformationParty
     */
    public function getAdditionalInformationParty(): ?AdditionalInformationParty
    {
        return $this->additionalInformationParty;
    }

    /**
     * @return AdditionalInformationParty
     */
    public function getAdditionalInformationPartyWithCreate(): AdditionalInformationParty
    {
        $this->additionalInformationParty = is_null($this->additionalInformationParty) ? new AdditionalInformationParty() : $this->additionalInformationParty;

        return $this->additionalInformationParty;
    }

    /**
     * @param  null|AdditionalInformationParty $additionalInformationParty
     * @return static
     */
    public function setAdditionalInformationParty(
        ?AdditionalInformationParty $additionalInformationParty = null,
    ): static {
        $this->additionalInformationParty = $additionalInformationParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAdditionalInformationParty(): static
    {
        $this->additionalInformationParty = null;

        return $this;
    }

    /**
     * @return null|DocumentProviderParty
     */
    public function getDocumentProviderParty(): ?DocumentProviderParty
    {
        return $this->documentProviderParty;
    }

    /**
     * @return DocumentProviderParty
     */
    public function getDocumentProviderPartyWithCreate(): DocumentProviderParty
    {
        $this->documentProviderParty = is_null($this->documentProviderParty) ? new DocumentProviderParty() : $this->documentProviderParty;

        return $this->documentProviderParty;
    }

    /**
     * @param  null|DocumentProviderParty $documentProviderParty
     * @return static
     */
    public function setDocumentProviderParty(?DocumentProviderParty $documentProviderParty = null): static
    {
        $this->documentProviderParty = $documentProviderParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDocumentProviderParty(): static
    {
        $this->documentProviderParty = null;

        return $this;
    }

    /**
     * @return null|TenderRecipientParty
     */
    public function getTenderRecipientParty(): ?TenderRecipientParty
    {
        return $this->tenderRecipientParty;
    }

    /**
     * @return TenderRecipientParty
     */
    public function getTenderRecipientPartyWithCreate(): TenderRecipientParty
    {
        $this->tenderRecipientParty = is_null($this->tenderRecipientParty) ? new TenderRecipientParty() : $this->tenderRecipientParty;

        return $this->tenderRecipientParty;
    }

    /**
     * @param  null|TenderRecipientParty $tenderRecipientParty
     * @return static
     */
    public function setTenderRecipientParty(?TenderRecipientParty $tenderRecipientParty = null): static
    {
        $this->tenderRecipientParty = $tenderRecipientParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTenderRecipientParty(): static
    {
        $this->tenderRecipientParty = null;

        return $this;
    }

    /**
     * @return null|ContractResponsibleParty
     */
    public function getContractResponsibleParty(): ?ContractResponsibleParty
    {
        return $this->contractResponsibleParty;
    }

    /**
     * @return ContractResponsibleParty
     */
    public function getContractResponsiblePartyWithCreate(): ContractResponsibleParty
    {
        $this->contractResponsibleParty = is_null($this->contractResponsibleParty) ? new ContractResponsibleParty() : $this->contractResponsibleParty;

        return $this->contractResponsibleParty;
    }

    /**
     * @param  null|ContractResponsibleParty $contractResponsibleParty
     * @return static
     */
    public function setContractResponsibleParty(?ContractResponsibleParty $contractResponsibleParty = null): static
    {
        $this->contractResponsibleParty = $contractResponsibleParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetContractResponsibleParty(): static
    {
        $this->contractResponsibleParty = null;

        return $this;
    }

    /**
     * @return null|array<TenderEvaluationParty>
     */
    public function getTenderEvaluationParty(): ?array
    {
        return $this->tenderEvaluationParty;
    }

    /**
     * @param  null|array<TenderEvaluationParty> $tenderEvaluationParty
     * @return static
     */
    public function setTenderEvaluationParty(?array $tenderEvaluationParty = null): static
    {
        $this->tenderEvaluationParty = $tenderEvaluationParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTenderEvaluationParty(): static
    {
        $this->tenderEvaluationParty = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearTenderEvaluationParty(): static
    {
        $this->tenderEvaluationParty = [];

        return $this;
    }

    /**
     * @return null|TenderEvaluationParty
     */
    public function firstTenderEvaluationParty(): ?TenderEvaluationParty
    {
        $tenderEvaluationParty = $this->tenderEvaluationParty ?? [];
        $tenderEvaluationParty = reset($tenderEvaluationParty);

        if (false === $tenderEvaluationParty) {
            return null;
        }

        return $tenderEvaluationParty;
    }

    /**
     * @return null|TenderEvaluationParty
     */
    public function lastTenderEvaluationParty(): ?TenderEvaluationParty
    {
        $tenderEvaluationParty = $this->tenderEvaluationParty ?? [];
        $tenderEvaluationParty = end($tenderEvaluationParty);

        if (false === $tenderEvaluationParty) {
            return null;
        }

        return $tenderEvaluationParty;
    }

    /**
     * @param  TenderEvaluationParty $tenderEvaluationParty
     * @return static
     */
    public function addToTenderEvaluationParty(TenderEvaluationParty $tenderEvaluationParty): static
    {
        $this->tenderEvaluationParty[] = $tenderEvaluationParty;

        return $this;
    }

    /**
     * @return TenderEvaluationParty
     */
    public function addToTenderEvaluationPartyWithCreate(): TenderEvaluationParty
    {
        $this->addTotenderEvaluationParty($tenderEvaluationParty = new TenderEvaluationParty());

        return $tenderEvaluationParty;
    }

    /**
     * @param  TenderEvaluationParty $tenderEvaluationParty
     * @return static
     */
    public function addOnceToTenderEvaluationParty(TenderEvaluationParty $tenderEvaluationParty): static
    {
        if (!is_array($this->tenderEvaluationParty)) {
            $this->tenderEvaluationParty = [];
        }

        $this->tenderEvaluationParty[0] = $tenderEvaluationParty;

        return $this;
    }

    /**
     * @return TenderEvaluationParty
     */
    public function addOnceToTenderEvaluationPartyWithCreate(): TenderEvaluationParty
    {
        if (!is_array($this->tenderEvaluationParty)) {
            $this->tenderEvaluationParty = [];
        }

        if ([] === $this->tenderEvaluationParty) {
            $this->addOnceTotenderEvaluationParty(new TenderEvaluationParty());
        }

        return $this->tenderEvaluationParty[0];
    }

    /**
     * @return null|TenderValidityPeriod
     */
    public function getTenderValidityPeriod(): ?TenderValidityPeriod
    {
        return $this->tenderValidityPeriod;
    }

    /**
     * @return TenderValidityPeriod
     */
    public function getTenderValidityPeriodWithCreate(): TenderValidityPeriod
    {
        $this->tenderValidityPeriod = is_null($this->tenderValidityPeriod) ? new TenderValidityPeriod() : $this->tenderValidityPeriod;

        return $this->tenderValidityPeriod;
    }

    /**
     * @param  null|TenderValidityPeriod $tenderValidityPeriod
     * @return static
     */
    public function setTenderValidityPeriod(?TenderValidityPeriod $tenderValidityPeriod = null): static
    {
        $this->tenderValidityPeriod = $tenderValidityPeriod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTenderValidityPeriod(): static
    {
        $this->tenderValidityPeriod = null;

        return $this;
    }

    /**
     * @return null|ContractAcceptancePeriod
     */
    public function getContractAcceptancePeriod(): ?ContractAcceptancePeriod
    {
        return $this->contractAcceptancePeriod;
    }

    /**
     * @return ContractAcceptancePeriod
     */
    public function getContractAcceptancePeriodWithCreate(): ContractAcceptancePeriod
    {
        $this->contractAcceptancePeriod = is_null($this->contractAcceptancePeriod) ? new ContractAcceptancePeriod() : $this->contractAcceptancePeriod;

        return $this->contractAcceptancePeriod;
    }

    /**
     * @param  null|ContractAcceptancePeriod $contractAcceptancePeriod
     * @return static
     */
    public function setContractAcceptancePeriod(?ContractAcceptancePeriod $contractAcceptancePeriod = null): static
    {
        $this->contractAcceptancePeriod = $contractAcceptancePeriod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetContractAcceptancePeriod(): static
    {
        $this->contractAcceptancePeriod = null;

        return $this;
    }

    /**
     * @return null|AppealTerms
     */
    public function getAppealTerms(): ?AppealTerms
    {
        return $this->appealTerms;
    }

    /**
     * @return AppealTerms
     */
    public function getAppealTermsWithCreate(): AppealTerms
    {
        $this->appealTerms = is_null($this->appealTerms) ? new AppealTerms() : $this->appealTerms;

        return $this->appealTerms;
    }

    /**
     * @param  null|AppealTerms $appealTerms
     * @return static
     */
    public function setAppealTerms(?AppealTerms $appealTerms = null): static
    {
        $this->appealTerms = $appealTerms;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAppealTerms(): static
    {
        $this->appealTerms = null;

        return $this;
    }

    /**
     * @return null|array<Language>
     */
    public function getLanguage(): ?array
    {
        return $this->language;
    }

    /**
     * @param  null|array<Language> $language
     * @return static
     */
    public function setLanguage(?array $language = null): static
    {
        $this->language = $language;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLanguage(): static
    {
        $this->language = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearLanguage(): static
    {
        $this->language = [];

        return $this;
    }

    /**
     * @return null|Language
     */
    public function firstLanguage(): ?Language
    {
        $language = $this->language ?? [];
        $language = reset($language);

        if (false === $language) {
            return null;
        }

        return $language;
    }

    /**
     * @return null|Language
     */
    public function lastLanguage(): ?Language
    {
        $language = $this->language ?? [];
        $language = end($language);

        if (false === $language) {
            return null;
        }

        return $language;
    }

    /**
     * @param  Language $language
     * @return static
     */
    public function addToLanguage(Language $language): static
    {
        $this->language[] = $language;

        return $this;
    }

    /**
     * @return Language
     */
    public function addToLanguageWithCreate(): Language
    {
        $this->addTolanguage($language = new Language());

        return $language;
    }

    /**
     * @param  Language $language
     * @return static
     */
    public function addOnceToLanguage(Language $language): static
    {
        if (!is_array($this->language)) {
            $this->language = [];
        }

        $this->language[0] = $language;

        return $this;
    }

    /**
     * @return Language
     */
    public function addOnceToLanguageWithCreate(): Language
    {
        if (!is_array($this->language)) {
            $this->language = [];
        }

        if ([] === $this->language) {
            $this->addOnceTolanguage(new Language());
        }

        return $this->language[0];
    }

    /**
     * @return null|array<BudgetAccountLine>
     */
    public function getBudgetAccountLine(): ?array
    {
        return $this->budgetAccountLine;
    }

    /**
     * @param  null|array<BudgetAccountLine> $budgetAccountLine
     * @return static
     */
    public function setBudgetAccountLine(?array $budgetAccountLine = null): static
    {
        $this->budgetAccountLine = $budgetAccountLine;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetBudgetAccountLine(): static
    {
        $this->budgetAccountLine = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearBudgetAccountLine(): static
    {
        $this->budgetAccountLine = [];

        return $this;
    }

    /**
     * @return null|BudgetAccountLine
     */
    public function firstBudgetAccountLine(): ?BudgetAccountLine
    {
        $budgetAccountLine = $this->budgetAccountLine ?? [];
        $budgetAccountLine = reset($budgetAccountLine);

        if (false === $budgetAccountLine) {
            return null;
        }

        return $budgetAccountLine;
    }

    /**
     * @return null|BudgetAccountLine
     */
    public function lastBudgetAccountLine(): ?BudgetAccountLine
    {
        $budgetAccountLine = $this->budgetAccountLine ?? [];
        $budgetAccountLine = end($budgetAccountLine);

        if (false === $budgetAccountLine) {
            return null;
        }

        return $budgetAccountLine;
    }

    /**
     * @param  BudgetAccountLine $budgetAccountLine
     * @return static
     */
    public function addToBudgetAccountLine(BudgetAccountLine $budgetAccountLine): static
    {
        $this->budgetAccountLine[] = $budgetAccountLine;

        return $this;
    }

    /**
     * @return BudgetAccountLine
     */
    public function addToBudgetAccountLineWithCreate(): BudgetAccountLine
    {
        $this->addTobudgetAccountLine($budgetAccountLine = new BudgetAccountLine());

        return $budgetAccountLine;
    }

    /**
     * @param  BudgetAccountLine $budgetAccountLine
     * @return static
     */
    public function addOnceToBudgetAccountLine(BudgetAccountLine $budgetAccountLine): static
    {
        if (!is_array($this->budgetAccountLine)) {
            $this->budgetAccountLine = [];
        }

        $this->budgetAccountLine[0] = $budgetAccountLine;

        return $this;
    }

    /**
     * @return BudgetAccountLine
     */
    public function addOnceToBudgetAccountLineWithCreate(): BudgetAccountLine
    {
        if (!is_array($this->budgetAccountLine)) {
            $this->budgetAccountLine = [];
        }

        if ([] === $this->budgetAccountLine) {
            $this->addOnceTobudgetAccountLine(new BudgetAccountLine());
        }

        return $this->budgetAccountLine[0];
    }

    /**
     * @return null|ReplacedNoticeDocumentReference
     */
    public function getReplacedNoticeDocumentReference(): ?ReplacedNoticeDocumentReference
    {
        return $this->replacedNoticeDocumentReference;
    }

    /**
     * @return ReplacedNoticeDocumentReference
     */
    public function getReplacedNoticeDocumentReferenceWithCreate(): ReplacedNoticeDocumentReference
    {
        $this->replacedNoticeDocumentReference = is_null($this->replacedNoticeDocumentReference) ? new ReplacedNoticeDocumentReference() : $this->replacedNoticeDocumentReference;

        return $this->replacedNoticeDocumentReference;
    }

    /**
     * @param  null|ReplacedNoticeDocumentReference $replacedNoticeDocumentReference
     * @return static
     */
    public function setReplacedNoticeDocumentReference(
        ?ReplacedNoticeDocumentReference $replacedNoticeDocumentReference = null,
    ): static {
        $this->replacedNoticeDocumentReference = $replacedNoticeDocumentReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetReplacedNoticeDocumentReference(): static
    {
        $this->replacedNoticeDocumentReference = null;

        return $this;
    }
}
