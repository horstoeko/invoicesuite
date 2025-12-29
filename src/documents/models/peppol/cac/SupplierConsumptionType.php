<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Description;
use JMS\Serializer\Annotation as JMS;

class SupplierConsumptionType
{
    use HandlesObjectFlags;

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
     * @var null|UtilitySupplierParty
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\UtilitySupplierParty")
     * @JMS\Expose
     * @JMS\SerializedName("UtilitySupplierParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getUtilitySupplierParty", setter="setUtilitySupplierParty")
     */
    private $utilitySupplierParty;

    /**
     * @var null|UtilityCustomerParty
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\UtilityCustomerParty")
     * @JMS\Expose
     * @JMS\SerializedName("UtilityCustomerParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getUtilityCustomerParty", setter="setUtilityCustomerParty")
     */
    private $utilityCustomerParty;

    /**
     * @var null|Consumption
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\Consumption")
     * @JMS\Expose
     * @JMS\SerializedName("Consumption")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getConsumption", setter="setConsumption")
     */
    private $consumption;

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
     * @var null|array<ConsumptionLine>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\ConsumptionLine>")
     * @JMS\Expose
     * @JMS\SerializedName("ConsumptionLine")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ConsumptionLine", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getConsumptionLine", setter="setConsumptionLine")
     */
    private $consumptionLine;

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
     * @return null|UtilitySupplierParty
     */
    public function getUtilitySupplierParty(): ?UtilitySupplierParty
    {
        return $this->utilitySupplierParty;
    }

    /**
     * @return UtilitySupplierParty
     */
    public function getUtilitySupplierPartyWithCreate(): UtilitySupplierParty
    {
        $this->utilitySupplierParty = is_null($this->utilitySupplierParty) ? new UtilitySupplierParty() : $this->utilitySupplierParty;

        return $this->utilitySupplierParty;
    }

    /**
     * @param  null|UtilitySupplierParty $utilitySupplierParty
     * @return static
     */
    public function setUtilitySupplierParty(?UtilitySupplierParty $utilitySupplierParty = null): static
    {
        $this->utilitySupplierParty = $utilitySupplierParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetUtilitySupplierParty(): static
    {
        $this->utilitySupplierParty = null;

        return $this;
    }

    /**
     * @return null|UtilityCustomerParty
     */
    public function getUtilityCustomerParty(): ?UtilityCustomerParty
    {
        return $this->utilityCustomerParty;
    }

    /**
     * @return UtilityCustomerParty
     */
    public function getUtilityCustomerPartyWithCreate(): UtilityCustomerParty
    {
        $this->utilityCustomerParty = is_null($this->utilityCustomerParty) ? new UtilityCustomerParty() : $this->utilityCustomerParty;

        return $this->utilityCustomerParty;
    }

    /**
     * @param  null|UtilityCustomerParty $utilityCustomerParty
     * @return static
     */
    public function setUtilityCustomerParty(?UtilityCustomerParty $utilityCustomerParty = null): static
    {
        $this->utilityCustomerParty = $utilityCustomerParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetUtilityCustomerParty(): static
    {
        $this->utilityCustomerParty = null;

        return $this;
    }

    /**
     * @return null|Consumption
     */
    public function getConsumption(): ?Consumption
    {
        return $this->consumption;
    }

    /**
     * @return Consumption
     */
    public function getConsumptionWithCreate(): Consumption
    {
        $this->consumption = is_null($this->consumption) ? new Consumption() : $this->consumption;

        return $this->consumption;
    }

    /**
     * @param  null|Consumption $consumption
     * @return static
     */
    public function setConsumption(?Consumption $consumption = null): static
    {
        $this->consumption = $consumption;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetConsumption(): static
    {
        $this->consumption = null;

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

    /**
     * @return null|array<ConsumptionLine>
     */
    public function getConsumptionLine(): ?array
    {
        return $this->consumptionLine;
    }

    /**
     * @param  null|array<ConsumptionLine> $consumptionLine
     * @return static
     */
    public function setConsumptionLine(?array $consumptionLine = null): static
    {
        $this->consumptionLine = $consumptionLine;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetConsumptionLine(): static
    {
        $this->consumptionLine = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearConsumptionLine(): static
    {
        $this->consumptionLine = [];

        return $this;
    }

    /**
     * @return null|ConsumptionLine
     */
    public function firstConsumptionLine(): ?ConsumptionLine
    {
        $consumptionLine = $this->consumptionLine ?? [];
        $consumptionLine = reset($consumptionLine);

        if (false === $consumptionLine) {
            return null;
        }

        return $consumptionLine;
    }

    /**
     * @return null|ConsumptionLine
     */
    public function lastConsumptionLine(): ?ConsumptionLine
    {
        $consumptionLine = $this->consumptionLine ?? [];
        $consumptionLine = end($consumptionLine);

        if (false === $consumptionLine) {
            return null;
        }

        return $consumptionLine;
    }

    /**
     * @param  ConsumptionLine $consumptionLine
     * @return static
     */
    public function addToConsumptionLine(ConsumptionLine $consumptionLine): static
    {
        $this->consumptionLine[] = $consumptionLine;

        return $this;
    }

    /**
     * @return ConsumptionLine
     */
    public function addToConsumptionLineWithCreate(): ConsumptionLine
    {
        $this->addToconsumptionLine($consumptionLine = new ConsumptionLine());

        return $consumptionLine;
    }

    /**
     * @param  ConsumptionLine $consumptionLine
     * @return static
     */
    public function addOnceToConsumptionLine(ConsumptionLine $consumptionLine): static
    {
        if (!is_array($this->consumptionLine)) {
            $this->consumptionLine = [];
        }

        $this->consumptionLine[0] = $consumptionLine;

        return $this;
    }

    /**
     * @return ConsumptionLine
     */
    public function addOnceToConsumptionLineWithCreate(): ConsumptionLine
    {
        if (!is_array($this->consumptionLine)) {
            $this->consumptionLine = [];
        }

        if ([] === $this->consumptionLine) {
            $this->addOnceToconsumptionLine(new ConsumptionLine());
        }

        return $this->consumptionLine[0];
    }
}
