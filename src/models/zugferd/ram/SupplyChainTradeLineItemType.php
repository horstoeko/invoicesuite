<?php

namespace horstoeko\invoicesuite\models\zugferd\ram;

use JMS\Serializer\Annotation as JMS;

class SupplyChainTradeLineItemType
{
    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\DocumentLineDocumentType
     * @JMS\Groups({"zffxbasic", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\ram\DocumentLineDocumentType")
     * @JMS\Expose
     * @JMS\SerializedName("AssociatedDocumentLineDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getAssociatedDocumentLineDocument", setter="setAssociatedDocumentLineDocument")
     */
    private $associatedDocumentLineDocument;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\TradeProductType
     * @JMS\Groups({"zffxbasic", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\ram\TradeProductType")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedTradeProduct")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSpecifiedTradeProduct", setter="setSpecifiedTradeProduct")
     */
    private $specifiedTradeProduct;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\LineTradeAgreementType
     * @JMS\Groups({"zffxbasic", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\ram\LineTradeAgreementType")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedLineTradeAgreement")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSpecifiedLineTradeAgreement", setter="setSpecifiedLineTradeAgreement")
     */
    private $specifiedLineTradeAgreement;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\LineTradeDeliveryType
     * @JMS\Groups({"zffxbasic", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\ram\LineTradeDeliveryType")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedLineTradeDelivery")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSpecifiedLineTradeDelivery", setter="setSpecifiedLineTradeDelivery")
     */
    private $specifiedLineTradeDelivery;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\LineTradeSettlementType
     * @JMS\Groups({"zffxbasic", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\ram\LineTradeSettlementType")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedLineTradeSettlement")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSpecifiedLineTradeSettlement", setter="setSpecifiedLineTradeSettlement")
     */
    private $specifiedLineTradeSettlement;

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\DocumentLineDocumentType|null
     */
    public function getAssociatedDocumentLineDocument(): ?DocumentLineDocumentType
    {
        return $this->associatedDocumentLineDocument;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\DocumentLineDocumentType
     */
    public function getAssociatedDocumentLineDocumentWithCreate(): DocumentLineDocumentType
    {
        $this->associatedDocumentLineDocument = is_null($this->associatedDocumentLineDocument) ? new DocumentLineDocumentType() : $this->associatedDocumentLineDocument;

        return $this->associatedDocumentLineDocument;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\DocumentLineDocumentType $associatedDocumentLineDocument
     * @return self
     */
    public function setAssociatedDocumentLineDocument(DocumentLineDocumentType $associatedDocumentLineDocument): self
    {
        $this->associatedDocumentLineDocument = $associatedDocumentLineDocument;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradeProductType|null
     */
    public function getSpecifiedTradeProduct(): ?TradeProductType
    {
        return $this->specifiedTradeProduct;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradeProductType
     */
    public function getSpecifiedTradeProductWithCreate(): TradeProductType
    {
        $this->specifiedTradeProduct = is_null($this->specifiedTradeProduct) ? new TradeProductType() : $this->specifiedTradeProduct;

        return $this->specifiedTradeProduct;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradeProductType $specifiedTradeProduct
     * @return self
     */
    public function setSpecifiedTradeProduct(TradeProductType $specifiedTradeProduct): self
    {
        $this->specifiedTradeProduct = $specifiedTradeProduct;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\LineTradeAgreementType|null
     */
    public function getSpecifiedLineTradeAgreement(): ?LineTradeAgreementType
    {
        return $this->specifiedLineTradeAgreement;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\LineTradeAgreementType
     */
    public function getSpecifiedLineTradeAgreementWithCreate(): LineTradeAgreementType
    {
        $this->specifiedLineTradeAgreement = is_null($this->specifiedLineTradeAgreement) ? new LineTradeAgreementType() : $this->specifiedLineTradeAgreement;

        return $this->specifiedLineTradeAgreement;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\LineTradeAgreementType $specifiedLineTradeAgreement
     * @return self
     */
    public function setSpecifiedLineTradeAgreement(LineTradeAgreementType $specifiedLineTradeAgreement): self
    {
        $this->specifiedLineTradeAgreement = $specifiedLineTradeAgreement;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\LineTradeDeliveryType|null
     */
    public function getSpecifiedLineTradeDelivery(): ?LineTradeDeliveryType
    {
        return $this->specifiedLineTradeDelivery;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\LineTradeDeliveryType
     */
    public function getSpecifiedLineTradeDeliveryWithCreate(): LineTradeDeliveryType
    {
        $this->specifiedLineTradeDelivery = is_null($this->specifiedLineTradeDelivery) ? new LineTradeDeliveryType() : $this->specifiedLineTradeDelivery;

        return $this->specifiedLineTradeDelivery;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\LineTradeDeliveryType $specifiedLineTradeDelivery
     * @return self
     */
    public function setSpecifiedLineTradeDelivery(LineTradeDeliveryType $specifiedLineTradeDelivery): self
    {
        $this->specifiedLineTradeDelivery = $specifiedLineTradeDelivery;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\LineTradeSettlementType|null
     */
    public function getSpecifiedLineTradeSettlement(): ?LineTradeSettlementType
    {
        return $this->specifiedLineTradeSettlement;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\LineTradeSettlementType
     */
    public function getSpecifiedLineTradeSettlementWithCreate(): LineTradeSettlementType
    {
        $this->specifiedLineTradeSettlement = is_null($this->specifiedLineTradeSettlement) ? new LineTradeSettlementType() : $this->specifiedLineTradeSettlement;

        return $this->specifiedLineTradeSettlement;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\LineTradeSettlementType $specifiedLineTradeSettlement
     * @return self
     */
    public function setSpecifiedLineTradeSettlement(LineTradeSettlementType $specifiedLineTradeSettlement): self
    {
        $this->specifiedLineTradeSettlement = $specifiedLineTradeSettlement;

        return $this;
    }
}
