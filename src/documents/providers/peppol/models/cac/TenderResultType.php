<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\AdvertisementAmount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Description;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\HigherTenderAmount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LowerTenderAmount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ReceivedElectronicTenderQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ReceivedForeignTenderQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ReceivedTenderQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TenderResultCode;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use JMS\Serializer\Annotation as JMS;

class TenderResultType
{
    use HandlesObjectFlags;

    /**
     * @var null|TenderResultCode
     */
    #[JMS\Accessor(getter: 'getTenderResultCode', setter: 'setTenderResultCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TenderResultCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TenderResultCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $tenderResultCode;

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
     * @var null|AdvertisementAmount
     */
    #[JMS\Accessor(getter: 'getAdvertisementAmount', setter: 'setAdvertisementAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('AdvertisementAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\AdvertisementAmount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $advertisementAmount;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getAwardDate', setter: 'setAwardDate')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('AwardDate')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $awardDate;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getAwardTime', setter: 'setAwardTime')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('AwardTime')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $awardTime;

    /**
     * @var null|ReceivedTenderQuantity
     */
    #[JMS\Accessor(getter: 'getReceivedTenderQuantity', setter: 'setReceivedTenderQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ReceivedTenderQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ReceivedTenderQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $receivedTenderQuantity;

    /**
     * @var null|LowerTenderAmount
     */
    #[JMS\Accessor(getter: 'getLowerTenderAmount', setter: 'setLowerTenderAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('LowerTenderAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LowerTenderAmount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $lowerTenderAmount;

    /**
     * @var null|HigherTenderAmount
     */
    #[JMS\Accessor(getter: 'getHigherTenderAmount', setter: 'setHigherTenderAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('HigherTenderAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\HigherTenderAmount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $higherTenderAmount;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getStartDate', setter: 'setStartDate')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('StartDate')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $startDate;

    /**
     * @var null|ReceivedElectronicTenderQuantity
     */
    #[JMS\Accessor(getter: 'getReceivedElectronicTenderQuantity', setter: 'setReceivedElectronicTenderQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ReceivedElectronicTenderQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ReceivedElectronicTenderQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $receivedElectronicTenderQuantity;

    /**
     * @var null|ReceivedForeignTenderQuantity
     */
    #[JMS\Accessor(getter: 'getReceivedForeignTenderQuantity', setter: 'setReceivedForeignTenderQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ReceivedForeignTenderQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ReceivedForeignTenderQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $receivedForeignTenderQuantity;

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
     * @var null|AwardedTenderedProject
     */
    #[JMS\Accessor(getter: 'getAwardedTenderedProject', setter: 'setAwardedTenderedProject')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('AwardedTenderedProject')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\AwardedTenderedProject')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $awardedTenderedProject;

    /**
     * @var null|ContractFormalizationPeriod
     */
    #[JMS\Accessor(getter: 'getContractFormalizationPeriod', setter: 'setContractFormalizationPeriod')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ContractFormalizationPeriod')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\ContractFormalizationPeriod')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $contractFormalizationPeriod;

    /**
     * @var null|array<SubcontractTerms>
     */
    #[JMS\Accessor(getter: 'getSubcontractTerms', setter: 'setSubcontractTerms')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SubcontractTerms')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\SubcontractTerms>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'SubcontractTerms', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $subcontractTerms;

    /**
     * @var null|array<WinningParty>
     */
    #[JMS\Accessor(getter: 'getWinningParty', setter: 'setWinningParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('WinningParty')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\WinningParty>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'WinningParty', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $winningParty;

    /**
     * @return null|TenderResultCode
     */
    public function getTenderResultCode(): ?TenderResultCode
    {
        return $this->tenderResultCode;
    }

    /**
     * @return TenderResultCode
     */
    public function getTenderResultCodeWithCreate(): TenderResultCode
    {
        $this->tenderResultCode ??= new TenderResultCode();

        return $this->tenderResultCode;
    }

