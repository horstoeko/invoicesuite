<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\RailCarID;
use horstoeko\invoicesuite\models\ubl\cbc\TrainID;

class RailTransportType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\TrainID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\TrainID")
     * @JMS\Expose
     * @JMS\SerializedName("TrainID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTrainID", setter="setTrainID")
     */
    private $trainID;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\RailCarID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\RailCarID")
     * @JMS\Expose
     * @JMS\SerializedName("RailCarID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRailCarID", setter="setRailCarID")
     */
    private $railCarID;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TrainID|null
     */
    public function getTrainID(): ?TrainID
    {
        return $this->trainID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TrainID
     */
    public function getTrainIDWithCreate(): TrainID
    {
        $this->trainID = is_null($this->trainID) ? new TrainID() : $this->trainID;

        return $this->trainID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\TrainID|null $trainID
     * @return self
     */
    public function setTrainID(?TrainID $trainID = null): self
    {
        $this->trainID = $trainID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTrainID(): self
    {
        $this->trainID = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\RailCarID|null
     */
    public function getRailCarID(): ?RailCarID
    {
        return $this->railCarID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\RailCarID
     */
    public function getRailCarIDWithCreate(): RailCarID
    {
        $this->railCarID = is_null($this->railCarID) ? new RailCarID() : $this->railCarID;

        return $this->railCarID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\RailCarID|null $railCarID
     * @return self
     */
    public function setRailCarID(?RailCarID $railCarID = null): self
    {
        $this->railCarID = $railCarID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetRailCarID(): self
    {
        $this->railCarID = null;

        return $this;
    }
}
