<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\Description;
use horstoeko\invoicesuite\models\ubl\cbc\ID;
use horstoeko\invoicesuite\models\ubl\cbc\SubscriberID;
use horstoeko\invoicesuite\models\ubl\cbc\SubscriberType;
use horstoeko\invoicesuite\models\ubl\cbc\SubscriberTypeCode;
use horstoeko\invoicesuite\models\ubl\cbc\TotalDeliveredQuantity;

class ConsumptionPointType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ID")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\Description>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\Description>")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Description", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $description;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\SubscriberID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\SubscriberID")
     * @JMS\Expose
     * @JMS\SerializedName("SubscriberID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSubscriberID", setter="setSubscriberID")
     */
    private $subscriberID;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\SubscriberType|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\SubscriberType")
     * @JMS\Expose
     * @JMS\SerializedName("SubscriberType")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSubscriberType", setter="setSubscriberType")
     */
    private $subscriberType;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\SubscriberTypeCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\SubscriberTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("SubscriberTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSubscriberTypeCode", setter="setSubscriberTypeCode")
     */
    private $subscriberTypeCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\TotalDeliveredQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\TotalDeliveredQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("TotalDeliveredQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTotalDeliveredQuantity", setter="setTotalDeliveredQuantity")
     */
    private $totalDeliveredQuantity;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\Address|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\Address")
     * @JMS\Expose
     * @JMS\SerializedName("Address")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAddress", setter="setAddress")
     */
    private $address;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\WebSiteAccess|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\WebSiteAccess")
     * @JMS\Expose
     * @JMS\SerializedName("WebSiteAccess")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getWebSiteAccess", setter="setWebSiteAccess")
     */
    private $webSiteAccess;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\UtilityMeter>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\UtilityMeter>")
     * @JMS\Expose
     * @JMS\SerializedName("UtilityMeter")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="UtilityMeter", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getUtilityMeter", setter="setUtilityMeter")
     */
    private $utilityMeter;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ID|null
     */
    public function getID(): ?ID
    {
        return $this->iD;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ID
     */
    public function getIDWithCreate(): ID
    {
        $this->iD = is_null($this->iD) ? new ID() : $this->iD;

        return $this->iD;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ID|null $iD
     * @return self
     */
    public function setID(?ID $iD = null): self
    {
        $this->iD = $iD;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\Description>|null
     */
    public function getDescription(): ?array
    {
        return $this->description;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\Description>|null $description
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
    public function clearDescription(): self
    {
        $this->description = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Description $description
     * @return self
     */
    public function addToDescription(Description $description): self
    {
        $this->description[] = $description;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Description
     */
    public function addToDescriptionWithCreate(): Description
    {
        $this->addTodescription($description = new Description());

        return $description;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Description $description
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
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Description
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
     * @return \horstoeko\invoicesuite\models\ubl\cbc\SubscriberID|null
     */
    public function getSubscriberID(): ?SubscriberID
    {
        return $this->subscriberID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\SubscriberID
     */
    public function getSubscriberIDWithCreate(): SubscriberID
    {
        $this->subscriberID = is_null($this->subscriberID) ? new SubscriberID() : $this->subscriberID;

        return $this->subscriberID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\SubscriberID|null $subscriberID
     * @return self
     */
    public function setSubscriberID(?SubscriberID $subscriberID = null): self
    {
        $this->subscriberID = $subscriberID;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\SubscriberType|null
     */
    public function getSubscriberType(): ?SubscriberType
    {
        return $this->subscriberType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\SubscriberType
     */
    public function getSubscriberTypeWithCreate(): SubscriberType
    {
        $this->subscriberType = is_null($this->subscriberType) ? new SubscriberType() : $this->subscriberType;

        return $this->subscriberType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\SubscriberType|null $subscriberType
     * @return self
     */
    public function setSubscriberType(?SubscriberType $subscriberType = null): self
    {
        $this->subscriberType = $subscriberType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\SubscriberTypeCode|null
     */
    public function getSubscriberTypeCode(): ?SubscriberTypeCode
    {
        return $this->subscriberTypeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\SubscriberTypeCode
     */
    public function getSubscriberTypeCodeWithCreate(): SubscriberTypeCode
    {
        $this->subscriberTypeCode = is_null($this->subscriberTypeCode) ? new SubscriberTypeCode() : $this->subscriberTypeCode;

        return $this->subscriberTypeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\SubscriberTypeCode|null $subscriberTypeCode
     * @return self
     */
    public function setSubscriberTypeCode(?SubscriberTypeCode $subscriberTypeCode = null): self
    {
        $this->subscriberTypeCode = $subscriberTypeCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TotalDeliveredQuantity|null
     */
    public function getTotalDeliveredQuantity(): ?TotalDeliveredQuantity
    {
        return $this->totalDeliveredQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TotalDeliveredQuantity
     */
    public function getTotalDeliveredQuantityWithCreate(): TotalDeliveredQuantity
    {
        $this->totalDeliveredQuantity = is_null($this->totalDeliveredQuantity) ? new TotalDeliveredQuantity() : $this->totalDeliveredQuantity;

        return $this->totalDeliveredQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\TotalDeliveredQuantity|null $totalDeliveredQuantity
     * @return self
     */
    public function setTotalDeliveredQuantity(?TotalDeliveredQuantity $totalDeliveredQuantity = null): self
    {
        $this->totalDeliveredQuantity = $totalDeliveredQuantity;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Address|null
     */
    public function getAddress(): ?Address
    {
        return $this->address;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Address
     */
    public function getAddressWithCreate(): Address
    {
        $this->address = is_null($this->address) ? new Address() : $this->address;

        return $this->address;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Address|null $address
     * @return self
     */
    public function setAddress(?Address $address = null): self
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\WebSiteAccess|null
     */
    public function getWebSiteAccess(): ?WebSiteAccess
    {
        return $this->webSiteAccess;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\WebSiteAccess
     */
    public function getWebSiteAccessWithCreate(): WebSiteAccess
    {
        $this->webSiteAccess = is_null($this->webSiteAccess) ? new WebSiteAccess() : $this->webSiteAccess;

        return $this->webSiteAccess;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\WebSiteAccess|null $webSiteAccess
     * @return self
     */
    public function setWebSiteAccess(?WebSiteAccess $webSiteAccess = null): self
    {
        $this->webSiteAccess = $webSiteAccess;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\UtilityMeter>|null
     */
    public function getUtilityMeter(): ?array
    {
        return $this->utilityMeter;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\UtilityMeter>|null $utilityMeter
     * @return self
     */
    public function setUtilityMeter(?array $utilityMeter = null): self
    {
        $this->utilityMeter = $utilityMeter;

        return $this;
    }

    /**
     * @return self
     */
    public function clearUtilityMeter(): self
    {
        $this->utilityMeter = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\UtilityMeter $utilityMeter
     * @return self
     */
    public function addToUtilityMeter(UtilityMeter $utilityMeter): self
    {
        $this->utilityMeter[] = $utilityMeter;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\UtilityMeter
     */
    public function addToUtilityMeterWithCreate(): UtilityMeter
    {
        $this->addToutilityMeter($utilityMeter = new UtilityMeter());

        return $utilityMeter;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\UtilityMeter $utilityMeter
     * @return self
     */
    public function addOnceToUtilityMeter(UtilityMeter $utilityMeter): self
    {
        if (!is_array($this->utilityMeter)) {
            $this->utilityMeter = [];
        }

        $this->utilityMeter[0] = $utilityMeter;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\UtilityMeter
     */
    public function addOnceToUtilityMeterWithCreate(): UtilityMeter
    {
        if (!is_array($this->utilityMeter)) {
            $this->utilityMeter = [];
        }

        if ($this->utilityMeter === []) {
            $this->addOnceToutilityMeter(new UtilityMeter());
        }

        return $this->utilityMeter[0];
    }
}
