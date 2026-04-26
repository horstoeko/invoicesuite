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
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use horstoeko\invoicesuite\validators\abstracts\InvoiceSuiteAbstractDocumentValidator;
use horstoeko\invoicesuite\validators\InvoiceSuiteKositDocumentValidator;
use horstoeko\invoicesuite\validators\InvoiceSuiteXsdDocumentValidator;
use RuntimeException;
use Symfony\Component\Console\Exception\InvalidArgumentException;
use Symfony\Component\Console\Exception\InvalidArgumentException as ConsoleInvalidArgumentException;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use TypeError;
use ValueError;

/**
 * Class representing a console command that validates XML invoice documents.
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteValidateCommand extends InvoiceSuiteAbstractCommand
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
        $this->setName('invoicesuite:validate');
        $this->setDescription('Validate an XML invoice document by XSD and/or KoSIT validator');
        $this->addArgument('input-file', InputArgument::REQUIRED, 'The XML file to validate');
        $this->addOption('output-json', null, InputOption::VALUE_NONE, 'Output results as JSON');
        $this->addOption('validator', null, InputOption::VALUE_REQUIRED, 'Validator to use (all, xsd, kosit)', 'all');
        $this->addOption('xsd-file', null, InputOption::VALUE_REQUIRED, 'Use a custom XSD file');
        $this->addOption('kosit-base-directory', null, InputOption::VALUE_REQUIRED, 'Base directory for KoSIT validator downloads and temporary files');
        $this->addOption('kosit-keep-files', null, InputOption::VALUE_NONE, 'Keep KoSIT validator downloads and temporary files');
        $this->addOption('kosit-remote-host', null, InputOption::VALUE_REQUIRED, 'Remote KoSIT validator host');
        $this->addOption('kosit-remote-port', null, InputOption::VALUE_REQUIRED, 'Remote KoSIT validator port');
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
     * @throws RuntimeException
     * @throws TypeError
     * @throws ValueError
     */
    protected function handle(): int
    {
        $inpArgFilename = $this->getSourceXmlFileArgument('input-file');
        $inpOptionValidator = InvoiceSuiteStringUtils::lower($this->getStringOption('validator', 'all'));

        if (!InvoiceSuiteArrayUtils::inArrayNoCase(['all', 'xsd', 'kosit'], $inpOptionValidator)) {
            throw new InvoiceSuiteInvalidArgumentException(sprintf('Invalid option value for validator "%s"', $inpOptionValidator));
        }

        $validationHasErrors = false;

        if (InvoiceSuiteArrayUtils::inArrayNoCase(['all', 'xsd'], $inpOptionValidator)) {
            $validationHasErrors = !$this->validateByXsd($inpArgFilename);
        }

        if (InvoiceSuiteArrayUtils::inArrayNoCase(['all', 'kosit'], $inpOptionValidator)) {
            $validationHasErrors = !$this->validateByKosit($inpArgFilename) || $validationHasErrors;
        }

        return $validationHasErrors ? $this->returnFailure() : $this->returnSuccess();
    }

    /**
     * Validate the given XML document by XSD.
     *
     * @param  string $filename
     * @return bool
     *
     * @throws InvalidArgumentException
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws InvoiceSuiteFormatProviderNotFoundException
     * @throws InvoiceSuiteInvalidArgumentException
     * @throws RuntimeException
     */
    protected function validateByXsd(string $filename): bool
    {
        $documentValidator = InvoiceSuiteXsdDocumentValidator::createFromFile($filename);
        $inpOptionXsdFilename = $this->getStringOption('xsd-file');

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($inpOptionXsdFilename)) {
            $documentValidator->setXsdFilename($this->ensureFileExists($inpOptionXsdFilename));
        }

        $documentValidator->validate();

        return $this->outputValidationResult('XSD', $documentValidator);
    }

    /**
     * Validate the given XML document by KoSIT validator.
     *
     * @param  string $filename
     * @return bool
     *
     * @throws InvalidArgumentException
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws InvoiceSuiteFormatProviderNotFoundException
     * @throws InvoiceSuiteInvalidArgumentException
     * @throws RuntimeException
     * @throws TypeError
     * @throws ValueError
     */
    protected function validateByKosit(string $filename): bool
    {
        $documentValidator = InvoiceSuiteKositDocumentValidator::createFromFile($filename);
        $inpOptionKositBaseDirectory = $this->getStringOption('kosit-base-directory');
        $inpOptionKositRemoteHost = $this->getStringOption('kosit-remote-host');
        $inpOptionKositRemotePort = $this->getIntOption('kosit-remote-port');

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($inpOptionKositBaseDirectory)) {
            $documentValidator->setBaseDirectory($this->ensureDirectoryExists($inpOptionKositBaseDirectory));
        }

        if ($this->getBoolOption('kosit-keep-files')) {
            $documentValidator->disableCleanup();
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($inpOptionKositRemoteHost) || $inpOptionKositRemotePort > 0) {
            $documentValidator->activateRemoteValidation($inpOptionKositRemoteHost, $inpOptionKositRemotePort);
        }

        $documentValidator->validate();

        return $this->outputValidationResult('KoSIT', $documentValidator);
    }

    /**
     * Output validation result and messages.
     *
     * @param  string                                $validatorName
     * @param  InvoiceSuiteAbstractDocumentValidator $documentValidator
     * @return bool
     *
     * @throws ConsoleInvalidArgumentException
     * @throws InvoiceSuiteInvalidArgumentException
     * @throws RuntimeException
     */
    protected function outputValidationResult(
        string $validatorName,
        InvoiceSuiteAbstractDocumentValidator $documentValidator
    ): bool {
        $validationWasSuccessful = !$documentValidator->hasErrorMessagesInMessageBag();

        if (true === $this->getBoolOption('output-json')) {
            $this->outputLineLF(json_encode([
                'status' => $validationWasSuccessful ? 'valid' : 'invalid',
                'errors' => $documentValidator->countErrorMessagesInMessageBag(),
                'warnings' => $documentValidator->countWarningMessagesInMessageBag(),
                'infos' => $documentValidator->countInfoMessagesInMessageBag(),
                'errormessages' => $documentValidator->getErrorMessagesInMessageBag(),
                'warningmessages' => $documentValidator->getWarningMessagesInMessageBag(),
                'infomessages' => $documentValidator->getInfoMessagesInMessageBag(),
            ], JSON_PRETTY_PRINT));
        } else {
            $tableRows = [
                [$validatorName, 'Status', $validationWasSuccessful ? 'valid' : 'invalid'],
                [$validatorName, 'Errors', (string) $documentValidator->countErrorMessagesInMessageBag()],
                [$validatorName, 'Warnings', (string) $documentValidator->countWarningMessagesInMessageBag()],
                [$validatorName, 'Infos', (string) $documentValidator->countInfoMessagesInMessageBag()],
            ];

            $this->outputTable(['Validator', 'Info', 'Value'], $tableRows);

            foreach ($documentValidator->getMessageBag() as $messageBagItem) {
                $this->outputLineLF(sprintf('<info>%s</info>: %s', $messageBagItem->getMessageSeverityValue(), $messageBagItem->getMessageContent()));
            }
        }

        return $validationWasSuccessful;
    }
}
