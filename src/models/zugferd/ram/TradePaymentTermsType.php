<?php

namespace horstoeko\invoicesuite\models\zugferd\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zugferd\udt\AmountType;
use horstoeko\invoicesuite\models\zugferd\udt\DateTimeType;
use horstoeko\invoicesuite\models\zugferd\udt\IDType;
use horstoeko\invoicesuite\models\zugferd\udt\TextType;

class TradePaymentTermsType
{
    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $textType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\DateTimeType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\DateTimeType")
     * @JMS\Expose
     * @JMS\SerializedName("DueDateDateTime")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getDueDateDateTime", setter="setDueDateDateTime")
     */
    private $dateTimeType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\IDType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("DirectDebitMandateID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getDirectDebitMandateID", setter="setDirectDebitMandateID")
     */
    private $idType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\AmountType")
     * @JMS\Expose
     * @JMS\SerializedName("PartialPaymentAmount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getPartialPaymentAmount", setter="setPartialPaymentAmount")
     */
    private $amountType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\TradePaymentPenaltyTermsType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\TradePaymentPenaltyTermsType")
     * @JMS\Expose
     * @JMS\SerializedName("ApplicableTradePaymentPenaltyTerms")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getApplicableTradePaymentPenaltyTerms", setter="setApplicableTradePaymentPenaltyTerms")
     */
    private $tradePaymentPenaltyTermsType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\TradePaymentDiscountTermsType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\TradePaymentDiscountTermsType")
     * @JMS\Expose
     * @JMS\SerializedName("ApplicableTradePaymentDiscountTerms")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getApplicableTradePaymentDiscountTerms", setter="setApplicableTradePaymentDiscountTerms")
     */
    private $tradePaymentDiscountTermsType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\TradePartyType")
     * @JMS\Expose
     * @JMS\SerializedName("PayeeTradeParty")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getPayeeTradeParty", setter="setPayeeTradeParty")
     */
    private $tradePartyType;

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType|null
     */
    public function getDescription(): ?\horstoeko\invoicesuite\models\zugferd\udt\TextType
    {
        return $this->textType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType
     */
    public function getDescriptionWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\TextType
    {
        $this->textType = is_null($this->textType) ? new TextType() : $this->textType;

        return $this->textType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @return self
     */
    public function setDescription(\horstoeko\invoicesuite\models\zugferd\udt\TextType $textType): self
    {
        $this->textType = $textType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\DateTimeType|null
     */
    public function getDueDateDateTime(): ?\horstoeko\invoicesuite\models\zugferd\udt\DateTimeType
    {
        return $this->dateTimeType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\DateTimeType
     */
    public function getDueDateDateTimeWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\DateTimeType
    {
        $this->dateTimeType = is_null($this->dateTimeType) ? new DateTimeType() : $this->dateTimeType;

        return $this->dateTimeType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\DateTimeType
     * @return self
     */
    public function setDueDateDateTime(\horstoeko\invoicesuite\models\zugferd\udt\DateTimeType $dateTimeType): self
    {
        $this->dateTimeType = $dateTimeType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IDType|null
     */
    public function getDirectDebitMandateID(): ?\horstoeko\invoicesuite\models\zugferd\udt\IDType
    {
        return $this->idType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IDType
     */
    public function getDirectDebitMandateIDWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\IDType
    {
        $this->idType = is_null($this->idType) ? new IDType() : $this->idType;

        return $this->idType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\IDType
     * @return self
     */
    public function setDirectDebitMandateID(
        \horstoeko\invoicesuite\models\zugferd\udt\IDType $idType,
    ): self {
        $this->idType = $idType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType|null
     */
    public function getPartialPaymentAmount(): ?\horstoeko\invoicesuite\models\zugferd\udt\AmountType
    {
        return $this->amountType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     */
    public function getPartialPaymentAmountWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\AmountType
    {
        $this->amountType = is_null($this->amountType) ? new AmountType() : $this->amountType;

        return $this->amountType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     * @return self
     */
    public function setPartialPaymentAmount(
        \horstoeko\invoicesuite\models\zugferd\udt\AmountType $amountType,
    ): self {
        $this->amountType = $amountType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradePaymentPenaltyTermsType|null
     */
    public function getApplicableTradePaymentPenaltyTerms(
    ): ?\horstoeko\invoicesuite\models\zugferd\ram\TradePaymentPenaltyTermsType {
        return $this->tradePaymentPenaltyTermsType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradePaymentPenaltyTermsType
     */
    public function getApplicableTradePaymentPenaltyTermsWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\ram\TradePaymentPenaltyTermsType {
        $this->tradePaymentPenaltyTermsType = is_null($this->tradePaymentPenaltyTermsType) ? new TradePaymentPenaltyTermsType() : $this->tradePaymentPenaltyTermsType;

        return $this->tradePaymentPenaltyTermsType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradePaymentPenaltyTermsType
     * @return self
     */
    public function setApplicableTradePaymentPenaltyTerms(
        \horstoeko\invoicesuite\models\zugferd\ram\TradePaymentPenaltyTermsType $tradePaymentPenaltyTermsType,
    ): self {
        $this->tradePaymentPenaltyTermsType = $tradePaymentPenaltyTermsType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradePaymentDiscountTermsType|null
     */
    public function getApplicableTradePaymentDiscountTerms(
    ): ?\horstoeko\invoicesuite\models\zugferd\ram\TradePaymentDiscountTermsType {
        return $this->tradePaymentDiscountTermsType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradePaymentDiscountTermsType
     */
    public function getApplicableTradePaymentDiscountTermsWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\ram\TradePaymentDiscountTermsType {
        $this->tradePaymentDiscountTermsType = is_null($this->tradePaymentDiscountTermsType) ? new TradePaymentDiscountTermsType() : $this->tradePaymentDiscountTermsType;

        return $this->tradePaymentDiscountTermsType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradePaymentDiscountTermsType
     * @return self
     */
    public function setApplicableTradePaymentDiscountTerms(
        \horstoeko\invoicesuite\models\zugferd\ram\TradePaymentDiscountTermsType $tradePaymentDiscountTermsType,
    ): self {
        $this->tradePaymentDiscountTermsType = $tradePaymentDiscountTermsType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType|null
     */
    public function getPayeeTradeParty(): ?\horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
    {
        return $this->tradePartyType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
     */
    public function getPayeeTradePartyWithCreate(): \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
    {
        $this->tradePartyType = is_null($this->tradePartyType) ? new TradePartyType() : $this->tradePartyType;

        return $this->tradePartyType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
     * @return self
     */
    public function setPayeeTradeParty(\horstoeko\invoicesuite\models\zugferd\ram\TradePartyType $tradePartyType): self
    {
        $this->tradePartyType = $tradePartyType;

        return $this;
    }
}
