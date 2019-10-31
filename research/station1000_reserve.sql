-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 30 2018 г., 19:11
-- Версия сервера: 5.7.17
-- Версия PHP: 7.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `research`
--

-- --------------------------------------------------------

--
-- Структура таблицы `station1000_reserve`
--

CREATE TABLE `station1000_reserve` (
  `name` varchar(200) NOT NULL,
  `code` mediumint(9) NOT NULL,
  `longitude` int(11) NOT NULL,
  `altitude` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `station1000_reserve`
--

INSERT INTO `station1000_reserve` (`name`, `code`, `longitude`, `altitude`) VALUES
('station23', 0, 3166, 4687),
('station49', 1, 1668, 3030),
('station27', 2, 990, 1517),
('station18', 3, 1181, 3880),
('station43', 4, 1048, 644),
('station25', 5, 641, 832),
('station42', 6, 1979, 2832),
('station2', 7, 2773, 3083),
('station45', 8, 98, 3191),
('station1', 9, 169, 133),
('station7', 10, 460, 989),
('station10', 11, 3532, 4836),
('station25', 12, 3068, 2463),
('station35', 13, 89, 55),
('station3', 14, 2380, 2089),
('station1', 15, 3958, 123),
('station8', 16, 2164, 622),
('station25', 17, 1708, 2980),
('station16', 18, 4214, 1917),
('station36', 19, 1166, 3533),
('station6', 20, 2255, 2273),
('station33', 21, 2004, 4566),
('station16', 22, 700, 2936),
('station49', 23, 880, 3436),
('station6', 24, 3353, 4442),
('station14', 25, 3339, 3058),
('station8', 26, 1712, 1772),
('station46', 27, 2570, 4820),
('station36', 28, 924, 1996),
('station25', 29, 588, 399),
('station29', 30, 3474, 903),
('station41', 31, 1455, 1032),
('station3', 32, 2581, 3702),
('station14', 33, 2067, 3055),
('station42', 34, 3389, 2641),
('station39', 35, 4341, 3324),
('station6', 36, 2447, 3883),
('station33', 37, 4679, 2810),
('station38', 38, 2386, 4780),
('station5', 39, 2235, 426),
('station28', 40, 2555, 2235),
('station33', 41, 4858, 2032),
('station8', 42, 4849, 2064),
('station43', 43, 1471, 615),
('station41', 44, 4747, 2312),
('station50', 45, 2200, 1053),
('station6', 46, 2747, 3674),
('station42', 47, 4978, 4703),
('station20', 48, 3334, 856),
('station46', 49, 4775, 2624),
('station5', 50, 4577, 4277),
('station48', 51, 1859, 3573),
('station41', 52, 1024, 3173),
('station50', 53, 3473, 3215),
('station10', 54, 4065, 2724),
('station29', 55, 4788, 2497),
('station16', 56, 3948, 381),
('station12', 57, 4183, 2364),
('station15', 58, 2398, 408),
('station18', 59, 2126, 1824),
('station14', 60, 2609, 2177),
('station3', 61, 4399, 3817),
('station1', 62, 2166, 2671),
('station26', 63, 75, 2420),
('station0', 64, 2443, 8),
('station20', 65, 3576, 4370),
('station29', 66, 3530, 1624),
('station22', 67, 781, 1219),
('station2', 68, 1412, 2864),
('station46', 69, 3995, 4594),
('station32', 70, 2202, 1747),
('station22', 71, 4976, 2118),
('station27', 72, 1764, 3762),
('station12', 73, 2720, 1741),
('station34', 74, 3477, 2382),
('station29', 75, 3125, 2864),
('station50', 76, 3895, 416),
('station36', 77, 3589, 3966),
('station45', 78, 2260, 2033),
('station2', 79, 2092, 2301),
('station11', 80, 1997, 3442),
('station32', 81, 1884, 956),
('station37', 82, 524, 2893),
('station24', 83, 847, 1607),
('station28', 84, 4960, 3955),
('station0', 85, 2884, 3404),
('station17', 86, 1449, 1311),
('station19', 87, 812, 992),
('station45', 88, 3334, 3255),
('station20', 89, 471, 3399),
('station6', 90, 1804, 4907),
('station27', 91, 1657, 1769),
('station7', 92, 300, 4234),
('station1', 93, 1554, 96),
('station45', 94, 4816, 292),
('station14', 95, 1887, 2786),
('station41', 96, 4828, 840),
('station20', 97, 477, 2829),
('station13', 98, 1299, 3453),
('station38', 99, 376, 117),
('station13', 100, 2381, 3400),
('station11', 101, 2890, 4854),
('station21', 102, 703, 970),
('station43', 103, 2268, 1735),
('station40', 104, 3553, 2623),
('station40', 105, 976, 4238),
('station44', 106, 2264, 2320),
('station21', 107, 4684, 883),
('station22', 108, 2828, 4350),
('station48', 109, 1277, 2134),
('station49', 110, 1475, 2285),
('station22', 111, 4802, 1541),
('station12', 112, 3642, 458),
('station6', 113, 4, 1886),
('station48', 114, 1205, 4015),
('station7', 115, 718, 3705),
('station31', 116, 4353, 2129),
('station43', 117, 3024, 2651),
('station31', 118, 641, 3384),
('station13', 119, 3861, 907),
('station15', 120, 287, 4453),
('station40', 121, 278, 3680),
('station27', 122, 1220, 2383),
('station17', 123, 4783, 2299),
('station3', 124, 4784, 1697),
('station35', 125, 3380, 1060),
('station48', 126, 4394, 1354),
('station8', 127, 3555, 1769),
('station27', 128, 3080, 3235),
('station14', 129, 4119, 2799),
('station11', 130, 1454, 986),
('station48', 131, 1004, 454),
('station24', 132, 3858, 3417),
('station19', 133, 3522, 4540),
('station47', 134, 1669, 803),
('station22', 135, 1285, 3957),
('station26', 136, 4066, 1220),
('station45', 137, 301, 4295),
('station5', 138, 960, 825),
('station15', 139, 251, 4860),
('station33', 140, 4177, 2193),
('station10', 141, 126, 2053),
('station44', 142, 2299, 2881),
('station15', 143, 2185, 966),
('station37', 144, 894, 2886),
('station43', 145, 246, 2438),
('station2', 146, 3199, 1265),
('station35', 147, 908, 970),
('station30', 148, 778, 2459),
('station32', 149, 2395, 712),
('station42', 150, 4617, 3789),
('station31', 151, 243, 48),
('station0', 152, 3842, 2149),
('station12', 153, 220, 4067),
('station2', 154, 1746, 2015),
('station40', 155, 3706, 1754),
('station16', 156, 460, 1444),
('station5', 157, 3034, 4203),
('station23', 158, 1097, 1121),
('station44', 159, 775, 2755),
('station32', 160, 349, 4058),
('station17', 161, 3367, 4978),
('station24', 162, 1338, 2357),
('station23', 163, 4194, 88),
('station41', 164, 4518, 2514),
('station10', 165, 736, 1732),
('station3', 166, 3496, 3058),
('station27', 167, 4759, 3742),
('station17', 168, 4960, 4762),
('station28', 169, 4009, 2528),
('station46', 170, 2257, 2227),
('station40', 171, 185, 1717),
('station29', 172, 3381, 711),
('station13', 173, 4672, 4609),
('station21', 174, 4287, 3756),
('station12', 175, 583, 3471),
('station4', 176, 1307, 3729),
('station44', 177, 4615, 2996),
('station23', 178, 635, 4376),
('station23', 179, 1251, 1697),
('station36', 180, 4093, 747),
('station31', 181, 1919, 2136),
('station19', 182, 4713, 3189),
('station23', 183, 1085, 1203),
('station11', 184, 4069, 2998),
('station47', 185, 3476, 4212),
('station31', 186, 4412, 87),
('station31', 187, 1679, 2109),
('station45', 188, 3783, 962),
('station42', 189, 1535, 554),
('station7', 190, 956, 1006),
('station4', 191, 2426, 4317),
('station33', 192, 3993, 1999),
('station5', 193, 4604, 933),
('station44', 194, 4233, 2739),
('station29', 195, 4465, 2047),
('station20', 196, 760, 1255),
('station44', 197, 3119, 1879),
('station10', 198, 1297, 4500),
('station5', 199, 114, 3280),
('station4', 200, 1798, 2015),
('station30', 201, 2548, 4406),
('station48', 202, 824, 3421),
('station8', 203, 3508, 741),
('station34', 204, 4091, 1297),
('station38', 205, 4750, 1879),
('station38', 206, 2015, 2127),
('station30', 207, 2589, 4515),
('station26', 208, 2665, 44),
('station32', 209, 2605, 1457),
('station21', 210, 703, 3947),
('station24', 211, 4152, 2916),
('station38', 212, 1175, 4948),
('station24', 213, 981, 3386),
('station15', 214, 453, 2776),
('station35', 215, 3373, 892),
('station12', 216, 635, 4327),
('station43', 217, 1912, 4348),
('station31', 218, 2284, 3782),
('station26', 219, 2178, 1869),
('station8', 220, 636, 857),
('station5', 221, 2421, 3287),
('station20', 222, 2403, 182),
('station36', 223, 842, 3283),
('station18', 224, 4362, 4178),
('station42', 225, 1026, 4559),
('station47', 226, 1677, 1712),
('station21', 227, 2203, 4864),
('station30', 228, 1545, 3503),
('station2', 229, 4105, 3101),
('station44', 230, 2862, 2190),
('station14', 231, 644, 3633),
('station28', 232, 4947, 272),
('station41', 233, 1824, 1344),
('station4', 234, 3450, 1377),
('station43', 235, 1756, 2998),
('station12', 236, 590, 3515),
('station28', 237, 540, 3283),
('station10', 238, 2069, 4400),
('station5', 239, 392, 3203),
('station5', 240, 874, 2232),
('station34', 241, 2851, 2260),
('station35', 242, 101, 2966),
('station38', 243, 2593, 3238),
('station23', 244, 4829, 225),
('station46', 245, 640, 1166),
('station39', 246, 4941, 3221),
('station26', 247, 2558, 3077),
('station50', 248, 1254, 4046),
('station34', 249, 2043, 1163),
('station28', 250, 2640, 1776),
('station44', 251, 4587, 878),
('station25', 252, 4370, 2886),
('station16', 253, 1738, 141),
('station21', 254, 2435, 2665),
('station49', 255, 3493, 2905),
('station49', 256, 3286, 1543),
('station11', 257, 361, 2433),
('station0', 258, 150, 3049),
('station49', 259, 3186, 3965),
('station20', 260, 3756, 3065),
('station31', 261, 3134, 2568),
('station29', 262, 3785, 2545),
('station16', 263, 2587, 2229),
('station33', 264, 1000, 2243),
('station39', 265, 1468, 3154),
('station14', 266, 4914, 2505),
('station28', 267, 2581, 3357),
('station31', 268, 4243, 3169),
('station25', 269, 1417, 2254),
('station37', 270, 2382, 2604),
('station24', 271, 1059, 88),
('station10', 272, 3824, 2685),
('station43', 273, 1342, 3151),
('station42', 274, 1130, 768),
('station42', 275, 255, 1750),
('station1', 276, 1064, 4912),
('station22', 277, 118, 3047),
('station26', 278, 2360, 771),
('station28', 279, 3209, 2765),
('station3', 280, 0, 2095),
('station8', 281, 1161, 1487),
('station3', 282, 4048, 3848),
('station40', 283, 1802, 4255),
('station42', 284, 4712, 1195),
('station11', 285, 787, 3390),
('station37', 286, 208, 536),
('station29', 287, 1776, 3474),
('station30', 288, 1261, 4863),
('station50', 289, 1613, 7),
('station25', 290, 619, 2651),
('station24', 291, 1899, 4801),
('station1', 292, 3923, 3069),
('station4', 293, 369, 2558),
('station4', 294, 812, 141),
('station37', 295, 4892, 1806),
('station8', 296, 2123, 4601),
('station49', 297, 68, 772),
('station42', 298, 4395, 831),
('station20', 299, 3857, 1351),
('station14', 300, 2305, 4151),
('station15', 301, 2187, 3946),
('station32', 302, 3126, 1589),
('station19', 303, 2537, 2793),
('station24', 304, 2336, 3776),
('station23', 305, 3501, 4813),
('station6', 306, 2517, 1107),
('station35', 307, 4334, 4994),
('station12', 308, 3252, 1779),
('station28', 309, 1414, 4076),
('station47', 310, 4650, 319),
('station41', 311, 831, 3468),
('station13', 312, 4128, 3417),
('station29', 313, 3524, 4267),
('station36', 314, 3720, 3353),
('station4', 315, 3685, 3561),
('station43', 316, 4726, 2060),
('station7', 317, 2148, 4298),
('station30', 318, 3911, 184),
('station42', 319, 2983, 2900),
('station4', 320, 1372, 1914),
('station34', 321, 4870, 591),
('station42', 322, 4848, 4105),
('station0', 323, 1750, 1700),
('station37', 324, 3104, 707),
('station12', 325, 569, 4290),
('station15', 326, 3933, 4899),
('station2', 327, 4623, 4528),
('station38', 328, 1716, 524),
('station2', 329, 1400, 4381),
('station8', 330, 1831, 2479),
('station12', 331, 689, 1726),
('station22', 332, 4461, 1789),
('station7', 333, 574, 1355),
('station4', 334, 4666, 883),
('station17', 335, 4297, 416),
('station20', 336, 993, 455),
('station32', 337, 3691, 4288),
('station2', 338, 4542, 4434),
('station2', 339, 378, 4551),
('station16', 340, 4214, 4701),
('station34', 341, 3318, 1491),
('station37', 342, 193, 4391),
('station9', 343, 964, 4010),
('station22', 344, 920, 4955),
('station2', 345, 4371, 254),
('station2', 346, 2693, 1022),
('station30', 347, 1602, 4464),
('station23', 348, 3380, 2103),
('station2', 349, 2635, 4729),
('station45', 350, 1135, 1923),
('station6', 351, 4315, 3456),
('station47', 352, 2416, 3154),
('station2', 353, 900, 2727),
('station0', 354, 468, 1731),
('station16', 355, 997, 1879),
('station14', 356, 3967, 4394),
('station44', 357, 162, 2184),
('station40', 358, 896, 718),
('station46', 359, 2661, 2717),
('station5', 360, 2869, 1364),
('station23', 361, 2336, 1830),
('station25', 362, 4892, 1903),
('station28', 363, 326, 4002),
('station48', 364, 2561, 1396),
('station24', 365, 4125, 2106),
('station17', 366, 1730, 1366),
('station22', 367, 4914, 1289),
('station46', 368, 1610, 1200),
('station17', 369, 3381, 1956),
('station42', 370, 1337, 3050),
('station6', 371, 4904, 3562),
('station27', 372, 1772, 3340),
('station42', 373, 902, 665),
('station25', 374, 807, 4040),
('station50', 375, 4889, 2958),
('station11', 376, 4020, 1794),
('station3', 377, 1398, 846),
('station10', 378, 1980, 1030),
('station28', 379, 1245, 1326),
('station34', 380, 644, 1813),
('station31', 381, 2338, 4310),
('station47', 382, 4274, 217),
('station42', 383, 4557, 4237),
('station48', 384, 6, 4569),
('station26', 385, 2499, 860),
('station22', 386, 4054, 4807),
('station39', 387, 4347, 1228),
('station31', 388, 4287, 4657),
('station23', 389, 5, 4528),
('station6', 390, 3091, 1815),
('station21', 391, 3090, 3654),
('station23', 392, 2686, 4658),
('station47', 393, 369, 3088),
('station24', 394, 701, 293),
('station13', 395, 3248, 4280),
('station18', 396, 4250, 2175),
('station25', 397, 2651, 76),
('station33', 398, 1979, 2438),
('station20', 399, 3464, 3593),
('station28', 400, 2925, 1038),
('station13', 401, 4918, 1390),
('station13', 402, 3532, 2451),
('station0', 403, 4541, 1370),
('station17', 404, 3955, 3261),
('station32', 405, 3335, 4781),
('station8', 406, 1743, 2001),
('station37', 407, 689, 1635),
('station22', 408, 395, 348),
('station33', 409, 3377, 485),
('station17', 410, 4249, 3714),
('station2', 411, 351, 1431),
('station45', 412, 3866, 2886),
('station39', 413, 1324, 2604),
('station45', 414, 4621, 2111),
('station0', 415, 4968, 4204),
('station2', 416, 3914, 2013),
('station0', 417, 214, 3663),
('station7', 418, 1591, 4351),
('station10', 419, 2026, 3455),
('station4', 420, 4844, 4298),
('station14', 421, 382, 4215),
('station24', 422, 2278, 3112),
('station21', 423, 4675, 1391),
('station35', 424, 882, 3806),
('station34', 425, 3615, 541),
('station24', 426, 4690, 35),
('station38', 427, 1752, 567),
('station31', 428, 382, 4295),
('station11', 429, 2087, 2662),
('station43', 430, 2967, 4752),
('station20', 431, 4667, 321),
('station20', 432, 2513, 3261),
('station32', 433, 4388, 2333),
('station9', 434, 468, 3840),
('station28', 435, 786, 151),
('station34', 436, 3892, 1991),
('station37', 437, 2216, 2506),
('station4', 438, 2694, 495),
('station19', 439, 3122, 1038),
('station13', 440, 1702, 505),
('station38', 441, 3161, 2697),
('station29', 442, 703, 1438),
('station46', 443, 1252, 2682),
('station34', 444, 1023, 2839),
('station44', 445, 490, 2638),
('station50', 446, 864, 3702),
('station43', 447, 3113, 4079),
('station10', 448, 3682, 1867),
('station37', 449, 3569, 3603),
('station18', 450, 4407, 3880),
('station0', 451, 4227, 3949),
('station24', 452, 1546, 1076),
('station3', 453, 3828, 3391),
('station42', 454, 2809, 2726),
('station27', 455, 2751, 3319),
('station3', 456, 4424, 3933),
('station20', 457, 1990, 1845),
('station0', 458, 1581, 2993),
('station16', 459, 3718, 1952),
('station3', 460, 1708, 2303),
('station41', 461, 2698, 1132),
('station1', 462, 7, 3989),
('station26', 463, 238, 553),
('station34', 464, 579, 1802),
('station22', 465, 4447, 1750),
('station4', 466, 101, 3222),
('station38', 467, 2411, 3944),
('station5', 468, 3907, 4113),
('station28', 469, 1606, 2412),
('station17', 470, 3226, 1853),
('station50', 471, 134, 531),
('station4', 472, 3104, 4105),
('station35', 473, 2480, 1690),
('station19', 474, 2295, 2721),
('station17', 475, 3776, 2064),
('station45', 476, 4740, 4815),
('station27', 477, 418, 381),
('station17', 478, 2158, 2835),
('station8', 479, 1663, 1326),
('station14', 480, 1850, 59),
('station18', 481, 1534, 216),
('station25', 482, 1800, 3227),
('station9', 483, 884, 1044),
('station41', 484, 1220, 1875),
('station39', 485, 3630, 3856),
('station7', 486, 2369, 2248),
('station19', 487, 1899, 4293),
('station24', 488, 834, 4304),
('station14', 489, 2321, 4439),
('station8', 490, 2771, 4882),
('station3', 491, 971, 2792),
('station36', 492, 3507, 886),
('station1', 493, 3105, 3171),
('station23', 494, 3087, 2528),
('station3', 495, 4306, 3368),
('station39', 496, 4401, 4991),
('station4', 497, 2114, 3149),
('station5', 498, 1521, 28),
('station31', 499, 940, 1577),
('station13', 500, 1912, 515),
('station30', 501, 4617, 1957),
('station5', 502, 1588, 791),
('station8', 503, 1617, 1678),
('station12', 504, 3931, 1780),
('station21', 505, 1357, 2600),
('station5', 506, 1606, 2770),
('station23', 507, 2923, 797),
('station25', 508, 4354, 2614),
('station14', 509, 1091, 4816),
('station40', 510, 4984, 3762),
('station47', 511, 1705, 4237),
('station2', 512, 2199, 4858),
('station44', 513, 4463, 1294),
('station20', 514, 4126, 2029),
('station9', 515, 3241, 4667),
('station40', 516, 1022, 1866),
('station20', 517, 4286, 488),
('station22', 518, 408, 1766),
('station12', 519, 3119, 813),
('station46', 520, 2403, 4265),
('station19', 521, 4200, 3973),
('station38', 522, 4934, 4824),
('station35', 523, 2516, 2451),
('station29', 524, 1018, 543),
('station22', 525, 4563, 3394),
('station44', 526, 3441, 2747),
('station46', 527, 2553, 1189),
('station23', 528, 3527, 2169),
('station40', 529, 2527, 2252),
('station15', 530, 3894, 3909),
('station7', 531, 227, 1256),
('station9', 532, 1595, 574),
('station44', 533, 593, 2765),
('station32', 534, 1292, 1125),
('station47', 535, 1889, 3461),
('station17', 536, 173, 4292),
('station44', 537, 185, 4122),
('station0', 538, 4572, 2610),
('station44', 539, 1341, 2887),
('station38', 540, 3522, 4500),
('station32', 541, 1445, 2274),
('station48', 542, 4290, 3926),
('station13', 543, 4650, 3764),
('station3', 544, 1601, 1530),
('station29', 545, 3992, 2217),
('station41', 546, 4069, 2396),
('station2', 547, 525, 4484),
('station30', 548, 452, 1598),
('station15', 549, 3259, 2788),
('station47', 550, 818, 598),
('station27', 551, 1698, 2245),
('station38', 552, 4066, 533),
('station41', 553, 4425, 4018),
('station41', 554, 2905, 3179),
('station8', 555, 2828, 4705),
('station14', 556, 568, 1017),
('station44', 557, 661, 1844),
('station44', 558, 2408, 4558),
('station43', 559, 4776, 3893),
('station3', 560, 4996, 1239),
('station9', 561, 838, 1182),
('station16', 562, 651, 2349),
('station30', 563, 3120, 2160),
('station4', 564, 44, 2853),
('station31', 565, 1586, 1325),
('station22', 566, 2874, 4023),
('station14', 567, 4806, 3662),
('station17', 568, 4554, 3530),
('station12', 569, 1156, 3416),
('station41', 570, 4003, 3117),
('station4', 571, 2258, 1712),
('station12', 572, 378, 1553),
('station29', 573, 4222, 2316),
('station3', 574, 4888, 3846),
('station30', 575, 1466, 419),
('station27', 576, 4359, 4173),
('station28', 577, 3484, 190),
('station7', 578, 4909, 1366),
('station10', 579, 3001, 559),
('station19', 580, 4321, 73),
('station24', 581, 4542, 4000),
('station26', 582, 2912, 4221),
('station27', 583, 2670, 2631),
('station28', 584, 3385, 2226),
('station34', 585, 1217, 4405),
('station41', 586, 2710, 1931),
('station38', 587, 719, 3539),
('station50', 588, 1231, 1164),
('station6', 589, 4324, 3848),
('station6', 590, 19, 3635),
('station44', 591, 4814, 4321),
('station41', 592, 3176, 2534),
('station1', 593, 432, 488),
('station25', 594, 4279, 2834),
('station44', 595, 3099, 4364),
('station36', 596, 2859, 1383),
('station41', 597, 1147, 2179),
('station21', 598, 2330, 1280),
('station1', 599, 541, 4489),
('station24', 600, 1284, 4651),
('station22', 601, 3159, 3133),
('station25', 602, 594, 2961),
('station34', 603, 2195, 1923),
('station19', 604, 2910, 2205),
('station38', 605, 596, 279),
('station29', 606, 2619, 2992),
('station34', 607, 749, 3463),
('station43', 608, 1436, 3254),
('station26', 609, 2737, 1113),
('station29', 610, 4925, 566),
('station9', 611, 24, 2556),
('station32', 612, 2260, 2140),
('station42', 613, 2119, 4255),
('station25', 614, 1346, 2242),
('station19', 615, 4775, 3409),
('station6', 616, 3027, 894),
('station48', 617, 3402, 1680),
('station35', 618, 3433, 4521),
('station23', 619, 4226, 1788),
('station23', 620, 2367, 3517),
('station48', 621, 4473, 4660),
('station22', 622, 2652, 4813),
('station31', 623, 847, 4023),
('station10', 624, 2530, 693),
('station39', 625, 126, 2555),
('station13', 626, 4671, 1210),
('station20', 627, 193, 4801),
('station47', 628, 2547, 2189),
('station13', 629, 543, 3842),
('station11', 630, 4725, 4399),
('station25', 631, 3237, 3212),
('station46', 632, 4076, 374),
('station39', 633, 1073, 3369),
('station27', 634, 3601, 2872),
('station46', 635, 367, 534),
('station22', 636, 4619, 4799),
('station39', 637, 3375, 1288),
('station30', 638, 2451, 2175),
('station40', 639, 220, 3876),
('station48', 640, 1971, 4352),
('station32', 641, 1772, 4824),
('station50', 642, 2168, 4967),
('station40', 643, 3614, 1321),
('station46', 644, 3563, 609),
('station50', 645, 1250, 1758),
('station1', 646, 65, 3892),
('station42', 647, 152, 712),
('station19', 648, 2229, 1902),
('station35', 649, 3392, 826),
('station18', 650, 3138, 732),
('station49', 651, 948, 3291),
('station34', 652, 2713, 639),
('station49', 653, 929, 4962),
('station21', 654, 2319, 3763),
('station35', 655, 3881, 2988),
('station7', 656, 2076, 4831),
('station48', 657, 2166, 3782),
('station39', 658, 4976, 4248),
('station4', 659, 1047, 4447),
('station24', 660, 4990, 2914),
('station19', 661, 4972, 2269),
('station24', 662, 283, 2205),
('station22', 663, 4239, 1710),
('station5', 664, 127, 3605),
('station7', 665, 4683, 2130),
('station32', 666, 4243, 3349),
('station30', 667, 3991, 4182),
('station17', 668, 3858, 1508),
('station32', 669, 560, 784),
('station9', 670, 2102, 485),
('station31', 671, 4597, 1319),
('station48', 672, 2427, 1800),
('station16', 673, 1965, 4403),
('station22', 674, 3267, 4345),
('station0', 675, 3057, 355),
('station25', 676, 4882, 3726),
('station31', 677, 4757, 72),
('station32', 678, 426, 825),
('station31', 679, 1777, 4753),
('station38', 680, 2719, 3588),
('station29', 681, 600, 3662),
('station19', 682, 2841, 4857),
('station25', 683, 4605, 2802),
('station9', 684, 4814, 4484),
('station8', 685, 1949, 4596),
('station26', 686, 2969, 4891),
('station41', 687, 3141, 3692),
('station39', 688, 3661, 3305),
('station33', 689, 2270, 648),
('station20', 690, 1309, 2428),
('station48', 691, 1709, 4813),
('station27', 692, 1902, 321),
('station13', 693, 4203, 2523),
('station20', 694, 2467, 4882),
('station10', 695, 683, 2893),
('station26', 696, 4371, 3001),
('station35', 697, 2411, 404),
('station18', 698, 1129, 3126),
('station8', 699, 2349, 1449),
('station35', 700, 3885, 2288),
('station30', 701, 1678, 259),
('station27', 702, 612, 2842),
('station28', 703, 4793, 3015),
('station47', 704, 4048, 3016),
('station7', 705, 3479, 4004),
('station8', 706, 1579, 2500),
('station0', 707, 204, 1174),
('station3', 708, 4514, 3594),
('station19', 709, 786, 4775),
('station11', 710, 1525, 4784),
('station22', 711, 3842, 3644),
('station49', 712, 1667, 3665),
('station44', 713, 3739, 182),
('station41', 714, 2825, 389),
('station20', 715, 3468, 2747),
('station41', 716, 425, 328),
('station14', 717, 1744, 1579),
('station29', 718, 1463, 2238),
('station29', 719, 1725, 1614),
('station19', 720, 2627, 1705),
('station45', 721, 976, 921),
('station39', 722, 3459, 594),
('station23', 723, 1810, 2348),
('station35', 724, 1107, 2378),
('station0', 725, 50, 1841),
('station24', 726, 4894, 1556),
('station18', 727, 4793, 724),
('station37', 728, 2817, 295),
('station50', 729, 2012, 3824),
('station2', 730, 347, 4027),
('station18', 731, 3940, 4251),
('station15', 732, 2557, 3256),
('station39', 733, 1608, 3677),
('station37', 734, 2063, 4152),
('station22', 735, 1900, 2111),
('station46', 736, 2699, 355),
('station29', 737, 1431, 719),
('station28', 738, 3755, 3438),
('station34', 739, 4087, 3372),
('station29', 740, 3623, 3213),
('station6', 741, 1512, 1),
('station49', 742, 796, 1622),
('station45', 743, 614, 4221),
('station5', 744, 1595, 2531),
('station4', 745, 1760, 4670),
('station33', 746, 2280, 3460),
('station14', 747, 4680, 2385),
('station47', 748, 4541, 447),
('station33', 749, 1832, 527),
('station32', 750, 1022, 3176),
('station19', 751, 2060, 4709),
('station46', 752, 3458, 4285),
('station32', 753, 355, 823),
('station28', 754, 644, 880),
('station44', 755, 2492, 438),
('station5', 756, 1841, 4057),
('station0', 757, 2261, 3265),
('station17', 758, 2193, 4354),
('station24', 759, 2888, 4796),
('station43', 760, 3873, 1857),
('station23', 761, 4296, 294),
('station11', 762, 3939, 1824),
('station44', 763, 542, 3564),
('station20', 764, 4844, 4651),
('station26', 765, 3654, 1103),
('station50', 766, 2712, 1441),
('station13', 767, 2717, 742),
('station6', 768, 2732, 2418),
('station19', 769, 890, 4210),
('station38', 770, 2351, 3824),
('station31', 771, 2313, 4020),
('station44', 772, 3964, 2563),
('station33', 773, 3740, 82),
('station2', 774, 3617, 1263),
('station45', 775, 3160, 1380),
('station39', 776, 3779, 2771),
('station8', 777, 234, 2852),
('station40', 778, 1184, 4244),
('station33', 779, 3912, 3172),
('station31', 780, 654, 542),
('station43', 781, 717, 4651),
('station45', 782, 2222, 1134),
('station30', 783, 1792, 2654),
('station21', 784, 1090, 4227),
('station40', 785, 3333, 527),
('station14', 786, 3829, 3572),
('station11', 787, 4965, 3569),
('station23', 788, 4033, 1138),
('station35', 789, 2537, 3778),
('station26', 790, 818, 262),
('station4', 791, 429, 1130),
('station42', 792, 1241, 1759),
('station12', 793, 1293, 3034),
('station27', 794, 2382, 1215),
('station49', 795, 252, 2781),
('station11', 796, 2678, 4962),
('station13', 797, 1975, 2649),
('station5', 798, 3168, 2492),
('station16', 799, 202, 1304),
('station9', 800, 4926, 2541),
('station47', 801, 2348, 74),
('station9', 802, 2003, 954),
('station7', 803, 4635, 163),
('station1', 804, 2066, 4355),
('station5', 805, 2273, 4882),
('station49', 806, 2616, 2004),
('station14', 807, 4870, 4521),
('station14', 808, 2381, 836),
('station6', 809, 3044, 4709),
('station47', 810, 520, 4442),
('station14', 811, 3712, 4418),
('station16', 812, 3259, 2412),
('station32', 813, 3302, 2429),
('station16', 814, 3063, 4659),
('station13', 815, 1017, 3165),
('station11', 816, 493, 3386),
('station15', 817, 3891, 684),
('station39', 818, 4155, 1947),
('station46', 819, 3142, 221),
('station41', 820, 2730, 4766),
('station49', 821, 1373, 4556),
('station37', 822, 2821, 1195),
('station23', 823, 1035, 4936),
('station11', 824, 1335, 3914),
('station43', 825, 499, 2887),
('station40', 826, 767, 4101),
('station48', 827, 1789, 4727),
('station25', 828, 2299, 2797),
('station7', 829, 3021, 3495),
('station31', 830, 3176, 2054),
('station14', 831, 2960, 4485),
('station41', 832, 4365, 741),
('station24', 833, 4839, 255),
('station8', 834, 4310, 1522),
('station30', 835, 2929, 423),
('station26', 836, 2429, 144),
('station14', 837, 468, 2633),
('station9', 838, 4274, 2509),
('station45', 839, 1568, 1428),
('station48', 840, 1882, 1501),
('station0', 841, 2635, 4070),
('station43', 842, 3631, 2034),
('station43', 843, 637, 3958),
('station33', 844, 744, 3620),
('station44', 845, 3490, 332),
('station2', 846, 747, 2942),
('station9', 847, 104, 4646),
('station47', 848, 3563, 3109),
('station10', 849, 103, 2482),
('station11', 850, 1918, 1729),
('station14', 851, 4436, 2426),
('station37', 852, 575, 2995),
('station0', 853, 3045, 267),
('station21', 854, 1838, 3403),
('station0', 855, 1526, 3805),
('station34', 856, 2669, 1705),
('station3', 857, 1801, 3164),
('station1', 858, 1413, 2756),
('station11', 859, 3121, 3254),
('station0', 860, 42, 2565),
('station42', 861, 1125, 4450),
('station41', 862, 3282, 2762),
('station40', 863, 947, 2247),
('station27', 864, 1201, 4971),
('station41', 865, 262, 3801),
('station4', 866, 912, 3733),
('station17', 867, 2793, 3599),
('station5', 868, 3897, 2234),
('station30', 869, 1283, 4816),
('station49', 870, 3617, 581),
('station14', 871, 2004, 1547),
('station30', 872, 1969, 2899),
('station11', 873, 2295, 3800),
('station9', 874, 3585, 2773),
('station19', 875, 759, 1389),
('station50', 876, 4590, 159),
('station44', 877, 3773, 1108),
('station30', 878, 2677, 3509),
('station37', 879, 366, 4180),
('station42', 880, 3193, 3540),
('station14', 881, 1600, 4322),
('station6', 882, 2335, 1448),
('station41', 883, 387, 4157),
('station15', 884, 4077, 4250),
('station32', 885, 874, 4734),
('station21', 886, 225, 1301),
('station50', 887, 4290, 2598),
('station4', 888, 2211, 1077),
('station28', 889, 1510, 3818),
('station17', 890, 3749, 2000),
('station42', 891, 3615, 4863),
('station34', 892, 801, 3395),
('station1', 893, 1807, 2824),
('station18', 894, 4037, 3532),
('station43', 895, 4608, 1570),
('station8', 896, 1105, 2118),
('station45', 897, 1533, 351),
('station0', 898, 3103, 1627),
('station10', 899, 3723, 445),
('station22', 900, 1507, 1180),
('station19', 901, 3025, 4528),
('station46', 902, 1451, 1887),
('station18', 903, 4468, 738),
('station39', 904, 2932, 114),
('station14', 905, 4759, 2179),
('station45', 906, 967, 4022),
('station26', 907, 4310, 114),
('station18', 908, 4357, 4723),
('station13', 909, 3240, 3392),
('station50', 910, 4742, 3611),
('station14', 911, 4880, 2017),
('station26', 912, 1507, 4817),
('station46', 913, 4512, 4907),
('station20', 914, 2781, 765),
('station1', 915, 600, 1925),
('station46', 916, 3500, 4619),
('station20', 917, 3218, 339),
('station6', 918, 2590, 46),
('station29', 919, 1461, 1567),
('station22', 920, 3878, 4255),
('station5', 921, 4639, 4305),
('station34', 922, 2898, 2082),
('station46', 923, 3320, 522),
('station35', 924, 1860, 441),
('station47', 925, 885, 3897),
('station41', 926, 680, 1775),
('station6', 927, 3194, 4890),
('station10', 928, 4733, 4301),
('station3', 929, 2748, 1705),
('station2', 930, 2501, 370),
('station5', 931, 746, 4918),
('station2', 932, 4189, 3330),
('station27', 933, 2491, 1730),
('station32', 934, 4494, 1665),
('station42', 935, 443, 3703),
('station49', 936, 4379, 4811),
('station37', 937, 4198, 3235),
('station15', 938, 3588, 4359),
('station48', 939, 4417, 886),
('station23', 940, 1838, 2177),
('station15', 941, 1582, 3839),
('station41', 942, 3310, 4702),
('station37', 943, 3237, 4574),
('station18', 944, 3004, 1835),
('station4', 945, 2642, 163),
('station14', 946, 3848, 1421),
('station20', 947, 1634, 2621),
('station10', 948, 3652, 1232),
('station17', 949, 698, 2031),
('station50', 950, 3246, 2536),
('station19', 951, 4729, 1704),
('station17', 952, 2845, 3238),
('station42', 953, 1284, 894),
('station48', 954, 4643, 2324),
('station12', 955, 4096, 668),
('station7', 956, 1043, 1858),
('station16', 957, 3922, 807),
('station21', 958, 4899, 4795),
('station17', 959, 4896, 134),
('station47', 960, 1048, 1952),
('station16', 961, 4095, 166),
('station35', 962, 3013, 4744),
('station13', 963, 397, 490),
('station47', 964, 953, 4407),
('station44', 965, 1312, 4),
('station9', 966, 1016, 3768),
('station8', 967, 4417, 2610),
('station24', 968, 324, 3151),
('station50', 969, 255, 4946),
('station40', 970, 430, 1707),
('station36', 971, 15, 4505),
('station37', 972, 1635, 39),
('station4', 973, 3501, 1256),
('station33', 974, 1939, 3001),
('station46', 975, 2007, 3262),
('station34', 976, 2946, 164),
('station39', 977, 407, 51),
('station28', 978, 997, 3940),
('station15', 979, 3824, 1205),
('station42', 980, 2542, 2218),
('station6', 981, 4734, 4994),
('station20', 982, 3069, 1017),
('station20', 983, 160, 2762),
('station40', 984, 876, 994),
('station46', 985, 4144, 4862),
('station16', 986, 293, 2569),
('station7', 987, 3264, 2778),
('station19', 988, 1346, 278),
('station17', 989, 2279, 2141),
('station2', 990, 3719, 3575),
('station25', 991, 450, 4044),
('station33', 992, 2965, 3321),
('station29', 993, 3417, 1670),
('station9', 994, 4383, 214),
('station12', 995, 1688, 574),
('station6', 996, 4411, 1999),
('station48', 997, 94, 1885),
('station46', 998, 133, 4775),
('station16', 999, 1158, 903);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `station1000_reserve`
--
ALTER TABLE `station1000_reserve`
  ADD PRIMARY KEY (`code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
