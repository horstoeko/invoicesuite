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
class InvoiceSuiteIdDTO implements JsonSerializable
{
    /**
     * ID
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getId', setter: 'setId')]
    #[JMS\SerializedName('id')]
    #[JMS\Type('string')]
    protected ?string $id = null;

    /**
     * Type of the ID
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getIdType', setter: 'setIdType')]
    #[JMS\SerializedName('idType')]
    #[JMS\Type('string')]
    protected ?string $idType = null;

    /**
     * Constructor
     *
     * @param null|string $id     ID
     * @param null|string $idType Type of the ID
     */
    public function __construct(
        ?string $id = null,
        ?string $idType = null
    ) {
        $this->setId($id);
        $this->setIdType($idType);
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
     * Returns iD
     *
     * @return null|string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets iD
     *
     * @param  null|string $id ID
     * @return static
     */
    public function setId(
        ?string $id
    ): static {
        $this->id = InvoiceSuiteStringUtils::asNullWhenEmpty($id);

        return $this;
    }

    /**
     * Returns type of the ID
     *
     * @return null|string
     */
    public function getIdType(): ?string
    {
        return $this->idType;
    }

    /**
     * Sets type of the ID
     *
     * @param  null|string $idType Type of the ID
     * @return static
     */
    public function setIdType(
        ?string $idType
    ): static {
        $this->idType = InvoiceSuiteStringUtils::asNullWhenEmpty($idType);

        return $this;
    }
}
