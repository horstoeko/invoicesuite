<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\console\commands;

use horstoeko\invoicesuite\console\commands\InvoiceSuiteBaseCommand;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotReadableException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFormatProviderNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteInvalidArgumentException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteUnknownContentException;
use horstoeko\invoicesuite\InvoiceSuiteDocumentBuilder;
use PrinsFrank\PdfParser\Exception\PdfParserException;
use RuntimeException;
use Symfony\Component\Console\Exception\InvalidArgumentException as ConsoleInvalidArgumentException;
use Symfony\Component\Console\Exception\InvalidArgumentException;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Convert an invoice document to another provider format.
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteConvertCommand extends InvoiceSuiteBaseCommand
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
        $this->setName('invoicesuite:convert');
        $this->setDescription('Convert an invoice document to another provider format');
        $this->addArgument('input-file', InputArgument::REQUIRED, 'Input XML or PDF file');
        $this->addArgument('provider-id', InputArgument::REQUIRED, 'Target provider unique id');
        $this->addArgument('output-file', InputArgument::OPTIONAL, 'Target XML file');
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
        $argInputFilename = $this->requireReadableFilename($this->getStringArgument($input, 'input-file'));
        $argProviderId = $this->getStringArgument($input, 'provider-id');
        $argOutputFilename = $this->getStringArgument($input, 'output-file', $this->buildOutputFilename($argInputFilename, '-' . $argProviderId, 'xml'));

        $sourceDocumentReader = $this->createInvoiceDocumentReaderFromFilename($argInputFilename);

        $sourceDocumentDTO = $sourceDocumentReader->toDTO();

        $targetDocumentBuilder = InvoiceSuiteDocumentBuilder::createByProviderUniqueId($argProviderId);
        $targetDocumentBuilder->fromDTO($sourceDocumentDTO);
        $targetDocumentBuilder->saveContentToFile($argOutputFilename);

        $output->writeln(sprintf('<info>Written:</info> %s', $argOutputFilename));

        return self::SUCCESS;
    }
}
