<?php

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\codelists;

/**
 * Class representing list of codes for the identification of organizations and organization parts
 * Name of list: ISO/IEC 17 6523 - Identifier scheme code (ICD)
 *
 * @category InvoiceSuite
 * @author   HorstOeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 * @see      https://www.xrepository.de/details/urn:xoev-de:kosit:codeliste:icd
 * @see      https://www.xrepository.de/api/xrepository/urn:xoev-de:kosit:codeliste:icd_5/download/ICD_5.json
 */
enum InvoiceSuiteCodelistSchemeIdentifiers: string
{
    /**
     * ACTALIS Object Identifiers (0159)
     *
     * The code is primarily intended for the registration of Object Identifiers
     * (OIDs) according to ISO 8824/8825: Level 1: iso (1), Level 2:
     * identified-organization (3), Level 3: ACTALIS SpA (0159), Level 4 and
     * higher: (defined by ACTALIS) See "Intended purpose/application area"
     * Issuing agency: ACTALIS S.p.A., ITALY.
     */
    case ACTA_OBJE_IDEN = '0159';

    /**
     * Advanced Telecommunications Modules Limited, Corporate Network (0083)
     *
     * Notes on Use of Code: The ICD code will also form part of the Initial
     * Domain Part of the OSI network addressing as specified in Addendum 2 to ISO
     * 8348. Issuing agency: ATM Ltd, ENGLAND.
     */
    case ADVA_TELE_MODU_LIMI_CORP_NETW = '0083';

    /**
     * Advantis (0120)
     *
     * Issuing agency: Advantis, USA.
     */
    case ADVANTIS = '0120';

    /**
     * Aeronautical Telecommunications Network (ATN) (0027)
     *
     * Notes on Use of Code: The ICD code forms the initial part of the ISO
     * network addressing and naming tree as depicted in Addendum No 2 to ISO 8348
     * Issuing agency: International Civil Aviation Organization (ICAO), CANADA.
     */
    case AERO_TELE_NETW_ATN = '0027';

    /**
     * Affable Software Data Interchange Codes (0121)
     *
     * Issuing agency: Affable Software Corporation, Canada.
     */
    case AFFA_SOFT_DATA_INTE_CODE = '0121';

    /**
     * AGFA-DIS (0051)
     *
     * Notes on Use of Code: Medical Communication Issuing agency: AGFA N.V.
     * BELGIUM.
     */
    case AGFADIS = '0051';

    /**
     * Air Transport Industry Services Communications Network (0019)
     *
     * The ICD code forms the initial part of the OSI network addressing and
     * naming tree as depicted in Addendum 2 to ISO 8348. Issuing agency:
     * International Air Transport Association, Switzerland.
     */
    case AIR_TRAN_INDU_SERV_COMM_NETW = '0019';

    /**
     * Alcanet/Alcatel-Alsthom Corporate Network (0075)
     *
     * Notes on Use of Code: The ICD code forms the initial part of the OSI
     * network addressing scheme as depicted in Addendum 2 of ISO 8384. Issuing
     * agency: Alcatel Network Services Deutschland GmbH, GERMANY.
     */
    case ALCA_CORP_NETW = '0075';

    /**
     * Amazon Unique Identification Scheme (0187)
     *
     * Intended Purpose/App. Area: To provide identifiers for properties, classes,
     * groups, or lists of data and objects specified by or used by Amazon.com,
     * Inc. and its Affiliates Identifiers assigned under this scheme may be
     * usable as Object Identifiers in accordance with ISO/IEC 8824, usable with
     * Directories in accordance with ISO/IEC 9594, usable in accordance with
     * ISO/IEC 8348, or usable in other contexts as defined by Amazon. Issuing
     * agency: Amazon Technologies, Inc. in the United States.
     */
    case AMAZ_UNIQ_IDEN_SCHE = '0187';

    /**
     * APPLiA Pl Standard (0197)
     *
     * Intended Purpose/App. Area: Through their European industry association
     * APPLiA (Home Appliance Europe), manufacturers of home appliances have
     * launched the Product Information (Pl) initiative. The initiative introduces
     * a standard structure for product information. Pl Standard helps retailers
     * to take full advantage of electronic communication and data processing, as
     * the Internet and ICT are fundamentally changing how products and services
     * are offered, bought, and sold.. Issuing agency: APPLiA Home Appliance
     * Europe, in Belgium
     */
    case APPL_PL_STAN = '0197';

    /**
     * ARINC (0074)
     *
     * Notes on Use of Code: ARINC will define its own Objects for use with its
     * OSI-based systems and services. ARINC will also define Objects for use
     * within the Aeronautical industry. Issuing agency: ARINC Incorporated, USA.
     */
    case ARINC = '0074';

    /**
     * ascomOSINet (0063)
     *
     * Issuing agency: Ascom AG, Switzerland.
     */
    case ASCOMOSINET = '0063';

    /**
     * Association of Swedish Chambers of Commerce and Industry Scheme (EDIRA
     * compliant) (0107)
     *
     * Issuing agency: Association of Swedish Chambers of Commerce and Industry,
     * Sweden.
     */
    case ASSO_OF_SWED_CHAM_OF_COMM_AND_INDU_SCHE_EDIR_COMP = '0107';

    /**
     * AT&T/OSI Network (0030)
     *
     * Notes on Use of Code: The ICD code will also form the Initial Domain Part
     * of the OSI network, addressing and naming tree as specified in Addendum 2
     * to ISO 8348. Issuing agency: AT&T, Standards and Regulatory Support, UNITED
     * STATES OF AMERICA.
     */
    case ATTO_NETW = '0030';

    /**
     * Athens Chamber of Commerce & Industry Scheme (EDIRA compliant) (0084)
     *
     * Notes on Use of Code : EDIRA recommendations for coding in EDIFACT and
     * other EDI syntaxes. Issuing agency: Athens Chamber of Commerce & Industry,
     * Greece.
     */
    case ATHE_CHAM_OF_COMM_INDU_SCHE_EDIR_COMP = '0084';

    /**
     * ATM Forum (0079)
     *
     * Notes on Use of Code: The ICD code will also form part of the Initial
     * Domain Part of the OSI network addressing as specified in Addendum 2 to ISO
     * 8348. Issuing agency: The ATM Forum, USA.
     */
    case ATM_FORU = '0079';

    /**
     * ATM interconnection with the Dutch KPN Telecom (0157)
     *
     * ITO Drager Net. The ICD code also form the initial part of the OSI network
     * addressing scheme (Addendum 2 of ISO 8384) Issuing agency: Informatie en
     * Communicatie Technologie Organisatie, The Netherlands.
     */
    case ATM_INTE_WITH_THE_DUTC_KPN_TELE = '0157';

    /**
     * ATM-Network ZN'96 (0118)
     *
     * Issuing agency: Deutsche Telekom AG, Germany.
     */
    case ATMN_ZN = '0118';

    /**
     * Auckland Area Health (0049)
     *
     * Notes on Use of Code: ISO 6523 ICD IDI format with binary syntax will be
     * used Issuing agency: Auckland Area Health Board, Information Systems,
     * Greenlane/National Women's Hospital, New Zealand.
     */
    case AUCK_AREA_HEAL = '0049';

    /**
     * AUNA (0156)
     *
     * Telecommunication network of operators in the AUNA Group. This code shall
     * be used as an element of NSAP addressing Issuing agency: AUNA, Spain.
     */
    case AUNA = '0156';

    /**
     * Australian Business Number (ABN) Scheme (0151)
     *
     * The ABN will be a unique identifier for a business to interact with
     * Government (Commonwealth, State and Local) throughout, Australia and is the
     * supporting number for the Goods and Service Tax (GST). The Legislation
     * covering the use of ABN, (see notes on use) will have application
     * throughout the Commonwealth of The ABN is established by: A New Tax System
     * (Australian, Business Number) Act 1999, enacted by the Australian
     * Parliament. The scheme is expected to last for at least 100 Years without
     * reallocation of identification numbers. The ABN is specified in English.
     * Issuing agency: Australian Taxation Office, AUSTRALIA.
     */
    case AUST_BUSI_NUMB_ABN_SCHE = '0151';

    /**
     * Australian Chambers of Commerce and Industry Scheme (EDIRA compliant) (0108)
     *
     * Issuing agency: Australian Chambers of Commerce and Industry, Australia.
     */
    case AUST_CHAM_OF_COMM_AND_INDU_SCHE_EDIR_COMP = '0108';

    /**
     * BASF Company ATM-Network (0123)
     *
     * Issuing agency: BASF Computer Services GmbH, Germany.
     */
    case BASF_COMP_ATMN = '0123';

    /**
     * BB-DATA GmbH (0122)
     *
     * Issuing agency: BB-DATA GmbH, Germany.
     */
    case BBDA_GMBH = '0122';

    /**
     * BCNR (Swiss Clearing Bank Number) (0128)
     *
     * Issuing agency: Telekurs AG, Switzerland.
     */
    case BCNR_SWIS_CLEA_BANK_NUMB = '0128';

    /**
     * Bell Atlantic (0110)
     *
     * Issuing agency: Bell Atlantic, USA.
     */
    case BELL_ATLA = '0110';

    /**
     * BellSouth ICD AESA (ATM End System Address) (0109)
     *
     * Issuing agency: BellSouth Corporation, USA.
     */
    case BELL_ICD_AESA_ATM_END_SYST_ADDR = '0109';

    /**
     * BPI (Swiss Business Partner Identification) code (0129)
     *
     * Issuing agency: Telekurs AG, Switzerland.
     */
    case BPI_SWIS_BUSI_PART_IDEN_CODE = '0129';

    /**
     * BT - ICD Coding System (0104)
     *
     * Issuing agency: Tony Holmes, UK.
     */
    case BT_ICD_CODI_SYST = '0104';

    /**
     * BULL ODI/DSA/UNIX Network (0047)
     *
     * Notes on Use of Code: To be used in data communications to form part of the
     * network address. The ISO 6523 ICD IDI format with binary syntax will be
     * used. Issuing agency: BULL S.A. FRANCE.
     */
    case BULL_ODID_NETW = '0047';

    /**
     * Cable & Wireless Global ATM End-System Address Plan (0136)
     *
     * Issuing agency: Cable & Wireless Global Business Inc., USA
     */
    case CABL_WIRE_GLOB_ATM_ENDS_ADDR_PLAN = '0136';

    /**
     * CEN/ISSS Object Identifier Scheme (0162)
     *
     * To allocate OIDs to objects defined in the standards and specifications
     * developed in CEN’s technical bodies (TCs, Workshops, etc) The code is
     * primarily intended for the registration ofObject Identifiers according to
     * ISO 8824-1 Annex BLevel 1: iso (1)Level 2: identified-organization (3)Level
     * 3: CEN (nnnn –the ICD allocated)Level 4: and higher: (defined by CEN
     * conventions). Issuing agency: Comité Européen de Normalization, Belgium.
     */
    case CENI_OBJE_IDEN_SCHE = '0162';

    /**
     * Certicom Object Identifiers (0132)
     *
     * Issuing agency: Certicom Corp, U.S.A.
     */
    case CERT_OBJE_IDEN = '0132';

    /**
     * CHAMBER OF COMMERCE TEL AVIV-JAFFA Scheme (EDIRA compliant) (0098)
     *
     * Issuing agency: Chamber of Commerce Tel Aviv-Jaffa, ISRAEL.
     */
    case CHAM_OF_COMM_TEL_AVIV_SCHE_EDIR_COMP = '0098';

    /**
     * Check Point Software Technologies (0114)
     *
     * Issuing agency: Check Point Software Technologies Ltd, ISRAEL.
     */
    case CHEC_POIN_SOFT_TECH = '0114';

    /**
     * Cisco Sysytems / OSI Network (0091)
     *
     * Issuing agency: Cisco Systems, USA.
     */
    case CISC_SYSY_OSI_NETW = '0091';

    /**
     * Citicorp Global Information Network (0041)
     *
     * Notes on Use of Code: The ICD code will also form the initial part of the
     * Citicorp Network addressing object identifier tree and naming tree as
     * depicted in Addendum 2 to ISO 8348. Issuing agency: Citicorp Global
     * Information Network, USA.
     */
    case CITI_GLOB_INFO_NETW = '0041';

    /**
     * CODDEST (0205)
     *
     * Intended Purpose/App. Area: Electronic Invoicing trough Sdl, the Exchange
     * System used in Italy where the electronic invoices are transmitted to the
     * Public Administration (Article 1, paragraph 211, of Italian Law no. 244 of
     * 24 December 2007) or to private entities (Article 1, paragraph 2, of
     * Legislative Decree 127/2015). Issuing agency: Agenzia delle Entrate in
     * Italy.
     */
    case CODDEST = '0205';

    /**
     * Code for the Identification of National Organizations (0131)
     *
     * Issuing agency: China National Organization Code Registration Authority,
     * P.R. of China.
     */
    case CODE_FOR_THE_IDEN_OF_NATI_ORGA = '0131';

    /**
     * CODICE FISCALE (0210)
     *
     * Intended Purpose/App. Area: Electronic Invoicing and e-procurement. Issuing
     * agency: Agenzia delle Entrate, Italy.
     */
    case CODI_FISC = '0210';

    /**
     * Codice Univoco Unità Organizzativa iPA (0201)
     *
     * Intended Purpose/App. Area: Used to identify uniquely all organizational
     * units of public bodies, authorities and public services in Italy. Issuing
     * agency: Agenzia per l’Italia digitale in Italy.
     */
    case CODI_UNIV_UNIT_ORGA_IPA = '0201';

    /**
     * Codification Numerique des Etablissments Financiers En Belgique (0003)
     *
     * Notes on Use of Code: Many financial institutions have more than one code
     * number, e.g. to indicate each branch individually. The codes can be
     * reallocated over the time (mostly in the case where a financial institution
     * terminates its activity). Some code numbers are currently unused. Code
     * numbers 990 through 999 are reserved. Issuing agency: Association Belge des
     * Banques, Belgium.
     */
    case CODI_NUME_DES_ETAB_FINA_EN_BELG = '0003';

    /**
     * COMMON LANGUAGE (0017)
     *
     * Notes on Use of Code: Codes for named populated places, geographic places,
     * geopolitical places, outlaying areas, and other related entities of the
     * state of the United States, provinces and territories of Canada, countries
     * of the world, and other, unique areas. Also for the identification of
     * organizations, places, equipment and governmental entities by the
     * telecommunication industry. Issuing agency: Data Communications Technology
     * Planning, USA.
     */
    case COMM_LANG = '0017';

    /**
     * Company Code (Estonia) (0191)
     *
     * Intended Purpose/App. Area: Company code is major and only unique
     * identifier of all institutions and organisations in Estonia. This code is
     * widely used for various purposes, including electronic commerce. Usage of
     * company code is required in communication between institutions and also in
     * communication between private and public organisations. For use in EDI or
     * other B2B (B2C) exchanges to identify private and public organisations.
     * Issuing agency: Centre of Registers and Information Systems of the Ministry
     * of Justice in Estonia.
     */
    case COMP_CODE_ESTO = '0191';

    /**
     * Concert Global Network Services ICD AESA (0153)
     *
     * Global Addressing of the Concert ATM switches and any direct customer ATM
     * networks for implementation of PNNI. It will also be used for any attached
     * carrier ATM networks. Used to form globally unique Concert ICD ATM End
     * System Addresses (AESA's). Issuing agency: Concert Global Network Services
     * Ltd, Bermuda.
     */
    case CONC_GLOB_NETW_SERV_ICD_AESA = '0153';

    /**
     * Corporate Number of The Social Security and Tax Number System (0188)
     *
     * Intended Purpose/App. Area: The number system of Japan is a social
     * infrastructure to improve efficiency and the transparency of the social
     * security and the tax system, and to achieve a highly convenient, impartial,
     * and fair society. Additionally, the profit of the number system can be free
     * usage for various purposes, so we want to use the Corporate Number as
     * identifiers in various fields, like in electronic commerce, transportation,
     * etc. The preliminary work, numbering the identifiers for the beginning of
     * usage in January 2016, is being done. Issuing agency: National Tax Agency
     * Japan.
     */
    case CORP_NUMB_OF_THE_SOCI_SECU_AND_TAX_NUMB_SYST = '0188';

    /**
     * DaimlerChrysler Corporate Network (0070)
     *
     * Notes on Use of Code: The ICD code will form the initial part of the OSI
     * Network addressing and naming free as depicted in Addendum 2 to ISO 8348
     * (Network Layer addressing). These addresses will uniquely identify systems
     * within DBCN and to the outside world. Issuing agency: DaimlerChrysler AG,
     * GERMANY.
     */
    case DAIM_CORP_NETW = '0070';

    /**
     * DANISH CHAMBER OF COMMERCE Scheme (EDIRA compliant) (0096)
     *
     * Issuing agency: Danish Chamber of Commerce, Denmark.
     */
    case DANI_CHAM_OF_COMM_SCHE_EDIR_COMP = '0096';

    /**
     * DANZNET (0059)
     *
     * Issuing agency: DANZAS AG, Switzerland.
     */
    case DANZNET = '0059';

    /**
     * Data Universal Numbering System (D-U-N-S Number) (0060)
     *
     * Notes on Use of Code: The D-U-N-S Number originated to facilitate the
     * compilation of financial status reports on those involved in business
     * transactions but it is now widely used for other purposes also. The number
     * has world wide recognition as a means of identifying businesses and
     * institutions. Issuing agency: Dun and Bradstreet Ltd, UK.
     */
    case DATA_UNIV_NUMB_SYST_DUNS_NUMB = '0060';

    /**
     * DBP Telekom Object Identifiers (0042)
     *
     * Notes on Use of Code: 1) The ICD is primarily intended for the registration
     * of Object Identifiers, according to ISO 8824/8825 (ANS.1) to be used for
     * the identification resp. registration of: - application layer protocols, -
     * file & document formats, - information objects, - local/remote procedures.
     * The OID structure and the inclusion of the ICD therein is given below:
     * level 1: iso(1), level 2: identifiedOrganisation(3), level 3 (ICD):
     * dbpt(0042), level 4 to n: (defined by Telekom). Issuing agency: DBP
     * Telekom, GERMANY.
     */
    case DBP_TELE_OBJE_IDEN = '0042';

    /**
     * DEUTSCHER INDUSTRIE- UND HANDELSTAG (DIHT) Scheme (EDIRA compliant) (0094)
     *
     * Issuing agency: Deutscher Industrie -und Handelstag (DIHT), Germany.
     */
    case DEUT_INDU_UND_HAND_DIHT_SCHE_EDIR_COMP = '0094';

    /**
     * DGCP (Direction Générale de la Comptabilité Publique)administrative
     * accounting identification scheme (0145)
     *
     * de assigned by the French public accounting office. Issuing agency: DGCP
     * (Direction Générale de la Comptabilité Publique), 139 Rue de Bercy,
     * 75572 Paris Cedex 12, France
     */
    case DGCP_DIRE_GNRA_DE_LA_COMP_PUBL_ACCO_IDEN_SCHE = '0145';

    /**
     * DGI (Direction Générale des Impots) code (0146)
     *
     * French taxation authority. Issuing agency: DGI (Direction Générale des
     * Impots), France.
     */
    case DGI_DIRE_GNRA_DES_IMPO_CODE = '0146';

    /**
     * DiGAVEID (XR01)
     *
     * eindeutiges Kennzeichen fuer eine Verordnungseinheit einer digitalen
     * Gesundheitsanwendung (DiGA) nach Paragraph 139e SGB V
     */
    case DIGAVEID = 'XR01';

    /**
     * Digital Equipment Corporation: DEC (0024)
     *
     * Notes on Use of Code: The ICD code forms the initial part of the OSI
     * network addressing as described in ISO8348 Addendum 2. Issuing agency:
     * Digital Equipment (Europe) S.A.R.L. France.
     */
    case DIGI_EQUI_CORP_DEC = '0024';

    /**
     * DIGSTORG (0184)
     *
     * Intended Purpose/App. Area: To be used for identifying Danish companies
     * included juridical persons and associations in international trade It is
     * possible to add 0-4 characters set to the code for more detailed use of one
     * organization. Characters are digits or capital letter. Issuing agency: The
     * Danish Agency for Digitisation, Denmark.
     */
    case DIGSTORG = '0184';

    /**
     * Directorates of the European Commission (0130)
     *
     * Issuing agency: European Commission, Belgium
     */
    case DIRE_OF_THE_EURO_COMM = '0130';

    /**
     * DoDAAC (Department of Defense Activity Address Code) (0144)
     *
     * A code assigned to uniquely identify all military units in the United
     * States Department of Defense. Issuing agency: DoD (Unites States Department
     * of Defense), USA.
     */
    case DODA_DEPA_OF_DEFE_ACTI_ADDR_CODE = '0144';

    /**
     * Dresdner Bank Corporate Network (0127)
     *
     * Issuing agency: Dresdner Bank AG, Germany.
     */
    case DRES_BANK_CORP_NETW = '0127';

    /**
     * EAN Location Code (0088)
     *
     * Issuing agency: EAN International, Belgium.
     */
    case EAN_LOCA_CODE = '0088';

    /**
     * ECCMA Open Technical Directory (0161)
     *
     * A centralized dictionary of names and definitions of trading concepts,
     * essentially goods and services that are bought, sold or exchanged. This is
     * a classification neutral dictionary of names and attributes (also referred
     * to as characteristics or properties). The eOTD will help improve the speed
     * and accuracy of Internet searches and can be imported into sourcing,
     * procurement and ERP systems with minimal data transformation costs. Issuing
     * agency: Electronic Commerce Code Management Association, USA.
     */
    case ECCM_OPEN_TECH_DIRE = '0161';

    /**
     * eCI@ss (0173)
     *
     * To uniquely identify properties, classes and list of characteristics (LoC)
     * for products and services available in the eCI@ss classification system The
     * code is used to uniquely identify objects in the eCI@ss classification
     * system. Issuing agency: eCI@ss, Germany.
     */
    case ECISS = '0173';

    /**
     * eDelivery Network Participant identifier (0203)
     *
     * Intended Purpose/App. Area: Used as an electronic address identifier for
     * participants within a secure data communication network. Issuing agency:
     * Agency for Digital Government in Sweden.
     */
    case EDEL_NETW_PART_IDEN = '0203';

    /**
     * EDI Partner Identification Code (0031)
     *
     * Notes on Use of Code: To identify EDI partners. Issuing agency: Odette NL,
     * The Netherlands.
     */
    case EDI_PART_IDEN_CODE = '0031';

