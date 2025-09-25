<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\LegalReference;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\Name;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\OntologyURI;

class RegulationType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\Name|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\Name")
     * @JMS\Expose
     * @JMS\SerializedName("Name")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getName", setter="setName")
     */
    private $name;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\LegalReference|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\LegalReference")
     * @JMS\Expose
     * @JMS\SerializedName("LegalReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLegalReference", setter="setLegalReference")
     */
    private $legalReference;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\OntologyURI|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\OntologyURI")
     * @JMS\Expose
     * @JMS\SerializedName("OntologyURI")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOntologyURI", setter="setOntologyURI")
     */
    private $ontologyURI;

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Name|null
     */
    public function getName(): ?Name
    {
        return $this->name;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Name
     */
    public function getNameWithCreate(): Name
    {
        $this->name = is_null($this->name) ? new Name() : $this->name;

        return $this->name;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Name|null $name
     * @return self
     */
    public function setName(?Name $name = null): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetName(): self
    {
        $this->name = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\LegalReference|null
     */
    public function getLegalReference(): ?LegalReference
    {
        return $this->legalReference;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\LegalReference
     */
    public function getLegalReferenceWithCreate(): LegalReference
    {
        $this->legalReference = is_null($this->legalReference) ? new LegalReference() : $this->legalReference;

        return $this->legalReference;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\LegalReference|null $legalReference
     * @return self
     */
    public function setLegalReference(?LegalReference $legalReference = null): self
    {
        $this->legalReference = $legalReference;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetLegalReference(): self
    {
        $this->legalReference = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\OntologyURI|null
     */
    public function getOntologyURI(): ?OntologyURI
    {
        return $this->ontologyURI;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\OntologyURI
     */
    public function getOntologyURIWithCreate(): OntologyURI
    {
        $this->ontologyURI = is_null($this->ontologyURI) ? new OntologyURI() : $this->ontologyURI;

        return $this->ontologyURI;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\OntologyURI|null $ontologyURI
     * @return self
     */
    public function setOntologyURI(?OntologyURI $ontologyURI = null): self
    {
        $this->ontologyURI = $ontologyURI;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetOntologyURI(): self
    {
        $this->ontologyURI = null;

        return $this;
    }
}
