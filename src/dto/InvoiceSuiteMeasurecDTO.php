<?php

namespace horstoeko\invoicesuite\dto;

/**
 * Class representing a DTO for...
 *
 * @category InvoiceSuite
 * @package  InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteMeasurecDTO
{
    /**
     * The value
     *
     * @var float|null
     */
    protected ?float $value = null;

    /**
     * The value's unit
     *
     * @var string|null
     */
    protected ?string $unit = null;

    /**
     * Constructor
     *
     * @param float|null $value The value
     * @param string|null $unit The value's unit
     */
    public function __construct(?float $value = null, ?string $unit = null)
    {
        $this->setValue($value);
        $this->setUnit($unit);
    }

    /**
     * Returns the value
     *
     * @return float|null
     */
    public function getValue(): ?float
    {
        return $this->value;
    }

    /**
     * Sets the value
     *
     * @param float|null $value The value
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
     * @return string|null
     */
    public function getUnit(): ?string
    {
        return $this->unit;
    }

    /**
     * Sets the value's unit
     *
     * @param string|null $unit The value's unit
     * @return self
     */
    public function setUnit(?string $unit): self
    {
        $this->unit = $unit;

        return $this;
    }
}
