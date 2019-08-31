-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 31, 2019 lúc 04:02 PM
-- Phiên bản máy phục vụ: 10.3.15-MariaDB
-- Phiên bản PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `blog`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'RPG', '2019-06-10 17:00:00', '2019-08-23 10:16:35', NULL),
(2, 'Survival', '2019-06-26 13:39:00', '2019-08-23 10:16:54', NULL),
(3, 'Adventure', '2019-06-26 13:39:05', '2019-08-23 10:17:18', NULL),
(4, 'Multiplayer', '2019-06-26 13:39:11', '2019-08-23 10:17:38', NULL),
(5, 'Singleplayer', '2019-06-26 13:41:29', '2019-08-23 10:18:01', NULL),
(34, 'Sci-fi', '2019-08-23 10:18:24', '2019-08-23 10:32:24', '2019-08-23 10:32:24'),
(35, 'Science Fiction', '2019-08-23 10:18:51', '2019-08-23 10:19:18', NULL),
(36, 'First Person', '2019-08-23 10:19:41', '2019-08-23 10:19:41', NULL),
(37, 'Strategy', '2019-08-23 10:21:16', '2019-08-23 10:21:16', NULL),
(38, 'Turn Base', '2019-08-23 10:21:40', '2019-08-23 10:21:40', NULL),
(39, 'Fantasy', '2019-08-23 10:21:55', '2019-08-23 10:21:55', NULL),
(40, 'Military', '2019-08-23 10:33:03', '2019-08-23 10:33:03', NULL),
(41, 'RTS', '2019-08-23 10:33:24', '2019-08-23 10:33:24', NULL),
(42, 'Anime', '2019-08-23 12:15:22', '2019-08-23 12:15:22', NULL),
(43, 'Fighting', '2019-08-23 12:15:47', '2019-08-23 12:15:47', NULL),
(44, 'Story Rich', '2019-08-23 12:16:11', '2019-08-23 12:16:11', NULL),
(45, 'Third person', '2019-08-23 12:16:32', '2019-08-23 12:16:32', NULL),
(46, 'Action', '2019-08-23 12:17:32', '2019-08-23 12:17:32', NULL),
(47, 'Beat em up', '2019-08-23 12:17:58', '2019-08-23 12:17:58', NULL),
(48, 'JRPG', '2019-08-23 13:17:44', '2019-08-23 13:17:44', NULL),
(49, 'Hack n Slash', '2019-08-23 13:18:52', '2019-08-23 13:18:52', NULL),
(50, 'Visual Novel', '2019-08-23 13:19:48', '2019-08-23 13:19:48', NULL),
(51, 'Classic', '2019-08-24 16:43:37', '2019-08-24 16:43:37', NULL),
(52, 'Historical', '2019-08-24 16:44:11', '2019-08-24 16:44:11', NULL),
(53, 'Medieval', '2019-08-24 16:52:59', '2019-08-24 16:52:59', NULL),
(54, 'Base Building', '2019-08-25 22:41:09', '2019-08-25 22:41:09', NULL),
(55, 'Tactical', '2019-08-25 22:42:23', '2019-08-25 22:42:23', NULL),
(56, 'Resource Management', '2019-08-25 22:42:58', '2019-08-25 22:42:58', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `post_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `rating` double DEFAULT NULL,
  `dlc_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `content`, `status`, `post_id`, `created_at`, `updated_at`, `deleted_at`, `user_id`, `rating`, `dlc_id`) VALUES
(98, '<p>cjscjsdhif ejweifwofwebfwef fewifwfwe ưefiwefiwefiwfwe</p>', 1, 58, '2019-08-13 08:02:25', '2019-08-13 08:02:25', NULL, 2, 3, NULL),
(99, '<p>hgdsjkcsv sdvsosdvsdpbe veiosdvsdjsoe eifewkfwlfvd&nbsp;&nbsp;</p>', 1, 58, '2019-08-13 08:06:10', '2019-08-13 08:06:10', NULL, 20, 4, NULL),
(100, '<p>kedhjf efjhfwfowfw fweufwefiwefowefwe fvewvwevoweofwoefwe&nbsp;</p>', 1, 58, '2019-08-13 08:07:30', '2019-08-13 08:07:30', NULL, 22, 5, NULL),
(101, '<p>bdbfgnfnnfngn fbdbdgd b dbdffbd fdbdfbd</p>', 1, 58, '2019-08-13 08:13:52', '2019-08-13 08:13:52', NULL, 21, 1, NULL),
(103, '<p>ggefjuv uefuwef wfuwe feufuwfwef iweifwef weffwefwe&nbsp;</p>', 1, 58, '2019-08-13 08:29:23', '2019-08-13 08:29:23', NULL, 23, 3, NULL),
(104, '<p>cdssdvv fdsvsvsvsdvsvsdvsdvs</p>', 1, 57, '2019-08-13 08:53:40', '2019-08-13 08:53:40', NULL, 23, 4, NULL),
(105, '<p>jhcjv vwvjfuwewfv wevwewefwe fweufwe fwefweif wefuwefiwef wfiwefwe&nbsp;</p>', 1, 57, '2019-08-13 08:59:27', '2019-08-13 08:59:27', NULL, 2, 3, NULL),
(106, '<p>cjscshcsucacancascscacsica cascascasocasc acascoascasocasncascas casicascascasocascas coascoascoascnasc sciscscsd</p>', 1, 58, '2019-08-13 13:48:46', '2019-08-13 13:48:46', NULL, 1, 2, NULL),
(112, '<p>wff ewfoeowfw wowfpwf fweg wwoefpwefw oefwe fwecpa asdv s</p>', 1, 58, '2019-08-13 14:32:10', '2019-08-17 17:31:00', NULL, 24, 5, NULL),
(113, '<p>vmjdvjsv vsjvsdele fwe fwefwfw fwefkwe&nbsp;</p>', 0, NULL, '2019-08-14 07:33:37', '2019-08-14 07:34:38', NULL, 2, 5, 5),
(114, '<p>vmjdvjsv vsjvsdele fwe fwefwfw fwefkwe wfcscsdcsdcsdcwcs sewcsdv sd ds ds&nbsp;</p>', 0, NULL, '2019-08-14 07:34:48', '2019-08-14 07:42:42', NULL, 2, 2, 5),
(115, '<p>vmjdvjsv vsjvsdele fwe fwefwfw fwefkwe wfcscsdcsdcsdcwcs sewcsdv sd ds ds&nbsp;</p>', 1, NULL, '2019-08-14 07:42:47', '2019-08-21 14:14:44', NULL, 2, 5, 5),
(116, '<p><span style=\"background-color:#ffffff; color:#6c757d; font-family:Inconsolata,SFMono-Regular,Menlo,Monaco,Consolas,&quot;Liberation Mono&quot;,&quot;Courier New&quot;,monospace; font-size:15px; text-align:center\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span></p>\n\n<p><span style=\"background-color:#ffffff; color:#6c757d; font-family:Inconsolata,SFMono-Regular,Menlo,Monaco,Consolas,&quot;Liberation Mono&quot;,&quot;Courier New&quot;,monospace; font-size:15px; text-align:center\">It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span></p>', 1, 59, '2019-08-23 17:07:55', '2019-08-23 17:07:55', NULL, 1, 4, NULL),
(117, '<p>fwefwefhjfwehjfwe fwbjfjfefjwefhwhfwekjfwelkfefwef wefjwefwefwefkwefw fwejfwejfwe fwejfwejfwej fwejfw efwf ưefj</p>', 0, 59, '2019-08-23 17:27:07', '2019-08-23 17:27:21', NULL, 2, 5, NULL),
(118, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\n\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', 0, 59, '2019-08-23 17:27:59', '2019-08-23 17:32:12', NULL, 2, 5, NULL),
(119, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\n\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', 0, 59, '2019-08-23 17:34:10', '2019-08-23 17:34:20', NULL, 2, 5, NULL),
(120, '<pre style=\"background-color: rgb(255, 255, 255); font-family: Consolas; font-size: 9.8pt;\">\n&amp;&amp; <span style=\"color:#458383\">rating </span>!= <span style=\"color:#0000ff\">0 </span>&amp;&amp; <span style=\"color:#458383; font-size:9.8pt\">rating </span><span style=\"font-size:9.8pt\">!= </span><span style=\"color:#0000ff; font-size:9.8pt\">0 </span>&amp;&amp; <span style=\"color:#458383; font-size:9.8pt\">rating </span><span style=\"font-size:9.8pt\">!= </span><span style=\"color:#0000ff; font-size:9.8pt\">0 </span>&amp;&amp; <span style=\"color:#458383; font-size:9.8pt\">rating </span><span style=\"font-size:9.8pt\">!= </span><span style=\"color:#0000ff; font-size:9.8pt\">0</span></pre>', 0, 59, '2019-08-23 17:42:48', '2019-08-23 17:43:01', NULL, 2, 2, NULL),
(121, '<p><span style=\"background-color:#ffffff; color:#6c757d; font-family:Inconsolata,SFMono-Regular,Menlo,Monaco,Consolas,&quot;Liberation Mono&quot;,&quot;Courier New&quot;,monospace; font-size:15px; text-align:center\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span><span style=\"background-color:#ffffff; color:#6c757d; font-family:Inconsolata,SFMono-Regular,Menlo,Monaco,Consolas,&quot;Liberation Mono&quot;,&quot;Courier New&quot;,monospace; font-size:15px; text-align:center\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span></p>\n\n<p><span style=\"background-color:#ffffff; color:#6c757d; font-family:Inconsolata,SFMono-Regular,Menlo,Monaco,Consolas,&quot;Liberation Mono&quot;,&quot;Courier New&quot;,monospace; font-size:15px; text-align:center\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span></p>', 1, 59, '2019-08-23 18:07:25', '2019-08-23 18:07:25', NULL, 2, 5, NULL),
(122, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, NULL, '2019-08-23 18:25:42', '2019-08-23 18:25:42', NULL, 2, 4, 21),
(123, '<p><span style=\"background-color:#ffffff; color:#6c757d; font-family:Inconsolata,SFMono-Regular,Menlo,Monaco,Consolas,&quot;Liberation Mono&quot;,&quot;Courier New&quot;,monospace; font-size:18px\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.&nbsp;</span></p>\n\n<p><span style=\"background-color:#ffffff; color:#6c757d; font-family:Inconsolata,SFMono-Regular,Menlo,Monaco,Consolas,&quot;Liberation Mono&quot;,&quot;Courier New&quot;,monospace; font-size:18px\">It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', 1, NULL, '2019-08-23 18:26:39', '2019-08-23 18:26:39', NULL, 22, 3, 21),
(124, '<p><span style=\"background-color:#ffffff; color:#6c757d; font-family:Inconsolata,SFMono-Regular,Menlo,Monaco,Consolas,&quot;Liberation Mono&quot;,&quot;Courier New&quot;,monospace; font-size:18px\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>\n\n<p><span style=\"background-color:#ffffff; color:#6c757d; font-family:Inconsolata,SFMono-Regular,Menlo,Monaco,Consolas,&quot;Liberation Mono&quot;,&quot;Courier New&quot;,monospace; font-size:18px\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', 1, NULL, '2019-08-23 18:27:35', '2019-08-23 18:27:35', NULL, 23, 2, 21),
(125, '<p><span style=\"background-color:#ffffff; color:#6c757d; font-family:Inconsolata,SFMono-Regular,Menlo,Monaco,Consolas,&quot;Liberation Mono&quot;,&quot;Courier New&quot;,monospace; font-size:18px\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.&nbsp;</span></p>', 1, NULL, '2019-08-23 18:28:17', '2019-08-23 18:28:17', NULL, 1, 5, 21),
(126, '<p><span style=\"background-color:#ffffff; color:#6c757d; font-family:Inconsolata,SFMono-Regular,Menlo,Monaco,Consolas,&quot;Liberation Mono&quot;,&quot;Courier New&quot;,monospace; font-size:18px\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.&nbsp;</span></p>', 1, NULL, '2019-08-23 18:29:27', '2019-08-23 18:29:27', NULL, 24, 3, 21),
(127, '<p><span style=\"background-color:#ffffff; color:#6c757d; font-family:Inconsolata,SFMono-Regular,Menlo,Monaco,Consolas,&quot;Liberation Mono&quot;,&quot;Courier New&quot;,monospace; font-size:18px\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.&nbsp;</span></p>', 1, NULL, '2019-08-23 18:30:10', '2019-08-23 18:30:10', NULL, 21, 5, 21),
(128, '<p><span style=\"background-color:#ffffff; color:#6c757d; font-family:Inconsolata,SFMono-Regular,Menlo,Monaco,Consolas,&quot;Liberation Mono&quot;,&quot;Courier New&quot;,monospace; font-size:15px; text-align:center\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span></p>\n\n<p><span style=\"background-color:#ffffff; color:#6c757d; font-family:Inconsolata,SFMono-Regular,Menlo,Monaco,Consolas,&quot;Liberation Mono&quot;,&quot;Courier New&quot;,monospace; font-size:15px; text-align:center\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span></p>', 1, 60, '2019-08-23 18:38:41', '2019-08-23 18:38:41', NULL, 1, 5, NULL),
(129, '<p><span style=\"background-color:#ffffff; color:#6c757d; font-family:Inconsolata,SFMono-Regular,Menlo,Monaco,Consolas,&quot;Liberation Mono&quot;,&quot;Courier New&quot;,monospace; font-size:15px; text-align:center\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span></p>', 1, 60, '2019-08-23 18:39:17', '2019-08-23 18:39:17', NULL, 2, 5, NULL),
(130, '<p><span style=\"background-color:#ffffff; color:#6c757d; font-family:Inconsolata,SFMono-Regular,Menlo,Monaco,Consolas,&quot;Liberation Mono&quot;,&quot;Courier New&quot;,monospace; font-size:15px; text-align:center\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span></p>', 1, 60, '2019-08-23 18:39:57', '2019-08-23 18:39:57', NULL, 20, 4, NULL),
(131, '<p><span style=\"background-color:#ffffff; color:#6c757d; font-family:Inconsolata,SFMono-Regular,Menlo,Monaco,Consolas,&quot;Liberation Mono&quot;,&quot;Courier New&quot;,monospace; font-size:15px; text-align:center\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span></p>', 1, 60, '2019-08-23 18:40:41', '2019-08-23 18:40:41', NULL, 21, 3, NULL),
(132, '<p>dqyduidqwfdwegyfwefuwefnfwykefw</p>', 0, 61, '2019-08-26 12:14:00', '2019-08-26 12:14:10', NULL, 1, 4, NULL),
(133, '<p>dqyduidqwfdwegyfwefuwefnfwykefw</p>', 0, 61, '2019-08-26 12:14:14', '2019-08-26 12:15:22', NULL, 1, 5, NULL),
(134, '<p>csđvdsjkfshjfskvsjvsdkvsvgsgầg</p>', 1, 61, '2019-08-26 12:20:24', '2019-08-26 12:20:24', NULL, 1, 3, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `iso` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nicename` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iso3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numcode` int(11) DEFAULT NULL,
  `phonecode` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `countries`
--

INSERT INTO `countries` (`id`, `iso`, `name`, `nicename`, `iso3`, `numcode`, `phonecode`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4, 93),
(2, 'AL', 'ALBANIA', 'Albania', 'ALB', 8, 355),
(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', 12, 213),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16, 1684),
(5, 'AD', 'ANDORRA', 'Andorra', 'AND', 20, 376),
(6, 'AO', 'ANGOLA', 'Angola', 'AGO', 24, 244),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', 660, 1264),
(8, 'AQ', 'ANTARCTICA', 'Antarctica', 'ATA', 10, 0),
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
(29, 'BV', 'BOUVET ISLAND', 'Bouvet Island', 'BVT', 74, 0),
(30, 'BR', 'BRAZIL', 'Brazil', 'BRA', 76, 55),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', 'IOT', 86, 246),
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
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', 'CXR', 162, 61),
(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', 170, 57),
(48, 'KM', 'COMOROS', 'Comoros', 'COM', 174, 269),
(49, 'CG', 'CONGO', 'Congo', 'COG', 178, 242),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180, 242),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184, 682),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188, 506),
(53, 'CI', 'COTE D\'IVOIRE', 'Cote D\'Ivoire', 'CIV', 384, 225),
(54, 'HR', 'CROATIA', 'Croatia', 'HRV', 191, 385),
(55, 'CU', 'CUBA', 'Cuba', 'CUB', 192, 53),
(56, 'CY', 'CYPRUS', 'Cyprus', 'CYP', 196, 357),
(57, 'CZ', 'CZECHIA', 'Czech Republic', 'CZE', 203, 420),
(58, 'DK', 'DENMARK', 'Denmark', 'DNK', 208, 45),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262, 253),
(60, 'DM', 'DOMINICA', 'Dominica', 'DMA', 212, 1767),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214, 1),
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
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', 'ATF', 260, 0),
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
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', 'HMD', 334, 0),
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
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'Korea, Democratic People\'s Republic of', 'PRK', 408, 850),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410, 82),
(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', 414, 965),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417, 996),
(116, 'LA', 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'Lao People\'s Democratic Republic', 'LAO', 418, 856),
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
(137, 'YT', 'MAYOTTE', 'Mayotte', 'MYT', 175, 269),
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
(176, 'RO', 'ROMANIA', 'Romania', 'ROU', 642, 40),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643, 7),
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
(189, 'RS', 'SERBIA', 'Serbia', 'SRB', 688, 381),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690, 248),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694, 232),
(192, 'SG', 'SINGAPORE', 'Singapore', 'SGP', 702, 65),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703, 421),
(194, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', 705, 386),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90, 677),
(196, 'SO', 'SOMALIA', 'Somalia', 'SOM', 706, 252),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710, 27),
(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', 'SGS', 239, 0),
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
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', 'TLS', 626, 670),
(213, 'TG', 'TOGO', 'Togo', 'TGO', 768, 228),
(214, 'TK', 'TOKELAU', 'Tokelau', 'TKL', 772, 690),
(215, 'TO', 'TONGA', 'Tonga', 'TON', 776, 676),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780, 1868),
(217, 'TN', 'TUNISIA', 'Tunisia', 'TUN', 788, 216),
(218, 'TR', 'TURKEY', 'Turkey', 'TUR', 792, 90),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795, 993),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796, 1649),
(221, 'TV', 'TUVALU', 'Tuvalu', 'TUV', 798, 688),
(222, 'UG', 'UGANDA', 'Uganda', 'UGA', 800, 256),
(223, 'UA', 'UKRAINE', 'Ukraine', 'UKR', 804, 380),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784, 971),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826, 44),
(226, 'US', 'UNITED STATES', 'United States', 'USA', 840, 1),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', 'UMI', 581, 1),
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
(240, 'ME', 'MONTENEGRO', 'Montenegro', 'MNE', 499, 382),
(241, 'XK', 'KOSOVO', 'Kosovo', 'XKX', 0, 383),
(242, 'AX', 'ALAND ISLANDS', 'Aland Islands', 'ALA', 248, 358),
(243, 'BQ', 'BONAIRE, SINT EUSTATIUS AND SABA', 'Bonaire, Sint Eustatius and Saba', 'BES', 535, 599),
(244, 'CW', 'CURACAO', 'Curacao', 'CUW', 531, 599),
(245, 'GG', 'GUERNSEY', 'Guernsey', 'GGY', 831, 44),
(246, 'IM', 'ISLE OF MAN', 'Isle of Man', 'IMN', 833, 44),
(247, 'JE', 'JERSEY', 'Jersey', 'JEY', 832, 44),
(248, 'BL', 'SAINT BARTHELEMY', 'Saint Barthelemy', 'BLM', 652, 590),
(249, 'MF', 'SAINT MARTIN', 'Saint Martin', 'MAF', 663, 590),
(250, 'SX', 'SINT MAARTEN', 'Sint Maarten', 'SXM', 534, 1),
(251, 'SS', 'SOUTH SUDAN', 'South Sudan', 'SSD', 728, 211);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dlcs`
--

CREATE TABLE `dlcs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) NOT NULL,
  `cover` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `discount` double DEFAULT NULL,
  `windows` int(11) NOT NULL,
  `xbox` int(11) NOT NULL,
  `playstation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dlcs`
