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
class InvoiceSuiteProductCharacteristicDTO implements JsonSerializable
{
    /**
     * The name of the attribute or characteristic ("Colour")
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getDescription', setter: 'setDescription')]
    #[JMS\SerializedName('description')]
    #[JMS\Type('string')]
    protected ?string $description = null;

    /**
     * The value of the attribute or characteristic ("Red")
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getValue', setter: 'setValue')]
    #[JMS\SerializedName('value')]
    #[JMS\Type('string')]
    protected ?string $value = null;

    /**
     * The type (Code) of product characteristic
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getType', setter: 'setType')]
    #[JMS\SerializedName('type')]
    #[JMS\Type('string')]
    protected ?string $type = null;

    /**
     * The value of the product property (numerical measured variable)
     *
     * @var null|InvoiceSuiteMeasureDTO
     */
    #[JMS\Accessor(getter: 'getValueMeasure', setter: 'setValueMeasure')]
    #[JMS\SerializedName('valueMeasure')]
    #[JMS\Type('horstoeko\invoicesuite\documents\dto\InvoiceSuiteMeasureDTO')]
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
        ?InvoiceSuiteMeasureDTO $valueMeasure = null
    ) {
        $this->setDescription($description);
        $this->setValue($value);
        $this->setType($type);
        $this->setValueMeasure($valueMeasure);
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
     * @return static
     */
    public function setDescription(
        ?string $description
    ): static {
        $this->description = InvoiceSuiteStringUtils::asNullWhenEmpty($description);

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
     * @return static
     */
    public function setValue(
        ?string $value
    ): static {
        $this->value = InvoiceSuiteStringUtils::asNullWhenEmpty($value);

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
     * @return static
     */
    public function setType(
        ?string $type
    ): static {
        $this->type = InvoiceSuiteStringUtils::asNullWhenEmpty($type);

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
     * @return static
     */
    public function setValueMeasure(
        ?InvoiceSuiteMeasureDTO $valueMeasure
    ): static {
        $this->valueMeasure = $valueMeasure;

        return $this;
    }
}
