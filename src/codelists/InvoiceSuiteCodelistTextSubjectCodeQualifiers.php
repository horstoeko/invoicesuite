<?php

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\codelists;

/**
 * Class representing list of text subject code qualifiers
 * Name of list: UNTDID 4451 Text subject code qualifier
 *
 * @category InvoiceSuite
 * @package  InvoiceSuite
 * @author   HorstOeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/invoicesuite
 * @see      https://www.xrepository.de/details/urn:xoev-de:kosit:codeliste:untdid.4451
 * @see      https://www.xrepository.de/api/xrepository/urn:xoev-de:kosit:codeliste:untdid.4451_4/download/UNTDID_4451_4.json
 */
enum InvoiceSuiteCodelistTextSubjectCodeQualifiers: string
{
    /**
     * Absence declaration (ACG)
     *
     * A declaration on the reason of the absence.
     */
    case ABSE_DECL = 'ACG';

    /**
     * Acceptance terms additional (ABV)
     *
     * Additional terms concerning acceptance.
     */
    case ACCE_TERM_ADDI = 'ABV';

    /**
     * Access instructions (AIU)
     *
     * Description of how to access an entity.
     */
    case ACCE_INST = 'AIU';

    /**
     * Accountant's comments (AHT)
     *
     * Comments made by an accountant regarding a financial statement.
     */
    case ACCO_COMM = 'AHT';

    /**
     * Accounting information (ABN)
     *
     * [4410] The text contains information related to accounting.
     */
    case ACCO_INFO = 'ABN';

    /**
     * Acknowledgement description (AAE)
     *
     * The content of an acknowledgement.
     */
    case ACKN_DESC = 'AAE';

    /**
     * Additional attribute information (ACF)
     *
     * The text refers to information about an additional attribute not otherwise
     * specified.
     */
    case ADDI_ATTR_INFO = 'ACF';

    /**
     * Additional conditions (ABS)
     *
     * Additional conditions to the issuance of a documentary credit.
     */
    case ADDI_COND = 'ABS';

    /**
     * Additional conditions of sale/purchase (AAJ)
     *
     * Additional conditions specific to this order or project.
     */
    case ADDI_COND_OF_SALE = 'AAJ';

    /**
     * Additional discharge instructions (ADX)
     *
     * Special discharge instructions concerning the goods.
     */
    case ADDI_DISC_INST = 'ADX';

    /**
     * Additional export information (AAZ)
     *
     * The text contains additional export information.
     */
    case ADDI_EXPO_INFO = 'AAZ';

    /**
     * Additional facility information (AIA)
     *
     * Additional information about a facility.
     */
    case ADDI_FACI_INFO = 'AIA';

    /**
     * Additional handling instructions documentary credit (ABI)
     *
     * Additional handling instructions for a documentary credit.
     */
    case ADDI_HAND_INST_DOCU_CRED = 'ABI';

    /**
     * Additional information (ACB)
     *
     * (4270) The text contains additional information.
     */
    case ADDI_INFO = 'ACB';

    /**
     * Additional marks/numbers information (MKS)
     *
     * Additional information regarding the marks and numbers.
     */
    case ADDI_MARK_INFO = 'MKS';

    /**
     * Additional product information address (BAI)
     *
     * Address at which additional information on the product can be found.
     */
    case ADDI_PROD_INFO_ADDR = 'BAI';

    /**
     * Additional terms and/or conditions (documentary credit) (ABE)
     *
     * (4260) Additional terms and/or conditions to the documentary credit.
     */
    case ADDI_TERM_ANDO_COND_DOCU_CRED = 'ABE';

    /**
     * Advertisement information (AIS)
     *
     * The free text contains advertisement information.
     */
    case ADVE_INFO = 'AIS';

    /**
     * Affiliation (AFR)
     *
     * Information concerning an association of one party with another party(ies).
     */
    case AFFILIATION = 'AFR';

    /**
     * Agent (AIE)
     *
     * Information about agents the entity uses.
     */
    case AGENT = 'AIE';

    /**
     * Agent commission (AEV)
     *
     * Instructions about agent commission.
     */
    case AGEN_COMM = 'AEV';

    /**
     * Aggregation statement (ACH)
     *
     * A statement on the way a specific variable or set of variables has been
     * aggregated.
     */
    case AGGR_STAT = 'ACH';

    /**
     * All documents (ALL)
     *
     * The note implies to all documents.
     */
    case ALL_DOCU = 'ALL';

    /**
     * Allowance/charge information (ALC)
     *
     * Information referring to allowance/charge.
     */
    case ALLO_INFO = 'ALC';

    /**
     * Appeals program code (BAU)
     *
     * Identifies information related to an appeals program.
     */
    case APPE_PROG_CODE = 'BAU';

    /**
     * Area boundaries description (AIR)
     *
     * Description of the boundaries of a geographical area.
     */
    case AREA_BOUN_DESC = 'AIR';

    /**
     * Arrival conditions (ARR)
     *
     * Conditions under which arrival takes place.
     */
    case ARRI_COND = 'ARR';

    /**
     * Authentication (AUT)
     *
     * (4130) (4136) (4426) Name, code, password etc. given for authentication
     * purposes.
     */
    case AUTHENTICATION = 'AUT';

    /**
     * Availability of patient (ALO)
     *
     * Details of when and/or where the patient is available.
     */
    case AVAI_OF_PATI = 'ALO';

    /**
     * B2B marketing information, long description (BLW)
     *
     * Trading partner marketing information, long description.
     */
    case BB_MARK_INFO_LONG_DESC = 'BLW';

    /**
     * B2C marketing information, long description (BLX)
     *
     * Consumer marketing information, long description.
     */
    case BC_MARK_INFO_LONG_DESC = 'BLX';

    /**
     * B2C marketing information, short description (BLV)
     *
     * Consumer marketing information, short description.
     */
    case BC_MARK_INFO_SHOR_DESC = 'BLV';

    /**
     * Bank-to-bank information (AEQ)
     *
     * Information given from one bank to another.
     */
    case BANK_INFO = 'AEQ';

    /**
     * Banking arrangements (AFX)
     *
     * Information concerning the general banking arrangements.
     */
    case BANK_ARRA = 'AFX';

    /**
     * Batch code structure (AFF)
     *
     * A description of the structure of a batch code.
     */
    case BATC_CODE_STRU = 'AFF';

    /**
     * Bill of lading remarks (AAS)
     *
     * The remarks printed or to be printed on a bill of lading.
     */
    case BILL_OF_LADI_REMA = 'AAS';

    /**
     * Booked item information (ADS)
     *
     * Information pertaining to a booked item.
     */
    case BOOK_ITEM_INFO = 'ADS';

    /**
     * Borrower (AFS)
     *
     * Information concerning the borrower.
     */
    case BORROWER = 'AFS';

    /**
     * Brand names' description (AFZ)
     *
     * Description of the entity's brands.
     */
    case BRAN_NAME_DESC = 'AFZ';

    /**
     * Business debt (AHC)
     *
     * Description of the business debt(s).
     */
    case BUSI_DEBT = 'AHC';

    /**
     * Business financing details (AGA)
     *
     * Details about the financing of the business.
     */
    case BUSI_FINA_DETA = 'AGA';

    /**
     * Business founder (AFV)
     *
     * Information about the business founder.
     */
    case BUSI_FOUN = 'AFV';

    /**
     * Business history (AFW)
     *
     * Description of the business history.
     */
    case BUSI_HIST = 'AFW';

    /**
     * Business origin (AFY)
     *
     * Description of the business origin.
     */
    case BUSI_ORIG = 'AFY';

    /**
     * Cargo remarks (AEA)
     *
     * Additional remarks concerning the cargo.
     */
    case CARG_REMA = 'AEA';

    /**
     * Carrier's agent counter information (ADP)
     *
     * Information for use at the counter of the carrier's agent.
     */
    case CARR_AGEN_COUN_INFO = 'ADP';

    /**
     * Certification statements (AAY)
     *
     * The text contains certification statements.
     */
    case CERT_STAT = 'AAY';

    /**
     * Change information (CHG)
     *
     * Note contains change information.
     */
    case CHAN_INFO = 'CHG';

    /**
     * Characteristics of goods (ADW)
     *
     * Description of the characteristic of goods in addition to the description
     * of the goods.
     */
    case CHAR_OF_GOOD = 'ADW';

    /**
     * Chargeable category of equipment (ABK)
     *
     * Equipment types are coded by category for financial purposes.
     */
    case CHAR_CATE_OF_EQUI = 'ABK';

    /**
     * Clarification of usage (ADG)
     *
     * Text subject is an explanation of the intended usage of a segment or
     * segment group.
     */
    case CLAR_OF_USAG = 'ADG';

    /**
     * Clearance invoice information (AAV)
     *
     * Information pertaining to the invoice covering clearance of the cargo.
     */
    case CLEA_INVO_INFO = 'AAV';

    /**
     * Clearance place requested (CLP)
     *
     * Name of the place where Customs clearance is asked to be executed as
     * requested by the consignee/consignor.
     */
    case CLEA_PLAC_REQU = 'CLP';

    /**
     * Clinical investigation comment (BLJ)
     *
     * Comment concerning a clinical investigation.
     */
    case CLIN_INVE_COMM = 'BLJ';

    /**
     * Code list name (ADF)
     *
     * Text subject is name of code list.
     */
    case CODE_LIST_NAME = 'ADF';

    /**
     * Code value name (ADE)
     *
     * Text subject is name of code value.
     */
    case CODE_VALU_NAME = 'ADE';

    /**
     * Collection amount instructions (AEY)
     *
     * Instructions about the collection amount.
     */
    case COLL_AMOU_INST = 'AEY';

    /**
     * Comment (AFB)
     *
     * Denotes that the associated text is a comment.
     */
    case COMMENT = 'AFB';

    /**
     * Commercial invoice item description (IND)
     *
     * Free text describing goods on a commercial invoice line.
     */
    case COMM_INVO_ITEM_DESC = 'IND';

    /**
     * Competition (AGB)
     *
     * Information concerning an entity's competition.
     */
    case COMPETITION = 'AGB';

    /**
     * Compilation statement (ACI)
     *
     * A statement on the compilation status of an array or other set of figures
     * or calculations.
     */
    case COMP_STAT = 'ACI';

    /**
     * Composite data element name (ADH)
     *
     * Text subject is name of composite data element.
     */
    case COMP_DATA_ELEM_NAME = 'ADH';

    /**
     * Conditions of sale or purchase (ABC)
     *
     * (4490) (4372) Additional information regarding terms and conditions which
     * apply to the transaction.
     */
    case COND_OF_SALE_OR_PURC = 'ABC';

    /**
     * Confirmation instructions (ABP)
     *
     * Documentary credit confirmation instructions.
     */
    case CONF_INST = 'ABP';

    /**
     * Consignment documentary instruction (SIC)
     *
     * [4284] Instructions given and declarations made by the sender to the
     * carrier concerning Customs, insurance, and other formalities.
     */
    case CONS_DOCU_INST = 'SIC';

    /**
     * Consignment handling instruction (HAN)
     *
     * [4078] Free form description of a set of handling instructions. For example
     * how specified goods, packages or transport equipment (container) should be
     * handled.
     */
    case CONS_HAND_INST = 'HAN';

    /**
     * Consignment information for consignee (ICN)
     *
     * [4070] Any remarks given for the information of the consignee.
     */
    case CONS_INFO_FOR_CONS = 'ICN';

    /**
     * Consignment invoice information (AAU)
     *
     * Information pertaining to the invoice covering the consignment.
     */
    case CONS_INVO_INFO = 'AAU';

    /**
     * Consignment route (RQR)
     *
     * [3050] Description of a route to be used for the transport of goods.
     */
    case CONS_ROUT = 'RQR';

    /**
     * Consignment tariff (TCA)
     *
     * [5430] Free text specification of tariff applied to a consignment.
     */
    case CONS_TARI = 'TCA';

    /**
     * Consignment transport (TDT)
     *
     * [8012] Transport information for commercial purposes (generic term).
     */
    case CONS_TRAN = 'TDT';

    /**
     * Constraint (AFA)
     *
     * Denotes that the associated text is a constraint.
     */
    case CONSTRAINT = 'AFA';

    /**
     * Construction process details (AGC)
     *
     * Details about the construction process.
     */
    case CONS_PROC_DETA = 'AGC';

    /**
     * Construction specialty (AGD)
     *
     * Information concerning the line of business of a construction entity.
     */
    case CONS_SPEC = 'AGD';

    /**
     * Consumer level package marking (BME)
     *
     * Textual representation of the markings on a consumer level package.
     */
    case CONS_LEVE_PACK_MARK = 'BME';

    /**
     * Container stripping instructions (ADY)
     *
     * Instructions regarding the stripping of container(s).
     */
    case CONT_STRI_INST = 'ADY';

    /**
     * Contingent debt (AGI)
     *
     * Details about the contingent debt.
     */
    case CONT_DEBT = 'AGI';

    /**
     * Contract document type (ABD)
     *
     * [4422] Textual representation of the type of contract.
     */
    case CONT_DOCU_TYPE = 'ABD';

    /**
     * Contract information (AGE)
     *
     * Details about contract(s).
     */
    case CONT_INFO = 'AGE';

    /**
     * Controlled atmosphere (AEJ)
     *
     * Information about the controlled atmosphere.
     */
    case CONT_ATMO = 'AEJ';

    /**
     * Conviction details (AGJ)
     *
     * Details about the law or penal codes that resulted in conviction.
     */
    case CONV_DETA = 'AGJ';

    /**
     * Copyright notice (AGH)
     *
     * Information concerning the copyright notice.
     */
    case COPY_NOTI = 'AGH';

    /**
     * Corporate filing (AGF)
     *
     * Details about a corporate filing.
     */
    case CORP_FILI = 'AGF';

    /**
     * Cover page (ADC)
     *
     * Text subject is cover page of the UN/EDIFACT rules for presentation of
     * standardized message and directories documentation.
     */
    case COVE_PAGE = 'ADC';

    /**
     * Credit line (AIW)
     *
     * Description of the line of credit available to an entity.
     */
    case CRED_LINE = 'AIW';

    /**
     * Criminal sentence (AHK)
     *
     * Description of the sentence imposed in a criminal proceeding.
     */
    case CRIM_SENT = 'AHK';

    /**
     * CSC (Container Safety Convention) plate information (ADZ)
     *
     * Information on the CSC (Container Safety Convention) plate that is attached
     * to the container.
     */
    case CSC_CONT_SAFE_CONV_PLAT_INFO = 'ADZ';

