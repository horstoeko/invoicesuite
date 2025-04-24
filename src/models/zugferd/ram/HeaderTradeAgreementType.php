<?php

namespace horstoeko\invoicesuite\models\zugferd\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zugferd\udt\TextType;

class HeaderTradeAgreementType
{
    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("BuyerReference")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBuyerReference", setter="setBuyerReference")
     */
    private $textType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\TradePartyType")
     * @JMS\Expose
     * @JMS\SerializedName("SellerTradeParty")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSellerTradeParty", setter="setSellerTradeParty")
     */
    private $sellerTradeParty;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\TradePartyType")
     * @JMS\Expose
     * @JMS\SerializedName("BuyerTradeParty")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBuyerTradeParty", setter="setBuyerTradeParty")
     */
    private $buyerTradeParty;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\TradePartyType")
     * @JMS\Expose
     * @JMS\SerializedName("SalesAgentTradeParty")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSalesAgentTradeParty", setter="setSalesAgentTradeParty")
     */
    private $salesAgentTradeParty;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\TradePartyType")
     * @JMS\Expose
     * @JMS\SerializedName("BuyerTaxRepresentativeTradeParty")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBuyerTaxRepresentativeTradeParty", setter="setBuyerTaxRepresentativeTradeParty")
     */
    private $buyerTaxRepresentativeTradeParty;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\TradePartyType")
     * @JMS\Expose
     * @JMS\SerializedName("SellerTaxRepresentativeTradeParty")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSellerTaxRepresentativeTradeParty", setter="setSellerTaxRepresentativeTradeParty")
     */
    private $sellerTaxRepresentativeTradeParty;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\TradePartyType")
     * @JMS\Expose
     * @JMS\SerializedName("ProductEndUserTradeParty")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getProductEndUserTradeParty", setter="setProductEndUserTradeParty")
     */
    private $productEndUserTradeParty;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\TradeDeliveryTermsType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\TradeDeliveryTermsType")
     * @JMS\Expose
     * @JMS\SerializedName("ApplicableTradeDeliveryTerms")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getApplicableTradeDeliveryTerms", setter="setApplicableTradeDeliveryTerms")
     */
    private $tradeDeliveryTermsType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\ReferencedDocumentType")
     * @JMS\Expose
     * @JMS\SerializedName("SellerOrderReferencedDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSellerOrderReferencedDocument", setter="setSellerOrderReferencedDocument")
     */
    private $sellerOrderReferencedDocument;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\ReferencedDocumentType")
     * @JMS\Expose
     * @JMS\SerializedName("BuyerOrderReferencedDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBuyerOrderReferencedDocument", setter="setBuyerOrderReferencedDocument")
     */
    private $buyerOrderReferencedDocument;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\ReferencedDocumentType")
     * @JMS\Expose
     * @JMS\SerializedName("QuotationReferencedDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getQuotationReferencedDocument", setter="setQuotationReferencedDocument")
     */
    private $quotationReferencedDocument;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\ReferencedDocumentType")
     * @JMS\Expose
     * @JMS\SerializedName("ContractReferencedDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getContractReferencedDocument", setter="setContractReferencedDocument")
     */
    private $contractReferencedDocument;

