<?php

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\codelists;

/**
 * Class representing list of payment means codes
 * Name of list: UNTDID 4461 Payment means code
 *
 * @category InvoiceSuite
 * @author   HorstOeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 * @see      https://www.xrepository.de/details/urn:xoev-de:xrechnung:codeliste:untdid.4461
 * @see      https://www.xrepository.de/api/xrepository/urn:xoev-de:xrechnung:codeliste:untdid.4461_3/download/UNTDID_4461_3.json
 */
enum InvoiceSuiteCodelistPaymentMeans: string
{
    /**
     * Instrument not defined (1)
     *
     * Not defined legally enforceable agreement between two or more parties
     * (expressing a contractual right or a right to the payment of money).
     */
    case UNTDID_4461_1 = '1';

    /**
     * In cash (10)
     *
     * Payment by currency (including bills and coins) in circulation, including
     * checking account deposits.
     */
    case UNTDID_4461_10 = '10';

    /**
     * ACH savings credit reversal (11)
     *
     * A request to reverse an ACH credit transaction to a savings account.
     */
    case UNTDID_4461_11 = '11';

    /**
     * ACH savings debit reversal (12)
     *
     * A request to reverse an ACH debit transaction to a savings account.
     */
    case UNTDID_4461_12 = '12';

    /**
     * ACH savings credit (13)
     *
     * A credit transaction made through the ACH system to a savings account.
     */
    case UNTDID_4461_13 = '13';

    /**
     * ACH savings debit (14)
     *
     * A debit transaction made through the ACH system to a savings account.
     */
    case UNTDID_4461_14 = '14';

    /**
     * Bookentry credit (15)
     *
     * A credit entry between two accounts at the same bank branch. Synonym: house
     * credit.
     */
    case UNTDID_4461_15 = '15';

    /**
     * Bookentry debit (16)
     *
     * A debit entry between two accounts at the same bank branch. Synonym: house
     * debit.
     */
    case UNTDID_4461_16 = '16';

    /**
     * ACH demand cash concentration/disbursement (CCD) credit (17)
     *
     * A credit transaction made through the ACH system to a demand deposit
     * account using the CCD payment format.
     */
    case UNTDID_4461_17 = '17';

    /**
     * ACH demand cash concentration/disbursement (CCD) debit (18)
     *
     * A debit transaction made through the ACH system to a demand deposit account
     * using the CCD payment format.
     */
    case UNTDID_4461_18 = '18';

    /**
     * ACH demand corporate trade payment (CTP) credit (19)
     *
     * A credit transaction made through the ACH system to a demand deposit
     * account using the CTP payment format.
     */
    case UNTDID_4461_19 = '19';

    /**
     * Automated clearing house credit (2)
     *
     * A credit transaction made through the automated clearing house system.
     */
    case UNTDID_4461_2 = '2';

    /**
     * Cheque (20)
     *
     * Payment by a pre-printed form on which instructions are given to an account
     * holder (a bank or building society) to pay a stated sum to a named
     * recipient.
     */
    case UNTDID_4461_20 = '20';

    /**
     * Banker's draft (21)
     *
     * Issue of a banker's draft in payment of the funds.
     */
    case UNTDID_4461_21 = '21';

    /**
     * Certified banker's draft (22)
     *
     * Cheque drawn by a bank on itself or its agent. A person who owes money to
     * another buys the draft from a bank for cash and hands it to the creditor
     * who need have no fear that it might be dishonoured.
     */
    case UNTDID_4461_22 = '22';

    /**
     * Bank cheque (issued by a banking or similar establishment) (23)
     *
     * Payment by a pre-printed form, which has been completed by a financial
     * institution, on which instructions are given to an account holder (a bank
     * or building society) to pay a stated sum to a named recipient.
     */
    case UNTDID_4461_23 = '23';

    /**
     * Bill of exchange awaiting acceptance (24)
     *
     * Bill drawn by the creditor on the debtor but not yet accepted by the
     * debtor.
     */
    case UNTDID_4461_24 = '24';

