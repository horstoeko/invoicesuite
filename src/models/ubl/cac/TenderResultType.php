<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\AdvertisementAmount;
use horstoeko\invoicesuite\models\ubl\cbc\Description;
use horstoeko\invoicesuite\models\ubl\cbc\HigherTenderAmount;
use horstoeko\invoicesuite\models\ubl\cbc\LowerTenderAmount;
use horstoeko\invoicesuite\models\ubl\cbc\ReceivedElectronicTenderQuantity;
use horstoeko\invoicesuite\models\ubl\cbc\ReceivedForeignTenderQuantity;
use horstoeko\invoicesuite\models\ubl\cbc\ReceivedTenderQuantity;
use horstoeko\invoicesuite\models\ubl\cbc\TenderResultCode;

class TenderResultType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\TenderResultCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\TenderResultCode")
     * @JMS\Expose
     * @JMS\SerializedName("TenderResultCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTenderResultCode", setter="setTenderResultCode")
     */
    private $tenderResultCode;

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
     * @var \horstoeko\invoicesuite\models\ubl\cbc\AdvertisementAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\AdvertisementAmount")
     * @JMS\Expose
     * @JMS\SerializedName("AdvertisementAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAdvertisementAmount", setter="setAdvertisementAmount")
     */
    private $advertisementAmount;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("AwardDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAwardDate", setter="setAwardDate")
     */
    private $awardDate;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time")
     * @JMS\Expose
     * @JMS\SerializedName("AwardTime")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAwardTime", setter="setAwardTime")
     */
    private $awardTime;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ReceivedTenderQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ReceivedTenderQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("ReceivedTenderQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getReceivedTenderQuantity", setter="setReceivedTenderQuantity")
     */
    private $receivedTenderQuantity;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\LowerTenderAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\LowerTenderAmount")
     * @JMS\Expose
     * @JMS\SerializedName("LowerTenderAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLowerTenderAmount", setter="setLowerTenderAmount")
     */
    private $lowerTenderAmount;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\HigherTenderAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\HigherTenderAmount")
     * @JMS\Expose
     * @JMS\SerializedName("HigherTenderAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getHigherTenderAmount", setter="setHigherTenderAmount")
     */
    private $higherTenderAmount;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("StartDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getStartDate", setter="setStartDate")
     */
    private $startDate;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ReceivedElectronicTenderQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ReceivedElectronicTenderQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("ReceivedElectronicTenderQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getReceivedElectronicTenderQuantity", setter="setReceivedElectronicTenderQuantity")
     */
    private $receivedElectronicTenderQuantity;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ReceivedForeignTenderQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ReceivedForeignTenderQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("ReceivedForeignTenderQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getReceivedForeignTenderQuantity", setter="setReceivedForeignTenderQuantity")
     */
    private $receivedForeignTenderQuantity;

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
     * @var \horstoeko\invoicesuite\models\ubl\cac\AwardedTenderedProject|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\AwardedTenderedProject")
     * @JMS\Expose
     * @JMS\SerializedName("AwardedTenderedProject")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAwardedTenderedProject", setter="setAwardedTenderedProject")
     */
    private $awardedTenderedProject;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\ContractFormalizationPeriod|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\ContractFormalizationPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("ContractFormalizationPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getContractFormalizationPeriod", setter="setContractFormalizationPeriod")
     */
    private $contractFormalizationPeriod;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\SubcontractTerms>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\SubcontractTerms>")
     * @JMS\Expose
     * @JMS\SerializedName("SubcontractTerms")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="SubcontractTerms", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getSubcontractTerms", setter="setSubcontractTerms")
     */
    private $subcontractTerms;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\WinningParty>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\WinningParty>")
     * @JMS\Expose
     * @JMS\SerializedName("WinningParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="WinningParty", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getWinningParty", setter="setWinningParty")
     */
    private $winningParty;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TenderResultCode|null
     */
    public function getTenderResultCode(): ?TenderResultCode
    {
        return $this->tenderResultCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TenderResultCode
     */
    public function getTenderResultCodeWithCreate(): TenderResultCode
    {
        $this->tenderResultCode = is_null($this->tenderResultCode) ? new TenderResultCode() : $this->tenderResultCode;

        return $this->tenderResultCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\TenderResultCode|null $tenderResultCode
     * @return self
     */
    public function setTenderResultCode(?TenderResultCode $tenderResultCode = null): self
    {
        $this->tenderResultCode = $tenderResultCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTenderResultCode(): self
    {
        $this->tenderResultCode = null;

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
    public function unsetDescription(): self
    {
        $this->description = null;

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
     * @return \horstoeko\invoicesuite\models\ubl\cbc\AdvertisementAmount|null
     */
    public function getAdvertisementAmount(): ?AdvertisementAmount
    {
        return $this->advertisementAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\AdvertisementAmount
     */
    public function getAdvertisementAmountWithCreate(): AdvertisementAmount
    {
        $this->advertisementAmount = is_null($this->advertisementAmount) ? new AdvertisementAmount() : $this->advertisementAmount;

        return $this->advertisementAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\AdvertisementAmount|null $advertisementAmount
     * @return self
     */
    public function setAdvertisementAmount(?AdvertisementAmount $advertisementAmount = null): self
    {
        $this->advertisementAmount = $advertisementAmount;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetAdvertisementAmount(): self
    {
        $this->advertisementAmount = null;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getAwardDate(): ?\DateTimeInterface
    {
        return $this->awardDate;
    }

    /**
     * @param \DateTimeInterface|null $awardDate
     * @return self
     */
    public function setAwardDate(?\DateTimeInterface $awardDate = null): self
    {
        $this->awardDate = $awardDate;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetAwardDate(): self
    {
        $this->awardDate = null;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getAwardTime(): ?\DateTimeInterface
    {
        return $this->awardTime;
    }

    /**
     * @param \DateTimeInterface|null $awardTime
     * @return self
     */
    public function setAwardTime(?\DateTimeInterface $awardTime = null): self
    {
        $this->awardTime = $awardTime;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetAwardTime(): self
    {
        $this->awardTime = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ReceivedTenderQuantity|null
     */
    public function getReceivedTenderQuantity(): ?ReceivedTenderQuantity
    {
        return $this->receivedTenderQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ReceivedTenderQuantity
     */
    public function getReceivedTenderQuantityWithCreate(): ReceivedTenderQuantity
    {
        $this->receivedTenderQuantity = is_null($this->receivedTenderQuantity) ? new ReceivedTenderQuantity() : $this->receivedTenderQuantity;

        return $this->receivedTenderQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ReceivedTenderQuantity|null $receivedTenderQuantity
     * @return self
     */
    public function setReceivedTenderQuantity(?ReceivedTenderQuantity $receivedTenderQuantity = null): self
    {
        $this->receivedTenderQuantity = $receivedTenderQuantity;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetReceivedTenderQuantity(): self
    {
        $this->receivedTenderQuantity = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\LowerTenderAmount|null
     */
    public function getLowerTenderAmount(): ?LowerTenderAmount
    {
        return $this->lowerTenderAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\LowerTenderAmount
     */
    public function getLowerTenderAmountWithCreate(): LowerTenderAmount
    {
        $this->lowerTenderAmount = is_null($this->lowerTenderAmount) ? new LowerTenderAmount() : $this->lowerTenderAmount;

        return $this->lowerTenderAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\LowerTenderAmount|null $lowerTenderAmount
     * @return self
     */
    public function setLowerTenderAmount(?LowerTenderAmount $lowerTenderAmount = null): self
    {
        $this->lowerTenderAmount = $lowerTenderAmount;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetLowerTenderAmount(): self
    {
        $this->lowerTenderAmount = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\HigherTenderAmount|null
     */
    public function getHigherTenderAmount(): ?HigherTenderAmount
    {
        return $this->higherTenderAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\HigherTenderAmount
     */
    public function getHigherTenderAmountWithCreate(): HigherTenderAmount
    {
        $this->higherTenderAmount = is_null($this->higherTenderAmount) ? new HigherTenderAmount() : $this->higherTenderAmount;

        return $this->higherTenderAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\HigherTenderAmount|null $higherTenderAmount
     * @return self
     */
    public function setHigherTenderAmount(?HigherTenderAmount $higherTenderAmount = null): self
    {
        $this->higherTenderAmount = $higherTenderAmount;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetHigherTenderAmount(): self
    {
        $this->higherTenderAmount = null;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    /**
     * @param \DateTimeInterface|null $startDate
     * @return self
     */
    public function setStartDate(?\DateTimeInterface $startDate = null): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetStartDate(): self
    {
        $this->startDate = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ReceivedElectronicTenderQuantity|null
     */
    public function getReceivedElectronicTenderQuantity(): ?ReceivedElectronicTenderQuantity
    {
        return $this->receivedElectronicTenderQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ReceivedElectronicTenderQuantity
     */
    public function getReceivedElectronicTenderQuantityWithCreate(): ReceivedElectronicTenderQuantity
    {
        $this->receivedElectronicTenderQuantity = is_null($this->receivedElectronicTenderQuantity) ? new ReceivedElectronicTenderQuantity() : $this->receivedElectronicTenderQuantity;

        return $this->receivedElectronicTenderQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ReceivedElectronicTenderQuantity|null $receivedElectronicTenderQuantity
     * @return self
     */
    public function setReceivedElectronicTenderQuantity(
        ?ReceivedElectronicTenderQuantity $receivedElectronicTenderQuantity = null,
    ): self {
        $this->receivedElectronicTenderQuantity = $receivedElectronicTenderQuantity;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetReceivedElectronicTenderQuantity(): self
    {
        $this->receivedElectronicTenderQuantity = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ReceivedForeignTenderQuantity|null
     */
    public function getReceivedForeignTenderQuantity(): ?ReceivedForeignTenderQuantity
    {
        return $this->receivedForeignTenderQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ReceivedForeignTenderQuantity
     */
    public function getReceivedForeignTenderQuantityWithCreate(): ReceivedForeignTenderQuantity
    {
        $this->receivedForeignTenderQuantity = is_null($this->receivedForeignTenderQuantity) ? new ReceivedForeignTenderQuantity() : $this->receivedForeignTenderQuantity;

        return $this->receivedForeignTenderQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ReceivedForeignTenderQuantity|null $receivedForeignTenderQuantity
     * @return self
     */
    public function setReceivedForeignTenderQuantity(
        ?ReceivedForeignTenderQuantity $receivedForeignTenderQuantity = null,
    ): self {
        $this->receivedForeignTenderQuantity = $receivedForeignTenderQuantity;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetReceivedForeignTenderQuantity(): self
    {
        $this->receivedForeignTenderQuantity = null;

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

    /**
     * @return self
     */
    public function unsetContract(): self
    {
        $this->contract = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\AwardedTenderedProject|null
     */
    public function getAwardedTenderedProject(): ?AwardedTenderedProject
    {
        return $this->awardedTenderedProject;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\AwardedTenderedProject
     */
    public function getAwardedTenderedProjectWithCreate(): AwardedTenderedProject
    {
        $this->awardedTenderedProject = is_null($this->awardedTenderedProject) ? new AwardedTenderedProject() : $this->awardedTenderedProject;

        return $this->awardedTenderedProject;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\AwardedTenderedProject|null $awardedTenderedProject
     * @return self
     */
    public function setAwardedTenderedProject(?AwardedTenderedProject $awardedTenderedProject = null): self
    {
        $this->awardedTenderedProject = $awardedTenderedProject;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetAwardedTenderedProject(): self
    {
        $this->awardedTenderedProject = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ContractFormalizationPeriod|null
     */
    public function getContractFormalizationPeriod(): ?ContractFormalizationPeriod
    {
        return $this->contractFormalizationPeriod;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ContractFormalizationPeriod
     */
    public function getContractFormalizationPeriodWithCreate(): ContractFormalizationPeriod
    {
        $this->contractFormalizationPeriod = is_null($this->contractFormalizationPeriod) ? new ContractFormalizationPeriod() : $this->contractFormalizationPeriod;

        return $this->contractFormalizationPeriod;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ContractFormalizationPeriod|null $contractFormalizationPeriod
     * @return self
     */
    public function setContractFormalizationPeriod(
        ?ContractFormalizationPeriod $contractFormalizationPeriod = null,
    ): self {
        $this->contractFormalizationPeriod = $contractFormalizationPeriod;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetContractFormalizationPeriod(): self
    {
        $this->contractFormalizationPeriod = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\SubcontractTerms>|null
     */
    public function getSubcontractTerms(): ?array
    {
        return $this->subcontractTerms;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\SubcontractTerms>|null $subcontractTerms
     * @return self
     */
    public function setSubcontractTerms(?array $subcontractTerms = null): self
    {
        $this->subcontractTerms = $subcontractTerms;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSubcontractTerms(): self
    {
        $this->subcontractTerms = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearSubcontractTerms(): self
    {
        $this->subcontractTerms = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\SubcontractTerms $subcontractTerms
     * @return self
     */
    public function addToSubcontractTerms(SubcontractTerms $subcontractTerms): self
    {
        $this->subcontractTerms[] = $subcontractTerms;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\SubcontractTerms
     */
    public function addToSubcontractTermsWithCreate(): SubcontractTerms
    {
        $this->addTosubcontractTerms($subcontractTerms = new SubcontractTerms());

        return $subcontractTerms;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\SubcontractTerms $subcontractTerms
     * @return self
     */
    public function addOnceToSubcontractTerms(SubcontractTerms $subcontractTerms): self
    {
        if (!is_array($this->subcontractTerms)) {
            $this->subcontractTerms = [];
        }

        $this->subcontractTerms[0] = $subcontractTerms;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\SubcontractTerms
     */
    public function addOnceToSubcontractTermsWithCreate(): SubcontractTerms
    {
        if (!is_array($this->subcontractTerms)) {
            $this->subcontractTerms = [];
        }

        if ($this->subcontractTerms === []) {
            $this->addOnceTosubcontractTerms(new SubcontractTerms());
        }

        return $this->subcontractTerms[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\WinningParty>|null
     */
    public function getWinningParty(): ?array
    {
        return $this->winningParty;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\WinningParty>|null $winningParty
     * @return self
     */
    public function setWinningParty(?array $winningParty = null): self
    {
        $this->winningParty = $winningParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetWinningParty(): self
    {
        $this->winningParty = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearWinningParty(): self
    {
        $this->winningParty = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\WinningParty $winningParty
     * @return self
     */
    public function addToWinningParty(WinningParty $winningParty): self
    {
        $this->winningParty[] = $winningParty;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\WinningParty
     */
    public function addToWinningPartyWithCreate(): WinningParty
    {
        $this->addTowinningParty($winningParty = new WinningParty());

        return $winningParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\WinningParty $winningParty
     * @return self
     */
    public function addOnceToWinningParty(WinningParty $winningParty): self
    {
        if (!is_array($this->winningParty)) {
            $this->winningParty = [];
        }

        $this->winningParty[0] = $winningParty;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\WinningParty
     */
    public function addOnceToWinningPartyWithCreate(): WinningParty
    {
        if (!is_array($this->winningParty)) {
            $this->winningParty = [];
        }

        if ($this->winningParty === []) {
            $this->addOnceTowinningParty(new WinningParty());
        }

        return $this->winningParty[0];
    }
}