    /**
     * Current legal structure (AGX)
     *
     * Details on the current legal structure.
     */
    case CURR_LEGA_STRU = 'AGX';

    /**
     * Customer complaint (AFH)
     *
     * Complaint of customer.
     */
    case CUST_COMP = 'AFH';

    /**
     * Customer information (AGG)
     *
     * Description of customers.
     */
    case CUST_INFO = 'AGG';

    /**
     * Customer remarks (CUR)
     *
     * Remarks from or for a supplier of goods or services.
     */
    case CUST_REMA = 'CUR';

    /**
     * Customs clearance instruction import (CIP)
     *
     * Any coded or clear instruction agreed by customer and carrier regarding the
     * import declaration of the goods.
     */
    case CUST_CLEA_INST_IMPO = 'CIP';

    /**
     * Customs clearance instructions (CCI)
     *
     * Any coded or clear instruction agreed by customer and carrier regarding the
     * declaration of the goods.
     */
    case CUST_CLEA_INST = 'CCI';

    /**
     * Customs clearance instructions export (CEX)
     *
     * Any coded or clear instruction agreed by customer and carrier regarding the
     * export declaration of the goods.
     */
    case CUST_CLEA_INST_EXPO = 'CEX';

    /**
     * Customs declaration information (CUS)
     *
     * (4034) Note contains customs declaration information.
     */
    case CUST_DECL_INFO = 'CUS';

    /**
     * Customs Valuation Information (AVD)
     *
     * Information provided in this category will be used by the trader to make
     * certain declarations in relation to Customs Valuation.
     */
    case CUST_VALU_INFO = 'AVD';

    /**
     * Damage remarks (DAR)
     *
     * Remarks concerning damage on the cargo.
     */
    case DAMA_REMA = 'DAR';

    /**
     * Dangerous goods additional information (AAC)
     *
     * [7488] Additional information concerning dangerous substances and/or
     * article in a consignment.
     */
    case DANG_GOOD_ADDI_INFO = 'AAC';

    /**
     * Dangerous goods technical name (AAD)
     *
     * [7254] Proper shipping name, supplemented as necessary with the correct
     * technical name, by which a dangerous substance or article may be correctly
     * identified, or which is sufficiently informative to permit identification
     * by reference to generally available literature.
     */
    case DANG_GOOD_TECH_NAME = 'AAD';

    /**
     * Defect description (AFJ)
     *
     * Description of the defect.
     */
    case DEFE_DESC = 'AFJ';

    /**
     * Deferred payment termed additional (ABU)
     *
     * Additional terms concerning deferred payment.
     */
    case DEFE_PAYM_TERM_ADDI = 'ABU';

    /**
     * Definitional exception (ACJ)
     *
     * An exception to the agreed definition of a term, concept, formula or other
     * object.
     */
    case DEFI_EXCE = 'ACJ';

    /**
     * Delivery information (DEL)
     *
     * Information about delivery.
     */
    case DELI_INFO = 'DEL';

    /**
     * Delivery instructions (DIN)
     *
     * [4492] Instructions regarding the delivery of the cargo.
     */
    case DELI_INST = 'DIN';

    /**
     * Dependency (syntax) notes (ADD)
     *
     * Denotes that the associated text is a dependency (syntax) note.
     */
    case DEPE_SYNT_NOTE = 'ADD';

    /**
     * Description of amount (AFN)
     *
     * An amount description in clear text.
     */
    case DESC_OF_AMOU = 'AFN';

    /**
     * Description of work item on equipment (ADQ)
     *
     * Description or code for the operation to be executed on the equipment.
     */
    case DESC_OF_WORK_ITEM_ON_EQUI = 'ADQ';

    /**
     * Discrepancy information (ABO)
     *
     * Free text or coded information to indicate a specific discrepancy.
     */
    case DISC_INFO = 'ABO';

    /**
     * Dispute (ACE)
     *
     * A notice, usually from buyer to seller, that something was found wrong with
     * goods delivered or the services rendered, or with the related invoice.
     */
    case DISPUTE = 'ACE';

    /**
     * Division description (AIY)
     *
     * Plain language description of a division of an entity.
     */
    case DIVI_DESC = 'AIY';

    /**
     * Document issuer declaration (DCL)
     *
     * [4020] Text of a declaration made by the issuer of a document.
     */
    case DOCU_ISSU_DECL = 'DCL';

    /**
     * Document name and documentary requirements (ABX)
     *
     * Document name and documentary requirements.
     */
    case DOCU_NAME_AND_DOCU_REQU = 'ABX';

    /**
     * Documentary credit amendment instructions (AEM)
     *
     * Documentary credit amendment instructions.
     */
    case DOCU_CRED_AMEN_INST = 'AEM';

    /**
     * Documentary requirements (ACA)
     *
     * Specification of the documentary requirements.
     */
    case DOCU_REQU = 'ACA';

    /**
     * Documentation instructions (DOC)
     *
     * Instructions pertaining to the documentation.
     */
    case DOCU_INST = 'DOC';

    /**
     * Documents delivery instructions (ABR)
     *
     * Delivery instructions for documents required under a documentary credit.
     */
    case DOCU_DELI_INST = 'ABR';

    /**
     * Domestic routing information (ABJ)
     *
     * Information regarding the domestic routing.
     */
    case DOME_ROUT_INFO = 'ABJ';

    /**
     * Domestically agreed financial statement details (AIF)
     *
     * Details of domestically agreed financial statement.
     */
    case DOME_AGRE_FINA_STAT_DETA = 'AIF';

    /**
     * Duty declaration (DUT)
     *
     * The text contains a statement constituting a duty declaration.
     */
    case DUTY_DECL = 'DUT';

    /**
     * Economic contribution comment (BLL)
     *
     * Comment concerning economic contribution.
     */
    case ECON_CONT_COMM = 'BLL';

    /**
     * Education (AIC)
     *
     * Description of the education of a person.
     */
    case EDUCATION = 'AIC';

    /**
     * Educational degree information (AHQ)
     *
     * Details about the educational degree received from a school.
     */
    case EDUC_DEGR_INFO = 'AHQ';

    /**
     * Educational institution information (AHM)
     *
     * Free form description relating to the school(s) attended.
     */
    case EDUC_INST_INFO = 'AHM';

    /**
     * Effective used routing (EUR)
     *
     * Physical route effectively used for the movement of the means of transport.
     */
    case EFFE_USED_ROUT = 'EUR';

    /**
     * Employee sharing arrangements (AHE)
     *
     * Information describing how a company uses employees from another company.
     */
    case EMPL_SHAR_ARRA = 'AHE';

    /**
     * Entire transaction set (GEN)
     *
     * Note is general in nature, applies to entire transaction segment.
     */
    case ENTI_TRAN_SET = 'GEN';

    /**
     * Equipment (AGK)
     *
     * Description of equipment.
     */
    case EQUIPMENT = 'AGK';

    /**
     * Equipment re-usage restrictions (AAM)
     *
     * Technical or commercial reasons why a piece of equipment may not be re-used
     * after the current transport terminates.
     */
    case EQUI_REUS_REST = 'AAM';

    /**
     * Error description (free text) (AAO)
     *
     * Error described by a free text.
     */
    case ERRO_DESC_FREE_TEXT = 'AAO';

    /**
     * Event (AID)
     *
     * Description of a thing that happens or takes place.
     */
    case EVENT = 'AID';

    /**
     * Event location (AHX)
     *
     * Description of the location of an event.
     */
    case EVEN_LOCA = 'AHX';

    /**
     * Examination result (AJA)
     *
     * The result of an examination.
     */
    case EXAM_RESU = 'AJA';

    /**
     * Examination result comment (BLF)
     *
     * Comment about the result of an examination.
     */
    case EXAM_RESU_COMM = 'BLF';

    /**
     * Examples (ADB)
     *
     * Text subject is examples as given in the example(s) section of the
     * UN/EDIFACT rules for presentation of standardized message and directories
     * documentation.
     */
    case EXAMPLES = 'ADB';

    /**
     * Exemption (AGM)
     *
     * Description about exemptions.
     */
    case EXEMPTION = 'AGM';

    /**
     * Exemption law location (AHU)
     *
     * Description of the exemption provided to a location by a law.
     */
    case EXEM_LAW_LOCA = 'AHU';

    /**
     * Expected delay comment (AVA)
     *
     * Comment about the expected delay.
     */
    case EXPE_DELA_COMM = 'AVA';

    /**
     * External link (BAP)
     *
     * The external link to a digital document (e.g.: URL).
     */
    case EXTE_LINK = 'BAP';

    /**
     * Facility occupancy (AHY)
     *
     * Information related to occupancy of a facility.
     */
    case FACI_OCCU = 'AHY';

    /**
     * Factor assignment clause (ACC)
     *
     * Assignment based on an agreement between seller and factor.
     */
    case FACT_ASSI_CLAU = 'ACC';

    /**
     * Field of application (ADI)
     *
     * Text subject is field of application of the UN/EDIFACT rules for
     * presentation of standardized message and directories documentation.
     */
    case FIEL_OF_APPL = 'ADI';

    /**
     * Filler material information (BMB)
     *
     * Text contains information on the material used for stuffing.
     */
    case FILL_MATE_INFO = 'BMB';

    /**
     * Financial institution (AFU)
     *
     * Description of financial institution(s) used by an entity.
     */
    case FINA_INST = 'AFU';

    /**
     * Financial statement details (AIT)
     *
     * Details regarding the financial statement in free text.
     */
    case FINA_STAT_DETA = 'AIT';

    /**
     * First block to be printed on the transport contract (FBC)
     *
     * The first block of text to be printed on the transport contract.
     */
    case FIRS_BLOC_TO_BE_PRIN_ON_THE_TRAN_CONT = 'FBC';

    /**
     * Fixed part of segment clarification text (ADV)
     *
     * Text subject is fixed part of segment clarification text.
     */
    case FIXE_PART_OF_SEGM_CLAR_TEXT = 'ADV';

    /**
     * Forecast (AHW)
     *
     * Description of a prediction.
     */
    case FORECAST = 'AHW';

    /**
     * Former business activity (AII)
     *
     * Description of the former line of business.
     */
    case FORM_BUSI_ACTI = 'AII';

    /**
     * Functional definition (ADA)
     *
     * Text subject is functional definition section of the UN/EDIFACT rules for
     * presentation of standardized message and directories documentation.
     */
    case FUNC_DEFI = 'ADA';

    /**
     * Further information concerning GGVS par. 7 (GS7)
     *
     * Special permission for road transport of certain goods in the German
     * dangerous goods regulation for road transport.
     */
    case FURT_INFO_CONC_GGVS_PAR = 'GS7';

    /**
     * Future plans (AGN)
     *
     * Information on future plans.
     */
    case FUTU_PLAN = 'AGN';

    /**
     * General information (AAI)
     *
     * The text contains general information.
     */
    case GENE_INFO = 'AAI';

    /**
     * Glossary (ACZ)
     *
     * Text subject is glossary section of the UN/EDIFACT rules for presentation
     * of standardized message and directories documentation.
     */
    case GLOSSARY = 'ACZ';

    /**
     * Goods dimensions in characters (AAL)
     *
     * Expression of a number in characters as length of ten meters.
     */
    case GOOD_DIME_IN_CHAR = 'AAL';

    /**
     * Goods item description (AAA)
     *
     * [7002] Plain language description of the nature of a goods item sufficient
     * to identify it for customs, statistical or transport purposes.
     */
    case GOOD_ITEM_DESC = 'AAA';

    /**
     * Government bill of lading information (GBL)
     *
     * Free text information on a transport document to indicate payment
     * information by Government Bill of Lading.
     */
    case GOVE_BILL_OF_LADI_INFO = 'GBL';

    /**
     * Government information (ABL)
     *
     * Information pertaining to government.
     */
    case GOVE_INFO = 'ABL';

    /**
     * Guarantee (AIL)
     *
     * [4376] Description of guarantee.
     */
    case GUARANTEE = 'AIL';

    /**
     * Handling restriction (AAN)
     *
     * Restrictions in handling depending on the technical characteristics of the
     * piece of equipment or on the nature of the goods.
     */
    case HAND_REST = 'AAN';

    /**
     * Hazard information (HAZ)
     *
     * Information pertaining to a hazard.
     */
    case HAZA_INFO = 'HAZ';

    /**
     * Help text (AFD)
     *
     * Denotes that the associated text is an item of help text.
     */
    case HELP_TEXT = 'AFD';

    /**
     * Holding company operation (AIM)
     *
     * Description of the operation of a holding company.
     */
    case HOLD_COMP_OPER = 'AIM';

    /**
     * Import and export details (AHZ)
     *
     * Specific information provided about the importation and exportation of
     * goods.
     */
    case IMPO_AND_EXPO_DETA = 'AHZ';

    /**
     * Information for railway purpose (IRP)
     *
     * Data entered by railway stations when required, e.g. specified trains,
     * additional sheets for freight calculations, special measures, etc.
     */
    case INFO_FOR_RAIL_PURP = 'IRP';

    /**
     * Information to be printed on despatch advice (BAJ)
     *
     * Specification of free text information which is to be printed on a despatch
     * advice.
     */
    case INFO_TO_BE_PRIN_ON_DESP_ADVI = 'BAJ';

    /**
     * Information to the applicant (AEG)
     *
     * Information given to the applicant.
     */
    case INFO_TO_THE_APPL = 'AEG';

    /**
     * Information to the beneficiary (AEF)
     *
     * Information given to the beneficiary.
     */
    case INFO_TO_THE_BENE = 'AEF';

    /**
     * Information/instructions about additional amounts covered (ABT)
     *
     * Additional amounts information/instruction.
     */
    case INFO_ABOU_ADDI_AMOU_COVE = 'ABT';

    /**
     * Inland transport details (ITR)
     *
     * Information concerning the pre-carriage to the port of discharge if by
     * other means than a vessel.
     */
    case INLA_TRAN_DETA = 'ITR';

    /**
     * Instruction to patient (ALJ)
     *
     * Instruction given to a patient.
     */
    case INST_TO_PATI = 'ALJ';

    /**
     * Instruction to physician (ALK)
     *
     * Instruction given to a physician.
     */
    case INST_TO_PHYS = 'ALK';

    /**
     * Instruction to prepare the patient (BLD)
     *
     * Instruction with the purpose of preparing the patient.
     */
    case INST_TO_PREP_THE_PATI = 'BLD';

