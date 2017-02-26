-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2017 at 11:38 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ila`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iso` char(2) CHARACTER SET utf16 NOT NULL,
  `name` varchar(80) CHARACTER SET utf16 NOT NULL,
  `nicename` varchar(80) CHARACTER SET utf16 NOT NULL,
  `iso3` char(3) CHARACTER SET utf16 DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `phonecode` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=254 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `iso`, `name`, `nicename`, `iso3`, `numcode`, `phonecode`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4, 93),
(2, 'AL', 'ALBANIA', 'Albania', 'ALB', 8, 355),
(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', 12, 213),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16, 1684),
(5, 'AD', 'ANDORRA', 'Andorra', 'AND', 20, 376),
(6, 'AO', 'ANGOLA', 'Angola', 'AGO', 24, 244),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', 660, 1264),
(8, 'AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL, 0),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28, 1268),
(10, 'AR', 'ARGENTINA', 'Argentina', 'ARG', 32, 54),
(11, 'AM', 'ARMENIA', 'Armenia', 'ARM', 51, 374),
(12, 'AW', 'ARUBA', 'Aruba', 'ABW', 533, 297),
(13, 'AU', 'AUSTRALIA', 'Australia', 'AUS', 36, 61),
(14, 'AT', 'AUSTRIA', 'Austria', 'AUT', 40, 43),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31, 994),
(16, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', 44, 1242),
(17, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', 48, 973),
(18, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50, 880),
(19, 'BB', 'BARBADOS', 'Barbados', 'BRB', 52, 1246),
(20, 'BY', 'BELARUS', 'Belarus', 'BLR', 112, 375),
(21, 'BE', 'BELGIUM', 'Belgium', 'BEL', 56, 32),
(22, 'BZ', 'BELIZE', 'Belize', 'BLZ', 84, 501),
(23, 'BJ', 'BENIN', 'Benin', 'BEN', 204, 229),
(24, 'BM', 'BERMUDA', 'Bermuda', 'BMU', 60, 1441),
(25, 'BT', 'BHUTAN', 'Bhutan', 'BTN', 64, 975),
(26, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', 68, 591),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70, 387),
(28, 'BW', 'BOTSWANA', 'Botswana', 'BWA', 72, 267),
(29, 'BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL, 0),
(30, 'BR', 'BRAZIL', 'Brazil', 'BRA', 76, 55),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL, 246),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96, 673),
(33, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', 100, 359),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854, 226),
(35, 'BI', 'BURUNDI', 'Burundi', 'BDI', 108, 257),
(36, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', 116, 855),
(37, 'CM', 'CAMEROON', 'Cameroon', 'CMR', 120, 237),
(38, 'CA', 'CANADA', 'Canada', 'CAN', 124, 1),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132, 238),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136, 1345),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140, 236),
(42, 'TD', 'CHAD', 'Chad', 'TCD', 148, 235),
(43, 'CL', 'CHILE', 'Chile', 'CHL', 152, 56),
(44, 'CN', 'CHINA', 'China', 'CHN', 156, 86),
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL, 61),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL, 672),
(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', 170, 57),
(48, 'KM', 'COMOROS', 'Comoros', 'COM', 174, 269),
(49, 'CG', 'CONGO', 'Congo', 'COG', 178, 242),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180, 242),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184, 682),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188, 506),
(53, 'CI', 'COTE D''IVOIRE', 'Cote D''Ivoire', 'CIV', 384, 225),
(54, 'HR', 'CROATIA', 'Croatia', 'HRV', 191, 385),
(55, 'CU', 'CUBA', 'Cuba', 'CUB', 192, 53),
(56, 'CY', 'CYPRUS', 'Cyprus', 'CYP', 196, 357),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203, 420),
(58, 'DK', 'DENMARK', 'Denmark', 'DNK', 208, 45),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262, 253),
(60, 'DM', 'DOMINICA', 'Dominica', 'DMA', 212, 1767),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214, 1809),
(62, 'EC', 'ECUADOR', 'Ecuador', 'ECU', 218, 593),
(63, 'EG', 'EGYPT', 'Egypt', 'EGY', 818, 20),
(64, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222, 503),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226, 240),
(66, 'ER', 'ERITREA', 'Eritrea', 'ERI', 232, 291),
(67, 'EE', 'ESTONIA', 'Estonia', 'EST', 233, 372),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231, 251),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238, 500),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234, 298),
(71, 'FJ', 'FIJI', 'Fiji', 'FJI', 242, 679),
(72, 'FI', 'FINLAND', 'Finland', 'FIN', 246, 358),
(73, 'FR', 'FRANCE', 'France', 'FRA', 250, 33),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254, 594),
(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258, 689),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL, 0),
(77, 'GA', 'GABON', 'Gabon', 'GAB', 266, 241),
(78, 'GM', 'GAMBIA', 'Gambia', 'GMB', 270, 220),
(79, 'GE', 'GEORGIA', 'Georgia', 'GEO', 268, 995),
(80, 'DE', 'GERMANY', 'Germany', 'DEU', 276, 49),
(81, 'GH', 'GHANA', 'Ghana', 'GHA', 288, 233),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292, 350),
(83, 'GR', 'GREECE', 'Greece', 'GRC', 300, 30),
(84, 'GL', 'GREENLAND', 'Greenland', 'GRL', 304, 299),
(85, 'GD', 'GRENADA', 'Grenada', 'GRD', 308, 1473),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312, 590),
(87, 'GU', 'GUAM', 'Guam', 'GUM', 316, 1671),
(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', 320, 502),
(89, 'GN', 'GUINEA', 'Guinea', 'GIN', 324, 224),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624, 245),
(91, 'GY', 'GUYANA', 'Guyana', 'GUY', 328, 592),
(92, 'HT', 'HAITI', 'Haiti', 'HTI', 332, 509),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL, 0),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336, 39),
(95, 'HN', 'HONDURAS', 'Honduras', 'HND', 340, 504),
(96, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', 344, 852),
(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', 348, 36),
(98, 'IS', 'ICELAND', 'Iceland', 'ISL', 352, 354),
(99, 'IN', 'INDIA', 'India', 'IND', 356, 91),
(100, 'ID', 'INDONESIA', 'Indonesia', 'IDN', 360, 62),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364, 98),
(102, 'IQ', 'IRAQ', 'Iraq', 'IRQ', 368, 964),
(103, 'IE', 'IRELAND', 'Ireland', 'IRL', 372, 353),
(104, 'IL', 'ISRAEL', 'Israel', 'ISR', 376, 972),
(105, 'IT', 'ITALY', 'Italy', 'ITA', 380, 39),
(106, 'JM', 'JAMAICA', 'Jamaica', 'JAM', 388, 1876),
(107, 'JP', 'JAPAN', 'Japan', 'JPN', 392, 81),
(108, 'JO', 'JORDAN', 'Jordan', 'JOR', 400, 962),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398, 7),
(110, 'KE', 'KENYA', 'Kenya', 'KEN', 404, 254),
(111, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', 296, 686),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE''S REPUBLIC OF', 'Korea, Democratic People''s Republic of', 'PRK', 408, 850),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410, 82),
(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', 414, 965),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417, 996),
(116, 'LA', 'LAO PEOPLE''S DEMOCRATIC REPUBLIC', 'Lao People''s Democratic Republic', 'LAO', 418, 856),
(117, 'LV', 'LATVIA', 'Latvia', 'LVA', 428, 371),
(118, 'LB', 'LEBANON', 'Lebanon', 'LBN', 422, 961),
(119, 'LS', 'LESOTHO', 'Lesotho', 'LSO', 426, 266),
(120, 'LR', 'LIBERIA', 'Liberia', 'LBR', 430, 231),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434, 218),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438, 423),
(123, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', 440, 370),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442, 352),
(125, 'MO', 'MACAO', 'Macao', 'MAC', 446, 853),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807, 389),
(127, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450, 261),
(128, 'MW', 'MALAWI', 'Malawi', 'MWI', 454, 265),
(129, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', 458, 60),
(130, 'MV', 'MALDIVES', 'Maldives', 'MDV', 462, 960),
(131, 'ML', 'MALI', 'Mali', 'MLI', 466, 223),
(132, 'MT', 'MALTA', 'Malta', 'MLT', 470, 356),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584, 692),
(134, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474, 596),
(135, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', 478, 222),
(136, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', 480, 230),
(137, 'YT', 'MAYOTTE', 'Mayotte', NULL, NULL, 269),
(138, 'MX', 'MEXICO', 'Mexico', 'MEX', 484, 52),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583, 691),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498, 373),
(141, 'MC', 'MONACO', 'Monaco', 'MCO', 492, 377),
(142, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', 496, 976),
(143, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500, 1664),
(144, 'MA', 'MOROCCO', 'Morocco', 'MAR', 504, 212),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508, 258),
(146, 'MM', 'MYANMAR', 'Myanmar', 'MMR', 104, 95),
(147, 'NA', 'NAMIBIA', 'Namibia', 'NAM', 516, 264),
(148, 'NR', 'NAURU', 'Nauru', 'NRU', 520, 674),
(149, 'NP', 'NEPAL', 'Nepal', 'NPL', 524, 977),
(150, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528, 31),
(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530, 599),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540, 687),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554, 64),
(154, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558, 505),
(155, 'NE', 'NIGER', 'Niger', 'NER', 562, 227),
(156, 'NG', 'NIGERIA', 'Nigeria', 'NGA', 566, 234),
(157, 'NU', 'NIUE', 'Niue', 'NIU', 570, 683),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574, 672),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580, 1670),
(160, 'NO', 'NORWAY', 'Norway', 'NOR', 578, 47),
(161, 'OM', 'OMAN', 'Oman', 'OMN', 512, 968),
(162, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', 586, 92),
(163, 'PW', 'PALAU', 'Palau', 'PLW', 585, 680),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL, 970),
(165, 'PA', 'PANAMA', 'Panama', 'PAN', 591, 507),
(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598, 675),
(167, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', 600, 595),
(168, 'PE', 'PERU', 'Peru', 'PER', 604, 51),
(169, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', 608, 63),
(170, 'PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612, 0),
(171, 'PL', 'POLAND', 'Poland', 'POL', 616, 48),
(172, 'PT', 'PORTUGAL', 'Portugal', 'PRT', 620, 351),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630, 1787),
(174, 'QA', 'QATAR', 'Qatar', 'QAT', 634, 974),
(175, 'RE', 'REUNION', 'Reunion', 'REU', 638, 262),
(176, 'RO', 'ROMANIA', 'Romania', 'ROM', 642, 40),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643, 70),
(178, 'RW', 'RWANDA', 'Rwanda', 'RWA', 646, 250),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654, 290),
(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659, 1869),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662, 1758),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666, 508),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670, 1784),
(184, 'WS', 'SAMOA', 'Samoa', 'WSM', 882, 684),
(185, 'SM', 'SAN MARINO', 'San Marino', 'SMR', 674, 378),
(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678, 239),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682, 966),
(188, 'SN', 'SENEGAL', 'Senegal', 'SEN', 686, 221),
(189, 'CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL, 381),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690, 248),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694, 232),
(192, 'SG', 'SINGAPORE', 'Singapore', 'SGP', 702, 65),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703, 421),
(194, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', 705, 386),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90, 677),
(196, 'SO', 'SOMALIA', 'Somalia', 'SOM', 706, 252),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710, 27),
(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL, 0),
(199, 'ES', 'SPAIN', 'Spain', 'ESP', 724, 34),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144, 94),
(201, 'SD', 'SUDAN', 'Sudan', 'SDN', 736, 249),
(202, 'SR', 'SURINAME', 'Suriname', 'SUR', 740, 597),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744, 47),
(204, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748, 268),
(205, 'SE', 'SWEDEN', 'Sweden', 'SWE', 752, 46),
(206, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756, 41),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760, 963),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158, 886),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762, 992),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834, 255),
(211, 'TH', 'THAILAND', 'Thailand', 'THA', 764, 66),
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL, 670),
(213, 'TG', 'TOGO', 'Togo', 'TGO', 768, 228),
(214, 'TK', 'TOKELAU', 'Tokelau', 'TKL', 772, 690),
(215, 'TO', 'TONGA', 'Tonga', 'TON', 776, 676),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780, 1868),
(217, 'TN', 'TUNISIA', 'Tunisia', 'TUN', 788, 216),
(218, 'TR', 'TURKEY', 'Turkey', 'TUR', 792, 90),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795, 7370),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796, 1649),
(221, 'TV', 'TUVALU', 'Tuvalu', 'TUV', 798, 688),
(222, 'UG', 'UGANDA', 'Uganda', 'UGA', 800, 256),
(223, 'UA', 'UKRAINE', 'Ukraine', 'UKR', 804, 380),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784, 971),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826, 44),
(226, 'US', 'UNITED STATES', 'United States', 'USA', 840, 1),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL, 1),
(228, 'UY', 'URUGUAY', 'Uruguay', 'URY', 858, 598),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860, 998),
(230, 'VU', 'VANUATU', 'Vanuatu', 'VUT', 548, 678),
(231, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', 862, 58),
(232, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', 704, 84),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92, 1284),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850, 1340),
(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876, 681),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732, 212),
(237, 'YE', 'YEMEN', 'Yemen', 'YEM', 887, 967),
(238, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894, 260),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716, 263),
(240, 'RS', 'SERBIA', 'Serbia', 'SRB', 688, 381),
(241, 'AP', 'ASIA PACIFIC REGION', 'Asia / Pacific Region', '0', 0, 0),
(242, 'ME', 'MONTENEGRO', 'Montenegro', 'MNE', 499, 382),
(243, 'AX', 'ALAND ISLANDS', 'Aland Islands', 'ALA', 248, 358),
(244, 'BQ', 'BONAIRE, SINT EUSTATIUS AND SABA', 'Bonaire, Sint Eustatius and Saba', 'BES', 535, 599),
(245, 'CW', 'CURACAO', 'Curacao', 'CUW', 531, 599),
(246, 'GG', 'GUERNSEY', 'Guernsey', 'GGY', 831, 44),
(247, 'IM', 'ISLE OF MAN', 'Isle of Man', 'IMN', 833, 44),
(248, 'JE', 'JERSEY', 'Jersey', 'JEY', 832, 44),
(249, 'XK', 'KOSOVO', 'Kosovo', '---', 0, 381),
(250, 'BL', 'SAINT BARTHELEMY', 'Saint Barthelemy', 'BLM', 652, 590),
(251, 'MF', 'SAINT MARTIN', 'Saint Martin', 'MAF', 663, 590),
(252, 'SX', 'SINT MAARTEN', 'Sint Maarten', 'SXM', 534, 1),
(253, 'SS', 'SOUTH SUDAN', 'South Sudan', 'SSD', 728, 211);

