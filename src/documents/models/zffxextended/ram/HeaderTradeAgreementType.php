<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\zffxextended\ram;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\zffxextended\udt\TextType;
use JMS\Serializer\Annotation as JMS;

class HeaderTradeAgreementType
{
    use HandlesObjectFlags;

    /**
     * @var null|TextType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("BuyerReference")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBuyerReference", setter="setBuyerReference")
     */
    private $buyerReference;

    /**
     * @var null|TradePartyType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\ram\TradePartyType")
     * @JMS\Expose
     * @JMS\SerializedName("SellerTradeParty")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSellerTradeParty", setter="setSellerTradeParty")
     */
    private $sellerTradeParty;

    /**
     * @var null|TradePartyType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\ram\TradePartyType")
     * @JMS\Expose
     * @JMS\SerializedName("BuyerTradeParty")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBuyerTradeParty", setter="setBuyerTradeParty")
     */
    private $buyerTradeParty;

    /**
     * @var null|TradePartyType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\ram\TradePartyType")
     * @JMS\Expose
     * @JMS\SerializedName("SalesAgentTradeParty")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSalesAgentTradeParty", setter="setSalesAgentTradeParty")
     */
    private $salesAgentTradeParty;

    /**
     * @var null|TradePartyType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\ram\TradePartyType")
     * @JMS\Expose
     * @JMS\SerializedName("BuyerTaxRepresentativeTradeParty")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBuyerTaxRepresentativeTradeParty", setter="setBuyerTaxRepresentativeTradeParty")
     */
    private $buyerTaxRepresentativeTradeParty;

    /**
     * @var null|TradePartyType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\ram\TradePartyType")
     * @JMS\Expose
     * @JMS\SerializedName("SellerTaxRepresentativeTradeParty")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSellerTaxRepresentativeTradeParty", setter="setSellerTaxRepresentativeTradeParty")
     */
    private $sellerTaxRepresentativeTradeParty;

    /**
     * @var null|TradePartyType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\ram\TradePartyType")
     * @JMS\Expose
     * @JMS\SerializedName("ProductEndUserTradeParty")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getProductEndUserTradeParty", setter="setProductEndUserTradeParty")
     */
    private $productEndUserTradeParty;

    /**
     * @var null|TradeDeliveryTermsType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\ram\TradeDeliveryTermsType")
     * @JMS\Expose
     * @JMS\SerializedName("ApplicableTradeDeliveryTerms")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getApplicableTradeDeliveryTerms", setter="setApplicableTradeDeliveryTerms")
     */
    private $applicableTradeDeliveryTerms;

    /**
     * @var null|ReferencedDocumentType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\ram\ReferencedDocumentType")
     * @JMS\Expose
     * @JMS\SerializedName("SellerOrderReferencedDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSellerOrderReferencedDocument", setter="setSellerOrderReferencedDocument")
     */
    private $sellerOrderReferencedDocument;

    /**
     * @var null|ReferencedDocumentType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\ram\ReferencedDocumentType")
     * @JMS\Expose
     * @JMS\SerializedName("BuyerOrderReferencedDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBuyerOrderReferencedDocument", setter="setBuyerOrderReferencedDocument")
     */
    private $buyerOrderReferencedDocument;

    /**
     * @var null|ReferencedDocumentType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\ram\ReferencedDocumentType")
     * @JMS\Expose
     * @JMS\SerializedName("QuotationReferencedDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getQuotationReferencedDocument", setter="setQuotationReferencedDocument")
     */
    private $quotationReferencedDocument;

    /**
     * @var null|ReferencedDocumentType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\ram\ReferencedDocumentType")
     * @JMS\Expose
     * @JMS\SerializedName("ContractReferencedDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getContractReferencedDocument", setter="setContractReferencedDocument")
     */
    private $contractReferencedDocument;

