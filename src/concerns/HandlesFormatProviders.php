<?php

namespace horstoeko\invoicesuite\concerns;

use horstoeko\invoicesuite\abstracts\InvoiceSuiteAbstractFormatProvider;
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
trait HandlesFormatProviders
{
    /**
     * List of registered format providers
     *
     * @var array<InvoiceSuiteAbstractFormatProvider>
     */
    protected $registeredFormatProviders = [];

    /**
     * Get the list of registered format providers
     *
     * @return array<InvoiceSuiteAbstractFormatProvider>
     */
    public function getRegisteredFormatProviders(): array
    {
        return $this->registeredFormatProviders;
    }

    /**
     * Register another format provider
     *
     * @param InvoiceSuiteAbstractFormatProvider $invoiceSuiteAbstractFormatProvider
     * @return static
     */
    public function addFormatProvider(InvoiceSuiteAbstractFormatProvider $invoiceSuiteAbstractFormatProvider): self
    {
        if (in_array($invoiceSuiteAbstractFormatProvider, $this->registeredFormatProviders)) {
            return $this;
        }

        $this->registeredFormatProviders[] = $invoiceSuiteAbstractFormatProvider;

        return $this;
    }

    /**
     * Remove an already defined format provider
     *
     * @param InvoiceSuiteAbstractFormatProvider $invoiceSuiteAbstractFormatProvider
     * @return static
     */
    public function removeFormatProvider(InvoiceSuiteAbstractFormatProvider $invoiceSuiteAbstractFormatProvider): self
    {
        if (($key = array_search($invoiceSuiteAbstractFormatProvider, $this->registeredFormatProviders, true)) === false) {
            return $this;
        }

        unset($this->registeredFormatProviders[$key]);

        return $this;
    }

    /**
     * Find a format provider by it's id
     *
     * @param string $formatProviderUniqueId
     * @return null|InvoiceSuiteAbstractFormatProvider
     */
    public function findFormatProviderByUniqueId(string $formatProviderUniqueId)
    {
        $formatProvider = array_filter($this->registeredFormatProviders, function ($formatProvider) use ($formatProviderUniqueId) {
            return strcasecmp($formatProvider->getUniqueId(), $formatProviderUniqueId) === 0;
        });

        if ($formatProvider === []) {
            return null;
        }

        return reset($formatProvider);
    }

    /**
     * Find a format provider by it's id. When no provider for the given unique id was found an exception is raised
     *
     * @param string $formatProviderUniqueId
     * @return null|InvoiceSuiteAbstractFormatProvider
     * @throws InvoiceSuiteFormatProviderNotFoundException
     */
    public function findFormatProviderByUniqueIdOrFail(string $formatProviderUniqueId)
    {
        $formatProvider = $this->findFormatProviderByUniqueId($formatProviderUniqueId);

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
    public function resolveAvailableFormatProviders(): self
    {
        $classFinder = InvoiceSuiteClassFinder::factory();
        $classesWhichAreFormatProviders = $classFinder->getClassesWhenItsSubClassOf(InvoiceSuiteAbstractFormatProvider::class);

        foreach ($classesWhichAreFormatProviders as $classWhichIsFormatProvider) {
            $this->addFormatProvider(new $classWhichIsFormatProvider());
        }

        return $this;
    }
}
