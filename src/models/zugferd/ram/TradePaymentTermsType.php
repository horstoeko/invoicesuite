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
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $description;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\DateTimeType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\DateTimeType")
     * @JMS\Expose
     * @JMS\SerializedName("DueDateDateTime")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getDueDateDateTime", setter="setDueDateDateTime")
     */
    private $dueDateDateTime;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\IDType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("DirectDebitMandateID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getDirectDebitMandateID", setter="setDirectDebitMandateID")
     */
    private $directDebitMandateID;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\AmountType")
     * @JMS\Expose
     * @JMS\SerializedName("PartialPaymentAmount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getPartialPaymentAmount", setter="setPartialPaymentAmount")
     */
    private $partialPaymentAmount;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\TradePaymentPenaltyTermsType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\ram\TradePaymentPenaltyTermsType")
     * @JMS\Expose
     * @JMS\SerializedName("ApplicableTradePaymentPenaltyTerms")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getApplicableTradePaymentPenaltyTerms", setter="setApplicableTradePaymentPenaltyTerms")
     */
    private $applicableTradePaymentPenaltyTerms;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\TradePaymentDiscountTermsType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\ram\TradePaymentDiscountTermsType")
     * @JMS\Expose
     * @JMS\SerializedName("ApplicableTradePaymentDiscountTerms")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getApplicableTradePaymentDiscountTerms", setter="setApplicableTradePaymentDiscountTerms")
     */
    private $applicableTradePaymentDiscountTerms;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\ram\TradePartyType")
     * @JMS\Expose
     * @JMS\SerializedName("PayeeTradeParty")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getPayeeTradeParty", setter="setPayeeTradeParty")
     */
    private $payeeTradeParty;

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType|null
     */
    public function getDescription(): ?TextType
    {
        return $this->description;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType
     */
    public function getDescriptionWithCreate(): TextType
    {
        $this->description = is_null($this->description) ? new TextType() : $this->description;

        return $this->description;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\TextType $description
     * @return self
     */
    public function setDescription(TextType $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\DateTimeType|null
     */
    public function getDueDateDateTime(): ?DateTimeType
    {
        return $this->dueDateDateTime;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\DateTimeType
     */
    public function getDueDateDateTimeWithCreate(): DateTimeType
    {
        $this->dueDateDateTime = is_null($this->dueDateDateTime) ? new DateTimeType() : $this->dueDateDateTime;

        return $this->dueDateDateTime;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\DateTimeType $dueDateDateTime
     * @return self
     */
    public function setDueDateDateTime(DateTimeType $dueDateDateTime): self
    {
        $this->dueDateDateTime = $dueDateDateTime;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IDType|null
     */
    public function getDirectDebitMandateID(): ?IDType
    {
        return $this->directDebitMandateID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IDType
     */
    public function getDirectDebitMandateIDWithCreate(): IDType
    {
        $this->directDebitMandateID = is_null($this->directDebitMandateID) ? new IDType() : $this->directDebitMandateID;

        return $this->directDebitMandateID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\IDType $directDebitMandateID
     * @return self
     */
    public function setDirectDebitMandateID(IDType $directDebitMandateID): self
    {
        $this->directDebitMandateID = $directDebitMandateID;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType|null
     */
    public function getPartialPaymentAmount(): ?AmountType
    {
        return $this->partialPaymentAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\AmountType
     */
    public function getPartialPaymentAmountWithCreate(): AmountType
    {
        $this->partialPaymentAmount = is_null($this->partialPaymentAmount) ? new AmountType() : $this->partialPaymentAmount;

        return $this->partialPaymentAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\AmountType $partialPaymentAmount
     * @return self
     */
    public function setPartialPaymentAmount(AmountType $partialPaymentAmount): self
    {
        $this->partialPaymentAmount = $partialPaymentAmount;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradePaymentPenaltyTermsType|null
     */
    public function getApplicableTradePaymentPenaltyTerms(): ?TradePaymentPenaltyTermsType
    {
        return $this->applicableTradePaymentPenaltyTerms;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradePaymentPenaltyTermsType
     */
    public function getApplicableTradePaymentPenaltyTermsWithCreate(): TradePaymentPenaltyTermsType
    {
        $this->applicableTradePaymentPenaltyTerms = is_null($this->applicableTradePaymentPenaltyTerms) ? new TradePaymentPenaltyTermsType() : $this->applicableTradePaymentPenaltyTerms;

        return $this->applicableTradePaymentPenaltyTerms;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradePaymentPenaltyTermsType $applicableTradePaymentPenaltyTerms
     * @return self
     */
    public function setApplicableTradePaymentPenaltyTerms(
        TradePaymentPenaltyTermsType $applicableTradePaymentPenaltyTerms,
    ): self {
        $this->applicableTradePaymentPenaltyTerms = $applicableTradePaymentPenaltyTerms;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradePaymentDiscountTermsType|null
     */
    public function getApplicableTradePaymentDiscountTerms(): ?TradePaymentDiscountTermsType
    {
        return $this->applicableTradePaymentDiscountTerms;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradePaymentDiscountTermsType
     */
    public function getApplicableTradePaymentDiscountTermsWithCreate(): TradePaymentDiscountTermsType
    {
        $this->applicableTradePaymentDiscountTerms = is_null($this->applicableTradePaymentDiscountTerms) ? new TradePaymentDiscountTermsType() : $this->applicableTradePaymentDiscountTerms;

        return $this->applicableTradePaymentDiscountTerms;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradePaymentDiscountTermsType $applicableTradePaymentDiscountTerms
     * @return self
     */
    public function setApplicableTradePaymentDiscountTerms(
        TradePaymentDiscountTermsType $applicableTradePaymentDiscountTerms,
    ): self {
        $this->applicableTradePaymentDiscountTerms = $applicableTradePaymentDiscountTerms;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType|null
     */
    public function getPayeeTradeParty(): ?TradePartyType
    {
        return $this->payeeTradeParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType
     */
    public function getPayeeTradePartyWithCreate(): TradePartyType
    {
        $this->payeeTradeParty = is_null($this->payeeTradeParty) ? new TradePartyType() : $this->payeeTradeParty;

        return $this->payeeTradeParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradePartyType $payeeTradeParty
     * @return self
     */
    public function setPayeeTradeParty(TradePartyType $payeeTradeParty): self
    {
        $this->payeeTradeParty = $payeeTradeParty;

        return $this;
    }
}
