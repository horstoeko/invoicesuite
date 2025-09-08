<?php

namespace horstoeko\invoicesuite\models\zffxcomfort\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\zffxcomfort\qdt\PaymentMeansCodeType;
use horstoeko\invoicesuite\models\zffxcomfort\udt\TextType;

class TradeSettlementPaymentMeansType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\zffxcomfort\qdt\PaymentMeansCodeType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxcomfort\qdt\PaymentMeansCodeType")
     * @JMS\Expose
     * @JMS\SerializedName("TypeCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getTypeCode", setter="setTypeCode")
     */
    private $typeCode;

    /**
     * @var \horstoeko\invoicesuite\models\zffxcomfort\udt\TextType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxcomfort\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("Information")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getInformation", setter="setInformation")
     */
    private $information;

    /**
     * @var \horstoeko\invoicesuite\models\zffxcomfort\ram\TradeSettlementFinancialCardType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxcomfort\ram\TradeSettlementFinancialCardType")
     * @JMS\Expose
     * @JMS\SerializedName("ApplicableTradeSettlementFinancialCard")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getApplicableTradeSettlementFinancialCard", setter="setApplicableTradeSettlementFinancialCard")
     */
    private $applicableTradeSettlementFinancialCard;

    /**
     * @var \horstoeko\invoicesuite\models\zffxcomfort\ram\DebtorFinancialAccountType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxcomfort\ram\DebtorFinancialAccountType")
     * @JMS\Expose
     * @JMS\SerializedName("PayerPartyDebtorFinancialAccount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getPayerPartyDebtorFinancialAccount", setter="setPayerPartyDebtorFinancialAccount")
     */
    private $payerPartyDebtorFinancialAccount;

    /**
     * @var \horstoeko\invoicesuite\models\zffxcomfort\ram\CreditorFinancialAccountType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxcomfort\ram\CreditorFinancialAccountType")
     * @JMS\Expose
     * @JMS\SerializedName("PayeePartyCreditorFinancialAccount")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getPayeePartyCreditorFinancialAccount", setter="setPayeePartyCreditorFinancialAccount")
     */
    private $payeePartyCreditorFinancialAccount;

    /**
     * @var \horstoeko\invoicesuite\models\zffxcomfort\ram\CreditorFinancialInstitutionType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxcomfort\ram\CreditorFinancialInstitutionType")
     * @JMS\Expose
     * @JMS\SerializedName("PayeeSpecifiedCreditorFinancialInstitution")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getPayeeSpecifiedCreditorFinancialInstitution", setter="setPayeeSpecifiedCreditorFinancialInstitution")
     */
    private $payeeSpecifiedCreditorFinancialInstitution;

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\qdt\PaymentMeansCodeType|null
     */
    public function getTypeCode(): ?PaymentMeansCodeType
    {
        return $this->typeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\qdt\PaymentMeansCodeType
     */
    public function getTypeCodeWithCreate(): PaymentMeansCodeType
    {
        $this->typeCode = is_null($this->typeCode) ? new PaymentMeansCodeType() : $this->typeCode;

        return $this->typeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxcomfort\qdt\PaymentMeansCodeType|null $typeCode
     * @return self
     */
    public function setTypeCode(?PaymentMeansCodeType $typeCode = null): self
    {
        $this->typeCode = $typeCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTypeCode(): self
    {
        $this->typeCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\udt\TextType|null
     */
    public function getInformation(): ?TextType
    {
        return $this->information;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\udt\TextType
     */
    public function getInformationWithCreate(): TextType
    {
        $this->information = is_null($this->information) ? new TextType() : $this->information;

        return $this->information;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxcomfort\udt\TextType|null $information
     * @return self
     */
    public function setInformation(?TextType $information = null): self
    {
        $this->information = $information;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetInformation(): self
    {
        $this->information = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\ram\TradeSettlementFinancialCardType|null
     */
    public function getApplicableTradeSettlementFinancialCard(): ?TradeSettlementFinancialCardType
    {
        return $this->applicableTradeSettlementFinancialCard;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\ram\TradeSettlementFinancialCardType
     */
    public function getApplicableTradeSettlementFinancialCardWithCreate(): TradeSettlementFinancialCardType
    {
        $this->applicableTradeSettlementFinancialCard = is_null($this->applicableTradeSettlementFinancialCard) ? new TradeSettlementFinancialCardType() : $this->applicableTradeSettlementFinancialCard;

        return $this->applicableTradeSettlementFinancialCard;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxcomfort\ram\TradeSettlementFinancialCardType|null $applicableTradeSettlementFinancialCard
     * @return self
     */
    public function setApplicableTradeSettlementFinancialCard(
        ?TradeSettlementFinancialCardType $applicableTradeSettlementFinancialCard = null,
    ): self {
        $this->applicableTradeSettlementFinancialCard = $applicableTradeSettlementFinancialCard;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetApplicableTradeSettlementFinancialCard(): self
    {
        $this->applicableTradeSettlementFinancialCard = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\ram\DebtorFinancialAccountType|null
     */
    public function getPayerPartyDebtorFinancialAccount(): ?DebtorFinancialAccountType
    {
        return $this->payerPartyDebtorFinancialAccount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\ram\DebtorFinancialAccountType
     */
    public function getPayerPartyDebtorFinancialAccountWithCreate(): DebtorFinancialAccountType
    {
        $this->payerPartyDebtorFinancialAccount = is_null($this->payerPartyDebtorFinancialAccount) ? new DebtorFinancialAccountType() : $this->payerPartyDebtorFinancialAccount;

        return $this->payerPartyDebtorFinancialAccount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxcomfort\ram\DebtorFinancialAccountType|null $payerPartyDebtorFinancialAccount
     * @return self
     */
    public function setPayerPartyDebtorFinancialAccount(
        ?DebtorFinancialAccountType $payerPartyDebtorFinancialAccount = null,
    ): self {
        $this->payerPartyDebtorFinancialAccount = $payerPartyDebtorFinancialAccount;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPayerPartyDebtorFinancialAccount(): self
    {
        $this->payerPartyDebtorFinancialAccount = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\ram\CreditorFinancialAccountType|null
     */
    public function getPayeePartyCreditorFinancialAccount(): ?CreditorFinancialAccountType
    {
        return $this->payeePartyCreditorFinancialAccount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\ram\CreditorFinancialAccountType
     */
    public function getPayeePartyCreditorFinancialAccountWithCreate(): CreditorFinancialAccountType
    {
        $this->payeePartyCreditorFinancialAccount = is_null($this->payeePartyCreditorFinancialAccount) ? new CreditorFinancialAccountType() : $this->payeePartyCreditorFinancialAccount;

        return $this->payeePartyCreditorFinancialAccount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxcomfort\ram\CreditorFinancialAccountType|null $payeePartyCreditorFinancialAccount
     * @return self
     */
    public function setPayeePartyCreditorFinancialAccount(
        ?CreditorFinancialAccountType $payeePartyCreditorFinancialAccount = null,
    ): self {
        $this->payeePartyCreditorFinancialAccount = $payeePartyCreditorFinancialAccount;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPayeePartyCreditorFinancialAccount(): self
    {
        $this->payeePartyCreditorFinancialAccount = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\ram\CreditorFinancialInstitutionType|null
     */
    public function getPayeeSpecifiedCreditorFinancialInstitution(): ?CreditorFinancialInstitutionType
    {
        return $this->payeeSpecifiedCreditorFinancialInstitution;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\ram\CreditorFinancialInstitutionType
     */
    public function getPayeeSpecifiedCreditorFinancialInstitutionWithCreate(): CreditorFinancialInstitutionType
    {
        $this->payeeSpecifiedCreditorFinancialInstitution = is_null($this->payeeSpecifiedCreditorFinancialInstitution) ? new CreditorFinancialInstitutionType() : $this->payeeSpecifiedCreditorFinancialInstitution;

        return $this->payeeSpecifiedCreditorFinancialInstitution;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxcomfort\ram\CreditorFinancialInstitutionType|null $payeeSpecifiedCreditorFinancialInstitution
     * @return self
     */
    public function setPayeeSpecifiedCreditorFinancialInstitution(
        ?CreditorFinancialInstitutionType $payeeSpecifiedCreditorFinancialInstitution = null,
    ): self {
        $this->payeeSpecifiedCreditorFinancialInstitution = $payeeSpecifiedCreditorFinancialInstitution;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPayeeSpecifiedCreditorFinancialInstitution(): self
    {
        $this->payeeSpecifiedCreditorFinancialInstitution = null;

        return $this;
    }
}
