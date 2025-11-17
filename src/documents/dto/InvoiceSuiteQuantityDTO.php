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
class InvoiceSuiteQuantityDTO
{
    /**
     * The value
     *
     * @var null|float
     */
    protected ?float $quantity = null;

    /**
     * The value's unit
     *
     * @var null|string
     */
    protected ?string $quantityUnit = null;

    /**
     * Constructor
     *
     * @param null|float  $quantity     The value
     * @param null|string $quantityUnit The value's unit
     */
    public function __construct(?float $quantity = null, ?string $quantityUnit = null)
    {
        $this->setQuantity($quantity);
        $this->setQuantityUnit($quantityUnit);
    }

    /**
     * Returns the value
     *
     * @return null|float
     */
    public function getQuantity(): ?float
    {
        return $this->quantity;
    }

    /**
     * Sets the value
     *
     * @param  null|float $quantity The value
     * @return self
     */
    public function setQuantity(?float $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Returns the value's unit
     *
     * @return null|string
     */
    public function getQuantityUnit(): ?string
    {
        return $this->quantityUnit;
    }

    /**
     * Sets the value's unit
     *
     * @param  null|string $quantityUnit The value's unit
     * @return self
     */
    public function setQuantityUnit(?string $quantityUnit): self
    {
        $this->quantityUnit = $quantityUnit;

        return $this;
    }
}