    /**
     * Certified cheque (25)
     *
     * Payment by a pre-printed form stamped with the paying bank's certification
     * on which instructions are given to an account holder (a bank or building
     * society) to pay a stated sum to a named recipient .
     */
    case UNTDID_4461_25 = '25';

    /**
     * Local cheque (26)
     *
     * Indicates that the cheque is given local to the recipient.
     */
    case UNTDID_4461_26 = '26';

    /**
     * ACH demand corporate trade payment (CTP) debit (27)
     *
     * A debit transaction made through the ACH system to a demand deposit account
     * using the CTP payment format.
     */
    case UNTDID_4461_27 = '27';

    /**
     * ACH demand corporate trade exchange (CTX) credit (28)
     *
     * A credit transaction made through the ACH system to a demand deposit
     * account using the CTX payment format.
     */
    case UNTDID_4461_28 = '28';

    /**
     * ACH demand corporate trade exchange (CTX) debit (29)
     *
     * A debit transaction made through the ACH system to a demand account using
     * the CTX payment format.
     */
    case UNTDID_4461_29 = '29';

    /**
     * Automated clearing house debit (3)
     *
     * A debit transaction made through the automated clearing house system.
     */
    case UNTDID_4461_3 = '3';

    /**
     * Credit transfer (30)
     *
     * Payment by credit movement of funds from one account to another.
     */
    case UNTDID_4461_30 = '30';

    /**
     * Debit transfer (31)
     *
     * Payment by debit movement of funds from one account to another.
     */
    case UNTDID_4461_31 = '31';

    /**
     * ACH demand cash concentration/disbursement plus (CCD+) credit (32)
     *
     * A credit transaction made through the ACH system to a demand deposit
     * account using the CCD+ payment format.
     */
    case UNTDID_4461_32 = '32';

    /**
     * ACH demand cash concentration/disbursement plus (CCD+) debit (33)
     *
     * A debit transaction made through the ACH system to a demand deposit account
     * using the CCD+ payment format.
     */
    case UNTDID_4461_33 = '33';

    /**
     * ACH prearranged payment and deposit (PPD) (34)
     *
     * A consumer credit transaction made through the ACH system to a demand
     * deposit or savings account.
     */
    case UNTDID_4461_34 = '34';

    /**
     * ACH savings cash concentration/disbursement (CCD) credit (35)
     *
     * A credit transaction made through the ACH system to a demand deposit or
     * savings account.
     */
    case UNTDID_4461_35 = '35';

    /**
     * ACH savings cash concentration/disbursement (CCD) debit (36)
     *
     * A debit transaction made through the ACH system to a savings account using
     * the CCD payment format.
     */
    case UNTDID_4461_36 = '36';

    /**
     * ACH savings corporate trade payment (CTP) credit (37)
     *
     * A credit transaction made through the ACH system to a savings account using
     * the CTP payment format.
     */
    case UNTDID_4461_37 = '37';

    /**
     * ACH savings corporate trade payment (CTP) debit (38)
     *
     * A debit transaction made through the ACH system to a savings account using
     * the CTP payment format.
     */
    case UNTDID_4461_38 = '38';

    /**
     * ACH savings corporate trade exchange (CTX) credit (39)
     *
     * A credit transaction made through the ACH system to a savings account using
     * the CTX payment format.
     */
    case UNTDID_4461_39 = '39';

    /**
     * ACH demand debit reversal (4)
     *
     * A request to reverse an ACH debit transaction to a demand deposit account.
     */
    case UNTDID_4461_4 = '4';

    /**
     * ACH savings corporate trade exchange (CTX) debit (40)
     *
     * A debit transaction made through the ACH system to a savings account using
     * the CTX payment format.
     */
    case UNTDID_4461_40 = '40';

    /**
     * ACH savings cash concentration/disbursement plus (CCD+) credit (41)
     *
     * A credit transaction made through the ACH system to a savings account using
     * the CCD+ payment format.
     */
    case UNTDID_4461_41 = '41';

