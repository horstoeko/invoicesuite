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
 * Class representing list of reference code qualifiers
 * Name of list: UNTDID 1153 Reference code qualifier
 *
 * @category InvoiceSuite
 * @author   HorstOeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 * @see      https://www.xrepository.de/details/urn:xoev-de:kosit:codeliste:untdid.1153
 * @see      https://www.xrepository.de/api/xrepository/urn:xoev-de:kosit:codeliste:untdid.1153_3/download/UNTDID_1153_3.json
 */
enum InvoiceSuiteCodelistReferenceCodeQualifiers: string
{
    /**
     * Accident reference number (APP)
     *
     * Reference number assigned to an accident.
     */
    case ACCI_REFE_NUMB = 'APP';

    /**
     * Account number (ADE)
     *
     * Identification number of an account.
     */
    case ACCO_NUMB = 'ADE';

    /**
     * Account party's bank reference (AGC)
     *
     * Reference number of the account party's bank.
     */
    case ACCO_PART_BANK_REFE = 'AGC';

    /**
     * Account party's reference (AFN)
     *
     * Reference of the account party.
     */
    case ACCO_PART_REFE = 'AFN';

    /**
     * Account payable number (AV)
     *
     * Reference number assigned by accounts payable department to the account of
     * a specific creditor.
     */
    case ACCO_PAYA_NUMB = 'AV';

    /**
     * Account servicing bank's reference number (ANA)
     *
     * Reference number of the account servicing bank.
     */
    case ACCO_SERV_BANK_REFE_NUMB = 'ANA';

    /**
     * Accounting entry (AWQ)
     *
     * Accounting entry to which this item is related.
     */
    case ACCO_ENTR = 'AWQ';

    /**
     * Accounting file reference (AOD)
     *
     * Reference of an accounting file.
     */
    case ACCO_FILE_REFE = 'AOD';

    /**
     * Accounting transmission number (ASU)
     *
     * A number used to identify the transmission of an accounting book entry.
     */
    case ACCO_TRAN_NUMB = 'ASU';

    /**
     * Accounts receivable number (AP)
     *
     * Reference number assigned by accounts receivable department to the account
     * of a specific debtor.
     */
    case ACCO_RECE_NUMB = 'AP';

    /**
     * Action authorization number (AKO)
     *
     * A reference number authorizing an action.
     */
    case ACTI_AUTH_NUMB = 'AKO';

    /**
     * Activite Principale Exercee (APE) identifier (AQQ)
     *
     * The French industry code for the main activity of a company.
     */
    case ACTI_PRIN_EXER_APE_IDEN = 'AQQ';

    /**
     * Additional reference number (ACD)
     *
     * [1010] Reference number provided in addition to another given reference.
     */
    case ADDI_REFE_NUMB = 'ACD';

    /**
     * Addressee reference (ACF)
     *
     * A reference number of an addressee.
     */
    case ADDR_REFE = 'ACF';

    /**
     * Administrative Reference Code (AWT)
     *
     * Reference number assigned by Customs to a ‘shipment of excise goods’.
     */
    case ADMI_REFE_CODE = 'AWT';

    /**
     * Advise through bank's reference (AMP)
     *
     * Financial institution through which the advising bank is to advise the
     * documentary credit.
     */
    case ADVI_THRO_BANK_REFE = 'AMP';

    /**
     * Advising bank's reference (AWD)
     *
     * Reference number of the advising bank.
     */
    case ADVI_BANK_REFE = 'AWD';

    /**
     * Agency clause number (AJE)
     *
     * A number indicating a clause applicable to a particular agency.
     */
    case AGEN_CLAU_NUMB = 'AJE';

    /**
     * Agent's bank reference (AGD)
     *
     * Reference number issued by the agent's bank.
     */
    case AGEN_BANK_REFE = 'AGD';

    /**
     * Agent's reference (AGE)
     *
     * Reference number of the agent.
     */
    case AGEN_REFE = 'AGE';

    /**
     * AGERD (Aerospace Ground Equipment Requirement Data) number (ALU)
     *
     * Identifies the equipment required to conduct maintenance.
     */
    case AGER_AERO_GROU_EQUI_REQU_DATA_NUMB = 'ALU';

    /**
     * Agreement number (AJS)
     *
     * A number specifying an agreement between parties.
     */
    case AGRE_NUMB = 'AJS';

    /**
     * Agreement to pay number (AGA)
     *
     * A number that identifies an agreement to pay.
     */
    case AGRE_TO_PAY_NUMB = 'AGA';

    /**
     * Air cargo transfer manifest (AC)
     *
     * A number assigned to an air cargo list of goods to be transferred.
     */
    case AIR_CARG_TRAN_MANI = 'AC';

    /**
     * Air waybill number (AWB)
     *
     * Reference number assigned to an air waybill, see: 1001 = 740.
     */
    case AIR_WAYB_NUMB = 'AWB';

    /**
     * Airlines flight identification number (AF)
     *
     * (8028) Identification of a commercial flight by carrier code and number as
     * assigned by the airline (IATA).
     */
    case AIRL_FLIG_IDEN_NUMB = 'AF';

    /**
     * Allocated seat (SEA)
     *
     * Reference to a seat allocated to a passenger.
     */
    case ALLO_SEAT = 'SEA';

    /**
     * Allotment identification (Air) (ABY)
     *
     * Reference assigned to guarantied capacity on one or more specific flights
     * on specific date(s) to third parties as agents and other airlines.
     */
    case ALLO_IDEN_AIR = 'ABY';

    /**
     * Analysis number/test number (ADD)
     *
     * Number given to a specific analysis or test operation.
     */
    case ANAL_NUMB_NUMB = 'ADD';

    /**
     * Animal farm licence number (CFF)
     *
     * Veterinary licence number allocated by a national authority to an animal
     * farm.
     */
    case ANIM_FARM_LICE_NUMB = 'CFF';

    /**
     * Anti-dumping case number (ABC)
     *
     * Reference issued by a Customs administration pertaining to a past or
     * current investigation of goods "dumped" at a price lower than the
     * exporter's domestic market price.
     */
    case ANTI_CASE_NUMB = 'ABC';

    /**
     * Applicable coefficient identification number (APT)
     *
     * The identification number of the coefficient which is applicable.
     */
    case APPL_COEF_IDEN_NUMB = 'APT';

    /**
     * Applicable instructions or standards (AEH)
     *
     * Instructions or standards applicable for the whole message or a message
     * line item. These instructions or standards may be published by a neutral
     * organization or authority or another party concerned.
     */
    case APPL_INST_OR_STAN = 'AEH';

    /**
     * Applicant's bank reference (AFQ)
     *
     * Reference number of the applicant's bank.
     */
    case APPL_BANK_REFE = 'AFQ';

    /**
     * Applicant's reference (AGF)
     *
     * Reference number of the applicant.
     */
    case APPL_REFE = 'AGF';

    /**
     * Application for financial support reference number (AUK)
     *
     * Reference number assigned to an application for financial support.
     */
    case APPL_FOR_FINA_SUPP_REFE_NUMB = 'AUK';

    /**
     * Application reference number (AGK)
     *
     * A number that identifies an application reference.
     */
    case APPL_REFE_NUMB = 'AGK';

    /**
     * Appropriation number (AKP)
     *
     * The number identifying a type of funding for a specific purpose
     * (appropriation).
     */
    case APPR_NUMB = 'AKP';

    /**
     * Article number (ABU)
     *
     * A number that identifies an article.
     */
    case ARTI_NUMB = 'ABU';

    /**
     * Assembly number (AEB)
     *
     * A number that identifies an assembly.
     */
    case ASSE_NUMB = 'AEB';

    /**
     * Associated invoices (AFL)
     *
     * A number that identifies associated invoices.
     */
    case ASSO_INVO = 'AFL';

    /**
     * Assuming company (ASC)
     *
     * A number that identifies an assuming company.
     */
    case ASSU_COMP = 'ASC';

    /**
     * ATA carnet number (ACG)
     *
     * Reference number assigned to an ATA carnet.
     */
    case ATA_CARN_NUMB = 'ACG';

    /**
     * Authorisation for repair reference (APV)
     *
     * Reference of the authorisation for repair.
     */
    case AUTH_FOR_REPA_REFE = 'APV';

    /**
     * Authority issued equipment identification (AHB)
     *
     * Identification issued by an authority, e.g. government, airport authority.
     */
    case AUTH_ISSU_EQUI_IDEN = 'AHB';

    /**
     * Authorization for expense (AFE) number (AE)
     *
     * A number that identifies an authorization for expense (AFE).
     */
    case AUTH_FOR_EXPE_AFE_NUMB = 'AE';

    /**
     * Authorization number (ANJ)
     *
     * A number which uniquely identifies an authorization.
     */
    case AUTH_NUMB = 'ANJ';

    /**
     * Authorization number for exception to dangerous goods regulations (ALF)
     *
     * Reference number allocated by an authority. This number contains an
     * approval concerning exceptions on the existing dangerous goods regulations.
     */
    case AUTH_NUMB_FOR_EXCE_TO_DANG_GOOD_REGU = 'ALF';

    /**
     * Authorization to meet competition number (AU)
     *
     * A number assigned by a requestor to an offer incoming following request for
     * quote.
     */
    case AUTH_TO_MEET_COMP_NUMB = 'AU';

    /**
     * Bank reference (ACK)
     *
     * Cross reference issued by financial institution.
     */
    case BANK_REFE = 'ACK';

    /**
     * Bank's batch interbank transaction reference number (AAH)
     *
     * Reference number allocated by the bank to a batch of different underlying
     * interbank transactions.
     */
    case BANK_BATC_INTE_TRAN_REFE_NUMB = 'AAH';

    /**
     * Bank's common transaction reference number (AII)
     *
     * Bank's reference number allocated by the bank to different underlying
     * individual transactions.
     */
    case BANK_COMM_TRAN_REFE_NUMB = 'AII';

    /**
     * Bank's documentary procedure reference (ATG)
     *
     * Reference allocated by the bank to a documentary procedure.
     */
    case BANK_DOCU_PROC_REFE = 'ATG';

    /**
     * Bank's individual interbank transaction reference number (AAI)
     *
     * Reference number allocated by the bank to one specific interbank
     * transaction.
     */
    case BANK_INDI_INTE_TRAN_REFE_NUMB = 'AAI';

    /**
     * Bank's individual transaction reference number (AIK)
     *
     * Bank's reference number allocated by the bank to one specific transaction.
     */
    case BANK_INDI_TRAN_REFE_NUMB = 'AIK';

    /**
     * Banker's acceptance (ACX)
     *
     * Reference number for banker's acceptance issued by the accepting financial
     * institution.
     */
    case BANK_ACCE = 'ACX';

    /**
     * Bankruptcy procedure number (AQZ)
     *
     * A number identifying a bankruptcy procedure.
     */
    case BANK_PROC_NUMB = 'AQZ';

    /**
     * Bar coded label serial number (LS)
     *
     * The serial number on a bar code label.
     */
    case BAR_CODE_LABE_SERI_NUMB = 'LS';

    /**
     * Batch number/lot number (BT)
     *
     * [7338] Reference number assigned by manufacturer to a series of similar
     * products or goods produced under similar conditions.
     */
    case BATC_NUMB_NUMB = 'BT';

    /**
     * Battery and accumulator producer registration number (BTP)
     *
     * Registration number of producer of batteries and accumulators.
     */
    case BATT_AND_ACCU_PROD_REGI_NUMB = 'BTP';

    /**
     * Beginning job sequence number (AQN)
     *
     * The number designating the beginning of the job sequence.
     */
    case BEGI_JOB_SEQU_NUMB = 'AQN';

    /**
     * Beginning meter reading actual (BA)
     *
     * Meter reading at the beginning of an invoicing period.
     */
    case BEGI_METE_READ_ACTU = 'BA';

    /**
     * Beginning meter reading estimated (BE)
     *
     * Meter reading at the beginning of an invoicing period where an actual
     * reading is not available.
     */
    case BEGI_METE_READ_ESTI = 'BE';

    /**
     * Beneficiary's bank reference (AFS)
     *
     * Reference number of the beneficiary's bank.
     */
    case BENE_BANK_REFE = 'AFS';

    /**
     * Beneficiary's reference (AFO)
     *
     * Reference of the beneficiary.
     */
    case BENE_REFE = 'AFO';

    /**
     * Bid number (BD)
     *
     * Number assigned by a submitter of a bid to his bid.
     */
    case BID_NUMB = 'BD';

    /**
     * Bill of lading number (BM)
     *
     * Reference number assigned to a bill of lading, see: 1001 = 705.
     */
    case BILL_OF_LADI_NUMB = 'BM';

    /**
     * Bill of quantities number (AFX)
     *
     * Reference number assigned to a bill of quantities.
     */
    case BILL_OF_QUAN_NUMB = 'AFX';

    /**
     * Blanket order number (BO)
     *
     * Reference number assigned by the order issuer to a blanket order.
     */
    case BLAN_ORDE_NUMB = 'BO';

    /**
     * Blended with number (BW)
     *
     * The batch/lot/package number a product is blended with.
     */
    case BLEN_WITH_NUMB = 'BW';

    /**
     * Book number (ART)
     *
     * A number assigned to identify a book.
     */
    case BOOK_NUMB = 'ART';

    /**
     * Bordereau number (AFC)
     *
     * Reference number assigned to a bordereau, see: 1001 = 787.
     */
    case BORD_NUMB = 'AFC';

    /**
     * Broker or sales office number (BR)
     *
     * A number that identifies a broker or sales office.
     */
    case BROK_OR_SALE_OFFI_NUMB = 'BR';

    /**
     * Broker reference 1 (ADU)
     *
     * First reference of a broker.
     */
    case BROK_REFE = 'ADU';

    /**
     * Budget chapter (ASD)
     *
     * A reference to the chapter in a budget.
     */
    case BUDG_CHAP = 'ASD';

    /**
     * Bureau signing (statement reference) (ADI)
     *
     * A statement reference that identifies a bureau signing.
     */
    case BURE_SIGN_STAT_REFE = 'ADI';

    /**
     * Buyer's catalogue number (AMW)
     *
     * Identification of a catalogue maintained by a buyer.
     */
    case BUYE_CATA_NUMB = 'AMW';

    /**
     * Buyer's contract number (BC)
     *
     * Reference number assigned by buyer to a contract.
     */
    case BUYE_CONT_NUMB = 'BC';

    /**
     * Buyer's debtor number (DB)
     *
     * Reference number assigned to a debtor.
     */
    case BUYE_DEBT_NUMB = 'DB';

    /**
     * Buyer's fund number (AWW)
     *
     * A reference number indicating the fund number used by the buyer.
     */
    case BUYE_FUND_NUMB = 'AWW';

    /**
     * Buyer's item number (ADA)
     *
     * [7304] Reference number assigned by the buyer to an item.
     */
    case BUYE_ITEM_NUMB = 'ADA';

    /**
     * CAD file layer convention (ANF)
     *
     * Reference number identifying a layer convention for a file in a Computer
     * Aided Design (CAD) environment.
     */
    case CAD_FILE_LAYE_CONV = 'ANF';

    /**
     * Cadastro Geral do Contribuinte (CGC) (ASW)
     *
     * Brazilian taxpayer number.
     */
    case CADA_GERA_DO_CONT_CGC = 'ASW';

    /**
     * Calendar (AOJ)
     *
     * A calendar reference number.
     */
    case CALENDAR = 'AOJ';

    /**
     * Call off order number (COF)
     *
     * A number that identifies a call off order.
     */
    case CALL_OFF_ORDE_NUMB = 'COF';

    /**
     * Canadian excise entry number (AMN)
     *
     * An excise entry number assigned by the Canadian Customs.
     */
    case CANA_EXCI_ENTR_NUMB = 'AMN';

    /**
     * Cargo acceptance order reference number (ACA)
     *
     * Reference assigned to the cargo acceptance order.
     */
    case CARG_ACCE_ORDE_REFE_NUMB = 'ACA';

    /**
     * Cargo control number (XC)
     *
     * Reference used to identify and control a carrier and consignment from
     * initial entry into a country until release of the cargo by Customs.
     */
    case CARG_CONT_NUMB = 'XC';

    /**
     * Cargo manifest number (AFB)
     *
     * [1037] Reference number assigned to a cargo manifest.
     */
    case CARG_MANI_NUMB = 'AFB';

    /**
     * Carrier's agent reference number (AAY)
     *
     * Reference number assigned by the carriers agent to a transaction.
     */
    case CARR_AGEN_REFE_NUMB = 'AAY';

    /**
     * Carrier's reference number (CN)
     *
     * Reference number assigned by carrier to a consignment.
     */
    case CARR_REFE_NUMB = 'CN';

    /**
     * Case number (AMH)
     *
     * Number assigned to a case.
     */
    case CASE_NUMB = 'AMH';

    /**
     * Case of need party's reference (ANO)
     *
     * Reference number of the case of need party.
     */
    case CASE_OF_NEED_PART_REFE = 'ANO';

    /**
     * Catalogue sequence number (AKS)
     *
     * A number which uniquely identifies an item within a catalogue according to
     * a standard numbering system.
     */
    case CATA_SEQU_NUMB = 'AKS';

    /**
     * Catastrophe number (ADG)
     *
     * A number that identifies a catastrophe.
     */
    case CATA_NUMB = 'ADG';

    /**
     * Category of work reference (AWH)
     *
     * A reference identifying a category of work.
     */
    case CATE_OF_WORK_REFE = 'AWH';

    /**
     * CD-ROM (ASY)
     *
     * Identity number of the Compact Disk Read Only Memory (CD-ROM).
     */
    case CDROM = 'ASY';

    /**
     * Cedent's claim number (APD)
     *
     * To identify the number assigned to the claim by the ceding company.
     */
    case CEDE_CLAI_NUMB = 'APD';

    /**
     * Ceding company (CEC)
     *
     * Company selling obligations to a third party.
     */
    case CEDI_COMP = 'CEC';

    /**
     * Ceiling formula reference number (APJ)
     *
     * The reference number which identifies a formula for determining a ceiling.
     */
    case CEIL_FORM_REFE_NUMB = 'APJ';

    /**
     * Central secretariat log number (AQE)
     *
     * The reference log number assigned by the central secretariat for the Data
     * Maintenance Request (DMR).
     */
    case CENT_SECR_LOG_NUMB = 'AQE';

    /**
     * Central secretariat log number, child Data Maintenance Request (DMR) (AQG)
     *
     * The reference log number assigned by the central secretariat for the child
     * Data Maintenance Request (DMR).
     */
    case CENT_SECR_LOG_NUMB_CHIL_DATA_MAIN_REQU_DMR = 'AQG';

    /**
     * Central secretariat log number, parent Data Maintenance Request (DMR) (AQF)
     *
     * The reference log number assigned by the central secretariat for the parent
     * Data Maintenance Request (DMR).
     */
    case CENT_SECR_LOG_NUMB_PARE_DATA_MAIN_REQU_DMR = 'AQF';

    /**
     * Certificate of conformity (AID)
     *
     * Certificate certifying the conformity to predefined definitions.
     */
    case CERT_OF_CONF = 'AID';

    /**
     * Chamber of Commerce registration number (AHO)
     *
     * The registration number by which a company/organization is known to the
     * Chamber of Commerce.
     */
    case CHAM_OF_COMM_REGI_NUMB = 'AHO';

    /**
     * Charge card account number (AIU)
     *
     * Number to identify charge card account.
     */
    case CHAR_CARD_ACCO_NUMB = 'AIU';

    /**
     * Charges note document attachment indicator (CNO)
     *
     * [1070] Indication that a charges note has been established and attached to
     * a transport contract document or not.
     */
    case CHAR_NOTE_DOCU_ATTA_INDI = 'CNO';

    /**
     * Checking number (CKN)
     *
     * Number assigned by checking party to one specific check action.
     */
    case CHEC_NUMB = 'CKN';

    /**
     * Cheque number (CK)
     *
     * Unique number assigned to one specific cheque.
     */
    case CHEQ_NUMB = 'CK';

    /**
     * Circular publication number (AJF)
     *
     * A number specifying a circular publication.
     */
    case CIRC_PUBL_NUMB = 'AJF';

    /**
     * Civil action number (AAX)
     *
     * A reference number identifying the civil action.
     */
    case CIVI_ACTI_NUMB = 'AAX';

    /**
     * Clave Unica de Identificacion Tributaria (CUIT) (ATU)
     *
     * Tax identification number in Argentina.
     */
    case CLAV_UNIC_DE_IDEN_TRIB_CUIT = 'ATU';

    /**
     * Clearing reference (ANX)
     *
     * Reference allocated by a clearing procedure.
     */
    case CLEA_REFE = 'ANX';

    /**
     * Cold roll number (ACQ)
     *
     * Number attributed to a cold roll coil.
     */
    case COLD_ROLL_NUMB = 'ACQ';

    /**
     * Collecting bank's reference (ANP)
     *
     * Reference number of the collecting bank.
     */
    case COLL_BANK_REFE = 'ANP';

    /**
     * Collection advice document identifier (ACN)
     *
     * [1030] Reference number to identify a collection advice document.
     */
    case COLL_ADVI_DOCU_IDEN = 'ACN';

    /**
     * Collection instrument number (ATN)
     *
     * To identify the number of an instrument used to remit funds to a
     * beneficiary.
     */
    case COLL_INST_NUMB = 'ATN';

    /**
     * Collection reference (AUD)
     *
     * A reference identifying a collection.
     */
    case COLL_REFE = 'AUD';

    /**
     * Commercial account summary reference number (APQ)
     *
     * A reference number identifying a commercial account summary.
     */
    case COMM_ACCO_SUMM_REFE_NUMB = 'APQ';

    /**
     * Commodity number (AED)
     *
     * A number that identifies a commodity.
     */
    case COMM_NUMB = 'AED';

    /**
     * Common transaction reference number (AIH)
     *
     * Reference number applicable to different underlying individual
     * transactions.
     */
    case COMM_TRAN_REFE_NUMB = 'AIH';

    /**
     * Companies Registry Office (CRO) number (ARC)
     *
     * Identifies the reference number assigned by the Companies Registry Office
     * (CRO).
     */
    case COMP_REGI_OFFI_CRO_NUMB = 'ARC';

    /**
     * Company / syndicate reference 1 (ADJ)
     *
     * First reference of a company/syndicate.
     */
    case COMP_SYND_REFE = 'ADJ';

    /**
     * Company issued equipment ID (AGP)
     *
     * Owner/operator, non-government issued equipment reference number.
     */
    case COMP_ISSU_EQUI_ID = 'AGP';

    /**
     * Company trading account number (AWX)
     *
     * A reference number identifying a company trading account.
     */
    case COMP_TRAD_ACCO_NUMB = 'AWX';

    /**
     * Company/place registration number (XA)
     *
     * Company registration and place as legally required.
     */
    case COMP_REGI_NUMB = 'XA';

    /**
     * Completed units payment request reference (ANB)
     *
     * A reference to a payment request for completed units.
     */
    case COMP_UNIT_PAYM_REQU_REFE = 'ANB';

    /**
     * Compliance code number (AIA)
     *
     * Number assigned to indicate regulatory compliance.
     */
    case COMP_CODE_NUMB = 'AIA';

    /**
     * Condition of purchase document number (CP)
     *
     * Reference number identifying the conditions of purchase relevant to a
     * purchase.
     */
    case COND_OF_PURC_DOCU_NUMB = 'CP';

    /**
     * Condition of sale document number (CS)
     *
     * Reference number identifying the conditions of sale relevant to a sale.
     */
    case COND_OF_SALE_DOCU_NUMB = 'CS';

    /**
     * Connected location (AWN)
     *
     * Reference of a connected location.
     */
    case CONN_LOCA = 'AWN';

    /**
     * Connecting point to central grid (AUV)
     *
     * Reference to a connecting point to a central grid.
     */
    case CONN_POIN_TO_CENT_GRID = 'AUV';

    /**
     * Consignee's further order (CFE)
     *
     * Reference of an order given by the consignee after departure of the means
     * of transport.
     */
    case CONS_FURT_ORDE = 'CFE';

    /**
     * Consignee's invoice number (ALK)
     *
     * The invoice number assigned by a consignee.
     */
    case CONS_INVO_NUMB = 'ALK';

    /**
     * Consignee's order number (CG)
     *
     * A number that identifies a consignee's order.
     */
    case CONS_ORDE_NUMB = 'CG';

    /**
     * Consignee's reference (ANT)
     *
     * Reference number of the consignee.
     */
    case CONS_REFE = 'ANT';

    /**
     * Consignment contract number (AXP)
     *
     * Reference number identifying a consignment contract.
     */
    case CONS_CONT_NUMB = 'AXP';

    /**
     * Consignment identifier, carrier assigned (BN)
     *
     * [1016] Reference number assigned by a carrier of its agent to identify a
     * specific consignment such as a booking reference number when cargo space is
     * reserved prior to loading.
     */
    case CONS_IDEN_CARR_ASSI = 'BN';

    /**
     * Consignment identifier, consignee assigned (AAO)
     *
     * [1362] Reference number assigned by the consignee to identify a particular
     * consignment.
     */
    case CONS_IDEN_CONS_ASSI = 'AAO';

    /**
     * Consignment identifier, freight forwarder assigned (FF)
     *
     * [1460] Reference number assigned by the freight forwarder to identify a
     * particular consignment.
     */
    case CONS_IDEN_FREI_FORW_ASSI = 'FF';

    /**
     * Consignment information (AVL)
     *
     * Code identifying that the reference number given applies to the consignment
     * information segment group in the referred message .
     */
    case CONS_INFO = 'AVL';

    /**
     * Consignment receipt identifier (REN)
     *
     * [1150] Reference number assigned to identify a consignment upon its arrival
     * at its destination.
     */
    case CONS_RECE_IDEN = 'REN';

    /**
     * Consignment stock contract (AUF)
     *
     * Reference identifying a consignment stock contract.
     */
    case CONS_STOC_CONT = 'AUF';

    /**
     * Consolidated orders' reference (AUP)
     *
     * A reference number to identify orders which have been, or shall be
     * consolidated.
     */
    case CONS_ORDE_REFE = 'AUP';

    /**
     * Constraint notation (AOX)
     *
     * Identifies a reference to a constraint notation.
     */
    case CONS_NOTA = 'AOX';

    /**
     * Consumption data request number (AMF)
     *
     * A number which identifies a request for consumption data.
     */
    case CONS_DATA_REQU_NUMB = 'AMF';

    /**
     * Container disposition order reference number (AKA)
     *
     * Reference assigned to the empty container disposition order.
     */
    case CONT_DISP_ORDE_REFE_NUMB = 'AKA';

    /**
     * Container operators reference number (CV)
     *
     * Reference number assigned by the party operating or controlling the
     * transport container to a transaction or consignment.
     */
    case CONT_OPER_REFE_NUMB = 'CV';

    /**
     * Container prefix (AKB)
     *
     * The first part of the unique identification of a container formed by an
     * alpha code identifying the owner of the container.
     */
    case CONT_PREF = 'AKB';

    /**
     * Container work order reference number (ADO)
     *
     * Reference number assigned by the principal to the work order for a (set of)
     * container(s).
     */
    case CONT_WORK_ORDE_REFE_NUMB = 'ADO';

    /**
     * Container/equipment receipt number (ER)
     *
     * Number of the Equipment Interchange Receipt issued for full or empty
     * equipment received.
     */
    case CONT_RECE_NUMB = 'ER';

    /**
     * Contract breakdown reference (APR)
     *
     * A reference which identifies a specific breakdown of a contract.
     */
    case CONT_BREA_REFE = 'APR';

    /**
     * Contract document addendum identifier (AAD)
     *
     * [1318] Reference number to identify an addendum to a contract.
     */
    case CONT_DOCU_ADDE_IDEN = 'AAD';

    /**
     * Contract number (CT)
     *
     * [1296] Reference number of a contract concluded between parties.
     */
    case CONT_NUMB = 'CT';

    /**
     * Contract party reference number (AGB)
     *
     * Reference number assigned to a party for a particular contract.
     */
    case CONT_PART_REFE_NUMB = 'AGB';

    /**
     * Contractor registration number (APS)
     *
     * A reference number used to identify a contractor.
     */
    case CONT_REGI_NUMB = 'APS';

    /**
     * Contractor request reference (APO)
     *
     * Reference identifying a request made by a contractor.
     */
    case CONT_REQU_REFE = 'APO';

    /**
     * Converted Postgiro number (ATO)
     *
     * To identify the reference number of a giro payment having been converted to
     * a Postgiro account.
     */
    case CONV_POST_NUMB = 'ATO';

    /**
     * Cooperation contract number (CZ)
     *
     * Number issued by a party concerned given to a contract on cooperation of
     * two or more parties.
     */
    case COOP_CONT_NUMB = 'CZ';

    /**
     * Cost account (AOU)
     *
     * A cost control account reference.
     */
    case COST_ACCO = 'AOU';

    /**
     * Cost accounting document (CAY)
     *
     * The reference to a cost accounting document.
     */
    case COST_ACCO_DOCU = 'CAY';

    /**
     * Cost centre (AWE)
     *
     * A number identifying a cost centre.
     */
    case COST_CENT = 'AWE';

    /**
     * Cost centre alignment number (ATP)
     *
     * Number used in the financial management process to align cost allocations.
     */
    case COST_CENT_ALIG_NUMB = 'ATP';

    /**
     * Costa Rican judicial number (ARD)
     *
     * A number assigned by the government to a business in Costa Rica.
     */
    case COST_RICA_JUDI_NUMB = 'ARD';

    /**
     * Credit memo number (CM)
     *
     * Reference number assigned by issuer to a credit memo.
     */
    case CRED_MEMO_NUMB = 'CM';

    /**
     * Credit note number (CD)
     *
     * [1113] Reference number assigned to a credit note.
     */
    case CRED_NOTE_NUMB = 'CD';

    /**
     * Credit rating agency's reference number (AGH)
     *
     * Reference number assigned by a credit rating agency to a debtor.
     */
    case CRED_RATI_AGEN_REFE_NUMB = 'AGH';

    /**
     * Credit reference number (ANV)
     *
     * The reference number of a credit instruction.
     */
    case CRED_REFE_NUMB = 'ANV';

    /**
     * Current invoice number (OH)
     *
     * Reference number identifying the current invoice.
     */
    case CURR_INVO_NUMB = 'OH';

    /**
     * Customer catalogue number (CH)
     *
     * Number identifying a catalogue for customer's usage.
     */
    case CUST_CATA_NUMB = 'CH';

    /**
     * Customer material specification number (ACJ)
     *
     * Number for a material specification given by customer.
     */
    case CUST_MATE_SPEC_NUMB = 'ACJ';

    /**
     * Customer process specification number (AEF)
     *
     * Retrieval number for a process specification defined by customer.
     */
    case CUST_PROC_SPEC_NUMB = 'AEF';

    /**
     * Customer reference number (CR)
     *
     * Reference number assigned by the customer to a transaction.
     */
    case CUST_REFE_NUMB = 'CR';

    /**
     * Customer reference number assigned to previous balance of payment
     * information (ALC)
     *
     * Identification number of the previous balance of payments information from
     * customer message.
     */
    case CUST_REFE_NUMB_ASSI_TO_PREV_BALA_OF_PAYM_INFO = 'ALC';

    /**
     * Customer specification number (AEG)
     *
     * Retrieval number for a specification defined by customer.
     */
    case CUST_SPEC_NUMB = 'AEG';

    /**
     * Customer travel service identifier (AVI)
     *
     * A reference identifying a travel service to a customer.
     */
    case CUST_TRAV_SERV_IDEN = 'AVI';

    /**
     * Customer's common transaction reference number (AIL)
     *
     * Customer's reference number allocated by the customer to different
     * underlying individual transactions.
     */
    case CUST_COMM_TRAN_REFE_NUMB = 'AIL';

    /**
     * Customer's documentary procedure reference (ATH)
     *
     * Reference allocated by a customer to a documentary procedure.
     */
    case CUST_DOCU_PROC_REFE = 'ATH';

    /**
     * Customer's individual transaction reference number (AIJ)
     *
     * Customer's reference number allocated by the customer to one specific
     * transaction.
     */
    case CUST_INDI_TRAN_REFE_NUMB = 'AIJ';

    /**
     * Customer's unit inventory number (AEN)
     *
     * Number assigned by customer to a unique unit for inventory purposes.
     */
    case CUST_UNIT_INVE_NUMB = 'AEN';

    /**
     * Customs binding ruling number (AUQ)
     *
     * Binding ruling number issued by customs.
     */
    case CUST_BIND_RULI_NUMB = 'AUQ';

    /**
     * Customs decision request number (ABG)
     *
     * Reference issued by Customs pertaining to a pending tariff classification
     * decision requested by an importer or agent.
     */
    case CUST_DECI_REQU_NUMB = 'ABG';

    /**
     * Customs guarantee number (ABL)
     *
     * Reference assigned to a Customs guarantee.
     */
    case CUST_GUAR_NUMB = 'ABL';

    /**
     * Customs item number (AFD)
     *
     * Number (1496 in CST) assigned by the declarant to an item.
     */
    case CUST_ITEM_NUMB = 'AFD';

    /**
     * Customs non-binding ruling number (AUR)
     *
     * Non-binding ruling number issued by customs.
     */
    case CUST_NONB_RULI_NUMB = 'AUR';

    /**
     * Customs pre-approval ruling number (AUZ)
     *
     * Pre-approval ruling number issued by Customs.
     */
    case CUST_PREA_RULI_NUMB = 'AUZ';

    /**
     * Customs preference inquiry number (AIP)
     *
     * The number assigned by Customs to a preference inquiry.
     */
    case CUST_PREF_INQU_NUMB = 'AIP';

    /**
     * Customs release code (AHZ)
     *
     * A code associated to a requirement that must be presented to gain the
     * release of goods by Customs.
     */
    case CUST_RELE_CODE = 'AHZ';

    /**
     * Customs tariff number (ABD)
     *
     * (7357) Code number of the goods in accordance with the tariff nomenclature
     * system of classification in use where the Customs declaration is made.
     */
    case CUST_TARI_NUMB = 'ABD';

    /**
     * Customs transhipment number (AIO)
     *
     * Approval number issued by Customs for cargo to be transhipped under Customs
     * control.
     */
    case CUST_TRAN_NUMB = 'AIO';

    /**
     * Customs valuation decision number (ABA)
     *
     * Reference by an importing party to a previous decision made by a Customs
     * administration regarding the valuation of goods.
     */
    case CUST_VALU_DECI_NUMB = 'ABA';

    /**
     * Dangerous Goods information (AVN)
     *
     * Code identifying that the reference number given applies to the dangerous
     * goods information segment group in the referred message.
     */
    case DANG_GOOD_INFO = 'AVN';

    /**
     * Dangerous goods security number (ALG)
     *
     * Reference number allocated by an authority in order to control the
     * dangerous goods on board of a specific means of transport for dangerous
     * goods security purposes.
     */
    case DANG_GOOD_SECU_NUMB = 'ALG';

    /**
     * Dangerous goods transport licence number (ALH)
     *
     * Licence number allocated by an authority as to the permission of carrying
     * dangerous goods by a specific means of transport.
     */
    case DANG_GOOD_TRAN_LICE_NUMB = 'ALH';

    /**
     * Data structure tag (AQD)
     *
     * The tag assigned to a data structure.
     */
    case DATA_STRU_TAG = 'AQD';

    /**
     * Debit account number (DAN)
     *
     * Reference number assigned by issuer to a debit account.
     */
    case DEBI_ACCO_NUMB = 'DAN';

    /**
     * Debit card number (AAF)
     *
     * A reference number identifying a debit card.
     */
    case DEBI_CARD_NUMB = 'AAF';

    /**
     * Debit letter number (CED)
     *
     * Reference number identifying the letter of debit document.
     */
    case DEBI_LETT_NUMB = 'CED';

