<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LineID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LineStatusCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\UUID;
use JMS\Serializer\Annotation as JMS;

class LineReferenceType
{
    use HandlesObjectFlags;

    /**
     * @var null|LineID
     */
    #[JMS\Accessor(getter: 'getLineID', setter: 'setLineID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('LineID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LineID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $lineID;

    /**
     * @var null|UUID
     */
    #[JMS\Accessor(getter: 'getUUID', setter: 'setUUID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('UUID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\UUID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $uUID;

    /**
     * @var null|LineStatusCode
     */
    #[JMS\Accessor(getter: 'getLineStatusCode', setter: 'setLineStatusCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('LineStatusCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LineStatusCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $lineStatusCode;

    /**
     * @var null|DocumentReference
     */
    #[JMS\Accessor(getter: 'getDocumentReference', setter: 'setDocumentReference')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('DocumentReference')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\DocumentReference')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $documentReference;

    /**
     * @return null|LineID
     */
    public function getLineID(): ?LineID
    {
        return $this->lineID;
    }

    /**
     * @return LineID
     */
    public function getLineIDWithCreate(): LineID
    {
        $this->lineID ??= new LineID();

        return $this->lineID;
    }

    /**
     * @param  null|LineID $lineID
     * @return static
     */
    public function setLineID(
        ?LineID $lineID = null
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
     * @return null|UUID
     */
    public function getUUID(): ?UUID
    {
        return $this->uUID;
    }

    /**
     * @return UUID
     */
    public function getUUIDWithCreate(): UUID
    {
        $this->uUID ??= new UUID();

        return $this->uUID;
    }

    /**
     * @param  null|UUID $uUID
     * @return static
     */
    public function setUUID(
        ?UUID $uUID = null
    ): static {
        $this->uUID = $uUID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetUUID(): static
    {
        $this->uUID = null;

        return $this;
    }

    /**
     * @return null|LineStatusCode
     */
    public function getLineStatusCode(): ?LineStatusCode
    {
        return $this->lineStatusCode;
    }

    /**
     * @return LineStatusCode
     */
    public function getLineStatusCodeWithCreate(): LineStatusCode
    {
        $this->lineStatusCode ??= new LineStatusCode();

        return $this->lineStatusCode;
    }

    /**
     * @param  null|LineStatusCode $lineStatusCode
     * @return static
     */
    public function setLineStatusCode(
        ?LineStatusCode $lineStatusCode = null
    ): static {
        $this->lineStatusCode = $lineStatusCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLineStatusCode(): static
    {
        $this->lineStatusCode = null;

        return $this;
    }

    /**
     * @return null|DocumentReference
     */
    public function getDocumentReference(): ?DocumentReference
    {
        return $this->documentReference;
    }

    /**
     * @return DocumentReference
     */
    public function getDocumentReferenceWithCreate(): DocumentReference
    {
        $this->documentReference ??= new DocumentReference();

        return $this->documentReference;
    }

    /**
     * @param  null|DocumentReference $documentReference
     * @return static
     */
    public function setDocumentReference(
        ?DocumentReference $documentReference = null
    ): static {
        $this->documentReference = $documentReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDocumentReference(): static
    {
        $this->documentReference = null;

        return $this;
    }
}