    /**
     * Edira Scheme Identifier Code (0152)
     *
     * For the unambiguous identification of registration scheme used in
     * e-commerce (not to be used for the identification of organizations). The
     * code is used to designate unambiguously schemes used in e-commerce to
     * specify any entity but organizations. Issuing agency: EDIRA Association,
     * c/o Zurich chamber of commerce, Switzerland.
     */
    case EDIR_SCHE_IDEN_CODE = '0152';

    /**
     * EINESTEINet AG (0143)
     *
     * Initially the Network covers the geographical area of Germany with the
     * intention of expanding into all the European countries EINSTEINet's goal is
     * to provide Application Services using an ATM network to customers located
     * throughout Europe. The need for the international ATM address structure is
     * to serve EINSTENet's customers with consistent ATM addresses from
     * end-to-end. Issuing agency: EINSTEINet AG, Germany.
     */
    case EINE_AG = '0143';

    /**
     * Electronic Data Interchange: EDI (0015)
     *
     * Issuing agency: Avon Rubber p.l.c. UK.
     */
    case ELEC_DATA_INTE_EDI = '0015';

    /**
     * Energy Net (0055)
     *
     * Issuing agency: ABB Asea Brown Boveri Ltd, Switzerland.
     */
    case ENER_NET = '0055';

    /**
     * ERSTORG (0198)
     *
     * Intended Purpose/App. Area: To be used for identifying Danish companies
     * based on VAT numbers included juridical. Issuing agency: The Danish
     * Business Authority in Denmark.
     */
    case ERSTORG = '0198';

    /**
     * European Business Identifier (EBID) (0189)
     *
     * Intended Purpose/App. Area: For use in EDI or other B2B exchanges to
     * identify business entities (organizations). The scheme is used to identify
     * organisations, and parts of organisations which are parties to or are
     * referenced in electronic transactions such as EDI messaging or other B2B
     * exchanges. Issuing agency: EBID Service AG CAS-Weg in Germany.
     */
    case EURO_BUSI_IDEN_EBID = '0189';

    /**
     * European Computer Manufacturers Association: ECMA (0012)
     *
     * Issuing agency: European Computer Manufacturers Association, SWITZERLAND.
     */
    case EURO_COMP_MANU_ASSO_ECMA = '0012';

    /**
     * European Laboratory for Particle Physics: CERN (0020)
     *
     * Notes on Use of Code: The ICD code forms the initial part of the OSI
     * network addressing and naming tree as depicted in Addendum 2 of ISO 8348.
     * Issuing agency: European Laboratory for Particle Physics, Switzerland.
     */
    case EURO_LABO_FOR_PART_PHYS_CERN = '0020';

    /**
     * EWOS Object Identifiers (0016)
     *
     * Notes on Use of Code: a) In the SIO the Organization Name will normally be
     * omitted, b) The code is primarily intended for the registration of Objects
     * Identifiers according to ISO 8824: Level 1: iso (1), Level 2:
     * identified-organization (3), Level 3: ewos (0016), Level 4: and higher:
     * (defined by EWOS conventions) Issuing agency: EWOS (European Workshop for
     * Open Systems), BELGIUM.
     */
    case EWOS_OBJE_IDEN = '0016';

    /**
     * FIEIE Object identifiers (0165)
     *
     * To provide identifiers for international enterprises and organizations
     * operating in fields of business served by the Jaakko Poyry Group. On the
     * date of the application, these fields include Forest industry, Energy,
     * Infrastructure and Environment. To provide an internationally unambiguous
     * framework for existing coding practices in this The code is primarily
     * intended for the registration of Object Identifiers according to ISO/IEC
     * 8824, 8825 and 11179: Level 1: iso (1) Level 2: identified organization (3)
     * Level 3: fieie code (nnnn, the ICD allocated) Level 4 and higher: (defined
     * by FIEIE conventions). Issuing agency: Jaakko Poyry Group Oyj, Finland.
     */
    case FIEI_OBJE_IDEN = '0165';

    /**
     * Finnish Organization Identifier (0212)
     *
     * Intended Purpose/App. Area: Identification scheme will be used for
     * electronic trade purposes in e-invoicing, purchasing, electronic receipts.
     * Issuing agency: State Treasury of Finland / Valtiokonttor.
     */
    case FINN_ORGA_IDEN = '0212';

    /**
     * Finnish Organization Value Add Tax Identifier (0213)
     *
     * Intended Purpose/App. Area: Identification scheme will be used for
     * electronic trade purposes in e-invoicing, purchasing, electronic receipts.
     * Issuing agency: State Treasury of Finland / Valtiokonttor.
     */
    case FINN_ORGA_VALU_ADD_TAX_IDEN = '0213';

    /**
     * Firmenich (0050)
     *
     * Notes on Use of Code: Interconnect the plants by an OSI network essentially
     * over X.25 carrier. Issuing agency: Firmenich S A, Switzerland.
     */
    case FIRMENICH = '0050';

    /**
     * France Telecom ATM End System Address Plan (0138)
     *
     * The coding system will be used to provide ATM End System Addresses based on
     * ICD format NSAP addresses. These addresses will be used to uniquely
     * identify User Network. Interfaces to ATM networks as specified by the ATM
     * Forum UNI specifications. France telecom will also use these addresses
     * Internally and to provide worldwide customers with non- Geographic private
     * AESAs. These global addresses should be Reachable by non-France Telecom ATM
     * users via Interconnecting ATM carriers. The ICD Code will also form part of
     * the Initial Domain Part of the OSI network addressing as specified in
     * Addendum 2 to ISO 8348. Issuing agency: France Telecom, France.
     */
    case FRAN_TELE_ATM_END_SYST_ADDR_PLAN = '0138';

    /**
     * Freischaltcode (XR02)
     *
     * digitaler Gutschein fuer die Nutzung einer digitale Gesundheitsanwendung
     * (DiGA) nach Paragraph 139e SGB V
     */
    case FREISCHALTCODE = 'XR02';

    /**
     * FTI - Ediforum Italia, (EDIRA compliant) (0097)
     *
     * Issuing agency: FTI - Ediforum Italia, ITALY.
     */
    case FTI_EDIF_ITAL_EDIR_COMP = '0097';

    /**
     * FUNLOC (0046)
     *
     * Notes on Use of Code: Current applications are Philips accounting and
     * logistic systems; new application is the identification of objects in the
     * open network environment according to ISO 8824 which starts with a party
     * identification Issuing agency: Royal Philips Electronics N.V., The
     * Netherlands.
     */
    case FUNLOC = '0046';

    /**
     * Global AESA scheme (0137)
     *
     * Construct and Administer AESAs, Routing of ATM switched connections Use to
     * from globally unique Global One ICD AESAs. Issuing agency: Global One,
     * Belgium.
     */
    case GLOB_AESA_SCHE = '0137';

    /**
     * Global Business Identifier (0149)
     *
     * For a company's ability to obtain complete and accurate information about
     * potential suppliers Used to identify and designate in electronic commerce
     * Issuing agency: ResolveNet (IOM) Ltd, UK.
     */
    case GLOB_BUSI_IDEN = '0149';

    /**
     * Global Crossing AESA (ATM End System Address) (0155)
     *
     * Construction, administration and implementation of a scalable AESA schema
     * for routing if ATM switched connections. ICD will be used as a component of
     * the IDP (Initial Domain Part) for OSI addressing. Issuing agency: Global
     * Crossing Ltd, Bermuda.
     */
    case GLOB_CROS_AESA_ATM_END_SYST_ADDR = '0155';

    /**
     * GS1 identification keys (0209)
     *
     * Intended Purpose/App. Area: GS1 identification keys and key qualifiers may
     * be used by an information system to refer unambiguously to an entity such
     * as a trade item, logistics unit, physical location, document, or service
     * relationship. Issuing agency: GS1, a global organization.
     */
    case GS_IDEN_KEYS = '0209';

    /**
     * GTE/OSI Network (0126)
     *
     * Issuing agency: GTE, Industry Standards, USA.
     */
    case GTEO_NETW = '0126';

    /**
     * GTIN - Global Trade Item Number (0160)
     *
     * The GTIN is a globally unique identifier of trade items. A trade item is
     * any item (product or service) upon which there is a need to retrieve
     * pre-defined information and that may be priced, ordered or invoiced at any
     * point in any supply chain. The GTIN identification scheme is currently
     * (2002) used by more than 900,000 organizations in the world. It is widely
     * in the consumer goods and other industries to identify items and packages.
     * The GTIN can be represented in a standard bar code format. Issuing agency:
     * EAN Inernational.
     */
    case GTIN_GLOB_TRAD_ITEM_NUMB = '0160';

    /**
     * HEAG (0102)
     *
     * Issuing agency: Hessische Elektrizitats-AG, Germany.
     */
    case HEAG = '0102';

    /**
     * Henkel Corporate Network (H-Net) (0125)
     *
     * Issuing agency: Henkel KgaA, Germany.
     */
    case HENK_CORP_NETW_HNET = '0125';

    /**
     * Hewlett - Packard Company Internal AM Network (0095)
     *
     * Issuing agency: Hewlett - Packard Company, USA.
     */
    case HEWL_PACK_COMP_INTE_AM_NETW = '0095';

    /**
     * HydroNETT (0043)
     *
     * Notes on Use of Code: The ICD code forms the initial part of the OSI
     * network addressing as depicted in ISO 8348/AD2. Issuing agency: Norsk Hydro
     * a.s., Norway.
     */
    case HYDRONETT = '0043';

    /**
     * ICD Formatted ATM address (0073)
     *
     * Notes on Use of Code: Used as an ATM address prefix by, 1) Newbridge ATM
     * terminal equipment: a) when performing user - network address registration,
     * b) transparently initiating signalled ATM connections on behalf of other
     * non-ATM (LAN) devices, c) directly initiating signalled ATM connections, 2)
     * Newbridge ATM switching equipment used to: a) perform network - user
     * address registration, b) perform routing of Switched Virtual Connections
     * across a private ATM cell switching network. Issuing agency: Newbridge
     * Networks Corporation, CANADA.
     */
    case ICD_FORM_ATM_ADDR = '0073';

    /**
     * Icelandic identifier - Íslensk kennitala (0196)
     *
     * Intended Purpose/App. Area: Identification of Icelandic individuals and
     * legal entities. Issuing agency: For individual, Icelandic National
     * Registry, www.skra.is. For legal entities, Directorate of Internal Revenue,
     * www.rsk.is in Iceland.
     */
    case ICEL_IDEN_SLEN_KENN = '0196';

    /**
     * ICI Company Identification System (0045)
     *
     * Notes on Use of Code: The ICD code will be used to manage NSAP allocation
     * for all ICI companies on a worldwide basis. The organisation code is used
     * Worldwide by ICI application systems to identify ICI registered companies
     * in machine to machine communications. Issuing agency: ICI PLC, UK.
     */
    case ICI_COMP_IDEN_SYST = '0045';

    /**
     * Identification number of economic subject (ICO) Act on State Statistics of
     * 29 November 2001, § 27 (0158)
     *
     * The unique identification of economic subjects (legal persons and natural
     * persons-entrepreneurs) used for registration The identification number ICO
     * is used in Slovakia in almost all administrative acts (tax system, banking
     * system, statistics, etc.) Issuing agency: Slovak Statistical Office, Slovak
     * Republic.
     */
    case IDEN_NUMB_OF_ECON_SUBJ_ICO_ACT_ON_STAT_STAT_OF__NOVE_1_27 = '0158';

    /**
     * Identification number of economic subjects: (ICO) (0154)
     *
     * Unique identification of economic subjects for all administrative purposes
     * The identification number ICO is used in the Czech Republic mainly in all
     * administrative acts (tax system, banking system, statistics. etc.) Issuing
     * agency: Czech Statistical Office, Czech Republic.
     */
    case IDEN_NUMB_OF_ECON_SUBJ_ICO = '0154';

    /**
     * IK (XR03)
     *
     * eindeutiges Kennzeichen fuer einen Leistungserbringer nach Paragraph 293
     * SGB V
     */
    case IK = 'XR03';

    /**
     * Indirizzo di Posta Elettronica Certificata (0202)
     *
     * Intended Purpose/App. Area: Used to identify senders and receivers of
     * certified electronic mail as defined by Italian law. Issuing agency:
     * Agenzia per l’Italia digitale in Italy.
     */
    case INDI_DI_POST_ELET_CERT = '0202';

    /**
     * Infonet Services Corporation (0134)
     *
     * Issuing agency: Infonet NV/SA, Belgium.
     */
    case INFO_SERV_CORP = '0134';

    /**
     * Intel Corporation OSI (0068)
     *
     * Notes on Use of Code: The ICD code will be used to form the Initial Domain
     * Identifier (IDI) portion of the Initial Domain Part (IDP) as described in
     * ISO 8348 Addendum 2 for OSI NSAP addressing. Issuing agency: Intel
     * Corporation, USA.
     */
    case INTE_CORP_OSI = '0068';

    /**
     * International Code Designator for the Identification of OSI-based, Amateur
     * Radio Organizations, Network Objects and Application Services. (0011)
     *
     * Notes on Use of Code: Specific object and attribute naming conventions are
     * currently being defined. Issuing agency: The Radio Amateur
     * Telecommunications Society, USA.
     */
    case INTE_CODE_DESI_FOR_THE_IDEN_OF_OSIB_AMAT_RADI_ORGA_NETW_OBJE_AND_APPL_SERV = '0011';

    /**
     * International NSAP (0081)
     *
     * Issuing agency: Federal Office for Communications, Switzerland.
     */
    case INTE_NSAP = '0081';

    /**
     * International Standard ISO 6523 (0028)
     *
     * Issuing agency: Styria Federn GmbH, AUSTRIA.
     */
    case INTE_STAN_ISO = '0028';

    /**
     * Internet IP addressing - ISO 6523 ICD encoding (0090)
     *
     * Issuing agency: Internet Assigned Numbers Authority, USA.
     */
    case INTE_IP_ADDR_ISO__ICD_ENCO = '0090';

    /**
     * IOTA Identifiers for Organizations for Telecommunications Addressing using
     * the ICD system format defined in ISO/IEC 8348 (0124)
     *
     * Issuing agency: DISC, British Standards Institution, UK.
     */
    case IOTA_IDEN_FOR_ORGA_FOR_TELE_ADDR_USIN_THE_ICD_SYST_FORM_DEFI_IN_ISOI = '0124';

    /**
     * ISO 6523 - ICD (0035)
     *
     * Notes on Use of Code: This code will be used internationally by BP thus a
     * non-geographic code is requested. Issuing agency: The British Petroleum Co
     * Plc, UK.
     */
    case ISO__ICD = '0035';

    /**
     * ISO register for Standards producing Organizations (0112)
     *
     * Issuing agency: International Organization for Standardization (ISO),
     * SWITZERLAND.
     */
    case ISO_REGI_FOR_STAN_PROD_ORGA = '0112';

    /**
     * ISO6523 - ICDPCR (0054)
     *
     * Notes on Use of Code: This code could be used internationally by Pfizer
     * thus a non-geographic code is required. The code forms the initial part of
     * the OSI network addressing and naming tree depicted in Addendum 2 of ISO
     * 8348. Issuing agency: Pfizer Central Research, UK.
     */
    case ISO_ICDP = '0054';

    /**
     * ITU (International Telecommunications Union)Data Network Identification
     * Codes (DNIC) (0148)
     *
     * Data Network Identification Codes assigned by the ITU. Issuing agency: ITU
     * (International Telecommunications Union), Switzerland.
     */
    case ITU_INTE_TELE_UNIO_NETW_IDEN_CODE_DNIC = '0148';

    /**
     * KOIOS Open Technical Dictionary (0194)
     *
     * Intended Purpose/App. Area: The KOIOS OTD is a collection of terminology
     * defined by and obtained from consensus bodies such as ISO, IEC, and other
     * groups that have a consensus process for developing terminology. The KOIOS
     * OTD contains terms, definitions, and images of concepts used to describe
     * individuals, organizations, locations, goods and services. The KOIOS OTD
     * conforms to ISO 22745 (all parts) and is designed to enable the exchange of
     * characteristic data in all stages of the life-cycle of an item, and to
     * ensure that the resulting specifications conform to ISO 8000-110. Issuing
     * agency: KOIOS Master Data Limited in UK.
     */
    case KOIO_OPEN_TECH_DICT = '0194';

    /**
     * KPN OVN (0062)
     *
     * Notes on Use of Code: This code is used in the VTOA network of KPN OVN.
     * Issuing agency: Koninklijke KPN, The Netherlands.
     */
    case KPN_OVN = '0062';

    /**
     * LE NUMERO NATIONAL (0008)
     *
     * Issuing agency: Ministere De L'interieur et de la Fonction Publique,
     * Belgium.
     */
    case LE_NUME_NATI = '0008';

    /**
     * Legal entity code (Lithuania) (0200)
     *
     * Intended Purpose/App. Area: For use in EDI (electronic data interchange)
     * for C2B and others exchanges to identify legal entities. Issuing agency:
     * State Enterprise Centre of Registers in Lithuania.
     */
    case LEGA_ENTI_CODE_LITH = '0200';

    /**
     * Legal Entity Identifier (LEI) (0199)
     *
     * Intended Purpose/App. Area: The LEI is the global, open identifier
     * established at the urging of the Financial Stability Board and the
     * recommendation of the G20. The LEI is established as the ISO 17442
     * standard, is governed by the LEI Regulatory Oversight Committee (LEI-ROC)
     * and has been implemented by the Global Legal Entity Identifier Foundation
     * (GLEIF). The LEI code connects to key reference information that enables
     * clear and unique identification of legal entities participating in
     * financial transactions. Each LEI contains information about an entity's
     * ownership structure and thus answers the questions of 'who is who' and 'who
     * owns whom'. Simply put, the publicly available LEI data pool can be
     * regarded as a global directory, which greatly enhances transparency in the
     * global marketplace. Already applied very broadly within financial
     * regulation and rapidly being adopted for KYC and a number of other purposes
     * in financial markets, the LEI is set to spread into a range of other
     * fields, including trade facilitation, business reporting and supply chain
     * management. Issuing agency: GLEIF, a global organization.
     */
    case LEGA_ENTI_IDEN_LEI = '0199';

    /**
     * LEGO /OSI NETWORK (0071)
     *
     * Notes on Use of Code: The ICD code will also form the Initial Domain Part
     * of the OSI network addressing and naming tree as specified in addendum 2 to
     * ISO 8348. Issuing agency: LEGO Systems Inc, USA.
     */
    case LEGO_OSI_NETW = '0071';

    /**
     * Leitweg-ID (0204)
     *
     * Intended Purpose/App. Area: Identification of Public Authorities. Issuing
     * agency: Koordinierungsstelle fuer IT-Standards (KoSIT) in Germany.
     */
    case LEITWEGID = '0204';

    /**
     * Lithuanian military PKI (0180)
     *
     * dex of the Certification Policies and Certification Practices Statements
     * issued by Lithuanian military PKI The code is used to uniquely identify
     * Certification Policies and Certification Practice Statements in Lithuanian
     * military PKI Issuing agency: The Ministry of National Defence of the
     * Republic of Lithuania, Lithuania.
     */
    case LITH_MILI_PKI = '0180';

    /**
     * Luxembourg CP & CPS (Certification Policy and Certification Practice
     * Statement) Index (0171)
     *
     * Index of the Certification Policies and Certification Practice Statement
     * issued by Luxembourg PKI Issuing agency: Ministry of The Economy and
     * Foreign Trade, Luxembourg.
     */
    case LUXE_CP_CPS_CERT_POLI_AND_CERT_PRAC_STAT_INDE = '0171';

    /**
     * LY-tunnus (0037)
     *
     * Notes on Use of Code: It is possible to add 0-4 characters set to the code
     * for more detailed use ofone organization. Characters are digits or capital
     * letter. Issuing agency: National Board of Taxes, FINLAND.
     */
    case LYTUNNUS = '0037';

    /**
     * Madge Networks Ltd- ICD ATM Addressing Scheme (0150)
     *
     * The code will be used as part of an ATM NSAP addressing scheme for the
     * establishment of PVC and SPVC connections Addressing for Madge Networks
     * global ATM network and the connections of any Madge Customers requiring the
     * allocation of ATM addresses from Madge Networks. Issuing agency: Madge
     * Networks, UK.
     */
    case MADG_NETW_LTD_ICD_ATM_ADDR_SCHE = '0150';

    /**
     * MCI / OSI Network (0119)
     *
     * Issuing agency: MCI Telecommunications Corporation, Technical Standards
     * Management, USA.
     */
    case MCI_OSI_NETW = '0119';

    /**
     * Migros_Network M_NETOPZ (0053)
     *
     * Issuing agency: Migros-Genossenschafts-Bund, Switzerland.
     */
    case MIGR_MNET = '0053';

    /**
     * Mitel terminal or switching equipment (0078)
     *
     * Notes on Use of Code: The ICD code will form the initial part of the naming
     * tree for: 1 - Private Integrated Services Network manufacturer-specific
     * information as the Organization identifier forming the initial part of the
     * OBJECT IDENTIFIER tree. 2 - OSI Application Layer such as CSTA (ECMA 179).
     * Issuing agency: Mitel Corporation, Canada.
     */
    case MITE_TERM_OR_SWIT_EQUI = '0078';

    /**
     * National Federation of Chambers of Commerce & Industry of Belgium, Scheme
     * (EDIRA compliant) (0087)
     *
     * Issuing agency: National Federartion of Chambers of Commerce & Industry of,
     * Belgium, Belgium.
     */
    case NATI_FEDE_OF_CHAM_OF_COMM_INDU_OF_BELG_SCHE_EDIR_COMP = '0087';

    /**
     * NATO Commercial and Government Entity system (0141)
     *
     * To identify all Commercial and Governmental entities that provide material
     * and/or services to the Armed Forces of the NATO nations and several
     * non-NATO nations (Sponsored) around the world. This information is used by
     * NATO and Sponsored nations' Logisticians to identify Commercial and
     * Government Entities they deal with. This Information is used by all
     * functions of Logistics support such as Acquisition, Sourcing, EDI,
     * Re-Provisioning, Material Management, etc. Determination of the real source
     * for an item of supply is one of the most important prerequisites for proper
     * application of the Uniform System of Item Identification within NATO. It is
     * the source where documentation will be obtained from and its location
     * normally gives advice for codification responsibility. Within the NATO
     * Codification System the term Manufacturer covers the whole range of
     * possible sources of technical data for items entering the supply chains or
     * participating, countries. The primary use of manufacturers coding is in ADP
     * operations related to support management programs such as material
     * management codification, standardization, etc. Issuing agency: NATO Group
     * of National Director on Codification (AC/135), Luxembourg.
     */
    case NATO_COMM_AND_GOVE_ENTI_SYST = '0141';

