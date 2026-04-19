<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\console;

use horstoeko\invoicesuite\console\commands\InvoiceSuiteConvertCommand;
use horstoeko\invoicesuite\console\commands\InvoiceSuiteDetectCommand;
use horstoeko\invoicesuite\console\commands\InvoiceSuiteExtractCommand;
use horstoeko\invoicesuite\console\commands\InvoiceSuiteListProvidersCommand;
use horstoeko\invoicesuite\console\commands\InvoiceSuiteMakeProviderCommand;
use horstoeko\invoicesuite\console\commands\InvoiceSuiteMergePdfWithXmlCommand;
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
        $this->addCommand(new InvoiceSuiteConvertCommand());
        $this->addCommand(new InvoiceSuiteDetectCommand());
        $this->addCommand(new InvoiceSuiteExtractCommand());
        $this->addCommand(new InvoiceSuiteListProvidersCommand());
        $this->addCommand(new InvoiceSuiteMakeProviderCommand());
        $this->addCommand(new InvoiceSuiteMergePdfWithXmlCommand());
        $this->addCommand(new InvoiceSuiteValidateCommand());
        $this->addCommand(new InvoiceSuiteVisualizeCommand());
    }
}