    /**
     * Payment to bank account (42)
     *
     * Payment by an arrangement for settling debts that is operated by the Post
     * Office.
     */
    case UNTDID_4461_42 = '42';

    /**
     * ACH savings cash concentration/disbursement plus (CCD+) debit (43)
     *
     * A debit transaction made through the ACH system to a savings account using
     * the CCD+ payment format.
     */
    case UNTDID_4461_43 = '43';

    /**
     * Accepted bill of exchange (44)
     *
     * Bill drawn by the creditor on the debtor and accepted by the debtor.
     */
    case UNTDID_4461_44 = '44';

    /**
     * Referenced home-banking credit transfer (45)
     *
     * A referenced credit transfer initiated through home-banking.
     */
    case UNTDID_4461_45 = '45';

    /**
     * Interbank debit transfer (46)
     *
     * A debit transfer via interbank means.
     */
    case UNTDID_4461_46 = '46';

    /**
     * Home-banking debit transfer (47)
     *
     * A debit transfer initiated through home-banking.
     */
    case UNTDID_4461_47 = '47';

    /**
     * Bank card (48)
     *
     * Payment by means of a card issued by a bank or other financial institution.
     */
    case UNTDID_4461_48 = '48';

    /**
     * Direct debit (49)
     *
     * The amount is to be, or has been, directly debited to the customer's bank
     * account.
     */
    case UNTDID_4461_49 = '49';

    /**
     * ACH demand credit reversal (5)
     *
     * A request to reverse a credit transaction to a demand deposit account.
     */
    case UNTDID_4461_5 = '5';

    /**
     * Payment by postgiro (50)
     *
     * A method for the transmission of funds through the postal system rather
     * than through the banking system.
     */
    case UNTDID_4461_50 = '50';

    /**
     * FR, norme 6 97-Telereglement CFONB (French Organisation for Banking
     * Standards) - Option A (51)
     *
     * A French standard procedure that allows a debtor to pay an amount due to a
     * creditor. The creditor will forward it to its bank, which will collect the
     * money on the bank account of the debtor.
     */
    case UNTDID_4461_51 = '51';

    /**
     * Urgent commercial payment (52)
     *
     * Payment order which requires guaranteed processing by the most appropriate
     * means to ensure it occurs on the requested execution date, provided that it
     * is issued to the ordered bank before the agreed cut-off time.
     */
    case UNTDID_4461_52 = '52';

    /**
     * Urgent Treasury Payment (53)
     *
     * Payment order or transfer which must be executed, by the most appropriate
     * means, as urgently as possible and before urgent commercial payments.
     */
    case UNTDID_4461_53 = '53';

    /**
     * Credit card (54)
     *
     * Payment made by means of credit card.
     */
    case UNTDID_4461_54 = '54';

    /**
     * Debit card (55)
     *
     * Payment made by means of debit card.
     */
    case UNTDID_4461_55 = '55';

    /**
     * Bankgiro (56)
     *
     * Payment will be, or has been, made by bankgiro.
     */
    case UNTDID_4461_56 = '56';

    /**
     * Standing agreement (57)
     *
     * The payment means have been previously agreed between seller and buyer and
     * thus are not stated again.
     */
    case UNTDID_4461_57 = '57';

    /**
     * SEPA credit transfer (58)
     *
     * Credit transfer inside the Single Euro Payment Area (SEPA) system.
     */
    case UNTDID_4461_58 = '58';

    /**
     * SEPA direct debit (59)
     *
     * Direct debit inside the Single Euro Payment Area (SEPA) system.
     */
    case UNTDID_4461_59 = '59';

    /**
     * ACH demand credit (6)
     *
     * A credit transaction made through the ACH system to a demand deposit
     * account.
     */
    case UNTDID_4461_6 = '6';

    /**
     * Promissory note (60)
     *
     * Payment by an unconditional promise in writing made by one person to
     * another, signed by the maker, engaging to pay on demand or at a fixed or
     * determinable future time a sum certain in money, to order or to bearer.
     */
    case UNTDID_4461_60 = '60';

