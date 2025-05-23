<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\PromotionalEventTypeCode;

class PromotionalEventType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\PromotionalEventTypeCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\PromotionalEventTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("PromotionalEventTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPromotionalEventTypeCode", setter="setPromotionalEventTypeCode")
     */
    private $promotionalEventTypeCode;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("SubmissionDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSubmissionDate", setter="setSubmissionDate")
     */
    private $submissionDate;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("FirstShipmentAvailibilityDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getFirstShipmentAvailibilityDate", setter="setFirstShipmentAvailibilityDate")
     */
    private $firstShipmentAvailibilityDate;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("LatestProposalAcceptanceDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLatestProposalAcceptanceDate", setter="setLatestProposalAcceptanceDate")
     */
    private $latestProposalAcceptanceDate;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\PromotionalSpecification>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\PromotionalSpecification>")
     * @JMS\Expose
     * @JMS\SerializedName("PromotionalSpecification")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PromotionalSpecification", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getPromotionalSpecification", setter="setPromotionalSpecification")
     */
    private $promotionalSpecification;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PromotionalEventTypeCode|null
     */
    public function getPromotionalEventTypeCode(): ?PromotionalEventTypeCode
    {
        return $this->promotionalEventTypeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PromotionalEventTypeCode
     */
    public function getPromotionalEventTypeCodeWithCreate(): PromotionalEventTypeCode
    {
        $this->promotionalEventTypeCode = is_null($this->promotionalEventTypeCode) ? new PromotionalEventTypeCode() : $this->promotionalEventTypeCode;

        return $this->promotionalEventTypeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\PromotionalEventTypeCode|null $promotionalEventTypeCode
     * @return self
     */
    public function setPromotionalEventTypeCode(?PromotionalEventTypeCode $promotionalEventTypeCode = null): self
    {
        $this->promotionalEventTypeCode = $promotionalEventTypeCode;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getSubmissionDate(): ?\DateTimeInterface
    {
        return $this->submissionDate;
    }

    /**
     * @param \DateTimeInterface|null $submissionDate
     * @return self
     */
    public function setSubmissionDate(?\DateTimeInterface $submissionDate = null): self
    {
        $this->submissionDate = $submissionDate;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getFirstShipmentAvailibilityDate(): ?\DateTimeInterface
    {
        return $this->firstShipmentAvailibilityDate;
    }

    /**
     * @param \DateTimeInterface|null $firstShipmentAvailibilityDate
     * @return self
     */
    public function setFirstShipmentAvailibilityDate(?\DateTimeInterface $firstShipmentAvailibilityDate = null): self
    {
        $this->firstShipmentAvailibilityDate = $firstShipmentAvailibilityDate;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getLatestProposalAcceptanceDate(): ?\DateTimeInterface
    {
        return $this->latestProposalAcceptanceDate;
    }

    /**
     * @param \DateTimeInterface|null $latestProposalAcceptanceDate
     * @return self
     */
    public function setLatestProposalAcceptanceDate(?\DateTimeInterface $latestProposalAcceptanceDate = null): self
    {
        $this->latestProposalAcceptanceDate = $latestProposalAcceptanceDate;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\PromotionalSpecification>|null
     */
    public function getPromotionalSpecification(): ?array
    {
        return $this->promotionalSpecification;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\PromotionalSpecification>|null $promotionalSpecification
     * @return self
     */
    public function setPromotionalSpecification(?array $promotionalSpecification = null): self
    {
        $this->promotionalSpecification = $promotionalSpecification;

        return $this;
    }

    /**
     * @return self
     */
    public function clearPromotionalSpecification(): self
    {
        $this->promotionalSpecification = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\PromotionalSpecification $promotionalSpecification
     * @return self
     */
    public function addToPromotionalSpecification(PromotionalSpecification $promotionalSpecification): self
    {
        $this->promotionalSpecification[] = $promotionalSpecification;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\PromotionalSpecification
     */
    public function addToPromotionalSpecificationWithCreate(): PromotionalSpecification
    {
        $this->addTopromotionalSpecification($promotionalSpecification = new PromotionalSpecification());

        return $promotionalSpecification;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\PromotionalSpecification $promotionalSpecification
     * @return self
     */
    public function addOnceToPromotionalSpecification(PromotionalSpecification $promotionalSpecification): self
    {
        if (!is_array($this->promotionalSpecification)) {
            $this->promotionalSpecification = [];
        }

        $this->promotionalSpecification[0] = $promotionalSpecification;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\PromotionalSpecification
     */
    public function addOnceToPromotionalSpecificationWithCreate(): PromotionalSpecification
    {
        if (!is_array($this->promotionalSpecification)) {
            $this->promotionalSpecification = [];
        }

        if ($this->promotionalSpecification === []) {
            $this->addOnceTopromotionalSpecification(new PromotionalSpecification());
        }

        return $this->promotionalSpecification[0];
    }
}
