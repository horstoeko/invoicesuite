<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PromotionalEventTypeCode;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use JMS\Serializer\Annotation as JMS;

class PromotionalEventType
{
    use HandlesObjectFlags;

    /**
     * @var null|PromotionalEventTypeCode
     */
    #[JMS\Accessor(getter: 'getPromotionalEventTypeCode', setter: 'setPromotionalEventTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PromotionalEventTypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PromotionalEventTypeCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $promotionalEventTypeCode;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getSubmissionDate', setter: 'setSubmissionDate')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SubmissionDate')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $submissionDate;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getFirstShipmentAvailibilityDate', setter: 'setFirstShipmentAvailibilityDate')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('FirstShipmentAvailibilityDate')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $firstShipmentAvailibilityDate;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getLatestProposalAcceptanceDate', setter: 'setLatestProposalAcceptanceDate')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('LatestProposalAcceptanceDate')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $latestProposalAcceptanceDate;

    /**
     * @var null|array<PromotionalSpecification>
     */
    #[JMS\Accessor(getter: 'getPromotionalSpecification', setter: 'setPromotionalSpecification')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PromotionalSpecification')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\PromotionalSpecification>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'PromotionalSpecification', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
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
        $this->promotionalEventTypeCode ??= new PromotionalEventTypeCode();

        return $this->promotionalEventTypeCode;
    }

    /**
     * @param  null|PromotionalEventTypeCode $promotionalEventTypeCode
     * @return static
     */
    public function setPromotionalEventTypeCode(
        ?PromotionalEventTypeCode $promotionalEventTypeCode = null
    ): static {
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
    public function setSubmissionDate(
        ?DateTimeInterface $submissionDate = null
    ): static {
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
    public function setFirstShipmentAvailibilityDate(
        ?DateTimeInterface $firstShipmentAvailibilityDate = null
    ): static {
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
    public function setLatestProposalAcceptanceDate(
        ?DateTimeInterface $latestProposalAcceptanceDate = null
    ): static {
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
    public function setPromotionalSpecification(
        ?array $promotionalSpecification = null
    ): static {
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
    public function addToPromotionalSpecification(
        PromotionalSpecification $promotionalSpecification
    ): static {
        $this->promotionalSpecification[] = $promotionalSpecification;

        return $this;
    }

    /**
     * @return PromotionalSpecification
     */
    public function addToPromotionalSpecificationWithCreate(): PromotionalSpecification
    {
        $this->addToPromotionalSpecification($promotionalSpecification = new PromotionalSpecification());

        return $promotionalSpecification;
    }

    /**
     * @param  PromotionalSpecification $promotionalSpecification
     * @return static
     */
    public function addOnceToPromotionalSpecification(
        PromotionalSpecification $promotionalSpecification
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->promotionalSpecification)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->promotionalSpecification)) {
            $this->promotionalSpecification = [];
        }

        if ([] === $this->promotionalSpecification) {
            $this->addOnceToPromotionalSpecification(new PromotionalSpecification());
        }

        return $this->promotionalSpecification[0];
    }
}
