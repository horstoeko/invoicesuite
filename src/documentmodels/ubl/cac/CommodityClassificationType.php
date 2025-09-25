<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\CargoTypeCode;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\CommodityCode;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\ItemClassificationCode;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\NatureCode;

class CommodityClassificationType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\NatureCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\NatureCode")
     * @JMS\Expose
     * @JMS\SerializedName("NatureCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getNatureCode", setter="setNatureCode")
     */
    private $natureCode;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\CargoTypeCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\CargoTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("CargoTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCargoTypeCode", setter="setCargoTypeCode")
     */
    private $cargoTypeCode;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\CommodityCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\CommodityCode")
     * @JMS\Expose
     * @JMS\SerializedName("CommodityCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCommodityCode", setter="setCommodityCode")
     */
    private $commodityCode;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\ItemClassificationCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\ItemClassificationCode")
     * @JMS\Expose
     * @JMS\SerializedName("ItemClassificationCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getItemClassificationCode", setter="setItemClassificationCode")
     */
    private $itemClassificationCode;

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\NatureCode|null
     */
    public function getNatureCode(): ?NatureCode
    {
        return $this->natureCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\NatureCode
     */
    public function getNatureCodeWithCreate(): NatureCode
    {
        $this->natureCode = is_null($this->natureCode) ? new NatureCode() : $this->natureCode;

        return $this->natureCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\NatureCode|null $natureCode
     * @return self
     */
    public function setNatureCode(?NatureCode $natureCode = null): self
    {
        $this->natureCode = $natureCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetNatureCode(): self
    {
        $this->natureCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\CargoTypeCode|null
     */
    public function getCargoTypeCode(): ?CargoTypeCode
    {
        return $this->cargoTypeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\CargoTypeCode
     */
    public function getCargoTypeCodeWithCreate(): CargoTypeCode
    {
        $this->cargoTypeCode = is_null($this->cargoTypeCode) ? new CargoTypeCode() : $this->cargoTypeCode;

        return $this->cargoTypeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\CargoTypeCode|null $cargoTypeCode
     * @return self
     */
    public function setCargoTypeCode(?CargoTypeCode $cargoTypeCode = null): self
    {
        $this->cargoTypeCode = $cargoTypeCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetCargoTypeCode(): self
    {
        $this->cargoTypeCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\CommodityCode|null
     */
    public function getCommodityCode(): ?CommodityCode
    {
        return $this->commodityCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\CommodityCode
     */
    public function getCommodityCodeWithCreate(): CommodityCode
    {
        $this->commodityCode = is_null($this->commodityCode) ? new CommodityCode() : $this->commodityCode;

        return $this->commodityCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\CommodityCode|null $commodityCode
     * @return self
     */
    public function setCommodityCode(?CommodityCode $commodityCode = null): self
    {
        $this->commodityCode = $commodityCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetCommodityCode(): self
    {
        $this->commodityCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ItemClassificationCode|null
     */
    public function getItemClassificationCode(): ?ItemClassificationCode
    {
        return $this->itemClassificationCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ItemClassificationCode
     */
    public function getItemClassificationCodeWithCreate(): ItemClassificationCode
    {
        $this->itemClassificationCode = is_null($this->itemClassificationCode) ? new ItemClassificationCode() : $this->itemClassificationCode;

        return $this->itemClassificationCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ItemClassificationCode|null $itemClassificationCode
     * @return self
     */
    public function setItemClassificationCode(?ItemClassificationCode $itemClassificationCode = null): self
    {
        $this->itemClassificationCode = $itemClassificationCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetItemClassificationCode(): self
    {
        $this->itemClassificationCode = null;

        return $this;
    }
}
