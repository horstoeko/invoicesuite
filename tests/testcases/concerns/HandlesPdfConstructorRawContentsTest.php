<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\concerns;

use horstoeko\invoicesuite\concerns\HandlesPdfConstructorRawContents;
use horstoeko\invoicesuite\tests\TestCase;

final class HandlesPdfConstructorRawContentsTest extends TestCase
{
    use HandlesPdfConstructorRawContents;

    public function testRawDocumentContent(): void
    {
        $this->setRawDocumentContent('abc');
        $this->assertSame('abc', $this->getRawDocumentContent());
        $this->assertSame('abc', $this->getPrivatePropertyFromObject($this, 'rawDocumentContent')->getValue($this));
    }

    public function testRawPdfContent(): void
    {
        $this->setRawPdfContent('abc');
        $this->assertSame('abc', $this->getRawPdfContent());
        $this->assertSame('abc', $this->getPrivatePropertyFromObject($this, 'rawPdfContent')->getValue($this));
    }
}
