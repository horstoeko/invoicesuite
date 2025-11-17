<?php

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\codelists;

/**
 * Class representing list of allowance and charge identification codes
 * Name of list: UNTDID 7161 Special service description code, UNTDID 5189 Allowance or charge identification code
 *
 * @category InvoiceSuite
 * @author   HorstOeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 * @see      https://www.xrepository.de/details/urn:xoev-de:kosit:codeliste:untdid.7161
 * @see      https://www.xrepository.de/api/xrepository/urn:xoev-de:kosit:codeliste:untdid.7161_3/download/UNTDID_7161_3.json
 * @see      https://www.xrepository.de/api/xrepository/urn:xoev-de:kosit:codeliste:untdid.5189_3/download/UNTDID_5189_3.json
 */
enum InvoiceSuiteCodelistAllowanceChargeCodes: string
{
    /**
     * Acceptance (AAS)
     *
     * The service of accepting goods or services.
     */
    case ACCEPTANCE = 'AAS';

    /**
     * Additional packaging (ABL)
     *
     * The service of providing additional packaging.
     */
    case ADDI_PACK = 'ABL';

    /**
     * Additional processing (AAH)
     *
     * The service of providing additional processing.
     */
    case ADDI_PROC = 'AAH';

    /**
     * Adjustments (AJ)
     *
     * The service of making adjustments.
     */
    case ADJUSTMENTS = 'AJ';

    /**
     * Advertising (AA)
     *
     * The service of providing advertising.
     */
    case ADVERTISING = 'AA';

    /**
     * Airbag (ADJ)
     *
     * The service of surrounding a product with an air bag.
     */
    case AIRBAG = 'ADJ';

    /**
     * Aircraft refueling (AEI)
     *
     * Fuel being put into the aircraft.
     */
    case AIRC_REFU = 'AEI';

    /**
     * Airport facilities (AAY)
     *
     * The service of providing airport facilities.
     */
    case AIRP_FACI = 'AAY';

    /**
     * Allowance transferable to the consumer (DAH)
     *
     * An allowance given by the manufacturer which should be transfered to the
     * consumer.
     */
    case ALLO_TRAN_TO_THE_CONS = 'DAH';

    /**
     * Assortment allowance (DAC)
     *
     * Allowance given when a specific part of a suppliers assortment is purchased
     * by the buyer.
     */
    case ASSO_ALLO = 'DAC';

    /**
     * Attesting (AAI)
     *
     * The service of certifying validity.
     */
    case ATTESTING = 'AAI';

    /**
     * Authentication (AU)
     *
     * The service of authenticating.
     */
    case AUTHENTICATION = 'AU';

    /**
     * Battery collection and recycling (CAV)
     *
     * The service of collecting and recycling batteries.
     */
    case BATT_COLL_AND_RECY = 'CAV';

    /**
     * Bilateral agreement service (CAO)
     *
     * Provision of a service as specified in a bilateral special agreement.
     */
    case BILA_AGRE_SERV = 'CAO';

    /**
     * Bill of lading (ADE)
     *
     * The service of providing a bill of lading document.
     */
    case BILL_OF_LADI = 'ADE';

    /**
     * Binding (ADM)
     *
     * Binding service.
     */
    case BINDING = 'ADM';

    /**
     * Car loading (CD)
     *
     * Car loading service.
     */
    case CAR_LOAD = 'CD';

    /**
     * Carrier count (L1)
     *
     * The service of counting by the carrier.
     */
    case CARR_COUN = 'L1';

    /**
     * Cartage (CAB)
     *
     * Movement of goods by heavy duty cart or vehicle.
     */
    case CARTAGE = 'CAB';

    /**
     * Carton packing (ABS)
     *
     * The service of packing items into a carton.
     */
    case CART_PACK = 'ABS';

    /**
     * Cash on delivery (AEK)
     *
     * The provision of a cash on delivery (COD) service.
     */
    case CASH_ON_DELI = 'AEK';

    /**
     * Cash transportation (CAM)
     *
     * Provision of a cash transportation service.
     */
    case CASH_TRAN = 'CAM';

    /**
     * Cataloguing (CA)
     *
     * The provision of cataloguing services.
     */
    case CATALOGUING = 'CA';

    /**
     * Certificate of conformance (CAE)
     *
     * The service of providing a certificate of conformance.
     */
    case CERT_OF_CONF = 'CAE';

    /**
     * Certificate of origin (CAF)
     *
     * The service of providing a certificate of origin.
     */
    case CERT_OF_ORIG = 'CAF';

    /**
     * Certification (CAD)
     *
     * The service of certifying.
     */
    case CERTIFICATION = 'CAD';

    /**
     * Cheque generation (CAQ)
     *
     * Provision of a cheque generation service.
     */
    case CHEQ_GENE = 'CAQ';

    /**
     * Chronic illness (ADW)
     *
     * The special services provided due to chronic illness.
     */
    case CHRO_ILLN = 'ADW';

    /**
     * Cigarette stamping (CS)
     *
     * The service of providing cigarette stamping.
     */
    case CIGA_STAM = 'CS';

    /**
     * Cleaning (CG)
     *
     * Cleaning service.
     */
    case CLEANING = 'CG';

    /**
     * Clerical or administrative services (AEM)
     *
     * The provision of clerical or administrative services.
     */
    case CLER_OR_ADMI_SERV = 'AEM';

    /**
     * Collection and recycling (AEO)
     *
     * The service of collection and recycling products.
     */
    case COLL_AND_RECY = 'AEO';

    /**
     * Combine all same day shipment (XAA)
     *
     * The service of combining all shipments for the same day.
     */
    case COMB_ALL_SAME_DAY_SHIP = 'XAA';

    /**
     * Compulsory storage (ABA)
     *
     * The service provided to hold a compulsory inventory.
     */
    case COMP_STOR = 'ABA';

    /**
     * Concession (AAZ)
     *
     * The service allowing a party to use another party's facilities.
     */
    case CONCESSION = 'AAZ';

    /**
     * Consignee unload (SAI)
     *
     * The service of unloading by the consignee.
     */
    case CONS_UNLO = 'SAI';

    /**
     * Consolidation (ADC)
     *
     * The service of consolidating multiple consignments into one shipment.
     */
    case CONSOLIDATION = 'ADC';

    /**
     * Consular service (CAJ)
     *
     * The service provided by consulates.
     */
    case CONS_SERV = 'CAJ';

    /**
     * Containerisation (ABR)
     *
     * The service of packing items into a container.
     */
    case CONTAINERISATION = 'ABR';

    /**
     * Copyright fee collection (AEP)
     *
     * The service of collecting copyright fees.
     */
    case COPY_FEE_COLL = 'AEP';

    /**
     * Count and recount (CT)
     *
     * The service of doing a count and recount.
     */
    case COUN_AND_RECO = 'CT';

    /**
     * Crane (CAS)
     *
     * The service of providing a crane.
     */
    case CRANE = 'CAS';

    /**
     * Customer collection (CAK)
     *
     * The service of collecting goods by the customer.
     */
    case CUST_COLL = 'CAK';

    /**
     * Cutting (CAI)
     *
     * The service of cutting.
     */
    case CUTTING = 'CAI';

    /**
     * Dealer allowance (DAG)
     *
     * An allowance offered by a party dealing a certain brand or brands of
     * products.
     */
    case DEAL_ALLO = 'DAG';

    /**
     * Debtor bound (DAF)
     *
     * A special allowance or charge applicable to a specific debtor.
     */
    case DEBT_BOUN = 'DAF';

    /**
     * Delivery (DL)
     *
     * The service of providing delivery.
     */
    case DELIVERY = 'DL';

    /**
     * Direct delivery (ADZ)
     *
     * Direct delivery service.
     */
    case DIRE_DELI = 'ADZ';

    /**
     * Disconnect (AEB)
     *
     * The service is a disconnection.
     */
    case DISCONNECT = 'AEB';

    /**
     * Distribution (AEC)
     *
     * Distribution service.
     */
    case DISTRIBUTION = 'AEC';

    /**
     * Diversion (AEA)
     *
     * The service of diverting deliverables.
     */
    case DIVERSION = 'AEA';

    /**
     * Documentary credits transfer commission (DAQ)
     *
     * Fee for the transfer of transferable documentary credits.
     */
    case DOCU_CRED_TRAN_COMM = 'DAQ';

    /**
     * Driver assigned unloading (DAD)
     *
     * The service of unloading by the driver.
     */
    case DRIV_ASSI_UNLO = 'DAD';

    /**
     * Drop dock (V2)
     *
     * The service of delivering goods at the dock.
     */
    case DROP_DOCK = 'V2';

    /**
     * Drop yard (V1)
     *
     * The service of delivering goods at the yard.
     */
    case DROP_YARD = 'V1';

    /**
     * Dunnage (ABN)
     *
     * The service of providing additional padding materials required to secure
     * and protect a cargo within a shipping container.
     */
    case DUNNAGE = 'ABN';

    /**
     * Efficient logistics (ADO)
     *
     * A code indicating efficient logistics services.
     */
    case EFFI_LOGI = 'ADO';

    /**
     * Enamelling treatment (ACG)
     *
     * The service of providing enamelling treatment.
     */
    case ENAM_TREA = 'ACG';

    /**
     * Engraving (EG)
     *
     * The service of providing engraving.
     */
    case ENGRAVING = 'EG';

    /**
     * Environmental clean-up service (AEW)
     *
     * The provision of an environmental clean-up service.
     */
    case ENVI_CLEA_SERV = 'AEW';

    /**
     * Environmental protection service (AEV)
     *
     * The provision of an environmental protection service.
     */
    case ENVI_PROT_SERV = 'AEV';

    /**
     * Exchange rate guarantee (ER)
     *
     * The service of guaranteeing exchange rate.
     */
    case EXCH_RATE_GUAR = 'ER';

    /**
     * Expediting (EP)
     *
     * The service of expediting.
     */
    case EXPEDITING = 'EP';

    /**
     * Fabrication (FAA)
     *
     * The service of providing fabrication.
     */
    case FABRICATION = 'FAA';

    /**
     * Filling/handling (FH)
     *
     * The service of providing filling/handling.
     */
    case FILLINGHANDLING = 'FH';

    /**
     * Financing (FI)
     *
     * The service of providing financing.
     */
    case FINANCING = 'FI';

    /**
     * Fitting (ACS)
     *
     * Fitting service.
     */
    case FITTING = 'ACS';

    /**
     * Freight equalization (FAB)
     *
     * The service of load balancing.
     */
    case FREI_EQUA = 'FAB';

    /**
     * Freight extraordinary handling (FAC)
     *
     * The service of providing freight's extraordinary handling.
     */
    case FREI_EXTR_HAND = 'FAC';

    /**
     * Freight service (FC)
     *
     * The service of moving goods, by whatever means, from one place to another.
     */
    case FREI_SERV = 'FC';

    /**
     * Fuel removal (ABB)
     *
     * Remove or off-load fuel from vehicle, vessel or craft.
     */
    case FUEL_REMO = 'ABB';

    /**
     * Fuel shipped into storage (AEJ)
     *
     * Fuel being shipped into a storage system.
     */
    case FUEL_SHIP_INTO_STOR = 'AEJ';

    /**
     * Grinding (GAA)
     *
     * The service of grinding.
     */
    case GRINDING = 'GAA';

    /**
     * Growth of business (DAI)
     *
     * An allowance or charge related to the growth of business over a
     * pre-determined period of time.
     */
    case GROW_OF_BUSI = 'DAI';

    /**
     * Guarantee (AEN)
     *
     * The service of providing a guarantee.
     */
    case GUARANTEE = 'AEN';

    /**
     * Handling (HD)
     *
     * Handling service.
     */
    case HANDLING = 'HD';

    /**
     * Handling of hazardous cargo (AED)
     *
     * A service for handling hazardous cargo.
     */
    case HAND_OF_HAZA_CARG = 'AED';

    /**
     * Heat treatment (ACH)
     *
     * The service of treating with heat.
     */
    case HEAT_TREA = 'ACH';

    /**
     * Hessian wrapped (ABT)
     *
     * The service of hessian wrapping.
     */
    case HESS_WRAP = 'ABT';

    /**
     * Hoisting and hauling (HH)
     *
     * The service of hoisting and hauling.
     */
    case HOIS_AND_HAUL = 'HH';

    /**
     * Home banking service (CAN)
     *
     * Provision of a home banking service.
     */
    case HOME_BANK_SERV = 'CAN';

    /**
     * Hose (HAA)
     *
     * The service of providing a hose.
     */
    case HOSE = 'HAA';

    /**
     * Inside delivery (ID)
     *
     * The service of providing delivery inside.
     */
    case INSI_DELI = 'ID';

    /**
     * Inspection (IF)
     *
     * The service of inspection.
     */
    case INSPECTION = 'IF';

    /**
     * Installation (IAA)
     *
     * The service of installing.
     */
    case INSTALLATION = 'IAA';

    /**
     * Installation and training (IR)
     *
     * The service of providing installation and training.
     */
    case INST_AND_TRAI = 'IR';

    /**
     * Installation and warranty (IAB)
     *
     * The service of installing and providing warranty.
     */
    case INST_AND_WARR = 'IAB';

    /**
     * Insurance brokerage service (CAP)
     *
     * Provision of an insurance brokerage service.
     */
    case INSU_BROK_SERV = 'CAP';

    /**
     * Into plane (ABC)
     *
     * Service of delivering goods to an aircraft from local storage.
     */
    case INTO_PLAN = 'ABC';

    /**
     * Introduction allowance (DAJ)
     *
     * An allowance related to the introduction of a new product to the range of
     * products traded by a retailer.
     */
    case INTR_ALLO = 'DAJ';

    /**
     * Invoice with shipment (PA)
     *
     * The service of including the invoice with the shipment.
     */
    case INVO_WITH_SHIP = 'PA';

    /**
     * Invoicing (IS)
     *
     * The service of providing an invoice.
     */
    case INVOICING = 'IS';

    /**
     * Job-order production (AAD)
     *
     * The service of producing to order.
     */
    case JOBO_PROD = 'AAD';

    /**
     * Koshering (KO)
     *
     * The service of preparing food in accordance with Jewish law.
     */
    case KOSHERING = 'KO';