    /**
     * @var array<\horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType>
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("array<horstoeko\zugferd\entities\extended\ram\ReferencedDocumentType>")
     * @JMS\Expose
     * @JMS\SerializedName("AdditionalReferencedDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="AdditionalReferencedDocument", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getAdditionalReferencedDocument", setter="setAdditionalReferencedDocument")
     */
    private $additionalReferencedDocument;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\TradePartyType")
     * @JMS\Expose
     * @JMS\SerializedName("BuyerAgentTradeParty")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBuyerAgentTradeParty", setter="setBuyerAgentTradeParty")
     */
    private $buyerAgentTradeParty;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\ProcuringProjectType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\ProcuringProjectType")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedProcuringProject")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSpecifiedProcuringProject", setter="setSpecifiedProcuringProject")
     */
    private $procuringProjectType;

    /**
     * @var array<\horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType>
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("array<horstoeko\zugferd\entities\extended\ram\ReferencedDocumentType>")
     * @JMS\Expose
     * @JMS\SerializedName("UltimateCustomerOrderReferencedDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="UltimateCustomerOrderReferencedDocument", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getUltimateCustomerOrderReferencedDocument", setter="setUltimateCustomerOrderReferencedDocument")
     */
    private $ultimateCustomerOrderReferencedDocument;

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType|null
     */
    public function getBuyerReference(): ?\horstoeko\invoicesuite\models\zugferd\udt\TextType
    {
        return $this->textType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType
     */
    public function getBuyerReferenceWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\TextType
    {
        $this->textType = is_null($this->textType) ? new TextType() : $this->textType;

        return $this->textType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @return self
     */
    public function setBuyerReference(\horstoeko\invoicesuite\models\zugferd\udt\TextType $textType): self
    {
        $this->textType = $textType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType|null
     */
    public function getSellerTradeParty(): ?\horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
    {
        return $this->sellerTradeParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
     */
    public function getSellerTradePartyWithCreate(): \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
    {
        $this->sellerTradeParty = is_null($this->sellerTradeParty) ? new TradePartyType() : $this->sellerTradeParty;

        return $this->sellerTradeParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
     * @return self
     */
    public function setSellerTradeParty(
        \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType $tradePartyType,
    ): self {
        $this->sellerTradeParty = $tradePartyType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType|null
     */
    public function getBuyerTradeParty(): ?\horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
    {
        return $this->buyerTradeParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
     */
    public function getBuyerTradePartyWithCreate(): \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
    {
        $this->buyerTradeParty = is_null($this->buyerTradeParty) ? new TradePartyType() : $this->buyerTradeParty;

        return $this->buyerTradeParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
     * @return self
     */
    public function setBuyerTradeParty(\horstoeko\invoicesuite\models\zugferd\ram\TradePartyType $tradePartyType): self
    {
        $this->buyerTradeParty = $tradePartyType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType|null
     */
    public function getSalesAgentTradeParty(): ?\horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
    {
        return $this->salesAgentTradeParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
     */
    public function getSalesAgentTradePartyWithCreate(): \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
    {
        $this->salesAgentTradeParty = is_null($this->salesAgentTradeParty) ? new TradePartyType() : $this->salesAgentTradeParty;

        return $this->salesAgentTradeParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
     * @return self
     */
    public function setSalesAgentTradeParty(
        \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType $tradePartyType,
    ): self {
        $this->salesAgentTradeParty = $tradePartyType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType|null
     */
    public function getBuyerTaxRepresentativeTradeParty(): ?\horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
    {
        return $this->buyerTaxRepresentativeTradeParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
     */
    public function getBuyerTaxRepresentativeTradePartyWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType {
        $this->buyerTaxRepresentativeTradeParty = is_null($this->buyerTaxRepresentativeTradeParty) ? new TradePartyType() : $this->buyerTaxRepresentativeTradeParty;

        return $this->buyerTaxRepresentativeTradeParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
     * @return self
     */
    public function setBuyerTaxRepresentativeTradeParty(
        \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType $tradePartyType,
    ): self {
        $this->buyerTaxRepresentativeTradeParty = $tradePartyType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType|null
     */
    public function getSellerTaxRepresentativeTradeParty(): ?\horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
    {
        return $this->sellerTaxRepresentativeTradeParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
     */
    public function getSellerTaxRepresentativeTradePartyWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType {
        $this->sellerTaxRepresentativeTradeParty = is_null($this->sellerTaxRepresentativeTradeParty) ? new TradePartyType() : $this->sellerTaxRepresentativeTradeParty;

        return $this->sellerTaxRepresentativeTradeParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
     * @return self
     */
    public function setSellerTaxRepresentativeTradeParty(
        \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType $tradePartyType,
    ): self {
        $this->sellerTaxRepresentativeTradeParty = $tradePartyType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType|null
     */
    public function getProductEndUserTradeParty(): ?\horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
    {
        return $this->productEndUserTradeParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
     */
    public function getProductEndUserTradePartyWithCreate(): \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
    {
        $this->productEndUserTradeParty = is_null($this->productEndUserTradeParty) ? new TradePartyType() : $this->productEndUserTradeParty;

        return $this->productEndUserTradeParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
     * @return self
     */
    public function setProductEndUserTradeParty(
        \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType $tradePartyType,
    ): self {
        $this->productEndUserTradeParty = $tradePartyType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradeDeliveryTermsType|null
     */
    public function getApplicableTradeDeliveryTerms(
    ): ?\horstoeko\invoicesuite\models\zugferd\ram\TradeDeliveryTermsType {
        return $this->tradeDeliveryTermsType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradeDeliveryTermsType
     */
    public function getApplicableTradeDeliveryTermsWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\ram\TradeDeliveryTermsType {
        $this->tradeDeliveryTermsType = is_null($this->tradeDeliveryTermsType) ? new TradeDeliveryTermsType() : $this->tradeDeliveryTermsType;

        return $this->tradeDeliveryTermsType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradeDeliveryTermsType
     * @return self
     */
    public function setApplicableTradeDeliveryTerms(
        \horstoeko\invoicesuite\models\zugferd\ram\TradeDeliveryTermsType $tradeDeliveryTermsType,
    ): self {
        $this->tradeDeliveryTermsType = $tradeDeliveryTermsType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType|null
     */
    public function getSellerOrderReferencedDocument(
    ): ?\horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType {
        return $this->sellerOrderReferencedDocument;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType
     */
    public function getSellerOrderReferencedDocumentWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType {
        $this->sellerOrderReferencedDocument = is_null($this->sellerOrderReferencedDocument) ? new ReferencedDocumentType() : $this->sellerOrderReferencedDocument;

        return $this->sellerOrderReferencedDocument;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType
     * @return self
     */
    public function setSellerOrderReferencedDocument(
        \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType $referencedDocumentType,
    ): self {
        $this->sellerOrderReferencedDocument = $referencedDocumentType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType|null
     */
    public function getBuyerOrderReferencedDocument(
    ): ?\horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType {
        return $this->buyerOrderReferencedDocument;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType
     */
    public function getBuyerOrderReferencedDocumentWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType {
        $this->buyerOrderReferencedDocument = is_null($this->buyerOrderReferencedDocument) ? new ReferencedDocumentType() : $this->buyerOrderReferencedDocument;

        return $this->buyerOrderReferencedDocument;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType
     * @return self
     */
    public function setBuyerOrderReferencedDocument(
        \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType $referencedDocumentType,
    ): self {
        $this->buyerOrderReferencedDocument = $referencedDocumentType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType|null
     */
    public function getQuotationReferencedDocument(): ?\horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType
    {
        return $this->quotationReferencedDocument;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType
     */
    public function getQuotationReferencedDocumentWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType {
        $this->quotationReferencedDocument = is_null($this->quotationReferencedDocument) ? new ReferencedDocumentType() : $this->quotationReferencedDocument;

        return $this->quotationReferencedDocument;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType
     * @return self
     */
    public function setQuotationReferencedDocument(
        \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType $referencedDocumentType,
    ): self {
        $this->quotationReferencedDocument = $referencedDocumentType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType|null
     */
    public function getContractReferencedDocument(): ?\horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType
    {
        return $this->contractReferencedDocument;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType
     */
    public function getContractReferencedDocumentWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType {
        $this->contractReferencedDocument = is_null($this->contractReferencedDocument) ? new ReferencedDocumentType() : $this->contractReferencedDocument;

        return $this->contractReferencedDocument;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType
     * @return self
     */
    public function setContractReferencedDocument(
        \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType $referencedDocumentType,
    ): self {
        $this->contractReferencedDocument = $referencedDocumentType;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType>|null
     */
    public function getAdditionalReferencedDocument(): ?array
    {
        return $this->additionalReferencedDocument;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType>
     * @return self
     */
    public function setAdditionalReferencedDocument(array $additionalReferencedDocument): self
    {
        $this->additionalReferencedDocument = $additionalReferencedDocument;

        return $this;
    }

    /**
     * @return self
     */
    public function clearAdditionalReferencedDocument(): self
    {
        $this->additionalReferencedDocument = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType $referencedDocumentType
     * @return self
     */
    public function addToAdditionalReferencedDocument(
        \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType $referencedDocumentType,
    ): self {
        $this->additionalReferencedDocument[] = $referencedDocumentType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType
     */
    public function addToAdditionalReferencedDocumentWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType {
        $this->addToadditionalReferencedDocument($referencedDocumentType = new ReferencedDocumentType());

        return $referencedDocumentType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType|null
     */
    public function getBuyerAgentTradeParty(): ?\horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
    {
        return $this->buyerAgentTradeParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
     */
    public function getBuyerAgentTradePartyWithCreate(): \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
    {
        $this->buyerAgentTradeParty = is_null($this->buyerAgentTradeParty) ? new TradePartyType() : $this->buyerAgentTradeParty;

        return $this->buyerAgentTradeParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
     * @return self
     */
    public function setBuyerAgentTradeParty(
        \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType $tradePartyType,
    ): self {
        $this->buyerAgentTradeParty = $tradePartyType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\ProcuringProjectType|null
     */
    public function getSpecifiedProcuringProject(): ?\horstoeko\invoicesuite\models\zugferd\ram\ProcuringProjectType
    {
        return $this->procuringProjectType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\ProcuringProjectType
     */
    public function getSpecifiedProcuringProjectWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\ram\ProcuringProjectType {
        $this->procuringProjectType = is_null($this->procuringProjectType) ? new ProcuringProjectType() : $this->procuringProjectType;

        return $this->procuringProjectType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\ProcuringProjectType
     * @return self
     */
    public function setSpecifiedProcuringProject(
        \horstoeko\invoicesuite\models\zugferd\ram\ProcuringProjectType $procuringProjectType,
    ): self {
        $this->procuringProjectType = $procuringProjectType;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType>|null
     */
    public function getUltimateCustomerOrderReferencedDocument(): ?array
    {
        return $this->ultimateCustomerOrderReferencedDocument;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType>
     * @return self
     */
    public function setUltimateCustomerOrderReferencedDocument(array $ultimateCustomerOrderReferencedDocument): self
    {
        $this->ultimateCustomerOrderReferencedDocument = $ultimateCustomerOrderReferencedDocument;

        return $this;
    }

    /**
     * @return self
     */
    public function clearUltimateCustomerOrderReferencedDocument(): self
    {
        $this->ultimateCustomerOrderReferencedDocument = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType $referencedDocumentType
     * @return self
     */
    public function addToUltimateCustomerOrderReferencedDocument(
        \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType $referencedDocumentType,
    ): self {
        $this->ultimateCustomerOrderReferencedDocument[] = $referencedDocumentType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType
     */
    public function addToUltimateCustomerOrderReferencedDocumentWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType {
        $this->addToultimateCustomerOrderReferencedDocument($referencedDocumentType = new ReferencedDocumentType());

        return $referencedDocumentType;
    }
}
