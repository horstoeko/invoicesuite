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
 * Class representing a DTO for a contact
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
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
     * Constructor
     *
     * @param null|string $personName
     * @param null|string $departmentName
     * @param null|string $phoneNumber
     * @param null|string $faxNumber
     * @param null|string $emailAddress
     */
    public function __construct(
        ?string $personName = null,
        ?string $departmentName = null,
        ?string $phoneNumber = null,
        ?string $faxNumber = null,
        ?string $emailAddress = null
    ) {
        $this
            ->setPersonName($personName)
            ->setDepartmentName($departmentName)
            ->setPhoneNumber($phoneNumber)
            ->setFaxNumber($faxNumber)
            ->setEmailAddress($emailAddress);
    }

    /**
     * Get contact name
     *
     * @return null|string
     */
    public function getPersonName(): ?string
    {
        return $this->personName;
    }

    /**
     * Set contact name
     *
     * @param  null|string $newPersonName
     * @return self
     */
    public function setPersonName(?string $newPersonName): self
    {
        $this->personName = $newPersonName;

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
     * @return null|string
     */
    public function getDepartmentName(): ?string
    {
        return $this->departmentName;
    }

    /**
     * Set department name
     *
     * @param  null|string $newDepartmentName
     * @return self
     */
    public function setDepartmentName(?string $newDepartmentName): self
    {
        $this->departmentName = $newDepartmentName;

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
     * @return null|string
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    /**
     * Set phone number
     *
     * @param  null|string $newPhoneNumber
     * @return self
     */
    public function setPhoneNumber(?string $newPhoneNumber): self
    {
        $this->phoneNumber = $newPhoneNumber;

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
     * @return null|string
     */
    public function getFaxNumber(): ?string
    {
        return $this->faxNumber;
    }

    /**
     * Set fax number
     *
     * @param  null|string $newFaxNumber
     * @return self
     */
    public function setFaxNumber(?string $newFaxNumber): self
    {
        $this->faxNumber = $newFaxNumber;

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
     * @return null|string
     */
    public function getEmailAddress(): ?string
    {
        return $this->emailAddress;
    }

    /**
     * Set email address
     *
     * @param  null|string $newEmailAddress
     * @return self
     */
    public function setEmailAddress(?string $newEmailAddress): self
    {
        $this->emailAddress = $newEmailAddress;

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
