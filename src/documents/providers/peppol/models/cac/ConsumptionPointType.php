<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Description;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SubscriberID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SubscriberType;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SubscriberTypeCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TotalDeliveredQuantity;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use JMS\Serializer\Annotation as JMS;

class ConsumptionPointType
{
    use HandlesObjectFlags;

    /**
     * @var null|ID
     */
    #[JMS\Accessor(getter: 'getID', setter: 'setID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $iD;

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
     * @var null|SubscriberID
     */
    #[JMS\Accessor(getter: 'getSubscriberID', setter: 'setSubscriberID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SubscriberID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SubscriberID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $subscriberID;

    /**
     * @var null|SubscriberType
     */
    #[JMS\Accessor(getter: 'getSubscriberType', setter: 'setSubscriberType')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SubscriberType')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SubscriberType')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $subscriberType;

    /**
     * @var null|SubscriberTypeCode
     */
    #[JMS\Accessor(getter: 'getSubscriberTypeCode', setter: 'setSubscriberTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SubscriberTypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SubscriberTypeCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $subscriberTypeCode;

    /**
     * @var null|TotalDeliveredQuantity
     */
    #[JMS\Accessor(getter: 'getTotalDeliveredQuantity', setter: 'setTotalDeliveredQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TotalDeliveredQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TotalDeliveredQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $totalDeliveredQuantity;

    /**
     * @var null|Address
     */
    #[JMS\Accessor(getter: 'getAddress', setter: 'setAddress')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Address')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\Address')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $address;

    /**
     * @var null|WebSiteAccess
     */
    #[JMS\Accessor(getter: 'getWebSiteAccess', setter: 'setWebSiteAccess')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('WebSiteAccess')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\WebSiteAccess')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $webSiteAccess;

    /**
     * @var null|array<UtilityMeter>
     */
    #[JMS\Accessor(getter: 'getUtilityMeter', setter: 'setUtilityMeter')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('UtilityMeter')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\UtilityMeter>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'UtilityMeter', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $utilityMeter;

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
        $this->iD ??= new ID();

