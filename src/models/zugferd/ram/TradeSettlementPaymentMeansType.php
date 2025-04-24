<?php

namespace horstoeko\invoicesuite\models\zugferd\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zugferd\qdt\PaymentMeansCodeType;
use horstoeko\invoicesuite\models\zugferd\udt\TextType;

class TradeSettlementPaymentMeansType
{
    /**
     * @var \horstoeko\invoicesuite\models\zugferd\qdt\PaymentMeansCodeType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\qdt\PaymentMeansCodeType")
     * @JMS\Expose
     * @JMS\SerializedName("TypeCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getTypeCode", setter="setTypeCode")
     */
    private $paymentMeansCodeType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("Information")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getInformation", setter="setInformation")
     */
    private $textType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\TradeSettlementFinancialCardType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\TradeSettlementFinancialCardType")
     * @JMS\Expose
     * @JMS\SerializedName("ApplicableTradeSettlementFinancialCard")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getApplicableTradeSettlementFinancialCard", setter="setApplicableTradeSettlementFinancialCard")
     */
    private $tradeSettlementFinancialCardType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\DebtorFinancialAccountType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\DebtorFinancialAccountType")
     * @JMS\Expose
     * @JMS\SerializedName("PayerPartyDebtorFinancialAccount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getPayerPartyDebtorFinancialAccount", setter="setPayerPartyDebtorFinancialAccount")
     */
    private $debtorFinancialAccountType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\CreditorFinancialAccountType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\CreditorFinancialAccountType")
     * @JMS\Expose
     * @JMS\SerializedName("PayeePartyCreditorFinancialAccount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getPayeePartyCreditorFinancialAccount", setter="setPayeePartyCreditorFinancialAccount")
     */
    private $creditorFinancialAccountType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\CreditorFinancialInstitutionType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\CreditorFinancialInstitutionType")
     * @JMS\Expose
     * @JMS\SerializedName("PayeeSpecifiedCreditorFinancialInstitution")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getPayeeSpecifiedCreditorFinancialInstitution", setter="setPayeeSpecifiedCreditorFinancialInstitution")
     */
    private $creditorFinancialInstitutionType;

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\PaymentMeansCodeType|null
     */
    public function getTypeCode(): ?\horstoeko\invoicesuite\models\zugferd\qdt\PaymentMeansCodeType
    {
        return $this->paymentMeansCodeType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\PaymentMeansCodeType
     */
    public function getTypeCodeWithCreate(): \horstoeko\invoicesuite\models\zugferd\qdt\PaymentMeansCodeType
    {
        $this->paymentMeansCodeType = is_null($this->paymentMeansCodeType) ? new PaymentMeansCodeType() : $this->paymentMeansCodeType;

        return $this->paymentMeansCodeType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\qdt\PaymentMeansCodeType
     * @return self
     */
    public function setTypeCode(\horstoeko\invoicesuite\models\zugferd\qdt\PaymentMeansCodeType $paymentMeansCodeType): self
    {
        $this->paymentMeansCodeType = $paymentMeansCodeType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType|null
     */
    public function getInformation(): ?\horstoeko\invoicesuite\models\zugferd\udt\TextType
    {
        return $this->textType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType
     */
    public function getInformationWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\TextType
    {
        $this->textType = is_null($this->textType) ? new TextType() : $this->textType;

        return $this->textType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @return self
     */
    public function setInformation(\horstoeko\invoicesuite\models\zugferd\udt\TextType $textType): self
    {
        $this->textType = $textType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradeSettlementFinancialCardType|null
     */
    public function getApplicableTradeSettlementFinancialCard(
    ): ?\horstoeko\invoicesuite\models\zugferd\ram\TradeSettlementFinancialCardType {
        return $this->tradeSettlementFinancialCardType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\TradeSettlementFinancialCardType
     */
    public function getApplicableTradeSettlementFinancialCardWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\ram\TradeSettlementFinancialCardType {
        $this->tradeSettlementFinancialCardType = is_null($this->tradeSettlementFinancialCardType) ? new TradeSettlementFinancialCardType() : $this->tradeSettlementFinancialCardType;

        return $this->tradeSettlementFinancialCardType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\TradeSettlementFinancialCardType
     * @return self
     */
    public function setApplicableTradeSettlementFinancialCard(
        \horstoeko\invoicesuite\models\zugferd\ram\TradeSettlementFinancialCardType $tradeSettlementFinancialCardType,
    ): self {
        $this->tradeSettlementFinancialCardType = $tradeSettlementFinancialCardType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\DebtorFinancialAccountType|null
     */
    public function getPayerPartyDebtorFinancialAccount(
    ): ?\horstoeko\invoicesuite\models\zugferd\ram\DebtorFinancialAccountType {
        return $this->debtorFinancialAccountType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\DebtorFinancialAccountType
     */
    public function getPayerPartyDebtorFinancialAccountWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\ram\DebtorFinancialAccountType {
        $this->debtorFinancialAccountType = is_null($this->debtorFinancialAccountType) ? new DebtorFinancialAccountType() : $this->debtorFinancialAccountType;

        return $this->debtorFinancialAccountType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\DebtorFinancialAccountType
     * @return self
     */
    public function setPayerPartyDebtorFinancialAccount(
        \horstoeko\invoicesuite\models\zugferd\ram\DebtorFinancialAccountType $debtorFinancialAccountType,
    ): self {
        $this->debtorFinancialAccountType = $debtorFinancialAccountType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\CreditorFinancialAccountType|null
     */
    public function getPayeePartyCreditorFinancialAccount(
    ): ?\horstoeko\invoicesuite\models\zugferd\ram\CreditorFinancialAccountType {
        return $this->creditorFinancialAccountType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\CreditorFinancialAccountType
     */
    public function getPayeePartyCreditorFinancialAccountWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\ram\CreditorFinancialAccountType {
        $this->creditorFinancialAccountType = is_null($this->creditorFinancialAccountType) ? new CreditorFinancialAccountType() : $this->creditorFinancialAccountType;

        return $this->creditorFinancialAccountType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\CreditorFinancialAccountType
     * @return self
     */
    public function setPayeePartyCreditorFinancialAccount(
        \horstoeko\invoicesuite\models\zugferd\ram\CreditorFinancialAccountType $creditorFinancialAccountType,
    ): self {
        $this->creditorFinancialAccountType = $creditorFinancialAccountType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\CreditorFinancialInstitutionType|null
     */
    public function getPayeeSpecifiedCreditorFinancialInstitution(
    ): ?\horstoeko\invoicesuite\models\zugferd\ram\CreditorFinancialInstitutionType {
        return $this->creditorFinancialInstitutionType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\CreditorFinancialInstitutionType
     */
    public function getPayeeSpecifiedCreditorFinancialInstitutionWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\ram\CreditorFinancialInstitutionType {
        $this->creditorFinancialInstitutionType = is_null($this->creditorFinancialInstitutionType) ? new CreditorFinancialInstitutionType() : $this->creditorFinancialInstitutionType;

        return $this->creditorFinancialInstitutionType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\CreditorFinancialInstitutionType
     * @return self
     */
    public function setPayeeSpecifiedCreditorFinancialInstitution(
        \horstoeko\invoicesuite\models\zugferd\ram\CreditorFinancialInstitutionType $creditorFinancialInstitutionType,
    ): self {
        $this->creditorFinancialInstitutionType = $creditorFinancialInstitutionType;

        return $this;
    }
}
