<?php

namespace horstoeko\invoicesuite\models\zugferd\ram;

use JMS\Serializer\Annotation as JMS;

class SupplyChainTradeLineItemType
{
    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\DocumentLineDocumentType
     * @JMS\Groups({"zffxbasic", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\DocumentLineDocumentType")
     * @JMS\Expose
     * @JMS\SerializedName("AssociatedDocumentLineDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getAssociatedDocumentLineDocument", setter="setAssociatedDocumentLineDocument")
     */
    private $documentLineDocumentType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\TradeProductType
     * @JMS\Groups({"zffxbasic", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\TradeProductType")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedTradeProduct")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSpecifiedTradeProduct", setter="setSpecifiedTradeProduct")
     */
    private $tradeProductType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\LineTradeAgreementType
     * @JMS\Groups({"zffxbasic", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\LineTradeAgreementType")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedLineTradeAgreement")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSpecifiedLineTradeAgreement", setter="setSpecifiedLineTradeAgreement")
     */
    private $lineTradeAgreementType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\LineTradeDeliveryType
     * @JMS\Groups({"zffxbasic", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\LineTradeDeliveryType")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedLineTradeDelivery")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSpecifiedLineTradeDelivery", setter="setSpecifiedLineTradeDelivery")
     */
    private $lineTradeDeliveryType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\LineTradeSettlementType
     * @JMS\Groups({"zffxbasic", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\LineTradeSettlementType")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedLineTradeSettlement")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSpecifiedLineTradeSettlement", setter="setSpecifiedLineTradeSettlement")
     */
    private $lineTradeSettlementType;

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\DocumentLineDocumentType|null
     */
    public function getAssociatedDocumentLineDocument(
    ): ?\horstoeko\invoicesuite\models\zugferd\ram\DocumentLineDocumentType {
        return $this->documentLineDocumentType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\DocumentLineDocumentType
     */
    public function getAssociatedDocumentLineDocumentWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\ram\DocumentLineDocumentType {
        $this->documentLineDocumentType = is_null($this->documentLineDocumentType) ? new DocumentLineDocumentType() : $this->documentLineDocumentType;

        return $this->documentLineDocumentType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\DocumentLineDocumentType
     * @return self
     */
    public function setAssociatedDocumentLineDocument(
        \horstoeko\invoicesuite\models\zugferd\ram\DocumentLineDocumentType $documentLineDocumentType,
    ): self {
        $this->documentLineDocumentType = $documentLineDocumentType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradeProductType|null
     */
    public function getSpecifiedTradeProduct(): ?\horstoeko\invoicesuite\models\zugferd\ram\TradeProductType
    {
        return $this->tradeProductType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradeProductType
     */
    public function getSpecifiedTradeProductWithCreate(): \horstoeko\invoicesuite\models\zugferd\ram\TradeProductType
    {
        $this->tradeProductType = is_null($this->tradeProductType) ? new TradeProductType() : $this->tradeProductType;

        return $this->tradeProductType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradeProductType
     * @return self
     */
    public function setSpecifiedTradeProduct(
        \horstoeko\invoicesuite\models\zugferd\ram\TradeProductType $tradeProductType,
    ): self {
        $this->tradeProductType = $tradeProductType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\LineTradeAgreementType|null
     */
    public function getSpecifiedLineTradeAgreement(): ?\horstoeko\invoicesuite\models\zugferd\ram\LineTradeAgreementType
    {
        return $this->lineTradeAgreementType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\LineTradeAgreementType
     */
    public function getSpecifiedLineTradeAgreementWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\ram\LineTradeAgreementType {
        $this->lineTradeAgreementType = is_null($this->lineTradeAgreementType) ? new LineTradeAgreementType() : $this->lineTradeAgreementType;

        return $this->lineTradeAgreementType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\LineTradeAgreementType
     * @return self
     */
    public function setSpecifiedLineTradeAgreement(
        \horstoeko\invoicesuite\models\zugferd\ram\LineTradeAgreementType $lineTradeAgreementType,
    ): self {
        $this->lineTradeAgreementType = $lineTradeAgreementType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\LineTradeDeliveryType|null
     */
    public function getSpecifiedLineTradeDelivery(): ?\horstoeko\invoicesuite\models\zugferd\ram\LineTradeDeliveryType
    {
        return $this->lineTradeDeliveryType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\LineTradeDeliveryType
     */
    public function getSpecifiedLineTradeDeliveryWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\ram\LineTradeDeliveryType {
        $this->lineTradeDeliveryType = is_null($this->lineTradeDeliveryType) ? new LineTradeDeliveryType() : $this->lineTradeDeliveryType;

        return $this->lineTradeDeliveryType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\LineTradeDeliveryType
     * @return self
     */
    public function setSpecifiedLineTradeDelivery(
        \horstoeko\invoicesuite\models\zugferd\ram\LineTradeDeliveryType $lineTradeDeliveryType,
    ): self {
        $this->lineTradeDeliveryType = $lineTradeDeliveryType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\LineTradeSettlementType|null
     */
    public function getSpecifiedLineTradeSettlement(
    ): ?\horstoeko\invoicesuite\models\zugferd\ram\LineTradeSettlementType {
        return $this->lineTradeSettlementType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\LineTradeSettlementType
     */
    public function getSpecifiedLineTradeSettlementWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\ram\LineTradeSettlementType {
        $this->lineTradeSettlementType = is_null($this->lineTradeSettlementType) ? new LineTradeSettlementType() : $this->lineTradeSettlementType;

        return $this->lineTradeSettlementType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\LineTradeSettlementType
     * @return self
     */
    public function setSpecifiedLineTradeSettlement(
        \horstoeko\invoicesuite\models\zugferd\ram\LineTradeSettlementType $lineTradeSettlementType,
    ): self {
        $this->lineTradeSettlementType = $lineTradeSettlementType;

        return $this;
    }
}
