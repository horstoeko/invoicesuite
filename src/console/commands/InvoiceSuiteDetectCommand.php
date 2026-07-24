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
use horstoeko\invoicesuite\exceptions\InvoiceSuiteInternalMethodCallException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteInvalidArgumentException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteUnknownContentException;
use horstoeko\invoicesuite\InvoiceSuiteDocumentReader;
use horstoeko\invoicesuite\InvoiceSuitePdfDocumentReader;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use PrinsFrank\PdfParser\Exception\PdfParserException;
use RuntimeException;
use Symfony\Component\Console\Exception\InvalidArgumentException as ConsoleInvalidArgumentException;
use Symfony\Component\Console\Helper\TableSeparator;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

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
        $this->addOption('output-json', null, InputOption::VALUE_NONE, 'Output results as JSON');
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
     * @throws InvoiceSuiteInternalMethodCallException
     * @throws InvoiceSuiteInvalidArgumentException
     * @throws InvoiceSuiteUnknownContentException
     * @throws PdfParserException
     * @throws RuntimeException
     */
    protected function handle(): int
    {
        $inpArgFilename = $this->getSourceFileArgument('input-file');

        if ($this->isPdfFile($inpArgFilename)) {
            return $this->handlePdf(InvoiceSuitePdfDocumentReader::createFromFile($inpArgFilename))->returnSuccess();
        }

        if ($this->isXmlOrJsonFile($inpArgFilename)) {
            return $this->handleXml(InvoiceSuiteDocumentReader::createFromFile($inpArgFilename))->returnSuccess();
        }

        return $this->handleUnknownType()->returnFailure();
    }

    /**
     * Handle output for PDF documents
     *
     * @param  InvoiceSuitePdfDocumentReader $pdfReader
     * @return static
     *
     * @throws ConsoleInvalidArgumentException
     * @throws RuntimeException
     */
    protected function handlePdf(
        InvoiceSuitePdfDocumentReader $pdfReader
    ): static {
        $jsonResult = [
            'id' => $pdfReader->getCurrentDocumentFormatProvider()->getUniqueId(),
            'description' => $pdfReader->getCurrentDocumentFormatProvider()->getDescription(),
            'documentAttachmentName' => $pdfReader->getInvoiceDocumentAttachment()->getAttachmentFilename(),
            'documentAttachmentMimeType' => $pdfReader->getInvoiceDocumentAttachment()->getAttachmentMimeType(),
            'noOfAdditionalAttachments' => InvoiceSuiteArrayUtils::count($pdfReader->getAdditionalDocumentAttachments()),
            'additionalAttachments' => InvoiceSuiteArrayUtils::map(static fn ($attachment) => [
                'name' => $attachment->getAttachmentFilename(),
                'mimeType' => $attachment->getAttachmentMimeType(),
            ], $pdfReader->getAdditionalDocumentAttachments()),
            'error' => false,
        ];

        $tableRows = [];

        $tableRows[] = ['ID', $pdfReader->getCurrentDocumentFormatProvider()->getUniqueId()];
        $tableRows[] = ['Description', InvoiceSuiteStringUtils::mbTrimWidth($pdfReader->getCurrentDocumentFormatProvider()->getDescription(), 0, 60, '...')];
        $tableRows[] = ['Error', 'no'];
        $tableRows[] = [new TableSeparator(), new TableSeparator()];
        $tableRows[] = ['Document Attachment name', $pdfReader->getInvoiceDocumentAttachment()->getAttachmentFilename()];
        $tableRows[] = ['Document Attachment type', $pdfReader->getInvoiceDocumentAttachment()->getAttachmentMimeType()];
        $tableRows[] = [new TableSeparator(), new TableSeparator()];
        $tableRows[] = ['Additional attachments', InvoiceSuiteArrayUtils::count($pdfReader->getAdditionalDocumentAttachments())];

        foreach ($pdfReader->getAdditionalDocumentAttachments() as $attachment) {
            $tableRows[] = [new TableSeparator(), new TableSeparator()];
            $tableRows[] = ['Attachment name', $attachment->getAttachmentFilename()];
            $tableRows[] = ['Attachment type', $attachment->getAttachmentMimeType()];
        }

        return $this
            ->outputJsonWhen($this->getBoolOption('output-json'), $jsonResult)
            ->outputTableWhen(!$this->getBoolOption('output-json'), ['Info', 'Value'], $tableRows);
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
    protected function handleXml(
        InvoiceSuiteDocumentReader $xmlOrJsonReader
    ): static {
        $jsonResult = [
            'id' => $xmlOrJsonReader->getCurrentDocumentFormatProvider()->getUniqueId(),
            'description' => $xmlOrJsonReader->getCurrentDocumentFormatProvider()->getDescription(),
            'error' => false,
        ];

        $tableRows = [];

        $tableRows[] = ['ID', $xmlOrJsonReader->getCurrentDocumentFormatProvider()->getUniqueId()];
        $tableRows[] = ['Description', InvoiceSuiteStringUtils::mbTrimWidth($xmlOrJsonReader->getCurrentDocumentFormatProvider()->getDescription(), 0, 60, '...')];
        $tableRows[] = ['Error', 'no'];

        return $this
            ->outputJsonWhen($this->getBoolOption('output-json'), $jsonResult)
            ->outputTableWhen(!$this->getBoolOption('output-json'), ['Info', 'Value'], $tableRows);
    }

    /**
     * Handle output for unknown types
     *
     * @return static
     *
     * @throws ConsoleInvalidArgumentException
     * @throws RuntimeException
     */
    protected function handleUnknownType(): static
    {
        $jsonResult = [
            'id' => 'unknown',
            'description' => 'unknown',
            'error' => true,
        ];

        $tableRows = [];

        $tableRows[] = ['ID', 'unknown'];
        $tableRows[] = ['Description', 'unknown'];
        $tableRows[] = ['Error', 'Yes'];

        return $this
            ->outputJsonWhen($this->getBoolOption('output-json'), $jsonResult)
            ->outputTableWhen(!$this->getBoolOption('output-json'), ['Info', 'Value'], $tableRows);
    }
}
