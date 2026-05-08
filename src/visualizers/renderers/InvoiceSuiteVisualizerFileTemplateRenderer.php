<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\visualizers\renderers;

use horstoeko\invoicesuite\InvoiceSuiteDocumentReader;
use horstoeko\invoicesuite\utils\InvoiceSuiteFileUtils;
use horstoeko\invoicesuite\visualizers\abstracts\InvoiceSuiteVisualizerAbstractRenderer;

/**
 * Class representing the default markup renderer
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteVisualizerFileTemplateRenderer extends InvoiceSuiteVisualizerAbstractRenderer
{
    /**
     * {@inheritDoc}
     */
    public function templateExists(
        string $template
    ): bool {
        return InvoiceSuiteFileUtils::isReadableFilePath($template);
    }

    /**
     * {@inheritDoc}
     */
    public function render(
        InvoiceSuiteDocumentReader $document,
        string $template
    ): string {
        ob_start();

        include $template;

        return ob_get_clean();
    }
}
