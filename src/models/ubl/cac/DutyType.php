<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\Amount;
use horstoeko\invoicesuite\models\ubl\cbc\Duty;
use horstoeko\invoicesuite\models\ubl\cbc\DutyCode;

class DutyType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\Amount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\Amount")
     * @JMS\Expose
     * @JMS\SerializedName("Amount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAmount", setter="setAmount")
     */
    private $amount;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\Duty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\Duty")
     * @JMS\Expose
     * @JMS\SerializedName("Duty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDuty", setter="setDuty")
     */
    private $duty;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\DutyCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\DutyCode")
     * @JMS\Expose
     * @JMS\SerializedName("DutyCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDutyCode", setter="setDutyCode")
     */
    private $dutyCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\TaxCategory|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\TaxCategory")
     * @JMS\Expose
     * @JMS\SerializedName("TaxCategory")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTaxCategory", setter="setTaxCategory")
     */
    private $taxCategory;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Amount|null
     */
    public function getAmount(): ?Amount
    {
        return $this->amount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Amount
     */
    public function getAmountWithCreate(): Amount
    {
        $this->amount = is_null($this->amount) ? new Amount() : $this->amount;

        return $this->amount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Amount|null $amount
     * @return self
     */
    public function setAmount(?Amount $amount = null): self
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Duty|null
     */
    public function getDuty(): ?Duty
    {
        return $this->duty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Duty
     */
    public function getDutyWithCreate(): Duty
    {
        $this->duty = is_null($this->duty) ? new Duty() : $this->duty;

        return $this->duty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Duty|null $duty
     * @return self
     */
    public function setDuty(?Duty $duty = null): self
    {
        $this->duty = $duty;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\DutyCode|null
     */
    public function getDutyCode(): ?DutyCode
    {
        return $this->dutyCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\DutyCode
     */
    public function getDutyCodeWithCreate(): DutyCode
    {
        $this->dutyCode = is_null($this->dutyCode) ? new DutyCode() : $this->dutyCode;

        return $this->dutyCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\DutyCode|null $dutyCode
     * @return self
     */
    public function setDutyCode(?DutyCode $dutyCode = null): self
    {
        $this->dutyCode = $dutyCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TaxCategory|null
     */
    public function getTaxCategory(): ?TaxCategory
    {
        return $this->taxCategory;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TaxCategory
     */
    public function getTaxCategoryWithCreate(): TaxCategory
    {
        $this->taxCategory = is_null($this->taxCategory) ? new TaxCategory() : $this->taxCategory;

        return $this->taxCategory;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\TaxCategory|null $taxCategory
     * @return self
     */
    public function setTaxCategory(?TaxCategory $taxCategory = null): self
    {
        $this->taxCategory = $taxCategory;

        return $this;
    }
}
