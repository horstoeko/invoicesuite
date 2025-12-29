<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\AircraftID;
use JMS\Serializer\Annotation as JMS;

class AirTransportType
{
    use HandlesObjectFlags;

    /**
     * @var null|AircraftID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\AircraftID")
     * @JMS\Expose
     * @JMS\SerializedName("AircraftID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAircraftID", setter="setAircraftID")
     */
    private $aircraftID;

    /**
     * @return null|AircraftID
     */
    public function getAircraftID(): ?AircraftID
    {
        return $this->aircraftID;
    }

    /**
     * @return AircraftID
     */
    public function getAircraftIDWithCreate(): AircraftID
    {
        $this->aircraftID = is_null($this->aircraftID) ? new AircraftID() : $this->aircraftID;

        return $this->aircraftID;
    }

    /**
     * @param  null|AircraftID $aircraftID
     * @return static
     */
    public function setAircraftID(?AircraftID $aircraftID = null): static
    {
        $this->aircraftID = $aircraftID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAircraftID(): static
    {
        $this->aircraftID = null;

        return $this;
    }
}
