<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\LicensePlateID;

class RoadTransportType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\LicensePlateID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\LicensePlateID")
     * @JMS\Expose
     * @JMS\SerializedName("LicensePlateID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLicensePlateID", setter="setLicensePlateID")
     */
    private $licensePlateID;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\LicensePlateID|null
     */
    public function getLicensePlateID(): ?LicensePlateID
    {
        return $this->licensePlateID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\LicensePlateID
     */
    public function getLicensePlateIDWithCreate(): LicensePlateID
    {
        $this->licensePlateID = is_null($this->licensePlateID) ? new LicensePlateID() : $this->licensePlateID;

        return $this->licensePlateID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\LicensePlateID|null $licensePlateID
     * @return self
     */
    public function setLicensePlateID(?LicensePlateID $licensePlateID = null): self
    {
        $this->licensePlateID = $licensePlateID;

        return $this;
    }
}
