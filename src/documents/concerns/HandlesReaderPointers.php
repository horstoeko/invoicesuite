<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\documents\concerns;

use horstoeko\invoicesuite\utils\InvoiceSuitePointerUtils;

/**
 * Trait representing methods for handling reader pointers
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
trait HandlesReaderPointers
{
    /**
     * Reset all document-level pointers
     *
     * @return void
     */
    protected function resetCurrentDocumentSubPointers(): void
    {
        InvoiceSuitePointerUtils::resetSingle('documentnote');
        InvoiceSuitePointerUtils::resetSingle('documentbillingperiod');
        InvoiceSuitePointerUtils::resetSingle('documentpostingreference');
        InvoiceSuitePointerUtils::resetSingle('documentsellerorderreference');
        InvoiceSuitePointerUtils::resetSingle('documentbuyerorderreference');
        InvoiceSuitePointerUtils::resetSingle('documentquotationreference');
        InvoiceSuitePointerUtils::resetSingle('documentcontractreference');
        InvoiceSuitePointerUtils::resetSingle('documentadditionalreference');
        InvoiceSuitePointerUtils::resetSingle('documentinvoicereference');
        InvoiceSuitePointerUtils::resetSingle('documentprojectreference');
        InvoiceSuitePointerUtils::resetSingle('documentultimatecustomerorderreference');
        InvoiceSuitePointerUtils::resetSingle('documentdespatchadvicereference');
        InvoiceSuitePointerUtils::resetSingle('documentreceivingadvicereference');
        InvoiceSuitePointerUtils::resetSingle('documentdeliverynotereference');
        InvoiceSuitePointerUtils::resetSingle('documentsellerid');
        InvoiceSuitePointerUtils::resetSingle('documentsellerglobalid');
        InvoiceSuitePointerUtils::resetSingle('documentsellertaxregistration');
        InvoiceSuitePointerUtils::resetSingle('documentselleraddress');
        InvoiceSuitePointerUtils::resetSingle('documentsellerlegalorganisation');
        InvoiceSuitePointerUtils::resetSingle('documentsellercontact');
        InvoiceSuitePointerUtils::resetSingle('documentsellerecommunication');
        InvoiceSuitePointerUtils::resetSingle('documentbuyerid');
        InvoiceSuitePointerUtils::resetSingle('documentbuyerglobalid');
        InvoiceSuitePointerUtils::resetSingle('documentbuyertaxregistration');
        InvoiceSuitePointerUtils::resetSingle('documentbuyeraddress');
        InvoiceSuitePointerUtils::resetSingle('documentbuyerlegalorganisation');
        InvoiceSuitePointerUtils::resetSingle('documentbuyercontact');
        InvoiceSuitePointerUtils::resetSingle('documentbuyerecommunication');
        InvoiceSuitePointerUtils::resetSingle('documentsellertaxrepresentativeid');
        InvoiceSuitePointerUtils::resetSingle('documentsellertaxrepresentativeglobalid');
        InvoiceSuitePointerUtils::resetSingle('documentsellertaxrepresentativetaxregistration');
        InvoiceSuitePointerUtils::resetSingle('documentsellertaxrepresentativeaddress');
        InvoiceSuitePointerUtils::resetSingle('documentsellertaxrepresentativelegalorganisation');
        InvoiceSuitePointerUtils::resetSingle('documentsellertaxrepresentativecontact');
        InvoiceSuitePointerUtils::resetSingle('documentsellertaxrepresentativeecommunication');
        InvoiceSuitePointerUtils::resetSingle('documentbuyertaxrepresentativeid');
        InvoiceSuitePointerUtils::resetSingle('documentbuyertaxrepresentativeglobalid');
        InvoiceSuitePointerUtils::resetSingle('documentbuyertaxrepresentativetaxregistration');
        InvoiceSuitePointerUtils::resetSingle('documentbuyertaxrepresentativeaddress');
        InvoiceSuitePointerUtils::resetSingle('documentbuyertaxrepresentativelegalorganisation');
        InvoiceSuitePointerUtils::resetSingle('documentbuyertaxrepresentativecontact');
        InvoiceSuitePointerUtils::resetSingle('documentbuyertaxrepresentativeecommunication');
        InvoiceSuitePointerUtils::resetSingle('documentsalesagentid');
        InvoiceSuitePointerUtils::resetSingle('documentsalesagentglobalid');
        InvoiceSuitePointerUtils::resetSingle('documentsalesagenttaxregistration');
        InvoiceSuitePointerUtils::resetSingle('documentsalesagentaddress');
        InvoiceSuitePointerUtils::resetSingle('documentsalesagentlegalorganisation');
        InvoiceSuitePointerUtils::resetSingle('documentsalesagentcontact');
        InvoiceSuitePointerUtils::resetSingle('documentsalesagentcommunication');
        InvoiceSuitePointerUtils::resetSingle('documentbuyeragentid');
        InvoiceSuitePointerUtils::resetSingle('documentbuyeragentglobalid');
        InvoiceSuitePointerUtils::resetSingle('documentbuyeragenttaxregistration');
        InvoiceSuitePointerUtils::resetSingle('documentbuyeragentaddress');
        InvoiceSuitePointerUtils::resetSingle('documentbuyeragentlegalorganisation');
        InvoiceSuitePointerUtils::resetSingle('documentbuyeragentcontact');
        InvoiceSuitePointerUtils::resetSingle('documentbuyeragentcommunication');
        InvoiceSuitePointerUtils::resetSingle('documentproductenduserid');
        InvoiceSuitePointerUtils::resetSingle('documentproductenduserglobalid');
        InvoiceSuitePointerUtils::resetSingle('documentproductendusertaxregistration');
        InvoiceSuitePointerUtils::resetSingle('documentproductenduseraddress');
        InvoiceSuitePointerUtils::resetSingle('documentproductenduserlegalorganisation');
        InvoiceSuitePointerUtils::resetSingle('documentproductendusercontact');
        InvoiceSuitePointerUtils::resetSingle('documentproductenduserecommunication');
        InvoiceSuitePointerUtils::resetSingle('documentshiptoid');
        InvoiceSuitePointerUtils::resetSingle('documentshiptoglobalid');
        InvoiceSuitePointerUtils::resetSingle('documentshiptotaxregistration');
        InvoiceSuitePointerUtils::resetSingle('documentshiptoaddress');
        InvoiceSuitePointerUtils::resetSingle('documentshiptolegalorganisation');
        InvoiceSuitePointerUtils::resetSingle('documentshiptocontact');
        InvoiceSuitePointerUtils::resetSingle('documentshiptoecommunication');
        InvoiceSuitePointerUtils::resetSingle('documentultimateshiptoid');
        InvoiceSuitePointerUtils::resetSingle('documentultimateshiptoglobalid');
        InvoiceSuitePointerUtils::resetSingle('documentultimateshiptotaxregistration');
        InvoiceSuitePointerUtils::resetSingle('documentultimateshiptoaddress');
        InvoiceSuitePointerUtils::resetSingle('documentultimateshiptolegalorganisation');
        InvoiceSuitePointerUtils::resetSingle('documentultimateshiptocontact');
        InvoiceSuitePointerUtils::resetSingle('documentultimateshiptoecommunication');
        InvoiceSuitePointerUtils::resetSingle('documentshipfromid');
        InvoiceSuitePointerUtils::resetSingle('documentshipfromglobalid');
        InvoiceSuitePointerUtils::resetSingle('documentshipfromtaxregistration');
        InvoiceSuitePointerUtils::resetSingle('documentshipfromaddress');
        InvoiceSuitePointerUtils::resetSingle('documentshipfromlegalorganisation');
        InvoiceSuitePointerUtils::resetSingle('documentshipfromcontact');
        InvoiceSuitePointerUtils::resetSingle('documentshipfromecommunication');
        InvoiceSuitePointerUtils::resetSingle('documentinvoicerid');
        InvoiceSuitePointerUtils::resetSingle('documentinvoicerglobalid');
        InvoiceSuitePointerUtils::resetSingle('documentinvoicertaxregistration');
        InvoiceSuitePointerUtils::resetSingle('documentinvoiceraddress');
        InvoiceSuitePointerUtils::resetSingle('documentinvoicerlegalorganisation');
        InvoiceSuitePointerUtils::resetSingle('documentinvoicercontact');
        InvoiceSuitePointerUtils::resetSingle('documentinvoicerecommunication');
        InvoiceSuitePointerUtils::resetSingle('documentinvoiceeid');
        InvoiceSuitePointerUtils::resetSingle('documentinvoiceeglobalid');
        InvoiceSuitePointerUtils::resetSingle('documentinvoiceetaxregistration');
        InvoiceSuitePointerUtils::resetSingle('documentinvoiceeaddress');
        InvoiceSuitePointerUtils::resetSingle('documentinvoiceelegalorganisation');
        InvoiceSuitePointerUtils::resetSingle('documentinvoiceecontact');
        InvoiceSuitePointerUtils::resetSingle('documentinvoiceeecommunication');
        InvoiceSuitePointerUtils::resetSingle('documentpayeeid');
        InvoiceSuitePointerUtils::resetSingle('documentpayeeglobalid');
        InvoiceSuitePointerUtils::resetSingle('documentpayeetaxregistration');
        InvoiceSuitePointerUtils::resetSingle('documentpayeeaddress');
        InvoiceSuitePointerUtils::resetSingle('documentpayeelegalorganisation');
        InvoiceSuitePointerUtils::resetSingle('documentpayeecontact');
        InvoiceSuitePointerUtils::resetSingle('documentpayeecommunication');
        InvoiceSuitePointerUtils::resetSingle('documentpayerid');
        InvoiceSuitePointerUtils::resetSingle('documentpayerglobalid');
        InvoiceSuitePointerUtils::resetSingle('documentpayertaxregistration');
        InvoiceSuitePointerUtils::resetSingle('documentpayeraddress');
        InvoiceSuitePointerUtils::resetSingle('documentpayerlegalorganisation');
        InvoiceSuitePointerUtils::resetSingle('documentpayercontact');
        InvoiceSuitePointerUtils::resetSingle('documentpayercommunication');
        InvoiceSuitePointerUtils::resetSingle('documentpaymentmean');
        InvoiceSuitePointerUtils::resetSingle('documentcreditorreference');
        InvoiceSuitePointerUtils::resetSingle('documentpaymentreference');
        InvoiceSuitePointerUtils::resetSingle('documentpaymentterm');
        InvoiceSuitePointerUtils::resetSingle('documentpaymenttermpaymentdiscount');
        InvoiceSuitePointerUtils::resetSingle('documentpaymenttermpaymentpenalty');
        InvoiceSuitePointerUtils::resetSingle('documenttax');
        InvoiceSuitePointerUtils::resetSingle('documentallowancecharge');
        InvoiceSuitePointerUtils::resetSingle('documentlogservicecharge');
        InvoiceSuitePointerUtils::resetSingle('documentposition');

        $this->resetCurrentDocumentPositionSubPointers();
    }

    /**
     * Reset all document-position-level pointers
     *
     * @return void
     */
    protected function resetCurrentDocumentPositionSubPointers(): void
    {
        InvoiceSuitePointerUtils::resetSingle('documentpositionnote');
        InvoiceSuitePointerUtils::resetSingle('documentpositionproductcharacteristic');
        InvoiceSuitePointerUtils::resetSingle('documentpositionproductclassification');
        InvoiceSuitePointerUtils::resetSingle('documentpositionproductreferencedproduct');
        InvoiceSuitePointerUtils::resetSingle('documentpositionsellerorderreference');
        InvoiceSuitePointerUtils::resetSingle('documentpositionbuyerorderreference');
        InvoiceSuitePointerUtils::resetSingle('documentpositionquotationreference');
        InvoiceSuitePointerUtils::resetSingle('documentpositioncontractreference');
        InvoiceSuitePointerUtils::resetSingle('documentpositionadditionalreference');
        InvoiceSuitePointerUtils::resetSingle('documentpositionultimatecustomerorderreference');
        InvoiceSuitePointerUtils::resetSingle('documentpositiondespatchadvicereference');
        InvoiceSuitePointerUtils::resetSingle('documentpositionreceivingadvicereference');
        InvoiceSuitePointerUtils::resetSingle('documentpositiondeliverynotereference');
        InvoiceSuitePointerUtils::resetSingle('documentpositioninvoicereference');
        InvoiceSuitePointerUtils::resetSingle('documentpositionadditionalobjectreference');
        InvoiceSuitePointerUtils::resetSingle('documentpositiongrosspriceallowancecharge');
        InvoiceSuitePointerUtils::resetSingle('documentpositionshiptoid');
        InvoiceSuitePointerUtils::resetSingle('documentpositionshiptoglobalid');
        InvoiceSuitePointerUtils::resetSingle('documentpositionshiptotaxregistration');
        InvoiceSuitePointerUtils::resetSingle('documentpositionshiptoaddress');
        InvoiceSuitePointerUtils::resetSingle('documentpositionshiptolegalorganisation');
        InvoiceSuitePointerUtils::resetSingle('documentpositionshiptocontact');
        InvoiceSuitePointerUtils::resetSingle('documentpositionshiptoecommunication');
        InvoiceSuitePointerUtils::resetSingle('documentpositionultimateshiptoid');
        InvoiceSuitePointerUtils::resetSingle('documentpositionultimateshiptoglobalid');
        InvoiceSuitePointerUtils::resetSingle('documentpositionultimateshiptotaxregistration');
        InvoiceSuitePointerUtils::resetSingle('documentpositionultimateshiptoaddress');
        InvoiceSuitePointerUtils::resetSingle('documentpositionultimateshiptolegalorganisation');
        InvoiceSuitePointerUtils::resetSingle('documentpositionultimateshiptocontact');
        InvoiceSuitePointerUtils::resetSingle('documentpositionultimateshiptoecommunication');
        InvoiceSuitePointerUtils::resetSingle('documentpositionbillingperiod');
        InvoiceSuitePointerUtils::resetSingle('documentpositiontax');
        InvoiceSuitePointerUtils::resetSingle('documentpositionallowancecharge');
        InvoiceSuitePointerUtils::resetSingle('documentpositionpostingreference');
    }
}
