<?php

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\documents\dto;

use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;

/**
 * Class representing a DTO for a party identification
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteIdDTO
{
    /**
     * ID
     */
    public ?string $id = null;

    /**
     * Type of the ID
     */
    public ?string $idType = null;

    /**
     * Constructor
     *
     * @param null|string $id
     * @param null|string $idType
     */
    public function __construct(
        ?string $id = null,
        ?string $idType = null
    ) {
        $this
            ->setId($id)
            ->setIdType($idType);
    }

    /**
     * Get the ID
     *
     * @return null|string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Set the ID
     *
     * @param  null|string $newId
     * @return self
     */
    public function setId(?string $newId): self
    {
        $this->id = $newId;

        return $this;
    }

    /**
     * Check if ID is set and not empty
     *
     * @return bool
     */
    public function hasId(): bool
    {
        return !InvoiceSuiteStringUtils::stringIsNullOrEmpty($this->id);
    }

    /**
     * Get the ID type
     *
     * @return null|string
     */
    public function getIdType(): ?string
    {
        return $this->idType;
    }

    /**
     * Set the ID type
     *
     * @param  null|string $newIdType
     * @return self
     */
    public function setIdType(?string $newIdType): self
    {
        $this->idType = $newIdType;

        return $this;
    }

    /**
     * Check if ID type is set and not empty
     *
     * @return bool
     */
    public function hasIdType(): bool
    {
        return !InvoiceSuiteStringUtils::stringIsNullOrEmpty($this->idType);
    }
}