    /**
     * @var null|array<ReferencedDocumentType>
     * @JMS\Groups({"zffx"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\zffxextended\ram\ReferencedDocumentType>")
     * @JMS\Expose
     * @JMS\SerializedName("AdditionalReferencedDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="AdditionalReferencedDocument", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getAdditionalReferencedDocument", setter="setAdditionalReferencedDocument")
     */
    private $additionalReferencedDocument;

    /**
     * @var null|TradePartyType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\ram\TradePartyType")
     * @JMS\Expose
     * @JMS\SerializedName("BuyerAgentTradeParty")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBuyerAgentTradeParty", setter="setBuyerAgentTradeParty")
     */
    private $buyerAgentTradeParty;

    /**
     * @var null|ProcuringProjectType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\zffxextended\ram\ProcuringProjectType")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedProcuringProject")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSpecifiedProcuringProject", setter="setSpecifiedProcuringProject")
     */
    private $specifiedProcuringProject;

    /**
     * @var null|array<ReferencedDocumentType>
     * @JMS\Groups({"zffx"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\zffxextended\ram\ReferencedDocumentType>")
     * @JMS\Expose
     * @JMS\SerializedName("UltimateCustomerOrderReferencedDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="UltimateCustomerOrderReferencedDocument", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getUltimateCustomerOrderReferencedDocument", setter="setUltimateCustomerOrderReferencedDocument")
     */
    private $ultimateCustomerOrderReferencedDocument;

    /**
     * @return null|TextType
     */
    public function getBuyerReference(): ?TextType
    {
        return $this->buyerReference;
    }

    /**
     * @return TextType
     */
    public function getBuyerReferenceWithCreate(): TextType
    {
        $this->buyerReference = is_null($this->buyerReference) ? new TextType() : $this->buyerReference;

        return $this->buyerReference;
    }

    /**
     * @param  null|TextType $buyerReference
     * @return static
     */
    public function setBuyerReference(?TextType $buyerReference = null): static
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
     * @return null|TradePartyType
     */
    public function getSellerTradeParty(): ?TradePartyType
    {
        return $this->sellerTradeParty;
    }

    /**
     * @return TradePartyType
     */
    public function getSellerTradePartyWithCreate(): TradePartyType
    {
        $this->sellerTradeParty = is_null($this->sellerTradeParty) ? new TradePartyType() : $this->sellerTradeParty;

        return $this->sellerTradeParty;
    }

