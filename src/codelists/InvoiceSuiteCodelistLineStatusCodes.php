<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\codelists;

/**
 * Enum representing list of codes specifying an action request/notification
 * Name of list: UNTDID 1229 Action request/notification description code
 *
 * @category InvoiceSuite
 * @author   HorstOeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 * @see      https://service.unece.org/trade/untdid/d05a/tred/tred1229.htm
 */
enum InvoiceSuiteCodelistLineStatusCodes: string
{
    /**
     * Added (1)
     *
     * The information is to be or has been added.
     */
    case ADDED = '1';

    /**
     * Not found (10)
     *
     * This line item is not found in the referenced message.
     */
    case NOT_FOUND = '10';

    /**
     * Final response (100)
     *
     * The response is an final one.
     */
    case FINAL_RESPON = '100';

    /**
     * Debit advice requested (101)
     *
     * A debit advice is requested for the transaction.
     */
    case DEBIT_ADVICE_REQUES = '101';

    /**
     * Transaction not impacted (102)
     *
     * Advice that the transaction is not impacted.
     */
    case TRANSA_NOT_IMPACT = '102';

    /**
     * Patient to be notified (103)
     *
     * The action to take is to notify the patient.
     */
    case PATIEN_TO_BE_NOTIFI = '103';

    /**
     * Healthcare provider to be notified (104)
     *
     * The action to take is to notify the healthcare provider.
     */
    case HEALTH_PROVID_TO_BE_NOTIFI = '104';

    /**
     * Usual general practitioner to be notified (105)
     *
     * The action to take is to notify the usual general practitioner.
     */
    case USUAL_GENERA_PRACTI_TO_BE_NOTIFI = '105';

    /**
     * Advice without details (106)
     *
     * An advice without details is requested or notified.
     */
    case ADVICE_WITHOU_DETAIL = '106';

    /**
     * Advice with details (107)
     *
     * An advice with details is requested or notified.
     */
    case ADVICE_WITH_DETAIL = '107';

    /**
     * Amendment requested (108)
     *
     * An amendment is requested.
     */
    case AMENDM_REQUES = '108';

    /**
     * For information (109)
     *
     * Included for information only.
     */
    case FOR_INFORM = '109';

    /**
     * Not amended (11)
     *
     * This line is not amended by the buyer.
     */
    case NOT_AMENDE = '11';

    /**
     * Withdraw (110)
     *
     * A code indicating discontinuance or retraction.
     */
    case WITHDRAW = '110';

    /**
     * Delivery date change (111)
     *
     * The action / notiification is a change of the delivery date.
     */
    case DELIVE_DATE_CHANGE = '111';

    /**
     * Quantity change (112)
     *
     * The action / notification is a change of quantity.
     */
    case QUANTI_CHANGE = '112';

    /**
     * Line item numbers changed (12)
     *
     * Code specifying that the line item numbers have changed.
     */
    case LINE_ITEM_NUMBER_CHANGE = '12';

    /**
     * Buyer has deducted amount (13)
     *
     * Buyer has deducted amount from payment.
     */
    case BUYER_HAS_DEDUCT_AMOUNT = '13';

    /**
     * Buyer claims against invoice (14)
     *
     * Buyer has a claim against an outstanding invoice.
     */
    case BUYER_CLAIMS_AGAINS_INVOIC = '14';

    /**
     * Charge back by seller (15)
     *
     * Factor has been requested to charge back the outstanding item.
     */
    case CHARGE_BACK_BY_SELLER = '15';

    /**
     * Seller will issue credit note (16)
     *
     * Seller agrees to issue a credit note.
     */
    case SELLER_WILL_ISSUE_CREDIT_NOTE = '16';

    /**
     * Terms changed for new terms (17)
     *
     * New settlement terms have been agreed.
     */
    case TERMS_CHANGE_FOR_NEW_TERMS = '17';

    /**
     * Abide outcome of negotiations (18)
     *
     * Factor agrees to abide by the outcome of negotiations between seller and
     * buyer.
     */
    case ABIDE_OUTCOM_OF_NEGOTI = '18';

    /**
     * Seller rejects dispute (19)
     *
     * Seller does not accept validity of dispute.
     */
    case SELLER_REJECT_DISPUT = '19';

    /**
     * Deleted (2)
     *
     * The information is to be or has been deleted.
     */
    case DELETED = '2';

    /**
     * Settlement (20)
     *
     * The reported situation is settled.
     */
    case SETTLEMENT = '20';

    /**
     * No delivery (21)
     *
     * Code indicating that no delivery will be required.
     */
    case NO_DELIVE = '21';

