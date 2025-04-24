<?php

namespace horstoeko\invoicesuite\models\zugferd\ram;

use JMS\Serializer\Annotation as JMS;

class SupplyChainTradeTransactionType
{
    /**
     * @var array<\horstoeko\invoicesuite\models\zugferd\ram\SupplyChainTradeLineItemType>
     * @JMS\Groups({"zffxbasic", "zffxen16931", "zffxextended"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zugferd\ram\SupplyChainTradeLineItemType>")
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
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\ram\HeaderTradeAgreementType")
     * @JMS\Expose
     * @JMS\SerializedName("ApplicableHeaderTradeAgreement")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getApplicableHeaderTradeAgreement", setter="setApplicableHeaderTradeAgreement")
     */
    private $applicableHeaderTradeAgreement;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\HeaderTradeDeliveryType
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\ram\HeaderTradeDeliveryType")
     * @JMS\Expose
     * @JMS\SerializedName("ApplicableHeaderTradeDelivery")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getApplicableHeaderTradeDelivery", setter="setApplicableHeaderTradeDelivery")
     */
    private $applicableHeaderTradeDelivery;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\HeaderTradeSettlementType
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\ram\HeaderTradeSettlementType")
     * @JMS\Expose
     * @JMS\SerializedName("ApplicableHeaderTradeSettlement")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getApplicableHeaderTradeSettlement", setter="setApplicableHeaderTradeSettlement")
     */
    private $applicableHeaderTradeSettlement;

    /**
     * @return array<\horstoeko\invoicesuite\models\zugferd\ram\SupplyChainTradeLineItemType>|null
     */
    public function getIncludedSupplyChainTradeLineItem(): ?array
    {
        return $this->includedSupplyChainTradeLineItem;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zugferd\ram\SupplyChainTradeLineItemType> $includedSupplyChainTradeLineItem
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
     * @param \horstoeko\invoicesuite\models\zugferd\ram\SupplyChainTradeLineItemType $includedSupplyChainTradeLineItem
     * @return self
     */
    public function addToIncludedSupplyChainTradeLineItem(
        SupplyChainTradeLineItemType $includedSupplyChainTradeLineItem,
    ): self {
        $this->includedSupplyChainTradeLineItem[] = $includedSupplyChainTradeLineItem;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\SupplyChainTradeLineItemType
     */
    public function addToIncludedSupplyChainTradeLineItemWithCreate(): SupplyChainTradeLineItemType
    {
        $this->addToincludedSupplyChainTradeLineItem($includedSupplyChainTradeLineItem = new SupplyChainTradeLineItemType());

        return $includedSupplyChainTradeLineItem;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\HeaderTradeAgreementType|null
     */
    public function getApplicableHeaderTradeAgreement(): ?HeaderTradeAgreementType
    {
        return $this->applicableHeaderTradeAgreement;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\HeaderTradeAgreementType
     */
    public function getApplicableHeaderTradeAgreementWithCreate(): HeaderTradeAgreementType
    {
        $this->applicableHeaderTradeAgreement = is_null($this->applicableHeaderTradeAgreement) ? new HeaderTradeAgreementType() : $this->applicableHeaderTradeAgreement;

        return $this->applicableHeaderTradeAgreement;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\HeaderTradeAgreementType $applicableHeaderTradeAgreement
     * @return self
     */
    public function setApplicableHeaderTradeAgreement(HeaderTradeAgreementType $applicableHeaderTradeAgreement): self
    {
        $this->applicableHeaderTradeAgreement = $applicableHeaderTradeAgreement;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\HeaderTradeDeliveryType|null
     */
    public function getApplicableHeaderTradeDelivery(): ?HeaderTradeDeliveryType
    {
        return $this->applicableHeaderTradeDelivery;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\HeaderTradeDeliveryType
     */
    public function getApplicableHeaderTradeDeliveryWithCreate(): HeaderTradeDeliveryType
    {
        $this->applicableHeaderTradeDelivery = is_null($this->applicableHeaderTradeDelivery) ? new HeaderTradeDeliveryType() : $this->applicableHeaderTradeDelivery;

        return $this->applicableHeaderTradeDelivery;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\HeaderTradeDeliveryType $applicableHeaderTradeDelivery
     * @return self
     */
    public function setApplicableHeaderTradeDelivery(HeaderTradeDeliveryType $applicableHeaderTradeDelivery): self
    {
        $this->applicableHeaderTradeDelivery = $applicableHeaderTradeDelivery;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\HeaderTradeSettlementType|null
     */
    public function getApplicableHeaderTradeSettlement(): ?HeaderTradeSettlementType
    {
        return $this->applicableHeaderTradeSettlement;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\HeaderTradeSettlementType
     */
    public function getApplicableHeaderTradeSettlementWithCreate(): HeaderTradeSettlementType
    {
        $this->applicableHeaderTradeSettlement = is_null($this->applicableHeaderTradeSettlement) ? new HeaderTradeSettlementType() : $this->applicableHeaderTradeSettlement;

        return $this->applicableHeaderTradeSettlement;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\HeaderTradeSettlementType $applicableHeaderTradeSettlement
     * @return self
     */
    public function setApplicableHeaderTradeSettlement(
        HeaderTradeSettlementType $applicableHeaderTradeSettlement,
    ): self {
        $this->applicableHeaderTradeSettlement = $applicableHeaderTradeSettlement;

        return $this;
    }
}