-- --------------------------------------------------------

--
-- Table structure for table `ila_admin`
--

CREATE TABLE IF NOT EXISTS `ila_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_pass` varchar(200) NOT NULL,
  `contact_email` varchar(200) NOT NULL,
  `last_login_time` datetime NOT NULL,
  `last_login_ip` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ila_admin`
--

INSERT INTO `ila_admin` (`id`, `name`, `user_name`, `user_pass`, `contact_email`, `last_login_time`, `last_login_ip`) VALUES
(1, 'Vivian Nguyen', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'visitsameek@gmail.com', '2017-02-26 11:10:01', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `ila_awards`
--

CREATE TABLE IF NOT EXISTS `ila_awards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `award` varchar(255) NOT NULL,
  `media_id` int(11) NOT NULL,
  `isblocked` smallint(1) NOT NULL DEFAULT '0' COMMENT '0=>not blocked, 1=>blocked',
  `isdeleted` smallint(1) NOT NULL DEFAULT '0' COMMENT ' 0=>not deleted, 1=>deleted',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ila_awards_lang`
--

CREATE TABLE IF NOT EXISTS `ila_awards_lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `award_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf16 NOT NULL,
  `content` text CHARACTER SET utf16 NOT NULL,
  `language_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ila_basic_settings`
--

CREATE TABLE IF NOT EXISTS `ila_basic_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_email` varchar(255) CHARACTER SET utf16 NOT NULL,
  `site_contact_no` varchar(255) CHARACTER SET utf16 NOT NULL,
  `business_hours_weekdays` varchar(255) NOT NULL,
  `business_hours_saturday` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ila_basic_settings`
