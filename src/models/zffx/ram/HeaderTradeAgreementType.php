<?php

namespace horstoeko\invoicesuite\models\zffx\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zffx\udt\TextType;

class HeaderTradeAgreementType
{
    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\TextType
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("BuyerReference")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBuyerReference", setter="setBuyerReference")
     */
    private $textType;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\TradePartyType
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\TradePartyType")
     * @JMS\Expose
     * @JMS\SerializedName("SellerTradeParty")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSellerTradeParty", setter="setSellerTradeParty")
     */
    private $sellerTradeParty;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\TradePartyType
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\TradePartyType")
     * @JMS\Expose
     * @JMS\SerializedName("BuyerTradeParty")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBuyerTradeParty", setter="setBuyerTradeParty")
     */
    private $buyerTradeParty;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\TradePartyType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\TradePartyType")
     * @JMS\Expose
     * @JMS\SerializedName("SalesAgentTradeParty")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSalesAgentTradeParty", setter="setSalesAgentTradeParty")
     */
    private $salesAgentTradeParty;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\TradePartyType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\TradePartyType")
     * @JMS\Expose
     * @JMS\SerializedName("BuyerTaxRepresentativeTradeParty")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBuyerTaxRepresentativeTradeParty", setter="setBuyerTaxRepresentativeTradeParty")
     */
    private $buyerTaxRepresentativeTradeParty;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\TradePartyType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\TradePartyType")
     * @JMS\Expose
     * @JMS\SerializedName("SellerTaxRepresentativeTradeParty")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSellerTaxRepresentativeTradeParty", setter="setSellerTaxRepresentativeTradeParty")
     */
    private $sellerTaxRepresentativeTradeParty;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\TradePartyType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\TradePartyType")
     * @JMS\Expose
     * @JMS\SerializedName("ProductEndUserTradeParty")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getProductEndUserTradeParty", setter="setProductEndUserTradeParty")
     */
    private $productEndUserTradeParty;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\TradeDeliveryTermsType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\TradeDeliveryTermsType")
     * @JMS\Expose
     * @JMS\SerializedName("ApplicableTradeDeliveryTerms")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getApplicableTradeDeliveryTerms", setter="setApplicableTradeDeliveryTerms")
     */
    private $tradeDeliveryTermsType;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType")
     * @JMS\Expose
     * @JMS\SerializedName("SellerOrderReferencedDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSellerOrderReferencedDocument", setter="setSellerOrderReferencedDocument")
     */
    private $sellerOrderReferencedDocument;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType")
     * @JMS\Expose
     * @JMS\SerializedName("BuyerOrderReferencedDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBuyerOrderReferencedDocument", setter="setBuyerOrderReferencedDocument")
     */
    private $buyerOrderReferencedDocument;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType")
     * @JMS\Expose
     * @JMS\SerializedName("QuotationReferencedDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getQuotationReferencedDocument", setter="setQuotationReferencedDocument")
     */
    private $quotationReferencedDocument;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType")
     * @JMS\Expose
     * @JMS\SerializedName("ContractReferencedDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getContractReferencedDocument", setter="setContractReferencedDocument")
     */
    private $contractReferencedDocument;

