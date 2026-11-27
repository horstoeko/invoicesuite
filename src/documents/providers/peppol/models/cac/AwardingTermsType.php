<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Description;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LowTendersDescription;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PaymentDescription;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PrizeDescription;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TechnicalCommitteeDescription;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\WeightingAlgorithmCode;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use JMS\Serializer\Annotation as JMS;

class AwardingTermsType
{
    use HandlesObjectFlags;

    /**
     * @var null|WeightingAlgorithmCode
     */
    #[JMS\Accessor(getter: 'getWeightingAlgorithmCode', setter: 'setWeightingAlgorithmCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('WeightingAlgorithmCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\WeightingAlgorithmCode')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $weightingAlgorithmCode;

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
     * @var null|array<TechnicalCommitteeDescription>
     */
    #[JMS\Accessor(getter: 'getTechnicalCommitteeDescription', setter: 'setTechnicalCommitteeDescription')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TechnicalCommitteeDescription')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TechnicalCommitteeDescription>')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[JMS\XmlList(entry: 'TechnicalCommitteeDescription', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $technicalCommitteeDescription;

    /**
     * @var null|array<LowTendersDescription>
     */
    #[JMS\Accessor(getter: 'getLowTendersDescription', setter: 'setLowTendersDescription')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('LowTendersDescription')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LowTendersDescription>')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[JMS\XmlList(entry: 'LowTendersDescription', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $lowTendersDescription;

    /**
     * @var null|bool
     */
    #[JMS\Accessor(getter: 'getPrizeIndicator', setter: 'setPrizeIndicator')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PrizeIndicator')]
    #[JMS\Type('bool')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $prizeIndicator;

    /**
     * @var null|array<PrizeDescription>
     */
    #[JMS\Accessor(getter: 'getPrizeDescription', setter: 'setPrizeDescription')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PrizeDescription')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PrizeDescription>')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[JMS\XmlList(entry: 'PrizeDescription', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $prizeDescription;

    /**
     * @var null|array<PaymentDescription>
     */
    #[JMS\Accessor(getter: 'getPaymentDescription', setter: 'setPaymentDescription')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PaymentDescription')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PaymentDescription>')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[JMS\XmlList(entry: 'PaymentDescription', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $paymentDescription;

    /**
     * @var null|bool
     */
    #[JMS\Accessor(getter: 'getFollowupContractIndicator', setter: 'setFollowupContractIndicator')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('FollowupContractIndicator')]
    #[JMS\Type('bool')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $followupContractIndicator;

    /**
     * @var null|bool
     */
    #[JMS\Accessor(getter: 'getBindingOnBuyerIndicator', setter: 'setBindingOnBuyerIndicator')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('BindingOnBuyerIndicator')]
    #[JMS\Type('bool')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $bindingOnBuyerIndicator;

    /**
     * @var null|array<AwardingCriterion>
     */
    #[JMS\Accessor(getter: 'getAwardingCriterion', setter: 'setAwardingCriterion')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('AwardingCriterion')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\AwardingCriterion>')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[JMS\XmlList(entry: 'AwardingCriterion', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $awardingCriterion;

    /**
     * @var null|array<TechnicalCommitteePerson>
     */
    #[JMS\Accessor(getter: 'getTechnicalCommitteePerson', setter: 'setTechnicalCommitteePerson')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TechnicalCommitteePerson')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\TechnicalCommitteePerson>')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[JMS\XmlList(entry: 'TechnicalCommitteePerson', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
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
        $this->weightingAlgorithmCode ??= new WeightingAlgorithmCode();

