-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2021 at 01:13 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `km`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_avatar`
--

CREATE TABLE `db_avatar` (
  `avatar_id` int(10) NOT NULL,
  `avatar_name` varchar(50) NOT NULL,
  `avatar_desc` varchar(150) NOT NULL,
  `avatar_level` varchar(50) NOT NULL,
  `avatar_price` int(30) NOT NULL,
  `avatar_picture` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_avatar`
--

INSERT INTO `db_avatar` (`avatar_id`, `avatar_name`, `avatar_desc`, `avatar_level`, `avatar_price`, `avatar_picture`) VALUES
(101, 'New User 1', 'Lorem Ipsum', '1', 0, 'user-1.png'),
(102, 'New User 2', 'Lorem Ipsum', '1', 0, 'user-2.png'),
(103, 'New User 3', 'Lorem Ipsum', '1', 0, 'user-3.png'),
(104, 'New User 4', 'Lorem Ipsum', '1', 0, 'user-4.png'),
(105, 'New User 5', 'Lorem Ipsum', '1', 0, 'user-5.png'),
(106, 'New User 6', 'Lorem Ipsum', '1', 0, 'user-6.png'),
(301, 'Special Item 1', 'Lorem Ipsum', '3', 80, 'hero1.png'),
(302, 'Special Item 2', 'Lorem Ipsum', '3', 100, 'hero2.png'),
(303, 'Special Item 3', 'Lorem Ipsum', '3', 120, 'hero3.png'),
(304, 'Special Item 4', 'Lorem Ipsum', '3', 150, 'hero4.png'),
(305, 'Special Item 5', 'Lorem Ipsum', '3', 180, 'hero5.png'),
(306, 'Special Item 6', 'Lorem Ipsum', '5', 200, 'hero6.png'),
(307, 'Special Item 7', 'Lorem Ipsum', '5', 250, 'hero7.png'),
(308, 'Special Item 8', 'Lorem Ipsum', '5', 280, 'hero8.png'),
(309, 'Special Item 9', 'Lorem Ipsum', '5', 300, 'hero9.png'),
(310, 'Special Item 10', 'Lorem Ipsum', '5', 350, 'hero10.png');

-- --------------------------------------------------------

--
-- Table structure for table `db_avatar_trans`
--

