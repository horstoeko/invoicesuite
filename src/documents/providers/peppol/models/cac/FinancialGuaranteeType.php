<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\AmountRate;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Description;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\GuaranteeTypeCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LiabilityAmount;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use JMS\Serializer\Annotation as JMS;

class FinancialGuaranteeType
{
    use HandlesObjectFlags;

    /**
     * @var null|GuaranteeTypeCode
     */
    #[JMS\Accessor(getter: 'getGuaranteeTypeCode', setter: 'setGuaranteeTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('GuaranteeTypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\GuaranteeTypeCode')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $guaranteeTypeCode;

    /**
     * @var null|array<Description>
     */
    #[JMS\Accessor(getter: 'getDescription', setter: 'setDescription')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Description')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Description>')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[JMS\XmlList(entry: 'Description', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $description;

    /**
     * @var null|LiabilityAmount
     */
    #[JMS\Accessor(getter: 'getLiabilityAmount', setter: 'setLiabilityAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('LiabilityAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LiabilityAmount')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $liabilityAmount;

    /**
     * @var null|AmountRate
     */
    #[JMS\Accessor(getter: 'getAmountRate', setter: 'setAmountRate')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('AmountRate')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\AmountRate')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $amountRate;

    /**
     * @var null|ConstitutionPeriod
     */
    #[JMS\Accessor(getter: 'getConstitutionPeriod', setter: 'setConstitutionPeriod')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ConstitutionPeriod')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\ConstitutionPeriod')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $constitutionPeriod;

    /**
     * @return null|GuaranteeTypeCode
     */
    public function getGuaranteeTypeCode(): ?GuaranteeTypeCode
    {
        return $this->guaranteeTypeCode;
    }

    /**
     * @return GuaranteeTypeCode
     */
    public function getGuaranteeTypeCodeWithCreate(): GuaranteeTypeCode
    {
        $this->guaranteeTypeCode ??= new GuaranteeTypeCode();

        return $this->guaranteeTypeCode;
    }

    /**
     * @param  null|GuaranteeTypeCode $guaranteeTypeCode
     * @return static
     */
    public function setGuaranteeTypeCode(
        ?GuaranteeTypeCode $guaranteeTypeCode = null
    ): static {
        $this->guaranteeTypeCode = $guaranteeTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetGuaranteeTypeCode(): static
    {
        $this->guaranteeTypeCode = null;

        return $this;
    }

    /**
     * @return null|array<Description>
     */
    public function getDescription(): ?array
    {
        return $this->description;
    }

    /**
     * @param  null|array<Description> $description
     * @return static
     */
    public function setDescription(
        ?array $description = null
    ): static {
        $this->description = $description;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDescription(): static
    {
        $this->description = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearDescription(): static
    {
        $this->description = [];

        return $this;
    }

    /**
     * @return null|Description
     */
    public function firstDescription(): ?Description
    {
        $description = $this->description ?? [];
        $description = InvoiceSuiteArrayUtils::first($description);

        if (false === $description) {
            return null;
        }

        return $description;
    }

    /**
     * @return null|Description
     */
    public function lastDescription(): ?Description
    {
        $description = $this->description ?? [];
        $description = InvoiceSuiteArrayUtils::last($description);

        if (false === $description) {
            return null;
        }

        return $description;
    }

    /**
     * @param  Description $description
     * @return static
     */
    public function addToDescription(
        Description $description
    ): static {
        $this->description[] = $description;

        return $this;
    }

    /**
     * @return Description
     */
    public function addToDescriptionWithCreate(): Description
    {
        $this->addToDescription($description = new Description());

        return $description;
    }

    /**
     * @param  Description $description
     * @return static
     */
    public function addOnceToDescription(
        Description $description
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->description)) {
            $this->description = [];
        }

        $this->description[0] = $description;

        return $this;
    }

    /**
     * @return Description
     */
    public function addOnceToDescriptionWithCreate(): Description
    {
        if (!InvoiceSuiteArrayUtils::is($this->description)) {
            $this->description = [];
        }

        if (InvoiceSuiteArrayUtils::empty($this->description)) {
            $this->addOnceToDescription(new Description());
        }

        return $this->description[0];
    }

    /**
     * Execute a callback for each item
     *
     * @param  callable(Description): mixed $callback
     * @return static
     */
    public function forEachDescription(
        callable $callback
    ): static {
        foreach ($this->description ?? [] as $description) {
            $callback($description);
        }

        return $this;
    }

    /**
     * @return null|LiabilityAmount
     */
    public function getLiabilityAmount(): ?LiabilityAmount
    {
        return $this->liabilityAmount;
    }

    /**
     * @return LiabilityAmount
     */
    public function getLiabilityAmountWithCreate(): LiabilityAmount
    {
        $this->liabilityAmount ??= new LiabilityAmount();

        return $this->liabilityAmount;
    }

    /**
     * @param  null|LiabilityAmount $liabilityAmount
     * @return static
     */
    public function setLiabilityAmount(
        ?LiabilityAmount $liabilityAmount = null
    ): static {
        $this->liabilityAmount = $liabilityAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLiabilityAmount(): static
    {
        $this->liabilityAmount = null;

        return $this;
    }

    /**
     * @return null|AmountRate
     */
    public function getAmountRate(): ?AmountRate
    {
        return $this->amountRate;
    }

    /**
     * @return AmountRate
     */
    public function getAmountRateWithCreate(): AmountRate
    {
        $this->amountRate ??= new AmountRate();

        return $this->amountRate;
    }

    /**
     * @param  null|AmountRate $amountRate
     * @return static
     */
    public function setAmountRate(
        ?AmountRate $amountRate = null
    ): static {
        $this->amountRate = $amountRate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAmountRate(): static
    {
        $this->amountRate = null;

        return $this;
    }

    /**
     * @return null|ConstitutionPeriod
     */
    public function getConstitutionPeriod(): ?ConstitutionPeriod
    {
        return $this->constitutionPeriod;
    }

    /**
     * @return ConstitutionPeriod
     */
    public function getConstitutionPeriodWithCreate(): ConstitutionPeriod
    {
        $this->constitutionPeriod ??= new ConstitutionPeriod();

        return $this->constitutionPeriod;
    }

    /**
     * @param  null|ConstitutionPeriod $constitutionPeriod
     * @return static
     */
    public function setConstitutionPeriod(
        ?ConstitutionPeriod $constitutionPeriod = null
    ): static {
        $this->constitutionPeriod = $constitutionPeriod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetConstitutionPeriod(): static
    {
        $this->constitutionPeriod = null;

        return $this;
    }
}
