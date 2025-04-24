<?php

namespace horstoeko\invoicesuite\models\zugferd\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zugferd\udt\CodeType;
use horstoeko\invoicesuite\models\zugferd\udt\TextType;

class TradeContactType
{
    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("PersonName")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getPersonName", setter="setPersonName")
     */
    private $personName;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("DepartmentName")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getDepartmentName", setter="setDepartmentName")
     */
    private $departmentName;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\CodeType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\CodeType")
     * @JMS\Expose
     * @JMS\SerializedName("TypeCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getTypeCode", setter="setTypeCode")
     */
    private $codeType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\UniversalCommunicationType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\UniversalCommunicationType")
     * @JMS\Expose
     * @JMS\SerializedName("TelephoneUniversalCommunication")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getTelephoneUniversalCommunication", setter="setTelephoneUniversalCommunication")
     */
    private $telephoneUniversalCommunication;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\UniversalCommunicationType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\UniversalCommunicationType")
     * @JMS\Expose
     * @JMS\SerializedName("FaxUniversalCommunication")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getFaxUniversalCommunication", setter="setFaxUniversalCommunication")
     */
    private $faxUniversalCommunication;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\UniversalCommunicationType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\UniversalCommunicationType")
     * @JMS\Expose
     * @JMS\SerializedName("EmailURIUniversalCommunication")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getEmailURIUniversalCommunication", setter="setEmailURIUniversalCommunication")
     */
    private $emailURIUniversalCommunication;

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType|null
     */
    public function getPersonName(): ?\horstoeko\invoicesuite\models\zugferd\udt\TextType
    {
        return $this->personName;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType
     */
    public function getPersonNameWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\TextType
    {
        $this->personName = is_null($this->personName) ? new TextType() : $this->personName;

        return $this->personName;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @return self
     */
    public function setPersonName(\horstoeko\invoicesuite\models\zugferd\udt\TextType $textType): self
    {
        $this->personName = $textType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType|null
     */
    public function getDepartmentName(): ?\horstoeko\invoicesuite\models\zugferd\udt\TextType
    {
        return $this->departmentName;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType
     */
    public function getDepartmentNameWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\TextType
    {
        $this->departmentName = is_null($this->departmentName) ? new TextType() : $this->departmentName;

        return $this->departmentName;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @return self
     */
    public function setDepartmentName(\horstoeko\invoicesuite\models\zugferd\udt\TextType $textType): self
    {
        $this->departmentName = $textType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\CodeType|null
     */
    public function getTypeCode(): ?\horstoeko\invoicesuite\models\zugferd\udt\CodeType
    {
        return $this->codeType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\CodeType
     */
    public function getTypeCodeWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\CodeType
    {
        $this->codeType = is_null($this->codeType) ? new CodeType() : $this->codeType;

        return $this->codeType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\CodeType
     * @return self
     */
    public function setTypeCode(\horstoeko\invoicesuite\models\zugferd\udt\CodeType $codeType): self
    {
        $this->codeType = $codeType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\UniversalCommunicationType|null
     */
    public function getTelephoneUniversalCommunication(
    ): ?\horstoeko\invoicesuite\models\zugferd\ram\UniversalCommunicationType {
        return $this->telephoneUniversalCommunication;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\UniversalCommunicationType
     */
    public function getTelephoneUniversalCommunicationWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\ram\UniversalCommunicationType {
        $this->telephoneUniversalCommunication = is_null($this->telephoneUniversalCommunication) ? new UniversalCommunicationType() : $this->telephoneUniversalCommunication;

        return $this->telephoneUniversalCommunication;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\UniversalCommunicationType
     * @return self
     */
    public function setTelephoneUniversalCommunication(
        \horstoeko\invoicesuite\models\zugferd\ram\UniversalCommunicationType $universalCommunicationType,
    ): self {
        $this->telephoneUniversalCommunication = $universalCommunicationType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\UniversalCommunicationType|null
     */
    public function getFaxUniversalCommunication(
    ): ?\horstoeko\invoicesuite\models\zugferd\ram\UniversalCommunicationType {
        return $this->faxUniversalCommunication;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\UniversalCommunicationType
     */
    public function getFaxUniversalCommunicationWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\ram\UniversalCommunicationType {
        $this->faxUniversalCommunication = is_null($this->faxUniversalCommunication) ? new UniversalCommunicationType() : $this->faxUniversalCommunication;

        return $this->faxUniversalCommunication;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\UniversalCommunicationType
     * @return self
     */
    public function setFaxUniversalCommunication(
        \horstoeko\invoicesuite\models\zugferd\ram\UniversalCommunicationType $universalCommunicationType,
    ): self {
        $this->faxUniversalCommunication = $universalCommunicationType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\UniversalCommunicationType|null
     */
    public function getEmailURIUniversalCommunication(
    ): ?\horstoeko\invoicesuite\models\zugferd\ram\UniversalCommunicationType {
        return $this->emailURIUniversalCommunication;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\UniversalCommunicationType
     */
    public function getEmailURIUniversalCommunicationWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\ram\UniversalCommunicationType {
        $this->emailURIUniversalCommunication = is_null($this->emailURIUniversalCommunication) ? new UniversalCommunicationType() : $this->emailURIUniversalCommunication;

        return $this->emailURIUniversalCommunication;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\UniversalCommunicationType
     * @return self
     */
    public function setEmailURIUniversalCommunication(
        \horstoeko\invoicesuite\models\zugferd\ram\UniversalCommunicationType $universalCommunicationType,
    ): self {
        $this->emailURIUniversalCommunication = $universalCommunicationType;

        return $this;
    }
}
