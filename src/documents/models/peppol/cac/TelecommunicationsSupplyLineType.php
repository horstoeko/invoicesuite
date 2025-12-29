<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Description;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\LineExtensionAmount;
use horstoeko\invoicesuite\documents\models\peppol\cbc\PhoneNumber;
use JMS\Serializer\Annotation as JMS;

class TelecommunicationsSupplyLineType
{
    use HandlesObjectFlags;

    /**
     * @var null|ID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ID")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var null|PhoneNumber
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\PhoneNumber")
     * @JMS\Expose
     * @JMS\SerializedName("PhoneNumber")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPhoneNumber", setter="setPhoneNumber")
     */
    private $phoneNumber;

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
     * @var null|LineExtensionAmount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\LineExtensionAmount")
     * @JMS\Expose
     * @JMS\SerializedName("LineExtensionAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLineExtensionAmount", setter="setLineExtensionAmount")
     */
    private $lineExtensionAmount;

    /**
     * @var null|array<ExchangeRate>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\ExchangeRate>")
     * @JMS\Expose
     * @JMS\SerializedName("ExchangeRate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ExchangeRate", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getExchangeRate", setter="setExchangeRate")
     */
    private $exchangeRate;

    /**
     * @var null|array<AllowanceCharge>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\AllowanceCharge>")
     * @JMS\Expose
     * @JMS\SerializedName("AllowanceCharge")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="AllowanceCharge", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getAllowanceCharge", setter="setAllowanceCharge")
     */
    private $allowanceCharge;

    /**
     * @var null|array<TaxTotal>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\TaxTotal>")
     * @JMS\Expose
     * @JMS\SerializedName("TaxTotal")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TaxTotal", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getTaxTotal", setter="setTaxTotal")
     */
    private $taxTotal;

    /**
     * @var null|array<TelecommunicationsService>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\TelecommunicationsService>")
     * @JMS\Expose
     * @JMS\SerializedName("TelecommunicationsService")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TelecommunicationsService", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getTelecommunicationsService", setter="setTelecommunicationsService")
     */
    private $telecommunicationsService;

    /**
     * @return null|ID
     */
    public function getID(): ?ID
    {
        return $this->iD;
    }

    /**
     * @return ID
     */
    public function getIDWithCreate(): ID
    {
        $this->iD = is_null($this->iD) ? new ID() : $this->iD;

        return $this->iD;
    }

