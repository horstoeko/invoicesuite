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
class InvoiceSuiteProductCharacteristicDTO
{
    /**
     * The name of the attribute or characteristic ("Colour")
     *
     * @var null|string
     */
    protected ?string $description = null;

    /**
     * The value of the attribute or characteristic ("Red")
     *
     * @var null|string
     */
    protected ?string $value = null;

    /**
     * The type (Code) of product characteristic
     *
     * @var null|string
     */
    protected ?string $type = null;

    /**
     * The value of the product property (numerical measured variable)
     *
     * @var null|InvoiceSuiteMeasureDTO
     */
    protected ?InvoiceSuiteMeasureDTO $valueMeasure = null;

    /**
     * Constructor
     *
     * @param null|string                 $description  The name of the attribute or characteristic ("Colour")
     * @param null|string                 $value        The value of the attribute or characteristic ("Red")
     * @param null|string                 $type         The type (Code) of product characteristic
     * @param null|InvoiceSuiteMeasureDTO $valueMeasure The value of the product property (numerical measured variable)
     */
    public function __construct(
        ?string $description = null,
        ?string $value = null,
        ?string $type = null,
        ?InvoiceSuiteMeasureDTO $valueMeasure = null,
    ) {
        $this->setDescription($description);
        $this->setValue($value);
        $this->setType($type);
        $this->setValueMeasure($valueMeasure);
    }

    /**
     * Returns the name of the attribute or characteristic ("Colour")
     *
     * @return null|string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Sets the name of the attribute or characteristic ("Colour")
     *
     * @param  null|string $description The name of the attribute or characteristic ("Colour")
     * @return self
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Returns the value of the attribute or characteristic ("Red")
     *
     * @return null|string
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * Sets the value of the attribute or characteristic ("Red")
     *
     * @param  null|string $value The value of the attribute or characteristic ("Red")
     * @return self
     */
    public function setValue(?string $value): self
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Returns the type (Code) of product characteristic
     *
     * @return null|string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Sets the type (Code) of product characteristic
     *
     * @param  null|string $type The type (Code) of product characteristic
     * @return self
     */
    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Returns the value of the product property (numerical measured variable)
     *
     * @return null|InvoiceSuiteMeasureDTO
     */
    public function getValueMeasure(): ?InvoiceSuiteMeasureDTO
    {
        return $this->valueMeasure;
    }

    /**
     * Sets the value of the product property (numerical measured variable)
     *
     * @param  null|InvoiceSuiteMeasureDTO $valueMeasure The value of the product property (numerical measured variable)
     * @return self
     */
    public function setValueMeasure(?InvoiceSuiteMeasureDTO $valueMeasure): self
    {
        $this->valueMeasure = $valueMeasure;

        return $this;
    }
}
