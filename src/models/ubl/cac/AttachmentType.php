<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\EmbeddedDocumentBinaryObject;

class AttachmentType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\EmbeddedDocumentBinaryObject|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\EmbeddedDocumentBinaryObject")
     * @JMS\Expose
     * @JMS\SerializedName("EmbeddedDocumentBinaryObject")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEmbeddedDocumentBinaryObject", setter="setEmbeddedDocumentBinaryObject")
     */
    private $embeddedDocumentBinaryObject;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\ExternalReference|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\ExternalReference")
     * @JMS\Expose
     * @JMS\SerializedName("ExternalReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getExternalReference", setter="setExternalReference")
     */
    private $externalReference;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\EmbeddedDocumentBinaryObject|null
     */
    public function getEmbeddedDocumentBinaryObject(): ?EmbeddedDocumentBinaryObject
    {
        return $this->embeddedDocumentBinaryObject;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\EmbeddedDocumentBinaryObject
     */
    public function getEmbeddedDocumentBinaryObjectWithCreate(): EmbeddedDocumentBinaryObject
    {
        $this->embeddedDocumentBinaryObject = is_null($this->embeddedDocumentBinaryObject) ? new EmbeddedDocumentBinaryObject() : $this->embeddedDocumentBinaryObject;

        return $this->embeddedDocumentBinaryObject;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\EmbeddedDocumentBinaryObject|null $embeddedDocumentBinaryObject
     * @return self
     */
    public function setEmbeddedDocumentBinaryObject(
        ?EmbeddedDocumentBinaryObject $embeddedDocumentBinaryObject = null,
    ): self {
        $this->embeddedDocumentBinaryObject = $embeddedDocumentBinaryObject;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetEmbeddedDocumentBinaryObject(): self
    {
        $this->embeddedDocumentBinaryObject = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ExternalReference|null
     */
    public function getExternalReference(): ?ExternalReference
    {
        return $this->externalReference;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ExternalReference
     */
    public function getExternalReferenceWithCreate(): ExternalReference
    {
        $this->externalReference = is_null($this->externalReference) ? new ExternalReference() : $this->externalReference;

        return $this->externalReference;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ExternalReference|null $externalReference
     * @return self
     */
    public function setExternalReference(?ExternalReference $externalReference = null): self
    {
        $this->externalReference = $externalReference;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetExternalReference(): self
    {
        $this->externalReference = null;

        return $this;
    }
}
