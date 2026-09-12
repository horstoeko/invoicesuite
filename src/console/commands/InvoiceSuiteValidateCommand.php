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
use horstoeko\invoicesuite\exceptions\InvoiceSuiteValidationContentNotSpecifiedException;
use horstoeko\invoicesuite\InvoiceSuiteDocumentReader;
use horstoeko\invoicesuite\InvoiceSuitePdfDocumentReader;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use horstoeko\invoicesuite\validators\abstracts\InvoiceSuiteAbstractDocumentValidator;
use horstoeko\invoicesuite\validators\InvoiceSuiteDocuflairDocumentValidator;
use horstoeko\invoicesuite\validators\InvoiceSuiteKositDocumentValidator;
use horstoeko\invoicesuite\validators\InvoiceSuiteXsdDocumentValidator;
use PrinsFrank\PdfParser\Exception\PdfParserException;
use RuntimeException;
use Symfony\Component\Console\Exception\InvalidArgumentException as ConsoleInvalidArgumentException;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use TypeError;
use ValueError;

/**
 * Class representing a console command that validates XML invoice documents and embedded XML in PDF invoices.
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteValidateCommand extends InvoiceSuiteAbstractCommand
{
    /**
     * Validation results collected for JSON output.
     *
     * @var array<string,array<string,mixed>>
     */
    private array $jsonValidationResults = [];

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
        $this->setDescription('Validate an XML invoice document or the embedded invoice XML in a PDF');
        $this->addArgument('input-file', InputArgument::REQUIRED, 'The XML, JSON or PDF file to validate');
        $this->addOption('output-json', null, InputOption::VALUE_NONE, 'Output results as JSON');
        $this->addOption('hide-messages', null, InputOption::VALUE_NONE, 'Do not output messages (table-output only)');
        $this->addOption('validator', null, InputOption::VALUE_REQUIRED, 'Validator to use (all, xsd, kosit)', 'all');
        $this->addOption('xsd-file', null, InputOption::VALUE_REQUIRED, 'Use a custom XSD file');
        $this->addOption('kosit-base-directory', null, InputOption::VALUE_REQUIRED, 'Base directory for KoSIT validator downloads and temporary files');
        $this->addOption('kosit-keep-files', null, InputOption::VALUE_NONE, 'Keep KoSIT validator downloads and temporary files');
        $this->addOption('kosit-remote-host', null, InputOption::VALUE_REQUIRED, 'Remote KoSIT validator host');
        $this->addOption('kosit-remote-port', null, InputOption::VALUE_REQUIRED, 'Remote KoSIT validator port');
        $this->addOption('docuflair-base-url', null, InputOption::VALUE_REQUIRED, 'Docuflair API base url');
        $this->addOption('docuflair-api-key', null, InputOption::VALUE_REQUIRED, 'Docuflair personal API key');
        $this->addOption('discovery-namespace', 'N', InputOption::VALUE_OPTIONAL | InputOption::VALUE_IS_ARRAY, 'A namespace to restrict document format provider discovery to (repeatable)');
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
     * @throws InvoiceSuiteValidationContentNotSpecifiedException
     * @throws PdfParserException
     * @throws RuntimeException
     * @throws TypeError
     * @throws ValueError
     */
    protected function handle(): int
    {
        $inpArgFilename = $this->getSourceFileArgument('input-file');
        $inpOptionValidator = $this->getStringOption('validator', 'all');

        if (!InvoiceSuiteArrayUtils::inArrayNoCase(['all', 'xsd', 'kosit', 'docuflair'], $inpOptionValidator)) {
            throw new InvoiceSuiteInvalidArgumentException(InvoiceSuiteStringUtils::sprintf('Invalid option value for validator "%s"', $inpOptionValidator));
        }

        if ($this->isPdfFile($inpArgFilename)) {
            $documentContent = InvoiceSuitePdfDocumentReader::createFromFile($inpArgFilename)->getDocumentReader()->getOriginalDocumentContent();
        } elseif ($this->isXmlOrJsonFile($inpArgFilename)) {
            $documentContent = InvoiceSuiteDocumentReader::createFromFile($inpArgFilename)->getOriginalDocumentContent();
        } else {
            throw new InvoiceSuiteInvalidArgumentException(InvoiceSuiteStringUtils::sprintf('The given File must be a XML-, JSON oder PDF-File'));
        }

        $validationHasErrors = false;

        if (InvoiceSuiteArrayUtils::inArrayNoCase(['all', 'xsd'], $inpOptionValidator)) {
            $validationHasErrors = !$this->validateByXsd($documentContent);
        }

        if (InvoiceSuiteArrayUtils::inArrayNoCase(['all', 'kosit'], $inpOptionValidator)) {
            $validationHasErrors = !$this->validateByKosit($documentContent) || $validationHasErrors;
        }

        if (InvoiceSuiteArrayUtils::inArrayNoCase(['all', 'docuflair'], $inpOptionValidator)) {
            $validationHasErrors = !$this->validateByDocuflair($documentContent) || $validationHasErrors;
        }

        $this->outputJsonWhen($this->getBoolOption('output-json'), $this->jsonValidationResults);

        return $validationHasErrors ? $this->returnFailure() : $this->returnSuccess();
    }

    /**
     * Validate the given XML document content by XSD.
     *
     * @param  string $documentContent
     * @return bool
     *
     * @throws ConsoleInvalidArgumentException
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws InvoiceSuiteFormatProviderNotFoundException
     * @throws InvoiceSuiteInvalidArgumentException
     * @throws InvoiceSuiteValidationContentNotSpecifiedException
     * @throws RuntimeException
     */
    protected function validateByXsd(
        string $documentContent
    ): bool {
        $documentValidator = InvoiceSuiteXsdDocumentValidator::createFromContent($documentContent);
        $inpOptionXsdFilename = $this->getStringOption('xsd-file');

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($inpOptionXsdFilename)) {
            $documentValidator->setXsdFilename($this->ensureFileExists($inpOptionXsdFilename));
        }

        $documentValidator->validate();

        return $this->outputValidationResult('XSD', $documentValidator);
    }

    /**
     * Validate the given XML document content by KoSIT validator.
     *
     * @param  string $documentContent
     * @return bool
     *
     * @throws ConsoleInvalidArgumentException
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws InvoiceSuiteFormatProviderNotFoundException
     * @throws InvoiceSuiteInvalidArgumentException
     * @throws InvoiceSuiteValidationContentNotSpecifiedException
     * @throws RuntimeException
     * @throws TypeError
     * @throws ValueError
     */
    protected function validateByKosit(
        string $documentContent
    ): bool {
        $documentValidator = InvoiceSuiteKositDocumentValidator::createFromContent($documentContent);
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
     * Validate the given XML document content by Docuflair validator.
     *
     * @param  string $documentContent
     * @return bool
     *
     * @throws ConsoleInvalidArgumentException
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws InvoiceSuiteFormatProviderNotFoundException
     * @throws InvoiceSuiteInvalidArgumentException
     * @throws InvoiceSuiteValidationContentNotSpecifiedException
     * @throws RuntimeException
     * @throws TypeError
     * @throws ValueError
     */
    protected function validateByDocuflair(
        string $documentContent
    ): bool {
        $documentValidator = InvoiceSuiteDocuflairDocumentValidator::createFromContent($documentContent);
        $inpOptionDocuflairBaseUrl = $this->getStringOption('docuflair-base-url');
        $inpOptionDocuflairApiKey = $this->getStringOption('docuflair-api-key');

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($inpOptionDocuflairBaseUrl)) {
            $documentValidator->setBaseUrl($inpOptionDocuflairBaseUrl);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($inpOptionDocuflairApiKey)) {
            $documentValidator->setApiKey($inpOptionDocuflairApiKey);
        }

        $documentValidator->validate();

        return $this->outputValidationResult('Docuflair', $documentValidator);
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
        $validationWasSuccessful = !$documentValidator->hasErrorOrInternalErrorMessagesInMessageBag();

        if ($this->getBoolOption('output-json')) {
            $this->jsonValidationResults[InvoiceSuiteStringUtils::lower($validatorName)] = [
                'status' => $validationWasSuccessful ? 'valid' : 'invalid',
                'errors' => $documentValidator->countErrorMessagesInMessageBag(),
                'internalerrors' => $documentValidator->countInternalErrorMessagesInMessageBag(),
                'warnings' => $documentValidator->countWarningMessagesInMessageBag(),
                'infos' => $documentValidator->countInfoMessagesInMessageBag(),
                'errormessages' => $documentValidator->getErrorMessagesInMessageBag(),
                'internalerrormessages' => $documentValidator->getInternalErrorMessagesInMessageBag(),
                'warningmessages' => $documentValidator->getWarningMessagesInMessageBag(),
                'infomessages' => $documentValidator->getInfoMessagesInMessageBag(),
            ];
        } else {
            $tableRows = [
                [$validatorName, 'Status', $validationWasSuccessful ? 'valid' : 'invalid'],
                [$validatorName, 'Errors', (string) $documentValidator->countErrorMessagesInMessageBag()],
                [$validatorName, 'Internal Errors', (string) $documentValidator->countInternalErrorMessagesInMessageBag()],
                [$validatorName, 'Warnings', (string) $documentValidator->countWarningMessagesInMessageBag()],
                [$validatorName, 'Infos', (string) $documentValidator->countInfoMessagesInMessageBag()],
            ];

            $this->outputTable(['Validator', 'Info', 'Value'], $tableRows);

            if (!$this->getBoolOption('hide-messages')) {
                foreach ($documentValidator->getMessageBag() as $messageBagItem) {
                    $this->outputLineLF(InvoiceSuiteStringUtils::sprintf('<info>%s</info>: %s', $messageBagItem->getMessageSeverityValue(), $messageBagItem->getMessageContent()));
                }
            }
        }

        return $validationWasSuccessful;
    }
}
