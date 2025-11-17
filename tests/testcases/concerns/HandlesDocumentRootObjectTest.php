<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\concerns;

use horstoeko\invoicesuite\concerns\HandlesCurrentDocumentFormatProvider;
use horstoeko\invoicesuite\concerns\HandlesDocumentRootObject;
use horstoeko\invoicesuite\documents\models\zffxextended\rsm\CrossIndustryInvoice;
use horstoeko\invoicesuite\documents\providers\zffxextended\InvoiceSuiteZfFxExtendedProvider;
use horstoeko\invoicesuite\tests\TestCase;

final class HandlesDocumentRootObjectTest extends TestCase
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
