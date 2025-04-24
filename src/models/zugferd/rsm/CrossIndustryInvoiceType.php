<?php

namespace horstoeko\invoicesuite\models\zugferd\rsm;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zugferd\ram\ExchangedDocumentContextType;
use horstoeko\invoicesuite\models\zugferd\ram\ExchangedDocumentType;
use horstoeko\invoicesuite\models\zugferd\ram\SupplyChainTradeTransactionType;

/**
 * @JMS\XmlNamespace(uri="urn:un:unece:uncefact:data:standard:CrossIndustryInvoice:100", prefix="rsm")
 * @JMS\XmlNamespace(uri="urn:un:unece:uncefact:data:standard:QualifiedDataType:100", prefix="qdt")
 * @JMS\XmlNamespace(uri="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", prefix="ram")
 * @JMS\XmlNamespace(uri="http://www.w3.org/2001/XMLSchema", prefix="xs")
 * @JMS\XmlNamespace(uri="urn:un:unece:uncefact:data:standard:UnqualifiedDataType:100", prefix="udt")
 * @JMS\XmlNamespace(uri="http://www.w3.org/2001/XMLSchema-instance", prefix="xsi")
 */
class CrossIndustryInvoiceType
{
    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\ExchangedDocumentContextType
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\ExchangedDocumentContextType")
     * @JMS\Expose
     * @JMS\SerializedName("ExchangedDocumentContext")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:CrossIndustryInvoice:100", cdata=false)
     * @JMS\Accessor(getter="getExchangedDocumentContext", setter="setExchangedDocumentContext")
     */
    private $exchangedDocumentContextType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\ExchangedDocumentType
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\ExchangedDocumentType")
     * @JMS\Expose
     * @JMS\SerializedName("ExchangedDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:CrossIndustryInvoice:100", cdata=false)
     * @JMS\Accessor(getter="getExchangedDocument", setter="setExchangedDocument")
     */
    private $exchangedDocumentType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\SupplyChainTradeTransactionType
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\SupplyChainTradeTransactionType")
     * @JMS\Expose
     * @JMS\SerializedName("SupplyChainTradeTransaction")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:CrossIndustryInvoice:100", cdata=false)
     * @JMS\Accessor(getter="getSupplyChainTradeTransaction", setter="setSupplyChainTradeTransaction")
     */
    private $supplyChainTradeTransactionType;

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\ExchangedDocumentContextType|null
     */
    public function getExchangedDocumentContext(
    ): ?\horstoeko\invoicesuite\models\zugferd\ram\ExchangedDocumentContextType {
        return $this->exchangedDocumentContextType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\ExchangedDocumentContextType
     */
    public function getExchangedDocumentContextWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\ram\ExchangedDocumentContextType {
        $this->exchangedDocumentContextType = is_null($this->exchangedDocumentContextType) ? new ExchangedDocumentContextType() : $this->exchangedDocumentContextType;

        return $this->exchangedDocumentContextType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\ExchangedDocumentContextType
     * @return self
     */
    public function setExchangedDocumentContext(
        \horstoeko\invoicesuite\models\zugferd\ram\ExchangedDocumentContextType $exchangedDocumentContextType,
    ): self {
        $this->exchangedDocumentContextType = $exchangedDocumentContextType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\ExchangedDocumentType|null
     */
    public function getExchangedDocument(): ?\horstoeko\invoicesuite\models\zugferd\ram\ExchangedDocumentType
    {
        return $this->exchangedDocumentType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\ExchangedDocumentType
     */
    public function getExchangedDocumentWithCreate(): \horstoeko\invoicesuite\models\zugferd\ram\ExchangedDocumentType
    {
        $this->exchangedDocumentType = is_null($this->exchangedDocumentType) ? new ExchangedDocumentType() : $this->exchangedDocumentType;

        return $this->exchangedDocumentType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\ExchangedDocumentType
     * @return self
     */
    public function setExchangedDocument(
        \horstoeko\invoicesuite\models\zugferd\ram\ExchangedDocumentType $exchangedDocumentType,
    ): self {
        $this->exchangedDocumentType = $exchangedDocumentType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\SupplyChainTradeTransactionType|null
     */
    public function getSupplyChainTradeTransaction(
    ): ?\horstoeko\invoicesuite\models\zugferd\ram\SupplyChainTradeTransactionType {
        return $this->supplyChainTradeTransactionType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\SupplyChainTradeTransactionType
     */
    public function getSupplyChainTradeTransactionWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\ram\SupplyChainTradeTransactionType {
        $this->supplyChainTradeTransactionType = is_null($this->supplyChainTradeTransactionType) ? new SupplyChainTradeTransactionType() : $this->supplyChainTradeTransactionType;

        return $this->supplyChainTradeTransactionType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\SupplyChainTradeTransactionType
     * @return self
     */
    public function setSupplyChainTradeTransaction(
        \horstoeko\invoicesuite\models\zugferd\ram\SupplyChainTradeTransactionType $supplyChainTradeTransactionType,
    ): self {
        $this->supplyChainTradeTransactionType = $supplyChainTradeTransactionType;

        return $this;
    }
}
