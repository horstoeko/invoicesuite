<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Location;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LocationID;
use JMS\Serializer\Annotation as JMS;

class StowageType
{
    use HandlesObjectFlags;

    /**
     * @var null|LocationID
     */
    #[JMS\Accessor(getter: 'getLocationID', setter: 'setLocationID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('LocationID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LocationID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $locationID;

    /**
     * @var null|array<Location>
     */
    #[JMS\Accessor(getter: 'getLocation', setter: 'setLocation')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Location')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Location>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'Location', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $location;

    /**
     * @var null|array<MeasurementDimension>
     */
    #[JMS\Accessor(getter: 'getMeasurementDimension', setter: 'setMeasurementDimension')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MeasurementDimension')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\MeasurementDimension>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'MeasurementDimension', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $measurementDimension;

    /**
     * @return null|LocationID
     */
    public function getLocationID(): ?LocationID
    {
        return $this->locationID;
    }

    /**
     * @return LocationID
     */
    public function getLocationIDWithCreate(): LocationID
    {
        $this->locationID ??= new LocationID();

        return $this->locationID;
    }

    /**
     * @param  null|LocationID $locationID
     * @return static
     */
    public function setLocationID(
        ?LocationID $locationID = null
    ): static {
        $this->locationID = $locationID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLocationID(): static
    {
        $this->locationID = null;

        return $this;
    }

    /**
     * @return null|array<Location>
     */
    public function getLocation(): ?array
    {
        return $this->location;
    }

    /**
     * @param  null|array<Location> $location
     * @return static
     */
    public function setLocation(
        ?array $location = null
    ): static {
        $this->location = $location;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLocation(): static
    {
        $this->location = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearLocation(): static
    {
        $this->location = [];

        return $this;
    }

    /**
     * @return null|Location
     */
    public function firstLocation(): ?Location
    {
        $location = $this->location ?? [];
        $location = reset($location);

        if (false === $location) {
            return null;
        }

        return $location;
    }

    /**
     * @return null|Location
     */
    public function lastLocation(): ?Location
    {
        $location = $this->location ?? [];
        $location = end($location);

        if (false === $location) {
            return null;
        }

        return $location;
    }

    /**
     * @param  Location $location
     * @return static
     */
    public function addToLocation(
        Location $location
    ): static {
        $this->location[] = $location;

        return $this;
    }

    /**
     * @return Location
     */
    public function addToLocationWithCreate(): Location
    {
        $this->addTolocation($location = new Location());

        return $location;
    }

    /**
     * @param  Location $location
     * @return static
     */
    public function addOnceToLocation(
        Location $location
    ): static {
        if (!is_array($this->location)) {
            $this->location = [];
        }

        $this->location[0] = $location;

        return $this;
    }

    /**
     * @return Location
     */
    public function addOnceToLocationWithCreate(): Location
    {
        if (!is_array($this->location)) {
            $this->location = [];
        }

        if ([] === $this->location) {
            $this->addOnceTolocation(new Location());
        }

        return $this->location[0];
    }

    /**
     * @return null|array<MeasurementDimension>
     */
    public function getMeasurementDimension(): ?array
    {
        return $this->measurementDimension;
    }

    /**
     * @param  null|array<MeasurementDimension> $measurementDimension
     * @return static
     */
    public function setMeasurementDimension(
        ?array $measurementDimension = null
    ): static {
        $this->measurementDimension = $measurementDimension;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMeasurementDimension(): static
    {
        $this->measurementDimension = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearMeasurementDimension(): static
    {
        $this->measurementDimension = [];

        return $this;
    }

    /**
     * @return null|MeasurementDimension
     */
    public function firstMeasurementDimension(): ?MeasurementDimension
    {
        $measurementDimension = $this->measurementDimension ?? [];
        $measurementDimension = reset($measurementDimension);

        if (false === $measurementDimension) {
            return null;
        }

        return $measurementDimension;
    }

    /**
     * @return null|MeasurementDimension
     */
    public function lastMeasurementDimension(): ?MeasurementDimension
    {
        $measurementDimension = $this->measurementDimension ?? [];
        $measurementDimension = end($measurementDimension);

        if (false === $measurementDimension) {
            return null;
        }

        return $measurementDimension;
    }

    /**
     * @param  MeasurementDimension $measurementDimension
     * @return static
     */
    public function addToMeasurementDimension(
        MeasurementDimension $measurementDimension
    ): static {
        $this->measurementDimension[] = $measurementDimension;

        return $this;
    }

    /**
     * @return MeasurementDimension
     */
    public function addToMeasurementDimensionWithCreate(): MeasurementDimension
    {
        $this->addTomeasurementDimension($measurementDimension = new MeasurementDimension());

        return $measurementDimension;
    }

    /**
     * @param  MeasurementDimension $measurementDimension
     * @return static
     */
    public function addOnceToMeasurementDimension(
        MeasurementDimension $measurementDimension
    ): static {
        if (!is_array($this->measurementDimension)) {
            $this->measurementDimension = [];
        }

        $this->measurementDimension[0] = $measurementDimension;

        return $this;
    }

    /**
     * @return MeasurementDimension
     */
    public function addOnceToMeasurementDimensionWithCreate(): MeasurementDimension
    {
        if (!is_array($this->measurementDimension)) {
            $this->measurementDimension = [];
        }

        if ([] === $this->measurementDimension) {
            $this->addOnceTomeasurementDimension(new MeasurementDimension());
        }

        return $this->measurementDimension[0];
    }
}
