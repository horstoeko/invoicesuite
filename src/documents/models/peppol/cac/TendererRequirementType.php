<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Description;
use horstoeko\invoicesuite\documents\models\peppol\cbc\LegalReference;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Name;
use horstoeko\invoicesuite\documents\models\peppol\cbc\TendererRequirementTypeCode;
use JMS\Serializer\Annotation as JMS;

class TendererRequirementType
{
    use HandlesObjectFlags;

    /**
     * @var null|array<Name>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\Name>")
     * @JMS\Expose
     * @JMS\SerializedName("Name")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Name", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getName", setter="setName")
     */
    private $name;

    /**
     * @var null|TendererRequirementTypeCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\TendererRequirementTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("TendererRequirementTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTendererRequirementTypeCode", setter="setTendererRequirementTypeCode")
     */
    private $tendererRequirementTypeCode;

    /**
     * @var null|array<Description>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\Description>")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Description", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $description;

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
     * @var null|array<SuggestedEvidence>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\SuggestedEvidence>")
     * @JMS\Expose
     * @JMS\SerializedName("SuggestedEvidence")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="SuggestedEvidence", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getSuggestedEvidence", setter="setSuggestedEvidence")
     */
    private $suggestedEvidence;

    /**
     * @return null|array<Name>
     */
    public function getName(): ?array
    {
        return $this->name;
    }

    /**
     * @param  null|array<Name> $name
     * @return static
     */
    public function setName(?array $name = null): static
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
     * @return static
     */
    public function clearName(): static
    {
        $this->name = [];

        return $this;
    }

    /**
     * @return null|Name
     */
    public function firstName(): ?Name
    {
        $name = $this->name ?? [];
        $name = reset($name);

        if (false === $name) {
            return null;
        }

        return $name;
    }

    /**
     * @return null|Name
     */
    public function lastName(): ?Name
    {
        $name = $this->name ?? [];
        $name = end($name);

        if (false === $name) {
            return null;
        }

        return $name;
    }

    /**
     * @param  Name   $name
     * @return static
     */
    public function addToName(Name $name): static
    {
        $this->name[] = $name;

        return $this;
    }

    /**
     * @return Name
     */
    public function addToNameWithCreate(): Name
    {
        $this->addToname($name = new Name());

        return $name;
    }

    /**
     * @param  Name   $name
     * @return static
     */
    public function addOnceToName(Name $name): static
    {
        if (!is_array($this->name)) {
            $this->name = [];
        }

        $this->name[0] = $name;

        return $this;
    }

    /**
     * @return Name
     */
    public function addOnceToNameWithCreate(): Name
    {
        if (!is_array($this->name)) {
            $this->name = [];
        }

        if ([] === $this->name) {
            $this->addOnceToname(new Name());
        }

        return $this->name[0];
    }

    /**
     * @return null|TendererRequirementTypeCode
     */
    public function getTendererRequirementTypeCode(): ?TendererRequirementTypeCode
    {
        return $this->tendererRequirementTypeCode;
    }

    /**
     * @return TendererRequirementTypeCode
     */
    public function getTendererRequirementTypeCodeWithCreate(): TendererRequirementTypeCode
    {
        $this->tendererRequirementTypeCode = is_null($this->tendererRequirementTypeCode) ? new TendererRequirementTypeCode() : $this->tendererRequirementTypeCode;

        return $this->tendererRequirementTypeCode;
    }