    /**
     * Promissory note signed by the debtor (61)
     *
     * Payment by an unconditional promise in writing made by the debtor to
     * another person, signed by the debtor, engaging to pay on demand or at a
     * fixed or determinable future time a sum certain in money, to order or to
     * bearer.
     */
    case UNTDID_4461_61 = '61';

    /**
     * Promissory note signed by the debtor and endorsed by a bank (62)
     *
     * Payment by an unconditional promise in writing made by the debtor to
     * another person, signed by the debtor and endorsed by a bank, engaging to
     * pay on demand or at a fixed or determinable future time a sum certain in
     * money, to order or to bearer.
     */
    case UNTDID_4461_62 = '62';

    /**
     * Promissory note signed by the debtor and endorsed by a third party (63)
     *
     * Payment by an unconditional promise in writing made by the debtor to
     * another person, signed by the debtor and endorsed by a third party,
     * engaging to pay on demand or at a fixed or determinable future time a sum
     * certain in money, to order or to bearer.
     */
    case UNTDID_4461_63 = '63';

    /**
     * Promissory note signed by a bank (64)
     *
     * Payment by an unconditional promise in writing made by the bank to another
     * person, signed by the bank, engaging to pay on demand or at a fixed or
     * determinable future time a sum certain in money, to order or to bearer.
     */
    case UNTDID_4461_64 = '64';

    /**
     * Promissory note signed by a bank and endorsed by another bank (65)
     *
     * Payment by an unconditional promise in writing made by the bank to another
     * person, signed by the bank and endorsed by another bank, engaging to pay on
     * demand or at a fixed or determinable future time a sum certain in money, to
     * order or to bearer.
     */
    case UNTDID_4461_65 = '65';

    /**
     * Promissory note signed by a third party (66)
     *
     * Payment by an unconditional promise in writing made by a third party to
     * another person, signed by the third party, engaging to pay on demand or at
     * a fixed or determinable future time a sum certain in money, to order or to
     * bearer.
     */
    case UNTDID_4461_66 = '66';

    /**
     * Promissory note signed by a third party and endorsed by a bank (67)
     *
     * Payment by an unconditional promise in writing made by a third party to
     * another person, signed by the third party and endorsed by a bank, engaging
     * to pay on demand or at a fixed or determinable future time a sum certain in
     * money, to order or to bearer.
     */
    case UNTDID_4461_67 = '67';

    /**
     * Online payment service (68)
     *
     * Payment will be made or has been made by an online payment service.
     */
    case UNTDID_4461_68 = '68';

    /**
     * Transfer Advice (69)
     *
     * Transfer of an amount of money in the books of the account servicer. An
     * advice should be sent back to the account owner.
     */
    case UNTDID_4461_69 = '69';

    /**
     * ACH demand debit (7)
     *
     * A debit transaction made through the ACH system to a demand deposit
     * account.
     */
    case UNTDID_4461_7 = '7';

    /**
     * Bill drawn by the creditor on the debtor (70)
     *
     * Bill drawn by the creditor on the debtor.
     */
    case UNTDID_4461_70 = '70';

    /**
     * Bill drawn by the creditor on a bank (74)
     *
     * Bill drawn by the creditor on a bank.
     */
    case UNTDID_4461_74 = '74';

    /**
     * Bill drawn by the creditor, endorsed by another bank (75)
     *
     * Bill drawn by the creditor, endorsed by another bank.
     */
    case UNTDID_4461_75 = '75';

    /**
     * Bill drawn by the creditor on a bank and endorsed by a third party (76)
     *
     * Bill drawn by the creditor on a bank and endorsed by a third party.
     */
    case UNTDID_4461_76 = '76';

    /**
     * Bill drawn by the creditor on a third party (77)
     *
     * Bill drawn by the creditor on a third party.
     */
    case UNTDID_4461_77 = '77';

