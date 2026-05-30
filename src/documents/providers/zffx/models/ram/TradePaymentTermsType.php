<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\zffx\models\ram;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\AmountType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\DateTimeType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\IDType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\TextType;
use JMS\Serializer\Annotation as JMS;

class TradePaymentTermsType
{
    use HandlesObjectFlags;

    /**
     * @var null|TextType
     */
    #[JMS\Accessor(getter: 'getDescription', setter: 'setDescription')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('Description')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\TextType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $description;

    /**
     * @var null|DateTimeType
     */
    #[JMS\Accessor(getter: 'getDueDateDateTime', setter: 'setDueDateDateTime')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('DueDateDateTime')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\DateTimeType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $dueDateDateTime;

    /**
     * @var null|IDType
     */
    #[JMS\Accessor(getter: 'getDirectDebitMandateID', setter: 'setDirectDebitMandateID')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('DirectDebitMandateID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\IDType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $directDebitMandateID;

    /**
     * @var null|AmountType
     */
    #[JMS\Accessor(getter: 'getPartialPaymentAmount', setter: 'setPartialPaymentAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('PartialPaymentAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\AmountType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $partialPaymentAmount;

    /**
     * @var null|TradePaymentPenaltyTermsType
     */
    #[JMS\Accessor(getter: 'getApplicableTradePaymentPenaltyTerms', setter: 'setApplicableTradePaymentPenaltyTerms')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('ApplicableTradePaymentPenaltyTerms')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradePaymentPenaltyTermsType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $applicableTradePaymentPenaltyTerms;

    /**
     * @var null|TradePaymentDiscountTermsType
     */
    #[JMS\Accessor(getter: 'getApplicableTradePaymentDiscountTerms', setter: 'setApplicableTradePaymentDiscountTerms')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('ApplicableTradePaymentDiscountTerms')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradePaymentDiscountTermsType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $applicableTradePaymentDiscountTerms;

    /**
     * @var null|TradePartyType
     */
    #[JMS\Accessor(getter: 'getPayeeTradeParty', setter: 'setPayeeTradeParty')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('PayeeTradeParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradePartyType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $payeeTradeParty;

    /**
     * @return null|TextType
     */
    public function getDescription(): ?TextType
    {
        return $this->description;
    }

    /**
     * @return TextType
     */
    public function getDescriptionWithCreate(): TextType
    {
        $this->description ??= new TextType();

        return $this->description;
    }

