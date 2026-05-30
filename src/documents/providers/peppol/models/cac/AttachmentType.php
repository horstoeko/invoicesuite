<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\EmbeddedDocumentBinaryObject;
use JMS\Serializer\Annotation as JMS;

class AttachmentType
{
    use HandlesObjectFlags;

    /**
     * @var null|EmbeddedDocumentBinaryObject
     */
    #[JMS\Accessor(getter: 'getEmbeddedDocumentBinaryObject', setter: 'setEmbeddedDocumentBinaryObject')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('EmbeddedDocumentBinaryObject')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\EmbeddedDocumentBinaryObject')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $embeddedDocumentBinaryObject;

    /**
     * @var null|ExternalReference
     */
    #[JMS\Accessor(getter: 'getExternalReference', setter: 'setExternalReference')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ExternalReference')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\ExternalReference')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
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
        $this->embeddedDocumentBinaryObject ??= new EmbeddedDocumentBinaryObject();

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
        $this->externalReference ??= new ExternalReference();

        return $this->externalReference;
    }

    /**
     * @param  null|ExternalReference $externalReference
     * @return static
     */
    public function setExternalReference(
        ?ExternalReference $externalReference = null
    ): static {
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
