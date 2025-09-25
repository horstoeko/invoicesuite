<?php

namespace horstoeko\invoicesuite\tests\testcases\concerns;

use horstoeko\invoicesuite\concerns\HandlesCurrentDocumentFormatProvider;
use horstoeko\invoicesuite\providers\zffxextended\InvoiceSuiteZfFxExtendedProvider;
use horstoeko\invoicesuite\tests\TestCase;

class HandlesCurrentFormatProviderTest extends TestCase
{
    use HandlesCurrentDocumentFormatProvider;

    public function testInitialState(): void
    {
        $this->assertNull($this->currentDocumentFormatProvider);
        $this->assertNull($this->getCurrentDocumentFormatProvider());
    }

    public function testSetCurrentFormatProvider(): void
    {
        $this->assertNull($this->currentDocumentFormatProvider);
        $this->assertNull($this->getCurrentDocumentFormatProvider());
        $this->setCurrentDocumentFormatProvider(new InvoiceSuiteZfFxExtendedProvider());
        $this->assertInstanceOf(InvoiceSuiteZfFxExtendedProvider::class, $this->currentDocumentFormatProvider);
        $this->assertInstanceOf(InvoiceSuiteZfFxExtendedProvider::class, $this->getCurrentDocumentFormatProvider());
    }

    public function testResolveCurrentFormatProviderParameters(): void
    {
        $this->assertNull($this->currentDocumentFormatProvider);
        $this->setCurrentDocumentFormatProvider(new InvoiceSuiteZfFxExtendedProvider());
        $this->assertNotEmpty($this->resolveCurrentDocumentFormatProviderParameters());
        $this->assertCount(3, $this->resolveCurrentDocumentFormatProviderParameters());
    }

    public function testHasCurrentFormatProviderParameter(): void
    {
        $this->assertNull($this->currentDocumentFormatProvider);
        $this->setCurrentDocumentFormatProvider(new InvoiceSuiteZfFxExtendedProvider());
        $this->assertTrue($this->hasCurrentDocumentFormatProviderParameter('ContextParameter'));
        $this->assertTrue($this->hasCurrentDocumentFormatProviderParameter('AlternativeContextParameters'));
        $this->assertTrue($this->hasCurrentDocumentFormatProviderParameter('BusinessProcess'));
        $this->assertFalse($this->hasCurrentDocumentFormatProviderParameter('__UNKNOWN__'));
    }

    public function testGetCurrentFormatProviderParameterValue(): void
    {
        $this->assertNull($this->currentDocumentFormatProvider);
        $this->setCurrentDocumentFormatProvider(new InvoiceSuiteZfFxExtendedProvider());
        $this->assertSame('urn:cen.eu:en16931:2017#conformant#urn:factur-x.eu:1p0:extended', $this->getCurrentDocumentFormatProviderParameterValue('ContextParameter', ''));
        $this->assertIsArray($this->getCurrentDocumentFormatProviderParameterValue('AlternativeContextParameters', ''));
        $this->assertNotEmpty($this->getCurrentDocumentFormatProviderParameterValue('AlternativeContextParameters', ''));
        $this->assertSame('urn:fdc:peppol.eu:2017:poacc:billing:01:1.0', $this->getCurrentDocumentFormatProviderParameterValue('BusinessProcess', ''));
        $this->assertSame('__DEFAULT__', $this->getCurrentDocumentFormatProviderParameterValue('__UNKNOWN__', '__DEFAULT__'));
    }
}