    /**
     * NATO ISO 6523 ICDE coding scheme (0026)
     *
     * Notes on Use of Code: The ICD code forms the initial part of the OSI
     * network addressing and naming tree depicted in Addendum 2 of ISO 8348.
     * Issuing agency: North Atlantic Treaty Organisation (NATO), Belgium.
     */
    case NATO_ISO__ICDE_CODI_SCHE = '0026';

    /**
     * NAVISTAR/OSI Network (0072)
     *
     * Notes on Use of Code: The ICD code will also form the Initial Domain Part
     * of the OSI Network addressing and naming tree as specified in Addendum 2 to
     * ISO 8348. Issuing agency: International Truck & Engine Corp, USA.
     */
    case NAVI_NETW = '0072';

    /**
     * NBS/OSI NETWORK (0004)
     *
     * Notes on Use of Code: The ICD code forms the initial part of the OSI
     * network addressing and naming tree as depicted in Addendum 2 to ISO 8348.
     * Issuing agency: National Bureau of Standards, USA.
     */
    case NBSO_NETW = '0004';

    /**
     * Net service ID (0215)
     *
     * Net service ID
     */
    case NET_SERV_ID = '0215';

    /**
     * NIST/OSI Implememts' Workshop (0014)
     *
     * Notes on Use of Code: The ICD code forms the initial part of the Workshop
     * naming and addressing tree. Issuing agency: United States Department of
     * Commerce, National Institute of Standards and Technology, Gaithersburg,
     * USA.
     */
    case NIST_IMPL_WORK = '0014';

    /**
     * Nokia Object Identifiers (NOI) (0056)
     *
     * Notes on Use of Code: a) In the SIO the organization name will normally be
     * omitted, b) The code is primarily intended for the registration of Object
     * Identifiers according to ISO/IEC 8824: Level 1:iso(1), Level
     * 2:identified-organization(3), Level 3:nokia(xxxx), Level 4 and
     * higher:defined by Nokia conventions Issuing agency: Nokia Corporation,
     * FINLAND.
     */
    case NOKI_OBJE_IDEN_NOI = '0056';

    /**
     * Nordic University and Research Network: NORDUnet (0023)
     *
     * Notes on Use of Code: The ICD code forms the initial part of the OSI
     * network addressing and tree as depicted in Addendum 2 of ISO 8348. Issuing
     * agency: NORDUnet, c/o SICS, Sweden.
     */
    case NORD_UNIV_AND_RESE_NETW_NORD = '0023';

    /**
     * Norwegian Telecommunications Authority's, NTA'S, EDI, identifier scheme
     * (EDIRA compliant) (0082)
     *
     * Notes on Use of Code: For use in EDIFACT messages in accordance with
     * current national recommendation on identification of EDI objects. (EDIRA
     * compliant). Issuing agency: Norwegian Telecommunications Authority, NORWAY.
     */
    case NORW_TELE_AUTH_NTAS_EDI_IDEN_SCHE_EDIR_COMP = '0082';

    /**
     * Numero d'entreprise / ondernemingsnummer / Unternehmensnummer (0208)
     *
     * Intended Purpose/App. Area: Identification number attributed by the
     * BCE/KBO/ZDU (the Belgian register) to identify entities and establishment
     * units operating in Belgium. Issuing agency: Banque-Carrefour des
     * Entreprises (BCE) / Kruispuntbank van Ondernemingen (KBO) / Zentrale
     * Datenbank der Unternehmen (ZOU) Service public fédéral Economie, P.M.E.in
     * Belgium.Classes moyennes et Energie
     */
    case NUME_DENT_ONDE_UNTE = '0208';

    /**
     * Numéro d'identification suisse des enterprises (IDE), Swiss Unique
     * Business Identification Number (UIDB) (0183)
     *
     * Intended Purpose/App. Area: To uniquely identify all
     * companies/organizations registered in Switzerland in all official register
     * (Swiss Register of Commerce, VAT register, Canton register, etc) The UIDB
     * shall make lt possible to identify an enterprise quickly, unambiguously and
     * on a permanent basis. The UIDB and the other identification characteristics
     * associated with it shall be managed via a specific UIDB register. The main
     * identification characteristics (status, address, etc.) shall be accessible
     * to the public. Issuing agency: Swiss Federal Statistical Office (FSO),
     * Switzerland).
     */
    case NUMR_DIDE_SUIS_DES_ENTE_IDE_SWIS_UNIQ_BUSI_IDEN_NUMB_UIDB = '0183';

    /**
     * Object Identifiers (0111)
     *
     * Issuing agency: Institute of Electrical and Electronics Engineers, USA.
     */
    case OBJE_IDEN = '0111';

    /**
     * Odette International Limited (0177)
     *
     * For use in EDI and other B2B exchanges in the European automotive industry
     * to identify business entities (organisations). The scheme is used to
     * identify organisations, and parts of organisations which are parties to or
     * are referenced in automotive supply chain transactions such as EDI
     * messaging and other B2B exchanges. Issuing agency: Odette International
     * Limited, UK.
     */
    case ODET_INTE_LIMI = '0177';

    /**
     * Organisasjonsnummer (0192)
     *
     * Intended Purpose/App. Area: Identify entities registered in the Central
     * Coordinating Register for Legal Entities in Norway. The scheme with ICD
     * code + organization number will be used to identify organisations that are
     * parties to or referenced in electronic transactions such as electronic
     * invoicing or other B2B exchanges. Issuing agency: The Brønnøysund
     * Register Centre in Norway.
     */
    case ORGANISASJONSNUMMER = '0192';

    /**
     * Organisatie Indentificatie Nummer (OIN) (0190)
     *
     * Intended Purpose/App. Area: The OIN is part of the Dutch standard
     * ‘Digikoppeling’ and is used for identifying the organisations that take
     * part in electronic message exchange with the Dutch Government. The OIN must
     * also be included in the PKIo certificate. Issuing agency: Logius in the
     * Netherlands.
     */
    case ORGA_INDE_NUMM_OIN = '0190';

    /**
     * Organisationsnummer (0007)
     *
     * Notes on Use of Code: The third digit in the organisation number is never
     * lower than 2 in order to avoid it being confused with personal numbers.
     * Issuing agency: The National Tax Board, SWEDEN.
     */
    case ORGANISATIONSNUMMER = '0007';

    /**
     * Organizational Identifiers for Structured Names under ISO 9541 Part 2 (0010)
     *
     * Notes on Use of Code: The organizational codes established under this
     * coding systems constitute the registered organizational identifiers
     * recognised under ISO 9541-2. That standard effectively establishes
     * agreements under which, as allowed by clauses 5.1 and 5.3 of ISO 6523, both
     * the ICD and the organization name are generally omitted, from the SIO, and
     * thus only the organization code portion of the SIO is interchanged. Issuing
     * agency: Association for Font Information Interchange, USA.
     */
    case ORGA_IDEN_FOR_STRU_NAME_UNDE_ISO__PART = '0010';

    /**
     * OriginNet (0113)
     *
     * Issuing agency: Origin BV, The Netherlands.
     */
    case ORIGINNET = '0113';

    /**
     * OSF Distributed Computing Object Identification (0022)
     *
     * Notes on Use of Code: OSF provides public domain software in OS, ISO
     * networking and management. The initial use of the coding system are for
     * identifying the following objects in OSF's distributed computing
     * environment: the attributes of entries in the distributed directory, the
     * object class of each entry in the directory, the type of name components
     * (RDNs), the communication protocol profiles, the interfaces offered by.
     * Issuing agency: Open Software Foundation, USA.
     */
    case OSF_DIST_COMP_OBJE_IDEN = '0022';

    /**
     * OSI ASIA-OCEANIA WORKSHOP (0025)
     *
     * Notes on Use of Code: The code is used as an element of object identifiers
     * which need to be assigned relating the ISPs (International Standardized
     * Profiles) that AOW is working on. Issuing agency: OSI ASIA-OCEANIA
     * WORKSHOP, JAPAN.
     */
    case OSI_ASIA_WORK = '0025';

    /**
     * OSINZ (0048)
     *
     * Notes on Use of Code: ISO 6523 ICD IDI format with binary syntax will be
     * used. Issuing agency: OSINZ, New Zealand.
     */
    case OSINZ = '0048';

    /**
     * OVTcode (0216)
     *
     * OVTcode
     */
    case OVTCODE = '0216';

    /**
     * Pacific Bell Data Communications Network (0115)
     *
     * Issuing agency: Pacific Bell, USA.
     */
    case PACI_BELL_DATA_COMM_NETW = '0115';

    /**
     * Paradine GmbH (0176)
     *
     * To uniquely identify properties, classes,and list of properties (LoP) for
     * products and services available in Paradine Reference Dictionary Systems
     * The code is used to uniquely identify objects in Paradine Reference
     * Dictionary Systems. Issuing agency: Paradine GmbH, Austria.
     */
    case PARA_GMBH = '0176';

    /**
     * PARTITA IVA (0211)
     *
     * Intended Purpose/App. Area: Electronic Invoicing and e-procurement. Issuing
     * agency: Agenzia delle Entrate, Italy.
     */
    case PART_IVA = '0211';

    /**
     * Penango Object Identifiers (0179)
     *
     * To identify objects, policies, and data related to Penango’s products and
     * services. The ICD is primarily intended for registration of Object
     * Identifiers in accordance with ISO/IEC 8824 (ASN.1). Issuing agency:
     * Penango, Inc., Canada.
     */
    case PENA_OBJE_IDEN = '0179';

    /**
     * Perceval Object Code (0185)
     *
     * Intended Purpose/App. Area: Intended to uniquely identify in an
     * international context any physical and or abstract entities related to
     * Perceval products and services using Abstract Syntax Notation One in
     * accordance with ISO/IEC 8824 The ICD is primarily intended for registration
     * and resolution of Object Identifiers in accordance with ISO/IEC 8824 with
     * reduced encoding size and non-geographic context Issuing agency: Perceval
     * SA, Tenbosch, Belgium.
     */
    case PERC_OBJE_CODE = '0185';

    /**
     * PiLog Ontology Codification Identifier (POCI) (0207)
     *
     * Intended Purpose/App. Area: A repository of concepts pertaining to any
     * entity such as products, services, business partners, assets,
     * organizations, locations, persons, addresses, languages, records etc along
     * with the terminologies to describe each entity using class,
     * characteristics, values, JoMs, QoMs, groups, definitions, guidelines,
     * images, drawings, pictures. codes and any classification thereof. The
     * codification will help exchange/integrate the data between operational,
     * ERP, CRM, SRM or any other systems without any human interpretation and
     * interaction without losing the meaning of the information in multiple
     * languages, this will help organizations achieve their digital
     * transformation goals more precisely in order to assess the real
     * value-proposition of the underlying data that is driving their businesses.
     * Issuing agency: PiLog Group in South Africa.
     */
    case PILO_ONTO_CODI_IDEN_POCI = '0207';

    /**
     * PNG_ICD Scheme (0100)
     *
     * Issuing agency: GPT Limited, UK.
     */
    case PNGI_SCHE = '0100';

    /**
     * Portuguese Chamber of Commerce and Industry Scheme (EDIRA compliant) (0105)
     *
     * Issuing agency: Portuguese Chamber of Commerce and Industry, Portugal.
     */
    case PORT_CHAM_OF_COMM_AND_INDU_SCHE_EDIR_COMP = '0105';

    /**
     * Priority Telecom ATM End System Address Plan (0167)
     *
     * The coding system will be used to provide ATM End System Address based on
     * IDC format NSAP addresses required for Priority Telecom ATM PNNI
     * implementation. These addresses will be used to uniquely identify User
     * Network interfaces to Priority Telecom ATM Networks as specified by the ATM
     * Forum UNI specifications. PT plans to use these addresses to connect to
     * other public ATM networks in the countries PT is operating (The
     * Netherlands, Norway and Austria) Used to form a globally unique Priority
     * Telecom ATM End System Address. PT customers and interconnect with public
     * ATM networks requires the use of unique AESA Issuing agency: Priority
     * Telecom Netherlands, The Netherlands.
     */
    case PRIO_TELE_ATM_END_SYST_ADDR_PLAN = '0167';

    /**
     * Project Group “Lists of Properties” (PROLIST®) (0172)
     *
     * To uniquely identify properties, blocks and lists of properties (LOP) for
     * products and services in the process industry. The products are electrical
     * and process control devices. The code is used to uniquely identify the
     * objects in the PROLIST online dictionary. Issuing agency: Project Group
     * “Lists of Properties” (PROLIST®) c/o Bayer Technology Services GmbH
     * Geb., Germany.
     */
    case PROJ_GROU_LIST_OF_PROP_PROL = '0172';

    /**
     * PSS Object Identifiers (0116)
     *
     * Issuing agency: PSS (Postal Security Services), FINLAND.
     */
    case PSS_OBJE_IDEN = '0116';

    /**
     * Registre du Commerce et de l’Industrie : RCI (0206)
     *
     * Intended Purpose/App. Area: To provide identifiers for organizations at
     * national level in Monaco. Issuing agency: Agence Monégasque de Sécurité
     * Numérique (AMSN) in Monaco.
     */
    case REGI_DU_COMM_ET_DE_LIND_RCI = '0206';

    /**
     * Reuter Open Address Standard (0034)
     *
     * Notes on Use of Code: To be used in the formation of OSI Network Service
     * Access Point (NSAP) addresses. Issuing agency: Reuters Ltd, UK.
     */
    case REUT_OPEN_ADDR_STAN = '0034';

    /**
     * Revenue Canada Business Number Registration (EDIRA compliant) (0093)
     *
     * Issuing agency: Revenue Canada, CANADA.
     */
    case REVE_CANA_BUSI_NUMB_REGI_EDIR_COMP = '0093';

    /**
     * Roche Corporate Network (0066)
     *
     * Notes on Use of Code: Will be used internationaly by Roche thus a
     * non-geographic code is required. Issuing agency: F. HOFFMANN - LA ROCHE AG,
     * Switzerland.
     */
    case ROCH_CORP_NETW = '0066';

    /**
     * Route1 MobiNET (0178)
     *
     * For rooting OIDs defined by Route1 Security Corporation for Route1 MobiNET.
     * Intended to cover MobiNET connected organizations, Route1 Security
     * Corporation, its subdivisions, customers and any organization using MobiNET
     * or Route1's services and products For rooting OIDs defined by Route1
     * Security Corporation for Route1 MobiNET. Intended to cover MobiNET
     * connected organizations, Route1 Security Corporation, its subdivisions,
     * customers and any organization using MobiNET or Route1's services and
     * products. The OID structure and the inclusion therein of the ICS is as
     * follows: ISO.Identifiedorganization.ICD(Route1
     * MobiNET).AFI.PCI.Org_ID.OPI.MC Issuing agency: Route1 Security
     * Corporation,Canada.
     */
    case ROUT_MOBI = '0178';

    /**
     * S G W OSI Internetwork (0033)
     *
     * Notes on Use of Code: Exclusive use by S G W .Issuing agency: S G Warburg
     * Group Management Ltd, UK.
     */
    case S_G_W_OSI_INTE = '0033';

    /**
     * Saint Gobain (0057)
     *
     * Notes on Use of Code: To be used for assignment of: N.E.T (ISO 8348/Add 2),
     * A.E.T (FTAM, X.400 Psaps, and so on), and object identification (ISO
     * 8824/8825) Issuing agency: Saint Gobain, France.
     */
    case SAIN_GOBA = '0057';

    /**
     * Savvis Communications AESA:. (0139)
     *
     * Global Addressing of Savvis ATM Switches and any direct customer ATM
     * networks for implementation of PNNI Used to form a globally unique Savvis
     * ICD ATM End System Address. Issuing agency: Savvis Communications,USA.
     */
    case SAVV_COMM_AESA = '0139';

    /**
     * SECETI Object Identifiers (0142)
     *
     * The function as the 'Application Centre' for the Italian National Interbank
     * Network, having been authorized by the Bank of Italy, and the Italian
     * Banking Association to operate in that capacity. The scheme is intended for
     * the registration of object identifiers according to ISO 8824 and ISO 8825
     * The code is primarily intended for the registration of Object Identifiers
     * according to ISO 8824/8825, Level 1: ISO (), Level 2: identified
     * -organization (), Level 3: SECETI S.p.A. (), Level 4: and higher: (defined
     * by SECETI conventions).Issuing agency: Servizi Centralizzati SECETI S.p.A.,
     * ITALY.
     */
    case SECE_OBJE_IDEN = '0142';

    /**
     * SIA Object Identifiers (0135)
     *
     * Issuing agency: SIA-Società Interbancaria per l'Automazione S.p.A.,
     * ITALIA.
     */
    case SIA_OBJE_IDEN = '0135';

    /**
     * Siemens AG (0175)
     *
     * To uniquely identify properties, blocks, classes and lists of properties
     * used or specified by Siemens AG - Power Generation The code is used to
     * uniquely identify objects in the Siemens AG - Power Generation corporate
     * dictionary Issuing agency: Siemens AG, Germany.
     */
    case SIEM_AG = '0175';

    /**
     * Siemens Corporate Network (0058)
     *
     * Notes on Use of Code: The ICD code will form the initial part of the OSI
     * Network addressing and naming tree as depicted in Addendum 2 to ISO 8348
     * (Network layer addressing). These addresses will uniquely identify systems
     * within SCN and to the outside world. Issuing agency: Siemens AG, Germany.
     */
    case SIEM_CORP_NETW = '0058';

    /**
     * Siemens Supervisory Systems Network (0099)
     *
     * Issuing agency: Siemens AG, Germany.
     */
    case SIEM_SUPE_SYST_NETW = '0099';

    /**
     * Singapore Nationwide E-lnvoice Framework (0195)
     *
     * Intended Purpose/App. Area: For use in electronic messages in accordance to
     * the Singapore nationwide e-invoice framework on Identification of
     * organization. Issuing agency: Infocomm Media Development Authority in
     * Singapore.
     */
    case SING_NATI_ELNV_FRAM = '0195';

    /**
     * SIRET-CODE (0009)
     *
     * Issuing agency: DU PONT DE NEMOURS (FRANCE) S.A. France.
     */
    case SIRETCODE = '0009';

    /**
     * Sistema Italiano di Identificazione di ogetti gestito da UNINFO (0076)
     *
     * Notes on Use of Code: To be used for assignments of object identifiers
     * according to ISO 8824 and ISO 8825. Issuing agency: UNINFO, ITALY.
     */
    case SIST_ITAL_DI_IDEN_DI_OGET_GEST_DA_UNIN = '0076';

    /**
     * Sistema Italiano di Indirizzamento di Reti OSI Gestito da UNINFO (0077)
     *
     * Notes on Use of Code: The ICD code forms the initial part of the OSI
     * network Addressing and naming tree depicted in Addendum 2 of ISO 8348.
     * Issuing agency: UNINFO, ITALY.
     */
    case SIST_ITAL_DI_INDI_DI_RETI_OSI_GEST_DA_UNIN = '0077';

    /**
     * SITA Object Identifier Tree (0069)
     *
     * Notes on Use of Code: SITA intends to use its OID Tree to define its own
     * Objects for use with its OSI-based services (e.g. MHS & OSI Management).
     * Issuing agency: SITA, France.
     */
    case SITA_OBJE_IDEN_TREE = '0069';

    /**
     * SNA/OSI Network (0018)
     *
     * Notes on Use of Code: The ICD code will also form the initial part of the
     * OSI Network addressing and naming tree as depicted in Addendum 2 to ISO
     * 8348. Issuing agency: International Business Machines Corporation, USA.
     */
    case SNAO_NETW = '0018';

    /**
     * SOCIETY FOR WORLDWIDE INTERBANK FINANCIAL, TELECOMMUNICATION S.W.I.F.T. (0021)
     *
     * Notes on Use of Code: To be used for assignment of object identifiers (ISO
     * 8824/8825) Issuing agency: SOCIETY FOR WORLDWIDE INTERBANK FINANCIAL,
     * TELECOMMUNICATION S.W.I.F.T. BELGIUM.
     */
    case SOCI_FOR_WORL_INTE_FINA_TELE_SWIF = '0021';

    /**
     * Society of Motion Picture and Television Engineers (SMPTE) (0052)
     *
     * Notes on Use of Code: The ICD code will also be used to identify SMPTE
     * constituent organizations (committees, working groups, task forces, etc./),
     * and the objects they, define. The ICD code will also form the Initial
     * Domain Part of the OSI network addressing and naming tree as specified in
     * Addendum 2 tot ISO 8348 Issuing agency: Society of Motion Picture and
     * Television Engineers (SMPTE), USA.
     */
    case SOCI_OF_MOTI_PICT_AND_TELE_ENGI_SMPT = '0052';

    /**
     * SOFFEX OSI (0061)
     *
     * Notes on Use of Code: This code is to assist in uniquely identifying data
     * network node addresses in an international supporting network for financial
     * applications. This supporting network may have operational interfaces to
     * other (private) data networks. Issuing agency: SOFFEX Swiss Options and
     * Financial Futures Exchange AG. Switzerland.
     */
    case SOFF_OSI = '0061';

    /**
     * SOLVAY OSI CODING (0065)
     *
     * Notes on Use of Code: Whenever possible, ISO 8348 addresses using this code
     * will comply with FIPS PUB 146, with an End System ID of exactly 4 octets,
     * so that the DSP can also conform to ECMA 117 where ECMA's subnet-address
     * maps onto FIPS's Subnet ID concatenated with the End System ID. Issuing
     * agency: Direction Centrale Technique (Informatique Scientifique), Belgium.
     */
    case SOLV_OSI_CODI = '0065';

    /**
     * South African Code Allocation (0101)
     *
     * Issuing agency: Thawte Consulting, 33 Protea Way, Durbanville 7550, South
     * Africa
     */
    case SOUT_AFRI_CODE_ALLO = '0101';

    /**
     * Standard Company Code (0147)
     *
     * Partner identification code which is registered with JIPDEC/ECPC. Issuing
     * agency: Japan Information Processing Development Corporation, / Electronic
     * Commerce Promotion Center (JIPDEC/ECPC),Japan.
     */
    case STAN_COMP_CODE = '0147';

    /**
     * STENTOR-ICD CODING SYSTEM (0117)
     *
     * Issuing agency: Stentor Resource Centre Inc., Canada.
     */
    case STEN_CODI_SYST = '0117';

    /**
     * StepNexus (0174)
     *
     * To provide identifiers within StepNexus loader objects. These addresses
     * will be used to uniquely identify StepNexu key usage fields within X509
     * certificates for use in the StepNexus loader scheme. Used to define unique
     * certificate attributes within X509 certificates Issuing agency: StepNexus,
     * UK.
     */
    case STEPNEXUS = '0174';

