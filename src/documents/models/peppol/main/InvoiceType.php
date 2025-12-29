<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\main;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cac\AccountingCustomerParty;
use horstoeko\invoicesuite\documents\models\peppol\cac\AccountingSupplierParty;
use horstoeko\invoicesuite\documents\models\peppol\cac\AdditionalDocumentReference;
use horstoeko\invoicesuite\documents\models\peppol\cac\AllowanceCharge;
use horstoeko\invoicesuite\documents\models\peppol\cac\BillingReference;
use horstoeko\invoicesuite\documents\models\peppol\cac\BuyerCustomerParty;
use horstoeko\invoicesuite\documents\models\peppol\cac\ContractDocumentReference;
use horstoeko\invoicesuite\documents\models\peppol\cac\Delivery;
use horstoeko\invoicesuite\documents\models\peppol\cac\DeliveryTerms;
use horstoeko\invoicesuite\documents\models\peppol\cac\DespatchDocumentReference;
use horstoeko\invoicesuite\documents\models\peppol\cac\InvoiceLine;
use horstoeko\invoicesuite\documents\models\peppol\cac\InvoicePeriod;
use horstoeko\invoicesuite\documents\models\peppol\cac\LegalMonetaryTotal;
use horstoeko\invoicesuite\documents\models\peppol\cac\OrderReference;
use horstoeko\invoicesuite\documents\models\peppol\cac\OriginatorDocumentReference;
use horstoeko\invoicesuite\documents\models\peppol\cac\PayeeParty;
use horstoeko\invoicesuite\documents\models\peppol\cac\PaymentAlternativeExchangeRate;
use horstoeko\invoicesuite\documents\models\peppol\cac\PaymentExchangeRate;
use horstoeko\invoicesuite\documents\models\peppol\cac\PaymentMeans;
use horstoeko\invoicesuite\documents\models\peppol\cac\PaymentTerms;
use horstoeko\invoicesuite\documents\models\peppol\cac\PrepaidPayment;
use horstoeko\invoicesuite\documents\models\peppol\cac\PricingExchangeRate;
use horstoeko\invoicesuite\documents\models\peppol\cac\ProjectReference;
use horstoeko\invoicesuite\documents\models\peppol\cac\ReceiptDocumentReference;
use horstoeko\invoicesuite\documents\models\peppol\cac\SellerSupplierParty;
use horstoeko\invoicesuite\documents\models\peppol\cac\Signature;
use horstoeko\invoicesuite\documents\models\peppol\cac\StatementDocumentReference;
use horstoeko\invoicesuite\documents\models\peppol\cac\TaxExchangeRate;
use horstoeko\invoicesuite\documents\models\peppol\cac\TaxRepresentativeParty;
use horstoeko\invoicesuite\documents\models\peppol\cac\TaxTotal;
use horstoeko\invoicesuite\documents\models\peppol\cac\WithholdingTaxTotal;
use horstoeko\invoicesuite\documents\models\peppol\cbc\AccountingCost;
use horstoeko\invoicesuite\documents\models\peppol\cbc\AccountingCostCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\BuyerReference;
use horstoeko\invoicesuite\documents\models\peppol\cbc\CustomizationID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\DocumentCurrencyCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\InvoiceTypeCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\LineCountNumeric;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Note;
use horstoeko\invoicesuite\documents\models\peppol\cbc\PaymentAlternativeCurrencyCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\PaymentCurrencyCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\PricingCurrencyCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ProfileExecutionID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ProfileID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\TaxCurrencyCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\UBLVersionID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\UUID;
use horstoeko\invoicesuite\documents\models\peppol\ext\UBLExtension;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlNamespace(uri="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", prefix="cac")
 * @JMS\XmlNamespace(uri="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", prefix="cbc")
 * @JMS\XmlNamespace(uri="urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2", prefix="cec")
 */
class InvoiceType
{
    use HandlesObjectFlags;

    /**
     * @var null|array<UBLExtension>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\ext\UBLExtension>")
     * @JMS\Expose
     * @JMS\SerializedName("UBLExtensions")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2", cdata=false)
     * @JMS\XmlList(inline=false, entry="UBLExtension", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2")
     * @JMS\Accessor(getter="getUBLExtensions", setter="setUBLExtensions")
     */
    private $uBLExtensions;

    /**
     * @var null|UBLVersionID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\UBLVersionID")
     * @JMS\Expose
     * @JMS\SerializedName("UBLVersionID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getUBLVersionID", setter="setUBLVersionID")
     */
    private $uBLVersionID;

    /**
     * @var null|CustomizationID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\CustomizationID")
     * @JMS\Expose
     * @JMS\SerializedName("CustomizationID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCustomizationID", setter="setCustomizationID")
     */
    private $customizationID;

    /**
     * @var null|ProfileID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ProfileID")
     * @JMS\Expose
     * @JMS\SerializedName("ProfileID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getProfileID", setter="setProfileID")
     */
    private $profileID;

    /**
     * @var null|ProfileExecutionID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ProfileExecutionID")
     * @JMS\Expose
     * @JMS\SerializedName("ProfileExecutionID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getProfileExecutionID", setter="setProfileExecutionID")
     */
    private $profileExecutionID;

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
     * @var null|bool
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("CopyIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCopyIndicator", setter="setCopyIndicator")
     */
    private $copyIndicator;

    /**
     * @var null|UUID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\UUID")
     * @JMS\Expose
     * @JMS\SerializedName("UUID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getUUID", setter="setUUID")
     */
    private $uUID;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("IssueDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getIssueDate", setter="setIssueDate")
     */
    private $issueDate;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time")
     * @JMS\Expose
     * @JMS\SerializedName("IssueTime")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getIssueTime", setter="setIssueTime")
     */
    private $issueTime;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("DueDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDueDate", setter="setDueDate")
     */
    private $dueDate;

    /**
     * @var null|InvoiceTypeCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\InvoiceTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("InvoiceTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getInvoiceTypeCode", setter="setInvoiceTypeCode")
     */
    private $invoiceTypeCode;

    /**
     * @var null|array<Note>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\Note>")
     * @JMS\Expose
     * @JMS\SerializedName("Note")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Note", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getNote", setter="setNote")
     */
    private $note;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("TaxPointDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTaxPointDate", setter="setTaxPointDate")
     */
    private $taxPointDate;

    /**
     * @var null|DocumentCurrencyCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\DocumentCurrencyCode")
     * @JMS\Expose
     * @JMS\SerializedName("DocumentCurrencyCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDocumentCurrencyCode", setter="setDocumentCurrencyCode")
     */
    private $documentCurrencyCode;

    /**
     * @var null|TaxCurrencyCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\TaxCurrencyCode")
     * @JMS\Expose
     * @JMS\SerializedName("TaxCurrencyCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTaxCurrencyCode", setter="setTaxCurrencyCode")
     */
    private $taxCurrencyCode;

    /**
     * @var null|PricingCurrencyCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\PricingCurrencyCode")
     * @JMS\Expose
     * @JMS\SerializedName("PricingCurrencyCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPricingCurrencyCode", setter="setPricingCurrencyCode")
     */
    private $pricingCurrencyCode;

    /**
     * @var null|PaymentCurrencyCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\PaymentCurrencyCode")
     * @JMS\Expose
     * @JMS\SerializedName("PaymentCurrencyCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPaymentCurrencyCode", setter="setPaymentCurrencyCode")
     */
    private $paymentCurrencyCode;

    /**
     * @var null|PaymentAlternativeCurrencyCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\PaymentAlternativeCurrencyCode")
     * @JMS\Expose
     * @JMS\SerializedName("PaymentAlternativeCurrencyCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPaymentAlternativeCurrencyCode", setter="setPaymentAlternativeCurrencyCode")
     */
    private $paymentAlternativeCurrencyCode;

    /**
     * @var null|AccountingCostCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\AccountingCostCode")
     * @JMS\Expose
     * @JMS\SerializedName("AccountingCostCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAccountingCostCode", setter="setAccountingCostCode")
     */
    private $accountingCostCode;

    /**
     * @var null|AccountingCost
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\AccountingCost")
     * @JMS\Expose
     * @JMS\SerializedName("AccountingCost")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAccountingCost", setter="setAccountingCost")
     */
    private $accountingCost;

    /**
     * @var null|LineCountNumeric
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\LineCountNumeric")
     * @JMS\Expose
     * @JMS\SerializedName("LineCountNumeric")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLineCountNumeric", setter="setLineCountNumeric")
     */
    private $lineCountNumeric;

    /**
     * @var null|BuyerReference
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\BuyerReference")
     * @JMS\Expose
     * @JMS\SerializedName("BuyerReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getBuyerReference", setter="setBuyerReference")
     */
    private $buyerReference;

    /**
     * @var null|array<InvoicePeriod>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\InvoicePeriod>")
     * @JMS\Expose
     * @JMS\SerializedName("InvoicePeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="InvoicePeriod", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getInvoicePeriod", setter="setInvoicePeriod")
     */
    private $invoicePeriod;

    /**
     * @var null|OrderReference
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\OrderReference")
     * @JMS\Expose
     * @JMS\SerializedName("OrderReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOrderReference", setter="setOrderReference")
     */
    private $orderReference;

    /**
     * @var null|array<BillingReference>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\BillingReference>")
     * @JMS\Expose
     * @JMS\SerializedName("BillingReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="BillingReference", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getBillingReference", setter="setBillingReference")
     */
    private $billingReference;

    /**
     * @var null|array<DespatchDocumentReference>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\DespatchDocumentReference>")
     * @JMS\Expose
     * @JMS\SerializedName("DespatchDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="DespatchDocumentReference", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getDespatchDocumentReference", setter="setDespatchDocumentReference")
     */
    private $despatchDocumentReference;

    /**
     * @var null|array<ReceiptDocumentReference>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\ReceiptDocumentReference>")
     * @JMS\Expose
     * @JMS\SerializedName("ReceiptDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ReceiptDocumentReference", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getReceiptDocumentReference", setter="setReceiptDocumentReference")
     */
    private $receiptDocumentReference;

    /**
     * @var null|array<StatementDocumentReference>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\StatementDocumentReference>")
     * @JMS\Expose
     * @JMS\SerializedName("StatementDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="StatementDocumentReference", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getStatementDocumentReference", setter="setStatementDocumentReference")
     */
    private $statementDocumentReference;

    /**
     * @var null|array<OriginatorDocumentReference>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\OriginatorDocumentReference>")
     * @JMS\Expose
     * @JMS\SerializedName("OriginatorDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="OriginatorDocumentReference", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getOriginatorDocumentReference", setter="setOriginatorDocumentReference")
     */
    private $originatorDocumentReference;

    /**
     * @var null|array<ContractDocumentReference>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\ContractDocumentReference>")
     * @JMS\Expose
     * @JMS\SerializedName("ContractDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ContractDocumentReference", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getContractDocumentReference", setter="setContractDocumentReference")
     */
    private $contractDocumentReference;

