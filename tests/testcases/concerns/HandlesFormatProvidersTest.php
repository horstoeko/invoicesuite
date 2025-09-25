<?php

namespace horstoeko\invoicesuite\tests\testcases\concerns;

use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\concerns\HandlesFormatProviders;
use horstoeko\invoicesuite\abstracts\InvoiceSuiteAbstractDocumentFormatProvider;
use horstoeko\invoicesuite\providers\zffxminimum\InvoiceSuiteZfFxMinimumProvider;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFormatProviderNotFoundException;
use horstoeko\invoicesuite\providers\zffxextended\InvoiceSuiteZfFxExtendedProvider;

class HandlesFormatProvidersTest extends TestCase
{
    use HandlesFormatProviders;

    public function testInitialState(): void
    {
        $this->assertEmpty($this->registeredFormatProviders);
        $this->assertEmpty($this->getRegisteredFormatProviders());
    }

    public function testAddAndRemoveFormatProvider(): void
    {
        $provider1 = new InvoiceSuiteZfFxMinimumProvider();
        $provider2 = new InvoiceSuiteZfFxExtendedProvider();

        $this->addFormatProvider($provider1);
        $this->assertCount(1, $this->registeredFormatProviders);
        $this->assertCount(1, $this->getRegisteredFormatProviders());

        $this->addFormatProvider($provider1);
        $this->assertCount(1, $this->registeredFormatProviders);
        $this->assertCount(1, $this->getRegisteredFormatProviders());

        $this->addFormatProvider($provider2);
        $this->assertCount(2, $this->registeredFormatProviders);
        $this->assertCount(2, $this->getRegisteredFormatProviders());

        $this->removeFormatProvider($provider2);
        $this->assertCount(1, $this->registeredFormatProviders);
        $this->assertCount(1, $this->getRegisteredFormatProviders());

        $this->removeFormatProvider($provider2);
        $this->assertCount(1, $this->registeredFormatProviders);
        $this->assertCount(1, $this->getRegisteredFormatProviders());

        $this->removeFormatProvider($provider1);
        $this->assertEmpty($this->registeredFormatProviders);
        $this->assertEmpty($this->getRegisteredFormatProviders());
    }

    public function testFindFormatProviderByUniqueId(): void
    {
        $provider1 = new InvoiceSuiteZfFxMinimumProvider();
        $provider2 = new InvoiceSuiteZfFxExtendedProvider();

        $this->addFormatProvider($provider1);
        $this->addFormatProvider($provider2);

        $this->assertInstanceOf(InvoiceSuiteAbstractDocumentFormatProvider::class, $this->findFormatProviderByUniqueId('zffxextended'));
        $this->assertNull($this->findFormatProviderByUniqueId('__unknownprovider__'));
    }

    public function testFindFormatProviderByUniqueIdOrfail(): void
    {
        $provider1 = new InvoiceSuiteZfFxMinimumProvider();
        $provider2 = new InvoiceSuiteZfFxExtendedProvider();

        $this->addFormatProvider($provider1);
        $this->addFormatProvider($provider2);

        $this->assertInstanceOf(InvoiceSuiteAbstractDocumentFormatProvider::class, $this->findFormatProviderByUniqueIdOrFail('zffxextended'));
        $this->expectException(InvoiceSuiteFormatProviderNotFoundException::class);
        $this->findFormatProviderByUniqueIdOrFail('__unknownprovider__');
    }

    public function testResolveAvailableFormatProviders(): void
    {
        $this->resolveAvailableFormatProviders();
        $this->assertGreaterThanOrEqual(6, count($this->getRegisteredFormatProviders()));
    }
}
