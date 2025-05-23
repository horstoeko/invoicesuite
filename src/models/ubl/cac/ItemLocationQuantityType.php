<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\LeadTimeMeasure;
use horstoeko\invoicesuite\models\ubl\cbc\MaximumQuantity;
use horstoeko\invoicesuite\models\ubl\cbc\MinimumQuantity;
use horstoeko\invoicesuite\models\ubl\cbc\TradingRestrictions;

class ItemLocationQuantityType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\LeadTimeMeasure|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\LeadTimeMeasure")
     * @JMS\Expose
     * @JMS\SerializedName("LeadTimeMeasure")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLeadTimeMeasure", setter="setLeadTimeMeasure")
     */
    private $leadTimeMeasure;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\MinimumQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\MinimumQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("MinimumQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMinimumQuantity", setter="setMinimumQuantity")
     */
    private $minimumQuantity;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\MaximumQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\MaximumQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("MaximumQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMaximumQuantity", setter="setMaximumQuantity")
     */
    private $maximumQuantity;

    /**
     * @var bool|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("HazardousRiskIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getHazardousRiskIndicator", setter="setHazardousRiskIndicator")
     */
    private $hazardousRiskIndicator;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\TradingRestrictions>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\TradingRestrictions>")
     * @JMS\Expose
     * @JMS\SerializedName("TradingRestrictions")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TradingRestrictions", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getTradingRestrictions", setter="setTradingRestrictions")
     */
    private $tradingRestrictions;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\ApplicableTerritoryAddress>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\ApplicableTerritoryAddress>")
     * @JMS\Expose
     * @JMS\SerializedName("ApplicableTerritoryAddress")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ApplicableTerritoryAddress", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getApplicableTerritoryAddress", setter="setApplicableTerritoryAddress")
     */
    private $applicableTerritoryAddress;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\Price|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\Price")
     * @JMS\Expose
     * @JMS\SerializedName("Price")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPrice", setter="setPrice")
     */
    private $price;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\DeliveryUnit>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\DeliveryUnit>")
     * @JMS\Expose
     * @JMS\SerializedName("DeliveryUnit")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="DeliveryUnit", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getDeliveryUnit", setter="setDeliveryUnit")
     */
    private $deliveryUnit;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\ApplicableTaxCategory>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\ApplicableTaxCategory>")
     * @JMS\Expose
     * @JMS\SerializedName("ApplicableTaxCategory")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ApplicableTaxCategory", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getApplicableTaxCategory", setter="setApplicableTaxCategory")
     */
    private $applicableTaxCategory;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\Package|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\Package")
     * @JMS\Expose
     * @JMS\SerializedName("Package")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPackage", setter="setPackage")
     */
    private $package;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\AllowanceCharge>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\AllowanceCharge>")
     * @JMS\Expose
     * @JMS\SerializedName("AllowanceCharge")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="AllowanceCharge", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getAllowanceCharge", setter="setAllowanceCharge")
     */
    private $allowanceCharge;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\DependentPriceReference|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\DependentPriceReference")
     * @JMS\Expose
     * @JMS\SerializedName("DependentPriceReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDependentPriceReference", setter="setDependentPriceReference")
     */
    private $dependentPriceReference;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\LeadTimeMeasure|null
     */
    public function getLeadTimeMeasure(): ?LeadTimeMeasure
    {
        return $this->leadTimeMeasure;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\LeadTimeMeasure
     */
    public function getLeadTimeMeasureWithCreate(): LeadTimeMeasure
    {
        $this->leadTimeMeasure = is_null($this->leadTimeMeasure) ? new LeadTimeMeasure() : $this->leadTimeMeasure;

        return $this->leadTimeMeasure;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\LeadTimeMeasure|null $leadTimeMeasure
     * @return self
     */
    public function setLeadTimeMeasure(?LeadTimeMeasure $leadTimeMeasure = null): self
    {
        $this->leadTimeMeasure = $leadTimeMeasure;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MinimumQuantity|null
     */
    public function getMinimumQuantity(): ?MinimumQuantity
    {
        return $this->minimumQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MinimumQuantity
     */
    public function getMinimumQuantityWithCreate(): MinimumQuantity
    {
        $this->minimumQuantity = is_null($this->minimumQuantity) ? new MinimumQuantity() : $this->minimumQuantity;

        return $this->minimumQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\MinimumQuantity|null $minimumQuantity
     * @return self
     */
    public function setMinimumQuantity(?MinimumQuantity $minimumQuantity = null): self
    {
        $this->minimumQuantity = $minimumQuantity;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MaximumQuantity|null
     */
    public function getMaximumQuantity(): ?MaximumQuantity
    {
        return $this->maximumQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MaximumQuantity
     */
    public function getMaximumQuantityWithCreate(): MaximumQuantity
    {
        $this->maximumQuantity = is_null($this->maximumQuantity) ? new MaximumQuantity() : $this->maximumQuantity;

        return $this->maximumQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\MaximumQuantity|null $maximumQuantity
     * @return self
     */
    public function setMaximumQuantity(?MaximumQuantity $maximumQuantity = null): self
    {
        $this->maximumQuantity = $maximumQuantity;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getHazardousRiskIndicator(): ?bool
    {
        return $this->hazardousRiskIndicator;
    }

    /**
     * @param bool|null $hazardousRiskIndicator
     * @return self
     */
    public function setHazardousRiskIndicator(?bool $hazardousRiskIndicator = null): self
    {
        $this->hazardousRiskIndicator = $hazardousRiskIndicator;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\TradingRestrictions>|null
     */
    public function getTradingRestrictions(): ?array
    {
        return $this->tradingRestrictions;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\TradingRestrictions>|null $tradingRestrictions
     * @return self
     */
    public function setTradingRestrictions(?array $tradingRestrictions = null): self
    {
        $this->tradingRestrictions = $tradingRestrictions;

        return $this;
    }

    /**
     * @return self
     */
    public function clearTradingRestrictions(): self
    {
        $this->tradingRestrictions = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\TradingRestrictions $tradingRestrictions
     * @return self
     */
    public function addToTradingRestrictions(TradingRestrictions $tradingRestrictions): self
    {
        $this->tradingRestrictions[] = $tradingRestrictions;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TradingRestrictions
     */
    public function addToTradingRestrictionsWithCreate(): TradingRestrictions
    {
        $this->addTotradingRestrictions($tradingRestrictions = new TradingRestrictions());

        return $tradingRestrictions;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\TradingRestrictions $tradingRestrictions
     * @return self
     */
    public function addOnceToTradingRestrictions(TradingRestrictions $tradingRestrictions): self
    {
        if (!is_array($this->tradingRestrictions)) {
            $this->tradingRestrictions = [];
        }

        $this->tradingRestrictions[0] = $tradingRestrictions;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TradingRestrictions
     */
    public function addOnceToTradingRestrictionsWithCreate(): TradingRestrictions
    {
        if (!is_array($this->tradingRestrictions)) {
            $this->tradingRestrictions = [];
        }

        if ($this->tradingRestrictions === []) {
            $this->addOnceTotradingRestrictions(new TradingRestrictions());
        }

        return $this->tradingRestrictions[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\ApplicableTerritoryAddress>|null
     */
    public function getApplicableTerritoryAddress(): ?array
    {
        return $this->applicableTerritoryAddress;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\ApplicableTerritoryAddress>|null $applicableTerritoryAddress
     * @return self
     */
    public function setApplicableTerritoryAddress(?array $applicableTerritoryAddress = null): self
    {
        $this->applicableTerritoryAddress = $applicableTerritoryAddress;

        return $this;
    }

    /**
     * @return self
     */
    public function clearApplicableTerritoryAddress(): self
    {
        $this->applicableTerritoryAddress = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ApplicableTerritoryAddress $applicableTerritoryAddress
     * @return self
     */
    public function addToApplicableTerritoryAddress(ApplicableTerritoryAddress $applicableTerritoryAddress): self
    {
        $this->applicableTerritoryAddress[] = $applicableTerritoryAddress;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ApplicableTerritoryAddress
     */
    public function addToApplicableTerritoryAddressWithCreate(): ApplicableTerritoryAddress
    {
        $this->addToapplicableTerritoryAddress($applicableTerritoryAddress = new ApplicableTerritoryAddress());

        return $applicableTerritoryAddress;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ApplicableTerritoryAddress $applicableTerritoryAddress
     * @return self
     */
    public function addOnceToApplicableTerritoryAddress(ApplicableTerritoryAddress $applicableTerritoryAddress): self
    {
        if (!is_array($this->applicableTerritoryAddress)) {
            $this->applicableTerritoryAddress = [];
        }

        $this->applicableTerritoryAddress[0] = $applicableTerritoryAddress;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ApplicableTerritoryAddress
     */
    public function addOnceToApplicableTerritoryAddressWithCreate(): ApplicableTerritoryAddress
    {
        if (!is_array($this->applicableTerritoryAddress)) {
            $this->applicableTerritoryAddress = [];
        }

        if ($this->applicableTerritoryAddress === []) {
            $this->addOnceToapplicableTerritoryAddress(new ApplicableTerritoryAddress());
        }

        return $this->applicableTerritoryAddress[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Price|null
     */
    public function getPrice(): ?Price
    {
        return $this->price;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Price
     */
    public function getPriceWithCreate(): Price
    {
        $this->price = is_null($this->price) ? new Price() : $this->price;

        return $this->price;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Price|null $price
     * @return self
     */
    public function setPrice(?Price $price = null): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\DeliveryUnit>|null
     */
    public function getDeliveryUnit(): ?array
    {
        return $this->deliveryUnit;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\DeliveryUnit>|null $deliveryUnit
     * @return self
     */
    public function setDeliveryUnit(?array $deliveryUnit = null): self
    {
        $this->deliveryUnit = $deliveryUnit;

        return $this;
    }

    /**
     * @return self
     */
    public function clearDeliveryUnit(): self
    {
        $this->deliveryUnit = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\DeliveryUnit $deliveryUnit
     * @return self
     */
    public function addToDeliveryUnit(DeliveryUnit $deliveryUnit): self
    {
        $this->deliveryUnit[] = $deliveryUnit;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\DeliveryUnit
     */
    public function addToDeliveryUnitWithCreate(): DeliveryUnit
    {
        $this->addTodeliveryUnit($deliveryUnit = new DeliveryUnit());

        return $deliveryUnit;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\DeliveryUnit $deliveryUnit
     * @return self
     */
    public function addOnceToDeliveryUnit(DeliveryUnit $deliveryUnit): self
    {
        if (!is_array($this->deliveryUnit)) {
            $this->deliveryUnit = [];
        }

        $this->deliveryUnit[0] = $deliveryUnit;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\DeliveryUnit
     */
    public function addOnceToDeliveryUnitWithCreate(): DeliveryUnit
    {
        if (!is_array($this->deliveryUnit)) {
            $this->deliveryUnit = [];
        }

        if ($this->deliveryUnit === []) {
            $this->addOnceTodeliveryUnit(new DeliveryUnit());
        }

        return $this->deliveryUnit[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\ApplicableTaxCategory>|null
     */
    public function getApplicableTaxCategory(): ?array
    {
        return $this->applicableTaxCategory;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\ApplicableTaxCategory>|null $applicableTaxCategory
     * @return self
     */
    public function setApplicableTaxCategory(?array $applicableTaxCategory = null): self
    {
        $this->applicableTaxCategory = $applicableTaxCategory;

        return $this;
    }

    /**
     * @return self
     */
    public function clearApplicableTaxCategory(): self
    {
        $this->applicableTaxCategory = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ApplicableTaxCategory $applicableTaxCategory
     * @return self
     */
    public function addToApplicableTaxCategory(ApplicableTaxCategory $applicableTaxCategory): self
    {
        $this->applicableTaxCategory[] = $applicableTaxCategory;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ApplicableTaxCategory
     */
    public function addToApplicableTaxCategoryWithCreate(): ApplicableTaxCategory
    {
        $this->addToapplicableTaxCategory($applicableTaxCategory = new ApplicableTaxCategory());

        return $applicableTaxCategory;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ApplicableTaxCategory $applicableTaxCategory
     * @return self
     */
    public function addOnceToApplicableTaxCategory(ApplicableTaxCategory $applicableTaxCategory): self
    {
        if (!is_array($this->applicableTaxCategory)) {
            $this->applicableTaxCategory = [];
        }

        $this->applicableTaxCategory[0] = $applicableTaxCategory;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ApplicableTaxCategory
     */
    public function addOnceToApplicableTaxCategoryWithCreate(): ApplicableTaxCategory
    {
        if (!is_array($this->applicableTaxCategory)) {
            $this->applicableTaxCategory = [];
        }

        if ($this->applicableTaxCategory === []) {
            $this->addOnceToapplicableTaxCategory(new ApplicableTaxCategory());
        }

        return $this->applicableTaxCategory[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Package|null
     */
    public function getPackage(): ?Package
    {
        return $this->package;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Package
     */
    public function getPackageWithCreate(): Package
    {
        $this->package = is_null($this->package) ? new Package() : $this->package;

        return $this->package;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Package|null $package
     * @return self
     */
    public function setPackage(?Package $package = null): self
    {
        $this->package = $package;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\AllowanceCharge>|null
     */
    public function getAllowanceCharge(): ?array
    {
        return $this->allowanceCharge;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\AllowanceCharge>|null $allowanceCharge
     * @return self
     */
    public function setAllowanceCharge(?array $allowanceCharge = null): self
    {
        $this->allowanceCharge = $allowanceCharge;

        return $this;
    }

    /**
     * @return self
     */
    public function clearAllowanceCharge(): self
    {
        $this->allowanceCharge = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\AllowanceCharge $allowanceCharge
     * @return self
     */
    public function addToAllowanceCharge(AllowanceCharge $allowanceCharge): self
    {
        $this->allowanceCharge[] = $allowanceCharge;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\AllowanceCharge
     */
    public function addToAllowanceChargeWithCreate(): AllowanceCharge
    {
        $this->addToallowanceCharge($allowanceCharge = new AllowanceCharge());

        return $allowanceCharge;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\AllowanceCharge $allowanceCharge
     * @return self
     */
    public function addOnceToAllowanceCharge(AllowanceCharge $allowanceCharge): self
    {
        if (!is_array($this->allowanceCharge)) {
            $this->allowanceCharge = [];
        }

        $this->allowanceCharge[0] = $allowanceCharge;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\AllowanceCharge
     */
    public function addOnceToAllowanceChargeWithCreate(): AllowanceCharge
    {
        if (!is_array($this->allowanceCharge)) {
            $this->allowanceCharge = [];
        }

        if ($this->allowanceCharge === []) {
            $this->addOnceToallowanceCharge(new AllowanceCharge());
        }

        return $this->allowanceCharge[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\DependentPriceReference|null
     */
    public function getDependentPriceReference(): ?DependentPriceReference
    {
        return $this->dependentPriceReference;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\DependentPriceReference
     */
    public function getDependentPriceReferenceWithCreate(): DependentPriceReference
    {
        $this->dependentPriceReference = is_null($this->dependentPriceReference) ? new DependentPriceReference() : $this->dependentPriceReference;

        return $this->dependentPriceReference;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\DependentPriceReference|null $dependentPriceReference
     * @return self
     */
    public function setDependentPriceReference(?DependentPriceReference $dependentPriceReference = null): self
    {
        $this->dependentPriceReference = $dependentPriceReference;

        return $this;
    }
}
