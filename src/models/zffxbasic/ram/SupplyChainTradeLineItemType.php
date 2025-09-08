<?php

namespace horstoeko\invoicesuite\models\zffxbasic\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;

class SupplyChainTradeLineItemType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\zffxbasic\ram\DocumentLineDocumentType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxbasic\ram\DocumentLineDocumentType")
     * @JMS\Expose
     * @JMS\SerializedName("AssociatedDocumentLineDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getAssociatedDocumentLineDocument", setter="setAssociatedDocumentLineDocument")
     */
    private $associatedDocumentLineDocument;

    /**
     * @var \horstoeko\invoicesuite\models\zffxbasic\ram\TradeProductType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxbasic\ram\TradeProductType")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedTradeProduct")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSpecifiedTradeProduct", setter="setSpecifiedTradeProduct")
     */
    private $specifiedTradeProduct;

    /**
     * @var \horstoeko\invoicesuite\models\zffxbasic\ram\LineTradeAgreementType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxbasic\ram\LineTradeAgreementType")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedLineTradeAgreement")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSpecifiedLineTradeAgreement", setter="setSpecifiedLineTradeAgreement")
     */
    private $specifiedLineTradeAgreement;

    /**
     * @var \horstoeko\invoicesuite\models\zffxbasic\ram\LineTradeDeliveryType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxbasic\ram\LineTradeDeliveryType")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedLineTradeDelivery")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSpecifiedLineTradeDelivery", setter="setSpecifiedLineTradeDelivery")
     */
    private $specifiedLineTradeDelivery;

    /**
     * @var \horstoeko\invoicesuite\models\zffxbasic\ram\LineTradeSettlementType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxbasic\ram\LineTradeSettlementType")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedLineTradeSettlement")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSpecifiedLineTradeSettlement", setter="setSpecifiedLineTradeSettlement")
     */
    private $specifiedLineTradeSettlement;

    /**
     * @return \horstoeko\invoicesuite\models\zffxbasic\ram\DocumentLineDocumentType|null
     */
    public function getAssociatedDocumentLineDocument(): ?DocumentLineDocumentType
    {
        return $this->associatedDocumentLineDocument;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxbasic\ram\DocumentLineDocumentType
     */
    public function getAssociatedDocumentLineDocumentWithCreate(): DocumentLineDocumentType
    {
        $this->associatedDocumentLineDocument = is_null($this->associatedDocumentLineDocument) ? new DocumentLineDocumentType() : $this->associatedDocumentLineDocument;

        return $this->associatedDocumentLineDocument;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxbasic\ram\DocumentLineDocumentType|null $associatedDocumentLineDocument
     * @return self
     */
    public function setAssociatedDocumentLineDocument(
        ?DocumentLineDocumentType $associatedDocumentLineDocument = null,
    ): self {
        $this->associatedDocumentLineDocument = $associatedDocumentLineDocument;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetAssociatedDocumentLineDocument(): self
    {
        $this->associatedDocumentLineDocument = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxbasic\ram\TradeProductType|null
     */
    public function getSpecifiedTradeProduct(): ?TradeProductType
    {
        return $this->specifiedTradeProduct;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxbasic\ram\TradeProductType
     */
    public function getSpecifiedTradeProductWithCreate(): TradeProductType
    {
        $this->specifiedTradeProduct = is_null($this->specifiedTradeProduct) ? new TradeProductType() : $this->specifiedTradeProduct;

        return $this->specifiedTradeProduct;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxbasic\ram\TradeProductType|null $specifiedTradeProduct
     * @return self
     */
    public function setSpecifiedTradeProduct(?TradeProductType $specifiedTradeProduct = null): self
    {
        $this->specifiedTradeProduct = $specifiedTradeProduct;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSpecifiedTradeProduct(): self
    {
        $this->specifiedTradeProduct = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxbasic\ram\LineTradeAgreementType|null
     */
    public function getSpecifiedLineTradeAgreement(): ?LineTradeAgreementType
    {
        return $this->specifiedLineTradeAgreement;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxbasic\ram\LineTradeAgreementType
     */
    public function getSpecifiedLineTradeAgreementWithCreate(): LineTradeAgreementType
    {
        $this->specifiedLineTradeAgreement = is_null($this->specifiedLineTradeAgreement) ? new LineTradeAgreementType() : $this->specifiedLineTradeAgreement;

        return $this->specifiedLineTradeAgreement;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxbasic\ram\LineTradeAgreementType|null $specifiedLineTradeAgreement
     * @return self
     */
    public function setSpecifiedLineTradeAgreement(?LineTradeAgreementType $specifiedLineTradeAgreement = null): self
    {
        $this->specifiedLineTradeAgreement = $specifiedLineTradeAgreement;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSpecifiedLineTradeAgreement(): self
    {
        $this->specifiedLineTradeAgreement = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxbasic\ram\LineTradeDeliveryType|null
     */
    public function getSpecifiedLineTradeDelivery(): ?LineTradeDeliveryType
    {
        return $this->specifiedLineTradeDelivery;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxbasic\ram\LineTradeDeliveryType
     */
    public function getSpecifiedLineTradeDeliveryWithCreate(): LineTradeDeliveryType
    {
        $this->specifiedLineTradeDelivery = is_null($this->specifiedLineTradeDelivery) ? new LineTradeDeliveryType() : $this->specifiedLineTradeDelivery;

        return $this->specifiedLineTradeDelivery;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxbasic\ram\LineTradeDeliveryType|null $specifiedLineTradeDelivery
     * @return self
     */
    public function setSpecifiedLineTradeDelivery(?LineTradeDeliveryType $specifiedLineTradeDelivery = null): self
    {
        $this->specifiedLineTradeDelivery = $specifiedLineTradeDelivery;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSpecifiedLineTradeDelivery(): self
    {
        $this->specifiedLineTradeDelivery = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxbasic\ram\LineTradeSettlementType|null
     */
    public function getSpecifiedLineTradeSettlement(): ?LineTradeSettlementType
    {
        return $this->specifiedLineTradeSettlement;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxbasic\ram\LineTradeSettlementType
     */
    public function getSpecifiedLineTradeSettlementWithCreate(): LineTradeSettlementType
    {
        $this->specifiedLineTradeSettlement = is_null($this->specifiedLineTradeSettlement) ? new LineTradeSettlementType() : $this->specifiedLineTradeSettlement;

        return $this->specifiedLineTradeSettlement;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxbasic\ram\LineTradeSettlementType|null $specifiedLineTradeSettlement
     * @return self
     */
    public function setSpecifiedLineTradeSettlement(
        ?LineTradeSettlementType $specifiedLineTradeSettlement = null,
    ): self {
        $this->specifiedLineTradeSettlement = $specifiedLineTradeSettlement;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSpecifiedLineTradeSettlement(): self
    {
        $this->specifiedLineTradeSettlement = null;

        return $this;
    }
}
