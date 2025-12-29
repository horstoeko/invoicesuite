<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\EmbeddedDocumentBinaryObject;
use JMS\Serializer\Annotation as JMS;

class AttachmentType
{
    use HandlesObjectFlags;

    /**
     * @var null|EmbeddedDocumentBinaryObject
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\EmbeddedDocumentBinaryObject")
     * @JMS\Expose
     * @JMS\SerializedName("EmbeddedDocumentBinaryObject")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEmbeddedDocumentBinaryObject", setter="setEmbeddedDocumentBinaryObject")
     */
    private $embeddedDocumentBinaryObject;

    /**
     * @var null|ExternalReference
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\ExternalReference")
     * @JMS\Expose
     * @JMS\SerializedName("ExternalReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getExternalReference", setter="setExternalReference")
     */
    private $externalReference;

    /**
     * @return null|EmbeddedDocumentBinaryObject
     */
    public function getEmbeddedDocumentBinaryObject(): ?EmbeddedDocumentBinaryObject
    {
        return $this->embeddedDocumentBinaryObject;
    }

    /**
     * @return EmbeddedDocumentBinaryObject
     */
    public function getEmbeddedDocumentBinaryObjectWithCreate(): EmbeddedDocumentBinaryObject
    {
        $this->embeddedDocumentBinaryObject = is_null($this->embeddedDocumentBinaryObject) ? new EmbeddedDocumentBinaryObject() : $this->embeddedDocumentBinaryObject;

        return $this->embeddedDocumentBinaryObject;
    }

    /**
     * @param  null|EmbeddedDocumentBinaryObject $embeddedDocumentBinaryObject
     * @return static
     */
    public function setEmbeddedDocumentBinaryObject(
        ?EmbeddedDocumentBinaryObject $embeddedDocumentBinaryObject = null,
    ): static {
        $this->embeddedDocumentBinaryObject = $embeddedDocumentBinaryObject;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetEmbeddedDocumentBinaryObject(): static
    {
        $this->embeddedDocumentBinaryObject = null;

        return $this;
    }

    /**
     * @return null|ExternalReference
     */
    public function getExternalReference(): ?ExternalReference
    {
        return $this->externalReference;
    }

    /**
     * @return ExternalReference
     */
    public function getExternalReferenceWithCreate(): ExternalReference
    {
        $this->externalReference = is_null($this->externalReference) ? new ExternalReference() : $this->externalReference;

        return $this->externalReference;
    }

    /**
     * @param  null|ExternalReference $externalReference
     * @return static
     */
    public function setExternalReference(?ExternalReference $externalReference = null): static
    {
        $this->externalReference = $externalReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetExternalReference(): static
    {
        $this->externalReference = null;

        return $this;
    }
}
