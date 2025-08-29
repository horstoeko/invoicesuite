<?php

namespace horstoeko\invoicesuite\concerns;

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
    public function createAndInitRootObjectByFormatProvider(): self
    {
        $className = $this->getCurrentFormatProvider()->getRootClassName();

        return $this->setRootObject(new $className())->initRootObject();
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

    /**
     * Initialize the root object
     *
     * @return self
     */
    public function initRootObject(): self
    {
        return $this;
    }
}
