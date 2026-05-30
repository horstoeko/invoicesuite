<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use JMS\Serializer\Annotation as JMS;

class CatalogueItemSpecificationUpdateLineType
{
    use HandlesObjectFlags;

    /**
     * @var null|ID
     */
    #[JMS\Accessor(getter: 'getID', setter: 'setID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $iD;

    /**
     * @var null|ContractorCustomerParty
     */
    #[JMS\Accessor(getter: 'getContractorCustomerParty', setter: 'setContractorCustomerParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ContractorCustomerParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\ContractorCustomerParty')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $contractorCustomerParty;

    /**
     * @var null|SellerSupplierParty
     */
    #[JMS\Accessor(getter: 'getSellerSupplierParty', setter: 'setSellerSupplierParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SellerSupplierParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\SellerSupplierParty')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $sellerSupplierParty;

    /**
     * @var null|Item
     */
    #[JMS\Accessor(getter: 'getItem', setter: 'setItem')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Item')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\Item')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $item;

    /**
     * @return null|ID
     */
    public function getID(): ?ID
    {
        return $this->iD;
    }

    /**
     * @return ID
     */
    public function getIDWithCreate(): ID
    {
        $this->iD ??= new ID();

        return $this->iD;
    }

    /**
     * @param  null|ID $iD
     * @return static
     */
    public function setID(
        ?ID $iD = null
    ): static {
        $this->iD = $iD;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetID(): static
    {
        $this->iD = null;

        return $this;
    }

    /**
     * @return null|ContractorCustomerParty
     */
    public function getContractorCustomerParty(): ?ContractorCustomerParty
    {
        return $this->contractorCustomerParty;
    }

    /**
     * @return ContractorCustomerParty
     */
    public function getContractorCustomerPartyWithCreate(): ContractorCustomerParty
    {
        $this->contractorCustomerParty ??= new ContractorCustomerParty();

        return $this->contractorCustomerParty;
    }

    /**
     * @param  null|ContractorCustomerParty $contractorCustomerParty
     * @return static
     */
    public function setContractorCustomerParty(
        ?ContractorCustomerParty $contractorCustomerParty = null
    ): static {
        $this->contractorCustomerParty = $contractorCustomerParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetContractorCustomerParty(): static
    {
        $this->contractorCustomerParty = null;

        return $this;
    }

    /**
     * @return null|SellerSupplierParty
     */
    public function getSellerSupplierParty(): ?SellerSupplierParty
    {
        return $this->sellerSupplierParty;
    }

    /**
     * @return SellerSupplierParty
     */
    public function getSellerSupplierPartyWithCreate(): SellerSupplierParty
    {
        $this->sellerSupplierParty ??= new SellerSupplierParty();

        return $this->sellerSupplierParty;
    }

    /**
     * @param  null|SellerSupplierParty $sellerSupplierParty
     * @return static
     */
    public function setSellerSupplierParty(
        ?SellerSupplierParty $sellerSupplierParty = null
    ): static {
        $this->sellerSupplierParty = $sellerSupplierParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSellerSupplierParty(): static
    {
        $this->sellerSupplierParty = null;

        return $this;
    }

    /**
     * @return null|Item
     */
    public function getItem(): ?Item
    {
        return $this->item;
    }

    /**
     * @return Item
     */
    public function getItemWithCreate(): Item
    {
        $this->item ??= new Item();

        return $this->item;
    }

    /**
     * @param  null|Item $item
     * @return static
     */
    public function setItem(
        ?Item $item = null
    ): static {
        $this->item = $item;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetItem(): static
    {
        $this->item = null;

        return $this;
    }
}
