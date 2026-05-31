<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\AdmissionCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ExclusionReason;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Resolution;
use JMS\Serializer\Annotation as JMS;

class QualificationResolutionType
{
    use HandlesObjectFlags;

    /**
     * @var null|AdmissionCode
     */
    #[JMS\Accessor(getter: 'getAdmissionCode', setter: 'setAdmissionCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('AdmissionCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\AdmissionCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $admissionCode;

    /**
     * @var null|array<ExclusionReason>
     */
    #[JMS\Accessor(getter: 'getExclusionReason', setter: 'setExclusionReason')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ExclusionReason')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ExclusionReason>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'ExclusionReason', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $exclusionReason;

    /**
     * @var null|array<Resolution>
     */
    #[JMS\Accessor(getter: 'getResolution', setter: 'setResolution')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Resolution')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Resolution>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'Resolution', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $resolution;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getResolutionDate', setter: 'setResolutionDate')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ResolutionDate')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $resolutionDate;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getResolutionTime', setter: 'setResolutionTime')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ResolutionTime')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $resolutionTime;

    /**
     * @var null|ProcurementProjectLot
     */
    #[JMS\Accessor(getter: 'getProcurementProjectLot', setter: 'setProcurementProjectLot')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ProcurementProjectLot')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\ProcurementProjectLot')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $procurementProjectLot;

    /**
     * @return null|AdmissionCode
     */
    public function getAdmissionCode(): ?AdmissionCode
    {
        return $this->admissionCode;
    }

    /**
     * @return AdmissionCode
     */
    public function getAdmissionCodeWithCreate(): AdmissionCode
    {
        $this->admissionCode ??= new AdmissionCode();

        return $this->admissionCode;
    }

