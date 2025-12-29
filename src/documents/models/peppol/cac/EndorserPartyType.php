<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\RoleCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\SequenceNumeric;
use JMS\Serializer\Annotation as JMS;

class EndorserPartyType
{
    use HandlesObjectFlags;

    /**
     * @var null|RoleCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\RoleCode")
     * @JMS\Expose
     * @JMS\SerializedName("RoleCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRoleCode", setter="setRoleCode")
     */
    private $roleCode;

    /**
     * @var null|SequenceNumeric
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\SequenceNumeric")
     * @JMS\Expose
     * @JMS\SerializedName("SequenceNumeric")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSequenceNumeric", setter="setSequenceNumeric")
     */
    private $sequenceNumeric;

    /**
     * @var null|Party
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\Party")
     * @JMS\Expose
     * @JMS\SerializedName("Party")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getParty", setter="setParty")
     */
    private $party;

    /**
     * @var null|SignatoryContact
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\SignatoryContact")
     * @JMS\Expose
     * @JMS\SerializedName("SignatoryContact")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSignatoryContact", setter="setSignatoryContact")
     */
    private $signatoryContact;

    /**
     * @return null|RoleCode
     */
    public function getRoleCode(): ?RoleCode
    {
        return $this->roleCode;
    }

    /**
     * @return RoleCode
     */
    public function getRoleCodeWithCreate(): RoleCode
    {
        $this->roleCode = is_null($this->roleCode) ? new RoleCode() : $this->roleCode;

        return $this->roleCode;
    }

    /**
     * @param  null|RoleCode $roleCode
     * @return static
     */
    public function setRoleCode(?RoleCode $roleCode = null): static
    {
        $this->roleCode = $roleCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRoleCode(): static
    {
        $this->roleCode = null;

        return $this;
    }

    /**
     * @return null|SequenceNumeric
     */
    public function getSequenceNumeric(): ?SequenceNumeric
    {
        return $this->sequenceNumeric;
    }

    /**
     * @return SequenceNumeric
     */
    public function getSequenceNumericWithCreate(): SequenceNumeric
    {
        $this->sequenceNumeric = is_null($this->sequenceNumeric) ? new SequenceNumeric() : $this->sequenceNumeric;

        return $this->sequenceNumeric;
    }

    /**
     * @param  null|SequenceNumeric $sequenceNumeric
     * @return static
     */
    public function setSequenceNumeric(?SequenceNumeric $sequenceNumeric = null): static
    {
        $this->sequenceNumeric = $sequenceNumeric;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSequenceNumeric(): static
    {
        $this->sequenceNumeric = null;

        return $this;
    }

    /**
     * @return null|Party
     */
    public function getParty(): ?Party
    {
        return $this->party;
    }

    /**
     * @return Party
     */
    public function getPartyWithCreate(): Party
    {
        $this->party = is_null($this->party) ? new Party() : $this->party;

        return $this->party;
    }

    /**
     * @param  null|Party $party
     * @return static
     */
    public function setParty(?Party $party = null): static
    {
        $this->party = $party;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetParty(): static
    {
        $this->party = null;

        return $this;
    }

    /**
     * @return null|SignatoryContact
     */
    public function getSignatoryContact(): ?SignatoryContact
    {
        return $this->signatoryContact;
    }

    /**
     * @return SignatoryContact
     */
    public function getSignatoryContactWithCreate(): SignatoryContact
    {
        $this->signatoryContact = is_null($this->signatoryContact) ? new SignatoryContact() : $this->signatoryContact;

        return $this->signatoryContact;
    }

    /**
     * @param  null|SignatoryContact $signatoryContact
     * @return static
     */
    public function setSignatoryContact(?SignatoryContact $signatoryContact = null): static
    {
        $this->signatoryContact = $signatoryContact;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSignatoryContact(): static
    {
        $this->signatoryContact = null;

        return $this;
    }
}
