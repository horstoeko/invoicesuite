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
use horstoeko\invoicesuite\InvoiceSuitePdfDocumentReader;
use horstoeko\invoicesuite\pdfs\extractor\InvoiceSuitePdfExtractor;
use horstoeko\invoicesuite\pdfs\extractor\InvoiceSuitePdfExtractorAttachment;
use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;
use PrinsFrank\PdfParser\Exception\PdfParserException;
use RuntimeException;
use Symfony\Component\Console\Exception\InvalidArgumentException as ConsoleInvalidArgumentException;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Extract attachments from a PDF invoice document.
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteExtractCommand extends InvoiceSuiteAbstractCommand
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
        $this->setName('invoicesuite:extract');
        $this->setDescription('Extract embedded attachments from a PDF invoice document');
        $this->addArgument('input-file', InputArgument::REQUIRED, 'Input PDF file');
        $this->addArgument('output-directory', InputArgument::OPTIONAL, 'Target directory for extracted files');
        $this->addOption('invoice-only', null, InputOption::VALUE_NONE, 'Extract only the embedded invoice XML');
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
     * @throws PdfParserException
     * @throws RuntimeException
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $inputFilename = $this->requireReadablePdfFilename($this->getStringArgument($input, 'input-file'));
        $outputDirectory = $this->getStringArgument($input, 'output-directory', $this->buildOutputDirectory($inputFilename, '_attachments'));
        $outputDirectory = $this->ensureDirectoryExists(rtrim($outputDirectory, DIRECTORY_SEPARATOR));

        if ($this->getBoolOption($input, 'invoice-only')) {
            $pdfReader = InvoiceSuitePdfDocumentReader::createFromFile($inputFilename);
            $invoiceAttachment = $pdfReader->getInvoiceDocumentAttachment();

            if (!$invoiceAttachment instanceof InvoiceSuitePdfExtractorAttachment) {
                throw new InvoiceSuiteInvalidArgumentException(sprintf('The file %s does not contain an embedded invoice document.', $inputFilename));
            }

            $targetFilename = InvoiceSuitePathUtils::combinePathWithFile($outputDirectory, $invoiceAttachment->getAttachmentFilename());
            $this->writeFileContents($targetFilename, $invoiceAttachment->getAttachmentContent());
            $output->writeln(sprintf('<info>Extracted:</info> %s', $targetFilename));

            return self::SUCCESS;
        }

        $extractor = InvoiceSuitePdfExtractor::fromFile($inputFilename);

        if (0 === count($extractor)) {
            throw new InvoiceSuiteInvalidArgumentException(sprintf('The file %s does not contain any embedded attachments.', $inputFilename));
        }

        foreach ($extractor as $attachment) {
            $targetFilename = InvoiceSuitePathUtils::combinePathWithFile($outputDirectory, $attachment->getAttachmentFilename());
            $this->writeFileContents($targetFilename, $attachment->getAttachmentContent());
            $output->writeln(sprintf('<info>Extracted:</info> %s', $targetFilename));
        }

        return self::SUCCESS;
    }
}
