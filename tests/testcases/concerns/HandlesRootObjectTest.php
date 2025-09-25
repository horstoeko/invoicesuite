<?php

namespace horstoeko\invoicesuite\tests\testcases\concerns;

use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\concerns\HandlesDocumentRootObject;
use horstoeko\invoicesuite\concerns\HandlesCurrentDocumentFormatProvider;
use horstoeko\invoicesuite\documentmodels\zffxextended\rsm\CrossIndustryInvoice;
use horstoeko\invoicesuite\documentproviders\zffxextended\InvoiceSuiteZfFxExtendedProvider;

class HandlesRootObjectTest extends TestCase
{
    use HandlesCurrentDocumentFormatProvider;
    use HandlesDocumentRootObject;

    public function testInitialState(): void
    {
        $this->assertNull($this->documentRootObject);
        $this->assertNull($this->getDocumentRootObject());
    }

    public function testCreateAndInitDocumentRootObjectByFormatProvider(): void
    {
        $this->setCurrentDocumentFormatProvider(new InvoiceSuiteZfFxExtendedProvider());
        $this->createAndInitDocumentRootObjectByFormatProvider();
        $this->assertInstanceOf(CrossIndustryInvoice::class, $this->documentRootObject);
        $this->assertInstanceOf(CrossIndustryInvoice::class, $this->getDocumentRootObject());
    }
}
