<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\AmountRate;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Description;
use horstoeko\invoicesuite\documents\models\peppol\cbc\GuaranteeTypeCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\LiabilityAmount;
use JMS\Serializer\Annotation as JMS;

class FinancialGuaranteeType
{
    use HandlesObjectFlags;

    /**
     * @var null|GuaranteeTypeCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\GuaranteeTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("GuaranteeTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getGuaranteeTypeCode", setter="setGuaranteeTypeCode")
     */
    private $guaranteeTypeCode;

    /**
     * @var null|array<Description>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\Description>")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Description", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $description;

    /**
     * @var null|LiabilityAmount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\LiabilityAmount")
     * @JMS\Expose
     * @JMS\SerializedName("LiabilityAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLiabilityAmount", setter="setLiabilityAmount")
     */
    private $liabilityAmount;

    /**
     * @var null|AmountRate
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\AmountRate")
     * @JMS\Expose
     * @JMS\SerializedName("AmountRate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAmountRate", setter="setAmountRate")
     */
    private $amountRate;

    /**
     * @var null|ConstitutionPeriod
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\ConstitutionPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("ConstitutionPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getConstitutionPeriod", setter="setConstitutionPeriod")
     */
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
        $this->guaranteeTypeCode = is_null($this->guaranteeTypeCode) ? new GuaranteeTypeCode() : $this->guaranteeTypeCode;

        return $this->guaranteeTypeCode;
    }

    /**
     * @param  null|GuaranteeTypeCode $guaranteeTypeCode
     * @return static
     */
    public function setGuaranteeTypeCode(?GuaranteeTypeCode $guaranteeTypeCode = null): static
    {
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
    public function setDescription(?array $description = null): static
    {
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
        $description = reset($description);

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
        $description = end($description);

        if (false === $description) {
            return null;
        }

        return $description;
    }

    /**
     * @param  Description $description
     * @return static
     */
    public function addToDescription(Description $description): static
    {
        $this->description[] = $description;

        return $this;
    }

    /**
     * @return Description
     */
    public function addToDescriptionWithCreate(): Description
    {
        $this->addTodescription($description = new Description());

        return $description;
    }

    /**
     * @param  Description $description
     * @return static
     */
    public function addOnceToDescription(Description $description): static
    {
        if (!is_array($this->description)) {
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
        if (!is_array($this->description)) {
            $this->description = [];
        }

        if ([] === $this->description) {
            $this->addOnceTodescription(new Description());
        }

        return $this->description[0];
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
        $this->liabilityAmount = is_null($this->liabilityAmount) ? new LiabilityAmount() : $this->liabilityAmount;

        return $this->liabilityAmount;
    }

    /**
     * @param  null|LiabilityAmount $liabilityAmount
     * @return static
     */
    public function setLiabilityAmount(?LiabilityAmount $liabilityAmount = null): static
    {
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
        $this->amountRate = is_null($this->amountRate) ? new AmountRate() : $this->amountRate;

        return $this->amountRate;
    }

    /**
     * @param  null|AmountRate $amountRate
     * @return static
     */
    public function setAmountRate(?AmountRate $amountRate = null): static
    {
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
        $this->constitutionPeriod = is_null($this->constitutionPeriod) ? new ConstitutionPeriod() : $this->constitutionPeriod;

        return $this->constitutionPeriod;
    }

    /**
     * @param  null|ConstitutionPeriod $constitutionPeriod
     * @return static
     */
    public function setConstitutionPeriod(?ConstitutionPeriod $constitutionPeriod = null): static
    {
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