    /**
     * Swiss Chambers of Commerce Scheme (EDIRA) compliant (0085)
     *
     * Intended Purpose/App. Area Numerical identifiers of organizations. Issuing
     * agency: Zurich Chamber of Commerce on behalf of Swiss Chambers, of
     * Commerce, Switzerland.
     */
    case SWIS_CHAM_OF_COMM_SCHE_EDIR_COMP = '0085';

    /**
     * Swiss Federal Business Identification Number. Central Business names Index
     * (zefix) Identification Number (0169)
     *
     * To uniquely identify all companies/organizations registered in the Swiss
     * Register of Commerce and the Swiss Central Business Names Index To uniquely
     * identify entries in Swiss Central Business Names Index (zefix). The
     * principle purpose of the zefix on internet is to provide a swisswide search
     * function, and thus provide the public with a service to determine the legal
     * domicile, the cantonal office for the register of commerce in charge, and
     * the latter’s address. Issuing agency: Swiss Federal Office of Justice,
     * Switzerland.
     */
    case SWIS_FEDE_BUSI_IDEN_NUMB_CENT_BUSI_NAME_INDE_ZEFI_IDEN_NUMB = '0169';

    /**
     * Swissguide Identifier Scheme (0166)
     *
     * To uniquely identify objects, esp. companies and professionals in
     * directories/databases The code is used to uniquely identify the objects in
     * the Swissguide directory. Issuing agency: Swissguide AG, Switzerland.
     */
    case SWIS_IDEN_SCHE = '0166';

    /**
     * System Information et Repertoire des Entreprise et des Etablissements:
     * SIRENE (0002)
     *
     * Notes on Use of Code: The Sirene number is used in France mainly for the
     * official registration in the Trade Register and as the only number used
     * between authorities and organizations, and between authorities when dealing
     * with data interchange on organizations. Issuing agency: Institut National
     * de la Statistique et des Etudes Economiques, (I.N.S.E.E.), France.
     */
    case SYST_INFO_ET_REPE_DES_ENTR_ET_DES_ETAB_SIRE = '0002';

    /**
     * TC68 OID (0133)
     *
     * Issuing agency: ISO TC68, Banking and Related Financial Services, USA.
     */
    case TC_OID = '0133';

    /**
     * Teikoku Company Code (0170)
     *
     * Teikoku Company Code is allocated to all incorporations, business owners,
     * government organizations and other public offices in Japan. TDB (Teikoku
     * Databank Ltd.) retains company codes of approximately 1.7 million companies
     * within Japan. Teikoku Company Code, a unique company ID, has already been
     * adopted by many companies both as a standard company code in customer data
     * managements and as an identification code for online electronic commerce
     * transactions. Since every company trades with companies abroad, they need
     * to use it in their international business transaction. Therefore, it is
     * desired to register TDB as an ICD to RA of the ISO/IEC 6523. Issuing
     * agency: TEIKOKU DATABANK LTD., JAPAN.
     */
    case TEIK_COMP_CODE = '0170';

    /**
     * Telecom Australia (0032)
     *
     * Notes on Use of Code: The code is used as an element of Object Identifier
     * when defining objects within Telecom Australia. In addition the code shall
     * be used as an element of NSAP addressing. Issuing agency: Australia
     * Telecommunications Corporation, AUSTRALIA.
     */
    case TELE_AUST = '0032';

    /**
     * TeleTrust Object Identifiers (0036)
     *
     * Notes on Use of Code: a) In the SIO the Organization name will normally be
     * omitted. b) The code is primarily intended for the registration of Object
     * Identifiers for security related objects according to ISO/IEC 8824, Level
     * 1: iso(1), Level 2: identified-organization(3), Level 3: teletrust(0036),
     * Level 4 and higher: (defined by TeleTrust conventions) Issuing agency:
     * TeleTrust Deutschland e.V., GERMANY.
     */
    case TELE_OBJE_IDEN = '0036';

    /**
     * TELUS Corporation (0164)
     *
     * SA Addressing Scheme for ATM PNNI Implementation ICD is required for PNNI
     * implementation on TELUS’ ATM network in order to establish an addressing
     * scheme for SPVC connections within and between regions Issuing agency:
     * TELUS Corporation, Canada.
     */
    case TELU_CORP = '0164';

    /**
     * Thai Industrial Standards Institute (TISI) (0044)
     *
     * Notes on Use of Code: The ICD code forms the initial part of international
     * addressing for Thailand. Issuing agency: Thai Industrial Standards
     * Institute (TISI), THAILAND.
     */
    case THAI_INDU_STAN_INST_TISI = '0044';

    /**
     * The All-Union Classifier of Enterprises and Organisations (0029)
     *
     * Issuing agency: General Computing Centre of the State, Committee of the
     * USSR on Statistics, U S S R.
     */
    case THE_ALLU_CLAS_OF_ENTE_AND_ORGA = '0029';

    /**
     * The Association of British Chambers of Commerce Ltd. Scheme, (EDIRA
     * compliant) (0089)
     *
     * Issuing agency: The Association of British Chambers of Commerce Ltd., UK.
     */
    case THE_ASSO_OF_BRIT_CHAM_OF_COMM_LTD_SCHE_EDIR_COMP = '0089';

    /**
     * The Australian GOSIP Network (0038)
     *
     * Notes on Use of Code: As noted above it will be used as the initial
     * identifier of an NSAP codingscheme. Issuing agency: Standards Australia.
     */
    case THE_AUST_GOSI_NETW = '0038';

    /**
     * The OZ DOD OSI Network (0039)
     *
     * The ICD code forms the initial part of the OSI naming and addressing, tree
     * as depicted in ISO 8348/Add 2 standard. Format of the tree is described in
     * the Australian GOSIP Manuals and used globally. Issuing agency: The
     * Australian Department of Defence, AUSTRALIA.
     */
    case THE_OZ_DOD_OSI_NETW = '0039';

    /**
     * Toshiba Organizations, Partners, And Suppliers' (TOPAS) Code (0140)
     *
     * The purpose of this coding system is to identify organizations world-wide
     * that have business or technical transactions with Toshiba Corporation in
     * terms of ISO 13584 Parts Library standard based electronic catalogue
     * interchange service. The interchange is not limited to those between a
     * member organization and Toshiba Corporation. Interchanges between member
     * organizations based on the organization identifier of this coding system
     * are also in scope. Reference to this organization identification code in
     * other business transactions is also allowed Reference to this organization
     * identifier in other business transactions is also possible provided the
     * organizations concerned are registered as members of the. Issuing agency:
     * Toshiba Corporation, Japan.
     */
    case TOSH_ORGA_PART_AND_SUPP_TOPA_CODE = '0140';

    /**
     * Tradeplace TradePI Standard (0214)
     *
     * Tradeplace TradePI Standard
     */
    case TRAD_TRAD_STAN = '0214';

    /**
     * TrustPoint Object Identifiers (0186)
     *
     * Intended Purpose/App. Area: To uniquely identify objects and mechanisms
     * globally throughout communications networks using TrustPoint security
     * products and services Issuing agency: TrustPoint Innovation Technologies,
     * Attn: Sherry Shannon-Vanstone, 816 Hideaway Circle East, Unit 244 Marco
     * Island, FL 34145 USA http://www.trustpointinnovation.com Tel: +1 905 302
     * 6929 Email: sviconsulting@aol.com
     */
    case TRUS_OBJE_IDEN = '0186';

    /**
     * UBL.BE Party Identifier (0193)
     *
     * Intended Purpose/App. Area: Identification and addressing of different
     * parties involved in invoicing. Issuing agency: UBL.BE in Belgium.
     */
    case UBLB_PART_IDEN = '0193';

    /**
     * UK National Health Service Scheme, (EDIRA compliant) (0080)
     *
     * Notes on Use of Code: EDIRA recommendations for coding in EDIFACT and other
     * EDI systems. Issuing agency: National Health Service, UK.
     */
    case UK_NATI_HEAL_SERV_SCHE_EDIR_COMP = '0080';

    /**
     * Unilever Group Companies (0040)
     *
     * Notes on Use of Code: To be used in data communications to form part of the
     * Network Address as defined in ISO 8348. The ISO 6523, ICD IDI format with
     * Binary syntax will be used. Issuing agency: Information Technology Group,
     * Unilever Plc, UK.
     */
    case UNIL_GROU_COMP = '0040';

    /**
     * United States Council for International Business (USCIB) Scheme, (EDIRA
     * compliant) (0086)
     *
     * EDIRA recommendations for coding in EDIFACT and other EDI syntaxes. Issuing
     * agency: United States Council for Internationa Business (USCIB), 1212
     * Avenue of the Americas, USA.
     */
    case UNIT_STAT_COUN_FOR_INTE_BUSI_USCI_SCHE_EDIR_COMP = '0086';

    /**
     * US-EPA Facility Identifier (0163)
     *
     * To provide for the unique identification of facilities regulated or
     * monitored by the United States Environmental Protection Agency (EPA).A
     * facility is a distinct real property entity (i.e., a man-made object and
     * its surrounding real estate). Facilities incorporate the characteristics of
     * being: (1) objects, established at (2) specific places, for (3) specific
     * purposes. A facility can include monitoring stations, waste sites, and
     * other entities of environmental interest that cannot be classified as
     * single facilities. This is maintained within the U.S. Environmental
     * Protection Agency Facility Registration System (FRS). Issuing agency: U.S.
     * Environmental Protection Agency, USA.
     */
    case USEP_FACI_IDEN = '0163';

    /**
     * USA DOD OSI NETWORK (0006)
     *
     * Notes on Use of Code: The ICD code forms the initial part of the OSI
     * network addressing and naming tree as depicted in Addendum 2 to ISO 8348.
     * Issuing agency: Defense Communication Agency, USA.
     */
    case USA_DOD_OSI_NETW = '0006';

    /**
     * USA FED GOV OSI NETWORK (0005)
     *
     * Notes on Use of Code: The ICD code forms the initial part of the OSI
     * network addressing and naming tree as depicted in Addendum 2 to ISO 8348.
     * Issuing agency: National Bureau of Standards, USA.
     */
    case USA_FED_GOV_OSI_NETW = '0005';

    /**
     * UTC: Uniforme Transport Code (0064)
     *
     * Notes on Use of Code: The code identifies an individual transport or
     * handling unit (e.g. pallet, parcel) for reasons of tracing or tracing. The
     * unit may have an international destination. Issuing agency: Foundation UTC,
     * The Netherlands.
     */
    case UTC_UNIF_TRAN_CODE = '0064';

    /**
     * Vereniging van Kamers van Koophandel en Fabrieken in Nederland (Association
     * of Chambers of Commerce and Industry in the Netherlands), Scheme (EDIRA
     * compliant) (0106)
     *
     * Issuing agency: Vereniging van Kamers van Koophandel en Fabrieken in
     * Nederland Watermolenlaan, The Netherlands.
     */
    case VERE_VAN_KAME_VAN_KOOP_EN_FABR_IN_NEDE_ASSO_OF_CHAM_OF_COMM_AND_INDU_IN_THE_NETH_SCHE_EDIR_COMP = '0106';

    /**
     * Vodafone Ireland OSI Addressing (0168)
     *
     * Implementation of an ATM network in connection with 3G rollout. The code
     * will be used for ATM network related addressing purposes, and for CLNS
     * network. Issuing agency: Vodafone Ireland Limited, Ireland.
     */
    case VODA_IREL_OSI_ADDR = '0168';

    /**
     * VSA FTP CODE (FTP = File Transfer Protocol) (0013)
     *
     * Notes on Use of Code: The code serves the addressing between the
     * communicating partners. Issuing agency: Verband der Automobilindustrie
     * e.V., GERMANY.
     */
    case VSA_FTP_CODE_FTP_FILE_TRAN_PROT = '0013';

    /**
     * ZellwegerOSINet (0067)
     *
     * Notes on Use of Code: BAKOM - Switzerland. Issuing agency: Zellweger Uster
     * AG, Switzerland.
     */
    case ZELLWEGEROSINET = '0067';