    /**
     * @var null|array<AdditionalDocumentReference>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\AdditionalDocumentReference>")
     * @JMS\Expose
     * @JMS\SerializedName("AdditionalDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="AdditionalDocumentReference", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getAdditionalDocumentReference", setter="setAdditionalDocumentReference")
     */
    private $additionalDocumentReference;

    /**
     * @var null|array<ProjectReference>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\ProjectReference>")
     * @JMS\Expose
     * @JMS\SerializedName("ProjectReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ProjectReference", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getProjectReference", setter="setProjectReference")
     */
    private $projectReference;

    /**
     * @var null|array<Signature>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\Signature>")
     * @JMS\Expose
     * @JMS\SerializedName("Signature")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Signature", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getSignature", setter="setSignature")
     */
    private $signature;

    /**
     * @var null|AccountingSupplierParty
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\AccountingSupplierParty")
     * @JMS\Expose
     * @JMS\SerializedName("AccountingSupplierParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAccountingSupplierParty", setter="setAccountingSupplierParty")
     */
    private $accountingSupplierParty;

    /**
     * @var null|AccountingCustomerParty
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\AccountingCustomerParty")
     * @JMS\Expose
     * @JMS\SerializedName("AccountingCustomerParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAccountingCustomerParty", setter="setAccountingCustomerParty")
     */
    private $accountingCustomerParty;

    /**
     * @var null|PayeeParty
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\PayeeParty")
     * @JMS\Expose
     * @JMS\SerializedName("PayeeParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPayeeParty", setter="setPayeeParty")
     */
    private $payeeParty;

    /**
     * @var null|BuyerCustomerParty
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\BuyerCustomerParty")
     * @JMS\Expose
     * @JMS\SerializedName("BuyerCustomerParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getBuyerCustomerParty", setter="setBuyerCustomerParty")
     */
    private $buyerCustomerParty;

    /**
     * @var null|SellerSupplierParty
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\SellerSupplierParty")
     * @JMS\Expose
     * @JMS\SerializedName("SellerSupplierParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSellerSupplierParty", setter="setSellerSupplierParty")
     */
    private $sellerSupplierParty;

    /**
     * @var null|TaxRepresentativeParty
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\TaxRepresentativeParty")
     * @JMS\Expose
     * @JMS\SerializedName("TaxRepresentativeParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTaxRepresentativeParty", setter="setTaxRepresentativeParty")
     */
    private $taxRepresentativeParty;

    /**
     * @var null|array<Delivery>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\Delivery>")
     * @JMS\Expose
     * @JMS\SerializedName("Delivery")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Delivery", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getDelivery", setter="setDelivery")
     */
    private $delivery;

    /**
     * @var null|DeliveryTerms
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\DeliveryTerms")
     * @JMS\Expose
     * @JMS\SerializedName("DeliveryTerms")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDeliveryTerms", setter="setDeliveryTerms")
     */
    private $deliveryTerms;

    /**
     * @var null|array<PaymentMeans>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\PaymentMeans>")
     * @JMS\Expose
     * @JMS\SerializedName("PaymentMeans")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PaymentMeans", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getPaymentMeans", setter="setPaymentMeans")
     */
    private $paymentMeans;

    /**
     * @var null|array<PaymentTerms>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\PaymentTerms>")
     * @JMS\Expose
     * @JMS\SerializedName("PaymentTerms")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PaymentTerms", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getPaymentTerms", setter="setPaymentTerms")
     */
    private $paymentTerms;

    /**
     * @var null|array<PrepaidPayment>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\PrepaidPayment>")
     * @JMS\Expose
     * @JMS\SerializedName("PrepaidPayment")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PrepaidPayment", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getPrepaidPayment", setter="setPrepaidPayment")
     */
    private $prepaidPayment;

    /**
     * @var null|array<AllowanceCharge>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\AllowanceCharge>")
     * @JMS\Expose
     * @JMS\SerializedName("AllowanceCharge")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="AllowanceCharge", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getAllowanceCharge", setter="setAllowanceCharge")
     */
    private $allowanceCharge;

    /**
     * @var null|TaxExchangeRate
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\TaxExchangeRate")
     * @JMS\Expose
     * @JMS\SerializedName("TaxExchangeRate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTaxExchangeRate", setter="setTaxExchangeRate")
     */
    private $taxExchangeRate;

    /**
     * @var null|PricingExchangeRate
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\PricingExchangeRate")
     * @JMS\Expose
     * @JMS\SerializedName("PricingExchangeRate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPricingExchangeRate", setter="setPricingExchangeRate")
     */
    private $pricingExchangeRate;

    /**
     * @var null|PaymentExchangeRate
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\PaymentExchangeRate")
     * @JMS\Expose
     * @JMS\SerializedName("PaymentExchangeRate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPaymentExchangeRate", setter="setPaymentExchangeRate")
     */
    private $paymentExchangeRate;

    /**
     * @var null|PaymentAlternativeExchangeRate
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\PaymentAlternativeExchangeRate")
     * @JMS\Expose
     * @JMS\SerializedName("PaymentAlternativeExchangeRate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPaymentAlternativeExchangeRate", setter="setPaymentAlternativeExchangeRate")
     */
    private $paymentAlternativeExchangeRate;

    /**
     * @var null|array<TaxTotal>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\TaxTotal>")
     * @JMS\Expose
     * @JMS\SerializedName("TaxTotal")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TaxTotal", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getTaxTotal", setter="setTaxTotal")
     */
    private $taxTotal;

    /**
     * @var null|array<WithholdingTaxTotal>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\WithholdingTaxTotal>")
     * @JMS\Expose
     * @JMS\SerializedName("WithholdingTaxTotal")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="WithholdingTaxTotal", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getWithholdingTaxTotal", setter="setWithholdingTaxTotal")
     */
    private $withholdingTaxTotal;

    /**
     * @var null|LegalMonetaryTotal
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\LegalMonetaryTotal")
     * @JMS\Expose
     * @JMS\SerializedName("LegalMonetaryTotal")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLegalMonetaryTotal", setter="setLegalMonetaryTotal")
     */
    private $legalMonetaryTotal;

    /**
     * @var null|array<InvoiceLine>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\InvoiceLine>")
     * @JMS\Expose
     * @JMS\SerializedName("InvoiceLine")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="InvoiceLine", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getInvoiceLine", setter="setInvoiceLine")
     */
    private $invoiceLine;

    /**
     * @return null|array<UBLExtension>
     */
    public function getUBLExtensions(): ?array
    {
        return $this->uBLExtensions;
    }

