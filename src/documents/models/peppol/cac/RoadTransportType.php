<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\LicensePlateID;
use JMS\Serializer\Annotation as JMS;

class RoadTransportType
{
    use HandlesObjectFlags;

    /**
     * @var null|LicensePlateID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\LicensePlateID")
     * @JMS\Expose
     * @JMS\SerializedName("LicensePlateID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLicensePlateID", setter="setLicensePlateID")
     */
    private $licensePlateID;

    /**
     * @return null|LicensePlateID
     */
    public function getLicensePlateID(): ?LicensePlateID
    {
        return $this->licensePlateID;
    }

    /**
     * @return LicensePlateID
     */
    public function getLicensePlateIDWithCreate(): LicensePlateID
    {
        $this->licensePlateID = is_null($this->licensePlateID) ? new LicensePlateID() : $this->licensePlateID;

        return $this->licensePlateID;
    }

    /**
     * @param  null|LicensePlateID $licensePlateID
     * @return static
     */
    public function setLicensePlateID(?LicensePlateID $licensePlateID = null): static
    {
        $this->licensePlateID = $licensePlateID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLicensePlateID(): static
    {
        $this->licensePlateID = null;

        return $this;
    }
}
