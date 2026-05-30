<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\zffx\models\ram;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\CodeType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\TextType;
use JMS\Serializer\Annotation as JMS;

class TradeContactType
{
    use HandlesObjectFlags;

    /**
     * @var null|TextType
     */
    #[JMS\Accessor(getter: 'getPersonName', setter: 'setPersonName')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('PersonName')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\TextType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $personName;

    /**
     * @var null|TextType
     */
    #[JMS\Accessor(getter: 'getDepartmentName', setter: 'setDepartmentName')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('DepartmentName')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\TextType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $departmentName;

    /**
     * @var null|CodeType
     */
    #[JMS\Accessor(getter: 'getTypeCode', setter: 'setTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('TypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\CodeType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $typeCode;

    /**
     * @var null|UniversalCommunicationType
     */
    #[JMS\Accessor(getter: 'getTelephoneUniversalCommunication', setter: 'setTelephoneUniversalCommunication')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('TelephoneUniversalCommunication')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\UniversalCommunicationType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $telephoneUniversalCommunication;

    /**
     * @var null|UniversalCommunicationType
     */
    #[JMS\Accessor(getter: 'getFaxUniversalCommunication', setter: 'setFaxUniversalCommunication')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('FaxUniversalCommunication')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\UniversalCommunicationType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $faxUniversalCommunication;

    /**
     * @var null|UniversalCommunicationType
     */
    #[JMS\Accessor(getter: 'getEmailURIUniversalCommunication', setter: 'setEmailURIUniversalCommunication')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('EmailURIUniversalCommunication')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\UniversalCommunicationType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $emailURIUniversalCommunication;

    /**
     * @return null|TextType
     */
    public function getPersonName(): ?TextType
    {
        return $this->personName;
    }

    /**
     * @return TextType
     */
    public function getPersonNameWithCreate(): TextType
    {
        $this->personName ??= new TextType();

        return $this->personName;
    }

    /**
     * @param  null|TextType $personName
     * @return static
     */
    public function setPersonName(
        ?TextType $personName = null
    ): static {
        $this->personName = $personName;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPersonName(): static
    {
        $this->personName = null;

        return $this;
    }

    /**
     * @return null|TextType
     */
    public function getDepartmentName(): ?TextType
    {
        return $this->departmentName;
    }

    /**
     * @return TextType
     */
    public function getDepartmentNameWithCreate(): TextType
    {
        $this->departmentName ??= new TextType();

        return $this->departmentName;
    }

    /**
     * @param  null|TextType $departmentName
     * @return static
     */
    public function setDepartmentName(
        ?TextType $departmentName = null
    ): static {
        $this->departmentName = $departmentName;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDepartmentName(): static
    {
        $this->departmentName = null;

        return $this;
    }

    /**
     * @return null|CodeType
     */
    public function getTypeCode(): ?CodeType
    {
        return $this->typeCode;
    }

    /**
     * @return CodeType
     */
    public function getTypeCodeWithCreate(): CodeType
    {
        $this->typeCode ??= new CodeType();

        return $this->typeCode;
    }

    /**
     * @param  null|CodeType $typeCode
     * @return static
     */
    public function setTypeCode(
        ?CodeType $typeCode = null
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

    /**
     * @return null|UniversalCommunicationType
     */
    public function getTelephoneUniversalCommunication(): ?UniversalCommunicationType
    {
        return $this->telephoneUniversalCommunication;
    }

    /**
     * @return UniversalCommunicationType
     */
    public function getTelephoneUniversalCommunicationWithCreate(): UniversalCommunicationType
    {
        $this->telephoneUniversalCommunication ??= new UniversalCommunicationType();

        return $this->telephoneUniversalCommunication;
    }

    /**
     * @param  null|UniversalCommunicationType $telephoneUniversalCommunication
     * @return static
     */
    public function setTelephoneUniversalCommunication(
        ?UniversalCommunicationType $telephoneUniversalCommunication = null,
    ): static {
        $this->telephoneUniversalCommunication = $telephoneUniversalCommunication;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTelephoneUniversalCommunication(): static
    {
        $this->telephoneUniversalCommunication = null;

        return $this;
    }

    /**
     * @return null|UniversalCommunicationType
     */
    public function getFaxUniversalCommunication(): ?UniversalCommunicationType
    {
        return $this->faxUniversalCommunication;
    }

    /**
     * @return UniversalCommunicationType
     */
    public function getFaxUniversalCommunicationWithCreate(): UniversalCommunicationType
    {
        $this->faxUniversalCommunication ??= new UniversalCommunicationType();

        return $this->faxUniversalCommunication;
    }

    /**
     * @param  null|UniversalCommunicationType $faxUniversalCommunication
     * @return static
     */
    public function setFaxUniversalCommunication(
        ?UniversalCommunicationType $faxUniversalCommunication = null
    ): static {
        $this->faxUniversalCommunication = $faxUniversalCommunication;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetFaxUniversalCommunication(): static
    {
        $this->faxUniversalCommunication = null;

        return $this;
    }

    /**
     * @return null|UniversalCommunicationType
     */
    public function getEmailURIUniversalCommunication(): ?UniversalCommunicationType
    {
        return $this->emailURIUniversalCommunication;
    }

    /**
     * @return UniversalCommunicationType
     */
    public function getEmailURIUniversalCommunicationWithCreate(): UniversalCommunicationType
    {
        $this->emailURIUniversalCommunication ??= new UniversalCommunicationType();

        return $this->emailURIUniversalCommunication;
    }

    /**
     * @param  null|UniversalCommunicationType $emailURIUniversalCommunication
     * @return static
     */
    public function setEmailURIUniversalCommunication(
        ?UniversalCommunicationType $emailURIUniversalCommunication = null,
    ): static {
        $this->emailURIUniversalCommunication = $emailURIUniversalCommunication;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetEmailURIUniversalCommunication(): static
    {
        $this->emailURIUniversalCommunication = null;

        return $this;
    }
}
