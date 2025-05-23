<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\RoleCode;
use horstoeko\invoicesuite\models\ubl\cbc\SequenceNumeric;

class EndorserPartyType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\RoleCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\RoleCode")
     * @JMS\Expose
     * @JMS\SerializedName("RoleCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRoleCode", setter="setRoleCode")
     */
    private $roleCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\SequenceNumeric|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\SequenceNumeric")
     * @JMS\Expose
     * @JMS\SerializedName("SequenceNumeric")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSequenceNumeric", setter="setSequenceNumeric")
     */
    private $sequenceNumeric;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\Party|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\Party")
     * @JMS\Expose
     * @JMS\SerializedName("Party")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getParty", setter="setParty")
     */
    private $party;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\SignatoryContact|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\SignatoryContact")
     * @JMS\Expose
     * @JMS\SerializedName("SignatoryContact")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSignatoryContact", setter="setSignatoryContact")
     */
    private $signatoryContact;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\RoleCode|null
     */
    public function getRoleCode(): ?RoleCode
    {
        return $this->roleCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\RoleCode
     */
    public function getRoleCodeWithCreate(): RoleCode
    {
        $this->roleCode = is_null($this->roleCode) ? new RoleCode() : $this->roleCode;

        return $this->roleCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\RoleCode|null $roleCode
     * @return self
     */
    public function setRoleCode(?RoleCode $roleCode = null): self
    {
        $this->roleCode = $roleCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\SequenceNumeric|null
     */
    public function getSequenceNumeric(): ?SequenceNumeric
    {
        return $this->sequenceNumeric;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\SequenceNumeric
     */
    public function getSequenceNumericWithCreate(): SequenceNumeric
    {
        $this->sequenceNumeric = is_null($this->sequenceNumeric) ? new SequenceNumeric() : $this->sequenceNumeric;

        return $this->sequenceNumeric;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\SequenceNumeric|null $sequenceNumeric
     * @return self
     */
    public function setSequenceNumeric(?SequenceNumeric $sequenceNumeric = null): self
    {
        $this->sequenceNumeric = $sequenceNumeric;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Party|null
     */
    public function getParty(): ?Party
    {
        return $this->party;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Party
     */
    public function getPartyWithCreate(): Party
    {
        $this->party = is_null($this->party) ? new Party() : $this->party;

        return $this->party;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Party|null $party
     * @return self
     */
    public function setParty(?Party $party = null): self
    {
        $this->party = $party;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\SignatoryContact|null
     */
    public function getSignatoryContact(): ?SignatoryContact
    {
        return $this->signatoryContact;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\SignatoryContact
     */
    public function getSignatoryContactWithCreate(): SignatoryContact
    {
        $this->signatoryContact = is_null($this->signatoryContact) ? new SignatoryContact() : $this->signatoryContact;

        return $this->signatoryContact;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\SignatoryContact|null $signatoryContact
     * @return self
     */
    public function setSignatoryContact(?SignatoryContact $signatoryContact = null): self
    {
        $this->signatoryContact = $signatoryContact;

        return $this;
    }
}
