<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\zffx\models\ram;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\zffx\models\qdt\DocumentCodeType;
use horstoeko\invoicesuite\documents\providers\zffx\models\qdt\FormattedDateTimeType;
use horstoeko\invoicesuite\documents\providers\zffx\models\qdt\ReferenceCodeType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\BinaryObjectType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\IDType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\TextType;
use JMS\Serializer\Annotation as JMS;

class ReferencedDocumentType
{
    use HandlesObjectFlags;

    /**
     * @var null|IDType
     */
    #[JMS\Accessor(getter: 'getIssuerAssignedID', setter: 'setIssuerAssignedID')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('IssuerAssignedID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\IDType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $issuerAssignedID;

    /**
     * @var null|IDType
     */
    #[JMS\Accessor(getter: 'getURIID', setter: 'setURIID')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('URIID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\IDType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $uRIID;

    /**
     * @var null|IDType
     */
    #[JMS\Accessor(getter: 'getLineID', setter: 'setLineID')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('LineID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\IDType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $lineID;

    /**
     * @var null|DocumentCodeType
     */
    #[JMS\Accessor(getter: 'getTypeCode', setter: 'setTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('TypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\qdt\DocumentCodeType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $typeCode;

    /**
     * @var null|TextType
     */
    #[JMS\Accessor(getter: 'getName', setter: 'setName')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('Name')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\TextType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $name;

    /**
     * @var null|BinaryObjectType
     */
    #[JMS\Accessor(getter: 'getAttachmentBinaryObject', setter: 'setAttachmentBinaryObject')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('AttachmentBinaryObject')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\BinaryObjectType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $attachmentBinaryObject;

    /**
     * @var null|ReferenceCodeType
     */
    #[JMS\Accessor(getter: 'getReferenceTypeCode', setter: 'setReferenceTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('ReferenceTypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\qdt\ReferenceCodeType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $referenceTypeCode;

    /**
     * @var null|FormattedDateTimeType
     */
    #[JMS\Accessor(getter: 'getFormattedIssueDateTime', setter: 'setFormattedIssueDateTime')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('FormattedIssueDateTime')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\qdt\FormattedDateTimeType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $formattedIssueDateTime;

    /**
     * @return null|IDType
     */
    public function getIssuerAssignedID(): ?IDType
    {
        return $this->issuerAssignedID;
    }

    /**
     * @return IDType
     */
    public function getIssuerAssignedIDWithCreate(): IDType
    {
        $this->issuerAssignedID ??= new IDType();

        return $this->issuerAssignedID;
    }

    /**
     * @param  null|IDType $issuerAssignedID
     * @return static
     */
    public function setIssuerAssignedID(
        ?IDType $issuerAssignedID = null
    ): static {
        $this->issuerAssignedID = $issuerAssignedID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetIssuerAssignedID(): static
    {
        $this->issuerAssignedID = null;

        return $this;
    }

    /**
     * @return null|IDType
     */
    public function getURIID(): ?IDType
    {
        return $this->uRIID;
    }

    /**
     * @return IDType
     */
    public function getURIIDWithCreate(): IDType
    {
        $this->uRIID ??= new IDType();

        return $this->uRIID;
    }

    /**
     * @param  null|IDType $uRIID
     * @return static
     */
    public function setURIID(
        ?IDType $uRIID = null
    ): static {
        $this->uRIID = $uRIID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetURIID(): static
    {
        $this->uRIID = null;

        return $this;
    }

    /**
     * @return null|IDType
     */
    public function getLineID(): ?IDType
    {
        return $this->lineID;
    }

    /**
     * @return IDType
     */
    public function getLineIDWithCreate(): IDType
    {
        $this->lineID ??= new IDType();

        return $this->lineID;
    }

    /**
     * @param  null|IDType $lineID
     * @return static
     */
    public function setLineID(
        ?IDType $lineID = null
    ): static {
        $this->lineID = $lineID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLineID(): static
    {
        $this->lineID = null;

        return $this;
    }

    /**
     * @return null|DocumentCodeType
     */
    public function getTypeCode(): ?DocumentCodeType
    {
        return $this->typeCode;
    }

    /**
     * @return DocumentCodeType
     */
    public function getTypeCodeWithCreate(): DocumentCodeType
    {
        $this->typeCode ??= new DocumentCodeType();

        return $this->typeCode;
    }

    /**
     * @param  null|DocumentCodeType $typeCode
     * @return static
     */
    public function setTypeCode(
        ?DocumentCodeType $typeCode = null
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
     * @return null|TextType
     */
    public function getName(): ?TextType
    {
        return $this->name;
    }

    /**
     * @return TextType
     */
    public function getNameWithCreate(): TextType
    {
        $this->name ??= new TextType();

        return $this->name;
    }

    /**
     * @param  null|TextType $name
     * @return static
     */
    public function setName(
        ?TextType $name = null
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
     * @return null|BinaryObjectType
     */
    public function getAttachmentBinaryObject(): ?BinaryObjectType
    {
        return $this->attachmentBinaryObject;
    }

    /**
     * @return BinaryObjectType
     */
    public function getAttachmentBinaryObjectWithCreate(): BinaryObjectType
    {
        $this->attachmentBinaryObject ??= new BinaryObjectType();

        return $this->attachmentBinaryObject;
    }

    /**
     * @param  null|BinaryObjectType $attachmentBinaryObject
     * @return static
     */
    public function setAttachmentBinaryObject(
        ?BinaryObjectType $attachmentBinaryObject = null
    ): static {
        $this->attachmentBinaryObject = $attachmentBinaryObject;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAttachmentBinaryObject(): static
    {
        $this->attachmentBinaryObject = null;

        return $this;
    }

    /**
     * @return null|ReferenceCodeType
     */
    public function getReferenceTypeCode(): ?ReferenceCodeType
    {
        return $this->referenceTypeCode;
    }

    /**
     * @return ReferenceCodeType
     */
    public function getReferenceTypeCodeWithCreate(): ReferenceCodeType
    {
        $this->referenceTypeCode ??= new ReferenceCodeType();

        return $this->referenceTypeCode;
    }

    /**
     * @param  null|ReferenceCodeType $referenceTypeCode
     * @return static
     */
    public function setReferenceTypeCode(
        ?ReferenceCodeType $referenceTypeCode = null
    ): static {
        $this->referenceTypeCode = $referenceTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetReferenceTypeCode(): static
    {
        $this->referenceTypeCode = null;

        return $this;
    }

    /**
     * @return null|FormattedDateTimeType
     */
    public function getFormattedIssueDateTime(): ?FormattedDateTimeType
    {
        return $this->formattedIssueDateTime;
    }

    /**
     * @return FormattedDateTimeType
     */
    public function getFormattedIssueDateTimeWithCreate(): FormattedDateTimeType
    {
        $this->formattedIssueDateTime ??= new FormattedDateTimeType();

        return $this->formattedIssueDateTime;
    }

    /**
     * @param  null|FormattedDateTimeType $formattedIssueDateTime
     * @return static
     */
    public function setFormattedIssueDateTime(
        ?FormattedDateTimeType $formattedIssueDateTime = null
    ): static {
        $this->formattedIssueDateTime = $formattedIssueDateTime;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetFormattedIssueDateTime(): static
    {
        $this->formattedIssueDateTime = null;

        return $this;
    }
}
