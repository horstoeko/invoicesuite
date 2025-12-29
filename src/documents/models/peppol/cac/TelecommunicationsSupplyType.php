<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Description;
use horstoeko\invoicesuite\documents\models\peppol\cbc\PrivacyCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\TelecommunicationsSupplyType as TelecommunicationsSupplyType1;
use horstoeko\invoicesuite\documents\models\peppol\cbc\TelecommunicationsSupplyTypeCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\TotalAmount;
use JMS\Serializer\Annotation as JMS;

class TelecommunicationsSupplyType
{
    use HandlesObjectFlags;

    /**
     * @var null|TelecommunicationsSupplyType1
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\TelecommunicationsSupplyType")
     * @JMS\Expose
     * @JMS\SerializedName("TelecommunicationsSupplyType")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTelecommunicationsSupplyType", setter="setTelecommunicationsSupplyType")
     */
    private $telecommunicationsSupplyType;

    /**
     * @var null|TelecommunicationsSupplyTypeCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\TelecommunicationsSupplyTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("TelecommunicationsSupplyTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTelecommunicationsSupplyTypeCode", setter="setTelecommunicationsSupplyTypeCode")
     */
    private $telecommunicationsSupplyTypeCode;

    /**
     * @var null|PrivacyCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\PrivacyCode")
     * @JMS\Expose
     * @JMS\SerializedName("PrivacyCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPrivacyCode", setter="setPrivacyCode")
     */
    private $privacyCode;

    /**
     * @var null|array<Description>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\Description>")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Description", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $description;

    /**
     * @var null|TotalAmount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\TotalAmount")
     * @JMS\Expose
     * @JMS\SerializedName("TotalAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTotalAmount", setter="setTotalAmount")
     */
    private $totalAmount;

    /**
     * @var null|array<TelecommunicationsSupplyLine>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\TelecommunicationsSupplyLine>")
     * @JMS\Expose
     * @JMS\SerializedName("TelecommunicationsSupplyLine")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TelecommunicationsSupplyLine", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getTelecommunicationsSupplyLine", setter="setTelecommunicationsSupplyLine")
     */
    private $telecommunicationsSupplyLine;

    /**
     * @return null|TelecommunicationsSupplyType1
     */
    public function getTelecommunicationsSupplyType(): ?TelecommunicationsSupplyType1
    {
        return $this->telecommunicationsSupplyType;
    }

    /**
     * @return TelecommunicationsSupplyType1
     */
    public function getTelecommunicationsSupplyTypeWithCreate(): TelecommunicationsSupplyType1
    {
        $this->telecommunicationsSupplyType = is_null($this->telecommunicationsSupplyType) ? new TelecommunicationsSupplyType1() : $this->telecommunicationsSupplyType;

        return $this->telecommunicationsSupplyType;
    }

