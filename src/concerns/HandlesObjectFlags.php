<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\concerns;

use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;

/**
 * Trait representing object flag handling
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
trait HandlesObjectFlags
{
    /**
     * Collection of object flags
     *
     * @var array<string>
     */
    protected $objectFlags = [];

    /**
     * Add a Flag identified by $flag
     *
     * @param  string $flag
     * @return static
     */
    public function addToObjectFlags(string $flag): static
    {
        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($flag)) {
            return $this;
        }

        if ($this->hasObjectFlag($flag)) {
            return $this;
        }

        $this->objectFlags[] = $flag;

        return $this;
    }

    /**
     * Remove a Flag identified by $flag
     *
     * @param  string $flag
     * @return static
     */
    public function removeFromObjectFlags(string $flag): static
    {
        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($flag)) {
            return $this;
        }

        if (!$this->hasObjectFlag($flag)) {
            return $this;
        }

        $this->objectFlags = array_filter(
            $this->objectFlags,
            static fn ($currentFlag) => 0 !== strcasecmp((string) $currentFlag, $flag)
        );

        return $this;
    }

    /**
     * Checks if the flag $flag is assigned
     *
     * @param  string $flag
     * @return bool
     */
    public function hasObjectFlag(string $flag): bool
    {
        return [] !== array_filter(
            $this->objectFlags,
            static fn ($currentFlag) => 0 === strcasecmp((string) $currentFlag, $flag)
        );
    }
}
