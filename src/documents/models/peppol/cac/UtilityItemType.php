<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ConsumptionType;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ConsumptionTypeCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\CurrentChargeType;
use horstoeko\invoicesuite\documents\models\peppol\cbc\CurrentChargeTypeCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Description;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\OneTimeChargeType;
use horstoeko\invoicesuite\documents\models\peppol\cbc\OneTimeChargeTypeCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\PackQuantity;
use horstoeko\invoicesuite\documents\models\peppol\cbc\PackSizeNumeric;
use horstoeko\invoicesuite\documents\models\peppol\cbc\SubscriberID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\SubscriberType;
use horstoeko\invoicesuite\documents\models\peppol\cbc\SubscriberTypeCode;
use JMS\Serializer\Annotation as JMS;

class UtilityItemType
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
     * @var null|PackQuantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\PackQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("PackQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPackQuantity", setter="setPackQuantity")
     */
    private $packQuantity;

    /**
     * @var null|PackSizeNumeric
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\PackSizeNumeric")
     * @JMS\Expose
     * @JMS\SerializedName("PackSizeNumeric")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPackSizeNumeric", setter="setPackSizeNumeric")
     */
    private $packSizeNumeric;

    /**
     * @var null|ConsumptionType
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ConsumptionType")
     * @JMS\Expose
     * @JMS\SerializedName("ConsumptionType")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getConsumptionType", setter="setConsumptionType")
     */
    private $consumptionType;

    /**
     * @var null|ConsumptionTypeCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ConsumptionTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("ConsumptionTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getConsumptionTypeCode", setter="setConsumptionTypeCode")
     */
    private $consumptionTypeCode;

    /**
     * @var null|CurrentChargeType
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\CurrentChargeType")
     * @JMS\Expose
     * @JMS\SerializedName("CurrentChargeType")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCurrentChargeType", setter="setCurrentChargeType")
     */
    private $currentChargeType;

    /**
     * @var null|CurrentChargeTypeCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\CurrentChargeTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("CurrentChargeTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCurrentChargeTypeCode", setter="setCurrentChargeTypeCode")
     */
    private $currentChargeTypeCode;

    /**
     * @var null|OneTimeChargeType
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\OneTimeChargeType")
     * @JMS\Expose
     * @JMS\SerializedName("OneTimeChargeType")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOneTimeChargeType", setter="setOneTimeChargeType")
     */
    private $oneTimeChargeType;

    /**
     * @var null|OneTimeChargeTypeCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\OneTimeChargeTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("OneTimeChargeTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOneTimeChargeTypeCode", setter="setOneTimeChargeTypeCode")
     */
    private $oneTimeChargeTypeCode;

    /**
     * @var null|TaxCategory
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\TaxCategory")
     * @JMS\Expose
     * @JMS\SerializedName("TaxCategory")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTaxCategory", setter="setTaxCategory")
     */
    private $taxCategory;

    /**
     * @var null|Contract
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\Contract")
     * @JMS\Expose
     * @JMS\SerializedName("Contract")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getContract", setter="setContract")
     */
    private $contract;

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
     * @return null|PackQuantity
     */
    public function getPackQuantity(): ?PackQuantity
    {
        return $this->packQuantity;
    }

    /**
     * @return PackQuantity
     */
    public function getPackQuantityWithCreate(): PackQuantity
    {
        $this->packQuantity = is_null($this->packQuantity) ? new PackQuantity() : $this->packQuantity;

        return $this->packQuantity;
    }

    /**
     * @param  null|PackQuantity $packQuantity
     * @return static
     */
    public function setPackQuantity(?PackQuantity $packQuantity = null): static
    {
        $this->packQuantity = $packQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPackQuantity(): static
    {
        $this->packQuantity = null;

        return $this;
    }

    /**
     * @return null|PackSizeNumeric
     */
    public function getPackSizeNumeric(): ?PackSizeNumeric
    {
        return $this->packSizeNumeric;
    }

    /**
     * @return PackSizeNumeric
     */
    public function getPackSizeNumericWithCreate(): PackSizeNumeric
    {
        $this->packSizeNumeric = is_null($this->packSizeNumeric) ? new PackSizeNumeric() : $this->packSizeNumeric;

        return $this->packSizeNumeric;
    }

    /**
     * @param  null|PackSizeNumeric $packSizeNumeric
     * @return static
     */
    public function setPackSizeNumeric(?PackSizeNumeric $packSizeNumeric = null): static
    {
        $this->packSizeNumeric = $packSizeNumeric;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPackSizeNumeric(): static
    {
        $this->packSizeNumeric = null;

        return $this;
    }

    /**
     * @return null|ConsumptionType
     */
    public function getConsumptionType(): ?ConsumptionType
    {
        return $this->consumptionType;
    }

    /**
     * @return ConsumptionType
     */
    public function getConsumptionTypeWithCreate(): ConsumptionType
    {
        $this->consumptionType = is_null($this->consumptionType) ? new ConsumptionType() : $this->consumptionType;

        return $this->consumptionType;
    }

    /**
     * @param  null|ConsumptionType $consumptionType
     * @return static
     */
    public function setConsumptionType(?ConsumptionType $consumptionType = null): static
    {
        $this->consumptionType = $consumptionType;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetConsumptionType(): static
    {
        $this->consumptionType = null;

        return $this;
    }

    /**
     * @return null|ConsumptionTypeCode
     */
    public function getConsumptionTypeCode(): ?ConsumptionTypeCode
    {
        return $this->consumptionTypeCode;
    }

    /**
     * @return ConsumptionTypeCode
     */
    public function getConsumptionTypeCodeWithCreate(): ConsumptionTypeCode
    {
        $this->consumptionTypeCode = is_null($this->consumptionTypeCode) ? new ConsumptionTypeCode() : $this->consumptionTypeCode;

        return $this->consumptionTypeCode;
    }

    /**
     * @param  null|ConsumptionTypeCode $consumptionTypeCode
     * @return static
     */
    public function setConsumptionTypeCode(?ConsumptionTypeCode $consumptionTypeCode = null): static
    {
        $this->consumptionTypeCode = $consumptionTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetConsumptionTypeCode(): static
    {
        $this->consumptionTypeCode = null;

        return $this;
    }

    /**
     * @return null|CurrentChargeType
     */
    public function getCurrentChargeType(): ?CurrentChargeType
    {
        return $this->currentChargeType;
    }

    /**
     * @return CurrentChargeType
     */
    public function getCurrentChargeTypeWithCreate(): CurrentChargeType
    {
        $this->currentChargeType = is_null($this->currentChargeType) ? new CurrentChargeType() : $this->currentChargeType;

        return $this->currentChargeType;
    }

    /**
     * @param  null|CurrentChargeType $currentChargeType
     * @return static
     */
    public function setCurrentChargeType(?CurrentChargeType $currentChargeType = null): static
    {
        $this->currentChargeType = $currentChargeType;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCurrentChargeType(): static
    {
        $this->currentChargeType = null;

        return $this;
    }

    /**
     * @return null|CurrentChargeTypeCode
     */
    public function getCurrentChargeTypeCode(): ?CurrentChargeTypeCode
    {
        return $this->currentChargeTypeCode;
    }

    /**
     * @return CurrentChargeTypeCode
     */
    public function getCurrentChargeTypeCodeWithCreate(): CurrentChargeTypeCode
    {
        $this->currentChargeTypeCode = is_null($this->currentChargeTypeCode) ? new CurrentChargeTypeCode() : $this->currentChargeTypeCode;

        return $this->currentChargeTypeCode;
    }

    /**
     * @param  null|CurrentChargeTypeCode $currentChargeTypeCode
     * @return static
     */
    public function setCurrentChargeTypeCode(?CurrentChargeTypeCode $currentChargeTypeCode = null): static
    {
        $this->currentChargeTypeCode = $currentChargeTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCurrentChargeTypeCode(): static
    {
        $this->currentChargeTypeCode = null;

        return $this;
    }

    /**
     * @return null|OneTimeChargeType
     */
    public function getOneTimeChargeType(): ?OneTimeChargeType
    {
        return $this->oneTimeChargeType;
    }

    /**
     * @return OneTimeChargeType
     */
    public function getOneTimeChargeTypeWithCreate(): OneTimeChargeType
    {
        $this->oneTimeChargeType = is_null($this->oneTimeChargeType) ? new OneTimeChargeType() : $this->oneTimeChargeType;

        return $this->oneTimeChargeType;
    }

    /**
     * @param  null|OneTimeChargeType $oneTimeChargeType
     * @return static
     */
    public function setOneTimeChargeType(?OneTimeChargeType $oneTimeChargeType = null): static
    {
        $this->oneTimeChargeType = $oneTimeChargeType;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetOneTimeChargeType(): static
    {
        $this->oneTimeChargeType = null;

        return $this;
    }

    /**
     * @return null|OneTimeChargeTypeCode
     */
    public function getOneTimeChargeTypeCode(): ?OneTimeChargeTypeCode
    {
        return $this->oneTimeChargeTypeCode;
    }

    /**
     * @return OneTimeChargeTypeCode
     */
    public function getOneTimeChargeTypeCodeWithCreate(): OneTimeChargeTypeCode
    {
        $this->oneTimeChargeTypeCode = is_null($this->oneTimeChargeTypeCode) ? new OneTimeChargeTypeCode() : $this->oneTimeChargeTypeCode;

        return $this->oneTimeChargeTypeCode;
    }

    /**
     * @param  null|OneTimeChargeTypeCode $oneTimeChargeTypeCode
     * @return static
     */
    public function setOneTimeChargeTypeCode(?OneTimeChargeTypeCode $oneTimeChargeTypeCode = null): static
    {
        $this->oneTimeChargeTypeCode = $oneTimeChargeTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetOneTimeChargeTypeCode(): static
    {
        $this->oneTimeChargeTypeCode = null;

        return $this;
    }

    /**
     * @return null|TaxCategory
     */
    public function getTaxCategory(): ?TaxCategory
    {
        return $this->taxCategory;
    }

    /**
     * @return TaxCategory
     */
    public function getTaxCategoryWithCreate(): TaxCategory
    {
        $this->taxCategory = is_null($this->taxCategory) ? new TaxCategory() : $this->taxCategory;

        return $this->taxCategory;
    }

    /**
     * @param  null|TaxCategory $taxCategory
     * @return static
     */
    public function setTaxCategory(?TaxCategory $taxCategory = null): static
    {
        $this->taxCategory = $taxCategory;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTaxCategory(): static
    {
        $this->taxCategory = null;

        return $this;
    }

    /**
     * @return null|Contract
     */
    public function getContract(): ?Contract
    {
        return $this->contract;
    }

    /**
     * @return Contract
     */
    public function getContractWithCreate(): Contract
    {
        $this->contract = is_null($this->contract) ? new Contract() : $this->contract;

        return $this->contract;
    }

    /**
     * @param  null|Contract $contract
     * @return static
     */
    public function setContract(?Contract $contract = null): static
    {
        $this->contract = $contract;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetContract(): static
    {
        $this->contract = null;

        return $this;
    }
}
