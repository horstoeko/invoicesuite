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
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("IssuerAssignedID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getIssuerAssignedID", setter="setIssuerAssignedID")
     */
    private $issuerAssignedID;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\IDType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("URIID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getURIID", setter="setURIID")
     */
    private $uRIID;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\IDType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("LineID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getLineID", setter="setLineID")
     */
    private $lineID;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\qdt\DocumentCodeType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\qdt\DocumentCodeType")
     * @JMS\Expose
     * @JMS\SerializedName("TypeCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getTypeCode", setter="setTypeCode")
     */
    private $documentCodeType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("Name")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getName", setter="setName")
     */
    private $textType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\BinaryObjectType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\BinaryObjectType")
     * @JMS\Expose
     * @JMS\SerializedName("AttachmentBinaryObject")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getAttachmentBinaryObject", setter="setAttachmentBinaryObject")
     */
    private $binaryObjectType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\qdt\ReferenceCodeType
     * @JMS\Groups({"zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\qdt\ReferenceCodeType")
     * @JMS\Expose
     * @JMS\SerializedName("ReferenceTypeCode")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getReferenceTypeCode", setter="setReferenceTypeCode")
     */
    private $referenceCodeType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\qdt\FormattedDateTimeType
     * @JMS\Groups({"zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\qdt\FormattedDateTimeType")
     * @JMS\Expose
     * @JMS\SerializedName("FormattedIssueDateTime")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getFormattedIssueDateTime", setter="setFormattedIssueDateTime")
     */
    private $formattedDateTimeType;

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IDType|null
     */
    public function getIssuerAssignedID(): ?\horstoeko\invoicesuite\models\zugferd\udt\IDType
    {
        return $this->issuerAssignedID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IDType
     */
    public function getIssuerAssignedIDWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\IDType
    {
        $this->issuerAssignedID = is_null($this->issuerAssignedID) ? new IDType() : $this->issuerAssignedID;

        return $this->issuerAssignedID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\IDType
     * @return self
     */
    public function setIssuerAssignedID(\horstoeko\invoicesuite\models\zugferd\udt\IDType $idType): self
    {
        $this->issuerAssignedID = $idType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IDType|null
     */
    public function getURIID(): ?\horstoeko\invoicesuite\models\zugferd\udt\IDType
    {
        return $this->uRIID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IDType
     */
    public function getURIIDWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\IDType
    {
        $this->uRIID = is_null($this->uRIID) ? new IDType() : $this->uRIID;

        return $this->uRIID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\IDType
     * @return self
     */
    public function setURIID(\horstoeko\invoicesuite\models\zugferd\udt\IDType $idType): self
    {
        $this->uRIID = $idType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IDType|null
     */
    public function getLineID(): ?\horstoeko\invoicesuite\models\zugferd\udt\IDType
    {
        return $this->lineID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IDType
     */
    public function getLineIDWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\IDType
    {
        $this->lineID = is_null($this->lineID) ? new IDType() : $this->lineID;

        return $this->lineID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\IDType
     * @return self
     */
    public function setLineID(\horstoeko\invoicesuite\models\zugferd\udt\IDType $idType): self
    {
        $this->lineID = $idType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\DocumentCodeType|null
     */
    public function getTypeCode(): ?\horstoeko\invoicesuite\models\zugferd\qdt\DocumentCodeType
    {
        return $this->documentCodeType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\DocumentCodeType
     */
    public function getTypeCodeWithCreate(): \horstoeko\invoicesuite\models\zugferd\qdt\DocumentCodeType
    {
        $this->documentCodeType = is_null($this->documentCodeType) ? new DocumentCodeType() : $this->documentCodeType;

        return $this->documentCodeType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\qdt\DocumentCodeType
     * @return self
     */
    public function setTypeCode(\horstoeko\invoicesuite\models\zugferd\qdt\DocumentCodeType $documentCodeType): self
    {
        $this->documentCodeType = $documentCodeType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType|null
     */
    public function getName(): ?\horstoeko\invoicesuite\models\zugferd\udt\TextType
    {
        return $this->textType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\TextType
     */
    public function getNameWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\TextType
    {
        $this->textType = is_null($this->textType) ? new TextType() : $this->textType;

        return $this->textType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\TextType
     * @return self
     */
    public function setName(\horstoeko\invoicesuite\models\zugferd\udt\TextType $textType): self
    {
        $this->textType = $textType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\BinaryObjectType|null
     */
    public function getAttachmentBinaryObject(): ?\horstoeko\invoicesuite\models\zugferd\udt\BinaryObjectType
    {
        return $this->binaryObjectType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\BinaryObjectType
     */
    public function getAttachmentBinaryObjectWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\BinaryObjectType
    {
        $this->binaryObjectType = is_null($this->binaryObjectType) ? new BinaryObjectType() : $this->binaryObjectType;

        return $this->binaryObjectType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\BinaryObjectType
     * @return self
     */
    public function setAttachmentBinaryObject(
        \horstoeko\invoicesuite\models\zugferd\udt\BinaryObjectType $binaryObjectType,
    ): self {
        $this->binaryObjectType = $binaryObjectType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\ReferenceCodeType|null
     */
    public function getReferenceTypeCode(): ?\horstoeko\invoicesuite\models\zugferd\qdt\ReferenceCodeType
    {
        return $this->referenceCodeType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\ReferenceCodeType
     */
    public function getReferenceTypeCodeWithCreate(): \horstoeko\invoicesuite\models\zugferd\qdt\ReferenceCodeType
    {
        $this->referenceCodeType = is_null($this->referenceCodeType) ? new ReferenceCodeType() : $this->referenceCodeType;

        return $this->referenceCodeType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\qdt\ReferenceCodeType
     * @return self
     */
    public function setReferenceTypeCode(
        \horstoeko\invoicesuite\models\zugferd\qdt\ReferenceCodeType $referenceCodeType,
    ): self {
        $this->referenceCodeType = $referenceCodeType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\FormattedDateTimeType|null
     */
    public function getFormattedIssueDateTime(): ?\horstoeko\invoicesuite\models\zugferd\qdt\FormattedDateTimeType
    {
        return $this->formattedDateTimeType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\qdt\FormattedDateTimeType
     */
    public function getFormattedIssueDateTimeWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\qdt\FormattedDateTimeType {
        $this->formattedDateTimeType = is_null($this->formattedDateTimeType) ? new FormattedDateTimeType() : $this->formattedDateTimeType;

        return $this->formattedDateTimeType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\qdt\FormattedDateTimeType
     * @return self
     */
    public function setFormattedIssueDateTime(
        \horstoeko\invoicesuite\models\zugferd\qdt\FormattedDateTimeType $formattedDateTimeType,
    ): self {
        $this->formattedDateTimeType = $formattedDateTimeType;

        return $this;
    }
}
