<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\AircraftID;

class AirTransportType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\AircraftID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\AircraftID")
     * @JMS\Expose
     * @JMS\SerializedName("AircraftID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAircraftID", setter="setAircraftID")
     */
    private $aircraftID;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\AircraftID|null
     */
    public function getAircraftID(): ?AircraftID
    {
        return $this->aircraftID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\AircraftID
     */
    public function getAircraftIDWithCreate(): AircraftID
    {
        $this->aircraftID = is_null($this->aircraftID) ? new AircraftID() : $this->aircraftID;

        return $this->aircraftID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\AircraftID|null $aircraftID
     * @return self
     */
    public function setAircraftID(?AircraftID $aircraftID = null): self
    {
        $this->aircraftID = $aircraftID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetAircraftID(): self
    {
        $this->aircraftID = null;

        return $this;
    }
}
