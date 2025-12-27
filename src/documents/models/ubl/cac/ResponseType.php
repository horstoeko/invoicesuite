<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\ubl\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\ubl\cbc\Description;
use horstoeko\invoicesuite\documents\models\ubl\cbc\ReferenceID;
use horstoeko\invoicesuite\documents\models\ubl\cbc\ResponseCode;
use JMS\Serializer\Annotation as JMS;

class ResponseType
{
    use HandlesObjectFlags;

    /**
     * @var null|ReferenceID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\ReferenceID")
     * @JMS\Expose
     * @JMS\SerializedName("ReferenceID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getReferenceID", setter="setReferenceID")
     */
    private $referenceID;

    /**
     * @var null|ResponseCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\ResponseCode")
     * @JMS\Expose
     * @JMS\SerializedName("ResponseCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getResponseCode", setter="setResponseCode")
     */
    private $responseCode;

    /**
     * @var null|array<Description>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cbc\Description>")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Description", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $description;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("EffectiveDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEffectiveDate", setter="setEffectiveDate")
     */
    private $effectiveDate;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time")
     * @JMS\Expose
     * @JMS\SerializedName("EffectiveTime")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEffectiveTime", setter="setEffectiveTime")
     */
    private $effectiveTime;

    /**
     * @var null|array<Status>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\Status>")
     * @JMS\Expose
     * @JMS\SerializedName("Status")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Status", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getStatus", setter="setStatus")
     */
    private $status;

    /**
     * @return null|ReferenceID
     */
    public function getReferenceID(): ?ReferenceID
    {
        return $this->referenceID;
    }

    /**
     * @return ReferenceID
     */
    public function getReferenceIDWithCreate(): ReferenceID
    {
        $this->referenceID = is_null($this->referenceID) ? new ReferenceID() : $this->referenceID;

        return $this->referenceID;
    }

    /**
     * @param  null|ReferenceID $referenceID
     * @return static
     */
    public function setReferenceID(?ReferenceID $referenceID = null): static
    {
        $this->referenceID = $referenceID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetReferenceID(): static
    {
        $this->referenceID = null;

        return $this;
    }

    /**
     * @return null|ResponseCode
     */
    public function getResponseCode(): ?ResponseCode
    {
        return $this->responseCode;
    }

    /**
     * @return ResponseCode
     */
    public function getResponseCodeWithCreate(): ResponseCode
    {
        $this->responseCode = is_null($this->responseCode) ? new ResponseCode() : $this->responseCode;

        return $this->responseCode;
    }

    /**
     * @param  null|ResponseCode $responseCode
     * @return static
     */
    public function setResponseCode(?ResponseCode $responseCode = null): static
    {
        $this->responseCode = $responseCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetResponseCode(): static
    {
        $this->responseCode = null;

        return $this;
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
    public function setDescription(?array $description = null): static
    {
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
    public function addToDescription(Description $description): static
    {
        $this->description[] = $description;

        return $this;
    }

    /**
     * @return Description
     */
    public function addToDescriptionWithCreate(): Description
    {
        $this->addTodescription($description = new Description());

        return $description;
    }

    /**
     * @param  Description $description
     * @return static
     */
    public function addOnceToDescription(Description $description): static
    {
        if (!is_array($this->description)) {
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
        if (!is_array($this->description)) {
            $this->description = [];
        }

        if ([] === $this->description) {
            $this->addOnceTodescription(new Description());
        }

        return $this->description[0];
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getEffectiveDate(): ?DateTimeInterface
    {
        return $this->effectiveDate;
    }

    /**
     * @param  null|DateTimeInterface $effectiveDate
     * @return static
     */
    public function setEffectiveDate(?DateTimeInterface $effectiveDate = null): static
    {
        $this->effectiveDate = $effectiveDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetEffectiveDate(): static
    {
        $this->effectiveDate = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getEffectiveTime(): ?DateTimeInterface
    {
        return $this->effectiveTime;
    }

    /**
     * @param  null|DateTimeInterface $effectiveTime
     * @return static
     */
    public function setEffectiveTime(?DateTimeInterface $effectiveTime = null): static
    {
        $this->effectiveTime = $effectiveTime;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetEffectiveTime(): static
    {
        $this->effectiveTime = null;

        return $this;
    }

    /**
     * @return null|array<Status>
     */
    public function getStatus(): ?array
    {
        return $this->status;
    }

    /**
     * @param  null|array<Status> $status
     * @return static
     */
    public function setStatus(?array $status = null): static
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetStatus(): static
    {
        $this->status = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearStatus(): static
    {
        $this->status = [];

        return $this;
    }

    /**
     * @return null|Status
     */
    public function firstStatus(): ?Status
    {
        $status = $this->status ?? [];
        $status = reset($status);

        if (false === $status) {
            return null;
        }

        return $status;
    }

    /**
     * @return null|Status
     */
    public function lastStatus(): ?Status
    {
        $status = $this->status ?? [];
        $status = end($status);

        if (false === $status) {
            return null;
        }

        return $status;
    }

    /**
     * @param  Status $status
     * @return static
     */
    public function addToStatus(Status $status): static
    {
        $this->status[] = $status;

        return $this;
    }

    /**
     * @return Status
     */
    public function addToStatusWithCreate(): Status
    {
        $this->addTostatus($status = new Status());

        return $status;
    }

    /**
     * @param  Status $status
     * @return static
     */
    public function addOnceToStatus(Status $status): static
    {
        if (!is_array($this->status)) {
            $this->status = [];
        }

        $this->status[0] = $status;

        return $this;
    }

    /**
     * @return Status
     */
    public function addOnceToStatusWithCreate(): Status
    {
        if (!is_array($this->status)) {
            $this->status = [];
        }

        if ([] === $this->status) {
            $this->addOnceTostatus(new Status());
        }

        return $this->status[0];
    }
}
