<?php

namespace horstoeko\invoicesuite\models\zffx\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;

class SupplyChainTradeTransactionType
{
    use HandlesObjectFlags;

    /**
     * @var array<\horstoeko\invoicesuite\models\zffx\ram\SupplyChainTradeLineItemType>
     * @JMS\Groups({"zffxbasic", "zffxen16931", "zffxextended"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\zffx\ram\SupplyChainTradeLineItemType>")
     * @JMS\Expose
     * @JMS\SerializedName("IncludedSupplyChainTradeLineItem")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\XmlList(inline=true, entry="IncludedSupplyChainTradeLineItem", namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     * @JMS\Accessor(getter="getIncludedSupplyChainTradeLineItem", setter="setIncludedSupplyChainTradeLineItem")
     */
    private $includedSupplyChainTradeLineItem;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\HeaderTradeAgreementType
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\HeaderTradeAgreementType")
     * @JMS\Expose
     * @JMS\SerializedName("ApplicableHeaderTradeAgreement")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getApplicableHeaderTradeAgreement", setter="setApplicableHeaderTradeAgreement")
     */
    private $headerTradeAgreementType;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\HeaderTradeDeliveryType
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\HeaderTradeDeliveryType")
     * @JMS\Expose
     * @JMS\SerializedName("ApplicableHeaderTradeDelivery")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getApplicableHeaderTradeDelivery", setter="setApplicableHeaderTradeDelivery")
     */
    private $headerTradeDeliveryType;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\HeaderTradeSettlementType
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\HeaderTradeSettlementType")
     * @JMS\Expose
     * @JMS\SerializedName("ApplicableHeaderTradeSettlement")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getApplicableHeaderTradeSettlement", setter="setApplicableHeaderTradeSettlement")
     */
    private $headerTradeSettlementType;

    /**
     * @return array<\horstoeko\invoicesuite\models\zffx\ram\SupplyChainTradeLineItemType>|null
     */
    public function getIncludedSupplyChainTradeLineItem(): ?array
    {
        return $this->includedSupplyChainTradeLineItem;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\zffx\ram\SupplyChainTradeLineItemType> $includedSupplyChainTradeLineItem
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
     * @param \horstoeko\invoicesuite\models\zffx\ram\SupplyChainTradeLineItemType $supplyChainTradeLineItemType
     * @return self
     */
    public function addToIncludedSupplyChainTradeLineItem(
        SupplyChainTradeLineItemType $supplyChainTradeLineItemType,
    ): self {
        $this->includedSupplyChainTradeLineItem[] = $supplyChainTradeLineItemType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\SupplyChainTradeLineItemType
     */
    public function addToIncludedSupplyChainTradeLineItemWithCreate(): SupplyChainTradeLineItemType
    {
        $this->addToincludedSupplyChainTradeLineItem($supplyChainTradeLineItemType = new SupplyChainTradeLineItemType());

        return $supplyChainTradeLineItemType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\SupplyChainTradeLineItemType $supplyChainTradeLineItemType
     * @return self
     */
    public function addOnceToIncludedSupplyChainTradeLineItem(
        SupplyChainTradeLineItemType $supplyChainTradeLineItemType,
    ): self {
        if (!is_array($this->includedSupplyChainTradeLineItem)) {
            $this->includedSupplyChainTradeLineItem = [];
        }

        $this->includedSupplyChainTradeLineItem[0] = $supplyChainTradeLineItemType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\SupplyChainTradeLineItemType
     */
    public function addOnceToIncludedSupplyChainTradeLineItemWithCreate(): SupplyChainTradeLineItemType
    {
        if (!is_array($this->includedSupplyChainTradeLineItem)) {
            $this->includedSupplyChainTradeLineItem = [];
        }

        if ($this->includedSupplyChainTradeLineItem === []) {
            $this->addOnceToincludedSupplyChainTradeLineItem(new SupplyChainTradeLineItemType());
        }

        return $this->includedSupplyChainTradeLineItem[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\SupplyChainTradeLineItemType|null
     */
    public function getLatestIncludedSupplyChainTradeLineItem(): ?SupplyChainTradeLineItemType
    {
        $supplyChainTradeLineItems = $this->getIncludedSupplyChainTradeLineItem() ?? [];
        $supplyChainTradeLineItem = end($supplyChainTradeLineItems);

        if ($supplyChainTradeLineItem === false) {
            return null;
        }

        return $supplyChainTradeLineItem;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\SupplyChainTradeLineItemType|null
     */
    public function getLatestIncludedSupplyChainTradeLineItemWithCreate(): ?SupplyChainTradeLineItemType
    {
        if (is_null($supplyChainTradeLineItem = $this->getLatestIncludedSupplyChainTradeLineItem())) {
            $supplyChainTradeLineItem = $this->addToIncludedSupplyChainTradeLineItemWithCreate();
        }

        return $supplyChainTradeLineItem;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\HeaderTradeAgreementType|null
     */
    public function getApplicableHeaderTradeAgreement(): ?HeaderTradeAgreementType
    {
        return $this->headerTradeAgreementType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\HeaderTradeAgreementType
     */
    public function getApplicableHeaderTradeAgreementWithCreate(): HeaderTradeAgreementType
    {
        $this->headerTradeAgreementType = is_null($this->headerTradeAgreementType) ? new HeaderTradeAgreementType() : $this->headerTradeAgreementType;

        return $this->headerTradeAgreementType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\HeaderTradeAgreementType $headerTradeAgreementType
     * @return self
     */
    public function setApplicableHeaderTradeAgreement(HeaderTradeAgreementType $headerTradeAgreementType): self
    {
        $this->headerTradeAgreementType = $headerTradeAgreementType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\HeaderTradeDeliveryType|null
     */
    public function getApplicableHeaderTradeDelivery(): ?HeaderTradeDeliveryType
    {
        return $this->headerTradeDeliveryType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\HeaderTradeDeliveryType
     */
    public function getApplicableHeaderTradeDeliveryWithCreate(): HeaderTradeDeliveryType
    {
        $this->headerTradeDeliveryType = is_null($this->headerTradeDeliveryType) ? new HeaderTradeDeliveryType() : $this->headerTradeDeliveryType;

        return $this->headerTradeDeliveryType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\HeaderTradeDeliveryType $headerTradeDeliveryType
     * @return self
     */
    public function setApplicableHeaderTradeDelivery(HeaderTradeDeliveryType $headerTradeDeliveryType): self
    {
        $this->headerTradeDeliveryType = $headerTradeDeliveryType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\HeaderTradeSettlementType|null
     */
    public function getApplicableHeaderTradeSettlement(): ?HeaderTradeSettlementType
    {
        return $this->headerTradeSettlementType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\HeaderTradeSettlementType
     */
    public function getApplicableHeaderTradeSettlementWithCreate(): HeaderTradeSettlementType
    {
        $this->headerTradeSettlementType = is_null($this->headerTradeSettlementType) ? new HeaderTradeSettlementType() : $this->headerTradeSettlementType;

        return $this->headerTradeSettlementType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\HeaderTradeSettlementType $headerTradeSettlementType
     * @return self
     */
    public function setApplicableHeaderTradeSettlement(
        HeaderTradeSettlementType $headerTradeSettlementType,
    ): self {
        $this->headerTradeSettlementType = $headerTradeSettlementType;

        return $this;
    }
}
