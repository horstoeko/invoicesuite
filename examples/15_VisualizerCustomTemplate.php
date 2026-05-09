<?php

use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;
use horstoeko\invoicesuite\visualizers\InvoiceSuiteVisualizer;
use horstoeko\invoicesuite\visualizers\renderers\InvoiceSuiteVisualizerFileTemplateRenderer;

/**
 * Visualize an electronic invoice XML document by using a small custom template
 */

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/00_ExampleHelpers.php';

$sourceFilesDirectory = InvoiceSuitePathUtils::combineAllPaths(__DIR__, '..', 'tests', 'assets');
$invoiceXmlFilename = InvoiceSuitePathUtils::combinePathWithFile($sourceFilesDirectory, '03_zugferddocumentreader_3.xml');
$customTemplateFilename = InvoiceSuitePathUtils::combinePathWithFile(__DIR__, '15_CustomTemplate.tmpl');
$targetHtmlFilename = InvoiceSuitePathUtils::combinePathWithFile(__DIR__, '15_CustomTemplateInvoice.html');
$targetPdfFilename = InvoiceSuitePathUtils::combinePathWithFile(__DIR__, '15_CustomTemplateInvoice.pdf');

/*
 * A custom file template receives the current document reader as $document.
 * This keeps the example self-contained; in real projects the template usually already exists.
 */

$customTemplateContent = <<<'TMPL'
<?php

$document->getDocumentNo($documentNumber);
$document->getDocumentDate($documentDate);
$document->getDocumentSellerName($sellerName);
$document->getDocumentBuyerName($buyerName);
$document->getDocumentSummation($netAmount, $chargeTotalAmount, $discountTotalAmount, $taxBasisAmount, $taxTotalAmount, $taxTotalAmount2, $grossAmount, $dueAmount, $prepaidAmount, $roundingAmount);

?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: sans-serif; font-size: 10pt; }
        h1 { font-size: 18pt; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border-bottom: 1px solid #cccccc; padding: 6px; text-align: left; }
    </style>
</head>
<body>
    <h1>Invoice <?php echo htmlspecialchars((string) $documentNumber); ?></h1>
    <table>
        <tr><th>Date</th><td><?php echo $documentDate?->format('Y-m-d') ?? ''; ?></td></tr>
        <tr><th>Seller</th><td><?php echo htmlspecialchars((string) $sellerName); ?></td></tr>
        <tr><th>Buyer</th><td><?php echo htmlspecialchars((string) $buyerName); ?></td></tr>
        <tr><th>Gross amount</th><td><?php echo number_format((float) $grossAmount, 2, '.', ''); ?></td></tr>
        <tr><th>Due amount</th><td><?php echo number_format((float) $dueAmount, 2, '.', ''); ?></td></tr>
    </table>
</body>
</html>
TMPL;

file_put_contents($customTemplateFilename, $customTemplateContent);

$visualizer = InvoiceSuiteVisualizer::createFromFile($invoiceXmlFilename, new InvoiceSuiteVisualizerFileTemplateRenderer());
$visualizer->setTemplate($customTemplateFilename)->renderMarkupFile($targetHtmlFilename)->renderPdfFile($targetPdfFilename);

echo sprintf("Created custom template: %s\n", $customTemplateFilename);
echo sprintf("Created invoice visualization HTML: %s\n", $targetHtmlFilename);
echo sprintf("Created invoice visualization PDF: %s\n", $targetPdfFilename);
