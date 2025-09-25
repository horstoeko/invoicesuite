<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\main;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\ubl\cac\AccountingCustomerParty;
use horstoeko\invoicesuite\documentmodels\ubl\cac\AccountingSupplierParty;
use horstoeko\invoicesuite\documentmodels\ubl\cac\AdditionalDocumentReference;
use horstoeko\invoicesuite\documentmodels\ubl\cac\AllowanceCharge;
use horstoeko\invoicesuite\documentmodels\ubl\cac\BillingReference;
use horstoeko\invoicesuite\documentmodels\ubl\cac\BuyerCustomerParty;
use horstoeko\invoicesuite\documentmodels\ubl\cac\ContractDocumentReference;
use horstoeko\invoicesuite\documentmodels\ubl\cac\Delivery;
use horstoeko\invoicesuite\documentmodels\ubl\cac\DeliveryTerms;
use horstoeko\invoicesuite\documentmodels\ubl\cac\DespatchDocumentReference;
use horstoeko\invoicesuite\documentmodels\ubl\cac\InvoiceLine;
use horstoeko\invoicesuite\documentmodels\ubl\cac\InvoicePeriod;
use horstoeko\invoicesuite\documentmodels\ubl\cac\LegalMonetaryTotal;
use horstoeko\invoicesuite\documentmodels\ubl\cac\OrderReference;
use horstoeko\invoicesuite\documentmodels\ubl\cac\OriginatorDocumentReference;
use horstoeko\invoicesuite\documentmodels\ubl\cac\PayeeParty;
use horstoeko\invoicesuite\documentmodels\ubl\cac\PaymentAlternativeExchangeRate;
use horstoeko\invoicesuite\documentmodels\ubl\cac\PaymentExchangeRate;
use horstoeko\invoicesuite\documentmodels\ubl\cac\PaymentMeans;
use horstoeko\invoicesuite\documentmodels\ubl\cac\PaymentTerms;
use horstoeko\invoicesuite\documentmodels\ubl\cac\PrepaidPayment;
use horstoeko\invoicesuite\documentmodels\ubl\cac\PricingExchangeRate;
use horstoeko\invoicesuite\documentmodels\ubl\cac\ProjectReference;
use horstoeko\invoicesuite\documentmodels\ubl\cac\ReceiptDocumentReference;
use horstoeko\invoicesuite\documentmodels\ubl\cac\SellerSupplierParty;
use horstoeko\invoicesuite\documentmodels\ubl\cac\Signature;
use horstoeko\invoicesuite\documentmodels\ubl\cac\StatementDocumentReference;
use horstoeko\invoicesuite\documentmodels\ubl\cac\TaxExchangeRate;
use horstoeko\invoicesuite\documentmodels\ubl\cac\TaxRepresentativeParty;
use horstoeko\invoicesuite\documentmodels\ubl\cac\TaxTotal;
use horstoeko\invoicesuite\documentmodels\ubl\cac\WithholdingTaxTotal;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\AccountingCost;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\AccountingCostCode;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\BuyerReference;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\CustomizationID;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\DocumentCurrencyCode;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\ID;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\InvoiceTypeCode;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\LineCountNumeric;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\Note;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\PaymentAlternativeCurrencyCode;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\PaymentCurrencyCode;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\PricingCurrencyCode;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\ProfileExecutionID;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\ProfileID;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\TaxCurrencyCode;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\UBLVersionID;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\UUID;
use horstoeko\invoicesuite\documentmodels\ubl\ext\UBLExtension;

/**
 * @JMS\XmlNamespace(uri="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", prefix="cac")
 * @JMS\XmlNamespace(uri="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", prefix="cbc")
 * @JMS\XmlNamespace(uri="urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2", prefix="cec")
 */
