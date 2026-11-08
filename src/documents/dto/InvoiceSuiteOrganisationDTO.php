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
class InvoiceSuiteOrganisationDTO extends InvoiceSuiteIdDTO implements JsonSerializable
{
    /**
     * Organisation Name
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getName', setter: 'setName')]
    #[JMS\SerializedName('name')]
    #[JMS\Type('string')]
    protected ?string $name = null;

    /**
     * Constructor
     *
     * @param null|string $id     ID
     * @param null|string $idType Type of the ID
     * @param null|string $name   Organisation Name
     */
    public function __construct(
        ?string $id = null,
        ?string $idType = null,
        ?string $name = null
    ) {
        parent::__construct($id, $idType);

        $this->setName($name);
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
     * Returns organisation Name
     *
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Sets organisation Name
     *
     * @param  null|string $name Organisation Name
     * @return static
     */
    public function setName(
        ?string $name
    ): static {
        $this->name = InvoiceSuiteStringUtils::asNullWhenEmpty($name);

        return $this;
    }
}
