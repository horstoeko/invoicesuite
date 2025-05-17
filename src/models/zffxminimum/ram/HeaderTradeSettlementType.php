<?php

namespace horstoeko\invoicesuite\models\zffxminimum\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\zffxminimum\qdt\CurrencyCodeType;

class HeaderTradeSettlementType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\zffxminimum\qdt\CurrencyCodeType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxminimum\qdt\CurrencyCodeType")
     * @JMS\Expose
     * @JMS\SerializedName("InvoiceCurrencyCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getInvoiceCurrencyCode", setter="setInvoiceCurrencyCode")
     */
    private $invoiceCurrencyCode;

    /**
     * @var \horstoeko\invoicesuite\models\zffxminimum\ram\TradeSettlementHeaderMonetarySummationType
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxminimum\ram\TradeSettlementHeaderMonetarySummationType")
     * @JMS\Expose
     * @JMS\SerializedName("SpecifiedTradeSettlementHeaderMonetarySummation")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSpecifiedTradeSettlementHeaderMonetarySummation", setter="setSpecifiedTradeSettlementHeaderMonetarySummation")
     */
    private $specifiedTradeSettlementHeaderMonetarySummation;

    /**
     * @return \horstoeko\invoicesuite\models\zffxminimum\qdt\CurrencyCodeType|null
     */
    public function getInvoiceCurrencyCode(): ?CurrencyCodeType
    {
        return $this->invoiceCurrencyCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxminimum\qdt\CurrencyCodeType
     */
    public function getInvoiceCurrencyCodeWithCreate(): CurrencyCodeType
    {
        $this->invoiceCurrencyCode = is_null($this->invoiceCurrencyCode) ? new CurrencyCodeType() : $this->invoiceCurrencyCode;

        return $this->invoiceCurrencyCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxminimum\qdt\CurrencyCodeType $invoiceCurrencyCode
     * @return self
     */
    public function setInvoiceCurrencyCode(CurrencyCodeType $invoiceCurrencyCode): self
    {
        $this->invoiceCurrencyCode = $invoiceCurrencyCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxminimum\ram\TradeSettlementHeaderMonetarySummationType|null
     */
    public function getSpecifiedTradeSettlementHeaderMonetarySummation(): ?TradeSettlementHeaderMonetarySummationType
    {
        return $this->specifiedTradeSettlementHeaderMonetarySummation;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxminimum\ram\TradeSettlementHeaderMonetarySummationType
     */
    public function getSpecifiedTradeSettlementHeaderMonetarySummationWithCreate(): TradeSettlementHeaderMonetarySummationType
    {
        $this->specifiedTradeSettlementHeaderMonetarySummation = is_null($this->specifiedTradeSettlementHeaderMonetarySummation) ? new TradeSettlementHeaderMonetarySummationType() : $this->specifiedTradeSettlementHeaderMonetarySummation;

        return $this->specifiedTradeSettlementHeaderMonetarySummation;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxminimum\ram\TradeSettlementHeaderMonetarySummationType $specifiedTradeSettlementHeaderMonetarySummation
     * @return self
     */
    public function setSpecifiedTradeSettlementHeaderMonetarySummation(
        TradeSettlementHeaderMonetarySummationType $specifiedTradeSettlementHeaderMonetarySummation,
    ): self {
        $this->specifiedTradeSettlementHeaderMonetarySummation = $specifiedTradeSettlementHeaderMonetarySummation;

        return $this;
    }
}
