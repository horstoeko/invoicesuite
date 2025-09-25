<?php

namespace horstoeko\invoicesuite\tests\testcases\concerns;

use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\concerns\HandlesDocumentSerializer;
use horstoeko\invoicesuite\concerns\HandlesCurrentDocumentFormatProvider;
use horstoeko\invoicesuite\providers\zffxextended\InvoiceSuiteZfFxExtendedProvider;

class HandlesSerializerTest extends TestCase
{
    use HandlesCurrentDocumentFormatProvider;
    use HandlesDocumentSerializer;

    public function testInitialState(): void
    {
        $this->assertNull($this->documentSerializerBuilder);
        $this->assertNull($this->documentSerializer);
    }

    public function testCreateAndInitSerializerByFormatProvider(): void
    {
        $this->setCurrentDocumentFormatProvider(new InvoiceSuiteZfFxExtendedProvider());
        $this->createAndInitDocumentSerializerByFormatProvider();
        $this->assertInstanceOf(SerializerBuilder::class, $this->documentSerializerBuilder);
        $this->assertInstanceOf(SerializerInterface::class, $this->documentSerializer);
    }
}
