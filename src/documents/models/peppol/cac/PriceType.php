<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\BaseQuantity;
use horstoeko\invoicesuite\documents\models\peppol\cbc\OrderableUnitFactorRate;
use horstoeko\invoicesuite\documents\models\peppol\cbc\PriceAmount;
use horstoeko\invoicesuite\documents\models\peppol\cbc\PriceChangeReason;
use horstoeko\invoicesuite\documents\models\peppol\cbc\PriceType as PriceType1;
use horstoeko\invoicesuite\documents\models\peppol\cbc\PriceTypeCode;
use JMS\Serializer\Annotation as JMS;

class PriceType
{
    use HandlesObjectFlags;

    /**
     * @var null|PriceAmount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\PriceAmount")
     * @JMS\Expose
     * @JMS\SerializedName("PriceAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPriceAmount", setter="setPriceAmount")
     */
    private $priceAmount;

    /**
     * @var null|BaseQuantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\BaseQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("BaseQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getBaseQuantity", setter="setBaseQuantity")
     */
    private $baseQuantity;

    /**
     * @var null|array<PriceChangeReason>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\PriceChangeReason>")
     * @JMS\Expose
     * @JMS\SerializedName("PriceChangeReason")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PriceChangeReason", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getPriceChangeReason", setter="setPriceChangeReason")
     */
    private $priceChangeReason;

    /**
     * @var null|PriceTypeCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\PriceTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("PriceTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPriceTypeCode", setter="setPriceTypeCode")
     */
    private $priceTypeCode;

    /**
     * @var null|PriceType1
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\PriceType")
     * @JMS\Expose
     * @JMS\SerializedName("PriceType")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPriceType", setter="setPriceType")
     */
    private $priceType;

    /**
     * @var null|OrderableUnitFactorRate
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\OrderableUnitFactorRate")
     * @JMS\Expose
     * @JMS\SerializedName("OrderableUnitFactorRate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOrderableUnitFactorRate", setter="setOrderableUnitFactorRate")
     */
    private $orderableUnitFactorRate;

    /**
     * @var null|array<ValidityPeriod>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\ValidityPeriod>")
     * @JMS\Expose
     * @JMS\SerializedName("ValidityPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ValidityPeriod", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getValidityPeriod", setter="setValidityPeriod")
     */
    private $validityPeriod;

    /**
     * @var null|PriceList
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\PriceList")
     * @JMS\Expose
     * @JMS\SerializedName("PriceList")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPriceList", setter="setPriceList")
     */
    private $priceList;

    /**
     * @var null|array<AllowanceCharge>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\AllowanceCharge>")
     * @JMS\Expose
     * @JMS\SerializedName("AllowanceCharge")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="AllowanceCharge", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getAllowanceCharge", setter="setAllowanceCharge")
     */
    private $allowanceCharge;

    /**
     * @var null|PricingExchangeRate
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\PricingExchangeRate")
     * @JMS\Expose
     * @JMS\SerializedName("PricingExchangeRate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPricingExchangeRate", setter="setPricingExchangeRate")
     */
    private $pricingExchangeRate;

    /**
     * @return null|PriceAmount
     */
    public function getPriceAmount(): ?PriceAmount
    {
        return $this->priceAmount;
    }

    /**
     * @return PriceAmount
     */
    public function getPriceAmountWithCreate(): PriceAmount
    {
        $this->priceAmount = is_null($this->priceAmount) ? new PriceAmount() : $this->priceAmount;

        return $this->priceAmount;
    }

