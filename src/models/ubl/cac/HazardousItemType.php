<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\AdditionalInformation;
use horstoeko\invoicesuite\models\ubl\cbc\CategoryName;
use horstoeko\invoicesuite\models\ubl\cbc\EmergencyProceduresCode;
use horstoeko\invoicesuite\models\ubl\cbc\HazardClassID;
use horstoeko\invoicesuite\models\ubl\cbc\HazardousCategoryCode;
use horstoeko\invoicesuite\models\ubl\cbc\ID;
use horstoeko\invoicesuite\models\ubl\cbc\LowerOrangeHazardPlacardID;
use horstoeko\invoicesuite\models\ubl\cbc\MarkingID;
use horstoeko\invoicesuite\models\ubl\cbc\MedicalFirstAidGuideCode;
use horstoeko\invoicesuite\models\ubl\cbc\NetVolumeMeasure;
use horstoeko\invoicesuite\models\ubl\cbc\NetWeightMeasure;
use horstoeko\invoicesuite\models\ubl\cbc\PlacardEndorsement;
use horstoeko\invoicesuite\models\ubl\cbc\PlacardNotation;
use horstoeko\invoicesuite\models\ubl\cbc\Quantity;
use horstoeko\invoicesuite\models\ubl\cbc\TechnicalName;
use horstoeko\invoicesuite\models\ubl\cbc\UNDGCode;
use horstoeko\invoicesuite\models\ubl\cbc\UpperOrangeHazardPlacardID;

