<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\EmergencyProceduresCode;
use horstoeko\invoicesuite\models\ubl\cbc\Extension;
use horstoeko\invoicesuite\models\ubl\cbc\ID;
use horstoeko\invoicesuite\models\ubl\cbc\PlacardEndorsement;
use horstoeko\invoicesuite\models\ubl\cbc\PlacardNotation;

class SecondaryHazardType
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
     * @var \horstoeko\invoicesuite\models\ubl\cbc\PlacardNotation|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\PlacardNotation")
     * @JMS\Expose
     * @JMS\SerializedName("PlacardNotation")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPlacardNotation", setter="setPlacardNotation")
     */
    private $placardNotation;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\PlacardEndorsement|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\PlacardEndorsement")
     * @JMS\Expose
     * @JMS\SerializedName("PlacardEndorsement")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPlacardEndorsement", setter="setPlacardEndorsement")
     */
    private $placardEndorsement;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\EmergencyProceduresCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\EmergencyProceduresCode")
     * @JMS\Expose
     * @JMS\SerializedName("EmergencyProceduresCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEmergencyProceduresCode", setter="setEmergencyProceduresCode")
     */
    private $emergencyProceduresCode;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\Extension>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\Extension>")
     * @JMS\Expose
     * @JMS\SerializedName("Extension")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Extension", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getExtension", setter="setExtension")
     */
    private $extension;

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
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PlacardNotation|null
     */
    public function getPlacardNotation(): ?PlacardNotation
    {
        return $this->placardNotation;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PlacardNotation
     */
    public function getPlacardNotationWithCreate(): PlacardNotation
    {
        $this->placardNotation = is_null($this->placardNotation) ? new PlacardNotation() : $this->placardNotation;

        return $this->placardNotation;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\PlacardNotation|null $placardNotation
     * @return self
     */
    public function setPlacardNotation(?PlacardNotation $placardNotation = null): self
    {
        $this->placardNotation = $placardNotation;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPlacardNotation(): self
    {
        $this->placardNotation = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PlacardEndorsement|null
     */
    public function getPlacardEndorsement(): ?PlacardEndorsement
    {
        return $this->placardEndorsement;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PlacardEndorsement
     */
    public function getPlacardEndorsementWithCreate(): PlacardEndorsement
    {
        $this->placardEndorsement = is_null($this->placardEndorsement) ? new PlacardEndorsement() : $this->placardEndorsement;

        return $this->placardEndorsement;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\PlacardEndorsement|null $placardEndorsement
     * @return self
     */
    public function setPlacardEndorsement(?PlacardEndorsement $placardEndorsement = null): self
    {
        $this->placardEndorsement = $placardEndorsement;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPlacardEndorsement(): self
    {
        $this->placardEndorsement = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\EmergencyProceduresCode|null
     */
    public function getEmergencyProceduresCode(): ?EmergencyProceduresCode
    {
        return $this->emergencyProceduresCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\EmergencyProceduresCode
     */
    public function getEmergencyProceduresCodeWithCreate(): EmergencyProceduresCode
    {
        $this->emergencyProceduresCode = is_null($this->emergencyProceduresCode) ? new EmergencyProceduresCode() : $this->emergencyProceduresCode;

        return $this->emergencyProceduresCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\EmergencyProceduresCode|null $emergencyProceduresCode
     * @return self
     */
    public function setEmergencyProceduresCode(?EmergencyProceduresCode $emergencyProceduresCode = null): self
    {
        $this->emergencyProceduresCode = $emergencyProceduresCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetEmergencyProceduresCode(): self
    {
        $this->emergencyProceduresCode = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\Extension>|null
     */
    public function getExtension(): ?array
    {
        return $this->extension;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\Extension>|null $extension
     * @return self
     */
    public function setExtension(?array $extension = null): self
    {
        $this->extension = $extension;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetExtension(): self
    {
        $this->extension = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearExtension(): self
    {
        $this->extension = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Extension $extension
     * @return self
     */
    public function addToExtension(Extension $extension): self
    {
        $this->extension[] = $extension;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Extension
     */
    public function addToExtensionWithCreate(): Extension
    {
        $this->addToextension($extension = new Extension());

        return $extension;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Extension $extension
     * @return self
     */
    public function addOnceToExtension(Extension $extension): self
    {
        if (!is_array($this->extension)) {
            $this->extension = [];
        }

        $this->extension[0] = $extension;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Extension
     */
    public function addOnceToExtensionWithCreate(): Extension
    {
        if (!is_array($this->extension)) {
            $this->extension = [];
        }

        if ($this->extension === []) {
            $this->addOnceToextension(new Extension());
        }

        return $this->extension[0];
    }
}
