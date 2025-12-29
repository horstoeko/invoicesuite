<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\GrossTonnageMeasure;
use horstoeko\invoicesuite\documents\models\peppol\cbc\NetTonnageMeasure;
use horstoeko\invoicesuite\documents\models\peppol\cbc\RadioCallSignID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ShipsRequirements;
use horstoeko\invoicesuite\documents\models\peppol\cbc\VesselID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\VesselName;
use JMS\Serializer\Annotation as JMS;

class MaritimeTransportType
{
    use HandlesObjectFlags;

    /**
     * @var null|VesselID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\VesselID")
     * @JMS\Expose
     * @JMS\SerializedName("VesselID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getVesselID", setter="setVesselID")
     */
    private $vesselID;

    /**
     * @var null|VesselName
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\VesselName")
     * @JMS\Expose
     * @JMS\SerializedName("VesselName")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getVesselName", setter="setVesselName")
     */
    private $vesselName;

    /**
     * @var null|RadioCallSignID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\RadioCallSignID")
     * @JMS\Expose
     * @JMS\SerializedName("RadioCallSignID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRadioCallSignID", setter="setRadioCallSignID")
     */
    private $radioCallSignID;

    /**
     * @var null|array<ShipsRequirements>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\ShipsRequirements>")
     * @JMS\Expose
     * @JMS\SerializedName("ShipsRequirements")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ShipsRequirements", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getShipsRequirements", setter="setShipsRequirements")
     */
    private $shipsRequirements;

    /**
     * @var null|GrossTonnageMeasure
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\GrossTonnageMeasure")
     * @JMS\Expose
     * @JMS\SerializedName("GrossTonnageMeasure")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getGrossTonnageMeasure", setter="setGrossTonnageMeasure")
     */
    private $grossTonnageMeasure;

    /**
     * @var null|NetTonnageMeasure
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\NetTonnageMeasure")
     * @JMS\Expose
     * @JMS\SerializedName("NetTonnageMeasure")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getNetTonnageMeasure", setter="setNetTonnageMeasure")
     */
    private $netTonnageMeasure;

    /**
     * @var null|RegistryCertificateDocumentReference
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\RegistryCertificateDocumentReference")
     * @JMS\Expose
     * @JMS\SerializedName("RegistryCertificateDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRegistryCertificateDocumentReference", setter="setRegistryCertificateDocumentReference")
     */
    private $registryCertificateDocumentReference;

    /**
     * @var null|RegistryPortLocation
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\RegistryPortLocation")
     * @JMS\Expose
     * @JMS\SerializedName("RegistryPortLocation")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRegistryPortLocation", setter="setRegistryPortLocation")
     */
    private $registryPortLocation;

    /**
     * @return null|VesselID
     */
    public function getVesselID(): ?VesselID
    {
        return $this->vesselID;
    }

    /**
     * @return VesselID
     */
    public function getVesselIDWithCreate(): VesselID
    {
        $this->vesselID = is_null($this->vesselID) ? new VesselID() : $this->vesselID;

        return $this->vesselID;
    }

