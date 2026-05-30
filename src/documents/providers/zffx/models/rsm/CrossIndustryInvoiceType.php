<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\zffx\models\rsm;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\zffx\models\ram\ExchangedDocumentContextType;
use horstoeko\invoicesuite\documents\providers\zffx\models\ram\ExchangedDocumentType;
use horstoeko\invoicesuite\documents\providers\zffx\models\ram\SupplyChainTradeTransactionType;
use JMS\Serializer\Annotation as JMS;

#[JMS\XmlNamespace(uri: 'urn:un:unece:uncefact:data:standard:CrossIndustryInvoice:100', prefix: 'rsm')]
#[JMS\XmlNamespace(uri: 'urn:un:unece:uncefact:data:standard:QualifiedDataType:100', prefix: 'qdt')]
#[JMS\XmlNamespace(uri: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', prefix: 'ram')]
#[JMS\XmlNamespace(uri: 'http://www.w3.org/2001/XMLSchema', prefix: 'xs')]
#[JMS\XmlNamespace(uri: 'urn:un:unece:uncefact:data:standard:UnqualifiedDataType:100', prefix: 'udt')]
#[JMS\XmlNamespace(uri: 'http://www.w3.org/2001/XMLSchema-instance', prefix: 'xsi')]
class CrossIndustryInvoiceType
{
    use HandlesObjectFlags;

    /**
     * @var null|ExchangedDocumentContextType
     */
    #[JMS\Accessor(getter: 'getExchangedDocumentContext', setter: 'setExchangedDocumentContext')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('ExchangedDocumentContext')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\ExchangedDocumentContextType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:CrossIndustryInvoice:100', cdata: false)]
    private $exchangedDocumentContext;

    /**
     * @var null|ExchangedDocumentType
     */
    #[JMS\Accessor(getter: 'getExchangedDocument', setter: 'setExchangedDocument')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('ExchangedDocument')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\ExchangedDocumentType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:CrossIndustryInvoice:100', cdata: false)]
    private $exchangedDocument;

    /**
     * @var null|SupplyChainTradeTransactionType
     */
    #[JMS\Accessor(getter: 'getSupplyChainTradeTransaction', setter: 'setSupplyChainTradeTransaction')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('SupplyChainTradeTransaction')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\SupplyChainTradeTransactionType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:CrossIndustryInvoice:100', cdata: false)]
    private $supplyChainTradeTransaction;

    /**
     * @return null|ExchangedDocumentContextType
     */
    public function getExchangedDocumentContext(): ?ExchangedDocumentContextType
    {
        return $this->exchangedDocumentContext;
    }

    /**
     * @return ExchangedDocumentContextType
     */
    public function getExchangedDocumentContextWithCreate(): ExchangedDocumentContextType
    {
        $this->exchangedDocumentContext ??= new ExchangedDocumentContextType();

        return $this->exchangedDocumentContext;
    }

    /**
     * @param  null|ExchangedDocumentContextType $exchangedDocumentContext
     * @return static
     */
    public function setExchangedDocumentContext(
        ?ExchangedDocumentContextType $exchangedDocumentContext = null
    ): static {
        $this->exchangedDocumentContext = $exchangedDocumentContext;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetExchangedDocumentContext(): static
    {
        $this->exchangedDocumentContext = null;

        return $this;
    }

    /**
     * @return null|ExchangedDocumentType
     */
    public function getExchangedDocument(): ?ExchangedDocumentType
    {
        return $this->exchangedDocument;
    }

    /**
     * @return ExchangedDocumentType
     */
    public function getExchangedDocumentWithCreate(): ExchangedDocumentType
    {
        $this->exchangedDocument ??= new ExchangedDocumentType();

        return $this->exchangedDocument;
    }

    /**
     * @param  null|ExchangedDocumentType $exchangedDocument
     * @return static
     */
    public function setExchangedDocument(
        ?ExchangedDocumentType $exchangedDocument = null
    ): static {
        $this->exchangedDocument = $exchangedDocument;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetExchangedDocument(): static
    {
        $this->exchangedDocument = null;

        return $this;
    }

    /**
     * @return null|SupplyChainTradeTransactionType
     */
    public function getSupplyChainTradeTransaction(): ?SupplyChainTradeTransactionType
    {
        return $this->supplyChainTradeTransaction;
    }

    /**
     * @return SupplyChainTradeTransactionType
     */
    public function getSupplyChainTradeTransactionWithCreate(): SupplyChainTradeTransactionType
    {
        $this->supplyChainTradeTransaction ??= new SupplyChainTradeTransactionType();

        return $this->supplyChainTradeTransaction;
    }

    /**
     * @param  null|SupplyChainTradeTransactionType $supplyChainTradeTransaction
     * @return static
     */
    public function setSupplyChainTradeTransaction(
        ?SupplyChainTradeTransactionType $supplyChainTradeTransaction = null,
    ): static {
        $this->supplyChainTradeTransaction = $supplyChainTradeTransaction;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSupplyChainTradeTransaction(): static
    {
        $this->supplyChainTradeTransaction = null;

        return $this;
    }
}
