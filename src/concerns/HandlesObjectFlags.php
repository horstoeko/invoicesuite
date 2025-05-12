<?php

namespace horstoeko\invoicesuite\concerns;

use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;

/**
 * Trait representing object flag handling
 *
 * @category InvoiceSuite
 * @package  InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/invoicesuite
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
     * @param string $flag
     * @return self
     */
    protected function objectFlagAdd(string $flag): self
    {
        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($flag)) {
            return $this;
        }

        if ($this->objectFlagIsSet($flag)) {
            return $this;
        }

        $this->objectFlags[] = $flag;

        return $this;
    }

    /**
     * Remove a Flag identified by $flag
     *
     * @param string $flag
     * @return self
     */
    protected function objectFlagRemove(string $flag): self
    {
        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($flag)) {
            return $this;
        }

        if (!$this->objectFlagIsSet($flag)) {
            return $this;
        }

        $this->objectFlags = array_filter(
            $this->objectFlags,
            fn ($currentFlag) => strcasecmp($currentFlag, $flag) !== 0
        );

        return $this;
    }

    /**
     * Checks if the flag $flag is assigned
     *
     * @param string $flag
     * @return boolean
     */
    public function objectFlagIsSet(string $flag): bool
    {
        return array_filter(
            $this->objectFlags,
            fn ($currentFlag) => strcasecmp($currentFlag, $flag) === 0
        ) !== [];
    }
}
