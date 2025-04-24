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
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\ram\ExchangedDocumentContextType")
     * @JMS\Expose
     * @JMS\SerializedName("ExchangedDocumentContext")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:CrossIndustryInvoice:100", cdata=false)
     * @JMS\Accessor(getter="getExchangedDocumentContext", setter="setExchangedDocumentContext")
     */
    private $exchangedDocumentContext;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\ExchangedDocumentType
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\ram\ExchangedDocumentType")
     * @JMS\Expose
     * @JMS\SerializedName("ExchangedDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:CrossIndustryInvoice:100", cdata=false)
     * @JMS\Accessor(getter="getExchangedDocument", setter="setExchangedDocument")
     */
    private $exchangedDocument;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\SupplyChainTradeTransactionType
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\ram\SupplyChainTradeTransactionType")
     * @JMS\Expose
     * @JMS\SerializedName("SupplyChainTradeTransaction")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:CrossIndustryInvoice:100", cdata=false)
     * @JMS\Accessor(getter="getSupplyChainTradeTransaction", setter="setSupplyChainTradeTransaction")
     */
    private $supplyChainTradeTransaction;

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\ExchangedDocumentContextType|null
     */
    public function getExchangedDocumentContext(): ?ExchangedDocumentContextType
    {
        return $this->exchangedDocumentContext;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\ExchangedDocumentContextType
     */
    public function getExchangedDocumentContextWithCreate(): ExchangedDocumentContextType
    {
        $this->exchangedDocumentContext = is_null($this->exchangedDocumentContext) ? new ExchangedDocumentContextType() : $this->exchangedDocumentContext;

        return $this->exchangedDocumentContext;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\ExchangedDocumentContextType
     * @return self
     */
    public function setExchangedDocumentContext(ExchangedDocumentContextType $exchangedDocumentContext): self
    {
        $this->exchangedDocumentContext = $exchangedDocumentContext;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\ExchangedDocumentType|null
     */
    public function getExchangedDocument(): ?ExchangedDocumentType
    {
        return $this->exchangedDocument;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\ExchangedDocumentType
     */
    public function getExchangedDocumentWithCreate(): ExchangedDocumentType
    {
        $this->exchangedDocument = is_null($this->exchangedDocument) ? new ExchangedDocumentType() : $this->exchangedDocument;

        return $this->exchangedDocument;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\ExchangedDocumentType
     * @return self
     */
    public function setExchangedDocument(ExchangedDocumentType $exchangedDocument): self
    {
        $this->exchangedDocument = $exchangedDocument;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\SupplyChainTradeTransactionType|null
     */
    public function getSupplyChainTradeTransaction(): ?SupplyChainTradeTransactionType
    {
        return $this->supplyChainTradeTransaction;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\SupplyChainTradeTransactionType
     */
    public function getSupplyChainTradeTransactionWithCreate(): SupplyChainTradeTransactionType
    {
        $this->supplyChainTradeTransaction = is_null($this->supplyChainTradeTransaction) ? new SupplyChainTradeTransactionType() : $this->supplyChainTradeTransaction;

        return $this->supplyChainTradeTransaction;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\SupplyChainTradeTransactionType
     * @return self
     */
    public function setSupplyChainTradeTransaction(SupplyChainTradeTransactionType $supplyChainTradeTransaction): self
    {
        $this->supplyChainTradeTransaction = $supplyChainTradeTransaction;

        return $this;
    }
}
