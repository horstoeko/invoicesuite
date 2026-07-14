<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\visualizers;

use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFormatProviderNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteInvalidArgumentException;
use horstoeko\invoicesuite\InvoiceSuiteDocumentBuilder;
use horstoeko\invoicesuite\InvoiceSuiteDocumentReader;
use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\visualizers\abstracts\InvoiceSuiteVisualizerAbstractRenderer;
use horstoeko\invoicesuite\visualizers\InvoiceSuiteVisualizer;
use horstoeko\invoicesuite\visualizers\renderers\InvoiceSuiteVisualizerFileTemplateRenderer;
use horstoeko\invoicesuite\visualizers\renderers\InvoiceSuiteVisualizerStringTemplateRenderer;
use Mpdf\Mpdf;

final class InvoiceSuiteVisualizerTest extends TestCase
{
    private const INVOICE_FIXTURE_FILENAME = __DIR__ . '/../../assets/00_case_comfort_simple.xml';

    private const TEST_ASSET_DIRECTORY = __DIR__ . '/../../assets';

    public function testCreateFromDocumentReaderKeepsReaderAndRenderer(): void
    {
        $documentReader = InvoiceSuiteDocumentReader::createFromFile(self::INVOICE_FIXTURE_FILENAME);
        $renderer = $this->createMock(InvoiceSuiteVisualizerAbstractRenderer::class);

        $visualizer = InvoiceSuiteVisualizer::createFromDocumentReader($documentReader, $renderer);

        $documentReaderProperty = $this->getPrivatePropertyFromObject($visualizer, 'documentReader');
        $rendererProperty = $this->getPrivatePropertyFromObject($visualizer, 'renderer');

        $this->assertSame($documentReader, $documentReaderProperty->getValue($visualizer));
        $this->assertSame($renderer, $rendererProperty->getValue($visualizer));
    }

    public function testCreateFromDocumentBuilderCreatesReaderFromBuilderContent(): void
    {
        $documentContent = (string) file_get_contents(self::INVOICE_FIXTURE_FILENAME);
        $documentBuilder = $this->getMockBuilder(InvoiceSuiteDocumentBuilder::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['getContent'])
            ->getMock();
        $documentBuilder->expects($this->once())
            ->method('getContent')
            ->willReturn($documentContent);

        $visualizer = InvoiceSuiteVisualizer::createFromDocumentBuilder($documentBuilder);
        $documentReaderProperty = $this->getPrivatePropertyFromObject($visualizer, 'documentReader');
        $documentReader = $documentReaderProperty->getValue($visualizer);

        $this->assertInstanceOf(InvoiceSuiteDocumentReader::class, $documentReader);
        $this->assertSame($documentContent, $documentReader->getOriginalDocumentContent());
    }

    public function testCreateFromContentCreatesReaderAndKeepsRenderer(): void
    {
        $documentContent = (string) file_get_contents(self::INVOICE_FIXTURE_FILENAME);
        $renderer = new InvoiceSuiteVisualizerStringTemplateRenderer();

        $visualizer = InvoiceSuiteVisualizer::createFromContent($documentContent, $renderer);
        $documentReaderProperty = $this->getPrivatePropertyFromObject($visualizer, 'documentReader');
        $rendererProperty = $this->getPrivatePropertyFromObject($visualizer, 'renderer');
        $documentReader = $documentReaderProperty->getValue($visualizer);

        $this->assertInstanceOf(InvoiceSuiteDocumentReader::class, $documentReader);
        $this->assertSame($documentContent, $documentReader->getOriginalDocumentContent());
        $this->assertSame($renderer, $rendererProperty->getValue($visualizer));
    }

    public function testCreateFromFileCreatesReaderFromFile(): void
    {
        $visualizer = InvoiceSuiteVisualizer::createFromFile(self::INVOICE_FIXTURE_FILENAME);
        $documentReaderProperty = $this->getPrivatePropertyFromObject($visualizer, 'documentReader');
        $documentReader = $documentReaderProperty->getValue($visualizer);

        $this->assertInstanceOf(InvoiceSuiteDocumentReader::class, $documentReader);
        $this->assertSame(
            file_get_contents(self::INVOICE_FIXTURE_FILENAME),
            $documentReader->getOriginalDocumentContent()
        );
    }

