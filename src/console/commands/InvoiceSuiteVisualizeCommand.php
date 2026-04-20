<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\console\commands;

use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotReadableException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFormatProviderNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteInvalidArgumentException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteUnknownContentException;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use horstoeko\invoicesuite\visualizers\InvoiceSuiteVisualizer;
use JMS\Serializer\Exception\RuntimeException as JmsRuntimeException;
use PrinsFrank\PdfParser\Exception\PdfParserException;
use RuntimeException;
use Symfony\Component\Console\Exception\InvalidArgumentException as ConsoleInvalidArgumentException;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Render an invoice document as HTML or PDF.
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteVisualizeCommand extends InvoiceSuiteBaseCommand
{
    /**
     * Configure command.
     *
     * @return void
     *
     * @throws ConsoleInvalidArgumentException
     */
    protected function configure(): void
    {
        $this->setName('invoicesuite:visualize');
        $this->setDescription('Render an invoice document as HTML or PDF');
        $this->addArgument('input-file', InputArgument::REQUIRED, 'Input XML or PDF file');
        $this->addArgument('output-file', InputArgument::OPTIONAL, 'Target HTML or PDF file');
        $this->addOption('format', null, InputOption::VALUE_OPTIONAL, 'Output format: html or pdf', 'html');
        $this->addOption('template', null, InputOption::VALUE_OPTIONAL, 'Custom template file');
    }

    /**
     * Execute command.
     *
     * @param  InputInterface  $input
     * @param  OutputInterface $output
     * @return int
     *
     * @throws ConsoleInvalidArgumentException
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws InvoiceSuiteFormatProviderNotFoundException
     * @throws InvoiceSuiteInvalidArgumentException
     * @throws InvoiceSuiteUnknownContentException
     * @throws JmsRuntimeException
     * @throws PdfParserException
     * @throws RuntimeException
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $inputFilename = $this->requireReadableFilename($this->getStringArgument($input, 'input-file'));
        $format = strtolower($this->getStringOption($input, 'format', 'html'));
        $template = InvoiceSuiteStringUtils::asNullWhenEmpty($this->getStringOption($input, 'template'));
        $outputFilename = $this->getStringArgument(
            $input,
            'output-file',
            $this->buildOutputFilename($inputFilename, '-visualized', 'pdf' === $format ? 'pdf' : 'html')
        );

        if (!InvoiceSuiteArrayUtils::inArrayNoCase(['html', 'pdf'], $format)) {
            throw new InvoiceSuiteInvalidArgumentException(sprintf('Unsupported output format "%s". Use "html" or "pdf".', $format));
        }

        $documentReader = $this->createInvoiceDocumentReaderFromFilename($inputFilename);
        $visualizer = InvoiceSuiteVisualizer::createFromDocumentReader($documentReader);

        if (null === $template) {
            $visualizer->setDefaultTemplate();
        } else {
            $visualizer->setTemplate($template);
        }

        if ('pdf' === $format) {
            $visualizer->renderPdfFile($outputFilename);
        } else {
            $this->writeFileContents($outputFilename, $visualizer->renderMarkup());
        }

        $output->writeln(sprintf('<info>Written:</info> %s', $outputFilename));

        return self::SUCCESS;
    }
}
