<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\console\commands;

use horstoeko\invoicesuite\documents\abstracts\InvoiceSuiteAbstractDocumentFormatProvider;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteClassFinder;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use Symfony\Component\Console\Exception\InvalidArgumentException;

/**
 * Class representing a console command that rebuilds the InvoiceSuite cache.
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteCacheRebuildCommand extends InvoiceSuiteAbstractCommand
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
        $this->setName('invoicesuite:cache:rebuild');
        $this->setDescription('Rebuild InvoiceSuite class finder cache files');
    }

    /**
     * Execute command.
     *
     * @return int
     */
    protected function handle(): int
    {
        InvoiceSuiteClassFinder::clearCache();

        $documentFormatProviderClasses = InvoiceSuiteClassFinder::factory()
            ->init()
            ->getClassesWhenItsSubClassOf(InvoiceSuiteAbstractDocumentFormatProvider::class);

        return $this->outputLineLF(InvoiceSuiteStringUtils::sprintf(
            '<info>Cache rebuilt. %d document format providers found.</info>',
            InvoiceSuiteArrayUtils::count($documentFormatProviderClasses)
        ))->returnSuccess();
    }
}
