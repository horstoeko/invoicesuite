<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Description;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PreviousCancellationReasonCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ProcessReason;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ProcessReasonCode;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use JMS\Serializer\Annotation as JMS;

class ProcessJustificationType
{
    use HandlesObjectFlags;

    /**
     * @var null|PreviousCancellationReasonCode
     */
    #[JMS\Accessor(getter: 'getPreviousCancellationReasonCode', setter: 'setPreviousCancellationReasonCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PreviousCancellationReasonCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PreviousCancellationReasonCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $previousCancellationReasonCode;

    /**
     * @var null|ProcessReasonCode
     */
    #[JMS\Accessor(getter: 'getProcessReasonCode', setter: 'setProcessReasonCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ProcessReasonCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ProcessReasonCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $processReasonCode;

    /**
     * @var null|array<ProcessReason>
     */
    #[JMS\Accessor(getter: 'getProcessReason', setter: 'setProcessReason')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ProcessReason')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ProcessReason>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'ProcessReason', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $processReason;

    /**
     * @var null|array<Description>
     */
    #[JMS\Accessor(getter: 'getDescription', setter: 'setDescription')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Description')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Description>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'Description', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $description;

    /**
     * @return null|PreviousCancellationReasonCode
     */
    public function getPreviousCancellationReasonCode(): ?PreviousCancellationReasonCode
    {
        return $this->previousCancellationReasonCode;
    }

    /**
     * @return PreviousCancellationReasonCode
     */
    public function getPreviousCancellationReasonCodeWithCreate(): PreviousCancellationReasonCode
    {
        $this->previousCancellationReasonCode ??= new PreviousCancellationReasonCode();

        return $this->previousCancellationReasonCode;
    }

    /**
     * @param  null|PreviousCancellationReasonCode $previousCancellationReasonCode
     * @return static
     */
    public function setPreviousCancellationReasonCode(
        ?PreviousCancellationReasonCode $previousCancellationReasonCode = null,
    ): static {
        $this->previousCancellationReasonCode = $previousCancellationReasonCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPreviousCancellationReasonCode(): static
    {
        $this->previousCancellationReasonCode = null;

        return $this;
    }

    /**
     * @return null|ProcessReasonCode
     */
    public function getProcessReasonCode(): ?ProcessReasonCode
    {
        return $this->processReasonCode;
    }

    /**
     * @return ProcessReasonCode
     */
    public function getProcessReasonCodeWithCreate(): ProcessReasonCode
    {
        $this->processReasonCode ??= new ProcessReasonCode();

        return $this->processReasonCode;
    }

    /**
     * @param  null|ProcessReasonCode $processReasonCode
     * @return static
     */
    public function setProcessReasonCode(
        ?ProcessReasonCode $processReasonCode = null
    ): static {
        $this->processReasonCode = $processReasonCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetProcessReasonCode(): static
    {
        $this->processReasonCode = null;

        return $this;
    }

    /**
     * @return null|array<ProcessReason>
     */
    public function getProcessReason(): ?array
    {
        return $this->processReason;
    }

    /**
     * @param  null|array<ProcessReason> $processReason
     * @return static
     */
    public function setProcessReason(
        ?array $processReason = null
    ): static {
        $this->processReason = $processReason;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetProcessReason(): static
    {
        $this->processReason = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearProcessReason(): static
    {
        $this->processReason = [];

        return $this;
    }

    /**
     * @return null|ProcessReason
     */
    public function firstProcessReason(): ?ProcessReason
    {
        $processReason = $this->processReason ?? [];
        $processReason = reset($processReason);

        if (false === $processReason) {
            return null;
        }

        return $processReason;
    }

    /**
     * @return null|ProcessReason
     */
    public function lastProcessReason(): ?ProcessReason
    {
        $processReason = $this->processReason ?? [];
        $processReason = end($processReason);

        if (false === $processReason) {
            return null;
        }

        return $processReason;
    }

    /**
     * @param  ProcessReason $processReason
     * @return static
     */
    public function addToProcessReason(
        ProcessReason $processReason
    ): static {
        $this->processReason[] = $processReason;

        return $this;
    }

    /**
     * @return ProcessReason
     */
    public function addToProcessReasonWithCreate(): ProcessReason
    {
        $this->addToProcessReason($processReason = new ProcessReason());

        return $processReason;
    }

    /**
     * @param  ProcessReason $processReason
     * @return static
     */
    public function addOnceToProcessReason(
        ProcessReason $processReason
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->processReason)) {
            $this->processReason = [];
        }

        $this->processReason[0] = $processReason;

        return $this;
    }

    /**
     * @return ProcessReason
     */
    public function addOnceToProcessReasonWithCreate(): ProcessReason
    {
        if (!InvoiceSuiteArrayUtils::is($this->processReason)) {
            $this->processReason = [];
        }

        if ([] === $this->processReason) {
            $this->addOnceToProcessReason(new ProcessReason());
        }

        return $this->processReason[0];
    }

    /**
     * @return null|array<Description>
     */
    public function getDescription(): ?array
    {
        return $this->description;
    }

    /**
     * @param  null|array<Description> $description
     * @return static
     */
    public function setDescription(
        ?array $description = null
    ): static {
        $this->description = $description;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDescription(): static
    {
        $this->description = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearDescription(): static
    {
        $this->description = [];

        return $this;
    }

    /**
     * @return null|Description
     */
    public function firstDescription(): ?Description
    {
        $description = $this->description ?? [];
        $description = reset($description);

        if (false === $description) {
            return null;
        }

        return $description;
    }

    /**
     * @return null|Description
     */
    public function lastDescription(): ?Description
    {
        $description = $this->description ?? [];
        $description = end($description);

        if (false === $description) {
            return null;
        }

        return $description;
    }

    /**
     * @param  Description $description
     * @return static
     */
    public function addToDescription(
        Description $description
    ): static {
        $this->description[] = $description;

        return $this;
    }

    /**
     * @return Description
     */
    public function addToDescriptionWithCreate(): Description
    {
        $this->addToDescription($description = new Description());

        return $description;
    }

    /**
     * @param  Description $description
     * @return static
     */
    public function addOnceToDescription(
        Description $description
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->description)) {
            $this->description = [];
        }

        $this->description[0] = $description;

        return $this;
    }

    /**
     * @return Description
     */
    public function addOnceToDescriptionWithCreate(): Description
    {
        if (!InvoiceSuiteArrayUtils::is($this->description)) {
            $this->description = [];
        }

        if ([] === $this->description) {
            $this->addOnceToDescription(new Description());
        }

        return $this->description[0];
    }
}