    /**
     * Labelling (LA)
     *
     * Labelling service.
     */
    case LABELLING = 'LA';

    /**
     * Labour (LAA)
     *
     * The service to provide required labour.
     */
    case LABOUR = 'LAA';

    /**
     * Layout/design (DAB)
     *
     * The service of providing layout/design.
     */
    case LAYOUTDESIGN = 'DAB';

    /**
     * Legalisation (LF)
     *
     * The service of legalising.
     */
    case LEGALISATION = 'LF';

    /**
     * Loading (RV)
     *
     * The service of loading goods.
     */
    case LOADING = 'RV';

    /**
     * Location differential (AEH)
     *
     * Delivery to a different location than previously contracted.
     */
    case LOCA_DIFF = 'AEH';

    /**
     * Mail invoice (MI)
     *
     * The service of mailing an invoice.
     */
    case MAIL_INVO = 'MI';

    /**
     * Mail invoice to each location (ML)
     *
     * The service of mailing an invoice to each location.
     */
    case MAIL_INVO_TO_EACH_LOCA = 'ML';

    /**
     * Medicine free pass holder (AEU)
     *
     * Special service when the subject holds a medicine free pass.
     */
    case MEDI_FREE_PASS_HOLD = 'AEU';

    /**
     * Merchandising (ADP)
     *
     * A code indicating that merchandising services are in operation.
     */
    case MERCHANDISING = 'ADP';

    /**
     * Minimum order not fulfilled charge (DAN)
     *
     * Charge levied because the minimum order quantity could not be fulfilled.
     */
    case MINI_ORDE_NOT_FULF_CHAR = 'DAN';

    /**
     * Miscellaneous (ABK)
     *
     * Miscellaneous services.
     */
    case MISCELLANEOUS = 'ABK';

    /**
     * Miscellaneous treatment (ACF)
     *
     * Miscellaneous treatment service.
     */
    case MISC_TREA = 'ACF';

    /**
     * Mounting (MAE)
     *
     * The service of mounting.
     */
    case MOUNTING = 'MAE';

    /**
     * Multi-buy promotion (DAK)
     *
     * A code indicating special conditions related to a multi-buy promotion.
     */
    case MULT_PROM = 'DAK';

    /**
     * Mutually defined (ZZZ)
     *
     * A code assigned within a code list to be used on an interim basis and as
     * defined among trading partners until a precise code can be assigned to the
     * code list.
     */
    case MUTU_DEFI = 'ZZZ';

    /**
     * National cheque processing service outside account area (AEX)
     *
     * Service of processing a national cheque outside the ordering customer's
     * bank trading area.
     */
    case NATI_CHEQ_PROC_SERV_OUTS_ACCO_AREA = 'AEX';

    /**
     * National payment service outside account area (AEY)
     *
     * Service of processing a national payment to a beneficiary holding an
     * account outside the trading area of the ordering customer's bank.
     */
    case NATI_PAYM_SERV_OUTS_ACCO_AREA = 'AEY';

    /**
     * National payment service within account area (AEZ)
     *
     * Service of processing a national payment to a beneficiary holding an
     * account within the trading area of the ordering customer's bank.
     */
    case NATI_PAYM_SERV_WITH_ACCO_AREA = 'AEZ';

    /**
     * New product introduction (ADY)
     *
     * A service provided by a buyer when introducing a new product from a
     * suppliers range to the range traded by the buyer.
     */
    case NEW_PROD_INTR = 'ADY';

    /**
     * Non-returnable containers (NAA)
     *
     * The service of providing non-returnable containers.
     */
    case NONR_CONT = 'NAA';

    /**
     * Off-premises (AAF)
     *
     * The service of providing services outside the premises of the provider.
     */
    case OFFPREMISES = 'AAF';

    /**
     * Other services (ADR)
     *
     * A code indicating that other non-specific services are in operation.
     */
    case OTHE_SERV = 'ADR';

    /**
     * Outlays (AAE)
     *
     * The service of providing money for outlays on behalf of a trading partner.
     */
    case OUTLAYS = 'AAE';

    /**
     * Outside cable connectors (OA)
     *
     * The service of providing outside cable connectors.
     */
    case OUTS_CABL_CONN = 'OA';

    /**
     * Overtime (ABD)
     *
     * The service of providing labour beyond the established limit of working
     * hours.
     */
    case OVERTIME = 'ABD';

    /**
     * Packing (PC)
     *
     * The service of packing.
     */
    case PACKING = 'PC';

    /**
     * Painting (ACJ)
     *
     * The service of painting.
     */
    case PAINTING = 'ACJ';

    /**
     * Palletizing (PL)
     *
     * The service of palletizing.
     */
    case PALLETIZING = 'PL';

    /**
     * Partnership (DAL)
     *
     * An allowance or charge related to the establishment and on-going
     * maintenance of a partnership.
     */
    case PARTNERSHIP = 'DAL';

    /**
     * Payroll payment service (CAL)
     *
     * Provision of a payroll payment service.
     */
    case PAYR_PAYM_SERV = 'CAL';

    /**
     * Pensioner service (AET)
     *
     * Special service when the subject is a pensioner.
     */
    case PENS_SERV = 'AET';

    /**
     * Phosphatizing (steel treatment) (PAA)
     *
     * The service of phosphatizing the steel.
     */
    case PHOS_STEE_TREA = 'PAA';

    /**
     * Pick-up (ADT)
     *
     * The service of picking up or collection of goods.
     */
    case PICKUP = 'ADT';

    /**
     * Plating treatment (ACI)
     *
     * The service of providing plating treatment.
     */
    case PLAT_TREA = 'ACI';

    /**
     * Point of sales threshold allowance (DAO)
     *
     * Allowance for reaching or exceeding an agreed sales threshold at the point
     * of sales.
     */
    case POIN_OF_SALE_THRE_ALLO = 'DAO';

    /**
     * Polishing (ACK)
     *
     * The service of polishing.
     */
    case POLISHING = 'ACK';

    /**
     * Polyethylene wrap packing (ABU)
     *
     * The service of packing in polyethylene wrapping.
     */
    case POLY_WRAP_PACK = 'ABU';

    /**
     * Preferential merchandising location (CAR)
     *
     * Service of assigning a preferential location for merchandising.
     */
    case PREF_MERC_LOCA = 'CAR';

    /**
     * Preservation treatment (ACM)
     *
     * The service of preservation treatment.
     */
    case PRES_TREA = 'ACM';

    /**
     * Priming (ACL)
     *
     * The service of priming.
     */
    case PRIMING = 'ACL';

    /**
     * Product mix (ADQ)
     *
     * A code indicating that product mixing services are in operation.
     */
    case PROD_MIX = 'ADQ';

    /**
     * Product take back fee (CAW)
     *
     * The fee the consumer must pay the manufacturer to take back the product.
     */
    case PROD_TAKE_BACK_FEE = 'CAW';

    /**
     * Quality control embargo (CAZ)
     *
     * Instructs the stockholder to withhold distribution of goods which have
     * failed quality control tests.
     */
    case QUAL_CONT_EMBA = 'CAZ';

    /**
     * Quality control held (CAY)
     *
     * Instructs the stockholder to withhold distribution of the goods until the
     * manufacturer has completed a quality control assessment.
     */
    case QUAL_CONT_HELD = 'CAY';

    /**
     * Quality control released (CAX)
     *
     * Informs the stockholder it is free to distribute the quality controlled
     * passed goods.
     */
    case QUAL_CONT_RELE = 'CAX';

    /**
     * Rail wagon hire (RH)
     *
     * The service of providing rail wagons for hire.
     */
    case RAIL_WAGO_HIRE = 'RH';

    /**
     * Re-delivery (RE)
     *
     * The service of re-delivering.
     */
    case REDELIVERY = 'RE';

    /**
     * Refurbishing (RF)
     *
     * The service of refurbishing.
     */
    case REFURBISHING = 'RF';

    /**
     * Rents and leases (AEF)
     *
     * The service of renting and/or leasing.
     */
    case RENT_AND_LEAS = 'AEF';

    /**
     * Repacking (RAB)
     *
     * The service of repacking.
     */
    case REPACKING = 'RAB';

    /**
     * Repair (RAC)
     *
     * The service of repairing.
     */
    case REPAIR = 'RAC';

    /**
     * Repair and return (LAB)
     *
     * The service of repairing and returning.
     */
    case REPA_AND_RETU = 'LAB';

    /**
     * Repair or replacement of broken returnable package (ADN)
     *
     * The service of repairing or replacing a broken returnable package.
     */
    case REPA_OR_REPL_OF_BROK_RETU_PACK = 'ADN';

    /**
     * Restocking (RAF)
     *
     * The service of restocking.
     */
    case RESTOCKING = 'RAF';

    /**
     * Return handling (DAM)
     *
     * An allowance or change related to the handling of returns.
     */
    case RETU_HAND = 'DAM';

    /**
     * Returnable container (RAD)
     *
     * The service of providing returnable containers.
     */
    case RETU_CONT = 'RAD';

    /**
     * Rush delivery (AAT)
     *
     * The service to provide a rush delivery.
     */
    case RUSH_DELI = 'AAT';

    /**
     * Salvaging (SA)
     *
     * The service of salvaging.
     */
    case SALVAGING = 'SA';

    /**
     * Set-up (SU)
     *
     * The service of setting-up.
     */
    case SETUP = 'SU';

    /**
     * Shipping and handling (SAA)
     *
     * The service of shipping and handling.
     */
    case SHIP_AND_HAND = 'SAA';

    /**
     * Shrink-wrap (SG)
     *
     * The service of shrink-wrapping.
     */
    case SHRINKWRAP = 'SG';

    /**
     * Slipsheet (ADL)
     *
     * The service of securing a stack of products on a slipsheet.
     */
    case SLIPSHEET = 'ADL';

    /**
     * Small order processing service (AEL)
     *
     * A service related to the processing of small orders.
     */
    case SMAL_ORDE_PROC_SERV = 'AEL';

    /**
     * Sorting (CAU)
     *
     * The provision of sorting services.
     */
    case SORTING = 'CAU';

    /**
     * Special colour service (CAT)
     *
     * Providing a colour which is different from the default colour.
     */
    case SPEC_COLO_SERV = 'CAT';

    /**
     * Special construction (AAV)
     *
     * The service of providing special construction.
     */
    case SPEC_CONS = 'AAV';

    /**
     * Special finish (SM)
     *
     * The service of providing a special finish.
     */
    case SPEC_FINI = 'SM';

    /**
     * Special handling (SH)
     *
     * The service of special handling.
     */
    case SPEC_HAND = 'SH';

    /**
     * Special packaging (SAD)
     *
     * The service of special packaging.
     */
    case SPEC_PACK = 'SAD';

    /**
     * Split pick-up (YY)
     *
     * The service of providing split pick-up.
     */
    case SPLI_PICK = 'YY';

    /**
     * Stamping (SAE)
     *
     * The service of stamping.
     */
    case STAMPING = 'SAE';

    /**
     * Tank renting (TAB)
     *
     * The service of providing tanks for hire.
     */
    case TANK_RENT = 'TAB';

    /**
     * Technical modification (AAC)
     *
     * The service of making technical modifications to a product.
     */
    case TECH_MODI = 'AAC';

    /**
     * Telecommunication (AAA)
     *
     * The service of providing telecommunication activities and/or faclities.
     */
    case TELECOMMUNICATION = 'AAA';

    /**
     * Testing (TAC)
     *
     * The service of testing.
     */
    case TESTING = 'TAC';

    /**
     * Tooling (ABF)
     *
     * The service of providing specific tooling.
     */
    case TOOLING = 'ABF';

    /**
     * Transfer (ADK)
     *
     * The service of transferring.
     */
    case TRANSFER = 'ADK';

    /**
     * Transportation - third party billing (TT)
     *
     * The service of providing third party billing for transportation.
     */
    case TRAN_THIR_PART_BILL = 'TT';

    /**
     * Transportation by vendor (TV)
     *
     * The service of providing transportation by the vendor.
     */
    case TRAN_BY_VEND = 'TV';

    /**
     * Veterinary inspection service (AES)
     *
     * The service of providing veterinary inspection.
     */
    case VETE_INSP_SERV = 'AES';

    /**
     * Warehousing (WH)
     *
     * The service of storing and handling of goods in a warehouse.
     */
    case WAREHOUSING = 'WH';

    /**
     * Wholesaling discount (DAP)
     *
     * A special discount related to the purchase of products through a
     * wholesaler.
     */
    case WHOL_DISC = 'DAP';

    /**
     * Acceptance commission (3)
     *
     * Fee for the acceptance of draft in documentary credit and collection
     * business which are drawn on us (also to be seen as a kind of 'guarantee
     * commission').
     */
    case ACCE_COMM = '3';

    /**
     * Additional processing costs (75)
     *
     * Costs of additional processing.
     */
    case ADDI_PROC_COST = '75';

    /**
     * Advising commission (6)
     *
     * Fee for advising documentary credits (charged also in case of confirmed
     * credits).
     */
    case ADVI_COMM = '6';

    /**
     * Agreed debit interest charge (59)
     *
     * Charge for agreed debit interest
     */
    case AGRE_DEBI_INTE_CHAR = '59';

    /**
     * Aluminum surcharge (94)
     *
     * Difference between current price and basic value contained in product price
     * in relation to aluminum content.
     */
    case ALUM_SURC = '94';

    /**
     * Amendment commission (2)
     *
     * Fee for amendments in documentary credit and collection business (not
     * extensions and increases of documentary credits).
     */
    case AMEN_COMM = '2';

    /**
     * Attesting charge (76)
     *
     * Costs of official attestation.
     */
    case ATTE_CHAR = '76';

    /**
     * B/L splitting charges (18)
     *
     * Fee for the splitting of bills of lading.
     */
    case BL_SPLI_CHAR = '18';

    /**
     * Bank charges (30)
     *
     * Charges deducted/claimed by other banks involved in the transaction.
     */
    case BANK_CHAR = '30';

    /**
     * Bank charges information (31)
     *
     * Charges not included in the total charge amount i.e. the charges are for
     * information only.
     */
    case BANK_CHAR_INFO = '31';

    /**
     * Bonus for works ahead of schedule (41)
     *
     * Bonus for completing work ahead of schedule.
     */
    case BONU_FOR_WORK_AHEA_OF_SCHE = '41';

