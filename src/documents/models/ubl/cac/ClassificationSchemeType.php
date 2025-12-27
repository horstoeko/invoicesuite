<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\ubl\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\ubl\cbc\AgencyID;
use horstoeko\invoicesuite\documents\models\ubl\cbc\AgencyName;
use horstoeko\invoicesuite\documents\models\ubl\cbc\Description;
use horstoeko\invoicesuite\documents\models\ubl\cbc\ID;
use horstoeko\invoicesuite\documents\models\ubl\cbc\LanguageID;
use horstoeko\invoicesuite\documents\models\ubl\cbc\Name;
use horstoeko\invoicesuite\documents\models\ubl\cbc\Note;
use horstoeko\invoicesuite\documents\models\ubl\cbc\SchemeURI;
use horstoeko\invoicesuite\documents\models\ubl\cbc\URI;
use horstoeko\invoicesuite\documents\models\ubl\cbc\UUID;
use horstoeko\invoicesuite\documents\models\ubl\cbc\VersionID;
use JMS\Serializer\Annotation as JMS;

class ClassificationSchemeType
{
    use HandlesObjectFlags;

    /**
     * @var null|ID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\ID")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var null|UUID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\UUID")
     * @JMS\Expose
     * @JMS\SerializedName("UUID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getUUID", setter="setUUID")
     */
    private $uUID;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("LastRevisionDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLastRevisionDate", setter="setLastRevisionDate")
     */
    private $lastRevisionDate;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time")
     * @JMS\Expose
     * @JMS\SerializedName("LastRevisionTime")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLastRevisionTime", setter="setLastRevisionTime")
     */
    private $lastRevisionTime;

    /**
     * @var null|array<Note>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cbc\Note>")
     * @JMS\Expose
     * @JMS\SerializedName("Note")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Note", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getNote", setter="setNote")
     */
    private $note;

    /**
     * @var null|Name
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\Name")
     * @JMS\Expose
     * @JMS\SerializedName("Name")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getName", setter="setName")
     */
    private $name;

    /**
     * @var null|array<Description>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cbc\Description>")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Description", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $description;

    /**
     * @var null|AgencyID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\AgencyID")
     * @JMS\Expose
     * @JMS\SerializedName("AgencyID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAgencyID", setter="setAgencyID")
     */
    private $agencyID;

    /**
     * @var null|AgencyName
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\AgencyName")
     * @JMS\Expose
     * @JMS\SerializedName("AgencyName")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAgencyName", setter="setAgencyName")
     */
    private $agencyName;

    /**
     * @var null|VersionID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\VersionID")
     * @JMS\Expose
     * @JMS\SerializedName("VersionID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getVersionID", setter="setVersionID")
     */
    private $versionID;

    /**
     * @var null|URI
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\URI")
     * @JMS\Expose
     * @JMS\SerializedName("URI")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getURI", setter="setURI")
     */
    private $uRI;

    /**
     * @var null|SchemeURI
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\SchemeURI")
     * @JMS\Expose
     * @JMS\SerializedName("SchemeURI")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSchemeURI", setter="setSchemeURI")
     */
    private $schemeURI;

    /**
     * @var null|LanguageID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\LanguageID")
     * @JMS\Expose
     * @JMS\SerializedName("LanguageID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLanguageID", setter="setLanguageID")
     */
    private $languageID;

    /**
     * @var null|array<ClassificationCategory>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\ClassificationCategory>")
     * @JMS\Expose
     * @JMS\SerializedName("ClassificationCategory")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ClassificationCategory", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getClassificationCategory", setter="setClassificationCategory")
     */
    private $classificationCategory;

    /**
     * @return null|ID
     */
    public function getID(): ?ID
    {
        return $this->iD;
    }

    /**
     * @return ID
     */
    public function getIDWithCreate(): ID
    {
        $this->iD = is_null($this->iD) ? new ID() : $this->iD;

        return $this->iD;
    }

