<?php

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\codelists;

/**
 * Class representing list of item type identification codes
 * Name of list: UNTDID 7143 Item type identification code
 *
 * @category InvoiceSuite
 * @package  InvoiceSuite
 * @author   HorstOeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/invoicesuite
 * @see      https://www.xrepository.de/details/urn:xoev-de:kosit:codeliste:untdid.7143
 * @see      https://www.xrepository.de/api/xrepository/urn:xoev-de:kosit:codeliste:untdid.7143_4/download/UNTDID_7143_4.json
 */
enum InvoiceSuiteCodelistItemTypeIdentificationCodes: string
{
    /**
     * 46 Level DOT Code (SSA)
     *
     * A US Department of Transportation (DOT) code to identify hazardous
     * (dangerous) goods, managed by the Customs and Border Protection (CBP)
     * agency.
     */
    case LEVE_DOT_CODE = 'SSA';

    /**
     * AHFS (American Hospital Formulary Service) pharmacologic - therapeutic
     * classification (STK)
     *
     * Pharmacologic - therapeutic classification maintained by the American
     * Hospital Formulary Service (AHFS).
     */
    case AHFS_AMER_HOSP_FORM_SERV_PHAR_THER_CLAS = 'STK';

    /**
     * Air Force Regulation 71-4 (SSG)
     *
     * A department of Defense/Air Force code used to identify hazardous
     * (dangerous) goods, managed by the Customs and Border Protection (CBP)
     * agency.
     */
    case AIR_FORC_REGU = 'SSG';

    /**
     * Airline Tariff 6D (SSB)
     *
     * A US code agreed to by the airline industry to identify hazardous
     * (dangerous) goods, managed by the Customs and Border Protection (CBP)
     * agency.
     */
    case AIRL_TARI_D = 'SSB';

    /**
     * Assembly (AB)
     *
     * The item number is that of an assembly.
     */
    case ASSEMBLY = 'AB';

    /**
     * ATC (Anatomical Therapeutic Chemical) classification system (STL)
     *
     * Anatomical Therapeutic Chemical classification system maintained by the
     * World Health Organisation (WHO).
     */
    case ATC_ANAT_THER_CHEM_CLAS_SYST = 'STL';

    /**
     * Batch number (NB)
     *
     * The item number is a batch number.
     */
    case BATC_NUMB = 'NB';

    /**
     * Breed (SSH)
     *
     * The breed of the item (e.g. plant or animal).
     */
    case BREED = 'SSH';

    /**
     * Bureau of Explosives 600-A (rail) (SSN)
     *
     * A Department of Transportation/Federal Railroad Administration code used to
     * identify hazardous (dangerous) goods.
     */
    case BURE_OF_EXPL_A_RAIL = 'SSN';

    /**
     * Buyer's colour (BO)
     *
     * Colour assigned by buyer.
     */
    case BUYE_COLO = 'BO';

    /**
     * Buyer's internal product group code (GB)
     *
     * Product group code used within a buyer's internal systems.
     */
    case BUYE_INTE_PROD_GROU_CODE = 'GB';

    /**
     * Buyer's item number (IN)
     *
     * The item number has been allocated by the buyer.
     */
    case BUYE_ITEM_NUMB = 'IN';

    /**
     * Buyer's part number (BP)
     *
     * Reference number assigned by the buyer to identify an article.
     */
    case BUYE_PART_NUMB = 'BP';

    /**
     * Buyer's qualifier for size (QS)
     *
     * The item number qualifies the size of the buyer.
     */
    case BUYE_QUAL_FOR_SIZE = 'QS';

    /**
     * Buyer's size code (IZ)
     *
     * Code given by the buyer to designate the size of an article in textile and
     * shoe industry.
     */
    case BUYE_SIZE_CODE = 'IZ';

    /**
     * Buyer's style number (IT)
     *
     * Number given by the buyer to a specific style or form of an article,
     * especially used for garments.
     */
    case BUYE_STYL_NUMB = 'IT';

    /**
     * Calendar month statement of activities (BY)
     *
     * A statement listing activities of a calendar month.
     */
    case CALE_MONT_STAT_OF_ACTI = 'BY';

    /**
     * Calendar week statement of activities (BX)
     *
     * A statement listing activities of a calendar week.
     */
    case CALE_WEEK_STAT_OF_ACTI = 'BX';

    /**
     * Canadian classification system ICC (SSY)
     *
     * Product classification system used in the Canadian market.
     */
    case CANA_CLAS_SYST_ICC = 'SSY';

    /**
     * Chemical Abstract Service (CAS) registry number (SSI)
     *
     * A unique numerical identifier for for chemical compounds, polymers,
     * biological sequences, mixtures and alloys.
     */
    case CHEM_ABST_SERV_CAS_REGI_NUMB = 'SSI';

    /**
     * CLADIMED (Classification des Dispositifs Médicaux) (STM)
     *
     * A five level classification system for medical decvices maintained by the
     * CLADIMED organisation used in the French market.
     */
    case CLAD_CLAS_DES_DISP_MDIC = 'STM';

    /**
     * CMDR (Canadian Medical Device Regulations) classification system (STN)
     *
     * Classification system related to the Canadian Medical Device Regulations
     * maintained by Health Canada.
     */
    case CMDR_CANA_MEDI_DEVI_REGU_CLAS_SYST = 'STN';

    /**
     * CNDM (Classificazione Nazionale dei Dispositivi Medici) (STO)
     *
     * A classification system for medical devices used in the Italian market.
     */
    case CNDM_CLAS_NAZI_DEI_DISP_MEDI = 'STO';

    /**
     * Cold roll number (AD)
     *
     * Number assigned to a cold roll.
     */
    case COLD_ROLL_NUMB = 'AD';

    /**
     * Colour number (CL)
     *
     * Code for the colour of an article.
     */
    case COLO_NUMB = 'CL';

    /**
     * Commodity grouping (CG)
     *
     * Code for a group of articles with common characteristics (e.g. used for
     * statistical purposes).
     */
    case COMM_GROU = 'CG';

    /**
     * Contract breakdown (BS)
     *
     * To specify as an item, the contract breakdown.
     */
    case CONT_BREA = 'BS';

    /**
     * Contract number (CR)
     *
     * Reference number identifying a contract.
     */
    case CONT_NUMB = 'CR';

    /**
     * Coupon number (AQ)
     *
     * A number identifying a coupon.
     */
    case COUP_NUMB = 'AQ';

    /**
     * CPV (Common Procurement Vocabulary) (STI)
     *
     * Official classification system for public procurement in the European
     * Union.
     */
    case CPV_COMM_PROC_VOCA = 'STI';

    /**
     * Customer order number (ON)
     *
     * Reference number of a customer's order.
     */
    case CUST_ORDE_NUMB = 'ON';

    /**
     * Customs article number (CV)
     *
     * Code defined by Customs authorities to an article or a group of articles
     * for Customs purposes.
     */
    case CUST_ARTI_NUMB = 'CV';

    /**
     * Daily statement of activities (BV)
     *
     * A statement listing activities of one day.
     */
    case DAIL_STAT_OF_ACTI = 'BV';

    /**
     * Data category (BK)
     *
     * A code specifying a category of data.
     */
    case DATA_CATE = 'BK';

    /**
     * Distributor’s article identifier (SSS)
     *
     * Identifier assigned to an article by the distributor of that article.
     */
    case DIST_ARTI_IDEN = 'SSS';

    /**
     * Drawing (DW)
     *
     * Reference number identifying a drawing of an article.
     */
    case DRAWING = 'DW';

    /**
     * Drawing revision number (DR)
     *
     * Reference number indicating that a change or revision has been applied to a
     * drawing.
     */
    case DRAW_REVI_NUMB = 'DR';

    /**
     * Dutch classification system CBL (STA)
     *
     * Product classification system used in the Dutch market.
     */
    case DUTC_CLAS_SYST_CBL = 'STA';

    /**
     * Dye lot number (BU)
     *
     * Number identifying a dye lot.
     */
    case DYE_LOT_NUMB = 'BU';

    /**
     * eCl@ss (STQ)
     *
     * Standardized material and service classification and dictionary maintained
     * by eClass e.V.
     */
    case ECLSS = 'STQ';

    /**
     * EDIS (Energy Data Identification System) (SRW)
     *
     * European system for identification of meter data.
     */
    case EDIS_ENER_DATA_IDEN_SYST = 'SRW';

    /**
     * EDMA (European Diagnostic Manufacturers Association) Products
     * Classification (STR)
     *
     * Classification for in vitro diagnostics medical devices maintained by the
     * European Diagnostic Manufacturers Association.
     */
    case EDMA_EURO_DIAG_MANU_ASSO_PROD_CLAS = 'STR';

