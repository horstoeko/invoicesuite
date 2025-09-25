<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\Location;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\LocationID;

class StowageType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\LocationID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\LocationID")
     * @JMS\Expose
     * @JMS\SerializedName("LocationID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLocationID", setter="setLocationID")
     */
    private $locationID;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Location>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cbc\Location>")
     * @JMS\Expose
     * @JMS\SerializedName("Location")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Location", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getLocation", setter="setLocation")
     */
    private $location;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\MeasurementDimension>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\MeasurementDimension>")
     * @JMS\Expose
     * @JMS\SerializedName("MeasurementDimension")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="MeasurementDimension", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getMeasurementDimension", setter="setMeasurementDimension")
     */
    private $measurementDimension;

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\LocationID|null
     */
    public function getLocationID(): ?LocationID
    {
        return $this->locationID;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\LocationID
     */
    public function getLocationIDWithCreate(): LocationID
    {
        $this->locationID = is_null($this->locationID) ? new LocationID() : $this->locationID;

        return $this->locationID;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\LocationID|null $locationID
     * @return self
     */
    public function setLocationID(?LocationID $locationID = null): self
    {
        $this->locationID = $locationID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetLocationID(): self
    {
        $this->locationID = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Location>|null
     */
    public function getLocation(): ?array
    {
        return $this->location;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Location>|null $location
     * @return self
     */
    public function setLocation(?array $location = null): self
    {
        $this->location = $location;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetLocation(): self
    {
        $this->location = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearLocation(): self
    {
        $this->location = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Location|null
     */
    public function firstLocation(): ?Location
    {
        $location = $this->location ?? [];
        $location = reset($location);

        if ($location === false) {
            return null;
        }

        return $location;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Location|null
     */
    public function lastLocation(): ?Location
    {
        $location = $this->location ?? [];
        $location = end($location);

        if ($location === false) {
            return null;
        }

        return $location;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Location $location
     * @return self
     */
    public function addToLocation(Location $location): self
    {
        $this->location[] = $location;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Location
     */
    public function addToLocationWithCreate(): Location
    {
        $this->addTolocation($location = new Location());

        return $location;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Location $location
     * @return self
     */
    public function addOnceToLocation(Location $location): self
    {
        if (!is_array($this->location)) {
            $this->location = [];
        }

        $this->location[0] = $location;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Location
     */
    public function addOnceToLocationWithCreate(): Location
    {
        if (!is_array($this->location)) {
            $this->location = [];
        }

        if ($this->location === []) {
            $this->addOnceTolocation(new Location());
        }

        return $this->location[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\MeasurementDimension>|null
     */
    public function getMeasurementDimension(): ?array
    {
        return $this->measurementDimension;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\MeasurementDimension>|null $measurementDimension
     * @return self
     */
    public function setMeasurementDimension(?array $measurementDimension = null): self
    {
        $this->measurementDimension = $measurementDimension;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetMeasurementDimension(): self
    {
        $this->measurementDimension = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearMeasurementDimension(): self
    {
        $this->measurementDimension = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\MeasurementDimension|null
     */
    public function firstMeasurementDimension(): ?MeasurementDimension
    {
        $measurementDimension = $this->measurementDimension ?? [];
        $measurementDimension = reset($measurementDimension);

        if ($measurementDimension === false) {
            return null;
        }

        return $measurementDimension;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\MeasurementDimension|null
     */
    public function lastMeasurementDimension(): ?MeasurementDimension
    {
        $measurementDimension = $this->measurementDimension ?? [];
        $measurementDimension = end($measurementDimension);

        if ($measurementDimension === false) {
            return null;
        }

        return $measurementDimension;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\MeasurementDimension $measurementDimension
     * @return self
     */
    public function addToMeasurementDimension(MeasurementDimension $measurementDimension): self
    {
        $this->measurementDimension[] = $measurementDimension;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\MeasurementDimension
     */
    public function addToMeasurementDimensionWithCreate(): MeasurementDimension
    {
        $this->addTomeasurementDimension($measurementDimension = new MeasurementDimension());

        return $measurementDimension;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\MeasurementDimension $measurementDimension
     * @return self
     */
    public function addOnceToMeasurementDimension(MeasurementDimension $measurementDimension): self
    {
        if (!is_array($this->measurementDimension)) {
            $this->measurementDimension = [];
        }

        $this->measurementDimension[0] = $measurementDimension;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\MeasurementDimension
     */
    public function addOnceToMeasurementDimensionWithCreate(): MeasurementDimension
    {
        if (!is_array($this->measurementDimension)) {
            $this->measurementDimension = [];
        }

        if ($this->measurementDimension === []) {
            $this->addOnceTomeasurementDimension(new MeasurementDimension());
        }

        return $this->measurementDimension[0];
    }
}
