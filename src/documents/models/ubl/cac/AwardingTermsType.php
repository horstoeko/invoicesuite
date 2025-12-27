<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\ubl\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\ubl\cbc\Description;
use horstoeko\invoicesuite\documents\models\ubl\cbc\LowTendersDescription;
use horstoeko\invoicesuite\documents\models\ubl\cbc\PaymentDescription;
use horstoeko\invoicesuite\documents\models\ubl\cbc\PrizeDescription;
use horstoeko\invoicesuite\documents\models\ubl\cbc\TechnicalCommitteeDescription;
use horstoeko\invoicesuite\documents\models\ubl\cbc\WeightingAlgorithmCode;
use JMS\Serializer\Annotation as JMS;

class AwardingTermsType
{
    use HandlesObjectFlags;

    /**
     * @var null|WeightingAlgorithmCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\WeightingAlgorithmCode")
     * @JMS\Expose
     * @JMS\SerializedName("WeightingAlgorithmCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getWeightingAlgorithmCode", setter="setWeightingAlgorithmCode")
     */
    private $weightingAlgorithmCode;

    /**
     * @var null|array<Description>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cbc\Description>")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Description", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $description;

    /**
     * @var null|array<TechnicalCommitteeDescription>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cbc\TechnicalCommitteeDescription>")
     * @JMS\Expose
     * @JMS\SerializedName("TechnicalCommitteeDescription")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TechnicalCommitteeDescription", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getTechnicalCommitteeDescription", setter="setTechnicalCommitteeDescription")
     */
    private $technicalCommitteeDescription;

    /**
     * @var null|array<LowTendersDescription>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cbc\LowTendersDescription>")
     * @JMS\Expose
     * @JMS\SerializedName("LowTendersDescription")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="LowTendersDescription", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getLowTendersDescription", setter="setLowTendersDescription")
     */
    private $lowTendersDescription;

    /**
     * @var null|bool
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("PrizeIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPrizeIndicator", setter="setPrizeIndicator")
     */
    private $prizeIndicator;

    /**
     * @var null|array<PrizeDescription>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cbc\PrizeDescription>")
     * @JMS\Expose
     * @JMS\SerializedName("PrizeDescription")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PrizeDescription", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getPrizeDescription", setter="setPrizeDescription")
     */
    private $prizeDescription;

    /**
     * @var null|array<PaymentDescription>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cbc\PaymentDescription>")
     * @JMS\Expose
     * @JMS\SerializedName("PaymentDescription")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PaymentDescription", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getPaymentDescription", setter="setPaymentDescription")
     */
    private $paymentDescription;

    /**
     * @var null|bool
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("FollowupContractIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getFollowupContractIndicator", setter="setFollowupContractIndicator")
     */
    private $followupContractIndicator;

    /**
     * @var null|bool
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("BindingOnBuyerIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getBindingOnBuyerIndicator", setter="setBindingOnBuyerIndicator")
     */
    private $bindingOnBuyerIndicator;

    /**
     * @var null|array<AwardingCriterion>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\AwardingCriterion>")
     * @JMS\Expose
     * @JMS\SerializedName("AwardingCriterion")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="AwardingCriterion", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getAwardingCriterion", setter="setAwardingCriterion")
     */
    private $awardingCriterion;

    /**
     * @var null|array<TechnicalCommitteePerson>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\TechnicalCommitteePerson>")
     * @JMS\Expose
     * @JMS\SerializedName("TechnicalCommitteePerson")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TechnicalCommitteePerson", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getTechnicalCommitteePerson", setter="setTechnicalCommitteePerson")
     */
    private $technicalCommitteePerson;

    /**
     * @return null|WeightingAlgorithmCode
     */
    public function getWeightingAlgorithmCode(): ?WeightingAlgorithmCode
    {
        return $this->weightingAlgorithmCode;
    }

    /**
     * @return WeightingAlgorithmCode
     */
    public function getWeightingAlgorithmCodeWithCreate(): WeightingAlgorithmCode
    {
        $this->weightingAlgorithmCode = is_null($this->weightingAlgorithmCode) ? new WeightingAlgorithmCode() : $this->weightingAlgorithmCode;

        return $this->weightingAlgorithmCode;
    }