    /**
     * Debit note number (DL)
     *
     * [1117] Reference number assigned by issuer to a debit note.
     */
    case DEBI_NOTE_NUMB = 'DL';

    /**
     * Debit reference number (AOI)
     *
     * The reference number of a debit instruction.
     */
    case DEBI_REFE_NUMB = 'AOI';

    /**
     * Debtor's reference number (AHM)
     *
     * Reference number of the party who owes an amount of money.
     */
    case DEBT_REFE_NUMB = 'AHM';

    /**
     * Declarant's Customs identity number (ABP)
     *
     * Reference to the party whose posted bond or security is being declared in
     * order to accept responsibility for a goods declaration and the applicable
     * duties and taxes.
     */
    case DECL_CUST_IDEN_NUMB = 'ABP';

    /**
     * Declarant's reference number (ABE)
     *
     * Unique reference number assigned to a document or a message by the
     * declarant for identification purposes.
     */
    case DECL_REFE_NUMB = 'ABE';

    /**
     * Defense priorities allocation system priority rating (AJQ)
     *
     * A reference indicating a priority rating assigned to allocate resources for
     * defense purchases.
     */
    case DEFE_PRIO_ALLO_SYST_PRIO_RATI = 'AJQ';

    /**
     * Deferment approval number (DA)
     *
     * Number assigned by authorities to a party to approve deferment of payment
     * of tax or duties.
     */
    case DEFE_APPR_NUMB = 'DA';

    /**
     * Delivery note number (DQ)
     *
     * [1033] Reference number assigned by the issuer to a delivery note.
     */
    case DELI_NOTE_NUMB = 'DQ';

    /**
     * Delivery number (transport) (AEL)
     *
     * Reference number by which a haulier/carrier will announce himself at the
     * container terminal or depot when delivering equipment.
     */
    case DELI_NUMB_TRAN = 'AEL';

    /**
     * Delivery order number (AAJ)
     *
     * Reference number assigned by issuer to a delivery order.
     */
    case DELI_ORDE_NUMB = 'AAJ';

    /**
     * Delivery route reference (AUS)
     *
     * A reference to the route of the delivery.
     */
    case DELI_ROUT_REFE = 'AUS';

    /**
     * Delivery schedule number (AAN)
     *
     * Reference number assigned by buyer to a delivery schedule.
     */
    case DELI_SCHE_NUMB = 'AAN';

    /**
     * Delivery verification certificate (AGL)
     *
     * Formal identification of delivery verification certificate which is a
     * formal document from Customs etc. confirming that physical goods have been
     * delivered. It may be needed to support a tax reclaim based on an invoice.
     */
    case DELI_VERI_CERT = 'AGL';

    /**
     * Department (AOQ)
     *
     * Section of an organisation.
     */
    case DEPARTMENT = 'AOQ';

    /**
     * Department number (AMV)
     *
     * Number assigned to a department within an organization.
     */
    case DEPA_NUMB = 'AMV';

    /**
     * Department of transportation bond number (AIB)
     *
     * Number of a bond assigned by the department of transportation.
     */
    case DEPA_OF_TRAN_BOND_NUMB = 'AIB';

    /**
     * Deposit reference number (ANL)
     *
     * A reference number identifying a deposit.
     */
    case DEPO_REFE_NUMB = 'ANL';

    /**
     * Despatch advice number (AAK)
     *
     * [1035] Reference number assigned by issuing party to a despatch advice.
     */
    case DESP_ADVI_NUMB = 'AAK';

    /**
     * Despatch note (post parcels) number (AEZ)
     *
     * (1128) Reference number assigned to a despatch note (post parcels), see:
     * 1001 = 750.
     */
    case DESP_NOTE_POST_PARC_NUMB = 'AEZ';

    /**
     * Despatch note document identifier (AAU)
     *
     * [1128] Reference number to identify a Despatch Note.
     */
    case DESP_NOTE_DOCU_IDEN = 'AAU';

    /**
     * Direct debit reference (AKJ)
     *
     * Reference number assigned to the direct debit operation.
     */
    case DIRE_DEBI_REFE = 'AKJ';

    /**
     * Direct payment valuation number (AFT)
     *
     * Reference number assigned to a direct payment valuation.
     */
    case DIRE_PAYM_VALU_NUMB = 'AFT';

    /**
     * Direct payment valuation request number (AFU)
     *
     * Reference number assigned to a direct payment valuation request.
     */
    case DIRE_PAYM_VALU_REQU_NUMB = 'AFU';

    /**
     * Dispensation reference (ASA)
     *
     * A reference number assigned to an official exemption from a law or
     * obligation.
     */
    case DISP_REFE = 'ASA';

    /**
     * Dispute number (AGG)
     *
     * Reference number to a dispute notice.
     */
    case DISP_NUMB = 'AGG';

    /**
     * Distributor invoice number (DI)
     *
     * Reference number assigned by issuer to a distributor invoice.
     */
    case DIST_INVO_NUMB = 'DI';

    /**
     * Dock receipt number (DR)
     *
     * Number of the cargo receipt submitted when cargo is delivered to a marine
     * terminal.
     */
    case DOCK_RECE_NUMB = 'DR';

    /**
     * Docket number (AAW)
     *
     * A reference number identifying the docket.
     */
    case DOCK_NUMB = 'AAW';

    /**
     * Document identifier (DM)
     *
     * [1004] Reference number identifying a specific document.
     */
    case DOCU_IDEN = 'DM';

    /**
     * Document line identifier (LI)
     *
     * [1156] To identify a line of a document.
     */
    case DOCU_LINE_IDEN = 'LI';

    /**
     * Document page identifier (ARO)
     *
     * [1212] To identify a page number.
     */
    case DOCU_PAGE_IDEN = 'ARO';

    /**
     * Document reference, internal (CAW)
     *
     * Internal reference to a document.
     */
    case DOCU_REFE_INTE = 'CAW';

    /**
     * Document reference, original (AWR)
     *
     * The original reference of a document.
     */
    case DOCU_REFE_ORIG = 'AWR';

    /**
     * Document volume number (ARS)
     *
     * The number of a document volume.
     */
    case DOCU_VOLU_NUMB = 'ARS';

    /**
     * Documentary credit amendment number (AWC)
     *
     * Number of the amendment of the documentary credit.
     */
    case DOCU_CRED_AMEN_NUMB = 'AWC';

    /**
     * Documentary credit identifier (AAC)
     *
     * [1172] Reference number to identify a documentary credit.
     */
    case DOCU_CRED_IDEN = 'AAC';

    /**
     * Documentary payment reference (AOA)
     *
     * Reference of the documentary payment.
     */
    case DOCU_PAYM_REFE = 'AOA';

    /**
     * Domestic flight number (AGQ)
     *
     * Airline flight number assigned to a flight originating and terminating
     * within the same country.
     */
    case DOME_FLIG_NUMB = 'AGQ';

    /**
     * Domestic inventory management code (ALB)
     *
     * Code to identify the management of domestic inventory.
     */
    case DOME_INVE_MANA_CODE = 'ALB';

    /**
     * Drawee's reference (ANN)
     *
     * Reference number of the drawee.
     */
    case DRAW_REFE = 'ANN';

    /**
     * Drawing list number (AEQ)
     *
     * Reference number identifying a drawing list.
     */
    case DRAW_LIST_NUMB = 'AEQ';

    /**
     * Drawing number (AAL)
     *
     * Reference number identifying a specific product drawing.
     */
    case DRAW_NUMB = 'AAL';

    /**
     * Dun and Bradstreet Canada's 8 digit Standard Industrial Classification
     * (SIC) code (AQP)
     *
     * Dun and Bradstreet Canada's 8 digit Standard Industrial Classification
     * (SIC) code identifying activities of the company.
     */
    case DUN_AND_BRAD_CANA__DIGI_STAN_INDU_CLAS_SIC_CODE = 'AQP';

    /**
     * Dun and Bradstreet US 8 digit Standard Industrial Classification (SIC) code (AQR)
     *
     * Dun and Bradstreet United States' 8 digit Standard Industrial
     * Classification (SIC) code identifying activities of the company.
     */
    case DUN_AND_BRAD_US__DIGI_STAN_INDU_CLAS_SIC_CODE = 'AQR';

    /**
     * Duty free products receipt authorisation number (ASF)
     *
     * Authorisation number allocated for the receipt of duty free products.
     */
    case DUTY_FREE_PROD_RECE_AUTH_NUMB = 'ASF';

    /**
     * Duty free products security number (ASE)
     *
     * A security number allocated for duty free products.
     */
    case DUTY_FREE_PROD_SECU_NUMB = 'ASE';

    /**
     * Duty memo number (ACY)
     *
     * Reference number assigned by customs to a duty memo.
     */
    case DUTY_MEMO_NUMB = 'ACY';

    /**
     * Economic Operators Registration and Identification Number (EORI) (AVY)
     *
     * Number assigned by an authority to an economic operator.
     */
    case ECON_OPER_REGI_AND_IDEN_NUMB_EORI = 'AVY';

    /**
     * Electrical and electronic equipment producer registration number (EEP)
     *
     * Registration number of producer of electrical and electronic equipment.
     */
    case ELEC_AND_ELEC_EQUI_PROD_REGI_NUMB = 'EEP';

    /**
     * Embargo number (EN)
     *
     * Number assigned to specific goods or a family of goods in a classification
     * of embargo measures.
     */
    case EMBA_NUMB = 'EN';

    /**
     * Embargo permit number (EB)
     *
     * Reference number assigned by issuer to an embargo permit.
     */
    case EMBA_PERM_NUMB = 'EB';

    /**
     * Employer identification number of service bureau (AGS)
     *
     * Reference number assigned by a service/processing bureau to an employer.
     */
    case EMPL_IDEN_NUMB_OF_SERV_BURE = 'AGS';

    /**
     * Employer's identification number (EI)
     *
     * Number issued by an authority to identify an employer.
     */
    case EMPL_IDEN_NUMB = 'EI';

    /**
     * Empty container bill number (AEW)
     *
     * Reference number assigned to an empty container bill, see: 1001 = 708.
     */
    case EMPT_CONT_BILL_NUMB = 'AEW';

    /**
     * End item number (AJU)
     *
     * A number specifying the end item applicable to a subordinate item.
     */
    case END_ITEM_NUMB = 'AJU';

    /**
     * End use authorization number (ABB)
     *
     * Reference issued by a Customs administration authorizing a preferential
     * rate of duty if a product is used for a specified purpose, see: 1001 = 990.
     */
    case END_USE_AUTH_NUMB = 'ABB';

    /**
     * Ending job sequence number (JE)
     *
     * A number that identifies the ending job sequence.
     */
    case ENDI_JOB_SEQU_NUMB = 'JE';

    /**
     * Ending meter reading actual (EA)
     *
     * Meter reading at the end of an invoicing period.
     */
    case ENDI_METE_READ_ACTU = 'EA';

    /**
     * Ending meter reading estimated (EE)
     *
     * Meter reading at the end of an invoicing period where an actual reading is
     * not available.
     */
    case ENDI_METE_READ_ESTI = 'EE';

    /**
     * Enquiry number (AAV)
     *
     * Reference number assigned to an enquiry.
     */
    case ENQU_NUMB = 'AAV';

    /**
     * Entity reference number, previous (AUX)
     *
     * The previous reference number assigned to an entity.
     */
    case ENTI_REFE_NUMB_PREV = 'AUX';

    /**
     * Entry flagging (CAU)
     *
     * Reference to a flagging of entries.
     */
    case ENTR_FLAG = 'CAU';

    /**
     * Entry point assessment log number (AQA)
     *
     * The reference log number assigned by an entry point assessment group for
     * the DMR.
     */
    case ENTR_POIN_ASSE_LOG_NUMB = 'AQA';

    /**
     * Entry point assessment log number, child DMR (AQC)
     *
     * The reference log number assigned by an entry point assessment group for a
     * child Data Maintenance Request (DMR).
     */
    case ENTR_POIN_ASSE_LOG_NUMB_CHIL_DMR = 'AQC';

    /**
     * Entry point assessment log number, parent DMR (AQB)
     *
     * The reference log number assigned by an entry point assessment group for
     * the parent Data Maintenance Request (DMR).
     */
    case ENTR_POIN_ASSE_LOG_NUMB_PARE_DMR = 'AQB';

    /**
     * Equipment number (EQ)
     *
     * Number assigned by the manufacturer to specific equipment.
     */
    case EQUI_NUMB = 'EQ';

    /**
     * Equipment owner reference number (APC)
     *
     * Reference number issued by the owner of the equipment.
     */
    case EQUI_OWNE_REFE_NUMB = 'APC';

    /**
     * Equipment sequence number (SQ)
     *
     * (1492) A temporary reference number identifying a particular piece of
     * equipment within a series of pieces of equipment.
     */
    case EQUI_SEQU_NUMB = 'SQ';

    /**
     * Equipment transport charge number (ACZ)
     *
     * Reference assigned to a specific equipment transportation charge.
     */
    case EQUI_TRAN_CHAR_NUMB = 'ACZ';

    /**
     * Error position (AWL)
     *
     * Reference to the position of an error in a message.
     */
    case ERRO_POSI = 'AWL';

    /**
     * Estimate order reference number (ACV)
     *
     * Reference number assigned by the ordering party of the estimate order.
     */
    case ESTI_ORDE_REFE_NUMB = 'ACV';

    /**
     * ETERMS reference (AOY)
     *
     * Identifies a reference to the ICC (International Chamber of Commerce)
     * ETERMS(tm) repository of electronic commerce trading terms and conditions.
     */
    case ETER_REFE = 'AOY';

    /**
     * Eur 1 certificate number (AEE)
     *
     * Reference number assigned to a Eur 1 certificate.
     */
    case EUR__CERT_NUMB = 'AEE';

    /**
     * European Value Added Tax identification (CAX)
     *
     * Value Added Tax identification number according to European regulation.
     */
    case EURO_VALU_ADDE_TAX_IDEN = 'CAX';

    /**
     * Event reference number (AIV)
     *
     * [1007] Reference number identifying an event.
     */
    case EVEN_REFE_NUMB = 'AIV';

    /**
     * Exceptional transport authorisation number (ATT)
     *
     * Authorisation number for exceptional transport (using specific equipment,
     * out of gauge, materials and/or specific routing).
     */
    case EXCE_TRAN_AUTH_NUMB = 'ATT';

    /**
     * Excess transportation number (ET)
     *
     * (1041) Number assigned to excess transport.
     */
    case EXCE_TRAN_NUMB = 'ET';

    /**
     * Export clearance instruction reference number (ABR)
     *
     * Reference number of the clearance instructions given by the consignor
     * through different means.
     */
    case EXPO_CLEA_INST_REFE_NUMB = 'ABR';

    /**
     * Export control classification number (AVJ)
     *
     * Number identifying the classification of goods covered by an export
     * licence.
     */
    case EXPO_CONT_CLAS_NUMB = 'AVJ';

    /**
     * Export Control Commodity number (ECCN) (AFE)
     *
     * Reference number to relevant item within Commodity Control List covering
     * actual products change functionality.
     */
    case EXPO_CONT_COMM_NUMB_ECCN = 'AFE';

    /**
     * Export declaration (ED)
     *
     * Number assigned by the exporter to his export declaration number submitted
     * to an authority.
     */
    case EXPO_DECL = 'ED';

    /**
     * Export establishment number (AIC)
     *
     * Number to identify export establishment.
     */
    case EXPO_ESTA_NUMB = 'AIC';

    /**
     * Export permit identifier (EX)
     *
     * [1208] Reference number to identify an export licence or permit.
     */
    case EXPO_PERM_IDEN = 'EX';

    /**
     * Export reference number (RF)
     *
     * Reference number given to an export shipment.
     */
    case EXPO_REFE_NUMB = 'RF';

    /**
     * External object reference (ATS)
     *
     * A reference identifying an external object.
     */
    case EXTE_OBJE_REFE = 'ATS';

    /**
     * Federal supply schedule item number (AJV)
     *
     * A number specifying an item listed in a federal supply schedule.
     */
    case FEDE_SUPP_SCHE_ITEM_NUMB = 'AJV';

    /**
     * File conversion journal (ANI)
     *
     * Reference number identifying a journal recording details about conversion
     * operations between file formats.
     */
    case FILE_CONV_JOUR = 'ANI';

    /**
     * File identification number (AQY)
     *
     * A number assigned to identify a file.
     */
    case FILE_IDEN_NUMB = 'AQY';

    /**
     * File line identifier (FI)
     *
     * Number assigned by the file issuer or sender to identify a specific line.
     */
    case FILE_LINE_IDEN = 'FI';

    /**
     * File version number (FV)
     *
     * Number given to a version of an identified file.
     */
    case FILE_VERS_NUMB = 'FV';

    /**
     * Final sequence number (FS)
     *
     * A number that identifies the final sequence.
     */
    case FINA_SEQU_NUMB = 'FS';

    /**
     * Financial cancellation reference number (ATA)
     *
     * Reference number of a financial cancellation.
     */
    case FINA_CANC_REFE_NUMB = 'ATA';

    /**
     * Financial management reference (ALY)
     *
     * A financial management reference.
     */
    case FINA_MANA_REFE = 'ALY';

    /**
     * Financial phase reference (ARW)
     *
     * A reference which identifies a specific financial phase.
     */
    case FINA_PHAS_REFE = 'ARW';

    /**
     * Financial settlement party's reference number (AMX)
     *
     * Reference number of the party who is responsible for the financial
     * settlement.
     */
    case FINA_SETT_PART_REFE_NUMB = 'AMX';

    /**
     * Financial transaction reference number (ANU)
     *
     * Reference number of the financial transaction.
     */
    case FINA_TRAN_REFE_NUMB = 'ANU';

    /**
     * Firm booking reference number (AXE)
     *
     * A reference number identifying a previous firm booking.
     */
    case FIRM_BOOK_REFE_NUMB = 'AXE';

    /**
     * First financial institution's transaction reference (AVA)
     *
     * Identifies the reference given to the individual transaction by the
     * financial institution that is the transaction's point of entry into the
     * interbank transaction chain.
     */
    case FIRS_FINA_INST_TRAN_REFE = 'AVA';

    /**
     * Fiscal number (FC)
     *
     * Tax payer's number. Number assigned to individual persons as well as to
     * corporates by a public institution; this number is different from the VAT
     * registration number.
     */
    case FISC_NUMB = 'FC';

    /**
     * Flat rack container bundle identification number (ATW)
     *
     * Reference number assigned to a bundle of flat rack containers.
     */
    case FLAT_RACK_CONT_BUND_IDEN_NUMB = 'ATW';

    /**
     * Flow reference number (FLW)
     *
     * Number given to a usual sender which has regular expeditions of the same
     * goods, to the same destination, defining all general conditions of the
     * transport.
     */
    case FLOW_REFE_NUMB = 'FLW';

    /**
     * Foreign exchange (FO)
     *
     * Exchange of two currencies at an agreed rate.
     */
    case FORE_EXCH = 'FO';

    /**
     * Foreign exchange contract number (FX)
     *
     * Reference number identifying a foreign exchange contract.
     */
    case FORE_EXCH_CONT_NUMB = 'FX';

    /**
     * Foreign military sales number (AJP)
     *
     * A number specifying a sale to a foreign military.
     */
    case FORE_MILI_SALE_NUMB = 'AJP';

    /**
     * Foreign resident identification number (ASX)
     *
     * Number assigned by a government agency to identify a foreign resident.
     */
    case FORE_RESI_IDEN_NUMB = 'ASX';

    /**
     * Formal report number (ASP)
     *
     * A number uniquely identifying a formal report.
     */
    case FORM_REPO_NUMB = 'ASP';

    /**
     * Formal statement reference (ASH)
     *
     * A reference to a formal statement.
     */
    case FORM_STAT_REFE = 'ASH';

    /**
     * Formula reference number (AXM)
     *
     * The reference number which identifies a formula.
     */
    case FORM_REFE_NUMB = 'AXM';

    /**
     * Forwarding order number (AKT)
     *
     * Reference number assigned to the forwarding order by the ordering customer.
     */
    case FORW_ORDE_NUMB = 'AKT';

    /**
     * Framework Agreement Number (AVV)
     *
     * A reference to an agreement between one or more contracting authorities and
     * one or more economic operators, the purpose of which is to establish the
     * terms governing contracts to be awarded during a given period, in
     * particular with regard to price and, where appropriate, the quantity
     * envisaged.
     */
    case FRAM_AGRE_NUMB = 'AVV';

    /**
     * Free zone identifier (FT)
     *
     * Identifier to specify the territory of a State where any goods introduced
     * are generally regarded, insofar as import duties and taxes are concerned,
     * as being outside the Customs territory and are not subject to usual Customs
     * control (CCC).
     */
    case FREE_ZONE_IDEN = 'FT';

    /**
     * Freight bill number (FN)
     *
     * Reference number assigned by issuing party to a freight bill.
     */
    case FREI_BILL_NUMB = 'FN';

    /**
     * Freight Forwarder number (AHY)
     *
     * An identification code of a Freight Forwarder.
     */
    case FREI_FORW_NUMB = 'AHY';

    /**
     * Functional work group (AOO)
     *
     * A reference to identify a functional group performing work.
     */
    case FUNC_WORK_GROU = 'AOO';

    /**
     * Fund account number (ASQ)
     *
     * Account number of fund.
     */
    case FUND_ACCO_NUMB = 'ASQ';

    /**
     * Fund code number (AHD)
     *
     * Reference number to identify appropriation and branch chargeable for item.
     */
    case FUND_CODE_NUMB = 'AHD';

    /**
     * General cargo consignment reference number (AKR)
     *
     * Reference number identifying a particular general cargo (non-containerised
     * or break bulk) consignment.
     */
    case GENE_CARG_CONS_REFE_NUMB = 'AKR';

    /**
     * General declaration number (GDN)
     *
     * Number of the declaration of incoming goods out of a vessel.
     */
    case GENE_DECL_NUMB = 'GDN';

    /**
     * General order number (OR)
     *
     * Customs number assigned to imported merchandise that has been left
     * unclaimed and subsequently moved to a Customs bonded warehouse for storage.
     */
    case GENE_ORDE_NUMB = 'OR';

    /**
     * General purpose message reference number (APG)
     *
     * A reference number identifying a general purpose message.
     */
    case GENE_PURP_MESS_REFE_NUMB = 'APG';

    /**
     * Goods and Services Tax identification number (AMT)
     *
     * Identifier assigned to an entity by a tax authority for Goods and Services
     * Tax (GST) related purposes.
     */
    case GOOD_AND_SERV_TAX_IDEN_NUMB = 'AMT';

    /**
     * Goods declaration document identifier, Customs (ABT)
     *
     * [1426] Reference number, assigned or accepted by Customs, to identify a
     * goods declaration.
     */
    case GOOD_DECL_DOCU_IDEN_CUST = 'ABT';

    /**
     * Goods declaration number (AAE)
     *
     * Reference number assigned to a goods declaration.
     */
    case GOOD_DECL_NUMB = 'AAE';

    /**
     * Goods item information (AVM)
     *
     * Code identifying that the reference number given applies to the goods item
     * information segment group in the referred message.
     */
    case GOOD_ITEM_INFO = 'AVM';

    /**
     * Government agency reference number (AEA)
     *
     * Coded reference number that pertains to the business of a government
     * agency.
     */
    case GOVE_AGEN_REFE_NUMB = 'AEA';

    /**
     * Government bill of lading (AKH)
     *
     * Bill of lading as defined by the government.
     */
    case GOVE_BILL_OF_LADI = 'AKH';

    /**
     * Government contract number (GC)
     *
     * Number assigned to a specific government/public contract.
     */
    case GOVE_CONT_NUMB = 'GC';

    /**
     * Government quality assurance and control level Number (AMI)
     *
     * A number which identifies the level of quality assurance and control
     * required by the government for an article.
     */
    case GOVE_QUAL_ASSU_AND_CONT_LEVE_NUMB = 'AMI';

    /**
     * Government reference number (GN)
     *
     * A number that identifies a government reference.
     */
    case GOVE_REFE_NUMB = 'GN';

    /**
     * Grid operator's customer reference number (CAZ)
     *
     * A number, assigned by a grid operator, to reference a customer.
     */
    case GRID_OPER_CUST_REFE_NUMB = 'CAZ';

    /**
     * Group accounting (ADT)
     *
     * A number that identifies group accounting.
     */
    case GROU_ACCO = 'ADT';

    /**
     * Group reference number (AST)
     *
     * The reference number identifying a group.
     */
    case GROU_REFE_NUMB = 'AST';

    /**
     * Guarantee number (ATM)
     *
     * Number of a guarantee.
     */
    case GUAR_NUMB = 'ATM';

    /**
     * Handling and movement reference number (AWZ)
     *
     * A reference number identifying a previously transmitted cargo/goods
     * handling and movement message.
     */
    case HAND_AND_MOVE_REFE_NUMB = 'AWZ';

    /**
     * Harmonised system number (HS)
     *
     * Number specifying the goods classification under the Harmonised Commodity
     * Description and Coding System of the Customs Co-operation Council (CCC).
     */
    case HARM_SYST_NUMB = 'HS';

    /**
     * Hash value (AVW)
     *
     * Contains the hash value of a related document.
     */
    case HASH_VALU = 'AVW';

    /**
     * Hastening number (AMD)
     *
     * A number which uniquely identifies a request to hasten an action.
     */
    case HAST_NUMB = 'AMD';

    /**
     * Hot roll number (ACP)
     *
     * Number attributed to a hot roll coil.
     */
    case HOT_ROLL_NUMB = 'ACP';

    /**
     * House bill of lading number (BH)
     *
     * [1039] Reference number assigned to a house bill of lading.
     */
    case HOUS_BILL_OF_LADI_NUMB = 'BH';

    /**
     * House waybill number (HWB)
     *
     * Reference number assigned to a house waybill, see: 1001 = 703.
     */
    case HOUS_WAYB_NUMB = 'HWB';

    /**
     * Hygienic Certificate number, national (AWS)
     *
     * Nationally set Hygienic Certificate number, such as sanitary,
     * epidemiologic.
     */
    case HYGI_CERT_NUMB_NATI = 'AWS';

    /**
     * IATA Cargo Agent CASS Address number (CAS)
     *
     * Code issued by IATA to identify agent locations for CASS billing purposes.
     */
    case IATA_CARG_AGEN_CASS_ADDR_NUMB = 'CAS';

    /**
     * IATA cargo agent code number (ICA)
     *
     * Code issued by IATA identify each IATA Cargo Agent whose name is entered on
     * the Cargo Agency List.
     */
    case IATA_CARG_AGEN_CODE_NUMB = 'ICA';

    /**
     * Image reference (AUI)
     *
     * A reference number identifying an image.
     */
    case IMAG_REFE = 'AUI';

    /**
     * Immediate exportation no. for in bond movement (AFK)
     *
     * A number that identifies the immediate exportation number for an in bond
     * movement.
     */
    case IMME_EXPO_NO_FOR_IN_BOND_MOVE = 'AFK';

    /**
     * Immediate transportation no. for in bond movement (AFI)
     *
     * A number that identifies immediate transportation for in bond movement.
     */
    case IMME_TRAN_NO_FOR_IN_BOND_MOVE = 'AFI';

    /**
     * Implementation version number (AOZ)
     *
     * Identifies a version number of an implementation.
     */
    case IMPL_VERS_NUMB = 'AOZ';

    /**
     * Import clearance instruction reference number (ABS)
     *
     * Reference number of the import clearance instructions given by the
     * consignor/consignee through different means.
     */
    case IMPO_CLEA_INST_REFE_NUMB = 'ABS';

    /**
     * Import permit identifier (IP)
     *
     * [1107] Reference number to identify an import licence or permit.
     */
    case IMPO_PERM_IDEN = 'IP';

    /**
     * Importer reference number (ABQ)
     *
     * Reference number assigned by the importer to identify a particular shipment
     * for his own purposes.
     */
    case IMPO_REFE_NUMB = 'ABQ';

    /**
     * Importer's letter of credit reference (AUG)
     *
     * Letter of credit reference issued by importer.
     */
    case IMPO_LETT_OF_CRED_REFE = 'AUG';

    /**
     * Imputation account (ARV)
     *
     * An account to which an amount is to be posted.
     */
    case IMPU_ACCO = 'ARV';

    /**
     * In bond number (IB)
     *
     * Customs assigned number that is used to control the movement of imported
     * cargo prior to its formal Customs clearing.
     */
    case IN_BOND_NUMB = 'IB';

    /**
     * Incorporated legal reference (APA)
     *
     * Identifies a legal reference which is deemed incorporated by reference.
     */
    case INCO_LEGA_REFE = 'APA';

    /**
     * Individual transaction reference number (AIM)
     *
     * Reference number applying to one specific transaction.
     */
    case INDI_TRAN_REFE_NUMB = 'AIM';

    /**
     * Initial sample inspection report number (II)
     *
     * Inspection report number given to the initial sample inspection.
     */
    case INIT_SAMP_INSP_REPO_NUMB = 'II';

    /**
     * Inland transport order number (ADN)
     *
     * Reference number assigned by the principal to the transport order for
     * inland carriage.
     */
    case INLA_TRAN_ORDE_NUMB = 'ADN';

    /**
     * Institut Belgo-Luxembourgeois de Codification (IBLC) number (ATR)
     *
     * An identification number assigned by the Luxembourg National Bank to a
     * business in Luxembourg.
     */
    case INST_BELG_DE_CODI_IBLC_NUMB = 'ATR';

    /**
     * Institute of Security and Future Market Development (ISFMD) serial number (AQX)
     *
     * A number used to identify a public but not publicly traded company.
     */
    case INST_OF_SECU_AND_FUTU_MARK_DEVE_ISFM_SERI_NUMB = 'AQX';

    /**
     * Instruction for returns number (AXB)
     *
     * A reference number identifying a previously communicated instruction for
     * return message.
     */
    case INST_FOR_RETU_NUMB = 'AXB';

    /**
     * Instruction to despatch reference number (AXA)
     *
     * A reference number identifying a previously transmitted instruction to
     * despatch message.
     */
    case INST_TO_DESP_REFE_NUMB = 'AXA';

    /**
     * Insurance certificate reference number (ICE)
     *
     * A number that identifies an insurance certificate reference.
     */
    case INSU_CERT_REFE_NUMB = 'ICE';

    /**
     * Insurance contract reference number (ICO)
     *
     * A number that identifies an insurance contract reference.
     */
    case INSU_CONT_REFE_NUMB = 'ICO';

    /**
     * Insurer assigned reference number (AMM)
     *
     * A unique reference number assigned by the insurer.
     */
    case INSU_ASSI_REFE_NUMB = 'AMM';

    /**
     * Integrated logistic support cross reference number (AMU)
     *
     * Provides the identification of the reference which allows cross referencing
     * of items between different areas of integrated logistics support.
     */
    case INTE_LOGI_SUPP_CROS_REFE_NUMB = 'AMU';

    /**
     * Interchange number new (INN)
     *
     * Number assigned by the interchange sender to identify one specific
     * interchange. This number points to the actual interchange.
     */
    case INTE_NUMB_NEW = 'INN';

    /**
     * Interchange number old (INO)
     *
     * Number assigned by the interchange sender to identify one specific
     * interchange. This number points to the previous interchange.
     */
    case INTE_NUMB_OLD = 'INO';

    /**
     * Intermediary broker (INB)
     *
     * A number that identifies an intermediary broker.
     */
    case INTE_BROK = 'INB';

    /**
     * Internal customer number (IT)
     *
     * Number assigned by a seller, supplier etc. to identify a customer within
     * his enterprise.
     */
    case INTE_CUST_NUMB = 'IT';

    /**
     * Internal data process number (AWG)
     *
     * A number identifying an internal data process.
     */
    case INTE_DATA_PROC_NUMB = 'AWG';

    /**
     * Internal order number (IL)
     *
     * Number assigned to an order for internal handling/follow up.
     */
    case INTE_ORDE_NUMB = 'IL';

    /**
     * Internal vendor number (IA)
     *
     * Number identifying the company-internal vending department/unit.
     */
    case INTE_VEND_NUMB = 'IA';

    /**
     * International assessment log number (AQH)
     *
     * The reference log number assigned to a Data Maintenance Request (DMR)
     * changed in international assessment.
     */
    case INTE_ASSE_LOG_NUMB = 'AQH';

    /**
     * International assessment log number, child Data Maintenance Request (DMR) (AQJ)
     *
     * The reference log number assigned to a Data Maintenance Request (DMR)
     * changed in international assessment that is a child to the current DMR.
     */
    case INTE_ASSE_LOG_NUMB_CHIL_DATA_MAIN_REQU_DMR = 'AQJ';

    /**
     * International assessment log number, parent Data Maintenance Request (DMR) (AQI)
     *
     * The reference log number assigned to a Data Maintenance Request (DMR)
     * changed in international assessment that is a parent to the current DMR.
     */
    case INTE_ASSE_LOG_NUMB_PARE_DATA_MAIN_REQU_DMR = 'AQI';

    /**
     * International flight number (AGR)
     *
     * Airline flight number assigned to a flight originating and terminating
     * across national borders.
     */
    case INTE_FLIG_NUMB = 'AGR';

    /**
     * International Standard Industrial Classification (ISIC) code (AUY)
     *
     * A code specifying an international standard industrial classification.
     */
    case INTE_STAN_INDU_CLAS_ISIC_CODE = 'AUY';

    /**
     * Intra-plant routing (ABV)
     *
     * To define routing within a plant.
     */
    case INTR_ROUT = 'ABV';

    /**
     * Inventory report reference number (API)
     *
     * A reference number identifying an inventory report.
     */
    case INVE_REPO_REFE_NUMB = 'API';

    /**
     * Inventory report request number (AVD)
     *
     * Reference number assigned to a request for an inventory report.
     */
    case INVE_REPO_REQU_NUMB = 'AVD';

    /**
     * Investment reference number (ASB)
     *
     * A reference to a specific investment.
     */
    case INVE_REFE_NUMB = 'ASB';

    /**
     * Invoice document identifier (IV)
     *
     * [1334] Reference number to identify an invoice.
     */
    case INVO_DOCU_IDEN = 'IV';

    /**
     * Invoice number suffix (IS)
     *
     * A number added at the end of an invoice number.
     */
    case INVO_NUMB_SUFF = 'IS';

    /**
     * Invoicing data sheet reference number (APH)
     *
     * A reference number identifying an invoicing data sheet.
     */
    case INVO_DATA_SHEE_REFE_NUMB = 'APH';

    /**
     * Iron charge number (ACO)
     *
     * Number attributed to the iron charge for the production of steel products.
     */
    case IRON_CHAR_NUMB = 'ACO';

    /**
     * Issued prescription identification (AUC)
     *
     * The identification of the issued prescription.
     */
    case ISSU_PRES_IDEN = 'AUC';

    /**
     * Issuing bank's reference (AFR)
     *
     * Reference number of the issuing bank.
     */
    case ISSU_BANK_REFE = 'AFR';

    /**
     * Job number (JB)
     *
     * [1043] Identifies a piece of work.
     */
    case JOB_NUMB = 'JB';

    /**
     * Joint venture reference number (AHN)
     *
     * Reference number assigned to a joint venture agreement.
     */
    case JOIN_VENT_REFE_NUMB = 'AHN';

    /**
     * Judgment number (ATC)
     *
     * A reference number identifying the legal decision.
     */
    case JUDG_NUMB = 'ATC';

    /**
     * Kamer Van Koophandel (KVK) number (ATQ)
     *
     * An identification number assigned by the Dutch Chamber of Commerce to a
     * business in the Netherlands.
     */
    case KAME_VAN_KOOP_KVK_NUMB = 'ATQ';