    public function testCreateFromFileRejectsMissingFile(): void
    {
        $missingFilename = self::TEST_ASSET_DIRECTORY . '/' . bin2hex(random_bytes(16)) . '.xml';

        $this->assertFileDoesNotExist($missingFilename);
        $this->expectException(InvoiceSuiteFileNotFoundException::class);

        InvoiceSuiteVisualizer::createFromFile($missingFilename);
    }

    public function testCreateFromContentRejectsUnknownContent(): void
    {
        $this->expectException(InvoiceSuiteFormatProviderNotFoundException::class);

        InvoiceSuiteVisualizer::createFromContent('not an invoice');
    }

    public function testSetRendererAndTemplateAreFluent(): void
    {
        $visualizer = $this->createVisualizer();
        $renderer = new InvoiceSuiteVisualizerStringTemplateRenderer();

        $this->assertSame($visualizer, $visualizer->setRenderer($renderer));
        $this->assertSame($visualizer, $visualizer->setTemplate('<p>Invoice</p>'));

        $rendererProperty = $this->getPrivatePropertyFromObject($visualizer, 'renderer');
        $templateProperty = $this->getPrivatePropertyFromObject($visualizer, 'template');

        $this->assertSame($renderer, $rendererProperty->getValue($visualizer));
        $this->assertSame('<p>Invoice</p>', $templateProperty->getValue($visualizer));
    }

    public function testSetTemplateRejectsEmptyTemplate(): void
    {
        $visualizer = $this->createVisualizer();

        $this->expectException(InvoiceSuiteInvalidArgumentException::class);
        $this->expectExceptionMessage('The template must not be empty');

        $visualizer->setTemplate('');
    }

    public function testSetDefaultTemplateConfiguresBuiltInRendererAndTemplate(): void
    {
        $visualizer = $this->createVisualizer();

        $this->assertSame($visualizer, $visualizer->setDefaultTemplate());

        $rendererProperty = $this->getPrivatePropertyFromObject($visualizer, 'renderer');
        $templateProperty = $this->getPrivatePropertyFromObject($visualizer, 'template');
        $templateFilename = $templateProperty->getValue($visualizer);

        $this->assertInstanceOf(
            InvoiceSuiteVisualizerFileTemplateRenderer::class,
            $rendererProperty->getValue($visualizer)
        );
        $this->assertIsString($templateFilename);
        $this->assertFileExists($templateFilename);
        $this->assertStringEndsWith('/src/visualizers/templates/default.tmpl', str_replace('\\', '/', $templateFilename));
    }

    public function testPdfFontDirectoryConfigurationIgnoresInvalidDirectories(): void
    {
        $visualizer = $this->createVisualizer();
        $secondValidDirectory = __DIR__ . '/../../assets/..';
        $missingDirectory = self::TEST_ASSET_DIRECTORY . '/' . bin2hex(random_bytes(16));

        $this->assertSame($visualizer, $visualizer->addPdfFontDirectory(''));
        $this->assertSame($visualizer, $visualizer->addPdfFontDirectory($missingDirectory));
        $this->assertSame($visualizer, $visualizer->addPdfFontDirectory(self::TEST_ASSET_DIRECTORY));
        $this->assertSame(
            $visualizer,
            $visualizer->addPdfFontDirectories([$secondValidDirectory, $missingDirectory])
        );

        $fontDirectoriesProperty = $this->getPrivatePropertyFromObject($visualizer, 'pdfFontDirectories');

        $this->assertSame(
            [self::TEST_ASSET_DIRECTORY, $secondValidDirectory],
            $fontDirectoriesProperty->getValue($visualizer)
        );
    }

