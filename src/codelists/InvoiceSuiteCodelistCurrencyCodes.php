<?php

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\codelists;

/**
 * Class representing list of currency codes
 * Name of list: ISO
 *
 * @category InvoiceSuite
 * @author   HorstOeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 * @see      https://www.xrepository.de/details/urn:xoev-de:kosit:codeliste:currency-codes
 * @see      https://www.xrepository.de/api/xrepository/urn:xoev-de:kosit:codeliste:currency-codes_3/download/Currency_Codes_3.json
 */
enum InvoiceSuiteCodelistCurrencyCodes: string
{
    /**
     * ADB Unit of Account (XUA)
     *
     * ADB Unit of Account
     */
    case ADB_UNIT_OF_ACCOUNT = 'XUA';

    /**
     * Afghani (AFN)
     *
     * Afghani
     */
    case AFGHANI = 'AFN';

    /**
     * Algerian Dinar (DZD)
     *
     * Algerian Dinar
     */
    case ALGERIAN_DINAR = 'DZD';

    /**
     * Argentine Peso (ARS)
     *
     * Argentine Peso
     */
    case ARGENTINE_PESO = 'ARS';

    /**
     * Armenian Dram (AMD)
     *
     * Armenian Dram
     */
    case ARMENIAN_DRAM = 'AMD';

    /**
     * Aruban Florin (AWG)
     *
     * Aruban Florin
     */
    case ARUBAN_FLORIN = 'AWG';

    /**
     * Australian Dollar (AUD)
     *
     * Australian Dollar
     */
    case AUSTRALIAN_DOLLAR = 'AUD';

    /**
     * Azerbaijan Manat (AZN)
     *
     * Azerbaijan Manat
     */
    case AZERBAIJAN_MANAT = 'AZN';

    /**
     * Bahamian Dollar (BSD)
     *
     * Bahamian Dollar
     */
    case BAHAMIAN_DOLLAR = 'BSD';

    /**
     * Bahraini Dinar (BHD)
     *
     * Bahraini Dinar
     */
    case BAHRAINI_DINAR = 'BHD';

    /**
     * Baht (THB)
     *
     * Baht
     */
    case BAHT = 'THB';

    /**
     * Balboa (PAB)
     *
     * Balboa
     */
    case BALBOA = 'PAB';

    /**
     * Barbados Dollar (BBD)
     *
     * Barbados Dollar
     */
    case BARBADOS_DOLLAR = 'BBD';

    /**
     * Belarusian Ruble (BYN)
     *
     * Belarusian Ruble
     */
    case BELARUSIAN_RUBLE = 'BYN';

    /**
     * Belize Dollar (BZD)
     *
     * Belize Dollar
     */
    case BELIZE_DOLLAR = 'BZD';

    /**
     * Bermudian Dollar (BMD)
     *
     * Bermudian Dollar
     */
    case BERMUDIAN_DOLLAR = 'BMD';

    /**
     * Boliviano (BOB)
     *
     * Boliviano
     */
    case BOLIVIANO = 'BOB';

    /**
     * Bolívar Soberano (VES)
     *
     * Bolívar Soberano
     */
    case BOLVAR_SOBERANO = 'VES';

    /**
     * Bond Markets Unit European Composite Unit (EURCO) (XBA)
     *
     * Bond Markets Unit European Composite Unit (EURCO)
     */
    case BOND_MARKETS_UNIT_EUROPEAN_COMPOSITE_UNIT_EURCO = 'XBA';

    /**
     * Bond Markets Unit European Monetary Unit (E.M.U.-6) (XBB)
     *
     * Bond Markets Unit European Monetary Unit (E.M.U.-6)
     */
    case BOND_MARKETS_UNIT_EUROPEAN_MONETARY_UNIT_EMU = 'XBB';

    /**
     * Bond Markets Unit European Unit of Account 17 (E.U.A.-17) (XBD)
     *
     * Bond Markets Unit European Unit of Account 17 (E.U.A.-17)
     */
    case BOND_MARKETS_UNIT_EUROPEAN_UNIT_OF_ACCOUNT__EUA = 'XBD';

    /**
     * Brazilian Real (BRL)
     *
     * Brazilian Real
     */
    case BRAZILIAN_REAL = 'BRL';

    /**
     * Brunei Dollar (BND)
     *
     * Brunei Dollar
     */
    case BRUNEI_DOLLAR = 'BND';

    /**
     * Bulgarian Lev (BGN)
     *
     * Bulgarian Lev
     */
    case BULGARIAN_LEV = 'BGN';

    /**
     * Burundi Franc (BIF)
     *
     * Burundi Franc
     */
    case BURUNDI_FRANC = 'BIF';

    /**
     * Cabo Verde Escudo (CVE)
     *
     * Cabo Verde Escudo
     */
    case CABO_VERDE_ESCUDO = 'CVE';

    /**
     * Canadian Dollar (CAD)
     *
     * Canadian Dollar
     */
    case CANADIAN_DOLLAR = 'CAD';

    /**
     * Cayman Islands Dollar (KYD)
     *
     * Cayman Islands Dollar
     */
    case CAYMAN_ISLANDS_DOLLAR = 'KYD';

    /**
     * CFA Franc BCEAO (XOF)
     *
     * CFA Franc BCEAO
     */
    case CFA_FRANC_BCEAO = 'XOF';

    /**
     * CFA Franc BEAC (XAF)
     *
     * CFA Franc BEAC
     */
    case CFA_FRANC_BEAC = 'XAF';

    /**
     * CFP Franc (XPF)
     *
     * CFP Franc
     */
    case CFP_FRANC = 'XPF';

    /**
     * Chilean Peso (CLP)
     *
     * Chilean Peso
     */
    case CHILEAN_PESO = 'CLP';

    /**
     * Codes specifically reserved for testing purposes (XTS)
     *
     * Codes specifically reserved for testing purposes
     */
    case CODES_SPECIFICALLY_RESERVED_FOR_TESTING_PURPOSES = 'XTS';

    /**
     * Colombian Peso (COP)
     *
     * Colombian Peso
     */
    case COLOMBIAN_PESO = 'COP';

    /**
     * Comorian Franc (KMF)
     *
     * Comorian Franc
     */
    case COMORIAN_FRANC = 'KMF';

    /**
     * Congolese Franc (CDF)
     *
     * Congolese Franc
     */
    case CONGOLESE_FRANC = 'CDF';

    /**
     * Convertible Mark (BAM)
     *
     * Convertible Mark
     */
    case CONVERTIBLE_MARK = 'BAM';

    /**
     * Cordoba Oro (NIO)
     *
     * Cordoba Oro
     */
    case CORDOBA_ORO = 'NIO';

    /**
     * Costa Rican Colon (CRC)
     *
     * Costa Rican Colon
     */
    case COSTA_RICAN_COLON = 'CRC';

    /**
     * Cuban Peso (CUP)
     *
     * Cuban Peso
     */
    case CUBAN_PESO = 'CUP';

    /**
     * Czech Koruna (CZK)
     *
     * Czech Koruna
     */
    case CZECH_KORUNA = 'CZK';

    /**
     * Dalasi (GMD)
     *
     * Dalasi
     */
    case DALASI = 'GMD';

    /**
     * Danish Krone (DKK)
     *
     * Danish Krone
     */
    case DANISH_KRONE = 'DKK';

    /**
     * Denar (MKD)
     *
     * Denar
     */
    case DENAR = 'MKD';

    /**
     * Djibouti Franc (DJF)
     *
     * Djibouti Franc
     */
    case DJIBOUTI_FRANC = 'DJF';

    /**
     * Dobra (STN)
     *
     * Dobra
     */
    case DOBRA = 'STN';

    /**
     * Dominican Peso (DOP)
     *
     * Dominican Peso
     */
    case DOMINICAN_PESO = 'DOP';

    /**
     * Dong (VND)
     *
     * Dong
     */
    case DONG = 'VND';

    /**
     * East Caribbean Dollar (XCD)
     *
     * East Caribbean Dollar
     */
    case EAST_CARIBBEAN_DOLLAR = 'XCD';

    /**
     * Egyptian Pound (EGP)
     *
     * Egyptian Pound
     */
    case EGYPTIAN_POUND = 'EGP';

    /**
     * El Salvador Colon (SVC)
     *
     * El Salvador Colon
     */
    case EL_SALVADOR_COLON = 'SVC';

    /**
     * Ethiopian Birr (ETB)
     *
     * Ethiopian Birr
     */
    case ETHIOPIAN_BIRR = 'ETB';