        return $this->iD;
    }

    /**
     * @param  null|ID $iD
     * @return static
     */
    public function setID(
        ?ID $iD = null
    ): static {
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

    /**
     * @return null|SubscriberID
     */
    public function getSubscriberID(): ?SubscriberID
    {
        return $this->subscriberID;
    }

    /**
     * @return SubscriberID
     */
    public function getSubscriberIDWithCreate(): SubscriberID
    {
        $this->subscriberID ??= new SubscriberID();

        return $this->subscriberID;
    }

    /**
     * @param  null|SubscriberID $subscriberID
     * @return static
     */
    public function setSubscriberID(
        ?SubscriberID $subscriberID = null
    ): static {
        $this->subscriberID = $subscriberID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSubscriberID(): static
    {
        $this->subscriberID = null;

        return $this;
    }

    /**
     * @return null|SubscriberType
     */
    public function getSubscriberType(): ?SubscriberType
    {
        return $this->subscriberType;
    }

    /**
     * @return SubscriberType
     */
    public function getSubscriberTypeWithCreate(): SubscriberType
    {
        $this->subscriberType ??= new SubscriberType();

        return $this->subscriberType;
    }

    /**
     * @param  null|SubscriberType $subscriberType
     * @return static
     */
    public function setSubscriberType(
        ?SubscriberType $subscriberType = null
    ): static {
        $this->subscriberType = $subscriberType;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSubscriberType(): static
    {
        $this->subscriberType = null;

        return $this;
    }

    /**
     * @return null|SubscriberTypeCode
     */
    public function getSubscriberTypeCode(): ?SubscriberTypeCode
    {
        return $this->subscriberTypeCode;
    }

    /**
     * @return SubscriberTypeCode
     */
    public function getSubscriberTypeCodeWithCreate(): SubscriberTypeCode
    {
        $this->subscriberTypeCode ??= new SubscriberTypeCode();

        return $this->subscriberTypeCode;
    }

    /**
     * @param  null|SubscriberTypeCode $subscriberTypeCode
     * @return static
     */
    public function setSubscriberTypeCode(
        ?SubscriberTypeCode $subscriberTypeCode = null
    ): static {
        $this->subscriberTypeCode = $subscriberTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSubscriberTypeCode(): static
    {
        $this->subscriberTypeCode = null;

        return $this;
    }

    /**
     * @return null|TotalDeliveredQuantity
     */
    public function getTotalDeliveredQuantity(): ?TotalDeliveredQuantity
    {
        return $this->totalDeliveredQuantity;
    }

    /**
     * @return TotalDeliveredQuantity
     */
    public function getTotalDeliveredQuantityWithCreate(): TotalDeliveredQuantity
    {
        $this->totalDeliveredQuantity ??= new TotalDeliveredQuantity();

        return $this->totalDeliveredQuantity;
    }

    /**
     * @param  null|TotalDeliveredQuantity $totalDeliveredQuantity
     * @return static
     */
    public function setTotalDeliveredQuantity(
        ?TotalDeliveredQuantity $totalDeliveredQuantity = null
    ): static {
        $this->totalDeliveredQuantity = $totalDeliveredQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTotalDeliveredQuantity(): static
    {
        $this->totalDeliveredQuantity = null;

        return $this;
    }

    /**
     * @return null|Address
     */
    public function getAddress(): ?Address
    {
        return $this->address;
    }

    /**
     * @return Address
     */
    public function getAddressWithCreate(): Address
    {
        $this->address ??= new Address();

        return $this->address;
    }

    /**
     * @param  null|Address $address
     * @return static
     */
    public function setAddress(
        ?Address $address = null
    ): static {
        $this->address = $address;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAddress(): static
    {
        $this->address = null;

        return $this;
    }

    /**
     * @return null|WebSiteAccess
     */
    public function getWebSiteAccess(): ?WebSiteAccess
    {
        return $this->webSiteAccess;
    }

    /**
     * @return WebSiteAccess
     */
    public function getWebSiteAccessWithCreate(): WebSiteAccess
    {
        $this->webSiteAccess ??= new WebSiteAccess();

        return $this->webSiteAccess;
    }

    /**
     * @param  null|WebSiteAccess $webSiteAccess
     * @return static
     */
    public function setWebSiteAccess(
        ?WebSiteAccess $webSiteAccess = null
    ): static {
        $this->webSiteAccess = $webSiteAccess;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetWebSiteAccess(): static
    {
        $this->webSiteAccess = null;

        return $this;
    }

    /**
     * @return null|array<UtilityMeter>
     */
    public function getUtilityMeter(): ?array
    {
        return $this->utilityMeter;
    }

    /**
     * @param  null|array<UtilityMeter> $utilityMeter
     * @return static
     */
    public function setUtilityMeter(
        ?array $utilityMeter = null
    ): static {
        $this->utilityMeter = $utilityMeter;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetUtilityMeter(): static
    {
        $this->utilityMeter = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearUtilityMeter(): static
    {
        $this->utilityMeter = [];

        return $this;
    }

    /**
     * @return null|UtilityMeter
     */
    public function firstUtilityMeter(): ?UtilityMeter
    {
        $utilityMeter = $this->utilityMeter ?? [];
        $utilityMeter = reset($utilityMeter);

        if (false === $utilityMeter) {
            return null;
        }

        return $utilityMeter;
    }

    /**
     * @return null|UtilityMeter
     */
    public function lastUtilityMeter(): ?UtilityMeter
    {
        $utilityMeter = $this->utilityMeter ?? [];
        $utilityMeter = end($utilityMeter);

        if (false === $utilityMeter) {
            return null;
        }

        return $utilityMeter;
    }

    /**
     * @param  UtilityMeter $utilityMeter
     * @return static
     */
    public function addToUtilityMeter(
        UtilityMeter $utilityMeter
    ): static {
        $this->utilityMeter[] = $utilityMeter;

        return $this;
    }

    /**
     * @return UtilityMeter
     */
    public function addToUtilityMeterWithCreate(): UtilityMeter
    {
        $this->addToUtilityMeter($utilityMeter = new UtilityMeter());

        return $utilityMeter;
    }

    /**
     * @param  UtilityMeter $utilityMeter
     * @return static
     */
    public function addOnceToUtilityMeter(
        UtilityMeter $utilityMeter
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->utilityMeter)) {
            $this->utilityMeter = [];
        }

        $this->utilityMeter[0] = $utilityMeter;

        return $this;
    }

    /**
     * @return UtilityMeter
     */
    public function addOnceToUtilityMeterWithCreate(): UtilityMeter
    {
        if (!InvoiceSuiteArrayUtils::is($this->utilityMeter)) {
            $this->utilityMeter = [];
        }

        if ([] === $this->utilityMeter) {
            $this->addOnceToUtilityMeter(new UtilityMeter());
        }

        return $this->utilityMeter[0];
    }
}
