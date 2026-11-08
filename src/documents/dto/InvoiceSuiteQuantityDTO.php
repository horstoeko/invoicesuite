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
class InvoiceSuiteQuantityDTO implements JsonSerializable
{
    /**
     * The value
     *
     * @var null|float
     */
    #[JMS\Accessor(getter: 'getQuantity', setter: 'setQuantity')]
    #[JMS\SerializedName('quantity')]
    #[JMS\Type('float')]
    protected ?float $quantity = null;

    /**
     * The value's unit
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getQuantityUnit', setter: 'setQuantityUnit')]
    #[JMS\SerializedName('quantityUnit')]
    #[JMS\Type('string')]
    protected ?string $quantityUnit = null;

    /**
     * Constructor
     *
     * @param null|float  $quantity     The value
     * @param null|string $quantityUnit The value's unit
     */
    public function __construct(
        ?float $quantity = null,
        ?string $quantityUnit = null
    ) {
        $this->setQuantity($quantity);
        $this->setQuantityUnit($quantityUnit);
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
    public function getQuantity(): ?float
    {
        return $this->quantity;
    }

    /**
     * Sets the value
     *
     * @param  null|float $quantity The value
     * @return static
     */
    public function setQuantity(
        ?float $quantity
    ): static {
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
     * @return static
     */
    public function setQuantityUnit(
        ?string $quantityUnit
    ): static {
        $this->quantityUnit = InvoiceSuiteStringUtils::asNullWhenEmpty($quantityUnit);

        return $this;
    }
}