    /**
     * Efficient Consumer Response (ECR) Austria classification system (STG)
     *
     * Product classification system used in the Austrian market.
     */
    case EFFI_CONS_RESP_ECR_AUST_CLAS_SYST = 'STG';

    /**
     * EGAR (European Generic Article Register) (STS)
     *
     * A classification system for medical devices.
     */
    case EGAR_EURO_GENE_ARTI_REGI = 'STS';

    /**
     * Emergency fire code (SUI)
     *
     * Classification for emergency response procedures related to fire.
     */
    case EMER_FIRE_CODE = 'SUI';

    /**
     * Emergency spillage code (SUJ)
     *
     * Classification for emergency response procedures related to spillage.
     */
    case EMER_SPIL_CODE = 'SUJ';

    /**
     * End item (AX)
     *
     * A number specifying an end item.
     */
    case END_ITEM = 'AX';

    /**
     * Endorsement (SSF)
     *
     * A US Customs and Border Protection (CBP) code used to identify hazardous
     * (dangerous) goods.
     */
    case ENDORSEMENT = 'SSF';

    /**
     * Engine model designation (SSJ)
     *
     * A name or designation to identify an engine model.
     */
    case ENGI_MODE_DESI = 'SSJ';

    /**
     * Engineering change level (EC)
     *
     * Reference number indicating that a change or revision has been applied to
     * an article's specification.
     */
    case ENGI_CHAN_LEVE = 'EC';

    /**
     * Engineering data list (AZ)
     *
     * A code specifying the product's engineering data list.
     */
    case ENGI_DATA_LIST = 'AZ';

    /**
     * EU Combined Nomenclature (TSP)
     *
     * The number is part of, or is generated in the context of the Combined
     * Nomenclature classification, as developed and maintained by the European
     * Union (EU).
     */
    case EU_COMB_NOME = 'TSP';

    /**
     * EU RoHS Directive (TSU)
     *
     * European Union Directive on the restriction of hazardous substances.
     */
    case EU_ROHS_DIRE = 'TSU';

    /**
     * European Union dairy subsidy eligibility classification (STC)
     *
     * Category of product eligible for EU subsidy (applies for certain dairy
     * products with specific level of fat content).
     */
    case EURO_UNIO_DAIR_SUBS_ELIG_CLAS = 'STC';

    /**
     * European Waste Catalogue (TSR)
     *
     * Waste type number according to the European Waste Catalogue (EWC).
     */
    case EURO_WAST_CATA = 'TSR';

    /**
     * Exhibit (AW)
     *
     * A code indicating that the product is identified by an exhibit number.
     */
    case EXHIBIT = 'AW';

    /**
     * Federal Agency on Technical Regulating and Metrology of the Russian
     * Federation (STF)
     *
     * A Russian government agency that serves as a national standardization body
     * of the Russian Federation.
     */
    case FEDE_AGEN_ON_TECH_REGU_AND_METR_OF_THE_RUSS_FEDE = 'STF';

    /**
     * Federal supply classification (AY)
     *
     * A code to specify a product's Federal supply classification.
     */
    case FEDE_SUPP_CLAS = 'AY';

    /**
     * Financial phase (BR)
     *
     * To specify as an item, the financial phase.
     */
    case FINA_PHAS = 'BR';

    /**
     * Finnish classification system EANFIN (SSX)
     *
     * Product classification system used in the Finnish market.
     */
    case FINN_CLAS_SYST_EANF = 'SSX';

    /**
     * Fish species (FS)
     *
     * Identification of fish species.
     */
    case FISH_SPEC = 'FS';

    /**
     * French classification system IFLS5 (SSZ)
     *
     * Product classification system used in the French market.
     */
    case FREN_CLAS_SYST_IFLS = 'SSZ';

    /**
     * General specification number (GS)
     *
     * The item number is a general specification number.
     */
    case GENE_SPEC_NUMB = 'GS';

    /**
     * German classification system CCG (SSW)
     *
     * Product classification system used in the German market.
     */
    case GERM_CLAS_SYST_CCG = 'SSW';

    /**
     * GMDN (Global Medical Devices Nomenclature) (STT)
     *
     * Nomenclature system for identification of medical devices officially
     * apprroved by the European Union.
     */
    case GMDN_GLOB_MEDI_DEVI_NOME = 'STT';

    /**
     * GPI (Generic Product Identifier) (STU)
     *
     * A drug classification system managed by Medi-Span.
     */
    case GPI_GENE_PROD_IDEN = 'STU';

    /**
     * GS1 Global Returnable Asset Identifier, non-serialised (SUE)
     *
     * A unique, 13-digit number assigned according to the numbering structure of
     * the GS1 system and used to identify a type of Reusable Transport Item
     * (RTI).
     */
    case GS_GLOB_RETU_ASSE_IDEN_NONS = 'SUE';

    /**
     * GS1 Global Trade Item Number (SRV)
     *
     * A unique number, up to 14-digits, assigned according to the numbering
     * structure of the GS1 system.
     */
    case GS_GLOB_TRAD_ITEM_NUMB = 'SRV';

    /**
     * GS1 Italy classification system (STH)
     *
     * Product classification system used in the Italian market.
     */
    case GS_ITAL_CLAS_SYST = 'STH';

    /**
     * GS1 Poland classification system (STE)
     *
     * Product classification system used in the Polish market.
     */
    case GS_POLA_CLAS_SYST = 'STE';

    /**
     * GS1 Spain classification system (STD)
     *
     * Product classification system used in the Spanish market.
     */
    case GS_SPAI_CLAS_SYST = 'STD';

    /**
     * Harmonised system (HS)
     *
     * The item number is part of, or is generated in the context of the
     * Harmonised Commodity Description and Coding System (Harmonised System), as
     * developed and maintained by the World Customs Organization (WCO).
     */
    case HARM_SYST = 'HS';

    /**
     * Harmonized tariff schedule (SRZ)
     *
     * The international Harmonized Tariff Schedule (HTS) to classify the article
     * for customs, statistical and other purposes.
     */
    case HARM_TARI_SCHE = 'SRZ';

    /**
     * Hazardous Materials ID DOT (SSE)
     *
     * A US Department of Transportation (DOT) code used to identify hazardous
     * (dangerous) goods, managed by the Customs and Border Protection (CBP)
     * agency.
     */
    case HAZA_MATE_ID_DOT = 'SSE';

    /**
     * HCPCS (Healthcare Common Procedure Coding System) (STV)
     *
     * A classification system used with US healthcare insurance programs.
     */
    case HCPC_HEAL_COMM_PROC_CODI_SYST = 'STV';

    /**
     * Heat number (AP)
     *
     * Number assigned to the heat (also known as the iron charge) for the
     * production of steel products.
     */
    case HEAT_NUMB = 'AP';

    /**
     * HIBC (Health Industry Bar Code) (AC)
     *
     * Article identifier used within health sector to indicate data used conforms
     * to HIBC.
     */
    case HIBC_HEAL_INDU_BAR_CODE = 'AC';

    /**
     * Hot roll number (AE)
     *
     * Number assigned to a hot roll.
     */
    case HOT_ROLL_NUMB = 'AE';

    /**
     * ICPS (International Classification for Patient Safety) (STW)
     *
     * A patient safety taxonomy maintained by the World Health Organisation.
     */
    case ICPS_INTE_CLAS_FOR_PATI_SAFE = 'STW';

    /**
     * IFDA (International Foodservice Distributors Association) (STJ)
     *
     * International Foodservice Distributors Association (IFDA).
     */
    case IFDA_INTE_FOOD_DIST_ASSO = 'STJ';

    /**
     * IFLS (Institut Francais du Libre Service) 5 digit product classification
     * code (SRT)
     *
     * 5 digit code for product classification managed by the Institut Francais du
     * Libre Service.
     */
    case IFLS_INST_FRAN_DU_LIBR_SERV__DIGI_PROD_CLAS_CODE = 'SRT';

    /**
     * IMDG main hazard class (TSO)
     *
     * Main hazard class as defined in the International Maritime Dangerous Goods
     * (IMDG) specification.
     */
    case IMDG_MAIN_HAZA_CLAS = 'TSO';

    /**
     * IMDG packing group (SUK)
     *
     * Packing group as defined in the International Marititme Dangerous Goods
     * (IMDG) specification.
     */
    case IMDG_PACK_GROU = 'SUK';

    /**
     * IMDG subsidiary risk class (SUM)
     *
     * Subsidiary risk class as defined in the International Maritime Dangerous
     * Goods (IMDG) specification.
     */
    case IMDG_SUBS_RISK_CLAS = 'SUM';

    /**
     * IMEI (SUF)
     *
     * The International Mobile Station Equipment Identity (IMEI) is a unique
     * number to identify mobile phones. It includes the origin, model and serial
     * number of the device. The structure is specified in 3GPP TS 23.003.
     */
    case IMEI = 'SUF';

