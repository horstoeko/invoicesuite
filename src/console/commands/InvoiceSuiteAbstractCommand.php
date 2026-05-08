<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\console\commands;

use finfo;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotReadableException;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteFileUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use RuntimeException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Exception\InvalidArgumentException as ConsoleInvalidArgumentException;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Base class for InvoiceSuite console commands.
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
abstract class InvoiceSuiteAbstractCommand extends Command
{
    /**
     * Input Interface
     *
     * @var InputInterface
     */
    protected $input;

    /**
     * Output Interface
     *
     * @var OutputInterface
     */
    protected $output;

    /**
     * Execute command
     *
     * @param  InputInterface  $input
     * @param  OutputInterface $output
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->input = $input;
        $this->output = $output;

        return $this->handle();
    }

    /**
     * Handle command
     *
     * @return int
     */
    abstract protected function handle(): int;

    /**
     * Return the result code for "success"
     *
     * @return int
     */
    protected function returnSuccess(): int
    {
        return self::SUCCESS;
    }

    /**
     * Return the result code for "failure"
     *
     * @return int
     */
    protected function returnFailure(): int
    {
        return self::FAILURE;
    }

    /**
     * Writes a message to the output and adds a newline at the end.
     *
     * @param  array<int, string>|string $messages
     * @param  int                       $options
     * @return static
     */
    protected function outputLineLF(iterable|string $messages, int $options = 0): static
    {
        $this->output->writeln($messages, $options);

        return $this;
    }

    /**
     * Undocumented function
     *
     * @param  array<int,string>             $headers
     * @param  array<int,array<int, string>> $rows
     * @return static
     */
    protected function outputTable(array $headers = [], array $rows = []): static
    {
        $table = (new Table($this->output))->setStyle('box');

        if ([] !== $headers) {
            $table->setHeaders($headers);
        }

        if ([] != $rows) {
            $table->addRows($rows);
        }

        $table->render();

        return $this;
    }

    /**
     * Get a string argument.
     *
     * @param  string $name
     * @param  string $default
     * @return string
     *
     * @throws ConsoleInvalidArgumentException
     * @throws RuntimeException
     */
    protected function getStringArgument(string $name, string $default = ''): string
    {
        $value = $this->input->getArgument($name);

        if (is_string($value)) {
            return $value;
        }

        if (null === $value) {
            return $default;
        }

        throw new RuntimeException(sprintf('Argument "%s" must be a string.', $name));
    }

    /**
     * Get a string argument. The argument-value is required.
     *
     * @param  string $name
     * @return string
     *
     * @throws ConsoleInvalidArgumentException
     * @throws RuntimeException
     */
    protected function getRequiredStringArgument(string $name): string
    {
        $value = $this->getStringArgument($name);

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($value)) {
            throw new RuntimeException(sprintf('Value for option %s must be given', $name));
        }

