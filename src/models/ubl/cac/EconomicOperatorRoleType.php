<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\RoleCode;
use horstoeko\invoicesuite\models\ubl\cbc\RoleDescription;

class EconomicOperatorRoleType
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
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\RoleDescription>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\RoleDescription>")
     * @JMS\Expose
     * @JMS\SerializedName("RoleDescription")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="RoleDescription", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getRoleDescription", setter="setRoleDescription")
     */
    private $roleDescription;

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
     * @return self
     */
    public function unsetRoleCode(): self
    {
        $this->roleCode = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\RoleDescription>|null
     */
    public function getRoleDescription(): ?array
    {
        return $this->roleDescription;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\RoleDescription>|null $roleDescription
     * @return self
     */
    public function setRoleDescription(?array $roleDescription = null): self
    {
        $this->roleDescription = $roleDescription;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetRoleDescription(): self
    {
        $this->roleDescription = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearRoleDescription(): self
    {
        $this->roleDescription = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\RoleDescription $roleDescription
     * @return self
     */
    public function addToRoleDescription(RoleDescription $roleDescription): self
    {
        $this->roleDescription[] = $roleDescription;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\RoleDescription
     */
    public function addToRoleDescriptionWithCreate(): RoleDescription
    {
        $this->addToroleDescription($roleDescription = new RoleDescription());

        return $roleDescription;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\RoleDescription $roleDescription
     * @return self
     */
    public function addOnceToRoleDescription(RoleDescription $roleDescription): self
    {
        if (!is_array($this->roleDescription)) {
            $this->roleDescription = [];
        }

        $this->roleDescription[0] = $roleDescription;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\RoleDescription
     */
    public function addOnceToRoleDescriptionWithCreate(): RoleDescription
    {
        if (!is_array($this->roleDescription)) {
            $this->roleDescription = [];
        }

        if ($this->roleDescription === []) {
            $this->addOnceToroleDescription(new RoleDescription());
        }

        return $this->roleDescription[0];
    }
}