    /**
     * Call-off delivery (22)
     *
     * A request for delivery of a particular quantity of goods to be delivered on
     * a particular date (or within a particular period).
     */
    case CALLOF_DELIVE = '22';

    /**
     * Proposed amendment (23)
     *
     * A code used to indicate an amendment suggested by the sender.
     */
    case PROPOS_AMENDM = '23';

    /**
     * Accepted with amendment, no confirmation required (24)
     *
     * Accepted with changes which require no confirmation.
     */
    case ACCEPT_WITH_AMENDM_NO_CONFIR_REQUIR = '24';

    /**
     * Equipment provisionally repaired (25)
     *
     * The equipment or component has been provisionally repaired.
     */
    case EQUIPM_PROVIS_REPAIR = '25';

    /**
     * Included (26)
     *
     * Code indicating that the entity is included.
     */
    case INCLUDED = '26';

    /**
     * Upon receipt and verification of documents we shall cover you when due as
     * per your instructions (27)
     *
     * Upon receipt and verification of documents we shall cover you when due as
     * per your instructions.
     */
    case UPON_RECEIP_AND_VERIFI_OF_DOCUME_WE_SHALL_COVER_YOU_WHEN_DUE_AS_PER_YOUR_INSTRU = '27';

    /**
     * Upon receipt and verification of documents we shall authorize you to debit
     * our account with you when due (28)
     *
     * Upon receipt and verification of documents we shall authorize you to debit
     * our account with you when due
     */
    case UPON_RECEIP_AND_VERIFI_OF_DOCUME_WE_SHALL_AUTHOR_YOU_TO_DEBIT_OUR_ACCOUN_WITH_YOU_WHEN_DUE = '28';

    /**
     * On receipt of your authenticated advice we shall cover you when due as per
     * your instructions (29)
     *
     * On receipt of your authenticated advice we shall cover you when due as per
     * your instructions
     */
    case ON_RECEIP_OF_YOUR_AUTHEN_ADVICE_WE_SHALL_COVER_YOU_WHEN_DUE_AS_PER_YOUR_INSTRU = '29';

    /**
     * Changed (3)
     *
     * The information is to be or has been changed.
     */
    case CHANGED = '3';

    /**
     * On receipt of your authenticated advice we shall authorize you to debit our
     * account with you when due (30)
     *
     * On receipt of your authenticated advice we shall authorize you to debit our
     * account with you when due
     */
    case ON_RECEIP_OF_YOUR_AUTHEN_ADVICE_WE_SHALL_AUTHOR_YOU_TO_DEBIT_OUR_ACCOUN_WITH_YOU_WHEN_DUE = '30';

    /**
     * On receipt of your authenticated advice we shall credit your account with
     * us when due (31)
     *
     * On receipt of your authenticated advice we shall credit your account with
     * us when due
     */
    case ON_RECEIP_OF_YOUR_AUTHEN_ADVICE_WE_SHALL_CREDIT_YOUR_ACCOUN_WITH_US_WHEN_DUE = '31';

    /**
     * Credit advice requested for direct debit (32)
     *
     * A credit advice is requested for the direct debit.
     */
    case CREDIT_ADVICE_REQUES_FOR_DIRECT_DEBIT = '32';

    /**
     * Credit advice and acknowledgement for direct debit (33)
     *
     * A credit advice and acknowledgement are requested for the direct debit.
     */
    case CREDIT_ADVICE_AND_ACKNOW_FOR_DIRECT_DEBIT = '33';

    /**
     * Inquiry (34)
     *
     * Request for information.
     */
    case INQUIRY = '34';

    /**
     * Checked (35)
     *
     * Checked.
     */
    case CHECKED = '35';

    /**
     * Not checked (36)
     *
     * Not checked.
     */
    case NOT_CHECKE = '36';

    /**
     * Cancelled (37)
     *
     * Discontinued.
     */
    case CANCELLED = '37';

    /**
     * Replaced (38)
     *
     * Provide a replacement.
     */
    case REPLACED = '38';

    /**
     * New (39)
     *
     * Not existing before.
     */
    case NEW = '39';

    /**
     * No action (4)
     *
     * This line item is not affected by the actual message.
     */
    case NO_ACTION = '4';

    /**
     * Agreed (40)
     *
     * Consent.
     */
    case AGREED = '40';

    /**
     * Proposed (41)
     *
     * Put forward for consideration.
     */
    case PROPOSED = '41';

    /**
     * Already delivered (42)
     *
     * Delivery has taken place.
     */
    case ALREAD_DELIVE = '42';

    /**
     * Additional subordinate structures will follow (43)
     *
     * Additional subordinate structures will follow the current hierarchy level.
     */
    case ADDITI_SUBORD_STRUCT_WILL_FOLLOW = '43';

