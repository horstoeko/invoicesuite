<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LeadTimeMeasure;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MaximumQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MinimumQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TradingRestrictions;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use JMS\Serializer\Annotation as JMS;

class ItemLocationQuantityType
{
    use HandlesObjectFlags;

    /**
     * @var null|LeadTimeMeasure
     */
    #[JMS\Accessor(getter: 'getLeadTimeMeasure', setter: 'setLeadTimeMeasure')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('LeadTimeMeasure')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LeadTimeMeasure')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $leadTimeMeasure;

    /**
     * @var null|MinimumQuantity
     */
    #[JMS\Accessor(getter: 'getMinimumQuantity', setter: 'setMinimumQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MinimumQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MinimumQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $minimumQuantity;

    /**
     * @var null|MaximumQuantity
     */
    #[JMS\Accessor(getter: 'getMaximumQuantity', setter: 'setMaximumQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MaximumQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MaximumQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $maximumQuantity;

    /**
     * @var null|bool
     */
    #[JMS\Accessor(getter: 'getHazardousRiskIndicator', setter: 'setHazardousRiskIndicator')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('HazardousRiskIndicator')]
    #[JMS\Type('bool')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $hazardousRiskIndicator;

    /**
     * @var null|array<TradingRestrictions>
     */
    #[JMS\Accessor(getter: 'getTradingRestrictions', setter: 'setTradingRestrictions')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TradingRestrictions')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TradingRestrictions>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'TradingRestrictions', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $tradingRestrictions;

    /**
     * @var null|array<ApplicableTerritoryAddress>
     */
    #[JMS\Accessor(getter: 'getApplicableTerritoryAddress', setter: 'setApplicableTerritoryAddress')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ApplicableTerritoryAddress')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\ApplicableTerritoryAddress>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'ApplicableTerritoryAddress', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $applicableTerritoryAddress;

    /**
     * @var null|Price
     */
    #[JMS\Accessor(getter: 'getPrice', setter: 'setPrice')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Price')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\Price')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $price;

    /**
     * @var null|array<DeliveryUnit>
     */
    #[JMS\Accessor(getter: 'getDeliveryUnit', setter: 'setDeliveryUnit')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('DeliveryUnit')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\DeliveryUnit>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'DeliveryUnit', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $deliveryUnit;

    /**
     * @var null|array<ApplicableTaxCategory>
     */
    #[JMS\Accessor(getter: 'getApplicableTaxCategory', setter: 'setApplicableTaxCategory')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ApplicableTaxCategory')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\ApplicableTaxCategory>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'ApplicableTaxCategory', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $applicableTaxCategory;

    /**
     * @var null|Package
     */
    #[JMS\Accessor(getter: 'getPackage', setter: 'setPackage')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Package')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\Package')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $package;

    /**
     * @var null|array<AllowanceCharge>
     */
    #[JMS\Accessor(getter: 'getAllowanceCharge', setter: 'setAllowanceCharge')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('AllowanceCharge')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\AllowanceCharge>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'AllowanceCharge', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $allowanceCharge;

    /**
     * @var null|DependentPriceReference
     */
    #[JMS\Accessor(getter: 'getDependentPriceReference', setter: 'setDependentPriceReference')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('DependentPriceReference')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\DependentPriceReference')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $dependentPriceReference;

    /**
     * @return null|LeadTimeMeasure
     */
    public function getLeadTimeMeasure(): ?LeadTimeMeasure
    {
        return $this->leadTimeMeasure;
    }

    /**
     * @return LeadTimeMeasure
     */
    public function getLeadTimeMeasureWithCreate(): LeadTimeMeasure
    {
        $this->leadTimeMeasure ??= new LeadTimeMeasure();

        return $this->leadTimeMeasure;
    }