    /**
     * Euro (EUR)
     *
     * Euro
     */
    case EURO = 'EUR';

    /**
     * Falkland Islands Pound (FKP)
     *
     * Falkland Islands Pound
     */
    case FALKLAND_ISLANDS_POUND = 'FKP';

    /**
     * Fiji Dollar (FJD)
     *
     * Fiji Dollar
     */
    case FIJI_DOLLAR = 'FJD';

    /**
     * Forint (HUF)
     *
     * Forint
     */
    case FORINT = 'HUF';

    /**
     * Ghana Cedi (GHS)
     *
     * Ghana Cedi
     */
    case GHANA_CEDI = 'GHS';

    /**
     * Gibraltar Pound (GIP)
     *
     * Gibraltar Pound
     */
    case GIBRALTAR_POUND = 'GIP';

    /**
     * Gold (XAU)
     *
     * Gold
     */
    case GOLD = 'XAU';

    /**
     * Gourde (HTG)
     *
     * Gourde
     */
    case GOURDE = 'HTG';

    /**
     * Guarani (PYG)
     *
     * Guarani
     */
    case GUARANI = 'PYG';

    /**
     * Guinean Franc (GNF)
     *
     * Guinean Franc
     */
    case GUINEAN_FRANC = 'GNF';

    /**
     * Guyana Dollar (GYD)
     *
     * Guyana Dollar
     */
    case GUYANA_DOLLAR = 'GYD';

    /**
     * Hong Kong Dollar (HKD)
     *
     * Hong Kong Dollar
     */
    case HONG_KONG_DOLLAR = 'HKD';

    /**
     * Hryvnia (UAH)
     *
     * Hryvnia
     */
    case HRYVNIA = 'UAH';

    /**
     * Iceland Krona (ISK)
     *
     * Iceland Krona
     */
    case ICELAND_KRONA = 'ISK';

    /**
     * Indian Rupee (INR)
     *
     * Indian Rupee
     */
    case INDIAN_RUPEE = 'INR';

    /**
     * Iranian Rial (IRR)
     *
     * Iranian Rial
     */
    case IRANIAN_RIAL = 'IRR';

    /**
     * Iraqi Dinar (IQD)
     *
     * Iraqi Dinar
     */
    case IRAQI_DINAR = 'IQD';

    /**
     * Jamaican Dollar (JMD)
     *
     * Jamaican Dollar
     */
    case JAMAICAN_DOLLAR = 'JMD';

    /**
     * Jordanian Dinar (JOD)
     *
     * Jordanian Dinar
     */
    case JORDANIAN_DINAR = 'JOD';

    /**
     * Kenyan Shilling (KES)
     *
     * Kenyan Shilling
     */
    case KENYAN_SHILLING = 'KES';

    /**
     * Kina (PGK)
     *
     * Kina
     */
    case KINA = 'PGK';

    /**
     * Kuna (HRK)
     *
     * Kuna
     */
    case KUNA = 'HRK';

    /**
     * Kuwaiti Dinar (KWD)
     *
     * Kuwaiti Dinar
     */
    case KUWAITI_DINAR = 'KWD';

    /**
     * Kwanza (AOA)
     *
     * Kwanza
     */
    case KWANZA = 'AOA';

    /**
     * Kyat (MMK)
     *
     * Kyat
     */
    case KYAT = 'MMK';

    /**
     * Lao Kip (LAK)
     *
     * Lao Kip
     */
    case LAO_KIP = 'LAK';

    /**
     * Lari (GEL)
     *
     * Lari
     */
    case LARI = 'GEL';

    /**
     * Lebanese Pound (LBP)
     *
     * Lebanese Pound
     */
    case LEBANESE_POUND = 'LBP';

    /**
     * Lek (ALL)
     *
     * Lek
     */
    case LEK = 'ALL';

    /**
     * Lempira (HNL)
     *
     * Lempira
     */
    case LEMPIRA = 'HNL';

    /**
     * Leone (SLL)
     *
     * Leone
     */
    case LEONE = 'SLL';

    /**
     * Liberian Dollar (LRD)
     *
     * Liberian Dollar
     */
    case LIBERIAN_DOLLAR = 'LRD';

    /**
     * Libyan Dinar (LYD)
     *
     * Libyan Dinar
     */
    case LIBYAN_DINAR = 'LYD';

    /**
     * Lilangeni (SZL)
     *
     * Lilangeni
     */
    case LILANGENI = 'SZL';

    /**
     * Loti (LSL)
     *
     * Loti
     */
    case LOTI = 'LSL';

    /**
     * Malagasy Ariary (MGA)
     *
     * Malagasy Ariary
     */
    case MALAGASY_ARIARY = 'MGA';

    /**
     * Malawi Kwacha (MWK)
     *
     * Malawi Kwacha
     */
    case MALAWI_KWACHA = 'MWK';

    /**
     * Malaysian Ringgit (MYR)
     *
     * Malaysian Ringgit
     */
    case MALAYSIAN_RINGGIT = 'MYR';

    /**
     * Mauritius Rupee (MUR)
     *
     * Mauritius Rupee
     */
    case MAURITIUS_RUPEE = 'MUR';

    /**
     * Mexican Peso (MXN)
     *
     * Mexican Peso
     */
    case MEXICAN_PESO = 'MXN';

    /**
     * Mexican Unidad de Inversion (UDI) (MXV)
     *
     * Mexican Unidad de Inversion (UDI)
     */
    case MEXICAN_UNIDAD_DE_INVERSION_UDI = 'MXV';

    /**
     * Moldovan Leu (MDL)
     *
     * Moldovan Leu
     */
    case MOLDOVAN_LEU = 'MDL';

    /**
     * Moroccan Dirham (MAD)
     *
     * Moroccan Dirham
     */
    case MOROCCAN_DIRHAM = 'MAD';

    /**
     * Mozambique Metical (MZN)
     *
     * Mozambique Metical
     */
    case MOZAMBIQUE_METICAL = 'MZN';

    /**
     * Mvdol (BOV)
     *
     * Mvdol
     */
    case MVDOL = 'BOV';

    /**
     * Naira (NGN)
     *
     * Naira
     */
    case NAIRA = 'NGN';

    /**
     * Nakfa (ERN)
     *
     * Nakfa
     */
    case NAKFA = 'ERN';

    /**
     * Namibia Dollar (NAD)
     *
     * Namibia Dollar
     */
    case NAMIBIA_DOLLAR = 'NAD';

    /**
     * Nepalese Rupee (NPR)
     *
     * Nepalese Rupee
     */
    case NEPALESE_RUPEE = 'NPR';

    /**
     * Netherlands Antillean Guilder (ANG)
     *
     * Netherlands Antillean Guilder
     */
    case NETHERLANDS_ANTILLEAN_GUILDER = 'ANG';

    /**
     * New Israeli Sheqel (ILS)
     *
     * New Israeli Sheqel
     */
    case NEW_ISRAELI_SHEQEL = 'ILS';

    /**
     * New Taiwan Dollar (TWD)
     *
     * New Taiwan Dollar
     */
    case NEW_TAIWAN_DOLLAR = 'TWD';

    /**
     * New Zealand Dollar (NZD)
     *
     * New Zealand Dollar
     */
    case NEW_ZEALAND_DOLLAR = 'NZD';

    /**
     * Ngultrum (BTN)
     *
     * Ngultrum
     */
    case NGULTRUM = 'BTN';

    /**
     * North Korean Won (KPW)
     *
     * North Korean Won
     */
    case NORTH_KOREAN_WON = 'KPW';

    /**
     * Norwegian Krone (NOK)
     *
     * Norwegian Krone
     */
    case NORWEGIAN_KRONE = 'NOK';

    /**
     * Ouguiya (MRU)
     *
     * Ouguiya
     */
    case OUGUIYA = 'MRU';

    /**
     * Pakistan Rupee (PKR)
     *
     * Pakistan Rupee
     */
    case PAKISTAN_RUPEE = 'PKR';

    /**
     * Palladium (XPD)
     *
     * Palladium
     */
    case PALLADIUM = 'XPD';

    /**
     * Pataca (MOP)
     *
     * Pataca
     */
    case PATACA = 'MOP';

    /**
     * Pa’anga (TOP)
     *
     * Pa’anga
     */
    case PAANGA = 'TOP';

    /**
     * Peso Convertible (CUC)
     *
     * Peso Convertible
     */
    case PESO_CONVERTIBLE = 'CUC';

