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
use RuntimeException;
use Symfony\Component\Console\Exception\InvalidArgumentException;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

/**
 * Class representing a console command that visualizes XML invoice documents.
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteVisualizeCommand extends InvoiceSuiteAbstractCommand
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
        $this->setName('invoicesuite:visualize');
        $this->setDescription('Visualize an XML invoice document as PDF or HTML');
        $this->addArgument('input-file', InputArgument::REQUIRED, 'The XML invoice document to visualize');
        $this->addArgument('output-file', InputArgument::REQUIRED, 'The target PDF or HTML file');
        $this->addOption('format', null, InputOption::VALUE_REQUIRED, 'Output format to use (pdf, html)', 'pdf');
        $this->addOption('template', null, InputOption::VALUE_REQUIRED, 'Use a custom visualizer template file');
        $this->addOption('force', 'f', InputOption::VALUE_NONE, 'Overwrite the target file if it already exists');
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
     * @throws InvoiceSuiteInvalidArgumentException
     * @throws InvoiceSuiteUnknownContentException
     * @throws JmsRuntimeException
     * @throws RuntimeException
     */
    protected function handle(): int
    {
        $inpArgInputFilename = $this->getSourceXmlOrJsonFileArgument('input-file');
        $inpArgOutputFilename = $this->getTargetFileArgument('output-file', $this->getBoolOption('force'));
        $inpOptionFormat = $this->getStringOption('format', 'pdf');
        $inpOptionTemplate = $this->getStringOption('template');

        if (!InvoiceSuiteArrayUtils::inArrayNoCase(['pdf', 'html'], $inpOptionFormat)) {
            throw new InvoiceSuiteInvalidArgumentException(sprintf('Invalid option value for format "%s"', $inpOptionFormat));
        }

        $visualizer = InvoiceSuiteVisualizer::createFromFile($inpArgInputFilename);

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($inpOptionTemplate)) {
            $visualizer->setTemplate($this->ensureFileExists($inpOptionTemplate));
        } else {
            $visualizer->setDefaultTemplate();
        }

        if (InvoiceSuiteStringUtils::equalsNoCase($inpOptionFormat, 'pdf')) {
            $visualizer->renderPdfFile($inpArgOutputFilename);
        } else {
            $visualizer->renderMarkupFile($inpArgOutputFilename);
        }

        $this->outputLineLF(sprintf('<info>Created:</info> %s', $inpArgOutputFilename));

        return $this->returnSuccess();
    }
}
