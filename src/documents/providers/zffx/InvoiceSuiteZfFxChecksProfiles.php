<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\documents\providers\zffx;

/**
 * Trait representing handling/checking for ZF/FX Profiles
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
trait InvoiceSuiteZfFxChecksProfiles
{
    /**
     * Checks if a tag is valid for the current profile
     *
     * @param  InvoiceSuiteZfFxProfiles $requestedMinimumProdileId
     * @return bool
     */
    protected function supportsAtLeast(InvoiceSuiteZfFxProfiles $requestedMinimumProdileId): bool
    {
        return $this->getCurrentDocumentFormatProviderParameterValueInt('WantsMaximumProfile', -1) >= $requestedMinimumProdileId->value;
    }

    /**
     * Checks if a tag is not valid for the current profile
     *
     * @param  InvoiceSuiteZfFxProfiles $requestedMinimumProdileId
     * @return bool
     */
    protected function supportsNotAtLeast(InvoiceSuiteZfFxProfiles $requestedMinimumProdileId): bool
    {
        return !$this->supportsAtLeast($requestedMinimumProdileId);
    }

    /**
     * Checks if a tag is not valid for the current profile, logs a trace entry
     *
     * @param  InvoiceSuiteZfFxProfiles $requestedMinimumProdileId
     * @param  string                   $method
     * @return bool
     */
    protected function supportsNotAtLeastWithTace(InvoiceSuiteZfFxProfiles $requestedMinimumProdileId, string $method): bool
    {
        $tagIsNotValid = $this->supportsNotAtLeast($requestedMinimumProdileId);

        if ($tagIsNotValid) {
            $this->traceMethodEarlyExit($method, 'supportsNotAtLeast', $requestedMinimumProdileId->getOnlyValidFromProfileMessage());
        }

        return $tagIsNotValid;
    }

    /**
     * Checks if a tag is valid for the EXTENDED profile
     *
     * @return bool
     */
    protected function supportsAtLeastExtended(): bool
    {
        return $this->supportsAtLeast(InvoiceSuiteZfFxProfiles::EXTENDED);
    }

    /**
     * Checks if a tag is valid for the EN 16931 (COMFORT) profile
     *
     * @return bool
     */
    protected function supportsAtLeastEn16931(): bool
    {
        return $this->supportsAtLeast(InvoiceSuiteZfFxProfiles::EN16931);
    }

    /**
     * Checks if a tag is valid for the BASIC profile
     *
     * @return bool
     */
    protected function supportsAtLeastBasic(): bool
    {
        return $this->supportsAtLeast(InvoiceSuiteZfFxProfiles::BASIC);
    }

    /**
     * Checks if a tag is valid for the BASIC WL profile
     *
     * @return bool
     */
    protected function supportsAtLeastBasicWl(): bool
    {
        return $this->supportsAtLeast(InvoiceSuiteZfFxProfiles::BASICWL);
    }

    /**
     * Checks if a tag is valid for the MINIMUM profile
     *
     * @return bool
     */
    protected function supportsAtLeastMinimum(): bool
    {
        return $this->supportsAtLeast(InvoiceSuiteZfFxProfiles::MINIMUM);
    }

    /**
     * Checks if a tag is not valid for the EXTENDED profile
     *
     * @return bool
     */
    protected function supportsNotAtLeastExtended(): bool
    {
        return $this->supportsNotAtLeast(InvoiceSuiteZfFxProfiles::EXTENDED);
    }

    /**
     * Checks if a tag is valid for the EN 16931 (COMFORT) profile
     *
     * @return bool
     */
    protected function supportsNotAtLeastEn16931(): bool
    {
        return $this->supportsNotAtLeast(InvoiceSuiteZfFxProfiles::EN16931);
    }

    /**
     * Checks if a tag is valid for the BASIC profile
     *
     * @return bool
     */
    protected function supportsNotAtLeastBasic(): bool
    {
        return $this->supportsNotAtLeast(InvoiceSuiteZfFxProfiles::BASIC);
    }

    /**
     * Checks if a tag is valid for the BASIC WL profile
     *
     * @return bool
     */
    protected function supportsNotAtLeastBasicWl(): bool
    {
        return $this->supportsNotAtLeast(InvoiceSuiteZfFxProfiles::BASICWL);
    }

    /**
     * Checks if a tag is valid for the MINIMUM profile
     *
     * @return bool
     */
    protected function supportsNotAtLeastMinimum(): bool
    {
        return $this->supportsNotAtLeast(InvoiceSuiteZfFxProfiles::MINIMUM);
    }

    /**
     * Checks if a tag is not valid for the EXTENDED profile, a trace is written
     *
     * @return bool
     */
    protected function supportsNotAtLeastExtendedWithTrace(string $method): bool
    {
        return $this->supportsNotAtLeastWithTace(InvoiceSuiteZfFxProfiles::EXTENDED, $method);
    }

    /**
     * Checks if a tag is not valid for the EN 16931 (COMFORT) profile, a trace is written
     *
     * @return bool
     */
    protected function supportsNotAtLeastEn16931WithTrace(string $method): bool
    {
        return $this->supportsNotAtLeastWithTace(InvoiceSuiteZfFxProfiles::EN16931, $method);
    }

    /**
     * Checks if a tag is not valid for the BASIC profile, a trace is written
     *
     * @return bool
     */
    protected function supportsNotAtLeastBasicWithTrace(string $method): bool
    {
        return $this->supportsNotAtLeastWithTace(InvoiceSuiteZfFxProfiles::BASIC, $method);
    }

    /**
     * Checks if a tag is not valid for the BASIC WL profile, a trace is written
     *
     * @return bool
     */
    protected function supportsNotAtLeastBasicWlWithTrace(string $method): bool
    {
        return $this->supportsNotAtLeastWithTace(InvoiceSuiteZfFxProfiles::BASICWL, $method);
    }

    /**
     * Checks if a tag is not valid for the MINIMUM profile, a trace is written
     *
     * @return bool
     */
    protected function supportsNotAtLeastMinimumWithTrace(string $method): bool
    {
        return $this->supportsNotAtLeastWithTace(InvoiceSuiteZfFxProfiles::MINIMUM, $method);
    }
}
