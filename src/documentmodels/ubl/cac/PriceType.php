<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\BaseQuantity;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\OrderableUnitFactorRate;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\PriceAmount;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\PriceChangeReason;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\PriceType as PriceType1;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\PriceTypeCode;

class PriceType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\PriceAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\PriceAmount")
     * @JMS\Expose
     * @JMS\SerializedName("PriceAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPriceAmount", setter="setPriceAmount")
     */
    private $priceAmount;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\BaseQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\BaseQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("BaseQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getBaseQuantity", setter="setBaseQuantity")
     */
    private $baseQuantity;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\PriceChangeReason>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cbc\PriceChangeReason>")
     * @JMS\Expose
     * @JMS\SerializedName("PriceChangeReason")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PriceChangeReason", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getPriceChangeReason", setter="setPriceChangeReason")
     */
    private $priceChangeReason;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\PriceTypeCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\PriceTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("PriceTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPriceTypeCode", setter="setPriceTypeCode")
     */
    private $priceTypeCode;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\PriceType|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\PriceType")
     * @JMS\Expose
     * @JMS\SerializedName("PriceType")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPriceType", setter="setPriceType")
     */
    private $priceType;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\OrderableUnitFactorRate|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\OrderableUnitFactorRate")
     * @JMS\Expose
     * @JMS\SerializedName("OrderableUnitFactorRate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOrderableUnitFactorRate", setter="setOrderableUnitFactorRate")
     */
    private $orderableUnitFactorRate;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\ValidityPeriod>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\ValidityPeriod>")
     * @JMS\Expose
     * @JMS\SerializedName("ValidityPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ValidityPeriod", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getValidityPeriod", setter="setValidityPeriod")
     */
    private $validityPeriod;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\PriceList|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\PriceList")
     * @JMS\Expose
     * @JMS\SerializedName("PriceList")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPriceList", setter="setPriceList")
     */
    private $priceList;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\AllowanceCharge>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\AllowanceCharge>")
     * @JMS\Expose
     * @JMS\SerializedName("AllowanceCharge")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="AllowanceCharge", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getAllowanceCharge", setter="setAllowanceCharge")
     */
    private $allowanceCharge;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\PricingExchangeRate|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\PricingExchangeRate")
     * @JMS\Expose
     * @JMS\SerializedName("PricingExchangeRate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPricingExchangeRate", setter="setPricingExchangeRate")
     */
    private $pricingExchangeRate;

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\PriceAmount|null
     */
    public function getPriceAmount(): ?PriceAmount
    {
        return $this->priceAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\PriceAmount
     */
    public function getPriceAmountWithCreate(): PriceAmount
    {
        $this->priceAmount = is_null($this->priceAmount) ? new PriceAmount() : $this->priceAmount;

        return $this->priceAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\PriceAmount|null $priceAmount
     * @return self
     */
    public function setPriceAmount(?PriceAmount $priceAmount = null): self
    {
        $this->priceAmount = $priceAmount;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPriceAmount(): self
    {
        $this->priceAmount = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\BaseQuantity|null
     */
    public function getBaseQuantity(): ?BaseQuantity
    {
        return $this->baseQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\BaseQuantity
     */
    public function getBaseQuantityWithCreate(): BaseQuantity
    {
        $this->baseQuantity = is_null($this->baseQuantity) ? new BaseQuantity() : $this->baseQuantity;

        return $this->baseQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\BaseQuantity|null $baseQuantity
     * @return self
     */
    public function setBaseQuantity(?BaseQuantity $baseQuantity = null): self
    {
        $this->baseQuantity = $baseQuantity;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetBaseQuantity(): self
    {
        $this->baseQuantity = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\PriceChangeReason>|null
     */
    public function getPriceChangeReason(): ?array
    {
        return $this->priceChangeReason;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\PriceChangeReason>|null $priceChangeReason
     * @return self
     */
    public function setPriceChangeReason(?array $priceChangeReason = null): self
    {
        $this->priceChangeReason = $priceChangeReason;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPriceChangeReason(): self
    {
        $this->priceChangeReason = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearPriceChangeReason(): self
    {
        $this->priceChangeReason = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\PriceChangeReason|null
     */
    public function firstPriceChangeReason(): ?PriceChangeReason
    {
        $priceChangeReason = $this->priceChangeReason ?? [];
        $priceChangeReason = reset($priceChangeReason);

        if ($priceChangeReason === false) {
            return null;
        }

        return $priceChangeReason;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\PriceChangeReason|null
     */
    public function lastPriceChangeReason(): ?PriceChangeReason
    {
        $priceChangeReason = $this->priceChangeReason ?? [];
        $priceChangeReason = end($priceChangeReason);

        if ($priceChangeReason === false) {
            return null;
        }

        return $priceChangeReason;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\PriceChangeReason $priceChangeReason
     * @return self
     */
    public function addToPriceChangeReason(PriceChangeReason $priceChangeReason): self
    {
        $this->priceChangeReason[] = $priceChangeReason;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\PriceChangeReason
     */
    public function addToPriceChangeReasonWithCreate(): PriceChangeReason
    {
        $this->addTopriceChangeReason($priceChangeReason = new PriceChangeReason());

        return $priceChangeReason;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\PriceChangeReason $priceChangeReason
     * @return self
     */
    public function addOnceToPriceChangeReason(PriceChangeReason $priceChangeReason): self
    {
        if (!is_array($this->priceChangeReason)) {
            $this->priceChangeReason = [];
        }

        $this->priceChangeReason[0] = $priceChangeReason;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\PriceChangeReason
     */
    public function addOnceToPriceChangeReasonWithCreate(): PriceChangeReason
    {
        if (!is_array($this->priceChangeReason)) {
            $this->priceChangeReason = [];
        }

        if ($this->priceChangeReason === []) {
            $this->addOnceTopriceChangeReason(new PriceChangeReason());
        }

        return $this->priceChangeReason[0];
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\PriceTypeCode|null
     */
    public function getPriceTypeCode(): ?PriceTypeCode
    {
        return $this->priceTypeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\PriceTypeCode
     */
    public function getPriceTypeCodeWithCreate(): PriceTypeCode
    {
        $this->priceTypeCode = is_null($this->priceTypeCode) ? new PriceTypeCode() : $this->priceTypeCode;

        return $this->priceTypeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\PriceTypeCode|null $priceTypeCode
     * @return self
     */
    public function setPriceTypeCode(?PriceTypeCode $priceTypeCode = null): self
    {
        $this->priceTypeCode = $priceTypeCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPriceTypeCode(): self
    {
        $this->priceTypeCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\PriceType|null
     */
    public function getPriceType(): ?PriceType1
    {
        return $this->priceType;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\PriceType
     */
    public function getPriceTypeWithCreate(): PriceType1
    {
        $this->priceType = is_null($this->priceType) ? new PriceType() : $this->priceType;

        return $this->priceType;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\PriceType|null $priceType
     * @return self
     */
    public function setPriceType(?PriceType1 $priceType = null): self
    {
        $this->priceType = $priceType;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPriceType(): self
    {
        $this->priceType = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\OrderableUnitFactorRate|null
     */
    public function getOrderableUnitFactorRate(): ?OrderableUnitFactorRate
    {
        return $this->orderableUnitFactorRate;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\OrderableUnitFactorRate
     */
    public function getOrderableUnitFactorRateWithCreate(): OrderableUnitFactorRate
    {
        $this->orderableUnitFactorRate = is_null($this->orderableUnitFactorRate) ? new OrderableUnitFactorRate() : $this->orderableUnitFactorRate;

        return $this->orderableUnitFactorRate;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\OrderableUnitFactorRate|null $orderableUnitFactorRate
     * @return self
     */
    public function setOrderableUnitFactorRate(?OrderableUnitFactorRate $orderableUnitFactorRate = null): self
    {
        $this->orderableUnitFactorRate = $orderableUnitFactorRate;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetOrderableUnitFactorRate(): self
    {
        $this->orderableUnitFactorRate = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\ValidityPeriod>|null
     */
    public function getValidityPeriod(): ?array
    {
        return $this->validityPeriod;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\ValidityPeriod>|null $validityPeriod
     * @return self
     */
    public function setValidityPeriod(?array $validityPeriod = null): self
    {
        $this->validityPeriod = $validityPeriod;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetValidityPeriod(): self
    {
        $this->validityPeriod = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearValidityPeriod(): self
    {
        $this->validityPeriod = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ValidityPeriod|null
     */
    public function firstValidityPeriod(): ?ValidityPeriod
    {
        $validityPeriod = $this->validityPeriod ?? [];
        $validityPeriod = reset($validityPeriod);

        if ($validityPeriod === false) {
            return null;
        }

        return $validityPeriod;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ValidityPeriod|null
     */
    public function lastValidityPeriod(): ?ValidityPeriod
    {
        $validityPeriod = $this->validityPeriod ?? [];
        $validityPeriod = end($validityPeriod);

        if ($validityPeriod === false) {
            return null;
        }

        return $validityPeriod;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\ValidityPeriod $validityPeriod
     * @return self
     */
    public function addToValidityPeriod(ValidityPeriod $validityPeriod): self
    {
        $this->validityPeriod[] = $validityPeriod;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ValidityPeriod
     */
    public function addToValidityPeriodWithCreate(): ValidityPeriod
    {
        $this->addTovalidityPeriod($validityPeriod = new ValidityPeriod());

        return $validityPeriod;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\ValidityPeriod $validityPeriod
     * @return self
     */
    public function addOnceToValidityPeriod(ValidityPeriod $validityPeriod): self
    {
        if (!is_array($this->validityPeriod)) {
            $this->validityPeriod = [];
        }

        $this->validityPeriod[0] = $validityPeriod;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ValidityPeriod
     */
    public function addOnceToValidityPeriodWithCreate(): ValidityPeriod
    {
        if (!is_array($this->validityPeriod)) {
            $this->validityPeriod = [];
        }

        if ($this->validityPeriod === []) {
            $this->addOnceTovalidityPeriod(new ValidityPeriod());
        }

        return $this->validityPeriod[0];
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\PriceList|null
     */
    public function getPriceList(): ?PriceList
    {
        return $this->priceList;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\PriceList
     */
    public function getPriceListWithCreate(): PriceList
    {
        $this->priceList = is_null($this->priceList) ? new PriceList() : $this->priceList;

        return $this->priceList;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\PriceList|null $priceList
     * @return self
     */
    public function setPriceList(?PriceList $priceList = null): self
    {
        $this->priceList = $priceList;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPriceList(): self
    {
        $this->priceList = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\AllowanceCharge>|null
     */
    public function getAllowanceCharge(): ?array
    {
        return $this->allowanceCharge;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\AllowanceCharge>|null $allowanceCharge
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
    public function unsetAllowanceCharge(): self
    {
        $this->allowanceCharge = null;

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
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\AllowanceCharge|null
     */
    public function firstAllowanceCharge(): ?AllowanceCharge
    {
        $allowanceCharge = $this->allowanceCharge ?? [];
        $allowanceCharge = reset($allowanceCharge);

        if ($allowanceCharge === false) {
            return null;
        }

        return $allowanceCharge;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\AllowanceCharge|null
     */
    public function lastAllowanceCharge(): ?AllowanceCharge
    {
        $allowanceCharge = $this->allowanceCharge ?? [];
        $allowanceCharge = end($allowanceCharge);

        if ($allowanceCharge === false) {
            return null;
        }

        return $allowanceCharge;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\AllowanceCharge $allowanceCharge
     * @return self
     */
    public function addToAllowanceCharge(AllowanceCharge $allowanceCharge): self
    {
        $this->allowanceCharge[] = $allowanceCharge;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\AllowanceCharge
     */
    public function addToAllowanceChargeWithCreate(): AllowanceCharge
    {
        $this->addToallowanceCharge($allowanceCharge = new AllowanceCharge());

        return $allowanceCharge;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\AllowanceCharge $allowanceCharge
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
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\AllowanceCharge
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
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\PricingExchangeRate|null
     */
    public function getPricingExchangeRate(): ?PricingExchangeRate
    {
        return $this->pricingExchangeRate;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\PricingExchangeRate
     */
    public function getPricingExchangeRateWithCreate(): PricingExchangeRate
    {
        $this->pricingExchangeRate = is_null($this->pricingExchangeRate) ? new PricingExchangeRate() : $this->pricingExchangeRate;

        return $this->pricingExchangeRate;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\PricingExchangeRate|null $pricingExchangeRate
     * @return self
     */
    public function setPricingExchangeRate(?PricingExchangeRate $pricingExchangeRate = null): self
    {
        $this->pricingExchangeRate = $pricingExchangeRate;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPricingExchangeRate(): self
    {
        $this->pricingExchangeRate = null;

        return $this;
    }
}