    public function testPdfFontDataConfigurationSupportsAllInputMethods(): void
    {
        $visualizer = $this->createVisualizer();

        $this->assertSame($visualizer, $visualizer->addPdfFontData('', 'R', 'empty-name.ttf'));
        $this->assertSame($visualizer, $visualizer->addPdfFontData('empty-style', '', 'empty-style.ttf'));
        $this->assertSame($visualizer, $visualizer->addPdfFontData('empty-file', 'R', ''));
        $this->assertSame($visualizer, $visualizer->addPdfFontData('firstfont', 'R', 'regular.ttf'));
        $this->assertSame($visualizer, $visualizer->addPdfFontData('firstfont', 'R', 'regular-new.ttf'));
        $this->assertSame(
            $visualizer,
            $visualizer->addPdfFontDatas([
                ['firstfont', 'B', 'bold.ttf'],
                ['secondfont', 'I', 'italic.ttf'],
            ])
        );
        $this->assertSame(
            $visualizer,
            $visualizer->addPdfFontDatasFromStringArray([
                ' thirdfont : BI : bold-italic.ttf ',
                'fourthfont:R:path:with:colon.ttf',
                'invalid-font-data',
                ':R:missing-name.ttf',
            ])
        );

        $fontDataProperty = $this->getPrivatePropertyFromObject($visualizer, 'pdfFontData');

        $this->assertSame(
            [
                'firstfont' => [
                    'R' => 'regular-new.ttf',
                    'B' => 'bold.ttf',
                ],
                'secondfont' => [
                    'I' => 'italic.ttf',
                ],
                'thirdfont' => [
                    'BI' => 'bold-italic.ttf',
                ],
                'fourthfont' => [
                    'R' => 'path:with:colon.ttf',
                ],
            ],
            $fontDataProperty->getValue($visualizer)
        );
    }

    public function testPdfFontDefaultAndPaperSizeConfigurationIgnoreInvalidValues(): void
    {
        $visualizer = $this->createVisualizer();
        $fontDefaultProperty = $this->getPrivatePropertyFromObject($visualizer, 'pdfFontDefault');
        $paperSizeProperty = $this->getPrivatePropertyFromObject($visualizer, 'pdfPaperSize');

        $this->assertSame('dejavusans', $fontDefaultProperty->getValue($visualizer));
        $this->assertSame('A4-P', $paperSizeProperty->getValue($visualizer));

        $this->assertSame($visualizer, $visualizer->setPdfFontDefault(''));
        $this->assertSame($visualizer, $visualizer->setPdfPaperSize('A5'));
        $this->assertSame('dejavusans', $fontDefaultProperty->getValue($visualizer));
        $this->assertSame('A4-P', $paperSizeProperty->getValue($visualizer));

        $this->assertSame($visualizer, $visualizer->setPdfFontDefault('dejavusanscondensed'));
        $this->assertSame($visualizer, $visualizer->setPdfPaperSize('A5-L'));
        $this->assertSame('dejavusanscondensed', $fontDefaultProperty->getValue($visualizer));
        $this->assertSame('A5-L', $paperSizeProperty->getValue($visualizer));

        $this->assertSame($visualizer, $visualizer->setPdfPaperSize('invalid'));
        $this->assertSame('A5-L', $paperSizeProperty->getValue($visualizer));
    }

    public function testRenderMarkupUsesConfiguredRenderer(): void
    {
        $documentReader = InvoiceSuiteDocumentReader::createFromFile(self::INVOICE_FIXTURE_FILENAME);
        $renderer = $this->createMock(InvoiceSuiteVisualizerAbstractRenderer::class);
        $renderer->expects($this->once())
            ->method('templateExists')
            ->with('custom-template')
            ->willReturn(true);
        $renderer->expects($this->once())
            ->method('render')
            ->with($this->identicalTo($documentReader), 'custom-template')
            ->willReturn('<html>custom rendering</html>');

        $visualizer = InvoiceSuiteVisualizer::createFromDocumentReader($documentReader, $renderer)
            ->setTemplate('custom-template');

        $this->assertSame('<html>custom rendering</html>', $visualizer->renderMarkup());
    }

    public function testRenderMarkupSelectsFileRendererWhenNoneWasConfigured(): void
    {
        $templateFilename = $this->createTemporaryFilename('tmpl');
        $templateContent = <<<'TMPL'
<?php
$document->getDocumentNo($documentNumber);
?>
<p>Document: <?php echo $documentNumber; ?></p>
TMPL;
        $this->assertNotFalse(file_put_contents($templateFilename, $templateContent));

        $visualizer = $this->createVisualizer()->setTemplate($templateFilename);
        $renderedMarkup = $visualizer->renderMarkup();
        $rendererProperty = $this->getPrivatePropertyFromObject($visualizer, 'renderer');

        $this->assertInstanceOf(
            InvoiceSuiteVisualizerFileTemplateRenderer::class,
            $rendererProperty->getValue($visualizer)
        );
        $this->assertStringContainsString('<p>Document: 471102</p>', $renderedMarkup);
    }

