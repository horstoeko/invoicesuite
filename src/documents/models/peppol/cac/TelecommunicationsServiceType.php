<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\CallBaseAmount;
use horstoeko\invoicesuite\documents\models\peppol\cbc\CallExtensionAmount;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\MovieTitle;
use horstoeko\invoicesuite\documents\models\peppol\cbc\PayPerView;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Quantity;
use horstoeko\invoicesuite\documents\models\peppol\cbc\RoamingPartnerName;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ServiceNumberCalled;
use horstoeko\invoicesuite\documents\models\peppol\cbc\TelecommunicationsServiceCall;
use horstoeko\invoicesuite\documents\models\peppol\cbc\TelecommunicationsServiceCallCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\TelecommunicationsServiceCategory;
use horstoeko\invoicesuite\documents\models\peppol\cbc\TelecommunicationsServiceCategoryCode;
use JMS\Serializer\Annotation as JMS;

class TelecommunicationsServiceType
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
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("CallDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCallDate", setter="setCallDate")
     */
    private $callDate;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time")
     * @JMS\Expose
     * @JMS\SerializedName("CallTime")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCallTime", setter="setCallTime")
     */
    private $callTime;

    /**
     * @var null|ServiceNumberCalled
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ServiceNumberCalled")
     * @JMS\Expose
     * @JMS\SerializedName("ServiceNumberCalled")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getServiceNumberCalled", setter="setServiceNumberCalled")
     */
    private $serviceNumberCalled;

    /**
     * @var null|TelecommunicationsServiceCategory
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\TelecommunicationsServiceCategory")
     * @JMS\Expose
     * @JMS\SerializedName("TelecommunicationsServiceCategory")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTelecommunicationsServiceCategory", setter="setTelecommunicationsServiceCategory")
     */
    private $telecommunicationsServiceCategory;

    /**
     * @var null|TelecommunicationsServiceCategoryCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\TelecommunicationsServiceCategoryCode")
     * @JMS\Expose
     * @JMS\SerializedName("TelecommunicationsServiceCategoryCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTelecommunicationsServiceCategoryCode", setter="setTelecommunicationsServiceCategoryCode")
     */
    private $telecommunicationsServiceCategoryCode;

    /**
     * @var null|MovieTitle
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\MovieTitle")
     * @JMS\Expose
     * @JMS\SerializedName("MovieTitle")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMovieTitle", setter="setMovieTitle")
     */
    private $movieTitle;

    /**
     * @var null|RoamingPartnerName
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\RoamingPartnerName")
     * @JMS\Expose
     * @JMS\SerializedName("RoamingPartnerName")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRoamingPartnerName", setter="setRoamingPartnerName")
     */
    private $roamingPartnerName;

    /**
     * @var null|PayPerView
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\PayPerView")
     * @JMS\Expose
     * @JMS\SerializedName("PayPerView")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPayPerView", setter="setPayPerView")
     */
    private $payPerView;

    /**
     * @var null|Quantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\Quantity")
     * @JMS\Expose
     * @JMS\SerializedName("Quantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getQuantity", setter="setQuantity")
     */
    private $quantity;

    /**
     * @var null|TelecommunicationsServiceCall
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\TelecommunicationsServiceCall")
     * @JMS\Expose
     * @JMS\SerializedName("TelecommunicationsServiceCall")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTelecommunicationsServiceCall", setter="setTelecommunicationsServiceCall")
     */
    private $telecommunicationsServiceCall;

    /**
     * @var null|TelecommunicationsServiceCallCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\TelecommunicationsServiceCallCode")
     * @JMS\Expose
     * @JMS\SerializedName("TelecommunicationsServiceCallCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTelecommunicationsServiceCallCode", setter="setTelecommunicationsServiceCallCode")
     */
    private $telecommunicationsServiceCallCode;

    /**
     * @var null|CallBaseAmount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\CallBaseAmount")
     * @JMS\Expose
     * @JMS\SerializedName("CallBaseAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCallBaseAmount", setter="setCallBaseAmount")
     */
    private $callBaseAmount;

    /**
     * @var null|CallExtensionAmount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\CallExtensionAmount")
     * @JMS\Expose
     * @JMS\SerializedName("CallExtensionAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCallExtensionAmount", setter="setCallExtensionAmount")
     */
    private $callExtensionAmount;

    /**
     * @var null|Price
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\Price")
     * @JMS\Expose
     * @JMS\SerializedName("Price")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPrice", setter="setPrice")
     */
    private $price;

    /**
     * @var null|Country
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\Country")
     * @JMS\Expose
     * @JMS\SerializedName("Country")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCountry", setter="setCountry")
     */
    private $country;

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
     * @var null|array<CallDuty>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\CallDuty>")
     * @JMS\Expose
     * @JMS\SerializedName("CallDuty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="CallDuty", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getCallDuty", setter="setCallDuty")
     */
    private $callDuty;

    /**
     * @var null|array<TimeDuty>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\TimeDuty>")
     * @JMS\Expose
     * @JMS\SerializedName("TimeDuty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TimeDuty", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getTimeDuty", setter="setTimeDuty")
     */
    private $timeDuty;

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
     * @return null|DateTimeInterface
     */
    public function getCallDate(): ?DateTimeInterface
    {
        return $this->callDate;
    }

    /**
     * @param  null|DateTimeInterface $callDate
     * @return static
     */
    public function setCallDate(?DateTimeInterface $callDate = null): static
    {
        $this->callDate = $callDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCallDate(): static
    {
        $this->callDate = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getCallTime(): ?DateTimeInterface
    {
        return $this->callTime;
    }

    /**
     * @param  null|DateTimeInterface $callTime
     * @return static
     */
    public function setCallTime(?DateTimeInterface $callTime = null): static
    {
        $this->callTime = $callTime;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCallTime(): static
    {
        $this->callTime = null;

        return $this;
    }

    /**
     * @return null|ServiceNumberCalled
     */
    public function getServiceNumberCalled(): ?ServiceNumberCalled
    {
        return $this->serviceNumberCalled;
    }

    /**
     * @return ServiceNumberCalled
     */
    public function getServiceNumberCalledWithCreate(): ServiceNumberCalled
    {
        $this->serviceNumberCalled = is_null($this->serviceNumberCalled) ? new ServiceNumberCalled() : $this->serviceNumberCalled;

        return $this->serviceNumberCalled;
    }

    /**
     * @param  null|ServiceNumberCalled $serviceNumberCalled
     * @return static
     */
    public function setServiceNumberCalled(?ServiceNumberCalled $serviceNumberCalled = null): static
    {
        $this->serviceNumberCalled = $serviceNumberCalled;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetServiceNumberCalled(): static
    {
        $this->serviceNumberCalled = null;

        return $this;
    }

    /**
     * @return null|TelecommunicationsServiceCategory
     */
    public function getTelecommunicationsServiceCategory(): ?TelecommunicationsServiceCategory
    {
        return $this->telecommunicationsServiceCategory;
    }

    /**
     * @return TelecommunicationsServiceCategory
     */
    public function getTelecommunicationsServiceCategoryWithCreate(): TelecommunicationsServiceCategory
    {
        $this->telecommunicationsServiceCategory = is_null($this->telecommunicationsServiceCategory) ? new TelecommunicationsServiceCategory() : $this->telecommunicationsServiceCategory;

        return $this->telecommunicationsServiceCategory;
    }

    /**
     * @param  null|TelecommunicationsServiceCategory $telecommunicationsServiceCategory
     * @return static
     */
    public function setTelecommunicationsServiceCategory(
        ?TelecommunicationsServiceCategory $telecommunicationsServiceCategory = null,
    ): static {
        $this->telecommunicationsServiceCategory = $telecommunicationsServiceCategory;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTelecommunicationsServiceCategory(): static
    {
        $this->telecommunicationsServiceCategory = null;

        return $this;
    }

    /**
     * @return null|TelecommunicationsServiceCategoryCode
     */
    public function getTelecommunicationsServiceCategoryCode(): ?TelecommunicationsServiceCategoryCode
    {
        return $this->telecommunicationsServiceCategoryCode;
    }

    /**
     * @return TelecommunicationsServiceCategoryCode
     */
    public function getTelecommunicationsServiceCategoryCodeWithCreate(): TelecommunicationsServiceCategoryCode
    {
        $this->telecommunicationsServiceCategoryCode = is_null($this->telecommunicationsServiceCategoryCode) ? new TelecommunicationsServiceCategoryCode() : $this->telecommunicationsServiceCategoryCode;

        return $this->telecommunicationsServiceCategoryCode;
    }

    /**
     * @param  null|TelecommunicationsServiceCategoryCode $telecommunicationsServiceCategoryCode
     * @return static
     */
    public function setTelecommunicationsServiceCategoryCode(
        ?TelecommunicationsServiceCategoryCode $telecommunicationsServiceCategoryCode = null,
    ): static {
        $this->telecommunicationsServiceCategoryCode = $telecommunicationsServiceCategoryCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTelecommunicationsServiceCategoryCode(): static
    {
        $this->telecommunicationsServiceCategoryCode = null;

        return $this;
    }

    /**
     * @return null|MovieTitle
     */
    public function getMovieTitle(): ?MovieTitle
    {
        return $this->movieTitle;
    }

    /**
     * @return MovieTitle
     */
    public function getMovieTitleWithCreate(): MovieTitle
    {
        $this->movieTitle = is_null($this->movieTitle) ? new MovieTitle() : $this->movieTitle;

        return $this->movieTitle;
    }

    /**
     * @param  null|MovieTitle $movieTitle
     * @return static
     */
    public function setMovieTitle(?MovieTitle $movieTitle = null): static
    {
        $this->movieTitle = $movieTitle;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMovieTitle(): static
    {
        $this->movieTitle = null;

        return $this;
    }

    /**
     * @return null|RoamingPartnerName
     */
    public function getRoamingPartnerName(): ?RoamingPartnerName
    {
        return $this->roamingPartnerName;
    }

    /**
     * @return RoamingPartnerName
     */
    public function getRoamingPartnerNameWithCreate(): RoamingPartnerName
    {
        $this->roamingPartnerName = is_null($this->roamingPartnerName) ? new RoamingPartnerName() : $this->roamingPartnerName;

        return $this->roamingPartnerName;
    }

    /**
     * @param  null|RoamingPartnerName $roamingPartnerName
     * @return static
     */
    public function setRoamingPartnerName(?RoamingPartnerName $roamingPartnerName = null): static
    {
        $this->roamingPartnerName = $roamingPartnerName;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRoamingPartnerName(): static
    {
        $this->roamingPartnerName = null;

        return $this;
    }

    /**
     * @return null|PayPerView
     */
    public function getPayPerView(): ?PayPerView
    {
        return $this->payPerView;
    }

    /**
     * @return PayPerView
     */
    public function getPayPerViewWithCreate(): PayPerView
    {
        $this->payPerView = is_null($this->payPerView) ? new PayPerView() : $this->payPerView;

        return $this->payPerView;
    }

    /**
     * @param  null|PayPerView $payPerView
     * @return static
     */
    public function setPayPerView(?PayPerView $payPerView = null): static
    {
        $this->payPerView = $payPerView;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPayPerView(): static
    {
        $this->payPerView = null;

        return $this;
    }

    /**
     * @return null|Quantity
     */
    public function getQuantity(): ?Quantity
    {
        return $this->quantity;
    }

    /**
     * @return Quantity
     */
    public function getQuantityWithCreate(): Quantity
    {
        $this->quantity = is_null($this->quantity) ? new Quantity() : $this->quantity;

        return $this->quantity;
    }

    /**
     * @param  null|Quantity $quantity
     * @return static
     */
    public function setQuantity(?Quantity $quantity = null): static
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetQuantity(): static
    {
        $this->quantity = null;

        return $this;
    }

    /**
     * @return null|TelecommunicationsServiceCall
     */
    public function getTelecommunicationsServiceCall(): ?TelecommunicationsServiceCall
    {
        return $this->telecommunicationsServiceCall;
    }

    /**
     * @return TelecommunicationsServiceCall
     */
    public function getTelecommunicationsServiceCallWithCreate(): TelecommunicationsServiceCall
    {
        $this->telecommunicationsServiceCall = is_null($this->telecommunicationsServiceCall) ? new TelecommunicationsServiceCall() : $this->telecommunicationsServiceCall;

        return $this->telecommunicationsServiceCall;
    }

    /**
     * @param  null|TelecommunicationsServiceCall $telecommunicationsServiceCall
     * @return static
     */
    public function setTelecommunicationsServiceCall(
        ?TelecommunicationsServiceCall $telecommunicationsServiceCall = null,
    ): static {
        $this->telecommunicationsServiceCall = $telecommunicationsServiceCall;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTelecommunicationsServiceCall(): static
    {
        $this->telecommunicationsServiceCall = null;

        return $this;
    }

    /**
     * @return null|TelecommunicationsServiceCallCode
     */
    public function getTelecommunicationsServiceCallCode(): ?TelecommunicationsServiceCallCode
    {
        return $this->telecommunicationsServiceCallCode;
    }

    /**
     * @return TelecommunicationsServiceCallCode
     */
    public function getTelecommunicationsServiceCallCodeWithCreate(): TelecommunicationsServiceCallCode
    {
        $this->telecommunicationsServiceCallCode = is_null($this->telecommunicationsServiceCallCode) ? new TelecommunicationsServiceCallCode() : $this->telecommunicationsServiceCallCode;

        return $this->telecommunicationsServiceCallCode;
    }

    /**
     * @param  null|TelecommunicationsServiceCallCode $telecommunicationsServiceCallCode
     * @return static
     */
    public function setTelecommunicationsServiceCallCode(
        ?TelecommunicationsServiceCallCode $telecommunicationsServiceCallCode = null,
    ): static {
        $this->telecommunicationsServiceCallCode = $telecommunicationsServiceCallCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTelecommunicationsServiceCallCode(): static
    {
        $this->telecommunicationsServiceCallCode = null;

        return $this;
    }

    /**
     * @return null|CallBaseAmount
     */
    public function getCallBaseAmount(): ?CallBaseAmount
    {
        return $this->callBaseAmount;
    }

    /**
     * @return CallBaseAmount
     */
    public function getCallBaseAmountWithCreate(): CallBaseAmount
    {
        $this->callBaseAmount = is_null($this->callBaseAmount) ? new CallBaseAmount() : $this->callBaseAmount;

        return $this->callBaseAmount;
    }

    /**
     * @param  null|CallBaseAmount $callBaseAmount
     * @return static
     */
    public function setCallBaseAmount(?CallBaseAmount $callBaseAmount = null): static
    {
        $this->callBaseAmount = $callBaseAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCallBaseAmount(): static
    {
        $this->callBaseAmount = null;

        return $this;
    }

    /**
     * @return null|CallExtensionAmount
     */
    public function getCallExtensionAmount(): ?CallExtensionAmount
    {
        return $this->callExtensionAmount;
    }

    /**
     * @return CallExtensionAmount
     */
    public function getCallExtensionAmountWithCreate(): CallExtensionAmount
    {
        $this->callExtensionAmount = is_null($this->callExtensionAmount) ? new CallExtensionAmount() : $this->callExtensionAmount;

        return $this->callExtensionAmount;
    }

    /**
     * @param  null|CallExtensionAmount $callExtensionAmount
     * @return static
     */
    public function setCallExtensionAmount(?CallExtensionAmount $callExtensionAmount = null): static
    {
        $this->callExtensionAmount = $callExtensionAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCallExtensionAmount(): static
    {
        $this->callExtensionAmount = null;

        return $this;
    }

    /**
     * @return null|Price
     */
    public function getPrice(): ?Price
    {
        return $this->price;
    }

    /**
     * @return Price
     */
    public function getPriceWithCreate(): Price
    {
        $this->price = is_null($this->price) ? new Price() : $this->price;

        return $this->price;
    }

    /**
     * @param  null|Price $price
     * @return static
     */
    public function setPrice(?Price $price = null): static
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPrice(): static
    {
        $this->price = null;

        return $this;
    }

    /**
     * @return null|Country
     */
    public function getCountry(): ?Country
    {
        return $this->country;
    }

    /**
     * @return Country
     */
    public function getCountryWithCreate(): Country
    {
        $this->country = is_null($this->country) ? new Country() : $this->country;

        return $this->country;
    }

    /**
     * @param  null|Country $country
     * @return static
     */
    public function setCountry(?Country $country = null): static
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCountry(): static
    {
        $this->country = null;

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
     * @return null|array<CallDuty>
     */
    public function getCallDuty(): ?array
    {
        return $this->callDuty;
    }

    /**
     * @param  null|array<CallDuty> $callDuty
     * @return static
     */
    public function setCallDuty(?array $callDuty = null): static
    {
        $this->callDuty = $callDuty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCallDuty(): static
    {
        $this->callDuty = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearCallDuty(): static
    {
        $this->callDuty = [];

        return $this;
    }

    /**
     * @return null|CallDuty
     */
    public function firstCallDuty(): ?CallDuty
    {
        $callDuty = $this->callDuty ?? [];
        $callDuty = reset($callDuty);

        if (false === $callDuty) {
            return null;
        }

        return $callDuty;
    }

    /**
     * @return null|CallDuty
     */
    public function lastCallDuty(): ?CallDuty
    {
        $callDuty = $this->callDuty ?? [];
        $callDuty = end($callDuty);

        if (false === $callDuty) {
            return null;
        }

        return $callDuty;
    }

    /**
     * @param  CallDuty $callDuty
     * @return static
     */
    public function addToCallDuty(CallDuty $callDuty): static
    {
        $this->callDuty[] = $callDuty;

        return $this;
    }

    /**
     * @return CallDuty
     */
    public function addToCallDutyWithCreate(): CallDuty
    {
        $this->addTocallDuty($callDuty = new CallDuty());

        return $callDuty;
    }

    /**
     * @param  CallDuty $callDuty
     * @return static
     */
    public function addOnceToCallDuty(CallDuty $callDuty): static
    {
        if (!is_array($this->callDuty)) {
            $this->callDuty = [];
        }

        $this->callDuty[0] = $callDuty;

        return $this;
    }

    /**
     * @return CallDuty
     */
    public function addOnceToCallDutyWithCreate(): CallDuty
    {
        if (!is_array($this->callDuty)) {
            $this->callDuty = [];
        }

        if ([] === $this->callDuty) {
            $this->addOnceTocallDuty(new CallDuty());
        }

        return $this->callDuty[0];
    }

    /**
     * @return null|array<TimeDuty>
     */
    public function getTimeDuty(): ?array
    {
        return $this->timeDuty;
    }

    /**
     * @param  null|array<TimeDuty> $timeDuty
     * @return static
     */
    public function setTimeDuty(?array $timeDuty = null): static
    {
        $this->timeDuty = $timeDuty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTimeDuty(): static
    {
        $this->timeDuty = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearTimeDuty(): static
    {
        $this->timeDuty = [];

        return $this;
    }

    /**
     * @return null|TimeDuty
     */
    public function firstTimeDuty(): ?TimeDuty
    {
        $timeDuty = $this->timeDuty ?? [];
        $timeDuty = reset($timeDuty);

        if (false === $timeDuty) {
            return null;
        }

        return $timeDuty;
    }

    /**
     * @return null|TimeDuty
     */
    public function lastTimeDuty(): ?TimeDuty
    {
        $timeDuty = $this->timeDuty ?? [];
        $timeDuty = end($timeDuty);

        if (false === $timeDuty) {
            return null;
        }

        return $timeDuty;
    }

    /**
     * @param  TimeDuty $timeDuty
     * @return static
     */
    public function addToTimeDuty(TimeDuty $timeDuty): static
    {
        $this->timeDuty[] = $timeDuty;

        return $this;
    }

    /**
     * @return TimeDuty
     */
    public function addToTimeDutyWithCreate(): TimeDuty
    {
        $this->addTotimeDuty($timeDuty = new TimeDuty());

        return $timeDuty;
    }

    /**
     * @param  TimeDuty $timeDuty
     * @return static
     */
    public function addOnceToTimeDuty(TimeDuty $timeDuty): static
    {
        if (!is_array($this->timeDuty)) {
            $this->timeDuty = [];
        }

        $this->timeDuty[0] = $timeDuty;

        return $this;
    }

    /**
     * @return TimeDuty
     */
    public function addOnceToTimeDutyWithCreate(): TimeDuty
    {
        if (!is_array($this->timeDuty)) {
            $this->timeDuty = [];
        }

        if ([] === $this->timeDuty) {
            $this->addOnceTotimeDuty(new TimeDuty());
        }

        return $this->timeDuty[0];
    }
}
