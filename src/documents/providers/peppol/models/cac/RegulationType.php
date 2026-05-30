<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LegalReference;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Name;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\OntologyURI;
use JMS\Serializer\Annotation as JMS;

class RegulationType
{
    use HandlesObjectFlags;

    /**
     * @var null|Name
     */
    #[JMS\Accessor(getter: 'getName', setter: 'setName')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Name')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Name')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $name;

    /**
     * @var null|LegalReference
     */
    #[JMS\Accessor(getter: 'getLegalReference', setter: 'setLegalReference')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('LegalReference')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LegalReference')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $legalReference;

    /**
     * @var null|OntologyURI
     */
    #[JMS\Accessor(getter: 'getOntologyURI', setter: 'setOntologyURI')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('OntologyURI')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\OntologyURI')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $ontologyURI;

    /**
     * @return null|Name
     */
    public function getName(): ?Name
    {
        return $this->name;
    }

    /**
     * @return Name
     */
    public function getNameWithCreate(): Name
    {
        $this->name ??= new Name();

        return $this->name;
    }

    /**
     * @param  null|Name $name
     * @return static
     */
    public function setName(
        ?Name $name = null
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
     * @return null|LegalReference
     */
    public function getLegalReference(): ?LegalReference
    {
        return $this->legalReference;
    }

    /**
     * @return LegalReference
     */
    public function getLegalReferenceWithCreate(): LegalReference
    {
        $this->legalReference ??= new LegalReference();

        return $this->legalReference;
    }

    /**
     * @param  null|LegalReference $legalReference
     * @return static
     */
    public function setLegalReference(
        ?LegalReference $legalReference = null
    ): static {
        $this->legalReference = $legalReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLegalReference(): static
    {
        $this->legalReference = null;

        return $this;
    }

    /**
     * @return null|OntologyURI
     */
    public function getOntologyURI(): ?OntologyURI
    {
        return $this->ontologyURI;
    }

    /**
     * @return OntologyURI
     */
    public function getOntologyURIWithCreate(): OntologyURI
    {
        $this->ontologyURI ??= new OntologyURI();

        return $this->ontologyURI;
    }

    /**
     * @param  null|OntologyURI $ontologyURI
     * @return static
     */
    public function setOntologyURI(
        ?OntologyURI $ontologyURI = null
    ): static {
        $this->ontologyURI = $ontologyURI;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetOntologyURI(): static
    {
        $this->ontologyURI = null;

        return $this;
    }
}
