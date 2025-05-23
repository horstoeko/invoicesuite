<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\ConsumptionType;
use horstoeko\invoicesuite\models\ubl\cbc\ConsumptionTypeCode;
use horstoeko\invoicesuite\models\ubl\cbc\CurrentChargeType;
use horstoeko\invoicesuite\models\ubl\cbc\CurrentChargeTypeCode;
use horstoeko\invoicesuite\models\ubl\cbc\Description;
use horstoeko\invoicesuite\models\ubl\cbc\ID;
use horstoeko\invoicesuite\models\ubl\cbc\OneTimeChargeType;
use horstoeko\invoicesuite\models\ubl\cbc\OneTimeChargeTypeCode;
use horstoeko\invoicesuite\models\ubl\cbc\PackQuantity;
use horstoeko\invoicesuite\models\ubl\cbc\PackSizeNumeric;
use horstoeko\invoicesuite\models\ubl\cbc\SubscriberID;
use horstoeko\invoicesuite\models\ubl\cbc\SubscriberType;
use horstoeko\invoicesuite\models\ubl\cbc\SubscriberTypeCode;

class UtilityItemType
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
     * @var \horstoeko\invoicesuite\models\ubl\cbc\PackQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\PackQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("PackQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPackQuantity", setter="setPackQuantity")
     */
    private $packQuantity;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\PackSizeNumeric|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\PackSizeNumeric")
     * @JMS\Expose
     * @JMS\SerializedName("PackSizeNumeric")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPackSizeNumeric", setter="setPackSizeNumeric")
     */
    private $packSizeNumeric;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ConsumptionType|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ConsumptionType")
     * @JMS\Expose
     * @JMS\SerializedName("ConsumptionType")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getConsumptionType", setter="setConsumptionType")
     */
    private $consumptionType;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ConsumptionTypeCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ConsumptionTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("ConsumptionTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getConsumptionTypeCode", setter="setConsumptionTypeCode")
     */
    private $consumptionTypeCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\CurrentChargeType|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\CurrentChargeType")
     * @JMS\Expose
     * @JMS\SerializedName("CurrentChargeType")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCurrentChargeType", setter="setCurrentChargeType")
     */
    private $currentChargeType;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\CurrentChargeTypeCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\CurrentChargeTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("CurrentChargeTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCurrentChargeTypeCode", setter="setCurrentChargeTypeCode")
     */
    private $currentChargeTypeCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\OneTimeChargeType|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\OneTimeChargeType")
     * @JMS\Expose
     * @JMS\SerializedName("OneTimeChargeType")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOneTimeChargeType", setter="setOneTimeChargeType")
     */
    private $oneTimeChargeType;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\OneTimeChargeTypeCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\OneTimeChargeTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("OneTimeChargeTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOneTimeChargeTypeCode", setter="setOneTimeChargeTypeCode")
     */
    private $oneTimeChargeTypeCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\TaxCategory|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\TaxCategory")
     * @JMS\Expose
     * @JMS\SerializedName("TaxCategory")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTaxCategory", setter="setTaxCategory")
     */
    private $taxCategory;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\Contract|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\Contract")
     * @JMS\Expose
     * @JMS\SerializedName("Contract")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getContract", setter="setContract")
     */
    private $contract;

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
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PackQuantity|null
     */
    public function getPackQuantity(): ?PackQuantity
    {
        return $this->packQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PackQuantity
     */
    public function getPackQuantityWithCreate(): PackQuantity
    {
        $this->packQuantity = is_null($this->packQuantity) ? new PackQuantity() : $this->packQuantity;

        return $this->packQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\PackQuantity|null $packQuantity
     * @return self
     */
    public function setPackQuantity(?PackQuantity $packQuantity = null): self
    {
        $this->packQuantity = $packQuantity;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PackSizeNumeric|null
     */
    public function getPackSizeNumeric(): ?PackSizeNumeric
    {
        return $this->packSizeNumeric;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PackSizeNumeric
     */
    public function getPackSizeNumericWithCreate(): PackSizeNumeric
    {
        $this->packSizeNumeric = is_null($this->packSizeNumeric) ? new PackSizeNumeric() : $this->packSizeNumeric;

        return $this->packSizeNumeric;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\PackSizeNumeric|null $packSizeNumeric
     * @return self
     */
    public function setPackSizeNumeric(?PackSizeNumeric $packSizeNumeric = null): self
    {
        $this->packSizeNumeric = $packSizeNumeric;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ConsumptionType|null
     */
    public function getConsumptionType(): ?ConsumptionType
    {
        return $this->consumptionType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ConsumptionType
     */
    public function getConsumptionTypeWithCreate(): ConsumptionType
    {
        $this->consumptionType = is_null($this->consumptionType) ? new ConsumptionType() : $this->consumptionType;

        return $this->consumptionType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ConsumptionType|null $consumptionType
     * @return self
     */
    public function setConsumptionType(?ConsumptionType $consumptionType = null): self
    {
        $this->consumptionType = $consumptionType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ConsumptionTypeCode|null
     */
    public function getConsumptionTypeCode(): ?ConsumptionTypeCode
    {
        return $this->consumptionTypeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ConsumptionTypeCode
     */
    public function getConsumptionTypeCodeWithCreate(): ConsumptionTypeCode
    {
        $this->consumptionTypeCode = is_null($this->consumptionTypeCode) ? new ConsumptionTypeCode() : $this->consumptionTypeCode;

        return $this->consumptionTypeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ConsumptionTypeCode|null $consumptionTypeCode
     * @return self
     */
    public function setConsumptionTypeCode(?ConsumptionTypeCode $consumptionTypeCode = null): self
    {
        $this->consumptionTypeCode = $consumptionTypeCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\CurrentChargeType|null
     */
    public function getCurrentChargeType(): ?CurrentChargeType
    {
        return $this->currentChargeType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\CurrentChargeType
     */
    public function getCurrentChargeTypeWithCreate(): CurrentChargeType
    {
        $this->currentChargeType = is_null($this->currentChargeType) ? new CurrentChargeType() : $this->currentChargeType;

        return $this->currentChargeType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\CurrentChargeType|null $currentChargeType
     * @return self
     */
    public function setCurrentChargeType(?CurrentChargeType $currentChargeType = null): self
    {
        $this->currentChargeType = $currentChargeType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\CurrentChargeTypeCode|null
     */
    public function getCurrentChargeTypeCode(): ?CurrentChargeTypeCode
    {
        return $this->currentChargeTypeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\CurrentChargeTypeCode
     */
    public function getCurrentChargeTypeCodeWithCreate(): CurrentChargeTypeCode
    {
        $this->currentChargeTypeCode = is_null($this->currentChargeTypeCode) ? new CurrentChargeTypeCode() : $this->currentChargeTypeCode;

        return $this->currentChargeTypeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\CurrentChargeTypeCode|null $currentChargeTypeCode
     * @return self
     */
    public function setCurrentChargeTypeCode(?CurrentChargeTypeCode $currentChargeTypeCode = null): self
    {
        $this->currentChargeTypeCode = $currentChargeTypeCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\OneTimeChargeType|null
     */
    public function getOneTimeChargeType(): ?OneTimeChargeType
    {
        return $this->oneTimeChargeType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\OneTimeChargeType
     */
    public function getOneTimeChargeTypeWithCreate(): OneTimeChargeType
    {
        $this->oneTimeChargeType = is_null($this->oneTimeChargeType) ? new OneTimeChargeType() : $this->oneTimeChargeType;

        return $this->oneTimeChargeType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\OneTimeChargeType|null $oneTimeChargeType
     * @return self
     */
    public function setOneTimeChargeType(?OneTimeChargeType $oneTimeChargeType = null): self
    {
        $this->oneTimeChargeType = $oneTimeChargeType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\OneTimeChargeTypeCode|null
     */
    public function getOneTimeChargeTypeCode(): ?OneTimeChargeTypeCode
    {
        return $this->oneTimeChargeTypeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\OneTimeChargeTypeCode
     */
    public function getOneTimeChargeTypeCodeWithCreate(): OneTimeChargeTypeCode
    {
        $this->oneTimeChargeTypeCode = is_null($this->oneTimeChargeTypeCode) ? new OneTimeChargeTypeCode() : $this->oneTimeChargeTypeCode;

        return $this->oneTimeChargeTypeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\OneTimeChargeTypeCode|null $oneTimeChargeTypeCode
     * @return self
     */
    public function setOneTimeChargeTypeCode(?OneTimeChargeTypeCode $oneTimeChargeTypeCode = null): self
    {
        $this->oneTimeChargeTypeCode = $oneTimeChargeTypeCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TaxCategory|null
     */
    public function getTaxCategory(): ?TaxCategory
    {
        return $this->taxCategory;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\TaxCategory
     */
    public function getTaxCategoryWithCreate(): TaxCategory
    {
        $this->taxCategory = is_null($this->taxCategory) ? new TaxCategory() : $this->taxCategory;

        return $this->taxCategory;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\TaxCategory|null $taxCategory
     * @return self
     */
    public function setTaxCategory(?TaxCategory $taxCategory = null): self
    {
        $this->taxCategory = $taxCategory;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Contract|null
     */
    public function getContract(): ?Contract
    {
        return $this->contract;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Contract
     */
    public function getContractWithCreate(): Contract
    {
        $this->contract = is_null($this->contract) ? new Contract() : $this->contract;

        return $this->contract;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Contract|null $contract
     * @return self
     */
    public function setContract(?Contract $contract = null): self
    {
        $this->contract = $contract;

        return $this;
    }
}
