<?php

namespace horstoeko\invoicesuite\models\zffx\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zffx\qdt\PaymentMeansCodeType;
use horstoeko\invoicesuite\models\zffx\udt\TextType;

class TradeSettlementPaymentMeansType
{
    /**
     * @var \horstoeko\invoicesuite\models\zffx\qdt\PaymentMeansCodeType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\qdt\PaymentMeansCodeType")
     * @JMS\Expose
     * @JMS\SerializedName("TypeCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getTypeCode", setter="setTypeCode")
     */
    private $paymentMeansCodeType;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\TextType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("Information")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getInformation", setter="setInformation")
     */
    private $textType;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\TradeSettlementFinancialCardType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\TradeSettlementFinancialCardType")
     * @JMS\Expose
     * @JMS\SerializedName("ApplicableTradeSettlementFinancialCard")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getApplicableTradeSettlementFinancialCard", setter="setApplicableTradeSettlementFinancialCard")
     */
    private $tradeSettlementFinancialCardType;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\DebtorFinancialAccountType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\DebtorFinancialAccountType")
     * @JMS\Expose
     * @JMS\SerializedName("PayerPartyDebtorFinancialAccount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getPayerPartyDebtorFinancialAccount", setter="setPayerPartyDebtorFinancialAccount")
     */
    private $debtorFinancialAccountType;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\CreditorFinancialAccountType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\CreditorFinancialAccountType")
     * @JMS\Expose
     * @JMS\SerializedName("PayeePartyCreditorFinancialAccount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getPayeePartyCreditorFinancialAccount", setter="setPayeePartyCreditorFinancialAccount")
     */
    private $creditorFinancialAccountType;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\CreditorFinancialInstitutionType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\CreditorFinancialInstitutionType")
     * @JMS\Expose
     * @JMS\SerializedName("PayeeSpecifiedCreditorFinancialInstitution")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getPayeeSpecifiedCreditorFinancialInstitution", setter="setPayeeSpecifiedCreditorFinancialInstitution")
     */
    private $creditorFinancialInstitutionType;

    /**
     * @return \horstoeko\invoicesuite\models\zffx\qdt\PaymentMeansCodeType|null
     */
    public function getTypeCode(): ?PaymentMeansCodeType
    {
        return $this->paymentMeansCodeType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\qdt\PaymentMeansCodeType
     */
    public function getTypeCodeWithCreate(): PaymentMeansCodeType
    {
        $this->paymentMeansCodeType = is_null($this->paymentMeansCodeType) ? new PaymentMeansCodeType() : $this->paymentMeansCodeType;

        return $this->paymentMeansCodeType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\qdt\PaymentMeansCodeType $paymentMeansCodeType
     * @return self
     */
    public function setTypeCode(PaymentMeansCodeType $paymentMeansCodeType): self
    {
        $this->paymentMeansCodeType = $paymentMeansCodeType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\TextType|null
     */
    public function getInformation(): ?TextType
    {
        return $this->textType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\TextType
     */
    public function getInformationWithCreate(): TextType
    {
        $this->textType = is_null($this->textType) ? new TextType() : $this->textType;

        return $this->textType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\TextType $textType
     * @return self
     */
    public function setInformation(TextType $textType): self
    {
        $this->textType = $textType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradeSettlementFinancialCardType|null
     */
    public function getApplicableTradeSettlementFinancialCard(): ?TradeSettlementFinancialCardType
    {
        return $this->tradeSettlementFinancialCardType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\TradeSettlementFinancialCardType
     */
    public function getApplicableTradeSettlementFinancialCardWithCreate(): TradeSettlementFinancialCardType
    {
        $this->tradeSettlementFinancialCardType = is_null($this->tradeSettlementFinancialCardType) ? new TradeSettlementFinancialCardType() : $this->tradeSettlementFinancialCardType;

        return $this->tradeSettlementFinancialCardType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\TradeSettlementFinancialCardType $tradeSettlementFinancialCardType
     * @return self
     */
    public function setApplicableTradeSettlementFinancialCard(
        TradeSettlementFinancialCardType $tradeSettlementFinancialCardType,
    ): self {
        $this->tradeSettlementFinancialCardType = $tradeSettlementFinancialCardType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\DebtorFinancialAccountType|null
     */
    public function getPayerPartyDebtorFinancialAccount(): ?DebtorFinancialAccountType
    {
        return $this->debtorFinancialAccountType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\DebtorFinancialAccountType
     */
    public function getPayerPartyDebtorFinancialAccountWithCreate(): DebtorFinancialAccountType
    {
        $this->debtorFinancialAccountType = is_null($this->debtorFinancialAccountType) ? new DebtorFinancialAccountType() : $this->debtorFinancialAccountType;

        return $this->debtorFinancialAccountType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\DebtorFinancialAccountType $debtorFinancialAccountType
     * @return self
     */
    public function setPayerPartyDebtorFinancialAccount(
        DebtorFinancialAccountType $debtorFinancialAccountType,
    ): self {
        $this->debtorFinancialAccountType = $debtorFinancialAccountType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\CreditorFinancialAccountType|null
     */
    public function getPayeePartyCreditorFinancialAccount(): ?CreditorFinancialAccountType
    {
        return $this->creditorFinancialAccountType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\CreditorFinancialAccountType
     */
    public function getPayeePartyCreditorFinancialAccountWithCreate(): CreditorFinancialAccountType
    {
        $this->creditorFinancialAccountType = is_null($this->creditorFinancialAccountType) ? new CreditorFinancialAccountType() : $this->creditorFinancialAccountType;

        return $this->creditorFinancialAccountType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\CreditorFinancialAccountType $creditorFinancialAccountType
     * @return self
     */
    public function setPayeePartyCreditorFinancialAccount(
        CreditorFinancialAccountType $creditorFinancialAccountType,
    ): self {
        $this->creditorFinancialAccountType = $creditorFinancialAccountType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\CreditorFinancialInstitutionType|null
     */
    public function getPayeeSpecifiedCreditorFinancialInstitution(): ?CreditorFinancialInstitutionType
    {
        return $this->creditorFinancialInstitutionType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\CreditorFinancialInstitutionType
     */
    public function getPayeeSpecifiedCreditorFinancialInstitutionWithCreate(): CreditorFinancialInstitutionType
    {
        $this->creditorFinancialInstitutionType = is_null($this->creditorFinancialInstitutionType) ? new CreditorFinancialInstitutionType() : $this->creditorFinancialInstitutionType;

        return $this->creditorFinancialInstitutionType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\CreditorFinancialInstitutionType $creditorFinancialInstitutionType
     * @return self
     */
    public function setPayeeSpecifiedCreditorFinancialInstitution(
        CreditorFinancialInstitutionType $creditorFinancialInstitutionType,
    ): self {
        $this->creditorFinancialInstitutionType = $creditorFinancialInstitutionType;

        return $this;
    }
}
