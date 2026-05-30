<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LicensePlateID;
use JMS\Serializer\Annotation as JMS;

class RoadTransportType
{
    use HandlesObjectFlags;

    /**
     * @var null|LicensePlateID
     */
    #[JMS\Accessor(getter: 'getLicensePlateID', setter: 'setLicensePlateID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('LicensePlateID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LicensePlateID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
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
        $this->licensePlateID ??= new LicensePlateID();

        return $this->licensePlateID;
    }

    /**
     * @param  null|LicensePlateID $licensePlateID
     * @return static
     */
    public function setLicensePlateID(
        ?LicensePlateID $licensePlateID = null
    ): static {
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
