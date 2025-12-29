<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\HazardousRegulationCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\InhalationToxicityZoneCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\PackingCriteriaCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\TransportAuthorizationCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\TransportEmergencyCardCode;
use JMS\Serializer\Annotation as JMS;

class HazardousGoodsTransitType
{
    use HandlesObjectFlags;

    /**
     * @var null|TransportEmergencyCardCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\TransportEmergencyCardCode")
     * @JMS\Expose
     * @JMS\SerializedName("TransportEmergencyCardCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTransportEmergencyCardCode", setter="setTransportEmergencyCardCode")
     */
    private $transportEmergencyCardCode;

    /**
     * @var null|PackingCriteriaCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\PackingCriteriaCode")
     * @JMS\Expose
     * @JMS\SerializedName("PackingCriteriaCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPackingCriteriaCode", setter="setPackingCriteriaCode")
     */
    private $packingCriteriaCode;

    /**
     * @var null|HazardousRegulationCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\HazardousRegulationCode")
     * @JMS\Expose
     * @JMS\SerializedName("HazardousRegulationCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getHazardousRegulationCode", setter="setHazardousRegulationCode")
     */
    private $hazardousRegulationCode;

    /**
     * @var null|InhalationToxicityZoneCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\InhalationToxicityZoneCode")
     * @JMS\Expose
     * @JMS\SerializedName("InhalationToxicityZoneCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getInhalationToxicityZoneCode", setter="setInhalationToxicityZoneCode")
     */
    private $inhalationToxicityZoneCode;

    /**
     * @var null|TransportAuthorizationCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\TransportAuthorizationCode")
     * @JMS\Expose
     * @JMS\SerializedName("TransportAuthorizationCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTransportAuthorizationCode", setter="setTransportAuthorizationCode")
     */
    private $transportAuthorizationCode;

    /**
     * @var null|MaximumTemperature
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\MaximumTemperature")
     * @JMS\Expose
     * @JMS\SerializedName("MaximumTemperature")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMaximumTemperature", setter="setMaximumTemperature")
     */
    private $maximumTemperature;

    /**
     * @var null|MinimumTemperature
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\MinimumTemperature")
     * @JMS\Expose
     * @JMS\SerializedName("MinimumTemperature")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMinimumTemperature", setter="setMinimumTemperature")
     */
    private $minimumTemperature;

    /**
     * @return null|TransportEmergencyCardCode
     */
    public function getTransportEmergencyCardCode(): ?TransportEmergencyCardCode
    {
        return $this->transportEmergencyCardCode;
    }

    /**
     * @return TransportEmergencyCardCode
     */
    public function getTransportEmergencyCardCodeWithCreate(): TransportEmergencyCardCode
    {
        $this->transportEmergencyCardCode = is_null($this->transportEmergencyCardCode) ? new TransportEmergencyCardCode() : $this->transportEmergencyCardCode;

        return $this->transportEmergencyCardCode;
    }

