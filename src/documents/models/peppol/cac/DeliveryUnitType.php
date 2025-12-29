<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\BatchQuantity;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ConsumerUnitQuantity;
use JMS\Serializer\Annotation as JMS;

class DeliveryUnitType
{
    use HandlesObjectFlags;

    /**
     * @var null|BatchQuantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\BatchQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("BatchQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getBatchQuantity", setter="setBatchQuantity")
     */
    private $batchQuantity;

    /**
     * @var null|ConsumerUnitQuantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ConsumerUnitQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("ConsumerUnitQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getConsumerUnitQuantity", setter="setConsumerUnitQuantity")
     */
    private $consumerUnitQuantity;

    /**
     * @var null|bool
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("HazardousRiskIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getHazardousRiskIndicator", setter="setHazardousRiskIndicator")
     */
    private $hazardousRiskIndicator;

    /**
     * @return null|BatchQuantity
     */
    public function getBatchQuantity(): ?BatchQuantity
    {
        return $this->batchQuantity;
    }

    /**
     * @return BatchQuantity
     */
    public function getBatchQuantityWithCreate(): BatchQuantity
    {
        $this->batchQuantity = is_null($this->batchQuantity) ? new BatchQuantity() : $this->batchQuantity;

        return $this->batchQuantity;
    }

    /**
     * @param  null|BatchQuantity $batchQuantity
     * @return static
     */
    public function setBatchQuantity(?BatchQuantity $batchQuantity = null): static
    {
        $this->batchQuantity = $batchQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetBatchQuantity(): static
    {
        $this->batchQuantity = null;

        return $this;
    }

    /**
     * @return null|ConsumerUnitQuantity
     */
    public function getConsumerUnitQuantity(): ?ConsumerUnitQuantity
    {
        return $this->consumerUnitQuantity;
    }

    /**
     * @return ConsumerUnitQuantity
     */
    public function getConsumerUnitQuantityWithCreate(): ConsumerUnitQuantity
    {
        $this->consumerUnitQuantity = is_null($this->consumerUnitQuantity) ? new ConsumerUnitQuantity() : $this->consumerUnitQuantity;

        return $this->consumerUnitQuantity;
    }

    /**
     * @param  null|ConsumerUnitQuantity $consumerUnitQuantity
     * @return static
     */
    public function setConsumerUnitQuantity(?ConsumerUnitQuantity $consumerUnitQuantity = null): static
    {
        $this->consumerUnitQuantity = $consumerUnitQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetConsumerUnitQuantity(): static
    {
        $this->consumerUnitQuantity = null;

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
    public function setHazardousRiskIndicator(?bool $hazardousRiskIndicator = null): static
    {
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
}
