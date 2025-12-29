<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Description;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\SubscriberID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\SubscriberType;
use horstoeko\invoicesuite\documents\models\peppol\cbc\SubscriberTypeCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\TotalDeliveredQuantity;
use JMS\Serializer\Annotation as JMS;

class ConsumptionPointType
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
     * @var null|SubscriberID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\SubscriberID")
     * @JMS\Expose
     * @JMS\SerializedName("SubscriberID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSubscriberID", setter="setSubscriberID")
     */
    private $subscriberID;

    /**
     * @var null|SubscriberType
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\SubscriberType")
     * @JMS\Expose
     * @JMS\SerializedName("SubscriberType")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSubscriberType", setter="setSubscriberType")
     */
    private $subscriberType;

    /**
     * @var null|SubscriberTypeCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\SubscriberTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("SubscriberTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSubscriberTypeCode", setter="setSubscriberTypeCode")
     */
    private $subscriberTypeCode;

    /**
     * @var null|TotalDeliveredQuantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\TotalDeliveredQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("TotalDeliveredQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTotalDeliveredQuantity", setter="setTotalDeliveredQuantity")
     */
    private $totalDeliveredQuantity;

    /**
     * @var null|Address
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\Address")
     * @JMS\Expose
     * @JMS\SerializedName("Address")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAddress", setter="setAddress")
     */
    private $address;

    /**
     * @var null|WebSiteAccess
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\WebSiteAccess")
     * @JMS\Expose
     * @JMS\SerializedName("WebSiteAccess")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getWebSiteAccess", setter="setWebSiteAccess")
     */
    private $webSiteAccess;

    /**
     * @var null|array<UtilityMeter>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\UtilityMeter>")
     * @JMS\Expose
     * @JMS\SerializedName("UtilityMeter")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="UtilityMeter", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getUtilityMeter", setter="setUtilityMeter")
     */
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
        $this->subscriberID = is_null($this->subscriberID) ? new SubscriberID() : $this->subscriberID;

        return $this->subscriberID;
    }

    /**
     * @param  null|SubscriberID $subscriberID
     * @return static
     */
    public function setSubscriberID(?SubscriberID $subscriberID = null): static
    {
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
        $this->subscriberType = is_null($this->subscriberType) ? new SubscriberType() : $this->subscriberType;

        return $this->subscriberType;
    }

    /**
     * @param  null|SubscriberType $subscriberType
     * @return static
     */
    public function setSubscriberType(?SubscriberType $subscriberType = null): static
    {
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
        $this->subscriberTypeCode = is_null($this->subscriberTypeCode) ? new SubscriberTypeCode() : $this->subscriberTypeCode;

        return $this->subscriberTypeCode;
    }

    /**
     * @param  null|SubscriberTypeCode $subscriberTypeCode
     * @return static
     */
    public function setSubscriberTypeCode(?SubscriberTypeCode $subscriberTypeCode = null): static
    {
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
        $this->totalDeliveredQuantity = is_null($this->totalDeliveredQuantity) ? new TotalDeliveredQuantity() : $this->totalDeliveredQuantity;

        return $this->totalDeliveredQuantity;
    }

    /**
     * @param  null|TotalDeliveredQuantity $totalDeliveredQuantity
     * @return static
     */
    public function setTotalDeliveredQuantity(?TotalDeliveredQuantity $totalDeliveredQuantity = null): static
    {
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
        $this->address = is_null($this->address) ? new Address() : $this->address;

        return $this->address;
    }

    /**
     * @param  null|Address $address
     * @return static
     */
    public function setAddress(?Address $address = null): static
    {
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
        $this->webSiteAccess = is_null($this->webSiteAccess) ? new WebSiteAccess() : $this->webSiteAccess;

        return $this->webSiteAccess;
    }

    /**
     * @param  null|WebSiteAccess $webSiteAccess
     * @return static
     */
    public function setWebSiteAccess(?WebSiteAccess $webSiteAccess = null): static
    {
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
    public function setUtilityMeter(?array $utilityMeter = null): static
    {
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
    public function addToUtilityMeter(UtilityMeter $utilityMeter): static
    {
        $this->utilityMeter[] = $utilityMeter;

        return $this;
    }

    /**
     * @return UtilityMeter
     */
    public function addToUtilityMeterWithCreate(): UtilityMeter
    {
        $this->addToutilityMeter($utilityMeter = new UtilityMeter());

        return $utilityMeter;
    }

    /**
     * @param  UtilityMeter $utilityMeter
     * @return static
     */
    public function addOnceToUtilityMeter(UtilityMeter $utilityMeter): static
    {
        if (!is_array($this->utilityMeter)) {
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
        if (!is_array($this->utilityMeter)) {
            $this->utilityMeter = [];
        }

        if ([] === $this->utilityMeter) {
            $this->addOnceToutilityMeter(new UtilityMeter());
        }

        return $this->utilityMeter[0];
    }
}
