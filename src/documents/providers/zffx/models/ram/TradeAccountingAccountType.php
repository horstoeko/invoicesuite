<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\zffx\models\ram;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\zffx\models\qdt\AccountingAccountTypeCodeType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\IDType;
use JMS\Serializer\Annotation as JMS;

class TradeAccountingAccountType
{
    use HandlesObjectFlags;

    /**
     * @var null|IDType
     */
    #[JMS\Accessor(getter: 'getID', setter: 'setID')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('ID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\IDType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $iD;

    /**
     * @var null|AccountingAccountTypeCodeType
     */
    #[JMS\Accessor(getter: 'getTypeCode', setter: 'setTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('TypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\qdt\AccountingAccountTypeCodeType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $typeCode;

    /**
     * @return null|IDType
     */
    public function getID(): ?IDType
    {
        return $this->iD;
    }

    /**
     * @return IDType
     */
    public function getIDWithCreate(): IDType
    {
        $this->iD ??= new IDType();

        return $this->iD;
    }

    /**
     * @param  null|IDType $iD
     * @return static
     */
    public function setID(
        ?IDType $iD = null
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
     * @return null|AccountingAccountTypeCodeType
     */
    public function getTypeCode(): ?AccountingAccountTypeCodeType
    {
        return $this->typeCode;
    }

    /**
     * @return AccountingAccountTypeCodeType
     */
    public function getTypeCodeWithCreate(): AccountingAccountTypeCodeType
    {
        $this->typeCode ??= new AccountingAccountTypeCodeType();

        return $this->typeCode;
    }

    /**
     * @param  null|AccountingAccountTypeCodeType $typeCode
     * @return static
     */
    public function setTypeCode(
        ?AccountingAccountTypeCodeType $typeCode = null
    ): static {
        $this->typeCode = $typeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTypeCode(): static
    {
        $this->typeCode = null;

        return $this;
    }
}
