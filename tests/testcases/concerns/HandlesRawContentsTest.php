<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\concerns;

use horstoeko\invoicesuite\concerns\HandlesRawContents;
use horstoeko\invoicesuite\tests\TestCase;

final class HandlesRawContentsTest extends TestCase
{
    use HandlesRawContents;

    public function testState(): void
    {
        $this->assertSame('', $this->rawDocumentContent);
        $this->assertSame('', $this->rawPdfContent);

        $this->assertSame('', $this->getRawDocumentContent());
        $this->assertSame('', $this->getRawPdfContent());

        $this->assertFalse($this->hasRawDocumentContent());
        $this->assertFalse($this->hasRawPdfContent());

        // Set Raw Document Content

        $this->setRawDocumentContent('Docuemnt content');

        $this->assertSame('Docuemnt content', $this->rawDocumentContent);
        $this->assertSame('', $this->rawPdfContent);

        $this->assertSame('Docuemnt content', $this->getRawDocumentContent());
        $this->assertSame('', $this->getRawPdfContent());

        $this->assertTrue($this->hasRawDocumentContent());
        $this->assertFalse($this->hasRawPdfContent());

        // Set PDF Content

        $this->setRawPdfContent('PDF content');

        $this->assertSame('Docuemnt content', $this->rawDocumentContent);
        $this->assertSame('PDF content', $this->rawPdfContent);

        $this->assertSame('Docuemnt content', $this->getRawDocumentContent());
        $this->assertSame('PDF content', $this->getRawPdfContent());

        $this->assertTrue($this->hasRawDocumentContent());
        $this->assertTrue($this->hasRawPdfContent());

        // Clear contents

        $this->clearRawDocumentContent();

        $this->assertSame('', $this->rawDocumentContent);
        $this->assertSame('PDF content', $this->rawPdfContent);

        $this->assertSame('', $this->getRawDocumentContent());
        $this->assertSame('PDF content', $this->getRawPdfContent());

        $this->assertFalse($this->hasRawDocumentContent());
        $this->assertTrue($this->hasRawPdfContent());

        $this->clearRawPdfContent();

        $this->assertSame('', $this->rawDocumentContent);
        $this->assertSame('', $this->rawPdfContent);

        $this->assertSame('', $this->getRawDocumentContent());
        $this->assertSame('', $this->getRawPdfContent());

        $this->assertFalse($this->hasRawDocumentContent());
        $this->assertFalse($this->hasRawPdfContent());
    }
}