    /**
     * Instructions or information about partial shipment(s) (ABG)
     *
     * Instructions or information about partial shipment(s).
     */
    case INST_OR_INFO_ABOU_PART_SHIP = 'ABG';

    /**
     * Instructions or information about standby documentary credit (ABF)
     *
     * Instruction or information about a standby documentary credit.
     */
    case INST_OR_INFO_ABOU_STAN_DOCU_CRED = 'ABF';

    /**
     * Instructions or information about transhipment(s) (ABH)
     *
     * Instructions or information about transhipment(s).
     */
    case INST_OR_INFO_ABOU_TRAN = 'ABH';

    /**
     * Instructions to the applicant (AEI)
     *
     * Instructions given to the applicant.
     */
    case INST_TO_THE_APPL = 'AEI';

    /**
     * Instructions to the beneficiary (AEH)
     *
     * Instructions made to the beneficiary.
     */
    case INST_TO_THE_BENE = 'AEH';

    /**
     * Instructions to the collecting bank (AEX)
     *
     * Instructions to the bank, other than the remitting bank, involved in
     * processing the collection.
     */
    case INST_TO_THE_COLL_BANK = 'AEX';

    /**
     * Instructions to the paying and/or accepting and/or negotiating bank (AET)
     *
     * Instructions to the paying and/or accepting and/or negotiating bank.
     */
    case INST_TO_THE_PAYI_ANDO_ACCE_ANDO_NEGO_BANK = 'AET';

    /**
     * Instructions/information about revolving documentary credit (ABZ)
     *
     * Instructions/information about a revolving documentary credit.
     */
    case INST_ABOU_REVO_DOCU_CRED = 'ABZ';

    /**
     * Insurance information (INS)
     *
     * Specific note contains insurance information.
     */
    case INSU_INFO = 'INS';

    /**
     * Insurance instructions (IIN)
     *
     * (4112) Instructions regarding the cargo insurance.
     */
    case INSU_INST = 'IIN';

    /**
     * Intangible asset (AGP)
     *
     * Description of intangible asset(s).
     */
    case INTA_ASSE = 'AGP';

    /**
     * Intercompany relations information (AGS)
     *
     * Description of the intercompany relations.
     */
    case INTE_RELA_INFO = 'AGS';

    /**
     * Interest instructions (AEU)
     *
     * Instructions given about the interest.
     */
    case INTE_INST = 'AEU';

    /**
     * Internal auditing information (AEZ)
     *
     * Text relating to internal auditing information.
     */
    case INTE_AUDI_INFO = 'AEZ';

    /**
     * Intervention description (ALF)
     *
     * Details of an intervention.
     */
    case INTE_DESC = 'ALF';

    /**
     * Interviewee conversation information (AGO)
     *
     * Information concerning the interviewee conversation.
     */
    case INTE_CONV_INFO = 'AGO';

    /**
     * Introduction (ACY)
     *
     * Text subject is introduction section of the UN/EDIFACT rules for
     * presentation of standardized message and directories documentation.
     */
    case INTRODUCTION = 'ACY';

    /**
     * Inventory (AGQ)
     *
     * Description of the inventory.
     */
    case INVENTORY = 'AGQ';

    /**
     * Inventory value (AIB)
     *
     * Description of the value of inventory.
     */
    case INVE_VALU = 'AIB';

    /**
     * Investment (AGR)
     *
     * Description of the investments.
     */
    case INVESTMENT = 'AGR';

    /**
     * Invoice instruction (INV)
     *
     * Note contains invoice instructions.
     */
    case INVO_INST = 'INV';

    /**
     * Invoice mailing instructions (IMI)
     *
     * Instructions as to which freight and charges components have to be mailed
     * to whom.
     */
    case INVO_MAIL_INST = 'IMI';

    /**
     * Joint venture (AGT)
     *
     * Description of the joint venture.
     */
    case JOIN_VENT = 'AGT';

    /**
     * Laboratory result (AJB)
     *
     * The result of a laboratory investigation.
     */
    case LABO_RESU = 'AJB';

    /**
     * Legend (AFE)
     *
     * Denotes that the associated text is a legend.
     */
    case LEGEND = 'AFE';

    /**
     * Legislation (BLP)
     *
     * Information about legislation.
     */
    case LEGISLATION = 'BLP';

    /**
     * Letter of credit information (AAW)
     *
     * Information pertaining to the letter of credit.
     */
    case LETT_OF_CRED_INFO = 'AAW';

    /**
     * Letter of protest (AIO)
     *
     * A letter citing any condition in dispute.
     */
    case LETT_OF_PROT = 'AIO';

    /**
     * License information (AAX)
     *
     * Information pertaining to a license.
     */
    case LICE_INFO = 'AAX';

    /**
     * Line item (LIN)
     *
     * Note contains line item information.
     */
    case LINE_ITEM = 'LIN';

    /**
     * Line of business (AFT)
     *
     * Information concerning an entity's line of business.
     */
    case LINE_OF_BUSI = 'AFT';

    /**
     * Liquidity (AIV)
     *
     * Description of an entity's liquidity.
     */
    case LIQUIDITY = 'AIV';

    /**
     * Loading instruction (LOI)
     *
     * [4080] Instructions where specified packages or containers are to be loaded
     * on a means of transport.
     */
    case LOAD_INST = 'LOI';

    /**
     * Loading remarks (CLR)
     *
     * Instructions concerning the loading of the container.
     */
    case LOAD_REMA = 'CLR';

    /**
     * Loan (AGU)
     *
     * Description of a loan.
     */
    case LOAN = 'AGU';

    /**
     * Location (AGW)
     *
     * Description of a location.
     */
    case LOCATION = 'AGW';

    /**
     * Location Alias (LAN)
     *
     * Alternative name for a location.
     */
    case LOCA_ALIA = 'LAN';

    /**
     * Location short name (BLZ)
     *
     * Short name of a location e.g. for display or printing purposes.
     */
    case LOCA_SHOR_NAME = 'BLZ';

    /**
     * Long term debt (AGV)
     *
     * Description of the long term debt.
     */
    case LONG_TERM_DEBT = 'AGV';

    /**
     * Marital contract (AGY)
     *
     * Details on a marital contract.
     */
    case MARI_CONT = 'AGY';

    /**
     * Maritime Declaration of Health (AVF)
     *
     * Information about Maritime Declaration of Health.
     */
    case MARI_DECL_OF_HEAL = 'AVF';

    /**
     * Marketable securities (AHB)
     *
     * Description of the marketable securities.
     */
    case MARK_SECU = 'AHB';

    /**
     * Marketing activities (AGZ)
     *
     * Information concerning marketing activities.
     */
    case MARK_ACTI = 'AGZ';

    /**
     * Medical history (ABB)
     *
     * Historical details of a patients medical events.
     */
    case MEDI_HIST = 'ABB';

    /**
     * Medical treatment course detail (ALH)
     *
     * Details of a course of medical treatment.
     */
    case MEDI_TREA_COUR_DETA = 'ALH';

    /**
     * Medicinal specification comment (BLK)
     *
     * Comment concerning the specification of a medicinal product.
     */
    case MEDI_SPEC_COMM = 'BLK';

    /**
     * Medicine administration condition (AUV)
     *
     * The event or condition that initiates the administration of a single dose
     * of medicine or a period of treatment.
     */
    case MEDI_ADMI_COND = 'AUV';

    /**
     * Medicine dosage and administration (ALN)
     *
     * Details of medicine dosage and method of administration.
     */
    case MEDI_DOSA_AND_ADMI = 'ALN';

    /**
     * Medicine treatment (ALM)
     *
     * Details of medicine treatment.
     */
    case MEDI_TREA = 'ALM';

    /**
     * Medicine treatment comment (BLE)
     *
     * Comment about treatment with medicine.
     */
    case MEDI_TREA_COMM = 'BLE';

    /**
     * Merger (AHA)
     *
     * Description of a merger.
     */
    case MERGER = 'AHA';

    /**
     * Message definition (ADR)
     *
     * Text subject is message definition.
     */
    case MESS_DEFI = 'ADR';

    /**
     * Message type name (ACX)
     *
     * Text subject is name of message type.
     */
    case MESS_TYPE_NAME = 'ACX';

    /**
     * Meter condition (ADL)
     *
     * Description of the condition of a meter.
     */
    case METE_COND = 'ADL';

    /**
     * Meter reading information (ADM)
     *
     * Information related to a particular reading of a meter.
     */
    case METE_READ_INFO = 'ADM';

    /**
     * Method of issuance (ABQ)
     *
     * Method of issuance of documentary credit.
     */
    case METH_OF_ISSU = 'ABQ';

    /**
     * Miscellaneous charge order (MCO)
     *
     * Free text accounting information on an IATA Air Waybill to indicate payment
     * information by Miscellaneous charge order.
     */
    case MISC_CHAR_ORDE = 'MCO';

    /**
     * Missing goods remarks (BAK)
     *
     * Remarks concerning missing goods.
     */
    case MISS_GOOD_REMA = 'BAK';

    /**
     * Mode of settlement information (AAT)
     *
     * Free text information on an IATA Air Waybill to indicate means by which
     * account is to be settled.
     */
    case MODE_OF_SETT_INFO = 'AAT';

    /**
     * Mutually defined (ZZZ)
     *
     * Note contains information mutually defined by trading partners.
     */
    case MUTU_DEFI = 'ZZZ';

    /**
     * Negotiation terms additional (ABW)
     *
     * Additional terms concerning negotiation.
     */
    case NEGO_TERM_ADDI = 'ABW';

    /**
     * Non-acceptance information (BAL)
     *
     * Information related to the non-acceptance of an order, goods or a
     * consignment.
     */
    case NONA_INFO = 'BAL';

    /**
     * Note (ADU)
     *
     * Text subject is note.
     */
    case NOTE = 'ADU';

    /**
     * Off-dimension information (ACQ)
     *
     * Information relating to differences between the actual transport dimensions
     * and the normally applicable dimensions.
     */
    case OFFD_INFO = 'ACQ';

    /**
     * Onward routing information (ABM)
     *
     * The text contains onward routing information.
     */
    case ONWA_ROUT_INFO = 'ABM';

    /**
     * Order information (COI)
     *
     * Additional information related to an order.
     */
    case ORDE_INFO = 'COI';

    /**
     * Order instruction (ORI)
     *
     * Free text contains order instructions.
     */
    case ORDE_INST = 'ORI';

    /**
     * Organization details (AHF)
     *
     * Description about the organization of a company.
     */
    case ORGA_DETA = 'AHF';

    /**
     * Original legal structure (AHD)
     *
     * Information concerning the original legal structure.
     */
    case ORIG_LEGA_STRU = 'AHD';

    /**
     * Other current asset description (AIG)
     *
     * Description of other current asset.
     */
    case OTHE_CURR_ASSE_DESC = 'AIG';

    /**
     * Other current liability description (AIH)
     *
     * Description of other current liability.
     */
    case OTHE_CURR_LIAB_DESC = 'AIH';

    /**
     * Other service information (OSI)
     *
     * General information created by the sender of general or specific value.
     */
    case OTHE_SERV_INFO = 'OSI';

    /**
     * Package content's description (AAQ)
     *
     * A description of the contents of a package.
     */
    case PACK_CONT_DESC = 'AAQ';

    /**
     * Package material description (BMD)
     *
     * A description of the type of material for packaging beyond the level
     * covered by standards such as UN Recommendation 21.
     */
    case PACK_MATE_DESC = 'BMD';

    /**
     * Packaging information (PKG)
     *
     * Note contains packaging information.
     */
    case PACK_INFO = 'PKG';

    /**
     * Packaging material information (BMA)
     *
     * The text contains a description of the material used for packaging.
     */
    case PACK_MATE_INFO = 'BMA';

    /**
     * Packaging terms information (PKT)
     *
     * The text contains packaging terms information.
     */
    case PACK_TERM_INFO = 'PKT';

    /**
     * Party information (AIQ)
     *
     * Free text information related to a party.
     */
    case PART_INFO = 'AIQ';

    /**
     * Party instructions (AAG)
     *
     * Indicates that the segment contains instructions to be passed on to the
     * identified party.
     */
    case PART_INST = 'AAG';

    /**
     * Passenger baggage information (BAG)
     *
     * Information related to baggage tendered by a passenger, such as odd size
     * indication, tag.
     */
    case PASS_BAGG_INFO = 'BAG';

    /**
     * Pathology result (ALE)
     *
     * The result of a pathology investigation.
     */
    case PATH_RESU = 'ALE';

    /**
     * Patient information (AUW)
     *
     * Information concerning a patient.
     */
    case PATI_INFO = 'AUW';

    /**
     * Payables information (PAY)
     *
     * Note contains payables information.
     */
    case PAYA_INFO = 'PAY';

    /**
     * Payment detail/remittance information (PMD)
     *
     * The free text contains payment details.
     */
    case PAYM_DETA_INFO = 'PMD';

    /**
     * Payment information (PMT)
     *
     * (4438) Note contains payments information.
     */
    case PAYM_INFO = 'PMT';

    /**
     * Payment instructions information (PAI)
     *
     * The free text contains payment instructions information relevant to the
     * message.
     */
    case PAYM_INST_INFO = 'PAI';

    /**
     * Payment term (AAB)
     *
     * [4276] Free form description of the conditions of payment between the
     * parties to a transaction.
     */
    case PAYM_TERM = 'AAB';

    /**
     * Period of time (BLO)
     *
     * Text subject is a period of time.
     */
    case PERI_OF_TIME = 'BLO';

    /**
     * Planned event comment (AUZ)
     *
     * Comment about an event that is planned.
     */
    case PLAN_EVEN_COMM = 'AUZ';

    /**
     * Pre-CARM (BMG)
     *
     * Identifiication of how the transmission should be processed regarding
     * submissions transmitted prior to implementation of Canada Border Services
     * Agency’s Assessment and Revenue Management (CARM) project
     */
    case PRECARM = 'BMG';

    /**
     * Precautionary measure (AUX)
     *
     * Action to be taken to avert possible harmful affects.
     */
    case PREC_MEAS = 'AUX';

    /**
     * Prescription comment (BLI)
     *
     * Comment concerning a specified prescription.
     */
    case PRES_COMM = 'BLI';

    /**
     * Prescription reason (BLH)
     *
     * Details of the reason for a prescription.
     */
    case PRES_REAS = 'BLH';

    /**
     * Previous port of call security information (BLS)
     *
     * Text describing the security information as applicable at the port facility
     * in the previous port where a ship/port interface was conducted.
     */
    case PREV_PORT_OF_CALL_SECU_INFO = 'BLS';

