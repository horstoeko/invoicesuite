<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\visualizers;

use horstoeko\invoicesuite\documents\abstracts\InvoiceSuiteAbstractDocumentFormatReader;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotReadableException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFormatProviderNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteInvalidArgumentException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteUnknownContentException;
use horstoeko\invoicesuite\InvoiceSuiteDocumentBuilder;
use horstoeko\invoicesuite\InvoiceSuiteDocumentReader;
use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use horstoeko\invoicesuite\visualizers\abstracts\InvoiceSuiteVisualizerAbstractRenderer;
use horstoeko\invoicesuite\visualizers\renderers\InvoiceSuiteVisualizerFileTemplateRenderer;
use InvalidArgumentException;
use JMS\Serializer\Exception\RuntimeException;
use Mpdf\Config\ConfigVariables;
use Mpdf\Config\FontVariables;
use Mpdf\Mpdf;

/**
 * Class representing the visualizer for documents
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteVisualizer
{
    /**
     * The internal document reaader instance
     *
     * @var InvoiceSuiteAbstractDocumentFormatReader
     */
    private $documentReader;

    /**
     * The renderer to use
     *
     * @var InvoiceSuiteVisualizerAbstractRenderer
     */
    private $renderer;

    /**
     * The template for the renderer to use
     *
     * @var string
     */
    private $template = '';

    /**
     * The directories where to search for additional fonts
     *
     * @var array<int,string>
     *
     * @see https://mpdf.github.io/fonts-languages/fonts-in-mpdf-7-x.html
     */
    private $pdfFontDirectories = [];

    /**
     * The definitions for additional fonts
     *
     * @var array<string, array<string, string>>
     *
     * @see https://mpdf.github.io/fonts-languages/fonts-in-mpdf-7-x.html
     */
    private $pdfFontData = [];

    /**
     * The PDF default font
     *
     * @var string
     *
     * @see https://mpdf.github.io/fonts-languages/default-font.html
     */
    private $pdfFontDefault = 'dejavusans';

    /**
     * The PDF paper size. Notation: <Format>-[P|L]
     *
     * @var string
     *
     * @see https://mpdf.github.io/paging/page-size-orientation.html
     */
    private $pdfPaperSize = 'A4-P';

    /**
     * A callbacl which is called before MPDF is instanciated. Here is the possibillity to set custom options for MPDF
     *
     * @var null|callable(array<string, mixed>, InvoiceSuiteVisualizer): array<string, mixed>
     */
    private $mpdfPreInitCallback;

    /**
     * A callbacl which is called after MPDF is instanciated. Here is the possibillity to set custom options for MPDF
     *
     * @var null|callable(Mpdf, InvoiceSuiteVisualizer): void
     */
    private $mpdfPostInitCallback;

    /**
     * Constructor
     *
     * @param  InvoiceSuiteAbstractDocumentFormatReader    $documentReader
     * @param  null|InvoiceSuiteVisualizerAbstractRenderer $renderer
     * @return void
     */
    final protected function __construct(InvoiceSuiteAbstractDocumentFormatReader $documentReader, ?InvoiceSuiteVisualizerAbstractRenderer $renderer = null)
    {
        $this->documentReader = $documentReader;

        if ($renderer instanceof InvoiceSuiteVisualizerAbstractRenderer) {
            $this->setRenderer($renderer);
        }
    }

    /**
     * Factory for creating a visualizer by a InvoiceSuiteAbstractDocumentFormatReader
     *
     * @param  InvoiceSuiteAbstractDocumentFormatReader    $documentReader
     * @param  null|InvoiceSuiteVisualizerAbstractRenderer $renderer
     * @return static
     */
    public static function createFromDocumentProviderReader(InvoiceSuiteAbstractDocumentFormatReader $documentReader, ?InvoiceSuiteVisualizerAbstractRenderer $renderer = null): static
    {
        return new static($documentReader, $renderer);
    }

    /**
     * Factory for creating a visualizer by a InvoiceSuiteDocumentReader
     *
     * @param  InvoiceSuiteDocumentReader                  $documentReader
     * @param  null|InvoiceSuiteVisualizerAbstractRenderer $renderer
     * @return static
     */
    public static function createFromDocumentReader(InvoiceSuiteDocumentReader $documentReader, ?InvoiceSuiteVisualizerAbstractRenderer $renderer = null): static
    {
        return static::createFromDocumentProviderReader(
            $documentReader->getCurrentDocumentFormatProvider()->getReader(),
            $renderer
        );
    }

    /**
     * Factory for creating a visualizer by a InvoiceSuiteDocumentBuilder
     *
     * @param  InvoiceSuiteDocumentBuilder                 $documentBuilder
     * @param  null|InvoiceSuiteVisualizerAbstractRenderer $renderer
     * @return static
     *
     * @throws InvoiceSuiteFormatProviderNotFoundException
     * @throws InvoiceSuiteUnknownContentException
     * @throws RuntimeException
     */
    public static function createFromDocumentBuilder(InvoiceSuiteDocumentBuilder $documentBuilder, ?InvoiceSuiteVisualizerAbstractRenderer $renderer = null): static
    {
        return static::createFromDocumentReader(
            InvoiceSuiteDocumentReader::createFromContent($documentBuilder->getContent()),
            $renderer
        );
    }

    /**
     * Factory for creating a visualizer by content
     *
     * @param  string                                      $fromContent
     * @param  null|InvoiceSuiteVisualizerAbstractRenderer $renderer
     * @return static
     *
     * @throws InvoiceSuiteFormatProviderNotFoundException
     * @throws InvoiceSuiteUnknownContentException
     * @throws RuntimeException
     */
    public static function createFromContent(string $fromContent, ?InvoiceSuiteVisualizerAbstractRenderer $renderer = null): static
    {
        return static::createFromDocumentReader(
            InvoiceSuiteDocumentReader::createFromContent($fromContent),
            $renderer
        );
    }

    /**
     * Factory for creating a visualizer by document file
     *
     * @param  string                                      $fromFile
     * @param  null|InvoiceSuiteVisualizerAbstractRenderer $renderer
     * @return static
     *
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws InvoiceSuiteFormatProviderNotFoundException
     * @throws InvoiceSuiteUnknownContentException
     * @throws RuntimeException
     */
    public static function createFromFile(string $fromFile, ?InvoiceSuiteVisualizerAbstractRenderer $renderer = null): static
    {
        if (!file_exists($fromFile)) {
            throw new InvoiceSuiteFileNotFoundException($fromFile);
        }

        $fromContent = file_get_contents($fromFile);

        if (false === $fromContent) {
            throw new InvoiceSuiteFileNotReadableException($fromFile);
        }

        return static::createFromContent($fromContent, $renderer);
    }

    /**
     * Setup the renderer to use for generating markup
     *
     * @param  InvoiceSuiteVisualizerAbstractRenderer $renderer
     * @return static
     */
    public function setRenderer(InvoiceSuiteVisualizerAbstractRenderer $renderer): static
    {
        $this->renderer = $renderer;

        return $this;
    }

    /**
     * Set the template to use in the specified renderer
     *
     * @param  string $template
     * @return static
     *
     * @throws InvalidArgumentException
     */
    public function setTemplate(string $template): static
    {
        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($template)) {
            throw new InvalidArgumentException('The template must not be empty');
        }

        $this->template = $template;

        return $this;
    }

    /**
     * Sets the built-in template (and switch the markup-rendering engine to the default renderer)
     *
     * @return static
     *
     * @throws InvalidArgumentException
     */
    public function setDefaultTemplate(): static
    {
        $this->setRenderer(new InvoiceSuiteVisualizerFileTemplateRenderer());
        $this->setTemplate(
            InvoiceSuitePathUtils::combinePathWithFile(
                InvoiceSuitePathUtils::combineAllPaths(
                    __DIR__,
                    'templates'
                ),
                'default.php'
            )
        );

        return $this;
    }

    /**
     * Add an additional directory where the PDF-Engine will search for fonts
     *
     * @param  string $directory
     * @return static
     */
    public function addPdfFontDirectory(string $directory): static
    {
        if (!is_dir($directory)) {
            return $this;
        }

        $this->pdfFontDirectories[] = $directory;

        return $this;
    }

    /**
     * Add a font definition
     *
     * - Example 1: ``$visualizer->addPdfFont('frutiger', 'R', 'Frutiger-Normal.ttf')``
     * - Example 2: ``$visualizer->addPdfFont('frutiger', 'I', 'FrutigerObl-Normal.ttf')``
     *
     * @param  string $name
     * @param  string $style
     * @param  string $filename
     * @return static
     */
    public function addPdfFontData(string $name, string $style, string $filename): static
    {
        $this->pdfFontData[$name][$style] = $filename;

        return $this;
    }

    /**
     * Sets the default PDF default font
     *
     * @param  string $pdfFontDefault
     * @return static
     */
    public function setPdfFontDefault(string $pdfFontDefault): static
    {
        $this->pdfFontDefault = $pdfFontDefault;

        return $this;
    }

    /**
     * Sets the PDF papersize
     *
     * @param  string $pdfPaperSize
     * @return static
     */
    public function setPdfPaperSize(string $pdfPaperSize): static
    {
        if (preg_match('/([0-9a-zA-Z]*)-([P,L])/i', $pdfPaperSize, $_)) {
            $this->pdfPaperSize = $pdfPaperSize;
        }

        return $this;
    }

    /**
     * Set the callback which is called before the internal instance of the PDF-Engine is instanciated
     *
     * @param  callable(array<string, mixed>, InvoiceSuiteVisualizer): array<string, mixed> $callback
     * @return static
     */
    public function setPdfPreInitCallback(callable $callback): static
    {
        $this->mpdfPreInitCallback = $callback;

        return $this;
    }

    /**
     * Set the callback which is called after the internal instance of the PDF-Engine is instanciated
     *
     * @param  callable(Mpdf, InvoiceSuiteVisualizer): void $callback
     * @return static
     */
    public function setPdfPostInitCallback(callable $callback): static
    {
        $this->mpdfPostInitCallback = $callback;

        return $this;
    }

    /**
     * Renders the markup (HTML)
     *
     * @return string
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function renderMarkup(): string
    {
        return $this
            ->testMustUseDefaultRenderer()
            ->testTemplateIsSet()
            ->testTemplateExists()
            ->renderer->render($this->documentReader, $this->template);
    }

    /**
     * Renders the PDF by markup (HTML) and returns the PDF as a string
     *
     * @return string
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function renderPdf(): string
    {
        return $this->internalRenderPdf($this->renderMarkup(), 'S', 'dummy.pdf');
    }

    /**
     * Renders the PDF by markup (HTML) to a physical file
     *
     * @param  string $toFilename
     * @return static
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function renderPdfFile(string $toFilename): static
    {
        $this->internalRenderPdf($this->renderMarkup(), 'F', $toFilename);

        return $this;
    }

    /**
     * @param  string      $markup
     * @param  string      $outputDestination
     * @param  string      $toFilename
     * @return string|void
     */
    protected function internalRenderPdf(string $markup, string $outputDestination, string $toFilename)
    {
        $pdfEngine = $this->instanciatePdfEngine();

        $pdfEngine->WriteHTML($markup);

        return $pdfEngine->Output($toFilename, $outputDestination);
    }

    /**
     * If no renderer is specified the default renderer is
     * instanciated and used
     *
     * @return static
     */
    protected function testMustUseDefaultRenderer(): static
    {
        if (!$this->renderer) {
            $this->setRenderer(new InvoiceSuiteVisualizerFileTemplateRenderer());
        }

        return $this;
    }

    /**
     * Check if a template for the renderer is defined. If no one is set then an exception
     * is raised
     *
     * @return static
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    protected function testTemplateIsSet(): static
    {
        if (!$this->template) {
            throw new InvoiceSuiteInvalidArgumentException('No template specified');
        }

        return $this;
    }

    /**
     * Checks if the given template exists. If no one is set then an exception
     * is raised
     *
     * @return static
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    protected function testTemplateExists(): static
    {
        if (!$this->renderer->templateExists($this->template)) {
            throw new InvoiceSuiteInvalidArgumentException('Specified template does not exist');
        }

        return $this;
    }

    /**
     * Returns a new instance of the PDF-Engine (MPDF)
     *
     * @return Mpdf
     */
    private function instanciatePdfEngine(): Mpdf
    {
        $defaultConfig = (new ConfigVariables())->getDefaults();
        $defaultFontDirs = $defaultConfig['fontDir'];

        $defaultFontConfig = (new FontVariables())->getDefaults();
        $defaultFontData = $defaultFontConfig['fontdata'];

        $config = [
            'tempDir' => sys_get_temp_dir().'/mpdf',
            'fontDir' => array_merge($defaultFontDirs, $this->pdfFontDirectories),
            'fontdata' => $defaultFontData + $this->pdfFontData,
            'default_font' => $this->pdfFontDefault,
            'format' => $this->pdfPaperSize,
            'PDFA' => true,
            'PDFAauto' => true,
        ];

        if (is_callable($this->mpdfPreInitCallback)) {
            $config = call_user_func($this->mpdfPreInitCallback, $config, $this);
        }

        $pdf = new Mpdf($config);

        if (is_callable($this->mpdfPostInitCallback)) {
            call_user_func($this->mpdfPostInitCallback, $pdf, $this);
        }

        return $pdf;
    }
}