--

INSERT INTO `ila_basic_settings` (`id`, `site_email`, `site_contact_no`, `business_hours_weekdays`, `business_hours_saturday`, `created_on`) VALUES
(1, 'visitsameek@gmail.com', '+84 901007997', '8:00 am - 9:00 pm', '7:00 am - 7:00 pm', '2017-02-06 01:30:40');

-- --------------------------------------------------------

--
-- Table structure for table `ila_basic_settings_lang`
--

CREATE TABLE IF NOT EXISTS `ila_basic_settings_lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `settings_id` int(11) NOT NULL,
  `site_address` text CHARACTER SET utf16 NOT NULL,
  `content` text CHARACTER SET utf16 NOT NULL,
  `language_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ila_basic_settings_lang`
--

INSERT INTO `ila_basic_settings_lang` (`id`, `settings_id`, `site_address`, `content`, `language_id`) VALUES
(1, 1, '109 - 1965 West 4th Ave. Vancouver,BC Canada, V6J1M8 ', '<p>abcd</p>\r\n', 1),
(2, 1, '109 - 1965 West 4th Ave. Vancouver,BC Canada, V6J1M8 viet', 'về chúng tôi nội dung', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ila_cities`
--

CREATE TABLE IF NOT EXISTS `ila_cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(100) NOT NULL,
  `isblocked` smallint(1) NOT NULL DEFAULT '0' COMMENT '0=>not blocked, 1=>blocked',
  `isdeleted` smallint(1) NOT NULL DEFAULT '0' COMMENT '0=>not deleted, 1=>deleted',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ila_cities`
