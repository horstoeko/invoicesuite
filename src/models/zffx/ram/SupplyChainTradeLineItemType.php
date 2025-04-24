<?php

namespace horstoeko\invoicesuite\models\zffx\ram;

use JMS\Serializer\Annotation as JMS;

class SupplyChainTradeLineItemType
{
    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\DocumentLineDocumentType
     * @JMS\Groups({"zffxbasic", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\DocumentLineDocumentType")
     * @JMS\Expose
     * @JMS\SerializedName("AssociatedDocumentLineDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getAssociatedDocumentLineDocument", setter="setAssociatedDocumentLineDocument")
     */
    private $documentLineDocumentType;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\TradeProductType
     * @JMS\Groups({"zffxbasic", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\TradeProductType")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedTradeProduct")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSpecifiedTradeProduct", setter="setSpecifiedTradeProduct")
     */
    private $tradeProductType;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\LineTradeAgreementType
     * @JMS\Groups({"zffxbasic", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\LineTradeAgreementType")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedLineTradeAgreement")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSpecifiedLineTradeAgreement", setter="setSpecifiedLineTradeAgreement")
     */
    private $lineTradeAgreementType;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\LineTradeDeliveryType
     * @JMS\Groups({"zffxbasic", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\LineTradeDeliveryType")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedLineTradeDelivery")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSpecifiedLineTradeDelivery", setter="setSpecifiedLineTradeDelivery")
     */
    private $lineTradeDeliveryType;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\LineTradeSettlementType
     * @JMS\Groups({"zffxbasic", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\LineTradeSettlementType")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedLineTradeSettlement")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSpecifiedLineTradeSettlement", setter="setSpecifiedLineTradeSettlement")
     */
    private $lineTradeSettlementType;

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\DocumentLineDocumentType|null
     */
    public function getAssociatedDocumentLineDocument(): ?DocumentLineDocumentType
    {
        return $this->documentLineDocumentType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\DocumentLineDocumentType
     */
    public function getAssociatedDocumentLineDocumentWithCreate(): DocumentLineDocumentType
    {
        $this->documentLineDocumentType = is_null($this->documentLineDocumentType) ? new DocumentLineDocumentType() : $this->documentLineDocumentType;

        return $this->documentLineDocumentType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\DocumentLineDocumentType $documentLineDocumentType
     * @return self
     */
    public function setAssociatedDocumentLineDocument(DocumentLineDocumentType $documentLineDocumentType): self
    {
        $this->documentLineDocumentType = $documentLineDocumentType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradeProductType|null
     */
    public function getSpecifiedTradeProduct(): ?TradeProductType
    {
        return $this->tradeProductType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradeProductType
     */
    public function getSpecifiedTradeProductWithCreate(): TradeProductType
    {
        $this->tradeProductType = is_null($this->tradeProductType) ? new TradeProductType() : $this->tradeProductType;

        return $this->tradeProductType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\TradeProductType $tradeProductType
     * @return self
     */
    public function setSpecifiedTradeProduct(TradeProductType $tradeProductType): self
    {
        $this->tradeProductType = $tradeProductType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\LineTradeAgreementType|null
     */
    public function getSpecifiedLineTradeAgreement(): ?LineTradeAgreementType
    {
        return $this->lineTradeAgreementType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\LineTradeAgreementType
     */
    public function getSpecifiedLineTradeAgreementWithCreate(): LineTradeAgreementType
    {
        $this->lineTradeAgreementType = is_null($this->lineTradeAgreementType) ? new LineTradeAgreementType() : $this->lineTradeAgreementType;

        return $this->lineTradeAgreementType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\LineTradeAgreementType $lineTradeAgreementType
     * @return self
     */
    public function setSpecifiedLineTradeAgreement(LineTradeAgreementType $lineTradeAgreementType): self
    {
        $this->lineTradeAgreementType = $lineTradeAgreementType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\LineTradeDeliveryType|null
     */
    public function getSpecifiedLineTradeDelivery(): ?LineTradeDeliveryType
    {
        return $this->lineTradeDeliveryType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\LineTradeDeliveryType
     */
    public function getSpecifiedLineTradeDeliveryWithCreate(): LineTradeDeliveryType
    {
        $this->lineTradeDeliveryType = is_null($this->lineTradeDeliveryType) ? new LineTradeDeliveryType() : $this->lineTradeDeliveryType;

        return $this->lineTradeDeliveryType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\LineTradeDeliveryType $lineTradeDeliveryType
     * @return self
     */
    public function setSpecifiedLineTradeDelivery(LineTradeDeliveryType $lineTradeDeliveryType): self
    {
        $this->lineTradeDeliveryType = $lineTradeDeliveryType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\LineTradeSettlementType|null
     */
    public function getSpecifiedLineTradeSettlement(): ?LineTradeSettlementType
    {
        return $this->lineTradeSettlementType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\LineTradeSettlementType
     */
    public function getSpecifiedLineTradeSettlementWithCreate(): LineTradeSettlementType
    {
        $this->lineTradeSettlementType = is_null($this->lineTradeSettlementType) ? new LineTradeSettlementType() : $this->lineTradeSettlementType;

        return $this->lineTradeSettlementType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\LineTradeSettlementType $lineTradeSettlementType
     * @return self
     */
    public function setSpecifiedLineTradeSettlement(LineTradeSettlementType $lineTradeSettlementType): self
    {
        $this->lineTradeSettlementType = $lineTradeSettlementType;

        return $this;
    }
}
