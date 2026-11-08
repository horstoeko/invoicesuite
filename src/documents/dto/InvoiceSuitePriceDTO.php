<?php

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\dto;

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
class InvoiceSuitePriceDTO implements JsonSerializable
{
    /**
     * The price value
     *
     * @var null|float
     */
    #[JMS\Accessor(getter: 'getAmount', setter: 'setAmount')]
    #[JMS\SerializedName('amount')]
    #[JMS\Type('float')]
    protected ?float $amount = null;

    /**
     * The number of item units for which the price applies
     *
     * @var null|InvoiceSuiteQuantityDTO
     */
    #[JMS\Accessor(getter: 'getPriceQuantity', setter: 'setPriceQuantity')]
    #[JMS\SerializedName('priceQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\dto\InvoiceSuiteQuantityDTO')]
    protected ?InvoiceSuiteQuantityDTO $priceQuantity = null;

    /**
     * Constructor
     *
     * @param null|float                   $amount        The price value
     * @param null|InvoiceSuiteQuantityDTO $priceQuantity The number of item units for which the price applies
     */
    public function __construct(
        ?float $amount = null,
        ?InvoiceSuiteQuantityDTO $priceQuantity = null
    ) {
        $this->setAmount($amount);
        $this->setPriceQuantity($priceQuantity);
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
     * @return static
     */
    public function setAmount(
        ?float $amount
    ): static {
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
     * @return static
     */
    public function setPriceQuantity(
        ?InvoiceSuiteQuantityDTO $priceQuantity
    ): static {
        $this->priceQuantity = $priceQuantity;

        return $this;
    }
}
