<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\console\commands;

use horstoeko\invoicesuite\concerns\HandlesDocumentFormatProviders;
use horstoeko\invoicesuite\documents\abstracts\InvoiceSuiteAbstractDocumentFormatProvider;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use RuntimeException;
use Symfony\Component\Console\Exception\InvalidArgumentException;
use Symfony\Component\Console\Exception\InvalidArgumentException as ConsoleInvalidArgumentException;
use Symfony\Component\Console\Input\InputOption;

/**
 * Class representing a console command that lists all available document format providers
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteListProvidersCommand extends InvoiceSuiteAbstractCommand
{
    use HandlesDocumentFormatProviders;

    /**
     * Configure command
     *
     * @return void
     *
     * @throws InvalidArgumentException
     */
    protected function configure(): void
    {
        $this->setName('invoicesuite:providers:list');
        $this->setDescription('List all available document format providers');
        $this->addOption('output-json', null, InputOption::VALUE_NONE, 'Output results as JSON');
    }

    /**
     * Execute command
     *
     * @return int
     *
     * @throws ConsoleInvalidArgumentException
     * @throws RuntimeException
     */
    protected function handle(): int
    {
        $this->resolveAvailableDocumentFormatProviders();

        $jsonRowsToOutput = InvoiceSuiteArrayUtils::map(
            static fn (InvoiceSuiteAbstractDocumentFormatProvider $provider) => [
                'id' => InvoiceSuiteStringUtils::mbTrimWidth($provider->getUniqueId(), 0, 30, '...'),
                'description' => InvoiceSuiteStringUtils::mbTrimWidth($provider->getDescription(), 0, 60, '...'),
                'version' => (string) $provider->getVersion(),
                'contentType' => $provider->getContentType()->value,
                'pdfSupportAvailable' => $provider->getIsPdfSupportAvailable(),
                'xsdValidationAvailable' => $provider->getValidationXsdAvailable(),
            ],
            $this->getRegisteredDocumentFormatProviders()
        );

        $tableRowsToOutput = InvoiceSuiteArrayUtils::map(
            static fn (InvoiceSuiteAbstractDocumentFormatProvider $provider) => [
                InvoiceSuiteStringUtils::mbTrimWidth($provider->getUniqueId(), 0, 30, '...'),
                InvoiceSuiteStringUtils::mbTrimWidth($provider->getDescription(), 0, 60, '...'),
                (string) $provider->getVersion(),
                $provider->getContentType()->value,
                $provider->getIsPdfSupportAvailable() ? 'yes' : 'no',
                $provider->getValidationXsdAvailable() ? 'yes' : 'no',
            ],
            $this->getRegisteredDocumentFormatProviders()
        );

        return $this
            ->outputJsonWhen($this->getBoolOption('output-json'), $jsonRowsToOutput)
            ->outputTableWhen(!$this->getBoolOption('output-json'), ['Provider', 'Description', 'Version', 'Content-Type', 'PDF', 'XSD'], $tableRowsToOutput)
            ->returnSuccess();
    }
}
