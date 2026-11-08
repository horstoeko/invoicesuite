<?php

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\dto;

use DateTimeInterface;
use JMS\Serializer\Annotation as JMS;
use JsonSerializable;

/**
 * Class representing a DTO for ...
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuitePaymentTermPenaltyDTO implements JsonSerializable
{
    /**
     * The base amount of the payment penalty
     *
     * @var null|float
     */
    #[JMS\Accessor(getter: 'getBaseAmount', setter: 'setBaseAmount')]
    #[JMS\SerializedName('baseAmount')]
    #[JMS\Type('float')]
    protected ?float $baseAmount = null;

    /**
     * The amount of the payment penalty
     *
     * @var null|float
     */
    #[JMS\Accessor(getter: 'getPenaltyAmount', setter: 'setPenaltyAmount')]
    #[JMS\SerializedName('penaltyAmount')]
    #[JMS\Type('float')]
    protected ?float $penaltyAmount = null;

    /**
     * The percentage of the payment penalty
     *
     * @var null|float
     */
    #[JMS\Accessor(getter: 'getPenaltyPercent', setter: 'setPenaltyPercent')]
    #[JMS\SerializedName('penaltyPercent')]
    #[JMS\Type('float')]
    protected ?float $penaltyPercent = null;

    /**
     * The due date reference date
     *
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getBaseDate', setter: 'setBaseDate')]
    #[JMS\SerializedName('baseDate')]
    #[JMS\Type('DateTimeInterface<\'Y-m-d\TH:i:s.uP\'>')]
    protected ?DateTimeInterface $baseDate = null;

    /**
     * The maturity period (basis)
     *
     * @var null|InvoiceSuitePeriodDTO
     */
    #[JMS\Accessor(getter: 'getPeriod', setter: 'setPeriod')]
    #[JMS\SerializedName('period')]
    #[JMS\Type('horstoeko\invoicesuite\documents\dto\InvoiceSuitePeriodDTO')]
    protected ?InvoiceSuitePeriodDTO $period = null;

    /**
     * Constructor
     *
     * @param null|float                 $baseAmount     The base amount of the payment penalty
     * @param null|float                 $penaltyAmount  The amount of the payment penalty
     * @param null|float                 $penaltyPercent The percentage of the payment penalty
     * @param null|DateTimeInterface     $baseDate       The due date reference date
     * @param null|InvoiceSuitePeriodDTO $period         The maturity period (basis)
     */
    public function __construct(
        ?float $baseAmount = null,
        ?float $penaltyAmount = null,
        ?float $penaltyPercent = null,
        ?DateTimeInterface $baseDate = null,
        ?InvoiceSuitePeriodDTO $period = null
    ) {
        $this->setBaseAmount($baseAmount);
        $this->setPenaltyAmount($penaltyAmount);
        $this->setPenaltyPercent($penaltyPercent);
        $this->setBaseDate($baseDate);
        $this->setPeriod($period);
    }

    /**
     * Specify data which should be serialized to JSON
     *
     * @return mixed
     */
    public function jsonSerialize(): mixed
    {
        return get_object_vars($this);
    }

    /**
     * Returns the base amount of the payment penalty
     *
     * @return null|float
     */
    public function getBaseAmount(): ?float
    {
        return $this->baseAmount;
    }

    /**
     * Sets the base amount of the payment penalty
     *
     * @param  null|float $baseAmount The base amount of the payment penalty
     * @return static
     */
    public function setBaseAmount(
        ?float $baseAmount
    ): static {
        $this->baseAmount = $baseAmount;

        return $this;
    }

    /**
     * Returns the amount of the payment penalty
     *
     * @return null|float
     */
    public function getPenaltyAmount(): ?float
    {
        return $this->penaltyAmount;
    }

    /**
     * Sets the amount of the payment penalty
     *
     * @param  null|float $penaltyAmount The amount of the payment penalty
     * @return static
     */
    public function setPenaltyAmount(
        ?float $penaltyAmount
    ): static {
        $this->penaltyAmount = $penaltyAmount;

        return $this;
    }

    /**
     * Returns the percentage of the payment penalty
     *
     * @return null|float
     */
    public function getPenaltyPercent(): ?float
    {
        return $this->penaltyPercent;
    }

    /**
     * Sets the percentage of the payment penalty
     *
     * @param  null|float $penaltyPercent The percentage of the payment penalty
     * @return static
     */
    public function setPenaltyPercent(
        ?float $penaltyPercent
    ): static {
        $this->penaltyPercent = $penaltyPercent;

        return $this;
    }

    /**
     * Returns the due date reference date
     *
     * @return null|DateTimeInterface
     */
    public function getBaseDate(): ?DateTimeInterface
    {
        return $this->baseDate;
    }

    /**
     * Sets the due date reference date
     *
     * @param  null|DateTimeInterface $baseDate The due date reference date
     * @return static
     */
    public function setBaseDate(
        ?DateTimeInterface $baseDate
    ): static {
        $this->baseDate = $baseDate;

        return $this;
    }

    /**
     * Returns the maturity period (basis)
     *
     * @return null|InvoiceSuitePeriodDTO
     */
    public function getPeriod(): ?InvoiceSuitePeriodDTO
    {
        return $this->period;
    }

    /**
     * Sets the maturity period (basis)
     *
     * @param  null|InvoiceSuitePeriodDTO $period The maturity period (basis)
     * @return static
     */
    public function setPeriod(
        ?InvoiceSuitePeriodDTO $period
    ): static {
        $this->period = $period;

        return $this;
    }
}
