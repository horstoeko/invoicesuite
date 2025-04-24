<?php

namespace horstoeko\invoicesuite\models\zugferd\ram;

use JMS\Serializer\Annotation as JMS;

class LineTradeAgreementType
{
    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\ReferencedDocumentType")
     * @JMS\Expose
     * @JMS\SerializedName("SellerOrderReferencedDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSellerOrderReferencedDocument", setter="setSellerOrderReferencedDocument")
     */
    private $sellerOrderReferencedDocument;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
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
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\ReferencedDocumentType")
     * @JMS\Expose
     * @JMS\SerializedName("ContractReferencedDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getContractReferencedDocument", setter="setContractReferencedDocument")
     */
    private $contractReferencedDocument;

    /**
     * @var array<\horstoeko\invoicesuite\models\zugferd\ram\ReferencedDocumentType>
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("array<horstoeko\zugferd\entities\extended\ram\ReferencedDocumentType>")
     * @JMS\Expose
     * @JMS\SerializedName("AdditionalReferencedDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="AdditionalReferencedDocument", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getAdditionalReferencedDocument", setter="setAdditionalReferencedDocument")
     */
    private $additionalReferencedDocument;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\TradePriceType
     * @JMS\Groups({"zffxbasic", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\TradePriceType")
     * @JMS\Expose
     * @JMS\SerializedName("GrossPriceProductTradePrice")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getGrossPriceProductTradePrice", setter="setGrossPriceProductTradePrice")
     */
    private $grossPriceProductTradePrice;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\TradePriceType
     * @JMS\Groups({"zffxbasic", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\TradePriceType")
     * @JMS\Expose
     * @JMS\SerializedName("NetPriceProductTradePrice")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getNetPriceProductTradePrice", setter="setNetPriceProductTradePrice")
     */
    private $netPriceProductTradePrice;

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
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradePriceType|null
     */
    public function getGrossPriceProductTradePrice(): ?\horstoeko\invoicesuite\models\zugferd\ram\TradePriceType
    {
        return $this->grossPriceProductTradePrice;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradePriceType
     */
    public function getGrossPriceProductTradePriceWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\ram\TradePriceType {
        $this->grossPriceProductTradePrice = is_null($this->grossPriceProductTradePrice) ? new TradePriceType() : $this->grossPriceProductTradePrice;

        return $this->grossPriceProductTradePrice;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradePriceType
     * @return self
     */
    public function setGrossPriceProductTradePrice(
        \horstoeko\invoicesuite\models\zugferd\ram\TradePriceType $tradePriceType,
    ): self {
        $this->grossPriceProductTradePrice = $tradePriceType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradePriceType|null
     */
    public function getNetPriceProductTradePrice(): ?\horstoeko\invoicesuite\models\zugferd\ram\TradePriceType
    {
        return $this->netPriceProductTradePrice;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradePriceType
     */
    public function getNetPriceProductTradePriceWithCreate(): \horstoeko\invoicesuite\models\zugferd\ram\TradePriceType
    {
        $this->netPriceProductTradePrice = is_null($this->netPriceProductTradePrice) ? new TradePriceType() : $this->netPriceProductTradePrice;

        return $this->netPriceProductTradePrice;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradePriceType
     * @return self
     */
    public function setNetPriceProductTradePrice(
        \horstoeko\invoicesuite\models\zugferd\ram\TradePriceType $tradePriceType,
    ): self {
        $this->netPriceProductTradePrice = $tradePriceType;

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