    /**
     * @param  null|TextType $description
     * @return static
     */
    public function setDescription(
        ?TextType $description = null
    ): static {
        $this->description = $description;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDescription(): static
    {
        $this->description = null;

        return $this;
    }

    /**
     * @return null|DateTimeType
     */
    public function getDueDateDateTime(): ?DateTimeType
    {
        return $this->dueDateDateTime;
    }

    /**
     * @return DateTimeType
     */
    public function getDueDateDateTimeWithCreate(): DateTimeType
    {
        $this->dueDateDateTime ??= new DateTimeType();

        return $this->dueDateDateTime;
    }

    /**
     * @param  null|DateTimeType $dueDateDateTime
     * @return static
     */
    public function setDueDateDateTime(
        ?DateTimeType $dueDateDateTime = null
    ): static {
        $this->dueDateDateTime = $dueDateDateTime;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDueDateDateTime(): static
    {
        $this->dueDateDateTime = null;

        return $this;
    }

    /**
     * @return null|IDType
     */
    public function getDirectDebitMandateID(): ?IDType
    {
        return $this->directDebitMandateID;
    }

    /**
     * @return IDType
     */
    public function getDirectDebitMandateIDWithCreate(): IDType
    {
        $this->directDebitMandateID ??= new IDType();

        return $this->directDebitMandateID;
    }

    /**
     * @param  null|IDType $directDebitMandateID
     * @return static
     */
    public function setDirectDebitMandateID(
        ?IDType $directDebitMandateID = null
    ): static {
        $this->directDebitMandateID = $directDebitMandateID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDirectDebitMandateID(): static
    {
        $this->directDebitMandateID = null;

        return $this;
    }

    /**
     * @return null|AmountType
     */
    public function getPartialPaymentAmount(): ?AmountType
    {
        return $this->partialPaymentAmount;
    }

    /**
     * @return AmountType
     */
    public function getPartialPaymentAmountWithCreate(): AmountType
    {
        $this->partialPaymentAmount ??= new AmountType();

        return $this->partialPaymentAmount;
    }

    /**
     * @param  null|AmountType $partialPaymentAmount
     * @return static
     */
    public function setPartialPaymentAmount(
        ?AmountType $partialPaymentAmount = null
    ): static {
        $this->partialPaymentAmount = $partialPaymentAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPartialPaymentAmount(): static
    {
        $this->partialPaymentAmount = null;

        return $this;
    }

    /**
     * @return null|TradePaymentPenaltyTermsType
     */
    public function getApplicableTradePaymentPenaltyTerms(): ?TradePaymentPenaltyTermsType
    {
        return $this->applicableTradePaymentPenaltyTerms;
    }

    /**
     * @return TradePaymentPenaltyTermsType
     */
    public function getApplicableTradePaymentPenaltyTermsWithCreate(): TradePaymentPenaltyTermsType
    {
        $this->applicableTradePaymentPenaltyTerms ??= new TradePaymentPenaltyTermsType();

        return $this->applicableTradePaymentPenaltyTerms;
    }

    /**
     * @param  null|TradePaymentPenaltyTermsType $applicableTradePaymentPenaltyTerms
     * @return static
     */
    public function setApplicableTradePaymentPenaltyTerms(
        ?TradePaymentPenaltyTermsType $applicableTradePaymentPenaltyTerms = null,
    ): static {
        $this->applicableTradePaymentPenaltyTerms = $applicableTradePaymentPenaltyTerms;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetApplicableTradePaymentPenaltyTerms(): static
    {
        $this->applicableTradePaymentPenaltyTerms = null;

        return $this;
    }

    /**
     * @return null|TradePaymentDiscountTermsType
     */
    public function getApplicableTradePaymentDiscountTerms(): ?TradePaymentDiscountTermsType
    {
        return $this->applicableTradePaymentDiscountTerms;
    }

    /**
     * @return TradePaymentDiscountTermsType
     */
    public function getApplicableTradePaymentDiscountTermsWithCreate(): TradePaymentDiscountTermsType
    {
        $this->applicableTradePaymentDiscountTerms ??= new TradePaymentDiscountTermsType();

        return $this->applicableTradePaymentDiscountTerms;
    }

    /**
     * @param  null|TradePaymentDiscountTermsType $applicableTradePaymentDiscountTerms
     * @return static
     */
    public function setApplicableTradePaymentDiscountTerms(
        ?TradePaymentDiscountTermsType $applicableTradePaymentDiscountTerms = null,
    ): static {
        $this->applicableTradePaymentDiscountTerms = $applicableTradePaymentDiscountTerms;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetApplicableTradePaymentDiscountTerms(): static
    {
        $this->applicableTradePaymentDiscountTerms = null;

        return $this;
    }

    /**
     * @return null|TradePartyType
     */
    public function getPayeeTradeParty(): ?TradePartyType
    {
        return $this->payeeTradeParty;
    }

    /**
     * @return TradePartyType
     */
    public function getPayeeTradePartyWithCreate(): TradePartyType
    {
        $this->payeeTradeParty ??= new TradePartyType();

        return $this->payeeTradeParty;
    }

    /**
     * @param  null|TradePartyType $payeeTradeParty
     * @return static
     */
    public function setPayeeTradeParty(
        ?TradePartyType $payeeTradeParty = null
    ): static {
        $this->payeeTradeParty = $payeeTradeParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPayeeTradeParty(): static
    {
        $this->payeeTradeParty = null;

        return $this;
    }
}
