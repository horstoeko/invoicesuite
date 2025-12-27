<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\ubl\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\ubl\cbc\PromotionalEventTypeCode;
use JMS\Serializer\Annotation as JMS;

class PromotionalEventType
{
    use HandlesObjectFlags;

    /**
     * @var null|PromotionalEventTypeCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\PromotionalEventTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("PromotionalEventTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPromotionalEventTypeCode", setter="setPromotionalEventTypeCode")
     */
    private $promotionalEventTypeCode;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("SubmissionDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSubmissionDate", setter="setSubmissionDate")
     */
    private $submissionDate;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("FirstShipmentAvailibilityDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getFirstShipmentAvailibilityDate", setter="setFirstShipmentAvailibilityDate")
     */
    private $firstShipmentAvailibilityDate;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("LatestProposalAcceptanceDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLatestProposalAcceptanceDate", setter="setLatestProposalAcceptanceDate")
     */
    private $latestProposalAcceptanceDate;

    /**
     * @var null|array<PromotionalSpecification>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\PromotionalSpecification>")
     * @JMS\Expose
     * @JMS\SerializedName("PromotionalSpecification")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PromotionalSpecification", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getPromotionalSpecification", setter="setPromotionalSpecification")
     */
    private $promotionalSpecification;

    /**
     * @return null|PromotionalEventTypeCode
     */
    public function getPromotionalEventTypeCode(): ?PromotionalEventTypeCode
    {
        return $this->promotionalEventTypeCode;
    }

    /**
     * @return PromotionalEventTypeCode
     */
    public function getPromotionalEventTypeCodeWithCreate(): PromotionalEventTypeCode
    {
        $this->promotionalEventTypeCode = is_null($this->promotionalEventTypeCode) ? new PromotionalEventTypeCode() : $this->promotionalEventTypeCode;

        return $this->promotionalEventTypeCode;
    }

    /**
     * @param  null|PromotionalEventTypeCode $promotionalEventTypeCode
     * @return static
     */
    public function setPromotionalEventTypeCode(?PromotionalEventTypeCode $promotionalEventTypeCode = null): static
    {
        $this->promotionalEventTypeCode = $promotionalEventTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPromotionalEventTypeCode(): static
    {
        $this->promotionalEventTypeCode = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getSubmissionDate(): ?DateTimeInterface
    {
        return $this->submissionDate;
    }

    /**
     * @param  null|DateTimeInterface $submissionDate
     * @return static
     */
    public function setSubmissionDate(?DateTimeInterface $submissionDate = null): static
    {
        $this->submissionDate = $submissionDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSubmissionDate(): static
    {
        $this->submissionDate = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getFirstShipmentAvailibilityDate(): ?DateTimeInterface
    {
        return $this->firstShipmentAvailibilityDate;
    }

    /**
     * @param  null|DateTimeInterface $firstShipmentAvailibilityDate
     * @return static
     */
    public function setFirstShipmentAvailibilityDate(?DateTimeInterface $firstShipmentAvailibilityDate = null): static
    {
        $this->firstShipmentAvailibilityDate = $firstShipmentAvailibilityDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetFirstShipmentAvailibilityDate(): static
    {
        $this->firstShipmentAvailibilityDate = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getLatestProposalAcceptanceDate(): ?DateTimeInterface
    {
        return $this->latestProposalAcceptanceDate;
    }

    /**
     * @param  null|DateTimeInterface $latestProposalAcceptanceDate
     * @return static
     */
    public function setLatestProposalAcceptanceDate(?DateTimeInterface $latestProposalAcceptanceDate = null): static
    {
        $this->latestProposalAcceptanceDate = $latestProposalAcceptanceDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLatestProposalAcceptanceDate(): static
    {
        $this->latestProposalAcceptanceDate = null;

        return $this;
    }

    /**
     * @return null|array<PromotionalSpecification>
     */
    public function getPromotionalSpecification(): ?array
    {
        return $this->promotionalSpecification;
    }

    /**
     * @param  null|array<PromotionalSpecification> $promotionalSpecification
     * @return static
     */
    public function setPromotionalSpecification(?array $promotionalSpecification = null): static
    {
        $this->promotionalSpecification = $promotionalSpecification;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPromotionalSpecification(): static
    {
        $this->promotionalSpecification = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearPromotionalSpecification(): static
    {
        $this->promotionalSpecification = [];

        return $this;
    }

    /**
     * @return null|PromotionalSpecification
     */
    public function firstPromotionalSpecification(): ?PromotionalSpecification
    {
        $promotionalSpecification = $this->promotionalSpecification ?? [];
        $promotionalSpecification = reset($promotionalSpecification);

        if (false === $promotionalSpecification) {
            return null;
        }

        return $promotionalSpecification;
    }

    /**
     * @return null|PromotionalSpecification
     */
    public function lastPromotionalSpecification(): ?PromotionalSpecification
    {
        $promotionalSpecification = $this->promotionalSpecification ?? [];
        $promotionalSpecification = end($promotionalSpecification);

        if (false === $promotionalSpecification) {
            return null;
        }

        return $promotionalSpecification;
    }

    /**
     * @param  PromotionalSpecification $promotionalSpecification
     * @return static
     */
    public function addToPromotionalSpecification(PromotionalSpecification $promotionalSpecification): static
    {
        $this->promotionalSpecification[] = $promotionalSpecification;

        return $this;
    }

    /**
     * @return PromotionalSpecification
     */
    public function addToPromotionalSpecificationWithCreate(): PromotionalSpecification
    {
        $this->addTopromotionalSpecification($promotionalSpecification = new PromotionalSpecification());

        return $promotionalSpecification;
    }

    /**
     * @param  PromotionalSpecification $promotionalSpecification
     * @return static
     */
    public function addOnceToPromotionalSpecification(PromotionalSpecification $promotionalSpecification): static
    {
        if (!is_array($this->promotionalSpecification)) {
            $this->promotionalSpecification = [];
        }

        $this->promotionalSpecification[0] = $promotionalSpecification;

        return $this;
    }

    /**
     * @return PromotionalSpecification
     */
    public function addOnceToPromotionalSpecificationWithCreate(): PromotionalSpecification
    {
        if (!is_array($this->promotionalSpecification)) {
            $this->promotionalSpecification = [];
        }

        if ([] === $this->promotionalSpecification) {
            $this->addOnceTopromotionalSpecification(new PromotionalSpecification());
        }

        return $this->promotionalSpecification[0];
    }
}
