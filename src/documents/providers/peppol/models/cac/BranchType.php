<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Name;
use JMS\Serializer\Annotation as JMS;

class BranchType
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
     * @var null|Name
     */
    #[JMS\Accessor(getter: 'getName', setter: 'setName')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Name')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Name')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $name;

    /**
     * @var null|FinancialInstitution
     */
    #[JMS\Accessor(getter: 'getFinancialInstitution', setter: 'setFinancialInstitution')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('FinancialInstitution')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\FinancialInstitution')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $financialInstitution;

    /**
     * @var null|Address
     */
    #[JMS\Accessor(getter: 'getAddress', setter: 'setAddress')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Address')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\Address')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $address;

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
     * @return null|Name
     */
    public function getName(): ?Name
    {
        return $this->name;
    }

    /**
     * @return Name
     */
    public function getNameWithCreate(): Name
    {
        $this->name ??= new Name();

        return $this->name;
    }

    /**
     * @param  null|Name $name
     * @return static
     */
    public function setName(
        ?Name $name = null
    ): static {
        $this->name = $name;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetName(): static
    {
        $this->name = null;

        return $this;
    }

    /**
     * @return null|FinancialInstitution
     */
    public function getFinancialInstitution(): ?FinancialInstitution
    {
        return $this->financialInstitution;
    }

    /**
     * @return FinancialInstitution
     */
    public function getFinancialInstitutionWithCreate(): FinancialInstitution
    {
        $this->financialInstitution ??= new FinancialInstitution();

        return $this->financialInstitution;
    }

    /**
     * @param  null|FinancialInstitution $financialInstitution
     * @return static
     */
    public function setFinancialInstitution(
        ?FinancialInstitution $financialInstitution = null
    ): static {
        $this->financialInstitution = $financialInstitution;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetFinancialInstitution(): static
    {
        $this->financialInstitution = null;

        return $this;
    }

    /**
     * @return null|Address
     */
    public function getAddress(): ?Address
    {
        return $this->address;
    }

    /**
     * @return Address
     */
    public function getAddressWithCreate(): Address
    {
        $this->address ??= new Address();

        return $this->address;
    }

    /**
     * @param  null|Address $address
     * @return static
     */
    public function setAddress(
        ?Address $address = null
    ): static {
        $this->address = $address;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAddress(): static
    {
        $this->address = null;

        return $this;
    }
}
