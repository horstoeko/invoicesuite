<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\Description;
use horstoeko\invoicesuite\models\ubl\cbc\LowTendersDescription;
use horstoeko\invoicesuite\models\ubl\cbc\PaymentDescription;
use horstoeko\invoicesuite\models\ubl\cbc\PrizeDescription;
use horstoeko\invoicesuite\models\ubl\cbc\TechnicalCommitteeDescription;
use horstoeko\invoicesuite\models\ubl\cbc\WeightingAlgorithmCode;

class AwardingTermsType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\WeightingAlgorithmCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\WeightingAlgorithmCode")
     * @JMS\Expose
     * @JMS\SerializedName("WeightingAlgorithmCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getWeightingAlgorithmCode", setter="setWeightingAlgorithmCode")
     */
    private $weightingAlgorithmCode;

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
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\TechnicalCommitteeDescription>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\TechnicalCommitteeDescription>")
     * @JMS\Expose
     * @JMS\SerializedName("TechnicalCommitteeDescription")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TechnicalCommitteeDescription", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getTechnicalCommitteeDescription", setter="setTechnicalCommitteeDescription")
     */
    private $technicalCommitteeDescription;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\LowTendersDescription>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\LowTendersDescription>")
     * @JMS\Expose
     * @JMS\SerializedName("LowTendersDescription")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="LowTendersDescription", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getLowTendersDescription", setter="setLowTendersDescription")
     */
    private $lowTendersDescription;

    /**
     * @var bool|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("PrizeIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPrizeIndicator", setter="setPrizeIndicator")
     */
    private $prizeIndicator;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\PrizeDescription>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\PrizeDescription>")
     * @JMS\Expose
     * @JMS\SerializedName("PrizeDescription")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PrizeDescription", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getPrizeDescription", setter="setPrizeDescription")
     */
    private $prizeDescription;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\PaymentDescription>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\PaymentDescription>")
     * @JMS\Expose
     * @JMS\SerializedName("PaymentDescription")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PaymentDescription", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getPaymentDescription", setter="setPaymentDescription")
     */
    private $paymentDescription;

    /**
     * @var bool|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("FollowupContractIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getFollowupContractIndicator", setter="setFollowupContractIndicator")
     */
    private $followupContractIndicator;

    /**
     * @var bool|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("BindingOnBuyerIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getBindingOnBuyerIndicator", setter="setBindingOnBuyerIndicator")
     */
    private $bindingOnBuyerIndicator;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\AwardingCriterion>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\AwardingCriterion>")
     * @JMS\Expose
     * @JMS\SerializedName("AwardingCriterion")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="AwardingCriterion", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getAwardingCriterion", setter="setAwardingCriterion")
     */
    private $awardingCriterion;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\TechnicalCommitteePerson>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\TechnicalCommitteePerson>")
     * @JMS\Expose
     * @JMS\SerializedName("TechnicalCommitteePerson")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TechnicalCommitteePerson", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getTechnicalCommitteePerson", setter="setTechnicalCommitteePerson")
     */
    private $technicalCommitteePerson;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\WeightingAlgorithmCode|null
     */
    public function getWeightingAlgorithmCode(): ?WeightingAlgorithmCode
    {
        return $this->weightingAlgorithmCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\WeightingAlgorithmCode
     */
    public function getWeightingAlgorithmCodeWithCreate(): WeightingAlgorithmCode
    {
        $this->weightingAlgorithmCode = is_null($this->weightingAlgorithmCode) ? new WeightingAlgorithmCode() : $this->weightingAlgorithmCode;

        return $this->weightingAlgorithmCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\WeightingAlgorithmCode|null $weightingAlgorithmCode
     * @return self
     */
    public function setWeightingAlgorithmCode(?WeightingAlgorithmCode $weightingAlgorithmCode = null): self
    {
        $this->weightingAlgorithmCode = $weightingAlgorithmCode;

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
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\TechnicalCommitteeDescription>|null
     */
    public function getTechnicalCommitteeDescription(): ?array
    {
        return $this->technicalCommitteeDescription;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\TechnicalCommitteeDescription>|null $technicalCommitteeDescription
     * @return self
     */
    public function setTechnicalCommitteeDescription(?array $technicalCommitteeDescription = null): self
    {
        $this->technicalCommitteeDescription = $technicalCommitteeDescription;

        return $this;
    }

    /**
     * @return self
     */
    public function clearTechnicalCommitteeDescription(): self
    {
        $this->technicalCommitteeDescription = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\TechnicalCommitteeDescription $technicalCommitteeDescription
     * @return self
     */
    public function addToTechnicalCommitteeDescription(
        TechnicalCommitteeDescription $technicalCommitteeDescription,
    ): self {
        $this->technicalCommitteeDescription[] = $technicalCommitteeDescription;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TechnicalCommitteeDescription
     */
    public function addToTechnicalCommitteeDescriptionWithCreate(): TechnicalCommitteeDescription
    {
        $this->addTotechnicalCommitteeDescription($technicalCommitteeDescription = new TechnicalCommitteeDescription());

        return $technicalCommitteeDescription;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\TechnicalCommitteeDescription $technicalCommitteeDescription
     * @return self
     */
    public function addOnceToTechnicalCommitteeDescription(
        TechnicalCommitteeDescription $technicalCommitteeDescription,
    ): self {
        if (!is_array($this->technicalCommitteeDescription)) {
            $this->technicalCommitteeDescription = [];
        }

        $this->technicalCommitteeDescription[0] = $technicalCommitteeDescription;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TechnicalCommitteeDescription
     */
    public function addOnceToTechnicalCommitteeDescriptionWithCreate(): TechnicalCommitteeDescription
    {
        if (!is_array($this->technicalCommitteeDescription)) {
            $this->technicalCommitteeDescription = [];
        }

        if ($this->technicalCommitteeDescription === []) {
            $this->addOnceTotechnicalCommitteeDescription(new TechnicalCommitteeDescription());
        }

        return $this->technicalCommitteeDescription[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\LowTendersDescription>|null
     */
    public function getLowTendersDescription(): ?array
    {
        return $this->lowTendersDescription;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\LowTendersDescription>|null $lowTendersDescription
     * @return self
     */
    public function setLowTendersDescription(?array $lowTendersDescription = null): self
    {
        $this->lowTendersDescription = $lowTendersDescription;

        return $this;
    }

    /**
     * @return self
     */
    public function clearLowTendersDescription(): self
    {
        $this->lowTendersDescription = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\LowTendersDescription $lowTendersDescription
     * @return self
     */
    public function addToLowTendersDescription(LowTendersDescription $lowTendersDescription): self
    {
        $this->lowTendersDescription[] = $lowTendersDescription;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\LowTendersDescription
     */
    public function addToLowTendersDescriptionWithCreate(): LowTendersDescription
    {
        $this->addTolowTendersDescription($lowTendersDescription = new LowTendersDescription());

        return $lowTendersDescription;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\LowTendersDescription $lowTendersDescription
     * @return self
     */
    public function addOnceToLowTendersDescription(LowTendersDescription $lowTendersDescription): self
    {
        if (!is_array($this->lowTendersDescription)) {
            $this->lowTendersDescription = [];
        }

        $this->lowTendersDescription[0] = $lowTendersDescription;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\LowTendersDescription
     */
    public function addOnceToLowTendersDescriptionWithCreate(): LowTendersDescription
    {
        if (!is_array($this->lowTendersDescription)) {
            $this->lowTendersDescription = [];
        }

        if ($this->lowTendersDescription === []) {
            $this->addOnceTolowTendersDescription(new LowTendersDescription());
        }

        return $this->lowTendersDescription[0];
    }

    /**
     * @return bool|null
     */
    public function getPrizeIndicator(): ?bool
    {
        return $this->prizeIndicator;
    }

    /**
     * @param bool|null $prizeIndicator
     * @return self
     */
    public function setPrizeIndicator(?bool $prizeIndicator = null): self
    {
        $this->prizeIndicator = $prizeIndicator;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\PrizeDescription>|null
     */
    public function getPrizeDescription(): ?array
    {
        return $this->prizeDescription;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\PrizeDescription>|null $prizeDescription
     * @return self
     */
    public function setPrizeDescription(?array $prizeDescription = null): self
    {
        $this->prizeDescription = $prizeDescription;

        return $this;
    }

    /**
     * @return self
     */
    public function clearPrizeDescription(): self
    {
        $this->prizeDescription = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\PrizeDescription $prizeDescription
     * @return self
     */
    public function addToPrizeDescription(PrizeDescription $prizeDescription): self
    {
        $this->prizeDescription[] = $prizeDescription;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PrizeDescription
     */
    public function addToPrizeDescriptionWithCreate(): PrizeDescription
    {
        $this->addToprizeDescription($prizeDescription = new PrizeDescription());

        return $prizeDescription;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\PrizeDescription $prizeDescription
     * @return self
     */
    public function addOnceToPrizeDescription(PrizeDescription $prizeDescription): self
    {
        if (!is_array($this->prizeDescription)) {
            $this->prizeDescription = [];
        }

        $this->prizeDescription[0] = $prizeDescription;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PrizeDescription
     */
    public function addOnceToPrizeDescriptionWithCreate(): PrizeDescription
    {
        if (!is_array($this->prizeDescription)) {
            $this->prizeDescription = [];
        }

        if ($this->prizeDescription === []) {
            $this->addOnceToprizeDescription(new PrizeDescription());
        }

        return $this->prizeDescription[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\PaymentDescription>|null
     */
    public function getPaymentDescription(): ?array
    {
        return $this->paymentDescription;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\PaymentDescription>|null $paymentDescription
     * @return self
     */
    public function setPaymentDescription(?array $paymentDescription = null): self
    {
        $this->paymentDescription = $paymentDescription;

        return $this;
    }

    /**
     * @return self
     */
    public function clearPaymentDescription(): self
    {
        $this->paymentDescription = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\PaymentDescription $paymentDescription
     * @return self
     */
    public function addToPaymentDescription(PaymentDescription $paymentDescription): self
    {
        $this->paymentDescription[] = $paymentDescription;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PaymentDescription
     */
    public function addToPaymentDescriptionWithCreate(): PaymentDescription
    {
        $this->addTopaymentDescription($paymentDescription = new PaymentDescription());

        return $paymentDescription;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\PaymentDescription $paymentDescription
     * @return self
     */
    public function addOnceToPaymentDescription(PaymentDescription $paymentDescription): self
    {
        if (!is_array($this->paymentDescription)) {
            $this->paymentDescription = [];
        }

        $this->paymentDescription[0] = $paymentDescription;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PaymentDescription
     */
    public function addOnceToPaymentDescriptionWithCreate(): PaymentDescription
    {
        if (!is_array($this->paymentDescription)) {
            $this->paymentDescription = [];
        }

        if ($this->paymentDescription === []) {
            $this->addOnceTopaymentDescription(new PaymentDescription());
        }

        return $this->paymentDescription[0];
    }

    /**
     * @return bool|null
     */
    public function getFollowupContractIndicator(): ?bool
    {
        return $this->followupContractIndicator;
    }

    /**
     * @param bool|null $followupContractIndicator
     * @return self
     */
    public function setFollowupContractIndicator(?bool $followupContractIndicator = null): self
    {
        $this->followupContractIndicator = $followupContractIndicator;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getBindingOnBuyerIndicator(): ?bool
    {
        return $this->bindingOnBuyerIndicator;
    }

    /**
     * @param bool|null $bindingOnBuyerIndicator
     * @return self
     */
    public function setBindingOnBuyerIndicator(?bool $bindingOnBuyerIndicator = null): self
    {
        $this->bindingOnBuyerIndicator = $bindingOnBuyerIndicator;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\AwardingCriterion>|null
     */
    public function getAwardingCriterion(): ?array
    {
        return $this->awardingCriterion;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\AwardingCriterion>|null $awardingCriterion
     * @return self
     */
    public function setAwardingCriterion(?array $awardingCriterion = null): self
    {
        $this->awardingCriterion = $awardingCriterion;

        return $this;
    }

    /**
     * @return self
     */
    public function clearAwardingCriterion(): self
    {
        $this->awardingCriterion = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\AwardingCriterion $awardingCriterion
     * @return self
     */
    public function addToAwardingCriterion(AwardingCriterion $awardingCriterion): self
    {
        $this->awardingCriterion[] = $awardingCriterion;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\AwardingCriterion
     */
    public function addToAwardingCriterionWithCreate(): AwardingCriterion
    {
        $this->addToawardingCriterion($awardingCriterion = new AwardingCriterion());

        return $awardingCriterion;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\AwardingCriterion $awardingCriterion
     * @return self
     */
    public function addOnceToAwardingCriterion(AwardingCriterion $awardingCriterion): self
    {
        if (!is_array($this->awardingCriterion)) {
            $this->awardingCriterion = [];
        }

        $this->awardingCriterion[0] = $awardingCriterion;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\AwardingCriterion
     */
    public function addOnceToAwardingCriterionWithCreate(): AwardingCriterion
    {
        if (!is_array($this->awardingCriterion)) {
            $this->awardingCriterion = [];
        }

        if ($this->awardingCriterion === []) {
            $this->addOnceToawardingCriterion(new AwardingCriterion());
        }

        return $this->awardingCriterion[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\TechnicalCommitteePerson>|null
     */
    public function getTechnicalCommitteePerson(): ?array
    {
        return $this->technicalCommitteePerson;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\TechnicalCommitteePerson>|null $technicalCommitteePerson
     * @return self
     */
    public function setTechnicalCommitteePerson(?array $technicalCommitteePerson = null): self
    {
        $this->technicalCommitteePerson = $technicalCommitteePerson;

        return $this;
    }

    /**
     * @return self
     */
    public function clearTechnicalCommitteePerson(): self
    {
        $this->technicalCommitteePerson = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\TechnicalCommitteePerson $technicalCommitteePerson
     * @return self
     */
    public function addToTechnicalCommitteePerson(TechnicalCommitteePerson $technicalCommitteePerson): self
    {
        $this->technicalCommitteePerson[] = $technicalCommitteePerson;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TechnicalCommitteePerson
     */
    public function addToTechnicalCommitteePersonWithCreate(): TechnicalCommitteePerson
    {
        $this->addTotechnicalCommitteePerson($technicalCommitteePerson = new TechnicalCommitteePerson());

        return $technicalCommitteePerson;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\TechnicalCommitteePerson $technicalCommitteePerson
     * @return self
     */
    public function addOnceToTechnicalCommitteePerson(TechnicalCommitteePerson $technicalCommitteePerson): self
    {
        if (!is_array($this->technicalCommitteePerson)) {
            $this->technicalCommitteePerson = [];
        }

        $this->technicalCommitteePerson[0] = $technicalCommitteePerson;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TechnicalCommitteePerson
     */
    public function addOnceToTechnicalCommitteePersonWithCreate(): TechnicalCommitteePerson
    {
        if (!is_array($this->technicalCommitteePerson)) {
            $this->technicalCommitteePerson = [];
        }

        if ($this->technicalCommitteePerson === []) {
            $this->addOnceTotechnicalCommitteePerson(new TechnicalCommitteePerson());
        }

        return $this->technicalCommitteePerson[0];
    }
}
