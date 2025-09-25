<?php

namespace horstoeko\invoicesuite\tests\testcases\concerns;

use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\concerns\HandlesDocumentFormatProviders;
use horstoeko\invoicesuite\abstracts\InvoiceSuiteAbstractDocumentFormatProvider;
use horstoeko\invoicesuite\providers\zffxminimum\InvoiceSuiteZfFxMinimumProvider;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFormatProviderNotFoundException;
use horstoeko\invoicesuite\providers\zffxextended\InvoiceSuiteZfFxExtendedProvider;

class HandlesFormatProvidersTest extends TestCase
{
    use HandlesDocumentFormatProviders;

    public function testInitialState(): void
    {
        $this->assertEmpty($this->registeredDocumentFormatProviders);
        $this->assertEmpty($this->getRegisteredDocumentFormatProviders());
    }

    public function testAddAndRemoveFormatProvider(): void
    {
        $provider1 = new InvoiceSuiteZfFxMinimumProvider();
        $provider2 = new InvoiceSuiteZfFxExtendedProvider();

        $this->registerDocumentFormatProvider($provider1);
        $this->assertCount(1, $this->registeredDocumentFormatProviders);
        $this->assertCount(1, $this->getRegisteredDocumentFormatProviders());

        $this->registerDocumentFormatProvider($provider1);
        $this->assertCount(1, $this->registeredDocumentFormatProviders);
        $this->assertCount(1, $this->getRegisteredDocumentFormatProviders());

        $this->registerDocumentFormatProvider($provider2);
        $this->assertCount(2, $this->registeredDocumentFormatProviders);
        $this->assertCount(2, $this->getRegisteredDocumentFormatProviders());

        $this->unregisterDocumentFormatProvider($provider2);
        $this->assertCount(1, $this->registeredDocumentFormatProviders);
        $this->assertCount(1, $this->getRegisteredDocumentFormatProviders());

        $this->unregisterDocumentFormatProvider($provider2);
        $this->assertCount(1, $this->registeredDocumentFormatProviders);
        $this->assertCount(1, $this->getRegisteredDocumentFormatProviders());

        $this->unregisterDocumentFormatProvider($provider1);
        $this->assertEmpty($this->registeredDocumentFormatProviders);
        $this->assertEmpty($this->getRegisteredDocumentFormatProviders());
    }

    public function testFindFormatProviderByUniqueId(): void
    {
        $provider1 = new InvoiceSuiteZfFxMinimumProvider();
        $provider2 = new InvoiceSuiteZfFxExtendedProvider();

        $this->registerDocumentFormatProvider($provider1);
        $this->registerDocumentFormatProvider($provider2);

        $this->assertInstanceOf(InvoiceSuiteAbstractDocumentFormatProvider::class, $this->findDocumentFormatProviderByUniqueId('zffxextended'));
        $this->assertNull($this->findDocumentFormatProviderByUniqueId('__unknownprovider__'));
    }

    public function testFindFormatProviderByUniqueIdOrfail(): void
    {
        $provider1 = new InvoiceSuiteZfFxMinimumProvider();
        $provider2 = new InvoiceSuiteZfFxExtendedProvider();

        $this->registerDocumentFormatProvider($provider1);
        $this->registerDocumentFormatProvider($provider2);

        $this->assertInstanceOf(InvoiceSuiteAbstractDocumentFormatProvider::class, $this->findDocumentFormatProviderByUniqueIdOrFail('zffxextended'));
        $this->expectException(InvoiceSuiteFormatProviderNotFoundException::class);
        $this->findDocumentFormatProviderByUniqueIdOrFail('__unknownprovider__');
    }

    public function testResolveAvailableFormatProviders(): void
    {
        $this->resolveAvailableDocumentFormatProviders();
        $this->assertGreaterThanOrEqual(6, count($this->getRegisteredDocumentFormatProviders()));
    }
}
