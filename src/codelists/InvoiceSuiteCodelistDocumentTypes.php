<?php

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\codelists;

/**
 * Class representing list of document name codes
 * Name of list: UNTDID 1001 Document name code
 *
 * @category InvoiceSuite
 * @package  InvoiceSuite
 * @author   HorstOeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/invoicesuite
 * @see      https://www.xrepository.de/details/urn:xoev-de:kosit:codeliste:untdid.1001
 * @see      https://www.xrepository.de/api/xrepository/urn:xoev-de:kosit:codeliste:untdid.1001_4/download/UNTDID_1001_4.json
 */
enum InvoiceSuiteCodelistDocumentTypes: string
{
    /**
     * A claim for parts and/or labour charges (290)
     *
     * A claim for parts and/or labour charges incurred .
     */
    case A_CLAIM_FOR_PARTS_ANDOR_LABOUR_CHARGES = '290';

    /**
     * Accounting statement (832)
     *
     * Document specifying an accounting statement.
     */
    case ACCOUNTING_STATEMENT = '832';

    /**
     * Accounting voucher (526)
     *
     * A document/message justifying an accounting entry.
     */
    case ACCOUNTING_VOUCHER = '526';

    /**
     * Acknowledgement message (312)
     *
     * Message providing acknowledgement information at the business application
     * level concerning the processing of a message.
     */
    case ACKNOWLEDGEMENT_MESSAGE = '312';

    /**
     * Acknowledgement of change of supplier (414)
     *
     * Acknowledgement of the change of supplier.
     */
    case ACKNOWLEDGEMENT_OF_CHANGE_OF_SUPPLIER = '414';

    /**
     * Acknowledgement of order (320)
     *
     * Document/message acknowledging an undertaking to fulfil an order and
     * confirming conditions or acceptance of conditions.
     */
    case ACKNOWLEDGEMENT_OF_ORDER = '320';

    /**
     * Acknowledgment of receipt (767)
     *
     * Document/message confirming a receipt to the sending party.
     */
    case ACKNOWLEDGMENT_OF_RECEIPT = '767';

    /**
     * Advice of an amendment of a documentary credit (198)
     *
     * Advice of an amendment of a documentary credit.
     */
    case ADVICE_OF_AN_AMENDMENT_OF_A_DOCUMENTARY_CREDIT = '198';

    /**
     * Advice of collection (790)
     *
     * (1030) Document that is joined to the transport or sent by separate means,
     * giving to the departure rail organization the proof that the cash-on
     * delivery amount has been encashed by the arrival rail organization before
     * reimbursement of the consignor.
     */
    case ADVICE_OF_COLLECTION = '790';

    /**
     * Advice of distribution of documents (370)
     *
     * Document/message in which the party responsible for the issue of a set of
     * trade documents specifies the various recipients of originals and copies of
     * these documents, with an indication of the number of copies distributed to
     * each of them.
     */
    case ADVICE_OF_DISTRIBUTION_OF_DOCUMENTS = '370';

    /**
     * Advice report (769)
     *
     * Document reporting advice.
     */
    case ADVICE_REPORT = '769';

    /**
     * Advising items to be booked to a financial account (141)
     *
     * A document and/or message advising of items which have to be booked to a
     * financial account.
     */
    case ADVISING_ITEMS_TO_BE_BOOKED_TO_A_FINANCIAL_ACCOUNT = '141';

    /**
     * AEO Certificate Full (891)
     *
     * Certificate issued to business that fulfils specified criteria to both AEO
     * Certificate of Security and/or Safety and AEO Certificate of Conformity or
     * Compliance by a national AEO recognized program (e.g. AEO-Customs
     * Simplifications/Security and Safety (AEOC/AEOS) - Regulation(EU) No
     * 952/2013).
     */
    case AEO_CERTIFICATE_FULL = '891';

    /**
     * AEO Certificate of Conformity or Compliance (879)
     *
     * Certificate issued to business that fulfils specified criteria for
     * compliance with tax and customs obligations, as well as financial solvency
     * by a national AEO recognized program (e.g. AEO-Customs Simplifications
     * (AEOC) - Regulation (EU) No 952/2013).
     */
    case AEO_CERTIFICATE_OF_CONFORMITY_OR_COMPLIANCE = '879';

    /**
     * AEO Certificate of Security and/or Safety (878)
     *
     * Certificate issued to business that fulfils specified criteria applied to
     * the security and safety of the logistics chain in the flow of foreign trade
     * operations by a national AEO recognized program (e.g. AEO-Security and
     * Safety (AEOS) - Regulation (EU) No 952/2013).
     */
    case AEO_CERTIFICATE_OF_SECURITY_ANDOR_SAFETY = '878';

    /**
     * Agreement to pay (212)
     *
     * Document/message in which the debtor expresses the intention to pay.
     */
    case AGREEMENT_TO_PAY = '212';

    /**
     * Air waybill (740)
     *
     * Document/message made out by or on behalf of the shipper which evidences
     * the contract between the shipper and carrier(s) for carriage of goods over
     * routes of the carrier(s) and which is identified by the airline prefix
     * issuing the document plus a serial (IATA).
     */
    case AIR_WAYBILL = '740';

    /**
     * Amicable agreement (846)
     *
     * Document specifying an amicable agreement.
     */
    case AMICABLE_AGREEMENT = '846';

    /**
     * Announcement for returns (732)
     *
     * A message by which a party announces to another party details of goods for
     * return due to specified reasons (e.g. returns for repair, returns because
     * of damage, etc).
     */
    case ANNOUNCEMENT_FOR_RETURNS = '732';

    /**
     * Application acknowledgement and error report (294)
     *
     * A message used by an application to acknowledge reception of a message
     * and/or to report any errors.
     */
    case APPLICATION_ACKNOWLEDGEMENT_AND_ERROR_REPORT = '294';

    /**
     * Application error and acknowledgement (305)
     *
     * A message to inform a message issuer that a previously sent message has
     * been received by the addressee's application, or that a previously sent
     * message has been rejected by the addressee's application.
     */
    case APPLICATION_ERROR_AND_ACKNOWLEDGEMENT = '305';

    /**
     * Application error message (313)
     *
     * Message indicating that a message was rejected due to errors encountered at
     * the application level.
     */
    case APPLICATION_ERROR_MESSAGE = '313';

    /**
     * Application for banker's draft (412)
     *
     * Application by a customer to his bank to issue a banker's draft stating the
     * amount and currency of the draft, the name of the payee and the place and
     * country of payment.
     */
    case APPLICATION_FOR_BANKERS_DRAFT = '412';

    /**
     * Application for banker's guarantee (429)
     *
     * Document/message whereby a customer requests his bank to issue a guarantee
     * in favour of a nominated party in another country, stating the amount and
     * currency and the specific conditions of the guarantee.
     */
    case APPLICATION_FOR_BANKERS_GUARANTEE = '429';

    /**
     * Application for designation of berthing places (317)
     *
     * Document to apply for designation of berthing places.
     */
    case APPLICATION_FOR_DESIGNATION_OF_BERTHING_PLACES = '317';

    /**
     * Application for documentary credit (996)
     *
     * Message with application for opening of a documentary credit.
     */
    case APPLICATION_FOR_DOCUMENTARY_CREDIT = '996';

    /**
     * Application for exchange allocation (925)
     *
     * Document/message whereby an importer/buyer requests the competent body to
     * allocate an amount of foreign exchange to be transferred to an
     * exporter/seller in payment for goods.
     */
    case APPLICATION_FOR_EXCHANGE_ALLOCATION = '925';

    /**
     * Application for goods control certificate (840)
     *
     * Document/message submitted to a competent body by party requesting a Goods
     * control certificate to be issued in accordance with national or
     * international standards, or conforming to legislation in the importing
     * country, or as specified in the contract.
     */
    case APPLICATION_FOR_GOODS_CONTROL_CERTIFICATE = '840';

    /**
     * Application for inspection certificate (855)
     *
     * Document/message submitted to a competent body by a party requesting an
     * Inspection certificate to be issued in accordance with national or
     * international standards, or conforming to legislation in the country in
     * which it is required, or as specified in the contract.
     */
    case APPLICATION_FOR_INSPECTION_CERTIFICATE = '855';

    /**
     * Application for phytosanitary certificate (850)
     *
     * Document/message submitted to a competent body by party requesting a
     * Phytosanitary certificate to be issued.
     */
    case APPLICATION_FOR_PHYTOSANITARY_CERTIFICATE = '850';

    /**
     * Application for shifting from the designated place in port (318)
     *
     * Document to apply for shifting from the designated place in port.
     */
    case APPLICATION_FOR_SHIFTING_FROM_THE_DESIGNATED_PLACE_IN_PORT = '318';

    /**
     * Application for usage of berth or mooring facilities (316)
     *
     * Document to apply for usage of berth or mooring facilities.
     */
    case APPLICATION_FOR_USAGE_OF_BERTH_OR_MOORING_FACILITIES = '316';

    /**
     * Application for vessel's entering into port area in night-time (353)
     *
     * Document to apply for vessel's entering into port area in night-time.
     */
    case APPLICATION_FOR_VESSELS_ENTERING_INTO_PORT_AREA_IN_NIGHTTIME = '353';

    /**
     * Approved unpriced bill of quantity (216)
     *
     * Document/message providing an approved detailed, quantity based
     * specification (bill of quantity), in an unpriced form.
     */
    case APPROVED_UNPRICED_BILL_OF_QUANTITY = '216';

    /**
     * Arrival information (98)
     *
     * Message reporting the arrival details of goods or cargo.
     */
    case ARRIVAL_INFORMATION = '98';

    /**
     * Arrival notice (goods) (781)
     *
     * Notification from the carrier to the consignee in writing, by telephone or
     * by any other means (express letter, message, telegram, etc.) informing him
     * that a consignment addressed to him is being or will shortly be held at his
     * disposal at a specified point in the place of destination.
     */
    case ARRIVAL_NOTICE_GOODS = '781';

    /**
     * Assessment report (818)
     *
     * Document reporting an assessment.
     */
    case ASSESSMENT_REPORT = '818';

    /**
     * ATA carnet (955)
     *
     * International Customs document (Admission Temporaire / Temporary Admission)
     * which, issued under the terms of the ATA Convention (1961), incorporates an
     * internationally valid guarantee and may be used, in lieu of national
     * Customs documents and as security for import duties and taxes, to cover the
     * temporary admission of goods and, where appropriate, the transit of goods.
     * If accepted for controlling the temporary export and reimport of goods,
     * international guarantee does not apply (CCC).
     */
    case ATA_CARNET = '955';

    /**
     * Audio (859)
     *
     * Document consisting of an audio recording (e.g. a telephone conversation or
     * alike).
     */
    case AUDIO = '859';

    /**
     * Authorisation to plan and ship orders (173)
     *
     * Document or message that authorises receiver to plan and ship orders based
     * on information in this message.
     */
    case AUTHORISATION_TO_PLAN_AND_SHIP_ORDERS = '173';

    /**
     * Authorisation to plan and suggest orders (172)
     *
     * Document or message that authorises receiver to plan orders, based on
     * information in this message, and send these orders as suggestions to the
     * sender.
     */
    case AUTHORISATION_TO_PLAN_AND_SUGGEST_ORDERS = '172';

    /**
     * Bailment contract (148)
     *
     * A document authorizing the bailing of goods.
     */
    case BAILMENT_CONTRACT = '148';

    /**
     * Balance confirmation (182)
     *
     * Confirmation of a balance at an entry date.
     */
    case BALANCE_CONFIRMATION = '182';

    /**
     * Bank to bank funds transfer (247)
     *
     * The message is a bank to bank funds transfer.
     */
    case BANK_TO_BANK_FUNDS_TRANSFER = '247';

    /**
     * Banker's draft (485)
     *
     * Draft drawn in favour of a third party either by one bank on another bank,
     * or by a branch of a bank on its head office (or vice versa) or upon another
     * branch of the same bank. In either case, the draft should comply with the
     * specifications laid down for cheques in the country in which it is to be
     * payable.
     */
    case BANKERS_DRAFT = '485';

    /**
     * Banker's guarantee (430)
     *
     * Document/message in which a bank undertakes to pay out a limited amount of
     * money to a designated party, on conditions stated therein (other than those
     * laid down in the Uniform Customs Practice).
     */
    case BANKERS_GUARANTEE = '430';

    /**
     * Banking status (46)
     *
     * A banking status document and/or message.
     */
    case BANKING_STATUS = '46';

    /**
     * Basic agreement (149)
     *
     * A document indicating an agreement containing basic terms and conditions
     * applicable to future contracts between two parties.
     */
    case BASIC_AGREEMENT = '149';

    /**
     * Bayplan/stowage plan, full (658)
     *
     * A full bayplan containing all occupied and/or blocked stowage locations.
     */
    case BAYPLANSTOWAGE_PLAN_FULL = '658';

    /**
     * Bayplan/stowage plan, partial (659)
     *
     * A partial bayplan. containing only a selected part of the available stowage
     * locations.
     */
    case BAYPLANSTOWAGE_PLAN_PARTIAL = '659';

    /**
     * Bill of exchange (490)
     *
     * Document/message, issued and signed in conformity with the applicable
     * legislation, which contains an unconditional order whereby the drawer
     * directs the drawee to pay a definite sum of money to the payee or to his
     * order, on demand or at a definite time, against the surrender of the
     * document itself.
     */
    case BILL_OF_EXCHANGE = '490';

    /**
     * Bill of lading (705)
     *
     * Negotiable document/message which evidences a contract of carriage by sea
     * and the taking over or loading of goods by carrier, and by which carrier
     * undertakes to deliver goods against surrender of the document. A provision
     * in the document that goods are to be delivered to the order of a named
     * person, or to order, or to bearer, constitutes such an undertaking.
     */
    case BILL_OF_LADING = '705';

    /**
     * Bill of lading copy (707)
     *
     * A copy of the bill of lading issued by a transport company.
     */
    case BILL_OF_LADING_COPY = '707';

    /**
     * Bill of lading original (706)
     *
     * The original of the bill of lading issued by a transport company. When
     * issued by the maritime industry it could signify ownership of the cargo.
     */
    case BILL_OF_LADING_ORIGINAL = '706';

    /**
     * Binding customer agreement for contract (772)
     *
     * Document which is a binding agreement from the customer for a contract,
     * such as an insurance contract.
     */
    case BINDING_CUSTOMER_AGREEMENT_FOR_CONTRACT = '772';

    /**
     * Binding offer (771)
     *
     * Document which is a binding offer from one party to another.
     */
    case BINDING_OFFER = '771';

    /**
     * Blanket order (221)
     *
     * Usage of document/message for general order purposes with later split into
     * quantities and delivery dates and maybe delivery locations.
     */
    case BLANKET_ORDER = '221';

    /**
     * Booking confirmation (770)
     *
     * Document/message issued by a carrier to confirm that space has been
     * reserved for a consignment in means of transport.
     */
    case BOOKING_CONFIRMATION = '770';

    /**
     * Booking request (335)
     *
     * Document/message issued by a supplier to a carrier requesting space to be
     * reserved for a specified consignment, indicating desirable conveyance,
     * despatch time, etc.
     */
    case BOOKING_REQUEST = '335';

    /**
     * Bordereau (787)
     *
     * Document/message used in road transport, listing the cargo carried on a
     * road vehicle, often referring to appended copies of Road consignment note.
     */
    case BORDEREAU = '787';

    /**
     * Buy America certificate of compliance (168)
     *
     * A document certifying that more than 50 percent of the cost of an item is
     * attributed to US origin.
     */
    case BUY_AMERICA_CERTIFICATE_OF_COMPLIANCE = '168';

    /**
     * Calculation note (844)
     *
     * Document detailing a calculation, such as an invoice calculation or a costs
     * calculation.
     */
    case CALCULATION_NOTE = '844';

    /**
     * Call for tender (754)
     *
     * A document/message used by a buyer to define the procurement procedure and
     * request suppliers to participate.
     */
    case CALL_FOR_TENDER = '754';

    /**
     * Call off order (226)
     *
     * Document/message to provide split quantities and delivery dates referring
     * to a previous blanket order.
     */
    case CALL_OFF_ORDER = '226';

    /**
     * Call-off delivery (76)
     *
     * Document/message to provide split quantities and delivery dates referring
     * to a previous delivery instruction.
     */
    case CALLOFF_DELIVERY = '76';

    /**
     * Calling forward notice (775)
     *
     * Instructions for release or delivery of goods.
     */
    case CALLING_FORWARD_NOTICE = '775';

    /**
     * Campaign price/sales catalogue (234)
     *
     * A price/sales catalogue containing special prices which are valid only for
     * a specified period or under specified conditions.
     */
    case CAMPAIGN_PRICESALES_CATALOGUE = '234';

    /**
     * Cargo acceptance order (170)
     *
     * Order to accept cargo to be delivered by a carrier.
     */
    case CARGO_ACCEPTANCE_ORDER = '170';

    /**
     * Cargo analysis voyage report (260)
     *
     * An analysis of the cargo for a voyage.
     */
    case CARGO_ANALYSIS_VOYAGE_REPORT = '260';

    /**
     * Cargo declaration (arrival) (933)
     *
     * Generic term, sometimes referred to as Freight declaration, applied to the
     * documents providing the particulars required by the Customs concerning the
     * cargo (freight) carried by commercial means of transport (CCC).
     */
    case CARGO_DECLARATION_ARRIVAL = '933';

    /**
     * Cargo declaration (departure) (833)
     *
     * Generic term, sometimes referred to as Freight declaration, applied to the
     * documents providing the particulars required by the Customs concerning the
     * cargo (freight) carried by commercial means of transport (CCC).
     */
    case CARGO_DECLARATION_DEPARTURE = '833';

    /**
     * Cargo manifest (785)
     *
     * Listing of goods comprising the cargo carried in a means of transport or in
     * a transport-unit. The cargo manifest gives the commercial particulars of
     * the goods, such as transport document numbers, consignors, consignees,
     * shipping marks, number and kind of packages and descriptions and quantities
     * of the goods.
     */
    case CARGO_MANIFEST = '785';

    /**
     * Cargo movement event log (259)
     *
     * A document detailing times and dates of events pertaining to a cargo
     * movement.
     */
    case CARGO_MOVEMENT_EVENT_LOG = '259';

    /**
     * Cargo movement voyage summary (314)
     *
     * A consolidated voyage summary which contains the information in a
     * certificate of analysis, a voyage analysis and a cargo movement time log
     * for a voyage.
     */
    case CARGO_MOVEMENT_VOYAGE_SUMMARY = '314';

    /**
     * Cargo release notification (99)
     *
     * Message/document sent by the cargo handler indicating that the cargo has
     * moved from a Customs controlled premise.
     */
    case CARGO_RELEASE_NOTIFICATION = '99';

    /**
     * Cargo status (34)
     *
     * Message identifying the status of cargo.
     */
    case CARGO_STATUS = '34';

    /**
     * Cargo vessel discharge order (145)
     *
     * Order that the containers or cargo specified are to be discharged from a
     * vessel.
     */
    case CARGO_VESSEL_DISCHARGE_ORDER = '145';

    /**
     * Cargo vessel loading order (146)
     *
     * Order that specified cargo, containers or groups of containers are to be
     * loaded in or on a vessel.
     */
    case CARGO_VESSEL_LOADING_ORDER = '146';

    /**
     * Cargo/goods handling and movement message (738)
     *
     * A message from a party to a warehouse, distribution centre, or logistics
     * service provider identifying the handling services and where required the
     * movement of specified goods, limited to warehouses within the jurisdiction
     * of the distribution centre or log.
     */
    case CARGOGOODS_HANDLING_AND_MOVEMENT_MESSAGE = '738';

    /**
     * Cartage order (local transport) (343)
     *
     * Document/message giving instructions regarding local transport of goods,
     * e.g. from the premises of an enterprise to those of a carrier undertaking
     * further transport.
     */
    case CARTAGE_ORDER_LOCAL_TRANSPORT = '343';

    /**
     * Cash pool financial statement (306)
     *
     * A financial statement for a cash pool.
     */
    case CASH_POOL_FINANCIAL_STATEMENT = '306';

    /**
     * Casing sanitary certificate (93)
     *
     * Document or message issued by the competent authority in the exporting
     * country evidencing that casing products comply with the requirements set by
     * the importing country.
     */
    case CASING_SANITARY_CERTIFICATE = '93';

    /**
     * Certificate (16)
     *
     * Document by means of which the documentary credit applicant specifies the
     * conditions for the certificate and by whom the certificate is to be issued.
     */
    case CERTIFICATE = '16';

    /**
     * Certificate of analysis (1)
     *
     * Certificate providing the values of an analysis.
     */
    case CERTIFICATE_OF_ANALYSIS = '1';

    /**
     * Certificate of compliance with standards of the World Organization for
     * Animal Health (OIE) (648)
     *
     * A certification that the products have been treated in a way consistent
     * with the standards set by the World Organization for Animal Health (OIE).
     */
    case CERTIFICATE_OF_COMPLIANCE_WITH_STANDARDS_OF_THE_WORLD_ORGANIZATION_FOR_ANIMAL_HEALTH_OIE = '648';

    /**
     * Certificate of conformity (2)
     *
     * Certificate certifying the conformity to predefined definitions.
     */
    case CERTIFICATE_OF_CONFORMITY = '2';

    /**
     * Certificate of disembarkation permission (487)
     *
     * Document or message issuing permission to disembark.
     */
    case CERTIFICATE_OF_DISEMBARKATION_PERMISSION = '487';

    /**
     * Certificate of food item transport readiness (642)
     *
     * A certificate to verify readiness of a transport or transport area such as
     * a reservoir or hold to transport food items.
     */
    case CERTIFICATE_OF_FOOD_ITEM_TRANSPORT_READINESS = '642';

    /**
     * Certificate of origin (861)
     *
     * Document/message identifying goods, in which the authority or body
     * authorized to issue it certifies expressly that the goods to which the
     * certificate relates originate in a specific country. The word "country" may
     * include a group of countries, a region or a part of a country. This
     * certificate may also include a declaration by the manufacturer, producer,
     * supplier, exporter or other competent person.
     */
    case CERTIFICATE_OF_ORIGIN = '861';

    /**
     * Certificate of origin form GSP (865)
     *
     * Specific form of certificate of origin for goods qualifying for
     * preferential treatment under the generalized system of preferences
     * (includes a combined declaration of origin and certificate, form A).
     */
    case CERTIFICATE_OF_ORIGIN_FORM_GSP = '865';

    /**
     * Certificate of origin, application for (860)
     *
     * Document/message submitted to a competent body by an interested party
     * requesting a Certificate of origin to be issued in accordance with relevant
     * criteria, and on the basis of evidence of the origin of the goods.
     */
    case CERTIFICATE_OF_ORIGIN_APPLICATION_FOR = '860';

    /**
     * Certificate of paid insurance premium (835)
     *
     * Document certifying the payment of the insurance premium.
     */
    case CERTIFICATE_OF_PAID_INSURANCE_PREMIUM = '835';

    /**
     * Certificate of quality (3)
     *
     * Certificate certifying the quality of goods, services etc.
     */
    case CERTIFICATE_OF_QUALITY = '3';

    /**
     * Certificate of quantity (19)
     *
     * Certificate certifying the quantity of goods, services etc.
     */
    case CERTIFICATE_OF_QUANTITY = '19';

    /**
     * Certificate of refrigerated transport equipment inspection (639)
     *
     * Inspection document shows that the container, the cooling devices and
     * measured temperature is in good working condition.
     */
    case CERTIFICATE_OF_REFRIGERATED_TRANSPORT_EQUIPMENT_INSPECTION = '639';

    /**
     * Certificate of registry (798)
     *
     * Official certificate stating the vessel's registry.
     */
    case CERTIFICATE_OF_REGISTRY = '798';

    /**
     * Certificate of sealing of export meat lockers (33)
     *
     * Document / message issued by the authority in the exporting country
     * evidencing the sealing of export meat lockers.
     */
    case CERTIFICATE_OF_SEALING_OF_EXPORT_MEAT_LOCKERS = '33';

    /**
     * Certificate of shipment (375)
     *
     * (1109) Certificate providing confirmation that a consignment has been
     * shipped.
     */
    case CERTIFICATE_OF_SHIPMENT = '375';

    /**
     * Certificate of suitability for transport of grains and legumes (638)
     *
     * Certificate of inspection for the vessel stating its readiness and
     * suitability for transporting grains and legumes.
     */
    case CERTIFICATE_OF_SUITABILITY_FOR_TRANSPORT_OF_GRAINS_AND_LEGUMES = '638';

    /**
     * Certificate of sustainability (753)
     *
     * Document/message issued by a competent body certifying sustainability.
     */
    case CERTIFICATE_OF_SUSTAINABILITY = '753';

    /**
     * Certified cost and price data (159)
     *
     * A document indicating cost and price data whose accuracy has been
     * certified.
     */
    case CERTIFIED_COST_AND_PRICE_DATA = '159';

    /**
     * Certified inspection and test results (162)
     *
     * A certification as to the accuracy of inspection and test results.
     */
    case CERTIFIED_INSPECTION_AND_TEST_RESULTS = '162';

    /**
     * Certified list of ingredients (634)
     *
     * A document legalized from a competent authority that shows the components
     * of the product (food additive, detergent, disinfectant and sanitizer).
     */
    case CERTIFIED_LIST_OF_INGREDIENTS = '634';

    /**
     * Chargeback (68)
     *
     * Document/message issued by a factor to a seller or to another factor to
     * indicate that the rest of the amounts of one or more invoices uncollectable
     * from buyers are charged back to clear the invoice(s) off the ledger.
     */
    case CHARGEBACK = '68';

    /**
     * Charges note (789)
     *
     * Document used by the rail organization to indicate freight charges or
     * additional charges in each case where the departure station is not able to
     * calculate the charges for the total voyage (e.g. tariff not yet updated,
     * part of voyage not covered by the tariff). This document must be considered
     * as joined to the transport.
     */
    case CHARGES_NOTE = '789';

    /**
     * Civil liability for oil certificate (794)
     *
     * Document declaring a ship owner's liability for oil propelling or carried
     * on a vessel.
     */
    case CIVIL_LIABILITY_FOR_OIL_CERTIFICATE = '794';

    /**
     * Civil status document (768)
     *
     * Document which confirms the civil status of a person.
     */
    case CIVIL_STATUS_DOCUMENT = '768';

    /**
     * Claim history certificate (831)
     *
     * Document which certifies the history of claims.
     */
    case CLAIM_HISTORY_CERTIFICATE = '831';

    /**
     * Claim notification (817)
     *
     * Document notifying a claim.
     */
    case CLAIM_NOTIFICATION = '817';

    /**
     * Close of claim (827)
     *
     * Document reporting the closing of a claim file.
     */
    case CLOSE_OF_CLAIM = '827';

    /**
     * Closing statement of an account (56)
     *
     * Last statement of a period containing the interest calculation and the
     * final balance of the last entry date.
     */
    case CLOSING_STATEMENT_OF_AN_ACCOUNT = '56';

    /**
     * Co-insurance ceding bordereau (329)
     *
     * The document or message contains a bordereau describing co-insurance ceding
     * information.
     */
    case COINSURANCE_CEDING_BORDEREAU = '329';

    /**
     * Code change request (273)
     *
     * Request a change to an existing code.
     */
    case CODE_CHANGE_REQUEST = '273';

    /**
     * Collateral account (70)
     *
     * Document message issued by a factor to indicate the movements of invoices,
     * credit notes and payments of a seller's account.
     */
    case COLLATERAL_ACCOUNT = '70';

    /**
     * Collection order (447)
     *
     * Document/message whereby a bank is instructed (or requested) to handle
     * financial and/or commercial documents in order to obtain acceptance and/or
     * payment, or to deliver documents on such other terms and conditions as may
     * be specified.
     */
    case COLLECTION_ORDER = '447';

    /**
     * Collection payment advice (425)
     *
     * Document/message whereby a bank advises that a collection has been paid,
     * giving details and methods of funds disposal.
     */
    case COLLECTION_PAYMENT_ADVICE = '425';

    /**
     * Combined certificate of value and origin (17)
     *
     * Document identifying goods in which the issuing authority expressly
     * certifies that the goods originate in a specific country or part of, or
     * group of countries. It also states the price and/or cost of the goods with
     * the purpose of determining the customs origin.
     */
    case COMBINED_CERTIFICATE_OF_VALUE_AND_ORIGIN = '17';

    /**
     * Combined transport bill of lading/multimodal bill of lading (766)
     *
     * Document which evidences a multimodal transport contract, the taking in
     * charge of the goods by the multimodal transport operator, and an
     * undertaking by him to deliver the goods in accordance with the terms of the
     * contract.
     */
    case COMBINED_TRANSPORT_BILL_OF_LADINGMULTIMODAL_BILL_OF_LADING = '766';

    /**
     * Combined transport document (generic) (764)
     *
     * Negotiable or non-negotiable document evidencing a contract for the
     * performance and/or procurement of performance of combined transport of
     * goods and bearing on its face either the heading "Negotiable combined
     * transport document issued subject to Uniform Rules for a Combined Transport
     * Document (ICC Brochure No. 298)" or the heading "Non-negotiable Combined
     * Transport Document issued subject to Uniform Rules for a Combined Transport
     * Document (ICC Brochure No. 298)".
     */
    case COMBINED_TRANSPORT_DOCUMENT_GENERIC = '764';

    /**
     * Commercial account summary (731)
     *
     * A message enabling the transmission of commercial data concerning payments
     * made and outstanding items on an account over a period of time.
     */
    case COMMERCIAL_ACCOUNT_SUMMARY = '731';

    /**
     * Commercial account summary response (397)
     *
     * A document providing a response to a previously sent commercial account
     * summary message.
     */
    case COMMERCIAL_ACCOUNT_SUMMARY_RESPONSE = '397';

    /**
     * Commercial dispute (67)
     *
     * Document/message issued by a party (usually the buyer) to indicate that one
     * or more invoices or one or more credit notes are disputed for payment.
     */
    case COMMERCIAL_DISPUTE = '67';

    /**
     * Commercial invoice (380)
     *
     * (1334) Document/message claiming payment for goods or services supplied
     * under conditions agreed between seller and buyer.
     */
    case COMMERCIAL_INVOICE = '380';

    /**
     * Commercial invoice which includes a packing list (331)
     *
     * Commercial transaction (invoice) will include a packing list.
     */
    case COMMERCIAL_INVOICE_WHICH_INCLUDES_A_PACKING_LIST = '331';

    /**
     * Commission note (382)
     *
     * (1111) Document/message in which a seller specifies the amount of
     * commission, the percentage of the invoice amount, or some other basis for
     * the calculation of the commission to which a sales agent is entitled.
     */
    case COMMISSION_NOTE = '382';

    /**
     * Communication from opposite party (845)
     *
     * Document containing a communication from the opposite party, such as in
     * legal action.
     */
    case COMMUNICATION_FROM_OPPOSITE_PARTY = '845';

    /**
     * Composite data element change request (277)
     *
     * Request a change to an existing composite data element.
     */
    case COMPOSITE_DATA_ELEMENT_CHANGE_REQUEST = '277';

    /**
     * Composite data element request (276)
     *
     * Requesting a new composite data element.
     */
    case COMPOSITE_DATA_ELEMENT_REQUEST = '276';

    /**
     * Consignment despatch advice (748)
     *
     * Document/message by means of which the supplier informs the buyer about the
     * despatch of goods ordered on consignment (goods to be delivered into stock
     * with agreement on payment when goods are sold out of this stock).
     */
    case CONSIGNMENT_DESPATCH_ADVICE = '748';

    /**
     * Consignment invoice (395)
     *
     * Commercial invoice that covers a transaction other than one involving a
     * sale.
     */
    case CONSIGNMENT_INVOICE = '395';

    /**
     * Consignment order (227)
     *
     * Order to deliver goods into stock with agreement on payment when goods are
     * sold out of this stock.
     */
    case CONSIGNMENT_ORDER = '227';

    /**
     * Consignment status report (77)
     *
     * Message covers information about the consignment status.
     */
    case CONSIGNMENT_STATUS_REPORT = '77';

    /**
     * Consignment unpack report (88)
     *
     * A document code to indicate that the message being transmitted is a
     * consignment unpack report only.
     */
    case CONSIGNMENT_UNPACK_REPORT = '88';

    /**
     * Consolidated credit note - goods and services (262)
     *
     * Credit note for goods and services that covers multiple transactions
     * involving more than one invoice.
     */
    case CONSOLIDATED_CREDIT_NOTE_GOODS_AND_SERVICES = '262';

    /**
     * Consolidated invoice (385)
     *
     * Commercial invoice that covers multiple transactions involving more than
     * one vendor.
     */
    case CONSOLIDATED_INVOICE = '385';

    /**
     * Consular invoice (870)
     *
     * Document/message to be prepared by an exporter in his country and presented
     * to a diplomatic representation of the importing country for endorsement and
     * subsequently to be presented by the importer in connection with the import
     * of the goods described therein.
     */
    case CONSULAR_INVOICE = '870';

    /**
     * Container discharge list (25)
     *
     * Message/document itemising containers to be discharged from vessel.
     */
    case CONTAINER_DISCHARGE_LIST = '25';

    /**
     * Container list (235)
     *
     * Document or message issued by party identifying the containers for which
     * they are responsible.
     */
    case CONTAINER_LIST = '235';

    /**
     * Container manifest (unit packing list) (788)
     *
     * Document/message specifying the contents of particular freight containers
     * or other transport units, prepared by the party responsible for their
     * loading into the container or unit.
     */
    case CONTAINER_MANIFEST_UNIT_PACKING_LIST = '788';

    /**
     * Container off-hire notice (169)
     *
     * Notice to return leased containers.
     */
    case CONTAINER_OFFHIRE_NOTICE = '169';

    /**
     * Container stripping order (183)
     *
     * Order to unload goods from a container.
     */
    case CONTAINER_STRIPPING_ORDER = '183';

    /**
     * Container stuffing order (184)
     *
     * Order to stuff specified goods or consignments in a container.
     */
    case CONTAINER_STUFFING_ORDER = '184';

    /**
     * Container transfer note (976)
     *
     * Document for the carriage of containers. Syn: transfer note.
     */
    case CONTAINER_TRANSFER_NOTE = '976';

    /**
     * Contract (315)
     *
     * (1296) Document/message evidencing an agreement between the seller and the
     * buyer for the supply of goods or services; its effects are equivalent to
     * those of an order followed by an acknowledgement of order.
     */
    case CONTRACT = '315';

    /**
     * Contract bill of quantities - BOQ (207)
     *
     * Document/message providing a formal specification identifying quantities
     * and prices that are the basis of a contract for a construction project. BOQ
     * means: Bill of quantity.
     */
    case CONTRACT_BILL_OF_QUANTITIES_BOQ = '207';

    /**
     * Contract clauses (776)
     *
     * Document specifying the clauses applying to a contract.
     */
    case CONTRACT_CLAUSES = '776';

    /**
     * Contract Funds Status Report (CFSR) (161)
     *
     * A report to provide the status of funds applicable to the contract.
     */
    case CONTRACT_FUNDS_STATUS_REPORT_CFSR = '161';

    /**
     * Contract price and delivery quote (365)
     *
     * Document/message confirming contractual price conditions and contractual
     * delivery conditions under which goods are offered.
     */
    case CONTRACT_PRICE_AND_DELIVERY_QUOTE = '365';

    /**
     * Contract price quote (364)
     *
     * Document/message confirming contractual price conditions under which goods
     * are offered.
     */
    case CONTRACT_PRICE_QUOTE = '364';

    /**
     * Contract security classification specification (166)
     *
     * A document that indicates the specification contains the security and
     * classification requirements for a contract.
     */
    case CONTRACT_SECURITY_CLASSIFICATION_SPECIFICATION = '166';

    /**
     * Control document T5 (823)
     *
     * Control document (export declaration) used particularly in case of
     * re-sending without use with only VAT collection, refusal, unconformity with
     * contract etc.
     */
    case CONTROL_DOCUMENT_T = '823';

    /**
     * Convention on International Trade in Endangered Species of Wild Fauna and
     * Flora (CITES) Certificate (626)
     *
     * A certificate used in the trade of endangered species in accordance with
     * the CITES convention.
     */
    case CONVENTION_ON_INTERNATIONAL_TRADE_IN_ENDANGERED_SPECIES_OF_WILD_FAUNA_AND_FLORA_CITES_CERTIFICATE = '626';

    /**
     * Conveyance declaration (874)
     *
     * Declaration of the conveyance to a public authority.
     */
    case CONVEYANCE_DECLARATION = '874';

    /**
     * Conveyance declaration (arrival) (185)
     *
     * Declaration to the public authority upon arrival of the conveyance.
     */
    case CONVEYANCE_DECLARATION_ARRIVAL = '185';

    /**
     * Conveyance declaration (combined) (187)
     *
     * Combined declaration of arrival and departure to the public authority.
     */
    case CONVEYANCE_DECLARATION_COMBINED = '187';

    /**
     * Conveyance declaration (departure) (186)
     *
     * Declaration to the public authority upon departure of the conveyance.
     */
    case CONVEYANCE_DECLARATION_DEPARTURE = '186';

    /**
     * Copy accounting voucher (534)
     *
     * To indicate that the document/message justifying an accounting entry is a
     * copy.
     */
    case COPY_ACCOUNTING_VOUCHER = '534';

    /**
     * Corporate superannuation contributions advice (26)
     *
     * Document/message providing contributions advice used for corporate
     * superannuation schemes.
     */
    case CORPORATE_SUPERANNUATION_CONTRIBUTIONS_ADVICE = '26';

    /**
     * Corporate superannuation member maintenance message (28)
     *
     * Member maintenance message used for corporate superannuation schemes.
     */
    case CORPORATE_SUPERANNUATION_MEMBER_MAINTENANCE_MESSAGE = '28';

    /**
     * Corrected invoice (384)
     *
     * Commercial invoice that includes revised information differing from an
     * earlier submission of the same invoice.
     */
    case CORRECTED_INVOICE = '384';

    /**
     * Cost data summary (158)
     *
     * A document indicating a summary of cost data.
     */
    case COST_DATA_SUMMARY = '158';

    /**
     * Cost performance report (304)
     *
     * A report to convey cost performance data for a project or contract.
     */
    case COST_PERFORMANCE_REPORT = '304';

    /**
     * Cost Performance Report (CPR) format 1 (177)
     *
     * A report identifying the cost performance on a contract including the
     * current month's values at specified levels of the work breakdown structure
     * (format 1 - work breakdown structure).
     */
    case COST_PERFORMANCE_REPORT_CPR_FORMAT = '177';

    /**
     * Cost Schedule Status Report (CSSR) (176)
     *
     * A report providing the status of the cost and schedule applicable to a
     * contract.
     */
    case COST_SCHEDULE_STATUS_REPORT_CSSR = '176';

    /**
     * Court judgment (854)
     *
     * Document specifying a judgment of a court.
     */
    case COURT_JUDGMENT = '854';

    /**
     * Cover note (580)
     *
     * Document/message issued by an insurer (insurance broker, agent, etc.) to
     * notify the insured that his insurance have been carried out.
     */
    case COVER_NOTE = '580';

    /**
     * Coverage confirmation note (773)
     *
     * Document confirming that insurance coverage is granted.
     */
    case COVERAGE_CONFIRMATION_NOTE = '773';

    /**
     * Credit advice (454)
     *
     * Document/message sent by an account servicing institution to one of its
     * account owners, to inform the account owner of an entry which has been or
     * will be credited to its account for a specified amount on the date
     * indicated.
     */
    case CREDIT_ADVICE = '454';

    /**
     * Credit cover (65)
     *
     * Document/message issued either by a factor to give a credit cover on a
     * buyer, or by a seller to request a factor's credit cover.
     */
    case CREDIT_COVER = '65';

    /**
     * Credit note (381)
     *
     * (1113) Document/message for providing credit information to the relevant
     * party.
     */
    case CREDIT_NOTE = '381';

    /**
     * Credit note for price variation (296)
     *
     * A credit note which is issued against a price variation invoice.
     */
    case CREDIT_NOTE_FOR_PRICE_VARIATION = '296';

    /**
     * Credit note related to financial adjustments (83)
     *
     * Document message for providing credit information related to financial
     * adjustments to the relevant party, e.g., bonuses.
     */
    case CREDIT_NOTE_RELATED_TO_FINANCIAL_ADJUSTMENTS = '83';

    /**
     * Credit note related to goods or services (81)
     *
     * Document message used to provide credit information related to a
     * transaction for goods or services to the relevant party.
     */
    case CREDIT_NOTE_RELATED_TO_GOODS_OR_SERVICES = '81';

    /**
     * Crew list declaration (250)
     *
     * Declaration regarding crew members aboard the conveyance.
     */
    case CREW_LIST_DECLARATION = '250';

    /**
     * Crew's effects declaration (744)
     *
     * Declaration to Customs regarding the personal effects of crew members
     * aboard the conveyance; equivalent to IMO FAL 4.
     */
    case CREWS_EFFECTS_DECLARATION = '744';

    /**
     * Cross docking despatch advice (398)
     *
     * Document by means of which the supplier or consignor informs the buyer,
     * consignee or the distribution centre about the despatch of goods for cross
     * docking.
     */
    case CROSS_DOCKING_DESPATCH_ADVICE = '398';

    /**
     * Cross docking services order (237)
     *
     * A document or message to order cross docking services.
     */
    case CROSS_DOCKING_SERVICES_ORDER = '237';

    /**
     * Current account (66)
     *
     * Document/message issued by a factor to indicate the money movements of a
     * seller's or another factor's account with him.
     */
    case CURRENT_ACCOUNT = '66';

    /**
     * Customer payment order(s) (248)
     *
     * The message contains customer payment order(s).
     */
    case CUSTOMER_PAYMENT_ORDERS = '248';

    /**
     * Customs clearance notice (132)
     *
     * Notification of customs clearance of cargo or items of transport equipment.
     */
    case CUSTOMS_CLEARANCE_NOTICE = '132';

    /**
     * Customs crew and conveyance (336)
     *
     * Document/message contains information regarding the crew list and
     * conveyance.
     */
    case CUSTOMS_CREW_AND_CONVEYANCE = '336';

    /**
     * Customs declaration (post parcels) (936)
     *
     * Document/message which, according to Article 106 of the "Agreement
     * concerning Postal Parcels" under the UPU Convention, must accompany post
     * parcels and in which the contents of such parcels are specified.
     */
    case CUSTOMS_DECLARATION_POST_PARCELS = '936';

    /**
     * Customs declaration for cargo examination (333)
     *
     * Declaration provided to customs for cargo examination.
     */
    case CUSTOMS_DECLARATION_FOR_CARGO_EXAMINATION = '333';

    /**
     * Customs declaration for cargo examination, alternate (334)
     *
     * Alternate declaration provided to customs for cargo examination.
     */
    case CUSTOMS_DECLARATION_FOR_CARGO_EXAMINATION_ALTERNATE = '334';

    /**
     * Customs declaration for TIR Carnet goods (587)
     *
     * A Customs declaration in which goods move under cover of TIR Carnets.
     */
    case CUSTOMS_DECLARATION_FOR_TIR_CARNET_GOODS = '587';

    /**
     * Customs declaration with commercial and item detail (914)
     *
     * CUSDEC transmission that includes data from both the commercial detail and
     * item detail sections of the message.
     */
    case CUSTOMS_DECLARATION_WITH_COMMERCIAL_AND_ITEM_DETAIL = '914';

    /**
     * Customs declaration without commercial detail (913)
     *
     * CUSDEC transmission that does not include data from the commercial detail
     * section of the message.
     */
    case CUSTOMS_DECLARATION_WITHOUT_COMMERCIAL_DETAIL = '913';

    /**
     * Customs declaration without item detail (915)
     *
     * CUSDEC transmission that does not include data from the item detail section
     * of the message.
     */
    case CUSTOMS_DECLARATION_WITHOUT_ITEM_DETAIL = '915';

    /**
     * Customs delivery note (932)
     *
     * Document/message whereby a Customs authority releases goods under its
     * control to be placed at the disposal of the party concerned. Synonym:
     * Customs release note.
     */
    case CUSTOMS_DELIVERY_NOTE = '932';

    /**
     * Customs documents expiration notice (133)
     *
     * Notice specifying expiration of Customs documents relating to cargo or
     * items of transport equipment.
     */
    case CUSTOMS_DOCUMENTS_EXPIRATION_NOTICE = '133';

    /**
     * Customs immediate release declaration (931)
     *
     * Document/message issued by an importer notifying Customs that goods have
     * been removed from an importing means of transport to the importer's
     * premises under a Customs-approved arrangement for immediate release, or
     * requesting authorization to do so.
     */
    case CUSTOMS_IMMEDIATE_RELEASE_DECLARATION = '931';

    /**
     * Customs invoice (935)
     *
     * Document/message required by the Customs in an importing country in which
     * an exporter states the invoice or other price (e.g. selling price, price of
     * identical goods), and specifies costs for freight, insurance and packing,
     * etc., terms of delivery and payment, for the purpose of determining the
     * Customs value in the importing country of goods consigned to that country.
     */
    case CUSTOMS_INVOICE = '935';

    /**
     * Customs manifest (85)
     *
     * Message/document identifying a customs manifest. The document itemises a
     * list of cargo prepared by shipping companies from bills of landing and
     * presented to customs for formal report of cargo.
     */
    case CUSTOMS_MANIFEST = '85';

    /**
     * Customs summary declaration with commercial detail, alternate (337)
     *
     * Alternate Customs declaration summary with commercial transaction details.
     */
    case CUSTOMS_SUMMARY_DECLARATION_WITH_COMMERCIAL_DETAIL_ALTERNATE = '337';

    /**
     * Customs summary declaration without commercial detail, alternate (355)
     *
     * Alternate Customs declaration summary without any commercial transaction
     * details.
     */
    case CUSTOMS_SUMMARY_DECLARATION_WITHOUT_COMMERCIAL_DETAIL_ALTERNATE = '355';

    /**
     * Damage certification (49)
     *
     * Official certification that damages to the goods to be transported have
     * been discovered.
     */
    case DAMAGE_CERTIFICATION = '49';

    /**
     * Dangerous goods declaration (890)
     *
     * (1115) Document/message issued by a consignor in accordance with applicable
     * conventions or regulations, describing hazardous goods or materials for
     * transport purposes, and stating that the latter have been packed and
     * labelled in accordance with the provisions of the relevant conventions or
     * regulations.
     */
    case DANGEROUS_GOODS_DECLARATION = '890';

    /**
     * Dangerous goods list (298)
     *
     * Listing of all details of dangerous goods carried.
     */
    case DANGEROUS_GOODS_LIST = '298';

    /**
     * Dangerous Goods Notification for non-tanker vessel (523)
     *
     * Dangerous Goods Notification for a vessel carrying cargo other than bulk
     * liquid cargo.
     */
    case DANGEROUS_GOODS_NOTIFICATION_FOR_NONTANKER_VESSEL = '523';

    /**
     * Dangerous Goods Notification for Tanker vessel (522)
     *
     * Dangerous Goods Notification for a vessel carrying liquid cargo in bulk.
     */
    case DANGEROUS_GOODS_NOTIFICATION_FOR_TANKER_VESSEL = '522';

    /**
     * Data Plot Sheet (415)
     *
     * Document/Message providing technical description and information of the
     * crop production.
     */
    case DATA_PLOT_SHEET = '415';

    /**
     * Data protection regulations statement (868)
     *
     * Document specifying the terms of data protection regulations.
     */
    case DATA_PROTECTION_REGULATIONS_STATEMENT = '868';

    /**
     * Debit advice (456)
     *
     * Advice on a debit.
     */
    case DEBIT_ADVICE = '456';

    /**
     * Debit note (383)
     *
     * Document/message for providing debit information to the relevant party.
     */
    case DEBIT_NOTE = '383';

    /**
     * Debit note related to financial adjustments (84)
     *
     * Document/message for providing debit information related to financial
     * adjustments to the relevant party.
     */
    case DEBIT_NOTE_RELATED_TO_FINANCIAL_ADJUSTMENTS = '84';

    /**
     * Debit note related to goods or services (80)
     *
     * Debit information related to a transaction for goods or services to the
     * relevant party.
     */
    case DEBIT_NOTE_RELATED_TO_GOODS_OR_SERVICES = '80';

    /**
     * Declaration for radioactive material (654)
     *
     * A declaration to be presented to the competent authority when radioactive
     * material moves cross-border.
     */
    case DECLARATION_FOR_RADIOACTIVE_MATERIAL = '654';

    /**
     * Declaration of final beneficiary (813)
     *
     * Declaration document to identify the final beneficiary of an asset.
     */
    case DECLARATION_OF_FINAL_BENEFICIARY = '813';

    /**
     * Declaration of origin (862)
     *
     * Appropriate statement as to the origin of the goods, made in connection
     * with their exportation by the manufacturer, producer, supplier, exporter or
     * other competent person on the Commercial invoice or any other document
     * relating to the goods (CCC).
     */
    case DECLARATION_OF_ORIGIN = '862';

    /**
     * Declaration regarding the inward and outward movement of vessel (349)
     *
     * Document to declare inward and outward movement of a vessel.
     */
    case DECLARATION_REGARDING_THE_INWARD_AND_OUTWARD_MOVEMENT_OF_VESSEL = '349';

    /**
     * Delcredere credit note (308)
     *
     * A credit note sent to the party paying on behalf of a number of buyers.
     */
    case DELCREDERE_CREDIT_NOTE = '308';

    /**
     * Delcredere invoice (390)
     *
     * An invoice sent to the party paying for a number of buyers.
     */
    case DELCREDERE_INVOICE = '390';

    /**
     * Delivery forecast (236)
     *
     * A message which enables the transmission of delivery or product forecasting
     * requirements.
     */
    case DELIVERY_FORECAST = '236';

    /**
     * Delivery instructions (240)
     *
     * (1174) Document/message giving instruction regarding the delivery of goods.
     */
    case DELIVERY_INSTRUCTIONS = '240';

    /**
     * Delivery just-in-time (242)
     *
     * Usage of DELJIT-message.
     */
    case DELIVERY_JUSTINTIME = '242';

    /**
     * Delivery note (270)
     *
     * Paper document attached to a consignment informing the receiving party
     * about contents of this consignment.
     */
    case DELIVERY_NOTE = '270';

    /**
     * Delivery notice (goods) (784)
     *
     * Notification in writing, sent by the carrier to the sender, to inform him
     * at his request of the actual date of delivery of the goods.
     */
    case DELIVERY_NOTICE_GOODS = '784';

    /**
     * Delivery notice (rail transport) (746)
     *
     * Document/message created by the consignor or by the departure station,
     * joined to the transport or sent to the consignee, giving the possibility to
     * the consignee or the arrival station to attest the delivery of the goods.
     * The document must be returned to the consignor or to the departure station.
     */
    case DELIVERY_NOTICE_RAIL_TRANSPORT = '746';

    /**
     * Delivery order (640)
     *
     * Document/message issued by a party entitled to authorize the release of
     * goods specified therein to a named consignee, to be retained by the
     * custodian of the goods.
     */
    case DELIVERY_ORDER = '640';

    /**
     * Delivery point list. (440)
     *
     * A list of delivery point addresses.
     */
    case DELIVERY_POINT_LIST = '440';

    /**
     * Delivery quote (362)
     *
     * Document/message confirming delivery conditions under which goods are
     * offered.
     */
    case DELIVERY_QUOTE = '362';

    /**
     * Delivery release (245)
     *
     * Document/message issued by a buyer releasing the despatch of goods after
     * receipt of the Ready for despatch advice from the seller.
     */
    case DELIVERY_RELEASE = '245';

    /**
     * Delivery schedule (241)
     *
     * Usage of DELFOR-message.
     */
    case DELIVERY_SCHEDULE = '241';

    /**
     * Delivery schedule response (291)
     *
     * A message providing a response to a previously transmitted delivery
     * schedule.
     */
    case DELIVERY_SCHEDULE_RESPONSE = '291';

    /**
     * Delivery verification certificate (901)
     *
     * Document/message whereby an official authority (Customs or governmental)
     * certifies that goods have been delivered.
     */
    case DELIVERY_VERIFICATION_CERTIFICATE = '901';

    /**
     * Derat document (796)
     *
     * Document certifying that a ship is free of rats, valid to a specified date.
     */
    case DERAT_DOCUMENT = '796';

    /**
     * Deratting exemption certificate (488)
     *
     * Document certifying that the object was free of rats when inspected and
     * that it is exempt from a deratting statement.
     */
    case DERATTING_EXEMPTION_CERTIFICATE = '488';

    /**
     * Despatch advice (351)
     *
     * Document/message by means of which the seller or consignor informs the
     * consignee about the despatch of goods.
     */
    case DESPATCH_ADVICE = '351';

    /**
     * Despatch note (post parcels) (750)
     *
     * Document/message which, according to Article 106 of the "Agreement
     * concerning Postal Parcels" under the UPU convention, is to accompany post
     * parcels.
     */
    case DESPATCH_NOTE_POST_PARCELS = '750';

    /**
     * Despatch note model T (820)
     *
     * European community transit declaration.
     */
    case DESPATCH_NOTE_MODEL_T = '820';

    /**
     * Despatch note model T2L (825)
     *
     * Ascertainment that the declared goods were originally produced in an
     * European Union (EU) country. May only be used for goods that are loaded on
     * one single means of transport in one single departure point for one single
     * delivery point.
     */
    case DESPATCH_NOTE_MODEL_TL = '825';

    /**
     * Despatch order (350)
     *
     * Document/message issued by a supplier initiating the despatch of goods to a
     * buyer (consignee).
     */
    case DESPATCH_ORDER = '350';

    /**
     * Direct debit authorisation (838)
     *
     * Document giving the addressee the right to debit from an account of the
     * authorizing party.
     */
    case DIRECT_DEBIT_AUTHORISATION = '838';

    /**
     * Direct delivery (transport) (494)
     *
     * Document/message ordering the direct delivery of goods/consignment from one
     * means of transport into another means of transport in one movement.
     */
    case DIRECT_DELIVERY_TRANSPORT = '494';

    /**
     * Direct payment valuation (202)
     *
     * Document/message addressed, for instance, by a general contractor to the
     * owner, in order that a direct payment be made to a subcontractor.
     */
    case DIRECT_PAYMENT_VALUATION = '202';

    /**
     * Direct payment valuation request (201)
     *
     * Request to establish a direct payment valuation.
     */
    case DIRECT_PAYMENT_VALUATION_REQUEST = '201';

    /**
     * Document for establishing the Customs Status of goods for San Marino
     * (T2LSM) (586)
     *
     * Form establishing the Community status of goods ("T2L" under European
     * Legislation) in the context of trade between the EU and San Marino.
     * ("T2LSM" under EU Legislation).
     */
    case DOCUMENT_FOR_ESTABLISHING_THE_CUSTOMS_STATUS_OF_GOODS_FOR_SAN_MARINO_TLSM = '586';

    /**
     * Document response (Customs) (962)
     *
     * Document response message to permit the transfer of data from Customs to
     * the transmitter of the previous message.
     */
    case DOCUMENT_RESPONSE_CUSTOMS = '962';

    /**
     * Documentary credit (465)
     *
     * Document/message in which a bank states that it has issued a documentary
     * credit under which the beneficiary is to obtain payment, acceptance or
     * negotiation on compliance with certain terms and conditions and against
     * presentation of stipulated documents and such drafts as may be specified.
     * The credit may or may not be confirmed by another bank.
     */
    case DOCUMENTARY_CREDIT = '465';

    /**
     * Documentary credit acceptance advice (427)
     *
     * Document/message whereby a bank advises acceptance under a documentary
     * credit.
     */
    case DOCUMENTARY_CREDIT_ACCEPTANCE_ADVICE = '427';

    /**
     * Documentary credit amendment (469)
     *
     * Document/message whereby a bank notifies a beneficiary of the details of an
     * amendment to the terms and conditions of a documentary credit.
     */
    case DOCUMENTARY_CREDIT_AMENDMENT = '469';

    /**
     * Documentary credit amendment information (197)
     *
     * Documentary credit amendment information.
     */
    case DOCUMENTARY_CREDIT_AMENDMENT_INFORMATION = '197';

    /**
     * Documentary credit amendment notification (468)
     *
     * Document/message whereby a bank advises that the terms and conditions of a
     * documentary credit have been amended.
     */
    case DOCUMENTARY_CREDIT_AMENDMENT_NOTIFICATION = '468';

    /**
     * Documentary credit application (460)
     *
     * Document/message whereby a bank is requested to issue a documentary credit
     * on the conditions specified therein.
     */
    case DOCUMENTARY_CREDIT_APPLICATION = '460';

    /**
     * Documentary credit collection instruction (195)
     *
     * Instruction for the collection of the documentary credit.
     */
    case DOCUMENTARY_CREDIT_COLLECTION_INSTRUCTION = '195';

    /**
     * Documentary credit issuance information (200)
     *
     * Provides information on documentary credit issuance.
     */
    case DOCUMENTARY_CREDIT_ISSUANCE_INFORMATION = '200';

    /**
     * Documentary credit letter of indemnity (431)
     *
     * Document/message in which a beneficiary of a documentary credit accepts
     * responsibility for non-compliance with the terms and conditions of the
     * credit, and undertakes to refund the money received under the credit, with
     * interest and charges accrued.
     */
    case DOCUMENTARY_CREDIT_LETTER_OF_INDEMNITY = '431';

    /**
     * Documentary credit negotiation advice (428)
     *
     * Document/message whereby a bank advises negotiation under a documentary
     * credit.
     */
    case DOCUMENTARY_CREDIT_NEGOTIATION_ADVICE = '428';

    /**
     * Documentary credit notification (466)
     *
     * Document/message issued by an advising bank in order to transmit a
     * documentary credit to a beneficiary, or to another advising bank.
     */
    case DOCUMENTARY_CREDIT_NOTIFICATION = '466';

    /**
     * Documentary credit payment advice (426)
     *
     * Document/message whereby a bank advises payment under a documentary credit.
     */
    case DOCUMENTARY_CREDIT_PAYMENT_ADVICE = '426';

    /**
     * Documentary credit transfer advice (467)
     *
     * Document/message whereby a bank advises that (part of) a documentary credit
     * is being or has been transferred in favour of a second beneficiary.
     */
    case DOCUMENTARY_CREDIT_TRANSFER_ADVICE = '467';

    /**
     * Documents presentation form (448)
     *
     * Document/message whereby a draft or similar instrument and/or commercial
     * documents are presented to a bank for acceptance, discounting, negotiation,
     * payment or collection, whether or not against a documentary credit.
     */
    case DOCUMENTS_PRESENTATION_FORM = '448';

    /**
     * Draft bill of quantity (194)
     *
     * Document/message providing a draft bill of quantity, issued in an unpriced
     * form.
     */
    case DRAFT_BILL_OF_QUANTITY = '194';

    /**
     * Drawing (174)
     *
     * The document or message is a drawing.
     */
    case DRAWING = '174';

    /**
     * Driving licence (international) (41)
     *
     * An official document giving a native of one country permission to drive a
     * vehicle in certain other countries.
     */
    case DRIVING_LICENCE_INTERNATIONAL = '41';

    /**
     * Driving licence (national) (40)
     *
     * An official document giving permission to drive a vehicle in a given
     * country.
     */
    case DRIVING_LICENCE_NATIONAL = '40';

    /**
     * Drug shelf life study report (647)
     *
     * A document containing results from the study which determines the shelf
     * life, namely the time period of storage at a specified condition within
     * which a drug substance or drug product still meets its established
     * specifications; its identity, strength, quality and purity.
     */
    case DRUG_SHELF_LIFE_STUDY_REPORT = '647';

    /**
     * Duty suspended goods (974)
     *
     * Document giving details for the carriage of excisable goods on a
     * duty-suspended basis.
     */
    case DUTY_SUSPENDED_GOODS = '974';

    /**
     * EC carnet (953)
     *
     * EC customs transit document issued by EC customs authorities for transit
     * and/or temporary user of goods within the EC.
     */
    case EC_CARNET = '953';

    /**
     * EDI associated object administration message (344)
     *
     * A message giving additional information about the exchange of an EDI
     * associated object.
     */
    case EDI_ASSOCIATED_OBJECT_ADMINISTRATION_MESSAGE = '344';

    /**
     * Embargo permit (941)
     *
     * Document/message giving the permission to export specified goods.
     */
    case EMBARGO_PERMIT = '941';

    /**
     * Empty container bill (708)
     *
     * Bill of lading indicating an empty container.
     */
    case EMPTY_CONTAINER_BILL = '708';

    /**
     * Empty container disposition order (144)
     *
     * Order to make available empty containers.
     */
    case EMPTY_CONTAINER_DISPOSITION_ORDER = '144';

    /**
     * End use authorization (990)
     *
     * Document issued by Customs granting the end-use Customs procedure.
     */
    case END_USE_AUTHORIZATION = '990';

    /**
     * Enquiry (210)
     *
     * Document/message issued by a party interested in the purchase of goods
     * specified therein and indicating particular, desirable conditions regarding
     * delivery terms, etc., addressed to a prospective supplier with a view to
     * obtaining an offer.
     */
    case ENQUIRY = '210';

    /**
     * Error response (Customs) (963)
     *
     * Error response message to permit the transfer of data from Customs to the
     * transmitter of the previous message.
     */
    case ERROR_RESPONSE_CUSTOMS = '963';

    /**
     * Escort official recognition (723)
     *
     * Document/message which gives right to the owner to exert all functions
     * normally transferred to a guard in a train by which an escorted consignment
     * is transported.
     */
    case ESCORT_OFFICIAL_RECOGNITION = '723';

    /**
     * Estimated priced bill of quantity (193)
     *
     * An estimate based upon a detailed, quantity based specification (bill of
     * quantity).
     */
    case ESTIMATED_PRICED_BILL_OF_QUANTITY = '193';

    /**
     * EU Customs declaration for External Community Transit (T1) (578)
     *
     * Customs declaration for goods under the external Community/common transit
     * procedure. This applies to "non-Community goods" ("T1" under EU legislation
     * and EC-EFTA "Transit Convention").
     */
    case EU_CUSTOMS_DECLARATION_FOR_EXTERNAL_COMMUNITY_TRANSIT_T = '578';

    /**
     * EU Customs declaration for internal Community Transit (T2) (579)
     *
     * Customs declaration for goods under the internal Community/common transit
     * procedure. This applies to "Community goods" ("T2" under EU legislation and
     * EC-EFTA "Transit Convention").
     */
    case EU_CUSTOMS_DECLARATION_FOR_INTERNAL_COMMUNITY_TRANSIT_T = '579';

    /**
     * EU Customs declaration for internal transit to San Marino (T2SM) (582)
     *
     * Customs declaration for goods under the internal Community transit
     * procedure between the Community and San Marino. ("T2SM" under EU
     * Legislation).
     */
    case EU_CUSTOMS_DECLARATION_FOR_INTERNAL_TRANSIT_TO_SAN_MARINO_TSM = '582';

    /**
     * EU Customs declaration for mixed consignments (T) (583)
     *
     * Customs declaration for goods under the Community/common transit procedure
     * for mixed consignments (i.e. consignments that comprise goods of different
     * statuses, like "T1" and "T2") ("T" under EU Legislation).
     */
    case EU_CUSTOMS_DECLARATION_FOR_MIXED_CONSIGNMENTS_T = '583';

    /**
     * EU Customs declaration for non-fiscal area internal Community Transit (T2F) (581)
     *
     * Declaration for goods under the internal Community transit procedure in the
     * context of trade between the "VAT" territory of EU Member States and EU
     * territories where the VAT rules do not apply, such as Canary islands, some
     * French overseas territories, the Channel islands and the Aaland islands,
     * and between those territories. ("T2F" under EU Legislation).
     */
    case EU_CUSTOMS_DECLARATION_FOR_NONFISCAL_AREA_INTERNAL_COMMUNITY_TRANSIT_TF = '581';

    /**
     * EU Document for establishing the Community status of goods (T2L) (584)
     *
     * Form establishing the Community status of goods ("T2L" under EU
     * Legislation).
     */
    case EU_DOCUMENT_FOR_ESTABLISHING_THE_COMMUNITY_STATUS_OF_GOODS_TL = '584';

    /**
     * EU Document for establishing the Community status of goods for certain
     * fiscal purposes (T2LF) (585)
     *
     * Form establishing the Community status of goods in the context of trade
     * between the "VAT" territory of EU Member States and EU territories where
     * the VAT rules do not apply, such as Canary islands, some French overseas
     * territories, the Channel islands and the Aaland islands, and between those
     * territories ("T2LF" under EU Legislation).
     */
    case EU_DOCUMENT_FOR_ESTABLISHING_THE_COMMUNITY_STATUS_OF_GOODS_FOR_CERTAIN_FISCAL_PURPOSES_TLF = '585';

    /**
     * EUR 1 certificate of origin (954)
     *
     * Customs certificate used in preferential goods interchanges between EC
     * countries and EC external countries.
     */
    case EUR__CERTIFICATE_OF_ORIGIN = '954';

    /**
     * European Single Procurement Document (759)
     *
     * A document/message containing a self-declaration by the supplier, providing
     * preliminary evidence during the tendering phase.
     */
    case EUROPEAN_SINGLE_PROCUREMENT_DOCUMENT = '759';

    /**
     * European Single Procurement Document request (756)
     *
     * A document/message requesting a self-declaration from the supplier,
     * providing preliminary evidence during the tendering phase.
     */
    case EUROPEAN_SINGLE_PROCUREMENT_DOCUMENT_REQUEST = '756';

    /**
     * Exceptional order (400)
     *
     * An order which falls outside the framework of an agreement.
     */
    case EXCEPTIONAL_ORDER = '400';

    /**
     * Exchange control declaration (import) (927)
     *
     * Document/message completed by an importer/buyer as a means for the
     * competent body to control that a trade transaction for which foreign
     * exchange has been allocated has been executed and that money has been
     * transferred in accordance with the conditions of payment and the exchange
     * control regulations in force.
     */
    case EXCHANGE_CONTROL_DECLARATION_IMPORT = '927';

    /**
     * Exchange control declaration, export (812)
     *
     * Document/message completed by an exporter/seller as a means whereby the
     * competent body may control that the amount of foreign exchange accrued from
     * a trade transaction is repatriated in accordance with the conditions of
     * payment and exchange control regulations in force.
     */
    case EXCHANGE_CONTROL_DECLARATION_EXPORT = '812';

    /**
     * Excise certificate (100)
     *
     * Certificate asserting that the goods have been submitted to the excise
     * authorities before departure from the exporting country or before delivery
     * in case of import traffic.
     */
    case EXCISE_CERTIFICATE = '100';

    /**
     * Exclusive brokerage mandate (869)
     *
     * Document expressing the mandate of a client for a service only by the
     * mandated broker.
     */
    case EXCLUSIVE_BROKERAGE_MANDATE = '869';

    /**
     * Export licence (811)
     *
     * Permit issued by a government authority permitting exportation of a
     * specified commodity subject to specified conditions as quantity, country of
     * destination, etc. Synonym: Embargo permit.
     */
    case EXPORT_LICENCE = '811';

    /**
     * Export licence, application for (810)
     *
     * Application for a permit issued by a government authority permitting
     * exportation of a specified commodity subject to specified conditions as
     * quantity, country of destination, etc.
     */
    case EXPORT_LICENCE_APPLICATION_FOR = '810';

    /**
     * Export price certificate (645)
     *
     * A certification executed by the competent authority from country of
     * exportation stating the export price of the goods.
     */
    case EXPORT_PRICE_CERTIFICATE = '645';

    /**
     * Extended credit advice (455)
     *
     * Document/message sent by an account servicing institution to one of its
     * account owners, to inform the account owner of an entry that has been or
     * will be credited to its account for a specified amount on the date
     * indicated. It provides extended commercial information concerning the
     * relevant remittance advice.
     */
    case EXTENDED_CREDIT_ADVICE = '455';

    /**
     * Extended payment order (451)
     *
     * Document/message containing information needed to initiate the payment. It
     * may cover the financial settlement for several commercial trade
     * transactions, which it is possible to specify in a special payments detail
     * part. It is an instruction to the ordered bank to arrange for the payment
     * of one specified amount to the beneficiary.
     */
    case EXTENDED_PAYMENT_ORDER = '451';

    /**
     * Extra-Community trade statistical declaration (47)
     *
     * Document/message in which a declarant provides information about
     * extra-Community trade of goods required by the body responsible for the
     * collection of trade statistics. Trade by a country in the European Union
     * with a country outside the European Union.
     */
    case EXTRACOMMUNITY_TRADE_STATISTICAL_DECLARATION = '47';

    /**
     * Factored credit note (396)
     *
     * Credit note related to assigned invoice(s).
     */
    case FACTORED_CREDIT_NOTE = '396';

    /**
     * Factored invoice (393)
     *
     * Invoice assigned to a third party for collection.
     */
    case FACTORED_INVOICE = '393';

    /**
     * Farmyard manure analysis (417)
     *
     * Farmyard manure analysis document.
     */
    case FARMYARD_MANURE_ANALYSIS = '417';

    /**
     * Federal label approval (11)
     *
     * A pre-approved document relating to federal label approval requirements.
     */
    case FEDERAL_LABEL_APPROVAL = '11';

    /**
     * Final construction invoice (877)
     *
     * Invoice concluding all previous partial invoices and partial final
     * construction invoices in the context of a specific construction project.
     */
    case FINAL_CONSTRUCTION_INVOICE = '877';

    /**
     * Final payment request based on completion of work (218)
     *
     * The final payment request of a series of payment requests submitted upon
     * completion of all the work.
     */
    case FINAL_PAYMENT_REQUEST_BASED_ON_COMPLETION_OF_WORK = '218';

    /**
     * First sample test report (8)
     *
     * Document/message describes the test report of the first sample.
     */
    case FIRST_SAMPLE_TEST_REPORT = '8';

    /**
     * Food grade certificate (637)
     *
     * A document that shows that the product (food additive, detergent,
     * disinfectant and sanitizer) is suitable to be used in the food industry.
     */
    case FOOD_GRADE_CERTIFICATE = '637';

    /**
     * Food packaging contact certificate (643)
     *
     * A document legalized from a competent authority that shows that the food
     * packaging product is safe to come into contact with food.
     */
    case FOOD_PACKAGING_CONTACT_CERTIFICATE = '643';

    /**
     * Foreign exchange permit (926)
     *
     * Document/message issued by the competent body authorizing an importer/buyer
     * to transfer an amount of foreign exchange to an exporter/seller in payment
     * for goods.
     */
    case FOREIGN_EXCHANGE_PERMIT = '926';

    /**
     * Forwarder's advice to exporter (622)
     *
     * Document/message issued by a freight forwarder informing an exporter of the
     * action taken in fulfillment of instructions received.
     */
    case FORWARDERS_ADVICE_TO_EXPORTER = '622';

    /**
     * Forwarder's advice to import agent (621)
     *
     * Document/message issued by a freight forwarder in an exporting country
     * advising his counterpart in an importing country about the forwarding of
     * goods described therein.
     */
    case FORWARDERS_ADVICE_TO_IMPORT_AGENT = '621';

    /**
     * Forwarder's bill of lading (716)
     *
     * Non-negotiable document issued by a freight forwarder evidencing a contract
     * for the carriage of goods by sea and the taking over or loading of the
     * goods by the freight forwarder, and by which the freight forwarder
     * undertakes to deliver the goods to the consignee named in the document.
     */
    case FORWARDERS_BILL_OF_LADING = '716';

    /**
     * Forwarder's certificate of receipt (624)
     *
     * Non-negotiable document issued by a forwarder to certify that he has
     * assumed control of a specified consignment, with irrevocable instructions
     * to send it to the consignee indicated in the document or to hold it at his
     * disposal. E.g. FIATA-FCR.
     */
    case FORWARDERS_CERTIFICATE_OF_RECEIPT = '624';

    /**
     * Forwarder's certificate of transport (763)
     *
     * Negotiable document/message issued by a forwarder to certify that he has
     * taken charge of a specified consignment for despatch and delivery in
     * accordance with the consignor's instructions, as indicated in the document,
     * and that he accepts responsibility for delivery of the goods to the holder
     * of the document through the intermediary of a delivery agent of his choice.
     * E.g. FIATA-FCT.
     */
    case FORWARDERS_CERTIFICATE_OF_TRANSPORT = '763';

    /**
     * Forwarder's invoice (623)
     *
     * Invoice issued by a freight forwarder specifying services rendered and
     * costs incurred and claiming payment therefore.
     */
    case FORWARDERS_INVOICE = '623';

    /**
     * Forwarder's warehouse receipt (631)
     *
     * Document/message issued by a forwarder acting as Warehouse Keeper
     * acknowledging receipt of goods placed in a warehouse, and stating or
     * referring to the conditions which govern the warehousing and the release of
     * goods. The document contains detailed provisions regarding the rights of
     * holders-by-endorsement, transfer of ownership, etc. E.g. FIATA-FWR.
     */
    case FORWARDERS_WAREHOUSE_RECEIPT = '631';

    /**
     * Forwarder’s credit note (532)
     *
     * Document/message for providing credit information to the relevant party.
     */
    case FORWARDERS_CREDIT_NOTE = '532';

    /**
     * Forwarder’s invoice discrepancy report (553)
     *
     * Document/message reporting invoice discrepancies indentified by the
     * forwarder.
     */
    case FORWARDERS_INVOICE_DISCREPANCY_REPORT = '553';

    /**
     * Forwarding instructions (610)
     *
     * Document/message issued to a freight forwarder, giving instructions
     * regarding the action to be taken by the forwarder for the forwarding of
     * goods described therein.
     */
    case FORWARDING_INSTRUCTIONS = '610';

    /**
     * Framework Agreement (539)
     *
     * An agreement between one or more contracting authorities and one or more
     * economic operators, the purpose of which is to establish the terms
     * governing contracts to be awarded during a given period, in particular with
     * regard to price and, where appropriate, the quantity envisaged.
     */
    case FRAMEWORK_AGREEMENT = '539';

    /**
     * Free pass (42)
     *
     * A document giving free access to a service.
     */
    case FREE_PASS = '42';

    /**
     * Free Sale Certificate in the Country of Origin (627)
     *
     * A certificate confirming that a specified product is free for sale in the
     * country of origin.
     */
    case FREE_SALE_CERTIFICATE_IN_THE_COUNTRY_OF_ORIGIN = '627';

    /**
     * Freight invoice (780)
     *
     * Document/message issued by a transport operation specifying freight costs
     * and charges incurred for a transport operation and stating conditions of
     * payment.
     */
    case FREIGHT_INVOICE = '780';

    /**
     * Freight manifest (786)
     *
     * Document/message containing the same information as a cargo manifest, and
     * additional details on freight amounts, charges, etc.
     */
    case FREIGHT_MANIFEST = '786';

    /**
     * Fumigation certificate (267)
     *
     * Certificate attesting that fumigation has been performed.
     */
    case FUMIGATION_CERTIFICATE = '267';

    /**
     * Gate pass (655)
     *
     * Document/message authorizing goods specified therein to be brought out of a
     * fenced-in port or terminal area.
     */
    case GATE_PASS = '655';

    /**
     * General cargo summary manifest report (87)
     *
     * A document code to indicate that the message being transmitted is summary
     * manifest information for general cargo.
     */
    case GENERAL_CARGO_SUMMARY_MANIFEST_REPORT = '87';

    /**
     * General message (719)
     *
     * Document/message providing agreed textual information.
     */
    case GENERAL_MESSAGE = '719';

    /**
     * General response (Customs) (961)
     *
     * General response message to permit the transfer of data from Customs to the
     * transmitter of the previous message.
     */
    case GENERAL_RESPONSE_CUSTOMS = '961';

    /**
     * General terms and conditions (774)
     *
     * Document specifying general terms and conditions.
     */
    case GENERAL_TERMS_AND_CONDITIONS = '774';

    /**
     * Good Manufacturing Practice (GMP) Certificate (538)
     *
     * Certificate that guarantees quality manufacturing and processing of food
     * products, medications, cosmetics, etc.
     */
    case GOOD_MANUFACTURING_PRACTICE_GMP_CERTIFICATE = '538';

    /**
     * Goods control certificate (841)
     *
     * Document/message issued by a competent body evidencing the quality of the
     * goods described therein, in accordance with national or international
     * standards, or conforming to legislation in the importing country, or as
     * specified in the contract.
     */
    case GOODS_CONTROL_CERTIFICATE = '841';

    /**
     * Goods declaration for Customs transit (950)
     *
     * Document/message by which the sender declares goods for Customs transit
     * according to Annex E.1 (concerning Customs transit) to the Kyoto convention
     * (CCC).
     */
    case GOODS_DECLARATION_FOR_CUSTOMS_TRANSIT = '950';

    /**
     * Goods declaration for exportation (830)
     *
     * Document/message by which goods are declared for export Customs clearance,
     * conforming to the layout key set out at Appendix I to Annex C.1 concerning
     * outright exportation to the Kyoto convention (CCC). Within a Customs union,
     * "for despatch" may have the same meaning as "for exportation".
     */
    case GOODS_DECLARATION_FOR_EXPORTATION = '830';

    /**
     * Goods declaration for home use (930)
     *
     * Document/message by which goods are declared for import Customs clearance
     * according to Annex B.1 (concerning clearance for home use) to the Kyoto
     * convention (CCC).
     */
    case GOODS_DECLARATION_FOR_HOME_USE = '930';

    /**
     * Goods declaration for importation (929)
     *
     * Document/message by which goods are declared for import Customs clearance
     * [sister entry of 830].
     */
    case GOODS_DECLARATION_FOR_IMPORTATION = '929';

    /**
     * Goods receipt (632)
     *
     * Document/message to acknowledge the receipt of goods and in addition may
     * indicate receiving conditions.
     */
    case GOODS_RECEIPT = '632';

    /**
     * Goods receipt, carriage (702)
     *
     * Document/message issued by a carrier or a carrier's agent, acknowledging
     * receipt for carriage of goods specified therein on conditions stated or
     * referred to in the document, enabling the carrier to issue a transport
     * document.
     */
    case GOODS_RECEIPT_CARRIAGE = '702';

    /**
     * Government contract (991)
     *
     * Document/message describing a contract with a government authority.
     */
    case GOVERNMENT_CONTRACT = '991';

    /**
     * Grant (151)
     *
     * A document indicating the granting of funds.
     */
    case GRANT = '151';

    /**
     * Group insurance rules (778)
     *
     * Document stating the rules of a group insurance contract.
     */
    case GROUP_INSURANCE_RULES = '778';

    /**
     * Group pension commitment information (816)
     *
     * Information document for the group pension commitment to an individual
     * person.
     */
    case GROUP_PENSION_COMMITMENT_INFORMATION = '816';

    /**
     * Guarantee of cost acceptance (826)
     *
     * Document certifying the guarantee of the document issuer that he will pay
     * for costs of the addressee, e.g. the costs for repairing a vehicle.
     */
    case GUARANTEE_OF_COST_ACCEPTANCE = '826';

    /**
     * Halal Slaughtering Certificate (589)
     *
     * A certificate verifying that meat has been produced from slaughter in
     * accordance with Islamic laws and practices.
     */
    case HALAL_SLAUGHTERING_CERTIFICATE = '589';

    /**
     * Handling order (650)
     *
     * Document/message issued by a cargo handling organization (port
     * administration, terminal operator, etc.) for the removal or other handling
     * of goods under their care.
     */
    case HANDLING_ORDER = '650';

    /**
     * Health certificate (636)
     *
     * A document legalized from a competent authority that shows that the product
     * has been tested microbiologically and is free from any pathogens and fit
     * for human consumption and/or declares that the product is in compliance
     * with sanitary and phytosanitary measures.
     */
    case HEALTH_CERTIFICATE = '636';

    /**
     * Healthcare discharge report, final (309)
     *
     * Final discharge report by healthcare provider.
     */
    case HEALTHCARE_DISCHARGE_REPORT_FINAL = '309';

    /**
     * Healthcare discharge report, preliminary (358)
     *
     * Preliminary discharge report by healthcare provider.
     */
    case HEALTHCARE_DISCHARGE_REPORT_PRELIMINARY = '358';

    /**
     * Heat Treatment Certificate (625)
     *
     * A certificate verifying the heat treatment of the product is in conformance
     * with international standards to ensure the product’s healthiness and/or
     * shows the mode of heat treatment indicating the temperature and the amount
     * of time the product or raw material used in the product was treated (such
     * as milk).
     */
    case HEAT_TREATMENT_CERTIFICATE = '625';

    /**
     * Hire invoice (387)
     *
     * Document/message for invoicing the hiring of human resources or renting
     * goods or equipment.
     */
    case HIRE_INVOICE = '387';

    /**
     * Hire order (232)
     *
     * Document/message for hiring human resources or renting goods or equipment.
     */
    case HIRE_ORDER = '232';

    /**
     * Horsemeat sanitary certificate (92)
     *
     * Document or message issued by the competent authority in the exporting
     * country evidencing that horsemeat products comply with the requirements set
     * by the importing country.
     */
    case HORSEMEAT_SANITARY_CERTIFICATE = '92';

    /**
     * House bill of lading (714)
     *
     * The bill of lading issued not by the carrier but by the freight
     * forwarder/consolidator known by the carrier.
     */
    case HOUSE_BILL_OF_LADING = '714';

    /**
     * House waybill (703)
     *
     * The document made out by an agent/consolidator which evidences the contract
     * between the shipper and the agent/consolidator for the arrangement of
     * carriage of goods.
     */
    case HOUSE_WAYBILL = '703';

    /**
     * Identification match (449)
     *
     * Message related to conducting a search for an identification match.
     */
    case IDENTIFICATION_MATCH = '449';

    /**
     * Identity card (36)
     *
     * Official document to identify a person.
     */
    case IDENTITY_CARD = '36';

    /**
     * Image (858)
     *
     * Document consisting of an image.
     */
    case IMAGE = '858';

    /**
     * Impending arrival (96)
     *
     * Notification of impending arrival details for vessel.
     */
    case IMPENDING_ARRIVAL = '96';

    /**
     * Implementation guideline (302)
     *
     * A document specifying the criterion and format for exchanging information
     * in an electronic data interchange syntax.
     */
    case IMPLEMENTATION_GUIDELINE = '302';

    /**
     * Import licence (911)
     *
     * Document/message issued by the competent body in accordance with import
     * regulations in force, by which authorization is granted to a named party to
     * import either a limited quantity of designated articles or an unlimited
     * quantity of such articles during a limited period, under conditions
     * specified in the document.
     */
    case IMPORT_LICENCE = '911';

    /**
     * Import licence, application for (910)
     *
     * Document/message in which an interested party applies to the competent body
     * for authorization to import either a limited quantity of articles subject
     * to import restrictions, or an unlimited quantity of such articles during a
     * limited period, and specifies the kind of articles, their origin and value,
     * etc.
     */
    case IMPORT_LICENCE_APPLICATION_FOR = '910';

    /**
     * Indefinite delivery definite quantity contract (153)
     *
     * A document indicating a contract calling for indefinite deliveries of
     * definite quantities.
     */
    case INDEFINITE_DELIVERY_DEFINITE_QUANTITY_CONTRACT = '153';

    /**
     * Indefinite delivery indefinite quantity contract (152)
     *
     * A document indicating a contract calling for the indefinite deliveries of
     * indefinite quantities of goods.
     */
    case INDEFINITE_DELIVERY_INDEFINITE_QUANTITY_CONTRACT = '152';

    /**
     * Industry superannuation contributions advice (27)
     *
     * Document/message providing contributions advice used for superannuation
     * schemes which are industry wide.
     */
    case INDUSTRY_SUPERANNUATION_CONTRIBUTIONS_ADVICE = '27';

    /**
     * Industry superannuation member maintenance message (29)
     *
     * Member maintenance message used for industry wide superannuation schemes.
     */
    case INDUSTRY_SUPERANNUATION_MEMBER_MAINTENANCE_MESSAGE = '29';

    /**
     * Inedible sanitary certificate (95)
     *
     * Document or message issued by the competent authority in the exporting
     * country evidencing that inedible products comply with the requirements set
     * by the importing country.
     */
    case INEDIBLE_SANITARY_CERTIFICATE = '95';

    /**
     * Infrastructure condition (413)
     *
     * Information about components in an infrastructure.
     */
    case INFRASTRUCTURE_CONDITION = '413';

    /**
     * Inland waterway bill of lading (711)
     *
     * Negotiable transport document made out to a named person, to order or to
     * bearer, signed by the carrier and handed to the sender after receipt of the
     * goods.
     */
    case INLAND_WATERWAY_BILL_OF_LADING = '711';

    /**
     * Inquiry (251)
     *
     * This is a request for information.
     */
    case INQUIRY = '251';

    /**
     * Inquiry mandate (871)
     *
     * Document expressing the mandate of a client for an inquiry service by the
     * mandated provider.
     */
    case INQUIRY_MANDATE = '871';

    /**
     * Inspection certificate (856)
     *
     * Document/message issued by a competent body evidencing that the goods
     * described therein have been inspected in accordance with national or
     * international standards, in conformity with legislation in the country in
     * which the inspection is required, or as specified in the contract.
     */
    case INSPECTION_CERTIFICATE = '856';

    /**
     * Inspection report (293)
     *
     * A message informing a party of the results of an inspection.
     */
    case INSPECTION_REPORT = '293';

    /**
     * Inspection request (292)
     *
     * A message requesting a party to inspect items.
     */
    case INSPECTION_REQUEST = '292';

    /**
     * Instruction for returns (733)
     *
     * A message by which a party informs another party whether and how goods
     * shall be returned.
     */
    case INSTRUCTION_FOR_RETURNS = '733';

    /**
     * Instruction to collect (297)
     *
     * A message instructing a party to collect goods.
     */
    case INSTRUCTION_TO_COLLECT = '297';

    /**
     * Instructions for bank transfer (409)
     *
     * Document/message containing instructions from a customer to his bank to pay
     * an amount in a specified currency to a nominated party in another country
     * by a method either specified (e.g. teletransmission, air mail) or left to
     * the discretion of the bank.
     */
    case INSTRUCTIONS_FOR_BANK_TRANSFER = '409';

    /**
     * Insurance certificate (520)
     *
     * Document/message issued to the insured certifying that insurance has been
     * effected and that a policy has been issued. Such a certificate for a
     * particular cargo is primarily used when good are insured under the terms of
     * a floating or an open policy; at the request of the insured it can be
     * exchanged for a policy.
     */
    case INSURANCE_CERTIFICATE = '520';

    /**
     * Insurance declaration sheet (bordereau) (550)
     *
     * A document/message used when an insured reports to his insurer details of
     * individual shipments which are covered by an insurance contract - an open
     * cover or a floating policy - between the parties.
     */
    case INSURANCE_DECLARATION_SHEET_BORDEREAU = '550';

    /**
     * Insurance policy (530)
     *
     * Document/message issued by the insurer evidencing an agreement to insure
     * and containing the conditions of the agreement concluded whereby the
     * insurer undertakes for a specific fee to indemnify the insured for the
     * losses arising out of the perils and accidents specified in the contract.
     */
    case INSURANCE_POLICY = '530';

    /**
     * Insured party payment report (836)
     *
     * Report about payments done towards an insured party.
     */
    case INSURED_PARTY_PAYMENT_REPORT = '836';

    /**
     * Insured status report (815)
     *
     * Document reporting (e.g. annually) to the insured the actual details of an
     * insurance contract.
     */
    case INSURED_STATUS_REPORT = '815';

    /**
     * Insurer's invoice (575)
     *
     * Document/message issued by an insurer specifying the cost of an insurance
     * which has been effected and claiming payment therefore.
     */
    case INSURERS_INVOICE = '575';

    /**
     * Interim application for payment (211)
     *
     * Document/message containing a provisional assessment in support of a
     * request for payment for completed work for a construction contract.
     */
    case INTERIM_APPLICATION_FOR_PAYMENT = '211';

    /**
     * Interim International Ship Security Certificate (537)
     *
     * An interim certificate on ship security issued basis under the
     * International code for the Security of Ships and of Port facilities (ISPS
     * code).
     */
    case INTERIM_INTERNATIONAL_SHIP_SECURITY_CERTIFICATE = '537';

    /**
     * Intermediate handling cross docking despatch advice (464)
     *
     * Document by means of which the supplier or consignor informs the buyer,
     * consignee or the distribution centre about the despatch of products which
     * will be moved across a dock, de-consolidated and re-consolidated according
     * to final delivery location requirements.
     */
    case INTERMEDIATE_HANDLING_CROSS_DOCKING_DESPATCH_ADVICE = '464';

    /**
     * Intermediate handling cross docking order (402)
     *
     * An order requesting the supply of products which will be moved across a
     * dock, de-consolidated and re-consolidated according to the final delivery
     * location requirements.
     */
    case INTERMEDIATE_HANDLING_CROSS_DOCKING_ORDER = '402';

    /**
     * Internal transport order (150)
     *
     * Document/message giving instructions about the transport of goods within an
     * enterprise.
     */
    case INTERNAL_TRANSPORT_ORDER = '150';

    /**
     * International Ship Security Certificate (536)
     *
     * A certificate on ship security issued based on the International code for
     * the Security of Ships and of Port facilities (ISPS code).
     */
    case INTERNATIONAL_SHIP_SECURITY_CERTIFICATE = '536';

    /**
     * INTRASTAT declaration (896)
     *
     * Document/message in which a declarant provides information about goods
     * required by the body responsible for the collection of trade statistics.
     */
    case INTRASTAT_DECLARATION = '896';

    /**
     * Introductory letter (867)
     *
     * A letter of introduction attached to, or accompanying another document such
     * as an insurance policy.
     */
    case INTRODUCTORY_LETTER = '867';

    /**
     * Inventory adjustment status report (263)
     *
     * A message detailing statuses related to the adjustment of inventory.
     */
    case INVENTORY_ADJUSTMENT_STATUS_REPORT = '263';

    /**
     * Inventory movement advice (78)
     *
     * Advice of inventory movements.
     */
    case INVENTORY_MOVEMENT_ADVICE = '78';

    /**
     * Inventory report (35)
     *
     * A message specifying information relating to held inventories.
     */
    case INVENTORY_REPORT = '35';

    /**
     * Inventory status advice (79)
     *
     * Advice of stock on hand.
     */
    case INVENTORY_STATUS_ADVICE = '79';

    /**
     * Invitation to tender (755)
     *
     * A document/message used by a buyer to define the procurement procedure and
     * request specific suppliers to participate.
     */
    case INVITATION_TO_TENDER = '755';

    /**
     * Invoice information for accounting purposes (751)
     *
     * A document / message containing accounting related information such as
     * monetary summations, seller id and VAT information. This may not be a
     * complete invoice according to legal requirements. For instance the line
     * item information might be excluded.
     */
    case INVOICE_INFORMATION_FOR_ACCOUNTING_PURPOSES = '751';

    /**
     * Invoicing data sheet (130)
     *
     * Document/message issued within an enterprise containing data about goods
     * sold, to be used as the basis for the preparation of an invoice.
     */
    case INVOICING_DATA_SHEET = '130';

    /**
     * Items booked to a financial account report (338)
     *
     * A message reporting items which have been booked to a financial account.
     */
    case ITEMS_BOOKED_TO_A_FINANCIAL_ACCOUNT_REPORT = '338';

    /**
     * Kanban schedule (288)
     *
     * Message to describe a Kanban schedule.
     */
    case KANBAN_SCHEDULE = '288';

    /**
     * Lease invoice (394)
     *
     * Usage of INVOIC-message for goods in leasing contracts.
     */
    case LEASE_INVOICE = '394';

    /**
     * Lease order (223)
     *
     * Document/message for goods in leasing contracts.
     */
    case LEASE_ORDER = '223';

    /**
     * Legal action (848)
     *
     * Document specifying a legal action at court.
     */
    case LEGAL_ACTION = '848';

    /**
     * Legal statement of an account (54)
     *
     * A statement of an account containing the booked items as in the ledger of
     * the account servicing financial institution.
     */
    case LEGAL_STATEMENT_OF_AN_ACCOUNT = '54';

    /**
     * Letter of indemnity for non-surrender of bill of lading (715)
     *
     * Document/message issued by a commercial party or a bank of an insurance
     * company accepting responsibility to the beneficiary of the indemnity in
     * accordance with the terms thereof.
     */
    case LETTER_OF_INDEMNITY_FOR_NONSURRENDER_OF_BILL_OF_LADING = '715';

    /**
     * Letter of intent (215)
     *
     * Document/message by means of which a buyer informs a seller that the buyer
     * intends to enter into contractual negotiations.
     */
    case LETTER_OF_INTENT = '215';

    /**
     * Life insurance payroll deductions advice (30)
     *
     * Payroll deductions advice used in the life insurance industry.
     */
    case LIFE_INSURANCE_PAYROLL_DEDUCTIONS_ADVICE = '30';

    /**
     * Listing statement of an account (55)
     *
     * A statement from the account servicing financial institution containing
     * items pending to be booked.
     */
    case LISTING_STATEMENT_OF_AN_ACCOUNT = '55';

    /**
     * Loadline document (795)
     *
     * Document specifying the limit of a ship's legal submersion under various
     * conditions.
     */
    case LOADLINE_DOCUMENT = '795';

    /**
     * Loss statement (819)
     *
     * Document specifying the value of a loss.
     */
    case LOSS_STATEMENT = '819';

    /**
     * Low risk country formal letter (652)
     *
     * An official letter issued by an import authority granted to the importer of
     * goods from a low risk country which allows the importer to place its
     * products in the local market with certain favorable considerations.
     */
    case LOW_RISK_COUNTRY_FORMAL_LETTER = '652';

    /**
     * Low value payment order(s) (249)
     *
     * The message contains low value payment order(s) only.
     */
    case LOW_VALUE_PAYMENT_ORDERS = '249';

    /**
     * Make or buy plan (156)
     *
     * A document indicating a plan that identifies which items will be made and
     * which items will be bought.
     */
    case MAKE_OR_BUY_PLAN = '156';

    /**
     * Manufacturer raised consignment order (726)
     *
     * Document/message providing details of a consignment order which has been
     * raised by a manufacturer.
     */
    case MANUFACTURER_RAISED_CONSIGNMENT_ORDER = '726';

    /**
     * Manufacturer raised order (725)
     *
     * Document/message providing details of an order which has been raised by a
     * manufacturer.
     */
    case MANUFACTURER_RAISED_ORDER = '725';

    /**
     * Manufacturing instructions (110)
     *
     * Document/message issued within an enterprise to initiate the manufacture of
     * goods to be offered for sale.
     */
    case MANUFACTURING_INSTRUCTIONS = '110';

    /**
     * Manufacturing license (651)
     *
     * A license granted by a competent authority to a manufacturer for production
     * of specific products.
     */
    case MANUFACTURING_LICENSE = '651';

    /**
     * Manufacturing specification (167)
     *
     * A document indicating the specification of how an item is to be
     * manufactured.
     */
    case MANUFACTURING_SPECIFICATION = '167';

    /**
     * Maritime declaration of health (797)
     *
     * Document certifying the health condition on board a vessel, valid to a
     * specified date.
     */
    case MARITIME_DECLARATION_OF_HEALTH = '797';

    /**
     * Master air waybill (741)
     *
     * Document/message made out by or on behalf of the agent/consolidator which
     * evidences the contract between the agent/consolidator and carrier(s) for
     * carriage of goods over routes of the carrier(s) for a consignment
     * consisting of goods originated by more than one shipper (IATA).
     */
    case MASTER_AIR_WAYBILL = '741';

    /**
     * Master bill of lading (704)
     *
     * A bill of lading issued by the master of a vessel (in actuality the owner
     * or charterer of the vessel). It could cover a number of house bills.
     */
    case MASTER_BILL_OF_LADING = '704';

    /**
     * Mate's receipt (713)
     *
     * Document/message issued by a ship's officer to acknowledge that a specified
     * consignment has been received on board a vessel, and the apparent condition
     * of the goods; enabling the carrier to issue a Bill of lading.
     */
    case MATES_RECEIPT = '713';

    /**
     * Material inspection and receiving report (163)
     *
     * A report that is both an inspection report for materials and a receiving
     * document.
     */
    case MATERIAL_INSPECTION_AND_RECEIVING_REPORT = '163';

    /**
     * Means of transport advice (97)
     *
     * Message reporting the means of transport used to carry goods or cargo.
     */
    case MEANS_OF_TRANSPORT_ADVICE = '97';

    /**
     * Means of transportation availability information (403)
     *
     * Information giving the various availabilities of a means of transportation.
     */
    case MEANS_OF_TRANSPORTATION_AVAILABILITY_INFORMATION = '403';

    /**
     * Means of transportation schedule information (404)
     *
     * Information giving the various schedules of a means of transportation.
     */
    case MEANS_OF_TRANSPORTATION_SCHEDULE_INFORMATION = '404';

    /**
     * Meat and meat by-products sanitary certificate (89)
     *
     * Document or message issued by the competent authority in the exporting
     * country evidencing that meat or meat by-products comply with the
     * requirements set by the importing country.
     */
    case MEAT_AND_MEAT_BYPRODUCTS_SANITARY_CERTIFICATE = '89';

    /**
     * Meat food products sanitary certificate (90)
     *
     * Document or message issued by the competent authority in the exporting
     * country evidencing that meat food products comply with the requirements set
     * by the importing country.
     */
    case MEAT_FOOD_PRODUCTS_SANITARY_CERTIFICATE = '90';

    /**
     * Medical certificate (842)
     *
     * Document certifying a medical condition.
     */
    case MEDICAL_CERTIFICATE = '842';

    /**
     * Message in development request (281)
     *
     * Requesting a Message in Development (MiD).
     */
    case MESSAGE_IN_DEVELOPMENT_REQUEST = '281';

    /**
     * Metered services consumption report (742)
     *
     * Document/message providing metered consumption details.
     */
    case METERED_SERVICES_CONSUMPTION_REPORT = '742';

    /**
     * Metered services consumption report supporting an invoice (739)
     *
     * Document/message providing metered consumption details supporiting an
     * invoice.
     */
    case METERED_SERVICES_CONSUMPTION_REPORT_SUPPORTING_AN_INVOICE = '739';

    /**
     * Metered services invoice (82)
     *
     * Document/message claiming payment for the supply of metered services (e.g.,
     * gas, electricity, etc.) supplied to a fixed meter whose consumption is
     * measured over a period of time.
     */
    case METERED_SERVICES_INVOICE = '82';

    /**
     * Metering point information response (391)
     *
     * Response to a request for information about a metering point.
     */
    case METERING_POINT_INFORMATION_RESPONSE = '391';

    /**
     * Military Identification Card (528)
     *
     * The official document used for military personnel on travel orders,
     * substituting a passport.
     */
    case MILITARY_IDENTIFICATION_CARD = '528';

    /**
     * Mill certificate (12)
     *
     * Certificate certifying a specific quality of agricultural products.
     */
    case MILL_CERTIFICATE = '12';

    /**
     * Modification of existing message (282)
     *
     * Requesting a change to an existing message.
     */
    case MODIFICATION_OF_EXISTING_MESSAGE = '282';

    /**
     * Movement certificate A.TR.1 (18)
     *
     * Specific form of transit declaration issued by the exporter (movement
     * certificate).
     */
    case MOVEMENT_CERTIFICATE_ATR = '18';

    /**
     * Multidrop order (147)
     *
     * One purchase order that contains the orders of two or more vendors and the
     * associated delivery points for each.
     */
    case MULTIDROP_ORDER = '147';

    /**
     * Multimodal transport document (generic) (765)
     *
     * Document/message which evidences a multimodal transport contract, the
     * taking in charge of the goods by the multimodal transport operator, and an
     * undertaking by him to deliver the goods in accordance with the terms of the
     * contract. (International Convention on Multimodal Transport of Goods).
     */
    case MULTIMODAL_TRANSPORT_DOCUMENT_GENERIC = '765';

    /**
     * Multimodal/combined transport document (generic) (760)
     *
     * A transport document used when more than one mode of transportation is
     * involved in the movement of cargo. It is a contract of carriage and receipt
     * of the cargo for a multimodal transport. It indicates the place where the
     * responsible transport company in the move takes responsibility for the
     * cargo, the place where the responsibility of this transport company in the
     * move ends and the conveyances involved.
     */
    case MULTIMODALCOMBINED_TRANSPORT_DOCUMENT_GENERIC = '760';

    /**
     * Multiple direct debit (486)
     *
     * Document/message containing a direct debit to credit one or more accounts
     * and to debit one or more debtors.
     */
    case MULTIPLE_DIRECT_DEBIT = '486';

    /**
     * Multiple direct debit request (484)
     *
     * Document/message containing a direct debit request to credit one or more
     * accounts and to debit one or more debtors.
     */
    case MULTIPLE_DIRECT_DEBIT_REQUEST = '484';

    /**
     * Multiple payment order (452)
     *
     * Document/message containing a payment order to debit one or more accounts
     * and to credit one or more beneficiaries.
     */
    case MULTIPLE_PAYMENT_ORDER = '452';

    /**
     * Name/product plate (328)
     *
     * Plates on goods identifying and describing an article.
     */
    case NAMEPRODUCT_PLATE = '328';

    /**
     * NATO transit document (977)
     *
     * Customs transit document for the carriage of shipments of the NATO armed
     * forces under Customs supervision.
     */
    case NATO_TRANSIT_DOCUMENT = '977';

    /**
     * New code request (272)
     *
     * Requesting a new code.
     */
    case NEW_CODE_REQUEST = '272';

    /**
     * New message request (280)
     *
     * Request for a new message (NMR).
     */
    case NEW_MESSAGE_REQUEST = '280';

    /**
     * Non-negotiable maritime transport document (generic) (712)
     *
     * Non-negotiable document which evidences a contract for the carriage of
     * goods by sea and the taking over or loading of the goods by the carrier,
     * and by which the carrier undertakes to deliver the goods to the consignee
     * named in the document. E.g. Sea waybill. Remark: Synonymous with "straight"
     * or "non-negotiable Bill of lading" used in certain countries, e.g. Canada.
     */
    case NONNEGOTIABLE_MARITIME_TRANSPORT_DOCUMENT_GENERIC = '712';

    /**
     * Non-pre-authorised direct debit request(s) (244)
     *
     * The message contains non-pre-authorised direct debit request(s).
     */
    case NONPREAUTHORISED_DIRECT_DEBIT_REQUESTS = '244';

    /**
     * Non-pre-authorised direct debit(s) (238)
     *
     * The message contains non-pre-authorised direct debit(s).
     */
    case NONPREAUTHORISED_DIRECT_DEBITS = '238';

    /**
     * Notice of circumstances preventing delivery (goods) (782)
     *
     * Request made by the carrier to the sender, or, as the case may be, the
     * consignee, for instructions as to the disposal of the consignment when
     * circumstances prevent delivery and the return of the goods has not been
     * requested by the consignor in the transport document.
     */
    case NOTICE_OF_CIRCUMSTANCES_PREVENTING_DELIVERY_GOODS = '782';

    /**
     * Notice of circumstances preventing transport (goods) (783)
     *
     * Request made by the carrier to the sender, or, the consignee as the case
     * may be, for instructions as to the disposal of the goods when circumstances
     * prevent transport before departure or en route, after acceptance of the
     * consignment concerned.
     */
    case NOTICE_OF_CIRCUMSTANCES_PREVENTING_TRANSPORT_GOODS = '783';

    /**
     * Notice that circumstances prevent payment of delivered goods (453)
     *
     * Message used to inform a supplier that delivered goods cannot be paid due
     * to circumstances which prevent payment.
     */
    case NOTICE_THAT_CIRCUMSTANCES_PREVENT_PAYMENT_OF_DELIVERED_GOODS = '453';

    /**
     * Notification of balance responsible entity change (434)
     *
     * Notification of a change of balance responsible entity.
     */
    case NOTIFICATION_OF_BALANCE_RESPONSIBLE_ENTITY_CHANGE = '434';

    /**
     * Notification of change of supplier (392)
     *
     * A notification of a change of supplier.
     */
    case NOTIFICATION_OF_CHANGE_OF_SUPPLIER = '392';

    /**
     * Notification of emergency shifting from the designated place in port (354)
     *
     * Document to notify shifting from designated place in port once secured at
     * the designated place.
     */
    case NOTIFICATION_OF_EMERGENCY_SHIFTING_FROM_THE_DESIGNATED_PLACE_IN_PORT = '354';

    /**
     * Notification of meter change (408)
     *
     * Notification about the change of a meter.
     */
    case NOTIFICATION_OF_METER_CHANGE = '408';

    /**
     * Notification of metering point identification change (410)
     *
     * Notification of the change of metering point identification.
     */
    case NOTIFICATION_OF_METERING_POINT_IDENTIFICATION_CHANGE = '410';

    /**
     * Notification of usage of berth or mooring facilities (352)
     *
     * Document to notify usage of berth or mooring facilities.
     */
    case NOTIFICATION_OF_USAGE_OF_BERTH_OR_MOORING_FACILITIES = '352';

    /**
     * Notification to grid operator of contract termination (432)
     *
     * Notification to the grid operator regarding the termination of a contract.
     */
    case NOTIFICATION_TO_GRID_OPERATOR_OF_CONTRACT_TERMINATION = '432';

    /**
     * Notification to grid operator of metering point changes (433)
     *
     * Notification to the grid operator about changes regarding a metering point.
     */
    case NOTIFICATION_TO_GRID_OPERATOR_OF_METERING_POINT_CHANGES = '433';

    /**
     * Notification to supplier of contract termination (406)
     *
     * Notification to the supplier regarding the termination of a contract.
     */
    case NOTIFICATION_TO_SUPPLIER_OF_CONTRACT_TERMINATION = '406';

    /**
     * Notification to supplier of metering point changes (407)
     *
     * Notification to the supplier about changes regarding a metering point.
     */
    case NOTIFICATION_TO_SUPPLIER_OF_METERING_POINT_CHANGES = '407';

    /**
     * Offer / quotation (310)
     *
     * (1332) Document/message which, with a view to concluding a contract, sets
     * out the conditions under which the goods are offered.
     */
    case OFFER_QUOTATION = '310';

    /**
     * Operating instructions (327)
     *
     * Document/message describing instructions for operation.
     */
    case OPERATING_INSTRUCTIONS = '327';

    /**
     * Optical Character Reading (OCR) payment (322)
     *
     * Payment effected by an Optical Character Reading (OCR) document.
     */
    case OPTICAL_CHARACTER_READING_OCR_PAYMENT = '322';

    /**
     * Optical Character Reading (OCR) payment credit note (420)
     *
     * Payment credit note effected by an Optical Character Reading (OCR)
     * document.
     */
    case OPTICAL_CHARACTER_READING_OCR_PAYMENT_CREDIT_NOTE = '420';

    /**
     * Order (220)
     *
     * Document/message by means of which a buyer initiates a transaction with a
     * seller involving the supply of goods or services as specified, according to
     * conditions set out in an offer, or otherwise known to the buyer.
     */
    case ORDER = '220';

    /**
     * Order status enquiry (347)
     *
     * A message enquiring the status of previously sent orders.
     */
    case ORDER_STATUS_ENQUIRY = '347';

    /**
     * Order status report (348)
     *
     * A message reporting the status of previously sent orders.
     */
    case ORDER_STATUS_REPORT = '348';

    /**
     * Original accounting voucher (533)
     *
     * To indicate that the document/message justifying an accounting entry is
     * original.
     */
    case ORIGINAL_ACCOUNTING_VOUCHER = '533';

    /**
     * Out of court settlement (847)
     *
     * Document which specifies an out of court settlement.
     */
    case OUT_OF_COURT_SETTLEMENT = '847';

    /**
     * Package response (Customs) (964)
     *
     * Package response message to permit the transfer of data from Customs to the
     * transmitter of the previous message.
     */
    case PACKAGE_RESPONSE_CUSTOMS = '964';

    /**
     * Packaging material composition report (644)
     *
     * A document that shows the main structure that composes the packaging
     * material.
     */
    case PACKAGING_MATERIAL_COMPOSITION_REPORT = '644';

    /**
     * Packing instructions (140)
     *
     * Document/message within an enterprise giving instructions on how goods are
     * to be packed.
     */
    case PACKING_INSTRUCTIONS = '140';

    /**
     * Packing list (271)
     *
     * Document/message specifying the distribution of goods in individual
     * packages (in trade environment the despatch advice message is used for the
     * packing list).
     */
    case PACKING_LIST = '271';

    /**
     * Partial construction invoice (875)
     *
     * Partial invoice in the context of a specific construction project.
     */
    case PARTIAL_CONSTRUCTION_INVOICE = '875';

    /**
     * Partial final construction invoice (876)
     *
     * Invoice concluding all previous partial construction invoices of a
     * completed partial rendered service in the context of a specific
     * construction project.
     */
    case PARTIAL_FINAL_CONSTRUCTION_INVOICE = '876';

    /**
     * Partial invoice (326)
     *
     * Document/message specifying details of an incomplete invoice.
     */
    case PARTIAL_INVOICE = '326';

    /**
     * Party credit information (377)
     *
     * Document/message providing data concerning the credit information of a
     * party.
     */
    case PARTY_CREDIT_INFORMATION = '377';

    /**
     * Party information (10)
     *
     * Document/message providing basic data concerning a party.
     */
    case PARTY_INFORMATION = '10';

    /**
     * Party payment behaviour information (378)
     *
     * Document/message providing data concerning the payment behaviour of a
     * party.
     */
    case PARTY_PAYMENT_BEHAVIOUR_INFORMATION = '378';

    /**
     * Passenger list (745)
     *
     * Declaration to Customs regarding passengers aboard the conveyance;
     * equivalent to IMO FAL 6.
     */
    case PASSENGER_LIST = '745';

    /**
     * Passport (39)
     *
     * An official document giving permission to travel in foreign countries.
     */
    case PASSPORT = '39';

    /**
     * Payment bond (357)
     *
     * A document that guarantees the payment of monies.
     */
    case PAYMENT_BOND = '357';

    /**
     * Payment card (461)
     *
     * The document is a credit, guarantee or charge card.
     */
    case PAYMENT_CARD = '461';

    /**
     * Payment or performance bond (165)
     *
     * A document indicating a bond that guarantees the payment of monies or a
     * performance.
     */
    case PAYMENT_OR_PERFORMANCE_BOND = '165';

    /**
     * Payment order (450)
     *
     * Document/message containing information needed to initiate the payment. It
     * may cover the financial settlement for one or more commercial trade
     * transactions. A payment order is an instruction to the ordered bank to
     * arrange for the payment of one specified amount to the beneficiary.
     */
    case PAYMENT_ORDER = '450';

    /**
     * Payment receipt confirmation (834)
     *
     * Document confirming the receipt of a payment.
     */
    case PAYMENT_RECEIPT_CONFIRMATION = '834';

    /**
     * Payment request for completed units (219)
     *
     * A request for payment for completed units.
     */
    case PAYMENT_REQUEST_FOR_COMPLETED_UNITS = '219';

    /**
     * Payment valuation (204)
     *
     * Document/message establishing the financial elements of a situation of
     * works.
     */
    case PAYMENT_VALUATION = '204';

    /**
     * Payment valuation for unscheduled items (217)
     *
     * A payment valuation for unscheduled items.
     */
    case PAYMENT_VALUATION_FOR_UNSCHEDULED_ITEMS = '217';

    /**
     * Payroll deductions advice (747)
     *
     * A message sent by a party (usually an employer or its representative) to a
     * service providing organisation, to detail payroll deductions paid on behalf
     * of its employees to the service providing organisation.
     */
    case PAYROLL_DEDUCTIONS_ADVICE = '747';

    /**
     * Performance bond (356)
     *
     * A document that guarantees performance.
     */
    case PERFORMANCE_BOND = '356';

    /**
     * Pharmaceutical sanitary certificate (94)
     *
     * Document or message issued by the competent authority in the exporting
     * country evidencing that pharmaceutical products comply with the
     * requirements set by the importing country.
     */
    case PHARMACEUTICAL_SANITARY_CERTIFICATE = '94';

    /**
     * Physician report (839)
     *
     * Report issued by a medical doctor.
     */
    case PHYSICIAN_REPORT = '839';

    /**
     * Phytosanitary certificate (851)
     *
     * A message/doucment consistent with the model for certificates of the IPPC,
     * attesting that a consignment meets phytosanitary import requirements.
     */
    case PHYTOSANITARY_CERTIFICATE = '851';

    /**
     * Phytosanitary Re-export Certificate (657)
     *
     * A message/document consistent with the model for re-export phytosanitary
     * certificates of the IPPC, attesting that a consignment meets phytosanitary
     * import requirements.
     */
    case PHYTOSANITARY_REEXPORT_CERTIFICATE = '657';

    /**
     * Pick-up notice (171)
     *
     * Notice specifying the pick-up of released cargo or containers from a
     * certain address.
     */
    case PICKUP_NOTICE = '171';

    /**
     * Plan for provision of health service (371)
     *
     * Document containing a plan for provision of health service.
     */
    case PLAN_FOR_PROVISION_OF_HEALTH_SERVICE = '371';

    /**
     * Plant Passport (752)
     *
     * Document/message issued by a competent body certifying the phytosanitary
     * status of plants or plant products for international trade.
     */
    case PLANT_PASSPORT = '752';

    /**
     * Port authority waste disposal report (482)
     *
     * Document/message sent by a port authority to another port authority for
     * reporting information on waste disposal.
     */
    case PORT_AUTHORITY_WASTE_DISPOSAL_REPORT = '482';

    /**
     * Port charges documents (633)
     *
     * Documents/messages specifying services rendered, storage and handling
     * costs, demurrage and other charges due to the owner of goods described
     * therein.
     */
    case PORT_CHARGES_DOCUMENTS = '633';

    /**
     * Post receipt (13)
     *
     * Document/message which evidences the transport of goods by post (e.g. mail,
     * parcel, etc.).
     */
    case POST_RECEIPT = '13';

    /**
     * Poultry sanitary certificate (91)
     *
     * Document or message issued by the competent authority in the exporting
     * country evidencing that poultry products comply with the requirements set
     * by the importing country.
     */
    case POULTRY_SANITARY_CERTIFICATE = '91';

    /**
     * Pre-authorised direct debit request(s) (243)
     *
     * The message contains pre-authorised direct debit request(s).
     */
    case PREAUTHORISED_DIRECT_DEBIT_REQUESTS = '243';

    /**
     * Pre-authorised direct debit(s) (214)
     *
     * The message contains pre-authorised direct debit(s).
     */
    case PREAUTHORISED_DIRECT_DEBITS = '214';

    /**
     * Pre-packed cross docking consignment order (898)
     *
     * A consignment order requesting the supply of products packed according to
     * the final delivery point which will be moved across a dock in a
     * distribution centre without further handling.
     */
    case PREPACKED_CROSS_DOCKING_CONSIGNMENT_ORDER = '898';

    /**
     * Pre-packed cross docking despatch advice (463)
     *
     * Document by means of which the supplier or consignor informs the buyer,
     * consignee or distribution centre about the despatch of products packed
     * according to the final delivery point requirements which will be moved
     * across a dock in a distribution centre without further handling.
     */
    case PREPACKED_CROSS_DOCKING_DESPATCH_ADVICE = '463';

    /**
     * Pre-packed cross docking order (401)
     *
     * An order requesting the supply of products packed according to the final
     * delivery point which will be moved across a dock in a distribution centre
     * without further handling.
     */
    case PREPACKED_CROSS_DOCKING_ORDER = '401';

    /**
     * Preadvice of a credit (435)
     *
     * Preadvice indicating a credit to happen in the future.
     */
    case PREADVICE_OF_A_CREDIT = '435';

    /**
     * Preference certificate of origin (864)
     *
     * Document/message describing a certificate of origin meeting the
     * requirements for preferential treatment.
     */
    case PREFERENCE_CERTIFICATE_OF_ORIGIN = '864';

    /**
     * Preliminary credit assessment (64)
     *
     * Document/message issued either by a factor to indicate his preliminary
     * credit assessment on a buyer, or by a seller to request a factor's
     * preliminary credit assessment on a buyer.
     */
    case PRELIMINARY_CREDIT_ASSESSMENT = '64';

    /**
     * Preliminary sales report (323)
     *
     * Preliminary sales report sent before all the information is available.
     */
    case PRELIMINARY_SALES_REPORT = '323';

    /**
     * Prepayment invoice (386)
     *
     * An invoice to pay amounts for goods and services in advance; these amounts
     * will be subtracted from the final invoice.
     */
    case PREPAYMENT_INVOICE = '386';

    /**
     * Prescription (372)
     *
     * Instructions for the dispensing and use of medicine or remedy.
     */
    case PRESCRIPTION = '372';

    /**
     * Prescription dispensing report (374)
     *
     * Document containing information of products dispensed according to a
     * prescription.
     */
    case PRESCRIPTION_DISPENSING_REPORT = '374';

    /**
     * Prescription request (373)
     *
     * Request to issue a prescription for medicine or remedy.
     */
    case PRESCRIPTION_REQUEST = '373';

    /**
     * Previous correspondence (653)
     *
     * Correspondence previously exchanged.
     */
    case PREVIOUS_CORRESPONDENCE = '653';

    /**
     * Previous Customs document/message (998)
     *
     * Indication of the previous Customs document/message concerning the same
     * transaction.
     */
    case PREVIOUS_CUSTOMS_DOCUMENTMESSAGE = '998';

    /**
     * Previous transport document (499)
     *
     * Identification of the previous transport document.
     */
    case PREVIOUS_TRANSPORT_DOCUMENT = '499';

    /**
     * Price and delivery quote (363)
     *
     * Document/message confirming price and delivery conditions under which goods
     * are offered.
     */
    case PRICE_AND_DELIVERY_QUOTE = '363';

    /**
     * Price and delivery quote, ship and debit (369)
     *
     * Document/message from a supplier to a distributor confirming price
     * conditions and delivery conditions under which goods can be sold by a
     * distributor to the end-customer specified on the quote with compensation
     * for loss of inventory value.
     */
    case PRICE_AND_DELIVERY_QUOTE_SHIP_AND_DEBIT = '369';

    /**
     * Price and delivery quote, specified end-customer (367)
     *
     * Document/message confirming price conditions and delivery conditions under
     * which goods are offered, provided that they are sold to the end-customer
     * specified on the quote.
     */
    case PRICE_AND_DELIVERY_QUOTE_SPECIFIED_ENDCUSTOMER = '367';

    /**
     * Price negotiation result (52)
     *
     * A document providing the result of price negotiations.
     */
    case PRICE_NEGOTIATION_RESULT = '52';

    /**
     * Price quote (361)
     *
     * Document/message confirming price conditions under which goods are offered.
     */
    case PRICE_QUOTE = '361';

    /**
     * Price quote, ship and debit (368)
     *
     * Document/message from a supplier to a distributor confirming price
     * conditions under which goods can be sold by a distributor to the
     * end-customer specified on the quote with compensation for loss of inventory
     * value.
     */
    case PRICE_QUOTE_SHIP_AND_DEBIT = '368';

    /**
     * Price quote, specified end-customer (366)
     *
     * Document/message confirming price conditions under which goods are offered,
     * provided that they are sold to the end-customer specified on the quote.
     */
    case PRICE_QUOTE_SPECIFIED_ENDCUSTOMER = '366';

    /**
     * Price variation invoice (295)
     *
     * An invoice which requests payment for the difference in price between an
     * original invoice and the result of the application of a price variation
     * formula.
     */
    case PRICE_VARIATION_INVOICE = '295';

    /**
     * Price/sales catalogue (9)
     *
     * A document/message to enable the transmission of information regarding
     * pricing and catalogue details for goods and services offered by a seller to
     * a buyer.
     */
    case PRICESALES_CATALOGUE = '9';

    /**
     * Price/sales catalogue containing commercial information (728)
     *
     * A price/sales catalogue message containing only commercial terms or
     * conditions data.
     */
    case PRICESALES_CATALOGUE_CONTAINING_COMMERCIAL_INFORMATION = '728';

    /**
     * Price/sales catalogue not containing commercial information (727)
     *
     * A price/sales catalogue message containing no commercial information, such
     * as prices, terms or conditions.
     */
    case PRICESALES_CATALOGUE_NOT_CONTAINING_COMMERCIAL_INFORMATION = '727';

    /**
     * Price/sales catalogue response (51)
     *
     * A document providing a response to a previously sent price/sales catalogue.
     */
    case PRICESALES_CATALOGUE_RESPONSE = '51';

    /**
     * Priced alternate tender bill of quantity (192)
     *
     * A priced tender based upon an alternate specification.
     */
    case PRICED_ALTERNATE_TENDER_BILL_OF_QUANTITY = '192';

    /**
     * Priced tender BOQ (209)
     *
     * Document/message providing a detailed, quantity based specification,
     * updated with prices to form a tender submission for a construction
     * contract. BOQ means: Bill of quantity.
     */
    case PRICED_TENDER_BOQ = '209';

    /**
     * Pro-forma accounting voucher (535)
     *
     * To indicate that the document/message justifying an accounting entry is
     * pro-forma.
     */
    case PROFORMA_ACCOUNTING_VOUCHER = '535';

    /**
     * Process data report (7)
     *
     * Reports on events during production process.
     */
    case PROCESS_DATA_REPORT = '7';

    /**
     * Product data message (289)
     *
     * A message to submit master data, a set of data that is rarely changed, to
     * identify and describe products a supplier offers to their (potential)
     * customer or buyer.
     */
    case PRODUCT_DATA_MESSAGE = '289';

    /**
     * Product data response (721)
     *
     * Document/message responding to a previously received Product Data
     * document/message.
     */
    case PRODUCT_DATA_RESPONSE = '721';

    /**
     * Product performance report (5)
     *
     * Report specifying the performance values of products.
     */
    case PRODUCT_PERFORMANCE_REPORT = '5';

    /**
     * Product specification report (6)
     *
     * Report providing specification values of products.
     */
    case PRODUCT_SPECIFICATION_REPORT = '6';

    /**
     * Production facility license (649)
     *
     * A license granted by a competent authority to a production facility for
     * manufacturing specific products.
     */
    case PRODUCTION_FACILITY_LICENSE = '649';

    /**
     * Proforma invoice (325)
     *
     * Document/message serving as a preliminary invoice, containing - on the
     * whole - the same information as the final invoice, but not actually
     * claiming payment.
     */
    case PROFORMA_INVOICE = '325';

    /**
     * Progressive discharge report (181)
     *
     * Document or message progressively issued by the container terminal operator
     * in charge of discharging a vessel identifying containers that have been
     * discharged from a specific vessel at that point in time.
     */
    case PROGRESSIVE_DISCHARGE_REPORT = '181';

    /**
     * Project master plan (253)
     *
     * A high level, all encompassing master plan to complete a project.
     */
    case PROJECT_MASTER_PLAN = '253';

    /**
     * Project master schedule (191)
     *
     * A high level, all encompassing master schedule of activities to complete a
     * project.
     */
    case PROJECT_MASTER_SCHEDULE = '191';

    /**
     * Project plan (254)
     *
     * A plan for project work to be completed.
     */
    case PROJECT_PLAN = '254';

    /**
     * Project planning available resources (256)
     *
     * Available resources for project planning purposes.
     */
    case PROJECT_PLANNING_AVAILABLE_RESOURCES = '256';

    /**
     * Project planning calendar (257)
     *
     * Work calendar information for project planning purposes.
     */
    case PROJECT_PLANNING_CALENDAR = '257';

    /**
     * Project production plan (189)
     *
     * A project plan for the production of goods.
     */
    case PROJECT_PRODUCTION_PLAN = '189';

    /**
     * Project recovery plan (188)
     *
     * A project plan for recovery after a delay or problem resolution.
     */
    case PROJECT_RECOVERY_PLAN = '188';

    /**
     * Project schedule (255)
     *
     * A schedule of project activities to be completed.
     */
    case PROJECT_SCHEDULE = '255';

    /**
     * Promissory note (491)
     *
     * Document/message, issued and signed in conformity with the applicable
     * legislation, which contains an unconditional promise whereby the maker
     * undertakes to pay a definite sum of money to the payee or to his order, on
     * demand or at a definite time, against the surrender of the document itself.
     */
    case PROMISSORY_NOTE = '491';

    /**
     * Proof of delivery (737)
     *
     * A message by which a consignee provides for a carrier proof of delivery of
     * a consignment.
     */
    case PROOF_OF_DELIVERY = '737';

    /**
     * Proof of transit declaration (975)
     *
     * A document providing proof that a transit declaration has been accepted.
     */
    case PROOF_OF_TRANSIT_DECLARATION = '975';

    /**
     * Provisional payment valuation (203)
     *
     * Document/message establishing a provisional payment valuation.
     */
    case PROVISIONAL_PAYMENT_VALUATION = '203';

    /**
     * Public price certificate (646)
     *
     * A certification executed by the competent authority from country of
     * production stating the price of the goods to the general public.
     */
    case PUBLIC_PRICE_CERTIFICATE = '646';

    /**
     * Purchase order (105)
     *
     * Document/message issued within an enterprise to initiate the purchase of
     * articles, materials or services required for the production or manufacture
     * of goods to be offered for sale or otherwise supplied to customers.
     */
    case PURCHASE_ORDER = '105';

    /**
     * Purchase order change request (230)
     *
     * Change to an purchase order already sent.
     */
    case PURCHASE_ORDER_CHANGE_REQUEST = '230';

    /**
     * Purchase Order Financing Request (892)
     *
     * Document enabling the Financing Requestor to initiate the financing process
     * by the First Agent.
     */
    case PURCHASE_ORDER_FINANCING_REQUEST = '892';

    /**
     * Purchase Order Financing Request Cancellation (894)
     *
     * Document enabling the Financing Requestor to request the First Agent to
     * cancel a previously sent purchase order financing request.
     */
    case PURCHASE_ORDER_FINANCING_REQUEST_CANCELLATION = '894';

    /**
     * Purchase Order Financing Request Status (893)
     *
     * Document enabling the First Agent to notify the Financing Requestor of the
     * status of a purchase order financing request or the status of a purchase
     * order financing cancellation request previously sent by the Financial
     * Requestor itself.
     */
    case PURCHASE_ORDER_FINANCING_REQUEST_STATUS = '893';

    /**
     * Purchase order response (231)
     *
     * Response to an purchase order already received.
     */
    case PURCHASE_ORDER_RESPONSE = '231';

    /**
     * Purchasing specification (164)
     *
     * A document indicating a specification used to purchase an item.
     */
    case PURCHASING_SPECIFICATION = '164';

    /**
     * Quality data message (20)
     *
     * Usage of QALITY-message.
     */
    case QUALITY_DATA_MESSAGE = '20';

    /**
     * Quantity valuation (205)
     *
     * Document/message providing a confirmed assessment, by quantity, of the
     * completed work for a construction contract.
     */
    case QUANTITY_VALUATION = '205';

    /**
     * Quantity valuation request (206)
     *
     * Document/message providing an initial assessment, by quantity, of the
     * completed work for a construction contract.
     */
    case QUANTITY_VALUATION_REQUEST = '206';

    /**
     * Query (21)
     *
     * Request information based on defined criteria.
     */
    case QUERY = '21';

    /**
     * Questionnaire (779)
     *
     * Document consisting of a series of questions.
     */
    case QUESTIONNAIRE = '779';

    /**
     * Quota prior allocation certificate (966)
     *
     * Document/message issued by the competent body for prior allocation of a
     * quota.
     */
    case QUOTA_PRIOR_ALLOCATION_CERTIFICATE = '966';

    /**
     * Rail consignment note (generic term) (720)
     *
     * Transport document constituting a contract for the carriage of goods
     * between the sender and the carrier (the railway). For international rail
     * traffic, this document must conform to the model prescribed by the
     * international conventions concerning carriage of goods by rail, e.g. CIM
     * Convention, SMGS Convention.
     */
    case RAIL_CONSIGNMENT_NOTE_GENERIC_TERM = '720';

    /**
     * Rail consignment note forwarder copy (972)
     *
     * Document which is a copy of the rail consignment note printed especially
     * for the need of the forwarder.
     */
    case RAIL_CONSIGNMENT_NOTE_FORWARDER_COPY = '972';

    /**
     * Re-Entry Permit (529)
     *
     * A permit to re-enter a country.
     */
    case REENTRY_PERMIT = '529';

    /**
     * Re-sending consignment note (824)
     *
     * Rail consignment note prepared by the consignor for the facilitation of an
     * eventual return to the origin of the goods.
     */
    case RESENDING_CONSIGNMENT_NOTE = '824';

    /**
     * Ready for despatch advice (345)
     *
     * Document/message issued by a supplier informing a buyer that goods ordered
     * are ready for despatch.
     */
    case READY_FOR_DESPATCH_ADVICE = '345';

    /**
     * Ready for transshipment despatch advice (462)
     *
     * Document to advise that the goods ordered are ready for transshipment.
     */
    case READY_FOR_TRANSSHIPMENT_DESPATCH_ADVICE = '462';

    /**
     * Reassignment (69)
     *
     * Document/message issued by a factor to a seller or to another factor to
     * reassign an invoice or credit note previously assigned to him.
     */
    case REASSIGNMENT = '69';

    /**
     * Receipt (Customs) (917)
     *
     * Receipt for Customs duty/tax/fee paid.
     */
    case RECEIPT_CUSTOMS = '917';

    /**
     * Recharging document (724)
     *
     * Fictitious transport document regarding a previous transport, enabling a
     * carrier's agent to give to another carrier's agent (in a different country)
     * the possibility to collect charges relating to the original transport (rail
     * environment).
     */
    case RECHARGING_DOCUMENT = '724';

    /**
     * Reefer connection order (489)
     *
     * Order to connect a reefer container to a reefer point.
     */
    case REEFER_CONNECTION_ORDER = '489';

    /**
     * Refugee Permit (531)
     *
     * Document identifying a refugee recognized by a country.
     */
    case REFUGEE_PERMIT = '531';

    /**
     * Refusal of claim (828)
     *
     * Document stating the refusal of a claim.
     */
    case REFUSAL_OF_CLAIM = '828';

    /**
     * Regional appellation certificate (863)
     *
     * Certificate drawn up in accordance with the rules laid down by an authority
     * or approved body, certifying that the goods described therein qualify for a
     * designation specific to the given region (e.g. champagne, port wine,
     * Parmesan cheese).
     */
    case REGIONAL_APPELLATION_CERTIFICATE = '863';

    /**
     * Registration change (300)
     *
     * Code specifying the modification of previously submitted registration
     * information.
     */
    case REGISTRATION_CHANGE = '300';

    /**
     * Registration document (101)
     *
     * An official document providing registration details.
     */
    case REGISTRATION_DOCUMENT = '101';

    /**
     * Registration renewal (299)
     *
     * Code specifying the continued validity of previously submitted registration
     * information.
     */
    case REGISTRATION_RENEWAL = '299';

    /**
     * Rejected direct debit(s) (239)
     *
     * The message contains rejected direct debit(s).
     */
    case REJECTED_DIRECT_DEBITS = '239';

    /**
     * Related document (916)
     *
     * Document that has a relationship with the stated document/message.
     */
    case RELATED_DOCUMENT = '916';

    /**
     * Remittance advice (481)
     *
     * Document/message advising of the remittance of payment.
     */
    case REMITTANCE_ADVICE = '481';

    /**
     * Repair order (225)
     *
     * Document/message to order repair of goods.
     */
    case REPAIR_ORDER = '225';

    /**
     * Report of transactions for information only (342)
     *
     * A message reporting transactions for information only.
     */
    case REPORT_OF_TRANSACTIONS_FOR_INFORMATION_ONLY = '342';

    /**
     * Report of transactions which need further information from the receiver (339)
     *
     * A message reporting transactions which need further information from the
     * receiver.
     */
    case REPORT_OF_TRANSACTIONS_WHICH_NEED_FURTHER_INFORMATION_FROM_THE_RECEIVER = '339';

    /**
     * Request for an amendment of a documentary credit (196)
     *
     * Request for an amendment of a documentary credit.
     */
    case REQUEST_FOR_AN_AMENDMENT_OF_A_DOCUMENTARY_CREDIT = '196';

    /**
     * Request for contract price and delivery quote (445)
     *
     * Document/message requesting contractual price conditions and contractual
     * delivery conditions under which goods are offered.
     */
    case REQUEST_FOR_CONTRACT_PRICE_AND_DELIVERY_QUOTE = '445';

    /**
     * Request for contract price quote (444)
     *
     * Document/message requesting contractual price conditions under which goods
     * are offered.
     */
    case REQUEST_FOR_CONTRACT_PRICE_QUOTE = '444';

    /**
     * Request for delivery instructions (330)
     *
     * Document/message issued by a supplier requesting instructions from the
     * buyer regarding the details of the delivery of goods ordered.
     */
    case REQUEST_FOR_DELIVERY_INSTRUCTIONS = '330';

    /**
     * Request for delivery quote (442)
     *
     * Document/message requesting delivery conditions under which goods are
     * offered.
     */
    case REQUEST_FOR_DELIVERY_QUOTE = '442';

    /**
     * Request for financial cancellation (213)
     *
     * The message is a request for financial cancellation.
     */
    case REQUEST_FOR_FINANCIAL_CANCELLATION = '213';

    /**
     * Request for metering point information (379)
     *
     * Message to request information about a metering point.
     */
    case REQUEST_FOR_METERING_POINT_INFORMATION = '379';

    /**
     * Request for payment (71)
     *
     * Document/message issued by a creditor to a debtor to request payment of one
     * or more invoices past due.
     */
    case REQUEST_FOR_PAYMENT = '71';

    /**
     * Request for price and delivery quote (443)
     *
     * Document/message requesting price and delivery conditions under which goods
     * are offered.
     */
    case REQUEST_FOR_PRICE_AND_DELIVERY_QUOTE = '443';

    /**
     * Request for price and delivery quote, ship and debit (439)
     *
     * Document/message from a distributor to a supplier requesting price
     * conditions and delivery conditions under which goods can be sold by the
     * distributor to the end-customer specified on the request for quote with
     * compensation for loss of inventory value.
     */
    case REQUEST_FOR_PRICE_AND_DELIVERY_QUOTE_SHIP_AND_DEBIT = '439';

    /**
     * Request for price and delivery quote, specified end-user (437)
     *
     * Document/message requesting price conditions and delivery conditions under
     * which goods are offered, provided that they are sold to the end-customer
     * specified on the request for quote.
     */
    case REQUEST_FOR_PRICE_AND_DELIVERY_QUOTE_SPECIFIED_ENDUSER = '437';

    /**
     * Request for price quote (360)
     *
     * Document/message requesting price conditions under which goods are offered.
     */
    case REQUEST_FOR_PRICE_QUOTE = '360';

    /**
     * Request for price quote, ship and debit (438)
     *
     * Document/message from a distributor to a supplier requesting price
     * conditions under which goods can be sold by the distributor to the
     * end-customer specified on the request for quote with compensation for loss
     * of inventory value.
     */
    case REQUEST_FOR_PRICE_QUOTE_SHIP_AND_DEBIT = '438';

    /**
     * Request for price quote, specified end-customer (446)
     *
     * Document/message requesting price conditions under which goods are offered,
     * provided that they are sold to the end-customer specified on the request
     * for quote.
     */
    case REQUEST_FOR_PRICE_QUOTE_SPECIFIED_ENDCUSTOMER = '446';

    /**
     * Request for provision of a health service (359)
     *
     * Document containing request for provision of a health service.
     */
    case REQUEST_FOR_PROVISION_OF_A_HEALTH_SERVICE = '359';

    /**
     * Request for quote (311)
     *
     * Document/message requesting a quote on specified goods or services.
     */
    case REQUEST_FOR_QUOTE = '311';

    /**
     * Request for statistical data (75)
     *
     * Request for one or more items or data sets of statistical data.
     */
    case REQUEST_FOR_STATISTICAL_DATA = '75';

    /**
     * Request for transfer (303)
     *
     * Document/message is a request for transfer.
     */
    case REQUEST_FOR_TRANSFER = '303';

    /**
     * Requirements contract (154)
     *
     * A document indicating a requirements contract that authorizes the filling
     * of all purchase requirements during a specified contract period.
     */
    case REQUIREMENTS_CONTRACT = '154';

    /**
     * Resale information (656)
     *
     * Document/message providing information on a resale.
     */
    case RESALE_INFORMATION = '656';

    /**
     * Residence permit (717)
     *
     * A document authorizing residence.
     */
    case RESIDENCE_PERMIT = '717';

    /**
     * Response to a trade statistics message (37)
     *
     * Document/message in which the competent national authorities provide a
     * declarant with an acceptance or a rejection about a received declaration
     * for European statistical purposes.
     */
    case RESPONSE_TO_A_TRADE_STATISTICS_MESSAGE = '37';

    /**
     * Response to an amendment of a documentary credit (199)
     *
     * Response to an amendment of a documentary credit.
     */
    case RESPONSE_TO_AN_AMENDMENT_OF_A_DOCUMENTARY_CREDIT = '199';

    /**
     * Response to previous banking status message (252)
     *
     * A response to a previously sent banking status message.
     */
    case RESPONSE_TO_PREVIOUS_BANKING_STATUS_MESSAGE = '252';

    /**
     * Response to query (22)
     *
     * Document/message returned as an answer to a question.
     */
    case RESPONSE_TO_QUERY = '22';

    /**
     * Response to registration (301)
     *
     * Code specifying a response to an occurrence of a registration message.
     */
    case RESPONSE_TO_REGISTRATION = '301';

    /**
     * Restow (24)
     *
     * Message/document identifying containers that have been unloaded and then
     * reloaded onto the same means of transport.
     */
    case RESTOW = '24';

    /**
     * Returns advice (729)
     *
     * Document/message by means of which the buyer informs the seller about the
     * despatch of returned goods.
     */
    case RETURNS_ADVICE = '729';

    /**
     * Reversal of credit (458)
     *
     * Reversal of credit accounting entry by bank.
     */
    case REVERSAL_OF_CREDIT = '458';

    /**
     * Reversal of debit (457)
     *
     * Reversal of debit accounting entry by bank.
     */
    case REVERSAL_OF_DEBIT = '457';

    /**
     * Risk analysis (872)
     *
     * Document specifying the analysis of risks.
     */
    case RISK_ANALYSIS = '872';

    /**
     * Road consignment note (730)
     *
     * Transport document/message which evidences a contract between a carrier and
     * a sender for the carriage of goods by road (generic term). Remark: For
     * international road traffic, this document must contain at least the
     * particulars prescribed by the convention on the contract for the
     * international carriage of goods by road (CMR).
     */
    case ROAD_CONSIGNMENT_NOTE = '730';

    /**
     * Road list-SMGS (722)
     *
     * Accounting document, one copy of which is drawn up for each consignment
     * note; it accompanies the consignment over the whole route and is a rail
     * transport document.
     */
    case ROAD_LISTSMGS = '722';

    /**
     * Rush order (224)
     *
     * Document/message for urgent ordering.
     */
    case RUSH_ORDER = '224';

    /**
     * Safety and hazard data sheet (53)
     *
     * Document or message to supply advice on a dangerous or hazardous material
     * to industrial customers so as to enable them to take measures to protect
     * their employees and the environment from any potential harmful effects from
     * these material.
     */
    case SAFETY_AND_HAZARD_DATA_SHEET = '53';

    /**
     * Safety of equipment certificate (793)
     *
     * Document certifying the safety of a ship's equipment to a specified date.
     */
    case SAFETY_OF_EQUIPMENT_CERTIFICATE = '793';

    /**
     * Safety of radio certificate (792)
     *
     * Document certifying the safety of a ship's radio facilities to a specified
     * date.
     */
    case SAFETY_OF_RADIO_CERTIFICATE = '792';

    /**
     * Safety of ship certificate (791)
     *
     * Document certifying a ship's safety to a specified date.
     */
    case SAFETY_OF_SHIP_CERTIFICATE = '791';

    /**
     * Sales data report (735)
     *
     * A message enabling companies to exchange or report electronically, basic
     * sales data related to products or services, including the corresponding
     * location, time period, product identification, pricing and quantity
     * information. It enables the recipient to p.
     */
    case SALES_DATA_REPORT = '735';

    /**
     * Sales forecast report (734)
     *
     * A message enabling companies to exchange or report electronically, basic
     * sales forecast data related to products or services, including the
     * corresponding location, time period, product identification, pricing and
     * quantity information. It enables the recip.
     */
    case SALES_FORECAST_REPORT = '734';

    /**
     * Sample order (228)
     *
     * Document/message to order samples.
     */
    case SAMPLE_ORDER = '228';

    /**
     * Sanitary certificate (852)
     *
     * Document/message issued by the competent authority in the exporting country
     * evidencing that alimentary and animal products, including dead animals, are
     * fit for human consumption, and giving details, when relevant, of controls
     * undertaken.
     */
    case SANITARY_CERTIFICATE = '852';

    /**
     * Sea waybill (710)
     *
     * Non-negotiable document which evidences a contract for the carriage of
     * goods by sea and the taking over of the goods by the carrier, and by which
     * the carrier undertakes to deliver the goods to the consignee named in the
     * document.
     */
    case SEA_WAYBILL = '710';

    /**
     * Seaman’s book (718)
     *
     * A national identity document issued to professional seamen that contains a
     * record of their rank and service career.
     */
    case SEAMANS_BOOK = '718';

    /**
     * Season ticket (43)
     *
     * A document giving access to a service for a determined period of time.
     */
    case SEASON_TICKET = '43';

    /**
     * Segment change request (279)
     *
     * Requesting a change to an existing segment.
     */
    case SEGMENT_CHANGE_REQUEST = '279';

    /**
     * Segment request (278)
     *
     * Request a new segment.
     */
    case SEGMENT_REQUEST = '278';

    /**
     * Self billed credit note (261)
     *
     * A document which indicates that the customer is claiming credit in a self
     * billing environment.
     */
    case SELF_BILLED_CREDIT_NOTE = '261';

    /**
     * Self billed debit note (527)
     *
     * A document which indicates that the customer is claiming debit in a self
     * billing environment.
     */
    case SELF_BILLED_DEBIT_NOTE = '527';

    /**
     * Self-billed invoice (389)
     *
     * An invoice the invoicee is producing instead of the seller.
     */
    case SELFBILLED_INVOICE = '389';

    /**
     * Sequenced delivery schedule (307)
     *
     * Message to describe a sequence of product delivery.
     */
    case SEQUENCED_DELIVERY_SCHEDULE = '307';

    /**
     * Service directory definition (286)
     *
     * Document/message defining the contents of a service directory set or parts
     * thereof.
     */
    case SERVICE_DIRECTORY_DEFINITION = '286';

    /**
     * Settlement of a letter of credit (246)
     *
     * Settlement of a letter of credit.
     */
    case SETTLEMENT_OF_A_LETTER_OF_CREDIT = '246';

    /**
     * Ship Security Plan (552)
     *
     * Ship Security Plan (SSP) is a document prepared in terms of the ISPS Code
     * to contribute to the prevention of illegal acts against the ship and its
     * crew.
     */
    case SHIP_SECURITY_PLAN = '552';

    /**
     * Ship's stores declaration (799)
     *
     * Declaration to Customs regarding the contents of the ship's stores
     * (equivalent to IMO FAL 3) i.e. goods intended for consumption by
     * passengers/crew on board vessels, aircraft or trains, whether or not sold
     * or landed; goods necessary for operation/maintenance of conveyance,
     * including fuel/lubricants, excluding spare parts/equipment (IMO).
     */
    case SHIPS_STORES_DECLARATION = '799';

    /**
     * Shipper's letter of instructions (air) (341)
     *
     * Document/message issued by a consignor in which he gives details of a
     * consignment of goods that enables an airline or its agent to prepare an air
     * waybill.
     */
    case SHIPPERS_LETTER_OF_INSTRUCTIONS_AIR = '341';

    /**
     * Shipping instructions (340)
     *
     * (1121) Document/message advising details of cargo and exporter's
     * requirements for its physical movement.
     */
    case SHIPPING_INSTRUCTIONS = '340';

    /**
     * Shipping note (630)
     *
     * (1123) Document/message provided by the shipper or his agent to the
     * carrier, multimodal transport operator, terminal or other receiving
     * authority, giving information about export consignments offered for
     * transport, and providing for the necessary receipts and declarations of
     * liability. Sometimes a multipurpose cargo handling document also fulfilling
     * the functions of document 632, 633, 650 and 655.
     */
    case SHIPPING_NOTE = '630';

    /**
     * Simple data element change request (275)
     *
     * Request a change to an existing simple data element.
     */
    case SIMPLE_DATA_ELEMENT_CHANGE_REQUEST = '275';

    /**
     * Simple data element request (274)
     *
     * Requesting a new simple data element.
     */
    case SIMPLE_DATA_ELEMENT_REQUEST = '274';

    /**
     * Single administrative document (960)
     *
     * A set of documents, replacing the various (national) forms for Customs
     * declaration within the EC, implemented on 01-01-1988.
     */
    case SINGLE_ADMINISTRATIVE_DOCUMENT = '960';

    /**
     * Soil analysis (416)
     *
     * Soil analysis document.
     */
    case SOIL_ANALYSIS = '416';

    /**
     * Spare parts order (233)
     *
     * Document/message to order spare parts.
     */
    case SPARE_PARTS_ORDER = '233';

    /**
     * Special requirements permit related to the transport of cargo (521)
     *
     * A permit related to a transport document granting the transport of cargo
     * under the conditions as specifically required.
     */
    case SPECIAL_REQUIREMENTS_PERMIT_RELATED_TO_THE_TRANSPORT_OF_CARGO = '521';

    /**
     * Specific contract conditions (777)
     *
     * Document specifying the individual conditions or clauses applying to a
     * specific contract.
     */
    case SPECIFIC_CONTRACT_CONDITIONS = '777';

    /**
     * Spot order (222)
     *
     * Document/message ordering the remainder of a production's batch.
     */
    case SPOT_ORDER = '222';

    /**
     * Standing inquiry on complete product information (736)
     *
     * A product inquiry which stands until it is cancelled. It requests not only
     * the updates since last time, but always the complete product information of
     * a data supplier. This means that within the standing request every time a
     * complete download of the respe.
     */
    case STANDING_INQUIRY_ON_COMPLETE_PRODUCT_INFORMATION = '736';

    /**
     * Standing inquiry on product information (376)
     *
     * A product inquiry which stands until it is cancelled.
     */
    case STANDING_INQUIRY_ON_PRODUCT_INFORMATION = '376';

    /**
     * Standing order (258)
     *
     * An order to supply fixed quantities of products at fixed regular intervals.
     */
    case STANDING_ORDER = '258';

    /**
     * Statement of account message (493)
     *
     * Usage of STATAC-message.
     */
    case STATEMENT_OF_ACCOUNT_MESSAGE = '493';

    /**
     * Statistical and other administrative internal documents (190)
     *
     * Documents/messages issued within an enterprise for the for the purpose of
     * collection of production and other internal statistics, and for other
     * administration purposes.
     */
    case STATISTICAL_AND_OTHER_ADMINISTRATIVE_INTERNAL_DOCUMENTS = '190';

    /**
     * Statistical data (74)
     *
     * Transmission of one or more items of data or data sets.
     */
    case STATISTICAL_DATA = '74';

    /**
     * Statistical definitions (73)
     *
     * Transmission of one or more statistical definitions.
     */
    case STATISTICAL_DEFINITIONS = '73';

    /**
     * Statistical document, export (895)
     *
     * Document/message in which an exporter provides information about exported
     * goods required by the body responsible for the collection of international
     * trade statistics.
     */
    case STATISTICAL_DOCUMENT_EXPORT = '895';

    /**
     * Statistical document, import (995)
     *
     * Document/message describing an import document that is used for statistical
     * purposes.
     */
    case STATISTICAL_DOCUMENT_IMPORT = '995';

    /**
     * Status information (23)
     *
     * Information regarding the status of a related message.
     */
    case STATUS_INFORMATION = '23';

    /**
     * Status report (287)
     *
     * Message covers information about the status.
     */
    case STATUS_REPORT = '287';

    /**
     * Storage capacity offer (554)
     *
     * Offering of capacity to store goods.
     */
    case STORAGE_CAPACITY_OFFER = '554';

    /**
     * Storage capacity request (576)
     *
     * Request for capacity to store goods.
     */
    case STORAGE_CAPACITY_REQUEST = '576';

    /**
     * Stores requisition (120)
     *
     * Document/message issued within an enterprise ordering the taking out of
     * stock of goods.
     */
    case STORES_REQUISITION = '120';

    /**
     * Subcontractor plan (157)
     *
     * A document indicating a plan that identifies the manufacturer's
     * subcontracting strategy for a specific contract.
     */
    case SUBCONTRACTOR_PLAN = '157';

    /**
     * Substitute air waybill (743)
     *
     * A temporary air waybill which contains only limited information because of
     * the absence of the original.
     */
    case SUBSTITUTE_AIR_WAYBILL = '743';

    /**
     * Summary sales report (346)
     *
     * Sales report containing summaries for several earlier sent sales reports.
     */
    case SUMMARY_SALES_REPORT = '346';

    /**
     * Summons (849)
     *
     * Document specifying a summons to court.
     */
    case SUMMONS = '849';

    /**
     * Supplementary document for application for cargo operation of dangerous
     * goods (319)
     *
     * Supplementary document to apply for cargo operation of dangerous goods.
     */
    case SUPPLEMENTARY_DOCUMENT_FOR_APPLICATION_FOR_CARGO_OPERATION_OF_DANGEROUS_GOODS = '319';

    /**
     * Supplementary document for application for transport of dangerous goods (321)
     *
     * Supplementary document to apply for transport of dangerous goods.
     */
    case SUPPLEMENTARY_DOCUMENT_FOR_APPLICATION_FOR_TRANSPORT_OF_DANGEROUS_GOODS = '321';

    /**
     * Sustainability data request (900)
     *
     * Document/message requesting information based on defined criteria regarding
     * sustainability.
     */
    case SUSTAINABILITY_DATA_REQUEST = '900';

    /**
     * Sustainability data response (902)
     *
     * Document/Message returned as an answer to a question regarding
     * sustainability.
     */
    case SUSTAINABILITY_DATA_RESPONSE = '902';

    /**
     * Sustainability Inspection request (903)
     *
     * Document/message requesting a sustainability inspection.
     */
    case SUSTAINABILITY_INSPECTION_REQUEST = '903';

    /**
     * Sustainability Inspection response (904)
     *
     * Document/message reporting the results of a sustainability inspection.
     */
    case SUSTAINABILITY_INSPECTION_RESPONSE = '904';

    /**
     * Swap order (229)
     *
     * Document/message informing buyer or seller of the replacement of goods
     * previously ordered.
     */
    case SWAP_ORDER = '229';

    /**
     * Tanker bill of lading (709)
     *
     * Document which evidences a transport of liquid bulk cargo.
     */
    case TANKER_BILL_OF_LADING = '709';

    /**
     * Task order (155)
     *
     * A document indicating an order that tasks a contractor to perform a
     * specified function.
     */
    case TASK_ORDER = '155';

    /**
     * Tax calculation/confirmation response (Customs) (965)
     *
     * Tax calculation/confirmation response message to permit the transfer of
     * data from Customs to the transmitter of the previous message.
     */
    case TAX_CALCULATIONCONFIRMATION_RESPONSE_CUSTOMS = '965';

    /**
     * Tax declaration (general) (938)
     *
     * Document/message containing a general tax declaration.
     */
    case TAX_DECLARATION_GENERAL = '938';

    /**
     * Tax declaration (value added tax) (937)
     *
     * Document/message in which an importer states the pertinent information
     * required by the competent body for assessment of value-added tax.
     */
    case TAX_DECLARATION_VALUE_ADDED_TAX = '937';

    /**
     * Tax demand (940)
     *
     * Document/message containing the demand of tax.
     */
    case TAX_DEMAND = '940';

    /**
     * Tax invoice (388)
     *
     * An invoice for tax purposes.
     */
    case TAX_INVOICE = '388';

    /**
     * Tax notification (102)
     *
     * Used to specify that the message is a tax notification.
     */
    case TAX_NOTIFICATION = '102';

    /**
     * Tender (758)
     *
     * A document/message used by a supplier to bid in a procurement procedure.
     */
    case TENDER = '758';

    /**
     * Tendering price/sales catalogue (762)
     *
     * A document/message providing information regarding pricing and catalogue
     * details for goods and/or services to be offered as part of a tender.
     */
    case TENDERING_PRICESALES_CATALOGUE = '762';

    /**
     * Tendering price/sales catalogue request (757)
     *
     * A document/message requesting information regarding pricing and catalogue
     * details for goods and/or services to be offered as part of a tender.
     */
    case TENDERING_PRICESALES_CATALOGUE_REQUEST = '757';

    /**
     * Test report (4)
     *
     * Report providing the results of a test session.
     */
    case TEST_REPORT = '4';

    /**
     * Thermographic reading report (641)
     *
     * A report of temperature readings over a period.
     */
    case THERMOGRAPHIC_READING_REPORT = '641';

    /**
     * Third party payment report (837)
     *
     * Report about payments done towards a third party.
     */
    case THIRD_PARTY_PAYMENT_REPORT = '837';

    /**
     * Through bill of lading (761)
     *
     * Bill of lading which evidences a contract of carriage from one place to
     * another in separate stages of which at least one stage is a sea transit,
     * and by which the issuing carrier accepts responsibility for the carriage as
     * set forth in the through bill of lading.
     */
    case THROUGH_BILL_OF_LADING = '761';

    /**
     * TIF form (951)
     *
     * International Customs transit document by which the sender declares goods
     * for carriage by rail in accordance with the provisions of the 1952
     * International Convention to facilitate the crossing of frontiers for goods
     * carried by rail (TIF Convention of UIC).
     */
    case TIF_FORM = '951';

    /**
     * TIR carnet (952)
     *
     * International Customs document (International Transit by Road), issued by a
     * guaranteeing association approved by the Customs authorities, under the
     * cover of which goods are carried, in most cases under Customs seal, in road
     * vehicles and/or containers in compliance with the requirements of the
     * Customs TIR Convention of the International Transport of Goods under cover
     * of TIR Carnets (UN/ECE).
     */
    case TIR_CARNET = '952';

    /**
     * Traceability event declaration (899)
     *
     * Document/message declaring a traceability event.
     */
    case TRACEABILITY_EVENT_DECLARATION = '899';

    /**
     * Tracking number assignment report (283)
     *
     * Report of assigned tracking numbers.
     */
    case TRACKING_NUMBER_ASSIGNMENT_REPORT = '283';

    /**
     * Trade data (332)
     *
     * Document/message is for trade data.
     */
    case TRADE_DATA = '332';

    /**
     * Transfrontier waste shipment authorization (978)
     *
     * Document containing the authorization from the relevant authority for the
     * international carriage of waste. Syn: Transfrontier waste shipment permit.
     */
    case TRANSFRONTIER_WASTE_SHIPMENT_AUTHORIZATION = '978';

    /**
     * Transfrontier waste shipment movement document (979)
     *
     * Document certified by the carriers and the consignee to be used for the
     * international carriage of waste.
     */
    case TRANSFRONTIER_WASTE_SHIPMENT_MOVEMENT_DOCUMENT = '979';

    /**
     * Transit certificate of approval (897)
     *
     * Certificate of approval for the transport of goods under customs seal
     */
    case TRANSIT_CERTIFICATE_OF_APPROVAL = '897';

    /**
     * Transit Conveyor Document (971)
     *
     * Document for a course of transit used for a carrier who is neither the
     * carrier at the beginning nor the arrival. The transit carrier can directly
     * invoice the expenses for its part of the transport.
     */
    case TRANSIT_CONVEYOR_DOCUMENT = '971';

    /**
     * Transit license (628)
     *
     * Document/message issued by the competent body in accordance with transit
     * regulations in force, by which authorization is granted to a party to move
     * articles under customs procedure.
     */
    case TRANSIT_LICENSE = '628';

    /**
     * Transport capacity offer (551)
     *
     * Offering of capacity for the transport of goods for a date and a route.
     */
    case TRANSPORT_CAPACITY_OFFER = '551';

    /**
     * Transport capacity request (577)
     *
     * Request for capacity for the transport of goods for a date and a route.
     */
    case TRANSPORT_CAPACITY_REQUEST = '577';

    /**
     * Transport cargo release order (129)
     *
     * Order to release cargo or items of transport equipment to a specified
     * party.
     */
    case TRANSPORT_CARGO_RELEASE_ORDER = '129';

    /**
     * Transport departure report (124)
     *
     * Report of the departure of a means of transport from a particular facility.
     */
    case TRANSPORT_DEPARTURE_REPORT = '124';

    /**
     * Transport discharge instruction (118)
     *
     * Instruction to unload specified cargo, containers or transport equipment
     * from a means of transport.
     */
    case TRANSPORT_DISCHARGE_INSTRUCTION = '118';

    /**
     * Transport discharge report (119)
     *
     * Report on cargo, containers or transport equipment unloaded from a
     * particular means of transport.
     */
    case TRANSPORT_DISCHARGE_REPORT = '119';

    /**
     * Transport emergency card (324)
     *
     * Official document specifying, for a given dangerous goods item, information
     * such as nature of hazard, protective devices, actions to be taken in case
     * of accident, spillage or fire and first aid to be given.
     */
    case TRANSPORT_EMERGENCY_CARD = '324';

    /**
     * Transport empty equipment advice (125)
     *
     * Advice that an item or items of empty transport equipment are available for
     * return.
     */
    case TRANSPORT_EMPTY_EQUIPMENT_ADVICE = '125';

    /**
     * Transport equipment acceptance order (126)
     *
     * Order to accept items of transport equipment which are to be delivered by
     * an inland carrier (rail, road or barge) to a specified facility.
     */
    case TRANSPORT_EQUIPMENT_ACCEPTANCE_ORDER = '126';

    /**
     * Transport equipment damage report (106)
     *
     * Report of damaged items of transport equipment that have been returned.
     */
    case TRANSPORT_EQUIPMENT_DAMAGE_REPORT = '106';

    /**
     * Transport equipment delivery notice (405)
     *
     * Notification regarding the delivery of transport equipment.
     */
    case TRANSPORT_EQUIPMENT_DELIVERY_NOTICE = '405';

    /**
     * Transport equipment direct interchange report (103)
     *
     * Report on the movement of containers or other items of transport equipment
     * being exchanged, establishing relevant rental periods.
     */
    case TRANSPORT_EQUIPMENT_DIRECT_INTERCHANGE_REPORT = '103';

    /**
     * Transport equipment empty release instruction (108)
     *
     * Instruction to release an item of empty transport equipment to a specified
     * party or parties.
     */
    case TRANSPORT_EQUIPMENT_EMPTY_RELEASE_INSTRUCTION = '108';

    /**
     * Transport equipment gross mass verification message (749)
     *
     * Message containing information regarding gross mass verification of
     * transport equipment.
     */
    case TRANSPORT_EQUIPMENT_GROSS_MASS_VERIFICATION_MESSAGE = '749';

    /**
     * Transport equipment impending arrival advice (104)
     *
     * Advice that containers or other items of transport equipment may be
     * expected to be delivered to a certain location.
     */
    case TRANSPORT_EQUIPMENT_IMPENDING_ARRIVAL_ADVICE = '104';

    /**
     * Transport equipment maintenance and repair notice (143)
     *
     * Report of transport equipment which has been repaired or has had
     * maintenance performed.
     */
    case TRANSPORT_EQUIPMENT_MAINTENANCE_AND_REPAIR_NOTICE = '143';

    /**
     * Transport equipment maintenance and repair work authorisation (123)
     *
     * Authorisation to have transport equipment repaired or to have maintenance
     * performed.
     */
    case TRANSPORT_EQUIPMENT_MAINTENANCE_AND_REPAIR_WORK_AUTHORISATION = '123';

    /**
     * Transport equipment maintenance and repair work estimate advice (107)
     *
     * Advice providing estimates of transport equipment maintenance and repair
     * costs.
     */
    case TRANSPORT_EQUIPMENT_MAINTENANCE_AND_REPAIR_WORK_ESTIMATE_ADVICE = '107';

    /**
     * Transport equipment maintenance and repair work estimate order (142)
     *
     * Order to draw up an estimate of the costs of maintenance or repair of
     * transport equipment.
     */
    case TRANSPORT_EQUIPMENT_MAINTENANCE_AND_REPAIR_WORK_ESTIMATE_ORDER = '142';

    /**
     * Transport equipment movement instruction (264)
     *
     * Instruction to perform one or more different movements of transport
     * equipment.
     */
    case TRANSPORT_EQUIPMENT_MOVEMENT_INSTRUCTION = '264';

    /**
     * Transport equipment movement report (265)
     *
     * Report on one or more different movements of transport equipment.
     */
    case TRANSPORT_EQUIPMENT_MOVEMENT_REPORT = '265';

    /**
     * Transport equipment movement report, partial (873)
     *
     * A partial transport equipment movement report, containing only a selected
     * part of the movements of transport equipment for a vessel in a port.
     */
    case TRANSPORT_EQUIPMENT_MOVEMENT_REPORT_PARTIAL = '873';

    /**
     * Transport equipment off-hire report (58)
     *
     * Report on the movement of containers or other items of transport equipment
     * to record physical movement activity and establish the end of a rental
     * period.
     */
    case TRANSPORT_EQUIPMENT_OFFHIRE_REPORT = '58';

    /**
     * Transport equipment off-hire request (136)
     *
     * Request to terminate the lease on an item of transport equipment at a
     * specified time.
     */
    case TRANSPORT_EQUIPMENT_OFFHIRE_REQUEST = '136';

    /**
     * Transport equipment on-hire order (135)
     *
     * Order to release empty items of transport equipment for on-hire to a
     * lessee, and authorising collection by or on behalf of a specified party.
     */
    case TRANSPORT_EQUIPMENT_ONHIRE_ORDER = '135';

    /**
     * Transport equipment on-hire report (57)
     *
     * Report on the movement of containers or other items of transport equipment
     * to record physical movement activity and establish the beginning of a
     * rental period.
     */
    case TRANSPORT_EQUIPMENT_ONHIRE_REPORT = '57';

    /**
     * Transport equipment on-hire request (134)
     *
     * Request for transport equipment to be made available for hire.
     */
    case TRANSPORT_EQUIPMENT_ONHIRE_REQUEST = '134';

    /**
     * Transport equipment packing instruction (131)
     *
     * Instruction to pack cargo into a container or other item of transport
     * equipment.
     */
    case TRANSPORT_EQUIPMENT_PACKING_INSTRUCTION = '131';

    /**
     * Transport equipment pick-up availability confirmation (115)
     *
     * Confirmation that an item of transport equipment is available for
     * collection.
     */
    case TRANSPORT_EQUIPMENT_PICKUP_AVAILABILITY_CONFIRMATION = '115';

    /**
     * Transport equipment pick-up availability request (114)
     *
     * Request for confirmation that an item of transport equipment will be
     * available for collection.
     */
    case TRANSPORT_EQUIPMENT_PICKUP_AVAILABILITY_REQUEST = '114';

    /**
     * Transport equipment pick-up report (116)
     *
     * Report that an item of transport equipment has been collected.
     */
    case TRANSPORT_EQUIPMENT_PICKUP_REPORT = '116';

    /**
     * Transport equipment profile report (436)
     *
     * Report on the profile of transport equipment.
     */
    case TRANSPORT_EQUIPMENT_PROFILE_REPORT = '436';

    /**
     * Transport equipment shift report (117)
     *
     * Report on the movement of containers or other items of transport within a
     * facility.
     */
    case TRANSPORT_EQUIPMENT_SHIFT_REPORT = '117';

    /**
     * Transport equipment special service instruction (127)
     *
     * Instruction to perform a specified service or services on an item or items
     * of transport equipment.
     */
    case TRANSPORT_EQUIPMENT_SPECIAL_SERVICE_INSTRUCTION = '127';

    /**
     * Transport equipment status change report (266)
     *
     * Report on one or more changes of status associated with an item or items of
     * transport equipment.
     */
    case TRANSPORT_EQUIPMENT_STATUS_CHANGE_REPORT = '266';

    /**
     * Transport equipment stock report (128)
     *
     * Report on the number of items of transport equipment stored at one or more
     * locations.
     */
    case TRANSPORT_EQUIPMENT_STOCK_REPORT = '128';

    /**
     * Transport equipment survey order (137)
     *
     * Order to perform a survey on specified items of transport equipment.
     */
    case TRANSPORT_EQUIPMENT_SURVEY_ORDER = '137';

    /**
     * Transport equipment survey order response (138)
     *
     * Response to an order to conduct a survey of transport equipment.
     */
    case TRANSPORT_EQUIPMENT_SURVEY_ORDER_RESPONSE = '138';

    /**
     * Transport equipment survey report (139)
     *
     * Survey report of specified items of transport equipment.
     */
    case TRANSPORT_EQUIPMENT_SURVEY_REPORT = '139';

    /**
     * Transport equipment unpacking instruction (112)
     *
     * Instruction to unpack specified cargo from specified containers or other
     * items of transport equipment.
     */
    case TRANSPORT_EQUIPMENT_UNPACKING_INSTRUCTION = '112';

    /**
     * Transport equipment unpacking report (113)
     *
     * Report on the completion of unpacking specified containers or other items
     * of transport equipment.
     */
    case TRANSPORT_EQUIPMENT_UNPACKING_REPORT = '113';

    /**
     * Transport loading instruction (121)
     *
     * Instruction to load cargo, containers or transport equipment onto a means
     * of transport.
     */
    case TRANSPORT_LOADING_INSTRUCTION = '121';

    /**
     * Transport loading report (122)
     *
     * Report on completion of loading cargo, containers or other transport
     * equipment onto a means of transport.
     */
    case TRANSPORT_LOADING_REPORT = '122';

    /**
     * Transport Means Security Report (588)
     *
     * A document reporting the security status and related information of a means
     * of transport.
     */
    case TRANSPORT_MEANS_SECURITY_REPORT = '588';

    /**
     * Transport movement gate in report (109)
     *
     * Report on the inward movement of cargo, containers or other items of
     * transport equipment which have been delivered to a facility by an inland
     * carrier.
     */
    case TRANSPORT_MOVEMENT_GATE_IN_REPORT = '109';

    /**
     * Transport movement gate out report (111)
     *
     * Report on the outward movement of cargo, containers or other items of
     * transport equipment (either full or empty) which have been picked up by an
     * inland carrier.
     */
    case TRANSPORT_MOVEMENT_GATE_OUT_REPORT = '111';

    /**
     * Transport routing information (441)
     *
     * Document specifying the routes for transport between locations.
     */
    case TRANSPORT_ROUTING_INFORMATION = '441';

    /**
     * Transport status report (44)
     *
     * (1125) A message to report the transport status and/or change in the
     * transport status (i.e. event) between agreed parties.
     */
    case TRANSPORT_STATUS_REPORT = '44';

    /**
     * Transport status request (45)
     *
     * (1127) A message to request a transport status report (e.g. through the
     * national multimodal status report message IFSTA).
     */
    case TRANSPORT_STATUS_REQUEST = '45';

    /**
     * Transshipment despatch advice (399)
     *
     * Document by means of which the supplier or consignor informs the buyer,
     * consignee or the distribution centre about the despatch of goods for
     * transshipment.
     */
    case TRANSSHIPMENT_DESPATCH_ADVICE = '399';

    /**
     * Travel ticket (459)
     *
     * The document is a ticket giving access to a travel service.
     */
    case TRAVEL_TICKET = '459';

    /**
     * Treatment - nil outturn (59)
     *
     * No shortage, surplus or damaged outturn resulting from container vessel
     * unpacking.
     */
    case TREATMENT_NIL_OUTTURN = '59';

    /**
     * Treatment - personal effect (62)
     *
     * Cargo consists of personal effects.
     */
    case TREATMENT_PERSONAL_EFFECT = '62';

    /**
     * Treatment - timber (63)
     *
     * Cargo consists of timber.
     */
    case TREATMENT_TIMBER = '63';

    /**
     * Treatment - time-up underbond (60)
     *
     * Movement type indicator: goods are moved under customs control for
     * warehousing due to being time-up.
     */
    case TREATMENT_TIMEUP_UNDERBOND = '60';

    /**
     * Treatment - underbond by sea (61)
     *
     * Movement type indicator: goods are to move by sea under customs control to
     * a customs office where formalities will be completed.
     */
    case TREATMENT_UNDERBOND_BY_SEA = '61';

    /**
     * Underbond approval (32)
     *
     * A message/document issuing Customs approval to move cargo from one Customs
     * control point to another.
     */
    case UNDERBOND_APPROVAL = '32';

    /**
     * Underbond request (31)
     *
     * A Message/document requesting to move cargo from one Customs control point
     * to another.
     */
    case UNDERBOND_REQUEST = '31';

    /**
     * United Nations standard message request (285)
     *
     * Requesting a United Nations Standard Message (UNSM).
     */
    case UNITED_NATIONS_STANDARD_MESSAGE_REQUEST = '285';

    /**
     * Universal (multipurpose) transport document (701)
     *
     * Document/message evidencing a contract of carriage covering the movement of
     * goods by any mode of transport, or combination of modes, for national as
     * well as international transport, under any applicable international
     * convention or national law and under the conditions of carriage of any
     * carrier or transport operator undertaking or arranging the transport
     * referred to in the document.
     */
    case UNIVERSAL_MULTIPURPOSE_TRANSPORT_DOCUMENT = '701';

    /**
     * Unpriced bill of quantity (208)
     *
     * Document/message providing a detailed, quantity based specification, issued
     * in an unpriced form to invite tender prices.
     */
    case UNPRICED_BILL_OF_QUANTITY = '208';

    /**
     * Unship permit (72)
     *
     * A message or document issuing permission to unship cargo.
     */
    case UNSHIP_PERMIT = '72';

    /**
     * US, FATCA statement (814)
     *
     * Statement regarding the Foreign Account Tax Compliance Act (FATCA) of the
     * United States of America.
     */
    case US_FATCA_STATEMENT = '814';

    /**
     * User directory definition (284)
     *
     * Document/message defining the contents of a user directory set or parts
     * thereof.
     */
    case USER_DIRECTORY_DEFINITION = '284';

    /**
     * Utilities time series message (411)
     *
     * The Utilities time series message is sent between responsible parties in a
     * utilities infrastructure for the purpose of reporting time series and
     * connected technical and/or administrative information.
     */
    case UTILITIES_TIME_SERIES_MESSAGE = '411';

    /**
     * Vaccination certificate (38)
     *
     * Official document proving immunisation against certain diseases.
     */
    case VACCINATION_CERTIFICATE = '38';

    /**
     * Validated priced tender (50)
     *
     * A validated priced tender.
     */
    case VALIDATED_PRICED_TENDER = '50';

    /**
     * Valuation report (829)
     *
     * Document reporting a valuation.
     */
    case VALUATION_REPORT = '829';

    /**
     * Value declaration (934)
     *
     * Document/message in which a declarant (importer) states the invoice or
     * other price (e.g. selling price, price of identical goods), and specifies
     * costs for freight, insurance and packing, etc., terms of delivery and
     * payment, any relationship with the trading partner, etc., for the purpose
     * of determining the Customs value of goods imported.
     */
    case VALUE_DECLARATION = '934';

    /**
     * Vehicle aboard document (857)
     *
     * Document which must be aboard the vehicle.
     */
    case VEHICLE_ABOARD_DOCUMENT = '857';

    /**
     * Vessel unpack report (86)
     *
     * A document code to indicate that the message being transmitted identifies
     * all short and surplus cargoes off-loaded from a vessel at a specified
     * discharging port.
     */
    case VESSEL_UNPACK_REPORT = '86';

    /**
     * Veterinary certificate (853)
     *
     * Document/message issued by the competent authority in the exporting country
     * evidencing that live animals or birds are not infested or infected with
     * disease, and giving details regarding their provenance, and of vaccinations
     * and other treatment to which they have been subjected.
     */
    case VETERINARY_CERTIFICATE = '853';

    /**
     * Veterinary quarantine certificate (629)
     *
     * A certification that livestock or animal products, that are either imported
     * or entering free zones, are kept under health supervision for a time period
     * determined by veterinary quarantine instructions.
     */
    case VETERINARY_QUARANTINE_CERTIFICATE = '629';

    /**
     * Video (866)
     *
     * Document consisting of a video.
     */
    case VIDEO = '866';

    /**
     * Visa (483)
     *
     * An endorsement on a passport or any other recognised travel document
     * indicating that it has been examined and found correct, especially as
     * permitting the holder to enter or leave a country.
     */
    case VISA = '483';

    /**
     * Wage determination (160)
     *
     * A document indicating a determination of the wages to be paid.
     */
    case WAGE_DETERMINATION = '160';

    /**
     * Wagon report (970)
     *
     * Document which contains consignment information concerning the wagons and
     * their lading in a case of a multiple wagon consignment.
     */
    case WAGON_REPORT = '970';

    /**
     * Warehouse warrant (635)
     *
     * Negotiable receipt document, issued by a Warehouse Keeper to a person
     * placing goods in a warehouse and conferring title to the goods stored.
     */
    case WAREHOUSE_WARRANT = '635';

    /**
     * Waste disposal report (470)
     *
     * Document/message sent by a shipping agent to an authority for reporting
     * information on waste disposal.
     */
    case WASTE_DISPOSAL_REPORT = '470';

    /**
     * Waybill (700)
     *
     * Non-negotiable document evidencing the contract for the transport of cargo.
     */
    case WAYBILL = '700';

    /**
     * WCO Cargo Report Export, Air or Maritime (419)
     *
     * Declaration, in accordance with the WCO Customs Data Model, to Customs
     * concerning the export of cargo carried by commercial means of transport
     * over water or through the air, e.g. vessel or aircraft.
     */
    case WCO_CARGO_REPORT_EXPORT_AIR_OR_MARITIME = '419';

    /**
     * WCO Cargo Report Export, Rail or Road (418)
     *
     * Declaration, in accordance with the WCO Customs Data Model, to Customs
     * concerning the export of cargo carried by commercial means of transport
     * over land, e.g. truck or train.
     */
    case WCO_CARGO_REPORT_EXPORT_RAIL_OR_ROAD = '418';

    /**
     * WCO Cargo Report Import, Air or Maritime (422)
     *
     * Declaration, in accordance with the WCO Customs Data Model, to Customs
     * concerning the import of cargo carried by commercial means of transport
     * over water or through the air, e.g. vessel or aircraft.
     */
    case WCO_CARGO_REPORT_IMPORT_AIR_OR_MARITIME = '422';

    /**
     * WCO Cargo Report Import, Rail or Road (421)
     *
     * Declaration, in accordance with the WCO Customs Data Model, to Customs
     * concerning the import of cargo carried by commercial means of transport
     * over land, e.g. truck or train.
     */
    case WCO_CARGO_REPORT_IMPORT_RAIL_OR_ROAD = '421';

    /**
     * WCO Conveyance Arrival Report (524)
     *
     * Declaration, in accordance with the WCO Customs Data Model, to Customs
     * regarding the conveyance arriving in a Customs territory.
     */
    case WCO_CONVEYANCE_ARRIVAL_REPORT = '524';

    /**
     * WCO Conveyance Departure Report (525)
     *
     * Declaration, in accordance with the WCO Customs Data Model, to Customs
     * regarding the conveyance departing a Customs territory.
     */
    case WCO_CONVEYANCE_DEPARTURE_REPORT = '525';

    /**
     * WCO first step of two-step export declaration (424)
     *
     * First part of a simplified declaration, in accordance with the WCO Customs
     * Data Model, to Customs by which goods are declared for Customs export
     * procedure based on the 1999 Kyoto Convention.
     */
    case WCO_FIRST_STEP_OF_TWOSTEP_EXPORT_DECLARATION = '424';

    /**
     * WCO first step of two-step import declaration (497)
     *
     * First part of a simplified declaration, in accordance with the WCO Customs
     * Data Model, to Customs by which goods are declared for Customs import
     * procedure based on the 1999 Kyoto Convention.
     */
    case WCO_FIRST_STEP_OF_TWOSTEP_IMPORT_DECLARATION = '497';

    /**
     * WCO one-step export declaration (423)
     *
     * Single step declaration, in accordance with the WCO Customs Data Model, to
     * Customs by which goods are declared for a Customs export procedure based on
     * the 1999 Kyoto Convention.
     */
    case WCO_ONESTEP_EXPORT_DECLARATION = '423';

    /**
     * WCO one-step import declaration (496)
     *
     * Single step declaration, in accordance with the WCO Customs Data Model, to
     * Customs by which goods are declared for Customs import procedure based on
     * the 1999 Kyoto Convention.
     */
    case WCO_ONESTEP_IMPORT_DECLARATION = '496';

    /**
     * WCO second step of two-step export declaration (495)
     *
     * Second part of a simplified declaration, in accordance with the WCO Customs
     * Data Model, to Customs by which goods are declared for Customs export
     * procedure based on the 1999 Kyoto Convention.
     */
    case WCO_SECOND_STEP_OF_TWOSTEP_EXPORT_DECLARATION = '495';

    /**
     * WCO second step of two-step import declaration (498)
     *
     * Second part of a simplified declaration, in accordance with the WCO Customs
     * Data Model, to Customs by which goods are declared for Customs import
     * procedure based on the 1999 Kyoto Convention.
     */
    case WCO_SECOND_STEP_OF_TWOSTEP_IMPORT_DECLARATION = '498';

    /**
     * Weight certificate (14)
     *
     * Certificate certifying the weight of goods.
     */
    case WEIGHT_CERTIFICATE = '14';

    /**
     * Weight list (15)
     *
     * Document/message specifying the weight of goods.
     */
    case WEIGHT_LIST = '15';

    /**
     * Wine certificate (268)
     *
     * Certificate attesting to the quality, origin or appellation of wine.
     */
    case WINE_CERTIFICATE = '268';

    /**
     * Witness report (843)
     *
     * Document containing a report of a witness.
     */
    case WITNESS_REPORT = '843';

    /**
     * Wool health certificate (269)
     *
     * Certificate attesting that wool is free from specified risks to human or
     * animal health.
     */
    case WOOL_HEALTH_CERTIFICATE = '269';

    /**
     * Written instructions in conformance with ADR article number 10385 (48)
     *
     * Written instructions relating to dangerous goods and defined in the
     * European Agreement of Dangerous Transport by Road known as ADR (Accord
     * europeen relatif au transport international des marchandises Dangereuses
     * par Route).
     */
    case WRITTEN_INSTRUCTIONS_IN_CONFORMANCE_WITH_ADR_ARTICLE_NUMBER = '48';

    /**
     * Returns the caption of the code
     *
     * @return string
     * @codeCoverageIgnore
     */
    final public function getCaption(): string
    {
        return match($this)
        {
            InvoiceSuiteCodelistDocumentTypes::A_CLAIM_FOR_PARTS_ANDOR_LABOUR_CHARGES => "A claim for parts and/or labour charges",
            InvoiceSuiteCodelistDocumentTypes::ACCOUNTING_STATEMENT => "Accounting statement",
            InvoiceSuiteCodelistDocumentTypes::ACCOUNTING_VOUCHER => "Accounting voucher",
            InvoiceSuiteCodelistDocumentTypes::ACKNOWLEDGEMENT_MESSAGE => "Acknowledgement message",
            InvoiceSuiteCodelistDocumentTypes::ACKNOWLEDGEMENT_OF_CHANGE_OF_SUPPLIER => "Acknowledgement of change of supplier",
            InvoiceSuiteCodelistDocumentTypes::ACKNOWLEDGEMENT_OF_ORDER => "Acknowledgement of order",
            InvoiceSuiteCodelistDocumentTypes::ACKNOWLEDGMENT_OF_RECEIPT => "Acknowledgment of receipt",
            InvoiceSuiteCodelistDocumentTypes::ADVICE_OF_AN_AMENDMENT_OF_A_DOCUMENTARY_CREDIT => "Advice of an amendment of a documentary credit",
            InvoiceSuiteCodelistDocumentTypes::ADVICE_OF_COLLECTION => "Advice of collection",
            InvoiceSuiteCodelistDocumentTypes::ADVICE_OF_DISTRIBUTION_OF_DOCUMENTS => "Advice of distribution of documents",
            InvoiceSuiteCodelistDocumentTypes::ADVICE_REPORT => "Advice report",
            InvoiceSuiteCodelistDocumentTypes::ADVISING_ITEMS_TO_BE_BOOKED_TO_A_FINANCIAL_ACCOUNT => "Advising items to be booked to a financial account",
            InvoiceSuiteCodelistDocumentTypes::AEO_CERTIFICATE_FULL => "AEO Certificate Full",
            InvoiceSuiteCodelistDocumentTypes::AEO_CERTIFICATE_OF_CONFORMITY_OR_COMPLIANCE => "AEO Certificate of Conformity or Compliance",
            InvoiceSuiteCodelistDocumentTypes::AEO_CERTIFICATE_OF_SECURITY_ANDOR_SAFETY => "AEO Certificate of Security and/or Safety",
            InvoiceSuiteCodelistDocumentTypes::AGREEMENT_TO_PAY => "Agreement to pay",
            InvoiceSuiteCodelistDocumentTypes::AIR_WAYBILL => "Air waybill",
            InvoiceSuiteCodelistDocumentTypes::AMICABLE_AGREEMENT => "Amicable agreement",
            InvoiceSuiteCodelistDocumentTypes::ANNOUNCEMENT_FOR_RETURNS => "Announcement for returns",
            InvoiceSuiteCodelistDocumentTypes::APPLICATION_ACKNOWLEDGEMENT_AND_ERROR_REPORT => "Application acknowledgement and error report",
            InvoiceSuiteCodelistDocumentTypes::APPLICATION_ERROR_AND_ACKNOWLEDGEMENT => "Application error and acknowledgement",
            InvoiceSuiteCodelistDocumentTypes::APPLICATION_ERROR_MESSAGE => "Application error message",
            InvoiceSuiteCodelistDocumentTypes::APPLICATION_FOR_BANKERS_DRAFT => "Application for bankers draft",
            InvoiceSuiteCodelistDocumentTypes::APPLICATION_FOR_BANKERS_GUARANTEE => "Application for bankers guarantee",
            InvoiceSuiteCodelistDocumentTypes::APPLICATION_FOR_DESIGNATION_OF_BERTHING_PLACES => "Application for designation of berthing places",
            InvoiceSuiteCodelistDocumentTypes::APPLICATION_FOR_DOCUMENTARY_CREDIT => "Application for documentary credit",
            InvoiceSuiteCodelistDocumentTypes::APPLICATION_FOR_EXCHANGE_ALLOCATION => "Application for exchange allocation",
            InvoiceSuiteCodelistDocumentTypes::APPLICATION_FOR_GOODS_CONTROL_CERTIFICATE => "Application for goods control certificate",
            InvoiceSuiteCodelistDocumentTypes::APPLICATION_FOR_INSPECTION_CERTIFICATE => "Application for inspection certificate",
            InvoiceSuiteCodelistDocumentTypes::APPLICATION_FOR_PHYTOSANITARY_CERTIFICATE => "Application for phytosanitary certificate",
            InvoiceSuiteCodelistDocumentTypes::APPLICATION_FOR_SHIFTING_FROM_THE_DESIGNATED_PLACE_IN_PORT => "Application for shifting from the designated place in port",
            InvoiceSuiteCodelistDocumentTypes::APPLICATION_FOR_USAGE_OF_BERTH_OR_MOORING_FACILITIES => "Application for usage of berth or mooring facilities",
            InvoiceSuiteCodelistDocumentTypes::APPLICATION_FOR_VESSELS_ENTERING_INTO_PORT_AREA_IN_NIGHTTIME => "Application for vessels entering into port area in night-time",
            InvoiceSuiteCodelistDocumentTypes::APPROVED_UNPRICED_BILL_OF_QUANTITY => "Approved unpriced bill of quantity",
            InvoiceSuiteCodelistDocumentTypes::ARRIVAL_INFORMATION => "Arrival information",
            InvoiceSuiteCodelistDocumentTypes::ARRIVAL_NOTICE_GOODS => "Arrival notice (goods)",
            InvoiceSuiteCodelistDocumentTypes::ASSESSMENT_REPORT => "Assessment report",
            InvoiceSuiteCodelistDocumentTypes::ATA_CARNET => "ATA carnet",
            InvoiceSuiteCodelistDocumentTypes::AUDIO => "Audio",
            InvoiceSuiteCodelistDocumentTypes::AUTHORISATION_TO_PLAN_AND_SHIP_ORDERS => "Authorisation to plan and ship orders",
            InvoiceSuiteCodelistDocumentTypes::AUTHORISATION_TO_PLAN_AND_SUGGEST_ORDERS => "Authorisation to plan and suggest orders",
            InvoiceSuiteCodelistDocumentTypes::BAILMENT_CONTRACT => "Bailment contract",
            InvoiceSuiteCodelistDocumentTypes::BALANCE_CONFIRMATION => "Balance confirmation",
            InvoiceSuiteCodelistDocumentTypes::BANK_TO_BANK_FUNDS_TRANSFER => "Bank to bank funds transfer",
            InvoiceSuiteCodelistDocumentTypes::BANKERS_DRAFT => "Bankers draft",
            InvoiceSuiteCodelistDocumentTypes::BANKERS_GUARANTEE => "Bankers guarantee",
            InvoiceSuiteCodelistDocumentTypes::BANKING_STATUS => "Banking status",
            InvoiceSuiteCodelistDocumentTypes::BASIC_AGREEMENT => "Basic agreement",
            InvoiceSuiteCodelistDocumentTypes::BAYPLANSTOWAGE_PLAN_FULL => "Bayplan/stowage plan, full",
            InvoiceSuiteCodelistDocumentTypes::BAYPLANSTOWAGE_PLAN_PARTIAL => "Bayplan/stowage plan, partial",
            InvoiceSuiteCodelistDocumentTypes::BILL_OF_EXCHANGE => "Bill of exchange",
            InvoiceSuiteCodelistDocumentTypes::BILL_OF_LADING => "Bill of lading",
            InvoiceSuiteCodelistDocumentTypes::BILL_OF_LADING_COPY => "Bill of lading copy",
            InvoiceSuiteCodelistDocumentTypes::BILL_OF_LADING_ORIGINAL => "Bill of lading original",
            InvoiceSuiteCodelistDocumentTypes::BINDING_CUSTOMER_AGREEMENT_FOR_CONTRACT => "Binding customer agreement for contract",
            InvoiceSuiteCodelistDocumentTypes::BINDING_OFFER => "Binding offer",
            InvoiceSuiteCodelistDocumentTypes::BLANKET_ORDER => "Blanket order",
            InvoiceSuiteCodelistDocumentTypes::BOOKING_CONFIRMATION => "Booking confirmation",
            InvoiceSuiteCodelistDocumentTypes::BOOKING_REQUEST => "Booking request",
            InvoiceSuiteCodelistDocumentTypes::BORDEREAU => "Bordereau",
            InvoiceSuiteCodelistDocumentTypes::BUY_AMERICA_CERTIFICATE_OF_COMPLIANCE => "Buy America certificate of compliance",
            InvoiceSuiteCodelistDocumentTypes::CALCULATION_NOTE => "Calculation note",
            InvoiceSuiteCodelistDocumentTypes::CALL_FOR_TENDER => "Call for tender",
            InvoiceSuiteCodelistDocumentTypes::CALL_OFF_ORDER => "Call off order",
            InvoiceSuiteCodelistDocumentTypes::CALLOFF_DELIVERY => "Call-off delivery",
            InvoiceSuiteCodelistDocumentTypes::CALLING_FORWARD_NOTICE => "Calling forward notice",
            InvoiceSuiteCodelistDocumentTypes::CAMPAIGN_PRICESALES_CATALOGUE => "Campaign price/sales catalogue",
            InvoiceSuiteCodelistDocumentTypes::CARGO_ACCEPTANCE_ORDER => "Cargo acceptance order",
            InvoiceSuiteCodelistDocumentTypes::CARGO_ANALYSIS_VOYAGE_REPORT => "Cargo analysis voyage report",
            InvoiceSuiteCodelistDocumentTypes::CARGO_DECLARATION_ARRIVAL => "Cargo declaration (arrival)",
            InvoiceSuiteCodelistDocumentTypes::CARGO_DECLARATION_DEPARTURE => "Cargo declaration (departure)",
            InvoiceSuiteCodelistDocumentTypes::CARGO_MANIFEST => "Cargo manifest",
            InvoiceSuiteCodelistDocumentTypes::CARGO_MOVEMENT_EVENT_LOG => "Cargo movement event log",
            InvoiceSuiteCodelistDocumentTypes::CARGO_MOVEMENT_VOYAGE_SUMMARY => "Cargo movement voyage summary",
            InvoiceSuiteCodelistDocumentTypes::CARGO_RELEASE_NOTIFICATION => "Cargo release notification",
            InvoiceSuiteCodelistDocumentTypes::CARGO_STATUS => "Cargo status",
            InvoiceSuiteCodelistDocumentTypes::CARGO_VESSEL_DISCHARGE_ORDER => "Cargo vessel discharge order",
            InvoiceSuiteCodelistDocumentTypes::CARGO_VESSEL_LOADING_ORDER => "Cargo vessel loading order",
            InvoiceSuiteCodelistDocumentTypes::CARGOGOODS_HANDLING_AND_MOVEMENT_MESSAGE => "Cargo/goods handling and movement message",
            InvoiceSuiteCodelistDocumentTypes::CARTAGE_ORDER_LOCAL_TRANSPORT => "Cartage order (local transport)",
            InvoiceSuiteCodelistDocumentTypes::CASH_POOL_FINANCIAL_STATEMENT => "Cash pool financial statement",
            InvoiceSuiteCodelistDocumentTypes::CASING_SANITARY_CERTIFICATE => "Casing sanitary certificate",
            InvoiceSuiteCodelistDocumentTypes::CERTIFICATE => "Certificate",
            InvoiceSuiteCodelistDocumentTypes::CERTIFICATE_OF_ANALYSIS => "Certificate of analysis",
            InvoiceSuiteCodelistDocumentTypes::CERTIFICATE_OF_COMPLIANCE_WITH_STANDARDS_OF_THE_WORLD_ORGANIZATION_FOR_ANIMAL_HEALTH_OIE => "Certificate of compliance with standards of the World Organization for Animal Health (OIE)",
            InvoiceSuiteCodelistDocumentTypes::CERTIFICATE_OF_CONFORMITY => "Certificate of conformity",
            InvoiceSuiteCodelistDocumentTypes::CERTIFICATE_OF_DISEMBARKATION_PERMISSION => "Certificate of disembarkation permission",
            InvoiceSuiteCodelistDocumentTypes::CERTIFICATE_OF_FOOD_ITEM_TRANSPORT_READINESS => "Certificate of food item transport readiness",
            InvoiceSuiteCodelistDocumentTypes::CERTIFICATE_OF_ORIGIN => "Certificate of origin",
            InvoiceSuiteCodelistDocumentTypes::CERTIFICATE_OF_ORIGIN_FORM_GSP => "Certificate of origin form GSP",
            InvoiceSuiteCodelistDocumentTypes::CERTIFICATE_OF_ORIGIN_APPLICATION_FOR => "Certificate of origin, application for",
            InvoiceSuiteCodelistDocumentTypes::CERTIFICATE_OF_PAID_INSURANCE_PREMIUM => "Certificate of paid insurance premium",
            InvoiceSuiteCodelistDocumentTypes::CERTIFICATE_OF_QUALITY => "Certificate of quality",
            InvoiceSuiteCodelistDocumentTypes::CERTIFICATE_OF_QUANTITY => "Certificate of quantity",
            InvoiceSuiteCodelistDocumentTypes::CERTIFICATE_OF_REFRIGERATED_TRANSPORT_EQUIPMENT_INSPECTION => "Certificate of refrigerated transport equipment inspection",
            InvoiceSuiteCodelistDocumentTypes::CERTIFICATE_OF_REGISTRY => "Certificate of registry",
            InvoiceSuiteCodelistDocumentTypes::CERTIFICATE_OF_SEALING_OF_EXPORT_MEAT_LOCKERS => "Certificate of sealing of export meat lockers",
            InvoiceSuiteCodelistDocumentTypes::CERTIFICATE_OF_SHIPMENT => "Certificate of shipment",
            InvoiceSuiteCodelistDocumentTypes::CERTIFICATE_OF_SUITABILITY_FOR_TRANSPORT_OF_GRAINS_AND_LEGUMES => "Certificate of suitability for transport of grains and legumes",
            InvoiceSuiteCodelistDocumentTypes::CERTIFICATE_OF_SUSTAINABILITY => "Certificate of sustainability",
            InvoiceSuiteCodelistDocumentTypes::CERTIFIED_COST_AND_PRICE_DATA => "Certified cost and price data",
            InvoiceSuiteCodelistDocumentTypes::CERTIFIED_INSPECTION_AND_TEST_RESULTS => "Certified inspection and test results",
            InvoiceSuiteCodelistDocumentTypes::CERTIFIED_LIST_OF_INGREDIENTS => "Certified list of ingredients",
            InvoiceSuiteCodelistDocumentTypes::CHARGEBACK => "Chargeback",
            InvoiceSuiteCodelistDocumentTypes::CHARGES_NOTE => "Charges note",
            InvoiceSuiteCodelistDocumentTypes::CIVIL_LIABILITY_FOR_OIL_CERTIFICATE => "Civil liability for oil certificate",
            InvoiceSuiteCodelistDocumentTypes::CIVIL_STATUS_DOCUMENT => "Civil status document",
            InvoiceSuiteCodelistDocumentTypes::CLAIM_HISTORY_CERTIFICATE => "Claim history certificate",
            InvoiceSuiteCodelistDocumentTypes::CLAIM_NOTIFICATION => "Claim notification",
            InvoiceSuiteCodelistDocumentTypes::CLOSE_OF_CLAIM => "Close of claim",
            InvoiceSuiteCodelistDocumentTypes::CLOSING_STATEMENT_OF_AN_ACCOUNT => "Closing statement of an account",
            InvoiceSuiteCodelistDocumentTypes::COINSURANCE_CEDING_BORDEREAU => "Co-insurance ceding bordereau",
            InvoiceSuiteCodelistDocumentTypes::CODE_CHANGE_REQUEST => "Code change request",
            InvoiceSuiteCodelistDocumentTypes::COLLATERAL_ACCOUNT => "Collateral account",
            InvoiceSuiteCodelistDocumentTypes::COLLECTION_ORDER => "Collection order",
            InvoiceSuiteCodelistDocumentTypes::COLLECTION_PAYMENT_ADVICE => "Collection payment advice",
            InvoiceSuiteCodelistDocumentTypes::COMBINED_CERTIFICATE_OF_VALUE_AND_ORIGIN => "Combined certificate of value and origin",
            InvoiceSuiteCodelistDocumentTypes::COMBINED_TRANSPORT_BILL_OF_LADINGMULTIMODAL_BILL_OF_LADING => "Combined transport bill of lading/multimodal bill of lading",
            InvoiceSuiteCodelistDocumentTypes::COMBINED_TRANSPORT_DOCUMENT_GENERIC => "Combined transport document (generic)",
            InvoiceSuiteCodelistDocumentTypes::COMMERCIAL_ACCOUNT_SUMMARY => "Commercial account summary",
            InvoiceSuiteCodelistDocumentTypes::COMMERCIAL_ACCOUNT_SUMMARY_RESPONSE => "Commercial account summary response",
            InvoiceSuiteCodelistDocumentTypes::COMMERCIAL_DISPUTE => "Commercial dispute",
            InvoiceSuiteCodelistDocumentTypes::COMMERCIAL_INVOICE => "Commercial invoice",
            InvoiceSuiteCodelistDocumentTypes::COMMERCIAL_INVOICE_WHICH_INCLUDES_A_PACKING_LIST => "Commercial invoice which includes a packing list",
            InvoiceSuiteCodelistDocumentTypes::COMMISSION_NOTE => "Commission note",
            InvoiceSuiteCodelistDocumentTypes::COMMUNICATION_FROM_OPPOSITE_PARTY => "Communication from opposite party",
            InvoiceSuiteCodelistDocumentTypes::COMPOSITE_DATA_ELEMENT_CHANGE_REQUEST => "Composite data element change request",
            InvoiceSuiteCodelistDocumentTypes::COMPOSITE_DATA_ELEMENT_REQUEST => "Composite data element request",
            InvoiceSuiteCodelistDocumentTypes::CONSIGNMENT_DESPATCH_ADVICE => "Consignment despatch advice",
            InvoiceSuiteCodelistDocumentTypes::CONSIGNMENT_INVOICE => "Consignment invoice",
            InvoiceSuiteCodelistDocumentTypes::CONSIGNMENT_ORDER => "Consignment order",
            InvoiceSuiteCodelistDocumentTypes::CONSIGNMENT_STATUS_REPORT => "Consignment status report",
            InvoiceSuiteCodelistDocumentTypes::CONSIGNMENT_UNPACK_REPORT => "Consignment unpack report",
            InvoiceSuiteCodelistDocumentTypes::CONSOLIDATED_CREDIT_NOTE_GOODS_AND_SERVICES => "Consolidated credit note - goods and services",
            InvoiceSuiteCodelistDocumentTypes::CONSOLIDATED_INVOICE => "Consolidated invoice",
            InvoiceSuiteCodelistDocumentTypes::CONSULAR_INVOICE => "Consular invoice",
            InvoiceSuiteCodelistDocumentTypes::CONTAINER_DISCHARGE_LIST => "Container discharge list",
            InvoiceSuiteCodelistDocumentTypes::CONTAINER_LIST => "Container list",
            InvoiceSuiteCodelistDocumentTypes::CONTAINER_MANIFEST_UNIT_PACKING_LIST => "Container manifest (unit packing list)",
            InvoiceSuiteCodelistDocumentTypes::CONTAINER_OFFHIRE_NOTICE => "Container off-hire notice",
            InvoiceSuiteCodelistDocumentTypes::CONTAINER_STRIPPING_ORDER => "Container stripping order",
            InvoiceSuiteCodelistDocumentTypes::CONTAINER_STUFFING_ORDER => "Container stuffing order",
            InvoiceSuiteCodelistDocumentTypes::CONTAINER_TRANSFER_NOTE => "Container transfer note",
            InvoiceSuiteCodelistDocumentTypes::CONTRACT => "Contract",
            InvoiceSuiteCodelistDocumentTypes::CONTRACT_BILL_OF_QUANTITIES_BOQ => "Contract bill of quantities - BOQ",
            InvoiceSuiteCodelistDocumentTypes::CONTRACT_CLAUSES => "Contract clauses",
            InvoiceSuiteCodelistDocumentTypes::CONTRACT_FUNDS_STATUS_REPORT_CFSR => "Contract Funds Status Report (CFSR)",
            InvoiceSuiteCodelistDocumentTypes::CONTRACT_PRICE_AND_DELIVERY_QUOTE => "Contract price and delivery quote",
            InvoiceSuiteCodelistDocumentTypes::CONTRACT_PRICE_QUOTE => "Contract price quote",
            InvoiceSuiteCodelistDocumentTypes::CONTRACT_SECURITY_CLASSIFICATION_SPECIFICATION => "Contract security classification specification",
            InvoiceSuiteCodelistDocumentTypes::CONTROL_DOCUMENT_T => "Control document T5",
            InvoiceSuiteCodelistDocumentTypes::CONVENTION_ON_INTERNATIONAL_TRADE_IN_ENDANGERED_SPECIES_OF_WILD_FAUNA_AND_FLORA_CITES_CERTIFICATE => "Convention on International Trade in Endangered Species of Wild Fauna and Flora (CITES) Certificate",
            InvoiceSuiteCodelistDocumentTypes::CONVEYANCE_DECLARATION => "Conveyance declaration",
            InvoiceSuiteCodelistDocumentTypes::CONVEYANCE_DECLARATION_ARRIVAL => "Conveyance declaration (arrival)",
            InvoiceSuiteCodelistDocumentTypes::CONVEYANCE_DECLARATION_COMBINED => "Conveyance declaration (combined)",
            InvoiceSuiteCodelistDocumentTypes::CONVEYANCE_DECLARATION_DEPARTURE => "Conveyance declaration (departure)",
            InvoiceSuiteCodelistDocumentTypes::COPY_ACCOUNTING_VOUCHER => "Copy accounting voucher",
            InvoiceSuiteCodelistDocumentTypes::CORPORATE_SUPERANNUATION_CONTRIBUTIONS_ADVICE => "Corporate superannuation contributions advice",
            InvoiceSuiteCodelistDocumentTypes::CORPORATE_SUPERANNUATION_MEMBER_MAINTENANCE_MESSAGE => "Corporate superannuation member maintenance message",
            InvoiceSuiteCodelistDocumentTypes::CORRECTED_INVOICE => "Corrected invoice",
            InvoiceSuiteCodelistDocumentTypes::COST_DATA_SUMMARY => "Cost data summary",
            InvoiceSuiteCodelistDocumentTypes::COST_PERFORMANCE_REPORT => "Cost performance report",
            InvoiceSuiteCodelistDocumentTypes::COST_PERFORMANCE_REPORT_CPR_FORMAT => "Cost Performance Report (CPR) format 1",
            InvoiceSuiteCodelistDocumentTypes::COST_PERFORMANCE_REPORT_CPR_FORMAT => "Cost Performance Report (CPR) format 2",
            InvoiceSuiteCodelistDocumentTypes::COST_PERFORMANCE_REPORT_CPR_FORMAT => "Cost Performance Report (CPR) format 3",
            InvoiceSuiteCodelistDocumentTypes::COST_PERFORMANCE_REPORT_CPR_FORMAT => "Cost Performance Report (CPR) format 4",
            InvoiceSuiteCodelistDocumentTypes::COST_PERFORMANCE_REPORT_CPR_FORMAT => "Cost Performance Report (CPR) format 5",
            InvoiceSuiteCodelistDocumentTypes::COST_SCHEDULE_STATUS_REPORT_CSSR => "Cost Schedule Status Report (CSSR)",
            InvoiceSuiteCodelistDocumentTypes::COURT_JUDGMENT => "Court judgment",
            InvoiceSuiteCodelistDocumentTypes::COVER_NOTE => "Cover note",
            InvoiceSuiteCodelistDocumentTypes::COVERAGE_CONFIRMATION_NOTE => "Coverage confirmation note",
            InvoiceSuiteCodelistDocumentTypes::CREDIT_ADVICE => "Credit advice",
            InvoiceSuiteCodelistDocumentTypes::CREDIT_COVER => "Credit cover",
            InvoiceSuiteCodelistDocumentTypes::CREDIT_NOTE => "Credit note",
            InvoiceSuiteCodelistDocumentTypes::CREDIT_NOTE_FOR_PRICE_VARIATION => "Credit note for price variation",
            InvoiceSuiteCodelistDocumentTypes::CREDIT_NOTE_RELATED_TO_FINANCIAL_ADJUSTMENTS => "Credit note related to financial adjustments",
            InvoiceSuiteCodelistDocumentTypes::CREDIT_NOTE_RELATED_TO_GOODS_OR_SERVICES => "Credit note related to goods or services",
            InvoiceSuiteCodelistDocumentTypes::CREW_LIST_DECLARATION => "Crew list declaration",
            InvoiceSuiteCodelistDocumentTypes::CREWS_EFFECTS_DECLARATION => "Crews effects declaration",
            InvoiceSuiteCodelistDocumentTypes::CROSS_DOCKING_DESPATCH_ADVICE => "Cross docking despatch advice",
            InvoiceSuiteCodelistDocumentTypes::CROSS_DOCKING_SERVICES_ORDER => "Cross docking services order",
            InvoiceSuiteCodelistDocumentTypes::CURRENT_ACCOUNT => "Current account",
            InvoiceSuiteCodelistDocumentTypes::CUSTOMER_PAYMENT_ORDERS => "Customer payment order(s)",
            InvoiceSuiteCodelistDocumentTypes::CUSTOMS_CLEARANCE_NOTICE => "Customs clearance notice",
            InvoiceSuiteCodelistDocumentTypes::CUSTOMS_CREW_AND_CONVEYANCE => "Customs crew and conveyance",
            InvoiceSuiteCodelistDocumentTypes::CUSTOMS_DECLARATION_POST_PARCELS => "Customs declaration (post parcels)",
            InvoiceSuiteCodelistDocumentTypes::CUSTOMS_DECLARATION_FOR_CARGO_EXAMINATION => "Customs declaration for cargo examination",
            InvoiceSuiteCodelistDocumentTypes::CUSTOMS_DECLARATION_FOR_CARGO_EXAMINATION_ALTERNATE => "Customs declaration for cargo examination, alternate",
            InvoiceSuiteCodelistDocumentTypes::CUSTOMS_DECLARATION_FOR_TIR_CARNET_GOODS => "Customs declaration for TIR Carnet goods",
            InvoiceSuiteCodelistDocumentTypes::CUSTOMS_DECLARATION_WITH_COMMERCIAL_AND_ITEM_DETAIL => "Customs declaration with commercial and item detail",
            InvoiceSuiteCodelistDocumentTypes::CUSTOMS_DECLARATION_WITHOUT_COMMERCIAL_DETAIL => "Customs declaration without commercial detail",
            InvoiceSuiteCodelistDocumentTypes::CUSTOMS_DECLARATION_WITHOUT_ITEM_DETAIL => "Customs declaration without item detail",
            InvoiceSuiteCodelistDocumentTypes::CUSTOMS_DELIVERY_NOTE => "Customs delivery note",
            InvoiceSuiteCodelistDocumentTypes::CUSTOMS_DOCUMENTS_EXPIRATION_NOTICE => "Customs documents expiration notice",
            InvoiceSuiteCodelistDocumentTypes::CUSTOMS_IMMEDIATE_RELEASE_DECLARATION => "Customs immediate release declaration",
            InvoiceSuiteCodelistDocumentTypes::CUSTOMS_INVOICE => "Customs invoice",
            InvoiceSuiteCodelistDocumentTypes::CUSTOMS_MANIFEST => "Customs manifest",
            InvoiceSuiteCodelistDocumentTypes::CUSTOMS_SUMMARY_DECLARATION_WITH_COMMERCIAL_DETAIL_ALTERNATE => "Customs summary declaration with commercial detail, alternate",
            InvoiceSuiteCodelistDocumentTypes::CUSTOMS_SUMMARY_DECLARATION_WITHOUT_COMMERCIAL_DETAIL_ALTERNATE => "Customs summary declaration without commercial detail, alternate",
            InvoiceSuiteCodelistDocumentTypes::DAMAGE_CERTIFICATION => "Damage certification",
            InvoiceSuiteCodelistDocumentTypes::DANGEROUS_GOODS_DECLARATION => "Dangerous goods declaration",
            InvoiceSuiteCodelistDocumentTypes::DANGEROUS_GOODS_LIST => "Dangerous goods list",
            InvoiceSuiteCodelistDocumentTypes::DANGEROUS_GOODS_NOTIFICATION_FOR_NONTANKER_VESSEL => "Dangerous Goods Notification for non-tanker vessel",
            InvoiceSuiteCodelistDocumentTypes::DANGEROUS_GOODS_NOTIFICATION_FOR_TANKER_VESSEL => "Dangerous Goods Notification for Tanker vessel",
            InvoiceSuiteCodelistDocumentTypes::DATA_PLOT_SHEET => "Data Plot Sheet",
            InvoiceSuiteCodelistDocumentTypes::DATA_PROTECTION_REGULATIONS_STATEMENT => "Data protection regulations statement",
            InvoiceSuiteCodelistDocumentTypes::DEBIT_ADVICE => "Debit advice",
            InvoiceSuiteCodelistDocumentTypes::DEBIT_NOTE => "Debit note",
            InvoiceSuiteCodelistDocumentTypes::DEBIT_NOTE_RELATED_TO_FINANCIAL_ADJUSTMENTS => "Debit note related to financial adjustments",
            InvoiceSuiteCodelistDocumentTypes::DEBIT_NOTE_RELATED_TO_GOODS_OR_SERVICES => "Debit note related to goods or services",
            InvoiceSuiteCodelistDocumentTypes::DECLARATION_FOR_RADIOACTIVE_MATERIAL => "Declaration for radioactive material",
            InvoiceSuiteCodelistDocumentTypes::DECLARATION_OF_FINAL_BENEFICIARY => "Declaration of final beneficiary",
            InvoiceSuiteCodelistDocumentTypes::DECLARATION_OF_ORIGIN => "Declaration of origin",
            InvoiceSuiteCodelistDocumentTypes::DECLARATION_REGARDING_THE_INWARD_AND_OUTWARD_MOVEMENT_OF_VESSEL => "Declaration regarding the inward and outward movement of vessel",
            InvoiceSuiteCodelistDocumentTypes::DELCREDERE_CREDIT_NOTE => "Delcredere credit note",
            InvoiceSuiteCodelistDocumentTypes::DELCREDERE_INVOICE => "Delcredere invoice",
            InvoiceSuiteCodelistDocumentTypes::DELIVERY_FORECAST => "Delivery forecast",
            InvoiceSuiteCodelistDocumentTypes::DELIVERY_INSTRUCTIONS => "Delivery instructions",
            InvoiceSuiteCodelistDocumentTypes::DELIVERY_JUSTINTIME => "Delivery just-in-time",
            InvoiceSuiteCodelistDocumentTypes::DELIVERY_NOTE => "Delivery note",
            InvoiceSuiteCodelistDocumentTypes::DELIVERY_NOTICE_GOODS => "Delivery notice (goods)",
            InvoiceSuiteCodelistDocumentTypes::DELIVERY_NOTICE_RAIL_TRANSPORT => "Delivery notice (rail transport)",
            InvoiceSuiteCodelistDocumentTypes::DELIVERY_ORDER => "Delivery order",
            InvoiceSuiteCodelistDocumentTypes::DELIVERY_POINT_LIST => "Delivery point list.",
            InvoiceSuiteCodelistDocumentTypes::DELIVERY_QUOTE => "Delivery quote",
            InvoiceSuiteCodelistDocumentTypes::DELIVERY_RELEASE => "Delivery release",
            InvoiceSuiteCodelistDocumentTypes::DELIVERY_SCHEDULE => "Delivery schedule",
            InvoiceSuiteCodelistDocumentTypes::DELIVERY_SCHEDULE_RESPONSE => "Delivery schedule response",
            InvoiceSuiteCodelistDocumentTypes::DELIVERY_VERIFICATION_CERTIFICATE => "Delivery verification certificate",
            InvoiceSuiteCodelistDocumentTypes::DERAT_DOCUMENT => "Derat document",
            InvoiceSuiteCodelistDocumentTypes::DERATTING_EXEMPTION_CERTIFICATE => "Deratting exemption certificate",
            InvoiceSuiteCodelistDocumentTypes::DESPATCH_ADVICE => "Despatch advice",
            InvoiceSuiteCodelistDocumentTypes::DESPATCH_NOTE_POST_PARCELS => "Despatch note (post parcels)",
            InvoiceSuiteCodelistDocumentTypes::DESPATCH_NOTE_MODEL_T => "Despatch note model T",
            InvoiceSuiteCodelistDocumentTypes::DESPATCH_NOTE_MODEL_T => "Despatch note model T1",
            InvoiceSuiteCodelistDocumentTypes::DESPATCH_NOTE_MODEL_T => "Despatch note model T2",
            InvoiceSuiteCodelistDocumentTypes::DESPATCH_NOTE_MODEL_TL => "Despatch note model T2L",
            InvoiceSuiteCodelistDocumentTypes::DESPATCH_ORDER => "Despatch order",
            InvoiceSuiteCodelistDocumentTypes::DIRECT_DEBIT_AUTHORISATION => "Direct debit authorisation",
            InvoiceSuiteCodelistDocumentTypes::DIRECT_DELIVERY_TRANSPORT => "Direct delivery (transport)",
            InvoiceSuiteCodelistDocumentTypes::DIRECT_PAYMENT_VALUATION => "Direct payment valuation",
            InvoiceSuiteCodelistDocumentTypes::DIRECT_PAYMENT_VALUATION_REQUEST => "Direct payment valuation request",
            InvoiceSuiteCodelistDocumentTypes::DOCUMENT_FOR_ESTABLISHING_THE_CUSTOMS_STATUS_OF_GOODS_FOR_SAN_MARINO_TLSM => "Document for establishing the Customs Status of goods for San Marino (T2LSM)",
            InvoiceSuiteCodelistDocumentTypes::DOCUMENT_RESPONSE_CUSTOMS => "Document response (Customs)",
            InvoiceSuiteCodelistDocumentTypes::DOCUMENTARY_CREDIT => "Documentary credit",
            InvoiceSuiteCodelistDocumentTypes::DOCUMENTARY_CREDIT_ACCEPTANCE_ADVICE => "Documentary credit acceptance advice",
            InvoiceSuiteCodelistDocumentTypes::DOCUMENTARY_CREDIT_AMENDMENT => "Documentary credit amendment",
            InvoiceSuiteCodelistDocumentTypes::DOCUMENTARY_CREDIT_AMENDMENT_INFORMATION => "Documentary credit amendment information",
            InvoiceSuiteCodelistDocumentTypes::DOCUMENTARY_CREDIT_AMENDMENT_NOTIFICATION => "Documentary credit amendment notification",
            InvoiceSuiteCodelistDocumentTypes::DOCUMENTARY_CREDIT_APPLICATION => "Documentary credit application",
            InvoiceSuiteCodelistDocumentTypes::DOCUMENTARY_CREDIT_COLLECTION_INSTRUCTION => "Documentary credit collection instruction",
            InvoiceSuiteCodelistDocumentTypes::DOCUMENTARY_CREDIT_ISSUANCE_INFORMATION => "Documentary credit issuance information",
            InvoiceSuiteCodelistDocumentTypes::DOCUMENTARY_CREDIT_LETTER_OF_INDEMNITY => "Documentary credit letter of indemnity",
            InvoiceSuiteCodelistDocumentTypes::DOCUMENTARY_CREDIT_NEGOTIATION_ADVICE => "Documentary credit negotiation advice",
            InvoiceSuiteCodelistDocumentTypes::DOCUMENTARY_CREDIT_NOTIFICATION => "Documentary credit notification",
            InvoiceSuiteCodelistDocumentTypes::DOCUMENTARY_CREDIT_PAYMENT_ADVICE => "Documentary credit payment advice",
            InvoiceSuiteCodelistDocumentTypes::DOCUMENTARY_CREDIT_TRANSFER_ADVICE => "Documentary credit transfer advice",
            InvoiceSuiteCodelistDocumentTypes::DOCUMENTS_PRESENTATION_FORM => "Documents presentation form",
            InvoiceSuiteCodelistDocumentTypes::DRAFT_BILL_OF_QUANTITY => "Draft bill of quantity",
            InvoiceSuiteCodelistDocumentTypes::DRAWING => "Drawing",
            InvoiceSuiteCodelistDocumentTypes::DRIVING_LICENCE_INTERNATIONAL => "Driving licence (international)",
            InvoiceSuiteCodelistDocumentTypes::DRIVING_LICENCE_NATIONAL => "Driving licence (national)",
            InvoiceSuiteCodelistDocumentTypes::DRUG_SHELF_LIFE_STUDY_REPORT => "Drug shelf life study report",
            InvoiceSuiteCodelistDocumentTypes::DUTY_SUSPENDED_GOODS => "Duty suspended goods",
            InvoiceSuiteCodelistDocumentTypes::EC_CARNET => "EC carnet",
            InvoiceSuiteCodelistDocumentTypes::EDI_ASSOCIATED_OBJECT_ADMINISTRATION_MESSAGE => "EDI associated object administration message",
            InvoiceSuiteCodelistDocumentTypes::EMBARGO_PERMIT => "Embargo permit",
            InvoiceSuiteCodelistDocumentTypes::EMPTY_CONTAINER_BILL => "Empty container bill",
            InvoiceSuiteCodelistDocumentTypes::EMPTY_CONTAINER_DISPOSITION_ORDER => "Empty container disposition order",
            InvoiceSuiteCodelistDocumentTypes::END_USE_AUTHORIZATION => "End use authorization",
            InvoiceSuiteCodelistDocumentTypes::ENQUIRY => "Enquiry",
            InvoiceSuiteCodelistDocumentTypes::ERROR_RESPONSE_CUSTOMS => "Error response (Customs)",
            InvoiceSuiteCodelistDocumentTypes::ESCORT_OFFICIAL_RECOGNITION => "Escort official recognition",
            InvoiceSuiteCodelistDocumentTypes::ESTIMATED_PRICED_BILL_OF_QUANTITY => "Estimated priced bill of quantity",
            InvoiceSuiteCodelistDocumentTypes::EU_CUSTOMS_DECLARATION_FOR_EXTERNAL_COMMUNITY_TRANSIT_T => "EU Customs declaration for External Community Transit (T1)",
            InvoiceSuiteCodelistDocumentTypes::EU_CUSTOMS_DECLARATION_FOR_INTERNAL_COMMUNITY_TRANSIT_T => "EU Customs declaration for internal Community Transit (T2)",
            InvoiceSuiteCodelistDocumentTypes::EU_CUSTOMS_DECLARATION_FOR_INTERNAL_TRANSIT_TO_SAN_MARINO_TSM => "EU Customs declaration for internal transit to San Marino (T2SM)",
            InvoiceSuiteCodelistDocumentTypes::EU_CUSTOMS_DECLARATION_FOR_MIXED_CONSIGNMENTS_T => "EU Customs declaration for mixed consignments (T)",
            InvoiceSuiteCodelistDocumentTypes::EU_CUSTOMS_DECLARATION_FOR_NONFISCAL_AREA_INTERNAL_COMMUNITY_TRANSIT_TF => "EU Customs declaration for non-fiscal area internal Community Transit (T2F)",
            InvoiceSuiteCodelistDocumentTypes::EU_DOCUMENT_FOR_ESTABLISHING_THE_COMMUNITY_STATUS_OF_GOODS_TL => "EU Document for establishing the Community status of goods (T2L)",
            InvoiceSuiteCodelistDocumentTypes::EU_DOCUMENT_FOR_ESTABLISHING_THE_COMMUNITY_STATUS_OF_GOODS_FOR_CERTAIN_FISCAL_PURPOSES_TLF => "EU Document for establishing the Community status of goods for certain fiscal purposes (T2LF)",
            InvoiceSuiteCodelistDocumentTypes::EUR__CERTIFICATE_OF_ORIGIN => "EUR 1 certificate of origin",
            InvoiceSuiteCodelistDocumentTypes::EUROPEAN_SINGLE_PROCUREMENT_DOCUMENT => "European Single Procurement Document",
            InvoiceSuiteCodelistDocumentTypes::EUROPEAN_SINGLE_PROCUREMENT_DOCUMENT_REQUEST => "European Single Procurement Document request",
            InvoiceSuiteCodelistDocumentTypes::EXCEPTIONAL_ORDER => "Exceptional order",
            InvoiceSuiteCodelistDocumentTypes::EXCHANGE_CONTROL_DECLARATION_IMPORT => "Exchange control declaration (import)",
            InvoiceSuiteCodelistDocumentTypes::EXCHANGE_CONTROL_DECLARATION_EXPORT => "Exchange control declaration, export",
            InvoiceSuiteCodelistDocumentTypes::EXCISE_CERTIFICATE => "Excise certificate",
            InvoiceSuiteCodelistDocumentTypes::EXCLUSIVE_BROKERAGE_MANDATE => "Exclusive brokerage mandate",
            InvoiceSuiteCodelistDocumentTypes::EXPORT_LICENCE => "Export licence",
            InvoiceSuiteCodelistDocumentTypes::EXPORT_LICENCE_APPLICATION_FOR => "Export licence, application for",
            InvoiceSuiteCodelistDocumentTypes::EXPORT_PRICE_CERTIFICATE => "Export price certificate",
            InvoiceSuiteCodelistDocumentTypes::EXTENDED_CREDIT_ADVICE => "Extended credit advice",
            InvoiceSuiteCodelistDocumentTypes::EXTENDED_PAYMENT_ORDER => "Extended payment order",
            InvoiceSuiteCodelistDocumentTypes::EXTRACOMMUNITY_TRADE_STATISTICAL_DECLARATION => "Extra-Community trade statistical declaration",
            InvoiceSuiteCodelistDocumentTypes::FACTORED_CREDIT_NOTE => "Factored credit note",
            InvoiceSuiteCodelistDocumentTypes::FACTORED_INVOICE => "Factored invoice",
            InvoiceSuiteCodelistDocumentTypes::FARMYARD_MANURE_ANALYSIS => "Farmyard manure analysis",
            InvoiceSuiteCodelistDocumentTypes::FEDERAL_LABEL_APPROVAL => "Federal label approval",
            InvoiceSuiteCodelistDocumentTypes::FINAL_CONSTRUCTION_INVOICE => "Final construction invoice",
            InvoiceSuiteCodelistDocumentTypes::FINAL_PAYMENT_REQUEST_BASED_ON_COMPLETION_OF_WORK => "Final payment request based on completion of work",
            InvoiceSuiteCodelistDocumentTypes::FIRST_SAMPLE_TEST_REPORT => "First sample test report",
            InvoiceSuiteCodelistDocumentTypes::FOOD_GRADE_CERTIFICATE => "Food grade certificate",
            InvoiceSuiteCodelistDocumentTypes::FOOD_PACKAGING_CONTACT_CERTIFICATE => "Food packaging contact certificate",
            InvoiceSuiteCodelistDocumentTypes::FOREIGN_EXCHANGE_PERMIT => "Foreign exchange permit",
            InvoiceSuiteCodelistDocumentTypes::FORWARDERS_ADVICE_TO_EXPORTER => "Forwarders advice to exporter",
            InvoiceSuiteCodelistDocumentTypes::FORWARDERS_ADVICE_TO_IMPORT_AGENT => "Forwarders advice to import agent",
            InvoiceSuiteCodelistDocumentTypes::FORWARDERS_BILL_OF_LADING => "Forwarders bill of lading",
            InvoiceSuiteCodelistDocumentTypes::FORWARDERS_CERTIFICATE_OF_RECEIPT => "Forwarders certificate of receipt",
            InvoiceSuiteCodelistDocumentTypes::FORWARDERS_CERTIFICATE_OF_TRANSPORT => "Forwarders certificate of transport",
            InvoiceSuiteCodelistDocumentTypes::FORWARDERS_INVOICE => "Forwarders invoice",
            InvoiceSuiteCodelistDocumentTypes::FORWARDERS_WAREHOUSE_RECEIPT => "Forwarders warehouse receipt",
            InvoiceSuiteCodelistDocumentTypes::FORWARDERS_CREDIT_NOTE => "Forwarder’s credit note",
            InvoiceSuiteCodelistDocumentTypes::FORWARDERS_INVOICE_DISCREPANCY_REPORT => "Forwarder’s invoice discrepancy report",
            InvoiceSuiteCodelistDocumentTypes::FORWARDING_INSTRUCTIONS => "Forwarding instructions",
            InvoiceSuiteCodelistDocumentTypes::FRAMEWORK_AGREEMENT => "Framework Agreement",
            InvoiceSuiteCodelistDocumentTypes::FREE_PASS => "Free pass",
            InvoiceSuiteCodelistDocumentTypes::FREE_SALE_CERTIFICATE_IN_THE_COUNTRY_OF_ORIGIN => "Free Sale Certificate in the Country of Origin",
            InvoiceSuiteCodelistDocumentTypes::FREIGHT_INVOICE => "Freight invoice",
            InvoiceSuiteCodelistDocumentTypes::FREIGHT_MANIFEST => "Freight manifest",
            InvoiceSuiteCodelistDocumentTypes::FUMIGATION_CERTIFICATE => "Fumigation certificate",
            InvoiceSuiteCodelistDocumentTypes::GATE_PASS => "Gate pass",
            InvoiceSuiteCodelistDocumentTypes::GENERAL_CARGO_SUMMARY_MANIFEST_REPORT => "General cargo summary manifest report",
            InvoiceSuiteCodelistDocumentTypes::GENERAL_MESSAGE => "General message",
            InvoiceSuiteCodelistDocumentTypes::GENERAL_RESPONSE_CUSTOMS => "General response (Customs)",
            InvoiceSuiteCodelistDocumentTypes::GENERAL_TERMS_AND_CONDITIONS => "General terms and conditions",
            InvoiceSuiteCodelistDocumentTypes::GOOD_MANUFACTURING_PRACTICE_GMP_CERTIFICATE => "Good Manufacturing Practice (GMP) Certificate",
            InvoiceSuiteCodelistDocumentTypes::GOODS_CONTROL_CERTIFICATE => "Goods control certificate",
            InvoiceSuiteCodelistDocumentTypes::GOODS_DECLARATION_FOR_CUSTOMS_TRANSIT => "Goods declaration for Customs transit",
            InvoiceSuiteCodelistDocumentTypes::GOODS_DECLARATION_FOR_EXPORTATION => "Goods declaration for exportation",
            InvoiceSuiteCodelistDocumentTypes::GOODS_DECLARATION_FOR_HOME_USE => "Goods declaration for home use",
            InvoiceSuiteCodelistDocumentTypes::GOODS_DECLARATION_FOR_IMPORTATION => "Goods declaration for importation",
            InvoiceSuiteCodelistDocumentTypes::GOODS_RECEIPT => "Goods receipt",
            InvoiceSuiteCodelistDocumentTypes::GOODS_RECEIPT_CARRIAGE => "Goods receipt, carriage",
            InvoiceSuiteCodelistDocumentTypes::GOVERNMENT_CONTRACT => "Government contract",
            InvoiceSuiteCodelistDocumentTypes::GRANT => "Grant",
            InvoiceSuiteCodelistDocumentTypes::GROUP_INSURANCE_RULES => "Group insurance rules",
            InvoiceSuiteCodelistDocumentTypes::GROUP_PENSION_COMMITMENT_INFORMATION => "Group pension commitment information",
            InvoiceSuiteCodelistDocumentTypes::GUARANTEE_OF_COST_ACCEPTANCE => "Guarantee of cost acceptance",
            InvoiceSuiteCodelistDocumentTypes::HALAL_SLAUGHTERING_CERTIFICATE => "Halal Slaughtering Certificate",
            InvoiceSuiteCodelistDocumentTypes::HANDLING_ORDER => "Handling order",
            InvoiceSuiteCodelistDocumentTypes::HEALTH_CERTIFICATE => "Health certificate",
            InvoiceSuiteCodelistDocumentTypes::HEALTHCARE_DISCHARGE_REPORT_FINAL => "Healthcare discharge report, final",
            InvoiceSuiteCodelistDocumentTypes::HEALTHCARE_DISCHARGE_REPORT_PRELIMINARY => "Healthcare discharge report, preliminary",
            InvoiceSuiteCodelistDocumentTypes::HEAT_TREATMENT_CERTIFICATE => "Heat Treatment Certificate",
            InvoiceSuiteCodelistDocumentTypes::HIRE_INVOICE => "Hire invoice",
            InvoiceSuiteCodelistDocumentTypes::HIRE_ORDER => "Hire order",
            InvoiceSuiteCodelistDocumentTypes::HORSEMEAT_SANITARY_CERTIFICATE => "Horsemeat sanitary certificate",
            InvoiceSuiteCodelistDocumentTypes::HOUSE_BILL_OF_LADING => "House bill of lading",
            InvoiceSuiteCodelistDocumentTypes::HOUSE_WAYBILL => "House waybill",
            InvoiceSuiteCodelistDocumentTypes::IDENTIFICATION_MATCH => "Identification match",
            InvoiceSuiteCodelistDocumentTypes::IDENTITY_CARD => "Identity card",
            InvoiceSuiteCodelistDocumentTypes::IMAGE => "Image",
            InvoiceSuiteCodelistDocumentTypes::IMPENDING_ARRIVAL => "Impending arrival",
            InvoiceSuiteCodelistDocumentTypes::IMPLEMENTATION_GUIDELINE => "Implementation guideline",
            InvoiceSuiteCodelistDocumentTypes::IMPORT_LICENCE => "Import licence",
            InvoiceSuiteCodelistDocumentTypes::IMPORT_LICENCE_APPLICATION_FOR => "Import licence, application for",
            InvoiceSuiteCodelistDocumentTypes::INDEFINITE_DELIVERY_DEFINITE_QUANTITY_CONTRACT => "Indefinite delivery definite quantity contract",
            InvoiceSuiteCodelistDocumentTypes::INDEFINITE_DELIVERY_INDEFINITE_QUANTITY_CONTRACT => "Indefinite delivery indefinite quantity contract",
            InvoiceSuiteCodelistDocumentTypes::INDUSTRY_SUPERANNUATION_CONTRIBUTIONS_ADVICE => "Industry superannuation contributions advice",
            InvoiceSuiteCodelistDocumentTypes::INDUSTRY_SUPERANNUATION_MEMBER_MAINTENANCE_MESSAGE => "Industry superannuation member maintenance message",
            InvoiceSuiteCodelistDocumentTypes::INEDIBLE_SANITARY_CERTIFICATE => "Inedible sanitary certificate",
            InvoiceSuiteCodelistDocumentTypes::INFRASTRUCTURE_CONDITION => "Infrastructure condition",
            InvoiceSuiteCodelistDocumentTypes::INLAND_WATERWAY_BILL_OF_LADING => "Inland waterway bill of lading",
            InvoiceSuiteCodelistDocumentTypes::INQUIRY => "Inquiry",
            InvoiceSuiteCodelistDocumentTypes::INQUIRY_MANDATE => "Inquiry mandate",
            InvoiceSuiteCodelistDocumentTypes::INSPECTION_CERTIFICATE => "Inspection certificate",
            InvoiceSuiteCodelistDocumentTypes::INSPECTION_REPORT => "Inspection report",
            InvoiceSuiteCodelistDocumentTypes::INSPECTION_REQUEST => "Inspection request",
            InvoiceSuiteCodelistDocumentTypes::INSTRUCTION_FOR_RETURNS => "Instruction for returns",
            InvoiceSuiteCodelistDocumentTypes::INSTRUCTION_TO_COLLECT => "Instruction to collect",
            InvoiceSuiteCodelistDocumentTypes::INSTRUCTIONS_FOR_BANK_TRANSFER => "Instructions for bank transfer",
            InvoiceSuiteCodelistDocumentTypes::INSURANCE_CERTIFICATE => "Insurance certificate",
            InvoiceSuiteCodelistDocumentTypes::INSURANCE_DECLARATION_SHEET_BORDEREAU => "Insurance declaration sheet (bordereau)",
            InvoiceSuiteCodelistDocumentTypes::INSURANCE_POLICY => "Insurance policy",
            InvoiceSuiteCodelistDocumentTypes::INSURED_PARTY_PAYMENT_REPORT => "Insured party payment report",
            InvoiceSuiteCodelistDocumentTypes::INSURED_STATUS_REPORT => "Insured status report",
            InvoiceSuiteCodelistDocumentTypes::INSURERS_INVOICE => "Insurers invoice",
            InvoiceSuiteCodelistDocumentTypes::INTERIM_APPLICATION_FOR_PAYMENT => "Interim application for payment",
            InvoiceSuiteCodelistDocumentTypes::INTERIM_INTERNATIONAL_SHIP_SECURITY_CERTIFICATE => "Interim International Ship Security Certificate",
            InvoiceSuiteCodelistDocumentTypes::INTERMEDIATE_HANDLING_CROSS_DOCKING_DESPATCH_ADVICE => "Intermediate handling cross docking despatch advice",
            InvoiceSuiteCodelistDocumentTypes::INTERMEDIATE_HANDLING_CROSS_DOCKING_ORDER => "Intermediate handling cross docking order",
            InvoiceSuiteCodelistDocumentTypes::INTERNAL_TRANSPORT_ORDER => "Internal transport order",
            InvoiceSuiteCodelistDocumentTypes::INTERNATIONAL_SHIP_SECURITY_CERTIFICATE => "International Ship Security Certificate",
            InvoiceSuiteCodelistDocumentTypes::INTRASTAT_DECLARATION => "INTRASTAT declaration",
            InvoiceSuiteCodelistDocumentTypes::INTRODUCTORY_LETTER => "Introductory letter",
            InvoiceSuiteCodelistDocumentTypes::INVENTORY_ADJUSTMENT_STATUS_REPORT => "Inventory adjustment status report",
            InvoiceSuiteCodelistDocumentTypes::INVENTORY_MOVEMENT_ADVICE => "Inventory movement advice",
            InvoiceSuiteCodelistDocumentTypes::INVENTORY_REPORT => "Inventory report",
            InvoiceSuiteCodelistDocumentTypes::INVENTORY_STATUS_ADVICE => "Inventory status advice",
            InvoiceSuiteCodelistDocumentTypes::INVITATION_TO_TENDER => "Invitation to tender",
            InvoiceSuiteCodelistDocumentTypes::INVOICE_INFORMATION_FOR_ACCOUNTING_PURPOSES => "Invoice information for accounting purposes",
            InvoiceSuiteCodelistDocumentTypes::INVOICING_DATA_SHEET => "Invoicing data sheet",
            InvoiceSuiteCodelistDocumentTypes::ITEMS_BOOKED_TO_A_FINANCIAL_ACCOUNT_REPORT => "Items booked to a financial account report",
            InvoiceSuiteCodelistDocumentTypes::KANBAN_SCHEDULE => "Kanban schedule",
            InvoiceSuiteCodelistDocumentTypes::LEASE_INVOICE => "Lease invoice",
            InvoiceSuiteCodelistDocumentTypes::LEASE_ORDER => "Lease order",
            InvoiceSuiteCodelistDocumentTypes::LEGAL_ACTION => "Legal action",
            InvoiceSuiteCodelistDocumentTypes::LEGAL_STATEMENT_OF_AN_ACCOUNT => "Legal statement of an account",
            InvoiceSuiteCodelistDocumentTypes::LETTER_OF_INDEMNITY_FOR_NONSURRENDER_OF_BILL_OF_LADING => "Letter of indemnity for non-surrender of bill of lading",
            InvoiceSuiteCodelistDocumentTypes::LETTER_OF_INTENT => "Letter of intent",
            InvoiceSuiteCodelistDocumentTypes::LIFE_INSURANCE_PAYROLL_DEDUCTIONS_ADVICE => "Life insurance payroll deductions advice",
            InvoiceSuiteCodelistDocumentTypes::LISTING_STATEMENT_OF_AN_ACCOUNT => "Listing statement of an account",
            InvoiceSuiteCodelistDocumentTypes::LOADLINE_DOCUMENT => "Loadline document",
            InvoiceSuiteCodelistDocumentTypes::LOSS_STATEMENT => "Loss statement",
            InvoiceSuiteCodelistDocumentTypes::LOW_RISK_COUNTRY_FORMAL_LETTER => "Low risk country formal letter",
            InvoiceSuiteCodelistDocumentTypes::LOW_VALUE_PAYMENT_ORDERS => "Low value payment order(s)",
            InvoiceSuiteCodelistDocumentTypes::MAKE_OR_BUY_PLAN => "Make or buy plan",
            InvoiceSuiteCodelistDocumentTypes::MANUFACTURER_RAISED_CONSIGNMENT_ORDER => "Manufacturer raised consignment order",
            InvoiceSuiteCodelistDocumentTypes::MANUFACTURER_RAISED_ORDER => "Manufacturer raised order",
            InvoiceSuiteCodelistDocumentTypes::MANUFACTURING_INSTRUCTIONS => "Manufacturing instructions",
            InvoiceSuiteCodelistDocumentTypes::MANUFACTURING_LICENSE => "Manufacturing license",
            InvoiceSuiteCodelistDocumentTypes::MANUFACTURING_SPECIFICATION => "Manufacturing specification",
            InvoiceSuiteCodelistDocumentTypes::MARITIME_DECLARATION_OF_HEALTH => "Maritime declaration of health",
            InvoiceSuiteCodelistDocumentTypes::MASTER_AIR_WAYBILL => "Master air waybill",
            InvoiceSuiteCodelistDocumentTypes::MASTER_BILL_OF_LADING => "Master bill of lading",
            InvoiceSuiteCodelistDocumentTypes::MATES_RECEIPT => "Mates receipt",
            InvoiceSuiteCodelistDocumentTypes::MATERIAL_INSPECTION_AND_RECEIVING_REPORT => "Material inspection and receiving report",
            InvoiceSuiteCodelistDocumentTypes::MEANS_OF_TRANSPORT_ADVICE => "Means of transport advice",
            InvoiceSuiteCodelistDocumentTypes::MEANS_OF_TRANSPORTATION_AVAILABILITY_INFORMATION => "Means of transportation availability information",
            InvoiceSuiteCodelistDocumentTypes::MEANS_OF_TRANSPORTATION_SCHEDULE_INFORMATION => "Means of transportation schedule information",
            InvoiceSuiteCodelistDocumentTypes::MEAT_AND_MEAT_BYPRODUCTS_SANITARY_CERTIFICATE => "Meat and meat by-products sanitary certificate",
            InvoiceSuiteCodelistDocumentTypes::MEAT_FOOD_PRODUCTS_SANITARY_CERTIFICATE => "Meat food products sanitary certificate",
            InvoiceSuiteCodelistDocumentTypes::MEDICAL_CERTIFICATE => "Medical certificate",
            InvoiceSuiteCodelistDocumentTypes::MESSAGE_IN_DEVELOPMENT_REQUEST => "Message in development request",
            InvoiceSuiteCodelistDocumentTypes::METERED_SERVICES_CONSUMPTION_REPORT => "Metered services consumption report",
            InvoiceSuiteCodelistDocumentTypes::METERED_SERVICES_CONSUMPTION_REPORT_SUPPORTING_AN_INVOICE => "Metered services consumption report supporting an invoice",
            InvoiceSuiteCodelistDocumentTypes::METERED_SERVICES_INVOICE => "Metered services invoice",
            InvoiceSuiteCodelistDocumentTypes::METERING_POINT_INFORMATION_RESPONSE => "Metering point information response",
            InvoiceSuiteCodelistDocumentTypes::MILITARY_IDENTIFICATION_CARD => "Military Identification Card",
            InvoiceSuiteCodelistDocumentTypes::MILL_CERTIFICATE => "Mill certificate",
            InvoiceSuiteCodelistDocumentTypes::MODIFICATION_OF_EXISTING_MESSAGE => "Modification of existing message",
            InvoiceSuiteCodelistDocumentTypes::MOVEMENT_CERTIFICATE_ATR => "Movement certificate A.TR.1",
            InvoiceSuiteCodelistDocumentTypes::MULTIDROP_ORDER => "Multidrop order",
            InvoiceSuiteCodelistDocumentTypes::MULTIMODAL_TRANSPORT_DOCUMENT_GENERIC => "Multimodal transport document (generic)",
            InvoiceSuiteCodelistDocumentTypes::MULTIMODALCOMBINED_TRANSPORT_DOCUMENT_GENERIC => "Multimodal/combined transport document (generic)",
            InvoiceSuiteCodelistDocumentTypes::MULTIPLE_DIRECT_DEBIT => "Multiple direct debit",
            InvoiceSuiteCodelistDocumentTypes::MULTIPLE_DIRECT_DEBIT_REQUEST => "Multiple direct debit request",
            InvoiceSuiteCodelistDocumentTypes::MULTIPLE_PAYMENT_ORDER => "Multiple payment order",
            InvoiceSuiteCodelistDocumentTypes::NAMEPRODUCT_PLATE => "Name/product plate",
            InvoiceSuiteCodelistDocumentTypes::NATO_TRANSIT_DOCUMENT => "NATO transit document",
            InvoiceSuiteCodelistDocumentTypes::NEW_CODE_REQUEST => "New code request",
            InvoiceSuiteCodelistDocumentTypes::NEW_MESSAGE_REQUEST => "New message request",
            InvoiceSuiteCodelistDocumentTypes::NONNEGOTIABLE_MARITIME_TRANSPORT_DOCUMENT_GENERIC => "Non-negotiable maritime transport document (generic)",
            InvoiceSuiteCodelistDocumentTypes::NONPREAUTHORISED_DIRECT_DEBIT_REQUESTS => "Non-pre-authorised direct debit request(s)",
            InvoiceSuiteCodelistDocumentTypes::NONPREAUTHORISED_DIRECT_DEBITS => "Non-pre-authorised direct debit(s)",
            InvoiceSuiteCodelistDocumentTypes::NOTICE_OF_CIRCUMSTANCES_PREVENTING_DELIVERY_GOODS => "Notice of circumstances preventing delivery (goods)",
            InvoiceSuiteCodelistDocumentTypes::NOTICE_OF_CIRCUMSTANCES_PREVENTING_TRANSPORT_GOODS => "Notice of circumstances preventing transport (goods)",
            InvoiceSuiteCodelistDocumentTypes::NOTICE_THAT_CIRCUMSTANCES_PREVENT_PAYMENT_OF_DELIVERED_GOODS => "Notice that circumstances prevent payment of delivered goods",
            InvoiceSuiteCodelistDocumentTypes::NOTIFICATION_OF_BALANCE_RESPONSIBLE_ENTITY_CHANGE => "Notification of balance responsible entity change",
            InvoiceSuiteCodelistDocumentTypes::NOTIFICATION_OF_CHANGE_OF_SUPPLIER => "Notification of change of supplier",
            InvoiceSuiteCodelistDocumentTypes::NOTIFICATION_OF_EMERGENCY_SHIFTING_FROM_THE_DESIGNATED_PLACE_IN_PORT => "Notification of emergency shifting from the designated place in port",
            InvoiceSuiteCodelistDocumentTypes::NOTIFICATION_OF_METER_CHANGE => "Notification of meter change",
            InvoiceSuiteCodelistDocumentTypes::NOTIFICATION_OF_METERING_POINT_IDENTIFICATION_CHANGE => "Notification of metering point identification change",
            InvoiceSuiteCodelistDocumentTypes::NOTIFICATION_OF_USAGE_OF_BERTH_OR_MOORING_FACILITIES => "Notification of usage of berth or mooring facilities",
            InvoiceSuiteCodelistDocumentTypes::NOTIFICATION_TO_GRID_OPERATOR_OF_CONTRACT_TERMINATION => "Notification to grid operator of contract termination",
            InvoiceSuiteCodelistDocumentTypes::NOTIFICATION_TO_GRID_OPERATOR_OF_METERING_POINT_CHANGES => "Notification to grid operator of metering point changes",
            InvoiceSuiteCodelistDocumentTypes::NOTIFICATION_TO_SUPPLIER_OF_CONTRACT_TERMINATION => "Notification to supplier of contract termination",
            InvoiceSuiteCodelistDocumentTypes::NOTIFICATION_TO_SUPPLIER_OF_METERING_POINT_CHANGES => "Notification to supplier of metering point changes",
            InvoiceSuiteCodelistDocumentTypes::OFFER_QUOTATION => "Offer / quotation",
            InvoiceSuiteCodelistDocumentTypes::OPERATING_INSTRUCTIONS => "Operating instructions",
            InvoiceSuiteCodelistDocumentTypes::OPTICAL_CHARACTER_READING_OCR_PAYMENT => "Optical Character Reading (OCR) payment",
            InvoiceSuiteCodelistDocumentTypes::OPTICAL_CHARACTER_READING_OCR_PAYMENT_CREDIT_NOTE => "Optical Character Reading (OCR) payment credit note",
            InvoiceSuiteCodelistDocumentTypes::ORDER => "Order",
            InvoiceSuiteCodelistDocumentTypes::ORDER_STATUS_ENQUIRY => "Order status enquiry",
            InvoiceSuiteCodelistDocumentTypes::ORDER_STATUS_REPORT => "Order status report",
            InvoiceSuiteCodelistDocumentTypes::ORIGINAL_ACCOUNTING_VOUCHER => "Original accounting voucher",
            InvoiceSuiteCodelistDocumentTypes::OUT_OF_COURT_SETTLEMENT => "Out of court settlement",
            InvoiceSuiteCodelistDocumentTypes::PACKAGE_RESPONSE_CUSTOMS => "Package response (Customs)",
            InvoiceSuiteCodelistDocumentTypes::PACKAGING_MATERIAL_COMPOSITION_REPORT => "Packaging material composition report",
            InvoiceSuiteCodelistDocumentTypes::PACKING_INSTRUCTIONS => "Packing instructions",
            InvoiceSuiteCodelistDocumentTypes::PACKING_LIST => "Packing list",
            InvoiceSuiteCodelistDocumentTypes::PARTIAL_CONSTRUCTION_INVOICE => "Partial construction invoice",
            InvoiceSuiteCodelistDocumentTypes::PARTIAL_FINAL_CONSTRUCTION_INVOICE => "Partial final construction invoice",
            InvoiceSuiteCodelistDocumentTypes::PARTIAL_INVOICE => "Partial invoice",
            InvoiceSuiteCodelistDocumentTypes::PARTY_CREDIT_INFORMATION => "Party credit information",
            InvoiceSuiteCodelistDocumentTypes::PARTY_INFORMATION => "Party information",
            InvoiceSuiteCodelistDocumentTypes::PARTY_PAYMENT_BEHAVIOUR_INFORMATION => "Party payment behaviour information",
            InvoiceSuiteCodelistDocumentTypes::PASSENGER_LIST => "Passenger list",
            InvoiceSuiteCodelistDocumentTypes::PASSPORT => "Passport",
            InvoiceSuiteCodelistDocumentTypes::PAYMENT_BOND => "Payment bond",
            InvoiceSuiteCodelistDocumentTypes::PAYMENT_CARD => "Payment card",
            InvoiceSuiteCodelistDocumentTypes::PAYMENT_OR_PERFORMANCE_BOND => "Payment or performance bond",
            InvoiceSuiteCodelistDocumentTypes::PAYMENT_ORDER => "Payment order",
            InvoiceSuiteCodelistDocumentTypes::PAYMENT_RECEIPT_CONFIRMATION => "Payment receipt confirmation",
            InvoiceSuiteCodelistDocumentTypes::PAYMENT_REQUEST_FOR_COMPLETED_UNITS => "Payment request for completed units",
            InvoiceSuiteCodelistDocumentTypes::PAYMENT_VALUATION => "Payment valuation",
            InvoiceSuiteCodelistDocumentTypes::PAYMENT_VALUATION_FOR_UNSCHEDULED_ITEMS => "Payment valuation for unscheduled items",
            InvoiceSuiteCodelistDocumentTypes::PAYROLL_DEDUCTIONS_ADVICE => "Payroll deductions advice",
            InvoiceSuiteCodelistDocumentTypes::PERFORMANCE_BOND => "Performance bond",
            InvoiceSuiteCodelistDocumentTypes::PHARMACEUTICAL_SANITARY_CERTIFICATE => "Pharmaceutical sanitary certificate",
            InvoiceSuiteCodelistDocumentTypes::PHYSICIAN_REPORT => "Physician report",
            InvoiceSuiteCodelistDocumentTypes::PHYTOSANITARY_CERTIFICATE => "Phytosanitary certificate",
            InvoiceSuiteCodelistDocumentTypes::PHYTOSANITARY_REEXPORT_CERTIFICATE => "Phytosanitary Re-export Certificate",
            InvoiceSuiteCodelistDocumentTypes::PICKUP_NOTICE => "Pick-up notice",
            InvoiceSuiteCodelistDocumentTypes::PLAN_FOR_PROVISION_OF_HEALTH_SERVICE => "Plan for provision of health service",
            InvoiceSuiteCodelistDocumentTypes::PLANT_PASSPORT => "Plant Passport",
            InvoiceSuiteCodelistDocumentTypes::PORT_AUTHORITY_WASTE_DISPOSAL_REPORT => "Port authority waste disposal report",
            InvoiceSuiteCodelistDocumentTypes::PORT_CHARGES_DOCUMENTS => "Port charges documents",
            InvoiceSuiteCodelistDocumentTypes::POST_RECEIPT => "Post receipt",
            InvoiceSuiteCodelistDocumentTypes::POULTRY_SANITARY_CERTIFICATE => "Poultry sanitary certificate",
            InvoiceSuiteCodelistDocumentTypes::PREAUTHORISED_DIRECT_DEBIT_REQUESTS => "Pre-authorised direct debit request(s)",
            InvoiceSuiteCodelistDocumentTypes::PREAUTHORISED_DIRECT_DEBITS => "Pre-authorised direct debit(s)",
            InvoiceSuiteCodelistDocumentTypes::PREPACKED_CROSS_DOCKING_CONSIGNMENT_ORDER => "Pre-packed cross docking consignment order",
            InvoiceSuiteCodelistDocumentTypes::PREPACKED_CROSS_DOCKING_DESPATCH_ADVICE => "Pre-packed cross docking despatch advice",
            InvoiceSuiteCodelistDocumentTypes::PREPACKED_CROSS_DOCKING_ORDER => "Pre-packed cross docking order",
            InvoiceSuiteCodelistDocumentTypes::PREADVICE_OF_A_CREDIT => "Preadvice of a credit",
            InvoiceSuiteCodelistDocumentTypes::PREFERENCE_CERTIFICATE_OF_ORIGIN => "Preference certificate of origin",
            InvoiceSuiteCodelistDocumentTypes::PRELIMINARY_CREDIT_ASSESSMENT => "Preliminary credit assessment",
            InvoiceSuiteCodelistDocumentTypes::PRELIMINARY_SALES_REPORT => "Preliminary sales report",
            InvoiceSuiteCodelistDocumentTypes::PREPAYMENT_INVOICE => "Prepayment invoice",
            InvoiceSuiteCodelistDocumentTypes::PRESCRIPTION => "Prescription",
            InvoiceSuiteCodelistDocumentTypes::PRESCRIPTION_DISPENSING_REPORT => "Prescription dispensing report",
            InvoiceSuiteCodelistDocumentTypes::PRESCRIPTION_REQUEST => "Prescription request",
            InvoiceSuiteCodelistDocumentTypes::PREVIOUS_CORRESPONDENCE => "Previous correspondence",
            InvoiceSuiteCodelistDocumentTypes::PREVIOUS_CUSTOMS_DOCUMENTMESSAGE => "Previous Customs document/message",
            InvoiceSuiteCodelistDocumentTypes::PREVIOUS_TRANSPORT_DOCUMENT => "Previous transport document",
            InvoiceSuiteCodelistDocumentTypes::PRICE_AND_DELIVERY_QUOTE => "Price and delivery quote",
            InvoiceSuiteCodelistDocumentTypes::PRICE_AND_DELIVERY_QUOTE_SHIP_AND_DEBIT => "Price and delivery quote, ship and debit",
            InvoiceSuiteCodelistDocumentTypes::PRICE_AND_DELIVERY_QUOTE_SPECIFIED_ENDCUSTOMER => "Price and delivery quote, specified end-customer",
            InvoiceSuiteCodelistDocumentTypes::PRICE_NEGOTIATION_RESULT => "Price negotiation result",
            InvoiceSuiteCodelistDocumentTypes::PRICE_QUOTE => "Price quote",
            InvoiceSuiteCodelistDocumentTypes::PRICE_QUOTE_SHIP_AND_DEBIT => "Price quote, ship and debit",
            InvoiceSuiteCodelistDocumentTypes::PRICE_QUOTE_SPECIFIED_ENDCUSTOMER => "Price quote, specified end-customer",
            InvoiceSuiteCodelistDocumentTypes::PRICE_VARIATION_INVOICE => "Price variation invoice",
            InvoiceSuiteCodelistDocumentTypes::PRICESALES_CATALOGUE => "Price/sales catalogue",
            InvoiceSuiteCodelistDocumentTypes::PRICESALES_CATALOGUE_CONTAINING_COMMERCIAL_INFORMATION => "Price/sales catalogue containing commercial information",
            InvoiceSuiteCodelistDocumentTypes::PRICESALES_CATALOGUE_NOT_CONTAINING_COMMERCIAL_INFORMATION => "Price/sales catalogue not containing commercial information",
            InvoiceSuiteCodelistDocumentTypes::PRICESALES_CATALOGUE_RESPONSE => "Price/sales catalogue response",
            InvoiceSuiteCodelistDocumentTypes::PRICED_ALTERNATE_TENDER_BILL_OF_QUANTITY => "Priced alternate tender bill of quantity",
            InvoiceSuiteCodelistDocumentTypes::PRICED_TENDER_BOQ => "Priced tender BOQ",
            InvoiceSuiteCodelistDocumentTypes::PROFORMA_ACCOUNTING_VOUCHER => "Pro-forma accounting voucher",
            InvoiceSuiteCodelistDocumentTypes::PROCESS_DATA_REPORT => "Process data report",
            InvoiceSuiteCodelistDocumentTypes::PRODUCT_DATA_MESSAGE => "Product data message",
            InvoiceSuiteCodelistDocumentTypes::PRODUCT_DATA_RESPONSE => "Product data response",
            InvoiceSuiteCodelistDocumentTypes::PRODUCT_PERFORMANCE_REPORT => "Product performance report",
            InvoiceSuiteCodelistDocumentTypes::PRODUCT_SPECIFICATION_REPORT => "Product specification report",
            InvoiceSuiteCodelistDocumentTypes::PRODUCTION_FACILITY_LICENSE => "Production facility license",
            InvoiceSuiteCodelistDocumentTypes::PROFORMA_INVOICE => "Proforma invoice",
            InvoiceSuiteCodelistDocumentTypes::PROGRESSIVE_DISCHARGE_REPORT => "Progressive discharge report",
            InvoiceSuiteCodelistDocumentTypes::PROJECT_MASTER_PLAN => "Project master plan",
            InvoiceSuiteCodelistDocumentTypes::PROJECT_MASTER_SCHEDULE => "Project master schedule",
            InvoiceSuiteCodelistDocumentTypes::PROJECT_PLAN => "Project plan",
            InvoiceSuiteCodelistDocumentTypes::PROJECT_PLANNING_AVAILABLE_RESOURCES => "Project planning available resources",
            InvoiceSuiteCodelistDocumentTypes::PROJECT_PLANNING_CALENDAR => "Project planning calendar",
            InvoiceSuiteCodelistDocumentTypes::PROJECT_PRODUCTION_PLAN => "Project production plan",
            InvoiceSuiteCodelistDocumentTypes::PROJECT_RECOVERY_PLAN => "Project recovery plan",
            InvoiceSuiteCodelistDocumentTypes::PROJECT_SCHEDULE => "Project schedule",
            InvoiceSuiteCodelistDocumentTypes::PROMISSORY_NOTE => "Promissory note",
            InvoiceSuiteCodelistDocumentTypes::PROOF_OF_DELIVERY => "Proof of delivery",
            InvoiceSuiteCodelistDocumentTypes::PROOF_OF_TRANSIT_DECLARATION => "Proof of transit declaration",
            InvoiceSuiteCodelistDocumentTypes::PROVISIONAL_PAYMENT_VALUATION => "Provisional payment valuation",
            InvoiceSuiteCodelistDocumentTypes::PUBLIC_PRICE_CERTIFICATE => "Public price certificate",
            InvoiceSuiteCodelistDocumentTypes::PURCHASE_ORDER => "Purchase order",
            InvoiceSuiteCodelistDocumentTypes::PURCHASE_ORDER_CHANGE_REQUEST => "Purchase order change request",
            InvoiceSuiteCodelistDocumentTypes::PURCHASE_ORDER_FINANCING_REQUEST => "Purchase Order Financing Request",
            InvoiceSuiteCodelistDocumentTypes::PURCHASE_ORDER_FINANCING_REQUEST_CANCELLATION => "Purchase Order Financing Request Cancellation",
            InvoiceSuiteCodelistDocumentTypes::PURCHASE_ORDER_FINANCING_REQUEST_STATUS => "Purchase Order Financing Request Status",
            InvoiceSuiteCodelistDocumentTypes::PURCHASE_ORDER_RESPONSE => "Purchase order response",
            InvoiceSuiteCodelistDocumentTypes::PURCHASING_SPECIFICATION => "Purchasing specification",
            InvoiceSuiteCodelistDocumentTypes::QUALITY_DATA_MESSAGE => "Quality data message",
            InvoiceSuiteCodelistDocumentTypes::QUANTITY_VALUATION => "Quantity valuation",
            InvoiceSuiteCodelistDocumentTypes::QUANTITY_VALUATION_REQUEST => "Quantity valuation request",
            InvoiceSuiteCodelistDocumentTypes::QUERY => "Query",
            InvoiceSuiteCodelistDocumentTypes::QUESTIONNAIRE => "Questionnaire",
            InvoiceSuiteCodelistDocumentTypes::QUOTA_PRIOR_ALLOCATION_CERTIFICATE => "Quota prior allocation certificate",
            InvoiceSuiteCodelistDocumentTypes::RAIL_CONSIGNMENT_NOTE_GENERIC_TERM => "Rail consignment note (generic term)",
            InvoiceSuiteCodelistDocumentTypes::RAIL_CONSIGNMENT_NOTE_FORWARDER_COPY => "Rail consignment note forwarder copy",
            InvoiceSuiteCodelistDocumentTypes::REENTRY_PERMIT => "Re-Entry Permit",
            InvoiceSuiteCodelistDocumentTypes::RESENDING_CONSIGNMENT_NOTE => "Re-sending consignment note",
            InvoiceSuiteCodelistDocumentTypes::READY_FOR_DESPATCH_ADVICE => "Ready for despatch advice",
            InvoiceSuiteCodelistDocumentTypes::READY_FOR_TRANSSHIPMENT_DESPATCH_ADVICE => "Ready for transshipment despatch advice",
            InvoiceSuiteCodelistDocumentTypes::REASSIGNMENT => "Reassignment",
            InvoiceSuiteCodelistDocumentTypes::RECEIPT_CUSTOMS => "Receipt (Customs)",
            InvoiceSuiteCodelistDocumentTypes::RECHARGING_DOCUMENT => "Recharging document",
            InvoiceSuiteCodelistDocumentTypes::REEFER_CONNECTION_ORDER => "Reefer connection order",
            InvoiceSuiteCodelistDocumentTypes::REFUGEE_PERMIT => "Refugee Permit",
            InvoiceSuiteCodelistDocumentTypes::REFUSAL_OF_CLAIM => "Refusal of claim",
            InvoiceSuiteCodelistDocumentTypes::REGIONAL_APPELLATION_CERTIFICATE => "Regional appellation certificate",
            InvoiceSuiteCodelistDocumentTypes::REGISTRATION_CHANGE => "Registration change",
            InvoiceSuiteCodelistDocumentTypes::REGISTRATION_DOCUMENT => "Registration document",
            InvoiceSuiteCodelistDocumentTypes::REGISTRATION_RENEWAL => "Registration renewal",
            InvoiceSuiteCodelistDocumentTypes::REJECTED_DIRECT_DEBITS => "Rejected direct debit(s)",
            InvoiceSuiteCodelistDocumentTypes::RELATED_DOCUMENT => "Related document",
            InvoiceSuiteCodelistDocumentTypes::REMITTANCE_ADVICE => "Remittance advice",
            InvoiceSuiteCodelistDocumentTypes::REPAIR_ORDER => "Repair order",
            InvoiceSuiteCodelistDocumentTypes::REPORT_OF_TRANSACTIONS_FOR_INFORMATION_ONLY => "Report of transactions for information only",
            InvoiceSuiteCodelistDocumentTypes::REPORT_OF_TRANSACTIONS_WHICH_NEED_FURTHER_INFORMATION_FROM_THE_RECEIVER => "Report of transactions which need further information from the receiver",
            InvoiceSuiteCodelistDocumentTypes::REQUEST_FOR_AN_AMENDMENT_OF_A_DOCUMENTARY_CREDIT => "Request for an amendment of a documentary credit",
            InvoiceSuiteCodelistDocumentTypes::REQUEST_FOR_CONTRACT_PRICE_AND_DELIVERY_QUOTE => "Request for contract price and delivery quote",
            InvoiceSuiteCodelistDocumentTypes::REQUEST_FOR_CONTRACT_PRICE_QUOTE => "Request for contract price quote",
            InvoiceSuiteCodelistDocumentTypes::REQUEST_FOR_DELIVERY_INSTRUCTIONS => "Request for delivery instructions",
            InvoiceSuiteCodelistDocumentTypes::REQUEST_FOR_DELIVERY_QUOTE => "Request for delivery quote",
            InvoiceSuiteCodelistDocumentTypes::REQUEST_FOR_FINANCIAL_CANCELLATION => "Request for financial cancellation",
            InvoiceSuiteCodelistDocumentTypes::REQUEST_FOR_METERING_POINT_INFORMATION => "Request for metering point information",
            InvoiceSuiteCodelistDocumentTypes::REQUEST_FOR_PAYMENT => "Request for payment",
            InvoiceSuiteCodelistDocumentTypes::REQUEST_FOR_PRICE_AND_DELIVERY_QUOTE => "Request for price and delivery quote",
            InvoiceSuiteCodelistDocumentTypes::REQUEST_FOR_PRICE_AND_DELIVERY_QUOTE_SHIP_AND_DEBIT => "Request for price and delivery quote, ship and debit",
            InvoiceSuiteCodelistDocumentTypes::REQUEST_FOR_PRICE_AND_DELIVERY_QUOTE_SPECIFIED_ENDUSER => "Request for price and delivery quote, specified end-user",
            InvoiceSuiteCodelistDocumentTypes::REQUEST_FOR_PRICE_QUOTE => "Request for price quote",
            InvoiceSuiteCodelistDocumentTypes::REQUEST_FOR_PRICE_QUOTE_SHIP_AND_DEBIT => "Request for price quote, ship and debit",
            InvoiceSuiteCodelistDocumentTypes::REQUEST_FOR_PRICE_QUOTE_SPECIFIED_ENDCUSTOMER => "Request for price quote, specified end-customer",
            InvoiceSuiteCodelistDocumentTypes::REQUEST_FOR_PROVISION_OF_A_HEALTH_SERVICE => "Request for provision of a health service",
            InvoiceSuiteCodelistDocumentTypes::REQUEST_FOR_QUOTE => "Request for quote",
            InvoiceSuiteCodelistDocumentTypes::REQUEST_FOR_STATISTICAL_DATA => "Request for statistical data",
            InvoiceSuiteCodelistDocumentTypes::REQUEST_FOR_TRANSFER => "Request for transfer",
            InvoiceSuiteCodelistDocumentTypes::REQUIREMENTS_CONTRACT => "Requirements contract",
            InvoiceSuiteCodelistDocumentTypes::RESALE_INFORMATION => "Resale information",
            InvoiceSuiteCodelistDocumentTypes::RESIDENCE_PERMIT => "Residence permit",
            InvoiceSuiteCodelistDocumentTypes::RESPONSE_TO_A_TRADE_STATISTICS_MESSAGE => "Response to a trade statistics message",
            InvoiceSuiteCodelistDocumentTypes::RESPONSE_TO_AN_AMENDMENT_OF_A_DOCUMENTARY_CREDIT => "Response to an amendment of a documentary credit",
            InvoiceSuiteCodelistDocumentTypes::RESPONSE_TO_PREVIOUS_BANKING_STATUS_MESSAGE => "Response to previous banking status message",
            InvoiceSuiteCodelistDocumentTypes::RESPONSE_TO_QUERY => "Response to query",
            InvoiceSuiteCodelistDocumentTypes::RESPONSE_TO_REGISTRATION => "Response to registration",
            InvoiceSuiteCodelistDocumentTypes::RESTOW => "Restow",
            InvoiceSuiteCodelistDocumentTypes::RETURNS_ADVICE => "Returns advice",
            InvoiceSuiteCodelistDocumentTypes::REVERSAL_OF_CREDIT => "Reversal of credit",
            InvoiceSuiteCodelistDocumentTypes::REVERSAL_OF_DEBIT => "Reversal of debit",
            InvoiceSuiteCodelistDocumentTypes::RISK_ANALYSIS => "Risk analysis",
            InvoiceSuiteCodelistDocumentTypes::ROAD_CONSIGNMENT_NOTE => "Road consignment note",
            InvoiceSuiteCodelistDocumentTypes::ROAD_LISTSMGS => "Road list-SMGS",
            InvoiceSuiteCodelistDocumentTypes::RUSH_ORDER => "Rush order",
            InvoiceSuiteCodelistDocumentTypes::SAFETY_AND_HAZARD_DATA_SHEET => "Safety and hazard data sheet",
            InvoiceSuiteCodelistDocumentTypes::SAFETY_OF_EQUIPMENT_CERTIFICATE => "Safety of equipment certificate",
            InvoiceSuiteCodelistDocumentTypes::SAFETY_OF_RADIO_CERTIFICATE => "Safety of radio certificate",
            InvoiceSuiteCodelistDocumentTypes::SAFETY_OF_SHIP_CERTIFICATE => "Safety of ship certificate",
            InvoiceSuiteCodelistDocumentTypes::SALES_DATA_REPORT => "Sales data report",
            InvoiceSuiteCodelistDocumentTypes::SALES_FORECAST_REPORT => "Sales forecast report",
            InvoiceSuiteCodelistDocumentTypes::SAMPLE_ORDER => "Sample order",
            InvoiceSuiteCodelistDocumentTypes::SANITARY_CERTIFICATE => "Sanitary certificate",
            InvoiceSuiteCodelistDocumentTypes::SEA_WAYBILL => "Sea waybill",
            InvoiceSuiteCodelistDocumentTypes::SEAMANS_BOOK => "Seaman’s book",
            InvoiceSuiteCodelistDocumentTypes::SEASON_TICKET => "Season ticket",
            InvoiceSuiteCodelistDocumentTypes::SEGMENT_CHANGE_REQUEST => "Segment change request",
            InvoiceSuiteCodelistDocumentTypes::SEGMENT_REQUEST => "Segment request",
            InvoiceSuiteCodelistDocumentTypes::SELF_BILLED_CREDIT_NOTE => "Self billed credit note",
            InvoiceSuiteCodelistDocumentTypes::SELF_BILLED_DEBIT_NOTE => "Self billed debit note",
            InvoiceSuiteCodelistDocumentTypes::SELFBILLED_INVOICE => "Self-billed invoice",
            InvoiceSuiteCodelistDocumentTypes::SEQUENCED_DELIVERY_SCHEDULE => "Sequenced delivery schedule",
            InvoiceSuiteCodelistDocumentTypes::SERVICE_DIRECTORY_DEFINITION => "Service directory definition",
            InvoiceSuiteCodelistDocumentTypes::SETTLEMENT_OF_A_LETTER_OF_CREDIT => "Settlement of a letter of credit",
            InvoiceSuiteCodelistDocumentTypes::SHIP_SECURITY_PLAN => "Ship Security Plan",
            InvoiceSuiteCodelistDocumentTypes::SHIPS_STORES_DECLARATION => "Ships stores declaration",
            InvoiceSuiteCodelistDocumentTypes::SHIPPERS_LETTER_OF_INSTRUCTIONS_AIR => "Shippers letter of instructions (air)",
            InvoiceSuiteCodelistDocumentTypes::SHIPPING_INSTRUCTIONS => "Shipping instructions",
            InvoiceSuiteCodelistDocumentTypes::SHIPPING_NOTE => "Shipping note",
            InvoiceSuiteCodelistDocumentTypes::SIMPLE_DATA_ELEMENT_CHANGE_REQUEST => "Simple data element change request",
            InvoiceSuiteCodelistDocumentTypes::SIMPLE_DATA_ELEMENT_REQUEST => "Simple data element request",
            InvoiceSuiteCodelistDocumentTypes::SINGLE_ADMINISTRATIVE_DOCUMENT => "Single administrative document",
            InvoiceSuiteCodelistDocumentTypes::SOIL_ANALYSIS => "Soil analysis",
            InvoiceSuiteCodelistDocumentTypes::SPARE_PARTS_ORDER => "Spare parts order",
            InvoiceSuiteCodelistDocumentTypes::SPECIAL_REQUIREMENTS_PERMIT_RELATED_TO_THE_TRANSPORT_OF_CARGO => "Special requirements permit related to the transport of cargo",
            InvoiceSuiteCodelistDocumentTypes::SPECIFIC_CONTRACT_CONDITIONS => "Specific contract conditions",
            InvoiceSuiteCodelistDocumentTypes::SPOT_ORDER => "Spot order",
            InvoiceSuiteCodelistDocumentTypes::STANDING_INQUIRY_ON_COMPLETE_PRODUCT_INFORMATION => "Standing inquiry on complete product information",
            InvoiceSuiteCodelistDocumentTypes::STANDING_INQUIRY_ON_PRODUCT_INFORMATION => "Standing inquiry on product information",
            InvoiceSuiteCodelistDocumentTypes::STANDING_ORDER => "Standing order",
            InvoiceSuiteCodelistDocumentTypes::STATEMENT_OF_ACCOUNT_MESSAGE => "Statement of account message",
            InvoiceSuiteCodelistDocumentTypes::STATISTICAL_AND_OTHER_ADMINISTRATIVE_INTERNAL_DOCUMENTS => "Statistical and other administrative internal documents",
            InvoiceSuiteCodelistDocumentTypes::STATISTICAL_DATA => "Statistical data",
            InvoiceSuiteCodelistDocumentTypes::STATISTICAL_DEFINITIONS => "Statistical definitions",
            InvoiceSuiteCodelistDocumentTypes::STATISTICAL_DOCUMENT_EXPORT => "Statistical document, export",
            InvoiceSuiteCodelistDocumentTypes::STATISTICAL_DOCUMENT_IMPORT => "Statistical document, import",
            InvoiceSuiteCodelistDocumentTypes::STATUS_INFORMATION => "Status information",
            InvoiceSuiteCodelistDocumentTypes::STATUS_REPORT => "Status report",
            InvoiceSuiteCodelistDocumentTypes::STORAGE_CAPACITY_OFFER => "Storage capacity offer",
            InvoiceSuiteCodelistDocumentTypes::STORAGE_CAPACITY_REQUEST => "Storage capacity request",
            InvoiceSuiteCodelistDocumentTypes::STORES_REQUISITION => "Stores requisition",
            InvoiceSuiteCodelistDocumentTypes::SUBCONTRACTOR_PLAN => "Subcontractor plan",
            InvoiceSuiteCodelistDocumentTypes::SUBSTITUTE_AIR_WAYBILL => "Substitute air waybill",
            InvoiceSuiteCodelistDocumentTypes::SUMMARY_SALES_REPORT => "Summary sales report",
            InvoiceSuiteCodelistDocumentTypes::SUMMONS => "Summons",
            InvoiceSuiteCodelistDocumentTypes::SUPPLEMENTARY_DOCUMENT_FOR_APPLICATION_FOR_CARGO_OPERATION_OF_DANGEROUS_GOODS => "Supplementary document for application for cargo operation of dangerous goods",
            InvoiceSuiteCodelistDocumentTypes::SUPPLEMENTARY_DOCUMENT_FOR_APPLICATION_FOR_TRANSPORT_OF_DANGEROUS_GOODS => "Supplementary document for application for transport of dangerous goods",
            InvoiceSuiteCodelistDocumentTypes::SUSTAINABILITY_DATA_REQUEST => "Sustainability data request",
            InvoiceSuiteCodelistDocumentTypes::SUSTAINABILITY_DATA_RESPONSE => "Sustainability data response",
            InvoiceSuiteCodelistDocumentTypes::SUSTAINABILITY_INSPECTION_REQUEST => "Sustainability Inspection request",
            InvoiceSuiteCodelistDocumentTypes::SUSTAINABILITY_INSPECTION_RESPONSE => "Sustainability Inspection response",
            InvoiceSuiteCodelistDocumentTypes::SWAP_ORDER => "Swap order",
            InvoiceSuiteCodelistDocumentTypes::TANKER_BILL_OF_LADING => "Tanker bill of lading",
            InvoiceSuiteCodelistDocumentTypes::TASK_ORDER => "Task order",
            InvoiceSuiteCodelistDocumentTypes::TAX_CALCULATIONCONFIRMATION_RESPONSE_CUSTOMS => "Tax calculation/confirmation response (Customs)",
            InvoiceSuiteCodelistDocumentTypes::TAX_DECLARATION_GENERAL => "Tax declaration (general)",
            InvoiceSuiteCodelistDocumentTypes::TAX_DECLARATION_VALUE_ADDED_TAX => "Tax declaration (value added tax)",
            InvoiceSuiteCodelistDocumentTypes::TAX_DEMAND => "Tax demand",
            InvoiceSuiteCodelistDocumentTypes::TAX_INVOICE => "Tax invoice",
            InvoiceSuiteCodelistDocumentTypes::TAX_NOTIFICATION => "Tax notification",
            InvoiceSuiteCodelistDocumentTypes::TENDER => "Tender",
            InvoiceSuiteCodelistDocumentTypes::TENDERING_PRICESALES_CATALOGUE => "Tendering price/sales catalogue",
            InvoiceSuiteCodelistDocumentTypes::TENDERING_PRICESALES_CATALOGUE_REQUEST => "Tendering price/sales catalogue request",
            InvoiceSuiteCodelistDocumentTypes::TEST_REPORT => "Test report",
            InvoiceSuiteCodelistDocumentTypes::THERMOGRAPHIC_READING_REPORT => "Thermographic reading report",
            InvoiceSuiteCodelistDocumentTypes::THIRD_PARTY_PAYMENT_REPORT => "Third party payment report",
            InvoiceSuiteCodelistDocumentTypes::THROUGH_BILL_OF_LADING => "Through bill of lading",
            InvoiceSuiteCodelistDocumentTypes::TIF_FORM => "TIF form",
            InvoiceSuiteCodelistDocumentTypes::TIR_CARNET => "TIR carnet",
            InvoiceSuiteCodelistDocumentTypes::TRACEABILITY_EVENT_DECLARATION => "Traceability event declaration",
            InvoiceSuiteCodelistDocumentTypes::TRACKING_NUMBER_ASSIGNMENT_REPORT => "Tracking number assignment report",
            InvoiceSuiteCodelistDocumentTypes::TRADE_DATA => "Trade data",
            InvoiceSuiteCodelistDocumentTypes::TRANSFRONTIER_WASTE_SHIPMENT_AUTHORIZATION => "Transfrontier waste shipment authorization",
            InvoiceSuiteCodelistDocumentTypes::TRANSFRONTIER_WASTE_SHIPMENT_MOVEMENT_DOCUMENT => "Transfrontier waste shipment movement document",
            InvoiceSuiteCodelistDocumentTypes::TRANSIT_CERTIFICATE_OF_APPROVAL => "Transit certificate of approval",
            InvoiceSuiteCodelistDocumentTypes::TRANSIT_CONVEYOR_DOCUMENT => "Transit Conveyor Document",
            InvoiceSuiteCodelistDocumentTypes::TRANSIT_LICENSE => "Transit license",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_CAPACITY_OFFER => "Transport capacity offer",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_CAPACITY_REQUEST => "Transport capacity request",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_CARGO_RELEASE_ORDER => "Transport cargo release order",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_DEPARTURE_REPORT => "Transport departure report",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_DISCHARGE_INSTRUCTION => "Transport discharge instruction",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_DISCHARGE_REPORT => "Transport discharge report",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EMERGENCY_CARD => "Transport emergency card",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EMPTY_EQUIPMENT_ADVICE => "Transport empty equipment advice",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_ACCEPTANCE_ORDER => "Transport equipment acceptance order",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_DAMAGE_REPORT => "Transport equipment damage report",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_DELIVERY_NOTICE => "Transport equipment delivery notice",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_DIRECT_INTERCHANGE_REPORT => "Transport equipment direct interchange report",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_EMPTY_RELEASE_INSTRUCTION => "Transport equipment empty release instruction",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_GROSS_MASS_VERIFICATION_MESSAGE => "Transport equipment gross mass verification message",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_IMPENDING_ARRIVAL_ADVICE => "Transport equipment impending arrival advice",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_MAINTENANCE_AND_REPAIR_NOTICE => "Transport equipment maintenance and repair notice",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_MAINTENANCE_AND_REPAIR_WORK_AUTHORISATION => "Transport equipment maintenance and repair work authorisation",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_MAINTENANCE_AND_REPAIR_WORK_ESTIMATE_ADVICE => "Transport equipment maintenance and repair work estimate advice",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_MAINTENANCE_AND_REPAIR_WORK_ESTIMATE_ORDER => "Transport equipment maintenance and repair work estimate order",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_MOVEMENT_INSTRUCTION => "Transport equipment movement instruction",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_MOVEMENT_REPORT => "Transport equipment movement report",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_MOVEMENT_REPORT_PARTIAL => "Transport equipment movement report, partial",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_OFFHIRE_REPORT => "Transport equipment off-hire report",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_OFFHIRE_REQUEST => "Transport equipment off-hire request",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_ONHIRE_ORDER => "Transport equipment on-hire order",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_ONHIRE_REPORT => "Transport equipment on-hire report",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_ONHIRE_REQUEST => "Transport equipment on-hire request",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_PACKING_INSTRUCTION => "Transport equipment packing instruction",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_PICKUP_AVAILABILITY_CONFIRMATION => "Transport equipment pick-up availability confirmation",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_PICKUP_AVAILABILITY_REQUEST => "Transport equipment pick-up availability request",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_PICKUP_REPORT => "Transport equipment pick-up report",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_PROFILE_REPORT => "Transport equipment profile report",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_SHIFT_REPORT => "Transport equipment shift report",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_SPECIAL_SERVICE_INSTRUCTION => "Transport equipment special service instruction",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_STATUS_CHANGE_REPORT => "Transport equipment status change report",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_STOCK_REPORT => "Transport equipment stock report",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_SURVEY_ORDER => "Transport equipment survey order",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_SURVEY_ORDER_RESPONSE => "Transport equipment survey order response",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_SURVEY_REPORT => "Transport equipment survey report",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_UNPACKING_INSTRUCTION => "Transport equipment unpacking instruction",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_UNPACKING_REPORT => "Transport equipment unpacking report",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_LOADING_INSTRUCTION => "Transport loading instruction",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_LOADING_REPORT => "Transport loading report",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_MEANS_SECURITY_REPORT => "Transport Means Security Report",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_MOVEMENT_GATE_IN_REPORT => "Transport movement gate in report",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_MOVEMENT_GATE_OUT_REPORT => "Transport movement gate out report",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_ROUTING_INFORMATION => "Transport routing information",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_STATUS_REPORT => "Transport status report",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_STATUS_REQUEST => "Transport status request",
            InvoiceSuiteCodelistDocumentTypes::TRANSSHIPMENT_DESPATCH_ADVICE => "Transshipment despatch advice",
            InvoiceSuiteCodelistDocumentTypes::TRAVEL_TICKET => "Travel ticket",
            InvoiceSuiteCodelistDocumentTypes::TREATMENT_NIL_OUTTURN => "Treatment - nil outturn",
            InvoiceSuiteCodelistDocumentTypes::TREATMENT_PERSONAL_EFFECT => "Treatment - personal effect",
            InvoiceSuiteCodelistDocumentTypes::TREATMENT_TIMBER => "Treatment - timber",
            InvoiceSuiteCodelistDocumentTypes::TREATMENT_TIMEUP_UNDERBOND => "Treatment - time-up underbond",
            InvoiceSuiteCodelistDocumentTypes::TREATMENT_UNDERBOND_BY_SEA => "Treatment - underbond by sea",
            InvoiceSuiteCodelistDocumentTypes::UNDERBOND_APPROVAL => "Underbond approval",
            InvoiceSuiteCodelistDocumentTypes::UNDERBOND_REQUEST => "Underbond request",
            InvoiceSuiteCodelistDocumentTypes::UNITED_NATIONS_STANDARD_MESSAGE_REQUEST => "United Nations standard message request",
            InvoiceSuiteCodelistDocumentTypes::UNIVERSAL_MULTIPURPOSE_TRANSPORT_DOCUMENT => "Universal (multipurpose) transport document",
            InvoiceSuiteCodelistDocumentTypes::UNPRICED_BILL_OF_QUANTITY => "Unpriced bill of quantity",
            InvoiceSuiteCodelistDocumentTypes::UNSHIP_PERMIT => "Unship permit",
            InvoiceSuiteCodelistDocumentTypes::US_FATCA_STATEMENT => "US, FATCA statement",
            InvoiceSuiteCodelistDocumentTypes::USER_DIRECTORY_DEFINITION => "User directory definition",
            InvoiceSuiteCodelistDocumentTypes::UTILITIES_TIME_SERIES_MESSAGE => "Utilities time series message",
            InvoiceSuiteCodelistDocumentTypes::VACCINATION_CERTIFICATE => "Vaccination certificate",
            InvoiceSuiteCodelistDocumentTypes::VALIDATED_PRICED_TENDER => "Validated priced tender",
            InvoiceSuiteCodelistDocumentTypes::VALUATION_REPORT => "Valuation report",
            InvoiceSuiteCodelistDocumentTypes::VALUE_DECLARATION => "Value declaration",
            InvoiceSuiteCodelistDocumentTypes::VEHICLE_ABOARD_DOCUMENT => "Vehicle aboard document",
            InvoiceSuiteCodelistDocumentTypes::VESSEL_UNPACK_REPORT => "Vessel unpack report",
            InvoiceSuiteCodelistDocumentTypes::VETERINARY_CERTIFICATE => "Veterinary certificate",
            InvoiceSuiteCodelistDocumentTypes::VETERINARY_QUARANTINE_CERTIFICATE => "Veterinary quarantine certificate",
            InvoiceSuiteCodelistDocumentTypes::VIDEO => "Video",
            InvoiceSuiteCodelistDocumentTypes::VISA => "Visa",
            InvoiceSuiteCodelistDocumentTypes::WAGE_DETERMINATION => "Wage determination",
            InvoiceSuiteCodelistDocumentTypes::WAGON_REPORT => "Wagon report",
            InvoiceSuiteCodelistDocumentTypes::WAREHOUSE_WARRANT => "Warehouse warrant",
            InvoiceSuiteCodelistDocumentTypes::WASTE_DISPOSAL_REPORT => "Waste disposal report",
            InvoiceSuiteCodelistDocumentTypes::WAYBILL => "Waybill",
            InvoiceSuiteCodelistDocumentTypes::WCO_CARGO_REPORT_EXPORT_AIR_OR_MARITIME => "WCO Cargo Report Export, Air or Maritime",
            InvoiceSuiteCodelistDocumentTypes::WCO_CARGO_REPORT_EXPORT_RAIL_OR_ROAD => "WCO Cargo Report Export, Rail or Road",
            InvoiceSuiteCodelistDocumentTypes::WCO_CARGO_REPORT_IMPORT_AIR_OR_MARITIME => "WCO Cargo Report Import, Air or Maritime",
            InvoiceSuiteCodelistDocumentTypes::WCO_CARGO_REPORT_IMPORT_RAIL_OR_ROAD => "WCO Cargo Report Import, Rail or Road",
            InvoiceSuiteCodelistDocumentTypes::WCO_CONVEYANCE_ARRIVAL_REPORT => "WCO Conveyance Arrival Report",
            InvoiceSuiteCodelistDocumentTypes::WCO_CONVEYANCE_DEPARTURE_REPORT => "WCO Conveyance Departure Report",
            InvoiceSuiteCodelistDocumentTypes::WCO_FIRST_STEP_OF_TWOSTEP_EXPORT_DECLARATION => "WCO first step of two-step export declaration",
            InvoiceSuiteCodelistDocumentTypes::WCO_FIRST_STEP_OF_TWOSTEP_IMPORT_DECLARATION => "WCO first step of two-step import declaration",
            InvoiceSuiteCodelistDocumentTypes::WCO_ONESTEP_EXPORT_DECLARATION => "WCO one-step export declaration",
            InvoiceSuiteCodelistDocumentTypes::WCO_ONESTEP_IMPORT_DECLARATION => "WCO one-step import declaration",
            InvoiceSuiteCodelistDocumentTypes::WCO_SECOND_STEP_OF_TWOSTEP_EXPORT_DECLARATION => "WCO second step of two-step export declaration",
            InvoiceSuiteCodelistDocumentTypes::WCO_SECOND_STEP_OF_TWOSTEP_IMPORT_DECLARATION => "WCO second step of two-step import declaration",
            InvoiceSuiteCodelistDocumentTypes::WEIGHT_CERTIFICATE => "Weight certificate",
            InvoiceSuiteCodelistDocumentTypes::WEIGHT_LIST => "Weight list",
            InvoiceSuiteCodelistDocumentTypes::WINE_CERTIFICATE => "Wine certificate",
            InvoiceSuiteCodelistDocumentTypes::WITNESS_REPORT => "Witness report",
            InvoiceSuiteCodelistDocumentTypes::WOOL_HEALTH_CERTIFICATE => "Wool health certificate",
            InvoiceSuiteCodelistDocumentTypes::WRITTEN_INSTRUCTIONS_IN_CONFORMANCE_WITH_ADR_ARTICLE_NUMBER => "Written instructions in conformance with ADR article number 10385",
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
        return match($this)
        {
            InvoiceSuiteCodelistDocumentTypes::A_CLAIM_FOR_PARTS_ANDOR_LABOUR_CHARGES => "A claim for parts and/or labour charges incurred .",
            InvoiceSuiteCodelistDocumentTypes::ACCOUNTING_STATEMENT => "Document specifying an accounting statement.",
            InvoiceSuiteCodelistDocumentTypes::ACCOUNTING_VOUCHER => "A document/message justifying an accounting entry.",
            InvoiceSuiteCodelistDocumentTypes::ACKNOWLEDGEMENT_MESSAGE => "Message providing acknowledgement information at the business application level concerning the processing of a message.",
            InvoiceSuiteCodelistDocumentTypes::ACKNOWLEDGEMENT_OF_CHANGE_OF_SUPPLIER => "Acknowledgement of the change of supplier.",
            InvoiceSuiteCodelistDocumentTypes::ACKNOWLEDGEMENT_OF_ORDER => "Document/message acknowledging an undertaking to fulfil an order and confirming conditions or acceptance of conditions.",
            InvoiceSuiteCodelistDocumentTypes::ACKNOWLEDGMENT_OF_RECEIPT => "Document/message confirming a receipt to the sending party.",
            InvoiceSuiteCodelistDocumentTypes::ADVICE_OF_AN_AMENDMENT_OF_A_DOCUMENTARY_CREDIT => "Advice of an amendment of a documentary credit.",
            InvoiceSuiteCodelistDocumentTypes::ADVICE_OF_COLLECTION => "(1030) Document that is joined to the transport or sent by separate means, giving to the departure rail organization the proof that the cash-on delivery amount has been encashed by the arrival rail organization before reimbursement of the consignor.",
            InvoiceSuiteCodelistDocumentTypes::ADVICE_OF_DISTRIBUTION_OF_DOCUMENTS => "Document/message in which the party responsible for the issue of a set of trade documents specifies the various recipients of originals and copies of these documents, with an indication of the number of copies distributed to each of them.",
            InvoiceSuiteCodelistDocumentTypes::ADVICE_REPORT => "Document reporting advice.",
            InvoiceSuiteCodelistDocumentTypes::ADVISING_ITEMS_TO_BE_BOOKED_TO_A_FINANCIAL_ACCOUNT => "A document and/or message advising of items which have to be booked to a financial account.",
            InvoiceSuiteCodelistDocumentTypes::AEO_CERTIFICATE_FULL => "Certificate issued to business that fulfils specified criteria to both AEO Certificate of Security and/or Safety and AEO Certificate of Conformity or Compliance by a national AEO recognized program (e.g. AEO-Customs Simplifications/Security and Safety (AEOC/AEOS) - Regulation(EU) No 952/2013).",
            InvoiceSuiteCodelistDocumentTypes::AEO_CERTIFICATE_OF_CONFORMITY_OR_COMPLIANCE => "Certificate issued to business that fulfils specified criteria for compliance with tax and customs obligations, as well as financial solvency by a national AEO recognized program (e.g. AEO-Customs Simplifications (AEOC) - Regulation (EU) No 952/2013).",
            InvoiceSuiteCodelistDocumentTypes::AEO_CERTIFICATE_OF_SECURITY_ANDOR_SAFETY => "Certificate issued to business that fulfils specified criteria applied to the security and safety of the logistics chain in the flow of foreign trade operations by a national AEO recognized program (e.g. AEO-Security and Safety (AEOS) - Regulation (EU) No 952/2013).",
            InvoiceSuiteCodelistDocumentTypes::AGREEMENT_TO_PAY => "Document/message in which the debtor expresses the intention to pay.",
            InvoiceSuiteCodelistDocumentTypes::AIR_WAYBILL => "Document/message made out by or on behalf of the shipper which evidences the contract between the shipper and carrier(s) for carriage of goods over routes of the carrier(s) and which is identified by the airline prefix issuing the document plus a serial (IATA).",
            InvoiceSuiteCodelistDocumentTypes::AMICABLE_AGREEMENT => "Document specifying an amicable agreement.",
            InvoiceSuiteCodelistDocumentTypes::ANNOUNCEMENT_FOR_RETURNS => "A message by which a party announces to another party details of goods for return due to specified reasons (e.g. returns for repair, returns because of damage, etc).",
            InvoiceSuiteCodelistDocumentTypes::APPLICATION_ACKNOWLEDGEMENT_AND_ERROR_REPORT => "A message used by an application to acknowledge reception of a message and/or to report any errors.",
            InvoiceSuiteCodelistDocumentTypes::APPLICATION_ERROR_AND_ACKNOWLEDGEMENT => "A message to inform a message issuer that a previously sent message has been received by the addressees application, or that a previously sent message has been rejected by the addressees application.",
            InvoiceSuiteCodelistDocumentTypes::APPLICATION_ERROR_MESSAGE => "Message indicating that a message was rejected due to errors encountered at the application level.",
            InvoiceSuiteCodelistDocumentTypes::APPLICATION_FOR_BANKERS_DRAFT => "Application by a customer to his bank to issue a bankers draft stating the amount and currency of the draft, the name of the payee and the place and country of payment.",
            InvoiceSuiteCodelistDocumentTypes::APPLICATION_FOR_BANKERS_GUARANTEE => "Document/message whereby a customer requests his bank to issue a guarantee in favour of a nominated party in another country, stating the amount and currency and the specific conditions of the guarantee.",
            InvoiceSuiteCodelistDocumentTypes::APPLICATION_FOR_DESIGNATION_OF_BERTHING_PLACES => "Document to apply for designation of berthing places.",
            InvoiceSuiteCodelistDocumentTypes::APPLICATION_FOR_DOCUMENTARY_CREDIT => "Message with application for opening of a documentary credit.",
            InvoiceSuiteCodelistDocumentTypes::APPLICATION_FOR_EXCHANGE_ALLOCATION => "Document/message whereby an importer/buyer requests the competent body to allocate an amount of foreign exchange to be transferred to an exporter/seller in payment for goods.",
            InvoiceSuiteCodelistDocumentTypes::APPLICATION_FOR_GOODS_CONTROL_CERTIFICATE => "Document/message submitted to a competent body by party requesting a Goods control certificate to be issued in accordance with national or international standards, or conforming to legislation in the importing country, or as specified in the contract.",
            InvoiceSuiteCodelistDocumentTypes::APPLICATION_FOR_INSPECTION_CERTIFICATE => "Document/message submitted to a competent body by a party requesting an Inspection certificate to be issued in accordance with national or international standards, or conforming to legislation in the country in which it is required, or as specified in the contract.",
            InvoiceSuiteCodelistDocumentTypes::APPLICATION_FOR_PHYTOSANITARY_CERTIFICATE => "Document/message submitted to a competent body by party requesting a Phytosanitary certificate to be issued.",
            InvoiceSuiteCodelistDocumentTypes::APPLICATION_FOR_SHIFTING_FROM_THE_DESIGNATED_PLACE_IN_PORT => "Document to apply for shifting from the designated place in port.",
            InvoiceSuiteCodelistDocumentTypes::APPLICATION_FOR_USAGE_OF_BERTH_OR_MOORING_FACILITIES => "Document to apply for usage of berth or mooring facilities.",
            InvoiceSuiteCodelistDocumentTypes::APPLICATION_FOR_VESSELS_ENTERING_INTO_PORT_AREA_IN_NIGHTTIME => "Document to apply for vessels entering into port area in night-time.",
            InvoiceSuiteCodelistDocumentTypes::APPROVED_UNPRICED_BILL_OF_QUANTITY => "Document/message providing an approved detailed, quantity based specification (bill of quantity), in an unpriced form.",
            InvoiceSuiteCodelistDocumentTypes::ARRIVAL_INFORMATION => "Message reporting the arrival details of goods or cargo.",
            InvoiceSuiteCodelistDocumentTypes::ARRIVAL_NOTICE_GOODS => "Notification from the carrier to the consignee in writing, by telephone or by any other means (express letter, message, telegram, etc.) informing him that a consignment addressed to him is being or will shortly be held at his disposal at a specified point in the place of destination.",
            InvoiceSuiteCodelistDocumentTypes::ASSESSMENT_REPORT => "Document reporting an assessment.",
            InvoiceSuiteCodelistDocumentTypes::ATA_CARNET => "International Customs document (Admission Temporaire / Temporary Admission) which, issued under the terms of the ATA Convention (1961), incorporates an internationally valid guarantee and may be used, in lieu of national Customs documents and as security for import duties and taxes, to cover the temporary admission of goods and, where appropriate, the transit of goods. If accepted for controlling the temporary export and reimport of goods, international guarantee does not apply (CCC).",
            InvoiceSuiteCodelistDocumentTypes::AUDIO => "Document consisting of an audio recording (e.g. a telephone conversation or alike).",
            InvoiceSuiteCodelistDocumentTypes::AUTHORISATION_TO_PLAN_AND_SHIP_ORDERS => "Document or message that authorises receiver to plan and ship orders based on information in this message.",
            InvoiceSuiteCodelistDocumentTypes::AUTHORISATION_TO_PLAN_AND_SUGGEST_ORDERS => "Document or message that authorises receiver to plan orders, based on information in this message, and send these orders as suggestions to the sender.",
            InvoiceSuiteCodelistDocumentTypes::BAILMENT_CONTRACT => "A document authorizing the bailing of goods.",
            InvoiceSuiteCodelistDocumentTypes::BALANCE_CONFIRMATION => "Confirmation of a balance at an entry date.",
            InvoiceSuiteCodelistDocumentTypes::BANK_TO_BANK_FUNDS_TRANSFER => "The message is a bank to bank funds transfer.",
            InvoiceSuiteCodelistDocumentTypes::BANKERS_DRAFT => "Draft drawn in favour of a third party either by one bank on another bank, or by a branch of a bank on its head office (or vice versa) or upon another branch of the same bank. In either case, the draft should comply with the specifications laid down for cheques in the country in which it is to be payable.",
            InvoiceSuiteCodelistDocumentTypes::BANKERS_GUARANTEE => "Document/message in which a bank undertakes to pay out a limited amount of money to a designated party, on conditions stated therein (other than those laid down in the Uniform Customs Practice).",
            InvoiceSuiteCodelistDocumentTypes::BANKING_STATUS => "A banking status document and/or message.",
            InvoiceSuiteCodelistDocumentTypes::BASIC_AGREEMENT => "A document indicating an agreement containing basic terms and conditions applicable to future contracts between two parties.",
            InvoiceSuiteCodelistDocumentTypes::BAYPLANSTOWAGE_PLAN_FULL => "A full bayplan containing all occupied and/or blocked stowage locations.",
            InvoiceSuiteCodelistDocumentTypes::BAYPLANSTOWAGE_PLAN_PARTIAL => "A partial bayplan. containing only a selected part of the available stowage locations.",
            InvoiceSuiteCodelistDocumentTypes::BILL_OF_EXCHANGE => "Document/message, issued and signed in conformity with the applicable legislation, which contains an unconditional order whereby the drawer directs the drawee to pay a definite sum of money to the payee or to his order, on demand or at a definite time, against the surrender of the document itself.",
            InvoiceSuiteCodelistDocumentTypes::BILL_OF_LADING => "Negotiable document/message which evidences a contract of carriage by sea and the taking over or loading of goods by carrier, and by which carrier undertakes to deliver goods against surrender of the document. A provision in the document that goods are to be delivered to the order of a named person, or to order, or to bearer, constitutes such an undertaking.",
            InvoiceSuiteCodelistDocumentTypes::BILL_OF_LADING_COPY => "A copy of the bill of lading issued by a transport company.",
            InvoiceSuiteCodelistDocumentTypes::BILL_OF_LADING_ORIGINAL => "The original of the bill of lading issued by a transport company. When issued by the maritime industry it could signify ownership of the cargo.",
            InvoiceSuiteCodelistDocumentTypes::BINDING_CUSTOMER_AGREEMENT_FOR_CONTRACT => "Document which is a binding agreement from the customer for a contract, such as an insurance contract.",
            InvoiceSuiteCodelistDocumentTypes::BINDING_OFFER => "Document which is a binding offer from one party to another.",
            InvoiceSuiteCodelistDocumentTypes::BLANKET_ORDER => "Usage of document/message for general order purposes with later split into quantities and delivery dates and maybe delivery locations.",
            InvoiceSuiteCodelistDocumentTypes::BOOKING_CONFIRMATION => "Document/message issued by a carrier to confirm that space has been reserved for a consignment in means of transport.",
            InvoiceSuiteCodelistDocumentTypes::BOOKING_REQUEST => "Document/message issued by a supplier to a carrier requesting space to be reserved for a specified consignment, indicating desirable conveyance, despatch time, etc.",
            InvoiceSuiteCodelistDocumentTypes::BORDEREAU => "Document/message used in road transport, listing the cargo carried on a road vehicle, often referring to appended copies of Road consignment note.",
            InvoiceSuiteCodelistDocumentTypes::BUY_AMERICA_CERTIFICATE_OF_COMPLIANCE => "A document certifying that more than 50 percent of the cost of an item is attributed to US origin.",
            InvoiceSuiteCodelistDocumentTypes::CALCULATION_NOTE => "Document detailing a calculation, such as an invoice calculation or a costs calculation.",
            InvoiceSuiteCodelistDocumentTypes::CALL_FOR_TENDER => "A document/message used by a buyer to define the procurement procedure and request suppliers to participate.",
            InvoiceSuiteCodelistDocumentTypes::CALL_OFF_ORDER => "Document/message to provide split quantities and delivery dates referring to a previous blanket order.",
            InvoiceSuiteCodelistDocumentTypes::CALLOFF_DELIVERY => "Document/message to provide split quantities and delivery dates referring to a previous delivery instruction.",
            InvoiceSuiteCodelistDocumentTypes::CALLING_FORWARD_NOTICE => "Instructions for release or delivery of goods.",
            InvoiceSuiteCodelistDocumentTypes::CAMPAIGN_PRICESALES_CATALOGUE => "A price/sales catalogue containing special prices which are valid only for a specified period or under specified conditions.",
            InvoiceSuiteCodelistDocumentTypes::CARGO_ACCEPTANCE_ORDER => "Order to accept cargo to be delivered by a carrier.",
            InvoiceSuiteCodelistDocumentTypes::CARGO_ANALYSIS_VOYAGE_REPORT => "An analysis of the cargo for a voyage.",
            InvoiceSuiteCodelistDocumentTypes::CARGO_DECLARATION_ARRIVAL => "Generic term, sometimes referred to as Freight declaration, applied to the documents providing the particulars required by the Customs concerning the cargo (freight) carried by commercial means of transport (CCC).",
            InvoiceSuiteCodelistDocumentTypes::CARGO_DECLARATION_DEPARTURE => "Generic term, sometimes referred to as Freight declaration, applied to the documents providing the particulars required by the Customs concerning the cargo (freight) carried by commercial means of transport (CCC).",
            InvoiceSuiteCodelistDocumentTypes::CARGO_MANIFEST => "Listing of goods comprising the cargo carried in a means of transport or in a transport-unit. The cargo manifest gives the commercial particulars of the goods, such as transport document numbers, consignors, consignees, shipping marks, number and kind of packages and descriptions and quantities of the goods.",
            InvoiceSuiteCodelistDocumentTypes::CARGO_MOVEMENT_EVENT_LOG => "A document detailing times and dates of events pertaining to a cargo movement.",
            InvoiceSuiteCodelistDocumentTypes::CARGO_MOVEMENT_VOYAGE_SUMMARY => "A consolidated voyage summary which contains the information in a certificate of analysis, a voyage analysis and a cargo movement time log for a voyage.",
            InvoiceSuiteCodelistDocumentTypes::CARGO_RELEASE_NOTIFICATION => "Message/document sent by the cargo handler indicating that the cargo has moved from a Customs controlled premise.",
            InvoiceSuiteCodelistDocumentTypes::CARGO_STATUS => "Message identifying the status of cargo.",
            InvoiceSuiteCodelistDocumentTypes::CARGO_VESSEL_DISCHARGE_ORDER => "Order that the containers or cargo specified are to be discharged from a vessel.",
            InvoiceSuiteCodelistDocumentTypes::CARGO_VESSEL_LOADING_ORDER => "Order that specified cargo, containers or groups of containers are to be loaded in or on a vessel.",
            InvoiceSuiteCodelistDocumentTypes::CARGOGOODS_HANDLING_AND_MOVEMENT_MESSAGE => "A message from a party to a warehouse, distribution centre, or logistics service provider identifying the handling services and where required the movement of specified goods, limited to warehouses within the jurisdiction of the distribution centre or log.",
            InvoiceSuiteCodelistDocumentTypes::CARTAGE_ORDER_LOCAL_TRANSPORT => "Document/message giving instructions regarding local transport of goods, e.g. from the premises of an enterprise to those of a carrier undertaking further transport.",
            InvoiceSuiteCodelistDocumentTypes::CASH_POOL_FINANCIAL_STATEMENT => "A financial statement for a cash pool.",
            InvoiceSuiteCodelistDocumentTypes::CASING_SANITARY_CERTIFICATE => "Document or message issued by the competent authority in the exporting country evidencing that casing products comply with the requirements set by the importing country.",
            InvoiceSuiteCodelistDocumentTypes::CERTIFICATE => "Document by means of which the documentary credit applicant specifies the conditions for the certificate and by whom the certificate is to be issued.",
            InvoiceSuiteCodelistDocumentTypes::CERTIFICATE_OF_ANALYSIS => "Certificate providing the values of an analysis.",
            InvoiceSuiteCodelistDocumentTypes::CERTIFICATE_OF_COMPLIANCE_WITH_STANDARDS_OF_THE_WORLD_ORGANIZATION_FOR_ANIMAL_HEALTH_OIE => "A certification that the products have been treated in a way consistent with the standards set by the World Organization for Animal Health (OIE).",
            InvoiceSuiteCodelistDocumentTypes::CERTIFICATE_OF_CONFORMITY => "Certificate certifying the conformity to predefined definitions.",
            InvoiceSuiteCodelistDocumentTypes::CERTIFICATE_OF_DISEMBARKATION_PERMISSION => "Document or message issuing permission to disembark.",
            InvoiceSuiteCodelistDocumentTypes::CERTIFICATE_OF_FOOD_ITEM_TRANSPORT_READINESS => "A certificate to verify readiness of a transport or transport area such as a reservoir or hold to transport food items.",
            InvoiceSuiteCodelistDocumentTypes::CERTIFICATE_OF_ORIGIN => "Document/message identifying goods, in which the authority or body authorized to issue it certifies expressly that the goods to which the certificate relates originate in a specific country. The word country may include a group of countries, a region or a part of a country. This certificate may also include a declaration by the manufacturer, producer, supplier, exporter or other competent person.",
            InvoiceSuiteCodelistDocumentTypes::CERTIFICATE_OF_ORIGIN_FORM_GSP => "Specific form of certificate of origin for goods qualifying for preferential treatment under the generalized system of preferences (includes a combined declaration of origin and certificate, form A).",
            InvoiceSuiteCodelistDocumentTypes::CERTIFICATE_OF_ORIGIN_APPLICATION_FOR => "Document/message submitted to a competent body by an interested party requesting a Certificate of origin to be issued in accordance with relevant criteria, and on the basis of evidence of the origin of the goods.",
            InvoiceSuiteCodelistDocumentTypes::CERTIFICATE_OF_PAID_INSURANCE_PREMIUM => "Document certifying the payment of the insurance premium.",
            InvoiceSuiteCodelistDocumentTypes::CERTIFICATE_OF_QUALITY => "Certificate certifying the quality of goods, services etc.",
            InvoiceSuiteCodelistDocumentTypes::CERTIFICATE_OF_QUANTITY => "Certificate certifying the quantity of goods, services etc.",
            InvoiceSuiteCodelistDocumentTypes::CERTIFICATE_OF_REFRIGERATED_TRANSPORT_EQUIPMENT_INSPECTION => "Inspection document shows that the container, the cooling devices and measured temperature is in good working condition.",
            InvoiceSuiteCodelistDocumentTypes::CERTIFICATE_OF_REGISTRY => "Official certificate stating the vessels registry.",
            InvoiceSuiteCodelistDocumentTypes::CERTIFICATE_OF_SEALING_OF_EXPORT_MEAT_LOCKERS => "Document / message issued by the authority in the exporting country evidencing the sealing of export meat lockers.",
            InvoiceSuiteCodelistDocumentTypes::CERTIFICATE_OF_SHIPMENT => "(1109) Certificate providing confirmation that a consignment has been shipped.",
            InvoiceSuiteCodelistDocumentTypes::CERTIFICATE_OF_SUITABILITY_FOR_TRANSPORT_OF_GRAINS_AND_LEGUMES => "Certificate of inspection for the vessel stating its readiness and suitability for transporting grains and legumes.",
            InvoiceSuiteCodelistDocumentTypes::CERTIFICATE_OF_SUSTAINABILITY => "Document/message issued by a competent body certifying sustainability.",
            InvoiceSuiteCodelistDocumentTypes::CERTIFIED_COST_AND_PRICE_DATA => "A document indicating cost and price data whose accuracy has been certified.",
            InvoiceSuiteCodelistDocumentTypes::CERTIFIED_INSPECTION_AND_TEST_RESULTS => "A certification as to the accuracy of inspection and test results.",
            InvoiceSuiteCodelistDocumentTypes::CERTIFIED_LIST_OF_INGREDIENTS => "A document legalized from a competent authority that shows the components of the product (food additive, detergent, disinfectant and sanitizer).",
            InvoiceSuiteCodelistDocumentTypes::CHARGEBACK => "Document/message issued by a factor to a seller or to another factor to indicate that the rest of the amounts of one or more invoices uncollectable from buyers are charged back to clear the invoice(s) off the ledger.",
            InvoiceSuiteCodelistDocumentTypes::CHARGES_NOTE => "Document used by the rail organization to indicate freight charges or additional charges in each case where the departure station is not able to calculate the charges for the total voyage (e.g. tariff not yet updated, part of voyage not covered by the tariff). This document must be considered as joined to the transport.",
            InvoiceSuiteCodelistDocumentTypes::CIVIL_LIABILITY_FOR_OIL_CERTIFICATE => "Document declaring a ship owners liability for oil propelling or carried on a vessel.",
            InvoiceSuiteCodelistDocumentTypes::CIVIL_STATUS_DOCUMENT => "Document which confirms the civil status of a person.",
            InvoiceSuiteCodelistDocumentTypes::CLAIM_HISTORY_CERTIFICATE => "Document which certifies the history of claims.",
            InvoiceSuiteCodelistDocumentTypes::CLAIM_NOTIFICATION => "Document notifying a claim.",
            InvoiceSuiteCodelistDocumentTypes::CLOSE_OF_CLAIM => "Document reporting the closing of a claim file.",
            InvoiceSuiteCodelistDocumentTypes::CLOSING_STATEMENT_OF_AN_ACCOUNT => "Last statement of a period containing the interest calculation and the final balance of the last entry date.",
            InvoiceSuiteCodelistDocumentTypes::COINSURANCE_CEDING_BORDEREAU => "The document or message contains a bordereau describing co-insurance ceding information.",
            InvoiceSuiteCodelistDocumentTypes::CODE_CHANGE_REQUEST => "Request a change to an existing code.",
            InvoiceSuiteCodelistDocumentTypes::COLLATERAL_ACCOUNT => "Document message issued by a factor to indicate the movements of invoices, credit notes and payments of a sellers account.",
            InvoiceSuiteCodelistDocumentTypes::COLLECTION_ORDER => "Document/message whereby a bank is instructed (or requested) to handle financial and/or commercial documents in order to obtain acceptance and/or payment, or to deliver documents on such other terms and conditions as may be specified.",
            InvoiceSuiteCodelistDocumentTypes::COLLECTION_PAYMENT_ADVICE => "Document/message whereby a bank advises that a collection has been paid, giving details and methods of funds disposal.",
            InvoiceSuiteCodelistDocumentTypes::COMBINED_CERTIFICATE_OF_VALUE_AND_ORIGIN => "Document identifying goods in which the issuing authority expressly certifies that the goods originate in a specific country or part of, or group of countries. It also states the price and/or cost of the goods with the purpose of determining the customs origin.",
            InvoiceSuiteCodelistDocumentTypes::COMBINED_TRANSPORT_BILL_OF_LADINGMULTIMODAL_BILL_OF_LADING => "Document which evidences a multimodal transport contract, the taking in charge of the goods by the multimodal transport operator, and an undertaking by him to deliver the goods in accordance with the terms of the contract.",
            InvoiceSuiteCodelistDocumentTypes::COMBINED_TRANSPORT_DOCUMENT_GENERIC => "Negotiable or non-negotiable document evidencing a contract for the performance and/or procurement of performance of combined transport of goods and bearing on its face either the heading Negotiable combined transport document issued subject to Uniform Rules for a Combined Transport Document (ICC Brochure No. 298) or the heading Non-negotiable Combined Transport Document issued subject to Uniform Rules for a Combined Transport Document (ICC Brochure No. 298).",
            InvoiceSuiteCodelistDocumentTypes::COMMERCIAL_ACCOUNT_SUMMARY => "A message enabling the transmission of commercial data concerning payments made and outstanding items on an account over a period of time.",
            InvoiceSuiteCodelistDocumentTypes::COMMERCIAL_ACCOUNT_SUMMARY_RESPONSE => "A document providing a response to a previously sent commercial account summary message.",
            InvoiceSuiteCodelistDocumentTypes::COMMERCIAL_DISPUTE => "Document/message issued by a party (usually the buyer) to indicate that one or more invoices or one or more credit notes are disputed for payment.",
            InvoiceSuiteCodelistDocumentTypes::COMMERCIAL_INVOICE => "(1334) Document/message claiming payment for goods or services supplied under conditions agreed between seller and buyer.",
            InvoiceSuiteCodelistDocumentTypes::COMMERCIAL_INVOICE_WHICH_INCLUDES_A_PACKING_LIST => "Commercial transaction (invoice) will include a packing list.",
            InvoiceSuiteCodelistDocumentTypes::COMMISSION_NOTE => "(1111) Document/message in which a seller specifies the amount of commission, the percentage of the invoice amount, or some other basis for the calculation of the commission to which a sales agent is entitled.",
            InvoiceSuiteCodelistDocumentTypes::COMMUNICATION_FROM_OPPOSITE_PARTY => "Document containing a communication from the opposite party, such as in legal action.",
            InvoiceSuiteCodelistDocumentTypes::COMPOSITE_DATA_ELEMENT_CHANGE_REQUEST => "Request a change to an existing composite data element.",
            InvoiceSuiteCodelistDocumentTypes::COMPOSITE_DATA_ELEMENT_REQUEST => "Requesting a new composite data element.",
            InvoiceSuiteCodelistDocumentTypes::CONSIGNMENT_DESPATCH_ADVICE => "Document/message by means of which the supplier informs the buyer about the despatch of goods ordered on consignment (goods to be delivered into stock with agreement on payment when goods are sold out of this stock).",
            InvoiceSuiteCodelistDocumentTypes::CONSIGNMENT_INVOICE => "Commercial invoice that covers a transaction other than one involving a sale.",
            InvoiceSuiteCodelistDocumentTypes::CONSIGNMENT_ORDER => "Order to deliver goods into stock with agreement on payment when goods are sold out of this stock.",
            InvoiceSuiteCodelistDocumentTypes::CONSIGNMENT_STATUS_REPORT => "Message covers information about the consignment status.",
            InvoiceSuiteCodelistDocumentTypes::CONSIGNMENT_UNPACK_REPORT => "A document code to indicate that the message being transmitted is a consignment unpack report only.",
            InvoiceSuiteCodelistDocumentTypes::CONSOLIDATED_CREDIT_NOTE_GOODS_AND_SERVICES => "Credit note for goods and services that covers multiple transactions involving more than one invoice.",
            InvoiceSuiteCodelistDocumentTypes::CONSOLIDATED_INVOICE => "Commercial invoice that covers multiple transactions involving more than one vendor.",
            InvoiceSuiteCodelistDocumentTypes::CONSULAR_INVOICE => "Document/message to be prepared by an exporter in his country and presented to a diplomatic representation of the importing country for endorsement and subsequently to be presented by the importer in connection with the import of the goods described therein.",
            InvoiceSuiteCodelistDocumentTypes::CONTAINER_DISCHARGE_LIST => "Message/document itemising containers to be discharged from vessel.",
            InvoiceSuiteCodelistDocumentTypes::CONTAINER_LIST => "Document or message issued by party identifying the containers for which they are responsible.",
            InvoiceSuiteCodelistDocumentTypes::CONTAINER_MANIFEST_UNIT_PACKING_LIST => "Document/message specifying the contents of particular freight containers or other transport units, prepared by the party responsible for their loading into the container or unit.",
            InvoiceSuiteCodelistDocumentTypes::CONTAINER_OFFHIRE_NOTICE => "Notice to return leased containers.",
            InvoiceSuiteCodelistDocumentTypes::CONTAINER_STRIPPING_ORDER => "Order to unload goods from a container.",
            InvoiceSuiteCodelistDocumentTypes::CONTAINER_STUFFING_ORDER => "Order to stuff specified goods or consignments in a container.",
            InvoiceSuiteCodelistDocumentTypes::CONTAINER_TRANSFER_NOTE => "Document for the carriage of containers. Syn: transfer note.",
            InvoiceSuiteCodelistDocumentTypes::CONTRACT => "(1296) Document/message evidencing an agreement between the seller and the buyer for the supply of goods or services; its effects are equivalent to those of an order followed by an acknowledgement of order.",
            InvoiceSuiteCodelistDocumentTypes::CONTRACT_BILL_OF_QUANTITIES_BOQ => "Document/message providing a formal specification identifying quantities and prices that are the basis of a contract for a construction project. BOQ means: Bill of quantity.",
            InvoiceSuiteCodelistDocumentTypes::CONTRACT_CLAUSES => "Document specifying the clauses applying to a contract.",
            InvoiceSuiteCodelistDocumentTypes::CONTRACT_FUNDS_STATUS_REPORT_CFSR => "A report to provide the status of funds applicable to the contract.",
            InvoiceSuiteCodelistDocumentTypes::CONTRACT_PRICE_AND_DELIVERY_QUOTE => "Document/message confirming contractual price conditions and contractual delivery conditions under which goods are offered.",
            InvoiceSuiteCodelistDocumentTypes::CONTRACT_PRICE_QUOTE => "Document/message confirming contractual price conditions under which goods are offered.",
            InvoiceSuiteCodelistDocumentTypes::CONTRACT_SECURITY_CLASSIFICATION_SPECIFICATION => "A document that indicates the specification contains the security and classification requirements for a contract.",
            InvoiceSuiteCodelistDocumentTypes::CONTROL_DOCUMENT_T => "Control document (export declaration) used particularly in case of re-sending without use with only VAT collection, refusal, unconformity with contract etc.",
            InvoiceSuiteCodelistDocumentTypes::CONVENTION_ON_INTERNATIONAL_TRADE_IN_ENDANGERED_SPECIES_OF_WILD_FAUNA_AND_FLORA_CITES_CERTIFICATE => "A certificate used in the trade of endangered species in accordance with the CITES convention.",
            InvoiceSuiteCodelistDocumentTypes::CONVEYANCE_DECLARATION => "Declaration of the conveyance to a public authority.",
            InvoiceSuiteCodelistDocumentTypes::CONVEYANCE_DECLARATION_ARRIVAL => "Declaration to the public authority upon arrival of the conveyance.",
            InvoiceSuiteCodelistDocumentTypes::CONVEYANCE_DECLARATION_COMBINED => "Combined declaration of arrival and departure to the public authority.",
            InvoiceSuiteCodelistDocumentTypes::CONVEYANCE_DECLARATION_DEPARTURE => "Declaration to the public authority upon departure of the conveyance.",
            InvoiceSuiteCodelistDocumentTypes::COPY_ACCOUNTING_VOUCHER => "To indicate that the document/message justifying an accounting entry is a copy.",
            InvoiceSuiteCodelistDocumentTypes::CORPORATE_SUPERANNUATION_CONTRIBUTIONS_ADVICE => "Document/message providing contributions advice used for corporate superannuation schemes.",
            InvoiceSuiteCodelistDocumentTypes::CORPORATE_SUPERANNUATION_MEMBER_MAINTENANCE_MESSAGE => "Member maintenance message used for corporate superannuation schemes.",
            InvoiceSuiteCodelistDocumentTypes::CORRECTED_INVOICE => "Commercial invoice that includes revised information differing from an earlier submission of the same invoice.",
            InvoiceSuiteCodelistDocumentTypes::COST_DATA_SUMMARY => "A document indicating a summary of cost data.",
            InvoiceSuiteCodelistDocumentTypes::COST_PERFORMANCE_REPORT => "A report to convey cost performance data for a project or contract.",
            InvoiceSuiteCodelistDocumentTypes::COST_PERFORMANCE_REPORT_CPR_FORMAT => "A report identifying the cost performance on a contract including the current months values at specified levels of the work breakdown structure (format 1 - work breakdown structure).",
            InvoiceSuiteCodelistDocumentTypes::COST_PERFORMANCE_REPORT_CPR_FORMAT => "A report identifying the cost performance on a contract at specified levels of the work breakdown structure (format 2 - organizational categories).",
            InvoiceSuiteCodelistDocumentTypes::COST_PERFORMANCE_REPORT_CPR_FORMAT => "A report identifying the cost performance on a contract that summarizes changes to a contract over a given reporting period with beginning and ending values (format 3 - baseline).",
            InvoiceSuiteCodelistDocumentTypes::COST_PERFORMANCE_REPORT_CPR_FORMAT => "A report identifying the cost performance on a contract including forecasts of labour requirements for the remaining portion of the contract (format 4 - staffing).",
            InvoiceSuiteCodelistDocumentTypes::COST_PERFORMANCE_REPORT_CPR_FORMAT => "A report identifying the cost performance on a contract that summarizes cost or schedule variances (format 5 - explanations and problem analysis).",
            InvoiceSuiteCodelistDocumentTypes::COST_SCHEDULE_STATUS_REPORT_CSSR => "A report providing the status of the cost and schedule applicable to a contract.",
            InvoiceSuiteCodelistDocumentTypes::COURT_JUDGMENT => "Document specifying a judgment of a court.",
            InvoiceSuiteCodelistDocumentTypes::COVER_NOTE => "Document/message issued by an insurer (insurance broker, agent, etc.) to notify the insured that his insurance have been carried out.",
            InvoiceSuiteCodelistDocumentTypes::COVERAGE_CONFIRMATION_NOTE => "Document confirming that insurance coverage is granted.",
            InvoiceSuiteCodelistDocumentTypes::CREDIT_ADVICE => "Document/message sent by an account servicing institution to one of its account owners, to inform the account owner of an entry which has been or will be credited to its account for a specified amount on the date indicated.",
            InvoiceSuiteCodelistDocumentTypes::CREDIT_COVER => "Document/message issued either by a factor to give a credit cover on a buyer, or by a seller to request a factors credit cover.",
            InvoiceSuiteCodelistDocumentTypes::CREDIT_NOTE => "(1113) Document/message for providing credit information to the relevant party.",
            InvoiceSuiteCodelistDocumentTypes::CREDIT_NOTE_FOR_PRICE_VARIATION => "A credit note which is issued against a price variation invoice.",
            InvoiceSuiteCodelistDocumentTypes::CREDIT_NOTE_RELATED_TO_FINANCIAL_ADJUSTMENTS => "Document message for providing credit information related to financial adjustments to the relevant party, e.g., bonuses.",
            InvoiceSuiteCodelistDocumentTypes::CREDIT_NOTE_RELATED_TO_GOODS_OR_SERVICES => "Document message used to provide credit information related to a transaction for goods or services to the relevant party.",
            InvoiceSuiteCodelistDocumentTypes::CREW_LIST_DECLARATION => "Declaration regarding crew members aboard the conveyance.",
            InvoiceSuiteCodelistDocumentTypes::CREWS_EFFECTS_DECLARATION => "Declaration to Customs regarding the personal effects of crew members aboard the conveyance; equivalent to IMO FAL 4.",
            InvoiceSuiteCodelistDocumentTypes::CROSS_DOCKING_DESPATCH_ADVICE => "Document by means of which the supplier or consignor informs the buyer, consignee or the distribution centre about the despatch of goods for cross docking.",
            InvoiceSuiteCodelistDocumentTypes::CROSS_DOCKING_SERVICES_ORDER => "A document or message to order cross docking services.",
            InvoiceSuiteCodelistDocumentTypes::CURRENT_ACCOUNT => "Document/message issued by a factor to indicate the money movements of a sellers or another factors account with him.",
            InvoiceSuiteCodelistDocumentTypes::CUSTOMER_PAYMENT_ORDERS => "The message contains customer payment order(s).",
            InvoiceSuiteCodelistDocumentTypes::CUSTOMS_CLEARANCE_NOTICE => "Notification of customs clearance of cargo or items of transport equipment.",
            InvoiceSuiteCodelistDocumentTypes::CUSTOMS_CREW_AND_CONVEYANCE => "Document/message contains information regarding the crew list and conveyance.",
            InvoiceSuiteCodelistDocumentTypes::CUSTOMS_DECLARATION_POST_PARCELS => "Document/message which, according to Article 106 of the Agreement concerning Postal Parcels under the UPU Convention, must accompany post parcels and in which the contents of such parcels are specified.",
            InvoiceSuiteCodelistDocumentTypes::CUSTOMS_DECLARATION_FOR_CARGO_EXAMINATION => "Declaration provided to customs for cargo examination.",
            InvoiceSuiteCodelistDocumentTypes::CUSTOMS_DECLARATION_FOR_CARGO_EXAMINATION_ALTERNATE => "Alternate declaration provided to customs for cargo examination.",
            InvoiceSuiteCodelistDocumentTypes::CUSTOMS_DECLARATION_FOR_TIR_CARNET_GOODS => "A Customs declaration in which goods move under cover of TIR Carnets.",
            InvoiceSuiteCodelistDocumentTypes::CUSTOMS_DECLARATION_WITH_COMMERCIAL_AND_ITEM_DETAIL => "CUSDEC transmission that includes data from both the commercial detail and item detail sections of the message.",
            InvoiceSuiteCodelistDocumentTypes::CUSTOMS_DECLARATION_WITHOUT_COMMERCIAL_DETAIL => "CUSDEC transmission that does not include data from the commercial detail section of the message.",
            InvoiceSuiteCodelistDocumentTypes::CUSTOMS_DECLARATION_WITHOUT_ITEM_DETAIL => "CUSDEC transmission that does not include data from the item detail section of the message.",
            InvoiceSuiteCodelistDocumentTypes::CUSTOMS_DELIVERY_NOTE => "Document/message whereby a Customs authority releases goods under its control to be placed at the disposal of the party concerned. Synonym: Customs release note.",
            InvoiceSuiteCodelistDocumentTypes::CUSTOMS_DOCUMENTS_EXPIRATION_NOTICE => "Notice specifying expiration of Customs documents relating to cargo or items of transport equipment.",
            InvoiceSuiteCodelistDocumentTypes::CUSTOMS_IMMEDIATE_RELEASE_DECLARATION => "Document/message issued by an importer notifying Customs that goods have been removed from an importing means of transport to the importers premises under a Customs-approved arrangement for immediate release, or requesting authorization to do so.",
            InvoiceSuiteCodelistDocumentTypes::CUSTOMS_INVOICE => "Document/message required by the Customs in an importing country in which an exporter states the invoice or other price (e.g. selling price, price of identical goods), and specifies costs for freight, insurance and packing, etc., terms of delivery and payment, for the purpose of determining the Customs value in the importing country of goods consigned to that country.",
            InvoiceSuiteCodelistDocumentTypes::CUSTOMS_MANIFEST => "Message/document identifying a customs manifest. The document itemises a list of cargo prepared by shipping companies from bills of landing and presented to customs for formal report of cargo.",
            InvoiceSuiteCodelistDocumentTypes::CUSTOMS_SUMMARY_DECLARATION_WITH_COMMERCIAL_DETAIL_ALTERNATE => "Alternate Customs declaration summary with commercial transaction details.",
            InvoiceSuiteCodelistDocumentTypes::CUSTOMS_SUMMARY_DECLARATION_WITHOUT_COMMERCIAL_DETAIL_ALTERNATE => "Alternate Customs declaration summary without any commercial transaction details.",
            InvoiceSuiteCodelistDocumentTypes::DAMAGE_CERTIFICATION => "Official certification that damages to the goods to be transported have been discovered.",
            InvoiceSuiteCodelistDocumentTypes::DANGEROUS_GOODS_DECLARATION => "(1115) Document/message issued by a consignor in accordance with applicable conventions or regulations, describing hazardous goods or materials for transport purposes, and stating that the latter have been packed and labelled in accordance with the provisions of the relevant conventions or regulations.",
            InvoiceSuiteCodelistDocumentTypes::DANGEROUS_GOODS_LIST => "Listing of all details of dangerous goods carried.",
            InvoiceSuiteCodelistDocumentTypes::DANGEROUS_GOODS_NOTIFICATION_FOR_NONTANKER_VESSEL => "Dangerous Goods Notification for a vessel carrying cargo other than bulk liquid cargo.",
            InvoiceSuiteCodelistDocumentTypes::DANGEROUS_GOODS_NOTIFICATION_FOR_TANKER_VESSEL => "Dangerous Goods Notification for a vessel carrying liquid cargo in bulk.",
            InvoiceSuiteCodelistDocumentTypes::DATA_PLOT_SHEET => "Document/Message providing technical description and information of the crop production.",
            InvoiceSuiteCodelistDocumentTypes::DATA_PROTECTION_REGULATIONS_STATEMENT => "Document specifying the terms of data protection regulations.",
            InvoiceSuiteCodelistDocumentTypes::DEBIT_ADVICE => "Advice on a debit.",
            InvoiceSuiteCodelistDocumentTypes::DEBIT_NOTE => "Document/message for providing debit information to the relevant party.",
            InvoiceSuiteCodelistDocumentTypes::DEBIT_NOTE_RELATED_TO_FINANCIAL_ADJUSTMENTS => "Document/message for providing debit information related to financial adjustments to the relevant party.",
            InvoiceSuiteCodelistDocumentTypes::DEBIT_NOTE_RELATED_TO_GOODS_OR_SERVICES => "Debit information related to a transaction for goods or services to the relevant party.",
            InvoiceSuiteCodelistDocumentTypes::DECLARATION_FOR_RADIOACTIVE_MATERIAL => "A declaration to be presented to the competent authority when radioactive material moves cross-border.",
            InvoiceSuiteCodelistDocumentTypes::DECLARATION_OF_FINAL_BENEFICIARY => "Declaration document to identify the final beneficiary of an asset.",
            InvoiceSuiteCodelistDocumentTypes::DECLARATION_OF_ORIGIN => "Appropriate statement as to the origin of the goods, made in connection with their exportation by the manufacturer, producer, supplier, exporter or other competent person on the Commercial invoice or any other document relating to the goods (CCC).",
            InvoiceSuiteCodelistDocumentTypes::DECLARATION_REGARDING_THE_INWARD_AND_OUTWARD_MOVEMENT_OF_VESSEL => "Document to declare inward and outward movement of a vessel.",
            InvoiceSuiteCodelistDocumentTypes::DELCREDERE_CREDIT_NOTE => "A credit note sent to the party paying on behalf of a number of buyers.",
            InvoiceSuiteCodelistDocumentTypes::DELCREDERE_INVOICE => "An invoice sent to the party paying for a number of buyers.",
            InvoiceSuiteCodelistDocumentTypes::DELIVERY_FORECAST => "A message which enables the transmission of delivery or product forecasting requirements.",
            InvoiceSuiteCodelistDocumentTypes::DELIVERY_INSTRUCTIONS => "(1174) Document/message giving instruction regarding the delivery of goods.",
            InvoiceSuiteCodelistDocumentTypes::DELIVERY_JUSTINTIME => "Usage of DELJIT-message.",
            InvoiceSuiteCodelistDocumentTypes::DELIVERY_NOTE => "Paper document attached to a consignment informing the receiving party about contents of this consignment.",
            InvoiceSuiteCodelistDocumentTypes::DELIVERY_NOTICE_GOODS => "Notification in writing, sent by the carrier to the sender, to inform him at his request of the actual date of delivery of the goods.",
            InvoiceSuiteCodelistDocumentTypes::DELIVERY_NOTICE_RAIL_TRANSPORT => "Document/message created by the consignor or by the departure station, joined to the transport or sent to the consignee, giving the possibility to the consignee or the arrival station to attest the delivery of the goods. The document must be returned to the consignor or to the departure station.",
            InvoiceSuiteCodelistDocumentTypes::DELIVERY_ORDER => "Document/message issued by a party entitled to authorize the release of goods specified therein to a named consignee, to be retained by the custodian of the goods.",
            InvoiceSuiteCodelistDocumentTypes::DELIVERY_POINT_LIST => "A list of delivery point addresses.",
            InvoiceSuiteCodelistDocumentTypes::DELIVERY_QUOTE => "Document/message confirming delivery conditions under which goods are offered.",
            InvoiceSuiteCodelistDocumentTypes::DELIVERY_RELEASE => "Document/message issued by a buyer releasing the despatch of goods after receipt of the Ready for despatch advice from the seller.",
            InvoiceSuiteCodelistDocumentTypes::DELIVERY_SCHEDULE => "Usage of DELFOR-message.",
            InvoiceSuiteCodelistDocumentTypes::DELIVERY_SCHEDULE_RESPONSE => "A message providing a response to a previously transmitted delivery schedule.",
            InvoiceSuiteCodelistDocumentTypes::DELIVERY_VERIFICATION_CERTIFICATE => "Document/message whereby an official authority (Customs or governmental) certifies that goods have been delivered.",
            InvoiceSuiteCodelistDocumentTypes::DERAT_DOCUMENT => "Document certifying that a ship is free of rats, valid to a specified date.",
            InvoiceSuiteCodelistDocumentTypes::DERATTING_EXEMPTION_CERTIFICATE => "Document certifying that the object was free of rats when inspected and that it is exempt from a deratting statement.",
            InvoiceSuiteCodelistDocumentTypes::DESPATCH_ADVICE => "Document/message by means of which the seller or consignor informs the consignee about the despatch of goods.",
            InvoiceSuiteCodelistDocumentTypes::DESPATCH_NOTE_POST_PARCELS => "Document/message which, according to Article 106 of the Agreement concerning Postal Parcels under the UPU convention, is to accompany post parcels.",
            InvoiceSuiteCodelistDocumentTypes::DESPATCH_NOTE_MODEL_T => "European community transit declaration.",
            InvoiceSuiteCodelistDocumentTypes::DESPATCH_NOTE_MODEL_T => "Transit declaration for goods circulating under internal community transit procedures (between European Union (EU) countries).",
            InvoiceSuiteCodelistDocumentTypes::DESPATCH_NOTE_MODEL_T => "Ascertainment that the declared goods were originally produced in an European Union (EU) country.",
            InvoiceSuiteCodelistDocumentTypes::DESPATCH_NOTE_MODEL_TL => "Ascertainment that the declared goods were originally produced in an European Union (EU) country. May only be used for goods that are loaded on one single means of transport in one single departure point for one single delivery point.",
            InvoiceSuiteCodelistDocumentTypes::DESPATCH_ORDER => "Document/message issued by a supplier initiating the despatch of goods to a buyer (consignee).",
            InvoiceSuiteCodelistDocumentTypes::DIRECT_DEBIT_AUTHORISATION => "Document giving the addressee the right to debit from an account of the authorizing party.",
            InvoiceSuiteCodelistDocumentTypes::DIRECT_DELIVERY_TRANSPORT => "Document/message ordering the direct delivery of goods/consignment from one means of transport into another means of transport in one movement.",
            InvoiceSuiteCodelistDocumentTypes::DIRECT_PAYMENT_VALUATION => "Document/message addressed, for instance, by a general contractor to the owner, in order that a direct payment be made to a subcontractor.",
            InvoiceSuiteCodelistDocumentTypes::DIRECT_PAYMENT_VALUATION_REQUEST => "Request to establish a direct payment valuation.",
            InvoiceSuiteCodelistDocumentTypes::DOCUMENT_FOR_ESTABLISHING_THE_CUSTOMS_STATUS_OF_GOODS_FOR_SAN_MARINO_TLSM => "Form establishing the Community status of goods (T2L under European Legislation) in the context of trade between the EU and San Marino. (T2LSM under EU Legislation).",
            InvoiceSuiteCodelistDocumentTypes::DOCUMENT_RESPONSE_CUSTOMS => "Document response message to permit the transfer of data from Customs to the transmitter of the previous message.",
            InvoiceSuiteCodelistDocumentTypes::DOCUMENTARY_CREDIT => "Document/message in which a bank states that it has issued a documentary credit under which the beneficiary is to obtain payment, acceptance or negotiation on compliance with certain terms and conditions and against presentation of stipulated documents and such drafts as may be specified. The credit may or may not be confirmed by another bank.",
            InvoiceSuiteCodelistDocumentTypes::DOCUMENTARY_CREDIT_ACCEPTANCE_ADVICE => "Document/message whereby a bank advises acceptance under a documentary credit.",
            InvoiceSuiteCodelistDocumentTypes::DOCUMENTARY_CREDIT_AMENDMENT => "Document/message whereby a bank notifies a beneficiary of the details of an amendment to the terms and conditions of a documentary credit.",
            InvoiceSuiteCodelistDocumentTypes::DOCUMENTARY_CREDIT_AMENDMENT_INFORMATION => "Documentary credit amendment information.",
            InvoiceSuiteCodelistDocumentTypes::DOCUMENTARY_CREDIT_AMENDMENT_NOTIFICATION => "Document/message whereby a bank advises that the terms and conditions of a documentary credit have been amended.",
            InvoiceSuiteCodelistDocumentTypes::DOCUMENTARY_CREDIT_APPLICATION => "Document/message whereby a bank is requested to issue a documentary credit on the conditions specified therein.",
            InvoiceSuiteCodelistDocumentTypes::DOCUMENTARY_CREDIT_COLLECTION_INSTRUCTION => "Instruction for the collection of the documentary credit.",
            InvoiceSuiteCodelistDocumentTypes::DOCUMENTARY_CREDIT_ISSUANCE_INFORMATION => "Provides information on documentary credit issuance.",
            InvoiceSuiteCodelistDocumentTypes::DOCUMENTARY_CREDIT_LETTER_OF_INDEMNITY => "Document/message in which a beneficiary of a documentary credit accepts responsibility for non-compliance with the terms and conditions of the credit, and undertakes to refund the money received under the credit, with interest and charges accrued.",
            InvoiceSuiteCodelistDocumentTypes::DOCUMENTARY_CREDIT_NEGOTIATION_ADVICE => "Document/message whereby a bank advises negotiation under a documentary credit.",
            InvoiceSuiteCodelistDocumentTypes::DOCUMENTARY_CREDIT_NOTIFICATION => "Document/message issued by an advising bank in order to transmit a documentary credit to a beneficiary, or to another advising bank.",
            InvoiceSuiteCodelistDocumentTypes::DOCUMENTARY_CREDIT_PAYMENT_ADVICE => "Document/message whereby a bank advises payment under a documentary credit.",
            InvoiceSuiteCodelistDocumentTypes::DOCUMENTARY_CREDIT_TRANSFER_ADVICE => "Document/message whereby a bank advises that (part of) a documentary credit is being or has been transferred in favour of a second beneficiary.",
            InvoiceSuiteCodelistDocumentTypes::DOCUMENTS_PRESENTATION_FORM => "Document/message whereby a draft or similar instrument and/or commercial documents are presented to a bank for acceptance, discounting, negotiation, payment or collection, whether or not against a documentary credit.",
            InvoiceSuiteCodelistDocumentTypes::DRAFT_BILL_OF_QUANTITY => "Document/message providing a draft bill of quantity, issued in an unpriced form.",
            InvoiceSuiteCodelistDocumentTypes::DRAWING => "The document or message is a drawing.",
            InvoiceSuiteCodelistDocumentTypes::DRIVING_LICENCE_INTERNATIONAL => "An official document giving a native of one country permission to drive a vehicle in certain other countries.",
            InvoiceSuiteCodelistDocumentTypes::DRIVING_LICENCE_NATIONAL => "An official document giving permission to drive a vehicle in a given country.",
            InvoiceSuiteCodelistDocumentTypes::DRUG_SHELF_LIFE_STUDY_REPORT => "A document containing results from the study which determines the shelf life, namely the time period of storage at a specified condition within which a drug substance or drug product still meets its established specifications; its identity, strength, quality and purity.",
            InvoiceSuiteCodelistDocumentTypes::DUTY_SUSPENDED_GOODS => "Document giving details for the carriage of excisable goods on a duty-suspended basis.",
            InvoiceSuiteCodelistDocumentTypes::EC_CARNET => "EC customs transit document issued by EC customs authorities for transit and/or temporary user of goods within the EC.",
            InvoiceSuiteCodelistDocumentTypes::EDI_ASSOCIATED_OBJECT_ADMINISTRATION_MESSAGE => "A message giving additional information about the exchange of an EDI associated object.",
            InvoiceSuiteCodelistDocumentTypes::EMBARGO_PERMIT => "Document/message giving the permission to export specified goods.",
            InvoiceSuiteCodelistDocumentTypes::EMPTY_CONTAINER_BILL => "Bill of lading indicating an empty container.",
            InvoiceSuiteCodelistDocumentTypes::EMPTY_CONTAINER_DISPOSITION_ORDER => "Order to make available empty containers.",
            InvoiceSuiteCodelistDocumentTypes::END_USE_AUTHORIZATION => "Document issued by Customs granting the end-use Customs procedure.",
            InvoiceSuiteCodelistDocumentTypes::ENQUIRY => "Document/message issued by a party interested in the purchase of goods specified therein and indicating particular, desirable conditions regarding delivery terms, etc., addressed to a prospective supplier with a view to obtaining an offer.",
            InvoiceSuiteCodelistDocumentTypes::ERROR_RESPONSE_CUSTOMS => "Error response message to permit the transfer of data from Customs to the transmitter of the previous message.",
            InvoiceSuiteCodelistDocumentTypes::ESCORT_OFFICIAL_RECOGNITION => "Document/message which gives right to the owner to exert all functions normally transferred to a guard in a train by which an escorted consignment is transported.",
            InvoiceSuiteCodelistDocumentTypes::ESTIMATED_PRICED_BILL_OF_QUANTITY => "An estimate based upon a detailed, quantity based specification (bill of quantity).",
            InvoiceSuiteCodelistDocumentTypes::EU_CUSTOMS_DECLARATION_FOR_EXTERNAL_COMMUNITY_TRANSIT_T => "Customs declaration for goods under the external Community/common transit procedure. This applies to non-Community goods (T1 under EU legislation and EC-EFTA Transit Convention).",
            InvoiceSuiteCodelistDocumentTypes::EU_CUSTOMS_DECLARATION_FOR_INTERNAL_COMMUNITY_TRANSIT_T => "Customs declaration for goods under the internal Community/common transit procedure. This applies to Community goods (T2 under EU legislation and EC-EFTA Transit Convention).",
            InvoiceSuiteCodelistDocumentTypes::EU_CUSTOMS_DECLARATION_FOR_INTERNAL_TRANSIT_TO_SAN_MARINO_TSM => "Customs declaration for goods under the internal Community transit procedure between the Community and San Marino. (T2SM under EU Legislation).",
            InvoiceSuiteCodelistDocumentTypes::EU_CUSTOMS_DECLARATION_FOR_MIXED_CONSIGNMENTS_T => "Customs declaration for goods under the Community/common transit procedure for mixed consignments (i.e. consignments that comprise goods of different statuses, like T1 and T2) (T under EU Legislation).",
            InvoiceSuiteCodelistDocumentTypes::EU_CUSTOMS_DECLARATION_FOR_NONFISCAL_AREA_INTERNAL_COMMUNITY_TRANSIT_TF => "Declaration for goods under the internal Community transit procedure in the context of trade between the VAT territory of EU Member States and EU territories where the VAT rules do not apply, such as Canary islands, some French overseas territories, the Channel islands and the Aaland islands, and between those territories. (T2F under EU Legislation).",
            InvoiceSuiteCodelistDocumentTypes::EU_DOCUMENT_FOR_ESTABLISHING_THE_COMMUNITY_STATUS_OF_GOODS_TL => "Form establishing the Community status of goods (T2L under EU Legislation).",
            InvoiceSuiteCodelistDocumentTypes::EU_DOCUMENT_FOR_ESTABLISHING_THE_COMMUNITY_STATUS_OF_GOODS_FOR_CERTAIN_FISCAL_PURPOSES_TLF => "Form establishing the Community status of goods in the context of trade between the VAT territory of EU Member States and EU territories where the VAT rules do not apply, such as Canary islands, some French overseas territories, the Channel islands and the Aaland islands, and between those territories (T2LF under EU Legislation).",
            InvoiceSuiteCodelistDocumentTypes::EUR__CERTIFICATE_OF_ORIGIN => "Customs certificate used in preferential goods interchanges between EC countries and EC external countries.",
            InvoiceSuiteCodelistDocumentTypes::EUROPEAN_SINGLE_PROCUREMENT_DOCUMENT => "A document/message containing a self-declaration by the supplier, providing preliminary evidence during the tendering phase.",
            InvoiceSuiteCodelistDocumentTypes::EUROPEAN_SINGLE_PROCUREMENT_DOCUMENT_REQUEST => "A document/message requesting a self-declaration from the supplier, providing preliminary evidence during the tendering phase.",
            InvoiceSuiteCodelistDocumentTypes::EXCEPTIONAL_ORDER => "An order which falls outside the framework of an agreement.",
            InvoiceSuiteCodelistDocumentTypes::EXCHANGE_CONTROL_DECLARATION_IMPORT => "Document/message completed by an importer/buyer as a means for the competent body to control that a trade transaction for which foreign exchange has been allocated has been executed and that money has been transferred in accordance with the conditions of payment and the exchange control regulations in force.",
            InvoiceSuiteCodelistDocumentTypes::EXCHANGE_CONTROL_DECLARATION_EXPORT => "Document/message completed by an exporter/seller as a means whereby the competent body may control that the amount of foreign exchange accrued from a trade transaction is repatriated in accordance with the conditions of payment and exchange control regulations in force.",
            InvoiceSuiteCodelistDocumentTypes::EXCISE_CERTIFICATE => "Certificate asserting that the goods have been submitted to the excise authorities before departure from the exporting country or before delivery in case of import traffic.",
            InvoiceSuiteCodelistDocumentTypes::EXCLUSIVE_BROKERAGE_MANDATE => "Document expressing the mandate of a client for a service only by the mandated broker.",
            InvoiceSuiteCodelistDocumentTypes::EXPORT_LICENCE => "Permit issued by a government authority permitting exportation of a specified commodity subject to specified conditions as quantity, country of destination, etc. Synonym: Embargo permit.",
            InvoiceSuiteCodelistDocumentTypes::EXPORT_LICENCE_APPLICATION_FOR => "Application for a permit issued by a government authority permitting exportation of a specified commodity subject to specified conditions as quantity, country of destination, etc.",
            InvoiceSuiteCodelistDocumentTypes::EXPORT_PRICE_CERTIFICATE => "A certification executed by the competent authority from country of exportation stating the export price of the goods.",
            InvoiceSuiteCodelistDocumentTypes::EXTENDED_CREDIT_ADVICE => "Document/message sent by an account servicing institution to one of its account owners, to inform the account owner of an entry that has been or will be credited to its account for a specified amount on the date indicated. It provides extended commercial information concerning the relevant remittance advice.",
            InvoiceSuiteCodelistDocumentTypes::EXTENDED_PAYMENT_ORDER => "Document/message containing information needed to initiate the payment. It may cover the financial settlement for several commercial trade transactions, which it is possible to specify in a special payments detail part. It is an instruction to the ordered bank to arrange for the payment of one specified amount to the beneficiary.",
            InvoiceSuiteCodelistDocumentTypes::EXTRACOMMUNITY_TRADE_STATISTICAL_DECLARATION => "Document/message in which a declarant provides information about extra-Community trade of goods required by the body responsible for the collection of trade statistics. Trade by a country in the European Union with a country outside the European Union.",
            InvoiceSuiteCodelistDocumentTypes::FACTORED_CREDIT_NOTE => "Credit note related to assigned invoice(s).",
            InvoiceSuiteCodelistDocumentTypes::FACTORED_INVOICE => "Invoice assigned to a third party for collection.",
            InvoiceSuiteCodelistDocumentTypes::FARMYARD_MANURE_ANALYSIS => "Farmyard manure analysis document.",
            InvoiceSuiteCodelistDocumentTypes::FEDERAL_LABEL_APPROVAL => "A pre-approved document relating to federal label approval requirements.",
            InvoiceSuiteCodelistDocumentTypes::FINAL_CONSTRUCTION_INVOICE => "Invoice concluding all previous partial invoices and partial final construction invoices in the context of a specific construction project.",
            InvoiceSuiteCodelistDocumentTypes::FINAL_PAYMENT_REQUEST_BASED_ON_COMPLETION_OF_WORK => "The final payment request of a series of payment requests submitted upon completion of all the work.",
            InvoiceSuiteCodelistDocumentTypes::FIRST_SAMPLE_TEST_REPORT => "Document/message describes the test report of the first sample.",
            InvoiceSuiteCodelistDocumentTypes::FOOD_GRADE_CERTIFICATE => "A document that shows that the product (food additive, detergent, disinfectant and sanitizer) is suitable to be used in the food industry.",
            InvoiceSuiteCodelistDocumentTypes::FOOD_PACKAGING_CONTACT_CERTIFICATE => "A document legalized from a competent authority that shows that the food packaging product is safe to come into contact with food.",
            InvoiceSuiteCodelistDocumentTypes::FOREIGN_EXCHANGE_PERMIT => "Document/message issued by the competent body authorizing an importer/buyer to transfer an amount of foreign exchange to an exporter/seller in payment for goods.",
            InvoiceSuiteCodelistDocumentTypes::FORWARDERS_ADVICE_TO_EXPORTER => "Document/message issued by a freight forwarder informing an exporter of the action taken in fulfillment of instructions received.",
            InvoiceSuiteCodelistDocumentTypes::FORWARDERS_ADVICE_TO_IMPORT_AGENT => "Document/message issued by a freight forwarder in an exporting country advising his counterpart in an importing country about the forwarding of goods described therein.",
            InvoiceSuiteCodelistDocumentTypes::FORWARDERS_BILL_OF_LADING => "Non-negotiable document issued by a freight forwarder evidencing a contract for the carriage of goods by sea and the taking over or loading of the goods by the freight forwarder, and by which the freight forwarder undertakes to deliver the goods to the consignee named in the document.",
            InvoiceSuiteCodelistDocumentTypes::FORWARDERS_CERTIFICATE_OF_RECEIPT => "Non-negotiable document issued by a forwarder to certify that he has assumed control of a specified consignment, with irrevocable instructions to send it to the consignee indicated in the document or to hold it at his disposal. E.g. FIATA-FCR.",
            InvoiceSuiteCodelistDocumentTypes::FORWARDERS_CERTIFICATE_OF_TRANSPORT => "Negotiable document/message issued by a forwarder to certify that he has taken charge of a specified consignment for despatch and delivery in accordance with the consignors instructions, as indicated in the document, and that he accepts responsibility for delivery of the goods to the holder of the document through the intermediary of a delivery agent of his choice. E.g. FIATA-FCT.",
            InvoiceSuiteCodelistDocumentTypes::FORWARDERS_INVOICE => "Invoice issued by a freight forwarder specifying services rendered and costs incurred and claiming payment therefore.",
            InvoiceSuiteCodelistDocumentTypes::FORWARDERS_WAREHOUSE_RECEIPT => "Document/message issued by a forwarder acting as Warehouse Keeper acknowledging receipt of goods placed in a warehouse, and stating or referring to the conditions which govern the warehousing and the release of goods. The document contains detailed provisions regarding the rights of holders-by-endorsement, transfer of ownership, etc. E.g. FIATA-FWR.",
            InvoiceSuiteCodelistDocumentTypes::FORWARDERS_CREDIT_NOTE => "Document/message for providing credit information to the relevant party.",
            InvoiceSuiteCodelistDocumentTypes::FORWARDERS_INVOICE_DISCREPANCY_REPORT => "Document/message reporting invoice discrepancies indentified by the forwarder.",
            InvoiceSuiteCodelistDocumentTypes::FORWARDING_INSTRUCTIONS => "Document/message issued to a freight forwarder, giving instructions regarding the action to be taken by the forwarder for the forwarding of goods described therein.",
            InvoiceSuiteCodelistDocumentTypes::FRAMEWORK_AGREEMENT => "An agreement between one or more contracting authorities and one or more economic operators, the purpose of which is to establish the terms governing contracts to be awarded during a given period, in particular with regard to price and, where appropriate, the quantity envisaged.",
            InvoiceSuiteCodelistDocumentTypes::FREE_PASS => "A document giving free access to a service.",
            InvoiceSuiteCodelistDocumentTypes::FREE_SALE_CERTIFICATE_IN_THE_COUNTRY_OF_ORIGIN => "A certificate confirming that a specified product is free for sale in the country of origin.",
            InvoiceSuiteCodelistDocumentTypes::FREIGHT_INVOICE => "Document/message issued by a transport operation specifying freight costs and charges incurred for a transport operation and stating conditions of payment.",
            InvoiceSuiteCodelistDocumentTypes::FREIGHT_MANIFEST => "Document/message containing the same information as a cargo manifest, and additional details on freight amounts, charges, etc.",
            InvoiceSuiteCodelistDocumentTypes::FUMIGATION_CERTIFICATE => "Certificate attesting that fumigation has been performed.",
            InvoiceSuiteCodelistDocumentTypes::GATE_PASS => "Document/message authorizing goods specified therein to be brought out of a fenced-in port or terminal area.",
            InvoiceSuiteCodelistDocumentTypes::GENERAL_CARGO_SUMMARY_MANIFEST_REPORT => "A document code to indicate that the message being transmitted is summary manifest information for general cargo.",
            InvoiceSuiteCodelistDocumentTypes::GENERAL_MESSAGE => "Document/message providing agreed textual information.",
            InvoiceSuiteCodelistDocumentTypes::GENERAL_RESPONSE_CUSTOMS => "General response message to permit the transfer of data from Customs to the transmitter of the previous message.",
            InvoiceSuiteCodelistDocumentTypes::GENERAL_TERMS_AND_CONDITIONS => "Document specifying general terms and conditions.",
            InvoiceSuiteCodelistDocumentTypes::GOOD_MANUFACTURING_PRACTICE_GMP_CERTIFICATE => "Certificate that guarantees quality manufacturing and processing of food products, medications, cosmetics, etc.",
            InvoiceSuiteCodelistDocumentTypes::GOODS_CONTROL_CERTIFICATE => "Document/message issued by a competent body evidencing the quality of the goods described therein, in accordance with national or international standards, or conforming to legislation in the importing country, or as specified in the contract.",
            InvoiceSuiteCodelistDocumentTypes::GOODS_DECLARATION_FOR_CUSTOMS_TRANSIT => "Document/message by which the sender declares goods for Customs transit according to Annex E.1 (concerning Customs transit) to the Kyoto convention (CCC).",
            InvoiceSuiteCodelistDocumentTypes::GOODS_DECLARATION_FOR_EXPORTATION => "Document/message by which goods are declared for export Customs clearance, conforming to the layout key set out at Appendix I to Annex C.1 concerning outright exportation to the Kyoto convention (CCC). Within a Customs union, for despatch may have the same meaning as for exportation.",
            InvoiceSuiteCodelistDocumentTypes::GOODS_DECLARATION_FOR_HOME_USE => "Document/message by which goods are declared for import Customs clearance according to Annex B.1 (concerning clearance for home use) to the Kyoto convention (CCC).",
            InvoiceSuiteCodelistDocumentTypes::GOODS_DECLARATION_FOR_IMPORTATION => "Document/message by which goods are declared for import Customs clearance [sister entry of 830].",
            InvoiceSuiteCodelistDocumentTypes::GOODS_RECEIPT => "Document/message to acknowledge the receipt of goods and in addition may indicate receiving conditions.",
            InvoiceSuiteCodelistDocumentTypes::GOODS_RECEIPT_CARRIAGE => "Document/message issued by a carrier or a carriers agent, acknowledging receipt for carriage of goods specified therein on conditions stated or referred to in the document, enabling the carrier to issue a transport document.",
            InvoiceSuiteCodelistDocumentTypes::GOVERNMENT_CONTRACT => "Document/message describing a contract with a government authority.",
            InvoiceSuiteCodelistDocumentTypes::GRANT => "A document indicating the granting of funds.",
            InvoiceSuiteCodelistDocumentTypes::GROUP_INSURANCE_RULES => "Document stating the rules of a group insurance contract.",
            InvoiceSuiteCodelistDocumentTypes::GROUP_PENSION_COMMITMENT_INFORMATION => "Information document for the group pension commitment to an individual person.",
            InvoiceSuiteCodelistDocumentTypes::GUARANTEE_OF_COST_ACCEPTANCE => "Document certifying the guarantee of the document issuer that he will pay for costs of the addressee, e.g. the costs for repairing a vehicle.",
            InvoiceSuiteCodelistDocumentTypes::HALAL_SLAUGHTERING_CERTIFICATE => "A certificate verifying that meat has been produced from slaughter in accordance with Islamic laws and practices.",
            InvoiceSuiteCodelistDocumentTypes::HANDLING_ORDER => "Document/message issued by a cargo handling organization (port administration, terminal operator, etc.) for the removal or other handling of goods under their care.",
            InvoiceSuiteCodelistDocumentTypes::HEALTH_CERTIFICATE => "A document legalized from a competent authority that shows that the product has been tested microbiologically and is free from any pathogens and fit for human consumption and/or declares that the product is in compliance with sanitary and phytosanitary measures.",
            InvoiceSuiteCodelistDocumentTypes::HEALTHCARE_DISCHARGE_REPORT_FINAL => "Final discharge report by healthcare provider.",
            InvoiceSuiteCodelistDocumentTypes::HEALTHCARE_DISCHARGE_REPORT_PRELIMINARY => "Preliminary discharge report by healthcare provider.",
            InvoiceSuiteCodelistDocumentTypes::HEAT_TREATMENT_CERTIFICATE => "A certificate verifying the heat treatment of the product is in conformance with international standards to ensure the product’s healthiness and/or shows the mode of heat treatment indicating the temperature and the amount of time the product or raw material used in the product was treated (such as milk).",
            InvoiceSuiteCodelistDocumentTypes::HIRE_INVOICE => "Document/message for invoicing the hiring of human resources or renting goods or equipment.",
            InvoiceSuiteCodelistDocumentTypes::HIRE_ORDER => "Document/message for hiring human resources or renting goods or equipment.",
            InvoiceSuiteCodelistDocumentTypes::HORSEMEAT_SANITARY_CERTIFICATE => "Document or message issued by the competent authority in the exporting country evidencing that horsemeat products comply with the requirements set by the importing country.",
            InvoiceSuiteCodelistDocumentTypes::HOUSE_BILL_OF_LADING => "The bill of lading issued not by the carrier but by the freight forwarder/consolidator known by the carrier.",
            InvoiceSuiteCodelistDocumentTypes::HOUSE_WAYBILL => "The document made out by an agent/consolidator which evidences the contract between the shipper and the agent/consolidator for the arrangement of carriage of goods.",
            InvoiceSuiteCodelistDocumentTypes::IDENTIFICATION_MATCH => "Message related to conducting a search for an identification match.",
            InvoiceSuiteCodelistDocumentTypes::IDENTITY_CARD => "Official document to identify a person.",
            InvoiceSuiteCodelistDocumentTypes::IMAGE => "Document consisting of an image.",
            InvoiceSuiteCodelistDocumentTypes::IMPENDING_ARRIVAL => "Notification of impending arrival details for vessel.",
            InvoiceSuiteCodelistDocumentTypes::IMPLEMENTATION_GUIDELINE => "A document specifying the criterion and format for exchanging information in an electronic data interchange syntax.",
            InvoiceSuiteCodelistDocumentTypes::IMPORT_LICENCE => "Document/message issued by the competent body in accordance with import regulations in force, by which authorization is granted to a named party to import either a limited quantity of designated articles or an unlimited quantity of such articles during a limited period, under conditions specified in the document.",
            InvoiceSuiteCodelistDocumentTypes::IMPORT_LICENCE_APPLICATION_FOR => "Document/message in which an interested party applies to the competent body for authorization to import either a limited quantity of articles subject to import restrictions, or an unlimited quantity of such articles during a limited period, and specifies the kind of articles, their origin and value, etc.",
            InvoiceSuiteCodelistDocumentTypes::INDEFINITE_DELIVERY_DEFINITE_QUANTITY_CONTRACT => "A document indicating a contract calling for indefinite deliveries of definite quantities.",
            InvoiceSuiteCodelistDocumentTypes::INDEFINITE_DELIVERY_INDEFINITE_QUANTITY_CONTRACT => "A document indicating a contract calling for the indefinite deliveries of indefinite quantities of goods.",
            InvoiceSuiteCodelistDocumentTypes::INDUSTRY_SUPERANNUATION_CONTRIBUTIONS_ADVICE => "Document/message providing contributions advice used for superannuation schemes which are industry wide.",
            InvoiceSuiteCodelistDocumentTypes::INDUSTRY_SUPERANNUATION_MEMBER_MAINTENANCE_MESSAGE => "Member maintenance message used for industry wide superannuation schemes.",
            InvoiceSuiteCodelistDocumentTypes::INEDIBLE_SANITARY_CERTIFICATE => "Document or message issued by the competent authority in the exporting country evidencing that inedible products comply with the requirements set by the importing country.",
            InvoiceSuiteCodelistDocumentTypes::INFRASTRUCTURE_CONDITION => "Information about components in an infrastructure.",
            InvoiceSuiteCodelistDocumentTypes::INLAND_WATERWAY_BILL_OF_LADING => "Negotiable transport document made out to a named person, to order or to bearer, signed by the carrier and handed to the sender after receipt of the goods.",
            InvoiceSuiteCodelistDocumentTypes::INQUIRY => "This is a request for information.",
            InvoiceSuiteCodelistDocumentTypes::INQUIRY_MANDATE => "Document expressing the mandate of a client for an inquiry service by the mandated provider.",
            InvoiceSuiteCodelistDocumentTypes::INSPECTION_CERTIFICATE => "Document/message issued by a competent body evidencing that the goods described therein have been inspected in accordance with national or international standards, in conformity with legislation in the country in which the inspection is required, or as specified in the contract.",
            InvoiceSuiteCodelistDocumentTypes::INSPECTION_REPORT => "A message informing a party of the results of an inspection.",
            InvoiceSuiteCodelistDocumentTypes::INSPECTION_REQUEST => "A message requesting a party to inspect items.",
            InvoiceSuiteCodelistDocumentTypes::INSTRUCTION_FOR_RETURNS => "A message by which a party informs another party whether and how goods shall be returned.",
            InvoiceSuiteCodelistDocumentTypes::INSTRUCTION_TO_COLLECT => "A message instructing a party to collect goods.",
            InvoiceSuiteCodelistDocumentTypes::INSTRUCTIONS_FOR_BANK_TRANSFER => "Document/message containing instructions from a customer to his bank to pay an amount in a specified currency to a nominated party in another country by a method either specified (e.g. teletransmission, air mail) or left to the discretion of the bank.",
            InvoiceSuiteCodelistDocumentTypes::INSURANCE_CERTIFICATE => "Document/message issued to the insured certifying that insurance has been effected and that a policy has been issued. Such a certificate for a particular cargo is primarily used when good are insured under the terms of a floating or an open policy; at the request of the insured it can be exchanged for a policy.",
            InvoiceSuiteCodelistDocumentTypes::INSURANCE_DECLARATION_SHEET_BORDEREAU => "A document/message used when an insured reports to his insurer details of individual shipments which are covered by an insurance contract - an open cover or a floating policy - between the parties.",
            InvoiceSuiteCodelistDocumentTypes::INSURANCE_POLICY => "Document/message issued by the insurer evidencing an agreement to insure and containing the conditions of the agreement concluded whereby the insurer undertakes for a specific fee to indemnify the insured for the losses arising out of the perils and accidents specified in the contract.",
            InvoiceSuiteCodelistDocumentTypes::INSURED_PARTY_PAYMENT_REPORT => "Report about payments done towards an insured party.",
            InvoiceSuiteCodelistDocumentTypes::INSURED_STATUS_REPORT => "Document reporting (e.g. annually) to the insured the actual details of an insurance contract.",
            InvoiceSuiteCodelistDocumentTypes::INSURERS_INVOICE => "Document/message issued by an insurer specifying the cost of an insurance which has been effected and claiming payment therefore.",
            InvoiceSuiteCodelistDocumentTypes::INTERIM_APPLICATION_FOR_PAYMENT => "Document/message containing a provisional assessment in support of a request for payment for completed work for a construction contract.",
            InvoiceSuiteCodelistDocumentTypes::INTERIM_INTERNATIONAL_SHIP_SECURITY_CERTIFICATE => "An interim certificate on ship security issued basis under the International code for the Security of Ships and of Port facilities (ISPS code).",
            InvoiceSuiteCodelistDocumentTypes::INTERMEDIATE_HANDLING_CROSS_DOCKING_DESPATCH_ADVICE => "Document by means of which the supplier or consignor informs the buyer, consignee or the distribution centre about the despatch of products which will be moved across a dock, de-consolidated and re-consolidated according to final delivery location requirements.",
            InvoiceSuiteCodelistDocumentTypes::INTERMEDIATE_HANDLING_CROSS_DOCKING_ORDER => "An order requesting the supply of products which will be moved across a dock, de-consolidated and re-consolidated according to the final delivery location requirements.",
            InvoiceSuiteCodelistDocumentTypes::INTERNAL_TRANSPORT_ORDER => "Document/message giving instructions about the transport of goods within an enterprise.",
            InvoiceSuiteCodelistDocumentTypes::INTERNATIONAL_SHIP_SECURITY_CERTIFICATE => "A certificate on ship security issued based on the International code for the Security of Ships and of Port facilities (ISPS code).",
            InvoiceSuiteCodelistDocumentTypes::INTRASTAT_DECLARATION => "Document/message in which a declarant provides information about goods required by the body responsible for the collection of trade statistics.",
            InvoiceSuiteCodelistDocumentTypes::INTRODUCTORY_LETTER => "A letter of introduction attached to, or accompanying another document such as an insurance policy.",
            InvoiceSuiteCodelistDocumentTypes::INVENTORY_ADJUSTMENT_STATUS_REPORT => "A message detailing statuses related to the adjustment of inventory.",
            InvoiceSuiteCodelistDocumentTypes::INVENTORY_MOVEMENT_ADVICE => "Advice of inventory movements.",
            InvoiceSuiteCodelistDocumentTypes::INVENTORY_REPORT => "A message specifying information relating to held inventories.",
            InvoiceSuiteCodelistDocumentTypes::INVENTORY_STATUS_ADVICE => "Advice of stock on hand.",
            InvoiceSuiteCodelistDocumentTypes::INVITATION_TO_TENDER => "A document/message used by a buyer to define the procurement procedure and request specific suppliers to participate.",
            InvoiceSuiteCodelistDocumentTypes::INVOICE_INFORMATION_FOR_ACCOUNTING_PURPOSES => "A document / message containing accounting related information such as monetary summations, seller id and VAT information. This may not be a complete invoice according to legal requirements. For instance the line item information might be excluded.",
            InvoiceSuiteCodelistDocumentTypes::INVOICING_DATA_SHEET => "Document/message issued within an enterprise containing data about goods sold, to be used as the basis for the preparation of an invoice.",
            InvoiceSuiteCodelistDocumentTypes::ITEMS_BOOKED_TO_A_FINANCIAL_ACCOUNT_REPORT => "A message reporting items which have been booked to a financial account.",
            InvoiceSuiteCodelistDocumentTypes::KANBAN_SCHEDULE => "Message to describe a Kanban schedule.",
            InvoiceSuiteCodelistDocumentTypes::LEASE_INVOICE => "Usage of INVOIC-message for goods in leasing contracts.",
            InvoiceSuiteCodelistDocumentTypes::LEASE_ORDER => "Document/message for goods in leasing contracts.",
            InvoiceSuiteCodelistDocumentTypes::LEGAL_ACTION => "Document specifying a legal action at court.",
            InvoiceSuiteCodelistDocumentTypes::LEGAL_STATEMENT_OF_AN_ACCOUNT => "A statement of an account containing the booked items as in the ledger of the account servicing financial institution.",
            InvoiceSuiteCodelistDocumentTypes::LETTER_OF_INDEMNITY_FOR_NONSURRENDER_OF_BILL_OF_LADING => "Document/message issued by a commercial party or a bank of an insurance company accepting responsibility to the beneficiary of the indemnity in accordance with the terms thereof.",
            InvoiceSuiteCodelistDocumentTypes::LETTER_OF_INTENT => "Document/message by means of which a buyer informs a seller that the buyer intends to enter into contractual negotiations.",
            InvoiceSuiteCodelistDocumentTypes::LIFE_INSURANCE_PAYROLL_DEDUCTIONS_ADVICE => "Payroll deductions advice used in the life insurance industry.",
            InvoiceSuiteCodelistDocumentTypes::LISTING_STATEMENT_OF_AN_ACCOUNT => "A statement from the account servicing financial institution containing items pending to be booked.",
            InvoiceSuiteCodelistDocumentTypes::LOADLINE_DOCUMENT => "Document specifying the limit of a ships legal submersion under various conditions.",
            InvoiceSuiteCodelistDocumentTypes::LOSS_STATEMENT => "Document specifying the value of a loss.",
            InvoiceSuiteCodelistDocumentTypes::LOW_RISK_COUNTRY_FORMAL_LETTER => "An official letter issued by an import authority granted to the importer of goods from a low risk country which allows the importer to place its products in the local market with certain favorable considerations.",
            InvoiceSuiteCodelistDocumentTypes::LOW_VALUE_PAYMENT_ORDERS => "The message contains low value payment order(s) only.",
            InvoiceSuiteCodelistDocumentTypes::MAKE_OR_BUY_PLAN => "A document indicating a plan that identifies which items will be made and which items will be bought.",
            InvoiceSuiteCodelistDocumentTypes::MANUFACTURER_RAISED_CONSIGNMENT_ORDER => "Document/message providing details of a consignment order which has been raised by a manufacturer.",
            InvoiceSuiteCodelistDocumentTypes::MANUFACTURER_RAISED_ORDER => "Document/message providing details of an order which has been raised by a manufacturer.",
            InvoiceSuiteCodelistDocumentTypes::MANUFACTURING_INSTRUCTIONS => "Document/message issued within an enterprise to initiate the manufacture of goods to be offered for sale.",
            InvoiceSuiteCodelistDocumentTypes::MANUFACTURING_LICENSE => "A license granted by a competent authority to a manufacturer for production of specific products.",
            InvoiceSuiteCodelistDocumentTypes::MANUFACTURING_SPECIFICATION => "A document indicating the specification of how an item is to be manufactured.",
            InvoiceSuiteCodelistDocumentTypes::MARITIME_DECLARATION_OF_HEALTH => "Document certifying the health condition on board a vessel, valid to a specified date.",
            InvoiceSuiteCodelistDocumentTypes::MASTER_AIR_WAYBILL => "Document/message made out by or on behalf of the agent/consolidator which evidences the contract between the agent/consolidator and carrier(s) for carriage of goods over routes of the carrier(s) for a consignment consisting of goods originated by more than one shipper (IATA).",
            InvoiceSuiteCodelistDocumentTypes::MASTER_BILL_OF_LADING => "A bill of lading issued by the master of a vessel (in actuality the owner or charterer of the vessel). It could cover a number of house bills.",
            InvoiceSuiteCodelistDocumentTypes::MATES_RECEIPT => "Document/message issued by a ships officer to acknowledge that a specified consignment has been received on board a vessel, and the apparent condition of the goods; enabling the carrier to issue a Bill of lading.",
            InvoiceSuiteCodelistDocumentTypes::MATERIAL_INSPECTION_AND_RECEIVING_REPORT => "A report that is both an inspection report for materials and a receiving document.",
            InvoiceSuiteCodelistDocumentTypes::MEANS_OF_TRANSPORT_ADVICE => "Message reporting the means of transport used to carry goods or cargo.",
            InvoiceSuiteCodelistDocumentTypes::MEANS_OF_TRANSPORTATION_AVAILABILITY_INFORMATION => "Information giving the various availabilities of a means of transportation.",
            InvoiceSuiteCodelistDocumentTypes::MEANS_OF_TRANSPORTATION_SCHEDULE_INFORMATION => "Information giving the various schedules of a means of transportation.",
            InvoiceSuiteCodelistDocumentTypes::MEAT_AND_MEAT_BYPRODUCTS_SANITARY_CERTIFICATE => "Document or message issued by the competent authority in the exporting country evidencing that meat or meat by-products comply with the requirements set by the importing country.",
            InvoiceSuiteCodelistDocumentTypes::MEAT_FOOD_PRODUCTS_SANITARY_CERTIFICATE => "Document or message issued by the competent authority in the exporting country evidencing that meat food products comply with the requirements set by the importing country.",
            InvoiceSuiteCodelistDocumentTypes::MEDICAL_CERTIFICATE => "Document certifying a medical condition.",
            InvoiceSuiteCodelistDocumentTypes::MESSAGE_IN_DEVELOPMENT_REQUEST => "Requesting a Message in Development (MiD).",
            InvoiceSuiteCodelistDocumentTypes::METERED_SERVICES_CONSUMPTION_REPORT => "Document/message providing metered consumption details.",
            InvoiceSuiteCodelistDocumentTypes::METERED_SERVICES_CONSUMPTION_REPORT_SUPPORTING_AN_INVOICE => "Document/message providing metered consumption details supporiting an invoice.",
            InvoiceSuiteCodelistDocumentTypes::METERED_SERVICES_INVOICE => "Document/message claiming payment for the supply of metered services (e.g., gas, electricity, etc.) supplied to a fixed meter whose consumption is measured over a period of time.",
            InvoiceSuiteCodelistDocumentTypes::METERING_POINT_INFORMATION_RESPONSE => "Response to a request for information about a metering point.",
            InvoiceSuiteCodelistDocumentTypes::MILITARY_IDENTIFICATION_CARD => "The official document used for military personnel on travel orders, substituting a passport.",
            InvoiceSuiteCodelistDocumentTypes::MILL_CERTIFICATE => "Certificate certifying a specific quality of agricultural products.",
            InvoiceSuiteCodelistDocumentTypes::MODIFICATION_OF_EXISTING_MESSAGE => "Requesting a change to an existing message.",
            InvoiceSuiteCodelistDocumentTypes::MOVEMENT_CERTIFICATE_ATR => "Specific form of transit declaration issued by the exporter (movement certificate).",
            InvoiceSuiteCodelistDocumentTypes::MULTIDROP_ORDER => "One purchase order that contains the orders of two or more vendors and the associated delivery points for each.",
            InvoiceSuiteCodelistDocumentTypes::MULTIMODAL_TRANSPORT_DOCUMENT_GENERIC => "Document/message which evidences a multimodal transport contract, the taking in charge of the goods by the multimodal transport operator, and an undertaking by him to deliver the goods in accordance with the terms of the contract. (International Convention on Multimodal Transport of Goods).",
            InvoiceSuiteCodelistDocumentTypes::MULTIMODALCOMBINED_TRANSPORT_DOCUMENT_GENERIC => "A transport document used when more than one mode of transportation is involved in the movement of cargo. It is a contract of carriage and receipt of the cargo for a multimodal transport. It indicates the place where the responsible transport company in the move takes responsibility for the cargo, the place where the responsibility of this transport company in the move ends and the conveyances involved.",
            InvoiceSuiteCodelistDocumentTypes::MULTIPLE_DIRECT_DEBIT => "Document/message containing a direct debit to credit one or more accounts and to debit one or more debtors.",
            InvoiceSuiteCodelistDocumentTypes::MULTIPLE_DIRECT_DEBIT_REQUEST => "Document/message containing a direct debit request to credit one or more accounts and to debit one or more debtors.",
            InvoiceSuiteCodelistDocumentTypes::MULTIPLE_PAYMENT_ORDER => "Document/message containing a payment order to debit one or more accounts and to credit one or more beneficiaries.",
            InvoiceSuiteCodelistDocumentTypes::NAMEPRODUCT_PLATE => "Plates on goods identifying and describing an article.",
            InvoiceSuiteCodelistDocumentTypes::NATO_TRANSIT_DOCUMENT => "Customs transit document for the carriage of shipments of the NATO armed forces under Customs supervision.",
            InvoiceSuiteCodelistDocumentTypes::NEW_CODE_REQUEST => "Requesting a new code.",
            InvoiceSuiteCodelistDocumentTypes::NEW_MESSAGE_REQUEST => "Request for a new message (NMR).",
            InvoiceSuiteCodelistDocumentTypes::NONNEGOTIABLE_MARITIME_TRANSPORT_DOCUMENT_GENERIC => "Non-negotiable document which evidences a contract for the carriage of goods by sea and the taking over or loading of the goods by the carrier, and by which the carrier undertakes to deliver the goods to the consignee named in the document. E.g. Sea waybill. Remark: Synonymous with straight or non-negotiable Bill of lading used in certain countries, e.g. Canada.",
            InvoiceSuiteCodelistDocumentTypes::NONPREAUTHORISED_DIRECT_DEBIT_REQUESTS => "The message contains non-pre-authorised direct debit request(s).",
            InvoiceSuiteCodelistDocumentTypes::NONPREAUTHORISED_DIRECT_DEBITS => "The message contains non-pre-authorised direct debit(s).",
            InvoiceSuiteCodelistDocumentTypes::NOTICE_OF_CIRCUMSTANCES_PREVENTING_DELIVERY_GOODS => "Request made by the carrier to the sender, or, as the case may be, the consignee, for instructions as to the disposal of the consignment when circumstances prevent delivery and the return of the goods has not been requested by the consignor in the transport document.",
            InvoiceSuiteCodelistDocumentTypes::NOTICE_OF_CIRCUMSTANCES_PREVENTING_TRANSPORT_GOODS => "Request made by the carrier to the sender, or, the consignee as the case may be, for instructions as to the disposal of the goods when circumstances prevent transport before departure or en route, after acceptance of the consignment concerned.",
            InvoiceSuiteCodelistDocumentTypes::NOTICE_THAT_CIRCUMSTANCES_PREVENT_PAYMENT_OF_DELIVERED_GOODS => "Message used to inform a supplier that delivered goods cannot be paid due to circumstances which prevent payment.",
            InvoiceSuiteCodelistDocumentTypes::NOTIFICATION_OF_BALANCE_RESPONSIBLE_ENTITY_CHANGE => "Notification of a change of balance responsible entity.",
            InvoiceSuiteCodelistDocumentTypes::NOTIFICATION_OF_CHANGE_OF_SUPPLIER => "A notification of a change of supplier.",
            InvoiceSuiteCodelistDocumentTypes::NOTIFICATION_OF_EMERGENCY_SHIFTING_FROM_THE_DESIGNATED_PLACE_IN_PORT => "Document to notify shifting from designated place in port once secured at the designated place.",
            InvoiceSuiteCodelistDocumentTypes::NOTIFICATION_OF_METER_CHANGE => "Notification about the change of a meter.",
            InvoiceSuiteCodelistDocumentTypes::NOTIFICATION_OF_METERING_POINT_IDENTIFICATION_CHANGE => "Notification of the change of metering point identification.",
            InvoiceSuiteCodelistDocumentTypes::NOTIFICATION_OF_USAGE_OF_BERTH_OR_MOORING_FACILITIES => "Document to notify usage of berth or mooring facilities.",
            InvoiceSuiteCodelistDocumentTypes::NOTIFICATION_TO_GRID_OPERATOR_OF_CONTRACT_TERMINATION => "Notification to the grid operator regarding the termination of a contract.",
            InvoiceSuiteCodelistDocumentTypes::NOTIFICATION_TO_GRID_OPERATOR_OF_METERING_POINT_CHANGES => "Notification to the grid operator about changes regarding a metering point.",
            InvoiceSuiteCodelistDocumentTypes::NOTIFICATION_TO_SUPPLIER_OF_CONTRACT_TERMINATION => "Notification to the supplier regarding the termination of a contract.",
            InvoiceSuiteCodelistDocumentTypes::NOTIFICATION_TO_SUPPLIER_OF_METERING_POINT_CHANGES => "Notification to the supplier about changes regarding a metering point.",
            InvoiceSuiteCodelistDocumentTypes::OFFER_QUOTATION => "(1332) Document/message which, with a view to concluding a contract, sets out the conditions under which the goods are offered.",
            InvoiceSuiteCodelistDocumentTypes::OPERATING_INSTRUCTIONS => "Document/message describing instructions for operation.",
            InvoiceSuiteCodelistDocumentTypes::OPTICAL_CHARACTER_READING_OCR_PAYMENT => "Payment effected by an Optical Character Reading (OCR) document.",
            InvoiceSuiteCodelistDocumentTypes::OPTICAL_CHARACTER_READING_OCR_PAYMENT_CREDIT_NOTE => "Payment credit note effected by an Optical Character Reading (OCR) document.",
            InvoiceSuiteCodelistDocumentTypes::ORDER => "Document/message by means of which a buyer initiates a transaction with a seller involving the supply of goods or services as specified, according to conditions set out in an offer, or otherwise known to the buyer.",
            InvoiceSuiteCodelistDocumentTypes::ORDER_STATUS_ENQUIRY => "A message enquiring the status of previously sent orders.",
            InvoiceSuiteCodelistDocumentTypes::ORDER_STATUS_REPORT => "A message reporting the status of previously sent orders.",
            InvoiceSuiteCodelistDocumentTypes::ORIGINAL_ACCOUNTING_VOUCHER => "To indicate that the document/message justifying an accounting entry is original.",
            InvoiceSuiteCodelistDocumentTypes::OUT_OF_COURT_SETTLEMENT => "Document which specifies an out of court settlement.",
            InvoiceSuiteCodelistDocumentTypes::PACKAGE_RESPONSE_CUSTOMS => "Package response message to permit the transfer of data from Customs to the transmitter of the previous message.",
            InvoiceSuiteCodelistDocumentTypes::PACKAGING_MATERIAL_COMPOSITION_REPORT => "A document that shows the main structure that composes the packaging material.",
            InvoiceSuiteCodelistDocumentTypes::PACKING_INSTRUCTIONS => "Document/message within an enterprise giving instructions on how goods are to be packed.",
            InvoiceSuiteCodelistDocumentTypes::PACKING_LIST => "Document/message specifying the distribution of goods in individual packages (in trade environment the despatch advice message is used for the packing list).",
            InvoiceSuiteCodelistDocumentTypes::PARTIAL_CONSTRUCTION_INVOICE => "Partial invoice in the context of a specific construction project.",
            InvoiceSuiteCodelistDocumentTypes::PARTIAL_FINAL_CONSTRUCTION_INVOICE => "Invoice concluding all previous partial construction invoices of a completed partial rendered service in the context of a specific construction project.",
            InvoiceSuiteCodelistDocumentTypes::PARTIAL_INVOICE => "Document/message specifying details of an incomplete invoice.",
            InvoiceSuiteCodelistDocumentTypes::PARTY_CREDIT_INFORMATION => "Document/message providing data concerning the credit information of a party.",
            InvoiceSuiteCodelistDocumentTypes::PARTY_INFORMATION => "Document/message providing basic data concerning a party.",
            InvoiceSuiteCodelistDocumentTypes::PARTY_PAYMENT_BEHAVIOUR_INFORMATION => "Document/message providing data concerning the payment behaviour of a party.",
            InvoiceSuiteCodelistDocumentTypes::PASSENGER_LIST => "Declaration to Customs regarding passengers aboard the conveyance; equivalent to IMO FAL 6.",
            InvoiceSuiteCodelistDocumentTypes::PASSPORT => "An official document giving permission to travel in foreign countries.",
            InvoiceSuiteCodelistDocumentTypes::PAYMENT_BOND => "A document that guarantees the payment of monies.",
            InvoiceSuiteCodelistDocumentTypes::PAYMENT_CARD => "The document is a credit, guarantee or charge card.",
            InvoiceSuiteCodelistDocumentTypes::PAYMENT_OR_PERFORMANCE_BOND => "A document indicating a bond that guarantees the payment of monies or a performance.",
            InvoiceSuiteCodelistDocumentTypes::PAYMENT_ORDER => "Document/message containing information needed to initiate the payment. It may cover the financial settlement for one or more commercial trade transactions. A payment order is an instruction to the ordered bank to arrange for the payment of one specified amount to the beneficiary.",
            InvoiceSuiteCodelistDocumentTypes::PAYMENT_RECEIPT_CONFIRMATION => "Document confirming the receipt of a payment.",
            InvoiceSuiteCodelistDocumentTypes::PAYMENT_REQUEST_FOR_COMPLETED_UNITS => "A request for payment for completed units.",
            InvoiceSuiteCodelistDocumentTypes::PAYMENT_VALUATION => "Document/message establishing the financial elements of a situation of works.",
            InvoiceSuiteCodelistDocumentTypes::PAYMENT_VALUATION_FOR_UNSCHEDULED_ITEMS => "A payment valuation for unscheduled items.",
            InvoiceSuiteCodelistDocumentTypes::PAYROLL_DEDUCTIONS_ADVICE => "A message sent by a party (usually an employer or its representative) to a service providing organisation, to detail payroll deductions paid on behalf of its employees to the service providing organisation.",
            InvoiceSuiteCodelistDocumentTypes::PERFORMANCE_BOND => "A document that guarantees performance.",
            InvoiceSuiteCodelistDocumentTypes::PHARMACEUTICAL_SANITARY_CERTIFICATE => "Document or message issued by the competent authority in the exporting country evidencing that pharmaceutical products comply with the requirements set by the importing country.",
            InvoiceSuiteCodelistDocumentTypes::PHYSICIAN_REPORT => "Report issued by a medical doctor.",
            InvoiceSuiteCodelistDocumentTypes::PHYTOSANITARY_CERTIFICATE => "A message/doucment consistent with the model for certificates of the IPPC, attesting that a consignment meets phytosanitary import requirements.",
            InvoiceSuiteCodelistDocumentTypes::PHYTOSANITARY_REEXPORT_CERTIFICATE => "A message/document consistent with the model for re-export phytosanitary certificates of the IPPC, attesting that a consignment meets phytosanitary import requirements.",
            InvoiceSuiteCodelistDocumentTypes::PICKUP_NOTICE => "Notice specifying the pick-up of released cargo or containers from a certain address.",
            InvoiceSuiteCodelistDocumentTypes::PLAN_FOR_PROVISION_OF_HEALTH_SERVICE => "Document containing a plan for provision of health service.",
            InvoiceSuiteCodelistDocumentTypes::PLANT_PASSPORT => "Document/message issued by a competent body certifying the phytosanitary status of plants or plant products for international trade.",
            InvoiceSuiteCodelistDocumentTypes::PORT_AUTHORITY_WASTE_DISPOSAL_REPORT => "Document/message sent by a port authority to another port authority for reporting information on waste disposal.",
            InvoiceSuiteCodelistDocumentTypes::PORT_CHARGES_DOCUMENTS => "Documents/messages specifying services rendered, storage and handling costs, demurrage and other charges due to the owner of goods described therein.",
            InvoiceSuiteCodelistDocumentTypes::POST_RECEIPT => "Document/message which evidences the transport of goods by post (e.g. mail, parcel, etc.).",
            InvoiceSuiteCodelistDocumentTypes::POULTRY_SANITARY_CERTIFICATE => "Document or message issued by the competent authority in the exporting country evidencing that poultry products comply with the requirements set by the importing country.",
            InvoiceSuiteCodelistDocumentTypes::PREAUTHORISED_DIRECT_DEBIT_REQUESTS => "The message contains pre-authorised direct debit request(s).",
            InvoiceSuiteCodelistDocumentTypes::PREAUTHORISED_DIRECT_DEBITS => "The message contains pre-authorised direct debit(s).",
            InvoiceSuiteCodelistDocumentTypes::PREPACKED_CROSS_DOCKING_CONSIGNMENT_ORDER => "A consignment order requesting the supply of products packed according to the final delivery point which will be moved across a dock in a distribution centre without further handling.",
            InvoiceSuiteCodelistDocumentTypes::PREPACKED_CROSS_DOCKING_DESPATCH_ADVICE => "Document by means of which the supplier or consignor informs the buyer, consignee or distribution centre about the despatch of products packed according to the final delivery point requirements which will be moved across a dock in a distribution centre without further handling.",
            InvoiceSuiteCodelistDocumentTypes::PREPACKED_CROSS_DOCKING_ORDER => "An order requesting the supply of products packed according to the final delivery point which will be moved across a dock in a distribution centre without further handling.",
            InvoiceSuiteCodelistDocumentTypes::PREADVICE_OF_A_CREDIT => "Preadvice indicating a credit to happen in the future.",
            InvoiceSuiteCodelistDocumentTypes::PREFERENCE_CERTIFICATE_OF_ORIGIN => "Document/message describing a certificate of origin meeting the requirements for preferential treatment.",
            InvoiceSuiteCodelistDocumentTypes::PRELIMINARY_CREDIT_ASSESSMENT => "Document/message issued either by a factor to indicate his preliminary credit assessment on a buyer, or by a seller to request a factors preliminary credit assessment on a buyer.",
            InvoiceSuiteCodelistDocumentTypes::PRELIMINARY_SALES_REPORT => "Preliminary sales report sent before all the information is available.",
            InvoiceSuiteCodelistDocumentTypes::PREPAYMENT_INVOICE => "An invoice to pay amounts for goods and services in advance; these amounts will be subtracted from the final invoice.",
            InvoiceSuiteCodelistDocumentTypes::PRESCRIPTION => "Instructions for the dispensing and use of medicine or remedy.",
            InvoiceSuiteCodelistDocumentTypes::PRESCRIPTION_DISPENSING_REPORT => "Document containing information of products dispensed according to a prescription.",
            InvoiceSuiteCodelistDocumentTypes::PRESCRIPTION_REQUEST => "Request to issue a prescription for medicine or remedy.",
            InvoiceSuiteCodelistDocumentTypes::PREVIOUS_CORRESPONDENCE => "Correspondence previously exchanged.",
            InvoiceSuiteCodelistDocumentTypes::PREVIOUS_CUSTOMS_DOCUMENTMESSAGE => "Indication of the previous Customs document/message concerning the same transaction.",
            InvoiceSuiteCodelistDocumentTypes::PREVIOUS_TRANSPORT_DOCUMENT => "Identification of the previous transport document.",
            InvoiceSuiteCodelistDocumentTypes::PRICE_AND_DELIVERY_QUOTE => "Document/message confirming price and delivery conditions under which goods are offered.",
            InvoiceSuiteCodelistDocumentTypes::PRICE_AND_DELIVERY_QUOTE_SHIP_AND_DEBIT => "Document/message from a supplier to a distributor confirming price conditions and delivery conditions under which goods can be sold by a distributor to the end-customer specified on the quote with compensation for loss of inventory value.",
            InvoiceSuiteCodelistDocumentTypes::PRICE_AND_DELIVERY_QUOTE_SPECIFIED_ENDCUSTOMER => "Document/message confirming price conditions and delivery conditions under which goods are offered, provided that they are sold to the end-customer specified on the quote.",
            InvoiceSuiteCodelistDocumentTypes::PRICE_NEGOTIATION_RESULT => "A document providing the result of price negotiations.",
            InvoiceSuiteCodelistDocumentTypes::PRICE_QUOTE => "Document/message confirming price conditions under which goods are offered.",
            InvoiceSuiteCodelistDocumentTypes::PRICE_QUOTE_SHIP_AND_DEBIT => "Document/message from a supplier to a distributor confirming price conditions under which goods can be sold by a distributor to the end-customer specified on the quote with compensation for loss of inventory value.",
            InvoiceSuiteCodelistDocumentTypes::PRICE_QUOTE_SPECIFIED_ENDCUSTOMER => "Document/message confirming price conditions under which goods are offered, provided that they are sold to the end-customer specified on the quote.",
            InvoiceSuiteCodelistDocumentTypes::PRICE_VARIATION_INVOICE => "An invoice which requests payment for the difference in price between an original invoice and the result of the application of a price variation formula.",
            InvoiceSuiteCodelistDocumentTypes::PRICESALES_CATALOGUE => "A document/message to enable the transmission of information regarding pricing and catalogue details for goods and services offered by a seller to a buyer.",
            InvoiceSuiteCodelistDocumentTypes::PRICESALES_CATALOGUE_CONTAINING_COMMERCIAL_INFORMATION => "A price/sales catalogue message containing only commercial terms or conditions data.",
            InvoiceSuiteCodelistDocumentTypes::PRICESALES_CATALOGUE_NOT_CONTAINING_COMMERCIAL_INFORMATION => "A price/sales catalogue message containing no commercial information, such as prices, terms or conditions.",
            InvoiceSuiteCodelistDocumentTypes::PRICESALES_CATALOGUE_RESPONSE => "A document providing a response to a previously sent price/sales catalogue.",
            InvoiceSuiteCodelistDocumentTypes::PRICED_ALTERNATE_TENDER_BILL_OF_QUANTITY => "A priced tender based upon an alternate specification.",
            InvoiceSuiteCodelistDocumentTypes::PRICED_TENDER_BOQ => "Document/message providing a detailed, quantity based specification, updated with prices to form a tender submission for a construction contract. BOQ means: Bill of quantity.",
            InvoiceSuiteCodelistDocumentTypes::PROFORMA_ACCOUNTING_VOUCHER => "To indicate that the document/message justifying an accounting entry is pro-forma.",
            InvoiceSuiteCodelistDocumentTypes::PROCESS_DATA_REPORT => "Reports on events during production process.",
            InvoiceSuiteCodelistDocumentTypes::PRODUCT_DATA_MESSAGE => "A message to submit master data, a set of data that is rarely changed, to identify and describe products a supplier offers to their (potential) customer or buyer.",
            InvoiceSuiteCodelistDocumentTypes::PRODUCT_DATA_RESPONSE => "Document/message responding to a previously received Product Data document/message.",
            InvoiceSuiteCodelistDocumentTypes::PRODUCT_PERFORMANCE_REPORT => "Report specifying the performance values of products.",
            InvoiceSuiteCodelistDocumentTypes::PRODUCT_SPECIFICATION_REPORT => "Report providing specification values of products.",
            InvoiceSuiteCodelistDocumentTypes::PRODUCTION_FACILITY_LICENSE => "A license granted by a competent authority to a production facility for manufacturing specific products.",
            InvoiceSuiteCodelistDocumentTypes::PROFORMA_INVOICE => "Document/message serving as a preliminary invoice, containing - on the whole - the same information as the final invoice, but not actually claiming payment.",
            InvoiceSuiteCodelistDocumentTypes::PROGRESSIVE_DISCHARGE_REPORT => "Document or message progressively issued by the container terminal operator in charge of discharging a vessel identifying containers that have been discharged from a specific vessel at that point in time.",
            InvoiceSuiteCodelistDocumentTypes::PROJECT_MASTER_PLAN => "A high level, all encompassing master plan to complete a project.",
            InvoiceSuiteCodelistDocumentTypes::PROJECT_MASTER_SCHEDULE => "A high level, all encompassing master schedule of activities to complete a project.",
            InvoiceSuiteCodelistDocumentTypes::PROJECT_PLAN => "A plan for project work to be completed.",
            InvoiceSuiteCodelistDocumentTypes::PROJECT_PLANNING_AVAILABLE_RESOURCES => "Available resources for project planning purposes.",
            InvoiceSuiteCodelistDocumentTypes::PROJECT_PLANNING_CALENDAR => "Work calendar information for project planning purposes.",
            InvoiceSuiteCodelistDocumentTypes::PROJECT_PRODUCTION_PLAN => "A project plan for the production of goods.",
            InvoiceSuiteCodelistDocumentTypes::PROJECT_RECOVERY_PLAN => "A project plan for recovery after a delay or problem resolution.",
            InvoiceSuiteCodelistDocumentTypes::PROJECT_SCHEDULE => "A schedule of project activities to be completed.",
            InvoiceSuiteCodelistDocumentTypes::PROMISSORY_NOTE => "Document/message, issued and signed in conformity with the applicable legislation, which contains an unconditional promise whereby the maker undertakes to pay a definite sum of money to the payee or to his order, on demand or at a definite time, against the surrender of the document itself.",
            InvoiceSuiteCodelistDocumentTypes::PROOF_OF_DELIVERY => "A message by which a consignee provides for a carrier proof of delivery of a consignment.",
            InvoiceSuiteCodelistDocumentTypes::PROOF_OF_TRANSIT_DECLARATION => "A document providing proof that a transit declaration has been accepted.",
            InvoiceSuiteCodelistDocumentTypes::PROVISIONAL_PAYMENT_VALUATION => "Document/message establishing a provisional payment valuation.",
            InvoiceSuiteCodelistDocumentTypes::PUBLIC_PRICE_CERTIFICATE => "A certification executed by the competent authority from country of production stating the price of the goods to the general public.",
            InvoiceSuiteCodelistDocumentTypes::PURCHASE_ORDER => "Document/message issued within an enterprise to initiate the purchase of articles, materials or services required for the production or manufacture of goods to be offered for sale or otherwise supplied to customers.",
            InvoiceSuiteCodelistDocumentTypes::PURCHASE_ORDER_CHANGE_REQUEST => "Change to an purchase order already sent.",
            InvoiceSuiteCodelistDocumentTypes::PURCHASE_ORDER_FINANCING_REQUEST => "Document enabling the Financing Requestor to initiate the financing process by the First Agent.",
            InvoiceSuiteCodelistDocumentTypes::PURCHASE_ORDER_FINANCING_REQUEST_CANCELLATION => "Document enabling the Financing Requestor to request the First Agent to cancel a previously sent purchase order financing request.",
            InvoiceSuiteCodelistDocumentTypes::PURCHASE_ORDER_FINANCING_REQUEST_STATUS => "Document enabling the First Agent to notify the Financing Requestor of the status of a purchase order financing request or the status of a purchase order financing cancellation request previously sent by the Financial Requestor itself.",
            InvoiceSuiteCodelistDocumentTypes::PURCHASE_ORDER_RESPONSE => "Response to an purchase order already received.",
            InvoiceSuiteCodelistDocumentTypes::PURCHASING_SPECIFICATION => "A document indicating a specification used to purchase an item.",
            InvoiceSuiteCodelistDocumentTypes::QUALITY_DATA_MESSAGE => "Usage of QALITY-message.",
            InvoiceSuiteCodelistDocumentTypes::QUANTITY_VALUATION => "Document/message providing a confirmed assessment, by quantity, of the completed work for a construction contract.",
            InvoiceSuiteCodelistDocumentTypes::QUANTITY_VALUATION_REQUEST => "Document/message providing an initial assessment, by quantity, of the completed work for a construction contract.",
            InvoiceSuiteCodelistDocumentTypes::QUERY => "Request information based on defined criteria.",
            InvoiceSuiteCodelistDocumentTypes::QUESTIONNAIRE => "Document consisting of a series of questions.",
            InvoiceSuiteCodelistDocumentTypes::QUOTA_PRIOR_ALLOCATION_CERTIFICATE => "Document/message issued by the competent body for prior allocation of a quota.",
            InvoiceSuiteCodelistDocumentTypes::RAIL_CONSIGNMENT_NOTE_GENERIC_TERM => "Transport document constituting a contract for the carriage of goods between the sender and the carrier (the railway). For international rail traffic, this document must conform to the model prescribed by the international conventions concerning carriage of goods by rail, e.g. CIM Convention, SMGS Convention.",
            InvoiceSuiteCodelistDocumentTypes::RAIL_CONSIGNMENT_NOTE_FORWARDER_COPY => "Document which is a copy of the rail consignment note printed especially for the need of the forwarder.",
            InvoiceSuiteCodelistDocumentTypes::REENTRY_PERMIT => "A permit to re-enter a country.",
            InvoiceSuiteCodelistDocumentTypes::RESENDING_CONSIGNMENT_NOTE => "Rail consignment note prepared by the consignor for the facilitation of an eventual return to the origin of the goods.",
            InvoiceSuiteCodelistDocumentTypes::READY_FOR_DESPATCH_ADVICE => "Document/message issued by a supplier informing a buyer that goods ordered are ready for despatch.",
            InvoiceSuiteCodelistDocumentTypes::READY_FOR_TRANSSHIPMENT_DESPATCH_ADVICE => "Document to advise that the goods ordered are ready for transshipment.",
            InvoiceSuiteCodelistDocumentTypes::REASSIGNMENT => "Document/message issued by a factor to a seller or to another factor to reassign an invoice or credit note previously assigned to him.",
            InvoiceSuiteCodelistDocumentTypes::RECEIPT_CUSTOMS => "Receipt for Customs duty/tax/fee paid.",
            InvoiceSuiteCodelistDocumentTypes::RECHARGING_DOCUMENT => "Fictitious transport document regarding a previous transport, enabling a carriers agent to give to another carriers agent (in a different country) the possibility to collect charges relating to the original transport (rail environment).",
            InvoiceSuiteCodelistDocumentTypes::REEFER_CONNECTION_ORDER => "Order to connect a reefer container to a reefer point.",
            InvoiceSuiteCodelistDocumentTypes::REFUGEE_PERMIT => "Document identifying a refugee recognized by a country.",
            InvoiceSuiteCodelistDocumentTypes::REFUSAL_OF_CLAIM => "Document stating the refusal of a claim.",
            InvoiceSuiteCodelistDocumentTypes::REGIONAL_APPELLATION_CERTIFICATE => "Certificate drawn up in accordance with the rules laid down by an authority or approved body, certifying that the goods described therein qualify for a designation specific to the given region (e.g. champagne, port wine, Parmesan cheese).",
            InvoiceSuiteCodelistDocumentTypes::REGISTRATION_CHANGE => "Code specifying the modification of previously submitted registration information.",
            InvoiceSuiteCodelistDocumentTypes::REGISTRATION_DOCUMENT => "An official document providing registration details.",
            InvoiceSuiteCodelistDocumentTypes::REGISTRATION_RENEWAL => "Code specifying the continued validity of previously submitted registration information.",
            InvoiceSuiteCodelistDocumentTypes::REJECTED_DIRECT_DEBITS => "The message contains rejected direct debit(s).",
            InvoiceSuiteCodelistDocumentTypes::RELATED_DOCUMENT => "Document that has a relationship with the stated document/message.",
            InvoiceSuiteCodelistDocumentTypes::REMITTANCE_ADVICE => "Document/message advising of the remittance of payment.",
            InvoiceSuiteCodelistDocumentTypes::REPAIR_ORDER => "Document/message to order repair of goods.",
            InvoiceSuiteCodelistDocumentTypes::REPORT_OF_TRANSACTIONS_FOR_INFORMATION_ONLY => "A message reporting transactions for information only.",
            InvoiceSuiteCodelistDocumentTypes::REPORT_OF_TRANSACTIONS_WHICH_NEED_FURTHER_INFORMATION_FROM_THE_RECEIVER => "A message reporting transactions which need further information from the receiver.",
            InvoiceSuiteCodelistDocumentTypes::REQUEST_FOR_AN_AMENDMENT_OF_A_DOCUMENTARY_CREDIT => "Request for an amendment of a documentary credit.",
            InvoiceSuiteCodelistDocumentTypes::REQUEST_FOR_CONTRACT_PRICE_AND_DELIVERY_QUOTE => "Document/message requesting contractual price conditions and contractual delivery conditions under which goods are offered.",
            InvoiceSuiteCodelistDocumentTypes::REQUEST_FOR_CONTRACT_PRICE_QUOTE => "Document/message requesting contractual price conditions under which goods are offered.",
            InvoiceSuiteCodelistDocumentTypes::REQUEST_FOR_DELIVERY_INSTRUCTIONS => "Document/message issued by a supplier requesting instructions from the buyer regarding the details of the delivery of goods ordered.",
            InvoiceSuiteCodelistDocumentTypes::REQUEST_FOR_DELIVERY_QUOTE => "Document/message requesting delivery conditions under which goods are offered.",
            InvoiceSuiteCodelistDocumentTypes::REQUEST_FOR_FINANCIAL_CANCELLATION => "The message is a request for financial cancellation.",
            InvoiceSuiteCodelistDocumentTypes::REQUEST_FOR_METERING_POINT_INFORMATION => "Message to request information about a metering point.",
            InvoiceSuiteCodelistDocumentTypes::REQUEST_FOR_PAYMENT => "Document/message issued by a creditor to a debtor to request payment of one or more invoices past due.",
            InvoiceSuiteCodelistDocumentTypes::REQUEST_FOR_PRICE_AND_DELIVERY_QUOTE => "Document/message requesting price and delivery conditions under which goods are offered.",
            InvoiceSuiteCodelistDocumentTypes::REQUEST_FOR_PRICE_AND_DELIVERY_QUOTE_SHIP_AND_DEBIT => "Document/message from a distributor to a supplier requesting price conditions and delivery conditions under which goods can be sold by the distributor to the end-customer specified on the request for quote with compensation for loss of inventory value.",
            InvoiceSuiteCodelistDocumentTypes::REQUEST_FOR_PRICE_AND_DELIVERY_QUOTE_SPECIFIED_ENDUSER => "Document/message requesting price conditions and delivery conditions under which goods are offered, provided that they are sold to the end-customer specified on the request for quote.",
            InvoiceSuiteCodelistDocumentTypes::REQUEST_FOR_PRICE_QUOTE => "Document/message requesting price conditions under which goods are offered.",
            InvoiceSuiteCodelistDocumentTypes::REQUEST_FOR_PRICE_QUOTE_SHIP_AND_DEBIT => "Document/message from a distributor to a supplier requesting price conditions under which goods can be sold by the distributor to the end-customer specified on the request for quote with compensation for loss of inventory value.",
            InvoiceSuiteCodelistDocumentTypes::REQUEST_FOR_PRICE_QUOTE_SPECIFIED_ENDCUSTOMER => "Document/message requesting price conditions under which goods are offered, provided that they are sold to the end-customer specified on the request for quote.",
            InvoiceSuiteCodelistDocumentTypes::REQUEST_FOR_PROVISION_OF_A_HEALTH_SERVICE => "Document containing request for provision of a health service.",
            InvoiceSuiteCodelistDocumentTypes::REQUEST_FOR_QUOTE => "Document/message requesting a quote on specified goods or services.",
            InvoiceSuiteCodelistDocumentTypes::REQUEST_FOR_STATISTICAL_DATA => "Request for one or more items or data sets of statistical data.",
            InvoiceSuiteCodelistDocumentTypes::REQUEST_FOR_TRANSFER => "Document/message is a request for transfer.",
            InvoiceSuiteCodelistDocumentTypes::REQUIREMENTS_CONTRACT => "A document indicating a requirements contract that authorizes the filling of all purchase requirements during a specified contract period.",
            InvoiceSuiteCodelistDocumentTypes::RESALE_INFORMATION => "Document/message providing information on a resale.",
            InvoiceSuiteCodelistDocumentTypes::RESIDENCE_PERMIT => "A document authorizing residence.",
            InvoiceSuiteCodelistDocumentTypes::RESPONSE_TO_A_TRADE_STATISTICS_MESSAGE => "Document/message in which the competent national authorities provide a declarant with an acceptance or a rejection about a received declaration for European statistical purposes.",
            InvoiceSuiteCodelistDocumentTypes::RESPONSE_TO_AN_AMENDMENT_OF_A_DOCUMENTARY_CREDIT => "Response to an amendment of a documentary credit.",
            InvoiceSuiteCodelistDocumentTypes::RESPONSE_TO_PREVIOUS_BANKING_STATUS_MESSAGE => "A response to a previously sent banking status message.",
            InvoiceSuiteCodelistDocumentTypes::RESPONSE_TO_QUERY => "Document/message returned as an answer to a question.",
            InvoiceSuiteCodelistDocumentTypes::RESPONSE_TO_REGISTRATION => "Code specifying a response to an occurrence of a registration message.",
            InvoiceSuiteCodelistDocumentTypes::RESTOW => "Message/document identifying containers that have been unloaded and then reloaded onto the same means of transport.",
            InvoiceSuiteCodelistDocumentTypes::RETURNS_ADVICE => "Document/message by means of which the buyer informs the seller about the despatch of returned goods.",
            InvoiceSuiteCodelistDocumentTypes::REVERSAL_OF_CREDIT => "Reversal of credit accounting entry by bank.",
            InvoiceSuiteCodelistDocumentTypes::REVERSAL_OF_DEBIT => "Reversal of debit accounting entry by bank.",
            InvoiceSuiteCodelistDocumentTypes::RISK_ANALYSIS => "Document specifying the analysis of risks.",
            InvoiceSuiteCodelistDocumentTypes::ROAD_CONSIGNMENT_NOTE => "Transport document/message which evidences a contract between a carrier and a sender for the carriage of goods by road (generic term). Remark: For international road traffic, this document must contain at least the particulars prescribed by the convention on the contract for the international carriage of goods by road (CMR).",
            InvoiceSuiteCodelistDocumentTypes::ROAD_LISTSMGS => "Accounting document, one copy of which is drawn up for each consignment note; it accompanies the consignment over the whole route and is a rail transport document.",
            InvoiceSuiteCodelistDocumentTypes::RUSH_ORDER => "Document/message for urgent ordering.",
            InvoiceSuiteCodelistDocumentTypes::SAFETY_AND_HAZARD_DATA_SHEET => "Document or message to supply advice on a dangerous or hazardous material to industrial customers so as to enable them to take measures to protect their employees and the environment from any potential harmful effects from these material.",
            InvoiceSuiteCodelistDocumentTypes::SAFETY_OF_EQUIPMENT_CERTIFICATE => "Document certifying the safety of a ships equipment to a specified date.",
            InvoiceSuiteCodelistDocumentTypes::SAFETY_OF_RADIO_CERTIFICATE => "Document certifying the safety of a ships radio facilities to a specified date.",
            InvoiceSuiteCodelistDocumentTypes::SAFETY_OF_SHIP_CERTIFICATE => "Document certifying a ships safety to a specified date.",
            InvoiceSuiteCodelistDocumentTypes::SALES_DATA_REPORT => "A message enabling companies to exchange or report electronically, basic sales data related to products or services, including the corresponding location, time period, product identification, pricing and quantity information. It enables the recipient to p.",
            InvoiceSuiteCodelistDocumentTypes::SALES_FORECAST_REPORT => "A message enabling companies to exchange or report electronically, basic sales forecast data related to products or services, including the corresponding location, time period, product identification, pricing and quantity information. It enables the recip.",
            InvoiceSuiteCodelistDocumentTypes::SAMPLE_ORDER => "Document/message to order samples.",
            InvoiceSuiteCodelistDocumentTypes::SANITARY_CERTIFICATE => "Document/message issued by the competent authority in the exporting country evidencing that alimentary and animal products, including dead animals, are fit for human consumption, and giving details, when relevant, of controls undertaken.",
            InvoiceSuiteCodelistDocumentTypes::SEA_WAYBILL => "Non-negotiable document which evidences a contract for the carriage of goods by sea and the taking over of the goods by the carrier, and by which the carrier undertakes to deliver the goods to the consignee named in the document.",
            InvoiceSuiteCodelistDocumentTypes::SEAMANS_BOOK => "A national identity document issued to professional seamen that contains a record of their rank and service career.",
            InvoiceSuiteCodelistDocumentTypes::SEASON_TICKET => "A document giving access to a service for a determined period of time.",
            InvoiceSuiteCodelistDocumentTypes::SEGMENT_CHANGE_REQUEST => "Requesting a change to an existing segment.",
            InvoiceSuiteCodelistDocumentTypes::SEGMENT_REQUEST => "Request a new segment.",
            InvoiceSuiteCodelistDocumentTypes::SELF_BILLED_CREDIT_NOTE => "A document which indicates that the customer is claiming credit in a self billing environment.",
            InvoiceSuiteCodelistDocumentTypes::SELF_BILLED_DEBIT_NOTE => "A document which indicates that the customer is claiming debit in a self billing environment.",
            InvoiceSuiteCodelistDocumentTypes::SELFBILLED_INVOICE => "An invoice the invoicee is producing instead of the seller.",
            InvoiceSuiteCodelistDocumentTypes::SEQUENCED_DELIVERY_SCHEDULE => "Message to describe a sequence of product delivery.",
            InvoiceSuiteCodelistDocumentTypes::SERVICE_DIRECTORY_DEFINITION => "Document/message defining the contents of a service directory set or parts thereof.",
            InvoiceSuiteCodelistDocumentTypes::SETTLEMENT_OF_A_LETTER_OF_CREDIT => "Settlement of a letter of credit.",
            InvoiceSuiteCodelistDocumentTypes::SHIP_SECURITY_PLAN => "Ship Security Plan (SSP) is a document prepared in terms of the ISPS Code to contribute to the prevention of illegal acts against the ship and its crew.",
            InvoiceSuiteCodelistDocumentTypes::SHIPS_STORES_DECLARATION => "Declaration to Customs regarding the contents of the ships stores (equivalent to IMO FAL 3) i.e. goods intended for consumption by passengers/crew on board vessels, aircraft or trains, whether or not sold or landed; goods necessary for operation/maintenance of conveyance, including fuel/lubricants, excluding spare parts/equipment (IMO).",
            InvoiceSuiteCodelistDocumentTypes::SHIPPERS_LETTER_OF_INSTRUCTIONS_AIR => "Document/message issued by a consignor in which he gives details of a consignment of goods that enables an airline or its agent to prepare an air waybill.",
            InvoiceSuiteCodelistDocumentTypes::SHIPPING_INSTRUCTIONS => "(1121) Document/message advising details of cargo and exporters requirements for its physical movement.",
            InvoiceSuiteCodelistDocumentTypes::SHIPPING_NOTE => "(1123) Document/message provided by the shipper or his agent to the carrier, multimodal transport operator, terminal or other receiving authority, giving information about export consignments offered for transport, and providing for the necessary receipts and declarations of liability. Sometimes a multipurpose cargo handling document also fulfilling the functions of document 632, 633, 650 and 655.",
            InvoiceSuiteCodelistDocumentTypes::SIMPLE_DATA_ELEMENT_CHANGE_REQUEST => "Request a change to an existing simple data element.",
            InvoiceSuiteCodelistDocumentTypes::SIMPLE_DATA_ELEMENT_REQUEST => "Requesting a new simple data element.",
            InvoiceSuiteCodelistDocumentTypes::SINGLE_ADMINISTRATIVE_DOCUMENT => "A set of documents, replacing the various (national) forms for Customs declaration within the EC, implemented on 01-01-1988.",
            InvoiceSuiteCodelistDocumentTypes::SOIL_ANALYSIS => "Soil analysis document.",
            InvoiceSuiteCodelistDocumentTypes::SPARE_PARTS_ORDER => "Document/message to order spare parts.",
            InvoiceSuiteCodelistDocumentTypes::SPECIAL_REQUIREMENTS_PERMIT_RELATED_TO_THE_TRANSPORT_OF_CARGO => "A permit related to a transport document granting the transport of cargo under the conditions as specifically required.",
            InvoiceSuiteCodelistDocumentTypes::SPECIFIC_CONTRACT_CONDITIONS => "Document specifying the individual conditions or clauses applying to a specific contract.",
            InvoiceSuiteCodelistDocumentTypes::SPOT_ORDER => "Document/message ordering the remainder of a productions batch.",
            InvoiceSuiteCodelistDocumentTypes::STANDING_INQUIRY_ON_COMPLETE_PRODUCT_INFORMATION => "A product inquiry which stands until it is cancelled. It requests not only the updates since last time, but always the complete product information of a data supplier. This means that within the standing request every time a complete download of the respe.",
            InvoiceSuiteCodelistDocumentTypes::STANDING_INQUIRY_ON_PRODUCT_INFORMATION => "A product inquiry which stands until it is cancelled.",
            InvoiceSuiteCodelistDocumentTypes::STANDING_ORDER => "An order to supply fixed quantities of products at fixed regular intervals.",
            InvoiceSuiteCodelistDocumentTypes::STATEMENT_OF_ACCOUNT_MESSAGE => "Usage of STATAC-message.",
            InvoiceSuiteCodelistDocumentTypes::STATISTICAL_AND_OTHER_ADMINISTRATIVE_INTERNAL_DOCUMENTS => "Documents/messages issued within an enterprise for the for the purpose of collection of production and other internal statistics, and for other administration purposes.",
            InvoiceSuiteCodelistDocumentTypes::STATISTICAL_DATA => "Transmission of one or more items of data or data sets.",
            InvoiceSuiteCodelistDocumentTypes::STATISTICAL_DEFINITIONS => "Transmission of one or more statistical definitions.",
            InvoiceSuiteCodelistDocumentTypes::STATISTICAL_DOCUMENT_EXPORT => "Document/message in which an exporter provides information about exported goods required by the body responsible for the collection of international trade statistics.",
            InvoiceSuiteCodelistDocumentTypes::STATISTICAL_DOCUMENT_IMPORT => "Document/message describing an import document that is used for statistical purposes.",
            InvoiceSuiteCodelistDocumentTypes::STATUS_INFORMATION => "Information regarding the status of a related message.",
            InvoiceSuiteCodelistDocumentTypes::STATUS_REPORT => "Message covers information about the status.",
            InvoiceSuiteCodelistDocumentTypes::STORAGE_CAPACITY_OFFER => "Offering of capacity to store goods.",
            InvoiceSuiteCodelistDocumentTypes::STORAGE_CAPACITY_REQUEST => "Request for capacity to store goods.",
            InvoiceSuiteCodelistDocumentTypes::STORES_REQUISITION => "Document/message issued within an enterprise ordering the taking out of stock of goods.",
            InvoiceSuiteCodelistDocumentTypes::SUBCONTRACTOR_PLAN => "A document indicating a plan that identifies the manufacturers subcontracting strategy for a specific contract.",
            InvoiceSuiteCodelistDocumentTypes::SUBSTITUTE_AIR_WAYBILL => "A temporary air waybill which contains only limited information because of the absence of the original.",
            InvoiceSuiteCodelistDocumentTypes::SUMMARY_SALES_REPORT => "Sales report containing summaries for several earlier sent sales reports.",
            InvoiceSuiteCodelistDocumentTypes::SUMMONS => "Document specifying a summons to court.",
            InvoiceSuiteCodelistDocumentTypes::SUPPLEMENTARY_DOCUMENT_FOR_APPLICATION_FOR_CARGO_OPERATION_OF_DANGEROUS_GOODS => "Supplementary document to apply for cargo operation of dangerous goods.",
            InvoiceSuiteCodelistDocumentTypes::SUPPLEMENTARY_DOCUMENT_FOR_APPLICATION_FOR_TRANSPORT_OF_DANGEROUS_GOODS => "Supplementary document to apply for transport of dangerous goods.",
            InvoiceSuiteCodelistDocumentTypes::SUSTAINABILITY_DATA_REQUEST => "Document/message requesting information based on defined criteria regarding sustainability.",
            InvoiceSuiteCodelistDocumentTypes::SUSTAINABILITY_DATA_RESPONSE => "Document/Message returned as an answer to a question regarding sustainability.",
            InvoiceSuiteCodelistDocumentTypes::SUSTAINABILITY_INSPECTION_REQUEST => "Document/message requesting a sustainability inspection.",
            InvoiceSuiteCodelistDocumentTypes::SUSTAINABILITY_INSPECTION_RESPONSE => "Document/message reporting the results of a sustainability inspection.",
            InvoiceSuiteCodelistDocumentTypes::SWAP_ORDER => "Document/message informing buyer or seller of the replacement of goods previously ordered.",
            InvoiceSuiteCodelistDocumentTypes::TANKER_BILL_OF_LADING => "Document which evidences a transport of liquid bulk cargo.",
            InvoiceSuiteCodelistDocumentTypes::TASK_ORDER => "A document indicating an order that tasks a contractor to perform a specified function.",
            InvoiceSuiteCodelistDocumentTypes::TAX_CALCULATIONCONFIRMATION_RESPONSE_CUSTOMS => "Tax calculation/confirmation response message to permit the transfer of data from Customs to the transmitter of the previous message.",
            InvoiceSuiteCodelistDocumentTypes::TAX_DECLARATION_GENERAL => "Document/message containing a general tax declaration.",
            InvoiceSuiteCodelistDocumentTypes::TAX_DECLARATION_VALUE_ADDED_TAX => "Document/message in which an importer states the pertinent information required by the competent body for assessment of value-added tax.",
            InvoiceSuiteCodelistDocumentTypes::TAX_DEMAND => "Document/message containing the demand of tax.",
            InvoiceSuiteCodelistDocumentTypes::TAX_INVOICE => "An invoice for tax purposes.",
            InvoiceSuiteCodelistDocumentTypes::TAX_NOTIFICATION => "Used to specify that the message is a tax notification.",
            InvoiceSuiteCodelistDocumentTypes::TENDER => "A document/message used by a supplier to bid in a procurement procedure.",
            InvoiceSuiteCodelistDocumentTypes::TENDERING_PRICESALES_CATALOGUE => "A document/message providing information regarding pricing and catalogue details for goods and/or services to be offered as part of a tender.",
            InvoiceSuiteCodelistDocumentTypes::TENDERING_PRICESALES_CATALOGUE_REQUEST => "A document/message requesting information regarding pricing and catalogue details for goods and/or services to be offered as part of a tender.",
            InvoiceSuiteCodelistDocumentTypes::TEST_REPORT => "Report providing the results of a test session.",
            InvoiceSuiteCodelistDocumentTypes::THERMOGRAPHIC_READING_REPORT => "A report of temperature readings over a period.",
            InvoiceSuiteCodelistDocumentTypes::THIRD_PARTY_PAYMENT_REPORT => "Report about payments done towards a third party.",
            InvoiceSuiteCodelistDocumentTypes::THROUGH_BILL_OF_LADING => "Bill of lading which evidences a contract of carriage from one place to another in separate stages of which at least one stage is a sea transit, and by which the issuing carrier accepts responsibility for the carriage as set forth in the through bill of lading.",
            InvoiceSuiteCodelistDocumentTypes::TIF_FORM => "International Customs transit document by which the sender declares goods for carriage by rail in accordance with the provisions of the 1952 International Convention to facilitate the crossing of frontiers for goods carried by rail (TIF Convention of UIC).",
            InvoiceSuiteCodelistDocumentTypes::TIR_CARNET => "International Customs document (International Transit by Road), issued by a guaranteeing association approved by the Customs authorities, under the cover of which goods are carried, in most cases under Customs seal, in road vehicles and/or containers in compliance with the requirements of the Customs TIR Convention of the International Transport of Goods under cover of TIR Carnets (UN/ECE).",
            InvoiceSuiteCodelistDocumentTypes::TRACEABILITY_EVENT_DECLARATION => "Document/message declaring a traceability event.",
            InvoiceSuiteCodelistDocumentTypes::TRACKING_NUMBER_ASSIGNMENT_REPORT => "Report of assigned tracking numbers.",
            InvoiceSuiteCodelistDocumentTypes::TRADE_DATA => "Document/message is for trade data.",
            InvoiceSuiteCodelistDocumentTypes::TRANSFRONTIER_WASTE_SHIPMENT_AUTHORIZATION => "Document containing the authorization from the relevant authority for the international carriage of waste. Syn: Transfrontier waste shipment permit.",
            InvoiceSuiteCodelistDocumentTypes::TRANSFRONTIER_WASTE_SHIPMENT_MOVEMENT_DOCUMENT => "Document certified by the carriers and the consignee to be used for the international carriage of waste.",
            InvoiceSuiteCodelistDocumentTypes::TRANSIT_CERTIFICATE_OF_APPROVAL => "Certificate of approval for the transport of goods under customs seal",
            InvoiceSuiteCodelistDocumentTypes::TRANSIT_CONVEYOR_DOCUMENT => "Document for a course of transit used for a carrier who is neither the carrier at the beginning nor the arrival. The transit carrier can directly invoice the expenses for its part of the transport.",
            InvoiceSuiteCodelistDocumentTypes::TRANSIT_LICENSE => "Document/message issued by the competent body in accordance with transit regulations in force, by which authorization is granted to a party to move articles under customs procedure.",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_CAPACITY_OFFER => "Offering of capacity for the transport of goods for a date and a route.",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_CAPACITY_REQUEST => "Request for capacity for the transport of goods for a date and a route.",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_CARGO_RELEASE_ORDER => "Order to release cargo or items of transport equipment to a specified party.",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_DEPARTURE_REPORT => "Report of the departure of a means of transport from a particular facility.",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_DISCHARGE_INSTRUCTION => "Instruction to unload specified cargo, containers or transport equipment from a means of transport.",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_DISCHARGE_REPORT => "Report on cargo, containers or transport equipment unloaded from a particular means of transport.",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EMERGENCY_CARD => "Official document specifying, for a given dangerous goods item, information such as nature of hazard, protective devices, actions to be taken in case of accident, spillage or fire and first aid to be given.",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EMPTY_EQUIPMENT_ADVICE => "Advice that an item or items of empty transport equipment are available for return.",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_ACCEPTANCE_ORDER => "Order to accept items of transport equipment which are to be delivered by an inland carrier (rail, road or barge) to a specified facility.",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_DAMAGE_REPORT => "Report of damaged items of transport equipment that have been returned.",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_DELIVERY_NOTICE => "Notification regarding the delivery of transport equipment.",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_DIRECT_INTERCHANGE_REPORT => "Report on the movement of containers or other items of transport equipment being exchanged, establishing relevant rental periods.",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_EMPTY_RELEASE_INSTRUCTION => "Instruction to release an item of empty transport equipment to a specified party or parties.",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_GROSS_MASS_VERIFICATION_MESSAGE => "Message containing information regarding gross mass verification of transport equipment.",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_IMPENDING_ARRIVAL_ADVICE => "Advice that containers or other items of transport equipment may be expected to be delivered to a certain location.",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_MAINTENANCE_AND_REPAIR_NOTICE => "Report of transport equipment which has been repaired or has had maintenance performed.",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_MAINTENANCE_AND_REPAIR_WORK_AUTHORISATION => "Authorisation to have transport equipment repaired or to have maintenance performed.",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_MAINTENANCE_AND_REPAIR_WORK_ESTIMATE_ADVICE => "Advice providing estimates of transport equipment maintenance and repair costs.",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_MAINTENANCE_AND_REPAIR_WORK_ESTIMATE_ORDER => "Order to draw up an estimate of the costs of maintenance or repair of transport equipment.",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_MOVEMENT_INSTRUCTION => "Instruction to perform one or more different movements of transport equipment.",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_MOVEMENT_REPORT => "Report on one or more different movements of transport equipment.",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_MOVEMENT_REPORT_PARTIAL => "A partial transport equipment movement report, containing only a selected part of the movements of transport equipment for a vessel in a port.",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_OFFHIRE_REPORT => "Report on the movement of containers or other items of transport equipment to record physical movement activity and establish the end of a rental period.",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_OFFHIRE_REQUEST => "Request to terminate the lease on an item of transport equipment at a specified time.",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_ONHIRE_ORDER => "Order to release empty items of transport equipment for on-hire to a lessee, and authorising collection by or on behalf of a specified party.",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_ONHIRE_REPORT => "Report on the movement of containers or other items of transport equipment to record physical movement activity and establish the beginning of a rental period.",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_ONHIRE_REQUEST => "Request for transport equipment to be made available for hire.",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_PACKING_INSTRUCTION => "Instruction to pack cargo into a container or other item of transport equipment.",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_PICKUP_AVAILABILITY_CONFIRMATION => "Confirmation that an item of transport equipment is available for collection.",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_PICKUP_AVAILABILITY_REQUEST => "Request for confirmation that an item of transport equipment will be available for collection.",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_PICKUP_REPORT => "Report that an item of transport equipment has been collected.",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_PROFILE_REPORT => "Report on the profile of transport equipment.",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_SHIFT_REPORT => "Report on the movement of containers or other items of transport within a facility.",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_SPECIAL_SERVICE_INSTRUCTION => "Instruction to perform a specified service or services on an item or items of transport equipment.",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_STATUS_CHANGE_REPORT => "Report on one or more changes of status associated with an item or items of transport equipment.",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_STOCK_REPORT => "Report on the number of items of transport equipment stored at one or more locations.",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_SURVEY_ORDER => "Order to perform a survey on specified items of transport equipment.",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_SURVEY_ORDER_RESPONSE => "Response to an order to conduct a survey of transport equipment.",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_SURVEY_REPORT => "Survey report of specified items of transport equipment.",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_UNPACKING_INSTRUCTION => "Instruction to unpack specified cargo from specified containers or other items of transport equipment.",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_EQUIPMENT_UNPACKING_REPORT => "Report on the completion of unpacking specified containers or other items of transport equipment.",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_LOADING_INSTRUCTION => "Instruction to load cargo, containers or transport equipment onto a means of transport.",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_LOADING_REPORT => "Report on completion of loading cargo, containers or other transport equipment onto a means of transport.",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_MEANS_SECURITY_REPORT => "A document reporting the security status and related information of a means of transport.",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_MOVEMENT_GATE_IN_REPORT => "Report on the inward movement of cargo, containers or other items of transport equipment which have been delivered to a facility by an inland carrier.",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_MOVEMENT_GATE_OUT_REPORT => "Report on the outward movement of cargo, containers or other items of transport equipment (either full or empty) which have been picked up by an inland carrier.",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_ROUTING_INFORMATION => "Document specifying the routes for transport between locations.",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_STATUS_REPORT => "(1125) A message to report the transport status and/or change in the transport status (i.e. event) between agreed parties.",
            InvoiceSuiteCodelistDocumentTypes::TRANSPORT_STATUS_REQUEST => "(1127) A message to request a transport status report (e.g. through the national multimodal status report message IFSTA).",
            InvoiceSuiteCodelistDocumentTypes::TRANSSHIPMENT_DESPATCH_ADVICE => "Document by means of which the supplier or consignor informs the buyer, consignee or the distribution centre about the despatch of goods for transshipment.",
            InvoiceSuiteCodelistDocumentTypes::TRAVEL_TICKET => "The document is a ticket giving access to a travel service.",
            InvoiceSuiteCodelistDocumentTypes::TREATMENT_NIL_OUTTURN => "No shortage, surplus or damaged outturn resulting from container vessel unpacking.",
            InvoiceSuiteCodelistDocumentTypes::TREATMENT_PERSONAL_EFFECT => "Cargo consists of personal effects.",
            InvoiceSuiteCodelistDocumentTypes::TREATMENT_TIMBER => "Cargo consists of timber.",
            InvoiceSuiteCodelistDocumentTypes::TREATMENT_TIMEUP_UNDERBOND => "Movement type indicator: goods are moved under customs control for warehousing due to being time-up.",
            InvoiceSuiteCodelistDocumentTypes::TREATMENT_UNDERBOND_BY_SEA => "Movement type indicator: goods are to move by sea under customs control to a customs office where formalities will be completed.",
            InvoiceSuiteCodelistDocumentTypes::UNDERBOND_APPROVAL => "A message/document issuing Customs approval to move cargo from one Customs control point to another.",
            InvoiceSuiteCodelistDocumentTypes::UNDERBOND_REQUEST => "A Message/document requesting to move cargo from one Customs control point to another.",
            InvoiceSuiteCodelistDocumentTypes::UNITED_NATIONS_STANDARD_MESSAGE_REQUEST => "Requesting a United Nations Standard Message (UNSM).",
            InvoiceSuiteCodelistDocumentTypes::UNIVERSAL_MULTIPURPOSE_TRANSPORT_DOCUMENT => "Document/message evidencing a contract of carriage covering the movement of goods by any mode of transport, or combination of modes, for national as well as international transport, under any applicable international convention or national law and under the conditions of carriage of any carrier or transport operator undertaking or arranging the transport referred to in the document.",
            InvoiceSuiteCodelistDocumentTypes::UNPRICED_BILL_OF_QUANTITY => "Document/message providing a detailed, quantity based specification, issued in an unpriced form to invite tender prices.",
            InvoiceSuiteCodelistDocumentTypes::UNSHIP_PERMIT => "A message or document issuing permission to unship cargo.",
            InvoiceSuiteCodelistDocumentTypes::US_FATCA_STATEMENT => "Statement regarding the Foreign Account Tax Compliance Act (FATCA) of the United States of America.",
            InvoiceSuiteCodelistDocumentTypes::USER_DIRECTORY_DEFINITION => "Document/message defining the contents of a user directory set or parts thereof.",
            InvoiceSuiteCodelistDocumentTypes::UTILITIES_TIME_SERIES_MESSAGE => "The Utilities time series message is sent between responsible parties in a utilities infrastructure for the purpose of reporting time series and connected technical and/or administrative information.",
            InvoiceSuiteCodelistDocumentTypes::VACCINATION_CERTIFICATE => "Official document proving immunisation against certain diseases.",
            InvoiceSuiteCodelistDocumentTypes::VALIDATED_PRICED_TENDER => "A validated priced tender.",
            InvoiceSuiteCodelistDocumentTypes::VALUATION_REPORT => "Document reporting a valuation.",
            InvoiceSuiteCodelistDocumentTypes::VALUE_DECLARATION => "Document/message in which a declarant (importer) states the invoice or other price (e.g. selling price, price of identical goods), and specifies costs for freight, insurance and packing, etc., terms of delivery and payment, any relationship with the trading partner, etc., for the purpose of determining the Customs value of goods imported.",
            InvoiceSuiteCodelistDocumentTypes::VEHICLE_ABOARD_DOCUMENT => "Document which must be aboard the vehicle.",
            InvoiceSuiteCodelistDocumentTypes::VESSEL_UNPACK_REPORT => "A document code to indicate that the message being transmitted identifies all short and surplus cargoes off-loaded from a vessel at a specified discharging port.",
            InvoiceSuiteCodelistDocumentTypes::VETERINARY_CERTIFICATE => "Document/message issued by the competent authority in the exporting country evidencing that live animals or birds are not infested or infected with disease, and giving details regarding their provenance, and of vaccinations and other treatment to which they have been subjected.",
            InvoiceSuiteCodelistDocumentTypes::VETERINARY_QUARANTINE_CERTIFICATE => "A certification that livestock or animal products, that are either imported or entering free zones, are kept under health supervision for a time period determined by veterinary quarantine instructions.",
            InvoiceSuiteCodelistDocumentTypes::VIDEO => "Document consisting of a video.",
            InvoiceSuiteCodelistDocumentTypes::VISA => "An endorsement on a passport or any other recognised travel document indicating that it has been examined and found correct, especially as permitting the holder to enter or leave a country.",
            InvoiceSuiteCodelistDocumentTypes::WAGE_DETERMINATION => "A document indicating a determination of the wages to be paid.",
            InvoiceSuiteCodelistDocumentTypes::WAGON_REPORT => "Document which contains consignment information concerning the wagons and their lading in a case of a multiple wagon consignment.",
            InvoiceSuiteCodelistDocumentTypes::WAREHOUSE_WARRANT => "Negotiable receipt document, issued by a Warehouse Keeper to a person placing goods in a warehouse and conferring title to the goods stored.",
            InvoiceSuiteCodelistDocumentTypes::WASTE_DISPOSAL_REPORT => "Document/message sent by a shipping agent to an authority for reporting information on waste disposal.",
            InvoiceSuiteCodelistDocumentTypes::WAYBILL => "Non-negotiable document evidencing the contract for the transport of cargo.",
            InvoiceSuiteCodelistDocumentTypes::WCO_CARGO_REPORT_EXPORT_AIR_OR_MARITIME => "Declaration, in accordance with the WCO Customs Data Model, to Customs concerning the export of cargo carried by commercial means of transport over water or through the air, e.g. vessel or aircraft.",
            InvoiceSuiteCodelistDocumentTypes::WCO_CARGO_REPORT_EXPORT_RAIL_OR_ROAD => "Declaration, in accordance with the WCO Customs Data Model, to Customs concerning the export of cargo carried by commercial means of transport over land, e.g. truck or train.",
            InvoiceSuiteCodelistDocumentTypes::WCO_CARGO_REPORT_IMPORT_AIR_OR_MARITIME => "Declaration, in accordance with the WCO Customs Data Model, to Customs concerning the import of cargo carried by commercial means of transport over water or through the air, e.g. vessel or aircraft.",
            InvoiceSuiteCodelistDocumentTypes::WCO_CARGO_REPORT_IMPORT_RAIL_OR_ROAD => "Declaration, in accordance with the WCO Customs Data Model, to Customs concerning the import of cargo carried by commercial means of transport over land, e.g. truck or train.",
            InvoiceSuiteCodelistDocumentTypes::WCO_CONVEYANCE_ARRIVAL_REPORT => "Declaration, in accordance with the WCO Customs Data Model, to Customs regarding the conveyance arriving in a Customs territory.",
            InvoiceSuiteCodelistDocumentTypes::WCO_CONVEYANCE_DEPARTURE_REPORT => "Declaration, in accordance with the WCO Customs Data Model, to Customs regarding the conveyance departing a Customs territory.",
            InvoiceSuiteCodelistDocumentTypes::WCO_FIRST_STEP_OF_TWOSTEP_EXPORT_DECLARATION => "First part of a simplified declaration, in accordance with the WCO Customs Data Model, to Customs by which goods are declared for Customs export procedure based on the 1999 Kyoto Convention.",
            InvoiceSuiteCodelistDocumentTypes::WCO_FIRST_STEP_OF_TWOSTEP_IMPORT_DECLARATION => "First part of a simplified declaration, in accordance with the WCO Customs Data Model, to Customs by which goods are declared for Customs import procedure based on the 1999 Kyoto Convention.",
            InvoiceSuiteCodelistDocumentTypes::WCO_ONESTEP_EXPORT_DECLARATION => "Single step declaration, in accordance with the WCO Customs Data Model, to Customs by which goods are declared for a Customs export procedure based on the 1999 Kyoto Convention.",
            InvoiceSuiteCodelistDocumentTypes::WCO_ONESTEP_IMPORT_DECLARATION => "Single step declaration, in accordance with the WCO Customs Data Model, to Customs by which goods are declared for Customs import procedure based on the 1999 Kyoto Convention.",
            InvoiceSuiteCodelistDocumentTypes::WCO_SECOND_STEP_OF_TWOSTEP_EXPORT_DECLARATION => "Second part of a simplified declaration, in accordance with the WCO Customs Data Model, to Customs by which goods are declared for Customs export procedure based on the 1999 Kyoto Convention.",
            InvoiceSuiteCodelistDocumentTypes::WCO_SECOND_STEP_OF_TWOSTEP_IMPORT_DECLARATION => "Second part of a simplified declaration, in accordance with the WCO Customs Data Model, to Customs by which goods are declared for Customs import procedure based on the 1999 Kyoto Convention.",
            InvoiceSuiteCodelistDocumentTypes::WEIGHT_CERTIFICATE => "Certificate certifying the weight of goods.",
            InvoiceSuiteCodelistDocumentTypes::WEIGHT_LIST => "Document/message specifying the weight of goods.",
            InvoiceSuiteCodelistDocumentTypes::WINE_CERTIFICATE => "Certificate attesting to the quality, origin or appellation of wine.",
            InvoiceSuiteCodelistDocumentTypes::WITNESS_REPORT => "Document containing a report of a witness.",
            InvoiceSuiteCodelistDocumentTypes::WOOL_HEALTH_CERTIFICATE => "Certificate attesting that wool is free from specified risks to human or animal health.",
            InvoiceSuiteCodelistDocumentTypes::WRITTEN_INSTRUCTIONS_IN_CONFORMANCE_WITH_ADR_ARTICLE_NUMBER => "Written instructions relating to dangerous goods and defined in the European Agreement of Dangerous Transport by Road known as ADR (Accord europeen relatif au transport international des marchandises Dangereuses par Route).",
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
            'https://www.xrepository.de/details/urn:xoev-de:kosit:codeliste:untdid.1001',
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
            'https://www.xrepository.de/api/xrepository/urn:xoev-de:kosit:codeliste:untdid.1001_4/download/UNTDID_1001_4.json',
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
        return '2025-08-13T11:28:03+02:00';
    }
}
