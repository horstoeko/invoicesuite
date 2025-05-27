<?php

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\dto;

use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;

/**
 * Class representing a DTO for a party identification
 *
 * @category InvoiceSuite
 * @package  InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/invoicesuite
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
     * Get the ID
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Set the ID
     *
     * @param string|null $id
     * @return self
     */
    public function setId(?string $id): self
    {
        $this->id = $id;
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
     * @return string|null
     */
    public function getIdType(): ?string
    {
        return $this->idType;
    }

    /**
     * Set the ID type
     *
     * @param string|null $idType
     * @return self
     */
    public function setIdType(?string $idType): self
    {
        $this->idType = $idType;
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
