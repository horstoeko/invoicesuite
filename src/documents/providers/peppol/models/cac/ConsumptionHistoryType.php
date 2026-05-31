<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Amount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ConsumptionLevel;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ConsumptionLevelCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Description;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MeterNumber;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Quantity;
use JMS\Serializer\Annotation as JMS;

class ConsumptionHistoryType
{
    use HandlesObjectFlags;

    /**
     * @var null|MeterNumber
     */
    #[JMS\Accessor(getter: 'getMeterNumber', setter: 'setMeterNumber')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MeterNumber')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MeterNumber')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $meterNumber;

    /**
     * @var null|Quantity
     */
    #[JMS\Accessor(getter: 'getQuantity', setter: 'setQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Quantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Quantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $quantity;

    /**
     * @var null|Amount
     */
    #[JMS\Accessor(getter: 'getAmount', setter: 'setAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Amount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Amount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $amount;

    /**
     * @var null|ConsumptionLevelCode
     */
    #[JMS\Accessor(getter: 'getConsumptionLevelCode', setter: 'setConsumptionLevelCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ConsumptionLevelCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ConsumptionLevelCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $consumptionLevelCode;

    /**
     * @var null|ConsumptionLevel
     */
    #[JMS\Accessor(getter: 'getConsumptionLevel', setter: 'setConsumptionLevel')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ConsumptionLevel')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ConsumptionLevel')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $consumptionLevel;

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
     * @var null|Period
     */
    #[JMS\Accessor(getter: 'getPeriod', setter: 'setPeriod')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Period')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\Period')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $period;

    /**
     * @return null|MeterNumber
     */
    public function getMeterNumber(): ?MeterNumber
    {
        return $this->meterNumber;
    }

    /**
     * @return MeterNumber
     */
    public function getMeterNumberWithCreate(): MeterNumber
    {
        $this->meterNumber ??= new MeterNumber();

        return $this->meterNumber;
    }

    /**
     * @param  null|MeterNumber $meterNumber
     * @return static
     */
    public function setMeterNumber(
        ?MeterNumber $meterNumber = null
    ): static {
        $this->meterNumber = $meterNumber;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMeterNumber(): static
    {
        $this->meterNumber = null;

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
        $this->quantity ??= new Quantity();

        return $this->quantity;
    }

    /**
     * @param  null|Quantity $quantity
     * @return static
     */
    public function setQuantity(
        ?Quantity $quantity = null
    ): static {
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
     * @return null|Amount
     */
    public function getAmount(): ?Amount
    {
        return $this->amount;
    }

    /**
     * @return Amount
     */
    public function getAmountWithCreate(): Amount
    {
        $this->amount ??= new Amount();

        return $this->amount;
    }

    /**
     * @param  null|Amount $amount
     * @return static
     */
    public function setAmount(
        ?Amount $amount = null
    ): static {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAmount(): static
    {
        $this->amount = null;

        return $this;
    }

    /**
     * @return null|ConsumptionLevelCode
     */
    public function getConsumptionLevelCode(): ?ConsumptionLevelCode
    {
        return $this->consumptionLevelCode;
    }

    /**
     * @return ConsumptionLevelCode
     */
    public function getConsumptionLevelCodeWithCreate(): ConsumptionLevelCode
    {
        $this->consumptionLevelCode ??= new ConsumptionLevelCode();

        return $this->consumptionLevelCode;
    }

    /**
     * @param  null|ConsumptionLevelCode $consumptionLevelCode
     * @return static
     */
    public function setConsumptionLevelCode(
        ?ConsumptionLevelCode $consumptionLevelCode = null
    ): static {
        $this->consumptionLevelCode = $consumptionLevelCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetConsumptionLevelCode(): static
    {
        $this->consumptionLevelCode = null;

        return $this;
    }

    /**
     * @return null|ConsumptionLevel
     */
    public function getConsumptionLevel(): ?ConsumptionLevel
    {
        return $this->consumptionLevel;
    }

    /**
     * @return ConsumptionLevel
     */
    public function getConsumptionLevelWithCreate(): ConsumptionLevel
    {
        $this->consumptionLevel ??= new ConsumptionLevel();

        return $this->consumptionLevel;
    }

    /**
     * @param  null|ConsumptionLevel $consumptionLevel
     * @return static
     */
    public function setConsumptionLevel(
        ?ConsumptionLevel $consumptionLevel = null
    ): static {
        $this->consumptionLevel = $consumptionLevel;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetConsumptionLevel(): static
    {
        $this->consumptionLevel = null;

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
     * @return null|Period
     */
    public function getPeriod(): ?Period
    {
        return $this->period;
    }

    /**
     * @return Period
     */
    public function getPeriodWithCreate(): Period
    {
        $this->period ??= new Period();

        return $this->period;
    }

    /**
     * @param  null|Period $period
     * @return static
     */
    public function setPeriod(
        ?Period $period = null
    ): static {
        $this->period = $period;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPeriod(): static
    {
        $this->period = null;

        return $this;
    }
}
