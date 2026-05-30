<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\RailCarID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TrainID;
use JMS\Serializer\Annotation as JMS;

class RailTransportType
{
    use HandlesObjectFlags;

    /**
     * @var null|TrainID
     */
    #[JMS\Accessor(getter: 'getTrainID', setter: 'setTrainID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TrainID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TrainID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $trainID;

    /**
     * @var null|RailCarID
     */
    #[JMS\Accessor(getter: 'getRailCarID', setter: 'setRailCarID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('RailCarID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\RailCarID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $railCarID;

    /**
     * @return null|TrainID
     */
    public function getTrainID(): ?TrainID
    {
        return $this->trainID;
    }

    /**
     * @return TrainID
     */
    public function getTrainIDWithCreate(): TrainID
    {
        $this->trainID ??= new TrainID();

        return $this->trainID;
    }

    /**
     * @param  null|TrainID $trainID
     * @return static
     */
    public function setTrainID(
        ?TrainID $trainID = null
    ): static {
        $this->trainID = $trainID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTrainID(): static
    {
        $this->trainID = null;

        return $this;
    }

    /**
     * @return null|RailCarID
     */
    public function getRailCarID(): ?RailCarID
    {
        return $this->railCarID;
    }

    /**
     * @return RailCarID
     */
    public function getRailCarIDWithCreate(): RailCarID
    {
        $this->railCarID ??= new RailCarID();

        return $this->railCarID;
    }

    /**
     * @param  null|RailCarID $railCarID
     * @return static
     */
    public function setRailCarID(
        ?RailCarID $railCarID = null
    ): static {
        $this->railCarID = $railCarID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRailCarID(): static
    {
        $this->railCarID = null;

        return $this;
    }
}
