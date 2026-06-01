<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\zffx\models\ram;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\TextType;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use JMS\Serializer\Annotation as JMS;

class HeaderTradeAgreementType
{
    use HandlesObjectFlags;

    /**
     * @var null|TextType
     */
    #[JMS\Accessor(getter: 'getBuyerReference', setter: 'setBuyerReference')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('BuyerReference')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\TextType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $buyerReference;

    /**
     * @var null|TradePartyType
     */
    #[JMS\Accessor(getter: 'getSellerTradeParty', setter: 'setSellerTradeParty')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('SellerTradeParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradePartyType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $sellerTradeParty;

    /**
     * @var null|TradePartyType
     */
    #[JMS\Accessor(getter: 'getBuyerTradeParty', setter: 'setBuyerTradeParty')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('BuyerTradeParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradePartyType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $buyerTradeParty;

    /**
     * @var null|TradePartyType
     */
    #[JMS\Accessor(getter: 'getSalesAgentTradeParty', setter: 'setSalesAgentTradeParty')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('SalesAgentTradeParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradePartyType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $salesAgentTradeParty;

    /**
     * @var null|TradePartyType
     */
    #[JMS\Accessor(getter: 'getBuyerTaxRepresentativeTradeParty', setter: 'setBuyerTaxRepresentativeTradeParty')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('BuyerTaxRepresentativeTradeParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradePartyType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $buyerTaxRepresentativeTradeParty;

    /**
     * @var null|TradePartyType
     */
    #[JMS\Accessor(getter: 'getSellerTaxRepresentativeTradeParty', setter: 'setSellerTaxRepresentativeTradeParty')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('SellerTaxRepresentativeTradeParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradePartyType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $sellerTaxRepresentativeTradeParty;

    /**
     * @var null|TradePartyType
     */
    #[JMS\Accessor(getter: 'getProductEndUserTradeParty', setter: 'setProductEndUserTradeParty')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('ProductEndUserTradeParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradePartyType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $productEndUserTradeParty;

    /**
     * @var null|TradeDeliveryTermsType
     */
    #[JMS\Accessor(getter: 'getApplicableTradeDeliveryTerms', setter: 'setApplicableTradeDeliveryTerms')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('ApplicableTradeDeliveryTerms')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradeDeliveryTermsType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $applicableTradeDeliveryTerms;

    /**
     * @var null|ReferencedDocumentType
     */
    #[JMS\Accessor(getter: 'getSellerOrderReferencedDocument', setter: 'setSellerOrderReferencedDocument')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('SellerOrderReferencedDocument')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\ReferencedDocumentType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $sellerOrderReferencedDocument;

    /**
     * @var null|ReferencedDocumentType
     */
    #[JMS\Accessor(getter: 'getBuyerOrderReferencedDocument', setter: 'setBuyerOrderReferencedDocument')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('BuyerOrderReferencedDocument')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\ReferencedDocumentType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $buyerOrderReferencedDocument;

    /**
     * @var null|ReferencedDocumentType
     */
    #[JMS\Accessor(getter: 'getQuotationReferencedDocument', setter: 'setQuotationReferencedDocument')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('QuotationReferencedDocument')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\ReferencedDocumentType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $quotationReferencedDocument;

    /**
     * @var null|ReferencedDocumentType
     */
    #[JMS\Accessor(getter: 'getContractReferencedDocument', setter: 'setContractReferencedDocument')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('ContractReferencedDocument')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\ReferencedDocumentType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $contractReferencedDocument;

    /**
     * @var null|array<ReferencedDocumentType>
     */
    #[JMS\Accessor(getter: 'getAdditionalReferencedDocument', setter: 'setAdditionalReferencedDocument')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('AdditionalReferencedDocument')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\zffx\models\ram\ReferencedDocumentType>')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'AdditionalReferencedDocument', namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    private $additionalReferencedDocument;

    /**
     * @var null|TradePartyType
     */
    #[JMS\Accessor(getter: 'getBuyerAgentTradeParty', setter: 'setBuyerAgentTradeParty')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('BuyerAgentTradeParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradePartyType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $buyerAgentTradeParty;

    /**
     * @var null|ProcuringProjectType
     */
    #[JMS\Accessor(getter: 'getSpecifiedProcuringProject', setter: 'setSpecifiedProcuringProject')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('SpecifiedProcuringProject')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\ProcuringProjectType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $specifiedProcuringProject;

    /**
     * @var null|array<ReferencedDocumentType>
     */
    #[JMS\Accessor(getter: 'getUltimateCustomerOrderReferencedDocument', setter: 'setUltimateCustomerOrderReferencedDocument')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('UltimateCustomerOrderReferencedDocument')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\zffx\models\ram\ReferencedDocumentType>')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'UltimateCustomerOrderReferencedDocument', namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
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
        $this->buyerReference ??= new TextType();