    /**
     * Additional subordinate structures will not follow (44)
     *
     * No additional subordinate structures will follow the current hierarchy
     * level.
     */
    case ADDITI_SUBORD_STRUCT_WILL_NOT_FOLLOW = '44';

    /**
     * Result opposed (45)
     *
     * A notification that the result is opposed.
     */
    case RESULT_OPPOSE = '45';

    /**
     * Auction held (46)
     *
     * A notification that an auction was held.
     */
    case AUCTIO_HELD = '46';

    /**
     * Legal action pursued (47)
     *
     * A notification that legal action has been pursued.
     */
    case LEGAL_ACTION_PURSUE = '47';

    /**
     * Meeting held (48)
     *
     * A notification that a meeting was held.
     */
    case MEETIN_HELD = '48';

    /**
     * Result set aside (49)
     *
     * A notification that the result has been set aside.
     */
    case RESULT_SET_ASIDE = '49';

    /**
     * Accepted without amendment (5)
     *
     * This line item is entirely accepted by the seller.
     */
    case ACCEPT_WITHOU_AMENDM = '5';

    /**
     * Result disputed (50)
     *
     * A notification that the result has been disputed.
     */
    case RESULT_DISPUT = '50';

    /**
     * Countersued (51)
     *
     * A notification that a countersuit has been filed.
     */
    case COUNTERSUED = '51';

    /**
     * Pending (52)
     *
     * A notification that an action is awaiting settlement.
     */
    case PENDING = '52';

    /**
     * Court action dismissed (53)
     *
     * A notification that a court action will no longer be heard.
     */
    case COURT_ACTION_DISMIS = '53';

    /**
     * Referred item, accepted (54)
     *
     * The item being referred to has been accepted.
     */
    case REFERR_ITEM_ACCEPT = '54';

    /**
     * Referred item, rejected (55)
     *
     * The item being referred to has been rejected.
     */
    case REFERR_ITEM_REJECT = '55';

    /**
     * Debit advice statement line (56)
     *
     * Notification that the statement line is a debit advice.
     */
    case DEBIT_ADVICE_STATEM_LINE = '56';

    /**
     * Credit advice statement line (57)
     *
     * Notification that the statement line is a credit advice.
     */
    case CREDIT_ADVICE_STATEM_LINE = '57';

    /**
     * Grouped credit advices (58)
     *
     * Notification that the credit advices are grouped.
     */
    case GROUPE_CREDIT_ADVICE = '58';

    /**
     * Grouped debit advices (59)
     *
     * Notification that the debit advices are grouped.
     */
    case GROUPE_DEBIT_ADVICE = '59';

    /**
     * Accepted with amendment (6)
     *
     * This line item is accepted but amended by the seller.
     */
    case ACCEPT_WITH_AMENDM = '6';

    /**
     * Registered (60)
     *
     * The name is registered.
     */
    case REGISTERED = '60';

    /**
     * Payment denied (61)
     *
     * The payment has been denied.
     */
    case PAYMEN_DENIED = '61';

    /**
     * Approved as amended (62)
     *
     * Approved with modifications.
     */
    case APPROV_AS_AMENDE = '62';

    /**
     * Approved as submitted (63)
     *
     * The request has been approved as submitted.
     */
    case APPROV_AS_SUBMIT = '63';

    /**
     * Cancelled, no activity (64)
     *
     * Cancelled due to the lack of activity.
     */
    case CANCEL_NO_ACTIVI = '64';

    /**
     * Under investigation (65)
     *
     * Investigation is being done.
     */
    case UNDER_INVEST = '65';

    /**
     * Initial claim received (66)
     *
     * Notification that the initial claim was received.
     */
    case INITIA_CLAIM_RECEIV = '66';

    /**
     * Not in process (67)
     *
     * Not in process.
     */
    case NOT_IN_PROCES = '67';

    /**
     * Rejected, duplicate (68)
     *
     * Rejected because it is a duplicate.
     */
    case REJECT_DUPLIC = '68';

    /**
     * Rejected, resubmit with corrections (69)
     *
     * Rejected but may be resubmitted when corrected.
     */
    case REJECT_RESUBM_WITH_CORREC = '69';

    /**
     * Not accepted (7)
     *
     * This line item is not accepted by the seller.
     */
    case NOT_ACCEPT = '7';

    /**
     * Pending, incomplete (70)
     *
     * Pending because of incomplete information.
     */
    case PENDIN_INCOMP = '70';

    /**
     * Under field office investigation (71)
     *
     * Investigation by the field is being done.
     */
    case UNDER_FIELD_OFFICE_INVEST = '71';

    /**
     * Pending, awaiting additional material (72)
     *
     * Pending awaiting receipt of additional material.
     */
    case PENDIN_AWAITI_ADDITI_MATERI = '72';