    /**
     * @param  null|TenderResultCode $tenderResultCode
     * @return static
     */
    public function setTenderResultCode(
        ?TenderResultCode $tenderResultCode = null
    ): static {
        $this->tenderResultCode = $tenderResultCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTenderResultCode(): static
    {
        $this->tenderResultCode = null;

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
     * @return null|AdvertisementAmount
     */
    public function getAdvertisementAmount(): ?AdvertisementAmount
    {
        return $this->advertisementAmount;
    }

    /**
     * @return AdvertisementAmount
     */
    public function getAdvertisementAmountWithCreate(): AdvertisementAmount
    {
        $this->advertisementAmount ??= new AdvertisementAmount();

        return $this->advertisementAmount;
    }

    /**
     * @param  null|AdvertisementAmount $advertisementAmount
     * @return static
     */
    public function setAdvertisementAmount(
        ?AdvertisementAmount $advertisementAmount = null
    ): static {
        $this->advertisementAmount = $advertisementAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAdvertisementAmount(): static
    {
        $this->advertisementAmount = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getAwardDate(): ?DateTimeInterface
    {
        return $this->awardDate;
    }

    /**
     * @param  null|DateTimeInterface $awardDate
     * @return static
     */
    public function setAwardDate(
        ?DateTimeInterface $awardDate = null
    ): static {
        $this->awardDate = $awardDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAwardDate(): static
    {
        $this->awardDate = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getAwardTime(): ?DateTimeInterface
    {
        return $this->awardTime;
    }

    /**
     * @param  null|DateTimeInterface $awardTime
     * @return static
     */
    public function setAwardTime(
        ?DateTimeInterface $awardTime = null
    ): static {
        $this->awardTime = $awardTime;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAwardTime(): static
    {
        $this->awardTime = null;

        return $this;
    }

    /**
     * @return null|ReceivedTenderQuantity
     */
    public function getReceivedTenderQuantity(): ?ReceivedTenderQuantity
    {
        return $this->receivedTenderQuantity;
    }

    /**
     * @return ReceivedTenderQuantity
     */
    public function getReceivedTenderQuantityWithCreate(): ReceivedTenderQuantity
    {
        $this->receivedTenderQuantity ??= new ReceivedTenderQuantity();

        return $this->receivedTenderQuantity;
    }

    /**
     * @param  null|ReceivedTenderQuantity $receivedTenderQuantity
     * @return static
     */
    public function setReceivedTenderQuantity(
        ?ReceivedTenderQuantity $receivedTenderQuantity = null
    ): static {
        $this->receivedTenderQuantity = $receivedTenderQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetReceivedTenderQuantity(): static
    {
        $this->receivedTenderQuantity = null;

        return $this;
    }

    /**
     * @return null|LowerTenderAmount
     */
    public function getLowerTenderAmount(): ?LowerTenderAmount
    {
        return $this->lowerTenderAmount;
    }

    /**
     * @return LowerTenderAmount
     */
    public function getLowerTenderAmountWithCreate(): LowerTenderAmount
    {
        $this->lowerTenderAmount ??= new LowerTenderAmount();

        return $this->lowerTenderAmount;
    }

    /**
     * @param  null|LowerTenderAmount $lowerTenderAmount
     * @return static
     */
    public function setLowerTenderAmount(
        ?LowerTenderAmount $lowerTenderAmount = null
    ): static {
        $this->lowerTenderAmount = $lowerTenderAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLowerTenderAmount(): static
    {
        $this->lowerTenderAmount = null;

        return $this;
    }

    /**
     * @return null|HigherTenderAmount
     */
    public function getHigherTenderAmount(): ?HigherTenderAmount
    {
        return $this->higherTenderAmount;
    }

    /**
     * @return HigherTenderAmount
     */
    public function getHigherTenderAmountWithCreate(): HigherTenderAmount
    {
        $this->higherTenderAmount ??= new HigherTenderAmount();

        return $this->higherTenderAmount;
    }

    /**
     * @param  null|HigherTenderAmount $higherTenderAmount
     * @return static
     */
    public function setHigherTenderAmount(
        ?HigherTenderAmount $higherTenderAmount = null
    ): static {
        $this->higherTenderAmount = $higherTenderAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetHigherTenderAmount(): static
    {
        $this->higherTenderAmount = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getStartDate(): ?DateTimeInterface
    {
        return $this->startDate;
    }

    /**
     * @param  null|DateTimeInterface $startDate
     * @return static
     */
    public function setStartDate(
        ?DateTimeInterface $startDate = null
    ): static {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetStartDate(): static
    {
        $this->startDate = null;

        return $this;
    }

    /**
     * @return null|ReceivedElectronicTenderQuantity
     */
    public function getReceivedElectronicTenderQuantity(): ?ReceivedElectronicTenderQuantity
    {
        return $this->receivedElectronicTenderQuantity;
    }

    /**
     * @return ReceivedElectronicTenderQuantity
     */
    public function getReceivedElectronicTenderQuantityWithCreate(): ReceivedElectronicTenderQuantity
    {
        $this->receivedElectronicTenderQuantity ??= new ReceivedElectronicTenderQuantity();

        return $this->receivedElectronicTenderQuantity;
    }

    /**
     * @param  null|ReceivedElectronicTenderQuantity $receivedElectronicTenderQuantity
     * @return static
     */
    public function setReceivedElectronicTenderQuantity(
        ?ReceivedElectronicTenderQuantity $receivedElectronicTenderQuantity = null,
    ): static {
        $this->receivedElectronicTenderQuantity = $receivedElectronicTenderQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetReceivedElectronicTenderQuantity(): static
    {
        $this->receivedElectronicTenderQuantity = null;

        return $this;
    }

    /**
     * @return null|ReceivedForeignTenderQuantity
     */
    public function getReceivedForeignTenderQuantity(): ?ReceivedForeignTenderQuantity
    {
        return $this->receivedForeignTenderQuantity;
    }

    /**
     * @return ReceivedForeignTenderQuantity
     */
    public function getReceivedForeignTenderQuantityWithCreate(): ReceivedForeignTenderQuantity
    {
        $this->receivedForeignTenderQuantity ??= new ReceivedForeignTenderQuantity();

        return $this->receivedForeignTenderQuantity;
    }

    /**
     * @param  null|ReceivedForeignTenderQuantity $receivedForeignTenderQuantity
     * @return static
     */
    public function setReceivedForeignTenderQuantity(
        ?ReceivedForeignTenderQuantity $receivedForeignTenderQuantity = null,
    ): static {
        $this->receivedForeignTenderQuantity = $receivedForeignTenderQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetReceivedForeignTenderQuantity(): static
    {
        $this->receivedForeignTenderQuantity = null;

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

    /**
     * @return null|AwardedTenderedProject
     */
    public function getAwardedTenderedProject(): ?AwardedTenderedProject
    {
        return $this->awardedTenderedProject;
    }

    /**
     * @return AwardedTenderedProject
     */
    public function getAwardedTenderedProjectWithCreate(): AwardedTenderedProject
    {
        $this->awardedTenderedProject ??= new AwardedTenderedProject();

        return $this->awardedTenderedProject;
    }

    /**
     * @param  null|AwardedTenderedProject $awardedTenderedProject
     * @return static
     */
    public function setAwardedTenderedProject(
        ?AwardedTenderedProject $awardedTenderedProject = null
    ): static {
        $this->awardedTenderedProject = $awardedTenderedProject;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAwardedTenderedProject(): static
    {
        $this->awardedTenderedProject = null;

        return $this;
    }

    /**
     * @return null|ContractFormalizationPeriod
     */
    public function getContractFormalizationPeriod(): ?ContractFormalizationPeriod
    {
        return $this->contractFormalizationPeriod;
    }

    /**
     * @return ContractFormalizationPeriod
     */
    public function getContractFormalizationPeriodWithCreate(): ContractFormalizationPeriod
    {
        $this->contractFormalizationPeriod ??= new ContractFormalizationPeriod();

        return $this->contractFormalizationPeriod;
    }

    /**
     * @param  null|ContractFormalizationPeriod $contractFormalizationPeriod
     * @return static
     */
    public function setContractFormalizationPeriod(
        ?ContractFormalizationPeriod $contractFormalizationPeriod = null,
    ): static {
        $this->contractFormalizationPeriod = $contractFormalizationPeriod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetContractFormalizationPeriod(): static
    {
        $this->contractFormalizationPeriod = null;

        return $this;
    }

    /**
     * @return null|array<SubcontractTerms>
     */
    public function getSubcontractTerms(): ?array
    {
        return $this->subcontractTerms;
    }

    /**
     * @param  null|array<SubcontractTerms> $subcontractTerms
     * @return static
     */
    public function setSubcontractTerms(
        ?array $subcontractTerms = null
    ): static {
        $this->subcontractTerms = $subcontractTerms;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSubcontractTerms(): static
    {
        $this->subcontractTerms = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearSubcontractTerms(): static
    {
        $this->subcontractTerms = [];

        return $this;
    }

    /**
     * @return null|SubcontractTerms
     */
    public function firstSubcontractTerms(): ?SubcontractTerms
    {
        $subcontractTerms = $this->subcontractTerms ?? [];
        $subcontractTerms = reset($subcontractTerms);

        if (false === $subcontractTerms) {
            return null;
        }

        return $subcontractTerms;
    }

    /**
     * @return null|SubcontractTerms
     */
    public function lastSubcontractTerms(): ?SubcontractTerms
    {
        $subcontractTerms = $this->subcontractTerms ?? [];
        $subcontractTerms = end($subcontractTerms);

        if (false === $subcontractTerms) {
            return null;
        }

        return $subcontractTerms;
    }

    /**
     * @param  SubcontractTerms $subcontractTerms
     * @return static
     */
    public function addToSubcontractTerms(
        SubcontractTerms $subcontractTerms
    ): static {
        $this->subcontractTerms[] = $subcontractTerms;

        return $this;
    }

    /**
     * @return SubcontractTerms
     */
    public function addToSubcontractTermsWithCreate(): SubcontractTerms
    {
        $this->addToSubcontractTerms($subcontractTerms = new SubcontractTerms());

        return $subcontractTerms;
    }

    /**
     * @param  SubcontractTerms $subcontractTerms
     * @return static
     */
    public function addOnceToSubcontractTerms(
        SubcontractTerms $subcontractTerms
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->subcontractTerms)) {
            $this->subcontractTerms = [];
        }

        $this->subcontractTerms[0] = $subcontractTerms;

        return $this;
    }

    /**
     * @return SubcontractTerms
     */
    public function addOnceToSubcontractTermsWithCreate(): SubcontractTerms
    {
        if (!InvoiceSuiteArrayUtils::is($this->subcontractTerms)) {
            $this->subcontractTerms = [];
        }

        if ([] === $this->subcontractTerms) {
            $this->addOnceToSubcontractTerms(new SubcontractTerms());
        }

        return $this->subcontractTerms[0];
    }

    /**
     * @return null|array<WinningParty>
     */
    public function getWinningParty(): ?array
    {
        return $this->winningParty;
    }

    /**
     * @param  null|array<WinningParty> $winningParty
     * @return static
     */
    public function setWinningParty(
        ?array $winningParty = null
    ): static {
        $this->winningParty = $winningParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetWinningParty(): static
    {
        $this->winningParty = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearWinningParty(): static
    {
        $this->winningParty = [];

        return $this;
    }

    /**
     * @return null|WinningParty
     */
    public function firstWinningParty(): ?WinningParty
    {
        $winningParty = $this->winningParty ?? [];
        $winningParty = reset($winningParty);

        if (false === $winningParty) {
            return null;
        }

        return $winningParty;
    }

    /**
     * @return null|WinningParty
     */
    public function lastWinningParty(): ?WinningParty
    {
        $winningParty = $this->winningParty ?? [];
        $winningParty = end($winningParty);

        if (false === $winningParty) {
            return null;
        }

        return $winningParty;
    }

    /**
     * @param  WinningParty $winningParty
     * @return static
     */
    public function addToWinningParty(
        WinningParty $winningParty
    ): static {
        $this->winningParty[] = $winningParty;

        return $this;
    }

    /**
     * @return WinningParty
     */
    public function addToWinningPartyWithCreate(): WinningParty
    {
        $this->addToWinningParty($winningParty = new WinningParty());

        return $winningParty;
    }

    /**
     * @param  WinningParty $winningParty
     * @return static
     */
    public function addOnceToWinningParty(
        WinningParty $winningParty
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->winningParty)) {
            $this->winningParty = [];
        }

        $this->winningParty[0] = $winningParty;

        return $this;
    }

    /**
     * @return WinningParty
     */
    public function addOnceToWinningPartyWithCreate(): WinningParty
    {
        if (!InvoiceSuiteArrayUtils::is($this->winningParty)) {
            $this->winningParty = [];
        }

        if ([] === $this->winningParty) {
            $this->addOnceToWinningParty(new WinningParty());
        }

        return $this->winningParty[0];
    }
}