    /**
     * @param  null|WeightingAlgorithmCode $weightingAlgorithmCode
     * @return static
     */
    public function setWeightingAlgorithmCode(?WeightingAlgorithmCode $weightingAlgorithmCode = null): static
    {
        $this->weightingAlgorithmCode = $weightingAlgorithmCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetWeightingAlgorithmCode(): static
    {
        $this->weightingAlgorithmCode = null;

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
     * @return null|array<TechnicalCommitteeDescription>
     */
    public function getTechnicalCommitteeDescription(): ?array
    {
        return $this->technicalCommitteeDescription;
    }

    /**
     * @param  null|array<TechnicalCommitteeDescription> $technicalCommitteeDescription
     * @return static
     */
    public function setTechnicalCommitteeDescription(?array $technicalCommitteeDescription = null): static
    {
        $this->technicalCommitteeDescription = $technicalCommitteeDescription;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTechnicalCommitteeDescription(): static
    {
        $this->technicalCommitteeDescription = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearTechnicalCommitteeDescription(): static
    {
        $this->technicalCommitteeDescription = [];

        return $this;
    }

    /**
     * @return null|TechnicalCommitteeDescription
     */
    public function firstTechnicalCommitteeDescription(): ?TechnicalCommitteeDescription
    {
        $technicalCommitteeDescription = $this->technicalCommitteeDescription ?? [];
        $technicalCommitteeDescription = reset($technicalCommitteeDescription);

        if (false === $technicalCommitteeDescription) {
            return null;
        }

        return $technicalCommitteeDescription;
    }

    /**
     * @return null|TechnicalCommitteeDescription
     */
    public function lastTechnicalCommitteeDescription(): ?TechnicalCommitteeDescription
    {
        $technicalCommitteeDescription = $this->technicalCommitteeDescription ?? [];
        $technicalCommitteeDescription = end($technicalCommitteeDescription);

        if (false === $technicalCommitteeDescription) {
            return null;
        }

        return $technicalCommitteeDescription;
    }

    /**
     * @param  TechnicalCommitteeDescription $technicalCommitteeDescription
     * @return static
     */
    public function addToTechnicalCommitteeDescription(
        TechnicalCommitteeDescription $technicalCommitteeDescription,
    ): static {
        $this->technicalCommitteeDescription[] = $technicalCommitteeDescription;

        return $this;
    }

    /**
     * @return TechnicalCommitteeDescription
     */
    public function addToTechnicalCommitteeDescriptionWithCreate(): TechnicalCommitteeDescription
    {
        $this->addTotechnicalCommitteeDescription($technicalCommitteeDescription = new TechnicalCommitteeDescription());

        return $technicalCommitteeDescription;
    }

    /**
     * @param  TechnicalCommitteeDescription $technicalCommitteeDescription
     * @return static
     */
    public function addOnceToTechnicalCommitteeDescription(
        TechnicalCommitteeDescription $technicalCommitteeDescription,
    ): static {
        if (!is_array($this->technicalCommitteeDescription)) {
            $this->technicalCommitteeDescription = [];
        }

        $this->technicalCommitteeDescription[0] = $technicalCommitteeDescription;

        return $this;
    }

    /**
     * @return TechnicalCommitteeDescription
     */
    public function addOnceToTechnicalCommitteeDescriptionWithCreate(): TechnicalCommitteeDescription
    {
        if (!is_array($this->technicalCommitteeDescription)) {
            $this->technicalCommitteeDescription = [];
        }

        if ([] === $this->technicalCommitteeDescription) {
            $this->addOnceTotechnicalCommitteeDescription(new TechnicalCommitteeDescription());
        }

        return $this->technicalCommitteeDescription[0];
    }

    /**
     * @return null|array<LowTendersDescription>
     */
    public function getLowTendersDescription(): ?array
    {
        return $this->lowTendersDescription;
    }

    /**
     * @param  null|array<LowTendersDescription> $lowTendersDescription
     * @return static
     */
    public function setLowTendersDescription(?array $lowTendersDescription = null): static
    {
        $this->lowTendersDescription = $lowTendersDescription;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLowTendersDescription(): static
    {
        $this->lowTendersDescription = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearLowTendersDescription(): static
    {
        $this->lowTendersDescription = [];

        return $this;
    }

    /**
     * @return null|LowTendersDescription
     */
    public function firstLowTendersDescription(): ?LowTendersDescription
    {
        $lowTendersDescription = $this->lowTendersDescription ?? [];
        $lowTendersDescription = reset($lowTendersDescription);

        if (false === $lowTendersDescription) {
            return null;
        }

        return $lowTendersDescription;
    }

    /**
     * @return null|LowTendersDescription
     */
    public function lastLowTendersDescription(): ?LowTendersDescription
    {
        $lowTendersDescription = $this->lowTendersDescription ?? [];
        $lowTendersDescription = end($lowTendersDescription);

        if (false === $lowTendersDescription) {
            return null;
        }

        return $lowTendersDescription;
    }

    /**
     * @param  LowTendersDescription $lowTendersDescription
     * @return static
     */
    public function addToLowTendersDescription(LowTendersDescription $lowTendersDescription): static
    {
        $this->lowTendersDescription[] = $lowTendersDescription;

        return $this;
    }

    /**
     * @return LowTendersDescription
     */
    public function addToLowTendersDescriptionWithCreate(): LowTendersDescription
    {
        $this->addTolowTendersDescription($lowTendersDescription = new LowTendersDescription());

        return $lowTendersDescription;
    }

    /**
     * @param  LowTendersDescription $lowTendersDescription
     * @return static
     */
    public function addOnceToLowTendersDescription(LowTendersDescription $lowTendersDescription): static
    {
        if (!is_array($this->lowTendersDescription)) {
            $this->lowTendersDescription = [];
        }

        $this->lowTendersDescription[0] = $lowTendersDescription;

        return $this;
    }

    /**
     * @return LowTendersDescription
     */
    public function addOnceToLowTendersDescriptionWithCreate(): LowTendersDescription
    {
        if (!is_array($this->lowTendersDescription)) {
            $this->lowTendersDescription = [];
        }

        if ([] === $this->lowTendersDescription) {
            $this->addOnceTolowTendersDescription(new LowTendersDescription());
        }

        return $this->lowTendersDescription[0];
    }

    /**
     * @return null|bool
     */
    public function getPrizeIndicator(): ?bool
    {
        return $this->prizeIndicator;
    }

    /**
     * @param  null|bool $prizeIndicator
     * @return static
     */
    public function setPrizeIndicator(?bool $prizeIndicator = null): static
    {
        $this->prizeIndicator = $prizeIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPrizeIndicator(): static
    {
        $this->prizeIndicator = null;

        return $this;
    }

    /**
     * @return null|array<PrizeDescription>
     */
    public function getPrizeDescription(): ?array
    {
        return $this->prizeDescription;
    }

    /**
     * @param  null|array<PrizeDescription> $prizeDescription
     * @return static
     */
    public function setPrizeDescription(?array $prizeDescription = null): static
    {
        $this->prizeDescription = $prizeDescription;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPrizeDescription(): static
    {
        $this->prizeDescription = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearPrizeDescription(): static
    {
        $this->prizeDescription = [];

        return $this;
    }

    /**
     * @return null|PrizeDescription
     */
    public function firstPrizeDescription(): ?PrizeDescription
    {
        $prizeDescription = $this->prizeDescription ?? [];
        $prizeDescription = reset($prizeDescription);

        if (false === $prizeDescription) {
            return null;
        }

        return $prizeDescription;
    }

    /**
     * @return null|PrizeDescription
     */
    public function lastPrizeDescription(): ?PrizeDescription
    {
        $prizeDescription = $this->prizeDescription ?? [];
        $prizeDescription = end($prizeDescription);

        if (false === $prizeDescription) {
            return null;
        }

        return $prizeDescription;
    }

    /**
     * @param  PrizeDescription $prizeDescription
     * @return static
     */
    public function addToPrizeDescription(PrizeDescription $prizeDescription): static
    {
        $this->prizeDescription[] = $prizeDescription;

        return $this;
    }

    /**
     * @return PrizeDescription
     */
    public function addToPrizeDescriptionWithCreate(): PrizeDescription
    {
        $this->addToprizeDescription($prizeDescription = new PrizeDescription());

        return $prizeDescription;
    }

    /**
     * @param  PrizeDescription $prizeDescription
     * @return static
     */
    public function addOnceToPrizeDescription(PrizeDescription $prizeDescription): static
    {
        if (!is_array($this->prizeDescription)) {
            $this->prizeDescription = [];
        }

        $this->prizeDescription[0] = $prizeDescription;

        return $this;
    }

    /**
     * @return PrizeDescription
     */
    public function addOnceToPrizeDescriptionWithCreate(): PrizeDescription
    {
        if (!is_array($this->prizeDescription)) {
            $this->prizeDescription = [];
        }

        if ([] === $this->prizeDescription) {
            $this->addOnceToprizeDescription(new PrizeDescription());
        }

        return $this->prizeDescription[0];
    }

    /**
     * @return null|array<PaymentDescription>
     */
    public function getPaymentDescription(): ?array
    {
        return $this->paymentDescription;
    }

    /**
     * @param  null|array<PaymentDescription> $paymentDescription
     * @return static
     */
    public function setPaymentDescription(?array $paymentDescription = null): static
    {
        $this->paymentDescription = $paymentDescription;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPaymentDescription(): static
    {
        $this->paymentDescription = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearPaymentDescription(): static
    {
        $this->paymentDescription = [];

        return $this;
    }

    /**
     * @return null|PaymentDescription
     */
    public function firstPaymentDescription(): ?PaymentDescription
    {
        $paymentDescription = $this->paymentDescription ?? [];
        $paymentDescription = reset($paymentDescription);

        if (false === $paymentDescription) {
            return null;
        }

        return $paymentDescription;
    }

    /**
     * @return null|PaymentDescription
     */
    public function lastPaymentDescription(): ?PaymentDescription
    {
        $paymentDescription = $this->paymentDescription ?? [];
        $paymentDescription = end($paymentDescription);

        if (false === $paymentDescription) {
            return null;
        }

        return $paymentDescription;
    }

    /**
     * @param  PaymentDescription $paymentDescription
     * @return static
     */
    public function addToPaymentDescription(PaymentDescription $paymentDescription): static
    {
        $this->paymentDescription[] = $paymentDescription;

        return $this;
    }

    /**
     * @return PaymentDescription
     */
    public function addToPaymentDescriptionWithCreate(): PaymentDescription
    {
        $this->addTopaymentDescription($paymentDescription = new PaymentDescription());

        return $paymentDescription;
    }

    /**
     * @param  PaymentDescription $paymentDescription
     * @return static
     */
    public function addOnceToPaymentDescription(PaymentDescription $paymentDescription): static
    {
        if (!is_array($this->paymentDescription)) {
            $this->paymentDescription = [];
        }

        $this->paymentDescription[0] = $paymentDescription;

        return $this;
    }

    /**
     * @return PaymentDescription
     */
    public function addOnceToPaymentDescriptionWithCreate(): PaymentDescription
    {
        if (!is_array($this->paymentDescription)) {
            $this->paymentDescription = [];
        }

        if ([] === $this->paymentDescription) {
            $this->addOnceTopaymentDescription(new PaymentDescription());
        }

        return $this->paymentDescription[0];
    }

    /**
     * @return null|bool
     */
    public function getFollowupContractIndicator(): ?bool
    {
        return $this->followupContractIndicator;
    }

    /**
     * @param  null|bool $followupContractIndicator
     * @return static
     */
    public function setFollowupContractIndicator(?bool $followupContractIndicator = null): static
    {
        $this->followupContractIndicator = $followupContractIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetFollowupContractIndicator(): static
    {
        $this->followupContractIndicator = null;

        return $this;
    }

    /**
     * @return null|bool
     */
    public function getBindingOnBuyerIndicator(): ?bool
    {
        return $this->bindingOnBuyerIndicator;
    }

    /**
     * @param  null|bool $bindingOnBuyerIndicator
     * @return static
     */
    public function setBindingOnBuyerIndicator(?bool $bindingOnBuyerIndicator = null): static
    {
        $this->bindingOnBuyerIndicator = $bindingOnBuyerIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetBindingOnBuyerIndicator(): static
    {
        $this->bindingOnBuyerIndicator = null;

        return $this;
    }

    /**
     * @return null|array<AwardingCriterion>
     */
    public function getAwardingCriterion(): ?array
    {
        return $this->awardingCriterion;
    }

    /**
     * @param  null|array<AwardingCriterion> $awardingCriterion
     * @return static
     */
    public function setAwardingCriterion(?array $awardingCriterion = null): static
    {
        $this->awardingCriterion = $awardingCriterion;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAwardingCriterion(): static
    {
        $this->awardingCriterion = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearAwardingCriterion(): static
    {
        $this->awardingCriterion = [];

        return $this;
    }

    /**
     * @return null|AwardingCriterion
     */
    public function firstAwardingCriterion(): ?AwardingCriterion
    {
        $awardingCriterion = $this->awardingCriterion ?? [];
        $awardingCriterion = reset($awardingCriterion);

        if (false === $awardingCriterion) {
            return null;
        }

        return $awardingCriterion;
    }

    /**
     * @return null|AwardingCriterion
     */
    public function lastAwardingCriterion(): ?AwardingCriterion
    {
        $awardingCriterion = $this->awardingCriterion ?? [];
        $awardingCriterion = end($awardingCriterion);

        if (false === $awardingCriterion) {
            return null;
        }

        return $awardingCriterion;
    }

    /**
     * @param  AwardingCriterion $awardingCriterion
     * @return static
     */
    public function addToAwardingCriterion(AwardingCriterion $awardingCriterion): static
    {
        $this->awardingCriterion[] = $awardingCriterion;

        return $this;
    }

    /**
     * @return AwardingCriterion
     */
    public function addToAwardingCriterionWithCreate(): AwardingCriterion
    {
        $this->addToawardingCriterion($awardingCriterion = new AwardingCriterion());

        return $awardingCriterion;
    }

    /**
     * @param  AwardingCriterion $awardingCriterion
     * @return static
     */
    public function addOnceToAwardingCriterion(AwardingCriterion $awardingCriterion): static
    {
        if (!is_array($this->awardingCriterion)) {
            $this->awardingCriterion = [];
        }

        $this->awardingCriterion[0] = $awardingCriterion;

        return $this;
    }

    /**
     * @return AwardingCriterion
     */
    public function addOnceToAwardingCriterionWithCreate(): AwardingCriterion
    {
        if (!is_array($this->awardingCriterion)) {
            $this->awardingCriterion = [];
        }

        if ([] === $this->awardingCriterion) {
            $this->addOnceToawardingCriterion(new AwardingCriterion());
        }

        return $this->awardingCriterion[0];
    }

    /**
     * @return null|array<TechnicalCommitteePerson>
     */
    public function getTechnicalCommitteePerson(): ?array
    {
        return $this->technicalCommitteePerson;
    }

    /**
     * @param  null|array<TechnicalCommitteePerson> $technicalCommitteePerson
     * @return static
     */
    public function setTechnicalCommitteePerson(?array $technicalCommitteePerson = null): static
    {
        $this->technicalCommitteePerson = $technicalCommitteePerson;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTechnicalCommitteePerson(): static
    {
        $this->technicalCommitteePerson = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearTechnicalCommitteePerson(): static
    {
        $this->technicalCommitteePerson = [];

        return $this;
    }

    /**
     * @return null|TechnicalCommitteePerson
     */
    public function firstTechnicalCommitteePerson(): ?TechnicalCommitteePerson
    {
        $technicalCommitteePerson = $this->technicalCommitteePerson ?? [];
        $technicalCommitteePerson = reset($technicalCommitteePerson);

        if (false === $technicalCommitteePerson) {
            return null;
        }

        return $technicalCommitteePerson;
    }

    /**
     * @return null|TechnicalCommitteePerson
     */
    public function lastTechnicalCommitteePerson(): ?TechnicalCommitteePerson
    {
        $technicalCommitteePerson = $this->technicalCommitteePerson ?? [];
        $technicalCommitteePerson = end($technicalCommitteePerson);

        if (false === $technicalCommitteePerson) {
            return null;
        }

        return $technicalCommitteePerson;
    }

    /**
     * @param  TechnicalCommitteePerson $technicalCommitteePerson
     * @return static
     */
    public function addToTechnicalCommitteePerson(TechnicalCommitteePerson $technicalCommitteePerson): static
    {
        $this->technicalCommitteePerson[] = $technicalCommitteePerson;

        return $this;
    }

    /**
     * @return TechnicalCommitteePerson
     */
    public function addToTechnicalCommitteePersonWithCreate(): TechnicalCommitteePerson
    {
        $this->addTotechnicalCommitteePerson($technicalCommitteePerson = new TechnicalCommitteePerson());

        return $technicalCommitteePerson;
    }

    /**
     * @param  TechnicalCommitteePerson $technicalCommitteePerson
     * @return static
     */
    public function addOnceToTechnicalCommitteePerson(TechnicalCommitteePerson $technicalCommitteePerson): static
    {
        if (!is_array($this->technicalCommitteePerson)) {
            $this->technicalCommitteePerson = [];
        }

        $this->technicalCommitteePerson[0] = $technicalCommitteePerson;

        return $this;
    }

    /**
     * @return TechnicalCommitteePerson
     */
    public function addOnceToTechnicalCommitteePersonWithCreate(): TechnicalCommitteePerson
    {
        if (!is_array($this->technicalCommitteePerson)) {
            $this->technicalCommitteePerson = [];
        }

        if ([] === $this->technicalCommitteePerson) {
            $this->addOnceTotechnicalCommitteePerson(new TechnicalCommitteePerson());
        }

        return $this->technicalCommitteePerson[0];
    }
}
