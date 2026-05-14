<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\console\commands;

use horstoeko\invoicesuite\utils\InvoiceSuiteClassFinder;
use Symfony\Component\Console\Exception\InvalidArgumentException;

/**
 * Class representing a console command that clears the InvoiceSuite cache.
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteCacheClearCommand extends InvoiceSuiteAbstractCommand
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
        $this->setName('invoicesuite:cache:clear');
        $this->setDescription('Clear InvoiceSuite class finder and serializer cache files');
    }

    /**
     * Execute command.
     *
     * @return int
     */
    protected function handle(): int
    {
        InvoiceSuiteClassFinder::clearCache();

        $this->outputLineLF('<info>Cache cleared.</info>');

        return $this->returnSuccess();
    }
}
