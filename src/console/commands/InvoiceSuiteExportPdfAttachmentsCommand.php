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
use horstoeko\invoicesuite\exceptions\InvoiceSuiteUnknownContentException;
use horstoeko\invoicesuite\InvoiceSuitePdfDocumentReader;
use horstoeko\invoicesuite\pdfs\extractor\InvoiceSuitePdfExtractorAttachment;
use horstoeko\invoicesuite\utils\InvoiceSuiteFileUtils;
use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use PrinsFrank\PdfParser\Exception\PdfParserException;
use RuntimeException;
use Symfony\Component\Console\Exception\InvalidArgumentException;
use Symfony\Component\Console\Exception\InvalidArgumentException as ConsoleInvalidArgumentException;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

/**
 * Class representing a console command that exports attachments from a hybrid PDF invoice document.
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteExportPdfAttachmentsCommand extends InvoiceSuiteAbstractCommand
{
    protected const OUTPUT_JSON_NONE = '0';
    protected const OUTPUT_JSON_FILE = '1';
    protected const OUTPUT_JSON_SCREEN = '2';
    protected const OUTPUT_JSON_FILE_AND_SCREEN = '3';

    /**
     * Configure command.
     *
     * @return void
     *
     * @throws InvalidArgumentException
     */
    protected function configure(): void
    {
        $this->setName('invoicesuite:pdfattachmentsexport');
        $this->setDescription('Export attachments from a hybrid PDF invoice document');
        $this->addArgument('input-file', InputArgument::REQUIRED, 'The hybrid PDF invoice document to read');
        $this->addArgument('target-directory', InputArgument::REQUIRED, 'The target directory for extracted attachment files or the generated JSON export file');
        $this->addOption('output-json', null, InputOption::VALUE_REQUIRED, 'Output extracted attachments as JSON (0 = Nothing, 1 = File, 2 = Screen, 3 = File and Screen; default: 0)', self::OUTPUT_JSON_NONE);
        $this->addOption('force', 'f', InputOption::VALUE_NONE, 'Overwrite target files if they already exist');
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
     * @throws InvoiceSuiteUnknownContentException
     * @throws PdfParserException
     * @throws RuntimeException
     */
    protected function handle(): int
    {
        $inpArgPdfFilename = $this->getSourcePdfFileArgument('input-file');
        $inpArgTargetDirectory = $this->getTargetDirectoryArgument('target-directory');
        $inpOptionJsonOutputMode = $this->getStringOption('output-json', self::OUTPUT_JSON_NONE);
        $inpOptionForce = $this->getBoolOption('force');

        $pdfDocumentReader = InvoiceSuitePdfDocumentReader::createFromFile($inpArgPdfFilename);

        if ($this->exportAttachmentsToJson(
            $pdfDocumentReader,
            $inpArgPdfFilename,
            $inpArgTargetDirectory,
            $inpOptionJsonOutputMode,
            $inpOptionForce
        )) {
            return $this->returnSuccess();
        }

        return $this->exportAttachmentsToDirectory(
            $pdfDocumentReader,
            $inpArgTargetDirectory,
            $inpOptionForce
        )->returnSuccess();
    }

    /**
     * Export PDF attachments to a target directory.
     *
     * @param  InvoiceSuitePdfDocumentReader $pdfDocumentReader
     * @param  string                        $toDirectory
     * @param  bool                          $forceOverwrite
     * @return static
     *
     * @throws RuntimeException
     */
    protected function exportAttachmentsToDirectory(
        InvoiceSuitePdfDocumentReader $pdfDocumentReader,
        string $toDirectory,
        bool $forceOverwrite
    ): static {
        $targetAttachmentFiles = [];

        foreach ($this->getExportableAttachments($pdfDocumentReader) as $exportableAttachment) {
            $attachment = $exportableAttachment['attachment'];
            $attachmentFilename = InvoiceSuiteFileUtils::getFilenameWithExtension(
                InvoiceSuiteStringUtils::replace(['\\', "\0"], ['/', ''], $attachment->getAttachmentFilename())
            );

            if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($attachmentFilename)) {
                $attachmentFilename = 'attachment.bin';
            }

            $targetAttachmentFiles[] = [
                'attachment' => $attachment,
                'filename' => InvoiceSuitePathUtils::combinePathWithFile(
                    $toDirectory,
                    sprintf(
                        '%02d_%s_%s',
                        $exportableAttachment['index'],
                        $exportableAttachment['type'],
                        $attachmentFilename
                    )
                ),
            ];
        }

        foreach ($targetAttachmentFiles as $targetAttachmentFile) {
            $this->outputFile($targetAttachmentFile['filename'], $targetAttachmentFile['attachment']->getAttachmentContent(), $forceOverwrite);
            $this->outputLineLF(sprintf('<info>Created:</info> %s', $targetAttachmentFile['filename']));
        }

        return $this;
    }

    /**
     * Export PDF attachments to JSON with Data URLs.
     *
     * @param  InvoiceSuitePdfDocumentReader $pdfDocumentReader
     * @param  string                        $sourcePdfFilename
     * @param  string                        $toDirectory
     * @param  string                        $jsonOutputMode
     * @param  bool                          $forceOverwrite
     * @return bool
     *
     * @throws RuntimeException
     */
    protected function exportAttachmentsToJson(
        InvoiceSuitePdfDocumentReader $pdfDocumentReader,
        string $sourcePdfFilename,
        string $toDirectory,
        string $jsonOutputMode,
        bool $forceOverwrite
    ): bool {
        if (self::OUTPUT_JSON_NONE === $jsonOutputMode) {
            return false;
        }

        if (!in_array($jsonOutputMode, [self::OUTPUT_JSON_FILE, self::OUTPUT_JSON_SCREEN, self::OUTPUT_JSON_FILE_AND_SCREEN], true)) {
            throw new RuntimeException('Invalid value for option "output-json". Allowed values are 0, 1, 2 and 3.');
        }

        $exportableAttachments = [];

        foreach ($this->getExportableAttachments($pdfDocumentReader) as $exportableAttachment) {
            $exportableAttachments[] = [
                'type' => $exportableAttachment['type'],
                'index' => $exportableAttachment['index'],
                'filename' => $exportableAttachment['attachment']->getAttachmentFilename(),
                'mimeType' => $exportableAttachment['attachment']->getAttachmentMimeType(),
                'content' => base64_encode($exportableAttachment['attachment']->getAttachmentContent()),
            ];
        }

        if (in_array($jsonOutputMode, [self::OUTPUT_JSON_FILE, self::OUTPUT_JSON_FILE_AND_SCREEN], true)) {
            $jsonContent = json_encode($exportableAttachments, JSON_PRETTY_PRINT);

            if (false === $jsonContent) {
                throw new RuntimeException(sprintf('Unable to encode attachments to JSON. Error was: %s', json_last_error_msg()));
            }

            $targetJsonFilename = InvoiceSuitePathUtils::combinePathWithFile(
                $toDirectory,
                InvoiceSuiteFileUtils::combineFilenameWithFileextension(
                    InvoiceSuiteFileUtils::getFilenameWithoutExtension(
                        InvoiceSuiteFileUtils::getFilenameWithExtension(
                            InvoiceSuiteStringUtils::replace('\\', '/', $sourcePdfFilename)
                        )
                    ),
                    'json'
                )
            );

            $this->outputFile($targetJsonFilename, $jsonContent, $forceOverwrite);
            $this->outputLineLFWhen(self::OUTPUT_JSON_FILE === $jsonOutputMode, sprintf('<info>Created:</info> %s', $targetJsonFilename));
        }

        $this->outputJsonWhen(
            in_array($jsonOutputMode, [self::OUTPUT_JSON_SCREEN, self::OUTPUT_JSON_FILE_AND_SCREEN], true),
            $exportableAttachments
        );

        return true;
    }

    /**
     * Get all PDF attachments that should be exported.
     *
     * @param  InvoiceSuitePdfDocumentReader                                                               $pdfDocumentReader
     * @return array<int, array{type: string, index: int, attachment: InvoiceSuitePdfExtractorAttachment}>
     */
    protected function getExportableAttachments(
        InvoiceSuitePdfDocumentReader $pdfDocumentReader
    ): array {
        $exportableAttachments = [];
        $invoiceDocumentAttachment = $pdfDocumentReader->getInvoiceDocumentAttachment();

        if (null !== $invoiceDocumentAttachment) {
            $exportableAttachments[] = [
                'type' => 'invoice',
                'index' => 1,
                'attachment' => $invoiceDocumentAttachment,
            ];
        }

        foreach ($pdfDocumentReader->getAdditionalDocumentAttachments() as $additionalAttachmentIndex => $additionalDocumentAttachment) {
            $exportableAttachments[] = [
                'type' => 'additional',
                'index' => $additionalAttachmentIndex + 1,
                'attachment' => $additionalDocumentAttachment,
            ];
        }

        return $exportableAttachments;
    }
}
