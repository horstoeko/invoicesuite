<?php

namespace horstoeko\invoicesuite\tests\testcases\concerns;

use horstoeko\invoicesuite\concerns\HandlesPdfConstructorRawContents;
use horstoeko\invoicesuite\tests\TestCase;

class HandlesPdfConstructorRawContentsTest extends TestCase
{
    use HandlesPdfConstructorRawContents;

    public function testRawDocumentContent(): void
    {
        $this->setRawDocumentContent("abc");
        $this->assertSame("abc", $this->getRawDocumentContent());
        $this->assertSame("abc", $this->getPrivatePropertyFromObject($this, 'rawDocumentContent')->getValue());
    }

    public function testRawPdfContent(): void
    {
        $this->setRawPdfContent("abc");
        $this->assertSame("abc", $this->getRawPdfContent());
        $this->assertSame("abc", $this->getPrivatePropertyFromObject($this, 'rawPdfContent')->getValue());
    }
}