    /**
     * @param  null|VesselID $vesselID
     * @return static
     */
    public function setVesselID(?VesselID $vesselID = null): static
    {
        $this->vesselID = $vesselID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetVesselID(): static
    {
        $this->vesselID = null;

        return $this;
    }

    /**
     * @return null|VesselName
     */
    public function getVesselName(): ?VesselName
    {
        return $this->vesselName;
    }

    /**
     * @return VesselName
     */
    public function getVesselNameWithCreate(): VesselName
    {
        $this->vesselName = is_null($this->vesselName) ? new VesselName() : $this->vesselName;

        return $this->vesselName;
    }

    /**
     * @param  null|VesselName $vesselName
     * @return static
     */
    public function setVesselName(?VesselName $vesselName = null): static
    {
        $this->vesselName = $vesselName;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetVesselName(): static
    {
        $this->vesselName = null;

        return $this;
    }

    /**
     * @return null|RadioCallSignID
     */
    public function getRadioCallSignID(): ?RadioCallSignID
    {
        return $this->radioCallSignID;
    }

    /**
     * @return RadioCallSignID
     */
    public function getRadioCallSignIDWithCreate(): RadioCallSignID
    {
        $this->radioCallSignID = is_null($this->radioCallSignID) ? new RadioCallSignID() : $this->radioCallSignID;

        return $this->radioCallSignID;
    }

    /**
     * @param  null|RadioCallSignID $radioCallSignID
     * @return static
     */
    public function setRadioCallSignID(?RadioCallSignID $radioCallSignID = null): static
    {
        $this->radioCallSignID = $radioCallSignID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRadioCallSignID(): static
    {
        $this->radioCallSignID = null;

        return $this;
    }

    /**
     * @return null|array<ShipsRequirements>
     */
    public function getShipsRequirements(): ?array
    {
        return $this->shipsRequirements;
    }

    /**
     * @param  null|array<ShipsRequirements> $shipsRequirements
     * @return static
     */
    public function setShipsRequirements(?array $shipsRequirements = null): static
    {
        $this->shipsRequirements = $shipsRequirements;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetShipsRequirements(): static
    {
        $this->shipsRequirements = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearShipsRequirements(): static
    {
        $this->shipsRequirements = [];

        return $this;
    }

    /**
     * @return null|ShipsRequirements
     */
    public function firstShipsRequirements(): ?ShipsRequirements
    {
        $shipsRequirements = $this->shipsRequirements ?? [];
        $shipsRequirements = reset($shipsRequirements);

        if (false === $shipsRequirements) {
            return null;
        }

        return $shipsRequirements;
    }

    /**
     * @return null|ShipsRequirements
     */
    public function lastShipsRequirements(): ?ShipsRequirements
    {
        $shipsRequirements = $this->shipsRequirements ?? [];
        $shipsRequirements = end($shipsRequirements);

        if (false === $shipsRequirements) {
            return null;
        }

        return $shipsRequirements;
    }

    /**
     * @param  ShipsRequirements $shipsRequirements
     * @return static
     */
    public function addToShipsRequirements(ShipsRequirements $shipsRequirements): static
    {
        $this->shipsRequirements[] = $shipsRequirements;

        return $this;
    }

    /**
     * @return ShipsRequirements
     */
    public function addToShipsRequirementsWithCreate(): ShipsRequirements
    {
        $this->addToshipsRequirements($shipsRequirements = new ShipsRequirements());

        return $shipsRequirements;
    }

    /**
     * @param  ShipsRequirements $shipsRequirements
     * @return static
     */
    public function addOnceToShipsRequirements(ShipsRequirements $shipsRequirements): static
    {
        if (!is_array($this->shipsRequirements)) {
            $this->shipsRequirements = [];
        }

        $this->shipsRequirements[0] = $shipsRequirements;

        return $this;
    }

    /**
     * @return ShipsRequirements
     */
    public function addOnceToShipsRequirementsWithCreate(): ShipsRequirements
    {
        if (!is_array($this->shipsRequirements)) {
            $this->shipsRequirements = [];
        }

        if ([] === $this->shipsRequirements) {
            $this->addOnceToshipsRequirements(new ShipsRequirements());
        }

        return $this->shipsRequirements[0];
    }

    /**
     * @return null|GrossTonnageMeasure
     */
    public function getGrossTonnageMeasure(): ?GrossTonnageMeasure
    {
        return $this->grossTonnageMeasure;
    }

    /**
     * @return GrossTonnageMeasure
     */
    public function getGrossTonnageMeasureWithCreate(): GrossTonnageMeasure
    {
        $this->grossTonnageMeasure = is_null($this->grossTonnageMeasure) ? new GrossTonnageMeasure() : $this->grossTonnageMeasure;

        return $this->grossTonnageMeasure;
    }

    /**
     * @param  null|GrossTonnageMeasure $grossTonnageMeasure
     * @return static
     */
    public function setGrossTonnageMeasure(?GrossTonnageMeasure $grossTonnageMeasure = null): static
    {
        $this->grossTonnageMeasure = $grossTonnageMeasure;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetGrossTonnageMeasure(): static
    {
        $this->grossTonnageMeasure = null;

        return $this;
    }

    /**
     * @return null|NetTonnageMeasure
     */
    public function getNetTonnageMeasure(): ?NetTonnageMeasure
    {
        return $this->netTonnageMeasure;
    }

    /**
     * @return NetTonnageMeasure
     */
    public function getNetTonnageMeasureWithCreate(): NetTonnageMeasure
    {
        $this->netTonnageMeasure = is_null($this->netTonnageMeasure) ? new NetTonnageMeasure() : $this->netTonnageMeasure;

        return $this->netTonnageMeasure;
    }

    /**
     * @param  null|NetTonnageMeasure $netTonnageMeasure
     * @return static
     */
    public function setNetTonnageMeasure(?NetTonnageMeasure $netTonnageMeasure = null): static
    {
        $this->netTonnageMeasure = $netTonnageMeasure;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetNetTonnageMeasure(): static
    {
        $this->netTonnageMeasure = null;

        return $this;
    }

    /**
     * @return null|RegistryCertificateDocumentReference
     */
    public function getRegistryCertificateDocumentReference(): ?RegistryCertificateDocumentReference
    {
        return $this->registryCertificateDocumentReference;
    }

    /**
     * @return RegistryCertificateDocumentReference
     */
    public function getRegistryCertificateDocumentReferenceWithCreate(): RegistryCertificateDocumentReference
    {
        $this->registryCertificateDocumentReference = is_null($this->registryCertificateDocumentReference) ? new RegistryCertificateDocumentReference() : $this->registryCertificateDocumentReference;

        return $this->registryCertificateDocumentReference;
    }

    /**
     * @param  null|RegistryCertificateDocumentReference $registryCertificateDocumentReference
     * @return static
     */
    public function setRegistryCertificateDocumentReference(
        ?RegistryCertificateDocumentReference $registryCertificateDocumentReference = null,
    ): static {
        $this->registryCertificateDocumentReference = $registryCertificateDocumentReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRegistryCertificateDocumentReference(): static
    {
        $this->registryCertificateDocumentReference = null;

        return $this;
    }

    /**
     * @return null|RegistryPortLocation
     */
    public function getRegistryPortLocation(): ?RegistryPortLocation
    {
        return $this->registryPortLocation;
    }

    /**
     * @return RegistryPortLocation
     */
    public function getRegistryPortLocationWithCreate(): RegistryPortLocation
    {
        $this->registryPortLocation = is_null($this->registryPortLocation) ? new RegistryPortLocation() : $this->registryPortLocation;

        return $this->registryPortLocation;
    }

    /**
     * @param  null|RegistryPortLocation $registryPortLocation
     * @return static
     */
    public function setRegistryPortLocation(?RegistryPortLocation $registryPortLocation = null): static
    {
        $this->registryPortLocation = $registryPortLocation;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRegistryPortLocation(): static
    {
        $this->registryPortLocation = null;

        return $this;
    }
}
