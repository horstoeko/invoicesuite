<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\CargoTypeCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\CommodityCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ItemClassificationCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\NatureCode;
use JMS\Serializer\Annotation as JMS;

class CommodityClassificationType
{
    use HandlesObjectFlags;

    /**
     * @var null|NatureCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\NatureCode")
     * @JMS\Expose
     * @JMS\SerializedName("NatureCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getNatureCode", setter="setNatureCode")
     */
    private $natureCode;

    /**
     * @var null|CargoTypeCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\CargoTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("CargoTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCargoTypeCode", setter="setCargoTypeCode")
     */
    private $cargoTypeCode;

    /**
     * @var null|CommodityCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\CommodityCode")
     * @JMS\Expose
     * @JMS\SerializedName("CommodityCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCommodityCode", setter="setCommodityCode")
     */
    private $commodityCode;

    /**
     * @var null|ItemClassificationCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ItemClassificationCode")
     * @JMS\Expose
     * @JMS\SerializedName("ItemClassificationCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getItemClassificationCode", setter="setItemClassificationCode")
     */
    private $itemClassificationCode;

    /**
     * @return null|NatureCode
     */
    public function getNatureCode(): ?NatureCode
    {
        return $this->natureCode;
    }

    /**
     * @return NatureCode
     */
    public function getNatureCodeWithCreate(): NatureCode
    {
        $this->natureCode = is_null($this->natureCode) ? new NatureCode() : $this->natureCode;

        return $this->natureCode;
    }

    /**
     * @param  null|NatureCode $natureCode
     * @return static
     */
    public function setNatureCode(?NatureCode $natureCode = null): static
    {
        $this->natureCode = $natureCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetNatureCode(): static
    {
        $this->natureCode = null;

        return $this;
    }

    /**
     * @return null|CargoTypeCode
     */
    public function getCargoTypeCode(): ?CargoTypeCode
    {
        return $this->cargoTypeCode;
    }

    /**
     * @return CargoTypeCode
     */
    public function getCargoTypeCodeWithCreate(): CargoTypeCode
    {
        $this->cargoTypeCode = is_null($this->cargoTypeCode) ? new CargoTypeCode() : $this->cargoTypeCode;

        return $this->cargoTypeCode;
    }

    /**
     * @param  null|CargoTypeCode $cargoTypeCode
     * @return static
     */
    public function setCargoTypeCode(?CargoTypeCode $cargoTypeCode = null): static
    {
        $this->cargoTypeCode = $cargoTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCargoTypeCode(): static
    {
        $this->cargoTypeCode = null;

        return $this;
    }

    /**
     * @return null|CommodityCode
     */
    public function getCommodityCode(): ?CommodityCode
    {
        return $this->commodityCode;
    }

    /**
     * @return CommodityCode
     */
    public function getCommodityCodeWithCreate(): CommodityCode
    {
        $this->commodityCode = is_null($this->commodityCode) ? new CommodityCode() : $this->commodityCode;

        return $this->commodityCode;
    }

    /**
     * @param  null|CommodityCode $commodityCode
     * @return static
     */
    public function setCommodityCode(?CommodityCode $commodityCode = null): static
    {
        $this->commodityCode = $commodityCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCommodityCode(): static
    {
        $this->commodityCode = null;

        return $this;
    }

    /**
     * @return null|ItemClassificationCode
     */
    public function getItemClassificationCode(): ?ItemClassificationCode
    {
        return $this->itemClassificationCode;
    }

    /**
     * @return ItemClassificationCode
     */
    public function getItemClassificationCodeWithCreate(): ItemClassificationCode
    {
        $this->itemClassificationCode = is_null($this->itemClassificationCode) ? new ItemClassificationCode() : $this->itemClassificationCode;

        return $this->itemClassificationCode;
    }

    /**
     * @param  null|ItemClassificationCode $itemClassificationCode
     * @return static
     */
    public function setItemClassificationCode(?ItemClassificationCode $itemClassificationCode = null): static
    {
        $this->itemClassificationCode = $itemClassificationCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetItemClassificationCode(): static
    {
        $this->itemClassificationCode = null;

        return $this;
    }
}
