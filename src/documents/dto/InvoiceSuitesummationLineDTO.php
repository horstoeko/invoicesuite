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
class InvoiceSuitesummationLineDTO
{
    /**
     * The sum of the net amounts of all invoice lines
     *
     * @var null|float
     */
    protected ?float $netAmount = null;

    /**
     * The sum of the charges
     *
     * @var null|float
     */
    protected ?float $chargeTotalAmount = null;

    /**
     * The sum of the discounts
     *
     * @var null|float
     */
    protected ?float $discountTotalAmount = null;

    /**
     * The total amount of the invoice sales tax (in the invoice currency)
     *
     * @var null|float
     */
    protected ?float $taxTotalAmount = null;

    /**
     * The total invoice amount including sales tax
     *
     * @var null|float
     */
    protected ?float $grossAmount = null;

    /**
     * Constructor
     *
     * @param null|float $netAmount           The sum of the net amounts of all invoice lines
     * @param null|float $chargeTotalAmount   The sum of the charges
     * @param null|float $discountTotalAmount The sum of the discounts
     * @param null|float $taxTotalAmount      The total amount of the invoice sales tax (in the invoice currency)
     * @param null|float $grossAmount         The total invoice amount including sales tax
     */
    public function __construct(
        ?float $netAmount = null,
        ?float $chargeTotalAmount = null,
        ?float $discountTotalAmount = null,
        ?float $taxTotalAmount = null,
        ?float $grossAmount = null,
    ) {
        $this->setNetAmount($netAmount);
        $this->setChargeTotalAmount($chargeTotalAmount);
        $this->setDiscountTotalAmount($discountTotalAmount);
        $this->setTaxTotalAmount($taxTotalAmount);
        $this->setGrossAmount($grossAmount);
    }

    /**
     * Returns the sum of the net amounts of all invoice lines
     *
     * @return null|float
     */
    public function getNetAmount(): ?float
    {
        return $this->netAmount;
    }

    /**
     * Sets the sum of the net amounts of all invoice lines
     *
     * @param  null|float $netAmount The sum of the net amounts of all invoice lines
     * @return self
     */
    public function setNetAmount(?float $netAmount): self
    {
        $this->netAmount = $netAmount;

        return $this;
    }

    /**
     * Returns the sum of the charges
     *
     * @return null|float
     */
    public function getChargeTotalAmount(): ?float
    {
        return $this->chargeTotalAmount;
    }

    /**
     * Sets the sum of the charges
     *
     * @param  null|float $chargeTotalAmount The sum of the charges
     * @return self
     */
    public function setChargeTotalAmount(?float $chargeTotalAmount): self
    {
        $this->chargeTotalAmount = $chargeTotalAmount;

        return $this;
    }

    /**
     * Returns the sum of the discounts
     *
     * @return null|float
     */
    public function getDiscountTotalAmount(): ?float
    {
        return $this->discountTotalAmount;
    }

    /**
     * Sets the sum of the discounts
     *
     * @param  null|float $discountTotalAmount The sum of the discounts
     * @return self
     */
    public function setDiscountTotalAmount(?float $discountTotalAmount): self
    {
        $this->discountTotalAmount = $discountTotalAmount;

        return $this;
    }

    /**
     * Returns the total amount of the invoice sales tax (in the invoice currency)
     *
     * @return null|float
     */
    public function getTaxTotalAmount(): ?float
    {
        return $this->taxTotalAmount;
    }

    /**
     * Sets the total amount of the invoice sales tax (in the invoice currency)
     *
     * @param  null|float $taxTotalAmount The total amount of the invoice sales tax (in the invoice currency)
     * @return self
     */
    public function setTaxTotalAmount(?float $taxTotalAmount): self
    {
        $this->taxTotalAmount = $taxTotalAmount;

        return $this;
    }

    /**
     * Returns the total invoice amount including sales tax
     *
     * @return null|float
     */
    public function getGrossAmount(): ?float
    {
        return $this->grossAmount;
    }

    /**
     * Sets the total invoice amount including sales tax
     *
     * @param  null|float $grossAmount The total invoice amount including sales tax
     * @return self
     */
    public function setGrossAmount(?float $grossAmount): self
    {
        $this->grossAmount = $grossAmount;

        return $this;
    }
}
