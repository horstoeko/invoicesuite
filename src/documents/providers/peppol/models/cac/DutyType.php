<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Amount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Duty;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\DutyCode;
use JMS\Serializer\Annotation as JMS;

class DutyType
{
    use HandlesObjectFlags;

    /**
     * @var null|Amount
     */
    #[JMS\Accessor(getter: 'getAmount', setter: 'setAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Amount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Amount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $amount;

    /**
     * @var null|Duty
     */
    #[JMS\Accessor(getter: 'getDuty', setter: 'setDuty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Duty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Duty')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $duty;

    /**
     * @var null|DutyCode
     */
    #[JMS\Accessor(getter: 'getDutyCode', setter: 'setDutyCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('DutyCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\DutyCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $dutyCode;

    /**
     * @var null|TaxCategory
     */
    #[JMS\Accessor(getter: 'getTaxCategory', setter: 'setTaxCategory')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TaxCategory')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\TaxCategory')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
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
        $this->amount ??= new Amount();

        return $this->amount;
    }

    /**
     * @param  null|Amount $amount
     * @return static
     */
    public function setAmount(
        ?Amount $amount = null
    ): static {
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
        $this->duty ??= new Duty();

        return $this->duty;
    }

    /**
     * @param  null|Duty $duty
     * @return static
     */
    public function setDuty(
        ?Duty $duty = null
    ): static {
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
        $this->dutyCode ??= new DutyCode();

        return $this->dutyCode;
    }

    /**
     * @param  null|DutyCode $dutyCode
     * @return static
     */
    public function setDutyCode(
        ?DutyCode $dutyCode = null
    ): static {
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
        $this->taxCategory ??= new TaxCategory();

        return $this->taxCategory;
    }

    /**
     * @param  null|TaxCategory $taxCategory
     * @return static
     */
    public function setTaxCategory(
        ?TaxCategory $taxCategory = null
    ): static {
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
