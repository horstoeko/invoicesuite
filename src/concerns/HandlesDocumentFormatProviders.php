<?php

namespace horstoeko\invoicesuite\concerns;

use horstoeko\invoicesuite\documentabstracts\InvoiceSuiteAbstractDocumentFormatProvider;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFormatProviderNotFoundException;
use horstoeko\invoicesuite\utils\InvoiceSuiteClassFinder;

/**
 * Trait representing methods for handling format providers
 *
 * @category InvoiceSuite
 * @package  InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/invoicesuite
 */
trait HandlesDocumentFormatProviders
{
    /**
     * List of registered format providers
     *
     * @var array<InvoiceSuiteAbstractDocumentFormatProvider>
     */
    protected $registeredDocumentFormatProviders = [];

    /**
     * Get the list of registered format providers
     *
     * @return array<InvoiceSuiteAbstractDocumentFormatProvider>
     */
    public function getRegisteredDocumentFormatProviders(): array
    {
        return $this->registeredDocumentFormatProviders;
    }

    /**
     * Register another format provider
     *
     * @param InvoiceSuiteAbstractDocumentFormatProvider $invoiceSuiteAbstractFormatProvider
     * @return static
     */
    public function registerDocumentFormatProvider(InvoiceSuiteAbstractDocumentFormatProvider $invoiceSuiteAbstractFormatProvider): self
    {
        if (in_array($invoiceSuiteAbstractFormatProvider, $this->registeredDocumentFormatProviders)) {
            return $this;
        }

        $this->registeredDocumentFormatProviders[] = $invoiceSuiteAbstractFormatProvider;

        return $this;
    }

    /**
     * Remove an already defined format provider
     *
     * @param InvoiceSuiteAbstractDocumentFormatProvider $existingProvider
     * @return static
     */
    public function unregisterDocumentFormatProvider(InvoiceSuiteAbstractDocumentFormatProvider $existingProvider): self
    {
        if (($key = array_search($existingProvider, $this->registeredDocumentFormatProviders, true)) === false) {
            return $this;
        }

        unset($this->registeredDocumentFormatProviders[$key]);

        return $this;
    }

    /**
     * Find a format provider by it's id
     *
     * @param string $formatProviderUniqueId
     * @return null|InvoiceSuiteAbstractDocumentFormatProvider
     */
    public function findDocumentFormatProviderByUniqueId(string $formatProviderUniqueId)
    {
        $formatProvider = array_filter($this->registeredDocumentFormatProviders, fn($formatProvider) => strcasecmp($formatProvider->getUniqueId(), $formatProviderUniqueId) === 0);

        if ($formatProvider === []) {
            return null;
        }

        return reset($formatProvider);
    }

    /**
     * Find a format provider by it's id. When no provider for the given unique id was found an exception is raised
     *
     * @param string $formatProviderUniqueId
     * @return null|InvoiceSuiteAbstractDocumentFormatProvider
     * @throws InvoiceSuiteFormatProviderNotFoundException
     */
    public function findDocumentFormatProviderByUniqueIdOrFail(string $formatProviderUniqueId)
    {
        $formatProvider = $this->findDocumentFormatProviderByUniqueId($formatProviderUniqueId);

        if (is_null($formatProvider)) {
            throw new InvoiceSuiteFormatProviderNotFoundException($formatProviderUniqueId);
        }

        return $formatProvider;
    }

    /**
     * Initialize additionall format providers
     *
     * @return static
     */
    public function resolveAvailableDocumentFormatProviders(): self
    {
        $classFinder = InvoiceSuiteClassFinder::factory();
        $classesWhichAreFormatProviders = $classFinder->getClassesWhenItsSubClassOf(InvoiceSuiteAbstractDocumentFormatProvider::class);

        foreach ($classesWhichAreFormatProviders as $classWhichIsFormatProvider) {
            $this->registerDocumentFormatProvider(new $classWhichIsFormatProvider());
        }

        return $this;
    }
}