    /**
     * Industry commodity code (CC)
     *
     * The codes given to certain commodities by an industry.
     */
    case INDU_COMM_CODE = 'CC';

    /**
     * Institutional Meat Purchase Specifications (IMPS) Number (SSK)
     *
     * A number assigned by agricultural authorities to identify and track meat
     * and meat products.
     */
    case INST_MEAT_PURC_SPEC_IMPS_NUMB = 'SSK';

    /**
     * International Article Numbering Association (EAN) (EN)
     *
     * Number assigned to a manufacturer's product according to the International
     * Article Numbering Association.
     */
    case INTE_ARTI_NUMB_ASSO_EAN = 'EN';

    /**
     * International Civil Aviation Administration code (SSD)
     *
     * A US Department of Transportation/Federal Aviation Administration code used
     * to identify hazardous (dangerous) goods, managed by the Customs and Border
     * Protection (CBP) agency.
     */
    case INTE_CIVI_AVIA_ADMI_CODE = 'SSD';

    /**
     * International Code of Botanical Nomenclature (ICBN) (SSP)
     *
     * A code established by the International Code of Botanical Nomenclature
     * (ICBN) used to classify and identify botanical articles and commodities.
     */
    case INTE_CODE_OF_BOTA_NOME_ICBN = 'SSP';

    /**
     * International Code of Nomenclature for Cultivated Plants (ICNCP) (SSR)
     *
     * A code established by the International Code of Nomenclature for Cultivated
     * Plants (ICNCP) used to classify and identify animals.
     */
    case INTE_CODE_OF_NOME_FOR_CULT_PLAN_ICNC = 'SSR';

    /**
     * International Code of Zoological Nomenclature (ICZN) (SSQ)
     *
     * A code established by the International Code of Zoological Nomenclature
     * (ICZN) used to classify and identify animals.
     */
    case INTE_CODE_OF_ZOOL_NOME_ICZN = 'SSQ';

    /**
     * International Maritime Organization (IMO) Code (SSM)
     *
     * An International Maritime Organization (IMO) code used to identify
     * hazardous (dangerous) goods.
     */
    case INTE_MARI_ORGA_IMO_CODE = 'SSM';

    /**
     * ISBN (International Standard Book Number) (IB)
     *
     * A unique number identifying a book.
     */
    case ISBN_INTE_STAN_BOOK_NUMB = 'IB';

    /**
     * ISSN (International Standard Serial Number) (IS)
     *
     * A unique number identifying a serial publication.
     */
    case ISSN_INTE_STAN_SERI_NUMB = 'IS';

    /**
     * Japanese classification system JICFS (STB)
     *
     * Product classification system used in the Japanese market.
     */
    case JAPA_CLAS_SYST_JICF = 'STB';

    /**
     * Local Stock Number (LSN) (BI)
     *
     * A local number assigned to an item of stock.
     */
    case LOCA_STOC_NUMB_LSN = 'BI';

    /**
     * Locally assigned control number (BN)
     *
     * A number assigned locally for control purposes.
     */
    case LOCA_ASSI_CONT_NUMB = 'BN';

    /**
     * Lot number (BB)
     *
     * A number indicating the lot number of a product.
     */
    case LOT_NUMB = 'BB';

    /**
     * Machine number (MA)
     *
     * The item number is a machine number.
     */
    case MACH_NUMB = 'MA';

    /**
     * Manufacturer's (producer's) article number (MF)
     *
     * The number given to an article by its manufacturer.
     */
    case MANU_PROD_ARTI_NUMB = 'MF';

    /**
     * MARPOL Code IBC (SUL)
     *
     * International Bulk Chemical (IBC) code defined by the International
     * Convention for the Prevention of Pollution from Ships (MARPOL).
     */
    case MARP_CODE_IBC = 'SUL';

    /**
     * Material code (EF)
     *
     * Code defining the material's type, surface, geometric form plus various
     * classifying characteristics.
     */
    case MATE_CODE = 'EF';

    /**
     * MedDRA (Medical Dictionary for Regulatory Activities) (STX)
     *
     * A medical dictionary maintained by the International Federation of
     * Pharmaceutical Manufacturers and Associations (IFPMA).
     */
    case MEDD_MEDI_DICT_FOR_REGU_ACTI = 'STX';

    /**
     * Medical Columbus (STY)
     *
     * Medical product classification system used in the German market.
     */
    case MEDI_COLU = 'STY';

    /**
     * Mexican classification system AMECE (SSV)
     *
     * Product classification system used in the Mexican market.
     */
    case MEXI_CLAS_SYST_AMEC = 'SSV';

    /**
     * Milestone event number (BA)
     *
     * A number to identify a milestone event.
     */
    case MILE_EVEN_NUMB = 'BA';

    /**
     * Model number (MN)
     *
     * Reference number assigned by the manufacturer to differentiate variations
     * in similar products in a class or group.
     */
    case MODE_NUMB = 'MN';

    /**
     * Mutually defined (ZZZ)
     *
     * Item type identification mutually agreed between interchanging parties.
     */
    case MUTU_DEFI = 'ZZZ';

    /**
     * NAPCS (North American Product Classification System) (STZ)
     *
     * Product classification system used in the North American market.
     */
    case NAPC_NORT_AMER_PROD_CLAS_SYST = 'STZ';

    /**
     * National drug code (BG)
     *
     * A code specifying the national drug classification.
     */
    case NATI_DRUG_CODE = 'BG';

    /**
     * National drug code 4-4-2 format (BC)
     *
     * A code identifying the product in national drug format 4-4-2.
     */
    case NATI_DRUG_CODE__FORM = 'BC';

    /**
     * National product group code (GN)
     *
     * National product group code. Administered by a national agency.
     */
    case NATI_PROD_GROU_CODE = 'GN';

    /**
     * Next higher assembly number (BJ)
     *
     * A number specifying the next higher assembly or component into which the
     * product is being incorporated.
     */
    case NEXT_HIGH_ASSE_NUMB = 'BJ';

    /**
     * NHS (National Health Services) eClass (SUA)
     *
     * Product and Service classification system used in United Kingdom market.
     */
    case NHS_NATI_HEAL_SERV_ECLA = 'SUA';

    /**
     * Norwegian Classification system ENVA (SST)
     *
     * Product classification system used in the Norwegian market.
     */
    case NORW_CLAS_SYST_ENVA = 'SST';

    /**
     * NSN (North Atlantic Treaty Organization Stock Number) (AU)
     *
     * Number assigned under the NATO (North Atlantic Treaty Organization)
     * codification system to provide the identification of an approved item of
     * supply.
     */
    case NSN_NORT_ATLA_TREA_ORGA_STOC_NUMB = 'AU';

    /**
     * Official animal number (SRY)
     *
     * Unique number given by a national authority to identify an animal
     * individually.
     */
    case OFFI_ANIM_NUMB = 'SRY';

    /**
     * Original equipment number (BZ)
     *
     * Original equipment number allocated to spare parts by the manufacturer.
     */
    case ORIG_EQUI_NUMB = 'BZ';

    /**
     * Pack number (AK)
     *
     * Number assigned to a pack containing a stack of items put together (e.g.
     * cold roll sheets (steel product)).
     */
    case PACK_NUMB = 'AK';

    /**
     * Part number (BH)
     *
     * A number indicating the part.
     */
    case PART_NUMB = 'BH';

    /**
     * Part number description (PD)
     *
     * Reference number identifying a description associated with a number
     * ultimately used to identify an article.
     */
    case PART_NUMB_DESC = 'PD';

    /**
     * Periodical statement of activities within a bilaterally agreed time period (BW)
     *
     * Periodical statement listing activities within a bilaterally agreed time
     * period.
     */
    case PERI_STAT_OF_ACTI_WITH_A_BILA_AGRE_TIME_PERI = 'BW';

    /**
     * Price grouping code (TSS)
     *
     * Number assigned to identify a grouping of products based on price.
     */
    case PRIC_GROU_CODE = 'TSS';

    /**
     * Price look up number (AT)
     *
     * Identification number on a product allowing a quick electronic retrieval of
     * price information for that product.
     */
    case PRIC_LOOK_UP_NUMB = 'AT';

    /**
     * Price Look-Up code (PLU) (SSL)
     *
     * Identification number affixed to produce in stores to retrieve price
     * information.
     */
    case PRIC_LOOK_CODE_PLU = 'SSL';

    /**
     * Product version number (AA)
     *
     * Number assigned by manufacturer or seller to identify the release of a
     * product.
     */
    case PROD_VERS_NUMB = 'AA';

    /**
     * Product/service identification number (MP)
     *
     * Reference number identifying a product or service.
     */
    case PROD_IDEN_NUMB = 'MP';

