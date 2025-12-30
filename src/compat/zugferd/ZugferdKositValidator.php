<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\zugferd;

use horstoeko\invoicesuite\exceptions\InvoiceSuiteInvalidArgumentException;
use horstoeko\invoicesuite\utils\InvoiceSuiteMessageBagItem;
use horstoeko\invoicesuite\validators\kosit\InvoiceSuiteKositDocumentValidator;
use JMS\Serializer\Exception\RuntimeException;

/**
 * Legacy-class representing the KOSIT document validator for incoming documents
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class ZugferdKositValidator
{
    /**
     * Internal KOSIT-Validator instance
     *
     * @var null|InvoiceSuiteKositDocumentValidator
     */
    private $kositValidator;

    /**
     * Constructor
     *
     * @param null|string|ZugferdDocument $document $document
     *
     * @throws RuntimeException
     */
    public function __construct($document = null)
    {
        $this->setDocument($document);
    }

    /**
     * Create a KositValidator-Instance by a given content string
     *
     * @param  string                $document
     * @return ZugferdKositValidator
     *
     * @throws RuntimeException
     */
    public static function fromString(string $document): ZugferdKositValidator
    {
        return new ZugferdKositValidator($document);
    }

    /**
     * Create a KositValidator-Instance by a given ZugferdDocument (ZugferdDocumentReader, ZugferdDocumentBuilder)
     *
     * @param  ZugferdDocument       $zugferdDocument
     * @return ZugferdKositValidator
     *
     * @throws RuntimeException
     */
    public static function fromZugferdDocument(ZugferdDocument $zugferdDocument): ZugferdKositValidator
    {
        return new ZugferdKositValidator($zugferdDocument);
    }

    /**
     * Setup the base directory. In the base directory all files will be downloaded
     * and created
     *
     * @param  string                $newBaseDirectory
     * @return ZugferdKositValidator
     */
    public function setBaseDirectory(string $newBaseDirectory): ZugferdKositValidator
    {
        $this->kositValidator->setBaseDirectory($newBaseDirectory);

        return $this;
    }

    /**
     * Setup the KOSIT validator application download url
     *
     * @param  string                $newValidatorDownloadUrl
     * @return ZugferdKositValidator
     */
    public function setValidatorDownloadUrl(string $newValidatorDownloadUrl): ZugferdKositValidator
    {
        $this->kositValidator->setValidatorDownloadUrl($newValidatorDownloadUrl);

        return $this;
    }

    /**
     * Setup the KOSIT validator scenario download url
     *
     * @param  string                $newValidatorScenarioDownloadUrl
     * @return ZugferdKositValidator
     */
    public function setValidatorScenarioDownloadUrl(string $newValidatorScenarioDownloadUrl): ZugferdKositValidator
    {
        $this->kositValidator->setValidatorScenarioDownloadUrl($newValidatorScenarioDownloadUrl);

        return $this;
    }

    /**
     * Set the filename of the ZIP file which contains the validation application
     *
     * @param  string                $newValidatorAppZipFilename
     * @return ZugferdKositValidator
     */
    public function setValidatorAppZipFilename(string $newValidatorAppZipFilename): ZugferdKositValidator
    {
        $this->kositValidator->setValidatorAppZipFilename($newValidatorAppZipFilename);

        return $this;
    }

    /**
     * Set the filename of the ZIP file which contains the validation scenarios
     *
     * @param  string                $newValidatorScenarioZipFilename
     * @return ZugferdKositValidator
     */
    public function setValidatorScenarioZipFilename(string $newValidatorScenarioZipFilename): ZugferdKositValidator
    {
        $this->kositValidator->setValidatorScenarioZipFilename($newValidatorScenarioZipFilename);

        return $this;
    }

    /**
     * Set the filename of the applications JAR
     *
     * @param  string                $newValidatorAppJarFilename
     * @return ZugferdKositValidator
     */
    public function setValidatorAppJarFilename(string $newValidatorAppJarFilename): ZugferdKositValidator
    {
        $this->kositValidator->setValidatorAppJarFilename($newValidatorAppJarFilename);

        return $this;
    }

    /**
     * Set the filename of the application scenario file
     *
     * @param  string                $newValidatorAppScenarioFilename
     * @return ZugferdKositValidator
     */
    public function setValidatorAppScenarioFilename(string $newValidatorAppScenarioFilename): ZugferdKositValidator
    {
        $this->kositValidator->setValidatorAppScenarioFilename($newValidatorAppScenarioFilename);

        return $this;
    }

    /**
     * Disable cleanup base directory
     *
     * @return ZugferdKositValidator
     */
    public function disableCleanup(): ZugferdKositValidator
    {
        $this->kositValidator->disableCleanup();

        return $this;
    }

    /**
     * Enable cleanup base directory
     *
     * @return ZugferdKositValidator
     */
    public function enableCleanup(): ZugferdKositValidator
    {
        $this->kositValidator->enableCleanup();

        return $this;
    }

    /**
     * Disable the usage of a remote host validation
     *
     * @return ZugferdKositValidator
     */
    public function disableRemoteMode(): ZugferdKositValidator
    {
        $this->kositValidator->disableRemoteMode();

        return $this;
    }

    /**
     * Enable the usage of a remote host validation
     *
     * @return ZugferdKositValidator
     */
    public function enableRemoteMode(): ZugferdKositValidator
    {
        $this->kositValidator->enableRemoteMode();

        return $this;
    }

    /**
     * Set the hostname or the ip of the remote host where the validation application
     * is running in daemon mode
     *
     * @param  string                $remoteModeHost
     * @return ZugferdKositValidator
     */
    public function setRemoteModeHost(string $remoteModeHost): ZugferdKositValidator
    {
        $this->kositValidator->setRemoteModeHost($remoteModeHost);

        return $this;
    }

    /**
     * Set the port of the remote host where the validation application
     * is running in daemon mode
     *
     * @param  int                   $remoteModePort
     * @return ZugferdKositValidator
     */
    public function setRemoteModePort(int $remoteModePort): ZugferdKositValidator
    {
        $this->kositValidator->setRemoteModePort($remoteModePort);

        return $this;
    }

    /**
     * Returns the full remote mode URL
     *
     * @return string
     */
    public function getRemoteModeUrl(): string
    {
        return $this->kositValidator->getRemoteModeUrl();
    }

    /**
     * Perform validation
     *
     * @return ZugferdKositValidator
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function validate(): ZugferdKositValidator
    {
        $this->kositValidator->validate();

        return $this;
    }

    /**
     * Returns an array of all validation errors
     *
     * @return array<int,string>
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function getValidationErrors(): array
    {
        return $this->convertMessageBagMessagesToSimpleArray($this->kositValidator->getErrorMessagesInMessageBag());
    }

    /**
     * Returns true if __no__ validation errors are present otherwise false
     *
     * @return bool
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function hasNoValidationErrors(): bool
    {
        return !$this->kositValidator->hasErrorMessagesInMessageBag();
    }

    /**
     * Returns true if validation errors are present otherwise false
     *
     * @return bool
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function hasValidationErrors(): bool
    {
        return $this->kositValidator->hasErrorMessagesInMessageBag();
    }

    /**
     * Returns an array of all validation warnings
     *
     * @return array<int,string>
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function getValidationWarnings(): array
    {
        return $this->convertMessageBagMessagesToSimpleArray($this->kositValidator->getWarningMessagesInMessageBag());
    }

    /**
     * Returns true if __no__ validation warnings are present otherwise false
     *
     * @return bool
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function hasNoValidationWarnings(): bool
    {
        return !$this->kositValidator->hasWarningMessagesInMessageBag();
    }

    /**
     * Returns true if validation warnings are present otherwise false
     *
     * @return bool
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function hasValidationWarnings(): bool
    {
        return $this->kositValidator->hasWarningMessagesInMessageBag();
    }

    /**
     * Returns an array of all validation information
     *
     * @return array<int,string>
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function getValidationInformation(): array
    {
        return $this->convertMessageBagMessagesToSimpleArray($this->kositValidator->getInfoMessagesInMessageBag());
    }

    /**
     * Returns true if __no__ validation information are present otherwise false
     *
     * @return bool
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function hasNoValidationInformation(): bool
    {
        return !$this->kositValidator->hasInfoMessagesInMessageBag();
    }

    /**
     * Returns true if validation Information are present otherwise false
     *
     * @return bool
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function hasValidationInformation(): bool
    {
        return $this->kositValidator->hasInfoMessagesInMessageBag();
    }

    /**
     * Return an array of all internal errors (such as download error or system exceptions)
     *
     * @return array<int,string>
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function getProcessErrors(): array
    {
        return $this->convertMessageBagMessagesToSimpleArray($this->kositValidator->getErrorMessagesInMessageBag());
    }

    /**
     * Returns true if there are __no__ system errors (e.g. exceptions before the validation app was called)
     *
     * @return bool
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function hasNoProcessErrors(): bool
    {
        return !$this->kositValidator->hasErrorMessagesInMessageBag();
    }

    /**
     * Returns true if there are any system errors (e.g. exceptions before the validation app was called)
     *
     * @return bool
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function hasProcessErrors(): bool
    {
        return $this->kositValidator->hasErrorMessagesInMessageBag();
    }

    /**
     * Returns an array of all messages from process system (calling external applications)
     *
     * @return array<int,string>
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function getProcessOutput(): array
    {
        return $this->convertMessageBagMessagesToSimpleArray($this->kositValidator->getInfoMessagesInMessageBag());
    }

    /**
     * Undocumented function
     *
     * @param  null|string|ZugferdDocument $document $document
     * @return ZugferdKositValidator
     *
     * @throws RuntimeException
     */
    private function setDocument($document): ZugferdKositValidator
    {
        $this->kositValidator = null;

        if (!is_string($document) && !($document instanceof ZugferdDocument)) {
            return $this;
        }

        if (is_string($document)) {
            $this->kositValidator = InvoiceSuiteKositDocumentValidator::createFromContent(
                $document
            );
        }

        if ($document instanceof ZugferdDocumentBuilder) {
            $this->kositValidator = InvoiceSuiteKositDocumentValidator::createFromDocumentBuilder(
                $document->getDocumentBuilderInstance()
            );
        }

        if ($document instanceof ZugferdDocumentReader) {
            $this->kositValidator = InvoiceSuiteKositDocumentValidator::createFromContent(
                $document->getDocumentReaderInstance()->getOriginalDocumentContent()
            );
        }

        return $this;
    }

    /**
     * Converts a message bag array of messages to simple int,string array
     *
     * @param  array<int, InvoiceSuiteMessageBagItem> $messages
     * @return array<int, string>
     */
    private function convertMessageBagMessagesToSimpleArray(array $messages): array
    {
        return array_map(
            static fn (InvoiceSuiteMessageBagItem $messageBagItem) => $messageBagItem->getMessageContent(),
            $messages
        );
    }
}