    /**
     * Brokerage (29)
     *
     * Brokers commission arising, in trade with foreign currencies.
     */
    case BROKERAGE = '29';

    /**
     * Carbon footprint charge (101)
     *
     * A monetary amount charged for carbon footprint related to a regulatory
     * requirement.
     */
    case CARB_FOOT_CHAR = '101';

    /**
     * Chamber of commerce charge (54)
     *
     * Identifies the charges from the chamber of commerce.
     */
    case CHAM_OF_COMM_CHAR = '54';

    /**
     * Charge for a customer specific finish (69)
     *
     * A charge for the addition of a customer specific finish to a product.
     */
    case CHAR_FOR_A_CUST_SPEC_FINI = '69';

    /**
     * Charge per credit cover (50)
     *
     * Unit charge per credit cover established.
     */
    case CHAR_PER_CRED_COVE = '50';

    /**
     * Charge per unused credit cover (51)
     *
     * Unit charge per unused credit cover.
     */
    case CHAR_PER_UNUS_CRED_COVE = '51';

    /**
     * Collection commission (15)
     *
     * Fee for settling collections on the basis of 'documents against payments'.
     */
    case COLL_COMM = '15';

    /**
     * Commission for obtaining acceptance (4)
     *
     * Fee for obtaining an acceptance under collections on the basis of
     * 'documents against acceptance'.
     */
    case COMM_FOR_OBTA_ACCE = '4';

    /**
     * Commission for opening irrevocable documentary credits (21)
     *
     * Fee for opening irrevocable documentary credits. This fee is a kind of
     * 'Guarantee commission' as compensation for the commitment into which the
     * bank have entered on the customers behalf; similar to confirmation
     * commission, acceptance commission.
     */
    case COMM_FOR_OPEN_IRRE_DOCU_CRED = '21';

    /**
     * Commission for release of goods (14)
     *
     * Commission for the release of goods sent to the bank.
     */
    case COMM_FOR_RELE_OF_GOOD = '14';

    /**
     * Commission for taking up documents (9)
     *
     * Fee charged to the foreign bank for the processing of documentary credit.
     */
    case COMM_FOR_TAKI_UP_DOCU = '9';

    /**
     * Commission on delivery (5)
     *
     * Fee for delivery of documents without corresponding payment.
     */
    case COMM_ON_DELI = '5';

    /**
     * Confirmation commission (7)
     *
     * Fee for confirmation of credit.
     */
    case CONF_COMM = '7';

    /**
     * Contractual retention (46)
     *
     * Contractual retention charge.
     */
    case CONT_RETE = '46';

    /**
     * Copper surcharge (87)
     *
     * Difference between current price and basic value contained in product price
     * in relation to copper content.
     */
    case COPP_SURC = '87';

    /**
     * Courier fee (32)
     *
     * Fee for use of courier service.
     */
    case COUR_FEE = '32';

    /**
     * Deferred payment commission (8)
     *
     * Fee for the deferred payment period under documentary credits confirmed by
     * bank. This fee are charges for the period from presentation of the document
     * until due date of payment.
     */
    case DEFE_PAYM_COMM = '8';

    /**
     * Discount (95)
     *
     * A reduction from a usual or list price.
     */
    case DISCOUNT = '95';

    /**
     * Discrepancy fee (12)
     *
     * Fee charged to the foreign bank for discrepancies in credit documents.
     */
    case DISC_FEE = '12';

    /**
     * Domicilation commission (13)
     *
     * Fee for the domicilation of bills with the bank.
     */
    case DOMI_COMM = '13';

    /**
     * Due to military status (62)
     *
     * Allowance granted because of the military status.
     */
    case DUE_TO_MILI_STAT = '62';

    /**
     * Due to work accident (63)
     *
     * Allowance granted to a victim of a work accident.
     */
    case DUE_TO_WORK_ACCI = '63';

    /**
     * End-of-range discount (68)
     *
     * A discount given for the purchase of an end-of-range product.
     */
    case ENDO_DISC = '68';

    /**
     * Factoring commission (53)
     *
     * Commission charged for factoring services.
     */
    case FACT_COMM = '53';

    /**
     * Fax advice charge (61)
     *
     * Charge for fax advice.
     */
    case FAX_ADVI_CHAR = '61';

    /**
     * Fee for payment under reserve (11)
     *
     * Fee charged to the customer for discrepancies in credit documents in the
     * case of which the bank have to stipulate payment under reserve.
     */
    case FEE_FOR_PAYM_UNDE_RESE = '11';

    /**
     * Fixed long term (102)
     *
     * A fixed long term allowance or charge.
     */
    case FIXE_LONG_TERM = '102';

    /**
     * Foreign exchange charges (58)
     *
     * Charges for foreign exchange.
     */
    case FORE_EXCH_CHAR = '58';

    /**
     * Freight charges (79)
     *
     * Amount to be paid for moving goods, by whatever means, from one place to
     * another.
     */
    case FREI_CHAR = '79';

    /**
     * Gold surcharge (86)
     *
     * Difference between current price and basic value contained in product price
     * in relation to gold content.
     */
    case GOLD_SURC = '86';

    /**
     * Guarantee commission (26)
     *
     * Commission for drawing up guaranties.
     */
    case GUAR_COMM = '26';

    /**
     * Handling commission (1)
     *
     * Fee for the processing of documentary credit, collection and payment which
     * are charged to the customer.
     */
    case HAND_COMM = '1';

    /**
     * Incoterm discount (70)
     *
     * A discount given for a specified Incoterm.
     */
    case INCO_DISC = '70';

    /**
     * Insurance (96)
     *
     * Charge for insurance.
     */
    case INSURANCE = '96';

    /**
     * Interest (49)
     *
     * Cost of using money.
     */
    case INTEREST = '49';

    /**
     * Interest on arrears (48)
     *
     * Interest for late payment.
     */
    case INTE_ON_ARRE = '48';

    /**
     * Job-order production costs (73)
     *
     * Costs of job-order production.
     */
    case JOBO_PROD_COST = '73';

    /**
     * Lead surcharge (89)
     *
     * Difference between current price and basic value contained in product price
     * in relation to lead content.
     */
    case LEAD_SURC = '89';

    /**
     * Loading charge (82)
     *
     * Charge for loading.
     */
    case LOAD_CHAR = '82';

    /**
     * Manufacturer's consumer discount (60)
     *
     * A discount given by the manufacturer which should be passed on to the
     * consumer.
     */
    case MANU_CONS_DISC = '60';

    /**
     * Material surcharge (special materials) (98)
     *
     * Surcharge for (special) materials.
     */
    case MATE_SURC_SPEC_MATE = '98';

    /**
     * Material surcharge/deduction (88)
     *
     * Surcharge/deduction, calculated for higher/ lower material's consumption.
     */
    case MATE_SURC = '88';

    /**
     * Minimum commission (52)
     *
     * Minimum commission charge.
     */
    case MINI_COMM = '52';

    /**
     * Minimum order / minimum billing charge (97)
     *
     * Charge for minimum order or minimum billing.
     */
    case MINI_ORDE_MINI_BILL_CHAR = '97';

    /**
     * Miscellaneous charges (57)
     *
     * Not specifically defined charges.
     */
    case MISC_CHAR = '57';

    /**
     * Model charges (24)
     *
     * Fee for decoding telex messages.
     */
    case MODE_CHAR = '24';

    /**
     * Negotiation commission (16)
     *
     * Fee for the purchase of documents under sight credit for the first ten
     * days.
     */
    case NEGO_COMM = '16';

    /**
     * New outlet discount (66)
     *
     * A discount given at the occasion of the opening of a new outlet.
     */
    case NEW_OUTL_DISC = '66';

    /**
     * Off-premises costs (74)
     *
     * Expenses for non-local activities.
     */
    case OFFP_COST = '74';

    /**
     * Opening commission (10)
     *
     * Fee for opening revocable documentary credit.
     */
    case OPEN_COMM = '10';

    /**
     * Other bonus (42)
     *
     * Bonus earned for other reasons.
     */
    case OTHE_BONU = '42';

    /**
     * Other penalties (40)
     *
     * Penalty imposed for other reasons.
     */
    case OTHE_PENA = '40';

    /**
     * Other retentions (47)
     *
     * Retention charge not otherwise specified.
     */
    case OTHE_RETE = '47';

    /**
     * Packing charge (80)
     *
     * Charge for packing.
     */
    case PACK_CHAR = '80';

    /**
     * Penalty for execution of works behind schedule (39)
     *
     * Penalty imposed when the execution of works is behind schedule.
     */
    case PENA_FOR_EXEC_OF_WORK_BEHI_SCHE = '39';

    /**
     * Penalty for late delivery of documents (37)
     *
     * Penalty imposed when documents are delivered late.
     */
    case PENA_FOR_LATE_DELI_OF_DOCU = '37';

    /**
     * Penalty for late delivery of valuation of works (38)
     *
     * Penalty imposed when valuation of works is delivered late.
     */
    case PENA_FOR_LATE_DELI_OF_VALU_OF_WORK = '38';

    /**
     * Phone fee (33)
     *
     * Fee for use of phone.
     */
    case PHON_FEE = '33';

    /**
     * Platinum surcharge (91)
     *
     * Difference between current price and basic value contained in product price
     * in relation to platinum content.
     */
    case PLAT_SURC = '91';

    /**
     * Postage fee (34)
     *
     * Fee for postage.
     */
    case POST_FEE = '34';

    /**
     * Pre-advice commission (22)
     *
     * Fee for the pre-advice of a documentary credit.
     */
    case PREA_COMM = '22';

    /**
     * Price index surcharge (90)
     *
     * Higher/lower price, resulting from change in costs between the times of
     * making offer and delivery.
     */
    case PRIC_INDE_SURC = '90';

    /**
     * Pro rata retention (45)
     *
     * Proportional retention charge.
     */
    case PRO_RATA_RETE = '45';

    /**
     * Production error discount (65)
     *
     * A discount given for the purchase of a product with a production error.
     */
    case PROD_ERRO_DISC = '65';

    /**
     * Project management cost (44)
     *
     * Cost for project management.
     */
    case PROJ_MANA_COST = '44';

    /**
     * Reimbursement commission (27)
     *
     * Fee for reimbursement of, for example, documentary credits.
     */
    case REIM_COMM = '27';

    /**
     * Repair charge (81)
     *
     * Charge for repair.
     */
    case REPA_CHAR = '81';

    /**
     * Return commission (17)
     *
     * Fee for cheques, bills and collections returned unpaid and/or recalled.
     */
    case RETU_COMM = '17';

    /**
     * Risk commission (25)
     *
     * Commission in addition to the confirmation commission for documentary
     * credits from sensitive countries.
     */
    case RISK_COMM = '25';

    /**
     * Rush delivery surcharge (77)
     *
     * Charge for increased delivery speed.
     */
    case RUSH_DELI_SURC = '77';

    /**
     * S.W.I.F.T. fee (35)
     *
     * Fee for use of S.W.I.F.T.
     */
    case SWIF_FEE = '35';

    /**
     * Sample discount (67)
     *
     * A discount given for the purchase of a sample of a product.
     */
    case SAMP_DISC = '67';

    /**
     * Setup charge (83)
     *
     * Charge for setup.
     */
    case SETU_CHAR = '83';

    /**
     * Silver surcharge (92)
     *
     * Difference between current price and basic value contained in product price
     * in relation to silver content.
     */
    case SILV_SURC = '92';

    /**
     * Special agreement (64)
     *
     * An allowance or charge as specified in a special agreement.
     */
    case SPEC_AGRE = '64';

    /**
     * Special construction costs (78)
     *
     * Charge for costs incurred as result of special constructions.
     */
    case SPEC_CONS_COST = '78';

    /**
     * Special rebate (100)
     *
     * A return of part of an amount paid for goods or services, serving as a
     * reduction or discount.
     */
    case SPEC_REBA = '100';

    /**
     * Stamp duty (28)
     *
     * Tax payable on bills in accordance with national bill of exchange
     * legislation.
     */
    case STAM_DUTY = '28';

    /**
     * Standard (104)
     *
     * The standard available allowance or charge.
     */
    case STANDARD = '104';

    /**
     * Supervisory commission (23)
     *
     * Fee for the supervising unconfirmed documentary credits with a deferred
     * payment period.
     */
    case SUPE_COMM = '23';

    /**
     * Surcharge (99)
     *
     * An additional amount added to the usual charge.
     */
    case SURCHARGE = '99';

    /**
     * Technical modification costs (72)
     *
     * Costs for technical modifications to a product.
     */
    case TECH_MODI_COST = '72';

    /**
     * Telex fee (36)
     *
     * Fee for telex.
     */
    case TELE_FEE = '36';

    /**
     * Temporary (103)
     *
     * A temporary allowance or charge.
     */
    case TEMPORARY = '103';

    /**
     * Testing charge (84)
     *
     * Charge for testing.
     */
    case TEST_CHAR = '84';

    /**
     * Transfer charges (55)
     *
     * Charges for transfer.
     */
    case TRAN_CHAR = '55';

    /**
     * Transfer commission (20)
     *
     * Fee for the transfer of transferable documentary credits.
     */
    case TRAN_COMM = '20';

    /**
     * Trust commission (19)
     *
     * Fee for the handling on a fiduciary basis of imported goods that have been
     * warehoused.
     */
    case TRUS_COMM = '19';

    /**
     * Warehousing charge (85)
     *
     * Charge for storage and handling.
     */
    case WARE_CHAR = '85';

    /**
     * Withheld taxes and social security contributions (106)
     *
     * The amount of taxes and contributions for social security, that is
     * subtracted from the payable amount as it is to be paid separately.
     */
    case WITH_TAXE_AND_SOCI_SECU_CONT = '106';

    /**
     * Wolfram surcharge (93)
     *
     * Difference between current price and basic value contained in product price
     * in relation to wolfram content.
     */
    case WOLF_SURC = '93';

    /**
     * Yearly turnover (105)
     *
     * An allowance or charge based on yearly turnover.
     */
    case YEAR_TURN = '105';

