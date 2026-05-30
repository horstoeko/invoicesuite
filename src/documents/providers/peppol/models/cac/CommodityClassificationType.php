<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CargoTypeCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CommodityCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ItemClassificationCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\NatureCode;
use JMS\Serializer\Annotation as JMS;

class CommodityClassificationType
{
    use HandlesObjectFlags;

    /**
     * @var null|NatureCode
     */
    #[JMS\Accessor(getter: 'getNatureCode', setter: 'setNatureCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('NatureCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\NatureCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $natureCode;

    /**
     * @var null|CargoTypeCode
     */
    #[JMS\Accessor(getter: 'getCargoTypeCode', setter: 'setCargoTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CargoTypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CargoTypeCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $cargoTypeCode;

    /**
     * @var null|CommodityCode
     */
    #[JMS\Accessor(getter: 'getCommodityCode', setter: 'setCommodityCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CommodityCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CommodityCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $commodityCode;

    /**
     * @var null|ItemClassificationCode
     */
    #[JMS\Accessor(getter: 'getItemClassificationCode', setter: 'setItemClassificationCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ItemClassificationCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ItemClassificationCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
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
        $this->natureCode ??= new NatureCode();

        return $this->natureCode;
    }

    /**
     * @param  null|NatureCode $natureCode
     * @return static
     */
    public function setNatureCode(
        ?NatureCode $natureCode = null
    ): static {
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
        $this->cargoTypeCode ??= new CargoTypeCode();

        return $this->cargoTypeCode;
    }

    /**
     * @param  null|CargoTypeCode $cargoTypeCode
     * @return static
     */
    public function setCargoTypeCode(
        ?CargoTypeCode $cargoTypeCode = null
    ): static {
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
        $this->commodityCode ??= new CommodityCode();

        return $this->commodityCode;
    }

    /**
     * @param  null|CommodityCode $commodityCode
     * @return static
     */
    public function setCommodityCode(
        ?CommodityCode $commodityCode = null
    ): static {
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
        $this->itemClassificationCode ??= new ItemClassificationCode();

        return $this->itemClassificationCode;
    }

    /**
     * @param  null|ItemClassificationCode $itemClassificationCode
     * @return static
     */
    public function setItemClassificationCode(
        ?ItemClassificationCode $itemClassificationCode = null
    ): static {
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
