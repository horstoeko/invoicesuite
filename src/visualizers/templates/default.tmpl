<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\visualizers\templates;

use horstoeko\invoicesuite\documents\abstracts\InvoiceSuiteAbstractDocumentFormatReader;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;

?>

<html>

<head>
    <style>
        @page {
            size: 21cm 29cm;
            margin-left: 2.5cm;
        }

        body {
            font-size: 9pt;
        }

        h1 {
            font-size: 19px;
        }

        table {
            margin: 0;
            padding: 0;
            table-layout: fixed;
        }

        tr {
            margin: 0;
            padding: 0;
        }

        th,
        td {
            vertical-align: top;
        }

        th {
            margin-left: 0;
            margin-right: 0;
            padding-left: 0;
            padding-right: 0;
            font-size: 8pt;
        }

        td {
            font-size: 8pt;
        }

        table.postable {
            width: 100%;
            min-width: 100%;
            max-width: 100%;
            margin-top: 5px;
        }

        table.postable th {
            padding-bottom: 10px;
        }

        table.postable td.posno,
        table.postable th.posno {
            width: 10%;
            min-width: 10%;
            max-width: 10%;
            text-align: left;
        }

        table.postable td.posdesc,
        table.postable th.posdesc {
            width: 20%;
            min-width: 20%;
            max-width: 20%;
            text-align: left;
        }

        table.postable td.posqty,
        table.postable th.posqty {
            width: 20%;
            min-width: 20%;
            max-width: 20%;
            text-align: right;
        }

        table.postable td.posunitprice,
        table.postable th.posunitprice {
            width: 20%;
            min-width: 20%;
            max-width: 20%;
            text-align: right;
        }

        table.postable td.poslineamount,
        table.postable th.poslineamount {
            width: 20%;
            min-width: 20%;
            max-width: 20%;
            text-align: right;
        }

        table.postable td.poslinevat,
        table.postable th.poslinevat {
            width: 10%;
            min-width: 10%;
            max-width: 10%;
            text-align: right;
        }

        table.postable th.posno {
            border-bottom: 1px solid #dcdcdc;
        }

        table.postable th.posdesc {
            border-bottom: 1px solid #dcdcdc;
        }

        table.postable th.posqty {
            border-bottom: 1px solid #dcdcdc;
        }

        table.postable th.posunitprice {
            border-bottom: 1px solid #dcdcdc;
        }

        table.postable th.poslineamount {
            border-bottom: 1px solid #dcdcdc;
        }

        table.postable th.poslinevat {
            border-bottom: 1px solid #dcdcdc;
        }

        table.postable td.totalname {
            width: 20%;
            min-width: 20%;
            max-width: 20%;
            text-align: left;
            border-bottom: 1px solid #dcdcdc;
        }

        table.postable td.totalvalue {
            width: 20%;
            min-width: 20%;
            max-width: 20%;
            text-align: right;
            border-bottom: 1px solid #dcdcdc;
        }

        .space {
            padding-top: 10px;
        }

        .space2 {
            padding-top: 20px;
        }

        .space3 {
            padding-top: 30px;
        }

        .bold {
            font-weight: bold;
        }

        .italic {
            font-style: italic;
        }

        .red {
            color: #ff0000;
        }

        .green {
            color: #00fff0
        }

        .mt-15 {
            margin-top: 15px;
        }

        .mt-20 {
            margin-top: 20px;
        }

        .mt-25 {
            margin-top: 25px;
        }

        .mt-30 {
            margin-top: 30px;
        }

        .pt-15 {
            padding-top: 15px;
        }

        .pt-20 {
            padding-top: 20px;
        }

        .pt-25 {
            padding-top: 25px;
        }

        .pt-30 {
            padding-top: 30px;
        }

        .fs-10 {
            font-size: 10pt;
        }

        .fs-11 {
            font-size: 11pt;
        }

        .fs-12 {
            font-size: 12pt;
        }

        .fs-13 {
            font-size: 13pt;
        }

        .fs-14 {
            font-size: 14pt;
        }

        .pb-0 {
            padding-bottom: 0px;
        }
    </style>
