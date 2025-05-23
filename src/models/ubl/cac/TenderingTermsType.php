<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\AcceptedVariantsDescription;
use horstoeko\invoicesuite\models\ubl\cbc\AdditionalConditions;
use horstoeko\invoicesuite\models\ubl\cbc\AwardingMethodTypeCode;
use horstoeko\invoicesuite\models\ubl\cbc\DocumentationFeeAmount;
use horstoeko\invoicesuite\models\ubl\cbc\EconomicOperatorRegistryURI;
use horstoeko\invoicesuite\models\ubl\cbc\FundingProgram;
use horstoeko\invoicesuite\models\ubl\cbc\FundingProgramCode;
use horstoeko\invoicesuite\models\ubl\cbc\MaximumAdvertisementAmount;
use horstoeko\invoicesuite\models\ubl\cbc\MaximumVariantQuantity;
use horstoeko\invoicesuite\models\ubl\cbc\Note;
use horstoeko\invoicesuite\models\ubl\cbc\PaymentFrequencyCode;
use horstoeko\invoicesuite\models\ubl\cbc\PriceEvaluationCode;
use horstoeko\invoicesuite\models\ubl\cbc\PriceRevisionFormulaDescription;

class TenderingTermsType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\AwardingMethodTypeCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\AwardingMethodTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("AwardingMethodTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAwardingMethodTypeCode", setter="setAwardingMethodTypeCode")
     */
    private $awardingMethodTypeCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\PriceEvaluationCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\PriceEvaluationCode")
     * @JMS\Expose
     * @JMS\SerializedName("PriceEvaluationCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPriceEvaluationCode", setter="setPriceEvaluationCode")
     */
    private $priceEvaluationCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\MaximumVariantQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\MaximumVariantQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("MaximumVariantQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMaximumVariantQuantity", setter="setMaximumVariantQuantity")
     */
    private $maximumVariantQuantity;

    /**
     * @var bool|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("VariantConstraintIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getVariantConstraintIndicator", setter="setVariantConstraintIndicator")
     */
    private $variantConstraintIndicator;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\AcceptedVariantsDescription>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\AcceptedVariantsDescription>")
     * @JMS\Expose
     * @JMS\SerializedName("AcceptedVariantsDescription")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="AcceptedVariantsDescription", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getAcceptedVariantsDescription", setter="setAcceptedVariantsDescription")
     */
    private $acceptedVariantsDescription;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\PriceRevisionFormulaDescription>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\PriceRevisionFormulaDescription>")
     * @JMS\Expose
     * @JMS\SerializedName("PriceRevisionFormulaDescription")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PriceRevisionFormulaDescription", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getPriceRevisionFormulaDescription", setter="setPriceRevisionFormulaDescription")
     */
    private $priceRevisionFormulaDescription;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\FundingProgramCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\FundingProgramCode")
     * @JMS\Expose
     * @JMS\SerializedName("FundingProgramCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getFundingProgramCode", setter="setFundingProgramCode")
     */
    private $fundingProgramCode;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\FundingProgram>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\FundingProgram>")
     * @JMS\Expose
     * @JMS\SerializedName("FundingProgram")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="FundingProgram", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getFundingProgram", setter="setFundingProgram")
     */
    private $fundingProgram;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\MaximumAdvertisementAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\MaximumAdvertisementAmount")
     * @JMS\Expose
     * @JMS\SerializedName("MaximumAdvertisementAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMaximumAdvertisementAmount", setter="setMaximumAdvertisementAmount")
     */
    private $maximumAdvertisementAmount;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\Note>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\Note>")
     * @JMS\Expose
     * @JMS\SerializedName("Note")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Note", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getNote", setter="setNote")
     */
    private $note;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\PaymentFrequencyCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\PaymentFrequencyCode")
     * @JMS\Expose
     * @JMS\SerializedName("PaymentFrequencyCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPaymentFrequencyCode", setter="setPaymentFrequencyCode")
     */
    private $paymentFrequencyCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\EconomicOperatorRegistryURI|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\EconomicOperatorRegistryURI")
     * @JMS\Expose
     * @JMS\SerializedName("EconomicOperatorRegistryURI")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEconomicOperatorRegistryURI", setter="setEconomicOperatorRegistryURI")
     */
    private $economicOperatorRegistryURI;

    /**
     * @var bool|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("RequiredCurriculaIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRequiredCurriculaIndicator", setter="setRequiredCurriculaIndicator")
     */
    private $requiredCurriculaIndicator;

    /**
     * @var bool|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("OtherConditionsIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOtherConditionsIndicator", setter="setOtherConditionsIndicator")
     */
    private $otherConditionsIndicator;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\AdditionalConditions>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\AdditionalConditions>")
     * @JMS\Expose
     * @JMS\SerializedName("AdditionalConditions")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="AdditionalConditions", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getAdditionalConditions", setter="setAdditionalConditions")
     */
    private $additionalConditions;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("LatestSecurityClearanceDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLatestSecurityClearanceDate", setter="setLatestSecurityClearanceDate")
     */
    private $latestSecurityClearanceDate;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\DocumentationFeeAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\DocumentationFeeAmount")
     * @JMS\Expose
     * @JMS\SerializedName("DocumentationFeeAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDocumentationFeeAmount", setter="setDocumentationFeeAmount")
     */
    private $documentationFeeAmount;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\PenaltyClause>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\PenaltyClause>")
     * @JMS\Expose
     * @JMS\SerializedName("PenaltyClause")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PenaltyClause", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getPenaltyClause", setter="setPenaltyClause")
     */
    private $penaltyClause;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\RequiredFinancialGuarantee>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\RequiredFinancialGuarantee>")
     * @JMS\Expose
     * @JMS\SerializedName("RequiredFinancialGuarantee")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="RequiredFinancialGuarantee", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getRequiredFinancialGuarantee", setter="setRequiredFinancialGuarantee")
     */
    private $requiredFinancialGuarantee;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\ProcurementLegislationDocumentReference|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\ProcurementLegislationDocumentReference")
     * @JMS\Expose
     * @JMS\SerializedName("ProcurementLegislationDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getProcurementLegislationDocumentReference", setter="setProcurementLegislationDocumentReference")
     */
    private $procurementLegislationDocumentReference;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\FiscalLegislationDocumentReference|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\FiscalLegislationDocumentReference")
     * @JMS\Expose
     * @JMS\SerializedName("FiscalLegislationDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getFiscalLegislationDocumentReference", setter="setFiscalLegislationDocumentReference")
     */
    private $fiscalLegislationDocumentReference;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\EnvironmentalLegislationDocumentReference|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\EnvironmentalLegislationDocumentReference")
     * @JMS\Expose
     * @JMS\SerializedName("EnvironmentalLegislationDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEnvironmentalLegislationDocumentReference", setter="setEnvironmentalLegislationDocumentReference")
     */
    private $environmentalLegislationDocumentReference;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\EmploymentLegislationDocumentReference|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\EmploymentLegislationDocumentReference")
     * @JMS\Expose
     * @JMS\SerializedName("EmploymentLegislationDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEmploymentLegislationDocumentReference", setter="setEmploymentLegislationDocumentReference")
     */
    private $employmentLegislationDocumentReference;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\ContractualDocumentReference>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\ContractualDocumentReference>")
     * @JMS\Expose
     * @JMS\SerializedName("ContractualDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ContractualDocumentReference", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getContractualDocumentReference", setter="setContractualDocumentReference")
     */
    private $contractualDocumentReference;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\CallForTendersDocumentReference|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\CallForTendersDocumentReference")
     * @JMS\Expose
     * @JMS\SerializedName("CallForTendersDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCallForTendersDocumentReference", setter="setCallForTendersDocumentReference")
     */
    private $callForTendersDocumentReference;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\WarrantyValidityPeriod|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\WarrantyValidityPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("WarrantyValidityPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getWarrantyValidityPeriod", setter="setWarrantyValidityPeriod")
     */
    private $warrantyValidityPeriod;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\PaymentTerms>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\PaymentTerms>")
     * @JMS\Expose
     * @JMS\SerializedName("PaymentTerms")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PaymentTerms", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getPaymentTerms", setter="setPaymentTerms")
     */
    private $paymentTerms;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\TendererQualificationRequest>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\TendererQualificationRequest>")
     * @JMS\Expose
     * @JMS\SerializedName("TendererQualificationRequest")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TendererQualificationRequest", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getTendererQualificationRequest", setter="setTendererQualificationRequest")
     */
    private $tendererQualificationRequest;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\AllowedSubcontractTerms>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\AllowedSubcontractTerms>")
     * @JMS\Expose
     * @JMS\SerializedName("AllowedSubcontractTerms")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="AllowedSubcontractTerms", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getAllowedSubcontractTerms", setter="setAllowedSubcontractTerms")
     */
    private $allowedSubcontractTerms;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\TenderPreparation>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\TenderPreparation>")
     * @JMS\Expose
     * @JMS\SerializedName("TenderPreparation")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TenderPreparation", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getTenderPreparation", setter="setTenderPreparation")
     */
    private $tenderPreparation;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\ContractExecutionRequirement>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\ContractExecutionRequirement>")
     * @JMS\Expose
     * @JMS\SerializedName("ContractExecutionRequirement")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ContractExecutionRequirement", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getContractExecutionRequirement", setter="setContractExecutionRequirement")
     */
    private $contractExecutionRequirement;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\AwardingTerms|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\AwardingTerms")
     * @JMS\Expose
     * @JMS\SerializedName("AwardingTerms")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAwardingTerms", setter="setAwardingTerms")
     */
    private $awardingTerms;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\AdditionalInformationParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\AdditionalInformationParty")
     * @JMS\Expose
     * @JMS\SerializedName("AdditionalInformationParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAdditionalInformationParty", setter="setAdditionalInformationParty")
     */
    private $additionalInformationParty;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\DocumentProviderParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\DocumentProviderParty")
     * @JMS\Expose
     * @JMS\SerializedName("DocumentProviderParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDocumentProviderParty", setter="setDocumentProviderParty")
     */
    private $documentProviderParty;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\TenderRecipientParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\TenderRecipientParty")
     * @JMS\Expose
     * @JMS\SerializedName("TenderRecipientParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTenderRecipientParty", setter="setTenderRecipientParty")
     */
    private $tenderRecipientParty;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\ContractResponsibleParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\ContractResponsibleParty")
     * @JMS\Expose
     * @JMS\SerializedName("ContractResponsibleParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getContractResponsibleParty", setter="setContractResponsibleParty")
     */
    private $contractResponsibleParty;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\TenderEvaluationParty>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\TenderEvaluationParty>")
     * @JMS\Expose
     * @JMS\SerializedName("TenderEvaluationParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TenderEvaluationParty", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getTenderEvaluationParty", setter="setTenderEvaluationParty")
     */
    private $tenderEvaluationParty;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\TenderValidityPeriod|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\TenderValidityPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("TenderValidityPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTenderValidityPeriod", setter="setTenderValidityPeriod")
     */
    private $tenderValidityPeriod;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\ContractAcceptancePeriod|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\ContractAcceptancePeriod")
     * @JMS\Expose
     * @JMS\SerializedName("ContractAcceptancePeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getContractAcceptancePeriod", setter="setContractAcceptancePeriod")
     */
    private $contractAcceptancePeriod;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\AppealTerms|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\AppealTerms")
     * @JMS\Expose
     * @JMS\SerializedName("AppealTerms")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAppealTerms", setter="setAppealTerms")
     */
    private $appealTerms;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\Language>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\Language>")
     * @JMS\Expose
     * @JMS\SerializedName("Language")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Language", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getLanguage", setter="setLanguage")
     */
    private $language;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\BudgetAccountLine>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\BudgetAccountLine>")
     * @JMS\Expose
     * @JMS\SerializedName("BudgetAccountLine")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="BudgetAccountLine", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getBudgetAccountLine", setter="setBudgetAccountLine")
     */
    private $budgetAccountLine;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\ReplacedNoticeDocumentReference|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\ReplacedNoticeDocumentReference")
     * @JMS\Expose
     * @JMS\SerializedName("ReplacedNoticeDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getReplacedNoticeDocumentReference", setter="setReplacedNoticeDocumentReference")
     */
    private $replacedNoticeDocumentReference;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\AwardingMethodTypeCode|null
     */
    public function getAwardingMethodTypeCode(): ?AwardingMethodTypeCode
    {
        return $this->awardingMethodTypeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\AwardingMethodTypeCode
     */
    public function getAwardingMethodTypeCodeWithCreate(): AwardingMethodTypeCode
    {
        $this->awardingMethodTypeCode = is_null($this->awardingMethodTypeCode) ? new AwardingMethodTypeCode() : $this->awardingMethodTypeCode;

        return $this->awardingMethodTypeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\AwardingMethodTypeCode|null $awardingMethodTypeCode
     * @return self
     */
    public function setAwardingMethodTypeCode(?AwardingMethodTypeCode $awardingMethodTypeCode = null): self
    {
        $this->awardingMethodTypeCode = $awardingMethodTypeCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PriceEvaluationCode|null
     */
    public function getPriceEvaluationCode(): ?PriceEvaluationCode
    {
        return $this->priceEvaluationCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PriceEvaluationCode
     */
    public function getPriceEvaluationCodeWithCreate(): PriceEvaluationCode
    {
        $this->priceEvaluationCode = is_null($this->priceEvaluationCode) ? new PriceEvaluationCode() : $this->priceEvaluationCode;

        return $this->priceEvaluationCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\PriceEvaluationCode|null $priceEvaluationCode
     * @return self
     */
    public function setPriceEvaluationCode(?PriceEvaluationCode $priceEvaluationCode = null): self
    {
        $this->priceEvaluationCode = $priceEvaluationCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MaximumVariantQuantity|null
     */
    public function getMaximumVariantQuantity(): ?MaximumVariantQuantity
    {
        return $this->maximumVariantQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MaximumVariantQuantity
     */
    public function getMaximumVariantQuantityWithCreate(): MaximumVariantQuantity
    {
        $this->maximumVariantQuantity = is_null($this->maximumVariantQuantity) ? new MaximumVariantQuantity() : $this->maximumVariantQuantity;

        return $this->maximumVariantQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\MaximumVariantQuantity|null $maximumVariantQuantity
     * @return self
     */
    public function setMaximumVariantQuantity(?MaximumVariantQuantity $maximumVariantQuantity = null): self
    {
        $this->maximumVariantQuantity = $maximumVariantQuantity;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getVariantConstraintIndicator(): ?bool
    {
        return $this->variantConstraintIndicator;
    }

    /**
     * @param bool|null $variantConstraintIndicator
     * @return self
     */
    public function setVariantConstraintIndicator(?bool $variantConstraintIndicator = null): self
    {
        $this->variantConstraintIndicator = $variantConstraintIndicator;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\AcceptedVariantsDescription>|null
     */
    public function getAcceptedVariantsDescription(): ?array
    {
        return $this->acceptedVariantsDescription;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\AcceptedVariantsDescription>|null $acceptedVariantsDescription
     * @return self
     */
    public function setAcceptedVariantsDescription(?array $acceptedVariantsDescription = null): self
    {
        $this->acceptedVariantsDescription = $acceptedVariantsDescription;

        return $this;
    }

    /**
     * @return self
     */
    public function clearAcceptedVariantsDescription(): self
    {
        $this->acceptedVariantsDescription = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\AcceptedVariantsDescription $acceptedVariantsDescription
     * @return self
     */
    public function addToAcceptedVariantsDescription(AcceptedVariantsDescription $acceptedVariantsDescription): self
    {
        $this->acceptedVariantsDescription[] = $acceptedVariantsDescription;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\AcceptedVariantsDescription
     */
    public function addToAcceptedVariantsDescriptionWithCreate(): AcceptedVariantsDescription
    {
        $this->addToacceptedVariantsDescription($acceptedVariantsDescription = new AcceptedVariantsDescription());

        return $acceptedVariantsDescription;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\AcceptedVariantsDescription $acceptedVariantsDescription
     * @return self
     */
    public function addOnceToAcceptedVariantsDescription(
        AcceptedVariantsDescription $acceptedVariantsDescription,
    ): self {
        if (!is_array($this->acceptedVariantsDescription)) {
            $this->acceptedVariantsDescription = [];
        }

        $this->acceptedVariantsDescription[0] = $acceptedVariantsDescription;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\AcceptedVariantsDescription
     */
    public function addOnceToAcceptedVariantsDescriptionWithCreate(): AcceptedVariantsDescription
    {
        if (!is_array($this->acceptedVariantsDescription)) {
            $this->acceptedVariantsDescription = [];
        }

        if ($this->acceptedVariantsDescription === []) {
            $this->addOnceToacceptedVariantsDescription(new AcceptedVariantsDescription());
        }

        return $this->acceptedVariantsDescription[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\PriceRevisionFormulaDescription>|null
     */
    public function getPriceRevisionFormulaDescription(): ?array
    {
        return $this->priceRevisionFormulaDescription;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\PriceRevisionFormulaDescription>|null $priceRevisionFormulaDescription
     * @return self
     */
    public function setPriceRevisionFormulaDescription(?array $priceRevisionFormulaDescription = null): self
    {
        $this->priceRevisionFormulaDescription = $priceRevisionFormulaDescription;

        return $this;
    }

    /**
     * @return self
     */
    public function clearPriceRevisionFormulaDescription(): self
    {
        $this->priceRevisionFormulaDescription = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\PriceRevisionFormulaDescription $priceRevisionFormulaDescription
     * @return self
     */
    public function addToPriceRevisionFormulaDescription(
        PriceRevisionFormulaDescription $priceRevisionFormulaDescription,
    ): self {
        $this->priceRevisionFormulaDescription[] = $priceRevisionFormulaDescription;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PriceRevisionFormulaDescription
     */
    public function addToPriceRevisionFormulaDescriptionWithCreate(): PriceRevisionFormulaDescription
    {
        $this->addTopriceRevisionFormulaDescription($priceRevisionFormulaDescription = new PriceRevisionFormulaDescription());

        return $priceRevisionFormulaDescription;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\PriceRevisionFormulaDescription $priceRevisionFormulaDescription
     * @return self
     */
    public function addOnceToPriceRevisionFormulaDescription(
        PriceRevisionFormulaDescription $priceRevisionFormulaDescription,
    ): self {
        if (!is_array($this->priceRevisionFormulaDescription)) {
            $this->priceRevisionFormulaDescription = [];
        }

        $this->priceRevisionFormulaDescription[0] = $priceRevisionFormulaDescription;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PriceRevisionFormulaDescription
     */
    public function addOnceToPriceRevisionFormulaDescriptionWithCreate(): PriceRevisionFormulaDescription
    {
        if (!is_array($this->priceRevisionFormulaDescription)) {
            $this->priceRevisionFormulaDescription = [];
        }

        if ($this->priceRevisionFormulaDescription === []) {
            $this->addOnceTopriceRevisionFormulaDescription(new PriceRevisionFormulaDescription());
        }

        return $this->priceRevisionFormulaDescription[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\FundingProgramCode|null
     */
    public function getFundingProgramCode(): ?FundingProgramCode
    {
        return $this->fundingProgramCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\FundingProgramCode
     */
    public function getFundingProgramCodeWithCreate(): FundingProgramCode
    {
        $this->fundingProgramCode = is_null($this->fundingProgramCode) ? new FundingProgramCode() : $this->fundingProgramCode;

        return $this->fundingProgramCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\FundingProgramCode|null $fundingProgramCode
     * @return self
     */
    public function setFundingProgramCode(?FundingProgramCode $fundingProgramCode = null): self
    {
        $this->fundingProgramCode = $fundingProgramCode;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\FundingProgram>|null
     */
    public function getFundingProgram(): ?array
    {
        return $this->fundingProgram;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\FundingProgram>|null $fundingProgram
     * @return self
     */
    public function setFundingProgram(?array $fundingProgram = null): self
    {
        $this->fundingProgram = $fundingProgram;

        return $this;
    }

    /**
     * @return self
     */
    public function clearFundingProgram(): self
    {
        $this->fundingProgram = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\FundingProgram $fundingProgram
     * @return self
     */
    public function addToFundingProgram(FundingProgram $fundingProgram): self
    {
        $this->fundingProgram[] = $fundingProgram;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\FundingProgram
     */
    public function addToFundingProgramWithCreate(): FundingProgram
    {
        $this->addTofundingProgram($fundingProgram = new FundingProgram());

        return $fundingProgram;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\FundingProgram $fundingProgram
     * @return self
     */
    public function addOnceToFundingProgram(FundingProgram $fundingProgram): self
    {
        if (!is_array($this->fundingProgram)) {
            $this->fundingProgram = [];
        }

        $this->fundingProgram[0] = $fundingProgram;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\FundingProgram
     */
    public function addOnceToFundingProgramWithCreate(): FundingProgram
    {
        if (!is_array($this->fundingProgram)) {
            $this->fundingProgram = [];
        }

        if ($this->fundingProgram === []) {
            $this->addOnceTofundingProgram(new FundingProgram());
        }

        return $this->fundingProgram[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MaximumAdvertisementAmount|null
     */
    public function getMaximumAdvertisementAmount(): ?MaximumAdvertisementAmount
    {
        return $this->maximumAdvertisementAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MaximumAdvertisementAmount
     */
    public function getMaximumAdvertisementAmountWithCreate(): MaximumAdvertisementAmount
    {
        $this->maximumAdvertisementAmount = is_null($this->maximumAdvertisementAmount) ? new MaximumAdvertisementAmount() : $this->maximumAdvertisementAmount;

        return $this->maximumAdvertisementAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\MaximumAdvertisementAmount|null $maximumAdvertisementAmount
     * @return self
     */
    public function setMaximumAdvertisementAmount(
        ?MaximumAdvertisementAmount $maximumAdvertisementAmount = null,
    ): self {
        $this->maximumAdvertisementAmount = $maximumAdvertisementAmount;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\Note>|null
     */
    public function getNote(): ?array
    {
        return $this->note;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\Note>|null $note
     * @return self
     */
    public function setNote(?array $note = null): self
    {
        $this->note = $note;

        return $this;
    }

    /**
     * @return self
     */
    public function clearNote(): self
    {
        $this->note = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Note $note
     * @return self
     */
    public function addToNote(Note $note): self
    {
        $this->note[] = $note;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Note
     */
    public function addToNoteWithCreate(): Note
    {
        $this->addTonote($note = new Note());

        return $note;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Note $note
     * @return self
     */
    public function addOnceToNote(Note $note): self
    {
        if (!is_array($this->note)) {
            $this->note = [];
        }

        $this->note[0] = $note;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Note
     */
    public function addOnceToNoteWithCreate(): Note
    {
        if (!is_array($this->note)) {
            $this->note = [];
        }

        if ($this->note === []) {
            $this->addOnceTonote(new Note());
        }

        return $this->note[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PaymentFrequencyCode|null
     */
    public function getPaymentFrequencyCode(): ?PaymentFrequencyCode
    {
        return $this->paymentFrequencyCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PaymentFrequencyCode
     */
    public function getPaymentFrequencyCodeWithCreate(): PaymentFrequencyCode
    {
        $this->paymentFrequencyCode = is_null($this->paymentFrequencyCode) ? new PaymentFrequencyCode() : $this->paymentFrequencyCode;

        return $this->paymentFrequencyCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\PaymentFrequencyCode|null $paymentFrequencyCode
     * @return self
     */
    public function setPaymentFrequencyCode(?PaymentFrequencyCode $paymentFrequencyCode = null): self
    {
        $this->paymentFrequencyCode = $paymentFrequencyCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\EconomicOperatorRegistryURI|null
     */
    public function getEconomicOperatorRegistryURI(): ?EconomicOperatorRegistryURI
    {
        return $this->economicOperatorRegistryURI;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\EconomicOperatorRegistryURI
     */
    public function getEconomicOperatorRegistryURIWithCreate(): EconomicOperatorRegistryURI
    {
        $this->economicOperatorRegistryURI = is_null($this->economicOperatorRegistryURI) ? new EconomicOperatorRegistryURI() : $this->economicOperatorRegistryURI;

        return $this->economicOperatorRegistryURI;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\EconomicOperatorRegistryURI|null $economicOperatorRegistryURI
     * @return self
     */
    public function setEconomicOperatorRegistryURI(
        ?EconomicOperatorRegistryURI $economicOperatorRegistryURI = null,
    ): self {
        $this->economicOperatorRegistryURI = $economicOperatorRegistryURI;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getRequiredCurriculaIndicator(): ?bool
    {
        return $this->requiredCurriculaIndicator;
    }

    /**
     * @param bool|null $requiredCurriculaIndicator
     * @return self
     */
    public function setRequiredCurriculaIndicator(?bool $requiredCurriculaIndicator = null): self
    {
        $this->requiredCurriculaIndicator = $requiredCurriculaIndicator;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getOtherConditionsIndicator(): ?bool
    {
        return $this->otherConditionsIndicator;
    }

    /**
     * @param bool|null $otherConditionsIndicator
     * @return self
     */
    public function setOtherConditionsIndicator(?bool $otherConditionsIndicator = null): self
    {
        $this->otherConditionsIndicator = $otherConditionsIndicator;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\AdditionalConditions>|null
     */
    public function getAdditionalConditions(): ?array
    {
        return $this->additionalConditions;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\AdditionalConditions>|null $additionalConditions
     * @return self
     */
    public function setAdditionalConditions(?array $additionalConditions = null): self
    {
        $this->additionalConditions = $additionalConditions;

        return $this;
    }

    /**
     * @return self
     */
    public function clearAdditionalConditions(): self
    {
        $this->additionalConditions = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\AdditionalConditions $additionalConditions
     * @return self
     */
    public function addToAdditionalConditions(AdditionalConditions $additionalConditions): self
    {
        $this->additionalConditions[] = $additionalConditions;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\AdditionalConditions
     */
    public function addToAdditionalConditionsWithCreate(): AdditionalConditions
    {
        $this->addToadditionalConditions($additionalConditions = new AdditionalConditions());

        return $additionalConditions;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\AdditionalConditions $additionalConditions
     * @return self
     */
    public function addOnceToAdditionalConditions(AdditionalConditions $additionalConditions): self
    {
        if (!is_array($this->additionalConditions)) {
            $this->additionalConditions = [];
        }

        $this->additionalConditions[0] = $additionalConditions;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\AdditionalConditions
     */
    public function addOnceToAdditionalConditionsWithCreate(): AdditionalConditions
    {
        if (!is_array($this->additionalConditions)) {
            $this->additionalConditions = [];
        }

        if ($this->additionalConditions === []) {
            $this->addOnceToadditionalConditions(new AdditionalConditions());
        }

        return $this->additionalConditions[0];
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getLatestSecurityClearanceDate(): ?\DateTimeInterface
    {
        return $this->latestSecurityClearanceDate;
    }

    /**
     * @param \DateTimeInterface|null $latestSecurityClearanceDate
     * @return self
     */
    public function setLatestSecurityClearanceDate(?\DateTimeInterface $latestSecurityClearanceDate = null): self
    {
        $this->latestSecurityClearanceDate = $latestSecurityClearanceDate;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\DocumentationFeeAmount|null
     */
    public function getDocumentationFeeAmount(): ?DocumentationFeeAmount
    {
        return $this->documentationFeeAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\DocumentationFeeAmount
     */
    public function getDocumentationFeeAmountWithCreate(): DocumentationFeeAmount
    {
        $this->documentationFeeAmount = is_null($this->documentationFeeAmount) ? new DocumentationFeeAmount() : $this->documentationFeeAmount;

        return $this->documentationFeeAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\DocumentationFeeAmount|null $documentationFeeAmount
     * @return self
     */
    public function setDocumentationFeeAmount(?DocumentationFeeAmount $documentationFeeAmount = null): self
    {
        $this->documentationFeeAmount = $documentationFeeAmount;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\PenaltyClause>|null
     */
    public function getPenaltyClause(): ?array
    {
        return $this->penaltyClause;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\PenaltyClause>|null $penaltyClause
     * @return self
     */
    public function setPenaltyClause(?array $penaltyClause = null): self
    {
        $this->penaltyClause = $penaltyClause;

        return $this;
    }

    /**
     * @return self
     */
    public function clearPenaltyClause(): self
    {
        $this->penaltyClause = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\PenaltyClause $penaltyClause
     * @return self
     */
    public function addToPenaltyClause(PenaltyClause $penaltyClause): self
    {
        $this->penaltyClause[] = $penaltyClause;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\PenaltyClause
     */
    public function addToPenaltyClauseWithCreate(): PenaltyClause
    {
        $this->addTopenaltyClause($penaltyClause = new PenaltyClause());

        return $penaltyClause;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\PenaltyClause $penaltyClause
     * @return self
     */
    public function addOnceToPenaltyClause(PenaltyClause $penaltyClause): self
    {
        if (!is_array($this->penaltyClause)) {
            $this->penaltyClause = [];
        }

        $this->penaltyClause[0] = $penaltyClause;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\PenaltyClause
     */
    public function addOnceToPenaltyClauseWithCreate(): PenaltyClause
    {
        if (!is_array($this->penaltyClause)) {
            $this->penaltyClause = [];
        }

        if ($this->penaltyClause === []) {
            $this->addOnceTopenaltyClause(new PenaltyClause());
        }

        return $this->penaltyClause[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\RequiredFinancialGuarantee>|null
     */
    public function getRequiredFinancialGuarantee(): ?array
    {
        return $this->requiredFinancialGuarantee;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\RequiredFinancialGuarantee>|null $requiredFinancialGuarantee
     * @return self
     */
    public function setRequiredFinancialGuarantee(?array $requiredFinancialGuarantee = null): self
    {
        $this->requiredFinancialGuarantee = $requiredFinancialGuarantee;

        return $this;
    }

    /**
     * @return self
     */
    public function clearRequiredFinancialGuarantee(): self
    {
        $this->requiredFinancialGuarantee = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\RequiredFinancialGuarantee $requiredFinancialGuarantee
     * @return self
     */
    public function addToRequiredFinancialGuarantee(RequiredFinancialGuarantee $requiredFinancialGuarantee): self
    {
        $this->requiredFinancialGuarantee[] = $requiredFinancialGuarantee;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\RequiredFinancialGuarantee
     */
    public function addToRequiredFinancialGuaranteeWithCreate(): RequiredFinancialGuarantee
    {
        $this->addTorequiredFinancialGuarantee($requiredFinancialGuarantee = new RequiredFinancialGuarantee());

        return $requiredFinancialGuarantee;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\RequiredFinancialGuarantee $requiredFinancialGuarantee
     * @return self
     */
    public function addOnceToRequiredFinancialGuarantee(RequiredFinancialGuarantee $requiredFinancialGuarantee): self
    {
        if (!is_array($this->requiredFinancialGuarantee)) {
            $this->requiredFinancialGuarantee = [];
        }

        $this->requiredFinancialGuarantee[0] = $requiredFinancialGuarantee;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\RequiredFinancialGuarantee
     */
    public function addOnceToRequiredFinancialGuaranteeWithCreate(): RequiredFinancialGuarantee
    {
        if (!is_array($this->requiredFinancialGuarantee)) {
            $this->requiredFinancialGuarantee = [];
        }

        if ($this->requiredFinancialGuarantee === []) {
            $this->addOnceTorequiredFinancialGuarantee(new RequiredFinancialGuarantee());
        }

        return $this->requiredFinancialGuarantee[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ProcurementLegislationDocumentReference|null
     */
    public function getProcurementLegislationDocumentReference(): ?ProcurementLegislationDocumentReference
    {
        return $this->procurementLegislationDocumentReference;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ProcurementLegislationDocumentReference
     */
    public function getProcurementLegislationDocumentReferenceWithCreate(): ProcurementLegislationDocumentReference
    {
        $this->procurementLegislationDocumentReference = is_null($this->procurementLegislationDocumentReference) ? new ProcurementLegislationDocumentReference() : $this->procurementLegislationDocumentReference;

        return $this->procurementLegislationDocumentReference;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ProcurementLegislationDocumentReference|null $procurementLegislationDocumentReference
     * @return self
     */
    public function setProcurementLegislationDocumentReference(
        ?ProcurementLegislationDocumentReference $procurementLegislationDocumentReference = null,
    ): self {
        $this->procurementLegislationDocumentReference = $procurementLegislationDocumentReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\FiscalLegislationDocumentReference|null
     */
    public function getFiscalLegislationDocumentReference(): ?FiscalLegislationDocumentReference
    {
        return $this->fiscalLegislationDocumentReference;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\FiscalLegislationDocumentReference
     */
    public function getFiscalLegislationDocumentReferenceWithCreate(): FiscalLegislationDocumentReference
    {
        $this->fiscalLegislationDocumentReference = is_null($this->fiscalLegislationDocumentReference) ? new FiscalLegislationDocumentReference() : $this->fiscalLegislationDocumentReference;

        return $this->fiscalLegislationDocumentReference;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\FiscalLegislationDocumentReference|null $fiscalLegislationDocumentReference
     * @return self
     */
    public function setFiscalLegislationDocumentReference(
        ?FiscalLegislationDocumentReference $fiscalLegislationDocumentReference = null,
    ): self {
        $this->fiscalLegislationDocumentReference = $fiscalLegislationDocumentReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\EnvironmentalLegislationDocumentReference|null
     */
    public function getEnvironmentalLegislationDocumentReference(): ?EnvironmentalLegislationDocumentReference
    {
        return $this->environmentalLegislationDocumentReference;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\EnvironmentalLegislationDocumentReference
     */
    public function getEnvironmentalLegislationDocumentReferenceWithCreate(
    ): EnvironmentalLegislationDocumentReference {
        $this->environmentalLegislationDocumentReference = is_null($this->environmentalLegislationDocumentReference) ? new EnvironmentalLegislationDocumentReference() : $this->environmentalLegislationDocumentReference;

        return $this->environmentalLegislationDocumentReference;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\EnvironmentalLegislationDocumentReference|null $environmentalLegislationDocumentReference
     * @return self
     */
    public function setEnvironmentalLegislationDocumentReference(
        ?EnvironmentalLegislationDocumentReference $environmentalLegislationDocumentReference = null,
    ): self {
        $this->environmentalLegislationDocumentReference = $environmentalLegislationDocumentReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\EmploymentLegislationDocumentReference|null
     */
    public function getEmploymentLegislationDocumentReference(): ?EmploymentLegislationDocumentReference
    {
        return $this->employmentLegislationDocumentReference;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\EmploymentLegislationDocumentReference
     */
    public function getEmploymentLegislationDocumentReferenceWithCreate(): EmploymentLegislationDocumentReference
    {
        $this->employmentLegislationDocumentReference = is_null($this->employmentLegislationDocumentReference) ? new EmploymentLegislationDocumentReference() : $this->employmentLegislationDocumentReference;

        return $this->employmentLegislationDocumentReference;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\EmploymentLegislationDocumentReference|null $employmentLegislationDocumentReference
     * @return self
     */
    public function setEmploymentLegislationDocumentReference(
        ?EmploymentLegislationDocumentReference $employmentLegislationDocumentReference = null,
    ): self {
        $this->employmentLegislationDocumentReference = $employmentLegislationDocumentReference;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\ContractualDocumentReference>|null
     */
    public function getContractualDocumentReference(): ?array
    {
        return $this->contractualDocumentReference;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\ContractualDocumentReference>|null $contractualDocumentReference
     * @return self
     */
    public function setContractualDocumentReference(?array $contractualDocumentReference = null): self
    {
        $this->contractualDocumentReference = $contractualDocumentReference;

        return $this;
    }

    /**
     * @return self
     */
    public function clearContractualDocumentReference(): self
    {
        $this->contractualDocumentReference = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ContractualDocumentReference $contractualDocumentReference
     * @return self
     */
    public function addToContractualDocumentReference(
        ContractualDocumentReference $contractualDocumentReference,
    ): self {
        $this->contractualDocumentReference[] = $contractualDocumentReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ContractualDocumentReference
     */
    public function addToContractualDocumentReferenceWithCreate(): ContractualDocumentReference
    {
        $this->addTocontractualDocumentReference($contractualDocumentReference = new ContractualDocumentReference());

        return $contractualDocumentReference;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ContractualDocumentReference $contractualDocumentReference
     * @return self
     */
    public function addOnceToContractualDocumentReference(
        ContractualDocumentReference $contractualDocumentReference,
    ): self {
        if (!is_array($this->contractualDocumentReference)) {
            $this->contractualDocumentReference = [];
        }

        $this->contractualDocumentReference[0] = $contractualDocumentReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ContractualDocumentReference
     */
    public function addOnceToContractualDocumentReferenceWithCreate(): ContractualDocumentReference
    {
        if (!is_array($this->contractualDocumentReference)) {
            $this->contractualDocumentReference = [];
        }

        if ($this->contractualDocumentReference === []) {
            $this->addOnceTocontractualDocumentReference(new ContractualDocumentReference());
        }

        return $this->contractualDocumentReference[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\CallForTendersDocumentReference|null
     */
    public function getCallForTendersDocumentReference(): ?CallForTendersDocumentReference
    {
        return $this->callForTendersDocumentReference;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\CallForTendersDocumentReference
     */
    public function getCallForTendersDocumentReferenceWithCreate(): CallForTendersDocumentReference
    {
        $this->callForTendersDocumentReference = is_null($this->callForTendersDocumentReference) ? new CallForTendersDocumentReference() : $this->callForTendersDocumentReference;

        return $this->callForTendersDocumentReference;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\CallForTendersDocumentReference|null $callForTendersDocumentReference
     * @return self
     */
    public function setCallForTendersDocumentReference(
        ?CallForTendersDocumentReference $callForTendersDocumentReference = null,
    ): self {
        $this->callForTendersDocumentReference = $callForTendersDocumentReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\WarrantyValidityPeriod|null
     */
    public function getWarrantyValidityPeriod(): ?WarrantyValidityPeriod
    {
        return $this->warrantyValidityPeriod;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\WarrantyValidityPeriod
     */
    public function getWarrantyValidityPeriodWithCreate(): WarrantyValidityPeriod
    {
        $this->warrantyValidityPeriod = is_null($this->warrantyValidityPeriod) ? new WarrantyValidityPeriod() : $this->warrantyValidityPeriod;

        return $this->warrantyValidityPeriod;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\WarrantyValidityPeriod|null $warrantyValidityPeriod
     * @return self
     */
    public function setWarrantyValidityPeriod(?WarrantyValidityPeriod $warrantyValidityPeriod = null): self
    {
        $this->warrantyValidityPeriod = $warrantyValidityPeriod;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\PaymentTerms>|null
     */
    public function getPaymentTerms(): ?array
    {
        return $this->paymentTerms;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\PaymentTerms>|null $paymentTerms
     * @return self
     */
    public function setPaymentTerms(?array $paymentTerms = null): self
    {
        $this->paymentTerms = $paymentTerms;

        return $this;
    }

    /**
     * @return self
     */
    public function clearPaymentTerms(): self
    {
        $this->paymentTerms = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\PaymentTerms $paymentTerms
     * @return self
     */
    public function addToPaymentTerms(PaymentTerms $paymentTerms): self
    {
        $this->paymentTerms[] = $paymentTerms;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\PaymentTerms
     */
    public function addToPaymentTermsWithCreate(): PaymentTerms
    {
        $this->addTopaymentTerms($paymentTerms = new PaymentTerms());

        return $paymentTerms;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\PaymentTerms $paymentTerms
     * @return self
     */
    public function addOnceToPaymentTerms(PaymentTerms $paymentTerms): self
    {
        if (!is_array($this->paymentTerms)) {
            $this->paymentTerms = [];
        }

        $this->paymentTerms[0] = $paymentTerms;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\PaymentTerms
     */
    public function addOnceToPaymentTermsWithCreate(): PaymentTerms
    {
        if (!is_array($this->paymentTerms)) {
            $this->paymentTerms = [];
        }

        if ($this->paymentTerms === []) {
            $this->addOnceTopaymentTerms(new PaymentTerms());
        }

        return $this->paymentTerms[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\TendererQualificationRequest>|null
     */
    public function getTendererQualificationRequest(): ?array
    {
        return $this->tendererQualificationRequest;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\TendererQualificationRequest>|null $tendererQualificationRequest
     * @return self
     */
    public function setTendererQualificationRequest(?array $tendererQualificationRequest = null): self
    {
        $this->tendererQualificationRequest = $tendererQualificationRequest;

        return $this;
    }

    /**
     * @return self
     */
    public function clearTendererQualificationRequest(): self
    {
        $this->tendererQualificationRequest = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\TendererQualificationRequest $tendererQualificationRequest
     * @return self
     */
    public function addToTendererQualificationRequest(
        TendererQualificationRequest $tendererQualificationRequest,
    ): self {
        $this->tendererQualificationRequest[] = $tendererQualificationRequest;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TendererQualificationRequest
     */
    public function addToTendererQualificationRequestWithCreate(): TendererQualificationRequest
    {
        $this->addTotendererQualificationRequest($tendererQualificationRequest = new TendererQualificationRequest());

        return $tendererQualificationRequest;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\TendererQualificationRequest $tendererQualificationRequest
     * @return self
     */
    public function addOnceToTendererQualificationRequest(
        TendererQualificationRequest $tendererQualificationRequest,
    ): self {
        if (!is_array($this->tendererQualificationRequest)) {
            $this->tendererQualificationRequest = [];
        }

        $this->tendererQualificationRequest[0] = $tendererQualificationRequest;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TendererQualificationRequest
     */
    public function addOnceToTendererQualificationRequestWithCreate(): TendererQualificationRequest
    {
        if (!is_array($this->tendererQualificationRequest)) {
            $this->tendererQualificationRequest = [];
        }

        if ($this->tendererQualificationRequest === []) {
            $this->addOnceTotendererQualificationRequest(new TendererQualificationRequest());
        }

        return $this->tendererQualificationRequest[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\AllowedSubcontractTerms>|null
     */
    public function getAllowedSubcontractTerms(): ?array
    {
        return $this->allowedSubcontractTerms;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\AllowedSubcontractTerms>|null $allowedSubcontractTerms
     * @return self
     */
    public function setAllowedSubcontractTerms(?array $allowedSubcontractTerms = null): self
    {
        $this->allowedSubcontractTerms = $allowedSubcontractTerms;

        return $this;
    }

    /**
     * @return self
     */
    public function clearAllowedSubcontractTerms(): self
    {
        $this->allowedSubcontractTerms = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\AllowedSubcontractTerms $allowedSubcontractTerms
     * @return self
     */
    public function addToAllowedSubcontractTerms(AllowedSubcontractTerms $allowedSubcontractTerms): self
    {
        $this->allowedSubcontractTerms[] = $allowedSubcontractTerms;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\AllowedSubcontractTerms
     */
    public function addToAllowedSubcontractTermsWithCreate(): AllowedSubcontractTerms
    {
        $this->addToallowedSubcontractTerms($allowedSubcontractTerms = new AllowedSubcontractTerms());

        return $allowedSubcontractTerms;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\AllowedSubcontractTerms $allowedSubcontractTerms
     * @return self
     */
    public function addOnceToAllowedSubcontractTerms(AllowedSubcontractTerms $allowedSubcontractTerms): self
    {
        if (!is_array($this->allowedSubcontractTerms)) {
            $this->allowedSubcontractTerms = [];
        }

        $this->allowedSubcontractTerms[0] = $allowedSubcontractTerms;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\AllowedSubcontractTerms
     */
    public function addOnceToAllowedSubcontractTermsWithCreate(): AllowedSubcontractTerms
    {
        if (!is_array($this->allowedSubcontractTerms)) {
            $this->allowedSubcontractTerms = [];
        }

        if ($this->allowedSubcontractTerms === []) {
            $this->addOnceToallowedSubcontractTerms(new AllowedSubcontractTerms());
        }

        return $this->allowedSubcontractTerms[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\TenderPreparation>|null
     */
    public function getTenderPreparation(): ?array
    {
        return $this->tenderPreparation;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\TenderPreparation>|null $tenderPreparation
     * @return self
     */
    public function setTenderPreparation(?array $tenderPreparation = null): self
    {
        $this->tenderPreparation = $tenderPreparation;

        return $this;
    }

    /**
     * @return self
     */
    public function clearTenderPreparation(): self
    {
        $this->tenderPreparation = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\TenderPreparation $tenderPreparation
     * @return self
     */
    public function addToTenderPreparation(TenderPreparation $tenderPreparation): self
    {
        $this->tenderPreparation[] = $tenderPreparation;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TenderPreparation
     */
    public function addToTenderPreparationWithCreate(): TenderPreparation
    {
        $this->addTotenderPreparation($tenderPreparation = new TenderPreparation());

        return $tenderPreparation;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\TenderPreparation $tenderPreparation
     * @return self
     */
    public function addOnceToTenderPreparation(TenderPreparation $tenderPreparation): self
    {
        if (!is_array($this->tenderPreparation)) {
            $this->tenderPreparation = [];
        }

        $this->tenderPreparation[0] = $tenderPreparation;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TenderPreparation
     */
    public function addOnceToTenderPreparationWithCreate(): TenderPreparation
    {
        if (!is_array($this->tenderPreparation)) {
            $this->tenderPreparation = [];
        }

        if ($this->tenderPreparation === []) {
            $this->addOnceTotenderPreparation(new TenderPreparation());
        }

        return $this->tenderPreparation[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\ContractExecutionRequirement>|null
     */
    public function getContractExecutionRequirement(): ?array
    {
        return $this->contractExecutionRequirement;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\ContractExecutionRequirement>|null $contractExecutionRequirement
     * @return self
     */
    public function setContractExecutionRequirement(?array $contractExecutionRequirement = null): self
    {
        $this->contractExecutionRequirement = $contractExecutionRequirement;

        return $this;
    }

    /**
     * @return self
     */
    public function clearContractExecutionRequirement(): self
    {
        $this->contractExecutionRequirement = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ContractExecutionRequirement $contractExecutionRequirement
     * @return self
     */
    public function addToContractExecutionRequirement(
        ContractExecutionRequirement $contractExecutionRequirement,
    ): self {
        $this->contractExecutionRequirement[] = $contractExecutionRequirement;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ContractExecutionRequirement
     */
    public function addToContractExecutionRequirementWithCreate(): ContractExecutionRequirement
    {
        $this->addTocontractExecutionRequirement($contractExecutionRequirement = new ContractExecutionRequirement());

        return $contractExecutionRequirement;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ContractExecutionRequirement $contractExecutionRequirement
     * @return self
     */
    public function addOnceToContractExecutionRequirement(
        ContractExecutionRequirement $contractExecutionRequirement,
    ): self {
        if (!is_array($this->contractExecutionRequirement)) {
            $this->contractExecutionRequirement = [];
        }

        $this->contractExecutionRequirement[0] = $contractExecutionRequirement;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ContractExecutionRequirement
     */
    public function addOnceToContractExecutionRequirementWithCreate(): ContractExecutionRequirement
    {
        if (!is_array($this->contractExecutionRequirement)) {
            $this->contractExecutionRequirement = [];
        }

        if ($this->contractExecutionRequirement === []) {
            $this->addOnceTocontractExecutionRequirement(new ContractExecutionRequirement());
        }

        return $this->contractExecutionRequirement[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\AwardingTerms|null
     */
    public function getAwardingTerms(): ?AwardingTerms
    {
        return $this->awardingTerms;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\AwardingTerms
     */
    public function getAwardingTermsWithCreate(): AwardingTerms
    {
        $this->awardingTerms = is_null($this->awardingTerms) ? new AwardingTerms() : $this->awardingTerms;

        return $this->awardingTerms;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\AwardingTerms|null $awardingTerms
     * @return self
     */
    public function setAwardingTerms(?AwardingTerms $awardingTerms = null): self
    {
        $this->awardingTerms = $awardingTerms;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\AdditionalInformationParty|null
     */
    public function getAdditionalInformationParty(): ?AdditionalInformationParty
    {
        return $this->additionalInformationParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\AdditionalInformationParty
     */
    public function getAdditionalInformationPartyWithCreate(): AdditionalInformationParty
    {
        $this->additionalInformationParty = is_null($this->additionalInformationParty) ? new AdditionalInformationParty() : $this->additionalInformationParty;

        return $this->additionalInformationParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\AdditionalInformationParty|null $additionalInformationParty
     * @return self
     */
    public function setAdditionalInformationParty(
        ?AdditionalInformationParty $additionalInformationParty = null,
    ): self {
        $this->additionalInformationParty = $additionalInformationParty;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\DocumentProviderParty|null
     */
    public function getDocumentProviderParty(): ?DocumentProviderParty
    {
        return $this->documentProviderParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\DocumentProviderParty
     */
    public function getDocumentProviderPartyWithCreate(): DocumentProviderParty
    {
        $this->documentProviderParty = is_null($this->documentProviderParty) ? new DocumentProviderParty() : $this->documentProviderParty;

        return $this->documentProviderParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\DocumentProviderParty|null $documentProviderParty
     * @return self
     */
    public function setDocumentProviderParty(?DocumentProviderParty $documentProviderParty = null): self
    {
        $this->documentProviderParty = $documentProviderParty;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TenderRecipientParty|null
     */
    public function getTenderRecipientParty(): ?TenderRecipientParty
    {
        return $this->tenderRecipientParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TenderRecipientParty
     */
    public function getTenderRecipientPartyWithCreate(): TenderRecipientParty
    {
        $this->tenderRecipientParty = is_null($this->tenderRecipientParty) ? new TenderRecipientParty() : $this->tenderRecipientParty;

        return $this->tenderRecipientParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\TenderRecipientParty|null $tenderRecipientParty
     * @return self
     */
    public function setTenderRecipientParty(?TenderRecipientParty $tenderRecipientParty = null): self
    {
        $this->tenderRecipientParty = $tenderRecipientParty;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ContractResponsibleParty|null
     */
    public function getContractResponsibleParty(): ?ContractResponsibleParty
    {
        return $this->contractResponsibleParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ContractResponsibleParty
     */
    public function getContractResponsiblePartyWithCreate(): ContractResponsibleParty
    {
        $this->contractResponsibleParty = is_null($this->contractResponsibleParty) ? new ContractResponsibleParty() : $this->contractResponsibleParty;

        return $this->contractResponsibleParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ContractResponsibleParty|null $contractResponsibleParty
     * @return self
     */
    public function setContractResponsibleParty(?ContractResponsibleParty $contractResponsibleParty = null): self
    {
        $this->contractResponsibleParty = $contractResponsibleParty;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\TenderEvaluationParty>|null
     */
    public function getTenderEvaluationParty(): ?array
    {
        return $this->tenderEvaluationParty;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\TenderEvaluationParty>|null $tenderEvaluationParty
     * @return self
     */
    public function setTenderEvaluationParty(?array $tenderEvaluationParty = null): self
    {
        $this->tenderEvaluationParty = $tenderEvaluationParty;

        return $this;
    }

    /**
     * @return self
     */
    public function clearTenderEvaluationParty(): self
    {
        $this->tenderEvaluationParty = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\TenderEvaluationParty $tenderEvaluationParty
     * @return self
     */
    public function addToTenderEvaluationParty(TenderEvaluationParty $tenderEvaluationParty): self
    {
        $this->tenderEvaluationParty[] = $tenderEvaluationParty;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TenderEvaluationParty
     */
    public function addToTenderEvaluationPartyWithCreate(): TenderEvaluationParty
    {
        $this->addTotenderEvaluationParty($tenderEvaluationParty = new TenderEvaluationParty());

        return $tenderEvaluationParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\TenderEvaluationParty $tenderEvaluationParty
     * @return self
     */
    public function addOnceToTenderEvaluationParty(TenderEvaluationParty $tenderEvaluationParty): self
    {
        if (!is_array($this->tenderEvaluationParty)) {
            $this->tenderEvaluationParty = [];
        }

        $this->tenderEvaluationParty[0] = $tenderEvaluationParty;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TenderEvaluationParty
     */
    public function addOnceToTenderEvaluationPartyWithCreate(): TenderEvaluationParty
    {
        if (!is_array($this->tenderEvaluationParty)) {
            $this->tenderEvaluationParty = [];
        }

        if ($this->tenderEvaluationParty === []) {
            $this->addOnceTotenderEvaluationParty(new TenderEvaluationParty());
        }

        return $this->tenderEvaluationParty[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TenderValidityPeriod|null
     */
    public function getTenderValidityPeriod(): ?TenderValidityPeriod
    {
        return $this->tenderValidityPeriod;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TenderValidityPeriod
     */
    public function getTenderValidityPeriodWithCreate(): TenderValidityPeriod
    {
        $this->tenderValidityPeriod = is_null($this->tenderValidityPeriod) ? new TenderValidityPeriod() : $this->tenderValidityPeriod;

        return $this->tenderValidityPeriod;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\TenderValidityPeriod|null $tenderValidityPeriod
     * @return self
     */
    public function setTenderValidityPeriod(?TenderValidityPeriod $tenderValidityPeriod = null): self
    {
        $this->tenderValidityPeriod = $tenderValidityPeriod;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ContractAcceptancePeriod|null
     */
    public function getContractAcceptancePeriod(): ?ContractAcceptancePeriod
    {
        return $this->contractAcceptancePeriod;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ContractAcceptancePeriod
     */
    public function getContractAcceptancePeriodWithCreate(): ContractAcceptancePeriod
    {
        $this->contractAcceptancePeriod = is_null($this->contractAcceptancePeriod) ? new ContractAcceptancePeriod() : $this->contractAcceptancePeriod;

        return $this->contractAcceptancePeriod;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ContractAcceptancePeriod|null $contractAcceptancePeriod
     * @return self
     */
    public function setContractAcceptancePeriod(?ContractAcceptancePeriod $contractAcceptancePeriod = null): self
    {
        $this->contractAcceptancePeriod = $contractAcceptancePeriod;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\AppealTerms|null
     */
    public function getAppealTerms(): ?AppealTerms
    {
        return $this->appealTerms;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\AppealTerms
     */
    public function getAppealTermsWithCreate(): AppealTerms
    {
        $this->appealTerms = is_null($this->appealTerms) ? new AppealTerms() : $this->appealTerms;

        return $this->appealTerms;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\AppealTerms|null $appealTerms
     * @return self
     */
    public function setAppealTerms(?AppealTerms $appealTerms = null): self
    {
        $this->appealTerms = $appealTerms;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\Language>|null
     */
    public function getLanguage(): ?array
    {
        return $this->language;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\Language>|null $language
     * @return self
     */
    public function setLanguage(?array $language = null): self
    {
        $this->language = $language;

        return $this;
    }

    /**
     * @return self
     */
    public function clearLanguage(): self
    {
        $this->language = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Language $language
     * @return self
     */
    public function addToLanguage(Language $language): self
    {
        $this->language[] = $language;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Language
     */
    public function addToLanguageWithCreate(): Language
    {
        $this->addTolanguage($language = new Language());

        return $language;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Language $language
     * @return self
     */
    public function addOnceToLanguage(Language $language): self
    {
        if (!is_array($this->language)) {
            $this->language = [];
        }

        $this->language[0] = $language;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Language
     */
    public function addOnceToLanguageWithCreate(): Language
    {
        if (!is_array($this->language)) {
            $this->language = [];
        }

        if ($this->language === []) {
            $this->addOnceTolanguage(new Language());
        }

        return $this->language[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\BudgetAccountLine>|null
     */
    public function getBudgetAccountLine(): ?array
    {
        return $this->budgetAccountLine;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\BudgetAccountLine>|null $budgetAccountLine
     * @return self
     */
    public function setBudgetAccountLine(?array $budgetAccountLine = null): self
    {
        $this->budgetAccountLine = $budgetAccountLine;

        return $this;
    }

    /**
     * @return self
     */
    public function clearBudgetAccountLine(): self
    {
        $this->budgetAccountLine = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\BudgetAccountLine $budgetAccountLine
     * @return self
     */
    public function addToBudgetAccountLine(BudgetAccountLine $budgetAccountLine): self
    {
        $this->budgetAccountLine[] = $budgetAccountLine;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\BudgetAccountLine
     */
    public function addToBudgetAccountLineWithCreate(): BudgetAccountLine
    {
        $this->addTobudgetAccountLine($budgetAccountLine = new BudgetAccountLine());

        return $budgetAccountLine;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\BudgetAccountLine $budgetAccountLine
     * @return self
     */
    public function addOnceToBudgetAccountLine(BudgetAccountLine $budgetAccountLine): self
    {
        if (!is_array($this->budgetAccountLine)) {
            $this->budgetAccountLine = [];
        }

        $this->budgetAccountLine[0] = $budgetAccountLine;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\BudgetAccountLine
     */
    public function addOnceToBudgetAccountLineWithCreate(): BudgetAccountLine
    {
        if (!is_array($this->budgetAccountLine)) {
            $this->budgetAccountLine = [];
        }

        if ($this->budgetAccountLine === []) {
            $this->addOnceTobudgetAccountLine(new BudgetAccountLine());
        }

        return $this->budgetAccountLine[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ReplacedNoticeDocumentReference|null
     */
    public function getReplacedNoticeDocumentReference(): ?ReplacedNoticeDocumentReference
    {
        return $this->replacedNoticeDocumentReference;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ReplacedNoticeDocumentReference
     */
    public function getReplacedNoticeDocumentReferenceWithCreate(): ReplacedNoticeDocumentReference
    {
        $this->replacedNoticeDocumentReference = is_null($this->replacedNoticeDocumentReference) ? new ReplacedNoticeDocumentReference() : $this->replacedNoticeDocumentReference;

        return $this->replacedNoticeDocumentReference;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ReplacedNoticeDocumentReference|null $replacedNoticeDocumentReference
     * @return self
     */
    public function setReplacedNoticeDocumentReference(
        ?ReplacedNoticeDocumentReference $replacedNoticeDocumentReference = null,
    ): self {
        $this->replacedNoticeDocumentReference = $replacedNoticeDocumentReference;

        return $this;
    }
}
