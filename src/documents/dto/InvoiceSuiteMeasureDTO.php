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
class InvoiceSuiteMeasureDTO implements JsonSerializable
{
    /**
     * The value
     *
     * @var null|float
     */
    #[JMS\Accessor(getter: 'getValue', setter: 'setValue')]
    #[JMS\SerializedName('value')]
    #[JMS\Type('float')]
    protected ?float $value = null;

    /**
     * The value's unit
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getUnit', setter: 'setUnit')]
    #[JMS\SerializedName('unit')]
    #[JMS\Type('string')]
    protected ?string $unit = null;

    /**
     * Constructor
     *
     * @param null|float  $value The value
     * @param null|string $unit  The value's unit
     */
    public function __construct(
        ?float $value = null,
        ?string $unit = null
    ) {
        $this->setValue($value);
        $this->setUnit($unit);
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
     * Returns the value
     *
     * @return null|float
     */
    public function getValue(): ?float
    {
        return $this->value;
    }

    /**
     * Sets the value
     *
     * @param  null|float $value The value
     * @return static
     */
    public function setValue(
        ?float $value
    ): static {
        $this->value = $value;

        return $this;
    }

    /**
     * Returns the value's unit
     *
     * @return null|string
     */
    public function getUnit(): ?string
    {
        return $this->unit;
    }

    /**
     * Sets the value's unit
     *
     * @param  null|string $unit The value's unit
     * @return static
     */
    public function setUnit(
        ?string $unit
    ): static {
        $this->unit = InvoiceSuiteStringUtils::asNullWhenEmpty($unit);

        return $this;
    }
}
