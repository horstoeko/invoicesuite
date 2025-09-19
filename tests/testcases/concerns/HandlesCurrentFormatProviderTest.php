<?php

namespace horstoeko\invoicesuite\tests\testcases\concerns;

use horstoeko\invoicesuite\concerns\HandlesCurrentFormatProvider;
use horstoeko\invoicesuite\providers\zffxextended\InvoiceSuiteZfFxExtendedProvider;
use horstoeko\invoicesuite\tests\TestCase;

class HandlesCurrentFormatProviderTest extends TestCase
{
    use HandlesCurrentFormatProvider;

    public function testInitialState(): void
    {
        $this->assertNull($this->currentInvoiceSuiteAbstractFormatProvider);
        $this->assertNull($this->getCurrentFormatProvider());
    }

    public function testSetCurrentFormatProvider(): void
    {
        $this->assertNull($this->currentInvoiceSuiteAbstractFormatProvider);
        $this->assertNull($this->getCurrentFormatProvider());
        $this->setCurrentFormatProvider(new InvoiceSuiteZfFxExtendedProvider());
        $this->assertInstanceOf(InvoiceSuiteZfFxExtendedProvider::class, $this->currentInvoiceSuiteAbstractFormatProvider);
        $this->assertInstanceOf(InvoiceSuiteZfFxExtendedProvider::class, $this->getCurrentFormatProvider());
    }

    public function testResolveCurrentFormatProviderParameters(): void
    {
        $this->assertNull($this->currentInvoiceSuiteAbstractFormatProvider);
        $this->setCurrentFormatProvider(new InvoiceSuiteZfFxExtendedProvider());
        $this->assertNotEmpty($this->resolveCurrentFormatProviderParameters());
        $this->assertCount(3, $this->resolveCurrentFormatProviderParameters());
    }

    public function testHasCurrentFormatProviderParameter(): void
    {
        $this->assertNull($this->currentInvoiceSuiteAbstractFormatProvider);
        $this->setCurrentFormatProvider(new InvoiceSuiteZfFxExtendedProvider());
        $this->assertTrue($this->hasCurrentFormatProviderParameter('CONTEXTPARAMETER'));
        $this->assertTrue($this->hasCurrentFormatProviderParameter('ALTERNATIVECONTEXTPARAMETERS'));
        $this->assertTrue($this->hasCurrentFormatProviderParameter('BUSINESSPROCESS'));
        $this->assertFalse($this->hasCurrentFormatProviderParameter('__UNKNOWN__'));
    }

    public function testGetCurrentFormatProviderParameterValue(): void
    {
        $this->assertNull($this->currentInvoiceSuiteAbstractFormatProvider);
        $this->setCurrentFormatProvider(new InvoiceSuiteZfFxExtendedProvider());
        $this->assertSame('urn:cen.eu:en16931:2017#conformant#urn:factur-x.eu:1p0:extended', $this->getCurrentFormatProviderParameterValue('CONTEXTPARAMETER', ''));
        $this->assertIsArray($this->getCurrentFormatProviderParameterValue('ALTERNATIVECONTEXTPARAMETERS', ''));
        $this->assertNotEmpty($this->getCurrentFormatProviderParameterValue('ALTERNATIVECONTEXTPARAMETERS', ''));
        $this->assertSame('urn:fdc:peppol.eu:2017:poacc:billing:01:1.0', $this->getCurrentFormatProviderParameterValue('BUSINESSPROCESS', ''));
        $this->assertSame('__DEFAULT__', $this->getCurrentFormatProviderParameterValue('__UNKNOWN__', '__DEFAULT__'));
    }
}