    /**
     * Bill drawn by creditor on third party, accepted and endorsed by bank (78)
     *
     * Bill drawn by creditor on third party, accepted and endorsed by bank.
     */
    case UNTDID_4461_78 = '78';

    /**
     * Hold (8)
     *
     * Indicates that the bank should hold the payment for collection by the
     * beneficiary or other instructions.
     */
    case UNTDID_4461_8 = '8';

    /**
     * National or regional clearing (9)
     *
     * Indicates that the payment should be made using the national or regional
     * clearing.
     */
    case UNTDID_4461_9 = '9';

    /**
     * Not transferable banker's draft (91)
     *
     * Issue a bankers draft not endorsable.
     */
    case UNTDID_4461_91 = '91';

    /**
     * Not transferable local cheque (92)
     *
     * Issue a cheque not endorsable in payment of the funds.
     */
    case UNTDID_4461_92 = '92';

    /**
     * Reference giro (93)
     *
     * Ordering customer tells the bank to use the payment system 'Reference
     * giro'. Used in the Finnish national banking system.
     */
    case UNTDID_4461_93 = '93';

    /**
     * Urgent giro (94)
     *
     * Ordering customer tells the bank to use the bank service 'Urgent Giro' when
     * transferring the payment. Used in Finnish national banking system.
     */
    case UNTDID_4461_94 = '94';

    /**
     * Free format giro (95)
     *
     * Ordering customer tells the ordering bank to use the bank service 'Free
     * Format Giro' when transferring the payment. Used in Finnish national
     * banking system.
     */
    case UNTDID_4461_95 = '95';

    /**
     * Requested method for payment was not used (96)
     *
     * If the requested method for payment was or could not be used, this code
     * indicates that.
     */
    case UNTDID_4461_96 = '96';

    /**
     * Clearing between partners (97)
     *
     * Amounts which two partners owe to each other to be compensated in order to
     * avoid useless payments.
     */
    case UNTDID_4461_97 = '97';

    /**
     * Mutually defined (ZZZ)
     *
     * A code assigned within a code list to be used on an interim basis and as
     * defined among trading partners until a precise code can be assigned to the
     * code list.
     */
    case UNTDID_4461_ZZZ = 'ZZZ';

