<?php

namespace horstoeko\invoicesuite\concerns;

use horstoeko\invoicesuite\abstracts\InvoiceSuiteAbstractFormatProvider;

/**
 * Trait representing root-object handling
 *
 * @category InvoiceSuite
 * @package  InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/invoicesuite
 */
trait HandlesRootObject
{
    /**
     * Invoice root object
     *
     * @var mixed
     */
    protected $rootObject;

    /**
     * Initialize the root object
     *
     * @return self
     */
    public function initRootObjectByFormatProvider(InvoiceSuiteAbstractFormatProvider $invoiceSuiteAbstractFormatProvider): self
    {
        $className = $invoiceSuiteAbstractFormatProvider->getRootClassName();

        return $this->setRootObject(new $className());
    }

    /**
     * Get the root object
     *
     * @return object
     */
    public function getRootObject()
    {
        return $this->rootObject;
    }

    /**
     * Set the rooot object
     *
     * @param object $rootObject
     * @return self
     */
    public function setRootObject(object $rootObject): self
    {
        $this->rootObject = $rootObject;

        return $this;
    }
}