        return $this->buyerReference;
    }

    /**
     * @param  null|TextType $buyerReference
     * @return static
     */
    public function setBuyerReference(
        ?TextType $buyerReference = null
    ): static {
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
        $this->sellerTradeParty ??= new TradePartyType();

        return $this->sellerTradeParty;
    }

    /**
     * @param  null|TradePartyType $sellerTradeParty
     * @return static
     */
    public function setSellerTradeParty(
        ?TradePartyType $sellerTradeParty = null
    ): static {
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
        $this->buyerTradeParty ??= new TradePartyType();

        return $this->buyerTradeParty;
    }

    /**
     * @param  null|TradePartyType $buyerTradeParty
     * @return static
     */
    public function setBuyerTradeParty(
        ?TradePartyType $buyerTradeParty = null
    ): static {
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
        $this->salesAgentTradeParty ??= new TradePartyType();

        return $this->salesAgentTradeParty;
    }

    /**
     * @param  null|TradePartyType $salesAgentTradeParty
     * @return static
     */
    public function setSalesAgentTradeParty(
        ?TradePartyType $salesAgentTradeParty = null
    ): static {
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
        $this->buyerTaxRepresentativeTradeParty ??= new TradePartyType();

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
        $this->sellerTaxRepresentativeTradeParty ??= new TradePartyType();

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
        $this->productEndUserTradeParty ??= new TradePartyType();

        return $this->productEndUserTradeParty;
    }

    /**
     * @param  null|TradePartyType $productEndUserTradeParty
     * @return static
     */
    public function setProductEndUserTradeParty(
        ?TradePartyType $productEndUserTradeParty = null
    ): static {
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
        $this->applicableTradeDeliveryTerms ??= new TradeDeliveryTermsType();

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
        $this->sellerOrderReferencedDocument ??= new ReferencedDocumentType();

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
        $this->buyerOrderReferencedDocument ??= new ReferencedDocumentType();

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
        $this->quotationReferencedDocument ??= new ReferencedDocumentType();

        return $this->quotationReferencedDocument;
    }

    /**
     * @param  null|ReferencedDocumentType $quotationReferencedDocument
     * @return static
     */
    public function setQuotationReferencedDocument(
        ?ReferencedDocumentType $quotationReferencedDocument = null
    ): static {
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
        $this->contractReferencedDocument ??= new ReferencedDocumentType();

        return $this->contractReferencedDocument;
    }

    /**
     * @param  null|ReferencedDocumentType $contractReferencedDocument
     * @return static
     */
    public function setContractReferencedDocument(
        ?ReferencedDocumentType $contractReferencedDocument = null
    ): static {
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
    public function setAdditionalReferencedDocument(
        ?array $additionalReferencedDocument = null
    ): static {
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
    public function addToAdditionalReferencedDocument(
        ReferencedDocumentType $additionalReferencedDocument
    ): static {
        $this->additionalReferencedDocument[] = $additionalReferencedDocument;

        return $this;
    }

    /**
     * @return ReferencedDocumentType
     */
    public function addToAdditionalReferencedDocumentWithCreate(): ReferencedDocumentType
    {
        $this->addToAdditionalReferencedDocument($additionalReferencedDocument = new ReferencedDocumentType());

        return $additionalReferencedDocument;
    }

    /**
     * @param  ReferencedDocumentType $additionalReferencedDocument
     * @return static
     */
    public function addOnceToAdditionalReferencedDocument(
        ReferencedDocumentType $additionalReferencedDocument
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->additionalReferencedDocument)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->additionalReferencedDocument)) {
            $this->additionalReferencedDocument = [];
        }

        if ([] === $this->additionalReferencedDocument) {
            $this->addOnceToAdditionalReferencedDocument(new ReferencedDocumentType());
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
        $this->buyerAgentTradeParty ??= new TradePartyType();

        return $this->buyerAgentTradeParty;
    }

    /**
     * @param  null|TradePartyType $buyerAgentTradeParty
     * @return static
     */
    public function setBuyerAgentTradeParty(
        ?TradePartyType $buyerAgentTradeParty = null
    ): static {
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
        $this->specifiedProcuringProject ??= new ProcuringProjectType();

        return $this->specifiedProcuringProject;
    }

    /**
     * @param  null|ProcuringProjectType $specifiedProcuringProject
     * @return static
     */
    public function setSpecifiedProcuringProject(
        ?ProcuringProjectType $specifiedProcuringProject = null
    ): static {
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
        $this->addToUltimateCustomerOrderReferencedDocument($ultimateCustomerOrderReferencedDocument = new ReferencedDocumentType());

        return $ultimateCustomerOrderReferencedDocument;
    }

    /**
     * @param  ReferencedDocumentType $ultimateCustomerOrderReferencedDocument
     * @return static
     */
    public function addOnceToUltimateCustomerOrderReferencedDocument(
        ReferencedDocumentType $ultimateCustomerOrderReferencedDocument,
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->ultimateCustomerOrderReferencedDocument)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->ultimateCustomerOrderReferencedDocument)) {
            $this->ultimateCustomerOrderReferencedDocument = [];
        }

        if ([] === $this->ultimateCustomerOrderReferencedDocument) {
            $this->addOnceToUltimateCustomerOrderReferencedDocument(new ReferencedDocumentType());
        }

        return $this->ultimateCustomerOrderReferencedDocument[0];
    }
}
