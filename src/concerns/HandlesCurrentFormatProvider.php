<?php

namespace horstoeko\invoicesuite\concerns;

use horstoeko\invoicesuite\abstracts\InvoiceSuiteAbstractDocumentFormatProvider;

/**
 * Trait representing methods for handling the current format provider
 *
 * @category InvoiceSuite
 * @package  InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/invoicesuite
 */
trait HandlesCurrentFormatProvider
{
    /**
     * The format provider for which the serializer was created
     *
     * @var InvoiceSuiteAbstractDocumentFormatProvider
     */
    protected $currentInvoiceSuiteAbstractFormatProvider;

    /**
     * Returns the requested format provider
     *
     * @return InvoiceSuiteAbstractDocumentFormatProvider|null
     */
    public function getCurrentFormatProvider(): ?InvoiceSuiteAbstractDocumentFormatProvider
    {
        return $this->currentInvoiceSuiteAbstractFormatProvider;
    }

    /**
     * Set the requested format provider
     *
     * @param InvoiceSuiteAbstractDocumentFormatProvider $invoiceSuiteAbstractFormatProvider
     * @return void
     */
    public function setCurrentFormatProvider(InvoiceSuiteAbstractDocumentFormatProvider $invoiceSuiteAbstractFormatProvider): void
    {
        $this->currentInvoiceSuiteAbstractFormatProvider = $invoiceSuiteAbstractFormatProvider;
    }

    /**
     * Resolve parameters from the requested format provider
     *
     * @return array<string,mixed>
     */
    public function resolveCurrentFormatProviderParameters(): array
    {
        return $this->currentInvoiceSuiteAbstractFormatProvider->getParameters();
    }

    /**
     * Returns true if a parameter exists for the requested format provider
     *
     * @param string $parameterName
     * @return boolean
     */
    public function hasCurrentFormatProviderParameter(string $parameterName): bool
    {
        return $this->currentInvoiceSuiteAbstractFormatProvider->hasFormatProviderParameter($parameterName);
    }

    /**
     * Returns the parameter value for the request parameter for the requested format provider
     *
     * @param string $parameterName
     * @param mixed $defaultValue
     * @return mixed
     */
    public function getCurrentFormatProviderParameterValue(string $parameterName, $defaultValue)
    {
        return $this->currentInvoiceSuiteAbstractFormatProvider->getFormatProviderParameterValue($parameterName, $defaultValue);
    }
}
