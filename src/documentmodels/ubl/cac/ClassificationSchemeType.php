<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\AgencyID;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\AgencyName;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\Description;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\ID;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\LanguageID;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\Name;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\Note;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\SchemeURI;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\URI;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\UUID;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\VersionID;

class ClassificationSchemeType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\ID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\ID")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\UUID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\UUID")
     * @JMS\Expose
     * @JMS\SerializedName("UUID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getUUID", setter="setUUID")
     */
    private $uUID;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("LastRevisionDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLastRevisionDate", setter="setLastRevisionDate")
     */
    private $lastRevisionDate;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time")
     * @JMS\Expose
     * @JMS\SerializedName("LastRevisionTime")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLastRevisionTime", setter="setLastRevisionTime")
     */
    private $lastRevisionTime;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Note>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cbc\Note>")
     * @JMS\Expose
     * @JMS\SerializedName("Note")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Note", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getNote", setter="setNote")
     */
    private $note;

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
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Description>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cbc\Description>")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Description", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $description;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\AgencyID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\AgencyID")
     * @JMS\Expose
     * @JMS\SerializedName("AgencyID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAgencyID", setter="setAgencyID")
     */
    private $agencyID;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\AgencyName|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\AgencyName")
     * @JMS\Expose
     * @JMS\SerializedName("AgencyName")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAgencyName", setter="setAgencyName")
     */
    private $agencyName;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\VersionID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\VersionID")
     * @JMS\Expose
     * @JMS\SerializedName("VersionID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getVersionID", setter="setVersionID")
     */
    private $versionID;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\URI|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\URI")
     * @JMS\Expose
     * @JMS\SerializedName("URI")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getURI", setter="setURI")
     */
    private $uRI;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\SchemeURI|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\SchemeURI")
     * @JMS\Expose
     * @JMS\SerializedName("SchemeURI")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSchemeURI", setter="setSchemeURI")
     */
    private $schemeURI;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\LanguageID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\LanguageID")
     * @JMS\Expose
     * @JMS\SerializedName("LanguageID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLanguageID", setter="setLanguageID")
     */
    private $languageID;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\ClassificationCategory>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\ClassificationCategory>")
     * @JMS\Expose
     * @JMS\SerializedName("ClassificationCategory")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ClassificationCategory", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getClassificationCategory", setter="setClassificationCategory")
     */
    private $classificationCategory;

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ID|null
     */
    public function getID(): ?ID
    {
        return $this->iD;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ID
     */
    public function getIDWithCreate(): ID
    {
        $this->iD = is_null($this->iD) ? new ID() : $this->iD;

        return $this->iD;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ID|null $iD
     * @return self
     */
    public function setID(?ID $iD = null): self
    {
        $this->iD = $iD;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetID(): self
    {
        $this->iD = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\UUID|null
     */
    public function getUUID(): ?UUID
    {
        return $this->uUID;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\UUID
     */
    public function getUUIDWithCreate(): UUID
    {
        $this->uUID = is_null($this->uUID) ? new UUID() : $this->uUID;

        return $this->uUID;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\UUID|null $uUID
     * @return self
     */
    public function setUUID(?UUID $uUID = null): self
    {
        $this->uUID = $uUID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetUUID(): self
    {
        $this->uUID = null;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getLastRevisionDate(): ?\DateTimeInterface
    {
        return $this->lastRevisionDate;
    }

    /**
     * @param \DateTimeInterface|null $lastRevisionDate
     * @return self
     */
    public function setLastRevisionDate(?\DateTimeInterface $lastRevisionDate = null): self
    {
        $this->lastRevisionDate = $lastRevisionDate;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetLastRevisionDate(): self
    {
        $this->lastRevisionDate = null;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getLastRevisionTime(): ?\DateTimeInterface
    {
        return $this->lastRevisionTime;
    }

    /**
     * @param \DateTimeInterface|null $lastRevisionTime
     * @return self
     */
    public function setLastRevisionTime(?\DateTimeInterface $lastRevisionTime = null): self
    {
        $this->lastRevisionTime = $lastRevisionTime;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetLastRevisionTime(): self
    {
        $this->lastRevisionTime = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Note>|null
     */
    public function getNote(): ?array
    {
        return $this->note;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Note>|null $note
     * @return self
     */
    public function setNote(?array $note = null): self
    {
        $this->note = $note;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetNote(): self
    {
        $this->note = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearNote(): self
    {
        $this->note = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Note|null
     */
    public function firstNote(): ?Note
    {
        $note = $this->note ?? [];
        $note = reset($note);

        if ($note === false) {
            return null;
        }

        return $note;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Note|null
     */
    public function lastNote(): ?Note
    {
        $note = $this->note ?? [];
        $note = end($note);

        if ($note === false) {
            return null;
        }

        return $note;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Note $note
     * @return self
     */
    public function addToNote(Note $note): self
    {
        $this->note[] = $note;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Note
     */
    public function addToNoteWithCreate(): Note
    {
        $this->addTonote($note = new Note());

        return $note;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Note $note
     * @return self
     */
    public function addOnceToNote(Note $note): self
    {
        if (!is_array($this->note)) {
            $this->note = [];
        }

        $this->note[0] = $note;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Note
     */
    public function addOnceToNoteWithCreate(): Note
    {
        if (!is_array($this->note)) {
            $this->note = [];
        }

        if ($this->note === []) {
            $this->addOnceTonote(new Note());
        }

        return $this->note[0];
    }

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
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Description>|null
     */
    public function getDescription(): ?array
    {
        return $this->description;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Description>|null $description
     * @return self
     */
    public function setDescription(?array $description = null): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDescription(): self
    {
        $this->description = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearDescription(): self
    {
        $this->description = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Description|null
     */
    public function firstDescription(): ?Description
    {
        $description = $this->description ?? [];
        $description = reset($description);

        if ($description === false) {
            return null;
        }

        return $description;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Description|null
     */
    public function lastDescription(): ?Description
    {
        $description = $this->description ?? [];
        $description = end($description);

        if ($description === false) {
            return null;
        }

        return $description;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Description $description
     * @return self
     */
    public function addToDescription(Description $description): self
    {
        $this->description[] = $description;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Description
     */
    public function addToDescriptionWithCreate(): Description
    {
        $this->addTodescription($description = new Description());

        return $description;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Description $description
     * @return self
     */
    public function addOnceToDescription(Description $description): self
    {
        if (!is_array($this->description)) {
            $this->description = [];
        }

        $this->description[0] = $description;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Description
     */
    public function addOnceToDescriptionWithCreate(): Description
    {
        if (!is_array($this->description)) {
            $this->description = [];
        }

        if ($this->description === []) {
            $this->addOnceTodescription(new Description());
        }

        return $this->description[0];
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\AgencyID|null
     */
    public function getAgencyID(): ?AgencyID
    {
        return $this->agencyID;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\AgencyID
     */
    public function getAgencyIDWithCreate(): AgencyID
    {
        $this->agencyID = is_null($this->agencyID) ? new AgencyID() : $this->agencyID;

        return $this->agencyID;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\AgencyID|null $agencyID
     * @return self
     */
    public function setAgencyID(?AgencyID $agencyID = null): self
    {
        $this->agencyID = $agencyID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetAgencyID(): self
    {
        $this->agencyID = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\AgencyName|null
     */
    public function getAgencyName(): ?AgencyName
    {
        return $this->agencyName;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\AgencyName
     */
    public function getAgencyNameWithCreate(): AgencyName
    {
        $this->agencyName = is_null($this->agencyName) ? new AgencyName() : $this->agencyName;

        return $this->agencyName;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\AgencyName|null $agencyName
     * @return self
     */
    public function setAgencyName(?AgencyName $agencyName = null): self
    {
        $this->agencyName = $agencyName;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetAgencyName(): self
    {
        $this->agencyName = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\VersionID|null
     */
    public function getVersionID(): ?VersionID
    {
        return $this->versionID;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\VersionID
     */
    public function getVersionIDWithCreate(): VersionID
    {
        $this->versionID = is_null($this->versionID) ? new VersionID() : $this->versionID;

        return $this->versionID;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\VersionID|null $versionID
     * @return self
     */
    public function setVersionID(?VersionID $versionID = null): self
    {
        $this->versionID = $versionID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetVersionID(): self
    {
        $this->versionID = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\URI|null
     */
    public function getURI(): ?URI
    {
        return $this->uRI;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\URI
     */
    public function getURIWithCreate(): URI
    {
        $this->uRI = is_null($this->uRI) ? new URI() : $this->uRI;

        return $this->uRI;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\URI|null $uRI
     * @return self
     */
    public function setURI(?URI $uRI = null): self
    {
        $this->uRI = $uRI;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetURI(): self
    {
        $this->uRI = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\SchemeURI|null
     */
    public function getSchemeURI(): ?SchemeURI
    {
        return $this->schemeURI;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\SchemeURI
     */
    public function getSchemeURIWithCreate(): SchemeURI
    {
        $this->schemeURI = is_null($this->schemeURI) ? new SchemeURI() : $this->schemeURI;

        return $this->schemeURI;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\SchemeURI|null $schemeURI
     * @return self
     */
    public function setSchemeURI(?SchemeURI $schemeURI = null): self
    {
        $this->schemeURI = $schemeURI;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSchemeURI(): self
    {
        $this->schemeURI = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\LanguageID|null
     */
    public function getLanguageID(): ?LanguageID
    {
        return $this->languageID;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\LanguageID
     */
    public function getLanguageIDWithCreate(): LanguageID
    {
        $this->languageID = is_null($this->languageID) ? new LanguageID() : $this->languageID;

        return $this->languageID;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\LanguageID|null $languageID
     * @return self
     */
    public function setLanguageID(?LanguageID $languageID = null): self
    {
        $this->languageID = $languageID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetLanguageID(): self
    {
        $this->languageID = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\ClassificationCategory>|null
     */
    public function getClassificationCategory(): ?array
    {
        return $this->classificationCategory;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\ClassificationCategory>|null $classificationCategory
     * @return self
     */
    public function setClassificationCategory(?array $classificationCategory = null): self
    {
        $this->classificationCategory = $classificationCategory;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetClassificationCategory(): self
    {
        $this->classificationCategory = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearClassificationCategory(): self
    {
        $this->classificationCategory = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ClassificationCategory|null
     */
    public function firstClassificationCategory(): ?ClassificationCategory
    {
        $classificationCategory = $this->classificationCategory ?? [];
        $classificationCategory = reset($classificationCategory);

        if ($classificationCategory === false) {
            return null;
        }

        return $classificationCategory;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ClassificationCategory|null
     */
    public function lastClassificationCategory(): ?ClassificationCategory
    {
        $classificationCategory = $this->classificationCategory ?? [];
        $classificationCategory = end($classificationCategory);

        if ($classificationCategory === false) {
            return null;
        }

        return $classificationCategory;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\ClassificationCategory $classificationCategory
     * @return self
     */
    public function addToClassificationCategory(ClassificationCategory $classificationCategory): self
    {
        $this->classificationCategory[] = $classificationCategory;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ClassificationCategory
     */
    public function addToClassificationCategoryWithCreate(): ClassificationCategory
    {
        $this->addToclassificationCategory($classificationCategory = new ClassificationCategory());

        return $classificationCategory;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\ClassificationCategory $classificationCategory
     * @return self
     */
    public function addOnceToClassificationCategory(ClassificationCategory $classificationCategory): self
    {
        if (!is_array($this->classificationCategory)) {
            $this->classificationCategory = [];
        }

        $this->classificationCategory[0] = $classificationCategory;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ClassificationCategory
     */
    public function addOnceToClassificationCategoryWithCreate(): ClassificationCategory
    {
        if (!is_array($this->classificationCategory)) {
            $this->classificationCategory = [];
        }

        if ($this->classificationCategory === []) {
            $this->addOnceToclassificationCategory(new ClassificationCategory());
        }

        return $this->classificationCategory[0];
    }
}