    public function testRenderMarkupRejectsMissingTemplateConfiguration(): void
    {
        $visualizer = $this->createVisualizer();

        $this->expectException(InvoiceSuiteInvalidArgumentException::class);
        $this->expectExceptionMessage('No template specified');

        $visualizer->renderMarkup();
    }

    public function testRenderMarkupRejectsUnknownTemplate(): void
    {
        $missingTemplateFilename = self::TEST_ASSET_DIRECTORY . '/' . bin2hex(random_bytes(16)) . '.tmpl';
        $visualizer = $this->createVisualizer(new InvoiceSuiteVisualizerFileTemplateRenderer())
            ->setTemplate($missingTemplateFilename);

        $this->assertFileDoesNotExist($missingTemplateFilename);
        $this->expectException(InvoiceSuiteInvalidArgumentException::class);
        $this->expectExceptionMessage('Specified template does not exist');

        $visualizer->renderMarkup();
    }

    public function testRenderMarkupFileWritesMarkupAndReturnsSameInstance(): void
    {
        $targetFilename = $this->createTemporaryFilename('html');
        $markup = '<!doctype html><html><body>Invoice markup</body></html>';
        $visualizer = $this->createVisualizer(new InvoiceSuiteVisualizerStringTemplateRenderer())
            ->setTemplate($markup);

        $this->assertSame($visualizer, $visualizer->renderMarkupFile($targetFilename));
        $this->assertFileExists($targetFilename);
        $this->assertSame($markup, file_get_contents($targetFilename));
    }

    public function testDefaultTemplateRendersInvoiceData(): void
    {
        $renderedMarkup = $this->createVisualizer()
            ->setDefaultTemplate()
            ->renderMarkup();

        $this->assertStringContainsString('<body>', $renderedMarkup);
        $this->assertStringContainsString('Kunden AG Mitte', $renderedMarkup);
        $this->assertStringContainsString('Kundenstraße 15', $renderedMarkup);
        $this->assertStringContainsString('DE 69876 Frankfurt', $renderedMarkup);
        $this->assertStringContainsString('Invoice 471102', $renderedMarkup);
        $this->assertStringContainsString('Invoice Date 15.11.2024', $renderedMarkup);
        $this->assertStringContainsString('Trennblätter A4', $renderedMarkup);
        $this->assertStringContainsString('Joghurt Banane', $renderedMarkup);
        $this->assertStringContainsString('198.00 EUR', $renderedMarkup);
        $this->assertStringContainsString('275.00 EUR', $renderedMarkup);
        $this->assertStringContainsString('529.87 EUR', $renderedMarkup);
        $this->assertStringContainsString(
            'Zahlbar innerhalb 30 Tagen netto bis 15.12.2024, 3% Skonto innerhalb 10 Tagen bis 25.11.2024',
            $renderedMarkup
        );
    }

    public function testDefaultTemplateEscapesDocumentContent(): void
    {
        $documentContent = (string) file_get_contents(self::INVOICE_FIXTURE_FILENAME);
        $htmlInjectionPayload = '<img src="file:///etc/passwd" onerror=\'alert(1)\'>&';
        $xmlEncodedPayload = htmlspecialchars($htmlInjectionPayload, ENT_QUOTES | ENT_XML1, 'UTF-8');
        $documentContent = str_replace(
            ['Kunden AG Mitte', 'Kundenstraße 15', 'Trennblätter A4'],
            $xmlEncodedPayload,
            $documentContent
        );

        $renderedMarkup = InvoiceSuiteVisualizer::createFromContent($documentContent)
            ->setDefaultTemplate()
            ->renderMarkup();
        $htmlEncodedPayload = htmlspecialchars(
            $htmlInjectionPayload,
            ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5,
            'UTF-8'
        );

        $this->assertStringNotContainsString($htmlInjectionPayload, $renderedMarkup);
        $this->assertStringNotContainsString('<img src="file:///etc/passwd"', $renderedMarkup);
        $this->assertSame(3, substr_count($renderedMarkup, $htmlEncodedPayload));
    }

