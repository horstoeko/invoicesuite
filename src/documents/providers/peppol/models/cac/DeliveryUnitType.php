<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\BatchQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ConsumerUnitQuantity;
use JMS\Serializer\Annotation as JMS;

class DeliveryUnitType
{
    use HandlesObjectFlags;

    /**
     * @var null|BatchQuantity
     */
    #[JMS\Accessor(getter: 'getBatchQuantity', setter: 'setBatchQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('BatchQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\BatchQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $batchQuantity;

    /**
     * @var null|ConsumerUnitQuantity
     */
    #[JMS\Accessor(getter: 'getConsumerUnitQuantity', setter: 'setConsumerUnitQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ConsumerUnitQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ConsumerUnitQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $consumerUnitQuantity;

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
        $this->batchQuantity ??= new BatchQuantity();

        return $this->batchQuantity;
    }

    /**
     * @param  null|BatchQuantity $batchQuantity
     * @return static
     */
    public function setBatchQuantity(
        ?BatchQuantity $batchQuantity = null
    ): static {
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
        $this->consumerUnitQuantity ??= new ConsumerUnitQuantity();

        return $this->consumerUnitQuantity;
    }

    /**
     * @param  null|ConsumerUnitQuantity $consumerUnitQuantity
     * @return static
     */
    public function setConsumerUnitQuantity(
        ?ConsumerUnitQuantity $consumerUnitQuantity = null
    ): static {
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
}