    /**
     * @param  null|TransportEmergencyCardCode $transportEmergencyCardCode
     * @return static
     */
    public function setTransportEmergencyCardCode(
        ?TransportEmergencyCardCode $transportEmergencyCardCode = null,
    ): static {
        $this->transportEmergencyCardCode = $transportEmergencyCardCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTransportEmergencyCardCode(): static
    {
        $this->transportEmergencyCardCode = null;

        return $this;
    }

    /**
     * @return null|PackingCriteriaCode
     */
    public function getPackingCriteriaCode(): ?PackingCriteriaCode
    {
        return $this->packingCriteriaCode;
    }

    /**
     * @return PackingCriteriaCode
     */
    public function getPackingCriteriaCodeWithCreate(): PackingCriteriaCode
    {
        $this->packingCriteriaCode = is_null($this->packingCriteriaCode) ? new PackingCriteriaCode() : $this->packingCriteriaCode;

        return $this->packingCriteriaCode;
    }

    /**
     * @param  null|PackingCriteriaCode $packingCriteriaCode
     * @return static
     */
    public function setPackingCriteriaCode(?PackingCriteriaCode $packingCriteriaCode = null): static
    {
        $this->packingCriteriaCode = $packingCriteriaCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPackingCriteriaCode(): static
    {
        $this->packingCriteriaCode = null;

        return $this;
    }

    /**
     * @return null|HazardousRegulationCode
     */
    public function getHazardousRegulationCode(): ?HazardousRegulationCode
    {
        return $this->hazardousRegulationCode;
    }

    /**
     * @return HazardousRegulationCode
     */
    public function getHazardousRegulationCodeWithCreate(): HazardousRegulationCode
    {
        $this->hazardousRegulationCode = is_null($this->hazardousRegulationCode) ? new HazardousRegulationCode() : $this->hazardousRegulationCode;

        return $this->hazardousRegulationCode;
    }

    /**
     * @param  null|HazardousRegulationCode $hazardousRegulationCode
     * @return static
     */
    public function setHazardousRegulationCode(?HazardousRegulationCode $hazardousRegulationCode = null): static
    {
        $this->hazardousRegulationCode = $hazardousRegulationCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetHazardousRegulationCode(): static
    {
        $this->hazardousRegulationCode = null;

        return $this;
    }

    /**
     * @return null|InhalationToxicityZoneCode
     */
    public function getInhalationToxicityZoneCode(): ?InhalationToxicityZoneCode
    {
        return $this->inhalationToxicityZoneCode;
    }

    /**
     * @return InhalationToxicityZoneCode
     */
    public function getInhalationToxicityZoneCodeWithCreate(): InhalationToxicityZoneCode
    {
        $this->inhalationToxicityZoneCode = is_null($this->inhalationToxicityZoneCode) ? new InhalationToxicityZoneCode() : $this->inhalationToxicityZoneCode;

        return $this->inhalationToxicityZoneCode;
    }

    /**
     * @param  null|InhalationToxicityZoneCode $inhalationToxicityZoneCode
     * @return static
     */
    public function setInhalationToxicityZoneCode(
        ?InhalationToxicityZoneCode $inhalationToxicityZoneCode = null,
    ): static {
        $this->inhalationToxicityZoneCode = $inhalationToxicityZoneCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetInhalationToxicityZoneCode(): static
    {
        $this->inhalationToxicityZoneCode = null;

        return $this;
    }

    /**
     * @return null|TransportAuthorizationCode
     */
    public function getTransportAuthorizationCode(): ?TransportAuthorizationCode
    {
        return $this->transportAuthorizationCode;
    }

    /**
     * @return TransportAuthorizationCode
     */
    public function getTransportAuthorizationCodeWithCreate(): TransportAuthorizationCode
    {
        $this->transportAuthorizationCode = is_null($this->transportAuthorizationCode) ? new TransportAuthorizationCode() : $this->transportAuthorizationCode;

        return $this->transportAuthorizationCode;
    }

    /**
     * @param  null|TransportAuthorizationCode $transportAuthorizationCode
     * @return static
     */
    public function setTransportAuthorizationCode(
        ?TransportAuthorizationCode $transportAuthorizationCode = null,
    ): static {
        $this->transportAuthorizationCode = $transportAuthorizationCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTransportAuthorizationCode(): static
    {
        $this->transportAuthorizationCode = null;

        return $this;
    }

    /**
     * @return null|MaximumTemperature
     */
    public function getMaximumTemperature(): ?MaximumTemperature
    {
        return $this->maximumTemperature;
    }

    /**
     * @return MaximumTemperature
     */
    public function getMaximumTemperatureWithCreate(): MaximumTemperature
    {
        $this->maximumTemperature = is_null($this->maximumTemperature) ? new MaximumTemperature() : $this->maximumTemperature;

        return $this->maximumTemperature;
    }

    /**
     * @param  null|MaximumTemperature $maximumTemperature
     * @return static
     */
    public function setMaximumTemperature(?MaximumTemperature $maximumTemperature = null): static
    {
        $this->maximumTemperature = $maximumTemperature;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMaximumTemperature(): static
    {
        $this->maximumTemperature = null;

        return $this;
    }

    /**
     * @return null|MinimumTemperature
     */
    public function getMinimumTemperature(): ?MinimumTemperature
    {
        return $this->minimumTemperature;
    }

    /**
     * @return MinimumTemperature
     */
    public function getMinimumTemperatureWithCreate(): MinimumTemperature
    {
        $this->minimumTemperature = is_null($this->minimumTemperature) ? new MinimumTemperature() : $this->minimumTemperature;

        return $this->minimumTemperature;
    }

    /**
     * @param  null|MinimumTemperature $minimumTemperature
     * @return static
     */
    public function setMinimumTemperature(?MinimumTemperature $minimumTemperature = null): static
    {
        $this->minimumTemperature = $minimumTemperature;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMinimumTemperature(): static
    {
        $this->minimumTemperature = null;

        return $this;
    }
}