    /**
     * Returns the caption of the code
     *
     * @return string
     * @codeCoverageIgnore
     */
    final public function getCaption(): string
    {
        return match ($this) {
            InvoiceSuiteCodelistAllowanceChargeCodes::ACCEPTANCE => 'Acceptance',
            InvoiceSuiteCodelistAllowanceChargeCodes::ADDI_PACK => 'Additional packaging',
            InvoiceSuiteCodelistAllowanceChargeCodes::ADDI_PROC => 'Additional processing',
            InvoiceSuiteCodelistAllowanceChargeCodes::ADJUSTMENTS => 'Adjustments',
            InvoiceSuiteCodelistAllowanceChargeCodes::ADVERTISING => 'Advertising',
            InvoiceSuiteCodelistAllowanceChargeCodes::AIRBAG => 'Airbag',
            InvoiceSuiteCodelistAllowanceChargeCodes::AIRC_REFU => 'Aircraft refueling',
            InvoiceSuiteCodelistAllowanceChargeCodes::AIRP_FACI => 'Airport facilities',
            InvoiceSuiteCodelistAllowanceChargeCodes::ALLO_TRAN_TO_THE_CONS => 'Allowance transferable to the consumer',
            InvoiceSuiteCodelistAllowanceChargeCodes::ASSO_ALLO => 'Assortment allowance',
            InvoiceSuiteCodelistAllowanceChargeCodes::ATTESTING => 'Attesting',
            InvoiceSuiteCodelistAllowanceChargeCodes::AUTHENTICATION => 'Authentication',
            InvoiceSuiteCodelistAllowanceChargeCodes::BATT_COLL_AND_RECY => 'Battery collection and recycling',
            InvoiceSuiteCodelistAllowanceChargeCodes::BILA_AGRE_SERV => 'Bilateral agreement service',
            InvoiceSuiteCodelistAllowanceChargeCodes::BILL_OF_LADI => 'Bill of lading',
            InvoiceSuiteCodelistAllowanceChargeCodes::BINDING => 'Binding',
            InvoiceSuiteCodelistAllowanceChargeCodes::CAR_LOAD => 'Car loading',
            InvoiceSuiteCodelistAllowanceChargeCodes::CARR_COUN => 'Carrier count',
            InvoiceSuiteCodelistAllowanceChargeCodes::CARTAGE => 'Cartage',
            InvoiceSuiteCodelistAllowanceChargeCodes::CART_PACK => 'Carton packing',
            InvoiceSuiteCodelistAllowanceChargeCodes::CASH_ON_DELI => 'Cash on delivery',
            InvoiceSuiteCodelistAllowanceChargeCodes::CASH_TRAN => 'Cash transportation',
            InvoiceSuiteCodelistAllowanceChargeCodes::CATALOGUING => 'Cataloguing',
            InvoiceSuiteCodelistAllowanceChargeCodes::CERT_OF_CONF => 'Certificate of conformance',
            InvoiceSuiteCodelistAllowanceChargeCodes::CERT_OF_ORIG => 'Certificate of origin',
            InvoiceSuiteCodelistAllowanceChargeCodes::CERTIFICATION => 'Certification',
            InvoiceSuiteCodelistAllowanceChargeCodes::CHEQ_GENE => 'Cheque generation',
            InvoiceSuiteCodelistAllowanceChargeCodes::CHRO_ILLN => 'Chronic illness',
            InvoiceSuiteCodelistAllowanceChargeCodes::CIGA_STAM => 'Cigarette stamping',
            InvoiceSuiteCodelistAllowanceChargeCodes::CLEANING => 'Cleaning',
            InvoiceSuiteCodelistAllowanceChargeCodes::CLER_OR_ADMI_SERV => 'Clerical or administrative services',
            InvoiceSuiteCodelistAllowanceChargeCodes::COLL_AND_RECY => 'Collection and recycling',
            InvoiceSuiteCodelistAllowanceChargeCodes::COMB_ALL_SAME_DAY_SHIP => 'Combine all same day shipment',
            InvoiceSuiteCodelistAllowanceChargeCodes::COMP_STOR => 'Compulsory storage',
            InvoiceSuiteCodelistAllowanceChargeCodes::CONCESSION => 'Concession',
            InvoiceSuiteCodelistAllowanceChargeCodes::CONS_UNLO => 'Consignee unload',
            InvoiceSuiteCodelistAllowanceChargeCodes::CONSOLIDATION => 'Consolidation',
            InvoiceSuiteCodelistAllowanceChargeCodes::CONS_SERV => 'Consular service',
            InvoiceSuiteCodelistAllowanceChargeCodes::CONTAINERISATION => 'Containerisation',
            InvoiceSuiteCodelistAllowanceChargeCodes::COPY_FEE_COLL => 'Copyright fee collection',
            InvoiceSuiteCodelistAllowanceChargeCodes::COUN_AND_RECO => 'Count and recount',
            InvoiceSuiteCodelistAllowanceChargeCodes::CRANE => 'Crane',
            InvoiceSuiteCodelistAllowanceChargeCodes::CUST_COLL => 'Customer collection',
            InvoiceSuiteCodelistAllowanceChargeCodes::CUTTING => 'Cutting',
            InvoiceSuiteCodelistAllowanceChargeCodes::DEAL_ALLO => 'Dealer allowance',
            InvoiceSuiteCodelistAllowanceChargeCodes::DEBT_BOUN => 'Debtor bound',
            InvoiceSuiteCodelistAllowanceChargeCodes::DELIVERY => 'Delivery',
            InvoiceSuiteCodelistAllowanceChargeCodes::DIRE_DELI => 'Direct delivery',
            InvoiceSuiteCodelistAllowanceChargeCodes::DISCONNECT => 'Disconnect',
            InvoiceSuiteCodelistAllowanceChargeCodes::DISTRIBUTION => 'Distribution',
            InvoiceSuiteCodelistAllowanceChargeCodes::DIVERSION => 'Diversion',
            InvoiceSuiteCodelistAllowanceChargeCodes::DOCU_CRED_TRAN_COMM => 'Documentary credits transfer commission',
            InvoiceSuiteCodelistAllowanceChargeCodes::DRIV_ASSI_UNLO => 'Driver assigned unloading',
            InvoiceSuiteCodelistAllowanceChargeCodes::DROP_DOCK => 'Drop dock',
            InvoiceSuiteCodelistAllowanceChargeCodes::DROP_YARD => 'Drop yard',
            InvoiceSuiteCodelistAllowanceChargeCodes::DUNNAGE => 'Dunnage',
            InvoiceSuiteCodelistAllowanceChargeCodes::EFFI_LOGI => 'Efficient logistics',
            InvoiceSuiteCodelistAllowanceChargeCodes::ENAM_TREA => 'Enamelling treatment',
            InvoiceSuiteCodelistAllowanceChargeCodes::ENGRAVING => 'Engraving',
            InvoiceSuiteCodelistAllowanceChargeCodes::ENVI_CLEA_SERV => 'Environmental clean-up service',
            InvoiceSuiteCodelistAllowanceChargeCodes::ENVI_PROT_SERV => 'Environmental protection service',
            InvoiceSuiteCodelistAllowanceChargeCodes::EXCH_RATE_GUAR => 'Exchange rate guarantee',
            InvoiceSuiteCodelistAllowanceChargeCodes::EXPEDITING => 'Expediting',
            InvoiceSuiteCodelistAllowanceChargeCodes::FABRICATION => 'Fabrication',
            InvoiceSuiteCodelistAllowanceChargeCodes::FILLINGHANDLING => 'Filling/handling',
            InvoiceSuiteCodelistAllowanceChargeCodes::FINANCING => 'Financing',
            InvoiceSuiteCodelistAllowanceChargeCodes::FITTING => 'Fitting',
            InvoiceSuiteCodelistAllowanceChargeCodes::FREI_EQUA => 'Freight equalization',
            InvoiceSuiteCodelistAllowanceChargeCodes::FREI_EXTR_HAND => 'Freight extraordinary handling',
            InvoiceSuiteCodelistAllowanceChargeCodes::FREI_SERV => 'Freight service',
            InvoiceSuiteCodelistAllowanceChargeCodes::FUEL_REMO => 'Fuel removal',
            InvoiceSuiteCodelistAllowanceChargeCodes::FUEL_SHIP_INTO_STOR => 'Fuel shipped into storage',
            InvoiceSuiteCodelistAllowanceChargeCodes::GRINDING => 'Grinding',
            InvoiceSuiteCodelistAllowanceChargeCodes::GROW_OF_BUSI => 'Growth of business',
            InvoiceSuiteCodelistAllowanceChargeCodes::GUARANTEE => 'Guarantee',
            InvoiceSuiteCodelistAllowanceChargeCodes::HANDLING => 'Handling',
            InvoiceSuiteCodelistAllowanceChargeCodes::HAND_OF_HAZA_CARG => 'Handling of hazardous cargo',
            InvoiceSuiteCodelistAllowanceChargeCodes::HEAT_TREA => 'Heat treatment',
            InvoiceSuiteCodelistAllowanceChargeCodes::HESS_WRAP => 'Hessian wrapped',
            InvoiceSuiteCodelistAllowanceChargeCodes::HOIS_AND_HAUL => 'Hoisting and hauling',
            InvoiceSuiteCodelistAllowanceChargeCodes::HOME_BANK_SERV => 'Home banking service',
            InvoiceSuiteCodelistAllowanceChargeCodes::HOSE => 'Hose',
            InvoiceSuiteCodelistAllowanceChargeCodes::INSI_DELI => 'Inside delivery',
            InvoiceSuiteCodelistAllowanceChargeCodes::INSPECTION => 'Inspection',
            InvoiceSuiteCodelistAllowanceChargeCodes::INSTALLATION => 'Installation',
            InvoiceSuiteCodelistAllowanceChargeCodes::INST_AND_TRAI => 'Installation and training',
            InvoiceSuiteCodelistAllowanceChargeCodes::INST_AND_WARR => 'Installation and warranty',
            InvoiceSuiteCodelistAllowanceChargeCodes::INSU_BROK_SERV => 'Insurance brokerage service',
            InvoiceSuiteCodelistAllowanceChargeCodes::INTO_PLAN => 'Into plane',
            InvoiceSuiteCodelistAllowanceChargeCodes::INTR_ALLO => 'Introduction allowance',
            InvoiceSuiteCodelistAllowanceChargeCodes::INVO_WITH_SHIP => 'Invoice with shipment',
            InvoiceSuiteCodelistAllowanceChargeCodes::INVOICING => 'Invoicing',
            InvoiceSuiteCodelistAllowanceChargeCodes::JOBO_PROD => 'Job-order production',
            InvoiceSuiteCodelistAllowanceChargeCodes::KOSHERING => 'Koshering',
            InvoiceSuiteCodelistAllowanceChargeCodes::LABELLING => 'Labelling',
            InvoiceSuiteCodelistAllowanceChargeCodes::LABOUR => 'Labour',
            InvoiceSuiteCodelistAllowanceChargeCodes::LAYOUTDESIGN => 'Layout/design',
            InvoiceSuiteCodelistAllowanceChargeCodes::LEGALISATION => 'Legalisation',
            InvoiceSuiteCodelistAllowanceChargeCodes::LOADING => 'Loading',
            InvoiceSuiteCodelistAllowanceChargeCodes::LOCA_DIFF => 'Location differential',
            InvoiceSuiteCodelistAllowanceChargeCodes::MAIL_INVO => 'Mail invoice',
            InvoiceSuiteCodelistAllowanceChargeCodes::MAIL_INVO_TO_EACH_LOCA => 'Mail invoice to each location',
            InvoiceSuiteCodelistAllowanceChargeCodes::MEDI_FREE_PASS_HOLD => 'Medicine free pass holder',
            InvoiceSuiteCodelistAllowanceChargeCodes::MERCHANDISING => 'Merchandising',
            InvoiceSuiteCodelistAllowanceChargeCodes::MINI_ORDE_NOT_FULF_CHAR => 'Minimum order not fulfilled charge',
            InvoiceSuiteCodelistAllowanceChargeCodes::MISCELLANEOUS => 'Miscellaneous',
            InvoiceSuiteCodelistAllowanceChargeCodes::MISC_TREA => 'Miscellaneous treatment',
            InvoiceSuiteCodelistAllowanceChargeCodes::MOUNTING => 'Mounting',
            InvoiceSuiteCodelistAllowanceChargeCodes::MULT_PROM => 'Multi-buy promotion',
            InvoiceSuiteCodelistAllowanceChargeCodes::MUTU_DEFI => 'Mutually defined',
            InvoiceSuiteCodelistAllowanceChargeCodes::NATI_CHEQ_PROC_SERV_OUTS_ACCO_AREA => 'National cheque processing service outside account area',
            InvoiceSuiteCodelistAllowanceChargeCodes::NATI_PAYM_SERV_OUTS_ACCO_AREA => 'National payment service outside account area',
            InvoiceSuiteCodelistAllowanceChargeCodes::NATI_PAYM_SERV_WITH_ACCO_AREA => 'National payment service within account area',
            InvoiceSuiteCodelistAllowanceChargeCodes::NEW_PROD_INTR => 'New product introduction',
            InvoiceSuiteCodelistAllowanceChargeCodes::NONR_CONT => 'Non-returnable containers',
            InvoiceSuiteCodelistAllowanceChargeCodes::OFFPREMISES => 'Off-premises',
            InvoiceSuiteCodelistAllowanceChargeCodes::OTHE_SERV => 'Other services',
            InvoiceSuiteCodelistAllowanceChargeCodes::OUTLAYS => 'Outlays',
            InvoiceSuiteCodelistAllowanceChargeCodes::OUTS_CABL_CONN => 'Outside cable connectors',
            InvoiceSuiteCodelistAllowanceChargeCodes::OVERTIME => 'Overtime',
            InvoiceSuiteCodelistAllowanceChargeCodes::PACKING => 'Packing',
            InvoiceSuiteCodelistAllowanceChargeCodes::PAINTING => 'Painting',
            InvoiceSuiteCodelistAllowanceChargeCodes::PALLETIZING => 'Palletizing',
            InvoiceSuiteCodelistAllowanceChargeCodes::PARTNERSHIP => 'Partnership',
            InvoiceSuiteCodelistAllowanceChargeCodes::PAYR_PAYM_SERV => 'Payroll payment service',
            InvoiceSuiteCodelistAllowanceChargeCodes::PENS_SERV => 'Pensioner service',
            InvoiceSuiteCodelistAllowanceChargeCodes::PHOS_STEE_TREA => 'Phosphatizing (steel treatment)',
            InvoiceSuiteCodelistAllowanceChargeCodes::PICKUP => 'Pick-up',
            InvoiceSuiteCodelistAllowanceChargeCodes::PLAT_TREA => 'Plating treatment',
            InvoiceSuiteCodelistAllowanceChargeCodes::POIN_OF_SALE_THRE_ALLO => 'Point of sales threshold allowance',
            InvoiceSuiteCodelistAllowanceChargeCodes::POLISHING => 'Polishing',
            InvoiceSuiteCodelistAllowanceChargeCodes::POLY_WRAP_PACK => 'Polyethylene wrap packing',
            InvoiceSuiteCodelistAllowanceChargeCodes::PREF_MERC_LOCA => 'Preferential merchandising location',
            InvoiceSuiteCodelistAllowanceChargeCodes::PRES_TREA => 'Preservation treatment',
            InvoiceSuiteCodelistAllowanceChargeCodes::PRIMING => 'Priming',
            InvoiceSuiteCodelistAllowanceChargeCodes::PROD_MIX => 'Product mix',
            InvoiceSuiteCodelistAllowanceChargeCodes::PROD_TAKE_BACK_FEE => 'Product take back fee',
            InvoiceSuiteCodelistAllowanceChargeCodes::QUAL_CONT_EMBA => 'Quality control embargo',
            InvoiceSuiteCodelistAllowanceChargeCodes::QUAL_CONT_HELD => 'Quality control held',
            InvoiceSuiteCodelistAllowanceChargeCodes::QUAL_CONT_RELE => 'Quality control released',
            InvoiceSuiteCodelistAllowanceChargeCodes::RAIL_WAGO_HIRE => 'Rail wagon hire',
            InvoiceSuiteCodelistAllowanceChargeCodes::REDELIVERY => 'Re-delivery',
            InvoiceSuiteCodelistAllowanceChargeCodes::REFURBISHING => 'Refurbishing',
            InvoiceSuiteCodelistAllowanceChargeCodes::RENT_AND_LEAS => 'Rents and leases',
            InvoiceSuiteCodelistAllowanceChargeCodes::REPACKING => 'Repacking',
            InvoiceSuiteCodelistAllowanceChargeCodes::REPAIR => 'Repair',
            InvoiceSuiteCodelistAllowanceChargeCodes::REPA_AND_RETU => 'Repair and return',
            InvoiceSuiteCodelistAllowanceChargeCodes::REPA_OR_REPL_OF_BROK_RETU_PACK => 'Repair or replacement of broken returnable package',
            InvoiceSuiteCodelistAllowanceChargeCodes::RESTOCKING => 'Restocking',
            InvoiceSuiteCodelistAllowanceChargeCodes::RETU_HAND => 'Return handling',
            InvoiceSuiteCodelistAllowanceChargeCodes::RETU_CONT => 'Returnable container',
            InvoiceSuiteCodelistAllowanceChargeCodes::RUSH_DELI => 'Rush delivery',
            InvoiceSuiteCodelistAllowanceChargeCodes::SALVAGING => 'Salvaging',
            InvoiceSuiteCodelistAllowanceChargeCodes::SETUP => 'Set-up',
            InvoiceSuiteCodelistAllowanceChargeCodes::SHIP_AND_HAND => 'Shipping and handling',
            InvoiceSuiteCodelistAllowanceChargeCodes::SHRINKWRAP => 'Shrink-wrap',
            InvoiceSuiteCodelistAllowanceChargeCodes::SLIPSHEET => 'Slipsheet',
            InvoiceSuiteCodelistAllowanceChargeCodes::SMAL_ORDE_PROC_SERV => 'Small order processing service',
            InvoiceSuiteCodelistAllowanceChargeCodes::SORTING => 'Sorting',
            InvoiceSuiteCodelistAllowanceChargeCodes::SPEC_COLO_SERV => 'Special colour service',
            InvoiceSuiteCodelistAllowanceChargeCodes::SPEC_CONS => 'Special construction',
            InvoiceSuiteCodelistAllowanceChargeCodes::SPEC_FINI => 'Special finish',
            InvoiceSuiteCodelistAllowanceChargeCodes::SPEC_HAND => 'Special handling',
            InvoiceSuiteCodelistAllowanceChargeCodes::SPEC_PACK => 'Special packaging',
            InvoiceSuiteCodelistAllowanceChargeCodes::SPLI_PICK => 'Split pick-up',
            InvoiceSuiteCodelistAllowanceChargeCodes::STAMPING => 'Stamping',
            InvoiceSuiteCodelistAllowanceChargeCodes::TANK_RENT => 'Tank renting',
            InvoiceSuiteCodelistAllowanceChargeCodes::TECH_MODI => 'Technical modification',
            InvoiceSuiteCodelistAllowanceChargeCodes::TELECOMMUNICATION => 'Telecommunication',
            InvoiceSuiteCodelistAllowanceChargeCodes::TESTING => 'Testing',
            InvoiceSuiteCodelistAllowanceChargeCodes::TOOLING => 'Tooling',
            InvoiceSuiteCodelistAllowanceChargeCodes::TRANSFER => 'Transfer',
            InvoiceSuiteCodelistAllowanceChargeCodes::TRAN_THIR_PART_BILL => 'Transportation - third party billing',
            InvoiceSuiteCodelistAllowanceChargeCodes::TRAN_BY_VEND => 'Transportation by vendor',
            InvoiceSuiteCodelistAllowanceChargeCodes::VETE_INSP_SERV => 'Veterinary inspection service',
            InvoiceSuiteCodelistAllowanceChargeCodes::WAREHOUSING => 'Warehousing',
            InvoiceSuiteCodelistAllowanceChargeCodes::WHOL_DISC => 'Wholesaling discount',
            InvoiceSuiteCodelistAllowanceChargeCodes::ACCE_COMM => 'Acceptance commission',
            InvoiceSuiteCodelistAllowanceChargeCodes::ADDI_PROC_COST => 'Additional processing costs',
            InvoiceSuiteCodelistAllowanceChargeCodes::ADVI_COMM => 'Advising commission',
            InvoiceSuiteCodelistAllowanceChargeCodes::AGRE_DEBI_INTE_CHAR => 'Agreed debit interest charge',
            InvoiceSuiteCodelistAllowanceChargeCodes::ALUM_SURC => 'Aluminum surcharge',
            InvoiceSuiteCodelistAllowanceChargeCodes::AMEN_COMM => 'Amendment commission',
            InvoiceSuiteCodelistAllowanceChargeCodes::ATTE_CHAR => 'Attesting charge',
            InvoiceSuiteCodelistAllowanceChargeCodes::BL_SPLI_CHAR => 'B/L splitting charges',
            InvoiceSuiteCodelistAllowanceChargeCodes::BANK_CHAR => 'Bank charges',
            InvoiceSuiteCodelistAllowanceChargeCodes::BANK_CHAR_INFO => 'Bank charges information',
            InvoiceSuiteCodelistAllowanceChargeCodes::BONU_FOR_WORK_AHEA_OF_SCHE => 'Bonus for works ahead of schedule',
            InvoiceSuiteCodelistAllowanceChargeCodes::BROKERAGE => 'Brokerage',
            InvoiceSuiteCodelistAllowanceChargeCodes::CARB_FOOT_CHAR => 'Carbon footprint charge',
            InvoiceSuiteCodelistAllowanceChargeCodes::CHAM_OF_COMM_CHAR => 'Chamber of commerce charge',
            InvoiceSuiteCodelistAllowanceChargeCodes::CHAR_FOR_A_CUST_SPEC_FINI => 'Charge for a customer specific finish',
            InvoiceSuiteCodelistAllowanceChargeCodes::CHAR_PER_CRED_COVE => 'Charge per credit cover',
            InvoiceSuiteCodelistAllowanceChargeCodes::CHAR_PER_UNUS_CRED_COVE => 'Charge per unused credit cover',
            InvoiceSuiteCodelistAllowanceChargeCodes::COLL_COMM => 'Collection commission',
            InvoiceSuiteCodelistAllowanceChargeCodes::COMM_FOR_OBTA_ACCE => 'Commission for obtaining acceptance',
            InvoiceSuiteCodelistAllowanceChargeCodes::COMM_FOR_OPEN_IRRE_DOCU_CRED => 'Commission for opening irrevocable documentary credits',
            InvoiceSuiteCodelistAllowanceChargeCodes::COMM_FOR_RELE_OF_GOOD => 'Commission for release of goods',
            InvoiceSuiteCodelistAllowanceChargeCodes::COMM_FOR_TAKI_UP_DOCU => 'Commission for taking up documents',
            InvoiceSuiteCodelistAllowanceChargeCodes::COMM_ON_DELI => 'Commission on delivery',
            InvoiceSuiteCodelistAllowanceChargeCodes::CONF_COMM => 'Confirmation commission',
            InvoiceSuiteCodelistAllowanceChargeCodes::CONT_RETE => 'Contractual retention',
            InvoiceSuiteCodelistAllowanceChargeCodes::COPP_SURC => 'Copper surcharge',
            InvoiceSuiteCodelistAllowanceChargeCodes::COUR_FEE => 'Courier fee',
            InvoiceSuiteCodelistAllowanceChargeCodes::DEFE_PAYM_COMM => 'Deferred payment commission',
            InvoiceSuiteCodelistAllowanceChargeCodes::DISCOUNT => 'Discount',
            InvoiceSuiteCodelistAllowanceChargeCodes::DISC_FEE => 'Discrepancy fee',
            InvoiceSuiteCodelistAllowanceChargeCodes::DOMI_COMM => 'Domicilation commission',
            InvoiceSuiteCodelistAllowanceChargeCodes::DUE_TO_MILI_STAT => 'Due to military status',
            InvoiceSuiteCodelistAllowanceChargeCodes::DUE_TO_WORK_ACCI => 'Due to work accident',
            InvoiceSuiteCodelistAllowanceChargeCodes::ENDO_DISC => 'End-of-range discount',
            InvoiceSuiteCodelistAllowanceChargeCodes::FACT_COMM => 'Factoring commission',
            InvoiceSuiteCodelistAllowanceChargeCodes::FAX_ADVI_CHAR => 'Fax advice charge',
            InvoiceSuiteCodelistAllowanceChargeCodes::FEE_FOR_PAYM_UNDE_RESE => 'Fee for payment under reserve',
            InvoiceSuiteCodelistAllowanceChargeCodes::FIXE_LONG_TERM => 'Fixed long term',
            InvoiceSuiteCodelistAllowanceChargeCodes::FORE_EXCH_CHAR => 'Foreign exchange charges',
            InvoiceSuiteCodelistAllowanceChargeCodes::FREI_CHAR => 'Freight charges',
            InvoiceSuiteCodelistAllowanceChargeCodes::GOLD_SURC => 'Gold surcharge',
            InvoiceSuiteCodelistAllowanceChargeCodes::GUAR_COMM => 'Guarantee commission',
            InvoiceSuiteCodelistAllowanceChargeCodes::HAND_COMM => 'Handling commission',
            InvoiceSuiteCodelistAllowanceChargeCodes::INCO_DISC => 'Incoterm discount',
            InvoiceSuiteCodelistAllowanceChargeCodes::INSURANCE => 'Insurance',
            InvoiceSuiteCodelistAllowanceChargeCodes::INTEREST => 'Interest',
            InvoiceSuiteCodelistAllowanceChargeCodes::INTE_ON_ARRE => 'Interest on arrears',
            InvoiceSuiteCodelistAllowanceChargeCodes::JOBO_PROD_COST => 'Job-order production costs',
            InvoiceSuiteCodelistAllowanceChargeCodes::LEAD_SURC => 'Lead surcharge',
            InvoiceSuiteCodelistAllowanceChargeCodes::LOAD_CHAR => 'Loading charge',
            InvoiceSuiteCodelistAllowanceChargeCodes::MANU_CONS_DISC => 'Manufacturers consumer discount',
            InvoiceSuiteCodelistAllowanceChargeCodes::MATE_SURC_SPEC_MATE => 'Material surcharge (special materials)',
            InvoiceSuiteCodelistAllowanceChargeCodes::MATE_SURC => 'Material surcharge/deduction',
            InvoiceSuiteCodelistAllowanceChargeCodes::MINI_COMM => 'Minimum commission',
            InvoiceSuiteCodelistAllowanceChargeCodes::MINI_ORDE_MINI_BILL_CHAR => 'Minimum order / minimum billing charge',
            InvoiceSuiteCodelistAllowanceChargeCodes::MISC_CHAR => 'Miscellaneous charges',
            InvoiceSuiteCodelistAllowanceChargeCodes::MODE_CHAR => 'Model charges',
            InvoiceSuiteCodelistAllowanceChargeCodes::NEGO_COMM => 'Negotiation commission',
            InvoiceSuiteCodelistAllowanceChargeCodes::NEW_OUTL_DISC => 'New outlet discount',
            InvoiceSuiteCodelistAllowanceChargeCodes::OFFP_COST => 'Off-premises costs',
            InvoiceSuiteCodelistAllowanceChargeCodes::OPEN_COMM => 'Opening commission',
            InvoiceSuiteCodelistAllowanceChargeCodes::OTHE_BONU => 'Other bonus',
            InvoiceSuiteCodelistAllowanceChargeCodes::OTHE_PENA => 'Other penalties',
            InvoiceSuiteCodelistAllowanceChargeCodes::OTHE_RETE => 'Other retentions',
            InvoiceSuiteCodelistAllowanceChargeCodes::PACK_CHAR => 'Packing charge',
            InvoiceSuiteCodelistAllowanceChargeCodes::PENA_FOR_EXEC_OF_WORK_BEHI_SCHE => 'Penalty for execution of works behind schedule',
            InvoiceSuiteCodelistAllowanceChargeCodes::PENA_FOR_LATE_DELI_OF_DOCU => 'Penalty for late delivery of documents',
            InvoiceSuiteCodelistAllowanceChargeCodes::PENA_FOR_LATE_DELI_OF_VALU_OF_WORK => 'Penalty for late delivery of valuation of works',
            InvoiceSuiteCodelistAllowanceChargeCodes::PHON_FEE => 'Phone fee',
            InvoiceSuiteCodelistAllowanceChargeCodes::PLAT_SURC => 'Platinum surcharge',
            InvoiceSuiteCodelistAllowanceChargeCodes::POST_FEE => 'Postage fee',
            InvoiceSuiteCodelistAllowanceChargeCodes::PREA_COMM => 'Pre-advice commission',
            InvoiceSuiteCodelistAllowanceChargeCodes::PRIC_INDE_SURC => 'Price index surcharge',
            InvoiceSuiteCodelistAllowanceChargeCodes::PRO_RATA_RETE => 'Pro rata retention',
            InvoiceSuiteCodelistAllowanceChargeCodes::PROD_ERRO_DISC => 'Production error discount',
            InvoiceSuiteCodelistAllowanceChargeCodes::PROJ_MANA_COST => 'Project management cost',
            InvoiceSuiteCodelistAllowanceChargeCodes::REIM_COMM => 'Reimbursement commission',
            InvoiceSuiteCodelistAllowanceChargeCodes::REPA_CHAR => 'Repair charge',
            InvoiceSuiteCodelistAllowanceChargeCodes::RETU_COMM => 'Return commission',
            InvoiceSuiteCodelistAllowanceChargeCodes::RISK_COMM => 'Risk commission',
            InvoiceSuiteCodelistAllowanceChargeCodes::RUSH_DELI_SURC => 'Rush delivery surcharge',
            InvoiceSuiteCodelistAllowanceChargeCodes::SWIF_FEE => 'S.W.I.F.T. fee',
            InvoiceSuiteCodelistAllowanceChargeCodes::SAMP_DISC => 'Sample discount',
            InvoiceSuiteCodelistAllowanceChargeCodes::SETU_CHAR => 'Setup charge',
            InvoiceSuiteCodelistAllowanceChargeCodes::SILV_SURC => 'Silver surcharge',
            InvoiceSuiteCodelistAllowanceChargeCodes::SPEC_AGRE => 'Special agreement',
            InvoiceSuiteCodelistAllowanceChargeCodes::SPEC_CONS_COST => 'Special construction costs',
            InvoiceSuiteCodelistAllowanceChargeCodes::SPEC_REBA => 'Special rebate',
            InvoiceSuiteCodelistAllowanceChargeCodes::STAM_DUTY => 'Stamp duty',
            InvoiceSuiteCodelistAllowanceChargeCodes::STANDARD => 'Standard',
            InvoiceSuiteCodelistAllowanceChargeCodes::SUPE_COMM => 'Supervisory commission',
            InvoiceSuiteCodelistAllowanceChargeCodes::SURCHARGE => 'Surcharge',
            InvoiceSuiteCodelistAllowanceChargeCodes::TECH_MODI_COST => 'Technical modification costs',
            InvoiceSuiteCodelistAllowanceChargeCodes::TELE_FEE => 'Telex fee',
            InvoiceSuiteCodelistAllowanceChargeCodes::TEMPORARY => 'Temporary',
            InvoiceSuiteCodelistAllowanceChargeCodes::TEST_CHAR => 'Testing charge',
            InvoiceSuiteCodelistAllowanceChargeCodes::TRAN_CHAR => 'Transfer charges',
            InvoiceSuiteCodelistAllowanceChargeCodes::TRAN_COMM => 'Transfer commission',
            InvoiceSuiteCodelistAllowanceChargeCodes::TRUS_COMM => 'Trust commission',
            InvoiceSuiteCodelistAllowanceChargeCodes::WARE_CHAR => 'Warehousing charge',
            InvoiceSuiteCodelistAllowanceChargeCodes::WITH_TAXE_AND_SOCI_SECU_CONT => 'Withheld taxes and social security contributions',
            InvoiceSuiteCodelistAllowanceChargeCodes::WOLF_SURC => 'Wolfram surcharge',
            InvoiceSuiteCodelistAllowanceChargeCodes::YEAR_TURN => 'Yearly turnover',
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
            InvoiceSuiteCodelistAllowanceChargeCodes::ACCEPTANCE => 'The service of accepting goods or services.',
            InvoiceSuiteCodelistAllowanceChargeCodes::ADDI_PACK => 'The service of providing additional packaging.',
            InvoiceSuiteCodelistAllowanceChargeCodes::ADDI_PROC => 'The service of providing additional processing.',
            InvoiceSuiteCodelistAllowanceChargeCodes::ADJUSTMENTS => 'The service of making adjustments.',
            InvoiceSuiteCodelistAllowanceChargeCodes::ADVERTISING => 'The service of providing advertising.',
            InvoiceSuiteCodelistAllowanceChargeCodes::AIRBAG => 'The service of surrounding a product with an air bag.',
            InvoiceSuiteCodelistAllowanceChargeCodes::AIRC_REFU => 'Fuel being put into the aircraft.',
            InvoiceSuiteCodelistAllowanceChargeCodes::AIRP_FACI => 'The service of providing airport facilities.',
            InvoiceSuiteCodelistAllowanceChargeCodes::ALLO_TRAN_TO_THE_CONS => 'An allowance given by the manufacturer which should be transfered to the consumer.',
            InvoiceSuiteCodelistAllowanceChargeCodes::ASSO_ALLO => 'Allowance given when a specific part of a suppliers assortment is purchased by the buyer.',
            InvoiceSuiteCodelistAllowanceChargeCodes::ATTESTING => 'The service of certifying validity.',
            InvoiceSuiteCodelistAllowanceChargeCodes::AUTHENTICATION => 'The service of authenticating.',
            InvoiceSuiteCodelistAllowanceChargeCodes::BATT_COLL_AND_RECY => 'The service of collecting and recycling batteries.',
            InvoiceSuiteCodelistAllowanceChargeCodes::BILA_AGRE_SERV => 'Provision of a service as specified in a bilateral special agreement.',
            InvoiceSuiteCodelistAllowanceChargeCodes::BILL_OF_LADI => 'The service of providing a bill of lading document.',
            InvoiceSuiteCodelistAllowanceChargeCodes::BINDING => 'Binding service.',
            InvoiceSuiteCodelistAllowanceChargeCodes::CAR_LOAD => 'Car loading service.',
            InvoiceSuiteCodelistAllowanceChargeCodes::CARR_COUN => 'The service of counting by the carrier.',
            InvoiceSuiteCodelistAllowanceChargeCodes::CARTAGE => 'Movement of goods by heavy duty cart or vehicle.',
            InvoiceSuiteCodelistAllowanceChargeCodes::CART_PACK => 'The service of packing items into a carton.',
            InvoiceSuiteCodelistAllowanceChargeCodes::CASH_ON_DELI => 'The provision of a cash on delivery (COD) service.',
            InvoiceSuiteCodelistAllowanceChargeCodes::CASH_TRAN => 'Provision of a cash transportation service.',
            InvoiceSuiteCodelistAllowanceChargeCodes::CATALOGUING => 'The provision of cataloguing services.',
            InvoiceSuiteCodelistAllowanceChargeCodes::CERT_OF_CONF => 'The service of providing a certificate of conformance.',
            InvoiceSuiteCodelistAllowanceChargeCodes::CERT_OF_ORIG => 'The service of providing a certificate of origin.',
            InvoiceSuiteCodelistAllowanceChargeCodes::CERTIFICATION => 'The service of certifying.',
            InvoiceSuiteCodelistAllowanceChargeCodes::CHEQ_GENE => 'Provision of a cheque generation service.',
            InvoiceSuiteCodelistAllowanceChargeCodes::CHRO_ILLN => 'The special services provided due to chronic illness.',
            InvoiceSuiteCodelistAllowanceChargeCodes::CIGA_STAM => 'The service of providing cigarette stamping.',
            InvoiceSuiteCodelistAllowanceChargeCodes::CLEANING => 'Cleaning service.',
            InvoiceSuiteCodelistAllowanceChargeCodes::CLER_OR_ADMI_SERV => 'The provision of clerical or administrative services.',
            InvoiceSuiteCodelistAllowanceChargeCodes::COLL_AND_RECY => 'The service of collection and recycling products.',
            InvoiceSuiteCodelistAllowanceChargeCodes::COMB_ALL_SAME_DAY_SHIP => 'The service of combining all shipments for the same day.',
            InvoiceSuiteCodelistAllowanceChargeCodes::COMP_STOR => 'The service provided to hold a compulsory inventory.',
            InvoiceSuiteCodelistAllowanceChargeCodes::CONCESSION => 'The service allowing a party to use another partys facilities.',
            InvoiceSuiteCodelistAllowanceChargeCodes::CONS_UNLO => 'The service of unloading by the consignee.',
            InvoiceSuiteCodelistAllowanceChargeCodes::CONSOLIDATION => 'The service of consolidating multiple consignments into one shipment.',
            InvoiceSuiteCodelistAllowanceChargeCodes::CONS_SERV => 'The service provided by consulates.',
            InvoiceSuiteCodelistAllowanceChargeCodes::CONTAINERISATION => 'The service of packing items into a container.',
            InvoiceSuiteCodelistAllowanceChargeCodes::COPY_FEE_COLL => 'The service of collecting copyright fees.',
            InvoiceSuiteCodelistAllowanceChargeCodes::COUN_AND_RECO => 'The service of doing a count and recount.',
            InvoiceSuiteCodelistAllowanceChargeCodes::CRANE => 'The service of providing a crane.',
            InvoiceSuiteCodelistAllowanceChargeCodes::CUST_COLL => 'The service of collecting goods by the customer.',
            InvoiceSuiteCodelistAllowanceChargeCodes::CUTTING => 'The service of cutting.',
            InvoiceSuiteCodelistAllowanceChargeCodes::DEAL_ALLO => 'An allowance offered by a party dealing a certain brand or brands of products.',
            InvoiceSuiteCodelistAllowanceChargeCodes::DEBT_BOUN => 'A special allowance or charge applicable to a specific debtor.',
            InvoiceSuiteCodelistAllowanceChargeCodes::DELIVERY => 'The service of providing delivery.',
            InvoiceSuiteCodelistAllowanceChargeCodes::DIRE_DELI => 'Direct delivery service.',
            InvoiceSuiteCodelistAllowanceChargeCodes::DISCONNECT => 'The service is a disconnection.',
            InvoiceSuiteCodelistAllowanceChargeCodes::DISTRIBUTION => 'Distribution service.',
            InvoiceSuiteCodelistAllowanceChargeCodes::DIVERSION => 'The service of diverting deliverables.',
            InvoiceSuiteCodelistAllowanceChargeCodes::DOCU_CRED_TRAN_COMM => 'Fee for the transfer of transferable documentary credits.',
            InvoiceSuiteCodelistAllowanceChargeCodes::DRIV_ASSI_UNLO => 'The service of unloading by the driver.',
            InvoiceSuiteCodelistAllowanceChargeCodes::DROP_DOCK => 'The service of delivering goods at the dock.',
            InvoiceSuiteCodelistAllowanceChargeCodes::DROP_YARD => 'The service of delivering goods at the yard.',
            InvoiceSuiteCodelistAllowanceChargeCodes::DUNNAGE => 'The service of providing additional padding materials required to secure and protect a cargo within a shipping container.',
            InvoiceSuiteCodelistAllowanceChargeCodes::EFFI_LOGI => 'A code indicating efficient logistics services.',
            InvoiceSuiteCodelistAllowanceChargeCodes::ENAM_TREA => 'The service of providing enamelling treatment.',
            InvoiceSuiteCodelistAllowanceChargeCodes::ENGRAVING => 'The service of providing engraving.',
            InvoiceSuiteCodelistAllowanceChargeCodes::ENVI_CLEA_SERV => 'The provision of an environmental clean-up service.',
            InvoiceSuiteCodelistAllowanceChargeCodes::ENVI_PROT_SERV => 'The provision of an environmental protection service.',
            InvoiceSuiteCodelistAllowanceChargeCodes::EXCH_RATE_GUAR => 'The service of guaranteeing exchange rate.',
            InvoiceSuiteCodelistAllowanceChargeCodes::EXPEDITING => 'The service of expediting.',
            InvoiceSuiteCodelistAllowanceChargeCodes::FABRICATION => 'The service of providing fabrication.',
            InvoiceSuiteCodelistAllowanceChargeCodes::FILLINGHANDLING => 'The service of providing filling/handling.',
            InvoiceSuiteCodelistAllowanceChargeCodes::FINANCING => 'The service of providing financing.',
            InvoiceSuiteCodelistAllowanceChargeCodes::FITTING => 'Fitting service.',
            InvoiceSuiteCodelistAllowanceChargeCodes::FREI_EQUA => 'The service of load balancing.',
            InvoiceSuiteCodelistAllowanceChargeCodes::FREI_EXTR_HAND => 'The service of providing freights extraordinary handling.',
            InvoiceSuiteCodelistAllowanceChargeCodes::FREI_SERV => 'The service of moving goods, by whatever means, from one place to another.',
            InvoiceSuiteCodelistAllowanceChargeCodes::FUEL_REMO => 'Remove or off-load fuel from vehicle, vessel or craft.',
            InvoiceSuiteCodelistAllowanceChargeCodes::FUEL_SHIP_INTO_STOR => 'Fuel being shipped into a storage system.',
            InvoiceSuiteCodelistAllowanceChargeCodes::GRINDING => 'The service of grinding.',
            InvoiceSuiteCodelistAllowanceChargeCodes::GROW_OF_BUSI => 'An allowance or charge related to the growth of business over a pre-determined period of time.',
            InvoiceSuiteCodelistAllowanceChargeCodes::GUARANTEE => 'The service of providing a guarantee.',
            InvoiceSuiteCodelistAllowanceChargeCodes::HANDLING => 'Handling service.',
            InvoiceSuiteCodelistAllowanceChargeCodes::HAND_OF_HAZA_CARG => 'A service for handling hazardous cargo.',
            InvoiceSuiteCodelistAllowanceChargeCodes::HEAT_TREA => 'The service of treating with heat.',
            InvoiceSuiteCodelistAllowanceChargeCodes::HESS_WRAP => 'The service of hessian wrapping.',
            InvoiceSuiteCodelistAllowanceChargeCodes::HOIS_AND_HAUL => 'The service of hoisting and hauling.',
            InvoiceSuiteCodelistAllowanceChargeCodes::HOME_BANK_SERV => 'Provision of a home banking service.',
            InvoiceSuiteCodelistAllowanceChargeCodes::HOSE => 'The service of providing a hose.',
            InvoiceSuiteCodelistAllowanceChargeCodes::INSI_DELI => 'The service of providing delivery inside.',
            InvoiceSuiteCodelistAllowanceChargeCodes::INSPECTION => 'The service of inspection.',
            InvoiceSuiteCodelistAllowanceChargeCodes::INSTALLATION => 'The service of installing.',
            InvoiceSuiteCodelistAllowanceChargeCodes::INST_AND_TRAI => 'The service of providing installation and training.',
            InvoiceSuiteCodelistAllowanceChargeCodes::INST_AND_WARR => 'The service of installing and providing warranty.',
            InvoiceSuiteCodelistAllowanceChargeCodes::INSU_BROK_SERV => 'Provision of an insurance brokerage service.',
            InvoiceSuiteCodelistAllowanceChargeCodes::INTO_PLAN => 'Service of delivering goods to an aircraft from local storage.',
            InvoiceSuiteCodelistAllowanceChargeCodes::INTR_ALLO => 'An allowance related to the introduction of a new product to the range of products traded by a retailer.',
            InvoiceSuiteCodelistAllowanceChargeCodes::INVO_WITH_SHIP => 'The service of including the invoice with the shipment.',
            InvoiceSuiteCodelistAllowanceChargeCodes::INVOICING => 'The service of providing an invoice.',
            InvoiceSuiteCodelistAllowanceChargeCodes::JOBO_PROD => 'The service of producing to order.',
            InvoiceSuiteCodelistAllowanceChargeCodes::KOSHERING => 'The service of preparing food in accordance with Jewish law.',
            InvoiceSuiteCodelistAllowanceChargeCodes::LABELLING => 'Labelling service.',
            InvoiceSuiteCodelistAllowanceChargeCodes::LABOUR => 'The service to provide required labour.',
            InvoiceSuiteCodelistAllowanceChargeCodes::LAYOUTDESIGN => 'The service of providing layout/design.',
            InvoiceSuiteCodelistAllowanceChargeCodes::LEGALISATION => 'The service of legalising.',
            InvoiceSuiteCodelistAllowanceChargeCodes::LOADING => 'The service of loading goods.',
            InvoiceSuiteCodelistAllowanceChargeCodes::LOCA_DIFF => 'Delivery to a different location than previously contracted.',
            InvoiceSuiteCodelistAllowanceChargeCodes::MAIL_INVO => 'The service of mailing an invoice.',
            InvoiceSuiteCodelistAllowanceChargeCodes::MAIL_INVO_TO_EACH_LOCA => 'The service of mailing an invoice to each location.',
            InvoiceSuiteCodelistAllowanceChargeCodes::MEDI_FREE_PASS_HOLD => 'Special service when the subject holds a medicine free pass.',
            InvoiceSuiteCodelistAllowanceChargeCodes::MERCHANDISING => 'A code indicating that merchandising services are in operation.',
            InvoiceSuiteCodelistAllowanceChargeCodes::MINI_ORDE_NOT_FULF_CHAR => 'Charge levied because the minimum order quantity could not be fulfilled.',
            InvoiceSuiteCodelistAllowanceChargeCodes::MISCELLANEOUS => 'Miscellaneous services.',
            InvoiceSuiteCodelistAllowanceChargeCodes::MISC_TREA => 'Miscellaneous treatment service.',
            InvoiceSuiteCodelistAllowanceChargeCodes::MOUNTING => 'The service of mounting.',
            InvoiceSuiteCodelistAllowanceChargeCodes::MULT_PROM => 'A code indicating special conditions related to a multi-buy promotion.',
            InvoiceSuiteCodelistAllowanceChargeCodes::MUTU_DEFI => 'A code assigned within a code list to be used on an interim basis and as defined among trading partners until a precise code can be assigned to the code list.',
            InvoiceSuiteCodelistAllowanceChargeCodes::NATI_CHEQ_PROC_SERV_OUTS_ACCO_AREA => 'Service of processing a national cheque outside the ordering customers bank trading area.',
            InvoiceSuiteCodelistAllowanceChargeCodes::NATI_PAYM_SERV_OUTS_ACCO_AREA => 'Service of processing a national payment to a beneficiary holding an account outside the trading area of the ordering customers bank.',
            InvoiceSuiteCodelistAllowanceChargeCodes::NATI_PAYM_SERV_WITH_ACCO_AREA => 'Service of processing a national payment to a beneficiary holding an account within the trading area of the ordering customers bank.',
            InvoiceSuiteCodelistAllowanceChargeCodes::NEW_PROD_INTR => 'A service provided by a buyer when introducing a new product from a suppliers range to the range traded by the buyer.',
            InvoiceSuiteCodelistAllowanceChargeCodes::NONR_CONT => 'The service of providing non-returnable containers.',
            InvoiceSuiteCodelistAllowanceChargeCodes::OFFPREMISES => 'The service of providing services outside the premises of the provider.',
            InvoiceSuiteCodelistAllowanceChargeCodes::OTHE_SERV => 'A code indicating that other non-specific services are in operation.',
            InvoiceSuiteCodelistAllowanceChargeCodes::OUTLAYS => 'The service of providing money for outlays on behalf of a trading partner.',
            InvoiceSuiteCodelistAllowanceChargeCodes::OUTS_CABL_CONN => 'The service of providing outside cable connectors.',
            InvoiceSuiteCodelistAllowanceChargeCodes::OVERTIME => 'The service of providing labour beyond the established limit of working hours.',
            InvoiceSuiteCodelistAllowanceChargeCodes::PACKING => 'The service of packing.',
            InvoiceSuiteCodelistAllowanceChargeCodes::PAINTING => 'The service of painting.',
            InvoiceSuiteCodelistAllowanceChargeCodes::PALLETIZING => 'The service of palletizing.',
            InvoiceSuiteCodelistAllowanceChargeCodes::PARTNERSHIP => 'An allowance or charge related to the establishment and on-going maintenance of a partnership.',
            InvoiceSuiteCodelistAllowanceChargeCodes::PAYR_PAYM_SERV => 'Provision of a payroll payment service.',
            InvoiceSuiteCodelistAllowanceChargeCodes::PENS_SERV => 'Special service when the subject is a pensioner.',
            InvoiceSuiteCodelistAllowanceChargeCodes::PHOS_STEE_TREA => 'The service of phosphatizing the steel.',
            InvoiceSuiteCodelistAllowanceChargeCodes::PICKUP => 'The service of picking up or collection of goods.',
            InvoiceSuiteCodelistAllowanceChargeCodes::PLAT_TREA => 'The service of providing plating treatment.',
            InvoiceSuiteCodelistAllowanceChargeCodes::POIN_OF_SALE_THRE_ALLO => 'Allowance for reaching or exceeding an agreed sales threshold at the point of sales.',
            InvoiceSuiteCodelistAllowanceChargeCodes::POLISHING => 'The service of polishing.',
            InvoiceSuiteCodelistAllowanceChargeCodes::POLY_WRAP_PACK => 'The service of packing in polyethylene wrapping.',
            InvoiceSuiteCodelistAllowanceChargeCodes::PREF_MERC_LOCA => 'Service of assigning a preferential location for merchandising.',
            InvoiceSuiteCodelistAllowanceChargeCodes::PRES_TREA => 'The service of preservation treatment.',
            InvoiceSuiteCodelistAllowanceChargeCodes::PRIMING => 'The service of priming.',
            InvoiceSuiteCodelistAllowanceChargeCodes::PROD_MIX => 'A code indicating that product mixing services are in operation.',
            InvoiceSuiteCodelistAllowanceChargeCodes::PROD_TAKE_BACK_FEE => 'The fee the consumer must pay the manufacturer to take back the product.',
            InvoiceSuiteCodelistAllowanceChargeCodes::QUAL_CONT_EMBA => 'Instructs the stockholder to withhold distribution of goods which have failed quality control tests.',
            InvoiceSuiteCodelistAllowanceChargeCodes::QUAL_CONT_HELD => 'Instructs the stockholder to withhold distribution of the goods until the manufacturer has completed a quality control assessment.',
            InvoiceSuiteCodelistAllowanceChargeCodes::QUAL_CONT_RELE => 'Informs the stockholder it is free to distribute the quality controlled passed goods.',
            InvoiceSuiteCodelistAllowanceChargeCodes::RAIL_WAGO_HIRE => 'The service of providing rail wagons for hire.',
            InvoiceSuiteCodelistAllowanceChargeCodes::REDELIVERY => 'The service of re-delivering.',
            InvoiceSuiteCodelistAllowanceChargeCodes::REFURBISHING => 'The service of refurbishing.',
            InvoiceSuiteCodelistAllowanceChargeCodes::RENT_AND_LEAS => 'The service of renting and/or leasing.',
            InvoiceSuiteCodelistAllowanceChargeCodes::REPACKING => 'The service of repacking.',
            InvoiceSuiteCodelistAllowanceChargeCodes::REPAIR => 'The service of repairing.',
            InvoiceSuiteCodelistAllowanceChargeCodes::REPA_AND_RETU => 'The service of repairing and returning.',
            InvoiceSuiteCodelistAllowanceChargeCodes::REPA_OR_REPL_OF_BROK_RETU_PACK => 'The service of repairing or replacing a broken returnable package.',
            InvoiceSuiteCodelistAllowanceChargeCodes::RESTOCKING => 'The service of restocking.',
            InvoiceSuiteCodelistAllowanceChargeCodes::RETU_HAND => 'An allowance or change related to the handling of returns.',
            InvoiceSuiteCodelistAllowanceChargeCodes::RETU_CONT => 'The service of providing returnable containers.',
            InvoiceSuiteCodelistAllowanceChargeCodes::RUSH_DELI => 'The service to provide a rush delivery.',
            InvoiceSuiteCodelistAllowanceChargeCodes::SALVAGING => 'The service of salvaging.',
            InvoiceSuiteCodelistAllowanceChargeCodes::SETUP => 'The service of setting-up.',
            InvoiceSuiteCodelistAllowanceChargeCodes::SHIP_AND_HAND => 'The service of shipping and handling.',
            InvoiceSuiteCodelistAllowanceChargeCodes::SHRINKWRAP => 'The service of shrink-wrapping.',
            InvoiceSuiteCodelistAllowanceChargeCodes::SLIPSHEET => 'The service of securing a stack of products on a slipsheet.',
            InvoiceSuiteCodelistAllowanceChargeCodes::SMAL_ORDE_PROC_SERV => 'A service related to the processing of small orders.',
            InvoiceSuiteCodelistAllowanceChargeCodes::SORTING => 'The provision of sorting services.',
            InvoiceSuiteCodelistAllowanceChargeCodes::SPEC_COLO_SERV => 'Providing a colour which is different from the default colour.',
            InvoiceSuiteCodelistAllowanceChargeCodes::SPEC_CONS => 'The service of providing special construction.',
            InvoiceSuiteCodelistAllowanceChargeCodes::SPEC_FINI => 'The service of providing a special finish.',
            InvoiceSuiteCodelistAllowanceChargeCodes::SPEC_HAND => 'The service of special handling.',
            InvoiceSuiteCodelistAllowanceChargeCodes::SPEC_PACK => 'The service of special packaging.',
            InvoiceSuiteCodelistAllowanceChargeCodes::SPLI_PICK => 'The service of providing split pick-up.',
            InvoiceSuiteCodelistAllowanceChargeCodes::STAMPING => 'The service of stamping.',
            InvoiceSuiteCodelistAllowanceChargeCodes::TANK_RENT => 'The service of providing tanks for hire.',
            InvoiceSuiteCodelistAllowanceChargeCodes::TECH_MODI => 'The service of making technical modifications to a product.',
            InvoiceSuiteCodelistAllowanceChargeCodes::TELECOMMUNICATION => 'The service of providing telecommunication activities and/or faclities.',
            InvoiceSuiteCodelistAllowanceChargeCodes::TESTING => 'The service of testing.',
            InvoiceSuiteCodelistAllowanceChargeCodes::TOOLING => 'The service of providing specific tooling.',
            InvoiceSuiteCodelistAllowanceChargeCodes::TRANSFER => 'The service of transferring.',
            InvoiceSuiteCodelistAllowanceChargeCodes::TRAN_THIR_PART_BILL => 'The service of providing third party billing for transportation.',
            InvoiceSuiteCodelistAllowanceChargeCodes::TRAN_BY_VEND => 'The service of providing transportation by the vendor.',
            InvoiceSuiteCodelistAllowanceChargeCodes::VETE_INSP_SERV => 'The service of providing veterinary inspection.',
            InvoiceSuiteCodelistAllowanceChargeCodes::WAREHOUSING => 'The service of storing and handling of goods in a warehouse.',
            InvoiceSuiteCodelistAllowanceChargeCodes::WHOL_DISC => 'A special discount related to the purchase of products through a wholesaler.',
            InvoiceSuiteCodelistAllowanceChargeCodes::ACCE_COMM => 'Fee for the acceptance of draft in documentary credit and collection business which are drawn on us (also to be seen as a kind of guarantee commission).',
            InvoiceSuiteCodelistAllowanceChargeCodes::ADDI_PROC_COST => 'Costs of additional processing.',
            InvoiceSuiteCodelistAllowanceChargeCodes::ADVI_COMM => 'Fee for advising documentary credits (charged also in case of confirmed credits).',
            InvoiceSuiteCodelistAllowanceChargeCodes::AGRE_DEBI_INTE_CHAR => 'Charge for agreed debit interest',
            InvoiceSuiteCodelistAllowanceChargeCodes::ALUM_SURC => 'Difference between current price and basic value contained in product price in relation to aluminum content.',
            InvoiceSuiteCodelistAllowanceChargeCodes::AMEN_COMM => 'Fee for amendments in documentary credit and collection business (not extensions and increases of documentary credits).',
            InvoiceSuiteCodelistAllowanceChargeCodes::ATTE_CHAR => 'Costs of official attestation.',
            InvoiceSuiteCodelistAllowanceChargeCodes::BL_SPLI_CHAR => 'Fee for the splitting of bills of lading.',
            InvoiceSuiteCodelistAllowanceChargeCodes::BANK_CHAR => 'Charges deducted/claimed by other banks involved in the transaction.',
            InvoiceSuiteCodelistAllowanceChargeCodes::BANK_CHAR_INFO => 'Charges not included in the total charge amount i.e. the charges are for information only.',
            InvoiceSuiteCodelistAllowanceChargeCodes::BONU_FOR_WORK_AHEA_OF_SCHE => 'Bonus for completing work ahead of schedule.',
            InvoiceSuiteCodelistAllowanceChargeCodes::BROKERAGE => 'Brokers commission arising, in trade with foreign currencies.',
            InvoiceSuiteCodelistAllowanceChargeCodes::CARB_FOOT_CHAR => 'A monetary amount charged for carbon footprint related to a regulatory requirement.',
            InvoiceSuiteCodelistAllowanceChargeCodes::CHAM_OF_COMM_CHAR => 'Identifies the charges from the chamber of commerce.',
            InvoiceSuiteCodelistAllowanceChargeCodes::CHAR_FOR_A_CUST_SPEC_FINI => 'A charge for the addition of a customer specific finish to a product.',
            InvoiceSuiteCodelistAllowanceChargeCodes::CHAR_PER_CRED_COVE => 'Unit charge per credit cover established.',
            InvoiceSuiteCodelistAllowanceChargeCodes::CHAR_PER_UNUS_CRED_COVE => 'Unit charge per unused credit cover.',
            InvoiceSuiteCodelistAllowanceChargeCodes::COLL_COMM => 'Fee for settling collections on the basis of documents against payments.',
            InvoiceSuiteCodelistAllowanceChargeCodes::COMM_FOR_OBTA_ACCE => 'Fee for obtaining an acceptance under collections on the basis of documents against acceptance.',
            InvoiceSuiteCodelistAllowanceChargeCodes::COMM_FOR_OPEN_IRRE_DOCU_CRED => 'Fee for opening irrevocable documentary credits. This fee is a kind of Guarantee commission as compensation for the commitment into which the bank have entered on the customers behalf; similar to confirmation commission, acceptance commission.',
            InvoiceSuiteCodelistAllowanceChargeCodes::COMM_FOR_RELE_OF_GOOD => 'Commission for the release of goods sent to the bank.',
            InvoiceSuiteCodelistAllowanceChargeCodes::COMM_FOR_TAKI_UP_DOCU => 'Fee charged to the foreign bank for the processing of documentary credit.',
            InvoiceSuiteCodelistAllowanceChargeCodes::COMM_ON_DELI => 'Fee for delivery of documents without corresponding payment.',
            InvoiceSuiteCodelistAllowanceChargeCodes::CONF_COMM => 'Fee for confirmation of credit.',
            InvoiceSuiteCodelistAllowanceChargeCodes::CONT_RETE => 'Contractual retention charge.',
            InvoiceSuiteCodelistAllowanceChargeCodes::COPP_SURC => 'Difference between current price and basic value contained in product price in relation to copper content.',
            InvoiceSuiteCodelistAllowanceChargeCodes::COUR_FEE => 'Fee for use of courier service.',
            InvoiceSuiteCodelistAllowanceChargeCodes::DEFE_PAYM_COMM => 'Fee for the deferred payment period under documentary credits confirmed by bank. This fee are charges for the period from presentation of the document until due date of payment.',
            InvoiceSuiteCodelistAllowanceChargeCodes::DISCOUNT => 'A reduction from a usual or list price.',
            InvoiceSuiteCodelistAllowanceChargeCodes::DISC_FEE => 'Fee charged to the foreign bank for discrepancies in credit documents.',
            InvoiceSuiteCodelistAllowanceChargeCodes::DOMI_COMM => 'Fee for the domicilation of bills with the bank.',
            InvoiceSuiteCodelistAllowanceChargeCodes::DUE_TO_MILI_STAT => 'Allowance granted because of the military status.',
            InvoiceSuiteCodelistAllowanceChargeCodes::DUE_TO_WORK_ACCI => 'Allowance granted to a victim of a work accident.',
            InvoiceSuiteCodelistAllowanceChargeCodes::ENDO_DISC => 'A discount given for the purchase of an end-of-range product.',
            InvoiceSuiteCodelistAllowanceChargeCodes::FACT_COMM => 'Commission charged for factoring services.',
            InvoiceSuiteCodelistAllowanceChargeCodes::FAX_ADVI_CHAR => 'Charge for fax advice.',
            InvoiceSuiteCodelistAllowanceChargeCodes::FEE_FOR_PAYM_UNDE_RESE => 'Fee charged to the customer for discrepancies in credit documents in the case of which the bank have to stipulate payment under reserve.',
            InvoiceSuiteCodelistAllowanceChargeCodes::FIXE_LONG_TERM => 'A fixed long term allowance or charge.',
            InvoiceSuiteCodelistAllowanceChargeCodes::FORE_EXCH_CHAR => 'Charges for foreign exchange.',
            InvoiceSuiteCodelistAllowanceChargeCodes::FREI_CHAR => 'Amount to be paid for moving goods, by whatever means, from one place to another.',
            InvoiceSuiteCodelistAllowanceChargeCodes::GOLD_SURC => 'Difference between current price and basic value contained in product price in relation to gold content.',
            InvoiceSuiteCodelistAllowanceChargeCodes::GUAR_COMM => 'Commission for drawing up guaranties.',
            InvoiceSuiteCodelistAllowanceChargeCodes::HAND_COMM => 'Fee for the processing of documentary credit, collection and payment which are charged to the customer.',
            InvoiceSuiteCodelistAllowanceChargeCodes::INCO_DISC => 'A discount given for a specified Incoterm.',
            InvoiceSuiteCodelistAllowanceChargeCodes::INSURANCE => 'Charge for insurance.',
            InvoiceSuiteCodelistAllowanceChargeCodes::INTEREST => 'Cost of using money.',
            InvoiceSuiteCodelistAllowanceChargeCodes::INTE_ON_ARRE => 'Interest for late payment.',
            InvoiceSuiteCodelistAllowanceChargeCodes::JOBO_PROD_COST => 'Costs of job-order production.',
            InvoiceSuiteCodelistAllowanceChargeCodes::LEAD_SURC => 'Difference between current price and basic value contained in product price in relation to lead content.',
            InvoiceSuiteCodelistAllowanceChargeCodes::LOAD_CHAR => 'Charge for loading.',
            InvoiceSuiteCodelistAllowanceChargeCodes::MANU_CONS_DISC => 'A discount given by the manufacturer which should be passed on to the consumer.',
            InvoiceSuiteCodelistAllowanceChargeCodes::MATE_SURC_SPEC_MATE => 'Surcharge for (special) materials.',
            InvoiceSuiteCodelistAllowanceChargeCodes::MATE_SURC => 'Surcharge/deduction, calculated for higher/ lower materials consumption.',
            InvoiceSuiteCodelistAllowanceChargeCodes::MINI_COMM => 'Minimum commission charge.',
            InvoiceSuiteCodelistAllowanceChargeCodes::MINI_ORDE_MINI_BILL_CHAR => 'Charge for minimum order or minimum billing.',
            InvoiceSuiteCodelistAllowanceChargeCodes::MISC_CHAR => 'Not specifically defined charges.',
            InvoiceSuiteCodelistAllowanceChargeCodes::MODE_CHAR => 'Fee for decoding telex messages.',
            InvoiceSuiteCodelistAllowanceChargeCodes::NEGO_COMM => 'Fee for the purchase of documents under sight credit for the first ten days.',
            InvoiceSuiteCodelistAllowanceChargeCodes::NEW_OUTL_DISC => 'A discount given at the occasion of the opening of a new outlet.',
            InvoiceSuiteCodelistAllowanceChargeCodes::OFFP_COST => 'Expenses for non-local activities.',
            InvoiceSuiteCodelistAllowanceChargeCodes::OPEN_COMM => 'Fee for opening revocable documentary credit.',
            InvoiceSuiteCodelistAllowanceChargeCodes::OTHE_BONU => 'Bonus earned for other reasons.',
            InvoiceSuiteCodelistAllowanceChargeCodes::OTHE_PENA => 'Penalty imposed for other reasons.',
            InvoiceSuiteCodelistAllowanceChargeCodes::OTHE_RETE => 'Retention charge not otherwise specified.',
            InvoiceSuiteCodelistAllowanceChargeCodes::PACK_CHAR => 'Charge for packing.',
            InvoiceSuiteCodelistAllowanceChargeCodes::PENA_FOR_EXEC_OF_WORK_BEHI_SCHE => 'Penalty imposed when the execution of works is behind schedule.',
            InvoiceSuiteCodelistAllowanceChargeCodes::PENA_FOR_LATE_DELI_OF_DOCU => 'Penalty imposed when documents are delivered late.',
            InvoiceSuiteCodelistAllowanceChargeCodes::PENA_FOR_LATE_DELI_OF_VALU_OF_WORK => 'Penalty imposed when valuation of works is delivered late.',
            InvoiceSuiteCodelistAllowanceChargeCodes::PHON_FEE => 'Fee for use of phone.',
            InvoiceSuiteCodelistAllowanceChargeCodes::PLAT_SURC => 'Difference between current price and basic value contained in product price in relation to platinum content.',
            InvoiceSuiteCodelistAllowanceChargeCodes::POST_FEE => 'Fee for postage.',
            InvoiceSuiteCodelistAllowanceChargeCodes::PREA_COMM => 'Fee for the pre-advice of a documentary credit.',
            InvoiceSuiteCodelistAllowanceChargeCodes::PRIC_INDE_SURC => 'Higher/lower price, resulting from change in costs between the times of making offer and delivery.',
            InvoiceSuiteCodelistAllowanceChargeCodes::PRO_RATA_RETE => 'Proportional retention charge.',
            InvoiceSuiteCodelistAllowanceChargeCodes::PROD_ERRO_DISC => 'A discount given for the purchase of a product with a production error.',
            InvoiceSuiteCodelistAllowanceChargeCodes::PROJ_MANA_COST => 'Cost for project management.',
            InvoiceSuiteCodelistAllowanceChargeCodes::REIM_COMM => 'Fee for reimbursement of, for example, documentary credits.',
            InvoiceSuiteCodelistAllowanceChargeCodes::REPA_CHAR => 'Charge for repair.',
            InvoiceSuiteCodelistAllowanceChargeCodes::RETU_COMM => 'Fee for cheques, bills and collections returned unpaid and/or recalled.',
            InvoiceSuiteCodelistAllowanceChargeCodes::RISK_COMM => 'Commission in addition to the confirmation commission for documentary credits from sensitive countries.',
            InvoiceSuiteCodelistAllowanceChargeCodes::RUSH_DELI_SURC => 'Charge for increased delivery speed.',
            InvoiceSuiteCodelistAllowanceChargeCodes::SWIF_FEE => 'Fee for use of S.W.I.F.T.',
            InvoiceSuiteCodelistAllowanceChargeCodes::SAMP_DISC => 'A discount given for the purchase of a sample of a product.',
            InvoiceSuiteCodelistAllowanceChargeCodes::SETU_CHAR => 'Charge for setup.',
            InvoiceSuiteCodelistAllowanceChargeCodes::SILV_SURC => 'Difference between current price and basic value contained in product price in relation to silver content.',
            InvoiceSuiteCodelistAllowanceChargeCodes::SPEC_AGRE => 'An allowance or charge as specified in a special agreement.',
            InvoiceSuiteCodelistAllowanceChargeCodes::SPEC_CONS_COST => 'Charge for costs incurred as result of special constructions.',
            InvoiceSuiteCodelistAllowanceChargeCodes::SPEC_REBA => 'A return of part of an amount paid for goods or services, serving as a reduction or discount.',
            InvoiceSuiteCodelistAllowanceChargeCodes::STAM_DUTY => 'Tax payable on bills in accordance with national bill of exchange legislation.',
            InvoiceSuiteCodelistAllowanceChargeCodes::STANDARD => 'The standard available allowance or charge.',
            InvoiceSuiteCodelistAllowanceChargeCodes::SUPE_COMM => 'Fee for the supervising unconfirmed documentary credits with a deferred payment period.',
            InvoiceSuiteCodelistAllowanceChargeCodes::SURCHARGE => 'An additional amount added to the usual charge.',
            InvoiceSuiteCodelistAllowanceChargeCodes::TECH_MODI_COST => 'Costs for technical modifications to a product.',
            InvoiceSuiteCodelistAllowanceChargeCodes::TELE_FEE => 'Fee for telex.',
            InvoiceSuiteCodelistAllowanceChargeCodes::TEMPORARY => 'A temporary allowance or charge.',
            InvoiceSuiteCodelistAllowanceChargeCodes::TEST_CHAR => 'Charge for testing.',
            InvoiceSuiteCodelistAllowanceChargeCodes::TRAN_CHAR => 'Charges for transfer.',
            InvoiceSuiteCodelistAllowanceChargeCodes::TRAN_COMM => 'Fee for the transfer of transferable documentary credits.',
            InvoiceSuiteCodelistAllowanceChargeCodes::TRUS_COMM => 'Fee for the handling on a fiduciary basis of imported goods that have been warehoused.',
            InvoiceSuiteCodelistAllowanceChargeCodes::WARE_CHAR => 'Charge for storage and handling.',
            InvoiceSuiteCodelistAllowanceChargeCodes::WITH_TAXE_AND_SOCI_SECU_CONT => 'The amount of taxes and contributions for social security, that is subtracted from the payable amount as it is to be paid separately.',
            InvoiceSuiteCodelistAllowanceChargeCodes::WOLF_SURC => 'Difference between current price and basic value contained in product price in relation to wolfram content.',
            InvoiceSuiteCodelistAllowanceChargeCodes::YEAR_TURN => 'An allowance or charge based on yearly turnover.',
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
            'https://www.xrepository.de/details/urn:xoev-de:kosit:codeliste:untdid.7161',
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
            'https://www.xrepository.de/api/xrepository/urn:xoev-de:kosit:codeliste:untdid.7161_3/download/UNTDID_7161_3.json',
            'https://www.xrepository.de/api/xrepository/urn:xoev-de:kosit:codeliste:untdid.5189_3/download/UNTDID_5189_3.json',
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
