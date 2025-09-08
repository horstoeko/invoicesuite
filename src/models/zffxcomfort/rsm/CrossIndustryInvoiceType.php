<?php

namespace horstoeko\invoicesuite\models\zffxcomfort\rsm;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\zffxcomfort\ram\ExchangedDocumentContextType;
use horstoeko\invoicesuite\models\zffxcomfort\ram\ExchangedDocumentType;
use horstoeko\invoicesuite\models\zffxcomfort\ram\SupplyChainTradeTransactionType;

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
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\zffxcomfort\ram\ExchangedDocumentContextType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxcomfort\ram\ExchangedDocumentContextType")
     * @JMS\Expose
     * @JMS\SerializedName("ExchangedDocumentContext")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:CrossIndustryInvoice:100", cdata=false)
     * @JMS\Accessor(getter="getExchangedDocumentContext", setter="setExchangedDocumentContext")
     */
    private $exchangedDocumentContext;

    /**
     * @var \horstoeko\invoicesuite\models\zffxcomfort\ram\ExchangedDocumentType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxcomfort\ram\ExchangedDocumentType")
     * @JMS\Expose
     * @JMS\SerializedName("ExchangedDocument")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:CrossIndustryInvoice:100", cdata=false)
     * @JMS\Accessor(getter="getExchangedDocument", setter="setExchangedDocument")
     */
    private $exchangedDocument;

    /**
     * @var \horstoeko\invoicesuite\models\zffxcomfort\ram\SupplyChainTradeTransactionType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxcomfort\ram\SupplyChainTradeTransactionType")
     * @JMS\Expose
     * @JMS\SerializedName("SupplyChainTradeTransaction")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:CrossIndustryInvoice:100", cdata=false)
     * @JMS\Accessor(getter="getSupplyChainTradeTransaction", setter="setSupplyChainTradeTransaction")
     */
    private $supplyChainTradeTransaction;

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\ram\ExchangedDocumentContextType|null
     */
    public function getExchangedDocumentContext(): ?ExchangedDocumentContextType
    {
        return $this->exchangedDocumentContext;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\ram\ExchangedDocumentContextType
     */
    public function getExchangedDocumentContextWithCreate(): ExchangedDocumentContextType
    {
        $this->exchangedDocumentContext = is_null($this->exchangedDocumentContext) ? new ExchangedDocumentContextType() : $this->exchangedDocumentContext;

        return $this->exchangedDocumentContext;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxcomfort\ram\ExchangedDocumentContextType|null $exchangedDocumentContext
     * @return self
     */
    public function setExchangedDocumentContext(?ExchangedDocumentContextType $exchangedDocumentContext = null): self
    {
        $this->exchangedDocumentContext = $exchangedDocumentContext;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetExchangedDocumentContext(): self
    {
        $this->exchangedDocumentContext = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\ram\ExchangedDocumentType|null
     */
    public function getExchangedDocument(): ?ExchangedDocumentType
    {
        return $this->exchangedDocument;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\ram\ExchangedDocumentType
     */
    public function getExchangedDocumentWithCreate(): ExchangedDocumentType
    {
        $this->exchangedDocument = is_null($this->exchangedDocument) ? new ExchangedDocumentType() : $this->exchangedDocument;

        return $this->exchangedDocument;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxcomfort\ram\ExchangedDocumentType|null $exchangedDocument
     * @return self
     */
    public function setExchangedDocument(?ExchangedDocumentType $exchangedDocument = null): self
    {
        $this->exchangedDocument = $exchangedDocument;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetExchangedDocument(): self
    {
        $this->exchangedDocument = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\ram\SupplyChainTradeTransactionType|null
     */
    public function getSupplyChainTradeTransaction(): ?SupplyChainTradeTransactionType
    {
        return $this->supplyChainTradeTransaction;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxcomfort\ram\SupplyChainTradeTransactionType
     */
    public function getSupplyChainTradeTransactionWithCreate(): SupplyChainTradeTransactionType
    {
        $this->supplyChainTradeTransaction = is_null($this->supplyChainTradeTransaction) ? new SupplyChainTradeTransactionType() : $this->supplyChainTradeTransaction;

        return $this->supplyChainTradeTransaction;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxcomfort\ram\SupplyChainTradeTransactionType|null $supplyChainTradeTransaction
     * @return self
     */
    public function setSupplyChainTradeTransaction(
        ?SupplyChainTradeTransactionType $supplyChainTradeTransaction = null,
    ): self {
        $this->supplyChainTradeTransaction = $supplyChainTradeTransaction;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSupplyChainTradeTransaction(): self
    {
        $this->supplyChainTradeTransaction = null;

        return $this;
    }
}
