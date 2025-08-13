<?php

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\codelists;

/**
 * Class representing list of codes for units of measure used in international trade
 * Name of list: UN/ECE Recommendation N°20 and N°21
 *
 * @category InvoiceSuite
 * @package  InvoiceSuite
 * @author   HorstOeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/invoicesuite
 * @see      https://www.xrepository.de/details/urn:xoev-de:kosit:codeliste:rec20
 * @see      https://www.xrepository.de/details/urn:xoev-de:kosit:codeliste:rec21
 * @see      https://www.xrepository.de/api/xrepository/urn:xoev-de:kosit:codeliste:rec20_3/download/UN_ECE_Recommendation_N_20_3.json
 * @see      https://www.xrepository.de/api/xrepository/urn:xoev-de:kosit:codeliste:rec21_3/download/UN_ECE_Recommendation_N_21_3.json
 */
enum InvoiceSuiteCodelistUnitCodes: string
{
    /**
     * 30-day month (M36)
     *
     * 30-day month
     */
    case REC20_DA_MONT = 'M36';

    /**
     * 8-part cloud cover (A59)
     *
     * 8-part cloud cover
     */
    case REC20_PAR_CLOU_COVE = 'A59';

    /**
     * access line (AL)
     *
     * access line
     */
    case REC20_ACCE_LINE = 'AL';

    /**
     * accounting unit (E50)
     *
     * accounting unit
     */
    case REC20_ACCO_UNIT = 'E50';

    /**
     * acre (ACR)
     *
     * acre
     */
    case REC20_ACRE = 'ACR';

    /**
     * acre-foot (based on U.S. survey foot) (M67)
     *
     * acre-foot (based on U.S. survey foot)
     */
    case REC20_ACRE_BASE_ON_US_SURV_FOOT = 'M67';

    /**
     * active unit (E25)
     *
     * active unit
     */
    case REC20_ACTI_UNIT = 'E25';

    /**
     * activity (ACT)
     *
     * activity
     */
    case REC20_ACTIVITY = 'ACT';

    /**
     * actual/360 (M37)
     *
     * actual/360
     */
    case REC20_ACTUAL = 'M37';

    /**
     * additional minute (AH)
     *
     * additional minute
     */
    case REC20_ADDI_MINU = 'AH';

    /**
     * air dry metric ton (MD)
     *
     * air dry metric ton
     */
    case REC20_AIR_DRY_METR_TON = 'MD';

    /**
     * air dry ton (E28)
     *
     * air dry ton
     */
    case REC20_AIR_DRY_TON = 'E28';

    /**
     * alcoholic strength by mass (ASM)
     *
     * alcoholic strength by mass
     */
    case REC20_ALCO_STRE_BY_MASS = 'ASM';

    /**
     * alcoholic strength by volume (ASU)
     *
     * alcoholic strength by volume
     */
    case REC20_ALCO_STRE_BY_VOLU = 'ASU';

    /**
     * american wire gauge (AWG)
     *
     * american wire gauge
     */
    case REC20_AMER_WIRE_GAUG = 'AWG';

    /**
     * ampere (AMP)
     *
     * ampere
     */
    case REC20_AMPERE = 'AMP';

    /**
     * ampere hour (AMH)
     *
     * ampere hour
     */
    case REC20_AMPE_HOUR = 'AMH';

    /**
     * ampere minute (N95)
     *
     * ampere minute
     */
    case REC20_AMPE_MINU = 'N95';

    /**
     * ampere per centimetre (A2)
     *
     * ampere per centimetre
     */
    case REC20_AMPE_PER_CENT = 'A2';

    /**
     * ampere per kilogram (H31)
     *
     * ampere per kilogram
     */
    case REC20_AMPE_PER_KILO = 'H31';

    /**
     * ampere per metre (AE)
     *
     * ampere per metre
     */
    case REC20_AMPE_PER_METR = 'AE';

    /**
     * ampere per millimetre (A3)
     *
     * ampere per millimetre
     */
    case REC20_AMPE_PER_MILL = 'A3';

    /**
     * ampere per pascal (N93)
     *
     * ampere per pascal
     */
    case REC20_AMPE_PER_PASC = 'N93';

    /**
     * ampere per square centimetre (A4)
     *
     * ampere per square centimetre
     */
    case REC20_AMPE_PER_SQUA_CENT = 'A4';

    /**
     * ampere per square metre (A41)
     *
     * ampere per square metre
     */
    case REC20_AMPE_PER_SQUA_METR = 'A41';

    /**
     * ampere per square metre kelvin squared (A6)
     *
     * ampere per square metre kelvin squared
     */
    case REC20_AMPE_PER_SQUA_METR_KELV_SQUA = 'A6';

    /**
     * ampere per square millimetre (A7)
     *
     * ampere per square millimetre
     */
    case REC20_AMPE_PER_SQUA_MILL = 'A7';

    /**
     * ampere second (A8)
     *
     * ampere second
     */
    case REC20_AMPE_SECO = 'A8';

    /**
     * ampere square metre (A5)
     *
     * ampere square metre
     */
    case REC20_AMPE_SQUA_METR = 'A5';

    /**
     * ampere square metre per joule second (A10)
     *
     * ampere square metre per joule second
     */
    case REC20_AMPE_SQUA_METR_PER_JOUL_SECO = 'A10';

    /**
     * ampere squared second (H32)
     *
     * ampere squared second
     */
    case REC20_AMPE_SQUA_SECO = 'H32';

    /**
     * angstrom (A11)
     *
     * angstrom
     */
    case REC20_ANGSTROM = 'A11';

    /**
     * anti-hemophilic factor (AHF) unit (AQ)
     *
     * anti-hemophilic factor (AHF) unit
     */
    case REC20_ANTI_FACT_AHF_UNIT = 'AQ';

    /**
     * assembly (AY)
     *
     * assembly
     */
    case REC20_ASSEMBLY = 'AY';

    /**
     * assortment (AS)
     *
     * assortment
     */
    case REC20_ASSORTMENT = 'AS';

    /**
     * astronomical unit (A12)
     *
     * astronomical unit
     */
    case REC20_ASTR_UNIT = 'A12';

    /**
     * attofarad (H48)
     *
     * attofarad
     */
    case REC20_ATTOFARAD = 'H48';

    /**
     * attojoule (A13)
     *
     * attojoule
     */
    case REC20_ATTOJOULE = 'A13';

    /**
     * average minute per call (AI)
     *
     * average minute per call
     */
    case REC20_AVER_MINU_PER_CALL = 'AI';

    /**
     * ball (AA)
     *
     * ball
     */
    case REC20_BALL = 'AA';

    /**
     * bar [unit of pressure] (BAR)
     *
     * bar [unit of pressure]
     */
    case REC20_BAR_UNIT_OF_PRES = 'BAR';

    /**
     * bar cubic metre per second (F92)
     *
     * bar cubic metre per second
     */
    case REC20_BAR_CUBI_METR_PER_SECO = 'F92';

    /**
     * bar litre per second (F91)
     *
     * bar litre per second
     */
    case REC20_BAR_LITR_PER_SECO = 'F91';

    /**
     * bar per bar (J56)
     *
     * bar per bar
     */
    case REC20_BAR_PER_BAR = 'J56';

    /**
     * bar per kelvin (F81)
     *
     * bar per kelvin
     */
    case REC20_BAR_PER_KELV = 'F81';

    /**
     * barn (A14)
     *
     * barn
     */
    case REC20_BARN = 'A14';

    /**
     * barn per electronvolt (A15)
     *
     * barn per electronvolt
     */
    case REC20_BARN_PER_ELEC = 'A15';

    /**
     * barn per steradian (A17)
     *
     * barn per steradian
     */
    case REC20_BARN_PER_STER = 'A17';

    /**
     * barn per steradian electronvolt (A16)
     *
     * barn per steradian electronvolt
     */
    case REC20_BARN_PER_STER_ELEC = 'A16';

    /**
     * barrel (UK petroleum) (J57)
     *
     * barrel (UK petroleum)
     */
    case REC20_BARR_UK_PETR = 'J57';

    /**
     * barrel (UK petroleum) per day (J59)
     *
     * barrel (UK petroleum) per day
     */
    case REC20_BARR_UK_PETR_PER_DAY = 'J59';

    /**
     * barrel (UK petroleum) per hour (J60)
     *
     * barrel (UK petroleum) per hour
     */
    case REC20_BARR_UK_PETR_PER_HOUR = 'J60';

    /**
     * barrel (UK petroleum) per minute (J58)
     *
     * barrel (UK petroleum) per minute
     */
    case REC20_BARR_UK_PETR_PER_MINU = 'J58';

    /**
     * barrel (UK petroleum) per second (J61)
     *
     * barrel (UK petroleum) per second
     */
    case REC20_BARR_UK_PETR_PER_SECO = 'J61';

    /**
     * barrel (US petroleum) per hour (J62)
     *
     * barrel (US petroleum) per hour
     */
    case REC20_BARR_US_PETR_PER_HOUR = 'J62';

    /**
     * barrel (US petroleum) per second (J63)
     *
     * barrel (US petroleum) per second
     */
    case REC20_BARR_US_PETR_PER_SECO = 'J63';

    /**
     * barrel (US) (BLL)
     *
     * barrel (US)
     */
    case REC20_BARR_US = 'BLL';

    /**
     * barrel (US) per day (B1)
     *
     * barrel (US) per day
     */
    case REC20_BARR_US_PER_DAY = 'B1';

    /**
     * barrel (US) per minute (5A)
     *
     * barrel (US) per minute
     */
    case REC20_BARR_US_PER_MINU = '5A';

    /**
     * barrel, imperial (B4)
     *
     * barrel, imperial
     */
    case REC20_BARR_IMPE = 'B4';

    /**
     * base box (BB)
     *
     * base box
     */
    case REC20_BASE_BOX = 'BB';

    /**
     * batch (5B)
     *
     * batch
     */
    case REC20_BATCH = '5B';

    /**
     * batting pound (B3)
     *
     * batting pound
     */
    case REC20_BATT_POUN = 'B3';

    /**
     * baud (J38)
     *
     * baud
     */
    case REC20_BAUD = 'J38';

    /**
     * beats per minute (BPM)
     *
     * beats per minute
     */
    case REC20_BEAT_PER_MINU = 'BPM';

    /**
     * Beaufort (M19)
     *
     * Beaufort
     */
    case REC20_BEAUFORT = 'M19';

    /**
     * becquerel (BQL)
     *
     * becquerel
     */
    case REC20_BECQUEREL = 'BQL';

    /**
     * becquerel per cubic metre (A19)
     *
     * becquerel per cubic metre
     */
    case REC20_BECQ_PER_CUBI_METR = 'A19';

    /**
     * becquerel per kilogram (A18)
     *
     * becquerel per kilogram
     */
    case REC20_BECQ_PER_KILO = 'A18';

    /**
     * bel (M72)
     *
     * bel
     */
    case REC20_BEL = 'M72';

    /**
     * bel per metre (P43)
     *
     * bel per metre
     */
    case REC20_BEL_PER_METR = 'P43';

    /**
     * big point (H82)
     *
     * big point
     */
    case REC20_BIG_POIN = 'H82';

    /**
     * billion (EUR) (BIL)
     *
     * billion (EUR)
     */
    case REC20_BILL_EUR = 'BIL';

    /**
     * biot (N96)
     *
     * biot
     */
    case REC20_BIOT = 'N96';

    /**
     * bit (A99)
     *
     * bit
     */
    case REC20_BIT = 'A99';

    /**
     * bit per cubic metre (F01)
     *
     * bit per cubic metre
     */
    case REC20_BIT_PER_CUBI_METR = 'F01';

    /**
     * bit per metre (E88)
     *
     * bit per metre
     */
    case REC20_BIT_PER_METR = 'E88';

    /**
     * bit per second (B10)
     *
     * bit per second
     */
    case REC20_BIT_PER_SECO = 'B10';

    /**
     * bit per square metre (E89)
     *
     * bit per square metre
     */
    case REC20_BIT_PER_SQUA_METR = 'E89';

    /**
     * blank (H21)
     *
     * blank
     */
    case REC20_BLANK = 'H21';

    /**
     * board foot (BFT)
     *
     * board foot
     */
    case REC20_BOAR_FOOT = 'BFT';

    /**
     * book (D63)
     *
     * book
     */
    case REC20_BOOK = 'D63';

    /**
     * brake horse power (BHP)
     *
     * brake horse power
     */
    case REC20_BRAK_HORS_POWE = 'BHP';

    /**
     * British thermal unit (39 ºF) (N66)
     *
     * British thermal unit (39 ºF)
     */
    case REC20_BRIT_THER_UNIT__F = 'N66';

    /**
     * British thermal unit (international table) (BTU)
     *
     * British thermal unit (international table)
     */
    case REC20_BRIT_THER_UNIT_INTE_TABL = 'BTU';

    /**
     * British thermal unit (international table) foot per hour square foot
     * degree Fahrenheit (J40)
     *
     * British thermal unit (international table) foot per hour square foot
     * degree Fahrenheit
     */
    case REC20_BRIT_THER_UNIT_INTE_TABL_FOOT_PER_HOUR_FOOT_DEGR_FAHR = 'J40';

    /**
     * British thermal unit (international table) inch per hour square foot
     * degree Fahrenheit (J41)
     *
     * British thermal unit (international table) inch per hour square foot
     * degree Fahrenheit
     */
    case REC20_BRIT_THER_UNIT_INTE_TABL_INCH_PER_HOUR_SQUA_DEGR_FAHR = 'J41';

    /**
     * British thermal unit (international table) inch per second square foot
     * degree Fahrenheit (J42)
     *
     * British thermal unit (international table) inch per second square foot
     * degree Fahrenheit
     */
    case REC20_BRIT_THER_UNIT_INTE_TABL_INCH_PER_SECO_SQUA_DEGR_FAHR = 'J42';

    /**
     * British thermal unit (international table) per cubic foot (N58)
     *
     * British thermal unit (international table) per cubic foot
     */
    case REC20_BRIT_THER_UNIT_INTE_TABL_PER_CUBI_FOOT = 'N58';

    /**
     * British thermal unit (international table) per degree Fahrenheit (N60)
     *
     * British thermal unit (international table) per degree Fahrenheit
     */
    case REC20_BRIT_THER_UNIT_INTE_TABL_PER_DEGR_FAHR = 'N60';

    /**
     * British thermal unit (international table) per degree Rankine (N62)
     *
     * British thermal unit (international table) per degree Rankine
     */
    case REC20_BRIT_THER_UNIT_INTE_TABL_PER_DEGR_RANK = 'N62';

    /**
     * British thermal unit (international table) per hour (2I)
     *
     * British thermal unit (international table) per hour
     */
    case REC20_BRIT_THER_UNIT_INTE_TABL_PER_HOUR = '2I';

    /**
     * British thermal unit (international table) per hour square foot degree
     * Fahrenheit (N74)
     *
     * British thermal unit (international table) per hour square foot degree
     * Fahrenheit
     */
    case REC20_BRIT_THER_UNIT_INTE_TABL_PER_HOUR_SQUA_FOOT_DEGR_FAHR = 'N74';

    /**
     * British thermal unit (international table) per hour square foot degree
     * Rankine (A23)
     *
     * British thermal unit (international table) per hour square foot degree
     * Rankine
     */
    case REC20_BRIT_THER_UNIT_INTE_TABL_PER_HOUR_SQUA_FOOT_DEGR_RANK = 'A23';

    /**
     * British thermal unit (international table) per minute (J44)
     *
     * British thermal unit (international table) per minute
     */
    case REC20_BRIT_THER_UNIT_INTE_TABL_PER_MINU = 'J44';

    /**
     * British thermal unit (international table) per pound (AZ)
     *
     * British thermal unit (international table) per pound
     */
    case REC20_BRIT_THER_UNIT_INTE_TABL_PER_POUN = 'AZ';

    /**
     * British thermal unit (international table) per pound degree Fahrenheit (J43)
     *
     * British thermal unit (international table) per pound degree Fahrenheit
     */
    case REC20_BRIT_THER_UNIT_INTE_TABL_PER_POUN_DEGR_FAHR = 'J43';

    /**
     * British thermal unit (international table) per pound degree Rankine (A21)
     *
     * British thermal unit (international table) per pound degree Rankine
     */
    case REC20_BRIT_THER_UNIT_INTE_TABL_PER_POUN_DEGR_RANK = 'A21';

    /**
     * British thermal unit (international table) per second (J45)
     *
     * British thermal unit (international table) per second
     */
    case REC20_BRIT_THER_UNIT_INTE_TABL_PER_SECO = 'J45';

    /**
     * British thermal unit (international table) per second foot degree Rankine (A22)
     *
     * British thermal unit (international table) per second foot degree Rankine
     */
    case REC20_BRIT_THER_UNIT_INTE_TABL_PER_SECO_FOOT_DEGR_RANK = 'A22';

    /**
     * British thermal unit (international table) per second square foot degree
     * Fahrenheit (N76)
     *
     * British thermal unit (international table) per second square foot degree
     * Fahrenheit
     */
    case REC20_BRIT_THER_UNIT_INTE_TABL_PER_SECO_SQUA_FOOT_DEGR_FAHR = 'N76';

    /**
     * British thermal unit (international table) per second square foot degree
     * Rankine (A20)
     *
     * British thermal unit (international table) per second square foot degree
     * Rankine
     */
    case REC20_BRIT_THER_UNIT_INTE_TABL_PER_SECO_SQUA_FOOT_DEGR_RANK = 'A20';

    /**
     * British thermal unit (international table) per square foot (P37)
     *
     * British thermal unit (international table) per square foot
     */
    case REC20_BRIT_THER_UNIT_INTE_TABL_PER_SQUA_FOOT = 'P37';

    /**
     * British thermal unit (international table) per square foot hour (N50)
     *
     * British thermal unit (international table) per square foot hour
     */
    case REC20_BRIT_THER_UNIT_INTE_TABL_PER_SQUA_FOOT_HOUR = 'N50';

    /**
     * British thermal unit (international table) per square foot second (N53)
     *
     * British thermal unit (international table) per square foot second
     */
    case REC20_BRIT_THER_UNIT_INTE_TABL_PER_SQUA_FOOT_SECO = 'N53';

    /**
     * British thermal unit (international table) per square inch second (N55)
     *
     * British thermal unit (international table) per square inch second
     */
    case REC20_BRIT_THER_UNIT_INTE_TABL_PER_SQUA_INCH_SECO = 'N55';

    /**
     * British thermal unit (mean) (J39)
     *
     * British thermal unit (mean)
     */
    case REC20_BRIT_THER_UNIT_MEAN = 'J39';

    /**
     * British thermal unit (thermochemical) foot per hour square foot degree
     * Fahrenheit (J46)
     *
     * British thermal unit (thermochemical) foot per hour square foot degree
     * Fahrenheit
     */
    case REC20_BRIT_THER_UNIT_THER_FOOT_PER_HOUR_SQUA_DEGR_FAHR = 'J46';

    /**
     * British thermal unit (thermochemical) inch per hour square foot degree
     * Fahrenheit (J48)
     *
     * British thermal unit (thermochemical) inch per hour square foot degree
     * Fahrenheit
     */
    case REC20_BRIT_THER_UNIT_THER_INCH_PER_HOUR_SQUA_DEGR_FAHR = 'J48';

    /**
     * British thermal unit (thermochemical) inch per second square foot degree
     * Fahrenheit (J49)
     *
     * British thermal unit (thermochemical) inch per second square foot degree
     * Fahrenheit
     */
    case REC20_BRIT_THER_UNIT_THER_INCH_PER_SECO_FOOT_DEGR_FAHR = 'J49';

    /**
     * British thermal unit (thermochemical) per cubic foot (N59)
     *
     * British thermal unit (thermochemical) per cubic foot
     */
    case REC20_BRIT_THER_UNIT_THER_PER_CUBI_FOOT = 'N59';

    /**
     * British thermal unit (thermochemical) per degree Fahrenheit (N61)
     *
     * British thermal unit (thermochemical) per degree Fahrenheit
     */
    case REC20_BRIT_THER_UNIT_THER_PER_DEGR_FAHR = 'N61';

    /**
     * British thermal unit (thermochemical) per degree Rankine (N63)
     *
     * British thermal unit (thermochemical) per degree Rankine
     */
    case REC20_BRIT_THER_UNIT_THER_PER_DEGR_RANK = 'N63';

    /**
     * British thermal unit (thermochemical) per hour (J47)
     *
     * British thermal unit (thermochemical) per hour
     */
    case REC20_BRIT_THER_UNIT_THER_PER_HOUR = 'J47';

    /**
     * British thermal unit (thermochemical) per hour square foot degree
     * Fahrenheit (N75)
     *
     * British thermal unit (thermochemical) per hour square foot degree
     * Fahrenheit
     */
    case REC20_BRIT_THER_UNIT_THER_PER_HOUR_SQUA_FOOT_DEGR_FAHR = 'N75';

    /**
     * British thermal unit (thermochemical) per minute (J51)
     *
     * British thermal unit (thermochemical) per minute
     */
    case REC20_BRIT_THER_UNIT_THER_PER_MINU = 'J51';

    /**
     * British thermal unit (thermochemical) per pound (N73)
     *
     * British thermal unit (thermochemical) per pound
     */
    case REC20_BRIT_THER_UNIT_THER_PER_POUN = 'N73';

    /**
     * British thermal unit (thermochemical) per pound degree Fahrenheit (J50)
     *
     * British thermal unit (thermochemical) per pound degree Fahrenheit
     */
    case REC20_BRIT_THER_UNIT_THER_PER_POUN_DEGR_FAHR = 'J50';

    /**
     * British thermal unit (thermochemical) per pound degree Rankine (N64)
     *
     * British thermal unit (thermochemical) per pound degree Rankine
     */
    case REC20_BRIT_THER_UNIT_THER_PER_POUN_DEGR_RANK = 'N64';

    /**
     * British thermal unit (thermochemical) per second (J52)
     *
     * British thermal unit (thermochemical) per second
     */
    case REC20_BRIT_THER_UNIT_THER_PER_SECO = 'J52';

    /**
     * British thermal unit (thermochemical) per second square foot degree
     * Fahrenheit (N77)
     *
     * British thermal unit (thermochemical) per second square foot degree
     * Fahrenheit
     */
    case REC20_BRIT_THER_UNIT_THER_PER_SECO_SQUA_FOOT_DEGR_FAHR = 'N77';

    /**
     * British thermal unit (thermochemical) per square foot (P38)
     *
     * British thermal unit (thermochemical) per square foot
     */
    case REC20_BRIT_THER_UNIT_THER_PER_SQUA_FOOT = 'P38';

    /**
     * British thermal unit (thermochemical) per square foot hour (N51)
     *
     * British thermal unit (thermochemical) per square foot hour
     */
    case REC20_BRIT_THER_UNIT_THER_PER_SQUA_FOOT_HOUR = 'N51';

    /**
     * British thermal unit (thermochemical) per square foot minute (N52)
     *
     * British thermal unit (thermochemical) per square foot minute
     */
    case REC20_BRIT_THER_UNIT_THER_PER_SQUA_FOOT_MINU = 'N52';

    /**
     * British thermal unit (thermochemical) per square foot second (N54)
     *
     * British thermal unit (thermochemical) per square foot second
     */
    case REC20_BRIT_THER_UNIT_THER_PER_SQUA_FOOT_SECO = 'N54';

    /**
     * bulk pack (AB)
     *
     * bulk pack
     */
    case REC20_BULK_PACK = 'AB';

    /**
     * bushel (UK) (BUI)
     *
     * bushel (UK)
     */
    case REC20_BUSH_UK = 'BUI';

    /**
     * bushel (UK) per day (J64)
     *
     * bushel (UK) per day
     */
    case REC20_BUSH_UK_PER_DAY = 'J64';

    /**
     * bushel (UK) per hour (J65)
     *
     * bushel (UK) per hour
     */
    case REC20_BUSH_UK_PER_HOUR = 'J65';

    /**
     * bushel (UK) per minute (J66)
     *
     * bushel (UK) per minute
     */
    case REC20_BUSH_UK_PER_MINU = 'J66';

    /**
     * bushel (UK) per second (J67)
     *
     * bushel (UK) per second
     */
    case REC20_BUSH_UK_PER_SECO = 'J67';

    /**
     * bushel (US dry) per day (J68)
     *
     * bushel (US dry) per day
     */
    case REC20_BUSH_US_DRY_PER_DAY = 'J68';

    /**
     * bushel (US dry) per hour (J69)
     *
     * bushel (US dry) per hour
     */
    case REC20_BUSH_US_DRY_PER_HOUR = 'J69';

    /**
     * bushel (US dry) per minute (J70)
     *
     * bushel (US dry) per minute
     */
    case REC20_BUSH_US_DRY_PER_MINU = 'J70';

    /**
     * bushel (US dry) per second (J71)
     *
     * bushel (US dry) per second
     */
    case REC20_BUSH_US_DRY_PER_SECO = 'J71';

    /**
     * bushel (US) (BUA)
     *
     * bushel (US)
     */
    case REC20_BUSH_US = 'BUA';

    /**
     * byte (AD)
     *
     * byte
     */
    case REC20_BYTE = 'AD';

    /**
     * byte per second (P93)
     *
     * byte per second
     */
    case REC20_BYTE_PER_SECO = 'P93';

    /**
     * cake (KA)
     *
     * cake
     */
    case REC20_CAKE = 'KA';

    /**
     * call (C0)
     *
     * call
     */
    case REC20_CALL = 'C0';

    /**
     * calorie (20 ºC) (N69)
     *
     * calorie (20 ºC)
     */
    case REC20_CALO__C = 'N69';

    /**
     * calorie (international table) per gram degree Celsius (J76)
     *
     * calorie (international table) per gram degree Celsius
     */
    case REC20_CALO_INTE_TABL_PER_GRAM_DEGR_CELS = 'J76';

    /**
     * calorie (mean) (J75)
     *
     * calorie (mean)
     */
    case REC20_CALO_MEAN = 'J75';

    /**
     * calorie (thermochemical) per centimetre second degree Celsius (J78)
     *
     * calorie (thermochemical) per centimetre second degree Celsius
     */
    case REC20_CALO_THER_PER_CENT_SECO_DEGR_CELS = 'J78';

    /**
     * calorie (thermochemical) per gram degree Celsius (J79)
     *
     * calorie (thermochemical) per gram degree Celsius
     */
    case REC20_CALO_THER_PER_GRAM_DEGR_CELS = 'J79';

    /**
     * calorie (thermochemical) per minute (J81)
     *
     * calorie (thermochemical) per minute
     */
    case REC20_CALO_THER_PER_MINU = 'J81';

    /**
     * calorie (thermochemical) per second (J82)
     *
     * calorie (thermochemical) per second
     */
    case REC20_CALO_THER_PER_SECO = 'J82';

    /**
     * calorie (thermochemical) per square centimetre (P39)
     *
     * calorie (thermochemical) per square centimetre
     */
    case REC20_CALO_THER_PER_SQUA_CENT = 'P39';

    /**
     * calorie (thermochemical) per square centimetre minute (N56)
     *
     * calorie (thermochemical) per square centimetre minute
     */
    case REC20_CALO_THER_PER_SQUA_CENT_MINU = 'N56';

    /**
     * calorie (thermochemical) per square centimetre second (N57)
     *
     * calorie (thermochemical) per square centimetre second
     */
    case REC20_CALO_THER_PER_SQUA_CENT_SECO = 'N57';

    /**
     * candela (CDL)
     *
     * candela
     */
    case REC20_CANDELA = 'CDL';

    /**
     * candela per square foot (P32)
     *
     * candela per square foot
     */
    case REC20_CAND_PER_SQUA_FOOT = 'P32';

    /**
     * candela per square inch (P28)
     *
     * candela per square inch
     */
    case REC20_CAND_PER_SQUA_INCH = 'P28';

    /**
     * candela per square metre (A24)
     *
     * candela per square metre
     */
    case REC20_CAND_PER_SQUA_METR = 'A24';

    /**
     * card (CG)
     *
     * card
     */
    case REC20_CARD = 'CG';

    /**
     * carrying capacity in metric ton (CCT)
     *
     * carrying capacity in metric ton
     */
    case REC20_CARR_CAPA_IN_METR_TON = 'CCT';

    /**
     * cental (UK) (CNT)
     *
     * cental (UK)
     */
    case REC20_CENT_UK = 'CNT';

    /**
     * centigram (CGM)
     *
     * centigram
     */
    case REC20_CENTIGRAM = 'CGM';

    /**
     * centilitre (CLT)
     *
     * centilitre
     */
    case REC20_CENTILITRE = 'CLT';

    /**
     * centimetre (CMT)
     *
     * centimetre
     */
    case REC20_CENTIMETRE = 'CMT';

    /**
     * centimetre of mercury (0 ºC) (N13)
     *
     * centimetre of mercury (0 ºC)
     */
    case REC20_CENT_OF_MERC__C = 'N13';

    /**
     * centimetre of water (4 ºC) (N14)
     *
     * centimetre of water (4 ºC)
     */
    case REC20_CENT_OF_WATE__C = 'N14';

    /**
     * centimetre per bar (G04)
     *
     * centimetre per bar
     */
    case REC20_CENT_PER_BAR = 'G04';

    /**
     * centimetre per hour (H49)
     *
     * centimetre per hour
     */
    case REC20_CENT_PER_HOUR = 'H49';

    /**
     * centimetre per kelvin (F51)
     *
     * centimetre per kelvin
     */
    case REC20_CENT_PER_KELV = 'F51';

    /**
     * centimetre per second (2M)
     *
     * centimetre per second
     */
    case REC20_CENT_PER_SECO = '2M';

    /**
     * centimetre per second bar (J85)
     *
     * centimetre per second bar
     */
    case REC20_CENT_PER_SECO_BAR = 'J85';

    /**
     * centimetre per second kelvin (J84)
     *
     * centimetre per second kelvin
     */
    case REC20_CENT_PER_SECO_KELV = 'J84';

    /**
     * centimetre per second squared (M39)
     *
     * centimetre per second squared
     */
    case REC20_CENT_PER_SECO_SQUA = 'M39';

    /**
     * centinewton metre (J72)
     *
     * centinewton metre
     */
    case REC20_CENT_METR = 'J72';

    /**
     * centipoise (C7)
     *
     * centipoise
     */
    case REC20_CENTIPOISE = 'C7';

    /**
     * centistokes (4C)
     *
     * centistokes
     */
    case REC20_CENTISTOKES = '4C';

    /**
     * chain (based on U.S. survey foot) (M49)
     *
     * chain (based on U.S. survey foot)
     */
    case REC20_CHAI_BASE_ON_US_SURV_FOOT = 'M49';

    /**
     * circular mil (M47)
     *
     * circular mil
     */
    case REC20_CIRC_MIL = 'M47';

    /**
     * clo (J83)
     *
     * clo
     */
    case REC20_CLO = 'J83';

    /**
     * coil group (C9)
     *
     * coil group
     */
    case REC20_COIL_GROU = 'C9';

    /**
     * common year (L95)
     *
     * common year
     */
    case REC20_COMM_YEAR = 'L95';

    /**
     * content gram (CTG)
     *
     * content gram
     */
    case REC20_CONT_GRAM = 'CTG';

    /**
     * content ton (metric) (CTN)
     *
     * content ton (metric)
     */
    case REC20_CONT_TON_METR = 'CTN';

    /**
     * conventional metre of water (N23)
     *
     * conventional metre of water
     */
    case REC20_CONV_METR_OF_WATE = 'N23';

    /**
     * cord (WCD)
     *
     * cord
     */
    case REC20_CORD = 'WCD';

    /**
     * cord (128 ft3) (M68)
     *
     * cord (128 ft3)
     */
    case REC20_CORD__FT = 'M68';

    /**
     * coulomb (COU)
     *
     * coulomb
     */
    case REC20_COULOMB = 'COU';

    /**
     * coulomb metre (A26)
     *
     * coulomb metre
     */
    case REC20_COUL_METR = 'A26';

    /**
     * coulomb metre squared per volt (A27)
     *
     * coulomb metre squared per volt
     */
    case REC20_COUL_METR_SQUA_PER_VOLT = 'A27';

    /**
     * coulomb per cubic centimetre (A28)
     *
     * coulomb per cubic centimetre
     */
    case REC20_COUL_PER_CUBI_CENT = 'A28';

    /**
     * coulomb per cubic metre (A29)
     *
     * coulomb per cubic metre
     */
    case REC20_COUL_PER_CUBI_METR = 'A29';

    /**
     * coulomb per cubic millimetre (A30)
     *
     * coulomb per cubic millimetre
     */
    case REC20_COUL_PER_CUBI_MILL = 'A30';

    /**
     * coulomb per kilogram (CKG)
     *
     * coulomb per kilogram
     */
    case REC20_COUL_PER_KILO = 'CKG';

    /**
     * coulomb per kilogram second (A31)
     *
     * coulomb per kilogram second
     */
    case REC20_COUL_PER_KILO_SECO = 'A31';

    /**
     * coulomb per metre (P10)
     *
     * coulomb per metre
     */
    case REC20_COUL_PER_METR = 'P10';

    /**
     * coulomb per mole (A32)
     *
     * coulomb per mole
     */
    case REC20_COUL_PER_MOLE = 'A32';

    /**
     * coulomb per square centimetre (A33)
     *
     * coulomb per square centimetre
     */
    case REC20_COUL_PER_SQUA_CENT = 'A33';

    /**
     * coulomb per square metre (A34)
     *
     * coulomb per square metre
     */
    case REC20_COUL_PER_SQUA_METR = 'A34';

    /**
     * coulomb per square millimetre (A35)
     *
     * coulomb per square millimetre
     */
    case REC20_COUL_PER_SQUA_MILL = 'A35';

    /**
     * coulomb square metre per kilogram (J53)
     *
     * coulomb square metre per kilogram
     */
    case REC20_COUL_SQUA_METR_PER_KILO = 'J53';

    /**
     * credit (B17)
     *
     * credit
     */
    case REC20_CREDIT = 'B17';

    /**
     * cubic centimetre (CMQ)
     *
     * cubic centimetre
     */
    case REC20_CUBI_CENT = 'CMQ';

    /**
     * cubic centimetre per bar (G94)
     *
     * cubic centimetre per bar
     */
    case REC20_CUBI_CENT_PER_BAR = 'G94';

    /**
     * cubic centimetre per cubic metre (J87)
     *
     * cubic centimetre per cubic metre
     */
    case REC20_CUBI_CENT_PER_CUBI_METR = 'J87';

    /**
     * cubic centimetre per day (G47)
     *
     * cubic centimetre per day
     */
    case REC20_CUBI_CENT_PER_DAY = 'G47';

    /**
     * cubic centimetre per day bar (G78)
     *
     * cubic centimetre per day bar
     */
    case REC20_CUBI_CENT_PER_DAY_BAR = 'G78';

    /**
     * cubic centimetre per day kelvin (G61)
     *
     * cubic centimetre per day kelvin
     */
    case REC20_CUBI_CENT_PER_DAY_KELV = 'G61';

    /**
     * cubic centimetre per hour (G48)
     *
     * cubic centimetre per hour
     */
    case REC20_CUBI_CENT_PER_HOUR = 'G48';

    /**
     * cubic centimetre per hour bar (G79)
     *
     * cubic centimetre per hour bar
     */
    case REC20_CUBI_CENT_PER_HOUR_BAR = 'G79';

    /**
     * cubic centimetre per hour kelvin (G62)
     *
     * cubic centimetre per hour kelvin
     */
    case REC20_CUBI_CENT_PER_HOUR_KELV = 'G62';

    /**
     * cubic centimetre per kelvin (G27)
     *
     * cubic centimetre per kelvin
     */
    case REC20_CUBI_CENT_PER_KELV = 'G27';

    /**
     * cubic centimetre per minute (G49)
     *
     * cubic centimetre per minute
     */
    case REC20_CUBI_CENT_PER_MINU = 'G49';

    /**
     * cubic centimetre per minute bar (G80)
     *
     * cubic centimetre per minute bar
     */
    case REC20_CUBI_CENT_PER_MINU_BAR = 'G80';

    /**
     * cubic centimetre per minute kelvin (G63)
     *
     * cubic centimetre per minute kelvin
     */
    case REC20_CUBI_CENT_PER_MINU_KELV = 'G63';

    /**
     * cubic centimetre per mole (A36)
     *
     * cubic centimetre per mole
     */
    case REC20_CUBI_CENT_PER_MOLE = 'A36';

    /**
     * cubic centimetre per second (2J)
     *
     * cubic centimetre per second
     */
    case REC20_CUBI_CENT_PER_SECO = '2J';

    /**
     * cubic centimetre per second bar (G81)
     *
     * cubic centimetre per second bar
     */
    case REC20_CUBI_CENT_PER_SECO_BAR = 'G81';

    /**
     * cubic centimetre per second kelvin (G64)
     *
     * cubic centimetre per second kelvin
     */
    case REC20_CUBI_CENT_PER_SECO_KELV = 'G64';

    /**
     * cubic decametre (DMA)
     *
     * cubic decametre
     */
    case REC20_CUBI_DECA = 'DMA';

    /**
     * cubic decimetre (DMQ)
     *
     * cubic decimetre
     */
    case REC20_CUBI_DECI = 'DMQ';

    /**
     * cubic decimetre per cubic metre (J91)
     *
     * cubic decimetre per cubic metre
     */
    case REC20_CUBI_DECI_PER_CUBI_METR = 'J91';

    /**
     * cubic decimetre per day (J90)
     *
     * cubic decimetre per day
     */
    case REC20_CUBI_DECI_PER_DAY = 'J90';

    /**
     * cubic decimetre per hour (E92)
     *
     * cubic decimetre per hour
     */
    case REC20_CUBI_DECI_PER_HOUR = 'E92';

    /**
     * cubic decimetre per kilogram (N28)
     *
     * cubic decimetre per kilogram
     */
    case REC20_CUBI_DECI_PER_KILO = 'N28';

    /**
     * cubic decimetre per minute (J92)
     *
     * cubic decimetre per minute
     */
    case REC20_CUBI_DECI_PER_MINU = 'J92';

    /**
     * cubic decimetre per mole (A37)
     *
     * cubic decimetre per mole
     */
    case REC20_CUBI_DECI_PER_MOLE = 'A37';

    /**
     * cubic decimetre per second (J93)
     *
     * cubic decimetre per second
     */
    case REC20_CUBI_DECI_PER_SECO = 'J93';

    /**
     * cubic foot (FTQ)
     *
     * cubic foot
     */
    case REC20_CUBI_FOOT = 'FTQ';

    /**
     * cubic foot per day (K22)
     *
     * cubic foot per day
     */
    case REC20_CUBI_FOOT_PER_DAY = 'K22';

    /**
     * cubic foot per degree Fahrenheit (K21)
     *
     * cubic foot per degree Fahrenheit
     */
    case REC20_CUBI_FOOT_PER_DEGR_FAHR = 'K21';

    /**
     * cubic foot per hour (2K)
     *
     * cubic foot per hour
     */
    case REC20_CUBI_FOOT_PER_HOUR = '2K';

    /**
     * cubic foot per minute (2L)
     *
     * cubic foot per minute
     */
    case REC20_CUBI_FOOT_PER_MINU = '2L';

    /**
     * cubic foot per pound (N29)
     *
     * cubic foot per pound
     */
    case REC20_CUBI_FOOT_PER_POUN = 'N29';

    /**
     * cubic foot per psi (K23)
     *
     * cubic foot per psi
     */
    case REC20_CUBI_FOOT_PER_PSI = 'K23';

    /**
     * cubic foot per second (E17)
     *
     * cubic foot per second
     */
    case REC20_CUBI_FOOT_PER_SECO = 'E17';

    /**
     * cubic hectometre (H19)
     *
     * cubic hectometre
     */
    case REC20_CUBI_HECT = 'H19';

    /**
     * cubic inch (INQ)
     *
     * cubic inch
     */
    case REC20_CUBI_INCH = 'INQ';

    /**
     * cubic inch per hour (G56)
     *
     * cubic inch per hour
     */
    case REC20_CUBI_INCH_PER_HOUR = 'G56';

    /**
     * cubic inch per minute (G57)
     *
     * cubic inch per minute
     */
    case REC20_CUBI_INCH_PER_MINU = 'G57';

    /**
     * cubic inch per pound (N30)
     *
     * cubic inch per pound
     */
    case REC20_CUBI_INCH_PER_POUN = 'N30';

    /**
     * cubic inch per second (G58)
     *
     * cubic inch per second
     */
    case REC20_CUBI_INCH_PER_SECO = 'G58';

    /**
     * cubic kilometre (H20)
     *
     * cubic kilometre
     */
    case REC20_CUBI_KILO = 'H20';

    /**
     * cubic metre (MTQ)
     *
     * cubic metre
     */
    case REC20_CUBI_METR = 'MTQ';

    /**
     * Cubic Metre Day (MQD)
     *
     * Cubic Metre Day
     */
    case REC20_CUBI_METR_DAY = 'MQD';

    /**
     * Cubic Metre Month (MQM)
     *
     * Cubic Metre Month
     */
    case REC20_CUBI_METR_MONT = 'MQM';

    /**
     * cubic metre per bar (G96)
     *
     * cubic metre per bar
     */
    case REC20_CUBI_METR_PER_BAR = 'G96';

    /**
     * cubic metre per coulomb (A38)
     *
     * cubic metre per coulomb
     */
    case REC20_CUBI_METR_PER_COUL = 'A38';

    /**
     * cubic metre per cubic metre (H60)
     *
     * cubic metre per cubic metre
     */
    case REC20_CUBI_METR_PER_CUBI_METR = 'H60';

    /**
     * cubic metre per day (G52)
     *
     * cubic metre per day
     */
    case REC20_CUBI_METR_PER_DAY = 'G52';

    /**
     * cubic metre per day bar (G86)
     *
     * cubic metre per day bar
     */
    case REC20_CUBI_METR_PER_DAY_BAR = 'G86';

    /**
     * cubic metre per day kelvin (G69)
     *
     * cubic metre per day kelvin
     */
    case REC20_CUBI_METR_PER_DAY_KELV = 'G69';

    /**
     * cubic metre per hour (MQH)
     *
     * cubic metre per hour
     */
    case REC20_CUBI_METR_PER_HOUR = 'MQH';

    /**
     * cubic metre per hour bar (G87)
     *
     * cubic metre per hour bar
     */
    case REC20_CUBI_METR_PER_HOUR_BAR = 'G87';

    /**
     * cubic metre per hour kelvin (G70)
     *
     * cubic metre per hour kelvin
     */
    case REC20_CUBI_METR_PER_HOUR_KELV = 'G70';

    /**
     * cubic metre per kelvin (G29)
     *
     * cubic metre per kelvin
     */
    case REC20_CUBI_METR_PER_KELV = 'G29';

    /**
     * cubic metre per kilogram (A39)
     *
     * cubic metre per kilogram
     */
    case REC20_CUBI_METR_PER_KILO = 'A39';

    /**
     * cubic metre per minute (G53)
     *
     * cubic metre per minute
     */
    case REC20_CUBI_METR_PER_MINU = 'G53';

    /**
     * cubic metre per minute bar (G88)
     *
     * cubic metre per minute bar
     */
    case REC20_CUBI_METR_PER_MINU_BAR = 'G88';

    /**
     * cubic metre per minute kelvin (G71)
     *
     * cubic metre per minute kelvin
     */
    case REC20_CUBI_METR_PER_MINU_KELV = 'G71';

    /**
     * cubic metre per mole (A40)
     *
     * cubic metre per mole
     */
    case REC20_CUBI_METR_PER_MOLE = 'A40';

    /**
     * cubic metre per pascal (M71)
     *
     * cubic metre per pascal
     */
    case REC20_CUBI_METR_PER_PASC = 'M71';

    /**
     * cubic metre per second (MQS)
     *
     * cubic metre per second
     */
    case REC20_CUBI_METR_PER_SECO = 'MQS';

    /**
     * cubic metre per second bar (G89)
     *
     * cubic metre per second bar
     */
    case REC20_CUBI_METR_PER_SECO_BAR = 'G89';

    /**
     * cubic metre per second kelvin (G72)
     *
     * cubic metre per second kelvin
     */
    case REC20_CUBI_METR_PER_SECO_KELV = 'G72';

    /**
     * cubic metre per second pascal (N45)
     *
     * cubic metre per second pascal
     */
    case REC20_CUBI_METR_PER_SECO_PASC = 'N45';

    /**
     * cubic metre per second square metre (P87)
     *
     * cubic metre per second square metre
     */
    case REC20_CUBI_METR_PER_SECO_SQUA_METR = 'P87';

    /**
     * Cubic Metre Week (MQW)
     *
     * Cubic Metre Week
     */
    case REC20_CUBI_METR_WEEK = 'MQW';

    /**
     * cubic mile (UK statute) (M69)
     *
     * cubic mile (UK statute)
     */
    case REC20_CUBI_MILE_UK_STAT = 'M69';

    /**
     * cubic millimetre (MMQ)
     *
     * cubic millimetre
     */
    case REC20_CUBI_MILL = 'MMQ';

    /**
     * cubic millimetre per cubic metre (L21)
     *
     * cubic millimetre per cubic metre
     */
    case REC20_CUBI_MILL_PER_CUBI_METR = 'L21';

    /**
     * cubic yard (YDQ)
     *
     * cubic yard
     */
    case REC20_CUBI_YARD = 'YDQ';

    /**
     * cubic yard per day (M12)
     *
     * cubic yard per day
     */
    case REC20_CUBI_YARD_PER_DAY = 'M12';

    /**
     * cubic yard per degree Fahrenheit (M11)
     *
     * cubic yard per degree Fahrenheit
     */
    case REC20_CUBI_YARD_PER_DEGR_FAHR = 'M11';

    /**
     * cubic yard per hour (M13)
     *
     * cubic yard per hour
     */
    case REC20_CUBI_YARD_PER_HOUR = 'M13';

    /**
     * cubic yard per minute (M15)
     *
     * cubic yard per minute
     */
    case REC20_CUBI_YARD_PER_MINU = 'M15';

    /**
     * cubic yard per psi (M14)
     *
     * cubic yard per psi
     */
    case REC20_CUBI_YARD_PER_PSI = 'M14';

    /**
     * cubic yard per second (M16)
     *
     * cubic yard per second
     */
    case REC20_CUBI_YARD_PER_SECO = 'M16';

    /**
     * cup [unit of volume] (G21)
     *
     * cup [unit of volume]
     */
    case REC20_CUP_UNIT_OF_VOLU = 'G21';

    /**
     * curie (CUR)
     *
     * curie
     */
    case REC20_CURIE = 'CUR';

    /**
     * curie per kilogram (A42)
     *
     * curie per kilogram
     */
    case REC20_CURI_PER_KILO = 'A42';

    /**
     * cycle (B7)
     *
     * cycle
     */
    case REC20_CYCLE = 'B7';

    /**
     * day (DAY)
     *
     * day
     */
    case REC20_DAY = 'DAY';

    /**
     * deadweight tonnage (A43)
     *
     * deadweight tonnage
     */
    case REC20_DEAD_TONN = 'A43';

    /**
     * decade (DEC)
     *
     * decade
     */
    case REC20_DECADE = 'DEC';

    /**
     * decade (logarithmic) (P41)
     *
     * decade (logarithmic)
     */
    case REC20_DECA_LOGA = 'P41';

    /**
     * decagram (DJ)
     *
     * decagram
     */
    case REC20_DECAGRAM = 'DJ';

    /**
     * decalitre (A44)
     *
     * decalitre
     */
    case REC20_DECALITRE = 'A44';

    /**
     * decametre (A45)
     *
     * decametre
     */
    case REC20_DECAMETRE = 'A45';

    /**
     * decapascal (H75)
     *
     * decapascal
     */
    case REC20_DECAPASCAL = 'H75';

    /**
     * decare (DAA)
     *
     * decare
     */
    case REC20_DECARE = 'DAA';

    /**
     * decibel (2N)
     *
     * decibel
     */
    case REC20_DECIBEL = '2N';

    /**
     * decibel per kilometre (H51)
     *
     * decibel per kilometre
     */
    case REC20_DECI_PER_KILO = 'H51';

    /**
     * decibel per metre (H52)
     *
     * decibel per metre
     */
    case REC20_DECI_PER_METR = 'H52';

    /**
     * Decibel watt (DBW)
     *
     * Decibel watt
     */
    case REC20_DECI_WATT = 'DBW';

    /**
     * Decibel-milliwatts (DBM)
     *
     * Decibel-milliwatts
     */
    case REC20_DECIBELMILLIWATTS = 'DBM';

    /**
     * decigram (DG)
     *
     * decigram
     */
    case REC20_DECIGRAM = 'DG';

    /**
     * decilitre (DLT)
     *
     * decilitre
     */
    case REC20_DECILITRE = 'DLT';

    /**
     * decilitre per gram (22)
     *
     * decilitre per gram
     */
    case REC20_DECI_PER_GRAM = '22';

    /**
     * decimetre (DMT)
     *
     * decimetre
     */
    case REC20_DECIMETRE = 'DMT';

    /**
     * decinewton metre (DN)
     *
     * decinewton metre
     */
    case REC20_DECI_METR = 'DN';

    /**
     * decitex (A47)
     *
     * decitex
     */
    case REC20_DECITEX = 'A47';

    /**
     * decitonne (DTN)
     *
     * decitonne
     */
    case REC20_DECITONNE = 'DTN';

    /**
     * degree [unit of angle] (DD)
     *
     * degree [unit of angle]
     */
    case REC20_DEGR_UNIT_OF_ANGL = 'DD';

    /**
     * degree [unit of angle] per second squared (M45)
     *
     * degree [unit of angle] per second squared
     */
    case REC20_DEGR_UNIT_OF_ANGL_PER_SECO_SQUA = 'M45';

    /**
     * degree API (J13)
     *
     * degree API
     */
    case REC20_DEGR_API = 'J13';

    /**
     * degree Balling (J17)
     *
     * degree Balling
     */
    case REC20_DEGR_BALL = 'J17';

    /**
     * degree Baume (origin scale) (J14)
     *
     * degree Baume (origin scale)
     */
    case REC20_DEGR_BAUM_ORIG_SCAL = 'J14';

    /**
     * degree Baume (US heavy) (J15)
     *
     * degree Baume (US heavy)
     */
    case REC20_DEGR_BAUM_US_HEAV = 'J15';

    /**
     * degree Baume (US light) (J16)
     *
     * degree Baume (US light)
     */
    case REC20_DEGR_BAUM_US_LIGH = 'J16';

    /**
     * degree Brix (J18)
     *
     * degree Brix
     */
    case REC20_DEGR_BRIX = 'J18';

    /**
     * degree Celsius (CEL)
     *
     * degree Celsius
     */
    case REC20_DEGR_CELS = 'CEL';

    /**
     * degree Celsius per bar (F60)
     *
     * degree Celsius per bar
     */
    case REC20_DEGR_CELS_PER_BAR = 'F60';

    /**
     * degree Celsius per hour (H12)
     *
     * degree Celsius per hour
     */
    case REC20_DEGR_CELS_PER_HOUR = 'H12';

    /**
     * degree Celsius per kelvin (E98)
     *
     * degree Celsius per kelvin
     */
    case REC20_DEGR_CELS_PER_KELV = 'E98';

    /**
     * degree Celsius per minute (H13)
     *
     * degree Celsius per minute
     */
    case REC20_DEGR_CELS_PER_MINU = 'H13';

    /**
     * degree Celsius per second (H14)
     *
     * degree Celsius per second
     */
    case REC20_DEGR_CELS_PER_SECO = 'H14';

    /**
     * degree day (E10)
     *
     * degree day
     */
    case REC20_DEGR_DAY = 'E10';

    /**
     * degree Fahrenheit (FAH)
     *
     * degree Fahrenheit
     */
    case REC20_DEGR_FAHR = 'FAH';

    /**
     * degree Fahrenheit hour per British thermal unit (international table) (N84)
     *
     * degree Fahrenheit hour per British thermal unit (international table)
     */
    case REC20_DEGR_FAHR_HOUR_PER_BRIT_THER_UNIT_INTE_TABL = 'N84';

    /**
     * degree Fahrenheit hour per British thermal unit (thermochemical) (N85)
     *
     * degree Fahrenheit hour per British thermal unit (thermochemical)
     */
    case REC20_DEGR_FAHR_HOUR_PER_BRIT_THER_UNIT_THER = 'N85';

    /**
     * degree Fahrenheit hour square foot per British thermal unit (international
     * table) (J22)
     *
     * degree Fahrenheit hour square foot per British thermal unit (international
     * table)
     */
    case REC20_DEGR_FAHR_HOUR_SQUA_FOOT_PER_BRIT_THER_UNIT_INTE_TABL = 'J22';

    /**
     * degree Fahrenheit hour square foot per British thermal unit (international
     * table) inch (N88)
     *
     * degree Fahrenheit hour square foot per British thermal unit (international
     * table) inch
     */
    case REC20_DEGR_FAHR_HOUR_SQUA_FOOT_PER_BRIT_THER_UNIT_INTE_TABL_INCH = 'N88';

    /**
     * degree Fahrenheit hour square foot per British thermal unit
     * (thermochemical) (J19)
     *
     * degree Fahrenheit hour square foot per British thermal unit
     * (thermochemical)
     */
    case REC20_DEGR_FAHR_HOUR_SQUA_FOOT_PER_BRIT_THER_UNIT_THER = 'J19';

    /**
     * degree Fahrenheit hour square foot per British thermal unit
     * (thermochemical) inch (N89)
     *
     * degree Fahrenheit hour square foot per British thermal unit
     * (thermochemical) inch
     */
    case REC20_DEGR_FAHR_HOUR_SQUA_FOOT_PER_BRIT_THER_UNIT_THER_INCH = 'N89';

    /**
     * degree Fahrenheit per bar (J21)
     *
     * degree Fahrenheit per bar
     */
    case REC20_DEGR_FAHR_PER_BAR = 'J21';

    /**
     * degree Fahrenheit per hour (J23)
     *
     * degree Fahrenheit per hour
     */
    case REC20_DEGR_FAHR_PER_HOUR = 'J23';

    /**
     * degree Fahrenheit per kelvin (J20)
     *
     * degree Fahrenheit per kelvin
     */
    case REC20_DEGR_FAHR_PER_KELV = 'J20';

    /**
     * degree Fahrenheit per minute (J24)
     *
     * degree Fahrenheit per minute
     */
    case REC20_DEGR_FAHR_PER_MINU = 'J24';

    /**
     * degree Fahrenheit per second (J25)
     *
     * degree Fahrenheit per second
     */
    case REC20_DEGR_FAHR_PER_SECO = 'J25';

    /**
     * degree Fahrenheit second per British thermal unit (international table) (N86)
     *
     * degree Fahrenheit second per British thermal unit (international table)
     */
    case REC20_DEGR_FAHR_SECO_PER_BRIT_THER_UNIT_INTE_TABL = 'N86';

    /**
     * degree Fahrenheit second per British thermal unit (thermochemical) (N87)
     *
     * degree Fahrenheit second per British thermal unit (thermochemical)
     */
    case REC20_DEGR_FAHR_SECO_PER_BRIT_THER_UNIT_THER = 'N87';

    /**
     * degree Oechsle (J27)
     *
     * degree Oechsle
     */
    case REC20_DEGR_OECH = 'J27';

    /**
     * degree per metre (H27)
     *
     * degree per metre
     */
    case REC20_DEGR_PER_METR = 'H27';

    /**
     * degree per second (E96)
     *
     * degree per second
     */
    case REC20_DEGR_PER_SECO = 'E96';

    /**
     * degree Plato (PLA)
     *
     * degree Plato
     */
    case REC20_DEGR_PLAT = 'PLA';

    /**
     * degree Rankine (A48)
     *
     * degree Rankine
     */
    case REC20_DEGR_RANK = 'A48';

    /**
     * degree Rankine per hour (J28)
     *
     * degree Rankine per hour
     */
    case REC20_DEGR_RANK_PER_HOUR = 'J28';

    /**
     * degree Rankine per minute (J29)
     *
     * degree Rankine per minute
     */
    case REC20_DEGR_RANK_PER_MINU = 'J29';

    /**
     * degree Rankine per second (J30)
     *
     * degree Rankine per second
     */
    case REC20_DEGR_RANK_PER_SECO = 'J30';

    /**
     * degree Twaddell (J31)
     *
     * degree Twaddell
     */
    case REC20_DEGR_TWAD = 'J31';

    /**
     * denier (A49)
     *
     * denier
     */
    case REC20_DENIER = 'A49';

    /**
     * digit (B19)
     *
     * digit
     */
    case REC20_DIGIT = 'B19';

    /**
     * dioptre (Q25)
     *
     * dioptre
     */
    case REC20_DIOPTRE = 'Q25';

    /**
     * displacement tonnage (DPT)
     *
     * displacement tonnage
     */
    case REC20_DISP_TONN = 'DPT';

    /**
     * dose (E27)
     *
     * dose
     */
    case REC20_DOSE = 'E27';

    /**
     * dots per inch (E39)
     *
     * dots per inch
     */
    case REC20_DOTS_PER_INCH = 'E39';

    /**
     * dozen (DZN)
     *
     * dozen
     */
    case REC20_DOZEN = 'DZN';

    /**
     * dozen pack (DZP)
     *
     * dozen pack
     */
    case REC20_DOZE_PACK = 'DZP';

    /**
     * dozen pair (DPR)
     *
     * dozen pair
     */
    case REC20_DOZE_PAIR = 'DPR';

    /**
     * dozen piece (DPC)
     *
     * dozen piece
     */
    case REC20_DOZE_PIEC = 'DPC';

    /**
     * dozen roll (DRL)
     *
     * dozen roll
     */
    case REC20_DOZE_ROLL = 'DRL';

    /**
     * dram (UK) (DRI)
     *
     * dram (UK)
     */
    case REC20_DRAM_UK = 'DRI';

    /**
     * dram (US) (DRA)
     *
     * dram (US)
     */
    case REC20_DRAM_US = 'DRA';

    /**
     * dry barrel (US) (BLD)
     *
     * dry barrel (US)
     */
    case REC20_DRY_BARR_US = 'BLD';

    /**
     * dry gallon (US) (GLD)
     *
     * dry gallon (US)
     */
    case REC20_DRY_GALL_US = 'GLD';

    /**
     * dry pint (US) (PTD)
     *
     * dry pint (US)
     */
    case REC20_DRY_PINT_US = 'PTD';

    /**
     * dry pound (DB)
     *
     * dry pound
     */
    case REC20_DRY_POUN = 'DB';

    /**
     * dry quart (US) (QTD)
     *
     * dry quart (US)
     */
    case REC20_DRY_QUAR_US = 'QTD';

    /**
     * dry ton (DT)
     *
     * dry ton
     */
    case REC20_DRY_TON = 'DT';

    /**
     * dyne metre (M97)
     *
     * dyne metre
     */
    case REC20_DYNE_METR = 'M97';

    /**
     * each (EA)
     *
     * each
     */
    case REC20_EACH = 'EA';

    /**
     * electronic mail box (EB)
     *
     * electronic mail box
     */
    case REC20_ELEC_MAIL_BOX = 'EB';

    /**
     * electronvolt (A53)
     *
     * electronvolt
     */
    case REC20_ELECTRONVOLT = 'A53';

    /**
     * electronvolt per metre (A54)
     *
     * electronvolt per metre
     */
    case REC20_ELEC_PER_METR = 'A54';

    /**
     * electronvolt square metre (A55)
     *
     * electronvolt square metre
     */
    case REC20_ELEC_SQUA_METR = 'A55';

    /**
     * electronvolt square metre per kilogram (A56)
     *
     * electronvolt square metre per kilogram
     */
    case REC20_ELEC_SQUA_METR_PER_KILO = 'A56';

    /**
     * equivalent gallon (EQ)
     *
     * equivalent gallon
     */
    case REC20_EQUI_GALL = 'EQ';

    /**
     * erlang (Q11)
     *
     * erlang
     */
    case REC20_ERLANG = 'Q11';

    /**
     * exabit per second (E58)
     *
     * exabit per second
     */
    case REC20_EXAB_PER_SECO = 'E58';

    /**
     * exajoule (A68)
     *
     * exajoule
     */
    case REC20_EXAJOULE = 'A68';

    /**
     * exbibit per cubic metre (E67)
     *
     * exbibit per cubic metre
     */
    case REC20_EXBI_PER_CUBI_METR = 'E67';

    /**
     * exbibit per metre (E65)
     *
     * exbibit per metre
     */
    case REC20_EXBI_PER_METR = 'E65';

    /**
     * exbibit per square metre (E66)
     *
     * exbibit per square metre
     */
    case REC20_EXBI_PER_SQUA_METR = 'E66';

    /**
     * exbibyte (E59)
     *
     * exbibyte
     */
    case REC20_EXBIBYTE = 'E59';

    /**
     * failures in time (FIT)
     *
     * failures in time
     */
    case REC20_FAIL_IN_TIME = 'FIT';

    /**
     * farad (FAR)
     *
     * farad
     */
    case REC20_FARAD = 'FAR';

    /**
     * farad per kilometre (H33)
     *
     * farad per kilometre
     */
    case REC20_FARA_PER_KILO = 'H33';

    /**
     * farad per metre (A69)
     *
     * farad per metre
     */
    case REC20_FARA_PER_METR = 'A69';

    /**
     * fathom (AK)
     *
     * fathom
     */
    case REC20_FATHOM = 'AK';

    /**
     * femtojoule (A70)
     *
     * femtojoule
     */
    case REC20_FEMTOJOULE = 'A70';

    /**
     * femtolitre (Q32)
     *
     * femtolitre
     */
    case REC20_FEMTOLITRE = 'Q32';

    /**
     * femtometre (A71)
     *
     * femtometre
     */
    case REC20_FEMTOMETRE = 'A71';

    /**
     * fibre metre (FBM)
     *
     * fibre metre
     */
    case REC20_FIBR_METR = 'FBM';

    /**
     * five pack (P5)
     *
     * five pack
     */
    case REC20_FIVE_PACK = 'P5';

    /**
     * fixed rate (1I)
     *
     * fixed rate
     */
    case REC20_FIXE_RATE = '1I';

    /**
     * flake ton (FL)
     *
     * flake ton
     */
    case REC20_FLAK_TON = 'FL';

    /**
     * fluid ounce (UK) (OZI)
     *
     * fluid ounce (UK)
     */
    case REC20_FLUI_OUNC_UK = 'OZI';

    /**
     * fluid ounce (US) (OZA)
     *
     * fluid ounce (US)
     */
    case REC20_FLUI_OUNC_US = 'OZA';

    /**
     * foot (FOT)
     *
     * foot
     */
    case REC20_FOOT = 'FOT';

    /**
     * foot (U.S. survey) (M51)
     *
     * foot (U.S. survey)
     */
    case REC20_FOOT_US_SURV = 'M51';

    /**
     * foot of water (39.2 ºF) (N15)
     *
     * foot of water (39.2 ºF)
     */
    case REC20_FOOT_OF_WATE__F = 'N15';

    /**
     * foot per degree Fahrenheit (K13)
     *
     * foot per degree Fahrenheit
     */
    case REC20_FOOT_PER_DEGR_FAHR = 'K13';

    /**
     * foot per hour (K14)
     *
     * foot per hour
     */
    case REC20_FOOT_PER_HOUR = 'K14';

    /**
     * foot per minute (FR)
     *
     * foot per minute
     */
    case REC20_FOOT_PER_MINU = 'FR';

    /**
     * foot per psi (K17)
     *
     * foot per psi
     */
    case REC20_FOOT_PER_PSI = 'K17';

    /**
     * foot per second (FS)
     *
     * foot per second
     */
    case REC20_FOOT_PER_SECO = 'FS';

    /**
     * foot per second degree Fahrenheit (K18)
     *
     * foot per second degree Fahrenheit
     */
    case REC20_FOOT_PER_SECO_DEGR_FAHR = 'K18';

    /**
     * foot per second psi (K19)
     *
     * foot per second psi
     */
    case REC20_FOOT_PER_SECO_PSI = 'K19';

    /**
     * foot per second squared (A73)
     *
     * foot per second squared
     */
    case REC20_FOOT_PER_SECO_SQUA = 'A73';

    /**
     * foot per thousand (E33)
     *
     * foot per thousand
     */
    case REC20_FOOT_PER_THOU = 'E33';

    /**
     * foot pound-force (85)
     *
     * foot pound-force
     */
    case REC20_FOOT_POUN = '85';

    /**
     * foot pound-force per hour (K15)
     *
     * foot pound-force per hour
     */
    case REC20_FOOT_POUN_PER_HOUR = 'K15';

    /**
     * foot pound-force per minute (K16)
     *
     * foot pound-force per minute
     */
    case REC20_FOOT_POUN_PER_MINU = 'K16';

    /**
     * foot pound-force per second (A74)
     *
     * foot pound-force per second
     */
    case REC20_FOOT_POUN_PER_SECO = 'A74';

    /**
     * foot to the fourth power (N27)
     *
     * foot to the fourth power
     */
    case REC20_FOOT_TO_THE_FOUR_POWE = 'N27';

    /**
     * footcandle (P27)
     *
     * footcandle
     */
    case REC20_FOOTCANDLE = 'P27';

    /**
     * footlambert (P29)
     *
     * footlambert
     */
    case REC20_FOOTLAMBERT = 'P29';

    /**
     * Formazin nephelometric unit (FNU)
     *
     * Formazin nephelometric unit
     */
    case REC20_FORM_NEPH_UNIT = 'FNU';

    /**
     * forty foot container (21)
     *
     * forty foot container
     */
    case REC20_FORT_FOOT_CONT = '21';

    /**
     * franklin (N94)
     *
     * franklin
     */
    case REC20_FRANKLIN = 'N94';

    /**
     * freight ton (A75)
     *
     * freight ton
     */
    case REC20_FREI_TON = 'A75';

    /**
     * French gauge (H79)
     *
     * French gauge
     */
    case REC20_FREN_GAUG = 'H79';

    /**
     * furlong (M50)
     *
     * furlong
     */
    case REC20_FURLONG = 'M50';

    /**
     * gal (A76)
     *
     * gal
     */
    case REC20_GAL = 'A76';

    /**
     * gallon (UK) (GLI)
     *
     * gallon (UK)
     */
    case REC20_GALL_UK = 'GLI';

    /**
     * gallon (UK) per day (K26)
     *
     * gallon (UK) per day
     */
    case REC20_GALL_UK_PER_DAY = 'K26';

    /**
     * gallon (UK) per hour (K27)
     *
     * gallon (UK) per hour
     */
    case REC20_GALL_UK_PER_HOUR = 'K27';

    /**
     * gallon (UK) per second (K28)
     *
     * gallon (UK) per second
     */
    case REC20_GALL_UK_PER_SECO = 'K28';

    /**
     * gallon (US liquid) per second (K30)
     *
     * gallon (US liquid) per second
     */
    case REC20_GALL_US_LIQU_PER_SECO = 'K30';

    /**
     * gallon (US) (GLL)
     *
     * gallon (US)
     */
    case REC20_GALL_US = 'GLL';

    /**
     * gallon (US) per day (GB)
     *
     * gallon (US) per day
     */
    case REC20_GALL_US_PER_DAY = 'GB';

    /**
     * gallon (US) per hour (G50)
     *
     * gallon (US) per hour
     */
    case REC20_GALL_US_PER_HOUR = 'G50';

    /**
     * gamma (P12)
     *
     * gamma
     */
    case REC20_GAMMA = 'P12';

    /**
     * gibibit (B30)
     *
     * gibibit
     */
    case REC20_GIBIBIT = 'B30';

    /**
     * gibibit per cubic metre (E71)
     *
     * gibibit per cubic metre
     */
    case REC20_GIBI_PER_CUBI_METR = 'E71';

    /**
     * gibibit per metre (E69)
     *
     * gibibit per metre
     */
    case REC20_GIBI_PER_METR = 'E69';

    /**
     * gibibit per square metre (E70)
     *
     * gibibit per square metre
     */
    case REC20_GIBI_PER_SQUA_METR = 'E70';

    /**
     * gibibyte (E62)
     *
     * gibibyte
     */
    case REC20_GIBIBYTE = 'E62';

    /**
     * gigabecquerel (GBQ)
     *
     * gigabecquerel
     */
    case REC20_GIGABECQUEREL = 'GBQ';

    /**
     * gigabit (B68)
     *
     * gigabit
     */
    case REC20_GIGABIT = 'B68';

    /**
     * gigabit per second (B80)
     *
     * gigabit per second
     */
    case REC20_GIGA_PER_SECO = 'B80';

    /**
     * gigabyte (E34)
     *
     * gigabyte
     */
    case REC20_GIGABYTE = 'E34';

    /**
     * gigacoulomb per cubic metre (A84)
     *
     * gigacoulomb per cubic metre
     */
    case REC20_GIGA_PER_CUBI_METR = 'A84';

    /**
     * gigaelectronvolt (A85)
     *
     * gigaelectronvolt
     */
    case REC20_GIGAELECTRONVOLT = 'A85';

    /**
     * gigahertz (A86)
     *
     * gigahertz
     */
    case REC20_GIGAHERTZ = 'A86';

    /**
     * gigahertz metre (M18)
     *
     * gigahertz metre
     */
    case REC20_GIGA_METR = 'M18';

    /**
     * gigajoule (GV)
     *
     * gigajoule
     */
    case REC20_GIGAJOULE = 'GV';

    /**
     * gigaohm (A87)
     *
     * gigaohm
     */
    case REC20_GIGAOHM = 'A87';

    /**
     * gigaohm per metre (M26)
     *
     * gigaohm per metre
     */
    case REC20_GIGA_PER_METR = 'M26';

    /**
     * gigapascal (A89)
     *
     * gigapascal
     */
    case REC20_GIGAPASCAL = 'A89';

    /**
     * gigawatt (A90)
     *
     * gigawatt
     */
    case REC20_GIGAWATT = 'A90';

    /**
     * gigawatt hour (GWH)
     *
     * gigawatt hour
     */
    case REC20_GIGA_HOUR = 'GWH';

    /**
     * gilbert (N97)
     *
     * gilbert
     */
    case REC20_GILBERT = 'N97';

    /**
     * gill (UK) (GII)
     *
     * gill (UK)
     */
    case REC20_GILL_UK = 'GII';

    /**
     * gill (UK) per day (K32)
     *
     * gill (UK) per day
     */
    case REC20_GILL_UK_PER_DAY = 'K32';

    /**
     * gill (UK) per hour (K33)
     *
     * gill (UK) per hour
     */
    case REC20_GILL_UK_PER_HOUR = 'K33';

    /**
     * gill (UK) per minute (K34)
     *
     * gill (UK) per minute
     */
    case REC20_GILL_UK_PER_MINU = 'K34';

    /**
     * gill (UK) per second (K35)
     *
     * gill (UK) per second
     */
    case REC20_GILL_UK_PER_SECO = 'K35';

    /**
     * gill (US) (GIA)
     *
     * gill (US)
     */
    case REC20_GILL_US = 'GIA';

    /**
     * gill (US) per day (K36)
     *
     * gill (US) per day
     */
    case REC20_GILL_US_PER_DAY = 'K36';

    /**
     * gill (US) per hour (K37)
     *
     * gill (US) per hour
     */
    case REC20_GILL_US_PER_HOUR = 'K37';

    /**
     * gill (US) per minute (K38)
     *
     * gill (US) per minute
     */
    case REC20_GILL_US_PER_MINU = 'K38';

    /**
     * gill (US) per second (K39)
     *
     * gill (US) per second
     */
    case REC20_GILL_US_PER_SECO = 'K39';

    /**
     * gon (A91)
     *
     * gon
     */
    case REC20_GON = 'A91';

    /**
     * grain (GRN)
     *
     * grain
     */
    case REC20_GRAIN = 'GRN';

    /**
     * grain per gallon (US) (K41)
     *
     * grain per gallon (US)
     */
    case REC20_GRAI_PER_GALL_US = 'K41';

    /**
     * gram (GRM)
     *
     * gram
     */
    case REC20_GRAM = 'GRM';

    /**
     * gram centimetre per second (M99)
     *
     * gram centimetre per second
     */
    case REC20_GRAM_CENT_PER_SECO = 'M99';

    /**
     * gram millimetre (H84)
     *
     * gram millimetre
     */
    case REC20_GRAM_MILL = 'H84';

    /**
     * gram of fissile isotope (GFI)
     *
     * gram of fissile isotope
     */
    case REC20_GRAM_OF_FISS_ISOT = 'GFI';

    /**
     * gram per bar (F74)
     *
     * gram per bar
     */
    case REC20_GRAM_PER_BAR = 'F74';

    /**
     * gram per centimetre second (N41)
     *
     * gram per centimetre second
     */
    case REC20_GRAM_PER_CENT_SECO = 'N41';

    /**
     * gram per cubic centimetre (23)
     *
     * gram per cubic centimetre
     */
    case REC20_GRAM_PER_CUBI_CENT = '23';

    /**
     * gram per cubic centimetre bar (G11)
     *
     * gram per cubic centimetre bar
     */
    case REC20_GRAM_PER_CUBI_CENT_BAR = 'G11';

    /**
     * gram per cubic centimetre kelvin (G33)
     *
     * gram per cubic centimetre kelvin
     */
    case REC20_GRAM_PER_CUBI_CENT_KELV = 'G33';

    /**
     * gram per cubic decimetre (F23)
     *
     * gram per cubic decimetre
     */
    case REC20_GRAM_PER_CUBI_DECI = 'F23';

    /**
     * gram per cubic decimetre bar (G12)
     *
     * gram per cubic decimetre bar
     */
    case REC20_GRAM_PER_CUBI_DECI_BAR = 'G12';

    /**
     * gram per cubic decimetre kelvin (G34)
     *
     * gram per cubic decimetre kelvin
     */
    case REC20_GRAM_PER_CUBI_DECI_KELV = 'G34';

    /**
     * gram per cubic metre (A93)
     *
     * gram per cubic metre
     */
    case REC20_GRAM_PER_CUBI_METR = 'A93';

    /**
     * gram per cubic metre bar (G14)
     *
     * gram per cubic metre bar
     */
    case REC20_GRAM_PER_CUBI_METR_BAR = 'G14';

    /**
     * gram per cubic metre kelvin (G36)
     *
     * gram per cubic metre kelvin
     */
    case REC20_GRAM_PER_CUBI_METR_KELV = 'G36';

    /**
     * gram per day (F26)
     *
     * gram per day
     */
    case REC20_GRAM_PER_DAY = 'F26';

    /**
     * gram per day bar (F62)
     *
     * gram per day bar
     */
    case REC20_GRAM_PER_DAY_BAR = 'F62';

    /**
     * gram per day kelvin (F35)
     *
     * gram per day kelvin
     */
    case REC20_GRAM_PER_DAY_KELV = 'F35';

    /**
     * gram per hertz (F25)
     *
     * gram per hertz
     */
    case REC20_GRAM_PER_HERT = 'F25';

    /**
     * gram per hour (F27)
     *
     * gram per hour
     */
    case REC20_GRAM_PER_HOUR = 'F27';

    /**
     * gram per hour bar (F63)
     *
     * gram per hour bar
     */
    case REC20_GRAM_PER_HOUR_BAR = 'F63';

    /**
     * gram per hour kelvin (F36)
     *
     * gram per hour kelvin
     */
    case REC20_GRAM_PER_HOUR_KELV = 'F36';

    /**
     * gram per kelvin (F14)
     *
     * gram per kelvin
     */
    case REC20_GRAM_PER_KELV = 'F14';

    /**
     * gram per litre (GL)
     *
     * gram per litre
     */
    case REC20_GRAM_PER_LITR = 'GL';

    /**
     * gram per litre bar (G13)
     *
     * gram per litre bar
     */
    case REC20_GRAM_PER_LITR_BAR = 'G13';

    /**
     * gram per litre kelvin (G35)
     *
     * gram per litre kelvin
     */
    case REC20_GRAM_PER_LITR_KELV = 'G35';

    /**
     * gram per metre (gram per 100 centimetres) (GF)
     *
     * gram per metre (gram per 100 centimetres)
     */
    case REC20_GRAM_PER_METR_GRAM_PER__CENT = 'GF';

    /**
     * gram per millilitre (GJ)
     *
     * gram per millilitre
     */
    case REC20_GRAM_PER_MILL = 'GJ';

    /**
     * gram per millilitre bar (G15)
     *
     * gram per millilitre bar
     */
    case REC20_GRAM_PER_MILL_BAR = 'G15';

    /**
     * gram per millilitre kelvin (G37)
     *
     * gram per millilitre kelvin
     */
    case REC20_GRAM_PER_MILL_KELV = 'G37';

    /**
     * gram per minute (F28)
     *
     * gram per minute
     */
    case REC20_GRAM_PER_MINU = 'F28';

    /**
     * gram per minute bar (F64)
     *
     * gram per minute bar
     */
    case REC20_GRAM_PER_MINU_BAR = 'F64';

    /**
     * gram per minute kelvin (F37)
     *
     * gram per minute kelvin
     */
    case REC20_GRAM_PER_MINU_KELV = 'F37';

    /**
     * gram per mole (A94)
     *
     * gram per mole
     */
    case REC20_GRAM_PER_MOLE = 'A94';

    /**
     * gram per second (F29)
     *
     * gram per second
     */
    case REC20_GRAM_PER_SECO = 'F29';

    /**
     * gram per second bar (F65)
     *
     * gram per second bar
     */
    case REC20_GRAM_PER_SECO_BAR = 'F65';

    /**
     * gram per second kelvin (F38)
     *
     * gram per second kelvin
     */
    case REC20_GRAM_PER_SECO_KELV = 'F38';

    /**
     * gram per square centimetre (25)
     *
     * gram per square centimetre
     */
    case REC20_GRAM_PER_SQUA_CENT = '25';

    /**
     * gram per square metre (GM)
     *
     * gram per square metre
     */
    case REC20_GRAM_PER_SQUA_METR = 'GM';

    /**
     * gram per square millimetre (N24)
     *
     * gram per square millimetre
     */
    case REC20_GRAM_PER_SQUA_MILL = 'N24';

    /**
     * gram, dry weight (GDW)
     *
     * gram, dry weight
     */
    case REC20_GRAM_DRY_WEIG = 'GDW';

    /**
     * gram, including container (GIC)
     *
     * gram, including container
     */
    case REC20_GRAM_INCL_CONT = 'GIC';

    /**
     * gram, including inner packaging (GIP)
     *
     * gram, including inner packaging
     */
    case REC20_GRAM_INCL_INNE_PACK = 'GIP';

    /**
     * gray (A95)
     *
     * gray
     */
    case REC20_GRAY = 'A95';

    /**
     * gray per hour (P61)
     *
     * gray per hour
     */
    case REC20_GRAY_PER_HOUR = 'P61';

    /**
     * gray per minute (P57)
     *
     * gray per minute
     */
    case REC20_GRAY_PER_MINU = 'P57';

    /**
     * gray per second (A96)
     *
     * gray per second
     */
    case REC20_GRAY_PER_SECO = 'A96';

    /**
     * great gross (GGR)
     *
     * great gross
     */
    case REC20_GREA_GROS = 'GGR';

    /**
     * gross (GRO)
     *
     * gross
     */
    case REC20_GROSS = 'GRO';

    /**
     * gross kilogram (E4)
     *
     * gross kilogram
     */
    case REC20_GROS_KILO = 'E4';

    /**
     * group (10)
     *
     * group
     */
    case REC20_GROUP = '10';

    /**
     * Gunter's chain (X1)
     *
     * Gunter's chain
     */
    case REC20_GUNT_CHAI = 'X1';

    /**
     * half year (6 months) (SAN)
     *
     * half year (6 months)
     */
    case REC20_HALF_YEAR__MONT = 'SAN';

    /**
     * hanging container (Z11)
     *
     * hanging container
     */
    case REC20_HANG_CONT = 'Z11';

    /**
     * hank (HA)
     *
     * hank
     */
    case REC20_HANK = 'HA';

    /**
     * hartley (Q15)
     *
     * hartley
     */
    case REC20_HARTLEY = 'Q15';

    /**
     * hartley per second (Q18)
     *
     * hartley per second
     */
    case REC20_HART_PER_SECO = 'Q18';

    /**
     * head (HEA)
     *
     * head
     */
    case REC20_HEAD = 'HEA';

    /**
     * hectobar (HBA)
     *
     * hectobar
     */
    case REC20_HECTOBAR = 'HBA';

    /**
     * hectogram (HGM)
     *
     * hectogram
     */
    case REC20_HECTOGRAM = 'HGM';

    /**
     * hectolitre (HLT)
     *
     * hectolitre
     */
    case REC20_HECTOLITRE = 'HLT';

    /**
     * hectolitre of pure alcohol (HPA)
     *
     * hectolitre of pure alcohol
     */
    case REC20_HECT_OF_PURE_ALCO = 'HPA';

    /**
     * hectometre (HMT)
     *
     * hectometre
     */
    case REC20_HECTOMETRE = 'HMT';

    /**
     * hectopascal (A97)
     *
     * hectopascal
     */
    case REC20_HECTOPASCAL = 'A97';

    /**
     * hectopascal cubic metre per second (F94)
     *
     * hectopascal cubic metre per second
     */
    case REC20_HECT_CUBI_METR_PER_SECO = 'F94';

    /**
     * hectopascal litre per second (F93)
     *
     * hectopascal litre per second
     */
    case REC20_HECT_LITR_PER_SECO = 'F93';

    /**
     * hectopascal per bar (E99)
     *
     * hectopascal per bar
     */
    case REC20_HECT_PER_BAR = 'E99';

    /**
     * hectopascal per kelvin (F82)
     *
     * hectopascal per kelvin
     */
    case REC20_HECT_PER_KELV = 'F82';

    /**
     * hectopascal per metre (P82)
     *
     * hectopascal per metre
     */
    case REC20_HECT_PER_METR = 'P82';

    /**
     * Hefner-Kerze (P35)
     *
     * Hefner-Kerze
     */
    case REC20_HEFNERKERZE = 'P35';

    /**
     * henry (81)
     *
     * henry
     */
    case REC20_HENRY = '81';

    /**
     * henry per kiloohm (H03)
     *
     * henry per kiloohm
     */
    case REC20_HENR_PER_KILO = 'H03';

    /**
     * henry per metre (A98)
     *
     * henry per metre
     */
    case REC20_HENR_PER_METR = 'A98';

    /**
     * henry per ohm (H04)
     *
     * henry per ohm
     */
    case REC20_HENR_PER_OHM = 'H04';

    /**
     * hertz (HTZ)
     *
     * hertz
     */
    case REC20_HERTZ = 'HTZ';

    /**
     * hertz metre (H34)
     *
     * hertz metre
     */
    case REC20_HERT_METR = 'H34';

    /**
     * horsepower (boiler) (K42)
     *
     * horsepower (boiler)
     */
    case REC20_HORS_BOIL = 'K42';

    /**
     * horsepower (electric) (K43)
     *
     * horsepower (electric)
     */
    case REC20_HORS_ELEC = 'K43';

    /**
     * hour (HUR)
     *
     * hour
     */
    case REC20_HOUR = 'HUR';

    /**
     * hundred (CEN)
     *
     * hundred
     */
    case REC20_HUNDRED = 'CEN';

    /**
     * hundred board foot (BP)
     *
     * hundred board foot
     */
    case REC20_HUND_BOAR_FOOT = 'BP';

    /**
     * hundred boxes (HBX)
     *
     * hundred boxes
     */
    case REC20_HUND_BOXE = 'HBX';

    /**
     * hundred count (HC)
     *
     * hundred count
     */
    case REC20_HUND_COUN = 'HC';

    /**
     * hundred cubic foot (HH)
     *
     * hundred cubic foot
     */
    case REC20_HUND_CUBI_FOOT = 'HH';

    /**
     * hundred cubic metre (FF)
     *
     * hundred cubic metre
     */
    case REC20_HUND_CUBI_METR = 'FF';

    /**
     * hundred international unit (HIU)
     *
     * hundred international unit
     */
    case REC20_HUND_INTE_UNIT = 'HIU';

    /**
     * hundred kilogram, dry weight (HDW)
     *
     * hundred kilogram, dry weight
     */
    case REC20_HUND_KILO_DRY_WEIG = 'HDW';

    /**
     * hundred kilogram, net mass (HKM)
     *
     * hundred kilogram, net mass
     */
    case REC20_HUND_KILO_NET_MASS = 'HKM';

    /**
     * hundred leave (CLF)
     *
     * hundred leave
     */
    case REC20_HUND_LEAV = 'CLF';

    /**
     * hundred metre (JPS)
     *
     * hundred metre
     */
    case REC20_HUND_METR = 'JPS';

    /**
     * hundred pack (CNP)
     *
     * hundred pack
     */
    case REC20_HUND_PACK = 'CNP';

    /**
     * hundred pound (cwt) / hundred weight (US) (CWA)
     *
     * hundred pound (cwt) / hundred weight (US)
     */
    case REC20_HUND_POUN_CWT_HUND_WEIG_US = 'CWA';

    /**
     * hundred weight (UK) (CWI)
     *
     * hundred weight (UK)
     */
    case REC20_HUND_WEIG_UK = 'CWI';

    /**
     * hydraulic horse power (5J)
     *
     * hydraulic horse power
     */
    case REC20_HYDR_HORS_POWE = '5J';

    /**
     * Imperial gallon per minute (G3)
     *
     * Imperial gallon per minute
     */
    case REC20_IMPE_GALL_PER_MINU = 'G3';

    /**
     * inch (INH)
     *
     * inch
     */
    case REC20_INCH = 'INH';

    /**
     * inch of mercury (F79)
     *
     * inch of mercury
     */
    case REC20_INCH_OF_MERC = 'F79';

    /**
     * inch of mercury (32 ºF) (N16)
     *
     * inch of mercury (32 ºF)
     */
    case REC20_INCH_OF_MERC__F = 'N16';

    /**
     * inch of water (F78)
     *
     * inch of water
     */
    case REC20_INCH_OF_WATE = 'F78';

    /**
     * inch of water (39.2 ºF) (N18)
     *
     * inch of water (39.2 ºF)
     */
    case REC20_INCH_OF_WATE__F = 'N18';

    /**
     * inch per degree Fahrenheit (K45)
     *
     * inch per degree Fahrenheit
     */
    case REC20_INCH_PER_DEGR_FAHR = 'K45';

    /**
     * inch per linear foot (B82)
     *
     * inch per linear foot
     */
    case REC20_INCH_PER_LINE_FOOT = 'B82';

    /**
     * inch per minute (M63)
     *
     * inch per minute
     */
    case REC20_INCH_PER_MINU = 'M63';

    /**
     * inch per psi (K46)
     *
     * inch per psi
     */
    case REC20_INCH_PER_PSI = 'K46';

    /**
     * inch per second (IU)
     *
     * inch per second
     */
    case REC20_INCH_PER_SECO = 'IU';

    /**
     * inch per second degree Fahrenheit (K47)
     *
     * inch per second degree Fahrenheit
     */
    case REC20_INCH_PER_SECO_DEGR_FAHR = 'K47';

    /**
     * inch per second psi (K48)
     *
     * inch per second psi
     */
    case REC20_INCH_PER_SECO_PSI = 'K48';

    /**
     * inch per second squared (IV)
     *
     * inch per second squared
     */
    case REC20_INCH_PER_SECO_SQUA = 'IV';

    /**
     * inch per two pi radiant (H57)
     *
     * inch per two pi radiant
     */
    case REC20_INCH_PER_TWO_PI_RADI = 'H57';

    /**
     * inch per year (M61)
     *
     * inch per year
     */
    case REC20_INCH_PER_YEAR = 'M61';

    /**
     * inch pound (pound inch) (IA)
     *
     * inch pound (pound inch)
     */
    case REC20_INCH_POUN_POUN_INCH = 'IA';

    /**
     * inch poundal (N47)
     *
     * inch poundal
     */
    case REC20_INCH_POUN = 'N47';

    /**
     * inch to the fourth power (D69)
     *
     * inch to the fourth power
     */
    case REC20_INCH_TO_THE_FOUR_POWE = 'D69';

    /**
     * international candle (P36)
     *
     * international candle
     */
    case REC20_INTE_CAND = 'P36';

    /**
     * international sugar degree (ISD)
     *
     * international sugar degree
     */
    case REC20_INTE_SUGA_DEGR = 'ISD';

    /**
     * international unit per gram (IUG)
     *
     * international unit per gram
     */
    case REC20_INTE_UNIT_PER_GRAM = 'IUG';

    /**
     * job (E51)
     *
     * job
     */
    case REC20_JOB = 'E51';

    /**
     * joule (JOU)
     *
     * joule
     */
    case REC20_JOULE = 'JOU';

    /**
     * joule per cubic metre (B8)
     *
     * joule per cubic metre
     */
    case REC20_JOUL_PER_CUBI_METR = 'B8';

    /**
     * joule per day (P17)
     *
     * joule per day
     */
    case REC20_JOUL_PER_DAY = 'P17';

    /**
     * joule per gram (D95)
     *
     * joule per gram
     */
    case REC20_JOUL_PER_GRAM = 'D95';

    /**
     * joule per hour (P16)
     *
     * joule per hour
     */
    case REC20_JOUL_PER_HOUR = 'P16';

    /**
     * joule per kelvin (JE)
     *
     * joule per kelvin
     */
    case REC20_JOUL_PER_KELV = 'JE';

    /**
     * joule per kilogram (J2)
     *
     * joule per kilogram
     */
    case REC20_JOUL_PER_KILO = 'J2';

    /**
     * joule per kilogram kelvin (B11)
     *
     * joule per kilogram kelvin
     */
    case REC20_JOUL_PER_KILO_KELV = 'B11';

    /**
     * joule per metre (B12)
     *
     * joule per metre
     */
    case REC20_JOUL_PER_METR = 'B12';

    /**
     * joule per metre to the fourth power (B14)
     *
     * joule per metre to the fourth power
     */
    case REC20_JOUL_PER_METR_TO_THE_FOUR_POWE = 'B14';

    /**
     * joule per minute (P15)
     *
     * joule per minute
     */
    case REC20_JOUL_PER_MINU = 'P15';

    /**
     * joule per mole (B15)
     *
     * joule per mole
     */
    case REC20_JOUL_PER_MOLE = 'B15';

    /**
     * joule per mole kelvin (B16)
     *
     * joule per mole kelvin
     */
    case REC20_JOUL_PER_MOLE_KELV = 'B16';

    /**
     * Joule per normalised cubic metre (Q41)
     *
     * Joule per normalised cubic metre
     */
    case REC20_JOUL_PER_NORM_CUBI_METR = 'Q41';

    /**
     * joule per second (P14)
     *
     * joule per second
     */
    case REC20_JOUL_PER_SECO = 'P14';

    /**
     * joule per square centimetre (E43)
     *
     * joule per square centimetre
     */
    case REC20_JOUL_PER_SQUA_CENT = 'E43';

    /**
     * joule per square metre (B13)
     *
     * joule per square metre
     */
    case REC20_JOUL_PER_SQUA_METR = 'B13';

    /**
     * Joule per standard cubic metre (Q42)
     *
     * Joule per standard cubic metre
     */
    case REC20_JOUL_PER_STAN_CUBI_METR = 'Q42';

    /**
     * joule per tesla (Q10)
     *
     * joule per tesla
     */
    case REC20_JOUL_PER_TESL = 'Q10';

    /**
     * joule second (B18)
     *
     * joule second
     */
    case REC20_JOUL_SECO = 'B18';

    /**
     * joule square metre (D73)
     *
     * joule square metre
     */
    case REC20_JOUL_SQUA_METR = 'D73';

    /**
     * joule square metre per kilogram (B20)
     *
     * joule square metre per kilogram
     */
    case REC20_JOUL_SQUA_METR_PER_KILO = 'B20';

    /**
     * katal (KAT)
     *
     * katal
     */
    case REC20_KATAL = 'KAT';

    /**
     * kelvin (KEL)
     *
     * kelvin
     */
    case REC20_KELVIN = 'KEL';

    /**
     * kelvin metre per watt (H35)
     *
     * kelvin metre per watt
     */
    case REC20_KELV_METR_PER_WATT = 'H35';

    /**
     * kelvin per bar (F61)
     *
     * kelvin per bar
     */
    case REC20_KELV_PER_BAR = 'F61';

    /**
     * kelvin per hour (F10)
     *
     * kelvin per hour
     */
    case REC20_KELV_PER_HOUR = 'F10';

    /**
     * kelvin per kelvin (F02)
     *
     * kelvin per kelvin
     */
    case REC20_KELV_PER_KELV = 'F02';

    /**
     * kelvin per minute (F11)
     *
     * kelvin per minute
     */
    case REC20_KELV_PER_MINU = 'F11';

    /**
     * kelvin per pascal (N79)
     *
     * kelvin per pascal
     */
    case REC20_KELV_PER_PASC = 'N79';

    /**
     * kelvin per second (F12)
     *
     * kelvin per second
     */
    case REC20_KELV_PER_SECO = 'F12';

    /**
     * kelvin per watt (B21)
     *
     * kelvin per watt
     */
    case REC20_KELV_PER_WATT = 'B21';

    /**
     * kibibit (C21)
     *
     * kibibit
     */
    case REC20_KIBIBIT = 'C21';

    /**
     * kibibit per cubic metre (E74)
     *
     * kibibit per cubic metre
     */
    case REC20_KIBI_PER_CUBI_METR = 'E74';

    /**
     * kibibit per metre (E72)
     *
     * kibibit per metre
     */
    case REC20_KIBI_PER_METR = 'E72';

    /**
     * kibibit per square metre (E73)
     *
     * kibibit per square metre
     */
    case REC20_KIBI_PER_SQUA_METR = 'E73';

    /**
     * kibibyte (E64)
     *
     * kibibyte
     */
    case REC20_KIBIBYTE = 'E64';

    /**
     * kiloampere (B22)
     *
     * kiloampere
     */
    case REC20_KILOAMPERE = 'B22';

    /**
     * kiloampere hour (thousand ampere hour) (TAH)
     *
     * kiloampere hour (thousand ampere hour)
     */
    case REC20_KILO_HOUR_THOU_AMPE_HOUR = 'TAH';

    /**
     * kiloampere per metre (B24)
     *
     * kiloampere per metre
     */
    case REC20_KILO_PER_METR = 'B24';

    /**
     * kiloampere per square metre (B23)
     *
     * kiloampere per square metre
     */
    case REC20_KILO_PER_SQUA_METR = 'B23';

    /**
     * kilobar (KBA)
     *
     * kilobar
     */
    case REC20_KILOBAR = 'KBA';

    /**
     * kilobaud (K50)
     *
     * kilobaud
     */
    case REC20_KILOBAUD = 'K50';

    /**
     * kilobecquerel (2Q)
     *
     * kilobecquerel
     */
    case REC20_KILOBECQUEREL = '2Q';

    /**
     * kilobecquerel per kilogram (B25)
     *
     * kilobecquerel per kilogram
     */
    case REC20_KILO_PER_KILO = 'B25';

    /**
     * kilobit (C37)
     *
     * kilobit
     */
    case REC20_KILOBIT = 'C37';

    /**
     * kilobit per second (C74)
     *
     * kilobit per second
     */
    case REC20_KILO_PER_SECO = 'C74';

    /**
     * kilobyte (2P)
     *
     * kilobyte
     */
    case REC20_KILOBYTE = '2P';

    /**
     * kilocalorie (international table) (E14)
     *
     * kilocalorie (international table)
     */
    case REC20_KILO_INTE_TABL = 'E14';

    /**
     * kilocalorie (international table) per gram kelvin (N65)
     *
     * kilocalorie (international table) per gram kelvin
     */
    case REC20_KILO_INTE_TABL_PER_GRAM_KELV = 'N65';

    /**
     * kilocalorie (international table) per hour metre degree Celsius (K52)
     *
     * kilocalorie (international table) per hour metre degree Celsius
     */
    case REC20_KILO_INTE_TABL_PER_HOUR_METR_DEGR_CELS = 'K52';

    /**
     * kilocalorie (mean) (K51)
     *
     * kilocalorie (mean)
     */
    case REC20_KILO_MEAN = 'K51';

    /**
     * kilocalorie (thermochemical) (K53)
     *
     * kilocalorie (thermochemical)
     */
    case REC20_KILO_THER = 'K53';

    /**
     * kilocalorie (thermochemical) per hour (E15)
     *
     * kilocalorie (thermochemical) per hour
     */
    case REC20_KILO_THER_PER_HOUR = 'E15';

    /**
     * kilocalorie (thermochemical) per minute (K54)
     *
     * kilocalorie (thermochemical) per minute
     */
    case REC20_KILO_THER_PER_MINU = 'K54';

    /**
     * kilocalorie (thermochemical) per second (K55)
     *
     * kilocalorie (thermochemical) per second
     */
    case REC20_KILO_THER_PER_SECO = 'K55';

    /**
     * kilocandela (P33)
     *
     * kilocandela
     */
    case REC20_KILOCANDELA = 'P33';

    /**
     * kilocharacter (KB)
     *
     * kilocharacter
     */
    case REC20_KILOCHARACTER = 'KB';

    /**
     * kilocoulomb (B26)
     *
     * kilocoulomb
     */
    case REC20_KILOCOULOMB = 'B26';

    /**
     * kilocoulomb per cubic metre (B27)
     *
     * kilocoulomb per cubic metre
     */
    case REC20_KILO_PER_CUBI_METR = 'B27';

    /**
     * kilocurie (2R)
     *
     * kilocurie
     */
    case REC20_KILOCURIE = '2R';

    /**
     * kiloelectronvolt (B29)
     *
     * kiloelectronvolt
     */
    case REC20_KILOELECTRONVOLT = 'B29';

    /**
     * kilofarad (N90)
     *
     * kilofarad
     */
    case REC20_KILOFARAD = 'N90';

    /**
     * kilogram (KGM)
     *
     * kilogram
     */
    case REC20_KILOGRAM = 'KGM';

    /**
     * kilogram centimetre per second (M98)
     *
     * kilogram centimetre per second
     */
    case REC20_KILO_CENT_PER_SECO = 'M98';

    /**
     * kilogram drained net weight (KDW)
     *
     * kilogram drained net weight
     */
    case REC20_KILO_DRAI_NET_WEIG = 'KDW';

    /**
     * kilogram metre (M94)
     *
     * kilogram metre
     */
    case REC20_KILO_METR = 'M94';

    /**
     * kilogram metre per second (B31)
     *
     * kilogram metre per second
     */
    case REC20_KILO_METR_PER_SECO = 'B31';

    /**
     * kilogram metre per second squared (M77)
     *
     * kilogram metre per second squared
     */
    case REC20_KILO_METR_PER_SECO_SQUA = 'M77';

    /**
     * kilogram metre squared (B32)
     *
     * kilogram metre squared
     */
    case REC20_KILO_METR_SQUA = 'B32';

    /**
     * kilogram metre squared per second (B33)
     *
     * kilogram metre squared per second
     */
    case REC20_KILO_METR_SQUA_PER_SECO = 'B33';

    /**
     * kilogram named substance (KNS)
     *
     * kilogram named substance
     */
    case REC20_KILO_NAME_SUBS = 'KNS';

    /**
     * kilogram of choline chloride (KCC)
     *
     * kilogram of choline chloride
     */
    case REC20_KILO_OF_CHOL_CHLO = 'KCC';

    /**
     * kilogram of hydrogen peroxide (KHY)
     *
     * kilogram of hydrogen peroxide
     */
    case REC20_KILO_OF_HYDR_PERO = 'KHY';

    /**
     * kilogram of imported meat, less offal (TMS)
     *
     * kilogram of imported meat, less offal
     */
    case REC20_KILO_OF_IMPO_MEAT_LESS_OFFA = 'TMS';

    /**
     * kilogram of methylamine (KMA)
     *
     * kilogram of methylamine
     */
    case REC20_KILO_OF_METH = 'KMA';

    /**
     * kilogram of nitrogen (KNI)
     *
     * kilogram of nitrogen
     */
    case REC20_KILO_OF_NITR = 'KNI';

    /**
     * kilogram of phosphorus pentoxide (phosphoric anhydride) (KPP)
     *
     * kilogram of phosphorus pentoxide (phosphoric anhydride)
     */
    case REC20_KILO_OF_PHOS_PENT_PHOS_ANHY = 'KPP';

    /**
     * kilogram of potassium hydroxide (caustic potash) (KPH)
     *
     * kilogram of potassium hydroxide (caustic potash)
     */
    case REC20_KILO_OF_POTA_HYDR_CAUS_POTA = 'KPH';

    /**
     * kilogram of potassium oxide (KPO)
     *
     * kilogram of potassium oxide
     */
    case REC20_KILO_OF_POTA_OXID = 'KPO';

    /**
     * kilogram of sodium hydroxide (caustic soda) (KSH)
     *
     * kilogram of sodium hydroxide (caustic soda)
     */
    case REC20_KILO_OF_SODI_HYDR_CAUS_SODA = 'KSH';

    /**
     * kilogram of substance 90 % dry (KSD)
     *
     * kilogram of substance 90 % dry
     */
    case REC20_KILO_OF_SUBS__DRY = 'KSD';

    /**
     * kilogram of tungsten trioxide (KWO)
     *
     * kilogram of tungsten trioxide
     */
    case REC20_KILO_OF_TUNG_TRIO = 'KWO';

    /**
     * kilogram of uranium (KUR)
     *
     * kilogram of uranium
     */
    case REC20_KILO_OF_URAN = 'KUR';

    /**
     * kilogram per bar (H53)
     *
     * kilogram per bar
     */
    case REC20_KILO_PER_BAR = 'H53';

    /**
     * kilogram per cubic centimetre (G31)
     *
     * kilogram per cubic centimetre
     */
    case REC20_KILO_PER_CUBI_CENT = 'G31';

    /**
     * kilogram per cubic centimetre bar (G16)
     *
     * kilogram per cubic centimetre bar
     */
    case REC20_KILO_PER_CUBI_CENT_BAR = 'G16';

    /**
     * kilogram per cubic centimetre kelvin (G38)
     *
     * kilogram per cubic centimetre kelvin
     */
    case REC20_KILO_PER_CUBI_CENT_KELV = 'G38';

    /**
     * kilogram per cubic decimetre (B34)
     *
     * kilogram per cubic decimetre
     */
    case REC20_KILO_PER_CUBI_DECI = 'B34';

    /**
     * kilogram per cubic decimetre bar (H55)
     *
     * kilogram per cubic decimetre bar
     */
    case REC20_KILO_PER_CUBI_DECI_BAR = 'H55';

    /**
     * kilogram per cubic decimetre kelvin (H54)
     *
     * kilogram per cubic decimetre kelvin
     */
    case REC20_KILO_PER_CUBI_DECI_KELV = 'H54';

    /**
     * kilogram per cubic metre bar (G18)
     *
     * kilogram per cubic metre bar
     */
    case REC20_KILO_PER_CUBI_METR_BAR = 'G18';

    /**
     * kilogram per cubic metre kelvin (G40)
     *
     * kilogram per cubic metre kelvin
     */
    case REC20_KILO_PER_CUBI_METR_KELV = 'G40';

    /**
     * kilogram per cubic metre pascal (M73)
     *
     * kilogram per cubic metre pascal
     */
    case REC20_KILO_PER_CUBI_METR_PASC = 'M73';

    /**
     * kilogram per day (F30)
     *
     * kilogram per day
     */
    case REC20_KILO_PER_DAY = 'F30';

    /**
     * kilogram per day bar (F66)
     *
     * kilogram per day bar
     */
    case REC20_KILO_PER_DAY_BAR = 'F66';

    /**
     * kilogram per day kelvin (F39)
     *
     * kilogram per day kelvin
     */
    case REC20_KILO_PER_DAY_KELV = 'F39';

    /**
     * kilogram per hour (E93)
     *
     * kilogram per hour
     */
    case REC20_KILO_PER_HOUR = 'E93';

    /**
     * kilogram per hour bar (F67)
     *
     * kilogram per hour bar
     */
    case REC20_KILO_PER_HOUR_BAR = 'F67';

    /**
     * kilogram per hour kelvin (F40)
     *
     * kilogram per hour kelvin
     */
    case REC20_KILO_PER_HOUR_KELV = 'F40';

    /**
     * kilogram per kelvin (F15)
     *
     * kilogram per kelvin
     */
    case REC20_KILO_PER_KELV = 'F15';

    /**
     * kilogram per litre (B35)
     *
     * kilogram per litre
     */
    case REC20_KILO_PER_LITR = 'B35';

    /**
     * kilogram per litre bar (G17)
     *
     * kilogram per litre bar
     */
    case REC20_KILO_PER_LITR_BAR = 'G17';

    /**
     * kilogram per litre kelvin (G39)
     *
     * kilogram per litre kelvin
     */
    case REC20_KILO_PER_LITR_KELV = 'G39';

    /**
     * kilogram per metre day (N39)
     *
     * kilogram per metre day
     */
    case REC20_KILO_PER_METR_DAY = 'N39';

    /**
     * kilogram per metre hour (N40)
     *
     * kilogram per metre hour
     */
    case REC20_KILO_PER_METR_HOUR = 'N40';

    /**
     * kilogram per metre minute (N38)
     *
     * kilogram per metre minute
     */
    case REC20_KILO_PER_METR_MINU = 'N38';

    /**
     * kilogram per metre second (N37)
     *
     * kilogram per metre second
     */
    case REC20_KILO_PER_METR_SECO = 'N37';

    /**
     * kilogram per millimetre (KW)
     *
     * kilogram per millimetre
     */
    case REC20_KILO_PER_MILL = 'KW';

    /**
     * kilogram per millimetre width (KI)
     *
     * kilogram per millimetre width
     */
    case REC20_KILO_PER_MILL_WIDT = 'KI';

    /**
     * kilogram per minute (F31)
     *
     * kilogram per minute
     */
    case REC20_KILO_PER_MINU = 'F31';

    /**
     * kilogram per minute bar (F68)
     *
     * kilogram per minute bar
     */
    case REC20_KILO_PER_MINU_BAR = 'F68';

    /**
     * kilogram per minute kelvin (F41)
     *
     * kilogram per minute kelvin
     */
    case REC20_KILO_PER_MINU_KELV = 'F41';

    /**
     * kilogram per mole (D74)
     *
     * kilogram per mole
     */
    case REC20_KILO_PER_MOLE = 'D74';

    /**
     * kilogram per pascal (M74)
     *
     * kilogram per pascal
     */
    case REC20_KILO_PER_PASC = 'M74';

    /**
     * kilogram per second bar (F69)
     *
     * kilogram per second bar
     */
    case REC20_KILO_PER_SECO_BAR = 'F69';

    /**
     * kilogram per second kelvin (F42)
     *
     * kilogram per second kelvin
     */
    case REC20_KILO_PER_SECO_KELV = 'F42';

    /**
     * kilogram per second pascal (M87)
     *
     * kilogram per second pascal
     */
    case REC20_KILO_PER_SECO_PASC = 'M87';

    /**
     * kilogram per square centimetre (D5)
     *
     * kilogram per square centimetre
     */
    case REC20_KILO_PER_SQUA_CENT = 'D5';

    /**
     * kilogram per square metre pascal second (Q28)
     *
     * kilogram per square metre pascal second
     */
    case REC20_KILO_PER_SQUA_METR_PASC_SECO = 'Q28';

    /**
     * kilogram per square metre second (H56)
     *
     * kilogram per square metre second
     */
    case REC20_KILO_PER_SQUA_METR_SECO = 'H56';

    /**
     * kilogram square centimetre (F18)
     *
     * kilogram square centimetre
     */
    case REC20_KILO_SQUA_CENT = 'F18';

    /**
     * kilogram square millimetre (F19)
     *
     * kilogram square millimetre
     */
    case REC20_KILO_SQUA_MILL = 'F19';

    /**
     * kilogram, dry weight (MND)
     *
     * kilogram, dry weight
     */
    case REC20_KILO_DRY_WEIG = 'MND';

    /**
     * kilogram, including container (KIC)
     *
     * kilogram, including container
     */
    case REC20_KILO_INCL_CONT = 'KIC';

    /**
     * kilogram, including inner packaging (KIP)
     *
     * kilogram, including inner packaging
     */
    case REC20_KILO_INCL_INNE_PACK = 'KIP';

    /**
     * kilogram-force metre per square centimetre (E44)
     *
     * kilogram-force metre per square centimetre
     */
    case REC20_KILO_METR_PER_SQUA_CENT = 'E44';

    /**
     * kilogram-force per square millimetre (E41)
     *
     * kilogram-force per square millimetre
     */
    case REC20_KILO_PER_SQUA_MILL = 'E41';

    /**
     * kilohenry (P24)
     *
     * kilohenry
     */
    case REC20_KILOHENRY = 'P24';

    /**
     * kilohertz (KHZ)
     *
     * kilohertz
     */
    case REC20_KILOHERTZ = 'KHZ';

    /**
     * kilojoule (KJO)
     *
     * kilojoule
     */
    case REC20_KILOJOULE = 'KJO';

    /**
     * kilojoule per gram (Q31)
     *
     * kilojoule per gram
     */
    case REC20_KILO_PER_GRAM = 'Q31';

    /**
     * kilojoule per kilogram kelvin (B43)
     *
     * kilojoule per kilogram kelvin
     */
    case REC20_KILO_PER_KILO_KELV = 'B43';

    /**
     * kilolitre (K6)
     *
     * kilolitre
     */
    case REC20_KILOLITRE = 'K6';

    /**
     * kilolux (KLX)
     *
     * kilolux
     */
    case REC20_KILOLUX = 'KLX';

    /**
     * kilometre (KMT)
     *
     * kilometre
     */
    case REC20_KILOMETRE = 'KMT';

    /**
     * kilometre per second squared (M38)
     *
     * kilometre per second squared
     */
    case REC20_KILO_PER_SECO_SQUA = 'M38';

    /**
     * kilomole (B45)
     *
     * kilomole
     */
    case REC20_KILOMOLE = 'B45';

    /**
     * kilonewton (B47)
     *
     * kilonewton
     */
    case REC20_KILONEWTON = 'B47';

    /**
     * kiloohm (B49)
     *
     * kiloohm
     */
    case REC20_KILOOHM = 'B49';

    /**
     * kilopascal (KPA)
     *
     * kilopascal
     */
    case REC20_KILOPASCAL = 'KPA';

    /**
     * kilopascal square metre per gram (33)
     *
     * kilopascal square metre per gram
     */
    case REC20_KILO_SQUA_METR_PER_GRAM = '33';

    /**
     * kilopound-force (M75)
     *
     * kilopound-force
     */
    case REC20_KILOPOUNDFORCE = 'M75';

    /**
     * kiloroentgen (KR)
     *
     * kiloroentgen
     */
    case REC20_KILOROENTGEN = 'KR';

    /**
     * kilosecond (B52)
     *
     * kilosecond
     */
    case REC20_KILOSECOND = 'B52';

    /**
     * kilosegment (KJ)
     *
     * kilosegment
     */
    case REC20_KILOSEGMENT = 'KJ';

    /**
     * kilosiemens (B53)
     *
     * kilosiemens
     */
    case REC20_KILOSIEMENS = 'B53';

    /**
     * kilotesla (P13)
     *
     * kilotesla
     */
    case REC20_KILOTESLA = 'P13';

    /**
     * kilotonne (KTN)
     *
     * kilotonne
     */
    case REC20_KILOTONNE = 'KTN';

    /**
     * kilovar (KVR)
     *
     * kilovar
     */
    case REC20_KILOVAR = 'KVR';

    /**
     * kilovolt (KVT)
     *
     * kilovolt
     */
    case REC20_KILOVOLT = 'KVT';

    /**
     * kilovolt - ampere (KVA)
     *
     * kilovolt - ampere
     */
    case REC20_KILO_AMPE = 'KVA';

    /**
     * kilovolt ampere hour (C79)
     *
     * kilovolt ampere hour
     */
    case REC20_KILO_AMPE_HOUR = 'C79';

    /**
     * kilovolt ampere reactive demand (K2)
     *
     * kilovolt ampere reactive demand
     */
    case REC20_KILO_AMPE_REAC_DEMA = 'K2';

    /**
     * kilovolt ampere reactive hour (K3)
     *
     * kilovolt ampere reactive hour
     */
    case REC20_KILO_AMPE_REAC_HOUR = 'K3';

    /**
     * kilowatt (KWT)
     *
     * kilowatt
     */
    case REC20_KILOWATT = 'KWT';

    /**
     * kilowatt demand (K1)
     *
     * kilowatt demand
     */
    case REC20_KILO_DEMA = 'K1';

    /**
     * kilowatt hour (KWH)
     *
     * kilowatt hour
     */
    case REC20_KILO_HOUR = 'KWH';

    /**
     * kilowatt hour per cubic metre (E46)
     *
     * kilowatt hour per cubic metre
     */
    case REC20_KILO_HOUR_PER_CUBI_METR = 'E46';

    /**
     * kilowatt hour per hour (D03)
     *
     * kilowatt hour per hour
     */
    case REC20_KILO_HOUR_PER_HOUR = 'D03';

    /**
     * kilowatt hour per kelvin (E47)
     *
     * kilowatt hour per kelvin
     */
    case REC20_KILO_HOUR_PER_KELV = 'E47';

    /**
     * Kilowatt hour per normalized cubic metre (KWN)
     *
     * Kilowatt hour per normalized cubic metre
     */
    case REC20_KILO_HOUR_PER_NORM_CUBI_METR = 'KWN';

    /**
     * Kilowatt hour per standard cubic metre (KWS)
     *
     * Kilowatt hour per standard cubic metre
     */
    case REC20_KILO_HOUR_PER_STAN_CUBI_METR = 'KWS';

    /**
     * kilowatt per metre degree Celsius (N82)
     *
     * kilowatt per metre degree Celsius
     */
    case REC20_KILO_PER_METR_DEGR_CELS = 'N82';

    /**
     * kilowatt per metre kelvin (N81)
     *
     * kilowatt per metre kelvin
     */
    case REC20_KILO_PER_METR_KELV = 'N81';

    /**
     * kilowatt per square metre kelvin (N78)
     *
     * kilowatt per square metre kelvin
     */
    case REC20_KILO_PER_SQUA_METR_KELV = 'N78';

    /**
     * kilowatt year (KWY)
     *
     * kilowatt year
     */
    case REC20_KILO_YEAR = 'KWY';

    /**
     * kiloweber (P11)
     *
     * kiloweber
     */
    case REC20_KILOWEBER = 'P11';

    /**
     * kip per square inch (N20)
     *
     * kip per square inch
     */
    case REC20_KIP_PER_SQUA_INCH = 'N20';

    /**
     * kit (KT)
     *
     * kit
     */
    case REC20_KIT = 'KT';

    /**
     * knot (KNT)
     *
     * knot
     */
    case REC20_KNOT = 'KNT';

    /**
     * labour hour (LH)
     *
     * labour hour
     */
    case REC20_LABO_HOUR = 'LH';

    /**
     * lactic dry material percentage (KLK)
     *
     * lactic dry material percentage
     */
    case REC20_LACT_DRY_MATE_PERC = 'KLK';

    /**
     * lactose excess percentage (LAC)
     *
     * lactose excess percentage
     */
    case REC20_LACT_EXCE_PERC = 'LAC';

    /**
     * lambert (P30)
     *
     * lambert
     */
    case REC20_LAMBERT = 'P30';

    /**
     * langley (P40)
     *
     * langley
     */
    case REC20_LANGLEY = 'P40';

    /**
     * layer (LR)
     *
     * layer
     */
    case REC20_LAYER = 'LR';

    /**
     * leaf (LEF)
     *
     * leaf
     */
    case REC20_LEAF = 'LEF';

    /**
     * length (LN)
     *
     * length
     */
    case REC20_LENGTH = 'LN';

    /**
     * light year (B57)
     *
     * light year
     */
    case REC20_LIGH_YEAR = 'B57';

    /**
     * linear foot (LF)
     *
     * linear foot
     */
    case REC20_LINE_FOOT = 'LF';

    /**
     * linear metre (LM)
     *
     * linear metre
     */
    case REC20_LINE_METR = 'LM';

    /**
     * linear yard (LY)
     *
     * linear yard
     */
    case REC20_LINE_YARD = 'LY';

    /**
     * link (LK)
     *
     * link
     */
    case REC20_LINK = 'LK';

    /**
     * liquid pint (US) (PTL)
     *
     * liquid pint (US)
     */
    case REC20_LIQU_PINT_US = 'PTL';

    /**
     * liquid pound (LP)
     *
     * liquid pound
     */
    case REC20_LIQU_POUN = 'LP';

    /**
     * liquid quart (US) (QTL)
     *
     * liquid quart (US)
     */
    case REC20_LIQU_QUAR_US = 'QTL';

    /**
     * litre (LTR)
     *
     * litre
     */
    case REC20_LITRE = 'LTR';

    /**
     * litre of pure alcohol (LPA)
     *
     * litre of pure alcohol
     */
    case REC20_LITR_OF_PURE_ALCO = 'LPA';

    /**
     * litre per bar (G95)
     *
     * litre per bar
     */
    case REC20_LITR_PER_BAR = 'G95';

    /**
     * litre per day (LD)
     *
     * litre per day
     */
    case REC20_LITR_PER_DAY = 'LD';

    /**
     * litre per day bar (G82)
     *
     * litre per day bar
     */
    case REC20_LITR_PER_DAY_BAR = 'G82';

    /**
     * litre per day kelvin (G65)
     *
     * litre per day kelvin
     */
    case REC20_LITR_PER_DAY_KELV = 'G65';

    /**
     * litre per hour (E32)
     *
     * litre per hour
     */
    case REC20_LITR_PER_HOUR = 'E32';

    /**
     * litre per hour bar (G83)
     *
     * litre per hour bar
     */
    case REC20_LITR_PER_HOUR_BAR = 'G83';

    /**
     * litre per hour kelvin (G66)
     *
     * litre per hour kelvin
     */
    case REC20_LITR_PER_HOUR_KELV = 'G66';

    /**
     * litre per kelvin (G28)
     *
     * litre per kelvin
     */
    case REC20_LITR_PER_KELV = 'G28';

    /**
     * litre per kilogram (H83)
     *
     * litre per kilogram
     */
    case REC20_LITR_PER_KILO = 'H83';

    /**
     * litre per litre (K62)
     *
     * litre per litre
     */
    case REC20_LITR_PER_LITR = 'K62';

    /**
     * litre per minute (L2)
     *
     * litre per minute
     */
    case REC20_LITR_PER_MINU = 'L2';

    /**
     * litre per minute bar (G84)
     *
     * litre per minute bar
     */
    case REC20_LITR_PER_MINU_BAR = 'G84';

    /**
     * litre per minute kelvin (G67)
     *
     * litre per minute kelvin
     */
    case REC20_LITR_PER_MINU_KELV = 'G67';

    /**
     * litre per mole (B58)
     *
     * litre per mole
     */
    case REC20_LITR_PER_MOLE = 'B58';

    /**
     * litre per second (G51)
     *
     * litre per second
     */
    case REC20_LITR_PER_SECO = 'G51';

    /**
     * litre per second bar (G85)
     *
     * litre per second bar
     */
    case REC20_LITR_PER_SECO_BAR = 'G85';

    /**
     * litre per second kelvin (G68)
     *
     * litre per second kelvin
     */
    case REC20_LITR_PER_SECO_KELV = 'G68';

    /**
     * load (NL)
     *
     * load
     */
    case REC20_LOAD = 'NL';

    /**
     * lot [unit of procurement] (LO)
     *
     * lot [unit of procurement]
     */
    case REC20_LOT_UNIT_OF_PROC = 'LO';

    /**
     * lot [unit of weight] (D04)
     *
     * lot [unit of weight]
     */
    case REC20_LOT_UNIT_OF_WEIG = 'D04';

    /**
     * lumen (LUM)
     *
     * lumen
     */
    case REC20_LUMEN = 'LUM';

    /**
     * lumen hour (B59)
     *
     * lumen hour
     */
    case REC20_LUME_HOUR = 'B59';

    /**
     * lumen per square foot (P25)
     *
     * lumen per square foot
     */
    case REC20_LUME_PER_SQUA_FOOT = 'P25';

    /**
     * lumen per square metre (B60)
     *
     * lumen per square metre
     */
    case REC20_LUME_PER_SQUA_METR = 'B60';

    /**
     * lumen per watt (B61)
     *
     * lumen per watt
     */
    case REC20_LUME_PER_WATT = 'B61';

    /**
     * lumen second (B62)
     *
     * lumen second
     */
    case REC20_LUME_SECO = 'B62';

    /**
     * lump sum (LS)
     *
     * lump sum
     */
    case REC20_LUMP_SUM = 'LS';

    /**
     * lux (LUX)
     *
     * lux
     */
    case REC20_LUX = 'LUX';

    /**
     * lux hour (B63)
     *
     * lux hour
     */
    case REC20_LUX_HOUR = 'B63';

    /**
     * lux second (B64)
     *
     * lux second
     */
    case REC20_LUX_SECO = 'B64';

    /**
     * manmonth (3C)
     *
     * manmonth
     */
    case REC20_MANMONTH = '3C';

    /**
     * meal (Q3)
     *
     * meal
     */
    case REC20_MEAL = 'Q3';

    /**
     * mebibit (D11)
     *
     * mebibit
     */
    case REC20_MEBIBIT = 'D11';

    /**
     * mebibit per cubic metre (E77)
     *
     * mebibit per cubic metre
     */
    case REC20_MEBI_PER_CUBI_METR = 'E77';

    /**
     * mebibit per metre (E75)
     *
     * mebibit per metre
     */
    case REC20_MEBI_PER_METR = 'E75';

    /**
     * mebibit per square metre (E76)
     *
     * mebibit per square metre
     */
    case REC20_MEBI_PER_SQUA_METR = 'E76';

    /**
     * mebibyte (E63)
     *
     * mebibyte
     */
    case REC20_MEBIBYTE = 'E63';

    /**
     * Mega Joule per Normalised cubic Metre (MNJ)
     *
     * Mega Joule per Normalised cubic Metre
     */
    case REC20_MEGA_JOUL_PER_NORM_CUBI_METR = 'MNJ';

    /**
     * megaampere (H38)
     *
     * megaampere
     */
    case REC20_MEGAAMPERE = 'H38';

    /**
     * megaampere per square metre (B66)
     *
     * megaampere per square metre
     */
    case REC20_MEGA_PER_SQUA_METR = 'B66';

    /**
     * megabaud (J54)
     *
     * megabaud
     */
    case REC20_MEGABAUD = 'J54';

    /**
     * megabecquerel (4N)
     *
     * megabecquerel
     */
    case REC20_MEGABECQUEREL = '4N';

    /**
     * megabecquerel per kilogram (B67)
     *
     * megabecquerel per kilogram
     */
    case REC20_MEGA_PER_KILO = 'B67';

    /**
     * megabit (D36)
     *
     * megabit
     */
    case REC20_MEGABIT = 'D36';

    /**
     * megabit per second (E20)
     *
     * megabit per second
     */
    case REC20_MEGA_PER_SECO = 'E20';

    /**
     * megabyte (4L)
     *
     * megabyte
     */
    case REC20_MEGABYTE = '4L';

    /**
     * megacoulomb (D77)
     *
     * megacoulomb
     */
    case REC20_MEGACOULOMB = 'D77';

    /**
     * megacoulomb per cubic metre (B69)
     *
     * megacoulomb per cubic metre
     */
    case REC20_MEGA_PER_CUBI_METR = 'B69';

    /**
     * megaelectronvolt (B71)
     *
     * megaelectronvolt
     */
    case REC20_MEGAELECTRONVOLT = 'B71';

    /**
     * megagram (2U)
     *
     * megagram
     */
    case REC20_MEGAGRAM = '2U';

    /**
     * megahertz (MHZ)
     *
     * megahertz
     */
    case REC20_MEGAHERTZ = 'MHZ';

    /**
     * megahertz kilometre (H39)
     *
     * megahertz kilometre
     */
    case REC20_MEGA_KILO = 'H39';

    /**
     * megahertz metre (M27)
     *
     * megahertz metre
     */
    case REC20_MEGA_METR = 'M27';

    /**
     * megajoule (3B)
     *
     * megajoule
     */
    case REC20_MEGAJOULE = '3B';

    /**
     * megalitre (MAL)
     *
     * megalitre
     */
    case REC20_MEGALITRE = 'MAL';

    /**
     * megametre (MAM)
     *
     * megametre
     */
    case REC20_MEGAMETRE = 'MAM';

    /**
     * meganewton (B73)
     *
     * meganewton
     */
    case REC20_MEGANEWTON = 'B73';

    /**
     * megaohm (B75)
     *
     * megaohm
     */
    case REC20_MEGAOHM = 'B75';

    /**
     * megaohm per metre (H37)
     *
     * megaohm per metre
     */
    case REC20_MEGA_PER_METR = 'H37';

    /**
     * megapascal (MPA)
     *
     * megapascal
     */
    case REC20_MEGAPASCAL = 'MPA';

    /**
     * megapascal cubic metre per second (F98)
     *
     * megapascal cubic metre per second
     */
    case REC20_MEGA_CUBI_METR_PER_SECO = 'F98';

    /**
     * megapascal litre per second (F97)
     *
     * megapascal litre per second
     */
    case REC20_MEGA_LITR_PER_SECO = 'F97';

    /**
     * megapascal per bar (F05)
     *
     * megapascal per bar
     */
    case REC20_MEGA_PER_BAR = 'F05';

    /**
     * megapascal per kelvin (F85)
     *
     * megapascal per kelvin
     */
    case REC20_MEGA_PER_KELV = 'F85';

    /**
     * megapixel (E38)
     *
     * megapixel
     */
    case REC20_MEGAPIXEL = 'E38';

    /**
     * megavar (MAR)
     *
     * megavar
     */
    case REC20_MEGAVAR = 'MAR';

    /**
     * megavolt (B78)
     *
     * megavolt
     */
    case REC20_MEGAVOLT = 'B78';

    /**
     * megavolt - ampere (MVA)
     *
     * megavolt - ampere
     */
    case REC20_MEGA_AMPE = 'MVA';

    /**
     * megavolt ampere reactive hour (MAH)
     *
     * megavolt ampere reactive hour
     */
    case REC20_MEGA_AMPE_REAC_HOUR = 'MAH';

    /**
     * megawatt (MAW)
     *
     * megawatt
     */
    case REC20_MEGAWATT = 'MAW';

    /**
     * megawatt hour (1000 kW.h) (MWH)
     *
     * megawatt hour (1000 kW.h)
     */
    case REC20_MEGA_HOUR = 'MWH';

    /**
     * megawatt hour per hour (E07)
     *
     * megawatt hour per hour
     */
    case REC20_MEGA_HOUR_PER_HOUR = 'E07';

    /**
     * megawatt per hertz (E08)
     *
     * megawatt per hertz
     */
    case REC20_MEGA_PER_HERT = 'E08';

    /**
     * megawatts per minute (Q35)
     *
     * megawatts per minute
     */
    case REC20_MEGA_PER_MINU = 'Q35';

    /**
     * mesh (57)
     *
     * mesh
     */
    case REC20_MESH = '57';

    /**
     * message (NF)
     *
     * message
     */
    case REC20_MESSAGE = 'NF';

    /**
     * metre (MTR)
     *
     * metre
     */
    case REC20_METRE = 'MTR';

    /**
     * Metre Day (MRD)
     *
     * Metre Day
     */
    case REC20_METR_DAY = 'MRD';

    /**
     * metre kelvin (D18)
     *
     * metre kelvin
     */
    case REC20_METR_KELV = 'D18';

    /**
     * Metre Month (MRM)
     *
     * Metre Month
     */
    case REC20_METR_MONT = 'MRM';

    /**
     * metre per bar (G05)
     *
     * metre per bar
     */
    case REC20_METR_PER_BAR = 'G05';

    /**
     * metre per degree Celcius metre (N83)
     *
     * metre per degree Celcius metre
     */
    case REC20_METR_PER_DEGR_CELC_METR = 'N83';

    /**
     * metre per hour (M60)
     *
     * metre per hour
     */
    case REC20_METR_PER_HOUR = 'M60';

    /**
     * metre per kelvin (F52)
     *
     * metre per kelvin
     */
    case REC20_METR_PER_KELV = 'F52';

    /**
     * metre per minute (2X)
     *
     * metre per minute
     */
    case REC20_METR_PER_MINU = '2X';

    /**
     * metre per pascal (M53)
     *
     * metre per pascal
     */
    case REC20_METR_PER_PASC = 'M53';

    /**
     * metre per radiant (M55)
     *
     * metre per radiant
     */
    case REC20_METR_PER_RADI = 'M55';

    /**
     * metre per second (MTS)
     *
     * metre per second
     */
    case REC20_METR_PER_SECO = 'MTS';

    /**
     * metre per second bar (L13)
     *
     * metre per second bar
     */
    case REC20_METR_PER_SECO_BAR = 'L13';

    /**
     * metre per second kelvin (L12)
     *
     * metre per second kelvin
     */
    case REC20_METR_PER_SECO_KELV = 'L12';

    /**
     * metre per second pascal (M59)
     *
     * metre per second pascal
     */
    case REC20_METR_PER_SECO_PASC = 'M59';

    /**
     * metre per second squared (MSK)
     *
     * metre per second squared
     */
    case REC20_METR_PER_SECO_SQUA = 'MSK';

    /**
     * metre per volt second (H58)
     *
     * metre per volt second
     */
    case REC20_METR_PER_VOLT_SECO = 'H58';

    /**
     * metre to the fourth power (B83)
     *
     * metre to the fourth power
     */
    case REC20_METR_TO_THE_FOUR_POWE = 'B83';

    /**
     * Metre Week (MRW)
     *
     * Metre Week
     */
    case REC20_METR_WEEK = 'MRW';

    /**
     * metric carat (CTM)
     *
     * metric carat
     */
    case REC20_METR_CARA = 'CTM';

    /**
     * metric ton, including container (TIC)
     *
     * metric ton, including container
     */
    case REC20_METR_TON_INCL_CONT = 'TIC';

    /**
     * metric ton, including inner packaging (TIP)
     *
     * metric ton, including inner packaging
     */
    case REC20_METR_TON_INCL_INNE_PACK = 'TIP';

    /**
     * metric ton, lubricating oil (LUB)
     *
     * metric ton, lubricating oil
     */
    case REC20_METR_TON_LUBR_OIL = 'LUB';

    /**
     * micro-inch (M7)
     *
     * micro-inch
     */
    case REC20_MICROINCH = 'M7';

    /**
     * microampere (B84)
     *
     * microampere
     */
    case REC20_MICROAMPERE = 'B84';

    /**
     * microbar (B85)
     *
     * microbar
     */
    case REC20_MICROBAR = 'B85';

    /**
     * microbecquerel (H08)
     *
     * microbecquerel
     */
    case REC20_MICROBECQUEREL = 'H08';

    /**
     * microcoulomb (B86)
     *
     * microcoulomb
     */
    case REC20_MICROCOULOMB = 'B86';

    /**
     * microcoulomb per cubic metre (B87)
     *
     * microcoulomb per cubic metre
     */
    case REC20_MICR_PER_CUBI_METR = 'B87';

    /**
     * microcoulomb per square metre (B88)
     *
     * microcoulomb per square metre
     */
    case REC20_MICR_PER_SQUA_METR = 'B88';

    /**
     * microcurie (M5)
     *
     * microcurie
     */
    case REC20_MICROCURIE = 'M5';

    /**
     * microfarad (4O)
     *
     * microfarad
     */
    case REC20_MICROFARAD = '4O';

    /**
     * microfarad per kilometre (H28)
     *
     * microfarad per kilometre
     */
    case REC20_MICR_PER_KILO = 'H28';

    /**
     * microfarad per metre (B89)
     *
     * microfarad per metre
     */
    case REC20_MICR_PER_METR = 'B89';

    /**
     * microgram (MC)
     *
     * microgram
     */
    case REC20_MICROGRAM = 'MC';

    /**
     * microgram per cubic metre bar (J35)
     *
     * microgram per cubic metre bar
     */
    case REC20_MICR_PER_CUBI_METR_BAR = 'J35';

    /**
     * microgram per cubic metre kelvin (J34)
     *
     * microgram per cubic metre kelvin
     */
    case REC20_MICR_PER_CUBI_METR_KELV = 'J34';

    /**
     * microgram per hectogram (Q29)
     *
     * microgram per hectogram
     */
    case REC20_MICR_PER_HECT = 'Q29';

    /**
     * microgram per litre (H29)
     *
     * microgram per litre
     */
    case REC20_MICR_PER_LITR = 'H29';

    /**
     * microgray per hour (P63)
     *
     * microgray per hour
     */
    case REC20_MICR_PER_HOUR = 'P63';

    /**
     * microgray per minute (P59)
     *
     * microgray per minute
     */
    case REC20_MICR_PER_MINU = 'P59';

    /**
     * microgray per second (P55)
     *
     * microgray per second
     */
    case REC20_MICR_PER_SECO = 'P55';

    /**
     * microhenry (B90)
     *
     * microhenry
     */
    case REC20_MICROHENRY = 'B90';

    /**
     * microhenry per ohm (G99)
     *
     * microhenry per ohm
     */
    case REC20_MICR_PER_OHM = 'G99';

    /**
     * microlitre (4G)
     *
     * microlitre
     */
    case REC20_MICROLITRE = '4G';

    /**
     * micrometre (micron) (4H)
     *
     * micrometre (micron)
     */
    case REC20_MICR_MICR = '4H';

    /**
     * micrometre per kelvin (F50)
     *
     * micrometre per kelvin
     */
    case REC20_MICR_PER_KELV = 'F50';

    /**
     * micromole (FH)
     *
     * micromole
     */
    case REC20_MICROMOLE = 'FH';

    /**
     * micronewton (B92)
     *
     * micronewton
     */
    case REC20_MICRONEWTON = 'B92';

    /**
     * micronewton metre (B93)
     *
     * micronewton metre
     */
    case REC20_MICR_METR = 'B93';

    /**
     * microohm (B94)
     *
     * microohm
     */
    case REC20_MICROOHM = 'B94';

    /**
     * micropascal (B96)
     *
     * micropascal
     */
    case REC20_MICROPASCAL = 'B96';

    /**
     * micropoise (J32)
     *
     * micropoise
     */
    case REC20_MICROPOISE = 'J32';

    /**
     * microradian (B97)
     *
     * microradian
     */
    case REC20_MICRORADIAN = 'B97';

    /**
     * microsecond (B98)
     *
     * microsecond
     */
    case REC20_MICROSECOND = 'B98';

    /**
     * microsiemens (B99)
     *
     * microsiemens
     */
    case REC20_MICROSIEMENS = 'B99';

    /**
     * microsiemens per centimetre (G42)
     *
     * microsiemens per centimetre
     */
    case REC20_MICR_PER_CENT = 'G42';

    /**
     * microtesla (D81)
     *
     * microtesla
     */
    case REC20_MICROTESLA = 'D81';

    /**
     * microvolt (D82)
     *
     * microvolt
     */
    case REC20_MICROVOLT = 'D82';

    /**
     * microwatt (D80)
     *
     * microwatt
     */
    case REC20_MICROWATT = 'D80';

    /**
     * mil (M43)
     *
     * mil
     */
    case REC20_MIL = 'M43';

    /**
     * mile (based on U.S. survey foot) (M52)
     *
     * mile (based on U.S. survey foot)
     */
    case REC20_MILE_BASE_ON_US_SURV_FOOT = 'M52';

    /**
     * mile (statute mile) (SMI)
     *
     * mile (statute mile)
     */
    case REC20_MILE_STAT_MILE = 'SMI';

    /**
     * mile (statute mile) per second squared (M42)
     *
     * mile (statute mile) per second squared
     */
    case REC20_MILE_STAT_MILE_PER_SECO_SQUA = 'M42';

    /**
     * mile per hour (statute mile) (HM)
     *
     * mile per hour (statute mile)
     */
    case REC20_MILE_PER_HOUR_STAT_MILE = 'HM';

    /**
     * mile per minute (M57)
     *
     * mile per minute
     */
    case REC20_MILE_PER_MINU = 'M57';

    /**
     * mile per second (M58)
     *
     * mile per second
     */
    case REC20_MILE_PER_SECO = 'M58';

    /**
     * mille (E12)
     *
     * mille
     */
    case REC20_MILLE = 'E12';

    /**
     * milli-inch (77)
     *
     * milli-inch
     */
    case REC20_MILLIINCH = '77';

    /**
     * milliampere (4K)
     *
     * milliampere
     */
    case REC20_MILLIAMPERE = '4K';

    /**
     * milliampere hour (E09)
     *
     * milliampere hour
     */
    case REC20_MILL_HOUR = 'E09';

    /**
     * milliampere per bar (F59)
     *
     * milliampere per bar
     */
    case REC20_MILL_PER_BAR = 'F59';

    /**
     * milliampere per inch (F08)
     *
     * milliampere per inch
     */
    case REC20_MILL_PER_INCH = 'F08';

    /**
     * milliampere per litre minute (G59)
     *
     * milliampere per litre minute
     */
    case REC20_MILL_PER_LITR_MINU = 'G59';

    /**
     * milliampere per millimetre (F76)
     *
     * milliampere per millimetre
     */
    case REC20_MILL_PER_MILL = 'F76';

    /**
     * milliampere per pound-force per square inch (F57)
     *
     * milliampere per pound-force per square inch
     */
    case REC20_MILL_PER_POUN_PER_SQUA_INCH = 'F57';

    /**
     * milliard (MLD)
     *
     * milliard
     */
    case REC20_MILLIARD = 'MLD';

    /**
     * millibar (MBR)
     *
     * millibar
     */
    case REC20_MILLIBAR = 'MBR';

    /**
     * millibar cubic metre per second (F96)
     *
     * millibar cubic metre per second
     */
    case REC20_MILL_CUBI_METR_PER_SECO = 'F96';

    /**
     * millibar litre per second (F95)
     *
     * millibar litre per second
     */
    case REC20_MILL_LITR_PER_SECO = 'F95';

    /**
     * millibar per kelvin (F84)
     *
     * millibar per kelvin
     */
    case REC20_MILL_PER_KELV = 'F84';

    /**
     * millicandela (P34)
     *
     * millicandela
     */
    case REC20_MILLICANDELA = 'P34';

    /**
     * millicoulomb (D86)
     *
     * millicoulomb
     */
    case REC20_MILLICOULOMB = 'D86';

    /**
     * millicoulomb per cubic metre (D88)
     *
     * millicoulomb per cubic metre
     */
    case REC20_MILL_PER_CUBI_METR = 'D88';

    /**
     * millicoulomb per kilogram (C8)
     *
     * millicoulomb per kilogram
     */
    case REC20_MILL_PER_KILO = 'C8';

    /**
     * millicoulomb per square metre (D89)
     *
     * millicoulomb per square metre
     */
    case REC20_MILL_PER_SQUA_METR = 'D89';

    /**
     * millicurie (MCU)
     *
     * millicurie
     */
    case REC20_MILLICURIE = 'MCU';

    /**
     * milliequivalence caustic potash per gram of product (KO)
     *
     * milliequivalence caustic potash per gram of product
     */
    case REC20_MILL_CAUS_POTA_PER_GRAM_OF_PROD = 'KO';

    /**
     * millifarad (C10)
     *
     * millifarad
     */
    case REC20_MILLIFARAD = 'C10';

    /**
     * milligal (C11)
     *
     * milligal
     */
    case REC20_MILLIGAL = 'C11';

    /**
     * milligram (MGM)
     *
     * milligram
     */
    case REC20_MILLIGRAM = 'MGM';

    /**
     * milligram per cubic metre bar (L18)
     *
     * milligram per cubic metre bar
     */
    case REC20_MILL_PER_CUBI_METR_BAR = 'L18';

    /**
     * milligram per cubic metre kelvin (L17)
     *
     * milligram per cubic metre kelvin
     */
    case REC20_MILL_PER_CUBI_METR_KELV = 'L17';

    /**
     * milligram per day (F32)
     *
     * milligram per day
     */
    case REC20_MILL_PER_DAY = 'F32';

    /**
     * milligram per day bar (F70)
     *
     * milligram per day bar
     */
    case REC20_MILL_PER_DAY_BAR = 'F70';

    /**
     * milligram per day kelvin (F43)
     *
     * milligram per day kelvin
     */
    case REC20_MILL_PER_DAY_KELV = 'F43';

    /**
     * milligram per gram (H64)
     *
     * milligram per gram
     */
    case REC20_MILL_PER_GRAM = 'H64';

    /**
     * milligram per hour (4M)
     *
     * milligram per hour
     */
    case REC20_MILL_PER_HOUR = '4M';

    /**
     * milligram per hour bar (F71)
     *
     * milligram per hour bar
     */
    case REC20_MILL_PER_HOUR_BAR = 'F71';

    /**
     * milligram per hour kelvin (F44)
     *
     * milligram per hour kelvin
     */
    case REC20_MILL_PER_HOUR_KELV = 'F44';

    /**
     * milligram per litre (M1)
     *
     * milligram per litre
     */
    case REC20_MILL_PER_LITR = 'M1';

    /**
     * milligram per metre (C12)
     *
     * milligram per metre
     */
    case REC20_MILL_PER_METR = 'C12';

    /**
     * milligram per minute (F33)
     *
     * milligram per minute
     */
    case REC20_MILL_PER_MINU = 'F33';

    /**
     * milligram per minute bar (F72)
     *
     * milligram per minute bar
     */
    case REC20_MILL_PER_MINU_BAR = 'F72';

    /**
     * milligram per minute kelvin (F45)
     *
     * milligram per minute kelvin
     */
    case REC20_MILL_PER_MINU_KELV = 'F45';

    /**
     * milligram per second (F34)
     *
     * milligram per second
     */
    case REC20_MILL_PER_SECO = 'F34';

    /**
     * milligram per second bar (F73)
     *
     * milligram per second bar
     */
    case REC20_MILL_PER_SECO_BAR = 'F73';

    /**
     * milligram per second kelvin (F46)
     *
     * milligram per second kelvin
     */
    case REC20_MILL_PER_SECO_KELV = 'F46';

    /**
     * milligram per square centimetre (H63)
     *
     * milligram per square centimetre
     */
    case REC20_MILL_PER_SQUA_CENT = 'H63';

    /**
     * milligray (C13)
     *
     * milligray
     */
    case REC20_MILLIGRAY = 'C13';

    /**
     * millihenry (C14)
     *
     * millihenry
     */
    case REC20_MILLIHENRY = 'C14';

    /**
     * millihenry per ohm (H06)
     *
     * millihenry per ohm
     */
    case REC20_MILL_PER_OHM = 'H06';

    /**
     * millihertz (MTZ)
     *
     * millihertz
     */
    case REC20_MILLIHERTZ = 'MTZ';

    /**
     * millijoule (C15)
     *
     * millijoule
     */
    case REC20_MILLIJOULE = 'C15';

    /**
     * millilitre (MLT)
     *
     * millilitre
     */
    case REC20_MILLILITRE = 'MLT';

    /**
     * millilitre per square centimetre minute (M22)
     *
     * millilitre per square centimetre minute
     */
    case REC20_MILL_PER_SQUA_CENT_MINU = 'M22';

    /**
     * millilitre per square centimetre second (35)
     *
     * millilitre per square centimetre second
     */
    case REC20_MILL_PER_SQUA_CENT_SECO = '35';

    /**
     * millimetre (MMT)
     *
     * millimetre
     */
    case REC20_MILLIMETRE = 'MMT';

    /**
     * millimetre per degree Celcius metre (E97)
     *
     * millimetre per degree Celcius metre
     */
    case REC20_MILL_PER_DEGR_CELC_METR = 'E97';

    /**
     * millimetre per second squared (M41)
     *
     * millimetre per second squared
     */
    case REC20_MILL_PER_SECO_SQUA = 'M41';

    /**
     * millimetre per year (H66)
     *
     * millimetre per year
     */
    case REC20_MILL_PER_YEAR = 'H66';

    /**
     * millimetre squared per second (C17)
     *
     * millimetre squared per second
     */
    case REC20_MILL_SQUA_PER_SECO = 'C17';

    /**
     * millimetre to the fourth power (G77)
     *
     * millimetre to the fourth power
     */
    case REC20_MILL_TO_THE_FOUR_POWE = 'G77';

    /**
     * millimole (C18)
     *
     * millimole
     */
    case REC20_MILLIMOLE = 'C18';

    /**
     * millinewton (C20)
     *
     * millinewton
     */
    case REC20_MILLINEWTON = 'C20';

    /**
     * millinewton metre (D83)
     *
     * millinewton metre
     */
    case REC20_MILL_METR = 'D83';

    /**
     * milliohm (E45)
     *
     * milliohm
     */
    case REC20_MILLIOHM = 'E45';

    /**
     * million (MIO)
     *
     * million
     */
    case REC20_MILLION = 'MIO';

    /**
     * million Btu per 1000 cubic foot (M9)
     *
     * million Btu per 1000 cubic foot
     */
    case REC20_MILL_BTU_PER__CUBI_FOOT = 'M9';

    /**
     * million Btu(IT) per hour (E16)
     *
     * million Btu(IT) per hour
     */
    case REC20_MILL_BTUI_PER_HOUR = 'E16';

    /**
     * million cubic metre (HMQ)
     *
     * million cubic metre
     */
    case REC20_MILL_CUBI_METR = 'HMQ';

    /**
     * million international unit (MIU)
     *
     * million international unit
     */
    case REC20_MILL_INTE_UNIT = 'MIU';

    /**
     * millipascal (74)
     *
     * millipascal
     */
    case REC20_MILLIPASCAL = '74';

    /**
     * millipascal second (C24)
     *
     * millipascal second
     */
    case REC20_MILL_SECO = 'C24';

    /**
     * millipascal second per bar (L16)
     *
     * millipascal second per bar
     */
    case REC20_MILL_SECO_PER_BAR = 'L16';

    /**
     * millipascal second per kelvin (L15)
     *
     * millipascal second per kelvin
     */
    case REC20_MILL_SECO_PER_KELV = 'L15';

    /**
     * milliradian (C25)
     *
     * milliradian
     */
    case REC20_MILLIRADIAN = 'C25';

    /**
     * milliroentgen (2Y)
     *
     * milliroentgen
     */
    case REC20_MILLIROENTGEN = '2Y';

    /**
     * milliroentgen aequivalent men (L31)
     *
     * milliroentgen aequivalent men
     */
    case REC20_MILL_AEQU_MEN = 'L31';

    /**
     * millisecond (C26)
     *
     * millisecond
     */
    case REC20_MILLISECOND = 'C26';

    /**
     * millisiemens (C27)
     *
     * millisiemens
     */
    case REC20_MILLISIEMENS = 'C27';

    /**
     * millisiemens per centimetre (H61)
     *
     * millisiemens per centimetre
     */
    case REC20_MILL_PER_CENT = 'H61';

    /**
     * millisievert (C28)
     *
     * millisievert
     */
    case REC20_MILLISIEVERT = 'C28';

    /**
     * millitesla (C29)
     *
     * millitesla
     */
    case REC20_MILLITESLA = 'C29';

    /**
     * millivolt (2Z)
     *
     * millivolt
     */
    case REC20_MILLIVOLT = '2Z';

    /**
     * millivolt - ampere (M35)
     *
     * millivolt - ampere
     */
    case REC20_MILL_AMPE = 'M35';

    /**
     * milliwatt (C31)
     *
     * milliwatt
     */
    case REC20_MILLIWATT = 'C31';

    /**
     * milliweber (C33)
     *
     * milliweber
     */
    case REC20_MILLIWEBER = 'C33';

    /**
     * minute [unit of angle] (D61)
     *
     * minute [unit of angle]
     */
    case REC20_MINU_UNIT_OF_ANGL = 'D61';

    /**
     * minute [unit of time] (MIN)
     *
     * minute [unit of time]
     */
    case REC20_MINU_UNIT_OF_TIME = 'MIN';

    /**
     * MMSCF/day (5E)
     *
     * MMSCF/day
     */
    case REC20_MMSCFDAY = '5E';

    /**
     * module width (H77)
     *
     * module width
     */
    case REC20_MODU_WIDT = 'H77';

    /**
     * mol per cubic metre pascal (P52)
     *
     * mol per cubic metre pascal
     */
    case REC20_MOL_PER_CUBI_METR_PASC = 'P52';

    /**
     * mol per kilogram pascal (P51)
     *
     * mol per kilogram pascal
     */
    case REC20_MOL_PER_KILO_PASC = 'P51';

    /**
     * mole (C34)
     *
     * mole
     */
    case REC20_MOLE = 'C34';

    /**
     * mole per cubic decimetre (C35)
     *
     * mole per cubic decimetre
     */
    case REC20_MOLE_PER_CUBI_DECI = 'C35';

    /**
     * mole per cubic metre (C36)
     *
     * mole per cubic metre
     */
    case REC20_MOLE_PER_CUBI_METR = 'C36';

    /**
     * mole per cubic metre bar (L29)
     *
     * mole per cubic metre bar
     */
    case REC20_MOLE_PER_CUBI_METR_BAR = 'L29';

    /**
     * mole per cubic metre kelvin (L28)
     *
     * mole per cubic metre kelvin
     */
    case REC20_MOLE_PER_CUBI_METR_KELV = 'L28';

    /**
     * mole per cubiv metre to the power sum of stoichiometric numbers (P99)
     *
     * mole per cubiv metre to the power sum of stoichiometric numbers
     */
    case REC20_MOLE_PER_CUBI_METR_TO_THE_POWE_SUM_OF_STOI_NUMB = 'P99';

    /**
     * mole per hour (L23)
     *
     * mole per hour
     */
    case REC20_MOLE_PER_HOUR = 'L23';

    /**
     * mole per kilogram (C19)
     *
     * mole per kilogram
     */
    case REC20_MOLE_PER_KILO = 'C19';

    /**
     * mole per kilogram bar (L25)
     *
     * mole per kilogram bar
     */
    case REC20_MOLE_PER_KILO_BAR = 'L25';

    /**
     * mole per kilogram kelvin (L24)
     *
     * mole per kilogram kelvin
     */
    case REC20_MOLE_PER_KILO_KELV = 'L24';

    /**
     * mole per litre (C38)
     *
     * mole per litre
     */
    case REC20_MOLE_PER_LITR = 'C38';

    /**
     * mole per litre bar (L27)
     *
     * mole per litre bar
     */
    case REC20_MOLE_PER_LITR_BAR = 'L27';

    /**
     * mole per litre kelvin (L26)
     *
     * mole per litre kelvin
     */
    case REC20_MOLE_PER_LITR_KELV = 'L26';

    /**
     * mole per minute (L30)
     *
     * mole per minute
     */
    case REC20_MOLE_PER_MINU = 'L30';

    /**
     * mole per second (E95)
     *
     * mole per second
     */
    case REC20_MOLE_PER_SECO = 'E95';

    /**
     * monetary value (M4)
     *
     * monetary value
     */
    case REC20_MONE_VALU = 'M4';

    /**
     * month (MON)
     *
     * month
     */
    case REC20_MONTH = 'MON';

    /**
     * mutually defined (ZZ)
     *
     * mutually defined
     */
    case REC20_MUTU_DEFI = 'ZZ';

    /**
     * nanoampere (C39)
     *
     * nanoampere
     */
    case REC20_NANOAMPERE = 'C39';

    /**
     * nanocoulomb (C40)
     *
     * nanocoulomb
     */
    case REC20_NANOCOULOMB = 'C40';

    /**
     * nanofarad (C41)
     *
     * nanofarad
     */
    case REC20_NANOFARAD = 'C41';

    /**
     * nanofarad per metre (C42)
     *
     * nanofarad per metre
     */
    case REC20_NANO_PER_METR = 'C42';

    /**
     * nanogram per kilogram (L32)
     *
     * nanogram per kilogram
     */
    case REC20_NANO_PER_KILO = 'L32';

    /**
     * nanogray per hour (P64)
     *
     * nanogray per hour
     */
    case REC20_NANO_PER_HOUR = 'P64';

    /**
     * nanogray per minute (P60)
     *
     * nanogray per minute
     */
    case REC20_NANO_PER_MINU = 'P60';

    /**
     * nanogray per second (P56)
     *
     * nanogray per second
     */
    case REC20_NANO_PER_SECO = 'P56';

    /**
     * nanohenry (C43)
     *
     * nanohenry
     */
    case REC20_NANOHENRY = 'C43';

    /**
     * nanolitre (Q34)
     *
     * nanolitre
     */
    case REC20_NANOLITRE = 'Q34';

    /**
     * nanometre (C45)
     *
     * nanometre
     */
    case REC20_NANOMETRE = 'C45';

    /**
     * nanomole (Z9)
     *
     * nanomole
     */
    case REC20_NANOMOLE = 'Z9';

    /**
     * nanoohm (P22)
     *
     * nanoohm
     */
    case REC20_NANOOHM = 'P22';

    /**
     * nanoohm metre (C46)
     *
     * nanoohm metre
     */
    case REC20_NANO_METR = 'C46';

    /**
     * nanosecond (C47)
     *
     * nanosecond
     */
    case REC20_NANOSECOND = 'C47';

    /**
     * nanosiemens per centimetre (G44)
     *
     * nanosiemens per centimetre
     */
    case REC20_NANO_PER_CENT = 'G44';

    /**
     * nanotesla (C48)
     *
     * nanotesla
     */
    case REC20_NANOTESLA = 'C48';

    /**
     * nanowatt (C49)
     *
     * nanowatt
     */
    case REC20_NANOWATT = 'C49';

    /**
     * natural unit of information (Q16)
     *
     * natural unit of information
     */
    case REC20_NATU_UNIT_OF_INFO = 'Q16';

    /**
     * natural unit of information per second (Q19)
     *
     * natural unit of information per second
     */
    case REC20_NATU_UNIT_OF_INFO_PER_SECO = 'Q19';

    /**
     * nautical mile (NMI)
     *
     * nautical mile
     */
    case REC20_NAUT_MILE = 'NMI';

    /**
     * neper (C50)
     *
     * neper
     */
    case REC20_NEPER = 'C50';

    /**
     * neper per second (C51)
     *
     * neper per second
     */
    case REC20_NEPE_PER_SECO = 'C51';

    /**
     * Nephelometric turbidity unit (NTU)
     *
     * Nephelometric turbidity unit
     */
    case REC20_NEPH_TURB_UNIT = 'NTU';

    /**
     * net kilogram (58)
     *
     * net kilogram
     */
    case REC20_NET_KILO = '58';

    /**
     * net ton (NT)
     *
     * net ton
     */
    case REC20_NET_TON = 'NT';

    /**
     * newton (NEW)
     *
     * newton
     */
    case REC20_NEWTON = 'NEW';

    /**
     * newton centimetre (F88)
     *
     * newton centimetre
     */
    case REC20_NEWT_CENT = 'F88';

    /**
     * newton metre (NU)
     *
     * newton metre
     */
    case REC20_NEWT_METR = 'NU';

    /**
     * newton metre per ampere (F90)
     *
     * newton metre per ampere
     */
    case REC20_NEWT_METR_PER_AMPE = 'F90';

    /**
     * newton metre per degree (F89)
     *
     * newton metre per degree
     */
    case REC20_NEWT_METR_PER_DEGR = 'F89';

    /**
     * newton metre per kilogram (G19)
     *
     * newton metre per kilogram
     */
    case REC20_NEWT_METR_PER_KILO = 'G19';

    /**
     * newton metre per metre (Q27)
     *
     * newton metre per metre
     */
    case REC20_NEWT_METR_PER_METR = 'Q27';

    /**
     * newton metre per radian (M93)
     *
     * newton metre per radian
     */
    case REC20_NEWT_METR_PER_RADI = 'M93';

    /**
     * newton metre per square metre (M34)
     *
     * newton metre per square metre
     */
    case REC20_NEWT_METR_PER_SQUA_METR = 'M34';

    /**
     * newton metre second (C53)
     *
     * newton metre second
     */
    case REC20_NEWT_METR_SECO = 'C53';

    /**
     * newton metre squared per kilogram squared (C54)
     *
     * newton metre squared per kilogram squared
     */
    case REC20_NEWT_METR_SQUA_PER_KILO_SQUA = 'C54';

    /**
     * newton metre watt to the power minus 0,5 (H41)
     *
     * newton metre watt to the power minus 0,5
     */
    case REC20_NEWT_METR_WATT_TO_THE_POWE_MINU = 'H41';

    /**
     * newton per ampere (H40)
     *
     * newton per ampere
     */
    case REC20_NEWT_PER_AMPE = 'H40';

    /**
     * newton per centimetre (M23)
     *
     * newton per centimetre
     */
    case REC20_NEWT_PER_CENT = 'M23';

    /**
     * newton per metre (4P)
     *
     * newton per metre
     */
    case REC20_NEWT_PER_METR = '4P';

    /**
     * newton per millimetre (F47)
     *
     * newton per millimetre
     */
    case REC20_NEWT_PER_MILL = 'F47';

    /**
     * newton per square centimetre (E01)
     *
     * newton per square centimetre
     */
    case REC20_NEWT_PER_SQUA_CENT = 'E01';

    /**
     * newton per square metre (C55)
     *
     * newton per square metre
     */
    case REC20_NEWT_PER_SQUA_METR = 'C55';

    /**
     * newton per square millimetre (C56)
     *
     * newton per square millimetre
     */
    case REC20_NEWT_PER_SQUA_MILL = 'C56';

    /**
     * newton second (C57)
     *
     * newton second
     */
    case REC20_NEWT_SECO = 'C57';

    /**
     * newton second per metre (C58)
     *
     * newton second per metre
     */
    case REC20_NEWT_SECO_PER_METR = 'C58';

    /**
     * newton second per square metre (N36)
     *
     * newton second per square metre
     */
    case REC20_NEWT_SECO_PER_SQUA_METR = 'N36';

    /**
     * newton square metre per ampere (P49)
     *
     * newton square metre per ampere
     */
    case REC20_NEWT_SQUA_METR_PER_AMPE = 'P49';

    /**
     * nil (NIL)
     *
     * nil
     */
    case REC20_NIL = 'NIL';

    /**
     * Normalised cubic metre (NM3)
     *
     * Normalised cubic metre
     */
    case REC20_NORM_CUBI_METR = 'NM3';

    /**
     * Normalized cubic metre per day (Q39)
     *
     * Normalized cubic metre per day
     */
    case REC20_NORM_CUBI_METR_PER_DAY = 'Q39';

    /**
     * Normalized cubic metre per hour (Q40)
     *
     * Normalized cubic metre per hour
     */
    case REC20_NORM_CUBI_METR_PER_HOUR = 'Q40';

    /**
     * number of articles (NAR)
     *
     * number of articles
     */
    case REC20_NUMB_OF_ARTI = 'NAR';

    /**
     * number of cells (NCL)
     *
     * number of cells
     */
    case REC20_NUMB_OF_CELL = 'NCL';

    /**
     * number of international units (NIU)
     *
     * number of international units
     */
    case REC20_NUMB_OF_INTE_UNIT = 'NIU';

    /**
     * number of jewels (JWL)
     *
     * number of jewels
     */
    case REC20_NUMB_OF_JEWE = 'JWL';

    /**
     * number of packs (NMP)
     *
     * number of packs
     */
    case REC20_NUMB_OF_PACK = 'NMP';

    /**
     * number of parts (NPT)
     *
     * number of parts
     */
    case REC20_NUMB_OF_PART = 'NPT';

    /**
     * number of words (D68)
     *
     * number of words
     */
    case REC20_NUMB_OF_WORD = 'D68';

    /**
     * octave (C59)
     *
     * octave
     */
    case REC20_OCTAVE = 'C59';

    /**
     * octet (Q12)
     *
     * octet
     */
    case REC20_OCTET = 'Q12';

    /**
     * octet per second (Q13)
     *
     * octet per second
     */
    case REC20_OCTE_PER_SECO = 'Q13';

    /**
     * ODS Grams (ODG)
     *
     * ODS Grams
     */
    case REC20_ODS_GRAM = 'ODG';

    /**
     * ODS Kilograms (ODK)
     *
     * ODS Kilograms
     */
    case REC20_ODS_KILO = 'ODK';

    /**
     * ODS Milligrams (ODM)
     *
     * ODS Milligrams
     */
    case REC20_ODS_MILL = 'ODM';

    /**
     * ohm (OHM)
     *
     * ohm
     */
    case REC20_OHM = 'OHM';

    /**
     * ohm centimetre (C60)
     *
     * ohm centimetre
     */
    case REC20_OHM_CENT = 'C60';

    /**
     * ohm circular-mil per foot (P23)
     *
     * ohm circular-mil per foot
     */
    case REC20_OHM_CIRC_PER_FOOT = 'P23';

    /**
     * ohm kilometre (M24)
     *
     * ohm kilometre
     */
    case REC20_OHM_KILO = 'M24';

    /**
     * ohm metre (C61)
     *
     * ohm metre
     */
    case REC20_OHM_METR = 'C61';

    /**
     * ohm per kilometre (F56)
     *
     * ohm per kilometre
     */
    case REC20_OHM_PER_KILO = 'F56';

    /**
     * ohm per metre (H26)
     *
     * ohm per metre
     */
    case REC20_OHM_PER_METR = 'H26';

    /**
     * ohm per mile (statute mile) (F55)
     *
     * ohm per mile (statute mile)
     */
    case REC20_OHM_PER_MILE_STAT_MILE = 'F55';

    /**
     * one (C62)
     *
     * one
     */
    case REC20_ONE = 'C62';

    /**
     * one per one (Q26)
     *
     * one per one
     */
    case REC20_ONE_PER_ONE = 'Q26';

    /**
     * oscillations per minute (OPM)
     *
     * oscillations per minute
     */
    case REC20_OSCI_PER_MINU = 'OPM';

    /**
     * ounce (avoirdupois) (ONZ)
     *
     * ounce (avoirdupois)
     */
    case REC20_OUNC_AVOI = 'ONZ';

    /**
     * ounce (avoirdupois) per cubic inch (L39)
     *
     * ounce (avoirdupois) per cubic inch
     */
    case REC20_OUNC_AVOI_PER_CUBI_INCH = 'L39';

    /**
     * ounce (avoirdupois) per cubic yard (G32)
     *
     * ounce (avoirdupois) per cubic yard
     */
    case REC20_OUNC_AVOI_PER_CUBI_YARD = 'G32';

    /**
     * ounce (avoirdupois) per day (L33)
     *
     * ounce (avoirdupois) per day
     */
    case REC20_OUNC_AVOI_PER_DAY = 'L33';

    /**
     * ounce (avoirdupois) per gallon (UK) (L37)
     *
     * ounce (avoirdupois) per gallon (UK)
     */
    case REC20_OUNC_AVOI_PER_GALL_UK = 'L37';

    /**
     * ounce (avoirdupois) per gallon (US) (L38)
     *
     * ounce (avoirdupois) per gallon (US)
     */
    case REC20_OUNC_AVOI_PER_GALL_US = 'L38';

    /**
     * ounce (avoirdupois) per hour (L34)
     *
     * ounce (avoirdupois) per hour
     */
    case REC20_OUNC_AVOI_PER_HOUR = 'L34';

    /**
     * ounce (avoirdupois) per minute (L35)
     *
     * ounce (avoirdupois) per minute
     */
    case REC20_OUNC_AVOI_PER_MINU = 'L35';

    /**
     * ounce (avoirdupois) per second (L36)
     *
     * ounce (avoirdupois) per second
     */
    case REC20_OUNC_AVOI_PER_SECO = 'L36';

    /**
     * ounce (avoirdupois) per square inch (N22)
     *
     * ounce (avoirdupois) per square inch
     */
    case REC20_OUNC_AVOI_PER_SQUA_INCH = 'N22';

    /**
     * ounce (avoirdupois)-force inch (L41)
     *
     * ounce (avoirdupois)-force inch
     */
    case REC20_OUNC_AVOI_INCH = 'L41';

    /**
     * ounce (UK fluid) per day (J95)
     *
     * ounce (UK fluid) per day
     */
    case REC20_OUNC_UK_FLUI_PER_DAY = 'J95';

    /**
     * ounce (UK fluid) per hour (J96)
     *
     * ounce (UK fluid) per hour
     */
    case REC20_OUNC_UK_FLUI_PER_HOUR = 'J96';

    /**
     * ounce (UK fluid) per minute (J97)
     *
     * ounce (UK fluid) per minute
     */
    case REC20_OUNC_UK_FLUI_PER_MINU = 'J97';

    /**
     * ounce (UK fluid) per second (J98)
     *
     * ounce (UK fluid) per second
     */
    case REC20_OUNC_UK_FLUI_PER_SECO = 'J98';

    /**
     * ounce (US fluid) per day (J99)
     *
     * ounce (US fluid) per day
     */
    case REC20_OUNC_US_FLUI_PER_DAY = 'J99';

    /**
     * ounce (US fluid) per hour (K10)
     *
     * ounce (US fluid) per hour
     */
    case REC20_OUNC_US_FLUI_PER_HOUR = 'K10';

    /**
     * ounce (US fluid) per minute (K11)
     *
     * ounce (US fluid) per minute
     */
    case REC20_OUNC_US_FLUI_PER_MINU = 'K11';

    /**
     * ounce (US fluid) per second (K12)
     *
     * ounce (US fluid) per second
     */
    case REC20_OUNC_US_FLUI_PER_SECO = 'K12';

    /**
     * ounce foot (4R)
     *
     * ounce foot
     */
    case REC20_OUNC_FOOT = '4R';

    /**
     * ounce inch (4Q)
     *
     * ounce inch
     */
    case REC20_OUNC_INCH = '4Q';

    /**
     * ounce per square foot (37)
     *
     * ounce per square foot
     */
    case REC20_OUNC_PER_SQUA_FOOT = '37';

    /**
     * ounce per square foot per 0,01inch (38)
     *
     * ounce per square foot per 0,01inch
     */
    case REC20_OUNC_PER_SQUA_FOOT_PER_I = '38';

    /**
     * ounce per square yard (ON)
     *
     * ounce per square yard
     */
    case REC20_OUNC_PER_SQUA_YARD = 'ON';

    /**
     * outfit (11)
     *
     * outfit
     */
    case REC20_OUTFIT = '11';

    /**
     * overtime hour (OT)
     *
     * overtime hour
     */
    case REC20_OVER_HOUR = 'OT';

    /**
     * ozone depletion equivalent (ODE)
     *
     * ozone depletion equivalent
     */
    case REC20_OZON_DEPL_EQUI = 'ODE';

    /**
     * pad (PD)
     *
     * pad
     */
    case REC20_PAD = 'PD';

    /**
     * page (ZP)
     *
     * page
     */
    case REC20_PAGE = 'ZP';

    /**
     * page - facsimile (QA)
     *
     * page - facsimile
     */
    case REC20_PAGE_FACS = 'QA';

    /**
     * page - hardcopy (QB)
     *
     * page - hardcopy
     */
    case REC20_PAGE_HARD = 'QB';

    /**
     * page per inch (PQ)
     *
     * page per inch
     */
    case REC20_PAGE_PER_INCH = 'PQ';

    /**
     * pair (PR)
     *
     * pair
     */
    case REC20_PAIR = 'PR';

    /**
     * panel (OA)
     *
     * panel
     */
    case REC20_PANEL = 'OA';

    /**
     * parsec (C63)
     *
     * parsec
     */
    case REC20_PARSEC = 'C63';

    /**
     * part per billion (US) (61)
     *
     * part per billion (US)
     */
    case REC20_PART_PER_BILL_US = '61';

    /**
     * part per hundred thousand (E40)
     *
     * part per hundred thousand
     */
    case REC20_PART_PER_HUND_THOU = 'E40';

    /**
     * part per million (59)
     *
     * part per million
     */
    case REC20_PART_PER_MILL = '59';

    /**
     * part per thousand (NX)
     *
     * part per thousand
     */
    case REC20_PART_PER_THOU = 'NX';

    /**
     * pascal (PAL)
     *
     * pascal
     */
    case REC20_PASCAL = 'PAL';

    /**
     * pascal cubic metre per second (G01)
     *
     * pascal cubic metre per second
     */
    case REC20_PASC_CUBI_METR_PER_SECO = 'G01';

    /**
     * pascal litre per second (F99)
     *
     * pascal litre per second
     */
    case REC20_PASC_LITR_PER_SECO = 'F99';

    /**
     * pascal per bar (F07)
     *
     * pascal per bar
     */
    case REC20_PASC_PER_BAR = 'F07';

    /**
     * pascal per kelvin (C64)
     *
     * pascal per kelvin
     */
    case REC20_PASC_PER_KELV = 'C64';

    /**
     * pascal per metre (H42)
     *
     * pascal per metre
     */
    case REC20_PASC_PER_METR = 'H42';

    /**
     * pascal second (C65)
     *
     * pascal second
     */
    case REC20_PASC_SECO = 'C65';

    /**
     * pascal second per bar (H07)
     *
     * pascal second per bar
     */
    case REC20_PASC_SECO_PER_BAR = 'H07';

    /**
     * pascal second per cubic metre (C66)
     *
     * pascal second per cubic metre
     */
    case REC20_PASC_SECO_PER_CUBI_METR = 'C66';

    /**
     * pascal second per kelvin (F77)
     *
     * pascal second per kelvin
     */
    case REC20_PASC_SECO_PER_KELV = 'F77';

    /**
     * pascal second per litre (M32)
     *
     * pascal second per litre
     */
    case REC20_PASC_SECO_PER_LITR = 'M32';

    /**
     * pascal second per metre (C67)
     *
     * pascal second per metre
     */
    case REC20_PASC_SECO_PER_METR = 'C67';

    /**
     * pascal square metre per kilogram (P79)
     *
     * pascal square metre per kilogram
     */
    case REC20_PASC_SQUA_METR_PER_KILO = 'P79';

    /**
     * pascal squared second (P42)
     *
     * pascal squared second
     */
    case REC20_PASC_SQUA_SECO = 'P42';

    /**
     * pascal to the power sum of stoichiometric numbers (P98)
     *
     * pascal to the power sum of stoichiometric numbers
     */
    case REC20_PASC_TO_THE_POWE_SUM_OF_STOI_NUMB = 'P98';

    /**
     * pebibit per cubic metre (E82)
     *
     * pebibit per cubic metre
     */
    case REC20_PEBI_PER_CUBI_METR = 'E82';

    /**
     * pebibit per metre (E80)
     *
     * pebibit per metre
     */
    case REC20_PEBI_PER_METR = 'E80';

    /**
     * pebibit per square metre (E81)
     *
     * pebibit per square metre
     */
    case REC20_PEBI_PER_SQUA_METR = 'E81';

    /**
     * pebibyte (E60)
     *
     * pebibyte
     */
    case REC20_PEBIBYTE = 'E60';

    /**
     * peck (G23)
     *
     * peck
     */
    case REC20_PECK = 'G23';

    /**
     * peck (UK) (L43)
     *
     * peck (UK)
     */
    case REC20_PECK_UK = 'L43';

    /**
     * peck (UK) per day (L44)
     *
     * peck (UK) per day
     */
    case REC20_PECK_UK_PER_DAY = 'L44';

    /**
     * peck (UK) per hour (L45)
     *
     * peck (UK) per hour
     */
    case REC20_PECK_UK_PER_HOUR = 'L45';

    /**
     * peck (UK) per minute (L46)
     *
     * peck (UK) per minute
     */
    case REC20_PECK_UK_PER_MINU = 'L46';

    /**
     * peck (UK) per second (L47)
     *
     * peck (UK) per second
     */
    case REC20_PECK_UK_PER_SECO = 'L47';

    /**
     * peck (US dry) per day (L48)
     *
     * peck (US dry) per day
     */
    case REC20_PECK_US_DRY_PER_DAY = 'L48';

    /**
     * peck (US dry) per hour (L49)
     *
     * peck (US dry) per hour
     */
    case REC20_PECK_US_DRY_PER_HOUR = 'L49';

    /**
     * peck (US dry) per minute (L50)
     *
     * peck (US dry) per minute
     */
    case REC20_PECK_US_DRY_PER_MINU = 'L50';

    /**
     * peck (US dry) per second (L51)
     *
     * peck (US dry) per second
     */
    case REC20_PECK_US_DRY_PER_SECO = 'L51';

    /**
     * pen calorie (N1)
     *
     * pen calorie
     */
    case REC20_PEN_CALO = 'N1';

    /**
     * pen gram (protein) (D23)
     *
     * pen gram (protein)
     */
    case REC20_PEN_GRAM_PROT = 'D23';

    /**
     * pennyweight (DWT)
     *
     * pennyweight
     */
    case REC20_PENNYWEIGHT = 'DWT';

    /**
     * per mille per psi (J12)
     *
     * per mille per psi
     */
    case REC20_PER_MILL_PER_PSI = 'J12';

    /**
     * percent (P1)
     *
     * percent
     */
    case REC20_PERCENT = 'P1';

    /**
     * percent per bar (H96)
     *
     * percent per bar
     */
    case REC20_PERC_PER_BAR = 'H96';

    /**
     * percent per decakelvin (H73)
     *
     * percent per decakelvin
     */
    case REC20_PERC_PER_DECA = 'H73';

    /**
     * percent per degree (H90)
     *
     * percent per degree
     */
    case REC20_PERC_PER_DEGR = 'H90';

    /**
     * percent per degree Celsius (M25)
     *
     * percent per degree Celsius
     */
    case REC20_PERC_PER_DEGR_CELS = 'M25';

    /**
     * percent per hectobar (H72)
     *
     * percent per hectobar
     */
    case REC20_PERC_PER_HECT = 'H72';

    /**
     * percent per hundred (H93)
     *
     * percent per hundred
     */
    case REC20_PERC_PER_HUND = 'H93';

    /**
     * percent per inch (H98)
     *
     * percent per inch
     */
    case REC20_PERC_PER_INCH = 'H98';

    /**
     * percent per kelvin (H25)
     *
     * percent per kelvin
     */
    case REC20_PERC_PER_KELV = 'H25';

    /**
     * percent per metre (H99)
     *
     * percent per metre
     */
    case REC20_PERC_PER_METR = 'H99';

    /**
     * percent per millimetre (J10)
     *
     * percent per millimetre
     */
    case REC20_PERC_PER_MILL = 'J10';

    /**
     * percent per month (H71)
     *
     * percent per month
     */
    case REC20_PERC_PER_MONT = 'H71';

    /**
     * percent per ohm (H89)
     *
     * percent per ohm
     */
    case REC20_PERC_PER_OHM = 'H89';

    /**
     * percent per one hundred thousand (H92)
     *
     * percent per one hundred thousand
     */
    case REC20_PERC_PER_ONE_HUND_THOU = 'H92';

    /**
     * percent per ten thousand (H91)
     *
     * percent per ten thousand
     */
    case REC20_PERC_PER_TEN_THOU = 'H91';

    /**
     * percent per thousand (H94)
     *
     * percent per thousand
     */
    case REC20_PERC_PER_THOU = 'H94';

    /**
     * percent per volt (H95)
     *
     * percent per volt
     */
    case REC20_PERC_PER_VOLT = 'H95';

    /**
     * percent volume (VP)
     *
     * percent volume
     */
    case REC20_PERC_VOLU = 'VP';

    /**
     * percent weight (60)
     *
     * percent weight
     */
    case REC20_PERC_WEIG = '60';

    /**
     * perm (0 ºC) (P91)
     *
     * perm (0 ºC)
     */
    case REC20_PERM__C = 'P91';

    /**
     * person (IE)
     *
     * person
     */
    case REC20_PERSON = 'IE';

    /**
     * petabit (E78)
     *
     * petabit
     */
    case REC20_PETABIT = 'E78';

    /**
     * petabit per second (E79)
     *
     * petabit per second
     */
    case REC20_PETA_PER_SECO = 'E79';

    /**
     * petabyte (E36)
     *
     * petabyte
     */
    case REC20_PETABYTE = 'E36';

    /**
     * petajoule (C68)
     *
     * petajoule
     */
    case REC20_PETAJOULE = 'C68';

    /**
     * Pferdestaerke (N12)
     *
     * Pferdestaerke
     */
    case REC20_PFERDESTAERKE = 'N12';

    /**
     * pfund (M86)
     *
     * pfund
     */
    case REC20_PFUND = 'M86';

    /**
     * pH (potential of Hydrogen) (Q30)
     *
     * pH (potential of Hydrogen)
     */
    case REC20_PH_POTE_OF_HYDR = 'Q30';

    /**
     * phon (C69)
     *
     * phon
     */
    case REC20_PHON = 'C69';

    /**
     * phot (P26)
     *
     * phot
     */
    case REC20_PHOT = 'P26';

    /**
     * pica (R1)
     *
     * pica
     */
    case REC20_PICA = 'R1';

    /**
     * picoampere (C70)
     *
     * picoampere
     */
    case REC20_PICOAMPERE = 'C70';

    /**
     * picocoulomb (C71)
     *
     * picocoulomb
     */
    case REC20_PICOCOULOMB = 'C71';

    /**
     * picofarad (4T)
     *
     * picofarad
     */
    case REC20_PICOFARAD = '4T';

    /**
     * picofarad per metre (C72)
     *
     * picofarad per metre
     */
    case REC20_PICO_PER_METR = 'C72';

    /**
     * picohenry (C73)
     *
     * picohenry
     */
    case REC20_PICOHENRY = 'C73';

    /**
     * picolitre (Q33)
     *
     * picolitre
     */
    case REC20_PICOLITRE = 'Q33';

    /**
     * picometre (C52)
     *
     * picometre
     */
    case REC20_PICOMETRE = 'C52';

    /**
     * picopascal per kilometre (H69)
     *
     * picopascal per kilometre
     */
    case REC20_PICO_PER_KILO = 'H69';

    /**
     * picosecond (H70)
     *
     * picosecond
     */
    case REC20_PICOSECOND = 'H70';

    /**
     * picosiemens (N92)
     *
     * picosiemens
     */
    case REC20_PICOSIEMENS = 'N92';

    /**
     * picovolt (N99)
     *
     * picovolt
     */
    case REC20_PICOVOLT = 'N99';

    /**
     * picowatt (C75)
     *
     * picowatt
     */
    case REC20_PICOWATT = 'C75';

    /**
     * picowatt per square metre (C76)
     *
     * picowatt per square metre
     */
    case REC20_PICO_PER_SQUA_METR = 'C76';

    /**
     * piece (H87)
     *
     * piece
     */
    case REC20_PIECE = 'H87';

    /**
     * Piece Day (HAD)
     *
     * Piece Day
     */
    case REC20_PIEC_DAY = 'HAD';

    /**
     * Piece Month (HMO)
     *
     * Piece Month
     */
    case REC20_PIEC_MONT = 'HMO';

    /**
     * Piece Week (HWE)
     *
     * Piece Week
     */
    case REC20_PIEC_WEEK = 'HWE';

    /**
     * ping (E19)
     *
     * ping
     */
    case REC20_PING = 'E19';

    /**
     * pint (UK) (PTI)
     *
     * pint (UK)
     */
    case REC20_PINT_UK = 'PTI';

    /**
     * pint (UK) per day (L53)
     *
     * pint (UK) per day
     */
    case REC20_PINT_UK_PER_DAY = 'L53';

    /**
     * pint (UK) per hour (L54)
     *
     * pint (UK) per hour
     */
    case REC20_PINT_UK_PER_HOUR = 'L54';

    /**
     * pint (UK) per minute (L55)
     *
     * pint (UK) per minute
     */
    case REC20_PINT_UK_PER_MINU = 'L55';

    /**
     * pint (UK) per second (L56)
     *
     * pint (UK) per second
     */
    case REC20_PINT_UK_PER_SECO = 'L56';

    /**
     * pint (US liquid) per day (L57)
     *
     * pint (US liquid) per day
     */
    case REC20_PINT_US_LIQU_PER_DAY = 'L57';

    /**
     * pint (US liquid) per hour (L58)
     *
     * pint (US liquid) per hour
     */
    case REC20_PINT_US_LIQU_PER_HOUR = 'L58';

    /**
     * pint (US liquid) per minute (L59)
     *
     * pint (US liquid) per minute
     */
    case REC20_PINT_US_LIQU_PER_MINU = 'L59';

    /**
     * pint (US liquid) per second (L60)
     *
     * pint (US liquid) per second
     */
    case REC20_PINT_US_LIQU_PER_SECO = 'L60';

    /**
     * pipeline joint (JNT)
     *
     * pipeline joint
     */
    case REC20_PIPE_JOIN = 'JNT';

    /**
     * pitch (PI)
     *
     * pitch
     */
    case REC20_PITCH = 'PI';

    /**
     * pixel (E37)
     *
     * pixel
     */
    case REC20_PIXEL = 'E37';

    /**
     * poise (89)
     *
     * poise
     */
    case REC20_POISE = '89';

    /**
     * poise per bar (F06)
     *
     * poise per bar
     */
    case REC20_POIS_PER_BAR = 'F06';

    /**
     * poise per kelvin (F86)
     *
     * poise per kelvin
     */
    case REC20_POIS_PER_KELV = 'F86';

    /**
     * poise per pascal (N35)
     *
     * poise per pascal
     */
    case REC20_POIS_PER_PASC = 'N35';

    /**
     * pond (M78)
     *
     * pond
     */
    case REC20_POND = 'M78';

    /**
     * portion (PTN)
     *
     * portion
     */
    case REC20_PORTION = 'PTN';

    /**
     * pound (LBR)
     *
     * pound
     */
    case REC20_POUND = 'LBR';

    /**
     * pound (avoirdupois) per cubic foot degree Fahrenheit (K69)
     *
     * pound (avoirdupois) per cubic foot degree Fahrenheit
     */
    case REC20_POUN_AVOI_PER_CUBI_FOOT_DEGR_FAHR = 'K69';

    /**
     * pound (avoirdupois) per cubic foot psi (K70)
     *
     * pound (avoirdupois) per cubic foot psi
     */
    case REC20_POUN_AVOI_PER_CUBI_FOOT_PSI = 'K70';

    /**
     * pound (avoirdupois) per cubic inch degree Fahrenheit (K75)
     *
     * pound (avoirdupois) per cubic inch degree Fahrenheit
     */
    case REC20_POUN_AVOI_PER_CUBI_INCH_DEGR_FAHR = 'K75';

    /**
     * pound (avoirdupois) per cubic inch psi (K76)
     *
     * pound (avoirdupois) per cubic inch psi
     */
    case REC20_POUN_AVOI_PER_CUBI_INCH_PSI = 'K76';

    /**
     * pound (avoirdupois) per day (K66)
     *
     * pound (avoirdupois) per day
     */
    case REC20_POUN_AVOI_PER_DAY = 'K66';

    /**
     * pound (avoirdupois) per degree Fahrenheit (K64)
     *
     * pound (avoirdupois) per degree Fahrenheit
     */
    case REC20_POUN_AVOI_PER_DEGR_FAHR = 'K64';

    /**
     * pound (avoirdupois) per gallon (UK) (K71)
     *
     * pound (avoirdupois) per gallon (UK)
     */
    case REC20_POUN_AVOI_PER_GALL_UK = 'K71';

    /**
     * pound (avoirdupois) per hour degree Fahrenheit (K73)
     *
     * pound (avoirdupois) per hour degree Fahrenheit
     */
    case REC20_POUN_AVOI_PER_HOUR_DEGR_FAHR = 'K73';

    /**
     * pound (avoirdupois) per hour psi (K74)
     *
     * pound (avoirdupois) per hour psi
     */
    case REC20_POUN_AVOI_PER_HOUR_PSI = 'K74';

    /**
     * pound (avoirdupois) per minute (K78)
     *
     * pound (avoirdupois) per minute
     */
    case REC20_POUN_AVOI_PER_MINU = 'K78';

    /**
     * pound (avoirdupois) per minute degree Fahrenheit (K79)
     *
     * pound (avoirdupois) per minute degree Fahrenheit
     */
    case REC20_POUN_AVOI_PER_MINU_DEGR_FAHR = 'K79';

    /**
     * pound (avoirdupois) per minute psi (K80)
     *
     * pound (avoirdupois) per minute psi
     */
    case REC20_POUN_AVOI_PER_MINU_PSI = 'K80';

    /**
     * pound (avoirdupois) per psi (K77)
     *
     * pound (avoirdupois) per psi
     */
    case REC20_POUN_AVOI_PER_PSI = 'K77';

    /**
     * pound (avoirdupois) per second (K81)
     *
     * pound (avoirdupois) per second
     */
    case REC20_POUN_AVOI_PER_SECO = 'K81';

    /**
     * pound (avoirdupois) per second degree Fahrenheit (K82)
     *
     * pound (avoirdupois) per second degree Fahrenheit
     */
    case REC20_POUN_AVOI_PER_SECO_DEGR_FAHR = 'K82';

    /**
     * pound (avoirdupois) per second psi (K83)
     *
     * pound (avoirdupois) per second psi
     */
    case REC20_POUN_AVOI_PER_SECO_PSI = 'K83';

    /**
     * pound (avoirdupois) square foot (K65)
     *
     * pound (avoirdupois) square foot
     */
    case REC20_POUN_AVOI_SQUA_FOOT = 'K65';

    /**
     * pound foot per second (N10)
     *
     * pound foot per second
     */
    case REC20_POUN_FOOT_PER_SECO = 'N10';

    /**
     * pound inch per second (N11)
     *
     * pound inch per second
     */
    case REC20_POUN_INCH_PER_SECO = 'N11';

    /**
     * pound inch squared (F20)
     *
     * pound inch squared
     */
    case REC20_POUN_INCH_SQUA = 'F20';

    /**
     * pound mole (P44)
     *
     * pound mole
     */
    case REC20_POUN_MOLE = 'P44';

    /**
     * pound mole per minute (P46)
     *
     * pound mole per minute
     */
    case REC20_POUN_MOLE_PER_MINU = 'P46';

    /**
     * pound mole per pound (P48)
     *
     * pound mole per pound
     */
    case REC20_POUN_MOLE_PER_POUN = 'P48';

    /**
     * pound mole per second (P45)
     *
     * pound mole per second
     */
    case REC20_POUN_MOLE_PER_SECO = 'P45';

    /**
     * pound per cubic foot (87)
     *
     * pound per cubic foot
     */
    case REC20_POUN_PER_CUBI_FOOT = '87';

    /**
     * pound per cubic inch (LA)
     *
     * pound per cubic inch
     */
    case REC20_POUN_PER_CUBI_INCH = 'LA';

    /**
     * pound per cubic yard (K84)
     *
     * pound per cubic yard
     */
    case REC20_POUN_PER_CUBI_YARD = 'K84';

    /**
     * pound per foot (P2)
     *
     * pound per foot
     */
    case REC20_POUN_PER_FOOT = 'P2';

    /**
     * pound per foot day (N44)
     *
     * pound per foot day
     */
    case REC20_POUN_PER_FOOT_DAY = 'N44';

    /**
     * pound per foot hour (K67)
     *
     * pound per foot hour
     */
    case REC20_POUN_PER_FOOT_HOUR = 'K67';

    /**
     * pound per foot minute (N43)
     *
     * pound per foot minute
     */
    case REC20_POUN_PER_FOOT_MINU = 'N43';

    /**
     * pound per foot second (K68)
     *
     * pound per foot second
     */
    case REC20_POUN_PER_FOOT_SECO = 'K68';

    /**
     * pound per gallon (US) (GE)
     *
     * pound per gallon (US)
     */
    case REC20_POUN_PER_GALL_US = 'GE';

    /**
     * pound per hour (4U)
     *
     * pound per hour
     */
    case REC20_POUN_PER_HOUR = '4U';

    /**
     * pound per inch of length (PO)
     *
     * pound per inch of length
     */
    case REC20_POUN_PER_INCH_OF_LENG = 'PO';

    /**
     * pound per pound (M91)
     *
     * pound per pound
     */
    case REC20_POUN_PER_POUN = 'M91';

    /**
     * pound per ream (RP)
     *
     * pound per ream
     */
    case REC20_POUN_PER_REAM = 'RP';

    /**
     * pound per square foot (FP)
     *
     * pound per square foot
     */
    case REC20_POUN_PER_SQUA_FOOT = 'FP';

    /**
     * pound per square inch absolute (80)
     *
     * pound per square inch absolute
     */
    case REC20_POUN_PER_SQUA_INCH_ABSO = '80';

    /**
     * pound per square yard (N25)
     *
     * pound per square yard
     */
    case REC20_POUN_PER_SQUA_YARD = 'N25';

    /**
     * pound per yard (M84)
     *
     * pound per yard
     */
    case REC20_POUN_PER_YARD = 'M84';

    /**
     * pound-force (C78)
     *
     * pound-force
     */
    case REC20_POUNDFORCE = 'C78';

    /**
     * pound-force foot (M92)
     *
     * pound-force foot
     */
    case REC20_POUN_FOOT = 'M92';

    /**
     * pound-force foot per ampere (F22)
     *
     * pound-force foot per ampere
     */
    case REC20_POUN_FOOT_PER_AMPE = 'F22';

    /**
     * pound-force foot per inch (P89)
     *
     * pound-force foot per inch
     */
    case REC20_POUN_FOOT_PER_INCH = 'P89';

    /**
     * pound-force foot per pound (G20)
     *
     * pound-force foot per pound
     */
    case REC20_POUN_FOOT_PER_POUN = 'G20';

    /**
     * pound-force inch (F21)
     *
     * pound-force inch
     */
    case REC20_POUN_INCH = 'F21';

    /**
     * pound-force inch per inch (P90)
     *
     * pound-force inch per inch
     */
    case REC20_POUN_INCH_PER_INCH = 'P90';

    /**
     * pound-force per inch (F48)
     *
     * pound-force per inch
     */
    case REC20_POUN_PER_INCH = 'F48';

    /**
     * pound-force per square inch (PS)
     *
     * pound-force per square inch
     */
    case REC20_POUN_PER_SQUA_INCH = 'PS';

    /**
     * pound-force per square inch degree Fahrenheit (K86)
     *
     * pound-force per square inch degree Fahrenheit
     */
    case REC20_POUN_PER_SQUA_INCH_DEGR_FAHR = 'K86';

    /**
     * pound-force second per square foot (K91)
     *
     * pound-force second per square foot
     */
    case REC20_POUN_SECO_PER_SQUA_FOOT = 'K91';

    /**
     * pound-force second per square inch (K92)
     *
     * pound-force second per square inch
     */
    case REC20_POUN_SECO_PER_SQUA_INCH = 'K92';

    /**
     * poundal (M76)
     *
     * poundal
     */
    case REC20_POUNDAL = 'M76';

    /**
     * print point (N3)
     *
     * print point
     */
    case REC20_PRIN_POIN = 'N3';

    /**
     * proof gallon (PGL)
     *
     * proof gallon
     */
    case REC20_PROO_GALL = 'PGL';

    /**
     * proof litre (PFL)
     *
     * proof litre
     */
    case REC20_PROO_LITR = 'PFL';

    /**
     * psi cubic inch per second (K87)
     *
     * psi cubic inch per second
     */
    case REC20_PSI_CUBI_INCH_PER_SECO = 'K87';

    /**
     * psi cubic metre per second (K89)
     *
     * psi cubic metre per second
     */
    case REC20_PSI_CUBI_METR_PER_SECO = 'K89';

    /**
     * psi cubic yard per second (K90)
     *
     * psi cubic yard per second
     */
    case REC20_PSI_CUBI_YARD_PER_SECO = 'K90';

    /**
     * psi litre per second (K88)
     *
     * psi litre per second
     */
    case REC20_PSI_LITR_PER_SECO = 'K88';

    /**
     * psi per inch (P86)
     *
     * psi per inch
     */
    case REC20_PSI_PER_INCH = 'P86';

    /**
     * psi per psi (L52)
     *
     * psi per psi
     */
    case REC20_PSI_PER_PSI = 'L52';

    /**
     * quad (1015 BtuIT) (N70)
     *
     * quad (1015 BtuIT)
     */
    case REC20_QUAD__BTUI = 'N70';

    /**
     * quart (UK liquid) per day (K94)
     *
     * quart (UK liquid) per day
     */
    case REC20_QUAR_UK_LIQU_PER_DAY = 'K94';

    /**
     * quart (UK liquid) per hour (K95)
     *
     * quart (UK liquid) per hour
     */
    case REC20_QUAR_UK_LIQU_PER_HOUR = 'K95';

    /**
     * quart (UK liquid) per minute (K96)
     *
     * quart (UK liquid) per minute
     */
    case REC20_QUAR_UK_LIQU_PER_MINU = 'K96';

    /**
     * quart (UK liquid) per second (K97)
     *
     * quart (UK liquid) per second
     */
    case REC20_QUAR_UK_LIQU_PER_SECO = 'K97';

    /**
     * quart (UK) (QTI)
     *
     * quart (UK)
     */
    case REC20_QUAR_UK = 'QTI';

    /**
     * quart (US liquid) per day (K98)
     *
     * quart (US liquid) per day
     */
    case REC20_QUAR_US_LIQU_PER_DAY = 'K98';

    /**
     * quart (US liquid) per hour (K99)
     *
     * quart (US liquid) per hour
     */
    case REC20_QUAR_US_LIQU_PER_HOUR = 'K99';

    /**
     * quart (US liquid) per minute (L10)
     *
     * quart (US liquid) per minute
     */
    case REC20_QUAR_US_LIQU_PER_MINU = 'L10';

    /**
     * quart (US liquid) per second (L11)
     *
     * quart (US liquid) per second
     */
    case REC20_QUAR_US_LIQU_PER_SECO = 'L11';

    /**
     * quarter (of a year) (QAN)
     *
     * quarter (of a year)
     */
    case REC20_QUAR_OF_A_YEAR = 'QAN';

    /**
     * quire (QR)
     *
     * quire
     */
    case REC20_QUIRE = 'QR';

    /**
     * rack unit (H80)
     *
     * rack unit
     */
    case REC20_RACK_UNIT = 'H80';

    /**
     * rad (C80)
     *
     * rad
     */
    case REC20_RAD = 'C80';

    /**
     * radian (C81)
     *
     * radian
     */
    case REC20_RADIAN = 'C81';

    /**
     * radian per metre (C84)
     *
     * radian per metre
     */
    case REC20_RADI_PER_METR = 'C84';

    /**
     * radian per second (2A)
     *
     * radian per second
     */
    case REC20_RADI_PER_SECO = '2A';

    /**
     * radian per second squared (2B)
     *
     * radian per second squared
     */
    case REC20_RADI_PER_SECO_SQUA = '2B';

    /**
     * radian square metre per kilogram (C83)
     *
     * radian square metre per kilogram
     */
    case REC20_RADI_SQUA_METR_PER_KILO = 'C83';

    /**
     * radian square metre per mole (C82)
     *
     * radian square metre per mole
     */
    case REC20_RADI_SQUA_METR_PER_MOLE = 'C82';

    /**
     * rate (A9)
     *
     * rate
     */
    case REC20_RATE = 'A9';

    /**
     * ration (13)
     *
     * ration
     */
    case REC20_RATION = '13';

    /**
     * ream (RM)
     *
     * ream
     */
    case REC20_REAM = 'RM';

    /**
     * reciprocal angstrom (C85)
     *
     * reciprocal angstrom
     */
    case REC20_RECI_ANGS = 'C85';

    /**
     * reciprocal bar (F58)
     *
     * reciprocal bar
     */
    case REC20_RECI_BAR = 'F58';

    /**
     * reciprocal centimetre (E90)
     *
     * reciprocal centimetre
     */
    case REC20_RECI_CENT = 'E90';

    /**
     * reciprocal cubic centimetre (H50)
     *
     * reciprocal cubic centimetre
     */
    case REC20_RECI_CUBI_CENT = 'H50';

    /**
     * reciprocal cubic foot (K20)
     *
     * reciprocal cubic foot
     */
    case REC20_RECI_CUBI_FOOT = 'K20';

    /**
     * reciprocal cubic inch (K49)
     *
     * reciprocal cubic inch
     */
    case REC20_RECI_CUBI_INCH = 'K49';

    /**
     * reciprocal cubic metre (C86)
     *
     * reciprocal cubic metre
     */
    case REC20_RECI_CUBI_METR = 'C86';

    /**
     * reciprocal cubic metre per second (C87)
     *
     * reciprocal cubic metre per second
     */
    case REC20_RECI_CUBI_METR_PER_SECO = 'C87';

    /**
     * reciprocal cubic millimetre (L20)
     *
     * reciprocal cubic millimetre
     */
    case REC20_RECI_CUBI_MILL = 'L20';

    /**
     * reciprocal cubic yard (M10)
     *
     * reciprocal cubic yard
     */
    case REC20_RECI_CUBI_YARD = 'M10';

    /**
     * reciprocal day (E91)
     *
     * reciprocal day
     */
    case REC20_RECI_DAY = 'E91';

    /**
     * reciprocal degree Fahrenheit (J26)
     *
     * reciprocal degree Fahrenheit
     */
    case REC20_RECI_DEGR_FAHR = 'J26';

    /**
     * reciprocal electron volt per cubic metre (C88)
     *
     * reciprocal electron volt per cubic metre
     */
    case REC20_RECI_ELEC_VOLT_PER_CUBI_METR = 'C88';

    /**
     * reciprocal henry (C89)
     *
     * reciprocal henry
     */
    case REC20_RECI_HENR = 'C89';

    /**
     * reciprocal hour (H10)
     *
     * reciprocal hour
     */
    case REC20_RECI_HOUR = 'H10';

    /**
     * reciprocal inch (Q24)
     *
     * reciprocal inch
     */
    case REC20_RECI_INCH = 'Q24';

    /**
     * reciprocal joule (N91)
     *
     * reciprocal joule
     */
    case REC20_RECI_JOUL = 'N91';

    /**
     * reciprocal joule per cubic metre (C90)
     *
     * reciprocal joule per cubic metre
     */
    case REC20_RECI_JOUL_PER_CUBI_METR = 'C90';

    /**
     * reciprocal kelvin or kelvin to the power minus one (C91)
     *
     * reciprocal kelvin or kelvin to the power minus one
     */
    case REC20_RECI_KELV_OR_KELV_TO_THE_POWE_MINU_ONE = 'C91';

    /**
     * reciprocal kilovolt - ampere reciprocal hour (M21)
     *
     * reciprocal kilovolt - ampere reciprocal hour
     */
    case REC20_RECI_KILO_AMPE_RECI_HOUR = 'M21';

    /**
     * reciprocal litre (K63)
     *
     * reciprocal litre
     */
    case REC20_RECI_LITR = 'K63';

    /**
     * reciprocal megakelvin or megakelvin to the power minus one (M20)
     *
     * reciprocal megakelvin or megakelvin to the power minus one
     */
    case REC20_RECI_MEGA_OR_MEGA_TO_THE_POWE_MINU_ONE = 'M20';

    /**
     * reciprocal metre (C92)
     *
     * reciprocal metre
     */
    case REC20_RECI_METR = 'C92';

    /**
     * reciprocal metre squared reciprocal second (B81)
     *
     * reciprocal metre squared reciprocal second
     */
    case REC20_RECI_METR_SQUA_RECI_SECO = 'B81';

    /**
     * reciprocal minute (C94)
     *
     * reciprocal minute
     */
    case REC20_RECI_MINU = 'C94';

    /**
     * reciprocal mole (C95)
     *
     * reciprocal mole
     */
    case REC20_RECI_MOLE = 'C95';

    /**
     * reciprocal month (H11)
     *
     * reciprocal month
     */
    case REC20_RECI_MONT = 'H11';

    /**
     * reciprocal pascal or pascal to the power minus one (C96)
     *
     * reciprocal pascal or pascal to the power minus one
     */
    case REC20_RECI_PASC_OR_PASC_TO_THE_POWE_MINU_ONE = 'C96';

    /**
     * reciprocal psi (K93)
     *
     * reciprocal psi
     */
    case REC20_RECI_PSI = 'K93';

    /**
     * reciprocal radian (P97)
     *
     * reciprocal radian
     */
    case REC20_RECI_RADI = 'P97';

    /**
     * reciprocal second (C97)
     *
     * reciprocal second
     */
    case REC20_RECI_SECO = 'C97';

    /**
     * reciprocal second per metre squared (C99)
     *
     * reciprocal second per metre squared
     */
    case REC20_RECI_SECO_PER_METR_SQUA = 'C99';

    /**
     * reciprocal second per steradian (D1)
     *
     * reciprocal second per steradian
     */
    case REC20_RECI_SECO_PER_STER = 'D1';

    /**
     * reciprocal second per steradian metre squared (D2)
     *
     * reciprocal second per steradian metre squared
     */
    case REC20_RECI_SECO_PER_STER_METR_SQUA = 'D2';

    /**
     * reciprocal square inch (P78)
     *
     * reciprocal square inch
     */
    case REC20_RECI_SQUA_INCH = 'P78';

    /**
     * reciprocal square metre (C93)
     *
     * reciprocal square metre
     */
    case REC20_RECI_SQUA_METR = 'C93';

    /**
     * reciprocal volt (P96)
     *
     * reciprocal volt
     */
    case REC20_RECI_VOLT = 'P96';

    /**
     * reciprocal volt - ampere reciprocal second (M30)
     *
     * reciprocal volt - ampere reciprocal second
     */
    case REC20_RECI_VOLT_AMPE_RECI_SECO = 'M30';

    /**
     * reciprocal week (H85)
     *
     * reciprocal week
     */
    case REC20_RECI_WEEK = 'H85';

    /**
     * reciprocal year (H09)
     *
     * reciprocal year
     */
    case REC20_RECI_YEAR = 'H09';

    /**
     * rem (D91)
     *
     * rem
     */
    case REC20_REM = 'D91';

    /**
     * rem per second (P69)
     *
     * rem per second
     */
    case REC20_REM_PER_SECO = 'P69';

    /**
     * revenue ton mile (RT)
     *
     * revenue ton mile
     */
    case REC20_REVE_TON_MILE = 'RT';

    /**
     * revolution (M44)
     *
     * revolution
     */
    case REC20_REVOLUTION = 'M44';

    /**
     * revolution per minute (M46)
     *
     * revolution per minute
     */
    case REC20_REVO_PER_MINU = 'M46';

    /**
     * revolutions per second (RPS)
     *
     * revolutions per second
     */
    case REC20_REVO_PER_SECO = 'RPS';

    /**
     * rhe (P88)
     *
     * rhe
     */
    case REC20_RHE = 'P88';

    /**
     * rod [unit of distance] (F49)
     *
     * rod [unit of distance]
     */
    case REC20_ROD_UNIT_OF_DIST = 'F49';

    /**
     * roentgen (2C)
     *
     * roentgen
     */
    case REC20_ROENTGEN = '2C';

    /**
     * roentgen per second (D6)
     *
     * roentgen per second
     */
    case REC20_ROEN_PER_SECO = 'D6';

    /**
     * room (ROM)
     *
     * room
     */
    case REC20_ROOM = 'ROM';

    /**
     * round (D65)
     *
     * round
     */
    case REC20_ROUND = 'D65';

    /**
     * run foot (E52)
     *
     * run foot
     */
    case REC20_RUN_FOOT = 'E52';

    /**
     * running or operating hour (RH)
     *
     * running or operating hour
     */
    case REC20_RUNN_OR_OPER_HOUR = 'RH';

    /**
     * score (SCO)
     *
     * score
     */
    case REC20_SCORE = 'SCO';

    /**
     * scruple (SCR)
     *
     * scruple
     */
    case REC20_SCRUPLE = 'SCR';

    /**
     * second [unit of angle] (D62)
     *
     * second [unit of angle]
     */
    case REC20_SECO_UNIT_OF_ANGL = 'D62';

    /**
     * second [unit of time] (SEC)
     *
     * second [unit of time]
     */
    case REC20_SECO_UNIT_OF_TIME = 'SEC';

    /**
     * second per cubic metre (D93)
     *
     * second per cubic metre
     */
    case REC20_SECO_PER_CUBI_METR = 'D93';

    /**
     * second per cubic metre radian (D94)
     *
     * second per cubic metre radian
     */
    case REC20_SECO_PER_CUBI_METR_RADI = 'D94';

    /**
     * second per kilogramm (Q20)
     *
     * second per kilogramm
     */
    case REC20_SECO_PER_KILO = 'Q20';

    /**
     * second per radian cubic metre (Q22)
     *
     * second per radian cubic metre
     */
    case REC20_SECO_PER_RADI_CUBI_METR = 'Q22';

    /**
     * segment (SG)
     *
     * segment
     */
    case REC20_SEGMENT = 'SG';

    /**
     * service unit (E48)
     *
     * service unit
     */
    case REC20_SERV_UNIT = 'E48';

    /**
     * set (SET)
     *
     * set
     */
    case REC20_SET = 'SET';

    /**
     * shake (M56)
     *
     * shake
     */
    case REC20_SHAKE = 'M56';

    /**
     * shannon (Q14)
     *
     * shannon
     */
    case REC20_SHANNON = 'Q14';

    /**
     * shannon per second (Q17)
     *
     * shannon per second
     */
    case REC20_SHAN_PER_SECO = 'Q17';

    /**
     * shares (E21)
     *
     * shares
     */
    case REC20_SHARES = 'E21';

    /**
     * shipment (SX)
     *
     * shipment
     */
    case REC20_SHIPMENT = 'SX';

    /**
     * shot (14)
     *
     * shot
     */
    case REC20_SHOT = '14';

    /**
     * sidereal year (L96)
     *
     * sidereal year
     */
    case REC20_SIDE_YEAR = 'L96';

    /**
     * siemens (SIE)
     *
     * siemens
     */
    case REC20_SIEMENS = 'SIE';

    /**
     * siemens per centimetre (H43)
     *
     * siemens per centimetre
     */
    case REC20_SIEM_PER_CENT = 'H43';

    /**
     * siemens per metre (D10)
     *
     * siemens per metre
     */
    case REC20_SIEM_PER_METR = 'D10';

    /**
     * siemens square metre per mole (D12)
     *
     * siemens square metre per mole
     */
    case REC20_SIEM_SQUA_METR_PER_MOLE = 'D12';

    /**
     * sievert (D13)
     *
     * sievert
     */
    case REC20_SIEVERT = 'D13';

    /**
     * sievert per hour (P70)
     *
     * sievert per hour
     */
    case REC20_SIEV_PER_HOUR = 'P70';

    /**
     * sievert per minute (P74)
     *
     * sievert per minute
     */
    case REC20_SIEV_PER_MINU = 'P74';

    /**
     * sievert per second (P65)
     *
     * sievert per second
     */
    case REC20_SIEV_PER_SECO = 'P65';

    /**
     * sitas (56)
     *
     * sitas
     */
    case REC20_SITAS = '56';

    /**
     * skein (SW)
     *
     * skein
     */
    case REC20_SKEIN = 'SW';

    /**
     * slug (F13)
     *
     * slug
     */
    case REC20_SLUG = 'F13';

    /**
     * slug per cubic foot (L65)
     *
     * slug per cubic foot
     */
    case REC20_SLUG_PER_CUBI_FOOT = 'L65';

    /**
     * slug per day (L63)
     *
     * slug per day
     */
    case REC20_SLUG_PER_DAY = 'L63';

    /**
     * slug per foot second (L64)
     *
     * slug per foot second
     */
    case REC20_SLUG_PER_FOOT_SECO = 'L64';

    /**
     * slug per hour (L66)
     *
     * slug per hour
     */
    case REC20_SLUG_PER_HOUR = 'L66';

    /**
     * slug per minute (L67)
     *
     * slug per minute
     */
    case REC20_SLUG_PER_MINU = 'L67';

    /**
     * slug per second (L68)
     *
     * slug per second
     */
    case REC20_SLUG_PER_SECO = 'L68';

    /**
     * sone (D15)
     *
     * sone
     */
    case REC20_SONE = 'D15';

    /**
     * square (SQ)
     *
     * square
     */
    case REC20_SQUARE = 'SQ';

    /**
     * square centimetre (CMK)
     *
     * square centimetre
     */
    case REC20_SQUA_CENT = 'CMK';

    /**
     * square centimetre per erg (D16)
     *
     * square centimetre per erg
     */
    case REC20_SQUA_CENT_PER_ERG = 'D16';

    /**
     * square centimetre per gram (H15)
     *
     * square centimetre per gram
     */
    case REC20_SQUA_CENT_PER_GRAM = 'H15';

    /**
     * square centimetre per second (M81)
     *
     * square centimetre per second
     */
    case REC20_SQUA_CENT_PER_SECO = 'M81';

    /**
     * square centimetre per steradian erg (D17)
     *
     * square centimetre per steradian erg
     */
    case REC20_SQUA_CENT_PER_STER_ERG = 'D17';

    /**
     * square decametre (H16)
     *
     * square decametre
     */
    case REC20_SQUA_DECA = 'H16';

    /**
     * square decimetre (DMK)
     *
     * square decimetre
     */
    case REC20_SQUA_DECI = 'DMK';

    /**
     * square foot (FTK)
     *
     * square foot
     */
    case REC20_SQUA_FOOT = 'FTK';

    /**
     * square foot per hour (M79)
     *
     * square foot per hour
     */
    case REC20_SQUA_FOOT_PER_HOUR = 'M79';

    /**
     * square foot per second (S3)
     *
     * square foot per second
     */
    case REC20_SQUA_FOOT_PER_SECO = 'S3';

    /**
     * square hectometre (H18)
     *
     * square hectometre
     */
    case REC20_SQUA_HECT = 'H18';

    /**
     * square inch (INK)
     *
     * square inch
     */
    case REC20_SQUA_INCH = 'INK';

    /**
     * square inch per second (G08)
     *
     * square inch per second
     */
    case REC20_SQUA_INCH_PER_SECO = 'G08';

    /**
     * square kilometre (KMK)
     *
     * square kilometre
     */
    case REC20_SQUA_KILO = 'KMK';

    /**
     * square metre (MTK)
     *
     * square metre
     */
    case REC20_SQUA_METR = 'MTK';

    /**
     * Square Metre Day (MKD)
     *
     * Square Metre Day
     */
    case REC20_SQUA_METR_DAY = 'MKD';

    /**
     * square metre hour degree Celsius per kilocalorie (international table) (L14)
     *
     * square metre hour degree Celsius per kilocalorie (international table)
     */
    case REC20_SQUA_METR_HOUR_DEGR_CELS_PER_KILO_INTE_TABL = 'L14';

    /**
     * square metre kelvin per watt (D19)
     *
     * square metre kelvin per watt
     */
    case REC20_SQUA_METR_KELV_PER_WATT = 'D19';

    /**
     * Square Metre Month (MKM)
     *
     * Square Metre Month
     */
    case REC20_SQUA_METR_MONT = 'MKM';

    /**
     * square metre per cubic metre (Q36)
     *
     * square metre per cubic metre
     */
    case REC20_SQUA_METR_PER_CUBI_METR = 'Q36';

    /**
     * square metre per joule (D20)
     *
     * square metre per joule
     */
    case REC20_SQUA_METR_PER_JOUL = 'D20';

    /**
     * square metre per kilogram (D21)
     *
     * square metre per kilogram
     */
    case REC20_SQUA_METR_PER_KILO = 'D21';

    /**
     * square metre per litre (E31)
     *
     * square metre per litre
     */
    case REC20_SQUA_METR_PER_LITR = 'E31';

    /**
     * square metre per mole (D22)
     *
     * square metre per mole
     */
    case REC20_SQUA_METR_PER_MOLE = 'D22';

    /**
     * square metre per newton (H59)
     *
     * square metre per newton
     */
    case REC20_SQUA_METR_PER_NEWT = 'H59';

    /**
     * square metre per second (S4)
     *
     * square metre per second
     */
    case REC20_SQUA_METR_PER_SECO = 'S4';

    /**
     * square metre per second bar (G41)
     *
     * square metre per second bar
     */
    case REC20_SQUA_METR_PER_SECO_BAR = 'G41';

    /**
     * square metre per second kelvin (G09)
     *
     * square metre per second kelvin
     */
    case REC20_SQUA_METR_PER_SECO_KELV = 'G09';

    /**
     * square metre per second pascal (M82)
     *
     * square metre per second pascal
     */
    case REC20_SQUA_METR_PER_SECO_PASC = 'M82';

    /**
     * square metre per steradian (D24)
     *
     * square metre per steradian
     */
    case REC20_SQUA_METR_PER_STER = 'D24';

    /**
     * square metre per steradian joule (D25)
     *
     * square metre per steradian joule
     */
    case REC20_SQUA_METR_PER_STER_JOUL = 'D25';

    /**
     * square metre per volt second (D26)
     *
     * square metre per volt second
     */
    case REC20_SQUA_METR_PER_VOLT_SECO = 'D26';

    /**
     * Square Metre Week (MKW)
     *
     * Square Metre Week
     */
    case REC20_SQUA_METR_WEEK = 'MKW';

    /**
     * square micrometre (square micron) (H30)
     *
     * square micrometre (square micron)
     */
    case REC20_SQUA_MICR_SQUA_MICR = 'H30';

    /**
     * square mile (based on U.S. survey foot) (M48)
     *
     * square mile (based on U.S. survey foot)
     */
    case REC20_SQUA_MILE_BASE_ON_US_SURV_FOOT = 'M48';

    /**
     * square mile (statute mile) (MIK)
     *
     * square mile (statute mile)
     */
    case REC20_SQUA_MILE_STAT_MILE = 'MIK';

    /**
     * square millimetre (MMK)
     *
     * square millimetre
     */
    case REC20_SQUA_MILL = 'MMK';

    /**
     * square yard (YDK)
     *
     * square yard
     */
    case REC20_SQUA_YARD = 'YDK';

    /**
     * square, roofing (SQR)
     *
     * square, roofing
     */
    case REC20_SQUA_ROOF = 'SQR';

    /**
     * standard (WSD)
     *
     * standard
     */
    case REC20_STANDARD = 'WSD';

    /**
     * standard acceleration of free fall (K40)
     *
     * standard acceleration of free fall
     */
    case REC20_STAN_ACCE_OF_FREE_FALL = 'K40';

    /**
     * standard atmosphere (ATM)
     *
     * standard atmosphere
     */
    case REC20_STAN_ATMO = 'ATM';

    /**
     * standard atmosphere per metre (P83)
     *
     * standard atmosphere per metre
     */
    case REC20_STAN_ATMO_PER_METR = 'P83';

    /**
     * Standard cubic metre (SM3)
     *
     * Standard cubic metre
     */
    case REC20_STAN_CUBI_METR = 'SM3';

    /**
     * Standard cubic metre per day (Q37)
     *
     * Standard cubic metre per day
     */
    case REC20_STAN_CUBI_METR_PER_DAY = 'Q37';

    /**
     * Standard cubic metre per hour (Q38)
     *
     * Standard cubic metre per hour
     */
    case REC20_STAN_CUBI_METR_PER_HOUR = 'Q38';

    /**
     * standard kilolitre (DMO)
     *
     * standard kilolitre
     */
    case REC20_STAN_KILO = 'DMO';

    /**
     * standard litre (STL)
     *
     * standard litre
     */
    case REC20_STAN_LITR = 'STL';

    /**
     * steradian (D27)
     *
     * steradian
     */
    case REC20_STERADIAN = 'D27';

    /**
     * stere (G26)
     *
     * stere
     */
    case REC20_STERE = 'G26';

    /**
     * stick (STC)
     *
     * stick
     */
    case REC20_STICK = 'STC';

    /**
     * stick, cigarette (STK)
     *
     * stick, cigarette
     */
    case REC20_STIC_CIGA = 'STK';

    /**
     * stick, military (15)
     *
     * stick, military
     */
    case REC20_STIC_MILI = '15';

    /**
     * stilb (P31)
     *
     * stilb
     */
    case REC20_STILB = 'P31';

    /**
     * stokes (91)
     *
     * stokes
     */
    case REC20_STOKES = '91';

    /**
     * stokes per bar (G46)
     *
     * stokes per bar
     */
    case REC20_STOK_PER_BAR = 'G46';

    /**
     * stokes per kelvin (G10)
     *
     * stokes per kelvin
     */
    case REC20_STOK_PER_KELV = 'G10';

    /**
     * stokes per pascal (M80)
     *
     * stokes per pascal
     */
    case REC20_STOK_PER_PASC = 'M80';

    /**
     * stone (UK) (STI)
     *
     * stone (UK)
     */
    case REC20_STON_UK = 'STI';

    /**
     * strand (E30)
     *
     * strand
     */
    case REC20_STRAND = 'E30';

    /**
     * straw (STW)
     *
     * straw
     */
    case REC20_STRAW = 'STW';

    /**
     * strip (SR)
     *
     * strip
     */
    case REC20_STRIP = 'SR';

    /**
     * syringe (SYR)
     *
     * syringe
     */
    case REC20_SYRINGE = 'SYR';

    /**
     * tablespoon (US) (G24)
     *
     * tablespoon (US)
     */
    case REC20_TABL_US = 'G24';

    /**
     * tablet (U2)
     *
     * tablet
     */
    case REC20_TABLET = 'U2';

    /**
     * teaspoon (US) (G25)
     *
     * teaspoon (US)
     */
    case REC20_TEAS_US = 'G25';

    /**
     * tebibit per cubic metre (E86)
     *
     * tebibit per cubic metre
     */
    case REC20_TEBI_PER_CUBI_METR = 'E86';

    /**
     * tebibit per metre (E85)
     *
     * tebibit per metre
     */
    case REC20_TEBI_PER_METR = 'E85';

    /**
     * tebibit per square metre (E87)
     *
     * tebibit per square metre
     */
    case REC20_TEBI_PER_SQUA_METR = 'E87';

    /**
     * tebibyte (E61)
     *
     * tebibyte
     */
    case REC20_TEBIBYTE = 'E61';

    /**
     * technical atmosphere per metre (P84)
     *
     * technical atmosphere per metre
     */
    case REC20_TECH_ATMO_PER_METR = 'P84';

    /**
     * teeth per inch (TPI)
     *
     * teeth per inch
     */
    case REC20_TEET_PER_INCH = 'TPI';

    /**
     * telecommunication line in service (T0)
     *
     * telecommunication line in service
     */
    case REC20_TELE_LINE_IN_SERV = 'T0';

    /**
     * telecommunication line in service average (UB)
     *
     * telecommunication line in service average
     */
    case REC20_TELE_LINE_IN_SERV_AVER = 'UB';

    /**
     * telecommunication port (UC)
     *
     * telecommunication port
     */
    case REC20_TELE_PORT = 'UC';

    /**
     * ten day (DAD)
     *
     * ten day
     */
    case REC20_TEN_DAY = 'DAD';

    /**
     * ten pack (TP)
     *
     * ten pack
     */
    case REC20_TEN_PACK = 'TP';

    /**
     * ten pair (TPR)
     *
     * ten pair
     */
    case REC20_TEN_PAIR = 'TPR';

    /**
     * ten set (TST)
     *
     * ten set
     */
    case REC20_TEN_SET = 'TST';

    /**
     * ten thousand sticks (TTS)
     *
     * ten thousand sticks
     */
    case REC20_TEN_THOU_STIC = 'TTS';

    /**
     * terabit (E83)
     *
     * terabit
     */
    case REC20_TERABIT = 'E83';

    /**
     * terabit per second (E84)
     *
     * terabit per second
     */
    case REC20_TERA_PER_SECO = 'E84';

    /**
     * terabyte (E35)
     *
     * terabyte
     */
    case REC20_TERABYTE = 'E35';

    /**
     * terahertz (D29)
     *
     * terahertz
     */
    case REC20_TERAHERTZ = 'D29';

    /**
     * terajoule (D30)
     *
     * terajoule
     */
    case REC20_TERAJOULE = 'D30';

    /**
     * teraohm (H44)
     *
     * teraohm
     */
    case REC20_TERAOHM = 'H44';

    /**
     * terawatt (D31)
     *
     * terawatt
     */
    case REC20_TERAWATT = 'D31';

    /**
     * terawatt hour (D32)
     *
     * terawatt hour
     */
    case REC20_TERA_HOUR = 'D32';

    /**
     * tesla (D33)
     *
     * tesla
     */
    case REC20_TESLA = 'D33';

    /**
     * test (E53)
     *
     * test
     */
    case REC20_TEST = 'E53';

    /**
     * TEU (E22)
     *
     * TEU
     */
    case REC20_TEU = 'E22';

    /**
     * tex (D34)
     *
     * tex
     */
    case REC20_TEX = 'D34';

    /**
     * theoretical pound (24)
     *
     * theoretical pound
     */
    case REC20_THEO_POUN = '24';

    /**
     * theoretical ton (27)
     *
     * theoretical ton
     */
    case REC20_THEO_TON = '27';

    /**
     * therm (EC) (N71)
     *
     * therm (EC)
     */
    case REC20_THER_EC = 'N71';

    /**
     * therm (U.S.) (N72)
     *
     * therm (U.S.)
     */
    case REC20_THER_US = 'N72';

    /**
     * thousand (MIL)
     *
     * thousand
     */
    case REC20_THOUSAND = 'MIL';

    /**
     * thousand board foot (MBF)
     *
     * thousand board foot
     */
    case REC20_THOU_BOAR_FOOT = 'MBF';

    /**
     * thousand cubic foot (FC)
     *
     * thousand cubic foot
     */
    case REC20_THOU_CUBI_FOOT = 'FC';

    /**
     * thousand cubic metre (R9)
     *
     * thousand cubic metre
     */
    case REC20_THOU_CUBI_METR = 'R9';

    /**
     * thousand cubic metre per day (TQD)
     *
     * thousand cubic metre per day
     */
    case REC20_THOU_CUBI_METR_PER_DAY = 'TQD';

    /**
     * thousand piece (T3)
     *
     * thousand piece
     */
    case REC20_THOU_PIEC = 'T3';

    /**
     * thousand square inch (TI)
     *
     * thousand square inch
     */
    case REC20_THOU_SQUA_INCH = 'TI';

    /**
     * thousand standard brick equivalent (MBE)
     *
     * thousand standard brick equivalent
     */
    case REC20_THOU_STAN_BRIC_EQUI = 'MBE';

    /**
     * ton (UK long) per cubic yard (L92)
     *
     * ton (UK long) per cubic yard
     */
    case REC20_TON_UK_LONG_PER_CUBI_YARD = 'L92';

    /**
     * ton (UK shipping) (L84)
     *
     * ton (UK shipping)
     */
    case REC20_TON_UK_SHIP = 'L84';

    /**
     * ton (UK) or long ton (US) (LTN)
     *
     * ton (UK) or long ton (US)
     */
    case REC20_TON_UK_OR_LONG_TON_US = 'LTN';

    /**
     * ton (US shipping) (L86)
     *
     * ton (US shipping)
     */
    case REC20_TON_US_SHIP = 'L86';

    /**
     * ton (US short) per cubic yard (L93)
     *
     * ton (US short) per cubic yard
     */
    case REC20_TON_US_SHOR_PER_CUBI_YARD = 'L93';

    /**
     * ton (US) or short ton (UK/US) (STN)
     *
     * ton (US) or short ton (UK/US)
     */
    case REC20_TON_US_OR_SHOR_TON_UKUS = 'STN';

    /**
     * ton (US) per hour (4W)
     *
     * ton (US) per hour
     */
    case REC20_TON_US_PER_HOUR = '4W';

    /**
     * ton long per day (L85)
     *
     * ton long per day
     */
    case REC20_TON_LONG_PER_DAY = 'L85';

    /**
     * ton short per day (L88)
     *
     * ton short per day
     */
    case REC20_TON_SHOR_PER_DAY = 'L88';

    /**
     * ton short per degree Fahrenheit (L87)
     *
     * ton short per degree Fahrenheit
     */
    case REC20_TON_SHOR_PER_DEGR_FAHR = 'L87';

    /**
     * ton short per hour degree Fahrenheit (L89)
     *
     * ton short per hour degree Fahrenheit
     */
    case REC20_TON_SHOR_PER_HOUR_DEGR_FAHR = 'L89';

    /**
     * ton short per hour psi (L90)
     *
     * ton short per hour psi
     */
    case REC20_TON_SHOR_PER_HOUR_PSI = 'L90';

    /**
     * ton short per psi (L91)
     *
     * ton short per psi
     */
    case REC20_TON_SHOR_PER_PSI = 'L91';

    /**
     * ton, assay (M85)
     *
     * ton, assay
     */
    case REC20_TON_ASSA = 'M85';

    /**
     * ton, register (M70)
     *
     * ton, register
     */
    case REC20_TON_REGI = 'M70';

    /**
     * ton-force (US short) (L94)
     *
     * ton-force (US short)
     */
    case REC20_TONF_US_SHOR = 'L94';

    /**
     * tonne (metric ton) (TNE)
     *
     * tonne (metric ton)
     */
    case REC20_TONN_METR_TON = 'TNE';

    /**
     * tonne kilometre (TKM)
     *
     * tonne kilometre
     */
    case REC20_TONN_KILO = 'TKM';

    /**
     * tonne per bar (L70)
     *
     * tonne per bar
     */
    case REC20_TONN_PER_BAR = 'L70';

    /**
     * tonne per cubic metre (D41)
     *
     * tonne per cubic metre
     */
    case REC20_TONN_PER_CUBI_METR = 'D41';

    /**
     * tonne per cubic metre bar (L77)
     *
     * tonne per cubic metre bar
     */
    case REC20_TONN_PER_CUBI_METR_BAR = 'L77';

    /**
     * tonne per cubic metre kelvin (L76)
     *
     * tonne per cubic metre kelvin
     */
    case REC20_TONN_PER_CUBI_METR_KELV = 'L76';

    /**
     * tonne per day (L71)
     *
     * tonne per day
     */
    case REC20_TONN_PER_DAY = 'L71';

    /**
     * tonne per day bar (L73)
     *
     * tonne per day bar
     */
    case REC20_TONN_PER_DAY_BAR = 'L73';

    /**
     * tonne per day kelvin (L72)
     *
     * tonne per day kelvin
     */
    case REC20_TONN_PER_DAY_KELV = 'L72';

    /**
     * tonne per hour (E18)
     *
     * tonne per hour
     */
    case REC20_TONN_PER_HOUR = 'E18';

    /**
     * tonne per hour bar (L75)
     *
     * tonne per hour bar
     */
    case REC20_TONN_PER_HOUR_BAR = 'L75';

    /**
     * tonne per hour kelvin (L74)
     *
     * tonne per hour kelvin
     */
    case REC20_TONN_PER_HOUR_KELV = 'L74';

    /**
     * tonne per kelvin (L69)
     *
     * tonne per kelvin
     */
    case REC20_TONN_PER_KELV = 'L69';

    /**
     * tonne per minute (L78)
     *
     * tonne per minute
     */
    case REC20_TONN_PER_MINU = 'L78';

    /**
     * tonne per minute bar (L80)
     *
     * tonne per minute bar
     */
    case REC20_TONN_PER_MINU_BAR = 'L80';

    /**
     * tonne per minute kelvin (L79)
     *
     * tonne per minute kelvin
     */
    case REC20_TONN_PER_MINU_KELV = 'L79';

    /**
     * tonne per month (M88)
     *
     * tonne per month
     */
    case REC20_TONN_PER_MONT = 'M88';

    /**
     * tonne per second (L81)
     *
     * tonne per second
     */
    case REC20_TONN_PER_SECO = 'L81';

    /**
     * tonne per second bar (L83)
     *
     * tonne per second bar
     */
    case REC20_TONN_PER_SECO_BAR = 'L83';

    /**
     * tonne per second kelvin (L82)
     *
     * tonne per second kelvin
     */
    case REC20_TONN_PER_SECO_KELV = 'L82';

    /**
     * tonne per year (M89)
     *
     * tonne per year
     */
    case REC20_TONN_PER_YEAR = 'M89';

    /**
     * torr per metre (P85)
     *
     * torr per metre
     */
    case REC20_TORR_PER_METR = 'P85';

    /**
     * total acid number (TAN)
     *
     * total acid number
     */
    case REC20_TOTA_ACID_NUMB = 'TAN';

    /**
     * treatment (U1)
     *
     * treatment
     */
    case REC20_TREATMENT = 'U1';

    /**
     * trillion (EUR) (TRL)
     *
     * trillion (EUR)
     */
    case REC20_TRIL_EUR = 'TRL';

    /**
     * trip (E54)
     *
     * trip
     */
    case REC20_TRIP = 'E54';

    /**
     * tropical year (D42)
     *
     * tropical year
     */
    case REC20_TROP_YEAR = 'D42';

    /**
     * troy ounce or apothecary ounce (APZ)
     *
     * troy ounce or apothecary ounce
     */
    case REC20_TROY_OUNC_OR_APOT_OUNC = 'APZ';

    /**
     * troy pound (US) (LBT)
     *
     * troy pound (US)
     */
    case REC20_TROY_POUN_US = 'LBT';

    /**
     * twenty foot container (20)
     *
     * twenty foot container
     */
    case REC20_TWEN_FOOT_CONT = '20';

    /**
     * tyre (E23)
     *
     * tyre
     */
    case REC20_TYRE = 'E23';

    /**
     * unified atomic mass unit (D43)
     *
     * unified atomic mass unit
     */
    case REC20_UNIF_ATOM_MASS_UNIT = 'D43';

    /**
     * unit pole (P53)
     *
     * unit pole
     */
    case REC20_UNIT_POLE = 'P53';

    /**
     * US gallon per minute (G2)
     *
     * US gallon per minute
     */
    case REC20_US_GALL_PER_MINU = 'G2';

    /**
     * use (E55)
     *
     * use
     */
    case REC20_USE = 'E55';

    /**
     * var (D44)
     *
     * var
     */
    case REC20_VAR = 'D44';

    /**
     * volt (VLT)
     *
     * volt
     */
    case REC20_VOLT = 'VLT';

    /**
     * volt - ampere (D46)
     *
     * volt - ampere
     */
    case REC20_VOLT_AMPE = 'D46';

    /**
     * volt - ampere per kilogram (VA)
     *
     * volt - ampere per kilogram
     */
    case REC20_VOLT_AMPE_PER_KILO = 'VA';

    /**
     * volt AC (2G)
     *
     * volt AC
     */
    case REC20_VOLT_AC = '2G';

    /**
     * volt DC (2H)
     *
     * volt DC
     */
    case REC20_VOLT_DC = '2H';

    /**
     * volt per bar (G60)
     *
     * volt per bar
     */
    case REC20_VOLT_PER_BAR = 'G60';

    /**
     * volt per centimetre (D47)
     *
     * volt per centimetre
     */
    case REC20_VOLT_PER_CENT = 'D47';

    /**
     * volt per inch (H23)
     *
     * volt per inch
     */
    case REC20_VOLT_PER_INCH = 'H23';

    /**
     * volt per kelvin (D48)
     *
     * volt per kelvin
     */
    case REC20_VOLT_PER_KELV = 'D48';

    /**
     * volt per litre minute (F87)
     *
     * volt per litre minute
     */
    case REC20_VOLT_PER_LITR_MINU = 'F87';

    /**
     * volt per metre (D50)
     *
     * volt per metre
     */
    case REC20_VOLT_PER_METR = 'D50';

    /**
     * volt per microsecond (H24)
     *
     * volt per microsecond
     */
    case REC20_VOLT_PER_MICR = 'H24';

    /**
     * volt per millimetre (D51)
     *
     * volt per millimetre
     */
    case REC20_VOLT_PER_MILL = 'D51';

    /**
     * volt per pascal (N98)
     *
     * volt per pascal
     */
    case REC20_VOLT_PER_PASC = 'N98';

    /**
     * volt per second (H46)
     *
     * volt per second
     */
    case REC20_VOLT_PER_SECO = 'H46';

    /**
     * volt second per metre (H45)
     *
     * volt second per metre
     */
    case REC20_VOLT_SECO_PER_METR = 'H45';

    /**
     * volt square inch per pound-force (H22)
     *
     * volt square inch per pound-force
     */
    case REC20_VOLT_SQUA_INCH_PER_POUN = 'H22';

    /**
     * volt squared per kelvin squared (D45)
     *
     * volt squared per kelvin squared
     */
    case REC20_VOLT_SQUA_PER_KELV_SQUA = 'D45';

    /**
     * water horse power (F80)
     *
     * water horse power
     */
    case REC20_WATE_HORS_POWE = 'F80';

    /**
     * watt (WTT)
     *
     * watt
     */
    case REC20_WATT = 'WTT';

    /**
     * watt hour (WHR)
     *
     * watt hour
     */
    case REC20_WATT_HOUR = 'WHR';

    /**
     * watt per cubic metre (H47)
     *
     * watt per cubic metre
     */
    case REC20_WATT_PER_CUBI_METR = 'H47';

    /**
     * watt per kelvin (D52)
     *
     * watt per kelvin
     */
    case REC20_WATT_PER_KELV = 'D52';

    /**
     * watt per kilogram (WA)
     *
     * watt per kilogram
     */
    case REC20_WATT_PER_KILO = 'WA';

    /**
     * watt per metre (H74)
     *
     * watt per metre
     */
    case REC20_WATT_PER_METR = 'H74';

    /**
     * watt per metre degree Celsius (N80)
     *
     * watt per metre degree Celsius
     */
    case REC20_WATT_PER_METR_DEGR_CELS = 'N80';

    /**
     * watt per metre kelvin (D53)
     *
     * watt per metre kelvin
     */
    case REC20_WATT_PER_METR_KELV = 'D53';

    /**
     * watt per square centimetre (N48)
     *
     * watt per square centimetre
     */
    case REC20_WATT_PER_SQUA_CENT = 'N48';

    /**
     * watt per square inch (N49)
     *
     * watt per square inch
     */
    case REC20_WATT_PER_SQUA_INCH = 'N49';

    /**
     * watt per square metre (D54)
     *
     * watt per square metre
     */
    case REC20_WATT_PER_SQUA_METR = 'D54';

    /**
     * watt per square metre kelvin (D55)
     *
     * watt per square metre kelvin
     */
    case REC20_WATT_PER_SQUA_METR_KELV = 'D55';

    /**
     * watt per square metre kelvin to the fourth power (D56)
     *
     * watt per square metre kelvin to the fourth power
     */
    case REC20_WATT_PER_SQUA_METR_KELV_TO_THE_FOUR_POWE = 'D56';

    /**
     * watt per steradian (D57)
     *
     * watt per steradian
     */
    case REC20_WATT_PER_STER = 'D57';

    /**
     * watt per steradian square metre (D58)
     *
     * watt per steradian square metre
     */
    case REC20_WATT_PER_STER_SQUA_METR = 'D58';

    /**
     * watt second (J55)
     *
     * watt second
     */
    case REC20_WATT_SECO = 'J55';

    /**
     * watt square metre (Q21)
     *
     * watt square metre
     */
    case REC20_WATT_SQUA_METR = 'Q21';

    /**
     * weber (WEB)
     *
     * weber
     */
    case REC20_WEBER = 'WEB';

    /**
     * weber metre (P50)
     *
     * weber metre
     */
    case REC20_WEBE_METR = 'P50';

    /**
     * weber per metre (D59)
     *
     * weber per metre
     */
    case REC20_WEBE_PER_METR = 'D59';

    /**
     * weber per millimetre (D60)
     *
     * weber per millimetre
     */
    case REC20_WEBE_PER_MILL = 'D60';

    /**
     * weber to the power minus one (Q23)
     *
     * weber to the power minus one
     */
    case REC20_WEBE_TO_THE_POWE_MINU_ONE = 'Q23';

    /**
     * week (WEE)
     *
     * week
     */
    case REC20_WEEK = 'WEE';

    /**
     * well (E56)
     *
     * well
     */
    case REC20_WELL = 'E56';

    /**
     * wet kilo (W2)
     *
     * wet kilo
     */
    case REC20_WET_KILO = 'W2';

    /**
     * wet pound (WB)
     *
     * wet pound
     */
    case REC20_WET_POUN = 'WB';

    /**
     * wet ton (WE)
     *
     * wet ton
     */
    case REC20_WET_TON = 'WE';

    /**
     * wine gallon (WG)
     *
     * wine gallon
     */
    case REC20_WINE_GALL = 'WG';

    /**
     * working day (E49)
     *
     * working day
     */
    case REC20_WORK_DAY = 'E49';

    /**
     * working month (WM)
     *
     * working month
     */
    case REC20_WORK_MONT = 'WM';

    /**
     * yard (YRD)
     *
     * yard
     */
    case REC20_YARD = 'YRD';

    /**
     * yard per degree Fahrenheit (L98)
     *
     * yard per degree Fahrenheit
     */
    case REC20_YARD_PER_DEGR_FAHR = 'L98';

    /**
     * yard per hour (M66)
     *
     * yard per hour
     */
    case REC20_YARD_PER_HOUR = 'M66';

    /**
     * yard per minute (M65)
     *
     * yard per minute
     */
    case REC20_YARD_PER_MINU = 'M65';

    /**
     * yard per psi (L99)
     *
     * yard per psi
     */
    case REC20_YARD_PER_PSI = 'L99';

    /**
     * yard per second (M64)
     *
     * yard per second
     */
    case REC20_YARD_PER_SECO = 'M64';

    /**
     * yard per second squared (M40)
     *
     * yard per second squared
     */
    case REC20_YARD_PER_SECO_SQUA = 'M40';

    /**
     * year (ANN)
     *
     * year
     */
    case REC20_YEAR = 'ANN';

    /**
     * zone (E57)
     *
     * zone
     */
    case REC20_ZONE = 'E57';

    /**
     * 1/4 EURO Pallet (XOJ)
     *
     * Standard pallet with dimensions 60 X 40 cm.
     */
    case REC21_EURO_PALL = 'XOJ';

    /**
     * A wheeled pallet with raised rim (81 x 67 x 135) (XOX)
     *
     * A wheeled pallet with raised rim for the storing and transporting of loads.
     * Dimensions: 81 x 67 x 135 cm (length x width x height).
     */
    case REC21_A_WHEE_PALL_WITH_RAIS_RIM__X__X_35 = 'XOX';

    /**
     * Aerosol (XAE)
     *
     * Aerosol
     */
    case REC21_AEROSOL = 'XAE';

    /**
     * Ampoule, non-protected (XAM)
     *
     * Ampoule, non-protected
     */
    case REC21_AMPO_NONP = 'XAM';

    /**
     * Ampoule, protected (XAP)
     *
     * Ampoule, protected
     */
    case REC21_AMPO_PROT = 'XAP';

    /**
     * Atomizer (XAT)
     *
     * Atomizer
     */
    case REC21_ATOMIZER = 'XAT';

    /**
     * Bag (XBG)
     *
     * A receptacle made of flexible material with an open or closed top.
     */
    case REC21_BAG = 'XBG';

    /**
     * Bag, flexible container (XFX)
     *
     * Bag, flexible container
     */
    case REC21_BAG_FLEX_CONT = 'XFX';

    /**
     * Bag, gunny (XGY)
     *
     * A sack made of gunny or burlap, used for transporting coarse commodities,
     * such as grains, potatoes, and other agricultural products.
     */
    case REC21_BAG_GUNN = 'XGY';

    /**
     * Bag, jumbo (XJB)
     *
     * A flexible containment bag, widely used for storage, transportation and
     * handling of powder, flake or granular materials. Typically constructed from
     * woven polypropylene (PP) fabric in the form of cubic bags.
     */
    case REC21_BAG_JUMB = 'XJB';

    /**
     * Bag, large (XZB)
     *
     * Bag, large
     */
    case REC21_BAG_LARG = 'XZB';

    /**
     * Bag, multiply (XMB)
     *
     * Bag, multiply
     */
    case REC21_BAG_MULT = 'XMB';

    /**
     * Bag, paper (X5M)
     *
     * Bag, paper
     */
    case REC21_BAG_PAPE = 'X5M';

    /**
     * Bag, paper, multi-wall (XXJ)
     *
     * Bag, paper, multi-wall
     */
    case REC21_BAG_PAPE_MULT = 'XXJ';

    /**
     * Bag, paper, multi-wall, water resistant (XXK)
     *
     * Bag, paper, multi-wall, water resistant
     */
    case REC21_BAG_PAPE_MULT_WATE_RESI = 'XXK';

    /**
     * Bag, plastic (XEC)
     *
     * Bag, plastic
     */
    case REC21_BAG_PLAS = 'XEC';

    /**
     * Bag, plastics film (XXD)
     *
     * Bag, plastics film
     */
    case REC21_BAG_PLAS_FILM = 'XXD';

    /**
     * Bag, polybag (X44)
     *
     * A type of plastic bag, typically used to wrap promotional pieces,
     * publications, product samples, and/or catalogues.
     */
    case REC21_BAG_POLY = 'X44';

    /**
     * Bag, super bulk (X43)
     *
     * A cloth plastic or paper based bag having the dimensions of the pallet on
     * which it is constructed.
     */
    case REC21_BAG_SUPE_BULK = 'X43';

    /**
     * Bag, textile (X5L)
     *
     * Bag, textile
     */
    case REC21_BAG_TEXT = 'X5L';

    /**
     * Bag, textile, sift proof (XXG)
     *
     * Bag, textile, sift proof
     */
    case REC21_BAG_TEXT_SIFT_PROO = 'XXG';

    /**
     * Bag, textile, water resistant (XXH)
     *
     * Bag, textile, water resistant
     */
    case REC21_BAG_TEXT_WATE_RESI = 'XXH';

    /**
     * Bag, textile, without inner coat/liner (XXF)
     *
     * Bag, textile, without inner coat/liner
     */
    case REC21_BAG_TEXT_WITH_INNE_COAT = 'XXF';

    /**
     * Bag, tote (XTT)
     *
     * A capacious bag or basket.
     */
    case REC21_BAG_TOTE = 'XTT';

    /**
     * Bag, woven plastic (X5H)
     *
     * Bag, woven plastic
     */
    case REC21_BAG_WOVE_PLAS = 'X5H';

    /**
     * Bag, woven plastic, sift proof (XXB)
     *
     * Bag, woven plastic, sift proof
     */
    case REC21_BAG_WOVE_PLAS_SIFT_PROO = 'XXB';

    /**
     * Bag, woven plastic, water resistant (XXC)
     *
     * Bag, woven plastic, water resistant
     */
    case REC21_BAG_WOVE_PLAS_WATE_RESI = 'XXC';

    /**
     * Bag, woven plastic, without inner coat/liner (XXA)
     *
     * Bag, woven plastic, without inner coat/liner
     */
    case REC21_BAG_WOVE_PLAS_WITH_INNE_COAT = 'XXA';

    /**
     * Bale, compressed (XBL)
     *
     * Bale, compressed
     */
    case REC21_BALE_COMP = 'XBL';

    /**
     * Bale, non-compressed (XBN)
     *
     * Bale, non-compressed
     */
    case REC21_BALE_NONC = 'XBN';

    /**
     * Ball (XAL)
     *
     * A spherical containment vessel for retaining substances or articles.
     */
    case REC21_BALL = 'XAL';

    /**
     * Balloon, non-protected (XBF)
     *
     * Balloon, non-protected
     */
    case REC21_BALL_NONP = 'XBF';

    /**
     * Balloon, protected (XBP)
     *
     * Balloon, protected
     */
    case REC21_BALL_PROT = 'XBP';

    /**
     * Bar (XBR)
     *
     * Bar
     */
    case REC21_BAR = 'XBR';

    /**
     * Barrel (XBA)
     *
     * Barrel
     */
    case REC21_BARREL = 'XBA';

    /**
     * Barrel, wooden (X2C)
     *
     * Barrel, wooden
     */
    case REC21_BARR_WOOD = 'X2C';

    /**
     * Barrel, wooden, bung type (XQH)
     *
     * Barrel, wooden, bung type
     */
    case REC21_BARR_WOOD_BUNG_TYPE = 'XQH';

    /**
     * Barrel, wooden, removable head (XQJ)
     *
     * Barrel, wooden, removable head
     */
    case REC21_BARR_WOOD_REMO_HEAD = 'XQJ';

    /**
     * Bars, in bundle/bunch/truss (XBZ)
     *
     * Bars, in bundle/bunch/truss
     */
    case REC21_BARS_IN_BUND = 'XBZ';

    /**
     * Basin (XBM)
     *
     * Basin
     */
    case REC21_BASIN = 'XBM';

    /**
     * Basket (XBK)
     *
     * Basket
     */
    case REC21_BASKET = 'XBK';

    /**
     * Basket, with handle, cardboard (XHC)
     *
     * Basket, with handle, cardboard
     */
    case REC21_BASK_WITH_HAND_CARD = 'XHC';

    /**
     * Basket, with handle, plastic (XHA)
     *
     * Basket, with handle, plastic
     */
    case REC21_BASK_WITH_HAND_PLAS = 'XHA';

    /**
     * Basket, with handle, wooden (XHB)
     *
     * Basket, with handle, wooden
     */
    case REC21_BASK_WITH_HAND_WOOD = 'XHB';

    /**
     * Belt (XB4)
     *
     * A band use to retain multiple articles together.
     */
    case REC21_BELT = 'XB4';

    /**
     * Bin (XBI)
     *
     * Bin
     */
    case REC21_BIN = 'XBI';

    /**
     * Block (XOK)
     *
     * A solid piece of a hard substance, such as granite, having one or more flat
     * sides.
     */
    case REC21_BLOCK = 'XOK';

    /**
     * Board (XBD)
     *
     * Board
     */
    case REC21_BOARD = 'XBD';

    /**
     * Board, in bundle/bunch/truss (XBY)
     *
     * Board, in bundle/bunch/truss
     */
    case REC21_BOAR_IN_BUND = 'XBY';

    /**
     * Bobbin (XBB)
     *
     * Bobbin
     */
    case REC21_BOBBIN = 'XBB';

    /**
     * Bolt (XBT)
     *
     * Bolt
     */
    case REC21_BOLT = 'XBT';

    /**
     * Bottle, gas (XGB)
     *
     * A narrow-necked metal cylinder for retention of liquefied or compressed
     * gas.
     */
    case REC21_BOTT_GAS = 'XGB';

    /**
     * Bottle, non-protected, bulbous (XBS)
     *
     * A narrow-necked bulb shaped vessel without external protective packing
     * material.
     */
    case REC21_BOTT_NONP_BULB = 'XBS';

    /**
     * Bottle, non-protected, cylindrical (XBO)
     *
     * A narrow-necked cylindrical shaped vessel without external protective
     * packing material.
     */
    case REC21_BOTT_NONP_CYLI = 'XBO';

    /**
     * Bottle, protected bulbous (XBV)
     *
     * A narrow-necked bulb shaped vessel with external protective packing
     * material.
     */
    case REC21_BOTT_PROT_BULB = 'XBV';

    /**
     * Bottle, protected cylindrical (XBQ)
     *
     * A narrow-necked cylindrical shaped vessel with external protective packing
     * material.
     */
    case REC21_BOTT_PROT_CYLI = 'XBQ';

    /**
     * Bottlecrate / bottlerack (XBC)
     *
     * Bottlecrate / bottlerack
     */
    case REC21_BOTT_BOTT = 'XBC';

    /**
     * Box (XBX)
     *
     * Box
     */
    case REC21_BOX = 'XBX';

    /**
     * Box, aluminium (X4B)
     *
     * Box, aluminium
     */
    case REC21_BOX_ALUM = 'X4B';

    /**
     * Box, Commonwealth Handling Equipment Pool (CHEP), Eurobox (XDH)
     *
     * A box mounted on a pallet base under the control of CHEP.
     */
    case REC21_BOX_COMM_HAND_EQUI_POOL_CHEP_EURO = 'XDH';

    /**
     * Box, fibreboard (X4G)
     *
     * Box, fibreboard
     */
    case REC21_BOX_FIBR = 'X4G';

    /**
     * Box, for liquids (XBW)
     *
     * Box, for liquids
     */
    case REC21_BOX_FOR_LIQU = 'XBW';

    /**
     * Box, natural wood (X4C)
     *
     * Box, natural wood
     */
    case REC21_BOX_NATU_WOOD = 'X4C';

    /**
     * Box, plastic (X4H)
     *
     * Box, plastic
     */
    case REC21_BOX_PLAS = 'X4H';

    /**
     * Box, plastic, expanded (XQR)
     *
     * Box, plastic, expanded
     */
    case REC21_BOX_PLAS_EXPA = 'XQR';

    /**
     * Box, plastic, solid (XQS)
     *
     * Box, plastic, solid
     */
    case REC21_BOX_PLAS_SOLI = 'XQS';

    /**
     * Box, plywood (X4D)
     *
     * Box, plywood
     */
    case REC21_BOX_PLYW = 'X4D';

    /**
     * Box, reconstituted wood (X4F)
     *
     * Box, reconstituted wood
     */
    case REC21_BOX_RECO_WOOD = 'X4F';

    /**
     * Box, steel (X4A)
     *
     * Box, steel
     */
    case REC21_BOX_STEE = 'X4A';

    /**
     * Box, wooden, natural wood, ordinary (XQP)
     *
     * Box, wooden, natural wood, ordinary
     */
    case REC21_BOX_WOOD_NATU_WOOD_ORDI = 'XQP';

    /**
     * Box, wooden, natural wood, with sift proof walls (XQQ)
     *
     * Box, wooden, natural wood, with sift proof walls
     */
    case REC21_BOX_WOOD_NATU_WOOD_WITH_SIFT_PROO_WALL = 'XQQ';

    /**
     * Bucket (XBJ)
     *
     * Bucket
     */
    case REC21_BUCKET = 'XBJ';

    /**
     * Bulk, gas (at 1031 mbar and 15°C) (XVG)
     *
     * Bulk, gas (at 1031 mbar and 15°C)
     */
    case REC21_BULK_GAS_AT__MBAR_AND_5C = 'XVG';

    /**
     * Bulk, liquefied gas (at abnormal temperature/pressure) (XVQ)
     *
     * Bulk, liquefied gas (at abnormal temperature/pressure)
     */
    case REC21_BULK_LIQU_GAS_AT_ABNO_TEMP = 'XVQ';

    /**
     * Bulk, liquid (XVL)
     *
     * Bulk, liquid
     */
    case REC21_BULK_LIQU = 'XVL';

    /**
     * Bulk, scrap metal (XVS)
     *
     * Loose or unpacked scrap metal transported in bulk form.
     */
    case REC21_BULK_SCRA_META = 'XVS';

    /**
     * Bulk, solid, fine particles (“powders”) (XVY)
     *
     * Bulk, solid, fine particles (“powders”)
     */
    case REC21_BULK_SOLI_FINE_PART_POWD = 'XVY';

    /**
     * Bulk, solid, granular particles (“grains”) (XVR)
     *
     * Bulk, solid, granular particles (“grains”)
     */
    case REC21_BULK_SOLI_GRAN_PART_GRAI = 'XVR';

    /**
     * Bulk, solid, large particles (“nodules”) (XVO)
     *
     * Bulk, solid, large particles (“nodules”)
     */
    case REC21_BULK_SOLI_LARG_PART_NODU = 'XVO';

    /**
     * Bunch (XBH)
     *
     * Bunch
     */
    case REC21_BUNCH = 'XBH';

    /**
     * Bundle (XBE)
     *
     * Bundle
     */
    case REC21_BUNDLE = 'XBE';

    /**
     * Bundle, wooden (X8C)
     *
     * Loose or unpacked pieces of wood tied or wrapped together.
     */
    case REC21_BUND_WOOD = 'X8C';

    /**
     * Butt (XBU)
     *
     * Butt
     */
    case REC21_BUTT = 'XBU';

    /**
     * Cage (XCG)
     *
     * Cage
     */
    case REC21_CAGE = 'XCG';

    /**
     * Cage, Commonwealth Handling Equipment Pool (CHEP) (XDG)
     *
     * Cage, Commonwealth Handling Equipment Pool (CHEP)
     */
    case REC21_CAGE_COMM_HAND_EQUI_POOL_CHEP = 'XDG';

    /**
     * Cage, roll (XCW)
     *
     * Cage, roll
     */
    case REC21_CAGE_ROLL = 'XCW';

    /**
     * Can, cylindrical (XCX)
     *
     * Can, cylindrical
     */
    case REC21_CAN_CYLI = 'XCX';

    /**
     * Can, rectangular (XCA)
     *
     * Can, rectangular
     */
    case REC21_CAN_RECT = 'XCA';

    /**
     * Can, with handle and spout (XCD)
     *
     * Can, with handle and spout
     */
    case REC21_CAN_WITH_HAND_AND_SPOU = 'XCD';

    /**
     * Canister (XCI)
     *
     * Canister
     */
    case REC21_CANISTER = 'XCI';

    /**
     * Canvas (XCZ)
     *
     * Canvas
     */
    case REC21_CANVAS = 'XCZ';

    /**
     * Capsule (XAV)
     *
     * Capsule
     */
    case REC21_CAPSULE = 'XAV';

    /**
     * Carboy, non-protected (XCO)
     *
     * Carboy, non-protected
     */
    case REC21_CARB_NONP = 'XCO';

    /**
     * Carboy, protected (XCP)
     *
     * Carboy, protected
     */
    case REC21_CARB_PROT = 'XCP';

    /**
     * Card (XCM)
     *
     * A flat package usually made of fibreboard from/to which product is often
     * hung or attached.
     */
    case REC21_CARD = 'XCM';

    /**
     * Cart, flatbed (XFW)
     *
     * Wheeled flat bedded device on which trays or other regular shaped items are
     * packed for transportation purposes.
     */
    case REC21_CART_FLAT = 'XFW';

    /**
     * Carton (XCT)
     *
     * Carton
     */
    case REC21_CARTON = 'XCT';

    /**
     * Cartridge (XCQ)
     *
     * Package containing a charge such as propelling explosive for firearms or
     * ink toner for a printer.
     */
    case REC21_CARTRIDGE = 'XCQ';

    /**
     * Case (XCS)
     *
     * Case
     */
    case REC21_CASE = 'XCS';

    /**
     * Case, car (X7A)
     *
     * A type of portable container designed to store equipment for carriage in an
     * automobile.
     */
    case REC21_CASE_CAR = 'X7A';

    /**
     * Case, isothermic (XEI)
     *
     * Case, isothermic
     */
    case REC21_CASE_ISOT = 'XEI';

    /**
     * Case, skeleton (XSK)
     *
     * Case, skeleton
     */
    case REC21_CASE_SKEL = 'XSK';

    /**
     * Case, steel (XSS)
     *
     * Case, steel
     */
    case REC21_CASE_STEE = 'XSS';

    /**
     * Case, with pallet base (XED)
     *
     * Case, with pallet base
     */
    case REC21_CASE_WITH_PALL_BASE = 'XED';

    /**
     * Case, with pallet base, cardboard (XEF)
     *
     * Case, with pallet base, cardboard
     */
    case REC21_CASE_WITH_PALL_BASE_CARD = 'XEF';

    /**
     * Case, with pallet base, metal (XEH)
     *
     * Case, with pallet base, metal
     */
    case REC21_CASE_WITH_PALL_BASE_META = 'XEH';

    /**
     * Case, with pallet base, plastic (XEG)
     *
     * Case, with pallet base, plastic
     */
    case REC21_CASE_WITH_PALL_BASE_PLAS = 'XEG';

    /**
     * Case, with pallet base, wooden (XEE)
     *
     * Case, with pallet base, wooden
     */
    case REC21_CASE_WITH_PALL_BASE_WOOD = 'XEE';

    /**
     * Case, wooden (X7B)
     *
     * A case made of wood for retaining substances or articles.
     */
    case REC21_CASE_WOOD = 'X7B';

    /**
     * Cask (XCK)
     *
     * Cask
     */
    case REC21_CASK = 'XCK';

    /**
     * CHEP pallet 60 cm x 80 cm (XP1)
     *
     * Commonwealth Handling Equipment Pool (CHEP) standard pallet of dimensions
     * 60 centimeters x 80 centimeters.
     */
    case REC21_CHEP_PALL__CM_X__CM = 'XP1';

    /**
     * Chest (XCH)
     *
     * Chest
     */
    case REC21_CHEST = 'XCH';

    /**
     * Churn (XCC)
     *
     * Churn
     */
    case REC21_CHURN = 'XCC';

    /**
     * Clamshell (XAI)
     *
     * Clamshell
     */
    case REC21_CLAMSHELL = 'XAI';

    /**
     * Coffer (XCF)
     *
     * Coffer
     */
    case REC21_COFFER = 'XCF';

    /**
     * Coffin (XCJ)
     *
     * Coffin
     */
    case REC21_COFFIN = 'XCJ';

    /**
     * Coil (XCL)
     *
     * Coil
     */
    case REC21_COIL = 'XCL';

    /**
     * Composite packaging, glass receptacle (X6P)
     *
     * Composite packaging, glass receptacle
     */
    case REC21_COMP_PACK_GLAS_RECE = 'X6P';

    /**
     * Composite packaging, glass receptacle in aluminium crate (XYR)
     *
     * Composite packaging, glass receptacle in aluminium crate
     */
    case REC21_COMP_PACK_GLAS_RECE_IN_ALUM_CRAT = 'XYR';

    /**
     * Composite packaging, glass receptacle in aluminium drum (XYQ)
     *
     * Composite packaging, glass receptacle in aluminium drum
     */
    case REC21_COMP_PACK_GLAS_RECE_IN_ALUM_DRUM = 'XYQ';

    /**
     * Composite packaging, glass receptacle in expandable plastic pack (XYY)
     *
     * Composite packaging, glass receptacle in expandable plastic pack
     */
    case REC21_COMP_PACK_GLAS_RECE_IN_EXPA_PLAS_PACK = 'XYY';

    /**
     * Composite packaging, glass receptacle in fibre drum (XYW)
     *
     * Composite packaging, glass receptacle in fibre drum
     */
    case REC21_COMP_PACK_GLAS_RECE_IN_FIBR_DRUM = 'XYW';

    /**
     * Composite packaging, glass receptacle in fibreboard box (XYX)
     *
     * Composite packaging, glass receptacle in fibreboard box
     */
    case REC21_COMP_PACK_GLAS_RECE_IN_FIBR_BOX = 'XYX';

    /**
     * Composite packaging, glass receptacle in plywood drum (XYT)
     *
     * Composite packaging, glass receptacle in plywood drum
     */
    case REC21_COMP_PACK_GLAS_RECE_IN_PLYW_DRUM = 'XYT';

    /**
     * Composite packaging, glass receptacle in solid plastic pack (XYZ)
     *
     * Composite packaging, glass receptacle in solid plastic pack
     */
    case REC21_COMP_PACK_GLAS_RECE_IN_SOLI_PLAS_PACK = 'XYZ';

    /**
     * Composite packaging, glass receptacle in steel crate box (XYP)
     *
     * Composite packaging, glass receptacle in steel crate box
     */
    case REC21_COMP_PACK_GLAS_RECE_IN_STEE_CRAT_BOX = 'XYP';

    /**
     * Composite packaging, glass receptacle in steel drum (XYN)
     *
     * Composite packaging, glass receptacle in steel drum
     */
    case REC21_COMP_PACK_GLAS_RECE_IN_STEE_DRUM = 'XYN';

    /**
     * Composite packaging, glass receptacle in wickerwork hamper (XYV)
     *
     * Composite packaging, glass receptacle in wickerwork hamper
     */
    case REC21_COMP_PACK_GLAS_RECE_IN_WICK_HAMP = 'XYV';

    /**
     * Composite packaging, glass receptacle in wooden box (XYS)
     *
     * Composite packaging, glass receptacle in wooden box
     */
    case REC21_COMP_PACK_GLAS_RECE_IN_WOOD_BOX = 'XYS';

    /**
     * Composite packaging, plastic receptacle (X6H)
     *
     * Composite packaging, plastic receptacle
     */
    case REC21_COMP_PACK_PLAS_RECE = 'X6H';

    /**
     * Composite packaging, plastic receptacle in aluminium crate (XYD)
     *
     * Composite packaging, plastic receptacle in aluminium crate
     */
    case REC21_COMP_PACK_PLAS_RECE_IN_ALUM_CRAT = 'XYD';

    /**
     * Composite packaging, plastic receptacle in aluminium drum (XYC)
     *
     * Composite packaging, plastic receptacle in aluminium drum
     */
    case REC21_COMP_PACK_PLAS_RECE_IN_ALUM_DRUM = 'XYC';

    /**
     * Composite packaging, plastic receptacle in fibre drum (XYJ)
     *
     * Composite packaging, plastic receptacle in fibre drum
     */
    case REC21_COMP_PACK_PLAS_RECE_IN_FIBR_DRUM = 'XYJ';

    /**
     * Composite packaging, plastic receptacle in fibreboard box (XYK)
     *
     * Composite packaging, plastic receptacle in fibreboard box
     */
    case REC21_COMP_PACK_PLAS_RECE_IN_FIBR_BOX = 'XYK';

    /**
     * Composite packaging, plastic receptacle in plastic drum (XYL)
     *
     * Composite packaging, plastic receptacle in plastic drum
     */
    case REC21_COMP_PACK_PLAS_RECE_IN_PLAS_DRUM = 'XYL';

    /**
     * Composite packaging, plastic receptacle in plywood box (XYH)
     *
     * Composite packaging, plastic receptacle in plywood box
     */
    case REC21_COMP_PACK_PLAS_RECE_IN_PLYW_BOX = 'XYH';

    /**
     * Composite packaging, plastic receptacle in plywood drum (XYG)
     *
     * Composite packaging, plastic receptacle in plywood drum
     */
    case REC21_COMP_PACK_PLAS_RECE_IN_PLYW_DRUM = 'XYG';

    /**
     * Composite packaging, plastic receptacle in solid plastic box (XYM)
     *
     * Composite packaging, plastic receptacle in solid plastic box
     */
    case REC21_COMP_PACK_PLAS_RECE_IN_SOLI_PLAS_BOX = 'XYM';

    /**
     * Composite packaging, plastic receptacle in steel crate box (XYB)
     *
     * Composite packaging, plastic receptacle in steel crate box
     */
    case REC21_COMP_PACK_PLAS_RECE_IN_STEE_CRAT_BOX = 'XYB';

    /**
     * Composite packaging, plastic receptacle in steel drum (XYA)
     *
     * Composite packaging, plastic receptacle in steel drum
     */
    case REC21_COMP_PACK_PLAS_RECE_IN_STEE_DRUM = 'XYA';

    /**
     * Composite packaging, plastic receptacle in wooden box (XYF)
     *
     * Composite packaging, plastic receptacle in wooden box
     */
    case REC21_COMP_PACK_PLAS_RECE_IN_WOOD_BOX = 'XYF';

    /**
     * Cone (XAJ)
     *
     * Container used in the transport of linear material such as yarn.
     */
    case REC21_CONE = 'XAJ';

    /**
     * Container, flexible (X1F)
     *
     * A packaging container of flexible construction.
     */
    case REC21_CONT_FLEX = 'X1F';

    /**
     * Container, gallon (XGL)
     *
     * A container with a capacity of one gallon.
     */
    case REC21_CONT_GALL = 'XGL';

    /**
     * Container, metal (XME)
     *
     * A type of containment box made of metal for retaining substances or
     * articles, not otherwise specified as transport equipment.
     */
    case REC21_CONT_META = 'XME';

    /**
     * Container, not otherwise specified as transport equipment (XCN)
     *
     * Container, not otherwise specified as transport equipment
     */
    case REC21_CONT_NOT_OTHE_SPEC_AS_TRAN_EQUI = 'XCN';

    /**
     * Container, outer (XOU)
     *
     * A type of containment box that serves as the outer shipping container, not
     * otherwise specified as transport equipment.
     */
    case REC21_CONT_OUTE = 'XOU';

    /**
     * Cover (XCV)
     *
     * Cover
     */
    case REC21_COVER = 'XCV';

    /**
     * Crate (XCR)
     *
     * Crate
     */
    case REC21_CRATE = 'XCR';

    /**
     * Crate, beer (XCB)
     *
     * Crate, beer
     */
    case REC21_CRAT_BEER = 'XCB';

    /**
     * Crate, bulk, cardboard (XDK)
     *
     * Crate, bulk, cardboard
     */
    case REC21_CRAT_BULK_CARD = 'XDK';

    /**
     * Crate, bulk, plastic (XDL)
     *
     * Crate, bulk, plastic
     */
    case REC21_CRAT_BULK_PLAS = 'XDL';

    /**
     * Crate, bulk, wooden (XDM)
     *
     * Crate, bulk, wooden
     */
    case REC21_CRAT_BULK_WOOD = 'XDM';

    /**
     * Crate, framed (XFD)
     *
     * Crate, framed
     */
    case REC21_CRAT_FRAM = 'XFD';

    /**
     * Crate, fruit (XFC)
     *
     * Crate, fruit
     */
    case REC21_CRAT_FRUI = 'XFC';

    /**
     * Crate, metal (XMA)
     *
     * Containment box made of metal for retaining substances or articles.
     */
    case REC21_CRAT_META = 'XMA';

    /**
     * Crate, milk (XMC)
     *
     * Crate, milk
     */
    case REC21_CRAT_MILK = 'XMC';

    /**
     * Crate, multiple layer, cardboard (XDC)
     *
     * Crate, multiple layer, cardboard
     */
    case REC21_CRAT_MULT_LAYE_CARD = 'XDC';

    /**
     * Crate, multiple layer, plastic (XDA)
     *
     * Crate, multiple layer, plastic
     */
    case REC21_CRAT_MULT_LAYE_PLAS = 'XDA';

    /**
     * Crate, multiple layer, wooden (XDB)
     *
     * Crate, multiple layer, wooden
     */
    case REC21_CRAT_MULT_LAYE_WOOD = 'XDB';

    /**
     * Crate, shallow (XSC)
     *
     * Crate, shallow
     */
    case REC21_CRAT_SHAL = 'XSC';

    /**
     * Crate, wooden (X8B)
     *
     * A receptacle, made of wood, on which goods are retained for ease of
     * mechanical handling during transport and storage.
     */
    case REC21_CRAT_WOOD = 'X8B';

    /**
     * Creel (XCE)
     *
     * Creel
     */
    case REC21_CREEL = 'XCE';

    /**
     * Cup (XCU)
     *
     * Cup
     */
    case REC21_CUP = 'XCU';

    /**
     * Cylinder (XCY)
     *
     * Cylinder
     */
    case REC21_CYLINDER = 'XCY';

    /**
     * Demijohn, non-protected (XDJ)
     *
     * Demijohn, non-protected
     */
    case REC21_DEMI_NONP = 'XDJ';

    /**
     * Demijohn, protected (XDP)
     *
     * Demijohn, protected
     */
    case REC21_DEMI_PROT = 'XDP';

    /**
     * Dispenser (XDN)
     *
     * Dispenser
     */
    case REC21_DISPENSER = 'XDN';

    /**
     * Drum (XDR)
     *
     * Drum
     */
    case REC21_DRUM = 'XDR';

    /**
     * Drum, aluminium (X1B)
     *
     * Drum, aluminium
     */
    case REC21_DRUM_ALUM = 'X1B';

    /**
     * Drum, aluminium, non-removable head (XQC)
     *
     * Drum, aluminium, non-removable head
     */
    case REC21_DRUM_ALUM_NONR_HEAD = 'XQC';

    /**
     * Drum, aluminium, removable head (XQD)
     *
     * Drum, aluminium, removable head
     */
    case REC21_DRUM_ALUM_REMO_HEAD = 'XQD';

    /**
     * Drum, fibre (X1G)
     *
     * Drum, fibre
     */
    case REC21_DRUM_FIBR = 'X1G';

    /**
     * Drum, iron (XDI)
     *
     * Drum, iron
     */
    case REC21_DRUM_IRON = 'XDI';

    /**
     * Drum, plastic (XIH)
     *
     * Drum, plastic
     */
    case REC21_DRUM_PLAS = 'XIH';

    /**
     * Drum, plastic, non-removable head (XQF)
     *
     * Drum, plastic, non-removable head
     */
    case REC21_DRUM_PLAS_NONR_HEAD = 'XQF';

    /**
     * Drum, plastic, removable head (XQG)
     *
     * Drum, plastic, removable head
     */
    case REC21_DRUM_PLAS_REMO_HEAD = 'XQG';

    /**
     * Drum, plywood (X1D)
     *
     * Drum, plywood
     */
    case REC21_DRUM_PLYW = 'X1D';

    /**
     * Drum, steel (X1A)
     *
     * Drum, steel
     */
    case REC21_DRUM_STEE = 'X1A';

    /**
     * Drum, steel, non-removable head (XQA)
     *
     * Drum, steel, non-removable head
     */
    case REC21_DRUM_STEE_NONR_HEAD = 'XQA';

    /**
     * Drum, steel, removable head (XQB)
     *
     * Drum, steel, removable head
     */
    case REC21_DRUM_STEE_REMO_HEAD = 'XQB';

    /**
     * Drum, wooden (X1W)
     *
     * Drum, wooden
     */
    case REC21_DRUM_WOOD = 'X1W';

    /**
     * Envelope (XEN)
     *
     * Envelope
     */
    case REC21_ENVELOPE = 'XEN';

    /**
     * Envelope, steel (XSV)
     *
     * Envelope, steel
     */
    case REC21_ENVE_STEE = 'XSV';

    /**
     * Filmpack (XFP)
     *
     * Filmpack
     */
    case REC21_FILMPACK = 'XFP';

    /**
     * Firkin (XFI)
     *
     * Firkin
     */
    case REC21_FIRKIN = 'XFI';

    /**
     * Flask (XFL)
     *
     * Flask
     */
    case REC21_FLASK = 'XFL';

    /**
     * Flexibag (XFB)
     *
     * A flexible containment bag made of plastic, typically for the
     * transportation bulk non-hazardous cargoes using standard size shipping
     * containers.
     */
    case REC21_FLEXIBAG = 'XFB';

    /**
     * Flexitank (XFE)
     *
     * A flexible containment tank made of plastic, typically for the
     * transportation bulk non-hazardous cargoes using standard size shipping
     * containers.
     */
    case REC21_FLEXITANK = 'XFE';

    /**
     * Foodtainer (XFT)
     *
     * Foodtainer
     */
    case REC21_FOODTAINER = 'XFT';

    /**
     * Footlocker (XFO)
     *
     * Footlocker
     */
    case REC21_FOOTLOCKER = 'XFO';

    /**
     * Frame (XFR)
     *
     * Frame
     */
    case REC21_FRAME = 'XFR';

    /**
     * Girder (XGI)
     *
     * Girder
     */
    case REC21_GIRDER = 'XGI';

    /**
     * Girders, in bundle/bunch/truss (XGZ)
     *
     * Girders, in bundle/bunch/truss
     */
    case REC21_GIRD_IN_BUND = 'XGZ';

    /**
     * Hamper (XHR)
     *
     * Hamper
     */
    case REC21_HAMPER = 'XHR';

    /**
     * Hanger (XHN)
     *
     * A purpose shaped device with a hook at the top for hanging items from a
     * rail.
     */
    case REC21_HANGER = 'XHN';

    /**
     * Hogshead (XHG)
     *
     * Hogshead
     */
    case REC21_HOGSHEAD = 'XHG';

    /**
     * Ingot (XIN)
     *
     * Ingot
     */
    case REC21_INGOT = 'XIN';

    /**
     * Ingots, in bundle/bunch/truss (XIZ)
     *
     * Ingots, in bundle/bunch/truss
     */
    case REC21_INGO_IN_BUND = 'XIZ';

    /**
     * Intermediate bulk container (XWA)
     *
     * A reusable container made of metal, plastic, textile, wood or composite
     * materials used to facilitate transportation of bulk solids and liquids in
     * manageable volumes.
     */
    case REC21_INTE_BULK_CONT = 'XWA';

    /**
     * Intermediate bulk container, aluminium (XWD)
     *
     * Intermediate bulk container, aluminium
     */
    case REC21_INTE_BULK_CONT_ALUM = 'XWD';

    /**
     * Intermediate bulk container, aluminium, liquid (XWL)
     *
     * Intermediate bulk container, aluminium, liquid
     */
    case REC21_INTE_BULK_CONT_ALUM_LIQU = 'XWL';

    /**
     * Intermediate bulk container, aluminium, pressurised > 10 kpa (XWH)
     *
     * Intermediate bulk container, aluminium, pressurised > 10 kpa
     */
    case REC21_INTE_BULK_CONT_ALUM_PRES__KPA = 'XWH';

    /**
     * Intermediate bulk container, composite (XZS)
     *
     * Intermediate bulk container, composite
     */
    case REC21_INTE_BULK_CONT_COMP = 'XZS';

    /**
     * Intermediate bulk container, composite, flexible plastic, liquids (XZR)
     *
     * Intermediate bulk container, composite, flexible plastic, liquids
     */
    case REC21_INTE_BULK_CONT_COMP_FLEX_PLAS_LIQU = 'XZR';

    /**
     * Intermediate bulk container, composite, flexible plastic, pressurised (XZP)
     *
     * Intermediate bulk container, composite, flexible plastic, pressurised
     */
    case REC21_INTE_BULK_CONT_COMP_FLEX_PLAS_PRES = 'XZP';

    /**
     * Intermediate bulk container, composite, flexible plastic, solids (XZM)
     *
     * Intermediate bulk container, composite, flexible plastic, solids
     */
    case REC21_INTE_BULK_CONT_COMP_FLEX_PLAS_SOLI = 'XZM';

    /**
     * Intermediate bulk container, composite, rigid plastic, liquids (XZQ)
     *
     * Intermediate bulk container, composite, rigid plastic, liquids
     */
    case REC21_INTE_BULK_CONT_COMP_RIGI_PLAS_LIQU = 'XZQ';

    /**
     * Intermediate bulk container, composite, rigid plastic, pressurised (XZN)
     *
     * Intermediate bulk container, composite, rigid plastic, pressurised
     */
    case REC21_INTE_BULK_CONT_COMP_RIGI_PLAS_PRES = 'XZN';

    /**
     * Intermediate bulk container, composite, rigid plastic, solids (XZL)
     *
     * Intermediate bulk container, composite, rigid plastic, solids
     */
    case REC21_INTE_BULK_CONT_COMP_RIGI_PLAS_SOLI = 'XZL';

    /**
     * Intermediate bulk container, fibreboard (XZT)
     *
     * Intermediate bulk container, fibreboard
     */
    case REC21_INTE_BULK_CONT_FIBR = 'XZT';

    /**
     * Intermediate bulk container, flexible (XZU)
     *
     * Intermediate bulk container, flexible
     */
    case REC21_INTE_BULK_CONT_FLEX = 'XZU';

    /**
     * Intermediate bulk container, metal (XWF)
     *
     * Intermediate bulk container, metal
     */
    case REC21_INTE_BULK_CONT_META = 'XWF';

    /**
     * Intermediate bulk container, metal, liquid (XWM)
     *
     * Intermediate bulk container, metal, liquid
     */
    case REC21_INTE_BULK_CONT_META_LIQU = 'XWM';

    /**
     * Intermediate bulk container, metal, other than steel (XZV)
     *
     * Intermediate bulk container, metal, other than steel
     */
    case REC21_INTE_BULK_CONT_META_OTHE_THAN_STEE = 'XZV';

    /**
     * Intermediate bulk container, metal, pressure 10 kpa (XWJ)
     *
     * Intermediate bulk container, metal, pressure 10 kpa
     */
    case REC21_INTE_BULK_CONT_META_PRES__KPA = 'XWJ';

    /**
     * Intermediate bulk container, natural wood (XZW)
     *
     * Intermediate bulk container, natural wood
     */
    case REC21_INTE_BULK_CONT_NATU_WOOD = 'XZW';

    /**
     * Intermediate bulk container, natural wood, with inner liner (XWU)
     *
     * Intermediate bulk container, natural wood, with inner liner
     */
    case REC21_INTE_BULK_CONT_NATU_WOOD_WITH_INNE_LINE = 'XWU';

    /**
     * Intermediate bulk container, paper, multi-wall (XZA)
     *
     * Intermediate bulk container, paper, multi-wall
     */
    case REC21_INTE_BULK_CONT_PAPE_MULT = 'XZA';

    /**
     * Intermediate bulk container, paper, multi-wall, water resistant (XZC)
     *
     * Intermediate bulk container, paper, multi-wall, water resistant
     */
    case REC21_INTE_BULK_CONT_PAPE_MULT_WATE_RESI = 'XZC';

    /**
     * Intermediate bulk container, plastic film (XWS)
     *
     * Intermediate bulk container, plastic film
     */
    case REC21_INTE_BULK_CONT_PLAS_FILM = 'XWS';

    /**
     * Intermediate bulk container, plywood (XZX)
     *
     * Intermediate bulk container, plywood
     */
    case REC21_INTE_BULK_CONT_PLYW = 'XZX';

    /**
     * Intermediate bulk container, plywood, with inner liner (XWY)
     *
     * Intermediate bulk container, plywood, with inner liner
     */
    case REC21_INTE_BULK_CONT_PLYW_WITH_INNE_LINE = 'XWY';

    /**
     * Intermediate bulk container, reconstituted wood (XZY)
     *
     * Intermediate bulk container, reconstituted wood
     */
    case REC21_INTE_BULK_CONT_RECO_WOOD = 'XZY';

    /**
     * Intermediate bulk container, reconstituted wood, with inner liner (XWZ)
     *
     * Intermediate bulk container, reconstituted wood, with inner liner
     */
    case REC21_INTE_BULK_CONT_RECO_WOOD_WITH_INNE_LINE = 'XWZ';

    /**
     * Intermediate bulk container, rigid plastic (XAA)
     *
     * Intermediate bulk container, rigid plastic
     */
    case REC21_INTE_BULK_CONT_RIGI_PLAS = 'XAA';

    /**
     * Intermediate bulk container, rigid plastic, freestanding, liquids (XZK)
     *
     * Intermediate bulk container, rigid plastic, freestanding, liquids
     */
    case REC21_INTE_BULK_CONT_RIGI_PLAS_FREE_LIQU = 'XZK';

    /**
     * Intermediate bulk container, rigid plastic, freestanding, pressurised (XZH)
     *
     * Intermediate bulk container, rigid plastic, freestanding, pressurised
     */
    case REC21_INTE_BULK_CONT_RIGI_PLAS_FREE_PRES = 'XZH';

    /**
     * Intermediate bulk container, rigid plastic, freestanding, solids (XZF)
     *
     * Intermediate bulk container, rigid plastic, freestanding, solids
     */
    case REC21_INTE_BULK_CONT_RIGI_PLAS_FREE_SOLI = 'XZF';

    /**
     * Intermediate bulk container, rigid plastic, with structural equipment,
     * liquids (XZJ)
     *
     * Intermediate bulk container, rigid plastic, with structural equipment,
     * liquids
     */
    case REC21_INTE_BULK_CONT_RIGI_PLAS_WITH_STRU_EQUI_LIQU = 'XZJ';

    /**
     * Intermediate bulk container, rigid plastic, with structural equipment,
     * pressurised (XZG)
     *
     * Intermediate bulk container, rigid plastic, with structural equipment,
     * pressurised
     */
    case REC21_INTE_BULK_CONT_RIGI_PLAS_WITH_STRU_EQUI_PRES = 'XZG';

    /**
     * Intermediate bulk container, rigid plastic, with structural equipment,
     * solids (XZD)
     *
     * Intermediate bulk container, rigid plastic, with structural equipment,
     * solids
     */
    case REC21_INTE_BULK_CONT_RIGI_PLAS_WITH_STRU_EQUI_SOLI = 'XZD';

    /**
     * Intermediate bulk container, steel (XWC)
     *
     * Intermediate bulk container, steel
     */
    case REC21_INTE_BULK_CONT_STEE = 'XWC';

    /**
     * Intermediate bulk container, steel, liquid (XWK)
     *
     * Intermediate bulk container, steel, liquid
     */
    case REC21_INTE_BULK_CONT_STEE_LIQU = 'XWK';

    /**
     * Intermediate bulk container, steel, pressurised > 10 kpa (XWG)
     *
     * Intermediate bulk container, steel, pressurised > 10 kpa
     */
    case REC21_INTE_BULK_CONT_STEE_PRES__KPA = 'XWG';

    /**
     * Intermediate bulk container, textile with out coat/liner (XWT)
     *
     * Intermediate bulk container, textile with out coat/liner
     */
    case REC21_INTE_BULK_CONT_TEXT_WITH_OUT_COAT = 'XWT';

    /**
     * Intermediate bulk container, textile, coated (XWV)
     *
     * Intermediate bulk container, textile, coated
     */
    case REC21_INTE_BULK_CONT_TEXT_COAT = 'XWV';

    /**
     * Intermediate bulk container, textile, coated and liner (XWX)
     *
     * Intermediate bulk container, textile, coated and liner
     */
    case REC21_INTE_BULK_CONT_TEXT_COAT_AND_LINE = 'XWX';

    /**
     * Intermediate bulk container, textile, with liner (XWW)
     *
     * Intermediate bulk container, textile, with liner
     */
    case REC21_INTE_BULK_CONT_TEXT_WITH_LINE = 'XWW';

    /**
     * Intermediate bulk container, woven plastic, coated (XWP)
     *
     * Intermediate bulk container, woven plastic, coated
     */
    case REC21_INTE_BULK_CONT_WOVE_PLAS_COAT = 'XWP';

    /**
     * Intermediate bulk container, woven plastic, coated and liner (XWR)
     *
     * Intermediate bulk container, woven plastic, coated and liner
     */
    case REC21_INTE_BULK_CONT_WOVE_PLAS_COAT_AND_LINE = 'XWR';

    /**
     * Intermediate bulk container, woven plastic, with liner (XWQ)
     *
     * Intermediate bulk container, woven plastic, with liner
     */
    case REC21_INTE_BULK_CONT_WOVE_PLAS_WITH_LINE = 'XWQ';

    /**
     * Intermediate bulk container, woven plastic, without coat/liner (XWN)
     *
     * Intermediate bulk container, woven plastic, without coat/liner
     */
    case REC21_INTE_BULK_CONT_WOVE_PLAS_WITH_COAT = 'XWN';

    /**
     * Jar (XJR)
     *
     * Jar
     */
    case REC21_JAR = 'XJR';

    /**
     * Jerrican, cylindrical (XJY)
     *
     * Jerrican, cylindrical
     */
    case REC21_JERR_CYLI = 'XJY';

    /**
     * Jerrican, plastic (X3H)
     *
     * Jerrican, plastic
     */
    case REC21_JERR_PLAS = 'X3H';

    /**
     * Jerrican, plastic, non-removable head (XQM)
     *
     * Jerrican, plastic, non-removable head
     */
    case REC21_JERR_PLAS_NONR_HEAD = 'XQM';

    /**
     * Jerrican, plastic, removable head (XQN)
     *
     * Jerrican, plastic, removable head
     */
    case REC21_JERR_PLAS_REMO_HEAD = 'XQN';

    /**
     * Jerrican, rectangular (XJC)
     *
     * Jerrican, rectangular
     */
    case REC21_JERR_RECT = 'XJC';

    /**
     * Jerrican, steel (X3A)
     *
     * Jerrican, steel
     */
    case REC21_JERR_STEE = 'X3A';

    /**
     * Jerrican, steel, non-removable head (XQK)
     *
     * Jerrican, steel, non-removable head
     */
    case REC21_JERR_STEE_NONR_HEAD = 'XQK';

    /**
     * Jerrican, steel, removable head (XQL)
     *
     * Jerrican, steel, removable head
     */
    case REC21_JERR_STEE_REMO_HEAD = 'XQL';

    /**
     * Jug (XJG)
     *
     * Jug
     */
    case REC21_JUG = 'XJG';

    /**
     * Jutebag (XJT)
     *
     * Jutebag
     */
    case REC21_JUTEBAG = 'XJT';

    /**
     * Keg (XKG)
     *
     * Keg
     */
    case REC21_KEG = 'XKG';

    /**
     * Kit (XKI)
     *
     * A set of articles or implements used for a specific purpose.
     */
    case REC21_KIT = 'XKI';

    /**
     * Large bag, pallet sized (XOW)
     *
     * A non-rigid container made of fabric, paper, plastic, etc, with an opening
     * at the top which can be closed and which is suitable for use on pallets
     */
    case REC21_LARG_BAG_PALL_SIZE = 'XOW';

    /**
     * Liftvan (XLV)
     *
     * A wooden or metal container used for packing household goods and personal
     * effects.
     */
    case REC21_LIFTVAN = 'XLV';

    /**
     * Log (XLG)
     *
     * Log
     */
    case REC21_LOG = 'XLG';

    /**
     * Logs, in bundle/bunch/truss (XLZ)
     *
     * Logs, in bundle/bunch/truss
     */
    case REC21_LOGS_IN_BUND = 'XLZ';

    /**
     * Lot (XLT)
     *
     * Lot
     */
    case REC21_LOT = 'XLT';

    /**
     * LPR pallet 60 cm x 80 cm (XP3)
     *
     * LPR (La Pallet Rouge) standard pallet of dimensions 60 cm x 80 cm.
     */
    case REC21_LPR_PALL__CM_X__CM = 'XP3';

    /**
     * Lug (XLU)
     *
     * A wooden box for the transportation and storage of fruit or vegetables.
     */
    case REC21_LUG = 'XLU';

    /**
     * Luggage (XLE)
     *
     * A collection of bags, cases and/or containers which hold personal
     * belongings for a journey.
     */
    case REC21_LUGGAGE = 'XLE';

    /**
     * Mat (XMT)
     *
     * Mat
     */
    case REC21_MAT = 'XMT';

    /**
     * Matchbox (XMX)
     *
     * Matchbox
     */
    case REC21_MATCHBOX = 'XMX';

    /**
     * Mutually defined (XZZ)
     *
     * Mutually defined
     */
    case REC21_MUTU_DEFI = 'XZZ';

    /**
     * Nest (XNS)
     *
     * Nest
     */
    case REC21_NEST = 'XNS';

    /**
     * Net (XNT)
     *
     * Net
     */
    case REC21_NET = 'XNT';

    /**
     * Net, tube, plastic (XNU)
     *
     * Net, tube, plastic
     */
    case REC21_NET_TUBE_PLAS = 'XNU';

    /**
     * Net, tube, textile (XNV)
     *
     * Net, tube, textile
     */
    case REC21_NET_TUBE_TEXT = 'XNV';

    /**
     * Not available (XNA)
     *
     * Not available
     */
    case REC21_NOT_AVAI = 'XNA';

    /**
     * Octabin (XOT)
     *
     * A standard cardboard container of large dimensions for storing for example
     * vegetables, granules of plastics or other dry products.
     */
    case REC21_OCTABIN = 'XOT';

    /**
     * Oneway pallet (XOS)
     *
     * Pallet need not be returned to the point of expedition
     */
    case REC21_ONEW_PALL = 'XOS';

    /**
     * Oneway pallet ISO 0 - 1/2 EURO Pallet (XO3)
     *
     * Oneway pallet with dimensions 80 X 60 cm.
     */
    case REC21_ONEW_PALL_ISO___EURO_PALL = 'XO3';

    /**
     * Package (XPK)
     *
     * Standard packaging unit.
     */
    case REC21_PACKAGE = 'XPK';

    /**
     * Package, cardboard, with bottle grip-holes (XIK)
     *
     * Packaging material made out of cardboard that facilitates the separation of
     * individual glass or plastic bottles.
     */
    case REC21_PACK_CARD_WITH_BOTT_GRIP = 'XIK';

    /**
     * Package, display, cardboard (XIB)
     *
     * Package, display, cardboard
     */
    case REC21_PACK_DISP_CARD = 'XIB';

    /**
     * Package, display, metal (XID)
     *
     * Package, display, metal
     */
    case REC21_PACK_DISP_META = 'XID';

    /**
     * Package, display, plastic (XIC)
     *
     * Package, display, plastic
     */
    case REC21_PACK_DISP_PLAS = 'XIC';

    /**
     * Package, display, wooden (XIA)
     *
     * Package, display, wooden
     */
    case REC21_PACK_DISP_WOOD = 'XIA';

    /**
     * Package, flow (XIF)
     *
     * A flexible tubular package or skin, possibly transparent, often used for
     * containment of foodstuffs (e.g. salami sausage).
     */
    case REC21_PACK_FLOW = 'XIF';

    /**
     * Package, paper wrapped (XIG)
     *
     * Package, paper wrapped
     */
    case REC21_PACK_PAPE_WRAP = 'XIG';

    /**
     * Package, show (XIE)
     *
     * Package, show
     */
    case REC21_PACK_SHOW = 'XIE';

    /**
     * Packet (XPA)
     *
     * Small package.
     */
    case REC21_PACKET = 'XPA';

    /**
     * Pail (XPL)
     *
     * Pail
     */
    case REC21_PAIL = 'XPL';

    /**
     * Pallet (XPX)
     *
     * Platform or open-ended box, usually made of wood, on which goods are
     * retained for ease of mechanical handling during transport and storage.
     */
    case REC21_PALLET = 'XPX';

    /**
     * Pallet 60 X 100 cm (XOR)
     *
     * Pallet with dimensions 60 X 100 cm.
     */
    case REC21_PALL__X__CM = 'XOR';

    /**
     * Pallet ISO 0 - 1/2 EURO Pallet (XOG)
     *
     * Standard pallet with dimensions 80 X 60 cm.
     */
    case REC21_PALL_ISO___EURO_PALL = 'XOG';

    /**
     * Pallet with exceptional dimensions (XO6)
     *
     * Pallet with non-standard dimensions
     */
    case REC21_PALL_WITH_EXCE_DIME = 'XO6';

    /**
     * Pallet, 100cms * 110cms (XAH)
     *
     * Standard sized pallet of dimensions 100centimeters by 110 centimeters
     * (cms).
     */
    case REC21_PALL_C_0C = 'XAH';

    /**
     * Pallet, AS 4068-1993 (XOD)
     *
     * Australian standard pallet of dimensions 116.5 centimeters x 116.5
     * centimeters.
     */
    case REC21_PALL_AS = 'XOD';

    /**
     * Pallet, box Combined open-ended box and pallet (XPB)
     *
     * Pallet, box Combined open-ended box and pallet
     */
    case REC21_PALL_BOX_COMB_OPEN_BOX_AND_PALL = 'XPB';

    /**
     * Pallet, CHEP 100 cm x 120 cm (XOC)
     *
     * Commonwealth Handling Equipment Pool (CHEP) standard pallet of dimensions
     * 100 centimeters x 120 centimeters.
     */
    case REC21_PALL_CHEP__CM_X_0_CM = 'XOC';

    /**
     * Pallet, CHEP 40 cm x 60 cm (XOA)
     *
     * Commonwealth Handling Equipment Pool (CHEP) standard pallet of dimensions
     * 40 centimeters x 60 centimeters.
     */
    case REC21_PALL_CHEP__CM_X__CM = 'XOA';

    /**
     * Pallet, ISO T11 (XOE)
     *
     * ISO standard pallet of dimensions 110 centimeters x 110 centimeters,
     * prevalent in Asia - Pacific region.
     */
    case REC21_PALL_ISO_T = 'XOE';

    /**
     * Pallet, modular, collars 80cms * 100cms (XPD)
     *
     * Standard sized pallet of dimensions 80 centimeters by 100 centimeters
     * (cms).
     */
    case REC21_PALL_MODU_COLL_CM_C = 'XPD';

    /**
     * Pallet, modular, collars 80cms * 60cms (XAF)
     *
     * Standard sized pallet of dimensions 80 centimeters by 60 centimeters (cms).
     */
    case REC21_PALL_MODU_COLL_CM_CM = 'XAF';

    /**
     * Pallet, shrinkwrapped (XAG)
     *
     * Pallet load secured with transparent plastic film that has been wrapped
     * around and then shrunk tightly.
     */
    case REC21_PALL_SHRI = 'XAG';

    /**
     * Pallet, triwall (XTW)
     *
     * A lightweight pallet made from heavy duty corrugated board.
     */
    case REC21_PALL_TRIW = 'XTW';

    /**
     * Pallet, wooden (X8A)
     *
     * A platform or open-ended box, made of wood, on which goods are retained for
     * ease of mechanical handling during transport and storage.
     */
    case REC21_PALL_WOOD = 'X8A';

    /**
     * Pan (XP2)
     *
     * A shallow, wide, open container, usually of metal.
     */
    case REC21_PAN = 'XP2';

    /**
     * Parcel (XPC)
     *
     * Parcel
     */
    case REC21_PARCEL = 'XPC';

    /**
     * Pen (XPF)
     *
     * A small open top enclosure for retaining animals.
     */
    case REC21_PEN = 'XPF';

    /**
     * Piece (XPP)
     *
     * A loose or unpacked article.
     */
    case REC21_PIECE = 'XPP';

    /**
     * Pipe (XPI)
     *
     * Pipe
     */
    case REC21_PIPE = 'XPI';

    /**
     * Pipes, in bundle/bunch/truss (XPV)
     *
     * Pipes, in bundle/bunch/truss
     */
    case REC21_PIPE_IN_BUND = 'XPV';

    /**
     * Pitcher (XPH)
     *
     * Pitcher
     */
    case REC21_PITCHER = 'XPH';

    /**
     * Plank (XPN)
     *
     * Plank
     */
    case REC21_PLANK = 'XPN';

    /**
     * Planks, in bundle/bunch/truss (XPZ)
     *
     * Planks, in bundle/bunch/truss
     */
    case REC21_PLAN_IN_BUND = 'XPZ';

    /**
     * Plastic pallet SRS 60 cm x 80 cm (XO8)
     *
     * SRS (Svenska Retursystem) standard synthetic pallet of dimensions 60 cm x
     * 80 cm.
     */
    case REC21_PLAS_PALL_SRS__CM_X__CM = 'XO8';

    /**
     * Plate (XPG)
     *
     * Plate
     */
    case REC21_PLATE = 'XPG';

    /**
     * Plates, in bundle/bunch/truss (XPY)
     *
     * Plates, in bundle/bunch/truss
     */
    case REC21_PLAT_IN_BUND = 'XPY';

    /**
     * Platform, unspecified weight or dimension (XOF)
     *
     * A pallet equivalent shipping platform of unknown dimensions or unknown
     * weight.
     */
    case REC21_PLAT_UNSP_WEIG_OR_DIME = 'XOF';

    /**
     * Pot (XPT)
     *
     * Pot
     */
    case REC21_POT = 'XPT';

    /**
     * Pouch (XPO)
     *
     * Pouch
     */
    case REC21_POUCH = 'XPO';

    /**
     * Punnet (XPJ)
     *
     * Punnet
     */
    case REC21_PUNNET = 'XPJ';

    /**
     * Rack (XRK)
     *
     * Rack
     */
    case REC21_RACK = 'XRK';

    /**
     * Rack, clothing hanger (XRJ)
     *
     * Rack, clothing hanger
     */
    case REC21_RACK_CLOT_HANG = 'XRJ';

    /**
     * Receptacle, fibre (XAB)
     *
     * Containment vessel made of fibre used for retaining substances or articles.
     */
    case REC21_RECE_FIBR = 'XAB';

    /**
     * Receptacle, glass (XGR)
     *
     * Containment vessel made of glass for retaining substances or articles.
     */
    case REC21_RECE_GLAS = 'XGR';

    /**
     * Receptacle, metal (XMR)
     *
     * Containment vessel made of metal for retaining substances or articles.
     */
    case REC21_RECE_META = 'XMR';

    /**
     * Receptacle, paper (XAC)
     *
     * Containment vessel made of paper for retaining substances or articles.
     */
    case REC21_RECE_PAPE = 'XAC';

    /**
     * Receptacle, plastic (XPR)
     *
     * Containment vessel made of plastic for retaining substances or articles.
     */
    case REC21_RECE_PLAS = 'XPR';

    /**
     * Receptacle, plastic wrapped (XMW)
     *
     * Containment vessel wrapped with plastic for retaining substances or
     * articles.
     */
    case REC21_RECE_PLAS_WRAP = 'XMW';

    /**
     * Receptacle, wooden (XAD)
     *
     * Containment vessel made of wood for retaining substances or articles.
     */
    case REC21_RECE_WOOD = 'XAD';

    /**
     * Rednet (XRT)
     *
     * Containment material made of red mesh netting for retaining articles (e.g.
     * trees).
     */
    case REC21_REDNET = 'XRT';

    /**
     * Reel (XRL)
     *
     * Cylindrical rotatory device with a rim at each end on which materials are
     * wound.
     */
    case REC21_REEL = 'XRL';

    /**
     * Returnable pallet (XOV)
     *
     * Pallet must be returned to the point of expedition.
     */
    case REC21_RETU_PALL = 'XOV';

    /**
     * Ring (XRG)
     *
     * Ring
     */
    case REC21_RING = 'XRG';

    /**
     * Rod (XRD)
     *
     * Rod
     */
    case REC21_ROD = 'XRD';

    /**
     * Rods, in bundle/bunch/truss (XRZ)
     *
     * Rods, in bundle/bunch/truss
     */
    case REC21_RODS_IN_BUND = 'XRZ';

    /**
     * Roll (XRO)
     *
     * Roll
     */
    case REC21_ROLL = 'XRO';

    /**
     * Sachet (XSH)
     *
     * Sachet
     */
    case REC21_SACHET = 'XSH';

    /**
     * Sack (XSA)
     *
     * Sack
     */
    case REC21_SACK = 'XSA';

    /**
     * Sack, multi-wall (XMS)
     *
     * Sack, multi-wall
     */
    case REC21_SACK_MULT = 'XMS';

    /**
     * Sea-chest (XSE)
     *
     * Sea-chest
     */
    case REC21_SEACHEST = 'XSE';

    /**
     * Sheet (XST)
     *
     * Sheet
     */
    case REC21_SHEET = 'XST';

    /**
     * Sheet, plastic wrapping (XSP)
     *
     * Sheet, plastic wrapping
     */
    case REC21_SHEE_PLAS_WRAP = 'XSP';

    /**
     * Sheetmetal (XSM)
     *
     * Sheetmetal
     */
    case REC21_SHEETMETAL = 'XSM';

    /**
     * Sheets, in bundle/bunch/truss (XSZ)
     *
     * Sheets, in bundle/bunch/truss
     */
    case REC21_SHEE_IN_BUND = 'XSZ';

    /**
     * Shrinkwrapped (XSW)
     *
     * Goods retained in a transparent plastic film that has been wrapped around
     * and then shrunk tightly on to the goods.
     */
    case REC21_SHRINKWRAPPED = 'XSW';

    /**
     * Skid (XSI)
     *
     * A low movable platform or pallet to facilitate the handling and transport
     * of goods.
     */
    case REC21_SKID = 'XSI';

    /**
     * Slab (XSB)
     *
     * Slab
     */
    case REC21_SLAB = 'XSB';

    /**
     * Sleeve (XSY)
     *
     * Sleeve
     */
    case REC21_SLEEVE = 'XSY';

    /**
     * Slipsheet (XSL)
     *
     * Hard plastic sheeting primarily used as the base on which to stack goods to
     * optimise the space within a container. May be used as an alternative to a
     * palletized packaging.
     */
    case REC21_SLIPSHEET = 'XSL';

    /**
     * Spindle (XSD)
     *
     * Spindle
     */
    case REC21_SPINDLE = 'XSD';

    /**
     * Spool (XSO)
     *
     * A packaging container used in the transport of such items as wire, cable,
     * tape and yarn.
     */
    case REC21_SPOOL = 'XSO';

    /**
     * Suitcase (XSU)
     *
     * Suitcase
     */
    case REC21_SUITCASE = 'XSU';

    /**
     * Synthetic pallet ISO 1 (XOM)
     *
     * A standard pallet with standard dimensions 80 x 120cm made of a synthetic
     * material for hygienic reasons.
     */
    case REC21_SYNT_PALL_ISO = 'XOM';

    /**
     * Tablet (XT1)
     *
     * A loose or unpacked article in the form of a bar, block or piece.
     */
    case REC21_TABLET = 'XT1';

    /**
     * Tank container, generic (XTG)
     *
     * A specially constructed container for transporting liquids and gases in
     * bulk.
     */
    case REC21_TANK_CONT_GENE = 'XTG';

    /**
     * Tank, cylindrical (XTY)
     *
     * Tank, cylindrical
     */
    case REC21_TANK_CYLI = 'XTY';

    /**
     * Tank, rectangular (XTK)
     *
     * Tank, rectangular
     */
    case REC21_TANK_RECT = 'XTK';

    /**
     * Tea-chest (XTC)
     *
     * Tea-chest
     */
    case REC21_TEACHEST = 'XTC';

    /**
     * Tierce (XTI)
     *
     * Tierce
     */
    case REC21_TIERCE = 'XTI';

    /**
     * Tin (XTN)
     *
     * Tin
     */
    case REC21_TIN = 'XTN';

    /**
     * Tray (XPU)
     *
     * Tray
     */
    case REC21_TRAY = 'XPU';

    /**
     * Tray, containing horizontally stacked flat items (XGU)
     *
     * Tray containing flat items stacked on top of one another.
     */
    case REC21_TRAY_CONT_HORI_STAC_FLAT_ITEM = 'XGU';

    /**
     * Tray, one layer no cover, cardboard (XDV)
     *
     * Tray, one layer no cover, cardboard
     */
    case REC21_TRAY_ONE_LAYE_NO_COVE_CARD = 'XDV';

    /**
     * Tray, one layer no cover, plastic (XDS)
     *
     * Tray, one layer no cover, plastic
     */
    case REC21_TRAY_ONE_LAYE_NO_COVE_PLAS = 'XDS';

    /**
     * Tray, one layer no cover, polystyrene (XDU)
     *
     * Tray, one layer no cover, polystyrene
     */
    case REC21_TRAY_ONE_LAYE_NO_COVE_POLY = 'XDU';

    /**
     * Tray, one layer no cover, wooden (XDT)
     *
     * Tray, one layer no cover, wooden
     */
    case REC21_TRAY_ONE_LAYE_NO_COVE_WOOD = 'XDT';

    /**
     * Tray, rigid, lidded stackable (CEN TS 14482:2002) (XIL)
     *
     * Lidded stackable rigid tray compliant with CEN TS 14482:2002.
     */
    case REC21_TRAY_RIGI_LIDD_STAC_CEN_TS = 'XIL';

    /**
     * Tray, two layers no cover, cardboard (XDY)
     *
     * Tray, two layers no cover, cardboard
     */
    case REC21_TRAY_TWO_LAYE_NO_COVE_CARD = 'XDY';

    /**
     * Tray, two layers no cover, plastic tray (XDW)
     *
     * Tray, two layers no cover, plastic tray
     */
    case REC21_TRAY_TWO_LAYE_NO_COVE_PLAS_TRAY = 'XDW';

    /**
     * Tray, two layers no cover, wooden (XDX)
     *
     * Tray, two layers no cover, wooden
     */
    case REC21_TRAY_TWO_LAYE_NO_COVE_WOOD = 'XDX';

    /**
     * Trolley (XO2)
     *
     * A low cart for the transportation and storage of groceries, milk, etc.
     */
    case REC21_TROLLEY = 'XO2';

    /**
     * Trunk (XTR)
     *
     * Trunk
     */
    case REC21_TRUNK = 'XTR';

    /**
     * Truss (XTS)
     *
     * Truss
     */
    case REC21_TRUSS = 'XTS';

    /**
     * Tub (XTB)
     *
     * Tub
     */
    case REC21_TUB = 'XTB';

    /**
     * Tub, with lid (XTL)
     *
     * Tub, with lid
     */
    case REC21_TUB_WITH_LID = 'XTL';

    /**
     * Tube (XTU)
     *
     * Tube
     */
    case REC21_TUBE = 'XTU';

    /**
     * Tube, collapsible (XTD)
     *
     * Tube, collapsible
     */
    case REC21_TUBE_COLL = 'XTD';

    /**
     * Tube, with nozzle (XTV)
     *
     * A tube made of plastic, metal or cardboard fitted with a nozzle, containing
     * a liquid or semi-liquid product, e.g. silicon.
     */
    case REC21_TUBE_WITH_NOZZ = 'XTV';

    /**
     * Tubes, in bundle/bunch/truss (XTZ)
     *
     * Tubes, in bundle/bunch/truss
     */
    case REC21_TUBE_IN_BUND = 'XTZ';

    /**
     * Tun (XTO)
     *
     * Tun
     */
    case REC21_TUN = 'XTO';

    /**
     * Two sided cage on wheels with fixing strap (XO1)
     *
     * A two sided cage mounted on wheels with fixing strap. Dimensions: 900 x 770
     * x 1513 cm (length x width x height).
     */
    case REC21_TWO_SIDE_CAGE_ON_WHEE_WITH_FIXI_STRA = 'XO1';

    /**
     * Tyre (XTE)
     *
     * A ring made of rubber and/or metal surrounding a wheel.
     */
    case REC21_TYRE = 'XTE';

    /**
     * Uncaged (XUC)
     *
     * Uncaged
     */
    case REC21_UNCAGED = 'XUC';

    /**
     * Unit (XUN)
     *
     * A type of package composed of a single item or object, not otherwise
     * specified as a unit of transport equipment.
     */
    case REC21_UNIT = 'XUN';

    /**
     * Unpacked or unpackaged (XNE)
     *
     * Unpacked or unpackaged
     */
    case REC21_UNPA_OR_UNPA = 'XNE';

    /**
     * Unpacked or unpackaged, multiple units (XNG)
     *
     * Unpacked or unpackaged, multiple units
     */
    case REC21_UNPA_OR_UNPA_MULT_UNIT = 'XNG';

    /**
     * Unpacked or unpackaged, single unit (XNF)
     *
     * Unpacked or unpackaged, single unit
     */
    case REC21_UNPA_OR_UNPA_SING_UNIT = 'XNF';

    /**
     * Vacuum-packed (XVP)
     *
     * Vacuum-packed
     */
    case REC21_VACUUMPACKED = 'XVP';

    /**
     * Vanpack (XVK)
     *
     * A type of wooden crate.
     */
    case REC21_VANPACK = 'XVK';

    /**
     * Vat (XVA)
     *
     * Vat
     */
    case REC21_VAT = 'XVA';

    /**
     * Vehicle (XVN)
     *
     * A self-propelled means of conveyance.
     */
    case REC21_VEHICLE = 'XVN';

    /**
     * Vial (XVI)
     *
     * Vial
     */
    case REC21_VIAL = 'XVI';

    /**
     * Wheeled pallet with raised rim ( 81 x 60 x 16) (XOZ)
     *
     * A wheeled pallet with raised rim for the storing and transporting of loads.
     * Dimensions: 81 x 60 x 16 cm (length x width x height).
     */
    case REC21_WHEE_PALL_WITH_RAIS_RIM__X__X_6 = 'XOZ';

    /**
     * Wholesaler pallet (XOP)
     *
     * Pallet provided by the wholesaler.
     */
    case REC21_WHOL_PALL = 'XOP';

    /**
     * Wickerbottle (XWB)
     *
     * Wickerbottle
     */
    case REC21_WICKERBOTTLE = 'XWB';

    /**
     * Wooden pallet 40 cm x 80 cm (XO7)
     *
     * Wooden pallet with dimensions 40 cm x 80 cm.
     */
    case REC21_WOOD_PALL__CM_X__CM = 'XO7';

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
            InvoiceSuiteCodelistUnitCodes::REC20_DA_MONT => "30-day month",
            InvoiceSuiteCodelistUnitCodes::REC20_PAR_CLOU_COVE => "8-part cloud cover",
            InvoiceSuiteCodelistUnitCodes::REC20_ACCE_LINE => "access line",
            InvoiceSuiteCodelistUnitCodes::REC20_ACCO_UNIT => "accounting unit",
            InvoiceSuiteCodelistUnitCodes::REC20_ACRE => "acre",
            InvoiceSuiteCodelistUnitCodes::REC20_ACRE_BASE_ON_US_SURV_FOOT => "acre-foot (based on U.S. survey foot)",
            InvoiceSuiteCodelistUnitCodes::REC20_ACTI_UNIT => "active unit",
            InvoiceSuiteCodelistUnitCodes::REC20_ACTIVITY => "activity",
            InvoiceSuiteCodelistUnitCodes::REC20_ACTUAL => "actual/360",
            InvoiceSuiteCodelistUnitCodes::REC20_ADDI_MINU => "additional minute",
            InvoiceSuiteCodelistUnitCodes::REC20_AIR_DRY_METR_TON => "air dry metric ton",
            InvoiceSuiteCodelistUnitCodes::REC20_AIR_DRY_TON => "air dry ton",
            InvoiceSuiteCodelistUnitCodes::REC20_ALCO_STRE_BY_MASS => "alcoholic strength by mass",
            InvoiceSuiteCodelistUnitCodes::REC20_ALCO_STRE_BY_VOLU => "alcoholic strength by volume",
            InvoiceSuiteCodelistUnitCodes::REC20_AMER_WIRE_GAUG => "american wire gauge",
            InvoiceSuiteCodelistUnitCodes::REC20_AMPERE => "ampere",
            InvoiceSuiteCodelistUnitCodes::REC20_AMPE_HOUR => "ampere hour",
            InvoiceSuiteCodelistUnitCodes::REC20_AMPE_MINU => "ampere minute",
            InvoiceSuiteCodelistUnitCodes::REC20_AMPE_PER_CENT => "ampere per centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_AMPE_PER_KILO => "ampere per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_AMPE_PER_METR => "ampere per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_AMPE_PER_MILL => "ampere per millimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_AMPE_PER_PASC => "ampere per pascal",
            InvoiceSuiteCodelistUnitCodes::REC20_AMPE_PER_SQUA_CENT => "ampere per square centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_AMPE_PER_SQUA_METR => "ampere per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_AMPE_PER_SQUA_METR_KELV_SQUA => "ampere per square metre kelvin squared",
            InvoiceSuiteCodelistUnitCodes::REC20_AMPE_PER_SQUA_MILL => "ampere per square millimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_AMPE_SECO => "ampere second",
            InvoiceSuiteCodelistUnitCodes::REC20_AMPE_SQUA_METR => "ampere square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_AMPE_SQUA_METR_PER_JOUL_SECO => "ampere square metre per joule second",
            InvoiceSuiteCodelistUnitCodes::REC20_AMPE_SQUA_SECO => "ampere squared second",
            InvoiceSuiteCodelistUnitCodes::REC20_ANGSTROM => "angstrom",
            InvoiceSuiteCodelistUnitCodes::REC20_ANTI_FACT_AHF_UNIT => "anti-hemophilic factor (AHF) unit",
            InvoiceSuiteCodelistUnitCodes::REC20_ASSEMBLY => "assembly",
            InvoiceSuiteCodelistUnitCodes::REC20_ASSORTMENT => "assortment",
            InvoiceSuiteCodelistUnitCodes::REC20_ASTR_UNIT => "astronomical unit",
            InvoiceSuiteCodelistUnitCodes::REC20_ATTOFARAD => "attofarad",
            InvoiceSuiteCodelistUnitCodes::REC20_ATTOJOULE => "attojoule",
            InvoiceSuiteCodelistUnitCodes::REC20_AVER_MINU_PER_CALL => "average minute per call",
            InvoiceSuiteCodelistUnitCodes::REC20_BALL => "ball",
            InvoiceSuiteCodelistUnitCodes::REC20_BAR_UNIT_OF_PRES => "bar [unit of pressure]",
            InvoiceSuiteCodelistUnitCodes::REC20_BAR_CUBI_METR_PER_SECO => "bar cubic metre per second",
            InvoiceSuiteCodelistUnitCodes::REC20_BAR_LITR_PER_SECO => "bar litre per second",
            InvoiceSuiteCodelistUnitCodes::REC20_BAR_PER_BAR => "bar per bar",
            InvoiceSuiteCodelistUnitCodes::REC20_BAR_PER_KELV => "bar per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_BARN => "barn",
            InvoiceSuiteCodelistUnitCodes::REC20_BARN_PER_ELEC => "barn per electronvolt",
            InvoiceSuiteCodelistUnitCodes::REC20_BARN_PER_STER => "barn per steradian",
            InvoiceSuiteCodelistUnitCodes::REC20_BARN_PER_STER_ELEC => "barn per steradian electronvolt",
            InvoiceSuiteCodelistUnitCodes::REC20_BARR_UK_PETR => "barrel (UK petroleum)",
            InvoiceSuiteCodelistUnitCodes::REC20_BARR_UK_PETR_PER_DAY => "barrel (UK petroleum) per day",
            InvoiceSuiteCodelistUnitCodes::REC20_BARR_UK_PETR_PER_HOUR => "barrel (UK petroleum) per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_BARR_UK_PETR_PER_MINU => "barrel (UK petroleum) per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_BARR_UK_PETR_PER_SECO => "barrel (UK petroleum) per second",
            InvoiceSuiteCodelistUnitCodes::REC20_BARR_US_PETR_PER_HOUR => "barrel (US petroleum) per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_BARR_US_PETR_PER_SECO => "barrel (US petroleum) per second",
            InvoiceSuiteCodelistUnitCodes::REC20_BARR_US => "barrel (US)",
            InvoiceSuiteCodelistUnitCodes::REC20_BARR_US_PER_DAY => "barrel (US) per day",
            InvoiceSuiteCodelistUnitCodes::REC20_BARR_US_PER_MINU => "barrel (US) per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_BARR_IMPE => "barrel, imperial",
            InvoiceSuiteCodelistUnitCodes::REC20_BASE_BOX => "base box",
            InvoiceSuiteCodelistUnitCodes::REC20_BATCH => "batch",
            InvoiceSuiteCodelistUnitCodes::REC20_BATT_POUN => "batting pound",
            InvoiceSuiteCodelistUnitCodes::REC20_BAUD => "baud",
            InvoiceSuiteCodelistUnitCodes::REC20_BEAT_PER_MINU => "beats per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_BEAUFORT => "Beaufort",
            InvoiceSuiteCodelistUnitCodes::REC20_BECQUEREL => "becquerel",
            InvoiceSuiteCodelistUnitCodes::REC20_BECQ_PER_CUBI_METR => "becquerel per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_BECQ_PER_KILO => "becquerel per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_BEL => "bel",
            InvoiceSuiteCodelistUnitCodes::REC20_BEL_PER_METR => "bel per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_BIG_POIN => "big point",
            InvoiceSuiteCodelistUnitCodes::REC20_BILL_EUR => "billion (EUR)",
            InvoiceSuiteCodelistUnitCodes::REC20_BIOT => "biot",
            InvoiceSuiteCodelistUnitCodes::REC20_BIT => "bit",
            InvoiceSuiteCodelistUnitCodes::REC20_BIT_PER_CUBI_METR => "bit per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_BIT_PER_METR => "bit per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_BIT_PER_SECO => "bit per second",
            InvoiceSuiteCodelistUnitCodes::REC20_BIT_PER_SQUA_METR => "bit per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_BLANK => "blank",
            InvoiceSuiteCodelistUnitCodes::REC20_BOAR_FOOT => "board foot",
            InvoiceSuiteCodelistUnitCodes::REC20_BOOK => "book",
            InvoiceSuiteCodelistUnitCodes::REC20_BRAK_HORS_POWE => "brake horse power",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT__F => "British thermal unit (39 ºF)",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT__F => "British thermal unit (59 ºF)",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT__F => "British thermal unit (60 ºF)",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_INTE_TABL => "British thermal unit (international table)",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_INTE_TABL_FOOT_PER_HOUR_FOOT_DEGR_FAHR => "British thermal unit (international table) foot per hour square foot degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_INTE_TABL_INCH_PER_HOUR_SQUA_DEGR_FAHR => "British thermal unit (international table) inch per hour square foot degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_INTE_TABL_INCH_PER_SECO_SQUA_DEGR_FAHR => "British thermal unit (international table) inch per second square foot degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_INTE_TABL_PER_CUBI_FOOT => "British thermal unit (international table) per cubic foot",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_INTE_TABL_PER_DEGR_FAHR => "British thermal unit (international table) per degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_INTE_TABL_PER_DEGR_RANK => "British thermal unit (international table) per degree Rankine",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_INTE_TABL_PER_HOUR => "British thermal unit (international table) per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_INTE_TABL_PER_HOUR_SQUA_FOOT_DEGR_FAHR => "British thermal unit (international table) per hour square foot degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_INTE_TABL_PER_HOUR_SQUA_FOOT_DEGR_RANK => "British thermal unit (international table) per hour square foot degree Rankine",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_INTE_TABL_PER_MINU => "British thermal unit (international table) per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_INTE_TABL_PER_POUN => "British thermal unit (international table) per pound",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_INTE_TABL_PER_POUN_DEGR_FAHR => "British thermal unit (international table) per pound degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_INTE_TABL_PER_POUN_DEGR_RANK => "British thermal unit (international table) per pound degree Rankine",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_INTE_TABL_PER_SECO => "British thermal unit (international table) per second",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_INTE_TABL_PER_SECO_FOOT_DEGR_RANK => "British thermal unit (international table) per second foot degree Rankine",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_INTE_TABL_PER_SECO_SQUA_FOOT_DEGR_FAHR => "British thermal unit (international table) per second square foot degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_INTE_TABL_PER_SECO_SQUA_FOOT_DEGR_RANK => "British thermal unit (international table) per second square foot degree Rankine",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_INTE_TABL_PER_SQUA_FOOT => "British thermal unit (international table) per square foot",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_INTE_TABL_PER_SQUA_FOOT_HOUR => "British thermal unit (international table) per square foot hour",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_INTE_TABL_PER_SQUA_FOOT_SECO => "British thermal unit (international table) per square foot second",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_INTE_TABL_PER_SQUA_INCH_SECO => "British thermal unit (international table) per square inch second",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_MEAN => "British thermal unit (mean)",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_THER_FOOT_PER_HOUR_SQUA_DEGR_FAHR => "British thermal unit (thermochemical) foot per hour square foot degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_THER_INCH_PER_HOUR_SQUA_DEGR_FAHR => "British thermal unit (thermochemical) inch per hour square foot degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_THER_INCH_PER_SECO_FOOT_DEGR_FAHR => "British thermal unit (thermochemical) inch per second square foot degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_THER_PER_CUBI_FOOT => "British thermal unit (thermochemical) per cubic foot",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_THER_PER_DEGR_FAHR => "British thermal unit (thermochemical) per degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_THER_PER_DEGR_RANK => "British thermal unit (thermochemical) per degree Rankine",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_THER_PER_HOUR => "British thermal unit (thermochemical) per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_THER_PER_HOUR_SQUA_FOOT_DEGR_FAHR => "British thermal unit (thermochemical) per hour square foot degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_THER_PER_MINU => "British thermal unit (thermochemical) per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_THER_PER_POUN => "British thermal unit (thermochemical) per pound",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_THER_PER_POUN_DEGR_FAHR => "British thermal unit (thermochemical) per pound degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_THER_PER_POUN_DEGR_RANK => "British thermal unit (thermochemical) per pound degree Rankine",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_THER_PER_SECO => "British thermal unit (thermochemical) per second",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_THER_PER_SECO_SQUA_FOOT_DEGR_FAHR => "British thermal unit (thermochemical) per second square foot degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_THER_PER_SQUA_FOOT => "British thermal unit (thermochemical) per square foot",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_THER_PER_SQUA_FOOT_HOUR => "British thermal unit (thermochemical) per square foot hour",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_THER_PER_SQUA_FOOT_MINU => "British thermal unit (thermochemical) per square foot minute",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_THER_PER_SQUA_FOOT_SECO => "British thermal unit (thermochemical) per square foot second",
            InvoiceSuiteCodelistUnitCodes::REC20_BULK_PACK => "bulk pack",
            InvoiceSuiteCodelistUnitCodes::REC20_BUSH_UK => "bushel (UK)",
            InvoiceSuiteCodelistUnitCodes::REC20_BUSH_UK_PER_DAY => "bushel (UK) per day",
            InvoiceSuiteCodelistUnitCodes::REC20_BUSH_UK_PER_HOUR => "bushel (UK) per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_BUSH_UK_PER_MINU => "bushel (UK) per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_BUSH_UK_PER_SECO => "bushel (UK) per second",
            InvoiceSuiteCodelistUnitCodes::REC20_BUSH_US_DRY_PER_DAY => "bushel (US dry) per day",
            InvoiceSuiteCodelistUnitCodes::REC20_BUSH_US_DRY_PER_HOUR => "bushel (US dry) per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_BUSH_US_DRY_PER_MINU => "bushel (US dry) per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_BUSH_US_DRY_PER_SECO => "bushel (US dry) per second",
            InvoiceSuiteCodelistUnitCodes::REC20_BUSH_US => "bushel (US)",
            InvoiceSuiteCodelistUnitCodes::REC20_BYTE => "byte",
            InvoiceSuiteCodelistUnitCodes::REC20_BYTE_PER_SECO => "byte per second",
            InvoiceSuiteCodelistUnitCodes::REC20_CAKE => "cake",
            InvoiceSuiteCodelistUnitCodes::REC20_CALL => "call",
            InvoiceSuiteCodelistUnitCodes::REC20_CALO__C => "calorie (20 ºC)",
            InvoiceSuiteCodelistUnitCodes::REC20_CALO_INTE_TABL_PER_GRAM_DEGR_CELS => "calorie (international table) per gram degree Celsius",
            InvoiceSuiteCodelistUnitCodes::REC20_CALO_MEAN => "calorie (mean)",
            InvoiceSuiteCodelistUnitCodes::REC20_CALO_THER_PER_CENT_SECO_DEGR_CELS => "calorie (thermochemical) per centimetre second degree Celsius",
            InvoiceSuiteCodelistUnitCodes::REC20_CALO_THER_PER_GRAM_DEGR_CELS => "calorie (thermochemical) per gram degree Celsius",
            InvoiceSuiteCodelistUnitCodes::REC20_CALO_THER_PER_MINU => "calorie (thermochemical) per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_CALO_THER_PER_SECO => "calorie (thermochemical) per second",
            InvoiceSuiteCodelistUnitCodes::REC20_CALO_THER_PER_SQUA_CENT => "calorie (thermochemical) per square centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_CALO_THER_PER_SQUA_CENT_MINU => "calorie (thermochemical) per square centimetre minute",
            InvoiceSuiteCodelistUnitCodes::REC20_CALO_THER_PER_SQUA_CENT_SECO => "calorie (thermochemical) per square centimetre second",
            InvoiceSuiteCodelistUnitCodes::REC20_CANDELA => "candela",
            InvoiceSuiteCodelistUnitCodes::REC20_CAND_PER_SQUA_FOOT => "candela per square foot",
            InvoiceSuiteCodelistUnitCodes::REC20_CAND_PER_SQUA_INCH => "candela per square inch",
            InvoiceSuiteCodelistUnitCodes::REC20_CAND_PER_SQUA_METR => "candela per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_CARD => "card",
            InvoiceSuiteCodelistUnitCodes::REC20_CARR_CAPA_IN_METR_TON => "carrying capacity in metric ton",
            InvoiceSuiteCodelistUnitCodes::REC20_CENT_UK => "cental (UK)",
            InvoiceSuiteCodelistUnitCodes::REC20_CENTIGRAM => "centigram",
            InvoiceSuiteCodelistUnitCodes::REC20_CENTILITRE => "centilitre",
            InvoiceSuiteCodelistUnitCodes::REC20_CENTIMETRE => "centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_CENT_OF_MERC__C => "centimetre of mercury (0 ºC)",
            InvoiceSuiteCodelistUnitCodes::REC20_CENT_OF_WATE__C => "centimetre of water (4 ºC)",
            InvoiceSuiteCodelistUnitCodes::REC20_CENT_PER_BAR => "centimetre per bar",
            InvoiceSuiteCodelistUnitCodes::REC20_CENT_PER_HOUR => "centimetre per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_CENT_PER_KELV => "centimetre per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_CENT_PER_SECO => "centimetre per second",
            InvoiceSuiteCodelistUnitCodes::REC20_CENT_PER_SECO_BAR => "centimetre per second bar",
            InvoiceSuiteCodelistUnitCodes::REC20_CENT_PER_SECO_KELV => "centimetre per second kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_CENT_PER_SECO_SQUA => "centimetre per second squared",
            InvoiceSuiteCodelistUnitCodes::REC20_CENT_METR => "centinewton metre",
            InvoiceSuiteCodelistUnitCodes::REC20_CENTIPOISE => "centipoise",
            InvoiceSuiteCodelistUnitCodes::REC20_CENT_PER_BAR => "centipoise per bar",
            InvoiceSuiteCodelistUnitCodes::REC20_CENT_PER_KELV => "centipoise per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_CENTISTOKES => "centistokes",
            InvoiceSuiteCodelistUnitCodes::REC20_CHAI_BASE_ON_US_SURV_FOOT => "chain (based on U.S. survey foot)",
            InvoiceSuiteCodelistUnitCodes::REC20_CIRC_MIL => "circular mil",
            InvoiceSuiteCodelistUnitCodes::REC20_CLO => "clo",
            InvoiceSuiteCodelistUnitCodes::REC20_COIL_GROU => "coil group",
            InvoiceSuiteCodelistUnitCodes::REC20_COMM_YEAR => "common year",
            InvoiceSuiteCodelistUnitCodes::REC20_CONT_GRAM => "content gram",
            InvoiceSuiteCodelistUnitCodes::REC20_CONT_TON_METR => "content ton (metric)",
            InvoiceSuiteCodelistUnitCodes::REC20_CONV_METR_OF_WATE => "conventional metre of water",
            InvoiceSuiteCodelistUnitCodes::REC20_CORD => "cord",
            InvoiceSuiteCodelistUnitCodes::REC20_CORD__FT => "cord (128 ft3)",
            InvoiceSuiteCodelistUnitCodes::REC20_COULOMB => "coulomb",
            InvoiceSuiteCodelistUnitCodes::REC20_COUL_METR => "coulomb metre",
            InvoiceSuiteCodelistUnitCodes::REC20_COUL_METR_SQUA_PER_VOLT => "coulomb metre squared per volt",
            InvoiceSuiteCodelistUnitCodes::REC20_COUL_PER_CUBI_CENT => "coulomb per cubic centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_COUL_PER_CUBI_METR => "coulomb per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_COUL_PER_CUBI_MILL => "coulomb per cubic millimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_COUL_PER_KILO => "coulomb per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_COUL_PER_KILO_SECO => "coulomb per kilogram second",
            InvoiceSuiteCodelistUnitCodes::REC20_COUL_PER_METR => "coulomb per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_COUL_PER_MOLE => "coulomb per mole",
            InvoiceSuiteCodelistUnitCodes::REC20_COUL_PER_SQUA_CENT => "coulomb per square centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_COUL_PER_SQUA_METR => "coulomb per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_COUL_PER_SQUA_MILL => "coulomb per square millimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_COUL_SQUA_METR_PER_KILO => "coulomb square metre per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_CREDIT => "credit",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_CENT => "cubic centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_CENT_PER_BAR => "cubic centimetre per bar",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_CENT_PER_CUBI_METR => "cubic centimetre per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_CENT_PER_DAY => "cubic centimetre per day",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_CENT_PER_DAY_BAR => "cubic centimetre per day bar",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_CENT_PER_DAY_KELV => "cubic centimetre per day kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_CENT_PER_HOUR => "cubic centimetre per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_CENT_PER_HOUR_BAR => "cubic centimetre per hour bar",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_CENT_PER_HOUR_KELV => "cubic centimetre per hour kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_CENT_PER_KELV => "cubic centimetre per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_CENT_PER_MINU => "cubic centimetre per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_CENT_PER_MINU_BAR => "cubic centimetre per minute bar",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_CENT_PER_MINU_KELV => "cubic centimetre per minute kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_CENT_PER_MOLE => "cubic centimetre per mole",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_CENT_PER_SECO => "cubic centimetre per second",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_CENT_PER_SECO_BAR => "cubic centimetre per second bar",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_CENT_PER_SECO_KELV => "cubic centimetre per second kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_DECA => "cubic decametre",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_DECI => "cubic decimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_DECI_PER_CUBI_METR => "cubic decimetre per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_DECI_PER_DAY => "cubic decimetre per day",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_DECI_PER_HOUR => "cubic decimetre per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_DECI_PER_KILO => "cubic decimetre per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_DECI_PER_MINU => "cubic decimetre per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_DECI_PER_MOLE => "cubic decimetre per mole",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_DECI_PER_SECO => "cubic decimetre per second",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_FOOT => "cubic foot",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_FOOT_PER_DAY => "cubic foot per day",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_FOOT_PER_DEGR_FAHR => "cubic foot per degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_FOOT_PER_HOUR => "cubic foot per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_FOOT_PER_MINU => "cubic foot per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_FOOT_PER_POUN => "cubic foot per pound",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_FOOT_PER_PSI => "cubic foot per psi",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_FOOT_PER_SECO => "cubic foot per second",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_HECT => "cubic hectometre",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_INCH => "cubic inch",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_INCH_PER_HOUR => "cubic inch per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_INCH_PER_MINU => "cubic inch per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_INCH_PER_POUN => "cubic inch per pound",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_INCH_PER_SECO => "cubic inch per second",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_KILO => "cubic kilometre",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_METR => "cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_METR_DAY => "Cubic Metre Day",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_METR_MONT => "Cubic Metre Month",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_METR_PER_BAR => "cubic metre per bar",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_METR_PER_COUL => "cubic metre per coulomb",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_METR_PER_CUBI_METR => "cubic metre per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_METR_PER_DAY => "cubic metre per day",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_METR_PER_DAY_BAR => "cubic metre per day bar",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_METR_PER_DAY_KELV => "cubic metre per day kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_METR_PER_HOUR => "cubic metre per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_METR_PER_HOUR_BAR => "cubic metre per hour bar",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_METR_PER_HOUR_KELV => "cubic metre per hour kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_METR_PER_KELV => "cubic metre per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_METR_PER_KILO => "cubic metre per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_METR_PER_MINU => "cubic metre per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_METR_PER_MINU_BAR => "cubic metre per minute bar",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_METR_PER_MINU_KELV => "cubic metre per minute kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_METR_PER_MOLE => "cubic metre per mole",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_METR_PER_PASC => "cubic metre per pascal",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_METR_PER_SECO => "cubic metre per second",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_METR_PER_SECO_BAR => "cubic metre per second bar",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_METR_PER_SECO_KELV => "cubic metre per second kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_METR_PER_SECO_PASC => "cubic metre per second pascal",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_METR_PER_SECO_SQUA_METR => "cubic metre per second square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_METR_WEEK => "Cubic Metre Week",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_MILE_UK_STAT => "cubic mile (UK statute)",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_MILL => "cubic millimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_MILL_PER_CUBI_METR => "cubic millimetre per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_YARD => "cubic yard",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_YARD_PER_DAY => "cubic yard per day",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_YARD_PER_DEGR_FAHR => "cubic yard per degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_YARD_PER_HOUR => "cubic yard per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_YARD_PER_MINU => "cubic yard per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_YARD_PER_PSI => "cubic yard per psi",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_YARD_PER_SECO => "cubic yard per second",
            InvoiceSuiteCodelistUnitCodes::REC20_CUP_UNIT_OF_VOLU => "cup [unit of volume]",
            InvoiceSuiteCodelistUnitCodes::REC20_CURIE => "curie",
            InvoiceSuiteCodelistUnitCodes::REC20_CURI_PER_KILO => "curie per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_CYCLE => "cycle",
            InvoiceSuiteCodelistUnitCodes::REC20_DAY => "day",
            InvoiceSuiteCodelistUnitCodes::REC20_DEAD_TONN => "deadweight tonnage",
            InvoiceSuiteCodelistUnitCodes::REC20_DECADE => "decade",
            InvoiceSuiteCodelistUnitCodes::REC20_DECA_LOGA => "decade (logarithmic)",
            InvoiceSuiteCodelistUnitCodes::REC20_DECAGRAM => "decagram",
            InvoiceSuiteCodelistUnitCodes::REC20_DECALITRE => "decalitre",
            InvoiceSuiteCodelistUnitCodes::REC20_DECAMETRE => "decametre",
            InvoiceSuiteCodelistUnitCodes::REC20_DECAPASCAL => "decapascal",
            InvoiceSuiteCodelistUnitCodes::REC20_DECARE => "decare",
            InvoiceSuiteCodelistUnitCodes::REC20_DECIBEL => "decibel",
            InvoiceSuiteCodelistUnitCodes::REC20_DECI_PER_KILO => "decibel per kilometre",
            InvoiceSuiteCodelistUnitCodes::REC20_DECI_PER_METR => "decibel per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_DECI_WATT => "Decibel watt",
            InvoiceSuiteCodelistUnitCodes::REC20_DECIBELMILLIWATTS => "Decibel-milliwatts",
            InvoiceSuiteCodelistUnitCodes::REC20_DECIGRAM => "decigram",
            InvoiceSuiteCodelistUnitCodes::REC20_DECILITRE => "decilitre",
            InvoiceSuiteCodelistUnitCodes::REC20_DECI_PER_GRAM => "decilitre per gram",
            InvoiceSuiteCodelistUnitCodes::REC20_DECIMETRE => "decimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_DECI_METR => "decinewton metre",
            InvoiceSuiteCodelistUnitCodes::REC20_DECITEX => "decitex",
            InvoiceSuiteCodelistUnitCodes::REC20_DECITONNE => "decitonne",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_UNIT_OF_ANGL => "degree [unit of angle]",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_UNIT_OF_ANGL_PER_SECO_SQUA => "degree [unit of angle] per second squared",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_API => "degree API",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_BALL => "degree Balling",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_BAUM_ORIG_SCAL => "degree Baume (origin scale)",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_BAUM_US_HEAV => "degree Baume (US heavy)",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_BAUM_US_LIGH => "degree Baume (US light)",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_BRIX => "degree Brix",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_CELS => "degree Celsius",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_CELS_PER_BAR => "degree Celsius per bar",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_CELS_PER_HOUR => "degree Celsius per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_CELS_PER_KELV => "degree Celsius per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_CELS_PER_MINU => "degree Celsius per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_CELS_PER_SECO => "degree Celsius per second",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_DAY => "degree day",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_FAHR => "degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_FAHR_HOUR_PER_BRIT_THER_UNIT_INTE_TABL => "degree Fahrenheit hour per British thermal unit (international table)",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_FAHR_HOUR_PER_BRIT_THER_UNIT_THER => "degree Fahrenheit hour per British thermal unit (thermochemical)",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_FAHR_HOUR_SQUA_FOOT_PER_BRIT_THER_UNIT_INTE_TABL => "degree Fahrenheit hour square foot per British thermal unit (international table)",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_FAHR_HOUR_SQUA_FOOT_PER_BRIT_THER_UNIT_INTE_TABL_INCH => "degree Fahrenheit hour square foot per British thermal unit (international table) inch",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_FAHR_HOUR_SQUA_FOOT_PER_BRIT_THER_UNIT_THER => "degree Fahrenheit hour square foot per British thermal unit (thermochemical)",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_FAHR_HOUR_SQUA_FOOT_PER_BRIT_THER_UNIT_THER_INCH => "degree Fahrenheit hour square foot per British thermal unit (thermochemical) inch",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_FAHR_PER_BAR => "degree Fahrenheit per bar",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_FAHR_PER_HOUR => "degree Fahrenheit per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_FAHR_PER_KELV => "degree Fahrenheit per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_FAHR_PER_MINU => "degree Fahrenheit per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_FAHR_PER_SECO => "degree Fahrenheit per second",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_FAHR_SECO_PER_BRIT_THER_UNIT_INTE_TABL => "degree Fahrenheit second per British thermal unit (international table)",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_FAHR_SECO_PER_BRIT_THER_UNIT_THER => "degree Fahrenheit second per British thermal unit (thermochemical)",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_OECH => "degree Oechsle",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_PER_METR => "degree per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_PER_SECO => "degree per second",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_PLAT => "degree Plato",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_RANK => "degree Rankine",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_RANK_PER_HOUR => "degree Rankine per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_RANK_PER_MINU => "degree Rankine per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_RANK_PER_SECO => "degree Rankine per second",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_TWAD => "degree Twaddell",
            InvoiceSuiteCodelistUnitCodes::REC20_DENIER => "denier",
            InvoiceSuiteCodelistUnitCodes::REC20_DENIER => "denier",
            InvoiceSuiteCodelistUnitCodes::REC20_DIGIT => "digit",
            InvoiceSuiteCodelistUnitCodes::REC20_DIOPTRE => "dioptre",
            InvoiceSuiteCodelistUnitCodes::REC20_DISP_TONN => "displacement tonnage",
            InvoiceSuiteCodelistUnitCodes::REC20_DOSE => "dose",
            InvoiceSuiteCodelistUnitCodes::REC20_DOTS_PER_INCH => "dots per inch",
            InvoiceSuiteCodelistUnitCodes::REC20_DOZEN => "dozen",
            InvoiceSuiteCodelistUnitCodes::REC20_DOZE_PACK => "dozen pack",
            InvoiceSuiteCodelistUnitCodes::REC20_DOZE_PAIR => "dozen pair",
            InvoiceSuiteCodelistUnitCodes::REC20_DOZE_PIEC => "dozen piece",
            InvoiceSuiteCodelistUnitCodes::REC20_DOZE_ROLL => "dozen roll",
            InvoiceSuiteCodelistUnitCodes::REC20_DRAM_UK => "dram (UK)",
            InvoiceSuiteCodelistUnitCodes::REC20_DRAM_US => "dram (US)",
            InvoiceSuiteCodelistUnitCodes::REC20_DRY_BARR_US => "dry barrel (US)",
            InvoiceSuiteCodelistUnitCodes::REC20_DRY_GALL_US => "dry gallon (US)",
            InvoiceSuiteCodelistUnitCodes::REC20_DRY_PINT_US => "dry pint (US)",
            InvoiceSuiteCodelistUnitCodes::REC20_DRY_POUN => "dry pound",
            InvoiceSuiteCodelistUnitCodes::REC20_DRY_QUAR_US => "dry quart (US)",
            InvoiceSuiteCodelistUnitCodes::REC20_DRY_TON => "dry ton",
            InvoiceSuiteCodelistUnitCodes::REC20_DYNE_METR => "dyne metre",
            InvoiceSuiteCodelistUnitCodes::REC20_EACH => "each",
            InvoiceSuiteCodelistUnitCodes::REC20_ELEC_MAIL_BOX => "electronic mail box",
            InvoiceSuiteCodelistUnitCodes::REC20_ELECTRONVOLT => "electronvolt",
            InvoiceSuiteCodelistUnitCodes::REC20_ELEC_PER_METR => "electronvolt per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_ELEC_SQUA_METR => "electronvolt square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_ELEC_SQUA_METR_PER_KILO => "electronvolt square metre per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_EQUI_GALL => "equivalent gallon",
            InvoiceSuiteCodelistUnitCodes::REC20_ERLANG => "erlang",
            InvoiceSuiteCodelistUnitCodes::REC20_EXAB_PER_SECO => "exabit per second",
            InvoiceSuiteCodelistUnitCodes::REC20_EXAJOULE => "exajoule",
            InvoiceSuiteCodelistUnitCodes::REC20_EXBI_PER_CUBI_METR => "exbibit per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_EXBI_PER_METR => "exbibit per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_EXBI_PER_SQUA_METR => "exbibit per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_EXBIBYTE => "exbibyte",
            InvoiceSuiteCodelistUnitCodes::REC20_FAIL_IN_TIME => "failures in time",
            InvoiceSuiteCodelistUnitCodes::REC20_FARAD => "farad",
            InvoiceSuiteCodelistUnitCodes::REC20_FARA_PER_KILO => "farad per kilometre",
            InvoiceSuiteCodelistUnitCodes::REC20_FARA_PER_METR => "farad per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_FATHOM => "fathom",
            InvoiceSuiteCodelistUnitCodes::REC20_FEMTOJOULE => "femtojoule",
            InvoiceSuiteCodelistUnitCodes::REC20_FEMTOLITRE => "femtolitre",
            InvoiceSuiteCodelistUnitCodes::REC20_FEMTOMETRE => "femtometre",
            InvoiceSuiteCodelistUnitCodes::REC20_FIBR_METR => "fibre metre",
            InvoiceSuiteCodelistUnitCodes::REC20_FIVE_PACK => "five pack",
            InvoiceSuiteCodelistUnitCodes::REC20_FIXE_RATE => "fixed rate",
            InvoiceSuiteCodelistUnitCodes::REC20_FLAK_TON => "flake ton",
            InvoiceSuiteCodelistUnitCodes::REC20_FLUI_OUNC_UK => "fluid ounce (UK)",
            InvoiceSuiteCodelistUnitCodes::REC20_FLUI_OUNC_US => "fluid ounce (US)",
            InvoiceSuiteCodelistUnitCodes::REC20_FOOT => "foot",
            InvoiceSuiteCodelistUnitCodes::REC20_FOOT_US_SURV => "foot (U.S. survey)",
            InvoiceSuiteCodelistUnitCodes::REC20_FOOT_OF_WATE__F => "foot of water (39.2 ºF)",
            InvoiceSuiteCodelistUnitCodes::REC20_FOOT_PER_DEGR_FAHR => "foot per degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_FOOT_PER_HOUR => "foot per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_FOOT_PER_MINU => "foot per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_FOOT_PER_PSI => "foot per psi",
            InvoiceSuiteCodelistUnitCodes::REC20_FOOT_PER_SECO => "foot per second",
            InvoiceSuiteCodelistUnitCodes::REC20_FOOT_PER_SECO_DEGR_FAHR => "foot per second degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_FOOT_PER_SECO_PSI => "foot per second psi",
            InvoiceSuiteCodelistUnitCodes::REC20_FOOT_PER_SECO_SQUA => "foot per second squared",
            InvoiceSuiteCodelistUnitCodes::REC20_FOOT_PER_THOU => "foot per thousand",
            InvoiceSuiteCodelistUnitCodes::REC20_FOOT_POUN => "foot pound-force",
            InvoiceSuiteCodelistUnitCodes::REC20_FOOT_POUN_PER_HOUR => "foot pound-force per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_FOOT_POUN_PER_MINU => "foot pound-force per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_FOOT_POUN_PER_SECO => "foot pound-force per second",
            InvoiceSuiteCodelistUnitCodes::REC20_FOOT_POUN => "foot poundal",
            InvoiceSuiteCodelistUnitCodes::REC20_FOOT_TO_THE_FOUR_POWE => "foot to the fourth power",
            InvoiceSuiteCodelistUnitCodes::REC20_FOOTCANDLE => "footcandle",
            InvoiceSuiteCodelistUnitCodes::REC20_FOOTLAMBERT => "footlambert",
            InvoiceSuiteCodelistUnitCodes::REC20_FORM_NEPH_UNIT => "Formazin nephelometric unit",
            InvoiceSuiteCodelistUnitCodes::REC20_FORT_FOOT_CONT => "forty foot container",
            InvoiceSuiteCodelistUnitCodes::REC20_FRANKLIN => "franklin",
            InvoiceSuiteCodelistUnitCodes::REC20_FREI_TON => "freight ton",
            InvoiceSuiteCodelistUnitCodes::REC20_FREN_GAUG => "French gauge",
            InvoiceSuiteCodelistUnitCodes::REC20_FURLONG => "furlong",
            InvoiceSuiteCodelistUnitCodes::REC20_GAL => "gal",
            InvoiceSuiteCodelistUnitCodes::REC20_GALL_UK => "gallon (UK)",
            InvoiceSuiteCodelistUnitCodes::REC20_GALL_UK_PER_DAY => "gallon (UK) per day",
            InvoiceSuiteCodelistUnitCodes::REC20_GALL_UK_PER_HOUR => "gallon (UK) per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_GALL_UK_PER_SECO => "gallon (UK) per second",
            InvoiceSuiteCodelistUnitCodes::REC20_GALL_US_LIQU_PER_SECO => "gallon (US liquid) per second",
            InvoiceSuiteCodelistUnitCodes::REC20_GALL_US => "gallon (US)",
            InvoiceSuiteCodelistUnitCodes::REC20_GALL_US_PER_DAY => "gallon (US) per day",
            InvoiceSuiteCodelistUnitCodes::REC20_GALL_US_PER_HOUR => "gallon (US) per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_GAMMA => "gamma",
            InvoiceSuiteCodelistUnitCodes::REC20_GIBIBIT => "gibibit",
            InvoiceSuiteCodelistUnitCodes::REC20_GIBI_PER_CUBI_METR => "gibibit per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_GIBI_PER_METR => "gibibit per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_GIBI_PER_SQUA_METR => "gibibit per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_GIBIBYTE => "gibibyte",
            InvoiceSuiteCodelistUnitCodes::REC20_GIGABECQUEREL => "gigabecquerel",
            InvoiceSuiteCodelistUnitCodes::REC20_GIGABIT => "gigabit",
            InvoiceSuiteCodelistUnitCodes::REC20_GIGA_PER_SECO => "gigabit per second",
            InvoiceSuiteCodelistUnitCodes::REC20_GIGABYTE => "gigabyte",
            InvoiceSuiteCodelistUnitCodes::REC20_GIGA_PER_SECO => "gigabyte per second",
            InvoiceSuiteCodelistUnitCodes::REC20_GIGA_PER_CUBI_METR => "gigacoulomb per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_GIGAELECTRONVOLT => "gigaelectronvolt",
            InvoiceSuiteCodelistUnitCodes::REC20_GIGAHERTZ => "gigahertz",
            InvoiceSuiteCodelistUnitCodes::REC20_GIGA_METR => "gigahertz metre",
            InvoiceSuiteCodelistUnitCodes::REC20_GIGAJOULE => "gigajoule",
            InvoiceSuiteCodelistUnitCodes::REC20_GIGAOHM => "gigaohm",
            InvoiceSuiteCodelistUnitCodes::REC20_GIGA_METR => "gigaohm metre",
            InvoiceSuiteCodelistUnitCodes::REC20_GIGA_PER_METR => "gigaohm per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_GIGAPASCAL => "gigapascal",
            InvoiceSuiteCodelistUnitCodes::REC20_GIGAWATT => "gigawatt",
            InvoiceSuiteCodelistUnitCodes::REC20_GIGA_HOUR => "gigawatt hour",
            InvoiceSuiteCodelistUnitCodes::REC20_GILBERT => "gilbert",
            InvoiceSuiteCodelistUnitCodes::REC20_GILL_UK => "gill (UK)",
            InvoiceSuiteCodelistUnitCodes::REC20_GILL_UK_PER_DAY => "gill (UK) per day",
            InvoiceSuiteCodelistUnitCodes::REC20_GILL_UK_PER_HOUR => "gill (UK) per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_GILL_UK_PER_MINU => "gill (UK) per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_GILL_UK_PER_SECO => "gill (UK) per second",
            InvoiceSuiteCodelistUnitCodes::REC20_GILL_US => "gill (US)",
            InvoiceSuiteCodelistUnitCodes::REC20_GILL_US_PER_DAY => "gill (US) per day",
            InvoiceSuiteCodelistUnitCodes::REC20_GILL_US_PER_HOUR => "gill (US) per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_GILL_US_PER_MINU => "gill (US) per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_GILL_US_PER_SECO => "gill (US) per second",
            InvoiceSuiteCodelistUnitCodes::REC20_GON => "gon",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAIN => "grain",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAI_PER_GALL_US => "grain per gallon (US)",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM => "gram",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_CENT_PER_SECO => "gram centimetre per second",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_MILL => "gram millimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_OF_FISS_ISOT => "gram of fissile isotope",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_BAR => "gram per bar",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_CENT_SECO => "gram per centimetre second",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_CUBI_CENT => "gram per cubic centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_CUBI_CENT_BAR => "gram per cubic centimetre bar",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_CUBI_CENT_KELV => "gram per cubic centimetre kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_CUBI_DECI => "gram per cubic decimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_CUBI_DECI_BAR => "gram per cubic decimetre bar",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_CUBI_DECI_KELV => "gram per cubic decimetre kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_CUBI_METR => "gram per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_CUBI_METR_BAR => "gram per cubic metre bar",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_CUBI_METR_KELV => "gram per cubic metre kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_DAY => "gram per day",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_DAY_BAR => "gram per day bar",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_DAY_KELV => "gram per day kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_HERT => "gram per hertz",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_HOUR => "gram per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_HOUR_BAR => "gram per hour bar",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_HOUR_KELV => "gram per hour kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_KELV => "gram per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_LITR => "gram per litre",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_LITR_BAR => "gram per litre bar",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_LITR_KELV => "gram per litre kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_METR_GRAM_PER__CENT => "gram per metre (gram per 100 centimetres)",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_MILL => "gram per millilitre",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_MILL_BAR => "gram per millilitre bar",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_MILL_KELV => "gram per millilitre kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_MILL => "gram per millimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_MINU => "gram per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_MINU_BAR => "gram per minute bar",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_MINU_KELV => "gram per minute kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_MOLE => "gram per mole",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_SECO => "gram per second",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_SECO_BAR => "gram per second bar",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_SECO_KELV => "gram per second kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_SQUA_CENT => "gram per square centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_SQUA_METR => "gram per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_SQUA_MILL => "gram per square millimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_DRY_WEIG => "gram, dry weight",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_INCL_CONT => "gram, including container",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_INCL_INNE_PACK => "gram, including inner packaging",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_SQUA_CENT => "gram-force per square centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAY => "gray",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAY_PER_HOUR => "gray per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAY_PER_MINU => "gray per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAY_PER_SECO => "gray per second",
            InvoiceSuiteCodelistUnitCodes::REC20_GREA_GROS => "great gross",
            InvoiceSuiteCodelistUnitCodes::REC20_GROSS => "gross",
            InvoiceSuiteCodelistUnitCodes::REC20_GROS_KILO => "gross kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_GROUP => "group",
            InvoiceSuiteCodelistUnitCodes::REC20_GUNT_CHAI => "Gunters chain",
            InvoiceSuiteCodelistUnitCodes::REC20_HALF_YEAR__MONT => "half year (6 months)",
            InvoiceSuiteCodelistUnitCodes::REC20_HANG_CONT => "hanging container",
            InvoiceSuiteCodelistUnitCodes::REC20_HANK => "hank",
            InvoiceSuiteCodelistUnitCodes::REC20_HARTLEY => "hartley",
            InvoiceSuiteCodelistUnitCodes::REC20_HART_PER_SECO => "hartley per second",
            InvoiceSuiteCodelistUnitCodes::REC20_HEAD => "head",
            InvoiceSuiteCodelistUnitCodes::REC20_HECTOBAR => "hectobar",
            InvoiceSuiteCodelistUnitCodes::REC20_HECTOGRAM => "hectogram",
            InvoiceSuiteCodelistUnitCodes::REC20_HECTOLITRE => "hectolitre",
            InvoiceSuiteCodelistUnitCodes::REC20_HECT_OF_PURE_ALCO => "hectolitre of pure alcohol",
            InvoiceSuiteCodelistUnitCodes::REC20_HECTOMETRE => "hectometre",
            InvoiceSuiteCodelistUnitCodes::REC20_HECTOPASCAL => "hectopascal",
            InvoiceSuiteCodelistUnitCodes::REC20_HECT_CUBI_METR_PER_SECO => "hectopascal cubic metre per second",
            InvoiceSuiteCodelistUnitCodes::REC20_HECT_LITR_PER_SECO => "hectopascal litre per second",
            InvoiceSuiteCodelistUnitCodes::REC20_HECT_PER_BAR => "hectopascal per bar",
            InvoiceSuiteCodelistUnitCodes::REC20_HECT_PER_KELV => "hectopascal per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_HECT_PER_METR => "hectopascal per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_HEFNERKERZE => "Hefner-Kerze",
            InvoiceSuiteCodelistUnitCodes::REC20_HENRY => "henry",
            InvoiceSuiteCodelistUnitCodes::REC20_HENR_PER_KILO => "henry per kiloohm",
            InvoiceSuiteCodelistUnitCodes::REC20_HENR_PER_METR => "henry per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_HENR_PER_OHM => "henry per ohm",
            InvoiceSuiteCodelistUnitCodes::REC20_HERTZ => "hertz",
            InvoiceSuiteCodelistUnitCodes::REC20_HERT_METR => "hertz metre",
            InvoiceSuiteCodelistUnitCodes::REC20_HORS_BOIL => "horsepower (boiler)",
            InvoiceSuiteCodelistUnitCodes::REC20_HORS_ELEC => "horsepower (electric)",
            InvoiceSuiteCodelistUnitCodes::REC20_HOUR => "hour",
            InvoiceSuiteCodelistUnitCodes::REC20_HUNDRED => "hundred",
            InvoiceSuiteCodelistUnitCodes::REC20_HUND_BOAR_FOOT => "hundred board foot",
            InvoiceSuiteCodelistUnitCodes::REC20_HUND_BOXE => "hundred boxes",
            InvoiceSuiteCodelistUnitCodes::REC20_HUND_COUN => "hundred count",
            InvoiceSuiteCodelistUnitCodes::REC20_HUND_CUBI_FOOT => "hundred cubic foot",
            InvoiceSuiteCodelistUnitCodes::REC20_HUND_CUBI_METR => "hundred cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_HUND_INTE_UNIT => "hundred international unit",
            InvoiceSuiteCodelistUnitCodes::REC20_HUND_KILO_DRY_WEIG => "hundred kilogram, dry weight",
            InvoiceSuiteCodelistUnitCodes::REC20_HUND_KILO_NET_MASS => "hundred kilogram, net mass",
            InvoiceSuiteCodelistUnitCodes::REC20_HUND_LEAV => "hundred leave",
            InvoiceSuiteCodelistUnitCodes::REC20_HUND_METR => "hundred metre",
            InvoiceSuiteCodelistUnitCodes::REC20_HUND_PACK => "hundred pack",
            InvoiceSuiteCodelistUnitCodes::REC20_HUND_POUN_CWT_HUND_WEIG_US => "hundred pound (cwt) / hundred weight (US)",
            InvoiceSuiteCodelistUnitCodes::REC20_HUND_WEIG_UK => "hundred weight (UK)",
            InvoiceSuiteCodelistUnitCodes::REC20_HYDR_HORS_POWE => "hydraulic horse power",
            InvoiceSuiteCodelistUnitCodes::REC20_IMPE_GALL_PER_MINU => "Imperial gallon per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_INCH => "inch",
            InvoiceSuiteCodelistUnitCodes::REC20_INCH_OF_MERC => "inch of mercury",
            InvoiceSuiteCodelistUnitCodes::REC20_INCH_OF_MERC__F => "inch of mercury (32 ºF)",
            InvoiceSuiteCodelistUnitCodes::REC20_INCH_OF_MERC__F => "inch of mercury (60 ºF)",
            InvoiceSuiteCodelistUnitCodes::REC20_INCH_OF_WATE => "inch of water",
            InvoiceSuiteCodelistUnitCodes::REC20_INCH_OF_WATE__F => "inch of water (39.2 ºF)",
            InvoiceSuiteCodelistUnitCodes::REC20_INCH_OF_WATE__F => "inch of water (60 ºF)",
            InvoiceSuiteCodelistUnitCodes::REC20_INCH_PER_DEGR_FAHR => "inch per degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_INCH_PER_LINE_FOOT => "inch per linear foot",
            InvoiceSuiteCodelistUnitCodes::REC20_INCH_PER_MINU => "inch per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_INCH_PER_PSI => "inch per psi",
            InvoiceSuiteCodelistUnitCodes::REC20_INCH_PER_SECO => "inch per second",
            InvoiceSuiteCodelistUnitCodes::REC20_INCH_PER_SECO_DEGR_FAHR => "inch per second degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_INCH_PER_SECO_PSI => "inch per second psi",
            InvoiceSuiteCodelistUnitCodes::REC20_INCH_PER_SECO_SQUA => "inch per second squared",
            InvoiceSuiteCodelistUnitCodes::REC20_INCH_PER_TWO_PI_RADI => "inch per two pi radiant",
            InvoiceSuiteCodelistUnitCodes::REC20_INCH_PER_YEAR => "inch per year",
            InvoiceSuiteCodelistUnitCodes::REC20_INCH_POUN_POUN_INCH => "inch pound (pound inch)",
            InvoiceSuiteCodelistUnitCodes::REC20_INCH_POUN => "inch poundal",
            InvoiceSuiteCodelistUnitCodes::REC20_INCH_TO_THE_FOUR_POWE => "inch to the fourth power",
            InvoiceSuiteCodelistUnitCodes::REC20_INTE_CAND => "international candle",
            InvoiceSuiteCodelistUnitCodes::REC20_INTE_SUGA_DEGR => "international sugar degree",
            InvoiceSuiteCodelistUnitCodes::REC20_INTE_UNIT_PER_GRAM => "international unit per gram",
            InvoiceSuiteCodelistUnitCodes::REC20_JOB => "job",
            InvoiceSuiteCodelistUnitCodes::REC20_JOULE => "joule",
            InvoiceSuiteCodelistUnitCodes::REC20_JOUL_PER_CUBI_METR => "joule per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_JOUL_PER_DAY => "joule per day",
            InvoiceSuiteCodelistUnitCodes::REC20_JOUL_PER_GRAM => "joule per gram",
            InvoiceSuiteCodelistUnitCodes::REC20_JOUL_PER_HOUR => "joule per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_JOUL_PER_KELV => "joule per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_JOUL_PER_KILO => "joule per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_JOUL_PER_KILO_KELV => "joule per kilogram kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_JOUL_PER_METR => "joule per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_JOUL_PER_METR_TO_THE_FOUR_POWE => "joule per metre to the fourth power",
            InvoiceSuiteCodelistUnitCodes::REC20_JOUL_PER_MINU => "joule per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_JOUL_PER_MOLE => "joule per mole",
            InvoiceSuiteCodelistUnitCodes::REC20_JOUL_PER_MOLE_KELV => "joule per mole kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_JOUL_PER_NORM_CUBI_METR => "Joule per normalised cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_JOUL_PER_SECO => "joule per second",
            InvoiceSuiteCodelistUnitCodes::REC20_JOUL_PER_SQUA_CENT => "joule per square centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_JOUL_PER_SQUA_METR => "joule per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_JOUL_PER_STAN_CUBI_METR => "Joule per standard cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_JOUL_PER_TESL => "joule per tesla",
            InvoiceSuiteCodelistUnitCodes::REC20_JOUL_SECO => "joule second",
            InvoiceSuiteCodelistUnitCodes::REC20_JOUL_SQUA_METR => "joule square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_JOUL_SQUA_METR_PER_KILO => "joule square metre per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_KATAL => "katal",
            InvoiceSuiteCodelistUnitCodes::REC20_KELVIN => "kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_KELV_METR_PER_WATT => "kelvin metre per watt",
            InvoiceSuiteCodelistUnitCodes::REC20_KELV_PER_BAR => "kelvin per bar",
            InvoiceSuiteCodelistUnitCodes::REC20_KELV_PER_HOUR => "kelvin per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_KELV_PER_KELV => "kelvin per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_KELV_PER_MINU => "kelvin per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_KELV_PER_PASC => "kelvin per pascal",
            InvoiceSuiteCodelistUnitCodes::REC20_KELV_PER_SECO => "kelvin per second",
            InvoiceSuiteCodelistUnitCodes::REC20_KELV_PER_WATT => "kelvin per watt",
            InvoiceSuiteCodelistUnitCodes::REC20_KIBIBIT => "kibibit",
            InvoiceSuiteCodelistUnitCodes::REC20_KIBI_PER_CUBI_METR => "kibibit per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_KIBI_PER_METR => "kibibit per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_KIBI_PER_SQUA_METR => "kibibit per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_KIBIBYTE => "kibibyte",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOAMPERE => "kiloampere",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_HOUR_THOU_AMPE_HOUR => "kiloampere hour (thousand ampere hour)",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_METR => "kiloampere per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_SQUA_METR => "kiloampere per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOBAR => "kilobar",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOBAUD => "kilobaud",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOBECQUEREL => "kilobecquerel",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_KILO => "kilobecquerel per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOBIT => "kilobit",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_SECO => "kilobit per second",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOBYTE => "kilobyte",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_SECO => "kilobyte per second",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_INTE_TABL => "kilocalorie (international table)",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_INTE_TABL_PER_GRAM_KELV => "kilocalorie (international table) per gram kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_INTE_TABL_PER_HOUR_METR_DEGR_CELS => "kilocalorie (international table) per hour metre degree Celsius",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_MEAN => "kilocalorie (mean)",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_THER => "kilocalorie (thermochemical)",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_THER_PER_HOUR => "kilocalorie (thermochemical) per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_THER_PER_MINU => "kilocalorie (thermochemical) per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_THER_PER_SECO => "kilocalorie (thermochemical) per second",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOCANDELA => "kilocandela",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOCHARACTER => "kilocharacter",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOCOULOMB => "kilocoulomb",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_CUBI_METR => "kilocoulomb per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_SQUA_METR => "kilocoulomb per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOCURIE => "kilocurie",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOELECTRONVOLT => "kiloelectronvolt",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOFARAD => "kilofarad",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOGRAM => "kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_CENT_PER_SECO => "kilogram centimetre per second",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_DRAI_NET_WEIG => "kilogram drained net weight",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_METR => "kilogram metre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_METR_PER_SECO => "kilogram metre per second",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_METR_PER_SECO_SQUA => "kilogram metre per second squared",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_METR_SQUA => "kilogram metre squared",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_METR_SQUA_PER_SECO => "kilogram metre squared per second",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_NAME_SUBS => "kilogram named substance",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_OF_CHOL_CHLO => "kilogram of choline chloride",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_OF_HYDR_PERO => "kilogram of hydrogen peroxide",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_OF_IMPO_MEAT_LESS_OFFA => "kilogram of imported meat, less offal",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_OF_METH => "kilogram of methylamine",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_OF_NITR => "kilogram of nitrogen",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_OF_PHOS_PENT_PHOS_ANHY => "kilogram of phosphorus pentoxide (phosphoric anhydride)",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_OF_POTA_HYDR_CAUS_POTA => "kilogram of potassium hydroxide (caustic potash)",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_OF_POTA_OXID => "kilogram of potassium oxide",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_OF_SODI_HYDR_CAUS_SODA => "kilogram of sodium hydroxide (caustic soda)",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_OF_SUBS__DRY => "kilogram of substance 90 % dry",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_OF_TUNG_TRIO => "kilogram of tungsten trioxide",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_OF_URAN => "kilogram of uranium",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_BAR => "kilogram per bar",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_CUBI_CENT => "kilogram per cubic centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_CUBI_CENT_BAR => "kilogram per cubic centimetre bar",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_CUBI_CENT_KELV => "kilogram per cubic centimetre kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_CUBI_DECI => "kilogram per cubic decimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_CUBI_DECI_BAR => "kilogram per cubic decimetre bar",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_CUBI_DECI_KELV => "kilogram per cubic decimetre kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_CUBI_METR => "kilogram per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_CUBI_METR_BAR => "kilogram per cubic metre bar",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_CUBI_METR_KELV => "kilogram per cubic metre kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_CUBI_METR_PASC => "kilogram per cubic metre pascal",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_DAY => "kilogram per day",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_DAY_BAR => "kilogram per day bar",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_DAY_KELV => "kilogram per day kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_HOUR => "kilogram per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_HOUR_BAR => "kilogram per hour bar",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_HOUR_KELV => "kilogram per hour kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_KELV => "kilogram per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_KILO => "kilogram per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_KILO => "kilogram per kilometre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_KILO => "kilogram per kilomol",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_LITR => "kilogram per litre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_LITR_BAR => "kilogram per litre bar",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_LITR_KELV => "kilogram per litre kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_METR => "kilogram per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_METR_DAY => "kilogram per metre day",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_METR_HOUR => "kilogram per metre hour",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_METR_MINU => "kilogram per metre minute",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_METR_SECO => "kilogram per metre second",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_MILL => "kilogram per millimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_MILL_WIDT => "kilogram per millimetre width",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_MINU => "kilogram per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_MINU_BAR => "kilogram per minute bar",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_MINU_KELV => "kilogram per minute kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_MOLE => "kilogram per mole",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_PASC => "kilogram per pascal",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_SECO => "kilogram per second",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_SECO_BAR => "kilogram per second bar",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_SECO_KELV => "kilogram per second kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_SECO_PASC => "kilogram per second pascal",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_SQUA_CENT => "kilogram per square centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_SQUA_METR => "kilogram per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_SQUA_METR_PASC_SECO => "kilogram per square metre pascal second",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_SQUA_METR_SECO => "kilogram per square metre second",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_SQUA_CENT => "kilogram square centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_SQUA_MILL => "kilogram square millimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_DRY_WEIG => "kilogram, dry weight",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_INCL_CONT => "kilogram, including container",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_INCL_INNE_PACK => "kilogram, including inner packaging",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_METR_PER_SQUA_CENT => "kilogram-force metre per square centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_SQUA_CENT => "kilogram-force per square centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_SQUA_MILL => "kilogram-force per square millimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOHENRY => "kilohenry",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOHERTZ => "kilohertz",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_METR => "kilohertz metre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOJOULE => "kilojoule",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_DAY => "kilojoule per day",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_GRAM => "kilojoule per gram",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_HOUR => "kilojoule per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_KELV => "kilojoule per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_KILO => "kilojoule per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_KILO_KELV => "kilojoule per kilogram kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_MINU => "kilojoule per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_MOLE => "kilojoule per mole",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_SECO => "kilojoule per second",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOLITRE => "kilolitre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_HOUR => "kilolitre per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOLUX => "kilolux",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOMETRE => "kilometre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_HOUR => "kilometre per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_SECO => "kilometre per second",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_SECO_SQUA => "kilometre per second squared",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOMOLE => "kilomole",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_CUBI_METR => "kilomole per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_CUBI_METR_BAR => "kilomole per cubic metre bar",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_CUBI_METR_KELV => "kilomole per cubic metre kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_HOUR => "kilomole per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_KILO => "kilomole per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_MINU => "kilomole per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_SECO => "kilomole per second",
            InvoiceSuiteCodelistUnitCodes::REC20_KILONEWTON => "kilonewton",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_METR => "kilonewton metre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_METR => "kilonewton per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_SQUA_METR => "kilonewton per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOOHM => "kiloohm",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_METR => "kiloohm metre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOPASCAL => "kilopascal",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_BAR => "kilopascal per bar",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_KELV => "kilopascal per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_METR => "kilopascal per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_MILL => "kilopascal per millimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_SQUA_METR_PER_GRAM => "kilopascal square metre per gram",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_HOUR => "kilopound per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOPOUNDFORCE => "kilopound-force",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOROENTGEN => "kiloroentgen",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOSECOND => "kilosecond",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOSEGMENT => "kilosegment",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOSIEMENS => "kilosiemens",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_METR => "kilosiemens per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOTESLA => "kilotesla",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOTONNE => "kilotonne",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOVAR => "kilovar",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOVOLT => "kilovolt",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_AMPE => "kilovolt - ampere",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_AMPE_HOUR => "kilovolt ampere hour",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_AMPE_REAC_DEMA => "kilovolt ampere reactive demand",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_AMPE_REAC_HOUR => "kilovolt ampere reactive hour",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_METR => "kilovolt per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOWATT => "kilowatt",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_DEMA => "kilowatt demand",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_HOUR => "kilowatt hour",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_HOUR_PER_CUBI_METR => "kilowatt hour per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_HOUR_PER_HOUR => "kilowatt hour per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_HOUR_PER_KELV => "kilowatt hour per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_HOUR_PER_NORM_CUBI_METR => "Kilowatt hour per normalized cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_HOUR_PER_STAN_CUBI_METR => "Kilowatt hour per standard cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_METR_DEGR_CELS => "kilowatt per metre degree Celsius",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_METR_KELV => "kilowatt per metre kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_SQUA_METR_KELV => "kilowatt per square metre kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_YEAR => "kilowatt year",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOWEBER => "kiloweber",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_METR => "kiloweber per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_KIP_PER_SQUA_INCH => "kip per square inch",
            InvoiceSuiteCodelistUnitCodes::REC20_KIT => "kit",
            InvoiceSuiteCodelistUnitCodes::REC20_KNOT => "knot",
            InvoiceSuiteCodelistUnitCodes::REC20_LABO_HOUR => "labour hour",
            InvoiceSuiteCodelistUnitCodes::REC20_LACT_DRY_MATE_PERC => "lactic dry material percentage",
            InvoiceSuiteCodelistUnitCodes::REC20_LACT_EXCE_PERC => "lactose excess percentage",
            InvoiceSuiteCodelistUnitCodes::REC20_LAMBERT => "lambert",
            InvoiceSuiteCodelistUnitCodes::REC20_LANGLEY => "langley",
            InvoiceSuiteCodelistUnitCodes::REC20_LAYER => "layer",
            InvoiceSuiteCodelistUnitCodes::REC20_LEAF => "leaf",
            InvoiceSuiteCodelistUnitCodes::REC20_LENGTH => "length",
            InvoiceSuiteCodelistUnitCodes::REC20_LIGH_YEAR => "light year",
            InvoiceSuiteCodelistUnitCodes::REC20_LINE_FOOT => "linear foot",
            InvoiceSuiteCodelistUnitCodes::REC20_LINE_METR => "linear metre",
            InvoiceSuiteCodelistUnitCodes::REC20_LINE_YARD => "linear yard",
            InvoiceSuiteCodelistUnitCodes::REC20_LINK => "link",
            InvoiceSuiteCodelistUnitCodes::REC20_LIQU_PINT_US => "liquid pint (US)",
            InvoiceSuiteCodelistUnitCodes::REC20_LIQU_POUN => "liquid pound",
            InvoiceSuiteCodelistUnitCodes::REC20_LIQU_QUAR_US => "liquid quart (US)",
            InvoiceSuiteCodelistUnitCodes::REC20_LITRE => "litre",
            InvoiceSuiteCodelistUnitCodes::REC20_LITR_OF_PURE_ALCO => "litre of pure alcohol",
            InvoiceSuiteCodelistUnitCodes::REC20_LITR_PER_BAR => "litre per bar",
            InvoiceSuiteCodelistUnitCodes::REC20_LITR_PER_DAY => "litre per day",
            InvoiceSuiteCodelistUnitCodes::REC20_LITR_PER_DAY_BAR => "litre per day bar",
            InvoiceSuiteCodelistUnitCodes::REC20_LITR_PER_DAY_KELV => "litre per day kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_LITR_PER_HOUR => "litre per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_LITR_PER_HOUR_BAR => "litre per hour bar",
            InvoiceSuiteCodelistUnitCodes::REC20_LITR_PER_HOUR_KELV => "litre per hour kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_LITR_PER_KELV => "litre per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_LITR_PER_KILO => "litre per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_LITR_PER_LITR => "litre per litre",
            InvoiceSuiteCodelistUnitCodes::REC20_LITR_PER_MINU => "litre per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_LITR_PER_MINU_BAR => "litre per minute bar",
            InvoiceSuiteCodelistUnitCodes::REC20_LITR_PER_MINU_KELV => "litre per minute kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_LITR_PER_MOLE => "litre per mole",
            InvoiceSuiteCodelistUnitCodes::REC20_LITR_PER_SECO => "litre per second",
            InvoiceSuiteCodelistUnitCodes::REC20_LITR_PER_SECO_BAR => "litre per second bar",
            InvoiceSuiteCodelistUnitCodes::REC20_LITR_PER_SECO_KELV => "litre per second kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_LOAD => "load",
            InvoiceSuiteCodelistUnitCodes::REC20_LOT_UNIT_OF_PROC => "lot [unit of procurement]",
            InvoiceSuiteCodelistUnitCodes::REC20_LOT_UNIT_OF_WEIG => "lot [unit of weight]",
            InvoiceSuiteCodelistUnitCodes::REC20_LUMEN => "lumen",
            InvoiceSuiteCodelistUnitCodes::REC20_LUME_HOUR => "lumen hour",
            InvoiceSuiteCodelistUnitCodes::REC20_LUME_PER_SQUA_FOOT => "lumen per square foot",
            InvoiceSuiteCodelistUnitCodes::REC20_LUME_PER_SQUA_METR => "lumen per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_LUME_PER_WATT => "lumen per watt",
            InvoiceSuiteCodelistUnitCodes::REC20_LUME_SECO => "lumen second",
            InvoiceSuiteCodelistUnitCodes::REC20_LUMP_SUM => "lump sum",
            InvoiceSuiteCodelistUnitCodes::REC20_LUX => "lux",
            InvoiceSuiteCodelistUnitCodes::REC20_LUX_HOUR => "lux hour",
            InvoiceSuiteCodelistUnitCodes::REC20_LUX_SECO => "lux second",
            InvoiceSuiteCodelistUnitCodes::REC20_MANMONTH => "manmonth",
            InvoiceSuiteCodelistUnitCodes::REC20_MEAL => "meal",
            InvoiceSuiteCodelistUnitCodes::REC20_MEBIBIT => "mebibit",
            InvoiceSuiteCodelistUnitCodes::REC20_MEBI_PER_CUBI_METR => "mebibit per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MEBI_PER_METR => "mebibit per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MEBI_PER_SQUA_METR => "mebibit per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MEBIBYTE => "mebibyte",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_JOUL_PER_NORM_CUBI_METR => "Mega Joule per Normalised cubic Metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGAAMPERE => "megaampere",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_PER_SQUA_METR => "megaampere per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGABAUD => "megabaud",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGABECQUEREL => "megabecquerel",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_PER_KILO => "megabecquerel per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGABIT => "megabit",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_PER_SECO => "megabit per second",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGABYTE => "megabyte",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_PER_SECO => "megabyte per second",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGACOULOMB => "megacoulomb",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_PER_CUBI_METR => "megacoulomb per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_PER_SQUA_METR => "megacoulomb per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGAELECTRONVOLT => "megaelectronvolt",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGAGRAM => "megagram",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_PER_CUBI_METR => "megagram per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGAHERTZ => "megahertz",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_KILO => "megahertz kilometre",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_METR => "megahertz metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGAJOULE => "megajoule",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_PER_CUBI_METR => "megajoule per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_PER_KILO => "megajoule per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_PER_SECO => "megajoule per second",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGALITRE => "megalitre",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGAMETRE => "megametre",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGANEWTON => "meganewton",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_METR => "meganewton metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGAOHM => "megaohm",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_KILO => "megaohm kilometre",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_METR => "megaohm metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_PER_KILO => "megaohm per kilometre",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_PER_METR => "megaohm per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGAPASCAL => "megapascal",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_CUBI_METR_PER_SECO => "megapascal cubic metre per second",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_LITR_PER_SECO => "megapascal litre per second",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_PER_BAR => "megapascal per bar",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_PER_KELV => "megapascal per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGAPIXEL => "megapixel",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_PER_METR => "megasiemens per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGAVAR => "megavar",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGAVOLT => "megavolt",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_AMPE => "megavolt - ampere",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_AMPE_REAC_HOUR => "megavolt ampere reactive hour",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_PER_METR => "megavolt per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGAWATT => "megawatt",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_HOUR => "megawatt hour (1000 kW.h)",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_HOUR_PER_HOUR => "megawatt hour per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_PER_HERT => "megawatt per hertz",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_PER_MINU => "megawatts per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_MESH => "mesh",
            InvoiceSuiteCodelistUnitCodes::REC20_MESSAGE => "message",
            InvoiceSuiteCodelistUnitCodes::REC20_METRE => "metre",
            InvoiceSuiteCodelistUnitCodes::REC20_METR_DAY => "Metre Day",
            InvoiceSuiteCodelistUnitCodes::REC20_METR_KELV => "metre kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_METR_MONT => "Metre Month",
            InvoiceSuiteCodelistUnitCodes::REC20_METR_PER_BAR => "metre per bar",
            InvoiceSuiteCodelistUnitCodes::REC20_METR_PER_DEGR_CELC_METR => "metre per degree Celcius metre",
            InvoiceSuiteCodelistUnitCodes::REC20_METR_PER_HOUR => "metre per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_METR_PER_KELV => "metre per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_METR_PER_MINU => "metre per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_METR_PER_PASC => "metre per pascal",
            InvoiceSuiteCodelistUnitCodes::REC20_METR_PER_RADI => "metre per radiant",
            InvoiceSuiteCodelistUnitCodes::REC20_METR_PER_SECO => "metre per second",
            InvoiceSuiteCodelistUnitCodes::REC20_METR_PER_SECO_BAR => "metre per second bar",
            InvoiceSuiteCodelistUnitCodes::REC20_METR_PER_SECO_KELV => "metre per second kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_METR_PER_SECO_PASC => "metre per second pascal",
            InvoiceSuiteCodelistUnitCodes::REC20_METR_PER_SECO_SQUA => "metre per second squared",
            InvoiceSuiteCodelistUnitCodes::REC20_METR_PER_VOLT_SECO => "metre per volt second",
            InvoiceSuiteCodelistUnitCodes::REC20_METR_TO_THE_FOUR_POWE => "metre to the fourth power",
            InvoiceSuiteCodelistUnitCodes::REC20_METR_WEEK => "Metre Week",
            InvoiceSuiteCodelistUnitCodes::REC20_METR_CARA => "metric carat",
            InvoiceSuiteCodelistUnitCodes::REC20_METR_TON_INCL_CONT => "metric ton, including container",
            InvoiceSuiteCodelistUnitCodes::REC20_METR_TON_INCL_INNE_PACK => "metric ton, including inner packaging",
            InvoiceSuiteCodelistUnitCodes::REC20_METR_TON_LUBR_OIL => "metric ton, lubricating oil",
            InvoiceSuiteCodelistUnitCodes::REC20_MICROINCH => "micro-inch",
            InvoiceSuiteCodelistUnitCodes::REC20_MICROAMPERE => "microampere",
            InvoiceSuiteCodelistUnitCodes::REC20_MICROBAR => "microbar",
            InvoiceSuiteCodelistUnitCodes::REC20_MICROBECQUEREL => "microbecquerel",
            InvoiceSuiteCodelistUnitCodes::REC20_MICROCOULOMB => "microcoulomb",
            InvoiceSuiteCodelistUnitCodes::REC20_MICR_PER_CUBI_METR => "microcoulomb per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MICR_PER_SQUA_METR => "microcoulomb per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MICROCURIE => "microcurie",
            InvoiceSuiteCodelistUnitCodes::REC20_MICROFARAD => "microfarad",
            InvoiceSuiteCodelistUnitCodes::REC20_MICR_PER_KILO => "microfarad per kilometre",
            InvoiceSuiteCodelistUnitCodes::REC20_MICR_PER_METR => "microfarad per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MICROGRAM => "microgram",
            InvoiceSuiteCodelistUnitCodes::REC20_MICR_PER_CUBI_METR => "microgram per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MICR_PER_CUBI_METR_BAR => "microgram per cubic metre bar",
            InvoiceSuiteCodelistUnitCodes::REC20_MICR_PER_CUBI_METR_KELV => "microgram per cubic metre kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_MICR_PER_HECT => "microgram per hectogram",
            InvoiceSuiteCodelistUnitCodes::REC20_MICR_PER_KILO => "microgram per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_MICR_PER_LITR => "microgram per litre",
            InvoiceSuiteCodelistUnitCodes::REC20_MICR_PER_HOUR => "microgray per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_MICR_PER_MINU => "microgray per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_MICR_PER_SECO => "microgray per second",
            InvoiceSuiteCodelistUnitCodes::REC20_MICROHENRY => "microhenry",
            InvoiceSuiteCodelistUnitCodes::REC20_MICR_PER_KILO => "microhenry per kiloohm",
            InvoiceSuiteCodelistUnitCodes::REC20_MICR_PER_METR => "microhenry per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MICR_PER_OHM => "microhenry per ohm",
            InvoiceSuiteCodelistUnitCodes::REC20_MICROLITRE => "microlitre",
            InvoiceSuiteCodelistUnitCodes::REC20_MICR_PER_LITR => "microlitre per litre",
            InvoiceSuiteCodelistUnitCodes::REC20_MICR_MICR => "micrometre (micron)",
            InvoiceSuiteCodelistUnitCodes::REC20_MICR_PER_KELV => "micrometre per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_MICROMOLE => "micromole",
            InvoiceSuiteCodelistUnitCodes::REC20_MICRONEWTON => "micronewton",
            InvoiceSuiteCodelistUnitCodes::REC20_MICR_METR => "micronewton metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MICROOHM => "microohm",
            InvoiceSuiteCodelistUnitCodes::REC20_MICR_METR => "microohm metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MICROPASCAL => "micropascal",
            InvoiceSuiteCodelistUnitCodes::REC20_MICROPOISE => "micropoise",
            InvoiceSuiteCodelistUnitCodes::REC20_MICRORADIAN => "microradian",
            InvoiceSuiteCodelistUnitCodes::REC20_MICROSECOND => "microsecond",
            InvoiceSuiteCodelistUnitCodes::REC20_MICROSIEMENS => "microsiemens",
            InvoiceSuiteCodelistUnitCodes::REC20_MICR_PER_CENT => "microsiemens per centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_MICR_PER_METR => "microsiemens per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MICR_PER_HOUR => "microsievert per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_MICR_PER_MINU => "microsievert per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_MICR_PER_SECO => "microsievert per second",
            InvoiceSuiteCodelistUnitCodes::REC20_MICROTESLA => "microtesla",
            InvoiceSuiteCodelistUnitCodes::REC20_MICROVOLT => "microvolt",
            InvoiceSuiteCodelistUnitCodes::REC20_MICR_PER_METR => "microvolt per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MICROWATT => "microwatt",
            InvoiceSuiteCodelistUnitCodes::REC20_MICR_PER_SQUA_METR => "microwatt per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MIL => "mil",
            InvoiceSuiteCodelistUnitCodes::REC20_MILE_BASE_ON_US_SURV_FOOT => "mile (based on U.S. survey foot)",
            InvoiceSuiteCodelistUnitCodes::REC20_MILE_STAT_MILE => "mile (statute mile)",
            InvoiceSuiteCodelistUnitCodes::REC20_MILE_STAT_MILE_PER_SECO_SQUA => "mile (statute mile) per second squared",
            InvoiceSuiteCodelistUnitCodes::REC20_MILE_PER_HOUR_STAT_MILE => "mile per hour (statute mile)",
            InvoiceSuiteCodelistUnitCodes::REC20_MILE_PER_MINU => "mile per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_MILE_PER_SECO => "mile per second",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLE => "mille",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLIINCH => "milli-inch",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLIAMPERE => "milliampere",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_HOUR => "milliampere hour",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_BAR => "milliampere per bar",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_INCH => "milliampere per inch",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_LITR_MINU => "milliampere per litre minute",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_MILL => "milliampere per millimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_POUN_PER_SQUA_INCH => "milliampere per pound-force per square inch",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLIARD => "milliard",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLIBAR => "millibar",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_CUBI_METR_PER_SECO => "millibar cubic metre per second",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_LITR_PER_SECO => "millibar litre per second",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_BAR => "millibar per bar",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_KELV => "millibar per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLICANDELA => "millicandela",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLICOULOMB => "millicoulomb",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_CUBI_METR => "millicoulomb per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_KILO => "millicoulomb per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_SQUA_METR => "millicoulomb per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLICURIE => "millicurie",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_CAUS_POTA_PER_GRAM_OF_PROD => "milliequivalence caustic potash per gram of product",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLIFARAD => "millifarad",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLIGAL => "milligal",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLIGRAM => "milligram",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_BAR => "milligram per bar",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_CUBI_METR => "milligram per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_CUBI_METR_BAR => "milligram per cubic metre bar",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_CUBI_METR_KELV => "milligram per cubic metre kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_DAY => "milligram per day",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_DAY_BAR => "milligram per day bar",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_DAY_KELV => "milligram per day kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_GRAM => "milligram per gram",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_HOUR => "milligram per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_HOUR_BAR => "milligram per hour bar",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_HOUR_KELV => "milligram per hour kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_KELV => "milligram per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_KILO => "milligram per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_LITR => "milligram per litre",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_METR => "milligram per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_MINU => "milligram per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_MINU_BAR => "milligram per minute bar",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_MINU_KELV => "milligram per minute kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_SECO => "milligram per second",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_SECO_BAR => "milligram per second bar",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_SECO_KELV => "milligram per second kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_SQUA_CENT => "milligram per square centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_SQUA_METR => "milligram per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLIGRAY => "milligray",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_HOUR => "milligray per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_MINU => "milligray per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_SECO => "milligray per second",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLIHENRY => "millihenry",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_KILO => "millihenry per kiloohm",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_OHM => "millihenry per ohm",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLIHERTZ => "millihertz",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLIJOULE => "millijoule",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLILITRE => "millilitre",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_BAR => "millilitre per bar",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_CUBI_METR => "millilitre per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_DAY => "millilitre per day",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_DAY_BAR => "millilitre per day bar",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_DAY_KELV => "millilitre per day kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_HOUR => "millilitre per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_HOUR_BAR => "millilitre per hour bar",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_HOUR_KELV => "millilitre per hour kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_KELV => "millilitre per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_KILO => "millilitre per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_LITR => "millilitre per litre",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_MINU => "millilitre per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_MINU_BAR => "millilitre per minute bar",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_MINU_KELV => "millilitre per minute kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_SECO => "millilitre per second",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_SECO_BAR => "millilitre per second bar",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_SECO_KELV => "millilitre per second kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_SQUA_CENT_MINU => "millilitre per square centimetre minute",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_SQUA_CENT_SECO => "millilitre per square centimetre second",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLIMETRE => "millimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_BAR => "millimetre per bar",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_DEGR_CELC_METR => "millimetre per degree Celcius metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_HOUR => "millimetre per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_KELV => "millimetre per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_MINU => "millimetre per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_SECO => "millimetre per second",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_SECO_SQUA => "millimetre per second squared",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_YEAR => "millimetre per year",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_SQUA_PER_SECO => "millimetre squared per second",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_TO_THE_FOUR_POWE => "millimetre to the fourth power",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLIMOLE => "millimole",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_GRAM => "millimole per gram",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_KILO => "millimole per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_LITR => "millimole per litre",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLINEWTON => "millinewton",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_METR => "millinewton metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_METR => "millinewton per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLIOHM => "milliohm",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_METR => "milliohm metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_METR => "milliohm per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLION => "million",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_BTU_PER__CUBI_FOOT => "million Btu per 1000 cubic foot",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_BTUI_PER_HOUR => "million Btu(IT) per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_CUBI_METR => "million cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_INTE_UNIT => "million international unit",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLIPASCAL => "millipascal",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_METR => "millipascal per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_SECO => "millipascal second",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_SECO_PER_BAR => "millipascal second per bar",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_SECO_PER_KELV => "millipascal second per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLIRADIAN => "milliradian",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLIROENTGEN => "milliroentgen",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_AEQU_MEN => "milliroentgen aequivalent men",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLISECOND => "millisecond",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLISIEMENS => "millisiemens",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_CENT => "millisiemens per centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLISIEVERT => "millisievert",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_HOUR => "millisievert per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_MINU => "millisievert per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_SECO => "millisievert per second",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLITESLA => "millitesla",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLIVOLT => "millivolt",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_AMPE => "millivolt - ampere",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_KELV => "millivolt per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_METR => "millivolt per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_MINU => "millivolt per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLIWATT => "milliwatt",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_SQUA_METR => "milliwatt per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLIWEBER => "milliweber",
            InvoiceSuiteCodelistUnitCodes::REC20_MINU_UNIT_OF_ANGL => "minute [unit of angle]",
            InvoiceSuiteCodelistUnitCodes::REC20_MINU_UNIT_OF_TIME => "minute [unit of time]",
            InvoiceSuiteCodelistUnitCodes::REC20_MMSCFDAY => "MMSCF/day",
            InvoiceSuiteCodelistUnitCodes::REC20_MODU_WIDT => "module width",
            InvoiceSuiteCodelistUnitCodes::REC20_MOL_PER_CUBI_METR_PASC => "mol per cubic metre pascal",
            InvoiceSuiteCodelistUnitCodes::REC20_MOL_PER_KILO_PASC => "mol per kilogram pascal",
            InvoiceSuiteCodelistUnitCodes::REC20_MOLE => "mole",
            InvoiceSuiteCodelistUnitCodes::REC20_MOLE_PER_CUBI_DECI => "mole per cubic decimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_MOLE_PER_CUBI_METR => "mole per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MOLE_PER_CUBI_METR_BAR => "mole per cubic metre bar",
            InvoiceSuiteCodelistUnitCodes::REC20_MOLE_PER_CUBI_METR_KELV => "mole per cubic metre kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_MOLE_PER_CUBI_METR_TO_THE_POWE_SUM_OF_STOI_NUMB => "mole per cubiv metre to the power sum of stoichiometric numbers",
            InvoiceSuiteCodelistUnitCodes::REC20_MOLE_PER_HOUR => "mole per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_MOLE_PER_KILO => "mole per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_MOLE_PER_KILO_BAR => "mole per kilogram bar",
            InvoiceSuiteCodelistUnitCodes::REC20_MOLE_PER_KILO_KELV => "mole per kilogram kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_MOLE_PER_LITR => "mole per litre",
            InvoiceSuiteCodelistUnitCodes::REC20_MOLE_PER_LITR_BAR => "mole per litre bar",
            InvoiceSuiteCodelistUnitCodes::REC20_MOLE_PER_LITR_KELV => "mole per litre kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_MOLE_PER_MINU => "mole per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_MOLE_PER_SECO => "mole per second",
            InvoiceSuiteCodelistUnitCodes::REC20_MONE_VALU => "monetary value",
            InvoiceSuiteCodelistUnitCodes::REC20_MONTH => "month",
            InvoiceSuiteCodelistUnitCodes::REC20_MUTU_DEFI => "mutually defined",
            InvoiceSuiteCodelistUnitCodes::REC20_NANOAMPERE => "nanoampere",
            InvoiceSuiteCodelistUnitCodes::REC20_NANOCOULOMB => "nanocoulomb",
            InvoiceSuiteCodelistUnitCodes::REC20_NANOFARAD => "nanofarad",
            InvoiceSuiteCodelistUnitCodes::REC20_NANO_PER_METR => "nanofarad per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_NANO_PER_KILO => "nanogram per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_NANO_PER_HOUR => "nanogray per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_NANO_PER_MINU => "nanogray per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_NANO_PER_SECO => "nanogray per second",
            InvoiceSuiteCodelistUnitCodes::REC20_NANOHENRY => "nanohenry",
            InvoiceSuiteCodelistUnitCodes::REC20_NANO_PER_METR => "nanohenry per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_NANOLITRE => "nanolitre",
            InvoiceSuiteCodelistUnitCodes::REC20_NANOMETRE => "nanometre",
            InvoiceSuiteCodelistUnitCodes::REC20_NANOMOLE => "nanomole",
            InvoiceSuiteCodelistUnitCodes::REC20_NANOOHM => "nanoohm",
            InvoiceSuiteCodelistUnitCodes::REC20_NANO_METR => "nanoohm metre",
            InvoiceSuiteCodelistUnitCodes::REC20_NANOSECOND => "nanosecond",
            InvoiceSuiteCodelistUnitCodes::REC20_NANO_PER_CENT => "nanosiemens per centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_NANO_PER_METR => "nanosiemens per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_NANO_PER_HOUR => "nanosievert per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_NANO_PER_MINU => "nanosievert per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_NANO_PER_SECO => "nanosievert per second",
            InvoiceSuiteCodelistUnitCodes::REC20_NANOTESLA => "nanotesla",
            InvoiceSuiteCodelistUnitCodes::REC20_NANOWATT => "nanowatt",
            InvoiceSuiteCodelistUnitCodes::REC20_NATU_UNIT_OF_INFO => "natural unit of information",
            InvoiceSuiteCodelistUnitCodes::REC20_NATU_UNIT_OF_INFO_PER_SECO => "natural unit of information per second",
            InvoiceSuiteCodelistUnitCodes::REC20_NAUT_MILE => "nautical mile",
            InvoiceSuiteCodelistUnitCodes::REC20_NEPER => "neper",
            InvoiceSuiteCodelistUnitCodes::REC20_NEPE_PER_SECO => "neper per second",
            InvoiceSuiteCodelistUnitCodes::REC20_NEPH_TURB_UNIT => "Nephelometric turbidity unit",
            InvoiceSuiteCodelistUnitCodes::REC20_NET_KILO => "net kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_NET_TON => "net ton",
            InvoiceSuiteCodelistUnitCodes::REC20_NEWTON => "newton",
            InvoiceSuiteCodelistUnitCodes::REC20_NEWT_CENT => "newton centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_NEWT_METR => "newton metre",
            InvoiceSuiteCodelistUnitCodes::REC20_NEWT_METR_PER_AMPE => "newton metre per ampere",
            InvoiceSuiteCodelistUnitCodes::REC20_NEWT_METR_PER_DEGR => "newton metre per degree",
            InvoiceSuiteCodelistUnitCodes::REC20_NEWT_METR_PER_KILO => "newton metre per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_NEWT_METR_PER_METR => "newton metre per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_NEWT_METR_PER_RADI => "newton metre per radian",
            InvoiceSuiteCodelistUnitCodes::REC20_NEWT_METR_PER_SQUA_METR => "newton metre per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_NEWT_METR_SECO => "newton metre second",
            InvoiceSuiteCodelistUnitCodes::REC20_NEWT_METR_SQUA_PER_KILO_SQUA => "newton metre squared per kilogram squared",
            InvoiceSuiteCodelistUnitCodes::REC20_NEWT_METR_WATT_TO_THE_POWE_MINU => "newton metre watt to the power minus 0,5",
            InvoiceSuiteCodelistUnitCodes::REC20_NEWT_PER_AMPE => "newton per ampere",
            InvoiceSuiteCodelistUnitCodes::REC20_NEWT_PER_CENT => "newton per centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_NEWT_PER_METR => "newton per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_NEWT_PER_MILL => "newton per millimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_NEWT_PER_SQUA_CENT => "newton per square centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_NEWT_PER_SQUA_METR => "newton per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_NEWT_PER_SQUA_MILL => "newton per square millimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_NEWT_SECO => "newton second",
            InvoiceSuiteCodelistUnitCodes::REC20_NEWT_SECO_PER_METR => "newton second per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_NEWT_SECO_PER_SQUA_METR => "newton second per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_NEWT_SQUA_METR_PER_AMPE => "newton square metre per ampere",
            InvoiceSuiteCodelistUnitCodes::REC20_NIL => "nil",
            InvoiceSuiteCodelistUnitCodes::REC20_NORM_CUBI_METR => "Normalised cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_NORM_CUBI_METR_PER_DAY => "Normalized cubic metre per day",
            InvoiceSuiteCodelistUnitCodes::REC20_NORM_CUBI_METR_PER_HOUR => "Normalized cubic metre per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_NUMB_OF_ARTI => "number of articles",
            InvoiceSuiteCodelistUnitCodes::REC20_NUMB_OF_CELL => "number of cells",
            InvoiceSuiteCodelistUnitCodes::REC20_NUMB_OF_INTE_UNIT => "number of international units",
            InvoiceSuiteCodelistUnitCodes::REC20_NUMB_OF_JEWE => "number of jewels",
            InvoiceSuiteCodelistUnitCodes::REC20_NUMB_OF_PACK => "number of packs",
            InvoiceSuiteCodelistUnitCodes::REC20_NUMB_OF_PART => "number of parts",
            InvoiceSuiteCodelistUnitCodes::REC20_NUMB_OF_WORD => "number of words",
            InvoiceSuiteCodelistUnitCodes::REC20_OCTAVE => "octave",
            InvoiceSuiteCodelistUnitCodes::REC20_OCTET => "octet",
            InvoiceSuiteCodelistUnitCodes::REC20_OCTE_PER_SECO => "octet per second",
            InvoiceSuiteCodelistUnitCodes::REC20_ODS_GRAM => "ODS Grams",
            InvoiceSuiteCodelistUnitCodes::REC20_ODS_KILO => "ODS Kilograms",
            InvoiceSuiteCodelistUnitCodes::REC20_ODS_MILL => "ODS Milligrams",
            InvoiceSuiteCodelistUnitCodes::REC20_OHM => "ohm",
            InvoiceSuiteCodelistUnitCodes::REC20_OHM_CENT => "ohm centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_OHM_CIRC_PER_FOOT => "ohm circular-mil per foot",
            InvoiceSuiteCodelistUnitCodes::REC20_OHM_KILO => "ohm kilometre",
            InvoiceSuiteCodelistUnitCodes::REC20_OHM_METR => "ohm metre",
            InvoiceSuiteCodelistUnitCodes::REC20_OHM_PER_KILO => "ohm per kilometre",
            InvoiceSuiteCodelistUnitCodes::REC20_OHM_PER_METR => "ohm per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_OHM_PER_MILE_STAT_MILE => "ohm per mile (statute mile)",
            InvoiceSuiteCodelistUnitCodes::REC20_ONE => "one",
            InvoiceSuiteCodelistUnitCodes::REC20_ONE_PER_ONE => "one per one",
            InvoiceSuiteCodelistUnitCodes::REC20_OSCI_PER_MINU => "oscillations per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_OUNC_AVOI => "ounce (avoirdupois)",
            InvoiceSuiteCodelistUnitCodes::REC20_OUNC_AVOI_PER_CUBI_INCH => "ounce (avoirdupois) per cubic inch",
            InvoiceSuiteCodelistUnitCodes::REC20_OUNC_AVOI_PER_CUBI_YARD => "ounce (avoirdupois) per cubic yard",
            InvoiceSuiteCodelistUnitCodes::REC20_OUNC_AVOI_PER_DAY => "ounce (avoirdupois) per day",
            InvoiceSuiteCodelistUnitCodes::REC20_OUNC_AVOI_PER_GALL_UK => "ounce (avoirdupois) per gallon (UK)",
            InvoiceSuiteCodelistUnitCodes::REC20_OUNC_AVOI_PER_GALL_US => "ounce (avoirdupois) per gallon (US)",
            InvoiceSuiteCodelistUnitCodes::REC20_OUNC_AVOI_PER_HOUR => "ounce (avoirdupois) per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_OUNC_AVOI_PER_MINU => "ounce (avoirdupois) per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_OUNC_AVOI_PER_SECO => "ounce (avoirdupois) per second",
            InvoiceSuiteCodelistUnitCodes::REC20_OUNC_AVOI_PER_SQUA_INCH => "ounce (avoirdupois) per square inch",
            InvoiceSuiteCodelistUnitCodes::REC20_OUNC_AVOI => "ounce (avoirdupois)-force",
            InvoiceSuiteCodelistUnitCodes::REC20_OUNC_AVOI_INCH => "ounce (avoirdupois)-force inch",
            InvoiceSuiteCodelistUnitCodes::REC20_OUNC_UK_FLUI_PER_DAY => "ounce (UK fluid) per day",
            InvoiceSuiteCodelistUnitCodes::REC20_OUNC_UK_FLUI_PER_HOUR => "ounce (UK fluid) per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_OUNC_UK_FLUI_PER_MINU => "ounce (UK fluid) per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_OUNC_UK_FLUI_PER_SECO => "ounce (UK fluid) per second",
            InvoiceSuiteCodelistUnitCodes::REC20_OUNC_US_FLUI_PER_DAY => "ounce (US fluid) per day",
            InvoiceSuiteCodelistUnitCodes::REC20_OUNC_US_FLUI_PER_HOUR => "ounce (US fluid) per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_OUNC_US_FLUI_PER_MINU => "ounce (US fluid) per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_OUNC_US_FLUI_PER_SECO => "ounce (US fluid) per second",
            InvoiceSuiteCodelistUnitCodes::REC20_OUNC_FOOT => "ounce foot",
            InvoiceSuiteCodelistUnitCodes::REC20_OUNC_INCH => "ounce inch",
            InvoiceSuiteCodelistUnitCodes::REC20_OUNC_PER_SQUA_FOOT => "ounce per square foot",
            InvoiceSuiteCodelistUnitCodes::REC20_OUNC_PER_SQUA_FOOT_PER_I => "ounce per square foot per 0,01inch",
            InvoiceSuiteCodelistUnitCodes::REC20_OUNC_PER_SQUA_YARD => "ounce per square yard",
            InvoiceSuiteCodelistUnitCodes::REC20_OUTFIT => "outfit",
            InvoiceSuiteCodelistUnitCodes::REC20_OVER_HOUR => "overtime hour",
            InvoiceSuiteCodelistUnitCodes::REC20_OZON_DEPL_EQUI => "ozone depletion equivalent",
            InvoiceSuiteCodelistUnitCodes::REC20_PAD => "pad",
            InvoiceSuiteCodelistUnitCodes::REC20_PAGE => "page",
            InvoiceSuiteCodelistUnitCodes::REC20_PAGE_FACS => "page - facsimile",
            InvoiceSuiteCodelistUnitCodes::REC20_PAGE_HARD => "page - hardcopy",
            InvoiceSuiteCodelistUnitCodes::REC20_PAGE_PER_INCH => "page per inch",
            InvoiceSuiteCodelistUnitCodes::REC20_PAIR => "pair",
            InvoiceSuiteCodelistUnitCodes::REC20_PANEL => "panel",
            InvoiceSuiteCodelistUnitCodes::REC20_PARSEC => "parsec",
            InvoiceSuiteCodelistUnitCodes::REC20_PART_PER_BILL_US => "part per billion (US)",
            InvoiceSuiteCodelistUnitCodes::REC20_PART_PER_HUND_THOU => "part per hundred thousand",
            InvoiceSuiteCodelistUnitCodes::REC20_PART_PER_MILL => "part per million",
            InvoiceSuiteCodelistUnitCodes::REC20_PART_PER_THOU => "part per thousand",
            InvoiceSuiteCodelistUnitCodes::REC20_PASCAL => "pascal",
            InvoiceSuiteCodelistUnitCodes::REC20_PASC_CUBI_METR_PER_SECO => "pascal cubic metre per second",
            InvoiceSuiteCodelistUnitCodes::REC20_PASC_LITR_PER_SECO => "pascal litre per second",
            InvoiceSuiteCodelistUnitCodes::REC20_PASC_PER_BAR => "pascal per bar",
            InvoiceSuiteCodelistUnitCodes::REC20_PASC_PER_KELV => "pascal per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_PASC_PER_METR => "pascal per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_PASC_SECO => "pascal second",
            InvoiceSuiteCodelistUnitCodes::REC20_PASC_SECO_PER_BAR => "pascal second per bar",
            InvoiceSuiteCodelistUnitCodes::REC20_PASC_SECO_PER_CUBI_METR => "pascal second per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_PASC_SECO_PER_KELV => "pascal second per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_PASC_SECO_PER_LITR => "pascal second per litre",
            InvoiceSuiteCodelistUnitCodes::REC20_PASC_SECO_PER_METR => "pascal second per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_PASC_SQUA_METR_PER_KILO => "pascal square metre per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_PASC_SQUA_SECO => "pascal squared second",
            InvoiceSuiteCodelistUnitCodes::REC20_PASC_TO_THE_POWE_SUM_OF_STOI_NUMB => "pascal to the power sum of stoichiometric numbers",
            InvoiceSuiteCodelistUnitCodes::REC20_PEBI_PER_CUBI_METR => "pebibit per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_PEBI_PER_METR => "pebibit per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_PEBI_PER_SQUA_METR => "pebibit per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_PEBIBYTE => "pebibyte",
            InvoiceSuiteCodelistUnitCodes::REC20_PECK => "peck",
            InvoiceSuiteCodelistUnitCodes::REC20_PECK_UK => "peck (UK)",
            InvoiceSuiteCodelistUnitCodes::REC20_PECK_UK_PER_DAY => "peck (UK) per day",
            InvoiceSuiteCodelistUnitCodes::REC20_PECK_UK_PER_HOUR => "peck (UK) per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_PECK_UK_PER_MINU => "peck (UK) per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_PECK_UK_PER_SECO => "peck (UK) per second",
            InvoiceSuiteCodelistUnitCodes::REC20_PECK_US_DRY_PER_DAY => "peck (US dry) per day",
            InvoiceSuiteCodelistUnitCodes::REC20_PECK_US_DRY_PER_HOUR => "peck (US dry) per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_PECK_US_DRY_PER_MINU => "peck (US dry) per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_PECK_US_DRY_PER_SECO => "peck (US dry) per second",
            InvoiceSuiteCodelistUnitCodes::REC20_PEN_CALO => "pen calorie",
            InvoiceSuiteCodelistUnitCodes::REC20_PEN_GRAM_PROT => "pen gram (protein)",
            InvoiceSuiteCodelistUnitCodes::REC20_PENNYWEIGHT => "pennyweight",
            InvoiceSuiteCodelistUnitCodes::REC20_PER_MILL_PER_PSI => "per mille per psi",
            InvoiceSuiteCodelistUnitCodes::REC20_PERCENT => "percent",
            InvoiceSuiteCodelistUnitCodes::REC20_PERC_PER_BAR => "percent per bar",
            InvoiceSuiteCodelistUnitCodes::REC20_PERC_PER_DECA => "percent per decakelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_PERC_PER_DEGR => "percent per degree",
            InvoiceSuiteCodelistUnitCodes::REC20_PERC_PER_DEGR_CELS => "percent per degree Celsius",
            InvoiceSuiteCodelistUnitCodes::REC20_PERC_PER_HECT => "percent per hectobar",
            InvoiceSuiteCodelistUnitCodes::REC20_PERC_PER_HUND => "percent per hundred",
            InvoiceSuiteCodelistUnitCodes::REC20_PERC_PER_INCH => "percent per inch",
            InvoiceSuiteCodelistUnitCodes::REC20_PERC_PER_KELV => "percent per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_PERC_PER_METR => "percent per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_PERC_PER_MILL => "percent per millimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_PERC_PER_MONT => "percent per month",
            InvoiceSuiteCodelistUnitCodes::REC20_PERC_PER_OHM => "percent per ohm",
            InvoiceSuiteCodelistUnitCodes::REC20_PERC_PER_ONE_HUND_THOU => "percent per one hundred thousand",
            InvoiceSuiteCodelistUnitCodes::REC20_PERC_PER_TEN_THOU => "percent per ten thousand",
            InvoiceSuiteCodelistUnitCodes::REC20_PERC_PER_THOU => "percent per thousand",
            InvoiceSuiteCodelistUnitCodes::REC20_PERC_PER_VOLT => "percent per volt",
            InvoiceSuiteCodelistUnitCodes::REC20_PERC_VOLU => "percent volume",
            InvoiceSuiteCodelistUnitCodes::REC20_PERC_WEIG => "percent weight",
            InvoiceSuiteCodelistUnitCodes::REC20_PERM__C => "perm (0 ºC)",
            InvoiceSuiteCodelistUnitCodes::REC20_PERM__C => "perm (23 ºC)",
            InvoiceSuiteCodelistUnitCodes::REC20_PERSON => "person",
            InvoiceSuiteCodelistUnitCodes::REC20_PETABIT => "petabit",
            InvoiceSuiteCodelistUnitCodes::REC20_PETA_PER_SECO => "petabit per second",
            InvoiceSuiteCodelistUnitCodes::REC20_PETABYTE => "petabyte",
            InvoiceSuiteCodelistUnitCodes::REC20_PETAJOULE => "petajoule",
            InvoiceSuiteCodelistUnitCodes::REC20_PFERDESTAERKE => "Pferdestaerke",
            InvoiceSuiteCodelistUnitCodes::REC20_PFUND => "pfund",
            InvoiceSuiteCodelistUnitCodes::REC20_PH_POTE_OF_HYDR => "pH (potential of Hydrogen)",
            InvoiceSuiteCodelistUnitCodes::REC20_PHON => "phon",
            InvoiceSuiteCodelistUnitCodes::REC20_PHOT => "phot",
            InvoiceSuiteCodelistUnitCodes::REC20_PICA => "pica",
            InvoiceSuiteCodelistUnitCodes::REC20_PICOAMPERE => "picoampere",
            InvoiceSuiteCodelistUnitCodes::REC20_PICOCOULOMB => "picocoulomb",
            InvoiceSuiteCodelistUnitCodes::REC20_PICOFARAD => "picofarad",
            InvoiceSuiteCodelistUnitCodes::REC20_PICO_PER_METR => "picofarad per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_PICOHENRY => "picohenry",
            InvoiceSuiteCodelistUnitCodes::REC20_PICOLITRE => "picolitre",
            InvoiceSuiteCodelistUnitCodes::REC20_PICOMETRE => "picometre",
            InvoiceSuiteCodelistUnitCodes::REC20_PICO_PER_KILO => "picopascal per kilometre",
            InvoiceSuiteCodelistUnitCodes::REC20_PICOSECOND => "picosecond",
            InvoiceSuiteCodelistUnitCodes::REC20_PICOSIEMENS => "picosiemens",
            InvoiceSuiteCodelistUnitCodes::REC20_PICO_PER_METR => "picosiemens per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_PICOVOLT => "picovolt",
            InvoiceSuiteCodelistUnitCodes::REC20_PICOWATT => "picowatt",
            InvoiceSuiteCodelistUnitCodes::REC20_PICO_PER_SQUA_METR => "picowatt per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_PIECE => "piece",
            InvoiceSuiteCodelistUnitCodes::REC20_PIEC_DAY => "Piece Day",
            InvoiceSuiteCodelistUnitCodes::REC20_PIEC_MONT => "Piece Month",
            InvoiceSuiteCodelistUnitCodes::REC20_PIEC_WEEK => "Piece Week",
            InvoiceSuiteCodelistUnitCodes::REC20_PING => "ping",
            InvoiceSuiteCodelistUnitCodes::REC20_PINT_UK => "pint (UK)",
            InvoiceSuiteCodelistUnitCodes::REC20_PINT_UK_PER_DAY => "pint (UK) per day",
            InvoiceSuiteCodelistUnitCodes::REC20_PINT_UK_PER_HOUR => "pint (UK) per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_PINT_UK_PER_MINU => "pint (UK) per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_PINT_UK_PER_SECO => "pint (UK) per second",
            InvoiceSuiteCodelistUnitCodes::REC20_PINT_US_LIQU_PER_DAY => "pint (US liquid) per day",
            InvoiceSuiteCodelistUnitCodes::REC20_PINT_US_LIQU_PER_HOUR => "pint (US liquid) per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_PINT_US_LIQU_PER_MINU => "pint (US liquid) per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_PINT_US_LIQU_PER_SECO => "pint (US liquid) per second",
            InvoiceSuiteCodelistUnitCodes::REC20_PIPE_JOIN => "pipeline joint",
            InvoiceSuiteCodelistUnitCodes::REC20_PITCH => "pitch",
            InvoiceSuiteCodelistUnitCodes::REC20_PIXEL => "pixel",
            InvoiceSuiteCodelistUnitCodes::REC20_POISE => "poise",
            InvoiceSuiteCodelistUnitCodes::REC20_POIS_PER_BAR => "poise per bar",
            InvoiceSuiteCodelistUnitCodes::REC20_POIS_PER_KELV => "poise per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_POIS_PER_PASC => "poise per pascal",
            InvoiceSuiteCodelistUnitCodes::REC20_POND => "pond",
            InvoiceSuiteCodelistUnitCodes::REC20_PORTION => "portion",
            InvoiceSuiteCodelistUnitCodes::REC20_POUND => "pound",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_AVOI_PER_CUBI_FOOT_DEGR_FAHR => "pound (avoirdupois) per cubic foot degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_AVOI_PER_CUBI_FOOT_PSI => "pound (avoirdupois) per cubic foot psi",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_AVOI_PER_CUBI_INCH_DEGR_FAHR => "pound (avoirdupois) per cubic inch degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_AVOI_PER_CUBI_INCH_PSI => "pound (avoirdupois) per cubic inch psi",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_AVOI_PER_DAY => "pound (avoirdupois) per day",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_AVOI_PER_DEGR_FAHR => "pound (avoirdupois) per degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_AVOI_PER_GALL_UK => "pound (avoirdupois) per gallon (UK)",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_AVOI_PER_HOUR_DEGR_FAHR => "pound (avoirdupois) per hour degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_AVOI_PER_HOUR_PSI => "pound (avoirdupois) per hour psi",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_AVOI_PER_MINU => "pound (avoirdupois) per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_AVOI_PER_MINU_DEGR_FAHR => "pound (avoirdupois) per minute degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_AVOI_PER_MINU_PSI => "pound (avoirdupois) per minute psi",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_AVOI_PER_PSI => "pound (avoirdupois) per psi",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_AVOI_PER_SECO => "pound (avoirdupois) per second",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_AVOI_PER_SECO_DEGR_FAHR => "pound (avoirdupois) per second degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_AVOI_PER_SECO_PSI => "pound (avoirdupois) per second psi",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_AVOI_SQUA_FOOT => "pound (avoirdupois) square foot",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_FOOT_PER_SECO => "pound foot per second",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_INCH_PER_SECO => "pound inch per second",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_INCH_SQUA => "pound inch squared",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_MOLE => "pound mole",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_MOLE_PER_MINU => "pound mole per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_MOLE_PER_POUN => "pound mole per pound",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_MOLE_PER_SECO => "pound mole per second",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_PER_CUBI_FOOT => "pound per cubic foot",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_PER_CUBI_INCH => "pound per cubic inch",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_PER_CUBI_YARD => "pound per cubic yard",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_PER_FOOT => "pound per foot",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_PER_FOOT_DAY => "pound per foot day",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_PER_FOOT_HOUR => "pound per foot hour",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_PER_FOOT_MINU => "pound per foot minute",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_PER_FOOT_SECO => "pound per foot second",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_PER_GALL_US => "pound per gallon (US)",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_PER_HOUR => "pound per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_PER_INCH_OF_LENG => "pound per inch of length",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_PER_POUN => "pound per pound",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_PER_REAM => "pound per ream",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_PER_SQUA_FOOT => "pound per square foot",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_PER_SQUA_INCH_ABSO => "pound per square inch absolute",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_PER_SQUA_YARD => "pound per square yard",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_PER_YARD => "pound per yard",
            InvoiceSuiteCodelistUnitCodes::REC20_POUNDFORCE => "pound-force",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_FOOT => "pound-force foot",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_FOOT_PER_AMPE => "pound-force foot per ampere",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_FOOT_PER_INCH => "pound-force foot per inch",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_FOOT_PER_POUN => "pound-force foot per pound",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_INCH => "pound-force inch",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_INCH_PER_INCH => "pound-force inch per inch",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_PER_FOOT => "pound-force per foot",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_PER_INCH => "pound-force per inch",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_PER_SQUA_FOOT => "pound-force per square foot",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_PER_SQUA_INCH => "pound-force per square inch",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_PER_SQUA_INCH_DEGR_FAHR => "pound-force per square inch degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_PER_YARD => "pound-force per yard",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_SECO_PER_SQUA_FOOT => "pound-force second per square foot",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_SECO_PER_SQUA_INCH => "pound-force second per square inch",
            InvoiceSuiteCodelistUnitCodes::REC20_POUNDAL => "poundal",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_FOOT => "poundal foot",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_INCH => "poundal inch",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_PER_INCH => "poundal per inch",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_PER_SQUA_FOOT => "poundal per square foot",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_PER_SQUA_INCH => "poundal per square inch",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_SECO_PER_SQUA_FOOT => "poundal second per square foot",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_SECO_PER_SQUA_INCH => "poundal second per square inch",
            InvoiceSuiteCodelistUnitCodes::REC20_PRIN_POIN => "print point",
            InvoiceSuiteCodelistUnitCodes::REC20_PROO_GALL => "proof gallon",
            InvoiceSuiteCodelistUnitCodes::REC20_PROO_LITR => "proof litre",
            InvoiceSuiteCodelistUnitCodes::REC20_PSI_CUBI_INCH_PER_SECO => "psi cubic inch per second",
            InvoiceSuiteCodelistUnitCodes::REC20_PSI_CUBI_METR_PER_SECO => "psi cubic metre per second",
            InvoiceSuiteCodelistUnitCodes::REC20_PSI_CUBI_YARD_PER_SECO => "psi cubic yard per second",
            InvoiceSuiteCodelistUnitCodes::REC20_PSI_LITR_PER_SECO => "psi litre per second",
            InvoiceSuiteCodelistUnitCodes::REC20_PSI_PER_INCH => "psi per inch",
            InvoiceSuiteCodelistUnitCodes::REC20_PSI_PER_PSI => "psi per psi",
            InvoiceSuiteCodelistUnitCodes::REC20_QUAD__BTUI => "quad (1015 BtuIT)",
            InvoiceSuiteCodelistUnitCodes::REC20_QUAR_UK_LIQU_PER_DAY => "quart (UK liquid) per day",
            InvoiceSuiteCodelistUnitCodes::REC20_QUAR_UK_LIQU_PER_HOUR => "quart (UK liquid) per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_QUAR_UK_LIQU_PER_MINU => "quart (UK liquid) per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_QUAR_UK_LIQU_PER_SECO => "quart (UK liquid) per second",
            InvoiceSuiteCodelistUnitCodes::REC20_QUAR_UK => "quart (UK)",
            InvoiceSuiteCodelistUnitCodes::REC20_QUAR_US_LIQU_PER_DAY => "quart (US liquid) per day",
            InvoiceSuiteCodelistUnitCodes::REC20_QUAR_US_LIQU_PER_HOUR => "quart (US liquid) per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_QUAR_US_LIQU_PER_MINU => "quart (US liquid) per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_QUAR_US_LIQU_PER_SECO => "quart (US liquid) per second",
            InvoiceSuiteCodelistUnitCodes::REC20_QUAR_OF_A_YEAR => "quarter (of a year)",
            InvoiceSuiteCodelistUnitCodes::REC20_QUAR_UK => "quarter (UK)",
            InvoiceSuiteCodelistUnitCodes::REC20_QUIRE => "quire",
            InvoiceSuiteCodelistUnitCodes::REC20_RACK_UNIT => "rack unit",
            InvoiceSuiteCodelistUnitCodes::REC20_RAD => "rad",
            InvoiceSuiteCodelistUnitCodes::REC20_RADIAN => "radian",
            InvoiceSuiteCodelistUnitCodes::REC20_RADI_PER_METR => "radian per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_RADI_PER_SECO => "radian per second",
            InvoiceSuiteCodelistUnitCodes::REC20_RADI_PER_SECO_SQUA => "radian per second squared",
            InvoiceSuiteCodelistUnitCodes::REC20_RADI_SQUA_METR_PER_KILO => "radian square metre per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_RADI_SQUA_METR_PER_MOLE => "radian square metre per mole",
            InvoiceSuiteCodelistUnitCodes::REC20_RATE => "rate",
            InvoiceSuiteCodelistUnitCodes::REC20_RATION => "ration",
            InvoiceSuiteCodelistUnitCodes::REC20_REAM => "ream",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_ANGS => "reciprocal angstrom",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_BAR => "reciprocal bar",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_CENT => "reciprocal centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_CUBI_CENT => "reciprocal cubic centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_CUBI_FOOT => "reciprocal cubic foot",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_CUBI_INCH => "reciprocal cubic inch",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_CUBI_METR => "reciprocal cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_CUBI_METR_PER_SECO => "reciprocal cubic metre per second",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_CUBI_MILL => "reciprocal cubic millimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_CUBI_YARD => "reciprocal cubic yard",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_DAY => "reciprocal day",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_DEGR_FAHR => "reciprocal degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_ELEC_VOLT_PER_CUBI_METR => "reciprocal electron volt per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_HENR => "reciprocal henry",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_HOUR => "reciprocal hour",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_INCH => "reciprocal inch",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_JOUL => "reciprocal joule",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_JOUL_PER_CUBI_METR => "reciprocal joule per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_KELV_OR_KELV_TO_THE_POWE_MINU_ONE => "reciprocal kelvin or kelvin to the power minus one",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_KILO_AMPE_RECI_HOUR => "reciprocal kilovolt - ampere reciprocal hour",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_LITR => "reciprocal litre",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_MEGA_OR_MEGA_TO_THE_POWE_MINU_ONE => "reciprocal megakelvin or megakelvin to the power minus one",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_METR => "reciprocal metre",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_METR_SQUA_RECI_SECO => "reciprocal metre squared reciprocal second",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_MINU => "reciprocal minute",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_MOLE => "reciprocal mole",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_MONT => "reciprocal month",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_PASC_OR_PASC_TO_THE_POWE_MINU_ONE => "reciprocal pascal or pascal to the power minus one",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_PSI => "reciprocal psi",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_RADI => "reciprocal radian",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_SECO => "reciprocal second",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_SECO_PER_METR_SQUA => "reciprocal second per metre squared",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_SECO_PER_STER => "reciprocal second per steradian",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_SECO_PER_STER_METR_SQUA => "reciprocal second per steradian metre squared",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_SQUA_INCH => "reciprocal square inch",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_SQUA_METR => "reciprocal square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_VOLT => "reciprocal volt",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_VOLT_AMPE_RECI_SECO => "reciprocal volt - ampere reciprocal second",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_WEEK => "reciprocal week",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_YEAR => "reciprocal year",
            InvoiceSuiteCodelistUnitCodes::REC20_REM => "rem",
            InvoiceSuiteCodelistUnitCodes::REC20_REM_PER_SECO => "rem per second",
            InvoiceSuiteCodelistUnitCodes::REC20_REVE_TON_MILE => "revenue ton mile",
            InvoiceSuiteCodelistUnitCodes::REC20_REVOLUTION => "revolution",
            InvoiceSuiteCodelistUnitCodes::REC20_REVO_PER_MINU => "revolution per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_REVO_PER_MINU => "revolutions per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_REVO_PER_SECO => "revolutions per second",
            InvoiceSuiteCodelistUnitCodes::REC20_RHE => "rhe",
            InvoiceSuiteCodelistUnitCodes::REC20_ROD_UNIT_OF_DIST => "rod [unit of distance]",
            InvoiceSuiteCodelistUnitCodes::REC20_ROENTGEN => "roentgen",
            InvoiceSuiteCodelistUnitCodes::REC20_ROEN_PER_SECO => "roentgen per second",
            InvoiceSuiteCodelistUnitCodes::REC20_ROOM => "room",
            InvoiceSuiteCodelistUnitCodes::REC20_ROUND => "round",
            InvoiceSuiteCodelistUnitCodes::REC20_RUN_FOOT => "run foot",
            InvoiceSuiteCodelistUnitCodes::REC20_RUNN_OR_OPER_HOUR => "running or operating hour",
            InvoiceSuiteCodelistUnitCodes::REC20_SCORE => "score",
            InvoiceSuiteCodelistUnitCodes::REC20_SCRUPLE => "scruple",
            InvoiceSuiteCodelistUnitCodes::REC20_SECO_UNIT_OF_ANGL => "second [unit of angle]",
            InvoiceSuiteCodelistUnitCodes::REC20_SECO_UNIT_OF_TIME => "second [unit of time]",
            InvoiceSuiteCodelistUnitCodes::REC20_SECO_PER_CUBI_METR => "second per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_SECO_PER_CUBI_METR_RADI => "second per cubic metre radian",
            InvoiceSuiteCodelistUnitCodes::REC20_SECO_PER_KILO => "second per kilogramm",
            InvoiceSuiteCodelistUnitCodes::REC20_SECO_PER_RADI_CUBI_METR => "second per radian cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_SEGMENT => "segment",
            InvoiceSuiteCodelistUnitCodes::REC20_SERV_UNIT => "service unit",
            InvoiceSuiteCodelistUnitCodes::REC20_SET => "set",
            InvoiceSuiteCodelistUnitCodes::REC20_SHAKE => "shake",
            InvoiceSuiteCodelistUnitCodes::REC20_SHANNON => "shannon",
            InvoiceSuiteCodelistUnitCodes::REC20_SHAN_PER_SECO => "shannon per second",
            InvoiceSuiteCodelistUnitCodes::REC20_SHARES => "shares",
            InvoiceSuiteCodelistUnitCodes::REC20_SHIPMENT => "shipment",
            InvoiceSuiteCodelistUnitCodes::REC20_SHOT => "shot",
            InvoiceSuiteCodelistUnitCodes::REC20_SIDE_YEAR => "sidereal year",
            InvoiceSuiteCodelistUnitCodes::REC20_SIEMENS => "siemens",
            InvoiceSuiteCodelistUnitCodes::REC20_SIEM_PER_CENT => "siemens per centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_SIEM_PER_METR => "siemens per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_SIEM_SQUA_METR_PER_MOLE => "siemens square metre per mole",
            InvoiceSuiteCodelistUnitCodes::REC20_SIEVERT => "sievert",
            InvoiceSuiteCodelistUnitCodes::REC20_SIEV_PER_HOUR => "sievert per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_SIEV_PER_MINU => "sievert per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_SIEV_PER_SECO => "sievert per second",
            InvoiceSuiteCodelistUnitCodes::REC20_SITAS => "sitas",
            InvoiceSuiteCodelistUnitCodes::REC20_SKEIN => "skein",
            InvoiceSuiteCodelistUnitCodes::REC20_SLUG => "slug",
            InvoiceSuiteCodelistUnitCodes::REC20_SLUG_PER_CUBI_FOOT => "slug per cubic foot",
            InvoiceSuiteCodelistUnitCodes::REC20_SLUG_PER_DAY => "slug per day",
            InvoiceSuiteCodelistUnitCodes::REC20_SLUG_PER_FOOT_SECO => "slug per foot second",
            InvoiceSuiteCodelistUnitCodes::REC20_SLUG_PER_HOUR => "slug per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_SLUG_PER_MINU => "slug per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_SLUG_PER_SECO => "slug per second",
            InvoiceSuiteCodelistUnitCodes::REC20_SONE => "sone",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUARE => "square",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_CENT => "square centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_CENT_PER_ERG => "square centimetre per erg",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_CENT_PER_GRAM => "square centimetre per gram",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_CENT_PER_SECO => "square centimetre per second",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_CENT_PER_STER_ERG => "square centimetre per steradian erg",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_DECA => "square decametre",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_DECI => "square decimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_FOOT => "square foot",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_FOOT_PER_HOUR => "square foot per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_FOOT_PER_SECO => "square foot per second",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_HECT => "square hectometre",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_INCH => "square inch",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_INCH_PER_SECO => "square inch per second",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_KILO => "square kilometre",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_METR => "square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_METR_DAY => "Square Metre Day",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_METR_HOUR_DEGR_CELS_PER_KILO_INTE_TABL => "square metre hour degree Celsius per kilocalorie (international table)",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_METR_KELV_PER_WATT => "square metre kelvin per watt",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_METR_MONT => "Square Metre Month",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_METR_PER_CUBI_METR => "square metre per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_METR_PER_JOUL => "square metre per joule",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_METR_PER_KILO => "square metre per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_METR_PER_LITR => "square metre per litre",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_METR_PER_MOLE => "square metre per mole",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_METR_PER_NEWT => "square metre per newton",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_METR_PER_SECO => "square metre per second",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_METR_PER_SECO_BAR => "square metre per second bar",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_METR_PER_SECO_KELV => "square metre per second kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_METR_PER_SECO_PASC => "square metre per second pascal",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_METR_PER_STER => "square metre per steradian",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_METR_PER_STER_JOUL => "square metre per steradian joule",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_METR_PER_VOLT_SECO => "square metre per volt second",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_METR_WEEK => "Square Metre Week",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_MICR_SQUA_MICR => "square micrometre (square micron)",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_MILE_BASE_ON_US_SURV_FOOT => "square mile (based on U.S. survey foot)",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_MILE_STAT_MILE => "square mile (statute mile)",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_MILL => "square millimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_YARD => "square yard",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_ROOF => "square, roofing",
            InvoiceSuiteCodelistUnitCodes::REC20_STANDARD => "standard",
            InvoiceSuiteCodelistUnitCodes::REC20_STAN_ACCE_OF_FREE_FALL => "standard acceleration of free fall",
            InvoiceSuiteCodelistUnitCodes::REC20_STAN_ATMO => "standard atmosphere",
            InvoiceSuiteCodelistUnitCodes::REC20_STAN_ATMO_PER_METR => "standard atmosphere per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_STAN_CUBI_METR => "Standard cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_STAN_CUBI_METR_PER_DAY => "Standard cubic metre per day",
            InvoiceSuiteCodelistUnitCodes::REC20_STAN_CUBI_METR_PER_HOUR => "Standard cubic metre per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_STAN_KILO => "standard kilolitre",
            InvoiceSuiteCodelistUnitCodes::REC20_STAN_LITR => "standard litre",
            InvoiceSuiteCodelistUnitCodes::REC20_STERADIAN => "steradian",
            InvoiceSuiteCodelistUnitCodes::REC20_STERE => "stere",
            InvoiceSuiteCodelistUnitCodes::REC20_STICK => "stick",
            InvoiceSuiteCodelistUnitCodes::REC20_STIC_CIGA => "stick, cigarette",
            InvoiceSuiteCodelistUnitCodes::REC20_STIC_MILI => "stick, military",
            InvoiceSuiteCodelistUnitCodes::REC20_STILB => "stilb",
            InvoiceSuiteCodelistUnitCodes::REC20_STOKES => "stokes",
            InvoiceSuiteCodelistUnitCodes::REC20_STOK_PER_BAR => "stokes per bar",
            InvoiceSuiteCodelistUnitCodes::REC20_STOK_PER_KELV => "stokes per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_STOK_PER_PASC => "stokes per pascal",
            InvoiceSuiteCodelistUnitCodes::REC20_STON_UK => "stone (UK)",
            InvoiceSuiteCodelistUnitCodes::REC20_STRAND => "strand",
            InvoiceSuiteCodelistUnitCodes::REC20_STRAW => "straw",
            InvoiceSuiteCodelistUnitCodes::REC20_STRIP => "strip",
            InvoiceSuiteCodelistUnitCodes::REC20_SYRINGE => "syringe",
            InvoiceSuiteCodelistUnitCodes::REC20_TABL_US => "tablespoon (US)",
            InvoiceSuiteCodelistUnitCodes::REC20_TABLET => "tablet",
            InvoiceSuiteCodelistUnitCodes::REC20_TEAS_US => "teaspoon (US)",
            InvoiceSuiteCodelistUnitCodes::REC20_TEBI_PER_CUBI_METR => "tebibit per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_TEBI_PER_METR => "tebibit per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_TEBI_PER_SQUA_METR => "tebibit per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_TEBIBYTE => "tebibyte",
            InvoiceSuiteCodelistUnitCodes::REC20_TECH_ATMO_PER_METR => "technical atmosphere per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_TEET_PER_INCH => "teeth per inch",
            InvoiceSuiteCodelistUnitCodes::REC20_TELE_LINE_IN_SERV => "telecommunication line in service",
            InvoiceSuiteCodelistUnitCodes::REC20_TELE_LINE_IN_SERV_AVER => "telecommunication line in service average",
            InvoiceSuiteCodelistUnitCodes::REC20_TELE_PORT => "telecommunication port",
            InvoiceSuiteCodelistUnitCodes::REC20_TEN_DAY => "ten day",
            InvoiceSuiteCodelistUnitCodes::REC20_TEN_PACK => "ten pack",
            InvoiceSuiteCodelistUnitCodes::REC20_TEN_PAIR => "ten pair",
            InvoiceSuiteCodelistUnitCodes::REC20_TEN_SET => "ten set",
            InvoiceSuiteCodelistUnitCodes::REC20_TEN_THOU_STIC => "ten thousand sticks",
            InvoiceSuiteCodelistUnitCodes::REC20_TERABIT => "terabit",
            InvoiceSuiteCodelistUnitCodes::REC20_TERA_PER_SECO => "terabit per second",
            InvoiceSuiteCodelistUnitCodes::REC20_TERABYTE => "terabyte",
            InvoiceSuiteCodelistUnitCodes::REC20_TERAHERTZ => "terahertz",
            InvoiceSuiteCodelistUnitCodes::REC20_TERAJOULE => "terajoule",
            InvoiceSuiteCodelistUnitCodes::REC20_TERAOHM => "teraohm",
            InvoiceSuiteCodelistUnitCodes::REC20_TERAWATT => "terawatt",
            InvoiceSuiteCodelistUnitCodes::REC20_TERA_HOUR => "terawatt hour",
            InvoiceSuiteCodelistUnitCodes::REC20_TESLA => "tesla",
            InvoiceSuiteCodelistUnitCodes::REC20_TEST => "test",
            InvoiceSuiteCodelistUnitCodes::REC20_TEU => "TEU",
            InvoiceSuiteCodelistUnitCodes::REC20_TEX => "tex",
            InvoiceSuiteCodelistUnitCodes::REC20_THEO_POUN => "theoretical pound",
            InvoiceSuiteCodelistUnitCodes::REC20_THEO_TON => "theoretical ton",
            InvoiceSuiteCodelistUnitCodes::REC20_THER_EC => "therm (EC)",
            InvoiceSuiteCodelistUnitCodes::REC20_THER_US => "therm (U.S.)",
            InvoiceSuiteCodelistUnitCodes::REC20_THOUSAND => "thousand",
            InvoiceSuiteCodelistUnitCodes::REC20_THOU_BOAR_FOOT => "thousand board foot",
            InvoiceSuiteCodelistUnitCodes::REC20_THOU_CUBI_FOOT => "thousand cubic foot",
            InvoiceSuiteCodelistUnitCodes::REC20_THOU_CUBI_METR => "thousand cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_THOU_CUBI_METR_PER_DAY => "thousand cubic metre per day",
            InvoiceSuiteCodelistUnitCodes::REC20_THOU_PIEC => "thousand piece",
            InvoiceSuiteCodelistUnitCodes::REC20_THOU_SQUA_INCH => "thousand square inch",
            InvoiceSuiteCodelistUnitCodes::REC20_THOU_STAN_BRIC_EQUI => "thousand standard brick equivalent",
            InvoiceSuiteCodelistUnitCodes::REC20_TON_UK_LONG_PER_CUBI_YARD => "ton (UK long) per cubic yard",
            InvoiceSuiteCodelistUnitCodes::REC20_TON_UK_SHIP => "ton (UK shipping)",
            InvoiceSuiteCodelistUnitCodes::REC20_TON_UK_OR_LONG_TON_US => "ton (UK) or long ton (US)",
            InvoiceSuiteCodelistUnitCodes::REC20_TON_US_SHIP => "ton (US shipping)",
            InvoiceSuiteCodelistUnitCodes::REC20_TON_US_SHOR_PER_CUBI_YARD => "ton (US short) per cubic yard",
            InvoiceSuiteCodelistUnitCodes::REC20_TON_US_OR_SHOR_TON_UKUS => "ton (US) or short ton (UK/US)",
            InvoiceSuiteCodelistUnitCodes::REC20_TON_US_PER_HOUR => "ton (US) per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_TON_LONG_PER_DAY => "ton long per day",
            InvoiceSuiteCodelistUnitCodes::REC20_TON_SHOR_PER_DAY => "ton short per day",
            InvoiceSuiteCodelistUnitCodes::REC20_TON_SHOR_PER_DEGR_FAHR => "ton short per degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_TON_SHOR_PER_HOUR_DEGR_FAHR => "ton short per hour degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_TON_SHOR_PER_HOUR_PSI => "ton short per hour psi",
            InvoiceSuiteCodelistUnitCodes::REC20_TON_SHOR_PER_PSI => "ton short per psi",
            InvoiceSuiteCodelistUnitCodes::REC20_TON_ASSA => "ton, assay",
            InvoiceSuiteCodelistUnitCodes::REC20_TON_REGI => "ton, register",
            InvoiceSuiteCodelistUnitCodes::REC20_TONF_US_SHOR => "ton-force (US short)",
            InvoiceSuiteCodelistUnitCodes::REC20_TONN_METR_TON => "tonne (metric ton)",
            InvoiceSuiteCodelistUnitCodes::REC20_TONN_KILO => "tonne kilometre",
            InvoiceSuiteCodelistUnitCodes::REC20_TONN_PER_BAR => "tonne per bar",
            InvoiceSuiteCodelistUnitCodes::REC20_TONN_PER_CUBI_METR => "tonne per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_TONN_PER_CUBI_METR_BAR => "tonne per cubic metre bar",
            InvoiceSuiteCodelistUnitCodes::REC20_TONN_PER_CUBI_METR_KELV => "tonne per cubic metre kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_TONN_PER_DAY => "tonne per day",
            InvoiceSuiteCodelistUnitCodes::REC20_TONN_PER_DAY_BAR => "tonne per day bar",
            InvoiceSuiteCodelistUnitCodes::REC20_TONN_PER_DAY_KELV => "tonne per day kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_TONN_PER_HOUR => "tonne per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_TONN_PER_HOUR_BAR => "tonne per hour bar",
            InvoiceSuiteCodelistUnitCodes::REC20_TONN_PER_HOUR_KELV => "tonne per hour kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_TONN_PER_KELV => "tonne per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_TONN_PER_MINU => "tonne per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_TONN_PER_MINU_BAR => "tonne per minute bar",
            InvoiceSuiteCodelistUnitCodes::REC20_TONN_PER_MINU_KELV => "tonne per minute kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_TONN_PER_MONT => "tonne per month",
            InvoiceSuiteCodelistUnitCodes::REC20_TONN_PER_SECO => "tonne per second",
            InvoiceSuiteCodelistUnitCodes::REC20_TONN_PER_SECO_BAR => "tonne per second bar",
            InvoiceSuiteCodelistUnitCodes::REC20_TONN_PER_SECO_KELV => "tonne per second kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_TONN_PER_YEAR => "tonne per year",
            InvoiceSuiteCodelistUnitCodes::REC20_TORR_PER_METR => "torr per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_TOTA_ACID_NUMB => "total acid number",
            InvoiceSuiteCodelistUnitCodes::REC20_TREATMENT => "treatment",
            InvoiceSuiteCodelistUnitCodes::REC20_TRIL_EUR => "trillion (EUR)",
            InvoiceSuiteCodelistUnitCodes::REC20_TRIP => "trip",
            InvoiceSuiteCodelistUnitCodes::REC20_TROP_YEAR => "tropical year",
            InvoiceSuiteCodelistUnitCodes::REC20_TROY_OUNC_OR_APOT_OUNC => "troy ounce or apothecary ounce",
            InvoiceSuiteCodelistUnitCodes::REC20_TROY_POUN_US => "troy pound (US)",
            InvoiceSuiteCodelistUnitCodes::REC20_TWEN_FOOT_CONT => "twenty foot container",
            InvoiceSuiteCodelistUnitCodes::REC20_TYRE => "tyre",
            InvoiceSuiteCodelistUnitCodes::REC20_UNIF_ATOM_MASS_UNIT => "unified atomic mass unit",
            InvoiceSuiteCodelistUnitCodes::REC20_UNIT_POLE => "unit pole",
            InvoiceSuiteCodelistUnitCodes::REC20_US_GALL_PER_MINU => "US gallon per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_USE => "use",
            InvoiceSuiteCodelistUnitCodes::REC20_VAR => "var",
            InvoiceSuiteCodelistUnitCodes::REC20_VOLT => "volt",
            InvoiceSuiteCodelistUnitCodes::REC20_VOLT_AMPE => "volt - ampere",
            InvoiceSuiteCodelistUnitCodes::REC20_VOLT_AMPE_PER_KILO => "volt - ampere per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_VOLT_AC => "volt AC",
            InvoiceSuiteCodelistUnitCodes::REC20_VOLT_DC => "volt DC",
            InvoiceSuiteCodelistUnitCodes::REC20_VOLT_PER_BAR => "volt per bar",
            InvoiceSuiteCodelistUnitCodes::REC20_VOLT_PER_CENT => "volt per centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_VOLT_PER_INCH => "volt per inch",
            InvoiceSuiteCodelistUnitCodes::REC20_VOLT_PER_KELV => "volt per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_VOLT_PER_LITR_MINU => "volt per litre minute",
            InvoiceSuiteCodelistUnitCodes::REC20_VOLT_PER_METR => "volt per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_VOLT_PER_MICR => "volt per microsecond",
            InvoiceSuiteCodelistUnitCodes::REC20_VOLT_PER_MILL => "volt per millimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_VOLT_PER_PASC => "volt per pascal",
            InvoiceSuiteCodelistUnitCodes::REC20_VOLT_PER_SECO => "volt per second",
            InvoiceSuiteCodelistUnitCodes::REC20_VOLT_SECO_PER_METR => "volt second per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_VOLT_SQUA_INCH_PER_POUN => "volt square inch per pound-force",
            InvoiceSuiteCodelistUnitCodes::REC20_VOLT_SQUA_PER_KELV_SQUA => "volt squared per kelvin squared",
            InvoiceSuiteCodelistUnitCodes::REC20_WATE_HORS_POWE => "water horse power",
            InvoiceSuiteCodelistUnitCodes::REC20_WATT => "watt",
            InvoiceSuiteCodelistUnitCodes::REC20_WATT_HOUR => "watt hour",
            InvoiceSuiteCodelistUnitCodes::REC20_WATT_PER_CUBI_METR => "watt per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_WATT_PER_KELV => "watt per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_WATT_PER_KILO => "watt per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_WATT_PER_METR => "watt per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_WATT_PER_METR_DEGR_CELS => "watt per metre degree Celsius",
            InvoiceSuiteCodelistUnitCodes::REC20_WATT_PER_METR_KELV => "watt per metre kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_WATT_PER_SQUA_CENT => "watt per square centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_WATT_PER_SQUA_INCH => "watt per square inch",
            InvoiceSuiteCodelistUnitCodes::REC20_WATT_PER_SQUA_METR => "watt per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_WATT_PER_SQUA_METR_KELV => "watt per square metre kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_WATT_PER_SQUA_METR_KELV_TO_THE_FOUR_POWE => "watt per square metre kelvin to the fourth power",
            InvoiceSuiteCodelistUnitCodes::REC20_WATT_PER_STER => "watt per steradian",
            InvoiceSuiteCodelistUnitCodes::REC20_WATT_PER_STER_SQUA_METR => "watt per steradian square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_WATT_SECO => "watt second",
            InvoiceSuiteCodelistUnitCodes::REC20_WATT_SQUA_METR => "watt square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_WEBER => "weber",
            InvoiceSuiteCodelistUnitCodes::REC20_WEBE_METR => "weber metre",
            InvoiceSuiteCodelistUnitCodes::REC20_WEBE_PER_METR => "weber per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_WEBE_PER_MILL => "weber per millimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_WEBE_TO_THE_POWE_MINU_ONE => "weber to the power minus one",
            InvoiceSuiteCodelistUnitCodes::REC20_WEEK => "week",
            InvoiceSuiteCodelistUnitCodes::REC20_WELL => "well",
            InvoiceSuiteCodelistUnitCodes::REC20_WET_KILO => "wet kilo",
            InvoiceSuiteCodelistUnitCodes::REC20_WET_POUN => "wet pound",
            InvoiceSuiteCodelistUnitCodes::REC20_WET_TON => "wet ton",
            InvoiceSuiteCodelistUnitCodes::REC20_WINE_GALL => "wine gallon",
            InvoiceSuiteCodelistUnitCodes::REC20_WORK_DAY => "working day",
            InvoiceSuiteCodelistUnitCodes::REC20_WORK_MONT => "working month",
            InvoiceSuiteCodelistUnitCodes::REC20_YARD => "yard",
            InvoiceSuiteCodelistUnitCodes::REC20_YARD_PER_DEGR_FAHR => "yard per degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_YARD_PER_HOUR => "yard per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_YARD_PER_MINU => "yard per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_YARD_PER_PSI => "yard per psi",
            InvoiceSuiteCodelistUnitCodes::REC20_YARD_PER_SECO => "yard per second",
            InvoiceSuiteCodelistUnitCodes::REC20_YARD_PER_SECO_SQUA => "yard per second squared",
            InvoiceSuiteCodelistUnitCodes::REC20_YEAR => "year",
            InvoiceSuiteCodelistUnitCodes::REC20_ZONE => "zone",
            InvoiceSuiteCodelistUnitCodes::REC21_EURO_PALL => "1/4 EURO Pallet",
            InvoiceSuiteCodelistUnitCodes::REC21_EURO_PALL => "1/8 EURO Pallet",
            InvoiceSuiteCodelistUnitCodes::REC21_A_WHEE_PALL_WITH_RAIS_RIM__X__X_35 => "A wheeled pallet with raised rim (81 x 67 x 135)",
            InvoiceSuiteCodelistUnitCodes::REC21_A_WHEE_PALL_WITH_RAIS_RIM__X__X_35 => "A Wheeled pallet with raised rim (81 x 72 x 135)",
            InvoiceSuiteCodelistUnitCodes::REC21_AEROSOL => "Aerosol",
            InvoiceSuiteCodelistUnitCodes::REC21_AMPO_NONP => "Ampoule, non-protected",
            InvoiceSuiteCodelistUnitCodes::REC21_AMPO_PROT => "Ampoule, protected",
            InvoiceSuiteCodelistUnitCodes::REC21_ATOMIZER => "Atomizer",
            InvoiceSuiteCodelistUnitCodes::REC21_BAG => "Bag",
            InvoiceSuiteCodelistUnitCodes::REC21_BAG_FLEX_CONT => "Bag, flexible container",
            InvoiceSuiteCodelistUnitCodes::REC21_BAG_GUNN => "Bag, gunny",
            InvoiceSuiteCodelistUnitCodes::REC21_BAG_JUMB => "Bag, jumbo",
            InvoiceSuiteCodelistUnitCodes::REC21_BAG_LARG => "Bag, large",
            InvoiceSuiteCodelistUnitCodes::REC21_BAG_MULT => "Bag, multiply",
            InvoiceSuiteCodelistUnitCodes::REC21_BAG_PAPE => "Bag, paper",
            InvoiceSuiteCodelistUnitCodes::REC21_BAG_PAPE_MULT => "Bag, paper, multi-wall",
            InvoiceSuiteCodelistUnitCodes::REC21_BAG_PAPE_MULT_WATE_RESI => "Bag, paper, multi-wall, water resistant",
            InvoiceSuiteCodelistUnitCodes::REC21_BAG_PLAS => "Bag, plastic",
            InvoiceSuiteCodelistUnitCodes::REC21_BAG_PLAS_FILM => "Bag, plastics film",
            InvoiceSuiteCodelistUnitCodes::REC21_BAG_POLY => "Bag, polybag",
            InvoiceSuiteCodelistUnitCodes::REC21_BAG_SUPE_BULK => "Bag, super bulk",
            InvoiceSuiteCodelistUnitCodes::REC21_BAG_TEXT => "Bag, textile",
            InvoiceSuiteCodelistUnitCodes::REC21_BAG_TEXT_SIFT_PROO => "Bag, textile, sift proof",
            InvoiceSuiteCodelistUnitCodes::REC21_BAG_TEXT_WATE_RESI => "Bag, textile, water resistant",
            InvoiceSuiteCodelistUnitCodes::REC21_BAG_TEXT_WITH_INNE_COAT => "Bag, textile, without inner coat/liner",
            InvoiceSuiteCodelistUnitCodes::REC21_BAG_TOTE => "Bag, tote",
            InvoiceSuiteCodelistUnitCodes::REC21_BAG_WOVE_PLAS => "Bag, woven plastic",
            InvoiceSuiteCodelistUnitCodes::REC21_BAG_WOVE_PLAS_SIFT_PROO => "Bag, woven plastic, sift proof",
            InvoiceSuiteCodelistUnitCodes::REC21_BAG_WOVE_PLAS_WATE_RESI => "Bag, woven plastic, water resistant",
            InvoiceSuiteCodelistUnitCodes::REC21_BAG_WOVE_PLAS_WITH_INNE_COAT => "Bag, woven plastic, without inner coat/liner",
            InvoiceSuiteCodelistUnitCodes::REC21_BALE_COMP => "Bale, compressed",
            InvoiceSuiteCodelistUnitCodes::REC21_BALE_NONC => "Bale, non-compressed",
            InvoiceSuiteCodelistUnitCodes::REC21_BALL => "Ball",
            InvoiceSuiteCodelistUnitCodes::REC21_BALL_NONP => "Balloon, non-protected",
            InvoiceSuiteCodelistUnitCodes::REC21_BALL_PROT => "Balloon, protected",
            InvoiceSuiteCodelistUnitCodes::REC21_BAR => "Bar",
            InvoiceSuiteCodelistUnitCodes::REC21_BARREL => "Barrel",
            InvoiceSuiteCodelistUnitCodes::REC21_BARR_WOOD => "Barrel, wooden",
            InvoiceSuiteCodelistUnitCodes::REC21_BARR_WOOD_BUNG_TYPE => "Barrel, wooden, bung type",
            InvoiceSuiteCodelistUnitCodes::REC21_BARR_WOOD_REMO_HEAD => "Barrel, wooden, removable head",
            InvoiceSuiteCodelistUnitCodes::REC21_BARS_IN_BUND => "Bars, in bundle/bunch/truss",
            InvoiceSuiteCodelistUnitCodes::REC21_BASIN => "Basin",
            InvoiceSuiteCodelistUnitCodes::REC21_BASKET => "Basket",
            InvoiceSuiteCodelistUnitCodes::REC21_BASK_WITH_HAND_CARD => "Basket, with handle, cardboard",
            InvoiceSuiteCodelistUnitCodes::REC21_BASK_WITH_HAND_PLAS => "Basket, with handle, plastic",
            InvoiceSuiteCodelistUnitCodes::REC21_BASK_WITH_HAND_WOOD => "Basket, with handle, wooden",
            InvoiceSuiteCodelistUnitCodes::REC21_BELT => "Belt",
            InvoiceSuiteCodelistUnitCodes::REC21_BIN => "Bin",
            InvoiceSuiteCodelistUnitCodes::REC21_BLOCK => "Block",
            InvoiceSuiteCodelistUnitCodes::REC21_BOARD => "Board",
            InvoiceSuiteCodelistUnitCodes::REC21_BOAR_IN_BUND => "Board, in bundle/bunch/truss",
            InvoiceSuiteCodelistUnitCodes::REC21_BOBBIN => "Bobbin",
            InvoiceSuiteCodelistUnitCodes::REC21_BOLT => "Bolt",
            InvoiceSuiteCodelistUnitCodes::REC21_BOTT_GAS => "Bottle, gas",
            InvoiceSuiteCodelistUnitCodes::REC21_BOTT_NONP_BULB => "Bottle, non-protected, bulbous",
            InvoiceSuiteCodelistUnitCodes::REC21_BOTT_NONP_CYLI => "Bottle, non-protected, cylindrical",
            InvoiceSuiteCodelistUnitCodes::REC21_BOTT_PROT_BULB => "Bottle, protected bulbous",
            InvoiceSuiteCodelistUnitCodes::REC21_BOTT_PROT_CYLI => "Bottle, protected cylindrical",
            InvoiceSuiteCodelistUnitCodes::REC21_BOTT_BOTT => "Bottlecrate / bottlerack",
            InvoiceSuiteCodelistUnitCodes::REC21_BOX => "Box",
            InvoiceSuiteCodelistUnitCodes::REC21_BOX_ALUM => "Box, aluminium",
            InvoiceSuiteCodelistUnitCodes::REC21_BOX_COMM_HAND_EQUI_POOL_CHEP_EURO => "Box, Commonwealth Handling Equipment Pool (CHEP), Eurobox",
            InvoiceSuiteCodelistUnitCodes::REC21_BOX_FIBR => "Box, fibreboard",
            InvoiceSuiteCodelistUnitCodes::REC21_BOX_FOR_LIQU => "Box, for liquids",
            InvoiceSuiteCodelistUnitCodes::REC21_BOX_NATU_WOOD => "Box, natural wood",
            InvoiceSuiteCodelistUnitCodes::REC21_BOX_PLAS => "Box, plastic",
            InvoiceSuiteCodelistUnitCodes::REC21_BOX_PLAS_EXPA => "Box, plastic, expanded",
            InvoiceSuiteCodelistUnitCodes::REC21_BOX_PLAS_SOLI => "Box, plastic, solid",
            InvoiceSuiteCodelistUnitCodes::REC21_BOX_PLYW => "Box, plywood",
            InvoiceSuiteCodelistUnitCodes::REC21_BOX_RECO_WOOD => "Box, reconstituted wood",
            InvoiceSuiteCodelistUnitCodes::REC21_BOX_STEE => "Box, steel",
            InvoiceSuiteCodelistUnitCodes::REC21_BOX_WOOD_NATU_WOOD_ORDI => "Box, wooden, natural wood, ordinary",
            InvoiceSuiteCodelistUnitCodes::REC21_BOX_WOOD_NATU_WOOD_WITH_SIFT_PROO_WALL => "Box, wooden, natural wood, with sift proof walls",
            InvoiceSuiteCodelistUnitCodes::REC21_BUCKET => "Bucket",
            InvoiceSuiteCodelistUnitCodes::REC21_BULK_GAS_AT__MBAR_AND_5C => "Bulk, gas (at 1031 mbar and 15°C)",
            InvoiceSuiteCodelistUnitCodes::REC21_BULK_LIQU_GAS_AT_ABNO_TEMP => "Bulk, liquefied gas (at abnormal temperature/pressure)",
            InvoiceSuiteCodelistUnitCodes::REC21_BULK_LIQU => "Bulk, liquid",
            InvoiceSuiteCodelistUnitCodes::REC21_BULK_SCRA_META => "Bulk, scrap metal",
            InvoiceSuiteCodelistUnitCodes::REC21_BULK_SOLI_FINE_PART_POWD => "Bulk, solid, fine particles (“powders”)",
            InvoiceSuiteCodelistUnitCodes::REC21_BULK_SOLI_GRAN_PART_GRAI => "Bulk, solid, granular particles (“grains”)",
            InvoiceSuiteCodelistUnitCodes::REC21_BULK_SOLI_LARG_PART_NODU => "Bulk, solid, large particles (“nodules”)",
            InvoiceSuiteCodelistUnitCodes::REC21_BUNCH => "Bunch",
            InvoiceSuiteCodelistUnitCodes::REC21_BUNDLE => "Bundle",
            InvoiceSuiteCodelistUnitCodes::REC21_BUND_WOOD => "Bundle, wooden",
            InvoiceSuiteCodelistUnitCodes::REC21_BUTT => "Butt",
            InvoiceSuiteCodelistUnitCodes::REC21_CAGE => "Cage",
            InvoiceSuiteCodelistUnitCodes::REC21_CAGE_COMM_HAND_EQUI_POOL_CHEP => "Cage, Commonwealth Handling Equipment Pool (CHEP)",
            InvoiceSuiteCodelistUnitCodes::REC21_CAGE_ROLL => "Cage, roll",
            InvoiceSuiteCodelistUnitCodes::REC21_CAN_CYLI => "Can, cylindrical",
            InvoiceSuiteCodelistUnitCodes::REC21_CAN_RECT => "Can, rectangular",
            InvoiceSuiteCodelistUnitCodes::REC21_CAN_WITH_HAND_AND_SPOU => "Can, with handle and spout",
            InvoiceSuiteCodelistUnitCodes::REC21_CANISTER => "Canister",
            InvoiceSuiteCodelistUnitCodes::REC21_CANVAS => "Canvas",
            InvoiceSuiteCodelistUnitCodes::REC21_CAPSULE => "Capsule",
            InvoiceSuiteCodelistUnitCodes::REC21_CARB_NONP => "Carboy, non-protected",
            InvoiceSuiteCodelistUnitCodes::REC21_CARB_PROT => "Carboy, protected",
            InvoiceSuiteCodelistUnitCodes::REC21_CARD => "Card",
            InvoiceSuiteCodelistUnitCodes::REC21_CART_FLAT => "Cart, flatbed",
            InvoiceSuiteCodelistUnitCodes::REC21_CARTON => "Carton",
            InvoiceSuiteCodelistUnitCodes::REC21_CARTRIDGE => "Cartridge",
            InvoiceSuiteCodelistUnitCodes::REC21_CASE => "Case",
            InvoiceSuiteCodelistUnitCodes::REC21_CASE_CAR => "Case, car",
            InvoiceSuiteCodelistUnitCodes::REC21_CASE_ISOT => "Case, isothermic",
            InvoiceSuiteCodelistUnitCodes::REC21_CASE_SKEL => "Case, skeleton",
            InvoiceSuiteCodelistUnitCodes::REC21_CASE_STEE => "Case, steel",
            InvoiceSuiteCodelistUnitCodes::REC21_CASE_WITH_PALL_BASE => "Case, with pallet base",
            InvoiceSuiteCodelistUnitCodes::REC21_CASE_WITH_PALL_BASE_CARD => "Case, with pallet base, cardboard",
            InvoiceSuiteCodelistUnitCodes::REC21_CASE_WITH_PALL_BASE_META => "Case, with pallet base, metal",
            InvoiceSuiteCodelistUnitCodes::REC21_CASE_WITH_PALL_BASE_PLAS => "Case, with pallet base, plastic",
            InvoiceSuiteCodelistUnitCodes::REC21_CASE_WITH_PALL_BASE_WOOD => "Case, with pallet base, wooden",
            InvoiceSuiteCodelistUnitCodes::REC21_CASE_WOOD => "Case, wooden",
            InvoiceSuiteCodelistUnitCodes::REC21_CASK => "Cask",
            InvoiceSuiteCodelistUnitCodes::REC21_CHEP_PALL__CM_X__CM => "CHEP pallet 60 cm x 80 cm",
            InvoiceSuiteCodelistUnitCodes::REC21_CHEST => "Chest",
            InvoiceSuiteCodelistUnitCodes::REC21_CHURN => "Churn",
            InvoiceSuiteCodelistUnitCodes::REC21_CLAMSHELL => "Clamshell",
            InvoiceSuiteCodelistUnitCodes::REC21_COFFER => "Coffer",
            InvoiceSuiteCodelistUnitCodes::REC21_COFFIN => "Coffin",
            InvoiceSuiteCodelistUnitCodes::REC21_COIL => "Coil",
            InvoiceSuiteCodelistUnitCodes::REC21_COMP_PACK_GLAS_RECE => "Composite packaging, glass receptacle",
            InvoiceSuiteCodelistUnitCodes::REC21_COMP_PACK_GLAS_RECE_IN_ALUM_CRAT => "Composite packaging, glass receptacle in aluminium crate",
            InvoiceSuiteCodelistUnitCodes::REC21_COMP_PACK_GLAS_RECE_IN_ALUM_DRUM => "Composite packaging, glass receptacle in aluminium drum",
            InvoiceSuiteCodelistUnitCodes::REC21_COMP_PACK_GLAS_RECE_IN_EXPA_PLAS_PACK => "Composite packaging, glass receptacle in expandable plastic pack",
            InvoiceSuiteCodelistUnitCodes::REC21_COMP_PACK_GLAS_RECE_IN_FIBR_DRUM => "Composite packaging, glass receptacle in fibre drum",
            InvoiceSuiteCodelistUnitCodes::REC21_COMP_PACK_GLAS_RECE_IN_FIBR_BOX => "Composite packaging, glass receptacle in fibreboard box",
            InvoiceSuiteCodelistUnitCodes::REC21_COMP_PACK_GLAS_RECE_IN_PLYW_DRUM => "Composite packaging, glass receptacle in plywood drum",
            InvoiceSuiteCodelistUnitCodes::REC21_COMP_PACK_GLAS_RECE_IN_SOLI_PLAS_PACK => "Composite packaging, glass receptacle in solid plastic pack",
            InvoiceSuiteCodelistUnitCodes::REC21_COMP_PACK_GLAS_RECE_IN_STEE_CRAT_BOX => "Composite packaging, glass receptacle in steel crate box",
            InvoiceSuiteCodelistUnitCodes::REC21_COMP_PACK_GLAS_RECE_IN_STEE_DRUM => "Composite packaging, glass receptacle in steel drum",
            InvoiceSuiteCodelistUnitCodes::REC21_COMP_PACK_GLAS_RECE_IN_WICK_HAMP => "Composite packaging, glass receptacle in wickerwork hamper",
            InvoiceSuiteCodelistUnitCodes::REC21_COMP_PACK_GLAS_RECE_IN_WOOD_BOX => "Composite packaging, glass receptacle in wooden box",
            InvoiceSuiteCodelistUnitCodes::REC21_COMP_PACK_PLAS_RECE => "Composite packaging, plastic receptacle",
            InvoiceSuiteCodelistUnitCodes::REC21_COMP_PACK_PLAS_RECE_IN_ALUM_CRAT => "Composite packaging, plastic receptacle in aluminium crate",
            InvoiceSuiteCodelistUnitCodes::REC21_COMP_PACK_PLAS_RECE_IN_ALUM_DRUM => "Composite packaging, plastic receptacle in aluminium drum",
            InvoiceSuiteCodelistUnitCodes::REC21_COMP_PACK_PLAS_RECE_IN_FIBR_DRUM => "Composite packaging, plastic receptacle in fibre drum",
            InvoiceSuiteCodelistUnitCodes::REC21_COMP_PACK_PLAS_RECE_IN_FIBR_BOX => "Composite packaging, plastic receptacle in fibreboard box",
            InvoiceSuiteCodelistUnitCodes::REC21_COMP_PACK_PLAS_RECE_IN_PLAS_DRUM => "Composite packaging, plastic receptacle in plastic drum",
            InvoiceSuiteCodelistUnitCodes::REC21_COMP_PACK_PLAS_RECE_IN_PLYW_BOX => "Composite packaging, plastic receptacle in plywood box",
            InvoiceSuiteCodelistUnitCodes::REC21_COMP_PACK_PLAS_RECE_IN_PLYW_DRUM => "Composite packaging, plastic receptacle in plywood drum",
            InvoiceSuiteCodelistUnitCodes::REC21_COMP_PACK_PLAS_RECE_IN_SOLI_PLAS_BOX => "Composite packaging, plastic receptacle in solid plastic box",
            InvoiceSuiteCodelistUnitCodes::REC21_COMP_PACK_PLAS_RECE_IN_STEE_CRAT_BOX => "Composite packaging, plastic receptacle in steel crate box",
            InvoiceSuiteCodelistUnitCodes::REC21_COMP_PACK_PLAS_RECE_IN_STEE_DRUM => "Composite packaging, plastic receptacle in steel drum",
            InvoiceSuiteCodelistUnitCodes::REC21_COMP_PACK_PLAS_RECE_IN_WOOD_BOX => "Composite packaging, plastic receptacle in wooden box",
            InvoiceSuiteCodelistUnitCodes::REC21_CONE => "Cone",
            InvoiceSuiteCodelistUnitCodes::REC21_CONT_FLEX => "Container, flexible",
            InvoiceSuiteCodelistUnitCodes::REC21_CONT_GALL => "Container, gallon",
            InvoiceSuiteCodelistUnitCodes::REC21_CONT_META => "Container, metal",
            InvoiceSuiteCodelistUnitCodes::REC21_CONT_NOT_OTHE_SPEC_AS_TRAN_EQUI => "Container, not otherwise specified as transport equipment",
            InvoiceSuiteCodelistUnitCodes::REC21_CONT_OUTE => "Container, outer",
            InvoiceSuiteCodelistUnitCodes::REC21_COVER => "Cover",
            InvoiceSuiteCodelistUnitCodes::REC21_CRATE => "Crate",
            InvoiceSuiteCodelistUnitCodes::REC21_CRAT_BEER => "Crate, beer",
            InvoiceSuiteCodelistUnitCodes::REC21_CRAT_BULK_CARD => "Crate, bulk, cardboard",
            InvoiceSuiteCodelistUnitCodes::REC21_CRAT_BULK_PLAS => "Crate, bulk, plastic",
            InvoiceSuiteCodelistUnitCodes::REC21_CRAT_BULK_WOOD => "Crate, bulk, wooden",
            InvoiceSuiteCodelistUnitCodes::REC21_CRAT_FRAM => "Crate, framed",
            InvoiceSuiteCodelistUnitCodes::REC21_CRAT_FRUI => "Crate, fruit",
            InvoiceSuiteCodelistUnitCodes::REC21_CRAT_META => "Crate, metal",
            InvoiceSuiteCodelistUnitCodes::REC21_CRAT_MILK => "Crate, milk",
            InvoiceSuiteCodelistUnitCodes::REC21_CRAT_MULT_LAYE_CARD => "Crate, multiple layer, cardboard",
            InvoiceSuiteCodelistUnitCodes::REC21_CRAT_MULT_LAYE_PLAS => "Crate, multiple layer, plastic",
            InvoiceSuiteCodelistUnitCodes::REC21_CRAT_MULT_LAYE_WOOD => "Crate, multiple layer, wooden",
            InvoiceSuiteCodelistUnitCodes::REC21_CRAT_SHAL => "Crate, shallow",
            InvoiceSuiteCodelistUnitCodes::REC21_CRAT_WOOD => "Crate, wooden",
            InvoiceSuiteCodelistUnitCodes::REC21_CREEL => "Creel",
            InvoiceSuiteCodelistUnitCodes::REC21_CUP => "Cup",
            InvoiceSuiteCodelistUnitCodes::REC21_CYLINDER => "Cylinder",
            InvoiceSuiteCodelistUnitCodes::REC21_DEMI_NONP => "Demijohn, non-protected",
            InvoiceSuiteCodelistUnitCodes::REC21_DEMI_PROT => "Demijohn, protected",
            InvoiceSuiteCodelistUnitCodes::REC21_DISPENSER => "Dispenser",
            InvoiceSuiteCodelistUnitCodes::REC21_DRUM => "Drum",
            InvoiceSuiteCodelistUnitCodes::REC21_DRUM_ALUM => "Drum, aluminium",
            InvoiceSuiteCodelistUnitCodes::REC21_DRUM_ALUM_NONR_HEAD => "Drum, aluminium, non-removable head",
            InvoiceSuiteCodelistUnitCodes::REC21_DRUM_ALUM_REMO_HEAD => "Drum, aluminium, removable head",
            InvoiceSuiteCodelistUnitCodes::REC21_DRUM_FIBR => "Drum, fibre",
            InvoiceSuiteCodelistUnitCodes::REC21_DRUM_IRON => "Drum, iron",
            InvoiceSuiteCodelistUnitCodes::REC21_DRUM_PLAS => "Drum, plastic",
            InvoiceSuiteCodelistUnitCodes::REC21_DRUM_PLAS_NONR_HEAD => "Drum, plastic, non-removable head",
            InvoiceSuiteCodelistUnitCodes::REC21_DRUM_PLAS_REMO_HEAD => "Drum, plastic, removable head",
            InvoiceSuiteCodelistUnitCodes::REC21_DRUM_PLYW => "Drum, plywood",
            InvoiceSuiteCodelistUnitCodes::REC21_DRUM_STEE => "Drum, steel",
            InvoiceSuiteCodelistUnitCodes::REC21_DRUM_STEE_NONR_HEAD => "Drum, steel, non-removable head",
            InvoiceSuiteCodelistUnitCodes::REC21_DRUM_STEE_REMO_HEAD => "Drum, steel, removable head",
            InvoiceSuiteCodelistUnitCodes::REC21_DRUM_WOOD => "Drum, wooden",
            InvoiceSuiteCodelistUnitCodes::REC21_ENVELOPE => "Envelope",
            InvoiceSuiteCodelistUnitCodes::REC21_ENVE_STEE => "Envelope, steel",
            InvoiceSuiteCodelistUnitCodes::REC21_FILMPACK => "Filmpack",
            InvoiceSuiteCodelistUnitCodes::REC21_FIRKIN => "Firkin",
            InvoiceSuiteCodelistUnitCodes::REC21_FLASK => "Flask",
            InvoiceSuiteCodelistUnitCodes::REC21_FLEXIBAG => "Flexibag",
            InvoiceSuiteCodelistUnitCodes::REC21_FLEXITANK => "Flexitank",
            InvoiceSuiteCodelistUnitCodes::REC21_FOODTAINER => "Foodtainer",
            InvoiceSuiteCodelistUnitCodes::REC21_FOOTLOCKER => "Footlocker",
            InvoiceSuiteCodelistUnitCodes::REC21_FRAME => "Frame",
            InvoiceSuiteCodelistUnitCodes::REC21_GIRDER => "Girder",
            InvoiceSuiteCodelistUnitCodes::REC21_GIRD_IN_BUND => "Girders, in bundle/bunch/truss",
            InvoiceSuiteCodelistUnitCodes::REC21_HAMPER => "Hamper",
            InvoiceSuiteCodelistUnitCodes::REC21_HANGER => "Hanger",
            InvoiceSuiteCodelistUnitCodes::REC21_HOGSHEAD => "Hogshead",
            InvoiceSuiteCodelistUnitCodes::REC21_INGOT => "Ingot",
            InvoiceSuiteCodelistUnitCodes::REC21_INGO_IN_BUND => "Ingots, in bundle/bunch/truss",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT => "Intermediate bulk container",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_ALUM => "Intermediate bulk container, aluminium",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_ALUM_LIQU => "Intermediate bulk container, aluminium, liquid",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_ALUM_PRES__KPA => "Intermediate bulk container, aluminium, pressurised > 10 kpa",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_COMP => "Intermediate bulk container, composite",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_COMP_FLEX_PLAS_LIQU => "Intermediate bulk container, composite, flexible plastic, liquids",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_COMP_FLEX_PLAS_PRES => "Intermediate bulk container, composite, flexible plastic, pressurised",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_COMP_FLEX_PLAS_SOLI => "Intermediate bulk container, composite, flexible plastic, solids",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_COMP_RIGI_PLAS_LIQU => "Intermediate bulk container, composite, rigid plastic, liquids",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_COMP_RIGI_PLAS_PRES => "Intermediate bulk container, composite, rigid plastic, pressurised",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_COMP_RIGI_PLAS_SOLI => "Intermediate bulk container, composite, rigid plastic, solids",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_FIBR => "Intermediate bulk container, fibreboard",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_FLEX => "Intermediate bulk container, flexible",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_META => "Intermediate bulk container, metal",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_META_LIQU => "Intermediate bulk container, metal, liquid",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_META_OTHE_THAN_STEE => "Intermediate bulk container, metal, other than steel",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_META_PRES__KPA => "Intermediate bulk container, metal, pressure 10 kpa",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_NATU_WOOD => "Intermediate bulk container, natural wood",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_NATU_WOOD_WITH_INNE_LINE => "Intermediate bulk container, natural wood, with inner liner",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_PAPE_MULT => "Intermediate bulk container, paper, multi-wall",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_PAPE_MULT_WATE_RESI => "Intermediate bulk container, paper, multi-wall, water resistant",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_PLAS_FILM => "Intermediate bulk container, plastic film",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_PLYW => "Intermediate bulk container, plywood",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_PLYW_WITH_INNE_LINE => "Intermediate bulk container, plywood, with inner liner",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_RECO_WOOD => "Intermediate bulk container, reconstituted wood",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_RECO_WOOD_WITH_INNE_LINE => "Intermediate bulk container, reconstituted wood, with inner liner",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_RIGI_PLAS => "Intermediate bulk container, rigid plastic",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_RIGI_PLAS_FREE_LIQU => "Intermediate bulk container, rigid plastic, freestanding, liquids",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_RIGI_PLAS_FREE_PRES => "Intermediate bulk container, rigid plastic, freestanding, pressurised",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_RIGI_PLAS_FREE_SOLI => "Intermediate bulk container, rigid plastic, freestanding, solids",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_RIGI_PLAS_WITH_STRU_EQUI_LIQU => "Intermediate bulk container, rigid plastic, with structural equipment, liquids",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_RIGI_PLAS_WITH_STRU_EQUI_PRES => "Intermediate bulk container, rigid plastic, with structural equipment, pressurised",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_RIGI_PLAS_WITH_STRU_EQUI_SOLI => "Intermediate bulk container, rigid plastic, with structural equipment, solids",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_STEE => "Intermediate bulk container, steel",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_STEE_LIQU => "Intermediate bulk container, steel, liquid",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_STEE_PRES__KPA => "Intermediate bulk container, steel, pressurised > 10 kpa",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_TEXT_WITH_OUT_COAT => "Intermediate bulk container, textile with out coat/liner",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_TEXT_COAT => "Intermediate bulk container, textile, coated",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_TEXT_COAT_AND_LINE => "Intermediate bulk container, textile, coated and liner",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_TEXT_WITH_LINE => "Intermediate bulk container, textile, with liner",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_WOVE_PLAS_COAT => "Intermediate bulk container, woven plastic, coated",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_WOVE_PLAS_COAT_AND_LINE => "Intermediate bulk container, woven plastic, coated and liner",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_WOVE_PLAS_WITH_LINE => "Intermediate bulk container, woven plastic, with liner",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_WOVE_PLAS_WITH_COAT => "Intermediate bulk container, woven plastic, without coat/liner",
            InvoiceSuiteCodelistUnitCodes::REC21_JAR => "Jar",
            InvoiceSuiteCodelistUnitCodes::REC21_JERR_CYLI => "Jerrican, cylindrical",
            InvoiceSuiteCodelistUnitCodes::REC21_JERR_PLAS => "Jerrican, plastic",
            InvoiceSuiteCodelistUnitCodes::REC21_JERR_PLAS_NONR_HEAD => "Jerrican, plastic, non-removable head",
            InvoiceSuiteCodelistUnitCodes::REC21_JERR_PLAS_REMO_HEAD => "Jerrican, plastic, removable head",
            InvoiceSuiteCodelistUnitCodes::REC21_JERR_RECT => "Jerrican, rectangular",
            InvoiceSuiteCodelistUnitCodes::REC21_JERR_STEE => "Jerrican, steel",
            InvoiceSuiteCodelistUnitCodes::REC21_JERR_STEE_NONR_HEAD => "Jerrican, steel, non-removable head",
            InvoiceSuiteCodelistUnitCodes::REC21_JERR_STEE_REMO_HEAD => "Jerrican, steel, removable head",
            InvoiceSuiteCodelistUnitCodes::REC21_JUG => "Jug",
            InvoiceSuiteCodelistUnitCodes::REC21_JUTEBAG => "Jutebag",
            InvoiceSuiteCodelistUnitCodes::REC21_KEG => "Keg",
            InvoiceSuiteCodelistUnitCodes::REC21_KIT => "Kit",
            InvoiceSuiteCodelistUnitCodes::REC21_LARG_BAG_PALL_SIZE => "Large bag, pallet sized",
            InvoiceSuiteCodelistUnitCodes::REC21_LIFTVAN => "Liftvan",
            InvoiceSuiteCodelistUnitCodes::REC21_LOG => "Log",
            InvoiceSuiteCodelistUnitCodes::REC21_LOGS_IN_BUND => "Logs, in bundle/bunch/truss",
            InvoiceSuiteCodelistUnitCodes::REC21_LOT => "Lot",
            InvoiceSuiteCodelistUnitCodes::REC21_LPR_PALL__CM_X__CM => "LPR pallet 60 cm x 80 cm",
            InvoiceSuiteCodelistUnitCodes::REC21_LPR_PALL__CM_X__CM => "LPR pallet 80 cm x 120 cm",
            InvoiceSuiteCodelistUnitCodes::REC21_LUG => "Lug",
            InvoiceSuiteCodelistUnitCodes::REC21_LUGGAGE => "Luggage",
            InvoiceSuiteCodelistUnitCodes::REC21_MAT => "Mat",
            InvoiceSuiteCodelistUnitCodes::REC21_MATCHBOX => "Matchbox",
            InvoiceSuiteCodelistUnitCodes::REC21_MUTU_DEFI => "Mutually defined",
            InvoiceSuiteCodelistUnitCodes::REC21_NEST => "Nest",
            InvoiceSuiteCodelistUnitCodes::REC21_NET => "Net",
            InvoiceSuiteCodelistUnitCodes::REC21_NET_TUBE_PLAS => "Net, tube, plastic",
            InvoiceSuiteCodelistUnitCodes::REC21_NET_TUBE_TEXT => "Net, tube, textile",
            InvoiceSuiteCodelistUnitCodes::REC21_NOT_AVAI => "Not available",
            InvoiceSuiteCodelistUnitCodes::REC21_OCTABIN => "Octabin",
            InvoiceSuiteCodelistUnitCodes::REC21_ONEW_PALL => "Oneway pallet",
            InvoiceSuiteCodelistUnitCodes::REC21_ONEW_PALL_ISO___EURO_PALL => "Oneway pallet ISO 0 - 1/2 EURO Pallet",
            InvoiceSuiteCodelistUnitCodes::REC21_ONEW_PALL_ISO___EURO_PALL => "Oneway pallet ISO 1 - 1/1 EURO Pallet",
            InvoiceSuiteCodelistUnitCodes::REC21_ONEW_PALL_ISO___EURO_PALL => "Oneway pallet ISO 2 - 2/1 EURO Pallet",
            InvoiceSuiteCodelistUnitCodes::REC21_PACKAGE => "Package",
            InvoiceSuiteCodelistUnitCodes::REC21_PACK_CARD_WITH_BOTT_GRIP => "Package, cardboard, with bottle grip-holes",
            InvoiceSuiteCodelistUnitCodes::REC21_PACK_DISP_CARD => "Package, display, cardboard",
            InvoiceSuiteCodelistUnitCodes::REC21_PACK_DISP_META => "Package, display, metal",
            InvoiceSuiteCodelistUnitCodes::REC21_PACK_DISP_PLAS => "Package, display, plastic",
            InvoiceSuiteCodelistUnitCodes::REC21_PACK_DISP_WOOD => "Package, display, wooden",
            InvoiceSuiteCodelistUnitCodes::REC21_PACK_FLOW => "Package, flow",
            InvoiceSuiteCodelistUnitCodes::REC21_PACK_PAPE_WRAP => "Package, paper wrapped",
            InvoiceSuiteCodelistUnitCodes::REC21_PACK_SHOW => "Package, show",
            InvoiceSuiteCodelistUnitCodes::REC21_PACKET => "Packet",
            InvoiceSuiteCodelistUnitCodes::REC21_PAIL => "Pail",
            InvoiceSuiteCodelistUnitCodes::REC21_PALLET => "Pallet",
            InvoiceSuiteCodelistUnitCodes::REC21_PALL__X__CM => "Pallet 60 X 100 cm",
            InvoiceSuiteCodelistUnitCodes::REC21_PALL__X__CM => "Pallet 80 X 100 cm",
            InvoiceSuiteCodelistUnitCodes::REC21_PALL_ISO___EURO_PALL => "Pallet ISO 0 - 1/2 EURO Pallet",
            InvoiceSuiteCodelistUnitCodes::REC21_PALL_ISO___EURO_PALL => "Pallet ISO 1 - 1/1 EURO Pallet",
            InvoiceSuiteCodelistUnitCodes::REC21_PALL_ISO___EURO_PALL => "Pallet ISO 2 – 2/1 EURO Pallet",
            InvoiceSuiteCodelistUnitCodes::REC21_PALL_WITH_EXCE_DIME => "Pallet with exceptional dimensions",
            InvoiceSuiteCodelistUnitCodes::REC21_PALL_C_0C => "Pallet, 100cms * 110cms",
            InvoiceSuiteCodelistUnitCodes::REC21_PALL_AS => "Pallet, AS 4068-1993",
            InvoiceSuiteCodelistUnitCodes::REC21_PALL_BOX_COMB_OPEN_BOX_AND_PALL => "Pallet, box Combined open-ended box and pallet",
            InvoiceSuiteCodelistUnitCodes::REC21_PALL_CHEP__CM_X_0_CM => "Pallet, CHEP 100 cm x 120 cm",
            InvoiceSuiteCodelistUnitCodes::REC21_PALL_CHEP__CM_X__CM => "Pallet, CHEP 40 cm x 60 cm",
            InvoiceSuiteCodelistUnitCodes::REC21_PALL_CHEP__CM_X__CM => "Pallet, CHEP 80 cm x 120 cm",
            InvoiceSuiteCodelistUnitCodes::REC21_PALL_ISO_T => "Pallet, ISO T11",
            InvoiceSuiteCodelistUnitCodes::REC21_PALL_MODU_COLL_CM_C => "Pallet, modular, collars 80cms * 100cms",
            InvoiceSuiteCodelistUnitCodes::REC21_PALL_MODU_COLL_CM_C => "Pallet, modular, collars 80cms * 120cms",
            InvoiceSuiteCodelistUnitCodes::REC21_PALL_MODU_COLL_CM_CM => "Pallet, modular, collars 80cms * 60cms",
            InvoiceSuiteCodelistUnitCodes::REC21_PALL_SHRI => "Pallet, shrinkwrapped",
            InvoiceSuiteCodelistUnitCodes::REC21_PALL_TRIW => "Pallet, triwall",
            InvoiceSuiteCodelistUnitCodes::REC21_PALL_WOOD => "Pallet, wooden",
            InvoiceSuiteCodelistUnitCodes::REC21_PAN => "Pan",
            InvoiceSuiteCodelistUnitCodes::REC21_PARCEL => "Parcel",
            InvoiceSuiteCodelistUnitCodes::REC21_PEN => "Pen",
            InvoiceSuiteCodelistUnitCodes::REC21_PIECE => "Piece",
            InvoiceSuiteCodelistUnitCodes::REC21_PIPE => "Pipe",
            InvoiceSuiteCodelistUnitCodes::REC21_PIPE_IN_BUND => "Pipes, in bundle/bunch/truss",
            InvoiceSuiteCodelistUnitCodes::REC21_PITCHER => "Pitcher",
            InvoiceSuiteCodelistUnitCodes::REC21_PLANK => "Plank",
            InvoiceSuiteCodelistUnitCodes::REC21_PLAN_IN_BUND => "Planks, in bundle/bunch/truss",
            InvoiceSuiteCodelistUnitCodes::REC21_PLAS_PALL_SRS__CM_X__CM => "Plastic pallet SRS 60 cm x 80 cm",
            InvoiceSuiteCodelistUnitCodes::REC21_PLAS_PALL_SRS__CM_X__CM => "Plastic pallet SRS 80 cm x 120 cm",
            InvoiceSuiteCodelistUnitCodes::REC21_PLATE => "Plate",
            InvoiceSuiteCodelistUnitCodes::REC21_PLAT_IN_BUND => "Plates, in bundle/bunch/truss",
            InvoiceSuiteCodelistUnitCodes::REC21_PLAT_UNSP_WEIG_OR_DIME => "Platform, unspecified weight or dimension",
            InvoiceSuiteCodelistUnitCodes::REC21_POT => "Pot",
            InvoiceSuiteCodelistUnitCodes::REC21_POUCH => "Pouch",
            InvoiceSuiteCodelistUnitCodes::REC21_PUNNET => "Punnet",
            InvoiceSuiteCodelistUnitCodes::REC21_RACK => "Rack",
            InvoiceSuiteCodelistUnitCodes::REC21_RACK_CLOT_HANG => "Rack, clothing hanger",
            InvoiceSuiteCodelistUnitCodes::REC21_RECE_FIBR => "Receptacle, fibre",
            InvoiceSuiteCodelistUnitCodes::REC21_RECE_GLAS => "Receptacle, glass",
            InvoiceSuiteCodelistUnitCodes::REC21_RECE_META => "Receptacle, metal",
            InvoiceSuiteCodelistUnitCodes::REC21_RECE_PAPE => "Receptacle, paper",
            InvoiceSuiteCodelistUnitCodes::REC21_RECE_PLAS => "Receptacle, plastic",
            InvoiceSuiteCodelistUnitCodes::REC21_RECE_PLAS_WRAP => "Receptacle, plastic wrapped",
            InvoiceSuiteCodelistUnitCodes::REC21_RECE_WOOD => "Receptacle, wooden",
            InvoiceSuiteCodelistUnitCodes::REC21_REDNET => "Rednet",
            InvoiceSuiteCodelistUnitCodes::REC21_REEL => "Reel",
            InvoiceSuiteCodelistUnitCodes::REC21_RETU_PALL => "Returnable pallet",
            InvoiceSuiteCodelistUnitCodes::REC21_RING => "Ring",
            InvoiceSuiteCodelistUnitCodes::REC21_ROD => "Rod",
            InvoiceSuiteCodelistUnitCodes::REC21_RODS_IN_BUND => "Rods, in bundle/bunch/truss",
            InvoiceSuiteCodelistUnitCodes::REC21_ROLL => "Roll",
            InvoiceSuiteCodelistUnitCodes::REC21_SACHET => "Sachet",
            InvoiceSuiteCodelistUnitCodes::REC21_SACK => "Sack",
            InvoiceSuiteCodelistUnitCodes::REC21_SACK_MULT => "Sack, multi-wall",
            InvoiceSuiteCodelistUnitCodes::REC21_SEACHEST => "Sea-chest",
            InvoiceSuiteCodelistUnitCodes::REC21_SHEET => "Sheet",
            InvoiceSuiteCodelistUnitCodes::REC21_SHEE_PLAS_WRAP => "Sheet, plastic wrapping",
            InvoiceSuiteCodelistUnitCodes::REC21_SHEETMETAL => "Sheetmetal",
            InvoiceSuiteCodelistUnitCodes::REC21_SHEE_IN_BUND => "Sheets, in bundle/bunch/truss",
            InvoiceSuiteCodelistUnitCodes::REC21_SHRINKWRAPPED => "Shrinkwrapped",
            InvoiceSuiteCodelistUnitCodes::REC21_SKID => "Skid",
            InvoiceSuiteCodelistUnitCodes::REC21_SLAB => "Slab",
            InvoiceSuiteCodelistUnitCodes::REC21_SLEEVE => "Sleeve",
            InvoiceSuiteCodelistUnitCodes::REC21_SLIPSHEET => "Slipsheet",
            InvoiceSuiteCodelistUnitCodes::REC21_SPINDLE => "Spindle",
            InvoiceSuiteCodelistUnitCodes::REC21_SPOOL => "Spool",
            InvoiceSuiteCodelistUnitCodes::REC21_SUITCASE => "Suitcase",
            InvoiceSuiteCodelistUnitCodes::REC21_SYNT_PALL_ISO => "Synthetic pallet ISO 1",
            InvoiceSuiteCodelistUnitCodes::REC21_SYNT_PALL_ISO => "Synthetic pallet ISO 2",
            InvoiceSuiteCodelistUnitCodes::REC21_TABLET => "Tablet",
            InvoiceSuiteCodelistUnitCodes::REC21_TANK_CONT_GENE => "Tank container, generic",
            InvoiceSuiteCodelistUnitCodes::REC21_TANK_CYLI => "Tank, cylindrical",
            InvoiceSuiteCodelistUnitCodes::REC21_TANK_RECT => "Tank, rectangular",
            InvoiceSuiteCodelistUnitCodes::REC21_TEACHEST => "Tea-chest",
            InvoiceSuiteCodelistUnitCodes::REC21_TIERCE => "Tierce",
            InvoiceSuiteCodelistUnitCodes::REC21_TIN => "Tin",
            InvoiceSuiteCodelistUnitCodes::REC21_TRAY => "Tray",
            InvoiceSuiteCodelistUnitCodes::REC21_TRAY_CONT_HORI_STAC_FLAT_ITEM => "Tray, containing horizontally stacked flat items",
            InvoiceSuiteCodelistUnitCodes::REC21_TRAY_ONE_LAYE_NO_COVE_CARD => "Tray, one layer no cover, cardboard",
            InvoiceSuiteCodelistUnitCodes::REC21_TRAY_ONE_LAYE_NO_COVE_PLAS => "Tray, one layer no cover, plastic",
            InvoiceSuiteCodelistUnitCodes::REC21_TRAY_ONE_LAYE_NO_COVE_POLY => "Tray, one layer no cover, polystyrene",
            InvoiceSuiteCodelistUnitCodes::REC21_TRAY_ONE_LAYE_NO_COVE_WOOD => "Tray, one layer no cover, wooden",
            InvoiceSuiteCodelistUnitCodes::REC21_TRAY_RIGI_LIDD_STAC_CEN_TS => "Tray, rigid, lidded stackable (CEN TS 14482:2002)",
            InvoiceSuiteCodelistUnitCodes::REC21_TRAY_TWO_LAYE_NO_COVE_CARD => "Tray, two layers no cover, cardboard",
            InvoiceSuiteCodelistUnitCodes::REC21_TRAY_TWO_LAYE_NO_COVE_PLAS_TRAY => "Tray, two layers no cover, plastic tray",
            InvoiceSuiteCodelistUnitCodes::REC21_TRAY_TWO_LAYE_NO_COVE_WOOD => "Tray, two layers no cover, wooden",
            InvoiceSuiteCodelistUnitCodes::REC21_TROLLEY => "Trolley",
            InvoiceSuiteCodelistUnitCodes::REC21_TRUNK => "Trunk",
            InvoiceSuiteCodelistUnitCodes::REC21_TRUSS => "Truss",
            InvoiceSuiteCodelistUnitCodes::REC21_TUB => "Tub",
            InvoiceSuiteCodelistUnitCodes::REC21_TUB_WITH_LID => "Tub, with lid",
            InvoiceSuiteCodelistUnitCodes::REC21_TUBE => "Tube",
            InvoiceSuiteCodelistUnitCodes::REC21_TUBE_COLL => "Tube, collapsible",
            InvoiceSuiteCodelistUnitCodes::REC21_TUBE_WITH_NOZZ => "Tube, with nozzle",
            InvoiceSuiteCodelistUnitCodes::REC21_TUBE_IN_BUND => "Tubes, in bundle/bunch/truss",
            InvoiceSuiteCodelistUnitCodes::REC21_TUN => "Tun",
            InvoiceSuiteCodelistUnitCodes::REC21_TWO_SIDE_CAGE_ON_WHEE_WITH_FIXI_STRA => "Two sided cage on wheels with fixing strap",
            InvoiceSuiteCodelistUnitCodes::REC21_TYRE => "Tyre",
            InvoiceSuiteCodelistUnitCodes::REC21_UNCAGED => "Uncaged",
            InvoiceSuiteCodelistUnitCodes::REC21_UNIT => "Unit",
            InvoiceSuiteCodelistUnitCodes::REC21_UNPA_OR_UNPA => "Unpacked or unpackaged",
            InvoiceSuiteCodelistUnitCodes::REC21_UNPA_OR_UNPA_MULT_UNIT => "Unpacked or unpackaged, multiple units",
            InvoiceSuiteCodelistUnitCodes::REC21_UNPA_OR_UNPA_SING_UNIT => "Unpacked or unpackaged, single unit",
            InvoiceSuiteCodelistUnitCodes::REC21_VACUUMPACKED => "Vacuum-packed",
            InvoiceSuiteCodelistUnitCodes::REC21_VANPACK => "Vanpack",
            InvoiceSuiteCodelistUnitCodes::REC21_VAT => "Vat",
            InvoiceSuiteCodelistUnitCodes::REC21_VEHICLE => "Vehicle",
            InvoiceSuiteCodelistUnitCodes::REC21_VIAL => "Vial",
            InvoiceSuiteCodelistUnitCodes::REC21_WHEE_PALL_WITH_RAIS_RIM__X__X_6 => "Wheeled pallet with raised rim ( 81 x 60 x 16)",
            InvoiceSuiteCodelistUnitCodes::REC21_WHOL_PALL => "Wholesaler pallet",
            InvoiceSuiteCodelistUnitCodes::REC21_WICKERBOTTLE => "Wickerbottle",
            InvoiceSuiteCodelistUnitCodes::REC21_WOOD_PALL__CM_X__CM => "Wooden pallet 40 cm x 80 cm",
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
            InvoiceSuiteCodelistUnitCodes::REC20_DA_MONT => "30-day month",
            InvoiceSuiteCodelistUnitCodes::REC20_PAR_CLOU_COVE => "8-part cloud cover",
            InvoiceSuiteCodelistUnitCodes::REC20_ACCE_LINE => "access line",
            InvoiceSuiteCodelistUnitCodes::REC20_ACCO_UNIT => "accounting unit",
            InvoiceSuiteCodelistUnitCodes::REC20_ACRE => "acre",
            InvoiceSuiteCodelistUnitCodes::REC20_ACRE_BASE_ON_US_SURV_FOOT => "acre-foot (based on U.S. survey foot)",
            InvoiceSuiteCodelistUnitCodes::REC20_ACTI_UNIT => "active unit",
            InvoiceSuiteCodelistUnitCodes::REC20_ACTIVITY => "activity",
            InvoiceSuiteCodelistUnitCodes::REC20_ACTUAL => "actual/360",
            InvoiceSuiteCodelistUnitCodes::REC20_ADDI_MINU => "additional minute",
            InvoiceSuiteCodelistUnitCodes::REC20_AIR_DRY_METR_TON => "air dry metric ton",
            InvoiceSuiteCodelistUnitCodes::REC20_AIR_DRY_TON => "air dry ton",
            InvoiceSuiteCodelistUnitCodes::REC20_ALCO_STRE_BY_MASS => "alcoholic strength by mass",
            InvoiceSuiteCodelistUnitCodes::REC20_ALCO_STRE_BY_VOLU => "alcoholic strength by volume",
            InvoiceSuiteCodelistUnitCodes::REC20_AMER_WIRE_GAUG => "american wire gauge",
            InvoiceSuiteCodelistUnitCodes::REC20_AMPERE => "ampere",
            InvoiceSuiteCodelistUnitCodes::REC20_AMPE_HOUR => "ampere hour",
            InvoiceSuiteCodelistUnitCodes::REC20_AMPE_MINU => "ampere minute",
            InvoiceSuiteCodelistUnitCodes::REC20_AMPE_PER_CENT => "ampere per centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_AMPE_PER_KILO => "ampere per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_AMPE_PER_METR => "ampere per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_AMPE_PER_MILL => "ampere per millimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_AMPE_PER_PASC => "ampere per pascal",
            InvoiceSuiteCodelistUnitCodes::REC20_AMPE_PER_SQUA_CENT => "ampere per square centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_AMPE_PER_SQUA_METR => "ampere per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_AMPE_PER_SQUA_METR_KELV_SQUA => "ampere per square metre kelvin squared",
            InvoiceSuiteCodelistUnitCodes::REC20_AMPE_PER_SQUA_MILL => "ampere per square millimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_AMPE_SECO => "ampere second",
            InvoiceSuiteCodelistUnitCodes::REC20_AMPE_SQUA_METR => "ampere square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_AMPE_SQUA_METR_PER_JOUL_SECO => "ampere square metre per joule second",
            InvoiceSuiteCodelistUnitCodes::REC20_AMPE_SQUA_SECO => "ampere squared second",
            InvoiceSuiteCodelistUnitCodes::REC20_ANGSTROM => "angstrom",
            InvoiceSuiteCodelistUnitCodes::REC20_ANTI_FACT_AHF_UNIT => "anti-hemophilic factor (AHF) unit",
            InvoiceSuiteCodelistUnitCodes::REC20_ASSEMBLY => "assembly",
            InvoiceSuiteCodelistUnitCodes::REC20_ASSORTMENT => "assortment",
            InvoiceSuiteCodelistUnitCodes::REC20_ASTR_UNIT => "astronomical unit",
            InvoiceSuiteCodelistUnitCodes::REC20_ATTOFARAD => "attofarad",
            InvoiceSuiteCodelistUnitCodes::REC20_ATTOJOULE => "attojoule",
            InvoiceSuiteCodelistUnitCodes::REC20_AVER_MINU_PER_CALL => "average minute per call",
            InvoiceSuiteCodelistUnitCodes::REC20_BALL => "ball",
            InvoiceSuiteCodelistUnitCodes::REC20_BAR_UNIT_OF_PRES => "bar [unit of pressure]",
            InvoiceSuiteCodelistUnitCodes::REC20_BAR_CUBI_METR_PER_SECO => "bar cubic metre per second",
            InvoiceSuiteCodelistUnitCodes::REC20_BAR_LITR_PER_SECO => "bar litre per second",
            InvoiceSuiteCodelistUnitCodes::REC20_BAR_PER_BAR => "bar per bar",
            InvoiceSuiteCodelistUnitCodes::REC20_BAR_PER_KELV => "bar per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_BARN => "barn",
            InvoiceSuiteCodelistUnitCodes::REC20_BARN_PER_ELEC => "barn per electronvolt",
            InvoiceSuiteCodelistUnitCodes::REC20_BARN_PER_STER => "barn per steradian",
            InvoiceSuiteCodelistUnitCodes::REC20_BARN_PER_STER_ELEC => "barn per steradian electronvolt",
            InvoiceSuiteCodelistUnitCodes::REC20_BARR_UK_PETR => "barrel (UK petroleum)",
            InvoiceSuiteCodelistUnitCodes::REC20_BARR_UK_PETR_PER_DAY => "barrel (UK petroleum) per day",
            InvoiceSuiteCodelistUnitCodes::REC20_BARR_UK_PETR_PER_HOUR => "barrel (UK petroleum) per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_BARR_UK_PETR_PER_MINU => "barrel (UK petroleum) per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_BARR_UK_PETR_PER_SECO => "barrel (UK petroleum) per second",
            InvoiceSuiteCodelistUnitCodes::REC20_BARR_US_PETR_PER_HOUR => "barrel (US petroleum) per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_BARR_US_PETR_PER_SECO => "barrel (US petroleum) per second",
            InvoiceSuiteCodelistUnitCodes::REC20_BARR_US => "barrel (US)",
            InvoiceSuiteCodelistUnitCodes::REC20_BARR_US_PER_DAY => "barrel (US) per day",
            InvoiceSuiteCodelistUnitCodes::REC20_BARR_US_PER_MINU => "barrel (US) per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_BARR_IMPE => "barrel, imperial",
            InvoiceSuiteCodelistUnitCodes::REC20_BASE_BOX => "base box",
            InvoiceSuiteCodelistUnitCodes::REC20_BATCH => "batch",
            InvoiceSuiteCodelistUnitCodes::REC20_BATT_POUN => "batting pound",
            InvoiceSuiteCodelistUnitCodes::REC20_BAUD => "baud",
            InvoiceSuiteCodelistUnitCodes::REC20_BEAT_PER_MINU => "beats per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_BEAUFORT => "Beaufort",
            InvoiceSuiteCodelistUnitCodes::REC20_BECQUEREL => "becquerel",
            InvoiceSuiteCodelistUnitCodes::REC20_BECQ_PER_CUBI_METR => "becquerel per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_BECQ_PER_KILO => "becquerel per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_BEL => "bel",
            InvoiceSuiteCodelistUnitCodes::REC20_BEL_PER_METR => "bel per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_BIG_POIN => "big point",
            InvoiceSuiteCodelistUnitCodes::REC20_BILL_EUR => "billion (EUR)",
            InvoiceSuiteCodelistUnitCodes::REC20_BIOT => "biot",
            InvoiceSuiteCodelistUnitCodes::REC20_BIT => "bit",
            InvoiceSuiteCodelistUnitCodes::REC20_BIT_PER_CUBI_METR => "bit per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_BIT_PER_METR => "bit per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_BIT_PER_SECO => "bit per second",
            InvoiceSuiteCodelistUnitCodes::REC20_BIT_PER_SQUA_METR => "bit per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_BLANK => "blank",
            InvoiceSuiteCodelistUnitCodes::REC20_BOAR_FOOT => "board foot",
            InvoiceSuiteCodelistUnitCodes::REC20_BOOK => "book",
            InvoiceSuiteCodelistUnitCodes::REC20_BRAK_HORS_POWE => "brake horse power",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT__F => "British thermal unit (39 ºF)",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT__F => "British thermal unit (59 ºF)",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT__F => "British thermal unit (60 ºF)",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_INTE_TABL => "British thermal unit (international table)",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_INTE_TABL_FOOT_PER_HOUR_FOOT_DEGR_FAHR => "British thermal unit (international table) foot per hour square foot degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_INTE_TABL_INCH_PER_HOUR_SQUA_DEGR_FAHR => "British thermal unit (international table) inch per hour square foot degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_INTE_TABL_INCH_PER_SECO_SQUA_DEGR_FAHR => "British thermal unit (international table) inch per second square foot degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_INTE_TABL_PER_CUBI_FOOT => "British thermal unit (international table) per cubic foot",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_INTE_TABL_PER_DEGR_FAHR => "British thermal unit (international table) per degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_INTE_TABL_PER_DEGR_RANK => "British thermal unit (international table) per degree Rankine",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_INTE_TABL_PER_HOUR => "British thermal unit (international table) per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_INTE_TABL_PER_HOUR_SQUA_FOOT_DEGR_FAHR => "British thermal unit (international table) per hour square foot degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_INTE_TABL_PER_HOUR_SQUA_FOOT_DEGR_RANK => "British thermal unit (international table) per hour square foot degree Rankine",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_INTE_TABL_PER_MINU => "British thermal unit (international table) per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_INTE_TABL_PER_POUN => "British thermal unit (international table) per pound",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_INTE_TABL_PER_POUN_DEGR_FAHR => "British thermal unit (international table) per pound degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_INTE_TABL_PER_POUN_DEGR_RANK => "British thermal unit (international table) per pound degree Rankine",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_INTE_TABL_PER_SECO => "British thermal unit (international table) per second",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_INTE_TABL_PER_SECO_FOOT_DEGR_RANK => "British thermal unit (international table) per second foot degree Rankine",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_INTE_TABL_PER_SECO_SQUA_FOOT_DEGR_FAHR => "British thermal unit (international table) per second square foot degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_INTE_TABL_PER_SECO_SQUA_FOOT_DEGR_RANK => "British thermal unit (international table) per second square foot degree Rankine",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_INTE_TABL_PER_SQUA_FOOT => "British thermal unit (international table) per square foot",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_INTE_TABL_PER_SQUA_FOOT_HOUR => "British thermal unit (international table) per square foot hour",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_INTE_TABL_PER_SQUA_FOOT_SECO => "British thermal unit (international table) per square foot second",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_INTE_TABL_PER_SQUA_INCH_SECO => "British thermal unit (international table) per square inch second",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_MEAN => "British thermal unit (mean)",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_THER_FOOT_PER_HOUR_SQUA_DEGR_FAHR => "British thermal unit (thermochemical) foot per hour square foot degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_THER_INCH_PER_HOUR_SQUA_DEGR_FAHR => "British thermal unit (thermochemical) inch per hour square foot degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_THER_INCH_PER_SECO_FOOT_DEGR_FAHR => "British thermal unit (thermochemical) inch per second square foot degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_THER_PER_CUBI_FOOT => "British thermal unit (thermochemical) per cubic foot",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_THER_PER_DEGR_FAHR => "British thermal unit (thermochemical) per degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_THER_PER_DEGR_RANK => "British thermal unit (thermochemical) per degree Rankine",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_THER_PER_HOUR => "British thermal unit (thermochemical) per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_THER_PER_HOUR_SQUA_FOOT_DEGR_FAHR => "British thermal unit (thermochemical) per hour square foot degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_THER_PER_MINU => "British thermal unit (thermochemical) per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_THER_PER_POUN => "British thermal unit (thermochemical) per pound",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_THER_PER_POUN_DEGR_FAHR => "British thermal unit (thermochemical) per pound degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_THER_PER_POUN_DEGR_RANK => "British thermal unit (thermochemical) per pound degree Rankine",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_THER_PER_SECO => "British thermal unit (thermochemical) per second",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_THER_PER_SECO_SQUA_FOOT_DEGR_FAHR => "British thermal unit (thermochemical) per second square foot degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_THER_PER_SQUA_FOOT => "British thermal unit (thermochemical) per square foot",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_THER_PER_SQUA_FOOT_HOUR => "British thermal unit (thermochemical) per square foot hour",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_THER_PER_SQUA_FOOT_MINU => "British thermal unit (thermochemical) per square foot minute",
            InvoiceSuiteCodelistUnitCodes::REC20_BRIT_THER_UNIT_THER_PER_SQUA_FOOT_SECO => "British thermal unit (thermochemical) per square foot second",
            InvoiceSuiteCodelistUnitCodes::REC20_BULK_PACK => "bulk pack",
            InvoiceSuiteCodelistUnitCodes::REC20_BUSH_UK => "bushel (UK)",
            InvoiceSuiteCodelistUnitCodes::REC20_BUSH_UK_PER_DAY => "bushel (UK) per day",
            InvoiceSuiteCodelistUnitCodes::REC20_BUSH_UK_PER_HOUR => "bushel (UK) per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_BUSH_UK_PER_MINU => "bushel (UK) per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_BUSH_UK_PER_SECO => "bushel (UK) per second",
            InvoiceSuiteCodelistUnitCodes::REC20_BUSH_US_DRY_PER_DAY => "bushel (US dry) per day",
            InvoiceSuiteCodelistUnitCodes::REC20_BUSH_US_DRY_PER_HOUR => "bushel (US dry) per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_BUSH_US_DRY_PER_MINU => "bushel (US dry) per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_BUSH_US_DRY_PER_SECO => "bushel (US dry) per second",
            InvoiceSuiteCodelistUnitCodes::REC20_BUSH_US => "bushel (US)",
            InvoiceSuiteCodelistUnitCodes::REC20_BYTE => "byte",
            InvoiceSuiteCodelistUnitCodes::REC20_BYTE_PER_SECO => "byte per second",
            InvoiceSuiteCodelistUnitCodes::REC20_CAKE => "cake",
            InvoiceSuiteCodelistUnitCodes::REC20_CALL => "call",
            InvoiceSuiteCodelistUnitCodes::REC20_CALO__C => "calorie (20 ºC)",
            InvoiceSuiteCodelistUnitCodes::REC20_CALO_INTE_TABL_PER_GRAM_DEGR_CELS => "calorie (international table) per gram degree Celsius",
            InvoiceSuiteCodelistUnitCodes::REC20_CALO_MEAN => "calorie (mean)",
            InvoiceSuiteCodelistUnitCodes::REC20_CALO_THER_PER_CENT_SECO_DEGR_CELS => "calorie (thermochemical) per centimetre second degree Celsius",
            InvoiceSuiteCodelistUnitCodes::REC20_CALO_THER_PER_GRAM_DEGR_CELS => "calorie (thermochemical) per gram degree Celsius",
            InvoiceSuiteCodelistUnitCodes::REC20_CALO_THER_PER_MINU => "calorie (thermochemical) per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_CALO_THER_PER_SECO => "calorie (thermochemical) per second",
            InvoiceSuiteCodelistUnitCodes::REC20_CALO_THER_PER_SQUA_CENT => "calorie (thermochemical) per square centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_CALO_THER_PER_SQUA_CENT_MINU => "calorie (thermochemical) per square centimetre minute",
            InvoiceSuiteCodelistUnitCodes::REC20_CALO_THER_PER_SQUA_CENT_SECO => "calorie (thermochemical) per square centimetre second",
            InvoiceSuiteCodelistUnitCodes::REC20_CANDELA => "candela",
            InvoiceSuiteCodelistUnitCodes::REC20_CAND_PER_SQUA_FOOT => "candela per square foot",
            InvoiceSuiteCodelistUnitCodes::REC20_CAND_PER_SQUA_INCH => "candela per square inch",
            InvoiceSuiteCodelistUnitCodes::REC20_CAND_PER_SQUA_METR => "candela per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_CARD => "card",
            InvoiceSuiteCodelistUnitCodes::REC20_CARR_CAPA_IN_METR_TON => "carrying capacity in metric ton",
            InvoiceSuiteCodelistUnitCodes::REC20_CENT_UK => "cental (UK)",
            InvoiceSuiteCodelistUnitCodes::REC20_CENTIGRAM => "centigram",
            InvoiceSuiteCodelistUnitCodes::REC20_CENTILITRE => "centilitre",
            InvoiceSuiteCodelistUnitCodes::REC20_CENTIMETRE => "centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_CENT_OF_MERC__C => "centimetre of mercury (0 ºC)",
            InvoiceSuiteCodelistUnitCodes::REC20_CENT_OF_WATE__C => "centimetre of water (4 ºC)",
            InvoiceSuiteCodelistUnitCodes::REC20_CENT_PER_BAR => "centimetre per bar",
            InvoiceSuiteCodelistUnitCodes::REC20_CENT_PER_HOUR => "centimetre per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_CENT_PER_KELV => "centimetre per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_CENT_PER_SECO => "centimetre per second",
            InvoiceSuiteCodelistUnitCodes::REC20_CENT_PER_SECO_BAR => "centimetre per second bar",
            InvoiceSuiteCodelistUnitCodes::REC20_CENT_PER_SECO_KELV => "centimetre per second kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_CENT_PER_SECO_SQUA => "centimetre per second squared",
            InvoiceSuiteCodelistUnitCodes::REC20_CENT_METR => "centinewton metre",
            InvoiceSuiteCodelistUnitCodes::REC20_CENTIPOISE => "centipoise",
            InvoiceSuiteCodelistUnitCodes::REC20_CENT_PER_BAR => "centipoise per bar",
            InvoiceSuiteCodelistUnitCodes::REC20_CENT_PER_KELV => "centipoise per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_CENTISTOKES => "centistokes",
            InvoiceSuiteCodelistUnitCodes::REC20_CHAI_BASE_ON_US_SURV_FOOT => "chain (based on U.S. survey foot)",
            InvoiceSuiteCodelistUnitCodes::REC20_CIRC_MIL => "circular mil",
            InvoiceSuiteCodelistUnitCodes::REC20_CLO => "clo",
            InvoiceSuiteCodelistUnitCodes::REC20_COIL_GROU => "coil group",
            InvoiceSuiteCodelistUnitCodes::REC20_COMM_YEAR => "common year",
            InvoiceSuiteCodelistUnitCodes::REC20_CONT_GRAM => "content gram",
            InvoiceSuiteCodelistUnitCodes::REC20_CONT_TON_METR => "content ton (metric)",
            InvoiceSuiteCodelistUnitCodes::REC20_CONV_METR_OF_WATE => "conventional metre of water",
            InvoiceSuiteCodelistUnitCodes::REC20_CORD => "cord",
            InvoiceSuiteCodelistUnitCodes::REC20_CORD__FT => "cord (128 ft3)",
            InvoiceSuiteCodelistUnitCodes::REC20_COULOMB => "coulomb",
            InvoiceSuiteCodelistUnitCodes::REC20_COUL_METR => "coulomb metre",
            InvoiceSuiteCodelistUnitCodes::REC20_COUL_METR_SQUA_PER_VOLT => "coulomb metre squared per volt",
            InvoiceSuiteCodelistUnitCodes::REC20_COUL_PER_CUBI_CENT => "coulomb per cubic centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_COUL_PER_CUBI_METR => "coulomb per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_COUL_PER_CUBI_MILL => "coulomb per cubic millimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_COUL_PER_KILO => "coulomb per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_COUL_PER_KILO_SECO => "coulomb per kilogram second",
            InvoiceSuiteCodelistUnitCodes::REC20_COUL_PER_METR => "coulomb per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_COUL_PER_MOLE => "coulomb per mole",
            InvoiceSuiteCodelistUnitCodes::REC20_COUL_PER_SQUA_CENT => "coulomb per square centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_COUL_PER_SQUA_METR => "coulomb per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_COUL_PER_SQUA_MILL => "coulomb per square millimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_COUL_SQUA_METR_PER_KILO => "coulomb square metre per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_CREDIT => "credit",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_CENT => "cubic centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_CENT_PER_BAR => "cubic centimetre per bar",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_CENT_PER_CUBI_METR => "cubic centimetre per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_CENT_PER_DAY => "cubic centimetre per day",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_CENT_PER_DAY_BAR => "cubic centimetre per day bar",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_CENT_PER_DAY_KELV => "cubic centimetre per day kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_CENT_PER_HOUR => "cubic centimetre per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_CENT_PER_HOUR_BAR => "cubic centimetre per hour bar",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_CENT_PER_HOUR_KELV => "cubic centimetre per hour kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_CENT_PER_KELV => "cubic centimetre per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_CENT_PER_MINU => "cubic centimetre per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_CENT_PER_MINU_BAR => "cubic centimetre per minute bar",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_CENT_PER_MINU_KELV => "cubic centimetre per minute kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_CENT_PER_MOLE => "cubic centimetre per mole",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_CENT_PER_SECO => "cubic centimetre per second",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_CENT_PER_SECO_BAR => "cubic centimetre per second bar",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_CENT_PER_SECO_KELV => "cubic centimetre per second kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_DECA => "cubic decametre",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_DECI => "cubic decimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_DECI_PER_CUBI_METR => "cubic decimetre per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_DECI_PER_DAY => "cubic decimetre per day",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_DECI_PER_HOUR => "cubic decimetre per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_DECI_PER_KILO => "cubic decimetre per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_DECI_PER_MINU => "cubic decimetre per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_DECI_PER_MOLE => "cubic decimetre per mole",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_DECI_PER_SECO => "cubic decimetre per second",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_FOOT => "cubic foot",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_FOOT_PER_DAY => "cubic foot per day",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_FOOT_PER_DEGR_FAHR => "cubic foot per degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_FOOT_PER_HOUR => "cubic foot per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_FOOT_PER_MINU => "cubic foot per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_FOOT_PER_POUN => "cubic foot per pound",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_FOOT_PER_PSI => "cubic foot per psi",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_FOOT_PER_SECO => "cubic foot per second",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_HECT => "cubic hectometre",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_INCH => "cubic inch",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_INCH_PER_HOUR => "cubic inch per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_INCH_PER_MINU => "cubic inch per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_INCH_PER_POUN => "cubic inch per pound",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_INCH_PER_SECO => "cubic inch per second",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_KILO => "cubic kilometre",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_METR => "cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_METR_DAY => "Cubic Metre Day",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_METR_MONT => "Cubic Metre Month",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_METR_PER_BAR => "cubic metre per bar",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_METR_PER_COUL => "cubic metre per coulomb",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_METR_PER_CUBI_METR => "cubic metre per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_METR_PER_DAY => "cubic metre per day",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_METR_PER_DAY_BAR => "cubic metre per day bar",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_METR_PER_DAY_KELV => "cubic metre per day kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_METR_PER_HOUR => "cubic metre per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_METR_PER_HOUR_BAR => "cubic metre per hour bar",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_METR_PER_HOUR_KELV => "cubic metre per hour kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_METR_PER_KELV => "cubic metre per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_METR_PER_KILO => "cubic metre per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_METR_PER_MINU => "cubic metre per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_METR_PER_MINU_BAR => "cubic metre per minute bar",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_METR_PER_MINU_KELV => "cubic metre per minute kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_METR_PER_MOLE => "cubic metre per mole",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_METR_PER_PASC => "cubic metre per pascal",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_METR_PER_SECO => "cubic metre per second",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_METR_PER_SECO_BAR => "cubic metre per second bar",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_METR_PER_SECO_KELV => "cubic metre per second kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_METR_PER_SECO_PASC => "cubic metre per second pascal",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_METR_PER_SECO_SQUA_METR => "cubic metre per second square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_METR_WEEK => "Cubic Metre Week",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_MILE_UK_STAT => "cubic mile (UK statute)",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_MILL => "cubic millimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_MILL_PER_CUBI_METR => "cubic millimetre per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_YARD => "cubic yard",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_YARD_PER_DAY => "cubic yard per day",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_YARD_PER_DEGR_FAHR => "cubic yard per degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_YARD_PER_HOUR => "cubic yard per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_YARD_PER_MINU => "cubic yard per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_YARD_PER_PSI => "cubic yard per psi",
            InvoiceSuiteCodelistUnitCodes::REC20_CUBI_YARD_PER_SECO => "cubic yard per second",
            InvoiceSuiteCodelistUnitCodes::REC20_CUP_UNIT_OF_VOLU => "cup [unit of volume]",
            InvoiceSuiteCodelistUnitCodes::REC20_CURIE => "curie",
            InvoiceSuiteCodelistUnitCodes::REC20_CURI_PER_KILO => "curie per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_CYCLE => "cycle",
            InvoiceSuiteCodelistUnitCodes::REC20_DAY => "day",
            InvoiceSuiteCodelistUnitCodes::REC20_DEAD_TONN => "deadweight tonnage",
            InvoiceSuiteCodelistUnitCodes::REC20_DECADE => "decade",
            InvoiceSuiteCodelistUnitCodes::REC20_DECA_LOGA => "decade (logarithmic)",
            InvoiceSuiteCodelistUnitCodes::REC20_DECAGRAM => "decagram",
            InvoiceSuiteCodelistUnitCodes::REC20_DECALITRE => "decalitre",
            InvoiceSuiteCodelistUnitCodes::REC20_DECAMETRE => "decametre",
            InvoiceSuiteCodelistUnitCodes::REC20_DECAPASCAL => "decapascal",
            InvoiceSuiteCodelistUnitCodes::REC20_DECARE => "decare",
            InvoiceSuiteCodelistUnitCodes::REC20_DECIBEL => "decibel",
            InvoiceSuiteCodelistUnitCodes::REC20_DECI_PER_KILO => "decibel per kilometre",
            InvoiceSuiteCodelistUnitCodes::REC20_DECI_PER_METR => "decibel per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_DECI_WATT => "Decibel watt",
            InvoiceSuiteCodelistUnitCodes::REC20_DECIBELMILLIWATTS => "Decibel-milliwatts",
            InvoiceSuiteCodelistUnitCodes::REC20_DECIGRAM => "decigram",
            InvoiceSuiteCodelistUnitCodes::REC20_DECILITRE => "decilitre",
            InvoiceSuiteCodelistUnitCodes::REC20_DECI_PER_GRAM => "decilitre per gram",
            InvoiceSuiteCodelistUnitCodes::REC20_DECIMETRE => "decimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_DECI_METR => "decinewton metre",
            InvoiceSuiteCodelistUnitCodes::REC20_DECITEX => "decitex",
            InvoiceSuiteCodelistUnitCodes::REC20_DECITONNE => "decitonne",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_UNIT_OF_ANGL => "degree [unit of angle]",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_UNIT_OF_ANGL_PER_SECO_SQUA => "degree [unit of angle] per second squared",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_API => "degree API",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_BALL => "degree Balling",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_BAUM_ORIG_SCAL => "degree Baume (origin scale)",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_BAUM_US_HEAV => "degree Baume (US heavy)",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_BAUM_US_LIGH => "degree Baume (US light)",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_BRIX => "degree Brix",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_CELS => "degree Celsius",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_CELS_PER_BAR => "degree Celsius per bar",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_CELS_PER_HOUR => "degree Celsius per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_CELS_PER_KELV => "degree Celsius per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_CELS_PER_MINU => "degree Celsius per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_CELS_PER_SECO => "degree Celsius per second",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_DAY => "degree day",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_FAHR => "degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_FAHR_HOUR_PER_BRIT_THER_UNIT_INTE_TABL => "degree Fahrenheit hour per British thermal unit (international table)",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_FAHR_HOUR_PER_BRIT_THER_UNIT_THER => "degree Fahrenheit hour per British thermal unit (thermochemical)",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_FAHR_HOUR_SQUA_FOOT_PER_BRIT_THER_UNIT_INTE_TABL => "degree Fahrenheit hour square foot per British thermal unit (international table)",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_FAHR_HOUR_SQUA_FOOT_PER_BRIT_THER_UNIT_INTE_TABL_INCH => "degree Fahrenheit hour square foot per British thermal unit (international table) inch",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_FAHR_HOUR_SQUA_FOOT_PER_BRIT_THER_UNIT_THER => "degree Fahrenheit hour square foot per British thermal unit (thermochemical)",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_FAHR_HOUR_SQUA_FOOT_PER_BRIT_THER_UNIT_THER_INCH => "degree Fahrenheit hour square foot per British thermal unit (thermochemical) inch",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_FAHR_PER_BAR => "degree Fahrenheit per bar",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_FAHR_PER_HOUR => "degree Fahrenheit per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_FAHR_PER_KELV => "degree Fahrenheit per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_FAHR_PER_MINU => "degree Fahrenheit per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_FAHR_PER_SECO => "degree Fahrenheit per second",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_FAHR_SECO_PER_BRIT_THER_UNIT_INTE_TABL => "degree Fahrenheit second per British thermal unit (international table)",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_FAHR_SECO_PER_BRIT_THER_UNIT_THER => "degree Fahrenheit second per British thermal unit (thermochemical)",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_OECH => "degree Oechsle",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_PER_METR => "degree per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_PER_SECO => "degree per second",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_PLAT => "degree Plato",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_RANK => "degree Rankine",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_RANK_PER_HOUR => "degree Rankine per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_RANK_PER_MINU => "degree Rankine per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_RANK_PER_SECO => "degree Rankine per second",
            InvoiceSuiteCodelistUnitCodes::REC20_DEGR_TWAD => "degree Twaddell",
            InvoiceSuiteCodelistUnitCodes::REC20_DENIER => "denier",
            InvoiceSuiteCodelistUnitCodes::REC20_DENIER => "denier",
            InvoiceSuiteCodelistUnitCodes::REC20_DIGIT => "digit",
            InvoiceSuiteCodelistUnitCodes::REC20_DIOPTRE => "dioptre",
            InvoiceSuiteCodelistUnitCodes::REC20_DISP_TONN => "displacement tonnage",
            InvoiceSuiteCodelistUnitCodes::REC20_DOSE => "dose",
            InvoiceSuiteCodelistUnitCodes::REC20_DOTS_PER_INCH => "dots per inch",
            InvoiceSuiteCodelistUnitCodes::REC20_DOZEN => "dozen",
            InvoiceSuiteCodelistUnitCodes::REC20_DOZE_PACK => "dozen pack",
            InvoiceSuiteCodelistUnitCodes::REC20_DOZE_PAIR => "dozen pair",
            InvoiceSuiteCodelistUnitCodes::REC20_DOZE_PIEC => "dozen piece",
            InvoiceSuiteCodelistUnitCodes::REC20_DOZE_ROLL => "dozen roll",
            InvoiceSuiteCodelistUnitCodes::REC20_DRAM_UK => "dram (UK)",
            InvoiceSuiteCodelistUnitCodes::REC20_DRAM_US => "dram (US)",
            InvoiceSuiteCodelistUnitCodes::REC20_DRY_BARR_US => "dry barrel (US)",
            InvoiceSuiteCodelistUnitCodes::REC20_DRY_GALL_US => "dry gallon (US)",
            InvoiceSuiteCodelistUnitCodes::REC20_DRY_PINT_US => "dry pint (US)",
            InvoiceSuiteCodelistUnitCodes::REC20_DRY_POUN => "dry pound",
            InvoiceSuiteCodelistUnitCodes::REC20_DRY_QUAR_US => "dry quart (US)",
            InvoiceSuiteCodelistUnitCodes::REC20_DRY_TON => "dry ton",
            InvoiceSuiteCodelistUnitCodes::REC20_DYNE_METR => "dyne metre",
            InvoiceSuiteCodelistUnitCodes::REC20_EACH => "each",
            InvoiceSuiteCodelistUnitCodes::REC20_ELEC_MAIL_BOX => "electronic mail box",
            InvoiceSuiteCodelistUnitCodes::REC20_ELECTRONVOLT => "electronvolt",
            InvoiceSuiteCodelistUnitCodes::REC20_ELEC_PER_METR => "electronvolt per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_ELEC_SQUA_METR => "electronvolt square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_ELEC_SQUA_METR_PER_KILO => "electronvolt square metre per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_EQUI_GALL => "equivalent gallon",
            InvoiceSuiteCodelistUnitCodes::REC20_ERLANG => "erlang",
            InvoiceSuiteCodelistUnitCodes::REC20_EXAB_PER_SECO => "exabit per second",
            InvoiceSuiteCodelistUnitCodes::REC20_EXAJOULE => "exajoule",
            InvoiceSuiteCodelistUnitCodes::REC20_EXBI_PER_CUBI_METR => "exbibit per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_EXBI_PER_METR => "exbibit per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_EXBI_PER_SQUA_METR => "exbibit per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_EXBIBYTE => "exbibyte",
            InvoiceSuiteCodelistUnitCodes::REC20_FAIL_IN_TIME => "failures in time",
            InvoiceSuiteCodelistUnitCodes::REC20_FARAD => "farad",
            InvoiceSuiteCodelistUnitCodes::REC20_FARA_PER_KILO => "farad per kilometre",
            InvoiceSuiteCodelistUnitCodes::REC20_FARA_PER_METR => "farad per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_FATHOM => "fathom",
            InvoiceSuiteCodelistUnitCodes::REC20_FEMTOJOULE => "femtojoule",
            InvoiceSuiteCodelistUnitCodes::REC20_FEMTOLITRE => "femtolitre",
            InvoiceSuiteCodelistUnitCodes::REC20_FEMTOMETRE => "femtometre",
            InvoiceSuiteCodelistUnitCodes::REC20_FIBR_METR => "fibre metre",
            InvoiceSuiteCodelistUnitCodes::REC20_FIVE_PACK => "five pack",
            InvoiceSuiteCodelistUnitCodes::REC20_FIXE_RATE => "fixed rate",
            InvoiceSuiteCodelistUnitCodes::REC20_FLAK_TON => "flake ton",
            InvoiceSuiteCodelistUnitCodes::REC20_FLUI_OUNC_UK => "fluid ounce (UK)",
            InvoiceSuiteCodelistUnitCodes::REC20_FLUI_OUNC_US => "fluid ounce (US)",
            InvoiceSuiteCodelistUnitCodes::REC20_FOOT => "foot",
            InvoiceSuiteCodelistUnitCodes::REC20_FOOT_US_SURV => "foot (U.S. survey)",
            InvoiceSuiteCodelistUnitCodes::REC20_FOOT_OF_WATE__F => "foot of water (39.2 ºF)",
            InvoiceSuiteCodelistUnitCodes::REC20_FOOT_PER_DEGR_FAHR => "foot per degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_FOOT_PER_HOUR => "foot per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_FOOT_PER_MINU => "foot per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_FOOT_PER_PSI => "foot per psi",
            InvoiceSuiteCodelistUnitCodes::REC20_FOOT_PER_SECO => "foot per second",
            InvoiceSuiteCodelistUnitCodes::REC20_FOOT_PER_SECO_DEGR_FAHR => "foot per second degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_FOOT_PER_SECO_PSI => "foot per second psi",
            InvoiceSuiteCodelistUnitCodes::REC20_FOOT_PER_SECO_SQUA => "foot per second squared",
            InvoiceSuiteCodelistUnitCodes::REC20_FOOT_PER_THOU => "foot per thousand",
            InvoiceSuiteCodelistUnitCodes::REC20_FOOT_POUN => "foot pound-force",
            InvoiceSuiteCodelistUnitCodes::REC20_FOOT_POUN_PER_HOUR => "foot pound-force per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_FOOT_POUN_PER_MINU => "foot pound-force per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_FOOT_POUN_PER_SECO => "foot pound-force per second",
            InvoiceSuiteCodelistUnitCodes::REC20_FOOT_POUN => "foot poundal",
            InvoiceSuiteCodelistUnitCodes::REC20_FOOT_TO_THE_FOUR_POWE => "foot to the fourth power",
            InvoiceSuiteCodelistUnitCodes::REC20_FOOTCANDLE => "footcandle",
            InvoiceSuiteCodelistUnitCodes::REC20_FOOTLAMBERT => "footlambert",
            InvoiceSuiteCodelistUnitCodes::REC20_FORM_NEPH_UNIT => "Formazin nephelometric unit",
            InvoiceSuiteCodelistUnitCodes::REC20_FORT_FOOT_CONT => "forty foot container",
            InvoiceSuiteCodelistUnitCodes::REC20_FRANKLIN => "franklin",
            InvoiceSuiteCodelistUnitCodes::REC20_FREI_TON => "freight ton",
            InvoiceSuiteCodelistUnitCodes::REC20_FREN_GAUG => "French gauge",
            InvoiceSuiteCodelistUnitCodes::REC20_FURLONG => "furlong",
            InvoiceSuiteCodelistUnitCodes::REC20_GAL => "gal",
            InvoiceSuiteCodelistUnitCodes::REC20_GALL_UK => "gallon (UK)",
            InvoiceSuiteCodelistUnitCodes::REC20_GALL_UK_PER_DAY => "gallon (UK) per day",
            InvoiceSuiteCodelistUnitCodes::REC20_GALL_UK_PER_HOUR => "gallon (UK) per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_GALL_UK_PER_SECO => "gallon (UK) per second",
            InvoiceSuiteCodelistUnitCodes::REC20_GALL_US_LIQU_PER_SECO => "gallon (US liquid) per second",
            InvoiceSuiteCodelistUnitCodes::REC20_GALL_US => "gallon (US)",
            InvoiceSuiteCodelistUnitCodes::REC20_GALL_US_PER_DAY => "gallon (US) per day",
            InvoiceSuiteCodelistUnitCodes::REC20_GALL_US_PER_HOUR => "gallon (US) per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_GAMMA => "gamma",
            InvoiceSuiteCodelistUnitCodes::REC20_GIBIBIT => "gibibit",
            InvoiceSuiteCodelistUnitCodes::REC20_GIBI_PER_CUBI_METR => "gibibit per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_GIBI_PER_METR => "gibibit per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_GIBI_PER_SQUA_METR => "gibibit per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_GIBIBYTE => "gibibyte",
            InvoiceSuiteCodelistUnitCodes::REC20_GIGABECQUEREL => "gigabecquerel",
            InvoiceSuiteCodelistUnitCodes::REC20_GIGABIT => "gigabit",
            InvoiceSuiteCodelistUnitCodes::REC20_GIGA_PER_SECO => "gigabit per second",
            InvoiceSuiteCodelistUnitCodes::REC20_GIGABYTE => "gigabyte",
            InvoiceSuiteCodelistUnitCodes::REC20_GIGA_PER_SECO => "gigabyte per second",
            InvoiceSuiteCodelistUnitCodes::REC20_GIGA_PER_CUBI_METR => "gigacoulomb per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_GIGAELECTRONVOLT => "gigaelectronvolt",
            InvoiceSuiteCodelistUnitCodes::REC20_GIGAHERTZ => "gigahertz",
            InvoiceSuiteCodelistUnitCodes::REC20_GIGA_METR => "gigahertz metre",
            InvoiceSuiteCodelistUnitCodes::REC20_GIGAJOULE => "gigajoule",
            InvoiceSuiteCodelistUnitCodes::REC20_GIGAOHM => "gigaohm",
            InvoiceSuiteCodelistUnitCodes::REC20_GIGA_METR => "gigaohm metre",
            InvoiceSuiteCodelistUnitCodes::REC20_GIGA_PER_METR => "gigaohm per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_GIGAPASCAL => "gigapascal",
            InvoiceSuiteCodelistUnitCodes::REC20_GIGAWATT => "gigawatt",
            InvoiceSuiteCodelistUnitCodes::REC20_GIGA_HOUR => "gigawatt hour",
            InvoiceSuiteCodelistUnitCodes::REC20_GILBERT => "gilbert",
            InvoiceSuiteCodelistUnitCodes::REC20_GILL_UK => "gill (UK)",
            InvoiceSuiteCodelistUnitCodes::REC20_GILL_UK_PER_DAY => "gill (UK) per day",
            InvoiceSuiteCodelistUnitCodes::REC20_GILL_UK_PER_HOUR => "gill (UK) per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_GILL_UK_PER_MINU => "gill (UK) per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_GILL_UK_PER_SECO => "gill (UK) per second",
            InvoiceSuiteCodelistUnitCodes::REC20_GILL_US => "gill (US)",
            InvoiceSuiteCodelistUnitCodes::REC20_GILL_US_PER_DAY => "gill (US) per day",
            InvoiceSuiteCodelistUnitCodes::REC20_GILL_US_PER_HOUR => "gill (US) per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_GILL_US_PER_MINU => "gill (US) per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_GILL_US_PER_SECO => "gill (US) per second",
            InvoiceSuiteCodelistUnitCodes::REC20_GON => "gon",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAIN => "grain",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAI_PER_GALL_US => "grain per gallon (US)",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM => "gram",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_CENT_PER_SECO => "gram centimetre per second",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_MILL => "gram millimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_OF_FISS_ISOT => "gram of fissile isotope",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_BAR => "gram per bar",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_CENT_SECO => "gram per centimetre second",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_CUBI_CENT => "gram per cubic centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_CUBI_CENT_BAR => "gram per cubic centimetre bar",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_CUBI_CENT_KELV => "gram per cubic centimetre kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_CUBI_DECI => "gram per cubic decimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_CUBI_DECI_BAR => "gram per cubic decimetre bar",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_CUBI_DECI_KELV => "gram per cubic decimetre kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_CUBI_METR => "gram per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_CUBI_METR_BAR => "gram per cubic metre bar",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_CUBI_METR_KELV => "gram per cubic metre kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_DAY => "gram per day",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_DAY_BAR => "gram per day bar",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_DAY_KELV => "gram per day kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_HERT => "gram per hertz",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_HOUR => "gram per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_HOUR_BAR => "gram per hour bar",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_HOUR_KELV => "gram per hour kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_KELV => "gram per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_LITR => "gram per litre",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_LITR_BAR => "gram per litre bar",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_LITR_KELV => "gram per litre kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_METR_GRAM_PER__CENT => "gram per metre (gram per 100 centimetres)",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_MILL => "gram per millilitre",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_MILL_BAR => "gram per millilitre bar",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_MILL_KELV => "gram per millilitre kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_MILL => "gram per millimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_MINU => "gram per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_MINU_BAR => "gram per minute bar",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_MINU_KELV => "gram per minute kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_MOLE => "gram per mole",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_SECO => "gram per second",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_SECO_BAR => "gram per second bar",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_SECO_KELV => "gram per second kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_SQUA_CENT => "gram per square centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_SQUA_METR => "gram per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_SQUA_MILL => "gram per square millimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_DRY_WEIG => "gram, dry weight",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_INCL_CONT => "gram, including container",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_INCL_INNE_PACK => "gram, including inner packaging",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAM_PER_SQUA_CENT => "gram-force per square centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAY => "gray",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAY_PER_HOUR => "gray per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAY_PER_MINU => "gray per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_GRAY_PER_SECO => "gray per second",
            InvoiceSuiteCodelistUnitCodes::REC20_GREA_GROS => "great gross",
            InvoiceSuiteCodelistUnitCodes::REC20_GROSS => "gross",
            InvoiceSuiteCodelistUnitCodes::REC20_GROS_KILO => "gross kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_GROUP => "group",
            InvoiceSuiteCodelistUnitCodes::REC20_GUNT_CHAI => "Gunters chain",
            InvoiceSuiteCodelistUnitCodes::REC20_HALF_YEAR__MONT => "half year (6 months)",
            InvoiceSuiteCodelistUnitCodes::REC20_HANG_CONT => "hanging container",
            InvoiceSuiteCodelistUnitCodes::REC20_HANK => "hank",
            InvoiceSuiteCodelistUnitCodes::REC20_HARTLEY => "hartley",
            InvoiceSuiteCodelistUnitCodes::REC20_HART_PER_SECO => "hartley per second",
            InvoiceSuiteCodelistUnitCodes::REC20_HEAD => "head",
            InvoiceSuiteCodelistUnitCodes::REC20_HECTOBAR => "hectobar",
            InvoiceSuiteCodelistUnitCodes::REC20_HECTOGRAM => "hectogram",
            InvoiceSuiteCodelistUnitCodes::REC20_HECTOLITRE => "hectolitre",
            InvoiceSuiteCodelistUnitCodes::REC20_HECT_OF_PURE_ALCO => "hectolitre of pure alcohol",
            InvoiceSuiteCodelistUnitCodes::REC20_HECTOMETRE => "hectometre",
            InvoiceSuiteCodelistUnitCodes::REC20_HECTOPASCAL => "hectopascal",
            InvoiceSuiteCodelistUnitCodes::REC20_HECT_CUBI_METR_PER_SECO => "hectopascal cubic metre per second",
            InvoiceSuiteCodelistUnitCodes::REC20_HECT_LITR_PER_SECO => "hectopascal litre per second",
            InvoiceSuiteCodelistUnitCodes::REC20_HECT_PER_BAR => "hectopascal per bar",
            InvoiceSuiteCodelistUnitCodes::REC20_HECT_PER_KELV => "hectopascal per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_HECT_PER_METR => "hectopascal per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_HEFNERKERZE => "Hefner-Kerze",
            InvoiceSuiteCodelistUnitCodes::REC20_HENRY => "henry",
            InvoiceSuiteCodelistUnitCodes::REC20_HENR_PER_KILO => "henry per kiloohm",
            InvoiceSuiteCodelistUnitCodes::REC20_HENR_PER_METR => "henry per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_HENR_PER_OHM => "henry per ohm",
            InvoiceSuiteCodelistUnitCodes::REC20_HERTZ => "hertz",
            InvoiceSuiteCodelistUnitCodes::REC20_HERT_METR => "hertz metre",
            InvoiceSuiteCodelistUnitCodes::REC20_HORS_BOIL => "horsepower (boiler)",
            InvoiceSuiteCodelistUnitCodes::REC20_HORS_ELEC => "horsepower (electric)",
            InvoiceSuiteCodelistUnitCodes::REC20_HOUR => "hour",
            InvoiceSuiteCodelistUnitCodes::REC20_HUNDRED => "hundred",
            InvoiceSuiteCodelistUnitCodes::REC20_HUND_BOAR_FOOT => "hundred board foot",
            InvoiceSuiteCodelistUnitCodes::REC20_HUND_BOXE => "hundred boxes",
            InvoiceSuiteCodelistUnitCodes::REC20_HUND_COUN => "hundred count",
            InvoiceSuiteCodelistUnitCodes::REC20_HUND_CUBI_FOOT => "hundred cubic foot",
            InvoiceSuiteCodelistUnitCodes::REC20_HUND_CUBI_METR => "hundred cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_HUND_INTE_UNIT => "hundred international unit",
            InvoiceSuiteCodelistUnitCodes::REC20_HUND_KILO_DRY_WEIG => "hundred kilogram, dry weight",
            InvoiceSuiteCodelistUnitCodes::REC20_HUND_KILO_NET_MASS => "hundred kilogram, net mass",
            InvoiceSuiteCodelistUnitCodes::REC20_HUND_LEAV => "hundred leave",
            InvoiceSuiteCodelistUnitCodes::REC20_HUND_METR => "hundred metre",
            InvoiceSuiteCodelistUnitCodes::REC20_HUND_PACK => "hundred pack",
            InvoiceSuiteCodelistUnitCodes::REC20_HUND_POUN_CWT_HUND_WEIG_US => "hundred pound (cwt) / hundred weight (US)",
            InvoiceSuiteCodelistUnitCodes::REC20_HUND_WEIG_UK => "hundred weight (UK)",
            InvoiceSuiteCodelistUnitCodes::REC20_HYDR_HORS_POWE => "hydraulic horse power",
            InvoiceSuiteCodelistUnitCodes::REC20_IMPE_GALL_PER_MINU => "Imperial gallon per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_INCH => "inch",
            InvoiceSuiteCodelistUnitCodes::REC20_INCH_OF_MERC => "inch of mercury",
            InvoiceSuiteCodelistUnitCodes::REC20_INCH_OF_MERC__F => "inch of mercury (32 ºF)",
            InvoiceSuiteCodelistUnitCodes::REC20_INCH_OF_MERC__F => "inch of mercury (60 ºF)",
            InvoiceSuiteCodelistUnitCodes::REC20_INCH_OF_WATE => "inch of water",
            InvoiceSuiteCodelistUnitCodes::REC20_INCH_OF_WATE__F => "inch of water (39.2 ºF)",
            InvoiceSuiteCodelistUnitCodes::REC20_INCH_OF_WATE__F => "inch of water (60 ºF)",
            InvoiceSuiteCodelistUnitCodes::REC20_INCH_PER_DEGR_FAHR => "inch per degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_INCH_PER_LINE_FOOT => "inch per linear foot",
            InvoiceSuiteCodelistUnitCodes::REC20_INCH_PER_MINU => "inch per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_INCH_PER_PSI => "inch per psi",
            InvoiceSuiteCodelistUnitCodes::REC20_INCH_PER_SECO => "inch per second",
            InvoiceSuiteCodelistUnitCodes::REC20_INCH_PER_SECO_DEGR_FAHR => "inch per second degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_INCH_PER_SECO_PSI => "inch per second psi",
            InvoiceSuiteCodelistUnitCodes::REC20_INCH_PER_SECO_SQUA => "inch per second squared",
            InvoiceSuiteCodelistUnitCodes::REC20_INCH_PER_TWO_PI_RADI => "inch per two pi radiant",
            InvoiceSuiteCodelistUnitCodes::REC20_INCH_PER_YEAR => "inch per year",
            InvoiceSuiteCodelistUnitCodes::REC20_INCH_POUN_POUN_INCH => "inch pound (pound inch)",
            InvoiceSuiteCodelistUnitCodes::REC20_INCH_POUN => "inch poundal",
            InvoiceSuiteCodelistUnitCodes::REC20_INCH_TO_THE_FOUR_POWE => "inch to the fourth power",
            InvoiceSuiteCodelistUnitCodes::REC20_INTE_CAND => "international candle",
            InvoiceSuiteCodelistUnitCodes::REC20_INTE_SUGA_DEGR => "international sugar degree",
            InvoiceSuiteCodelistUnitCodes::REC20_INTE_UNIT_PER_GRAM => "international unit per gram",
            InvoiceSuiteCodelistUnitCodes::REC20_JOB => "job",
            InvoiceSuiteCodelistUnitCodes::REC20_JOULE => "joule",
            InvoiceSuiteCodelistUnitCodes::REC20_JOUL_PER_CUBI_METR => "joule per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_JOUL_PER_DAY => "joule per day",
            InvoiceSuiteCodelistUnitCodes::REC20_JOUL_PER_GRAM => "joule per gram",
            InvoiceSuiteCodelistUnitCodes::REC20_JOUL_PER_HOUR => "joule per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_JOUL_PER_KELV => "joule per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_JOUL_PER_KILO => "joule per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_JOUL_PER_KILO_KELV => "joule per kilogram kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_JOUL_PER_METR => "joule per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_JOUL_PER_METR_TO_THE_FOUR_POWE => "joule per metre to the fourth power",
            InvoiceSuiteCodelistUnitCodes::REC20_JOUL_PER_MINU => "joule per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_JOUL_PER_MOLE => "joule per mole",
            InvoiceSuiteCodelistUnitCodes::REC20_JOUL_PER_MOLE_KELV => "joule per mole kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_JOUL_PER_NORM_CUBI_METR => "Joule per normalised cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_JOUL_PER_SECO => "joule per second",
            InvoiceSuiteCodelistUnitCodes::REC20_JOUL_PER_SQUA_CENT => "joule per square centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_JOUL_PER_SQUA_METR => "joule per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_JOUL_PER_STAN_CUBI_METR => "Joule per standard cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_JOUL_PER_TESL => "joule per tesla",
            InvoiceSuiteCodelistUnitCodes::REC20_JOUL_SECO => "joule second",
            InvoiceSuiteCodelistUnitCodes::REC20_JOUL_SQUA_METR => "joule square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_JOUL_SQUA_METR_PER_KILO => "joule square metre per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_KATAL => "katal",
            InvoiceSuiteCodelistUnitCodes::REC20_KELVIN => "kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_KELV_METR_PER_WATT => "kelvin metre per watt",
            InvoiceSuiteCodelistUnitCodes::REC20_KELV_PER_BAR => "kelvin per bar",
            InvoiceSuiteCodelistUnitCodes::REC20_KELV_PER_HOUR => "kelvin per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_KELV_PER_KELV => "kelvin per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_KELV_PER_MINU => "kelvin per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_KELV_PER_PASC => "kelvin per pascal",
            InvoiceSuiteCodelistUnitCodes::REC20_KELV_PER_SECO => "kelvin per second",
            InvoiceSuiteCodelistUnitCodes::REC20_KELV_PER_WATT => "kelvin per watt",
            InvoiceSuiteCodelistUnitCodes::REC20_KIBIBIT => "kibibit",
            InvoiceSuiteCodelistUnitCodes::REC20_KIBI_PER_CUBI_METR => "kibibit per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_KIBI_PER_METR => "kibibit per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_KIBI_PER_SQUA_METR => "kibibit per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_KIBIBYTE => "kibibyte",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOAMPERE => "kiloampere",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_HOUR_THOU_AMPE_HOUR => "kiloampere hour (thousand ampere hour)",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_METR => "kiloampere per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_SQUA_METR => "kiloampere per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOBAR => "kilobar",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOBAUD => "kilobaud",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOBECQUEREL => "kilobecquerel",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_KILO => "kilobecquerel per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOBIT => "kilobit",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_SECO => "kilobit per second",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOBYTE => "kilobyte",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_SECO => "kilobyte per second",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_INTE_TABL => "kilocalorie (international table)",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_INTE_TABL_PER_GRAM_KELV => "kilocalorie (international table) per gram kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_INTE_TABL_PER_HOUR_METR_DEGR_CELS => "kilocalorie (international table) per hour metre degree Celsius",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_MEAN => "kilocalorie (mean)",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_THER => "kilocalorie (thermochemical)",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_THER_PER_HOUR => "kilocalorie (thermochemical) per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_THER_PER_MINU => "kilocalorie (thermochemical) per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_THER_PER_SECO => "kilocalorie (thermochemical) per second",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOCANDELA => "kilocandela",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOCHARACTER => "kilocharacter",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOCOULOMB => "kilocoulomb",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_CUBI_METR => "kilocoulomb per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_SQUA_METR => "kilocoulomb per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOCURIE => "kilocurie",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOELECTRONVOLT => "kiloelectronvolt",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOFARAD => "kilofarad",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOGRAM => "kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_CENT_PER_SECO => "kilogram centimetre per second",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_DRAI_NET_WEIG => "kilogram drained net weight",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_METR => "kilogram metre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_METR_PER_SECO => "kilogram metre per second",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_METR_PER_SECO_SQUA => "kilogram metre per second squared",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_METR_SQUA => "kilogram metre squared",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_METR_SQUA_PER_SECO => "kilogram metre squared per second",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_NAME_SUBS => "kilogram named substance",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_OF_CHOL_CHLO => "kilogram of choline chloride",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_OF_HYDR_PERO => "kilogram of hydrogen peroxide",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_OF_IMPO_MEAT_LESS_OFFA => "kilogram of imported meat, less offal",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_OF_METH => "kilogram of methylamine",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_OF_NITR => "kilogram of nitrogen",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_OF_PHOS_PENT_PHOS_ANHY => "kilogram of phosphorus pentoxide (phosphoric anhydride)",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_OF_POTA_HYDR_CAUS_POTA => "kilogram of potassium hydroxide (caustic potash)",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_OF_POTA_OXID => "kilogram of potassium oxide",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_OF_SODI_HYDR_CAUS_SODA => "kilogram of sodium hydroxide (caustic soda)",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_OF_SUBS__DRY => "kilogram of substance 90 % dry",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_OF_TUNG_TRIO => "kilogram of tungsten trioxide",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_OF_URAN => "kilogram of uranium",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_BAR => "kilogram per bar",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_CUBI_CENT => "kilogram per cubic centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_CUBI_CENT_BAR => "kilogram per cubic centimetre bar",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_CUBI_CENT_KELV => "kilogram per cubic centimetre kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_CUBI_DECI => "kilogram per cubic decimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_CUBI_DECI_BAR => "kilogram per cubic decimetre bar",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_CUBI_DECI_KELV => "kilogram per cubic decimetre kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_CUBI_METR => "kilogram per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_CUBI_METR_BAR => "kilogram per cubic metre bar",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_CUBI_METR_KELV => "kilogram per cubic metre kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_CUBI_METR_PASC => "kilogram per cubic metre pascal",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_DAY => "kilogram per day",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_DAY_BAR => "kilogram per day bar",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_DAY_KELV => "kilogram per day kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_HOUR => "kilogram per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_HOUR_BAR => "kilogram per hour bar",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_HOUR_KELV => "kilogram per hour kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_KELV => "kilogram per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_KILO => "kilogram per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_KILO => "kilogram per kilometre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_KILO => "kilogram per kilomol",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_LITR => "kilogram per litre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_LITR_BAR => "kilogram per litre bar",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_LITR_KELV => "kilogram per litre kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_METR => "kilogram per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_METR_DAY => "kilogram per metre day",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_METR_HOUR => "kilogram per metre hour",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_METR_MINU => "kilogram per metre minute",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_METR_SECO => "kilogram per metre second",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_MILL => "kilogram per millimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_MILL_WIDT => "kilogram per millimetre width",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_MINU => "kilogram per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_MINU_BAR => "kilogram per minute bar",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_MINU_KELV => "kilogram per minute kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_MOLE => "kilogram per mole",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_PASC => "kilogram per pascal",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_SECO => "kilogram per second",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_SECO_BAR => "kilogram per second bar",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_SECO_KELV => "kilogram per second kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_SECO_PASC => "kilogram per second pascal",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_SQUA_CENT => "kilogram per square centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_SQUA_METR => "kilogram per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_SQUA_METR_PASC_SECO => "kilogram per square metre pascal second",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_SQUA_METR_SECO => "kilogram per square metre second",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_SQUA_CENT => "kilogram square centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_SQUA_MILL => "kilogram square millimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_DRY_WEIG => "kilogram, dry weight",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_INCL_CONT => "kilogram, including container",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_INCL_INNE_PACK => "kilogram, including inner packaging",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_METR_PER_SQUA_CENT => "kilogram-force metre per square centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_SQUA_CENT => "kilogram-force per square centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_SQUA_MILL => "kilogram-force per square millimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOHENRY => "kilohenry",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOHERTZ => "kilohertz",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_METR => "kilohertz metre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOJOULE => "kilojoule",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_DAY => "kilojoule per day",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_GRAM => "kilojoule per gram",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_HOUR => "kilojoule per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_KELV => "kilojoule per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_KILO => "kilojoule per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_KILO_KELV => "kilojoule per kilogram kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_MINU => "kilojoule per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_MOLE => "kilojoule per mole",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_SECO => "kilojoule per second",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOLITRE => "kilolitre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_HOUR => "kilolitre per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOLUX => "kilolux",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOMETRE => "kilometre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_HOUR => "kilometre per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_SECO => "kilometre per second",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_SECO_SQUA => "kilometre per second squared",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOMOLE => "kilomole",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_CUBI_METR => "kilomole per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_CUBI_METR_BAR => "kilomole per cubic metre bar",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_CUBI_METR_KELV => "kilomole per cubic metre kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_HOUR => "kilomole per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_KILO => "kilomole per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_MINU => "kilomole per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_SECO => "kilomole per second",
            InvoiceSuiteCodelistUnitCodes::REC20_KILONEWTON => "kilonewton",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_METR => "kilonewton metre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_METR => "kilonewton per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_SQUA_METR => "kilonewton per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOOHM => "kiloohm",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_METR => "kiloohm metre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOPASCAL => "kilopascal",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_BAR => "kilopascal per bar",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_KELV => "kilopascal per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_METR => "kilopascal per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_MILL => "kilopascal per millimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_SQUA_METR_PER_GRAM => "kilopascal square metre per gram",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_HOUR => "kilopound per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOPOUNDFORCE => "kilopound-force",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOROENTGEN => "kiloroentgen",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOSECOND => "kilosecond",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOSEGMENT => "kilosegment",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOSIEMENS => "kilosiemens",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_METR => "kilosiemens per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOTESLA => "kilotesla",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOTONNE => "kilotonne",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOVAR => "kilovar",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOVOLT => "kilovolt",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_AMPE => "kilovolt - ampere",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_AMPE_HOUR => "kilovolt ampere hour",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_AMPE_REAC_DEMA => "kilovolt ampere reactive demand",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_AMPE_REAC_HOUR => "kilovolt ampere reactive hour",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_METR => "kilovolt per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOWATT => "kilowatt",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_DEMA => "kilowatt demand",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_HOUR => "kilowatt hour",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_HOUR_PER_CUBI_METR => "kilowatt hour per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_HOUR_PER_HOUR => "kilowatt hour per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_HOUR_PER_KELV => "kilowatt hour per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_HOUR_PER_NORM_CUBI_METR => "Kilowatt hour per normalized cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_HOUR_PER_STAN_CUBI_METR => "Kilowatt hour per standard cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_METR_DEGR_CELS => "kilowatt per metre degree Celsius",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_METR_KELV => "kilowatt per metre kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_SQUA_METR_KELV => "kilowatt per square metre kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_YEAR => "kilowatt year",
            InvoiceSuiteCodelistUnitCodes::REC20_KILOWEBER => "kiloweber",
            InvoiceSuiteCodelistUnitCodes::REC20_KILO_PER_METR => "kiloweber per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_KIP_PER_SQUA_INCH => "kip per square inch",
            InvoiceSuiteCodelistUnitCodes::REC20_KIT => "kit",
            InvoiceSuiteCodelistUnitCodes::REC20_KNOT => "knot",
            InvoiceSuiteCodelistUnitCodes::REC20_LABO_HOUR => "labour hour",
            InvoiceSuiteCodelistUnitCodes::REC20_LACT_DRY_MATE_PERC => "lactic dry material percentage",
            InvoiceSuiteCodelistUnitCodes::REC20_LACT_EXCE_PERC => "lactose excess percentage",
            InvoiceSuiteCodelistUnitCodes::REC20_LAMBERT => "lambert",
            InvoiceSuiteCodelistUnitCodes::REC20_LANGLEY => "langley",
            InvoiceSuiteCodelistUnitCodes::REC20_LAYER => "layer",
            InvoiceSuiteCodelistUnitCodes::REC20_LEAF => "leaf",
            InvoiceSuiteCodelistUnitCodes::REC20_LENGTH => "length",
            InvoiceSuiteCodelistUnitCodes::REC20_LIGH_YEAR => "light year",
            InvoiceSuiteCodelistUnitCodes::REC20_LINE_FOOT => "linear foot",
            InvoiceSuiteCodelistUnitCodes::REC20_LINE_METR => "linear metre",
            InvoiceSuiteCodelistUnitCodes::REC20_LINE_YARD => "linear yard",
            InvoiceSuiteCodelistUnitCodes::REC20_LINK => "link",
            InvoiceSuiteCodelistUnitCodes::REC20_LIQU_PINT_US => "liquid pint (US)",
            InvoiceSuiteCodelistUnitCodes::REC20_LIQU_POUN => "liquid pound",
            InvoiceSuiteCodelistUnitCodes::REC20_LIQU_QUAR_US => "liquid quart (US)",
            InvoiceSuiteCodelistUnitCodes::REC20_LITRE => "litre",
            InvoiceSuiteCodelistUnitCodes::REC20_LITR_OF_PURE_ALCO => "litre of pure alcohol",
            InvoiceSuiteCodelistUnitCodes::REC20_LITR_PER_BAR => "litre per bar",
            InvoiceSuiteCodelistUnitCodes::REC20_LITR_PER_DAY => "litre per day",
            InvoiceSuiteCodelistUnitCodes::REC20_LITR_PER_DAY_BAR => "litre per day bar",
            InvoiceSuiteCodelistUnitCodes::REC20_LITR_PER_DAY_KELV => "litre per day kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_LITR_PER_HOUR => "litre per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_LITR_PER_HOUR_BAR => "litre per hour bar",
            InvoiceSuiteCodelistUnitCodes::REC20_LITR_PER_HOUR_KELV => "litre per hour kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_LITR_PER_KELV => "litre per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_LITR_PER_KILO => "litre per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_LITR_PER_LITR => "litre per litre",
            InvoiceSuiteCodelistUnitCodes::REC20_LITR_PER_MINU => "litre per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_LITR_PER_MINU_BAR => "litre per minute bar",
            InvoiceSuiteCodelistUnitCodes::REC20_LITR_PER_MINU_KELV => "litre per minute kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_LITR_PER_MOLE => "litre per mole",
            InvoiceSuiteCodelistUnitCodes::REC20_LITR_PER_SECO => "litre per second",
            InvoiceSuiteCodelistUnitCodes::REC20_LITR_PER_SECO_BAR => "litre per second bar",
            InvoiceSuiteCodelistUnitCodes::REC20_LITR_PER_SECO_KELV => "litre per second kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_LOAD => "load",
            InvoiceSuiteCodelistUnitCodes::REC20_LOT_UNIT_OF_PROC => "lot [unit of procurement]",
            InvoiceSuiteCodelistUnitCodes::REC20_LOT_UNIT_OF_WEIG => "lot [unit of weight]",
            InvoiceSuiteCodelistUnitCodes::REC20_LUMEN => "lumen",
            InvoiceSuiteCodelistUnitCodes::REC20_LUME_HOUR => "lumen hour",
            InvoiceSuiteCodelistUnitCodes::REC20_LUME_PER_SQUA_FOOT => "lumen per square foot",
            InvoiceSuiteCodelistUnitCodes::REC20_LUME_PER_SQUA_METR => "lumen per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_LUME_PER_WATT => "lumen per watt",
            InvoiceSuiteCodelistUnitCodes::REC20_LUME_SECO => "lumen second",
            InvoiceSuiteCodelistUnitCodes::REC20_LUMP_SUM => "lump sum",
            InvoiceSuiteCodelistUnitCodes::REC20_LUX => "lux",
            InvoiceSuiteCodelistUnitCodes::REC20_LUX_HOUR => "lux hour",
            InvoiceSuiteCodelistUnitCodes::REC20_LUX_SECO => "lux second",
            InvoiceSuiteCodelistUnitCodes::REC20_MANMONTH => "manmonth",
            InvoiceSuiteCodelistUnitCodes::REC20_MEAL => "meal",
            InvoiceSuiteCodelistUnitCodes::REC20_MEBIBIT => "mebibit",
            InvoiceSuiteCodelistUnitCodes::REC20_MEBI_PER_CUBI_METR => "mebibit per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MEBI_PER_METR => "mebibit per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MEBI_PER_SQUA_METR => "mebibit per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MEBIBYTE => "mebibyte",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_JOUL_PER_NORM_CUBI_METR => "Mega Joule per Normalised cubic Metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGAAMPERE => "megaampere",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_PER_SQUA_METR => "megaampere per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGABAUD => "megabaud",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGABECQUEREL => "megabecquerel",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_PER_KILO => "megabecquerel per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGABIT => "megabit",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_PER_SECO => "megabit per second",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGABYTE => "megabyte",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_PER_SECO => "megabyte per second",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGACOULOMB => "megacoulomb",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_PER_CUBI_METR => "megacoulomb per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_PER_SQUA_METR => "megacoulomb per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGAELECTRONVOLT => "megaelectronvolt",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGAGRAM => "megagram",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_PER_CUBI_METR => "megagram per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGAHERTZ => "megahertz",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_KILO => "megahertz kilometre",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_METR => "megahertz metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGAJOULE => "megajoule",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_PER_CUBI_METR => "megajoule per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_PER_KILO => "megajoule per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_PER_SECO => "megajoule per second",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGALITRE => "megalitre",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGAMETRE => "megametre",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGANEWTON => "meganewton",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_METR => "meganewton metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGAOHM => "megaohm",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_KILO => "megaohm kilometre",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_METR => "megaohm metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_PER_KILO => "megaohm per kilometre",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_PER_METR => "megaohm per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGAPASCAL => "megapascal",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_CUBI_METR_PER_SECO => "megapascal cubic metre per second",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_LITR_PER_SECO => "megapascal litre per second",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_PER_BAR => "megapascal per bar",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_PER_KELV => "megapascal per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGAPIXEL => "megapixel",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_PER_METR => "megasiemens per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGAVAR => "megavar",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGAVOLT => "megavolt",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_AMPE => "megavolt - ampere",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_AMPE_REAC_HOUR => "megavolt ampere reactive hour",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_PER_METR => "megavolt per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGAWATT => "megawatt",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_HOUR => "megawatt hour (1000 kW.h)",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_HOUR_PER_HOUR => "megawatt hour per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_PER_HERT => "megawatt per hertz",
            InvoiceSuiteCodelistUnitCodes::REC20_MEGA_PER_MINU => "megawatts per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_MESH => "mesh",
            InvoiceSuiteCodelistUnitCodes::REC20_MESSAGE => "message",
            InvoiceSuiteCodelistUnitCodes::REC20_METRE => "metre",
            InvoiceSuiteCodelistUnitCodes::REC20_METR_DAY => "Metre Day",
            InvoiceSuiteCodelistUnitCodes::REC20_METR_KELV => "metre kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_METR_MONT => "Metre Month",
            InvoiceSuiteCodelistUnitCodes::REC20_METR_PER_BAR => "metre per bar",
            InvoiceSuiteCodelistUnitCodes::REC20_METR_PER_DEGR_CELC_METR => "metre per degree Celcius metre",
            InvoiceSuiteCodelistUnitCodes::REC20_METR_PER_HOUR => "metre per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_METR_PER_KELV => "metre per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_METR_PER_MINU => "metre per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_METR_PER_PASC => "metre per pascal",
            InvoiceSuiteCodelistUnitCodes::REC20_METR_PER_RADI => "metre per radiant",
            InvoiceSuiteCodelistUnitCodes::REC20_METR_PER_SECO => "metre per second",
            InvoiceSuiteCodelistUnitCodes::REC20_METR_PER_SECO_BAR => "metre per second bar",
            InvoiceSuiteCodelistUnitCodes::REC20_METR_PER_SECO_KELV => "metre per second kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_METR_PER_SECO_PASC => "metre per second pascal",
            InvoiceSuiteCodelistUnitCodes::REC20_METR_PER_SECO_SQUA => "metre per second squared",
            InvoiceSuiteCodelistUnitCodes::REC20_METR_PER_VOLT_SECO => "metre per volt second",
            InvoiceSuiteCodelistUnitCodes::REC20_METR_TO_THE_FOUR_POWE => "metre to the fourth power",
            InvoiceSuiteCodelistUnitCodes::REC20_METR_WEEK => "Metre Week",
            InvoiceSuiteCodelistUnitCodes::REC20_METR_CARA => "metric carat",
            InvoiceSuiteCodelistUnitCodes::REC20_METR_TON_INCL_CONT => "metric ton, including container",
            InvoiceSuiteCodelistUnitCodes::REC20_METR_TON_INCL_INNE_PACK => "metric ton, including inner packaging",
            InvoiceSuiteCodelistUnitCodes::REC20_METR_TON_LUBR_OIL => "metric ton, lubricating oil",
            InvoiceSuiteCodelistUnitCodes::REC20_MICROINCH => "micro-inch",
            InvoiceSuiteCodelistUnitCodes::REC20_MICROAMPERE => "microampere",
            InvoiceSuiteCodelistUnitCodes::REC20_MICROBAR => "microbar",
            InvoiceSuiteCodelistUnitCodes::REC20_MICROBECQUEREL => "microbecquerel",
            InvoiceSuiteCodelistUnitCodes::REC20_MICROCOULOMB => "microcoulomb",
            InvoiceSuiteCodelistUnitCodes::REC20_MICR_PER_CUBI_METR => "microcoulomb per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MICR_PER_SQUA_METR => "microcoulomb per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MICROCURIE => "microcurie",
            InvoiceSuiteCodelistUnitCodes::REC20_MICROFARAD => "microfarad",
            InvoiceSuiteCodelistUnitCodes::REC20_MICR_PER_KILO => "microfarad per kilometre",
            InvoiceSuiteCodelistUnitCodes::REC20_MICR_PER_METR => "microfarad per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MICROGRAM => "microgram",
            InvoiceSuiteCodelistUnitCodes::REC20_MICR_PER_CUBI_METR => "microgram per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MICR_PER_CUBI_METR_BAR => "microgram per cubic metre bar",
            InvoiceSuiteCodelistUnitCodes::REC20_MICR_PER_CUBI_METR_KELV => "microgram per cubic metre kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_MICR_PER_HECT => "microgram per hectogram",
            InvoiceSuiteCodelistUnitCodes::REC20_MICR_PER_KILO => "microgram per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_MICR_PER_LITR => "microgram per litre",
            InvoiceSuiteCodelistUnitCodes::REC20_MICR_PER_HOUR => "microgray per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_MICR_PER_MINU => "microgray per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_MICR_PER_SECO => "microgray per second",
            InvoiceSuiteCodelistUnitCodes::REC20_MICROHENRY => "microhenry",
            InvoiceSuiteCodelistUnitCodes::REC20_MICR_PER_KILO => "microhenry per kiloohm",
            InvoiceSuiteCodelistUnitCodes::REC20_MICR_PER_METR => "microhenry per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MICR_PER_OHM => "microhenry per ohm",
            InvoiceSuiteCodelistUnitCodes::REC20_MICROLITRE => "microlitre",
            InvoiceSuiteCodelistUnitCodes::REC20_MICR_PER_LITR => "microlitre per litre",
            InvoiceSuiteCodelistUnitCodes::REC20_MICR_MICR => "micrometre (micron)",
            InvoiceSuiteCodelistUnitCodes::REC20_MICR_PER_KELV => "micrometre per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_MICROMOLE => "micromole",
            InvoiceSuiteCodelistUnitCodes::REC20_MICRONEWTON => "micronewton",
            InvoiceSuiteCodelistUnitCodes::REC20_MICR_METR => "micronewton metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MICROOHM => "microohm",
            InvoiceSuiteCodelistUnitCodes::REC20_MICR_METR => "microohm metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MICROPASCAL => "micropascal",
            InvoiceSuiteCodelistUnitCodes::REC20_MICROPOISE => "micropoise",
            InvoiceSuiteCodelistUnitCodes::REC20_MICRORADIAN => "microradian",
            InvoiceSuiteCodelistUnitCodes::REC20_MICROSECOND => "microsecond",
            InvoiceSuiteCodelistUnitCodes::REC20_MICROSIEMENS => "microsiemens",
            InvoiceSuiteCodelistUnitCodes::REC20_MICR_PER_CENT => "microsiemens per centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_MICR_PER_METR => "microsiemens per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MICR_PER_HOUR => "microsievert per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_MICR_PER_MINU => "microsievert per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_MICR_PER_SECO => "microsievert per second",
            InvoiceSuiteCodelistUnitCodes::REC20_MICROTESLA => "microtesla",
            InvoiceSuiteCodelistUnitCodes::REC20_MICROVOLT => "microvolt",
            InvoiceSuiteCodelistUnitCodes::REC20_MICR_PER_METR => "microvolt per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MICROWATT => "microwatt",
            InvoiceSuiteCodelistUnitCodes::REC20_MICR_PER_SQUA_METR => "microwatt per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MIL => "mil",
            InvoiceSuiteCodelistUnitCodes::REC20_MILE_BASE_ON_US_SURV_FOOT => "mile (based on U.S. survey foot)",
            InvoiceSuiteCodelistUnitCodes::REC20_MILE_STAT_MILE => "mile (statute mile)",
            InvoiceSuiteCodelistUnitCodes::REC20_MILE_STAT_MILE_PER_SECO_SQUA => "mile (statute mile) per second squared",
            InvoiceSuiteCodelistUnitCodes::REC20_MILE_PER_HOUR_STAT_MILE => "mile per hour (statute mile)",
            InvoiceSuiteCodelistUnitCodes::REC20_MILE_PER_MINU => "mile per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_MILE_PER_SECO => "mile per second",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLE => "mille",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLIINCH => "milli-inch",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLIAMPERE => "milliampere",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_HOUR => "milliampere hour",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_BAR => "milliampere per bar",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_INCH => "milliampere per inch",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_LITR_MINU => "milliampere per litre minute",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_MILL => "milliampere per millimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_POUN_PER_SQUA_INCH => "milliampere per pound-force per square inch",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLIARD => "milliard",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLIBAR => "millibar",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_CUBI_METR_PER_SECO => "millibar cubic metre per second",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_LITR_PER_SECO => "millibar litre per second",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_BAR => "millibar per bar",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_KELV => "millibar per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLICANDELA => "millicandela",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLICOULOMB => "millicoulomb",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_CUBI_METR => "millicoulomb per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_KILO => "millicoulomb per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_SQUA_METR => "millicoulomb per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLICURIE => "millicurie",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_CAUS_POTA_PER_GRAM_OF_PROD => "milliequivalence caustic potash per gram of product",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLIFARAD => "millifarad",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLIGAL => "milligal",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLIGRAM => "milligram",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_BAR => "milligram per bar",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_CUBI_METR => "milligram per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_CUBI_METR_BAR => "milligram per cubic metre bar",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_CUBI_METR_KELV => "milligram per cubic metre kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_DAY => "milligram per day",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_DAY_BAR => "milligram per day bar",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_DAY_KELV => "milligram per day kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_GRAM => "milligram per gram",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_HOUR => "milligram per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_HOUR_BAR => "milligram per hour bar",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_HOUR_KELV => "milligram per hour kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_KELV => "milligram per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_KILO => "milligram per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_LITR => "milligram per litre",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_METR => "milligram per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_MINU => "milligram per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_MINU_BAR => "milligram per minute bar",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_MINU_KELV => "milligram per minute kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_SECO => "milligram per second",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_SECO_BAR => "milligram per second bar",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_SECO_KELV => "milligram per second kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_SQUA_CENT => "milligram per square centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_SQUA_METR => "milligram per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLIGRAY => "milligray",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_HOUR => "milligray per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_MINU => "milligray per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_SECO => "milligray per second",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLIHENRY => "millihenry",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_KILO => "millihenry per kiloohm",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_OHM => "millihenry per ohm",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLIHERTZ => "millihertz",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLIJOULE => "millijoule",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLILITRE => "millilitre",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_BAR => "millilitre per bar",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_CUBI_METR => "millilitre per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_DAY => "millilitre per day",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_DAY_BAR => "millilitre per day bar",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_DAY_KELV => "millilitre per day kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_HOUR => "millilitre per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_HOUR_BAR => "millilitre per hour bar",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_HOUR_KELV => "millilitre per hour kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_KELV => "millilitre per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_KILO => "millilitre per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_LITR => "millilitre per litre",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_MINU => "millilitre per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_MINU_BAR => "millilitre per minute bar",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_MINU_KELV => "millilitre per minute kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_SECO => "millilitre per second",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_SECO_BAR => "millilitre per second bar",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_SECO_KELV => "millilitre per second kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_SQUA_CENT_MINU => "millilitre per square centimetre minute",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_SQUA_CENT_SECO => "millilitre per square centimetre second",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLIMETRE => "millimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_BAR => "millimetre per bar",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_DEGR_CELC_METR => "millimetre per degree Celcius metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_HOUR => "millimetre per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_KELV => "millimetre per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_MINU => "millimetre per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_SECO => "millimetre per second",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_SECO_SQUA => "millimetre per second squared",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_YEAR => "millimetre per year",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_SQUA_PER_SECO => "millimetre squared per second",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_TO_THE_FOUR_POWE => "millimetre to the fourth power",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLIMOLE => "millimole",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_GRAM => "millimole per gram",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_KILO => "millimole per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_LITR => "millimole per litre",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLINEWTON => "millinewton",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_METR => "millinewton metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_METR => "millinewton per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLIOHM => "milliohm",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_METR => "milliohm metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_METR => "milliohm per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLION => "million",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_BTU_PER__CUBI_FOOT => "million Btu per 1000 cubic foot",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_BTUI_PER_HOUR => "million Btu(IT) per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_CUBI_METR => "million cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_INTE_UNIT => "million international unit",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLIPASCAL => "millipascal",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_METR => "millipascal per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_SECO => "millipascal second",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_SECO_PER_BAR => "millipascal second per bar",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_SECO_PER_KELV => "millipascal second per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLIRADIAN => "milliradian",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLIROENTGEN => "milliroentgen",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_AEQU_MEN => "milliroentgen aequivalent men",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLISECOND => "millisecond",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLISIEMENS => "millisiemens",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_CENT => "millisiemens per centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLISIEVERT => "millisievert",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_HOUR => "millisievert per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_MINU => "millisievert per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_SECO => "millisievert per second",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLITESLA => "millitesla",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLIVOLT => "millivolt",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_AMPE => "millivolt - ampere",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_KELV => "millivolt per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_METR => "millivolt per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_MINU => "millivolt per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLIWATT => "milliwatt",
            InvoiceSuiteCodelistUnitCodes::REC20_MILL_PER_SQUA_METR => "milliwatt per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MILLIWEBER => "milliweber",
            InvoiceSuiteCodelistUnitCodes::REC20_MINU_UNIT_OF_ANGL => "minute [unit of angle]",
            InvoiceSuiteCodelistUnitCodes::REC20_MINU_UNIT_OF_TIME => "minute [unit of time]",
            InvoiceSuiteCodelistUnitCodes::REC20_MMSCFDAY => "MMSCF/day",
            InvoiceSuiteCodelistUnitCodes::REC20_MODU_WIDT => "module width",
            InvoiceSuiteCodelistUnitCodes::REC20_MOL_PER_CUBI_METR_PASC => "mol per cubic metre pascal",
            InvoiceSuiteCodelistUnitCodes::REC20_MOL_PER_KILO_PASC => "mol per kilogram pascal",
            InvoiceSuiteCodelistUnitCodes::REC20_MOLE => "mole",
            InvoiceSuiteCodelistUnitCodes::REC20_MOLE_PER_CUBI_DECI => "mole per cubic decimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_MOLE_PER_CUBI_METR => "mole per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_MOLE_PER_CUBI_METR_BAR => "mole per cubic metre bar",
            InvoiceSuiteCodelistUnitCodes::REC20_MOLE_PER_CUBI_METR_KELV => "mole per cubic metre kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_MOLE_PER_CUBI_METR_TO_THE_POWE_SUM_OF_STOI_NUMB => "mole per cubiv metre to the power sum of stoichiometric numbers",
            InvoiceSuiteCodelistUnitCodes::REC20_MOLE_PER_HOUR => "mole per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_MOLE_PER_KILO => "mole per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_MOLE_PER_KILO_BAR => "mole per kilogram bar",
            InvoiceSuiteCodelistUnitCodes::REC20_MOLE_PER_KILO_KELV => "mole per kilogram kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_MOLE_PER_LITR => "mole per litre",
            InvoiceSuiteCodelistUnitCodes::REC20_MOLE_PER_LITR_BAR => "mole per litre bar",
            InvoiceSuiteCodelistUnitCodes::REC20_MOLE_PER_LITR_KELV => "mole per litre kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_MOLE_PER_MINU => "mole per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_MOLE_PER_SECO => "mole per second",
            InvoiceSuiteCodelistUnitCodes::REC20_MONE_VALU => "monetary value",
            InvoiceSuiteCodelistUnitCodes::REC20_MONTH => "month",
            InvoiceSuiteCodelistUnitCodes::REC20_MUTU_DEFI => "mutually defined",
            InvoiceSuiteCodelistUnitCodes::REC20_NANOAMPERE => "nanoampere",
            InvoiceSuiteCodelistUnitCodes::REC20_NANOCOULOMB => "nanocoulomb",
            InvoiceSuiteCodelistUnitCodes::REC20_NANOFARAD => "nanofarad",
            InvoiceSuiteCodelistUnitCodes::REC20_NANO_PER_METR => "nanofarad per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_NANO_PER_KILO => "nanogram per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_NANO_PER_HOUR => "nanogray per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_NANO_PER_MINU => "nanogray per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_NANO_PER_SECO => "nanogray per second",
            InvoiceSuiteCodelistUnitCodes::REC20_NANOHENRY => "nanohenry",
            InvoiceSuiteCodelistUnitCodes::REC20_NANO_PER_METR => "nanohenry per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_NANOLITRE => "nanolitre",
            InvoiceSuiteCodelistUnitCodes::REC20_NANOMETRE => "nanometre",
            InvoiceSuiteCodelistUnitCodes::REC20_NANOMOLE => "nanomole",
            InvoiceSuiteCodelistUnitCodes::REC20_NANOOHM => "nanoohm",
            InvoiceSuiteCodelistUnitCodes::REC20_NANO_METR => "nanoohm metre",
            InvoiceSuiteCodelistUnitCodes::REC20_NANOSECOND => "nanosecond",
            InvoiceSuiteCodelistUnitCodes::REC20_NANO_PER_CENT => "nanosiemens per centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_NANO_PER_METR => "nanosiemens per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_NANO_PER_HOUR => "nanosievert per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_NANO_PER_MINU => "nanosievert per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_NANO_PER_SECO => "nanosievert per second",
            InvoiceSuiteCodelistUnitCodes::REC20_NANOTESLA => "nanotesla",
            InvoiceSuiteCodelistUnitCodes::REC20_NANOWATT => "nanowatt",
            InvoiceSuiteCodelistUnitCodes::REC20_NATU_UNIT_OF_INFO => "natural unit of information",
            InvoiceSuiteCodelistUnitCodes::REC20_NATU_UNIT_OF_INFO_PER_SECO => "natural unit of information per second",
            InvoiceSuiteCodelistUnitCodes::REC20_NAUT_MILE => "nautical mile",
            InvoiceSuiteCodelistUnitCodes::REC20_NEPER => "neper",
            InvoiceSuiteCodelistUnitCodes::REC20_NEPE_PER_SECO => "neper per second",
            InvoiceSuiteCodelistUnitCodes::REC20_NEPH_TURB_UNIT => "Nephelometric turbidity unit",
            InvoiceSuiteCodelistUnitCodes::REC20_NET_KILO => "net kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_NET_TON => "net ton",
            InvoiceSuiteCodelistUnitCodes::REC20_NEWTON => "newton",
            InvoiceSuiteCodelistUnitCodes::REC20_NEWT_CENT => "newton centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_NEWT_METR => "newton metre",
            InvoiceSuiteCodelistUnitCodes::REC20_NEWT_METR_PER_AMPE => "newton metre per ampere",
            InvoiceSuiteCodelistUnitCodes::REC20_NEWT_METR_PER_DEGR => "newton metre per degree",
            InvoiceSuiteCodelistUnitCodes::REC20_NEWT_METR_PER_KILO => "newton metre per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_NEWT_METR_PER_METR => "newton metre per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_NEWT_METR_PER_RADI => "newton metre per radian",
            InvoiceSuiteCodelistUnitCodes::REC20_NEWT_METR_PER_SQUA_METR => "newton metre per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_NEWT_METR_SECO => "newton metre second",
            InvoiceSuiteCodelistUnitCodes::REC20_NEWT_METR_SQUA_PER_KILO_SQUA => "newton metre squared per kilogram squared",
            InvoiceSuiteCodelistUnitCodes::REC20_NEWT_METR_WATT_TO_THE_POWE_MINU => "newton metre watt to the power minus 0,5",
            InvoiceSuiteCodelistUnitCodes::REC20_NEWT_PER_AMPE => "newton per ampere",
            InvoiceSuiteCodelistUnitCodes::REC20_NEWT_PER_CENT => "newton per centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_NEWT_PER_METR => "newton per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_NEWT_PER_MILL => "newton per millimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_NEWT_PER_SQUA_CENT => "newton per square centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_NEWT_PER_SQUA_METR => "newton per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_NEWT_PER_SQUA_MILL => "newton per square millimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_NEWT_SECO => "newton second",
            InvoiceSuiteCodelistUnitCodes::REC20_NEWT_SECO_PER_METR => "newton second per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_NEWT_SECO_PER_SQUA_METR => "newton second per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_NEWT_SQUA_METR_PER_AMPE => "newton square metre per ampere",
            InvoiceSuiteCodelistUnitCodes::REC20_NIL => "nil",
            InvoiceSuiteCodelistUnitCodes::REC20_NORM_CUBI_METR => "Normalised cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_NORM_CUBI_METR_PER_DAY => "Normalized cubic metre per day",
            InvoiceSuiteCodelistUnitCodes::REC20_NORM_CUBI_METR_PER_HOUR => "Normalized cubic metre per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_NUMB_OF_ARTI => "number of articles",
            InvoiceSuiteCodelistUnitCodes::REC20_NUMB_OF_CELL => "number of cells",
            InvoiceSuiteCodelistUnitCodes::REC20_NUMB_OF_INTE_UNIT => "number of international units",
            InvoiceSuiteCodelistUnitCodes::REC20_NUMB_OF_JEWE => "number of jewels",
            InvoiceSuiteCodelistUnitCodes::REC20_NUMB_OF_PACK => "number of packs",
            InvoiceSuiteCodelistUnitCodes::REC20_NUMB_OF_PART => "number of parts",
            InvoiceSuiteCodelistUnitCodes::REC20_NUMB_OF_WORD => "number of words",
            InvoiceSuiteCodelistUnitCodes::REC20_OCTAVE => "octave",
            InvoiceSuiteCodelistUnitCodes::REC20_OCTET => "octet",
            InvoiceSuiteCodelistUnitCodes::REC20_OCTE_PER_SECO => "octet per second",
            InvoiceSuiteCodelistUnitCodes::REC20_ODS_GRAM => "ODS Grams",
            InvoiceSuiteCodelistUnitCodes::REC20_ODS_KILO => "ODS Kilograms",
            InvoiceSuiteCodelistUnitCodes::REC20_ODS_MILL => "ODS Milligrams",
            InvoiceSuiteCodelistUnitCodes::REC20_OHM => "ohm",
            InvoiceSuiteCodelistUnitCodes::REC20_OHM_CENT => "ohm centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_OHM_CIRC_PER_FOOT => "ohm circular-mil per foot",
            InvoiceSuiteCodelistUnitCodes::REC20_OHM_KILO => "ohm kilometre",
            InvoiceSuiteCodelistUnitCodes::REC20_OHM_METR => "ohm metre",
            InvoiceSuiteCodelistUnitCodes::REC20_OHM_PER_KILO => "ohm per kilometre",
            InvoiceSuiteCodelistUnitCodes::REC20_OHM_PER_METR => "ohm per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_OHM_PER_MILE_STAT_MILE => "ohm per mile (statute mile)",
            InvoiceSuiteCodelistUnitCodes::REC20_ONE => "one",
            InvoiceSuiteCodelistUnitCodes::REC20_ONE_PER_ONE => "one per one",
            InvoiceSuiteCodelistUnitCodes::REC20_OSCI_PER_MINU => "oscillations per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_OUNC_AVOI => "ounce (avoirdupois)",
            InvoiceSuiteCodelistUnitCodes::REC20_OUNC_AVOI_PER_CUBI_INCH => "ounce (avoirdupois) per cubic inch",
            InvoiceSuiteCodelistUnitCodes::REC20_OUNC_AVOI_PER_CUBI_YARD => "ounce (avoirdupois) per cubic yard",
            InvoiceSuiteCodelistUnitCodes::REC20_OUNC_AVOI_PER_DAY => "ounce (avoirdupois) per day",
            InvoiceSuiteCodelistUnitCodes::REC20_OUNC_AVOI_PER_GALL_UK => "ounce (avoirdupois) per gallon (UK)",
            InvoiceSuiteCodelistUnitCodes::REC20_OUNC_AVOI_PER_GALL_US => "ounce (avoirdupois) per gallon (US)",
            InvoiceSuiteCodelistUnitCodes::REC20_OUNC_AVOI_PER_HOUR => "ounce (avoirdupois) per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_OUNC_AVOI_PER_MINU => "ounce (avoirdupois) per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_OUNC_AVOI_PER_SECO => "ounce (avoirdupois) per second",
            InvoiceSuiteCodelistUnitCodes::REC20_OUNC_AVOI_PER_SQUA_INCH => "ounce (avoirdupois) per square inch",
            InvoiceSuiteCodelistUnitCodes::REC20_OUNC_AVOI => "ounce (avoirdupois)-force",
            InvoiceSuiteCodelistUnitCodes::REC20_OUNC_AVOI_INCH => "ounce (avoirdupois)-force inch",
            InvoiceSuiteCodelistUnitCodes::REC20_OUNC_UK_FLUI_PER_DAY => "ounce (UK fluid) per day",
            InvoiceSuiteCodelistUnitCodes::REC20_OUNC_UK_FLUI_PER_HOUR => "ounce (UK fluid) per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_OUNC_UK_FLUI_PER_MINU => "ounce (UK fluid) per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_OUNC_UK_FLUI_PER_SECO => "ounce (UK fluid) per second",
            InvoiceSuiteCodelistUnitCodes::REC20_OUNC_US_FLUI_PER_DAY => "ounce (US fluid) per day",
            InvoiceSuiteCodelistUnitCodes::REC20_OUNC_US_FLUI_PER_HOUR => "ounce (US fluid) per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_OUNC_US_FLUI_PER_MINU => "ounce (US fluid) per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_OUNC_US_FLUI_PER_SECO => "ounce (US fluid) per second",
            InvoiceSuiteCodelistUnitCodes::REC20_OUNC_FOOT => "ounce foot",
            InvoiceSuiteCodelistUnitCodes::REC20_OUNC_INCH => "ounce inch",
            InvoiceSuiteCodelistUnitCodes::REC20_OUNC_PER_SQUA_FOOT => "ounce per square foot",
            InvoiceSuiteCodelistUnitCodes::REC20_OUNC_PER_SQUA_FOOT_PER_I => "ounce per square foot per 0,01inch",
            InvoiceSuiteCodelistUnitCodes::REC20_OUNC_PER_SQUA_YARD => "ounce per square yard",
            InvoiceSuiteCodelistUnitCodes::REC20_OUTFIT => "outfit",
            InvoiceSuiteCodelistUnitCodes::REC20_OVER_HOUR => "overtime hour",
            InvoiceSuiteCodelistUnitCodes::REC20_OZON_DEPL_EQUI => "ozone depletion equivalent",
            InvoiceSuiteCodelistUnitCodes::REC20_PAD => "pad",
            InvoiceSuiteCodelistUnitCodes::REC20_PAGE => "page",
            InvoiceSuiteCodelistUnitCodes::REC20_PAGE_FACS => "page - facsimile",
            InvoiceSuiteCodelistUnitCodes::REC20_PAGE_HARD => "page - hardcopy",
            InvoiceSuiteCodelistUnitCodes::REC20_PAGE_PER_INCH => "page per inch",
            InvoiceSuiteCodelistUnitCodes::REC20_PAIR => "pair",
            InvoiceSuiteCodelistUnitCodes::REC20_PANEL => "panel",
            InvoiceSuiteCodelistUnitCodes::REC20_PARSEC => "parsec",
            InvoiceSuiteCodelistUnitCodes::REC20_PART_PER_BILL_US => "part per billion (US)",
            InvoiceSuiteCodelistUnitCodes::REC20_PART_PER_HUND_THOU => "part per hundred thousand",
            InvoiceSuiteCodelistUnitCodes::REC20_PART_PER_MILL => "part per million",
            InvoiceSuiteCodelistUnitCodes::REC20_PART_PER_THOU => "part per thousand",
            InvoiceSuiteCodelistUnitCodes::REC20_PASCAL => "pascal",
            InvoiceSuiteCodelistUnitCodes::REC20_PASC_CUBI_METR_PER_SECO => "pascal cubic metre per second",
            InvoiceSuiteCodelistUnitCodes::REC20_PASC_LITR_PER_SECO => "pascal litre per second",
            InvoiceSuiteCodelistUnitCodes::REC20_PASC_PER_BAR => "pascal per bar",
            InvoiceSuiteCodelistUnitCodes::REC20_PASC_PER_KELV => "pascal per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_PASC_PER_METR => "pascal per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_PASC_SECO => "pascal second",
            InvoiceSuiteCodelistUnitCodes::REC20_PASC_SECO_PER_BAR => "pascal second per bar",
            InvoiceSuiteCodelistUnitCodes::REC20_PASC_SECO_PER_CUBI_METR => "pascal second per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_PASC_SECO_PER_KELV => "pascal second per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_PASC_SECO_PER_LITR => "pascal second per litre",
            InvoiceSuiteCodelistUnitCodes::REC20_PASC_SECO_PER_METR => "pascal second per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_PASC_SQUA_METR_PER_KILO => "pascal square metre per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_PASC_SQUA_SECO => "pascal squared second",
            InvoiceSuiteCodelistUnitCodes::REC20_PASC_TO_THE_POWE_SUM_OF_STOI_NUMB => "pascal to the power sum of stoichiometric numbers",
            InvoiceSuiteCodelistUnitCodes::REC20_PEBI_PER_CUBI_METR => "pebibit per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_PEBI_PER_METR => "pebibit per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_PEBI_PER_SQUA_METR => "pebibit per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_PEBIBYTE => "pebibyte",
            InvoiceSuiteCodelistUnitCodes::REC20_PECK => "peck",
            InvoiceSuiteCodelistUnitCodes::REC20_PECK_UK => "peck (UK)",
            InvoiceSuiteCodelistUnitCodes::REC20_PECK_UK_PER_DAY => "peck (UK) per day",
            InvoiceSuiteCodelistUnitCodes::REC20_PECK_UK_PER_HOUR => "peck (UK) per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_PECK_UK_PER_MINU => "peck (UK) per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_PECK_UK_PER_SECO => "peck (UK) per second",
            InvoiceSuiteCodelistUnitCodes::REC20_PECK_US_DRY_PER_DAY => "peck (US dry) per day",
            InvoiceSuiteCodelistUnitCodes::REC20_PECK_US_DRY_PER_HOUR => "peck (US dry) per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_PECK_US_DRY_PER_MINU => "peck (US dry) per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_PECK_US_DRY_PER_SECO => "peck (US dry) per second",
            InvoiceSuiteCodelistUnitCodes::REC20_PEN_CALO => "pen calorie",
            InvoiceSuiteCodelistUnitCodes::REC20_PEN_GRAM_PROT => "pen gram (protein)",
            InvoiceSuiteCodelistUnitCodes::REC20_PENNYWEIGHT => "pennyweight",
            InvoiceSuiteCodelistUnitCodes::REC20_PER_MILL_PER_PSI => "per mille per psi",
            InvoiceSuiteCodelistUnitCodes::REC20_PERCENT => "percent",
            InvoiceSuiteCodelistUnitCodes::REC20_PERC_PER_BAR => "percent per bar",
            InvoiceSuiteCodelistUnitCodes::REC20_PERC_PER_DECA => "percent per decakelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_PERC_PER_DEGR => "percent per degree",
            InvoiceSuiteCodelistUnitCodes::REC20_PERC_PER_DEGR_CELS => "percent per degree Celsius",
            InvoiceSuiteCodelistUnitCodes::REC20_PERC_PER_HECT => "percent per hectobar",
            InvoiceSuiteCodelistUnitCodes::REC20_PERC_PER_HUND => "percent per hundred",
            InvoiceSuiteCodelistUnitCodes::REC20_PERC_PER_INCH => "percent per inch",
            InvoiceSuiteCodelistUnitCodes::REC20_PERC_PER_KELV => "percent per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_PERC_PER_METR => "percent per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_PERC_PER_MILL => "percent per millimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_PERC_PER_MONT => "percent per month",
            InvoiceSuiteCodelistUnitCodes::REC20_PERC_PER_OHM => "percent per ohm",
            InvoiceSuiteCodelistUnitCodes::REC20_PERC_PER_ONE_HUND_THOU => "percent per one hundred thousand",
            InvoiceSuiteCodelistUnitCodes::REC20_PERC_PER_TEN_THOU => "percent per ten thousand",
            InvoiceSuiteCodelistUnitCodes::REC20_PERC_PER_THOU => "percent per thousand",
            InvoiceSuiteCodelistUnitCodes::REC20_PERC_PER_VOLT => "percent per volt",
            InvoiceSuiteCodelistUnitCodes::REC20_PERC_VOLU => "percent volume",
            InvoiceSuiteCodelistUnitCodes::REC20_PERC_WEIG => "percent weight",
            InvoiceSuiteCodelistUnitCodes::REC20_PERM__C => "perm (0 ºC)",
            InvoiceSuiteCodelistUnitCodes::REC20_PERM__C => "perm (23 ºC)",
            InvoiceSuiteCodelistUnitCodes::REC20_PERSON => "person",
            InvoiceSuiteCodelistUnitCodes::REC20_PETABIT => "petabit",
            InvoiceSuiteCodelistUnitCodes::REC20_PETA_PER_SECO => "petabit per second",
            InvoiceSuiteCodelistUnitCodes::REC20_PETABYTE => "petabyte",
            InvoiceSuiteCodelistUnitCodes::REC20_PETAJOULE => "petajoule",
            InvoiceSuiteCodelistUnitCodes::REC20_PFERDESTAERKE => "Pferdestaerke",
            InvoiceSuiteCodelistUnitCodes::REC20_PFUND => "pfund",
            InvoiceSuiteCodelistUnitCodes::REC20_PH_POTE_OF_HYDR => "pH (potential of Hydrogen)",
            InvoiceSuiteCodelistUnitCodes::REC20_PHON => "phon",
            InvoiceSuiteCodelistUnitCodes::REC20_PHOT => "phot",
            InvoiceSuiteCodelistUnitCodes::REC20_PICA => "pica",
            InvoiceSuiteCodelistUnitCodes::REC20_PICOAMPERE => "picoampere",
            InvoiceSuiteCodelistUnitCodes::REC20_PICOCOULOMB => "picocoulomb",
            InvoiceSuiteCodelistUnitCodes::REC20_PICOFARAD => "picofarad",
            InvoiceSuiteCodelistUnitCodes::REC20_PICO_PER_METR => "picofarad per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_PICOHENRY => "picohenry",
            InvoiceSuiteCodelistUnitCodes::REC20_PICOLITRE => "picolitre",
            InvoiceSuiteCodelistUnitCodes::REC20_PICOMETRE => "picometre",
            InvoiceSuiteCodelistUnitCodes::REC20_PICO_PER_KILO => "picopascal per kilometre",
            InvoiceSuiteCodelistUnitCodes::REC20_PICOSECOND => "picosecond",
            InvoiceSuiteCodelistUnitCodes::REC20_PICOSIEMENS => "picosiemens",
            InvoiceSuiteCodelistUnitCodes::REC20_PICO_PER_METR => "picosiemens per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_PICOVOLT => "picovolt",
            InvoiceSuiteCodelistUnitCodes::REC20_PICOWATT => "picowatt",
            InvoiceSuiteCodelistUnitCodes::REC20_PICO_PER_SQUA_METR => "picowatt per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_PIECE => "piece",
            InvoiceSuiteCodelistUnitCodes::REC20_PIEC_DAY => "Piece Day",
            InvoiceSuiteCodelistUnitCodes::REC20_PIEC_MONT => "Piece Month",
            InvoiceSuiteCodelistUnitCodes::REC20_PIEC_WEEK => "Piece Week",
            InvoiceSuiteCodelistUnitCodes::REC20_PING => "ping",
            InvoiceSuiteCodelistUnitCodes::REC20_PINT_UK => "pint (UK)",
            InvoiceSuiteCodelistUnitCodes::REC20_PINT_UK_PER_DAY => "pint (UK) per day",
            InvoiceSuiteCodelistUnitCodes::REC20_PINT_UK_PER_HOUR => "pint (UK) per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_PINT_UK_PER_MINU => "pint (UK) per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_PINT_UK_PER_SECO => "pint (UK) per second",
            InvoiceSuiteCodelistUnitCodes::REC20_PINT_US_LIQU_PER_DAY => "pint (US liquid) per day",
            InvoiceSuiteCodelistUnitCodes::REC20_PINT_US_LIQU_PER_HOUR => "pint (US liquid) per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_PINT_US_LIQU_PER_MINU => "pint (US liquid) per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_PINT_US_LIQU_PER_SECO => "pint (US liquid) per second",
            InvoiceSuiteCodelistUnitCodes::REC20_PIPE_JOIN => "pipeline joint",
            InvoiceSuiteCodelistUnitCodes::REC20_PITCH => "pitch",
            InvoiceSuiteCodelistUnitCodes::REC20_PIXEL => "pixel",
            InvoiceSuiteCodelistUnitCodes::REC20_POISE => "poise",
            InvoiceSuiteCodelistUnitCodes::REC20_POIS_PER_BAR => "poise per bar",
            InvoiceSuiteCodelistUnitCodes::REC20_POIS_PER_KELV => "poise per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_POIS_PER_PASC => "poise per pascal",
            InvoiceSuiteCodelistUnitCodes::REC20_POND => "pond",
            InvoiceSuiteCodelistUnitCodes::REC20_PORTION => "portion",
            InvoiceSuiteCodelistUnitCodes::REC20_POUND => "pound",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_AVOI_PER_CUBI_FOOT_DEGR_FAHR => "pound (avoirdupois) per cubic foot degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_AVOI_PER_CUBI_FOOT_PSI => "pound (avoirdupois) per cubic foot psi",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_AVOI_PER_CUBI_INCH_DEGR_FAHR => "pound (avoirdupois) per cubic inch degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_AVOI_PER_CUBI_INCH_PSI => "pound (avoirdupois) per cubic inch psi",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_AVOI_PER_DAY => "pound (avoirdupois) per day",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_AVOI_PER_DEGR_FAHR => "pound (avoirdupois) per degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_AVOI_PER_GALL_UK => "pound (avoirdupois) per gallon (UK)",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_AVOI_PER_HOUR_DEGR_FAHR => "pound (avoirdupois) per hour degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_AVOI_PER_HOUR_PSI => "pound (avoirdupois) per hour psi",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_AVOI_PER_MINU => "pound (avoirdupois) per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_AVOI_PER_MINU_DEGR_FAHR => "pound (avoirdupois) per minute degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_AVOI_PER_MINU_PSI => "pound (avoirdupois) per minute psi",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_AVOI_PER_PSI => "pound (avoirdupois) per psi",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_AVOI_PER_SECO => "pound (avoirdupois) per second",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_AVOI_PER_SECO_DEGR_FAHR => "pound (avoirdupois) per second degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_AVOI_PER_SECO_PSI => "pound (avoirdupois) per second psi",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_AVOI_SQUA_FOOT => "pound (avoirdupois) square foot",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_FOOT_PER_SECO => "pound foot per second",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_INCH_PER_SECO => "pound inch per second",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_INCH_SQUA => "pound inch squared",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_MOLE => "pound mole",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_MOLE_PER_MINU => "pound mole per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_MOLE_PER_POUN => "pound mole per pound",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_MOLE_PER_SECO => "pound mole per second",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_PER_CUBI_FOOT => "pound per cubic foot",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_PER_CUBI_INCH => "pound per cubic inch",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_PER_CUBI_YARD => "pound per cubic yard",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_PER_FOOT => "pound per foot",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_PER_FOOT_DAY => "pound per foot day",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_PER_FOOT_HOUR => "pound per foot hour",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_PER_FOOT_MINU => "pound per foot minute",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_PER_FOOT_SECO => "pound per foot second",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_PER_GALL_US => "pound per gallon (US)",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_PER_HOUR => "pound per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_PER_INCH_OF_LENG => "pound per inch of length",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_PER_POUN => "pound per pound",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_PER_REAM => "pound per ream",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_PER_SQUA_FOOT => "pound per square foot",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_PER_SQUA_INCH_ABSO => "pound per square inch absolute",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_PER_SQUA_YARD => "pound per square yard",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_PER_YARD => "pound per yard",
            InvoiceSuiteCodelistUnitCodes::REC20_POUNDFORCE => "pound-force",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_FOOT => "pound-force foot",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_FOOT_PER_AMPE => "pound-force foot per ampere",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_FOOT_PER_INCH => "pound-force foot per inch",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_FOOT_PER_POUN => "pound-force foot per pound",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_INCH => "pound-force inch",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_INCH_PER_INCH => "pound-force inch per inch",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_PER_FOOT => "pound-force per foot",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_PER_INCH => "pound-force per inch",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_PER_SQUA_FOOT => "pound-force per square foot",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_PER_SQUA_INCH => "pound-force per square inch",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_PER_SQUA_INCH_DEGR_FAHR => "pound-force per square inch degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_PER_YARD => "pound-force per yard",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_SECO_PER_SQUA_FOOT => "pound-force second per square foot",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_SECO_PER_SQUA_INCH => "pound-force second per square inch",
            InvoiceSuiteCodelistUnitCodes::REC20_POUNDAL => "poundal",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_FOOT => "poundal foot",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_INCH => "poundal inch",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_PER_INCH => "poundal per inch",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_PER_SQUA_FOOT => "poundal per square foot",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_PER_SQUA_INCH => "poundal per square inch",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_SECO_PER_SQUA_FOOT => "poundal second per square foot",
            InvoiceSuiteCodelistUnitCodes::REC20_POUN_SECO_PER_SQUA_INCH => "poundal second per square inch",
            InvoiceSuiteCodelistUnitCodes::REC20_PRIN_POIN => "print point",
            InvoiceSuiteCodelistUnitCodes::REC20_PROO_GALL => "proof gallon",
            InvoiceSuiteCodelistUnitCodes::REC20_PROO_LITR => "proof litre",
            InvoiceSuiteCodelistUnitCodes::REC20_PSI_CUBI_INCH_PER_SECO => "psi cubic inch per second",
            InvoiceSuiteCodelistUnitCodes::REC20_PSI_CUBI_METR_PER_SECO => "psi cubic metre per second",
            InvoiceSuiteCodelistUnitCodes::REC20_PSI_CUBI_YARD_PER_SECO => "psi cubic yard per second",
            InvoiceSuiteCodelistUnitCodes::REC20_PSI_LITR_PER_SECO => "psi litre per second",
            InvoiceSuiteCodelistUnitCodes::REC20_PSI_PER_INCH => "psi per inch",
            InvoiceSuiteCodelistUnitCodes::REC20_PSI_PER_PSI => "psi per psi",
            InvoiceSuiteCodelistUnitCodes::REC20_QUAD__BTUI => "quad (1015 BtuIT)",
            InvoiceSuiteCodelistUnitCodes::REC20_QUAR_UK_LIQU_PER_DAY => "quart (UK liquid) per day",
            InvoiceSuiteCodelistUnitCodes::REC20_QUAR_UK_LIQU_PER_HOUR => "quart (UK liquid) per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_QUAR_UK_LIQU_PER_MINU => "quart (UK liquid) per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_QUAR_UK_LIQU_PER_SECO => "quart (UK liquid) per second",
            InvoiceSuiteCodelistUnitCodes::REC20_QUAR_UK => "quart (UK)",
            InvoiceSuiteCodelistUnitCodes::REC20_QUAR_US_LIQU_PER_DAY => "quart (US liquid) per day",
            InvoiceSuiteCodelistUnitCodes::REC20_QUAR_US_LIQU_PER_HOUR => "quart (US liquid) per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_QUAR_US_LIQU_PER_MINU => "quart (US liquid) per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_QUAR_US_LIQU_PER_SECO => "quart (US liquid) per second",
            InvoiceSuiteCodelistUnitCodes::REC20_QUAR_OF_A_YEAR => "quarter (of a year)",
            InvoiceSuiteCodelistUnitCodes::REC20_QUAR_UK => "quarter (UK)",
            InvoiceSuiteCodelistUnitCodes::REC20_QUIRE => "quire",
            InvoiceSuiteCodelistUnitCodes::REC20_RACK_UNIT => "rack unit",
            InvoiceSuiteCodelistUnitCodes::REC20_RAD => "rad",
            InvoiceSuiteCodelistUnitCodes::REC20_RADIAN => "radian",
            InvoiceSuiteCodelistUnitCodes::REC20_RADI_PER_METR => "radian per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_RADI_PER_SECO => "radian per second",
            InvoiceSuiteCodelistUnitCodes::REC20_RADI_PER_SECO_SQUA => "radian per second squared",
            InvoiceSuiteCodelistUnitCodes::REC20_RADI_SQUA_METR_PER_KILO => "radian square metre per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_RADI_SQUA_METR_PER_MOLE => "radian square metre per mole",
            InvoiceSuiteCodelistUnitCodes::REC20_RATE => "rate",
            InvoiceSuiteCodelistUnitCodes::REC20_RATION => "ration",
            InvoiceSuiteCodelistUnitCodes::REC20_REAM => "ream",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_ANGS => "reciprocal angstrom",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_BAR => "reciprocal bar",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_CENT => "reciprocal centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_CUBI_CENT => "reciprocal cubic centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_CUBI_FOOT => "reciprocal cubic foot",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_CUBI_INCH => "reciprocal cubic inch",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_CUBI_METR => "reciprocal cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_CUBI_METR_PER_SECO => "reciprocal cubic metre per second",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_CUBI_MILL => "reciprocal cubic millimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_CUBI_YARD => "reciprocal cubic yard",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_DAY => "reciprocal day",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_DEGR_FAHR => "reciprocal degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_ELEC_VOLT_PER_CUBI_METR => "reciprocal electron volt per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_HENR => "reciprocal henry",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_HOUR => "reciprocal hour",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_INCH => "reciprocal inch",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_JOUL => "reciprocal joule",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_JOUL_PER_CUBI_METR => "reciprocal joule per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_KELV_OR_KELV_TO_THE_POWE_MINU_ONE => "reciprocal kelvin or kelvin to the power minus one",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_KILO_AMPE_RECI_HOUR => "reciprocal kilovolt - ampere reciprocal hour",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_LITR => "reciprocal litre",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_MEGA_OR_MEGA_TO_THE_POWE_MINU_ONE => "reciprocal megakelvin or megakelvin to the power minus one",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_METR => "reciprocal metre",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_METR_SQUA_RECI_SECO => "reciprocal metre squared reciprocal second",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_MINU => "reciprocal minute",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_MOLE => "reciprocal mole",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_MONT => "reciprocal month",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_PASC_OR_PASC_TO_THE_POWE_MINU_ONE => "reciprocal pascal or pascal to the power minus one",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_PSI => "reciprocal psi",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_RADI => "reciprocal radian",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_SECO => "reciprocal second",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_SECO_PER_METR_SQUA => "reciprocal second per metre squared",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_SECO_PER_STER => "reciprocal second per steradian",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_SECO_PER_STER_METR_SQUA => "reciprocal second per steradian metre squared",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_SQUA_INCH => "reciprocal square inch",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_SQUA_METR => "reciprocal square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_VOLT => "reciprocal volt",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_VOLT_AMPE_RECI_SECO => "reciprocal volt - ampere reciprocal second",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_WEEK => "reciprocal week",
            InvoiceSuiteCodelistUnitCodes::REC20_RECI_YEAR => "reciprocal year",
            InvoiceSuiteCodelistUnitCodes::REC20_REM => "rem",
            InvoiceSuiteCodelistUnitCodes::REC20_REM_PER_SECO => "rem per second",
            InvoiceSuiteCodelistUnitCodes::REC20_REVE_TON_MILE => "revenue ton mile",
            InvoiceSuiteCodelistUnitCodes::REC20_REVOLUTION => "revolution",
            InvoiceSuiteCodelistUnitCodes::REC20_REVO_PER_MINU => "revolution per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_REVO_PER_MINU => "revolutions per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_REVO_PER_SECO => "revolutions per second",
            InvoiceSuiteCodelistUnitCodes::REC20_RHE => "rhe",
            InvoiceSuiteCodelistUnitCodes::REC20_ROD_UNIT_OF_DIST => "rod [unit of distance]",
            InvoiceSuiteCodelistUnitCodes::REC20_ROENTGEN => "roentgen",
            InvoiceSuiteCodelistUnitCodes::REC20_ROEN_PER_SECO => "roentgen per second",
            InvoiceSuiteCodelistUnitCodes::REC20_ROOM => "room",
            InvoiceSuiteCodelistUnitCodes::REC20_ROUND => "round",
            InvoiceSuiteCodelistUnitCodes::REC20_RUN_FOOT => "run foot",
            InvoiceSuiteCodelistUnitCodes::REC20_RUNN_OR_OPER_HOUR => "running or operating hour",
            InvoiceSuiteCodelistUnitCodes::REC20_SCORE => "score",
            InvoiceSuiteCodelistUnitCodes::REC20_SCRUPLE => "scruple",
            InvoiceSuiteCodelistUnitCodes::REC20_SECO_UNIT_OF_ANGL => "second [unit of angle]",
            InvoiceSuiteCodelistUnitCodes::REC20_SECO_UNIT_OF_TIME => "second [unit of time]",
            InvoiceSuiteCodelistUnitCodes::REC20_SECO_PER_CUBI_METR => "second per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_SECO_PER_CUBI_METR_RADI => "second per cubic metre radian",
            InvoiceSuiteCodelistUnitCodes::REC20_SECO_PER_KILO => "second per kilogramm",
            InvoiceSuiteCodelistUnitCodes::REC20_SECO_PER_RADI_CUBI_METR => "second per radian cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_SEGMENT => "segment",
            InvoiceSuiteCodelistUnitCodes::REC20_SERV_UNIT => "service unit",
            InvoiceSuiteCodelistUnitCodes::REC20_SET => "set",
            InvoiceSuiteCodelistUnitCodes::REC20_SHAKE => "shake",
            InvoiceSuiteCodelistUnitCodes::REC20_SHANNON => "shannon",
            InvoiceSuiteCodelistUnitCodes::REC20_SHAN_PER_SECO => "shannon per second",
            InvoiceSuiteCodelistUnitCodes::REC20_SHARES => "shares",
            InvoiceSuiteCodelistUnitCodes::REC20_SHIPMENT => "shipment",
            InvoiceSuiteCodelistUnitCodes::REC20_SHOT => "shot",
            InvoiceSuiteCodelistUnitCodes::REC20_SIDE_YEAR => "sidereal year",
            InvoiceSuiteCodelistUnitCodes::REC20_SIEMENS => "siemens",
            InvoiceSuiteCodelistUnitCodes::REC20_SIEM_PER_CENT => "siemens per centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_SIEM_PER_METR => "siemens per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_SIEM_SQUA_METR_PER_MOLE => "siemens square metre per mole",
            InvoiceSuiteCodelistUnitCodes::REC20_SIEVERT => "sievert",
            InvoiceSuiteCodelistUnitCodes::REC20_SIEV_PER_HOUR => "sievert per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_SIEV_PER_MINU => "sievert per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_SIEV_PER_SECO => "sievert per second",
            InvoiceSuiteCodelistUnitCodes::REC20_SITAS => "sitas",
            InvoiceSuiteCodelistUnitCodes::REC20_SKEIN => "skein",
            InvoiceSuiteCodelistUnitCodes::REC20_SLUG => "slug",
            InvoiceSuiteCodelistUnitCodes::REC20_SLUG_PER_CUBI_FOOT => "slug per cubic foot",
            InvoiceSuiteCodelistUnitCodes::REC20_SLUG_PER_DAY => "slug per day",
            InvoiceSuiteCodelistUnitCodes::REC20_SLUG_PER_FOOT_SECO => "slug per foot second",
            InvoiceSuiteCodelistUnitCodes::REC20_SLUG_PER_HOUR => "slug per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_SLUG_PER_MINU => "slug per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_SLUG_PER_SECO => "slug per second",
            InvoiceSuiteCodelistUnitCodes::REC20_SONE => "sone",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUARE => "square",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_CENT => "square centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_CENT_PER_ERG => "square centimetre per erg",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_CENT_PER_GRAM => "square centimetre per gram",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_CENT_PER_SECO => "square centimetre per second",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_CENT_PER_STER_ERG => "square centimetre per steradian erg",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_DECA => "square decametre",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_DECI => "square decimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_FOOT => "square foot",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_FOOT_PER_HOUR => "square foot per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_FOOT_PER_SECO => "square foot per second",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_HECT => "square hectometre",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_INCH => "square inch",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_INCH_PER_SECO => "square inch per second",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_KILO => "square kilometre",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_METR => "square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_METR_DAY => "Square Metre Day",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_METR_HOUR_DEGR_CELS_PER_KILO_INTE_TABL => "square metre hour degree Celsius per kilocalorie (international table)",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_METR_KELV_PER_WATT => "square metre kelvin per watt",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_METR_MONT => "Square Metre Month",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_METR_PER_CUBI_METR => "square metre per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_METR_PER_JOUL => "square metre per joule",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_METR_PER_KILO => "square metre per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_METR_PER_LITR => "square metre per litre",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_METR_PER_MOLE => "square metre per mole",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_METR_PER_NEWT => "square metre per newton",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_METR_PER_SECO => "square metre per second",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_METR_PER_SECO_BAR => "square metre per second bar",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_METR_PER_SECO_KELV => "square metre per second kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_METR_PER_SECO_PASC => "square metre per second pascal",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_METR_PER_STER => "square metre per steradian",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_METR_PER_STER_JOUL => "square metre per steradian joule",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_METR_PER_VOLT_SECO => "square metre per volt second",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_METR_WEEK => "Square Metre Week",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_MICR_SQUA_MICR => "square micrometre (square micron)",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_MILE_BASE_ON_US_SURV_FOOT => "square mile (based on U.S. survey foot)",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_MILE_STAT_MILE => "square mile (statute mile)",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_MILL => "square millimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_YARD => "square yard",
            InvoiceSuiteCodelistUnitCodes::REC20_SQUA_ROOF => "square, roofing",
            InvoiceSuiteCodelistUnitCodes::REC20_STANDARD => "standard",
            InvoiceSuiteCodelistUnitCodes::REC20_STAN_ACCE_OF_FREE_FALL => "standard acceleration of free fall",
            InvoiceSuiteCodelistUnitCodes::REC20_STAN_ATMO => "standard atmosphere",
            InvoiceSuiteCodelistUnitCodes::REC20_STAN_ATMO_PER_METR => "standard atmosphere per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_STAN_CUBI_METR => "Standard cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_STAN_CUBI_METR_PER_DAY => "Standard cubic metre per day",
            InvoiceSuiteCodelistUnitCodes::REC20_STAN_CUBI_METR_PER_HOUR => "Standard cubic metre per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_STAN_KILO => "standard kilolitre",
            InvoiceSuiteCodelistUnitCodes::REC20_STAN_LITR => "standard litre",
            InvoiceSuiteCodelistUnitCodes::REC20_STERADIAN => "steradian",
            InvoiceSuiteCodelistUnitCodes::REC20_STERE => "stere",
            InvoiceSuiteCodelistUnitCodes::REC20_STICK => "stick",
            InvoiceSuiteCodelistUnitCodes::REC20_STIC_CIGA => "stick, cigarette",
            InvoiceSuiteCodelistUnitCodes::REC20_STIC_MILI => "stick, military",
            InvoiceSuiteCodelistUnitCodes::REC20_STILB => "stilb",
            InvoiceSuiteCodelistUnitCodes::REC20_STOKES => "stokes",
            InvoiceSuiteCodelistUnitCodes::REC20_STOK_PER_BAR => "stokes per bar",
            InvoiceSuiteCodelistUnitCodes::REC20_STOK_PER_KELV => "stokes per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_STOK_PER_PASC => "stokes per pascal",
            InvoiceSuiteCodelistUnitCodes::REC20_STON_UK => "stone (UK)",
            InvoiceSuiteCodelistUnitCodes::REC20_STRAND => "strand",
            InvoiceSuiteCodelistUnitCodes::REC20_STRAW => "straw",
            InvoiceSuiteCodelistUnitCodes::REC20_STRIP => "strip",
            InvoiceSuiteCodelistUnitCodes::REC20_SYRINGE => "syringe",
            InvoiceSuiteCodelistUnitCodes::REC20_TABL_US => "tablespoon (US)",
            InvoiceSuiteCodelistUnitCodes::REC20_TABLET => "tablet",
            InvoiceSuiteCodelistUnitCodes::REC20_TEAS_US => "teaspoon (US)",
            InvoiceSuiteCodelistUnitCodes::REC20_TEBI_PER_CUBI_METR => "tebibit per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_TEBI_PER_METR => "tebibit per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_TEBI_PER_SQUA_METR => "tebibit per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_TEBIBYTE => "tebibyte",
            InvoiceSuiteCodelistUnitCodes::REC20_TECH_ATMO_PER_METR => "technical atmosphere per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_TEET_PER_INCH => "teeth per inch",
            InvoiceSuiteCodelistUnitCodes::REC20_TELE_LINE_IN_SERV => "telecommunication line in service",
            InvoiceSuiteCodelistUnitCodes::REC20_TELE_LINE_IN_SERV_AVER => "telecommunication line in service average",
            InvoiceSuiteCodelistUnitCodes::REC20_TELE_PORT => "telecommunication port",
            InvoiceSuiteCodelistUnitCodes::REC20_TEN_DAY => "ten day",
            InvoiceSuiteCodelistUnitCodes::REC20_TEN_PACK => "ten pack",
            InvoiceSuiteCodelistUnitCodes::REC20_TEN_PAIR => "ten pair",
            InvoiceSuiteCodelistUnitCodes::REC20_TEN_SET => "ten set",
            InvoiceSuiteCodelistUnitCodes::REC20_TEN_THOU_STIC => "ten thousand sticks",
            InvoiceSuiteCodelistUnitCodes::REC20_TERABIT => "terabit",
            InvoiceSuiteCodelistUnitCodes::REC20_TERA_PER_SECO => "terabit per second",
            InvoiceSuiteCodelistUnitCodes::REC20_TERABYTE => "terabyte",
            InvoiceSuiteCodelistUnitCodes::REC20_TERAHERTZ => "terahertz",
            InvoiceSuiteCodelistUnitCodes::REC20_TERAJOULE => "terajoule",
            InvoiceSuiteCodelistUnitCodes::REC20_TERAOHM => "teraohm",
            InvoiceSuiteCodelistUnitCodes::REC20_TERAWATT => "terawatt",
            InvoiceSuiteCodelistUnitCodes::REC20_TERA_HOUR => "terawatt hour",
            InvoiceSuiteCodelistUnitCodes::REC20_TESLA => "tesla",
            InvoiceSuiteCodelistUnitCodes::REC20_TEST => "test",
            InvoiceSuiteCodelistUnitCodes::REC20_TEU => "TEU",
            InvoiceSuiteCodelistUnitCodes::REC20_TEX => "tex",
            InvoiceSuiteCodelistUnitCodes::REC20_THEO_POUN => "theoretical pound",
            InvoiceSuiteCodelistUnitCodes::REC20_THEO_TON => "theoretical ton",
            InvoiceSuiteCodelistUnitCodes::REC20_THER_EC => "therm (EC)",
            InvoiceSuiteCodelistUnitCodes::REC20_THER_US => "therm (U.S.)",
            InvoiceSuiteCodelistUnitCodes::REC20_THOUSAND => "thousand",
            InvoiceSuiteCodelistUnitCodes::REC20_THOU_BOAR_FOOT => "thousand board foot",
            InvoiceSuiteCodelistUnitCodes::REC20_THOU_CUBI_FOOT => "thousand cubic foot",
            InvoiceSuiteCodelistUnitCodes::REC20_THOU_CUBI_METR => "thousand cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_THOU_CUBI_METR_PER_DAY => "thousand cubic metre per day",
            InvoiceSuiteCodelistUnitCodes::REC20_THOU_PIEC => "thousand piece",
            InvoiceSuiteCodelistUnitCodes::REC20_THOU_SQUA_INCH => "thousand square inch",
            InvoiceSuiteCodelistUnitCodes::REC20_THOU_STAN_BRIC_EQUI => "thousand standard brick equivalent",
            InvoiceSuiteCodelistUnitCodes::REC20_TON_UK_LONG_PER_CUBI_YARD => "ton (UK long) per cubic yard",
            InvoiceSuiteCodelistUnitCodes::REC20_TON_UK_SHIP => "ton (UK shipping)",
            InvoiceSuiteCodelistUnitCodes::REC20_TON_UK_OR_LONG_TON_US => "ton (UK) or long ton (US)",
            InvoiceSuiteCodelistUnitCodes::REC20_TON_US_SHIP => "ton (US shipping)",
            InvoiceSuiteCodelistUnitCodes::REC20_TON_US_SHOR_PER_CUBI_YARD => "ton (US short) per cubic yard",
            InvoiceSuiteCodelistUnitCodes::REC20_TON_US_OR_SHOR_TON_UKUS => "ton (US) or short ton (UK/US)",
            InvoiceSuiteCodelistUnitCodes::REC20_TON_US_PER_HOUR => "ton (US) per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_TON_LONG_PER_DAY => "ton long per day",
            InvoiceSuiteCodelistUnitCodes::REC20_TON_SHOR_PER_DAY => "ton short per day",
            InvoiceSuiteCodelistUnitCodes::REC20_TON_SHOR_PER_DEGR_FAHR => "ton short per degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_TON_SHOR_PER_HOUR_DEGR_FAHR => "ton short per hour degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_TON_SHOR_PER_HOUR_PSI => "ton short per hour psi",
            InvoiceSuiteCodelistUnitCodes::REC20_TON_SHOR_PER_PSI => "ton short per psi",
            InvoiceSuiteCodelistUnitCodes::REC20_TON_ASSA => "ton, assay",
            InvoiceSuiteCodelistUnitCodes::REC20_TON_REGI => "ton, register",
            InvoiceSuiteCodelistUnitCodes::REC20_TONF_US_SHOR => "ton-force (US short)",
            InvoiceSuiteCodelistUnitCodes::REC20_TONN_METR_TON => "tonne (metric ton)",
            InvoiceSuiteCodelistUnitCodes::REC20_TONN_KILO => "tonne kilometre",
            InvoiceSuiteCodelistUnitCodes::REC20_TONN_PER_BAR => "tonne per bar",
            InvoiceSuiteCodelistUnitCodes::REC20_TONN_PER_CUBI_METR => "tonne per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_TONN_PER_CUBI_METR_BAR => "tonne per cubic metre bar",
            InvoiceSuiteCodelistUnitCodes::REC20_TONN_PER_CUBI_METR_KELV => "tonne per cubic metre kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_TONN_PER_DAY => "tonne per day",
            InvoiceSuiteCodelistUnitCodes::REC20_TONN_PER_DAY_BAR => "tonne per day bar",
            InvoiceSuiteCodelistUnitCodes::REC20_TONN_PER_DAY_KELV => "tonne per day kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_TONN_PER_HOUR => "tonne per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_TONN_PER_HOUR_BAR => "tonne per hour bar",
            InvoiceSuiteCodelistUnitCodes::REC20_TONN_PER_HOUR_KELV => "tonne per hour kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_TONN_PER_KELV => "tonne per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_TONN_PER_MINU => "tonne per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_TONN_PER_MINU_BAR => "tonne per minute bar",
            InvoiceSuiteCodelistUnitCodes::REC20_TONN_PER_MINU_KELV => "tonne per minute kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_TONN_PER_MONT => "tonne per month",
            InvoiceSuiteCodelistUnitCodes::REC20_TONN_PER_SECO => "tonne per second",
            InvoiceSuiteCodelistUnitCodes::REC20_TONN_PER_SECO_BAR => "tonne per second bar",
            InvoiceSuiteCodelistUnitCodes::REC20_TONN_PER_SECO_KELV => "tonne per second kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_TONN_PER_YEAR => "tonne per year",
            InvoiceSuiteCodelistUnitCodes::REC20_TORR_PER_METR => "torr per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_TOTA_ACID_NUMB => "total acid number",
            InvoiceSuiteCodelistUnitCodes::REC20_TREATMENT => "treatment",
            InvoiceSuiteCodelistUnitCodes::REC20_TRIL_EUR => "trillion (EUR)",
            InvoiceSuiteCodelistUnitCodes::REC20_TRIP => "trip",
            InvoiceSuiteCodelistUnitCodes::REC20_TROP_YEAR => "tropical year",
            InvoiceSuiteCodelistUnitCodes::REC20_TROY_OUNC_OR_APOT_OUNC => "troy ounce or apothecary ounce",
            InvoiceSuiteCodelistUnitCodes::REC20_TROY_POUN_US => "troy pound (US)",
            InvoiceSuiteCodelistUnitCodes::REC20_TWEN_FOOT_CONT => "twenty foot container",
            InvoiceSuiteCodelistUnitCodes::REC20_TYRE => "tyre",
            InvoiceSuiteCodelistUnitCodes::REC20_UNIF_ATOM_MASS_UNIT => "unified atomic mass unit",
            InvoiceSuiteCodelistUnitCodes::REC20_UNIT_POLE => "unit pole",
            InvoiceSuiteCodelistUnitCodes::REC20_US_GALL_PER_MINU => "US gallon per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_USE => "use",
            InvoiceSuiteCodelistUnitCodes::REC20_VAR => "var",
            InvoiceSuiteCodelistUnitCodes::REC20_VOLT => "volt",
            InvoiceSuiteCodelistUnitCodes::REC20_VOLT_AMPE => "volt - ampere",
            InvoiceSuiteCodelistUnitCodes::REC20_VOLT_AMPE_PER_KILO => "volt - ampere per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_VOLT_AC => "volt AC",
            InvoiceSuiteCodelistUnitCodes::REC20_VOLT_DC => "volt DC",
            InvoiceSuiteCodelistUnitCodes::REC20_VOLT_PER_BAR => "volt per bar",
            InvoiceSuiteCodelistUnitCodes::REC20_VOLT_PER_CENT => "volt per centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_VOLT_PER_INCH => "volt per inch",
            InvoiceSuiteCodelistUnitCodes::REC20_VOLT_PER_KELV => "volt per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_VOLT_PER_LITR_MINU => "volt per litre minute",
            InvoiceSuiteCodelistUnitCodes::REC20_VOLT_PER_METR => "volt per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_VOLT_PER_MICR => "volt per microsecond",
            InvoiceSuiteCodelistUnitCodes::REC20_VOLT_PER_MILL => "volt per millimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_VOLT_PER_PASC => "volt per pascal",
            InvoiceSuiteCodelistUnitCodes::REC20_VOLT_PER_SECO => "volt per second",
            InvoiceSuiteCodelistUnitCodes::REC20_VOLT_SECO_PER_METR => "volt second per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_VOLT_SQUA_INCH_PER_POUN => "volt square inch per pound-force",
            InvoiceSuiteCodelistUnitCodes::REC20_VOLT_SQUA_PER_KELV_SQUA => "volt squared per kelvin squared",
            InvoiceSuiteCodelistUnitCodes::REC20_WATE_HORS_POWE => "water horse power",
            InvoiceSuiteCodelistUnitCodes::REC20_WATT => "watt",
            InvoiceSuiteCodelistUnitCodes::REC20_WATT_HOUR => "watt hour",
            InvoiceSuiteCodelistUnitCodes::REC20_WATT_PER_CUBI_METR => "watt per cubic metre",
            InvoiceSuiteCodelistUnitCodes::REC20_WATT_PER_KELV => "watt per kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_WATT_PER_KILO => "watt per kilogram",
            InvoiceSuiteCodelistUnitCodes::REC20_WATT_PER_METR => "watt per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_WATT_PER_METR_DEGR_CELS => "watt per metre degree Celsius",
            InvoiceSuiteCodelistUnitCodes::REC20_WATT_PER_METR_KELV => "watt per metre kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_WATT_PER_SQUA_CENT => "watt per square centimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_WATT_PER_SQUA_INCH => "watt per square inch",
            InvoiceSuiteCodelistUnitCodes::REC20_WATT_PER_SQUA_METR => "watt per square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_WATT_PER_SQUA_METR_KELV => "watt per square metre kelvin",
            InvoiceSuiteCodelistUnitCodes::REC20_WATT_PER_SQUA_METR_KELV_TO_THE_FOUR_POWE => "watt per square metre kelvin to the fourth power",
            InvoiceSuiteCodelistUnitCodes::REC20_WATT_PER_STER => "watt per steradian",
            InvoiceSuiteCodelistUnitCodes::REC20_WATT_PER_STER_SQUA_METR => "watt per steradian square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_WATT_SECO => "watt second",
            InvoiceSuiteCodelistUnitCodes::REC20_WATT_SQUA_METR => "watt square metre",
            InvoiceSuiteCodelistUnitCodes::REC20_WEBER => "weber",
            InvoiceSuiteCodelistUnitCodes::REC20_WEBE_METR => "weber metre",
            InvoiceSuiteCodelistUnitCodes::REC20_WEBE_PER_METR => "weber per metre",
            InvoiceSuiteCodelistUnitCodes::REC20_WEBE_PER_MILL => "weber per millimetre",
            InvoiceSuiteCodelistUnitCodes::REC20_WEBE_TO_THE_POWE_MINU_ONE => "weber to the power minus one",
            InvoiceSuiteCodelistUnitCodes::REC20_WEEK => "week",
            InvoiceSuiteCodelistUnitCodes::REC20_WELL => "well",
            InvoiceSuiteCodelistUnitCodes::REC20_WET_KILO => "wet kilo",
            InvoiceSuiteCodelistUnitCodes::REC20_WET_POUN => "wet pound",
            InvoiceSuiteCodelistUnitCodes::REC20_WET_TON => "wet ton",
            InvoiceSuiteCodelistUnitCodes::REC20_WINE_GALL => "wine gallon",
            InvoiceSuiteCodelistUnitCodes::REC20_WORK_DAY => "working day",
            InvoiceSuiteCodelistUnitCodes::REC20_WORK_MONT => "working month",
            InvoiceSuiteCodelistUnitCodes::REC20_YARD => "yard",
            InvoiceSuiteCodelistUnitCodes::REC20_YARD_PER_DEGR_FAHR => "yard per degree Fahrenheit",
            InvoiceSuiteCodelistUnitCodes::REC20_YARD_PER_HOUR => "yard per hour",
            InvoiceSuiteCodelistUnitCodes::REC20_YARD_PER_MINU => "yard per minute",
            InvoiceSuiteCodelistUnitCodes::REC20_YARD_PER_PSI => "yard per psi",
            InvoiceSuiteCodelistUnitCodes::REC20_YARD_PER_SECO => "yard per second",
            InvoiceSuiteCodelistUnitCodes::REC20_YARD_PER_SECO_SQUA => "yard per second squared",
            InvoiceSuiteCodelistUnitCodes::REC20_YEAR => "year",
            InvoiceSuiteCodelistUnitCodes::REC20_ZONE => "zone",
            InvoiceSuiteCodelistUnitCodes::REC21_EURO_PALL => "Standard pallet with dimensions 60 X 40 cm.",
            InvoiceSuiteCodelistUnitCodes::REC21_EURO_PALL => "Standard pallet with dimensions 40 X 30 cm.",
            InvoiceSuiteCodelistUnitCodes::REC21_A_WHEE_PALL_WITH_RAIS_RIM__X__X_35 => "A wheeled pallet with raised rim for the storing and transporting of loads. Dimensions: 81 x 67 x 135 cm (length x width x height).",
            InvoiceSuiteCodelistUnitCodes::REC21_A_WHEE_PALL_WITH_RAIS_RIM__X__X_35 => "A wheeled pallet with raised rim for the storing and transporting of loads. Dimensions: 81 x 72 x 135 cm (length x width x height).",
            InvoiceSuiteCodelistUnitCodes::REC21_AEROSOL => "Aerosol",
            InvoiceSuiteCodelistUnitCodes::REC21_AMPO_NONP => "Ampoule, non-protected",
            InvoiceSuiteCodelistUnitCodes::REC21_AMPO_PROT => "Ampoule, protected",
            InvoiceSuiteCodelistUnitCodes::REC21_ATOMIZER => "Atomizer",
            InvoiceSuiteCodelistUnitCodes::REC21_BAG => "A receptacle made of flexible material with an open or closed top.",
            InvoiceSuiteCodelistUnitCodes::REC21_BAG_FLEX_CONT => "Bag, flexible container",
            InvoiceSuiteCodelistUnitCodes::REC21_BAG_GUNN => "A sack made of gunny or burlap, used for transporting coarse commodities, such as grains, potatoes, and other agricultural products.",
            InvoiceSuiteCodelistUnitCodes::REC21_BAG_JUMB => "A flexible containment bag, widely used for storage, transportation and handling of powder, flake or granular materials. Typically constructed from woven polypropylene (PP) fabric in the form of cubic bags.",
            InvoiceSuiteCodelistUnitCodes::REC21_BAG_LARG => "Bag, large",
            InvoiceSuiteCodelistUnitCodes::REC21_BAG_MULT => "Bag, multiply",
            InvoiceSuiteCodelistUnitCodes::REC21_BAG_PAPE => "Bag, paper",
            InvoiceSuiteCodelistUnitCodes::REC21_BAG_PAPE_MULT => "Bag, paper, multi-wall",
            InvoiceSuiteCodelistUnitCodes::REC21_BAG_PAPE_MULT_WATE_RESI => "Bag, paper, multi-wall, water resistant",
            InvoiceSuiteCodelistUnitCodes::REC21_BAG_PLAS => "Bag, plastic",
            InvoiceSuiteCodelistUnitCodes::REC21_BAG_PLAS_FILM => "Bag, plastics film",
            InvoiceSuiteCodelistUnitCodes::REC21_BAG_POLY => "A type of plastic bag, typically used to wrap promotional pieces, publications, product samples, and/or catalogues.",
            InvoiceSuiteCodelistUnitCodes::REC21_BAG_SUPE_BULK => "A cloth plastic or paper based bag having the dimensions of the pallet on which it is constructed.",
            InvoiceSuiteCodelistUnitCodes::REC21_BAG_TEXT => "Bag, textile",
            InvoiceSuiteCodelistUnitCodes::REC21_BAG_TEXT_SIFT_PROO => "Bag, textile, sift proof",
            InvoiceSuiteCodelistUnitCodes::REC21_BAG_TEXT_WATE_RESI => "Bag, textile, water resistant",
            InvoiceSuiteCodelistUnitCodes::REC21_BAG_TEXT_WITH_INNE_COAT => "Bag, textile, without inner coat/liner",
            InvoiceSuiteCodelistUnitCodes::REC21_BAG_TOTE => "A capacious bag or basket.",
            InvoiceSuiteCodelistUnitCodes::REC21_BAG_WOVE_PLAS => "Bag, woven plastic",
            InvoiceSuiteCodelistUnitCodes::REC21_BAG_WOVE_PLAS_SIFT_PROO => "Bag, woven plastic, sift proof",
            InvoiceSuiteCodelistUnitCodes::REC21_BAG_WOVE_PLAS_WATE_RESI => "Bag, woven plastic, water resistant",
            InvoiceSuiteCodelistUnitCodes::REC21_BAG_WOVE_PLAS_WITH_INNE_COAT => "Bag, woven plastic, without inner coat/liner",
            InvoiceSuiteCodelistUnitCodes::REC21_BALE_COMP => "Bale, compressed",
            InvoiceSuiteCodelistUnitCodes::REC21_BALE_NONC => "Bale, non-compressed",
            InvoiceSuiteCodelistUnitCodes::REC21_BALL => "A spherical containment vessel for retaining substances or articles.",
            InvoiceSuiteCodelistUnitCodes::REC21_BALL_NONP => "Balloon, non-protected",
            InvoiceSuiteCodelistUnitCodes::REC21_BALL_PROT => "Balloon, protected",
            InvoiceSuiteCodelistUnitCodes::REC21_BAR => "Bar",
            InvoiceSuiteCodelistUnitCodes::REC21_BARREL => "Barrel",
            InvoiceSuiteCodelistUnitCodes::REC21_BARR_WOOD => "Barrel, wooden",
            InvoiceSuiteCodelistUnitCodes::REC21_BARR_WOOD_BUNG_TYPE => "Barrel, wooden, bung type",
            InvoiceSuiteCodelistUnitCodes::REC21_BARR_WOOD_REMO_HEAD => "Barrel, wooden, removable head",
            InvoiceSuiteCodelistUnitCodes::REC21_BARS_IN_BUND => "Bars, in bundle/bunch/truss",
            InvoiceSuiteCodelistUnitCodes::REC21_BASIN => "Basin",
            InvoiceSuiteCodelistUnitCodes::REC21_BASKET => "Basket",
            InvoiceSuiteCodelistUnitCodes::REC21_BASK_WITH_HAND_CARD => "Basket, with handle, cardboard",
            InvoiceSuiteCodelistUnitCodes::REC21_BASK_WITH_HAND_PLAS => "Basket, with handle, plastic",
            InvoiceSuiteCodelistUnitCodes::REC21_BASK_WITH_HAND_WOOD => "Basket, with handle, wooden",
            InvoiceSuiteCodelistUnitCodes::REC21_BELT => "A band use to retain multiple articles together.",
            InvoiceSuiteCodelistUnitCodes::REC21_BIN => "Bin",
            InvoiceSuiteCodelistUnitCodes::REC21_BLOCK => "A solid piece of a hard substance, such as granite, having one or more flat sides.",
            InvoiceSuiteCodelistUnitCodes::REC21_BOARD => "Board",
            InvoiceSuiteCodelistUnitCodes::REC21_BOAR_IN_BUND => "Board, in bundle/bunch/truss",
            InvoiceSuiteCodelistUnitCodes::REC21_BOBBIN => "Bobbin",
            InvoiceSuiteCodelistUnitCodes::REC21_BOLT => "Bolt",
            InvoiceSuiteCodelistUnitCodes::REC21_BOTT_GAS => "A narrow-necked metal cylinder for retention of liquefied or compressed gas.",
            InvoiceSuiteCodelistUnitCodes::REC21_BOTT_NONP_BULB => "A narrow-necked bulb shaped vessel without external protective packing material.",
            InvoiceSuiteCodelistUnitCodes::REC21_BOTT_NONP_CYLI => "A narrow-necked cylindrical shaped vessel without external protective packing material.",
            InvoiceSuiteCodelistUnitCodes::REC21_BOTT_PROT_BULB => "A narrow-necked bulb shaped vessel with external protective packing material.",
            InvoiceSuiteCodelistUnitCodes::REC21_BOTT_PROT_CYLI => "A narrow-necked cylindrical shaped vessel with external protective packing material.",
            InvoiceSuiteCodelistUnitCodes::REC21_BOTT_BOTT => "Bottlecrate / bottlerack",
            InvoiceSuiteCodelistUnitCodes::REC21_BOX => "Box",
            InvoiceSuiteCodelistUnitCodes::REC21_BOX_ALUM => "Box, aluminium",
            InvoiceSuiteCodelistUnitCodes::REC21_BOX_COMM_HAND_EQUI_POOL_CHEP_EURO => "A box mounted on a pallet base under the control of CHEP.",
            InvoiceSuiteCodelistUnitCodes::REC21_BOX_FIBR => "Box, fibreboard",
            InvoiceSuiteCodelistUnitCodes::REC21_BOX_FOR_LIQU => "Box, for liquids",
            InvoiceSuiteCodelistUnitCodes::REC21_BOX_NATU_WOOD => "Box, natural wood",
            InvoiceSuiteCodelistUnitCodes::REC21_BOX_PLAS => "Box, plastic",
            InvoiceSuiteCodelistUnitCodes::REC21_BOX_PLAS_EXPA => "Box, plastic, expanded",
            InvoiceSuiteCodelistUnitCodes::REC21_BOX_PLAS_SOLI => "Box, plastic, solid",
            InvoiceSuiteCodelistUnitCodes::REC21_BOX_PLYW => "Box, plywood",
            InvoiceSuiteCodelistUnitCodes::REC21_BOX_RECO_WOOD => "Box, reconstituted wood",
            InvoiceSuiteCodelistUnitCodes::REC21_BOX_STEE => "Box, steel",
            InvoiceSuiteCodelistUnitCodes::REC21_BOX_WOOD_NATU_WOOD_ORDI => "Box, wooden, natural wood, ordinary",
            InvoiceSuiteCodelistUnitCodes::REC21_BOX_WOOD_NATU_WOOD_WITH_SIFT_PROO_WALL => "Box, wooden, natural wood, with sift proof walls",
            InvoiceSuiteCodelistUnitCodes::REC21_BUCKET => "Bucket",
            InvoiceSuiteCodelistUnitCodes::REC21_BULK_GAS_AT__MBAR_AND_5C => "Bulk, gas (at 1031 mbar and 15°C)",
            InvoiceSuiteCodelistUnitCodes::REC21_BULK_LIQU_GAS_AT_ABNO_TEMP => "Bulk, liquefied gas (at abnormal temperature/pressure)",
            InvoiceSuiteCodelistUnitCodes::REC21_BULK_LIQU => "Bulk, liquid",
            InvoiceSuiteCodelistUnitCodes::REC21_BULK_SCRA_META => "Loose or unpacked scrap metal transported in bulk form.",
            InvoiceSuiteCodelistUnitCodes::REC21_BULK_SOLI_FINE_PART_POWD => "Bulk, solid, fine particles (“powders”)",
            InvoiceSuiteCodelistUnitCodes::REC21_BULK_SOLI_GRAN_PART_GRAI => "Bulk, solid, granular particles (“grains”)",
            InvoiceSuiteCodelistUnitCodes::REC21_BULK_SOLI_LARG_PART_NODU => "Bulk, solid, large particles (“nodules”)",
            InvoiceSuiteCodelistUnitCodes::REC21_BUNCH => "Bunch",
            InvoiceSuiteCodelistUnitCodes::REC21_BUNDLE => "Bundle",
            InvoiceSuiteCodelistUnitCodes::REC21_BUND_WOOD => "Loose or unpacked pieces of wood tied or wrapped together.",
            InvoiceSuiteCodelistUnitCodes::REC21_BUTT => "Butt",
            InvoiceSuiteCodelistUnitCodes::REC21_CAGE => "Cage",
            InvoiceSuiteCodelistUnitCodes::REC21_CAGE_COMM_HAND_EQUI_POOL_CHEP => "Cage, Commonwealth Handling Equipment Pool (CHEP)",
            InvoiceSuiteCodelistUnitCodes::REC21_CAGE_ROLL => "Cage, roll",
            InvoiceSuiteCodelistUnitCodes::REC21_CAN_CYLI => "Can, cylindrical",
            InvoiceSuiteCodelistUnitCodes::REC21_CAN_RECT => "Can, rectangular",
            InvoiceSuiteCodelistUnitCodes::REC21_CAN_WITH_HAND_AND_SPOU => "Can, with handle and spout",
            InvoiceSuiteCodelistUnitCodes::REC21_CANISTER => "Canister",
            InvoiceSuiteCodelistUnitCodes::REC21_CANVAS => "Canvas",
            InvoiceSuiteCodelistUnitCodes::REC21_CAPSULE => "Capsule",
            InvoiceSuiteCodelistUnitCodes::REC21_CARB_NONP => "Carboy, non-protected",
            InvoiceSuiteCodelistUnitCodes::REC21_CARB_PROT => "Carboy, protected",
            InvoiceSuiteCodelistUnitCodes::REC21_CARD => "A flat package usually made of fibreboard from/to which product is often hung or attached.",
            InvoiceSuiteCodelistUnitCodes::REC21_CART_FLAT => "Wheeled flat bedded device on which trays or other regular shaped items are packed for transportation purposes.",
            InvoiceSuiteCodelistUnitCodes::REC21_CARTON => "Carton",
            InvoiceSuiteCodelistUnitCodes::REC21_CARTRIDGE => "Package containing a charge such as propelling explosive for firearms or ink toner for a printer.",
            InvoiceSuiteCodelistUnitCodes::REC21_CASE => "Case",
            InvoiceSuiteCodelistUnitCodes::REC21_CASE_CAR => "A type of portable container designed to store equipment for carriage in an automobile.",
            InvoiceSuiteCodelistUnitCodes::REC21_CASE_ISOT => "Case, isothermic",
            InvoiceSuiteCodelistUnitCodes::REC21_CASE_SKEL => "Case, skeleton",
            InvoiceSuiteCodelistUnitCodes::REC21_CASE_STEE => "Case, steel",
            InvoiceSuiteCodelistUnitCodes::REC21_CASE_WITH_PALL_BASE => "Case, with pallet base",
            InvoiceSuiteCodelistUnitCodes::REC21_CASE_WITH_PALL_BASE_CARD => "Case, with pallet base, cardboard",
            InvoiceSuiteCodelistUnitCodes::REC21_CASE_WITH_PALL_BASE_META => "Case, with pallet base, metal",
            InvoiceSuiteCodelistUnitCodes::REC21_CASE_WITH_PALL_BASE_PLAS => "Case, with pallet base, plastic",
            InvoiceSuiteCodelistUnitCodes::REC21_CASE_WITH_PALL_BASE_WOOD => "Case, with pallet base, wooden",
            InvoiceSuiteCodelistUnitCodes::REC21_CASE_WOOD => "A case made of wood for retaining substances or articles.",
            InvoiceSuiteCodelistUnitCodes::REC21_CASK => "Cask",
            InvoiceSuiteCodelistUnitCodes::REC21_CHEP_PALL__CM_X__CM => "Commonwealth Handling Equipment Pool (CHEP) standard pallet of dimensions 60 centimeters x 80 centimeters.",
            InvoiceSuiteCodelistUnitCodes::REC21_CHEST => "Chest",
            InvoiceSuiteCodelistUnitCodes::REC21_CHURN => "Churn",
            InvoiceSuiteCodelistUnitCodes::REC21_CLAMSHELL => "Clamshell",
            InvoiceSuiteCodelistUnitCodes::REC21_COFFER => "Coffer",
            InvoiceSuiteCodelistUnitCodes::REC21_COFFIN => "Coffin",
            InvoiceSuiteCodelistUnitCodes::REC21_COIL => "Coil",
            InvoiceSuiteCodelistUnitCodes::REC21_COMP_PACK_GLAS_RECE => "Composite packaging, glass receptacle",
            InvoiceSuiteCodelistUnitCodes::REC21_COMP_PACK_GLAS_RECE_IN_ALUM_CRAT => "Composite packaging, glass receptacle in aluminium crate",
            InvoiceSuiteCodelistUnitCodes::REC21_COMP_PACK_GLAS_RECE_IN_ALUM_DRUM => "Composite packaging, glass receptacle in aluminium drum",
            InvoiceSuiteCodelistUnitCodes::REC21_COMP_PACK_GLAS_RECE_IN_EXPA_PLAS_PACK => "Composite packaging, glass receptacle in expandable plastic pack",
            InvoiceSuiteCodelistUnitCodes::REC21_COMP_PACK_GLAS_RECE_IN_FIBR_DRUM => "Composite packaging, glass receptacle in fibre drum",
            InvoiceSuiteCodelistUnitCodes::REC21_COMP_PACK_GLAS_RECE_IN_FIBR_BOX => "Composite packaging, glass receptacle in fibreboard box",
            InvoiceSuiteCodelistUnitCodes::REC21_COMP_PACK_GLAS_RECE_IN_PLYW_DRUM => "Composite packaging, glass receptacle in plywood drum",
            InvoiceSuiteCodelistUnitCodes::REC21_COMP_PACK_GLAS_RECE_IN_SOLI_PLAS_PACK => "Composite packaging, glass receptacle in solid plastic pack",
            InvoiceSuiteCodelistUnitCodes::REC21_COMP_PACK_GLAS_RECE_IN_STEE_CRAT_BOX => "Composite packaging, glass receptacle in steel crate box",
            InvoiceSuiteCodelistUnitCodes::REC21_COMP_PACK_GLAS_RECE_IN_STEE_DRUM => "Composite packaging, glass receptacle in steel drum",
            InvoiceSuiteCodelistUnitCodes::REC21_COMP_PACK_GLAS_RECE_IN_WICK_HAMP => "Composite packaging, glass receptacle in wickerwork hamper",
            InvoiceSuiteCodelistUnitCodes::REC21_COMP_PACK_GLAS_RECE_IN_WOOD_BOX => "Composite packaging, glass receptacle in wooden box",
            InvoiceSuiteCodelistUnitCodes::REC21_COMP_PACK_PLAS_RECE => "Composite packaging, plastic receptacle",
            InvoiceSuiteCodelistUnitCodes::REC21_COMP_PACK_PLAS_RECE_IN_ALUM_CRAT => "Composite packaging, plastic receptacle in aluminium crate",
            InvoiceSuiteCodelistUnitCodes::REC21_COMP_PACK_PLAS_RECE_IN_ALUM_DRUM => "Composite packaging, plastic receptacle in aluminium drum",
            InvoiceSuiteCodelistUnitCodes::REC21_COMP_PACK_PLAS_RECE_IN_FIBR_DRUM => "Composite packaging, plastic receptacle in fibre drum",
            InvoiceSuiteCodelistUnitCodes::REC21_COMP_PACK_PLAS_RECE_IN_FIBR_BOX => "Composite packaging, plastic receptacle in fibreboard box",
            InvoiceSuiteCodelistUnitCodes::REC21_COMP_PACK_PLAS_RECE_IN_PLAS_DRUM => "Composite packaging, plastic receptacle in plastic drum",
            InvoiceSuiteCodelistUnitCodes::REC21_COMP_PACK_PLAS_RECE_IN_PLYW_BOX => "Composite packaging, plastic receptacle in plywood box",
            InvoiceSuiteCodelistUnitCodes::REC21_COMP_PACK_PLAS_RECE_IN_PLYW_DRUM => "Composite packaging, plastic receptacle in plywood drum",
            InvoiceSuiteCodelistUnitCodes::REC21_COMP_PACK_PLAS_RECE_IN_SOLI_PLAS_BOX => "Composite packaging, plastic receptacle in solid plastic box",
            InvoiceSuiteCodelistUnitCodes::REC21_COMP_PACK_PLAS_RECE_IN_STEE_CRAT_BOX => "Composite packaging, plastic receptacle in steel crate box",
            InvoiceSuiteCodelistUnitCodes::REC21_COMP_PACK_PLAS_RECE_IN_STEE_DRUM => "Composite packaging, plastic receptacle in steel drum",
            InvoiceSuiteCodelistUnitCodes::REC21_COMP_PACK_PLAS_RECE_IN_WOOD_BOX => "Composite packaging, plastic receptacle in wooden box",
            InvoiceSuiteCodelistUnitCodes::REC21_CONE => "Container used in the transport of linear material such as yarn.",
            InvoiceSuiteCodelistUnitCodes::REC21_CONT_FLEX => "A packaging container of flexible construction.",
            InvoiceSuiteCodelistUnitCodes::REC21_CONT_GALL => "A container with a capacity of one gallon.",
            InvoiceSuiteCodelistUnitCodes::REC21_CONT_META => "A type of containment box made of metal for retaining substances or articles, not otherwise specified as transport equipment.",
            InvoiceSuiteCodelistUnitCodes::REC21_CONT_NOT_OTHE_SPEC_AS_TRAN_EQUI => "Container, not otherwise specified as transport equipment",
            InvoiceSuiteCodelistUnitCodes::REC21_CONT_OUTE => "A type of containment box that serves as the outer shipping container, not otherwise specified as transport equipment.",
            InvoiceSuiteCodelistUnitCodes::REC21_COVER => "Cover",
            InvoiceSuiteCodelistUnitCodes::REC21_CRATE => "Crate",
            InvoiceSuiteCodelistUnitCodes::REC21_CRAT_BEER => "Crate, beer",
            InvoiceSuiteCodelistUnitCodes::REC21_CRAT_BULK_CARD => "Crate, bulk, cardboard",
            InvoiceSuiteCodelistUnitCodes::REC21_CRAT_BULK_PLAS => "Crate, bulk, plastic",
            InvoiceSuiteCodelistUnitCodes::REC21_CRAT_BULK_WOOD => "Crate, bulk, wooden",
            InvoiceSuiteCodelistUnitCodes::REC21_CRAT_FRAM => "Crate, framed",
            InvoiceSuiteCodelistUnitCodes::REC21_CRAT_FRUI => "Crate, fruit",
            InvoiceSuiteCodelistUnitCodes::REC21_CRAT_META => "Containment box made of metal for retaining substances or articles.",
            InvoiceSuiteCodelistUnitCodes::REC21_CRAT_MILK => "Crate, milk",
            InvoiceSuiteCodelistUnitCodes::REC21_CRAT_MULT_LAYE_CARD => "Crate, multiple layer, cardboard",
            InvoiceSuiteCodelistUnitCodes::REC21_CRAT_MULT_LAYE_PLAS => "Crate, multiple layer, plastic",
            InvoiceSuiteCodelistUnitCodes::REC21_CRAT_MULT_LAYE_WOOD => "Crate, multiple layer, wooden",
            InvoiceSuiteCodelistUnitCodes::REC21_CRAT_SHAL => "Crate, shallow",
            InvoiceSuiteCodelistUnitCodes::REC21_CRAT_WOOD => "A receptacle, made of wood, on which goods are retained for ease of mechanical handling during transport and storage.",
            InvoiceSuiteCodelistUnitCodes::REC21_CREEL => "Creel",
            InvoiceSuiteCodelistUnitCodes::REC21_CUP => "Cup",
            InvoiceSuiteCodelistUnitCodes::REC21_CYLINDER => "Cylinder",
            InvoiceSuiteCodelistUnitCodes::REC21_DEMI_NONP => "Demijohn, non-protected",
            InvoiceSuiteCodelistUnitCodes::REC21_DEMI_PROT => "Demijohn, protected",
            InvoiceSuiteCodelistUnitCodes::REC21_DISPENSER => "Dispenser",
            InvoiceSuiteCodelistUnitCodes::REC21_DRUM => "Drum",
            InvoiceSuiteCodelistUnitCodes::REC21_DRUM_ALUM => "Drum, aluminium",
            InvoiceSuiteCodelistUnitCodes::REC21_DRUM_ALUM_NONR_HEAD => "Drum, aluminium, non-removable head",
            InvoiceSuiteCodelistUnitCodes::REC21_DRUM_ALUM_REMO_HEAD => "Drum, aluminium, removable head",
            InvoiceSuiteCodelistUnitCodes::REC21_DRUM_FIBR => "Drum, fibre",
            InvoiceSuiteCodelistUnitCodes::REC21_DRUM_IRON => "Drum, iron",
            InvoiceSuiteCodelistUnitCodes::REC21_DRUM_PLAS => "Drum, plastic",
            InvoiceSuiteCodelistUnitCodes::REC21_DRUM_PLAS_NONR_HEAD => "Drum, plastic, non-removable head",
            InvoiceSuiteCodelistUnitCodes::REC21_DRUM_PLAS_REMO_HEAD => "Drum, plastic, removable head",
            InvoiceSuiteCodelistUnitCodes::REC21_DRUM_PLYW => "Drum, plywood",
            InvoiceSuiteCodelistUnitCodes::REC21_DRUM_STEE => "Drum, steel",
            InvoiceSuiteCodelistUnitCodes::REC21_DRUM_STEE_NONR_HEAD => "Drum, steel, non-removable head",
            InvoiceSuiteCodelistUnitCodes::REC21_DRUM_STEE_REMO_HEAD => "Drum, steel, removable head",
            InvoiceSuiteCodelistUnitCodes::REC21_DRUM_WOOD => "Drum, wooden",
            InvoiceSuiteCodelistUnitCodes::REC21_ENVELOPE => "Envelope",
            InvoiceSuiteCodelistUnitCodes::REC21_ENVE_STEE => "Envelope, steel",
            InvoiceSuiteCodelistUnitCodes::REC21_FILMPACK => "Filmpack",
            InvoiceSuiteCodelistUnitCodes::REC21_FIRKIN => "Firkin",
            InvoiceSuiteCodelistUnitCodes::REC21_FLASK => "Flask",
            InvoiceSuiteCodelistUnitCodes::REC21_FLEXIBAG => "A flexible containment bag made of plastic, typically for the transportation bulk non-hazardous cargoes using standard size shipping containers.",
            InvoiceSuiteCodelistUnitCodes::REC21_FLEXITANK => "A flexible containment tank made of plastic, typically for the transportation bulk non-hazardous cargoes using standard size shipping containers.",
            InvoiceSuiteCodelistUnitCodes::REC21_FOODTAINER => "Foodtainer",
            InvoiceSuiteCodelistUnitCodes::REC21_FOOTLOCKER => "Footlocker",
            InvoiceSuiteCodelistUnitCodes::REC21_FRAME => "Frame",
            InvoiceSuiteCodelistUnitCodes::REC21_GIRDER => "Girder",
            InvoiceSuiteCodelistUnitCodes::REC21_GIRD_IN_BUND => "Girders, in bundle/bunch/truss",
            InvoiceSuiteCodelistUnitCodes::REC21_HAMPER => "Hamper",
            InvoiceSuiteCodelistUnitCodes::REC21_HANGER => "A purpose shaped device with a hook at the top for hanging items from a rail.",
            InvoiceSuiteCodelistUnitCodes::REC21_HOGSHEAD => "Hogshead",
            InvoiceSuiteCodelistUnitCodes::REC21_INGOT => "Ingot",
            InvoiceSuiteCodelistUnitCodes::REC21_INGO_IN_BUND => "Ingots, in bundle/bunch/truss",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT => "A reusable container made of metal, plastic, textile, wood or composite materials used to facilitate transportation of bulk solids and liquids in manageable volumes.",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_ALUM => "Intermediate bulk container, aluminium",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_ALUM_LIQU => "Intermediate bulk container, aluminium, liquid",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_ALUM_PRES__KPA => "Intermediate bulk container, aluminium, pressurised > 10 kpa",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_COMP => "Intermediate bulk container, composite",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_COMP_FLEX_PLAS_LIQU => "Intermediate bulk container, composite, flexible plastic, liquids",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_COMP_FLEX_PLAS_PRES => "Intermediate bulk container, composite, flexible plastic, pressurised",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_COMP_FLEX_PLAS_SOLI => "Intermediate bulk container, composite, flexible plastic, solids",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_COMP_RIGI_PLAS_LIQU => "Intermediate bulk container, composite, rigid plastic, liquids",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_COMP_RIGI_PLAS_PRES => "Intermediate bulk container, composite, rigid plastic, pressurised",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_COMP_RIGI_PLAS_SOLI => "Intermediate bulk container, composite, rigid plastic, solids",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_FIBR => "Intermediate bulk container, fibreboard",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_FLEX => "Intermediate bulk container, flexible",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_META => "Intermediate bulk container, metal",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_META_LIQU => "Intermediate bulk container, metal, liquid",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_META_OTHE_THAN_STEE => "Intermediate bulk container, metal, other than steel",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_META_PRES__KPA => "Intermediate bulk container, metal, pressure 10 kpa",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_NATU_WOOD => "Intermediate bulk container, natural wood",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_NATU_WOOD_WITH_INNE_LINE => "Intermediate bulk container, natural wood, with inner liner",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_PAPE_MULT => "Intermediate bulk container, paper, multi-wall",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_PAPE_MULT_WATE_RESI => "Intermediate bulk container, paper, multi-wall, water resistant",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_PLAS_FILM => "Intermediate bulk container, plastic film",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_PLYW => "Intermediate bulk container, plywood",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_PLYW_WITH_INNE_LINE => "Intermediate bulk container, plywood, with inner liner",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_RECO_WOOD => "Intermediate bulk container, reconstituted wood",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_RECO_WOOD_WITH_INNE_LINE => "Intermediate bulk container, reconstituted wood, with inner liner",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_RIGI_PLAS => "Intermediate bulk container, rigid plastic",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_RIGI_PLAS_FREE_LIQU => "Intermediate bulk container, rigid plastic, freestanding, liquids",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_RIGI_PLAS_FREE_PRES => "Intermediate bulk container, rigid plastic, freestanding, pressurised",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_RIGI_PLAS_FREE_SOLI => "Intermediate bulk container, rigid plastic, freestanding, solids",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_RIGI_PLAS_WITH_STRU_EQUI_LIQU => "Intermediate bulk container, rigid plastic, with structural equipment, liquids",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_RIGI_PLAS_WITH_STRU_EQUI_PRES => "Intermediate bulk container, rigid plastic, with structural equipment, pressurised",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_RIGI_PLAS_WITH_STRU_EQUI_SOLI => "Intermediate bulk container, rigid plastic, with structural equipment, solids",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_STEE => "Intermediate bulk container, steel",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_STEE_LIQU => "Intermediate bulk container, steel, liquid",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_STEE_PRES__KPA => "Intermediate bulk container, steel, pressurised > 10 kpa",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_TEXT_WITH_OUT_COAT => "Intermediate bulk container, textile with out coat/liner",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_TEXT_COAT => "Intermediate bulk container, textile, coated",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_TEXT_COAT_AND_LINE => "Intermediate bulk container, textile, coated and liner",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_TEXT_WITH_LINE => "Intermediate bulk container, textile, with liner",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_WOVE_PLAS_COAT => "Intermediate bulk container, woven plastic, coated",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_WOVE_PLAS_COAT_AND_LINE => "Intermediate bulk container, woven plastic, coated and liner",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_WOVE_PLAS_WITH_LINE => "Intermediate bulk container, woven plastic, with liner",
            InvoiceSuiteCodelistUnitCodes::REC21_INTE_BULK_CONT_WOVE_PLAS_WITH_COAT => "Intermediate bulk container, woven plastic, without coat/liner",
            InvoiceSuiteCodelistUnitCodes::REC21_JAR => "Jar",
            InvoiceSuiteCodelistUnitCodes::REC21_JERR_CYLI => "Jerrican, cylindrical",
            InvoiceSuiteCodelistUnitCodes::REC21_JERR_PLAS => "Jerrican, plastic",
            InvoiceSuiteCodelistUnitCodes::REC21_JERR_PLAS_NONR_HEAD => "Jerrican, plastic, non-removable head",
            InvoiceSuiteCodelistUnitCodes::REC21_JERR_PLAS_REMO_HEAD => "Jerrican, plastic, removable head",
            InvoiceSuiteCodelistUnitCodes::REC21_JERR_RECT => "Jerrican, rectangular",
            InvoiceSuiteCodelistUnitCodes::REC21_JERR_STEE => "Jerrican, steel",
            InvoiceSuiteCodelistUnitCodes::REC21_JERR_STEE_NONR_HEAD => "Jerrican, steel, non-removable head",
            InvoiceSuiteCodelistUnitCodes::REC21_JERR_STEE_REMO_HEAD => "Jerrican, steel, removable head",
            InvoiceSuiteCodelistUnitCodes::REC21_JUG => "Jug",
            InvoiceSuiteCodelistUnitCodes::REC21_JUTEBAG => "Jutebag",
            InvoiceSuiteCodelistUnitCodes::REC21_KEG => "Keg",
            InvoiceSuiteCodelistUnitCodes::REC21_KIT => "A set of articles or implements used for a specific purpose.",
            InvoiceSuiteCodelistUnitCodes::REC21_LARG_BAG_PALL_SIZE => "A non-rigid container made of fabric, paper, plastic, etc, with an opening at the top which can be closed and which is suitable for use on pallets",
            InvoiceSuiteCodelistUnitCodes::REC21_LIFTVAN => "A wooden or metal container used for packing household goods and personal effects.",
            InvoiceSuiteCodelistUnitCodes::REC21_LOG => "Log",
            InvoiceSuiteCodelistUnitCodes::REC21_LOGS_IN_BUND => "Logs, in bundle/bunch/truss",
            InvoiceSuiteCodelistUnitCodes::REC21_LOT => "Lot",
            InvoiceSuiteCodelistUnitCodes::REC21_LPR_PALL__CM_X__CM => "LPR (La Pallet Rouge) standard pallet of dimensions 60 cm x 80 cm.",
            InvoiceSuiteCodelistUnitCodes::REC21_LPR_PALL__CM_X__CM => "LPR (La Pallet Rouge) standard pallet of dimensions 80 cm x 120 cm.",
            InvoiceSuiteCodelistUnitCodes::REC21_LUG => "A wooden box for the transportation and storage of fruit or vegetables.",
            InvoiceSuiteCodelistUnitCodes::REC21_LUGGAGE => "A collection of bags, cases and/or containers which hold personal belongings for a journey.",
            InvoiceSuiteCodelistUnitCodes::REC21_MAT => "Mat",
            InvoiceSuiteCodelistUnitCodes::REC21_MATCHBOX => "Matchbox",
            InvoiceSuiteCodelistUnitCodes::REC21_MUTU_DEFI => "Mutually defined",
            InvoiceSuiteCodelistUnitCodes::REC21_NEST => "Nest",
            InvoiceSuiteCodelistUnitCodes::REC21_NET => "Net",
            InvoiceSuiteCodelistUnitCodes::REC21_NET_TUBE_PLAS => "Net, tube, plastic",
            InvoiceSuiteCodelistUnitCodes::REC21_NET_TUBE_TEXT => "Net, tube, textile",
            InvoiceSuiteCodelistUnitCodes::REC21_NOT_AVAI => "Not available",
            InvoiceSuiteCodelistUnitCodes::REC21_OCTABIN => "A standard cardboard container of large dimensions for storing for example vegetables, granules of plastics or other dry products.",
            InvoiceSuiteCodelistUnitCodes::REC21_ONEW_PALL => "Pallet need not be returned to the point of expedition",
            InvoiceSuiteCodelistUnitCodes::REC21_ONEW_PALL_ISO___EURO_PALL => "Oneway pallet with dimensions 80 X 60 cm.",
            InvoiceSuiteCodelistUnitCodes::REC21_ONEW_PALL_ISO___EURO_PALL => "Oneway pallet with dimensions 80 X 120 cm.",
            InvoiceSuiteCodelistUnitCodes::REC21_ONEW_PALL_ISO___EURO_PALL => "Oneway pallet with dimensions 100 X 120 cm.",
            InvoiceSuiteCodelistUnitCodes::REC21_PACKAGE => "Standard packaging unit.",
            InvoiceSuiteCodelistUnitCodes::REC21_PACK_CARD_WITH_BOTT_GRIP => "Packaging material made out of cardboard that facilitates the separation of individual glass or plastic bottles.",
            InvoiceSuiteCodelistUnitCodes::REC21_PACK_DISP_CARD => "Package, display, cardboard",
            InvoiceSuiteCodelistUnitCodes::REC21_PACK_DISP_META => "Package, display, metal",
            InvoiceSuiteCodelistUnitCodes::REC21_PACK_DISP_PLAS => "Package, display, plastic",
            InvoiceSuiteCodelistUnitCodes::REC21_PACK_DISP_WOOD => "Package, display, wooden",
            InvoiceSuiteCodelistUnitCodes::REC21_PACK_FLOW => "A flexible tubular package or skin, possibly transparent, often used for containment of foodstuffs (e.g. salami sausage).",
            InvoiceSuiteCodelistUnitCodes::REC21_PACK_PAPE_WRAP => "Package, paper wrapped",
            InvoiceSuiteCodelistUnitCodes::REC21_PACK_SHOW => "Package, show",
            InvoiceSuiteCodelistUnitCodes::REC21_PACKET => "Small package.",
            InvoiceSuiteCodelistUnitCodes::REC21_PAIL => "Pail",
            InvoiceSuiteCodelistUnitCodes::REC21_PALLET => "Platform or open-ended box, usually made of wood, on which goods are retained for ease of mechanical handling during transport and storage.",
            InvoiceSuiteCodelistUnitCodes::REC21_PALL__X__CM => "Pallet with dimensions 60 X 100 cm.",
            InvoiceSuiteCodelistUnitCodes::REC21_PALL__X__CM => "Pallet with dimensions 80 X 100 cm.",
            InvoiceSuiteCodelistUnitCodes::REC21_PALL_ISO___EURO_PALL => "Standard pallet with dimensions 80 X 60 cm.",
            InvoiceSuiteCodelistUnitCodes::REC21_PALL_ISO___EURO_PALL => "Standard pallet with dimensions 80 X 120 cm.",
            InvoiceSuiteCodelistUnitCodes::REC21_PALL_ISO___EURO_PALL => "Standard pallet with dimensions 100 X 120 cm.",
            InvoiceSuiteCodelistUnitCodes::REC21_PALL_WITH_EXCE_DIME => "Pallet with non-standard dimensions",
            InvoiceSuiteCodelistUnitCodes::REC21_PALL_C_0C => "Standard sized pallet of dimensions 100centimeters by 110 centimeters (cms).",
            InvoiceSuiteCodelistUnitCodes::REC21_PALL_AS => "Australian standard pallet of dimensions 116.5 centimeters x 116.5 centimeters.",
            InvoiceSuiteCodelistUnitCodes::REC21_PALL_BOX_COMB_OPEN_BOX_AND_PALL => "Pallet, box Combined open-ended box and pallet",
            InvoiceSuiteCodelistUnitCodes::REC21_PALL_CHEP__CM_X_0_CM => "Commonwealth Handling Equipment Pool (CHEP) standard pallet of dimensions 100 centimeters x 120 centimeters.",
            InvoiceSuiteCodelistUnitCodes::REC21_PALL_CHEP__CM_X__CM => "Commonwealth Handling Equipment Pool (CHEP) standard pallet of dimensions 40 centimeters x 60 centimeters.",
            InvoiceSuiteCodelistUnitCodes::REC21_PALL_CHEP__CM_X__CM => "Commonwealth Handling Equipment Pool (CHEP) standard pallet of dimensions 80 centimeters x 120 centimeters.",
            InvoiceSuiteCodelistUnitCodes::REC21_PALL_ISO_T => "ISO standard pallet of dimensions 110 centimeters x 110 centimeters, prevalent in Asia - Pacific region.",
            InvoiceSuiteCodelistUnitCodes::REC21_PALL_MODU_COLL_CM_C => "Standard sized pallet of dimensions 80 centimeters by 100 centimeters (cms).",
            InvoiceSuiteCodelistUnitCodes::REC21_PALL_MODU_COLL_CM_C => "Standard sized pallet of dimensions 80 centimeters by 120 centimeters (cms).",
            InvoiceSuiteCodelistUnitCodes::REC21_PALL_MODU_COLL_CM_CM => "Standard sized pallet of dimensions 80 centimeters by 60 centimeters (cms).",
            InvoiceSuiteCodelistUnitCodes::REC21_PALL_SHRI => "Pallet load secured with transparent plastic film that has been wrapped around and then shrunk tightly.",
            InvoiceSuiteCodelistUnitCodes::REC21_PALL_TRIW => "A lightweight pallet made from heavy duty corrugated board.",
            InvoiceSuiteCodelistUnitCodes::REC21_PALL_WOOD => "A platform or open-ended box, made of wood, on which goods are retained for ease of mechanical handling during transport and storage.",
            InvoiceSuiteCodelistUnitCodes::REC21_PAN => "A shallow, wide, open container, usually of metal.",
            InvoiceSuiteCodelistUnitCodes::REC21_PARCEL => "Parcel",
            InvoiceSuiteCodelistUnitCodes::REC21_PEN => "A small open top enclosure for retaining animals.",
            InvoiceSuiteCodelistUnitCodes::REC21_PIECE => "A loose or unpacked article.",
            InvoiceSuiteCodelistUnitCodes::REC21_PIPE => "Pipe",
            InvoiceSuiteCodelistUnitCodes::REC21_PIPE_IN_BUND => "Pipes, in bundle/bunch/truss",
            InvoiceSuiteCodelistUnitCodes::REC21_PITCHER => "Pitcher",
            InvoiceSuiteCodelistUnitCodes::REC21_PLANK => "Plank",
            InvoiceSuiteCodelistUnitCodes::REC21_PLAN_IN_BUND => "Planks, in bundle/bunch/truss",
            InvoiceSuiteCodelistUnitCodes::REC21_PLAS_PALL_SRS__CM_X__CM => "SRS (Svenska Retursystem) standard synthetic pallet of dimensions 60 cm x 80 cm.",
            InvoiceSuiteCodelistUnitCodes::REC21_PLAS_PALL_SRS__CM_X__CM => "SRS (Svenska Retursystem) standard synthetic pallet of dimensions 80 cm x 120 cm.",
            InvoiceSuiteCodelistUnitCodes::REC21_PLATE => "Plate",
            InvoiceSuiteCodelistUnitCodes::REC21_PLAT_IN_BUND => "Plates, in bundle/bunch/truss",
            InvoiceSuiteCodelistUnitCodes::REC21_PLAT_UNSP_WEIG_OR_DIME => "A pallet equivalent shipping platform of unknown dimensions or unknown weight.",
            InvoiceSuiteCodelistUnitCodes::REC21_POT => "Pot",
            InvoiceSuiteCodelistUnitCodes::REC21_POUCH => "Pouch",
            InvoiceSuiteCodelistUnitCodes::REC21_PUNNET => "Punnet",
            InvoiceSuiteCodelistUnitCodes::REC21_RACK => "Rack",
            InvoiceSuiteCodelistUnitCodes::REC21_RACK_CLOT_HANG => "Rack, clothing hanger",
            InvoiceSuiteCodelistUnitCodes::REC21_RECE_FIBR => "Containment vessel made of fibre used for retaining substances or articles.",
            InvoiceSuiteCodelistUnitCodes::REC21_RECE_GLAS => "Containment vessel made of glass for retaining substances or articles.",
            InvoiceSuiteCodelistUnitCodes::REC21_RECE_META => "Containment vessel made of metal for retaining substances or articles.",
            InvoiceSuiteCodelistUnitCodes::REC21_RECE_PAPE => "Containment vessel made of paper for retaining substances or articles.",
            InvoiceSuiteCodelistUnitCodes::REC21_RECE_PLAS => "Containment vessel made of plastic for retaining substances or articles.",
            InvoiceSuiteCodelistUnitCodes::REC21_RECE_PLAS_WRAP => "Containment vessel wrapped with plastic for retaining substances or articles.",
            InvoiceSuiteCodelistUnitCodes::REC21_RECE_WOOD => "Containment vessel made of wood for retaining substances or articles.",
            InvoiceSuiteCodelistUnitCodes::REC21_REDNET => "Containment material made of red mesh netting for retaining articles (e.g. trees).",
            InvoiceSuiteCodelistUnitCodes::REC21_REEL => "Cylindrical rotatory device with a rim at each end on which materials are wound.",
            InvoiceSuiteCodelistUnitCodes::REC21_RETU_PALL => "Pallet must be returned to the point of expedition.",
            InvoiceSuiteCodelistUnitCodes::REC21_RING => "Ring",
            InvoiceSuiteCodelistUnitCodes::REC21_ROD => "Rod",
            InvoiceSuiteCodelistUnitCodes::REC21_RODS_IN_BUND => "Rods, in bundle/bunch/truss",
            InvoiceSuiteCodelistUnitCodes::REC21_ROLL => "Roll",
            InvoiceSuiteCodelistUnitCodes::REC21_SACHET => "Sachet",
            InvoiceSuiteCodelistUnitCodes::REC21_SACK => "Sack",
            InvoiceSuiteCodelistUnitCodes::REC21_SACK_MULT => "Sack, multi-wall",
            InvoiceSuiteCodelistUnitCodes::REC21_SEACHEST => "Sea-chest",
            InvoiceSuiteCodelistUnitCodes::REC21_SHEET => "Sheet",
            InvoiceSuiteCodelistUnitCodes::REC21_SHEE_PLAS_WRAP => "Sheet, plastic wrapping",
            InvoiceSuiteCodelistUnitCodes::REC21_SHEETMETAL => "Sheetmetal",
            InvoiceSuiteCodelistUnitCodes::REC21_SHEE_IN_BUND => "Sheets, in bundle/bunch/truss",
            InvoiceSuiteCodelistUnitCodes::REC21_SHRINKWRAPPED => "Goods retained in a transparent plastic film that has been wrapped around and then shrunk tightly on to the goods.",
            InvoiceSuiteCodelistUnitCodes::REC21_SKID => "A low movable platform or pallet to facilitate the handling and transport of goods.",
            InvoiceSuiteCodelistUnitCodes::REC21_SLAB => "Slab",
            InvoiceSuiteCodelistUnitCodes::REC21_SLEEVE => "Sleeve",
            InvoiceSuiteCodelistUnitCodes::REC21_SLIPSHEET => "Hard plastic sheeting primarily used as the base on which to stack goods to optimise the space within a container. May be used as an alternative to a palletized packaging.",
            InvoiceSuiteCodelistUnitCodes::REC21_SPINDLE => "Spindle",
            InvoiceSuiteCodelistUnitCodes::REC21_SPOOL => "A packaging container used in the transport of such items as wire, cable, tape and yarn.",
            InvoiceSuiteCodelistUnitCodes::REC21_SUITCASE => "Suitcase",
            InvoiceSuiteCodelistUnitCodes::REC21_SYNT_PALL_ISO => "A standard pallet with standard dimensions 80 x 120cm made of a synthetic material for hygienic reasons.",
            InvoiceSuiteCodelistUnitCodes::REC21_SYNT_PALL_ISO => "A standard pallet with standard dimensions 100 x 120cm made of a synthetic material for hygienic reasons.",
            InvoiceSuiteCodelistUnitCodes::REC21_TABLET => "A loose or unpacked article in the form of a bar, block or piece.",
            InvoiceSuiteCodelistUnitCodes::REC21_TANK_CONT_GENE => "A specially constructed container for transporting liquids and gases in bulk.",
            InvoiceSuiteCodelistUnitCodes::REC21_TANK_CYLI => "Tank, cylindrical",
            InvoiceSuiteCodelistUnitCodes::REC21_TANK_RECT => "Tank, rectangular",
            InvoiceSuiteCodelistUnitCodes::REC21_TEACHEST => "Tea-chest",
            InvoiceSuiteCodelistUnitCodes::REC21_TIERCE => "Tierce",
            InvoiceSuiteCodelistUnitCodes::REC21_TIN => "Tin",
            InvoiceSuiteCodelistUnitCodes::REC21_TRAY => "Tray",
            InvoiceSuiteCodelistUnitCodes::REC21_TRAY_CONT_HORI_STAC_FLAT_ITEM => "Tray containing flat items stacked on top of one another.",
            InvoiceSuiteCodelistUnitCodes::REC21_TRAY_ONE_LAYE_NO_COVE_CARD => "Tray, one layer no cover, cardboard",
            InvoiceSuiteCodelistUnitCodes::REC21_TRAY_ONE_LAYE_NO_COVE_PLAS => "Tray, one layer no cover, plastic",
            InvoiceSuiteCodelistUnitCodes::REC21_TRAY_ONE_LAYE_NO_COVE_POLY => "Tray, one layer no cover, polystyrene",
            InvoiceSuiteCodelistUnitCodes::REC21_TRAY_ONE_LAYE_NO_COVE_WOOD => "Tray, one layer no cover, wooden",
            InvoiceSuiteCodelistUnitCodes::REC21_TRAY_RIGI_LIDD_STAC_CEN_TS => "Lidded stackable rigid tray compliant with CEN TS 14482:2002.",
            InvoiceSuiteCodelistUnitCodes::REC21_TRAY_TWO_LAYE_NO_COVE_CARD => "Tray, two layers no cover, cardboard",
            InvoiceSuiteCodelistUnitCodes::REC21_TRAY_TWO_LAYE_NO_COVE_PLAS_TRAY => "Tray, two layers no cover, plastic tray",
            InvoiceSuiteCodelistUnitCodes::REC21_TRAY_TWO_LAYE_NO_COVE_WOOD => "Tray, two layers no cover, wooden",
            InvoiceSuiteCodelistUnitCodes::REC21_TROLLEY => "A low cart for the transportation and storage of groceries, milk, etc.",
            InvoiceSuiteCodelistUnitCodes::REC21_TRUNK => "Trunk",
            InvoiceSuiteCodelistUnitCodes::REC21_TRUSS => "Truss",
            InvoiceSuiteCodelistUnitCodes::REC21_TUB => "Tub",
            InvoiceSuiteCodelistUnitCodes::REC21_TUB_WITH_LID => "Tub, with lid",
            InvoiceSuiteCodelistUnitCodes::REC21_TUBE => "Tube",
            InvoiceSuiteCodelistUnitCodes::REC21_TUBE_COLL => "Tube, collapsible",
            InvoiceSuiteCodelistUnitCodes::REC21_TUBE_WITH_NOZZ => "A tube made of plastic, metal or cardboard fitted with a nozzle, containing a liquid or semi-liquid product, e.g. silicon.",
            InvoiceSuiteCodelistUnitCodes::REC21_TUBE_IN_BUND => "Tubes, in bundle/bunch/truss",
            InvoiceSuiteCodelistUnitCodes::REC21_TUN => "Tun",
            InvoiceSuiteCodelistUnitCodes::REC21_TWO_SIDE_CAGE_ON_WHEE_WITH_FIXI_STRA => "A two sided cage mounted on wheels with fixing strap. Dimensions: 900 x 770 x 1513 cm (length x width x height).",
            InvoiceSuiteCodelistUnitCodes::REC21_TYRE => "A ring made of rubber and/or metal surrounding a wheel.",
            InvoiceSuiteCodelistUnitCodes::REC21_UNCAGED => "Uncaged",
            InvoiceSuiteCodelistUnitCodes::REC21_UNIT => "A type of package composed of a single item or object, not otherwise specified as a unit of transport equipment.",
            InvoiceSuiteCodelistUnitCodes::REC21_UNPA_OR_UNPA => "Unpacked or unpackaged",
            InvoiceSuiteCodelistUnitCodes::REC21_UNPA_OR_UNPA_MULT_UNIT => "Unpacked or unpackaged, multiple units",
            InvoiceSuiteCodelistUnitCodes::REC21_UNPA_OR_UNPA_SING_UNIT => "Unpacked or unpackaged, single unit",
            InvoiceSuiteCodelistUnitCodes::REC21_VACUUMPACKED => "Vacuum-packed",
            InvoiceSuiteCodelistUnitCodes::REC21_VANPACK => "A type of wooden crate.",
            InvoiceSuiteCodelistUnitCodes::REC21_VAT => "Vat",
            InvoiceSuiteCodelistUnitCodes::REC21_VEHICLE => "A self-propelled means of conveyance.",
            InvoiceSuiteCodelistUnitCodes::REC21_VIAL => "Vial",
            InvoiceSuiteCodelistUnitCodes::REC21_WHEE_PALL_WITH_RAIS_RIM__X__X_6 => "A wheeled pallet with raised rim for the storing and transporting of loads. Dimensions: 81 x 60 x 16 cm (length x width x height).",
            InvoiceSuiteCodelistUnitCodes::REC21_WHOL_PALL => "Pallet provided by the wholesaler.",
            InvoiceSuiteCodelistUnitCodes::REC21_WICKERBOTTLE => "Wickerbottle",
            InvoiceSuiteCodelistUnitCodes::REC21_WOOD_PALL__CM_X__CM => "Wooden pallet with dimensions 40 cm x 80 cm.",
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
            'https://www.xrepository.de/details/urn:xoev-de:kosit:codeliste:rec20',
            'https://www.xrepository.de/details/urn:xoev-de:kosit:codeliste:rec21',
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
            'https://www.xrepository.de/api/xrepository/urn:xoev-de:kosit:codeliste:rec20_3/download/UN_ECE_Recommendation_N_20_3.json',
            'https://www.xrepository.de/api/xrepository/urn:xoev-de:kosit:codeliste:rec21_3/download/UN_ECE_Recommendation_N_21_3.json',
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
        return '2025-08-13T11:28:04+02:00';
    }
}
