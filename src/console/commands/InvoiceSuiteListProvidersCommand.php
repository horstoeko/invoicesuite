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

        if (true === $this->getBoolOption('output-json')) {
            return $this->outputLineLF(json_encode(array_map(
                static fn ($provider) => [
                    'id' => mb_strimwidth($provider->getUniqueId(), 0, 30, '...'),
                    'description' => mb_strimwidth($provider->getDescription(), 0, 60, '...'),
                    'contentType' => $provider->getContentType()->value,
                    'pdfSupportAvailable' => $provider->getIsPdfSupportAvailable(),
                    'xsdValidationAvailable' => $provider->getValidationXsdAvailable(),
                ],
                $this->getRegisteredDocumentFormatProviders()
            ), JSON_PRETTY_PRINT))->returnSuccess();
        }

        $rowsToOutput = array_map(
            static fn ($provider) => [
                mb_strimwidth($provider->getUniqueId(), 0, 30, '...'),
                mb_strimwidth($provider->getDescription(), 0, 60, '...'),
                $provider->getContentType()->value,
                $provider->getIsPdfSupportAvailable() ? 'yes' : 'no',
                $provider->getValidationXsdAvailable() ? 'yes' : 'no',
            ],
            $this->getRegisteredDocumentFormatProviders()
        );

        return $this->outputTable(['Provider', 'Description', 'Content-Type', 'PDF', 'XSD'], $rowsToOutput)->returnSuccess();
    }
}
