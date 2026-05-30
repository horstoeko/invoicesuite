<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\AircraftID;
use JMS\Serializer\Annotation as JMS;

class AirTransportType
{
    use HandlesObjectFlags;

    /**
     * @var null|AircraftID
     */
    #[JMS\Accessor(getter: 'getAircraftID', setter: 'setAircraftID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('AircraftID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\AircraftID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
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
        $this->aircraftID ??= new AircraftID();

        return $this->aircraftID;
    }

    /**
     * @param  null|AircraftID $aircraftID
     * @return static
     */
    public function setAircraftID(
        ?AircraftID $aircraftID = null
    ): static {
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