    /**
     * Price calculation formula (PRF)
     *
     * Additional information regarding the price formula used for calculating the
     * item price.
     */
    case PRIC_CALC_FORM = 'PRF';

    /**
     * Price conditions (AAK)
     *
     * Information on the price conditions that are expected or given.
     */
    case PRIC_COND = 'AAK';

    /**
     * Price range (AHH)
     *
     * Information concerning the price range of products made or sold.
     */
    case PRIC_RANG = 'AHH';

    /**
     * Price variation narrative (AEL)
     *
     * Additional information in plain language to support a price variation.
     */
    case PRIC_VARI_NARR = 'AEL';

    /**
     * Principles (ACS)
     *
     * Text subject is principles section of the UN/EDIFACT rules for presentation
     * of standardized message and directories documentation.
     */
    case PRINCIPLES = 'ACS';

    /**
     * Priority information (PRI)
     *
     * (4218) Note contains priority information.
     */
    case PRIO_INFO = 'PRI';

    /**
     * Privacy statement (ACK)
     *
     * A statement on the privacy or confidential nature of an object.
     */
    case PRIV_STAT = 'ACK';

    /**
     * Probable cause of fault (AFI)
     *
     * The probable cause of fault.
     */
    case PROB_CAUS_OF_FAUL = 'AFI';

    /**
     * Processing Instructions (BAR)
     *
     * Instructions for processing.
     */
    case PROC_INST = 'BAR';

    /**
     * Product application (AFG)
     *
     * A general description of the application of a product.
     */
    case PROD_APPL = 'AFG';

    /**
     * Product information (PRD)
     *
     * The text contains product information.
     */
    case PROD_INFO = 'PRD';

    /**
     * Product ingredients (BLY)
     *
     * Information on the ingredient make up of the product.
     */
    case PROD_INGR = 'BLY';

    /**
     * Prognosis (ALI)
     *
     * Details of a prognosis.
     */
    case PROGNOSIS = 'ALI';

    /**
     * Project narrative (AEO)
     *
     * Additional information in plain language to support the project.
     */
    case PROJ_NARR = 'AEO';

    /**
     * Promotion information (ADK)
     *
     * The text contains information about a promotion.
     */
    case PROM_INFO = 'ADK';

    /**
     * Public record details (AHG)
     *
     * Information concerning public records.
     */
    case PUBL_RECO_DETA = 'AHG';

    /**
     * Purchase region (AFQ)
     *
     * Information concerning the region(s) where purchases are made.
     */
    case PURC_REGI = 'AFQ';

    /**
     * Purchasing information (PUR)
     *
     * Note contains purchasing information.
     */
    case PURC_INFO = 'PUR';

    /**
     * Purpose of service (ALQ)
     *
     * Details of the purpose of a service.
     */
    case PURP_OF_SERV = 'ALQ';

    /**
     * Qualifications (AHI)
     *
     * Information on the accomplishments fitting a party for a position.
     */
    case QUALIFICATIONS = 'AHI';

    /**
     * Quality demands/requirements (QQD)
     *
     * Specification of the quality/performance expectations or standards to which
     * the items must conform.
     */
    case QUAL_DEMA = 'QQD';

    /**
     * Quality statement (ACL)
     *
     * A statement on the quality of an object.
     */
    case QUAL_STAT = 'ACL';

    /**
     * Quarantine instructions (QIN)
     *
     * Instructions regarding quarantine, i.e. the period during which an arriving
     * vessel, including its equipment, cargo, crew or passengers, suspected to
     * carry or carrying a contagious disease is detained in strict isolation to
     * prevent the spread of such a disease.
     */
    case QUAR_INST = 'QIN';

    /**
     * Question (AIP)
     *
     * A free text question.
     */
    case QUESTION = 'AIP';

    /**
     * Quotation instruction/information (QUT)
     *
     * Note contains quotation information.
     */
    case QUOT_INST = 'QUT';

    /**
     * Radioactive goods, additional information (AEP)
     *
     * Additional information related to radioactive goods.
     */
    case RADI_GOOD_ADDI_INFO = 'AEP';

    /**
     * Random sample test information (BLN)
     *
     * Information regarding a random sample test.
     */
    case RAND_SAMP_TEST_INFO = 'BLN';

    /**
     * Rate additional information (AAF)
     *
     * Specific details applying to rates.
     */
    case RATE_ADDI_INFO = 'AAF';

    /**
     * Reason (ACD)
     *
     * Reason for a request or response.
     */
    case REASON = 'ACD';

    /**
     * Reason for amending a message (AES)
     *
     * Identification of the reason for amending a message.
     */
    case REAS_FOR_AMEN_A_MESS = 'AES';

    /**
     * Reason for service request (ALP)
     *
     * Details of the reason for a requested service.
     */
    case REAS_FOR_SERV_REQU = 'ALP';

    /**
     * Receivables (REV)
     *
     * The text contains receivables information.
     */
    case RECEIVABLES = 'REV';

    /**
     * Registered activity (AHJ)
     *
     * Information concerning the registered activity.
     */
    case REGI_ACTI = 'AHJ';

    /**
     * Regulatory information (REG)
     *
     * The free text contains information for regulatory authority.
     */
    case REGU_INFO = 'REG';

    /**
     * Reimbursement instructions (AER)
     *
     * Instructions given for reimbursement purposes.
     */
    case REIM_INST = 'AER';

    /**
     * Relay Instructions (BAS)
     *
     * Instructions for relaying.
     */
    case RELA_INST = 'BAS';

    /**
     * Remitting bank instructions (AEW)
     *
     * Instructions to the remitting bank.
     */
    case REMI_BANK_INST = 'AEW';

    /**
     * Repair description (AFK)
     *
     * The description of the work performed during the repair.
     */
    case REPA_DESC = 'AFK';

    /**
     * Reporting instruction (AIZ)
     *
     * Instruction on how to report.
     */
    case REPO_INST = 'AIZ';

    /**
     * Requested location description (AUU)
     *
     * The description of the location requested.
     */
    case REQU_LOCA_DESC = 'AUU';

    /**
     * Requested tariff (TRR)
     *
     * Stipulation of the tariffs to be applied showing, where applicable, special
     * agreement numbers or references.
     */
    case REQU_TARI = 'TRR';

    /**
     * Response (free text) (AAP)
     *
     * Free text of the response to a communication.
     */
    case RESP_FREE_TEXT = 'AAP';

    /**
     * Responsibilities (AFO)
     *
     * Information describing the responsibilities.
     */
    case RESPONSIBILITIES = 'AFO';

    /**
     * Return to origin information (RET)
     *
     * Free text information on an IATA Air Waybill to indicate consignment
     * returned because of non delivery.
     */
    case RETU_TO_ORIG_INFO = 'RET';

    /**
     * Returns information (BAM)
     *
     * Information related to the return of items.
     */
    case RETU_INFO = 'BAM';

    /**
     * Review comments (AFL)
     *
     * Comments relevant to a review.
     */
    case REVI_COMM = 'AFL';

    /**
     * Risk and handling information (RAH)
     *
     * Information concerning risks induced by the goods and/or handling
     * instruction.
     */
    case RISK_AND_HAND_INFO = 'RAH';

    /**
     * Safeguard applicable (BAZ)
     *
     * Identifies safeguard applies
     */
    case SAFE_APPL = 'BAZ';

    /**
     * Safeguard subject (BBB)
     *
     * Identifies if the goods are subject to a safeguard measure
     */
    case SAFE_SUBJ = 'BBB';

    /**
     * Safety information (SAF)
     *
     * The text contains safety information.
     */
    case SAFE_INFO = 'SAF';

    /**
     * Sales (AHO)
     *
     * Description of the sales.
     */
    case SALES = 'AHO';

    /**
     * Sales method (AHL)
     *
     * Description of the selling means.
     */
    case SALE_METH = 'AHL';

    /**
     * Sales territory (AHS)
     *
     * Information on the sales territory.
     */
    case SALE_TERR = 'AHS';

    /**
     * Scope (ACW)
     *
     * Text subject is scope section of the UN/EDIFACT rules for presentation of
     * standardized message and directories documentation.
     */
    case SCOPE = 'ACW';

    /**
     * Section clarification text (AEE)
     *
     * Text subject is section clarification text.
     */
    case SECT_CLAR_TEXT = 'AEE';

    /**
     * Security information (BLT)
     *
     * Text describing security related information (e.g security measures
     * currently in force on a vessel).
     */
    case SECU_INFO = 'BLT';

    /**
     * Security measures requested (BLQ)
     *
     * Text describing security measures that are requested to be executed (e.g.
     * access controls, supervision of ship's stores).
     */
    case SECU_MEAS_REQU = 'BLQ';

    /**
     * Segment name (ACU)
     *
     * Text subject is segment name.
     */
    case SEGM_NAME = 'ACU';

    /**
     * Semantic note (AFC)
     *
     * Denotes that the associated text is a semantic note.
     */
    case SEMA_NOTE = 'AFC';

    /**
     * Service characteristic (AUY)
     *
     * Free text description is related to a service characteristic.
     */
    case SERV_CHAR = 'AUY';

    /**
     * Service request comment (BLG)
     *
     * Comment about the requested service.
     */
    case SERV_REQU_COMM = 'BLG';

    /**
     * Share classifications (AHV)
     *
     * Information about the classes or categories of shares.
     */
    case SHAR_CLAS = 'AHV';

    /**
     * Shareholding information (AHR)
     *
     * General description of shareholding.
     */
    case SHAR_INFO = 'AHR';

    /**
     * Ship line requested (SLR)
     *
     * Shipping line requested to be used for traffic between European continent
     * and U.K. for Ireland.
     */
    case SHIP_LINE_REQU = 'SLR';

    /**
     * Ship-to-ship activity information (BMC)
     *
     * Text contains information on ship-to-ship activities.
     */
    case SHIP_ACTI_INFO = 'BMC';

    /**
     * Signing authority (AIK)
     *
     * Description of the authorized signatory.
     */
    case SIGN_AUTH = 'AIK';

    /**
     * SIMA applicable (BAT)
     *
     * Identifies that Special Import Measures Act applies
     */
    case SIMA_APPL = 'BAT';

    /**
     * SIMA information (CCK)
     *
     * Additional information detailing Special Import Measures Act information
     */
    case SIMA_INFO = 'CCK';

    /**
     * SIMA measure in force (BMF)
     *
     * Identifies the specific Special Import Measures Act measure related to the
     * goods
     */
    case SIMA_MEAS_IN_FORC = 'BMF';

    /**
     * SIMA measure type (BMH)
     *
     * Identification of the type of Special Import Measures Act measure
     */
    case SIMA_MEAS_TYPE = 'BMH';

    /**
     * SIMA security bond (BAX)
     *
     * Identifies that there is a security bond in hand that could theoretically
     * be used to cover Special Import Measures Act charges
     */
    case SIMA_SECU_BOND = 'BAX';

    /**
     * SIMA subject (BAV)
     *
     * Identifies if the goods are subject to a Special Import Measures Act
     * measure.
     */
    case SIMA_SUBJ = 'BAV';

    /**
     * Simple data element name (ACV)
     *
     * Text subject is name of simple data element.
     */
    case SIMP_DATA_ELEM_NAME = 'ACV';

    /**
     * Source of document (ADT)
     *
     * Text subject is source of document.
     */
    case SOUR_OF_DOCU = 'ADT';

    /**
     * Special handling (SPH)
     *
     * Note contains special handling information.
     */
    case SPEC_HAND = 'SPH';

    /**
     * Special instructions (SIN)
     *
     * Special instructions like licence no, high value, handle with care, glass.
     */
    case SPEC_INST = 'SIN';

    /**
     * Special permission concerning package (SPP)
     *
     * Statement that a special permission has been obtained for the packaging,
     * and reference to such permission.
     */
    case SPEC_PERM_CONC_PACK = 'SPP';

    /**
     * Special permission concerning the goods to be transported (SPG)
     *
     * Statement that a special permission has been obtained for the transport
     * (and/or routing) of the goods specified, and reference to such permission.
     */
    case SPEC_PERM_CONC_THE_GOOD_TO_BE_TRAN = 'SPG';

    /**
     * Special permission concerning transport means (SPT)
     *
     * Statement that a special permission has been obtained for the use of the
     * means transport, and reference to such permission.
     */
    case SPEC_PERM_CONC_TRAN_MEAN = 'SPT';

    /**
     * Special permission for transport, generally (SPA)
     *
     * Statement that a special permission has been obtained for the transport
     * (and/or routing) in general, and reference to such permission.
     */
    case SPEC_PERM_FOR_TRAN_GENE = 'SPA';

    /**
     * Special service request (SSR)
     *
     * Request for a special service concerning the transport of the goods.
     */
    case SPEC_SERV_REQU = 'SSR';

    /**
     * Spouse information (AHP)
     *
     * Information about the spouse.
     */
    case SPOU_INFO = 'AHP';

    /**
     * Standard method narrative (AEN)
     *
     * Additional information in plain language to support a standard method.
     */
    case STAN_METH_NARR = 'AEN';

    /**
     * Statistical definition (ACN)
     *
     * The definition of a statistical object such as a value list, concept, or
     * structure definition.
     */
    case STAT_DEFI = 'ACN';

    /**
     * Statistical description (ACM)
     *
     * The description of a statistical object such as a value list, concept, or
     * structure definition.
     */
    case STAT_DESC = 'ACM';

    /**
     * Statistical name (ACO)
     *
     * The name of a statistical object such as a value list, concept or structure
     * definition.
     */
    case STAT_NAME = 'ACO';

    /**
     * Statistical title (ACP)
     *
     * The title of a statistical object such as a value list, concept, or
     * structure definition.
     */
    case STAT_TITL = 'ACP';

    /**
     * Status details (AHN)
     *
     * Describes the status details.
     */
    case STAT_DETA = 'AHN';

    /**
     * Status of a plan (BLM)
     *
     * Comment about the status of a plan.
     */
    case STAT_OF_A_PLAN = 'BLM';

    /**
     * Sub Type Code (CCJ)
     *
     * Code which identifies a secondary form type
     */
    case SUB_TYPE_CODE = 'CCJ';

    /**
     * Sub-line item information (BAN)
     *
     * Note contains information related to sub-line item data.
     */
    case SUBL_ITEM_INFO = 'BAN';

    /**
     * Subsidiary risk number (IATA/DGR) (SRN)
     *
     * Number(s) of subsidiary risks, induced by the goods, according to the valid
     * classification.
     */
    case SUBS_RISK_NUMB_IATA = 'SRN';