    /**
     * @param  null|TelecommunicationsSupplyType1 $telecommunicationsSupplyType
     * @return static
     */
    public function setTelecommunicationsSupplyType(
        ?TelecommunicationsSupplyType1 $telecommunicationsSupplyType = null,
    ): static {
        $this->telecommunicationsSupplyType = $telecommunicationsSupplyType;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTelecommunicationsSupplyType(): static
    {
        $this->telecommunicationsSupplyType = null;

        return $this;
    }

    /**
     * @return null|TelecommunicationsSupplyTypeCode
     */
    public function getTelecommunicationsSupplyTypeCode(): ?TelecommunicationsSupplyTypeCode
    {
        return $this->telecommunicationsSupplyTypeCode;
    }

    /**
     * @return TelecommunicationsSupplyTypeCode
     */
    public function getTelecommunicationsSupplyTypeCodeWithCreate(): TelecommunicationsSupplyTypeCode
    {
        $this->telecommunicationsSupplyTypeCode = is_null($this->telecommunicationsSupplyTypeCode) ? new TelecommunicationsSupplyTypeCode() : $this->telecommunicationsSupplyTypeCode;

        return $this->telecommunicationsSupplyTypeCode;
    }

    /**
     * @param  null|TelecommunicationsSupplyTypeCode $telecommunicationsSupplyTypeCode
     * @return static
     */
    public function setTelecommunicationsSupplyTypeCode(
        ?TelecommunicationsSupplyTypeCode $telecommunicationsSupplyTypeCode = null,
    ): static {
        $this->telecommunicationsSupplyTypeCode = $telecommunicationsSupplyTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTelecommunicationsSupplyTypeCode(): static
    {
        $this->telecommunicationsSupplyTypeCode = null;

        return $this;
    }

    /**
     * @return null|PrivacyCode
     */
    public function getPrivacyCode(): ?PrivacyCode
    {
        return $this->privacyCode;
    }

    /**
     * @return PrivacyCode
     */
    public function getPrivacyCodeWithCreate(): PrivacyCode
    {
        $this->privacyCode = is_null($this->privacyCode) ? new PrivacyCode() : $this->privacyCode;

        return $this->privacyCode;
    }

    /**
     * @param  null|PrivacyCode $privacyCode
     * @return static
     */
    public function setPrivacyCode(?PrivacyCode $privacyCode = null): static
    {
        $this->privacyCode = $privacyCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPrivacyCode(): static
    {
        $this->privacyCode = null;

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
     * @return null|TotalAmount
     */
    public function getTotalAmount(): ?TotalAmount
    {
        return $this->totalAmount;
    }

    /**
     * @return TotalAmount
     */
    public function getTotalAmountWithCreate(): TotalAmount
    {
        $this->totalAmount = is_null($this->totalAmount) ? new TotalAmount() : $this->totalAmount;

        return $this->totalAmount;
    }

    /**
     * @param  null|TotalAmount $totalAmount
     * @return static
     */
    public function setTotalAmount(?TotalAmount $totalAmount = null): static
    {
        $this->totalAmount = $totalAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTotalAmount(): static
    {
        $this->totalAmount = null;

        return $this;
    }

    /**
     * @return null|array<TelecommunicationsSupplyLine>
     */
    public function getTelecommunicationsSupplyLine(): ?array
    {
        return $this->telecommunicationsSupplyLine;
    }

    /**
     * @param  null|array<TelecommunicationsSupplyLine> $telecommunicationsSupplyLine
     * @return static
     */
    public function setTelecommunicationsSupplyLine(?array $telecommunicationsSupplyLine = null): static
    {
        $this->telecommunicationsSupplyLine = $telecommunicationsSupplyLine;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTelecommunicationsSupplyLine(): static
    {
        $this->telecommunicationsSupplyLine = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearTelecommunicationsSupplyLine(): static
    {
        $this->telecommunicationsSupplyLine = [];

        return $this;
    }

    /**
     * @return null|TelecommunicationsSupplyLine
     */
    public function firstTelecommunicationsSupplyLine(): ?TelecommunicationsSupplyLine
    {
        $telecommunicationsSupplyLine = $this->telecommunicationsSupplyLine ?? [];
        $telecommunicationsSupplyLine = reset($telecommunicationsSupplyLine);

        if (false === $telecommunicationsSupplyLine) {
            return null;
        }

        return $telecommunicationsSupplyLine;
    }

    /**
     * @return null|TelecommunicationsSupplyLine
     */
    public function lastTelecommunicationsSupplyLine(): ?TelecommunicationsSupplyLine
    {
        $telecommunicationsSupplyLine = $this->telecommunicationsSupplyLine ?? [];
        $telecommunicationsSupplyLine = end($telecommunicationsSupplyLine);

        if (false === $telecommunicationsSupplyLine) {
            return null;
        }

        return $telecommunicationsSupplyLine;
    }

    /**
     * @param  TelecommunicationsSupplyLine $telecommunicationsSupplyLine
     * @return static
     */
    public function addToTelecommunicationsSupplyLine(
        TelecommunicationsSupplyLine $telecommunicationsSupplyLine,
    ): static {
        $this->telecommunicationsSupplyLine[] = $telecommunicationsSupplyLine;

        return $this;
    }

    /**
     * @return TelecommunicationsSupplyLine
     */
    public function addToTelecommunicationsSupplyLineWithCreate(): TelecommunicationsSupplyLine
    {
        $this->addTotelecommunicationsSupplyLine($telecommunicationsSupplyLine = new TelecommunicationsSupplyLine());

        return $telecommunicationsSupplyLine;
    }

    /**
     * @param  TelecommunicationsSupplyLine $telecommunicationsSupplyLine
     * @return static
     */
    public function addOnceToTelecommunicationsSupplyLine(
        TelecommunicationsSupplyLine $telecommunicationsSupplyLine,
    ): static {
        if (!is_array($this->telecommunicationsSupplyLine)) {
            $this->telecommunicationsSupplyLine = [];
        }

        $this->telecommunicationsSupplyLine[0] = $telecommunicationsSupplyLine;

        return $this;
    }

    /**
     * @return TelecommunicationsSupplyLine
     */
    public function addOnceToTelecommunicationsSupplyLineWithCreate(): TelecommunicationsSupplyLine
    {
        if (!is_array($this->telecommunicationsSupplyLine)) {
            $this->telecommunicationsSupplyLine = [];
        }

        if ([] === $this->telecommunicationsSupplyLine) {
            $this->addOnceTotelecommunicationsSupplyLine(new TelecommunicationsSupplyLine());
        }

        return $this->telecommunicationsSupplyLine[0];
    }
}
