<?php

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\documents\dto;

/**
 * Class representing a DTO for...
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteMeasureDTO
{
    /**
     * The value
     *
     * @var null|float
     */
    protected ?float $value = null;

    /**
     * The value's unit
     *
     * @var null|string
     */
    protected ?string $unit = null;

    /**
     * Constructor
     *
     * @param null|float  $value The value
     * @param null|string $unit  The value's unit
     */
    public function __construct(?float $value = null, ?string $unit = null)
    {
        $this->setValue($value);
        $this->setUnit($unit);
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
     * @return self
     */
    public function setValue(?float $value): self
    {
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
     * @return self
     */
    public function setUnit(?string $unit): self
    {
        $this->unit = $unit;

        return $this;
    }
}