    /**
     * Summary of admittance (ALG)
     *
     * Summary description of admittance.
     */
    case SUMM_OF_ADMI = 'ALG';

    /**
     * Supplier (AFP)
     *
     * Information concerning suppliers.
     */
    case SUPPLIER = 'AFP';

    /**
     * Supplier remarks (SUR)
     *
     * Remarks from or for a supplier of goods or services.
     */
    case SUPP_REMA = 'SUR';

    /**
     * Surtax applicable (BAW)
     *
     * Identifies that surtax applies
     */
    case SURT_APPL = 'BAW';

    /**
     * Surtax subject (BAY)
     *
     * Identifies if the goods are subject to a surtax measure
     */
    case SURT_SUBJ = 'BAY';

    /**
     * Take off annotation (AEK)
     *
     * Additional information in plain text to support a take off annotation.
     * Taking off is the process of assessing the quantity work from extracting
     * the measurement from construction documentation.
     */
    case TAKE_OFF_ANNO = 'AEK';

    /**
     * Tariff statements (ABA)
     *
     * Description of parameters relating to a tariff.
     */
    case TARI_STAT = 'ABA';

    /**
     * Tax declaration (TXD)
     *
     * The text contains a statement constituting a tax declaration.
     */
    case TAX_DECL = 'TXD';

    /**
     * Temperature control instructions (AEB)
     *
     * Instruction regarding the temperature control of the cargo.
     */
    case TEMP_CONT_INST = 'AEB';

    /**
     * Temporary approval condition (AVC)
     *
     * The condition under which the approval is considered.
     */
    case TEMP_APPR_COND = 'AVC';

    /**
     * Terms and definition (ACT)
     *
     * Text subject is terms and definition section of the UN/EDIFACT rules for
     * presentation of standardized message and directories documentation.
     */
    case TERM_AND_DEFI = 'ACT';

    /**
     * Terms of delivery (AAR)
     *
     * (4053) Free text of the non Incoterms terms of delivery. For Incoterms,
     * use: 4053.
     */
    case TERM_OF_DELI = 'AAR';

    /**
     * Test information (BAO)
     *
     * Information related to a test.
     */
    case TEST_INFO = 'BAO';

    /**
     * Testing instructions (ITS)
     *
     * Instructions regarding the testing that is required to be carried out on
     * the items in the transaction.
     */
    case TEST_INST = 'ITS';

    /**
     * Text refers to expected data (AEC)
     *
     * Remarks refer to data that was expected.
     */
    case TEXT_REFE_TO_EXPE_DATA = 'AEC';

    /**
     * Text refers to received data (AED)
     *
     * Remarks refer to data that was received.
     */
    case TEXT_REFE_TO_RECE_DATA = 'AED';

    /**
     * Time limit end (CCL)
     *
     * The date the goods exited the economy or warehouse
     */
    case TIME_LIMI_END = 'CCL';

    /**
     * Time limit start (CCM)
     *
     * The date the goods entered the economy or warehouse
     */
    case TIME_LIMI_STAR = 'CCM';

    /**
     * Title (AFM)
     *
     * Denotes that the associated text is a title.
     */
    case TITLE = 'AFM';

    /**
     * Trade name use (AIJ)
     *
     * Description of how a trading name is used.
     */
    case TRAD_NAME_USE = 'AIJ';

    /**
     * Transport contract document clause (BLC)
     *
     * [4180] Clause on a transport document regarding the cargo being consigned.
     * Synonym: Bill of Lading clause.
     */
    case TRAN_CONT_DOCU_CLAU = 'BLC';

    /**
     * Transport contract document remark (BLR)
     *
     * [4244] Remarks concerning the complete consignment to be printed on the
     * transport document. Synonym: Bill of Lading remark.
     */
    case TRAN_CONT_DOCU_REMA = 'BLR';

    /**
     * Transport requirements comment (AVB)
     *
     * Comment about the requirements for transport.
     */
    case TRAN_REQU_COMM = 'AVB';

    /**
     * Transportation information (TRA)
     *
     * General information regarding the transport of the cargo.
     */
    case TRAN_INFO = 'TRA';

    /**
     * Type of assets and liabilities (ADJ)
     *
     * Information describing the type of assets and liabilities.
     */
    case TYPE_OF_ASSE_AND_LIAB = 'ADJ';

    /**
     * Type of survey question (ADO)
     *
     * Type of survey question.
     */
    case TYPE_OF_SURV_QUES = 'ADO';

    /**
     * Type of transaction reason (ADN)
     *
     * Information describing the type of the reason of transaction.
     */
    case TYPE_OF_TRAN_REAS = 'ADN';

    /**
     * Unexpected stops information (ACR)
     *
     * Information relating to unexpected stops during a conveyance.
     */
    case UNEX_STOP_INFO = 'ACR';

    /**
     * Value Added Tax (VAT) margin scheme (AVE)
     *
     * Description of the VAT margin scheme applied.
     */
    case VALU_ADDE_TAX_VAT_MARG_SCHE = 'AVE';

    /**
     * Value for duty information (CCO)
     *
     * Additional information detailing the basis on which the value for duty was
     * determined
     */
    case VALU_FOR_DUTY_INFO = 'CCO';

    /**
     * VAT exemption reason (BAQ)
     *
     * Reason for Value Added Tax (VAT) exemption.
     */
    case VAT_EXEM_REAS = 'BAQ';

    /**
     * Warehouse instruction/information (WHI)
     *
     * Note contains warehouse information.
     */
    case WARE_INST = 'WHI';

    /**
     * Warehouse time limit (CCN)
     *
     * The amount of time goods may remain in the warehouse
     */
    case WARE_TIME_LIMI = 'CCN';

    /**
     * Warranty terms (AIX)
     *
     * Text describing the terms of warranty which apply to a product or service.
     */
    case WARR_TERM = 'AIX';

    /**
     * Waste information (BLU)
     *
     * Text describing waste related information.
     */
    case WAST_INFO = 'BLU';

    /**
     * Workforce description (AGL)
     *
     * Comments about the workforce.
     */
    case WORK_DESC = 'AGL';