    /**
     * @param  null|ID $iD
     * @return static
     */
    public function setID(?ID $iD = null): static
    {
        $this->iD = $iD;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetID(): static
    {
        $this->iD = null;

        return $this;
    }

    /**
     * @return null|PhoneNumber
     */
    public function getPhoneNumber(): ?PhoneNumber
    {
        return $this->phoneNumber;
    }

    /**
     * @return PhoneNumber
     */
    public function getPhoneNumberWithCreate(): PhoneNumber
    {
        $this->phoneNumber = is_null($this->phoneNumber) ? new PhoneNumber() : $this->phoneNumber;

        return $this->phoneNumber;
    }

    /**
     * @param  null|PhoneNumber $phoneNumber
     * @return static
     */
    public function setPhoneNumber(?PhoneNumber $phoneNumber = null): static
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPhoneNumber(): static
    {
        $this->phoneNumber = null;

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
     * @return null|LineExtensionAmount
     */
    public function getLineExtensionAmount(): ?LineExtensionAmount
    {
        return $this->lineExtensionAmount;
    }

    /**
     * @return LineExtensionAmount
     */
    public function getLineExtensionAmountWithCreate(): LineExtensionAmount
    {
        $this->lineExtensionAmount = is_null($this->lineExtensionAmount) ? new LineExtensionAmount() : $this->lineExtensionAmount;

        return $this->lineExtensionAmount;
    }

    /**
     * @param  null|LineExtensionAmount $lineExtensionAmount
     * @return static
     */
    public function setLineExtensionAmount(?LineExtensionAmount $lineExtensionAmount = null): static
    {
        $this->lineExtensionAmount = $lineExtensionAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLineExtensionAmount(): static
    {
        $this->lineExtensionAmount = null;

        return $this;
    }

    /**
     * @return null|array<ExchangeRate>
     */
    public function getExchangeRate(): ?array
    {
        return $this->exchangeRate;
    }

    /**
     * @param  null|array<ExchangeRate> $exchangeRate
     * @return static
     */
    public function setExchangeRate(?array $exchangeRate = null): static
    {
        $this->exchangeRate = $exchangeRate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetExchangeRate(): static
    {
        $this->exchangeRate = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearExchangeRate(): static
    {
        $this->exchangeRate = [];

        return $this;
    }

    /**
     * @return null|ExchangeRate
     */
    public function firstExchangeRate(): ?ExchangeRate
    {
        $exchangeRate = $this->exchangeRate ?? [];
        $exchangeRate = reset($exchangeRate);

        if (false === $exchangeRate) {
            return null;
        }

        return $exchangeRate;
    }

    /**
     * @return null|ExchangeRate
     */
    public function lastExchangeRate(): ?ExchangeRate
    {
        $exchangeRate = $this->exchangeRate ?? [];
        $exchangeRate = end($exchangeRate);

        if (false === $exchangeRate) {
            return null;
        }

        return $exchangeRate;
    }

    /**
     * @param  ExchangeRate $exchangeRate
     * @return static
     */
    public function addToExchangeRate(ExchangeRate $exchangeRate): static
    {
        $this->exchangeRate[] = $exchangeRate;

        return $this;
    }

    /**
     * @return ExchangeRate
     */
    public function addToExchangeRateWithCreate(): ExchangeRate
    {
        $this->addToexchangeRate($exchangeRate = new ExchangeRate());

        return $exchangeRate;
    }

    /**
     * @param  ExchangeRate $exchangeRate
     * @return static
     */
    public function addOnceToExchangeRate(ExchangeRate $exchangeRate): static
    {
        if (!is_array($this->exchangeRate)) {
            $this->exchangeRate = [];
        }

        $this->exchangeRate[0] = $exchangeRate;

        return $this;
    }

    /**
     * @return ExchangeRate
     */
    public function addOnceToExchangeRateWithCreate(): ExchangeRate
    {
        if (!is_array($this->exchangeRate)) {
            $this->exchangeRate = [];
        }

        if ([] === $this->exchangeRate) {
            $this->addOnceToexchangeRate(new ExchangeRate());
        }

        return $this->exchangeRate[0];
    }

    /**
     * @return null|array<AllowanceCharge>
     */
    public function getAllowanceCharge(): ?array
    {
        return $this->allowanceCharge;
    }

    /**
     * @param  null|array<AllowanceCharge> $allowanceCharge
     * @return static
     */
    public function setAllowanceCharge(?array $allowanceCharge = null): static
    {
        $this->allowanceCharge = $allowanceCharge;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAllowanceCharge(): static
    {
        $this->allowanceCharge = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearAllowanceCharge(): static
    {
        $this->allowanceCharge = [];

        return $this;
    }

    /**
     * @return null|AllowanceCharge
     */
    public function firstAllowanceCharge(): ?AllowanceCharge
    {
        $allowanceCharge = $this->allowanceCharge ?? [];
        $allowanceCharge = reset($allowanceCharge);

        if (false === $allowanceCharge) {
            return null;
        }

        return $allowanceCharge;
    }

    /**
     * @return null|AllowanceCharge
     */
    public function lastAllowanceCharge(): ?AllowanceCharge
    {
        $allowanceCharge = $this->allowanceCharge ?? [];
        $allowanceCharge = end($allowanceCharge);

        if (false === $allowanceCharge) {
            return null;
        }

        return $allowanceCharge;
    }

    /**
     * @param  AllowanceCharge $allowanceCharge
     * @return static
     */
    public function addToAllowanceCharge(AllowanceCharge $allowanceCharge): static
    {
        $this->allowanceCharge[] = $allowanceCharge;

        return $this;
    }

    /**
     * @return AllowanceCharge
     */
    public function addToAllowanceChargeWithCreate(): AllowanceCharge
    {
        $this->addToallowanceCharge($allowanceCharge = new AllowanceCharge());

        return $allowanceCharge;
    }

    /**
     * @param  AllowanceCharge $allowanceCharge
     * @return static
     */
    public function addOnceToAllowanceCharge(AllowanceCharge $allowanceCharge): static
    {
        if (!is_array($this->allowanceCharge)) {
            $this->allowanceCharge = [];
        }

        $this->allowanceCharge[0] = $allowanceCharge;

        return $this;
    }

    /**
     * @return AllowanceCharge
     */
    public function addOnceToAllowanceChargeWithCreate(): AllowanceCharge
    {
        if (!is_array($this->allowanceCharge)) {
            $this->allowanceCharge = [];
        }

        if ([] === $this->allowanceCharge) {
            $this->addOnceToallowanceCharge(new AllowanceCharge());
        }

        return $this->allowanceCharge[0];
    }

    /**
     * @return null|array<TaxTotal>
     */
    public function getTaxTotal(): ?array
    {
        return $this->taxTotal;
    }

    /**
     * @param  null|array<TaxTotal> $taxTotal
     * @return static
     */
    public function setTaxTotal(?array $taxTotal = null): static
    {
        $this->taxTotal = $taxTotal;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTaxTotal(): static
    {
        $this->taxTotal = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearTaxTotal(): static
    {
        $this->taxTotal = [];

        return $this;
    }

    /**
     * @return null|TaxTotal
     */
    public function firstTaxTotal(): ?TaxTotal
    {
        $taxTotal = $this->taxTotal ?? [];
        $taxTotal = reset($taxTotal);

        if (false === $taxTotal) {
            return null;
        }

        return $taxTotal;
    }

    /**
     * @return null|TaxTotal
     */
    public function lastTaxTotal(): ?TaxTotal
    {
        $taxTotal = $this->taxTotal ?? [];
        $taxTotal = end($taxTotal);

        if (false === $taxTotal) {
            return null;
        }

        return $taxTotal;
    }

    /**
     * @param  TaxTotal $taxTotal
     * @return static
     */
    public function addToTaxTotal(TaxTotal $taxTotal): static
    {
        $this->taxTotal[] = $taxTotal;

        return $this;
    }

    /**
     * @return TaxTotal
     */
    public function addToTaxTotalWithCreate(): TaxTotal
    {
        $this->addTotaxTotal($taxTotal = new TaxTotal());

        return $taxTotal;
    }

    /**
     * @param  TaxTotal $taxTotal
     * @return static
     */
    public function addOnceToTaxTotal(TaxTotal $taxTotal): static
    {
        if (!is_array($this->taxTotal)) {
            $this->taxTotal = [];
        }

        $this->taxTotal[0] = $taxTotal;

        return $this;
    }

    /**
     * @return TaxTotal
     */
    public function addOnceToTaxTotalWithCreate(): TaxTotal
    {
        if (!is_array($this->taxTotal)) {
            $this->taxTotal = [];
        }

        if ([] === $this->taxTotal) {
            $this->addOnceTotaxTotal(new TaxTotal());
        }

        return $this->taxTotal[0];
    }

    /**
     * @return null|array<TelecommunicationsService>
     */
    public function getTelecommunicationsService(): ?array
    {
        return $this->telecommunicationsService;
    }

    /**
     * @param  null|array<TelecommunicationsService> $telecommunicationsService
     * @return static
     */
    public function setTelecommunicationsService(?array $telecommunicationsService = null): static
    {
        $this->telecommunicationsService = $telecommunicationsService;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTelecommunicationsService(): static
    {
        $this->telecommunicationsService = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearTelecommunicationsService(): static
    {
        $this->telecommunicationsService = [];

        return $this;
    }

    /**
     * @return null|TelecommunicationsService
     */
    public function firstTelecommunicationsService(): ?TelecommunicationsService
    {
        $telecommunicationsService = $this->telecommunicationsService ?? [];
        $telecommunicationsService = reset($telecommunicationsService);

        if (false === $telecommunicationsService) {
            return null;
        }

        return $telecommunicationsService;
    }

    /**
     * @return null|TelecommunicationsService
     */
    public function lastTelecommunicationsService(): ?TelecommunicationsService
    {
        $telecommunicationsService = $this->telecommunicationsService ?? [];
        $telecommunicationsService = end($telecommunicationsService);

        if (false === $telecommunicationsService) {
            return null;
        }

        return $telecommunicationsService;
    }

    /**
     * @param  TelecommunicationsService $telecommunicationsService
     * @return static
     */
    public function addToTelecommunicationsService(TelecommunicationsService $telecommunicationsService): static
    {
        $this->telecommunicationsService[] = $telecommunicationsService;

        return $this;
    }

    /**
     * @return TelecommunicationsService
     */
    public function addToTelecommunicationsServiceWithCreate(): TelecommunicationsService
    {
        $this->addTotelecommunicationsService($telecommunicationsService = new TelecommunicationsService());

        return $telecommunicationsService;
    }

    /**
     * @param  TelecommunicationsService $telecommunicationsService
     * @return static
     */
    public function addOnceToTelecommunicationsService(TelecommunicationsService $telecommunicationsService): static
    {
        if (!is_array($this->telecommunicationsService)) {
            $this->telecommunicationsService = [];
        }

        $this->telecommunicationsService[0] = $telecommunicationsService;

        return $this;
    }

    /**
     * @return TelecommunicationsService
     */
    public function addOnceToTelecommunicationsServiceWithCreate(): TelecommunicationsService
    {
        if (!is_array($this->telecommunicationsService)) {
            $this->telecommunicationsService = [];
        }

        if ([] === $this->telecommunicationsService) {
            $this->addOnceTotelecommunicationsService(new TelecommunicationsService());
        }

        return $this->telecommunicationsService[0];
    }
}