    /**
     * Pending, awaiting review (73)
     *
     * Pending while awaiting review.
     */
    case PENDIN_AWAITI_REVIEW = '73';

    /**
     * Reopened (74)
     *
     * Opened again.
     */
    case REOPENED = '74';

    /**
     * Processed by primary, forwarded to additional payer(s) (75)
     *
     * This request has been processed by the primary payer and sent to additional
     * payer(s).
     */
    case PROCES_BY_PRIMAR_FORWAR_TO_ADDITI_PAYERS = '75';

    /**
     * Processed by secondary, forwarded to additional payer(s) (76)
     *
     * This request has been processed by the secondary payer and sent to
     * additional payer(s).
     */
    case PROCES_BY_SECOND_FORWAR_TO_ADDITI_PAYERS = '76';

    /**
     * Processed by tertiary, forwarded to additional payer(s) (77)
     *
     * This request has been processed by the tertiary payer and sent to
     * additional payer(s).
     */
    case PROCES_BY_TERTIA_FORWAR_TO_ADDITI_PAYERS = '77';

    /**
     * Previous payment decision reversed (78)
     *
     * A previous payment decision has been reversed.
     */
    case PREVIO_PAYMEN_DECISI_REVERS = '78';

    /**
     * Not our claim, forwarded to another payer(s) (79)
     *
     * A request does not belong to this payer but has been forwarded to another
     * payer(s).
     */
    case NOT_OUR_CLAIM_FORWAR_TO_ANOTHE_PAYERS = '79';

    /**
     * Schedule only (8)
     *
     * Code specifying that the message is a schedule only.
     */
    case SCHEDU_ONLY = '8';

    /**
     * Transferred to correct insurance carrier (80)
     *
     * The request has been transferred to the correct insurance carrier for
     * processing.
     */
    case TRANSF_TO_CORREC_INSURA_CARRIE = '80';

    /**
     * Not paid, predetermination pricing only (81)
     *
     * Payment has not been made and the enclosed response is predetermination
     * pricing only.
     */
    case NOT_PAID_PREDET_PRICIN_ONLY = '81';

    /**
     * Documentation claim (82)
     *
     * The claim is for documentation purposes only, no payment
     */
    case DOCUME_CLAIM = '82';

    /**
     * Reviewed (83)
     *
     * Assessed.
     */
    case REVIEWED = '83';

    /**
     * Repriced (84)
     *
     * This price was changed.
     */
    case REPRICED = '84';

    /**
     * Audited (85)
     *
     * An official examination has occurred.
     */
    case AUDITED = '85';

    /**
     * Conditionally paid (86)
     *
     * Payment has been conditionally made.
     */
    case CONDIT_PAID = '86';

    /**
     * On appeal (87)
     *
     * Reconsideration of the decision has been applied for.
     */
    case ON_APPEAL = '87';

    /**
     * Closed (88)
     *
     * Shut.
     */
    case CLOSED = '88';

    /**
     * Reaudited (89)
     *
     * A subsequent official examination has occurred.
     */
    case REAUDITED = '89';

    /**
     * Amendments (9)
     *
     * Code specifying that amendments are requested/notified.
     */
    case AMENDMENTS = '9';

    /**
     * Reissued (90)
     *
     * Issued again.
     */
    case REISSUED = '90';

    /**
     * Closed after reopening (91)
     *
     * Reopened and then closed.
     */
    case CLOSED_AFTER_REOPEN = '91';

    /**
     * Redetermined (92)
     *
     * Determined again or differently.
     */
    case REDETERMINED = '92';

    /**
     * Processed as primary (93)
     *
     * Processed as the first.
     */
    case PROCES_AS_PRIMAR = '93';

    /**
     * Processed as secondary (94)
     *
     * Processed as the second.
     */
    case PROCES_AS_SECOND = '94';

    /**
     * Processed as tertiary (95)
     *
     * Processed as the third.
     */
    case PROCES_AS_TERTIA = '95';

    /**
     * Correction of error (96)
     *
     * A correction to information previously communicated which contained an
     * error.
     */
    case CORREC_OF_ERROR = '96';

    /**
     * Single credit item of a group (97)
     *
     * Notification that the credit item is a single credit item of a group of
     * credit items.
     */
    case SINGLE_CREDIT_ITEM_OF_A_GROUP = '97';

    /**
     * Single debit item of a group (98)
     *
     * Notification that the debit item is a single debit item of a group of debit
     * items.
     */
    case SINGLE_DEBIT_ITEM_OF_A_GROUP = '98';

    /**
     * Interim response (99)
     *
     * The response is an interim one.
     */
    case INTERI_RESPON = '99';
}