        return $this->weightingAlgorithmCode;
    }

    /**
     * @param  null|WeightingAlgorithmCode $weightingAlgorithmCode
     * @return static
     */
    public function setWeightingAlgorithmCode(
        ?WeightingAlgorithmCode $weightingAlgorithmCode = null
    ): static {
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
     * Filter items using a callback
     *
     * @param  callable(Description): mixed  $callback
     * @return array<array-key, Description>
     */
    public function filterDescriptions(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->description ?? [], $callback);
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
    public function setTechnicalCommitteeDescription(
        ?array $technicalCommitteeDescription = null
    ): static {
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
        $technicalCommitteeDescription = InvoiceSuiteArrayUtils::first($technicalCommitteeDescription);

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
        $technicalCommitteeDescription = InvoiceSuiteArrayUtils::last($technicalCommitteeDescription);

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
        $this->addToTechnicalCommitteeDescription($technicalCommitteeDescription = new TechnicalCommitteeDescription());

        return $technicalCommitteeDescription;
    }

    /**
     * @param  TechnicalCommitteeDescription $technicalCommitteeDescription
     * @return static
     */
    public function addOnceToTechnicalCommitteeDescription(
        TechnicalCommitteeDescription $technicalCommitteeDescription,
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->technicalCommitteeDescription)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->technicalCommitteeDescription)) {
            $this->technicalCommitteeDescription = [];
        }

        if (InvoiceSuiteArrayUtils::empty($this->technicalCommitteeDescription)) {
            $this->addOnceToTechnicalCommitteeDescription(new TechnicalCommitteeDescription());
        }

        return $this->technicalCommitteeDescription[0];
    }

    /**
     * Execute a callback for each item
     *
     * @param  callable(TechnicalCommitteeDescription): mixed $callback
     * @return static
     */
    public function forEachTechnicalCommitteeDescription(
        callable $callback
    ): static {
        foreach ($this->technicalCommitteeDescription ?? [] as $technicalCommitteeDescription) {
            $callback($technicalCommitteeDescription);
        }

        return $this;
    }

    /**
     * Filter items using a callback
     *
     * @param  callable(TechnicalCommitteeDescription): mixed  $callback
     * @return array<array-key, TechnicalCommitteeDescription>
     */
    public function filterTechnicalCommitteeDescriptions(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->technicalCommitteeDescription ?? [], $callback);
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
    public function setLowTendersDescription(
        ?array $lowTendersDescription = null
    ): static {
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
        $lowTendersDescription = InvoiceSuiteArrayUtils::first($lowTendersDescription);

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
        $lowTendersDescription = InvoiceSuiteArrayUtils::last($lowTendersDescription);

        if (false === $lowTendersDescription) {
            return null;
        }

        return $lowTendersDescription;
    }

    /**
     * @param  LowTendersDescription $lowTendersDescription
     * @return static
     */
    public function addToLowTendersDescription(
        LowTendersDescription $lowTendersDescription
    ): static {
        $this->lowTendersDescription[] = $lowTendersDescription;

        return $this;
    }

    /**
     * @return LowTendersDescription
     */
    public function addToLowTendersDescriptionWithCreate(): LowTendersDescription
    {
        $this->addToLowTendersDescription($lowTendersDescription = new LowTendersDescription());

        return $lowTendersDescription;
    }

    /**
     * @param  LowTendersDescription $lowTendersDescription
     * @return static
     */
    public function addOnceToLowTendersDescription(
        LowTendersDescription $lowTendersDescription
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->lowTendersDescription)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->lowTendersDescription)) {
            $this->lowTendersDescription = [];
        }

        if (InvoiceSuiteArrayUtils::empty($this->lowTendersDescription)) {
            $this->addOnceToLowTendersDescription(new LowTendersDescription());
        }

        return $this->lowTendersDescription[0];
    }

    /**
     * Execute a callback for each item
     *
     * @param  callable(LowTendersDescription): mixed $callback
     * @return static
     */
    public function forEachLowTendersDescription(
        callable $callback
    ): static {
        foreach ($this->lowTendersDescription ?? [] as $lowTendersDescription) {
            $callback($lowTendersDescription);
        }

        return $this;
    }

    /**
     * Filter items using a callback
     *
     * @param  callable(LowTendersDescription): mixed  $callback
     * @return array<array-key, LowTendersDescription>
     */
    public function filterLowTendersDescriptions(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->lowTendersDescription ?? [], $callback);
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
    public function setPrizeIndicator(
        ?bool $prizeIndicator = null
    ): static {
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
    public function setPrizeDescription(
        ?array $prizeDescription = null
    ): static {
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
        $prizeDescription = InvoiceSuiteArrayUtils::first($prizeDescription);

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
        $prizeDescription = InvoiceSuiteArrayUtils::last($prizeDescription);

        if (false === $prizeDescription) {
            return null;
        }

        return $prizeDescription;
    }

    /**
     * @param  PrizeDescription $prizeDescription
     * @return static
     */
    public function addToPrizeDescription(
        PrizeDescription $prizeDescription
    ): static {
        $this->prizeDescription[] = $prizeDescription;

        return $this;
    }

    /**
     * @return PrizeDescription
     */
    public function addToPrizeDescriptionWithCreate(): PrizeDescription
    {
        $this->addToPrizeDescription($prizeDescription = new PrizeDescription());

        return $prizeDescription;
    }

    /**
     * @param  PrizeDescription $prizeDescription
     * @return static
     */
    public function addOnceToPrizeDescription(
        PrizeDescription $prizeDescription
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->prizeDescription)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->prizeDescription)) {
            $this->prizeDescription = [];
        }

        if (InvoiceSuiteArrayUtils::empty($this->prizeDescription)) {
            $this->addOnceToPrizeDescription(new PrizeDescription());
        }

        return $this->prizeDescription[0];
    }

    /**
     * Execute a callback for each item
     *
     * @param  callable(PrizeDescription): mixed $callback
     * @return static
     */
    public function forEachPrizeDescription(
        callable $callback
    ): static {
        foreach ($this->prizeDescription ?? [] as $prizeDescription) {
            $callback($prizeDescription);
        }

        return $this;
    }

    /**
     * Filter items using a callback
     *
     * @param  callable(PrizeDescription): mixed  $callback
     * @return array<array-key, PrizeDescription>
     */
    public function filterPrizeDescriptions(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->prizeDescription ?? [], $callback);
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
    public function setPaymentDescription(
        ?array $paymentDescription = null
    ): static {
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
        $paymentDescription = InvoiceSuiteArrayUtils::first($paymentDescription);

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
        $paymentDescription = InvoiceSuiteArrayUtils::last($paymentDescription);

        if (false === $paymentDescription) {
            return null;
        }

        return $paymentDescription;
    }

    /**
     * @param  PaymentDescription $paymentDescription
     * @return static
     */
    public function addToPaymentDescription(
        PaymentDescription $paymentDescription
    ): static {
        $this->paymentDescription[] = $paymentDescription;

        return $this;
    }

    /**
     * @return PaymentDescription
     */
    public function addToPaymentDescriptionWithCreate(): PaymentDescription
    {
        $this->addToPaymentDescription($paymentDescription = new PaymentDescription());

        return $paymentDescription;
    }

    /**
     * @param  PaymentDescription $paymentDescription
     * @return static
     */
    public function addOnceToPaymentDescription(
        PaymentDescription $paymentDescription
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->paymentDescription)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->paymentDescription)) {
            $this->paymentDescription = [];
        }

        if (InvoiceSuiteArrayUtils::empty($this->paymentDescription)) {
            $this->addOnceToPaymentDescription(new PaymentDescription());
        }

        return $this->paymentDescription[0];
    }

    /**
     * Execute a callback for each item
     *
     * @param  callable(PaymentDescription): mixed $callback
     * @return static
     */
    public function forEachPaymentDescription(
        callable $callback
    ): static {
        foreach ($this->paymentDescription ?? [] as $paymentDescription) {
            $callback($paymentDescription);
        }

        return $this;
    }

    /**
     * Filter items using a callback
     *
     * @param  callable(PaymentDescription): mixed  $callback
     * @return array<array-key, PaymentDescription>
     */
    public function filterPaymentDescriptions(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->paymentDescription ?? [], $callback);
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
    public function setFollowupContractIndicator(
        ?bool $followupContractIndicator = null
    ): static {
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
    public function setBindingOnBuyerIndicator(
        ?bool $bindingOnBuyerIndicator = null
    ): static {
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
    public function setAwardingCriterion(
        ?array $awardingCriterion = null
    ): static {
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
        $awardingCriterion = InvoiceSuiteArrayUtils::first($awardingCriterion);

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
        $awardingCriterion = InvoiceSuiteArrayUtils::last($awardingCriterion);

        if (false === $awardingCriterion) {
            return null;
        }

        return $awardingCriterion;
    }

    /**
     * @param  AwardingCriterion $awardingCriterion
     * @return static
     */
    public function addToAwardingCriterion(
        AwardingCriterion $awardingCriterion
    ): static {
        $this->awardingCriterion[] = $awardingCriterion;

        return $this;
    }

    /**
     * @return AwardingCriterion
     */
    public function addToAwardingCriterionWithCreate(): AwardingCriterion
    {
        $this->addToAwardingCriterion($awardingCriterion = new AwardingCriterion());

        return $awardingCriterion;
    }

    /**
     * @param  AwardingCriterion $awardingCriterion
     * @return static
     */
    public function addOnceToAwardingCriterion(
        AwardingCriterion $awardingCriterion
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->awardingCriterion)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->awardingCriterion)) {
            $this->awardingCriterion = [];
        }

        if (InvoiceSuiteArrayUtils::empty($this->awardingCriterion)) {
            $this->addOnceToAwardingCriterion(new AwardingCriterion());
        }

        return $this->awardingCriterion[0];
    }

    /**
     * Execute a callback for each item
     *
     * @param  callable(AwardingCriterion): mixed $callback
     * @return static
     */
    public function forEachAwardingCriterion(
        callable $callback
    ): static {
        foreach ($this->awardingCriterion ?? [] as $awardingCriterion) {
            $callback($awardingCriterion);
        }

        return $this;
    }

    /**
     * Filter items using a callback
     *
     * @param  callable(AwardingCriterion): mixed  $callback
     * @return array<array-key, AwardingCriterion>
     */
    public function filterAwardingCriteria(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->awardingCriterion ?? [], $callback);
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
    public function setTechnicalCommitteePerson(
        ?array $technicalCommitteePerson = null
    ): static {
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
        $technicalCommitteePerson = InvoiceSuiteArrayUtils::first($technicalCommitteePerson);

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
        $technicalCommitteePerson = InvoiceSuiteArrayUtils::last($technicalCommitteePerson);

        if (false === $technicalCommitteePerson) {
            return null;
        }

        return $technicalCommitteePerson;
    }

    /**
     * @param  TechnicalCommitteePerson $technicalCommitteePerson
     * @return static
     */
    public function addToTechnicalCommitteePerson(
        TechnicalCommitteePerson $technicalCommitteePerson
    ): static {
        $this->technicalCommitteePerson[] = $technicalCommitteePerson;

        return $this;
    }

    /**
     * @return TechnicalCommitteePerson
     */
    public function addToTechnicalCommitteePersonWithCreate(): TechnicalCommitteePerson
    {
        $this->addToTechnicalCommitteePerson($technicalCommitteePerson = new TechnicalCommitteePerson());

        return $technicalCommitteePerson;
    }

    /**
     * @param  TechnicalCommitteePerson $technicalCommitteePerson
     * @return static
     */
    public function addOnceToTechnicalCommitteePerson(
        TechnicalCommitteePerson $technicalCommitteePerson
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->technicalCommitteePerson)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->technicalCommitteePerson)) {
            $this->technicalCommitteePerson = [];
        }

        if (InvoiceSuiteArrayUtils::empty($this->technicalCommitteePerson)) {
            $this->addOnceToTechnicalCommitteePerson(new TechnicalCommitteePerson());
        }

        return $this->technicalCommitteePerson[0];
    }

    /**
     * Execute a callback for each item
     *
     * @param  callable(TechnicalCommitteePerson): mixed $callback
     * @return static
     */
    public function forEachTechnicalCommitteePerson(
        callable $callback
    ): static {
        foreach ($this->technicalCommitteePerson ?? [] as $technicalCommitteePerson) {
            $callback($technicalCommitteePerson);
        }

        return $this;
    }

    /**
     * Filter items using a callback
     *
     * @param  callable(TechnicalCommitteePerson): mixed  $callback
     * @return array<array-key, TechnicalCommitteePerson>
     */
    public function filterTechnicalCommitteePersons(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->technicalCommitteePerson ?? [], $callback);
    }
}
