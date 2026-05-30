<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\RoleCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SequenceNumeric;
use JMS\Serializer\Annotation as JMS;

class EndorserPartyType
{
    use HandlesObjectFlags;

    /**
     * @var null|RoleCode
     */
    #[JMS\Accessor(getter: 'getRoleCode', setter: 'setRoleCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('RoleCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\RoleCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $roleCode;

    /**
     * @var null|SequenceNumeric
     */
    #[JMS\Accessor(getter: 'getSequenceNumeric', setter: 'setSequenceNumeric')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SequenceNumeric')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SequenceNumeric')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $sequenceNumeric;

    /**
     * @var null|Party
     */
    #[JMS\Accessor(getter: 'getParty', setter: 'setParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Party')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\Party')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $party;

    /**
     * @var null|SignatoryContact
     */
    #[JMS\Accessor(getter: 'getSignatoryContact', setter: 'setSignatoryContact')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SignatoryContact')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\SignatoryContact')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
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
        $this->roleCode ??= new RoleCode();

        return $this->roleCode;
    }

    /**
     * @param  null|RoleCode $roleCode
     * @return static
     */
    public function setRoleCode(
        ?RoleCode $roleCode = null
    ): static {
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
        $this->sequenceNumeric ??= new SequenceNumeric();

        return $this->sequenceNumeric;
    }

    /**
     * @param  null|SequenceNumeric $sequenceNumeric
     * @return static
     */
    public function setSequenceNumeric(
        ?SequenceNumeric $sequenceNumeric = null
    ): static {
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
        $this->party ??= new Party();

        return $this->party;
    }

    /**
     * @param  null|Party $party
     * @return static
     */
    public function setParty(
        ?Party $party = null
    ): static {
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
        $this->signatoryContact ??= new SignatoryContact();

        return $this->signatoryContact;
    }

    /**
     * @param  null|SignatoryContact $signatoryContact
     * @return static
     */
    public function setSignatoryContact(
        ?SignatoryContact $signatoryContact = null
    ): static {
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
