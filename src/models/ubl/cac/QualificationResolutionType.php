<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\AdmissionCode;
use horstoeko\invoicesuite\models\ubl\cbc\ExclusionReason;
use horstoeko\invoicesuite\models\ubl\cbc\Resolution;

class QualificationResolutionType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\AdmissionCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\AdmissionCode")
     * @JMS\Expose
     * @JMS\SerializedName("AdmissionCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAdmissionCode", setter="setAdmissionCode")
     */
    private $admissionCode;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\ExclusionReason>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\ExclusionReason>")
     * @JMS\Expose
     * @JMS\SerializedName("ExclusionReason")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ExclusionReason", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getExclusionReason", setter="setExclusionReason")
     */
    private $exclusionReason;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\Resolution>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\Resolution>")
     * @JMS\Expose
     * @JMS\SerializedName("Resolution")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Resolution", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getResolution", setter="setResolution")
     */
    private $resolution;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("ResolutionDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getResolutionDate", setter="setResolutionDate")
     */
    private $resolutionDate;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time")
     * @JMS\Expose
     * @JMS\SerializedName("ResolutionTime")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getResolutionTime", setter="setResolutionTime")
     */
    private $resolutionTime;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\ProcurementProjectLot|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\ProcurementProjectLot")
     * @JMS\Expose
     * @JMS\SerializedName("ProcurementProjectLot")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getProcurementProjectLot", setter="setProcurementProjectLot")
     */
    private $procurementProjectLot;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\AdmissionCode|null
     */
    public function getAdmissionCode(): ?AdmissionCode
    {
        return $this->admissionCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\AdmissionCode
     */
    public function getAdmissionCodeWithCreate(): AdmissionCode
    {
        $this->admissionCode = is_null($this->admissionCode) ? new AdmissionCode() : $this->admissionCode;

        return $this->admissionCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\AdmissionCode|null $admissionCode
     * @return self
     */
    public function setAdmissionCode(?AdmissionCode $admissionCode = null): self
    {
        $this->admissionCode = $admissionCode;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\ExclusionReason>|null
     */
    public function getExclusionReason(): ?array
    {
        return $this->exclusionReason;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\ExclusionReason>|null $exclusionReason
     * @return self
     */
    public function setExclusionReason(?array $exclusionReason = null): self
    {
        $this->exclusionReason = $exclusionReason;

        return $this;
    }

    /**
     * @return self
     */
    public function clearExclusionReason(): self
    {
        $this->exclusionReason = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ExclusionReason $exclusionReason
     * @return self
     */
    public function addToExclusionReason(ExclusionReason $exclusionReason): self
    {
        $this->exclusionReason[] = $exclusionReason;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ExclusionReason
     */
    public function addToExclusionReasonWithCreate(): ExclusionReason
    {
        $this->addToexclusionReason($exclusionReason = new ExclusionReason());

        return $exclusionReason;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ExclusionReason $exclusionReason
     * @return self
     */
    public function addOnceToExclusionReason(ExclusionReason $exclusionReason): self
    {
        if (!is_array($this->exclusionReason)) {
            $this->exclusionReason = [];
        }

        $this->exclusionReason[0] = $exclusionReason;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ExclusionReason
     */
    public function addOnceToExclusionReasonWithCreate(): ExclusionReason
    {
        if (!is_array($this->exclusionReason)) {
            $this->exclusionReason = [];
        }

        if ($this->exclusionReason === []) {
            $this->addOnceToexclusionReason(new ExclusionReason());
        }

        return $this->exclusionReason[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\Resolution>|null
     */
    public function getResolution(): ?array
    {
        return $this->resolution;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\Resolution>|null $resolution
     * @return self
     */
    public function setResolution(?array $resolution = null): self
    {
        $this->resolution = $resolution;

        return $this;
    }

    /**
     * @return self
     */
    public function clearResolution(): self
    {
        $this->resolution = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Resolution $resolution
     * @return self
     */
    public function addToResolution(Resolution $resolution): self
    {
        $this->resolution[] = $resolution;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Resolution
     */
    public function addToResolutionWithCreate(): Resolution
    {
        $this->addToresolution($resolution = new Resolution());

        return $resolution;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Resolution $resolution
     * @return self
     */
    public function addOnceToResolution(Resolution $resolution): self
    {
        if (!is_array($this->resolution)) {
            $this->resolution = [];
        }

        $this->resolution[0] = $resolution;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Resolution
     */
    public function addOnceToResolutionWithCreate(): Resolution
    {
        if (!is_array($this->resolution)) {
            $this->resolution = [];
        }

        if ($this->resolution === []) {
            $this->addOnceToresolution(new Resolution());
        }

        return $this->resolution[0];
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getResolutionDate(): ?\DateTimeInterface
    {
        return $this->resolutionDate;
    }

    /**
     * @param \DateTimeInterface|null $resolutionDate
     * @return self
     */
    public function setResolutionDate(?\DateTimeInterface $resolutionDate = null): self
    {
        $this->resolutionDate = $resolutionDate;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getResolutionTime(): ?\DateTimeInterface
    {
        return $this->resolutionTime;
    }

    /**
     * @param \DateTimeInterface|null $resolutionTime
     * @return self
     */
    public function setResolutionTime(?\DateTimeInterface $resolutionTime = null): self
    {
        $this->resolutionTime = $resolutionTime;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ProcurementProjectLot|null
     */
    public function getProcurementProjectLot(): ?ProcurementProjectLot
    {
        return $this->procurementProjectLot;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ProcurementProjectLot
     */
    public function getProcurementProjectLotWithCreate(): ProcurementProjectLot
    {
        $this->procurementProjectLot = is_null($this->procurementProjectLot) ? new ProcurementProjectLot() : $this->procurementProjectLot;

        return $this->procurementProjectLot;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ProcurementProjectLot|null $procurementProjectLot
     * @return self
     */
    public function setProcurementProjectLot(?ProcurementProjectLot $procurementProjectLot = null): self
    {
        $this->procurementProjectLot = $procurementProjectLot;

        return $this;
    }
}