    /**
     * Laboratory registration number (AHH)
     *
     * Reference number is the official registration number of the laboratory.
     */
    case LABO_REGI_NUMB = 'AHH';

    /**
     * Last received banking status message reference (ATF)
     *
     * Reference number of the latest received banking status message.
     */
    case LAST_RECE_BANK_STAT_MESS_REFE = 'ATF';

    /**
     * Latest accounting entry record reference (AWP)
     *
     * Code identifying the reference of the latest accounting entry record.
     */
    case LATE_ACCO_ENTR_RECO_REFE = 'AWP';

    /**
     * Lease contract reference (AKV)
     *
     * Reference number of the lease contract.
     */
    case LEAS_CONT_REFE = 'AKV';

    /**
     * Letter of credit number (LC)
     *
     * Reference number identifying the letter of credit document.
     */
    case LETT_OF_CRED_NUMB = 'LC';

    /**
     * Lloyd's claims office reference (ADW)
     *
     * A number that identifies a Lloyd's claims office.
     */
    case LLOY_CLAI_OFFI_REFE = 'ADW';

    /**
     * Load planning number (LO)
     *
     * The reference that identifies the load planning number.
     */
    case LOAD_PLAN_NUMB = 'LO';

    /**
     * Loading authorisation identifier (LAN)
     *
     * [4092] Identifier assigned to the loading authorisation granted by the
     * forwarding location e.g. railway or airport, when the consignment is
     * subject to traffic limitations.
     */
    case LOAD_AUTH_IDEN = 'LAN';

    /**
     * Loan (ADC)
     *
     * Reference number for loan allocated by lending financial institution.
     */
    case LOAN = 'ADC';

    /**
     * Local Reference Number (AVZ)
     *
     * Number assigned by a national customs authority to an Entry Summary
     * Declaration.
     */
    case LOCA_REFE_NUMB = 'AVZ';

    /**
     * Lockbox (LB)
     *
     * Type of cash management system offered by financial institutions to provide
     * for collection of customers 'receivables'.
     */
    case LOCKBOX = 'LB';

    /**
     * Loss/event number (ACU)
     *
     * To reference to the unique number that is assigned to each major loss
     * hitting the reinsurance industry.
     */
    case LOSS_NUMB = 'ACU';

    /**
     * Lower number in range (LAR)
     *
     * Lower number in a range of numbers.
     */
    case LOWE_NUMB_IN_RANG = 'LAR';

    /**
     * Mailing reference number (MRN)
     *
     * Identifies the party designated by the importer to receive certain customs
     * correspondence in lieu of its being mailed directly to the importer.
     */
    case MAIL_REFE_NUMB = 'MRN';

    /**
     * Major force program number (AHF)
     *
     * Reference number according to Major Force Program (US).
     */
    case MAJO_FORC_PROG_NUMB = 'AHF';

    /**
     * Mandate Reference (AVS)
     *
     * Reference to a specific mandate given by the relevant party for underlying
     * business or action.
     */
    case MAND_REFE = 'AVS';

    /**
     * Manual processing authority number (AHV)
     *
     * Number allocated to allow the manual processing of an entity.
     */
    case MANU_PROC_AUTH_NUMB = 'AHV';

    /**
     * Manufacturer defined repair rates reference (APW)
     *
     * Reference assigned by a manufacturer to their repair rates.
     */
    case MANU_DEFI_REPA_RATE_REFE = 'APW';

    /**
     * Manufacturer's material safety data sheet number (MSS)
     *
     * A number that identifies a manufacturer's material safety data sheet.
     */
    case MANU_MATE_SAFE_DATA_SHEE_NUMB = 'MSS';

    /**
     * Manufacturer's part number (MF)
     *
     * Reference number assigned by the manufacturer to his product or part.
     */
    case MANU_PART_NUMB = 'MF';

    /**
     * Manufacturing order number (MH)
     *
     * Reference number assigned by manufacturer for a given production quantity
     * of products.
     */
    case MANU_ORDE_NUMB = 'MH';

    /**
     * Manufacturing quality agreement number (AUL)
     *
     * Reference number of a manufacturing quality agreement.
     */
    case MANU_QUAL_AGRE_NUMB = 'AUL';

    /**
     * Marketing plan identification number (MPIN) (AUW)
     *
     * Number identifying a marketing plan.
     */
    case MARK_PLAN_IDEN_NUMB_MPIN = 'AUW';

    /**
     * Marking/label reference (AFF)
     *
     * Reference where marking/label information derives from.
     */
    case MARK_REFE = 'AFF';

    /**
     * Master account number (ASS)
     *
     * A reference number identifying a master account.
     */
    case MAST_ACCO_NUMB = 'ASS';

    /**
     * Master air waybill number (MWB)
     *
     * Reference number assigned to a master air waybill, see: 1001 = 741.
     */
    case MAST_AIR_WAYB_NUMB = 'MWB';

    /**
     * Master bill of lading number (MB)
     *
     * Reference number assigned to a master bill of lading, see: 1001 = 704.
     */
    case MAST_BILL_OF_LADI_NUMB = 'MB';

    /**
     * Master label number (AAT)
     *
     * Identifies the master label number of any package type.
     */
    case MAST_LABE_NUMB = 'AAT';

    /**
     * Master solicitation procedures, terms, and conditions number (AJM)
     *
     * A number indicating a master solicitation containing procedures, terms and
     * conditions.
     */
    case MAST_SOLI_PROC_TERM_AND_COND_NUMB = 'AJM';

    /**
     * Matching of entries, balanced (CAT)
     *
     * Reference to a balanced matching of entries.
     */
    case MATC_OF_ENTR_BALA = 'CAT';

    /**
     * Matching of entries, unbalanced (CAV)
     *
     * Reference to an unbalanced matching of entries.
     */
    case MATC_OF_ENTR_UNBA = 'CAV';

    /**
     * Matured certificate of deposit (ADB)
     *
     * Reference number for certificate of deposit allocated by issuing financial
     * institution.
     */
    case MATU_CERT_OF_DEPO = 'ADB';

    /**
     * Meat cutting plant approval number (AVH)
     *
     * Veterinary licence number allocated by a national authority to a meat
     * cutting plant.
     */
    case MEAT_CUTT_PLAN_APPR_NUMB = 'AVH';

    /**
     * Meat processing establishment registration number (AHS)
     *
     * Registration number allocated to a registered meat packing establishment by
     * the local quarantine and inspection authority.
     */
    case MEAT_PROC_ESTA_REGI_NUMB = 'AHS';

    /**
     * Member number (AGU)
     *
     * Reference number assigned to a person as a member of a group of persons or
     * a service scheme.
     */
    case MEMB_NUMB = 'AGU';

    /**
     * Message batch number (ALL)
     *
     * A number identifying a batch of messages.
     */
    case MESS_BATC_NUMB = 'ALL';

    /**
     * Message design group number (AQL)
     *
     * Reference number for a message design group.
     */
    case MESS_DESI_GROU_NUMB = 'AQL';

    /**
     * Message recipient (MR)
     *
     * A number that identifies the message recipient.
     */
    case MESS_RECI = 'MR';

    /**
     * Message sender (MS)
     *
     * A number that identifies the message sender.
     */
    case MESS_SEND = 'MS';

    /**
     * Meter reading at the beginning of the delivery (AKK)
     *
     * Meter reading at the beginning of the delivery.
     */
    case METE_READ_AT_THE_BEGI_OF_THE_DELI = 'AKK';

    /**
     * Meter reading at the end of delivery (AKL)
     *
     * Meter reading at the end of the delivery.
     */
    case METE_READ_AT_THE_END_OF_DELI = 'AKL';

    /**
     * Meter unit number (MG)
     *
     * Number identifying a unique meter unit.
     */
    case METE_UNIT_NUMB = 'MG';

    /**
     * Metered services consumption report number (AXC)
     *
     * A reference number identifying a previously communicated metered services
     * consumption report.
     */
    case METE_SERV_CONS_REPO_NUMB = 'AXC';

    /**
     * Metering point (AVE)
     *
     * Reference to a metering point.
     */
    case METE_POIN = 'AVE';

    /**
     * Military Interdepartmental Purchase Request (MIPR) number (AJO)
     *
     * A number indicating an interdepartmental purchase request used by the
     * military.
     */
    case MILI_INTE_PURC_REQU_MIPR_NUMB = 'AJO';

    /**
     * Ministerial certificate of homologation (AIE)
     *
     * Certificate of approval for components which are subject to legal
     * restrictions and must be approved by the government.
     */
    case MINI_CERT_OF_HOMO = 'AIE';

    /**
     * Model (ALX)
     *
     * (7242) A reference used to identify a model.
     */
    case MODEL = 'ALX';

    /**
     * Motor vehicle identification number (VT)
     *
     * (8213) Reference identifying a motor vehicle used for transport. Normally
     * is the vehicle registration number.
     */
    case MOTO_VEHI_IDEN_NUMB = 'VT';

    /**
     * Movement reference number (AVX)
     *
     * Number assigned by customs referencing receipt of an Entry Summary
     * Declaration.
     */
    case MOVE_REFE_NUMB = 'AVX';

    /**
     * Municipality assigned business registry number (AAR)
     *
     * A reference number assigned by a municipality to identify a business.
     */
    case MUNI_ASSI_BUSI_REGI_NUMB = 'AAR';

    /**
     * Mutually defined reference number (ZZZ)
     *
     * Number based on party agreement.
     */
    case MUTU_DEFI_REFE_NUMB = 'ZZZ';

    /**
     * Named bank's reference (ANM)
     *
     * Reference number of the named bank.
     */
    case NAME_BANK_REFE = 'ANM';

    /**
     * National government business identification number (ARA)
     *
     * A business identification number which is assigned by a national
     * government.
     */
    case NATI_GOVE_BUSI_IDEN_NUMB = 'ARA';

    /**
     * Net area (AWJ)
     *
     * Reference to an area of a net.
     */
    case NET_AREA = 'AWJ';

    /**
     * Net area supplier reference (AUT)
     *
     * A reference identifying a supplier within a net area.
     */
    case NET_AREA_SUPP_REFE = 'AUT';

    /**
     * Next rental agreement number (AMB)
     *
     * Number to identify the next rental agreement.
     */
    case NEXT_RENT_AGRE_NUMB = 'AMB';

    /**
     * Next rental agreement reason number (ALJ)
     *
     * Number to identify the reason for the next rental agreement.
     */
    case NEXT_RENT_AGRE_REAS_NUMB = 'ALJ';

    /**
     * Nomenclature Activity Classification Economy (NACE) identifier (AQS)
     *
     * A European industry classification code used to identify the activity of a
     * company.
     */
    case NOME_ACTI_CLAS_ECON_NACE_IDEN = 'AQS';

    /**
     * Nomination number (AHG)
     *
     * Reference number assigned by a shipper to a request/ commitment-to-ship on
     * a pipeline system.
     */
    case NOMI_NUMB = 'AHG';

    /**
     * Non-negotiable maritime transport document number (AEX)
     *
     * Reference number assigned to a sea waybill, see: 1001 = 712.
     */
    case NONN_MARI_TRAN_DOCU_NUMB = 'AEX';

    /**
     * Norme Activite Francaise (NAF) identifier (AQT)
     *
     * A French industry classification code assigned by the French government to
     * identify the activity of a company.
     */
    case NORM_ACTI_FRAN_NAF_IDEN = 'AQT';

    /**
     * North American hazardous goods classification number (NA)
     *
     * Reference to materials designated as hazardous for purposes of
     * transportation in North American commerce.
     */
    case NORT_AMER_HAZA_GOOD_CLAS_NUMB = 'NA';

    /**
     * Nota Fiscal (NF)
     *
     * Nota Fiscal is a registration number for shipments / deliveries within
     * Brazil, issued by the local tax authorities and mandated for each shipment.
     */
    case NOTA_FISC = 'NF';

    /**
     * NOTIfication for COLlection number (NOTICOL) (ALZ)
     *
     * A reference assigned by a consignor to a notification document which
     * indicates the availability of goods for collection.
     */
    case NOTI_FOR_COLL_NUMB_NOTI = 'ALZ';

    /**
     * Number of temporary importation document (AGM)
     *
     * Number assigned by customs to identify consignment in transit.
     */
    case NUMB_OF_TEMP_IMPO_DOCU = 'AGM';

    /**
     * Numero de Identificacion Tributaria (NIT) (ARE)
     *
     * A number assigned by the government to a business in some Latin American
     * countries.
     */
    case NUME_DE_IDEN_TRIB_NIT = 'ARE';

    /**
     * Offer number (AAG)
     *
     * (1332) Reference number assigned by issuing party to an offer.
     */
    case OFFE_NUMB = 'AAG';

    /**
     * Order acknowledgement document identifier (AAA)
     *
     * [1018] Reference number identifying the acknowledgement of an order.
     */
    case ORDE_ACKN_DOCU_IDEN = 'AAA';

    /**
     * Order document identifier, buyer assigned (ON)
     *
     * [1022] Identifier assigned by the buyer to an order.
     */
    case ORDE_DOCU_IDEN_BUYE_ASSI = 'ON';

    /**
     * Order number (vendor) (VN)
     *
     * Reference number assigned by supplier to a buyer's purchase order.
     */
    case ORDE_NUMB_VEND = 'VN';

    /**
     * Order shipment grouping reference (CBB)
     *
     * A reference number identifying the grouping of purchase orders into one
     * shipment.
     */
    case ORDE_SHIP_GROU_REFE = 'CBB';

    /**
     * Order status enquiry number (AXD)
     *
     * A reference number to a previously sent order status enquiry.
     */
    case ORDE_STAT_ENQU_NUMB = 'AXD';

    /**
     * Ordering customer consignment reference number (ADL)
     *
     * Reference number assigned to the consignment by the ordering customer.
     */
    case ORDE_CUST_CONS_REFE_NUMB = 'ADL';

    /**
     * Ordering customer's second reference number (AKI)
     *
     * Ordering customer's second reference number.
     */
    case ORDE_CUST_SECO_REFE_NUMB = 'AKI';

    /**
     * Organisation breakdown structure (AOM)
     *
     * A structure reference that identifies the breakdown of an organisation.
     */
    case ORGA_BREA_STRU = 'AOM';

    /**
     * Original certificate number (AIR)
     *
     * Number giving reference to an original certificate number.
     */
    case ORIG_CERT_NUMB = 'AIR';

    /**
     * Original filing number (ARN)
     *
     * A number assigned to the original filing.
     */
    case ORIG_FILI_NUMB = 'ARN';

    /**
     * Original Mandate Reference (AVR)
     *
     * Reference to a specific related original mandate given by the relevant
     * party for underlying business or action in case of reference or mandate
     * change.
     */
    case ORIG_MAND_REFE = 'AVR';

    /**
     * Original purchase order (OP)
     *
     * Reference to the order previously sent.
     */
    case ORIG_PURC_ORDE = 'OP';

    /**
     * Original submitter log number (APX)
     *
     * A control number assigned by the original submitter.
     */
    case ORIG_SUBM_LOG_NUMB = 'APX';

    /**
     * Original submitter, child Data Maintenance Request (DMR) log number (APZ)
     *
     * A Data Maintenance Request (DMR) original submitter's reference log number
     * for a child DMR.
     */
    case ORIG_SUBM_CHIL_DATA_MAIN_REQU_DMR_LOG_NUMB = 'APZ';

    /**
     * Original submitter, parent Data Maintenance Request (DMR) log number (APY)
     *
     * A Data Maintenance Request (DMR) original submitter's reference log number
     * for the parent DMR.
     */
    case ORIG_SUBM_PARE_DATA_MAIN_REQU_DMR_LOG_NUMB = 'APY';

    /**
     * Originator's reference (ABO)
     *
     * A unique reference assigned by the originator.
     */
    case ORIG_REFE = 'ABO';

    /**
     * Outerpackaging unit identification (ACI)
     *
     * Identifying marks on packing units contained within an outermost shipping
     * unit.
     */
    case OUTE_UNIT_IDEN = 'ACI';

    /**
     * Package number (CW)
     *
     * (7070) Reference number identifying a package or carton within a
     * consignment.
     */
    case PACK_NUMB = 'CW';

    /**
     * Packaging specification number (AHA)
     *
     * Reference number of documentation specifying the technical detail of
     * packaging requirements.
     */
    case PACK_SPEC_NUMB = 'AHA';

    /**
     * Packaging unit identification (ACH)
     *
     * Identifying marks on packing units.
     */
    case PACK_UNIT_IDEN = 'ACH';

    /**
     * Packing list number (PK)
     *
     * [1014] Reference number assigned to a packing list.
     */
    case PACK_LIST_NUMB = 'PK';

    /**
     * Packing plant number (AIQ)
     *
     * Number to identify packing establishment.
     */
    case PACK_PLAN_NUMB = 'AIQ';

    /**
     * Paragraph (AJJ)
     *
     * A reference indicating a paragraph cited as the source of information.
     */
    case PARAGRAPH = 'AJJ';

    /**
     * Parent file (AND)
     *
     * Identifies the parent file in a structure of related files.
     */
    case PARE_FILE = 'AND';

    /**
     * Part reference indicator in a drawing (AJA)
     *
     * To designate the number which provides a cross reference between parts
     * contained in a drawing and a parts catalogue.
     */
    case PART_REFE_INDI_IN_A_DRAW = 'AJA';

    /**
     * Partial shipment identifier (AAP)
     *
     * [1310] Identifier of a shipment which is part of an order.
     */
    case PART_SHIP_IDEN = 'AAP';

    /**
     * Party information message reference (ASG)
     *
     * Reference identifying a party information message.
     */
    case PART_INFO_MESS_REFE = 'ASG';

    /**
     * Party reference (AUB)
     *
     * The reference to a party.
     */
    case PART_REFE = 'AUB';

    /**
     * Party sequence number (APM)
     *
     * Reference identifying a party sequence number.
     */
    case PART_SEQU_NUMB = 'APM';

    /**
     * Passenger reservation number (AVF)
     *
     * Number assigned by the travel supplier to identify the passenger
     * reservation.
     */
    case PASS_RESE_NUMB = 'AVF';

    /**
     * Passport number (AIG)
     *
     * Number assigned to a passport.
     */
    case PASS_NUMB = 'AIG';

    /**
     * Password (ASO)
     *
     * Code used for authentication purposes.
     */
    case PASSWORD = 'ASO';

    /**
     * Patron number (ARF)
     *
     * A number assigned by the government to a business in some Latin American
     * countries. Note that "Patron" is a Spanish word, it is not a person who
     * gives financial or other support.
     */
    case PATR_NUMB = 'ARF';

    /**
     * Payee's financial institution account number (PY)
     *
     * Receiving company account number (ACH transfer), check, draft or wire.
     */
    case PAYE_FINA_INST_ACCO_NUMB = 'PY';

    /**
     * Payee's financial institution transit routing No. (RT)
     *
     * RDFI Transit routing number (ACH transfer).
     */
    case PAYE_FINA_INST_TRAN_ROUT_NO = 'RT';

    /**
     * Payee's reference number (AHJ)
     *
     * Reference number of the party to be paid.
     */
    case PAYE_REFE_NUMB = 'AHJ';

    /**
     * Payer's financial institution transit routing No.(ACH transfers) (RR)
     *
     * ODFI (ACH transfer).
     */
    case PAYE_FINA_INST_TRAN_ROUT_NOAC_TRAN = 'RR';

    /**
     * Payment in advance request reference (ANC)
     *
     * A reference to a request for payment in advance.
     */
    case PAYM_IN_ADVA_REQU_REFE = 'ANC';

    /**
     * Payment instalment reference number (APB)
     *
     * A reference number given to a payment instalment to identify a specific
     * instance of payment of a debt which can be paid at specified intervals.
     */
    case PAYM_INST_REFE_NUMB = 'APB';

    /**
     * Payment order number (AEK)
     *
     * A number that identifies a payment order.
     */
    case PAYM_ORDE_NUMB = 'AEK';

    /**
     * Payment plan reference (AMJ)
     *
     * A number which uniquely identifies a payment plan.
     */
    case PAYM_PLAN_REFE = 'AMJ';

    /**
     * Payment reference (PQ)
     *
     * Reference number assigned to a payment.
     */
    case PAYM_REFE = 'PQ';

    /**
     * Payment valuation number (AFY)
     *
     * Reference number assigned to a payment valuation.
     */
    case PAYM_VALU_NUMB = 'AFY';

    /**
     * Payroll deduction advice reference (AXR)
     *
     * A reference number identifying a payroll deduction advice.
     */
    case PAYR_DEDU_ADVI_REFE = 'AXR';

    /**
     * Payroll number (AGZ)
     *
     * Reference number assigned to the payroll of an organisation.
     */
    case PAYR_NUMB = 'AGZ';

    /**
     * Performed prescription identification (AUH)
     *
     * The identification of the prescription that has been carried into effect.
     */
    case PERF_PRES_IDEN = 'AUH';

    /**
     * Person registration number (AVP)
     *
     * A number assigned to an individual.
     */
    case PERS_REGI_NUMB = 'AVP';

    /**
     * Personal identity card number (ARJ)
     *
     * An identity card number assigned to a person.
     */
    case PERS_IDEN_CARD_NUMB = 'ARJ';

    /**
     * Phone number (AWV)
     *
     * A sequence of digits used to call from one telephone line to another in a
     * public telephone network.
     */
    case PHON_NUMB = 'AWV';

    /**
     * Physical inventory recount reference number (ALN)
     *
     * A reference to a re-count of physically held inventory.
     */
    case PHYS_INVE_RECO_REFE_NUMB = 'ALN';

    /**
     * Physical medium (ASZ)
     *
     * Identifies the physical medium.
     */
    case PHYS_MEDI = 'ASZ';

    /**
     * Pick-up sheet number (AWU)
     *
     * Reference number assigned to a pick-up sheet.
     */
    case PICK_SHEE_NUMB = 'AWU';

    /**
     * Picture of a generic product (ASL)
     *
     * Reference identifying a picture of a generic product.
     */
    case PICT_OF_A_GENE_PROD = 'ASL';

    /**
     * Picture of actual product (ASK)
     *
     * Reference identifying the picture of an actual product.
     */
    case PICT_OF_ACTU_PROD = 'ASK';

    /**
     * Pilotage services exemption number (AVO)
     *
     * Number identifying the permit to not use pilotage services.
     */
    case PILO_SERV_EXEM_NUMB = 'AVO';

    /**
     * Pipeline number (AMZ)
     *
     * Number to identify a pipeline.
     */
    case PIPE_NUMB = 'AMZ';

    /**
     * Place of packing approval number (AVQ)
     *
     * Approval Number of the place where goods are packaged.
     */
    case PLAC_OF_PACK_APPR_NUMB = 'AVQ';

    /**
     * Place of positioning reference (AUA)
     *
     * Identifies the reference pertaining to the place of positioning.
     */
    case PLAC_OF_POSI_REFE = 'AUA';

    /**
     * Planning package (AOT)
     *
     * A reference for a planning package of work.
     */
    case PLAN_PACK = 'AOT';

    /**
     * Plant number (PE)
     *
     * A number that identifies a plant.
     */
    case PLAN_NUMB = 'PE';

    /**
     * Plot file (ANH)
     *
     * Reference number indicating that the file is a plot file.
     */
    case PLOT_FILE = 'ANH';

    /**
     * Policy form number (AWI)
     *
     * Number assigned to a policy form.
     */
    case POLI_FORM_NUMB = 'AWI';

    /**
     * Policy number (AKZ)
     *
     * Number assigned to a policy.
     */
    case POLI_NUMB = 'AKZ';

    /**
     * Post-entry reference (AEJ)
     *
     * Reference to a message related to a post-entry.
     */
    case POST_REFE = 'AEJ';

    /**
     * Pre-agreement number (AXN)
     *
     * A reference number identifying a pre-agreement.
     */
    case PREA_NUMB = 'AXN';

    /**
     * Premium rate table (AMO)
     *
     * Identifies the premium rate table.
     */
    case PREM_RATE_TABL = 'AMO';

    /**
     * Presenting bank's reference (ANS)
     *
     * Reference number of the presenting bank.
     */
    case PRES_BANK_REFE = 'ANS';

    /**
     * Previous banking status message reference (ATE)
     *
     * Message reference number of the previous banking status message being
     * responded to.
     */
    case PREV_BANK_STAT_MESS_REFE = 'ATE';

    /**
     * Previous cargo control number (XP)
     *
     * Where a consignment is deconsolidated and/or transferred to the control of
     * another carrier or freight forwarder (e.g. housebill, abstract) this
     * references the previous (e.g. master) cargo control number.
     */
    case PREV_CARG_CONT_NUMB = 'XP';

    /**
     * Previous credit advice reference number (ALD)
     *
     * Reference number of the previous "Credit advice" message.
     */
    case PREV_CRED_ADVI_REFE_NUMB = 'ALD';

    /**
     * Previous delivery instruction number (AIF)
     *
     * The identification of a previous delivery instruction.
     */
    case PREV_DELI_INST_NUMB = 'AIF';

    /**
     * Previous delivery schedule number (ALM)
     *
     * A reference number identifying a previous delivery schedule.
     */
    case PREV_DELI_SCHE_NUMB = 'ALM';

    /**
     * Previous highest schedule number (SH)
     *
     * Number of the latest schedule of a previous period (ODETTE DELINS).
     */
    case PREV_HIGH_SCHE_NUMB = 'SH';

    /**
     * Previous invoice number (OI)
     *
     * Reference number identifying a previously issued invoice.
     */
    case PREV_INVO_NUMB = 'OI';

    /**
     * Previous member number (AGV)
     *
     * Reference number previously assigned to a member.
     */
    case PREV_MEMB_NUMB = 'AGV';

    /**
     * Previous rental agreement number (ALI)
     *
     * Number to identify the previous rental agreement number.
     */
    case PREV_RENT_AGRE_NUMB = 'ALI';

    /**
     * Previous request for metered reading reference number (AMA)
     *
     * Number to identify a previous request for a recording or reading of a
     * measuring device.
     */
    case PREV_REQU_FOR_METE_READ_REFE_NUMB = 'AMA';

    /**
     * Previous scheme/plan number (AGX)
     *
     * Reference number previously assigned to a service scheme or plan.
     */
    case PREV_SCHE_NUMB = 'AGX';

    /**
     * Previous tax control number (ALT)
     *
     * A reference number identifying a previous tax control number.
     */
    case PREV_TAX_CONT_NUMB = 'ALT';

    /**
     * Price list number (PL)
     *
     * Reference number assigned to a price list.
     */
    case PRIC_LIST_NUMB = 'PL';

    /**
     * Price list version number (PI)
     *
     * A number that identifies the version of a price list.
     */
    case PRIC_LIST_VERS_NUMB = 'PI';

    /**
     * Price quote number (PR)
     *
     * Reference number assigned by the seller to a quote.
     */
    case PRIC_QUOT_NUMB = 'PR';

    /**
     * Price variation formula reference number (APK)
     *
     * The reference number which identifies a price variation formula.
     */
    case PRIC_VARI_FORM_REFE_NUMB = 'APK';

    /**
     * Price/sales catalogue response reference number (APF)
     *
     * A reference number identifying a response to a price/sales catalogue.
     */
    case PRIC_CATA_RESP_REFE_NUMB = 'APF';

    /**
     * Primary reference (AES)
     *
     * A number that identifies the primary reference.
     */
    case PRIM_REFE = 'AES';

    /**
     * Prime contractor contract number (PF)
     *
     * Reference number assigned by the client to the contract of the prime
     * contractor.
     */
    case PRIM_CONT_CONT_NUMB = 'PF';

    /**
     * Principal reference number (ACL)
     *
     * A number that identifies the principal reference.
     */
    case PRIN_REFE_NUMB = 'ACL';

    /**
     * Principal's bank reference (ANR)
     *
     * Reference number of the principal's bank.
     */
    case PRIN_BANK_REFE = 'ANR';

    /**
     * Principal's reference (AOH)
     *
     * Reference number of the principal.
     */
    case PRIN_REFE = 'AOH';

    /**
     * Prior contractor registration number (ARY)
     *
     * A previous reference number used to identify a contractor.
     */
    case PRIO_CONT_REGI_NUMB = 'ARY';

    /**
     * Prior Data Universal Number System (DUNS) number (ARB)
     *
     * A previously assigned Data Universal Number System (DUNS) number.
     */
    case PRIO_DATA_UNIV_NUMB_SYST_DUNS_NUMB = 'ARB';

    /**
     * Prior policy number (AKY)
     *
     * The number of the prior policy.
     */
    case PRIO_POLI_NUMB = 'AKY';

    /**
     * Prior purchase order number (PW)
     *
     * Reference number of a purchase order previously sent to the supplier.
     */
    case PRIO_PURC_ORDE_NUMB = 'PW';

    /**
     * Prior trading partner identification number (ASN)
     *
     * Code specifying an identification number previously assigned to a trading
     * partner.
     */
    case PRIO_TRAD_PART_IDEN_NUMB = 'ASN';

    /**
     * Processing plant number (AIS)
     *
     * Number to identify processing plant.
     */
    case PROC_PLAN_NUMB = 'AIS';

    /**
     * Procurement budget number (ALA)
     *
     * A number which uniquely identifies a procurement budget against which
     * commitments or invoices can be allocated.
     */
    case PROC_BUDG_NUMB = 'ALA';

    /**
     * Product certification number (AXO)
     *
     * Number assigned by a governing body (or their agents) to a product which
     * certifies compliance with a standard.
     */
    case PROD_CERT_NUMB = 'AXO';

    /**
     * Product change authority number (AKQ)
     *
     * Number which authorises a change in form, fit or function of a product.
     */
    case PROD_CHAN_AUTH_NUMB = 'AKQ';

    /**
     * Product characteristics directory (AVB)
     *
     * A reference to a product characteristics directory.
     */
    case PROD_CHAR_DIRE = 'AVB';

    /**
     * Product data file number (ASV)
     *
     * The number of a product data file.
     */
    case PROD_DATA_FILE_NUMB = 'ASV';

    /**
     * Product inquiry number (AXF)
     *
     * A reference number identifying a previously communicated product inquiry.
     */
    case PROD_INQU_NUMB = 'AXF';

    /**
     * Product reservation number (AEO)
     *
     * Number assigned by seller to identify reservation of specified products.
     */
    case PROD_RESE_NUMB = 'AEO';

    /**
     * Product sourcing agreement number (AIN)
     *
     * Reference number assigned to a product sourcing agreement.
     */
    case PROD_SOUR_AGRE_NUMB = 'AIN';

    /**
     * Product specification reference number (AXQ)
     *
     * Number assigned by the issuer to his product specification.
     */
    case PROD_SPEC_REFE_NUMB = 'AXQ';

    /**
     * Production code (PC)
     *
     * Number assigned by the manufacturer to a specified article or batch to
     * identify the manufacturing date etc. for subsequent reference.
     */
    case PROD_CODE = 'PC';

    /**
     * Profile number (AMG)
     *
     * Reference number allocated to a discrete set of criteria.
     */
    case PROF_NUMB = 'AMG';

    /**
     * Proforma invoice document identifier (AAB)
     *
     * [1088] Reference number to identify a proforma invoice.
     */
    case PROF_INVO_DOCU_IDEN = 'AAB';

    /**
     * Project number (AEP)
     *
     * Reference number assigned to a project.
     */
    case PROJ_NUMB = 'AEP';

    /**
     * Project specification number (AER)
     *
     * Reference number identifying a project specification.
     */
    case PROJ_SPEC_NUMB = 'AER';

    /**
     * Promotion deal number (PD)
     *
     * Number assigned by a vendor to a special promotion activity.
     */
    case PROM_DEAL_NUMB = 'PD';

    /**
     * Proof of delivery reference number (ASI)
     *
     * A reference number identifying a proof of delivery which is generated by
     * the goods recipient.
     */
    case PROO_OF_DELI_REFE_NUMB = 'ASI';

    /**
     * Proposed purchase order reference number (AUJ)
     *
     * A reference number assigned to a proposed purchase order.
     */
    case PROP_PURC_ORDE_REFE_NUMB = 'AUJ';

    /**
     * Public filing registration number (ARP)
     *
     * A number assigned at the time of registration of a public filing.
     */
    case PUBL_FILI_REGI_NUMB = 'ARP';

    /**
     * Publication issue number (ARM)
     *
     * A number assigned to identify a publication issue.
     */
    case PUBL_ISSU_NUMB = 'ARM';

    /**
     * Purchase for export Customs agreement number (ATB)
     *
     * A number assigned by a Customs authority allowing the purchase of goods
     * free of tax because they are to be exported immediately after the purchase.
     */
    case PURC_FOR_EXPO_CUST_AGRE_NUMB = 'ATB';

    /**
     * Purchase order change number (PP)
     *
     * Reference number assigned by a buyer for a revision of a purchase order.
     */
    case PURC_ORDE_CHAN_NUMB = 'PP';

    /**
     * Purchase order number suffix (PS)
     *
     * A number added at the end of a purchase order number.
     */
    case PURC_ORDE_NUMB_SUFF = 'PS';

    /**
     * Purchase order response number (POR)
     *
     * Reference number assigned by the seller to an order response.
     */
    case PURC_ORDE_RESP_NUMB = 'POR';

    /**
     * Purchaser's request reference (APN)
     *
     * Reference identifying a request made by the purchaser.
     */
    case PURC_REQU_REFE = 'APN';

    /**
     * Purchasing activity clause number (AJC)
     *
     * A number indicating a clause applicable to a purchasing activity.
     */
    case PURC_ACTI_CLAU_NUMB = 'AJC';

    /**
     * Quantity valuation number (AFV)
     *
     * Reference number assigned to a quantity valuation.
     */
    case QUAN_VALU_NUMB = 'AFV';

    /**
     * Quantity valuation request number (AFW)
     *
     * Reference number assigned to a quantity valuation request.
     */
    case QUAN_VALU_REQU_NUMB = 'AFW';

    /**
     * Quarantine/treatment status reference number (AHT)
     *
     * Coded quarantine/treatment status of a container and its cargo and packing
     * materials, generated by a shipping company based upon declarations
     * presented by a shipper.
     */
    case QUAR_STAT_REFE_NUMB = 'AHT';

    /**
     * Quota number (ABJ)
     *
     * Reference number allocated by a government authority to identify a quota.
     */
    case QUOT_NUMB = 'ABJ';

    /**
     * Rail waybill number (WY)
     *
     * The number on a rail waybill.
     */
    case RAIL_WAYB_NUMB = 'WY';

    /**
     * Rail/road routing code (RC)
     *
     * International Western and Eastern European route code used in all rail
     * organizations and specified in the international tariffs (rail tariffs)
     * known by the customers.
     */
    case RAIL_ROUT_CODE = 'RC';

    /**
     * Railway consignment note number (RCN)
     *
     * Reference number assigned to a rail consignment note, see: 1001 = 720.
     */
    case RAIL_CONS_NOTE_NUMB = 'RCN';

    /**
     * Railway wagon number (ACR)
     *
     * (8260) Registered identification initials and numbers of railway wagon.
     * Synonym: Rail car number.
     */
    case RAIL_WAGO_NUMB = 'ACR';

    /**
     * Rate code number (AWA)
     *
     * Number assigned by a buyer to rate a product.
     */
    case RATE_CODE_NUMB = 'AWA';

    /**
     * Rate note number (AHX)
     *
     * Reference assigned to a specific rate.
     */
    case RATE_NOTE_NUMB = 'AHX';

    /**
     * Receiver's file reference number (AOF)
     *
     * File reference number assigned by the receiver.
     */
    case RECE_FILE_REFE_NUMB = 'AOF';

    /**
     * Receiving advice number (ALO)
     *
     * A reference number to a receiving advice.
     */
    case RECE_ADVI_NUMB = 'ALO';

