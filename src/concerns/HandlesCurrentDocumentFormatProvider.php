<?php

namespace horstoeko\invoicesuite\concerns;

use horstoeko\invoicesuite\documents\abstracts\InvoiceSuiteAbstractDocumentFormatProvider;

/**
 * Trait representing methods for handling the current format provider
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
trait HandlesCurrentDocumentFormatProvider
{
    /**
     * The format provider for which the serializer was created
     *
     * @var InvoiceSuiteAbstractDocumentFormatProvider
     */
    protected $currentDocumentFormatProvider;

    /**
     * Returns true if a format provider is set, otherwise false
     *
     * @return bool
     */
    public function hasCurrentDocumentFormatProvider(): bool
    {
        return !is_null($this->getCurrentDocumentFormatProvider());
    }

    /**
     * Returns true if a format provider is not set, otherwise false
     *
     * @return bool
     */
    public function hasNotCurrentDocumentFormatProvider(): bool
    {
        return !$this->hasCurrentDocumentFormatProvider();
    }

    /**
     * Returns the requested format provider
     *
     * @return null|InvoiceSuiteAbstractDocumentFormatProvider
     */
    public function getCurrentDocumentFormatProvider(): ?InvoiceSuiteAbstractDocumentFormatProvider
    {
        return $this->currentDocumentFormatProvider;
    }

    /**
     * Set the requested format provider
     *
     * @param  InvoiceSuiteAbstractDocumentFormatProvider $newDocumentFormatProvider
     * @return void
     */
    public function setCurrentDocumentFormatProvider(InvoiceSuiteAbstractDocumentFormatProvider $newDocumentFormatProvider): void
    {
        $this->currentDocumentFormatProvider = $newDocumentFormatProvider;
    }

    /**
     * Resolve parameters from the requested format provider
     *
     * @return array<string,mixed>
     */
    public function resolveCurrentDocumentFormatProviderParameters(): array
    {
        return $this->currentDocumentFormatProvider->getParameters();
    }

    /**
     * Returns true if a parameter exists for the requested format provider
     *
     * @param  string $parameterName
     * @return bool
     */
    public function hasCurrentDocumentFormatProviderParameter(string $parameterName): bool
    {
        return $this->currentDocumentFormatProvider->hasFormatProviderParameter($parameterName);
    }

    /**
     * Returns the parameter value for the request parameter for the requested format provider
     *
     * @param  string $parameterName
     * @param  mixed  $defaultValue
     * @return mixed
     */
    public function getCurrentDocumentFormatProviderParameterValue(string $parameterName, $defaultValue)
    {
        return $this->currentDocumentFormatProvider->getFormatProviderParameterValue($parameterName, $defaultValue);
    }
}
