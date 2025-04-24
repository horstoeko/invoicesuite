<?php

namespace horstoeko\invoicesuite\models\zugferd\ram;

use JMS\Serializer\Annotation as JMS;

class SupplyChainTradeTransactionType
{
    /**
     * @var array<\horstoeko\invoicesuite\models\zugferd\ram\SupplyChainTradeLineItemType>
     * @JMS\Groups({"zffxbasic", "zffxen16931", "zffxextended"})
     * @JMS\Type("array<horstoeko\zugferd\entities\extended\ram\SupplyChainTradeLineItemType>")
     * @JMS\Expose
     * @JMS\SerializedName("IncludedSupplyChainTradeLineItem")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="IncludedSupplyChainTradeLineItem", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getIncludedSupplyChainTradeLineItem", setter="setIncludedSupplyChainTradeLineItem")
     */
    private $includedSupplyChainTradeLineItem;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\HeaderTradeAgreementType
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\HeaderTradeAgreementType")
     * @JMS\Expose
     * @JMS\SerializedName("ApplicableHeaderTradeAgreement")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getApplicableHeaderTradeAgreement", setter="setApplicableHeaderTradeAgreement")
     */
    private $headerTradeAgreementType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\HeaderTradeDeliveryType
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\HeaderTradeDeliveryType")
     * @JMS\Expose
     * @JMS\SerializedName("ApplicableHeaderTradeDelivery")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getApplicableHeaderTradeDelivery", setter="setApplicableHeaderTradeDelivery")
     */
    private $headerTradeDeliveryType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\HeaderTradeSettlementType
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\HeaderTradeSettlementType")
     * @JMS\Expose
     * @JMS\SerializedName("ApplicableHeaderTradeSettlement")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getApplicableHeaderTradeSettlement", setter="setApplicableHeaderTradeSettlement")
     */
    private $headerTradeSettlementType;

    /**
     * @return array<\horstoeko\invoicesuite\models\zugferd\ram\SupplyChainTradeLineItemType>|null
     */
    public function getIncludedSupplyChainTradeLineItem(): ?array
    {
        return $this->includedSupplyChainTradeLineItem;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zugferd\ram\SupplyChainTradeLineItemType>
     * @return self
     */
    public function setIncludedSupplyChainTradeLineItem(array $includedSupplyChainTradeLineItem): self
    {
        $this->includedSupplyChainTradeLineItem = $includedSupplyChainTradeLineItem;

        return $this;
    }

    /**
     * @return self
     */
    public function clearIncludedSupplyChainTradeLineItem(): self
    {
        $this->includedSupplyChainTradeLineItem = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\SupplyChainTradeLineItemType $supplyChainTradeLineItemType
     * @return self
     */
    public function addToIncludedSupplyChainTradeLineItem(
        \horstoeko\invoicesuite\models\zugferd\ram\SupplyChainTradeLineItemType $supplyChainTradeLineItemType,
    ): self {
        $this->includedSupplyChainTradeLineItem[] = $supplyChainTradeLineItemType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\SupplyChainTradeLineItemType
     */
    public function addToIncludedSupplyChainTradeLineItemWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\ram\SupplyChainTradeLineItemType {
        $this->addToincludedSupplyChainTradeLineItem($supplyChainTradeLineItemType = new SupplyChainTradeLineItemType());

        return $supplyChainTradeLineItemType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\HeaderTradeAgreementType|null
     */
    public function getApplicableHeaderTradeAgreement(
    ): ?\horstoeko\invoicesuite\models\zugferd\ram\HeaderTradeAgreementType {
        return $this->headerTradeAgreementType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\HeaderTradeAgreementType
     */
    public function getApplicableHeaderTradeAgreementWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\ram\HeaderTradeAgreementType {
        $this->headerTradeAgreementType = is_null($this->headerTradeAgreementType) ? new HeaderTradeAgreementType() : $this->headerTradeAgreementType;

        return $this->headerTradeAgreementType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\HeaderTradeAgreementType
     * @return self
     */
    public function setApplicableHeaderTradeAgreement(
        \horstoeko\invoicesuite\models\zugferd\ram\HeaderTradeAgreementType $headerTradeAgreementType,
    ): self {
        $this->headerTradeAgreementType = $headerTradeAgreementType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\HeaderTradeDeliveryType|null
     */
    public function getApplicableHeaderTradeDelivery(
    ): ?\horstoeko\invoicesuite\models\zugferd\ram\HeaderTradeDeliveryType {
        return $this->headerTradeDeliveryType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\HeaderTradeDeliveryType
     */
    public function getApplicableHeaderTradeDeliveryWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\ram\HeaderTradeDeliveryType {
        $this->headerTradeDeliveryType = is_null($this->headerTradeDeliveryType) ? new HeaderTradeDeliveryType() : $this->headerTradeDeliveryType;

        return $this->headerTradeDeliveryType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\HeaderTradeDeliveryType
     * @return self
     */
    public function setApplicableHeaderTradeDelivery(
        \horstoeko\invoicesuite\models\zugferd\ram\HeaderTradeDeliveryType $headerTradeDeliveryType,
    ): self {
        $this->headerTradeDeliveryType = $headerTradeDeliveryType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\HeaderTradeSettlementType|null
     */
    public function getApplicableHeaderTradeSettlement(
    ): ?\horstoeko\invoicesuite\models\zugferd\ram\HeaderTradeSettlementType {
        return $this->headerTradeSettlementType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\HeaderTradeSettlementType
     */
    public function getApplicableHeaderTradeSettlementWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\ram\HeaderTradeSettlementType {
        $this->headerTradeSettlementType = is_null($this->headerTradeSettlementType) ? new HeaderTradeSettlementType() : $this->headerTradeSettlementType;

        return $this->headerTradeSettlementType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\HeaderTradeSettlementType
     * @return self
     */
    public function setApplicableHeaderTradeSettlement(
        \horstoeko\invoicesuite\models\zugferd\ram\HeaderTradeSettlementType $headerTradeSettlementType,
    ): self {
        $this->headerTradeSettlementType = $headerTradeSettlementType;

        return $this;
    }
}