    /**
     * Returns the caption of the code
     *
     * @return string
     * @codeCoverageIgnore
     */
    final public function getCaption(): string
    {
        return match ($this) {
            InvoiceSuiteCodelistSchemeIdentifiers::ACTA_OBJE_IDEN => 'ACTALIS Object Identifiers',
            InvoiceSuiteCodelistSchemeIdentifiers::ADVA_TELE_MODU_LIMI_CORP_NETW => 'Advanced Telecommunications Modules Limited, Corporate Network',
            InvoiceSuiteCodelistSchemeIdentifiers::ADVANTIS => 'Advantis',
            InvoiceSuiteCodelistSchemeIdentifiers::AERO_TELE_NETW_ATN => 'Aeronautical Telecommunications Network (ATN)',
            InvoiceSuiteCodelistSchemeIdentifiers::AFFA_SOFT_DATA_INTE_CODE => 'Affable Software Data Interchange Codes',
            InvoiceSuiteCodelistSchemeIdentifiers::AGFADIS => 'AGFA-DIS',
            InvoiceSuiteCodelistSchemeIdentifiers::AIR_TRAN_INDU_SERV_COMM_NETW => 'Air Transport Industry Services Communications Network',
            InvoiceSuiteCodelistSchemeIdentifiers::ALCA_CORP_NETW => 'Alcanet/Alcatel-Alsthom Corporate Network',
            InvoiceSuiteCodelistSchemeIdentifiers::AMAZ_UNIQ_IDEN_SCHE => 'Amazon Unique Identification Scheme',
            InvoiceSuiteCodelistSchemeIdentifiers::APPL_PL_STAN => 'APPLiA Pl Standard',
            InvoiceSuiteCodelistSchemeIdentifiers::ARINC => 'ARINC',
            InvoiceSuiteCodelistSchemeIdentifiers::ASCOMOSINET => 'ascomOSINet',
            InvoiceSuiteCodelistSchemeIdentifiers::ASSO_OF_SWED_CHAM_OF_COMM_AND_INDU_SCHE_EDIR_COMP => 'Association of Swedish Chambers of Commerce and Industry Scheme (EDIRA compliant)',
            InvoiceSuiteCodelistSchemeIdentifiers::ATTO_NETW => 'AT&T/OSI Network',
            InvoiceSuiteCodelistSchemeIdentifiers::ATHE_CHAM_OF_COMM_INDU_SCHE_EDIR_COMP => 'Athens Chamber of Commerce & Industry Scheme (EDIRA compliant)',
            InvoiceSuiteCodelistSchemeIdentifiers::ATM_FORU => 'ATM Forum',
            InvoiceSuiteCodelistSchemeIdentifiers::ATM_INTE_WITH_THE_DUTC_KPN_TELE => 'ATM interconnection with the Dutch KPN Telecom',
            InvoiceSuiteCodelistSchemeIdentifiers::ATMN_ZN => 'ATM-Network ZN96',
            InvoiceSuiteCodelistSchemeIdentifiers::AUCK_AREA_HEAL => 'Auckland Area Health',
            InvoiceSuiteCodelistSchemeIdentifiers::AUNA => 'AUNA',
            InvoiceSuiteCodelistSchemeIdentifiers::AUST_BUSI_NUMB_ABN_SCHE => 'Australian Business Number (ABN) Scheme',
            InvoiceSuiteCodelistSchemeIdentifiers::AUST_CHAM_OF_COMM_AND_INDU_SCHE_EDIR_COMP => 'Australian Chambers of Commerce and Industry Scheme (EDIRA compliant)',
            InvoiceSuiteCodelistSchemeIdentifiers::BASF_COMP_ATMN => 'BASF Company ATM-Network',
            InvoiceSuiteCodelistSchemeIdentifiers::BBDA_GMBH => 'BB-DATA GmbH',
            InvoiceSuiteCodelistSchemeIdentifiers::BCNR_SWIS_CLEA_BANK_NUMB => 'BCNR (Swiss Clearing Bank Number)',
            InvoiceSuiteCodelistSchemeIdentifiers::BELL_ATLA => 'Bell Atlantic',
            InvoiceSuiteCodelistSchemeIdentifiers::BELL_ICD_AESA_ATM_END_SYST_ADDR => 'BellSouth ICD AESA (ATM End System Address)',
            InvoiceSuiteCodelistSchemeIdentifiers::BPI_SWIS_BUSI_PART_IDEN_CODE => 'BPI (Swiss Business Partner Identification) code',
            InvoiceSuiteCodelistSchemeIdentifiers::BT_ICD_CODI_SYST => 'BT - ICD Coding System',
            InvoiceSuiteCodelistSchemeIdentifiers::BULL_ODID_NETW => 'BULL ODI/DSA/UNIX Network',
            InvoiceSuiteCodelistSchemeIdentifiers::CABL_WIRE_GLOB_ATM_ENDS_ADDR_PLAN => 'Cable & Wireless Global ATM End-System Address Plan',
            InvoiceSuiteCodelistSchemeIdentifiers::CENI_OBJE_IDEN_SCHE => 'CEN/ISSS Object Identifier Scheme',
            InvoiceSuiteCodelistSchemeIdentifiers::CERT_OBJE_IDEN => 'Certicom Object Identifiers',
            InvoiceSuiteCodelistSchemeIdentifiers::CHAM_OF_COMM_TEL_AVIV_SCHE_EDIR_COMP => 'CHAMBER OF COMMERCE TEL AVIV-JAFFA Scheme (EDIRA compliant)',
            InvoiceSuiteCodelistSchemeIdentifiers::CHEC_POIN_SOFT_TECH => 'Check Point Software Technologies',
            InvoiceSuiteCodelistSchemeIdentifiers::CISC_SYSY_OSI_NETW => 'Cisco Sysytems / OSI Network',
            InvoiceSuiteCodelistSchemeIdentifiers::CITI_GLOB_INFO_NETW => 'Citicorp Global Information Network',
            InvoiceSuiteCodelistSchemeIdentifiers::CODDEST => 'CODDEST',
            InvoiceSuiteCodelistSchemeIdentifiers::CODE_FOR_THE_IDEN_OF_NATI_ORGA => 'Code for the Identification of National Organizations',
            InvoiceSuiteCodelistSchemeIdentifiers::CODI_FISC => 'CODICE FISCALE',
            InvoiceSuiteCodelistSchemeIdentifiers::CODI_UNIV_UNIT_ORGA_IPA => 'Codice Univoco Unità Organizzativa iPA',
            InvoiceSuiteCodelistSchemeIdentifiers::CODI_NUME_DES_ETAB_FINA_EN_BELG => 'Codification Numerique des Etablissments Financiers En Belgique',
            InvoiceSuiteCodelistSchemeIdentifiers::COMM_LANG => 'COMMON LANGUAGE',
            InvoiceSuiteCodelistSchemeIdentifiers::COMP_CODE_ESTO => 'Company Code (Estonia)',
            InvoiceSuiteCodelistSchemeIdentifiers::CONC_GLOB_NETW_SERV_ICD_AESA => 'Concert Global Network Services ICD AESA',
            InvoiceSuiteCodelistSchemeIdentifiers::CORP_NUMB_OF_THE_SOCI_SECU_AND_TAX_NUMB_SYST => 'Corporate Number of The Social Security and Tax Number System',
            InvoiceSuiteCodelistSchemeIdentifiers::DAIM_CORP_NETW => 'DaimlerChrysler Corporate Network',
            InvoiceSuiteCodelistSchemeIdentifiers::DANI_CHAM_OF_COMM_SCHE_EDIR_COMP => 'DANISH CHAMBER OF COMMERCE Scheme (EDIRA compliant)',
            InvoiceSuiteCodelistSchemeIdentifiers::DANZNET => 'DANZNET',
            InvoiceSuiteCodelistSchemeIdentifiers::DATA_UNIV_NUMB_SYST_DUNS_NUMB => 'Data Universal Numbering System (D-U-N-S Number)',
            InvoiceSuiteCodelistSchemeIdentifiers::DBP_TELE_OBJE_IDEN => 'DBP Telekom Object Identifiers',
            InvoiceSuiteCodelistSchemeIdentifiers::DEUT_INDU_UND_HAND_DIHT_SCHE_EDIR_COMP => 'DEUTSCHER INDUSTRIE- UND HANDELSTAG (DIHT) Scheme (EDIRA compliant)',
            InvoiceSuiteCodelistSchemeIdentifiers::DGCP_DIRE_GNRA_DE_LA_COMP_PUBL_ACCO_IDEN_SCHE => 'DGCP (Direction Générale de la Comptabilité Publique)administrative accounting identification scheme',
            InvoiceSuiteCodelistSchemeIdentifiers::DGI_DIRE_GNRA_DES_IMPO_CODE => 'DGI (Direction Générale des Impots) code',
            InvoiceSuiteCodelistSchemeIdentifiers::DIGAVEID => 'DiGAVEID',
            InvoiceSuiteCodelistSchemeIdentifiers::DIGI_EQUI_CORP_DEC => 'Digital Equipment Corporation: DEC',
            InvoiceSuiteCodelistSchemeIdentifiers::DIGSTORG => 'DIGSTORG',
            InvoiceSuiteCodelistSchemeIdentifiers::DIRE_OF_THE_EURO_COMM => 'Directorates of the European Commission',
            InvoiceSuiteCodelistSchemeIdentifiers::DODA_DEPA_OF_DEFE_ACTI_ADDR_CODE => 'DoDAAC (Department of Defense Activity Address Code)',
            InvoiceSuiteCodelistSchemeIdentifiers::DRES_BANK_CORP_NETW => 'Dresdner Bank Corporate Network',
            InvoiceSuiteCodelistSchemeIdentifiers::EAN_LOCA_CODE => 'EAN Location Code',
            InvoiceSuiteCodelistSchemeIdentifiers::ECCM_OPEN_TECH_DIRE => 'ECCMA Open Technical Directory',
            InvoiceSuiteCodelistSchemeIdentifiers::ECISS => 'eCI@ss',
            InvoiceSuiteCodelistSchemeIdentifiers::EDEL_NETW_PART_IDEN => 'eDelivery Network Participant identifier',
            InvoiceSuiteCodelistSchemeIdentifiers::EDI_PART_IDEN_CODE => 'EDI Partner Identification Code',
            InvoiceSuiteCodelistSchemeIdentifiers::EDIR_SCHE_IDEN_CODE => 'Edira Scheme Identifier Code',
            InvoiceSuiteCodelistSchemeIdentifiers::EINE_AG => 'EINESTEINet AG',
            InvoiceSuiteCodelistSchemeIdentifiers::ELEC_DATA_INTE_EDI => 'Electronic Data Interchange: EDI',
            InvoiceSuiteCodelistSchemeIdentifiers::ENER_NET => 'Energy Net',
            InvoiceSuiteCodelistSchemeIdentifiers::ERSTORG => 'ERSTORG',
            InvoiceSuiteCodelistSchemeIdentifiers::EURO_BUSI_IDEN_EBID => 'European Business Identifier (EBID)',
            InvoiceSuiteCodelistSchemeIdentifiers::EURO_COMP_MANU_ASSO_ECMA => 'European Computer Manufacturers Association: ECMA',
            InvoiceSuiteCodelistSchemeIdentifiers::EURO_LABO_FOR_PART_PHYS_CERN => 'European Laboratory for Particle Physics: CERN',
            InvoiceSuiteCodelistSchemeIdentifiers::EWOS_OBJE_IDEN => 'EWOS Object Identifiers',
            InvoiceSuiteCodelistSchemeIdentifiers::FIEI_OBJE_IDEN => 'FIEIE Object identifiers',
            InvoiceSuiteCodelistSchemeIdentifiers::FINN_ORGA_IDEN => 'Finnish Organization Identifier',
            InvoiceSuiteCodelistSchemeIdentifiers::FINN_ORGA_VALU_ADD_TAX_IDEN => 'Finnish Organization Value Add Tax Identifier',
            InvoiceSuiteCodelistSchemeIdentifiers::FIRMENICH => 'Firmenich',
            InvoiceSuiteCodelistSchemeIdentifiers::FRAN_TELE_ATM_END_SYST_ADDR_PLAN => 'France Telecom ATM End System Address Plan',
            InvoiceSuiteCodelistSchemeIdentifiers::FREISCHALTCODE => 'Freischaltcode',
            InvoiceSuiteCodelistSchemeIdentifiers::FTI_EDIF_ITAL_EDIR_COMP => 'FTI - Ediforum Italia, (EDIRA compliant)',
            InvoiceSuiteCodelistSchemeIdentifiers::FUNLOC => 'FUNLOC',
            InvoiceSuiteCodelistSchemeIdentifiers::GLOB_AESA_SCHE => 'Global AESA scheme',
            InvoiceSuiteCodelistSchemeIdentifiers::GLOB_BUSI_IDEN => 'Global Business Identifier',
            InvoiceSuiteCodelistSchemeIdentifiers::GLOB_CROS_AESA_ATM_END_SYST_ADDR => 'Global Crossing AESA (ATM End System Address)',
            InvoiceSuiteCodelistSchemeIdentifiers::GS_IDEN_KEYS => 'GS1 identification keys',
            InvoiceSuiteCodelistSchemeIdentifiers::GTEO_NETW => 'GTE/OSI Network',
            InvoiceSuiteCodelistSchemeIdentifiers::GTIN_GLOB_TRAD_ITEM_NUMB => 'GTIN - Global Trade Item Number',
            InvoiceSuiteCodelistSchemeIdentifiers::HEAG => 'HEAG',
            InvoiceSuiteCodelistSchemeIdentifiers::HENK_CORP_NETW_HNET => 'Henkel Corporate Network (H-Net)',
            InvoiceSuiteCodelistSchemeIdentifiers::HEWL_PACK_COMP_INTE_AM_NETW => 'Hewlett - Packard Company Internal AM Network',
            InvoiceSuiteCodelistSchemeIdentifiers::HYDRONETT => 'HydroNETT',
            InvoiceSuiteCodelistSchemeIdentifiers::ICD_FORM_ATM_ADDR => 'ICD Formatted ATM address',
            InvoiceSuiteCodelistSchemeIdentifiers::ICEL_IDEN_SLEN_KENN => 'Icelandic identifier - Íslensk kennitala',
            InvoiceSuiteCodelistSchemeIdentifiers::ICI_COMP_IDEN_SYST => 'ICI Company Identification System',
            InvoiceSuiteCodelistSchemeIdentifiers::IDEN_NUMB_OF_ECON_SUBJ_ICO_ACT_ON_STAT_STAT_OF__NOVE_1_27 => 'Identification number of economic subject (ICO) Act on State Statistics of 29 November 2001, § 27',
            InvoiceSuiteCodelistSchemeIdentifiers::IDEN_NUMB_OF_ECON_SUBJ_ICO => 'Identification number of economic subjects: (ICO)',
            InvoiceSuiteCodelistSchemeIdentifiers::IK => 'IK',
            InvoiceSuiteCodelistSchemeIdentifiers::INDI_DI_POST_ELET_CERT => 'Indirizzo di Posta Elettronica Certificata',
            InvoiceSuiteCodelistSchemeIdentifiers::INFO_SERV_CORP => 'Infonet Services Corporation',
            InvoiceSuiteCodelistSchemeIdentifiers::INTE_CORP_OSI => 'Intel Corporation OSI',
            InvoiceSuiteCodelistSchemeIdentifiers::INTE_CODE_DESI_FOR_THE_IDEN_OF_OSIB_AMAT_RADI_ORGA_NETW_OBJE_AND_APPL_SERV => 'International Code Designator for the Identification of OSI-based, Amateur Radio Organizations, Network Objects and Application Services.',
            InvoiceSuiteCodelistSchemeIdentifiers::INTE_NSAP => 'International NSAP',
            InvoiceSuiteCodelistSchemeIdentifiers::INTE_STAN_ISO => 'International Standard ISO 6523',
            InvoiceSuiteCodelistSchemeIdentifiers::INTE_IP_ADDR_ISO__ICD_ENCO => 'Internet IP addressing - ISO 6523 ICD encoding',
            InvoiceSuiteCodelistSchemeIdentifiers::IOTA_IDEN_FOR_ORGA_FOR_TELE_ADDR_USIN_THE_ICD_SYST_FORM_DEFI_IN_ISOI => 'IOTA Identifiers for Organizations for Telecommunications Addressing using the ICD system format defined in ISO/IEC 8348',
            InvoiceSuiteCodelistSchemeIdentifiers::ISO__ICD => 'ISO 6523 - ICD',
            InvoiceSuiteCodelistSchemeIdentifiers::ISO_REGI_FOR_STAN_PROD_ORGA => 'ISO register for Standards producing Organizations',
            InvoiceSuiteCodelistSchemeIdentifiers::ISO_ICDP => 'ISO6523 - ICDPCR',
            InvoiceSuiteCodelistSchemeIdentifiers::ITU_INTE_TELE_UNIO_NETW_IDEN_CODE_DNIC => 'ITU (International Telecommunications Union)Data Network Identification Codes (DNIC)',
            InvoiceSuiteCodelistSchemeIdentifiers::KOIO_OPEN_TECH_DICT => 'KOIOS Open Technical Dictionary',
            InvoiceSuiteCodelistSchemeIdentifiers::KPN_OVN => 'KPN OVN',
            InvoiceSuiteCodelistSchemeIdentifiers::LE_NUME_NATI => 'LE NUMERO NATIONAL',
            InvoiceSuiteCodelistSchemeIdentifiers::LEGA_ENTI_CODE_LITH => 'Legal entity code (Lithuania)',
            InvoiceSuiteCodelistSchemeIdentifiers::LEGA_ENTI_IDEN_LEI => 'Legal Entity Identifier (LEI)',
            InvoiceSuiteCodelistSchemeIdentifiers::LEGO_OSI_NETW => 'LEGO /OSI NETWORK',
            InvoiceSuiteCodelistSchemeIdentifiers::LEITWEGID => 'Leitweg-ID',
            InvoiceSuiteCodelistSchemeIdentifiers::LITH_MILI_PKI => 'Lithuanian military PKI',
            InvoiceSuiteCodelistSchemeIdentifiers::LUXE_CP_CPS_CERT_POLI_AND_CERT_PRAC_STAT_INDE => 'Luxembourg CP & CPS (Certification Policy and Certification Practice Statement) Index',
            InvoiceSuiteCodelistSchemeIdentifiers::LYTUNNUS => 'LY-tunnus',
            InvoiceSuiteCodelistSchemeIdentifiers::MADG_NETW_LTD_ICD_ATM_ADDR_SCHE => 'Madge Networks Ltd- ICD ATM Addressing Scheme',
            InvoiceSuiteCodelistSchemeIdentifiers::MCI_OSI_NETW => 'MCI / OSI Network',
            InvoiceSuiteCodelistSchemeIdentifiers::MIGR_MNET => 'Migros_Network M_NETOPZ',
            InvoiceSuiteCodelistSchemeIdentifiers::MITE_TERM_OR_SWIT_EQUI => 'Mitel terminal or switching equipment',
            InvoiceSuiteCodelistSchemeIdentifiers::NATI_FEDE_OF_CHAM_OF_COMM_INDU_OF_BELG_SCHE_EDIR_COMP => 'National Federation of Chambers of Commerce & Industry of Belgium, Scheme (EDIRA compliant)',
            InvoiceSuiteCodelistSchemeIdentifiers::NATO_COMM_AND_GOVE_ENTI_SYST => 'NATO Commercial and Government Entity system',
            InvoiceSuiteCodelistSchemeIdentifiers::NATO_ISO__ICDE_CODI_SCHE => 'NATO ISO 6523 ICDE coding scheme',
            InvoiceSuiteCodelistSchemeIdentifiers::NAVI_NETW => 'NAVISTAR/OSI Network',
            InvoiceSuiteCodelistSchemeIdentifiers::NBSO_NETW => 'NBS/OSI NETWORK',
            InvoiceSuiteCodelistSchemeIdentifiers::NET_SERV_ID => 'Net service ID',
            InvoiceSuiteCodelistSchemeIdentifiers::NIST_IMPL_WORK => 'NIST/OSI Implememts Workshop',
            InvoiceSuiteCodelistSchemeIdentifiers::NOKI_OBJE_IDEN_NOI => 'Nokia Object Identifiers (NOI)',
            InvoiceSuiteCodelistSchemeIdentifiers::NORD_UNIV_AND_RESE_NETW_NORD => 'Nordic University and Research Network: NORDUnet',
            InvoiceSuiteCodelistSchemeIdentifiers::NORW_TELE_AUTH_NTAS_EDI_IDEN_SCHE_EDIR_COMP => 'Norwegian Telecommunications Authoritys, NTAS, EDI, identifier scheme (EDIRA compliant)',
            InvoiceSuiteCodelistSchemeIdentifiers::NUME_DENT_ONDE_UNTE => 'Numero dentreprise / ondernemingsnummer / Unternehmensnummer',
            InvoiceSuiteCodelistSchemeIdentifiers::NUMR_DIDE_SUIS_DES_ENTE_IDE_SWIS_UNIQ_BUSI_IDEN_NUMB_UIDB => 'Numéro didentification suisse des enterprises (IDE), Swiss Unique Business Identification Number (UIDB)',
            InvoiceSuiteCodelistSchemeIdentifiers::OBJE_IDEN => 'Object Identifiers',
            InvoiceSuiteCodelistSchemeIdentifiers::ODET_INTE_LIMI => 'Odette International Limited',
            InvoiceSuiteCodelistSchemeIdentifiers::ORGANISASJONSNUMMER => 'Organisasjonsnummer',
            InvoiceSuiteCodelistSchemeIdentifiers::ORGA_INDE_NUMM_OIN => 'Organisatie Indentificatie Nummer (OIN)',
            InvoiceSuiteCodelistSchemeIdentifiers::ORGANISATIONSNUMMER => 'Organisationsnummer',
            InvoiceSuiteCodelistSchemeIdentifiers::ORGA_IDEN_FOR_STRU_NAME_UNDE_ISO__PART => 'Organizational Identifiers for Structured Names under ISO 9541 Part 2',
            InvoiceSuiteCodelistSchemeIdentifiers::ORIGINNET => 'OriginNet',
            InvoiceSuiteCodelistSchemeIdentifiers::OSF_DIST_COMP_OBJE_IDEN => 'OSF Distributed Computing Object Identification',
            InvoiceSuiteCodelistSchemeIdentifiers::OSI_ASIA_WORK => 'OSI ASIA-OCEANIA WORKSHOP',
            InvoiceSuiteCodelistSchemeIdentifiers::OSINZ => 'OSINZ',
            InvoiceSuiteCodelistSchemeIdentifiers::OVTCODE => 'OVTcode',
            InvoiceSuiteCodelistSchemeIdentifiers::PACI_BELL_DATA_COMM_NETW => 'Pacific Bell Data Communications Network',
            InvoiceSuiteCodelistSchemeIdentifiers::PARA_GMBH => 'Paradine GmbH',
            InvoiceSuiteCodelistSchemeIdentifiers::PART_IVA => 'PARTITA IVA',
            InvoiceSuiteCodelistSchemeIdentifiers::PENA_OBJE_IDEN => 'Penango Object Identifiers',
            InvoiceSuiteCodelistSchemeIdentifiers::PERC_OBJE_CODE => 'Perceval Object Code',
            InvoiceSuiteCodelistSchemeIdentifiers::PILO_ONTO_CODI_IDEN_POCI => 'PiLog Ontology Codification Identifier (POCI)',
            InvoiceSuiteCodelistSchemeIdentifiers::PNGI_SCHE => 'PNG_ICD Scheme',
            InvoiceSuiteCodelistSchemeIdentifiers::PORT_CHAM_OF_COMM_AND_INDU_SCHE_EDIR_COMP => 'Portuguese Chamber of Commerce and Industry Scheme (EDIRA compliant)',
            InvoiceSuiteCodelistSchemeIdentifiers::PRIO_TELE_ATM_END_SYST_ADDR_PLAN => 'Priority Telecom ATM End System Address Plan',
            InvoiceSuiteCodelistSchemeIdentifiers::PROJ_GROU_LIST_OF_PROP_PROL => 'Project Group “Lists of Properties” (PROLIST®)',
            InvoiceSuiteCodelistSchemeIdentifiers::PSS_OBJE_IDEN => 'PSS Object Identifiers',
            InvoiceSuiteCodelistSchemeIdentifiers::REGI_DU_COMM_ET_DE_LIND_RCI => 'Registre du Commerce et de l’Industrie : RCI',
            InvoiceSuiteCodelistSchemeIdentifiers::REUT_OPEN_ADDR_STAN => 'Reuter Open Address Standard',
            InvoiceSuiteCodelistSchemeIdentifiers::REVE_CANA_BUSI_NUMB_REGI_EDIR_COMP => 'Revenue Canada Business Number Registration (EDIRA compliant)',
            InvoiceSuiteCodelistSchemeIdentifiers::ROCH_CORP_NETW => 'Roche Corporate Network',
            InvoiceSuiteCodelistSchemeIdentifiers::ROUT_MOBI => 'Route1 MobiNET',
            InvoiceSuiteCodelistSchemeIdentifiers::S_G_W_OSI_INTE => 'S G W OSI Internetwork',
            InvoiceSuiteCodelistSchemeIdentifiers::SAIN_GOBA => 'Saint Gobain',
            InvoiceSuiteCodelistSchemeIdentifiers::SAVV_COMM_AESA => 'Savvis Communications AESA:.',
            InvoiceSuiteCodelistSchemeIdentifiers::SECE_OBJE_IDEN => 'SECETI Object Identifiers',
            InvoiceSuiteCodelistSchemeIdentifiers::SIA_OBJE_IDEN => 'SIA Object Identifiers',
            InvoiceSuiteCodelistSchemeIdentifiers::SIEM_AG => 'Siemens AG',
            InvoiceSuiteCodelistSchemeIdentifiers::SIEM_CORP_NETW => 'Siemens Corporate Network',
            InvoiceSuiteCodelistSchemeIdentifiers::SIEM_SUPE_SYST_NETW => 'Siemens Supervisory Systems Network',
            InvoiceSuiteCodelistSchemeIdentifiers::SING_NATI_ELNV_FRAM => 'Singapore Nationwide E-lnvoice Framework',
            InvoiceSuiteCodelistSchemeIdentifiers::SIRETCODE => 'SIRET-CODE',
            InvoiceSuiteCodelistSchemeIdentifiers::SIST_ITAL_DI_IDEN_DI_OGET_GEST_DA_UNIN => 'Sistema Italiano di Identificazione di ogetti gestito da UNINFO',
            InvoiceSuiteCodelistSchemeIdentifiers::SIST_ITAL_DI_INDI_DI_RETI_OSI_GEST_DA_UNIN => 'Sistema Italiano di Indirizzamento di Reti OSI Gestito da UNINFO',
            InvoiceSuiteCodelistSchemeIdentifiers::SITA_OBJE_IDEN_TREE => 'SITA Object Identifier Tree',
            InvoiceSuiteCodelistSchemeIdentifiers::SNAO_NETW => 'SNA/OSI Network',
            InvoiceSuiteCodelistSchemeIdentifiers::SOCI_FOR_WORL_INTE_FINA_TELE_SWIF => 'SOCIETY FOR WORLDWIDE INTERBANK FINANCIAL, TELECOMMUNICATION S.W.I.F.T.',
            InvoiceSuiteCodelistSchemeIdentifiers::SOCI_OF_MOTI_PICT_AND_TELE_ENGI_SMPT => 'Society of Motion Picture and Television Engineers (SMPTE)',
            InvoiceSuiteCodelistSchemeIdentifiers::SOFF_OSI => 'SOFFEX OSI',
            InvoiceSuiteCodelistSchemeIdentifiers::SOLV_OSI_CODI => 'SOLVAY OSI CODING',
            InvoiceSuiteCodelistSchemeIdentifiers::SOUT_AFRI_CODE_ALLO => 'South African Code Allocation',
            InvoiceSuiteCodelistSchemeIdentifiers::STAN_COMP_CODE => 'Standard Company Code',
            InvoiceSuiteCodelistSchemeIdentifiers::STEN_CODI_SYST => 'STENTOR-ICD CODING SYSTEM',
            InvoiceSuiteCodelistSchemeIdentifiers::STEPNEXUS => 'StepNexus',
            InvoiceSuiteCodelistSchemeIdentifiers::SWIS_CHAM_OF_COMM_SCHE_EDIR_COMP => 'Swiss Chambers of Commerce Scheme (EDIRA) compliant',
            InvoiceSuiteCodelistSchemeIdentifiers::SWIS_FEDE_BUSI_IDEN_NUMB_CENT_BUSI_NAME_INDE_ZEFI_IDEN_NUMB => 'Swiss Federal Business Identification Number. Central Business names Index (zefix) Identification Number',
            InvoiceSuiteCodelistSchemeIdentifiers::SWIS_IDEN_SCHE => 'Swissguide Identifier Scheme',
            InvoiceSuiteCodelistSchemeIdentifiers::SYST_INFO_ET_REPE_DES_ENTR_ET_DES_ETAB_SIRE => 'System Information et Repertoire des Entreprise et des Etablissements: SIRENE',
            InvoiceSuiteCodelistSchemeIdentifiers::TC_OID => 'TC68 OID',
            InvoiceSuiteCodelistSchemeIdentifiers::TEIK_COMP_CODE => 'Teikoku Company Code',
            InvoiceSuiteCodelistSchemeIdentifiers::TELE_AUST => 'Telecom Australia',
            InvoiceSuiteCodelistSchemeIdentifiers::TELE_OBJE_IDEN => 'TeleTrust Object Identifiers',
            InvoiceSuiteCodelistSchemeIdentifiers::TELU_CORP => 'TELUS Corporation',
            InvoiceSuiteCodelistSchemeIdentifiers::THAI_INDU_STAN_INST_TISI => 'Thai Industrial Standards Institute (TISI)',
            InvoiceSuiteCodelistSchemeIdentifiers::THE_ALLU_CLAS_OF_ENTE_AND_ORGA => 'The All-Union Classifier of Enterprises and Organisations',
            InvoiceSuiteCodelistSchemeIdentifiers::THE_ASSO_OF_BRIT_CHAM_OF_COMM_LTD_SCHE_EDIR_COMP => 'The Association of British Chambers of Commerce Ltd. Scheme, (EDIRA compliant)',
            InvoiceSuiteCodelistSchemeIdentifiers::THE_AUST_GOSI_NETW => 'The Australian GOSIP Network',
            InvoiceSuiteCodelistSchemeIdentifiers::THE_OZ_DOD_OSI_NETW => 'The OZ DOD OSI Network',
            InvoiceSuiteCodelistSchemeIdentifiers::TOSH_ORGA_PART_AND_SUPP_TOPA_CODE => 'Toshiba Organizations, Partners, And Suppliers (TOPAS) Code',
            InvoiceSuiteCodelistSchemeIdentifiers::TRAD_TRAD_STAN => 'Tradeplace TradePI Standard',
            InvoiceSuiteCodelistSchemeIdentifiers::TRUS_OBJE_IDEN => 'TrustPoint Object Identifiers',
            InvoiceSuiteCodelistSchemeIdentifiers::UBLB_PART_IDEN => 'UBL.BE Party Identifier',
            InvoiceSuiteCodelistSchemeIdentifiers::UK_NATI_HEAL_SERV_SCHE_EDIR_COMP => 'UK National Health Service Scheme, (EDIRA compliant)',
            InvoiceSuiteCodelistSchemeIdentifiers::UNIL_GROU_COMP => 'Unilever Group Companies',
            InvoiceSuiteCodelistSchemeIdentifiers::UNIT_STAT_COUN_FOR_INTE_BUSI_USCI_SCHE_EDIR_COMP => 'United States Council for International Business (USCIB) Scheme, (EDIRA compliant)',
            InvoiceSuiteCodelistSchemeIdentifiers::USEP_FACI_IDEN => 'US-EPA Facility Identifier',
            InvoiceSuiteCodelistSchemeIdentifiers::USA_DOD_OSI_NETW => 'USA DOD OSI NETWORK',
            InvoiceSuiteCodelistSchemeIdentifiers::USA_FED_GOV_OSI_NETW => 'USA FED GOV OSI NETWORK',
            InvoiceSuiteCodelistSchemeIdentifiers::UTC_UNIF_TRAN_CODE => 'UTC: Uniforme Transport Code',
            InvoiceSuiteCodelistSchemeIdentifiers::VERE_VAN_KAME_VAN_KOOP_EN_FABR_IN_NEDE_ASSO_OF_CHAM_OF_COMM_AND_INDU_IN_THE_NETH_SCHE_EDIR_COMP => 'Vereniging van Kamers van Koophandel en Fabrieken in Nederland (Association of Chambers of Commerce and Industry in the Netherlands), Scheme (EDIRA compliant)',
            InvoiceSuiteCodelistSchemeIdentifiers::VODA_IREL_OSI_ADDR => 'Vodafone Ireland OSI Addressing',
            InvoiceSuiteCodelistSchemeIdentifiers::VSA_FTP_CODE_FTP_FILE_TRAN_PROT => 'VSA FTP CODE (FTP = File Transfer Protocol)',
            InvoiceSuiteCodelistSchemeIdentifiers::ZELLWEGEROSINET => 'ZellwegerOSINet',
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
            InvoiceSuiteCodelistSchemeIdentifiers::ACTA_OBJE_IDEN => 'The code is primarily intended for the registration of Object Identifiers (OIDs) according to ISO 8824/8825: Level 1: iso (1), Level 2: identified-organization (3), Level 3: ACTALIS SpA (0159), Level 4 and higher: (defined by ACTALIS) See Intended purpose/application area Issuing agency: ACTALIS S.p.A., ITALY.',
            InvoiceSuiteCodelistSchemeIdentifiers::ADVA_TELE_MODU_LIMI_CORP_NETW => 'Notes on Use of Code: The ICD code will also form part of the Initial Domain Part of the OSI network addressing as specified in Addendum 2 to ISO 8348. Issuing agency: ATM Ltd, ENGLAND.',
            InvoiceSuiteCodelistSchemeIdentifiers::ADVANTIS => 'Issuing agency: Advantis, USA.',
            InvoiceSuiteCodelistSchemeIdentifiers::AERO_TELE_NETW_ATN => 'Notes on Use of Code: The ICD code forms the initial part of the ISO network addressing and naming tree as depicted in Addendum No 2 to ISO 8348 Issuing agency: International Civil Aviation Organization (ICAO), CANADA.',
            InvoiceSuiteCodelistSchemeIdentifiers::AFFA_SOFT_DATA_INTE_CODE => 'Issuing agency: Affable Software Corporation, Canada.',
            InvoiceSuiteCodelistSchemeIdentifiers::AGFADIS => 'Notes on Use of Code: Medical Communication Issuing agency: AGFA N.V. BELGIUM.',
            InvoiceSuiteCodelistSchemeIdentifiers::AIR_TRAN_INDU_SERV_COMM_NETW => 'The ICD code forms the initial part of the OSI network addressing and naming tree as depicted in Addendum 2 to ISO 8348. Issuing agency: International Air Transport Association, Switzerland.',
            InvoiceSuiteCodelistSchemeIdentifiers::ALCA_CORP_NETW => 'Notes on Use of Code: The ICD code forms the initial part of the OSI network addressing scheme as depicted in Addendum 2 of ISO 8384. Issuing agency: Alcatel Network Services Deutschland GmbH, GERMANY.',
            InvoiceSuiteCodelistSchemeIdentifiers::AMAZ_UNIQ_IDEN_SCHE => 'Intended Purpose/App. Area: To provide identifiers for properties, classes, groups, or lists of data and objects specified by or used by Amazon.com, Inc. and its Affiliates Identifiers assigned under this scheme may be usable as Object Identifiers in accordance with ISO/IEC 8824, usable with Directories in accordance with ISO/IEC 9594, usable in accordance with ISO/IEC 8348, or usable in other contexts as defined by Amazon. Issuing agency: Amazon Technologies, Inc. in the United States.',
            InvoiceSuiteCodelistSchemeIdentifiers::APPL_PL_STAN => 'Intended Purpose/App. Area: Through their European industry association APPLiA (Home Appliance Europe), manufacturers of home appliances have launched the Product Information (Pl) initiative. The initiative introduces a standard structure for product information. Pl Standard helps retailers to take full advantage of electronic communication and data processing, as the Internet and ICT are fundamentally changing how products and services are offered, bought, and sold.. Issuing agency: APPLiA Home Appliance Europe, in Belgium',
            InvoiceSuiteCodelistSchemeIdentifiers::ARINC => 'Notes on Use of Code: ARINC will define its own Objects for use with its OSI-based systems and services. ARINC will also define Objects for use within the Aeronautical industry. Issuing agency: ARINC Incorporated, USA.',
            InvoiceSuiteCodelistSchemeIdentifiers::ASCOMOSINET => 'Issuing agency: Ascom AG, Switzerland.',
            InvoiceSuiteCodelistSchemeIdentifiers::ASSO_OF_SWED_CHAM_OF_COMM_AND_INDU_SCHE_EDIR_COMP => 'Issuing agency: Association of Swedish Chambers of Commerce and Industry, Sweden.',
            InvoiceSuiteCodelistSchemeIdentifiers::ATTO_NETW => 'Notes on Use of Code: The ICD code will also form the Initial Domain Part of the OSI network, addressing and naming tree as specified in Addendum 2 to ISO 8348. Issuing agency: AT&T, Standards and Regulatory Support, UNITED STATES OF AMERICA.',
            InvoiceSuiteCodelistSchemeIdentifiers::ATHE_CHAM_OF_COMM_INDU_SCHE_EDIR_COMP => 'Notes on Use of Code : EDIRA recommendations for coding in EDIFACT and other EDI syntaxes. Issuing agency: Athens Chamber of Commerce & Industry, Greece.',
            InvoiceSuiteCodelistSchemeIdentifiers::ATM_FORU => 'Notes on Use of Code: The ICD code will also form part of the Initial Domain Part of the OSI network addressing as specified in Addendum 2 to ISO 8348. Issuing agency: The ATM Forum, USA.',
            InvoiceSuiteCodelistSchemeIdentifiers::ATM_INTE_WITH_THE_DUTC_KPN_TELE => 'ITO Drager Net. The ICD code also form the initial part of the OSI network addressing scheme (Addendum 2 of ISO 8384) Issuing agency: Informatie en Communicatie Technologie Organisatie, The Netherlands.',
            InvoiceSuiteCodelistSchemeIdentifiers::ATMN_ZN => 'Issuing agency: Deutsche Telekom AG, Germany.',
            InvoiceSuiteCodelistSchemeIdentifiers::AUCK_AREA_HEAL => 'Notes on Use of Code: ISO 6523 ICD IDI format with binary syntax will be used Issuing agency: Auckland Area Health Board, Information Systems, Greenlane/National Womens Hospital, New Zealand.',
            InvoiceSuiteCodelistSchemeIdentifiers::AUNA => 'Telecommunication network of operators in the AUNA Group. This code shall be used as an element of NSAP addressing Issuing agency: AUNA, Spain.',
            InvoiceSuiteCodelistSchemeIdentifiers::AUST_BUSI_NUMB_ABN_SCHE => 'The ABN will be a unique identifier for a business to interact with Government (Commonwealth, State and Local) throughout, Australia and is the supporting number for the Goods and Service Tax (GST). The Legislation covering the use of ABN, (see notes on use) will have application throughout the Commonwealth of The ABN is established by: A New Tax System (Australian, Business Number) Act 1999, enacted by the Australian Parliament. The scheme is expected to last for at least 100 Years without reallocation of identification numbers. The ABN is specified in English. Issuing agency: Australian Taxation Office, AUSTRALIA.',
            InvoiceSuiteCodelistSchemeIdentifiers::AUST_CHAM_OF_COMM_AND_INDU_SCHE_EDIR_COMP => 'Issuing agency: Australian Chambers of Commerce and Industry, Australia.',
            InvoiceSuiteCodelistSchemeIdentifiers::BASF_COMP_ATMN => 'Issuing agency: BASF Computer Services GmbH, Germany.',
            InvoiceSuiteCodelistSchemeIdentifiers::BBDA_GMBH => 'Issuing agency: BB-DATA GmbH, Germany.',
            InvoiceSuiteCodelistSchemeIdentifiers::BCNR_SWIS_CLEA_BANK_NUMB => 'Issuing agency: Telekurs AG, Switzerland.',
            InvoiceSuiteCodelistSchemeIdentifiers::BELL_ATLA => 'Issuing agency: Bell Atlantic, USA.',
            InvoiceSuiteCodelistSchemeIdentifiers::BELL_ICD_AESA_ATM_END_SYST_ADDR => 'Issuing agency: BellSouth Corporation, USA.',
            InvoiceSuiteCodelistSchemeIdentifiers::BPI_SWIS_BUSI_PART_IDEN_CODE => 'Issuing agency: Telekurs AG, Switzerland.',
            InvoiceSuiteCodelistSchemeIdentifiers::BT_ICD_CODI_SYST => 'Issuing agency: Tony Holmes, UK.',
            InvoiceSuiteCodelistSchemeIdentifiers::BULL_ODID_NETW => 'Notes on Use of Code: To be used in data communications to form part of the network address. The ISO 6523 ICD IDI format with binary syntax will be used. Issuing agency: BULL S.A. FRANCE.',
            InvoiceSuiteCodelistSchemeIdentifiers::CABL_WIRE_GLOB_ATM_ENDS_ADDR_PLAN => 'Issuing agency: Cable & Wireless Global Business Inc., USA',
            InvoiceSuiteCodelistSchemeIdentifiers::CENI_OBJE_IDEN_SCHE => 'To allocate OIDs to objects defined in the standards and specifications developed in CEN’s technical bodies (TCs, Workshops, etc) The code is primarily intended for the registration ofObject Identifiers according to ISO 8824-1 Annex BLevel 1: iso (1)Level 2: identified-organization (3)Level 3: CEN (nnnn –the ICD allocated)Level 4: and higher: (defined by CEN conventions). Issuing agency: Comité Européen de Normalization, Belgium.',
            InvoiceSuiteCodelistSchemeIdentifiers::CERT_OBJE_IDEN => 'Issuing agency: Certicom Corp, U.S.A.',
            InvoiceSuiteCodelistSchemeIdentifiers::CHAM_OF_COMM_TEL_AVIV_SCHE_EDIR_COMP => 'Issuing agency: Chamber of Commerce Tel Aviv-Jaffa, ISRAEL.',
            InvoiceSuiteCodelistSchemeIdentifiers::CHEC_POIN_SOFT_TECH => 'Issuing agency: Check Point Software Technologies Ltd, ISRAEL.',
            InvoiceSuiteCodelistSchemeIdentifiers::CISC_SYSY_OSI_NETW => 'Issuing agency: Cisco Systems, USA.',
            InvoiceSuiteCodelistSchemeIdentifiers::CITI_GLOB_INFO_NETW => 'Notes on Use of Code: The ICD code will also form the initial part of the Citicorp Network addressing object identifier tree and naming tree as depicted in Addendum 2 to ISO 8348. Issuing agency: Citicorp Global Information Network, USA.',
            InvoiceSuiteCodelistSchemeIdentifiers::CODDEST => 'Intended Purpose/App. Area: Electronic Invoicing trough Sdl, the Exchange System used in Italy where the electronic invoices are transmitted to the Public Administration (Article 1, paragraph 211, of Italian Law no. 244 of 24 December 2007) or to private entities (Article 1, paragraph 2, of Legislative Decree 127/2015). Issuing agency: Agenzia delle Entrate in Italy.',
            InvoiceSuiteCodelistSchemeIdentifiers::CODE_FOR_THE_IDEN_OF_NATI_ORGA => 'Issuing agency: China National Organization Code Registration Authority, P.R. of China.',
            InvoiceSuiteCodelistSchemeIdentifiers::CODI_FISC => 'Intended Purpose/App. Area: Electronic Invoicing and e-procurement. Issuing agency: Agenzia delle Entrate, Italy.',
            InvoiceSuiteCodelistSchemeIdentifiers::CODI_UNIV_UNIT_ORGA_IPA => 'Intended Purpose/App. Area: Used to identify uniquely all organizational units of public bodies, authorities and public services in Italy. Issuing agency: Agenzia per l’Italia digitale in Italy.',
            InvoiceSuiteCodelistSchemeIdentifiers::CODI_NUME_DES_ETAB_FINA_EN_BELG => 'Notes on Use of Code: Many financial institutions have more than one code number, e.g. to indicate each branch individually. The codes can be reallocated over the time (mostly in the case where a financial institution terminates its activity). Some code numbers are currently unused. Code numbers 990 through 999 are reserved. Issuing agency: Association Belge des Banques, Belgium.',
            InvoiceSuiteCodelistSchemeIdentifiers::COMM_LANG => 'Notes on Use of Code: Codes for named populated places, geographic places, geopolitical places, outlaying areas, and other related entities of the state of the United States, provinces and territories of Canada, countries of the world, and other, unique areas. Also for the identification of organizations, places, equipment and governmental entities by the telecommunication industry. Issuing agency: Data Communications Technology Planning, USA.',
            InvoiceSuiteCodelistSchemeIdentifiers::COMP_CODE_ESTO => 'Intended Purpose/App. Area: Company code is major and only unique identifier of all institutions and organisations in Estonia. This code is widely used for various purposes, including electronic commerce. Usage of company code is required in communication between institutions and also in communication between private and public organisations. For use in EDI or other B2B (B2C) exchanges to identify private and public organisations. Issuing agency: Centre of Registers and Information Systems of the Ministry of Justice in Estonia. ',
            InvoiceSuiteCodelistSchemeIdentifiers::CONC_GLOB_NETW_SERV_ICD_AESA => 'Global Addressing of the Concert ATM switches and any direct customer ATM networks for implementation of PNNI. It will also be used for any attached carrier ATM networks. Used to form globally unique Concert ICD ATM End System Addresses (AESAs). Issuing agency: Concert Global Network Services Ltd, Bermuda.',
            InvoiceSuiteCodelistSchemeIdentifiers::CORP_NUMB_OF_THE_SOCI_SECU_AND_TAX_NUMB_SYST => 'Intended Purpose/App. Area: The number system of Japan is a social infrastructure to improve efficiency and the transparency of the social security and the tax system, and to achieve a highly convenient, impartial, and fair society. Additionally, the profit of the number system can be free usage for various purposes, so we want to use the Corporate Number as identifiers in various fields, like in electronic commerce, transportation, etc. The preliminary work, numbering the identifiers for the beginning of usage in January 2016, is being done. Issuing agency: National Tax Agency Japan.',
            InvoiceSuiteCodelistSchemeIdentifiers::DAIM_CORP_NETW => 'Notes on Use of Code: The ICD code will form the initial part of the OSI Network addressing and naming free as depicted in Addendum 2 to ISO 8348 (Network Layer addressing). These addresses will uniquely identify systems within DBCN and to the outside world. Issuing agency: DaimlerChrysler AG, GERMANY.',
            InvoiceSuiteCodelistSchemeIdentifiers::DANI_CHAM_OF_COMM_SCHE_EDIR_COMP => 'Issuing agency: Danish Chamber of Commerce, Denmark.',
            InvoiceSuiteCodelistSchemeIdentifiers::DANZNET => 'Issuing agency: DANZAS AG, Switzerland.',
            InvoiceSuiteCodelistSchemeIdentifiers::DATA_UNIV_NUMB_SYST_DUNS_NUMB => 'Notes on Use of Code: The D-U-N-S Number originated to facilitate the compilation of financial status reports on those involved in business transactions but it is now widely used for other purposes also. The number has world wide recognition as a means of identifying businesses and institutions. Issuing agency: Dun and Bradstreet Ltd, UK.',
            InvoiceSuiteCodelistSchemeIdentifiers::DBP_TELE_OBJE_IDEN => 'Notes on Use of Code: 1) The ICD is primarily intended for the registration of Object Identifiers, according to ISO 8824/8825 (ANS.1) to be used for the identification resp. registration of: - application layer protocols, - file & document formats, - information objects, - local/remote procedures. The OID structure and the inclusion of the ICD therein is given below: level 1: iso(1), level 2: identifiedOrganisation(3), level 3 (ICD): dbpt(0042), level 4 to n: (defined by Telekom). Issuing agency: DBP Telekom, GERMANY.',
            InvoiceSuiteCodelistSchemeIdentifiers::DEUT_INDU_UND_HAND_DIHT_SCHE_EDIR_COMP => 'Issuing agency: Deutscher Industrie -und Handelstag (DIHT), Germany.',
            InvoiceSuiteCodelistSchemeIdentifiers::DGCP_DIRE_GNRA_DE_LA_COMP_PUBL_ACCO_IDEN_SCHE => 'de assigned by the French public accounting office. Issuing agency: DGCP (Direction Générale de la Comptabilité Publique), 139 Rue de Bercy, 75572 Paris Cedex 12, France',
            InvoiceSuiteCodelistSchemeIdentifiers::DGI_DIRE_GNRA_DES_IMPO_CODE => 'French taxation authority. Issuing agency: DGI (Direction Générale des Impots), France.',
            InvoiceSuiteCodelistSchemeIdentifiers::DIGAVEID => 'eindeutiges Kennzeichen fuer eine Verordnungseinheit einer digitalen Gesundheitsanwendung (DiGA) nach Paragraph 139e SGB V',
            InvoiceSuiteCodelistSchemeIdentifiers::DIGI_EQUI_CORP_DEC => 'Notes on Use of Code: The ICD code forms the initial part of the OSI network addressing as described in ISO8348 Addendum 2. Issuing agency: Digital Equipment (Europe) S.A.R.L. France.',
            InvoiceSuiteCodelistSchemeIdentifiers::DIGSTORG => 'Intended Purpose/App. Area: To be used for identifying Danish companies included juridical persons and associations in international trade It is possible to add 0-4 characters set to the code for more detailed use of one organization. Characters are digits or capital letter. Issuing agency: The Danish Agency for Digitisation, Denmark.',
            InvoiceSuiteCodelistSchemeIdentifiers::DIRE_OF_THE_EURO_COMM => 'Issuing agency: European Commission, Belgium',
            InvoiceSuiteCodelistSchemeIdentifiers::DODA_DEPA_OF_DEFE_ACTI_ADDR_CODE => 'A code assigned to uniquely identify all military units in the United States Department of Defense. Issuing agency: DoD (Unites States Department of Defense), USA.',
            InvoiceSuiteCodelistSchemeIdentifiers::DRES_BANK_CORP_NETW => 'Issuing agency: Dresdner Bank AG, Germany.',
            InvoiceSuiteCodelistSchemeIdentifiers::EAN_LOCA_CODE => 'Issuing agency: EAN International, Belgium.',
            InvoiceSuiteCodelistSchemeIdentifiers::ECCM_OPEN_TECH_DIRE => 'A centralized dictionary of names and definitions of trading concepts, essentially goods and services that are bought, sold or exchanged. This is a classification neutral dictionary of names and attributes (also referred to as characteristics or properties). The eOTD will help improve the speed and accuracy of Internet searches and can be imported into sourcing, procurement and ERP systems with minimal data transformation costs. Issuing agency: Electronic Commerce Code Management Association, USA.',
            InvoiceSuiteCodelistSchemeIdentifiers::ECISS => 'To uniquely identify properties, classes and list of characteristics (LoC) for products and services available in the eCI@ss classification system The code is used to uniquely identify objects in the eCI@ss classification system. Issuing agency: eCI@ss, Germany.',
            InvoiceSuiteCodelistSchemeIdentifiers::EDEL_NETW_PART_IDEN => 'Intended Purpose/App. Area: Used as an electronic address identifier for participants within a secure data communication network. Issuing agency: Agency for Digital Government in Sweden.',
            InvoiceSuiteCodelistSchemeIdentifiers::EDI_PART_IDEN_CODE => 'Notes on Use of Code: To identify EDI partners. Issuing agency: Odette NL, The Netherlands.',
            InvoiceSuiteCodelistSchemeIdentifiers::EDIR_SCHE_IDEN_CODE => 'For the unambiguous identification of registration scheme used in e-commerce (not to be used for the identification of organizations). The code is used to designate unambiguously schemes used in e-commerce to specify any entity but organizations. Issuing agency: EDIRA Association, c/o Zurich chamber of commerce, Switzerland.',
            InvoiceSuiteCodelistSchemeIdentifiers::EINE_AG => 'Initially the Network covers the geographical area of Germany with the intention of expanding into all the European countries EINSTEINets goal is to provide Application Services using an ATM network to customers located throughout Europe. The need for the international ATM address structure is to serve EINSTENets customers with consistent ATM addresses from end-to-end. Issuing agency: EINSTEINet AG, Germany.',
            InvoiceSuiteCodelistSchemeIdentifiers::ELEC_DATA_INTE_EDI => 'Issuing agency: Avon Rubber p.l.c. UK.',
            InvoiceSuiteCodelistSchemeIdentifiers::ENER_NET => 'Issuing agency: ABB Asea Brown Boveri Ltd, Switzerland.',
            InvoiceSuiteCodelistSchemeIdentifiers::ERSTORG => 'Intended Purpose/App. Area: To be used for identifying Danish companies based on VAT numbers included juridical. Issuing agency: The Danish Business Authority in Denmark. ',
            InvoiceSuiteCodelistSchemeIdentifiers::EURO_BUSI_IDEN_EBID => 'Intended Purpose/App. Area: For use in EDI or other B2B exchanges to identify business entities (organizations). The scheme is used to identify organisations, and parts of organisations which are parties to or are referenced in electronic transactions such as EDI messaging or other B2B exchanges. Issuing agency: EBID Service AG CAS-Weg in Germany.',
            InvoiceSuiteCodelistSchemeIdentifiers::EURO_COMP_MANU_ASSO_ECMA => 'Issuing agency: European Computer Manufacturers Association, SWITZERLAND.',
            InvoiceSuiteCodelistSchemeIdentifiers::EURO_LABO_FOR_PART_PHYS_CERN => 'Notes on Use of Code: The ICD code forms the initial part of the OSI network addressing and naming tree as depicted in Addendum 2 of ISO 8348. Issuing agency: European Laboratory for Particle Physics, Switzerland.',
            InvoiceSuiteCodelistSchemeIdentifiers::EWOS_OBJE_IDEN => 'Notes on Use of Code: a) In the SIO the Organization Name will normally be omitted, b) The code is primarily intended for the registration of Objects Identifiers according to ISO 8824: Level 1: iso (1), Level 2: identified-organization (3), Level 3: ewos (0016), Level 4: and higher: (defined by EWOS conventions) Issuing agency: EWOS (European Workshop for Open Systems), BELGIUM.',
            InvoiceSuiteCodelistSchemeIdentifiers::FIEI_OBJE_IDEN => 'To provide identifiers for international enterprises and organizations operating in fields of business served by the Jaakko Poyry Group. On the date of the application, these fields include Forest industry, Energy, Infrastructure and Environment. To provide an internationally unambiguous framework for existing coding practices in this The code is primarily intended for the registration of Object Identifiers according to ISO/IEC 8824, 8825 and 11179: Level 1: iso (1) Level 2: identified organization (3) Level 3: fieie code (nnnn, the ICD allocated) Level 4 and higher: (defined by FIEIE conventions). Issuing agency: Jaakko Poyry Group Oyj, Finland.',
            InvoiceSuiteCodelistSchemeIdentifiers::FINN_ORGA_IDEN => 'Intended Purpose/App. Area: Identification scheme will be used for electronic trade purposes in e-invoicing, purchasing, electronic receipts. Issuing agency: State Treasury of Finland / Valtiokonttor.',
            InvoiceSuiteCodelistSchemeIdentifiers::FINN_ORGA_VALU_ADD_TAX_IDEN => 'Intended Purpose/App. Area: Identification scheme will be used for electronic trade purposes in e-invoicing, purchasing, electronic receipts. Issuing agency: State Treasury of Finland / Valtiokonttor.',
            InvoiceSuiteCodelistSchemeIdentifiers::FIRMENICH => 'Notes on Use of Code: Interconnect the plants by an OSI network essentially over X.25 carrier. Issuing agency: Firmenich S A, Switzerland.',
            InvoiceSuiteCodelistSchemeIdentifiers::FRAN_TELE_ATM_END_SYST_ADDR_PLAN => 'The coding system will be used to provide ATM End System Addresses based on ICD format NSAP addresses. These addresses will be used to uniquely identify User Network. Interfaces to ATM networks as specified by the ATM Forum UNI specifications. France telecom will also use these addresses Internally and to provide worldwide customers with non- Geographic private AESAs. These global addresses should be Reachable by non-France Telecom ATM users via Interconnecting ATM carriers. The ICD Code will also form part of the Initial Domain Part of the OSI network addressing as specified in Addendum 2 to ISO 8348. Issuing agency: France Telecom, France.',
            InvoiceSuiteCodelistSchemeIdentifiers::FREISCHALTCODE => 'digitaler Gutschein fuer die Nutzung einer digitale Gesundheitsanwendung (DiGA) nach Paragraph 139e SGB V',
            InvoiceSuiteCodelistSchemeIdentifiers::FTI_EDIF_ITAL_EDIR_COMP => 'Issuing agency: FTI - Ediforum Italia, ITALY.',
            InvoiceSuiteCodelistSchemeIdentifiers::FUNLOC => 'Notes on Use of Code: Current applications are Philips accounting and logistic systems; new application is the identification of objects in the open network environment according to ISO 8824 which starts with a party identification Issuing agency: Royal Philips Electronics N.V., The Netherlands.',
            InvoiceSuiteCodelistSchemeIdentifiers::GLOB_AESA_SCHE => 'Construct and Administer AESAs, Routing of ATM switched connections Use to from globally unique Global One ICD AESAs. Issuing agency: Global One, Belgium.',
            InvoiceSuiteCodelistSchemeIdentifiers::GLOB_BUSI_IDEN => 'For a companys ability to obtain complete and accurate information about potential suppliers Used to identify and designate in electronic commerce Issuing agency: ResolveNet (IOM) Ltd, UK.',
            InvoiceSuiteCodelistSchemeIdentifiers::GLOB_CROS_AESA_ATM_END_SYST_ADDR => 'Construction, administration and implementation of a scalable AESA schema for routing if ATM switched connections. ICD will be used as a component of the IDP (Initial Domain Part) for OSI addressing. Issuing agency: Global Crossing Ltd, Bermuda.',
            InvoiceSuiteCodelistSchemeIdentifiers::GS_IDEN_KEYS => 'Intended Purpose/App. Area: GS1 identification keys and key qualifiers may be used by an information system to refer unambiguously to an entity such as a trade item, logistics unit, physical location, document, or service relationship. Issuing agency: GS1, a global organization.',
            InvoiceSuiteCodelistSchemeIdentifiers::GTEO_NETW => 'Issuing agency: GTE, Industry Standards, USA.',
            InvoiceSuiteCodelistSchemeIdentifiers::GTIN_GLOB_TRAD_ITEM_NUMB => 'The GTIN is a globally unique identifier of trade items. A trade item is any item (product or service) upon which there is a need to retrieve pre-defined information and that may be priced, ordered or invoiced at any point in any supply chain. The GTIN identification scheme is currently (2002) used by more than 900,000 organizations in the world. It is widely in the consumer goods and other industries to identify items and packages. The GTIN can be represented in a standard bar code format. Issuing agency: EAN Inernational.',
            InvoiceSuiteCodelistSchemeIdentifiers::HEAG => 'Issuing agency: Hessische Elektrizitats-AG, Germany.',
            InvoiceSuiteCodelistSchemeIdentifiers::HENK_CORP_NETW_HNET => 'Issuing agency: Henkel KgaA, Germany.',
            InvoiceSuiteCodelistSchemeIdentifiers::HEWL_PACK_COMP_INTE_AM_NETW => 'Issuing agency: Hewlett - Packard Company, USA.',
            InvoiceSuiteCodelistSchemeIdentifiers::HYDRONETT => 'Notes on Use of Code: The ICD code forms the initial part of the OSI network addressing as depicted in ISO 8348/AD2. Issuing agency: Norsk Hydro a.s., Norway.',
            InvoiceSuiteCodelistSchemeIdentifiers::ICD_FORM_ATM_ADDR => 'Notes on Use of Code: Used as an ATM address prefix by, 1) Newbridge ATM terminal equipment: a) when performing user - network address registration, b) transparently initiating signalled ATM connections on behalf of other non-ATM (LAN) devices, c) directly initiating signalled ATM connections, 2) Newbridge ATM switching equipment used to: a) perform network - user address registration, b) perform routing of Switched Virtual Connections across a private ATM cell switching network. Issuing agency: Newbridge Networks Corporation, CANADA.',
            InvoiceSuiteCodelistSchemeIdentifiers::ICEL_IDEN_SLEN_KENN => 'Intended Purpose/App. Area: Identification of Icelandic individuals and legal entities. Issuing agency: For individual, Icelandic National Registry, www.skra.is. For legal entities, Directorate of Internal Revenue, www.rsk.is in Iceland.',
            InvoiceSuiteCodelistSchemeIdentifiers::ICI_COMP_IDEN_SYST => 'Notes on Use of Code: The ICD code will be used to manage NSAP allocation for all ICI companies on a worldwide basis. The organisation code is used Worldwide by ICI application systems to identify ICI registered companies in machine to machine communications. Issuing agency: ICI PLC, UK.',
            InvoiceSuiteCodelistSchemeIdentifiers::IDEN_NUMB_OF_ECON_SUBJ_ICO_ACT_ON_STAT_STAT_OF__NOVE_1_27 => 'The unique identification of economic subjects (legal persons and natural persons-entrepreneurs) used for registration The identification number ICO is used in Slovakia in almost all administrative acts (tax system, banking system, statistics, etc.) Issuing agency: Slovak Statistical Office, Slovak Republic.',
            InvoiceSuiteCodelistSchemeIdentifiers::IDEN_NUMB_OF_ECON_SUBJ_ICO => 'Unique identification of economic subjects for all administrative purposes The identification number ICO is used in the Czech Republic mainly in all administrative acts (tax system, banking system, statistics. etc.) Issuing agency: Czech Statistical Office, Czech Republic.',
            InvoiceSuiteCodelistSchemeIdentifiers::IK => 'eindeutiges Kennzeichen fuer einen Leistungserbringer nach Paragraph 293 SGB V',
            InvoiceSuiteCodelistSchemeIdentifiers::INDI_DI_POST_ELET_CERT => 'Intended Purpose/App. Area: Used to identify senders and receivers of certified electronic mail as defined by Italian law. Issuing agency: Agenzia per l’Italia digitale in Italy.',
            InvoiceSuiteCodelistSchemeIdentifiers::INFO_SERV_CORP => 'Issuing agency: Infonet NV/SA, Belgium.',
            InvoiceSuiteCodelistSchemeIdentifiers::INTE_CORP_OSI => 'Notes on Use of Code: The ICD code will be used to form the Initial Domain Identifier (IDI) portion of the Initial Domain Part (IDP) as described in ISO 8348 Addendum 2 for OSI NSAP addressing. Issuing agency: Intel Corporation, USA.',
            InvoiceSuiteCodelistSchemeIdentifiers::INTE_CODE_DESI_FOR_THE_IDEN_OF_OSIB_AMAT_RADI_ORGA_NETW_OBJE_AND_APPL_SERV => 'Notes on Use of Code: Specific object and attribute naming conventions are currently being defined. Issuing agency: The Radio Amateur Telecommunications Society, USA.',
            InvoiceSuiteCodelistSchemeIdentifiers::INTE_NSAP => 'Issuing agency: Federal Office for Communications, Switzerland.',
            InvoiceSuiteCodelistSchemeIdentifiers::INTE_STAN_ISO => 'Issuing agency: Styria Federn GmbH, AUSTRIA.',
            InvoiceSuiteCodelistSchemeIdentifiers::INTE_IP_ADDR_ISO__ICD_ENCO => 'Issuing agency: Internet Assigned Numbers Authority, USA.',
            InvoiceSuiteCodelistSchemeIdentifiers::IOTA_IDEN_FOR_ORGA_FOR_TELE_ADDR_USIN_THE_ICD_SYST_FORM_DEFI_IN_ISOI => 'Issuing agency: DISC, British Standards Institution, UK.',
            InvoiceSuiteCodelistSchemeIdentifiers::ISO__ICD => 'Notes on Use of Code: This code will be used internationally by BP thus a non-geographic code is requested. Issuing agency: The British Petroleum Co Plc, UK.',
            InvoiceSuiteCodelistSchemeIdentifiers::ISO_REGI_FOR_STAN_PROD_ORGA => 'Issuing agency: International Organization for Standardization (ISO), SWITZERLAND.',
            InvoiceSuiteCodelistSchemeIdentifiers::ISO_ICDP => 'Notes on Use of Code: This code could be used internationally by Pfizer thus a non-geographic code is required. The code forms the initial part of the OSI network addressing and naming tree depicted in Addendum 2 of ISO 8348. Issuing agency: Pfizer Central Research, UK.',
            InvoiceSuiteCodelistSchemeIdentifiers::ITU_INTE_TELE_UNIO_NETW_IDEN_CODE_DNIC => 'Data Network Identification Codes assigned by the ITU. Issuing agency: ITU (International Telecommunications Union), Switzerland.',
            InvoiceSuiteCodelistSchemeIdentifiers::KOIO_OPEN_TECH_DICT => 'Intended Purpose/App. Area: The KOIOS OTD is a collection of terminology defined by and obtained from consensus bodies such as ISO, IEC, and other groups that have a consensus process for developing terminology. The KOIOS OTD contains terms, definitions, and images of concepts used to describe individuals, organizations, locations, goods and services. The KOIOS OTD conforms to ISO 22745 (all parts) and is designed to enable the exchange of characteristic data in all stages of the life-cycle of an item, and to ensure that the resulting specifications conform to ISO 8000-110. Issuing agency: KOIOS Master Data Limited in UK. ',
            InvoiceSuiteCodelistSchemeIdentifiers::KPN_OVN => 'Notes on Use of Code: This code is used in the VTOA network of KPN OVN. Issuing agency: Koninklijke KPN, The Netherlands.',
            InvoiceSuiteCodelistSchemeIdentifiers::LE_NUME_NATI => 'Issuing agency: Ministere De Linterieur et de la Fonction Publique, Belgium.',
            InvoiceSuiteCodelistSchemeIdentifiers::LEGA_ENTI_CODE_LITH => 'Intended Purpose/App. Area: For use in EDI (electronic data interchange) for C2B and others exchanges to identify legal entities. Issuing agency: State Enterprise Centre of Registers in Lithuania.',
            InvoiceSuiteCodelistSchemeIdentifiers::LEGA_ENTI_IDEN_LEI => 'Intended Purpose/App. Area: The LEI is the global, open identifier established at the urging of the Financial Stability Board and the recommendation of the G20. The LEI is established as the ISO 17442 standard, is governed by the LEI Regulatory Oversight Committee (LEI-ROC) and has been implemented by the Global Legal Entity Identifier Foundation (GLEIF). The LEI code connects to key reference information that enables clear and unique identification of legal entities participating in financial transactions. Each LEI contains information about an entitys ownership structure and thus answers the questions of who is who and who '
                .'owns whom. Simply put, the publicly available LEI data pool can be regarded as a global directory, which greatly enhances transparency in the global marketplace. Already applied very broadly within financial regulation and rapidly being adopted for KYC and a number of other purposes in financial markets, the LEI is set to spread into a range of other fields, including trade facilitation, business reporting and supply chain management. Issuing agency: GLEIF, a global organization.',
            InvoiceSuiteCodelistSchemeIdentifiers::LEGO_OSI_NETW => 'Notes on Use of Code: The ICD code will also form the Initial Domain Part of the OSI network addressing and naming tree as specified in addendum 2 to ISO 8348. Issuing agency: LEGO Systems Inc, USA.',
            InvoiceSuiteCodelistSchemeIdentifiers::LEITWEGID => 'Intended Purpose/App. Area: Identification of Public Authorities. Issuing agency: Koordinierungsstelle fuer IT-Standards (KoSIT) in Germany.',
            InvoiceSuiteCodelistSchemeIdentifiers::LITH_MILI_PKI => 'dex of the Certification Policies and Certification Practices Statements issued by Lithuanian military PKI The code is used to uniquely identify Certification Policies and Certification Practice Statements in Lithuanian military PKI Issuing agency: The Ministry of National Defence of the Republic of Lithuania, Lithuania.',
            InvoiceSuiteCodelistSchemeIdentifiers::LUXE_CP_CPS_CERT_POLI_AND_CERT_PRAC_STAT_INDE => 'Index of the Certification Policies and Certification Practice Statement issued by Luxembourg PKI Issuing agency: Ministry of The Economy and Foreign Trade, Luxembourg.',
            InvoiceSuiteCodelistSchemeIdentifiers::LYTUNNUS => 'Notes on Use of Code: It is possible to add 0-4 characters set to the code for more detailed use ofone organization. Characters are digits or capital letter. Issuing agency: National Board of Taxes, FINLAND.',
            InvoiceSuiteCodelistSchemeIdentifiers::MADG_NETW_LTD_ICD_ATM_ADDR_SCHE => 'The code will be used as part of an ATM NSAP addressing scheme for the establishment of PVC and SPVC connections Addressing for Madge Networks global ATM network and the connections of any Madge Customers requiring the allocation of ATM addresses from Madge Networks. Issuing agency: Madge Networks, UK.',
            InvoiceSuiteCodelistSchemeIdentifiers::MCI_OSI_NETW => 'Issuing agency: MCI Telecommunications Corporation, Technical Standards Management, USA.',
            InvoiceSuiteCodelistSchemeIdentifiers::MIGR_MNET => 'Issuing agency: Migros-Genossenschafts-Bund, Switzerland.',
            InvoiceSuiteCodelistSchemeIdentifiers::MITE_TERM_OR_SWIT_EQUI => 'Notes on Use of Code: The ICD code will form the initial part of the naming tree for: 1 - Private Integrated Services Network manufacturer-specific information as the Organization identifier forming the initial part of the OBJECT IDENTIFIER tree. 2 - OSI Application Layer such as CSTA (ECMA 179). Issuing agency: Mitel Corporation, Canada.',
            InvoiceSuiteCodelistSchemeIdentifiers::NATI_FEDE_OF_CHAM_OF_COMM_INDU_OF_BELG_SCHE_EDIR_COMP => 'Issuing agency: National Federartion of Chambers of Commerce & Industry of, Belgium, Belgium.',
            InvoiceSuiteCodelistSchemeIdentifiers::NATO_COMM_AND_GOVE_ENTI_SYST => 'To identify all Commercial and Governmental entities that provide material and/or services to the Armed Forces of the NATO nations and several non-NATO nations (Sponsored) around the world. This information is used by NATO and Sponsored nations Logisticians to identify Commercial and Government Entities they deal with. This Information is used by all functions of Logistics support such as Acquisition, Sourcing, EDI, Re-Provisioning, Material Management, etc. Determination of the real source for an item of supply is one of the most important prerequisites for proper application of the Uniform System of Item Identification '
                .'within NATO. It is the source where documentation will be obtained from and its location normally gives advice for codification responsibility. Within the NATO Codification System the term Manufacturer covers the whole range of possible sources of technical data for items entering the supply chains or participating, countries. The primary use of manufacturers coding is in ADP operations related to support management programs such as material management codification, standardization, etc. Issuing agency: NATO Group of National Director on Codification (AC/135), Luxembourg.',
            InvoiceSuiteCodelistSchemeIdentifiers::NATO_ISO__ICDE_CODI_SCHE => 'Notes on Use of Code: The ICD code forms the initial part of the OSI network addressing and naming tree depicted in Addendum 2 of ISO 8348. Issuing agency: North Atlantic Treaty Organisation (NATO), Belgium.',
            InvoiceSuiteCodelistSchemeIdentifiers::NAVI_NETW => 'Notes on Use of Code: The ICD code will also form the Initial Domain Part of the OSI Network addressing and naming tree as specified in Addendum 2 to ISO 8348. Issuing agency: International Truck & Engine Corp, USA.',
            InvoiceSuiteCodelistSchemeIdentifiers::NBSO_NETW => 'Notes on Use of Code: The ICD code forms the initial part of the OSI network addressing and naming tree as depicted in Addendum 2 to ISO 8348. Issuing agency: National Bureau of Standards, USA.',
            InvoiceSuiteCodelistSchemeIdentifiers::NET_SERV_ID => 'Net service ID',
            InvoiceSuiteCodelistSchemeIdentifiers::NIST_IMPL_WORK => 'Notes on Use of Code: The ICD code forms the initial part of the Workshop naming and addressing tree. Issuing agency: United States Department of Commerce, National Institute of Standards and Technology, Gaithersburg, USA.',
            InvoiceSuiteCodelistSchemeIdentifiers::NOKI_OBJE_IDEN_NOI => 'Notes on Use of Code: a) In the SIO the organization name will normally be omitted, b) The code is primarily intended for the registration of Object Identifiers according to ISO/IEC 8824: Level 1:iso(1), Level 2:identified-organization(3), Level 3:nokia(xxxx), Level 4 and higher:defined by Nokia conventions Issuing agency: Nokia Corporation, FINLAND.',
            InvoiceSuiteCodelistSchemeIdentifiers::NORD_UNIV_AND_RESE_NETW_NORD => 'Notes on Use of Code: The ICD code forms the initial part of the OSI network addressing and tree as depicted in Addendum 2 of ISO 8348. Issuing agency: NORDUnet, c/o SICS, Sweden.',
            InvoiceSuiteCodelistSchemeIdentifiers::NORW_TELE_AUTH_NTAS_EDI_IDEN_SCHE_EDIR_COMP => 'Notes on Use of Code: For use in EDIFACT messages in accordance with current national recommendation on identification of EDI objects. (EDIRA compliant). Issuing agency: Norwegian Telecommunications Authority, NORWAY.',
            InvoiceSuiteCodelistSchemeIdentifiers::NUME_DENT_ONDE_UNTE => 'Intended Purpose/App. Area: Identification number attributed by the BCE/KBO/ZDU (the Belgian register) to identify entities and establishment units operating in Belgium. Issuing agency: Banque-Carrefour des Entreprises (BCE) / Kruispuntbank van Ondernemingen (KBO) / Zentrale Datenbank der Unternehmen (ZOU) Service public fédéral Economie, P.M.E.in Belgium. Classes moyennes et Energie',
            InvoiceSuiteCodelistSchemeIdentifiers::NUMR_DIDE_SUIS_DES_ENTE_IDE_SWIS_UNIQ_BUSI_IDEN_NUMB_UIDB => 'Intended Purpose/App. Area: To uniquely identify all companies/organizations registered in Switzerland in all official register (Swiss Register of Commerce, VAT register, Canton register, etc) The UIDB shall make lt possible to identify an enterprise quickly, unambiguously and on a permanent basis. The UIDB and the other identification characteristics associated with it shall be managed via a specific UIDB register. The main identification characteristics (status, address, etc.) shall be accessible to the public. Issuing agency: Swiss Federal Statistical Office (FSO), Switzerland).',
            InvoiceSuiteCodelistSchemeIdentifiers::OBJE_IDEN => 'Issuing agency: Institute of Electrical and Electronics Engineers, USA.',
            InvoiceSuiteCodelistSchemeIdentifiers::ODET_INTE_LIMI => 'For use in EDI and other B2B exchanges in the European automotive industry to identify business entities (organisations). The scheme is used to identify organisations, and parts of organisations which are parties to or are referenced in automotive supply chain transactions such as EDI messaging and other B2B exchanges. Issuing agency: Odette International Limited, UK.',
            InvoiceSuiteCodelistSchemeIdentifiers::ORGANISASJONSNUMMER => 'Intended Purpose/App. Area: Identify entities registered in the Central Coordinating Register for Legal Entities in Norway. The scheme with ICD code + organization number will be used to identify organisations that are parties to or referenced in electronic transactions such as electronic invoicing or other B2B exchanges. Issuing agency: The Brønnøysund Register Centre in Norway.',
            InvoiceSuiteCodelistSchemeIdentifiers::ORGA_INDE_NUMM_OIN => 'Intended Purpose/App. Area: The OIN is part of the Dutch standard ‘Digikoppeling’ and is used for identifying the organisations that take part in electronic message exchange with the Dutch Government. The OIN must also be included in the PKIo certificate. Issuing agency: Logius in the Netherlands.',
            InvoiceSuiteCodelistSchemeIdentifiers::ORGANISATIONSNUMMER => 'Notes on Use of Code: The third digit in the organisation number is never lower than 2 in order to avoid it being confused with personal numbers. Issuing agency: The National Tax Board, SWEDEN.',
            InvoiceSuiteCodelistSchemeIdentifiers::ORGA_IDEN_FOR_STRU_NAME_UNDE_ISO__PART => 'Notes on Use of Code: The organizational codes established under this coding systems constitute the registered organizational identifiers recognised under ISO 9541-2. That standard effectively establishes agreements under which, as allowed by clauses 5.1 and 5.3 of ISO 6523, both the ICD and the organization name are generally omitted, from the SIO, and thus only the organization code portion of the SIO is interchanged. Issuing agency: Association for Font Information Interchange, USA.',
            InvoiceSuiteCodelistSchemeIdentifiers::ORIGINNET => 'Issuing agency: Origin BV, The Netherlands.',
            InvoiceSuiteCodelistSchemeIdentifiers::OSF_DIST_COMP_OBJE_IDEN => 'Notes on Use of Code: OSF provides public domain software in OS, ISO networking and management. The initial use of the coding system are for identifying the following objects in OSFs distributed computing environment: the attributes of entries in the distributed directory, the object class of each entry in the directory, the type of name components (RDNs), the communication protocol profiles, the interfaces offered by. Issuing agency: Open Software Foundation, USA.',
            InvoiceSuiteCodelistSchemeIdentifiers::OSI_ASIA_WORK => 'Notes on Use of Code: The code is used as an element of object identifiers which need to be assigned relating the ISPs (International Standardized Profiles) that AOW is working on. Issuing agency: OSI ASIA-OCEANIA WORKSHOP, JAPAN.',
            InvoiceSuiteCodelistSchemeIdentifiers::OSINZ => 'Notes on Use of Code: ISO 6523 ICD IDI format with binary syntax will be used. Issuing agency: OSINZ, New Zealand.',
            InvoiceSuiteCodelistSchemeIdentifiers::OVTCODE => 'OVTcode',
            InvoiceSuiteCodelistSchemeIdentifiers::PACI_BELL_DATA_COMM_NETW => 'Issuing agency: Pacific Bell, USA.',
            InvoiceSuiteCodelistSchemeIdentifiers::PARA_GMBH => 'To uniquely identify properties, classes,and list of properties (LoP) for products and services available in Paradine Reference Dictionary Systems The code is used to uniquely identify objects in Paradine Reference Dictionary Systems. Issuing agency: Paradine GmbH, Austria.',
            InvoiceSuiteCodelistSchemeIdentifiers::PART_IVA => 'Intended Purpose/App. Area: Electronic Invoicing and e-procurement. Issuing agency: Agenzia delle Entrate, Italy.',
            InvoiceSuiteCodelistSchemeIdentifiers::PENA_OBJE_IDEN => 'To identify objects, policies, and data related to Penango’s products and services. The ICD is primarily intended for registration of Object Identifiers in accordance with ISO/IEC 8824 (ASN.1). Issuing agency: Penango, Inc., Canada.',
            InvoiceSuiteCodelistSchemeIdentifiers::PERC_OBJE_CODE => 'Intended Purpose/App. Area: Intended to uniquely identify in an international context any physical and or abstract entities related to Perceval products and services using Abstract Syntax Notation One in accordance with ISO/IEC 8824 The ICD is primarily intended for registration and resolution of Object Identifiers in accordance with ISO/IEC 8824 with reduced encoding size and non-geographic context Issuing agency: Perceval SA, Tenbosch, Belgium.',
            InvoiceSuiteCodelistSchemeIdentifiers::PILO_ONTO_CODI_IDEN_POCI => 'Intended Purpose/App. Area: A repository of concepts pertaining to any entity such as products, services, business partners, assets, organizations, locations, persons, addresses, languages, records etc along with the terminologies to describe each entity using class, characteristics, values, JoMs, QoMs, groups, definitions, guidelines, images, drawings, pictures. codes and any classification thereof. The codification will help exchange/integrate the data between operational, ERP, CRM, SRM or any other systems without any human interpretation and interaction without losing the meaning of the information in multiple languages, this will help organizations achieve their digital transformation goals more precisely in order to assess the real value-proposition of the underlying data that is driving their businesses. Issuing agency: PiLog Group in South Africa.',
            InvoiceSuiteCodelistSchemeIdentifiers::PNGI_SCHE => 'Issuing agency: GPT Limited, UK.',
            InvoiceSuiteCodelistSchemeIdentifiers::PORT_CHAM_OF_COMM_AND_INDU_SCHE_EDIR_COMP => 'Issuing agency: Portuguese Chamber of Commerce and Industry, Portugal.',
            InvoiceSuiteCodelistSchemeIdentifiers::PRIO_TELE_ATM_END_SYST_ADDR_PLAN => 'The coding system will be used to provide ATM End System Address based on IDC format NSAP addresses required for Priority Telecom ATM PNNI implementation. These addresses will be used to uniquely identify User Network interfaces to Priority Telecom ATM Networks as specified by the ATM Forum UNI specifications. PT plans to use these addresses to connect to other public ATM networks in the countries PT is operating (The Netherlands, Norway and Austria) Used to form a globally unique Priority Telecom ATM End System Address. PT customers and interconnect with public ATM networks requires the use of unique AESA Issuing agency: Priority Telecom Netherlands, The Netherlands.',
            InvoiceSuiteCodelistSchemeIdentifiers::PROJ_GROU_LIST_OF_PROP_PROL => 'To uniquely identify properties, blocks and lists of properties (LOP) for products and services in the process industry. The products are electrical and process control devices. The code is used to uniquely identify the objects in the PROLIST online dictionary. Issuing agency: Project Group “Lists of Properties” (PROLIST®) c/o Bayer Technology Services GmbH Geb., Germany.',
            InvoiceSuiteCodelistSchemeIdentifiers::PSS_OBJE_IDEN => 'Issuing agency: PSS (Postal Security Services), FINLAND.',
            InvoiceSuiteCodelistSchemeIdentifiers::REGI_DU_COMM_ET_DE_LIND_RCI => 'Intended Purpose/App. Area: To provide identifiers for organizations at national level in Monaco. Issuing agency: Agence Monégasque de Sécurité Numérique (AMSN) in Monaco.',
            InvoiceSuiteCodelistSchemeIdentifiers::REUT_OPEN_ADDR_STAN => 'Notes on Use of Code: To be used in the formation of OSI Network Service Access Point (NSAP) addresses. Issuing agency: Reuters Ltd, UK.',
            InvoiceSuiteCodelistSchemeIdentifiers::REVE_CANA_BUSI_NUMB_REGI_EDIR_COMP => 'Issuing agency: Revenue Canada, CANADA.',
            InvoiceSuiteCodelistSchemeIdentifiers::ROCH_CORP_NETW => 'Notes on Use of Code: Will be used internationaly by Roche thus a non-geographic code is required. Issuing agency: F. HOFFMANN - LA ROCHE AG, Switzerland.',
            InvoiceSuiteCodelistSchemeIdentifiers::ROUT_MOBI => 'For rooting OIDs defined by Route1 Security Corporation for Route1 MobiNET. Intended to cover MobiNET connected organizations, Route1 Security Corporation, its subdivisions, customers and any organization using MobiNET or Route1s services and products For rooting OIDs defined by Route1 Security Corporation for Route1 MobiNET. Intended to cover MobiNET connected organizations, Route1 Security Corporation, its subdivisions, customers and any organization using MobiNET or Route1s services and products. The OID structure and the inclusion therein of the ICS is as follows: ISO.Identifiedorganization.ICD(Route1 MobiNET).AFI.PCI.Org_ID.OPI.MC Issuing agency: Route1 Security Corporation,Canada.',
            InvoiceSuiteCodelistSchemeIdentifiers::S_G_W_OSI_INTE => 'Notes on Use of Code: Exclusive use by S G W .Issuing agency: S G Warburg Group Management Ltd, UK.',
            InvoiceSuiteCodelistSchemeIdentifiers::SAIN_GOBA => 'Notes on Use of Code: To be used for assignment of: N.E.T (ISO 8348/Add 2), A.E.T (FTAM, X.400 Psaps, and so on), and object identification (ISO 8824/8825) Issuing agency: Saint Gobain, France.',
            InvoiceSuiteCodelistSchemeIdentifiers::SAVV_COMM_AESA => 'Global Addressing of Savvis ATM Switches and any direct customer ATM networks for implementation of PNNI Used to form a globally unique Savvis ICD ATM End System Address. Issuing agency: Savvis Communications,USA.',
            InvoiceSuiteCodelistSchemeIdentifiers::SECE_OBJE_IDEN => 'The function as the Application Centre for the Italian National Interbank Network, having been authorized by the Bank of Italy, and the Italian Banking Association to operate in that capacity. The scheme is intended for the registration of object identifiers according to ISO 8824 and ISO 8825 The code is primarily intended for the registration of Object Identifiers according to ISO 8824/8825, Level 1: ISO (), Level 2: identified -organization (), Level 3: SECETI S.p.A. (), Level 4: and higher: (defined by SECETI conventions).Issuing agency: Servizi Centralizzati SECETI S.p.A., ITALY.',
            InvoiceSuiteCodelistSchemeIdentifiers::SIA_OBJE_IDEN => 'Issuing agency: SIA-Società Interbancaria per lAutomazione S.p.A., ITALIA.',
            InvoiceSuiteCodelistSchemeIdentifiers::SIEM_AG => 'To uniquely identify properties, blocks, classes and lists of properties used or specified by Siemens AG - Power Generation The code is used to uniquely identify objects in the Siemens AG - Power Generation corporate dictionary Issuing agency: Siemens AG, Germany.',
            InvoiceSuiteCodelistSchemeIdentifiers::SIEM_CORP_NETW => 'Notes on Use of Code: The ICD code will form the initial part of the OSI Network addressing and naming tree as depicted in Addendum 2 to ISO 8348 (Network layer addressing). These addresses will uniquely identify systems within SCN and to the outside world. Issuing agency: Siemens AG, Germany.',
            InvoiceSuiteCodelistSchemeIdentifiers::SIEM_SUPE_SYST_NETW => 'Issuing agency: Siemens AG, Germany.',
            InvoiceSuiteCodelistSchemeIdentifiers::SING_NATI_ELNV_FRAM => 'Intended Purpose/App. Area: For use in electronic messages in accordance to the Singapore nationwide e-invoice framework on Identification of organization. Issuing agency: Infocomm Media Development Authority in Singapore. ',
            InvoiceSuiteCodelistSchemeIdentifiers::SIRETCODE => 'Issuing agency: DU PONT DE NEMOURS (FRANCE) S.A. France.',
            InvoiceSuiteCodelistSchemeIdentifiers::SIST_ITAL_DI_IDEN_DI_OGET_GEST_DA_UNIN => 'Notes on Use of Code: To be used for assignments of object identifiers according to ISO 8824 and ISO 8825. Issuing agency: UNINFO, ITALY.',
            InvoiceSuiteCodelistSchemeIdentifiers::SIST_ITAL_DI_INDI_DI_RETI_OSI_GEST_DA_UNIN => 'Notes on Use of Code: The ICD code forms the initial part of the OSI network Addressing and naming tree depicted in Addendum 2 of ISO 8348. Issuing agency: UNINFO, ITALY.',
            InvoiceSuiteCodelistSchemeIdentifiers::SITA_OBJE_IDEN_TREE => 'Notes on Use of Code: SITA intends to use its OID Tree to define its own Objects for use with its OSI-based services (e.g. MHS & OSI Management). Issuing agency: SITA, France.',
            InvoiceSuiteCodelistSchemeIdentifiers::SNAO_NETW => 'Notes on Use of Code: The ICD code will also form the initial part of the OSI Network addressing and naming tree as depicted in Addendum 2 to ISO 8348. Issuing agency: International Business Machines Corporation, USA.',
            InvoiceSuiteCodelistSchemeIdentifiers::SOCI_FOR_WORL_INTE_FINA_TELE_SWIF => 'Notes on Use of Code: To be used for assignment of object identifiers (ISO 8824/8825) Issuing agency: SOCIETY FOR WORLDWIDE INTERBANK FINANCIAL, TELECOMMUNICATION S.W.I.F.T. BELGIUM.',
            InvoiceSuiteCodelistSchemeIdentifiers::SOCI_OF_MOTI_PICT_AND_TELE_ENGI_SMPT => 'Notes on Use of Code: The ICD code will also be used to identify SMPTE constituent organizations (committees, working groups, task forces, etc./), and the objects they, define. The ICD code will also form the Initial Domain Part of the OSI network addressing and naming tree as specified in Addendum 2 tot ISO 8348 Issuing agency: Society of Motion Picture and Television Engineers (SMPTE), USA.',
            InvoiceSuiteCodelistSchemeIdentifiers::SOFF_OSI => 'Notes on Use of Code: This code is to assist in uniquely identifying data network node addresses in an international supporting network for financial applications. This supporting network may have operational interfaces to other (private) data networks. Issuing agency: SOFFEX Swiss Options and Financial Futures Exchange AG. Switzerland.',
            InvoiceSuiteCodelistSchemeIdentifiers::SOLV_OSI_CODI => 'Notes on Use of Code: Whenever possible, ISO 8348 addresses using this code will comply with FIPS PUB 146, with an End System ID of exactly 4 octets, so that the DSP can also conform to ECMA 117 where ECMAs subnet-address maps onto FIPSs Subnet ID concatenated with the End System ID. Issuing agency: Direction Centrale Technique (Informatique Scientifique), Belgium.',
            InvoiceSuiteCodelistSchemeIdentifiers::SOUT_AFRI_CODE_ALLO => 'Issuing agency: Thawte Consulting, 33 Protea Way, Durbanville 7550, South Africa',
            InvoiceSuiteCodelistSchemeIdentifiers::STAN_COMP_CODE => 'Partner identification code which is registered with JIPDEC/ECPC. Issuing agency: Japan Information Processing Development Corporation, / Electronic Commerce Promotion Center (JIPDEC/ECPC),Japan.',
            InvoiceSuiteCodelistSchemeIdentifiers::STEN_CODI_SYST => 'Issuing agency: Stentor Resource Centre Inc., Canada.',
            InvoiceSuiteCodelistSchemeIdentifiers::STEPNEXUS => 'To provide identifiers within StepNexus loader objects. These addresses will be used to uniquely identify StepNexu key usage fields within X509 certificates for use in the StepNexus loader scheme. Used to define unique certificate attributes within X509 certificates Issuing agency: StepNexus, UK.',
            InvoiceSuiteCodelistSchemeIdentifiers::SWIS_CHAM_OF_COMM_SCHE_EDIR_COMP => 'Intended Purpose/App. Area Numerical identifiers of organizations. Issuing agency: Zurich Chamber of Commerce on behalf of Swiss Chambers, of Commerce, Switzerland.',
            InvoiceSuiteCodelistSchemeIdentifiers::SWIS_FEDE_BUSI_IDEN_NUMB_CENT_BUSI_NAME_INDE_ZEFI_IDEN_NUMB => 'To uniquely identify all companies/organizations registered in the Swiss Register of Commerce and the Swiss Central Business Names Index To uniquely identify entries in Swiss Central Business Names Index (zefix). The principle purpose of the zefix on internet is to provide a swisswide search function, and thus provide the public with a service to determine the legal domicile, the cantonal office for the register of commerce in charge, and the latter’s address. Issuing agency: Swiss Federal Office of Justice, Switzerland.',
            InvoiceSuiteCodelistSchemeIdentifiers::SWIS_IDEN_SCHE => 'To uniquely identify objects, esp. companies and professionals in directories/databases The code is used to uniquely identify the objects in the Swissguide directory. Issuing agency: Swissguide AG, Switzerland.',
            InvoiceSuiteCodelistSchemeIdentifiers::SYST_INFO_ET_REPE_DES_ENTR_ET_DES_ETAB_SIRE => 'Notes on Use of Code: The Sirene number is used in France mainly for the official registration in the Trade Register and as the only number used between authorities and organizations, and between authorities when dealing with data interchange on organizations. Issuing agency: Institut National de la Statistique et des Etudes Economiques, (I.N.S.E.E.), France.',
            InvoiceSuiteCodelistSchemeIdentifiers::TC_OID => 'Issuing agency: ISO TC68, Banking and Related Financial Services, USA.',
            InvoiceSuiteCodelistSchemeIdentifiers::TEIK_COMP_CODE => 'Teikoku Company Code is allocated to all incorporations, business owners, government organizations and other public offices in Japan. TDB (Teikoku Databank Ltd.) retains company codes of approximately 1.7 million companies within Japan. Teikoku Company Code, a unique company ID, has already been adopted by many companies both as a standard company code in customer data managements and as an identification code for online electronic commerce transactions. Since every company trades with companies abroad, they need to use it in their international business transaction. Therefore, it is desired to register TDB as an ICD to RA of the ISO/IEC 6523. Issuing agency: TEIKOKU DATABANK LTD., JAPAN.',
            InvoiceSuiteCodelistSchemeIdentifiers::TELE_AUST => 'Notes on Use of Code: The code is used as an element of Object Identifier when defining objects within Telecom Australia. In addition the code shall be used as an element of NSAP addressing. Issuing agency: Australia Telecommunications Corporation, AUSTRALIA.',
            InvoiceSuiteCodelistSchemeIdentifiers::TELE_OBJE_IDEN => 'Notes on Use of Code: a) In the SIO the Organization name will normally be omitted. b) The code is primarily intended for the registration of Object Identifiers for security related objects according to ISO/IEC 8824, Level 1: iso(1), Level 2: identified-organization(3), Level 3: teletrust(0036), Level 4 and higher: (defined by TeleTrust conventions) Issuing agency: TeleTrust Deutschland e.V., GERMANY.',
            InvoiceSuiteCodelistSchemeIdentifiers::TELU_CORP => 'SA Addressing Scheme for ATM PNNI Implementation ICD is required for PNNI implementation on TELUS’ ATM network in order to establish an addressing scheme for SPVC connections within and between regions Issuing agency: TELUS Corporation, Canada.',
            InvoiceSuiteCodelistSchemeIdentifiers::THAI_INDU_STAN_INST_TISI => 'Notes on Use of Code: The ICD code forms the initial part of international addressing for Thailand. Issuing agency: Thai Industrial Standards Institute (TISI), THAILAND.',
            InvoiceSuiteCodelistSchemeIdentifiers::THE_ALLU_CLAS_OF_ENTE_AND_ORGA => 'Issuing agency: General Computing Centre of the State, Committee of the USSR on Statistics, U S S R.',
            InvoiceSuiteCodelistSchemeIdentifiers::THE_ASSO_OF_BRIT_CHAM_OF_COMM_LTD_SCHE_EDIR_COMP => 'Issuing agency: The Association of British Chambers of Commerce Ltd., UK.',
            InvoiceSuiteCodelistSchemeIdentifiers::THE_AUST_GOSI_NETW => 'Notes on Use of Code: As noted above it will be used as the initial identifier of an NSAP codingscheme. Issuing agency: Standards Australia.',
            InvoiceSuiteCodelistSchemeIdentifiers::THE_OZ_DOD_OSI_NETW => 'The ICD code forms the initial part of the OSI naming and addressing, tree as depicted in ISO 8348/Add 2 standard. Format of the tree is described in the Australian GOSIP Manuals and used globally. Issuing agency: The Australian Department of Defence, AUSTRALIA.',
            InvoiceSuiteCodelistSchemeIdentifiers::TOSH_ORGA_PART_AND_SUPP_TOPA_CODE => 'The purpose of this coding system is to identify organizations world-wide that have business or technical transactions with Toshiba Corporation in terms of ISO 13584 Parts Library standard based electronic catalogue interchange service. The interchange is not limited to those between a member organization and Toshiba Corporation. Interchanges between member organizations based on the organization identifier of this coding system are also in scope. Reference to this organization identification code in other business transactions is also allowed Reference to this organization identifier in other business transactions is also possible provided the organizations concerned are registered as members of the. Issuing agency: Toshiba Corporation, Japan.',
            InvoiceSuiteCodelistSchemeIdentifiers::TRAD_TRAD_STAN => 'Tradeplace TradePI Standard',
            InvoiceSuiteCodelistSchemeIdentifiers::TRUS_OBJE_IDEN => 'Intended Purpose/App. Area: To uniquely identify objects and mechanisms globally throughout communications networks using TrustPoint security products and services Issuing agency: TrustPoint Innovation Technologies, Attn: Sherry Shannon-Vanstone, 816 Hideaway Circle East, Unit 244 Marco Island, FL 34145 USA http://www.trustpointinnovation.com Tel: +1 905 302 6929 Email: sviconsulting@aol.com',
            InvoiceSuiteCodelistSchemeIdentifiers::UBLB_PART_IDEN => 'Intended Purpose/App. Area: Identification and addressing of different parties involved in invoicing. Issuing agency: UBL.BE in Belgium. ',
            InvoiceSuiteCodelistSchemeIdentifiers::UK_NATI_HEAL_SERV_SCHE_EDIR_COMP => 'Notes on Use of Code: EDIRA recommendations for coding in EDIFACT and other EDI systems. Issuing agency: National Health Service, UK.',
            InvoiceSuiteCodelistSchemeIdentifiers::UNIL_GROU_COMP => 'Notes on Use of Code: To be used in data communications to form part of the Network Address as defined in ISO 8348. The ISO 6523, ICD IDI format with Binary syntax will be used. Issuing agency: Information Technology Group, Unilever Plc, UK.',
            InvoiceSuiteCodelistSchemeIdentifiers::UNIT_STAT_COUN_FOR_INTE_BUSI_USCI_SCHE_EDIR_COMP => 'EDIRA recommendations for coding in EDIFACT and other EDI syntaxes. Issuing agency: United States Council for Internationa Business (USCIB), 1212 Avenue of the Americas, USA.',
            InvoiceSuiteCodelistSchemeIdentifiers::USEP_FACI_IDEN => 'To provide for the unique identification of facilities regulated or monitored by the United States Environmental Protection Agency (EPA).A facility is a distinct real property entity (i.e., a man-made object and its surrounding real estate). Facilities incorporate the characteristics of being: (1) objects, established at (2) specific places, for (3) specific purposes. A facility can include monitoring stations, waste sites, and other entities of environmental interest that cannot be classified as single facilities. This is maintained within the U.S. Environmental Protection Agency Facility Registration System (FRS). Issuing agency: U.S. Environmental Protection Agency, USA.',
            InvoiceSuiteCodelistSchemeIdentifiers::USA_DOD_OSI_NETW => 'Notes on Use of Code: The ICD code forms the initial part of the OSI network addressing and naming tree as depicted in Addendum 2 to ISO 8348. Issuing agency: Defense Communication Agency, USA.',
            InvoiceSuiteCodelistSchemeIdentifiers::USA_FED_GOV_OSI_NETW => 'Notes on Use of Code: The ICD code forms the initial part of the OSI network addressing and naming tree as depicted in Addendum 2 to ISO 8348. Issuing agency: National Bureau of Standards, USA.',
            InvoiceSuiteCodelistSchemeIdentifiers::UTC_UNIF_TRAN_CODE => 'Notes on Use of Code: The code identifies an individual transport or handling unit (e.g. pallet, parcel) for reasons of tracing or tracing. The unit may have an international destination. Issuing agency: Foundation UTC, The Netherlands.',
            InvoiceSuiteCodelistSchemeIdentifiers::VERE_VAN_KAME_VAN_KOOP_EN_FABR_IN_NEDE_ASSO_OF_CHAM_OF_COMM_AND_INDU_IN_THE_NETH_SCHE_EDIR_COMP => 'Issuing agency: Vereniging van Kamers van Koophandel en Fabrieken in Nederland Watermolenlaan, The Netherlands.',
            InvoiceSuiteCodelistSchemeIdentifiers::VODA_IREL_OSI_ADDR => 'Implementation of an ATM network in connection with 3G rollout. The code will be used for ATM network related addressing purposes, and for CLNS network. Issuing agency: Vodafone Ireland Limited, Ireland.',
            InvoiceSuiteCodelistSchemeIdentifiers::VSA_FTP_CODE_FTP_FILE_TRAN_PROT => 'Notes on Use of Code: The code serves the addressing between the communicating partners. Issuing agency: Verband der Automobilindustrie e.V., GERMANY.',
            InvoiceSuiteCodelistSchemeIdentifiers::ZELLWEGEROSINET => 'Notes on Use of Code: BAKOM - Switzerland. Issuing agency: Zellweger Uster AG, Switzerland.',
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
            'https://www.xrepository.de/details/urn:xoev-de:kosit:codeliste:icd',
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
            'https://www.xrepository.de/api/xrepository/urn:xoev-de:kosit:codeliste:icd_5/download/ICD_5.json',
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
