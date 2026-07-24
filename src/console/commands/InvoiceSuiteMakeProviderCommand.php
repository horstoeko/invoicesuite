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
use horstoeko\invoicesuite\utils\InvoiceSuiteFileUtils;
use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use RuntimeException;
use Symfony\Component\Console\Exception\InvalidArgumentException;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

/**
 * Class representing a console command that generates a provider scaffold.
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteMakeProviderCommand extends InvoiceSuiteAbstractCommand
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
        $this->setName('invoicesuite:providers:make');
        $this->setDescription('Generate a new provider, reader and builder scaffold');
        $this->addArgument('namespace', InputArgument::REQUIRED, 'Target namespace');
        $this->addArgument('directory', InputArgument::REQUIRED, 'Target directory');
        $this->addArgument('provider-class', InputArgument::REQUIRED, 'Provider class name');
        $this->addOption('unique-id', null, InputOption::VALUE_OPTIONAL, 'Provider unique id');
        $this->addOption('description', null, InputOption::VALUE_OPTIONAL, 'Provider description');
        $this->addOption('force', 'f', InputOption::VALUE_NONE, 'Overwrite existing files');
    }

    /**
     * Execute command.
     *
     * @return int
     *
     * @throws InvalidArgumentException
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws RuntimeException
     */
    protected function handle(): int
    {
        $inpArgNamespace = $this->getRequiredStringArgument('namespace');
        $inpArgDirectory = $this->getTargetDirectoryArgument('directory');
        $inpArgProviderClassName = $this->getRequiredStringArgument('provider-class');

        $inpOptionProviderUniqueId = $this->getStringOption('unique-id', InvoiceSuiteStringUtils::lower($inpArgProviderClassName));
        $inpOptionProviderDescription = $this->getStringOption('description', InvoiceSuiteStringUtils::lower($inpArgProviderClassName));
        $inpOptionForce = $this->getBoolOption('force');

        $newProviderReaderClassName = $inpArgProviderClassName . 'Reader';
        $newProviderBuilderClassName = $inpArgProviderClassName . 'Builder';

        $existingTemplateDirectory = InvoiceSuitePathUtils::combineAllPaths(dirname(__DIR__), 'templates');
        $newProviderPath = InvoiceSuitePathUtils::combinePathWithFile($inpArgDirectory, $inpArgProviderClassName . '.php');
        $newProviderReaderPath = InvoiceSuitePathUtils::combinePathWithFile($inpArgDirectory, $newProviderReaderClassName . '.php');
        $newProviderBuilderPath = InvoiceSuitePathUtils::combinePathWithFile($inpArgDirectory, $newProviderBuilderClassName . '.php');

        $myReplacements = [
            '{{NAMESPACE}}' => $inpArgNamespace,
            '{{PROVIDER_CLASS_NAME}}' => $inpArgProviderClassName,
            '{{READER_CLASS_NAME}}' => $newProviderReaderClassName,
            '{{BUILDER_CLASS_NAME}}' => $newProviderBuilderClassName,
            '{{READER_CLASS_NAME_FQCN}}' => '\\' . $inpArgNamespace . '\\' . $newProviderReaderClassName,
            '{{BUILDER_CLASS_NAME_FQCN}}' => '\\' . $inpArgNamespace . '\\' . $newProviderBuilderClassName,
            '{{PROVIDER_UNIQUE_ID}}' => $inpOptionProviderUniqueId,
            '{{PROVIDER_DESCRIPTION}}' => $inpOptionProviderDescription,
        ];

        $this->writeTemplate(InvoiceSuitePathUtils::combinePathWithFile($existingTemplateDirectory, 'provider.tpl'), $newProviderPath, $myReplacements, $inpOptionForce);
        $this->writeTemplate(InvoiceSuitePathUtils::combinePathWithFile($existingTemplateDirectory, 'provider_reader.tpl'), $newProviderReaderPath, $myReplacements, $inpOptionForce);
        $this->writeTemplate(InvoiceSuitePathUtils::combinePathWithFile($existingTemplateDirectory, 'provider_builder.tpl'), $newProviderBuilderPath, $myReplacements, $inpOptionForce);

        $this->outputLineLF(InvoiceSuiteStringUtils::sprintf('<info>Created:</info> %s', $newProviderPath));
        $this->outputLineLF(InvoiceSuiteStringUtils::sprintf('<info>Created:</info> %s', $newProviderReaderPath));
        $this->outputLineLF(InvoiceSuiteStringUtils::sprintf('<info>Created:</info> %s', $newProviderBuilderPath));

        return $this->returnSuccess();
    }

    /**
     * Render and write a template file.
     *
     * @param  string               $templatePath
     * @param  string               $targetPath
     * @param  array<string,string> $replacements
     * @param  bool                 $forceOverwrite
     * @return static
     *
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws RuntimeException
     */
    protected function writeTemplate(
        string $templatePath,
        string $targetPath,
        array $replacements,
        bool $forceOverwrite
    ): static {
        $this->outputFile(
            $targetPath,
            InvoiceSuiteStringUtils::translateArray(
                InvoiceSuiteFileUtils::getContentFromFile($templatePath),
                $replacements
            ),
            $forceOverwrite
        );

        return $this;
    }
}
