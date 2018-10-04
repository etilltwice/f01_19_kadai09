-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2018 年 10 朁E04 日 16:13
-- サーバのバージョン： 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gs_f01_db19`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_bm_table`
--

CREATE TABLE IF NOT EXISTS `gs_bm_table` (
`id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `URL` text COLLATE utf8_unicode_ci,
  `memo` text COLLATE utf8_unicode_ci,
  `user_id` int(64) NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_bm_table`
--

INSERT INTO `gs_bm_table` (`id`, `name`, `URL`, `memo`, `user_id`, `indate`) VALUES
(1, 'PHP本', 'http://php.jp', '購入予定？', 1, '2018-09-20 19:21:36'),
(2, '数学ガール', 'https://www.amazon.co.jp/s/ref=nb_sb_noss_1?__mk_ja_JP=%E3%82%AB%E3%82%BF%E3%82%AB%E3%83%8A&url=search-alias%3Daps&field-keywords=%E6%95%B0%E5%AD%A6%E3%82%AC%E3%83%BC%E3%83%AB&rh=i%3Aaps%2Ck%3A%E6%95%B0%E5%AD%A6%E3%82%AC%E3%83%BC%E3%83%AB', '読んどきたいものリスト', 1, '2018-09-20 22:47:39'),
(3, 'フォルトゥナの瞳', 'https://www.amazon.co.jp/フォルトゥナの瞳-新潮文庫-百田-尚樹/dp/4101201919/ref=sr_1_1?ie=UTF8&qid=1537451467&sr=8-1&keywords=%E3%83%95%E3%82%A9%E3%83%AB%E3%83%88%E3%82%A5%E3%83%8A%E3%81%AE%E7%9E%B3', '最近読んだ本', 1, '2018-09-20 22:51:40'),
(4, '永遠の0', 'https://www.amazon.co.jp/永遠の0-講談社文庫-百田-尚樹/dp/406276413X/ref=sr_1_6?ie=UTF8&qid=1537451467&sr=8-6&keywords=%E3%83%95%E3%82%A9%E3%83%AB%E3%83%88%E3%82%A5%E3%83%8A%E3%81%AE%E7%9E%B3', '割と前の本', 1, '2018-09-20 22:53:17'),
(5, '文学少女', 'https://www.amazon.co.jp/“文学少女-シリーズ-全16巻-完結セット-ファミ通文庫/dp/B005OOT2L0/ref=sr_1_1?ie=UTF8&qid=1537451730&sr=8-1&keywords=%E6%96%87%E5%AD%A6%E5%B0%91%E5%A5%B3', '読みたいラノベ', 1, '2018-09-20 22:55:53'),
(6, 'C#', 'http://c#', '消去用', 2, '2018-09-26 22:27:27'),
(7, 'C#', 'http://c#', '消去用', 2, '2018-09-26 22:27:40'),
(8, 'C#', 'http://c#', '消去用', 2, '2018-09-26 22:28:55'),
(9, 'C#', 'http://c#', '消去用', 2, '2018-09-26 22:29:05'),
(10, 'C#', 'http://c#', '消去用', 2, '2018-09-26 22:29:15'),
(11, 'C#', 'http://c#', '消去用', 2, '2018-09-26 22:29:21'),
(12, 'C#', 'http://c#', '消去用', 2, '2018-09-26 22:29:28'),
(13, 'C#', 'http://c#', '消去用', 2, '2018-09-26 22:29:45'),
(16, '実験開始', 'https;//experience', '一応試しておく', 1, '2018-09-27 10:56:55'),
(17, 'もう一回', 'https://end.com', '', 1, '2018-09-27 10:58:52'),
(18, 'もう一回', 'https://end.com', '', 1, '2018-09-27 10:59:32'),
(19, '山羊さんの佃煮', 'http://sine', '殺し屋ドットコム', 1, '2018-09-27 13:47:34'),
(20, '台風予報', 'http://news.com', '台風', 0, '2018-09-29 16:36:00'),
(21, '風', 'http://widow.com', '風が凄い', 1, '2018-09-29 16:39:58'),
(22, 'ファイアー', 'http://yakitori.jp', 'にらみつけるさん', 1, '2018-09-29 16:42:22');

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_data_table`
--

CREATE TABLE IF NOT EXISTS `gs_data_table` (
`id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `detail` text COLLATE utf8_unicode_ci,
  `indate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_data_table`
--

INSERT INTO `gs_data_table` (`id`, `name`, `email`, `detail`, `indate`) VALUES
(1, 'kodama', 'kodama@gs.gs', 'test01', '2018-09-15 15:21:00'),
(2, 'yamasaki', 'yamasaki@gs.gs', 'test02', '2018-09-15 15:22:57'),
(3, 'osg', 'osg@gs.gs', 'test03', '2018-09-15 15:23:20'),
(4, 'morita', 'morita@gs.gs', 'test04', '2018-09-15 15:23:48'),
(5, 'kimura', 'kimura@gs.gs', 'test05', '2018-09-15 15:24:48'),
(6, 'kamiyama', 'kamiyama@gs.gs', 'test06', '2018-09-15 16:12:26'),
(7, 'kanou', 'kanou@gs.gs', 'test07', '2018-09-15 16:13:06'),
(8, 'kosuge', 'kosuge@gs.gs', 'test08', '2018-09-15 16:17:04'),
(9, 'iseki', 'iseki@gs.gs', 'test09', '2018-09-15 16:47:30');

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_librualy_controle`
--

CREATE TABLE IF NOT EXISTS `gs_librualy_controle` (
`id` int(11) NOT NULL,
  `u_name` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `u_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `u_pw` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `life_flag` int(1) NOT NULL,
  `master_frag` int(2) NOT NULL,
  `age` int(4) DEFAULT NULL,
  `gender` int(1) DEFAULT NULL,
  `location` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `useddate` datetime NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_librualy_controle`
--

INSERT INTO `gs_librualy_controle` (`id`, `u_name`, `u_id`, `u_pw`, `life_flag`, `master_frag`, `age`, `gender`, `location`, `useddate`, `indate`) VALUES
(1, 'twice', 'ryuichi', 'test', 1, 1, 0, 1, '福岡県', '2018-10-04 21:37:18', '2018-09-25 11:10:31'),
(2, '田中', 'kondou', 'satou', 0, 0, 20, 2, '岩手県', '0000-00-00 00:00:00', '2018-09-29 11:12:25'),
(3, '雨宮', 'naruko', 'koike', 0, 0, 34, 2, '富山県', '0000-00-00 00:00:00', '2018-09-29 11:21:14'),
(4, '榊原', 'maruta', 'kurogane', 0, 0, 25, 1, '香川県', '0000-00-00 00:00:00', '2018-09-29 11:22:39');

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_php03_table`
--

CREATE TABLE IF NOT EXISTS `gs_php03_table` (
`id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `detail` text COLLATE utf8_unicode_ci,
  `indate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_php03_table`
--

INSERT INTO `gs_php03_table` (`id`, `name`, `email`, `detail`, `indate`) VALUES
(1, 'kodama', 'kodama@gs.gs', 'test01', '2018-09-15 15:21:00'),
(2, 'yamasaki', 'yamasaki@gs.gs', 'test02', '2018-09-15 15:22:57'),
(3, 'osg', 'osg@gs.gs', 'test03', '2018-09-15 15:23:20'),
(4, 'morita', 'morita@gs.gs', 'test04', '2018-09-15 15:23:48'),
(5, 'kimura', 'kimura@gs.gs', 'test05', '2018-09-15 15:24:48'),
(6, 'kamiyama', 'kamiyama@gs.gs', 'test06', '2018-09-15 16:12:26'),
(7, 'kanou', 'kanou@gs.gs', 'test07', '2018-09-15 16:13:06'),
(8, 'kosuge', 'kosuge@gs.gs', 'test08', '2018-09-15 16:17:04'),
(9, 'iseki', 'iseki@gs.gs', 'test09', '2018-09-15 16:47:30'),
(12, 'アーラシュ・カマンガー', 'unlimited@bladeworks', '矢文の訴文', '2018-09-22 16:07:01'),
(13, '実験', 'experision@explodion', '消した後はどうなるのか', '2018-09-22 16:07:37');

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_php_table`
--

CREATE TABLE IF NOT EXISTS `gs_php_table` (
`id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `detail` text COLLATE utf8_unicode_ci,
  `indate` datetime NOT NULL,
  `age` int(8) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_php_table`
--

INSERT INTO `gs_php_table` (`id`, `name`, `email`, `detail`, `indate`, `age`) VALUES
(1, '太郎', 'adghj@sdfhj', 'お腹が減った', '2018-09-15 15:21:13', 30),
(2, '次郎', 'sweet@yahoo', '喉か沸いた', '2018-09-15 15:25:56', 20),
(3, 'かまたま', 'ohuthun@gmail', 'テラネムㇲ', '2018-09-15 15:28:30', 20),
(4, '士郎', 'seiginomikata@yahoo', '正義の味方にならなきゃいけない', '2018-09-15 15:30:50', 40),
(5, '五郎', 'koronnbia@gmail', '一人で飯が食いたい', '2018-09-15 15:36:45', 30),
(6, 'uninstall', 'encafarin', 'アンブレラ死ね', '2018-09-15 16:12:58', 20),
(7, '甘い罠', 'honey@trap', '環状線', '2018-09-15 16:19:14', 10),
(8, '赤坂サカス', 'akasaka@sakasu', '地名', '2018-09-20 19:07:40', 40),
(9, '中洲川端', 'nakanaka@batabata', '地名', '2018-09-20 19:08:44', 40),
(11, '壊れた心', 'qwertyui@ihdskcn', '誰でしょう？', '2018-09-20 21:37:44', 20),
(14, '坂巻', 'hilhifa@fhaihau', '実験中', '2018-09-20 22:21:44', 0),
(15, '当たら良い', 'fahuik@fhaiuhua', '変わらない空', '2018-09-20 22:24:44', 40);

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_user_table`
--

CREATE TABLE IF NOT EXISTS `gs_user_table` (
`id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `lid` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `lpw` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `kanri_flg` int(1) NOT NULL,
  `life_flg` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_user_table`
--

INSERT INTO `gs_user_table` (`id`, `name`, `lid`, `lpw`, `kanri_flg`, `life_flg`) VALUES
(1, 'ohsugi', 'osg', 'osg', 1, 0),
(2, 'kodama', 'kdm', 'kdm', 0, 0),
(3, 'yamasaki', 'ymsk', 'ymsk', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gs_data_table`
--
ALTER TABLE `gs_data_table`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gs_librualy_controle`
--
ALTER TABLE `gs_librualy_controle`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gs_php03_table`
--
ALTER TABLE `gs_php03_table`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gs_php_table`
--
ALTER TABLE `gs_php_table`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gs_user_table`
--
ALTER TABLE `gs_user_table`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `gs_data_table`
--
ALTER TABLE `gs_data_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `gs_librualy_controle`
--
ALTER TABLE `gs_librualy_controle`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `gs_php03_table`
--
ALTER TABLE `gs_php03_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `gs_php_table`
--
ALTER TABLE `gs_php_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `gs_user_table`
--
ALTER TABLE `gs_user_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
