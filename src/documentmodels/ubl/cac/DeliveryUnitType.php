<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\BatchQuantity;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\ConsumerUnitQuantity;

class DeliveryUnitType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\BatchQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\BatchQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("BatchQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getBatchQuantity", setter="setBatchQuantity")
     */
    private $batchQuantity;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\ConsumerUnitQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\ConsumerUnitQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("ConsumerUnitQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getConsumerUnitQuantity", setter="setConsumerUnitQuantity")
     */
    private $consumerUnitQuantity;

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
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\BatchQuantity|null
     */
    public function getBatchQuantity(): ?BatchQuantity
    {
        return $this->batchQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\BatchQuantity
     */
    public function getBatchQuantityWithCreate(): BatchQuantity
    {
        $this->batchQuantity = is_null($this->batchQuantity) ? new BatchQuantity() : $this->batchQuantity;

        return $this->batchQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\BatchQuantity|null $batchQuantity
     * @return self
     */
    public function setBatchQuantity(?BatchQuantity $batchQuantity = null): self
    {
        $this->batchQuantity = $batchQuantity;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetBatchQuantity(): self
    {
        $this->batchQuantity = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ConsumerUnitQuantity|null
     */
    public function getConsumerUnitQuantity(): ?ConsumerUnitQuantity
    {
        return $this->consumerUnitQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ConsumerUnitQuantity
     */
    public function getConsumerUnitQuantityWithCreate(): ConsumerUnitQuantity
    {
        $this->consumerUnitQuantity = is_null($this->consumerUnitQuantity) ? new ConsumerUnitQuantity() : $this->consumerUnitQuantity;

        return $this->consumerUnitQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ConsumerUnitQuantity|null $consumerUnitQuantity
     * @return self
     */
    public function setConsumerUnitQuantity(?ConsumerUnitQuantity $consumerUnitQuantity = null): self
    {
        $this->consumerUnitQuantity = $consumerUnitQuantity;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetConsumerUnitQuantity(): self
    {
        $this->consumerUnitQuantity = null;

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
     * @return self
     */
    public function unsetHazardousRiskIndicator(): self
    {
        $this->hazardousRiskIndicator = null;

        return $this;
    }
}