CREATE TABLE `db_avatar_trans` (
  `trans_id` int(30) NOT NULL,
  `trans_desc` varchar(300) NOT NULL,
  `avatar_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `db_avatar_used`
--

CREATE TABLE `db_avatar_used` (
  `trans_id` int(30) NOT NULL,
  `avatar_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `db_badges`
--

CREATE TABLE `db_badges` (
  `badges_id` int(30) NOT NULL,
  `badges_name` varchar(50) NOT NULL,
  `badges_desc` varchar(100) NOT NULL,
  `badges_point` int(30) NOT NULL,
  `badges_point_max` int(30) NOT NULL,
  `badges_pic` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_badges`
--

INSERT INTO `db_badges` (`badges_id`, `badges_name`, `badges_desc`, `badges_point`, `badges_point_max`, `badges_pic`) VALUES
(1, 'Pemula', '', 0, 19, 'level1.png'),
(2, 'Gemar Membantu', '', 20, 49, 'level2.png'),
(3, 'Ambisius', '', 50, 69, 'level3.png'),
(4, 'Terpelajar', '', 70, 99, 'level4.png'),
(5, 'Pakar', '', 100, 149, 'level5.png'),
(6, 'Si Hebat', '', 150, 249, 'level6.png'),
(7, 'Jenius', '', 250, 99999, 'level7.png');

-- --------------------------------------------------------

--
-- Table structure for table `db_badges_trans`
--

CREATE TABLE `db_badges_trans` (
  `trans_id` int(30) NOT NULL,
  `trans_desc` varchar(50) NOT NULL,
  `badges_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `badges_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `db_class`
--

CREATE TABLE `db_class` (
  `class_id` int(11) NOT NULL,
  `class_grade` varchar(10) NOT NULL,
  `class_name` varchar(10) NOT NULL,
  `npsn` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_class`
--

INSERT INTO `db_class` (`class_id`, `class_grade`, `class_name`, `npsn`) VALUES
(1, 'X', 'X TKJ 1', 10603711),
(2, 'X', 'X TKJ 2', 10603711),
(3, 'X', 'X TKJ 3', 10603711),
(4, 'X', 'X TKJ 4', 10603711),
(5, 'XI', 'XI TKJ 1', 10603711),
(6, 'XI', 'XI TKJ 2', 10603711),
(7, 'XI', 'XI TKJ 3', 10603711),
(8, 'XI', 'XI TKJ 4', 10603711),
(9, 'XII', 'XII TKJ 1', 10603711),
(10, 'XII', 'XII TKJ 2', 10603711),
(11, 'XII', 'XII TKJ 3', 10603711),
(12, 'XII', 'XII TKJ 4', 10603711);

-- --------------------------------------------------------

--
-- Table structure for table `db_class_trans`
--

CREATE TABLE `db_class_trans` (
  `trans_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `class_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_class_trans`
--

INSERT INTO `db_class_trans` (`trans_id`, `user_id`, `class_id`) VALUES
(413, 2, 1),
(414, 3, 1),
(415, 4, 1),
(416, 5, 1),
(417, 6, 1),
(418, 7, 1),
(419, 8, 1),
(420, 9, 1),
(421, 10, 1),
(422, 11, 1),
(423, 12, 1),
(424, 13, 1),
(425, 14, 1),
(426, 15, 1),
(427, 16, 1),
(428, 17, 1),
(429, 18, 1),
(430, 19, 1),
(431, 20, 1),
(432, 21, 1),
(433, 22, 1),
(434, 23, 1),
(435, 24, 1),
(436, 25, 1),
(437, 26, 1),
(438, 27, 1),
(439, 28, 1),
(440, 29, 1),
(441, 30, 1),
(442, 31, 1),
(443, 32, 2),
(444, 33, 2),
(445, 34, 2),
(446, 35, 2),
(447, 36, 2),
(448, 37, 2),
(449, 38, 2),
(450, 39, 2),
(451, 40, 2),
(452, 41, 2),
(453, 42, 2),
(454, 43, 2),
(455, 44, 2),
(456, 45, 2),
(457, 46, 2),
(458, 47, 2),
(459, 48, 2),
(460, 49, 3),
(461, 50, 3),
(462, 51, 3),
(463, 52, 3),
(464, 53, 3),
(465, 54, 3),
(466, 55, 3),
(467, 56, 3),
(468, 57, 3),
(469, 58, 3),
(470, 59, 3),
(471, 60, 3),
(472, 61, 3),
(473, 62, 3),
(474, 63, 3),
(475, 64, 3),
(476, 65, 3),
(477, 66, 3),
(478, 67, 3),
(479, 68, 3),
(480, 69, 3),
(481, 70, 3),
(482, 71, 3),
(483, 72, 3),
(484, 73, 3),
(485, 74, 3),
(486, 75, 3),
(487, 76, 3),
(488, 77, 3),
(489, 78, 3),
(490, 79, 3),
(491, 80, 3),
(492, 81, 3),
(493, 82, 3),
(494, 83, 4),
(495, 84, 4),
(496, 85, 4),
(497, 86, 4),
(498, 87, 4),
(499, 88, 4),
(500, 89, 4),
(501, 90, 4),
(502, 91, 4),
(503, 92, 4),
(504, 93, 4),
(505, 94, 4),
(506, 95, 4),
(507, 96, 4),
(508, 97, 4),
(509, 98, 4),
(510, 99, 4),
(511, 100, 4),
(512, 101, 4),
(513, 102, 4),
(514, 103, 4),
(515, 104, 4),
(516, 105, 5),
(517, 106, 5),
(518, 107, 5),
(519, 108, 5),
(520, 109, 5),
(521, 110, 5),
(522, 111, 5),
(523, 112, 5),
(524, 113, 5),
(525, 114, 5),
(526, 115, 5),
(527, 116, 5),
(528, 117, 5),
(529, 118, 5),
(530, 119, 5),
(531, 120, 5),
(532, 121, 5),
(533, 122, 5),
(534, 123, 5),
(535, 124, 5),
(536, 125, 5),
(537, 126, 5),
(538, 127, 5),
(539, 128, 5),
(540, 129, 5),
(541, 130, 6),
(542, 131, 6),
(543, 132, 6),
(544, 133, 6),
(545, 134, 6),
(546, 135, 6),
(547, 136, 6),
(548, 137, 6),
(549, 138, 6),
(550, 139, 6),
(551, 140, 6),
(552, 141, 6),
(553, 142, 6),
(554, 143, 6),
(555, 144, 6),
(556, 145, 6),
(557, 146, 6),
(558, 147, 6),
(559, 148, 6),
(560, 149, 6),
(561, 150, 6),
(562, 151, 6),
(563, 152, 6),
(564, 153, 6),
(565, 154, 6),
(566, 155, 6),
(567, 156, 6),
(568, 157, 6),
(569, 158, 6),
(570, 159, 6),
(571, 160, 6),
(572, 161, 6),
(573, 162, 6),
(574, 163, 6),
(575, 164, 7),
(576, 165, 7),
(577, 166, 7),
(578, 167, 7),
(579, 168, 7),
(580, 169, 7),
(581, 170, 7),
(582, 171, 7),
(583, 172, 7),
(584, 173, 7),
(585, 174, 7),
(586, 175, 7),
(587, 176, 7),
(588, 177, 7),
(589, 178, 7),
(590, 179, 7),
(591, 180, 7),
(592, 181, 7),
(593, 182, 7),
(594, 183, 7),
(595, 184, 7),
(596, 185, 7),
(597, 186, 7),
(598, 187, 7),
(599, 188, 7),
(600, 189, 7),
(601, 190, 7),
(602, 191, 7),
(603, 192, 7),
(604, 193, 7),
(605, 194, 7),
(606, 195, 7),
(607, 196, 8),
(608, 197, 8),
(609, 198, 8),
(610, 199, 8),
(611, 200, 8),
(612, 201, 8),
(613, 202, 8),
(614, 203, 8),
(615, 204, 8),
(616, 205, 8),
(617, 206, 8),
(618, 207, 8),
(619, 208, 8),
(620, 209, 8),
(621, 210, 8),
(622, 211, 8),
(623, 212, 8),
(624, 213, 8),
(625, 214, 8),
(626, 215, 8),
(627, 216, 8),
(628, 217, 8),
(629, 218, 8),
(630, 219, 8),
(631, 220, 8),
(632, 221, 8),
(633, 222, 8),
(634, 223, 8),
(635, 224, 8),
(636, 225, 8),
(637, 226, 8),
(638, 227, 8),
(639, 228, 8),
(640, 229, 8),
(641, 230, 8),
(642, 231, 8),
(643, 232, 8),
(644, 233, 8),
(645, 234, 8),
(646, 235, 8),
(647, 236, 8),
(648, 237, 8),
(649, 238, 9),
(650, 239, 9),
(651, 240, 9),
(652, 241, 9),
(653, 242, 9),
(654, 243, 9),
(655, 244, 9),
(656, 245, 9),
(657, 246, 9),
(658, 247, 9),
(659, 248, 9),
(660, 249, 9),
(661, 250, 9),
(662, 251, 9),
(663, 252, 9),
(664, 253, 9),
(665, 254, 9),
(666, 255, 9),
(667, 256, 9),
(668, 257, 9),
(669, 258, 9),
(670, 259, 9),
(671, 260, 9),
(672, 261, 9),
(673, 262, 9),
(674, 263, 9),
(675, 264, 9),
(676, 265, 9),
(677, 266, 9),
(678, 267, 9),
(679, 268, 9),
(680, 269, 9),
(681, 270, 9),
(682, 271, 9),
(683, 272, 9),
(684, 273, 10),
(685, 274, 10),
(686, 275, 10),
(687, 276, 10),
(688, 277, 10),
(689, 278, 10),
(690, 279, 10),
(691, 280, 10),
(692, 281, 10),
(693, 282, 10),
(694, 283, 10),
(695, 284, 10),
(696, 285, 10),
(697, 286, 10),
(698, 287, 10),
(699, 288, 10),
(700, 289, 10),
(701, 290, 10),
(702, 291, 10),
(703, 292, 10),
(704, 293, 10),
(705, 294, 10),
(706, 295, 10),
(707, 296, 10),
(708, 297, 10),
(709, 298, 10),
(710, 299, 10),
(711, 300, 10),
(712, 301, 10),
(713, 302, 10),
(714, 303, 10),
(715, 304, 10),
(716, 305, 10),
(717, 306, 10),
(718, 307, 10),
(719, 308, 10),
(720, 309, 10),
(721, 310, 10),
(722, 311, 10),
(723, 312, 10),
(724, 313, 11),
(725, 314, 11),
(726, 315, 11),
(727, 316, 11),
(728, 317, 11),
(729, 318, 11),
(730, 319, 11),
(731, 320, 11),
(732, 321, 11),
(733, 322, 11),
(734, 323, 11),
(735, 324, 11),
(736, 325, 11),
(737, 326, 11),
(738, 327, 11),
(739, 328, 11),
(740, 329, 11),
(741, 330, 11),
(742, 331, 11),
(743, 332, 11),
(744, 333, 11),
(745, 334, 11),
(746, 335, 11),
(747, 336, 11),
(748, 337, 11),
(749, 338, 11),
(750, 339, 11),
(751, 340, 11),
(752, 341, 11),
(753, 342, 11),
(754, 343, 11),
(755, 344, 11),
(756, 345, 11),
(757, 346, 11),
(758, 347, 11),
(759, 348, 11),
(760, 349, 11),
(761, 350, 12),
(762, 351, 12),
(763, 352, 12),
(764, 353, 12),
(765, 354, 12),
(766, 355, 12),
(767, 356, 12),
(768, 357, 12),
(769, 358, 12),
(770, 359, 12),
(771, 360, 12),
(772, 361, 12),
(773, 362, 12),
(774, 363, 12),
(775, 364, 12),
(776, 365, 12),
(777, 366, 12),
(778, 367, 12),
(779, 368, 12),
(780, 369, 12),
(781, 370, 12),
(782, 371, 12),
(783, 372, 12),
(784, 373, 12),
(785, 374, 12),
(786, 375, 12),
(787, 376, 12),
(788, 377, 12),
(789, 378, 12),
(790, 379, 12),
(791, 380, 12),
(792, 381, 12),
(793, 382, 12),
(794, 383, 12),
(795, 384, 12),
(796, 385, 12),
(797, 386, 12),
(798, 387, 12),
(799, 388, 12),
(800, 389, 12),
(801, 390, 12),
(802, 391, 12),
(803, 392, 12),
(804, 393, 12),
(805, 394, 12),
(806, 395, 12),
(807, 396, 12),
(808, 397, 12),
(809, 398, 12),
(810, 399, 12),
(811, 400, 12),
(812, 401, 3),
(813, 402, 3),
(814, 403, 3),
(815, 404, 3),
(816, 405, 3),
(817, 406, 3),
(818, 407, 3),
(819, 513, 7);

-- --------------------------------------------------------

--
-- Table structure for table `db_explicit`
--

CREATE TABLE `db_explicit` (
  `explicit_id` int(30) NOT NULL,
  `explicit_name` varchar(200) NOT NULL,
  `explicit_desc` varchar(3000) NOT NULL,
  `explicit_date` varchar(50) NOT NULL,
  `explicit_source` varchar(150) NOT NULL,
  `explicit_status` varchar(30) NOT NULL,
  `explicit_file` varchar(150) NOT NULL,
  `user_id` int(30) NOT NULL,
  `mapel_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_explicit`
--

INSERT INTO `db_explicit` (`explicit_id`, `explicit_name`, `explicit_desc`, `explicit_date`, `explicit_source`, `explicit_status`, `explicit_file`, `user_id`, `mapel_id`) VALUES
(1, 'Test Knowledge A', 'Test Knowledge AB', '31 August 2021', 'aa', 'Pending', '2518Testing Sistem.xlsx', 396, 48118);

-- --------------------------------------------------------

--
-- Table structure for table `db_explicit_comment`
--

CREATE TABLE `db_explicit_comment` (
  `comment_id` int(30) NOT NULL,
  `comment_date` varchar(50) NOT NULL,
  `comment_desc` varchar(150) NOT NULL,
  `explicit_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `db_explicit_like`
--

CREATE TABLE `db_explicit_like` (
  `like_id` int(30) NOT NULL,
  `like_date` varchar(50) NOT NULL,
  `explicit_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `db_friend_trans`
--

CREATE TABLE `db_friend_trans` (
  `trans_id` int(30) NOT NULL,
  `trans_date` varchar(50) NOT NULL,
  `user_id` int(30) NOT NULL,
  `friend_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_friend_trans`
--

INSERT INTO `db_friend_trans` (`trans_id`, `trans_date`, `user_id`, `friend_id`) VALUES
(6, '2021-08-30 17:59:08', 396, 399),
(7, '2021-08-31 15:54:53', 396, 401);

-- --------------------------------------------------------

--
-- Table structure for table `db_group`
--

CREATE TABLE `db_group` (
  `group_id` int(30) NOT NULL,
  `group_name` varchar(50) NOT NULL,
  `group_topic` varchar(50) NOT NULL,
  `group_code` varchar(50) NOT NULL,
  `group_task` text NOT NULL,
  `pembina` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_group`
--

INSERT INTO `db_group` (`group_id`, `group_name`, `group_topic`, `group_code`, `group_task`, `pembina`) VALUES
(1, 'TKJ 2 A', 'Membuka Cakrawala', 'TKJ 2 A', 'AAA', 512);

-- --------------------------------------------------------

--
-- Table structure for table `db_group_trans`
--

CREATE TABLE `db_group_trans` (
  `trans_id` int(30) NOT NULL,
  `group_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `db_gurumapel`
--

CREATE TABLE `db_gurumapel` (
  `gurumapel_id` int(10) NOT NULL,
  `user_id` int(30) NOT NULL,
  `mapel_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_gurumapel`
--

INSERT INTO `db_gurumapel` (`gurumapel_id`, `user_id`, `mapel_id`) VALUES
(1, 512, 48124);

-- --------------------------------------------------------

--
-- Table structure for table `db_login_activity`
--

CREATE TABLE `db_login_activity` (
  `activity_id` int(30) NOT NULL,
  `activity_date` varchar(50) NOT NULL,
  `user_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_login_activity`
--

INSERT INTO `db_login_activity` (`activity_id`, `activity_date`, `user_id`) VALUES
(1, '30 August 2021 09:36:53', 512),
(2, '30 August 2021 09:41:42', 429),
(3, '30 August 2021 09:58:40', 450),
(4, '30 August 2021 09:58:57', 512),
(5, '30 August 2021 10:02:07', 512),
(6, '30 August 2021 10:06:49', 450),
(7, '30 August 2021 12:55:10', 396),
(8, '30 August 2021 13:03:17', 402),
(9, '30 August 2021 13:03:50', 422),
(10, '31 August 2021 10:24:53', 396),
(11, '31 August 2021 10:59:30', 512),
(12, '31 August 2021 11:05:01', 429),
(13, '31 August 2021 11:06:38', 422),
(14, '31 August 2021 11:13:46', 396),
(15, '31 August 2021 11:22:39', 512),
(16, '31 August 2021 11:54:11', 423),
(17, '31 August 2021 19:06:27', 398),
(18, '31 August 2021 19:13:13', 494),
(19, '31 August 2021 19:33:10', 429),
(20, '31 August 2021 19:33:39', 450);

-- --------------------------------------------------------

--
-- Table structure for table `db_mapel`
--

CREATE TABLE `db_mapel` (
  `mapel_id` int(30) NOT NULL,
  `mapel_name` varchar(50) NOT NULL,
  `mapel_desc` varchar(100) NOT NULL,
  `npsn` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_mapel`
--

INSERT INTO `db_mapel` (`mapel_id`, `mapel_name`, `mapel_desc`, `npsn`) VALUES
(48112, 'Komputer dan Jaringan Dasar', '', 10603711),
(48113, 'Pemrograman Dasar', '', 10603711),
(48114, 'Dasar Desain Grafis', '', 10603711),
(48115, 'Teknologi Jaringan Berbasis Luas WAN', '', 10603711),
(48116, 'Administrasi Infrastruktur Jaringan', '', 10603711),
(48117, 'Administrasi Sistem Jaringan', '', 10603711),
(48118, 'Teknologi Layanan Jaringan', '', 10603711),
(48119, 'Produk Kreatif dan Kewirausahaan', '', 10603711),
(48121, 'Sistem Komputer', '', 10603711),
(48124, 'Sistem Operasi Linux', '', 10603709);

-- --------------------------------------------------------

--
-- Table structure for table `db_mission`
--

CREATE TABLE `db_mission` (
  `mission_id` int(30) NOT NULL,
  `mission_name` varchar(50) NOT NULL,
  `mission_task` text NOT NULL,
  `mission_target` int(10) NOT NULL,
  `mission_reward` varchar(50) NOT NULL,
  `pembina` int(30) NOT NULL,
  `mission_expired` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_mission`
--

INSERT INTO `db_mission` (`mission_id`, `mission_name`, `mission_task`, `mission_target`, `mission_reward`, `pembina`, `mission_expired`) VALUES
(1, 'Menambahkan Knowledge', 'AABC', 2, '100', 512, '2021-09-01');

-- --------------------------------------------------------

--
-- Table structure for table `db_mission_progress`
--

CREATE TABLE `db_mission_progress` (
  `progress_id` int(10) NOT NULL,
  `mission_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `total_kontribusi` int(11) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `db_mission_trans`
--

CREATE TABLE `db_mission_trans` (
  `trans_id` int(30) NOT NULL,
  `mission_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `status` varchar(50) NOT NULL,
  `verified` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `db_notif`
--

CREATE TABLE `db_notif` (
  `id_notif` int(30) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `notif_sender` int(30) NOT NULL,
  `notif_isi` varchar(50) NOT NULL,
  `notif_receiver` int(30) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `db_point`
--

CREATE TABLE `db_point` (
  `point_id` int(10) NOT NULL,
  `point_name` varchar(50) NOT NULL,
  `point_score` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_point`
--

INSERT INTO `db_point` (`point_id`, `point_name`, `point_score`) VALUES
(10301, 'Menambahkan Tacit Knowledge', 5),
(10302, 'Menambahkan Explicit Knowledge', 5),
(10303, 'Sharing Knowledge via QR', 3),
(10304, 'Mengakses Knowledge', 1),
(10305, 'VOID Tacit Knowledge', -5),
(10306, 'VOID Explicit Knowledge', -5),
(10307, 'VOID Sharing Knowledge', -3),
(10308, 'VOID Mengakses Knowledge', -1),
(10309, 'Sharing Knowledge via Tag', 1),
(10310, 'Free Lunch', 10),
(10311, 'Daily Login', 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_point_trans`
--

CREATE TABLE `db_point_trans` (
  `trans_id` int(30) NOT NULL,
  `trans_date` varchar(50) NOT NULL,
  `point_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `trans_verified` int(30) NOT NULL,
  `total_point` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_point_trans`
--

INSERT INTO `db_point_trans` (`trans_id`, `trans_date`, `point_id`, `user_id`, `trans_verified`, `total_point`) VALUES
(16, '31-08-2021 16:44:58', 10301, 396, 512, '5');

-- --------------------------------------------------------

--
-- Table structure for table `db_point_transfer`
--

CREATE TABLE `db_point_transfer` (
  `id_trx` int(30) NOT NULL,
  `date` varchar(50) NOT NULL,
  `user_id` int(30) NOT NULL,
  `total_point` int(30) NOT NULL,
  `friend_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `db_sekolah`
--

CREATE TABLE `db_sekolah` (
  `npsn` int(11) NOT NULL,
  `nama_sekolah` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `fax` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_sekolah`
--

INSERT INTO `db_sekolah` (`npsn`, `nama_sekolah`, `status`, `alamat`, `provinsi`, `kota`, `kecamatan`, `telp`, `fax`) VALUES
(10609725, 'SMK TEKNOLOGI INFORMASI BISNIS INDOSAINS', 'Swasta', 'JL. KOL. ANIMAN ACHYAD RT 25 RW 4 Suka Bangun Kode Pos 30151', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Sukarami', '0711418024', ''),
(10609734, 'SMK TELENIKA PALEMBANG', 'Swasta', 'JL. R. SUKAMTO LR. MASJID RT 5 RW 3 8 Ilir Kode Pos 30114', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Ilir Timur II', '0711378889', '0711378889'),
(10609735, 'SMK TRI DHARMA PALEMBANG', 'Swasta', 'JL. JAKSA AGUNG R. SUPRAPTO NO.18 BUKIT BESAR RT 42 RW 12 30 Ilir Kode Pos 30144', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Ilir Barat II', '362940', '362940'),
(10603719, 'SMK PELAYARAN MAKARYA PALEMBANG', 'Swasta', 'JL. BEO KOMPERTA UP III RT 0 RW 0 Komperta Kode Pos 30268', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Plaju', '085357103338', ''),
(10603681, 'SMK TRI SAKTI PALEMBANG', 'Swasta', 'JL. RAWA JAYA I NO.722 RT 12 RW 4 PAHLAWAN Kode Pos 30126', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Kemuning', '081373471686', ''),
(10609726, 'SMK MUHAMMADIYAH 01 PALEMBANG', 'Swasta', 'JALAN JENDRAL SUDIRMAN KM 4,5 BALAYUDA RT 0 RW 0 Ario Kemuning Kode Pos 30128', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Kemuning', '0711414662', ''),
(10603711, 'SMK NEGERI 02 PALEMBANG', 'Negeri', 'JALAN DEMANG LEBAR DAUN PALEMBANG RT 34 RW 11 20 Ilir Iv Kode Pos 30128', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Ilir Timur I', '0711352630', '0711310929'),
(10603724, 'SMK MUHAMMADIYAH 02 PALEMBANG', 'Swasta', 'JALAN A. YANI SILABERANTI RT 28 RW 7 Silaberanti Kode Pos 30252', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Seberang Ulu I', '0711518166', '0711518166'),
(10603674, 'SMK SETIA DARMA YPGR PALEMBANG', 'Swasta', 'DI PANJAITAN NO. 1444 RT 0 RW 0 Bagus Kuning Kode Pos 30266', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Plaju', '0711543311', '0711542085'),
(10603726, 'SMK KARYA ANDALAS PALEMBANG', 'Swasta', 'JALAN PUTAK RAYA PERUM PUSRI SAKO RT 17 RW 7 Sako Kode Pos 30163', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Sako', '0711819165', '0711819165'),
(10648144, 'SMK PELITA PALEMBANG', 'Swasta', 'JL. MAJAPAHIT RT 28 RW 3 Tuan Kentang Kode Pos 30251', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Seberang Ulu I', '081368402089', ''),
(10603716, 'SMK HARAPAN KITA PALEMBANG', 'Swasta', 'Jl. Kapten Abdullah Tegal Binangun RT 11 RW 4 12 Ulu Kode Pos 30267', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Seberang Ulu II', '081532756286', ''),
(69856920, 'SMK AULIA PALEMBANG', 'Swasta', 'JL. RE MARTA DINATA / YOS SUDARSO RT 0 RW 0 SUNGAI BUAH Kode Pos 30167', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Ilir Timur II', '', ''),
(10603700, 'SMK PELAYARAN SINAR BAHARI PALEMBANG', 'Swasta', 'JL. PERINTIS KEMERDEKAAN LRG. PASUNDAN 546 RT 5 RW 4 Lawang Kidul Kode Pos 30115', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Ilir Timur II', '0711713572', ''),
(10648174, 'SMK MUTIARA AZZAM PALEMBANG', 'Swasta', 'Jalan Bukit Baru 1 Kel Bukit Baru Palembang RT 0 RW 0 20 Ilir Iv Kode Pos 30139', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Ilir Timur I', '07115560789', ''),
(69938492, 'SMK KESEHATAN RIZKI PATYA PALEMBANG', 'Swasta', 'JL. PERUMNAS RAYA SAKO NO.245 RT RW Sialang Kode Pos', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Sako', '', ''),
(69756887, 'SMK FARMASI BINA MEDIKA PALEMBANG', 'Swasta', 'JL. MP. MANGKUNEGARA NO 15 RT 13 RT 13 RW 3 Bukit Sangkal Kode Pos 30114', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Kalidoni', '0711824784', ''),
(10603721, 'SMK NURUL IMAN PALEMBANG', 'Swasta', 'JALAN MAYOR SALIM BATUBARANO.358 SEKIP KEBON SEMAI RT 7 RW 3 Sekip Jaya Kode Pos 30126', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Kemuning', '0711357076', '0711357076'),
(10603725, 'SMK KIMIA YTK PALEMBANG', 'Swasta', 'JALAN JENDRAL SUDIRMAN KM 3,5 RT 1 RW 1 Pahlawan Kode Pos 30126', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Kemuning', '0711315966', '0711315966'),
(10603710, 'SMK NEGERI 04 PALEMBANG', 'Negeri', 'JALAN SERSAN SANI NO.1019 RT 13 RW 2 Talang Aman Kode Pos 30127', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Kemuning', '08127302258', ''),
(69929355, 'SMK YWKA PALEMBANG', 'Swasta', 'JL. KI. MAROGAN LRG. PORKA NO. 15 RT 12 RW 2 Ogan Baru Kode Pos 30258', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Kertapati', '0711510432', '0711510432'),
(69830127, 'SMK BHAKTI PERSADA', 'Swasta', 'JL. MAYJEND R.M RYACUDU NO 12 RT 1 RW 1 8 Ulu Kode Pos 30251', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Seberang Ulu I', '0711514131', ''),
(69758116, 'SMK MUHAMMADIYAH 04 PALEMBANG', 'Swasta', 'JL. DI PANJAITAN, Komp. Perguruan Muhammadiyah RT 13 RW 4 Plaju Ulu Kode Pos 30268', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Plaju', '0711540709', ''),
(10646389, 'SMK ANTARA PALEMBANG', 'Swasta', 'JL. SUKA BANGUN II RT 67 RW 5 SUKAJAYA Kode Pos 30151', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Sukarami', '0711419491', ''),
(10609733, 'SMK TEKNOLOGI NASIONAL PALEMBANG', 'Swasta', 'jln.kamil no 1061 RT 20 RW 3 Ario Kemuning Kode Pos 30152', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Kemuning', '', ''),
(10603708, 'SMK NEGERI 06 PALEMBANG', 'Negeri', 'JALAN MAYOR RUSLAN RT 31 RW 8 PALEMBANG Kode Pos 30114', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Ilir Timur II', '0711350954', '0711350954'),
(10646146, 'SMK TAMAN SISWA SUNGAI BUAH PALEMBANG', 'Swasta', 'PRAJURIT KEMAS ALI RT 29 RW 0 2 Ilir Kode Pos 30118', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Ilir Timur II', '088274183176', ''),
(10603709, 'SMK NEGERI 05 PALEMBANG', 'Negeri', 'JALAN DEMANG LEBAR DAUN 4811 RT 53 RW 15 LOROK PAKJO Kode Pos 30137', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Ilir Barat I', '0711354820', '0711354820'),
(69857920, 'SMK NEGERI 8 PALEMBANG', 'Negeri', 'Jalan Panca Usaha Rt. 58 Rw. 13 RT 49 RW 13 5 Ulu Kode Pos 30254', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Seberang Ulu I', '07115621189', '07115621189'),
(69963721, 'SMK KESEHATAN INDO HEALTH SCHOOL', 'Swasta', 'JL. MAWAR 07 SUKAJAYA RT 7 RW 2 Sukajaya Kode Pos 30151', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Sukarami', '081253202755', ''),
(10603702, 'SMK PGRI 01 PALEMBANG', 'Swasta', 'PARAMESWARA NO. 18 RT. 03 RW. 01 RT 3 RW 1 Bukit Baru Kode Pos 30139', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Ilir Barat I', '0711441374', ''),
(69755982, 'SMK PGRI 03 PALEMBANG', 'Swasta', 'JL TAQWA MATA MERAH RT 15 RW 6 Sei Selincah Kode Pos 30119', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Kalidoni', '07115626947', '07115626947'),
(10603704, 'SMK BINA CIPTA PALEMBANG', 'Swasta', 'Jl. Bina Cipta No.18 Rt.22 RT 22 RW 0 Bukit Sangkal Kode Pos 30114', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Kalidoni', '0711820611', '0711820611'),
(69897078, 'SMK GAJAH MADA 3', 'Swasta', 'JL. KH. WAHID HASIM RT 11 RW 2 1 Ulu Kode Pos 30257', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Seberang Ulu I', '0711510785', ''),
(69859654, 'SMK SJAKHYAKIRTI PALEMBANG', 'Swasta', 'JL. SULTAN M. MANSYUR RT 15 RW 70 32 Ilir Kode Pos 30145', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Ilir Barat II', '07115560096', ''),
(10647217, 'SMK MARDI WACANA PALEMBANG', 'Swasta', 'TANJUNG API-API RT 45 RW 10 Kebun Bunga Kode Pos 30152', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Sukarami', '081367753640', ''),
(70009381, 'SMK TI THAWALIB SRIWIJAYA', 'Swasta', 'Jl Talang Kemang RT RW Gandus Kode Pos', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Gandus', '', ''),
(69755983, 'SMK BINA SRIWIJAYA INDONESIA PALEMBANG', 'Swasta', 'JL. HM RYACUDU NO.24 8 ULU PALEMBANG RT 30 RW 5 8 Ulu Kode Pos 30155', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Seberang Ulu I', '0711519955', '0711519955'),
(10603701, 'SMK PGRI 02 PALEMBANG', 'Swasta', 'JL. SAPTA MARGA NO. 30 BUKIT SANGKAL RT 5 RW 1 Bukit Sangkal Kode Pos 30114', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Kalidoni', '0711812013', '0711812013'),
(10603682, 'SMK TAQWA PALEMBANG', 'Swasta', 'JALAN TAQWA MATAMERAH RT 48 RW 5 Sei Selincah Kode Pos 30119', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Kalidoni', '081273681008', ''),
(10603713, 'SMK NEGERI 01 PALEMBANG', 'Negeri', 'JALAN LETNAN JAIMAS NO. 100 RT 2 RW 1 Sei Pangeran Kode Pos 30129', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Ilir Timur I', '0711350172', ''),
(10603680, 'SMK TRISULA PERWARI PALEMBANG', 'Swasta', 'JALAN TRISULA 20 ILIR NO. 142 RT 2 RW 1 SKIP JAYA Kode Pos 30126', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Kemuning', '081272144433', '0711373719'),
(69772970, 'SMK MANDIRI PALEMBANG', 'Swasta', 'JL.PANGERAN AYIN RT 2 RW 1 Sukamaju Kode Pos 30164', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Sako', '0711818313', ''),
(10603703, 'SMK BINA JAYA PALEMBANG', 'Swasta', 'JALAN KI MEROGAN LRG. NGABEHI No.733 RT 13 RW 0 Kemas Rindo Kode Pos 30258', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Kertapati', '0711510369', '0711510369'),
(10648015, 'SMK NEGERI SUMSEL PALEMBANG', 'Negeri', 'JL.JEND.BASUKI RAHMAT NO. 2050 RT 0 RW 0 Talang Aman Kode Pos 30127', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Kemuning', '0711817025', '0711817025'),
(10603715, 'SMK ETHIKA PALEMBANG', 'Swasta', 'JALAN SEI SEPUTIH NO. 3264LOROK PAKJO RT 18 RW 5 Demang Lebar Daun Kode Pos 30158', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Ilir Barat I', '07115611440', ''),
(10603723, 'SMK MUHAMMADIYAH 03 PALEMBANG', 'Swasta', 'JALAN JENDRAL AHMAD YANI SEBERANG ULU II 13 ULUPALEMBANG RT 0 RW 0 13 Ulu Kode Pos 30263', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Seberang Ulu II', '0711516693', '0711516693'),
(10609754, 'SMK HARAPAN BANGSA PALEMBANG', 'Swasta', 'RESIDEN H. NAJAMUDIN RT 1 RW 1 Sukamaju Kode Pos 30164', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Sako', '07119254231', ''),
(10648882, 'SMK AZZAHRO PALEMBANG', 'Swasta', 'JL. KH AZHARI 12 ULU RT 6 RW 1 12 Ulu Kode Pos 30262', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Seberang Ulu II', '0711518676', ''),
(10603677, 'SMK XAVERIUS PALEMBANG', 'Swasta', 'JALAN BETAWI RAYA SAKO NO. 1707 RT 26 RW 7 Lebong Gajah Kode Pos 30163', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Sematang Borang', '0711824264', '0711824264'),
(69772973, 'SMK KESEHATAN ATHALLA PUTRA PALEMBANG', 'Swasta', 'Jl. Kopral Daud No.2193 rt.32 RT 32 RW 8 20 Ilir I Kode Pos 30126', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Ilir Timur I', '351502', ''),
(69772971, 'SMK PERBANKAN ALUMNIKA PALEMBANG', 'Swasta', 'JL. Perindustrian II Ujung No. 1884 Sukadamai, Kebun Bunga RT 0 RW 0 Pahlawan Kode Pos 30151', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Kemuning', '07115611910', '07115611401'),
(69897042, 'SMK ASSANADIYAH', 'Swasta', 'JL. KH. BALKHI LR. BANTEN V RT 0 RW 0 16 Ulu Kode Pos 30265', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Seberang Ulu II', '0711516266', ''),
(10603679, 'SMK UTAMA BAKTI PALEMBANG', 'Swasta', 'JL. STM UB LEBONG SIARANG RT 49 RW 6 Sukajaya Kode Pos 30151', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Sukarami', '0711414548', '0711414548'),
(10603684, 'SMK TAMAN SISWA 01 PALEMBANG', 'Swasta', 'JALAN TAMANSISWA NO. 261 RT 0 RW 0 20 Ilir I Kode Pos 30126', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Ilir Timur I', '0711320795', ''),
(69964521, 'SMK SETIA DARMA 2 PALEMBANG', 'Swasta', 'Jl. Talang Kerangga RT. 20 RW. 07 RT 20 RW 7 30 Ilir Kode Pos 30144', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Ilir Barat II', '07115734605', ''),
(10647495, 'SMK MADYATAMA PALEMBANG', 'Swasta', 'JL. PERTAHANAN RT 41 RW 0 16 Ulu Kode Pos 30265', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Seberang Ulu II', '07115742295', ''),
(10609727, 'SMK BAKTI IBU 03 PALEMBANG', 'Swasta', 'SERASI II KM 13 PALEMBANG RT 0 RW 0 Sukodadi Kode Pos 30154', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Sukarami', '07115645077', '07115645077'),
(10603718, 'SMK PEMBANGUNAN YPT PALEMBANG', 'Swasta', 'JALAN D. I. PANJAITAN LRG. PEGAGAN NO. 36 RT 47 RW 15 Plaju Darat Kode Pos 30126', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Plaju', '0711516348', '0711516348'),
(10603685, 'SMK SWAKARYA PALEMBANG', 'Swasta', 'JALAN SOSIAL KM. 5 NO. 472 RT 5 RW 3 Ario Kemuning Kode Pos 30128', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Kemuning', '07115710643', ''),
(10609729, 'SMK PERHOTELAN INDONESIA PALEMBANG', 'Swasta', 'Jl. Kol. H. Burlian Lr. Kamil No. 1061 Kel. Sukabangun RT 20 RW 3 Ario Kemuning Kode Pos 30151', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Kemuning', '07117012677', '0'),
(10603705, 'SMK ARINDA PALEMBANG', 'Swasta', 'JALAN ANGKATAN 45 NO. 47 RT 0 RW 0 Lorok Pakjo Kode Pos 30137', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Ilir Barat I', '0711351223', ''),
(10603717, 'SMK PEMBINA 01 PALEMBANG', 'Swasta', 'JENDRAL BAMBANG UTOYO 179 PALEMBANG RT 0 RW 0 5 Ilir Kode Pos 30116', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Ilir Timur II', '0711710349', '0711710349'),
(10603683, 'SMK TAMAN SISWA 02 PALEMBANG', 'Swasta', 'JALAN TAMAN SISWA KEPANDEAN BARU NO.261 RT 8 RW 0 20 Ilir I Kode Pos 30125', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Ilir Timur I', '0711320482', ''),
(10646186, 'SMK KRISNA PERSADA PALEMBANG', 'Swasta', 'JL.Ratu Sianum Lr. H. Umar Palembang RT 19 RW 3 1 Ilir Kode Pos 30116', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Ilir Timur II', '5714441', ''),
(10647807, 'SMK AISYIYAH BID KEAHLIAN FARMASI PALEMBANG', 'Swasta', 'JL. KOL. H. BURLIAN NO. 1032 KM. 7,5 PALEMBANG RT 4 RW 14 Karya Baru Kode Pos 30152', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Alang-Alang Lebar', '0711421553', ''),
(10609724, 'SMK TEKNOLOGI BISTEK', 'Swasta', 'JALAN KOL. H. ANIMAN ACHYAD NO. 1446 B RT 25 RW 3 Suka Bangun Kode Pos 30151', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Sukarami', '07115715197', ''),
(10609732, 'SMK PEMBINA 02 PALEMBANG', 'Swasta', 'JENDRAL BAMBANG UTOYO 179 PALEMBANG RT 1 RW 2 5 Ilir Kode Pos 30115', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Ilir Timur II', '07117078594', '0711710349'),
(10603707, 'SMK NEGERI 07 PALEMBANG', 'Negeri', 'JALAN NASKAH II KM 7 NO. 733 KEL. SUKARAMI RT 47 RW 13 Sukarami Kode Pos 30152', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Sukarami', '0711414854', '0711415116'),
(10609730, 'SMK RA KARTINI PALEMBANG', 'Swasta', 'SUNGAI SAHANG NO. 5 RT 59 RW 14 Lorok Pakjo Kode Pos 30137', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Ilir Barat I', '0711365968', '0711365968'),
(69965174, 'SMK SHAILENDRA PALEMBANG', 'Swasta', 'JL. D.I. PANJAITAN LR. CIVO No. 49 RT.01 RW.01 RT 1 RW 1 Bagus Kuning Kode Pos 30266', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Plaju', '07115740725', ''),
(10646388, 'SMK FARMASI PALEMBANG', 'Swasta', 'JEND. BAMBANG UTOYO NO.179 RT 1 RW 2 5 Ilir Kode Pos 30115', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Ilir Timur II', '0711710348', ''),
(69952601, 'SMK KESEHATAN KADER BANGSA', 'Swasta', 'JL. KH WAHID HASYIM 5 ULU KEC. SEBERANG ULU 1 KOTA PALEMBANG RT 22 RW 6 5 Ulu Kode Pos 30254', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Seberang Ulu I', '0711515151', '0711515151'),
(10603675, 'SMK YP GAJAH MADA PALEMBANG', 'Swasta', 'JL. BANTEN II NO.82 RT 01 RW 02 plaju RT 2 RW 1 16 Ulu Kode Pos 30265', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Seberang Ulu II', '511937', '518751'),
(70006391, 'SMK TUNAS HARAPAN PALEMBANG', 'Swasta', 'Jl. MP Mangku Negara RT RW 8 Ilir Kode Pos 30114', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Ilir Timur II', '', ''),
(69838800, 'SMK METHODIST 02 PALEMBANG', 'Swasta', 'JL. KOLONEL ATMO N0 450 RT 10 RW 4 17 Ilir Kode Pos 30125', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Ilir Timur I', '0711351473', '0711374155'),
(10609738, 'SMK PELAYARAN PANGGALI NUSANTARA PALEMBANG', 'Swasta', 'JL. D.I. Panjaitan Gg. Adil No.10 RT.30 RW.10 Plaju Palembang RT 10 RW 30 Plaju Ulu Kode Pos 30266', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Plaju', '0711542845', '0711542845'),
(10603712, 'SMK NEGERI 03 PALEMBANG', 'Negeri', 'JALAN SRIJAYA NEGARA BUKIT BESAR RT 31 RW 10 Bukit Lama Kode Pos 30139', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Ilir Barat I', '0711351816', '0711351816'),
(69786202, 'SMK PENERBANGAN SRIWIJAYA PALEMBANG', 'Swasta', 'Jl. M. Yusuf Zein No.3 RT 016 RW 006 Kel. Talang Betutu Kec Sukamari RT 1 RW 1 Talang Aman Kode Pos 30155', 'Prov. Sumatera Selatan', 'Kota Palembang', 'Kec. Kemuning', '082281082807', ''),
(99991921, 'SMK PETERNAKAN', 'Negeri', 'JL KEDONDONG', 'Sumatera Selatan', 'Kota Palembang', '', '1111', '1111');

-- --------------------------------------------------------

--
-- Table structure for table `db_tacit`
--

CREATE TABLE `db_tacit` (
  `tacit_id` int(30) NOT NULL,
  `tacit_name` varchar(200) NOT NULL,
  `tacit_desc` text NOT NULL,
  `tacit_date` varchar(50) NOT NULL,
  `tacit_source` varchar(150) NOT NULL,
  `tacit_status` varchar(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `mapel_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_tacit`
--

INSERT INTO `db_tacit` (`tacit_id`, `tacit_name`, `tacit_desc`, `tacit_date`, `tacit_source`, `tacit_status`, `user_id`, `mapel_id`) VALUES
(1, 'Contoh Test A', 'Contoh Test A - Description', '31 August 2021', 'ABC', 'Pending', 396, 48116);

-- --------------------------------------------------------

--
-- Table structure for table `db_tacit_comment`
--

CREATE TABLE `db_tacit_comment` (
  `comment_id` int(30) NOT NULL,
  `comment_date` varchar(50) NOT NULL,
  `comment_desc` varchar(150) NOT NULL,
  `tacit_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `db_tacit_like`
--

CREATE TABLE `db_tacit_like` (
  `like_id` int(30) NOT NULL,
  `like_date` varchar(50) NOT NULL,
  `tacit_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_tacit_like`
--

INSERT INTO `db_tacit_like` (`like_id`, `like_date`, `tacit_id`, `user_id`) VALUES
(1, '31 August 2021', 1, 512);

-- --------------------------------------------------------

--
-- Table structure for table `db_user`
--

CREATE TABLE `db_user` (
  `user_id` int(11) NOT NULL,
  `user_nip` varchar(30) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_gender` varchar(12) NOT NULL,
  `user_photo` varchar(150) NOT NULL,
  `user_role` varchar(20) NOT NULL,
  `npsn` int(11) NOT NULL,
  `user_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_user`
--

INSERT INTO `db_user` (`user_id`, `user_nip`, `user_name`, `user_gender`, `user_photo`, `user_role`, `npsn`, `user_password`) VALUES
(2, '37668', 'ANDRIAN KASPARI', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '512f3a7ea5520eae3b54a77c0497489e'),
(3, '37669', 'AKHMAD RIZKY', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'f493971809a5352fbc493e2b7e7f7110'),
(4, '37670', 'ALFIN BAYAS', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '82c915bca7537ef11265aa134511f272'),
(5, '37671', 'ALWI NURROHIM', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'bcad7af0b6045c9f0408da9661f9f722'),
(6, '37672', 'ARYASATYA KOHARI', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '302eaddd535e22628c7df880385b95ae'),
(7, '37673', 'AZIZ IRAWAN', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '1c4ec9002d8f6c1ddae5c151e48cf718'),
(8, '37674', 'CUT DINDA ALYA PUTRI', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, 'd79b5c2f0375f87503706a142964d7d5'),
(9, '37675', 'DILLA KHOIRUNNISA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '8093f823794b8fa03c379c035300fd0b'),
(10, '37676', 'FARHAN ZAHMIDDIN', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'b42c757f1e5172e5937125a809c22547'),
(11, '37677', 'FEBY ANGGRAINI PUTRI', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '7da58332a407cf34d87ea109fdfba52f'),
(12, '37679', 'FIRSAL CARLES', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '6a307655ba6a4f31e4f2da46d7516c84'),
(13, '37680', 'GILANG ROMADHON', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '1d87251152320b350200bc9631c67ea9'),
(14, '37681', 'HAFIDZ ILHAM MAULANA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'bd1ce36d68a5c2bea97fe45863673b20'),
(15, '37682', 'MUHAMMAD DIMAS VADITHYA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '0569ec9efdb7697ed2a067e344cba5a0'),
(16, '37683', 'MUHAMMAD GARINZA DIRGARAYA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'f832012aa9c2b51641e64e901024047c'),
(17, '37685', 'MUHAMMAD RIZKI NANDA PRATAMA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'bb0a0733bc8d9717cb28e6a5d96c6eaf'),
(18, '37686', 'MUHAMMAD SYAHRUL WIJAYA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '74e2945e57b290b98755a5f3f4468cb3'),
(19, '37687', 'NADIA ADELIA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, 'db24bbacb007d5a7f3de3b0fce43e21f'),
(20, '37688', 'NADILLA AULIA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '803a22a4f895443f75e211ea30d19c7f'),
(21, '37689', 'NURIZKA ANDINA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, 'b1e338ed748ad70afeaca9c791ffca43'),
(22, '37690', 'NYIMAS DESY ZAHARA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '1366e1015bac7aa81e30e421c14c0a7c'),
(23, '37691', 'FIRDAUS DENI  ANDRIAN WOLONTERI', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '62726dd6010ec676276d3e66a52ae5d6'),
(24, '37692', 'PRABU AZIZ HAFIDH FIRDAUS', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '9dbada65d952fb14e0271f101be95d43'),
(25, '37693', 'PUTRI', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '1abc4fdd9a4618af701a709a0cf042fa'),
(26, '37694', 'RIZKY GILANG RAMADHAN', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '463ea0572c257e83990249ebddbb8ccb'),
(27, '37695', 'RIZQI AKBAR RAMADHAN', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'b58b6413173d60d06c392b7f1e77d2c9'),
(28, '37696', 'SALMA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '5952ec3c4ee2b4cef6e2ca4e131a54eb'),
(29, '37697', 'SALSABILA AMALIA FEBRA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, 'bff5992111ba4c548364f2a68998634b'),
(30, '37698', 'SITI AZZAHRA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '232f983bd0b0c382d0844f118072f725'),
(31, '37699', 'STEPY HARYANI', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '21b1a8129e987682b9ee28f6eaf36a0f'),
(32, '37700', 'TIARA WIJAYA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '5a628fa66251ccace84659b5a1128f97'),
(33, '37701', 'TRIO PRABOWO SM', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'a59e3dbde6c1420a4940b07ed8c96c47'),
(34, '37702', 'WANDA SAFITRI', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, 'a333e28e13fad944153b8375bf5cab8d'),
(35, '37703', 'AGUNG NUGROHO', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '0a8b2799af5e9b658b8fdb0558fc99c8'),
(36, '37704', 'AKBAR WIJAYA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'ec3b845037b384da387d9cd90cd03410'),
(37, '37705', 'ARIF  NUR  HIDAYAD', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'fab69eaff79e0c77c68cc47c0fdfc6b6'),
(38, '37706', 'DAVIN PRADIPTA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'bed661249f23a7680d776e668cd73d08'),
(39, '37707', 'DONI AHMAD KURNIAWAN', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '7aeb49ed1f0520808e3d0be990604367'),
(40, '37708', 'FITRI YANTI', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '2fffde9ff653ce8be34a85748b4a18a2'),
(41, '37709', 'INDAH IRA SYAEFINA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '37ac2a98f08788d53f5842c20c58f73b'),
(42, '37710', 'ISNA KHORUL AZIZAH', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '697d9e52caed2849d7e146c5f8c8c0d5'),
(43, '37711', 'LEO AKBAROKA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'dbe3bcfb77f7bcbb56c0a4e7e3200e54'),
(44, '37712', 'MUHAMMAD  RAFI  ABDILLAH', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'c8aac3305163e4e8146ec929d36cf85c'),
(45, '37713', 'MARSANDA ELIZA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '4c28db6cc0ca101caa574083cf238466'),
(46, '37714', 'MIRANDA AULIA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, 'af71ec119ea85c90eab9d7d5e8eeb94d'),
(47, '37715', 'MUHAMMAD AL FAJRI', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '9ea43ce8c6210940b0d770345072b43e'),
(48, '37716', 'MUHAMMAD ARIEF TANDIO', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'a0159473c23821556b1f5fb937e1b640'),
(49, '37717', 'MUHAMMAD DAKA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '364154911ada592eb2cdbb776033ebce'),
(50, '37718', 'MUHAMMAD DIMAS ALGHIFARI', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '06a86f0e78a16e1a8628128cf1fd3a9f'),
(51, '37719', 'MUHAMMAD FAJAR NUR RAHMAN', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'abd69bbc2c51e3be894a2b70d08ee4fc'),
(52, '37720', 'MUHAMMAD FEBRI ADHA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '6a26800f2276dd0c5a7b6cf491647f96'),
(53, '37721', 'MUHAMMAD RIZKY AMALSYAH', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '3a3b7accf5943bdf3781f2afa5ccd1eb'),
(54, '37722', 'MUHAMMAD SUGILANG', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'c221f226cd5ae67089a479f360bfa594'),
(55, '37723', 'MURSANTRI', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '0c7f4235270e061c4a70e6135a50f019'),
(56, '37724', 'NILAM MUTIA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, 'dd11c865b834ce8c3cfc0ad3adee5e64'),
(57, '37725', 'NOVI   JULIYANTI', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, 'b1494532125308790dff5321c7a762ad'),
(58, '37726', 'NUR TRISYA NOVITA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '594b8b3aac1df65638a4cdcd8f627666'),
(59, '37727', 'RAIHAN   MEDISYAH   PUTRA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '3dacb5aa2b6b614b680cea555a4e6726'),
(60, '37729', 'REYNALDI SURTAPAN', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '222768daf052ac21011033265af61211'),
(61, '37730', 'RIJKI VEBRIANTI', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '17701af64978e5bba3acc34fa30981d0'),
(62, '37731', 'RISKA  ARDILAH', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, 'bcee397c146136f405865adcf1655207'),
(63, '37732', 'SILSI  ADELIA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '2fba9547f91cd8d8bf0601fb2cb61dff'),
(64, '37733', 'SITI HANNA TRIA AGUSTIN', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '51a3f1d4522af45e0e2b5f3d86f8e1c2'),
(65, '37734', 'SULTAN DAFFA  FATTARSYAH', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'ca1a4a8c9b1cf2281c552bec03dfb2c4'),
(66, '37735', 'TIO FARHAN HIDAYAT', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '597d4991920fe5d7c7da46e5384dc461'),
(67, '37736', 'WAHYU NUR ALIF', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'b9806a6643e2082feca9f8b42572063e'),
(68, '37737', 'ADELIA IRAWAN PUTRI', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '6dca0fba2a2b3ec808b388ea6cb8814b'),
(69, '37738', 'AHMAD FAUZAN', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'b82c2affa38c869bee8b7f9b5f05189b'),
(70, '37739', 'ALIFA SALSABILLA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '865e5be9fa1ea5a7681f8fa5def5b280'),
(71, '37740', 'ARDIE APRIANSYAH PERDANA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'e6a88dfc188ba5548572029ca1d0d273'),
(72, '37741', 'ARIF SAPUTRA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'aa5b738616facb0e2b0409c547b338d7'),
(73, '37742', 'ARYO WIRANATA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '32b3a77ea9bad80af37f4d566b5482f6'),
(74, '37743', 'BINTARI ZAHIRA FIRDAUS ', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '1abcd28456bfceea24ad41e53a3f9a4a'),
(75, '37744', 'DAVINA ATHIYA RAMADANTY', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '322842c2ab91400f806ddb8a8f0647c0'),
(76, '37745', 'DEWI ANZANI', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '871035ec5613dfdd75b913890257f0f8'),
(77, '37746', 'EGA OKTARINJANI', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '0c73a58dcab181744b8a520a6f80f998'),
(78, '37747', 'FITRIA PRATIWI', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, 'aacdba4f27d947d222396a6eb7d7a7af'),
(79, '37748', 'LEO PERDANA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '23bc3ae5e041fe4e124c6b5e1c673073'),
(80, '37749', 'MUHAMAD IQBAL ADE REJEKI', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '47c163fdd17555a113d90be51ba939cc'),
(81, '37750', 'MUHAMMAD ALFATHUL AKBAR', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'cd0973da79d301fb821f4aae71f36173'),
(82, '37751', 'MUHAMMAD IRFAN SAKTI', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '56dfcaf2665b93ddeb01dfde7981c832'),
(83, '37752', 'MUHAMMAD KASYFILLAH AL SABIQ', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'a20f378f67e0d2904f6887dfc24ed316'),
(84, '37753', 'MUHAMMAD MAULADI', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '7e1e22a62ee38a4a0fb3e0daf5be492e'),
(85, '37754', 'MUHAMMAD RIFQI', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'cf01a4dac6d72a27e17f23c93ab036d6'),
(86, '37755', 'MUHAMMAD RIZKY RAMADHIAN PUTRA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'd9106553cc5dcab924a87b57eb707fdd'),
(87, '37756', 'MUHAMMAD RIZKY RAMADHON', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'fd17be0e14bb74f125868e331a111448'),
(88, '37757', 'MUHAMMAD SAEED HUDAIFI', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '88a3a0c581c95b9c66fd7d0924295d1f'),
(89, '37758', 'MUHAMMAD VALENNTINO ANDESPA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '0d4b4d86ad5494dd9816cbf00dde7b73'),
(90, '37759', 'MUHAMMAD YUSMAN FIRDAUS', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'f6cfa63e87f868894fd3ecaa4d0fa6e3'),
(91, '37760', 'PANCA PUTRA PAMUNGKAS', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '9f86fcd5de31459d5f88ce83ea43d509'),
(92, '37761', 'RAMADON', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'c526837ad41a5fab7c87fe6cedcdb584'),
(93, '37762', 'RENDY KURNIAWAN', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '7516d7106108f69198956ea878e0dd9e'),
(94, '37763', 'RICHARD ANDREANO', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'd0cbb81ea2db4fa36a4f3321c964099b'),
(95, '37764', 'RISKA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '4d67c8d359f4940fccc597021f79d625'),
(96, '37766', 'SELLY PUTRI ADELIA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, 'c9b7db2d847e72e4cf34458ab1b17f68'),
(97, '37767', 'SHARLA DESWINDA MARTIZA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '8b48b3ca4e8d5eceaae8e5864b25650f'),
(98, '37768', 'SITI NUR HAMIDAH', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, 'fdb97f0608671fde48e1087650cf1a0f'),
(99, '37769', 'TRI PUJIANSYAH', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '0620eda93d00f0dca03b1473d7e5d0f5'),
(100, '37770', 'TRIYA NURLITA SARI', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '10b3fa0797107c0b109a24fa9533e02f'),
(101, '37771', 'YESSI AGUSTINA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '079a397541e3aa20e03914372e71d3a7'),
(102, '37772', 'A. REZA PAHLEVI', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '110012b5e9372ff04fc7e4de7e3a9d13'),
(103, '37773', 'ACHMAD HASAN', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '89ffff7b8d7d48403685344754816cf3'),
(104, '37774', 'AFALAH RAFLI AL-HADI', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '5bbf0b1a188dba2f1fbbc0366538ce5a'),
(105, '37775', 'AL-FINA DAMAYANTI', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '0f18e4824fc601cd270a4d31b084bb5d'),
(106, '37776', 'ANDIKA PUTRA PRATAMA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'efaee7456f7f0595875626c8b9588f31'),
(107, '37777', 'ANDREAN MAULANA KUSUMA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'cd609b87010be3afcf62a2b2b94a37b2'),
(108, '37778', 'ANNE TRIMAYSELLA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '045a1fb3d059ec8dbeefa2a4b616e511'),
(109, '37779', 'ARSYA SHALIH SANTOSA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '2d8c0d20c0462081698440eb720f27b6'),
(110, '37780', 'DINI ANGGRAINI', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '6a83cd48b0fc245146c20bfed5223a60'),
(111, '37781', 'ELYSYA ARANDA PUTRI', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, 'b41b85ff7b1515b03b8081eb5b03392e'),
(112, '37782', 'FATURROHMAN', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '1e7bee8c2dde077999bb66d6bbc8b278'),
(113, '37783', 'KARISA DWI HERIA ROSA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, 'c845225d5c3e731efe343997f03eee08'),
(114, '37784', 'M. RENALDI', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'ffd8e07fb9c00a39c7bbc04f2ff70182'),
(115, '37785', 'M. WIRAYUDA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '9a641c69cf5186982e8ac8c4e06e80f4'),
(116, '37786', 'M.DENDY RAJABBANI', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '96afaeb659bc311c0c012f5cefdf5ca8'),
(117, '37787', 'MARIANI', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, 'bbeb39a6407d964feec2fc19b22e52aa'),
(118, '37788', 'MOH DHAVA ANUGRAH', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '6af61fb573a8011b0b15832b1c9201d3'),
(119, '37789', 'MUHAMMAD AFIF RAFIKI', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '6d9292034eae369e7d6808ee56589403'),
(120, '37790', 'MUHAMMAD DAFFA NUGRAMAHESA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '26bcbaf7ca44900a38ee83ccdf9adb36'),
(121, '37791', 'MUHAMMAD DANU', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '62a5a1b5c98bf0e46e76dbfe74c403f0'),
(122, '37792', 'MUHAMMAD HUSAINI HASYIM', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'fb9dacac1df826947dad78a6e9eaa48e'),
(123, '37793', 'MUHAMMAD IRPANDI', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'e5112e4098b5067659fd84a835110ebc'),
(124, '37794', 'MUHAMMAD TIO FIERO', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'ee533707fcf5a2b294b871736aa829f7'),
(125, '37795', 'MUTIARA WAHYUNI', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '65047f0d499cdb89434e5932d51b467c'),
(126, '37796', 'RAZAN IQBAL DAELAMI', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'ab10d2424eae595b20eb56a101d1cea2'),
(127, '37797', 'RICO HISBULLAH AKBAR', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'b08d0817aad99cc2786b1485aacc3aa0'),
(128, '37798', 'RIMA SUCI TRIASA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, 'a8ee5e7260ae56486e1468356f780283'),
(129, '37799', 'SHEPIA ARYANTI', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '4abece55286a5b88ab94dc570e9663c5'),
(130, '37800', 'TAMARA HAFIZHAH', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, 'f67326bcb522ec5d2f8e79feb0d29c57'),
(131, '37801', 'TAUFIKQURRAHMAN RAMADANI', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '456c9caa8ade0846892f33f04e9b466a'),
(132, '37802', 'TIA DWI DAMAYANTI', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, 'aee60e7c0f2b718fc95d37e2e5acf39b'),
(133, '37803', 'UMIYAH', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '4b438fa04c98922aaa349d0334d4a282'),
(134, '37804', 'VIRNA MUTIA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '158c8658fc5752fd8e35e959e8d35d38'),
(135, '37805', 'WAHYU DEFRILIAN', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '1768fdbdf94f1a65de7f0885a4b67400'),
(136, '37806', 'YESA ALZA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '08af6cf557f9870723efedef29a84bfa'),
(137, '38440', 'ABIMANYU  FEBRI  DWI IRWENZA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '92302a7fbbff3bf9922e11b2869b16a8'),
(138, '38441', 'ADINDA SALSABILA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '4c64c4b4bd58084a33c95731fea410ee'),
(139, '38442', 'AHMAT  KORI\'A', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '926cf03582f4e8dabdada2c96157aeae'),
(140, '38443', 'AISHA NURAINI KUSUMA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, 'a15526d73d2df0af8cc8fb8637673950'),
(141, '38444', 'AISYAH SALSABILA AZZAHRAH', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, 'd3e8129138f2c76dc6e4048281160fe0'),
(142, '38445', 'ASTRI MUTIARA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, 'e9c700f235913d4596ee0d31be174539'),
(143, '38446', 'BENY HIDAYAT NURSYAFIQ', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'd75f18d5cef24fc18b544ae718588d66'),
(144, '38447', 'CHOIRUN NISSA OKTARIANA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, 'b5725710206a2753ff5a685c2a52365e'),
(145, '38448', 'ELIEZER ADITYA DWIPUTRA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '0d7f2e501e1b48b19fe001b9b9d1b69d'),
(146, '38449', 'FADHLRAHMAN FITRA ARSIL', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'b4624271eb5857decee95b33f761d501'),
(147, '38450', 'FAHRIL HERNANDAR R Y', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '4fedf8bebdf009aa7365fbbb8d71df4e'),
(148, '38451', 'GITA  AVRIELLIA   INDRIANI', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '261258fa9daa95e7a0dd8872229b63b2'),
(149, '38452', 'GITA  FEBRIYANI', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, 'd31687df38ba75b6ccd90522d024a51b'),
(150, '38453', 'M DEFRAN RIZKI WIJAYA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '94d5f5ee8c271ca277bd8f34b62fcdf9'),
(151, '38454', 'M FARREL AL FATHIR', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'e6964314af433b4e0457fdba57c06f58'),
(152, '38455', 'M. ARYA  PUTRA PERDANA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '08159ead6e401859dac5337cf2df68e3'),
(153, '38456', 'M. ILMI MUZAMMIL', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '168f6cac16567296b81233afac6f127b'),
(154, '38457', 'MARCO SAPUTRA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '5673dc2589a9a56aed75fc276a1523d2'),
(155, '38459', 'MICHAEL WENLIU HERMANSYAH', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'e06e7f5b7285aa53f6ea6971313c9b6d'),
(156, '38460', 'MOCH FAUZAN ALFFALA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '5782efc436ca617a069a0cbc86f5f371'),
(157, '38461', 'MUFTAHUL  NAUFALDI', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'b0f742791bdc5ed80211d28178d2df18'),
(158, '38462', 'MUHAMMAD  ALDY  FERDIANSYAH', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '3584e0ecbb38446186af162ad04f99d2'),
(159, '38463', 'NASHWA  KAMILA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '3715e8a79b3b9622c179617533e5654f'),
(160, '38464', 'NASYWA  FITRI  ADELIA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '3023c406ef2d08a3021908f6f79bfea2'),
(161, '38465', 'RAFLY RAHMAT FADLY', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'de2750012f59f45d5b4d05c78c263bd9'),
(162, '38466', 'RAYHAN FADHEL SYAMSUAR', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '58afaf854f7536735ca81d981300eb12'),
(163, '38467', 'RETNO  PUSPA PANDINI', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '6cb7f43fec13e471a347be105e7cbd08'),
(164, '38468', 'TRI WAHYU CAHYO SEPTA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'd73084414361442cb1fd4d659b395c38'),
(165, '38469', 'WAHYU KURNIAWAN', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'db59312b9eb5439bf9e3c66374aed1f7'),
(166, '38470', 'WILLIAM MIKHA NAHUPAIDO S', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'e5921a80ed7efb78f3d10d363639f8d4'),
(167, '38471', 'YABES PASKAH HUTABARAT', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'de6f7586f83311fe5a7e5b86b477d0fc'),
(168, '38472', 'YOESTA  WIDYA  PUTRI', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '7906284305fc6984edcfdb195191295c'),
(169, '38473', 'ZWETA  ANGGUN  SYAFARA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '2cf591de12a0bf62b7416c93688c8e91'),
(170, '38474', 'ADHIED TRIE JUNI SUNARTO', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'fcb81d80812ce559d11b778ac709b82a'),
(171, '38475', 'AHMAD JIBRAEL ALGANDI', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '8856dab46f054f6ad9c0f46fe7f0a9f2'),
(172, '38476', 'AIMAN WIRA PRADHANA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '55f8c1c115741faf7519ccc644af7074'),
(173, '38477', 'AISYAH AMALIA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '2149347baf196b460776a239583cc183'),
(174, '38478', 'AISYAH RAMADHANTI', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, 'c1351b04bf9a2230a72c31cb0d21f0ce'),
(175, '38479', 'AMANDA WAHYU IZTIAZAH', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, 'fd00972962a2199dad9533366040fe2b'),
(176, '38480', 'AMAR FAHMIRZA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '72538b53ffe9beb63d6f5650455c0f8f'),
(177, '38481', 'ATER ANTOLIN', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'ca54ba6dcc222ed22aea916bee8d50ec'),
(178, '38482', 'AZ SYAH GUTI ALDAI', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'bc8d6aba5adbf273abc6c98a41bee213'),
(179, '38483', 'DEA ARDYANTI', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '92f812afafa48c6f79dbf10ea1c4e901'),
(180, '38484', 'DHAFIN ARMANDO RAYHAN SIREGAR', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '8d6bb63cd30962947301a373dee84121'),
(181, '38485', 'FADILLAH FAJRIANSYAH', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'ca1f85ef496eab54e49488b53bf20f1e'),
(182, '38486', 'FERDIANSYAH DARMAWAN', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '0141f065e310a9e40011628269e71ded'),
(183, '38487', 'GOFRAN MUTTAQI LIKHAN', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '522bfd1b063080c9c6aa957b01f33005'),
(184, '38488', 'M JESEN PRASETIO', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'e68cbfef263b257c70ae1d53ac5b61fb'),
(185, '38489', 'M TRY AGUSTIAN', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '5a5cd9f41d8c9faf0aced7a635f542d4'),
(186, '38490', 'MUHAMAD DHAFA ADJI SAPUTRA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'bb4df4040cf296bb8e3e4e090827da37'),
(187, '38491', 'MUHAMMAD ADHA PERDANA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'a376ac5ee112e4c8553fc20504bdbc3c'),
(188, '38492', 'MUHAMMAD ALDIMAZ PUTRA DENA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '6d27466e8d5feb302b427042e1034d63'),
(189, '38493', 'MUHAMMAD ANUGRAH SAPUTRA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '22577e7367493626709c7de5cf42f34e'),
(190, '38494', 'MUHAMMAD PRATAMA KASALRI', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'ac3e8c12239b89993979761d511af70f'),
(191, '38495', 'MUHAMMAD RAHMAD ALDI', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '54d85234747629f4657711d7317d3dea'),
(192, '38496', 'MUHAMMAD REIHAN ANANDA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '06aee742b0dcc14165dfdfb53fc054a8'),
(193, '38497', 'MUHAMMAD RIFFHA NAHOYA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'bcc0b5d61338c62fd2959fa10df359a0'),
(194, '38498', 'NADIA PRATIWI', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, 'db15ebe51cd11e718e55244d7440ff7d'),
(195, '38499', 'NASYWA KAMILLA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '53c2bdd5d508f5cbe32477af2aeae3b0'),
(196, '38500', 'NATASIA ANGGIA PUTRI', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, 'ca2e19d1326c3a3e5382646b05217e95'),
(197, '38501', 'PUTRA APRIYADI', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'cda8323e7b825035a16cce8f275d665c'),
(198, '38502', 'REVO PUTRA ALAMSYAH', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'c071a852d568a68025d4c3e14ed9f77d'),
(199, '38503', 'SALWA FADHILAH', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '93b5c9eb03b464a5c4b26f545665ce2a'),
(200, '38504', 'SENDY HERFIMADONI', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'a24cdee57977b51ba2efc56db5953139'),
(201, '38505', 'SHADAM GUPPALA ALFARISI', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '6b5a92b852f6c19dd5933cd7df67c241'),
(202, '38506', 'SUCHI TIARA AMRINDAH', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, 'c6af42b259dd217b3894c0b461ff297c'),
(203, '38507', 'SYAFIQ FADHLULLAH', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '30ea3d69405be8291554115d415c593d'),
(204, '38508', 'ACHMAD ALHICAR IVANTAMA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '0bc83ea8ff49be449f4372a749ed57cd'),
(205, '38509', 'AFIF FATHAN ANGGANA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '8bd73c11f9e36c039ff3cee4f3f5e2d2'),
(206, '38510', 'ALHAKIM AZIZ TAMSIL', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '67f55bdfb5f4a130f5b5d53dbcd915e5'),
(207, '38511', 'ANGELICA WULAN DARY S', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '4296da69be22a4b4b305541fa13a8c41'),
(208, '38512', 'ANGGA PRATAMA S', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'ed372ed3fe48cd3981cc5aaf74ffe1f3'),
(209, '38513', 'DOV VONG MUHAMMAD RACHMAN', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'aa6ad16af025938401f07d1ccccc411b'),
(210, '38514', 'DWI RIZKY PRATAMA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'cb4fb8ff74d13fd168c9d16414c08b8c'),
(211, '38515', 'GLENNESIUS NATHANAEL AMBARITA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'd33fc27e8d0ecbfc11e16d20e723991d'),
(212, '38516', 'HARIS BAYU SABRIAN', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '97f672b97cd67c31866ecea0b020147e'),
(213, '38517', 'ISYATAN HAMIDAH', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, 'ca628b3321f08df1ce7ea3827aa80de3'),
(214, '38518', 'JIHAN KAMILA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '726c858fb9844f1d203177e1bebdff2d'),
(215, '38519', 'KRISTIA APRIANTI', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, 'efc6e26ff4b44d54c7760f184ee68506'),
(216, '38520', 'M FERDY ANTOSA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '9f82ff06c8ce31966b402eb701d2091e'),
(217, '38521', 'M LAZUARDI FERDILIAN', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '039cc47f960921e3c330b64673d59ae1'),
(218, '38522', 'M RAJA FADH', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'd20112f282bc0e944d055aa4e9e821f3'),
(219, '38523', 'M RIZKI SATRIA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '15c08959e5e7b1930cb81c503058b4c4'),
(220, '38524', 'MAMAN SUTADI', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '477ad223c8ae57ea56d3c6fd32491578'),
(221, '38525', 'MAULANA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'a40a236b4b73aa4df86721e02ef932e9'),
(222, '38526', 'MIRANDA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, 'cc4f51979d86bc1a70658135d039817d'),
(223, '38527', 'MOHAMMAD EMIR PRIMA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '8053519398a89e3d928132298251e0ec'),
(224, '38528', 'MUHAMAD ADITIA ZAMHAR', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '89265e7911d89be01a4a8d80871b9768'),
(225, '38529', 'MUHAMMAD DZAKWAN AL FAUZAN', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '051633a4f4c565a5cb088b37dc9f57ca'),
(226, '38530', 'MUHAMMAD NAUFAL PERDANA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '5cd26024db3b7ce0cf1bf304b6b023ee'),
(227, '38531', 'MUHAMMAD RIVALDY', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'aad92567225d700b4408b63e7fe0f9c8'),
(228, '38532', 'NIA RAHMAWATI', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, 'f7d90eaf20a3c676e36710d069f8d8b8'),
(229, '38533', 'ORIN EKA MARDA PUTRI', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '5b4ba6e852444462a8e1223fc42e1af8'),
(230, '38534', 'RAFLI DWI SAPUTRA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '6060b7fe96c78f32d3a8c14897f1af61'),
(231, '38535', 'RAVITA MONALISA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '6d071ab76ca9b5352ec881b8d7d0d15b'),
(232, '38536', 'RAYHAN SANGKUT DINATA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'e019c6ea788b56862ce20f0210361f49'),
(233, '38537', 'RENDI HERLIANSA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '6673ddb795081d1eb9a521fc583ece2a'),
(234, '38538', 'THORIQ THUFAILAH', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '251b30088e712b7a946fa660b312cd20'),
(235, '38539', 'TIRA APRISYAH', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '956b53a1ecc4777ae7482d440fbcbf07'),
(236, '38540', 'YULIA RISKA NURFADILA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, 'f92147df394ad607d1dced3231b6baa6'),
(237, '38541', 'ACHMAD AKBAR ADRIAN', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'be33900e767401e603b355979d2f4270'),
(238, '38542', 'AHMAD AL KAHFI KENEDY', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'e47172648719cad3559fed4241415c3f'),
(239, '38543', 'AHMAD RAFLI', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '7b5533abaa9399471b8c5d1cac9d4eb9'),
(240, '38544', 'BAMBANG RIZKY ADITIA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'ef94ece345c236441790b3057bd47e9c'),
(241, '38545', 'CARISSA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, 'bc419ad99b06b6b3e155039d714e2061'),
(242, '38546', 'DELLA MELSA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '7521b1aabd1f65a32347dfcb0676a3c5'),
(243, '38547', 'DELVIA RAHMAWATI', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '03795f5a6244fde28a1abfafed2c1075'),
(244, '38548', 'DWIE ANDRIKA JANUAR SAPUTRA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '80c6087eeba291970207a494a2fd0231'),
(245, '38549', 'FABIAN NOLAN HAFIZH', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'd6cf72c9b3f6851cc062f199594d7b7d'),
(246, '38550', 'FAUZAN BIMANTARA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '37845557f7ff2fbf8eba7589c8529d27'),
(247, '38551', 'FEBRIANSYAH DWI PUTRA ADITYA N', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '433d9cb8f9bb7b8623c18045a1c75c18'),
(248, '38552', 'GHAISNA SAFARAZ', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'ff3720b7127fdd214b1a9ff3828fcd16'),
(249, '38553', 'HANIFIANSYAH', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '3457c20de13ee504e33b7e6a9ec92e8a'),
(250, '38555', 'LYRA KESUMA YUDHA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '923ccbcec867ebc5588386df7c370c55'),
(251, '38556', 'M FAAZA HIDAYATULLAH', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '554bd98734fa2d47c08f446562f3ba4d'),
(252, '38557', 'M FADLI', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '4f3f82a778d5f89e66726542998e4321'),
(253, '38558', 'M NAUFAL RIFQI', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '9b03bd15cd9675565205c882ded07ef6'),
(254, '38559', 'M NAUFAL SABIQ', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '079b4e0f2428e412142657fe4d3cbc14'),
(255, '38560', 'MARETA AUDIA NINGSIH', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '77e342718aa723346c30cb6f1d223eb6'),
(256, '38561', 'MR BAYU PRATAMA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '3a69dd6e8f736c976594add915ae367c'),
(257, '38562', 'MUHAMMAD RAFKY HIDAYATULLAH', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'f1496cbf00f65109134ba82106ac40f2'),
(258, '38563', 'MUHAMMAD RAFLI ARDI PERKASA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'a64905bb671079d458594784b79f77db'),
(259, '38564', 'MUHAMMAD REYFIN', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '5d469fc041b536198c687e0864e253bd'),
(260, '38565', 'MUHAMMAD RIZKI RAMADHAN', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '918b69ec3f995b4a6f804b03839f704f'),
(261, '38566', 'NABILAH RIZKY RAHAYU', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '8525d6d5e6d0b3c70790c9d45ec0f7d9'),
(262, '38567', 'NADIA FORENZA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '0db6dda71f779825756426ec733c7cc0'),
(263, '38568', 'SABRINA MERCYDILLA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, 'b4a13cb59f877eeee5aa39820330313c'),
(264, '38569', 'SALVIRA ADITAMI', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '85d451951b74d5024a7b396ec5f250b6'),
(265, '38570', 'SASMI', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, 'd596114d5e75e82bacec0041e467dfd7'),
(266, '38571', 'TEGAR AREBAMA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'c173f294fe9d99e7cd451455413a94e3'),
(267, '39272', 'AL FAJRI NUR RAMADHAN', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '428a96d781ccb96d757bbf82f8242d95'),
(268, '39273', 'ARRAFI IHSAN', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'b07147b3b9b06eed4541448211230d80'),
(269, '39274', 'BINTANG ADHYTIA PUTRA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '571c1d710d8043bd13f130fbfe335ba2'),
(270, '39275', 'CESSA TRIE ZALIANTY', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, 'dfab173bb4e49a200b37e660e2677709'),
(271, '39276', 'CHANTIKA FIELISHA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '2b20f55922bf6019d6da6ee6a5518080'),
(272, '39277', 'DEAN GAOZHAN RAFI', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '8de95d6a6ba0ca6c1eec90297345e0a6'),
(273, '39278', 'DINA NABILA ASTI', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '1eb2b3aeff88895ee55931f20b8d9e54'),
(274, '39279', 'FAIZAH QONITA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, 'bcd93d56be5993f95ae820516d37651a'),
(275, '39280', 'FATHIR MUHAMAD EVANTRA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'e5f15cc640c8a7408103dd190ced966c'),
(276, '39281', 'FHARHAN KURNIADI', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '116c87e094144d0002cff857e56a322f'),
(277, '39282', 'GILANG SETIAWAN', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '9f37d87938938d473ff641d4781ea30c'),
(278, '39283', 'GUSTI AYU KETUT RISMAWATI', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '32caf458cd9c02201db30672a2302836'),
(279, '39284', 'KURNIA NAJIBAH', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '4cde6da1f7a10ac294b1dbc1c1733352'),
(280, '39285', 'LUTHFI  HIDAYAT ', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'dfa61ee5a29df76a62e395006a2a60c4'),
(281, '39286', 'M. AKHSAL FAUZAN HIDAYAT', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '54f619e883af962072faa0e2032c1b0e'),
(282, '39287', 'M. ANUGRAH TRI YANSYAH', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'c0d96addd9586c3e7db70766763ba310'),
(283, '39288', 'M. ARIEF FAQIH', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '174bb3aa57fd6c6fb601a6d26ffb1bcd'),
(284, '39289', 'M. DAFFA SATRIA UTAMA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '7083bdc8370a7bb6d9e829cf0745390a'),
(285, '39290', 'M. DIMAS. PANGESTU', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '5947402af654dffd7d0e214eb3086818'),
(286, '39291', 'M. REDHO SAPUTRA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '82ade9609d9915ca5e830df04b7d90e2'),
(287, '39292', 'MARSHANDA PRICILIA PUTRI', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, 'a1c61921bdd6ed619ed8d854edfa535a'),
(288, '39293', 'MELDA SITI ZAHARA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, 'f4f2bdc71b9cb4bc59f2e15e910568a3'),
(289, '39294', 'MUHAMAD ZACKY PRADITYA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'ce5f48cd6be4756c729c85fb2a204f2a'),
(290, '39295', 'MUHAMMAD AJIE PRASTYO', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'caa87e13d56a398a53d1bfa92bb9b5e1'),
(291, '39296', 'MUHAMMAD ALFAIRUZ IRIANTO', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '8bdb666d756911879b3f77e93d945da3'),
(292, '39297', 'M. AMMAR MAHIDIN HIBRIZI', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '36a530792d57e0fbb57ad2174dd62853'),
(293, '39298', 'MUHAMMAD REHAN AKBAR', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'ac46f0a0d403c8af2d08d2b6f3c54e8f'),
(294, '39299', 'MUHAMMAD RIDHO PRASETYO', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '9a8a7205e2aa8f927bd0ee99371f8e41'),
(295, '39300', 'NABIL MUTTAQIN', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '4c32ad344b09ff872f942b6d2196e720'),
(296, '39301', 'NADYA RAHMA AYU', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, 'adf06790db90a92467a44a9a4d913e08'),
(297, '39302', 'PANI PERMATASARI', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, 'fb2876a1cf41b048fb41b4b478f30982'),
(298, '39303', 'RAFI ZASKI ERNANDO', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '70c7bdc758417aa5c47a1e63e62982b3'),
(299, '39304', 'RAMADHAN NUGRAHA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '396a6e20890fc40d8f5e7cfd3fc3a288'),
(300, '39305', 'TASYA BERLIANA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '1a9ee261949127cf848fadb72c8593d7'),
(301, '39306', 'ABDUL AZIZ', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '4f5a7f55aa8a4a5f912df8eda4602239'),
(302, '39307', 'ACHMAD RENDY PRATAMA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'f7188fdbd35e020927f6c18b3ae847b4'),
(303, '39308', 'ADAM KURNIA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'dfa75609458a5e7b47a01bfd73c4e514'),
(304, '39309', 'ALDI RIZKY ANANDA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '61a018642a904c166b8949cac36e1177'),
(305, '39310', 'ANGEL ROSI AMELIA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, 'bb98e37f40dc9e68732cb12cb785a772'),
(306, '39311', 'ANUGERAH  SAPUTRA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'c9f5c37976afa879c834b505e6ef3fbf'),
(307, '39312', 'BUNGA ANGGRAENI', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '0b8a492f911a8150392301d2682c0f19'),
(308, '39313', 'DIBBA FAHZIRA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '4ea1a79057f88cc5c1e0431929aa1d98'),
(309, '39314', 'GILANG ZAKI RAMADHAN', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '775ced8a4d77641ed809d8a33917e6f0'),
(310, '39315', 'HAIKAL PASYAH', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '245403f0ec118644e403ddd11c5797e9'),
(311, '39316', 'I PUTU AGUS DEVA RHEYDANI', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'b52b49613eb2eec3b171abfe8fcbbaf9'),
(312, '39317', 'ILHAM MARZUKI', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '4e4dfebee38dd25062b6888505bcca50'),
(313, '39318', 'KAUTSARI ABDI DZAKIYAH', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '75b54ca00c27574d0ef49303b3292db5'),
(314, '39319', 'M.  DZAKY  ALFAYYADH', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '164ec3053b616b5034ece5db18f4faf0'),
(315, '39320', 'M.  FARIH', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '51dd5ac7bbb01546f7f2e3b2bce27834'),
(316, '39321', 'M.  FATHIR ALFA RIZI', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '1910b507e88a983ce6245c6a8ac53c09'),
(317, '39322', 'M.  RAFLI AGUSTIAN  MADOWI', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '21d86ea56f577e14fb04116bef7d1a44'),
(318, '39323', 'M.  RIZKI  IRFI  AKBAR', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'f4f0db416cc2e7a1fe919311127e9ece'),
(319, '39324', 'M. RAFFA  AL  FARIZY', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '1db2d761017113fbfd4246f0402ac4e0'),
(320, '39325', 'MUHAMMAD ARYANSYAH FESALIKSA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '4ef352d82c0b3506a0df2ed486d44b17'),
(321, '39326', 'MUHAMMAD BUDI FEBRIANO PUTRA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '19a4516a42ef71c7f399b2af7f839188'),
(322, '39327', 'MUHAMMAD IRFAN NURWAHID', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'd955b97b28c2966211c9de2fe22fefbd'),
(323, '39328', 'MUHAMMAD JOE MILLION PERMANA T', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '83e6341c952eb1f0fe899a7ddfa30ffd'),
(324, '39329', 'MUHAMMAD RAZZAN', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '9b9ccfbe805fb9ea06df2000df9d86c9'),
(325, '39330', 'MUTIA BILQIS', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, 'a988ce8022c538c226809cda937478c3'),
(326, '39331', 'NADYA THALITA AURELLIA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '4c859737028fd7781247eaa13a4ea759'),
(327, '39332', 'NASYWA BERLIANA ROSIKHAH', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, 'f72838a46139d9e8c1d71c9204376a88'),
(328, '39333', 'REVA AMELINA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '5c76231edbba6c669c21c4f98047ba04'),
(329, '39334', 'ROBBI HARRIZALI', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '4952d2ac78b534c78d7a21c60a236e4c'),
(330, '39335', 'ROBY ALFAN SURI', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '83218450304f89053114eaa3b1487815'),
(331, '39336', 'SAVA HASBIE PUTRA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '02dbe7f07a799718d80ddf18d709bdc2'),
(332, '39337', 'SUGIHARTO PRASETYO', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '28291658be5f6e1edfc8acfeacf049a8'),
(333, '39338', 'SYAKIRA MODESTY RATU ANGGUN', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '67d92f9a027b3aceaed819addd130ee0'),
(334, '39339', 'TENNO MANDALA PUTRA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '30b156aaa9e421081ba1235658abc523'),
(335, '39340', 'UCI MELINDA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '1b9d7ffccca875a9079e3b57c24a3113'),
(336, '39341', 'VIKA AMELIA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, 'fe9ba234704f9db9852cdaa2fdc36df0'),
(337, '39342', 'ADHYAKSA MICKO SATRIA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '0896bde795716763e99585fae7db2fa4'),
(338, '39343', 'ADITYA DIMAR NUGRAHA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'bd8b4dc6f31f0c04377e23f09e764426'),
(339, '39344', 'AGUNG DILA UTAMA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'e079950a0d3f5b5fb3cee43e6d874ef5'),
(340, '39345', 'AISA DAPINA AMELIA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, 'efbb36a8571980ef0b1fdb4aa04376d6'),
(341, '39346', 'ARYA BATAM', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'ad991d32eb17e17007e63268f19944b6'),
(342, '39347', 'ARYA ILHAMI', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'bd1e8ec41900cc92ed2745181be96f1a'),
(343, '39348', 'DAVID ROMADHANI DWI SAPUTRO', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '6ded8e4119ca5c2725af6803f43f343c'),
(344, '39349', 'DIMAS TEGAR RAMADYANTO', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'bac1729d37816e0b04c6ba53c6e013c5'),
(345, '39350', 'DINAR ANDIN AZZAHRA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '32d731756071485f3a60e6af2a736730'),
(346, '39351', 'DUHAN  ALFATHIR', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'b8e8d48caa87e495e8b371564efbd9c3'),
(347, '39352', 'ERIKA PUTRI SAY', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '204ed8b9ff55bd6090bd1309c5908ce3'),
(348, '39353', 'FADHANI BAHRUL ULUM', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '2dcb2f57c2952c286a435c7efa0864ba'),
(349, '39354', 'FADHIL KHOIRI', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'da740a2d739707c310f3762453b41359'),
(350, '39355', 'JUWITA PUJA ANGGRAINI', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '67b46df8fd1c23206e0572850ac213b5'),
(351, '39356', 'KARENINA INDIRA PUTRI', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '696ede2b6a499c372fe1d65fa8d56ebd'),
(352, '39357', 'LUTHFIA NURUL HIKMAH', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '759cf6a07a81645b6b5dd37a90db63a5'),
(353, '39358', 'M. ALIF YUGO SATRIA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'd6a5ec16b128a7d93cbfda57a757537a'),
(354, '39359', 'M. RIZKY PERDANA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'a88e6ae496f56ff050ee2d01b3df0896'),
(355, '39360', 'MIFTAHUL JANNAH', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, 'e14062d430df9303453e4d25fadfe4ee'),
(356, '39361', 'MUHAMAD ALZAKY AKBARI', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '74d1f598371a8d363fab3dca78b93690'),
(357, '39362', 'MUHAMMAD DAFFA DARMAWAN', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '5afcd2787d9efd296b8f9ba7c0739310'),
(358, '39363', 'MUHAMMAD KEVIN RIZKY ANUGRAH', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '93794ee11802a7bb4f49c8d18f87bbd6'),
(359, '39364', 'MUHAMMAD MUYASSAR DARY', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'daf553bc1a775515384241ef172eab79'),
(360, '39365', 'MUHAMMAD NABIL AGY', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '17c77fd570aa86b74387fae66d9d4edd'),
(361, '39366', 'NAOKY MOREA RACHELL', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '6266f24c5b712ea805a38be6db863a3a'),
(362, '39367', 'NEODITA CITRA HERSITA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '77abef21c838da55e14ffc88016ce91f'),
(363, '39368', 'PRAMUDIA DINATA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '187df28d558f25a18507ba287ce90f5d'),
(364, '39369', 'RACHMANAYA ALISYA ISMANI', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '3f6ad1210810320e069ef0ce8e80368f'),
(365, '39370', 'RADHITYA FEBRYANDO', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '42f5d8adb22b03fc74e52ab24d7eb64b'),
(366, '39371', 'SAGITA LORENZA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '78383fd635668ffe34e22ef0ed11f6b5'),
(367, '39372', 'SITI FATIMAH AZZAHRAH', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, 'd5ee46a83940e40df0e0d7a240b79bb5'),
(368, '39373', 'THOPIK VALEN SUYADIMARDI', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'c458bd80967c802be694099db881c14b'),
(369, '39374', 'YOGI RIFANDI', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '842e8292086b3d3b35d127ea5b1fb9ca'),
(370, '39375', 'ZIKRY RAMADHAN', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '2e12fe5bc3f8c2719adf7e96acdd5bc5'),
(371, '39376', 'AHMAD ADIB', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'dbb2f657507d0df59c4a0c2481f71134'),
(372, '39377', 'AHMAD IBRAHIM', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '65b03949d3939d49c8caf082faed86b4'),
(373, '39378', 'AHMAD ZHAFIR', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'c9181c54402583f631b0ec7e6685b0d0'),
(374, '39379', 'BINTANG JAVIER MIKAIL', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '6b8aee8bdeb2553cbbd0f1a4cfada7ec'),
(375, '39380', 'BONNIEVITTO ALZAIN', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '862090b94c4637688088941f122041df'),
(376, '39381', 'DAFFRI ARYA RAMADHAN', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'd9d0f4bc089eb93b509195c4e285cf60'),
(377, '39382', 'ERSA ROSALIA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '169c542306442d8ef169c0761d661257'),
(378, '39383', 'FERISDA SYAFIRA RAMADHANI', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, 'd4dbf7b5778980abf44eca853674f4e9'),
(379, '39384', 'GLEDYS APRILLIANA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, 'e281f682fab884aafadb53f9711eaffb'),
(380, '39385', 'IQBAL FADHLURROHMAN', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '1da5aeb9fbb52788e0ec7c962878e92d'),
(381, '39386', 'JHIRANVI AMANDHA REJHICA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '44694d5609682428dac3aad206bad13b'),
(382, '39387', 'JIMMI CARLOS MOYA RJ', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '0a9a820b2c608bb2c204ad980d7c60c8'),
(383, '39388', 'JONATHAN WIJAYA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '5ed6cee74a45ce283c9520c578979754'),
(384, '39389', 'KGS MUH ALKATIRI NAMA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '2517e55b4bfe200e1e2c7dfd27e8fd5f'),
(385, '39390', 'M. ILHAM FEBRIANSYAH', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '1f00e37d4309d3b61b38186081e54e14'),
(386, '39391', 'M. NAUFAL', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '628a5609738c5431003e28cd9b913a62'),
(387, '39392', 'M. RIZKI AJI WIBOWO', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '3b0297d5f6b35c9ce9075e5873628a72'),
(388, '39393', 'MANDA SARI', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, 'c7e30c4f80e9452d40245385c6572936'),
(389, '39394', 'MARDITA PUTRI PALESE', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '9b372f77062948ef874e4c2bbe7e6cee'),
(390, '39395', 'MEIZAL RAMANA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'a993ccc69d392bfded3ccd802b9268fc'),
(391, '39396', 'MUHAMMAD DIKO PRATAMA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '3bd669c7146b11f36cd1736defbd4cde'),
(392, '39397', 'MUHAMMAD ILHAM FIRDAUS', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '6ce9251b4d3766af79fcf03389b2a6a3'),
(393, '39398', 'MUHAMMAD RAFI', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '53be01f4f05aebe9d0c69268ac1999ce'),
(394, '39399', 'MUHAMMAD RAJA BIRU', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'a1b60cfa6b8b9e72a9b206c570fc4964'),
(395, '39400', 'MUHAMMAD SOBRI ZAINI SOMANTRI', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '01623048e7d81ab613de0f5d03e95fcc'),
(396, '39401', 'NABIL ABHIPRAYA', 'Laki - Laki', '781151566WhatsApp Image 2021-08-28 at 17.47.20.jpeg', 'Siswa', 10603711, '4f89c0f0f46db300d1b0274bffc9a43e'),
(397, '39402', 'NAURA NUR FATHIYA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, 'c4367c52bf45525bfbb7614b167a5335'),
(398, '39403', 'NAVASSA ANASTHA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, 'c893c96ee961929a3b000f33f6c2aa2f'),
(399, '39404', 'RAHMAT NUR HIDAYAT', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '83227bdca3cdce0e5743a60f5a42b500'),
(400, '39405', 'RAISAH NABILA', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, 'a3badea6c13ec771afd94ff9a23236e3'),
(401, '39406', 'RAJU', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '44ccfe397ecb78a8dc09d6e524c1322d'),
(402, '39407', 'RANDHIKA HAFIZH MADATYA P', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, '98c153eda30b9d78a78fb3cccae14eb7'),
(403, '39408', 'RASYIDAH VISARI AZZUHRAH', 'Perempuan', 'blank.jpg', 'Siswa', 10603711, '8b7c35169673ff7fcc30a43cf41079d3'),
(404, '39409', 'RAUUF PUTRA', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'c47b7b07d6a58fd8bb0b7f51ad4a41aa'),
(405, '39410', 'ZAKKY PRAYATA PRAMUNDITO', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'ce4d95afd39b4272f11e7d10b88a5a53'),
(406, '55555', 'Salim Rahmatal', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'c5fe25896e49ddfe996db7508cf00534'),
(407, '89999', 'Muhammad Egi Nara', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603711, 'efd7fc8aef277698a0f30f3412d67176'),
(408, '90001', 'Eka Lismayanti, M.Kom.', 'Perempuan', 'blank.jpg', 'Guru', 10603711, '6beb5f589a9fd04c21fcd50db3d9c80c'),
(409, '90002', 'M. Daman Huri, M.I.T.', 'Laki - Laki', 'blank.jpg', 'Guru', 10603711, '400df0aa82bc46e49e2247dc5da23810'),
(410, '90003', 'Zanes Alfian Candra, S.Kom.', 'Laki - Laki', 'blank.jpg', 'Guru', 10603711, '9898c086a1392b56eea59a0a7f040906'),
(411, '90004', 'Ardiansyah Yusriezal, S.T.', 'Laki - Laki', 'blank.jpg', 'Guru', 10603711, '226a98f6949e5d6947877bc6a15e39d4'),
(412, '90005', 'M. Aulladun Solihin, S.Kom.', 'Laki - Laki', 'blank.jpg', 'Guru', 10603711, '9c4a06e4dddceb70722de4f3fda4f2c7'),
(413, '90006', 'Rahmat Kartolo, S.Kom.', 'Laki - Laki', 'blank.jpg', 'Guru', 10603711, '23da6eee3d452c3c3ea8e61068369229'),
(414, '90007', 'Siti Munawaroh, S.Kom.', 'Perempuan', 'blank.jpg', 'Guru', 10603711, '996a7121b7bfa4c1754abbf8d46405af'),
(415, '90008', 'Rika Rahira, S.Kom.', 'Perempuan', 'blank.jpg', 'Guru', 10603711, '2ef85f2ae5e56041ded26f67e18136be'),
(416, '90009', 'M. Rianda, S.Kom.', 'Laki - Laki', 'blank.jpg', 'Guru', 10603711, 'b312a491b1d6b93b96f06a15fd830918'),
(417, '90010', 'Mutia Hanifah, S.Kom.', 'Perempuan', 'blank.jpg', 'Guru', 10603711, '1582166aa8006058e0d0eed662e580c5'),
(418, '90011', 'Try Siswadi, S.Kom.', 'Laki - Laki', 'blank.jpg', 'Guru', 10603711, '34fc4fed862fd1a14362ead592726b47'),
(419, '90012', 'Soni Wahyuni, S.Kom.', 'Laki - Laki', 'blank.jpg', 'Guru', 10603711, '8686243e94b01b3855779705d1d15231'),
(420, '90013', 'Ita Purnama Sari, S.Pd.', 'Perempuan', 'blank.jpg', 'Guru', 10603711, '4016cfcbc087b68698af5cd55826d666'),
(421, '90014', 'Nopriansyah, S.Pd.', 'Laki - Laki', 'blank.jpg', 'Guru', 10603711, '8ed927a2472c548a5e7dcfa2bcd14227'),
(422, '777000', 'Admin Diknas', 'Laki - Laki', 'blank.jpg', 'Admin Pusat', 10101010, '9812e1fa54867d31f7e4eea166350853'),
(423, '10609725', 'SMK TEKNOLOGI INFORMASI BISNIS INDOSAINS', '', 'blank.jpg', 'Admin Sekolah', 10609725, '7b0964d75447d6e1ebb1e53d2c35a7d1');
INSERT INTO `db_user` (`user_id`, `user_nip`, `user_name`, `user_gender`, `user_photo`, `user_role`, `npsn`, `user_password`) VALUES
(424, '10609734', 'SMK TELENIKA PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 10609734, 'a1daaa1e4628ce1276ab5df5316b829a'),
(425, '10609735', 'SMK TRI DHARMA PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 10609735, 'f06f90a9565a1176f09ef98e0c12915c'),
(426, '10603719', 'SMK PELAYARAN MAKARYA PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 10603719, '5ed759e51276bdfd2296a63b5ac557ff'),
(427, '10603681', 'SMK TRI SAKTI PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 10603681, 'c687c4f85175f11519b79391da899619'),
(428, '10609726', 'SMK MUHAMMADIYAH 01 PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 10609726, 'b64afb53ef323ca8bf0663d724634e8f'),
(429, '10603711', 'SMK NEGERI 02 PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 10603711, '6d91e59fdd64a75712e7044db9398879'),
(430, '10603724', 'SMK MUHAMMADIYAH 02 PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 10603724, 'ce8fb4ea72fd0cab702ee49785870d0c'),
(431, '10603674', 'SMK SETIA DARMA YPGR PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 10603674, '34d91c05a6cb0104473ed6a445176f03'),
(432, '10603726', 'SMK KARYA ANDALAS PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 10603726, '73fafb402cf1af29d8e0c2a4bfb96b30'),
(433, '10648144', 'SMK PELITA PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 10648144, 'a270b6a9948c78e307ba398ff77a159f'),
(434, '10603716', 'SMK HARAPAN KITA PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 10603716, 'ff3f4204db7f613d16135cac934387ae'),
(435, '69856920', 'SMK AULIA PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 69856920, 'e5f7eed5dc98bcea09651dedb643aed5'),
(436, '10603700', 'SMK PELAYARAN SINAR BAHARI PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 10603700, '11b8dc2c9e8b414e7250a64da9bf803b'),
(437, '10648174', 'SMK MUTIARA AZZAM PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 10648174, '0b9f02101bfa1720b17792efcc2473ac'),
(438, '69938492', 'SMK KESEHATAN RIZKI PATYA PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 69938492, '11c140fca028ef0a0b93b8eeee61ad7c'),
(439, '69756887', 'SMK FARMASI BINA MEDIKA PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 69756887, '2661e7c4be4f87a814695cf57d348d67'),
(440, '10603721', 'SMK NURUL IMAN PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 10603721, 'adbb87ca1e1a3d49d46d243b3d18db92'),
(441, '10603725', 'SMK KIMIA YTK PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 10603725, 'b6b103e50519d816b5110c87c852b94e'),
(442, '10603710', 'SMK NEGERI 04 PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 10603710, 'b4a187bda9c6142c2d4bf988d9270dbd'),
(443, '69929355', 'SMK YWKA PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 69929355, '1bdbcec49a33837cffcb9a0ab64b7097'),
(444, '69830127', 'SMK BHAKTI PERSADA', '', 'blank.jpg', 'Admin Sekolah', 69830127, 'f435ec637f4aa874ce677b2a84805d84'),
(445, '69758116', 'SMK MUHAMMADIYAH 04 PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 69758116, '9b7530acb5c5a56d775998c667e363e6'),
(446, '10646389', 'SMK ANTARA PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 10646389, '3538e0104552c3a597d4481dba0f28af'),
(447, '10609733', 'SMK TEKNOLOGI NASIONAL PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 10609733, 'ecab7034be8738a8b2e0c854bfc0deca'),
(448, '10603708', 'SMK NEGERI 06 PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 10603708, 'd907b1733920259799081ec61d4f64c4'),
(449, '10646146', 'SMK TAMAN SISWA SUNGAI BUAH PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 10646146, 'bc30191094cbacc1bc80ef61bdbfd62b'),
(450, '10603709', 'SMK NEGERI 05 PALEMBANG', '', '5472188985WhatsApp Image 2021-08-28 at 17.47.20.jpeg', 'Admin Sekolah', 10603709, 'aa742fc01527e2f9014cb4742e288121'),
(451, '69857920', 'SMK NEGERI 8 PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 69857920, '58825b2ea4dedbdeaf1544ae8ff2bf73'),
(452, '69963721', 'SMK KESEHATAN INDO HEALTH SCHOOL', '', 'blank.jpg', 'Admin Sekolah', 69963721, '7b486e115d68acc7500d09425472fdf9'),
(453, '10603702', 'SMK PGRI 01 PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 10603702, '2396d0a7f1293366abdcbe1839429232'),
(454, '69755982', 'SMK PGRI 03 PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 69755982, '55516a949bd7a1aae98fe92f559a51cb'),
(455, '10603704', 'SMK BINA CIPTA PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 10603704, '10f71ccfba0819df2f60bd6561f0111c'),
(456, '69897078', 'SMK GAJAH MADA 3', '', 'blank.jpg', 'Admin Sekolah', 69897078, '9d5ff24153a9f006b22e7782423c9b39'),
(457, '69859654', 'SMK SJAKHYAKIRTI PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 69859654, '34ca8f035d4ba88447a66a6f16d70dfb'),
(458, '10647217', 'SMK MARDI WACANA PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 10647217, 'a891c25e2d0e2416bf8bc9e1c5a8e64c'),
(459, '70009381', 'SMK TI THAWALIB SRIWIJAYA', '', 'blank.jpg', 'Admin Sekolah', 70009381, '8fddd202f9a494c44280ededb930bb65'),
(460, '69755983', 'SMK BINA SRIWIJAYA INDONESIA PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 69755983, 'd1e2c8f53f53fe7594bcba4f6a3134d7'),
(461, '10603701', 'SMK PGRI 02 PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 10603701, 'd3d3e2c85cb1bee3bd590fd75dfe48ef'),
(462, '10603682', 'SMK TAQWA PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 10603682, '7f8719333883dd313cbb8a662a5e82fc'),
(463, '10603713', 'SMK NEGERI 01 PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 10603713, '1ae431822466e165763cf2ee9c0d342f'),
(464, '10603680', 'SMK TRISULA PERWARI PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 10603680, '433c01982682964ff4de838cb98d9be6'),
(465, '69772970', 'SMK MANDIRI PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 69772970, '9c153dd274ee4d9fb50a97bc141de57c'),
(466, '10603703', 'SMK BINA JAYA PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 10603703, '55455d510baa4d7991c302802ad3bf1c'),
(467, '10648015', 'SMK NEGERI SUMSEL PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 10648015, '53327d5bfce482897d651e04fe801dc4'),
(468, '10603715', 'SMK ETHIKA PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 10603715, '000eaf3a0bc90bf88c0ac5afde15ac96'),
(469, '10603723', 'SMK MUHAMMADIYAH 03 PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 10603723, '13bf832e78972dede22418ff9342fc22'),
(470, '10609754', 'SMK HARAPAN BANGSA PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 10609754, '3757b76e37623fb67899fb6378a7b815'),
(471, '10648882', 'SMK AZZAHRO PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 10648882, '03587e180bdbe50b8a7100b40a4bdb07'),
(472, '10603677', 'SMK XAVERIUS PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 10603677, '1a374165c767e13c67998f691742917a'),
(473, '69772973', 'SMK KESEHATAN ATHALLA PUTRA PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 69772973, '35b365afddc2717f1cf6f478f13f1936'),
(474, '69772971', 'SMK PERBANKAN ALUMNIKA PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 69772971, '96cb2fe43204d722a9aa39a990465ff4'),
(475, '69897042', 'SMK ASSANADIYAH', '', 'blank.jpg', 'Admin Sekolah', 69897042, 'ddd6e60597c1737428872882bff3dcf7'),
(476, '10603679', 'SMK UTAMA BAKTI PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 10603679, '4ad26b430bd42fda994ce6919dda23d6'),
(477, '10603684', 'SMK TAMAN SISWA 01 PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 10603684, '1a1c7af8cd965f31087bb4f2864fe018'),
(478, '69964521', 'SMK SETIA DARMA 2 PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 69964521, '68a824dc2eb56da752e00da37c96e1f5'),
(479, '10647495', 'SMK MADYATAMA PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 10647495, '8a9e7b721b9c05e9b6b1a4b693e8941c'),
(480, '10609727', 'SMK BAKTI IBU 03 PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 10609727, 'd3bac34bf9753f77cff97ea59772cb5a'),
(481, '10603718', 'SMK PEMBANGUNAN YPT PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 10603718, '15f6fcf0548fed92949bc33b8dde7cd0'),
(482, '10603685', 'SMK SWAKARYA PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 10603685, '94d8ee42e4f67895fe12dd63837e46a9'),
(483, '10609729', 'SMK PERHOTELAN INDONESIA PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 10609729, '57efaecc71d6f2eea03aeb756ee550a9'),
(484, '10603705', 'SMK ARINDA PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 10603705, 'c4f49babaef8d9abec73554667194ed7'),
(485, '10603717', 'SMK PEMBINA 01 PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 10603717, '15713e7eab360f765ff4fac1478e9910'),
(486, '10603683', 'SMK TAMAN SISWA 02 PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 10603683, 'b67e1d88691b5dd80a93ef3ee0efb140'),
(487, '10646186', 'SMK KRISNA PERSADA PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 10646186, '7024ae04b09d0150bbe59b4ba2f4f0ae'),
(488, '10647807', 'SMK AISYIYAH BID KEAHLIAN FARMASI PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 10647807, '29ecaf650c9957c4a0ae73239b002c41'),
(489, '10609724', 'SMK TEKNOLOGI BISTEK', '', 'blank.jpg', 'Admin Sekolah', 10609724, '3b793a8f95033a0e2486baed398ce18c'),
(490, '10609732', 'SMK PEMBINA 02 PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 10609732, '4ef1fe70cd8e31ba7ae088bfd51c140c'),
(491, '10603707', 'SMK NEGERI 07 PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 10603707, '7aebb74bb8dfdaaa1c45949426eb0aba'),
(492, '10609730', 'SMK RA KARTINI PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 10609730, '3b8172032b3bc11b140ec245f41c998d'),
(493, '69965174', 'SMK SHAILENDRA PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 69965174, '3b702805cc50d089a0d135b0cd622c56'),
(494, '10646388', 'SMK FARMASI PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 10646388, '348422ce27e1161ccd68f9603e9bfe00'),
(495, '69952601', 'SMK KESEHATAN KADER BANGSA', '', 'blank.jpg', 'Admin Sekolah', 69952601, 'fc37f567c6dac4190d6c2f58c614db04'),
(496, '10603675', 'SMK YP GAJAH MADA PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 10603675, 'f10cc644c5ef37cd3970cfb67eb2d064'),
(497, '70006391', 'SMK TUNAS HARAPAN PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 70006391, 'fbfb22f16311544f323821aef73345b2'),
(498, '69838800', 'SMK METHODIST 02 PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 69838800, '11d1fd5c690d3c300e2a159cfeb8294f'),
(499, '10609738', 'SMK PELAYARAN PANGGALI NUSANTARA PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 10609738, 'ffb17fc70c9053b0ce9733372964d0cd'),
(500, '10603712', 'SMK NEGERI 03 PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 10603712, '5b5afabb227a834a4881b296bd487477'),
(501, '69786202', 'SMK PENERBANGAN SRIWIJAYA PALEMBANG', '', 'blank.jpg', 'Admin Sekolah', 69786202, '010f085f97e6052e9023d670fd40f9c8'),
(512, '8080', 'Laila Nurulita', 'Perempuan', '9110709818WhatsApp Image 2021-07-09 at 21.46.47 (4).jpeg', 'Guru', 10603709, 'd4a973e303ec37692cc8923e3148eef7'),
(513, '3333', 'Muhammad Rafly', 'Laki - Laki', 'blank.jpg', 'Siswa', 10603709, '2be9bd7a3434f7038ca27d1918de58bd'),
(515, '708090', 'NILAM SHAFIRA', 'Perempuan', 'blank.jpg', 'Guru', 10603709, 'd41d8cd98f00b204e9800998ecf8427e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_avatar`
--
ALTER TABLE `db_avatar`
  ADD PRIMARY KEY (`avatar_id`);

--
-- Indexes for table `db_avatar_trans`
--
ALTER TABLE `db_avatar_trans`
  ADD PRIMARY KEY (`trans_id`),
  ADD KEY `avatar_id` (`avatar_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `db_avatar_used`
--
ALTER TABLE `db_avatar_used`
  ADD PRIMARY KEY (`trans_id`),
  ADD UNIQUE KEY `avatar_id_2` (`avatar_id`,`user_id`),
  ADD KEY `avatar_id` (`avatar_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `db_badges`
--
ALTER TABLE `db_badges`
  ADD PRIMARY KEY (`badges_id`);

--
-- Indexes for table `db_badges_trans`
--
ALTER TABLE `db_badges_trans`
  ADD PRIMARY KEY (`trans_id`),
  ADD KEY `badges_id` (`badges_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `db_class`
--
ALTER TABLE `db_class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `db_class_trans`
--
ALTER TABLE `db_class_trans`
  ADD PRIMARY KEY (`trans_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `db_explicit`
--
ALTER TABLE `db_explicit`
  ADD PRIMARY KEY (`explicit_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `mapel_id` (`mapel_id`);

--
-- Indexes for table `db_explicit_comment`
--
ALTER TABLE `db_explicit_comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `explicit_id` (`explicit_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `db_explicit_like`
--
ALTER TABLE `db_explicit_like`
  ADD PRIMARY KEY (`like_id`),
  ADD UNIQUE KEY `explicit_id_2` (`explicit_id`,`user_id`),
  ADD KEY `explicit_id` (`explicit_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `db_friend_trans`
--
ALTER TABLE `db_friend_trans`
  ADD PRIMARY KEY (`trans_id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`friend_id`),
  ADD KEY `user_id_2` (`user_id`,`friend_id`),
  ADD KEY `friend_id` (`friend_id`);

--
-- Indexes for table `db_group`
--
ALTER TABLE `db_group`
  ADD PRIMARY KEY (`group_id`),
  ADD KEY `pembina` (`pembina`);

--
-- Indexes for table `db_group_trans`
--
ALTER TABLE `db_group_trans`
  ADD PRIMARY KEY (`trans_id`),
  ADD UNIQUE KEY `group_id_2` (`group_id`,`user_id`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `db_gurumapel`
--
ALTER TABLE `db_gurumapel`
  ADD PRIMARY KEY (`gurumapel_id`),
  ADD UNIQUE KEY `user_id_2` (`user_id`,`mapel_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `mapel_id` (`mapel_id`);

--
-- Indexes for table `db_login_activity`
--
ALTER TABLE `db_login_activity`
  ADD PRIMARY KEY (`activity_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `db_mapel`
--
ALTER TABLE `db_mapel`
  ADD PRIMARY KEY (`mapel_id`);

--
-- Indexes for table `db_mission`
--
ALTER TABLE `db_mission`
  ADD PRIMARY KEY (`mission_id`),
  ADD KEY `pembina` (`pembina`);

--
-- Indexes for table `db_mission_progress`
--
ALTER TABLE `db_mission_progress`
  ADD PRIMARY KEY (`progress_id`),
  ADD UNIQUE KEY `mission_id` (`mission_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `db_mission_trans`
--
ALTER TABLE `db_mission_trans`
  ADD PRIMARY KEY (`trans_id`),
  ADD UNIQUE KEY `mission_id_2` (`mission_id`,`user_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `mission_id` (`mission_id`);

--
-- Indexes for table `db_notif`
--
ALTER TABLE `db_notif`
  ADD PRIMARY KEY (`id_notif`),
  ADD UNIQUE KEY `notif_sender` (`notif_sender`,`notif_isi`,`notif_receiver`);

--
-- Indexes for table `db_point`
--
ALTER TABLE `db_point`
  ADD PRIMARY KEY (`point_id`);

--
-- Indexes for table `db_point_trans`
--
ALTER TABLE `db_point_trans`
  ADD PRIMARY KEY (`trans_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `point_id` (`point_id`),
  ADD KEY `trans_verified` (`trans_verified`);

--
-- Indexes for table `db_point_transfer`
--
ALTER TABLE `db_point_transfer`
  ADD PRIMARY KEY (`id_trx`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `friend_id` (`friend_id`);

--
-- Indexes for table `db_tacit`
--
ALTER TABLE `db_tacit`
  ADD PRIMARY KEY (`tacit_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `mapel_id` (`mapel_id`);

--
-- Indexes for table `db_tacit_comment`
--
ALTER TABLE `db_tacit_comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `tacit_id` (`tacit_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `db_tacit_like`
--
ALTER TABLE `db_tacit_like`
  ADD PRIMARY KEY (`like_id`),
  ADD UNIQUE KEY `tacit_id_2` (`tacit_id`,`user_id`),
  ADD KEY `tacit_id` (`tacit_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `db_user`
--
ALTER TABLE `db_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db_avatar`
--
ALTER TABLE `db_avatar`
  MODIFY `avatar_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=311;

--
-- AUTO_INCREMENT for table `db_avatar_trans`
--
ALTER TABLE `db_avatar_trans`
  MODIFY `trans_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `db_avatar_used`
--
ALTER TABLE `db_avatar_used`
  MODIFY `trans_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `db_badges`
--
ALTER TABLE `db_badges`
  MODIFY `badges_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `db_badges_trans`
--
ALTER TABLE `db_badges_trans`
  MODIFY `trans_id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `db_class`
--
ALTER TABLE `db_class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `db_class_trans`
--
ALTER TABLE `db_class_trans`
  MODIFY `trans_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9994013;

--
-- AUTO_INCREMENT for table `db_explicit`
--
ALTER TABLE `db_explicit`
  MODIFY `explicit_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `db_explicit_comment`
--
ALTER TABLE `db_explicit_comment`
  MODIFY `comment_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `db_explicit_like`
--
ALTER TABLE `db_explicit_like`
  MODIFY `like_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `db_friend_trans`
--
ALTER TABLE `db_friend_trans`
  MODIFY `trans_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `db_group`
--
ALTER TABLE `db_group`
  MODIFY `group_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `db_group_trans`
--
ALTER TABLE `db_group_trans`
  MODIFY `trans_id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `db_gurumapel`
--
ALTER TABLE `db_gurumapel`
  MODIFY `gurumapel_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `db_login_activity`
--
ALTER TABLE `db_login_activity`
  MODIFY `activity_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `db_mapel`
--
ALTER TABLE `db_mapel`
  MODIFY `mapel_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48125;

--
-- AUTO_INCREMENT for table `db_mission`
--
ALTER TABLE `db_mission`
  MODIFY `mission_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `db_mission_progress`
--
ALTER TABLE `db_mission_progress`
  MODIFY `progress_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `db_mission_trans`
--
ALTER TABLE `db_mission_trans`
  MODIFY `trans_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `db_notif`
--
ALTER TABLE `db_notif`
  MODIFY `id_notif` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `db_point_trans`
--
ALTER TABLE `db_point_trans`
  MODIFY `trans_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `db_point_transfer`
--
ALTER TABLE `db_point_transfer`
  MODIFY `id_trx` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `db_tacit`
--
ALTER TABLE `db_tacit`
  MODIFY `tacit_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `db_tacit_comment`
--
ALTER TABLE `db_tacit_comment`
  MODIFY `comment_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `db_tacit_like`
--
ALTER TABLE `db_tacit_like`
  MODIFY `like_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `db_user`
--
ALTER TABLE `db_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=516;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `db_avatar_trans`
--
ALTER TABLE `db_avatar_trans`
  ADD CONSTRAINT `db_avatar_trans_ibfk_1` FOREIGN KEY (`avatar_id`) REFERENCES `db_avatar` (`avatar_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `db_avatar_trans_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `db_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `db_avatar_used`
--
ALTER TABLE `db_avatar_used`
  ADD CONSTRAINT `db_avatar_used_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `db_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `db_avatar_used_ibfk_2` FOREIGN KEY (`avatar_id`) REFERENCES `db_avatar` (`avatar_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `db_badges_trans`
--
ALTER TABLE `db_badges_trans`
  ADD CONSTRAINT `db_badges_trans_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `db_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `db_badges_trans_ibfk_2` FOREIGN KEY (`badges_id`) REFERENCES `db_badges` (`badges_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `db_class_trans`
--
ALTER TABLE `db_class_trans`
  ADD CONSTRAINT `db_class_trans_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `db_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `db_class_trans_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `db_class` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `db_explicit`
--
ALTER TABLE `db_explicit`
  ADD CONSTRAINT `db_explicit_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `db_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `db_explicit_ibfk_2` FOREIGN KEY (`mapel_id`) REFERENCES `db_mapel` (`mapel_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `db_explicit_comment`
--
ALTER TABLE `db_explicit_comment`
  ADD CONSTRAINT `db_explicit_comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `db_user` (`user_id`);

--
-- Constraints for table `db_explicit_like`
--
ALTER TABLE `db_explicit_like`
  ADD CONSTRAINT `db_explicit_like_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `db_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `db_friend_trans`
--
ALTER TABLE `db_friend_trans`
  ADD CONSTRAINT `db_friend_trans_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `db_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `db_friend_trans_ibfk_2` FOREIGN KEY (`friend_id`) REFERENCES `db_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `db_group`
--
ALTER TABLE `db_group`
  ADD CONSTRAINT `db_group_ibfk_1` FOREIGN KEY (`pembina`) REFERENCES `db_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `db_group_trans`
--
ALTER TABLE `db_group_trans`
  ADD CONSTRAINT `db_group_trans_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `db_group` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `db_group_trans_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `db_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `db_gurumapel`
--
ALTER TABLE `db_gurumapel`
  ADD CONSTRAINT `db_gurumapel_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `db_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `db_login_activity`
--
ALTER TABLE `db_login_activity`
  ADD CONSTRAINT `db_login_activity_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `db_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `db_mission`
--
ALTER TABLE `db_mission`
  ADD CONSTRAINT `db_mission_ibfk_1` FOREIGN KEY (`pembina`) REFERENCES `db_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `db_mission_progress`
--
ALTER TABLE `db_mission_progress`
  ADD CONSTRAINT `db_mission_progress_ibfk_1` FOREIGN KEY (`mission_id`) REFERENCES `db_mission` (`mission_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `db_mission_progress_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `db_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `db_mission_trans`
--
ALTER TABLE `db_mission_trans`
  ADD CONSTRAINT `db_mission_trans_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `db_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `db_mission_trans_ibfk_3` FOREIGN KEY (`mission_id`) REFERENCES `db_mission` (`mission_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `db_point_trans`
--
ALTER TABLE `db_point_trans`
  ADD CONSTRAINT `db_point_trans_ibfk_1` FOREIGN KEY (`point_id`) REFERENCES `db_point` (`point_id`),
  ADD CONSTRAINT `db_point_trans_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `db_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `db_point_trans_ibfk_3` FOREIGN KEY (`trans_verified`) REFERENCES `db_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `db_point_transfer`
--
ALTER TABLE `db_point_transfer`
  ADD CONSTRAINT `db_point_transfer_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `db_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `db_point_transfer_ibfk_2` FOREIGN KEY (`friend_id`) REFERENCES `db_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `db_tacit`
--
ALTER TABLE `db_tacit`
  ADD CONSTRAINT `db_tacit_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `db_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `db_tacit_ibfk_2` FOREIGN KEY (`mapel_id`) REFERENCES `db_mapel` (`mapel_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `db_tacit_comment`
--
ALTER TABLE `db_tacit_comment`
  ADD CONSTRAINT `db_tacit_comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `db_user` (`user_id`),
  ADD CONSTRAINT `db_tacit_comment_ibfk_2` FOREIGN KEY (`tacit_id`) REFERENCES `db_tacit` (`tacit_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `db_tacit_like`
--
ALTER TABLE `db_tacit_like`
  ADD CONSTRAINT `db_tacit_like_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `db_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `db_tacit_like_ibfk_2` FOREIGN KEY (`tacit_id`) REFERENCES `db_tacit` (`tacit_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
