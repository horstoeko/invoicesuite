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
 * Class representing a DTO for a party address
 *
 * @category InvoiceSuite
 * @package  InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteAddressDTO
{
    /**
     * Address line 1
     */
    public ?string $addressLine1 = null;

    /**
     * Address line 2
     */
    public ?string $addressLine2 = null;

    /**
     * Address line 3
     */
    public ?string $addressLine3 = null;

    /**
     * Post Code / ZIP Code
     */
    public ?string $postcode = null;

    /**
     * City
     */
    public ?string $city = null;

    /**
     * Country
     */
    public ?string $countryId = null;

    /**
     * Subdivision
     */
    public ?string $subDivision = null;

    /**
     * Get address line 1
     *
     * @return string|null
     */
    public function getAddressLine1(): ?string
    {
        return $this->addressLine1;
    }

    /**
     * Set address line 1
     *
     * @param string|null $addressLine1
     * @return self
     */
    public function setAddressLine1(?string $addressLine1): self
    {
        $this->addressLine1 = $addressLine1;
        return $this;
    }

    /**
     * Check if address line 1 is set and not empty
     *
     * @return bool
     */
    public function hasAddressLine1(): bool
    {
        return !InvoiceSuiteStringUtils::stringIsNullOrEmpty($this->addressLine1);
    }

    /**
     * Get address line 2
     *
     * @return string|null
     */
    public function getAddressLine2(): ?string
    {
        return $this->addressLine2;
    }

    /**
     * Set address line 2
     *
     * @param string|null $addressLine2
     * @return self
     */
    public function setAddressLine2(?string $addressLine2): self
    {
        $this->addressLine2 = $addressLine2;
        return $this;
    }

    /**
     * Check if address line 2 is set and not empty
     *
     * @return bool
     */
    public function hasAddressLine2(): bool
    {
        return !InvoiceSuiteStringUtils::stringIsNullOrEmpty($this->addressLine2);
    }

    /**
     * Get address line 3
     *
     * @return string|null
     */
    public function getAddressLine3(): ?string
    {
        return $this->addressLine3;
    }

    /**
     * Set address line 3
     *
     * @param string|null $addressLine3
     * @return self
     */
    public function setAddressLine3(?string $addressLine3): self
    {
        $this->addressLine3 = $addressLine3;
        return $this;
    }

    /**
     * Check if address line 3 is set and not empty
     *
     * @return bool
     */
    public function hasAddressLine3(): bool
    {
        return !InvoiceSuiteStringUtils::stringIsNullOrEmpty($this->addressLine3);
    }

    /**
     * Get postcode
     *
     * @return string|null
     */
    public function getPostcode(): ?string
    {
        return $this->postcode;
    }

    /**
     * Set postcode
     *
     * @param string|null $postcode
     * @return self
     */
    public function setPostcode(?string $postcode): self
    {
        $this->postcode = $postcode;
        return $this;
    }

    /**
     * Check if postcode is set and not empty
     *
     * @return bool
     */
    public function hasPostcode(): bool
    {
        return !InvoiceSuiteStringUtils::stringIsNullOrEmpty($this->postcode);
    }

    /**
     * Get city
     *
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * Set city
     *
     * @param string|null $city
     * @return self
     */
    public function setCity(?string $city): self
    {
        $this->city = $city;
        return $this;
    }

    /**
     * Check if city is set and not empty
     *
     * @return bool
     */
    public function hasCity(): bool
    {
        return !InvoiceSuiteStringUtils::stringIsNullOrEmpty($this->city);
    }

    /**
     * Get country ID
     *
     * @return string|null
     */
    public function getCountryId(): ?string
    {
        return $this->countryId;
    }

    /**
     * Set country ID
     *
     * @param string|null $countryId
     * @return self
     */
    public function setCountryId(?string $countryId): self
    {
        $this->countryId = $countryId;
        return $this;
    }

    /**
     * Check if country ID is set and not empty
     *
     * @return bool
     */
    public function hasCountryId(): bool
    {
        return !InvoiceSuiteStringUtils::stringIsNullOrEmpty($this->countryId);
    }

    /**
     * Get subdivision
     *
     * @return string|null
     */
    public function getSubDivision(): ?string
    {
        return $this->subDivision;
    }

    /**
     * Set subdivision
     *
     * @param string|null $subDivision
     * @return self
     */
    public function setSubDivision(?string $subDivision): self
    {
        $this->subDivision = $subDivision;
        return $this;
    }

    /**
     * Check if subdivision is set and not empty
     *
     * @return bool
     */
    public function hasSubDivision(): bool
    {
        return !InvoiceSuiteStringUtils::stringIsNullOrEmpty($this->subDivision);
    }
}
