<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Amount;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Duty;
use horstoeko\invoicesuite\documents\models\peppol\cbc\DutyCode;
use JMS\Serializer\Annotation as JMS;

class DutyType
{
    use HandlesObjectFlags;

    /**
     * @var null|Amount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\Amount")
     * @JMS\Expose
     * @JMS\SerializedName("Amount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAmount", setter="setAmount")
     */
    private $amount;

    /**
     * @var null|Duty
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\Duty")
     * @JMS\Expose
     * @JMS\SerializedName("Duty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDuty", setter="setDuty")
     */
    private $duty;

    /**
     * @var null|DutyCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\DutyCode")
     * @JMS\Expose
     * @JMS\SerializedName("DutyCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDutyCode", setter="setDutyCode")
     */
    private $dutyCode;

    /**
     * @var null|TaxCategory
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\TaxCategory")
     * @JMS\Expose
     * @JMS\SerializedName("TaxCategory")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTaxCategory", setter="setTaxCategory")
     */
    private $taxCategory;

    /**
     * @return null|Amount
     */
    public function getAmount(): ?Amount
    {
        return $this->amount;
    }

    /**
     * @return Amount
     */
    public function getAmountWithCreate(): Amount
    {
        $this->amount = is_null($this->amount) ? new Amount() : $this->amount;

        return $this->amount;
    }

    /**
     * @param  null|Amount $amount
     * @return static
     */
    public function setAmount(?Amount $amount = null): static
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAmount(): static
    {
        $this->amount = null;

        return $this;
    }

    /**
     * @return null|Duty
     */
    public function getDuty(): ?Duty
    {
        return $this->duty;
    }

    /**
     * @return Duty
     */
    public function getDutyWithCreate(): Duty
    {
        $this->duty = is_null($this->duty) ? new Duty() : $this->duty;

        return $this->duty;
    }

    /**
     * @param  null|Duty $duty
     * @return static
     */
    public function setDuty(?Duty $duty = null): static
    {
        $this->duty = $duty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDuty(): static
    {
        $this->duty = null;

        return $this;
    }

    /**
     * @return null|DutyCode
     */
    public function getDutyCode(): ?DutyCode
    {
        return $this->dutyCode;
    }

    /**
     * @return DutyCode
     */
    public function getDutyCodeWithCreate(): DutyCode
    {
        $this->dutyCode = is_null($this->dutyCode) ? new DutyCode() : $this->dutyCode;

        return $this->dutyCode;
    }

    /**
     * @param  null|DutyCode $dutyCode
     * @return static
     */
    public function setDutyCode(?DutyCode $dutyCode = null): static
    {
        $this->dutyCode = $dutyCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDutyCode(): static
    {
        $this->dutyCode = null;

        return $this;
    }

    /**
     * @return null|TaxCategory
     */
    public function getTaxCategory(): ?TaxCategory
    {
        return $this->taxCategory;
    }

    /**
     * @return TaxCategory
     */
    public function getTaxCategoryWithCreate(): TaxCategory
    {
        $this->taxCategory = is_null($this->taxCategory) ? new TaxCategory() : $this->taxCategory;

        return $this->taxCategory;
    }

    /**
     * @param  null|TaxCategory $taxCategory
     * @return static
     */
    public function setTaxCategory(?TaxCategory $taxCategory = null): static
    {
        $this->taxCategory = $taxCategory;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTaxCategory(): static
    {
        $this->taxCategory = null;

        return $this;
    }
}