    /**
     * @param  null|AdmissionCode $admissionCode
     * @return static
     */
    public function setAdmissionCode(
        ?AdmissionCode $admissionCode = null
    ): static {
        $this->admissionCode = $admissionCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAdmissionCode(): static
    {
        $this->admissionCode = null;

        return $this;
    }

    /**
     * @return null|array<ExclusionReason>
     */
    public function getExclusionReason(): ?array
    {
        return $this->exclusionReason;
    }

    /**
     * @param  null|array<ExclusionReason> $exclusionReason
     * @return static
     */
    public function setExclusionReason(
        ?array $exclusionReason = null
    ): static {
        $this->exclusionReason = $exclusionReason;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetExclusionReason(): static
    {
        $this->exclusionReason = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearExclusionReason(): static
    {
        $this->exclusionReason = [];

        return $this;
    }

    /**
     * @return null|ExclusionReason
     */
    public function firstExclusionReason(): ?ExclusionReason
    {
        $exclusionReason = $this->exclusionReason ?? [];
        $exclusionReason = reset($exclusionReason);

        if (false === $exclusionReason) {
            return null;
        }

        return $exclusionReason;
    }

    /**
     * @return null|ExclusionReason
     */
    public function lastExclusionReason(): ?ExclusionReason
    {
        $exclusionReason = $this->exclusionReason ?? [];
        $exclusionReason = end($exclusionReason);

        if (false === $exclusionReason) {
            return null;
        }

        return $exclusionReason;
    }

    /**
     * @param  ExclusionReason $exclusionReason
     * @return static
     */
    public function addToExclusionReason(
        ExclusionReason $exclusionReason
    ): static {
        $this->exclusionReason[] = $exclusionReason;

        return $this;
    }

    /**
     * @return ExclusionReason
     */
    public function addToExclusionReasonWithCreate(): ExclusionReason
    {
        $this->addToExclusionReason($exclusionReason = new ExclusionReason());

        return $exclusionReason;
    }

    /**
     * @param  ExclusionReason $exclusionReason
     * @return static
     */
    public function addOnceToExclusionReason(
        ExclusionReason $exclusionReason
    ): static {
        if (!is_array($this->exclusionReason)) {
            $this->exclusionReason = [];
        }

        $this->exclusionReason[0] = $exclusionReason;

        return $this;
    }

    /**
     * @return ExclusionReason
     */
    public function addOnceToExclusionReasonWithCreate(): ExclusionReason
    {
        if (!is_array($this->exclusionReason)) {
            $this->exclusionReason = [];
        }

        if ([] === $this->exclusionReason) {
            $this->addOnceToExclusionReason(new ExclusionReason());
        }

        return $this->exclusionReason[0];
    }

    /**
     * @return null|array<Resolution>
     */
    public function getResolution(): ?array
    {
        return $this->resolution;
    }

    /**
     * @param  null|array<Resolution> $resolution
     * @return static
     */
    public function setResolution(
        ?array $resolution = null
    ): static {
        $this->resolution = $resolution;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetResolution(): static
    {
        $this->resolution = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearResolution(): static
    {
        $this->resolution = [];

        return $this;
    }

    /**
     * @return null|Resolution
     */
    public function firstResolution(): ?Resolution
    {
        $resolution = $this->resolution ?? [];
        $resolution = reset($resolution);

        if (false === $resolution) {
            return null;
        }

        return $resolution;
    }

    /**
     * @return null|Resolution
     */
    public function lastResolution(): ?Resolution
    {
        $resolution = $this->resolution ?? [];
        $resolution = end($resolution);

        if (false === $resolution) {
            return null;
        }

        return $resolution;
    }

    /**
     * @param  Resolution $resolution
     * @return static
     */
    public function addToResolution(
        Resolution $resolution
    ): static {
        $this->resolution[] = $resolution;

        return $this;
    }

    /**
     * @return Resolution
     */
    public function addToResolutionWithCreate(): Resolution
    {
        $this->addToResolution($resolution = new Resolution());

        return $resolution;
    }

    /**
     * @param  Resolution $resolution
     * @return static
     */
    public function addOnceToResolution(
        Resolution $resolution
    ): static {
        if (!is_array($this->resolution)) {
            $this->resolution = [];
        }

        $this->resolution[0] = $resolution;

        return $this;
    }

    /**
     * @return Resolution
     */
    public function addOnceToResolutionWithCreate(): Resolution
    {
        if (!is_array($this->resolution)) {
            $this->resolution = [];
        }

        if ([] === $this->resolution) {
            $this->addOnceToResolution(new Resolution());
        }

        return $this->resolution[0];
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getResolutionDate(): ?DateTimeInterface
    {
        return $this->resolutionDate;
    }

    /**
     * @param  null|DateTimeInterface $resolutionDate
     * @return static
     */
    public function setResolutionDate(
        ?DateTimeInterface $resolutionDate = null
    ): static {
        $this->resolutionDate = $resolutionDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetResolutionDate(): static
    {
        $this->resolutionDate = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getResolutionTime(): ?DateTimeInterface
    {
        return $this->resolutionTime;
    }

    /**
     * @param  null|DateTimeInterface $resolutionTime
     * @return static
     */
    public function setResolutionTime(
        ?DateTimeInterface $resolutionTime = null
    ): static {
        $this->resolutionTime = $resolutionTime;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetResolutionTime(): static
    {
        $this->resolutionTime = null;

        return $this;
    }

    /**
     * @return null|ProcurementProjectLot
     */
    public function getProcurementProjectLot(): ?ProcurementProjectLot
    {
        return $this->procurementProjectLot;
    }

    /**
     * @return ProcurementProjectLot
     */
    public function getProcurementProjectLotWithCreate(): ProcurementProjectLot
    {
        $this->procurementProjectLot ??= new ProcurementProjectLot();

        return $this->procurementProjectLot;
    }

    /**
     * @param  null|ProcurementProjectLot $procurementProjectLot
     * @return static
     */
    public function setProcurementProjectLot(
        ?ProcurementProjectLot $procurementProjectLot = null
    ): static {
        $this->procurementProjectLot = $procurementProjectLot;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetProcurementProjectLot(): static
    {
        $this->procurementProjectLot = null;

        return $this;
    }
}