    /**
     * Receiving bank's authorization number (ANW)
     *
     * Authorization number of the receiving bank.
     */
    case RECE_BANK_AUTH_NUMB = 'ANW';

    /**
     * Receiving Bankgiro number (ATJ)
     *
     * Number of the receiving Bankgiro.
     */
    case RECE_BANK_NUMB = 'ATJ';

    /**
     * Receiving party's member identification (AGY)
     *
     * Identification used by the receiving party for a member of a service scheme
     * or group of persons.
     */
    case RECE_PART_MEMB_IDEN = 'AGY';

    /**
     * Reference number assigned by third party (ANK)
     *
     * Reference number assigned by a third party.
     */
    case REFE_NUMB_ASSI_BY_THIR_PART = 'ANK';

    /**
     * Reference number of a request for metered reading (AMC)
     *
     * Number to identify a request for a recording or reading of a measuring
     * device to be taken.
     */
    case REFE_NUMB_OF_A_REQU_FOR_METE_READ = 'AMC';

    /**
     * Reference number quoted on statement (AGN)
     *
     * Reference number quoted on the statement sent to the beneficiary for
     * information purposes.
     */
    case REFE_NUMB_QUOT_ON_STAT = 'AGN';

    /**
     * Reference number to previous message (ACW)
     *
     * Reference number assigned to the message which was previously issued (e.g.
     * in the case of a cancellation, the primary reference of the message to be
     * cancelled will be quoted in this element).
     */
    case REFE_NUMB_TO_PREV_MESS = 'ACW';

    /**
     * Reference to account servicing bank's message (APL)
     *
     * Reference to the account servicing bank's message.
     */
    case REFE_TO_ACCO_SERV_BANK_MESS = 'APL';

    /**
     * Referred product for chemical analysis (AIY)
     *
     * A product number identifying the product which is used for chemical
     * analysis considered valid for a group of products.
     */
    case REFE_PROD_FOR_CHEM_ANAL = 'AIY';

    /**
     * Referred product for mechanical analysis (AIX)
     *
     * A product number identifying the product which is used for mechanical
     * analysis considered valid for a group of products.
     */
    case REFE_PROD_FOR_MECH_ANAL = 'AIX';

    /**
     * Regiristo Federal de Contribuyentes (ARQ)
     *
     * A federal tax identification number assigned by the Mexican tax authority.
     */
    case REGI_FEDE_DE_CONT = 'ARQ';

    /**
     * Registered capital reference (ALV)
     *
     * Registered capital reference of a company.
     */
    case REGI_CAPI_REFE = 'ALV';

    /**
     * Registered contractor activity type (AQU)
     *
     * Reference number identifying the type of registered contractor activity.
     */
    case REGI_CONT_ACTI_TYPE = 'AQU';

    /**
     * Registration number of previous Customs declaration (AEI)
     *
     * Registration number of the Customs declaration lodged for the previous
     * Customs procedure.
     */
    case REGI_NUMB_OF_PREV_CUST_DECL = 'AEI';

    /**
     * Registro Informacion Fiscal (RIF) number (ARG)
     *
     * A number assigned by the government to a business in some Latin American
     * countries.
     */
    case REGI_INFO_FISC_RIF_NUMB = 'ARG';

    /**
     * Registro Unico de Contribuyente (RUC) number (ARH)
     *
     * A number assigned by the government to a business in some Latin American
     * countries.
     */
    case REGI_UNIC_DE_CONT_RUC_NUMB = 'ARH';

    /**
     * Registro Unico Tributario (RUT) (ATV)
     *
     * Tax identification number in Chile.
     */
    case REGI_UNIC_TRIB_RUT = 'ATV';

    /**
     * Reinsurer's claim number (APE)
     *
     * To identify the number assigned to the claim by the reinsurer.
     */
    case REIN_CLAI_NUMB = 'APE';

    /**
     * Related document number (ACE)
     *
     * Reference number identifying a related document.
     */
    case RELA_DOCU_NUMB = 'ACE';

    /**
     * Related party (AWO)
     *
     * Reference of a related party.
     */
    case RELA_PART = 'AWO';

    /**
     * Release number (RE)
     *
     * Reference number assigned to identify a release of a set of rules,
     * conventions, conditions, etc.
     */
    case RELE_NUMB = 'RE';

    /**
     * Remittance advice number (RA)
     *
     * A number that identifies a remittance advice.
     */
    case REMI_ADVI_NUMB = 'RA';

    /**
     * Remitting bank's reference (ANQ)
     *
     * Reference number of the remitting bank.
     */
    case REMI_BANK_REFE = 'ANQ';

    /**
     * Repair data request number (AME)
     *
     * A number which uniquely identifies a request for data about repairs.
     */
    case REPA_DATA_REQU_NUMB = 'AME';

    /**
     * Repair estimate number (ABF)
     *
     * A number identifying a repair estimate.
     */
    case REPA_ESTI_NUMB = 'ABF';

    /**
     * Replaced meter unit number (AMK)
     *
     * Number identifying the replaced meter unit.
     */
    case REPL_METE_UNIT_NUMB = 'AMK';

    /**
     * Replacing part number (ABM)
     *
     * New part number which replaces the existing part number.
     */
    case REPL_PART_NUMB = 'ABM';

    /**
     * Replenishment purchase order number (AFH)
     *
     * Purchase order number specified by the buyer for the assignment to vendor's
     * replenishment orders in a vendor managed inventory program.
     */
    case REPL_PURC_ORDE_NUMB = 'AFH';

    /**
     * Replenishment purchase order range end number (AML)
     *
     * Ending number of a range of purchase order numbers assigned by the buyer to
     * vendor's replenishment orders.
     */
    case REPL_PURC_ORDE_RANG_END_NUMB = 'AML';

    /**
     * Replenishment purchase order range start number (AKM)
     *
     * Starting number of a range of purchase order numbers assigned by the buyer
     * to vendor's replenishment orders.
     */
    case REPL_PURC_ORDE_RANG_STAR_NUMB = 'AKM';

    /**
     * Report number (ADY)
     *
     * Reference to a report to Customs by a carrier at the point of entry,
     * encompassing both conveyance and consignment information.
     */
    case REPO_NUMB = 'ADY';

    /**
     * Reporting form number (ALE)
     *
     * Reference number assigned to the reporting form.
     */
    case REPO_FORM_NUMB = 'ALE';

    /**
     * Request for cancellation number (AET)
     *
     * A number that identifies a request for cancellation.
     */
    case REQU_FOR_CANC_NUMB = 'AET';

    /**
     * Request for quote number (AHU)
     *
     * Reference number assigned by the requestor to a request for quote.
     */
    case REQU_FOR_QUOT_NUMB = 'AHU';

    /**
     * Request number (AGI)
     *
     * The reference number of a request.
     */
    case REQU_NUMB = 'AGI';

    /**
     * Reservation office identifier (LRC)
     *
     * Reference to the office where a reservation was made.
     */
    case RESE_OFFI_IDEN = 'LRC';

    /**
     * Reservation station indentifier (AVT)
     *
     * Reference to the station where a reservation was made.
     */
    case RESE_STAT_INDE = 'AVT';

    /**
     * Reserved goods identifier (AWY)
     *
     * A reference number identifying goods in stock which have been reserved for
     * a party.
     */
    case RESE_GOOD_IDEN = 'AWY';

    /**
     * Returnable container reference number (ALP)
     *
     * A reference number identifying a returnable container.
     */
    case RETU_CONT_REFE_NUMB = 'ALP';

    /**
     * Returns notice number (ALQ)
     *
     * A reference number to a returns notice.
     */
    case RETU_NOTI_NUMB = 'ALQ';

    /**
     * Road consignment note number (CMR)
     *
     * Reference number assigned to a road consignment note, see: 1001 = 730.
     */
    case ROAD_CONS_NOTE_NUMB = 'CMR';

    /**
     * Safe custody number (ASR)
     *
     * The number of a file or portfolio kept for safe custody on behalf of
     * clients.
     */
    case SAFE_CUST_NUMB = 'ASR';

    /**
     * Safe deposit box number (ATI)
     *
     * Number of the safe deposit box.
     */
    case SAFE_DEPO_BOX_NUMB = 'ATI';

    /**
     * Sales department number (SD)
     *
     * A number that identifies a sales department.
     */
    case SALE_DEPA_NUMB = 'SD';

    /**
     * Sales forecast number (ALR)
     *
     * A reference number identifying a sales forecast.
     */
    case SALE_FORE_NUMB = 'ALR';

    /**
     * Sales office number (SM)
     *
     * A number that identifies a sales office.
     */
    case SALE_OFFI_NUMB = 'SM';

    /**
     * Sales person number (SA)
     *
     * Identification number of a sales person.
     */
    case SALE_PERS_NUMB = 'SA';

    /**
     * Sales region number (SB)
     *
     * A number that identifies a sales region.
     */
    case SALE_REGI_NUMB = 'SB';

    /**
     * Sales report number (ALS)
     *
     * A reference number identifying a sales report.
     */
    case SALE_REPO_NUMB = 'ALS';

    /**
     * Scan line (SP)
     *
     * A number that identifies a scan line.
     */
    case SCAN_LINE = 'SP';

    /**
     * Scheme/plan number (AGW)
     *
     * Reference number assigned to a service scheme or plan.
     */
    case SCHE_NUMB = 'AGW';

    /**
     * Second beneficiary's reference (AFP)
     *
     * Reference of the second beneficiary.
     */
    case SECO_BENE_REFE = 'AFP';

    /**
     * Secondary Customs reference (AFM)
     *
     * A number that identifies the secondary customs reference.
     */
    case SECO_CUST_REFE = 'AFM';

    /**
     * Secretariat number (ATD)
     *
     * A reference number identifying a secretariat.
     */
    case SECR_NUMB = 'ATD';

    /**
     * Secure delivery terms and conditions agreement reference (ADX)
     *
     * A reference to a secure delivery terms and conditions agreement. A secured
     * delivery agreement is an agreement containing terms and conditions to
     * secure deliveries in case of failure in the production or logistics process
     * of the supplier.
     */
    case SECU_DELI_TERM_AND_COND_AGRE_REFE = 'ADX';

    /**
     * Seller's catalogue number (ABN)
     *
     * Identification number assigned to a seller's catalogue.
     */
    case SELL_CATA_NUMB = 'ABN';

    /**
     * Sellers reference number (SS)
     *
     * Reference number assigned to a transaction by the seller.
     */
    case SELL_REFE_NUMB = 'SS';

    /**
     * Sender's clause number (AQO)
     *
     * The number that identifies the sender's clause.
     */
    case SEND_CLAU_NUMB = 'AQO';

    /**
     * Sender's file reference number (AOE)
     *
     * File reference number assigned by the sender.
     */
    case SEND_FILE_REFE_NUMB = 'AOE';

    /**
     * Sender's reference to the original message (AGO)
     *
     * The reference provided by the sender of the original message.
     */
    case SEND_REFE_TO_THE_ORIG_MESS = 'AGO';

    /**
     * Sending bank's reference number (ANY)
     *
     * Reference number of the sending bank.
     */
    case SEND_BANK_REFE_NUMB = 'ANY';

    /**
     * Sending Bankgiro number (ATK)
     *
     * Number of the sending Bankgiro.
     */
    case SEND_BANK_NUMB = 'ATK';

    /**
     * Serial number (SE)
     *
     * Identification number of an item which distinguishes this specific item out
     * of an number of identical items.
     */
    case SERI_NUMB = 'SE';

    /**
     * Serial shipping container code (AXI)
     *
     * Reference number identifying a logistic unit.
     */
    case SERI_SHIP_CONT_CODE = 'AXI';

    /**
     * Service category reference (AWM)
     *
     * Reference identifying the service category.
     */
    case SERV_CATE_REFE = 'AWM';

    /**
     * Service group identification number (AGT)
     *
     * Identification used for a group of services.
     */
    case SERV_GROU_IDEN_NUMB = 'AGT';

    /**
     * Service provider (AWK)
     *
     * Reference of the service provider.
     */
    case SERV_PROV = 'AWK';

    /**
     * Service relation number (AXH)
     *
     * A reference number identifying the relationship between a service provider
     * and a service client, e.g., treatment of a patient in a hospital, usage by
     * a member of a library facility, etc.
     */
    case SERV_RELA_NUMB = 'AXH';

    /**
     * Ship from (SF)
     *
     * A number that identifies a ship from location.
     */
    case SHIP_FROM = 'SF';

    /**
     * Ship notice/manifest number (MA)
     *
     * The number assigned to a ship notice or manifest.
     */
    case SHIP_NOTI_NUMB = 'MA';

    /**
     * Ship's stay reference number (ATZ)
     *
     * (1099) Reference number assigned by a port authority to the stay of a
     * vessel in the port.
     */
    case SHIP_STAY_REFE_NUMB = 'ATZ';

    /**
     * Shipment reference number (SRN)
     *
     * [1065] Reference number assigned to a shipment.
     */
    case SHIP_REFE_NUMB = 'SRN';

    /**
     * Shipowner's authorization number (ADM)
     *
     * Reference number assigned by the shipowner as an authorization number to
     * transport certain goods (such as hazardous goods, cool or reefer goods).
     */
    case SHIP_AUTH_NUMB = 'ADM';

    /**
     * Shipping label serial number (LA)
     *
     * The serial number on a shipping label.
     */
    case SHIP_LABE_SERI_NUMB = 'LA';

    /**
     * Shipping note number (AEV)
     *
     * [1123] Reference number assigned to a shipping note.
     */
    case SHIP_NOTE_NUMB = 'AEV';

    /**
     * Shipping unit identification (ACC)
     *
     * Identifying marks on the outermost unit that is used to transport
     * merchandise.
     */
    case SHIP_UNIT_IDEN = 'ACC';

    /**
     * SID (Shipper's identifying number for shipment) (SI)
     *
     * A number that identifies the SID (shipper's identification) number for a
     * shipment.
     */
    case SID_SHIP_IDEN_NUMB_FOR_SHIP = 'SI';

    /**
     * Signal code number (AHE)
     *
     * Reference number to identify a signal.
     */
    case SIGN_CODE_NUMB = 'AHE';

    /**
     * Single transaction sequence number (AGJ)
     *
     * A number that identifies a single transaction sequence.
     */
    case SING_TRAN_SEQU_NUMB = 'AGJ';

    /**
     * Site specific procedures, terms, and conditions number (AJL)
     *
     * A number indicating a set of site specific procedures, terms and
     * conditions.
     */
    case SITE_SPEC_PROC_TERM_AND_COND_NUMB = 'AJL';

    /**
     * Situation number (AFZ)
     *
     * Common reference number given to documents concerning a determined period
     * of works.
     */
    case SITU_NUMB = 'AFZ';

    /**
     * Slaughter plant number (AIT)
     *
     * Number to identify slaughter plant.
     */
    case SLAU_PLAN_NUMB = 'AIT';

    /**
     * Slaughterhouse approval number (AVG)
     *
     * Veterinary licence number allocated by a national authority to a
     * slaughterhouse.
     */
    case SLAU_APPR_NUMB = 'AVG';

    /**
     * Social security number (ARR)
     *
     * An identification number assigned to an individual by the social security
     * administration.
     */
    case SOCI_SECU_NUMB = 'ARR';

    /**
     * Software editor reference (AUM)
     *
     * Reference identifying the software editor.
     */
    case SOFT_EDIT_REFE = 'AUM';

    /**
     * Software quality reference (AUO)
     *
     * Reference allocated to the software by a quality assurance agency.
     */
    case SOFT_QUAL_REFE = 'AUO';

    /**
     * Software reference (AUN)
     *
     * Reference identifying the software.
     */
    case SOFT_REFE = 'AUN';

    /**
     * Source document internal reference (AOG)
     *
     * Reference number assigned to a source document for internal usage.
     */
    case SOUR_DOCU_INTE_REFE = 'AOG';

    /**
     * Special budget account number (APU)
     *
     * The number of a special budget account.
     */
    case SPEC_BUDG_ACCO_NUMB = 'APU';

    /**
     * Special instructions number (AJK)
     *
     * A number indicating a citation used for special instructions.
     */
    case SPEC_INST_NUMB = 'AJK';

    /**
     * Specification number (SZ)
     *
     * Number assigned by the issuer to his specification.
     */
    case SPEC_NUMB = 'SZ';

    /**
     * Split delivery number (AXG)
     *
     * A reference number identifying a split delivery.
     */
    case SPLI_DELI_NUMB = 'AXG';

    /**
     * Standard Carrier Alpha Code (SCAC) number (AAZ)
     *
     * For maritime shipments, this code qualifies a Standard Alpha Carrier Code
     * (SCAC) as issued by the United Stated National Motor Traffic Association
     * Inc.
     */
    case STAN_CARR_ALPH_CODE_SCAC_NUMB = 'AAZ';

    /**
     * Standard Industry Classification (SIC) number (AJT)
     *
     * A number specifying a standard industry classification.
     */
    case STAN_INDU_CLAS_SIC_NUMB = 'AJT';

    /**
     * Standard number of inspection document (ALW)
     *
     * Code identifying the standard number of the inspection document supplied.
     */
    case STAN_NUMB_OF_INSP_DOCU = 'ALW';

    /**
     * Standard's code number (GD)
     *
     * Number to identify a specific parameter within a standardization
     * description (e.g. M5 for screws or DIN A4 for paper).
     */
    case STAN_CODE_NUMB = 'GD';

    /**
     * Standard's number (GA)
     *
     * Number to identify a standardization description (e.g. ISO 9375).
     */
    case STAN_NUMB = 'GA';

    /**
     * Standard's version number (AMY)
     *
     * The version number assigned to a standard.
     */
    case STAN_VERS_NUMB = 'AMY';

    /**
     * State or province assigned entity identification (AQW)
     *
     * Reference number of an entity assigned by a state or province.
     */
    case STAT_OR_PROV_ASSI_ENTI_IDEN = 'AQW';

    /**
     * Statement number (ADP)
     *
     * A reference number identifying a statement.
     */
    case STAT_NUMB = 'ADP';

    /**
     * Statement of work (AOR)
     *
     * A reference number for a statement of work.
     */
    case STAT_OF_WORK = 'AOR';

    /**
     * Station reference number (STA)
     *
     * International UIC code assigned to every European rail station (CIM
     * convention).
     */
    case STAT_REFE_NUMB = 'STA';

    /**
     * Statistic Bundes Amt (SBA) identifier (AQV)
     *
     * A German industry classification code issued by Statistic Bundes Amt (SBA)
     * to identify the activity of a company.
     */
    case STAT_BUND_AMT_SBA_IDEN = 'AQV';

    /**
     * Status report number (AQK)
     *
     * (1125) The reference number for a status report.
     */
    case STAT_REPO_NUMB = 'AQK';

    /**
     * Stock adjustment number (ARZ)
     *
     * A number identifying a stock adjustment.
     */
    case STOC_ADJU_NUMB = 'ARZ';

    /**
     * Stock exchange company identifier (ARU)
     *
     * A reference assigned by the stock exchange to a company.
     */
    case STOC_EXCH_COMP_IDEN = 'ARU';

    /**
     * Stock keeping unit number (ABW)
     *
     * A number that identifies the stock keeping unit.
     */
    case STOC_KEEP_UNIT_NUMB = 'ABW';

    /**
     * Sub file (ANE)
     *
     * Identifies the sub file in a structure of related files.
     */
    case SUB_FILE = 'ANE';

    /**
     * Sub-house bill of lading number (ABH)
     *
     * Reference assigned to a sub-house bill of lading.
     */
    case SUBH_BILL_OF_LADI_NUMB = 'ABH';

    /**
     * Substitute air waybill number (AEY)
     *
     * Reference number assigned to a substitute air waybill, see: 1001 = 743.
     */
    case SUBS_AIR_WAYB_NUMB = 'AEY';

    /**
     * Suffix (AJY)
     *
     * A reference to specify a suffix added to the end of a basic identifier.
     */
    case SUFFIX = 'AJY';

    /**
     * Supplier's control number (AEU)
     *
     * Reference to a file regarding a control of the supplier carried out on
     * departure of the goods.
     */
    case SUPP_CONT_NUMB = 'AEU';

    /**
     * Supplier's credit claim reference number (ASJ)
     *
     * A reference number identifying a supplier's credit claim.
     */
    case SUPP_CRED_CLAI_REFE_NUMB = 'ASJ';

    /**
     * Supplier's customer reference number (AVC)
     *
     * A number, assigned by a supplier, to reference a customer.
     */
    case SUPP_CUST_REFE_NUMB = 'AVC';

    /**
     * Swap order number (SW)
     *
     * Number assigned by the seller to a swap order (see definition of DE 1001,
     * code 229).
     */
    case SWAP_ORDE_NUMB = 'SW';

    /**
     * Symbol number (AEC)
     *
     * A number that identifies a symbol.
     */
    case SYMB_NUMB = 'AEC';

    /**
     * Systeme Informatique pour le Repertoire des ENtreprises (SIREN) number (ARK)
     *
     * An identification number known as a SIREN assigned to a business in France.
     */
    case SYST_INFO_POUR_LE_REPE_DES_ENTR_SIRE_NUMB = 'ARK';

    /**
     * Systeme Informatique pour le Repertoire des ETablissements (SIRET) number (ARL)
     *
     * An identification number known as a SIRET assigned to a business location
     * in France.
     */
    case SYST_INFO_POUR_LE_REPE_DES_ETAB_SIRE_NUMB = 'ARL';

    /**
     * Tariff number (AFG)
     *
     * A number that identifies a tariff.
     */
    case TARI_NUMB = 'AFG';

    /**
     * Tax exemption licence number (TL)
     *
     * Number assigned by the tax authorities to a party indicating its tax
     * exemption authorization. This number could relate to a specified business
     * type, a specified local area or a class of products.
     */
    case TAX_EXEM_LICE_NUMB = 'TL';

    /**
     * Tax payment identifier (ABI)
     *
     * [1168] Reference number identifying a payment of a duty or tax e.g. under a
     * transit procedure.
     */
    case TAX_PAYM_IDEN = 'ABI';

    /**
     * Tax registration number (AHP)
     *
     * The registration number by which a company/organization is identified with
     * the tax administration.
     */
    case TAX_REGI_NUMB = 'AHP';

    /**
     * Team assignment number (CST)
     *
     * Team number assigned to a group that is responsible for working a
     * particular transaction.
     */
    case TEAM_ASSI_NUMB = 'CST';

    /**
     * Technical document number (AJW)
     *
     * A number specifying a technical document.
     */
    case TECH_DOCU_NUMB = 'AJW';

    /**
     * Technical order number (AJX)
     *
     * A reference to an order that specifies a technical change.
     */
    case TECH_ORDE_NUMB = 'AJX';

    /**
     * Technical phase reference (ARX)
     *
     * A reference which identifies a specific technical phase.
     */
    case TECH_PHAS_REFE = 'ARX';

    /**
     * Technical regulation (ANG)
     *
     * Reference number identifying a technical regulation.
     */
    case TECH_REGU = 'ANG';

    /**
     * Telex message number (TE)
     *
     * Reference number identifying a telex message.
     */
    case TELE_MESS_NUMB = 'TE';

    /**
     * Terminal operator's consignment reference (TCR)
     *
     * Reference assigned to a consignment by the terminal operator.
     */
    case TERM_OPER_CONS_REFE = 'TCR';

    /**
     * Test report number (TP)
     *
     * Reference number identifying a test report document relevant to the
     * product.
     */
    case TEST_REPO_NUMB = 'TP';

    /**
     * Test specification number (AXJ)
     *
     * A reference number identifying a test specification.
     */
    case TEST_SPEC_NUMB = 'AXJ';

    /**
     * Text Element Identifier deletion reference (ABX)
     *
     * The reference used within a given TEI (Text Element Identifier) which is to
     * be deleted.
     */
    case TEXT_ELEM_IDEN_DELE_REFE = 'ABX';

    /**
     * Third bank's reference (AKN)
     *
     * Reference number of the third bank.
     */
    case THIR_BANK_REFE = 'AKN';

    /**
     * Through bill of lading number (AFA)
     *
     * Reference number assigned to a through bill of lading, see: 1001 = 761.
     */
    case THRO_BILL_OF_LADI_NUMB = 'AFA';

    /**
     * Ticket control number (CBA)
     *
     * Reference giving access to all the details associated with the ticket.
     */
    case TICK_CONT_NUMB = 'CBA';

    /**
     * Time series reference (AUU)
     *
     * Reference to a time series.
     */
    case TIME_SERI_REFE = 'AUU';

    /**
     * TIR carnet number (TI)
     *
     * Reference number assigned to a TIR carnet.
     */
    case TIR_CARN_NUMB = 'TI';

    /**
     * Tokyo SHOKO Research (TSR) business identifier (ARI)
     *
     * A number assigned to a business by TSR.
     */
    case TOKY_SHOK_RESE_TSR_BUSI_IDEN = 'ARI';

    /**
     * Tooling contract number (AXL)
     *
     * A reference number of the tooling contract.
     */
    case TOOL_CONT_NUMB = 'AXL';

    /**
     * TRACES party identification (AXS)
     *
     * The party identification number used in the European Union's Trade Control
     * and Expert System (TRACES).
     */
    case TRAC_PART_IDEN = 'AXS';

    /**
     * Trader account number (ADZ)
     *
     * Number assigned by a Customs authority which uniquely identifies a trader
     * (i.e. importer, exporter or declarant) for Customs purposes.
     */
    case TRAD_ACCO_NUMB = 'ADZ';

    /**
     * Trading partner identification number (ASM)
     *
     * Code specifying an identification assigned to an entity with whom one
     * conducts trade.
     */
    case TRAD_PART_IDEN_NUMB = 'ASM';

    /**
     * Training flight number (AHC)
     *
     * Non-revenue producing airline flight for training purposes.
     */
    case TRAI_FLIG_NUMB = 'AHC';

    /**
     * Transaction reference number (TN)
     *
     * Reference applied to a transaction between two or more parties over a
     * defined life cycle; e.g. number applied by importer or broker to obtain
     * release from Customs, may then used to control declaration through final
     * accounting (synonyms: declaration, entry number).
     */
    case TRAN_REFE_NUMB = 'TN';

    /**
     * Transfer number (TF)
     *
     * An extra number assigned to goods or a container which functions as a
     * reference number or as an authorization number to get the goods or
     * container released from a certain party.
     */
    case TRAN_NUMB = 'TF';

    /**
     * Transit (onward carriage) guarantee (bond) number (ABK)
     *
     * Reference number to identify the guarantee or security provided for Customs
     * transit operation (CCC).
     */
    case TRAN_ONWA_CARR_GUAR_BOND_NUMB = 'ABK';

    /**
     * Transport contract document identifier (AAS)
     *
     * [1188] Reference number to identify a document evidencing a transport
     * contract.
     */
    case TRAN_CONT_DOCU_IDEN = 'AAS';

    /**
     * Transport contract reference number (AHI)
     *
     * Reference number of a transport contract.
     */
    case TRAN_CONT_REFE_NUMB = 'AHI';

    /**
     * Transport costs reference number (AKW)
     *
     * Reference number of the transport costs.
     */
    case TRAN_COST_REFE_NUMB = 'AKW';

    /**
     * Transport equipment acceptance order reference (ATX)
     *
     * Reference number assigned to an order to accept transport equipment that is
     * to be delivered by an inland carrier to a specified facility.
     */
    case TRAN_EQUI_ACCE_ORDE_REFE = 'ATX';

    /**
     * Transport equipment gross mass verification order reference (VOR)
     *
     * Reference number identifying the order for obtaining a Verified Gross Mass
     * (weight) of a packed transport equipment as per SOLAS Chapter VI,
     * Regulation 2, paragraphs 4-6.
     */
    case TRAN_EQUI_GROS_MASS_VERI_ORDE_REFE = 'VOR';

    /**
     * Transport equipment gross mass verification reference number (VGR)
     *
     * Reference number identifying the documentation of a transport equipment
     * gross mass (weight) verification.
     */
    case TRAN_EQUI_GROS_MASS_VERI_REFE_NUMB = 'VGR';

    /**
     * Transport equipment identifier (AAQ)
     *
     * [8260] To identify a piece if transport equipment e.g. container or unit
     * load device.
     */
    case TRAN_EQUI_IDEN = 'AAQ';

    /**
     * Transport equipment release order reference (ATY)
     *
     * Reference number assigned to an order to release transport equipment which
     * is to be picked up by an inland carrier from a specified facility.
     */
    case TRAN_EQUI_RELE_ORDE_REFE = 'ATY';

    /**
     * Transport equipment return reference (AKC)
     *
     * Reference known at the address to return equipment to.
     */
    case TRAN_EQUI_RETU_REFE = 'AKC';

    /**
     * Transport equipment seal identifier (SN)
     *
     * [9308] The identification number of a seal affixed to a piece of transport
     * equipment.
     */
    case TRAN_EQUI_SEAL_IDEN = 'SN';

    /**
     * Transport equipment stripping order (AKX)
     *
     * Reference number assigned to the order to strip goods from transport
     * equipment.
     */
    case TRAN_EQUI_STRI_ORDE = 'AKX';

    /**
     * Transport equipment stuffing order (AKF)
     *
     * Reference number assigned to the order to stuff goods in transport
     * equipment.
     */
    case TRAN_EQUI_STUF_ORDE = 'AKF';

    /**
     * Transport equipment survey reference (AKD)
     *
     * Reference number assigned by the ordering party to the transport equipment
     * survey order.
     */
    case TRAN_EQUI_SURV_REFE = 'AKD';

    /**
     * Transport equipment survey reference number (AKU)
     *
     * Reference number known at the address where the transport equipment will be
     * or has been surveyed.
     */
    case TRAN_EQUI_SURV_REFE_NUMB = 'AKU';

    /**
     * Transport equipment survey report number (AKE)
     *
     * Reference number used by a party to identify its transport equipment survey
     * report.
     */
    case TRAN_EQUI_SURV_REPO_NUMB = 'AKE';

    /**
     * Transport instruction number (TIN)
     *
     * Reference number identifying a transport instruction.
     */
    case TRAN_INST_NUMB = 'TIN';

    /**
     * Transport means journey identifier (CRN)
     *
     * [8028] To identify a journey of a means of transport, for example voyage
     * number, flight number, trip number.
     */
    case TRAN_MEAN_JOUR_IDEN = 'CRN';

    /**
     * Transport route (AEM)
     *
     * A predefined and identified sequence of points where goods are collected,
     * agreed between partners, e.g. the party in charge of organizing the
     * transport and the parties where goods will be collected. The same
     * collecting points may be included in different transport routes, but in a
     * different sequence.
     */
    case TRAN_ROUT = 'AEM';

    /**
     * Transport section reference number (AIW)
     *
     * A number identifying a transport section.
     */
    case TRAN_SECT_REFE_NUMB = 'AIW';

    /**
     * Transport status report number (AXK)
     *
     * [1125] A reference number identifying a transport status report.
     */
    case TRAN_STAT_REPO_NUMB = 'AXK';

    /**
     * Transportation account number (AJZ)
     *
     * An account number to be charged or credited for transportation.
     */
    case TRAN_ACCO_NUMB = 'AJZ';

    /**
     * Transportation Control Number (TCN) (AOW)
     *
     * A number assigned for transportation purposes.
     */
    case TRAN_CONT_NUMB_TCN = 'AOW';

    /**
     * Transportation exportation no. for in bond movement (AFJ)
     *
     * A number that identifies the transportation exportation number for an in
     * bond movement.
     */
    case TRAN_EXPO_NO_FOR_IN_BOND_MOVE = 'AFJ';

    /**
     * Travel service (AUE)
     *
     * Reference identifying a travel service.
     */
    case TRAV_SERV = 'AUE';

    /**
     * Treaty number (ADF)
     *
     * A number that identifies a treaty.
     */
    case TREA_NUMB = 'ADF';

    /**
     * Trucker's bill of lading (TB)
     *
     * A cargo list/description issued by a motor carrier of freight.
     */
    case TRUC_BILL_OF_LADI = 'TB';

    /**
     * U.S. Code of Federal Regulations (CFR) (AJB)
     *
     * A reference indicating a citation from the U.S. Code of Federal Regulations
     * (CFR).
     */
    case US_CODE_OF_FEDE_REGU_CFR = 'AJB';

    /**
     * U.S. Defense Federal Acquisition Regulation Supplement (AJD)
     *
     * A reference indicating a citation from the U.S. Defense Federal Acquisition
     * Regulation Supplement.
     */
    case US_DEFE_FEDE_ACQU_REGU_SUPP = 'AJD';

    /**
     * U.S. Department of Veterans Affairs Acquisition Regulation (AJN)
     *
     * A reference indicating a citation from the U.S. Department of Veterans
     * Affairs Acquisition Regulation.
     */
    case US_DEPA_OF_VETE_AFFA_ACQU_REGU = 'AJN';

    /**
     * U.S. Federal Acquisition Regulation (AJG)
     *
     * A reference indicating a citation from the U.S. Federal Acquisition
     * Regulation.
     */
    case US_FEDE_ACQU_REGU = 'AJG';

    /**
     * U.S. Federal Information Resources Management Regulation (AJI)
     *
     * A reference indicating a citation from U.S. Federal Information Resources
     * Management Regulation.
     */
    case US_FEDE_INFO_RESO_MANA_REGU = 'AJI';

    /**
     * U.S. General Services Administration Regulation (AJH)
     *
     * A reference indicating a citation from U.S. General Services Administration
     * Regulation.
     */
    case US_GENE_SERV_ADMI_REGU = 'AJH';

    /**
     * Ultimate customer's order number (UO)
     *
     * The originator's order number as forwarded in a sequence of parties
     * involved.
     */
    case ULTI_CUST_ORDE_NUMB = 'UO';

    /**
     * Ultimate customer's reference number (UC)
     *
     * The originator's reference number as forwarded in a sequence of parties
     * involved.
     */
    case ULTI_CUST_REFE_NUMB = 'UC';

    /**
     * Uniform Resource Identifier (URI)
     *
     * A string of characters used to identify a name of a resource on the
     * worldwide web.
     */
    case UNIF_RESO_IDEN = 'URI';

    /**
     * Unique claims reference number of the sender (ACT)
     *
     * A number that identifies the unique claims reference of the sender.
     */
    case UNIQ_CLAI_REFE_NUMB_OF_THE_SEND = 'ACT';

    /**
     * Unique consignment reference number (UCN)
     *
     * [1202] Unique reference identifying a particular consignment of goods.
     * Synonym: UCR, UCRN.
     */
    case UNIQ_CONS_REFE_NUMB = 'UCN';

    /**
     * Unique goods shipment identifier (AVU)
     *
     * Unique identifier assigned to a shipment of goods linking trade, tracking
     * and transport information.
     */
    case UNIQ_GOOD_SHIP_IDEN = 'AVU';

    /**
     * Unique market reference (ADQ)
     *
     * A number that identifies a unique market.
     */
    case UNIQ_MARK_REFE = 'ADQ';

    /**
     * United Nations Dangerous Goods identifier (UN)
     *
     * [7124] United Nations Dangerous Goods Identifier (UNDG) is the unique
     * serial number assigned within the United Nations to substances and articles
     * contained in a list of the dangerous goods most commonly carried.
     */
    case UNIT_NATI_DANG_GOOD_IDEN = 'UN';

    /**
     * Upper number of range (UAR)
     *
     * Upper number in a range of numbers.
     */
    case UPPE_NUMB_OF_RANG = 'UAR';

    /**
     * US Customs Service (USCS) entry code (AQM)
     *
     * An entry number assigned by the United States (US) customs service.
     */
    case US_CUST_SERV_USCS_ENTR_CODE = 'AQM';

    /**
     * US government agency number (ACB)
     *
     * A number that identifies a United States Government agency.
     */
    case US_GOVE_AGEN_NUMB = 'ACB';

