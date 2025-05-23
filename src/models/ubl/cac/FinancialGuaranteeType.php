<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\AmountRate;
use horstoeko\invoicesuite\models\ubl\cbc\Description;
use horstoeko\invoicesuite\models\ubl\cbc\GuaranteeTypeCode;
use horstoeko\invoicesuite\models\ubl\cbc\LiabilityAmount;

class FinancialGuaranteeType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\GuaranteeTypeCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\GuaranteeTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("GuaranteeTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getGuaranteeTypeCode", setter="setGuaranteeTypeCode")
     */
    private $guaranteeTypeCode;

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
     * @var \horstoeko\invoicesuite\models\ubl\cbc\LiabilityAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\LiabilityAmount")
     * @JMS\Expose
     * @JMS\SerializedName("LiabilityAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLiabilityAmount", setter="setLiabilityAmount")
     */
    private $liabilityAmount;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\AmountRate|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\AmountRate")
     * @JMS\Expose
     * @JMS\SerializedName("AmountRate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAmountRate", setter="setAmountRate")
     */
    private $amountRate;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\ConstitutionPeriod|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\ConstitutionPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("ConstitutionPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getConstitutionPeriod", setter="setConstitutionPeriod")
     */
    private $constitutionPeriod;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\GuaranteeTypeCode|null
     */
    public function getGuaranteeTypeCode(): ?GuaranteeTypeCode
    {
        return $this->guaranteeTypeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\GuaranteeTypeCode
     */
    public function getGuaranteeTypeCodeWithCreate(): GuaranteeTypeCode
    {
        $this->guaranteeTypeCode = is_null($this->guaranteeTypeCode) ? new GuaranteeTypeCode() : $this->guaranteeTypeCode;

        return $this->guaranteeTypeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\GuaranteeTypeCode|null $guaranteeTypeCode
     * @return self
     */
    public function setGuaranteeTypeCode(?GuaranteeTypeCode $guaranteeTypeCode = null): self
    {
        $this->guaranteeTypeCode = $guaranteeTypeCode;

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

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\LiabilityAmount|null
     */
    public function getLiabilityAmount(): ?LiabilityAmount
    {
        return $this->liabilityAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\LiabilityAmount
     */
    public function getLiabilityAmountWithCreate(): LiabilityAmount
    {
        $this->liabilityAmount = is_null($this->liabilityAmount) ? new LiabilityAmount() : $this->liabilityAmount;

        return $this->liabilityAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\LiabilityAmount|null $liabilityAmount
     * @return self
     */
    public function setLiabilityAmount(?LiabilityAmount $liabilityAmount = null): self
    {
        $this->liabilityAmount = $liabilityAmount;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\AmountRate|null
     */
    public function getAmountRate(): ?AmountRate
    {
        return $this->amountRate;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\AmountRate
     */
    public function getAmountRateWithCreate(): AmountRate
    {
        $this->amountRate = is_null($this->amountRate) ? new AmountRate() : $this->amountRate;

        return $this->amountRate;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\AmountRate|null $amountRate
     * @return self
     */
    public function setAmountRate(?AmountRate $amountRate = null): self
    {
        $this->amountRate = $amountRate;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ConstitutionPeriod|null
     */
    public function getConstitutionPeriod(): ?ConstitutionPeriod
    {
        return $this->constitutionPeriod;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ConstitutionPeriod
     */
    public function getConstitutionPeriodWithCreate(): ConstitutionPeriod
    {
        $this->constitutionPeriod = is_null($this->constitutionPeriod) ? new ConstitutionPeriod() : $this->constitutionPeriod;

        return $this->constitutionPeriod;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ConstitutionPeriod|null $constitutionPeriod
     * @return self
     */
    public function setConstitutionPeriod(?ConstitutionPeriod $constitutionPeriod = null): self
    {
        $this->constitutionPeriod = $constitutionPeriod;

        return $this;
    }
}
