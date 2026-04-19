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
use horstoeko\invoicesuite\InvoiceSuiteDocumentReader;
use horstoeko\invoicesuite\InvoiceSuitePdfDocumentReader;
use horstoeko\invoicesuite\pdfs\extractor\InvoiceSuitePdfExtractor;
use horstoeko\invoicesuite\utils\InvoiceSuiteContentType;
use JMS\Serializer\Exception\RuntimeException as JmsRuntimeException;
use PrinsFrank\PdfParser\Exception\PdfParserException;
use RuntimeException;
use Symfony\Component\Console\Exception\InvalidArgumentException;
use Symfony\Component\Console\Exception\InvalidArgumentException as ConsoleInvalidArgumentException;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Detects the input type and matching provider of an invoice document.
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
     * @throws InvalidArgumentException
     */
    protected function configure(): void
    {
        $this->setName('invoicesuite:detect');
        $this->setDescription('Detect the input type and matching provider of an invoice document');
        $this->addArgument('input-file', InputArgument::REQUIRED, 'Input XML or PDF file');
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
     * @throws JmsRuntimeException
     * @throws PdfParserException
     * @throws RuntimeException
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $inputFilename = $this->requireReadableFilename($this->getStringArgument($input, 'input-file'));
        $mimeType = $this->detectMimeTypeByFilename($inputFilename);
        $table = new Table($output);
        $table->setStyle('box');
        $table->setHeaders(['Property', 'Value']);
        $table->addRow(['Filename', $inputFilename]);
        $table->addRow(['MIME type', $mimeType]);

        if ($this->isPdfFilename($inputFilename)) {
            $extractor = InvoiceSuitePdfExtractor::fromFile($inputFilename);
            $table->addRow(['Input type', 'pdf']);
            $table->addRow(['Attachments', (string) count($extractor)]);

            try {
                $pdfReader = InvoiceSuitePdfDocumentReader::createFromFile($inputFilename);
                $provider = $pdfReader->getCurrentDocumentFormatProvider();
                $invoiceAttachment = $pdfReader->getInvoiceDocumentAttachment();

                $table->addRow(['Provider', $provider->getUniqueId()]);
                $table->addRow(['Description', $provider->getDescription()]);
                $table->addRow(['Invoice attachment', $invoiceAttachment?->getAttachmentFilename() ?? '']);
                $table->addRow(['Additional attachments', (string) count($pdfReader->getAdditionalDocumentAttachments())]);
            } catch (InvoiceSuiteFormatProviderNotFoundException|InvoiceSuiteUnknownContentException) {
                $table->addRow(['Provider', 'not detected']);
            }

            $table->render();

            return self::SUCCESS;
        }

        $contentType = $this->detectStructuredContentTypeByFilename($inputFilename);

        if (null === $contentType) {
            $table->addRow(['Input type', 'unknown']);
            $table->render();

            return self::FAILURE;
        }

        $table->addRow(['Input type', $contentType->value]);

        if (InvoiceSuiteContentType::XML !== $contentType) {
            $table->render();

            return self::SUCCESS;
        }

        try {
            $reader = InvoiceSuiteDocumentReader::createFromFile($inputFilename);
            $provider = $reader->getCurrentDocumentFormatProvider();

            $table->addRow(['Provider', $provider->getUniqueId()]);
            $table->addRow(['Description', $provider->getDescription()]);
            $table->addRow(['Root class', $provider->getRootClassName()]);
            $table->addRow(['PDF support', $provider->getIsPdfSupportAvailable() ? 'yes' : 'no']);
            $table->addRow(['XSD validation', $provider->getValidationXsdAvailable() ? 'yes' : 'no']);
        } catch (InvoiceSuiteFormatProviderNotFoundException|InvoiceSuiteUnknownContentException) {
            $table->addRow(['Provider', 'not detected']);
        }

        $table->render();

        return self::SUCCESS;
    }
}