</head>

<body>

    <?php
    /**
     * @var InvoiceSuiteAbstractDocumentFormatReader $document
     */
    $document->getDocumentNo($documentno);
$document->getDocumentDate($documentdate);
$document->getDocumentBuyerName($buyername);
$document->getDocumentBuyerAddress($buyeraddressline1, $buyeraddressline2, $buyeraddressline3, $buyerpostcode, $buyercity, $buyercounty, $buyersubdivision);
?>

    <p>
        <!-- Buyer Address -->

        <?php echo $buyername; ?><br>
        <?php if ($buyeraddressline1) { ?><?php echo $buyeraddressline1; ?><br><?php } ?>
        <?php if ($buyeraddressline2) { ?><?php echo $buyeraddressline2; ?><br><?php } ?>
        <?php if ($buyeraddressline3) { ?><?php echo $buyeraddressline3; ?><br><?php } ?>

        <?php echo $buyercounty.' '.$buyerpostcode.' '.$buyercity; ?><br>
    </p>

    <h1 style="margin: 0; padding: 0; margin-top: 50px">
        Invoice <?php echo $documentno; ?>
    </h1>

    <p style="margin: 0; padding: 0">
        Invoice Date <?php echo $documentdate?->format('d.m.Y') ?? 'Not given'; ?>
    </p>

    <p style="margin-top: 50px" class="bold">
        Dear customer,
    </p>

    <p>
        We take the liberty of invoicing you for the following items
    </p>

    <table class="postable">
        <thead>
            <tr>
                <th class="posno">Pos.</th>
                <th class="posdesc">Description</th>
                <th class="posqty">Qty</th>
                <th class="posunitprice">Price</th>
                <th class="poslineamount">Amount</th>
                <th class="poslinevat">VAT%</th>
            </tr>
        </thead>
        <tbody>
            <?php

    if ($document->firstDocumentPosition()) {
        $isfirstposition = true;
        do {
            $document->getDocumentCurrency($invoiceCurrency);
            $document->getDocumentPosition($newPositionId, $newParentPositionId, $newLineStatusCode, $newLineStatusReasonCode);
            $document->getDocumentPositionProductDetails($newProductId, $newProductName, $newProductDescription, $newProductSellerId, $newProductBuyerId, $newProductGlobalId, $newProductGlobalIdType, $newProductIndustryId, $newProductModelId, $newProductBatchId, $newProductBrandName, $newProductModelName, $newProductOriginTradeCountry);
            $document->getDocumentPositionGrossPrice($newGrossPrice, $newGrossPriceBasisQuantity, $newGrossPriceBasisQuantityUnit);
            $document->getDocumentPositionNetPrice($newNetPrice, $newNetPriceBasisQuantity, $newNetPriceBasisQuantityUnit);
            $document->getDocumentPositionSummation($newNetAmount, $newChargeTotalAmount, $newDiscountTotalAmount, $newTaxTotalAmount, $newGrossAmount);
            $document->getDocumentPositionQuantities($newQuantity, $newQuantityUnit, $newChargeFreeQuantity, $newChargeFreeQuantityUnit, $newPackageQuantity, $newPackageQuantityUnit, $newPerPackageUnitQuantity, $newPerPackageUnitQuantityUnit);
            ?>

            <?php if ($document->firstDocumentPositionNote()) { ?>
                <tr>
                    <td class="<?php echo $isfirstposition ? ' space' : ''; ?>">&nbsp;</td>
                    <td colspan="5" class="<?php echo $isfirstposition ? ' space' : ''; ?>">
                        <?php $document->getDocumentPositionNote($newContent, $newContentCode, $newSubjectCode); ?>
                        <?php echo $newContent; ?>
                        <?php $isfirstposition = false; ?>
                    </td>
                </tr>
            <?php } while ($document->nextDocumentPositionNote()); ?>

            <tr>
                <td class="posno<?php echo $isfirstposition ? ' space' : ''; ?>"><?php echo $newPositionId; ?></td>
                <td class="posdesc<?php echo $isfirstposition ? ' space' : ''; ?>"><?php echo $newProductName; ?></td>
                <td class="posqty<?php echo $isfirstposition ? ' space' : ''; ?>"><?php echo $newQuantity; ?> <?php echo $newQuantityUnit; ?></td>
                <td class="posunitprice<?php echo $isfirstposition ? ' space' : ''; ?>"><?php echo number_format($newNetPrice ?? 0 - 0, 2); ?> <?php echo $invoiceCurrency; ?></td>
                <td class="poslineamount<?php echo $isfirstposition ? ' space' : ''; ?>"><?php echo number_format($newNetAmount ?? 0.0, 2); ?> <?php echo $invoiceCurrency; ?></td>
                <?php if ($document->firstDocumentPositionTax()) { ?>
                    <?php $document->getDocumentPositionTax($newTaxCategory, $newTaxType, $newTaxAmount, $newTaxPercent, $newExemptionReason, $newExemptionReasonCode); ?>
                    <td class="poslinevat<?php echo $isfirstposition ? ' space' : ''; ?>"><?php echo number_format($newTaxPercent ?? 0.0, 2); ?> %</td>
                <?php } else { ?>
                    <td class="poslinevat<?php echo $isfirstposition ? ' space' : ''; ?>">&nbsp;</td>
                <?php } ?>
            </tr>

            <?php if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newProductDescription)) { ?>
                <tr>
                    <td class="<?php echo $isfirstposition ? ' space' : ''; ?>">&nbsp;</td>
                    <td colspan="5" class="<?php echo $isfirstposition ? ' space' : ''; ?>">
                        <?php echo $newProductDescription; ?>
                    </td>
                </tr>
            <?php } ?>

            <?php if ($document->firstDocumentPositionGrossPriceAllowanceCharge()) { ?>
                <?php do { ?>
                <?php $document->getDocumentPositionGrossPrice($newGrossPrice, $newGrossPriceBasisQuantity, $newGrossPriceBasisQuantityUnit); ?>
                <?php $document->getDocumentPositionGrossPriceAllowanceCharge($newGrossPriceAllowanceChargeAmount, $newIsCharge, $newGrossPriceAllowanceChargePercent, $newGrossPriceAllowanceChargeBasisAmount, $newGrossPriceAllowanceChargeReason, $newGrossPriceAllowanceChargeReasonCode); ?>
                <tr>
                    <td class="posno">&nbsp;</td>
                    <td class="posdesc bold italic"><?php echo '&nbsp;&nbsp;'.(InvoiceSuiteStringUtils::stringIsNullOrEmpty($newGrossPriceAllowanceChargeReason) ? ($newIsCharge ? ' (Charge)' : ' (Allowance)') : $newGrossPriceAllowanceChargeReason); ?></td>
                    <td class="posqty">&nbsp;</td>
                    <td class="posunitprice italic"><?php echo number_format($newGrossPriceAllowanceChargeAmount ?? 0.0, 2); ?> (<?php echo number_format($newGrossPrice ?? 0.0, 2); ?>) <?php echo $invoiceCurrency; ?></td>
                </tr>
                <?php } while ($document->nextDocumentPositionGrossPriceAllowanceCharge()); ?>
            <?php } ?>

            <?php
                $isfirstposition = false;
        } while ($document->nextDocumentPosition());
    }
