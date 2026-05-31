<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\RoleCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\RoleDescription;
use JMS\Serializer\Annotation as JMS;

class EconomicOperatorRoleType
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
     * @var null|array<RoleDescription>
     */
    #[JMS\Accessor(getter: 'getRoleDescription', setter: 'setRoleDescription')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('RoleDescription')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\RoleDescription>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'RoleDescription', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $roleDescription;

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
     * @return null|array<RoleDescription>
     */
    public function getRoleDescription(): ?array
    {
        return $this->roleDescription;
    }

    /**
     * @param  null|array<RoleDescription> $roleDescription
     * @return static
     */
    public function setRoleDescription(
        ?array $roleDescription = null
    ): static {
        $this->roleDescription = $roleDescription;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRoleDescription(): static
    {
        $this->roleDescription = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearRoleDescription(): static
    {
        $this->roleDescription = [];

        return $this;
    }

    /**
     * @return null|RoleDescription
     */
    public function firstRoleDescription(): ?RoleDescription
    {
        $roleDescription = $this->roleDescription ?? [];
        $roleDescription = reset($roleDescription);

        if (false === $roleDescription) {
            return null;
        }

        return $roleDescription;
    }

    /**
     * @return null|RoleDescription
     */
    public function lastRoleDescription(): ?RoleDescription
    {
        $roleDescription = $this->roleDescription ?? [];
        $roleDescription = end($roleDescription);

        if (false === $roleDescription) {
            return null;
        }

        return $roleDescription;
    }

    /**
     * @param  RoleDescription $roleDescription
     * @return static
     */
    public function addToRoleDescription(
        RoleDescription $roleDescription
    ): static {
        $this->roleDescription[] = $roleDescription;

        return $this;
    }

    /**
     * @return RoleDescription
     */
    public function addToRoleDescriptionWithCreate(): RoleDescription
    {
        $this->addToRoleDescription($roleDescription = new RoleDescription());

        return $roleDescription;
    }

    /**
     * @param  RoleDescription $roleDescription
     * @return static
     */
    public function addOnceToRoleDescription(
        RoleDescription $roleDescription
    ): static {
        if (!is_array($this->roleDescription)) {
            $this->roleDescription = [];
        }

        $this->roleDescription[0] = $roleDescription;

        return $this;
    }

    /**
     * @return RoleDescription
     */
    public function addOnceToRoleDescriptionWithCreate(): RoleDescription
    {
        if (!is_array($this->roleDescription)) {
            $this->roleDescription = [];
        }

        if ([] === $this->roleDescription) {
            $this->addOnceToRoleDescription(new RoleDescription());
        }

        return $this->roleDescription[0];
    }
}
