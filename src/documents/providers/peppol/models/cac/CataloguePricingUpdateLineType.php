<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use JMS\Serializer\Annotation as JMS;

class CataloguePricingUpdateLineType
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
     * @var null|array<RequiredItemLocationQuantity>
     */
    #[JMS\Accessor(getter: 'getRequiredItemLocationQuantity', setter: 'setRequiredItemLocationQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('RequiredItemLocationQuantity')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\RequiredItemLocationQuantity>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'RequiredItemLocationQuantity', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $requiredItemLocationQuantity;

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
     * @return null|array<RequiredItemLocationQuantity>
     */
    public function getRequiredItemLocationQuantity(): ?array
    {
        return $this->requiredItemLocationQuantity;
    }

    /**
     * @param  null|array<RequiredItemLocationQuantity> $requiredItemLocationQuantity
     * @return static
     */
    public function setRequiredItemLocationQuantity(
        ?array $requiredItemLocationQuantity = null
    ): static {
        $this->requiredItemLocationQuantity = $requiredItemLocationQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRequiredItemLocationQuantity(): static
    {
        $this->requiredItemLocationQuantity = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearRequiredItemLocationQuantity(): static
    {
        $this->requiredItemLocationQuantity = [];

        return $this;
    }

    /**
     * @return null|RequiredItemLocationQuantity
     */
    public function firstRequiredItemLocationQuantity(): ?RequiredItemLocationQuantity
    {
        $requiredItemLocationQuantity = $this->requiredItemLocationQuantity ?? [];
        $requiredItemLocationQuantity = reset($requiredItemLocationQuantity);

        if (false === $requiredItemLocationQuantity) {
            return null;
        }

        return $requiredItemLocationQuantity;
    }

    /**
     * @return null|RequiredItemLocationQuantity
     */
    public function lastRequiredItemLocationQuantity(): ?RequiredItemLocationQuantity
    {
        $requiredItemLocationQuantity = $this->requiredItemLocationQuantity ?? [];
        $requiredItemLocationQuantity = end($requiredItemLocationQuantity);

        if (false === $requiredItemLocationQuantity) {
            return null;
        }

        return $requiredItemLocationQuantity;
    }

    /**
     * @param  RequiredItemLocationQuantity $requiredItemLocationQuantity
     * @return static
     */
    public function addToRequiredItemLocationQuantity(
        RequiredItemLocationQuantity $requiredItemLocationQuantity,
    ): static {
        $this->requiredItemLocationQuantity[] = $requiredItemLocationQuantity;

        return $this;
    }

    /**
     * @return RequiredItemLocationQuantity
     */
    public function addToRequiredItemLocationQuantityWithCreate(): RequiredItemLocationQuantity
    {
        $this->addTorequiredItemLocationQuantity($requiredItemLocationQuantity = new RequiredItemLocationQuantity());

        return $requiredItemLocationQuantity;
    }

    /**
     * @param  RequiredItemLocationQuantity $requiredItemLocationQuantity
     * @return static
     */
    public function addOnceToRequiredItemLocationQuantity(
        RequiredItemLocationQuantity $requiredItemLocationQuantity,
    ): static {
        if (!is_array($this->requiredItemLocationQuantity)) {
            $this->requiredItemLocationQuantity = [];
        }

        $this->requiredItemLocationQuantity[0] = $requiredItemLocationQuantity;

        return $this;
    }

    /**
     * @return RequiredItemLocationQuantity
     */
    public function addOnceToRequiredItemLocationQuantityWithCreate(): RequiredItemLocationQuantity
    {
        if (!is_array($this->requiredItemLocationQuantity)) {
            $this->requiredItemLocationQuantity = [];
        }

        if ([] === $this->requiredItemLocationQuantity) {
            $this->addOnceTorequiredItemLocationQuantity(new RequiredItemLocationQuantity());
        }

        return $this->requiredItemLocationQuantity[0];
    }
}