    /**
     * US, Department of Transportation bond surety code (AMQ)
     *
     * A bond surety code assigned by the United States Department of
     * Transportation (DOT).
     */
    case US_DEPA_OF_TRAN_BOND_SURE_CODE = 'AMQ';

    /**
     * US, Federal Communications Commission (FCC) import condition number (AMS)
     *
     * A number known as the United States Federal Communications Commission (FCC)
     * import condition number applying to certain types of regulated
     * communications equipment.
     */
    case US_FEDE_COMM_COMM_FCC_IMPO_COND_NUMB = 'AMS';

    /**
     * US, Food and Drug Administration establishment indicator (AMR)
     *
     * An establishment indicator assigned by the United States Food and Drug
     * Administration.
     */
    case US_FOOD_AND_DRUG_ADMI_ESTA_INDI = 'AMR';

    /**
     * VAT registration number (VA)
     *
     * Unique number assigned by the relevant tax authority to identify a party
     * for use in relation to Value Added Tax (VAT).
     */
    case VAT_REGI_NUMB = 'VA';

    /**
     * Vehicle Identification Number (VIN) (AKG)
     *
     * The identification number which uniquely distinguishes one vehicle from
     * another through the lifespan of the vehicle.
     */
    case VEHI_IDEN_NUMB_VIN = 'AKG';

    /**
     * Vehicle licence number (ABZ)
     *
     * Number of the licence issued for a vehicle by an agency of government.
     */
    case VEHI_LICE_NUMB = 'ABZ';

    /**
     * Vendor contract number (VC)
     *
     * Number assigned by the vendor to a contract.
     */
    case VEND_CONT_NUMB = 'VC';

    /**
     * Vendor ID number (VR)
     *
     * A number that identifies a vendor's identification.
     */
    case VEND_ID_NUMB = 'VR';

    /**
     * Vendor order number suffix (VS)
     *
     * The suffix for a vendor order number.
     */
    case VEND_ORDE_NUMB_SUFF = 'VS';

    /**
     * Vendor product number (VP)
     *
     * Number assigned by vendor to another manufacturer's product.
     */
    case VEND_PROD_NUMB = 'VP';

    /**
     * Vessel identifier (VM)
     *
     * (8123) Reference identifying a vessel.
     */
    case VESS_IDEN = 'VM';

    /**
     * Voucher number (VV)
     *
     * Reference number identifying a voucher.
     */
    case VOUC_NUMB = 'VV';

    /**
     * Voyage number (VON)
     *
     * (8028) Reference number assigned to the voyage of the vessel.
     */
    case VOYA_NUMB = 'VON';

    /**
     * Wage determination number (AJR)
     *
     * A number specifying a wage determination.
     */
    case WAGE_DETE_NUMB = 'AJR';

    /**
     * Warehouse entry number (WE)
     *
     * Entry number under which imported merchandise was placed in a Customs
     * bonded warehouse.
     */
    case WARE_ENTR_NUMB = 'WE';

    /**
     * Warehouse receipt number (WR)
     *
     * A number identifying a warehouse receipt.
     */
    case WARE_RECE_NUMB = 'WR';

    /**
     * Warehouse storage location number (WS)
     *
     * A number identifying a warehouse storage location.
     */
    case WARE_STOR_LOCA_NUMB = 'WS';

    /**
     * Waybill number (AAM)
     *
     * Reference number assigned to a waybill, see: 1001 = 700.
     */
    case WAYB_NUMB = 'AAM';

    /**
     * Weight agreement number (WM)
     *
     * A number identifying a weight agreement.
     */
    case WEIG_AGRE_NUMB = 'WM';

    /**
     * Well number (WN)
     *
     * A number assigned to a shaft sunk into the ground.
     */
    case WELL_NUMB = 'WN';

    /**
     * Wool identification number (AHQ)
     *
     * Shipping Identification Mark (SIM) allocated to a wool consignment by a
     * shipping company.
     */
    case WOOL_IDEN_NUMB = 'AHQ';

    /**
     * Wool tax reference number (AHR)
     *
     * Reference or indication of the payment of wool tax.
     */
    case WOOL_TAX_REFE_NUMB = 'AHR';

    /**
     * Work breakdown structure (AOL)
     *
     * A structure reference that identifies the breakdown of work for a project.
     */
    case WORK_BREA_STRU = 'AOL';

    /**
     * Work item quantity determination (AWF)
     *
     * A reference assigned to a work item quantity determination.
     */
    case WORK_ITEM_QUAN_DETE = 'AWF';

    /**
     * Work order (AOV)
     *
     * Reference number for an order to do work.
     */
    case WORK_ORDE = 'AOV';

    /**
     * Work package (AOS)
     *
     * A reference for a detailed package of work.
     */
    case WORK_PACK = 'AOS';

    /**
     * Work shift (AOK)
     *
     * A work shift reference number.
     */
    case WORK_SHIF = 'AOK';

    /**
     * Work task charge number (AON)
     *
     * A reference assigned to a specific work task charge.
     */
    case WORK_TASK_CHAR_NUMB = 'AON';

    /**
     * Work team (AOP)
     *
     * A reference to identify a team performing work.
     */
    case WORK_TEAM = 'AOP';

    /**
     * Returns the caption of the code
     *
     * @return string
     *
     * @codeCoverageIgnore
     */
    final public function getCaption(): string
    {
        return match ($this) {
            InvoiceSuiteCodelistReferenceCodeQualifiers::ACCI_REFE_NUMB => 'Accident reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ACCO_NUMB => 'Account number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ACCO_PART_BANK_REFE => 'Account partys bank reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ACCO_PART_REFE => 'Account partys reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ACCO_PAYA_NUMB => 'Account payable number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ACCO_SERV_BANK_REFE_NUMB => 'Account servicing banks reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ACCO_ENTR => 'Accounting entry',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ACCO_FILE_REFE => 'Accounting file reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ACCO_TRAN_NUMB => 'Accounting transmission number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ACCO_RECE_NUMB => 'Accounts receivable number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ACTI_AUTH_NUMB => 'Action authorization number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ACTI_PRIN_EXER_APE_IDEN => 'Activite Principale Exercee (APE) identifier',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ADDI_REFE_NUMB => 'Additional reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ADDR_REFE => 'Addressee reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ADMI_REFE_CODE => 'Administrative Reference Code',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ADVI_THRO_BANK_REFE => 'Advise through banks reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ADVI_BANK_REFE => 'Advising banks reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::AGEN_CLAU_NUMB => 'Agency clause number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::AGEN_BANK_REFE => 'Agents bank reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::AGEN_REFE => 'Agents reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::AGER_AERO_GROU_EQUI_REQU_DATA_NUMB => 'AGERD (Aerospace Ground Equipment Requirement Data) number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::AGRE_NUMB => 'Agreement number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::AGRE_TO_PAY_NUMB => 'Agreement to pay number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::AIR_CARG_TRAN_MANI => 'Air cargo transfer manifest',
            InvoiceSuiteCodelistReferenceCodeQualifiers::AIR_WAYB_NUMB => 'Air waybill number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::AIRL_FLIG_IDEN_NUMB => 'Airlines flight identification number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ALLO_SEAT => 'Allocated seat',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ALLO_IDEN_AIR => 'Allotment identification (Air)',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ANAL_NUMB_NUMB => 'Analysis number/test number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ANIM_FARM_LICE_NUMB => 'Animal farm licence number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ANTI_CASE_NUMB => 'Anti-dumping case number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::APPL_COEF_IDEN_NUMB => 'Applicable coefficient identification number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::APPL_INST_OR_STAN => 'Applicable instructions or standards',
            InvoiceSuiteCodelistReferenceCodeQualifiers::APPL_BANK_REFE => 'Applicants bank reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::APPL_REFE => 'Applicants reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::APPL_FOR_FINA_SUPP_REFE_NUMB => 'Application for financial support reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::APPL_REFE_NUMB => 'Application reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::APPR_NUMB => 'Appropriation number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ARTI_NUMB => 'Article number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ASSE_NUMB => 'Assembly number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ASSO_INVO => 'Associated invoices',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ASSU_COMP => 'Assuming company',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ATA_CARN_NUMB => 'ATA carnet number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::AUTH_FOR_REPA_REFE => 'Authorisation for repair reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::AUTH_ISSU_EQUI_IDEN => 'Authority issued equipment identification',
            InvoiceSuiteCodelistReferenceCodeQualifiers::AUTH_FOR_EXPE_AFE_NUMB => 'Authorization for expense (AFE) number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::AUTH_NUMB => 'Authorization number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::AUTH_NUMB_FOR_EXCE_TO_DANG_GOOD_REGU => 'Authorization number for exception to dangerous goods regulations',
            InvoiceSuiteCodelistReferenceCodeQualifiers::AUTH_TO_MEET_COMP_NUMB => 'Authorization to meet competition number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BANK_REFE => 'Bank reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BANK_BATC_INTE_TRAN_REFE_NUMB => 'Banks batch interbank transaction reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BANK_COMM_TRAN_REFE_NUMB => 'Banks common transaction reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BANK_DOCU_PROC_REFE => 'Banks documentary procedure reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BANK_INDI_INTE_TRAN_REFE_NUMB => 'Banks individual interbank transaction reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BANK_INDI_TRAN_REFE_NUMB => 'Banks individual transaction reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BANK_ACCE => 'Bankers acceptance',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BANK_PROC_NUMB => 'Bankruptcy procedure number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BAR_CODE_LABE_SERI_NUMB => 'Bar coded label serial number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BATC_NUMB_NUMB => 'Batch number/lot number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BATT_AND_ACCU_PROD_REGI_NUMB => 'Battery and accumulator producer registration number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BEGI_JOB_SEQU_NUMB => 'Beginning job sequence number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BEGI_METE_READ_ACTU => 'Beginning meter reading actual',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BEGI_METE_READ_ESTI => 'Beginning meter reading estimated',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BENE_BANK_REFE => 'Beneficiarys bank reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BENE_REFE => 'Beneficiarys reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BID_NUMB => 'Bid number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BILL_OF_LADI_NUMB => 'Bill of lading number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BILL_OF_QUAN_NUMB => 'Bill of quantities number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BLAN_ORDE_NUMB => 'Blanket order number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BLEN_WITH_NUMB => 'Blended with number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BOOK_NUMB => 'Book number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BORD_NUMB => 'Bordereau number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BROK_OR_SALE_OFFI_NUMB => 'Broker or sales office number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BROK_REFE => 'Broker reference 1',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BUDG_CHAP => 'Budget chapter',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BURE_SIGN_STAT_REFE => 'Bureau signing (statement reference)',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BUYE_CATA_NUMB => 'Buyers catalogue number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BUYE_CONT_NUMB => 'Buyers contract number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BUYE_DEBT_NUMB => 'Buyers debtor number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BUYE_FUND_NUMB => 'Buyers fund number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BUYE_ITEM_NUMB => 'Buyers item number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CAD_FILE_LAYE_CONV => 'CAD file layer convention',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CADA_GERA_DO_CONT_CGC => 'Cadastro Geral do Contribuinte (CGC)',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CALENDAR => 'Calendar',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CALL_OFF_ORDE_NUMB => 'Call off order number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CANA_EXCI_ENTR_NUMB => 'Canadian excise entry number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CARG_ACCE_ORDE_REFE_NUMB => 'Cargo acceptance order reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CARG_CONT_NUMB => 'Cargo control number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CARG_MANI_NUMB => 'Cargo manifest number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CARR_AGEN_REFE_NUMB => 'Carriers agent reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CARR_REFE_NUMB => 'Carriers reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CASE_NUMB => 'Case number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CASE_OF_NEED_PART_REFE => 'Case of need partys reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CATA_SEQU_NUMB => 'Catalogue sequence number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CATA_NUMB => 'Catastrophe number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CATE_OF_WORK_REFE => 'Category of work reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CDROM => 'CD-ROM',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CEDE_CLAI_NUMB => 'Cedents claim number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CEDI_COMP => 'Ceding company',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CEIL_FORM_REFE_NUMB => 'Ceiling formula reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CENT_SECR_LOG_NUMB => 'Central secretariat log number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CENT_SECR_LOG_NUMB_CHIL_DATA_MAIN_REQU_DMR => 'Central secretariat log number, child Data Maintenance Request (DMR)',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CENT_SECR_LOG_NUMB_PARE_DATA_MAIN_REQU_DMR => 'Central secretariat log number, parent Data Maintenance Request (DMR)',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CERT_OF_CONF => 'Certificate of conformity',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CHAM_OF_COMM_REGI_NUMB => 'Chamber of Commerce registration number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CHAR_CARD_ACCO_NUMB => 'Charge card account number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CHAR_NOTE_DOCU_ATTA_INDI => 'Charges note document attachment indicator',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CHEC_NUMB => 'Checking number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CHEQ_NUMB => 'Cheque number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CIRC_PUBL_NUMB => 'Circular publication number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CIVI_ACTI_NUMB => 'Civil action number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CLAV_UNIC_DE_IDEN_TRIB_CUIT => 'Clave Unica de Identificacion Tributaria (CUIT)',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CLEA_REFE => 'Clearing reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::COLD_ROLL_NUMB => 'Cold roll number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::COLL_BANK_REFE => 'Collecting banks reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::COLL_ADVI_DOCU_IDEN => 'Collection advice document identifier',
            InvoiceSuiteCodelistReferenceCodeQualifiers::COLL_INST_NUMB => 'Collection instrument number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::COLL_REFE => 'Collection reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::COMM_ACCO_SUMM_REFE_NUMB => 'Commercial account summary reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::COMM_NUMB => 'Commodity number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::COMM_TRAN_REFE_NUMB => 'Common transaction reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::COMP_REGI_OFFI_CRO_NUMB => 'Companies Registry Office (CRO) number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::COMP_SYND_REFE => 'Company / syndicate reference 1',
            InvoiceSuiteCodelistReferenceCodeQualifiers::COMP_ISSU_EQUI_ID => 'Company issued equipment ID',
            InvoiceSuiteCodelistReferenceCodeQualifiers::COMP_TRAD_ACCO_NUMB => 'Company trading account number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::COMP_REGI_NUMB => 'Company/place registration number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::COMP_UNIT_PAYM_REQU_REFE => 'Completed units payment request reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::COMP_CODE_NUMB => 'Compliance code number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::COND_OF_PURC_DOCU_NUMB => 'Condition of purchase document number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::COND_OF_SALE_DOCU_NUMB => 'Condition of sale document number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CONN_LOCA => 'Connected location',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CONN_POIN_TO_CENT_GRID => 'Connecting point to central grid',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CONS_FURT_ORDE => 'Consignees further order',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CONS_INVO_NUMB => 'Consignees invoice number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CONS_ORDE_NUMB => 'Consignees order number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CONS_REFE => 'Consignees reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CONS_CONT_NUMB => 'Consignment contract number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CONS_IDEN_CARR_ASSI => 'Consignment identifier, carrier assigned',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CONS_IDEN_CONS_ASSI => 'Consignment identifier, consignee assigned',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CONS_IDEN_FREI_FORW_ASSI => 'Consignment identifier, freight forwarder assigned',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CONS_INFO => 'Consignment information',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CONS_RECE_IDEN => 'Consignment receipt identifier',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CONS_STOC_CONT => 'Consignment stock contract',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CONS_ORDE_REFE => 'Consolidated orders reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CONS_NOTA => 'Constraint notation',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CONS_DATA_REQU_NUMB => 'Consumption data request number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CONT_DISP_ORDE_REFE_NUMB => 'Container disposition order reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CONT_OPER_REFE_NUMB => 'Container operators reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CONT_PREF => 'Container prefix',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CONT_WORK_ORDE_REFE_NUMB => 'Container work order reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CONT_RECE_NUMB => 'Container/equipment receipt number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CONT_BREA_REFE => 'Contract breakdown reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CONT_DOCU_ADDE_IDEN => 'Contract document addendum identifier',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CONT_NUMB => 'Contract number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CONT_PART_REFE_NUMB => 'Contract party reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CONT_REGI_NUMB => 'Contractor registration number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CONT_REQU_REFE => 'Contractor request reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CONV_POST_NUMB => 'Converted Postgiro number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::COOP_CONT_NUMB => 'Cooperation contract number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::COST_ACCO => 'Cost account',
            InvoiceSuiteCodelistReferenceCodeQualifiers::COST_ACCO_DOCU => 'Cost accounting document',
            InvoiceSuiteCodelistReferenceCodeQualifiers::COST_CENT => 'Cost centre',
            InvoiceSuiteCodelistReferenceCodeQualifiers::COST_CENT_ALIG_NUMB => 'Cost centre alignment number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::COST_RICA_JUDI_NUMB => 'Costa Rican judicial number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CRED_MEMO_NUMB => 'Credit memo number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CRED_NOTE_NUMB => 'Credit note number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CRED_RATI_AGEN_REFE_NUMB => 'Credit rating agencys reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CRED_REFE_NUMB => 'Credit reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CURR_INVO_NUMB => 'Current invoice number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CUST_CATA_NUMB => 'Customer catalogue number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CUST_MATE_SPEC_NUMB => 'Customer material specification number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CUST_PROC_SPEC_NUMB => 'Customer process specification number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CUST_REFE_NUMB => 'Customer reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CUST_REFE_NUMB_ASSI_TO_PREV_BALA_OF_PAYM_INFO => 'Customer reference number assigned to previous balance of payment information',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CUST_SPEC_NUMB => 'Customer specification number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CUST_TRAV_SERV_IDEN => 'Customer travel service identifier',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CUST_COMM_TRAN_REFE_NUMB => 'Customers common transaction reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CUST_DOCU_PROC_REFE => 'Customers documentary procedure reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CUST_INDI_TRAN_REFE_NUMB => 'Customers individual transaction reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CUST_UNIT_INVE_NUMB => 'Customers unit inventory number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CUST_BIND_RULI_NUMB => 'Customs binding ruling number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CUST_DECI_REQU_NUMB => 'Customs decision request number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CUST_GUAR_NUMB => 'Customs guarantee number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CUST_ITEM_NUMB => 'Customs item number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CUST_NONB_RULI_NUMB => 'Customs non-binding ruling number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CUST_PREA_RULI_NUMB => 'Customs pre-approval ruling number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CUST_PREF_INQU_NUMB => 'Customs preference inquiry number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CUST_RELE_CODE => 'Customs release code',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CUST_TARI_NUMB => 'Customs tariff number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CUST_TRAN_NUMB => 'Customs transhipment number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CUST_VALU_DECI_NUMB => 'Customs valuation decision number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DANG_GOOD_INFO => 'Dangerous Goods information',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DANG_GOOD_SECU_NUMB => 'Dangerous goods security number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DANG_GOOD_TRAN_LICE_NUMB => 'Dangerous goods transport licence number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DATA_STRU_TAG => 'Data structure tag',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DEBI_ACCO_NUMB => 'Debit account number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DEBI_CARD_NUMB => 'Debit card number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DEBI_LETT_NUMB => 'Debit letter number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DEBI_NOTE_NUMB => 'Debit note number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DEBI_REFE_NUMB => 'Debit reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DEBT_REFE_NUMB => 'Debtors reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DECL_CUST_IDEN_NUMB => 'Declarants Customs identity number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DECL_REFE_NUMB => 'Declarants reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DEFE_PRIO_ALLO_SYST_PRIO_RATI => 'Defense priorities allocation system priority rating',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DEFE_APPR_NUMB => 'Deferment approval number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DELI_NOTE_NUMB => 'Delivery note number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DELI_NUMB_TRAN => 'Delivery number (transport)',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DELI_ORDE_NUMB => 'Delivery order number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DELI_ROUT_REFE => 'Delivery route reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DELI_SCHE_NUMB => 'Delivery schedule number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DELI_VERI_CERT => 'Delivery verification certificate',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DEPARTMENT => 'Department',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DEPA_NUMB => 'Department number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DEPA_OF_TRAN_BOND_NUMB => 'Department of transportation bond number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DEPO_REFE_NUMB => 'Deposit reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DESP_ADVI_NUMB => 'Despatch advice number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DESP_NOTE_POST_PARC_NUMB => 'Despatch note (post parcels) number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DESP_NOTE_DOCU_IDEN => 'Despatch note document identifier',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DIRE_DEBI_REFE => 'Direct debit reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DIRE_PAYM_VALU_NUMB => 'Direct payment valuation number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DIRE_PAYM_VALU_REQU_NUMB => 'Direct payment valuation request number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DISP_REFE => 'Dispensation reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DISP_NUMB => 'Dispute number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DIST_INVO_NUMB => 'Distributor invoice number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DOCK_RECE_NUMB => 'Dock receipt number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DOCK_NUMB => 'Docket number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DOCU_IDEN => 'Document identifier',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DOCU_LINE_IDEN => 'Document line identifier',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DOCU_PAGE_IDEN => 'Document page identifier',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DOCU_REFE_INTE => 'Document reference, internal',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DOCU_REFE_ORIG => 'Document reference, original',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DOCU_VOLU_NUMB => 'Document volume number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DOCU_CRED_AMEN_NUMB => 'Documentary credit amendment number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DOCU_CRED_IDEN => 'Documentary credit identifier',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DOCU_PAYM_REFE => 'Documentary payment reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DOME_FLIG_NUMB => 'Domestic flight number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DOME_INVE_MANA_CODE => 'Domestic inventory management code',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DRAW_REFE => 'Drawees reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DRAW_LIST_NUMB => 'Drawing list number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DRAW_NUMB => 'Drawing number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DUN_AND_BRAD_CANA__DIGI_STAN_INDU_CLAS_SIC_CODE => 'Dun and Bradstreet Canadas 8 digit Standard Industrial Classification (SIC) code',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DUN_AND_BRAD_US__DIGI_STAN_INDU_CLAS_SIC_CODE => 'Dun and Bradstreet US 8 digit Standard Industrial Classification (SIC) code',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DUTY_FREE_PROD_RECE_AUTH_NUMB => 'Duty free products receipt authorisation number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DUTY_FREE_PROD_SECU_NUMB => 'Duty free products security number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DUTY_MEMO_NUMB => 'Duty memo number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ECON_OPER_REGI_AND_IDEN_NUMB_EORI => 'Economic Operators Registration and Identification Number (EORI)',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ELEC_AND_ELEC_EQUI_PROD_REGI_NUMB => 'Electrical and electronic equipment producer registration number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::EMBA_NUMB => 'Embargo number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::EMBA_PERM_NUMB => 'Embargo permit number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::EMPL_IDEN_NUMB_OF_SERV_BURE => 'Employer identification number of service bureau',
            InvoiceSuiteCodelistReferenceCodeQualifiers::EMPL_IDEN_NUMB => 'Employers identification number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::EMPT_CONT_BILL_NUMB => 'Empty container bill number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::END_ITEM_NUMB => 'End item number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::END_USE_AUTH_NUMB => 'End use authorization number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ENDI_JOB_SEQU_NUMB => 'Ending job sequence number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ENDI_METE_READ_ACTU => 'Ending meter reading actual',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ENDI_METE_READ_ESTI => 'Ending meter reading estimated',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ENQU_NUMB => 'Enquiry number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ENTI_REFE_NUMB_PREV => 'Entity reference number, previous',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ENTR_FLAG => 'Entry flagging',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ENTR_POIN_ASSE_LOG_NUMB => 'Entry point assessment log number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ENTR_POIN_ASSE_LOG_NUMB_CHIL_DMR => 'Entry point assessment log number, child DMR',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ENTR_POIN_ASSE_LOG_NUMB_PARE_DMR => 'Entry point assessment log number, parent DMR',
            InvoiceSuiteCodelistReferenceCodeQualifiers::EQUI_NUMB => 'Equipment number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::EQUI_OWNE_REFE_NUMB => 'Equipment owner reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::EQUI_SEQU_NUMB => 'Equipment sequence number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::EQUI_TRAN_CHAR_NUMB => 'Equipment transport charge number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ERRO_POSI => 'Error position',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ESTI_ORDE_REFE_NUMB => 'Estimate order reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ETER_REFE => 'ETERMS reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::EUR__CERT_NUMB => 'Eur 1 certificate number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::EURO_VALU_ADDE_TAX_IDEN => 'European Value Added Tax identification',
            InvoiceSuiteCodelistReferenceCodeQualifiers::EVEN_REFE_NUMB => 'Event reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::EXCE_TRAN_AUTH_NUMB => 'Exceptional transport authorisation number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::EXCE_TRAN_NUMB => 'Excess transportation number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::EXPO_CLEA_INST_REFE_NUMB => 'Export clearance instruction reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::EXPO_CONT_CLAS_NUMB => 'Export control classification number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::EXPO_CONT_COMM_NUMB_ECCN => 'Export Control Commodity number (ECCN)',
            InvoiceSuiteCodelistReferenceCodeQualifiers::EXPO_DECL => 'Export declaration',
            InvoiceSuiteCodelistReferenceCodeQualifiers::EXPO_ESTA_NUMB => 'Export establishment number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::EXPO_PERM_IDEN => 'Export permit identifier',
            InvoiceSuiteCodelistReferenceCodeQualifiers::EXPO_REFE_NUMB => 'Export reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::EXTE_OBJE_REFE => 'External object reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FEDE_SUPP_SCHE_ITEM_NUMB => 'Federal supply schedule item number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FILE_CONV_JOUR => 'File conversion journal',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FILE_IDEN_NUMB => 'File identification number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FILE_LINE_IDEN => 'File line identifier',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FILE_VERS_NUMB => 'File version number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FINA_SEQU_NUMB => 'Final sequence number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FINA_CANC_REFE_NUMB => 'Financial cancellation reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FINA_MANA_REFE => 'Financial management reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FINA_PHAS_REFE => 'Financial phase reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FINA_SETT_PART_REFE_NUMB => 'Financial settlement partys reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FINA_TRAN_REFE_NUMB => 'Financial transaction reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FIRM_BOOK_REFE_NUMB => 'Firm booking reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FIRS_FINA_INST_TRAN_REFE => 'First financial institutions transaction reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FISC_NUMB => 'Fiscal number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FLAT_RACK_CONT_BUND_IDEN_NUMB => 'Flat rack container bundle identification number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FLOW_REFE_NUMB => 'Flow reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FORE_EXCH => 'Foreign exchange',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FORE_EXCH_CONT_NUMB => 'Foreign exchange contract number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FORE_MILI_SALE_NUMB => 'Foreign military sales number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FORE_RESI_IDEN_NUMB => 'Foreign resident identification number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FORM_REPO_NUMB => 'Formal report number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FORM_STAT_REFE => 'Formal statement reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FORM_REFE_NUMB => 'Formula reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FORW_ORDE_NUMB => 'Forwarding order number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FRAM_AGRE_NUMB => 'Framework Agreement Number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FREE_ZONE_IDEN => 'Free zone identifier',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FREI_BILL_NUMB => 'Freight bill number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FREI_FORW_NUMB => 'Freight Forwarder number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FUNC_WORK_GROU => 'Functional work group',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FUND_ACCO_NUMB => 'Fund account number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FUND_CODE_NUMB => 'Fund code number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::GENE_CARG_CONS_REFE_NUMB => 'General cargo consignment reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::GENE_DECL_NUMB => 'General declaration number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::GENE_ORDE_NUMB => 'General order number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::GENE_PURP_MESS_REFE_NUMB => 'General purpose message reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::GOOD_AND_SERV_TAX_IDEN_NUMB => 'Goods and Services Tax identification number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::GOOD_DECL_DOCU_IDEN_CUST => 'Goods declaration document identifier, Customs',
            InvoiceSuiteCodelistReferenceCodeQualifiers::GOOD_DECL_NUMB => 'Goods declaration number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::GOOD_ITEM_INFO => 'Goods item information',
            InvoiceSuiteCodelistReferenceCodeQualifiers::GOVE_AGEN_REFE_NUMB => 'Government agency reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::GOVE_BILL_OF_LADI => 'Government bill of lading',
            InvoiceSuiteCodelistReferenceCodeQualifiers::GOVE_CONT_NUMB => 'Government contract number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::GOVE_QUAL_ASSU_AND_CONT_LEVE_NUMB => 'Government quality assurance and control level Number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::GOVE_REFE_NUMB => 'Government reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::GRID_OPER_CUST_REFE_NUMB => 'Grid operators customer reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::GROU_ACCO => 'Group accounting',
            InvoiceSuiteCodelistReferenceCodeQualifiers::GROU_REFE_NUMB => 'Group reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::GUAR_NUMB => 'Guarantee number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::HAND_AND_MOVE_REFE_NUMB => 'Handling and movement reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::HARM_SYST_NUMB => 'Harmonised system number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::HASH_VALU => 'Hash value',
            InvoiceSuiteCodelistReferenceCodeQualifiers::HAST_NUMB => 'Hastening number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::HOT_ROLL_NUMB => 'Hot roll number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::HOUS_BILL_OF_LADI_NUMB => 'House bill of lading number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::HOUS_WAYB_NUMB => 'House waybill number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::HYGI_CERT_NUMB_NATI => 'Hygienic Certificate number, national',
            InvoiceSuiteCodelistReferenceCodeQualifiers::IATA_CARG_AGEN_CASS_ADDR_NUMB => 'IATA Cargo Agent CASS Address number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::IATA_CARG_AGEN_CODE_NUMB => 'IATA cargo agent code number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::IMAG_REFE => 'Image reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::IMME_EXPO_NO_FOR_IN_BOND_MOVE => 'Immediate exportation no. for in bond movement',
            InvoiceSuiteCodelistReferenceCodeQualifiers::IMME_TRAN_NO_FOR_IN_BOND_MOVE => 'Immediate transportation no. for in bond movement',
            InvoiceSuiteCodelistReferenceCodeQualifiers::IMPL_VERS_NUMB => 'Implementation version number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::IMPO_CLEA_INST_REFE_NUMB => 'Import clearance instruction reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::IMPO_PERM_IDEN => 'Import permit identifier',
            InvoiceSuiteCodelistReferenceCodeQualifiers::IMPO_REFE_NUMB => 'Importer reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::IMPO_LETT_OF_CRED_REFE => 'Importers letter of credit reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::IMPU_ACCO => 'Imputation account',
            InvoiceSuiteCodelistReferenceCodeQualifiers::IN_BOND_NUMB => 'In bond number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INCO_LEGA_REFE => 'Incorporated legal reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INDI_TRAN_REFE_NUMB => 'Individual transaction reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INIT_SAMP_INSP_REPO_NUMB => 'Initial sample inspection report number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INLA_TRAN_ORDE_NUMB => 'Inland transport order number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INST_BELG_DE_CODI_IBLC_NUMB => 'Institut Belgo-Luxembourgeois de Codification (IBLC) number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INST_OF_SECU_AND_FUTU_MARK_DEVE_ISFM_SERI_NUMB => 'Institute of Security and Future Market Development (ISFMD) serial number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INST_FOR_RETU_NUMB => 'Instruction for returns number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INST_TO_DESP_REFE_NUMB => 'Instruction to despatch reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INSU_CERT_REFE_NUMB => 'Insurance certificate reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INSU_CONT_REFE_NUMB => 'Insurance contract reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INSU_ASSI_REFE_NUMB => 'Insurer assigned reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INTE_LOGI_SUPP_CROS_REFE_NUMB => 'Integrated logistic support cross reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INTE_NUMB_NEW => 'Interchange number new',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INTE_NUMB_OLD => 'Interchange number old',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INTE_BROK => 'Intermediary broker',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INTE_CUST_NUMB => 'Internal customer number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INTE_DATA_PROC_NUMB => 'Internal data process number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INTE_ORDE_NUMB => 'Internal order number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INTE_VEND_NUMB => 'Internal vendor number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INTE_ASSE_LOG_NUMB => 'International assessment log number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INTE_ASSE_LOG_NUMB_CHIL_DATA_MAIN_REQU_DMR => 'International assessment log number, child Data Maintenance Request (DMR)',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INTE_ASSE_LOG_NUMB_PARE_DATA_MAIN_REQU_DMR => 'International assessment log number, parent Data Maintenance Request (DMR)',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INTE_FLIG_NUMB => 'International flight number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INTE_STAN_INDU_CLAS_ISIC_CODE => 'International Standard Industrial Classification (ISIC) code',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INTR_ROUT => 'Intra-plant routing',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INVE_REPO_REFE_NUMB => 'Inventory report reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INVE_REPO_REQU_NUMB => 'Inventory report request number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INVE_REFE_NUMB => 'Investment reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INVO_DOCU_IDEN => 'Invoice document identifier',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INVO_NUMB_SUFF => 'Invoice number suffix',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INVO_DATA_SHEE_REFE_NUMB => 'Invoicing data sheet reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::IRON_CHAR_NUMB => 'Iron charge number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ISSU_PRES_IDEN => 'Issued prescription identification',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ISSU_BANK_REFE => 'Issuing banks reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::JOB_NUMB => 'Job number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::JOIN_VENT_REFE_NUMB => 'Joint venture reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::JUDG_NUMB => 'Judgment number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::KAME_VAN_KOOP_KVK_NUMB => 'Kamer Van Koophandel (KVK) number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::LABO_REGI_NUMB => 'Laboratory registration number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::LAST_RECE_BANK_STAT_MESS_REFE => 'Last received banking status message reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::LATE_ACCO_ENTR_RECO_REFE => 'Latest accounting entry record reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::LEAS_CONT_REFE => 'Lease contract reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::LETT_OF_CRED_NUMB => 'Letter of credit number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::LLOY_CLAI_OFFI_REFE => 'Lloyds claims office reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::LOAD_PLAN_NUMB => 'Load planning number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::LOAD_AUTH_IDEN => 'Loading authorisation identifier',
            InvoiceSuiteCodelistReferenceCodeQualifiers::LOAN => 'Loan',
            InvoiceSuiteCodelistReferenceCodeQualifiers::LOCA_REFE_NUMB => 'Local Reference Number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::LOCKBOX => 'Lockbox',
            InvoiceSuiteCodelistReferenceCodeQualifiers::LOSS_NUMB => 'Loss/event number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::LOWE_NUMB_IN_RANG => 'Lower number in range',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MAIL_REFE_NUMB => 'Mailing reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MAJO_FORC_PROG_NUMB => 'Major force program number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MAND_REFE => 'Mandate Reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MANU_PROC_AUTH_NUMB => 'Manual processing authority number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MANU_DEFI_REPA_RATE_REFE => 'Manufacturer defined repair rates reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MANU_MATE_SAFE_DATA_SHEE_NUMB => 'Manufacturers material safety data sheet number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MANU_PART_NUMB => 'Manufacturers part number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MANU_ORDE_NUMB => 'Manufacturing order number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MANU_QUAL_AGRE_NUMB => 'Manufacturing quality agreement number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MARK_PLAN_IDEN_NUMB_MPIN => 'Marketing plan identification number (MPIN)',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MARK_REFE => 'Marking/label reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MAST_ACCO_NUMB => 'Master account number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MAST_AIR_WAYB_NUMB => 'Master air waybill number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MAST_BILL_OF_LADI_NUMB => 'Master bill of lading number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MAST_LABE_NUMB => 'Master label number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MAST_SOLI_PROC_TERM_AND_COND_NUMB => 'Master solicitation procedures, terms, and conditions number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MATC_OF_ENTR_BALA => 'Matching of entries, balanced',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MATC_OF_ENTR_UNBA => 'Matching of entries, unbalanced',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MATU_CERT_OF_DEPO => 'Matured certificate of deposit',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MEAT_CUTT_PLAN_APPR_NUMB => 'Meat cutting plant approval number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MEAT_PROC_ESTA_REGI_NUMB => 'Meat processing establishment registration number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MEMB_NUMB => 'Member number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MESS_BATC_NUMB => 'Message batch number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MESS_DESI_GROU_NUMB => 'Message design group number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MESS_RECI => 'Message recipient',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MESS_SEND => 'Message sender',
            InvoiceSuiteCodelistReferenceCodeQualifiers::METE_READ_AT_THE_BEGI_OF_THE_DELI => 'Meter reading at the beginning of the delivery',
            InvoiceSuiteCodelistReferenceCodeQualifiers::METE_READ_AT_THE_END_OF_DELI => 'Meter reading at the end of delivery',
            InvoiceSuiteCodelistReferenceCodeQualifiers::METE_UNIT_NUMB => 'Meter unit number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::METE_SERV_CONS_REPO_NUMB => 'Metered services consumption report number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::METE_POIN => 'Metering point',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MILI_INTE_PURC_REQU_MIPR_NUMB => 'Military Interdepartmental Purchase Request (MIPR) number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MINI_CERT_OF_HOMO => 'Ministerial certificate of homologation',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MODEL => 'Model',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MOTO_VEHI_IDEN_NUMB => 'Motor vehicle identification number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MOVE_REFE_NUMB => 'Movement reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MUNI_ASSI_BUSI_REGI_NUMB => 'Municipality assigned business registry number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MUTU_DEFI_REFE_NUMB => 'Mutually defined reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::NAME_BANK_REFE => 'Named banks reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::NATI_GOVE_BUSI_IDEN_NUMB => 'National government business identification number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::NET_AREA => 'Net area',
            InvoiceSuiteCodelistReferenceCodeQualifiers::NET_AREA_SUPP_REFE => 'Net area supplier reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::NEXT_RENT_AGRE_NUMB => 'Next rental agreement number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::NEXT_RENT_AGRE_REAS_NUMB => 'Next rental agreement reason number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::NOME_ACTI_CLAS_ECON_NACE_IDEN => 'Nomenclature Activity Classification Economy (NACE) identifier',
            InvoiceSuiteCodelistReferenceCodeQualifiers::NOMI_NUMB => 'Nomination number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::NONN_MARI_TRAN_DOCU_NUMB => 'Non-negotiable maritime transport document number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::NORM_ACTI_FRAN_NAF_IDEN => 'Norme Activite Francaise (NAF) identifier',
            InvoiceSuiteCodelistReferenceCodeQualifiers::NORT_AMER_HAZA_GOOD_CLAS_NUMB => 'North American hazardous goods classification number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::NOTA_FISC => 'Nota Fiscal',
            InvoiceSuiteCodelistReferenceCodeQualifiers::NOTI_FOR_COLL_NUMB_NOTI => 'NOTIfication for COLlection number (NOTICOL)',
            InvoiceSuiteCodelistReferenceCodeQualifiers::NUMB_OF_TEMP_IMPO_DOCU => 'Number of temporary importation document',
            InvoiceSuiteCodelistReferenceCodeQualifiers::NUME_DE_IDEN_TRIB_NIT => 'Numero de Identificacion Tributaria (NIT)',
            InvoiceSuiteCodelistReferenceCodeQualifiers::OFFE_NUMB => 'Offer number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ORDE_ACKN_DOCU_IDEN => 'Order acknowledgement document identifier',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ORDE_DOCU_IDEN_BUYE_ASSI => 'Order document identifier, buyer assigned',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ORDE_NUMB_VEND => 'Order number (vendor)',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ORDE_SHIP_GROU_REFE => 'Order shipment grouping reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ORDE_STAT_ENQU_NUMB => 'Order status enquiry number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ORDE_CUST_CONS_REFE_NUMB => 'Ordering customer consignment reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ORDE_CUST_SECO_REFE_NUMB => 'Ordering customers second reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ORGA_BREA_STRU => 'Organisation breakdown structure',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ORIG_CERT_NUMB => 'Original certificate number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ORIG_FILI_NUMB => 'Original filing number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ORIG_MAND_REFE => 'Original Mandate Reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ORIG_PURC_ORDE => 'Original purchase order',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ORIG_SUBM_LOG_NUMB => 'Original submitter log number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ORIG_SUBM_CHIL_DATA_MAIN_REQU_DMR_LOG_NUMB => 'Original submitter, child Data Maintenance Request (DMR) log number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ORIG_SUBM_PARE_DATA_MAIN_REQU_DMR_LOG_NUMB => 'Original submitter, parent Data Maintenance Request (DMR) log number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ORIG_REFE => 'Originators reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::OUTE_UNIT_IDEN => 'Outerpackaging unit identification',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PACK_NUMB => 'Package number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PACK_SPEC_NUMB => 'Packaging specification number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PACK_UNIT_IDEN => 'Packaging unit identification',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PACK_LIST_NUMB => 'Packing list number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PACK_PLAN_NUMB => 'Packing plant number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PARAGRAPH => 'Paragraph',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PARE_FILE => 'Parent file',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PART_REFE_INDI_IN_A_DRAW => 'Part reference indicator in a drawing',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PART_SHIP_IDEN => 'Partial shipment identifier',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PART_INFO_MESS_REFE => 'Party information message reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PART_REFE => 'Party reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PART_SEQU_NUMB => 'Party sequence number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PASS_RESE_NUMB => 'Passenger reservation number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PASS_NUMB => 'Passport number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PASSWORD => 'Password',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PATR_NUMB => 'Patron number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PAYE_FINA_INST_ACCO_NUMB => 'Payees financial institution account number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PAYE_FINA_INST_TRAN_ROUT_NO => 'Payees financial institution transit routing No.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PAYE_REFE_NUMB => 'Payees reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PAYE_FINA_INST_TRAN_ROUT_NOAC_TRAN => 'Payers financial institution transit routing No.(ACH transfers)',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PAYM_IN_ADVA_REQU_REFE => 'Payment in advance request reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PAYM_INST_REFE_NUMB => 'Payment instalment reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PAYM_ORDE_NUMB => 'Payment order number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PAYM_PLAN_REFE => 'Payment plan reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PAYM_REFE => 'Payment reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PAYM_VALU_NUMB => 'Payment valuation number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PAYR_DEDU_ADVI_REFE => 'Payroll deduction advice reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PAYR_NUMB => 'Payroll number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PERF_PRES_IDEN => 'Performed prescription identification',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PERS_REGI_NUMB => 'Person registration number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PERS_IDEN_CARD_NUMB => 'Personal identity card number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PHON_NUMB => 'Phone number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PHYS_INVE_RECO_REFE_NUMB => 'Physical inventory recount reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PHYS_MEDI => 'Physical medium',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PICK_SHEE_NUMB => 'Pick-up sheet number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PICT_OF_A_GENE_PROD => 'Picture of a generic product',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PICT_OF_ACTU_PROD => 'Picture of actual product',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PILO_SERV_EXEM_NUMB => 'Pilotage services exemption number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PIPE_NUMB => 'Pipeline number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PLAC_OF_PACK_APPR_NUMB => 'Place of packing approval number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PLAC_OF_POSI_REFE => 'Place of positioning reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PLAN_PACK => 'Planning package',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PLAN_NUMB => 'Plant number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PLOT_FILE => 'Plot file',
            InvoiceSuiteCodelistReferenceCodeQualifiers::POLI_FORM_NUMB => 'Policy form number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::POLI_NUMB => 'Policy number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::POST_REFE => 'Post-entry reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PREA_NUMB => 'Pre-agreement number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PREM_RATE_TABL => 'Premium rate table',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PRES_BANK_REFE => 'Presenting banks reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PREV_BANK_STAT_MESS_REFE => 'Previous banking status message reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PREV_CARG_CONT_NUMB => 'Previous cargo control number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PREV_CRED_ADVI_REFE_NUMB => 'Previous credit advice reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PREV_DELI_INST_NUMB => 'Previous delivery instruction number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PREV_DELI_SCHE_NUMB => 'Previous delivery schedule number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PREV_HIGH_SCHE_NUMB => 'Previous highest schedule number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PREV_INVO_NUMB => 'Previous invoice number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PREV_MEMB_NUMB => 'Previous member number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PREV_RENT_AGRE_NUMB => 'Previous rental agreement number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PREV_REQU_FOR_METE_READ_REFE_NUMB => 'Previous request for metered reading reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PREV_SCHE_NUMB => 'Previous scheme/plan number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PREV_TAX_CONT_NUMB => 'Previous tax control number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PRIC_LIST_NUMB => 'Price list number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PRIC_LIST_VERS_NUMB => 'Price list version number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PRIC_QUOT_NUMB => 'Price quote number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PRIC_VARI_FORM_REFE_NUMB => 'Price variation formula reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PRIC_CATA_RESP_REFE_NUMB => 'Price/sales catalogue response reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PRIM_REFE => 'Primary reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PRIM_CONT_CONT_NUMB => 'Prime contractor contract number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PRIN_REFE_NUMB => 'Principal reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PRIN_BANK_REFE => 'Principals bank reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PRIN_REFE => 'Principals reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PRIO_CONT_REGI_NUMB => 'Prior contractor registration number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PRIO_DATA_UNIV_NUMB_SYST_DUNS_NUMB => 'Prior Data Universal Number System (DUNS) number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PRIO_POLI_NUMB => 'Prior policy number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PRIO_PURC_ORDE_NUMB => 'Prior purchase order number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PRIO_TRAD_PART_IDEN_NUMB => 'Prior trading partner identification number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PROC_PLAN_NUMB => 'Processing plant number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PROC_BUDG_NUMB => 'Procurement budget number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PROD_CERT_NUMB => 'Product certification number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PROD_CHAN_AUTH_NUMB => 'Product change authority number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PROD_CHAR_DIRE => 'Product characteristics directory',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PROD_DATA_FILE_NUMB => 'Product data file number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PROD_INQU_NUMB => 'Product inquiry number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PROD_RESE_NUMB => 'Product reservation number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PROD_SOUR_AGRE_NUMB => 'Product sourcing agreement number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PROD_SPEC_REFE_NUMB => 'Product specification reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PROD_CODE => 'Production code',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PROF_NUMB => 'Profile number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PROF_INVO_DOCU_IDEN => 'Proforma invoice document identifier',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PROJ_NUMB => 'Project number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PROJ_SPEC_NUMB => 'Project specification number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PROM_DEAL_NUMB => 'Promotion deal number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PROO_OF_DELI_REFE_NUMB => 'Proof of delivery reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PROP_PURC_ORDE_REFE_NUMB => 'Proposed purchase order reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PUBL_FILI_REGI_NUMB => 'Public filing registration number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PUBL_ISSU_NUMB => 'Publication issue number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PURC_FOR_EXPO_CUST_AGRE_NUMB => 'Purchase for export Customs agreement number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PURC_ORDE_CHAN_NUMB => 'Purchase order change number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PURC_ORDE_NUMB_SUFF => 'Purchase order number suffix',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PURC_ORDE_RESP_NUMB => 'Purchase order response number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PURC_REQU_REFE => 'Purchasers request reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PURC_ACTI_CLAU_NUMB => 'Purchasing activity clause number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::QUAN_VALU_NUMB => 'Quantity valuation number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::QUAN_VALU_REQU_NUMB => 'Quantity valuation request number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::QUAR_STAT_REFE_NUMB => 'Quarantine/treatment status reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::QUOT_NUMB => 'Quota number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::RAIL_WAYB_NUMB => 'Rail waybill number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::RAIL_ROUT_CODE => 'Rail/road routing code',
            InvoiceSuiteCodelistReferenceCodeQualifiers::RAIL_CONS_NOTE_NUMB => 'Railway consignment note number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::RAIL_WAGO_NUMB => 'Railway wagon number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::RATE_CODE_NUMB => 'Rate code number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::RATE_NOTE_NUMB => 'Rate note number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::RECE_FILE_REFE_NUMB => 'Receivers file reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::RECE_ADVI_NUMB => 'Receiving advice number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::RECE_BANK_AUTH_NUMB => 'Receiving banks authorization number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::RECE_BANK_NUMB => 'Receiving Bankgiro number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::RECE_PART_MEMB_IDEN => 'Receiving partys member identification',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REFE_NUMB_ASSI_BY_THIR_PART => 'Reference number assigned by third party',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REFE_NUMB_OF_A_REQU_FOR_METE_READ => 'Reference number of a request for metered reading',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REFE_NUMB_QUOT_ON_STAT => 'Reference number quoted on statement',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REFE_NUMB_TO_PREV_MESS => 'Reference number to previous message',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REFE_TO_ACCO_SERV_BANK_MESS => 'Reference to account servicing banks message',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REFE_PROD_FOR_CHEM_ANAL => 'Referred product for chemical analysis',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REFE_PROD_FOR_MECH_ANAL => 'Referred product for mechanical analysis',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REGI_FEDE_DE_CONT => 'Regiristo Federal de Contribuyentes',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REGI_CAPI_REFE => 'Registered capital reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REGI_CONT_ACTI_TYPE => 'Registered contractor activity type',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REGI_NUMB_OF_PREV_CUST_DECL => 'Registration number of previous Customs declaration',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REGI_INFO_FISC_RIF_NUMB => 'Registro Informacion Fiscal (RIF) number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REGI_UNIC_DE_CONT_RUC_NUMB => 'Registro Unico de Contribuyente (RUC) number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REGI_UNIC_TRIB_RUT => 'Registro Unico Tributario (RUT)',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REIN_CLAI_NUMB => 'Reinsurers claim number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::RELA_DOCU_NUMB => 'Related document number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::RELA_PART => 'Related party',
            InvoiceSuiteCodelistReferenceCodeQualifiers::RELE_NUMB => 'Release number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REMI_ADVI_NUMB => 'Remittance advice number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REMI_BANK_REFE => 'Remitting banks reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REPA_DATA_REQU_NUMB => 'Repair data request number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REPA_ESTI_NUMB => 'Repair estimate number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REPL_METE_UNIT_NUMB => 'Replaced meter unit number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REPL_PART_NUMB => 'Replacing part number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REPL_PURC_ORDE_NUMB => 'Replenishment purchase order number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REPL_PURC_ORDE_RANG_END_NUMB => 'Replenishment purchase order range end number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REPL_PURC_ORDE_RANG_STAR_NUMB => 'Replenishment purchase order range start number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REPO_NUMB => 'Report number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REPO_FORM_NUMB => 'Reporting form number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REQU_FOR_CANC_NUMB => 'Request for cancellation number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REQU_FOR_QUOT_NUMB => 'Request for quote number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REQU_NUMB => 'Request number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::RESE_OFFI_IDEN => 'Reservation office identifier',
            InvoiceSuiteCodelistReferenceCodeQualifiers::RESE_STAT_INDE => 'Reservation station indentifier',
            InvoiceSuiteCodelistReferenceCodeQualifiers::RESE_GOOD_IDEN => 'Reserved goods identifier',
            InvoiceSuiteCodelistReferenceCodeQualifiers::RETU_CONT_REFE_NUMB => 'Returnable container reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::RETU_NOTI_NUMB => 'Returns notice number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ROAD_CONS_NOTE_NUMB => 'Road consignment note number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SAFE_CUST_NUMB => 'Safe custody number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SAFE_DEPO_BOX_NUMB => 'Safe deposit box number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SALE_DEPA_NUMB => 'Sales department number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SALE_FORE_NUMB => 'Sales forecast number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SALE_OFFI_NUMB => 'Sales office number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SALE_PERS_NUMB => 'Sales person number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SALE_REGI_NUMB => 'Sales region number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SALE_REPO_NUMB => 'Sales report number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SCAN_LINE => 'Scan line',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SCHE_NUMB => 'Scheme/plan number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SECO_BENE_REFE => 'Second beneficiarys reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SECO_CUST_REFE => 'Secondary Customs reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SECR_NUMB => 'Secretariat number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SECU_DELI_TERM_AND_COND_AGRE_REFE => 'Secure delivery terms and conditions agreement reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SELL_CATA_NUMB => 'Sellers catalogue number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SELL_REFE_NUMB => 'Sellers reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SEND_CLAU_NUMB => 'Senders clause number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SEND_FILE_REFE_NUMB => 'Senders file reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SEND_REFE_TO_THE_ORIG_MESS => 'Senders reference to the original message',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SEND_BANK_REFE_NUMB => 'Sending banks reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SEND_BANK_NUMB => 'Sending Bankgiro number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SERI_NUMB => 'Serial number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SERI_SHIP_CONT_CODE => 'Serial shipping container code',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SERV_CATE_REFE => 'Service category reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SERV_GROU_IDEN_NUMB => 'Service group identification number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SERV_PROV => 'Service provider',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SERV_RELA_NUMB => 'Service relation number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SHIP_FROM => 'Ship from',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SHIP_NOTI_NUMB => 'Ship notice/manifest number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SHIP_STAY_REFE_NUMB => 'Ships stay reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SHIP_REFE_NUMB => 'Shipment reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SHIP_AUTH_NUMB => 'Shipowners authorization number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SHIP_LABE_SERI_NUMB => 'Shipping label serial number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SHIP_NOTE_NUMB => 'Shipping note number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SHIP_UNIT_IDEN => 'Shipping unit identification',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SID_SHIP_IDEN_NUMB_FOR_SHIP => 'SID (Shippers identifying number for shipment)',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SIGN_CODE_NUMB => 'Signal code number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SING_TRAN_SEQU_NUMB => 'Single transaction sequence number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SITE_SPEC_PROC_TERM_AND_COND_NUMB => 'Site specific procedures, terms, and conditions number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SITU_NUMB => 'Situation number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SLAU_PLAN_NUMB => 'Slaughter plant number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SLAU_APPR_NUMB => 'Slaughterhouse approval number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SOCI_SECU_NUMB => 'Social security number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SOFT_EDIT_REFE => 'Software editor reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SOFT_QUAL_REFE => 'Software quality reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SOFT_REFE => 'Software reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SOUR_DOCU_INTE_REFE => 'Source document internal reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SPEC_BUDG_ACCO_NUMB => 'Special budget account number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SPEC_INST_NUMB => 'Special instructions number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SPEC_NUMB => 'Specification number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SPLI_DELI_NUMB => 'Split delivery number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::STAN_CARR_ALPH_CODE_SCAC_NUMB => 'Standard Carrier Alpha Code (SCAC) number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::STAN_INDU_CLAS_SIC_NUMB => 'Standard Industry Classification (SIC) number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::STAN_NUMB_OF_INSP_DOCU => 'Standard number of inspection document',
            InvoiceSuiteCodelistReferenceCodeQualifiers::STAN_CODE_NUMB => 'Standards code number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::STAN_NUMB => 'Standards number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::STAN_VERS_NUMB => 'Standards version number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::STAT_OR_PROV_ASSI_ENTI_IDEN => 'State or province assigned entity identification',
            InvoiceSuiteCodelistReferenceCodeQualifiers::STAT_NUMB => 'Statement number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::STAT_OF_WORK => 'Statement of work',
            InvoiceSuiteCodelistReferenceCodeQualifiers::STAT_REFE_NUMB => 'Station reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::STAT_BUND_AMT_SBA_IDEN => 'Statistic Bundes Amt (SBA) identifier',
            InvoiceSuiteCodelistReferenceCodeQualifiers::STAT_REPO_NUMB => 'Status report number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::STOC_ADJU_NUMB => 'Stock adjustment number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::STOC_EXCH_COMP_IDEN => 'Stock exchange company identifier',
            InvoiceSuiteCodelistReferenceCodeQualifiers::STOC_KEEP_UNIT_NUMB => 'Stock keeping unit number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SUB_FILE => 'Sub file',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SUBH_BILL_OF_LADI_NUMB => 'Sub-house bill of lading number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SUBS_AIR_WAYB_NUMB => 'Substitute air waybill number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SUFFIX => 'Suffix',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SUPP_CONT_NUMB => 'Suppliers control number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SUPP_CRED_CLAI_REFE_NUMB => 'Suppliers credit claim reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SUPP_CUST_REFE_NUMB => 'Suppliers customer reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SWAP_ORDE_NUMB => 'Swap order number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SYMB_NUMB => 'Symbol number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SYST_INFO_POUR_LE_REPE_DES_ENTR_SIRE_NUMB => 'Systeme Informatique pour le Repertoire des ENtreprises (SIREN) number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SYST_INFO_POUR_LE_REPE_DES_ETAB_SIRE_NUMB => 'Systeme Informatique pour le Repertoire des ETablissements (SIRET) number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TARI_NUMB => 'Tariff number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TAX_EXEM_LICE_NUMB => 'Tax exemption licence number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TAX_PAYM_IDEN => 'Tax payment identifier',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TAX_REGI_NUMB => 'Tax registration number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TEAM_ASSI_NUMB => 'Team assignment number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TECH_DOCU_NUMB => 'Technical document number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TECH_ORDE_NUMB => 'Technical order number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TECH_PHAS_REFE => 'Technical phase reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TECH_REGU => 'Technical regulation',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TELE_MESS_NUMB => 'Telex message number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TERM_OPER_CONS_REFE => 'Terminal operators consignment reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TEST_REPO_NUMB => 'Test report number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TEST_SPEC_NUMB => 'Test specification number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TEXT_ELEM_IDEN_DELE_REFE => 'Text Element Identifier deletion reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::THIR_BANK_REFE => 'Third banks reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::THRO_BILL_OF_LADI_NUMB => 'Through bill of lading number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TICK_CONT_NUMB => 'Ticket control number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TIME_SERI_REFE => 'Time series reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TIR_CARN_NUMB => 'TIR carnet number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TOKY_SHOK_RESE_TSR_BUSI_IDEN => 'Tokyo SHOKO Research (TSR) business identifier',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TOOL_CONT_NUMB => 'Tooling contract number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAC_PART_IDEN => 'TRACES party identification',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAD_ACCO_NUMB => 'Trader account number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAD_PART_IDEN_NUMB => 'Trading partner identification number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAI_FLIG_NUMB => 'Training flight number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAN_REFE_NUMB => 'Transaction reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAN_NUMB => 'Transfer number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAN_ONWA_CARR_GUAR_BOND_NUMB => 'Transit (onward carriage) guarantee (bond) number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAN_CONT_DOCU_IDEN => 'Transport contract document identifier',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAN_CONT_REFE_NUMB => 'Transport contract reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAN_COST_REFE_NUMB => 'Transport costs reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAN_EQUI_ACCE_ORDE_REFE => 'Transport equipment acceptance order reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAN_EQUI_GROS_MASS_VERI_ORDE_REFE => 'Transport equipment gross mass verification order reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAN_EQUI_GROS_MASS_VERI_REFE_NUMB => 'Transport equipment gross mass verification reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAN_EQUI_IDEN => 'Transport equipment identifier',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAN_EQUI_RELE_ORDE_REFE => 'Transport equipment release order reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAN_EQUI_RETU_REFE => 'Transport equipment return reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAN_EQUI_SEAL_IDEN => 'Transport equipment seal identifier',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAN_EQUI_STRI_ORDE => 'Transport equipment stripping order',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAN_EQUI_STUF_ORDE => 'Transport equipment stuffing order',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAN_EQUI_SURV_REFE => 'Transport equipment survey reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAN_EQUI_SURV_REFE_NUMB => 'Transport equipment survey reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAN_EQUI_SURV_REPO_NUMB => 'Transport equipment survey report number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAN_INST_NUMB => 'Transport instruction number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAN_MEAN_JOUR_IDEN => 'Transport means journey identifier',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAN_ROUT => 'Transport route',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAN_SECT_REFE_NUMB => 'Transport section reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAN_STAT_REPO_NUMB => 'Transport status report number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAN_ACCO_NUMB => 'Transportation account number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAN_CONT_NUMB_TCN => 'Transportation Control Number (TCN)',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAN_EXPO_NO_FOR_IN_BOND_MOVE => 'Transportation exportation no. for in bond movement',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAV_SERV => 'Travel service',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TREA_NUMB => 'Treaty number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRUC_BILL_OF_LADI => 'Truckers bill of lading',
            InvoiceSuiteCodelistReferenceCodeQualifiers::US_CODE_OF_FEDE_REGU_CFR => 'U.S. Code of Federal Regulations (CFR)',
            InvoiceSuiteCodelistReferenceCodeQualifiers::US_DEFE_FEDE_ACQU_REGU_SUPP => 'U.S. Defense Federal Acquisition Regulation Supplement',
            InvoiceSuiteCodelistReferenceCodeQualifiers::US_DEPA_OF_VETE_AFFA_ACQU_REGU => 'U.S. Department of Veterans Affairs Acquisition Regulation',
            InvoiceSuiteCodelistReferenceCodeQualifiers::US_FEDE_ACQU_REGU => 'U.S. Federal Acquisition Regulation',
            InvoiceSuiteCodelistReferenceCodeQualifiers::US_FEDE_INFO_RESO_MANA_REGU => 'U.S. Federal Information Resources Management Regulation',
            InvoiceSuiteCodelistReferenceCodeQualifiers::US_GENE_SERV_ADMI_REGU => 'U.S. General Services Administration Regulation',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ULTI_CUST_ORDE_NUMB => 'Ultimate customers order number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ULTI_CUST_REFE_NUMB => 'Ultimate customers reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::UNIF_RESO_IDEN => 'Uniform Resource Identifier',
            InvoiceSuiteCodelistReferenceCodeQualifiers::UNIQ_CLAI_REFE_NUMB_OF_THE_SEND => 'Unique claims reference number of the sender',
            InvoiceSuiteCodelistReferenceCodeQualifiers::UNIQ_CONS_REFE_NUMB => 'Unique consignment reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::UNIQ_GOOD_SHIP_IDEN => 'Unique goods shipment identifier',
            InvoiceSuiteCodelistReferenceCodeQualifiers::UNIQ_MARK_REFE => 'Unique market reference',
            InvoiceSuiteCodelistReferenceCodeQualifiers::UNIT_NATI_DANG_GOOD_IDEN => 'United Nations Dangerous Goods identifier',
            InvoiceSuiteCodelistReferenceCodeQualifiers::UPPE_NUMB_OF_RANG => 'Upper number of range',
            InvoiceSuiteCodelistReferenceCodeQualifiers::US_CUST_SERV_USCS_ENTR_CODE => 'US Customs Service (USCS) entry code',
            InvoiceSuiteCodelistReferenceCodeQualifiers::US_GOVE_AGEN_NUMB => 'US government agency number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::US_DEPA_OF_TRAN_BOND_SURE_CODE => 'US, Department of Transportation bond surety code',
            InvoiceSuiteCodelistReferenceCodeQualifiers::US_FEDE_COMM_COMM_FCC_IMPO_COND_NUMB => 'US, Federal Communications Commission (FCC) import condition number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::US_FOOD_AND_DRUG_ADMI_ESTA_INDI => 'US, Food and Drug Administration establishment indicator',
            InvoiceSuiteCodelistReferenceCodeQualifiers::VAT_REGI_NUMB => 'VAT registration number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::VEHI_IDEN_NUMB_VIN => 'Vehicle Identification Number (VIN)',
            InvoiceSuiteCodelistReferenceCodeQualifiers::VEHI_LICE_NUMB => 'Vehicle licence number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::VEND_CONT_NUMB => 'Vendor contract number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::VEND_ID_NUMB => 'Vendor ID number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::VEND_ORDE_NUMB_SUFF => 'Vendor order number suffix',
            InvoiceSuiteCodelistReferenceCodeQualifiers::VEND_PROD_NUMB => 'Vendor product number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::VESS_IDEN => 'Vessel identifier',
            InvoiceSuiteCodelistReferenceCodeQualifiers::VOUC_NUMB => 'Voucher number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::VOYA_NUMB => 'Voyage number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::WAGE_DETE_NUMB => 'Wage determination number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::WARE_ENTR_NUMB => 'Warehouse entry number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::WARE_RECE_NUMB => 'Warehouse receipt number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::WARE_STOR_LOCA_NUMB => 'Warehouse storage location number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::WAYB_NUMB => 'Waybill number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::WEIG_AGRE_NUMB => 'Weight agreement number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::WELL_NUMB => 'Well number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::WOOL_IDEN_NUMB => 'Wool identification number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::WOOL_TAX_REFE_NUMB => 'Wool tax reference number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::WORK_BREA_STRU => 'Work breakdown structure',
            InvoiceSuiteCodelistReferenceCodeQualifiers::WORK_ITEM_QUAN_DETE => 'Work item quantity determination',
            InvoiceSuiteCodelistReferenceCodeQualifiers::WORK_ORDE => 'Work order',
            InvoiceSuiteCodelistReferenceCodeQualifiers::WORK_PACK => 'Work package',
            InvoiceSuiteCodelistReferenceCodeQualifiers::WORK_SHIF => 'Work shift',
            InvoiceSuiteCodelistReferenceCodeQualifiers::WORK_TASK_CHAR_NUMB => 'Work task charge number',
            InvoiceSuiteCodelistReferenceCodeQualifiers::WORK_TEAM => 'Work team',
        };
    }

