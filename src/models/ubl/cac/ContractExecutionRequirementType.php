<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\Description;
use horstoeko\invoicesuite\models\ubl\cbc\ExecutionRequirementCode;
use horstoeko\invoicesuite\models\ubl\cbc\Name;

class ContractExecutionRequirementType
{
    use HandlesObjectFlags;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\Name>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\Name>")
     * @JMS\Expose
     * @JMS\SerializedName("Name")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Name", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getName", setter="setName")
     */
    private $name;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ExecutionRequirementCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ExecutionRequirementCode")
     * @JMS\Expose
     * @JMS\SerializedName("ExecutionRequirementCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getExecutionRequirementCode", setter="setExecutionRequirementCode")
     */
    private $executionRequirementCode;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\Description>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\Description>")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Description", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $description;

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\Name>|null
     */
    public function getName(): ?array
    {
        return $this->name;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\Name>|null $name
     * @return self
     */
    public function setName(?array $name = null): self
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
     * @return self
     */
    public function clearName(): self
    {
        $this->name = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Name $name
     * @return self
     */
    public function addToName(Name $name): self
    {
        $this->name[] = $name;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Name
     */
    public function addToNameWithCreate(): Name
    {
        $this->addToname($name = new Name());

        return $name;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Name $name
     * @return self
     */
    public function addOnceToName(Name $name): self
    {
        if (!is_array($this->name)) {
            $this->name = [];
        }

        $this->name[0] = $name;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Name
     */
    public function addOnceToNameWithCreate(): Name
    {
        if (!is_array($this->name)) {
            $this->name = [];
        }

        if ($this->name === []) {
            $this->addOnceToname(new Name());
        }

        return $this->name[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ExecutionRequirementCode|null
     */
    public function getExecutionRequirementCode(): ?ExecutionRequirementCode
    {
        return $this->executionRequirementCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ExecutionRequirementCode
     */
    public function getExecutionRequirementCodeWithCreate(): ExecutionRequirementCode
    {
        $this->executionRequirementCode = is_null($this->executionRequirementCode) ? new ExecutionRequirementCode() : $this->executionRequirementCode;

        return $this->executionRequirementCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ExecutionRequirementCode|null $executionRequirementCode
     * @return self
     */
    public function setExecutionRequirementCode(?ExecutionRequirementCode $executionRequirementCode = null): self
    {
        $this->executionRequirementCode = $executionRequirementCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetExecutionRequirementCode(): self
    {
        $this->executionRequirementCode = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\Description>|null
     */
    public function getDescription(): ?array
    {
        return $this->description;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\Description>|null $description
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
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Description $description
     * @return self
     */
    public function addToDescription(Description $description): self
    {
        $this->description[] = $description;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Description
     */
    public function addToDescriptionWithCreate(): Description
    {
        $this->addTodescription($description = new Description());

        return $description;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Description $description
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
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Description
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
}
