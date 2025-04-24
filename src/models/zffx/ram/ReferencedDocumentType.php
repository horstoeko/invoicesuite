<?php

namespace horstoeko\invoicesuite\models\zffx\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zffx\qdt\DocumentCodeType;
use horstoeko\invoicesuite\models\zffx\qdt\FormattedDateTimeType;
use horstoeko\invoicesuite\models\zffx\qdt\ReferenceCodeType;
use horstoeko\invoicesuite\models\zffx\udt\BinaryObjectType;
use horstoeko\invoicesuite\models\zffx\udt\IDType;
use horstoeko\invoicesuite\models\zffx\udt\TextType;

class ReferencedDocumentType
{
    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\IDType
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("IssuerAssignedID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getIssuerAssignedID", setter="setIssuerAssignedID")
     */
    private $issuerAssignedID;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\IDType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("URIID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getURIID", setter="setURIID")
     */
    private $uRIID;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\IDType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("LineID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getLineID", setter="setLineID")
     */
    private $lineID;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\qdt\DocumentCodeType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\qdt\DocumentCodeType")
     * @JMS\Expose
     * @JMS\SerializedName("TypeCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getTypeCode", setter="setTypeCode")
     */
    private $documentCodeType;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\TextType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("Name")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getName", setter="setName")
     */
    private $textType;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\BinaryObjectType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\BinaryObjectType")
     * @JMS\Expose
     * @JMS\SerializedName("AttachmentBinaryObject")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getAttachmentBinaryObject", setter="setAttachmentBinaryObject")
     */
    private $binaryObjectType;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\qdt\ReferenceCodeType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\qdt\ReferenceCodeType")
     * @JMS\Expose
     * @JMS\SerializedName("ReferenceTypeCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getReferenceTypeCode", setter="setReferenceTypeCode")
     */
    private $referenceCodeType;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\qdt\FormattedDateTimeType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\qdt\FormattedDateTimeType")
     * @JMS\Expose
     * @JMS\SerializedName("FormattedIssueDateTime")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getFormattedIssueDateTime", setter="setFormattedIssueDateTime")
     */
    private $formattedDateTimeType;

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\IDType|null
     */
    public function getIssuerAssignedID(): ?IDType
    {
        return $this->issuerAssignedID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\IDType
     */
    public function getIssuerAssignedIDWithCreate(): IDType
    {
        $this->issuerAssignedID = is_null($this->issuerAssignedID) ? new IDType() : $this->issuerAssignedID;

        return $this->issuerAssignedID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\IDType $idType
     * @return self
     */
    public function setIssuerAssignedID(IDType $idType): self
    {
        $this->issuerAssignedID = $idType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\IDType|null
     */
    public function getURIID(): ?IDType
    {
        return $this->uRIID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\IDType
     */
    public function getURIIDWithCreate(): IDType
    {
        $this->uRIID = is_null($this->uRIID) ? new IDType() : $this->uRIID;

        return $this->uRIID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\IDType $idType
     * @return self
     */
    public function setURIID(IDType $idType): self
    {
        $this->uRIID = $idType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\IDType|null
     */
    public function getLineID(): ?IDType
    {
        return $this->lineID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\IDType
     */
    public function getLineIDWithCreate(): IDType
    {
        $this->lineID = is_null($this->lineID) ? new IDType() : $this->lineID;

        return $this->lineID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\IDType $idType
     * @return self
     */
    public function setLineID(IDType $idType): self
    {
        $this->lineID = $idType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\qdt\DocumentCodeType|null
     */
    public function getTypeCode(): ?DocumentCodeType
    {
        return $this->documentCodeType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\qdt\DocumentCodeType
     */
    public function getTypeCodeWithCreate(): DocumentCodeType
    {
        $this->documentCodeType = is_null($this->documentCodeType) ? new DocumentCodeType() : $this->documentCodeType;

        return $this->documentCodeType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\qdt\DocumentCodeType $documentCodeType
     * @return self
     */
    public function setTypeCode(DocumentCodeType $documentCodeType): self
    {
        $this->documentCodeType = $documentCodeType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\TextType|null
     */
    public function getName(): ?TextType
    {
        return $this->textType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\TextType
     */
    public function getNameWithCreate(): TextType
    {
        $this->textType = is_null($this->textType) ? new TextType() : $this->textType;

        return $this->textType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\TextType $textType
     * @return self
     */
    public function setName(TextType $textType): self
    {
        $this->textType = $textType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\BinaryObjectType|null
     */
    public function getAttachmentBinaryObject(): ?BinaryObjectType
    {
        return $this->binaryObjectType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\BinaryObjectType
     */
    public function getAttachmentBinaryObjectWithCreate(): BinaryObjectType
    {
        $this->binaryObjectType = is_null($this->binaryObjectType) ? new BinaryObjectType() : $this->binaryObjectType;

        return $this->binaryObjectType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\BinaryObjectType $binaryObjectType
     * @return self
     */
    public function setAttachmentBinaryObject(BinaryObjectType $binaryObjectType): self
    {
        $this->binaryObjectType = $binaryObjectType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\qdt\ReferenceCodeType|null
     */
    public function getReferenceTypeCode(): ?ReferenceCodeType
    {
        return $this->referenceCodeType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\qdt\ReferenceCodeType
     */
    public function getReferenceTypeCodeWithCreate(): ReferenceCodeType
    {
        $this->referenceCodeType = is_null($this->referenceCodeType) ? new ReferenceCodeType() : $this->referenceCodeType;

        return $this->referenceCodeType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\qdt\ReferenceCodeType $referenceCodeType
     * @return self
     */
    public function setReferenceTypeCode(ReferenceCodeType $referenceCodeType): self
    {
        $this->referenceCodeType = $referenceCodeType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\qdt\FormattedDateTimeType|null
     */
    public function getFormattedIssueDateTime(): ?FormattedDateTimeType
    {
        return $this->formattedDateTimeType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\qdt\FormattedDateTimeType
     */
    public function getFormattedIssueDateTimeWithCreate(): FormattedDateTimeType
    {
        $this->formattedDateTimeType = is_null($this->formattedDateTimeType) ? new FormattedDateTimeType() : $this->formattedDateTimeType;

        return $this->formattedDateTimeType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\qdt\FormattedDateTimeType $formattedDateTimeType
     * @return self
     */
    public function setFormattedIssueDateTime(FormattedDateTimeType $formattedDateTimeType): self
    {
        $this->formattedDateTimeType = $formattedDateTimeType;

        return $this;
    }
}