class HazardousItemType
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
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\AdditionalInformation>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\AdditionalInformation>")
     * @JMS\Expose
     * @JMS\SerializedName("AdditionalInformation")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="AdditionalInformation", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getAdditionalInformation", setter="setAdditionalInformation")
     */
    private $additionalInformation;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\UNDGCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\UNDGCode")
     * @JMS\Expose
     * @JMS\SerializedName("UNDGCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getUNDGCode", setter="setUNDGCode")
     */
    private $uNDGCode;

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
     * @var \horstoeko\invoicesuite\models\ubl\cbc\MedicalFirstAidGuideCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\MedicalFirstAidGuideCode")
     * @JMS\Expose
     * @JMS\SerializedName("MedicalFirstAidGuideCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMedicalFirstAidGuideCode", setter="setMedicalFirstAidGuideCode")
     */
    private $medicalFirstAidGuideCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\TechnicalName|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\TechnicalName")
     * @JMS\Expose
     * @JMS\SerializedName("TechnicalName")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTechnicalName", setter="setTechnicalName")
     */
    private $technicalName;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\CategoryName|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\CategoryName")
     * @JMS\Expose
     * @JMS\SerializedName("CategoryName")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCategoryName", setter="setCategoryName")
     */
    private $categoryName;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\HazardousCategoryCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\HazardousCategoryCode")
     * @JMS\Expose
     * @JMS\SerializedName("HazardousCategoryCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getHazardousCategoryCode", setter="setHazardousCategoryCode")
     */
    private $hazardousCategoryCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\UpperOrangeHazardPlacardID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\UpperOrangeHazardPlacardID")
     * @JMS\Expose
     * @JMS\SerializedName("UpperOrangeHazardPlacardID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getUpperOrangeHazardPlacardID", setter="setUpperOrangeHazardPlacardID")
     */
    private $upperOrangeHazardPlacardID;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\LowerOrangeHazardPlacardID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\LowerOrangeHazardPlacardID")
     * @JMS\Expose
     * @JMS\SerializedName("LowerOrangeHazardPlacardID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLowerOrangeHazardPlacardID", setter="setLowerOrangeHazardPlacardID")
     */
    private $lowerOrangeHazardPlacardID;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\MarkingID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\MarkingID")
     * @JMS\Expose
     * @JMS\SerializedName("MarkingID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMarkingID", setter="setMarkingID")
     */
    private $markingID;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\HazardClassID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\HazardClassID")
     * @JMS\Expose
     * @JMS\SerializedName("HazardClassID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getHazardClassID", setter="setHazardClassID")
     */
    private $hazardClassID;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\NetWeightMeasure|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\NetWeightMeasure")
     * @JMS\Expose
     * @JMS\SerializedName("NetWeightMeasure")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getNetWeightMeasure", setter="setNetWeightMeasure")
     */
    private $netWeightMeasure;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\NetVolumeMeasure|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\NetVolumeMeasure")
     * @JMS\Expose
     * @JMS\SerializedName("NetVolumeMeasure")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getNetVolumeMeasure", setter="setNetVolumeMeasure")
     */
    private $netVolumeMeasure;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\Quantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\Quantity")
     * @JMS\Expose
     * @JMS\SerializedName("Quantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getQuantity", setter="setQuantity")
     */
    private $quantity;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\ContactParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\ContactParty")
     * @JMS\Expose
     * @JMS\SerializedName("ContactParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getContactParty", setter="setContactParty")
     */
    private $contactParty;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\SecondaryHazard>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\SecondaryHazard>")
     * @JMS\Expose
     * @JMS\SerializedName("SecondaryHazard")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="SecondaryHazard", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getSecondaryHazard", setter="setSecondaryHazard")
     */
    private $secondaryHazard;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\HazardousGoodsTransit>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\HazardousGoodsTransit>")
     * @JMS\Expose
     * @JMS\SerializedName("HazardousGoodsTransit")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="HazardousGoodsTransit", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getHazardousGoodsTransit", setter="setHazardousGoodsTransit")
     */
    private $hazardousGoodsTransit;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\EmergencyTemperature|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\EmergencyTemperature")
     * @JMS\Expose
     * @JMS\SerializedName("EmergencyTemperature")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEmergencyTemperature", setter="setEmergencyTemperature")
     */
    private $emergencyTemperature;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\FlashpointTemperature|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\FlashpointTemperature")
     * @JMS\Expose
     * @JMS\SerializedName("FlashpointTemperature")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getFlashpointTemperature", setter="setFlashpointTemperature")
     */
    private $flashpointTemperature;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\AdditionalTemperature>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\AdditionalTemperature>")
     * @JMS\Expose
     * @JMS\SerializedName("AdditionalTemperature")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="AdditionalTemperature", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getAdditionalTemperature", setter="setAdditionalTemperature")
     */
    private $additionalTemperature;

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
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\AdditionalInformation>|null
     */
    public function getAdditionalInformation(): ?array
    {
        return $this->additionalInformation;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\AdditionalInformation>|null $additionalInformation
     * @return self
     */
    public function setAdditionalInformation(?array $additionalInformation = null): self
    {
        $this->additionalInformation = $additionalInformation;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetAdditionalInformation(): self
    {
        $this->additionalInformation = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearAdditionalInformation(): self
    {
        $this->additionalInformation = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\AdditionalInformation $additionalInformation
     * @return self
     */
    public function addToAdditionalInformation(AdditionalInformation $additionalInformation): self
    {
        $this->additionalInformation[] = $additionalInformation;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\AdditionalInformation
     */
    public function addToAdditionalInformationWithCreate(): AdditionalInformation
    {
        $this->addToadditionalInformation($additionalInformation = new AdditionalInformation());

        return $additionalInformation;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\AdditionalInformation $additionalInformation
     * @return self
     */
    public function addOnceToAdditionalInformation(AdditionalInformation $additionalInformation): self
    {
        if (!is_array($this->additionalInformation)) {
            $this->additionalInformation = [];
        }

        $this->additionalInformation[0] = $additionalInformation;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\AdditionalInformation
     */
    public function addOnceToAdditionalInformationWithCreate(): AdditionalInformation
    {
        if (!is_array($this->additionalInformation)) {
            $this->additionalInformation = [];
        }

        if ($this->additionalInformation === []) {
            $this->addOnceToadditionalInformation(new AdditionalInformation());
        }

        return $this->additionalInformation[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\UNDGCode|null
     */
    public function getUNDGCode(): ?UNDGCode
    {
        return $this->uNDGCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\UNDGCode
     */
    public function getUNDGCodeWithCreate(): UNDGCode
    {
        $this->uNDGCode = is_null($this->uNDGCode) ? new UNDGCode() : $this->uNDGCode;

        return $this->uNDGCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\UNDGCode|null $uNDGCode
     * @return self
     */
    public function setUNDGCode(?UNDGCode $uNDGCode = null): self
    {
        $this->uNDGCode = $uNDGCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetUNDGCode(): self
    {
        $this->uNDGCode = null;

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
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MedicalFirstAidGuideCode|null
     */
    public function getMedicalFirstAidGuideCode(): ?MedicalFirstAidGuideCode
    {
        return $this->medicalFirstAidGuideCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MedicalFirstAidGuideCode
     */
    public function getMedicalFirstAidGuideCodeWithCreate(): MedicalFirstAidGuideCode
    {
        $this->medicalFirstAidGuideCode = is_null($this->medicalFirstAidGuideCode) ? new MedicalFirstAidGuideCode() : $this->medicalFirstAidGuideCode;

        return $this->medicalFirstAidGuideCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\MedicalFirstAidGuideCode|null $medicalFirstAidGuideCode
     * @return self
     */
    public function setMedicalFirstAidGuideCode(?MedicalFirstAidGuideCode $medicalFirstAidGuideCode = null): self
    {
        $this->medicalFirstAidGuideCode = $medicalFirstAidGuideCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetMedicalFirstAidGuideCode(): self
    {
        $this->medicalFirstAidGuideCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TechnicalName|null
     */
    public function getTechnicalName(): ?TechnicalName
    {
        return $this->technicalName;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TechnicalName
     */
    public function getTechnicalNameWithCreate(): TechnicalName
    {
        $this->technicalName = is_null($this->technicalName) ? new TechnicalName() : $this->technicalName;

        return $this->technicalName;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\TechnicalName|null $technicalName
     * @return self
     */
    public function setTechnicalName(?TechnicalName $technicalName = null): self
    {
        $this->technicalName = $technicalName;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTechnicalName(): self
    {
        $this->technicalName = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\CategoryName|null
     */
    public function getCategoryName(): ?CategoryName
    {
        return $this->categoryName;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\CategoryName
     */
    public function getCategoryNameWithCreate(): CategoryName
    {
        $this->categoryName = is_null($this->categoryName) ? new CategoryName() : $this->categoryName;

        return $this->categoryName;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\CategoryName|null $categoryName
     * @return self
     */
    public function setCategoryName(?CategoryName $categoryName = null): self
    {
        $this->categoryName = $categoryName;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetCategoryName(): self
    {
        $this->categoryName = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\HazardousCategoryCode|null
     */
    public function getHazardousCategoryCode(): ?HazardousCategoryCode
    {
        return $this->hazardousCategoryCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\HazardousCategoryCode
     */
    public function getHazardousCategoryCodeWithCreate(): HazardousCategoryCode
    {
        $this->hazardousCategoryCode = is_null($this->hazardousCategoryCode) ? new HazardousCategoryCode() : $this->hazardousCategoryCode;

        return $this->hazardousCategoryCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\HazardousCategoryCode|null $hazardousCategoryCode
     * @return self
     */
    public function setHazardousCategoryCode(?HazardousCategoryCode $hazardousCategoryCode = null): self
    {
        $this->hazardousCategoryCode = $hazardousCategoryCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetHazardousCategoryCode(): self
    {
        $this->hazardousCategoryCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\UpperOrangeHazardPlacardID|null
     */
    public function getUpperOrangeHazardPlacardID(): ?UpperOrangeHazardPlacardID
    {
        return $this->upperOrangeHazardPlacardID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\UpperOrangeHazardPlacardID
     */
    public function getUpperOrangeHazardPlacardIDWithCreate(): UpperOrangeHazardPlacardID
    {
        $this->upperOrangeHazardPlacardID = is_null($this->upperOrangeHazardPlacardID) ? new UpperOrangeHazardPlacardID() : $this->upperOrangeHazardPlacardID;

        return $this->upperOrangeHazardPlacardID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\UpperOrangeHazardPlacardID|null $upperOrangeHazardPlacardID
     * @return self
     */
    public function setUpperOrangeHazardPlacardID(
        ?UpperOrangeHazardPlacardID $upperOrangeHazardPlacardID = null,
    ): self {
        $this->upperOrangeHazardPlacardID = $upperOrangeHazardPlacardID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetUpperOrangeHazardPlacardID(): self
    {
        $this->upperOrangeHazardPlacardID = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\LowerOrangeHazardPlacardID|null
     */
    public function getLowerOrangeHazardPlacardID(): ?LowerOrangeHazardPlacardID
    {
        return $this->lowerOrangeHazardPlacardID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\LowerOrangeHazardPlacardID
     */
    public function getLowerOrangeHazardPlacardIDWithCreate(): LowerOrangeHazardPlacardID
    {
        $this->lowerOrangeHazardPlacardID = is_null($this->lowerOrangeHazardPlacardID) ? new LowerOrangeHazardPlacardID() : $this->lowerOrangeHazardPlacardID;

        return $this->lowerOrangeHazardPlacardID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\LowerOrangeHazardPlacardID|null $lowerOrangeHazardPlacardID
     * @return self
     */
    public function setLowerOrangeHazardPlacardID(
        ?LowerOrangeHazardPlacardID $lowerOrangeHazardPlacardID = null,
    ): self {
        $this->lowerOrangeHazardPlacardID = $lowerOrangeHazardPlacardID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetLowerOrangeHazardPlacardID(): self
    {
        $this->lowerOrangeHazardPlacardID = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MarkingID|null
     */
    public function getMarkingID(): ?MarkingID
    {
        return $this->markingID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MarkingID
     */
    public function getMarkingIDWithCreate(): MarkingID
    {
        $this->markingID = is_null($this->markingID) ? new MarkingID() : $this->markingID;

        return $this->markingID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\MarkingID|null $markingID
     * @return self
     */
    public function setMarkingID(?MarkingID $markingID = null): self
    {
        $this->markingID = $markingID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetMarkingID(): self
    {
        $this->markingID = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\HazardClassID|null
     */
    public function getHazardClassID(): ?HazardClassID
    {
        return $this->hazardClassID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\HazardClassID
     */
    public function getHazardClassIDWithCreate(): HazardClassID
    {
        $this->hazardClassID = is_null($this->hazardClassID) ? new HazardClassID() : $this->hazardClassID;

        return $this->hazardClassID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\HazardClassID|null $hazardClassID
     * @return self
     */
    public function setHazardClassID(?HazardClassID $hazardClassID = null): self
    {
        $this->hazardClassID = $hazardClassID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetHazardClassID(): self
    {
        $this->hazardClassID = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\NetWeightMeasure|null
     */
    public function getNetWeightMeasure(): ?NetWeightMeasure
    {
        return $this->netWeightMeasure;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\NetWeightMeasure
     */
    public function getNetWeightMeasureWithCreate(): NetWeightMeasure
    {
        $this->netWeightMeasure = is_null($this->netWeightMeasure) ? new NetWeightMeasure() : $this->netWeightMeasure;

        return $this->netWeightMeasure;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\NetWeightMeasure|null $netWeightMeasure
     * @return self
     */
    public function setNetWeightMeasure(?NetWeightMeasure $netWeightMeasure = null): self
    {
        $this->netWeightMeasure = $netWeightMeasure;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetNetWeightMeasure(): self
    {
        $this->netWeightMeasure = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\NetVolumeMeasure|null
     */
    public function getNetVolumeMeasure(): ?NetVolumeMeasure
    {
        return $this->netVolumeMeasure;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\NetVolumeMeasure
     */
    public function getNetVolumeMeasureWithCreate(): NetVolumeMeasure
    {
        $this->netVolumeMeasure = is_null($this->netVolumeMeasure) ? new NetVolumeMeasure() : $this->netVolumeMeasure;

        return $this->netVolumeMeasure;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\NetVolumeMeasure|null $netVolumeMeasure
     * @return self
     */
    public function setNetVolumeMeasure(?NetVolumeMeasure $netVolumeMeasure = null): self
    {
        $this->netVolumeMeasure = $netVolumeMeasure;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetNetVolumeMeasure(): self
    {
        $this->netVolumeMeasure = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Quantity|null
     */
    public function getQuantity(): ?Quantity
    {
        return $this->quantity;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Quantity
     */
    public function getQuantityWithCreate(): Quantity
    {
        $this->quantity = is_null($this->quantity) ? new Quantity() : $this->quantity;

        return $this->quantity;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Quantity|null $quantity
     * @return self
     */
    public function setQuantity(?Quantity $quantity = null): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetQuantity(): self
    {
        $this->quantity = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ContactParty|null
     */
    public function getContactParty(): ?ContactParty
    {
        return $this->contactParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ContactParty
     */
    public function getContactPartyWithCreate(): ContactParty
    {
        $this->contactParty = is_null($this->contactParty) ? new ContactParty() : $this->contactParty;

        return $this->contactParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ContactParty|null $contactParty
     * @return self
     */
    public function setContactParty(?ContactParty $contactParty = null): self
    {
        $this->contactParty = $contactParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetContactParty(): self
    {
        $this->contactParty = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\SecondaryHazard>|null
     */
    public function getSecondaryHazard(): ?array
    {
        return $this->secondaryHazard;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\SecondaryHazard>|null $secondaryHazard
     * @return self
     */
    public function setSecondaryHazard(?array $secondaryHazard = null): self
    {
        $this->secondaryHazard = $secondaryHazard;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSecondaryHazard(): self
    {
        $this->secondaryHazard = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearSecondaryHazard(): self
    {
        $this->secondaryHazard = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\SecondaryHazard $secondaryHazard
     * @return self
     */
    public function addToSecondaryHazard(SecondaryHazard $secondaryHazard): self
    {
        $this->secondaryHazard[] = $secondaryHazard;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\SecondaryHazard
     */
    public function addToSecondaryHazardWithCreate(): SecondaryHazard
    {
        $this->addTosecondaryHazard($secondaryHazard = new SecondaryHazard());

        return $secondaryHazard;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\SecondaryHazard $secondaryHazard
     * @return self
     */
    public function addOnceToSecondaryHazard(SecondaryHazard $secondaryHazard): self
    {
        if (!is_array($this->secondaryHazard)) {
            $this->secondaryHazard = [];
        }

        $this->secondaryHazard[0] = $secondaryHazard;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\SecondaryHazard
     */
    public function addOnceToSecondaryHazardWithCreate(): SecondaryHazard
    {
        if (!is_array($this->secondaryHazard)) {
            $this->secondaryHazard = [];
        }

        if ($this->secondaryHazard === []) {
            $this->addOnceTosecondaryHazard(new SecondaryHazard());
        }

        return $this->secondaryHazard[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\HazardousGoodsTransit>|null
     */
    public function getHazardousGoodsTransit(): ?array
    {
        return $this->hazardousGoodsTransit;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\HazardousGoodsTransit>|null $hazardousGoodsTransit
     * @return self
     */
    public function setHazardousGoodsTransit(?array $hazardousGoodsTransit = null): self
    {
        $this->hazardousGoodsTransit = $hazardousGoodsTransit;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetHazardousGoodsTransit(): self
    {
        $this->hazardousGoodsTransit = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearHazardousGoodsTransit(): self
    {
        $this->hazardousGoodsTransit = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\HazardousGoodsTransit $hazardousGoodsTransit
     * @return self
     */
    public function addToHazardousGoodsTransit(HazardousGoodsTransit $hazardousGoodsTransit): self
    {
        $this->hazardousGoodsTransit[] = $hazardousGoodsTransit;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\HazardousGoodsTransit
     */
    public function addToHazardousGoodsTransitWithCreate(): HazardousGoodsTransit
    {
        $this->addTohazardousGoodsTransit($hazardousGoodsTransit = new HazardousGoodsTransit());

        return $hazardousGoodsTransit;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\HazardousGoodsTransit $hazardousGoodsTransit
     * @return self
     */
    public function addOnceToHazardousGoodsTransit(HazardousGoodsTransit $hazardousGoodsTransit): self
    {
        if (!is_array($this->hazardousGoodsTransit)) {
            $this->hazardousGoodsTransit = [];
        }

        $this->hazardousGoodsTransit[0] = $hazardousGoodsTransit;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\HazardousGoodsTransit
     */
    public function addOnceToHazardousGoodsTransitWithCreate(): HazardousGoodsTransit
    {
        if (!is_array($this->hazardousGoodsTransit)) {
            $this->hazardousGoodsTransit = [];
        }

        if ($this->hazardousGoodsTransit === []) {
            $this->addOnceTohazardousGoodsTransit(new HazardousGoodsTransit());
        }

        return $this->hazardousGoodsTransit[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\EmergencyTemperature|null
     */
    public function getEmergencyTemperature(): ?EmergencyTemperature
    {
        return $this->emergencyTemperature;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\EmergencyTemperature
     */
    public function getEmergencyTemperatureWithCreate(): EmergencyTemperature
    {
        $this->emergencyTemperature = is_null($this->emergencyTemperature) ? new EmergencyTemperature() : $this->emergencyTemperature;

        return $this->emergencyTemperature;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\EmergencyTemperature|null $emergencyTemperature
     * @return self
     */
    public function setEmergencyTemperature(?EmergencyTemperature $emergencyTemperature = null): self
    {
        $this->emergencyTemperature = $emergencyTemperature;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetEmergencyTemperature(): self
    {
        $this->emergencyTemperature = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\FlashpointTemperature|null
     */
    public function getFlashpointTemperature(): ?FlashpointTemperature
    {
        return $this->flashpointTemperature;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\FlashpointTemperature
     */
    public function getFlashpointTemperatureWithCreate(): FlashpointTemperature
    {
        $this->flashpointTemperature = is_null($this->flashpointTemperature) ? new FlashpointTemperature() : $this->flashpointTemperature;

        return $this->flashpointTemperature;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\FlashpointTemperature|null $flashpointTemperature
     * @return self
     */
    public function setFlashpointTemperature(?FlashpointTemperature $flashpointTemperature = null): self
    {
        $this->flashpointTemperature = $flashpointTemperature;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetFlashpointTemperature(): self
    {
        $this->flashpointTemperature = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\AdditionalTemperature>|null
     */
    public function getAdditionalTemperature(): ?array
    {
        return $this->additionalTemperature;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\AdditionalTemperature>|null $additionalTemperature
     * @return self
     */
    public function setAdditionalTemperature(?array $additionalTemperature = null): self
    {
        $this->additionalTemperature = $additionalTemperature;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetAdditionalTemperature(): self
    {
        $this->additionalTemperature = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearAdditionalTemperature(): self
    {
        $this->additionalTemperature = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\AdditionalTemperature $additionalTemperature
     * @return self
     */
    public function addToAdditionalTemperature(AdditionalTemperature $additionalTemperature): self
    {
        $this->additionalTemperature[] = $additionalTemperature;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\AdditionalTemperature
     */
    public function addToAdditionalTemperatureWithCreate(): AdditionalTemperature
    {
        $this->addToadditionalTemperature($additionalTemperature = new AdditionalTemperature());

        return $additionalTemperature;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\AdditionalTemperature $additionalTemperature
     * @return self
     */
    public function addOnceToAdditionalTemperature(AdditionalTemperature $additionalTemperature): self
    {
        if (!is_array($this->additionalTemperature)) {
            $this->additionalTemperature = [];
        }

        $this->additionalTemperature[0] = $additionalTemperature;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\AdditionalTemperature
     */
    public function addOnceToAdditionalTemperatureWithCreate(): AdditionalTemperature
    {
        if (!is_array($this->additionalTemperature)) {
            $this->additionalTemperature = [];
        }

        if ($this->additionalTemperature === []) {
            $this->addOnceToadditionalTemperature(new AdditionalTemperature());
        }

        return $this->additionalTemperature[0];
    }
}