    /**
     * Peso Uruguayo (UYU)
     *
     * Peso Uruguayo
     */
    case PESO_URUGUAYO = 'UYU';

    /**
     * Philippine Peso (PHP)
     *
     * Philippine Peso
     */
    case PHILIPPINE_PESO = 'PHP';

    /**
     * Platinum (XPT)
     *
     * Platinum
     */
    case PLATINUM = 'XPT';

    /**
     * Pound Sterling (GBP)
     *
     * Pound Sterling
     */
    case POUND_STERLING = 'GBP';

    /**
     * Pula (BWP)
     *
     * Pula
     */
    case PULA = 'BWP';

    /**
     * Qatari Rial (QAR)
     *
     * Qatari Rial
     */
    case QATARI_RIAL = 'QAR';

    /**
     * Quetzal (GTQ)
     *
     * Quetzal
     */
    case QUETZAL = 'GTQ';

    /**
     * Rand (ZAR)
     *
     * Rand
     */
    case RAND = 'ZAR';

    /**
     * Rial Omani (OMR)
     *
     * Rial Omani
     */
    case RIAL_OMANI = 'OMR';

    /**
     * Riel (KHR)
     *
     * Riel
     */
    case RIEL = 'KHR';

    /**
     * Romanian Leu (RON)
     *
     * Romanian Leu
     */
    case ROMANIAN_LEU = 'RON';

    /**
     * Rufiyaa (MVR)
     *
     * Rufiyaa
     */
    case RUFIYAA = 'MVR';

    /**
     * Rupiah (IDR)
     *
     * Rupiah
     */
    case RUPIAH = 'IDR';

    /**
     * Russian Ruble (RUB)
     *
     * Russian Ruble
     */
    case RUSSIAN_RUBLE = 'RUB';

    /**
     * Rwanda Franc (RWF)
     *
     * Rwanda Franc
     */
    case RWANDA_FRANC = 'RWF';

    /**
     * Saint Helena Pound (SHP)
     *
     * Saint Helena Pound
     */
    case SAINT_HELENA_POUND = 'SHP';

    /**
     * Saudi Riyal (SAR)
     *
     * Saudi Riyal
     */
    case SAUDI_RIYAL = 'SAR';

    /**
     * SDR (Special Drawing Right) (XDR)
     *
     * SDR (Special Drawing Right)
     */
    case SDR_SPECIAL_DRAWING_RIGHT = 'XDR';

    /**
     * Serbian Dinar (RSD)
     *
     * Serbian Dinar
     */
    case SERBIAN_DINAR = 'RSD';

    /**
     * Seychelles Rupee (SCR)
     *
     * Seychelles Rupee
     */
    case SEYCHELLES_RUPEE = 'SCR';

    /**
     * Silver (XAG)
     *
     * Silver
     */
    case SILVER = 'XAG';

    /**
     * Singapore Dollar (SGD)
     *
     * Singapore Dollar
     */
    case SINGAPORE_DOLLAR = 'SGD';

    /**
     * Sol (PEN)
     *
     * Sol
     */
    case SOL = 'PEN';

    /**
     * Solomon Islands Dollar (SBD)
     *
     * Solomon Islands Dollar
     */
    case SOLOMON_ISLANDS_DOLLAR = 'SBD';

    /**
     * Som (KGS)
     *
     * Som
     */
    case SOM = 'KGS';

    /**
     * Somali Shilling (SOS)
     *
     * Somali Shilling
     */
    case SOMALI_SHILLING = 'SOS';

    /**
     * Somoni (TJS)
     *
     * Somoni
     */
    case SOMONI = 'TJS';

    /**
     * South Sudanese Pound (SSP)
     *
     * South Sudanese Pound
     */
    case SOUTH_SUDANESE_POUND = 'SSP';

    /**
     * Sri Lanka Rupee (LKR)
     *
     * Sri Lanka Rupee
     */
    case SRI_LANKA_RUPEE = 'LKR';

    /**
     * Sucre (XSU)
     *
     * Sucre
     */
    case SUCRE = 'XSU';

    /**
     * Sudanese Pound (SDG)
     *
     * Sudanese Pound
     */
    case SUDANESE_POUND = 'SDG';

    /**
     * Surinam Dollar (SRD)
     *
     * Surinam Dollar
     */
    case SURINAM_DOLLAR = 'SRD';

    /**
     * Swedish Krona (SEK)
     *
     * Swedish Krona
     */
    case SWEDISH_KRONA = 'SEK';

    /**
     * Swiss Franc (CHF)
     *
     * Swiss Franc
     */
    case SWISS_FRANC = 'CHF';

    /**
     * Syrian Pound (SYP)
     *
     * Syrian Pound
     */
    case SYRIAN_POUND = 'SYP';

    /**
     * Taka (BDT)
     *
     * Taka
     */
    case TAKA = 'BDT';

    /**
     * Tala (WST)
     *
     * Tala
     */
    case TALA = 'WST';

    /**
     * Tanzanian Shilling (TZS)
     *
     * Tanzanian Shilling
     */
    case TANZANIAN_SHILLING = 'TZS';

    /**
     * Tenge (KZT)
     *
     * Tenge
     */
    case TENGE = 'KZT';

    /**
     * The codes assigned for transactions where no currency is involved (XXX)
     *
     * The codes assigned for transactions where no currency is involved
     */
    case THE_CODES_ASSIGNED_FOR_TRANSACTIONS_WHERE_NO_CURRENCY_IS_INVOLVED = 'XXX';

    /**
     * Trinidad and Tobago Dollar (TTD)
     *
     * Trinidad and Tobago Dollar
     */
    case TRINIDAD_AND_TOBAGO_DOLLAR = 'TTD';

    /**
     * Tugrik (MNT)
     *
     * Tugrik
     */
    case TUGRIK = 'MNT';

    /**
     * Tunisian Dinar (TND)
     *
     * Tunisian Dinar
     */
    case TUNISIAN_DINAR = 'TND';

    /**
     * Turkish Lira (TRY)
     *
     * Turkish Lira
     */
    case TURKISH_LIRA = 'TRY';

    /**
     * Turkmenistan New Manat (TMT)
     *
     * Turkmenistan New Manat
     */
    case TURKMENISTAN_NEW_MANAT = 'TMT';

    /**
     * UAE Dirham (AED)
     *
     * UAE Dirham
     */
    case UAE_DIRHAM = 'AED';

    /**
     * Uganda Shilling (UGX)
     *
     * Uganda Shilling
     */
    case UGANDA_SHILLING = 'UGX';

    /**
     * Unidad de Fomento (CLF)
     *
     * Unidad de Fomento
     */
    case UNIDAD_DE_FOMENTO = 'CLF';

    /**
     * Unidad de Valor Real (COU)
     *
     * Unidad de Valor Real
     */
    case UNIDAD_DE_VALOR_REAL = 'COU';

    /**
     * Unidad Previsional (UYW)
     *
     * Unidad Previsional
     */
    case UNIDAD_PREVISIONAL = 'UYW';

    /**
     * Uruguay Peso en Unidades Indexadas (UI) (UYI)
     *
     * Uruguay Peso en Unidades Indexadas (UI)
     */
    case URUGUAY_PESO_EN_UNIDADES_INDEXADAS_UI = 'UYI';

    /**
     * US Dollar (USD)
     *
     * US Dollar
     */
    case US_DOLLAR = 'USD';

    /**
     * US Dollar (Next day) (USN)
     *
     * US Dollar (Next day)
     */
    case US_DOLLAR_NEXT_DAY = 'USN';

    /**
     * Uzbekistan Sum (UZS)
     *
     * Uzbekistan Sum
     */
    case UZBEKISTAN_SUM = 'UZS';

    /**
     * Vatu (VUV)
     *
     * Vatu
     */
    case VATU = 'VUV';

    /**
     * WIR Euro (CHE)
     *
     * WIR Euro
     */
    case WIR_EURO = 'CHE';

    /**
     * WIR Franc (CHW)
     *
     * WIR Franc
     */
    case WIR_FRANC = 'CHW';

    /**
     * Won (KRW)
     *
     * Won
     */
    case WON = 'KRW';

    /**
     * Yemeni Rial (YER)
     *
     * Yemeni Rial
     */
    case YEMENI_RIAL = 'YER';

    /**
     * Yen (JPY)
     *
     * Yen
     */
    case YEN = 'JPY';

    /**
     * Yuan Renminbi (CNY)
     *
     * Yuan Renminbi
     */
    case YUAN_RENMINBI = 'CNY';

