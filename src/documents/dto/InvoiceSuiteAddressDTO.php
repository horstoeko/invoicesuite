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
 * Class representing a DTO for a party address
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
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
    public ?string $country = null;

    /**
     * Subdivision
     */
    public ?string $subDivision = null;

    /**
     * Constructor
     *
     * @param null|string $addressLine1
     * @param null|string $addressLine2
     * @param null|string $addressLine3
     * @param null|string $postcode
     * @param null|string $city
     * @param null|string $country
     * @param null|string $subDivision
     */
    public function __construct(
        ?string $addressLine1 = null,
        ?string $addressLine2 = null,
        ?string $addressLine3 = null,
        ?string $postcode = null,
        ?string $city = null,
        ?string $country = null,
        ?string $subDivision = null
    ) {
        $this
            ->setAddressLine1($addressLine1)
            ->setAddressLine2($addressLine2)
            ->setAddressLine3($addressLine3)
            ->setPostcode($postcode)
            ->setCity($city)
            ->setCountry($country)
            ->setSubDivision($subDivision);
    }

    /**
     * Get address line 1
     *
     * @return null|string
     */
    public function getAddressLine1(): ?string
    {
        return $this->addressLine1;
    }

    /**
     * Set address line 1
     *
     * @param  null|string $newAddressLine1
     * @return self
     */
    public function setAddressLine1(?string $newAddressLine1): self
    {
        $this->addressLine1 = $newAddressLine1;

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
     * @return null|string
     */
    public function getAddressLine2(): ?string
    {
        return $this->addressLine2;
    }

    /**
     * Set address line 2
     *
     * @param  null|string $newAddressLine2
     * @return self
     */
    public function setAddressLine2(?string $newAddressLine2): self
    {
        $this->addressLine2 = $newAddressLine2;

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
     * @return null|string
     */
    public function getAddressLine3(): ?string
    {
        return $this->addressLine3;
    }

    /**
     * Set address line 3
     *
     * @param  null|string $newAddressLine3
     * @return self
     */
    public function setAddressLine3(?string $newAddressLine3): self
    {
        $this->addressLine3 = $newAddressLine3;

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
     * @return null|string
     */
    public function getPostcode(): ?string
    {
        return $this->postcode;
    }

    /**
     * Set postcode
     *
     * @param  null|string $newPostcode
     * @return self
     */
    public function setPostcode(?string $newPostcode): self
    {
        $this->postcode = $newPostcode;

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
     * @return null|string
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * Set city
     *
     * @param  null|string $newCity
     * @return self
     */
    public function setCity(?string $newCity): self
    {
        $this->city = $newCity;

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
     * @return null|string
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * Set country ID
     *
     * @param  null|string $newCountry
     * @return self
     */
    public function setCountry(?string $newCountry): self
    {
        $this->country = $newCountry;

        return $this;
    }

    /**
     * Check if country ID is set and not empty
     *
     * @return bool
     */
    public function hasCountry(): bool
    {
        return !InvoiceSuiteStringUtils::stringIsNullOrEmpty($this->country);
    }

    /**
     * Get subdivision
     *
     * @return null|string
     */
    public function getSubDivision(): ?string
    {
        return $this->subDivision;
    }

    /**
     * Set subdivision
     *
     * @param  null|string $newSubDivision
     * @return self
     */
    public function setSubDivision(?string $newSubDivision): self
    {
        $this->subDivision = $newSubDivision;

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