    /**
     * @param  null|TendererRequirementTypeCode $tendererRequirementTypeCode
     * @return static
     */
    public function setTendererRequirementTypeCode(
        ?TendererRequirementTypeCode $tendererRequirementTypeCode = null,
    ): static {
        $this->tendererRequirementTypeCode = $tendererRequirementTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTendererRequirementTypeCode(): static
    {
        $this->tendererRequirementTypeCode = null;

        return $this;
    }

    /**
     * @return null|array<Description>
     */
    public function getDescription(): ?array
    {
        return $this->description;
    }

    /**
     * @param  null|array<Description> $description
     * @return static
     */
    public function setDescription(?array $description = null): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDescription(): static
    {
        $this->description = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearDescription(): static
    {
        $this->description = [];

        return $this;
    }

    /**
     * @return null|Description
     */
    public function firstDescription(): ?Description
    {
        $description = $this->description ?? [];
        $description = reset($description);

        if (false === $description) {
            return null;
        }

        return $description;
    }

    /**
     * @return null|Description
     */
    public function lastDescription(): ?Description
    {
        $description = $this->description ?? [];
        $description = end($description);

        if (false === $description) {
            return null;
        }

        return $description;
    }

    /**
     * @param  Description $description
     * @return static
     */
    public function addToDescription(Description $description): static
    {
        $this->description[] = $description;

        return $this;
    }

    /**
     * @return Description
     */
    public function addToDescriptionWithCreate(): Description
    {
        $this->addTodescription($description = new Description());

        return $description;
    }

    /**
     * @param  Description $description
     * @return static
     */
    public function addOnceToDescription(Description $description): static
    {
        if (!is_array($this->description)) {
            $this->description = [];
        }

        $this->description[0] = $description;

        return $this;
    }

    /**
     * @return Description
     */
    public function addOnceToDescriptionWithCreate(): Description
    {
        if (!is_array($this->description)) {
            $this->description = [];
        }

        if ([] === $this->description) {
            $this->addOnceTodescription(new Description());
        }

        return $this->description[0];
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
     * @return null|array<SuggestedEvidence>
     */
    public function getSuggestedEvidence(): ?array
    {
        return $this->suggestedEvidence;
    }

    /**
     * @param  null|array<SuggestedEvidence> $suggestedEvidence
     * @return static
     */
    public function setSuggestedEvidence(?array $suggestedEvidence = null): static
    {
        $this->suggestedEvidence = $suggestedEvidence;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSuggestedEvidence(): static
    {
        $this->suggestedEvidence = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearSuggestedEvidence(): static
    {
        $this->suggestedEvidence = [];

        return $this;
    }

    /**
     * @return null|SuggestedEvidence
     */
    public function firstSuggestedEvidence(): ?SuggestedEvidence
    {
        $suggestedEvidence = $this->suggestedEvidence ?? [];
        $suggestedEvidence = reset($suggestedEvidence);

        if (false === $suggestedEvidence) {
            return null;
        }

        return $suggestedEvidence;
    }

    /**
     * @return null|SuggestedEvidence
     */
    public function lastSuggestedEvidence(): ?SuggestedEvidence
    {
        $suggestedEvidence = $this->suggestedEvidence ?? [];
        $suggestedEvidence = end($suggestedEvidence);

        if (false === $suggestedEvidence) {
            return null;
        }

        return $suggestedEvidence;
    }

    /**
     * @param  SuggestedEvidence $suggestedEvidence
     * @return static
     */
    public function addToSuggestedEvidence(SuggestedEvidence $suggestedEvidence): static
    {
        $this->suggestedEvidence[] = $suggestedEvidence;

        return $this;
    }

    /**
     * @return SuggestedEvidence
     */
    public function addToSuggestedEvidenceWithCreate(): SuggestedEvidence
    {
        $this->addTosuggestedEvidence($suggestedEvidence = new SuggestedEvidence());

        return $suggestedEvidence;
    }

    /**
     * @param  SuggestedEvidence $suggestedEvidence
     * @return static
     */
    public function addOnceToSuggestedEvidence(SuggestedEvidence $suggestedEvidence): static
    {
        if (!is_array($this->suggestedEvidence)) {
            $this->suggestedEvidence = [];
        }

        $this->suggestedEvidence[0] = $suggestedEvidence;

        return $this;
    }

    /**
     * @return SuggestedEvidence
     */
    public function addOnceToSuggestedEvidenceWithCreate(): SuggestedEvidence
    {
        if (!is_array($this->suggestedEvidence)) {
            $this->suggestedEvidence = [];
        }

        if ([] === $this->suggestedEvidence) {
            $this->addOnceTosuggestedEvidence(new SuggestedEvidence());
        }

        return $this->suggestedEvidence[0];
    }
}