    /**
     * Promotional variant number (PV)
     *
     * The item number is a promotional variant number.
     */
    case PROM_VARI_NUMB = 'PV';

    /**
     * Purchase order number (PO)
     *
     * Reference number identifying a customer's order.
     */
    case PURC_ORDE_NUMB = 'PO';

    /**
     * Purchaser's order line number (PL)
     *
     * Reference number identifying a line entry in a customer's order for goods
     * or services.
     */
    case PURC_ORDE_LINE_NUMB = 'PL';

    /**
     * Record keeping of model year (RY)
     *
     * The item number relates to the year in which the particular model was kept.
     */
    case RECO_KEEP_OF_MODE_YEAR = 'RY';

    /**
     * Refined product code (AV)
     *
     * A code specifying the product refinement designation.
     */
    case REFI_PROD_CODE = 'AV';

    /**
     * Release number (RN)
     *
     * Reference number identifying a release from a buyer's purchase order.
     */
    case RELE_NUMB = 'RN';

    /**
     * Resource number (AR)
     *
     * A number to identify a resource.
     */
    case RESO_NUMB = 'AR';

    /**
     * Returnable container number (RC)
     *
     * Reference number identifying a returnable container.
     */
    case RETU_CONT_NUMB = 'RC';

    /**
     * RSK number (SRS)
     *
     * Plumbing and heating.
     */
    case RSK_NUMB = 'SRS';

    /**
     * Run number (RU)
     *
     * The item number identifies the production or manufacturing run or sequence
     * in which the item was manufactured, processed or assembled.
     */
    case RUN_NUMB = 'RU';

    /**
     * Sample number (AJ)
     *
     * Number assigned to a sample.
     */
    case SAMP_NUMB = 'AJ';

    /**
     * Serial number (SN)
     *
     * Identification number of an item which distinguishes this specific item out
     * of a number of identical items.
     */
    case SERI_NUMB = 'SN';

    /**
     * Ship's store classification type (SUH)
     *
     * Classification of ship’s stores.
     */
    case SHIP_STOR_CLAS_TYPE = 'SUH';

    /**
     * SKU (Stock keeping unit) (SK)
     *
     * Reference number of a stock keeping unit.
     */
    case SKU_STOC_KEEP_UNIT = 'SK';

    /**
     * Slab number (AF)
     *
     * Number assigned to a slab, which is produced in a particular production
     * step.
     */
    case SLAB_NUMB = 'AF';

    /**
     * Slaughter number (SRX)
     *
     * Unique number given by a slaughterhouse to an animal or a group of animals
     * of the same breed.
     */
    case SLAU_NUMB = 'SRX';

    /**
     * SNOMED CT (Systematized Nomenclature of Medicine-Clinical Terms) (SUC)
     *
     * A medical nomenclature system developed between the NHS and the College of
     * American Pathologists.
     */
    case SNOM_CT_SYST_NOME_OF_MEDI_TERM = 'SUC';

    /**
     * Software revision number (AG)
     *
     * A number assigned to indicate a revision of software.
     */
    case SOFT_REVI_NUMB = 'AG';

    /**
     * Special material identification code (BM)
     *
     * A number to identify the special material code.
     */
    case SPEC_MATE_IDEN_CODE = 'BM';

    /**
     * Standard group of products (mixed assortment) (SG)
     *
     * The item number relates to a standard group of other items (mixed) which
     * are grouped together as a single item for identification purposes.
     */
    case STAN_GROU_OF_PROD_MIXE_ASSO = 'SG';

    /**
     * State label code (AO)
     *
     * A code which specifies the codification of the state's labelling
     * requirements.
     */
    case STAT_LABE_CODE = 'AO';

    /**
     * Style number (ST)
     *
     * Number given to a specific style or form of an article, especially used for
     * garments.
     */
    case STYL_NUMB = 'ST';

    /**
     * Supplier assigned classification (SSU)
     *
     * Product classification assigned by the supplier.
     */
    case SUPP_ASSI_CLAS = 'SSU';

    /**
     * Supplier's article number (SA)
     *
     * Number assigned to an article by the supplier of that article.
     */
    case SUPP_ARTI_NUMB = 'SA';

    /**
     * Supplier's supplier article number (SS)
     *
     * Article number referring to a sales catalogue of supplier's supplier.
     */
    case SUPP_SUPP_ARTI_NUMB = 'SS';

    /**
     * Taxonomic Serial Number (TSN)
     *
     * A unique number assigned to a taxonomic entity, commonly to a species of
     * plants or animals, providing information on their hierarchical
     * classification, scientific name, taxonomic rank, associated synonyms and
     * vernacular names where appropriate, data source information and data
     * quality indicators.
     */
    case TAXO_SERI_NUMB = 'TSN';

    /**
     * Technical phase (BT)
     *
     * To specify as an item, the technical phase.
     */
    case TECH_PHAS = 'BT';

    /**
     * Therapeutic classification number (TSQ)
     *
     * A code to specify a product's therapeutic classification.
     */
    case THER_CLAS_NUMB = 'TSQ';

    /**
     * Title 49 Code of Federal Regulations (SSC)
     *
     * A US Customs and Border Protection (CBP) code used to identify hazardous
     * (dangerous) goods.
     */
    case TITL__CODE_OF_FEDE_REGU = 'SSC';

    /**
     * Transport group number (TG)
     *
     * (8012) Additional number to form article groups for packing and/or
     * transportation purposes.
     */
    case TRAN_GROU_NUMB = 'TG';

    /**
     * UK DM&D (Dictionary of Medicines & Devices) standard coding scheme (STP)
     *
     * A classification system for medicines and devices used in the UK market.
     */
    case UK_DMD_DICT_OF_MEDI_DEVI_STAN_CODI_SCHE = 'STP';

    /**
     * Ultimate customer's article number (UA)
     *
     * Number assigned by ultimate customer to identify relevant article.
     */
    case ULTI_CUST_ARTI_NUMB = 'UA';

    /**
     * UMDNS (Universal Medical Device Nomenclature System) (SUD)
     *
     * A standard international nomenclature and computer coding system for
     * medical devices maintained by the Emergency Care Research Institute (ECRI).
     */
    case UMDN_UNIV_MEDI_DEVI_NOME_SYST = 'SUD';

    /**
     * United Nations Dangerous Goods List (SSO)
     *
     * A UN code used to classify and identify dangerous goods.
     */
    case UNIT_NATI_DANG_GOOD_LIST = 'SSO';

    /**
     * UNSPSC (TST)
     *
     * The UNSPSC commodity classification system.
     */
    case UNSPSC = 'TST';

    /**
     * UPC (Universal product code) (UP)
     *
     * Number assigned to a manufacturer's product by the Product Code Council.
     */
    case UPC_UNIV_PROD_CODE = 'UP';

    /**
     * UPC (Universal Product Code) Consumer package code (1-5-5) (AH)
     *
     * An 11-digit code that uniquely identifies consumer packaging of a product;
     * does not have a check digit.
     */
    case UPC_UNIV_PROD_CODE_CONS_PACK_CODE = 'AH';

    /**
     * UPC (Universal Product Code) Shipping container code (1-2-5-5) (AL)
     *
     * A 13-digit code that uniquely identifies the manufacturer's shipping unit,
     * including the packaging indicator.
     */
    case UPC_UNIV_PROD_CODE_SHIP_CONT_CODE = 'AL';

    /**
     * UPC (Universal Product Code) suffix (AN)
     *
     * A suffix used in conjunction with a higher level UPC (Universal product
     * code) to define packing variations for a product.
     */
    case UPC_UNIV_PROD_CODE_SUFF = 'AN';

    /**
     * UPC (Universal Product Code)/EAN (European article number) Shipping
     * container code (1-2-5-5-1) (AM)
     *
     * A 14-digit code that uniquely identifies the manufacturer's shipping unit,
     * including the packaging indicator and the check digit.
     */
    case UPC_UNIV_PROD_CODE_EURO_ARTI_NUMB_SHIP_CONT_CODE = 'AM';

    /**
     * US FDA (Food and Drug Administration) Product Code Classification Database (SUB)
     *
     * US FDA Product Code Classification Database contains medical device names
     * and associated information developed by the Center for Devices and
     * Radiological Health (CDRH).
     */
    case US_FDA_FOOD_AND_DRUG_ADMI_PROD_CODE_CLAS_DATA = 'SUB';

    /**
     * Variable measure product code (BQ)
     *
     * A code assigned to identify a variable measure item.
     */
    case VARI_MEAS_PROD_CODE = 'BQ';

    /**
     * Vendor item number (VN)
     *
     * Reference number assigned by a vendor/seller identifying a
     * product/service/article.
     */
    case VEND_ITEM_NUMB = 'VN';

