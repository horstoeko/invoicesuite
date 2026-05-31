<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Quantity;
use JMS\Serializer\Annotation as JMS;

class GoodsItemContainerType
{
    use HandlesObjectFlags;

    /**
     * @var null|ID
     */
    #[JMS\Accessor(getter: 'getID', setter: 'setID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $iD;

    /**
     * @var null|Quantity
     */
    #[JMS\Accessor(getter: 'getQuantity', setter: 'setQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Quantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Quantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $quantity;

    /**
     * @var null|array<TransportEquipment>
     */
    #[JMS\Accessor(getter: 'getTransportEquipment', setter: 'setTransportEquipment')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TransportEquipment')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\TransportEquipment>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'TransportEquipment', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $transportEquipment;

    /**
     * @return null|ID
     */
    public function getID(): ?ID
    {
        return $this->iD;
    }

    /**
     * @return ID
     */
    public function getIDWithCreate(): ID
    {
        $this->iD ??= new ID();

        return $this->iD;
    }

    /**
     * @param  null|ID $iD
     * @return static
     */
    public function setID(
        ?ID $iD = null
    ): static {
        $this->iD = $iD;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetID(): static
    {
        $this->iD = null;

        return $this;
    }

    /**
     * @return null|Quantity
     */
    public function getQuantity(): ?Quantity
    {
        return $this->quantity;
    }

    /**
     * @return Quantity
     */
    public function getQuantityWithCreate(): Quantity
    {
        $this->quantity ??= new Quantity();

        return $this->quantity;
    }

    /**
     * @param  null|Quantity $quantity
     * @return static
     */
    public function setQuantity(
        ?Quantity $quantity = null
    ): static {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetQuantity(): static
    {
        $this->quantity = null;

        return $this;
    }

    /**
     * @return null|array<TransportEquipment>
     */
    public function getTransportEquipment(): ?array
    {
        return $this->transportEquipment;
    }

    /**
     * @param  null|array<TransportEquipment> $transportEquipment
     * @return static
     */
    public function setTransportEquipment(
        ?array $transportEquipment = null
    ): static {
        $this->transportEquipment = $transportEquipment;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTransportEquipment(): static
    {
        $this->transportEquipment = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearTransportEquipment(): static
    {
        $this->transportEquipment = [];

        return $this;
    }

    /**
     * @return null|TransportEquipment
     */
    public function firstTransportEquipment(): ?TransportEquipment
    {
        $transportEquipment = $this->transportEquipment ?? [];
        $transportEquipment = reset($transportEquipment);

        if (false === $transportEquipment) {
            return null;
        }

        return $transportEquipment;
    }

    /**
     * @return null|TransportEquipment
     */
    public function lastTransportEquipment(): ?TransportEquipment
    {
        $transportEquipment = $this->transportEquipment ?? [];
        $transportEquipment = end($transportEquipment);

        if (false === $transportEquipment) {
            return null;
        }

        return $transportEquipment;
    }

    /**
     * @param  TransportEquipment $transportEquipment
     * @return static
     */
    public function addToTransportEquipment(
        TransportEquipment $transportEquipment
    ): static {
        $this->transportEquipment[] = $transportEquipment;

        return $this;
    }

    /**
     * @return TransportEquipment
     */
    public function addToTransportEquipmentWithCreate(): TransportEquipment
    {
        $this->addToTransportEquipment($transportEquipment = new TransportEquipment());

        return $transportEquipment;
    }

    /**
     * @param  TransportEquipment $transportEquipment
     * @return static
     */
    public function addOnceToTransportEquipment(
        TransportEquipment $transportEquipment
    ): static {
        if (!is_array($this->transportEquipment)) {
            $this->transportEquipment = [];
        }

        $this->transportEquipment[0] = $transportEquipment;

        return $this;
    }

    /**
     * @return TransportEquipment
     */
    public function addOnceToTransportEquipmentWithCreate(): TransportEquipment
    {
        if (!is_array($this->transportEquipment)) {
            $this->transportEquipment = [];
        }

        if ([] === $this->transportEquipment) {
            $this->addOnceToTransportEquipment(new TransportEquipment());
        }

        return $this->transportEquipment[0];
    }
}