--

INSERT INTO `dlcs` (`id`, `post_id`, `cover`, `title`, `content`, `price`, `deleted_at`, `created_at`, `updated_at`, `user_id`, `discount`, `windows`, `xbox`, `playstation`) VALUES
(4, 58, 'images/1565605162_dlccover.jpg', 'Age of Wonders: Planetfall Deluxe Edition Content Pack', '<h2>ABOUT THIS CONTENT</h2>\r\n\r\n<p>Kit out your personal commander with a plethora of cosmetic items and explore the art that inspired the creation of Planetfall with the Digital Arbook and Original Soundtrack.</p>\r\n\r\n<h2>Deluxe Edition Content Includes:</h2>\r\n\r\n<p><br />\r\n<strong>Digital Artbook</strong><br />\r\nExperience the colorful and imaginative art that brought the world of Age of Wonders: Planetfall to life.&nbsp;<br />\r\n<br />\r\n<strong>Original Soundtrack</strong><br />\r\nImmerse yourself in the fantastical world of Planetfall with the games original soundtrack.&nbsp;<br />\r\n<br />\r\n<strong>Bravado Bundle Cosmetic Pack</strong><br />\r\nNothing says &ldquo;We&rsquo;re here to rebuild society in our image&rdquo; like a really boss bandana.<br />\r\n<br />\r\n<strong>Spacerpunk Cosmetic Pack</strong><br />\r\nYour style won&rsquo;t conform to the rules of a fallen galactic society!&nbsp;<br />\r\n<br />\r\n<strong>Infested Worlds Scenario Planet</strong><br />\r\nSurvive in a world overtaken by alien flora and fauna dominated by Kir&rsquo;ko factions!</p>\r\n\r\n<h2>SYSTEM REQUIREMENTS</h2>\r\n\r\n<ul>\r\n	<li><strong>MINIMUM:</strong>\r\n\r\n	<ul>\r\n		<li><strong>OS:</strong>&nbsp;Windows 7 SP1, Windows 8.1 or Windows 10 (64-bit versions)</li>\r\n		<li><strong>Processor:</strong>&nbsp;Intel Core i5 (3rd Generation) or AMD FX Series processor (or equivalents)</li>\r\n		<li><strong>Memory:</strong>&nbsp;6 GB RAM</li>\r\n		<li><strong>Graphics:</strong>&nbsp;nVidia GTX 650Ti 1GB or AMD Radeon HD 7770 (or equivalents)</li>\r\n		<li><strong>Sound Card:</strong>&nbsp;DirectX Compatible Sound Card with latest drivers</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><strong>RECOMMENDED:</strong>\r\n\r\n	<ul>\r\n		<li><strong>OS:</strong>&nbsp;Windows 10 (64-bit)</li>\r\n		<li><strong>Processor:</strong>&nbsp;Intel Core i5 (7th or 8th Generation) or AMD Ryzen 5</li>\r\n		<li><strong>Memory:</strong>&nbsp;8 GB RAM</li>\r\n		<li><strong>Graphics:</strong>&nbsp;nVidia GeForce GTX 1060 3GB or AMD Radeon RX 570 4GB (or equivalents)</li>\r\n		<li><strong>Sound Card:</strong>&nbsp;DirectX Compatible Sound Card with latest drivers</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<p>&copy; 2019 Paradox Interactive AB, AGE OF WONDERS: PLANETFALL, and PARADOX INTERACTIVE are trademarks and/or registered trademarks of Paradox Interactive AB in Europe, the U.S., and other countries. Age of Wonders, the Age of Wonders logo, Triumph Studios and the Triumph Studios logo are trademarks of Triumph Studios B.V.. Copyright (c) 1999-2018 Triumph Studios. All Rights Reserved. Developed by Triumph Studios. All other trademarks, logos, and copyrights are property of their respective owners.</p>', 6.5, NULL, '2019-08-12 10:19:22', '2019-08-23 12:08:41', 1, 0, 1, 1, 1),
(5, 57, 'images/1565605416_dlccover2.jpg', 'Valguero - ARK Expansion Map', '<h2>ABOUT THIS CONTENT</h2>\r\n\r\n<p>Survivors, come explore a vast and diverse 63 km map with a multitude of new land to build on! Witness familiar ARK creatures in an expansive environment and meet, Deinonychus, ARK&rsquo;s newest feathered theropod, found only in Valguero.<br />\r\n<br />\r\nExplore new heights and hidden depths; whether it&rsquo;s creating your foundations in the White Cliffs or unearthing the secrets of the Aberration Trench, Valguero offers a new experience in the ARK universe. With new biomes, challenging dungeon bosses, and mysterious ruins to discover, there&rsquo;s always something exciting &mdash; and dangerous &mdash; on Valguero. Among its more than 60 kilometers, you&rsquo;ll find everything from lush jungles to environmental hazards, snowfields to lava flows, and savannahs to hot springs.<br />\r\n<br />\r\nStep into a brand new ARK experience where the classic ARK gameplay melds with a new adventure - Valguero!&nbsp;<br />\r\n<br />\r\nValguero includes:</p>\r\n\r\n<ul>\r\n	<li>Over 63 kilometers of new land and sea to explore!</li>\r\n	<li>Eight Biomes with a vast array of climates and dangers - tread lightly through the dangers of Skeleton Gorge, see the vistas on top of the Twin Peaks or find remnants of the past at the Lost Temple</li>\r\n	<li>A boss arena where players face a vicious combat sequence against a Megaphiticus, Manticore and Dragon in this heavy-hitting, triple threat encounter! Face familiar dangers in the End-Game Boss encounter in an entirely different way!</li>\r\n	<li>Encounter the ill-natured Deinonychus! Similar to the raptor it uses speed and agility to leap wall ledge to wall ledge as it seeks high vantage points to lie in wait for its prey. This contentious beast is fearless and will hunt prey much larger than itself, latching onto a larger dinosaur&rsquo;s back with its sickle-shaped claws, then starting to feed before its victim is even dead.&nbsp;</li>\r\n	<li>A large network of caves to spelunk as you delve into unexplored territory featuring different themes and varied perks, including the extensive Aberration Trench.&nbsp;</li>\r\n	<li>Test your limits and that of your tribe while experiencing the new risks and rewards Valguero has to offer.</li>\r\n	<li>Explore scattered ruins throughout the world of forgotten Valguero survivors.</li>\r\n</ul>\r\n\r\n<h2>MATURE CONTENT DESCRIPTION</h2>\r\n\r\n<p>The developers describe the content like this:</p>\r\n\r\n<p><em>Mature Content, specifically violence, can occur against other players or creatures within the fantasy setting of our game at any time and is not gated. This would primarily be demonstrated when players use their fists, melee weapons, ranged weapons, or tamed creatures against other players and/or other creatures. Violence may also be demonstrated when wild npc creatures choose to attack player characters and/or other wild or tamed creatures within the game world. Depictions of and reactions to violence (by targeted player character or creature) are not realistically portrayed and the level of blood associated with these acts is mild and limited.</em></p>\r\n\r\n<h2>SYSTEM REQUIREMENTS</h2>\r\n\r\n<p>Windows</p>\r\n\r\n<p>Mac OS X</p>\r\n\r\n<p>SteamOS + Linux</p>\r\n\r\n<ul>\r\n	<li><strong>MINIMUM:</strong>\r\n\r\n	<ul>\r\n		<li><strong>OS:</strong>&nbsp;Windows 7/8.1/10 (64-bit versions)</li>\r\n		<li><strong>Processor:</strong>&nbsp;Intel Core i5-2400/AMD FX-8320 or better</li>\r\n		<li><strong>Memory:</strong>&nbsp;8 GB RAM</li>\r\n		<li><strong>Graphics:</strong>&nbsp;NVIDIA GTX 670 2GB/AMD Radeon HD 7870 2GB or better</li>\r\n		<li><strong>Network:</strong>&nbsp;Broadband Internet connection</li>\r\n		<li><strong>Storage:</strong>&nbsp;20 GB available space</li>\r\n		<li><strong>Additional Notes:</strong>&nbsp;Requires broadband internet connection for multiplayer</li>\r\n	</ul>\r\n	</li>\r\n</ul>', 0, NULL, '2019-08-12 10:23:36', '2019-08-23 11:27:02', 1, 0, 1, 1, 0),
(6, 57, 'images/1566560033_dlccover3.jpg', 'Ragnarok - ARK Expansion Map', '<h2>ABOUT THIS CONTENT</h2>\r\n\r\n<p>Journey through an expansive 144 sq. kilometer environment where elements from The Island, Scorched Earth, and all new biomes are combined to bring the ultimate survivor experience. Whether tackling the extreme cold atop the highest mountains, harvesting resources from an active volcano, or just searching for that perfect base location,&nbsp;<em>Ragnarok</em>&nbsp;plays host to explorers and base builders alike. But survivors beware,&nbsp;<em>Ragnarok</em>&nbsp;houses such creatures as Polar Bears, Ice Wyverns, and a mystical creature many have yet to tame in the ARK universe.&nbsp;<em>Ragnarok</em>&nbsp;boasts many unique features such as: custom explorer notes, challenging dungeons, dungeon bosses, active hot springs, unique pickup-able/harvestable resources, new biomes, an active volcano, unique tree platform locations, environmental traps, unique ruins, and so much more combined with a beautiful world to explore.<br />\r\n<br />\r\n<em>Ragnarok</em>&nbsp;includes:<br />\r\n&nbsp;</p>\r\n\r\n<ul>\r\n	<li>A 144 sq kilometer map designed to be explored by land/sea/air with most places accessible by foot.</li>\r\n	<li>A host of harvest-able resources readily available for players to pick up, including sticks and carrots.</li>\r\n	<li>Building caves designed to be built in, big and small</li>\r\n	<li>New unique takes on former ARK creatures, as well a special creature unique to Ragnarok</li>\r\n	<li>Build tree platforms on unique trees/rocks in biomes other than the redwoods!&nbsp;</li>\r\n	<li>Expansive biomes that were built to reward those who explore them</li>\r\n	<li>Realistic Transitions that blend the terrain more naturally</li>\r\n	<li>Challenging dungeons in that require forethought and preparation</li>\r\n	<li>An active Volcano that while erupting yields a high amount of resources in the form of lava crystal</li>\r\n	<li>Beautiful vistas and base locations as far as the eye can see</li>\r\n	<li>Hot springs that while dormant yield a relaxing buff, but while active can cause a quick death!</li>\r\n	<li>Ruins to not only explore but that can also be incorporated into base builds</li>\r\n	<li>A vast ocean with its own ecosystem</li>\r\n	<li>A future desert to find and tame SE creatures</li>\r\n	<li>Upcoming unique explorer notes that hold the key to Ragnarok&#39;s secrets</li>\r\n</ul>\r\n\r\n<h2>SYSTEM REQUIREMENTS</h2>\r\n\r\n<p>Windows</p>\r\n\r\n<ul>\r\n	<li><strong>MINIMUM:</strong>\r\n\r\n	<ul>\r\n		<li><strong>OS:</strong>&nbsp;Windows 7/8.1/10 (64-bit versions)</li>\r\n		<li><strong>Processor:</strong>&nbsp;Intel Core i5-2400/AMD FX-8320 or better</li>\r\n		<li><strong>Memory:</strong>&nbsp;8 GB RAM</li>\r\n		<li><strong>Graphics:</strong>&nbsp;NVIDIA GTX 670 2GB/AMD Radeon HD 7870 2GB or better</li>\r\n		<li><strong>DirectX:</strong>&nbsp;Version 10</li>\r\n		<li><strong>Storage:</strong>&nbsp;60 GB available space</li>\r\n		<li><strong>Additional Notes:</strong>&nbsp;Requires broadband internet connection for multiplayer</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<p>Mac OS X</p>\r\n\r\n<ul>\r\n	<li><strong>MINIMUM:</strong>\r\n\r\n	<ul>\r\n		<li><strong>OS:</strong>&nbsp;OSX 10.9 or Higher</li>\r\n		<li><strong>Processor:</strong>&nbsp;2 GHz Equivalent CPU</li>\r\n		<li><strong>Memory:</strong>&nbsp;4000 MB RAM</li>\r\n		<li><strong>Graphics:</strong>&nbsp;OpenGL 3 Compatible GPU with 1GB Video RAM</li>\r\n		<li><strong>Storage:</strong>&nbsp;20000 MB available space</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<p>SteamOS + Linux</p>\r\n\r\n<ul>\r\n	<li><strong>MINIMUM:</strong>\r\n\r\n	<ul>\r\n		<li><strong>OS:</strong>&nbsp;Ubuntu Equivalent Distro</li>\r\n		<li><strong>Processor:</strong>&nbsp;2 GHz 64-bit CPU</li>\r\n		<li><strong>Memory:</strong>&nbsp;4000 MB RAM</li>\r\n		<li><strong>Graphics:</strong>&nbsp;OpenGL 3 Compatible GPU with 1GB Video RAM</li>\r\n		<li><strong>Storage:</strong>&nbsp;20000 MB available space</li>\r\n	</ul>\r\n	</li>\r\n</ul>', 0, NULL, '2019-08-23 11:33:53', '2019-08-23 11:35:53', 1, 0, 1, 1, 0),
(7, 57, 'images/1566560696_dlccover4.jpg', 'ARK: Scorched Earth - Expansion Pack', '<h2>ABOUT THIS CONTENT</h2>\r\n\r\n<p>Stranded naked, dehydrated &amp; starving in a vast desert, even the most seasoned ARK survivors must quickly find water, hunt for food, harvest, craft items, and build shelter to have any chance for survival. Use skills honed on ARK&#39;s faraway Island to kill, tame, breed, and ride the fantastical new creatures that have evolved to survive the Desert&#39;s ultra harsh conditions, including... DRAGONS! Travel back and forth between the Island and the Desert to team up with hundreds of players across both worlds or play locally!<br />\r\n<br />\r\nEXPLORE A NEW WORLD<br />\r\nScorched Earth takes ARK players to an entirely new land, composed of six unique, desert themed biomes &ndash; dunes, high desert, mountains, canyons, badlands and oasis &ndash; each with their own aesthetic and ecosystem. Littered with ruins, geysers, and intricate ancient cave systems, survivors will find a whole new frontier to explore and master.<br />\r\n<br />\r\nTAME NEW CREATURES<br />\r\nThe biomes of Scorched Earth are filled with dangerous new creatures, and the intrepid survivor will find that many of them can be tamed. Among others, lead a caravan of the camel-like Morellatops, or rain fire down upon your enemies from the back of an elemental Wyvern. Just mind your step, or you might attract a Death Worm!<br />\r\n<br />\r\nCRAFT OVER 50 NEW ITEMS<br />\r\nUsing what resources they can scrounge together, survivors can craft distinct new outfits and structures to beat the heat, and new tools to help them survive in this desolate environment. Players can use whips, boomerangs, flamethrowers, chainsaws, and much more to defend themselves, or such things as tents, wells, wind turbines, and oil refineries to provide their bases with resources. When used creatively, these tools can open up whole new strategies for survival, self defense or epic tribal warfare.<br />\r\n<br />\r\nCONQUER NEW CHALLENGES<br />\r\nPrepare yourself for dangerous electrical storms, blinding sand storms, befuddling heat stroke, and unleash the power of the mysterious Obelisks to come face-to-face with the ARK&rsquo;s deadliest boss creature to date &ndash; the ferocious Manticore! Does it protect a powerful weapon, a precious relic, or the mysteries of the ARK itself? Only survivors who posses the courage to confront this fearsome beast will learn the truth.<br />\r\n<br />\r\nTRAVEL BETWEEN ARKS<br />\r\nSurvivors can take their character, favorite creatures and items between the Island and the new Desert ARKs, making their Island-dwelling friends jealous with all of the amazing new items, structures, creatures and secrets they find in the Desert.</p>\r\n\r\n<h2>SYSTEM REQUIREMENTS</h2>\r\n\r\n<p>Windows</p>\r\n\r\n<ul>\r\n	<li><strong>MINIMUM:</strong>\r\n\r\n	<ul>\r\n		<li><strong>OS:</strong>&nbsp;64-Bit Windows 7 Service Pack 1, or Windows 8</li>\r\n		<li><strong>Processor:</strong>&nbsp;2 GHz Dual-Core 64-bit CPU</li>\r\n		<li><strong>Memory:</strong>&nbsp;4000 MB RAM</li>\r\n		<li><strong>Storage:</strong>&nbsp;10000 MB available space</li>\r\n	</ul>\r\n	</li>\r\n</ul>', 8, NULL, '2019-08-23 11:44:56', '2019-08-23 11:44:56', 1, 0, 1, 1, 0),
(8, 57, 'images/1566560881_dlccover5.jpg', 'ARK: Aberration - Expansion Pack', '<h2>ABOUT THIS CONTENT</h2>\r\n\r\n<p>Waking up on &lsquo;Aberration&rsquo;, a derelict, malfunctioning ARK with an elaborate underground biome system, survivors face exotic new challenges unlike anything before: extreme radioactive sunlight and environmental hazards, ziplines, wingsuits, climbing gear, cave dwellings, charge-batteries, and far more, along with a stable of extraordinary new creatures await within the mysterious depths. But beware the &lsquo;Nameless&rsquo;: unrelenting, Element-infused humanoids which have evolved into vicious light-hating monstrosities! On Aberration, survivors will uncover the ultimate secrets of the ARKs, and discover what the future holds in store for those strong and clever enough to survive!<br />\r\n<br />\r\nOwners of ARK&#39;s &quot;Season Pass&quot; also get additional exclusive in-game Aberration-themed cosmetic item skins:<br />\r\n<br />\r\n<img src=\"https://steamcdn-a.akamaihd.net/steam/apps/708770/extras/PugMask.png?t=1519238805\" /><br />\r\n- The Bulbdog Mask, representing the cheery demeanor of this loyal ward against the Nameless.<br />\r\n<br />\r\n<img src=\"https://steamcdn-a.akamaihd.net/steam/apps/708770/extras/ReaperHelmet.png?t=1519238805\" /><br />\r\n- The Reaper Helmet, depicting the frightening visage of these dangerous behemoths that roam the Element-infused depths and irradiated surface of Aberration.<br />\r\n<br />\r\n<img src=\"https://steamcdn-a.akamaihd.net/steam/apps/708770/extras/Aberration_Helmet.png?t=1519238805\" /><br />\r\n- The Aberration Helmet, formed from the damaged ARK&#39;s obsidian-like underground rock, creates an imposing presence for Survivors who wear it.<br />\r\n<br />\r\n<img src=\"https://steamcdn-a.akamaihd.net/steam/apps/708770/extras/AberrationSword.png?t=1519238805\" /><br />\r\n- The Aberration Sword, forged from the Element Crystals that run within the deepest chambers of the ARK, emits a subtle glow to strike fear into your enemies.<br />\r\n<br />\r\nAN ARK GONE AWRY<br />\r\nAberration places survivors on a damaged ARK: its internal atmosphere has leaked away, resulting in a harsh surface with intense radiation, and a plethora of lush biomes underground. With the maintenance systems of this ARK malfunctioning, the many hazards, creatures, and nature of the environment present a thrilling new world to explore and master.<br />\r\n<br />\r\nTAME NEW CREATURES<br />\r\nCapture and tame fourteen new creature types with amazing abilities! Clamber up walls &amp; glide through the air on a self-camouflaging Rock Drake&rsquo;, keep the dark at bay with one of four friendly &lsquo;Lantern Pets&rsquo;, or grab and toss multiple creatures simultaneously with a massive &lsquo;Cave Crustacean&rsquo;, or -- if you are brave enough - allow the horrific &quot;Reaper Queen&quot; to impregnate you, and spawn a vicious male Reaper alien lifeform you can tame and control.<br />\r\n<br />\r\nCRAFT 50+ UNIQUE ITEMS<br />\r\nWith 30 new Engrams to speed your crafting, you&#39;ll now have access to cave-climbing picks, gliding wingsuits, and ziplines to traverse this new ARK. Dominate the harsh environment and protect yourself with hazmat outfits, charge lanterns, flashbangs, batteries, glowsticks, railguns and much more. Thrive by gathering new resources, using fishing baskets, and gas collectors.<br />\r\n<br />\r\nCONQUER NEW CHALLENGES<br />\r\nWith the maintenance systems of this new ARK malfunctioning, earthquakes, radiation exposure, gas leaks, and Element chambers are among the many hazards that survivors will learn to grapple with Aberration&rsquo;s five new major biomes, both aboveground and below the surface.&nbsp;<br />\r\n<br />\r\nAN INTRIGUING STORYLINE<br />\r\nGear-up to take on the terrifying threat lurking within the deepest depths of Aberration as you uncover the ultimate secrets of the ARKs, and learn more about the future of Ark itself!</p>\r\n\r\n<h2>SYSTEM REQUIREMENTS</h2>\r\n\r\n<p>Windows</p>\r\n\r\n<ul>\r\n	<li><strong>MINIMUM:</strong>\r\n\r\n	<ul>\r\n		<li><strong>OS:</strong>&nbsp;Windows 7/8.1/10 (64-bit versions)</li>\r\n		<li><strong>Processor:</strong>&nbsp;Intel Core i5-2400/AMD FX-8320 or better</li>\r\n		<li><strong>Memory:</strong>&nbsp;8 GB RAM</li>\r\n		<li><strong>Graphics:</strong>&nbsp;NVIDIA GTX 670 2GB/AMD Radeon HD 7870 2GB or better</li>\r\n		<li><strong>Storage:</strong>&nbsp;20 GB available space</li>\r\n		<li><strong>Additional Notes:</strong>&nbsp;Requires broadband internet connection for multiplayer</li>\r\n	</ul>\r\n	</li>\r\n</ul>', 8, NULL, '2019-08-23 11:48:01', '2019-08-23 11:48:01', 1, 0, 1, 1, 0),
(9, 57, 'images/1566561065_dlccover6.jpg', 'ARK: Extinction - Expansion Pack', '<h2>ABOUT THIS CONTENT</h2>\r\n\r\n<p>Finish your journey through the worlds of ARK in &lsquo;Extinction&rsquo;, where the story began and ends: on Earth itself! An Element-infested, ravaged planet filled with fantastical creatures both organic &amp; technological, Earth holds both the secrets of the past and the keys to its salvation. As a veteran Survivor who has conquered all previous obstacles, your ultimate challenge awaits: can you defeat the gigantic roaming Titans which dominate the planet, and complete the ARK cycle to save Earth&#39;s future?<br />\r\n<br />\r\nA PLANET IN DISTRESS<br />\r\nExtinction brings survivors back to where the mysterious journey all started; Earth. What was once a lush and thriving home world is now a corrupt, hostile and desolate shell of its former self. Venture into the diverse landscape where ruins of a past civilization reveal clues to Earth&rsquo;s demise along with the keys to reviving its future. At the heart of this bleak and foreboding terrain is an overgrown, deserted technological metropolis that rises amidst the waste. Discover and explore long abandoned micro-biospheres which served as the early prototypes for the ARKs of today.<br />\r\n<br />\r\nTAME NEW CREATURES<br />\r\nCapture, tame and craft powerful and unusual organic and mechanical creature types different from anything previously seen in the ARK universe. Increase situational awareness by flying and controlling robotic surveillance drones. Harvest valuable resources by taming and feeding organic transmutation machines. Reach new heights and remote locations by climbing and teleporting with the ultimate security bot. Ensure your survival by building and piloting your own customizable battle mech to victory!<br />\r\n<br />\r\nCRAFT UNIQUE ITEMS<br />\r\nEnsure mastery on this forsaken world with many new and exotic craftable items. Keep your tames where you want them with a creature leash, use taxidermy tools to enhance your home decor with trophy mounts from your most memorable kills, span and traverse previously uncrossable gaps with a Tek bridge, store and preserve your favorite friendly creature in a portable cryopod for reuse later, utilize Tek gravity grenades to attract or repel foes to your advantage, and autonomously airlift loot back to your base with an airborne delivery crate!<br />\r\n<br />\r\nCONQUER NEW CHALLENGES<br />\r\nAs Element runs rampant across Earth, corrupting and mutating all that it touches, Survivors must be prepared for the unique challenges fueled from these cataclysmic events. Engage in epic battles of titanic proportions when encountering the colossal Titans that rule this hostile planet as the ultimate apex predator. Scour the wastelands for orbital supply drops and protect the precious cargo they contain while fending off an onslaught of Element-corrupted monstrosities barely resembling their former selves. Survive and shelter from environmental anomalies such as Element eruptions, eclipses and meteor showers.<br />\r\n<br />\r\nARK CONCLUSION<br />\r\nReturn to Earth and complete your conquest of the ARK universe, gain sought after answers to advance the storyline, discover the fate of the original explorers, determine the true purpose of the ARK network, and unravel the remaining mysteries of the Homo Deus!</p>\r\n\r\n<p>READ MORE</p>\r\n\r\n<h2>SYSTEM REQUIREMENTS</h2>\r\n\r\n<p>Windows</p>\r\n\r\n<ul>\r\n	<li><strong>MINIMUM:</strong>\r\n\r\n	<ul>\r\n		<li><strong>OS:</strong>&nbsp;Windows 7/8.1/10 (64-bit versions)</li>\r\n		<li><strong>Processor:</strong>&nbsp;Intel Core i5-2400/AMD FX-8320 or better</li>\r\n		<li><strong>Memory:</strong>&nbsp;8 GB RAM</li>\r\n		<li><strong>Graphics:</strong>&nbsp;NVIDIA GTX 670 2GB/AMD Radeon HD 7870 2GB or better</li>\r\n		<li><strong>Storage:</strong>&nbsp;20 GB available space</li>\r\n		<li><strong>Additional Notes:</strong>&nbsp;Requires broadband internet connection for multiplayer</li>\r\n	</ul>\r\n	</li>\r\n</ul>', 8, NULL, '2019-08-23 11:51:05', '2019-08-23 11:51:05', 1, 0, 1, 1, 0),
(10, 58, 'images/1566562259_dlccover7.jpg', 'Age of Wonders: Planetfall Season Pass', '<h2>ABOUT THIS CONTENT</h2>\r\n\r\n<p>Build upon your existing empire with the Age of Wonders: Planetfall Season Pass. The Season Pass includes three upcoming expansions and an instant reward!<br />\r\n<br />\r\nReceive exclusive wallpapers and forum icons when you purchase the Season Pass<br />\r\n<br />\r\n<strong>Expansion 1</strong><br />\r\nNew Secret Tech<br />\r\nNew Campaign Missions<br />\r\nNew Location Mechanics&nbsp;<br />\r\nAnd More!<br />\r\n<br />\r\n<strong>Expansion 2</strong><br />\r\nContent TBC<br />\r\n<br />\r\n<strong>Expansion 3</strong><br />\r\nContent TBC</p>\r\n\r\n<h2>SYSTEM REQUIREMENTS</h2>\r\n\r\n<ul>\r\n	<li><strong>MINIMUM:</strong>\r\n\r\n	<ul>\r\n		<li><strong>OS:</strong>&nbsp;Windows 7 SP1, Windows 8.1 or Windows 10 (64-bit versions)</li>\r\n		<li><strong>Processor:</strong>&nbsp;Intel Core i5 (3rd Generation) or AMD FX Series processor (or equivalents)</li>\r\n		<li><strong>Memory:</strong>&nbsp;6 GB RAM</li>\r\n		<li><strong>Graphics:</strong>&nbsp;nVidia GTX 650Ti 1GB or AMD Radeon HD 7770 (or equivalents)</li>\r\n		<li><strong>Sound Card:</strong>&nbsp;DirectX Compatible Sound Card with latest drivers</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><strong>RECOMMENDED:</strong>\r\n\r\n	<ul>\r\n		<li><strong>OS:</strong>&nbsp;Windows 10 (64-bit)</li>\r\n		<li><strong>Processor:</strong>&nbsp;Intel Core i5 (7th or 8th Generation) or AMD Ryzen 5</li>\r\n		<li><strong>Memory:</strong>&nbsp;8 GB RAM</li>\r\n		<li><strong>Graphics:</strong>&nbsp;nVidia GeForce GTX 1060 3GB or AMD Radeon RX 570 4GB (or equivalents)</li>\r\n		<li><strong>Sound Card:</strong>&nbsp;DirectX Compatible Sound Card with latest drivers</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<p>&copy; 2019 Paradox Interactive AB, AGE OF WONDERS: PLANETFALL, and PARADOX INTERACTIVE are trademarks and/or registered trademarks of Paradox Interactive AB in Europe, the U.S., and other countries. Age of Wonders, the Age of Wonders logo, Triumph Studios and the Triumph Studios logo are trademarks of Triumph Studios B.V.. Copyright (c) 1999-2018 Triumph Studios. All Rights Reserved. Developed by Triumph Studios. All other trademarks, logos, and copyrights are property of their respective owners.</p>', 13, NULL, '2019-08-23 12:10:59', '2019-08-23 12:10:59', 1, 0, 1, 1, 1),
(11, 59, 'images/1566564517_dlccover8.jpg', 'NARUTO STORM 4 : Road to Boruto Expansion', '<h2>ABOUT THIS CONTENT</h2>\r\n\r\n<iframe src=\"https://www.youtube.com/embed/j-F3HxjnOUE\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>\r\n\r\n<p>In a completely New Hidden Leaf Village, enjoy the adventures of Boruto, Naruto&#39;s son!&nbsp;<br />\r\nWhile you do your best to pass the chunnin exam, a new threat menaces the shinobi world.<br />\r\nWill you be powerful enough to defeat it?</p>\r\n\r\n<ul>\r\n	<li>EXPERIENCE the story of BORUTO: NARUTO THE MOVIE!</li>\r\n	<li>DISCOVER Newly playable characters among which Boruto, Sarada and Mitsuki</li>\r\n	<li>TRAIN to master new combination secret jutsu</li>\r\n</ul>\r\n\r\n<p><br />\r\nTHE NEW GENERATION IS UNDERWAY!</p>\r\n\r\n<h2>SYSTEM REQUIREMENTS</h2>\r\n\r\n<ul>\r\n	<li><strong>MINIMUM:</strong>\r\n\r\n	<ul>\r\n		<li><strong>OS:</strong>&nbsp;Windows (64bit) 7 or higher up to date</li>\r\n		<li><strong>Processor:</strong>&nbsp;Intel Core2 Duo, 3.0GHz - AMD Athlon 64 X2 Dual Core 6400+ 3.2GHz</li>\r\n		<li><strong>Memory:</strong>&nbsp;2 GB RAM</li>\r\n		<li><strong>Graphics:</strong>&nbsp;1024 MB video card</li>\r\n		<li><strong>DirectX:</strong>&nbsp;Version 11</li>\r\n		<li><strong>Storage:</strong>&nbsp;40 MB available space</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<p>For EMEA:<br />\r\n&copy; 2002 MASASHI KISHIMOTO / 2007 SHIPPUDEN All Rights Reserved.<br />\r\n&copy; 2002 MASASHI KISHIMOTO/2007 SHIPPUDEN &copy; NMP 2014<br />\r\n&copy; 2002 MASASHI KISHIMOTO/2007 SHIPPUDEN &copy; BMP 2015<br />\r\nGame &copy; 2016 BANDAI NAMCO Entertainment Inc.<br />\r\n<br />\r\nFor the Americas:<br />\r\n&copy; 2002 MASASHI KISHIMOTO/2007 SHIPPUDEN &copy; NMP 2014<br />\r\ngame software &copy;2015 BANDAI NAMCO Entertainment Inc.<br />\r\nNARUTO artwork and elements &copy; 2002 MASASHI KISHIMOTO / 2007 SHIPPUDEN All Rights Reserved.<br />\r\n<br />\r\nFor Asia (except Korea)<br />\r\n&copy;2002 MASASHI KISHIMOTO/2007 SHIPPUDEN All Rights Reserved.<br />\r\n&copy;NMP 2014<br />\r\nLicensed by Mighty Delta Investments Limited.<br />\r\n&copy;BANDAI NAMCO Entertainment Inc.</p>', 19, NULL, '2019-08-23 12:48:37', '2019-08-23 12:48:37', 1, 50, 1, 1, 1),
(12, 59, 'images/1566564916_dlccover9.jpg', 'NARUTO SHIPPUDEN: Ultimate Ninja STORM 4 - Season Pass', '<h2>ABOUT THIS CONTENT</h2>\r\n\r\n<iframe  src=\"https://www.youtube.com/embed/gz78-_sgq8c\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>\r\n\r\n<p>Expand your NARUTO SHIPPUDEN: Ultimate Ninja STORM 4 journey with the Season Pass! Get access to the three NARUTO SHIPPUDEN: Ultimate Ninja STORM 4 add-on packs at a discounted price and receive an exclusive secret combination technique with the release of the first downloadable content.&nbsp;<br />\r\n<br />\r\nIncludes:<br />\r\n- Sub-scenarios to expand your adventure (worth several hours of extra gameplay)&nbsp;<br />\r\n- Combination techniques*<br />\r\n- Costumes<br />\r\n- Ninja Info Cards<br />\r\n- Matching Voice<br />\r\n- Costumes from previous Naruto games<br />\r\n- Extra playable characters<br />\r\n<br />\r\n*One of the Secret Techniques can&rsquo;t be used unless obtaining pre-order bonus content.</p>\r\n\r\n<h2>SYSTEM REQUIREMENTS</h2>\r\n\r\n<ul>\r\n	<li><strong>MINIMUM:</strong>\r\n\r\n	<ul>\r\n		<li><strong>OS:</strong>&nbsp;Windows (64bit) 7 or higher up to date</li>\r\n		<li><strong>Processor:</strong>&nbsp;Intel Core2 Duo, 3.0GHz - AMD Athlon 64 X2 Dual Core 6400+ 3.2GHz</li>\r\n		<li><strong>Memory:</strong>&nbsp;2 GB RAM</li>\r\n		<li><strong>Graphics:</strong>&nbsp;1024 MB video card</li>\r\n		<li><strong>DirectX:</strong>&nbsp;Version 11</li>\r\n		<li><strong>Storage:</strong>&nbsp;40 GB available space</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<p>For EMEA:<br />\r\n&copy; 2002 MASASHI KISHIMOTO / 2007 SHIPPUDEN All rights reserved.<br />\r\n&copy; 2002 MASASHI KISHIMOTO/2007 SHIPPUDEN &copy; NMP 2014<br />\r\n&copy; 2002 MASASHI KISHIMOTO/2007 SHIPPUDEN &copy; BMP 2015<br />\r\nGame &copy; 2016 BANDAI NAMCO Entertainment Inc.<br />\r\n<br />\r\nFor the Americas:<br />\r\n&copy; 2002 MASASHI KISHIMOTO/2007 SHIPPUDEN &copy; NMP 2014<br />\r\ngame software &copy;2015 BANDAI NAMCO Entertainment Inc.<br />\r\nNARUTO artwork and elements &copy; 2002 MASASHI KISHIMOTO / 2007 SHIPPUDEN All Rights Reserved.<br />\r\n<br />\r\nFor Asia (except Korea)<br />\r\n&copy;2002 MASASHI KISHIMOTO/2007 SHIPPUDEN All Rights Reserved.<br />\r\n&copy;NMP 2014<br />\r\nLicensed by Mighty Delta Investments Limited.<br />\r\n&copy;BANDAI NAMCO Entertainment Inc.</p>', 19, NULL, '2019-08-23 12:55:16', '2019-08-23 12:55:16', 1, 50, 1, 1, 1),
(13, 59, 'images/1566565174_dlccover10.jpg', 'NARUTO SHIPPUDEN: Ultimate Ninja STORM 4 - Shikamaru\'s Tale Extra Scenario Pack', '<h2>ABOUT THIS CONTENT</h2>\r\n\r\n<iframe src=\"https://www.youtube.com/embed/jYAVIslC9A8\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>\r\n\r\n<p>&ldquo;Shikamaru&#39;s Tale&quot; Extra Scenario Pack includes:&nbsp;<br />\r\n<br />\r\nScenario &quot;The Fresh Green of the Hidden Leaf&quot; part<br />\r\n<br />\r\n4 Combination secret techniques:&nbsp;<br />\r\n- Naruto (7th Hokage)&times;Boruto<br />\r\n- Kiba&times;Shino&times;Hinata<br />\r\n- Asuma&times;Shikamaru<br />\r\n- Hokages<br />\r\n<br />\r\n1 new costume:&nbsp;<br />\r\n- Naruto (7th Hokage)<br />\r\n<br />\r\nCostumes from previous series:<br />\r\nMatching voice<br />\r\nNinja Info Cards<br />\r\nNinja Treasure<br />\r\n<br />\r\n*One of the Secret Technique can&rsquo;t be used unless obtaining pre-order bonus content : Naruto (7th Hokage)&times;Boruto</p>\r\n\r\n<h2>SYSTEM REQUIREMENTS</h2>\r\n\r\n<ul>\r\n	<li><strong>MINIMUM:</strong>\r\n\r\n	<ul>\r\n		<li><strong>OS:</strong>&nbsp;Windows (64bit) 7 or higher up to date</li>\r\n		<li><strong>Processor:</strong>&nbsp;Intel Core2 Duo, 3.0GHz - AMD Athlon 64 X2 Dual Core 6400+ 3.2GHz</li>\r\n		<li><strong>Memory:</strong>&nbsp;2 GB RAM</li>\r\n		<li><strong>Graphics:</strong>&nbsp;1024 MB video card</li>\r\n		<li><strong>DirectX:</strong>&nbsp;Version 11</li>\r\n		<li><strong>Storage:</strong>&nbsp;40 GB available space</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<p>For EMEA:<br />\r\n&copy; 2002 MASASHI KISHIMOTO / 2007 SHIPPUDEN All rights reserved.<br />\r\n&copy; 2002 MASASHI KISHIMOTO/2007 SHIPPUDEN &copy; NMP 2014<br />\r\n&copy; 2002 MASASHI KISHIMOTO/2007 SHIPPUDEN &copy; BMP 2015<br />\r\nGame &copy; 2016 BANDAI NAMCO Entertainment Inc.<br />\r\n<br />\r\nFor the Americas:<br />\r\n&copy; 2002 MASASHI KISHIMOTO/2007 SHIPPUDEN &copy; NMP 2014<br />\r\ngame software &copy;2015 BANDAI NAMCO Entertainment Inc.<br />\r\nNARUTO artwork and elements &copy; 2002 MASASHI KISHIMOTO / 2007 SHIPPUDEN All Rights Reserved.<br />\r\n<br />\r\nFor Asia (except Korea)<br />\r\n&copy;2002 MASASHI KISHIMOTO/2007 SHIPPUDEN All Rights Reserved.<br />\r\n&copy;NMP 2014<br />\r\nLicensed by Mighty Delta Investments Limited.<br />\r\n&copy;BANDAI NAMCO Entertainment Inc.</p>', 9.5, NULL, '2019-08-23 12:59:34', '2019-08-23 12:59:34', 1, 50, 1, 1, 1),
(14, 59, 'images/1566565520_dlccover11.jpg', 'NARUTO SHIPPUDEN: Ultimate Ninja STORM 4 - Gaara\'s Tale Extra Scenario Pack', '<h2>ABOUT THIS CONTENT</h2>\r\n\r\n<iframe src=\"https://www.youtube.com/embed/xWpdtgL_tOU\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>\r\n\r\n<p>&ldquo;Gaara&#39;s Tale&quot; Extra Scenario Pack includes:&nbsp;<br />\r\n<br />\r\nAdventure Scenario &quot;Bonds of the Sandy Sea&quot;<br />\r\n3 New Linked secret techniques:&nbsp;<br />\r\n- Sasuke(Rinne Sharingan)&times;Itachi<br />\r\n- Lee&times;Neji&times;Tenten<br />\r\n- Lee&times;Guy<br />\r\n1 new costume:<br />\r\n- Sasuke (Wandering Ninja)<br />\r\nCostumes from previous series<br />\r\nMatching voices<br />\r\nNinja Info Cards<br />\r\nNinja Treasure</p>\r\n\r\n<h2>SYSTEM REQUIREMENTS</h2>\r\n\r\n<ul>\r\n	<li><strong>MINIMUM:</strong>\r\n\r\n	<ul>\r\n		<li><strong>OS:</strong>&nbsp;Windows (64bit) 7 or higher up to date</li>\r\n		<li><strong>Processor:</strong>&nbsp;Intel Core2 Duo, 3.0GHz - AMD Athlon 64 X2 Dual Core 6400+ 3.2GHz</li>\r\n		<li><strong>Memory:</strong>&nbsp;2 GB RAM</li>\r\n		<li><strong>Graphics:</strong>&nbsp;1024 MB video card</li>\r\n		<li><strong>DirectX:</strong>&nbsp;Version 11</li>\r\n		<li><strong>Storage:</strong>&nbsp;40 GB available space</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<p>For EMEA:<br />\r\n&copy; 2002 MASASHI KISHIMOTO / 2007 SHIPPUDEN All rights reserved.<br />\r\n&copy; 2002 MASASHI KISHIMOTO/2007 SHIPPUDEN &copy; NMP 2014<br />\r\n&copy; 2002 MASASHI KISHIMOTO/2007 SHIPPUDEN &copy; BMP 2015<br />\r\nGame &copy; 2016 BANDAI NAMCO Entertainment Inc.<br />\r\n<br />\r\nFor the Americas:<br />\r\n&copy; 2002 MASASHI KISHIMOTO/2007 SHIPPUDEN &copy; NMP 2014<br />\r\ngame software &copy;2015 BANDAI NAMCO Entertainment Inc.<br />\r\nNARUTO artwork and elements &copy; 2002 MASASHI KISHIMOTO / 2007 SHIPPUDEN All Rights Reserved.<br />\r\n<br />\r\nFor Asia (except Korea)<br />\r\n&copy;2002 MASASHI KISHIMOTO/2007 SHIPPUDEN All Rights Reserved.<br />\r\n&copy;NMP 2014<br />\r\nLicensed by Mighty Delta Investments Limited.<br />\r\n&copy;BANDAI NAMCO Entertainment Inc.</p>', 9.5, NULL, '2019-08-23 13:05:20', '2019-08-23 13:05:20', 1, 50, 1, 1, 1),
(15, 59, 'images/1566565712_dlccover12.jpg', 'NARUTO SHIPPUDEN: Ultimate Ninja STORM 4 - The Sound Four Characters Pack', '<h2>ABOUT THIS CONTENT</h2>\r\n\r\n<iframe src=\"https://www.youtube.com/embed/9t3qF1PMAo8\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>\r\n\r\n<p>&quot;The Sound Four&quot; Extra Playable Characters Pack includes:&nbsp;<br />\r\n<br />\r\n4 new playable characters:<br />\r\n- Jirobo<br />\r\n- Kidomaru<br />\r\n- Sakon (Ukon)<br />\r\n- Tayuya<br />\r\n3 Combination secret techniques:&nbsp;<br />\r\n- The Seven Ninja Swords Men of the Mist<br />\r\n- The Sound Ninja Four<br />\r\n- Cold Assault of the Demon Blade<br />\r\nCostumes from previous games<br />\r\nMatching voice<br />\r\nNinja Info Card Picture<br />\r\nNinja Treasure<br />\r\nFinish cut-in image</p>\r\n\r\n<h2>SYSTEM REQUIREMENTS</h2>\r\n\r\n<ul>\r\n	<li><strong>MINIMUM:</strong>\r\n\r\n	<ul>\r\n		<li><strong>OS:</strong>&nbsp;Windows (64bit) 7 or higher up to date</li>\r\n		<li><strong>Processor:</strong>&nbsp;Intel Core2 Duo, 3.0GHz - AMD Athlon 64 X2 Dual Core 6400+ 3.2GHz</li>\r\n		<li><strong>Memory:</strong>&nbsp;2 GB RAM</li>\r\n		<li><strong>Graphics:</strong>&nbsp;1024 MB video card</li>\r\n		<li><strong>DirectX:</strong>&nbsp;Version 11</li>\r\n		<li><strong>Storage:</strong>&nbsp;40 GB available space</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<p>For EMEA:<br />\r\n&copy; 2002 MASASHI KISHIMOTO / 2007 SHIPPUDEN All rights reserved.<br />\r\n&copy; 2002 MASASHI KISHIMOTO/2007 SHIPPUDEN &copy; NMP 2014<br />\r\n&copy; 2002 MASASHI KISHIMOTO/2007 SHIPPUDEN &copy; BMP 2015<br />\r\nGame &copy; 2016 BANDAI NAMCO Entertainment Inc.<br />\r\n<br />\r\nFor the Americas:<br />\r\n&copy; 2002 MASASHI KISHIMOTO/2007 SHIPPUDEN &copy; NMP 2014<br />\r\ngame software &copy;2015 BANDAI NAMCO Entertainment Inc.<br />\r\nNARUTO artwork and elements &copy; 2002 MASASHI KISHIMOTO / 2007 SHIPPUDEN All Rights Reserved.<br />\r\n<br />\r\nFor Asia (except Korea)<br />\r\n&copy;2002 MASASHI KISHIMOTO/2007 SHIPPUDEN All Rights Reserved.<br />\r\n&copy;NMP 2014<br />\r\nLicensed by Mighty Delta Investments Limited.<br />\r\n&copy;BANDAI NAMCO Entertainment Inc.</p>', 7.8, NULL, '2019-08-23 13:08:32', '2019-08-23 13:08:32', 1, 50, 1, 1, 1),
(16, 60, 'images/1566570810_dlccover13.jpg', 'Fate/EXTELLA - Rose Vacances', '<h2>ABOUT THIS CONTENT</h2>\r\n\r\n<p>In the digital realm of SE.RA.PH, the Holy Grail War is over, but the land&rsquo;s new ruler faces challenges and threats from all sides. The servants now find themselves drawing up tense and unlikely alliances, preparing for a conflict that may tear SE.RA.PH apart...or destroy it entirely.<br />\r\n<br />\r\nDLC:<br />\r\nRose Vacances</p>\r\n\r\n<h2>SYSTEM REQUIREMENTS</h2>\r\n\r\n<ul style=\"list-style-type:none\">\r\n	<li>MINIMUM:\r\n	<ul style=\"list-style-type:none\">\r\n		<li>OS:&nbsp;Windows 7+</li>\r\n		<li>Processor:&nbsp;Intel Core i5-3570</li>\r\n		<li>Memory:&nbsp;4 GB RAM</li>\r\n		<li>Graphics:&nbsp;NVIDIA GeForce GTX 550 Ti</li>\r\n		<li>DirectX:&nbsp;Version 11</li>\r\n		<li>Storage:&nbsp;5 GB available space</li>\r\n		<li>Sound Card:&nbsp;Compatible with DirectX 11.0</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<ul style=\"list-style-type:none\">\r\n	<li>RECOMMENDED:\r\n	<ul style=\"list-style-type:none\">\r\n		<li>OS:&nbsp;Windows 7+</li>\r\n		<li>Processor:&nbsp;Intel Core i5-6400 @ 3.2 GHz / AMD A8-6500 @ 3.50 GHz</li>\r\n		<li>Memory:&nbsp;8 GB RAM</li>\r\n		<li>Graphics:&nbsp;NVIDIA GeForce GTX 950 / AMD Radeon R7 360</li>\r\n		<li>DirectX:&nbsp;Version 11</li>\r\n		<li>Storage:&nbsp;5 GB available space</li>\r\n		<li>Sound Card:&nbsp;Compatible with DirectX 11.0</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&copy;TYPE-MOON. &copy;2017 Marvelous Inc. Licensed to and published by XSEED Games / Marvelous USA, Inc.<br />\r\nThis software uses fonts produced by FONTWORKS, Inc. FONTWORKS, and font names are trademarks or registered trademarks of FONTWORKS, Inc.<br />\r\n&quot;DUALSHOCK&quot; is a registered trademark of Sony Interactive Entertainment Inc. Library programs for DUALSHOCK&reg;4 &copy; 2016 Sony Interactive Entertainment Inc.</p>', 1.3, NULL, '2019-08-23 14:33:30', '2019-08-23 14:33:30', 1, 0, 1, 0, 1),
(17, 60, 'images/1566571126_dlccover14.jpg', 'Fate/EXTELLA - Vacances d\'été', '<h2>ABOUT THIS CONTENT</h2>\r\n\r\n<p>In the digital realm of SE.RA.PH, the Holy Grail War is over, but the land&rsquo;s new ruler faces challenges and threats from all sides. The servants now find themselves drawing up tense and unlikely alliances, preparing for a conflict that may tear SE.RA.PH apart...or destroy it entirely.<br />\r\n<br />\r\nDLC:<br />\r\nVacances d&#39;&eacute;t&eacute;</p>\r\n\r\n<h2>SYSTEM REQUIREMENTS</h2>\r\n\r\n<ul>\r\n	<li><strong>MINIMUM:</strong>\r\n\r\n	<ul>\r\n		<li><strong>OS:</strong>&nbsp;Windows 7+</li>\r\n		<li><strong>Processor:</strong>&nbsp;Intel Core i5-3570</li>\r\n		<li><strong>Memory:</strong>&nbsp;4 GB RAM</li>\r\n		<li><strong>Graphics:</strong>&nbsp;NVIDIA GeForce GTX 550 Ti</li>\r\n		<li><strong>DirectX:</strong>&nbsp;Version 11</li>\r\n		<li><strong>Storage:</strong>&nbsp;5 GB available space</li>\r\n		<li><strong>Sound Card:</strong>&nbsp;Compatible with DirectX 11.0</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><strong>RECOMMENDED:</strong>\r\n\r\n	<ul>\r\n		<li><strong>OS:</strong>&nbsp;Windows 7+</li>\r\n		<li><strong>Processor:</strong>&nbsp;Intel Core i5-6400 @ 3.2 GHz / AMD A8-6500 @ 3.50 GHz</li>\r\n		<li><strong>Memory:</strong>&nbsp;8 GB RAM</li>\r\n		<li><strong>Graphics:</strong>&nbsp;NVIDIA GeForce GTX 950 / AMD Radeon R7 360</li>\r\n		<li><strong>DirectX:</strong>&nbsp;Version 11</li>\r\n		<li><strong>Storage:</strong>&nbsp;5 GB available space</li>\r\n		<li><strong>Sound Card:</strong>&nbsp;Compatible with DirectX 11.0</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<p>&copy;TYPE-MOON. &copy;2017 Marvelous Inc. Licensed to and published by XSEED Games / Marvelous USA, Inc.<br />\r\nThis software uses fonts produced by FONTWORKS, Inc. FONTWORKS, and font names are trademarks or registered trademarks of FONTWORKS, Inc.<br />\r\n&quot;DUALSHOCK&quot; is a registered trademark of Sony Interactive Entertainment Inc. Library programs for DUALSHOCK&reg;4 &copy; 2016 Sony Interactive Entertainment Inc.</p>', 1.3, NULL, '2019-08-23 14:38:46', '2019-08-23 14:38:46', 1, 0, 1, 0, 1),
(18, 60, 'images/1566571219_dlccover15.jpg', 'Fate/EXTELLA - Casual Vacances', '<h2>ABOUT THIS CONTENT</h2>\r\n\r\n<p>In the digital realm of SE.RA.PH, the Holy Grail War is over, but the land&rsquo;s new ruler faces challenges and threats from all sides. The servants now find themselves drawing up tense and unlikely alliances, preparing for a conflict that may tear SE.RA.PH apart...or destroy it entirely.<br />\r\n<br />\r\nDLC:<br />\r\nCasual Vacances</p>\r\n\r\n<h2>SYSTEM REQUIREMENTS</h2>\r\n\r\n<ul>\r\n	<li><strong>MINIMUM:</strong>\r\n\r\n	<ul>\r\n		<li><strong>OS:</strong>&nbsp;Windows 7+</li>\r\n		<li><strong>Processor:</strong>&nbsp;Intel Core i5-3570</li>\r\n		<li><strong>Memory:</strong>&nbsp;4 GB RAM</li>\r\n		<li><strong>Graphics:</strong>&nbsp;NVIDIA GeForce GTX 550 Ti</li>\r\n		<li><strong>DirectX:</strong>&nbsp;Version 11</li>\r\n		<li><strong>Storage:</strong>&nbsp;5 GB available space</li>\r\n		<li><strong>Sound Card:</strong>&nbsp;Compatible with DirectX 11.0</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><strong>RECOMMENDED:</strong>\r\n\r\n	<ul>\r\n		<li><strong>OS:</strong>&nbsp;Windows 7+</li>\r\n		<li><strong>Processor:</strong>&nbsp;Intel Core i5-6400 @ 3.2 GHz / AMD A8-6500 @ 3.50 GHz</li>\r\n		<li><strong>Memory:</strong>&nbsp;8 GB RAM</li>\r\n		<li><strong>Graphics:</strong>&nbsp;NVIDIA GeForce GTX 950 / AMD Radeon R7 360</li>\r\n		<li><strong>DirectX:</strong>&nbsp;Version 11</li>\r\n		<li><strong>Storage:</strong>&nbsp;5 GB available space</li>\r\n		<li><strong>Sound Card:</strong>&nbsp;Compatible with DirectX 11.0</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<p>&copy;TYPE-MOON. &copy;2017 Marvelous Inc. Licensed to and published by XSEED Games / Marvelous USA, Inc.<br />\r\nThis software uses fonts produced by FONTWORKS, Inc. FONTWORKS, and font names are trademarks or registered trademarks of FONTWORKS, Inc.<br />\r\n&quot;DUALSHOCK&quot; is a registered trademark of Sony Interactive Entertainment Inc. Library programs for DUALSHOCK&reg;4 &copy; 2016 Sony Interactive Entertainment Inc.</p>', 1.3, NULL, '2019-08-23 14:40:19', '2019-08-23 14:40:19', 1, 0, 1, 0, 1),
(19, 60, 'images/1566571302_dlccover16.jpg', 'Fate/EXTELLA - Sable Mage Outfit', '<h2>ABOUT THIS CONTENT</h2>\r\n\r\n<p>In the digital realm of SE.RA.PH, the Holy Grail War is over, but the land&rsquo;s new ruler faces challenges and threats from all sides. The servants now find themselves drawing up tense and unlikely alliances, preparing for a conflict that may tear SE.RA.PH apart...or destroy it entirely.<br />\r\n<br />\r\nDLC:<br />\r\nSable Mage Outfit</p>\r\n\r\n<h2>SYSTEM REQUIREMENTS</h2>\r\n\r\n<ul>\r\n	<li><strong>MINIMUM:</strong>\r\n\r\n	<ul>\r\n		<li><strong>OS:</strong>&nbsp;Windows 7+</li>\r\n		<li><strong>Processor:</strong>&nbsp;Intel Core i5-3570</li>\r\n		<li><strong>Memory:</strong>&nbsp;4 GB RAM</li>\r\n		<li><strong>Graphics:</strong>&nbsp;NVIDIA GeForce GTX 550 Ti</li>\r\n		<li><strong>DirectX:</strong>&nbsp;Version 11</li>\r\n		<li><strong>Storage:</strong>&nbsp;5 GB available space</li>\r\n		<li><strong>Sound Card:</strong>&nbsp;Compatible with DirectX 11.0</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><strong>RECOMMENDED:</strong>\r\n\r\n	<ul>\r\n		<li><strong>OS:</strong>&nbsp;Windows 7+</li>\r\n		<li><strong>Processor:</strong>&nbsp;Intel Core i5-6400 @ 3.2 GHz / AMD A8-6500 @ 3.50 GHz</li>\r\n		<li><strong>Memory:</strong>&nbsp;8 GB RAM</li>\r\n		<li><strong>Graphics:</strong>&nbsp;NVIDIA GeForce GTX 950 / AMD Radeon R7 360</li>\r\n		<li><strong>DirectX:</strong>&nbsp;Version 11</li>\r\n		<li><strong>Storage:</strong>&nbsp;5 GB available space</li>\r\n		<li><strong>Sound Card:</strong>&nbsp;Compatible with DirectX 11.0</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<p>&copy;TYPE-MOON. &copy;2017 Marvelous Inc. Licensed to and published by XSEED Games / Marvelous USA, Inc.<br />\r\nThis software uses fonts produced by FONTWORKS, Inc. FONTWORKS, and font names are trademarks or registered trademarks of FONTWORKS, Inc.<br />\r\n&quot;DUALSHOCK&quot; is a registered trademark of Sony Interactive Entertainment Inc. Library programs for DUALSHOCK&reg;4 &copy; 2016 Sony Interactive Entertainment Inc.</p>', 1.3, NULL, '2019-08-23 14:41:42', '2019-08-23 14:41:42', 1, 0, 1, 1, 1),
(20, 60, 'images/1566571484_dlccover17.jpg', 'Fate/EXTELLA - Mysterious Heroine Outfit', '<h2>ABOUT THIS CONTENT</h2>\r\n\r\n<p>In the digital realm of SE.RA.PH, the Holy Grail War is over, but the land&rsquo;s new ruler faces challenges and threats from all sides. The servants now find themselves drawing up tense and unlikely alliances, preparing for a conflict that may tear SE.RA.PH apart...or destroy it entirely.<br />\r\n<br />\r\nDLC:<br />\r\nMysterious Heroine Outfit</p>\r\n\r\n<h2>SYSTEM REQUIREMENTS</h2>\r\n\r\n<ul>\r\n	<li><strong>MINIMUM:</strong>\r\n\r\n	<ul>\r\n		<li><strong>OS:</strong>&nbsp;Windows 7+</li>\r\n		<li><strong>Processor:</strong>&nbsp;Intel Core i5-3570</li>\r\n		<li><strong>Memory:</strong>&nbsp;4 GB RAM</li>\r\n		<li><strong>Graphics:</strong>&nbsp;NVIDIA GeForce GTX 550 Ti</li>\r\n		<li><strong>Storage:</strong>&nbsp;5 GB available space</li>\r\n		<li><strong>Sound Card:</strong>&nbsp;Compatible with DirectX 11.0</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><strong>RECOMMENDED:</strong>\r\n\r\n	<ul>\r\n		<li><strong>OS:</strong>&nbsp;Windows 7+</li>\r\n		<li><strong>Processor:</strong>&nbsp;Intel Core i5-6400 @ 3.2 GHz / AMD A8-6500 @ 3.50 GHz</li>\r\n		<li><strong>Memory:</strong>&nbsp;8 GB RAM</li>\r\n		<li><strong>Graphics:</strong>&nbsp;NVIDIA GeForce GTX 950 / AMD Radeon R7 360</li>\r\n		<li><strong>DirectX:</strong>&nbsp;Version 11</li>\r\n		<li><strong>Storage:</strong>&nbsp;5 GB available space</li>\r\n		<li><strong>Sound Card:</strong>&nbsp;Compatible with DirectX 11.0</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<p>&copy;TYPE-MOON. &copy;2017 Marvelous Inc. Licensed to and published by XSEED Games / Marvelous USA, Inc.<br />\r\nThis software uses fonts produced by FONTWORKS, Inc. FONTWORKS, and font names are trademarks or registered trademarks of FONTWORKS, Inc.<br />\r\n&quot;DUALSHOCK&quot; is a registered trademark of Sony Interactive Entertainment Inc. Library programs for DUALSHOCK&reg;4 &copy; 2016 Sony Interactive Entertainment Inc.</p>', 1.3, NULL, '2019-08-23 14:44:44', '2019-08-23 14:44:44', 1, 0, 1, 0, 1);
INSERT INTO `dlcs` (`id`, `post_id`, `cover`, `title`, `content`, `price`, `deleted_at`, `created_at`, `updated_at`, `user_id`, `discount`, `windows`, `xbox`, `playstation`) VALUES
(21, 60, 'images/1566571575_dlccover18.jpg', 'Fate/EXTELLA - Resort Vacances', '<h2>ABOUT THIS CONTENT</h2>\r\n\r\n<p>In the digital realm of SE.RA.PH, the Holy Grail War is over, but the land&rsquo;s new ruler faces challenges and threats from all sides. The servants now find themselves drawing up tense and unlikely alliances, preparing for a conflict that may tear SE.RA.PH apart...or destroy it entirely.<br />\r\n<br />\r\nDLC:<br />\r\nResort Vacances</p>\r\n\r\n<h2>SYSTEM REQUIREMENTS</h2>\r\n\r\n<ul>\r\n	<li><strong>MINIMUM:</strong>\r\n\r\n	<ul>\r\n		<li><strong>OS:</strong>&nbsp;Windows 7+</li>\r\n		<li><strong>Processor:</strong>&nbsp;Intel Core i5-3570</li>\r\n		<li><strong>Memory:</strong>&nbsp;4 GB RAM</li>\r\n		<li><strong>Graphics:</strong>&nbsp;NVIDIA GeForce GTX 550 Ti</li>\r\n		<li><strong>DirectX:</strong>&nbsp;Version 11</li>\r\n		<li><strong>Storage:</strong>&nbsp;5 GB available space</li>\r\n		<li><strong>Sound Card:</strong>&nbsp;Compatible with DirectX 11.0</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><strong>RECOMMENDED:</strong>\r\n\r\n	<ul>\r\n		<li><strong>OS:</strong>&nbsp;Windows 7+</li>\r\n		<li><strong>Processor:</strong>&nbsp;Intel Core i5-6400 @ 3.2 GHz / AMD A8-6500 @ 3.50 GHz</li>\r\n		<li><strong>Memory:</strong>&nbsp;8 GB RAM</li>\r\n		<li><strong>Graphics:</strong>&nbsp;NVIDIA GeForce GTX 950 / AMD Radeon R7 360</li>\r\n		<li><strong>DirectX:</strong>&nbsp;Version 11</li>\r\n		<li><strong>Storage:</strong>&nbsp;5 GB available space</li>\r\n		<li><strong>Sound Card:</strong>&nbsp;Compatible with DirectX 11.0</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<p>&copy;TYPE-MOON. &copy;2017 Marvelous Inc. Licensed to and published by XSEED Games / Marvelous USA, Inc.<br />\r\nThis software uses fonts produced by FONTWORKS, Inc. FONTWORKS, and font names are trademarks or registered trademarks of FONTWORKS, Inc.<br />\r\n&quot;DUALSHOCK&quot; is a registered trademark of Sony Interactive Entertainment Inc. Library programs for DUALSHOCK&reg;4 &copy; 2016 Sony Interactive Entertainment Inc.</p>', 1.3, NULL, '2019-08-23 14:46:15', '2019-08-26 12:00:12', 1, 0, 1, 0, 1),
(22, 62, 'images/1566773992_dlcCover1.jpg', 'Age of Empires II (2013): The Forgotten', '<h2>ABOUT THIS CONTENT</h2>\r\n\r\n<iframe src=\"https://www.youtube.com/embed/z-ZBLB8L_xk\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>\r\n\r\n<p>Welcome to Age of Empires II HD: The Forgotten; the first new official expansion for the Age of Empires II universe in over ten years. Challenge friends with five additional civilizations and technologies, battle through seven campaigns, vanquish opponents in new game modes on massive maps, or shoutcast a match and stream it all through twitch.tv.<br />\r\nCrafted exclusively for Age of Empires II: HD Edition; The Forgotten expansion builds upon the Age of Empires II: HD experience and includes Steam workshop support, steam trading cards, and more!<br />\r\n<br />\r\nExplore a host of new features with Age of Empires II HD: The Forgotten including</p>\r\n\r\n<ul>\r\n	<li>Five New Civilizations\r\n	<ul>\r\n		<li>Italians - Set sail to Venice and take the role as general in one of the Italian republics that emerged from the chaos after the collapse of the Roman Empire!</li>\r\n		<li>Indians - Put vast armies under your command, comprised of countless Camels and powerful Elephants.</li>\r\n		<li>Slavs &ndash; Even after the dissolution of the Mongolian Golden Horde, these icy plains of Eastern Europe still echo under the thundering hooves and countless boots of your soldiers.</li>\r\n		<li>Magyars - Lead the mighty Black Army over the Hungarian plains and command the fiercest cavalry forces that Europe has ever witnessed in the Middle Ages.</li>\r\n		<li>Incas - Lead your armies along the shores of Lake Titicaca, defend your wealth and heritage from the invading Conquistadors and erect mighty structures to withstand the test of time.</li>\r\n	</ul>\r\n	</li>\r\n	<li>Seven new Campaigns\r\n	<ul>\r\n		<li>Alaric: The trauma of the Hun invasion in the 4th century has shaped Alaric, the fearsome warrior king of the Goths. But can the beloved king secure a new homeland for his people in the territory of the collapsing Roman Empire?</li>\r\n		<li>Sforza: Always hungry for glory and wealth, Sforza wanders around 15th century Italy, offering his services to the highest bidder. Will he pick the right battles or make the wrong enemy? Take the fate of the young mercenary captain in your hands.</li>\r\n		<li>Bari: 400 years after the collapse of the Roman Empire, Italy is still up for grabs. Relive the tale of the port city Bari from the point of view of a Byzantine family, rising from the common soldiery to the nobility. Beware, for not only Bari is at stake, but also control of Southern Italy.</li>\r\n		<li>Dracula: History forged an incredible legend around the man who ruled Wallachia in the mid-15th century. Holding his ground against the vast armies of the expanding Ottoman Empire, his cruel tactics made him the most feared man in all of Eastern Europe. Shall his thirst for blood and the loyalty of his soldiers hold the Turks back for good?</li>\r\n		<li>El Dorado: Join Francisco Orellana and Gonzalo Pizarro on their quest to find El Dorado, the legendary Lost City of Gold, thought to be hidden somewhere in the vast Amazon rain forest. Will their quest along the Amazon river lead to lifelong prosperity or will they drown in their sorrow?</li>\r\n		<li>Prithviraj: As the 12th century comes to a close, India is divided between the ruling Rajput clans. One of them, the Chauhans, have just been blessed with a new king. His name is Prithviraj and his determination to unite the rival states is unprecedented. But what happens when he falls in love with the daughter of his enemy? And does he have the strength to stop a full-scale Muslim invasion from the west?</li>\r\n		<li>Battles of the Forgotten: Time has faded the names of many of the greatest leaders ever known. During their age they were famed for their fierceness on the battlefield, their just rule and their quest for power. Witness the path to glory of Richard the Lionheart, Minamoto no Yoritomo, Sultan Osman Ghazi, Khosrau and many more.</li>\r\n	</ul>\r\n	</li>\r\n	<li>New LudaKRIS map size</li>\r\n	<li>Twitch.tv streaming integration</li>\r\n	<li>Spectator mode</li>\r\n	<li>New Game Modes\r\n	<ul>\r\n		<li>Treaty - Popularized in later titles, the economically focused &ldquo;Treaty&rdquo; gametype will be available in AoF. Also commonly known as &ldquo;No Rush&rdquo;, Treaty mode enables a limited duration of battle-free early growth before focusing on military might.</li>\r\n		<li>Capture the Relic - For a quick paced, action oriented battle the new &ldquo;Capture the Relic&rdquo; will see players rushing with their monks to take control of a single treasure and return it safely to base.</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<h2>SYSTEM REQUIREMENTS</h2>\r\n\r\n<ul>\r\n	<li><strong>MINIMUM:</strong>\r\n\r\n	<ul>\r\n		<li><strong>OS:</strong>&nbsp;Windows Vista - Windows 8.1+</li>\r\n		<li><strong>Processor:</strong>&nbsp;1.2GHZ CPU</li>\r\n		<li><strong>Memory:</strong>&nbsp;1 GB RAM</li>\r\n		<li><strong>Graphics:</strong>&nbsp;Direct X 9.0c capable GPU</li>\r\n		<li><strong>DirectX:</strong>&nbsp;Version 9.0c</li>\r\n		<li><strong>Storage:</strong>&nbsp;2 GB available space</li>\r\n		<li><strong>Sound Card:</strong>&nbsp;Direct X compatible sound card</li>\r\n		<li><strong>Additional Notes:</strong>&nbsp;Twitch streaming requires Windows vista or newer</li>\r\n	</ul>\r\n	</li>\r\n</ul>', 5.1, NULL, '2019-08-25 22:59:52', '2019-08-25 22:59:52', 1, 0, 1, 0, 0),
(23, 62, 'images/1566775107_dlcCover2.jpg', 'Age of Empires II (2013): The African Kingdoms', '<h2>ABOUT THIS CONTENT</h2>\r\n\r\n<p>Teaser</p>\r\n\r\n<iframe src=\"https://www.youtube.com/embed/BnkV7XTh8lU\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>\r\n\r\n<p>Trailer</p>\r\n\r\n<iframe src=\"https://www.youtube.com/embed/qNjo7GNw3Nc\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>\r\n\r\n<p>Welcome to Age of Empires II HD: The African Kingdoms; the second new official expansion for the Age of Empires II universe in over 16 years. Challenge friends with four additional civilizations, new units, ships and technologies. Fight your way through the African continent with four campaigns and obliterate your opponents with a fresh batch of units under your command!<br />\r\n&nbsp;</p>\r\n\r\n<ul>\r\n	<li>4 New Civilizations\r\n	<ul>\r\n		<li>Berbers &ndash; Unite the tribes of Northern Africa and set sail for Europe. Can you hold your ground against the scrambled kingdoms of Iberia?</li>\r\n		<li>Malians &ndash; Follow in the footsteps of the great Mansa Musa and become the greatest king of Western Africa.</li>\r\n		<li>Ethiopians &ndash; Relive the glory of the once mighty Aksumite empire and rule over the Red Sea.</li>\r\n		<li>Portuguese &ndash; Set sail for the new world, discover new routes to unknown lands and expand your trade routes to the mighty African empires.</li>\r\n	</ul>\r\n	</li>\r\n	<li>4 New, Fully Voiced Campaigns\r\n	<ul>\r\n		<li>Tariq ibn Ziyad: Prepare to lead an army of Berbers and Arabs across the sea to Iberia, to defeat the fearsome Visigoths and bring the banners of war to the powerful Merovingian kingdom.</li>\r\n		<li>Sundjata: Said to possess a magical instrument that guarantees victory, Sumanguru, King of the Sosso, is poised to forge a new empire. Can you help Sundjata, the crippled prince of Mali, defy the odds, defeat Sumanguru, and become the most powerful ruler of West Africa?</li>\r\n		<li>Francisco de Almeida: Daring Portugese explorers have returned from India and given hope of glories and wealth unachievable in the Old World. Can you lead an armada to the East and forge an empire that spans three continents and two oceans?</li>\r\n		<li>Yodit: The beautiful princess Yodit has a promising future at the Aksumite court. But when her jealous nephew accuses her of theft, Yodit is forced to flee her home country. Witness how exile shaped this fallen princess into a mighty queen.</li>\r\n	</ul>\r\n	</li>\r\n	<li>New Generic Units and Technologies\r\n	<ul>\r\n		<li>Arrowslits &ndash; Increase the power of your Towers and Keeps as they hail arrows down upon your foes.</li>\r\n		<li>Arson &ndash; Help your infantry units burn enemy buildings to the ground with this new Castle Age research.</li>\r\n		<li>Fire Galley &ndash; Bring fires to the attack earlier in the game with this new Feudal Age ship.</li>\r\n		<li>Siege Tower &ndash; Hide units inside the tower and help them scale your opponents walls.</li>\r\n	</ul>\r\n	</li>\r\n	<li>Sudden Death Game Mode\r\n	<ul>\r\n		<li>Be prepared to defend your town center in this new game mode. Each player only gets one, and if you lose it, it&rsquo;s game over!</li>\r\n	</ul>\r\n	</li>\r\n	<li>Improved AI</li>\r\n	<li>10 New Special Maps</li>\r\n	<li>8 New Real World Maps</li>\r\n	<li>5 New Random Maps</li>\r\n	<li>10 New terrains</li>\r\n	<li>New Scenario Editor Objects</li>\r\n	<li>Twitch.tv Streaming Integration&nbsp;</li>\r\n	<li>Spectator Mode</li>\r\n</ul>\r\n\r\n<h2>SYSTEM REQUIREMENTS</h2>\r\n\r\n<ul>\r\n	<li><strong>MINIMUM:</strong>\r\n\r\n	<ul>\r\n		<li><strong>OS:</strong>Windows Vista, 7, 8 Pro+</li>\r\n		<li><strong>Processor:</strong>1.2GHZ CPU</li>\r\n		<li><strong>Memory:</strong>1 GB RAM</li>\r\n		<li><strong>Graphics:</strong>Direct X 9.0c Capable GPU</li>\r\n		<li><strong>DirectX&reg;:</strong>9.0c</li>\r\n		<li><strong>Hard Drive:</strong>2 GB HD space</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><strong>RECOMMENDED:</strong>\r\n\r\n	<ul>\r\n		<li><strong>Additional:</strong>900x600 minimum display resolution</li>\r\n	</ul>\r\n	</li>\r\n</ul>', 5.1, NULL, '2019-08-25 23:18:27', '2019-08-25 23:20:21', 1, 0, 1, 0, 0),
(24, 62, 'images/1566775638_dlcCover3.jpg', 'Age of Empires II (2013): Rise of the Rajas', '<h2>ABOUT THIS CONTENT</h2>\r\n\r\n<iframe src=\"https://www.youtube.com/embed/jDT4fEgRjM4\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>\r\n\r\n<p>Welcome to Age of Empires II HD: The Rise of the Rajas; the third new official expansion for the Age of Empires II universe in over 17 years. Challenge friends with four additional civilizations, new units, technologies, and build your empire on both water and land. Guide history&rsquo;s greatest heroes in Southeast Asia through four additional campaigns and conquer your foes with mighty hordes of elephants under your command!<br />\r\n&nbsp;</p>\r\n\r\n<ul>\r\n	<li>4 New Civilizations\r\n	<ul>\r\n		<li>Burmese &ndash; Assemble the largest empire in the history of Southeast Asia through a legion of Battle Elephants that can demolish the most powerful of defenses. The Burmese unique unit is the Arambai, a ranged cavalry unit with a deadly but low accuracy attack.</li>\r\n		<li>Khmer &ndash; Construct the largest religious monument in the world and amass an immortal army of devastating siege weapons. The Khmer unique unit is the Ballista Elephant, a mounted scorpion that can be upgraded to fire two bolts simultaneously.</li>\r\n		<li>Malay &ndash; Conquer Southeast Asia with the vast island empire of Malay and upgrade your docks to harbours which can shoot arrows. The Malay unique unit is the Karambit Warrior, an extremely cheap infantry unit that can quickly overwhelm its foes.</li>\r\n		<li>Vietnamese &ndash; Lead your people to independence and wage guerilla warfare with an extremely powerful arsenal of ranged units. The Vietnamese unique unit is the Rattan Archer, a heavily-armored ranged unit that is effectively impervious to enemy archer attacks.</li>\r\n	</ul>\r\n	</li>\r\n	<li>4 New, Fully Voiced Campaigns\r\n	<ul>\r\n		<li>Gajah Mada: On the island of Java, a new power is rising. Gajah Mada, prime minister of Majapahit, conspires to build an empire to rule the waves and islands of the Archipelago. Will he be able to balance his unquestioned loyalty to the king with his growing ambitions?</li>\r\n		<li>Suryavarman I: It is the early 11th century and the Khmer Empire is in turmoil, torn apart by competing factions and surrounded by hostile neighbors. Only one prince, Suryavarman, has the courage and cunning to defeat his rivals and restore the Khmer to their former glory. Seizing the throne, however, is just the first of many tasks. Will Suryavarman muster the strength to expand his domain, overcome adversity, and create a timeless legacy as the king who attained Nirvana?</li>\r\n		<li>Bayinnaung: A warrior king seeks to unite a divided land. But when he is betrayed, only his devoted servant can continue his legacy. Can a mere commoner ascend the Burmese throne and build the largest empire in Southeast Asian history?</li>\r\n		<li>L&ecirc; Lợi: When a civil war plunged Dai Viet into chaos, the Ming Emperor intervened and seized control. Now, the only hope for freedom from oppression lies with one man: a minor noble named Le Loi. Will he be able to unite feuding factions, defeat the Chinese, and regain Vietnamese independence?</li>\r\n	</ul>\r\n	</li>\r\n	<li>New Generic Units\r\n	<ul>\r\n		<li>Battle Elephant: Created at the stable and available to each of the new civilizations, the Battle Elephant is a slow and powerful cavalry unit that is devastating in melee combat. Each new civilization has its own unique bonuses to set their Elephant regiments apart.</li>\r\n		<li>Imperial Skirmisher: The long-awaited upgrade to the iconic Elite Skirmisher unit, the upgrade is available to the Vietnamese and all of its teammates.</li>\r\n	</ul>\r\n	</li>\r\n	<li>New Environments\r\n	<ul>\r\n		<li>Land meets the sea in The Rise of the Rajas! Alongside massive rainforests, treacherous beaches, the new mangrove forests and shallows provide a whole new playstyle. The new amphibious terrain can be built on and both land units and ships can pass through it. This new terrain type is featured on each of the five new random maps.</li>\r\n	</ul>\r\n	</li>\r\n	<li>Improved AI</li>\r\n	<li>5 New Random Maps</li>\r\n	<li>5 New Special Maps</li>\r\n	<li>5 New Real World Maps</li>\r\n	<li>13 New Terrains</li>\r\n	<li>New Scenario Editor Objects</li>\r\n	<li>Spectator Mode</li>\r\n</ul>\r\n\r\n<h2>SYSTEM REQUIREMENTS</h2>\r\n\r\n<ul>\r\n	<li><strong>MINIMUM:</strong>\r\n\r\n	<ul>\r\n		<li><strong>OS:</strong>Windows Vista, 7, 8 Pro+</li>\r\n		<li><strong>Processor:</strong>1.2GHZ CPU</li>\r\n		<li><strong>Memory:</strong>1 GB RAM</li>\r\n		<li><strong>Graphics:</strong>Direct X 9.0c Capable GPU</li>\r\n		<li><strong>DirectX&reg;:</strong>9.0c</li>\r\n		<li><strong>Hard Drive:</strong>2 GB HD space</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><strong>RECOMMENDED:</strong>\r\n\r\n	<ul>\r\n		<li><strong>Additional:</strong>900x600 minimum display resolution</li>\r\n	</ul>\r\n	</li>\r\n</ul>', 5.1, NULL, '2019-08-25 23:27:18', '2019-08-25 23:27:18', 1, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dlc_users`
--

CREATE TABLE `dlc_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dlc_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `follow_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dlc_users`
--

INSERT INTO `dlc_users` (`id`, `dlc_id`, `user_id`, `created_at`, `updated_at`, `follow_at`) VALUES
(1, 4, 1, '2019-08-18 17:00:00', NULL, '2019-08-18 17:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) DEFAULT NULL,
  `dlc_id` bigint(20) DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `galleries`
--

INSERT INTO `galleries` (`id`, `post_id`, `dlc_id`, `link`, `deleted_at`, `created_at`, `updated_at`) VALUES
(13, 61, NULL, 'images/gallery/1566691831_aoe2de1.jpg', NULL, '2019-08-25 00:10:31', '2019-08-25 00:10:31'),
(14, 61, NULL, 'images/gallery/1566691831_aoe2de2.jpg', NULL, '2019-08-25 00:10:31', '2019-08-25 00:10:31'),
(15, 61, NULL, 'images/gallery/1566691831_aoe2de3.jpg', NULL, '2019-08-25 00:10:31', '2019-08-25 00:10:31'),
(16, 61, NULL, 'images/gallery/1566691831_aoe2de4.jpg', NULL, '2019-08-25 00:10:31', '2019-08-25 00:10:31'),
(17, 61, NULL, 'images/gallery/1566691831_aoe2de5.jpg', NULL, '2019-08-25 00:10:31', '2019-08-25 00:10:31'),
(18, 61, NULL, 'images/gallery/1566691831_aoe2de6.jpg', NULL, '2019-08-25 00:10:31', '2019-08-25 00:10:31'),
(19, 61, NULL, 'images/gallery/1566691831_aoe2de7.jpg', NULL, '2019-08-25 00:10:31', '2019-08-25 00:10:31'),
(20, 61, NULL, 'images/gallery/1566691831_aoe2de8.jpg', NULL, '2019-08-25 00:10:31', '2019-08-25 00:10:31'),
(21, 61, NULL, 'images/gallery/1566691831_aoe2de9.jpg', NULL, '2019-08-25 00:10:31', '2019-08-25 00:10:31'),
(22, 61, NULL, 'images/gallery/1566691831_aoe2de10.jpg', NULL, '2019-08-25 00:10:31', '2019-08-25 00:10:31'),
(23, 62, NULL, 'images/gallery/1566773522_1.jpg', NULL, '2019-08-25 22:52:02', '2019-08-25 22:52:02'),
(24, 62, NULL, 'images/gallery/1566773522_2.jpg', NULL, '2019-08-25 22:52:02', '2019-08-25 22:52:02'),
(25, 62, NULL, 'images/gallery/1566773522_3.jpg', NULL, '2019-08-25 22:52:02', '2019-08-25 22:52:02'),
(26, 62, NULL, 'images/gallery/1566773522_4.jpg', NULL, '2019-08-25 22:52:02', '2019-08-25 22:52:02'),
(27, 62, NULL, 'images/gallery/1566773522_5.jpg', NULL, '2019-08-25 22:52:02', '2019-08-25 22:52:02'),
(28, 62, NULL, 'images/gallery/1566773522_6.jpg', NULL, '2019-08-25 22:52:02', '2019-08-25 22:52:02'),
(29, NULL, 22, 'images/gallery/1566774038_1.jpg', NULL, '2019-08-25 23:00:38', '2019-08-25 23:00:38'),
(30, NULL, 22, 'images/gallery/1566774038_2.jpg', NULL, '2019-08-25 23:00:38', '2019-08-25 23:00:38'),
(31, NULL, 22, 'images/gallery/1566774038_3.jpg', NULL, '2019-08-25 23:00:38', '2019-08-25 23:00:38'),
(32, NULL, 22, 'images/gallery/1566774038_4.jpg', NULL, '2019-08-25 23:00:38', '2019-08-25 23:00:38'),
(33, NULL, 22, 'images/gallery/1566774038_5.jpg', NULL, '2019-08-25 23:00:38', '2019-08-25 23:00:38'),
(34, NULL, 22, 'images/gallery/1566774038_6.jpg', NULL, '2019-08-25 23:00:38', '2019-08-25 23:00:38'),
(35, NULL, 23, 'images/gallery/1566775254_1.jpg', NULL, '2019-08-25 23:20:54', '2019-08-25 23:20:54'),
(36, NULL, 23, 'images/gallery/1566775254_2.jpg', NULL, '2019-08-25 23:20:54', '2019-08-25 23:20:54'),
(37, NULL, 23, 'images/gallery/1566775254_3.jpg', NULL, '2019-08-25 23:20:54', '2019-08-25 23:20:54'),
(38, NULL, 23, 'images/gallery/1566775254_4.jpg', NULL, '2019-08-25 23:20:54', '2019-08-25 23:20:54'),
(39, NULL, 23, 'images/gallery/1566775254_5.jpg', NULL, '2019-08-25 23:20:54', '2019-08-25 23:20:54'),
(40, NULL, 23, 'images/gallery/1566775254_6.jpg', NULL, '2019-08-25 23:20:54', '2019-08-25 23:20:54'),
(41, NULL, 24, 'images/gallery/1566775677_1.jpg', NULL, '2019-08-25 23:27:57', '2019-08-25 23:27:57'),
(42, NULL, 24, 'images/gallery/1566775677_2.jpg', NULL, '2019-08-25 23:27:57', '2019-08-25 23:27:57'),
(43, NULL, 24, 'images/gallery/1566775677_3.jpg', NULL, '2019-08-25 23:27:57', '2019-08-25 23:27:57'),
(44, NULL, 24, 'images/gallery/1566775677_4.jpg', NULL, '2019-08-25 23:27:57', '2019-08-25 23:27:57'),
(45, NULL, 24, 'images/gallery/1566775677_5.jpg', NULL, '2019-08-25 23:27:57', '2019-08-25 23:27:57'),
(46, NULL, 24, 'images/gallery/1566775677_6.jpg', NULL, '2019-08-25 23:27:57', '2019-08-25 23:27:57'),
(47, NULL, 24, 'images/gallery/1566775677_7.jpg', NULL, '2019-08-25 23:27:57', '2019-08-25 23:27:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `total` double NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bAddress1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bAddress2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buy_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `invoices`
--

INSERT INTO `invoices` (`id`, `user_id`, `total`, `city`, `state`, `zip`, `bAddress1`, `bAddress2`, `country_id`, `phone`, `buy_at`, `created_at`, `updated_at`) VALUES
(1, 1, 8.1, 'zzz', 'zzz', '123', 'zzz', 'zzz', '7', '16888888888', '2019-08-26 10:30:13', '2019-08-26 10:30:13', '2019-08-26 10:30:13'),
(2, 1, 8.1, 'zzz', 'zzz', '123', 'zzz', 'zzz', '7', '16888888888', '2019-08-26 10:30:46', '2019-08-26 10:30:46', '2019-08-26 10:30:46'),
(3, 1, 8.1, 'zzz', 'zzz', '123', 'zzz', 'zzz', '7', '16888888888', '2019-08-26 10:31:45', '2019-08-26 10:31:45', '2019-08-26 10:31:45'),
(4, 1, 8.1, 'zzz', 'zzz', '123', 'zzz', 'zzz', '7', '16888888888', '2019-08-26 10:33:23', '2019-08-26 10:33:23', '2019-08-26 10:33:23'),
(5, 1, 8.1, 'zzz', 'zzz', '123', 'zzz', 'zzz', '7', '16888888888', '2019-08-26 10:33:29', '2019-08-26 10:33:29', '2019-08-26 10:33:29'),
(6, 1, 13, 'zzz', 'zzz', '123', 'zzz', 'zzz', '10', '2223455667', '2019-08-26 10:35:08', '2019-08-26 10:35:08', '2019-08-26 10:35:08'),
(7, 1, 13, 'zzz', 'zzz', '123', 'zzz', 'zzz', '10', '2223455667', '2019-08-26 10:35:36', '2019-08-26 10:35:36', '2019-08-26 10:35:36'),
(8, 1, 13, 'zzz', 'zzz', '123', 'zzz', 'zzz', '10', '2223455667', '2019-08-26 10:37:03', '2019-08-26 10:37:03', '2019-08-26 10:37:03'),
(9, 1, 13, 'zzz', 'zzz', '1122', 'zzz', 'zzz', '12', '88888888888888', '2019-08-26 10:41:38', '2019-08-26 10:41:38', '2019-08-26 10:41:38'),
(10, 1, 13, 'zzz', 'zzz', '1122', 'zzz', 'zzz', '12', '88888888888888', '2019-08-26 10:42:17', '2019-08-26 10:42:17', '2019-08-26 10:42:17'),
(11, 1, 13, 'zzz', 'zzz', '1122', 'zzz', 'zzz', '12', '88888888888888', '2019-08-26 10:42:48', '2019-08-26 10:42:48', '2019-08-26 10:42:48'),
(12, 1, 13, 'zzz', 'zzz', '1122', 'zzz', 'zzz', '12', '88888888888888', '2019-08-26 10:45:14', '2019-08-26 10:45:14', '2019-08-26 10:45:14'),
(13, 1, 13, 'zzz', 'zzz', '1122', 'zzz', 'zzz', '12', '88888888888888', '2019-08-26 10:45:32', '2019-08-26 10:45:32', '2019-08-26 10:45:32'),
(14, 1, 18.1, 'zzz', 'zzz', '123', 'zzzz', 'zzz', '10', '4444444444444', '2019-08-26 10:50:25', '2019-08-26 10:50:25', '2019-08-26 10:50:25'),
(15, 1, 5.1, 'sffef', 'fwefewf', '1212', 'wdwfefeff', 'fwefwefwefwef', '232', '1231231312', '2019-08-26 10:53:19', '2019-08-26 10:53:19', '2019-08-26 10:53:19'),
(16, 1, 13.199999999999998, 'fwefwefw', 'fwef', 'fwefw', 'ddwdwd', 'efwefwef', '232', '32222342423', '2019-08-26 11:33:37', '2019-08-26 11:33:37', '2019-08-26 11:33:37'),
(17, 1, 14, 'ưefewfwefwefw', 'ưefwefwf', 'eewwe', 'ưefwefwefwef', 'fưefwefwefwef', '232', '232332324232', '2019-08-26 11:46:58', '2019-08-26 11:46:58', '2019-08-26 11:46:58'),
(18, 1, 1.3, 'ơmfwefwefw', 'fưeffwe', '23323', 'fưefwefwefwefw', 'fưefwefwefwfwe', '232', '32342312121', '2019-08-26 11:53:56', '2019-08-26 11:53:56', '2019-08-26 11:53:56'),
(19, 1, 9.5, 'ưefwfwef', 'fweffwe', '23242', 'fưeefwefwefwef', 'fưefwefwefwef', '1', '1221342321', '2019-08-26 11:55:41', '2019-08-26 11:55:41', '2019-08-26 11:55:41'),
(20, 1, 22.8, 'dwefwfwfwe', 'èwfwefw', '3232233', 'cưeefwfwfwefwe', 'fưefwefwefwef', '232', '1562165215', '2019-08-26 12:10:55', '2019-08-26 12:10:55', '2019-08-26 12:10:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `member_messages`
--

CREATE TABLE `member_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `messages`
--

INSERT INTO `messages` (`id`, `name`, `phone`, `email`, `content`, `created_at`, `updated_at`, `deleted_at`) VALUES
(13, 'Phạm Anh Dũng', '0762941097', 'anhdungpham090@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem facilis sunt repellendus excepturi beatae porro debitis voluptate nulla quo veniam fuga sit molestias minus.', '2019-07-21 05:02:59', '2019-07-21 05:02:59', NULL),
(14, 'Senbonzakura', '0762941097', 'anhdungpham090@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem facilis sunt repellendus excepturi beatae porro debitis voluptate nulla quo veniam fuga sit molestias minus.', '2019-07-21 05:11:53', '2019-07-21 05:11:53', NULL),
(15, 'Senbonzakura', '0762941097', 'anhdungpham090@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem facilis sunt repellendus excepturi beatae porro debitis voluptate nulla quo veniam fuga sit molestias minus.', '2019-07-22 10:27:25', '2019-07-22 10:27:46', '2019-07-22 10:27:46'),
(16, 'Phạm Anh Dũng', '0762941097', 'anhdungpham090@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem facilis sunt repellendus excepturi beatae porro debitis voluptate nulla quo veniam fuga sit molestias minus.', '2019-07-22 10:29:03', '2019-07-22 10:29:03', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_06_24_195515_create_posts_table', 2),
(4, '2019_06_24_200643_create_categories_table', 3),
(5, '2019_06_24_200743_create_tags_table', 3),
(6, '2019_06_24_203459_create_post_categories_table', 4),
(7, '2019_06_24_203515_create_post_tags_table', 4),
(8, '2019_07_07_230035_create_member_messages_table', 5),
(9, '2019_07_07_230641_create_messages_table', 6),
(11, '2019_07_12_201634_create_comments_table', 7),
(12, '2019_08_04_232519_add_google_id_column', 8),
(13, '2019_08_05_184707_add_facebook_id_column', 9),
(14, '2019_08_09_184143_create_post_users_table', 10),
(15, '2019_08_10_154928_create_dlcs_table', 11),
(16, '2019_08_10_162600_create_dlc_users_table', 12),
(17, '2019_08_10_180753_add-collumn-discount', 13),
(18, '2019_08_11_025657_add-user-id-collumn', 14),
(19, '2019_08_11_030003_add-user-id-collumn', 15),
(20, '2019_08_11_220956_make-rating-comment-system', 16),
(21, '2019_08_11_224955_make-rating-comment-system-2', 17),
(22, '2019_08_11_225204_make-rating-comment-system-2', 18),
(23, '2019_08_12_164518_add-rating-collumm', 19),
(24, '2019_08_12_165943_add-discount-collumm', 19),
(25, '2019_08_13_223807_add-dlc-id-collumm', 20),
(26, '2019_08_14_153038_add-compartible-system-collumn', 21),
(34, '2019_08_16_213203_create_countries_table', 22),
(35, '2019_05_03_000001_create_customer_columns', 23),
(36, '2019_05_03_000002_create_subscriptions_table', 23),
(37, '2019_08_19_181032_create_invoices_table', 24),
(38, '2019_08_19_182647_create_product_invoices_table', 25),
(39, '2019_08_19_184638_add-follow-at-collumm', 26),
(40, '2019_08_19_191126_add-collumms-for-user-table', 27),
(42, '2019_08_20_121144_add-collumms-for-user-table', 29),
(43, '2019_08_25_015330_create_galleries_table', 30),
(44, '2019_08_26_074025_add-product-sub-total-and-total-collumm', 31);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `price` double NOT NULL,
  `rating` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `windows` int(11) NOT NULL,
  `xbox` int(11) NOT NULL,
  `playstation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `cover`, `title`, `content`, `created_at`, `updated_at`, `deleted_at`, `price`, `rating`, `discount`, `windows`, `xbox`, `playstation`) VALUES
(57, '2', 'images/1565604663_cover.jpg', 'ARK Survival Evolved', '<h2>ABOUT THIS GAME</h2>\r\n\r\n<p>As a man or woman stranded naked, freezing and starving on the shores of a mysterious island called ARK, you must hunt, harvest resources, craft items, grow crops, research technologies, and build shelters to withstand the elements. Use your cunning and resources to kill or tame &amp; breed the leviathan dinosaurs and other primeval creatures roaming the land, and team up with or prey on hundreds of other players to survive, dominate... and escape!<br />\r\n<br />\r\n<img src=\"https://steamcdn-a.akamaihd.net/steam/apps/346110/extras/TameTrainBreedRide.png?t=1560889311\" /><br />\r\n<br />\r\nDinosaurs, Creatures, &amp; Breeding! -- over 100+ creatures can be tamed using a challenging capture-&amp;-affinity process, involving weakening a feral creature to knock it unconscious, and then nursing it back to health with appropriate food. Once tamed, you can issue commands to your tames, which it may follow depending on how well you&rsquo;ve tamed and trained it. Tames, which can continue to level-up and consume food, can also carry Inventory and Equipment such as Armor, carry prey back to your settlement depending on their strength, and larger tames can be ridden and directly controlled! Fly a Pterodactyl over the snow-capped mountains, lift allies over enemy walls, race through the jungle with a pack of Raptors, tromp through an enemy base along a gigantic brontosaurus, or chase down prey on the back of a raging T-Rex! Take part in a dynamic ecosystem life-cycle with its own predator &amp; prey hierarchies, where you are just one creature among many species struggling for dominance and survival. Tames can also be mated with the opposite gender, to selectively breed successive generations using a trait system based on recombinant genetic inheritance. This process includes both egg-based incubation and mammalian gestation lifecycles! Or put more simply, raise babies!<br />\r\n<br />\r\n<img src=\"https://steamcdn-a.akamaihd.net/steam/apps/346110/extras/FoodWaterTemp.png?t=1560889311\" /><br />\r\n<br />\r\nYou must eat and drink to survive, with different kinds of plants &amp; meat having different nutritional properties, including human meat. Ensuring a supply of fresh water to your home and inventory is a pressing concern. All physical actions come at a cost of food and water, long-distance travel is fraught with subsistence peril! Inventory weight makes you move slower, and the day/night cycle along with randomized weather patterns add another layer of challenge by altering the temperature of the environment, causing you to hunger or thirst more quickly. Build a fire or shelter, and craft a large variety of customizable clothing &amp; armors, to help protect yourself against locational damage &amp; extreme temperatures using the dynamic indoor/outdoor insulation calculation system!<br />\r\n<br />\r\n<img src=\"https://steamcdn-a.akamaihd.net/steam/apps/346110/extras/HarvestBuildPaint.png?t=1560889311\" /><br />\r\n<br />\r\nBy chopping down forests full of trees and mining metal and other precious resources, you can craft the parts to build massive multi-leveled structures composed of complex snap-linked parts, including ramps, beams, pillars, windows, doors, gates, remote gates, trapdoors, water pipes, faucets, generators, wires and all manner of electrical devices, and ladders among many other types. Structures have a load system to fall apart if enough support has been destroyed, so reinforcing your buildings is important. All structures and items can be painted to customize the look of your home, as well as placing dynamically per-pixel paintable signs, textual billboards, and other decorative objects. Shelter reduces the extremes of weather and provides security for yourself and your stash! Weapons, clothing &amp; armor gear can also be painted to express your own visual style.<br />\r\n<br />\r\n<img src=\"https://steamcdn-a.akamaihd.net/steam/apps/346110/extras/PlantFarmGrow.png?t=1560889311\" /><br />\r\n<br />\r\nPick seeds from the wild vegetation around you, plant them in plots that you lay down, water them and nurture them with fertilizer (everything poops after consuming calories, which can then be composted, and some fertilizer is better than others). Tend to your crops and they will grow to produce delicious and rare fruits, which can also be used to cook a plethora of logical recipes and make useful tonics! Explore to find the rarest of plant seeds that have the most powerful properties! Vegetarians &amp; vegans can flourish, and it will be possible to master and conquer the ARK in a non-violent manner!<br />\r\n<br />\r\n<img src=\"https://steamcdn-a.akamaihd.net/steam/apps/346110/extras/Summon.png?t=1560889311\" /><br />\r\n<br />\r\nBy bringing sufficient rare sacrificial items to special Summon locations, you can capture the attention of the one of the ARK&rsquo;s god-like mythical creatures, who will arrive for battle. These gargantuan monstrosities provide an end-game goal for the most experienced groups of players and their armies of tames, and will yield extremely valuable progression items if they are defeated.<br />\r\n<br />\r\n<img src=\"https://steamcdn-a.akamaihd.net/steam/apps/346110/extras/Tribes.png?t=1560889311\" /><br />\r\n<br />\r\nCreate a Tribe and add your friends to it, and all your tames can be commanded by and allied to anyone in your Tribe. Your Tribe will also be able to respawn at any of your home spawn points. Promote members to Tribe Admins to reduce the burden of management. Distribute key items and pass-codes to provide access your shared village!<br />\r\n<br />\r\n<img src=\"https://steamcdn-a.akamaihd.net/steam/apps/346110/extras/RPG.png?t=1560889311\" /><br />\r\n<br />\r\nAll items are crafted from Blueprints that have variable statistics and qualities, and require corresponding resources. More remote and harsh locales across the ARK tend to have better resources, including the tallest mountains, darkest caves, and depths of the ocean! Level-Up your player character by gaining experience through performance actions, Level-Up your tames, and learn new &quot;Engrams&quot; to be able to craft Items from memory without the use of blueprints, even if you die! Customize the underlying physical look of your character with hair, eye, and skin tones, along with an array of body proportion modifiers. As you explore the vast ARK, you&#39;ll find clues left by other Survivors who have made the ARK their home in ages past, in the form of collectible detailed 3D &quot;Explorer Notes&quot;. By uncovering all of these, you can begin to piece together the true nature of the ARK, and discover its purpose!<br />\r\n<br />\r\n<img src=\"https://steamcdn-a.akamaihd.net/steam/apps/346110/extras/HardcoreMechanics.png?t=1560889311\" /><br />\r\n<br />\r\nEverything you craft has durability and will wear-out from extended use if not repaired, and when you leave the game, your character remains sleeping in the persistent world. Your inventory physically exists in boxes or on your character in the world. Everything can be looted &amp; stolen, so to achieve security you must build-up, team-up, or have tames to guard your stash. Death is permanent, and you can even knock out, capture, and force-feed other players to use them for your own purposes, such as extracting their blood to for transfusions, harvesting their fecal matter to use as fertilizer, or using them as food for your carnivorous tames!<br />\r\n<br />\r\n<img src=\"https://steamcdn-a.akamaihd.net/steam/apps/346110/extras/ExploreAndDiscover.png?t=1560889311\" /><br />\r\n<br />\r\nThe mysterious ARK is a formidable and imposing environment, composed of many natural and unnatural structures, above-ground, below-ground, and underwater. By fully exploring its secrets, you&rsquo;ll find the most exotic procedurally randomized creatures and rare blueprints. Also to be found are Explorer Notes that are dynamically updated into the game, written by previous human denizens of the ARK from across the millennia, creatively detailing the creatures and backstory of the ARK and its creatures. Fully develop your in-game ARK-map through exploration, write custom points of interest onto it, and craft a Compass or GPS coordinates to aid exploring with other players, whom you can communicate with via proximity text &amp; voice chat, or long-distance radio. Construct &amp; draw in-game signs for other players to help them or lead them astray... And yet.. how do you ultimately challenge the Creators and Conquer the ARK? A definitive end-game is planned.<br />\r\n<br />\r\n<img src=\"https://steamcdn-a.akamaihd.net/steam/apps/346110/extras/LargeWorld.png?t=1560889311\" /><br />\r\n<br />\r\nOn the 100+ player servers, your character, everything you built, and your tames, stay in-game even when you leave. You can even physically travel your character and items between the network of ARK&#39;s by accessing the Obelisks and uploading (or downloading) your data from the Steam Economy! A galaxy of ARKs, each slightly different than the previous, to leave your mark on and conquer, one at a time -- special official ARKs will be unveiled on the World-map for limited times in singular themed events with corresponding limited-run items! Furthermore, you can now design or randomize your own unique &#39;Procedurally Generated ARKs&#39;, for infinite replayability and endless surprises.<br />\r\n<br />\r\n<img src=\"https://steamcdn-a.akamaihd.net/steam/apps/346110/extras/RobustSteamWorkshop.png?t=1560889311\" /><br />\r\n<br />\r\nYou can play single-player local games, and bring your character and items between unofficial player-hosted servers, back and forth from singleplayer to multiplayer. Mod the game, with full Steam Workshop support and customized Unreal Engine 4 editor. See how we built our ARK using our maps and assets as an example. Host your own server and configure your ARK precisely to your liking. We want to see what you create!<br />\r\n<br />\r\n<img src=\"https://steamcdn-a.akamaihd.net/steam/apps/346110/extras/HighEndNextGenVisuals.png?t=1560889311\" /><br />\r\n<br />\r\nThe over-the-top hyper real imagery of the ARK its creatures is brought to expressive life using a highly-customized Unreal Engine 4, with fully dynamic lighting &amp; global illumination, weather systems (rain, fog, snow, etc) &amp; true-to-life volumetric cloud simulation, and the latest in advanced DirectX11 and DirectX12 rendering techniques. Music by award-winning composer of &quot;Ori and the Blind Forest&quot;, Gareth Coker!</p>\r\n\r\n<h2>System Requirements</h2>\r\n\r\n<p>Windows</p>\r\n\r\n<p>Mac OS X</p>\r\n\r\n<p>SteamOS + Linux</p>\r\n\r\n<p><strong>Minimum:</strong></p>\r\n\r\n<ul>\r\n	<li>\r\n	<ul style=\"list-style-type:circle\">\r\n		<li><strong>OS:</strong> Windows 7/8.1/10 (64-bit versions)</li>\r\n		<li><strong>Processor:</strong> Intel Core i5-2400/AMD FX-8320 or better</li>\r\n		<li><strong>Memory:</strong> 8 GB RAM</li>\r\n		<li><strong>Graphics:</strong> NVIDIA GTX 670 2GB/AMD Radeon HD 7870 2GB or better</li>\r\n		<li><strong>DirectX:</strong> Version 10</li>\r\n		<li><strong>Storage:</strong> 60 GB available space</li>\r\n		<li><strong>Additional Notes:</strong> Requires broadband internet connection for multiplayer</li>\r\n	</ul>\r\n	</li>\r\n</ul>', '2019-08-12 10:11:03', '2019-08-23 11:37:00', NULL, 16.8, NULL, 5, 1, 1, 0),
(58, '2', 'images/1565604824_cover2.jpg', 'Age of Wonderers: Planetfall', '<h2>ABOUT THIS GAME</h2>\r\n\r\n<p><img src=\"https://steamcdn-a.akamaihd.net/steam/apps/718850/extras/mural.png?t=1565165969\" /><br />\r\nEmerge from the cosmic dark age of a fallen galactic empire to build a new future for your people.&nbsp;<em>Age of Wonders: Planetfall</em>&nbsp;is the new strategy game from Triumph Studios, creators of the critically acclaimed&nbsp;<em>Age of Wonders</em>&nbsp;series, bringing all the exciting tactical turn-based combat and in-depth empire building of its predecessors to space in an all-new, sci-fi setting.<br />\r\n<br />\r\nBuild your empire with one of six unique factions, ranging from the militant Vanguard to the dinosaur-riding Amazons and the cyborg-zombies of the Assembly. Progress through each faction&rsquo;s missions using your wits, military strength and diplomacy, exploring planetary ruins and encountering other survivors as you unravel the history of a shattered civilization. Fight, build, negotiate and technologically advance your way to utopia in a deep single player campaign, on random skirmish maps, and against friends in multiplayer.<br />\r\n<br />\r\n<img src=\"https://steamcdn-a.akamaihd.net/steam/apps/718850/extras/skull.png?t=1565165969\" /></p>\r\n\r\n<h2>Tactical Turn-Based Sci-Fi Combat</h2>\r\n\r\n<p>Perfect your combat strategy in intense turn-based battles featuring a large cast of factions, customizable units, and destructible environments.</p>\r\n\r\n<h2>Discover a Rich Science-Fiction World</h2>\r\n\r\n<p>What secrets will unfold when you uncover the history of the fallen galactic empire? Discover the fate of the Star Union by exploring lush landscapes, wild wastelands and overgrown megacities. Encounter rival factions and discover hidden technologies long forgotten in abandoned places.</p>\r\n\r\n<h2>Planetary Empire Building</h2>\r\n\r\n<p>Steer the future of your colony with a mix of technological advances and social development. Will you create an environmental paradise or a perfect military order?</p>\r\n\r\n<h2>Multiple Paths to Victory</h2>\r\n\r\n<p>Achieve your end goals through conquest, diplomacy or doomsday technologies.</p>\r\n\r\n<h2>A Multitude of Game Modes</h2>\r\n\r\n<p>A deep single-player story campaign alongside random map generation makes for endless replayability. Try new play styles in skirmish mode, and play multiplayer your way - online, hotseat, and asynchronous!<br />\r\n<br />\r\n<img src=\"https://steamcdn-a.akamaihd.net/steam/apps/718850/extras/in-game.png?t=1565165969\" /><br />\r\n<br />\r\n<em>*Modding Tools are provided as a courtesy to fans. They might have different system specifications from the Age of Wonders: Planetfall game, are not tech supported and have an English only interface.</em></p>\r\n\r\n<h2>SYSTEM REQUIREMENTS</h2>\r\n\r\n<ul>\r\n	<li><strong>MINIMUM:</strong>\r\n\r\n	<ul>\r\n		<li>Requires a 64-bit processor and operating system</li>\r\n		<li><strong>OS:</strong>&nbsp;Windows 7 SP1, Windows 8.1 or Windows 10 (64-bit versions)</li>\r\n		<li><strong>Processor:</strong>&nbsp;Intel Core i5 (3rd Generation) or AMD FX Series processor (or equivalents)</li>\r\n		<li><strong>Memory:</strong>&nbsp;6 GB RAM</li>\r\n		<li><strong>Graphics:</strong>&nbsp;nVidia GTX 650Ti 1GB or AMD Radeon HD 7770 (or equivalents)</li>\r\n		<li><strong>DirectX:</strong>&nbsp;Version 11</li>\r\n		<li><strong>Network:</strong>&nbsp;Broadband Internet connection</li>\r\n		<li><strong>Storage:</strong>&nbsp;20 GB available space</li>\r\n		<li><strong>Sound Card:</strong>&nbsp;DirectX Compatible Sound Card with latest drivers</li>\r\n		<li><strong>Additional Notes:</strong>&nbsp;Network connection required for cloud saves and multiplayer.</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><strong>RECOMMENDED:</strong>\r\n\r\n	<ul>\r\n		<li>Requires a 64-bit processor and operating system</li>\r\n		<li><strong>OS:</strong>&nbsp;Windows 10 (64-bit)</li>\r\n		<li><strong>Processor:</strong>&nbsp;Intel Core i5 (7th or 8th Generation) or AMD Ryzen 5</li>\r\n		<li><strong>Memory:</strong>&nbsp;8 GB RAM</li>\r\n		<li><strong>Graphics:</strong>&nbsp;nVidia GeForce GTX 1060 3GB or AMD Radeon RX 570 4GB (or equivalents)</li>\r\n		<li><strong>DirectX:</strong>&nbsp;Version 11</li>\r\n		<li><strong>Network:</strong>&nbsp;Broadband Internet connection</li>\r\n		<li><strong>Storage:</strong>&nbsp;20 GB available space</li>\r\n		<li><strong>Sound Card:</strong>&nbsp;DirectX Compatible Sound Card with latest drivers</li>\r\n		<li><strong>Additional Notes:</strong>&nbsp;Network connection required for cloud saves and multiplayer.</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<p>&copy; 2018 Paradox Interactive AB, AGE OF WONDERS: PLANETFALL, and PARADOX INTERACTIVE are trademarks and/or registered trademarks of Paradox Interactive AB in Europe, the U.S., and other countries. Age of Wonders, the Age of Wonders logo, Triumph Studios and the Triumph Studios logo are trademarks of Triumph Studios B.V.. Copyright (c) 1999-2018 Triumph Studios. All Rights Reserved. Developed by Triumph Studios. All other trademarks, logos, and copyrights are property of their respective owners.</p>', '2019-08-12 10:13:44', '2019-08-23 12:08:59', NULL, 17, NULL, 5, 1, 1, 1),
(59, '1', 'images/1566563198_cover3.jpg', 'NARUTO SHIPPUDEN: Ultimate Ninja STORM 4', '<h2>ABOUT THIS GAME</h2>\r\n\r\n<iframe src=\"https://www.youtube.com/embed/uyUNEL1CsC4\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>\r\n\r\n<p>The latest opus in the acclaimed STORM series is taking you on a colourful and breathtaking ride. Take advantage of the totally revamped battle system and prepare to dive into the most epic fights you&rsquo;ve ever seen in the NARUTO SHIPPUDEN: Ultimate Ninja STORM series!<br />\r\n<br />\r\nPrepare for the most awaited STORM game ever created!</p>\r\n\r\n<h2>SYSTEM REQUIREMENTS</h2>\r\n\r\n<ul>\r\n	<li><strong>MINIMUM:</strong>\r\n\r\n	<ul>\r\n		<li><strong>OS:</strong>&nbsp;Windows (64bit) 7 or higher up to date</li>\r\n		<li><strong>Processor:</strong>&nbsp;Intel Core2 Duo, 3.0GHz - AMD Athlon 64 X2 Dual Core 6400+ 3.2GHz</li>\r\n		<li><strong>Memory:</strong>&nbsp;2 GB RAM</li>\r\n		<li><strong>Graphics:</strong>&nbsp;1024 MB video card</li>\r\n		<li><strong>DirectX:</strong>&nbsp;Version 11</li>\r\n		<li><strong>Storage:</strong>&nbsp;40 GB available space</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<p>For EMEA:<br />\r\n&copy; 2002 MASASHI KISHIMOTO / 2007 SHIPPUDEN All rights reserved.<br />\r\n&copy; 2002 MASASHI KISHIMOTO/2007 SHIPPUDEN &copy; NMP 2014<br />\r\n&copy; 2002 MASASHI KISHIMOTO/2007 SHIPPUDEN &copy; BMP 2015<br />\r\nGame &copy; 2016 BANDAI NAMCO Entertainment Inc.<br />\r\n<br />\r\nFor the Americas:<br />\r\n&copy; 2002 MASASHI KISHIMOTO/2007 SHIPPUDEN &copy; NMP 2014<br />\r\ngame software &copy;2015 BANDAI NAMCO Entertainment Inc.<br />\r\nNARUTO artwork and elements &copy; 2002 MASASHI KISHIMOTO / 2007 SHIPPUDEN All Rights Reserved.<br />\r\n<br />\r\nFor Asia (except Korea)<br />\r\n&copy;2002 MASASHI KISHIMOTO/2007 SHIPPUDEN All Rights Reserved.<br />\r\n&copy;NMP 2014<br />\r\nLicensed by Mighty Delta Investments Limited.<br />\r\n&copy;BANDAI NAMCO Entertainment Inc.</p>', '2019-08-23 12:26:38', '2019-08-23 12:26:38', NULL, 28, NULL, 50, 1, 1, 1),
(60, '1', 'images/1566567325_cover4.jpg', 'Fate/EXTELLA: The Umbral Star', '<h2>ABOUT THIS GAME</h2>\r\n\r\n<iframe src=\"https://www.youtube.com/embed/KE_9M-ZLSqk\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>\r\n\r\n<p>EXTELLA &mdash; A new world unlike any ever seen.<br />\r\n<br />\r\nAcross the virtual realm of SE.RA.PH, Masters of digital magic commanded their Servants, great heroes and villains of history and lore, to fight in the Holy Grail War. The prize was the &quot;Holy Grail&quot; itself &mdash; aka the Moon Cell Automaton, a lunar supercomputer with the power to grant any wish.<br />\r\n<br />\r\nThough the war has ended, with the Servant Nero and her Master on top, all is not well. Not only is Nero&#39;s rival Servant already leading an uprising, but a new challenger waits in the dark, ready to tear through reality itself to strike at her heart.&nbsp;<br />\r\n<br />\r\nNero prepares to defend her new throne. Beside her stand her Master and a few loyal allies. Ahead lies not only an ocean of enemies, but an ancient secret far more terrible than any war&hellip;</p>\r\n\r\n<h2><strong>Fate Heads for a New Stage!</strong></h2>\r\n\r\n<p><br />\r\nThe famous Fate EXTRA series strikes a path to a new stage with Fate/EXTELLA: The Umbral Star. Many of the fan favorite characters including the ancient Heroic Spirits (Servants) summoned by the Holy Grail, will make their appearances. This game has been reborn as a high-speed action battle where you go against the enemy and their army. You can also take the time to enjoy the deep story of the Fate series.</p>\r\n\r\n<h2>KEY FEATURES</h2>\r\n\r\n<ul style=\"list-style-type:square\">\r\n	<li><strong><em>A Variety of Fate Universes Collide</em></strong><br />\r\n	Not just Fate/EXTRA Servants, but characters from Fate/stay night, Fate/Apocrypha, Fate/Grand Order, Fate Zero and other Fate series will make appearances. You can enjoy the game in Japanese audio with English subtitles. Chinese, Korean, and Japanese text is also available.&nbsp;</li>\r\n	<li><strong><em>A Brand-New Story from the Series&rsquo; Author, Kinoko Nasu</em></strong><br />\r\n	As the original creator of Fate/stay night and the scenario writer of Fate/EXTRA, Kinoko Nasu has created a completely new scenario for Fate/EXTELLA. The universe and characters of Fate will evolve.</li>\r\n	<li><strong><em>A Large Story Told from Different Perspectives</em></strong><br />\r\n	In Fate/EXTELLA, the story will be told from the independent perspectives of three heroine Servants. Various side stories are also included, creating a structure that will shed light on the main story.</li>\r\n	<li><strong><em>A New Way to Battle</em></strong><br />\r\n	As the first action game in the Fate series, players will finally be able to control a Servant and perform various moves, including a powerful form change ability to transform Servants. Engage in intense battles on the ground or in mid-air to annihilate the enemy forces!</li>\r\n</ul>\r\n\r\n<h2>SYSTEM REQUIREMENTS</h2>\r\n\r\n<ul style=\"list-style-type:none\">\r\n	<li>MINIMUM:\r\n	<ul style=\"list-style-type:none\">\r\n		<li>OS:&nbsp;Windows 7+</li>\r\n		<li>Processor:&nbsp;Intel Core i5-3570</li>\r\n		<li>Memory:&nbsp;4 GB RAM</li>\r\n		<li>Graphics:&nbsp;NVIDIA GeForce GTX 550 Ti</li>\r\n		<li>DirectX:&nbsp;Version 11</li>\r\n		<li>Storage:&nbsp;5 GB available space</li>\r\n		<li>Sound Card:&nbsp;Compatible with DirectX 11.0</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<ul style=\"list-style-type:none\">\r\n	<li>RECOMMENDED:\r\n	<ul style=\"list-style-type:none\">\r\n		<li>OS:&nbsp;Windows 7+</li>\r\n		<li>Processor:&nbsp;Intel Core i5-6400 @ 3.2 GHz / AMD A8-6500 @ 3.50 GHz</li>\r\n		<li>Memory:&nbsp;8 GB RAM</li>\r\n		<li>Graphics:&nbsp;NVIDIA GeForce GTX 950 / AMD Radeon R7 360</li>\r\n		<li>DirectX:&nbsp;Version 11</li>\r\n		<li>Storage:&nbsp;5 GB available space</li>\r\n		<li>Sound Card:&nbsp;Compatible with DirectX 11.0</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&copy;TYPE-MOON. &copy;2017 Marvelous Inc. Licensed to and published by XSEED Games / Marvelous USA, Inc.<br />\r\nThis software uses fonts produced by FONTWORKS, Inc. FONTWORKS, and font names are trademarks or registered trademarks of FONTWORKS, Inc.<br />\r\n&quot;DUALSHOCK&quot; is a registered trademark of Sony Interactive Entertainment Inc. Library programs for DUALSHOCK&reg;4 &copy; 2016 Sony Interactive Entertainment Inc.</p>', '2019-08-23 13:35:25', '2019-08-23 18:38:04', NULL, 13.3, NULL, 0, 1, 0, 1),
(61, '1', 'images/1566667090_cover5.jpg', 'Age of Empires II: Definitive Edition', '<h2>ABOUT THIS GAME</h2>\r\n\r\n<p>Trailer:</p>\r\n\r\n<iframe src=\"https://www.youtube.com/embed/ZOgBVR21pWg\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>\r\n\r\n<p>Promo:</p>\r\n\r\n<iframe src=\"https://www.youtube.com/embed/pk1sVpI32Yo\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>\r\n\r\n<p>Age of Empires II: Definitive Edition celebrates the 20th anniversary of one of the most popular strategy games ever with stunning 4K Ultra HD graphics, a new and fully remastered soundtrack, and brand-new content, &ldquo;The Last Khans&rdquo; with 3 new campaigns and 4 new civilizations.<br />\r\n<br />\r\nExplore all the original campaigns like never before as well as the best-selling expansions, spanning over 200 hours of gameplay and 1,000 years of human history. Head online to challenge other players with 35 different civilizations in your quest for world domination throughout the ages.<br />\r\n<br />\r\nChoose your path to greatness with this definitive remaster to one of the most beloved strategy games of all time.</p>\r\n\r\n<h2>SYSTEM REQUIREMENTS</h2>\r\n\r\n<ul>\r\n	<li><strong>MINIMUM:</strong>\r\n\r\n	<ul>\r\n		<li>Requires a 64-bit processor and operating system</li>\r\n		<li><strong>OS:</strong>&nbsp;Windows 10 64bit</li>\r\n		<li><strong>Processor:</strong>&nbsp;Intel Core 2 Duo or AMD Athlon 64x2 5600+</li>\r\n		<li><strong>Memory:</strong>&nbsp;4 GB RAM</li>\r\n		<li><strong>Graphics:</strong>&nbsp;NVIDIA&reg; GeForce&reg; GT 420 or ATI&trade; Radeon&trade; HD 6850 or Intel&reg; HD Graphics 3000 or better</li>\r\n		<li><strong>DirectX:</strong>&nbsp;Version 11</li>\r\n		<li><strong>Network:</strong>&nbsp;Broadband Internet connection</li>\r\n		<li><strong>Storage:</strong>&nbsp;30 GB available space</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><strong>RECOMMENDED:</strong>\r\n\r\n	<ul>\r\n		<li>Requires a 64-bit processor and operating system</li>\r\n		<li><strong>OS:</strong>&nbsp;Windows 10 64bit</li>\r\n		<li><strong>Processor:</strong>&nbsp;2.4 Ghz i5 or greater or AMD equivalent</li>\r\n		<li><strong>Memory:</strong>&nbsp;8 GB RAM</li>\r\n		<li><strong>Graphics:</strong>&nbsp;Nvidia&reg; GTX 650 or AMD HD 5850 or better</li>\r\n		<li><strong>DirectX:</strong>&nbsp;Version 11</li>\r\n		<li><strong>Network:</strong>&nbsp;Broadband Internet connection</li>\r\n		<li><strong>Storage:</strong>&nbsp;30 GB available space</li>\r\n	</ul>\r\n	</li>\r\n</ul>', '2019-08-24 17:18:10', '2019-08-24 17:27:08', NULL, 13, NULL, 0, 1, 0, 0),
(62, '1', 'images/1566773383_cover6.png', 'Age of Empires II (2013)', '<h2>ABOUT THIS GAME</h2>\r\n\r\n<iframe src=\"https://www.youtube.com/embed/FR9QdIAc2Fo\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>\r\n\r\n<p>In Age of Empires II: HD Edition, fans of the original game and new players alike will fall in love with the classic Age of Empires II experience. Explore all the original single player campaigns from both Age of Kings and The Conquerors expansion, choose from 18 civilizations spanning over a thousand years of history, and head online to challenge other Steam players in your quest for world domination throughout the ages. Originally developed by Ensemble Studios and re-imagined in high definition by Hidden Path Entertainment, Skybox Labs, and Forgotten Empires, Microsoft Studios is proud to bring Age of Empires II: HD Edition to Steam!</p>\r\n\r\n<h2>SYSTEM REQUIREMENTS</h2>\r\n\r\n<ul>\r\n	<li><strong>MINIMUM:</strong>\r\n\r\n	<ul>\r\n		<li><strong>OS:</strong>Windows Vista, 7, 8 Pro+</li>\r\n		<li><strong>Processor:</strong>1.2GHZ CPU</li>\r\n		<li><strong>Memory:</strong>1 GB RAM</li>\r\n		<li><strong>Graphics:</strong>Direct X 9.0c Capable GPU</li>\r\n		<li><strong>DirectX&reg;:</strong>9.0c</li>\r\n		<li><strong>Hard Drive:</strong>2 GB HD space</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><strong>RECOMMENDED:</strong>\r\n\r\n	<ul>\r\n		<li><strong>Additional:</strong>900x600 minimum display resolution</li>\r\n	</ul>\r\n	</li>\r\n</ul>', '2019-08-25 22:49:43', '2019-08-25 22:49:43', NULL, 8.1, NULL, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_categories`
--

CREATE TABLE `post_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `post_categories`
--

INSERT INTO `post_categories` (`id`, `post_id`, `category_id`, `created_at`, `updated_at`) VALUES
(180, 57, 1, '2019-08-23 11:37:00', '2019-08-23 11:37:00'),
(181, 57, 2, '2019-08-23 11:37:00', '2019-08-23 11:37:00'),
(182, 57, 3, '2019-08-23 11:37:00', '2019-08-23 11:37:00'),
(183, 57, 4, '2019-08-23 11:37:00', '2019-08-23 11:37:00'),
(184, 57, 5, '2019-08-23 11:37:00', '2019-08-23 11:37:00'),
(185, 57, 35, '2019-08-23 11:37:00', '2019-08-23 11:37:00'),
(186, 57, 36, '2019-08-23 11:37:00', '2019-08-23 11:37:00'),
(196, 58, 3, '2019-08-23 12:08:59', '2019-08-23 12:08:59'),
(197, 58, 4, '2019-08-23 12:08:59', '2019-08-23 12:08:59'),
(198, 58, 5, '2019-08-23 12:08:59', '2019-08-23 12:08:59'),
(199, 58, 35, '2019-08-23 12:08:59', '2019-08-23 12:08:59'),
(200, 58, 37, '2019-08-23 12:08:59', '2019-08-23 12:08:59'),
(201, 58, 38, '2019-08-23 12:08:59', '2019-08-23 12:08:59'),
(202, 58, 39, '2019-08-23 12:08:59', '2019-08-23 12:08:59'),
(203, 58, 40, '2019-08-23 12:08:59', '2019-08-23 12:08:59'),
(204, 58, 41, '2019-08-23 12:08:59', '2019-08-23 12:08:59'),
(205, 59, 3, '2019-08-23 12:26:38', '2019-08-23 12:26:38'),
(206, 59, 4, '2019-08-23 12:26:38', '2019-08-23 12:26:38'),
(207, 59, 5, '2019-08-23 12:26:38', '2019-08-23 12:26:38'),
(208, 59, 39, '2019-08-23 12:26:38', '2019-08-23 12:26:38'),
(209, 59, 42, '2019-08-23 12:26:38', '2019-08-23 12:26:38'),
(210, 59, 43, '2019-08-23 12:26:38', '2019-08-23 12:26:38'),
(211, 59, 44, '2019-08-23 12:26:38', '2019-08-23 12:26:38'),
(212, 59, 45, '2019-08-23 12:26:38', '2019-08-23 12:26:38'),
(213, 59, 46, '2019-08-23 12:26:38', '2019-08-23 12:26:38'),
(214, 59, 47, '2019-08-23 12:26:38', '2019-08-23 12:26:38'),
(227, 60, 1, '2019-08-23 18:38:04', '2019-08-23 18:38:04'),
(228, 60, 3, '2019-08-23 18:38:04', '2019-08-23 18:38:04'),
(229, 60, 4, '2019-08-23 18:38:04', '2019-08-23 18:38:04'),
(230, 60, 5, '2019-08-23 18:38:04', '2019-08-23 18:38:04'),
(231, 60, 39, '2019-08-23 18:38:04', '2019-08-23 18:38:04'),
(232, 60, 42, '2019-08-23 18:38:04', '2019-08-23 18:38:04'),
(233, 60, 43, '2019-08-23 18:38:04', '2019-08-23 18:38:04'),
(234, 60, 44, '2019-08-23 18:38:04', '2019-08-23 18:38:04'),
(235, 60, 46, '2019-08-23 18:38:04', '2019-08-23 18:38:04'),
(236, 60, 48, '2019-08-23 18:38:04', '2019-08-23 18:38:04'),
(237, 60, 49, '2019-08-23 18:38:04', '2019-08-23 18:38:04'),
(238, 60, 50, '2019-08-23 18:38:04', '2019-08-23 18:38:04'),
(255, 61, 51, '2019-08-24 17:27:10', '2019-08-24 17:27:10'),
(256, 61, 52, '2019-08-24 17:27:10', '2019-08-24 17:27:10'),
(257, 61, 53, '2019-08-24 17:27:10', '2019-08-24 17:27:10'),
(258, 61, 40, '2019-08-24 17:27:10', '2019-08-24 17:27:10'),
(259, 61, 4, '2019-08-24 17:27:10', '2019-08-24 17:27:10'),
(260, 61, 41, '2019-08-24 17:27:10', '2019-08-24 17:27:10'),
(261, 61, 5, '2019-08-24 17:27:10', '2019-08-24 17:27:10'),
(262, 61, 37, '2019-08-24 17:27:10', '2019-08-24 17:27:10'),
(263, 62, 46, '2019-08-25 22:49:44', '2019-08-25 22:49:44'),
(264, 62, 54, '2019-08-25 22:49:44', '2019-08-25 22:49:44'),
(265, 62, 51, '2019-08-25 22:49:44', '2019-08-25 22:49:44'),
(266, 62, 52, '2019-08-25 22:49:44', '2019-08-25 22:49:44'),
(267, 62, 53, '2019-08-25 22:49:44', '2019-08-25 22:49:44'),
(268, 62, 40, '2019-08-25 22:49:44', '2019-08-25 22:49:44'),
(269, 62, 4, '2019-08-25 22:49:44', '2019-08-25 22:49:44'),
(270, 62, 56, '2019-08-25 22:49:44', '2019-08-25 22:49:44'),
(271, 62, 41, '2019-08-25 22:49:44', '2019-08-25 22:49:44'),
(272, 62, 5, '2019-08-25 22:49:44', '2019-08-25 22:49:44'),
(273, 62, 37, '2019-08-25 22:49:44', '2019-08-25 22:49:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_tags`
--

CREATE TABLE `post_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) NOT NULL,
  `tag_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `post_tags`
--

INSERT INTO `post_tags` (`id`, `post_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(159, 57, 1, '2019-08-23 11:37:00', '2019-08-23 11:37:00'),
(160, 57, 2, '2019-08-23 11:37:00', '2019-08-23 11:37:00'),
(161, 57, 3, '2019-08-23 11:37:01', '2019-08-23 11:37:01'),
(162, 57, 4, '2019-08-23 11:37:01', '2019-08-23 11:37:01'),
(165, 58, 4, '2019-08-23 12:08:59', '2019-08-23 12:08:59'),
(166, 58, 5, '2019-08-23 12:08:59', '2019-08-23 12:08:59'),
(167, 59, 14, '2019-08-23 12:26:38', '2019-08-23 12:26:38'),
(168, 59, 15, '2019-08-23 12:26:38', '2019-08-23 12:26:38'),
(171, 60, 16, '2019-08-23 18:38:05', '2019-08-23 18:38:05'),
(172, 60, 17, '2019-08-23 18:38:05', '2019-08-23 18:38:05'),
(181, 61, 18, '2019-08-24 17:27:10', '2019-08-24 17:27:10'),
(182, 61, 5, '2019-08-24 17:27:10', '2019-08-24 17:27:10'),
(183, 61, 20, '2019-08-24 17:27:11', '2019-08-24 17:27:11'),
(184, 61, 21, '2019-08-24 17:27:11', '2019-08-24 17:27:11'),
(185, 62, 25, '2019-08-25 22:49:44', '2019-08-25 22:49:44'),
(186, 62, 18, '2019-08-25 22:49:44', '2019-08-25 22:49:44'),
(187, 62, 24, '2019-08-25 22:49:44', '2019-08-25 22:49:44'),
(188, 62, 23, '2019-08-25 22:49:44', '2019-08-25 22:49:44'),
(189, 62, 21, '2019-08-25 22:49:44', '2019-08-25 22:49:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_users`
--

CREATE TABLE `post_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `follow_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_invoices`
--

CREATE TABLE `product_invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `invoice_id` bigint(20) NOT NULL,
  `post_id` bigint(20) DEFAULT NULL,
  `dlc_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `subTotal` double DEFAULT NULL,
  `total` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_invoices`
--

INSERT INTO `product_invoices` (`id`, `user_id`, `invoice_id`, `post_id`, `dlc_id`, `created_at`, `updated_at`, `subTotal`, `total`) VALUES
(1, 1, 14, 61, NULL, '2019-08-26 10:50:25', '2019-08-26 10:50:25', 13, 13),
(2, 1, 14, NULL, 24, '2019-08-26 10:50:25', '2019-08-26 10:50:25', 5.1, 5.1),
(3, 1, 15, NULL, 23, '2019-08-26 10:53:19', '2019-08-26 10:53:19', 5.1, 5.1),
(4, 1, 16, 62, NULL, '2019-08-26 11:33:37', '2019-08-26 11:33:37', 8.1, 8.1),
(5, 1, 16, NULL, 22, '2019-08-26 11:33:37', '2019-08-26 11:33:37', 5.1, 5.1),
(6, 1, 17, 59, NULL, '2019-08-26 11:46:58', '2019-08-26 11:46:58', 14, -686),
(7, 1, 18, NULL, 21, '2019-08-26 11:53:56', '2019-08-26 11:53:56', 1.3, 1.3),
(8, 1, 19, NULL, 11, '2019-08-26 11:55:41', '2019-08-26 11:55:41', 9.5, -465.5),
(9, 1, 20, 60, NULL, '2019-08-26 12:10:55', '2019-08-26 12:10:55', 13.3, 13.3),
(10, 1, 20, NULL, 12, '2019-08-26 12:10:55', '2019-08-26 12:10:55', 9.5, -465.5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `stripe_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_plan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Wildcard Studio', '2019-06-28 11:26:51', '2019-08-23 10:25:12', NULL),
(2, 'Instinct Games', '2019-06-28 11:27:20', '2019-08-23 10:25:33', NULL),
(3, 'Efecto Studios', '2019-06-28 11:27:34', '2019-08-23 10:25:50', NULL),
(4, 'Virtual Basement LLC', '2019-06-28 11:27:52', '2019-08-23 10:26:04', NULL),
(5, 'Triumph Studios', '2019-06-28 11:29:31', '2019-08-23 10:26:32', NULL),
(13, 'Paradox Interactive', '2019-08-23 10:26:45', '2019-08-23 10:26:45', NULL),
(14, 'CyberConnect2 Co. Ltd.', '2019-08-23 12:18:26', '2019-08-23 12:18:26', NULL),
(15, 'BANDAI NAMCO Entertainment', '2019-08-23 12:18:41', '2019-08-23 12:18:41', NULL),
(16, 'Marvelous Inc.', '2019-08-23 13:20:27', '2019-08-23 13:20:27', NULL),
(17, 'XSEED Games', '2019-08-23 13:20:45', '2019-08-23 13:20:45', NULL),
(18, 'Forgotten Empires', '2019-08-24 16:53:40', '2019-08-24 16:53:40', NULL),
(19, 'Tantalus', '2019-08-24 16:59:15', '2019-08-24 16:59:15', NULL),
(20, 'Wicked Witch', '2019-08-24 16:59:43', '2019-08-24 16:59:43', NULL),
(21, 'Xbox Game Studios', '2019-08-24 16:59:58', '2019-08-24 16:59:58', NULL),
(22, 'Xbox Game Studios', '2019-08-24 17:04:05', '2019-08-24 17:09:40', '2019-08-24 17:09:40'),
(23, 'Skybox Labs', '2019-08-25 22:43:51', '2019-08-25 22:43:51', NULL),
(24, 'Hidden Path Entertainment', '2019-08-25 22:44:19', '2019-08-25 22:44:19', NULL),
(25, 'Ensemble Studios', '2019-08-25 22:44:38', '2019-08-25 22:44:38', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `google_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `card_brand` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_last_four` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `country_id` bigint(20) DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'images/default.png',
  `cover` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` varchar(800) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `google_id`, `stripe_id`, `card_brand`, `card_last_four`, `trial_ends_at`, `country_id`, `avatar`, `cover`, `desc`, `firstName`, `lastName`, `phone`, `role`) VALUES
(1, 'Senbonzakura', 'anhdungpham090@gmail.com', NULL, '$2y$10$s5QWYayDV.97LeMzn8inl.wmDbZAk8QNJLKAcbLYG2LWv.mDr6aji', 'cJopOIokSLpxicBvR7myJ8Ku6SOMiIPUBYcPkk5S3eWvVIjb4VRAXDPp0e7D', '2019-06-24 12:41:11', '2019-08-20 15:36:04', NULL, NULL, NULL, NULL, NULL, 232, 'images/1566314129_person_1.jpg', 'images/1566314129_img_6.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Anh Dũng', 'Phạm', '762941097', 'master'),
(2, 'anh dung Pham', 'anhdung.pham090@gmail.com', NULL, NULL, NULL, '2019-08-05 11:15:03', '2019-08-25 20:37:23', '118022945723790334946', NULL, NULL, NULL, NULL, NULL, 'images/default.png', NULL, NULL, NULL, NULL, NULL, 'admin'),
(20, 'Anh Dũng Phạm', 'anhdunghisinh123486@gmail.com', NULL, NULL, NULL, '2019-08-05 12:04:50', '2019-08-26 12:21:55', '113634307219876021002', NULL, NULL, NULL, NULL, NULL, 'images/default.png', NULL, NULL, NULL, NULL, NULL, 'admin'),
(21, 'Anh Dũng Phạm', 'projectphpsellinggame@gmail.com', NULL, NULL, NULL, '2019-08-05 12:08:11', '2019-08-25 20:42:38', '117286209227404852528', NULL, NULL, NULL, NULL, NULL, 'images/default.png', NULL, NULL, NULL, NULL, NULL, 'admin'),
(22, 'Pham Anh Dung (FPT Aptech HN)', 'dungpath1805040@fpt.edu.vn', NULL, NULL, NULL, '2019-08-13 08:07:13', '2019-08-25 18:52:30', '105630308679028872228', NULL, NULL, NULL, NULL, NULL, 'images/default.png', NULL, NULL, NULL, NULL, NULL, 'admin'),
(23, 'Dung Pham Anh', 'phamanhdung_t60@hus.edu.vn', NULL, NULL, NULL, '2019-08-13 08:15:27', '2019-08-13 08:15:27', '100719945411074904239', NULL, NULL, NULL, NULL, NULL, 'images/default.png', NULL, NULL, NULL, NULL, NULL, 'user'),
(24, 'anh dung pham', 'phamanhdung97123@gmail.com', NULL, NULL, NULL, '2019-08-13 13:50:17', '2019-08-13 13:50:17', '110077913035181038780', NULL, NULL, NULL, NULL, NULL, 'images/default.png', NULL, NULL, NULL, NULL, NULL, 'user'),
(25, 'Anh Dũng Phạm', 'dev20noobcoder@gmail.com', NULL, NULL, NULL, '2019-08-25 00:33:36', '2019-08-25 00:33:36', '106480688338631664403', NULL, NULL, NULL, NULL, NULL, 'images/default.png', NULL, NULL, NULL, NULL, NULL, 'user');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dlcs`
--
ALTER TABLE `dlcs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dlc_users`
--
ALTER TABLE `dlc_users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `member_messages`
--
ALTER TABLE `member_messages`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `post_categories`
--
ALTER TABLE `post_categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `post_tags`
--
ALTER TABLE `post_tags`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `post_users`
--
ALTER TABLE `post_users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_invoices`
--
ALTER TABLE `product_invoices`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscriptions_user_id_stripe_status_index` (`user_id`,`stripe_status`);

--
-- Chỉ mục cho bảng `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_stripe_id_index` (`stripe_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT cho bảng `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;

--
-- AUTO_INCREMENT cho bảng `dlcs`
--
ALTER TABLE `dlcs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `dlc_users`
--
ALTER TABLE `dlc_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `member_messages`
--
ALTER TABLE `member_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT cho bảng `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=274;

--
-- AUTO_INCREMENT cho bảng `post_tags`
--
ALTER TABLE `post_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT cho bảng `post_users`
--
ALTER TABLE `post_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product_invoices`
--
ALTER TABLE `product_invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
