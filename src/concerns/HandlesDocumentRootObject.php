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
trait HandlesDocumentRootObject
{
    /**
     * Invoice root object
     *
     * @var mixed
     */
    protected $documentRootObject;

    /**
     * Initialize the root object
     *
     * @return self
     */
    public function createAndInitDocumentRootObjectByFormatProvider(): self
    {
        $className = $this->getCurrentDocumentFormatProvider()->getRootClassName();

        return $this->setDocumentRootObject(new $className())->initDocumentRootObject();
    }

    /**
     * Get the root object
     *
     * @return object
     */
    public function getDocumentRootObject()
    {
        return $this->documentRootObject;
    }

    /**
     * Set the rooot object
     *
     * @param object $rootObject
     * @return self
     */
    public function setDocumentRootObject(object $rootObject): self
    {
        $this->documentRootObject = $rootObject;

        return $this;
    }

    /**
     * Initialize the root object
     *
     * @return self
     */
    public function initDocumentRootObject(): self
    {
        return $this;
    }
}