--

INSERT INTO `ila_cities` (`id`, `city`, `isblocked`, `isdeleted`) VALUES
(1, 'Ho Chi Minh City', 0, 0),
(2, 'Ha Noi', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ila_cities_lang`
--

CREATE TABLE IF NOT EXISTS `ila_cities_lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city_id` int(11) NOT NULL,
  `city_name` varchar(100) CHARACTER SET utf16 NOT NULL,
  `language_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ila_cities_lang`
--

INSERT INTO `ila_cities_lang` (`id`, `city_id`, `city_name`, `language_id`) VALUES
(1, 1, 'Ho Chi Minh City', 1),
(2, 1, 'aaaaaa', 2),
(3, 2, 'Ha Noi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ila_cms_language`
--

CREATE TABLE IF NOT EXISTS `ila_cms_language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cms_page_id` int(11) NOT NULL,
  `title` text CHARACTER SET utf16 NOT NULL,
  `short_desc` text CHARACTER SET utf16 NOT NULL,
  `content` text CHARACTER SET utf16 NOT NULL,
  `language_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `ila_cms_language`
--

INSERT INTO `ila_cms_language` (`id`, `cms_page_id`, `title`, `short_desc`, `content`, `language_id`) VALUES
(1, 1, 'About Us', 'short description', 'long description', 1),
(2, 2, 'Why Choose Us', '', '<br>', 1),
(3, 3, 'NEAS Accreditation', '', '<br>', 1),
(4, 4, '21st Century Learning', '', '<br>', 1),
(5, 5, 'Professional, Certified Teachers', '', '<br>', 1),
(6, 6, 'Learning Guarantees', '', '<br>', 1),
(7, 7, 'Academic Management & Teaching Support', '', '<br>', 1),
(8, 8, 'ILA Welfare, Health & Safety', '', '<br>', 1),
(9, 9, 'Customer Service', '', '<br>', 1),
(10, 10, 'ILA CAFÉ', '', '<br>', 1),
(11, 11, 'Meet Our Teachers', '', '<br>', 1),
(12, 12, 'Carrer with Us', '', '<br>', 1),
(13, 13, 'Beyond English', '', '<br>', 1),
(14, 14, '21C Skills', '', '<br>', 1),
(15, 15, '21C Learning Environment', '', '<br>', 1),
(16, 16, '21C Inspiration', '', '<br>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ila_cms_page`
--

CREATE TABLE IF NOT EXISTS `ila_cms_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` text CHARACTER SET utf16 NOT NULL,
  `page_name` text CHARACTER SET utf16 NOT NULL,
  `media_id` text NOT NULL,
  `videos` text NOT NULL,
  `page_parent` int(11) NOT NULL DEFAULT '0' COMMENT '0=>parent page ',
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '1=>active page/post',
  `sort_order` int(11) NOT NULL DEFAULT '0' COMMENT 'user can set page order',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `ila_cms_page`
--

INSERT INTO `ila_cms_page` (`id`, `slug`, `page_name`, `media_id`, `videos`, `page_parent`, `status`, `sort_order`, `created_on`) VALUES
(1, 'about-us', 'About Us', '1,2', '      <iframe width="560" height="315" src="https://www.youtube.com/embed/0mQLTWvXbXM" frameborder="0" allowfullscreen></iframe>~    <iframe width="560" height="315" src="https://www.youtube.com/embed/JHUrRSBtUNE" frameborder="0" allowfullscreen></iframe>~    <iframe width="560" height="315" src="https://www.youtube.com/embed/O65JHeSDhuc" frameborder="0" allowfullscreen></iframe>', 0, '1', 1, '2017-02-06 10:52:30'),
(2, 'why-choose-us', 'Why Choose Us', '', '', 0, '1', 2, '2017-02-22 10:04:33'),
(3, 'neas-accreditation', 'NEAS Accreditation', '', '', 2, '1', 1, '2017-02-22 10:05:14'),
(4, '21st-century-learning', '21st Century Learning', '', '', 2, '1', 2, '2017-02-22 10:05:41'),
(5, 'professional-certified-teachers', 'Professional, Certified Teachers', '', '', 2, '1', 3, '2017-02-22 10:06:07'),
(6, 'learning-guarantees', 'Learning Guarantees', '', '', 2, '1', 4, '2017-02-22 10:06:27'),
(7, 'academic-management-teaching-support', 'Academic Management & Teaching Support', '', '', 2, '1', 5, '2017-02-22 10:06:51'),
(8, 'ila-welfare-health-safety', 'ILA Welfare, Health & Safety', '', '', 2, '1', 6, '2017-02-22 10:07:21'),
(9, 'customer-service', 'Customer Service', '', '', 2, '1', 7, '2017-02-22 10:07:42'),
(10, 'ila-cafe', 'ILA CAFÉ', '', '', 0, '1', 3, '2017-02-22 10:08:08'),
(11, 'meet-our-teachers', 'Meet Our Teachers', '', '', 0, '1', 4, '2017-02-22 10:08:37'),
(12, 'carrer-with-us', 'Carrer with Us', '', '', 0, '1', 5, '2017-02-22 10:09:14'),
(13, 'beyond-english', 'Beyond English', '', '', 0, '1', 6, '2017-02-22 10:09:59'),
(14, '21c-skills', '21C Skills', '', '', 13, '1', 1, '2017-02-22 10:10:18'),
(15, '21c-learning-environment', '21C Learning Environment', '', '', 13, '1', 2, '2017-02-22 10:10:38'),
(16, '21c-inspiration', '21C Inspiration', '', '', 13, '1', 3, '2017-02-22 10:10:59');

-- --------------------------------------------------------

--
-- Table structure for table `ila_community_networks`
--

CREATE TABLE IF NOT EXISTS `ila_community_networks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `community` varchar(255) NOT NULL,
  `isblocked` smallint(1) NOT NULL DEFAULT '0' COMMENT '0=>not blocked, 1=>blocked',
  `isdeleted` smallint(1) NOT NULL DEFAULT '0' COMMENT '0=>not deleted, 1=>deleted',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ila_community_networks_lang`
--

CREATE TABLE IF NOT EXISTS `ila_community_networks_lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf16 NOT NULL,
  `content` text CHARACTER SET utf16 NOT NULL,
  `language_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ila_core_values`
--

CREATE TABLE IF NOT EXISTS `ila_core_values` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `core_value` text NOT NULL,
  `media_id` int(11) NOT NULL,
  `isblocked` smallint(1) NOT NULL DEFAULT '0' COMMENT '0=>not blocked, 1=>blocked',
  `isdeleted` smallint(1) NOT NULL DEFAULT '0' COMMENT ' 0=>not deleted, 1=>deleted',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ila_core_values_lang`
--

CREATE TABLE IF NOT EXISTS `ila_core_values_lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `core_value_id` int(11) NOT NULL,
  `title` varchar(100) CHARACTER SET utf16 NOT NULL,
  `content` text CHARACTER SET utf16 NOT NULL,
  `language_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ila_courses`
--

CREATE TABLE IF NOT EXISTS `ila_courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `course_category_id` int(11) NOT NULL,
  `age_from` int(11) NOT NULL,
  `age_to` int(11) NOT NULL,
  `isblocked` smallint(1) NOT NULL DEFAULT '0' COMMENT '0=>not blocked, 1=>blocked',
  `isdeleted` smallint(1) NOT NULL DEFAULT '0' COMMENT '0=>not deleted, 1=>deleted',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `ila_courses`
--

INSERT INTO `ila_courses` (`id`, `title`, `course_category_id`, `age_from`, `age_to`, `isblocked`, `isdeleted`) VALUES
(1, 'Jumpstart', 1, 3, 6, 0, 0),
(2, 'Super Juniors', 1, 6, 11, 0, 0),
(3, 'Global English', 2, 0, 0, 0, 0),
(4, 'Smart Teens', 1, 11, 16, 0, 0),
(5, 'Exam English', 2, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ila_course_categories`
--

CREATE TABLE IF NOT EXISTS `ila_course_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  `isblocked` smallint(1) NOT NULL DEFAULT '0' COMMENT '0=>not blocked, 1=>blocked',
  `isdeleted` smallint(1) NOT NULL DEFAULT '0' COMMENT '0=>not deleted, 1=>deleted',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ila_course_categories`
--

INSERT INTO `ila_course_categories` (`id`, `category`, `isblocked`, `isdeleted`) VALUES
(1, 'EY', 0, 0),
(2, 'EA', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ila_course_categories_lang`
--

CREATE TABLE IF NOT EXISTS `ila_course_categories_lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_category_id` int(11) NOT NULL,
  `category_name` varchar(255) CHARACTER SET utf16 NOT NULL,
  `language_id` smallint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `ila_course_categories_lang`
--

INSERT INTO `ila_course_categories_lang` (`id`, `course_category_id`, `category_name`, `language_id`) VALUES
(1, 1, 'EY', 1),
(2, 2, 'wwwww', 2),
(3, 1, 'bbbbb', 2),
(4, 2, 'EA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ila_course_levels`
--

CREATE TABLE IF NOT EXISTS `ila_course_levels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `course_level` varchar(100) NOT NULL,
  `level_name` varchar(100) NOT NULL,
  `duration_hours` double(10,2) NOT NULL,
  `duration_months` double(10,2) NOT NULL,
  `age_from` int(11) NOT NULL,
  `age_to` int(11) NOT NULL,
  `video_link` text NOT NULL,
  `cefr` varchar(50) NOT NULL,
  `cambridge_exam` varchar(50) NOT NULL,
  `ielts` varchar(50) NOT NULL,
  `toefl_ibt` varchar(50) NOT NULL,
  `toeic_reading` varchar(50) NOT NULL,
  `toeic_writing` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ila_course_levels`
--

INSERT INTO `ila_course_levels` (`id`, `course_id`, `course_level`, `level_name`, `duration_hours`, `duration_months`, `age_from`, `age_to`, `video_link`, `cefr`, `cambridge_exam`, `ielts`, `toefl_ibt`, `toeic_reading`, `toeic_writing`) VALUES
(1, 1, 'Level 1', 'Level 1', 74.00, 4.60, 3, 4, '<iframe width="560" height="315" src="https://www.youtube.com/embed/Jis04VOZyEU" frameborder="0" allowfullscreen></iframe>', '', '', '', '', '', ''),
(2, 1, 'Level 2', 'Level 2', 74.00, 4.60, 3, 4, '<iframe width="560" height="315" src="https://www.youtube.com/embed/Jis04VOZyEU" frameborder="0" allowfullscreen></iframe>', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ila_course_level_lang`
--

CREATE TABLE IF NOT EXISTS `ila_course_level_lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_level_id` int(11) NOT NULL,
  `title` varchar(100) CHARACTER SET utf16 NOT NULL,
  `language_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ila_course_level_lang`
--

INSERT INTO `ila_course_level_lang` (`id`, `course_level_id`, `title`, `language_id`) VALUES
(1, 1, 'Level 1', 1),
(2, 2, 'Level 2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ila_course_schedules`
--

CREATE TABLE IF NOT EXISTS `ila_course_schedules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `center_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `class_code` varchar(50) NOT NULL,
  `weeks` int(11) NOT NULL,
  `hours` int(11) NOT NULL,
  `days` varchar(50) NOT NULL,
  `class_time_from` varchar(50) NOT NULL,
  `class_time_to` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `fee` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ila_course_schedules`
--

INSERT INTO `ila_course_schedules` (`id`, `course_id`, `center_id`, `level_id`, `class_code`, `weeks`, `hours`, `days`, `class_time_from`, `class_time_to`, `start_date`, `fee`, `status`) VALUES
(1, 1, 2, 1, 'S242wsfsr45', 6, 49, 'Sat/Sun', '01:00 PM', '03:30 PM', '2017-02-27', '100000', 'Next Class');

-- --------------------------------------------------------

--
-- Table structure for table `ila_districts`
--

CREATE TABLE IF NOT EXISTS `ila_districts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `district` varchar(100) NOT NULL,
  `city_id` int(11) NOT NULL,
  `isblocked` smallint(1) NOT NULL DEFAULT '0' COMMENT '0=>not blocked, 1=>blocked',
  `isdeleted` smallint(1) NOT NULL DEFAULT '0' COMMENT '0=>not deleted, 1=>deleted',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ila_districts`
--

INSERT INTO `ila_districts` (`id`, `district`, `city_id`, `isblocked`, `isdeleted`) VALUES
(1, 'Hai Ba Trung', 2, 0, 0),
(2, 'District 1', 1, 0, 0),
(3, 'District 2', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ila_districts_lang`
--

CREATE TABLE IF NOT EXISTS `ila_districts_lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `district_id` int(11) NOT NULL,
  `district_name` varchar(100) CHARACTER SET utf16 NOT NULL,
  `language_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `ila_districts_lang`
--

INSERT INTO `ila_districts_lang` (`id`, `district_id`, `district_name`, `language_id`) VALUES
(1, 1, 'Hai Ba Trung', 1),
(2, 1, 'efgh', 2),
(3, 2, 'District 1', 1),
(4, 3, 'District 2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ila_email_template`
--

CREATE TABLE IF NOT EXISTS `ila_email_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf16 NOT NULL,
  `subject` varchar(255) CHARACTER SET utf16 NOT NULL,
  `slug` varchar(20) CHARACTER SET utf16 NOT NULL,
  `content` text CHARACTER SET utf16 NOT NULL,
  `mailto` varchar(200) CHARACTER SET utf16 NOT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ila_email_template`
--

INSERT INTO `ila_email_template` (`id`, `name`, `subject`, `slug`, `content`, `mailto`, `created_on`) VALUES
(1, 'Request a Callback', '', 'callback', '', '', '2016-12-18'),
(2, 'Make an Enquiry', '', 'enquary', '', '', '2016-12-18'),
(3, 'Registration', '', 'registration', '<p>asdsdsa&nbsp;</p>\r\n', 'visitsameek@gmail.com', '2017-02-04');

-- --------------------------------------------------------

--
-- Table structure for table `ila_language`
--

CREATE TABLE IF NOT EXISTS `ila_language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_name` varchar(40) NOT NULL,
  `code` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ila_language`
--

INSERT INTO `ila_language` (`id`, `language_name`, `code`) VALUES
(1, 'English', ''),
(2, 'Vietnamese', '');

-- --------------------------------------------------------

--
-- Table structure for table `ila_media`
--

CREATE TABLE IF NOT EXISTS `ila_media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(600) CHARACTER SET utf16 NOT NULL,
  `type` int(1) NOT NULL COMMENT '1=image,2=video',
  `size` double NOT NULL,
  `media_name` text CHARACTER SET utf16 NOT NULL,
  `extension` varchar(200) CHARACTER SET utf16 NOT NULL,
  `media_used_type` int(1) NOT NULL COMMENT '1=Global,2=SFT Buddy',
  `raw_name` varchar(250) CHARACTER SET utf16 NOT NULL,
  `file_path` text CHARACTER SET utf16 NOT NULL,
  `created_on` datetime NOT NULL,
  `modified_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ila_media`
--

INSERT INTO `ila_media` (`id`, `url`, `type`, `size`, `media_name`, `extension`, `media_used_type`, `raw_name`, `file_path`, `created_on`, `modified_on`) VALUES
(1, 'uploads/medias', 1, 105492.48, 'media_148637567253530.jpg', '.jpg', 1, 'media_148637567253530', 'D:/xampp/htdocs/ila/uploads/medias/', '2017-02-06 11:07:52', '2017-02-06 11:07:52'),
(2, 'uploads/medias', 1, 136673.28, 'media_148637567417333.jpg', '.jpg', 1, 'media_148637567417333', 'D:/xampp/htdocs/ila/uploads/medias/', '2017-02-06 11:07:54', '2017-02-06 11:07:54');

-- --------------------------------------------------------

--
-- Table structure for table `ila_stories`
--

CREATE TABLE IF NOT EXISTS `ila_stories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `story` varchar(255) NOT NULL,
  `media_id` int(11) NOT NULL,
  `video_link` text NOT NULL,
  `isblocked` smallint(1) NOT NULL DEFAULT '0' COMMENT '0=>not blocked, 1=>blocked',
  `isdeleted` smallint(1) NOT NULL DEFAULT '0' COMMENT '0=>not deleted, 1=>deleted',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ila_stories_lang`
--

CREATE TABLE IF NOT EXISTS `ila_stories_lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `story_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf16 NOT NULL,
  `short_desc` text CHARACTER SET utf16 NOT NULL,
  `long_desc` blob NOT NULL,
  `language_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ila_teachers`
--

CREATE TABLE IF NOT EXISTS `ila_teachers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_name` varchar(255) NOT NULL,
  `country_id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL,
  `isblocked` smallint(1) NOT NULL DEFAULT '0' COMMENT '0=>not blocked, 1=>blocked',
  `isdeleted` smallint(1) NOT NULL DEFAULT '0' COMMENT '0=>not deleted, 1=>deleted',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ila_teachers_lang`
--

CREATE TABLE IF NOT EXISTS `ila_teachers_lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(11) NOT NULL,
  `first_name` varchar(100) CHARACTER SET utf16 NOT NULL,
  `last_name` varchar(100) CHARACTER SET utf16 NOT NULL,
  `certificate_details` text CHARACTER SET utf16 NOT NULL,
  `content` blob NOT NULL,
  `language_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ila_training_centers`
--

CREATE TABLE IF NOT EXISTS `ila_training_centers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `center` varchar(255) NOT NULL,
  `city_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `media_id` int(11) NOT NULL,
  `isblocked` smallint(1) NOT NULL DEFAULT '0' COMMENT '0=>not blocked, 1=>blocked',
  `isdeleted` smallint(1) NOT NULL DEFAULT '0' COMMENT '0=>not deleted, 1=>deleted',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ila_training_centers`
--

INSERT INTO `ila_training_centers` (`id`, `center`, `city_id`, `district_id`, `phone`, `email_id`, `media_id`, `isblocked`, `isdeleted`) VALUES
(1, 'ILA An Phu', 1, 3, '(08) 6287 0768', 'info@ilavietnam.edu.vn', 1, 0, 0),
(2, 'ILA Nguyen Cu Trinh', 1, 2, '(08) 3838 6788', 'info@ilavietnam.edu.vn', 2, 0, 0),
(3, 'ILA Times City', 2, 1, '(04) 3975 9666', 'info@ilavietnam.edu.vn', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ila_training_centers_lang`
--

CREATE TABLE IF NOT EXISTS `ila_training_centers_lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `center_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf16 NOT NULL,
  `address` text CHARACTER SET utf16 NOT NULL,
  `language_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ila_training_centers_lang`
--

INSERT INTO `ila_training_centers_lang` (`id`, `center_id`, `title`, `address`, `language_id`) VALUES
(1, 1, 'ILA An Phu', '2nd Floor, The Vista Building, Ha Noi Highway, An Phu Ward, Dist. 2, Ho Chi Minh City, Vietnam', 1),
(2, 2, 'ILA Nguyen Cu Trinh', '51 Nguyen Cu Trinh Street, District 1, Ho Chi Minh City, Vietnam', 1),
(3, 3, 'ILA Times City', 'Times City, Tower 1-L2-02, 2nd Fl., 458 Minh Khai St., Hai Ba Trung Dist., Hanoi, Vietnam', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
