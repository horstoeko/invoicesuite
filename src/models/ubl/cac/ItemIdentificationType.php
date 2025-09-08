<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\BarcodeSymbologyID;
use horstoeko\invoicesuite\models\ubl\cbc\ExtendedID;
use horstoeko\invoicesuite\models\ubl\cbc\ID;

class ItemIdentificationType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ID")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ExtendedID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ExtendedID")
     * @JMS\Expose
     * @JMS\SerializedName("ExtendedID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getExtendedID", setter="setExtendedID")
     */
    private $extendedID;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\BarcodeSymbologyID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\BarcodeSymbologyID")
     * @JMS\Expose
     * @JMS\SerializedName("BarcodeSymbologyID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getBarcodeSymbologyID", setter="setBarcodeSymbologyID")
     */
    private $barcodeSymbologyID;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\PhysicalAttribute>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\PhysicalAttribute>")
     * @JMS\Expose
     * @JMS\SerializedName("PhysicalAttribute")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PhysicalAttribute", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getPhysicalAttribute", setter="setPhysicalAttribute")
     */
    private $physicalAttribute;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\MeasurementDimension>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\MeasurementDimension>")
     * @JMS\Expose
     * @JMS\SerializedName("MeasurementDimension")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="MeasurementDimension", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getMeasurementDimension", setter="setMeasurementDimension")
     */
    private $measurementDimension;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\IssuerParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\IssuerParty")
     * @JMS\Expose
     * @JMS\SerializedName("IssuerParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getIssuerParty", setter="setIssuerParty")
     */
    private $issuerParty;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ID|null
     */
    public function getID(): ?ID
    {
        return $this->iD;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ID
     */
    public function getIDWithCreate(): ID
    {
        $this->iD = is_null($this->iD) ? new ID() : $this->iD;

        return $this->iD;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ID|null $iD
     * @return self
     */
    public function setID(?ID $iD = null): self
    {
        $this->iD = $iD;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetID(): self
    {
        $this->iD = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ExtendedID|null
     */
    public function getExtendedID(): ?ExtendedID
    {
        return $this->extendedID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ExtendedID
     */
    public function getExtendedIDWithCreate(): ExtendedID
    {
        $this->extendedID = is_null($this->extendedID) ? new ExtendedID() : $this->extendedID;

        return $this->extendedID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ExtendedID|null $extendedID
     * @return self
     */
    public function setExtendedID(?ExtendedID $extendedID = null): self
    {
        $this->extendedID = $extendedID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetExtendedID(): self
    {
        $this->extendedID = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\BarcodeSymbologyID|null
     */
    public function getBarcodeSymbologyID(): ?BarcodeSymbologyID
    {
        return $this->barcodeSymbologyID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\BarcodeSymbologyID
     */
    public function getBarcodeSymbologyIDWithCreate(): BarcodeSymbologyID
    {
        $this->barcodeSymbologyID = is_null($this->barcodeSymbologyID) ? new BarcodeSymbologyID() : $this->barcodeSymbologyID;

        return $this->barcodeSymbologyID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\BarcodeSymbologyID|null $barcodeSymbologyID
     * @return self
     */
    public function setBarcodeSymbologyID(?BarcodeSymbologyID $barcodeSymbologyID = null): self
    {
        $this->barcodeSymbologyID = $barcodeSymbologyID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetBarcodeSymbologyID(): self
    {
        $this->barcodeSymbologyID = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\PhysicalAttribute>|null
     */
    public function getPhysicalAttribute(): ?array
    {
        return $this->physicalAttribute;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\PhysicalAttribute>|null $physicalAttribute
     * @return self
     */
    public function setPhysicalAttribute(?array $physicalAttribute = null): self
    {
        $this->physicalAttribute = $physicalAttribute;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPhysicalAttribute(): self
    {
        $this->physicalAttribute = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearPhysicalAttribute(): self
    {
        $this->physicalAttribute = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\PhysicalAttribute $physicalAttribute
     * @return self
     */
    public function addToPhysicalAttribute(PhysicalAttribute $physicalAttribute): self
    {
        $this->physicalAttribute[] = $physicalAttribute;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\PhysicalAttribute
     */
    public function addToPhysicalAttributeWithCreate(): PhysicalAttribute
    {
        $this->addTophysicalAttribute($physicalAttribute = new PhysicalAttribute());

        return $physicalAttribute;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\PhysicalAttribute $physicalAttribute
     * @return self
     */
    public function addOnceToPhysicalAttribute(PhysicalAttribute $physicalAttribute): self
    {
        if (!is_array($this->physicalAttribute)) {
            $this->physicalAttribute = [];
        }

        $this->physicalAttribute[0] = $physicalAttribute;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\PhysicalAttribute
     */
    public function addOnceToPhysicalAttributeWithCreate(): PhysicalAttribute
    {
        if (!is_array($this->physicalAttribute)) {
            $this->physicalAttribute = [];
        }

        if ($this->physicalAttribute === []) {
            $this->addOnceTophysicalAttribute(new PhysicalAttribute());
        }

        return $this->physicalAttribute[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\MeasurementDimension>|null
     */
    public function getMeasurementDimension(): ?array
    {
        return $this->measurementDimension;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\MeasurementDimension>|null $measurementDimension
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
     * @param \horstoeko\invoicesuite\models\ubl\cac\MeasurementDimension $measurementDimension
     * @return self
     */
    public function addToMeasurementDimension(MeasurementDimension $measurementDimension): self
    {
        $this->measurementDimension[] = $measurementDimension;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\MeasurementDimension
     */
    public function addToMeasurementDimensionWithCreate(): MeasurementDimension
    {
        $this->addTomeasurementDimension($measurementDimension = new MeasurementDimension());

        return $measurementDimension;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\MeasurementDimension $measurementDimension
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
     * @return \horstoeko\invoicesuite\models\ubl\cac\MeasurementDimension
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

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\IssuerParty|null
     */
    public function getIssuerParty(): ?IssuerParty
    {
        return $this->issuerParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\IssuerParty
     */
    public function getIssuerPartyWithCreate(): IssuerParty
    {
        $this->issuerParty = is_null($this->issuerParty) ? new IssuerParty() : $this->issuerParty;

        return $this->issuerParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\IssuerParty|null $issuerParty
     * @return self
     */
    public function setIssuerParty(?IssuerParty $issuerParty = null): self
    {
        $this->issuerParty = $issuerParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetIssuerParty(): self
    {
        $this->issuerParty = null;

        return $this;
    }
}