    public function testRenderPdfUsesConfigurationAndInvokesCallbacks(): void
    {
        $visualizer = $this->createVisualizer(new InvoiceSuiteVisualizerStringTemplateRenderer())
            ->setTemplate('<html><body>PDF callback test</body></html>')
            ->addPdfFontDirectory(self::TEST_ASSET_DIRECTORY)
            ->addPdfFontData('visualizertest', 'R', 'unused-test-font.ttf')
            ->setPdfFontDefault('dejavusanscondensed')
            ->setPdfPaperSize('A5-L');
        $capturedConfig = null;
        $preInitVisualizer = null;
        $preInitCallCount = 0;
        $postInitPdfEngine = null;
        $postInitVisualizer = null;
        $postInitCallCount = 0;

        $this->assertSame(
            $visualizer,
            $visualizer->setPdfPreInitCallback(
                static function (array $config, InvoiceSuiteVisualizer $callbackVisualizer) use (&$capturedConfig, &$preInitVisualizer, &$preInitCallCount): array {
                    ++$preInitCallCount;
                    $capturedConfig = $config;
                    $preInitVisualizer = $callbackVisualizer;
                    $config['PDFA'] = false;
                    $config['PDFAauto'] = false;

                    return $config;
                }
            )
        );
        $this->assertSame(
            $visualizer,
            $visualizer->setPdfPostInitCallback(
                static function (Mpdf $pdfEngine, InvoiceSuiteVisualizer $callbackVisualizer) use (&$postInitPdfEngine, &$postInitVisualizer, &$postInitCallCount): void {
                    ++$postInitCallCount;
                    $postInitPdfEngine = $pdfEngine;
                    $postInitVisualizer = $callbackVisualizer;
                }
            )
        );

        $pdfContent = $visualizer->renderPdf();

        $this->assertStringStartsWith('%PDF-', $pdfContent);
        $this->assertIsArray($capturedConfig);
        $this->assertContains(self::TEST_ASSET_DIRECTORY, $capturedConfig['fontDir']);
        $this->assertSame(
            ['R' => 'unused-test-font.ttf'],
            $capturedConfig['fontdata']['visualizertest']
        );
        $this->assertSame('dejavusanscondensed', $capturedConfig['default_font']);
        $this->assertSame('A5-L', $capturedConfig['format']);
        $this->assertTrue($capturedConfig['PDFA']);
        $this->assertTrue($capturedConfig['PDFAauto']);
        $this->assertSame(1, $preInitCallCount);
        $this->assertSame($visualizer, $preInitVisualizer);
        $this->assertInstanceOf(Mpdf::class, $postInitPdfEngine);
        $this->assertFalse($postInitPdfEngine->PDFA);
        $this->assertFalse($postInitPdfEngine->PDFAauto);
        $this->assertSame(1, $postInitCallCount);
        $this->assertSame($visualizer, $postInitVisualizer);
    }

    public function testRenderPdfFileWritesPdfAndReturnsSameInstance(): void
    {
        $targetFilename = $this->createTemporaryFilename('pdf');
        $visualizer = $this->createVisualizer(new InvoiceSuiteVisualizerStringTemplateRenderer())
            ->setTemplate('<html><body>PDF file test</body></html>')
            ->setPdfPreInitCallback(
                static function (array $config): array {
                    $config['PDFA'] = false;
                    $config['PDFAauto'] = false;

                    return $config;
                }
            );

        $this->assertSame($visualizer, $visualizer->renderPdfFile($targetFilename));
        $this->assertFileExists($targetFilename);

        $pdfContent = file_get_contents($targetFilename);

        $this->assertNotFalse($pdfContent);
        $this->assertStringStartsWith('%PDF-', $pdfContent);
        $this->assertGreaterThan(1000, strlen($pdfContent));
    }

    /**
     * Create a visualizer for the shared invoice fixture.
     *
     * @param  null|InvoiceSuiteVisualizerAbstractRenderer $renderer
     * @return InvoiceSuiteVisualizer
     */
    private function createVisualizer(
        ?InvoiceSuiteVisualizerAbstractRenderer $renderer = null
    ): InvoiceSuiteVisualizer {
        return InvoiceSuiteVisualizer::createFromFile(self::INVOICE_FIXTURE_FILENAME, $renderer);
    }

    /**
     * Create a unique filename and register it for automatic test cleanup.
     *
     * @param  string $extension
     * @return string
     */
    private function createTemporaryFilename(
        string $extension
    ): string {
        $temporaryFilename = self::TEST_ASSET_DIRECTORY . '/' . bin2hex(random_bytes(16)) . '.' . $extension;

        $this->registerFileForTestMethodTeardown($temporaryFilename);

        return $temporaryFilename;
    }
}
