<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\validators;

use DOMDocument;
use DOMXPath;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteInvalidArgumentException;
use horstoeko\invoicesuite\utils\InvoiceSuiteContentType;
use horstoeko\invoicesuite\utils\InvoiceSuiteContentTypeResolver;
use horstoeko\invoicesuite\utils\InvoiceSuiteFileUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteMessageSeverity;
use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use horstoeko\invoicesuite\validators\abstracts\InvoiceSuiteAbstractDocumentValidator;
use Symfony\Component\Process\ExecutableFinder;
use Symfony\Component\Process\Process;
use Throwable;
use TypeError;
use ValueError;
use ZipArchive;

/**
 * Class representing the implementation for a KosIT Validator
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteKositDocumentValidator extends InvoiceSuiteAbstractDocumentValidator
{
    /**
     * Base directory (download)
     *
     * @var string
     */
    private $baseDirectory;

    /**
     * Kosit Validator download url
     *
     * @var string
     */
    private $validatorDownloadUrl = 'https://github.com/itplr-kosit/validator/releases/download/v1.5.0/validator-1.5.0-distribution.zip';

    /**
     * Kosit Validator scenarios download url
     *
     * @var string
     */
    private $validatorScenarioDownloadUrl = 'https://github.com/itplr-kosit/validator-configuration-xrechnung/releases/download/release-2025-03-21/validator-configuration-xrechnung_3.0.2_2025-03-21.zip';

    /**
     * The filename of the validation application zip archive
     *
     * @var string
     */
    private $validatorAppZipFilename = 'validator.zip';

    /**
     * The filename of the validation scenario zip archive
     *
     * @var string
     */
    private $validatorScenarioZipFilename = 'validator-configuration.zip';

    /**
     * The java application filename
     *
     * @var string
     */
    private $validatorAppJarFilename = 'validationtool-1.5.0-standalone.jar';

    /**
     * The java application scenario filename
     *
     * @var string
     */
    private $validatorAppScenarioFilename = 'scenarios.xml';

    /**
     * The temporary filename which contains the xml data to validate
     *
     * @var string
     */
    private $fileToValidateFilename = '';

    /**
     * Internal flag which indicates that the cleanup of the base directory is disables
     *
     * @var bool
     */
    private $cleanupBaseDirectoryIsDisabled = false;

    /**
     * Use remote validation (JAVA application is running in daemon mode on a remote host)
     *
     * @var bool
     */
    private $remoteModeEnabled = false;

    /**
     * The remote hostname or -ip
     *
     * @var string
     */
    private $remoteModeHost = '';

    /**
     * The remote host port
     *
     * @var int
     */
    private $remoteModePort = 0;

    /**
     * Setup the base directory. In the base directory all files will be downloaded
     * and created
     *
     * @param  string $newBaseDirectory
     * @return static
     */
    public function setBaseDirectory(
        string $newBaseDirectory
    ): static {
        if (is_dir($newBaseDirectory)) {
            $this->baseDirectory = $newBaseDirectory;
        }

        return $this;
    }

    /**
     * Setup the KOSIT validator application download url
     *
     * @param  string $newValidatorDownloadUrl
     * @return static
     */
    public function setValidatorDownloadUrl(
        string $newValidatorDownloadUrl
    ): static {
        if (false !== filter_var($newValidatorDownloadUrl, FILTER_VALIDATE_URL)) {
            $this->validatorDownloadUrl = $newValidatorDownloadUrl;
        }

        return $this;
    }

    /**
     * Setup the KOSIT validator scenario download url
     *
     * @param  string $newValidatorScenarioDownloadUrl
     * @return static
     */
    public function setValidatorScenarioDownloadUrl(
        string $newValidatorScenarioDownloadUrl
    ): static {
        if (false !== filter_var($newValidatorScenarioDownloadUrl, FILTER_VALIDATE_URL)) {
            $this->validatorScenarioDownloadUrl = $newValidatorScenarioDownloadUrl;
        }

        return $this;
    }

    /**
     * Set the filename of the ZIP file which contains the validation application
     *
     * @param  string $newValidatorAppZipFilename
     * @return static
     */
    public function setValidatorAppZipFilename(
        string $newValidatorAppZipFilename
    ): static {
        $this->validatorAppZipFilename = $newValidatorAppZipFilename;

        return $this;
    }

    /**
     * Set the filename of the ZIP file which contains the validation scenarios
     *
     * @param  string $newValidatorScenarioZipFilename
     * @return static
     */
    public function setValidatorScenarioZipFilename(
        string $newValidatorScenarioZipFilename
    ): static {
        $this->validatorScenarioZipFilename = $newValidatorScenarioZipFilename;

        return $this;
    }

    /**
     * Set the filename of the applications JAR
     *
     * @param  string $newValidatorAppJarFilename
     * @return static
     */
    public function setValidatorAppJarFilename(
        string $newValidatorAppJarFilename
    ): static {
        $this->validatorAppJarFilename = $newValidatorAppJarFilename;

        return $this;
    }

    /**
     * Set the filename of the application scenario file
     *
     * @param  string $newValidatorAppScenarioFilename
     * @return static
     */
    public function setValidatorAppScenarioFilename(
        string $newValidatorAppScenarioFilename
    ): static {
        $this->validatorAppScenarioFilename = $newValidatorAppScenarioFilename;

        return $this;
    }

    /**
     * Disable cleanup base directory
     *
     * @return static
     */
    public function disableCleanup(): static
    {
        $this->cleanupBaseDirectoryIsDisabled = true;

        return $this;
    }

    /**
     * Enable cleanup base directory
     *
     * @return static
     */
    public function enableCleanup(): static
    {
        $this->cleanupBaseDirectoryIsDisabled = false;

        return $this;
    }

    /**
     * Disable the usage of a remote host validation
     *
     * @return static
     */
    public function disableRemoteMode(): static
    {
        $this->remoteModeEnabled = false;

        return $this;
    }

    /**
     * Enable the usage of a remote host validation
     *
     * @return static
     */
    public function enableRemoteMode(): static
    {
        $this->remoteModeEnabled = true;

        return $this;
    }

    /**
     * Set the hostname or the ip of the remote host where the validation application
     * is running in daemon mode
     *
     * @param  string $remoteModeHost
     * @return static
     */
    public function setRemoteModeHost(
        string $remoteModeHost
    ): static {
        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($remoteModeHost)) {
            return $this;
        }

        $this->remoteModeHost = $remoteModeHost;

        return $this;
    }

    /**
     * Set the port of the remote host where the validation application
     * is running in daemon mode
     *
     * @param  int    $remoteModePort
     * @return static
     */
    public function setRemoteModePort(
        int $remoteModePort
    ): static {
        if ($remoteModePort <= 0) {
            return $this;
        }

        $this->remoteModePort = $remoteModePort;

        return $this;
    }

    /**
     * Returns the full remote mode URL
     *
     * @return string
     */
    public function getRemoteModeUrl(): string
    {
        return sprintf('http://%s:%s', $this->remoteModeHost, $this->remoteModePort);
    }

    /**
     * Completely activate remote validation
     *
     * @param  string $remoteModeHost
     * @param  int    $remoteModePort
     * @return static
     */
    public function activateRemoteValidation(
        string $remoteModeHost,
        int $remoteModePort
    ): static {
        return $this->enableRemoteMode()->setRemoteModeHost($remoteModeHost)->setRemoteModePort($remoteModePort);
    }

    /**
     * Completely deactivate remote validation
     *
     * @return static
     */
    public function deactivateRemoteValidation(): static
    {
        return $this->disableRemoteMode()->setRemoteModeHost('0.0.0.0')->setRemoteModePort(0);
    }

    /**
     * The validation entry point
     *
     * @return static
     *
     * @throws InvoiceSuiteInvalidArgumentException
     * @throws TypeError
     * @throws ValueError
     */
    protected function doValidate(): static
    {
        $this->clearMessageBag();

        if (false === $this->checkRequirements()) {
            return $this;
        }

        if (false === $this->downloadRequiredFiles()) {
            $this->cleanupBaseDirectory();

            return $this;
        }

        if (false === $this->unpackRequiredFiles()) {
            $this->cleanupBaseDirectory();

            return $this;
        }

        $this->performValidation();

        $this->cleanupBaseDirectory();

        return $this;
    }

    /**
     * Some initialization after constructing an instance
     *
     * @return static
     */
    protected function intializeAfterConstruct(): static
    {
        $this->baseDirectory = sys_get_temp_dir();

        return parent::intializeAfterConstruct();
    }

    /**
     * Internal get (and create) the directory for downloads and file creation
     *
     * @return string
     */
    private function resolveBaseDirectory(): string
    {
        $baseDirectorySuffix = md5($this->validatorDownloadUrl . $this->validatorScenarioDownloadUrl);

        $baseDirectory = InvoiceSuitePathUtils::combinePathWithPath($this->baseDirectory, sprintf('kositvalidator-%s', $baseDirectorySuffix));

        if (!is_dir($baseDirectory)) {
            @mkdir($baseDirectory);
        }

        return $baseDirectory;
    }

    /**
     * Get the full filename of the archive to download which contains the Java validation application
     *
     * @return string
     */
    private function resolveAppZipFilename(): string
    {
        return InvoiceSuitePathUtils::combinePathWithFile($this->resolveBaseDirectory(), $this->validatorAppZipFilename);
    }

    /**
     * Get the full filename of the archive to download which contains the Java validation application scenarios
     *
     * @return string
     */
    private function resolveScenatioZipFilename(): string
    {
        return InvoiceSuitePathUtils::combinePathWithFile($this->resolveBaseDirectory(), $this->validatorScenarioZipFilename);
    }

    /**
     * Get the full filename of the validator application jar file
     *
     * @return string
     */
    private function resolveAppJarFilename(): string
    {
        return InvoiceSuitePathUtils::combineAllPaths($this->resolveBaseDirectory(), $this->validatorAppJarFilename);
    }

    /**
     * Get the full filename of the validator application scenario file
     *
     * @return string
     */
    private function resolveAppScenarioFilename(): string
    {
        return InvoiceSuitePathUtils::combinePathWithFile($this->resolveBaseDirectory(), $this->validatorAppScenarioFilename);
    }

    /**
     * Reset the internal filename where data of the PDF to validate are stored
     *
     * @return void
     */
    private function resetFileToValidateFilename(): void
    {
        $this->fileToValidateFilename = '';
    }

    /**
     * Get the full filename which contains the PDF to validate
     *
     * @return string
     */
    private function resolveFileToValidateFilename(): string
    {
        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($this->fileToValidateFilename)) {
            $this->fileToValidateFilename = InvoiceSuitePathUtils::combinePathWithFile($this->resolveBaseDirectory(), sprintf('filetovalidate-%s-%s.xml', uniqid(), uniqid()));
        }

        return $this->fileToValidateFilename;
    }

    /**
     * Check Requirements
     *
     * @return bool
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    private function checkRequirements(): bool
    {
        if (false === $this->checkRequirementsGeneral()) {
            return false;
        }

        if (true === $this->remoteModeEnabled) {
            return $this->checkRequirementsRemote();
        }

        return $this->checkRequirementsLocal();
    }

    /**
     * Check general requirements (common for local and remote validation)
     *
     * @return bool
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    private function checkRequirementsGeneral(): bool
    {
        if (InvoiceSuiteContentType::XML != InvoiceSuiteContentTypeResolver::resolveContentType($this->getRawDocumentContent())) {
            $this->addErrorMessageToMessageBag('Only XML content can be validated with this Validator');

            return false;
        }

        return true;
    }

    /**
     * Check requirements for usage on a local installation
     *
     * @return bool
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    private function checkRequirementsLocal(): bool
    {
        if (true === $this->remoteModeEnabled) {
            return true;
        }

        if (!extension_loaded('zip')) {
            $this->addErrorMessageToMessageBag('ZIP extension not installed');

            return false;
        }

        $executableFinder = new ExecutableFinder();

        if (is_null($executableFinder->find('java'))) {
            $this->addErrorMessageToMessageBag('JAVA not installed on this machine');

            return false;
        }

        return true;
    }

    /**
     * Check requirements for usage on a remote host which is running the application
     * in daemon mode
     *
     * @return bool
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    private function checkRequirementsRemote(): bool
    {
        if (true !== $this->remoteModeEnabled) {
            return true;
        }

        if (!extension_loaded('curl')) {
            $this->addErrorMessageToMessageBag('PHP-Curl not installed or activated');

            return false;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($this->remoteModeHost)) {
            $this->addErrorMessageToMessageBag("You must specify the hostname or it's IP where the Validator is running in daemon mode");

            return false;
        }

        if ($this->remoteModePort <= 0) {
            $this->addErrorMessageToMessageBag('You must specify the port of the host where the Validator is running in daemon mode');

            return false;
        }

        try {
            $httpConnection = curl_init($this->getRemoteModeUrl());

            curl_setopt($httpConnection, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($httpConnection, CURLOPT_HEADER, true);
            curl_setopt($httpConnection, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($httpConnection, CURLOPT_ENCODING, '');
            curl_setopt($httpConnection, CURLOPT_AUTOREFERER, true);
            curl_setopt($httpConnection, CURLOPT_CONNECTTIMEOUT, 10);
            curl_setopt($httpConnection, CURLOPT_TIMEOUT, 120);

            $response = curl_exec($httpConnection);

            if (false === $response) {
                $this->addErrorMessageToMessageBag('Failed to connect to the host where the Validator is running in daemon mode');
                $this->addErrorMessageToMessageBag(curl_error($httpConnection));

                return false;
            }

            $responseStatusCode = curl_getinfo($httpConnection, CURLINFO_HTTP_CODE);

            if (($responseStatusCode < 200) || ($responseStatusCode >= 400)) {
                $this->addErrorMessageToMessageBag('Failed to connect to the host where the Validator is running in daemon mode');
                $this->addErrorMessageToMessageBag(curl_error($httpConnection));

                return false;
            }
        } catch (Throwable $throwable) {
            $this->addErrorMessageToMessageBag($throwable->getMessage());

            return false;
        }

        return true;
    }

    /**
     * Download required files
     *
     * @return bool
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    private function downloadRequiredFiles(): bool
    {
        if (true === $this->remoteModeEnabled) {
            return true;
        }

        if (!$this->runFileDownload($this->validatorDownloadUrl, $this->resolveAppZipFilename())) {
            $this->addErrorMessageToMessageBag(sprintf('Unable to download from %s containing the JAVA-Application', $this->validatorDownloadUrl));

            return false;
        }

        if (!$this->runFileDownload($this->validatorScenarioDownloadUrl, $this->resolveScenatioZipFilename())) {
            $this->addErrorMessageToMessageBag(sprintf('Unable to download from %s containing the validation scenarios', $this->validatorScenarioDownloadUrl));

            return false;
        }

        return true;
    }

    /**
     * Unpack required files
     *
     * @return bool
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    private function unpackRequiredFiles(): bool
    {
        if (true === $this->remoteModeEnabled) {
            return true;
        }

        $validatorAppFile = $this->resolveAppZipFilename();
        $validatorScenarioFile = $this->resolveScenatioZipFilename();

        if (!$this->unpackRequiredFile($validatorAppFile)) {
            $this->addErrorMessageToMessageBag(sprintf('Unable to unpack archive %s containing the JAVA-Application', $validatorAppFile));

            return false;
        }

        if (!$this->unpackRequiredFile($validatorScenarioFile)) {
            $this->addErrorMessageToMessageBag(sprintf('Unable to unpack archive %s containing the validation scenarios', $validatorScenarioFile));

            return false;
        }

        return true;
    }

    /**
     * Unpack single required file
     *
     * @param  string $filename
     * @return bool
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    private function unpackRequiredFile(
        string $filename
    ): bool {
        if (true === $this->remoteModeEnabled) {
            return true;
        }

        $zipArchive = new ZipArchive();

        if (true !== $zipArchive->open($filename)) {
            $this->addErrorMessageToMessageBag(sprintf('Failed to open ZIP archive %s', $filename));

            return false;
        }

        $numFilesExists = 0;

        for ($i = 0; $i < $zipArchive->numFiles; ++$i) {
            $zipStat = $zipArchive->statIndex($i);
            $realfilename = InvoiceSuitePathUtils::combinePathWithFile($this->resolveBaseDirectory(), $zipStat['name']);

            if (InvoiceSuiteFileUtils::isReadableFilePath($realfilename)) {
                ++$numFilesExists;
            }
        }

        if ($numFilesExists === $zipArchive->numFiles) {
            return true;
        }

        if (!$zipArchive->extractTo($this->resolveBaseDirectory())) {
            $zipArchive->close();
            $this->addErrorMessageToMessageBag(sprintf('Failed to extract ZIP archive %s', $filename));

            return false;
        }

        $zipArchive->close();

        return true;
    }

    /**
     * Runs the validator java application
     *
     * @return bool
     *
     * @throws InvoiceSuiteInvalidArgumentException
     * @throws TypeError
     * @throws ValueError
     */
    private function performValidation(): bool
    {
        if (true === $this->remoteModeEnabled) {
            return $this->performValidationRemote();
        }

        return $this->performValidationLocal();
    }

    /**
     * Runs the validator java application locally
     *
     * @return bool
     *
     * @throws InvoiceSuiteInvalidArgumentException
     * @throws TypeError
     * @throws ValueError
     */
    private function performValidationLocal(): bool
    {
        if (true === $this->remoteModeEnabled) {
            return true;
        }

        $this->resetFileToValidateFilename();

        if (false === file_put_contents($this->resolveFileToValidateFilename(), $this->getRawDocumentContent())) {
            $this->addErrorMessageToMessageBag('Cannot create temporary file which contains the XML to validate');

            return false;
        }

        $applicationOptions = [
            'java',
            '-jar',
            $this->resolveAppJarFilename(),
            '-r',
            $this->resolveBaseDirectory(),
            '-s',
            $this->resolveAppScenarioFilename(),
            $this->resolveFileToValidateFilename(),
        ];

        if (!$this->runValidationApplication($applicationOptions, $this->resolveBaseDirectory())) {
            $this->parseValidatorXmlReportByFile();

            return false;
        }

        return true;
    }

    /**
     * Runs the validator java application on the remote host
     *
     * @return bool
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    private function performValidationRemote(): bool
    {
        if (true !== $this->remoteModeEnabled) {
            return true;
        }

        try {
            $httpConnection = curl_init($this->getRemoteModeUrl());

            curl_setopt($httpConnection, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($httpConnection, CURLOPT_HEADER, true);
            curl_setopt($httpConnection, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($httpConnection, CURLOPT_ENCODING, '');
            curl_setopt($httpConnection, CURLOPT_AUTOREFERER, true);
            curl_setopt($httpConnection, CURLOPT_CONNECTTIMEOUT, 10);
            curl_setopt($httpConnection, CURLOPT_TIMEOUT, 120);
            curl_setopt($httpConnection, CURLOPT_POST, true);
            curl_setopt($httpConnection, CURLOPT_POSTFIELDS, $this->getRawDocumentContent());
            curl_setopt($httpConnection, CURLOPT_HTTPHEADER, ['Content-Type: application/xml']);

            $response = curl_exec($httpConnection);

            if (false === $response) {
                $this->addErrorMessageToMessageBag('Failed to connect to the host where the Validator is running in daemon mode');
                $this->addErrorMessageToMessageBag(curl_error($httpConnection));

                return false;
            }

            $responseStatusCode = curl_getinfo($httpConnection, CURLINFO_HTTP_CODE);

            if (($responseStatusCode < 200) || ($responseStatusCode >= 400)) {
                if (preg_match('/<\?xml.*?\?>.*<\/.+>/s', $response, $matches)) {
                    $this->parseValidatorXmlReportByContent($matches[0]);
                }

                return false;
            }
        } catch (Throwable $throwable) {
            $this->addErrorMessageToMessageBag($throwable->getMessage());

            return false;
        }

        return true;
    }

    /**
     * Parses the XML report from the validation app (JAVA application) and put errors
     * to messagebag
     *
     * @return void
     *
     * @throws InvoiceSuiteInvalidArgumentException
     * @throws TypeError
     * @throws ValueError
     */
    private function parseValidatorXmlReportByFile(): void
    {
        $reportFilename
            = InvoiceSuitePathUtils::combinePathWithFile(
                $this->resolveBaseDirectory(),
                InvoiceSuiteFileUtils::getFilenameWithoutExtension($this->resolveFileToValidateFilename()) . '-report.xml'
            );

        if (!InvoiceSuiteFileUtils::isReadableFilePath($reportFilename)) {
            return;
        }

        $domDocument = new DOMDocument();
        $domDocument->load($reportFilename);

        $this->parseValidatorXmlReportByDomDocument($domDocument);
    }

    /**
     * Parses the XML content string containing the response from the validation app (JAVA application) and put errors
     * to messagebag
     *
     * @param  string $xmlContent
     * @return void
     *
     * @throws InvoiceSuiteInvalidArgumentException
     * @throws TypeError
     * @throws ValueError
     */
    private function parseValidatorXmlReportByContent(
        string $xmlContent
    ): void {
        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($xmlContent)) {
            return;
        }

        $domDocument = new DOMDocument();
        $domDocument->loadXML($xmlContent);

        $this->parseValidatorXmlReportByDomDocument($domDocument);
    }

    /**
     * Parses the XML DOMDocument containing the response from the validation app (JAVA application) and put errors
     * to messagebag
     *
     * @param  DOMDocument $domDocument
     * @return void
     *
     * @throws InvoiceSuiteInvalidArgumentException
     * @throws TypeError
     * @throws ValueError
     */
    private function parseValidatorXmlReportByDomDocument(
        DOMDocument $domDocument
    ): void {
        $domXPath = new DOMXPath($domDocument);

        $messageTypeMaps = [
            InvoiceSuiteMessageSeverity::ERROR->value => 'error',
            InvoiceSuiteMessageSeverity::WARNING->value => 'warning',
            InvoiceSuiteMessageSeverity::INFO->value => 'information',
        ];

        $resultAreas = [
            'val-xsd',
            'val-sch.1',
            'val-sch.2',
            'val-xml',
        ];

        foreach ($resultAreas as $resultArea) {
            $queryResult = $domXPath->query(sprintf("//rep:report/rep:scenarioMatched/rep:validationStepResult[@id='%s']/s:resource/s:name", $resultArea));
            $resourceName = is_null($queryResult->item(0)) ? $resultArea : $queryResult->item(0)->nodeValue;
            foreach ($messageTypeMaps as $messageType => $reportMessageType) {
                $queryResult = $domXPath->query(sprintf("//rep:report/rep:scenarioMatched/rep:validationStepResult[@id='%s']/rep:message[@level='%s']", $resultArea, $reportMessageType));
                foreach ($queryResult as $queryItem) {
                    $this->addMessageToMessageBag(sprintf('%s: %s', $resourceName, $queryItem->nodeValue), InvoiceSuiteMessageSeverity::from($messageType));
                }
            }
        }
    }

    /**
     * Cleanup downloads and created files
     *
     * @return void
     */
    private function cleanupBaseDirectory(): void
    {
        if (true === $this->remoteModeEnabled) {
            return;
        }

        if (true === $this->cleanupBaseDirectoryIsDisabled) {
            return;
        }

        if (!is_dir($this->resolveBaseDirectory())) {
            return;
        }

        $this->cleanupBaseDirectoryInternal($this->resolveBaseDirectory());
    }

    /**
     * Helper method for removeBaseDirectory
     *
     * @param  string $directoryToRemove
     * @return void
     */
    private function cleanupBaseDirectoryInternal(
        string $directoryToRemove
    ): void {
        if (true === $this->remoteModeEnabled) {
            return;
        }

        if (!is_dir($directoryToRemove)) {
            return;
        }

        $filenames = scandir($directoryToRemove);

        if (false === $filenames) {
            return;
        }

        foreach ($filenames as $filename) {
            if ('.' !== $filename && '..' !== $filename) {
                $filenameWithPath = InvoiceSuitePathUtils::combinePathWithFile($directoryToRemove, $filename);

                if (is_dir($filenameWithPath) && !is_link($filenameWithPath)) {
                    $this->cleanupBaseDirectoryInternal($filenameWithPath);
                } else {
                    unlink($filenameWithPath);
                }
            }
        }

        rmdir($directoryToRemove);
    }

    /**
     * Runs a process. If the process runned successfully this method
     * returns true, otherwise false
     *
     * @param  array<int,string> $command
     * @param  string            $workingdirectory
     * @return bool
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    private function runValidationApplication(
        array $command,
        string $workingdirectory
    ): bool {
        try {
            $process = new Process($command);
            $process->setTimeout(0.0);
            $process->setWorkingDirectory($workingdirectory);
            $process->run();

            foreach (preg_split("/\r\n|\n|\r/", $process->getOutput()) as $outputLine) {
                $this->addInfoMessageToMessageBag($outputLine);
            }

            if (!$process->isSuccessful()) {
                if (-1 == $process->getExitCode()) {
                    $this->addErrorMessageToMessageBag('Parsing error. The commandline arguments specified are incorrect');
                }

                if (-2 == $process->getExitCode()) {
                    $this->addErrorMessageToMessageBag('Configuration error. There is an error loading the configuration and/or validation targets');
                }

                if ($process->getExitCode() > 0) {
                    $this->addErrorMessageToMessageBag('Validation error. One ore more files were rejected');
                }

                return false;
            }
        } catch (Throwable $throwable) {
            $this->addErrorMessageToMessageBag($throwable->getMessage());

            return false;
        }

        return true;
    }

    /**
     * Run a file download.
     *
     * @param  string $url
     * @param  string $toFilePath
     * @param  bool   $forceOverwrite
     * @return bool
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    private function runFileDownload(
        string $url,
        string $toFilePath,
        bool $forceOverwrite = false
    ): bool {
        if (InvoiceSuiteFileUtils::isReadableFilePath($toFilePath) && !$forceOverwrite) {
            return true;
        }

        $downloadedContent = file_get_contents($url);

        if (false === $downloadedContent) {
            $this->addErrorMessageToMessageBag(sprintf('Failed to download contents from %s', $url));

            return false;
        }

        if (false === file_put_contents($toFilePath, $downloadedContent)) {
            $this->addErrorMessageToMessageBag('Failed to save downloaded content');

            return false;
        }

        return true;
    }
}
