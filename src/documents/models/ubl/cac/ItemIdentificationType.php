<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\ubl\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\ubl\cbc\BarcodeSymbologyID;
use horstoeko\invoicesuite\documents\models\ubl\cbc\ExtendedID;
use horstoeko\invoicesuite\documents\models\ubl\cbc\ID;
use JMS\Serializer\Annotation as JMS;

class ItemIdentificationType
{
    use HandlesObjectFlags;

    /**
     * @var null|ID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\ID")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var null|ExtendedID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\ExtendedID")
     * @JMS\Expose
     * @JMS\SerializedName("ExtendedID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getExtendedID", setter="setExtendedID")
     */
    private $extendedID;

    /**
     * @var null|BarcodeSymbologyID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\BarcodeSymbologyID")
     * @JMS\Expose
     * @JMS\SerializedName("BarcodeSymbologyID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getBarcodeSymbologyID", setter="setBarcodeSymbologyID")
     */
    private $barcodeSymbologyID;

    /**
     * @var null|array<PhysicalAttribute>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\PhysicalAttribute>")
     * @JMS\Expose
     * @JMS\SerializedName("PhysicalAttribute")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PhysicalAttribute", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getPhysicalAttribute", setter="setPhysicalAttribute")
     */
    private $physicalAttribute;

    /**
     * @var null|array<MeasurementDimension>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\MeasurementDimension>")
     * @JMS\Expose
     * @JMS\SerializedName("MeasurementDimension")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="MeasurementDimension", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getMeasurementDimension", setter="setMeasurementDimension")
     */
    private $measurementDimension;

    /**
     * @var null|IssuerParty
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\IssuerParty")
     * @JMS\Expose
     * @JMS\SerializedName("IssuerParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getIssuerParty", setter="setIssuerParty")
     */
    private $issuerParty;

    /**
     * @return null|ID
     */
    public function getID(): ?ID
    {
        return $this->iD;
    }

    /**
     * @return ID
     */
    public function getIDWithCreate(): ID
    {
        $this->iD = is_null($this->iD) ? new ID() : $this->iD;

        return $this->iD;
    }

    /**
     * @param  null|ID $iD
     * @return static
     */
    public function setID(?ID $iD = null): static
    {
        $this->iD = $iD;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetID(): static
    {
        $this->iD = null;

        return $this;
    }

    /**
     * @return null|ExtendedID
     */
    public function getExtendedID(): ?ExtendedID
    {
        return $this->extendedID;
    }

    /**
     * @return ExtendedID
     */
    public function getExtendedIDWithCreate(): ExtendedID
    {
        $this->extendedID = is_null($this->extendedID) ? new ExtendedID() : $this->extendedID;

        return $this->extendedID;
    }

    /**
     * @param  null|ExtendedID $extendedID
     * @return static
     */
    public function setExtendedID(?ExtendedID $extendedID = null): static
    {
        $this->extendedID = $extendedID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetExtendedID(): static
    {
        $this->extendedID = null;

        return $this;
    }

    /**
     * @return null|BarcodeSymbologyID
     */
    public function getBarcodeSymbologyID(): ?BarcodeSymbologyID
    {
        return $this->barcodeSymbologyID;
    }

    /**
     * @return BarcodeSymbologyID
     */
    public function getBarcodeSymbologyIDWithCreate(): BarcodeSymbologyID
    {
        $this->barcodeSymbologyID = is_null($this->barcodeSymbologyID) ? new BarcodeSymbologyID() : $this->barcodeSymbologyID;

        return $this->barcodeSymbologyID;
    }

    /**
     * @param  null|BarcodeSymbologyID $barcodeSymbologyID
     * @return static
     */
    public function setBarcodeSymbologyID(?BarcodeSymbologyID $barcodeSymbologyID = null): static
    {
        $this->barcodeSymbologyID = $barcodeSymbologyID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetBarcodeSymbologyID(): static
    {
        $this->barcodeSymbologyID = null;

        return $this;
    }

    /**
     * @return null|array<PhysicalAttribute>
     */
    public function getPhysicalAttribute(): ?array
    {
        return $this->physicalAttribute;
    }

    /**
     * @param  null|array<PhysicalAttribute> $physicalAttribute
     * @return static
     */
    public function setPhysicalAttribute(?array $physicalAttribute = null): static
    {
        $this->physicalAttribute = $physicalAttribute;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPhysicalAttribute(): static
    {
        $this->physicalAttribute = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearPhysicalAttribute(): static
    {
        $this->physicalAttribute = [];

        return $this;
    }

    /**
     * @return null|PhysicalAttribute
     */
    public function firstPhysicalAttribute(): ?PhysicalAttribute
    {
        $physicalAttribute = $this->physicalAttribute ?? [];
        $physicalAttribute = reset($physicalAttribute);

        if (false === $physicalAttribute) {
            return null;
        }

        return $physicalAttribute;
    }

    /**
     * @return null|PhysicalAttribute
     */
    public function lastPhysicalAttribute(): ?PhysicalAttribute
    {
        $physicalAttribute = $this->physicalAttribute ?? [];
        $physicalAttribute = end($physicalAttribute);

        if (false === $physicalAttribute) {
            return null;
        }

        return $physicalAttribute;
    }

    /**
     * @param  PhysicalAttribute $physicalAttribute
     * @return static
     */
    public function addToPhysicalAttribute(PhysicalAttribute $physicalAttribute): static
    {
        $this->physicalAttribute[] = $physicalAttribute;

        return $this;
    }

    /**
     * @return PhysicalAttribute
     */
    public function addToPhysicalAttributeWithCreate(): PhysicalAttribute
    {
        $this->addTophysicalAttribute($physicalAttribute = new PhysicalAttribute());

        return $physicalAttribute;
    }

    /**
     * @param  PhysicalAttribute $physicalAttribute
     * @return static
     */
    public function addOnceToPhysicalAttribute(PhysicalAttribute $physicalAttribute): static
    {
        if (!is_array($this->physicalAttribute)) {
            $this->physicalAttribute = [];
        }

        $this->physicalAttribute[0] = $physicalAttribute;

        return $this;
    }

    /**
     * @return PhysicalAttribute
     */
    public function addOnceToPhysicalAttributeWithCreate(): PhysicalAttribute
    {
        if (!is_array($this->physicalAttribute)) {
            $this->physicalAttribute = [];
        }

        if ([] === $this->physicalAttribute) {
            $this->addOnceTophysicalAttribute(new PhysicalAttribute());
        }

        return $this->physicalAttribute[0];
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
    public function setMeasurementDimension(?array $measurementDimension = null): static
    {
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
    public function addToMeasurementDimension(MeasurementDimension $measurementDimension): static
    {
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
    public function addOnceToMeasurementDimension(MeasurementDimension $measurementDimension): static
    {
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

    /**
     * @return null|IssuerParty
     */
    public function getIssuerParty(): ?IssuerParty
    {
        return $this->issuerParty;
    }

    /**
     * @return IssuerParty
     */
    public function getIssuerPartyWithCreate(): IssuerParty
    {
        $this->issuerParty = is_null($this->issuerParty) ? new IssuerParty() : $this->issuerParty;

        return $this->issuerParty;
    }

    /**
     * @param  null|IssuerParty $issuerParty
     * @return static
     */
    public function setIssuerParty(?IssuerParty $issuerParty = null): static
    {
        $this->issuerParty = $issuerParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetIssuerParty(): static
    {
        $this->issuerParty = null;

        return $this;
    }
}
