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
use horstoeko\invoicesuite\InvoiceSuitePdfDocumentBuilder;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use JMS\Serializer\Exception\RuntimeException as JmsRuntimeException;
use RuntimeException;
use Symfony\Component\Console\Exception\InvalidArgumentException;
use Symfony\Component\Console\Exception\InvalidArgumentException as ConsoleInvalidArgumentException;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Embed an invoice XML into an existing PDF file.
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteMergePdfWithXmlCommand extends InvoiceSuiteBaseCommand
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
        $this->setName('invoicesuite:merge:pdfwithxml');
        $this->setDescription('Embed an invoice XML into an existing PDF file');
        $this->addArgument('pdf-file', InputArgument::REQUIRED, 'Input PDF file');
        $this->addArgument('xml-file', InputArgument::REQUIRED, 'Input XML invoice file');
        $this->addArgument('output-file', InputArgument::OPTIONAL, 'Target PDF file');
        $this->addOption('relationship', null, InputOption::VALUE_OPTIONAL, 'Relationship type for the embedded invoice XML');
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
     * @throws JmsRuntimeException
     * @throws RuntimeException
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $pdfFilename = $this->requireReadablePdfFilename($this->getStringArgument($input, 'pdf-file'));
        $xmlFilename = $this->requireReadableXmlFilename($this->getStringArgument($input, 'xml-file'));
        $outputFilename = $this->getStringArgument($input, 'output-file', $pdfFilename);
        $relationship = $this->getStringOption($input, 'relationship');
        $documentContent = $this->readFileContents($xmlFilename);

        $pdfDocumentBuilder = InvoiceSuitePdfDocumentBuilder::createFromDocumentContentAndPdfFile($documentContent, $pdfFilename);

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($relationship)) {
            $pdfDocumentBuilder->setDocumentRelationshipType($relationship);
        }

        $pdfDocumentBuilder->generatePdfDocumentAndSaveToFile($outputFilename);

        $output->writeln(sprintf('<info>Written:</info> %s', $outputFilename));

        return self::SUCCESS;
    }
}