    /**
     * Returns the caption of the code
     *
     * @return string
     * @codeCoverageIgnore
     */
    final public function getCaption(): string
    {
        return match ($this) {
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_1 => 'Instrument not defined',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_10 => 'In cash',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_11 => 'ACH savings credit reversal',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_12 => 'ACH savings debit reversal',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_13 => 'ACH savings credit',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_14 => 'ACH savings debit',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_15 => 'Bookentry credit',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_16 => 'Bookentry debit',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_17 => 'ACH demand cash concentration/disbursement (CCD) credit',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_18 => 'ACH demand cash concentration/disbursement (CCD) debit',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_19 => 'ACH demand corporate trade payment (CTP) credit',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_2 => 'Automated clearing house credit',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_20 => 'Cheque',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_21 => 'Bankers draft',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_22 => 'Certified bankers draft',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_23 => 'Bank cheque (issued by a banking or similar establishment)',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_24 => 'Bill of exchange awaiting acceptance',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_25 => 'Certified cheque',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_26 => 'Local cheque',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_27 => 'ACH demand corporate trade payment (CTP) debit',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_28 => 'ACH demand corporate trade exchange (CTX) credit',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_29 => 'ACH demand corporate trade exchange (CTX) debit',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_3 => 'Automated clearing house debit',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_30 => 'Credit transfer',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_31 => 'Debit transfer',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_32 => 'ACH demand cash concentration/disbursement plus (CCD+) credit',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_33 => 'ACH demand cash concentration/disbursement plus (CCD+) debit',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_34 => 'ACH prearranged payment and deposit (PPD)',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_35 => 'ACH savings cash concentration/disbursement (CCD) credit',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_36 => 'ACH savings cash concentration/disbursement (CCD) debit',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_37 => 'ACH savings corporate trade payment (CTP) credit',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_38 => 'ACH savings corporate trade payment (CTP) debit',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_39 => 'ACH savings corporate trade exchange (CTX) credit',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_4 => 'ACH demand debit reversal',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_40 => 'ACH savings corporate trade exchange (CTX) debit',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_41 => 'ACH savings cash concentration/disbursement plus (CCD+) credit',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_42 => 'Payment to bank account',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_43 => 'ACH savings cash concentration/disbursement plus (CCD+) debit',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_44 => 'Accepted bill of exchange',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_45 => 'Referenced home-banking credit transfer',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_46 => 'Interbank debit transfer',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_47 => 'Home-banking debit transfer',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_48 => 'Bank card',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_49 => 'Direct debit',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_5 => 'ACH demand credit reversal',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_50 => 'Payment by postgiro',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_51 => 'FR, norme 6 97-Telereglement CFONB (French Organisation for Banking Standards) - Option A',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_52 => 'Urgent commercial payment',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_53 => 'Urgent Treasury Payment',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_54 => 'Credit card',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_55 => 'Debit card',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_56 => 'Bankgiro',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_57 => 'Standing agreement',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_58 => 'SEPA credit transfer',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_59 => 'SEPA direct debit',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_6 => 'ACH demand credit',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_60 => 'Promissory note',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_61 => 'Promissory note signed by the debtor',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_62 => 'Promissory note signed by the debtor and endorsed by a bank',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_63 => 'Promissory note signed by the debtor and endorsed by a third party',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_64 => 'Promissory note signed by a bank',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_65 => 'Promissory note signed by a bank and endorsed by another bank',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_66 => 'Promissory note signed by a third party',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_67 => 'Promissory note signed by a third party and endorsed by a bank',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_68 => 'Online payment service',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_69 => 'Transfer Advice',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_7 => 'ACH demand debit',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_70 => 'Bill drawn by the creditor on the debtor',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_74 => 'Bill drawn by the creditor on a bank',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_75 => 'Bill drawn by the creditor, endorsed by another bank',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_76 => 'Bill drawn by the creditor on a bank and endorsed by a third party',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_77 => 'Bill drawn by the creditor on a third party',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_78 => 'Bill drawn by creditor on third party, accepted and endorsed by bank',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_8 => 'Hold',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_9 => 'National or regional clearing',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_91 => 'Not transferable bankers draft',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_92 => 'Not transferable local cheque',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_93 => 'Reference giro',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_94 => 'Urgent giro',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_95 => 'Free format giro',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_96 => 'Requested method for payment was not used',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_97 => 'Clearing between partners',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_ZZZ => 'Mutually defined',
        };
    }

