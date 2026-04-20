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
use horstoeko\invoicesuite\utils\InvoiceSuiteMessageBagItem;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use horstoeko\invoicesuite\validators\abstracts\InvoiceSuiteAbstractDocumentValidator;
use horstoeko\invoicesuite\validators\InvoiceSuiteKositDocumentValidator;
use horstoeko\invoicesuite\validators\InvoiceSuiteXsdDocumentValidator;
use JMS\Serializer\Exception\RuntimeException as JmsRuntimeException;
use PrinsFrank\PdfParser\Exception\PdfParserException;
use RuntimeException;
use Symfony\Component\Console\Exception\InvalidArgumentException as ConsoleInvalidArgumentException;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Validate an invoice document by XSD or KoSIT validator.
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteValidateCommand extends InvoiceSuiteBaseCommand
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
        $this->setName('invoicesuite:validate');
        $this->setDescription('Validate an invoice document by XSD or KoSIT validator');
        $this->addArgument('input-file', InputArgument::REQUIRED, 'Input XML or PDF file');
        $this->addOption('validator', null, InputOption::VALUE_OPTIONAL, 'Validator to use: xsd or kosit', 'xsd');
        $this->addOption('base-directory', null, InputOption::VALUE_OPTIONAL, 'Base directory for KoSIT validator files');
        $this->addOption('remote-host', null, InputOption::VALUE_OPTIONAL, 'Remote KoSIT validator host');
        $this->addOption('remote-port', null, InputOption::VALUE_OPTIONAL, 'Remote KoSIT validator port', '0');
        $this->addOption('keep-temp-files', null, InputOption::VALUE_NONE, 'Do not clean up KoSIT validator files');
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
        $validatorType = strtolower($this->getStringOption($input, 'validator', 'xsd'));
        $documentReader = $this->createInvoiceDocumentReaderFromFilename($inputFilename);
        $validator = $this->createValidator($validatorType, $documentReader->getOriginalDocumentContent(), $input);

        $validator->validate();

        $summary = new Table($output);
        $summary->setStyle('box');
        $summary->setHeaders(['Property', 'Value']);
        $summary->addRow(['Validator', $validatorType]);
        $summary->addRow(['Errors', (string) $validator->countErrorMessagesInMessageBag()]);
        $summary->addRow(['Warnings', (string) $validator->countWarningMessagesInMessageBag()]);
        $summary->addRow(['Infos', (string) $validator->countInfoMessagesInMessageBag()]);
        $summary->render();

        $messages = [
            ...$validator->getErrorMessagesInMessageBag(),
            ...$validator->getWarningMessagesInMessageBag(),
            ...$validator->getInfoMessagesInMessageBag(),
        ];

        if ([] !== $messages) {
            $messageTable = new Table($output);
            $messageTable->setStyle('box');
            $messageTable->setHeaders(['Severity', 'Message']);

            foreach ($messages as $message) {
                if (!$message instanceof InvoiceSuiteMessageBagItem) {
                    continue;
                }

                $messageTable->addRow([
                    strtoupper($message->getMessageSeverityValue()),
                    $message->getMessageContent(),
                ]);
            }

            $messageTable->render();
        }

        return $validator->hasErrorMessagesInMessageBag() ? self::FAILURE : self::SUCCESS;
    }

    /**
     * Create the requested validator instance.
     *
     * @param  string                                $validatorType
     * @param  string                                $documentContent
     * @param  InputInterface                        $input
     * @return InvoiceSuiteAbstractDocumentValidator
     *
     * @throws ConsoleInvalidArgumentException
     * @throws InvoiceSuiteFormatProviderNotFoundException
     * @throws InvoiceSuiteInvalidArgumentException
     * @throws RuntimeException
     */
    private function createValidator(string $validatorType, string $documentContent, InputInterface $input): InvoiceSuiteAbstractDocumentValidator
    {
        if ('xsd' === $validatorType) {
            return InvoiceSuiteXsdDocumentValidator::createFromContent($documentContent);
        }

        if ('kosit' !== $validatorType) {
            throw new InvoiceSuiteInvalidArgumentException(sprintf('Unsupported validator "%s". Use "xsd" or "kosit".', $validatorType));
        }

        $validator = InvoiceSuiteKositDocumentValidator::createFromContent($documentContent);
        $baseDirectory = InvoiceSuiteStringUtils::asNullWhenEmpty($this->getStringOption($input, 'base-directory'));
        $remoteHost = InvoiceSuiteStringUtils::asNullWhenEmpty($this->getStringOption($input, 'remote-host'));
        $remotePort = $this->getIntOption($input, 'remote-port');

        if (null !== $baseDirectory) {
            $validator->setBaseDirectory($this->ensureDirectoryExists($baseDirectory));
        }

        if (null !== $remoteHost && $remotePort > 0) {
            $validator->activateRemoteValidation($remoteHost, $remotePort);
        }

        if ($this->getBoolOption($input, 'keep-temp-files')) {
            $validator->disableCleanup();
        }

        return $validator;
    }
}
