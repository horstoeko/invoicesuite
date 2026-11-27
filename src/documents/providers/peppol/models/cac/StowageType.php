<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Location;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LocationID;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
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
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $locationID;

    /**
     * @var null|array<Location>
     */
    #[JMS\Accessor(getter: 'getLocation', setter: 'setLocation')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Location')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Location>')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[JMS\XmlList(entry: 'Location', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $location;

    /**
     * @var null|array<MeasurementDimension>
     */
    #[JMS\Accessor(getter: 'getMeasurementDimension', setter: 'setMeasurementDimension')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MeasurementDimension')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\MeasurementDimension>')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[JMS\XmlList(entry: 'MeasurementDimension', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
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
        $location = InvoiceSuiteArrayUtils::first($location);

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
        $location = InvoiceSuiteArrayUtils::last($location);

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
        $this->addToLocation($location = new Location());

        return $location;
    }

    /**
     * @param  Location $location
     * @return static
     */
    public function addOnceToLocation(
        Location $location
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->location)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->location)) {
            $this->location = [];
        }

        if (InvoiceSuiteArrayUtils::empty($this->location)) {
            $this->addOnceToLocation(new Location());
        }

        return $this->location[0];
    }

    /**
     * Execute a callback for each item
     *
     * @param  callable(Location): mixed $callback
     * @return static
     */
    public function forEachLocation(
        callable $callback
    ): static {
        foreach ($this->location ?? [] as $location) {
            $callback($location);
        }

        return $this;
    }

    /**
     * Filter items using a callback
     *
     * @param  callable(Location): mixed  $callback
     * @return array<array-key, Location>
     */
    public function filterLocations(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->location ?? [], $callback);
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
        $measurementDimension = InvoiceSuiteArrayUtils::first($measurementDimension);

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
        $measurementDimension = InvoiceSuiteArrayUtils::last($measurementDimension);

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
        $this->addToMeasurementDimension($measurementDimension = new MeasurementDimension());

        return $measurementDimension;
    }

    /**
     * @param  MeasurementDimension $measurementDimension
     * @return static
     */
    public function addOnceToMeasurementDimension(
        MeasurementDimension $measurementDimension
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->measurementDimension)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->measurementDimension)) {
            $this->measurementDimension = [];
        }

        if (InvoiceSuiteArrayUtils::empty($this->measurementDimension)) {
            $this->addOnceToMeasurementDimension(new MeasurementDimension());
        }

        return $this->measurementDimension[0];
    }

    /**
     * Execute a callback for each item
     *
     * @param  callable(MeasurementDimension): mixed $callback
     * @return static
     */
    public function forEachMeasurementDimension(
        callable $callback
    ): static {
        foreach ($this->measurementDimension ?? [] as $measurementDimension) {
            $callback($measurementDimension);
        }

        return $this;
    }

    /**
     * Filter items using a callback
     *
     * @param  callable(MeasurementDimension): mixed  $callback
     * @return array<array-key, MeasurementDimension>
     */
    public function filterMeasurementDimensions(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->measurementDimension ?? [], $callback);
    }
}
