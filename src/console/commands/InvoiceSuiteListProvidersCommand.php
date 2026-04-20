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
use Symfony\Component\Console\Exception\InvalidArgumentException;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class representing a console command that lists all available document format providers
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteListProvidersCommand extends InvoiceSuiteBaseCommand
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
    }

    /**
     * Execute command
     *
     * @param  InputInterface  $input
     * @param  OutputInterface $output
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->resolveAvailableDocumentFormatProviders();

        $table = new Table($output);
        $table->setStyle('box');
        $table->setHeaders(['Provider', 'Description', 'Content-Type', 'PDF', 'XSD']);

        foreach ($this->getRegisteredDocumentFormatProviders() as $provider) {
            $table->addRow([
                $provider->getUniqueId(),
                substr($provider->getDescription(), 0, 40),
                $provider->getContentType()->value,
                $provider->getIsPdfSupportAvailable() ? 'yes' : 'no',
                $provider->getValidationXsdAvailable() ? 'yes' : 'no',
            ]);
        }

        $table->render();

        return self::SUCCESS;
    }
}
