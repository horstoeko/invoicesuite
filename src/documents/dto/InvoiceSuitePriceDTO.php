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
class InvoiceSuitePriceDTO
{
    /**
     * The price value
     *
     * @var null|float
     */
    protected ?float $amount = null;

    /**
     * The number of item units for which the price applies
     *
     * @var null|InvoiceSuiteQuantityDTO
     */
    protected ?InvoiceSuiteQuantityDTO $priceQuantity = null;

    /**
     * Constructor
     *
     * @param null|float                   $amount        The price value
     * @param null|InvoiceSuiteQuantityDTO $priceQuantity The number of item units for which the price applies
     */
    public function __construct(?float $amount = null, ?InvoiceSuiteQuantityDTO $priceQuantity = null)
    {
        $this->setAmount($amount);
        $this->setPriceQuantity($priceQuantity);
    }

    /**
     * Returns the price value
     *
     * @return null|float
     */
    public function getAmount(): ?float
    {
        return $this->amount;
    }

    /**
     * Sets the price value
     *
     * @param  null|float $amount The price value
     * @return self
     */
    public function setAmount(?float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Returns the number of item units for which the price applies
     *
     * @return null|InvoiceSuiteQuantityDTO
     */
    public function getPriceQuantity(): ?InvoiceSuiteQuantityDTO
    {
        return $this->priceQuantity;
    }

    /**
     * Sets the number of item units for which the price applies
     *
     * @param  null|InvoiceSuiteQuantityDTO $priceQuantity The number of item units for which the price applies
     * @return self
     */
    public function setPriceQuantity(?InvoiceSuiteQuantityDTO $priceQuantity): self
    {
        $this->priceQuantity = $priceQuantity;

        return $this;
    }
}