    /**
     * Vendor specification number (VX)
     *
     * The item number has been allocated by the vendor as a specification number.
     */
    case VEND_SPEC_NUMB = 'VX';

    /**
     * Vendor's (seller's) part number (VP)
     *
     * Reference number assigned by a vendor/seller identifying an article.
     */
    case VEND_SELL_PART_NUMB = 'VP';

    /**
     * Vendor's supplemental item number (VS)
     *
     * The item number is a specified by the vendor as a supplemental number for
     * the vendor's purposes.
     */
    case VEND_SUPP_ITEM_NUMB = 'VS';

    /**
     * Waste Type (EMSA) (SUG)
     *
     * Classification of waste as defined by the European Maritime Safety Agency
     * (EMSA).
     */
    case WAST_TYPE_EMSA = 'SUG';

    /**
     * Work task number (AS)
     *
     * A number to identify a work task.
     */
    case WORK_TASK_NUMB = 'AS';

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
            InvoiceSuiteCodelistItemTypeIdentificationCodes::LEVE_DOT_CODE => "46 Level DOT Code",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::AHFS_AMER_HOSP_FORM_SERV_PHAR_THER_CLAS => "AHFS (American Hospital Formulary Service) pharmacologic - therapeutic classification",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::AIR_FORC_REGU => "Air Force Regulation 71-4",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::AIRL_TARI_D => "Airline Tariff 6D",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::ASSEMBLY => "Assembly",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::ATC_ANAT_THER_CHEM_CLAS_SYST => "ATC (Anatomical Therapeutic Chemical) classification system",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::BATC_NUMB => "Batch number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::BREED => "Breed",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::BURE_OF_EXPL_A_RAIL => "Bureau of Explosives 600-A (rail)",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::BUYE_COLO => "Buyers colour",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::BUYE_INTE_PROD_GROU_CODE => "Buyers internal product group code",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::BUYE_ITEM_NUMB => "Buyers item number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::BUYE_PART_NUMB => "Buyers part number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::BUYE_QUAL_FOR_SIZE => "Buyers qualifier for size",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::BUYE_SIZE_CODE => "Buyers size code",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::BUYE_STYL_NUMB => "Buyers style number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::CALE_MONT_STAT_OF_ACTI => "Calendar month statement of activities",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::CALE_WEEK_STAT_OF_ACTI => "Calendar week statement of activities",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::CANA_CLAS_SYST_ICC => "Canadian classification system ICC",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::CHEM_ABST_SERV_CAS_REGI_NUMB => "Chemical Abstract Service (CAS) registry number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::CLAD_CLAS_DES_DISP_MDIC => "CLADIMED (Classification des Dispositifs Médicaux)",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::CMDR_CANA_MEDI_DEVI_REGU_CLAS_SYST => "CMDR (Canadian Medical Device Regulations) classification system",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::CNDM_CLAS_NAZI_DEI_DISP_MEDI => "CNDM (Classificazione Nazionale dei Dispositivi Medici)",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::COLD_ROLL_NUMB => "Cold roll number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::COLO_NUMB => "Colour number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::COMM_GROU => "Commodity grouping",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::CONT_BREA => "Contract breakdown",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::CONT_NUMB => "Contract number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::CONT_NUMB => "Control number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::COUP_NUMB => "Coupon number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::CPV_COMM_PROC_VOCA => "CPV (Common Procurement Vocabulary)",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::CUST_ORDE_NUMB => "Customer order number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::CUST_ARTI_NUMB => "Customs article number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::DAIL_STAT_OF_ACTI => "Daily statement of activities",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::DATA_CATE => "Data category",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::DIST_ARTI_IDEN => "Distributor’s article identifier",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::DRAWING => "Drawing",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::DRAW_REVI_NUMB => "Drawing revision number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::DUTC_CLAS_SYST_CBL => "Dutch classification system CBL",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::DYE_LOT_NUMB => "Dye lot number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::ECLSS => "eCl@ss",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::EDIS_ENER_DATA_IDEN_SYST => "EDIS (Energy Data Identification System)",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::EDMA_EURO_DIAG_MANU_ASSO_PROD_CLAS => "EDMA (European Diagnostic Manufacturers Association) Products Classification",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::EFFI_CONS_RESP_ECR_AUST_CLAS_SYST => "Efficient Consumer Response (ECR) Austria classification system",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::EGAR_EURO_GENE_ARTI_REGI => "EGAR (European Generic Article Register)",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::EMER_FIRE_CODE => "Emergency fire code",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::EMER_SPIL_CODE => "Emergency spillage code",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::END_ITEM => "End item",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::ENDORSEMENT => "Endorsement",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::ENGI_MODE_DESI => "Engine model designation",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::ENGI_CHAN_LEVE => "Engineering change level",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::ENGI_DATA_LIST => "Engineering data list",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::EU_COMB_NOME => "EU Combined Nomenclature",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::EU_ROHS_DIRE => "EU RoHS Directive",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::EURO_UNIO_DAIR_SUBS_ELIG_CLAS => "European Union dairy subsidy eligibility classification",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::EURO_WAST_CATA => "European Waste Catalogue",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::EXHIBIT => "Exhibit",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::FEDE_AGEN_ON_TECH_REGU_AND_METR_OF_THE_RUSS_FEDE => "Federal Agency on Technical Regulating and Metrology of the Russian Federation",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::FEDE_SUPP_CLAS => "Federal supply classification",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::FINA_PHAS => "Financial phase",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::FINN_CLAS_SYST_EANF => "Finnish classification system EANFIN",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::FISH_SPEC => "Fish species",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::FREN_CLAS_SYST_IFLS => "French classification system IFLS5",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::GENE_SPEC_NUMB => "General specification number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::GERM_CLAS_SYST_CCG => "German classification system CCG",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::GMDN_GLOB_MEDI_DEVI_NOME => "GMDN (Global Medical Devices Nomenclature)",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::GPI_GENE_PROD_IDEN => "GPI (Generic Product Identifier)",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::GS_GLOB_RETU_ASSE_IDEN_NONS => "GS1 Global Returnable Asset Identifier, non-serialised",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::GS_GLOB_TRAD_ITEM_NUMB => "GS1 Global Trade Item Number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::GS_ITAL_CLAS_SYST => "GS1 Italy classification system",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::GS_POLA_CLAS_SYST => "GS1 Poland classification system",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::GS_SPAI_CLAS_SYST => "GS1 Spain classification system",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::HARM_SYST => "Harmonised system",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::HARM_TARI_SCHE => "Harmonized tariff schedule",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::HAZA_MATE_ID_DOT => "Hazardous Materials ID DOT",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::HCPC_HEAL_COMM_PROC_CODI_SYST => "HCPCS (Healthcare Common Procedure Coding System)",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::HEAT_NUMB => "Heat number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::HIBC_HEAL_INDU_BAR_CODE => "HIBC (Health Industry Bar Code)",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::HOT_ROLL_NUMB => "Hot roll number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::ICPS_INTE_CLAS_FOR_PATI_SAFE => "ICPS (International Classification for Patient Safety)",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::IFDA_INTE_FOOD_DIST_ASSO => "IFDA (International Foodservice Distributors Association)",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::IFLS_INST_FRAN_DU_LIBR_SERV__DIGI_PROD_CLAS_CODE => "IFLS (Institut Francais du Libre Service) 5 digit product classification code",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::IFLS_INST_FRAN_DU_LIBR_SERV__DIGI_PROD_CLAS_CODE => "IFLS (Institut Francais du Libre Service) 9 digit product classification code",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::IMDG_MAIN_HAZA_CLAS => "IMDG main hazard class",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::IMDG_PACK_GROU => "IMDG packing group",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::IMDG_SUBS_RISK_CLAS => "IMDG subsidiary risk class",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::IMEI => "IMEI",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::INDU_COMM_CODE => "Industry commodity code",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::INST_MEAT_PURC_SPEC_IMPS_NUMB => "Institutional Meat Purchase Specifications (IMPS) Number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::INTE_ARTI_NUMB_ASSO_EAN => "International Article Numbering Association (EAN)",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::INTE_CIVI_AVIA_ADMI_CODE => "International Civil Aviation Administration code",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::INTE_CODE_OF_BOTA_NOME_ICBN => "International Code of Botanical Nomenclature (ICBN)",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::INTE_CODE_OF_NOME_FOR_CULT_PLAN_ICNC => "International Code of Nomenclature for Cultivated Plants (ICNCP)",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::INTE_CODE_OF_ZOOL_NOME_ICZN => "International Code of Zoological Nomenclature (ICZN)",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::INTE_MARI_ORGA_IMO_CODE => "International Maritime Organization (IMO) Code",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::ISBN_INTE_STAN_BOOK_NUMB => "ISBN (International Standard Book Number)",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::ISSN_INTE_STAN_SERI_NUMB => "ISSN (International Standard Serial Number)",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::JAPA_CLAS_SYST_JICF => "Japanese classification system JICFS",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::LOCA_STOC_NUMB_LSN => "Local Stock Number (LSN)",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::LOCA_ASSI_CONT_NUMB => "Locally assigned control number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::LOT_NUMB => "Lot number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::MACH_NUMB => "Machine number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::MANU_PROD_ARTI_NUMB => "Manufacturers (producers) article number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::MARP_CODE_IBC => "MARPOL Code IBC",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::MATE_CODE => "Material code",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::MEDD_MEDI_DICT_FOR_REGU_ACTI => "MedDRA (Medical Dictionary for Regulatory Activities)",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::MEDI_COLU => "Medical Columbus",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::MEXI_CLAS_SYST_AMEC => "Mexican classification system AMECE",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::MILE_EVEN_NUMB => "Milestone event number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::MODE_NUMB => "Model number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::MUTU_DEFI => "Mutually defined",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::NAPC_NORT_AMER_PROD_CLAS_SYST => "NAPCS (North American Product Classification System)",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::NATI_DRUG_CODE => "National drug code",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::NATI_DRUG_CODE__FORM => "National drug code 4-4-2 format",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::NATI_DRUG_CODE__FORM => "National drug code 5-3-2 format",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::NATI_DRUG_CODE__FORM => "National drug code 5-4-1 format",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::NATI_DRUG_CODE__FORM => "National drug code 5-4-2 format",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::NATI_PROD_GROU_CODE => "National product group code",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::NEXT_HIGH_ASSE_NUMB => "Next higher assembly number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::NHS_NATI_HEAL_SERV_ECLA => "NHS (National Health Services) eClass",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::NORW_CLAS_SYST_ENVA => "Norwegian Classification system ENVA",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::NSN_NORT_ATLA_TREA_ORGA_STOC_NUMB => "NSN (North Atlantic Treaty Organization Stock Number)",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::OFFI_ANIM_NUMB => "Official animal number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::ORIG_EQUI_NUMB => "Original equipment number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::PACK_NUMB => "Pack number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::PART_NUMB => "Part number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::PART_NUMB_DESC => "Part number description",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::PERI_STAT_OF_ACTI_WITH_A_BILA_AGRE_TIME_PERI => "Periodical statement of activities within a bilaterally agreed time period",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::PRIC_GROU_CODE => "Price grouping code",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::PRIC_LOOK_UP_NUMB => "Price look up number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::PRIC_LOOK_CODE_PLU => "Price Look-Up code (PLU)",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::PROD_VERS_NUMB => "Product version number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::PROD_IDEN_NUMB => "Product/service identification number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::PROM_VARI_NUMB => "Promotional variant number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::PURC_ORDE_NUMB => "Purchase order number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::PURC_ORDE_LINE_NUMB => "Purchasers order line number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::RECO_KEEP_OF_MODE_YEAR => "Record keeping of model year",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::REFI_PROD_CODE => "Refined product code",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::RELE_NUMB => "Release number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::RESO_NUMB => "Resource number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::RETU_CONT_NUMB => "Returnable container number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::RSK_NUMB => "RSK number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::RUN_NUMB => "Run number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::SAMP_NUMB => "Sample number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::SERI_NUMB => "Serial number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::SHIP_STOR_CLAS_TYPE => "Ships store classification type",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::SKU_STOC_KEEP_UNIT => "SKU (Stock keeping unit)",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::SLAB_NUMB => "Slab number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::SLAU_NUMB => "Slaughter number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::SNOM_CT_SYST_NOME_OF_MEDI_TERM => "SNOMED CT (Systematized Nomenclature of Medicine-Clinical Terms)",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::SOFT_REVI_NUMB => "Software revision number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::SPEC_MATE_IDEN_CODE => "Special material identification code",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::STAN_GROU_OF_PROD_MIXE_ASSO => "Standard group of products (mixed assortment)",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::STAT_LABE_CODE => "State label code",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::STYL_NUMB => "Style number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::SUPP_ASSI_CLAS => "Supplier assigned classification",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::SUPP_ARTI_NUMB => "Suppliers article number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::SUPP_SUPP_ARTI_NUMB => "Suppliers supplier article number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::TAXO_SERI_NUMB => "Taxonomic Serial Number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::TECH_PHAS => "Technical phase",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::THER_CLAS_NUMB => "Therapeutic classification number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::TITL__CODE_OF_FEDE_REGU => "Title 49 Code of Federal Regulations",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::TRAN_GROU_NUMB => "Transport group number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::UK_DMD_DICT_OF_MEDI_DEVI_STAN_CODI_SCHE => "UK DM&D (Dictionary of Medicines & Devices) standard coding scheme",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::ULTI_CUST_ARTI_NUMB => "Ultimate customers article number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::UMDN_UNIV_MEDI_DEVI_NOME_SYST => "UMDNS (Universal Medical Device Nomenclature System)",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::UNIT_NATI_DANG_GOOD_LIST => "United Nations Dangerous Goods List",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::UNSPSC => "UNSPSC",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::UPC_UNIV_PROD_CODE => "UPC (Universal product code)",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::UPC_UNIV_PROD_CODE_CONS_PACK_CODE => "UPC (Universal Product Code) Consumer package code (1-5-5)",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::UPC_UNIV_PROD_CODE_CONS_PACK_CODE => "UPC (Universal Product Code) Consumer package code (1-5-5-1)",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::UPC_UNIV_PROD_CODE_SHIP_CONT_CODE => "UPC (Universal Product Code) Shipping container code (1-2-5-5)",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::UPC_UNIV_PROD_CODE_SUFF => "UPC (Universal Product Code) suffix",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::UPC_UNIV_PROD_CODE_EURO_ARTI_NUMB_SHIP_CONT_CODE => "UPC (Universal Product Code)/EAN (European article number) Shipping container code (1-2-5-5-1)",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::US_FDA_FOOD_AND_DRUG_ADMI_PROD_CODE_CLAS_DATA => "US FDA (Food and Drug Administration) Product Code Classification Database",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::VARI_MEAS_PROD_CODE => "Variable measure product code",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::VEND_ITEM_NUMB => "Vendor item number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::VEND_SPEC_NUMB => "Vendor specification number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::VEND_SELL_PART_NUMB => "Vendors (sellers) part number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::VEND_SUPP_ITEM_NUMB => "Vendors supplemental item number",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::WAST_TYPE_EMSA => "Waste Type (EMSA)",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::WORK_TASK_NUMB => "Work task number",
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
            InvoiceSuiteCodelistItemTypeIdentificationCodes::LEVE_DOT_CODE => "A US Department of Transportation (DOT) code to identify hazardous (dangerous) goods, managed by the Customs and Border Protection (CBP) agency.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::AHFS_AMER_HOSP_FORM_SERV_PHAR_THER_CLAS => "Pharmacologic - therapeutic classification maintained by the American Hospital Formulary Service (AHFS).",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::AIR_FORC_REGU => "A department of Defense/Air Force code used to identify hazardous (dangerous) goods, managed by the Customs and Border Protection (CBP) agency.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::AIRL_TARI_D => "A US code agreed to by the airline industry to identify hazardous (dangerous) goods, managed by the Customs and Border Protection (CBP) agency.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::ASSEMBLY => "The item number is that of an assembly.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::ATC_ANAT_THER_CHEM_CLAS_SYST => "Anatomical Therapeutic Chemical classification system maintained by the World Health Organisation (WHO).",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::BATC_NUMB => "The item number is a batch number.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::BREED => "The breed of the item (e.g. plant or animal).",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::BURE_OF_EXPL_A_RAIL => "A Department of Transportation/Federal Railroad Administration code used to identify hazardous (dangerous) goods.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::BUYE_COLO => "Colour assigned by buyer.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::BUYE_INTE_PROD_GROU_CODE => "Product group code used within a buyers internal systems.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::BUYE_ITEM_NUMB => "The item number has been allocated by the buyer.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::BUYE_PART_NUMB => "Reference number assigned by the buyer to identify an article.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::BUYE_QUAL_FOR_SIZE => "The item number qualifies the size of the buyer.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::BUYE_SIZE_CODE => "Code given by the buyer to designate the size of an article in textile and shoe industry.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::BUYE_STYL_NUMB => "Number given by the buyer to a specific style or form of an article, especially used for garments.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::CALE_MONT_STAT_OF_ACTI => "A statement listing activities of a calendar month.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::CALE_WEEK_STAT_OF_ACTI => "A statement listing activities of a calendar week.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::CANA_CLAS_SYST_ICC => "Product classification system used in the Canadian market.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::CHEM_ABST_SERV_CAS_REGI_NUMB => "A unique numerical identifier for for chemical compounds, polymers, biological sequences, mixtures and alloys.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::CLAD_CLAS_DES_DISP_MDIC => "A five level classification system for medical decvices maintained by the CLADIMED organisation used in the French market.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::CMDR_CANA_MEDI_DEVI_REGU_CLAS_SYST => "Classification system related to the Canadian Medical Device Regulations maintained by Health Canada.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::CNDM_CLAS_NAZI_DEI_DISP_MEDI => "A classification system for medical devices used in the Italian market.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::COLD_ROLL_NUMB => "Number assigned to a cold roll.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::COLO_NUMB => "Code for the colour of an article.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::COMM_GROU => "Code for a group of articles with common characteristics (e.g. used for statistical purposes).",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::CONT_BREA => "To specify as an item, the contract breakdown.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::CONT_NUMB => "Reference number identifying a contract.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::CONT_NUMB => "To specify the control number.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::COUP_NUMB => "A number identifying a coupon.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::CPV_COMM_PROC_VOCA => "Official classification system for public procurement in the European Union.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::CUST_ORDE_NUMB => "Reference number of a customers order.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::CUST_ARTI_NUMB => "Code defined by Customs authorities to an article or a group of articles for Customs purposes.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::DAIL_STAT_OF_ACTI => "A statement listing activities of one day.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::DATA_CATE => "A code specifying a category of data.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::DIST_ARTI_IDEN => "Identifier assigned to an article by the distributor of that article.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::DRAWING => "Reference number identifying a drawing of an article.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::DRAW_REVI_NUMB => "Reference number indicating that a change or revision has been applied to a drawing.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::DUTC_CLAS_SYST_CBL => "Product classification system used in the Dutch market.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::DYE_LOT_NUMB => "Number identifying a dye lot.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::ECLSS => "Standardized material and service classification and dictionary maintained by eClass e.V.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::EDIS_ENER_DATA_IDEN_SYST => "European system for identification of meter data.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::EDMA_EURO_DIAG_MANU_ASSO_PROD_CLAS => "Classification for in vitro diagnostics medical devices maintained by the European Diagnostic Manufacturers Association.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::EFFI_CONS_RESP_ECR_AUST_CLAS_SYST => "Product classification system used in the Austrian market.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::EGAR_EURO_GENE_ARTI_REGI => "A classification system for medical devices.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::EMER_FIRE_CODE => "Classification for emergency response procedures related to fire.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::EMER_SPIL_CODE => "Classification for emergency response procedures related to spillage.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::END_ITEM => "A number specifying an end item.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::ENDORSEMENT => "A US Customs and Border Protection (CBP) code used to identify hazardous (dangerous) goods.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::ENGI_MODE_DESI => "A name or designation to identify an engine model.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::ENGI_CHAN_LEVE => "Reference number indicating that a change or revision has been applied to an articles specification.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::ENGI_DATA_LIST => "A code specifying the products engineering data list.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::EU_COMB_NOME => "The number is part of, or is generated in the context of the Combined Nomenclature classification, as developed and maintained by the European Union (EU).",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::EU_ROHS_DIRE => "European Union Directive on the restriction of hazardous substances.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::EURO_UNIO_DAIR_SUBS_ELIG_CLAS => "Category of product eligible for EU subsidy (applies for certain dairy products with specific level of fat content).",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::EURO_WAST_CATA => "Waste type number according to the European Waste Catalogue (EWC).",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::EXHIBIT => "A code indicating that the product is identified by an exhibit number.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::FEDE_AGEN_ON_TECH_REGU_AND_METR_OF_THE_RUSS_FEDE => "A Russian government agency that serves as a national standardization body of the Russian Federation.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::FEDE_SUPP_CLAS => "A code to specify a products Federal supply classification.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::FINA_PHAS => "To specify as an item, the financial phase.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::FINN_CLAS_SYST_EANF => "Product classification system used in the Finnish market.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::FISH_SPEC => "Identification of fish species.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::FREN_CLAS_SYST_IFLS => "Product classification system used in the French market.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::GENE_SPEC_NUMB => "The item number is a general specification number.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::GERM_CLAS_SYST_CCG => "Product classification system used in the German market.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::GMDN_GLOB_MEDI_DEVI_NOME => "Nomenclature system for identification of medical devices officially apprroved by the European Union.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::GPI_GENE_PROD_IDEN => "A drug classification system managed by Medi-Span.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::GS_GLOB_RETU_ASSE_IDEN_NONS => "A unique, 13-digit number assigned according to the numbering structure of the GS1 system and used to identify a type of Reusable Transport Item (RTI).",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::GS_GLOB_TRAD_ITEM_NUMB => "A unique number, up to 14-digits, assigned according to the numbering structure of the GS1 system.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::GS_ITAL_CLAS_SYST => "Product classification system used in the Italian market.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::GS_POLA_CLAS_SYST => "Product classification system used in the Polish market.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::GS_SPAI_CLAS_SYST => "Product classification system used in the Spanish market.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::HARM_SYST => "The item number is part of, or is generated in the context of the Harmonised Commodity Description and Coding System (Harmonised System), as developed and maintained by the World Customs Organization (WCO).",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::HARM_TARI_SCHE => "The international Harmonized Tariff Schedule (HTS) to classify the article for customs, statistical and other purposes.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::HAZA_MATE_ID_DOT => "A US Department of Transportation (DOT) code used to identify hazardous (dangerous) goods, managed by the Customs and Border Protection (CBP) agency.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::HCPC_HEAL_COMM_PROC_CODI_SYST => "A classification system used with US healthcare insurance programs.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::HEAT_NUMB => "Number assigned to the heat (also known as the iron charge) for the production of steel products.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::HIBC_HEAL_INDU_BAR_CODE => "Article identifier used within health sector to indicate data used conforms to HIBC.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::HOT_ROLL_NUMB => "Number assigned to a hot roll.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::ICPS_INTE_CLAS_FOR_PATI_SAFE => "A patient safety taxonomy maintained by the World Health Organisation.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::IFDA_INTE_FOOD_DIST_ASSO => "International Foodservice Distributors Association (IFDA).",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::IFLS_INST_FRAN_DU_LIBR_SERV__DIGI_PROD_CLAS_CODE => "5 digit code for product classification managed by the Institut Francais du Libre Service.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::IFLS_INST_FRAN_DU_LIBR_SERV__DIGI_PROD_CLAS_CODE => "9 digit code for product classification managed by the Institut Francais du Libre Service.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::IMDG_MAIN_HAZA_CLAS => "Main hazard class as defined in the International Maritime Dangerous Goods (IMDG) specification.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::IMDG_PACK_GROU => "Packing group as defined in the International Marititme Dangerous Goods (IMDG) specification.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::IMDG_SUBS_RISK_CLAS => "Subsidiary risk class as defined in the International Maritime Dangerous Goods (IMDG) specification.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::IMEI => "The International Mobile Station Equipment Identity (IMEI) is a unique number to identify mobile phones. It includes the origin, model and serial number of the device. The structure is specified in 3GPP TS 23.003.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::INDU_COMM_CODE => "The codes given to certain commodities by an industry.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::INST_MEAT_PURC_SPEC_IMPS_NUMB => "A number assigned by agricultural authorities to identify and track meat and meat products.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::INTE_ARTI_NUMB_ASSO_EAN => "Number assigned to a manufacturers product according to the International Article Numbering Association.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::INTE_CIVI_AVIA_ADMI_CODE => "A US Department of Transportation/Federal Aviation Administration code used to identify hazardous (dangerous) goods, managed by the Customs and Border Protection (CBP) agency.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::INTE_CODE_OF_BOTA_NOME_ICBN => "A code established by the International Code of Botanical Nomenclature (ICBN) used to classify and identify botanical articles and commodities.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::INTE_CODE_OF_NOME_FOR_CULT_PLAN_ICNC => "A code established by the International Code of Nomenclature for Cultivated Plants (ICNCP) used to classify and identify animals.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::INTE_CODE_OF_ZOOL_NOME_ICZN => "A code established by the International Code of Zoological Nomenclature (ICZN) used to classify and identify animals.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::INTE_MARI_ORGA_IMO_CODE => "An International Maritime Organization (IMO) code used to identify hazardous (dangerous) goods.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::ISBN_INTE_STAN_BOOK_NUMB => "A unique number identifying a book.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::ISSN_INTE_STAN_SERI_NUMB => "A unique number identifying a serial publication.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::JAPA_CLAS_SYST_JICF => "Product classification system used in the Japanese market.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::LOCA_STOC_NUMB_LSN => "A local number assigned to an item of stock.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::LOCA_ASSI_CONT_NUMB => "A number assigned locally for control purposes.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::LOT_NUMB => "A number indicating the lot number of a product.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::MACH_NUMB => "The item number is a machine number.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::MANU_PROD_ARTI_NUMB => "The number given to an article by its manufacturer.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::MARP_CODE_IBC => "International Bulk Chemical (IBC) code defined by the International Convention for the Prevention of Pollution from Ships (MARPOL).",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::MATE_CODE => "Code defining the materials type, surface, geometric form plus various classifying characteristics.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::MEDD_MEDI_DICT_FOR_REGU_ACTI => "A medical dictionary maintained by the International Federation of Pharmaceutical Manufacturers and Associations (IFPMA).",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::MEDI_COLU => "Medical product classification system used in the German market.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::MEXI_CLAS_SYST_AMEC => "Product classification system used in the Mexican market.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::MILE_EVEN_NUMB => "A number to identify a milestone event.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::MODE_NUMB => "Reference number assigned by the manufacturer to differentiate variations in similar products in a class or group.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::MUTU_DEFI => "Item type identification mutually agreed between interchanging parties.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::NAPC_NORT_AMER_PROD_CLAS_SYST => "Product classification system used in the North American market.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::NATI_DRUG_CODE => "A code specifying the national drug classification.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::NATI_DRUG_CODE__FORM => "A code identifying the product in national drug format 4-4-2.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::NATI_DRUG_CODE__FORM => "A code identifying the product in national drug format 5-3-2.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::NATI_DRUG_CODE__FORM => "A code identifying the product in national drug format 5-4-1.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::NATI_DRUG_CODE__FORM => "A code identifying the product in national drug format 5-4-2.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::NATI_PROD_GROU_CODE => "National product group code. Administered by a national agency.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::NEXT_HIGH_ASSE_NUMB => "A number specifying the next higher assembly or component into which the product is being incorporated.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::NHS_NATI_HEAL_SERV_ECLA => "Product and Service classification system used in United Kingdom market.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::NORW_CLAS_SYST_ENVA => "Product classification system used in the Norwegian market.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::NSN_NORT_ATLA_TREA_ORGA_STOC_NUMB => "Number assigned under the NATO (North Atlantic Treaty Organization) codification system to provide the identification of an approved item of supply.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::OFFI_ANIM_NUMB => "Unique number given by a national authority to identify an animal individually.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::ORIG_EQUI_NUMB => "Original equipment number allocated to spare parts by the manufacturer.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::PACK_NUMB => "Number assigned to a pack containing a stack of items put together (e.g. cold roll sheets (steel product)).",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::PART_NUMB => "A number indicating the part.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::PART_NUMB_DESC => "Reference number identifying a description associated with a number ultimately used to identify an article.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::PERI_STAT_OF_ACTI_WITH_A_BILA_AGRE_TIME_PERI => "Periodical statement listing activities within a bilaterally agreed time period.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::PRIC_GROU_CODE => "Number assigned to identify a grouping of products based on price.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::PRIC_LOOK_UP_NUMB => "Identification number on a product allowing a quick electronic retrieval of price information for that product.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::PRIC_LOOK_CODE_PLU => "Identification number affixed to produce in stores to retrieve price information.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::PROD_VERS_NUMB => "Number assigned by manufacturer or seller to identify the release of a product.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::PROD_IDEN_NUMB => "Reference number identifying a product or service.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::PROM_VARI_NUMB => "The item number is a promotional variant number.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::PURC_ORDE_NUMB => "Reference number identifying a customers order.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::PURC_ORDE_LINE_NUMB => "Reference number identifying a line entry in a customers order for goods or services.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::RECO_KEEP_OF_MODE_YEAR => "The item number relates to the year in which the particular model was kept.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::REFI_PROD_CODE => "A code specifying the product refinement designation.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::RELE_NUMB => "Reference number identifying a release from a buyers purchase order.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::RESO_NUMB => "A number to identify a resource.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::RETU_CONT_NUMB => "Reference number identifying a returnable container.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::RSK_NUMB => "Plumbing and heating.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::RUN_NUMB => "The item number identifies the production or manufacturing run or sequence in which the item was manufactured, processed or assembled.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::SAMP_NUMB => "Number assigned to a sample.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::SERI_NUMB => "Identification number of an item which distinguishes this specific item out of a number of identical items.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::SHIP_STOR_CLAS_TYPE => "Classification of ship’s stores.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::SKU_STOC_KEEP_UNIT => "Reference number of a stock keeping unit.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::SLAB_NUMB => "Number assigned to a slab, which is produced in a particular production step.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::SLAU_NUMB => "Unique number given by a slaughterhouse to an animal or a group of animals of the same breed.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::SNOM_CT_SYST_NOME_OF_MEDI_TERM => "A medical nomenclature system developed between the NHS and the College of American Pathologists.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::SOFT_REVI_NUMB => "A number assigned to indicate a revision of software.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::SPEC_MATE_IDEN_CODE => "A number to identify the special material code.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::STAN_GROU_OF_PROD_MIXE_ASSO => "The item number relates to a standard group of other items (mixed) which are grouped together as a single item for identification purposes.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::STAT_LABE_CODE => "A code which specifies the codification of the states labelling requirements.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::STYL_NUMB => "Number given to a specific style or form of an article, especially used for garments.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::SUPP_ASSI_CLAS => "Product classification assigned by the supplier.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::SUPP_ARTI_NUMB => "Number assigned to an article by the supplier of that article.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::SUPP_SUPP_ARTI_NUMB => "Article number referring to a sales catalogue of suppliers supplier.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::TAXO_SERI_NUMB => "A unique number assigned to a taxonomic entity, commonly to a species of plants or animals, providing information on their hierarchical classification, scientific name, taxonomic rank, associated synonyms and vernacular names where appropriate, data source information and data quality indicators.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::TECH_PHAS => "To specify as an item, the technical phase.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::THER_CLAS_NUMB => "A code to specify a products therapeutic classification.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::TITL__CODE_OF_FEDE_REGU => "A US Customs and Border Protection (CBP) code used to identify hazardous (dangerous) goods.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::TRAN_GROU_NUMB => "(8012) Additional number to form article groups for packing and/or transportation purposes.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::UK_DMD_DICT_OF_MEDI_DEVI_STAN_CODI_SCHE => "A classification system for medicines and devices used in the UK market.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::ULTI_CUST_ARTI_NUMB => "Number assigned by ultimate customer to identify relevant article.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::UMDN_UNIV_MEDI_DEVI_NOME_SYST => "A standard international nomenclature and computer coding system for medical devices maintained by the Emergency Care Research Institute (ECRI).",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::UNIT_NATI_DANG_GOOD_LIST => "A UN code used to classify and identify dangerous goods.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::UNSPSC => "The UNSPSC commodity classification system.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::UPC_UNIV_PROD_CODE => "Number assigned to a manufacturers product by the Product Code Council.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::UPC_UNIV_PROD_CODE_CONS_PACK_CODE => "An 11-digit code that uniquely identifies consumer packaging of a product; does not have a check digit.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::UPC_UNIV_PROD_CODE_CONS_PACK_CODE => "A 12-digit code that uniquely identifies the consumer packaging of a product, including a check digit.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::UPC_UNIV_PROD_CODE_SHIP_CONT_CODE => "A 13-digit code that uniquely identifies the manufacturers shipping unit, including the packaging indicator.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::UPC_UNIV_PROD_CODE_SUFF => "A suffix used in conjunction with a higher level UPC (Universal product code) to define packing variations for a product.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::UPC_UNIV_PROD_CODE_EURO_ARTI_NUMB_SHIP_CONT_CODE => "A 14-digit code that uniquely identifies the manufacturers shipping unit, including the packaging indicator and the check digit.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::US_FDA_FOOD_AND_DRUG_ADMI_PROD_CODE_CLAS_DATA => "US FDA Product Code Classification Database contains medical device names and associated information developed by the Center for Devices and Radiological Health (CDRH).",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::VARI_MEAS_PROD_CODE => "A code assigned to identify a variable measure item.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::VEND_ITEM_NUMB => "Reference number assigned by a vendor/seller identifying a product/service/article.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::VEND_SPEC_NUMB => "The item number has been allocated by the vendor as a specification number.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::VEND_SELL_PART_NUMB => "Reference number assigned by a vendor/seller identifying an article.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::VEND_SUPP_ITEM_NUMB => "The item number is a specified by the vendor as a supplemental number for the vendors purposes.",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::WAST_TYPE_EMSA => "Classification of waste as defined by the European Maritime Safety Agency (EMSA).",
            InvoiceSuiteCodelistItemTypeIdentificationCodes::WORK_TASK_NUMB => "A number to identify a work task.",
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
            'https://www.xrepository.de/details/urn:xoev-de:kosit:codeliste:untdid.7143',
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
            'https://www.xrepository.de/api/xrepository/urn:xoev-de:kosit:codeliste:untdid.7143_4/download/UNTDID_7143_4.json',
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
