<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\LegalReference;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Name;
use horstoeko\invoicesuite\documents\models\peppol\cbc\OntologyURI;
use JMS\Serializer\Annotation as JMS;

class RegulationType
{
    use HandlesObjectFlags;

    /**
     * @var null|Name
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\Name")
     * @JMS\Expose
     * @JMS\SerializedName("Name")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getName", setter="setName")
     */
    private $name;

    /**
     * @var null|LegalReference
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\LegalReference")
     * @JMS\Expose
     * @JMS\SerializedName("LegalReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLegalReference", setter="setLegalReference")
     */
    private $legalReference;

    /**
     * @var null|OntologyURI
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\OntologyURI")
     * @JMS\Expose
     * @JMS\SerializedName("OntologyURI")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOntologyURI", setter="setOntologyURI")
     */
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
        $this->name = is_null($this->name) ? new Name() : $this->name;

        return $this->name;
    }

    /**
     * @param  null|Name $name
     * @return static
     */
    public function setName(?Name $name = null): static
    {
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
        $this->legalReference = is_null($this->legalReference) ? new LegalReference() : $this->legalReference;

        return $this->legalReference;
    }

    /**
     * @param  null|LegalReference $legalReference
     * @return static
     */
    public function setLegalReference(?LegalReference $legalReference = null): static
    {
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
        $this->ontologyURI = is_null($this->ontologyURI) ? new OntologyURI() : $this->ontologyURI;

        return $this->ontologyURI;
    }

    /**
     * @param  null|OntologyURI $ontologyURI
     * @return static
     */
    public function setOntologyURI(?OntologyURI $ontologyURI = null): static
    {
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