        return $value;
    }

    /**
     * Get a string option.
     *
     * @param  string $name
     * @param  string $default
     * @return string
     *
     * @throws ConsoleInvalidArgumentException
     * @throws RuntimeException
     */
    protected function getStringOption(string $name, string $default = ''): string
    {
        $value = $this->input->getOption($name);

        if (is_string($value)) {
            return $value;
        }

        if (null === $value) {
            return $default;
        }

        throw new RuntimeException(sprintf('Option "%s" must be a string.', $name));
    }

    /**
     * Get a string option. The option-value is required.
     *
     * @param  string $name
     * @return string
     *
     * @throws ConsoleInvalidArgumentException
     * @throws RuntimeException
     */
    protected function getRequiredStringOption(string $name): string
    {
        $value = $this->getStringOption($name);

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($value)) {
            throw new RuntimeException(sprintf('Value for option %s must be given', $name));
        }

        return $value;
    }

    /**
     * Get a boolean option.
     *
     * @param  string $name
     * @param  bool   $default
     * @return bool
     *
     * @throws ConsoleInvalidArgumentException
     * @throws RuntimeException
     */
    protected function getBoolOption(string $name, bool $default = false): bool
    {
        return filter_var($this->input->getOption($name), FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) ?? $default;
    }

    /**
     * Get an integer option.
     *
     * @param  string $name
     * @param  int    $default
     * @return int
     *
     * @throws ConsoleInvalidArgumentException
     * @throws RuntimeException
     */
    protected function getIntOption(string $name, int $default = 0): int
    {
        return filter_var($this->input->getOption($name), FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE) ?? $default;
    }

    /**
     * Get directory argument. Directory must not be empty and will be created if missing
     *
     * @param  string $name
     * @return string
     *
     * @throws ConsoleInvalidArgumentException
     * @throws RuntimeException
     */
    protected function getTargetDirectoryArgument(string $name): string
    {
        return $this->ensureDirectoryExists($this->getStringArgument($name));
    }

    /**
     * Get directory option. Directory must not be empty and will be created if missing
     *
     * @param  string $name
     * @return string
     *
     * @throws ConsoleInvalidArgumentException
     * @throws RuntimeException
     */
    protected function getTargetDirectoryOption(string $name): string
    {
        return $this->ensureDirectoryExists($this->getStringOption($name));
    }

    /**
     * Get input file argument. File must not be empty and must exist
     *
     * @param  string $name
     * @return string
     *
     * @throws ConsoleInvalidArgumentException
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws RuntimeException
     */
    protected function getSourceFileArgument(string $name): string
    {
        return $this->ensureFileExists($this->getStringArgument($name));
    }

    /**
     * Get input file option. File must not be empty and must exist
     *
     * @param  string $name
     * @return string
     *
     * @throws ConsoleInvalidArgumentException
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws RuntimeException
     */
    protected function getSourceFileOption(string $name): string
    {
        return $this->ensureFileExists($this->getStringOption($name));
    }

    /**
     * Get XML input file argument. File must not be empty and must exist
     *
     * @param  string $name
     * @return string
     *
     * @throws ConsoleInvalidArgumentException
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws RuntimeException
     */
    protected function getSourceXmlFileArgument(string $name): string
    {
        $filename = $this->getSourceFileArgument($name);

        $this->ensureIsXmlFile($filename);

        return $filename;
    }

    /**
     * Get XML input file option. File must not be empty and must exist
     *
     * @param  string $name
     * @return string
     *
     * @throws ConsoleInvalidArgumentException
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws RuntimeException
     */
    protected function getSourceXmlFileOption(string $name): string
    {
        $filename = $this->getSourceFileOption($name);

        $this->ensureIsXmlFile($filename);

        return $filename;
    }

    /**
     * Get PDF input file argument. File must not be empty and must exist
     *
     * @param  string $name
     * @return string
     *
     * @throws ConsoleInvalidArgumentException
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws RuntimeException
     */
    protected function getSourcePdfFileArgument(string $name): string
    {
        $filename = $this->getSourceFileArgument($name);

        $this->ensureIsPdfFile($filename);

        return $filename;
    }

    /**
     * Get PDF input file option. File must not be empty and must exist
     *
     * @param  string $name
     * @return string
     *
     * @throws ConsoleInvalidArgumentException
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws RuntimeException
     */
    protected function getSourcePdfFileOption(string $name): string
    {
        $filename = $this->getSourceFileOption($name);

        $this->ensureIsPdfFile($filename);

        return $filename;
    }

    /**
     * Get JSON input file argument. File must not be empty and must exist
     *
     * @param  string $name
     * @return string
     *
     * @throws ConsoleInvalidArgumentException
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws RuntimeException
     */
    protected function getSourceJsonFileArgument(string $name): string
    {
        $filename = $this->getSourceFileArgument($name);

        $this->ensureIsJsonFile($filename);

        return $filename;
    }

    /**
     * Get JSON input file option. File must not be empty and must exist
     *
     * @param  string $name
     * @return string
     *
     * @throws ConsoleInvalidArgumentException
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws RuntimeException
     */
    protected function getSourceJsonFileOption(string $name): string
    {
        $filename = $this->getSourceFileOption($name);

        $this->ensureIsJsonFile($filename);

        return $filename;
    }

    /**
     * Get JSON or XML input file argument. File must not be empty and must exist
     *
     * @param  string $name
     * @return string
     *
     * @throws ConsoleInvalidArgumentException
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws RuntimeException
     */
    protected function getSourceXmlOrJsonFileArgument(string $name): string
    {
        $filename = $this->getSourceFileArgument($name);

        $this->ensureIsXmlOrJsonFile($filename);

        return $filename;
    }

    /**
     * Get JSON or XML input file option. File must not be empty and must exist
     *
     * @param  string $name
     * @return string
     *
     * @throws ConsoleInvalidArgumentException
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws RuntimeException
     */
    protected function getSourceXmlOrJsonFileOption(string $name): string
    {
        $filename = $this->getSourceFileOption($name);

        $this->ensureIsXmlOrJsonFile($filename);

        return $filename;
    }

    /**
     * Get output file argument. File must not be empty and must exist
     *
     * @param  string $name
     * @param  bool   $forceOverwrite
     * @return string
     *
     * @throws ConsoleInvalidArgumentException
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws RuntimeException
     */
    protected function getTargetFileArgument(string $name, bool $forceOverwrite = false): string
    {
        $this->ensureTargetFileDirectoryExists($this->getStringArgument($name));
        $this->ensureTargetFileCanBeCreated($this->getStringArgument($name), $forceOverwrite);

        return $this->getStringArgument($name);
    }

    /**
     * Get output file option. File must not be empty and must exist
     *
     * @param  string $name
     * @param  bool   $forceOverwrite
     * @return string
     *
     * @throws ConsoleInvalidArgumentException
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws RuntimeException
     */
    protected function getTargetFileOption(string $name, bool $forceOverwrite = false): string
    {
        $this->ensureTargetFileDirectoryExists($this->getStringOption($name));
        $this->ensureTargetFileCanBeCreated($this->getStringOption($name), $forceOverwrite);

        return $this->getStringOption($name);
    }

    /**
     * Ensure that a directory exists.
     *
     * @param  string $directory
     * @return string
     *
     * @throws RuntimeException
     */
    protected function ensureDirectoryExists(string $directory): string
    {
        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($directory)) {
            throw new RuntimeException('The directory name must not be empty.');
        }

        if (!is_dir($directory) && !mkdir($directory, 0777, true) && !is_dir($directory)) {
            throw new RuntimeException(sprintf('Unable to create directory "%s".', $directory));
        }

        return $directory;
    }

    /**
     * Ensure that a fileexists.
     *
     * @param  string $filename
     * @return string
     *
     * @throws InvoiceSuiteFileNotFoundException
     * @throws RuntimeException
     */
    protected function ensureFileExists(string $filename): string
    {
        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($filename)) {
            throw new RuntimeException('The file name must not be empty.');
        }

        if (!InvoiceSuiteFileUtils::isReadableFilePath($filename)) {
            throw new InvoiceSuiteFileNotFoundException($filename);
        }

        return $filename;
    }

    /**
     * Ensure that the target file can be created without unintended overwrite.
     *
     * @param  string $filename
     * @param  bool   $forceOverwrite
     * @return static
     *
     * @throws RuntimeException
     */
    protected function ensureTargetFileCanBeCreated(string $filename, bool $forceOverwrite = false): static
    {
        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($filename)) {
            throw new RuntimeException('The file name must not be empty.');
        }

        if (InvoiceSuiteFileUtils::isReadableFilePath($filename) && false === $forceOverwrite) {
            throw new RuntimeException(sprintf('Target file "%s" already exists. Use --force to overwrite.', $filename));
        }

        return $this;
    }

    /**
     * Ensure that the parent directory for a target file exists.
     *
     * @param  string $filename
     * @return static
     *
     * @throws RuntimeException
     */
    protected function ensureTargetFileDirectoryExists(string $filename): static
    {
        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($filename)) {
            throw new RuntimeException('The file name must not be empty.');
        }

        $targetDirectory = dirname($filename);

        if ('.' !== $targetDirectory) {
            $this->ensureDirectoryExists($targetDirectory);
        }

        return $this;
    }

    /**
     * Detect the MIME type of a file.
     *
     * @param  string $filename
     * @return string
     *
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws RuntimeException
     */
    protected function detectMimeTypeByFilename(string $filename): string
    {
        $filename = $this->ensureFileExists($filename);

        $fileInfo = new finfo(FILEINFO_MIME_TYPE);
        $fileMimeType = $fileInfo->file($filename, FILEINFO_MIME_TYPE);

        if (false === $fileMimeType) {
            throw new RuntimeException(sprintf('Unable to detect MIME type for file "%s".', $filename));
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($fileMimeType)) {
            throw new RuntimeException(sprintf('Unable to detect MIME type for file "%s".', $filename));
        }

        return $fileMimeType;
    }

    /**
     * Check if given file is a XML file
     *
     * @param  string $filename
     * @return bool
     *
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws RuntimeException
     */
    protected function isXmlFile(string $filename): bool
    {
        return InvoiceSuiteArrayUtils::inArrayNoCase(['application/xml', 'text/xml'], $this->detectMimeTypeByFilename($filename));
    }

    /**
     * Check if given file is a PDF file
     *
     * @param  string $filename
     * @return bool
     *
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws RuntimeException
     */
    protected function isPdfFile(string $filename): bool
    {
        return InvoiceSuiteArrayUtils::inArrayNoCase(['application/pdf'], $this->detectMimeTypeByFilename($filename));
    }

    /**
     * Check if given file is a JSON file
     *
     * @param  string $filename
     * @return bool
     *
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws RuntimeException
     */
    protected function isJsonFile(string $filename): bool
    {
        return InvoiceSuiteArrayUtils::inArrayNoCase(['application/json'], $this->detectMimeTypeByFilename($filename));
    }

    /**
     * Check if given file is a XML or JSON file
     *
     * @param  string $filename
     * @return bool
     *
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws RuntimeException
     */
    protected function isXmlOrJsonFile(string $filename): bool
    {
        return $this->isXmlFile($filename) || $this->isJsonFile($filename);
    }

    /**
     * Ensure given file is a XML file
     *
     * @param  string $filename
     * @return static
     *
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws RuntimeException
     */
    protected function ensureIsXmlFile(string $filename): static
    {
        if (!$this->isXmlFile($filename)) {
            throw new RuntimeException(sprintf('Input file "%s" is not a XML file.', $filename));
        }

        return $this;
    }

    /**
     * Ensure given file is a PDF file
     *
     * @param  string $filename
     * @return static
     *
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws RuntimeException
     */
    protected function ensureIsPdfFile(string $filename): static
    {
        if (!$this->isPdfFile($filename)) {
            throw new RuntimeException(sprintf('Input file "%s" is not a PDF file.', $filename));
        }

        return $this;
    }

    /**
     * Ensure given file is a JSON file
     *
     * @param  string $filename
     * @return static
     *
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws RuntimeException
     */
    protected function ensureIsJsonFile(string $filename): static
    {
        if (!$this->isJsonFile($filename)) {
            throw new RuntimeException(sprintf('Input file "%s" is not a JSON file.', $filename));
        }

        return $this;
    }

    /**
     * Ensure given file is a XML or JSON file
     *
     * @param  string $filename
     * @return static
     *
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws RuntimeException
     */
    protected function ensureIsXmlOrJsonFile(string $filename): static
    {
        if (!$this->isXmlOrJsonFile($filename)) {
            throw new RuntimeException(sprintf('Input file "%s" is not a XML or JSON file.', $filename));
        }

        return $this;
    }
}