class InvoiceType
{
    use HandlesObjectFlags;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\ext\UBLExtension>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\ext\UBLExtension>")
     * @JMS\Expose
     * @JMS\SerializedName("UBLExtensions")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2", cdata=false)
     * @JMS\XmlList(inline=false, entry="UBLExtension", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2")
     * @JMS\Accessor(getter="getUBLExtensions", setter="setUBLExtensions")
     */
    private $uBLExtensions;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\UBLVersionID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\UBLVersionID")
     * @JMS\Expose
     * @JMS\SerializedName("UBLVersionID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getUBLVersionID", setter="setUBLVersionID")
     */
    private $uBLVersionID;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\CustomizationID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\CustomizationID")
     * @JMS\Expose
     * @JMS\SerializedName("CustomizationID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCustomizationID", setter="setCustomizationID")
     */
    private $customizationID;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\ProfileID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\ProfileID")
     * @JMS\Expose
     * @JMS\SerializedName("ProfileID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getProfileID", setter="setProfileID")
     */
    private $profileID;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\ProfileExecutionID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\ProfileExecutionID")
     * @JMS\Expose
     * @JMS\SerializedName("ProfileExecutionID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getProfileExecutionID", setter="setProfileExecutionID")
     */
    private $profileExecutionID;

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
     * @var bool|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("CopyIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCopyIndicator", setter="setCopyIndicator")
     */
    private $copyIndicator;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\UUID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\UUID")
     * @JMS\Expose
     * @JMS\SerializedName("UUID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getUUID", setter="setUUID")
     */
    private $uUID;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("IssueDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getIssueDate", setter="setIssueDate")
     */
    private $issueDate;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time")
     * @JMS\Expose
     * @JMS\SerializedName("IssueTime")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getIssueTime", setter="setIssueTime")
     */
    private $issueTime;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("DueDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDueDate", setter="setDueDate")
     */
    private $dueDate;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\InvoiceTypeCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\InvoiceTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("InvoiceTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getInvoiceTypeCode", setter="setInvoiceTypeCode")
     */
    private $invoiceTypeCode;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Note>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cbc\Note>")
     * @JMS\Expose
     * @JMS\SerializedName("Note")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Note", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getNote", setter="setNote")
     */
    private $note;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("TaxPointDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTaxPointDate", setter="setTaxPointDate")
     */
    private $taxPointDate;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\DocumentCurrencyCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\DocumentCurrencyCode")
     * @JMS\Expose
     * @JMS\SerializedName("DocumentCurrencyCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDocumentCurrencyCode", setter="setDocumentCurrencyCode")
     */
    private $documentCurrencyCode;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\TaxCurrencyCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\TaxCurrencyCode")
     * @JMS\Expose
     * @JMS\SerializedName("TaxCurrencyCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTaxCurrencyCode", setter="setTaxCurrencyCode")
     */
    private $taxCurrencyCode;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\PricingCurrencyCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\PricingCurrencyCode")
     * @JMS\Expose
     * @JMS\SerializedName("PricingCurrencyCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPricingCurrencyCode", setter="setPricingCurrencyCode")
     */
    private $pricingCurrencyCode;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\PaymentCurrencyCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\PaymentCurrencyCode")
     * @JMS\Expose
     * @JMS\SerializedName("PaymentCurrencyCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPaymentCurrencyCode", setter="setPaymentCurrencyCode")
     */
    private $paymentCurrencyCode;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\PaymentAlternativeCurrencyCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\PaymentAlternativeCurrencyCode")
     * @JMS\Expose
     * @JMS\SerializedName("PaymentAlternativeCurrencyCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPaymentAlternativeCurrencyCode", setter="setPaymentAlternativeCurrencyCode")
     */
    private $paymentAlternativeCurrencyCode;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\AccountingCostCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\AccountingCostCode")
     * @JMS\Expose
     * @JMS\SerializedName("AccountingCostCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAccountingCostCode", setter="setAccountingCostCode")
     */
    private $accountingCostCode;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\AccountingCost|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\AccountingCost")
     * @JMS\Expose
     * @JMS\SerializedName("AccountingCost")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAccountingCost", setter="setAccountingCost")
     */
    private $accountingCost;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\LineCountNumeric|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\LineCountNumeric")
     * @JMS\Expose
     * @JMS\SerializedName("LineCountNumeric")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLineCountNumeric", setter="setLineCountNumeric")
     */
    private $lineCountNumeric;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\BuyerReference|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\BuyerReference")
     * @JMS\Expose
     * @JMS\SerializedName("BuyerReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getBuyerReference", setter="setBuyerReference")
     */
    private $buyerReference;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\InvoicePeriod>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\InvoicePeriod>")
     * @JMS\Expose
     * @JMS\SerializedName("InvoicePeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="InvoicePeriod", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getInvoicePeriod", setter="setInvoicePeriod")
     */
    private $invoicePeriod;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\OrderReference|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\OrderReference")
     * @JMS\Expose
     * @JMS\SerializedName("OrderReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOrderReference", setter="setOrderReference")
     */
    private $orderReference;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\BillingReference>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\BillingReference>")
     * @JMS\Expose
     * @JMS\SerializedName("BillingReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="BillingReference", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getBillingReference", setter="setBillingReference")
     */
    private $billingReference;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\DespatchDocumentReference>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\DespatchDocumentReference>")
     * @JMS\Expose
     * @JMS\SerializedName("DespatchDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="DespatchDocumentReference", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getDespatchDocumentReference", setter="setDespatchDocumentReference")
     */
    private $despatchDocumentReference;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\ReceiptDocumentReference>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\ReceiptDocumentReference>")
     * @JMS\Expose
     * @JMS\SerializedName("ReceiptDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ReceiptDocumentReference", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getReceiptDocumentReference", setter="setReceiptDocumentReference")
     */
    private $receiptDocumentReference;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\StatementDocumentReference>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\StatementDocumentReference>")
     * @JMS\Expose
     * @JMS\SerializedName("StatementDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="StatementDocumentReference", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getStatementDocumentReference", setter="setStatementDocumentReference")
     */
    private $statementDocumentReference;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\OriginatorDocumentReference>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\OriginatorDocumentReference>")
     * @JMS\Expose
     * @JMS\SerializedName("OriginatorDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="OriginatorDocumentReference", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getOriginatorDocumentReference", setter="setOriginatorDocumentReference")
     */
    private $originatorDocumentReference;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\ContractDocumentReference>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\ContractDocumentReference>")
     * @JMS\Expose
     * @JMS\SerializedName("ContractDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ContractDocumentReference", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getContractDocumentReference", setter="setContractDocumentReference")
     */
    private $contractDocumentReference;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\AdditionalDocumentReference>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\AdditionalDocumentReference>")
     * @JMS\Expose
     * @JMS\SerializedName("AdditionalDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="AdditionalDocumentReference", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getAdditionalDocumentReference", setter="setAdditionalDocumentReference")
     */
    private $additionalDocumentReference;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\ProjectReference>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\ProjectReference>")
     * @JMS\Expose
     * @JMS\SerializedName("ProjectReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ProjectReference", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getProjectReference", setter="setProjectReference")
     */
    private $projectReference;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\Signature>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\Signature>")
     * @JMS\Expose
     * @JMS\SerializedName("Signature")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Signature", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getSignature", setter="setSignature")
     */
    private $signature;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\AccountingSupplierParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\AccountingSupplierParty")
     * @JMS\Expose
     * @JMS\SerializedName("AccountingSupplierParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAccountingSupplierParty", setter="setAccountingSupplierParty")
     */
    private $accountingSupplierParty;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\AccountingCustomerParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\AccountingCustomerParty")
     * @JMS\Expose
     * @JMS\SerializedName("AccountingCustomerParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAccountingCustomerParty", setter="setAccountingCustomerParty")
     */
    private $accountingCustomerParty;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\PayeeParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\PayeeParty")
     * @JMS\Expose
     * @JMS\SerializedName("PayeeParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPayeeParty", setter="setPayeeParty")
     */
    private $payeeParty;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\BuyerCustomerParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\BuyerCustomerParty")
     * @JMS\Expose
     * @JMS\SerializedName("BuyerCustomerParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getBuyerCustomerParty", setter="setBuyerCustomerParty")
     */
    private $buyerCustomerParty;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\SellerSupplierParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\SellerSupplierParty")
     * @JMS\Expose
     * @JMS\SerializedName("SellerSupplierParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSellerSupplierParty", setter="setSellerSupplierParty")
     */
    private $sellerSupplierParty;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\TaxRepresentativeParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\TaxRepresentativeParty")
     * @JMS\Expose
     * @JMS\SerializedName("TaxRepresentativeParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTaxRepresentativeParty", setter="setTaxRepresentativeParty")
     */
    private $taxRepresentativeParty;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\Delivery>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\Delivery>")
     * @JMS\Expose
     * @JMS\SerializedName("Delivery")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Delivery", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getDelivery", setter="setDelivery")
     */
    private $delivery;

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
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\PaymentMeans>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\PaymentMeans>")
     * @JMS\Expose
     * @JMS\SerializedName("PaymentMeans")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PaymentMeans", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getPaymentMeans", setter="setPaymentMeans")
     */
    private $paymentMeans;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\PaymentTerms>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\PaymentTerms>")
     * @JMS\Expose
     * @JMS\SerializedName("PaymentTerms")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PaymentTerms", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getPaymentTerms", setter="setPaymentTerms")
     */
    private $paymentTerms;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\PrepaidPayment>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\PrepaidPayment>")
     * @JMS\Expose
     * @JMS\SerializedName("PrepaidPayment")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PrepaidPayment", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getPrepaidPayment", setter="setPrepaidPayment")
     */
    private $prepaidPayment;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\AllowanceCharge>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\AllowanceCharge>")
     * @JMS\Expose
     * @JMS\SerializedName("AllowanceCharge")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="AllowanceCharge", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getAllowanceCharge", setter="setAllowanceCharge")
     */
    private $allowanceCharge;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\TaxExchangeRate|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\TaxExchangeRate")
     * @JMS\Expose
     * @JMS\SerializedName("TaxExchangeRate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTaxExchangeRate", setter="setTaxExchangeRate")
     */
    private $taxExchangeRate;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\PricingExchangeRate|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\PricingExchangeRate")
     * @JMS\Expose
     * @JMS\SerializedName("PricingExchangeRate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPricingExchangeRate", setter="setPricingExchangeRate")
     */
    private $pricingExchangeRate;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\PaymentExchangeRate|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\PaymentExchangeRate")
     * @JMS\Expose
     * @JMS\SerializedName("PaymentExchangeRate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPaymentExchangeRate", setter="setPaymentExchangeRate")
     */
    private $paymentExchangeRate;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\PaymentAlternativeExchangeRate|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\PaymentAlternativeExchangeRate")
     * @JMS\Expose
     * @JMS\SerializedName("PaymentAlternativeExchangeRate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPaymentAlternativeExchangeRate", setter="setPaymentAlternativeExchangeRate")
     */
    private $paymentAlternativeExchangeRate;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\TaxTotal>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\TaxTotal>")
     * @JMS\Expose
     * @JMS\SerializedName("TaxTotal")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TaxTotal", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getTaxTotal", setter="setTaxTotal")
     */
    private $taxTotal;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\WithholdingTaxTotal>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\WithholdingTaxTotal>")
     * @JMS\Expose
     * @JMS\SerializedName("WithholdingTaxTotal")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="WithholdingTaxTotal", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getWithholdingTaxTotal", setter="setWithholdingTaxTotal")
     */
    private $withholdingTaxTotal;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\LegalMonetaryTotal|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\LegalMonetaryTotal")
     * @JMS\Expose
     * @JMS\SerializedName("LegalMonetaryTotal")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLegalMonetaryTotal", setter="setLegalMonetaryTotal")
     */
    private $legalMonetaryTotal;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\InvoiceLine>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\InvoiceLine>")
     * @JMS\Expose
     * @JMS\SerializedName("InvoiceLine")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="InvoiceLine", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getInvoiceLine", setter="setInvoiceLine")
     */
    private $invoiceLine;

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\ext\UBLExtension>|null
     */
    public function getUBLExtensions(): ?array
    {
        return $this->uBLExtensions;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\ext\UBLExtension>|null $uBLExtensions
     * @return self
     */
    public function setUBLExtensions(?array $uBLExtensions = null): self
    {
        $this->uBLExtensions = $uBLExtensions;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetUBLExtensions(): self
    {
        $this->uBLExtensions = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearUBLExtensions(): self
    {
        $this->uBLExtensions = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\ext\UBLExtension|null
     */
    public function firstUBLExtensions(): ?UBLExtension
    {
        $uBLExtensions = $this->uBLExtensions ?? [];
        $uBLExtensions = reset($uBLExtensions);

        if ($uBLExtensions === false) {
            return null;
        }

        return $uBLExtensions;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\ext\UBLExtension|null
     */
    public function lastUBLExtensions(): ?UBLExtension
    {
        $uBLExtensions = $this->uBLExtensions ?? [];
        $uBLExtensions = end($uBLExtensions);

        if ($uBLExtensions === false) {
            return null;
        }

        return $uBLExtensions;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\ext\UBLExtension $uBLExtensions
     * @return self
     */
    public function addToUBLExtensions(UBLExtension $uBLExtensions): self
    {
        $this->uBLExtensions[] = $uBLExtensions;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\ext\UBLExtension
     */
    public function addToUBLExtensionsWithCreate(): UBLExtension
    {
        $this->addTouBLExtensions($uBLExtensions = new UBLExtension());

        return $uBLExtensions;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\ext\UBLExtension $uBLExtensions
     * @return self
     */
    public function addOnceToUBLExtensions(UBLExtension $uBLExtensions): self
    {
        if (!is_array($this->uBLExtensions)) {
            $this->uBLExtensions = [];
        }

        $this->uBLExtensions[0] = $uBLExtensions;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\ext\UBLExtension
     */
    public function addOnceToUBLExtensionsWithCreate(): UBLExtension
    {
        if (!is_array($this->uBLExtensions)) {
            $this->uBLExtensions = [];
        }

        if ($this->uBLExtensions === []) {
            $this->addOnceTouBLExtensions(new UBLExtension());
        }

        return $this->uBLExtensions[0];
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\UBLVersionID|null
     */
    public function getUBLVersionID(): ?UBLVersionID
    {
        return $this->uBLVersionID;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\UBLVersionID
     */
    public function getUBLVersionIDWithCreate(): UBLVersionID
    {
        $this->uBLVersionID = is_null($this->uBLVersionID) ? new UBLVersionID() : $this->uBLVersionID;

        return $this->uBLVersionID;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\UBLVersionID|null $uBLVersionID
     * @return self
     */
    public function setUBLVersionID(?UBLVersionID $uBLVersionID = null): self
    {
        $this->uBLVersionID = $uBLVersionID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetUBLVersionID(): self
    {
        $this->uBLVersionID = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\CustomizationID|null
     */
    public function getCustomizationID(): ?CustomizationID
    {
        return $this->customizationID;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\CustomizationID
     */
    public function getCustomizationIDWithCreate(): CustomizationID
    {
        $this->customizationID = is_null($this->customizationID) ? new CustomizationID() : $this->customizationID;

        return $this->customizationID;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\CustomizationID|null $customizationID
     * @return self
     */
    public function setCustomizationID(?CustomizationID $customizationID = null): self
    {
        $this->customizationID = $customizationID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetCustomizationID(): self
    {
        $this->customizationID = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ProfileID|null
     */
    public function getProfileID(): ?ProfileID
    {
        return $this->profileID;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ProfileID
     */
    public function getProfileIDWithCreate(): ProfileID
    {
        $this->profileID = is_null($this->profileID) ? new ProfileID() : $this->profileID;

        return $this->profileID;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ProfileID|null $profileID
     * @return self
     */
    public function setProfileID(?ProfileID $profileID = null): self
    {
        $this->profileID = $profileID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetProfileID(): self
    {
        $this->profileID = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ProfileExecutionID|null
     */
    public function getProfileExecutionID(): ?ProfileExecutionID
    {
        return $this->profileExecutionID;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ProfileExecutionID
     */
    public function getProfileExecutionIDWithCreate(): ProfileExecutionID
    {
        $this->profileExecutionID = is_null($this->profileExecutionID) ? new ProfileExecutionID() : $this->profileExecutionID;

        return $this->profileExecutionID;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ProfileExecutionID|null $profileExecutionID
     * @return self
     */
    public function setProfileExecutionID(?ProfileExecutionID $profileExecutionID = null): self
    {
        $this->profileExecutionID = $profileExecutionID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetProfileExecutionID(): self
    {
        $this->profileExecutionID = null;

        return $this;
    }

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
     * @return bool|null
     */
    public function getCopyIndicator(): ?bool
    {
        return $this->copyIndicator;
    }

    /**
     * @param bool|null $copyIndicator
     * @return self
     */
    public function setCopyIndicator(?bool $copyIndicator = null): self
    {
        $this->copyIndicator = $copyIndicator;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetCopyIndicator(): self
    {
        $this->copyIndicator = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\UUID|null
     */
    public function getUUID(): ?UUID
    {
        return $this->uUID;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\UUID
     */
    public function getUUIDWithCreate(): UUID
    {
        $this->uUID = is_null($this->uUID) ? new UUID() : $this->uUID;

        return $this->uUID;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\UUID|null $uUID
     * @return self
     */
    public function setUUID(?UUID $uUID = null): self
    {
        $this->uUID = $uUID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetUUID(): self
    {
        $this->uUID = null;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getIssueDate(): ?\DateTimeInterface
    {
        return $this->issueDate;
    }

    /**
     * @param \DateTimeInterface|null $issueDate
     * @return self
     */
    public function setIssueDate(?\DateTimeInterface $issueDate = null): self
    {
        $this->issueDate = $issueDate;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetIssueDate(): self
    {
        $this->issueDate = null;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getIssueTime(): ?\DateTimeInterface
    {
        return $this->issueTime;
    }

    /**
     * @param \DateTimeInterface|null $issueTime
     * @return self
     */
    public function setIssueTime(?\DateTimeInterface $issueTime = null): self
    {
        $this->issueTime = $issueTime;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetIssueTime(): self
    {
        $this->issueTime = null;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getDueDate(): ?\DateTimeInterface
    {
        return $this->dueDate;
    }

    /**
     * @param \DateTimeInterface|null $dueDate
     * @return self
     */
    public function setDueDate(?\DateTimeInterface $dueDate = null): self
    {
        $this->dueDate = $dueDate;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDueDate(): self
    {
        $this->dueDate = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\InvoiceTypeCode|null
     */
    public function getInvoiceTypeCode(): ?InvoiceTypeCode
    {
        return $this->invoiceTypeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\InvoiceTypeCode
     */
    public function getInvoiceTypeCodeWithCreate(): InvoiceTypeCode
    {
        $this->invoiceTypeCode = is_null($this->invoiceTypeCode) ? new InvoiceTypeCode() : $this->invoiceTypeCode;

        return $this->invoiceTypeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\InvoiceTypeCode|null $invoiceTypeCode
     * @return self
     */
    public function setInvoiceTypeCode(?InvoiceTypeCode $invoiceTypeCode = null): self
    {
        $this->invoiceTypeCode = $invoiceTypeCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetInvoiceTypeCode(): self
    {
        $this->invoiceTypeCode = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Note>|null
     */
    public function getNote(): ?array
    {
        return $this->note;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Note>|null $note
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
    public function unsetNote(): self
    {
        $this->note = null;

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
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Note|null
     */
    public function firstNote(): ?Note
    {
        $note = $this->note ?? [];
        $note = reset($note);

        if ($note === false) {
            return null;
        }

        return $note;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Note|null
     */
    public function lastNote(): ?Note
    {
        $note = $this->note ?? [];
        $note = end($note);

        if ($note === false) {
            return null;
        }

        return $note;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Note $note
     * @return self
     */
    public function addToNote(Note $note): self
    {
        $this->note[] = $note;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Note
     */
    public function addToNoteWithCreate(): Note
    {
        $this->addTonote($note = new Note());

        return $note;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Note $note
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
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Note
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
     * @return \DateTimeInterface|null
     */
    public function getTaxPointDate(): ?\DateTimeInterface
    {
        return $this->taxPointDate;
    }

    /**
     * @param \DateTimeInterface|null $taxPointDate
     * @return self
     */
    public function setTaxPointDate(?\DateTimeInterface $taxPointDate = null): self
    {
        $this->taxPointDate = $taxPointDate;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTaxPointDate(): self
    {
        $this->taxPointDate = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\DocumentCurrencyCode|null
     */
    public function getDocumentCurrencyCode(): ?DocumentCurrencyCode
    {
        return $this->documentCurrencyCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\DocumentCurrencyCode
     */
    public function getDocumentCurrencyCodeWithCreate(): DocumentCurrencyCode
    {
        $this->documentCurrencyCode = is_null($this->documentCurrencyCode) ? new DocumentCurrencyCode() : $this->documentCurrencyCode;

        return $this->documentCurrencyCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\DocumentCurrencyCode|null $documentCurrencyCode
     * @return self
     */
    public function setDocumentCurrencyCode(?DocumentCurrencyCode $documentCurrencyCode = null): self
    {
        $this->documentCurrencyCode = $documentCurrencyCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDocumentCurrencyCode(): self
    {
        $this->documentCurrencyCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TaxCurrencyCode|null
     */
    public function getTaxCurrencyCode(): ?TaxCurrencyCode
    {
        return $this->taxCurrencyCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TaxCurrencyCode
     */
    public function getTaxCurrencyCodeWithCreate(): TaxCurrencyCode
    {
        $this->taxCurrencyCode = is_null($this->taxCurrencyCode) ? new TaxCurrencyCode() : $this->taxCurrencyCode;

        return $this->taxCurrencyCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\TaxCurrencyCode|null $taxCurrencyCode
     * @return self
     */
    public function setTaxCurrencyCode(?TaxCurrencyCode $taxCurrencyCode = null): self
    {
        $this->taxCurrencyCode = $taxCurrencyCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTaxCurrencyCode(): self
    {
        $this->taxCurrencyCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\PricingCurrencyCode|null
     */
    public function getPricingCurrencyCode(): ?PricingCurrencyCode
    {
        return $this->pricingCurrencyCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\PricingCurrencyCode
     */
    public function getPricingCurrencyCodeWithCreate(): PricingCurrencyCode
    {
        $this->pricingCurrencyCode = is_null($this->pricingCurrencyCode) ? new PricingCurrencyCode() : $this->pricingCurrencyCode;

        return $this->pricingCurrencyCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\PricingCurrencyCode|null $pricingCurrencyCode
     * @return self
     */
    public function setPricingCurrencyCode(?PricingCurrencyCode $pricingCurrencyCode = null): self
    {
        $this->pricingCurrencyCode = $pricingCurrencyCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPricingCurrencyCode(): self
    {
        $this->pricingCurrencyCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\PaymentCurrencyCode|null
     */
    public function getPaymentCurrencyCode(): ?PaymentCurrencyCode
    {
        return $this->paymentCurrencyCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\PaymentCurrencyCode
     */
    public function getPaymentCurrencyCodeWithCreate(): PaymentCurrencyCode
    {
        $this->paymentCurrencyCode = is_null($this->paymentCurrencyCode) ? new PaymentCurrencyCode() : $this->paymentCurrencyCode;

        return $this->paymentCurrencyCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\PaymentCurrencyCode|null $paymentCurrencyCode
     * @return self
     */
    public function setPaymentCurrencyCode(?PaymentCurrencyCode $paymentCurrencyCode = null): self
    {
        $this->paymentCurrencyCode = $paymentCurrencyCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPaymentCurrencyCode(): self
    {
        $this->paymentCurrencyCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\PaymentAlternativeCurrencyCode|null
     */
    public function getPaymentAlternativeCurrencyCode(): ?PaymentAlternativeCurrencyCode
    {
        return $this->paymentAlternativeCurrencyCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\PaymentAlternativeCurrencyCode
     */
    public function getPaymentAlternativeCurrencyCodeWithCreate(): PaymentAlternativeCurrencyCode
    {
        $this->paymentAlternativeCurrencyCode = is_null($this->paymentAlternativeCurrencyCode) ? new PaymentAlternativeCurrencyCode() : $this->paymentAlternativeCurrencyCode;

        return $this->paymentAlternativeCurrencyCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\PaymentAlternativeCurrencyCode|null $paymentAlternativeCurrencyCode
     * @return self
     */
    public function setPaymentAlternativeCurrencyCode(
        ?PaymentAlternativeCurrencyCode $paymentAlternativeCurrencyCode = null,
    ): self {
        $this->paymentAlternativeCurrencyCode = $paymentAlternativeCurrencyCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPaymentAlternativeCurrencyCode(): self
    {
        $this->paymentAlternativeCurrencyCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\AccountingCostCode|null
     */
    public function getAccountingCostCode(): ?AccountingCostCode
    {
        return $this->accountingCostCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\AccountingCostCode
     */
    public function getAccountingCostCodeWithCreate(): AccountingCostCode
    {
        $this->accountingCostCode = is_null($this->accountingCostCode) ? new AccountingCostCode() : $this->accountingCostCode;

        return $this->accountingCostCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\AccountingCostCode|null $accountingCostCode
     * @return self
     */
    public function setAccountingCostCode(?AccountingCostCode $accountingCostCode = null): self
    {
        $this->accountingCostCode = $accountingCostCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetAccountingCostCode(): self
    {
        $this->accountingCostCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\AccountingCost|null
     */
    public function getAccountingCost(): ?AccountingCost
    {
        return $this->accountingCost;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\AccountingCost
     */
    public function getAccountingCostWithCreate(): AccountingCost
    {
        $this->accountingCost = is_null($this->accountingCost) ? new AccountingCost() : $this->accountingCost;

        return $this->accountingCost;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\AccountingCost|null $accountingCost
     * @return self
     */
    public function setAccountingCost(?AccountingCost $accountingCost = null): self
    {
        $this->accountingCost = $accountingCost;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetAccountingCost(): self
    {
        $this->accountingCost = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\LineCountNumeric|null
     */
    public function getLineCountNumeric(): ?LineCountNumeric
    {
        return $this->lineCountNumeric;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\LineCountNumeric
     */
    public function getLineCountNumericWithCreate(): LineCountNumeric
    {
        $this->lineCountNumeric = is_null($this->lineCountNumeric) ? new LineCountNumeric() : $this->lineCountNumeric;

        return $this->lineCountNumeric;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\LineCountNumeric|null $lineCountNumeric
     * @return self
     */
    public function setLineCountNumeric(?LineCountNumeric $lineCountNumeric = null): self
    {
        $this->lineCountNumeric = $lineCountNumeric;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetLineCountNumeric(): self
    {
        $this->lineCountNumeric = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\BuyerReference|null
     */
    public function getBuyerReference(): ?BuyerReference
    {
        return $this->buyerReference;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\BuyerReference
     */
    public function getBuyerReferenceWithCreate(): BuyerReference
    {
        $this->buyerReference = is_null($this->buyerReference) ? new BuyerReference() : $this->buyerReference;

        return $this->buyerReference;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\BuyerReference|null $buyerReference
     * @return self
     */
    public function setBuyerReference(?BuyerReference $buyerReference = null): self
    {
        $this->buyerReference = $buyerReference;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetBuyerReference(): self
    {
        $this->buyerReference = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\InvoicePeriod>|null
     */
    public function getInvoicePeriod(): ?array
    {
        return $this->invoicePeriod;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\InvoicePeriod>|null $invoicePeriod
     * @return self
     */
    public function setInvoicePeriod(?array $invoicePeriod = null): self
    {
        $this->invoicePeriod = $invoicePeriod;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetInvoicePeriod(): self
    {
        $this->invoicePeriod = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearInvoicePeriod(): self
    {
        $this->invoicePeriod = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\InvoicePeriod|null
     */
    public function firstInvoicePeriod(): ?InvoicePeriod
    {
        $invoicePeriod = $this->invoicePeriod ?? [];
        $invoicePeriod = reset($invoicePeriod);

        if ($invoicePeriod === false) {
            return null;
        }

        return $invoicePeriod;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\InvoicePeriod|null
     */
    public function lastInvoicePeriod(): ?InvoicePeriod
    {
        $invoicePeriod = $this->invoicePeriod ?? [];
        $invoicePeriod = end($invoicePeriod);

        if ($invoicePeriod === false) {
            return null;
        }

        return $invoicePeriod;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\InvoicePeriod $invoicePeriod
     * @return self
     */
    public function addToInvoicePeriod(InvoicePeriod $invoicePeriod): self
    {
        $this->invoicePeriod[] = $invoicePeriod;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\InvoicePeriod
     */
    public function addToInvoicePeriodWithCreate(): InvoicePeriod
    {
        $this->addToinvoicePeriod($invoicePeriod = new InvoicePeriod());

        return $invoicePeriod;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\InvoicePeriod $invoicePeriod
     * @return self
     */
    public function addOnceToInvoicePeriod(InvoicePeriod $invoicePeriod): self
    {
        if (!is_array($this->invoicePeriod)) {
            $this->invoicePeriod = [];
        }

        $this->invoicePeriod[0] = $invoicePeriod;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\InvoicePeriod
     */
    public function addOnceToInvoicePeriodWithCreate(): InvoicePeriod
    {
        if (!is_array($this->invoicePeriod)) {
            $this->invoicePeriod = [];
        }

        if ($this->invoicePeriod === []) {
            $this->addOnceToinvoicePeriod(new InvoicePeriod());
        }

        return $this->invoicePeriod[0];
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\OrderReference|null
     */
    public function getOrderReference(): ?OrderReference
    {
        return $this->orderReference;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\OrderReference
     */
    public function getOrderReferenceWithCreate(): OrderReference
    {
        $this->orderReference = is_null($this->orderReference) ? new OrderReference() : $this->orderReference;

        return $this->orderReference;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\OrderReference|null $orderReference
     * @return self
     */
    public function setOrderReference(?OrderReference $orderReference = null): self
    {
        $this->orderReference = $orderReference;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetOrderReference(): self
    {
        $this->orderReference = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\BillingReference>|null
     */
    public function getBillingReference(): ?array
    {
        return $this->billingReference;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\BillingReference>|null $billingReference
     * @return self
     */
    public function setBillingReference(?array $billingReference = null): self
    {
        $this->billingReference = $billingReference;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetBillingReference(): self
    {
        $this->billingReference = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearBillingReference(): self
    {
        $this->billingReference = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\BillingReference|null
     */
    public function firstBillingReference(): ?BillingReference
    {
        $billingReference = $this->billingReference ?? [];
        $billingReference = reset($billingReference);

        if ($billingReference === false) {
            return null;
        }

        return $billingReference;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\BillingReference|null
     */
    public function lastBillingReference(): ?BillingReference
    {
        $billingReference = $this->billingReference ?? [];
        $billingReference = end($billingReference);

        if ($billingReference === false) {
            return null;
        }

        return $billingReference;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\BillingReference $billingReference
     * @return self
     */
    public function addToBillingReference(BillingReference $billingReference): self
    {
        $this->billingReference[] = $billingReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\BillingReference
     */
    public function addToBillingReferenceWithCreate(): BillingReference
    {
        $this->addTobillingReference($billingReference = new BillingReference());

        return $billingReference;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\BillingReference $billingReference
     * @return self
     */
    public function addOnceToBillingReference(BillingReference $billingReference): self
    {
        if (!is_array($this->billingReference)) {
            $this->billingReference = [];
        }

        $this->billingReference[0] = $billingReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\BillingReference
     */
    public function addOnceToBillingReferenceWithCreate(): BillingReference
    {
        if (!is_array($this->billingReference)) {
            $this->billingReference = [];
        }

        if ($this->billingReference === []) {
            $this->addOnceTobillingReference(new BillingReference());
        }

        return $this->billingReference[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\DespatchDocumentReference>|null
     */
    public function getDespatchDocumentReference(): ?array
    {
        return $this->despatchDocumentReference;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\DespatchDocumentReference>|null $despatchDocumentReference
     * @return self
     */
    public function setDespatchDocumentReference(?array $despatchDocumentReference = null): self
    {
        $this->despatchDocumentReference = $despatchDocumentReference;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDespatchDocumentReference(): self
    {
        $this->despatchDocumentReference = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearDespatchDocumentReference(): self
    {
        $this->despatchDocumentReference = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\DespatchDocumentReference|null
     */
    public function firstDespatchDocumentReference(): ?DespatchDocumentReference
    {
        $despatchDocumentReference = $this->despatchDocumentReference ?? [];
        $despatchDocumentReference = reset($despatchDocumentReference);

        if ($despatchDocumentReference === false) {
            return null;
        }

        return $despatchDocumentReference;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\DespatchDocumentReference|null
     */
    public function lastDespatchDocumentReference(): ?DespatchDocumentReference
    {
        $despatchDocumentReference = $this->despatchDocumentReference ?? [];
        $despatchDocumentReference = end($despatchDocumentReference);

        if ($despatchDocumentReference === false) {
            return null;
        }

        return $despatchDocumentReference;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\DespatchDocumentReference $despatchDocumentReference
     * @return self
     */
    public function addToDespatchDocumentReference(DespatchDocumentReference $despatchDocumentReference): self
    {
        $this->despatchDocumentReference[] = $despatchDocumentReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\DespatchDocumentReference
     */
    public function addToDespatchDocumentReferenceWithCreate(): DespatchDocumentReference
    {
        $this->addTodespatchDocumentReference($despatchDocumentReference = new DespatchDocumentReference());

        return $despatchDocumentReference;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\DespatchDocumentReference $despatchDocumentReference
     * @return self
     */
    public function addOnceToDespatchDocumentReference(DespatchDocumentReference $despatchDocumentReference): self
    {
        if (!is_array($this->despatchDocumentReference)) {
            $this->despatchDocumentReference = [];
        }

        $this->despatchDocumentReference[0] = $despatchDocumentReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\DespatchDocumentReference
     */
    public function addOnceToDespatchDocumentReferenceWithCreate(): DespatchDocumentReference
    {
        if (!is_array($this->despatchDocumentReference)) {
            $this->despatchDocumentReference = [];
        }

        if ($this->despatchDocumentReference === []) {
            $this->addOnceTodespatchDocumentReference(new DespatchDocumentReference());
        }

        return $this->despatchDocumentReference[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\ReceiptDocumentReference>|null
     */
    public function getReceiptDocumentReference(): ?array
    {
        return $this->receiptDocumentReference;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\ReceiptDocumentReference>|null $receiptDocumentReference
     * @return self
     */
    public function setReceiptDocumentReference(?array $receiptDocumentReference = null): self
    {
        $this->receiptDocumentReference = $receiptDocumentReference;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetReceiptDocumentReference(): self
    {
        $this->receiptDocumentReference = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearReceiptDocumentReference(): self
    {
        $this->receiptDocumentReference = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ReceiptDocumentReference|null
     */
    public function firstReceiptDocumentReference(): ?ReceiptDocumentReference
    {
        $receiptDocumentReference = $this->receiptDocumentReference ?? [];
        $receiptDocumentReference = reset($receiptDocumentReference);

        if ($receiptDocumentReference === false) {
            return null;
        }

        return $receiptDocumentReference;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ReceiptDocumentReference|null
     */
    public function lastReceiptDocumentReference(): ?ReceiptDocumentReference
    {
        $receiptDocumentReference = $this->receiptDocumentReference ?? [];
        $receiptDocumentReference = end($receiptDocumentReference);

        if ($receiptDocumentReference === false) {
            return null;
        }

        return $receiptDocumentReference;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\ReceiptDocumentReference $receiptDocumentReference
     * @return self
     */
    public function addToReceiptDocumentReference(ReceiptDocumentReference $receiptDocumentReference): self
    {
        $this->receiptDocumentReference[] = $receiptDocumentReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ReceiptDocumentReference
     */
    public function addToReceiptDocumentReferenceWithCreate(): ReceiptDocumentReference
    {
        $this->addToreceiptDocumentReference($receiptDocumentReference = new ReceiptDocumentReference());

        return $receiptDocumentReference;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\ReceiptDocumentReference $receiptDocumentReference
     * @return self
     */
    public function addOnceToReceiptDocumentReference(ReceiptDocumentReference $receiptDocumentReference): self
    {
        if (!is_array($this->receiptDocumentReference)) {
            $this->receiptDocumentReference = [];
        }

        $this->receiptDocumentReference[0] = $receiptDocumentReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ReceiptDocumentReference
     */
    public function addOnceToReceiptDocumentReferenceWithCreate(): ReceiptDocumentReference
    {
        if (!is_array($this->receiptDocumentReference)) {
            $this->receiptDocumentReference = [];
        }

        if ($this->receiptDocumentReference === []) {
            $this->addOnceToreceiptDocumentReference(new ReceiptDocumentReference());
        }

        return $this->receiptDocumentReference[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\StatementDocumentReference>|null
     */
    public function getStatementDocumentReference(): ?array
    {
        return $this->statementDocumentReference;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\StatementDocumentReference>|null $statementDocumentReference
     * @return self
     */
    public function setStatementDocumentReference(?array $statementDocumentReference = null): self
    {
        $this->statementDocumentReference = $statementDocumentReference;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetStatementDocumentReference(): self
    {
        $this->statementDocumentReference = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearStatementDocumentReference(): self
    {
        $this->statementDocumentReference = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\StatementDocumentReference|null
     */
    public function firstStatementDocumentReference(): ?StatementDocumentReference
    {
        $statementDocumentReference = $this->statementDocumentReference ?? [];
        $statementDocumentReference = reset($statementDocumentReference);

        if ($statementDocumentReference === false) {
            return null;
        }

        return $statementDocumentReference;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\StatementDocumentReference|null
     */
    public function lastStatementDocumentReference(): ?StatementDocumentReference
    {
        $statementDocumentReference = $this->statementDocumentReference ?? [];
        $statementDocumentReference = end($statementDocumentReference);

        if ($statementDocumentReference === false) {
            return null;
        }

        return $statementDocumentReference;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\StatementDocumentReference $statementDocumentReference
     * @return self
     */
    public function addToStatementDocumentReference(StatementDocumentReference $statementDocumentReference): self
    {
        $this->statementDocumentReference[] = $statementDocumentReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\StatementDocumentReference
     */
    public function addToStatementDocumentReferenceWithCreate(): StatementDocumentReference
    {
        $this->addTostatementDocumentReference($statementDocumentReference = new StatementDocumentReference());

        return $statementDocumentReference;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\StatementDocumentReference $statementDocumentReference
     * @return self
     */
    public function addOnceToStatementDocumentReference(StatementDocumentReference $statementDocumentReference): self
    {
        if (!is_array($this->statementDocumentReference)) {
            $this->statementDocumentReference = [];
        }

        $this->statementDocumentReference[0] = $statementDocumentReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\StatementDocumentReference
     */
    public function addOnceToStatementDocumentReferenceWithCreate(): StatementDocumentReference
    {
        if (!is_array($this->statementDocumentReference)) {
            $this->statementDocumentReference = [];
        }

        if ($this->statementDocumentReference === []) {
            $this->addOnceTostatementDocumentReference(new StatementDocumentReference());
        }

        return $this->statementDocumentReference[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\OriginatorDocumentReference>|null
     */
    public function getOriginatorDocumentReference(): ?array
    {
        return $this->originatorDocumentReference;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\OriginatorDocumentReference>|null $originatorDocumentReference
     * @return self
     */
    public function setOriginatorDocumentReference(?array $originatorDocumentReference = null): self
    {
        $this->originatorDocumentReference = $originatorDocumentReference;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetOriginatorDocumentReference(): self
    {
        $this->originatorDocumentReference = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearOriginatorDocumentReference(): self
    {
        $this->originatorDocumentReference = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\OriginatorDocumentReference|null
     */
    public function firstOriginatorDocumentReference(): ?OriginatorDocumentReference
    {
        $originatorDocumentReference = $this->originatorDocumentReference ?? [];
        $originatorDocumentReference = reset($originatorDocumentReference);

        if ($originatorDocumentReference === false) {
            return null;
        }

        return $originatorDocumentReference;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\OriginatorDocumentReference|null
     */
    public function lastOriginatorDocumentReference(): ?OriginatorDocumentReference
    {
        $originatorDocumentReference = $this->originatorDocumentReference ?? [];
        $originatorDocumentReference = end($originatorDocumentReference);

        if ($originatorDocumentReference === false) {
            return null;
        }

        return $originatorDocumentReference;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\OriginatorDocumentReference $originatorDocumentReference
     * @return self
     */
    public function addToOriginatorDocumentReference(OriginatorDocumentReference $originatorDocumentReference): self
    {
        $this->originatorDocumentReference[] = $originatorDocumentReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\OriginatorDocumentReference
     */
    public function addToOriginatorDocumentReferenceWithCreate(): OriginatorDocumentReference
    {
        $this->addTooriginatorDocumentReference($originatorDocumentReference = new OriginatorDocumentReference());

        return $originatorDocumentReference;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\OriginatorDocumentReference $originatorDocumentReference
     * @return self
     */
    public function addOnceToOriginatorDocumentReference(
        OriginatorDocumentReference $originatorDocumentReference,
    ): self {
        if (!is_array($this->originatorDocumentReference)) {
            $this->originatorDocumentReference = [];
        }

        $this->originatorDocumentReference[0] = $originatorDocumentReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\OriginatorDocumentReference
     */
    public function addOnceToOriginatorDocumentReferenceWithCreate(): OriginatorDocumentReference
    {
        if (!is_array($this->originatorDocumentReference)) {
            $this->originatorDocumentReference = [];
        }

        if ($this->originatorDocumentReference === []) {
            $this->addOnceTooriginatorDocumentReference(new OriginatorDocumentReference());
        }

        return $this->originatorDocumentReference[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\ContractDocumentReference>|null
     */
    public function getContractDocumentReference(): ?array
    {
        return $this->contractDocumentReference;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\ContractDocumentReference>|null $contractDocumentReference
     * @return self
     */
    public function setContractDocumentReference(?array $contractDocumentReference = null): self
    {
        $this->contractDocumentReference = $contractDocumentReference;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetContractDocumentReference(): self
    {
        $this->contractDocumentReference = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearContractDocumentReference(): self
    {
        $this->contractDocumentReference = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ContractDocumentReference|null
     */
    public function firstContractDocumentReference(): ?ContractDocumentReference
    {
        $contractDocumentReference = $this->contractDocumentReference ?? [];
        $contractDocumentReference = reset($contractDocumentReference);

        if ($contractDocumentReference === false) {
            return null;
        }

        return $contractDocumentReference;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ContractDocumentReference|null
     */
    public function lastContractDocumentReference(): ?ContractDocumentReference
    {
        $contractDocumentReference = $this->contractDocumentReference ?? [];
        $contractDocumentReference = end($contractDocumentReference);

        if ($contractDocumentReference === false) {
            return null;
        }

        return $contractDocumentReference;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\ContractDocumentReference $contractDocumentReference
     * @return self
     */
    public function addToContractDocumentReference(ContractDocumentReference $contractDocumentReference): self
    {
        $this->contractDocumentReference[] = $contractDocumentReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ContractDocumentReference
     */
    public function addToContractDocumentReferenceWithCreate(): ContractDocumentReference
    {
        $this->addTocontractDocumentReference($contractDocumentReference = new ContractDocumentReference());

        return $contractDocumentReference;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\ContractDocumentReference $contractDocumentReference
     * @return self
     */
    public function addOnceToContractDocumentReference(ContractDocumentReference $contractDocumentReference): self
    {
        if (!is_array($this->contractDocumentReference)) {
            $this->contractDocumentReference = [];
        }

        $this->contractDocumentReference[0] = $contractDocumentReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ContractDocumentReference
     */
    public function addOnceToContractDocumentReferenceWithCreate(): ContractDocumentReference
    {
        if (!is_array($this->contractDocumentReference)) {
            $this->contractDocumentReference = [];
        }

        if ($this->contractDocumentReference === []) {
            $this->addOnceTocontractDocumentReference(new ContractDocumentReference());
        }

        return $this->contractDocumentReference[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\AdditionalDocumentReference>|null
     */
    public function getAdditionalDocumentReference(): ?array
    {
        return $this->additionalDocumentReference;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\AdditionalDocumentReference>|null $additionalDocumentReference
     * @return self
     */
    public function setAdditionalDocumentReference(?array $additionalDocumentReference = null): self
    {
        $this->additionalDocumentReference = $additionalDocumentReference;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetAdditionalDocumentReference(): self
    {
        $this->additionalDocumentReference = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearAdditionalDocumentReference(): self
    {
        $this->additionalDocumentReference = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\AdditionalDocumentReference|null
     */
    public function firstAdditionalDocumentReference(): ?AdditionalDocumentReference
    {
        $additionalDocumentReference = $this->additionalDocumentReference ?? [];
        $additionalDocumentReference = reset($additionalDocumentReference);

        if ($additionalDocumentReference === false) {
            return null;
        }

        return $additionalDocumentReference;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\AdditionalDocumentReference|null
     */
    public function lastAdditionalDocumentReference(): ?AdditionalDocumentReference
    {
        $additionalDocumentReference = $this->additionalDocumentReference ?? [];
        $additionalDocumentReference = end($additionalDocumentReference);

        if ($additionalDocumentReference === false) {
            return null;
        }

        return $additionalDocumentReference;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\AdditionalDocumentReference $additionalDocumentReference
     * @return self
     */
    public function addToAdditionalDocumentReference(AdditionalDocumentReference $additionalDocumentReference): self
    {
        $this->additionalDocumentReference[] = $additionalDocumentReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\AdditionalDocumentReference
     */
    public function addToAdditionalDocumentReferenceWithCreate(): AdditionalDocumentReference
    {
        $this->addToadditionalDocumentReference($additionalDocumentReference = new AdditionalDocumentReference());

        return $additionalDocumentReference;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\AdditionalDocumentReference $additionalDocumentReference
     * @return self
     */
    public function addOnceToAdditionalDocumentReference(
        AdditionalDocumentReference $additionalDocumentReference,
    ): self {
        if (!is_array($this->additionalDocumentReference)) {
            $this->additionalDocumentReference = [];
        }

        $this->additionalDocumentReference[0] = $additionalDocumentReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\AdditionalDocumentReference
     */
    public function addOnceToAdditionalDocumentReferenceWithCreate(): AdditionalDocumentReference
    {
        if (!is_array($this->additionalDocumentReference)) {
            $this->additionalDocumentReference = [];
        }

        if ($this->additionalDocumentReference === []) {
            $this->addOnceToadditionalDocumentReference(new AdditionalDocumentReference());
        }

        return $this->additionalDocumentReference[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\ProjectReference>|null
     */
    public function getProjectReference(): ?array
    {
        return $this->projectReference;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\ProjectReference>|null $projectReference
     * @return self
     */
    public function setProjectReference(?array $projectReference = null): self
    {
        $this->projectReference = $projectReference;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetProjectReference(): self
    {
        $this->projectReference = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearProjectReference(): self
    {
        $this->projectReference = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ProjectReference|null
     */
    public function firstProjectReference(): ?ProjectReference
    {
        $projectReference = $this->projectReference ?? [];
        $projectReference = reset($projectReference);

        if ($projectReference === false) {
            return null;
        }

        return $projectReference;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ProjectReference|null
     */
    public function lastProjectReference(): ?ProjectReference
    {
        $projectReference = $this->projectReference ?? [];
        $projectReference = end($projectReference);

        if ($projectReference === false) {
            return null;
        }

        return $projectReference;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\ProjectReference $projectReference
     * @return self
     */
    public function addToProjectReference(ProjectReference $projectReference): self
    {
        $this->projectReference[] = $projectReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ProjectReference
     */
    public function addToProjectReferenceWithCreate(): ProjectReference
    {
        $this->addToprojectReference($projectReference = new ProjectReference());

        return $projectReference;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\ProjectReference $projectReference
     * @return self
     */
    public function addOnceToProjectReference(ProjectReference $projectReference): self
    {
        if (!is_array($this->projectReference)) {
            $this->projectReference = [];
        }

        $this->projectReference[0] = $projectReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ProjectReference
     */
    public function addOnceToProjectReferenceWithCreate(): ProjectReference
    {
        if (!is_array($this->projectReference)) {
            $this->projectReference = [];
        }

        if ($this->projectReference === []) {
            $this->addOnceToprojectReference(new ProjectReference());
        }

        return $this->projectReference[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\Signature>|null
     */
    public function getSignature(): ?array
    {
        return $this->signature;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\Signature>|null $signature
     * @return self
     */
    public function setSignature(?array $signature = null): self
    {
        $this->signature = $signature;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSignature(): self
    {
        $this->signature = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearSignature(): self
    {
        $this->signature = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\Signature|null
     */
    public function firstSignature(): ?Signature
    {
        $signature = $this->signature ?? [];
        $signature = reset($signature);

        if ($signature === false) {
            return null;
        }

        return $signature;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\Signature|null
     */
    public function lastSignature(): ?Signature
    {
        $signature = $this->signature ?? [];
        $signature = end($signature);

        if ($signature === false) {
            return null;
        }

        return $signature;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\Signature $signature
     * @return self
     */
    public function addToSignature(Signature $signature): self
    {
        $this->signature[] = $signature;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\Signature
     */
    public function addToSignatureWithCreate(): Signature
    {
        $this->addTosignature($signature = new Signature());

        return $signature;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\Signature $signature
     * @return self
     */
    public function addOnceToSignature(Signature $signature): self
    {
        if (!is_array($this->signature)) {
            $this->signature = [];
        }

        $this->signature[0] = $signature;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\Signature
     */
    public function addOnceToSignatureWithCreate(): Signature
    {
        if (!is_array($this->signature)) {
            $this->signature = [];
        }

        if ($this->signature === []) {
            $this->addOnceTosignature(new Signature());
        }

        return $this->signature[0];
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\AccountingSupplierParty|null
     */
    public function getAccountingSupplierParty(): ?AccountingSupplierParty
    {
        return $this->accountingSupplierParty;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\AccountingSupplierParty
     */
    public function getAccountingSupplierPartyWithCreate(): AccountingSupplierParty
    {
        $this->accountingSupplierParty = is_null($this->accountingSupplierParty) ? new AccountingSupplierParty() : $this->accountingSupplierParty;

        return $this->accountingSupplierParty;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\AccountingSupplierParty|null $accountingSupplierParty
     * @return self
     */
    public function setAccountingSupplierParty(?AccountingSupplierParty $accountingSupplierParty = null): self
    {
        $this->accountingSupplierParty = $accountingSupplierParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetAccountingSupplierParty(): self
    {
        $this->accountingSupplierParty = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\AccountingCustomerParty|null
     */
    public function getAccountingCustomerParty(): ?AccountingCustomerParty
    {
        return $this->accountingCustomerParty;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\AccountingCustomerParty
     */
    public function getAccountingCustomerPartyWithCreate(): AccountingCustomerParty
    {
        $this->accountingCustomerParty = is_null($this->accountingCustomerParty) ? new AccountingCustomerParty() : $this->accountingCustomerParty;

        return $this->accountingCustomerParty;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\AccountingCustomerParty|null $accountingCustomerParty
     * @return self
     */
    public function setAccountingCustomerParty(?AccountingCustomerParty $accountingCustomerParty = null): self
    {
        $this->accountingCustomerParty = $accountingCustomerParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetAccountingCustomerParty(): self
    {
        $this->accountingCustomerParty = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\PayeeParty|null
     */
    public function getPayeeParty(): ?PayeeParty
    {
        return $this->payeeParty;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\PayeeParty
     */
    public function getPayeePartyWithCreate(): PayeeParty
    {
        $this->payeeParty = is_null($this->payeeParty) ? new PayeeParty() : $this->payeeParty;

        return $this->payeeParty;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\PayeeParty|null $payeeParty
     * @return self
     */
    public function setPayeeParty(?PayeeParty $payeeParty = null): self
    {
        $this->payeeParty = $payeeParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPayeeParty(): self
    {
        $this->payeeParty = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\BuyerCustomerParty|null
     */
    public function getBuyerCustomerParty(): ?BuyerCustomerParty
    {
        return $this->buyerCustomerParty;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\BuyerCustomerParty
     */
    public function getBuyerCustomerPartyWithCreate(): BuyerCustomerParty
    {
        $this->buyerCustomerParty = is_null($this->buyerCustomerParty) ? new BuyerCustomerParty() : $this->buyerCustomerParty;

        return $this->buyerCustomerParty;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\BuyerCustomerParty|null $buyerCustomerParty
     * @return self
     */
    public function setBuyerCustomerParty(?BuyerCustomerParty $buyerCustomerParty = null): self
    {
        $this->buyerCustomerParty = $buyerCustomerParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetBuyerCustomerParty(): self
    {
        $this->buyerCustomerParty = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\SellerSupplierParty|null
     */
    public function getSellerSupplierParty(): ?SellerSupplierParty
    {
        return $this->sellerSupplierParty;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\SellerSupplierParty
     */
    public function getSellerSupplierPartyWithCreate(): SellerSupplierParty
    {
        $this->sellerSupplierParty = is_null($this->sellerSupplierParty) ? new SellerSupplierParty() : $this->sellerSupplierParty;

        return $this->sellerSupplierParty;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\SellerSupplierParty|null $sellerSupplierParty
     * @return self
     */
    public function setSellerSupplierParty(?SellerSupplierParty $sellerSupplierParty = null): self
    {
        $this->sellerSupplierParty = $sellerSupplierParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSellerSupplierParty(): self
    {
        $this->sellerSupplierParty = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\TaxRepresentativeParty|null
     */
    public function getTaxRepresentativeParty(): ?TaxRepresentativeParty
    {
        return $this->taxRepresentativeParty;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\TaxRepresentativeParty
     */
    public function getTaxRepresentativePartyWithCreate(): TaxRepresentativeParty
    {
        $this->taxRepresentativeParty = is_null($this->taxRepresentativeParty) ? new TaxRepresentativeParty() : $this->taxRepresentativeParty;

        return $this->taxRepresentativeParty;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\TaxRepresentativeParty|null $taxRepresentativeParty
     * @return self
     */
    public function setTaxRepresentativeParty(?TaxRepresentativeParty $taxRepresentativeParty = null): self
    {
        $this->taxRepresentativeParty = $taxRepresentativeParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTaxRepresentativeParty(): self
    {
        $this->taxRepresentativeParty = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\Delivery>|null
     */
    public function getDelivery(): ?array
    {
        return $this->delivery;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\Delivery>|null $delivery
     * @return self
     */
    public function setDelivery(?array $delivery = null): self
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
     * @return self
     */
    public function clearDelivery(): self
    {
        $this->delivery = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\Delivery|null
     */
    public function firstDelivery(): ?Delivery
    {
        $delivery = $this->delivery ?? [];
        $delivery = reset($delivery);

        if ($delivery === false) {
            return null;
        }

        return $delivery;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\Delivery|null
     */
    public function lastDelivery(): ?Delivery
    {
        $delivery = $this->delivery ?? [];
        $delivery = end($delivery);

        if ($delivery === false) {
            return null;
        }

        return $delivery;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\Delivery $delivery
     * @return self
     */
    public function addToDelivery(Delivery $delivery): self
    {
        $this->delivery[] = $delivery;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\Delivery
     */
    public function addToDeliveryWithCreate(): Delivery
    {
        $this->addTodelivery($delivery = new Delivery());

        return $delivery;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\Delivery $delivery
     * @return self
     */
    public function addOnceToDelivery(Delivery $delivery): self
    {
        if (!is_array($this->delivery)) {
            $this->delivery = [];
        }

        $this->delivery[0] = $delivery;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\Delivery
     */
    public function addOnceToDeliveryWithCreate(): Delivery
    {
        if (!is_array($this->delivery)) {
            $this->delivery = [];
        }

        if ($this->delivery === []) {
            $this->addOnceTodelivery(new Delivery());
        }

        return $this->delivery[0];
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
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\PaymentMeans>|null
     */
    public function getPaymentMeans(): ?array
    {
        return $this->paymentMeans;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\PaymentMeans>|null $paymentMeans
     * @return self
     */
    public function setPaymentMeans(?array $paymentMeans = null): self
    {
        $this->paymentMeans = $paymentMeans;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPaymentMeans(): self
    {
        $this->paymentMeans = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearPaymentMeans(): self
    {
        $this->paymentMeans = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\PaymentMeans|null
     */
    public function firstPaymentMeans(): ?PaymentMeans
    {
        $paymentMeans = $this->paymentMeans ?? [];
        $paymentMeans = reset($paymentMeans);

        if ($paymentMeans === false) {
            return null;
        }

        return $paymentMeans;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\PaymentMeans|null
     */
    public function lastPaymentMeans(): ?PaymentMeans
    {
        $paymentMeans = $this->paymentMeans ?? [];
        $paymentMeans = end($paymentMeans);

        if ($paymentMeans === false) {
            return null;
        }

        return $paymentMeans;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\PaymentMeans $paymentMeans
     * @return self
     */
    public function addToPaymentMeans(PaymentMeans $paymentMeans): self
    {
        $this->paymentMeans[] = $paymentMeans;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\PaymentMeans
     */
    public function addToPaymentMeansWithCreate(): PaymentMeans
    {
        $this->addTopaymentMeans($paymentMeans = new PaymentMeans());

        return $paymentMeans;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\PaymentMeans $paymentMeans
     * @return self
     */
    public function addOnceToPaymentMeans(PaymentMeans $paymentMeans): self
    {
        if (!is_array($this->paymentMeans)) {
            $this->paymentMeans = [];
        }

        $this->paymentMeans[0] = $paymentMeans;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\PaymentMeans
     */
    public function addOnceToPaymentMeansWithCreate(): PaymentMeans
    {
        if (!is_array($this->paymentMeans)) {
            $this->paymentMeans = [];
        }

        if ($this->paymentMeans === []) {
            $this->addOnceTopaymentMeans(new PaymentMeans());
        }

        return $this->paymentMeans[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\PaymentTerms>|null
     */
    public function getPaymentTerms(): ?array
    {
        return $this->paymentTerms;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\PaymentTerms>|null $paymentTerms
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
    public function unsetPaymentTerms(): self
    {
        $this->paymentTerms = null;

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
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\PaymentTerms|null
     */
    public function firstPaymentTerms(): ?PaymentTerms
    {
        $paymentTerms = $this->paymentTerms ?? [];
        $paymentTerms = reset($paymentTerms);

        if ($paymentTerms === false) {
            return null;
        }

        return $paymentTerms;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\PaymentTerms|null
     */
    public function lastPaymentTerms(): ?PaymentTerms
    {
        $paymentTerms = $this->paymentTerms ?? [];
        $paymentTerms = end($paymentTerms);

        if ($paymentTerms === false) {
            return null;
        }

        return $paymentTerms;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\PaymentTerms $paymentTerms
     * @return self
     */
    public function addToPaymentTerms(PaymentTerms $paymentTerms): self
    {
        $this->paymentTerms[] = $paymentTerms;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\PaymentTerms
     */
    public function addToPaymentTermsWithCreate(): PaymentTerms
    {
        $this->addTopaymentTerms($paymentTerms = new PaymentTerms());

        return $paymentTerms;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\PaymentTerms $paymentTerms
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
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\PaymentTerms
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
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\PrepaidPayment>|null
     */
    public function getPrepaidPayment(): ?array
    {
        return $this->prepaidPayment;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\PrepaidPayment>|null $prepaidPayment
     * @return self
     */
    public function setPrepaidPayment(?array $prepaidPayment = null): self
    {
        $this->prepaidPayment = $prepaidPayment;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPrepaidPayment(): self
    {
        $this->prepaidPayment = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearPrepaidPayment(): self
    {
        $this->prepaidPayment = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\PrepaidPayment|null
     */
    public function firstPrepaidPayment(): ?PrepaidPayment
    {
        $prepaidPayment = $this->prepaidPayment ?? [];
        $prepaidPayment = reset($prepaidPayment);

        if ($prepaidPayment === false) {
            return null;
        }

        return $prepaidPayment;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\PrepaidPayment|null
     */
    public function lastPrepaidPayment(): ?PrepaidPayment
    {
        $prepaidPayment = $this->prepaidPayment ?? [];
        $prepaidPayment = end($prepaidPayment);

        if ($prepaidPayment === false) {
            return null;
        }

        return $prepaidPayment;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\PrepaidPayment $prepaidPayment
     * @return self
     */
    public function addToPrepaidPayment(PrepaidPayment $prepaidPayment): self
    {
        $this->prepaidPayment[] = $prepaidPayment;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\PrepaidPayment
     */
    public function addToPrepaidPaymentWithCreate(): PrepaidPayment
    {
        $this->addToprepaidPayment($prepaidPayment = new PrepaidPayment());

        return $prepaidPayment;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\PrepaidPayment $prepaidPayment
     * @return self
     */
    public function addOnceToPrepaidPayment(PrepaidPayment $prepaidPayment): self
    {
        if (!is_array($this->prepaidPayment)) {
            $this->prepaidPayment = [];
        }

        $this->prepaidPayment[0] = $prepaidPayment;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\PrepaidPayment
     */
    public function addOnceToPrepaidPaymentWithCreate(): PrepaidPayment
    {
        if (!is_array($this->prepaidPayment)) {
            $this->prepaidPayment = [];
        }

        if ($this->prepaidPayment === []) {
            $this->addOnceToprepaidPayment(new PrepaidPayment());
        }

        return $this->prepaidPayment[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\AllowanceCharge>|null
     */
    public function getAllowanceCharge(): ?array
    {
        return $this->allowanceCharge;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\AllowanceCharge>|null $allowanceCharge
     * @return self
     */
    public function setAllowanceCharge(?array $allowanceCharge = null): self
    {
        $this->allowanceCharge = $allowanceCharge;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetAllowanceCharge(): self
    {
        $this->allowanceCharge = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearAllowanceCharge(): self
    {
        $this->allowanceCharge = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\AllowanceCharge|null
     */
    public function firstAllowanceCharge(): ?AllowanceCharge
    {
        $allowanceCharge = $this->allowanceCharge ?? [];
        $allowanceCharge = reset($allowanceCharge);

        if ($allowanceCharge === false) {
            return null;
        }

        return $allowanceCharge;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\AllowanceCharge|null
     */
    public function lastAllowanceCharge(): ?AllowanceCharge
    {
        $allowanceCharge = $this->allowanceCharge ?? [];
        $allowanceCharge = end($allowanceCharge);

        if ($allowanceCharge === false) {
            return null;
        }

        return $allowanceCharge;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\AllowanceCharge $allowanceCharge
     * @return self
     */
    public function addToAllowanceCharge(AllowanceCharge $allowanceCharge): self
    {
        $this->allowanceCharge[] = $allowanceCharge;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\AllowanceCharge
     */
    public function addToAllowanceChargeWithCreate(): AllowanceCharge
    {
        $this->addToallowanceCharge($allowanceCharge = new AllowanceCharge());

        return $allowanceCharge;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\AllowanceCharge $allowanceCharge
     * @return self
     */
    public function addOnceToAllowanceCharge(AllowanceCharge $allowanceCharge): self
    {
        if (!is_array($this->allowanceCharge)) {
            $this->allowanceCharge = [];
        }

        $this->allowanceCharge[0] = $allowanceCharge;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\AllowanceCharge
     */
    public function addOnceToAllowanceChargeWithCreate(): AllowanceCharge
    {
        if (!is_array($this->allowanceCharge)) {
            $this->allowanceCharge = [];
        }

        if ($this->allowanceCharge === []) {
            $this->addOnceToallowanceCharge(new AllowanceCharge());
        }

        return $this->allowanceCharge[0];
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\TaxExchangeRate|null
     */
    public function getTaxExchangeRate(): ?TaxExchangeRate
    {
        return $this->taxExchangeRate;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\TaxExchangeRate
     */
    public function getTaxExchangeRateWithCreate(): TaxExchangeRate
    {
        $this->taxExchangeRate = is_null($this->taxExchangeRate) ? new TaxExchangeRate() : $this->taxExchangeRate;

        return $this->taxExchangeRate;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\TaxExchangeRate|null $taxExchangeRate
     * @return self
     */
    public function setTaxExchangeRate(?TaxExchangeRate $taxExchangeRate = null): self
    {
        $this->taxExchangeRate = $taxExchangeRate;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTaxExchangeRate(): self
    {
        $this->taxExchangeRate = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\PricingExchangeRate|null
     */
    public function getPricingExchangeRate(): ?PricingExchangeRate
    {
        return $this->pricingExchangeRate;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\PricingExchangeRate
     */
    public function getPricingExchangeRateWithCreate(): PricingExchangeRate
    {
        $this->pricingExchangeRate = is_null($this->pricingExchangeRate) ? new PricingExchangeRate() : $this->pricingExchangeRate;

        return $this->pricingExchangeRate;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\PricingExchangeRate|null $pricingExchangeRate
     * @return self
     */
    public function setPricingExchangeRate(?PricingExchangeRate $pricingExchangeRate = null): self
    {
        $this->pricingExchangeRate = $pricingExchangeRate;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPricingExchangeRate(): self
    {
        $this->pricingExchangeRate = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\PaymentExchangeRate|null
     */
    public function getPaymentExchangeRate(): ?PaymentExchangeRate
    {
        return $this->paymentExchangeRate;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\PaymentExchangeRate
     */
    public function getPaymentExchangeRateWithCreate(): PaymentExchangeRate
    {
        $this->paymentExchangeRate = is_null($this->paymentExchangeRate) ? new PaymentExchangeRate() : $this->paymentExchangeRate;

        return $this->paymentExchangeRate;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\PaymentExchangeRate|null $paymentExchangeRate
     * @return self
     */
    public function setPaymentExchangeRate(?PaymentExchangeRate $paymentExchangeRate = null): self
    {
        $this->paymentExchangeRate = $paymentExchangeRate;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPaymentExchangeRate(): self
    {
        $this->paymentExchangeRate = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\PaymentAlternativeExchangeRate|null
     */
    public function getPaymentAlternativeExchangeRate(): ?PaymentAlternativeExchangeRate
    {
        return $this->paymentAlternativeExchangeRate;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\PaymentAlternativeExchangeRate
     */
    public function getPaymentAlternativeExchangeRateWithCreate(): PaymentAlternativeExchangeRate
    {
        $this->paymentAlternativeExchangeRate = is_null($this->paymentAlternativeExchangeRate) ? new PaymentAlternativeExchangeRate() : $this->paymentAlternativeExchangeRate;

        return $this->paymentAlternativeExchangeRate;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\PaymentAlternativeExchangeRate|null $paymentAlternativeExchangeRate
     * @return self
     */
    public function setPaymentAlternativeExchangeRate(
        ?PaymentAlternativeExchangeRate $paymentAlternativeExchangeRate = null,
    ): self {
        $this->paymentAlternativeExchangeRate = $paymentAlternativeExchangeRate;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPaymentAlternativeExchangeRate(): self
    {
        $this->paymentAlternativeExchangeRate = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\TaxTotal>|null
     */
    public function getTaxTotal(): ?array
    {
        return $this->taxTotal;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\TaxTotal>|null $taxTotal
     * @return self
     */
    public function setTaxTotal(?array $taxTotal = null): self
    {
        $this->taxTotal = $taxTotal;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTaxTotal(): self
    {
        $this->taxTotal = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearTaxTotal(): self
    {
        $this->taxTotal = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\TaxTotal|null
     */
    public function firstTaxTotal(): ?TaxTotal
    {
        $taxTotal = $this->taxTotal ?? [];
        $taxTotal = reset($taxTotal);

        if ($taxTotal === false) {
            return null;
        }

        return $taxTotal;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\TaxTotal|null
     */
    public function lastTaxTotal(): ?TaxTotal
    {
        $taxTotal = $this->taxTotal ?? [];
        $taxTotal = end($taxTotal);

        if ($taxTotal === false) {
            return null;
        }

        return $taxTotal;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\TaxTotal $taxTotal
     * @return self
     */
    public function addToTaxTotal(TaxTotal $taxTotal): self
    {
        $this->taxTotal[] = $taxTotal;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\TaxTotal
     */
    public function addToTaxTotalWithCreate(): TaxTotal
    {
        $this->addTotaxTotal($taxTotal = new TaxTotal());

        return $taxTotal;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\TaxTotal $taxTotal
     * @return self
     */
    public function addOnceToTaxTotal(TaxTotal $taxTotal): self
    {
        if (!is_array($this->taxTotal)) {
            $this->taxTotal = [];
        }

        $this->taxTotal[0] = $taxTotal;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\TaxTotal
     */
    public function addOnceToTaxTotalWithCreate(): TaxTotal
    {
        if (!is_array($this->taxTotal)) {
            $this->taxTotal = [];
        }

        if ($this->taxTotal === []) {
            $this->addOnceTotaxTotal(new TaxTotal());
        }

        return $this->taxTotal[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\WithholdingTaxTotal>|null
     */
    public function getWithholdingTaxTotal(): ?array
    {
        return $this->withholdingTaxTotal;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\WithholdingTaxTotal>|null $withholdingTaxTotal
     * @return self
     */
    public function setWithholdingTaxTotal(?array $withholdingTaxTotal = null): self
    {
        $this->withholdingTaxTotal = $withholdingTaxTotal;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetWithholdingTaxTotal(): self
    {
        $this->withholdingTaxTotal = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearWithholdingTaxTotal(): self
    {
        $this->withholdingTaxTotal = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\WithholdingTaxTotal|null
     */
    public function firstWithholdingTaxTotal(): ?WithholdingTaxTotal
    {
        $withholdingTaxTotal = $this->withholdingTaxTotal ?? [];
        $withholdingTaxTotal = reset($withholdingTaxTotal);

        if ($withholdingTaxTotal === false) {
            return null;
        }

        return $withholdingTaxTotal;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\WithholdingTaxTotal|null
     */
    public function lastWithholdingTaxTotal(): ?WithholdingTaxTotal
    {
        $withholdingTaxTotal = $this->withholdingTaxTotal ?? [];
        $withholdingTaxTotal = end($withholdingTaxTotal);

        if ($withholdingTaxTotal === false) {
            return null;
        }

        return $withholdingTaxTotal;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\WithholdingTaxTotal $withholdingTaxTotal
     * @return self
     */
    public function addToWithholdingTaxTotal(WithholdingTaxTotal $withholdingTaxTotal): self
    {
        $this->withholdingTaxTotal[] = $withholdingTaxTotal;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\WithholdingTaxTotal
     */
    public function addToWithholdingTaxTotalWithCreate(): WithholdingTaxTotal
    {
        $this->addTowithholdingTaxTotal($withholdingTaxTotal = new WithholdingTaxTotal());

        return $withholdingTaxTotal;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\WithholdingTaxTotal $withholdingTaxTotal
     * @return self
     */
    public function addOnceToWithholdingTaxTotal(WithholdingTaxTotal $withholdingTaxTotal): self
    {
        if (!is_array($this->withholdingTaxTotal)) {
            $this->withholdingTaxTotal = [];
        }

        $this->withholdingTaxTotal[0] = $withholdingTaxTotal;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\WithholdingTaxTotal
     */
    public function addOnceToWithholdingTaxTotalWithCreate(): WithholdingTaxTotal
    {
        if (!is_array($this->withholdingTaxTotal)) {
            $this->withholdingTaxTotal = [];
        }

        if ($this->withholdingTaxTotal === []) {
            $this->addOnceTowithholdingTaxTotal(new WithholdingTaxTotal());
        }

        return $this->withholdingTaxTotal[0];
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\LegalMonetaryTotal|null
     */
    public function getLegalMonetaryTotal(): ?LegalMonetaryTotal
    {
        return $this->legalMonetaryTotal;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\LegalMonetaryTotal
     */
    public function getLegalMonetaryTotalWithCreate(): LegalMonetaryTotal
    {
        $this->legalMonetaryTotal = is_null($this->legalMonetaryTotal) ? new LegalMonetaryTotal() : $this->legalMonetaryTotal;

        return $this->legalMonetaryTotal;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\LegalMonetaryTotal|null $legalMonetaryTotal
     * @return self
     */
    public function setLegalMonetaryTotal(?LegalMonetaryTotal $legalMonetaryTotal = null): self
    {
        $this->legalMonetaryTotal = $legalMonetaryTotal;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetLegalMonetaryTotal(): self
    {
        $this->legalMonetaryTotal = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\InvoiceLine>|null
     */
    public function getInvoiceLine(): ?array
    {
        return $this->invoiceLine;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\InvoiceLine>|null $invoiceLine
     * @return self
     */
    public function setInvoiceLine(?array $invoiceLine = null): self
    {
        $this->invoiceLine = $invoiceLine;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetInvoiceLine(): self
    {
        $this->invoiceLine = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearInvoiceLine(): self
    {
        $this->invoiceLine = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\InvoiceLine|null
     */
    public function firstInvoiceLine(): ?InvoiceLine
    {
        $invoiceLine = $this->invoiceLine ?? [];
        $invoiceLine = reset($invoiceLine);

        if ($invoiceLine === false) {
            return null;
        }

        return $invoiceLine;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\InvoiceLine|null
     */
    public function lastInvoiceLine(): ?InvoiceLine
    {
        $invoiceLine = $this->invoiceLine ?? [];
        $invoiceLine = end($invoiceLine);

        if ($invoiceLine === false) {
            return null;
        }

        return $invoiceLine;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\InvoiceLine $invoiceLine
     * @return self
     */
    public function addToInvoiceLine(InvoiceLine $invoiceLine): self
    {
        $this->invoiceLine[] = $invoiceLine;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\InvoiceLine
     */
    public function addToInvoiceLineWithCreate(): InvoiceLine
    {
        $this->addToinvoiceLine($invoiceLine = new InvoiceLine());

        return $invoiceLine;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\InvoiceLine $invoiceLine
     * @return self
     */
    public function addOnceToInvoiceLine(InvoiceLine $invoiceLine): self
    {
        if (!is_array($this->invoiceLine)) {
            $this->invoiceLine = [];
        }

        $this->invoiceLine[0] = $invoiceLine;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\InvoiceLine
     */
    public function addOnceToInvoiceLineWithCreate(): InvoiceLine
    {
        if (!is_array($this->invoiceLine)) {
            $this->invoiceLine = [];
        }

        if ($this->invoiceLine === []) {
            $this->addOnceToinvoiceLine(new InvoiceLine());
        }

        return $this->invoiceLine[0];
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\InvoiceLine|null
     */
    public function getLatestInvoiceLine(): ?InvoiceLine
    {
        $invoiceLines = $this->getInvoiceLine() ?? [];
        $invoiceLine = end($invoiceLines);

        if ($invoiceLine === false) {
            return null;
        }

        return $invoiceLine;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\InvoiceLine|null
     */
    public function getLatestInvoiceLineWithCreate(): ?InvoiceLine
    {
        if (is_null($invoiceLine = $this->getLatestInvoiceLine())) {
            $invoiceLine = $this->addToInvoiceLineWithCreate();
        }

        return $invoiceLine;
    }
}
