<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\console\commands;

use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;
use RuntimeException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Exception\InvalidArgumentException;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class representing a console command that generates a provider scaffold.
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteMakeProviderCommand extends Command
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
        $this->addOption('root-class', null, InputOption::VALUE_OPTIONAL, 'Root class name');
        $this->addOption('force', 'f', InputOption::VALUE_NONE, 'Overwrite existing files');
    }

    /**
     * Execute command.
     *
     * @param  InputInterface  $input
     * @param  OutputInterface $output
     * @return int
     *
     * @throws InvalidArgumentException
     * @throws RuntimeException
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $namespace = trim((string) $input->getArgument('namespace'), '\\');
        $directory = (string) $input->getArgument('directory');
        $providerClassName = trim((string) $input->getArgument('provider-class'));
        $readerClassName = $providerClassName . 'Reader';
        $builderClassName = $providerClassName . 'Builder';
        $providerUniqueId = (string) ($input->getOption('unique-id') ?: strtolower($providerClassName));
        $providerDescription = (string) ($input->getOption('description') ?: $providerClassName);
        $rootClassName = (string) ($input->getOption('root-class') ?: '');
        $force = (bool) $input->getOption('force');

        if ('' === $namespace || '' === $providerClassName) {
            throw new RuntimeException('Namespace and provider class must not be empty.');
        }

        if (!is_dir($directory) && !mkdir($directory, 0777, true) && !is_dir($directory)) {
            throw new RuntimeException(sprintf('Unable to create target directory "%s".', $directory));
        }

        $templateDirectory = InvoiceSuitePathUtils::combineAllPaths(dirname(__DIR__), 'templates');
        $providerPath = InvoiceSuitePathUtils::combinePathWithFile($directory, $providerClassName . '.php');
        $readerPath = InvoiceSuitePathUtils::combinePathWithFile($directory, $readerClassName . '.php');
        $builderPath = InvoiceSuitePathUtils::combinePathWithFile($directory, $builderClassName . '.php');

        $replacements = [
            '{{NAMESPACE}}' => $namespace,
            '{{PROVIDER_CLASS_NAME}}' => $providerClassName,
            '{{READER_CLASS_NAME}}' => $readerClassName,
            '{{BUILDER_CLASS_NAME}}' => $builderClassName,
            '{{READER_CLASS_NAME_FQCN}}' => '\\' . $namespace . '\\' . $readerClassName,
            '{{BUILDER_CLASS_NAME_FQCN}}' => '\\' . $namespace . '\\' . $builderClassName,
            '{{PROVIDER_UNIQUE_ID}}' => $providerUniqueId,
            '{{PROVIDER_DESCRIPTION}}' => $providerDescription,
            '{{ROOT_CLASS_NAME}}' => $rootClassName,
        ];

        $this->writeTemplate(InvoiceSuitePathUtils::combinePathWithFile($templateDirectory, 'provider.tpl'), $providerPath, $replacements, $force);
        $this->writeTemplate(InvoiceSuitePathUtils::combinePathWithFile($templateDirectory, 'provider_reader.tpl'), $readerPath, $replacements, $force);
        $this->writeTemplate(InvoiceSuitePathUtils::combinePathWithFile($templateDirectory, 'provider_builder.tpl'), $builderPath, $replacements, $force);

        $output->writeln(sprintf('<info>Created:</info> %s', $providerPath));
        $output->writeln(sprintf('<info>Created:</info> %s', $readerPath));
        $output->writeln(sprintf('<info>Created:</info> %s', $builderPath));

        return self::SUCCESS;
    }

    /**
     * Render and write a template file.
     *
     * @param  string               $templatePath
     * @param  string               $targetPath
     * @param  array<string,string> $replacements
     * @param  bool                 $force
     * @return void
     *
     * @throws RuntimeException
     */
    protected function writeTemplate(string $templatePath, string $targetPath, array $replacements, bool $force): void
    {
        if (is_file($targetPath) && false === $force) {
            throw new RuntimeException(sprintf('Target file "%s" already exists. Use --force to overwrite.', $targetPath));
        }

        $templateContent = file_get_contents($templatePath);

        if (false === $templateContent) {
            throw new RuntimeException(sprintf('Unable to read template "%s".', $templatePath));
        }

        $targetContent = strtr($templateContent, $replacements);

        if (false === file_put_contents($targetPath, $targetContent)) {
            throw new RuntimeException(sprintf('Unable to write target file "%s".', $targetPath));
        }
    }
}