    /**
     * @param  null|TradePartyType $sellerTradeParty
     * @return static
     */
    public function setSellerTradeParty(?TradePartyType $sellerTradeParty = null): static
    {
        $this->sellerTradeParty = $sellerTradeParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSellerTradeParty(): static
    {
        $this->sellerTradeParty = null;

        return $this;
    }

    /**
     * @return null|TradePartyType
     */
    public function getBuyerTradeParty(): ?TradePartyType
    {
        return $this->buyerTradeParty;
    }

    /**
     * @return TradePartyType
     */
    public function getBuyerTradePartyWithCreate(): TradePartyType
    {
        $this->buyerTradeParty = is_null($this->buyerTradeParty) ? new TradePartyType() : $this->buyerTradeParty;

        return $this->buyerTradeParty;
    }

    /**
     * @param  null|TradePartyType $buyerTradeParty
     * @return static
     */
    public function setBuyerTradeParty(?TradePartyType $buyerTradeParty = null): static
    {
        $this->buyerTradeParty = $buyerTradeParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetBuyerTradeParty(): static
    {
        $this->buyerTradeParty = null;

        return $this;
    }

    /**
     * @return null|TradePartyType
     */
    public function getSalesAgentTradeParty(): ?TradePartyType
    {
        return $this->salesAgentTradeParty;
    }

    /**
     * @return TradePartyType
     */
    public function getSalesAgentTradePartyWithCreate(): TradePartyType
    {
        $this->salesAgentTradeParty = is_null($this->salesAgentTradeParty) ? new TradePartyType() : $this->salesAgentTradeParty;

        return $this->salesAgentTradeParty;
    }

    /**
     * @param  null|TradePartyType $salesAgentTradeParty
     * @return static
     */
    public function setSalesAgentTradeParty(?TradePartyType $salesAgentTradeParty = null): static
    {
        $this->salesAgentTradeParty = $salesAgentTradeParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSalesAgentTradeParty(): static
    {
        $this->salesAgentTradeParty = null;

        return $this;
    }

    /**
     * @return null|TradePartyType
     */
    public function getBuyerTaxRepresentativeTradeParty(): ?TradePartyType
    {
        return $this->buyerTaxRepresentativeTradeParty;
    }

    /**
     * @return TradePartyType
     */
    public function getBuyerTaxRepresentativeTradePartyWithCreate(): TradePartyType
    {
        $this->buyerTaxRepresentativeTradeParty = is_null($this->buyerTaxRepresentativeTradeParty) ? new TradePartyType() : $this->buyerTaxRepresentativeTradeParty;

        return $this->buyerTaxRepresentativeTradeParty;
    }

    /**
     * @param  null|TradePartyType $buyerTaxRepresentativeTradeParty
     * @return static
     */
    public function setBuyerTaxRepresentativeTradeParty(
        ?TradePartyType $buyerTaxRepresentativeTradeParty = null,
    ): static {
        $this->buyerTaxRepresentativeTradeParty = $buyerTaxRepresentativeTradeParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetBuyerTaxRepresentativeTradeParty(): static
    {
        $this->buyerTaxRepresentativeTradeParty = null;

        return $this;
    }

    /**
     * @return null|TradePartyType
     */
    public function getSellerTaxRepresentativeTradeParty(): ?TradePartyType
    {
        return $this->sellerTaxRepresentativeTradeParty;
    }

    /**
     * @return TradePartyType
     */
    public function getSellerTaxRepresentativeTradePartyWithCreate(): TradePartyType
    {
        $this->sellerTaxRepresentativeTradeParty = is_null($this->sellerTaxRepresentativeTradeParty) ? new TradePartyType() : $this->sellerTaxRepresentativeTradeParty;

        return $this->sellerTaxRepresentativeTradeParty;
    }

    /**
     * @param  null|TradePartyType $sellerTaxRepresentativeTradeParty
     * @return static
     */
    public function setSellerTaxRepresentativeTradeParty(
        ?TradePartyType $sellerTaxRepresentativeTradeParty = null,
    ): static {
        $this->sellerTaxRepresentativeTradeParty = $sellerTaxRepresentativeTradeParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSellerTaxRepresentativeTradeParty(): static
    {
        $this->sellerTaxRepresentativeTradeParty = null;

        return $this;
    }

    /**
     * @return null|TradePartyType
     */
    public function getProductEndUserTradeParty(): ?TradePartyType
    {
        return $this->productEndUserTradeParty;
    }

    /**
     * @return TradePartyType
     */
    public function getProductEndUserTradePartyWithCreate(): TradePartyType
    {
        $this->productEndUserTradeParty = is_null($this->productEndUserTradeParty) ? new TradePartyType() : $this->productEndUserTradeParty;

        return $this->productEndUserTradeParty;
    }

    /**
     * @param  null|TradePartyType $productEndUserTradeParty
     * @return static
     */
    public function setProductEndUserTradeParty(?TradePartyType $productEndUserTradeParty = null): static
    {
        $this->productEndUserTradeParty = $productEndUserTradeParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetProductEndUserTradeParty(): static
    {
        $this->productEndUserTradeParty = null;

        return $this;
    }

    /**
     * @return null|TradeDeliveryTermsType
     */
    public function getApplicableTradeDeliveryTerms(): ?TradeDeliveryTermsType
    {
        return $this->applicableTradeDeliveryTerms;
    }

    /**
     * @return TradeDeliveryTermsType
     */
    public function getApplicableTradeDeliveryTermsWithCreate(): TradeDeliveryTermsType
    {
        $this->applicableTradeDeliveryTerms = is_null($this->applicableTradeDeliveryTerms) ? new TradeDeliveryTermsType() : $this->applicableTradeDeliveryTerms;

        return $this->applicableTradeDeliveryTerms;
    }

    /**
     * @param  null|TradeDeliveryTermsType $applicableTradeDeliveryTerms
     * @return static
     */
    public function setApplicableTradeDeliveryTerms(
        ?TradeDeliveryTermsType $applicableTradeDeliveryTerms = null,
    ): static {
        $this->applicableTradeDeliveryTerms = $applicableTradeDeliveryTerms;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetApplicableTradeDeliveryTerms(): static
    {
        $this->applicableTradeDeliveryTerms = null;

        return $this;
    }

    /**
     * @return null|ReferencedDocumentType
     */
    public function getSellerOrderReferencedDocument(): ?ReferencedDocumentType
    {
        return $this->sellerOrderReferencedDocument;
    }

    /**
     * @return ReferencedDocumentType
     */
    public function getSellerOrderReferencedDocumentWithCreate(): ReferencedDocumentType
    {
        $this->sellerOrderReferencedDocument = is_null($this->sellerOrderReferencedDocument) ? new ReferencedDocumentType() : $this->sellerOrderReferencedDocument;

        return $this->sellerOrderReferencedDocument;
    }

    /**
     * @param  null|ReferencedDocumentType $sellerOrderReferencedDocument
     * @return static
     */
    public function setSellerOrderReferencedDocument(
        ?ReferencedDocumentType $sellerOrderReferencedDocument = null,
    ): static {
        $this->sellerOrderReferencedDocument = $sellerOrderReferencedDocument;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSellerOrderReferencedDocument(): static
    {
        $this->sellerOrderReferencedDocument = null;

        return $this;
    }

    /**
     * @return null|ReferencedDocumentType
     */
    public function getBuyerOrderReferencedDocument(): ?ReferencedDocumentType
    {
        return $this->buyerOrderReferencedDocument;
    }

    /**
     * @return ReferencedDocumentType
     */
    public function getBuyerOrderReferencedDocumentWithCreate(): ReferencedDocumentType
    {
        $this->buyerOrderReferencedDocument = is_null($this->buyerOrderReferencedDocument) ? new ReferencedDocumentType() : $this->buyerOrderReferencedDocument;

        return $this->buyerOrderReferencedDocument;
    }

    /**
     * @param  null|ReferencedDocumentType $buyerOrderReferencedDocument
     * @return static
     */
    public function setBuyerOrderReferencedDocument(
        ?ReferencedDocumentType $buyerOrderReferencedDocument = null,
    ): static {
        $this->buyerOrderReferencedDocument = $buyerOrderReferencedDocument;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetBuyerOrderReferencedDocument(): static
    {
        $this->buyerOrderReferencedDocument = null;

        return $this;
    }

    /**
     * @return null|ReferencedDocumentType
     */
    public function getQuotationReferencedDocument(): ?ReferencedDocumentType
    {
        return $this->quotationReferencedDocument;
    }

    /**
     * @return ReferencedDocumentType
     */
    public function getQuotationReferencedDocumentWithCreate(): ReferencedDocumentType
    {
        $this->quotationReferencedDocument = is_null($this->quotationReferencedDocument) ? new ReferencedDocumentType() : $this->quotationReferencedDocument;

        return $this->quotationReferencedDocument;
    }

    /**
     * @param  null|ReferencedDocumentType $quotationReferencedDocument
     * @return static
     */
    public function setQuotationReferencedDocument(?ReferencedDocumentType $quotationReferencedDocument = null): static
    {
        $this->quotationReferencedDocument = $quotationReferencedDocument;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetQuotationReferencedDocument(): static
    {
        $this->quotationReferencedDocument = null;

        return $this;
    }

    /**
     * @return null|ReferencedDocumentType
     */
    public function getContractReferencedDocument(): ?ReferencedDocumentType
    {
        return $this->contractReferencedDocument;
    }

    /**
     * @return ReferencedDocumentType
     */
    public function getContractReferencedDocumentWithCreate(): ReferencedDocumentType
    {
        $this->contractReferencedDocument = is_null($this->contractReferencedDocument) ? new ReferencedDocumentType() : $this->contractReferencedDocument;

        return $this->contractReferencedDocument;
    }

    /**
     * @param  null|ReferencedDocumentType $contractReferencedDocument
     * @return static
     */
    public function setContractReferencedDocument(?ReferencedDocumentType $contractReferencedDocument = null): static
    {
        $this->contractReferencedDocument = $contractReferencedDocument;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetContractReferencedDocument(): static
    {
        $this->contractReferencedDocument = null;

        return $this;
    }

    /**
     * @return null|array<ReferencedDocumentType>
     */
    public function getAdditionalReferencedDocument(): ?array
    {
        return $this->additionalReferencedDocument;
    }

    /**
     * @param  null|array<ReferencedDocumentType> $additionalReferencedDocument
     * @return static
     */
    public function setAdditionalReferencedDocument(?array $additionalReferencedDocument = null): static
    {
        $this->additionalReferencedDocument = $additionalReferencedDocument;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAdditionalReferencedDocument(): static
    {
        $this->additionalReferencedDocument = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearAdditionalReferencedDocument(): static
    {
        $this->additionalReferencedDocument = [];

        return $this;
    }

    /**
     * @param  ReferencedDocumentType $additionalReferencedDocument
     * @return static
     */
    public function addToAdditionalReferencedDocument(ReferencedDocumentType $additionalReferencedDocument): static
    {
        $this->additionalReferencedDocument[] = $additionalReferencedDocument;

        return $this;
    }

    /**
     * @return ReferencedDocumentType
     */
    public function addToAdditionalReferencedDocumentWithCreate(): ReferencedDocumentType
    {
        $this->addToadditionalReferencedDocument($additionalReferencedDocument = new ReferencedDocumentType());

        return $additionalReferencedDocument;
    }

    /**
     * @param  ReferencedDocumentType $additionalReferencedDocument
     * @return static
     */
    public function addOnceToAdditionalReferencedDocument(ReferencedDocumentType $additionalReferencedDocument): static
    {
        if (!is_array($this->additionalReferencedDocument)) {
            $this->additionalReferencedDocument = [];
        }

        $this->additionalReferencedDocument[0] = $additionalReferencedDocument;

        return $this;
    }

    /**
     * @return ReferencedDocumentType
     */
    public function addOnceToAdditionalReferencedDocumentWithCreate(): ReferencedDocumentType
    {
        if (!is_array($this->additionalReferencedDocument)) {
            $this->additionalReferencedDocument = [];
        }

        if ([] === $this->additionalReferencedDocument) {
            $this->addOnceToadditionalReferencedDocument(new ReferencedDocumentType());
        }

        return $this->additionalReferencedDocument[0];
    }

    /**
     * @return null|TradePartyType
     */
    public function getBuyerAgentTradeParty(): ?TradePartyType
    {
        return $this->buyerAgentTradeParty;
    }

    /**
     * @return TradePartyType
     */
    public function getBuyerAgentTradePartyWithCreate(): TradePartyType
    {
        $this->buyerAgentTradeParty = is_null($this->buyerAgentTradeParty) ? new TradePartyType() : $this->buyerAgentTradeParty;

        return $this->buyerAgentTradeParty;
    }

    /**
     * @param  null|TradePartyType $buyerAgentTradeParty
     * @return static
     */
    public function setBuyerAgentTradeParty(?TradePartyType $buyerAgentTradeParty = null): static
    {
        $this->buyerAgentTradeParty = $buyerAgentTradeParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetBuyerAgentTradeParty(): static
    {
        $this->buyerAgentTradeParty = null;

        return $this;
    }

    /**
     * @return null|ProcuringProjectType
     */
    public function getSpecifiedProcuringProject(): ?ProcuringProjectType
    {
        return $this->specifiedProcuringProject;
    }

    /**
     * @return ProcuringProjectType
     */
    public function getSpecifiedProcuringProjectWithCreate(): ProcuringProjectType
    {
        $this->specifiedProcuringProject = is_null($this->specifiedProcuringProject) ? new ProcuringProjectType() : $this->specifiedProcuringProject;

        return $this->specifiedProcuringProject;
    }

    /**
     * @param  null|ProcuringProjectType $specifiedProcuringProject
     * @return static
     */
    public function setSpecifiedProcuringProject(?ProcuringProjectType $specifiedProcuringProject = null): static
    {
        $this->specifiedProcuringProject = $specifiedProcuringProject;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSpecifiedProcuringProject(): static
    {
        $this->specifiedProcuringProject = null;

        return $this;
    }

    /**
     * @return null|array<ReferencedDocumentType>
     */
    public function getUltimateCustomerOrderReferencedDocument(): ?array
    {
        return $this->ultimateCustomerOrderReferencedDocument;
    }

    /**
     * @param  null|array<ReferencedDocumentType> $ultimateCustomerOrderReferencedDocument
     * @return static
     */
    public function setUltimateCustomerOrderReferencedDocument(
        ?array $ultimateCustomerOrderReferencedDocument = null,
    ): static {
        $this->ultimateCustomerOrderReferencedDocument = $ultimateCustomerOrderReferencedDocument;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetUltimateCustomerOrderReferencedDocument(): static
    {
        $this->ultimateCustomerOrderReferencedDocument = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearUltimateCustomerOrderReferencedDocument(): static
    {
        $this->ultimateCustomerOrderReferencedDocument = [];

        return $this;
    }

    /**
     * @param  ReferencedDocumentType $ultimateCustomerOrderReferencedDocument
     * @return static
     */
    public function addToUltimateCustomerOrderReferencedDocument(
        ReferencedDocumentType $ultimateCustomerOrderReferencedDocument,
    ): static {
        $this->ultimateCustomerOrderReferencedDocument[] = $ultimateCustomerOrderReferencedDocument;

        return $this;
    }

    /**
     * @return ReferencedDocumentType
     */
    public function addToUltimateCustomerOrderReferencedDocumentWithCreate(): ReferencedDocumentType
    {
        $this->addToultimateCustomerOrderReferencedDocument($ultimateCustomerOrderReferencedDocument = new ReferencedDocumentType());

        return $ultimateCustomerOrderReferencedDocument;
    }

    /**
     * @param  ReferencedDocumentType $ultimateCustomerOrderReferencedDocument
     * @return static
     */
    public function addOnceToUltimateCustomerOrderReferencedDocument(
        ReferencedDocumentType $ultimateCustomerOrderReferencedDocument,
    ): static {
        if (!is_array($this->ultimateCustomerOrderReferencedDocument)) {
            $this->ultimateCustomerOrderReferencedDocument = [];
        }

        $this->ultimateCustomerOrderReferencedDocument[0] = $ultimateCustomerOrderReferencedDocument;

        return $this;
    }

    /**
     * @return ReferencedDocumentType
     */
    public function addOnceToUltimateCustomerOrderReferencedDocumentWithCreate(): ReferencedDocumentType
    {
        if (!is_array($this->ultimateCustomerOrderReferencedDocument)) {
            $this->ultimateCustomerOrderReferencedDocument = [];
        }

        if ([] === $this->ultimateCustomerOrderReferencedDocument) {
            $this->addOnceToultimateCustomerOrderReferencedDocument(new ReferencedDocumentType());
        }

        return $this->ultimateCustomerOrderReferencedDocument[0];
    }
}
