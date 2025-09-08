<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\BudgetYearNumeric;
use horstoeko\invoicesuite\models\ubl\cbc\ID;

class BudgetAccountType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ID")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\BudgetYearNumeric|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\BudgetYearNumeric")
     * @JMS\Expose
     * @JMS\SerializedName("BudgetYearNumeric")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getBudgetYearNumeric", setter="setBudgetYearNumeric")
     */
    private $budgetYearNumeric;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\RequiredClassificationScheme|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\RequiredClassificationScheme")
     * @JMS\Expose
     * @JMS\SerializedName("RequiredClassificationScheme")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRequiredClassificationScheme", setter="setRequiredClassificationScheme")
     */
    private $requiredClassificationScheme;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ID|null
     */
    public function getID(): ?ID
    {
        return $this->iD;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ID
     */
    public function getIDWithCreate(): ID
    {
        $this->iD = is_null($this->iD) ? new ID() : $this->iD;

        return $this->iD;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ID|null $iD
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
     * @return \horstoeko\invoicesuite\models\ubl\cbc\BudgetYearNumeric|null
     */
    public function getBudgetYearNumeric(): ?BudgetYearNumeric
    {
        return $this->budgetYearNumeric;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\BudgetYearNumeric
     */
    public function getBudgetYearNumericWithCreate(): BudgetYearNumeric
    {
        $this->budgetYearNumeric = is_null($this->budgetYearNumeric) ? new BudgetYearNumeric() : $this->budgetYearNumeric;

        return $this->budgetYearNumeric;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\BudgetYearNumeric|null $budgetYearNumeric
     * @return self
     */
    public function setBudgetYearNumeric(?BudgetYearNumeric $budgetYearNumeric = null): self
    {
        $this->budgetYearNumeric = $budgetYearNumeric;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetBudgetYearNumeric(): self
    {
        $this->budgetYearNumeric = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\RequiredClassificationScheme|null
     */
    public function getRequiredClassificationScheme(): ?RequiredClassificationScheme
    {
        return $this->requiredClassificationScheme;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\RequiredClassificationScheme
     */
    public function getRequiredClassificationSchemeWithCreate(): RequiredClassificationScheme
    {
        $this->requiredClassificationScheme = is_null($this->requiredClassificationScheme) ? new RequiredClassificationScheme() : $this->requiredClassificationScheme;

        return $this->requiredClassificationScheme;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\RequiredClassificationScheme|null $requiredClassificationScheme
     * @return self
     */
    public function setRequiredClassificationScheme(
        ?RequiredClassificationScheme $requiredClassificationScheme = null,
    ): self {
        $this->requiredClassificationScheme = $requiredClassificationScheme;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetRequiredClassificationScheme(): self
    {
        $this->requiredClassificationScheme = null;

        return $this;
    }
}
