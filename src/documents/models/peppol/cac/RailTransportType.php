<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\RailCarID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\TrainID;
use JMS\Serializer\Annotation as JMS;

class RailTransportType
{
    use HandlesObjectFlags;

    /**
     * @var null|TrainID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\TrainID")
     * @JMS\Expose
     * @JMS\SerializedName("TrainID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTrainID", setter="setTrainID")
     */
    private $trainID;

    /**
     * @var null|RailCarID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\RailCarID")
     * @JMS\Expose
     * @JMS\SerializedName("RailCarID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRailCarID", setter="setRailCarID")
     */
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
        $this->trainID = is_null($this->trainID) ? new TrainID() : $this->trainID;

        return $this->trainID;
    }

    /**
     * @param  null|TrainID $trainID
     * @return static
     */
    public function setTrainID(?TrainID $trainID = null): static
    {
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
        $this->railCarID = is_null($this->railCarID) ? new RailCarID() : $this->railCarID;

        return $this->railCarID;
    }

    /**
     * @param  null|RailCarID $railCarID
     * @return static
     */
    public function setRailCarID(?RailCarID $railCarID = null): static
    {
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
