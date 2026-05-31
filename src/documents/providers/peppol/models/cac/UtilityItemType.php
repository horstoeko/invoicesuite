<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ConsumptionType;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ConsumptionTypeCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CurrentChargeType;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CurrentChargeTypeCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Description;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\OneTimeChargeType;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\OneTimeChargeTypeCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PackQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PackSizeNumeric;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SubscriberID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SubscriberType;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SubscriberTypeCode;
use JMS\Serializer\Annotation as JMS;

class UtilityItemType
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
     * @var null|PackQuantity
     */
    #[JMS\Accessor(getter: 'getPackQuantity', setter: 'setPackQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PackQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PackQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $packQuantity;

    /**
     * @var null|PackSizeNumeric
     */
    #[JMS\Accessor(getter: 'getPackSizeNumeric', setter: 'setPackSizeNumeric')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PackSizeNumeric')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PackSizeNumeric')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $packSizeNumeric;

    /**
     * @var null|ConsumptionType
     */
    #[JMS\Accessor(getter: 'getConsumptionType', setter: 'setConsumptionType')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ConsumptionType')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ConsumptionType')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $consumptionType;

    /**
     * @var null|ConsumptionTypeCode
     */
    #[JMS\Accessor(getter: 'getConsumptionTypeCode', setter: 'setConsumptionTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ConsumptionTypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ConsumptionTypeCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $consumptionTypeCode;

    /**
     * @var null|CurrentChargeType
     */
    #[JMS\Accessor(getter: 'getCurrentChargeType', setter: 'setCurrentChargeType')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CurrentChargeType')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CurrentChargeType')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $currentChargeType;

    /**
     * @var null|CurrentChargeTypeCode
     */
    #[JMS\Accessor(getter: 'getCurrentChargeTypeCode', setter: 'setCurrentChargeTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CurrentChargeTypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CurrentChargeTypeCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $currentChargeTypeCode;

    /**
     * @var null|OneTimeChargeType
     */
    #[JMS\Accessor(getter: 'getOneTimeChargeType', setter: 'setOneTimeChargeType')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('OneTimeChargeType')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\OneTimeChargeType')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $oneTimeChargeType;

    /**
     * @var null|OneTimeChargeTypeCode
     */
    #[JMS\Accessor(getter: 'getOneTimeChargeTypeCode', setter: 'setOneTimeChargeTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('OneTimeChargeTypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\OneTimeChargeTypeCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $oneTimeChargeTypeCode;

    /**
     * @var null|TaxCategory
     */
    #[JMS\Accessor(getter: 'getTaxCategory', setter: 'setTaxCategory')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TaxCategory')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\TaxCategory')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $taxCategory;

    /**
     * @var null|Contract
     */
    #[JMS\Accessor(getter: 'getContract', setter: 'setContract')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Contract')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\Contract')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
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
            $this->addOnceToDescription(new Description());
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
        $this->packQuantity ??= new PackQuantity();

        return $this->packQuantity;
    }

    /**
     * @param  null|PackQuantity $packQuantity
     * @return static
     */
    public function setPackQuantity(
        ?PackQuantity $packQuantity = null
    ): static {
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
        $this->packSizeNumeric ??= new PackSizeNumeric();

        return $this->packSizeNumeric;
    }

    /**
     * @param  null|PackSizeNumeric $packSizeNumeric
     * @return static
     */
    public function setPackSizeNumeric(
        ?PackSizeNumeric $packSizeNumeric = null
    ): static {
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
        $this->consumptionType ??= new ConsumptionType();

        return $this->consumptionType;
    }

    /**
     * @param  null|ConsumptionType $consumptionType
     * @return static
     */
    public function setConsumptionType(
        ?ConsumptionType $consumptionType = null
    ): static {
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
        $this->consumptionTypeCode ??= new ConsumptionTypeCode();

        return $this->consumptionTypeCode;
    }

    /**
     * @param  null|ConsumptionTypeCode $consumptionTypeCode
     * @return static
     */
    public function setConsumptionTypeCode(
        ?ConsumptionTypeCode $consumptionTypeCode = null
    ): static {
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
        $this->currentChargeType ??= new CurrentChargeType();

        return $this->currentChargeType;
    }

    /**
     * @param  null|CurrentChargeType $currentChargeType
     * @return static
     */
    public function setCurrentChargeType(
        ?CurrentChargeType $currentChargeType = null
    ): static {
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
        $this->currentChargeTypeCode ??= new CurrentChargeTypeCode();

        return $this->currentChargeTypeCode;
    }

    /**
     * @param  null|CurrentChargeTypeCode $currentChargeTypeCode
     * @return static
     */
    public function setCurrentChargeTypeCode(
        ?CurrentChargeTypeCode $currentChargeTypeCode = null
    ): static {
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
        $this->oneTimeChargeType ??= new OneTimeChargeType();

        return $this->oneTimeChargeType;
    }

    /**
     * @param  null|OneTimeChargeType $oneTimeChargeType
     * @return static
     */
    public function setOneTimeChargeType(
        ?OneTimeChargeType $oneTimeChargeType = null
    ): static {
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
        $this->oneTimeChargeTypeCode ??= new OneTimeChargeTypeCode();

        return $this->oneTimeChargeTypeCode;
    }

    /**
     * @param  null|OneTimeChargeTypeCode $oneTimeChargeTypeCode
     * @return static
     */
    public function setOneTimeChargeTypeCode(
        ?OneTimeChargeTypeCode $oneTimeChargeTypeCode = null
    ): static {
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
        $this->taxCategory ??= new TaxCategory();

        return $this->taxCategory;
    }

    /**
     * @param  null|TaxCategory $taxCategory
     * @return static
     */
    public function setTaxCategory(
        ?TaxCategory $taxCategory = null
    ): static {
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
        $this->contract ??= new Contract();

        return $this->contract;
    }

    /**
     * @param  null|Contract $contract
     * @return static
     */
    public function setContract(
        ?Contract $contract = null
    ): static {
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