    /**
     * @param  null|ID $iD
     * @return static
     */
    public function setID(?ID $iD = null): static
    {
        $this->iD = $iD;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetID(): static
    {
        $this->iD = null;

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
        $this->uUID = is_null($this->uUID) ? new UUID() : $this->uUID;

        return $this->uUID;
    }

    /**
     * @param  null|UUID $uUID
     * @return static
     */
    public function setUUID(?UUID $uUID = null): static
    {
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
     * @return null|DateTimeInterface
     */
    public function getLastRevisionDate(): ?DateTimeInterface
    {
        return $this->lastRevisionDate;
    }

    /**
     * @param  null|DateTimeInterface $lastRevisionDate
     * @return static
     */
    public function setLastRevisionDate(?DateTimeInterface $lastRevisionDate = null): static
    {
        $this->lastRevisionDate = $lastRevisionDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLastRevisionDate(): static
    {
        $this->lastRevisionDate = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getLastRevisionTime(): ?DateTimeInterface
    {
        return $this->lastRevisionTime;
    }

    /**
     * @param  null|DateTimeInterface $lastRevisionTime
     * @return static
     */
    public function setLastRevisionTime(?DateTimeInterface $lastRevisionTime = null): static
    {
        $this->lastRevisionTime = $lastRevisionTime;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLastRevisionTime(): static
    {
        $this->lastRevisionTime = null;

        return $this;
    }

    /**
     * @return null|array<Note>
     */
    public function getNote(): ?array
    {
        return $this->note;
    }

    /**
     * @param  null|array<Note> $note
     * @return static
     */
    public function setNote(?array $note = null): static
    {
        $this->note = $note;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetNote(): static
    {
        $this->note = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearNote(): static
    {
        $this->note = [];

        return $this;
    }

    /**
     * @return null|Note
     */
    public function firstNote(): ?Note
    {
        $note = $this->note ?? [];
        $note = reset($note);

        if (false === $note) {
            return null;
        }

        return $note;
    }

    /**
     * @return null|Note
     */
    public function lastNote(): ?Note
    {
        $note = $this->note ?? [];
        $note = end($note);

        if (false === $note) {
            return null;
        }

        return $note;
    }

    /**
     * @param  Note   $note
     * @return static
     */
    public function addToNote(Note $note): static
    {
        $this->note[] = $note;

        return $this;
    }

    /**
     * @return Note
     */
    public function addToNoteWithCreate(): Note
    {
        $this->addTonote($note = new Note());

        return $note;
    }

    /**
     * @param  Note   $note
     * @return static
     */
    public function addOnceToNote(Note $note): static
    {
        if (!is_array($this->note)) {
            $this->note = [];
        }

        $this->note[0] = $note;

        return $this;
    }

    /**
     * @return Note
     */
    public function addOnceToNoteWithCreate(): Note
    {
        if (!is_array($this->note)) {
            $this->note = [];
        }

        if ([] === $this->note) {
            $this->addOnceTonote(new Note());
        }

        return $this->note[0];
    }

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
     * @return null|AgencyID
     */
    public function getAgencyID(): ?AgencyID
    {
        return $this->agencyID;
    }

    /**
     * @return AgencyID
     */
    public function getAgencyIDWithCreate(): AgencyID
    {
        $this->agencyID = is_null($this->agencyID) ? new AgencyID() : $this->agencyID;

        return $this->agencyID;
    }

    /**
     * @param  null|AgencyID $agencyID
     * @return static
     */
    public function setAgencyID(?AgencyID $agencyID = null): static
    {
        $this->agencyID = $agencyID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAgencyID(): static
    {
        $this->agencyID = null;

        return $this;
    }

    /**
     * @return null|AgencyName
     */
    public function getAgencyName(): ?AgencyName
    {
        return $this->agencyName;
    }

    /**
     * @return AgencyName
     */
    public function getAgencyNameWithCreate(): AgencyName
    {
        $this->agencyName = is_null($this->agencyName) ? new AgencyName() : $this->agencyName;

        return $this->agencyName;
    }

    /**
     * @param  null|AgencyName $agencyName
     * @return static
     */
    public function setAgencyName(?AgencyName $agencyName = null): static
    {
        $this->agencyName = $agencyName;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAgencyName(): static
    {
        $this->agencyName = null;

        return $this;
    }

    /**
     * @return null|VersionID
     */
    public function getVersionID(): ?VersionID
    {
        return $this->versionID;
    }

    /**
     * @return VersionID
     */
    public function getVersionIDWithCreate(): VersionID
    {
        $this->versionID = is_null($this->versionID) ? new VersionID() : $this->versionID;

        return $this->versionID;
    }

    /**
     * @param  null|VersionID $versionID
     * @return static
     */
    public function setVersionID(?VersionID $versionID = null): static
    {
        $this->versionID = $versionID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetVersionID(): static
    {
        $this->versionID = null;

        return $this;
    }

    /**
     * @return null|URI
     */
    public function getURI(): ?URI
    {
        return $this->uRI;
    }

    /**
     * @return URI
     */
    public function getURIWithCreate(): URI
    {
        $this->uRI = is_null($this->uRI) ? new URI() : $this->uRI;

        return $this->uRI;
    }

    /**
     * @param  null|URI $uRI
     * @return static
     */
    public function setURI(?URI $uRI = null): static
    {
        $this->uRI = $uRI;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetURI(): static
    {
        $this->uRI = null;

        return $this;
    }

    /**
     * @return null|SchemeURI
     */
    public function getSchemeURI(): ?SchemeURI
    {
        return $this->schemeURI;
    }

    /**
     * @return SchemeURI
     */
    public function getSchemeURIWithCreate(): SchemeURI
    {
        $this->schemeURI = is_null($this->schemeURI) ? new SchemeURI() : $this->schemeURI;

        return $this->schemeURI;
    }

    /**
     * @param  null|SchemeURI $schemeURI
     * @return static
     */
    public function setSchemeURI(?SchemeURI $schemeURI = null): static
    {
        $this->schemeURI = $schemeURI;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSchemeURI(): static
    {
        $this->schemeURI = null;

        return $this;
    }

    /**
     * @return null|LanguageID
     */
    public function getLanguageID(): ?LanguageID
    {
        return $this->languageID;
    }

    /**
     * @return LanguageID
     */
    public function getLanguageIDWithCreate(): LanguageID
    {
        $this->languageID = is_null($this->languageID) ? new LanguageID() : $this->languageID;

        return $this->languageID;
    }

    /**
     * @param  null|LanguageID $languageID
     * @return static
     */
    public function setLanguageID(?LanguageID $languageID = null): static
    {
        $this->languageID = $languageID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLanguageID(): static
    {
        $this->languageID = null;

        return $this;
    }

    /**
     * @return null|array<ClassificationCategory>
     */
    public function getClassificationCategory(): ?array
    {
        return $this->classificationCategory;
    }

    /**
     * @param  null|array<ClassificationCategory> $classificationCategory
     * @return static
     */
    public function setClassificationCategory(?array $classificationCategory = null): static
    {
        $this->classificationCategory = $classificationCategory;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetClassificationCategory(): static
    {
        $this->classificationCategory = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearClassificationCategory(): static
    {
        $this->classificationCategory = [];

        return $this;
    }

    /**
     * @return null|ClassificationCategory
     */
    public function firstClassificationCategory(): ?ClassificationCategory
    {
        $classificationCategory = $this->classificationCategory ?? [];
        $classificationCategory = reset($classificationCategory);

        if (false === $classificationCategory) {
            return null;
        }

        return $classificationCategory;
    }

    /**
     * @return null|ClassificationCategory
     */
    public function lastClassificationCategory(): ?ClassificationCategory
    {
        $classificationCategory = $this->classificationCategory ?? [];
        $classificationCategory = end($classificationCategory);

        if (false === $classificationCategory) {
            return null;
        }

        return $classificationCategory;
    }

    /**
     * @param  ClassificationCategory $classificationCategory
     * @return static
     */
    public function addToClassificationCategory(ClassificationCategory $classificationCategory): static
    {
        $this->classificationCategory[] = $classificationCategory;

        return $this;
    }

    /**
     * @return ClassificationCategory
     */
    public function addToClassificationCategoryWithCreate(): ClassificationCategory
    {
        $this->addToclassificationCategory($classificationCategory = new ClassificationCategory());

        return $classificationCategory;
    }

    /**
     * @param  ClassificationCategory $classificationCategory
     * @return static
     */
    public function addOnceToClassificationCategory(ClassificationCategory $classificationCategory): static
    {
        if (!is_array($this->classificationCategory)) {
            $this->classificationCategory = [];
        }

        $this->classificationCategory[0] = $classificationCategory;

        return $this;
    }

    /**
     * @return ClassificationCategory
     */
    public function addOnceToClassificationCategoryWithCreate(): ClassificationCategory
    {
        if (!is_array($this->classificationCategory)) {
            $this->classificationCategory = [];
        }

        if ([] === $this->classificationCategory) {
            $this->addOnceToclassificationCategory(new ClassificationCategory());
        }

        return $this->classificationCategory[0];
    }
}
