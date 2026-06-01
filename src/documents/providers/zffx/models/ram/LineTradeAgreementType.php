<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\zffx\models\ram;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use JMS\Serializer\Annotation as JMS;

class LineTradeAgreementType
{
    use HandlesObjectFlags;

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
     * @var null|TradePriceType
     */
    #[JMS\Accessor(getter: 'getGrossPriceProductTradePrice', setter: 'setGrossPriceProductTradePrice')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('GrossPriceProductTradePrice')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradePriceType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $grossPriceProductTradePrice;

    /**
     * @var null|TradePriceType
     */
    #[JMS\Accessor(getter: 'getNetPriceProductTradePrice', setter: 'setNetPriceProductTradePrice')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('NetPriceProductTradePrice')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradePriceType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $netPriceProductTradePrice;

    /**
     * @var null|TradePartyType
     */
    #[JMS\Accessor(getter: 'getItemSellerTradeParty', setter: 'setItemSellerTradeParty')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('ItemSellerTradeParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradePartyType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $itemSellerTradeParty;

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
     * @return null|TradePriceType
     */
    public function getGrossPriceProductTradePrice(): ?TradePriceType
    {
        return $this->grossPriceProductTradePrice;
    }

    /**
     * @return TradePriceType
     */
    public function getGrossPriceProductTradePriceWithCreate(): TradePriceType
    {
        $this->grossPriceProductTradePrice ??= new TradePriceType();

        return $this->grossPriceProductTradePrice;
    }

    /**
     * @param  null|TradePriceType $grossPriceProductTradePrice
     * @return static
     */
    public function setGrossPriceProductTradePrice(
        ?TradePriceType $grossPriceProductTradePrice = null
    ): static {
        $this->grossPriceProductTradePrice = $grossPriceProductTradePrice;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetGrossPriceProductTradePrice(): static
    {
        $this->grossPriceProductTradePrice = null;

        return $this;
    }

    /**
     * @return null|TradePriceType
     */
    public function getNetPriceProductTradePrice(): ?TradePriceType
    {
        return $this->netPriceProductTradePrice;
    }

    /**
     * @return TradePriceType
     */
    public function getNetPriceProductTradePriceWithCreate(): TradePriceType
    {
        $this->netPriceProductTradePrice ??= new TradePriceType();

        return $this->netPriceProductTradePrice;
    }

    /**
     * @param  null|TradePriceType $netPriceProductTradePrice
     * @return static
     */
    public function setNetPriceProductTradePrice(
        ?TradePriceType $netPriceProductTradePrice = null
    ): static {
        $this->netPriceProductTradePrice = $netPriceProductTradePrice;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetNetPriceProductTradePrice(): static
    {
        $this->netPriceProductTradePrice = null;

        return $this;
    }

    /**
     * @return null|TradePartyType
     */
    public function getItemSellerTradeParty(): ?TradePartyType
    {
        return $this->itemSellerTradeParty;
    }

    /**
     * @return TradePartyType
     */
    public function getItemSellerTradePartyWithCreate(): TradePartyType
    {
        $this->itemSellerTradeParty ??= new TradePartyType();

        return $this->itemSellerTradeParty;
    }

    /**
     * @param  null|TradePartyType $itemSellerTradeParty
     * @return static
     */
    public function setItemSellerTradeParty(
        ?TradePartyType $itemSellerTradeParty = null
    ): static {
        $this->itemSellerTradeParty = $itemSellerTradeParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetItemSellerTradeParty(): static
    {
        $this->itemSellerTradeParty = null;

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
