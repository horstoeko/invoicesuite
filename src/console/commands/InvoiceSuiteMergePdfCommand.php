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
use horstoeko\invoicesuite\InvoiceSuitePdfDocumentBuilder;
use horstoeko\invoicesuite\utils\InvoiceSuiteFileUtils;
use RuntimeException;
use Symfony\Component\Console\Exception\InvalidArgumentException;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

/**
 * Class representing a console command that embeds an XML invoice document into a PDF file.
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteMergePdfCommand extends InvoiceSuiteAbstractCommand
{
    /**
     * Configure command.
     *
     * @return void
     *
     * @throws InvalidArgumentException
     */
    protected function configure(): void
    {
        $this->setName('invoicesuite:merge');
        $this->setDescription('Embed an XML invoice document into a PDF file');
        $this->addArgument('xml-file', InputArgument::REQUIRED, 'The XML invoice document to embed');
        $this->addArgument('pdf-file', InputArgument::REQUIRED, 'The PDF file to use as base document');
        $this->addArgument('output-file', InputArgument::REQUIRED, 'The target PDF file');
        $this->addOption('force', 'f', InputOption::VALUE_NONE, 'Overwrite the target PDF file if it already exists');
    }

    /**
     * Execute command.
     *
     * @return int
     *
     * @throws InvalidArgumentException
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws InvoiceSuiteFormatProviderNotFoundException
     * @throws RuntimeException
     */
    protected function handle(): int
    {
        $xmlFilename = $this->getSourceXmlOrJsonFileArgument('xml-file');
        $pdfFilename = $this->getSourcePdfFileArgument('pdf-file');
        $outputFilename = $this->getTargetFileArgument('output-file', $this->getBoolOption('force'));

        $this->ensureIsXmlFile($xmlFilename);
        $this->ensureIsPdfFile($pdfFilename);

        InvoiceSuitePdfDocumentBuilder::createFromDocumentContentAndPdfFile(
            InvoiceSuiteFileUtils::getContentFromFileOrString($xmlFilename),
            $pdfFilename
        )->generatePdfDocumentAndSaveToFile($outputFilename);

        $this->outputLineLF(sprintf('<info>Created:</info> %s', $outputFilename));

        return $this->returnSuccess();
    }
}
