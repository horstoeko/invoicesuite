<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\ElectronicMail;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\ID;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\Name;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\Note;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\Telefax;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\Telephone;

class ContactType
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
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\Telephone|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\Telephone")
     * @JMS\Expose
     * @JMS\SerializedName("Telephone")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTelephone", setter="setTelephone")
     */
    private $telephone;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\Telefax|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\Telefax")
     * @JMS\Expose
     * @JMS\SerializedName("Telefax")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTelefax", setter="setTelefax")
     */
    private $telefax;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\ElectronicMail|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\ElectronicMail")
     * @JMS\Expose
     * @JMS\SerializedName("ElectronicMail")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getElectronicMail", setter="setElectronicMail")
     */
    private $electronicMail;

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
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\OtherCommunication>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\OtherCommunication>")
     * @JMS\Expose
     * @JMS\SerializedName("OtherCommunication")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="OtherCommunication", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getOtherCommunication", setter="setOtherCommunication")
     */
    private $otherCommunication;

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
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Telephone|null
     */
    public function getTelephone(): ?Telephone
    {
        return $this->telephone;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Telephone
     */
    public function getTelephoneWithCreate(): Telephone
    {
        $this->telephone = is_null($this->telephone) ? new Telephone() : $this->telephone;

        return $this->telephone;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Telephone|null $telephone
     * @return self
     */
    public function setTelephone(?Telephone $telephone = null): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTelephone(): self
    {
        $this->telephone = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Telefax|null
     */
    public function getTelefax(): ?Telefax
    {
        return $this->telefax;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Telefax
     */
    public function getTelefaxWithCreate(): Telefax
    {
        $this->telefax = is_null($this->telefax) ? new Telefax() : $this->telefax;

        return $this->telefax;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Telefax|null $telefax
     * @return self
     */
    public function setTelefax(?Telefax $telefax = null): self
    {
        $this->telefax = $telefax;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTelefax(): self
    {
        $this->telefax = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ElectronicMail|null
     */
    public function getElectronicMail(): ?ElectronicMail
    {
        return $this->electronicMail;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ElectronicMail
     */
    public function getElectronicMailWithCreate(): ElectronicMail
    {
        $this->electronicMail = is_null($this->electronicMail) ? new ElectronicMail() : $this->electronicMail;

        return $this->electronicMail;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ElectronicMail|null $electronicMail
     * @return self
     */
    public function setElectronicMail(?ElectronicMail $electronicMail = null): self
    {
        $this->electronicMail = $electronicMail;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetElectronicMail(): self
    {
        $this->electronicMail = null;

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
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\OtherCommunication>|null
     */
    public function getOtherCommunication(): ?array
    {
        return $this->otherCommunication;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\OtherCommunication>|null $otherCommunication
     * @return self
     */
    public function setOtherCommunication(?array $otherCommunication = null): self
    {
        $this->otherCommunication = $otherCommunication;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetOtherCommunication(): self
    {
        $this->otherCommunication = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearOtherCommunication(): self
    {
        $this->otherCommunication = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\OtherCommunication|null
     */
    public function firstOtherCommunication(): ?OtherCommunication
    {
        $otherCommunication = $this->otherCommunication ?? [];
        $otherCommunication = reset($otherCommunication);

        if ($otherCommunication === false) {
            return null;
        }

        return $otherCommunication;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\OtherCommunication|null
     */
    public function lastOtherCommunication(): ?OtherCommunication
    {
        $otherCommunication = $this->otherCommunication ?? [];
        $otherCommunication = end($otherCommunication);

        if ($otherCommunication === false) {
            return null;
        }

        return $otherCommunication;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\OtherCommunication $otherCommunication
     * @return self
     */
    public function addToOtherCommunication(OtherCommunication $otherCommunication): self
    {
        $this->otherCommunication[] = $otherCommunication;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\OtherCommunication
     */
    public function addToOtherCommunicationWithCreate(): OtherCommunication
    {
        $this->addTootherCommunication($otherCommunication = new OtherCommunication());

        return $otherCommunication;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\OtherCommunication $otherCommunication
     * @return self
     */
    public function addOnceToOtherCommunication(OtherCommunication $otherCommunication): self
    {
        if (!is_array($this->otherCommunication)) {
            $this->otherCommunication = [];
        }

        $this->otherCommunication[0] = $otherCommunication;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\OtherCommunication
     */
    public function addOnceToOtherCommunicationWithCreate(): OtherCommunication
    {
        if (!is_array($this->otherCommunication)) {
            $this->otherCommunication = [];
        }

        if ($this->otherCommunication === []) {
            $this->addOnceTootherCommunication(new OtherCommunication());
        }

        return $this->otherCommunication[0];
    }
}