    /**
     * Returns the description of the code
     *
     * @return string
     * @codeCoverageIgnore
     */
    final public function getDescription(): string
    {
        return match ($this) {
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_1 => 'Not defined legally enforceable agreement between two or more parties (expressing a contractual right or a right to the payment of money).',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_10 => 'Payment by currency (including bills and coins) in circulation, including checking account deposits.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_11 => 'A request to reverse an ACH credit transaction to a savings account.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_12 => 'A request to reverse an ACH debit transaction to a savings account.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_13 => 'A credit transaction made through the ACH system to a savings account.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_14 => 'A debit transaction made through the ACH system to a savings account.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_15 => 'A credit entry between two accounts at the same bank branch. Synonym: house credit.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_16 => 'A debit entry between two accounts at the same bank branch. Synonym: house debit.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_17 => 'A credit transaction made through the ACH system to a demand deposit account using the CCD payment format.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_18 => 'A debit transaction made through the ACH system to a demand deposit account using the CCD payment format.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_19 => 'A credit transaction made through the ACH system to a demand deposit account using the CTP payment format.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_2 => 'A credit transaction made through the automated clearing house system.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_20 => 'Payment by a pre-printed form on which instructions are given to an account holder (a bank or building society) to pay a stated sum to a named recipient.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_21 => 'Issue of a bankers draft in payment of the funds.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_22 => 'Cheque drawn by a bank on itself or its agent. A person who owes money to another buys the draft from a bank for cash and hands it to the creditor who need have no fear that it might be dishonoured.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_23 => 'Payment by a pre-printed form, which has been completed by a financial institution, on which instructions are given to an account holder (a bank or building society) to pay a stated sum to a named recipient.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_24 => 'Bill drawn by the creditor on the debtor but not yet accepted by the debtor.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_25 => 'Payment by a pre-printed form stamped with the paying banks certification on which instructions are given to an account holder (a bank or building society) to pay a stated sum to a named recipient .',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_26 => 'Indicates that the cheque is given local to the recipient.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_27 => 'A debit transaction made through the ACH system to a demand deposit account using the CTP payment format.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_28 => 'A credit transaction made through the ACH system to a demand deposit account using the CTX payment format.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_29 => 'A debit transaction made through the ACH system to a demand account using the CTX payment format.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_3 => 'A debit transaction made through the automated clearing house system.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_30 => 'Payment by credit movement of funds from one account to another.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_31 => 'Payment by debit movement of funds from one account to another.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_32 => 'A credit transaction made through the ACH system to a demand deposit account using the CCD+ payment format.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_33 => 'A debit transaction made through the ACH system to a demand deposit account using the CCD+ payment format.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_34 => 'A consumer credit transaction made through the ACH system to a demand deposit or savings account.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_35 => 'A credit transaction made through the ACH system to a demand deposit or savings account.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_36 => 'A debit transaction made through the ACH system to a savings account using the CCD payment format.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_37 => 'A credit transaction made through the ACH system to a savings account using the CTP payment format.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_38 => 'A debit transaction made through the ACH system to a savings account using the CTP payment format.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_39 => 'A credit transaction made through the ACH system to a savings account using the CTX payment format.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_4 => 'A request to reverse an ACH debit transaction to a demand deposit account.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_40 => 'A debit transaction made through the ACH system to a savings account using the CTX payment format.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_41 => 'A credit transaction made through the ACH system to a savings account using the CCD+ payment format.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_42 => 'Payment by an arrangement for settling debts that is operated by the Post Office.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_43 => 'A debit transaction made through the ACH system to a savings account using the CCD+ payment format.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_44 => 'Bill drawn by the creditor on the debtor and accepted by the debtor.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_45 => 'A referenced credit transfer initiated through home-banking.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_46 => 'A debit transfer via interbank means.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_47 => 'A debit transfer initiated through home-banking.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_48 => 'Payment by means of a card issued by a bank or other financial institution.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_49 => 'The amount is to be, or has been, directly debited to the customers bank account.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_5 => 'A request to reverse a credit transaction to a demand deposit account.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_50 => 'A method for the transmission of funds through the postal system rather than through the banking system.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_51 => 'A French standard procedure that allows a debtor to pay an amount due to a creditor. The creditor will forward it to its bank, which will collect the money on the bank account of the debtor.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_52 => 'Payment order which requires guaranteed processing by the most appropriate means to ensure it occurs on the requested execution date, provided that it is issued to the ordered bank before the agreed cut-off time.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_53 => 'Payment order or transfer which must be executed, by the most appropriate means, as urgently as possible and before urgent commercial payments.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_54 => 'Payment made by means of credit card.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_55 => 'Payment made by means of debit card.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_56 => 'Payment will be, or has been, made by bankgiro.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_57 => 'The payment means have been previously agreed between seller and buyer and thus are not stated again.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_58 => 'Credit transfer inside the Single Euro Payment Area (SEPA) system.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_59 => 'Direct debit inside the Single Euro Payment Area (SEPA) system.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_6 => 'A credit transaction made through the ACH system to a demand deposit account.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_60 => 'Payment by an unconditional promise in writing made by one person to another, signed by the maker, engaging to pay on demand or at a fixed or determinable future time a sum certain in money, to order or to bearer.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_61 => 'Payment by an unconditional promise in writing made by the debtor to another person, signed by the debtor, engaging to pay on demand or at a fixed or determinable future time a sum certain in money, to order or to bearer.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_62 => 'Payment by an unconditional promise in writing made by the debtor to another person, signed by the debtor and endorsed by a bank, engaging to pay on demand or at a fixed or determinable future time a sum certain in money, to order or to bearer.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_63 => 'Payment by an unconditional promise in writing made by the debtor to another person, signed by the debtor and endorsed by a third party, engaging to pay on demand or at a fixed or determinable future time a sum certain in money, to order or to bearer.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_64 => 'Payment by an unconditional promise in writing made by the bank to another person, signed by the bank, engaging to pay on demand or at a fixed or determinable future time a sum certain in money, to order or to bearer.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_65 => 'Payment by an unconditional promise in writing made by the bank to another person, signed by the bank and endorsed by another bank, engaging to pay on demand or at a fixed or determinable future time a sum certain in money, to order or to bearer.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_66 => 'Payment by an unconditional promise in writing made by a third party to another person, signed by the third party, engaging to pay on demand or at a fixed or determinable future time a sum certain in money, to order or to bearer.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_67 => 'Payment by an unconditional promise in writing made by a third party to another person, signed by the third party and endorsed by a bank, engaging to pay on demand or at a fixed or determinable future time a sum certain in money, to order or to bearer.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_68 => 'Payment will be made or has been made by an online payment service.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_69 => 'Transfer of an amount of money in the books of the account servicer. An advice should be sent back to the account owner.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_7 => 'A debit transaction made through the ACH system to a demand deposit account.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_70 => 'Bill drawn by the creditor on the debtor.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_74 => 'Bill drawn by the creditor on a bank.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_75 => 'Bill drawn by the creditor, endorsed by another bank.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_76 => 'Bill drawn by the creditor on a bank and endorsed by a third party.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_77 => 'Bill drawn by the creditor on a third party.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_78 => 'Bill drawn by creditor on third party, accepted and endorsed by bank.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_8 => 'Indicates that the bank should hold the payment for collection by the beneficiary or other instructions.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_9 => 'Indicates that the payment should be made using the national or regional clearing.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_91 => 'Issue a bankers draft not endorsable.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_92 => 'Issue a cheque not endorsable in payment of the funds.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_93 => 'Ordering customer tells the bank to use the payment system Reference giro. Used in the Finnish national banking system.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_94 => 'Ordering customer tells the bank to use the bank service Urgent Giro when transferring the payment. Used in Finnish national banking system.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_95 => 'Ordering customer tells the ordering bank to use the bank service Free Format Giro when transferring the payment. Used in Finnish national banking system.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_96 => 'If the requested method for payment was or could not be used, this code indicates that.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_97 => 'Amounts which two partners owe to each other to be compensated in order to avoid useless payments.',
            InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_ZZZ => 'A code assigned within a code list to be used on an interim basis and as defined among trading partners until a precise code can be assigned to the code list.',
        };
    }

    /**
     * Returns the URLs where the data are hosted
     *
     * @return array<int,string>
     * @codeCoverageIgnore
     */
    final public static function getHomepageUrls(): array
    {
        return [
            'https://www.xrepository.de/details/urn:xoev-de:xrechnung:codeliste:untdid.4461',
        ];
    }

    /**
     * Returns the URLs from where the data was downloaded
     *
     * @return array<int,string>
     * @codeCoverageIgnore
     */
    final public static function getDownloadUrls(): array
    {
        return [
            'https://www.xrepository.de/api/xrepository/urn:xoev-de:xrechnung:codeliste:untdid.4461_3/download/UNTDID_4461_3.json',
        ];
    }

    /**
     * Returns the ISO formatted date on which this enum was generated
     *
     * @return string
     * @codeCoverageIgnore
     */
    final public static function getCreatedAt(): string
    {
        return '2025-08-30T00:35:49+02:00';
    }
}
