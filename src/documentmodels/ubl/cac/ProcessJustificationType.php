<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\Description;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\PreviousCancellationReasonCode;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\ProcessReason;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\ProcessReasonCode;

class ProcessJustificationType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\PreviousCancellationReasonCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\PreviousCancellationReasonCode")
     * @JMS\Expose
     * @JMS\SerializedName("PreviousCancellationReasonCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPreviousCancellationReasonCode", setter="setPreviousCancellationReasonCode")
     */
    private $previousCancellationReasonCode;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\ProcessReasonCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\ProcessReasonCode")
     * @JMS\Expose
     * @JMS\SerializedName("ProcessReasonCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getProcessReasonCode", setter="setProcessReasonCode")
     */
    private $processReasonCode;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\ProcessReason>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cbc\ProcessReason>")
     * @JMS\Expose
     * @JMS\SerializedName("ProcessReason")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ProcessReason", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getProcessReason", setter="setProcessReason")
     */
    private $processReason;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Description>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cbc\Description>")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Description", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $description;

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\PreviousCancellationReasonCode|null
     */
    public function getPreviousCancellationReasonCode(): ?PreviousCancellationReasonCode
    {
        return $this->previousCancellationReasonCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\PreviousCancellationReasonCode
     */
    public function getPreviousCancellationReasonCodeWithCreate(): PreviousCancellationReasonCode
    {
        $this->previousCancellationReasonCode = is_null($this->previousCancellationReasonCode) ? new PreviousCancellationReasonCode() : $this->previousCancellationReasonCode;

        return $this->previousCancellationReasonCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\PreviousCancellationReasonCode|null $previousCancellationReasonCode
     * @return self
     */
    public function setPreviousCancellationReasonCode(
        ?PreviousCancellationReasonCode $previousCancellationReasonCode = null,
    ): self {
        $this->previousCancellationReasonCode = $previousCancellationReasonCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPreviousCancellationReasonCode(): self
    {
        $this->previousCancellationReasonCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ProcessReasonCode|null
     */
    public function getProcessReasonCode(): ?ProcessReasonCode
    {
        return $this->processReasonCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ProcessReasonCode
     */
    public function getProcessReasonCodeWithCreate(): ProcessReasonCode
    {
        $this->processReasonCode = is_null($this->processReasonCode) ? new ProcessReasonCode() : $this->processReasonCode;

        return $this->processReasonCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ProcessReasonCode|null $processReasonCode
     * @return self
     */
    public function setProcessReasonCode(?ProcessReasonCode $processReasonCode = null): self
    {
        $this->processReasonCode = $processReasonCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetProcessReasonCode(): self
    {
        $this->processReasonCode = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\ProcessReason>|null
     */
    public function getProcessReason(): ?array
    {
        return $this->processReason;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\ProcessReason>|null $processReason
     * @return self
     */
    public function setProcessReason(?array $processReason = null): self
    {
        $this->processReason = $processReason;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetProcessReason(): self
    {
        $this->processReason = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearProcessReason(): self
    {
        $this->processReason = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ProcessReason|null
     */
    public function firstProcessReason(): ?ProcessReason
    {
        $processReason = $this->processReason ?? [];
        $processReason = reset($processReason);

        if ($processReason === false) {
            return null;
        }

        return $processReason;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ProcessReason|null
     */
    public function lastProcessReason(): ?ProcessReason
    {
        $processReason = $this->processReason ?? [];
        $processReason = end($processReason);

        if ($processReason === false) {
            return null;
        }

        return $processReason;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ProcessReason $processReason
     * @return self
     */
    public function addToProcessReason(ProcessReason $processReason): self
    {
        $this->processReason[] = $processReason;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ProcessReason
     */
    public function addToProcessReasonWithCreate(): ProcessReason
    {
        $this->addToprocessReason($processReason = new ProcessReason());

        return $processReason;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ProcessReason $processReason
     * @return self
     */
    public function addOnceToProcessReason(ProcessReason $processReason): self
    {
        if (!is_array($this->processReason)) {
            $this->processReason = [];
        }

        $this->processReason[0] = $processReason;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ProcessReason
     */
    public function addOnceToProcessReasonWithCreate(): ProcessReason
    {
        if (!is_array($this->processReason)) {
            $this->processReason = [];
        }

        if ($this->processReason === []) {
            $this->addOnceToprocessReason(new ProcessReason());
        }

        return $this->processReason[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Description>|null
     */
    public function getDescription(): ?array
    {
        return $this->description;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Description>|null $description
     * @return self
     */
    public function setDescription(?array $description = null): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDescription(): self
    {
        $this->description = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearDescription(): self
    {
        $this->description = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Description|null
     */
    public function firstDescription(): ?Description
    {
        $description = $this->description ?? [];
        $description = reset($description);

        if ($description === false) {
            return null;
        }

        return $description;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Description|null
     */
    public function lastDescription(): ?Description
    {
        $description = $this->description ?? [];
        $description = end($description);

        if ($description === false) {
            return null;
        }

        return $description;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Description $description
     * @return self
     */
    public function addToDescription(Description $description): self
    {
        $this->description[] = $description;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Description
     */
    public function addToDescriptionWithCreate(): Description
    {
        $this->addTodescription($description = new Description());

        return $description;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Description $description
     * @return self
     */
    public function addOnceToDescription(Description $description): self
    {
        if (!is_array($this->description)) {
            $this->description = [];
        }

        $this->description[0] = $description;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Description
     */
    public function addOnceToDescriptionWithCreate(): Description
    {
        if (!is_array($this->description)) {
            $this->description = [];
        }

        if ($this->description === []) {
            $this->addOnceTodescription(new Description());
        }

        return $this->description[0];
    }
}
