<?php

namespace horstoeko\invoicesuite\models\zffxextended\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\zffxextended\udt\CodeType;
use horstoeko\invoicesuite\models\zffxextended\udt\TextType;

class TradeContactType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\zffxextended\udt\TextType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxextended\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("PersonName")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getPersonName", setter="setPersonName")
     */
    private $personName;

    /**
     * @var \horstoeko\invoicesuite\models\zffxextended\udt\TextType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxextended\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("DepartmentName")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getDepartmentName", setter="setDepartmentName")
     */
    private $departmentName;

    /**
     * @var \horstoeko\invoicesuite\models\zffxextended\udt\CodeType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxextended\udt\CodeType")
     * @JMS\Expose
     * @JMS\SerializedName("TypeCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getTypeCode", setter="setTypeCode")
     */
    private $typeCode;

    /**
     * @var \horstoeko\invoicesuite\models\zffxextended\ram\UniversalCommunicationType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxextended\ram\UniversalCommunicationType")
     * @JMS\Expose
     * @JMS\SerializedName("TelephoneUniversalCommunication")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getTelephoneUniversalCommunication", setter="setTelephoneUniversalCommunication")
     */
    private $telephoneUniversalCommunication;

    /**
     * @var \horstoeko\invoicesuite\models\zffxextended\ram\UniversalCommunicationType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxextended\ram\UniversalCommunicationType")
     * @JMS\Expose
     * @JMS\SerializedName("FaxUniversalCommunication")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getFaxUniversalCommunication", setter="setFaxUniversalCommunication")
     */
    private $faxUniversalCommunication;

    /**
     * @var \horstoeko\invoicesuite\models\zffxextended\ram\UniversalCommunicationType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxextended\ram\UniversalCommunicationType")
     * @JMS\Expose
     * @JMS\SerializedName("EmailURIUniversalCommunication")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getEmailURIUniversalCommunication", setter="setEmailURIUniversalCommunication")
     */
    private $emailURIUniversalCommunication;

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\TextType|null
     */
    public function getPersonName(): ?TextType
    {
        return $this->personName;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\TextType
     */
    public function getPersonNameWithCreate(): TextType
    {
        $this->personName = is_null($this->personName) ? new TextType() : $this->personName;

        return $this->personName;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\udt\TextType|null $personName
     * @return self
     */
    public function setPersonName(?TextType $personName = null): self
    {
        $this->personName = $personName;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPersonName(): self
    {
        $this->personName = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\TextType|null
     */
    public function getDepartmentName(): ?TextType
    {
        return $this->departmentName;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\TextType
     */
    public function getDepartmentNameWithCreate(): TextType
    {
        $this->departmentName = is_null($this->departmentName) ? new TextType() : $this->departmentName;

        return $this->departmentName;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\udt\TextType|null $departmentName
     * @return self
     */
    public function setDepartmentName(?TextType $departmentName = null): self
    {
        $this->departmentName = $departmentName;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDepartmentName(): self
    {
        $this->departmentName = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\CodeType|null
     */
    public function getTypeCode(): ?CodeType
    {
        return $this->typeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\udt\CodeType
     */
    public function getTypeCodeWithCreate(): CodeType
    {
        $this->typeCode = is_null($this->typeCode) ? new CodeType() : $this->typeCode;

        return $this->typeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\udt\CodeType|null $typeCode
     * @return self
     */
    public function setTypeCode(?CodeType $typeCode = null): self
    {
        $this->typeCode = $typeCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTypeCode(): self
    {
        $this->typeCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\ram\UniversalCommunicationType|null
     */
    public function getTelephoneUniversalCommunication(): ?UniversalCommunicationType
    {
        return $this->telephoneUniversalCommunication;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\ram\UniversalCommunicationType
     */
    public function getTelephoneUniversalCommunicationWithCreate(): UniversalCommunicationType
    {
        $this->telephoneUniversalCommunication = is_null($this->telephoneUniversalCommunication) ? new UniversalCommunicationType() : $this->telephoneUniversalCommunication;

        return $this->telephoneUniversalCommunication;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\ram\UniversalCommunicationType|null $telephoneUniversalCommunication
     * @return self
     */
    public function setTelephoneUniversalCommunication(
        ?UniversalCommunicationType $telephoneUniversalCommunication = null,
    ): self {
        $this->telephoneUniversalCommunication = $telephoneUniversalCommunication;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTelephoneUniversalCommunication(): self
    {
        $this->telephoneUniversalCommunication = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\ram\UniversalCommunicationType|null
     */
    public function getFaxUniversalCommunication(): ?UniversalCommunicationType
    {
        return $this->faxUniversalCommunication;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\ram\UniversalCommunicationType
     */
    public function getFaxUniversalCommunicationWithCreate(): UniversalCommunicationType
    {
        $this->faxUniversalCommunication = is_null($this->faxUniversalCommunication) ? new UniversalCommunicationType() : $this->faxUniversalCommunication;

        return $this->faxUniversalCommunication;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\ram\UniversalCommunicationType|null $faxUniversalCommunication
     * @return self
     */
    public function setFaxUniversalCommunication(?UniversalCommunicationType $faxUniversalCommunication = null): self
    {
        $this->faxUniversalCommunication = $faxUniversalCommunication;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetFaxUniversalCommunication(): self
    {
        $this->faxUniversalCommunication = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\ram\UniversalCommunicationType|null
     */
    public function getEmailURIUniversalCommunication(): ?UniversalCommunicationType
    {
        return $this->emailURIUniversalCommunication;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxextended\ram\UniversalCommunicationType
     */
    public function getEmailURIUniversalCommunicationWithCreate(): UniversalCommunicationType
    {
        $this->emailURIUniversalCommunication = is_null($this->emailURIUniversalCommunication) ? new UniversalCommunicationType() : $this->emailURIUniversalCommunication;

        return $this->emailURIUniversalCommunication;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxextended\ram\UniversalCommunicationType|null $emailURIUniversalCommunication
     * @return self
     */
    public function setEmailURIUniversalCommunication(
        ?UniversalCommunicationType $emailURIUniversalCommunication = null,
    ): self {
        $this->emailURIUniversalCommunication = $emailURIUniversalCommunication;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetEmailURIUniversalCommunication(): self
    {
        $this->emailURIUniversalCommunication = null;

        return $this;
    }
}