    /**
     * Zambian Kwacha (ZMW)
     *
     * Zambian Kwacha
     */
    case ZAMBIAN_KWACHA = 'ZMW';

    /**
     * Zimbabwe Dollar (ZWL)
     *
     * Zimbabwe Dollar
     */
    case ZIMBABWE_DOLLAR = 'ZWL';

    /**
     * Zloty (PLN)
     *
     * Zloty
     */
    case ZLOTY = 'PLN';

    /**
     * Returns the caption of the code
     *
     * @return string
     * @codeCoverageIgnore
     */
    final public function getCaption(): string
    {
        return match ($this) {
            InvoiceSuiteCodelistCurrencyCodes::ADB_UNIT_OF_ACCOUNT => 'ADB Unit of Account',
            InvoiceSuiteCodelistCurrencyCodes::AFGHANI => 'Afghani',
            InvoiceSuiteCodelistCurrencyCodes::ALGERIAN_DINAR => 'Algerian Dinar',
            InvoiceSuiteCodelistCurrencyCodes::ARGENTINE_PESO => 'Argentine Peso',
            InvoiceSuiteCodelistCurrencyCodes::ARMENIAN_DRAM => 'Armenian Dram',
            InvoiceSuiteCodelistCurrencyCodes::ARUBAN_FLORIN => 'Aruban Florin',
            InvoiceSuiteCodelistCurrencyCodes::AUSTRALIAN_DOLLAR => 'Australian Dollar',
            InvoiceSuiteCodelistCurrencyCodes::AZERBAIJAN_MANAT => 'Azerbaijan Manat',
            InvoiceSuiteCodelistCurrencyCodes::BAHAMIAN_DOLLAR => 'Bahamian Dollar',
            InvoiceSuiteCodelistCurrencyCodes::BAHRAINI_DINAR => 'Bahraini Dinar',
            InvoiceSuiteCodelistCurrencyCodes::BAHT => 'Baht',
            InvoiceSuiteCodelistCurrencyCodes::BALBOA => 'Balboa',
            InvoiceSuiteCodelistCurrencyCodes::BARBADOS_DOLLAR => 'Barbados Dollar',
            InvoiceSuiteCodelistCurrencyCodes::BELARUSIAN_RUBLE => 'Belarusian Ruble',
            InvoiceSuiteCodelistCurrencyCodes::BELIZE_DOLLAR => 'Belize Dollar',
            InvoiceSuiteCodelistCurrencyCodes::BERMUDIAN_DOLLAR => 'Bermudian Dollar',
            InvoiceSuiteCodelistCurrencyCodes::BOLIVIANO => 'Boliviano',
            InvoiceSuiteCodelistCurrencyCodes::BOLVAR_SOBERANO => 'Bolívar Soberano',
            InvoiceSuiteCodelistCurrencyCodes::BOND_MARKETS_UNIT_EUROPEAN_COMPOSITE_UNIT_EURCO => 'Bond Markets Unit European Composite Unit (EURCO)',
            InvoiceSuiteCodelistCurrencyCodes::BOND_MARKETS_UNIT_EUROPEAN_MONETARY_UNIT_EMU => 'Bond Markets Unit European Monetary Unit (E.M.U.-6)',
            InvoiceSuiteCodelistCurrencyCodes::BOND_MARKETS_UNIT_EUROPEAN_UNIT_OF_ACCOUNT__EUA => 'Bond Markets Unit European Unit of Account 17 (E.U.A.-17)',
            InvoiceSuiteCodelistCurrencyCodes::BRAZILIAN_REAL => 'Brazilian Real',
            InvoiceSuiteCodelistCurrencyCodes::BRUNEI_DOLLAR => 'Brunei Dollar',
            InvoiceSuiteCodelistCurrencyCodes::BULGARIAN_LEV => 'Bulgarian Lev',
            InvoiceSuiteCodelistCurrencyCodes::BURUNDI_FRANC => 'Burundi Franc',
            InvoiceSuiteCodelistCurrencyCodes::CABO_VERDE_ESCUDO => 'Cabo Verde Escudo',
            InvoiceSuiteCodelistCurrencyCodes::CANADIAN_DOLLAR => 'Canadian Dollar',
            InvoiceSuiteCodelistCurrencyCodes::CAYMAN_ISLANDS_DOLLAR => 'Cayman Islands Dollar',
            InvoiceSuiteCodelistCurrencyCodes::CFA_FRANC_BCEAO => 'CFA Franc BCEAO',
            InvoiceSuiteCodelistCurrencyCodes::CFA_FRANC_BEAC => 'CFA Franc BEAC',
            InvoiceSuiteCodelistCurrencyCodes::CFP_FRANC => 'CFP Franc',
            InvoiceSuiteCodelistCurrencyCodes::CHILEAN_PESO => 'Chilean Peso',
            InvoiceSuiteCodelistCurrencyCodes::CODES_SPECIFICALLY_RESERVED_FOR_TESTING_PURPOSES => 'Codes specifically reserved for testing purposes',
            InvoiceSuiteCodelistCurrencyCodes::COLOMBIAN_PESO => 'Colombian Peso',
            InvoiceSuiteCodelistCurrencyCodes::COMORIAN_FRANC => 'Comorian Franc',
            InvoiceSuiteCodelistCurrencyCodes::CONGOLESE_FRANC => 'Congolese Franc',
            InvoiceSuiteCodelistCurrencyCodes::CONVERTIBLE_MARK => 'Convertible Mark',
            InvoiceSuiteCodelistCurrencyCodes::CORDOBA_ORO => 'Cordoba Oro',
            InvoiceSuiteCodelistCurrencyCodes::COSTA_RICAN_COLON => 'Costa Rican Colon',
            InvoiceSuiteCodelistCurrencyCodes::CUBAN_PESO => 'Cuban Peso',
            InvoiceSuiteCodelistCurrencyCodes::CZECH_KORUNA => 'Czech Koruna',
            InvoiceSuiteCodelistCurrencyCodes::DALASI => 'Dalasi',
            InvoiceSuiteCodelistCurrencyCodes::DANISH_KRONE => 'Danish Krone',
            InvoiceSuiteCodelistCurrencyCodes::DENAR => 'Denar',
            InvoiceSuiteCodelistCurrencyCodes::DJIBOUTI_FRANC => 'Djibouti Franc',
            InvoiceSuiteCodelistCurrencyCodes::DOBRA => 'Dobra',
            InvoiceSuiteCodelistCurrencyCodes::DOMINICAN_PESO => 'Dominican Peso',
            InvoiceSuiteCodelistCurrencyCodes::DONG => 'Dong',
            InvoiceSuiteCodelistCurrencyCodes::EAST_CARIBBEAN_DOLLAR => 'East Caribbean Dollar',
            InvoiceSuiteCodelistCurrencyCodes::EGYPTIAN_POUND => 'Egyptian Pound',
            InvoiceSuiteCodelistCurrencyCodes::EL_SALVADOR_COLON => 'El Salvador Colon',
            InvoiceSuiteCodelistCurrencyCodes::ETHIOPIAN_BIRR => 'Ethiopian Birr',
            InvoiceSuiteCodelistCurrencyCodes::EURO => 'Euro',
            InvoiceSuiteCodelistCurrencyCodes::FALKLAND_ISLANDS_POUND => 'Falkland Islands Pound',
            InvoiceSuiteCodelistCurrencyCodes::FIJI_DOLLAR => 'Fiji Dollar',
            InvoiceSuiteCodelistCurrencyCodes::FORINT => 'Forint',
            InvoiceSuiteCodelistCurrencyCodes::GHANA_CEDI => 'Ghana Cedi',
            InvoiceSuiteCodelistCurrencyCodes::GIBRALTAR_POUND => 'Gibraltar Pound',
            InvoiceSuiteCodelistCurrencyCodes::GOLD => 'Gold',
            InvoiceSuiteCodelistCurrencyCodes::GOURDE => 'Gourde',
            InvoiceSuiteCodelistCurrencyCodes::GUARANI => 'Guarani',
            InvoiceSuiteCodelistCurrencyCodes::GUINEAN_FRANC => 'Guinean Franc',
            InvoiceSuiteCodelistCurrencyCodes::GUYANA_DOLLAR => 'Guyana Dollar',
            InvoiceSuiteCodelistCurrencyCodes::HONG_KONG_DOLLAR => 'Hong Kong Dollar',
            InvoiceSuiteCodelistCurrencyCodes::HRYVNIA => 'Hryvnia',
            InvoiceSuiteCodelistCurrencyCodes::ICELAND_KRONA => 'Iceland Krona',
            InvoiceSuiteCodelistCurrencyCodes::INDIAN_RUPEE => 'Indian Rupee',
            InvoiceSuiteCodelistCurrencyCodes::IRANIAN_RIAL => 'Iranian Rial',
            InvoiceSuiteCodelistCurrencyCodes::IRAQI_DINAR => 'Iraqi Dinar',
            InvoiceSuiteCodelistCurrencyCodes::JAMAICAN_DOLLAR => 'Jamaican Dollar',
            InvoiceSuiteCodelistCurrencyCodes::JORDANIAN_DINAR => 'Jordanian Dinar',
            InvoiceSuiteCodelistCurrencyCodes::KENYAN_SHILLING => 'Kenyan Shilling',
            InvoiceSuiteCodelistCurrencyCodes::KINA => 'Kina',
            InvoiceSuiteCodelistCurrencyCodes::KUNA => 'Kuna',
            InvoiceSuiteCodelistCurrencyCodes::KUWAITI_DINAR => 'Kuwaiti Dinar',
            InvoiceSuiteCodelistCurrencyCodes::KWANZA => 'Kwanza',
            InvoiceSuiteCodelistCurrencyCodes::KYAT => 'Kyat',
            InvoiceSuiteCodelistCurrencyCodes::LAO_KIP => 'Lao Kip',
            InvoiceSuiteCodelistCurrencyCodes::LARI => 'Lari',
            InvoiceSuiteCodelistCurrencyCodes::LEBANESE_POUND => 'Lebanese Pound',
            InvoiceSuiteCodelistCurrencyCodes::LEK => 'Lek',
            InvoiceSuiteCodelistCurrencyCodes::LEMPIRA => 'Lempira',
            InvoiceSuiteCodelistCurrencyCodes::LEONE => 'Leone',
            InvoiceSuiteCodelistCurrencyCodes::LIBERIAN_DOLLAR => 'Liberian Dollar',
            InvoiceSuiteCodelistCurrencyCodes::LIBYAN_DINAR => 'Libyan Dinar',
            InvoiceSuiteCodelistCurrencyCodes::LILANGENI => 'Lilangeni',
            InvoiceSuiteCodelistCurrencyCodes::LOTI => 'Loti',
            InvoiceSuiteCodelistCurrencyCodes::MALAGASY_ARIARY => 'Malagasy Ariary',
            InvoiceSuiteCodelistCurrencyCodes::MALAWI_KWACHA => 'Malawi Kwacha',
            InvoiceSuiteCodelistCurrencyCodes::MALAYSIAN_RINGGIT => 'Malaysian Ringgit',
            InvoiceSuiteCodelistCurrencyCodes::MAURITIUS_RUPEE => 'Mauritius Rupee',
            InvoiceSuiteCodelistCurrencyCodes::MEXICAN_PESO => 'Mexican Peso',
            InvoiceSuiteCodelistCurrencyCodes::MEXICAN_UNIDAD_DE_INVERSION_UDI => 'Mexican Unidad de Inversion (UDI)',
            InvoiceSuiteCodelistCurrencyCodes::MOLDOVAN_LEU => 'Moldovan Leu',
            InvoiceSuiteCodelistCurrencyCodes::MOROCCAN_DIRHAM => 'Moroccan Dirham',
            InvoiceSuiteCodelistCurrencyCodes::MOZAMBIQUE_METICAL => 'Mozambique Metical',
            InvoiceSuiteCodelistCurrencyCodes::MVDOL => 'Mvdol',
            InvoiceSuiteCodelistCurrencyCodes::NAIRA => 'Naira',
            InvoiceSuiteCodelistCurrencyCodes::NAKFA => 'Nakfa',
            InvoiceSuiteCodelistCurrencyCodes::NAMIBIA_DOLLAR => 'Namibia Dollar',
            InvoiceSuiteCodelistCurrencyCodes::NEPALESE_RUPEE => 'Nepalese Rupee',
            InvoiceSuiteCodelistCurrencyCodes::NETHERLANDS_ANTILLEAN_GUILDER => 'Netherlands Antillean Guilder',
            InvoiceSuiteCodelistCurrencyCodes::NEW_ISRAELI_SHEQEL => 'New Israeli Sheqel',
            InvoiceSuiteCodelistCurrencyCodes::NEW_TAIWAN_DOLLAR => 'New Taiwan Dollar',
            InvoiceSuiteCodelistCurrencyCodes::NEW_ZEALAND_DOLLAR => 'New Zealand Dollar',
            InvoiceSuiteCodelistCurrencyCodes::NGULTRUM => 'Ngultrum',
            InvoiceSuiteCodelistCurrencyCodes::NORTH_KOREAN_WON => 'North Korean Won',
            InvoiceSuiteCodelistCurrencyCodes::NORWEGIAN_KRONE => 'Norwegian Krone',
            InvoiceSuiteCodelistCurrencyCodes::OUGUIYA => 'Ouguiya',
            InvoiceSuiteCodelistCurrencyCodes::PAKISTAN_RUPEE => 'Pakistan Rupee',
            InvoiceSuiteCodelistCurrencyCodes::PALLADIUM => 'Palladium',
            InvoiceSuiteCodelistCurrencyCodes::PATACA => 'Pataca',
            InvoiceSuiteCodelistCurrencyCodes::PAANGA => 'Pa’anga',
            InvoiceSuiteCodelistCurrencyCodes::PESO_CONVERTIBLE => 'Peso Convertible',
            InvoiceSuiteCodelistCurrencyCodes::PESO_URUGUAYO => 'Peso Uruguayo',
            InvoiceSuiteCodelistCurrencyCodes::PHILIPPINE_PESO => 'Philippine Peso',
            InvoiceSuiteCodelistCurrencyCodes::PLATINUM => 'Platinum',
            InvoiceSuiteCodelistCurrencyCodes::POUND_STERLING => 'Pound Sterling',
            InvoiceSuiteCodelistCurrencyCodes::PULA => 'Pula',
            InvoiceSuiteCodelistCurrencyCodes::QATARI_RIAL => 'Qatari Rial',
            InvoiceSuiteCodelistCurrencyCodes::QUETZAL => 'Quetzal',
            InvoiceSuiteCodelistCurrencyCodes::RAND => 'Rand',
            InvoiceSuiteCodelistCurrencyCodes::RIAL_OMANI => 'Rial Omani',
            InvoiceSuiteCodelistCurrencyCodes::RIEL => 'Riel',
            InvoiceSuiteCodelistCurrencyCodes::ROMANIAN_LEU => 'Romanian Leu',
            InvoiceSuiteCodelistCurrencyCodes::RUFIYAA => 'Rufiyaa',
            InvoiceSuiteCodelistCurrencyCodes::RUPIAH => 'Rupiah',
            InvoiceSuiteCodelistCurrencyCodes::RUSSIAN_RUBLE => 'Russian Ruble',
            InvoiceSuiteCodelistCurrencyCodes::RWANDA_FRANC => 'Rwanda Franc',
            InvoiceSuiteCodelistCurrencyCodes::SAINT_HELENA_POUND => 'Saint Helena Pound',
            InvoiceSuiteCodelistCurrencyCodes::SAUDI_RIYAL => 'Saudi Riyal',
            InvoiceSuiteCodelistCurrencyCodes::SDR_SPECIAL_DRAWING_RIGHT => 'SDR (Special Drawing Right)',
            InvoiceSuiteCodelistCurrencyCodes::SERBIAN_DINAR => 'Serbian Dinar',
            InvoiceSuiteCodelistCurrencyCodes::SEYCHELLES_RUPEE => 'Seychelles Rupee',
            InvoiceSuiteCodelistCurrencyCodes::SILVER => 'Silver',
            InvoiceSuiteCodelistCurrencyCodes::SINGAPORE_DOLLAR => 'Singapore Dollar',
            InvoiceSuiteCodelistCurrencyCodes::SOL => 'Sol',
            InvoiceSuiteCodelistCurrencyCodes::SOLOMON_ISLANDS_DOLLAR => 'Solomon Islands Dollar',
            InvoiceSuiteCodelistCurrencyCodes::SOM => 'Som',
            InvoiceSuiteCodelistCurrencyCodes::SOMALI_SHILLING => 'Somali Shilling',
            InvoiceSuiteCodelistCurrencyCodes::SOMONI => 'Somoni',
            InvoiceSuiteCodelistCurrencyCodes::SOUTH_SUDANESE_POUND => 'South Sudanese Pound',
            InvoiceSuiteCodelistCurrencyCodes::SRI_LANKA_RUPEE => 'Sri Lanka Rupee',
            InvoiceSuiteCodelistCurrencyCodes::SUCRE => 'Sucre',
            InvoiceSuiteCodelistCurrencyCodes::SUDANESE_POUND => 'Sudanese Pound',
            InvoiceSuiteCodelistCurrencyCodes::SURINAM_DOLLAR => 'Surinam Dollar',
            InvoiceSuiteCodelistCurrencyCodes::SWEDISH_KRONA => 'Swedish Krona',
            InvoiceSuiteCodelistCurrencyCodes::SWISS_FRANC => 'Swiss Franc',
            InvoiceSuiteCodelistCurrencyCodes::SYRIAN_POUND => 'Syrian Pound',
            InvoiceSuiteCodelistCurrencyCodes::TAKA => 'Taka',
            InvoiceSuiteCodelistCurrencyCodes::TALA => 'Tala',
            InvoiceSuiteCodelistCurrencyCodes::TANZANIAN_SHILLING => 'Tanzanian Shilling',
            InvoiceSuiteCodelistCurrencyCodes::TENGE => 'Tenge',
            InvoiceSuiteCodelistCurrencyCodes::THE_CODES_ASSIGNED_FOR_TRANSACTIONS_WHERE_NO_CURRENCY_IS_INVOLVED => 'The codes assigned for transactions where no currency is involved',
            InvoiceSuiteCodelistCurrencyCodes::TRINIDAD_AND_TOBAGO_DOLLAR => 'Trinidad and Tobago Dollar',
            InvoiceSuiteCodelistCurrencyCodes::TUGRIK => 'Tugrik',
            InvoiceSuiteCodelistCurrencyCodes::TUNISIAN_DINAR => 'Tunisian Dinar',
            InvoiceSuiteCodelistCurrencyCodes::TURKISH_LIRA => 'Turkish Lira',
            InvoiceSuiteCodelistCurrencyCodes::TURKMENISTAN_NEW_MANAT => 'Turkmenistan New Manat',
            InvoiceSuiteCodelistCurrencyCodes::UAE_DIRHAM => 'UAE Dirham',
            InvoiceSuiteCodelistCurrencyCodes::UGANDA_SHILLING => 'Uganda Shilling',
            InvoiceSuiteCodelistCurrencyCodes::UNIDAD_DE_FOMENTO => 'Unidad de Fomento',
            InvoiceSuiteCodelistCurrencyCodes::UNIDAD_DE_VALOR_REAL => 'Unidad de Valor Real',
            InvoiceSuiteCodelistCurrencyCodes::UNIDAD_PREVISIONAL => 'Unidad Previsional',
            InvoiceSuiteCodelistCurrencyCodes::URUGUAY_PESO_EN_UNIDADES_INDEXADAS_UI => 'Uruguay Peso en Unidades Indexadas (UI)',
            InvoiceSuiteCodelistCurrencyCodes::US_DOLLAR => 'US Dollar',
            InvoiceSuiteCodelistCurrencyCodes::US_DOLLAR_NEXT_DAY => 'US Dollar (Next day)',
            InvoiceSuiteCodelistCurrencyCodes::UZBEKISTAN_SUM => 'Uzbekistan Sum',
            InvoiceSuiteCodelistCurrencyCodes::VATU => 'Vatu',
            InvoiceSuiteCodelistCurrencyCodes::WIR_EURO => 'WIR Euro',
            InvoiceSuiteCodelistCurrencyCodes::WIR_FRANC => 'WIR Franc',
            InvoiceSuiteCodelistCurrencyCodes::WON => 'Won',
            InvoiceSuiteCodelistCurrencyCodes::YEMENI_RIAL => 'Yemeni Rial',
            InvoiceSuiteCodelistCurrencyCodes::YEN => 'Yen',
            InvoiceSuiteCodelistCurrencyCodes::YUAN_RENMINBI => 'Yuan Renminbi',
            InvoiceSuiteCodelistCurrencyCodes::ZAMBIAN_KWACHA => 'Zambian Kwacha',
            InvoiceSuiteCodelistCurrencyCodes::ZIMBABWE_DOLLAR => 'Zimbabwe Dollar',
            InvoiceSuiteCodelistCurrencyCodes::ZLOTY => 'Zloty',
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
            InvoiceSuiteCodelistCurrencyCodes::ADB_UNIT_OF_ACCOUNT => 'ADB Unit of Account',
            InvoiceSuiteCodelistCurrencyCodes::AFGHANI => 'Afghani',
            InvoiceSuiteCodelistCurrencyCodes::ALGERIAN_DINAR => 'Algerian Dinar',
            InvoiceSuiteCodelistCurrencyCodes::ARGENTINE_PESO => 'Argentine Peso',
            InvoiceSuiteCodelistCurrencyCodes::ARMENIAN_DRAM => 'Armenian Dram',
            InvoiceSuiteCodelistCurrencyCodes::ARUBAN_FLORIN => 'Aruban Florin',
            InvoiceSuiteCodelistCurrencyCodes::AUSTRALIAN_DOLLAR => 'Australian Dollar',
            InvoiceSuiteCodelistCurrencyCodes::AZERBAIJAN_MANAT => 'Azerbaijan Manat',
            InvoiceSuiteCodelistCurrencyCodes::BAHAMIAN_DOLLAR => 'Bahamian Dollar',
            InvoiceSuiteCodelistCurrencyCodes::BAHRAINI_DINAR => 'Bahraini Dinar',
            InvoiceSuiteCodelistCurrencyCodes::BAHT => 'Baht',
            InvoiceSuiteCodelistCurrencyCodes::BALBOA => 'Balboa',
            InvoiceSuiteCodelistCurrencyCodes::BARBADOS_DOLLAR => 'Barbados Dollar',
            InvoiceSuiteCodelistCurrencyCodes::BELARUSIAN_RUBLE => 'Belarusian Ruble',
            InvoiceSuiteCodelistCurrencyCodes::BELIZE_DOLLAR => 'Belize Dollar',
            InvoiceSuiteCodelistCurrencyCodes::BERMUDIAN_DOLLAR => 'Bermudian Dollar',
            InvoiceSuiteCodelistCurrencyCodes::BOLIVIANO => 'Boliviano',
            InvoiceSuiteCodelistCurrencyCodes::BOLVAR_SOBERANO => 'Bolívar Soberano',
            InvoiceSuiteCodelistCurrencyCodes::BOND_MARKETS_UNIT_EUROPEAN_COMPOSITE_UNIT_EURCO => 'Bond Markets Unit European Composite Unit (EURCO)',
            InvoiceSuiteCodelistCurrencyCodes::BOND_MARKETS_UNIT_EUROPEAN_MONETARY_UNIT_EMU => 'Bond Markets Unit European Monetary Unit (E.M.U.-6)',
            InvoiceSuiteCodelistCurrencyCodes::BOND_MARKETS_UNIT_EUROPEAN_UNIT_OF_ACCOUNT__EUA => 'Bond Markets Unit European Unit of Account 17 (E.U.A.-17)',
            InvoiceSuiteCodelistCurrencyCodes::BRAZILIAN_REAL => 'Brazilian Real',
            InvoiceSuiteCodelistCurrencyCodes::BRUNEI_DOLLAR => 'Brunei Dollar',
            InvoiceSuiteCodelistCurrencyCodes::BULGARIAN_LEV => 'Bulgarian Lev',
            InvoiceSuiteCodelistCurrencyCodes::BURUNDI_FRANC => 'Burundi Franc',
            InvoiceSuiteCodelistCurrencyCodes::CABO_VERDE_ESCUDO => 'Cabo Verde Escudo',
            InvoiceSuiteCodelistCurrencyCodes::CANADIAN_DOLLAR => 'Canadian Dollar',
            InvoiceSuiteCodelistCurrencyCodes::CAYMAN_ISLANDS_DOLLAR => 'Cayman Islands Dollar',
            InvoiceSuiteCodelistCurrencyCodes::CFA_FRANC_BCEAO => 'CFA Franc BCEAO',
            InvoiceSuiteCodelistCurrencyCodes::CFA_FRANC_BEAC => 'CFA Franc BEAC',
            InvoiceSuiteCodelistCurrencyCodes::CFP_FRANC => 'CFP Franc',
            InvoiceSuiteCodelistCurrencyCodes::CHILEAN_PESO => 'Chilean Peso',
            InvoiceSuiteCodelistCurrencyCodes::CODES_SPECIFICALLY_RESERVED_FOR_TESTING_PURPOSES => 'Codes specifically reserved for testing purposes',
            InvoiceSuiteCodelistCurrencyCodes::COLOMBIAN_PESO => 'Colombian Peso',
            InvoiceSuiteCodelistCurrencyCodes::COMORIAN_FRANC => 'Comorian Franc',
            InvoiceSuiteCodelistCurrencyCodes::CONGOLESE_FRANC => 'Congolese Franc',
            InvoiceSuiteCodelistCurrencyCodes::CONVERTIBLE_MARK => 'Convertible Mark',
            InvoiceSuiteCodelistCurrencyCodes::CORDOBA_ORO => 'Cordoba Oro',
            InvoiceSuiteCodelistCurrencyCodes::COSTA_RICAN_COLON => 'Costa Rican Colon',
            InvoiceSuiteCodelistCurrencyCodes::CUBAN_PESO => 'Cuban Peso',
            InvoiceSuiteCodelistCurrencyCodes::CZECH_KORUNA => 'Czech Koruna',
            InvoiceSuiteCodelistCurrencyCodes::DALASI => 'Dalasi',
            InvoiceSuiteCodelistCurrencyCodes::DANISH_KRONE => 'Danish Krone',
            InvoiceSuiteCodelistCurrencyCodes::DENAR => 'Denar',
            InvoiceSuiteCodelistCurrencyCodes::DJIBOUTI_FRANC => 'Djibouti Franc',
            InvoiceSuiteCodelistCurrencyCodes::DOBRA => 'Dobra',
            InvoiceSuiteCodelistCurrencyCodes::DOMINICAN_PESO => 'Dominican Peso',
            InvoiceSuiteCodelistCurrencyCodes::DONG => 'Dong',
            InvoiceSuiteCodelistCurrencyCodes::EAST_CARIBBEAN_DOLLAR => 'East Caribbean Dollar',
            InvoiceSuiteCodelistCurrencyCodes::EGYPTIAN_POUND => 'Egyptian Pound',
            InvoiceSuiteCodelistCurrencyCodes::EL_SALVADOR_COLON => 'El Salvador Colon',
            InvoiceSuiteCodelistCurrencyCodes::ETHIOPIAN_BIRR => 'Ethiopian Birr',
            InvoiceSuiteCodelistCurrencyCodes::EURO => 'Euro',
            InvoiceSuiteCodelistCurrencyCodes::FALKLAND_ISLANDS_POUND => 'Falkland Islands Pound',
            InvoiceSuiteCodelistCurrencyCodes::FIJI_DOLLAR => 'Fiji Dollar',
            InvoiceSuiteCodelistCurrencyCodes::FORINT => 'Forint',
            InvoiceSuiteCodelistCurrencyCodes::GHANA_CEDI => 'Ghana Cedi',
            InvoiceSuiteCodelistCurrencyCodes::GIBRALTAR_POUND => 'Gibraltar Pound',
            InvoiceSuiteCodelistCurrencyCodes::GOLD => 'Gold',
            InvoiceSuiteCodelistCurrencyCodes::GOURDE => 'Gourde',
            InvoiceSuiteCodelistCurrencyCodes::GUARANI => 'Guarani',
            InvoiceSuiteCodelistCurrencyCodes::GUINEAN_FRANC => 'Guinean Franc',
            InvoiceSuiteCodelistCurrencyCodes::GUYANA_DOLLAR => 'Guyana Dollar',
            InvoiceSuiteCodelistCurrencyCodes::HONG_KONG_DOLLAR => 'Hong Kong Dollar',
            InvoiceSuiteCodelistCurrencyCodes::HRYVNIA => 'Hryvnia',
            InvoiceSuiteCodelistCurrencyCodes::ICELAND_KRONA => 'Iceland Krona',
            InvoiceSuiteCodelistCurrencyCodes::INDIAN_RUPEE => 'Indian Rupee',
            InvoiceSuiteCodelistCurrencyCodes::IRANIAN_RIAL => 'Iranian Rial',
            InvoiceSuiteCodelistCurrencyCodes::IRAQI_DINAR => 'Iraqi Dinar',
            InvoiceSuiteCodelistCurrencyCodes::JAMAICAN_DOLLAR => 'Jamaican Dollar',
            InvoiceSuiteCodelistCurrencyCodes::JORDANIAN_DINAR => 'Jordanian Dinar',
            InvoiceSuiteCodelistCurrencyCodes::KENYAN_SHILLING => 'Kenyan Shilling',
            InvoiceSuiteCodelistCurrencyCodes::KINA => 'Kina',
            InvoiceSuiteCodelistCurrencyCodes::KUNA => 'Kuna',
            InvoiceSuiteCodelistCurrencyCodes::KUWAITI_DINAR => 'Kuwaiti Dinar',
            InvoiceSuiteCodelistCurrencyCodes::KWANZA => 'Kwanza',
            InvoiceSuiteCodelistCurrencyCodes::KYAT => 'Kyat',
            InvoiceSuiteCodelistCurrencyCodes::LAO_KIP => 'Lao Kip',
            InvoiceSuiteCodelistCurrencyCodes::LARI => 'Lari',
            InvoiceSuiteCodelistCurrencyCodes::LEBANESE_POUND => 'Lebanese Pound',
            InvoiceSuiteCodelistCurrencyCodes::LEK => 'Lek',
            InvoiceSuiteCodelistCurrencyCodes::LEMPIRA => 'Lempira',
            InvoiceSuiteCodelistCurrencyCodes::LEONE => 'Leone',
            InvoiceSuiteCodelistCurrencyCodes::LIBERIAN_DOLLAR => 'Liberian Dollar',
            InvoiceSuiteCodelistCurrencyCodes::LIBYAN_DINAR => 'Libyan Dinar',
            InvoiceSuiteCodelistCurrencyCodes::LILANGENI => 'Lilangeni',
            InvoiceSuiteCodelistCurrencyCodes::LOTI => 'Loti',
            InvoiceSuiteCodelistCurrencyCodes::MALAGASY_ARIARY => 'Malagasy Ariary',
            InvoiceSuiteCodelistCurrencyCodes::MALAWI_KWACHA => 'Malawi Kwacha',
            InvoiceSuiteCodelistCurrencyCodes::MALAYSIAN_RINGGIT => 'Malaysian Ringgit',
            InvoiceSuiteCodelistCurrencyCodes::MAURITIUS_RUPEE => 'Mauritius Rupee',
            InvoiceSuiteCodelistCurrencyCodes::MEXICAN_PESO => 'Mexican Peso',
            InvoiceSuiteCodelistCurrencyCodes::MEXICAN_UNIDAD_DE_INVERSION_UDI => 'Mexican Unidad de Inversion (UDI)',
            InvoiceSuiteCodelistCurrencyCodes::MOLDOVAN_LEU => 'Moldovan Leu',
            InvoiceSuiteCodelistCurrencyCodes::MOROCCAN_DIRHAM => 'Moroccan Dirham',
            InvoiceSuiteCodelistCurrencyCodes::MOZAMBIQUE_METICAL => 'Mozambique Metical',
            InvoiceSuiteCodelistCurrencyCodes::MVDOL => 'Mvdol',
            InvoiceSuiteCodelistCurrencyCodes::NAIRA => 'Naira',
            InvoiceSuiteCodelistCurrencyCodes::NAKFA => 'Nakfa',
            InvoiceSuiteCodelistCurrencyCodes::NAMIBIA_DOLLAR => 'Namibia Dollar',
            InvoiceSuiteCodelistCurrencyCodes::NEPALESE_RUPEE => 'Nepalese Rupee',
            InvoiceSuiteCodelistCurrencyCodes::NETHERLANDS_ANTILLEAN_GUILDER => 'Netherlands Antillean Guilder',
            InvoiceSuiteCodelistCurrencyCodes::NEW_ISRAELI_SHEQEL => 'New Israeli Sheqel',
            InvoiceSuiteCodelistCurrencyCodes::NEW_TAIWAN_DOLLAR => 'New Taiwan Dollar',
            InvoiceSuiteCodelistCurrencyCodes::NEW_ZEALAND_DOLLAR => 'New Zealand Dollar',
            InvoiceSuiteCodelistCurrencyCodes::NGULTRUM => 'Ngultrum',
            InvoiceSuiteCodelistCurrencyCodes::NORTH_KOREAN_WON => 'North Korean Won',
            InvoiceSuiteCodelistCurrencyCodes::NORWEGIAN_KRONE => 'Norwegian Krone',
            InvoiceSuiteCodelistCurrencyCodes::OUGUIYA => 'Ouguiya',
            InvoiceSuiteCodelistCurrencyCodes::PAKISTAN_RUPEE => 'Pakistan Rupee',
            InvoiceSuiteCodelistCurrencyCodes::PALLADIUM => 'Palladium',
            InvoiceSuiteCodelistCurrencyCodes::PATACA => 'Pataca',
            InvoiceSuiteCodelistCurrencyCodes::PAANGA => 'Pa’anga',
            InvoiceSuiteCodelistCurrencyCodes::PESO_CONVERTIBLE => 'Peso Convertible',
            InvoiceSuiteCodelistCurrencyCodes::PESO_URUGUAYO => 'Peso Uruguayo',
            InvoiceSuiteCodelistCurrencyCodes::PHILIPPINE_PESO => 'Philippine Peso',
            InvoiceSuiteCodelistCurrencyCodes::PLATINUM => 'Platinum',
            InvoiceSuiteCodelistCurrencyCodes::POUND_STERLING => 'Pound Sterling',
            InvoiceSuiteCodelistCurrencyCodes::PULA => 'Pula',
            InvoiceSuiteCodelistCurrencyCodes::QATARI_RIAL => 'Qatari Rial',
            InvoiceSuiteCodelistCurrencyCodes::QUETZAL => 'Quetzal',
            InvoiceSuiteCodelistCurrencyCodes::RAND => 'Rand',
            InvoiceSuiteCodelistCurrencyCodes::RIAL_OMANI => 'Rial Omani',
            InvoiceSuiteCodelistCurrencyCodes::RIEL => 'Riel',
            InvoiceSuiteCodelistCurrencyCodes::ROMANIAN_LEU => 'Romanian Leu',
            InvoiceSuiteCodelistCurrencyCodes::RUFIYAA => 'Rufiyaa',
            InvoiceSuiteCodelistCurrencyCodes::RUPIAH => 'Rupiah',
            InvoiceSuiteCodelistCurrencyCodes::RUSSIAN_RUBLE => 'Russian Ruble',
            InvoiceSuiteCodelistCurrencyCodes::RWANDA_FRANC => 'Rwanda Franc',
            InvoiceSuiteCodelistCurrencyCodes::SAINT_HELENA_POUND => 'Saint Helena Pound',
            InvoiceSuiteCodelistCurrencyCodes::SAUDI_RIYAL => 'Saudi Riyal',
            InvoiceSuiteCodelistCurrencyCodes::SDR_SPECIAL_DRAWING_RIGHT => 'SDR (Special Drawing Right)',
            InvoiceSuiteCodelistCurrencyCodes::SERBIAN_DINAR => 'Serbian Dinar',
            InvoiceSuiteCodelistCurrencyCodes::SEYCHELLES_RUPEE => 'Seychelles Rupee',
            InvoiceSuiteCodelistCurrencyCodes::SILVER => 'Silver',
            InvoiceSuiteCodelistCurrencyCodes::SINGAPORE_DOLLAR => 'Singapore Dollar',
            InvoiceSuiteCodelistCurrencyCodes::SOL => 'Sol',
            InvoiceSuiteCodelistCurrencyCodes::SOLOMON_ISLANDS_DOLLAR => 'Solomon Islands Dollar',
            InvoiceSuiteCodelistCurrencyCodes::SOM => 'Som',
            InvoiceSuiteCodelistCurrencyCodes::SOMALI_SHILLING => 'Somali Shilling',
            InvoiceSuiteCodelistCurrencyCodes::SOMONI => 'Somoni',
            InvoiceSuiteCodelistCurrencyCodes::SOUTH_SUDANESE_POUND => 'South Sudanese Pound',
            InvoiceSuiteCodelistCurrencyCodes::SRI_LANKA_RUPEE => 'Sri Lanka Rupee',
            InvoiceSuiteCodelistCurrencyCodes::SUCRE => 'Sucre',
            InvoiceSuiteCodelistCurrencyCodes::SUDANESE_POUND => 'Sudanese Pound',
            InvoiceSuiteCodelistCurrencyCodes::SURINAM_DOLLAR => 'Surinam Dollar',
            InvoiceSuiteCodelistCurrencyCodes::SWEDISH_KRONA => 'Swedish Krona',
            InvoiceSuiteCodelistCurrencyCodes::SWISS_FRANC => 'Swiss Franc',
            InvoiceSuiteCodelistCurrencyCodes::SYRIAN_POUND => 'Syrian Pound',
            InvoiceSuiteCodelistCurrencyCodes::TAKA => 'Taka',
            InvoiceSuiteCodelistCurrencyCodes::TALA => 'Tala',
            InvoiceSuiteCodelistCurrencyCodes::TANZANIAN_SHILLING => 'Tanzanian Shilling',
            InvoiceSuiteCodelistCurrencyCodes::TENGE => 'Tenge',
            InvoiceSuiteCodelistCurrencyCodes::THE_CODES_ASSIGNED_FOR_TRANSACTIONS_WHERE_NO_CURRENCY_IS_INVOLVED => 'The codes assigned for transactions where no currency is involved',
            InvoiceSuiteCodelistCurrencyCodes::TRINIDAD_AND_TOBAGO_DOLLAR => 'Trinidad and Tobago Dollar',
            InvoiceSuiteCodelistCurrencyCodes::TUGRIK => 'Tugrik',
            InvoiceSuiteCodelistCurrencyCodes::TUNISIAN_DINAR => 'Tunisian Dinar',
            InvoiceSuiteCodelistCurrencyCodes::TURKISH_LIRA => 'Turkish Lira',
            InvoiceSuiteCodelistCurrencyCodes::TURKMENISTAN_NEW_MANAT => 'Turkmenistan New Manat',
            InvoiceSuiteCodelistCurrencyCodes::UAE_DIRHAM => 'UAE Dirham',
            InvoiceSuiteCodelistCurrencyCodes::UGANDA_SHILLING => 'Uganda Shilling',
            InvoiceSuiteCodelistCurrencyCodes::UNIDAD_DE_FOMENTO => 'Unidad de Fomento',
            InvoiceSuiteCodelistCurrencyCodes::UNIDAD_DE_VALOR_REAL => 'Unidad de Valor Real',
            InvoiceSuiteCodelistCurrencyCodes::UNIDAD_PREVISIONAL => 'Unidad Previsional',
            InvoiceSuiteCodelistCurrencyCodes::URUGUAY_PESO_EN_UNIDADES_INDEXADAS_UI => 'Uruguay Peso en Unidades Indexadas (UI)',
            InvoiceSuiteCodelistCurrencyCodes::US_DOLLAR => 'US Dollar',
            InvoiceSuiteCodelistCurrencyCodes::US_DOLLAR_NEXT_DAY => 'US Dollar (Next day)',
            InvoiceSuiteCodelistCurrencyCodes::UZBEKISTAN_SUM => 'Uzbekistan Sum',
            InvoiceSuiteCodelistCurrencyCodes::VATU => 'Vatu',
            InvoiceSuiteCodelistCurrencyCodes::WIR_EURO => 'WIR Euro',
            InvoiceSuiteCodelistCurrencyCodes::WIR_FRANC => 'WIR Franc',
            InvoiceSuiteCodelistCurrencyCodes::WON => 'Won',
            InvoiceSuiteCodelistCurrencyCodes::YEMENI_RIAL => 'Yemeni Rial',
            InvoiceSuiteCodelistCurrencyCodes::YEN => 'Yen',
            InvoiceSuiteCodelistCurrencyCodes::YUAN_RENMINBI => 'Yuan Renminbi',
            InvoiceSuiteCodelistCurrencyCodes::ZAMBIAN_KWACHA => 'Zambian Kwacha',
            InvoiceSuiteCodelistCurrencyCodes::ZIMBABWE_DOLLAR => 'Zimbabwe Dollar',
            InvoiceSuiteCodelistCurrencyCodes::ZLOTY => 'Zloty',
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
            'https://www.xrepository.de/details/urn:xoev-de:kosit:codeliste:currency-codes',
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
            'https://www.xrepository.de/api/xrepository/urn:xoev-de:kosit:codeliste:currency-codes_3/download/Currency_Codes_3.json',
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
