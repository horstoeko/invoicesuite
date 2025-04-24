<?php

namespace horstoeko\invoicesuite\models\zugferd\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zugferd\qdt\DocumentCodeType;
use horstoeko\invoicesuite\models\zugferd\qdt\FormattedDateTimeType;
use horstoeko\invoicesuite\models\zugferd\qdt\ReferenceCodeType;
use horstoeko\invoicesuite\models\zugferd\udt\BinaryObjectType;
use horstoeko\invoicesuite\models\zugferd\udt\IDType;
use horstoeko\invoicesuite\models\zugferd\udt\TextType;

class ReferencedDocumentType
{
    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\IDType
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("IssuerAssignedID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getIssuerAssignedID", setter="setIssuerAssignedID")
     */
    private $issuerAssignedID;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\IDType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("URIID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getURIID", setter="setURIID")
     */
    private $uRIID;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\IDType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("LineID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getLineID", setter="setLineID")
     */
    private $lineID;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\qdt\DocumentCodeType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\qdt\DocumentCodeType")
     * @JMS\Expose
     * @JMS\SerializedName("TypeCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getTypeCode", setter="setTypeCode")
     */
    private $typeCode;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("Name")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getName", setter="setName")
     */
    private $name;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\BinaryObjectType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\BinaryObjectType")
     * @JMS\Expose
     * @JMS\SerializedName("AttachmentBinaryObject")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getAttachmentBinaryObject", setter="setAttachmentBinaryObject")
     */
    private $attachmentBinaryObject;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\qdt\ReferenceCodeType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\qdt\ReferenceCodeType")
     * @JMS\Expose
     * @JMS\SerializedName("ReferenceTypeCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getReferenceTypeCode", setter="setReferenceTypeCode")
     */
    private $referenceTypeCode;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\qdt\FormattedDateTimeType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\qdt\FormattedDateTimeType")
     * @JMS\Expose
     * @JMS\SerializedName("FormattedIssueDateTime")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getFormattedIssueDateTime", setter="setFormattedIssueDateTime")
     */
    private $formattedIssueDateTime;

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IDType|null
     */
    public function getIssuerAssignedID(): ?IDType
    {
        return $this->issuerAssignedID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IDType
     */
    public function getIssuerAssignedIDWithCreate(): IDType
    {
        $this->issuerAssignedID = is_null($this->issuerAssignedID) ? new IDType() : $this->issuerAssignedID;

        return $this->issuerAssignedID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\IDType $issuerAssignedID
     * @return self
     */
    public function setIssuerAssignedID(IDType $issuerAssignedID): self
    {
        $this->issuerAssignedID = $issuerAssignedID;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IDType|null
     */
    public function getURIID(): ?IDType
    {
        return $this->uRIID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IDType
     */
    public function getURIIDWithCreate(): IDType
    {
        $this->uRIID = is_null($this->uRIID) ? new IDType() : $this->uRIID;

        return $this->uRIID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\IDType $uRIID
     * @return self
     */
    public function setURIID(IDType $uRIID): self
    {
        $this->uRIID = $uRIID;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IDType|null
     */
    public function getLineID(): ?IDType
    {
        return $this->lineID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IDType
     */
    public function getLineIDWithCreate(): IDType
    {
        $this->lineID = is_null($this->lineID) ? new IDType() : $this->lineID;

        return $this->lineID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\IDType $lineID
     * @return self
     */
    public function setLineID(IDType $lineID): self
    {
        $this->lineID = $lineID;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\DocumentCodeType|null
     */
    public function getTypeCode(): ?DocumentCodeType
    {
        return $this->typeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\DocumentCodeType
     */
    public function getTypeCodeWithCreate(): DocumentCodeType
    {
        $this->typeCode = is_null($this->typeCode) ? new DocumentCodeType() : $this->typeCode;

        return $this->typeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\qdt\DocumentCodeType $typeCode
     * @return self
     */
    public function setTypeCode(DocumentCodeType $typeCode): self
    {
        $this->typeCode = $typeCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType|null
     */
    public function getName(): ?TextType
    {
        return $this->name;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType
     */
    public function getNameWithCreate(): TextType
    {
        $this->name = is_null($this->name) ? new TextType() : $this->name;

        return $this->name;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\TextType $name
     * @return self
     */
    public function setName(TextType $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\BinaryObjectType|null
     */
    public function getAttachmentBinaryObject(): ?BinaryObjectType
    {
        return $this->attachmentBinaryObject;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\BinaryObjectType
     */
    public function getAttachmentBinaryObjectWithCreate(): BinaryObjectType
    {
        $this->attachmentBinaryObject = is_null($this->attachmentBinaryObject) ? new BinaryObjectType() : $this->attachmentBinaryObject;

        return $this->attachmentBinaryObject;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\BinaryObjectType $attachmentBinaryObject
     * @return self
     */
    public function setAttachmentBinaryObject(BinaryObjectType $attachmentBinaryObject): self
    {
        $this->attachmentBinaryObject = $attachmentBinaryObject;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\ReferenceCodeType|null
     */
    public function getReferenceTypeCode(): ?ReferenceCodeType
    {
        return $this->referenceTypeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\ReferenceCodeType
     */
    public function getReferenceTypeCodeWithCreate(): ReferenceCodeType
    {
        $this->referenceTypeCode = is_null($this->referenceTypeCode) ? new ReferenceCodeType() : $this->referenceTypeCode;

        return $this->referenceTypeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\qdt\ReferenceCodeType $referenceTypeCode
     * @return self
     */
    public function setReferenceTypeCode(ReferenceCodeType $referenceTypeCode): self
    {
        $this->referenceTypeCode = $referenceTypeCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\FormattedDateTimeType|null
     */
    public function getFormattedIssueDateTime(): ?FormattedDateTimeType
    {
        return $this->formattedIssueDateTime;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\FormattedDateTimeType
     */
    public function getFormattedIssueDateTimeWithCreate(): FormattedDateTimeType
    {
        $this->formattedIssueDateTime = is_null($this->formattedIssueDateTime) ? new FormattedDateTimeType() : $this->formattedIssueDateTime;

        return $this->formattedIssueDateTime;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\qdt\FormattedDateTimeType $formattedIssueDateTime
     * @return self
     */
    public function setFormattedIssueDateTime(FormattedDateTimeType $formattedIssueDateTime): self
    {
        $this->formattedIssueDateTime = $formattedIssueDateTime;

        return $this;
    }
}