    /**
     * @var array<\horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType>
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType>")
     * @JMS\Expose
     * @JMS\SerializedName("AdditionalReferencedDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="AdditionalReferencedDocument", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getAdditionalReferencedDocument", setter="setAdditionalReferencedDocument")
     */
    private $additionalReferencedDocument;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\TradePartyType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\TradePartyType")
     * @JMS\Expose
     * @JMS\SerializedName("BuyerAgentTradeParty")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBuyerAgentTradeParty", setter="setBuyerAgentTradeParty")
     */
    private $buyerAgentTradeParty;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\ProcuringProjectType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\ProcuringProjectType")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedProcuringProject")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSpecifiedProcuringProject", setter="setSpecifiedProcuringProject")
     */
    private $procuringProjectType;

    /**
     * @var array<\horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType>
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType>")
     * @JMS\Expose
     * @JMS\SerializedName("UltimateCustomerOrderReferencedDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="UltimateCustomerOrderReferencedDocument", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getUltimateCustomerOrderReferencedDocument", setter="setUltimateCustomerOrderReferencedDocument")
     */
    private $ultimateCustomerOrderReferencedDocument;

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\TextType|null
     */
    public function getBuyerReference(): ?TextType
    {
        return $this->textType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\TextType
     */
    public function getBuyerReferenceWithCreate(): TextType
    {
        $this->textType = is_null($this->textType) ? new TextType() : $this->textType;

        return $this->textType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\TextType $textType
     * @return self
     */
    public function setBuyerReference(TextType $textType): self
    {
        $this->textType = $textType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradePartyType|null
     */
    public function getSellerTradeParty(): ?TradePartyType
    {
        return $this->sellerTradeParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradePartyType
     */
    public function getSellerTradePartyWithCreate(): TradePartyType
    {
        $this->sellerTradeParty = is_null($this->sellerTradeParty) ? new TradePartyType() : $this->sellerTradeParty;

        return $this->sellerTradeParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\TradePartyType $tradePartyType
     * @return self
     */
    public function setSellerTradeParty(TradePartyType $tradePartyType): self
    {
        $this->sellerTradeParty = $tradePartyType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradePartyType|null
     */
    public function getBuyerTradeParty(): ?TradePartyType
    {
        return $this->buyerTradeParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradePartyType
     */
    public function getBuyerTradePartyWithCreate(): TradePartyType
    {
        $this->buyerTradeParty = is_null($this->buyerTradeParty) ? new TradePartyType() : $this->buyerTradeParty;

        return $this->buyerTradeParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\TradePartyType $tradePartyType
     * @return self
     */
    public function setBuyerTradeParty(TradePartyType $tradePartyType): self
    {
        $this->buyerTradeParty = $tradePartyType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradePartyType|null
     */
    public function getSalesAgentTradeParty(): ?TradePartyType
    {
        return $this->salesAgentTradeParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradePartyType
     */
    public function getSalesAgentTradePartyWithCreate(): TradePartyType
    {
        $this->salesAgentTradeParty = is_null($this->salesAgentTradeParty) ? new TradePartyType() : $this->salesAgentTradeParty;

        return $this->salesAgentTradeParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\TradePartyType $tradePartyType
     * @return self
     */
    public function setSalesAgentTradeParty(TradePartyType $tradePartyType): self
    {
        $this->salesAgentTradeParty = $tradePartyType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradePartyType|null
     */
    public function getBuyerTaxRepresentativeTradeParty(): ?TradePartyType
    {
        return $this->buyerTaxRepresentativeTradeParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradePartyType
     */
    public function getBuyerTaxRepresentativeTradePartyWithCreate(): TradePartyType
    {
        $this->buyerTaxRepresentativeTradeParty = is_null($this->buyerTaxRepresentativeTradeParty) ? new TradePartyType() : $this->buyerTaxRepresentativeTradeParty;

        return $this->buyerTaxRepresentativeTradeParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\TradePartyType $tradePartyType
     * @return self
     */
    public function setBuyerTaxRepresentativeTradeParty(TradePartyType $tradePartyType): self
    {
        $this->buyerTaxRepresentativeTradeParty = $tradePartyType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradePartyType|null
     */
    public function getSellerTaxRepresentativeTradeParty(): ?TradePartyType
    {
        return $this->sellerTaxRepresentativeTradeParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradePartyType
     */
    public function getSellerTaxRepresentativeTradePartyWithCreate(): TradePartyType
    {
        $this->sellerTaxRepresentativeTradeParty = is_null($this->sellerTaxRepresentativeTradeParty) ? new TradePartyType() : $this->sellerTaxRepresentativeTradeParty;

        return $this->sellerTaxRepresentativeTradeParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\TradePartyType $tradePartyType
     * @return self
     */
    public function setSellerTaxRepresentativeTradeParty(TradePartyType $tradePartyType): self
    {
        $this->sellerTaxRepresentativeTradeParty = $tradePartyType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradePartyType|null
     */
    public function getProductEndUserTradeParty(): ?TradePartyType
    {
        return $this->productEndUserTradeParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradePartyType
     */
    public function getProductEndUserTradePartyWithCreate(): TradePartyType
    {
        $this->productEndUserTradeParty = is_null($this->productEndUserTradeParty) ? new TradePartyType() : $this->productEndUserTradeParty;

        return $this->productEndUserTradeParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\TradePartyType $tradePartyType
     * @return self
     */
    public function setProductEndUserTradeParty(TradePartyType $tradePartyType): self
    {
        $this->productEndUserTradeParty = $tradePartyType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradeDeliveryTermsType|null
     */
    public function getApplicableTradeDeliveryTerms(): ?TradeDeliveryTermsType
    {
        return $this->tradeDeliveryTermsType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradeDeliveryTermsType
     */
    public function getApplicableTradeDeliveryTermsWithCreate(): TradeDeliveryTermsType
    {
        $this->tradeDeliveryTermsType = is_null($this->tradeDeliveryTermsType) ? new TradeDeliveryTermsType() : $this->tradeDeliveryTermsType;

        return $this->tradeDeliveryTermsType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\TradeDeliveryTermsType $tradeDeliveryTermsType
     * @return self
     */
    public function setApplicableTradeDeliveryTerms(TradeDeliveryTermsType $tradeDeliveryTermsType): self
    {
        $this->tradeDeliveryTermsType = $tradeDeliveryTermsType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType|null
     */
    public function getSellerOrderReferencedDocument(): ?ReferencedDocumentType
    {
        return $this->sellerOrderReferencedDocument;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType
     */
    public function getSellerOrderReferencedDocumentWithCreate(): ReferencedDocumentType
    {
        $this->sellerOrderReferencedDocument = is_null($this->sellerOrderReferencedDocument) ? new ReferencedDocumentType() : $this->sellerOrderReferencedDocument;

        return $this->sellerOrderReferencedDocument;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType $referencedDocumentType
     * @return self
     */
    public function setSellerOrderReferencedDocument(ReferencedDocumentType $referencedDocumentType): self
    {
        $this->sellerOrderReferencedDocument = $referencedDocumentType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType|null
     */
    public function getBuyerOrderReferencedDocument(): ?ReferencedDocumentType
    {
        return $this->buyerOrderReferencedDocument;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType
     */
    public function getBuyerOrderReferencedDocumentWithCreate(): ReferencedDocumentType
    {
        $this->buyerOrderReferencedDocument = is_null($this->buyerOrderReferencedDocument) ? new ReferencedDocumentType() : $this->buyerOrderReferencedDocument;

        return $this->buyerOrderReferencedDocument;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType $referencedDocumentType
     * @return self
     */
    public function setBuyerOrderReferencedDocument(ReferencedDocumentType $referencedDocumentType): self
    {
        $this->buyerOrderReferencedDocument = $referencedDocumentType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType|null
     */
    public function getQuotationReferencedDocument(): ?ReferencedDocumentType
    {
        return $this->quotationReferencedDocument;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType
     */
    public function getQuotationReferencedDocumentWithCreate(): ReferencedDocumentType
    {
        $this->quotationReferencedDocument = is_null($this->quotationReferencedDocument) ? new ReferencedDocumentType() : $this->quotationReferencedDocument;

        return $this->quotationReferencedDocument;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType $referencedDocumentType
     * @return self
     */
    public function setQuotationReferencedDocument(ReferencedDocumentType $referencedDocumentType): self
    {
        $this->quotationReferencedDocument = $referencedDocumentType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType|null
     */
    public function getContractReferencedDocument(): ?ReferencedDocumentType
    {
        return $this->contractReferencedDocument;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType
     */
    public function getContractReferencedDocumentWithCreate(): ReferencedDocumentType
    {
        $this->contractReferencedDocument = is_null($this->contractReferencedDocument) ? new ReferencedDocumentType() : $this->contractReferencedDocument;

        return $this->contractReferencedDocument;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType $referencedDocumentType
     * @return self
     */
    public function setContractReferencedDocument(ReferencedDocumentType $referencedDocumentType): self
    {
        $this->contractReferencedDocument = $referencedDocumentType;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType>|null
     */
    public function getAdditionalReferencedDocument(): ?array
    {
        return $this->additionalReferencedDocument;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType> $additionalReferencedDocument
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
     * @param \horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType $referencedDocumentType
     * @return self
     */
    public function addToAdditionalReferencedDocument(ReferencedDocumentType $referencedDocumentType): self
    {
        $this->additionalReferencedDocument[] = $referencedDocumentType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType
     */
    public function addToAdditionalReferencedDocumentWithCreate(): ReferencedDocumentType
    {
        $this->addToadditionalReferencedDocument($referencedDocumentType = new ReferencedDocumentType());

        return $referencedDocumentType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradePartyType|null
     */
    public function getBuyerAgentTradeParty(): ?TradePartyType
    {
        return $this->buyerAgentTradeParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradePartyType
     */
    public function getBuyerAgentTradePartyWithCreate(): TradePartyType
    {
        $this->buyerAgentTradeParty = is_null($this->buyerAgentTradeParty) ? new TradePartyType() : $this->buyerAgentTradeParty;

        return $this->buyerAgentTradeParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\TradePartyType $tradePartyType
     * @return self
     */
    public function setBuyerAgentTradeParty(TradePartyType $tradePartyType): self
    {
        $this->buyerAgentTradeParty = $tradePartyType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\ProcuringProjectType|null
     */
    public function getSpecifiedProcuringProject(): ?ProcuringProjectType
    {
        return $this->procuringProjectType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\ProcuringProjectType
     */
    public function getSpecifiedProcuringProjectWithCreate(): ProcuringProjectType
    {
        $this->procuringProjectType = is_null($this->procuringProjectType) ? new ProcuringProjectType() : $this->procuringProjectType;

        return $this->procuringProjectType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\ProcuringProjectType $procuringProjectType
     * @return self
     */
    public function setSpecifiedProcuringProject(ProcuringProjectType $procuringProjectType): self
    {
        $this->procuringProjectType = $procuringProjectType;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType>|null
     */
    public function getUltimateCustomerOrderReferencedDocument(): ?array
    {
        return $this->ultimateCustomerOrderReferencedDocument;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType> $ultimateCustomerOrderReferencedDocument
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
     * @param \horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType $referencedDocumentType
     * @return self
     */
    public function addToUltimateCustomerOrderReferencedDocument(
        ReferencedDocumentType $referencedDocumentType,
    ): self {
        $this->ultimateCustomerOrderReferencedDocument[] = $referencedDocumentType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\ReferencedDocumentType
     */
    public function addToUltimateCustomerOrderReferencedDocumentWithCreate(): ReferencedDocumentType
    {
        $this->addToultimateCustomerOrderReferencedDocument($referencedDocumentType = new ReferencedDocumentType());

        return $referencedDocumentType;
    }
}