    /**
     * @param  null|array<UBLExtension> $uBLExtensions
     * @return static
     */
    public function setUBLExtensions(?array $uBLExtensions = null): static
    {
        $this->uBLExtensions = $uBLExtensions;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetUBLExtensions(): static
    {
        $this->uBLExtensions = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearUBLExtensions(): static
    {
        $this->uBLExtensions = [];

        return $this;
    }

    /**
     * @return null|UBLExtension
     */
    public function firstUBLExtensions(): ?UBLExtension
    {
        $uBLExtensions = $this->uBLExtensions ?? [];
        $uBLExtensions = reset($uBLExtensions);

        if (false === $uBLExtensions) {
            return null;
        }

        return $uBLExtensions;
    }

    /**
     * @return null|UBLExtension
     */
    public function lastUBLExtensions(): ?UBLExtension
    {
        $uBLExtensions = $this->uBLExtensions ?? [];
        $uBLExtensions = end($uBLExtensions);

        if (false === $uBLExtensions) {
            return null;
        }

        return $uBLExtensions;
    }

    /**
     * @param  UBLExtension $uBLExtensions
     * @return static
     */
    public function addToUBLExtensions(UBLExtension $uBLExtensions): static
    {
        $this->uBLExtensions[] = $uBLExtensions;

        return $this;
    }

    /**
     * @return UBLExtension
     */
    public function addToUBLExtensionsWithCreate(): UBLExtension
    {
        $this->addTouBLExtensions($uBLExtensions = new UBLExtension());

        return $uBLExtensions;
    }

    /**
     * @param  UBLExtension $uBLExtensions
     * @return static
     */
    public function addOnceToUBLExtensions(UBLExtension $uBLExtensions): static
    {
        if (!is_array($this->uBLExtensions)) {
            $this->uBLExtensions = [];
        }

        $this->uBLExtensions[0] = $uBLExtensions;

        return $this;
    }

    /**
     * @return UBLExtension
     */
    public function addOnceToUBLExtensionsWithCreate(): UBLExtension
    {
        if (!is_array($this->uBLExtensions)) {
            $this->uBLExtensions = [];
        }

        if ([] === $this->uBLExtensions) {
            $this->addOnceTouBLExtensions(new UBLExtension());
        }

        return $this->uBLExtensions[0];
    }

    /**
     * @return null|UBLVersionID
     */
    public function getUBLVersionID(): ?UBLVersionID
    {
        return $this->uBLVersionID;
    }

    /**
     * @return UBLVersionID
     */
    public function getUBLVersionIDWithCreate(): UBLVersionID
    {
        $this->uBLVersionID = is_null($this->uBLVersionID) ? new UBLVersionID() : $this->uBLVersionID;

        return $this->uBLVersionID;
    }

    /**
     * @param  null|UBLVersionID $uBLVersionID
     * @return static
     */
    public function setUBLVersionID(?UBLVersionID $uBLVersionID = null): static
    {
        $this->uBLVersionID = $uBLVersionID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetUBLVersionID(): static
    {
        $this->uBLVersionID = null;

        return $this;
    }

    /**
     * @return null|CustomizationID
     */
    public function getCustomizationID(): ?CustomizationID
    {
        return $this->customizationID;
    }

    /**
     * @return CustomizationID
     */
    public function getCustomizationIDWithCreate(): CustomizationID
    {
        $this->customizationID = is_null($this->customizationID) ? new CustomizationID() : $this->customizationID;

        return $this->customizationID;
    }

    /**
     * @param  null|CustomizationID $customizationID
     * @return static
     */
    public function setCustomizationID(?CustomizationID $customizationID = null): static
    {
        $this->customizationID = $customizationID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCustomizationID(): static
    {
        $this->customizationID = null;

        return $this;
    }

    /**
     * @return null|ProfileID
     */
    public function getProfileID(): ?ProfileID
    {
        return $this->profileID;
    }

    /**
     * @return ProfileID
     */
    public function getProfileIDWithCreate(): ProfileID
    {
        $this->profileID = is_null($this->profileID) ? new ProfileID() : $this->profileID;

        return $this->profileID;
    }

    /**
     * @param  null|ProfileID $profileID
     * @return static
     */
    public function setProfileID(?ProfileID $profileID = null): static
    {
        $this->profileID = $profileID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetProfileID(): static
    {
        $this->profileID = null;

        return $this;
    }

    /**
     * @return null|ProfileExecutionID
     */
    public function getProfileExecutionID(): ?ProfileExecutionID
    {
        return $this->profileExecutionID;
    }

    /**
     * @return ProfileExecutionID
     */
    public function getProfileExecutionIDWithCreate(): ProfileExecutionID
    {
        $this->profileExecutionID = is_null($this->profileExecutionID) ? new ProfileExecutionID() : $this->profileExecutionID;

        return $this->profileExecutionID;
    }

    /**
     * @param  null|ProfileExecutionID $profileExecutionID
     * @return static
     */
    public function setProfileExecutionID(?ProfileExecutionID $profileExecutionID = null): static
    {
        $this->profileExecutionID = $profileExecutionID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetProfileExecutionID(): static
    {
        $this->profileExecutionID = null;

        return $this;
    }

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
     * @return null|bool
     */
    public function getCopyIndicator(): ?bool
    {
        return $this->copyIndicator;
    }

    /**
     * @param  null|bool $copyIndicator
     * @return static
     */
    public function setCopyIndicator(?bool $copyIndicator = null): static
    {
        $this->copyIndicator = $copyIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCopyIndicator(): static
    {
        $this->copyIndicator = null;

        return $this;
    }

    /**
     * @return null|UUID
     */
    public function getUUID(): ?UUID
    {
        return $this->uUID;
    }

    /**
     * @return UUID
     */
    public function getUUIDWithCreate(): UUID
    {
        $this->uUID = is_null($this->uUID) ? new UUID() : $this->uUID;

        return $this->uUID;
    }

    /**
     * @param  null|UUID $uUID
     * @return static
     */
    public function setUUID(?UUID $uUID = null): static
    {
        $this->uUID = $uUID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetUUID(): static
    {
        $this->uUID = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getIssueDate(): ?DateTimeInterface
    {
        return $this->issueDate;
    }

    /**
     * @param  null|DateTimeInterface $issueDate
     * @return static
     */
    public function setIssueDate(?DateTimeInterface $issueDate = null): static
    {
        $this->issueDate = $issueDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetIssueDate(): static
    {
        $this->issueDate = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getIssueTime(): ?DateTimeInterface
    {
        return $this->issueTime;
    }

    /**
     * @param  null|DateTimeInterface $issueTime
     * @return static
     */
    public function setIssueTime(?DateTimeInterface $issueTime = null): static
    {
        $this->issueTime = $issueTime;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetIssueTime(): static
    {
        $this->issueTime = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getDueDate(): ?DateTimeInterface
    {
        return $this->dueDate;
    }

    /**
     * @param  null|DateTimeInterface $dueDate
     * @return static
     */
    public function setDueDate(?DateTimeInterface $dueDate = null): static
    {
        $this->dueDate = $dueDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDueDate(): static
    {
        $this->dueDate = null;

        return $this;
    }

    /**
     * @return null|InvoiceTypeCode
     */
    public function getInvoiceTypeCode(): ?InvoiceTypeCode
    {
        return $this->invoiceTypeCode;
    }

    /**
     * @return InvoiceTypeCode
     */
    public function getInvoiceTypeCodeWithCreate(): InvoiceTypeCode
    {
        $this->invoiceTypeCode = is_null($this->invoiceTypeCode) ? new InvoiceTypeCode() : $this->invoiceTypeCode;

        return $this->invoiceTypeCode;
    }

    /**
     * @param  null|InvoiceTypeCode $invoiceTypeCode
     * @return static
     */
    public function setInvoiceTypeCode(?InvoiceTypeCode $invoiceTypeCode = null): static
    {
        $this->invoiceTypeCode = $invoiceTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetInvoiceTypeCode(): static
    {
        $this->invoiceTypeCode = null;

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
     * @return null|DateTimeInterface
     */
    public function getTaxPointDate(): ?DateTimeInterface
    {
        return $this->taxPointDate;
    }

    /**
     * @param  null|DateTimeInterface $taxPointDate
     * @return static
     */
    public function setTaxPointDate(?DateTimeInterface $taxPointDate = null): static
    {
        $this->taxPointDate = $taxPointDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTaxPointDate(): static
    {
        $this->taxPointDate = null;

        return $this;
    }

    /**
     * @return null|DocumentCurrencyCode
     */
    public function getDocumentCurrencyCode(): ?DocumentCurrencyCode
    {
        return $this->documentCurrencyCode;
    }

    /**
     * @return DocumentCurrencyCode
     */
    public function getDocumentCurrencyCodeWithCreate(): DocumentCurrencyCode
    {
        $this->documentCurrencyCode = is_null($this->documentCurrencyCode) ? new DocumentCurrencyCode() : $this->documentCurrencyCode;

        return $this->documentCurrencyCode;
    }

    /**
     * @param  null|DocumentCurrencyCode $documentCurrencyCode
     * @return static
     */
    public function setDocumentCurrencyCode(?DocumentCurrencyCode $documentCurrencyCode = null): static
    {
        $this->documentCurrencyCode = $documentCurrencyCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDocumentCurrencyCode(): static
    {
        $this->documentCurrencyCode = null;

        return $this;
    }

    /**
     * @return null|TaxCurrencyCode
     */
    public function getTaxCurrencyCode(): ?TaxCurrencyCode
    {
        return $this->taxCurrencyCode;
    }

    /**
     * @return TaxCurrencyCode
     */
    public function getTaxCurrencyCodeWithCreate(): TaxCurrencyCode
    {
        $this->taxCurrencyCode = is_null($this->taxCurrencyCode) ? new TaxCurrencyCode() : $this->taxCurrencyCode;

        return $this->taxCurrencyCode;
    }

    /**
     * @param  null|TaxCurrencyCode $taxCurrencyCode
     * @return static
     */
    public function setTaxCurrencyCode(?TaxCurrencyCode $taxCurrencyCode = null): static
    {
        $this->taxCurrencyCode = $taxCurrencyCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTaxCurrencyCode(): static
    {
        $this->taxCurrencyCode = null;

        return $this;
    }

    /**
     * @return null|PricingCurrencyCode
     */
    public function getPricingCurrencyCode(): ?PricingCurrencyCode
    {
        return $this->pricingCurrencyCode;
    }

    /**
     * @return PricingCurrencyCode
     */
    public function getPricingCurrencyCodeWithCreate(): PricingCurrencyCode
    {
        $this->pricingCurrencyCode = is_null($this->pricingCurrencyCode) ? new PricingCurrencyCode() : $this->pricingCurrencyCode;

        return $this->pricingCurrencyCode;
    }

    /**
     * @param  null|PricingCurrencyCode $pricingCurrencyCode
     * @return static
     */
    public function setPricingCurrencyCode(?PricingCurrencyCode $pricingCurrencyCode = null): static
    {
        $this->pricingCurrencyCode = $pricingCurrencyCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPricingCurrencyCode(): static
    {
        $this->pricingCurrencyCode = null;

        return $this;
    }

    /**
     * @return null|PaymentCurrencyCode
     */
    public function getPaymentCurrencyCode(): ?PaymentCurrencyCode
    {
        return $this->paymentCurrencyCode;
    }

    /**
     * @return PaymentCurrencyCode
     */
    public function getPaymentCurrencyCodeWithCreate(): PaymentCurrencyCode
    {
        $this->paymentCurrencyCode = is_null($this->paymentCurrencyCode) ? new PaymentCurrencyCode() : $this->paymentCurrencyCode;

        return $this->paymentCurrencyCode;
    }

    /**
     * @param  null|PaymentCurrencyCode $paymentCurrencyCode
     * @return static
     */
    public function setPaymentCurrencyCode(?PaymentCurrencyCode $paymentCurrencyCode = null): static
    {
        $this->paymentCurrencyCode = $paymentCurrencyCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPaymentCurrencyCode(): static
    {
        $this->paymentCurrencyCode = null;

        return $this;
    }

    /**
     * @return null|PaymentAlternativeCurrencyCode
     */
    public function getPaymentAlternativeCurrencyCode(): ?PaymentAlternativeCurrencyCode
    {
        return $this->paymentAlternativeCurrencyCode;
    }

    /**
     * @return PaymentAlternativeCurrencyCode
     */
    public function getPaymentAlternativeCurrencyCodeWithCreate(): PaymentAlternativeCurrencyCode
    {
        $this->paymentAlternativeCurrencyCode = is_null($this->paymentAlternativeCurrencyCode) ? new PaymentAlternativeCurrencyCode() : $this->paymentAlternativeCurrencyCode;

        return $this->paymentAlternativeCurrencyCode;
    }

    /**
     * @param  null|PaymentAlternativeCurrencyCode $paymentAlternativeCurrencyCode
     * @return static
     */
    public function setPaymentAlternativeCurrencyCode(
        ?PaymentAlternativeCurrencyCode $paymentAlternativeCurrencyCode = null,
    ): static {
        $this->paymentAlternativeCurrencyCode = $paymentAlternativeCurrencyCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPaymentAlternativeCurrencyCode(): static
    {
        $this->paymentAlternativeCurrencyCode = null;

        return $this;
    }

    /**
     * @return null|AccountingCostCode
     */
    public function getAccountingCostCode(): ?AccountingCostCode
    {
        return $this->accountingCostCode;
    }

    /**
     * @return AccountingCostCode
     */
    public function getAccountingCostCodeWithCreate(): AccountingCostCode
    {
        $this->accountingCostCode = is_null($this->accountingCostCode) ? new AccountingCostCode() : $this->accountingCostCode;

        return $this->accountingCostCode;
    }

    /**
     * @param  null|AccountingCostCode $accountingCostCode
     * @return static
     */
    public function setAccountingCostCode(?AccountingCostCode $accountingCostCode = null): static
    {
        $this->accountingCostCode = $accountingCostCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAccountingCostCode(): static
    {
        $this->accountingCostCode = null;

        return $this;
    }

    /**
     * @return null|AccountingCost
     */
    public function getAccountingCost(): ?AccountingCost
    {
        return $this->accountingCost;
    }

    /**
     * @return AccountingCost
     */
    public function getAccountingCostWithCreate(): AccountingCost
    {
        $this->accountingCost = is_null($this->accountingCost) ? new AccountingCost() : $this->accountingCost;

        return $this->accountingCost;
    }

    /**
     * @param  null|AccountingCost $accountingCost
     * @return static
     */
    public function setAccountingCost(?AccountingCost $accountingCost = null): static
    {
        $this->accountingCost = $accountingCost;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAccountingCost(): static
    {
        $this->accountingCost = null;

        return $this;
    }

    /**
     * @return null|LineCountNumeric
     */
    public function getLineCountNumeric(): ?LineCountNumeric
    {
        return $this->lineCountNumeric;
    }

    /**
     * @return LineCountNumeric
     */
    public function getLineCountNumericWithCreate(): LineCountNumeric
    {
        $this->lineCountNumeric = is_null($this->lineCountNumeric) ? new LineCountNumeric() : $this->lineCountNumeric;

        return $this->lineCountNumeric;
    }

    /**
     * @param  null|LineCountNumeric $lineCountNumeric
     * @return static
     */
    public function setLineCountNumeric(?LineCountNumeric $lineCountNumeric = null): static
    {
        $this->lineCountNumeric = $lineCountNumeric;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLineCountNumeric(): static
    {
        $this->lineCountNumeric = null;

        return $this;
    }

    /**
     * @return null|BuyerReference
     */
    public function getBuyerReference(): ?BuyerReference
    {
        return $this->buyerReference;
    }

    /**
     * @return BuyerReference
     */
    public function getBuyerReferenceWithCreate(): BuyerReference
    {
        $this->buyerReference = is_null($this->buyerReference) ? new BuyerReference() : $this->buyerReference;

        return $this->buyerReference;
    }

    /**
     * @param  null|BuyerReference $buyerReference
     * @return static
     */
    public function setBuyerReference(?BuyerReference $buyerReference = null): static
    {
        $this->buyerReference = $buyerReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetBuyerReference(): static
    {
        $this->buyerReference = null;

        return $this;
    }

    /**
     * @return null|array<InvoicePeriod>
     */
    public function getInvoicePeriod(): ?array
    {
        return $this->invoicePeriod;
    }

    /**
     * @param  null|array<InvoicePeriod> $invoicePeriod
     * @return static
     */
    public function setInvoicePeriod(?array $invoicePeriod = null): static
    {
        $this->invoicePeriod = $invoicePeriod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetInvoicePeriod(): static
    {
        $this->invoicePeriod = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearInvoicePeriod(): static
    {
        $this->invoicePeriod = [];

        return $this;
    }

    /**
     * @return null|InvoicePeriod
     */
    public function firstInvoicePeriod(): ?InvoicePeriod
    {
        $invoicePeriod = $this->invoicePeriod ?? [];
        $invoicePeriod = reset($invoicePeriod);

        if (false === $invoicePeriod) {
            return null;
        }

        return $invoicePeriod;
    }

    /**
     * @return null|InvoicePeriod
     */
    public function lastInvoicePeriod(): ?InvoicePeriod
    {
        $invoicePeriod = $this->invoicePeriod ?? [];
        $invoicePeriod = end($invoicePeriod);

        if (false === $invoicePeriod) {
            return null;
        }

        return $invoicePeriod;
    }

    /**
     * @param  InvoicePeriod $invoicePeriod
     * @return static
     */
    public function addToInvoicePeriod(InvoicePeriod $invoicePeriod): static
    {
        $this->invoicePeriod[] = $invoicePeriod;

        return $this;
    }

    /**
     * @return InvoicePeriod
     */
    public function addToInvoicePeriodWithCreate(): InvoicePeriod
    {
        $this->addToinvoicePeriod($invoicePeriod = new InvoicePeriod());

        return $invoicePeriod;
    }

    /**
     * @param  InvoicePeriod $invoicePeriod
     * @return static
     */
    public function addOnceToInvoicePeriod(InvoicePeriod $invoicePeriod): static
    {
        if (!is_array($this->invoicePeriod)) {
            $this->invoicePeriod = [];
        }

        $this->invoicePeriod[0] = $invoicePeriod;

        return $this;
    }

    /**
     * @return InvoicePeriod
     */
    public function addOnceToInvoicePeriodWithCreate(): InvoicePeriod
    {
        if (!is_array($this->invoicePeriod)) {
            $this->invoicePeriod = [];
        }

        if ([] === $this->invoicePeriod) {
            $this->addOnceToinvoicePeriod(new InvoicePeriod());
        }

        return $this->invoicePeriod[0];
    }

    /**
     * @return null|OrderReference
     */
    public function getOrderReference(): ?OrderReference
    {
        return $this->orderReference;
    }

    /**
     * @return OrderReference
     */
    public function getOrderReferenceWithCreate(): OrderReference
    {
        $this->orderReference = is_null($this->orderReference) ? new OrderReference() : $this->orderReference;

        return $this->orderReference;
    }

    /**
     * @param  null|OrderReference $orderReference
     * @return static
     */
    public function setOrderReference(?OrderReference $orderReference = null): static
    {
        $this->orderReference = $orderReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetOrderReference(): static
    {
        $this->orderReference = null;

        return $this;
    }

    /**
     * @return null|array<BillingReference>
     */
    public function getBillingReference(): ?array
    {
        return $this->billingReference;
    }

    /**
     * @param  null|array<BillingReference> $billingReference
     * @return static
     */
    public function setBillingReference(?array $billingReference = null): static
    {
        $this->billingReference = $billingReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetBillingReference(): static
    {
        $this->billingReference = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearBillingReference(): static
    {
        $this->billingReference = [];

        return $this;
    }

    /**
     * @return null|BillingReference
     */
    public function firstBillingReference(): ?BillingReference
    {
        $billingReference = $this->billingReference ?? [];
        $billingReference = reset($billingReference);

        if (false === $billingReference) {
            return null;
        }

        return $billingReference;
    }

    /**
     * @return null|BillingReference
     */
    public function lastBillingReference(): ?BillingReference
    {
        $billingReference = $this->billingReference ?? [];
        $billingReference = end($billingReference);

        if (false === $billingReference) {
            return null;
        }

        return $billingReference;
    }

    /**
     * @param  BillingReference $billingReference
     * @return static
     */
    public function addToBillingReference(BillingReference $billingReference): static
    {
        $this->billingReference[] = $billingReference;

        return $this;
    }

    /**
     * @return BillingReference
     */
    public function addToBillingReferenceWithCreate(): BillingReference
    {
        $this->addTobillingReference($billingReference = new BillingReference());

        return $billingReference;
    }

    /**
     * @param  BillingReference $billingReference
     * @return static
     */
    public function addOnceToBillingReference(BillingReference $billingReference): static
    {
        if (!is_array($this->billingReference)) {
            $this->billingReference = [];
        }

        $this->billingReference[0] = $billingReference;

        return $this;
    }

    /**
     * @return BillingReference
     */
    public function addOnceToBillingReferenceWithCreate(): BillingReference
    {
        if (!is_array($this->billingReference)) {
            $this->billingReference = [];
        }

        if ([] === $this->billingReference) {
            $this->addOnceTobillingReference(new BillingReference());
        }

        return $this->billingReference[0];
    }

    /**
     * @return null|array<DespatchDocumentReference>
     */
    public function getDespatchDocumentReference(): ?array
    {
        return $this->despatchDocumentReference;
    }

    /**
     * @param  null|array<DespatchDocumentReference> $despatchDocumentReference
     * @return static
     */
    public function setDespatchDocumentReference(?array $despatchDocumentReference = null): static
    {
        $this->despatchDocumentReference = $despatchDocumentReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDespatchDocumentReference(): static
    {
        $this->despatchDocumentReference = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearDespatchDocumentReference(): static
    {
        $this->despatchDocumentReference = [];

        return $this;
    }

    /**
     * @return null|DespatchDocumentReference
     */
    public function firstDespatchDocumentReference(): ?DespatchDocumentReference
    {
        $despatchDocumentReference = $this->despatchDocumentReference ?? [];
        $despatchDocumentReference = reset($despatchDocumentReference);

        if (false === $despatchDocumentReference) {
            return null;
        }

        return $despatchDocumentReference;
    }

    /**
     * @return null|DespatchDocumentReference
     */
    public function lastDespatchDocumentReference(): ?DespatchDocumentReference
    {
        $despatchDocumentReference = $this->despatchDocumentReference ?? [];
        $despatchDocumentReference = end($despatchDocumentReference);

        if (false === $despatchDocumentReference) {
            return null;
        }

        return $despatchDocumentReference;
    }

    /**
     * @param  DespatchDocumentReference $despatchDocumentReference
     * @return static
     */
    public function addToDespatchDocumentReference(DespatchDocumentReference $despatchDocumentReference): static
    {
        $this->despatchDocumentReference[] = $despatchDocumentReference;

        return $this;
    }

    /**
     * @return DespatchDocumentReference
     */
    public function addToDespatchDocumentReferenceWithCreate(): DespatchDocumentReference
    {
        $this->addTodespatchDocumentReference($despatchDocumentReference = new DespatchDocumentReference());

        return $despatchDocumentReference;
    }

    /**
     * @param  DespatchDocumentReference $despatchDocumentReference
     * @return static
     */
    public function addOnceToDespatchDocumentReference(DespatchDocumentReference $despatchDocumentReference): static
    {
        if (!is_array($this->despatchDocumentReference)) {
            $this->despatchDocumentReference = [];
        }

        $this->despatchDocumentReference[0] = $despatchDocumentReference;

        return $this;
    }

    /**
     * @return DespatchDocumentReference
     */
    public function addOnceToDespatchDocumentReferenceWithCreate(): DespatchDocumentReference
    {
        if (!is_array($this->despatchDocumentReference)) {
            $this->despatchDocumentReference = [];
        }

        if ([] === $this->despatchDocumentReference) {
            $this->addOnceTodespatchDocumentReference(new DespatchDocumentReference());
        }

        return $this->despatchDocumentReference[0];
    }

    /**
     * @return null|array<ReceiptDocumentReference>
     */
    public function getReceiptDocumentReference(): ?array
    {
        return $this->receiptDocumentReference;
    }

    /**
     * @param  null|array<ReceiptDocumentReference> $receiptDocumentReference
     * @return static
     */
    public function setReceiptDocumentReference(?array $receiptDocumentReference = null): static
    {
        $this->receiptDocumentReference = $receiptDocumentReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetReceiptDocumentReference(): static
    {
        $this->receiptDocumentReference = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearReceiptDocumentReference(): static
    {
        $this->receiptDocumentReference = [];

        return $this;
    }

    /**
     * @return null|ReceiptDocumentReference
     */
    public function firstReceiptDocumentReference(): ?ReceiptDocumentReference
    {
        $receiptDocumentReference = $this->receiptDocumentReference ?? [];
        $receiptDocumentReference = reset($receiptDocumentReference);

        if (false === $receiptDocumentReference) {
            return null;
        }

        return $receiptDocumentReference;
    }

    /**
     * @return null|ReceiptDocumentReference
     */
    public function lastReceiptDocumentReference(): ?ReceiptDocumentReference
    {
        $receiptDocumentReference = $this->receiptDocumentReference ?? [];
        $receiptDocumentReference = end($receiptDocumentReference);

        if (false === $receiptDocumentReference) {
            return null;
        }

        return $receiptDocumentReference;
    }

    /**
     * @param  ReceiptDocumentReference $receiptDocumentReference
     * @return static
     */
    public function addToReceiptDocumentReference(ReceiptDocumentReference $receiptDocumentReference): static
    {
        $this->receiptDocumentReference[] = $receiptDocumentReference;

        return $this;
    }

    /**
     * @return ReceiptDocumentReference
     */
    public function addToReceiptDocumentReferenceWithCreate(): ReceiptDocumentReference
    {
        $this->addToreceiptDocumentReference($receiptDocumentReference = new ReceiptDocumentReference());

        return $receiptDocumentReference;
    }

    /**
     * @param  ReceiptDocumentReference $receiptDocumentReference
     * @return static
     */
    public function addOnceToReceiptDocumentReference(ReceiptDocumentReference $receiptDocumentReference): static
    {
        if (!is_array($this->receiptDocumentReference)) {
            $this->receiptDocumentReference = [];
        }

        $this->receiptDocumentReference[0] = $receiptDocumentReference;

        return $this;
    }

    /**
     * @return ReceiptDocumentReference
     */
    public function addOnceToReceiptDocumentReferenceWithCreate(): ReceiptDocumentReference
    {
        if (!is_array($this->receiptDocumentReference)) {
            $this->receiptDocumentReference = [];
        }

        if ([] === $this->receiptDocumentReference) {
            $this->addOnceToreceiptDocumentReference(new ReceiptDocumentReference());
        }

        return $this->receiptDocumentReference[0];
    }

    /**
     * @return null|array<StatementDocumentReference>
     */
    public function getStatementDocumentReference(): ?array
    {
        return $this->statementDocumentReference;
    }

    /**
     * @param  null|array<StatementDocumentReference> $statementDocumentReference
     * @return static
     */
    public function setStatementDocumentReference(?array $statementDocumentReference = null): static
    {
        $this->statementDocumentReference = $statementDocumentReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetStatementDocumentReference(): static
    {
        $this->statementDocumentReference = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearStatementDocumentReference(): static
    {
        $this->statementDocumentReference = [];

        return $this;
    }

    /**
     * @return null|StatementDocumentReference
     */
    public function firstStatementDocumentReference(): ?StatementDocumentReference
    {
        $statementDocumentReference = $this->statementDocumentReference ?? [];
        $statementDocumentReference = reset($statementDocumentReference);

        if (false === $statementDocumentReference) {
            return null;
        }

        return $statementDocumentReference;
    }

    /**
     * @return null|StatementDocumentReference
     */
    public function lastStatementDocumentReference(): ?StatementDocumentReference
    {
        $statementDocumentReference = $this->statementDocumentReference ?? [];
        $statementDocumentReference = end($statementDocumentReference);

        if (false === $statementDocumentReference) {
            return null;
        }

        return $statementDocumentReference;
    }

    /**
     * @param  StatementDocumentReference $statementDocumentReference
     * @return static
     */
    public function addToStatementDocumentReference(StatementDocumentReference $statementDocumentReference): static
    {
        $this->statementDocumentReference[] = $statementDocumentReference;

        return $this;
    }

    /**
     * @return StatementDocumentReference
     */
    public function addToStatementDocumentReferenceWithCreate(): StatementDocumentReference
    {
        $this->addTostatementDocumentReference($statementDocumentReference = new StatementDocumentReference());

        return $statementDocumentReference;
    }

    /**
     * @param  StatementDocumentReference $statementDocumentReference
     * @return static
     */
    public function addOnceToStatementDocumentReference(StatementDocumentReference $statementDocumentReference): static
    {
        if (!is_array($this->statementDocumentReference)) {
            $this->statementDocumentReference = [];
        }

        $this->statementDocumentReference[0] = $statementDocumentReference;

        return $this;
    }

    /**
     * @return StatementDocumentReference
     */
    public function addOnceToStatementDocumentReferenceWithCreate(): StatementDocumentReference
    {
        if (!is_array($this->statementDocumentReference)) {
            $this->statementDocumentReference = [];
        }

        if ([] === $this->statementDocumentReference) {
            $this->addOnceTostatementDocumentReference(new StatementDocumentReference());
        }

        return $this->statementDocumentReference[0];
    }

    /**
     * @return null|array<OriginatorDocumentReference>
     */
    public function getOriginatorDocumentReference(): ?array
    {
        return $this->originatorDocumentReference;
    }

    /**
     * @param  null|array<OriginatorDocumentReference> $originatorDocumentReference
     * @return static
     */
    public function setOriginatorDocumentReference(?array $originatorDocumentReference = null): static
    {
        $this->originatorDocumentReference = $originatorDocumentReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetOriginatorDocumentReference(): static
    {
        $this->originatorDocumentReference = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearOriginatorDocumentReference(): static
    {
        $this->originatorDocumentReference = [];

        return $this;
    }

    /**
     * @return null|OriginatorDocumentReference
     */
    public function firstOriginatorDocumentReference(): ?OriginatorDocumentReference
    {
        $originatorDocumentReference = $this->originatorDocumentReference ?? [];
        $originatorDocumentReference = reset($originatorDocumentReference);

        if (false === $originatorDocumentReference) {
            return null;
        }

        return $originatorDocumentReference;
    }

    /**
     * @return null|OriginatorDocumentReference
     */
    public function lastOriginatorDocumentReference(): ?OriginatorDocumentReference
    {
        $originatorDocumentReference = $this->originatorDocumentReference ?? [];
        $originatorDocumentReference = end($originatorDocumentReference);

        if (false === $originatorDocumentReference) {
            return null;
        }

        return $originatorDocumentReference;
    }

    /**
     * @param  OriginatorDocumentReference $originatorDocumentReference
     * @return static
     */
    public function addToOriginatorDocumentReference(OriginatorDocumentReference $originatorDocumentReference): static
    {
        $this->originatorDocumentReference[] = $originatorDocumentReference;

        return $this;
    }

    /**
     * @return OriginatorDocumentReference
     */
    public function addToOriginatorDocumentReferenceWithCreate(): OriginatorDocumentReference
    {
        $this->addTooriginatorDocumentReference($originatorDocumentReference = new OriginatorDocumentReference());

        return $originatorDocumentReference;
    }

    /**
     * @param  OriginatorDocumentReference $originatorDocumentReference
     * @return static
     */
    public function addOnceToOriginatorDocumentReference(
        OriginatorDocumentReference $originatorDocumentReference,
    ): static {
        if (!is_array($this->originatorDocumentReference)) {
            $this->originatorDocumentReference = [];
        }

        $this->originatorDocumentReference[0] = $originatorDocumentReference;

        return $this;
    }

    /**
     * @return OriginatorDocumentReference
     */
    public function addOnceToOriginatorDocumentReferenceWithCreate(): OriginatorDocumentReference
    {
        if (!is_array($this->originatorDocumentReference)) {
            $this->originatorDocumentReference = [];
        }

        if ([] === $this->originatorDocumentReference) {
            $this->addOnceTooriginatorDocumentReference(new OriginatorDocumentReference());
        }

        return $this->originatorDocumentReference[0];
    }

    /**
     * @return null|array<ContractDocumentReference>
     */
    public function getContractDocumentReference(): ?array
    {
        return $this->contractDocumentReference;
    }

    /**
     * @param  null|array<ContractDocumentReference> $contractDocumentReference
     * @return static
     */
    public function setContractDocumentReference(?array $contractDocumentReference = null): static
    {
        $this->contractDocumentReference = $contractDocumentReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetContractDocumentReference(): static
    {
        $this->contractDocumentReference = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearContractDocumentReference(): static
    {
        $this->contractDocumentReference = [];

        return $this;
    }

    /**
     * @return null|ContractDocumentReference
     */
    public function firstContractDocumentReference(): ?ContractDocumentReference
    {
        $contractDocumentReference = $this->contractDocumentReference ?? [];
        $contractDocumentReference = reset($contractDocumentReference);

        if (false === $contractDocumentReference) {
            return null;
        }

        return $contractDocumentReference;
    }

    /**
     * @return null|ContractDocumentReference
     */
    public function lastContractDocumentReference(): ?ContractDocumentReference
    {
        $contractDocumentReference = $this->contractDocumentReference ?? [];
        $contractDocumentReference = end($contractDocumentReference);

        if (false === $contractDocumentReference) {
            return null;
        }

        return $contractDocumentReference;
    }

    /**
     * @param  ContractDocumentReference $contractDocumentReference
     * @return static
     */
    public function addToContractDocumentReference(ContractDocumentReference $contractDocumentReference): static
    {
        $this->contractDocumentReference[] = $contractDocumentReference;

        return $this;
    }

    /**
     * @return ContractDocumentReference
     */
    public function addToContractDocumentReferenceWithCreate(): ContractDocumentReference
    {
        $this->addTocontractDocumentReference($contractDocumentReference = new ContractDocumentReference());

        return $contractDocumentReference;
    }

    /**
     * @param  ContractDocumentReference $contractDocumentReference
     * @return static
     */
    public function addOnceToContractDocumentReference(ContractDocumentReference $contractDocumentReference): static
    {
        if (!is_array($this->contractDocumentReference)) {
            $this->contractDocumentReference = [];
        }

        $this->contractDocumentReference[0] = $contractDocumentReference;

        return $this;
    }

    /**
     * @return ContractDocumentReference
     */
    public function addOnceToContractDocumentReferenceWithCreate(): ContractDocumentReference
    {
        if (!is_array($this->contractDocumentReference)) {
            $this->contractDocumentReference = [];
        }

        if ([] === $this->contractDocumentReference) {
            $this->addOnceTocontractDocumentReference(new ContractDocumentReference());
        }

        return $this->contractDocumentReference[0];
    }

    /**
     * @return null|array<AdditionalDocumentReference>
     */
    public function getAdditionalDocumentReference(): ?array
    {
        return $this->additionalDocumentReference;
    }

    /**
     * @param  null|array<AdditionalDocumentReference> $additionalDocumentReference
     * @return static
     */
    public function setAdditionalDocumentReference(?array $additionalDocumentReference = null): static
    {
        $this->additionalDocumentReference = $additionalDocumentReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAdditionalDocumentReference(): static
    {
        $this->additionalDocumentReference = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearAdditionalDocumentReference(): static
    {
        $this->additionalDocumentReference = [];

        return $this;
    }

    /**
     * @return null|AdditionalDocumentReference
     */
    public function firstAdditionalDocumentReference(): ?AdditionalDocumentReference
    {
        $additionalDocumentReference = $this->additionalDocumentReference ?? [];
        $additionalDocumentReference = reset($additionalDocumentReference);

        if (false === $additionalDocumentReference) {
            return null;
        }

        return $additionalDocumentReference;
    }

    /**
     * @return null|AdditionalDocumentReference
     */
    public function lastAdditionalDocumentReference(): ?AdditionalDocumentReference
    {
        $additionalDocumentReference = $this->additionalDocumentReference ?? [];
        $additionalDocumentReference = end($additionalDocumentReference);

        if (false === $additionalDocumentReference) {
            return null;
        }

        return $additionalDocumentReference;
    }

    /**
     * @param  AdditionalDocumentReference $additionalDocumentReference
     * @return static
     */
    public function addToAdditionalDocumentReference(AdditionalDocumentReference $additionalDocumentReference): static
    {
        $this->additionalDocumentReference[] = $additionalDocumentReference;

        return $this;
    }

    /**
     * @return AdditionalDocumentReference
     */
    public function addToAdditionalDocumentReferenceWithCreate(): AdditionalDocumentReference
    {
        $this->addToadditionalDocumentReference($additionalDocumentReference = new AdditionalDocumentReference());

        return $additionalDocumentReference;
    }

    /**
     * @param  AdditionalDocumentReference $additionalDocumentReference
     * @return static
     */
    public function addOnceToAdditionalDocumentReference(
        AdditionalDocumentReference $additionalDocumentReference,
    ): static {
        if (!is_array($this->additionalDocumentReference)) {
            $this->additionalDocumentReference = [];
        }

        $this->additionalDocumentReference[0] = $additionalDocumentReference;

        return $this;
    }

    /**
     * @return AdditionalDocumentReference
     */
    public function addOnceToAdditionalDocumentReferenceWithCreate(): AdditionalDocumentReference
    {
        if (!is_array($this->additionalDocumentReference)) {
            $this->additionalDocumentReference = [];
        }

        if ([] === $this->additionalDocumentReference) {
            $this->addOnceToadditionalDocumentReference(new AdditionalDocumentReference());
        }

        return $this->additionalDocumentReference[0];
    }

    /**
     * @return null|array<ProjectReference>
     */
    public function getProjectReference(): ?array
    {
        return $this->projectReference;
    }

    /**
     * @param  null|array<ProjectReference> $projectReference
     * @return static
     */
    public function setProjectReference(?array $projectReference = null): static
    {
        $this->projectReference = $projectReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetProjectReference(): static
    {
        $this->projectReference = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearProjectReference(): static
    {
        $this->projectReference = [];

        return $this;
    }

    /**
     * @return null|ProjectReference
     */
    public function firstProjectReference(): ?ProjectReference
    {
        $projectReference = $this->projectReference ?? [];
        $projectReference = reset($projectReference);

        if (false === $projectReference) {
            return null;
        }

        return $projectReference;
    }

    /**
     * @return null|ProjectReference
     */
    public function lastProjectReference(): ?ProjectReference
    {
        $projectReference = $this->projectReference ?? [];
        $projectReference = end($projectReference);

        if (false === $projectReference) {
            return null;
        }

        return $projectReference;
    }

    /**
     * @param  ProjectReference $projectReference
     * @return static
     */
    public function addToProjectReference(ProjectReference $projectReference): static
    {
        $this->projectReference[] = $projectReference;

        return $this;
    }

    /**
     * @return ProjectReference
     */
    public function addToProjectReferenceWithCreate(): ProjectReference
    {
        $this->addToprojectReference($projectReference = new ProjectReference());

        return $projectReference;
    }

    /**
     * @param  ProjectReference $projectReference
     * @return static
     */
    public function addOnceToProjectReference(ProjectReference $projectReference): static
    {
        if (!is_array($this->projectReference)) {
            $this->projectReference = [];
        }

        $this->projectReference[0] = $projectReference;

        return $this;
    }

    /**
     * @return ProjectReference
     */
    public function addOnceToProjectReferenceWithCreate(): ProjectReference
    {
        if (!is_array($this->projectReference)) {
            $this->projectReference = [];
        }

        if ([] === $this->projectReference) {
            $this->addOnceToprojectReference(new ProjectReference());
        }

        return $this->projectReference[0];
    }

    /**
     * @return null|array<Signature>
     */
    public function getSignature(): ?array
    {
        return $this->signature;
    }

    /**
     * @param  null|array<Signature> $signature
     * @return static
     */
    public function setSignature(?array $signature = null): static
    {
        $this->signature = $signature;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSignature(): static
    {
        $this->signature = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearSignature(): static
    {
        $this->signature = [];

        return $this;
    }

    /**
     * @return null|Signature
     */
    public function firstSignature(): ?Signature
    {
        $signature = $this->signature ?? [];
        $signature = reset($signature);

        if (false === $signature) {
            return null;
        }

        return $signature;
    }

    /**
     * @return null|Signature
     */
    public function lastSignature(): ?Signature
    {
        $signature = $this->signature ?? [];
        $signature = end($signature);

        if (false === $signature) {
            return null;
        }

        return $signature;
    }

    /**
     * @param  Signature $signature
     * @return static
     */
    public function addToSignature(Signature $signature): static
    {
        $this->signature[] = $signature;

        return $this;
    }

    /**
     * @return Signature
     */
    public function addToSignatureWithCreate(): Signature
    {
        $this->addTosignature($signature = new Signature());

        return $signature;
    }

    /**
     * @param  Signature $signature
     * @return static
     */
    public function addOnceToSignature(Signature $signature): static
    {
        if (!is_array($this->signature)) {
            $this->signature = [];
        }

        $this->signature[0] = $signature;

        return $this;
    }

    /**
     * @return Signature
     */
    public function addOnceToSignatureWithCreate(): Signature
    {
        if (!is_array($this->signature)) {
            $this->signature = [];
        }

        if ([] === $this->signature) {
            $this->addOnceTosignature(new Signature());
        }

        return $this->signature[0];
    }

    /**
     * @return null|AccountingSupplierParty
     */
    public function getAccountingSupplierParty(): ?AccountingSupplierParty
    {
        return $this->accountingSupplierParty;
    }

    /**
     * @return AccountingSupplierParty
     */
    public function getAccountingSupplierPartyWithCreate(): AccountingSupplierParty
    {
        $this->accountingSupplierParty = is_null($this->accountingSupplierParty) ? new AccountingSupplierParty() : $this->accountingSupplierParty;

        return $this->accountingSupplierParty;
    }

    /**
     * @param  null|AccountingSupplierParty $accountingSupplierParty
     * @return static
     */
    public function setAccountingSupplierParty(?AccountingSupplierParty $accountingSupplierParty = null): static
    {
        $this->accountingSupplierParty = $accountingSupplierParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAccountingSupplierParty(): static
    {
        $this->accountingSupplierParty = null;

        return $this;
    }

    /**
     * @return null|AccountingCustomerParty
     */
    public function getAccountingCustomerParty(): ?AccountingCustomerParty
    {
        return $this->accountingCustomerParty;
    }

    /**
     * @return AccountingCustomerParty
     */
    public function getAccountingCustomerPartyWithCreate(): AccountingCustomerParty
    {
        $this->accountingCustomerParty = is_null($this->accountingCustomerParty) ? new AccountingCustomerParty() : $this->accountingCustomerParty;

        return $this->accountingCustomerParty;
    }

    /**
     * @param  null|AccountingCustomerParty $accountingCustomerParty
     * @return static
     */
    public function setAccountingCustomerParty(?AccountingCustomerParty $accountingCustomerParty = null): static
    {
        $this->accountingCustomerParty = $accountingCustomerParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAccountingCustomerParty(): static
    {
        $this->accountingCustomerParty = null;

        return $this;
    }

    /**
     * @return null|PayeeParty
     */
    public function getPayeeParty(): ?PayeeParty
    {
        return $this->payeeParty;
    }

    /**
     * @return PayeeParty
     */
    public function getPayeePartyWithCreate(): PayeeParty
    {
        $this->payeeParty = is_null($this->payeeParty) ? new PayeeParty() : $this->payeeParty;

        return $this->payeeParty;
    }

    /**
     * @param  null|PayeeParty $payeeParty
     * @return static
     */
    public function setPayeeParty(?PayeeParty $payeeParty = null): static
    {
        $this->payeeParty = $payeeParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPayeeParty(): static
    {
        $this->payeeParty = null;

        return $this;
    }

    /**
     * @return null|BuyerCustomerParty
     */
    public function getBuyerCustomerParty(): ?BuyerCustomerParty
    {
        return $this->buyerCustomerParty;
    }

    /**
     * @return BuyerCustomerParty
     */
    public function getBuyerCustomerPartyWithCreate(): BuyerCustomerParty
    {
        $this->buyerCustomerParty = is_null($this->buyerCustomerParty) ? new BuyerCustomerParty() : $this->buyerCustomerParty;

        return $this->buyerCustomerParty;
    }

    /**
     * @param  null|BuyerCustomerParty $buyerCustomerParty
     * @return static
     */
    public function setBuyerCustomerParty(?BuyerCustomerParty $buyerCustomerParty = null): static
    {
        $this->buyerCustomerParty = $buyerCustomerParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetBuyerCustomerParty(): static
    {
        $this->buyerCustomerParty = null;

        return $this;
    }

    /**
     * @return null|SellerSupplierParty
     */
    public function getSellerSupplierParty(): ?SellerSupplierParty
    {
        return $this->sellerSupplierParty;
    }

    /**
     * @return SellerSupplierParty
     */
    public function getSellerSupplierPartyWithCreate(): SellerSupplierParty
    {
        $this->sellerSupplierParty = is_null($this->sellerSupplierParty) ? new SellerSupplierParty() : $this->sellerSupplierParty;

        return $this->sellerSupplierParty;
    }

    /**
     * @param  null|SellerSupplierParty $sellerSupplierParty
     * @return static
     */
    public function setSellerSupplierParty(?SellerSupplierParty $sellerSupplierParty = null): static
    {
        $this->sellerSupplierParty = $sellerSupplierParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSellerSupplierParty(): static
    {
        $this->sellerSupplierParty = null;

        return $this;
    }

    /**
     * @return null|TaxRepresentativeParty
     */
    public function getTaxRepresentativeParty(): ?TaxRepresentativeParty
    {
        return $this->taxRepresentativeParty;
    }

    /**
     * @return TaxRepresentativeParty
     */
    public function getTaxRepresentativePartyWithCreate(): TaxRepresentativeParty
    {
        $this->taxRepresentativeParty = is_null($this->taxRepresentativeParty) ? new TaxRepresentativeParty() : $this->taxRepresentativeParty;

        return $this->taxRepresentativeParty;
    }

    /**
     * @param  null|TaxRepresentativeParty $taxRepresentativeParty
     * @return static
     */
    public function setTaxRepresentativeParty(?TaxRepresentativeParty $taxRepresentativeParty = null): static
    {
        $this->taxRepresentativeParty = $taxRepresentativeParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTaxRepresentativeParty(): static
    {
        $this->taxRepresentativeParty = null;

        return $this;
    }

    /**
     * @return null|array<Delivery>
     */
    public function getDelivery(): ?array
    {
        return $this->delivery;
    }

    /**
     * @param  null|array<Delivery> $delivery
     * @return static
     */
    public function setDelivery(?array $delivery = null): static
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
     * @return static
     */
    public function clearDelivery(): static
    {
        $this->delivery = [];

        return $this;
    }

    /**
     * @return null|Delivery
     */
    public function firstDelivery(): ?Delivery
    {
        $delivery = $this->delivery ?? [];
        $delivery = reset($delivery);

        if (false === $delivery) {
            return null;
        }

        return $delivery;
    }

    /**
     * @return null|Delivery
     */
    public function lastDelivery(): ?Delivery
    {
        $delivery = $this->delivery ?? [];
        $delivery = end($delivery);

        if (false === $delivery) {
            return null;
        }

        return $delivery;
    }

    /**
     * @param  Delivery $delivery
     * @return static
     */
    public function addToDelivery(Delivery $delivery): static
    {
        $this->delivery[] = $delivery;

        return $this;
    }

    /**
     * @return Delivery
     */
    public function addToDeliveryWithCreate(): Delivery
    {
        $this->addTodelivery($delivery = new Delivery());

        return $delivery;
    }

    /**
     * @param  Delivery $delivery
     * @return static
     */
    public function addOnceToDelivery(Delivery $delivery): static
    {
        if (!is_array($this->delivery)) {
            $this->delivery = [];
        }

        $this->delivery[0] = $delivery;

        return $this;
    }

    /**
     * @return Delivery
     */
    public function addOnceToDeliveryWithCreate(): Delivery
    {
        if (!is_array($this->delivery)) {
            $this->delivery = [];
        }

        if ([] === $this->delivery) {
            $this->addOnceTodelivery(new Delivery());
        }

        return $this->delivery[0];
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
        $this->deliveryTerms = is_null($this->deliveryTerms) ? new DeliveryTerms() : $this->deliveryTerms;

        return $this->deliveryTerms;
    }

    /**
     * @param  null|DeliveryTerms $deliveryTerms
     * @return static
     */
    public function setDeliveryTerms(?DeliveryTerms $deliveryTerms = null): static
    {
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
     * @return null|array<PaymentMeans>
     */
    public function getPaymentMeans(): ?array
    {
        return $this->paymentMeans;
    }

    /**
     * @param  null|array<PaymentMeans> $paymentMeans
     * @return static
     */
    public function setPaymentMeans(?array $paymentMeans = null): static
    {
        $this->paymentMeans = $paymentMeans;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPaymentMeans(): static
    {
        $this->paymentMeans = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearPaymentMeans(): static
    {
        $this->paymentMeans = [];

        return $this;
    }

    /**
     * @return null|PaymentMeans
     */
    public function firstPaymentMeans(): ?PaymentMeans
    {
        $paymentMeans = $this->paymentMeans ?? [];
        $paymentMeans = reset($paymentMeans);

        if (false === $paymentMeans) {
            return null;
        }

        return $paymentMeans;
    }

    /**
     * @return null|PaymentMeans
     */
    public function lastPaymentMeans(): ?PaymentMeans
    {
        $paymentMeans = $this->paymentMeans ?? [];
        $paymentMeans = end($paymentMeans);

        if (false === $paymentMeans) {
            return null;
        }

        return $paymentMeans;
    }

    /**
     * @param  PaymentMeans $paymentMeans
     * @return static
     */
    public function addToPaymentMeans(PaymentMeans $paymentMeans): static
    {
        $this->paymentMeans[] = $paymentMeans;

        return $this;
    }

    /**
     * @return PaymentMeans
     */
    public function addToPaymentMeansWithCreate(): PaymentMeans
    {
        $this->addTopaymentMeans($paymentMeans = new PaymentMeans());

        return $paymentMeans;
    }

    /**
     * @param  PaymentMeans $paymentMeans
     * @return static
     */
    public function addOnceToPaymentMeans(PaymentMeans $paymentMeans): static
    {
        if (!is_array($this->paymentMeans)) {
            $this->paymentMeans = [];
        }

        $this->paymentMeans[0] = $paymentMeans;

        return $this;
    }

    /**
     * @return PaymentMeans
     */
    public function addOnceToPaymentMeansWithCreate(): PaymentMeans
    {
        if (!is_array($this->paymentMeans)) {
            $this->paymentMeans = [];
        }

        if ([] === $this->paymentMeans) {
            $this->addOnceTopaymentMeans(new PaymentMeans());
        }

        return $this->paymentMeans[0];
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
     * @return null|array<PrepaidPayment>
     */
    public function getPrepaidPayment(): ?array
    {
        return $this->prepaidPayment;
    }

    /**
     * @param  null|array<PrepaidPayment> $prepaidPayment
     * @return static
     */
    public function setPrepaidPayment(?array $prepaidPayment = null): static
    {
        $this->prepaidPayment = $prepaidPayment;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPrepaidPayment(): static
    {
        $this->prepaidPayment = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearPrepaidPayment(): static
    {
        $this->prepaidPayment = [];

        return $this;
    }

    /**
     * @return null|PrepaidPayment
     */
    public function firstPrepaidPayment(): ?PrepaidPayment
    {
        $prepaidPayment = $this->prepaidPayment ?? [];
        $prepaidPayment = reset($prepaidPayment);

        if (false === $prepaidPayment) {
            return null;
        }

        return $prepaidPayment;
    }

    /**
     * @return null|PrepaidPayment
     */
    public function lastPrepaidPayment(): ?PrepaidPayment
    {
        $prepaidPayment = $this->prepaidPayment ?? [];
        $prepaidPayment = end($prepaidPayment);

        if (false === $prepaidPayment) {
            return null;
        }

        return $prepaidPayment;
    }

    /**
     * @param  PrepaidPayment $prepaidPayment
     * @return static
     */
    public function addToPrepaidPayment(PrepaidPayment $prepaidPayment): static
    {
        $this->prepaidPayment[] = $prepaidPayment;

        return $this;
    }

    /**
     * @return PrepaidPayment
     */
    public function addToPrepaidPaymentWithCreate(): PrepaidPayment
    {
        $this->addToprepaidPayment($prepaidPayment = new PrepaidPayment());

        return $prepaidPayment;
    }

    /**
     * @param  PrepaidPayment $prepaidPayment
     * @return static
     */
    public function addOnceToPrepaidPayment(PrepaidPayment $prepaidPayment): static
    {
        if (!is_array($this->prepaidPayment)) {
            $this->prepaidPayment = [];
        }

        $this->prepaidPayment[0] = $prepaidPayment;

        return $this;
    }

    /**
     * @return PrepaidPayment
     */
    public function addOnceToPrepaidPaymentWithCreate(): PrepaidPayment
    {
        if (!is_array($this->prepaidPayment)) {
            $this->prepaidPayment = [];
        }

        if ([] === $this->prepaidPayment) {
            $this->addOnceToprepaidPayment(new PrepaidPayment());
        }

        return $this->prepaidPayment[0];
    }

    /**
     * @return null|array<AllowanceCharge>
     */
    public function getAllowanceCharge(): ?array
    {
        return $this->allowanceCharge;
    }

    /**
     * @param  null|array<AllowanceCharge> $allowanceCharge
     * @return static
     */
    public function setAllowanceCharge(?array $allowanceCharge = null): static
    {
        $this->allowanceCharge = $allowanceCharge;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAllowanceCharge(): static
    {
        $this->allowanceCharge = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearAllowanceCharge(): static
    {
        $this->allowanceCharge = [];

        return $this;
    }

    /**
     * @return null|AllowanceCharge
     */
    public function firstAllowanceCharge(): ?AllowanceCharge
    {
        $allowanceCharge = $this->allowanceCharge ?? [];
        $allowanceCharge = reset($allowanceCharge);

        if (false === $allowanceCharge) {
            return null;
        }

        return $allowanceCharge;
    }

    /**
     * @return null|AllowanceCharge
     */
    public function lastAllowanceCharge(): ?AllowanceCharge
    {
        $allowanceCharge = $this->allowanceCharge ?? [];
        $allowanceCharge = end($allowanceCharge);

        if (false === $allowanceCharge) {
            return null;
        }

        return $allowanceCharge;
    }

    /**
     * @param  AllowanceCharge $allowanceCharge
     * @return static
     */
    public function addToAllowanceCharge(AllowanceCharge $allowanceCharge): static
    {
        $this->allowanceCharge[] = $allowanceCharge;

        return $this;
    }

    /**
     * @return AllowanceCharge
     */
    public function addToAllowanceChargeWithCreate(): AllowanceCharge
    {
        $this->addToallowanceCharge($allowanceCharge = new AllowanceCharge());

        return $allowanceCharge;
    }

    /**
     * @param  AllowanceCharge $allowanceCharge
     * @return static
     */
    public function addOnceToAllowanceCharge(AllowanceCharge $allowanceCharge): static
    {
        if (!is_array($this->allowanceCharge)) {
            $this->allowanceCharge = [];
        }

        $this->allowanceCharge[0] = $allowanceCharge;

        return $this;
    }

    /**
     * @return AllowanceCharge
     */
    public function addOnceToAllowanceChargeWithCreate(): AllowanceCharge
    {
        if (!is_array($this->allowanceCharge)) {
            $this->allowanceCharge = [];
        }

        if ([] === $this->allowanceCharge) {
            $this->addOnceToallowanceCharge(new AllowanceCharge());
        }

        return $this->allowanceCharge[0];
    }

    /**
     * @return null|TaxExchangeRate
     */
    public function getTaxExchangeRate(): ?TaxExchangeRate
    {
        return $this->taxExchangeRate;
    }

    /**
     * @return TaxExchangeRate
     */
    public function getTaxExchangeRateWithCreate(): TaxExchangeRate
    {
        $this->taxExchangeRate = is_null($this->taxExchangeRate) ? new TaxExchangeRate() : $this->taxExchangeRate;

        return $this->taxExchangeRate;
    }

    /**
     * @param  null|TaxExchangeRate $taxExchangeRate
     * @return static
     */
    public function setTaxExchangeRate(?TaxExchangeRate $taxExchangeRate = null): static
    {
        $this->taxExchangeRate = $taxExchangeRate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTaxExchangeRate(): static
    {
        $this->taxExchangeRate = null;

        return $this;
    }

    /**
     * @return null|PricingExchangeRate
     */
    public function getPricingExchangeRate(): ?PricingExchangeRate
    {
        return $this->pricingExchangeRate;
    }

    /**
     * @return PricingExchangeRate
     */
    public function getPricingExchangeRateWithCreate(): PricingExchangeRate
    {
        $this->pricingExchangeRate = is_null($this->pricingExchangeRate) ? new PricingExchangeRate() : $this->pricingExchangeRate;

        return $this->pricingExchangeRate;
    }

    /**
     * @param  null|PricingExchangeRate $pricingExchangeRate
     * @return static
     */
    public function setPricingExchangeRate(?PricingExchangeRate $pricingExchangeRate = null): static
    {
        $this->pricingExchangeRate = $pricingExchangeRate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPricingExchangeRate(): static
    {
        $this->pricingExchangeRate = null;

        return $this;
    }

    /**
     * @return null|PaymentExchangeRate
     */
    public function getPaymentExchangeRate(): ?PaymentExchangeRate
    {
        return $this->paymentExchangeRate;
    }

    /**
     * @return PaymentExchangeRate
     */
    public function getPaymentExchangeRateWithCreate(): PaymentExchangeRate
    {
        $this->paymentExchangeRate = is_null($this->paymentExchangeRate) ? new PaymentExchangeRate() : $this->paymentExchangeRate;

        return $this->paymentExchangeRate;
    }

    /**
     * @param  null|PaymentExchangeRate $paymentExchangeRate
     * @return static
     */
    public function setPaymentExchangeRate(?PaymentExchangeRate $paymentExchangeRate = null): static
    {
        $this->paymentExchangeRate = $paymentExchangeRate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPaymentExchangeRate(): static
    {
        $this->paymentExchangeRate = null;

        return $this;
    }

    /**
     * @return null|PaymentAlternativeExchangeRate
     */
    public function getPaymentAlternativeExchangeRate(): ?PaymentAlternativeExchangeRate
    {
        return $this->paymentAlternativeExchangeRate;
    }

    /**
     * @return PaymentAlternativeExchangeRate
     */
    public function getPaymentAlternativeExchangeRateWithCreate(): PaymentAlternativeExchangeRate
    {
        $this->paymentAlternativeExchangeRate = is_null($this->paymentAlternativeExchangeRate) ? new PaymentAlternativeExchangeRate() : $this->paymentAlternativeExchangeRate;

        return $this->paymentAlternativeExchangeRate;
    }

    /**
     * @param  null|PaymentAlternativeExchangeRate $paymentAlternativeExchangeRate
     * @return static
     */
    public function setPaymentAlternativeExchangeRate(
        ?PaymentAlternativeExchangeRate $paymentAlternativeExchangeRate = null,
    ): static {
        $this->paymentAlternativeExchangeRate = $paymentAlternativeExchangeRate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPaymentAlternativeExchangeRate(): static
    {
        $this->paymentAlternativeExchangeRate = null;

        return $this;
    }

    /**
     * @return null|array<TaxTotal>
     */
    public function getTaxTotal(): ?array
    {
        return $this->taxTotal;
    }

    /**
     * @param  int           $index
     * @return null|TaxTotal
     */
    public function getTaxTotalAtIndex(int $index): ?TaxTotal
    {
        if (!is_array($this->taxTotal)) {
            return null;
        }

        if (!array_key_exists($index, $this->taxTotal)) {
            return null;
        }

        return $this->taxTotal[$index];
    }

    /**
     * @param  null|array<TaxTotal> $taxTotal
     * @return static
     */
    public function setTaxTotal(?array $taxTotal = null): static
    {
        $this->taxTotal = $taxTotal;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTaxTotal(): static
    {
        $this->taxTotal = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearTaxTotal(): static
    {
        $this->taxTotal = [];

        return $this;
    }

    /**
     * @return null|TaxTotal
     */
    public function firstTaxTotal(): ?TaxTotal
    {
        $taxTotal = $this->taxTotal ?? [];
        $taxTotal = reset($taxTotal);

        if (false === $taxTotal) {
            return null;
        }

        return $taxTotal;
    }

    /**
     * @return null|TaxTotal
     */
    public function lastTaxTotal(): ?TaxTotal
    {
        $taxTotal = $this->taxTotal ?? [];
        $taxTotal = end($taxTotal);

        if (false === $taxTotal) {
            return null;
        }

        return $taxTotal;
    }

    /**
     * @param  TaxTotal $taxTotal
     * @return static
     */
    public function addToTaxTotal(TaxTotal $taxTotal): static
    {
        $this->taxTotal[] = $taxTotal;

        return $this;
    }

    /**
     * @return TaxTotal
     */
    public function addToTaxTotalWithCreate(): TaxTotal
    {
        $this->addTotaxTotal($taxTotal = new TaxTotal());

        return $taxTotal;
    }

    /**
     * @param  int      $index
     * @return TaxTotal
     */
    public function addToTaxTotalWithCreateAtIndex(int $index): TaxTotal
    {
        if (!is_array($this->taxTotal)) {
            $this->taxTotal = [];
        }

        if (!array_key_exists($index, $this->taxTotal)) {
            $this->taxTotal[$index] = new TaxTotal();
        }

        return $this->taxTotal[$index];
    }

    /**
     * @param  int    $index
     * @return static
     */
    public function unsetTaxTotalAtIndex(int $index): static
    {
        if (!is_array($this->taxTotal)) {
            return $this;
        }

        if (!array_key_exists($index, $this->taxTotal)) {
            return $this;
        }

        unset($this->taxTotal[$index]);

        return $this;
    }

    /**
     * @param  TaxTotal $taxTotal
     * @return static
     */
    public function addOnceToTaxTotal(TaxTotal $taxTotal): static
    {
        if (!is_array($this->taxTotal)) {
            $this->taxTotal = [];
        }

        $this->taxTotal[0] = $taxTotal;

        return $this;
    }

    /**
     * @return TaxTotal
     */
    public function addOnceToTaxTotalWithCreate(): TaxTotal
    {
        if (!is_array($this->taxTotal)) {
            $this->taxTotal = [];
        }

        if ([] === $this->taxTotal) {
            $this->addOnceTotaxTotal(new TaxTotal());
        }

        return $this->taxTotal[0];
    }

    /**
     * @return null|array<WithholdingTaxTotal>
     */
    public function getWithholdingTaxTotal(): ?array
    {
        return $this->withholdingTaxTotal;
    }

    /**
     * @param  null|array<WithholdingTaxTotal> $withholdingTaxTotal
     * @return static
     */
    public function setWithholdingTaxTotal(?array $withholdingTaxTotal = null): static
    {
        $this->withholdingTaxTotal = $withholdingTaxTotal;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetWithholdingTaxTotal(): static
    {
        $this->withholdingTaxTotal = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearWithholdingTaxTotal(): static
    {
        $this->withholdingTaxTotal = [];

        return $this;
    }

    /**
     * @return null|WithholdingTaxTotal
     */
    public function firstWithholdingTaxTotal(): ?WithholdingTaxTotal
    {
        $withholdingTaxTotal = $this->withholdingTaxTotal ?? [];
        $withholdingTaxTotal = reset($withholdingTaxTotal);

        if (false === $withholdingTaxTotal) {
            return null;
        }

        return $withholdingTaxTotal;
    }

    /**
     * @return null|WithholdingTaxTotal
     */
    public function lastWithholdingTaxTotal(): ?WithholdingTaxTotal
    {
        $withholdingTaxTotal = $this->withholdingTaxTotal ?? [];
        $withholdingTaxTotal = end($withholdingTaxTotal);

        if (false === $withholdingTaxTotal) {
            return null;
        }

        return $withholdingTaxTotal;
    }

    /**
     * @param  WithholdingTaxTotal $withholdingTaxTotal
     * @return static
     */
    public function addToWithholdingTaxTotal(WithholdingTaxTotal $withholdingTaxTotal): static
    {
        $this->withholdingTaxTotal[] = $withholdingTaxTotal;

        return $this;
    }

    /**
     * @return WithholdingTaxTotal
     */
    public function addToWithholdingTaxTotalWithCreate(): WithholdingTaxTotal
    {
        $this->addTowithholdingTaxTotal($withholdingTaxTotal = new WithholdingTaxTotal());

        return $withholdingTaxTotal;
    }

    /**
     * @param  WithholdingTaxTotal $withholdingTaxTotal
     * @return static
     */
    public function addOnceToWithholdingTaxTotal(WithholdingTaxTotal $withholdingTaxTotal): static
    {
        if (!is_array($this->withholdingTaxTotal)) {
            $this->withholdingTaxTotal = [];
        }

        $this->withholdingTaxTotal[0] = $withholdingTaxTotal;

        return $this;
    }

    /**
     * @return WithholdingTaxTotal
     */
    public function addOnceToWithholdingTaxTotalWithCreate(): WithholdingTaxTotal
    {
        if (!is_array($this->withholdingTaxTotal)) {
            $this->withholdingTaxTotal = [];
        }

        if ([] === $this->withholdingTaxTotal) {
            $this->addOnceTowithholdingTaxTotal(new WithholdingTaxTotal());
        }

        return $this->withholdingTaxTotal[0];
    }

    /**
     * @return null|LegalMonetaryTotal
     */
    public function getLegalMonetaryTotal(): ?LegalMonetaryTotal
    {
        return $this->legalMonetaryTotal;
    }

    /**
     * @return LegalMonetaryTotal
     */
    public function getLegalMonetaryTotalWithCreate(): LegalMonetaryTotal
    {
        $this->legalMonetaryTotal = is_null($this->legalMonetaryTotal) ? new LegalMonetaryTotal() : $this->legalMonetaryTotal;

        return $this->legalMonetaryTotal;
    }

    /**
     * @param  null|LegalMonetaryTotal $legalMonetaryTotal
     * @return static
     */
    public function setLegalMonetaryTotal(?LegalMonetaryTotal $legalMonetaryTotal = null): static
    {
        $this->legalMonetaryTotal = $legalMonetaryTotal;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLegalMonetaryTotal(): static
    {
        $this->legalMonetaryTotal = null;

        return $this;
    }

    /**
     * @return null|array<InvoiceLine>
     */
    public function getInvoiceLine(): ?array
    {
        return $this->invoiceLine;
    }

    /**
     * @param  null|array<InvoiceLine> $invoiceLine
     * @return static
     */
    public function setInvoiceLine(?array $invoiceLine = null): static
    {
        $this->invoiceLine = $invoiceLine;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetInvoiceLine(): static
    {
        $this->invoiceLine = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearInvoiceLine(): static
    {
        $this->invoiceLine = [];

        return $this;
    }

    /**
     * @return null|InvoiceLine
     */
    public function firstInvoiceLine(): ?InvoiceLine
    {
        $invoiceLine = $this->invoiceLine ?? [];
        $invoiceLine = reset($invoiceLine);

        if (false === $invoiceLine) {
            return null;
        }

        return $invoiceLine;
    }

    /**
     * @return null|InvoiceLine
     */
    public function lastInvoiceLine(): ?InvoiceLine
    {
        $invoiceLine = $this->invoiceLine ?? [];
        $invoiceLine = end($invoiceLine);

        if (false === $invoiceLine) {
            return null;
        }

        return $invoiceLine;
    }

    /**
     * @param  InvoiceLine $invoiceLine
     * @return static
     */
    public function addToInvoiceLine(InvoiceLine $invoiceLine): static
    {
        $this->invoiceLine[] = $invoiceLine;

        return $this;
    }

    /**
     * @return InvoiceLine
     */
    public function addToInvoiceLineWithCreate(): InvoiceLine
    {
        $this->addToinvoiceLine($invoiceLine = new InvoiceLine());

        return $invoiceLine;
    }

    /**
     * @param  InvoiceLine $invoiceLine
     * @return static
     */
    public function addOnceToInvoiceLine(InvoiceLine $invoiceLine): static
    {
        if (!is_array($this->invoiceLine)) {
            $this->invoiceLine = [];
        }

        $this->invoiceLine[0] = $invoiceLine;

        return $this;
    }

    /**
     * @return InvoiceLine
     */
    public function addOnceToInvoiceLineWithCreate(): InvoiceLine
    {
        if (!is_array($this->invoiceLine)) {
            $this->invoiceLine = [];
        }

        if ([] === $this->invoiceLine) {
            $this->addOnceToinvoiceLine(new InvoiceLine());
        }

        return $this->invoiceLine[0];
    }

    /**
     * @return null|InvoiceLine
     */
    public function getLatestDocumentLine(): ?InvoiceLine
    {
        $invoiceLines = $this->getInvoiceLine() ?? [];
        $invoiceLine = end($invoiceLines);

        if (false === $invoiceLine) {
            return null;
        }

        return $invoiceLine;
    }

    /**
     * @return null|InvoiceLine
     */
    public function getLatestDocumentLineWithCreate(): ?InvoiceLine
    {
        if (is_null($invoiceLine = $this->getLatestDocumentLine())) {
            $invoiceLine = $this->addToInvoiceLineWithCreate();
        }

        return $invoiceLine;
    }
}
