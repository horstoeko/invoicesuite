<?php

namespace horstoeko\invoicesuite\models\zffx\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zffx\udt\CodeType;
use horstoeko\invoicesuite\models\zffx\udt\TextType;

class TradeContactType
{
    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\TextType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("PersonName")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getPersonName", setter="setPersonName")
     */
    private $personName;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\TextType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("DepartmentName")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getDepartmentName", setter="setDepartmentName")
     */
    private $departmentName;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\CodeType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\CodeType")
     * @JMS\Expose
     * @JMS\SerializedName("TypeCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getTypeCode", setter="setTypeCode")
     */
    private $codeType;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\UniversalCommunicationType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\UniversalCommunicationType")
     * @JMS\Expose
     * @JMS\SerializedName("TelephoneUniversalCommunication")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getTelephoneUniversalCommunication", setter="setTelephoneUniversalCommunication")
     */
    private $telephoneUniversalCommunication;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\UniversalCommunicationType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\UniversalCommunicationType")
     * @JMS\Expose
     * @JMS\SerializedName("FaxUniversalCommunication")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getFaxUniversalCommunication", setter="setFaxUniversalCommunication")
     */
    private $faxUniversalCommunication;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\UniversalCommunicationType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\UniversalCommunicationType")
     * @JMS\Expose
     * @JMS\SerializedName("EmailURIUniversalCommunication")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getEmailURIUniversalCommunication", setter="setEmailURIUniversalCommunication")
     */
    private $emailURIUniversalCommunication;

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\TextType|null
     */
    public function getPersonName(): ?TextType
    {
        return $this->personName;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\TextType
     */
    public function getPersonNameWithCreate(): TextType
    {
        $this->personName = is_null($this->personName) ? new TextType() : $this->personName;

        return $this->personName;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\TextType $textType
     * @return self
     */
    public function setPersonName(TextType $textType): self
    {
        $this->personName = $textType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\TextType|null
     */
    public function getDepartmentName(): ?TextType
    {
        return $this->departmentName;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\TextType
     */
    public function getDepartmentNameWithCreate(): TextType
    {
        $this->departmentName = is_null($this->departmentName) ? new TextType() : $this->departmentName;

        return $this->departmentName;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\TextType $textType
     * @return self
     */
    public function setDepartmentName(TextType $textType): self
    {
        $this->departmentName = $textType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\CodeType|null
     */
    public function getTypeCode(): ?CodeType
    {
        return $this->codeType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\CodeType
     */
    public function getTypeCodeWithCreate(): CodeType
    {
        $this->codeType = is_null($this->codeType) ? new CodeType() : $this->codeType;

        return $this->codeType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\CodeType $codeType
     * @return self
     */
    public function setTypeCode(CodeType $codeType): self
    {
        $this->codeType = $codeType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\UniversalCommunicationType|null
     */
    public function getTelephoneUniversalCommunication(): ?UniversalCommunicationType
    {
        return $this->telephoneUniversalCommunication;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\UniversalCommunicationType
     */
    public function getTelephoneUniversalCommunicationWithCreate(): UniversalCommunicationType
    {
        $this->telephoneUniversalCommunication = is_null($this->telephoneUniversalCommunication) ? new UniversalCommunicationType() : $this->telephoneUniversalCommunication;

        return $this->telephoneUniversalCommunication;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\UniversalCommunicationType $universalCommunicationType
     * @return self
     */
    public function setTelephoneUniversalCommunication(
        UniversalCommunicationType $universalCommunicationType,
    ): self {
        $this->telephoneUniversalCommunication = $universalCommunicationType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\UniversalCommunicationType|null
     */
    public function getFaxUniversalCommunication(): ?UniversalCommunicationType
    {
        return $this->faxUniversalCommunication;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\UniversalCommunicationType
     */
    public function getFaxUniversalCommunicationWithCreate(): UniversalCommunicationType
    {
        $this->faxUniversalCommunication = is_null($this->faxUniversalCommunication) ? new UniversalCommunicationType() : $this->faxUniversalCommunication;

        return $this->faxUniversalCommunication;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\UniversalCommunicationType $universalCommunicationType
     * @return self
     */
    public function setFaxUniversalCommunication(UniversalCommunicationType $universalCommunicationType): self
    {
        $this->faxUniversalCommunication = $universalCommunicationType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\UniversalCommunicationType|null
     */
    public function getEmailURIUniversalCommunication(): ?UniversalCommunicationType
    {
        return $this->emailURIUniversalCommunication;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\UniversalCommunicationType
     */
    public function getEmailURIUniversalCommunicationWithCreate(): UniversalCommunicationType
    {
        $this->emailURIUniversalCommunication = is_null($this->emailURIUniversalCommunication) ? new UniversalCommunicationType() : $this->emailURIUniversalCommunication;

        return $this->emailURIUniversalCommunication;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\UniversalCommunicationType $universalCommunicationType
     * @return self
     */
    public function setEmailURIUniversalCommunication(
        UniversalCommunicationType $universalCommunicationType,
    ): self {
        $this->emailURIUniversalCommunication = $universalCommunicationType;

        return $this;
    }
}
