<?php

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\dto;

use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
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
class InvoiceSuitePeriodDTO implements JsonSerializable
{
    /**
     * The period value
     *
     * @var null|float
     */
    #[JMS\Accessor(getter: 'getPeriod', setter: 'setPeriod')]
    #[JMS\SerializedName('period')]
    #[JMS\Type('float')]
    protected ?float $period = null;

    /**
     * The periods's unit
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getPeriodUnit', setter: 'setPeriodUnit')]
    #[JMS\SerializedName('periodUnit')]
    #[JMS\Type('string')]
    protected ?string $periodUnit = null;

    /**
     * Constructor
     *
     * @param null|float  $period     The period value
     * @param null|string $periodUnit The periods's unit
     */
    public function __construct(
        ?float $period = null,
        ?string $periodUnit = null
    ) {
        $this->setPeriod($period);
        $this->setPeriodUnit($periodUnit);
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
     * Returns the period value
     *
     * @return null|float
     */
    public function getPeriod(): ?float
    {
        return $this->period;
    }

    /**
     * Sets the period value
     *
     * @param  null|float $period The period value
     * @return static
     */
    public function setPeriod(
        ?float $period
    ): static {
        $this->period = $period;

        return $this;
    }

    /**
     * Returns the periods's unit
     *
     * @return null|string
     */
    public function getPeriodUnit(): ?string
    {
        return $this->periodUnit;
    }

    /**
     * Sets the periods's unit
     *
     * @param  null|string $periodUnit The periods's unit
     * @return static
     */
    public function setPeriodUnit(
        ?string $periodUnit
    ): static {
        $this->periodUnit = InvoiceSuiteStringUtils::asNullWhenEmpty($periodUnit);

        return $this;
    }
}
