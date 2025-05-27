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
 * Class representing a DTO for a contact
 *
 * @category InvoiceSuite
 * @package  InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteContactDTO
{
    /**
     * Contact name
     */
    public ?string $personName = null;

    /**
     * Contact department name
     */
    public ?string $departmentName = null;

    /**
     * Contact phone number
     */
    public ?string $phoneNumber = null;

    /**
     * Contact fax number
     */
    public ?string $faxNumber = null;

    /**
     * Contact e-mail address
     */
    public ?string $emailAddress = null;

    /**
     * Get contact name
     *
     * @return string|null
     */
    public function getPersonName(): ?string
    {
        return $this->personName;
    }

    /**
     * Set contact name
     *
     * @param string|null $personName
     * @return self
     */
    public function setPersonName(?string $personName): self
    {
        $this->personName = $personName;
        return $this;
    }

    /**
     * Check if contact name is set and not empty
     *
     * @return bool
     */
    public function hasPersonName(): bool
    {
        return !InvoiceSuiteStringUtils::stringIsNullOrEmpty($this->personName);
    }

    /**
     * Get department name
     *
     * @return string|null
     */
    public function getDepartmentName(): ?string
    {
        return $this->departmentName;
    }

    /**
     * Set department name
     *
     * @param string|null $departmentName
     * @return self
     */
    public function setDepartmentName(?string $departmentName): self
    {
        $this->departmentName = $departmentName;
        return $this;
    }

    /**
     * Check if department name is set and not empty
     *
     * @return bool
     */
    public function hasDepartmentName(): bool
    {
        return !InvoiceSuiteStringUtils::stringIsNullOrEmpty($this->departmentName);
    }

    /**
     * Get phone number
     *
     * @return string|null
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    /**
     * Set phone number
     *
     * @param string|null $phoneNumber
     * @return self
     */
    public function setPhoneNumber(?string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    /**
     * Check if phone number is set and not empty
     *
     * @return bool
     */
    public function hasPhoneNumber(): bool
    {
        return !InvoiceSuiteStringUtils::stringIsNullOrEmpty($this->phoneNumber);
    }

    /**
     * Get fax number
     *
     * @return string|null
     */
    public function getFaxNumber(): ?string
    {
        return $this->faxNumber;
    }

    /**
     * Set fax number
     *
     * @param string|null $faxNumber
     * @return self
     */
    public function setFaxNumber(?string $faxNumber): self
    {
        $this->faxNumber = $faxNumber;
        return $this;
    }

    /**
     * Check if fax number is set and not empty
     *
     * @return bool
     */
    public function hasFaxNumber(): bool
    {
        return !InvoiceSuiteStringUtils::stringIsNullOrEmpty($this->faxNumber);
    }

    /**
     * Get email address
     *
     * @return string|null
     */
    public function getEmailAddress(): ?string
    {
        return $this->emailAddress;
    }

    /**
     * Set email address
     *
     * @param string|null $emailAddress
     * @return self
     */
    public function setEmailAddress(?string $emailAddress): self
    {
        $this->emailAddress = $emailAddress;
        return $this;
    }

    /**
     * Check if email address is set and not empty
     *
     * @return bool
     */
    public function hasEmailAddress(): bool
    {
        return !InvoiceSuiteStringUtils::stringIsNullOrEmpty($this->emailAddress);
    }
}
