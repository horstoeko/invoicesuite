<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\console;

use horstoeko\invoicesuite\console\commands\InvoiceSuiteCacheClearCommand;
use horstoeko\invoicesuite\console\commands\InvoiceSuiteCacheRebuildCommand;
use horstoeko\invoicesuite\console\commands\InvoiceSuiteDetectCommand;
use horstoeko\invoicesuite\console\commands\InvoiceSuiteExportPdfAttachmentsCommand;
use horstoeko\invoicesuite\console\commands\InvoiceSuiteListProvidersCommand;
use horstoeko\invoicesuite\console\commands\InvoiceSuiteMakeProviderCommand;
use horstoeko\invoicesuite\console\commands\InvoiceSuiteMergePdfCommand;
use horstoeko\invoicesuite\console\commands\InvoiceSuiteValidateCommand;
use horstoeko\invoicesuite\console\commands\InvoiceSuiteVisualizeCommand;
use horstoeko\invoicesuite\utils\InvoiceSuitePackageVersion;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Exception\LogicException;

/**
 * Console application for InvoiceSuite.
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteConsoleApplication extends Application
{
    /**
     * Constructor.
     *
     * @throws LogicException
     */
    public function __construct()
    {
        parent::__construct('InvoiceSuite', InvoiceSuitePackageVersion::getInstalledVersion());

        $this->registerBuiltInCommands();
    }

    /**
     * Register bundled commands.
     *
     * @return void
     *
     * @throws LogicException
     */
    protected function registerBuiltInCommands(): void
    {
        $this->add(new InvoiceSuiteListProvidersCommand());
        $this->add(new InvoiceSuiteMakeProviderCommand());
        $this->add(new InvoiceSuiteDetectCommand());
        $this->add(new InvoiceSuiteMergePdfCommand());
        $this->add(new InvoiceSuiteValidateCommand());
        $this->add(new InvoiceSuiteVisualizeCommand());
        $this->add(new InvoiceSuiteExportPdfAttachmentsCommand());
        $this->add(new InvoiceSuiteCacheClearCommand());
        $this->add(new InvoiceSuiteCacheRebuildCommand());
    }
}