?>

            <?php if ($document->firstDocumentAllowanceCharge()) { ?>
            <tr>
                <td colspan="6">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="3">&nbsp;</td>
                <td colspan="3" class="bold fs-11 space">Allowance/Charge</td>
            </tr>
            <?php $isFirstDocumentAllowanceCharge = true; ?>
            <?php do { ?>
            <?php $document->getDocumentAllowanceCharge($newChargeIndicator, $newAllowanceChargeAmount, $newAllowanceChargeBaseAmount, $newTaxCategory, $newTaxType, $newTaxPercent, $newAllowanceChargeReason, $newAllowanceChargeReasonCode, $newAllowanceChargePercent); ?>
            <tr>
            <td class="<?php echo $isFirstDocumentAllowanceCharge ? 'space' : ''; ?>" colspan="3">&nbsp;</td>
            <td class="<?php echo $isFirstDocumentAllowanceCharge ? 'space' : ''; ?> totalname"><?php echo $newAllowanceChargeReason ? $newAllowanceChargeReason : ($newChargeIndicator ? 'Charge' : 'Allowance'); ?></td>
            <td class="<?php echo $isFirstDocumentAllowanceCharge ? 'space' : ''; ?> totalvalue"><?php echo number_format($newAllowanceChargeBaseAmount ?? 0.0, 2); ?> <?php echo $invoiceCurrency; ?></td>
            <td class="<?php echo $isFirstDocumentAllowanceCharge ? 'space' : ''; ?> totalvalue bold"><?php echo number_format($newAllowanceChargeAmount ?? 0.0, 2); ?> <?php echo $invoiceCurrency; ?></td>
            </tr>
            <?php $isFirstDocumentAllowanceCharge = false; ?>
            <?php } while ($document->nextDocumentAllowanceCharge()); ?>
            <?php } ?>

            <?php if ($document->firstDocumentLogisticServiceCharge()) { ?>
            <tr>
                <td colspan="6">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="3">&nbsp;</td>
                <td colspan="3" class="bold fs-11 space">Logistic Service Charge</td>
            </tr>
            <?php $isFirstDocumentLogisticServiceCharge = true; ?>
            <?php do { ?>
            <?php $document->getDocumentLogisticServiceCharge($newChargeAmount, $newDescription, $newTaxCategory, $newTaxType, $newTaxPercent); ?>
            <tr>
            <td class="<?php echo $isFirstDocumentLogisticServiceCharge ? 'space' : ''; ?>" colspan="3">&nbsp;</td>
            <td class="<?php echo $isFirstDocumentLogisticServiceCharge ? 'space' : ''; ?> totalname"><?php echo $newDescription; ?></td>
            <td class="<?php echo $isFirstDocumentLogisticServiceCharge ? 'space' : ''; ?> totalvalue">&nbsp;</td>
            <td class="<?php echo $isFirstDocumentLogisticServiceCharge ? 'space' : ''; ?> totalvalue bold"><?php echo number_format($newChargeAmount ?? 0.0, 2); ?> <?php echo $invoiceCurrency; ?></td>
            </tr>
            <?php $isFirstDocumentLogisticServiceCharge = false; ?>
            <?php } while ($document->nextDocumentLogisticServiceCharge()); ?>
            <?php } ?>

            <?php $document->getDocumentSummation($newNetAmount, $newChargeTotalAmount, $newDiscountTotalAmount, $newTaxBasisAmount, $newTaxTotalAmount, $newTaxTotalAmount2, $newGrossAmount, $newDueAmount, $newPrepaidAmount, $newRoungingAmount); ?>

            <tr>
                <td colspan="6">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="3">&nbsp;</td>
                <td colspan="3" class="bold fs-11 space">Totals</td>
            </tr>
            <tr>
                <td class="space" colspan="3">&nbsp;</td>
                <td class="space totalname" colspan="2">Net Total</td>
                <td class="space totalvalue"><?php echo number_format($newNetAmount ?? 0.0, 2); ?> <?php echo $invoiceCurrency; ?></td>
            </tr>
            <?php if (0 != $newChargeTotalAmount) { ?>
            <tr>
                <td class="" colspan="3">&nbsp;</td>
                <td class="totalname" colspan="2">Charge Total</td>
                <td class="totalvalue"><?php echo number_format($newChargeTotalAmount ?? 0.0, 2); ?> <?php echo $invoiceCurrency; ?></td>
            </tr>
            <?php } ?>
            <?php if (0 != $newDiscountTotalAmount) { ?>
            <tr>
                <td class="" colspan="3">&nbsp;</td>
                <td class="totalname" colspan="2">Allowance Total</td>
                <td class="totalvalue"><?php echo number_format($newDiscountTotalAmount ?? 0.0, 2); ?> <?php echo $invoiceCurrency; ?></td>
            </tr>
            <?php } ?>
            <tr>
                <td class="" colspan="3">&nbsp;</td>
                <td class="totalname" colspan="2">Tax</td>
                <td class="totalvalue"><?php echo number_format($newTaxTotalAmount ?? 0.0, 2); ?> <?php echo $invoiceCurrency; ?></td>
            </tr>
            <tr>
                <td class="" colspan="3">&nbsp;</td>
                <td class="totalname bold" colspan="2">Gross Total</td>
                <td class="totalvalue bold"><?php echo number_format($newGrossAmount ?? 0.0, 2); ?> <?php echo $invoiceCurrency; ?></td>
            </tr>
            <tr>
                <td class="" colspan="3">&nbsp;</td>
                <td class="totalname bold" colspan="2">Already paid</td>
                <td class="totalvalue bold"><?php echo number_format($newPrepaidAmount ?? 0.0, 2); ?> <?php echo $invoiceCurrency; ?></td>
            </tr>
            <tr>
                <td class="" colspan="3">&nbsp;</td>
                <td class="totalname bold" colspan="2">Amount to pay</td>
                <td class="totalvalue bold"><?php echo number_format($newDueAmount ?? 0.0, 2); ?> <?php echo $invoiceCurrency; ?></td>
            </tr>

            <?php if ($document->firstDocumentTax()) { ?>
            <tr>
                <td colspan="6">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="3">&nbsp;</td>
                <td colspan="3" class="bold fs-11">VAT Breakdown</td>
            </tr>
            <?php $isfirsttax = true; ?>
            <?php $sumbasisamount = 0.0; ?>
            <?php do { ?>
            <?php $document->getDocumentTax($newTaxCategory, $newTaxType, $newBasisAmount, $newTaxAmount, $newTaxPercent, $newExemptionReason, $newExemptionReasonCode, $newTaxDueDate, $newTaxDueCode); ?>
            <tr>
                <td class="<?php echo $isfirsttax ? 'space' : ''; ?>" colspan="3">&nbsp;</td>
                <td class="totalname<?php echo $isfirsttax ? ' space' : ''; ?>"><?php echo number_format($newTaxPercent ?? 0.0, 2); ?>%</td>
                <td class="totalvalue<?php echo $isfirsttax ? ' space' : ''; ?>"><?php echo number_format($newBasisAmount ?? 0.0, 2); ?> <?php echo $invoiceCurrency; ?></td>
                <td class="totalvalue bold<?php echo $isfirsttax ? ' space' : ''; ?>"><?php echo number_format($newTaxAmount ?? 0.0, 2); ?> <?php echo $invoiceCurrency; ?></td>
            </tr>
            <?php $sumbasisamount = $sumbasisamount + $newBasisAmount; ?>
            <?php $isfirsttax = false; ?>
            <?php } while ($document->nextDocumentTax()); ?>
            <tr>
                <td class="" colspan="3">&nbsp;</td>
                <td class="totalname">Total</td>
                <td class="totalvalue"><?php echo number_format($sumbasisamount, 2); ?> <?php echo $invoiceCurrency; ?></td>
                <td class="totalvalue bold"><?php echo number_format($newTaxTotalAmount, 2); ?> <?php echo $invoiceCurrency; ?></td>
            </tr>
            <?php } ?>

            <?php if ($document->firstDocumentPaymentTerm()) { ?>
            <?php $isfirstpaymentterm = true; ?>
            <?php do { ?>
            <tr>
                <?php $document->getDocumentPaymentTerm($newDescription, $newDueDate, $newMandate); ?>
                <td colspan="6" class="<?php echo $isfirstpaymentterm ? 'space3' : ''; ?>">
                    <?php echo $newDescription; ?>
                </td>
            </tr>
            <?php $isfirstpaymentterm = false; ?>
            <?php } while ($document->nextDocumentPaymentTerm()); ?>
            <?php } ?>

        </tbody>
    </table>
</body>

</html>