    /**
     * X-ray result (ALD)
     *
     * The result of an X-ray examination.
     */
    case XRAY_RESU = 'ALD';

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
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ABSE_DECL => "Absence declaration",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ACCE_TERM_ADDI => "Acceptance terms additional",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ACCE_INST => "Access instructions",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ACCO_COMM => "Accountants comments",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ACCO_INFO => "Accounting information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ACKN_DESC => "Acknowledgement description",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ADDI_ATTR_INFO => "Additional attribute information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ADDI_COND => "Additional conditions",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ADDI_COND_OF_SALE => "Additional conditions of sale/purchase",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ADDI_DISC_INST => "Additional discharge instructions",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ADDI_EXPO_INFO => "Additional export information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ADDI_FACI_INFO => "Additional facility information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ADDI_HAND_INST_DOCU_CRED => "Additional handling instructions documentary credit",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ADDI_INFO => "Additional information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ADDI_MARK_INFO => "Additional marks/numbers information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ADDI_PROD_INFO_ADDR => "Additional product information address",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ADDI_TERM_ANDO_COND_DOCU_CRED => "Additional terms and/or conditions (documentary credit)",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ADVE_INFO => "Advertisement information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::AFFILIATION => "Affiliation",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::AGENT => "Agent",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::AGEN_COMM => "Agent commission",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::AGGR_STAT => "Aggregation statement",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ALL_DOCU => "All documents",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ALLO_INFO => "Allowance/charge information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::APPE_PROG_CODE => "Appeals program code",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::AREA_BOUN_DESC => "Area boundaries description",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ARRI_COND => "Arrival conditions",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::AUTHENTICATION => "Authentication",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::AVAI_OF_PATI => "Availability of patient",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::BB_MARK_INFO_LONG_DESC => "B2B marketing information, long description",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::BC_MARK_INFO_LONG_DESC => "B2C marketing information, long description",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::BC_MARK_INFO_SHOR_DESC => "B2C marketing information, short description",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::BANK_INFO => "Bank-to-bank information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::BANK_ARRA => "Banking arrangements",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::BATC_CODE_STRU => "Batch code structure",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::BILL_OF_LADI_REMA => "Bill of lading remarks",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::BOOK_ITEM_INFO => "Booked item information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::BORROWER => "Borrower",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::BRAN_NAME_DESC => "Brand names description",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::BUSI_DEBT => "Business debt",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::BUSI_FINA_DETA => "Business financing details",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::BUSI_FOUN => "Business founder",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::BUSI_HIST => "Business history",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::BUSI_ORIG => "Business origin",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CARG_REMA => "Cargo remarks",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CARR_AGEN_COUN_INFO => "Carriers agent counter information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CERT_STAT => "Certification statements",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CHAN_INFO => "Change information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CHAR_OF_GOOD => "Characteristics of goods",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CHAR_CATE_OF_EQUI => "Chargeable category of equipment",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CLAR_OF_USAG => "Clarification of usage",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CLEA_INVO_INFO => "Clearance invoice information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CLEA_PLAC_REQU => "Clearance place requested",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CLIN_INVE_COMM => "Clinical investigation comment",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CODE_LIST_NAME => "Code list name",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CODE_VALU_NAME => "Code value name",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::COLL_AMOU_INST => "Collection amount instructions",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::COMMENT => "Comment",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::COMM_INVO_ITEM_DESC => "Commercial invoice item description",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::COMPETITION => "Competition",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::COMP_STAT => "Compilation statement",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::COMP_DATA_ELEM_NAME => "Composite data element name",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::COND_OF_SALE_OR_PURC => "Conditions of sale or purchase",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CONF_INST => "Confirmation instructions",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CONS_DOCU_INST => "Consignment documentary instruction",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CONS_HAND_INST => "Consignment handling instruction",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CONS_INFO_FOR_CONS => "Consignment information for consignee",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CONS_INVO_INFO => "Consignment invoice information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CONS_ROUT => "Consignment route",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CONS_ROUT => "Consignment routing",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CONS_TARI => "Consignment tariff",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CONS_TRAN => "Consignment transport",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CONSTRAINT => "Constraint",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CONS_PROC_DETA => "Construction process details",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CONS_SPEC => "Construction specialty",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CONS_LEVE_PACK_MARK => "Consumer level package marking",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CONT_STRI_INST => "Container stripping instructions",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CONT_DEBT => "Contingent debt",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CONT_DOCU_TYPE => "Contract document type",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CONT_INFO => "Contract information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CONT_ATMO => "Controlled atmosphere",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CONV_DETA => "Conviction details",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::COPY_NOTI => "Copyright notice",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CORP_FILI => "Corporate filing",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::COVE_PAGE => "Cover page",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CRED_LINE => "Credit line",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CRIM_SENT => "Criminal sentence",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CSC_CONT_SAFE_CONV_PLAT_INFO => "CSC (Container Safety Convention) plate information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CURR_LEGA_STRU => "Current legal structure",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CUST_COMP => "Customer complaint",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CUST_INFO => "Customer information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CUST_REMA => "Customer remarks",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CUST_CLEA_INST_IMPO => "Customs clearance instruction import",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CUST_CLEA_INST => "Customs clearance instructions",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CUST_CLEA_INST_EXPO => "Customs clearance instructions export",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CUST_DECL_INFO => "Customs declaration information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CUST_VALU_INFO => "Customs Valuation Information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::DAMA_REMA => "Damage remarks",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::DANG_GOOD_ADDI_INFO => "Dangerous goods additional information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::DANG_GOOD_TECH_NAME => "Dangerous goods technical name",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::DEFE_DESC => "Defect description",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::DEFE_PAYM_TERM_ADDI => "Deferred payment termed additional",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::DEFI_EXCE => "Definitional exception",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::DELI_INFO => "Delivery information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::DELI_INST => "Delivery instructions",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::DEPE_SYNT_NOTE => "Dependency (syntax) notes",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::DESC_OF_AMOU => "Description of amount",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::DESC_OF_WORK_ITEM_ON_EQUI => "Description of work item on equipment",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::DISC_INFO => "Discrepancy information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::DISPUTE => "Dispute",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::DIVI_DESC => "Division description",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::DOCU_ISSU_DECL => "Document issuer declaration",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::DOCU_NAME_AND_DOCU_REQU => "Document name and documentary requirements",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::DOCU_CRED_AMEN_INST => "Documentary credit amendment instructions",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::DOCU_REQU => "Documentary requirements",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::DOCU_INST => "Documentation instructions",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::DOCU_DELI_INST => "Documents delivery instructions",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::DOME_ROUT_INFO => "Domestic routing information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::DOME_AGRE_FINA_STAT_DETA => "Domestically agreed financial statement details",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::DUTY_DECL => "Duty declaration",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ECON_CONT_COMM => "Economic contribution comment",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::EDUCATION => "Education",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::EDUC_DEGR_INFO => "Educational degree information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::EDUC_INST_INFO => "Educational institution information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::EFFE_USED_ROUT => "Effective used routing",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::EMPL_SHAR_ARRA => "Employee sharing arrangements",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ENTI_TRAN_SET => "Entire transaction set",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::EQUIPMENT => "Equipment",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::EQUI_REUS_REST => "Equipment re-usage restrictions",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ERRO_DESC_FREE_TEXT => "Error description (free text)",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::EVENT => "Event",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::EVEN_LOCA => "Event location",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::EXAM_RESU => "Examination result",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::EXAM_RESU_COMM => "Examination result comment",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::EXAMPLES => "Examples",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::EXEMPTION => "Exemption",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::EXEM_LAW_LOCA => "Exemption law location",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::EXPE_DELA_COMM => "Expected delay comment",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::EXTE_LINK => "External link",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::FACI_OCCU => "Facility occupancy",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::FACT_ASSI_CLAU => "Factor assignment clause",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::FIEL_OF_APPL => "Field of application",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::FILL_MATE_INFO => "Filler material information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::FINA_INST => "Financial institution",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::FINA_STAT_DETA => "Financial statement details",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::FIRS_BLOC_TO_BE_PRIN_ON_THE_TRAN_CONT => "First block to be printed on the transport contract",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::FIXE_PART_OF_SEGM_CLAR_TEXT => "Fixed part of segment clarification text",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::FORECAST => "Forecast",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::FORM_BUSI_ACTI => "Former business activity",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::FUNC_DEFI => "Functional definition",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::FURT_INFO_CONC_GGVS_PAR => "Further information concerning GGVS par. 7",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::FUTU_PLAN => "Future plans",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::GENE_INFO => "General information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::GLOSSARY => "Glossary",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::GOOD_DIME_IN_CHAR => "Goods dimensions in characters",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::GOOD_ITEM_DESC => "Goods item description",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::GOVE_BILL_OF_LADI_INFO => "Government bill of lading information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::GOVE_INFO => "Government information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::GUARANTEE => "Guarantee",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::HAND_REST => "Handling restriction",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::HAZA_INFO => "Hazard information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::HELP_TEXT => "Help text",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::HOLD_COMP_OPER => "Holding company operation",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::IMPO_AND_EXPO_DETA => "Import and export details",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INFO_FOR_RAIL_PURP => "Information for railway purpose",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INFO_TO_BE_PRIN_ON_DESP_ADVI => "Information to be printed on despatch advice",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INFO_TO_THE_APPL => "Information to the applicant",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INFO_TO_THE_BENE => "Information to the beneficiary",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INFO_ABOU_ADDI_AMOU_COVE => "Information/instructions about additional amounts covered",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INLA_TRAN_DETA => "Inland transport details",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INST_TO_PATI => "Instruction to patient",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INST_TO_PHYS => "Instruction to physician",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INST_TO_PREP_THE_PATI => "Instruction to prepare the patient",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INST_OR_INFO_ABOU_PART_SHIP => "Instructions or information about partial shipment(s)",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INST_OR_INFO_ABOU_STAN_DOCU_CRED => "Instructions or information about standby documentary credit",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INST_OR_INFO_ABOU_TRAN => "Instructions or information about transhipment(s)",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INST_TO_THE_APPL => "Instructions to the applicant",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INST_TO_THE_BENE => "Instructions to the beneficiary",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INST_TO_THE_COLL_BANK => "Instructions to the collecting bank",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INST_TO_THE_PAYI_ANDO_ACCE_ANDO_NEGO_BANK => "Instructions to the paying and/or accepting and/or negotiating bank",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INST_ABOU_REVO_DOCU_CRED => "Instructions/information about revolving documentary credit",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INSU_INFO => "Insurance information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INSU_INST => "Insurance instructions",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INTA_ASSE => "Intangible asset",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INTE_RELA_INFO => "Intercompany relations information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INTE_INST => "Interest instructions",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INTE_AUDI_INFO => "Internal auditing information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INTE_DESC => "Intervention description",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INTE_CONV_INFO => "Interviewee conversation information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INTRODUCTION => "Introduction",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INVENTORY => "Inventory",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INVE_VALU => "Inventory value",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INVESTMENT => "Investment",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INVO_INST => "Invoice instruction",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INVO_MAIL_INST => "Invoice mailing instructions",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::JOIN_VENT => "Joint venture",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::LABO_RESU => "Laboratory result",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::LEGEND => "Legend",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::LEGISLATION => "Legislation",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::LETT_OF_CRED_INFO => "Letter of credit information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::LETT_OF_PROT => "Letter of protest",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::LICE_INFO => "License information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::LINE_ITEM => "Line item",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::LINE_OF_BUSI => "Line of business",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::LIQUIDITY => "Liquidity",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::LOAD_INST => "Loading instruction",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::LOAD_REMA => "Loading remarks",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::LOAN => "Loan",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::LOCATION => "Location",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::LOCA_ALIA => "Location Alias",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::LOCA_SHOR_NAME => "Location short name",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::LONG_TERM_DEBT => "Long term debt",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::MARI_CONT => "Marital contract",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::MARI_DECL_OF_HEAL => "Maritime Declaration of Health",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::MARI_DECL_OF_HEAL => "Maritime Declaration of Health",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::MARI_DECL_OF_HEAL => "Maritime Declaration of Health",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::MARK_SECU => "Marketable securities",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::MARK_ACTI => "Marketing activities",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::MEDI_HIST => "Medical history",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::MEDI_TREA_COUR_DETA => "Medical treatment course detail",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::MEDI_SPEC_COMM => "Medicinal specification comment",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::MEDI_ADMI_COND => "Medicine administration condition",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::MEDI_DOSA_AND_ADMI => "Medicine dosage and administration",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::MEDI_TREA => "Medicine treatment",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::MEDI_TREA_COMM => "Medicine treatment comment",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::MERGER => "Merger",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::MESS_DEFI => "Message definition",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::MESS_TYPE_NAME => "Message type name",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::METE_COND => "Meter condition",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::METE_READ_INFO => "Meter reading information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::METH_OF_ISSU => "Method of issuance",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::MISC_CHAR_ORDE => "Miscellaneous charge order",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::MISS_GOOD_REMA => "Missing goods remarks",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::MODE_OF_SETT_INFO => "Mode of settlement information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::MUTU_DEFI => "Mutually defined",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::NEGO_TERM_ADDI => "Negotiation terms additional",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::NONA_INFO => "Non-acceptance information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::NOTE => "Note",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::OFFD_INFO => "Off-dimension information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ONWA_ROUT_INFO => "Onward routing information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ORDE_INFO => "Order information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ORDE_INST => "Order instruction",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ORGA_DETA => "Organization details",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ORIG_LEGA_STRU => "Original legal structure",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::OTHE_CURR_ASSE_DESC => "Other current asset description",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::OTHE_CURR_LIAB_DESC => "Other current liability description",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::OTHE_SERV_INFO => "Other service information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PACK_CONT_DESC => "Package contents description",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PACK_MATE_DESC => "Package material description",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PACK_INFO => "Packaging information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PACK_MATE_INFO => "Packaging material information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PACK_TERM_INFO => "Packaging terms information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PACK_INFO => "Packing/marking information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PART_INFO => "Party information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PART_INST => "Party instructions",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PASS_BAGG_INFO => "Passenger baggage information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PATH_RESU => "Pathology result",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PATI_INFO => "Patient information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PAYA_INFO => "Payables information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PAYM_DETA_INFO => "Payment detail/remittance information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PAYM_INFO => "Payment information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PAYM_INST_INFO => "Payment instructions information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PAYM_TERM => "Payment term",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PERI_OF_TIME => "Period of time",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PLAN_EVEN_COMM => "Planned event comment",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PRECARM => "Pre-CARM",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PREC_MEAS => "Precautionary measure",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PRES_COMM => "Prescription comment",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PRES_REAS => "Prescription reason",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PREV_PORT_OF_CALL_SECU_INFO => "Previous port of call security information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PRIC_CALC_FORM => "Price calculation formula",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PRIC_COND => "Price conditions",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PRIC_RANG => "Price range",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PRIC_VARI_NARR => "Price variation narrative",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PRINCIPLES => "Principles",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PRIO_INFO => "Priority information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PRIV_STAT => "Privacy statement",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PROB_CAUS_OF_FAUL => "Probable cause of fault",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PROC_INST => "Processing Instructions",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PROD_APPL => "Product application",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PROD_INFO => "Product information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PROD_INGR => "Product ingredients",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PROGNOSIS => "Prognosis",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PROJ_NARR => "Project narrative",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PROM_INFO => "Promotion information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PUBL_RECO_DETA => "Public record details",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PURC_REGI => "Purchase region",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PURC_INFO => "Purchasing information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PURP_OF_SERV => "Purpose of service",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::QUALIFICATIONS => "Qualifications",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::QUAL_DEMA => "Quality demands/requirements",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::QUAL_STAT => "Quality statement",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::QUAR_INST => "Quarantine instructions",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::QUESTION => "Question",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::QUOT_INST => "Quotation instruction/information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::RADI_GOOD_ADDI_INFO => "Radioactive goods, additional information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::RAND_SAMP_TEST_INFO => "Random sample test information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::RATE_ADDI_INFO => "Rate additional information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::REASON => "Reason",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::REAS_FOR_AMEN_A_MESS => "Reason for amending a message",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::REAS_FOR_SERV_REQU => "Reason for service request",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::RECEIVABLES => "Receivables",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::REGI_ACTI => "Registered activity",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::REGU_INFO => "Regulatory information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::REIM_INST => "Reimbursement instructions",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::RELA_INST => "Relay Instructions",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::REMI_BANK_INST => "Remitting bank instructions",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::REPA_DESC => "Repair description",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::REPO_INST => "Reporting instruction",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::REQU_LOCA_DESC => "Requested location description",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::REQU_TARI => "Requested tariff",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::RESP_FREE_TEXT => "Response (free text)",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::RESPONSIBILITIES => "Responsibilities",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::RETU_TO_ORIG_INFO => "Return to origin information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::RETU_INFO => "Returns information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::REVI_COMM => "Review comments",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::RISK_AND_HAND_INFO => "Risk and handling information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SAFE_APPL => "Safeguard applicable",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SAFE_APPL => "Safeguard applicable",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SAFE_SUBJ => "Safeguard subject",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SAFE_INFO => "Safety information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SALES => "Sales",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SALE_METH => "Sales method",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SALE_TERR => "Sales territory",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SCOPE => "Scope",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SECT_CLAR_TEXT => "Section clarification text",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SECU_INFO => "Security information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SECU_MEAS_REQU => "Security measures requested",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SEGM_NAME => "Segment name",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SEMA_NOTE => "Semantic note",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SERV_CHAR => "Service characteristic",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SERV_REQU_COMM => "Service request comment",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SERV_REQU_COMM => "Service requesters comment",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SHAR_CLAS => "Share classifications",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SHAR_INFO => "Shareholding information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SHIP_LINE_REQU => "Ship line requested",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SHIP_ACTI_INFO => "Ship-to-ship activity information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SIGN_AUTH => "Signing authority",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SIMA_APPL => "SIMA applicable",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SIMA_INFO => "SIMA information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SIMA_MEAS_IN_FORC => "SIMA measure in force",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SIMA_MEAS_TYPE => "SIMA measure type",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SIMA_SECU_BOND => "SIMA security bond",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SIMA_SUBJ => "SIMA subject",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SIMP_DATA_ELEM_NAME => "Simple data element name",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SOUR_OF_DOCU => "Source of document",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SPEC_HAND => "Special handling",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SPEC_INST => "Special instructions",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SPEC_PERM_CONC_PACK => "Special permission concerning package",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SPEC_PERM_CONC_THE_GOOD_TO_BE_TRAN => "Special permission concerning the goods to be transported",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SPEC_PERM_CONC_TRAN_MEAN => "Special permission concerning transport means",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SPEC_PERM_FOR_TRAN_GENE => "Special permission for transport, generally",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SPEC_SERV_REQU => "Special service request",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SPOU_INFO => "Spouse information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::STAN_METH_NARR => "Standard method narrative",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::STAT_DEFI => "Statistical definition",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::STAT_DESC => "Statistical description",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::STAT_NAME => "Statistical name",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::STAT_TITL => "Statistical title",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::STAT_DETA => "Status details",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::STAT_OF_A_PLAN => "Status of a plan",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SUB_TYPE_CODE => "Sub Type Code",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SUBL_ITEM_INFO => "Sub-line item information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SUBS_RISK_NUMB_IATA => "Subsidiary risk number (IATA/DGR)",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SUMM_OF_ADMI => "Summary of admittance",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SUPPLIER => "Supplier",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SUPP_REMA => "Supplier remarks",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SURT_APPL => "Surtax applicable",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SURT_SUBJ => "Surtax subject",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::TAKE_OFF_ANNO => "Take off annotation",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::TARI_STAT => "Tariff statements",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::TAX_DECL => "Tax declaration",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::TEMP_CONT_INST => "Temperature control instructions",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::TEMP_APPR_COND => "Temporary approval condition",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::TERM_AND_DEFI => "Terms and definition",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::TERM_OF_DELI => "Terms of delivery",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::TEST_INFO => "Test information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::TEST_INST => "Testing instructions",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::TEXT_REFE_TO_EXPE_DATA => "Text refers to expected data",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::TEXT_REFE_TO_RECE_DATA => "Text refers to received data",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::TIME_LIMI_END => "Time limit end",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::TIME_LIMI_STAR => "Time limit start",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::TITLE => "Title",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::TRAD_NAME_USE => "Trade name use",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::TRAN_CONT_DOCU_CLAU => "Transport contract document clause",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::TRAN_CONT_DOCU_REMA => "Transport contract document remark",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::TRAN_REQU_COMM => "Transport requirements comment",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::TRAN_INFO => "Transportation information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::TYPE_OF_ASSE_AND_LIAB => "Type of assets and liabilities",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::TYPE_OF_SURV_QUES => "Type of survey question",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::TYPE_OF_TRAN_REAS => "Type of transaction reason",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::UNEX_STOP_INFO => "Unexpected stops information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::VALU_ADDE_TAX_VAT_MARG_SCHE => "Value Added Tax (VAT) margin scheme",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::VALU_FOR_DUTY_INFO => "Value for duty information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::VAT_EXEM_REAS => "VAT exemption reason",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::WARE_INST => "Warehouse instruction/information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::WARE_TIME_LIMI => "Warehouse time limit",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::WARR_TERM => "Warranty terms",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::WAST_INFO => "Waste information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::WORK_DESC => "Workforce description",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::XRAY_RESU => "X-ray result",
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
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ABSE_DECL => "A declaration on the reason of the absence.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ACCE_TERM_ADDI => "Additional terms concerning acceptance.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ACCE_INST => "Description of how to access an entity.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ACCO_COMM => "Comments made by an accountant regarding a financial statement.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ACCO_INFO => "[4410] The text contains information related to accounting.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ACKN_DESC => "The content of an acknowledgement.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ADDI_ATTR_INFO => "The text refers to information about an additional attribute not otherwise specified.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ADDI_COND => "Additional conditions to the issuance of a documentary credit.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ADDI_COND_OF_SALE => "Additional conditions specific to this order or project.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ADDI_DISC_INST => "Special discharge instructions concerning the goods.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ADDI_EXPO_INFO => "The text contains additional export information.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ADDI_FACI_INFO => "Additional information about a facility.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ADDI_HAND_INST_DOCU_CRED => "Additional handling instructions for a documentary credit.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ADDI_INFO => "(4270) The text contains additional information.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ADDI_MARK_INFO => "Additional information regarding the marks and numbers.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ADDI_PROD_INFO_ADDR => "Address at which additional information on the product can be found.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ADDI_TERM_ANDO_COND_DOCU_CRED => "(4260) Additional terms and/or conditions to the documentary credit.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ADVE_INFO => "The free text contains advertisement information.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::AFFILIATION => "Information concerning an association of one party with another party(ies).",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::AGENT => "Information about agents the entity uses.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::AGEN_COMM => "Instructions about agent commission.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::AGGR_STAT => "A statement on the way a specific variable or set of variables has been aggregated.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ALL_DOCU => "The note implies to all documents.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ALLO_INFO => "Information referring to allowance/charge.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::APPE_PROG_CODE => "Identifies information related to an appeals program.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::AREA_BOUN_DESC => "Description of the boundaries of a geographical area.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ARRI_COND => "Conditions under which arrival takes place.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::AUTHENTICATION => "(4130) (4136) (4426) Name, code, password etc. given for authentication purposes.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::AVAI_OF_PATI => "Details of when and/or where the patient is available.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::BB_MARK_INFO_LONG_DESC => "Trading partner marketing information, long description.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::BC_MARK_INFO_LONG_DESC => "Consumer marketing information, long description.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::BC_MARK_INFO_SHOR_DESC => "Consumer marketing information, short description.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::BANK_INFO => "Information given from one bank to another.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::BANK_ARRA => "Information concerning the general banking arrangements.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::BATC_CODE_STRU => "A description of the structure of a batch code.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::BILL_OF_LADI_REMA => "The remarks printed or to be printed on a bill of lading.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::BOOK_ITEM_INFO => "Information pertaining to a booked item.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::BORROWER => "Information concerning the borrower.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::BRAN_NAME_DESC => "Description of the entitys brands.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::BUSI_DEBT => "Description of the business debt(s).",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::BUSI_FINA_DETA => "Details about the financing of the business.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::BUSI_FOUN => "Information about the business founder.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::BUSI_HIST => "Description of the business history.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::BUSI_ORIG => "Description of the business origin.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CARG_REMA => "Additional remarks concerning the cargo.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CARR_AGEN_COUN_INFO => "Information for use at the counter of the carriers agent.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CERT_STAT => "The text contains certification statements.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CHAN_INFO => "Note contains change information.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CHAR_OF_GOOD => "Description of the characteristic of goods in addition to the description of the goods.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CHAR_CATE_OF_EQUI => "Equipment types are coded by category for financial purposes.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CLAR_OF_USAG => "Text subject is an explanation of the intended usage of a segment or segment group.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CLEA_INVO_INFO => "Information pertaining to the invoice covering clearance of the cargo.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CLEA_PLAC_REQU => "Name of the place where Customs clearance is asked to be executed as requested by the consignee/consignor.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CLIN_INVE_COMM => "Comment concerning a clinical investigation.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CODE_LIST_NAME => "Text subject is name of code list.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CODE_VALU_NAME => "Text subject is name of code value.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::COLL_AMOU_INST => "Instructions about the collection amount.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::COMMENT => "Denotes that the associated text is a comment.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::COMM_INVO_ITEM_DESC => "Free text describing goods on a commercial invoice line.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::COMPETITION => "Information concerning an entitys competition.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::COMP_STAT => "A statement on the compilation status of an array or other set of figures or calculations.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::COMP_DATA_ELEM_NAME => "Text subject is name of composite data element.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::COND_OF_SALE_OR_PURC => "(4490) (4372) Additional information regarding terms and conditions which apply to the transaction.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CONF_INST => "Documentary credit confirmation instructions.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CONS_DOCU_INST => "[4284] Instructions given and declarations made by the sender to the carrier concerning Customs, insurance, and other formalities.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CONS_HAND_INST => "[4078] Free form description of a set of handling instructions. For example how specified goods, packages or transport equipment (container) should be handled.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CONS_INFO_FOR_CONS => "[4070] Any remarks given for the information of the consignee.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CONS_INVO_INFO => "Information pertaining to the invoice covering the consignment.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CONS_ROUT => "[3050] Description of a route to be used for the transport of goods.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CONS_ROUT => "Information on routing of the consignment.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CONS_TARI => "[5430] Free text specification of tariff applied to a consignment.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CONS_TRAN => "[8012] Transport information for commercial purposes (generic term).",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CONSTRAINT => "Denotes that the associated text is a constraint.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CONS_PROC_DETA => "Details about the construction process.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CONS_SPEC => "Information concerning the line of business of a construction entity.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CONS_LEVE_PACK_MARK => "Textual representation of the markings on a consumer level package.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CONT_STRI_INST => "Instructions regarding the stripping of container(s).",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CONT_DEBT => "Details about the contingent debt.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CONT_DOCU_TYPE => "[4422] Textual representation of the type of contract.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CONT_INFO => "Details about contract(s).",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CONT_ATMO => "Information about the controlled atmosphere.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CONV_DETA => "Details about the law or penal codes that resulted in conviction.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::COPY_NOTI => "Information concerning the copyright notice.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CORP_FILI => "Details about a corporate filing.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::COVE_PAGE => "Text subject is cover page of the UN/EDIFACT rules for presentation of standardized message and directories documentation.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CRED_LINE => "Description of the line of credit available to an entity.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CRIM_SENT => "Description of the sentence imposed in a criminal proceeding.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CSC_CONT_SAFE_CONV_PLAT_INFO => "Information on the CSC (Container Safety Convention) plate that is attached to the container.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CURR_LEGA_STRU => "Details on the current legal structure.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CUST_COMP => "Complaint of customer.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CUST_INFO => "Description of customers.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CUST_REMA => "Remarks from or for a supplier of goods or services.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CUST_CLEA_INST_IMPO => "Any coded or clear instruction agreed by customer and carrier regarding the import declaration of the goods.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CUST_CLEA_INST => "Any coded or clear instruction agreed by customer and carrier regarding the declaration of the goods.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CUST_CLEA_INST_EXPO => "Any coded or clear instruction agreed by customer and carrier regarding the export declaration of the goods.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CUST_DECL_INFO => "(4034) Note contains customs declaration information.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::CUST_VALU_INFO => "Information provided in this category will be used by the trader to make certain declarations in relation to Customs Valuation.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::DAMA_REMA => "Remarks concerning damage on the cargo.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::DANG_GOOD_ADDI_INFO => "[7488] Additional information concerning dangerous substances and/or article in a consignment.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::DANG_GOOD_TECH_NAME => "[7254] Proper shipping name, supplemented as necessary with the correct technical name, by which a dangerous substance or article may be correctly identified, or which is sufficiently informative to permit identification by reference to generally available literature.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::DEFE_DESC => "Description of the defect.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::DEFE_PAYM_TERM_ADDI => "Additional terms concerning deferred payment.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::DEFI_EXCE => "An exception to the agreed definition of a term, concept, formula or other object.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::DELI_INFO => "Information about delivery.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::DELI_INST => "[4492] Instructions regarding the delivery of the cargo.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::DEPE_SYNT_NOTE => "Denotes that the associated text is a dependency (syntax) note.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::DESC_OF_AMOU => "An amount description in clear text.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::DESC_OF_WORK_ITEM_ON_EQUI => "Description or code for the operation to be executed on the equipment.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::DISC_INFO => "Free text or coded information to indicate a specific discrepancy.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::DISPUTE => "A notice, usually from buyer to seller, that something was found wrong with goods delivered or the services rendered, or with the related invoice.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::DIVI_DESC => "Plain language description of a division of an entity.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::DOCU_ISSU_DECL => "[4020] Text of a declaration made by the issuer of a document.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::DOCU_NAME_AND_DOCU_REQU => "Document name and documentary requirements.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::DOCU_CRED_AMEN_INST => "Documentary credit amendment instructions.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::DOCU_REQU => "Specification of the documentary requirements.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::DOCU_INST => "Instructions pertaining to the documentation.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::DOCU_DELI_INST => "Delivery instructions for documents required under a documentary credit.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::DOME_ROUT_INFO => "Information regarding the domestic routing.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::DOME_AGRE_FINA_STAT_DETA => "Details of domestically agreed financial statement.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::DUTY_DECL => "The text contains a statement constituting a duty declaration.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ECON_CONT_COMM => "Comment concerning economic contribution.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::EDUCATION => "Description of the education of a person.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::EDUC_DEGR_INFO => "Details about the educational degree received from a school.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::EDUC_INST_INFO => "Free form description relating to the school(s) attended.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::EFFE_USED_ROUT => "Physical route effectively used for the movement of the means of transport.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::EMPL_SHAR_ARRA => "Information describing how a company uses employees from another company.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ENTI_TRAN_SET => "Note is general in nature, applies to entire transaction segment.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::EQUIPMENT => "Description of equipment.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::EQUI_REUS_REST => "Technical or commercial reasons why a piece of equipment may not be re-used after the current transport terminates.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ERRO_DESC_FREE_TEXT => "Error described by a free text.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::EVENT => "Description of a thing that happens or takes place.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::EVEN_LOCA => "Description of the location of an event.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::EXAM_RESU => "The result of an examination.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::EXAM_RESU_COMM => "Comment about the result of an examination.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::EXAMPLES => "Text subject is examples as given in the example(s) section of the UN/EDIFACT rules for presentation of standardized message and directories documentation.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::EXEMPTION => "Description about exemptions.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::EXEM_LAW_LOCA => "Description of the exemption provided to a location by a law.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::EXPE_DELA_COMM => "Comment about the expected delay.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::EXTE_LINK => "The external link to a digital document (e.g.: URL).",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::FACI_OCCU => "Information related to occupancy of a facility.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::FACT_ASSI_CLAU => "Assignment based on an agreement between seller and factor.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::FIEL_OF_APPL => "Text subject is field of application of the UN/EDIFACT rules for presentation of standardized message and directories documentation.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::FILL_MATE_INFO => "Text contains information on the material used for stuffing.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::FINA_INST => "Description of financial institution(s) used by an entity.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::FINA_STAT_DETA => "Details regarding the financial statement in free text.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::FIRS_BLOC_TO_BE_PRIN_ON_THE_TRAN_CONT => "The first block of text to be printed on the transport contract.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::FIXE_PART_OF_SEGM_CLAR_TEXT => "Text subject is fixed part of segment clarification text.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::FORECAST => "Description of a prediction.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::FORM_BUSI_ACTI => "Description of the former line of business.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::FUNC_DEFI => "Text subject is functional definition section of the UN/EDIFACT rules for presentation of standardized message and directories documentation.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::FURT_INFO_CONC_GGVS_PAR => "Special permission for road transport of certain goods in the German dangerous goods regulation for road transport.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::FUTU_PLAN => "Information on future plans.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::GENE_INFO => "The text contains general information.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::GLOSSARY => "Text subject is glossary section of the UN/EDIFACT rules for presentation of standardized message and directories documentation.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::GOOD_DIME_IN_CHAR => "Expression of a number in characters as length of ten meters.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::GOOD_ITEM_DESC => "[7002] Plain language description of the nature of a goods item sufficient to identify it for customs, statistical or transport purposes.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::GOVE_BILL_OF_LADI_INFO => "Free text information on a transport document to indicate payment information by Government Bill of Lading.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::GOVE_INFO => "Information pertaining to government.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::GUARANTEE => "[4376] Description of guarantee.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::HAND_REST => "Restrictions in handling depending on the technical characteristics of the piece of equipment or on the nature of the goods.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::HAZA_INFO => "Information pertaining to a hazard.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::HELP_TEXT => "Denotes that the associated text is an item of help text.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::HOLD_COMP_OPER => "Description of the operation of a holding company.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::IMPO_AND_EXPO_DETA => "Specific information provided about the importation and exportation of goods.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INFO_FOR_RAIL_PURP => "Data entered by railway stations when required, e.g. specified trains, additional sheets for freight calculations, special measures, etc.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INFO_TO_BE_PRIN_ON_DESP_ADVI => "Specification of free text information which is to be printed on a despatch advice.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INFO_TO_THE_APPL => "Information given to the applicant.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INFO_TO_THE_BENE => "Information given to the beneficiary.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INFO_ABOU_ADDI_AMOU_COVE => "Additional amounts information/instruction.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INLA_TRAN_DETA => "Information concerning the pre-carriage to the port of discharge if by other means than a vessel.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INST_TO_PATI => "Instruction given to a patient.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INST_TO_PHYS => "Instruction given to a physician.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INST_TO_PREP_THE_PATI => "Instruction with the purpose of preparing the patient.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INST_OR_INFO_ABOU_PART_SHIP => "Instructions or information about partial shipment(s).",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INST_OR_INFO_ABOU_STAN_DOCU_CRED => "Instruction or information about a standby documentary credit.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INST_OR_INFO_ABOU_TRAN => "Instructions or information about transhipment(s).",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INST_TO_THE_APPL => "Instructions given to the applicant.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INST_TO_THE_BENE => "Instructions made to the beneficiary.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INST_TO_THE_COLL_BANK => "Instructions to the bank, other than the remitting bank, involved in processing the collection.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INST_TO_THE_PAYI_ANDO_ACCE_ANDO_NEGO_BANK => "Instructions to the paying and/or accepting and/or negotiating bank.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INST_ABOU_REVO_DOCU_CRED => "Instructions/information about a revolving documentary credit.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INSU_INFO => "Specific note contains insurance information.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INSU_INST => "(4112) Instructions regarding the cargo insurance.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INTA_ASSE => "Description of intangible asset(s).",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INTE_RELA_INFO => "Description of the intercompany relations.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INTE_INST => "Instructions given about the interest.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INTE_AUDI_INFO => "Text relating to internal auditing information.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INTE_DESC => "Details of an intervention.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INTE_CONV_INFO => "Information concerning the interviewee conversation.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INTRODUCTION => "Text subject is introduction section of the UN/EDIFACT rules for presentation of standardized message and directories documentation.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INVENTORY => "Description of the inventory.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INVE_VALU => "Description of the value of inventory.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INVESTMENT => "Description of the investments.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INVO_INST => "Note contains invoice instructions.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::INVO_MAIL_INST => "Instructions as to which freight and charges components have to be mailed to whom.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::JOIN_VENT => "Description of the joint venture.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::LABO_RESU => "The result of a laboratory investigation.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::LEGEND => "Denotes that the associated text is a legend.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::LEGISLATION => "Information about legislation.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::LETT_OF_CRED_INFO => "Information pertaining to the letter of credit.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::LETT_OF_PROT => "A letter citing any condition in dispute.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::LICE_INFO => "Information pertaining to a license.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::LINE_ITEM => "Note contains line item information.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::LINE_OF_BUSI => "Information concerning an entitys line of business.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::LIQUIDITY => "Description of an entitys liquidity.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::LOAD_INST => "[4080] Instructions where specified packages or containers are to be loaded on a means of transport.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::LOAD_REMA => "Instructions concerning the loading of the container.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::LOAN => "Description of a loan.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::LOCATION => "Description of a location.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::LOCA_ALIA => "Alternative name for a location.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::LOCA_SHOR_NAME => "Short name of a location e.g. for display or printing purposes.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::LONG_TERM_DEBT => "Description of the long term debt.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::MARI_CONT => "Details on a marital contract.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::MARI_DECL_OF_HEAL => "Information about Maritime Declaration of Health.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::MARI_DECL_OF_HEAL => "Information about Maritime Declaration of Health.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::MARI_DECL_OF_HEAL => "Information about Maritime Declaration of Health.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::MARK_SECU => "Description of the marketable securities.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::MARK_ACTI => "Information concerning marketing activities.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::MEDI_HIST => "Historical details of a patients medical events.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::MEDI_TREA_COUR_DETA => "Details of a course of medical treatment.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::MEDI_SPEC_COMM => "Comment concerning the specification of a medicinal product.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::MEDI_ADMI_COND => "The event or condition that initiates the administration of a single dose of medicine or a period of treatment.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::MEDI_DOSA_AND_ADMI => "Details of medicine dosage and method of administration.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::MEDI_TREA => "Details of medicine treatment.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::MEDI_TREA_COMM => "Comment about treatment with medicine.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::MERGER => "Description of a merger.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::MESS_DEFI => "Text subject is message definition.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::MESS_TYPE_NAME => "Text subject is name of message type.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::METE_COND => "Description of the condition of a meter.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::METE_READ_INFO => "Information related to a particular reading of a meter.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::METH_OF_ISSU => "Method of issuance of documentary credit.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::MISC_CHAR_ORDE => "Free text accounting information on an IATA Air Waybill to indicate payment information by Miscellaneous charge order.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::MISS_GOOD_REMA => "Remarks concerning missing goods.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::MODE_OF_SETT_INFO => "Free text information on an IATA Air Waybill to indicate means by which account is to be settled.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::MUTU_DEFI => "Note contains information mutually defined by trading partners.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::NEGO_TERM_ADDI => "Additional terms concerning negotiation.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::NONA_INFO => "Information related to the non-acceptance of an order, goods or a consignment.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::NOTE => "Text subject is note.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::OFFD_INFO => "Information relating to differences between the actual transport dimensions and the normally applicable dimensions.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ONWA_ROUT_INFO => "The text contains onward routing information.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ORDE_INFO => "Additional information related to an order.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ORDE_INST => "Free text contains order instructions.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ORGA_DETA => "Description about the organization of a company.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::ORIG_LEGA_STRU => "Information concerning the original legal structure.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::OTHE_CURR_ASSE_DESC => "Description of other current asset.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::OTHE_CURR_LIAB_DESC => "Description of other current liability.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::OTHE_SERV_INFO => "General information created by the sender of general or specific value.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PACK_CONT_DESC => "A description of the contents of a package.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PACK_MATE_DESC => "A description of the type of material for packaging beyond the level covered by standards such as UN Recommendation 21.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PACK_INFO => "Note contains packaging information.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PACK_MATE_INFO => "The text contains a description of the material used for packaging.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PACK_TERM_INFO => "The text contains packaging terms information.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PACK_INFO => "Information regarding the packaging and/or marking of goods.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PART_INFO => "Free text information related to a party.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PART_INST => "Indicates that the segment contains instructions to be passed on to the identified party.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PASS_BAGG_INFO => "Information related to baggage tendered by a passenger, such as odd size indication, tag.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PATH_RESU => "The result of a pathology investigation.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PATI_INFO => "Information concerning a patient.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PAYA_INFO => "Note contains payables information.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PAYM_DETA_INFO => "The free text contains payment details.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PAYM_INFO => "(4438) Note contains payments information.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PAYM_INST_INFO => "The free text contains payment instructions information relevant to the message.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PAYM_TERM => "[4276] Free form description of the conditions of payment between the parties to a transaction.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PERI_OF_TIME => "Text subject is a period of time.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PLAN_EVEN_COMM => "Comment about an event that is planned.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PRECARM => "Identifiication of how the transmission should be processed regarding submissions transmitted prior to implementation of Canada Border Services Agency’s Assessment and Revenue Management (CARM) project",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PREC_MEAS => "Action to be taken to avert possible harmful affects.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PRES_COMM => "Comment concerning a specified prescription.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PRES_REAS => "Details of the reason for a prescription.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PREV_PORT_OF_CALL_SECU_INFO => "Text describing the security information as applicable at the port facility in the previous port where a ship/port interface was conducted.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PRIC_CALC_FORM => "Additional information regarding the price formula used for calculating the item price.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PRIC_COND => "Information on the price conditions that are expected or given.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PRIC_RANG => "Information concerning the price range of products made or sold.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PRIC_VARI_NARR => "Additional information in plain language to support a price variation.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PRINCIPLES => "Text subject is principles section of the UN/EDIFACT rules for presentation of standardized message and directories documentation.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PRIO_INFO => "(4218) Note contains priority information.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PRIV_STAT => "A statement on the privacy or confidential nature of an object.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PROB_CAUS_OF_FAUL => "The probable cause of fault.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PROC_INST => "Instructions for processing.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PROD_APPL => "A general description of the application of a product.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PROD_INFO => "The text contains product information.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PROD_INGR => "Information on the ingredient make up of the product.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PROGNOSIS => "Details of a prognosis.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PROJ_NARR => "Additional information in plain language to support the project.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PROM_INFO => "The text contains information about a promotion.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PUBL_RECO_DETA => "Information concerning public records.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PURC_REGI => "Information concerning the region(s) where purchases are made.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PURC_INFO => "Note contains purchasing information.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::PURP_OF_SERV => "Details of the purpose of a service.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::QUALIFICATIONS => "Information on the accomplishments fitting a party for a position.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::QUAL_DEMA => "Specification of the quality/performance expectations or standards to which the items must conform.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::QUAL_STAT => "A statement on the quality of an object.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::QUAR_INST => "Instructions regarding quarantine, i.e. the period during which an arriving vessel, including its equipment, cargo, crew or passengers, suspected to carry or carrying a contagious disease is detained in strict isolation to prevent the spread of such a disease.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::QUESTION => "A free text question.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::QUOT_INST => "Note contains quotation information.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::RADI_GOOD_ADDI_INFO => "Additional information related to radioactive goods.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::RAND_SAMP_TEST_INFO => "Information regarding a random sample test.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::RATE_ADDI_INFO => "Specific details applying to rates.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::REASON => "Reason for a request or response.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::REAS_FOR_AMEN_A_MESS => "Identification of the reason for amending a message.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::REAS_FOR_SERV_REQU => "Details of the reason for a requested service.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::RECEIVABLES => "The text contains receivables information.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::REGI_ACTI => "Information concerning the registered activity.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::REGU_INFO => "The free text contains information for regulatory authority.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::REIM_INST => "Instructions given for reimbursement purposes.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::RELA_INST => "Instructions for relaying.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::REMI_BANK_INST => "Instructions to the remitting bank.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::REPA_DESC => "The description of the work performed during the repair.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::REPO_INST => "Instruction on how to report.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::REQU_LOCA_DESC => "The description of the location requested.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::REQU_TARI => "Stipulation of the tariffs to be applied showing, where applicable, special agreement numbers or references.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::RESP_FREE_TEXT => "Free text of the response to a communication.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::RESPONSIBILITIES => "Information describing the responsibilities.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::RETU_TO_ORIG_INFO => "Free text information on an IATA Air Waybill to indicate consignment returned because of non delivery.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::RETU_INFO => "Information related to the return of items.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::REVI_COMM => "Comments relevant to a review.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::RISK_AND_HAND_INFO => "Information concerning risks induced by the goods and/or handling instruction.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SAFE_APPL => "Identifies safeguard applies",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SAFE_APPL => "Identifies safeguard applies",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SAFE_SUBJ => "Identifies if the goods are subject to a safeguard measure",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SAFE_INFO => "The text contains safety information.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SALES => "Description of the sales.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SALE_METH => "Description of the selling means.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SALE_TERR => "Information on the sales territory.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SCOPE => "Text subject is scope section of the UN/EDIFACT rules for presentation of standardized message and directories documentation.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SECT_CLAR_TEXT => "Text subject is section clarification text.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SECU_INFO => "Text describing security related information (e.g security measures currently in force on a vessel).",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SECU_MEAS_REQU => "Text describing security measures that are requested to be executed (e.g. access controls, supervision of ships stores).",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SEGM_NAME => "Text subject is segment name.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SEMA_NOTE => "Denotes that the associated text is a semantic note.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SERV_CHAR => "Free text description is related to a service characteristic.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SERV_REQU_COMM => "Comment about the requested service.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SERV_REQU_COMM => "Comment by the requester of a service.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SHAR_CLAS => "Information about the classes or categories of shares.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SHAR_INFO => "General description of shareholding.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SHIP_LINE_REQU => "Shipping line requested to be used for traffic between European continent and U.K. for Ireland.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SHIP_ACTI_INFO => "Text contains information on ship-to-ship activities.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SIGN_AUTH => "Description of the authorized signatory.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SIMA_APPL => "Identifies that Special Import Measures Act applies",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SIMA_INFO => "Additional information detailing Special Import Measures Act information",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SIMA_MEAS_IN_FORC => "Identifies the specific Special Import Measures Act measure related to the goods",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SIMA_MEAS_TYPE => "Identification of the type of Special Import Measures Act measure",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SIMA_SECU_BOND => "Identifies that there is a security bond in hand that could theoretically be used to cover Special Import Measures Act charges",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SIMA_SUBJ => "Identifies if the goods are subject to a Special Import Measures Act measure.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SIMP_DATA_ELEM_NAME => "Text subject is name of simple data element.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SOUR_OF_DOCU => "Text subject is source of document.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SPEC_HAND => "Note contains special handling information.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SPEC_INST => "Special instructions like licence no, high value, handle with care, glass.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SPEC_PERM_CONC_PACK => "Statement that a special permission has been obtained for the packaging, and reference to such permission.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SPEC_PERM_CONC_THE_GOOD_TO_BE_TRAN => "Statement that a special permission has been obtained for the transport (and/or routing) of the goods specified, and reference to such permission.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SPEC_PERM_CONC_TRAN_MEAN => "Statement that a special permission has been obtained for the use of the means transport, and reference to such permission.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SPEC_PERM_FOR_TRAN_GENE => "Statement that a special permission has been obtained for the transport (and/or routing) in general, and reference to such permission.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SPEC_SERV_REQU => "Request for a special service concerning the transport of the goods.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SPOU_INFO => "Information about the spouse.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::STAN_METH_NARR => "Additional information in plain language to support a standard method.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::STAT_DEFI => "The definition of a statistical object such as a value list, concept, or structure definition.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::STAT_DESC => "The description of a statistical object such as a value list, concept, or structure definition.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::STAT_NAME => "The name of a statistical object such as a value list, concept or structure definition.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::STAT_TITL => "The title of a statistical object such as a value list, concept, or structure definition.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::STAT_DETA => "Describes the status details.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::STAT_OF_A_PLAN => "Comment about the status of a plan.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SUB_TYPE_CODE => "Code which identifies a secondary form type",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SUBL_ITEM_INFO => "Note contains information related to sub-line item data.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SUBS_RISK_NUMB_IATA => "Number(s) of subsidiary risks, induced by the goods, according to the valid classification.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SUMM_OF_ADMI => "Summary description of admittance.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SUPPLIER => "Information concerning suppliers.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SUPP_REMA => "Remarks from or for a supplier of goods or services.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SURT_APPL => "Identifies that surtax applies",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::SURT_SUBJ => "Identifies if the goods are subject to a surtax measure",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::TAKE_OFF_ANNO => "Additional information in plain text to support a take off annotation. Taking off is the process of assessing the quantity work from extracting the measurement from construction documentation.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::TARI_STAT => "Description of parameters relating to a tariff.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::TAX_DECL => "The text contains a statement constituting a tax declaration.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::TEMP_CONT_INST => "Instruction regarding the temperature control of the cargo.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::TEMP_APPR_COND => "The condition under which the approval is considered.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::TERM_AND_DEFI => "Text subject is terms and definition section of the UN/EDIFACT rules for presentation of standardized message and directories documentation.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::TERM_OF_DELI => "(4053) Free text of the non Incoterms terms of delivery. For Incoterms, use: 4053.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::TEST_INFO => "Information related to a test.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::TEST_INST => "Instructions regarding the testing that is required to be carried out on the items in the transaction.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::TEXT_REFE_TO_EXPE_DATA => "Remarks refer to data that was expected.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::TEXT_REFE_TO_RECE_DATA => "Remarks refer to data that was received.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::TIME_LIMI_END => "The date the goods exited the economy or warehouse",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::TIME_LIMI_STAR => "The date the goods entered the economy or warehouse",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::TITLE => "Denotes that the associated text is a title.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::TRAD_NAME_USE => "Description of how a trading name is used.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::TRAN_CONT_DOCU_CLAU => "[4180] Clause on a transport document regarding the cargo being consigned. Synonym: Bill of Lading clause.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::TRAN_CONT_DOCU_REMA => "[4244] Remarks concerning the complete consignment to be printed on the transport document. Synonym: Bill of Lading remark.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::TRAN_REQU_COMM => "Comment about the requirements for transport.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::TRAN_INFO => "General information regarding the transport of the cargo.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::TYPE_OF_ASSE_AND_LIAB => "Information describing the type of assets and liabilities.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::TYPE_OF_SURV_QUES => "Type of survey question.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::TYPE_OF_TRAN_REAS => "Information describing the type of the reason of transaction.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::UNEX_STOP_INFO => "Information relating to unexpected stops during a conveyance.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::VALU_ADDE_TAX_VAT_MARG_SCHE => "Description of the VAT margin scheme applied.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::VALU_FOR_DUTY_INFO => "Additional information detailing the basis on which the value for duty was determined",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::VAT_EXEM_REAS => "Reason for Value Added Tax (VAT) exemption.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::WARE_INST => "Note contains warehouse information.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::WARE_TIME_LIMI => "The amount of time goods may remain in the warehouse",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::WARR_TERM => "Text describing the terms of warranty which apply to a product or service.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::WAST_INFO => "Text describing waste related information.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::WORK_DESC => "Comments about the workforce.",
            InvoiceSuiteCodelistTextSubjectCodeQualifiers::XRAY_RESU => "The result of an X-ray examination.",
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
            'https://www.xrepository.de/details/urn:xoev-de:kosit:codeliste:untdid.4451',
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
            'https://www.xrepository.de/api/xrepository/urn:xoev-de:kosit:codeliste:untdid.4451_4/download/UNTDID_4451_4.json',
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
