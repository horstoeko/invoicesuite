<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\GrossTonnageMeasure;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\NetTonnageMeasure;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\RadioCallSignID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ShipsRequirements;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\VesselID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\VesselName;
use JMS\Serializer\Annotation as JMS;

class MaritimeTransportType
{
    use HandlesObjectFlags;

    /**
     * @var null|VesselID
     */
    #[JMS\Accessor(getter: 'getVesselID', setter: 'setVesselID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('VesselID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\VesselID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $vesselID;

    /**
     * @var null|VesselName
     */
    #[JMS\Accessor(getter: 'getVesselName', setter: 'setVesselName')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('VesselName')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\VesselName')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $vesselName;

    /**
     * @var null|RadioCallSignID
     */
    #[JMS\Accessor(getter: 'getRadioCallSignID', setter: 'setRadioCallSignID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('RadioCallSignID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\RadioCallSignID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $radioCallSignID;

    /**
     * @var null|array<ShipsRequirements>
     */
    #[JMS\Accessor(getter: 'getShipsRequirements', setter: 'setShipsRequirements')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ShipsRequirements')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ShipsRequirements>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'ShipsRequirements', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $shipsRequirements;

    /**
     * @var null|GrossTonnageMeasure
     */
    #[JMS\Accessor(getter: 'getGrossTonnageMeasure', setter: 'setGrossTonnageMeasure')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('GrossTonnageMeasure')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\GrossTonnageMeasure')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $grossTonnageMeasure;

    /**
     * @var null|NetTonnageMeasure
     */
    #[JMS\Accessor(getter: 'getNetTonnageMeasure', setter: 'setNetTonnageMeasure')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('NetTonnageMeasure')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\NetTonnageMeasure')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $netTonnageMeasure;

    /**
     * @var null|RegistryCertificateDocumentReference
     */
    #[JMS\Accessor(getter: 'getRegistryCertificateDocumentReference', setter: 'setRegistryCertificateDocumentReference')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('RegistryCertificateDocumentReference')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\RegistryCertificateDocumentReference')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $registryCertificateDocumentReference;

    /**
     * @var null|RegistryPortLocation
     */
    #[JMS\Accessor(getter: 'getRegistryPortLocation', setter: 'setRegistryPortLocation')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('RegistryPortLocation')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\RegistryPortLocation')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
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
        $this->vesselID ??= new VesselID();

        return $this->vesselID;
    }

    /**
     * @param  null|VesselID $vesselID
     * @return static
     */
    public function setVesselID(
        ?VesselID $vesselID = null
    ): static {
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
        $this->vesselName ??= new VesselName();

        return $this->vesselName;
    }

    /**
     * @param  null|VesselName $vesselName
     * @return static
     */
    public function setVesselName(
        ?VesselName $vesselName = null
    ): static {
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
        $this->radioCallSignID ??= new RadioCallSignID();

        return $this->radioCallSignID;
    }

    /**
     * @param  null|RadioCallSignID $radioCallSignID
     * @return static
     */
    public function setRadioCallSignID(
        ?RadioCallSignID $radioCallSignID = null
    ): static {
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
    public function setShipsRequirements(
        ?array $shipsRequirements = null
    ): static {
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
    public function addToShipsRequirements(
        ShipsRequirements $shipsRequirements
    ): static {
        $this->shipsRequirements[] = $shipsRequirements;

        return $this;
    }

    /**
     * @return ShipsRequirements
     */
    public function addToShipsRequirementsWithCreate(): ShipsRequirements
    {
        $this->addToShipsRequirements($shipsRequirements = new ShipsRequirements());

        return $shipsRequirements;
    }

    /**
     * @param  ShipsRequirements $shipsRequirements
     * @return static
     */
    public function addOnceToShipsRequirements(
        ShipsRequirements $shipsRequirements
    ): static {
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
            $this->addOnceToShipsRequirements(new ShipsRequirements());
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
        $this->grossTonnageMeasure ??= new GrossTonnageMeasure();

        return $this->grossTonnageMeasure;
    }

    /**
     * @param  null|GrossTonnageMeasure $grossTonnageMeasure
     * @return static
     */
    public function setGrossTonnageMeasure(
        ?GrossTonnageMeasure $grossTonnageMeasure = null
    ): static {
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
        $this->netTonnageMeasure ??= new NetTonnageMeasure();

        return $this->netTonnageMeasure;
    }

    /**
     * @param  null|NetTonnageMeasure $netTonnageMeasure
     * @return static
     */
    public function setNetTonnageMeasure(
        ?NetTonnageMeasure $netTonnageMeasure = null
    ): static {
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
        $this->registryCertificateDocumentReference ??= new RegistryCertificateDocumentReference();

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
        $this->registryPortLocation ??= new RegistryPortLocation();

        return $this->registryPortLocation;
    }

    /**
     * @param  null|RegistryPortLocation $registryPortLocation
     * @return static
     */
    public function setRegistryPortLocation(
        ?RegistryPortLocation $registryPortLocation = null
    ): static {
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