    /**
     * Returns the description of the code
     *
     * @return string
     *
     * @codeCoverageIgnore
     */
    final public function getDescription(): string
    {
        return match ($this) {
            InvoiceSuiteCodelistReferenceCodeQualifiers::ACCI_REFE_NUMB => 'Reference number assigned to an accident.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ACCO_NUMB => 'Identification number of an account.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ACCO_PART_BANK_REFE => 'Reference number of the account partys bank.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ACCO_PART_REFE => 'Reference of the account party.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ACCO_PAYA_NUMB => 'Reference number assigned by accounts payable department to the account of a specific creditor.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ACCO_SERV_BANK_REFE_NUMB => 'Reference number of the account servicing bank.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ACCO_ENTR => 'Accounting entry to which this item is related.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ACCO_FILE_REFE => 'Reference of an accounting file.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ACCO_TRAN_NUMB => 'A number used to identify the transmission of an accounting book entry.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ACCO_RECE_NUMB => 'Reference number assigned by accounts receivable department to the account of a specific debtor.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ACTI_AUTH_NUMB => 'A reference number authorizing an action.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ACTI_PRIN_EXER_APE_IDEN => 'The French industry code for the main activity of a company.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ADDI_REFE_NUMB => '[1010] Reference number provided in addition to another given reference.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ADDR_REFE => 'A reference number of an addressee.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ADMI_REFE_CODE => 'Reference number assigned by Customs to a ‘shipment of excise goods’.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ADVI_THRO_BANK_REFE => 'Financial institution through which the advising bank is to advise the documentary credit.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ADVI_BANK_REFE => 'Reference number of the advising bank.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::AGEN_CLAU_NUMB => 'A number indicating a clause applicable to a particular agency.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::AGEN_BANK_REFE => 'Reference number issued by the agents bank.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::AGEN_REFE => 'Reference number of the agent.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::AGER_AERO_GROU_EQUI_REQU_DATA_NUMB => 'Identifies the equipment required to conduct maintenance.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::AGRE_NUMB => 'A number specifying an agreement between parties.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::AGRE_TO_PAY_NUMB => 'A number that identifies an agreement to pay.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::AIR_CARG_TRAN_MANI => 'A number assigned to an air cargo list of goods to be transferred.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::AIR_WAYB_NUMB => 'Reference number assigned to an air waybill, see: 1001 = 740.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::AIRL_FLIG_IDEN_NUMB => '(8028) Identification of a commercial flight by carrier code and number as assigned by the airline (IATA).',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ALLO_SEAT => 'Reference to a seat allocated to a passenger.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ALLO_IDEN_AIR => 'Reference assigned to guarantied capacity on one or more specific flights on specific date(s) to third parties as agents and other airlines.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ANAL_NUMB_NUMB => 'Number given to a specific analysis or test operation.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ANIM_FARM_LICE_NUMB => 'Veterinary licence number allocated by a national authority to an animal farm.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ANTI_CASE_NUMB => 'Reference issued by a Customs administration pertaining to a past or current investigation of goods dumped at a price lower than the exporters domestic market price.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::APPL_COEF_IDEN_NUMB => 'The identification number of the coefficient which is applicable.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::APPL_INST_OR_STAN => 'Instructions or standards applicable for the whole message or a message line item. These instructions or standards may be published by a neutral organization or authority or another party concerned.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::APPL_BANK_REFE => 'Reference number of the applicants bank.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::APPL_REFE => 'Reference number of the applicant.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::APPL_FOR_FINA_SUPP_REFE_NUMB => 'Reference number assigned to an application for financial support.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::APPL_REFE_NUMB => 'A number that identifies an application reference.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::APPR_NUMB => 'The number identifying a type of funding for a specific purpose (appropriation).',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ARTI_NUMB => 'A number that identifies an article.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ASSE_NUMB => 'A number that identifies an assembly.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ASSO_INVO => 'A number that identifies associated invoices.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ASSU_COMP => 'A number that identifies an assuming company.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ATA_CARN_NUMB => 'Reference number assigned to an ATA carnet.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::AUTH_FOR_REPA_REFE => 'Reference of the authorisation for repair.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::AUTH_ISSU_EQUI_IDEN => 'Identification issued by an authority, e.g. government, airport authority.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::AUTH_FOR_EXPE_AFE_NUMB => 'A number that identifies an authorization for expense (AFE).',
            InvoiceSuiteCodelistReferenceCodeQualifiers::AUTH_NUMB => 'A number which uniquely identifies an authorization.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::AUTH_NUMB_FOR_EXCE_TO_DANG_GOOD_REGU => 'Reference number allocated by an authority. This number contains an approval concerning exceptions on the existing dangerous goods regulations.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::AUTH_TO_MEET_COMP_NUMB => 'A number assigned by a requestor to an offer incoming following request for quote.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BANK_REFE => 'Cross reference issued by financial institution.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BANK_BATC_INTE_TRAN_REFE_NUMB => 'Reference number allocated by the bank to a batch of different underlying interbank transactions.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BANK_COMM_TRAN_REFE_NUMB => 'Banks reference number allocated by the bank to different underlying individual transactions.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BANK_DOCU_PROC_REFE => 'Reference allocated by the bank to a documentary procedure.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BANK_INDI_INTE_TRAN_REFE_NUMB => 'Reference number allocated by the bank to one specific interbank transaction.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BANK_INDI_TRAN_REFE_NUMB => 'Banks reference number allocated by the bank to one specific transaction.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BANK_ACCE => 'Reference number for bankers acceptance issued by the accepting financial institution.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BANK_PROC_NUMB => 'A number identifying a bankruptcy procedure.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BAR_CODE_LABE_SERI_NUMB => 'The serial number on a bar code label.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BATC_NUMB_NUMB => '[7338] Reference number assigned by manufacturer to a series of similar products or goods produced under similar conditions.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BATT_AND_ACCU_PROD_REGI_NUMB => 'Registration number of producer of batteries and accumulators.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BEGI_JOB_SEQU_NUMB => 'The number designating the beginning of the job sequence.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BEGI_METE_READ_ACTU => 'Meter reading at the beginning of an invoicing period.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BEGI_METE_READ_ESTI => 'Meter reading at the beginning of an invoicing period where an actual reading is not available.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BENE_BANK_REFE => 'Reference number of the beneficiarys bank.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BENE_REFE => 'Reference of the beneficiary.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BID_NUMB => 'Number assigned by a submitter of a bid to his bid.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BILL_OF_LADI_NUMB => 'Reference number assigned to a bill of lading, see: 1001 = 705.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BILL_OF_QUAN_NUMB => 'Reference number assigned to a bill of quantities.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BLAN_ORDE_NUMB => 'Reference number assigned by the order issuer to a blanket order.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BLEN_WITH_NUMB => 'The batch/lot/package number a product is blended with.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BOOK_NUMB => 'A number assigned to identify a book.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BORD_NUMB => 'Reference number assigned to a bordereau, see: 1001 = 787.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BROK_OR_SALE_OFFI_NUMB => 'A number that identifies a broker or sales office.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BROK_REFE => 'First reference of a broker.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BUDG_CHAP => 'A reference to the chapter in a budget.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BURE_SIGN_STAT_REFE => 'A statement reference that identifies a bureau signing.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BUYE_CATA_NUMB => 'Identification of a catalogue maintained by a buyer.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BUYE_CONT_NUMB => 'Reference number assigned by buyer to a contract.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BUYE_DEBT_NUMB => 'Reference number assigned to a debtor.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BUYE_FUND_NUMB => 'A reference number indicating the fund number used by the buyer.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::BUYE_ITEM_NUMB => '[7304] Reference number assigned by the buyer to an item.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CAD_FILE_LAYE_CONV => 'Reference number identifying a layer convention for a file in a Computer Aided Design (CAD) environment.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CADA_GERA_DO_CONT_CGC => 'Brazilian taxpayer number.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CALENDAR => 'A calendar reference number.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CALL_OFF_ORDE_NUMB => 'A number that identifies a call off order.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CANA_EXCI_ENTR_NUMB => 'An excise entry number assigned by the Canadian Customs.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CARG_ACCE_ORDE_REFE_NUMB => 'Reference assigned to the cargo acceptance order.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CARG_CONT_NUMB => 'Reference used to identify and control a carrier and consignment from initial entry into a country until release of the cargo by Customs.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CARG_MANI_NUMB => '[1037] Reference number assigned to a cargo manifest.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CARR_AGEN_REFE_NUMB => 'Reference number assigned by the carriers agent to a transaction.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CARR_REFE_NUMB => 'Reference number assigned by carrier to a consignment.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CASE_NUMB => 'Number assigned to a case.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CASE_OF_NEED_PART_REFE => 'Reference number of the case of need party.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CATA_SEQU_NUMB => 'A number which uniquely identifies an item within a catalogue according to a standard numbering system.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CATA_NUMB => 'A number that identifies a catastrophe.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CATE_OF_WORK_REFE => 'A reference identifying a category of work.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CDROM => 'Identity number of the Compact Disk Read Only Memory (CD-ROM).',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CEDE_CLAI_NUMB => 'To identify the number assigned to the claim by the ceding company.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CEDI_COMP => 'Company selling obligations to a third party.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CEIL_FORM_REFE_NUMB => 'The reference number which identifies a formula for determining a ceiling.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CENT_SECR_LOG_NUMB => 'The reference log number assigned by the central secretariat for the Data Maintenance Request (DMR).',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CENT_SECR_LOG_NUMB_CHIL_DATA_MAIN_REQU_DMR => 'The reference log number assigned by the central secretariat for the child Data Maintenance Request (DMR).',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CENT_SECR_LOG_NUMB_PARE_DATA_MAIN_REQU_DMR => 'The reference log number assigned by the central secretariat for the parent Data Maintenance Request (DMR).',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CERT_OF_CONF => 'Certificate certifying the conformity to predefined definitions.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CHAM_OF_COMM_REGI_NUMB => 'The registration number by which a company/organization is known to the Chamber of Commerce.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CHAR_CARD_ACCO_NUMB => 'Number to identify charge card account.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CHAR_NOTE_DOCU_ATTA_INDI => '[1070] Indication that a charges note has been established and attached to a transport contract document or not.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CHEC_NUMB => 'Number assigned by checking party to one specific check action.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CHEQ_NUMB => 'Unique number assigned to one specific cheque.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CIRC_PUBL_NUMB => 'A number specifying a circular publication.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CIVI_ACTI_NUMB => 'A reference number identifying the civil action.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CLAV_UNIC_DE_IDEN_TRIB_CUIT => 'Tax identification number in Argentina.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CLEA_REFE => 'Reference allocated by a clearing procedure.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::COLD_ROLL_NUMB => 'Number attributed to a cold roll coil.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::COLL_BANK_REFE => 'Reference number of the collecting bank.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::COLL_ADVI_DOCU_IDEN => '[1030] Reference number to identify a collection advice document.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::COLL_INST_NUMB => 'To identify the number of an instrument used to remit funds to a beneficiary.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::COLL_REFE => 'A reference identifying a collection.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::COMM_ACCO_SUMM_REFE_NUMB => 'A reference number identifying a commercial account summary.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::COMM_NUMB => 'A number that identifies a commodity.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::COMM_TRAN_REFE_NUMB => 'Reference number applicable to different underlying individual transactions.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::COMP_REGI_OFFI_CRO_NUMB => 'Identifies the reference number assigned by the Companies Registry Office (CRO).',
            InvoiceSuiteCodelistReferenceCodeQualifiers::COMP_SYND_REFE => 'First reference of a company/syndicate.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::COMP_ISSU_EQUI_ID => 'Owner/operator, non-government issued equipment reference number.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::COMP_TRAD_ACCO_NUMB => 'A reference number identifying a company trading account.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::COMP_REGI_NUMB => 'Company registration and place as legally required.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::COMP_UNIT_PAYM_REQU_REFE => 'A reference to a payment request for completed units.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::COMP_CODE_NUMB => 'Number assigned to indicate regulatory compliance.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::COND_OF_PURC_DOCU_NUMB => 'Reference number identifying the conditions of purchase relevant to a purchase.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::COND_OF_SALE_DOCU_NUMB => 'Reference number identifying the conditions of sale relevant to a sale.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CONN_LOCA => 'Reference of a connected location.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CONN_POIN_TO_CENT_GRID => 'Reference to a connecting point to a central grid.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CONS_FURT_ORDE => 'Reference of an order given by the consignee after departure of the means of transport.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CONS_INVO_NUMB => 'The invoice number assigned by a consignee.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CONS_ORDE_NUMB => 'A number that identifies a consignees order.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CONS_REFE => 'Reference number of the consignee.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CONS_CONT_NUMB => 'Reference number identifying a consignment contract.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CONS_IDEN_CARR_ASSI => '[1016] Reference number assigned by a carrier of its agent to identify a specific consignment such as a booking reference number when cargo space is reserved prior to loading.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CONS_IDEN_CONS_ASSI => '[1362] Reference number assigned by the consignee to identify a particular consignment.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CONS_IDEN_FREI_FORW_ASSI => '[1460] Reference number assigned by the freight forwarder to identify a particular consignment.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CONS_INFO => 'Code identifying that the reference number given applies to the consignment information segment group in the referred message .',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CONS_RECE_IDEN => '[1150] Reference number assigned to identify a consignment upon its arrival at its destination.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CONS_STOC_CONT => 'Reference identifying a consignment stock contract.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CONS_ORDE_REFE => 'A reference number to identify orders which have been, or shall be consolidated.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CONS_NOTA => 'Identifies a reference to a constraint notation.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CONS_DATA_REQU_NUMB => 'A number which identifies a request for consumption data.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CONT_DISP_ORDE_REFE_NUMB => 'Reference assigned to the empty container disposition order.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CONT_OPER_REFE_NUMB => 'Reference number assigned by the party operating or controlling the transport container to a transaction or consignment.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CONT_PREF => 'The first part of the unique identification of a container formed by an alpha code identifying the owner of the container.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CONT_WORK_ORDE_REFE_NUMB => 'Reference number assigned by the principal to the work order for a (set of) container(s).',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CONT_RECE_NUMB => 'Number of the Equipment Interchange Receipt issued for full or empty equipment received.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CONT_BREA_REFE => 'A reference which identifies a specific breakdown of a contract.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CONT_DOCU_ADDE_IDEN => '[1318] Reference number to identify an addendum to a contract.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CONT_NUMB => '[1296] Reference number of a contract concluded between parties.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CONT_PART_REFE_NUMB => 'Reference number assigned to a party for a particular contract.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CONT_REGI_NUMB => 'A reference number used to identify a contractor.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CONT_REQU_REFE => 'Reference identifying a request made by a contractor.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CONV_POST_NUMB => 'To identify the reference number of a giro payment having been converted to a Postgiro account.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::COOP_CONT_NUMB => 'Number issued by a party concerned given to a contract on cooperation of two or more parties.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::COST_ACCO => 'A cost control account reference.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::COST_ACCO_DOCU => 'The reference to a cost accounting document.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::COST_CENT => 'A number identifying a cost centre.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::COST_CENT_ALIG_NUMB => 'Number used in the financial management process to align cost allocations.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::COST_RICA_JUDI_NUMB => 'A number assigned by the government to a business in Costa Rica.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CRED_MEMO_NUMB => 'Reference number assigned by issuer to a credit memo.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CRED_NOTE_NUMB => '[1113] Reference number assigned to a credit note.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CRED_RATI_AGEN_REFE_NUMB => 'Reference number assigned by a credit rating agency to a debtor.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CRED_REFE_NUMB => 'The reference number of a credit instruction.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CURR_INVO_NUMB => 'Reference number identifying the current invoice.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CUST_CATA_NUMB => 'Number identifying a catalogue for customers usage.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CUST_MATE_SPEC_NUMB => 'Number for a material specification given by customer.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CUST_PROC_SPEC_NUMB => 'Retrieval number for a process specification defined by customer.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CUST_REFE_NUMB => 'Reference number assigned by the customer to a transaction.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CUST_REFE_NUMB_ASSI_TO_PREV_BALA_OF_PAYM_INFO => 'Identification number of the previous balance of payments information from customer message.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CUST_SPEC_NUMB => 'Retrieval number for a specification defined by customer.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CUST_TRAV_SERV_IDEN => 'A reference identifying a travel service to a customer.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CUST_COMM_TRAN_REFE_NUMB => 'Customers reference number allocated by the customer to different underlying individual transactions.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CUST_DOCU_PROC_REFE => 'Reference allocated by a customer to a documentary procedure.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CUST_INDI_TRAN_REFE_NUMB => 'Customers reference number allocated by the customer to one specific transaction.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CUST_UNIT_INVE_NUMB => 'Number assigned by customer to a unique unit for inventory purposes.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CUST_BIND_RULI_NUMB => 'Binding ruling number issued by customs.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CUST_DECI_REQU_NUMB => 'Reference issued by Customs pertaining to a pending tariff classification decision requested by an importer or agent.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CUST_GUAR_NUMB => 'Reference assigned to a Customs guarantee.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CUST_ITEM_NUMB => 'Number (1496 in CST) assigned by the declarant to an item.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CUST_NONB_RULI_NUMB => 'Non-binding ruling number issued by customs.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CUST_PREA_RULI_NUMB => 'Pre-approval ruling number issued by Customs.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CUST_PREF_INQU_NUMB => 'The number assigned by Customs to a preference inquiry.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CUST_RELE_CODE => 'A code associated to a requirement that must be presented to gain the release of goods by Customs.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CUST_TARI_NUMB => '(7357) Code number of the goods in accordance with the tariff nomenclature system of classification in use where the Customs declaration is made.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CUST_TRAN_NUMB => 'Approval number issued by Customs for cargo to be transhipped under Customs control.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::CUST_VALU_DECI_NUMB => 'Reference by an importing party to a previous decision made by a Customs administration regarding the valuation of goods.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DANG_GOOD_INFO => 'Code identifying that the reference number given applies to the dangerous goods information segment group in the referred message.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DANG_GOOD_SECU_NUMB => 'Reference number allocated by an authority in order to control the dangerous goods on board of a specific means of transport for dangerous goods security purposes.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DANG_GOOD_TRAN_LICE_NUMB => 'Licence number allocated by an authority as to the permission of carrying dangerous goods by a specific means of transport.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DATA_STRU_TAG => 'The tag assigned to a data structure.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DEBI_ACCO_NUMB => 'Reference number assigned by issuer to a debit account.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DEBI_CARD_NUMB => 'A reference number identifying a debit card.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DEBI_LETT_NUMB => 'Reference number identifying the letter of debit document.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DEBI_NOTE_NUMB => '[1117] Reference number assigned by issuer to a debit note.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DEBI_REFE_NUMB => 'The reference number of a debit instruction.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DEBT_REFE_NUMB => 'Reference number of the party who owes an amount of money.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DECL_CUST_IDEN_NUMB => 'Reference to the party whose posted bond or security is being declared in order to accept responsibility for a goods declaration and the applicable duties and taxes.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DECL_REFE_NUMB => 'Unique reference number assigned to a document or a message by the declarant for identification purposes.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DEFE_PRIO_ALLO_SYST_PRIO_RATI => 'A reference indicating a priority rating assigned to allocate resources for defense purchases.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DEFE_APPR_NUMB => 'Number assigned by authorities to a party to approve deferment of payment of tax or duties.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DELI_NOTE_NUMB => '[1033] Reference number assigned by the issuer to a delivery note.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DELI_NUMB_TRAN => 'Reference number by which a haulier/carrier will announce himself at the container terminal or depot when delivering equipment.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DELI_ORDE_NUMB => 'Reference number assigned by issuer to a delivery order.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DELI_ROUT_REFE => 'A reference to the route of the delivery.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DELI_SCHE_NUMB => 'Reference number assigned by buyer to a delivery schedule.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DELI_VERI_CERT => 'Formal identification of delivery verification certificate which is a formal document from Customs etc. confirming that physical goods have been delivered. It may be needed to support a tax reclaim based on an invoice.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DEPARTMENT => 'Section of an organisation.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DEPA_NUMB => 'Number assigned to a department within an organization.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DEPA_OF_TRAN_BOND_NUMB => 'Number of a bond assigned by the department of transportation.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DEPO_REFE_NUMB => 'A reference number identifying a deposit.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DESP_ADVI_NUMB => '[1035] Reference number assigned by issuing party to a despatch advice.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DESP_NOTE_POST_PARC_NUMB => '(1128) Reference number assigned to a despatch note (post parcels), see: 1001 = 750.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DESP_NOTE_DOCU_IDEN => '[1128] Reference number to identify a Despatch Note.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DIRE_DEBI_REFE => 'Reference number assigned to the direct debit operation.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DIRE_PAYM_VALU_NUMB => 'Reference number assigned to a direct payment valuation.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DIRE_PAYM_VALU_REQU_NUMB => 'Reference number assigned to a direct payment valuation request.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DISP_REFE => 'A reference number assigned to an official exemption from a law or obligation.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DISP_NUMB => 'Reference number to a dispute notice.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DIST_INVO_NUMB => 'Reference number assigned by issuer to a distributor invoice.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DOCK_RECE_NUMB => 'Number of the cargo receipt submitted when cargo is delivered to a marine terminal.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DOCK_NUMB => 'A reference number identifying the docket.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DOCU_IDEN => '[1004] Reference number identifying a specific document.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DOCU_LINE_IDEN => '[1156] To identify a line of a document.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DOCU_PAGE_IDEN => '[1212] To identify a page number.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DOCU_REFE_INTE => 'Internal reference to a document.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DOCU_REFE_ORIG => 'The original reference of a document.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DOCU_VOLU_NUMB => 'The number of a document volume.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DOCU_CRED_AMEN_NUMB => 'Number of the amendment of the documentary credit.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DOCU_CRED_IDEN => '[1172] Reference number to identify a documentary credit.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DOCU_PAYM_REFE => 'Reference of the documentary payment.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DOME_FLIG_NUMB => 'Airline flight number assigned to a flight originating and terminating within the same country.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DOME_INVE_MANA_CODE => 'Code to identify the management of domestic inventory.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DRAW_REFE => 'Reference number of the drawee.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DRAW_LIST_NUMB => 'Reference number identifying a drawing list.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DRAW_NUMB => 'Reference number identifying a specific product drawing.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DUN_AND_BRAD_CANA__DIGI_STAN_INDU_CLAS_SIC_CODE => 'Dun and Bradstreet Canadas 8 digit Standard Industrial Classification (SIC) code identifying activities of the company.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DUN_AND_BRAD_US__DIGI_STAN_INDU_CLAS_SIC_CODE => 'Dun and Bradstreet United States 8 digit Standard Industrial Classification (SIC) code identifying activities of the company.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DUTY_FREE_PROD_RECE_AUTH_NUMB => 'Authorisation number allocated for the receipt of duty free products.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DUTY_FREE_PROD_SECU_NUMB => 'A security number allocated for duty free products.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::DUTY_MEMO_NUMB => 'Reference number assigned by customs to a duty memo.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ECON_OPER_REGI_AND_IDEN_NUMB_EORI => 'Number assigned by an authority to an economic operator.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ELEC_AND_ELEC_EQUI_PROD_REGI_NUMB => 'Registration number of producer of electrical and electronic equipment.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::EMBA_NUMB => 'Number assigned to specific goods or a family of goods in a classification of embargo measures.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::EMBA_PERM_NUMB => 'Reference number assigned by issuer to an embargo permit.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::EMPL_IDEN_NUMB_OF_SERV_BURE => 'Reference number assigned by a service/processing bureau to an employer.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::EMPL_IDEN_NUMB => 'Number issued by an authority to identify an employer.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::EMPT_CONT_BILL_NUMB => 'Reference number assigned to an empty container bill, see: 1001 = 708.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::END_ITEM_NUMB => 'A number specifying the end item applicable to a subordinate item.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::END_USE_AUTH_NUMB => 'Reference issued by a Customs administration authorizing a preferential rate of duty if a product is used for a specified purpose, see: 1001 = 990.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ENDI_JOB_SEQU_NUMB => 'A number that identifies the ending job sequence.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ENDI_METE_READ_ACTU => 'Meter reading at the end of an invoicing period.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ENDI_METE_READ_ESTI => 'Meter reading at the end of an invoicing period where an actual reading is not available.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ENQU_NUMB => 'Reference number assigned to an enquiry.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ENTI_REFE_NUMB_PREV => 'The previous reference number assigned to an entity.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ENTR_FLAG => 'Reference to a flagging of entries.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ENTR_POIN_ASSE_LOG_NUMB => 'The reference log number assigned by an entry point assessment group for the DMR.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ENTR_POIN_ASSE_LOG_NUMB_CHIL_DMR => 'The reference log number assigned by an entry point assessment group for a child Data Maintenance Request (DMR).',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ENTR_POIN_ASSE_LOG_NUMB_PARE_DMR => 'The reference log number assigned by an entry point assessment group for the parent Data Maintenance Request (DMR).',
            InvoiceSuiteCodelistReferenceCodeQualifiers::EQUI_NUMB => 'Number assigned by the manufacturer to specific equipment.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::EQUI_OWNE_REFE_NUMB => 'Reference number issued by the owner of the equipment.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::EQUI_SEQU_NUMB => '(1492) A temporary reference number identifying a particular piece of equipment within a series of pieces of equipment.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::EQUI_TRAN_CHAR_NUMB => 'Reference assigned to a specific equipment transportation charge.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ERRO_POSI => 'Reference to the position of an error in a message.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ESTI_ORDE_REFE_NUMB => 'Reference number assigned by the ordering party of the estimate order.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ETER_REFE => 'Identifies a reference to the ICC (International Chamber of Commerce) ETERMS(tm) repository of electronic commerce trading terms and conditions.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::EUR__CERT_NUMB => 'Reference number assigned to a Eur 1 certificate.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::EURO_VALU_ADDE_TAX_IDEN => 'Value Added Tax identification number according to European regulation.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::EVEN_REFE_NUMB => '[1007] Reference number identifying an event.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::EXCE_TRAN_AUTH_NUMB => 'Authorisation number for exceptional transport (using specific equipment, out of gauge, materials and/or specific routing).',
            InvoiceSuiteCodelistReferenceCodeQualifiers::EXCE_TRAN_NUMB => '(1041) Number assigned to excess transport.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::EXPO_CLEA_INST_REFE_NUMB => 'Reference number of the clearance instructions given by the consignor through different means.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::EXPO_CONT_CLAS_NUMB => 'Number identifying the classification of goods covered by an export licence.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::EXPO_CONT_COMM_NUMB_ECCN => 'Reference number to relevant item within Commodity Control List covering actual products change functionality.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::EXPO_DECL => 'Number assigned by the exporter to his export declaration number submitted to an authority.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::EXPO_ESTA_NUMB => 'Number to identify export establishment.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::EXPO_PERM_IDEN => '[1208] Reference number to identify an export licence or permit.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::EXPO_REFE_NUMB => 'Reference number given to an export shipment.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::EXTE_OBJE_REFE => 'A reference identifying an external object.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FEDE_SUPP_SCHE_ITEM_NUMB => 'A number specifying an item listed in a federal supply schedule.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FILE_CONV_JOUR => 'Reference number identifying a journal recording details about conversion operations between file formats.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FILE_IDEN_NUMB => 'A number assigned to identify a file.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FILE_LINE_IDEN => 'Number assigned by the file issuer or sender to identify a specific line.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FILE_VERS_NUMB => 'Number given to a version of an identified file.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FINA_SEQU_NUMB => 'A number that identifies the final sequence.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FINA_CANC_REFE_NUMB => 'Reference number of a financial cancellation.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FINA_MANA_REFE => 'A financial management reference.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FINA_PHAS_REFE => 'A reference which identifies a specific financial phase.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FINA_SETT_PART_REFE_NUMB => 'Reference number of the party who is responsible for the financial settlement.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FINA_TRAN_REFE_NUMB => 'Reference number of the financial transaction.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FIRM_BOOK_REFE_NUMB => 'A reference number identifying a previous firm booking.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FIRS_FINA_INST_TRAN_REFE => 'Identifies the reference given to the individual transaction by the financial institution that is the transactions point of entry into the interbank transaction chain.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FISC_NUMB => 'Tax payers number. Number assigned to individual persons as well as to corporates by a public institution; this number is different from the VAT registration number.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FLAT_RACK_CONT_BUND_IDEN_NUMB => 'Reference number assigned to a bundle of flat rack containers.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FLOW_REFE_NUMB => 'Number given to a usual sender which has regular expeditions of the same goods, to the same destination, defining all general conditions of the transport.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FORE_EXCH => 'Exchange of two currencies at an agreed rate.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FORE_EXCH_CONT_NUMB => 'Reference number identifying a foreign exchange contract.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FORE_MILI_SALE_NUMB => 'A number specifying a sale to a foreign military.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FORE_RESI_IDEN_NUMB => 'Number assigned by a government agency to identify a foreign resident.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FORM_REPO_NUMB => 'A number uniquely identifying a formal report.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FORM_STAT_REFE => 'A reference to a formal statement.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FORM_REFE_NUMB => 'The reference number which identifies a formula.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FORW_ORDE_NUMB => 'Reference number assigned to the forwarding order by the ordering customer.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FRAM_AGRE_NUMB => 'A reference to an agreement between one or more contracting authorities and one or more economic operators, the purpose of which is to establish the terms governing contracts to be awarded during a given period, in particular with regard to price and, where appropriate, the quantity envisaged.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FREE_ZONE_IDEN => 'Identifier to specify the territory of a State where any goods introduced are generally regarded, insofar as import duties and taxes are concerned, as being outside the Customs territory and are not subject to usual Customs control (CCC).',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FREI_BILL_NUMB => 'Reference number assigned by issuing party to a freight bill.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FREI_FORW_NUMB => 'An identification code of a Freight Forwarder.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FUNC_WORK_GROU => 'A reference to identify a functional group performing work.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FUND_ACCO_NUMB => 'Account number of fund.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::FUND_CODE_NUMB => 'Reference number to identify appropriation and branch chargeable for item.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::GENE_CARG_CONS_REFE_NUMB => 'Reference number identifying a particular general cargo (non-containerised or break bulk) consignment.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::GENE_DECL_NUMB => 'Number of the declaration of incoming goods out of a vessel.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::GENE_ORDE_NUMB => 'Customs number assigned to imported merchandise that has been left unclaimed and subsequently moved to a Customs bonded warehouse for storage.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::GENE_PURP_MESS_REFE_NUMB => 'A reference number identifying a general purpose message.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::GOOD_AND_SERV_TAX_IDEN_NUMB => 'Identifier assigned to an entity by a tax authority for Goods and Services Tax (GST) related purposes.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::GOOD_DECL_DOCU_IDEN_CUST => '[1426] Reference number, assigned or accepted by Customs, to identify a goods declaration.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::GOOD_DECL_NUMB => 'Reference number assigned to a goods declaration.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::GOOD_ITEM_INFO => 'Code identifying that the reference number given applies to the goods item information segment group in the referred message.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::GOVE_AGEN_REFE_NUMB => 'Coded reference number that pertains to the business of a government agency.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::GOVE_BILL_OF_LADI => 'Bill of lading as defined by the government.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::GOVE_CONT_NUMB => 'Number assigned to a specific government/public contract.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::GOVE_QUAL_ASSU_AND_CONT_LEVE_NUMB => 'A number which identifies the level of quality assurance and control required by the government for an article.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::GOVE_REFE_NUMB => 'A number that identifies a government reference.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::GRID_OPER_CUST_REFE_NUMB => 'A number, assigned by a grid operator, to reference a customer.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::GROU_ACCO => 'A number that identifies group accounting.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::GROU_REFE_NUMB => 'The reference number identifying a group.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::GUAR_NUMB => 'Number of a guarantee.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::HAND_AND_MOVE_REFE_NUMB => 'A reference number identifying a previously transmitted cargo/goods handling and movement message.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::HARM_SYST_NUMB => 'Number specifying the goods classification under the Harmonised Commodity Description and Coding System of the Customs Co-operation Council (CCC).',
            InvoiceSuiteCodelistReferenceCodeQualifiers::HASH_VALU => 'Contains the hash value of a related document.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::HAST_NUMB => 'A number which uniquely identifies a request to hasten an action.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::HOT_ROLL_NUMB => 'Number attributed to a hot roll coil.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::HOUS_BILL_OF_LADI_NUMB => '[1039] Reference number assigned to a house bill of lading.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::HOUS_WAYB_NUMB => 'Reference number assigned to a house waybill, see: 1001 = 703.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::HYGI_CERT_NUMB_NATI => 'Nationally set Hygienic Certificate number, such as sanitary, epidemiologic.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::IATA_CARG_AGEN_CASS_ADDR_NUMB => 'Code issued by IATA to identify agent locations for CASS billing purposes.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::IATA_CARG_AGEN_CODE_NUMB => 'Code issued by IATA identify each IATA Cargo Agent whose name is entered on the Cargo Agency List.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::IMAG_REFE => 'A reference number identifying an image.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::IMME_EXPO_NO_FOR_IN_BOND_MOVE => 'A number that identifies the immediate exportation number for an in bond movement.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::IMME_TRAN_NO_FOR_IN_BOND_MOVE => 'A number that identifies immediate transportation for in bond movement.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::IMPL_VERS_NUMB => 'Identifies a version number of an implementation.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::IMPO_CLEA_INST_REFE_NUMB => 'Reference number of the import clearance instructions given by the consignor/consignee through different means.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::IMPO_PERM_IDEN => '[1107] Reference number to identify an import licence or permit.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::IMPO_REFE_NUMB => 'Reference number assigned by the importer to identify a particular shipment for his own purposes.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::IMPO_LETT_OF_CRED_REFE => 'Letter of credit reference issued by importer.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::IMPU_ACCO => 'An account to which an amount is to be posted.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::IN_BOND_NUMB => 'Customs assigned number that is used to control the movement of imported cargo prior to its formal Customs clearing.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INCO_LEGA_REFE => 'Identifies a legal reference which is deemed incorporated by reference.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INDI_TRAN_REFE_NUMB => 'Reference number applying to one specific transaction.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INIT_SAMP_INSP_REPO_NUMB => 'Inspection report number given to the initial sample inspection.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INLA_TRAN_ORDE_NUMB => 'Reference number assigned by the principal to the transport order for inland carriage.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INST_BELG_DE_CODI_IBLC_NUMB => 'An identification number assigned by the Luxembourg National Bank to a business in Luxembourg.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INST_OF_SECU_AND_FUTU_MARK_DEVE_ISFM_SERI_NUMB => 'A number used to identify a public but not publicly traded company.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INST_FOR_RETU_NUMB => 'A reference number identifying a previously communicated instruction for return message.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INST_TO_DESP_REFE_NUMB => 'A reference number identifying a previously transmitted instruction to despatch message.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INSU_CERT_REFE_NUMB => 'A number that identifies an insurance certificate reference.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INSU_CONT_REFE_NUMB => 'A number that identifies an insurance contract reference.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INSU_ASSI_REFE_NUMB => 'A unique reference number assigned by the insurer.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INTE_LOGI_SUPP_CROS_REFE_NUMB => 'Provides the identification of the reference which allows cross referencing of items between different areas of integrated logistics support.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INTE_NUMB_NEW => 'Number assigned by the interchange sender to identify one specific interchange. This number points to the actual interchange.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INTE_NUMB_OLD => 'Number assigned by the interchange sender to identify one specific interchange. This number points to the previous interchange.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INTE_BROK => 'A number that identifies an intermediary broker.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INTE_CUST_NUMB => 'Number assigned by a seller, supplier etc. to identify a customer within his enterprise.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INTE_DATA_PROC_NUMB => 'A number identifying an internal data process.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INTE_ORDE_NUMB => 'Number assigned to an order for internal handling/follow up.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INTE_VEND_NUMB => 'Number identifying the company-internal vending department/unit.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INTE_ASSE_LOG_NUMB => 'The reference log number assigned to a Data Maintenance Request (DMR) changed in international assessment.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INTE_ASSE_LOG_NUMB_CHIL_DATA_MAIN_REQU_DMR => 'The reference log number assigned to a Data Maintenance Request (DMR) changed in international assessment that is a child to the current DMR.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INTE_ASSE_LOG_NUMB_PARE_DATA_MAIN_REQU_DMR => 'The reference log number assigned to a Data Maintenance Request (DMR) changed in international assessment that is a parent to the current DMR.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INTE_FLIG_NUMB => 'Airline flight number assigned to a flight originating and terminating across national borders.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INTE_STAN_INDU_CLAS_ISIC_CODE => 'A code specifying an international standard industrial classification.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INTR_ROUT => 'To define routing within a plant.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INVE_REPO_REFE_NUMB => 'A reference number identifying an inventory report.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INVE_REPO_REQU_NUMB => 'Reference number assigned to a request for an inventory report.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INVE_REFE_NUMB => 'A reference to a specific investment.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INVO_DOCU_IDEN => '[1334] Reference number to identify an invoice.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INVO_NUMB_SUFF => 'A number added at the end of an invoice number.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::INVO_DATA_SHEE_REFE_NUMB => 'A reference number identifying an invoicing data sheet.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::IRON_CHAR_NUMB => 'Number attributed to the iron charge for the production of steel products.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ISSU_PRES_IDEN => 'The identification of the issued prescription.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ISSU_BANK_REFE => 'Reference number of the issuing bank.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::JOB_NUMB => '[1043] Identifies a piece of work.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::JOIN_VENT_REFE_NUMB => 'Reference number assigned to a joint venture agreement.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::JUDG_NUMB => 'A reference number identifying the legal decision.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::KAME_VAN_KOOP_KVK_NUMB => 'An identification number assigned by the Dutch Chamber of Commerce to a business in the Netherlands.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::LABO_REGI_NUMB => 'Reference number is the official registration number of the laboratory.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::LAST_RECE_BANK_STAT_MESS_REFE => 'Reference number of the latest received banking status message.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::LATE_ACCO_ENTR_RECO_REFE => 'Code identifying the reference of the latest accounting entry record.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::LEAS_CONT_REFE => 'Reference number of the lease contract.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::LETT_OF_CRED_NUMB => 'Reference number identifying the letter of credit document.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::LLOY_CLAI_OFFI_REFE => 'A number that identifies a Lloyds claims office.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::LOAD_PLAN_NUMB => 'The reference that identifies the load planning number.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::LOAD_AUTH_IDEN => '[4092] Identifier assigned to the loading authorisation granted by the forwarding location e.g. railway or airport, when the consignment is subject to traffic limitations.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::LOAN => 'Reference number for loan allocated by lending financial institution.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::LOCA_REFE_NUMB => 'Number assigned by a national customs authority to an Entry Summary Declaration.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::LOCKBOX => 'Type of cash management system offered by financial institutions to provide for collection of customers receivables.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::LOSS_NUMB => 'To reference to the unique number that is assigned to each major loss hitting the reinsurance industry.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::LOWE_NUMB_IN_RANG => 'Lower number in a range of numbers.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MAIL_REFE_NUMB => 'Identifies the party designated by the importer to receive certain customs correspondence in lieu of its being mailed directly to the importer.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MAJO_FORC_PROG_NUMB => 'Reference number according to Major Force Program (US).',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MAND_REFE => 'Reference to a specific mandate given by the relevant party for underlying business or action.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MANU_PROC_AUTH_NUMB => 'Number allocated to allow the manual processing of an entity.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MANU_DEFI_REPA_RATE_REFE => 'Reference assigned by a manufacturer to their repair rates.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MANU_MATE_SAFE_DATA_SHEE_NUMB => 'A number that identifies a manufacturers material safety data sheet.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MANU_PART_NUMB => 'Reference number assigned by the manufacturer to his product or part.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MANU_ORDE_NUMB => 'Reference number assigned by manufacturer for a given production quantity of products.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MANU_QUAL_AGRE_NUMB => 'Reference number of a manufacturing quality agreement.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MARK_PLAN_IDEN_NUMB_MPIN => 'Number identifying a marketing plan.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MARK_REFE => 'Reference where marking/label information derives from.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MAST_ACCO_NUMB => 'A reference number identifying a master account.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MAST_AIR_WAYB_NUMB => 'Reference number assigned to a master air waybill, see: 1001 = 741.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MAST_BILL_OF_LADI_NUMB => 'Reference number assigned to a master bill of lading, see: 1001 = 704.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MAST_LABE_NUMB => 'Identifies the master label number of any package type.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MAST_SOLI_PROC_TERM_AND_COND_NUMB => 'A number indicating a master solicitation containing procedures, terms and conditions.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MATC_OF_ENTR_BALA => 'Reference to a balanced matching of entries.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MATC_OF_ENTR_UNBA => 'Reference to an unbalanced matching of entries.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MATU_CERT_OF_DEPO => 'Reference number for certificate of deposit allocated by issuing financial institution.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MEAT_CUTT_PLAN_APPR_NUMB => 'Veterinary licence number allocated by a national authority to a meat cutting plant.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MEAT_PROC_ESTA_REGI_NUMB => 'Registration number allocated to a registered meat packing establishment by the local quarantine and inspection authority.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MEMB_NUMB => 'Reference number assigned to a person as a member of a group of persons or a service scheme.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MESS_BATC_NUMB => 'A number identifying a batch of messages.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MESS_DESI_GROU_NUMB => 'Reference number for a message design group.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MESS_RECI => 'A number that identifies the message recipient.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MESS_SEND => 'A number that identifies the message sender.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::METE_READ_AT_THE_BEGI_OF_THE_DELI => 'Meter reading at the beginning of the delivery.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::METE_READ_AT_THE_END_OF_DELI => 'Meter reading at the end of the delivery.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::METE_UNIT_NUMB => 'Number identifying a unique meter unit.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::METE_SERV_CONS_REPO_NUMB => 'A reference number identifying a previously communicated metered services consumption report.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::METE_POIN => 'Reference to a metering point.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MILI_INTE_PURC_REQU_MIPR_NUMB => 'A number indicating an interdepartmental purchase request used by the military.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MINI_CERT_OF_HOMO => 'Certificate of approval for components which are subject to legal restrictions and must be approved by the government.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MODEL => '(7242) A reference used to identify a model.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MOTO_VEHI_IDEN_NUMB => '(8213) Reference identifying a motor vehicle used for transport. Normally is the vehicle registration number.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MOVE_REFE_NUMB => 'Number assigned by customs referencing receipt of an Entry Summary Declaration.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MUNI_ASSI_BUSI_REGI_NUMB => 'A reference number assigned by a municipality to identify a business.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::MUTU_DEFI_REFE_NUMB => 'Number based on party agreement.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::NAME_BANK_REFE => 'Reference number of the named bank.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::NATI_GOVE_BUSI_IDEN_NUMB => 'A business identification number which is assigned by a national government.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::NET_AREA => 'Reference to an area of a net.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::NET_AREA_SUPP_REFE => 'A reference identifying a supplier within a net area.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::NEXT_RENT_AGRE_NUMB => 'Number to identify the next rental agreement.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::NEXT_RENT_AGRE_REAS_NUMB => 'Number to identify the reason for the next rental agreement.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::NOME_ACTI_CLAS_ECON_NACE_IDEN => 'A European industry classification code used to identify the activity of a company.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::NOMI_NUMB => 'Reference number assigned by a shipper to a request/ commitment-to-ship on a pipeline system.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::NONN_MARI_TRAN_DOCU_NUMB => 'Reference number assigned to a sea waybill, see: 1001 = 712.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::NORM_ACTI_FRAN_NAF_IDEN => 'A French industry classification code assigned by the French government to identify the activity of a company.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::NORT_AMER_HAZA_GOOD_CLAS_NUMB => 'Reference to materials designated as hazardous for purposes of transportation in North American commerce.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::NOTA_FISC => 'Nota Fiscal is a registration number for shipments / deliveries within Brazil, issued by the local tax authorities and mandated for each shipment.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::NOTI_FOR_COLL_NUMB_NOTI => 'A reference assigned by a consignor to a notification document which indicates the availability of goods for collection.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::NUMB_OF_TEMP_IMPO_DOCU => 'Number assigned by customs to identify consignment in transit.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::NUME_DE_IDEN_TRIB_NIT => 'A number assigned by the government to a business in some Latin American countries.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::OFFE_NUMB => '(1332) Reference number assigned by issuing party to an offer.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ORDE_ACKN_DOCU_IDEN => '[1018] Reference number identifying the acknowledgement of an order.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ORDE_DOCU_IDEN_BUYE_ASSI => '[1022] Identifier assigned by the buyer to an order.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ORDE_NUMB_VEND => 'Reference number assigned by supplier to a buyers purchase order.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ORDE_SHIP_GROU_REFE => 'A reference number identifying the grouping of purchase orders into one shipment.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ORDE_STAT_ENQU_NUMB => 'A reference number to a previously sent order status enquiry.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ORDE_CUST_CONS_REFE_NUMB => 'Reference number assigned to the consignment by the ordering customer.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ORDE_CUST_SECO_REFE_NUMB => 'Ordering customers second reference number.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ORGA_BREA_STRU => 'A structure reference that identifies the breakdown of an organisation.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ORIG_CERT_NUMB => 'Number giving reference to an original certificate number.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ORIG_FILI_NUMB => 'A number assigned to the original filing.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ORIG_MAND_REFE => 'Reference to a specific related original mandate given by the relevant party for underlying business or action in case of reference or mandate change.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ORIG_PURC_ORDE => 'Reference to the order previously sent.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ORIG_SUBM_LOG_NUMB => 'A control number assigned by the original submitter.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ORIG_SUBM_CHIL_DATA_MAIN_REQU_DMR_LOG_NUMB => 'A Data Maintenance Request (DMR) original submitters reference log number for a child DMR.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ORIG_SUBM_PARE_DATA_MAIN_REQU_DMR_LOG_NUMB => 'A Data Maintenance Request (DMR) original submitters reference log number for the parent DMR.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ORIG_REFE => 'A unique reference assigned by the originator.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::OUTE_UNIT_IDEN => 'Identifying marks on packing units contained within an outermost shipping unit.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PACK_NUMB => '(7070) Reference number identifying a package or carton within a consignment.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PACK_SPEC_NUMB => 'Reference number of documentation specifying the technical detail of packaging requirements.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PACK_UNIT_IDEN => 'Identifying marks on packing units.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PACK_LIST_NUMB => '[1014] Reference number assigned to a packing list.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PACK_PLAN_NUMB => 'Number to identify packing establishment.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PARAGRAPH => 'A reference indicating a paragraph cited as the source of information.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PARE_FILE => 'Identifies the parent file in a structure of related files.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PART_REFE_INDI_IN_A_DRAW => 'To designate the number which provides a cross reference between parts contained in a drawing and a parts catalogue.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PART_SHIP_IDEN => '[1310] Identifier of a shipment which is part of an order.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PART_INFO_MESS_REFE => 'Reference identifying a party information message.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PART_REFE => 'The reference to a party.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PART_SEQU_NUMB => 'Reference identifying a party sequence number.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PASS_RESE_NUMB => 'Number assigned by the travel supplier to identify the passenger reservation.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PASS_NUMB => 'Number assigned to a passport.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PASSWORD => 'Code used for authentication purposes.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PATR_NUMB => 'A number assigned by the government to a business in some Latin American countries. Note that Patron is a Spanish word, it is not a person who gives financial or other support.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PAYE_FINA_INST_ACCO_NUMB => 'Receiving company account number (ACH transfer), check, draft or wire.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PAYE_FINA_INST_TRAN_ROUT_NO => 'RDFI Transit routing number (ACH transfer).',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PAYE_REFE_NUMB => 'Reference number of the party to be paid.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PAYE_FINA_INST_TRAN_ROUT_NOAC_TRAN => 'ODFI (ACH transfer).',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PAYM_IN_ADVA_REQU_REFE => 'A reference to a request for payment in advance.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PAYM_INST_REFE_NUMB => 'A reference number given to a payment instalment to identify a specific instance of payment of a debt which can be paid at specified intervals.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PAYM_ORDE_NUMB => 'A number that identifies a payment order.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PAYM_PLAN_REFE => 'A number which uniquely identifies a payment plan.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PAYM_REFE => 'Reference number assigned to a payment.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PAYM_VALU_NUMB => 'Reference number assigned to a payment valuation.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PAYR_DEDU_ADVI_REFE => 'A reference number identifying a payroll deduction advice.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PAYR_NUMB => 'Reference number assigned to the payroll of an organisation.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PERF_PRES_IDEN => 'The identification of the prescription that has been carried into effect.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PERS_REGI_NUMB => 'A number assigned to an individual.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PERS_IDEN_CARD_NUMB => 'An identity card number assigned to a person.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PHON_NUMB => 'A sequence of digits used to call from one telephone line to another in a public telephone network.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PHYS_INVE_RECO_REFE_NUMB => 'A reference to a re-count of physically held inventory.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PHYS_MEDI => 'Identifies the physical medium.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PICK_SHEE_NUMB => 'Reference number assigned to a pick-up sheet.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PICT_OF_A_GENE_PROD => 'Reference identifying a picture of a generic product.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PICT_OF_ACTU_PROD => 'Reference identifying the picture of an actual product.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PILO_SERV_EXEM_NUMB => 'Number identifying the permit to not use pilotage services.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PIPE_NUMB => 'Number to identify a pipeline.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PLAC_OF_PACK_APPR_NUMB => 'Approval Number of the place where goods are packaged.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PLAC_OF_POSI_REFE => 'Identifies the reference pertaining to the place of positioning.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PLAN_PACK => 'A reference for a planning package of work.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PLAN_NUMB => 'A number that identifies a plant.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PLOT_FILE => 'Reference number indicating that the file is a plot file.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::POLI_FORM_NUMB => 'Number assigned to a policy form.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::POLI_NUMB => 'Number assigned to a policy.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::POST_REFE => 'Reference to a message related to a post-entry.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PREA_NUMB => 'A reference number identifying a pre-agreement.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PREM_RATE_TABL => 'Identifies the premium rate table.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PRES_BANK_REFE => 'Reference number of the presenting bank.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PREV_BANK_STAT_MESS_REFE => 'Message reference number of the previous banking status message being responded to.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PREV_CARG_CONT_NUMB => 'Where a consignment is deconsolidated and/or transferred to the control of another carrier or freight forwarder (e.g. housebill, abstract) this references the previous (e.g. master) cargo control number.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PREV_CRED_ADVI_REFE_NUMB => 'Reference number of the previous Credit advice message.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PREV_DELI_INST_NUMB => 'The identification of a previous delivery instruction.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PREV_DELI_SCHE_NUMB => 'A reference number identifying a previous delivery schedule.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PREV_HIGH_SCHE_NUMB => 'Number of the latest schedule of a previous period (ODETTE DELINS).',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PREV_INVO_NUMB => 'Reference number identifying a previously issued invoice.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PREV_MEMB_NUMB => 'Reference number previously assigned to a member.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PREV_RENT_AGRE_NUMB => 'Number to identify the previous rental agreement number.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PREV_REQU_FOR_METE_READ_REFE_NUMB => 'Number to identify a previous request for a recording or reading of a measuring device.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PREV_SCHE_NUMB => 'Reference number previously assigned to a service scheme or plan.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PREV_TAX_CONT_NUMB => 'A reference number identifying a previous tax control number.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PRIC_LIST_NUMB => 'Reference number assigned to a price list.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PRIC_LIST_VERS_NUMB => 'A number that identifies the version of a price list.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PRIC_QUOT_NUMB => 'Reference number assigned by the seller to a quote.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PRIC_VARI_FORM_REFE_NUMB => 'The reference number which identifies a price variation formula.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PRIC_CATA_RESP_REFE_NUMB => 'A reference number identifying a response to a price/sales catalogue.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PRIM_REFE => 'A number that identifies the primary reference.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PRIM_CONT_CONT_NUMB => 'Reference number assigned by the client to the contract of the prime contractor.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PRIN_REFE_NUMB => 'A number that identifies the principal reference.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PRIN_BANK_REFE => 'Reference number of the principals bank.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PRIN_REFE => 'Reference number of the principal.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PRIO_CONT_REGI_NUMB => 'A previous reference number used to identify a contractor.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PRIO_DATA_UNIV_NUMB_SYST_DUNS_NUMB => 'A previously assigned Data Universal Number System (DUNS) number.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PRIO_POLI_NUMB => 'The number of the prior policy.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PRIO_PURC_ORDE_NUMB => 'Reference number of a purchase order previously sent to the supplier.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PRIO_TRAD_PART_IDEN_NUMB => 'Code specifying an identification number previously assigned to a trading partner.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PROC_PLAN_NUMB => 'Number to identify processing plant.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PROC_BUDG_NUMB => 'A number which uniquely identifies a procurement budget against which commitments or invoices can be allocated.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PROD_CERT_NUMB => 'Number assigned by a governing body (or their agents) to a product which certifies compliance with a standard.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PROD_CHAN_AUTH_NUMB => 'Number which authorises a change in form, fit or function of a product.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PROD_CHAR_DIRE => 'A reference to a product characteristics directory.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PROD_DATA_FILE_NUMB => 'The number of a product data file.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PROD_INQU_NUMB => 'A reference number identifying a previously communicated product inquiry.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PROD_RESE_NUMB => 'Number assigned by seller to identify reservation of specified products.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PROD_SOUR_AGRE_NUMB => 'Reference number assigned to a product sourcing agreement.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PROD_SPEC_REFE_NUMB => 'Number assigned by the issuer to his product specification.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PROD_CODE => 'Number assigned by the manufacturer to a specified article or batch to identify the manufacturing date etc. for subsequent reference.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PROF_NUMB => 'Reference number allocated to a discrete set of criteria.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PROF_INVO_DOCU_IDEN => '[1088] Reference number to identify a proforma invoice.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PROJ_NUMB => 'Reference number assigned to a project.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PROJ_SPEC_NUMB => 'Reference number identifying a project specification.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PROM_DEAL_NUMB => 'Number assigned by a vendor to a special promotion activity.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PROO_OF_DELI_REFE_NUMB => 'A reference number identifying a proof of delivery which is generated by the goods recipient.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PROP_PURC_ORDE_REFE_NUMB => 'A reference number assigned to a proposed purchase order.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PUBL_FILI_REGI_NUMB => 'A number assigned at the time of registration of a public filing.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PUBL_ISSU_NUMB => 'A number assigned to identify a publication issue.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PURC_FOR_EXPO_CUST_AGRE_NUMB => 'A number assigned by a Customs authority allowing the purchase of goods free of tax because they are to be exported immediately after the purchase.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PURC_ORDE_CHAN_NUMB => 'Reference number assigned by a buyer for a revision of a purchase order.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PURC_ORDE_NUMB_SUFF => 'A number added at the end of a purchase order number.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PURC_ORDE_RESP_NUMB => 'Reference number assigned by the seller to an order response.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PURC_REQU_REFE => 'Reference identifying a request made by the purchaser.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::PURC_ACTI_CLAU_NUMB => 'A number indicating a clause applicable to a purchasing activity.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::QUAN_VALU_NUMB => 'Reference number assigned to a quantity valuation.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::QUAN_VALU_REQU_NUMB => 'Reference number assigned to a quantity valuation request.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::QUAR_STAT_REFE_NUMB => 'Coded quarantine/treatment status of a container and its cargo and packing materials, generated by a shipping company based upon declarations presented by a shipper.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::QUOT_NUMB => 'Reference number allocated by a government authority to identify a quota.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::RAIL_WAYB_NUMB => 'The number on a rail waybill.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::RAIL_ROUT_CODE => 'International Western and Eastern European route code used in all rail organizations and specified in the international tariffs (rail tariffs) known by the customers.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::RAIL_CONS_NOTE_NUMB => 'Reference number assigned to a rail consignment note, see: 1001 = 720.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::RAIL_WAGO_NUMB => '(8260) Registered identification initials and numbers of railway wagon. Synonym: Rail car number.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::RATE_CODE_NUMB => 'Number assigned by a buyer to rate a product.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::RATE_NOTE_NUMB => 'Reference assigned to a specific rate.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::RECE_FILE_REFE_NUMB => 'File reference number assigned by the receiver.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::RECE_ADVI_NUMB => 'A reference number to a receiving advice.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::RECE_BANK_AUTH_NUMB => 'Authorization number of the receiving bank.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::RECE_BANK_NUMB => 'Number of the receiving Bankgiro.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::RECE_PART_MEMB_IDEN => 'Identification used by the receiving party for a member of a service scheme or group of persons.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REFE_NUMB_ASSI_BY_THIR_PART => 'Reference number assigned by a third party.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REFE_NUMB_OF_A_REQU_FOR_METE_READ => 'Number to identify a request for a recording or reading of a measuring device to be taken.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REFE_NUMB_QUOT_ON_STAT => 'Reference number quoted on the statement sent to the beneficiary for information purposes.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REFE_NUMB_TO_PREV_MESS => 'Reference number assigned to the message which was previously issued (e.g. in the case of a cancellation, the primary reference of the message to be cancelled will be quoted in this element).',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REFE_TO_ACCO_SERV_BANK_MESS => 'Reference to the account servicing banks message.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REFE_PROD_FOR_CHEM_ANAL => 'A product number identifying the product which is used for chemical analysis considered valid for a group of products.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REFE_PROD_FOR_MECH_ANAL => 'A product number identifying the product which is used for mechanical analysis considered valid for a group of products.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REGI_FEDE_DE_CONT => 'A federal tax identification number assigned by the Mexican tax authority.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REGI_CAPI_REFE => 'Registered capital reference of a company.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REGI_CONT_ACTI_TYPE => 'Reference number identifying the type of registered contractor activity.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REGI_NUMB_OF_PREV_CUST_DECL => 'Registration number of the Customs declaration lodged for the previous Customs procedure.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REGI_INFO_FISC_RIF_NUMB => 'A number assigned by the government to a business in some Latin American countries.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REGI_UNIC_DE_CONT_RUC_NUMB => 'A number assigned by the government to a business in some Latin American countries.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REGI_UNIC_TRIB_RUT => 'Tax identification number in Chile.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REIN_CLAI_NUMB => 'To identify the number assigned to the claim by the reinsurer.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::RELA_DOCU_NUMB => 'Reference number identifying a related document.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::RELA_PART => 'Reference of a related party.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::RELE_NUMB => 'Reference number assigned to identify a release of a set of rules, conventions, conditions, etc.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REMI_ADVI_NUMB => 'A number that identifies a remittance advice.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REMI_BANK_REFE => 'Reference number of the remitting bank.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REPA_DATA_REQU_NUMB => 'A number which uniquely identifies a request for data about repairs.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REPA_ESTI_NUMB => 'A number identifying a repair estimate.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REPL_METE_UNIT_NUMB => 'Number identifying the replaced meter unit.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REPL_PART_NUMB => 'New part number which replaces the existing part number.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REPL_PURC_ORDE_NUMB => 'Purchase order number specified by the buyer for the assignment to vendors replenishment orders in a vendor managed inventory program.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REPL_PURC_ORDE_RANG_END_NUMB => 'Ending number of a range of purchase order numbers assigned by the buyer to vendors replenishment orders.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REPL_PURC_ORDE_RANG_STAR_NUMB => 'Starting number of a range of purchase order numbers assigned by the buyer to vendors replenishment orders.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REPO_NUMB => 'Reference to a report to Customs by a carrier at the point of entry, encompassing both conveyance and consignment information.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REPO_FORM_NUMB => 'Reference number assigned to the reporting form.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REQU_FOR_CANC_NUMB => 'A number that identifies a request for cancellation.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REQU_FOR_QUOT_NUMB => 'Reference number assigned by the requestor to a request for quote.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::REQU_NUMB => 'The reference number of a request.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::RESE_OFFI_IDEN => 'Reference to the office where a reservation was made.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::RESE_STAT_INDE => 'Reference to the station where a reservation was made.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::RESE_GOOD_IDEN => 'A reference number identifying goods in stock which have been reserved for a party.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::RETU_CONT_REFE_NUMB => 'A reference number identifying a returnable container.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::RETU_NOTI_NUMB => 'A reference number to a returns notice.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ROAD_CONS_NOTE_NUMB => 'Reference number assigned to a road consignment note, see: 1001 = 730.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SAFE_CUST_NUMB => 'The number of a file or portfolio kept for safe custody on behalf of clients.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SAFE_DEPO_BOX_NUMB => 'Number of the safe deposit box.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SALE_DEPA_NUMB => 'A number that identifies a sales department.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SALE_FORE_NUMB => 'A reference number identifying a sales forecast.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SALE_OFFI_NUMB => 'A number that identifies a sales office.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SALE_PERS_NUMB => 'Identification number of a sales person.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SALE_REGI_NUMB => 'A number that identifies a sales region.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SALE_REPO_NUMB => 'A reference number identifying a sales report.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SCAN_LINE => 'A number that identifies a scan line.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SCHE_NUMB => 'Reference number assigned to a service scheme or plan.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SECO_BENE_REFE => 'Reference of the second beneficiary.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SECO_CUST_REFE => 'A number that identifies the secondary customs reference.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SECR_NUMB => 'A reference number identifying a secretariat.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SECU_DELI_TERM_AND_COND_AGRE_REFE => 'A reference to a secure delivery terms and conditions agreement. A secured delivery agreement is an agreement containing terms and conditions to secure deliveries in case of failure in the production or logistics process of the supplier.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SELL_CATA_NUMB => 'Identification number assigned to a sellers catalogue.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SELL_REFE_NUMB => 'Reference number assigned to a transaction by the seller.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SEND_CLAU_NUMB => 'The number that identifies the senders clause.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SEND_FILE_REFE_NUMB => 'File reference number assigned by the sender.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SEND_REFE_TO_THE_ORIG_MESS => 'The reference provided by the sender of the original message.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SEND_BANK_REFE_NUMB => 'Reference number of the sending bank.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SEND_BANK_NUMB => 'Number of the sending Bankgiro.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SERI_NUMB => 'Identification number of an item which distinguishes this specific item out of an number of identical items.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SERI_SHIP_CONT_CODE => 'Reference number identifying a logistic unit.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SERV_CATE_REFE => 'Reference identifying the service category.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SERV_GROU_IDEN_NUMB => 'Identification used for a group of services.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SERV_PROV => 'Reference of the service provider.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SERV_RELA_NUMB => 'A reference number identifying the relationship between a service provider and a service client, e.g., treatment of a patient in a hospital, usage by a member of a library facility, etc.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SHIP_FROM => 'A number that identifies a ship from location.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SHIP_NOTI_NUMB => 'The number assigned to a ship notice or manifest.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SHIP_STAY_REFE_NUMB => '(1099) Reference number assigned by a port authority to the stay of a vessel in the port.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SHIP_REFE_NUMB => '[1065] Reference number assigned to a shipment.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SHIP_AUTH_NUMB => 'Reference number assigned by the shipowner as an authorization number to transport certain goods (such as hazardous goods, cool or reefer goods).',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SHIP_LABE_SERI_NUMB => 'The serial number on a shipping label.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SHIP_NOTE_NUMB => '[1123] Reference number assigned to a shipping note.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SHIP_UNIT_IDEN => 'Identifying marks on the outermost unit that is used to transport merchandise.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SID_SHIP_IDEN_NUMB_FOR_SHIP => 'A number that identifies the SID (shippers identification) number for a shipment.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SIGN_CODE_NUMB => 'Reference number to identify a signal.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SING_TRAN_SEQU_NUMB => 'A number that identifies a single transaction sequence.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SITE_SPEC_PROC_TERM_AND_COND_NUMB => 'A number indicating a set of site specific procedures, terms and conditions.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SITU_NUMB => 'Common reference number given to documents concerning a determined period of works.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SLAU_PLAN_NUMB => 'Number to identify slaughter plant.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SLAU_APPR_NUMB => 'Veterinary licence number allocated by a national authority to a slaughterhouse.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SOCI_SECU_NUMB => 'An identification number assigned to an individual by the social security administration.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SOFT_EDIT_REFE => 'Reference identifying the software editor.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SOFT_QUAL_REFE => 'Reference allocated to the software by a quality assurance agency.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SOFT_REFE => 'Reference identifying the software.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SOUR_DOCU_INTE_REFE => 'Reference number assigned to a source document for internal usage.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SPEC_BUDG_ACCO_NUMB => 'The number of a special budget account.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SPEC_INST_NUMB => 'A number indicating a citation used for special instructions.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SPEC_NUMB => 'Number assigned by the issuer to his specification.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SPLI_DELI_NUMB => 'A reference number identifying a split delivery.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::STAN_CARR_ALPH_CODE_SCAC_NUMB => 'For maritime shipments, this code qualifies a Standard Alpha Carrier Code (SCAC) as issued by the United Stated National Motor Traffic Association Inc.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::STAN_INDU_CLAS_SIC_NUMB => 'A number specifying a standard industry classification.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::STAN_NUMB_OF_INSP_DOCU => 'Code identifying the standard number of the inspection document supplied.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::STAN_CODE_NUMB => 'Number to identify a specific parameter within a standardization description (e.g. M5 for screws or DIN A4 for paper).',
            InvoiceSuiteCodelistReferenceCodeQualifiers::STAN_NUMB => 'Number to identify a standardization description (e.g. ISO 9375).',
            InvoiceSuiteCodelistReferenceCodeQualifiers::STAN_VERS_NUMB => 'The version number assigned to a standard.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::STAT_OR_PROV_ASSI_ENTI_IDEN => 'Reference number of an entity assigned by a state or province.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::STAT_NUMB => 'A reference number identifying a statement.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::STAT_OF_WORK => 'A reference number for a statement of work.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::STAT_REFE_NUMB => 'International UIC code assigned to every European rail station (CIM convention).',
            InvoiceSuiteCodelistReferenceCodeQualifiers::STAT_BUND_AMT_SBA_IDEN => 'A German industry classification code issued by Statistic Bundes Amt (SBA) to identify the activity of a company.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::STAT_REPO_NUMB => '(1125) The reference number for a status report.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::STOC_ADJU_NUMB => 'A number identifying a stock adjustment.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::STOC_EXCH_COMP_IDEN => 'A reference assigned by the stock exchange to a company.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::STOC_KEEP_UNIT_NUMB => 'A number that identifies the stock keeping unit.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SUB_FILE => 'Identifies the sub file in a structure of related files.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SUBH_BILL_OF_LADI_NUMB => 'Reference assigned to a sub-house bill of lading.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SUBS_AIR_WAYB_NUMB => 'Reference number assigned to a substitute air waybill, see: 1001 = 743.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SUFFIX => 'A reference to specify a suffix added to the end of a basic identifier.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SUPP_CONT_NUMB => 'Reference to a file regarding a control of the supplier carried out on departure of the goods.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SUPP_CRED_CLAI_REFE_NUMB => 'A reference number identifying a suppliers credit claim.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SUPP_CUST_REFE_NUMB => 'A number, assigned by a supplier, to reference a customer.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SWAP_ORDE_NUMB => 'Number assigned by the seller to a swap order (see definition of DE 1001, code 229).',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SYMB_NUMB => 'A number that identifies a symbol.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SYST_INFO_POUR_LE_REPE_DES_ENTR_SIRE_NUMB => 'An identification number known as a SIREN assigned to a business in France.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::SYST_INFO_POUR_LE_REPE_DES_ETAB_SIRE_NUMB => 'An identification number known as a SIRET assigned to a business location in France.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TARI_NUMB => 'A number that identifies a tariff.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TAX_EXEM_LICE_NUMB => 'Number assigned by the tax authorities to a party indicating its tax exemption authorization. This number could relate to a specified business type, a specified local area or a class of products.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TAX_PAYM_IDEN => '[1168] Reference number identifying a payment of a duty or tax e.g. under a transit procedure.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TAX_REGI_NUMB => 'The registration number by which a company/organization is identified with the tax administration.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TEAM_ASSI_NUMB => 'Team number assigned to a group that is responsible for working a particular transaction.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TECH_DOCU_NUMB => 'A number specifying a technical document.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TECH_ORDE_NUMB => 'A reference to an order that specifies a technical change.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TECH_PHAS_REFE => 'A reference which identifies a specific technical phase.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TECH_REGU => 'Reference number identifying a technical regulation.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TELE_MESS_NUMB => 'Reference number identifying a telex message.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TERM_OPER_CONS_REFE => 'Reference assigned to a consignment by the terminal operator.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TEST_REPO_NUMB => 'Reference number identifying a test report document relevant to the product.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TEST_SPEC_NUMB => 'A reference number identifying a test specification.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TEXT_ELEM_IDEN_DELE_REFE => 'The reference used within a given TEI (Text Element Identifier) which is to be deleted.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::THIR_BANK_REFE => 'Reference number of the third bank.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::THRO_BILL_OF_LADI_NUMB => 'Reference number assigned to a through bill of lading, see: 1001 = 761.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TICK_CONT_NUMB => 'Reference giving access to all the details associated with the ticket.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TIME_SERI_REFE => 'Reference to a time series.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TIR_CARN_NUMB => 'Reference number assigned to a TIR carnet.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TOKY_SHOK_RESE_TSR_BUSI_IDEN => 'A number assigned to a business by TSR.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TOOL_CONT_NUMB => 'A reference number of the tooling contract.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAC_PART_IDEN => 'The party identification number used in the European Unions Trade Control and Expert System (TRACES).',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAD_ACCO_NUMB => 'Number assigned by a Customs authority which uniquely identifies a trader (i.e. importer, exporter or declarant) for Customs purposes.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAD_PART_IDEN_NUMB => 'Code specifying an identification assigned to an entity with whom one conducts trade.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAI_FLIG_NUMB => 'Non-revenue producing airline flight for training purposes.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAN_REFE_NUMB => 'Reference applied to a transaction between two or more parties over a defined life cycle; e.g. number applied by importer or broker to obtain release from Customs, may then used to control declaration through final accounting (synonyms: declaration, entry number).',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAN_NUMB => 'An extra number assigned to goods or a container which functions as a reference number or as an authorization number to get the goods or container released from a certain party.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAN_ONWA_CARR_GUAR_BOND_NUMB => 'Reference number to identify the guarantee or security provided for Customs transit operation (CCC).',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAN_CONT_DOCU_IDEN => '[1188] Reference number to identify a document evidencing a transport contract.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAN_CONT_REFE_NUMB => 'Reference number of a transport contract.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAN_COST_REFE_NUMB => 'Reference number of the transport costs.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAN_EQUI_ACCE_ORDE_REFE => 'Reference number assigned to an order to accept transport equipment that is to be delivered by an inland carrier to a specified facility.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAN_EQUI_GROS_MASS_VERI_ORDE_REFE => 'Reference number identifying the order for obtaining a Verified Gross Mass (weight) of a packed transport equipment as per SOLAS Chapter VI, Regulation 2, paragraphs 4-6.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAN_EQUI_GROS_MASS_VERI_REFE_NUMB => 'Reference number identifying the documentation of a transport equipment gross mass (weight) verification.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAN_EQUI_IDEN => '[8260] To identify a piece if transport equipment e.g. container or unit load device.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAN_EQUI_RELE_ORDE_REFE => 'Reference number assigned to an order to release transport equipment which is to be picked up by an inland carrier from a specified facility.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAN_EQUI_RETU_REFE => 'Reference known at the address to return equipment to.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAN_EQUI_SEAL_IDEN => '[9308] The identification number of a seal affixed to a piece of transport equipment.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAN_EQUI_STRI_ORDE => 'Reference number assigned to the order to strip goods from transport equipment.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAN_EQUI_STUF_ORDE => 'Reference number assigned to the order to stuff goods in transport equipment.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAN_EQUI_SURV_REFE => 'Reference number assigned by the ordering party to the transport equipment survey order.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAN_EQUI_SURV_REFE_NUMB => 'Reference number known at the address where the transport equipment will be or has been surveyed.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAN_EQUI_SURV_REPO_NUMB => 'Reference number used by a party to identify its transport equipment survey report.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAN_INST_NUMB => 'Reference number identifying a transport instruction.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAN_MEAN_JOUR_IDEN => '[8028] To identify a journey of a means of transport, for example voyage number, flight number, trip number.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAN_ROUT => 'A predefined and identified sequence of points where goods are collected, agreed between partners, e.g. the party in charge of organizing the transport and the parties where goods will be collected. The same collecting points may be included in different transport routes, but in a different sequence.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAN_SECT_REFE_NUMB => 'A number identifying a transport section.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAN_STAT_REPO_NUMB => '[1125] A reference number identifying a transport status report.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAN_ACCO_NUMB => 'An account number to be charged or credited for transportation.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAN_CONT_NUMB_TCN => 'A number assigned for transportation purposes.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAN_EXPO_NO_FOR_IN_BOND_MOVE => 'A number that identifies the transportation exportation number for an in bond movement.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRAV_SERV => 'Reference identifying a travel service.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TREA_NUMB => 'A number that identifies a treaty.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::TRUC_BILL_OF_LADI => 'A cargo list/description issued by a motor carrier of freight.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::US_CODE_OF_FEDE_REGU_CFR => 'A reference indicating a citation from the U.S. Code of Federal Regulations (CFR).',
            InvoiceSuiteCodelistReferenceCodeQualifiers::US_DEFE_FEDE_ACQU_REGU_SUPP => 'A reference indicating a citation from the U.S. Defense Federal Acquisition Regulation Supplement.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::US_DEPA_OF_VETE_AFFA_ACQU_REGU => 'A reference indicating a citation from the U.S. Department of Veterans Affairs Acquisition Regulation.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::US_FEDE_ACQU_REGU => 'A reference indicating a citation from the U.S. Federal Acquisition Regulation.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::US_FEDE_INFO_RESO_MANA_REGU => 'A reference indicating a citation from U.S. Federal Information Resources Management Regulation.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::US_GENE_SERV_ADMI_REGU => 'A reference indicating a citation from U.S. General Services Administration Regulation.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ULTI_CUST_ORDE_NUMB => 'The originators order number as forwarded in a sequence of parties involved.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::ULTI_CUST_REFE_NUMB => 'The originators reference number as forwarded in a sequence of parties involved.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::UNIF_RESO_IDEN => 'A string of characters used to identify a name of a resource on the worldwide web.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::UNIQ_CLAI_REFE_NUMB_OF_THE_SEND => 'A number that identifies the unique claims reference of the sender.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::UNIQ_CONS_REFE_NUMB => '[1202] Unique reference identifying a particular consignment of goods. Synonym: UCR, UCRN.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::UNIQ_GOOD_SHIP_IDEN => 'Unique identifier assigned to a shipment of goods linking trade, tracking and transport information.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::UNIQ_MARK_REFE => 'A number that identifies a unique market.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::UNIT_NATI_DANG_GOOD_IDEN => '[7124] United Nations Dangerous Goods Identifier (UNDG) is the unique serial number assigned within the United Nations to substances and articles contained in a list of the dangerous goods most commonly carried.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::UPPE_NUMB_OF_RANG => 'Upper number in a range of numbers.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::US_CUST_SERV_USCS_ENTR_CODE => 'An entry number assigned by the United States (US) customs service.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::US_GOVE_AGEN_NUMB => 'A number that identifies a United States Government agency.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::US_DEPA_OF_TRAN_BOND_SURE_CODE => 'A bond surety code assigned by the United States Department of Transportation (DOT).',
            InvoiceSuiteCodelistReferenceCodeQualifiers::US_FEDE_COMM_COMM_FCC_IMPO_COND_NUMB => 'A number known as the United States Federal Communications Commission (FCC) import condition number applying to certain types of regulated communications equipment.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::US_FOOD_AND_DRUG_ADMI_ESTA_INDI => 'An establishment indicator assigned by the United States Food and Drug Administration.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::VAT_REGI_NUMB => 'Unique number assigned by the relevant tax authority to identify a party for use in relation to Value Added Tax (VAT).',
            InvoiceSuiteCodelistReferenceCodeQualifiers::VEHI_IDEN_NUMB_VIN => 'The identification number which uniquely distinguishes one vehicle from another through the lifespan of the vehicle.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::VEHI_LICE_NUMB => 'Number of the licence issued for a vehicle by an agency of government.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::VEND_CONT_NUMB => 'Number assigned by the vendor to a contract.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::VEND_ID_NUMB => 'A number that identifies a vendors identification.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::VEND_ORDE_NUMB_SUFF => 'The suffix for a vendor order number.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::VEND_PROD_NUMB => 'Number assigned by vendor to another manufacturers product.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::VESS_IDEN => '(8123) Reference identifying a vessel.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::VOUC_NUMB => 'Reference number identifying a voucher.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::VOYA_NUMB => '(8028) Reference number assigned to the voyage of the vessel.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::WAGE_DETE_NUMB => 'A number specifying a wage determination.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::WARE_ENTR_NUMB => 'Entry number under which imported merchandise was placed in a Customs bonded warehouse.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::WARE_RECE_NUMB => 'A number identifying a warehouse receipt.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::WARE_STOR_LOCA_NUMB => 'A number identifying a warehouse storage location.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::WAYB_NUMB => 'Reference number assigned to a waybill, see: 1001 = 700.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::WEIG_AGRE_NUMB => 'A number identifying a weight agreement.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::WELL_NUMB => 'A number assigned to a shaft sunk into the ground.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::WOOL_IDEN_NUMB => 'Shipping Identification Mark (SIM) allocated to a wool consignment by a shipping company.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::WOOL_TAX_REFE_NUMB => 'Reference or indication of the payment of wool tax.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::WORK_BREA_STRU => 'A structure reference that identifies the breakdown of work for a project.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::WORK_ITEM_QUAN_DETE => 'A reference assigned to a work item quantity determination.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::WORK_ORDE => 'Reference number for an order to do work.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::WORK_PACK => 'A reference for a detailed package of work.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::WORK_SHIF => 'A work shift reference number.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::WORK_TASK_CHAR_NUMB => 'A reference assigned to a specific work task charge.',
            InvoiceSuiteCodelistReferenceCodeQualifiers::WORK_TEAM => 'A reference to identify a team performing work.',
        };
    }

    /**
     * Returns the URLs where the data are hosted
     *
     * @return array<int,string>
     *
     * @codeCoverageIgnore
     */
    final public static function getHomepageUrls(): array
    {
        return [
            'https://www.xrepository.de/details/urn:xoev-de:kosit:codeliste:untdid.1153',
        ];
    }

    /**
     * Returns the URLs from where the data was downloaded
     *
     * @return array<int,string>
     *
     * @codeCoverageIgnore
     */
    final public static function getDownloadUrls(): array
    {
        return [
            'https://www.xrepository.de/api/xrepository/urn:xoev-de:kosit:codeliste:untdid.1153_3/download/UNTDID_1153_3.json',
        ];
    }

    /**
     * Returns the ISO formatted date on which this enum was generated
     *
     * @return string
     *
     * @codeCoverageIgnore
     */
    final public static function getCreatedAt(): string
    {
        return '2025-08-30T00:35:49+02:00';
    }
}
