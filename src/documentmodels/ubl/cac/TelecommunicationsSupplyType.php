<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\Description;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\PrivacyCode;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\TelecommunicationsSupplyType as TelecommunicationsSupplyType1;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\TelecommunicationsSupplyTypeCode;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\TotalAmount;

class TelecommunicationsSupplyType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\TelecommunicationsSupplyType|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\TelecommunicationsSupplyType")
     * @JMS\Expose
     * @JMS\SerializedName("TelecommunicationsSupplyType")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTelecommunicationsSupplyType", setter="setTelecommunicationsSupplyType")
     */
    private $telecommunicationsSupplyType;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\TelecommunicationsSupplyTypeCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\TelecommunicationsSupplyTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("TelecommunicationsSupplyTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTelecommunicationsSupplyTypeCode", setter="setTelecommunicationsSupplyTypeCode")
     */
    private $telecommunicationsSupplyTypeCode;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\PrivacyCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\PrivacyCode")
     * @JMS\Expose
     * @JMS\SerializedName("PrivacyCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPrivacyCode", setter="setPrivacyCode")
     */
    private $privacyCode;

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
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\TotalAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\TotalAmount")
     * @JMS\Expose
     * @JMS\SerializedName("TotalAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTotalAmount", setter="setTotalAmount")
     */
    private $totalAmount;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\TelecommunicationsSupplyLine>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\TelecommunicationsSupplyLine>")
     * @JMS\Expose
     * @JMS\SerializedName("TelecommunicationsSupplyLine")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TelecommunicationsSupplyLine", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getTelecommunicationsSupplyLine", setter="setTelecommunicationsSupplyLine")
     */
    private $telecommunicationsSupplyLine;

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TelecommunicationsSupplyType|null
     */
    public function getTelecommunicationsSupplyType(): ?TelecommunicationsSupplyType1
    {
        return $this->telecommunicationsSupplyType;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TelecommunicationsSupplyType
     */
    public function getTelecommunicationsSupplyTypeWithCreate(): TelecommunicationsSupplyType1
    {
        $this->telecommunicationsSupplyType = is_null($this->telecommunicationsSupplyType) ? new TelecommunicationsSupplyType() : $this->telecommunicationsSupplyType;

        return $this->telecommunicationsSupplyType;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\TelecommunicationsSupplyType|null $telecommunicationsSupplyType
     * @return self
     */
    public function setTelecommunicationsSupplyType(
        ?TelecommunicationsSupplyType1 $telecommunicationsSupplyType = null,
    ): self {
        $this->telecommunicationsSupplyType = $telecommunicationsSupplyType;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTelecommunicationsSupplyType(): self
    {
        $this->telecommunicationsSupplyType = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TelecommunicationsSupplyTypeCode|null
     */
    public function getTelecommunicationsSupplyTypeCode(): ?TelecommunicationsSupplyTypeCode
    {
        return $this->telecommunicationsSupplyTypeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TelecommunicationsSupplyTypeCode
     */
    public function getTelecommunicationsSupplyTypeCodeWithCreate(): TelecommunicationsSupplyTypeCode
    {
        $this->telecommunicationsSupplyTypeCode = is_null($this->telecommunicationsSupplyTypeCode) ? new TelecommunicationsSupplyTypeCode() : $this->telecommunicationsSupplyTypeCode;

        return $this->telecommunicationsSupplyTypeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\TelecommunicationsSupplyTypeCode|null $telecommunicationsSupplyTypeCode
     * @return self
     */
    public function setTelecommunicationsSupplyTypeCode(
        ?TelecommunicationsSupplyTypeCode $telecommunicationsSupplyTypeCode = null,
    ): self {
        $this->telecommunicationsSupplyTypeCode = $telecommunicationsSupplyTypeCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTelecommunicationsSupplyTypeCode(): self
    {
        $this->telecommunicationsSupplyTypeCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\PrivacyCode|null
     */
    public function getPrivacyCode(): ?PrivacyCode
    {
        return $this->privacyCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\PrivacyCode
     */
    public function getPrivacyCodeWithCreate(): PrivacyCode
    {
        $this->privacyCode = is_null($this->privacyCode) ? new PrivacyCode() : $this->privacyCode;

        return $this->privacyCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\PrivacyCode|null $privacyCode
     * @return self
     */
    public function setPrivacyCode(?PrivacyCode $privacyCode = null): self
    {
        $this->privacyCode = $privacyCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPrivacyCode(): self
    {
        $this->privacyCode = null;

        return $this;
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

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TotalAmount|null
     */
    public function getTotalAmount(): ?TotalAmount
    {
        return $this->totalAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TotalAmount
     */
    public function getTotalAmountWithCreate(): TotalAmount
    {
        $this->totalAmount = is_null($this->totalAmount) ? new TotalAmount() : $this->totalAmount;

        return $this->totalAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\TotalAmount|null $totalAmount
     * @return self
     */
    public function setTotalAmount(?TotalAmount $totalAmount = null): self
    {
        $this->totalAmount = $totalAmount;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTotalAmount(): self
    {
        $this->totalAmount = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\TelecommunicationsSupplyLine>|null
     */
    public function getTelecommunicationsSupplyLine(): ?array
    {
        return $this->telecommunicationsSupplyLine;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\TelecommunicationsSupplyLine>|null $telecommunicationsSupplyLine
     * @return self
     */
    public function setTelecommunicationsSupplyLine(?array $telecommunicationsSupplyLine = null): self
    {
        $this->telecommunicationsSupplyLine = $telecommunicationsSupplyLine;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTelecommunicationsSupplyLine(): self
    {
        $this->telecommunicationsSupplyLine = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearTelecommunicationsSupplyLine(): self
    {
        $this->telecommunicationsSupplyLine = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\TelecommunicationsSupplyLine|null
     */
    public function firstTelecommunicationsSupplyLine(): ?TelecommunicationsSupplyLine
    {
        $telecommunicationsSupplyLine = $this->telecommunicationsSupplyLine ?? [];
        $telecommunicationsSupplyLine = reset($telecommunicationsSupplyLine);

        if ($telecommunicationsSupplyLine === false) {
            return null;
        }

        return $telecommunicationsSupplyLine;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\TelecommunicationsSupplyLine|null
     */
    public function lastTelecommunicationsSupplyLine(): ?TelecommunicationsSupplyLine
    {
        $telecommunicationsSupplyLine = $this->telecommunicationsSupplyLine ?? [];
        $telecommunicationsSupplyLine = end($telecommunicationsSupplyLine);

        if ($telecommunicationsSupplyLine === false) {
            return null;
        }

        return $telecommunicationsSupplyLine;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\TelecommunicationsSupplyLine $telecommunicationsSupplyLine
     * @return self
     */
    public function addToTelecommunicationsSupplyLine(
        TelecommunicationsSupplyLine $telecommunicationsSupplyLine,
    ): self {
        $this->telecommunicationsSupplyLine[] = $telecommunicationsSupplyLine;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\TelecommunicationsSupplyLine
     */
    public function addToTelecommunicationsSupplyLineWithCreate(): TelecommunicationsSupplyLine
    {
        $this->addTotelecommunicationsSupplyLine($telecommunicationsSupplyLine = new TelecommunicationsSupplyLine());

        return $telecommunicationsSupplyLine;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\TelecommunicationsSupplyLine $telecommunicationsSupplyLine
     * @return self
     */
    public function addOnceToTelecommunicationsSupplyLine(
        TelecommunicationsSupplyLine $telecommunicationsSupplyLine,
    ): self {
        if (!is_array($this->telecommunicationsSupplyLine)) {
            $this->telecommunicationsSupplyLine = [];
        }

        $this->telecommunicationsSupplyLine[0] = $telecommunicationsSupplyLine;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\TelecommunicationsSupplyLine
     */
    public function addOnceToTelecommunicationsSupplyLineWithCreate(): TelecommunicationsSupplyLine
    {
        if (!is_array($this->telecommunicationsSupplyLine)) {
            $this->telecommunicationsSupplyLine = [];
        }

        if ($this->telecommunicationsSupplyLine === []) {
            $this->addOnceTotelecommunicationsSupplyLine(new TelecommunicationsSupplyLine());
        }

        return $this->telecommunicationsSupplyLine[0];
    }
}
