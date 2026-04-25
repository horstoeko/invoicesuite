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
use horstoeko\invoicesuite\InvoiceSuiteDocumentReader;
use horstoeko\invoicesuite\InvoiceSuitePdfDocumentReader;
use PrinsFrank\PdfParser\Exception\PdfParserException;
use RuntimeException;
use Symfony\Component\Console\Exception\InvalidArgumentException as ConsoleInvalidArgumentException;
use Symfony\Component\Console\Helper\TableSeparator;
use Symfony\Component\Console\Input\InputArgument;

/**
 * Class representing a console command that detects the format of a given file
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteDetectCommand extends InvoiceSuiteAbstractCommand
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
        $this->setName('invoicesuite:detect');
        $this->setDescription('Detect the format of the given file');
        $this->addArgument('input-file', InputArgument::REQUIRED, 'The file to detect the format of');
    }

    /**
     * Execute command.
     *
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
    protected function handle(): int
    {
        $inpArgFilename = $this->getSourceXmlOrJsonFileArgument('input-file');

        if ($this->isPdfFile($inpArgFilename)) {
            return $this->handlePdf(InvoiceSuitePdfDocumentReader::createFromFile($inpArgFilename))->returnSuccess();
        }

        if ($this->isXmlFile($inpArgFilename) || $this->isJsonFile($inpArgFilename)) {
            return $this->handleXml(InvoiceSuiteDocumentReader::createFromFile($inpArgFilename))->returnSuccess();
        }

        return self::SUCCESS;
    }

    /**
     * Handle output for PDF documents
     *
     * @param  InvoiceSuitePdfDocumentReader $pdfReader
     * @return static
     */
    protected function handlePdf(InvoiceSuitePdfDocumentReader $pdfReader): static
    {
        $tableRows[] = ['ID', $pdfReader->getCurrentDocumentFormatProvider()->getUniqueId()];
        $tableRows[] = ['Description', mb_strimwidth($pdfReader->getCurrentDocumentFormatProvider()->getDescription(), 0, 60, '...')];
        $tableRows[] = [new TableSeparator(), new TableSeparator()];
        $tableRows[] = ['Document Attachment name', $pdfReader->getInvoiceDocumentAttachment()->getAttachmentFilename()];
        $tableRows[] = ['Document Attachment type', $pdfReader->getInvoiceDocumentAttachment()->getAttachmentMimeType()];
        $tableRows[] = [new TableSeparator(), new TableSeparator()];
        $tableRows[] = ['Additional attachments', count($pdfReader->getAdditionalDocumentAttachments())];

        if (count($pdfReader->getAdditionalDocumentAttachments()) > 0) {
            foreach ($pdfReader->getAdditionalDocumentAttachments() as $attachment) {
                $tableRows[] = [new TableSeparator(), new TableSeparator()];
                $tableRows[] = ['Attachment name', $attachment->getAttachmentFilename()];
                $tableRows[] = ['Attachment type', $attachment->getAttachmentMimeType()];
            }
        }

        return $this->outputTable(['Info', 'Value'], $tableRows);
    }

    /**
     * Handle output for XML documents
     *
     * @param  InvoiceSuiteDocumentReader $xmlOrJsonReader
     * @return static
     *
     * @throws ConsoleInvalidArgumentException
     * @throws RuntimeException
     */
    protected function handleXml(InvoiceSuiteDocumentReader $xmlOrJsonReader): static
    {
        $tableRows[] = ['ID', $xmlOrJsonReader->getCurrentDocumentFormatProvider()->getUniqueId()];
        $tableRows[] = ['Description', mb_strimwidth($xmlOrJsonReader->getCurrentDocumentFormatProvider()->getDescription(), 0, 60, '...')];

        return $this->outputTable(['Info', 'Value'], $tableRows);
    }
}