    /**
     * @param  null|PriceAmount $priceAmount
     * @return static
     */
    public function setPriceAmount(?PriceAmount $priceAmount = null): static
    {
        $this->priceAmount = $priceAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPriceAmount(): static
    {
        $this->priceAmount = null;

        return $this;
    }

    /**
     * @return null|BaseQuantity
     */
    public function getBaseQuantity(): ?BaseQuantity
    {
        return $this->baseQuantity;
    }

    /**
     * @return BaseQuantity
     */
    public function getBaseQuantityWithCreate(): BaseQuantity
    {
        $this->baseQuantity = is_null($this->baseQuantity) ? new BaseQuantity() : $this->baseQuantity;

        return $this->baseQuantity;
    }

    /**
     * @param  null|BaseQuantity $baseQuantity
     * @return static
     */
    public function setBaseQuantity(?BaseQuantity $baseQuantity = null): static
    {
        $this->baseQuantity = $baseQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetBaseQuantity(): static
    {
        $this->baseQuantity = null;

        return $this;
    }

    /**
     * @return null|array<PriceChangeReason>
     */
    public function getPriceChangeReason(): ?array
    {
        return $this->priceChangeReason;
    }

    /**
     * @param  null|array<PriceChangeReason> $priceChangeReason
     * @return static
     */
    public function setPriceChangeReason(?array $priceChangeReason = null): static
    {
        $this->priceChangeReason = $priceChangeReason;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPriceChangeReason(): static
    {
        $this->priceChangeReason = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearPriceChangeReason(): static
    {
        $this->priceChangeReason = [];

        return $this;
    }

    /**
     * @return null|PriceChangeReason
     */
    public function firstPriceChangeReason(): ?PriceChangeReason
    {
        $priceChangeReason = $this->priceChangeReason ?? [];
        $priceChangeReason = reset($priceChangeReason);

        if (false === $priceChangeReason) {
            return null;
        }

        return $priceChangeReason;
    }

    /**
     * @return null|PriceChangeReason
     */
    public function lastPriceChangeReason(): ?PriceChangeReason
    {
        $priceChangeReason = $this->priceChangeReason ?? [];
        $priceChangeReason = end($priceChangeReason);

        if (false === $priceChangeReason) {
            return null;
        }

        return $priceChangeReason;
    }

    /**
     * @param  PriceChangeReason $priceChangeReason
     * @return static
     */
    public function addToPriceChangeReason(PriceChangeReason $priceChangeReason): static
    {
        $this->priceChangeReason[] = $priceChangeReason;

        return $this;
    }

    /**
     * @return PriceChangeReason
     */
    public function addToPriceChangeReasonWithCreate(): PriceChangeReason
    {
        $this->addTopriceChangeReason($priceChangeReason = new PriceChangeReason());

        return $priceChangeReason;
    }

    /**
     * @param  PriceChangeReason $priceChangeReason
     * @return static
     */
    public function addOnceToPriceChangeReason(PriceChangeReason $priceChangeReason): static
    {
        if (!is_array($this->priceChangeReason)) {
            $this->priceChangeReason = [];
        }

        $this->priceChangeReason[0] = $priceChangeReason;

        return $this;
    }

    /**
     * @return PriceChangeReason
     */
    public function addOnceToPriceChangeReasonWithCreate(): PriceChangeReason
    {
        if (!is_array($this->priceChangeReason)) {
            $this->priceChangeReason = [];
        }

        if ([] === $this->priceChangeReason) {
            $this->addOnceTopriceChangeReason(new PriceChangeReason());
        }

        return $this->priceChangeReason[0];
    }

    /**
     * @return null|PriceTypeCode
     */
    public function getPriceTypeCode(): ?PriceTypeCode
    {
        return $this->priceTypeCode;
    }

    /**
     * @return PriceTypeCode
     */
    public function getPriceTypeCodeWithCreate(): PriceTypeCode
    {
        $this->priceTypeCode = is_null($this->priceTypeCode) ? new PriceTypeCode() : $this->priceTypeCode;

        return $this->priceTypeCode;
    }

    /**
     * @param  null|PriceTypeCode $priceTypeCode
     * @return static
     */
    public function setPriceTypeCode(?PriceTypeCode $priceTypeCode = null): static
    {
        $this->priceTypeCode = $priceTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPriceTypeCode(): static
    {
        $this->priceTypeCode = null;

        return $this;
    }

    /**
     * @return null|PriceType1
     */
    public function getPriceType(): ?PriceType1
    {
        return $this->priceType;
    }

    /**
     * @return PriceType1
     */
    public function getPriceTypeWithCreate(): PriceType1
    {
        $this->priceType = is_null($this->priceType) ? new PriceType1() : $this->priceType;

        return $this->priceType;
    }

    /**
     * @param  null|PriceType1 $priceType
     * @return static
     */
    public function setPriceType(?PriceType1 $priceType = null): static
    {
        $this->priceType = $priceType;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPriceType(): static
    {
        $this->priceType = null;

        return $this;
    }

    /**
     * @return null|OrderableUnitFactorRate
     */
    public function getOrderableUnitFactorRate(): ?OrderableUnitFactorRate
    {
        return $this->orderableUnitFactorRate;
    }

    /**
     * @return OrderableUnitFactorRate
     */
    public function getOrderableUnitFactorRateWithCreate(): OrderableUnitFactorRate
    {
        $this->orderableUnitFactorRate = is_null($this->orderableUnitFactorRate) ? new OrderableUnitFactorRate() : $this->orderableUnitFactorRate;

        return $this->orderableUnitFactorRate;
    }

    /**
     * @param  null|OrderableUnitFactorRate $orderableUnitFactorRate
     * @return static
     */
    public function setOrderableUnitFactorRate(?OrderableUnitFactorRate $orderableUnitFactorRate = null): static
    {
        $this->orderableUnitFactorRate = $orderableUnitFactorRate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetOrderableUnitFactorRate(): static
    {
        $this->orderableUnitFactorRate = null;

        return $this;
    }

    /**
     * @return null|array<ValidityPeriod>
     */
    public function getValidityPeriod(): ?array
    {
        return $this->validityPeriod;
    }

    /**
     * @param  null|array<ValidityPeriod> $validityPeriod
     * @return static
     */
    public function setValidityPeriod(?array $validityPeriod = null): static
    {
        $this->validityPeriod = $validityPeriod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetValidityPeriod(): static
    {
        $this->validityPeriod = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearValidityPeriod(): static
    {
        $this->validityPeriod = [];

        return $this;
    }

    /**
     * @return null|ValidityPeriod
     */
    public function firstValidityPeriod(): ?ValidityPeriod
    {
        $validityPeriod = $this->validityPeriod ?? [];
        $validityPeriod = reset($validityPeriod);

        if (false === $validityPeriod) {
            return null;
        }

        return $validityPeriod;
    }

    /**
     * @return null|ValidityPeriod
     */
    public function lastValidityPeriod(): ?ValidityPeriod
    {
        $validityPeriod = $this->validityPeriod ?? [];
        $validityPeriod = end($validityPeriod);

        if (false === $validityPeriod) {
            return null;
        }

        return $validityPeriod;
    }

    /**
     * @param  ValidityPeriod $validityPeriod
     * @return static
     */
    public function addToValidityPeriod(ValidityPeriod $validityPeriod): static
    {
        $this->validityPeriod[] = $validityPeriod;

        return $this;
    }

    /**
     * @return ValidityPeriod
     */
    public function addToValidityPeriodWithCreate(): ValidityPeriod
    {
        $this->addTovalidityPeriod($validityPeriod = new ValidityPeriod());

        return $validityPeriod;
    }

    /**
     * @param  ValidityPeriod $validityPeriod
     * @return static
     */
    public function addOnceToValidityPeriod(ValidityPeriod $validityPeriod): static
    {
        if (!is_array($this->validityPeriod)) {
            $this->validityPeriod = [];
        }

        $this->validityPeriod[0] = $validityPeriod;

        return $this;
    }

    /**
     * @return ValidityPeriod
     */
    public function addOnceToValidityPeriodWithCreate(): ValidityPeriod
    {
        if (!is_array($this->validityPeriod)) {
            $this->validityPeriod = [];
        }

        if ([] === $this->validityPeriod) {
            $this->addOnceTovalidityPeriod(new ValidityPeriod());
        }

        return $this->validityPeriod[0];
    }

    /**
     * @return null|PriceList
     */
    public function getPriceList(): ?PriceList
    {
        return $this->priceList;
    }

    /**
     * @return PriceList
     */
    public function getPriceListWithCreate(): PriceList
    {
        $this->priceList = is_null($this->priceList) ? new PriceList() : $this->priceList;

        return $this->priceList;
    }

    /**
     * @param  null|PriceList $priceList
     * @return static
     */
    public function setPriceList(?PriceList $priceList = null): static
    {
        $this->priceList = $priceList;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPriceList(): static
    {
        $this->priceList = null;

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
    public function setAllowanceCharge(?array $allowanceCharge = null): static
    {
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
    public function addToAllowanceCharge(AllowanceCharge $allowanceCharge): static
    {
        $this->allowanceCharge[] = $allowanceCharge;

        return $this;
    }

    /**
     * @return AllowanceCharge
     */
    public function addToAllowanceChargeWithCreate(): AllowanceCharge
    {
        $this->addToallowanceCharge($allowanceCharge = new AllowanceCharge());

        return $allowanceCharge;
    }

    /**
     * @param  AllowanceCharge $allowanceCharge
     * @return static
     */
    public function addOnceToAllowanceCharge(AllowanceCharge $allowanceCharge): static
    {
        if (!is_array($this->allowanceCharge)) {
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
        if (!is_array($this->allowanceCharge)) {
            $this->allowanceCharge = [];
        }

        if ([] === $this->allowanceCharge) {
            $this->addOnceToallowanceCharge(new AllowanceCharge());
        }

        return $this->allowanceCharge[0];
    }

    /**
     * @return null|PricingExchangeRate
     */
    public function getPricingExchangeRate(): ?PricingExchangeRate
    {
        return $this->pricingExchangeRate;
    }

    /**
     * @return PricingExchangeRate
     */
    public function getPricingExchangeRateWithCreate(): PricingExchangeRate
    {
        $this->pricingExchangeRate = is_null($this->pricingExchangeRate) ? new PricingExchangeRate() : $this->pricingExchangeRate;

        return $this->pricingExchangeRate;
    }

    /**
     * @param  null|PricingExchangeRate $pricingExchangeRate
     * @return static
     */
    public function setPricingExchangeRate(?PricingExchangeRate $pricingExchangeRate = null): static
    {
        $this->pricingExchangeRate = $pricingExchangeRate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPricingExchangeRate(): static
    {
        $this->pricingExchangeRate = null;

        return $this;
    }
}