    /**
     * @param  null|LeadTimeMeasure $leadTimeMeasure
     * @return static
     */
    public function setLeadTimeMeasure(
        ?LeadTimeMeasure $leadTimeMeasure = null
    ): static {
        $this->leadTimeMeasure = $leadTimeMeasure;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLeadTimeMeasure(): static
    {
        $this->leadTimeMeasure = null;

        return $this;
    }

    /**
     * @return null|MinimumQuantity
     */
    public function getMinimumQuantity(): ?MinimumQuantity
    {
        return $this->minimumQuantity;
    }

    /**
     * @return MinimumQuantity
     */
    public function getMinimumQuantityWithCreate(): MinimumQuantity
    {
        $this->minimumQuantity ??= new MinimumQuantity();

        return $this->minimumQuantity;
    }

    /**
     * @param  null|MinimumQuantity $minimumQuantity
     * @return static
     */
    public function setMinimumQuantity(
        ?MinimumQuantity $minimumQuantity = null
    ): static {
        $this->minimumQuantity = $minimumQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMinimumQuantity(): static
    {
        $this->minimumQuantity = null;

        return $this;
    }

    /**
     * @return null|MaximumQuantity
     */
    public function getMaximumQuantity(): ?MaximumQuantity
    {
        return $this->maximumQuantity;
    }

    /**
     * @return MaximumQuantity
     */
    public function getMaximumQuantityWithCreate(): MaximumQuantity
    {
        $this->maximumQuantity ??= new MaximumQuantity();

        return $this->maximumQuantity;
    }

    /**
     * @param  null|MaximumQuantity $maximumQuantity
     * @return static
     */
    public function setMaximumQuantity(
        ?MaximumQuantity $maximumQuantity = null
    ): static {
        $this->maximumQuantity = $maximumQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMaximumQuantity(): static
    {
        $this->maximumQuantity = null;

        return $this;
    }

    /**
     * @return null|bool
     */
    public function getHazardousRiskIndicator(): ?bool
    {
        return $this->hazardousRiskIndicator;
    }

    /**
     * @param  null|bool $hazardousRiskIndicator
     * @return static
     */
    public function setHazardousRiskIndicator(
        ?bool $hazardousRiskIndicator = null
    ): static {
        $this->hazardousRiskIndicator = $hazardousRiskIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetHazardousRiskIndicator(): static
    {
        $this->hazardousRiskIndicator = null;

        return $this;
    }

    /**
     * @return null|array<TradingRestrictions>
     */
    public function getTradingRestrictions(): ?array
    {
        return $this->tradingRestrictions;
    }

    /**
     * @param  null|array<TradingRestrictions> $tradingRestrictions
     * @return static
     */
    public function setTradingRestrictions(
        ?array $tradingRestrictions = null
    ): static {
        $this->tradingRestrictions = $tradingRestrictions;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTradingRestrictions(): static
    {
        $this->tradingRestrictions = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearTradingRestrictions(): static
    {
        $this->tradingRestrictions = [];

        return $this;
    }

    /**
     * @return null|TradingRestrictions
     */
    public function firstTradingRestrictions(): ?TradingRestrictions
    {
        $tradingRestrictions = $this->tradingRestrictions ?? [];
        $tradingRestrictions = reset($tradingRestrictions);

        if (false === $tradingRestrictions) {
            return null;
        }

        return $tradingRestrictions;
    }

    /**
     * @return null|TradingRestrictions
     */
    public function lastTradingRestrictions(): ?TradingRestrictions
    {
        $tradingRestrictions = $this->tradingRestrictions ?? [];
        $tradingRestrictions = end($tradingRestrictions);

        if (false === $tradingRestrictions) {
            return null;
        }

        return $tradingRestrictions;
    }

    /**
     * @param  TradingRestrictions $tradingRestrictions
     * @return static
     */
    public function addToTradingRestrictions(
        TradingRestrictions $tradingRestrictions
    ): static {
        $this->tradingRestrictions[] = $tradingRestrictions;

        return $this;
    }

    /**
     * @return TradingRestrictions
     */
    public function addToTradingRestrictionsWithCreate(): TradingRestrictions
    {
        $this->addToTradingRestrictions($tradingRestrictions = new TradingRestrictions());

        return $tradingRestrictions;
    }

    /**
     * @param  TradingRestrictions $tradingRestrictions
     * @return static
     */
    public function addOnceToTradingRestrictions(
        TradingRestrictions $tradingRestrictions
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->tradingRestrictions)) {
            $this->tradingRestrictions = [];
        }

        $this->tradingRestrictions[0] = $tradingRestrictions;

        return $this;
    }

    /**
     * @return TradingRestrictions
     */
    public function addOnceToTradingRestrictionsWithCreate(): TradingRestrictions
    {
        if (!InvoiceSuiteArrayUtils::is($this->tradingRestrictions)) {
            $this->tradingRestrictions = [];
        }

        if ([] === $this->tradingRestrictions) {
            $this->addOnceToTradingRestrictions(new TradingRestrictions());
        }

        return $this->tradingRestrictions[0];
    }

    /**
     * @return null|array<ApplicableTerritoryAddress>
     */
    public function getApplicableTerritoryAddress(): ?array
    {
        return $this->applicableTerritoryAddress;
    }

    /**
     * @param  null|array<ApplicableTerritoryAddress> $applicableTerritoryAddress
     * @return static
     */
    public function setApplicableTerritoryAddress(
        ?array $applicableTerritoryAddress = null
    ): static {
        $this->applicableTerritoryAddress = $applicableTerritoryAddress;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetApplicableTerritoryAddress(): static
    {
        $this->applicableTerritoryAddress = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearApplicableTerritoryAddress(): static
    {
        $this->applicableTerritoryAddress = [];

        return $this;
    }

    /**
     * @return null|ApplicableTerritoryAddress
     */
    public function firstApplicableTerritoryAddress(): ?ApplicableTerritoryAddress
    {
        $applicableTerritoryAddress = $this->applicableTerritoryAddress ?? [];
        $applicableTerritoryAddress = reset($applicableTerritoryAddress);

        if (false === $applicableTerritoryAddress) {
            return null;
        }

        return $applicableTerritoryAddress;
    }

    /**
     * @return null|ApplicableTerritoryAddress
     */
    public function lastApplicableTerritoryAddress(): ?ApplicableTerritoryAddress
    {
        $applicableTerritoryAddress = $this->applicableTerritoryAddress ?? [];
        $applicableTerritoryAddress = end($applicableTerritoryAddress);

        if (false === $applicableTerritoryAddress) {
            return null;
        }

        return $applicableTerritoryAddress;
    }

    /**
     * @param  ApplicableTerritoryAddress $applicableTerritoryAddress
     * @return static
     */
    public function addToApplicableTerritoryAddress(
        ApplicableTerritoryAddress $applicableTerritoryAddress
    ): static {
        $this->applicableTerritoryAddress[] = $applicableTerritoryAddress;

        return $this;
    }

    /**
     * @return ApplicableTerritoryAddress
     */
    public function addToApplicableTerritoryAddressWithCreate(): ApplicableTerritoryAddress
    {
        $this->addToApplicableTerritoryAddress($applicableTerritoryAddress = new ApplicableTerritoryAddress());

        return $applicableTerritoryAddress;
    }

    /**
     * @param  ApplicableTerritoryAddress $applicableTerritoryAddress
     * @return static
     */
    public function addOnceToApplicableTerritoryAddress(
        ApplicableTerritoryAddress $applicableTerritoryAddress
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->applicableTerritoryAddress)) {
            $this->applicableTerritoryAddress = [];
        }

        $this->applicableTerritoryAddress[0] = $applicableTerritoryAddress;

        return $this;
    }

    /**
     * @return ApplicableTerritoryAddress
     */
    public function addOnceToApplicableTerritoryAddressWithCreate(): ApplicableTerritoryAddress
    {
        if (!InvoiceSuiteArrayUtils::is($this->applicableTerritoryAddress)) {
            $this->applicableTerritoryAddress = [];
        }

        if ([] === $this->applicableTerritoryAddress) {
            $this->addOnceToApplicableTerritoryAddress(new ApplicableTerritoryAddress());
        }

        return $this->applicableTerritoryAddress[0];
    }

    /**
     * @return null|Price
     */
    public function getPrice(): ?Price
    {
        return $this->price;
    }

    /**
     * @return Price
     */
    public function getPriceWithCreate(): Price
    {
        $this->price ??= new Price();

        return $this->price;
    }

    /**
     * @param  null|Price $price
     * @return static
     */
    public function setPrice(
        ?Price $price = null
    ): static {
        $this->price = $price;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPrice(): static
    {
        $this->price = null;

        return $this;
    }

    /**
     * @return null|array<DeliveryUnit>
     */
    public function getDeliveryUnit(): ?array
    {
        return $this->deliveryUnit;
    }

    /**
     * @param  null|array<DeliveryUnit> $deliveryUnit
     * @return static
     */
    public function setDeliveryUnit(
        ?array $deliveryUnit = null
    ): static {
        $this->deliveryUnit = $deliveryUnit;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDeliveryUnit(): static
    {
        $this->deliveryUnit = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearDeliveryUnit(): static
    {
        $this->deliveryUnit = [];

        return $this;
    }

    /**
     * @return null|DeliveryUnit
     */
    public function firstDeliveryUnit(): ?DeliveryUnit
    {
        $deliveryUnit = $this->deliveryUnit ?? [];
        $deliveryUnit = reset($deliveryUnit);

        if (false === $deliveryUnit) {
            return null;
        }

        return $deliveryUnit;
    }

    /**
     * @return null|DeliveryUnit
     */
    public function lastDeliveryUnit(): ?DeliveryUnit
    {
        $deliveryUnit = $this->deliveryUnit ?? [];
        $deliveryUnit = end($deliveryUnit);

        if (false === $deliveryUnit) {
            return null;
        }

        return $deliveryUnit;
    }

    /**
     * @param  DeliveryUnit $deliveryUnit
     * @return static
     */
    public function addToDeliveryUnit(
        DeliveryUnit $deliveryUnit
    ): static {
        $this->deliveryUnit[] = $deliveryUnit;

        return $this;
    }

    /**
     * @return DeliveryUnit
     */
    public function addToDeliveryUnitWithCreate(): DeliveryUnit
    {
        $this->addToDeliveryUnit($deliveryUnit = new DeliveryUnit());

        return $deliveryUnit;
    }

    /**
     * @param  DeliveryUnit $deliveryUnit
     * @return static
     */
    public function addOnceToDeliveryUnit(
        DeliveryUnit $deliveryUnit
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->deliveryUnit)) {
            $this->deliveryUnit = [];
        }

        $this->deliveryUnit[0] = $deliveryUnit;

        return $this;
    }

    /**
     * @return DeliveryUnit
     */
    public function addOnceToDeliveryUnitWithCreate(): DeliveryUnit
    {
        if (!InvoiceSuiteArrayUtils::is($this->deliveryUnit)) {
            $this->deliveryUnit = [];
        }

        if ([] === $this->deliveryUnit) {
            $this->addOnceToDeliveryUnit(new DeliveryUnit());
        }

        return $this->deliveryUnit[0];
    }

    /**
     * @return null|array<ApplicableTaxCategory>
     */
    public function getApplicableTaxCategory(): ?array
    {
        return $this->applicableTaxCategory;
    }

    /**
     * @param  null|array<ApplicableTaxCategory> $applicableTaxCategory
     * @return static
     */
    public function setApplicableTaxCategory(
        ?array $applicableTaxCategory = null
    ): static {
        $this->applicableTaxCategory = $applicableTaxCategory;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetApplicableTaxCategory(): static
    {
        $this->applicableTaxCategory = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearApplicableTaxCategory(): static
    {
        $this->applicableTaxCategory = [];

        return $this;
    }

    /**
     * @return null|ApplicableTaxCategory
     */
    public function firstApplicableTaxCategory(): ?ApplicableTaxCategory
    {
        $applicableTaxCategory = $this->applicableTaxCategory ?? [];
        $applicableTaxCategory = reset($applicableTaxCategory);

        if (false === $applicableTaxCategory) {
            return null;
        }

        return $applicableTaxCategory;
    }

    /**
     * @return null|ApplicableTaxCategory
     */
    public function lastApplicableTaxCategory(): ?ApplicableTaxCategory
    {
        $applicableTaxCategory = $this->applicableTaxCategory ?? [];
        $applicableTaxCategory = end($applicableTaxCategory);

        if (false === $applicableTaxCategory) {
            return null;
        }

        return $applicableTaxCategory;
    }

    /**
     * @param  ApplicableTaxCategory $applicableTaxCategory
     * @return static
     */
    public function addToApplicableTaxCategory(
        ApplicableTaxCategory $applicableTaxCategory
    ): static {
        $this->applicableTaxCategory[] = $applicableTaxCategory;

        return $this;
    }

    /**
     * @return ApplicableTaxCategory
     */
    public function addToApplicableTaxCategoryWithCreate(): ApplicableTaxCategory
    {
        $this->addToApplicableTaxCategory($applicableTaxCategory = new ApplicableTaxCategory());

        return $applicableTaxCategory;
    }

    /**
     * @param  ApplicableTaxCategory $applicableTaxCategory
     * @return static
     */
    public function addOnceToApplicableTaxCategory(
        ApplicableTaxCategory $applicableTaxCategory
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->applicableTaxCategory)) {
            $this->applicableTaxCategory = [];
        }

        $this->applicableTaxCategory[0] = $applicableTaxCategory;

        return $this;
    }

    /**
     * @return ApplicableTaxCategory
     */
    public function addOnceToApplicableTaxCategoryWithCreate(): ApplicableTaxCategory
    {
        if (!InvoiceSuiteArrayUtils::is($this->applicableTaxCategory)) {
            $this->applicableTaxCategory = [];
        }

        if ([] === $this->applicableTaxCategory) {
            $this->addOnceToApplicableTaxCategory(new ApplicableTaxCategory());
        }

        return $this->applicableTaxCategory[0];
    }

    /**
     * @return null|Package
     */
    public function getPackage(): ?Package
    {
        return $this->package;
    }

    /**
     * @return Package
     */
    public function getPackageWithCreate(): Package
    {
        $this->package ??= new Package();

        return $this->package;
    }

    /**
     * @param  null|Package $package
     * @return static
     */
    public function setPackage(
        ?Package $package = null
    ): static {
        $this->package = $package;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPackage(): static
    {
        $this->package = null;

        return $this;
    }

    /**
     * @return null|array<AllowanceCharge>
     */
    public function getAllowanceCharge(): ?array
    {
        return $this->allowanceCharge;
    }

    /**
     * @param  null|array<AllowanceCharge> $allowanceCharge
     * @return static
     */
    public function setAllowanceCharge(
        ?array $allowanceCharge = null
    ): static {
        $this->allowanceCharge = $allowanceCharge;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAllowanceCharge(): static
    {
        $this->allowanceCharge = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearAllowanceCharge(): static
    {
        $this->allowanceCharge = [];

        return $this;
    }

    /**
     * @return null|AllowanceCharge
     */
    public function firstAllowanceCharge(): ?AllowanceCharge
    {
        $allowanceCharge = $this->allowanceCharge ?? [];
        $allowanceCharge = reset($allowanceCharge);

        if (false === $allowanceCharge) {
            return null;
        }

        return $allowanceCharge;
    }

    /**
     * @return null|AllowanceCharge
     */
    public function lastAllowanceCharge(): ?AllowanceCharge
    {
        $allowanceCharge = $this->allowanceCharge ?? [];
        $allowanceCharge = end($allowanceCharge);

        if (false === $allowanceCharge) {
            return null;
        }

        return $allowanceCharge;
    }

    /**
     * @param  AllowanceCharge $allowanceCharge
     * @return static
     */
    public function addToAllowanceCharge(
        AllowanceCharge $allowanceCharge
    ): static {
        $this->allowanceCharge[] = $allowanceCharge;

        return $this;
    }

    /**
     * @return AllowanceCharge
     */
    public function addToAllowanceChargeWithCreate(): AllowanceCharge
    {
        $this->addToAllowanceCharge($allowanceCharge = new AllowanceCharge());

        return $allowanceCharge;
    }

    /**
     * @param  AllowanceCharge $allowanceCharge
     * @return static
     */
    public function addOnceToAllowanceCharge(
        AllowanceCharge $allowanceCharge
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->allowanceCharge)) {
            $this->allowanceCharge = [];
        }

        $this->allowanceCharge[0] = $allowanceCharge;

        return $this;
    }

    /**
     * @return AllowanceCharge
     */
    public function addOnceToAllowanceChargeWithCreate(): AllowanceCharge
    {
        if (!InvoiceSuiteArrayUtils::is($this->allowanceCharge)) {
            $this->allowanceCharge = [];
        }

        if ([] === $this->allowanceCharge) {
            $this->addOnceToAllowanceCharge(new AllowanceCharge());
        }

        return $this->allowanceCharge[0];
    }

    /**
     * @return null|DependentPriceReference
     */
    public function getDependentPriceReference(): ?DependentPriceReference
    {
        return $this->dependentPriceReference;
    }

    /**
     * @return DependentPriceReference
     */
    public function getDependentPriceReferenceWithCreate(): DependentPriceReference
    {
        $this->dependentPriceReference ??= new DependentPriceReference();

        return $this->dependentPriceReference;
    }

    /**
     * @param  null|DependentPriceReference $dependentPriceReference
     * @return static
     */
    public function setDependentPriceReference(
        ?DependentPriceReference $dependentPriceReference = null
    ): static {
        $this->dependentPriceReference = $dependentPriceReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDependentPriceReference(): static
    {
        $this->dependentPriceReference = null;

        return $this;
    }
}
