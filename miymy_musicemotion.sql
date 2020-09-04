-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 04, 2020 at 09:57 PM
-- Server version: 10.3.23-MariaDB-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `miymy_musicemotion`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(3) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `afe`
--

CREATE TABLE `afe` (
  `afe_id` int(3) NOT NULL,
  `afe_bpm` int(5) NOT NULL,
  `afe_mode` varchar(5) NOT NULL,
  `afe_loudness` int(5) NOT NULL,
  `afe_energy` int(5) NOT NULL,
  `afe_danceability` int(5) NOT NULL,
  `afe_e` varchar(15) NOT NULL,
  `m_code` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `afe`
--

INSERT INTO `afe` (`afe_id`, `afe_bpm`, `afe_mode`, `afe_loudness`, `afe_energy`, `afe_danceability`, `afe_e`, `m_code`) VALUES
(2, 140, '10A', -9, 38, 49, '2', '79r2xtw5sj'),
(3, 141, '8B', -3, 71, 69, '1', '5vkd0oi6f4'),
(4, 123, '4A', -5, 79, 66, '1', 'hxu73igalf'),
(5, 155, '10B', -5, 88, 75, '4', 'ajkpqx962o'),
(6, 122, '10B', -5, 71, 75, '1', '1hz9l8sr5d'),
(12, 1, '1', 1, 1, 1, '2', '47wd1p8yal'),
(14, 12, '8B', -3, 38, 69, 'Love', 'buox4kdcma'),
(22, 89, '8A', -3, 40, 80, '2', '8vglswe1t7'),
(24, 83, '3B', -11, 53, 27, '11', 'z8kx21wghm'),
(28, 120, '7A', -4, 76, 58, '2', '6w83b4xpfi'),
(30, 48, '11A', -22, 30, 35, '11', 'wazdf3y2qi');

-- --------------------------------------------------------

--
-- Table structure for table `cfe`
--

CREATE TABLE `cfe` (
  `cfe_id` int(3) NOT NULL,
  `cfe_x_axis` varchar(20) NOT NULL,
  `cfe_y_axis` varchar(20) NOT NULL,
  `cfe_e` varchar(15) NOT NULL,
  `m_code` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cfe`
--

INSERT INTO `cfe` (`cfe_id`, `cfe_x_axis`, `cfe_y_axis`, `cfe_e`, `m_code`) VALUES
(2, 'hi-ve', 'hi-ve', '2', '79r2xtw5sj'),
(3, 'hi+ve', 'hi+ve', '1', '5vkd0oi6f4'),
(4, 'Low+ve', 'hi+ve', '1', 'hxu73igalf'),
(5, 'hi-ve', 'hi+ve', '4', 'ajkpqx962o'),
(6, 'hi+ve', 'hi+ve', '1', '1hz9l8sr5d'),
(12, '1', '1', '2', '47wd1p8yal'),
(14, 'hi+ve', 'hi+ve', 'angry', 'buox4kdcma'),
(22, 'positive', 'positive', '2', '8vglswe1t7'),
(24, 'positive', 'positive', '11', 'z8kx21wghm'),
(28, 'Low-ve', 'Low+ve', '2', '6w83b4xpfi'),
(30, 'dasdqfwfqfq', 'fqw', '12', 'wazdf3y2qi');

-- --------------------------------------------------------

--
-- Table structure for table `emotion`
--

CREATE TABLE `emotion` (
  `e_id` int(3) NOT NULL,
  `e_name` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emotion`
--

INSERT INTO `emotion` (`e_id`, `e_name`) VALUES
(1, 'Happy'),
(2, 'Sad'),
(3, 'Calm'),
(4, 'Angry'),
(5, 'Anxious'),
(6, 'Terrified'),
(7, 'Disgusted'),
(8, 'Despairing'),
(9, 'Depressed'),
(10, 'Bored'),
(11, 'Exhilarate'),
(12, 'Excited'),
(13, 'Pleasure'),
(14, 'Relaxed'),
(15, 'Serene'),
(16, 'Tranquil');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `g_id` int(3) NOT NULL,
  `g_name` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`g_id`, `g_name`) VALUES
(1, 'Pop'),
(2, 'Rock'),
(3, 'Balada'),
(4, 'Reggae'),
(5, 'Pop Balada'),
(6, 'Hip Hop');

-- --------------------------------------------------------

--
-- Table structure for table `lfe`
--

CREATE TABLE `lfe` (
  `lfe_id` int(3) NOT NULL,
  `lfe_arousal` int(10) NOT NULL,
  `lfe_valence` int(10) NOT NULL,
  `lfe_e` varchar(15) NOT NULL,
  `m_code` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lfe`
--

INSERT INTO `lfe` (`lfe_id`, `lfe_arousal`, `lfe_valence`, `lfe_e`, `m_code`) VALUES
(2, 60, 30, '2', '79r2xtw5sj'),
(3, 70, 70, '1', '5vkd0oi6f4'),
(4, 70, 60, '1', 'hxu73igalf'),
(5, 70, 10, '4', 'ajkpqx962o'),
(6, 70, 70, '1', '1hz9l8sr5d'),
(12, 1, 1, '2', '47wd1p8yal'),
(14, 40, 30, 'Sad', 'buox4kdcma'),
(22, 82, 79, '2', '8vglswe1t7'),
(24, 100, 100, '11', 'z8kx21wghm'),
(28, 40, 50, '3', '6w83b4xpfi'),
(30, 48, 69, '6', 'wazdf3y2qi');

-- --------------------------------------------------------

--
-- Table structure for table `mp`
--

CREATE TABLE `mp` (
  `m_id` int(3) NOT NULL,
  `m_code` varchar(10) NOT NULL,
  `m_title` varchar(20) NOT NULL,
  `m_duration` varchar(10) NOT NULL,
  `m_year` varchar(5) NOT NULL,
  `m_lyric` longtext NOT NULL,
  `m_audiofile` varchar(255) NOT NULL,
  `m_img` varchar(255) NOT NULL,
  `g_id` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mp`
--

INSERT INTO `mp` (`m_id`, `m_code`, `m_title`, `m_duration`, `m_year`, `m_lyric`, `m_audiofile`, `m_img`, `g_id`) VALUES
(2, '79r2xtw5sj', 'Di Matamu', '4.07', '2018', '[Verse 1]\r\nApakah kau cuba untuk menafikan\r\nKeikhlasan hatiku padamu\r\nBetapa ku mencuba\r\nMendapatkan secebis kasih mu\r\n\r\n[Verse 2]\r\nApakah kau tak mampu untuk menentukan\r\nDi antara kaca dan permata\r\nBetapa telahan mu\r\nMemaksa ku mengundurkan diri\r\n\r\n[Chorus]\r\nDan tak seharusnya aku\r\nBertemu dirimu di dunia ini\r\nDan kau membuang diriku sesuka hati mu\r\nDan memilih dia\r\nDan ku tersandar begini\r\nMeratapi hati yang telah dilukai\r\nAku sedar betapa hinanya\r\nKu di matamu\r\n\r\n[Bridge]\r\nNamun jika ku diperlukan, dan diterima\r\nIzinkan ku menagih kasihmu\r\nNamun jika ku ditolak, tak diperlukan\r\nBuang segala tentang ku\r\n\r\n[Chorus]\r\nDan tak seharusnya aku\r\nBertemu dirimu di dunia ini\r\nDan kau membuang diriku sesuka hatimu\r\nDan memilih dia\r\nDan ku tersandar begini\r\nMeratapi hati yang telah dilukai\r\nAku sedar betapa hinanya\r\nKu di matamu              ', 'IaW3TTCHL4Q', 'dimatamu.png', 3),
(3, '5vkd0oi6f4', 'Ragaman', '4.10', '2018', '[Verse 1]\r\nHari Isnin, kau berkata nak makan lasagna\r\n(ok)\r\nDah sampai kedai nak tomyam pula\r\nOh my god!\r\nPetang Rabu, nak cendol pula\r\nBiar betik!\r\nNasiblah baik, mood aku baik\r\n\r\n[Pre-Chorus]\r\nBulan puasa baru nak mula\r\nDah mintak langsir macam nak raya\r\nRagamanmu hanya aku yang tahu (oh)\r\nOh sayang!\r\n\r\n[Chorus]\r\nHanya kita berdua, kekal sampai tua\r\nBagai bulan dipagar bintang\r\nTetapkan bersama (oh, oh, oh)\r\nHanya kita berdua, kekal bahagia\r\nWalau gila dibuatnya\r\nAku sayang padanya (aha)\r\n\r\n[Post-Chorus]\r\nDah berkali - kali, kau buat lagi\r\nTolong! tolong!\r\nHanya kita berdua\r\nDah berkali - kali, kau buat lagi\r\nTolong! tolong!\r\nHanya kita berdua\r\n\r\n[Verse 2]\r\nWe go\r\nMakan malam sudah dihidang\r\nKau masih melaram (ah ha, ha)\r\nTime tengok bola, kau ajak keluar\r\nYa Allah!\r\nMasuk kereta baru gear 2\r\nKau nak balik -ik -ik\r\nNasiblah baik, muka kau cantik\r\n\r\n[Pre-Chorus]\r\nBulan puasa baru naik mula\r\nDah mintak langsir macam nak raya\r\nRagamanmu, hanya aku yang tahu (tahu!)\r\n\r\n[Chorus]\r\nHanya kita berdua, kekal sampai tua\r\nBagai bulan dipagar bintang\r\nTetapkan bersama (oh, oh, oh)\r\nHanya kita berdua, kekal bahagia\r\nWalau gila dibuatnya\r\nAku sayang padanya (aha)\r\n\r\n[Post-Chorus]\r\nDah berkali - kali, kau buat lagi\r\nTolong! tolong!\r\nHanya kita berdua\r\nDah berkali - kali, kau buat lagi\r\nTolong! tolong!\r\nHanya kita berdua\r\n\r\n[Break]\r\n\r\n[Chorus]\r\nHanya kita berdua, kekal bahagia sampai hari tua\r\nBagai bulan dipagar bintang\r\nTetapkan bersama (oh, oh, oh)\r\nHanya kita berdua kekal bahagia\r\nWalau gila dibuatnya\r\nAku sayang padanya\r\n\r\n[Outro]\r\nWalau gila dibuatnya\r\nAku sayang padanya\r\nWalau gila dibuatnya\r\nAku sayang padanya', '9hUN3mKxNE8', 'ragaman.jpg', 4),
(4, 'hxu73igalf', 'Amalina', '3.48', '2018', 'Amalina oh amalina\r\nOh amalina oh amalina\r\n\r\nAmalina, amalina\r\nKau satu ku tidak punya dua\r\nSatu dua tiga hanya kau saja\r\nWalau bidadari datang menyerah\r\n\r\nAmalina, amalina\r\nBiar dulu kita habis belajar\r\nKita juga sama-sama membesar\r\nNantikan orang tuaku pinangkan\r\n\r\nAmalina, aku suka kamu kerna kau manja\r\nAku suka kamu kerna kau mulia\r\nAku suka kamu, engkau amalina\r\n\r\n\r\nAmalina ooh aku suka kau berbudi bahasa\r\nKau juga menghormati orang tua\r\nAku sayang kamu oh amalina\r\n\r\nAmalina, aku suka kamu kerna kau manja\r\nAku suka kamu kerna kau mulia\r\nAku suka kamu, engkau amalina\r\n\r\nAmalina ooh aku suka kau berbudi bahasa\r\nKau juga menghormati orang tua\r\nAku sayang kamu oh amalina\r\n\r\nAmalina (amalina), aku suka kamu kerna kau manja (kau manja)\r\nAku suka kamu kerna kau mulia\r\nAku suka kamu, engkau amalina\r\n\r\nAmalina ooh aku suka kau berbudi bahasa (budi bahasa)\r\nKau juga menghormati orang tua\r\nAku sayang kamu oh amalina\r\n\r\nAmalina, amalina\r\nKau satu pujaan selamanya\r\nKita harus tahu batas agama\r\nMoga-moga kita kekal bersama, \r\nAmalina ooh amalina', 'nmpnRIHv8hQ', 'amalina.jpg', 5),
(5, 'ajkpqx962o', 'Amboi', '3.32', '2016', '[Chorus 1]\r\nKalau tinggal rumah sewa tapi beli kereta mewah\r\nAmboi, amboi\r\nKalau mahu gaji besar tapi kerja sambil lewa\r\nAmboi, amboi\r\nAmboi, amboi, amboi\r\nAmboi, amboi, amboi\r\nAmboi, amboi, amboi, amboi, amboi, amboi, amboi\r\nAmboi, amboi, amboi\r\nAmboi, amboi, amboi\r\nAmboi, amboi, amboi, amboi, amboi, amboi, amboi\r\n\r\n[Verse 1]\r\nMari-mari tuan puan akak adik abang dengar ini cerita\r\nAmbil teropong, kaca mata, tengok jenguk dipersila\r\nNak panggil waras susah, tak baik kalau gelar gila\r\nNi kes sebelanga susu rosak akibat dua tiga titik nila\r\nBila masuk kerja, tak pernah on time\r\nLepas masuk kerja, dia terus online\r\nTak boleh buat kerja, sibuk jaga hal orang lain\r\nTangan mengelat, kaki mengular, mulut celupar\r\nLambat masuk, awal keluar\r\n\r\n[Pre-Chorus 1]\r\nSiapa makan cili, dia rasa pedas\r\nSiapa rasa pedas, kata aku main cakap lepas\r\nAmbil baju, ukur kat badan sendiri\r\nMana tahu kene setepek ke tempias sipi-sipi\r\n\r\n[Chorus 1]\r\nKalau tinggal rumah sewa tapi beli kereta mewah\r\nAmboi, amboi\r\nKalau mahu gaji besar tapi kerja sambil lewa\r\nAmboi, amboi\r\nAmboi, amboi, amboi\r\nAmboi, amboi, amboi\r\nAmboi, amboi, amboi, amboi, amboi, amboi, amboi\r\nAmboi, amboi, amboi\r\nAmboi, amboi, amboi\r\nAmboi, amboi, amboi, amboi, amboi, amboi, amboi\r\n\r\n[Verse 2]\r\nEh tak baik, tau\r\nPedas kaw, kaw\r\nEh takleh gu, rau\r\nDuduk su, rau\r\nAmbil M, C\r\nRoyan kat F, B\r\nMengadu kat S, B\r\nDan MCM, C\r\nTarbiah Sentap punca pendekar papan kunci rentap\r\nMasa mengkritik cakap lepas itu confirm lenyap\r\nKeberanian atas talian, kejadian harian\r\nOmong kosong untuk lotong terus disajikan\r\n\r\n[Pre-Chorus 2]\r\nSiapa makan cili, dia rasa pedas\r\nSiapa rasa pedas, kata aku cakap lepas\r\nSemua ambil baju, ukur badan sendiri\r\nMana tahu kene setepek ke tempias sipi-sipi\r\n\r\n[Chorus 2]\r\nKalau tinggal rumah sewa tapi beli kereta mewah\r\nAmboi, amboi\r\n7 kali pergi usrah sudah pandai tepis fatwa\r\nAmboi, amboi\r\nAmboi, amboi, amboi\r\nAmboi, amboi, amboi\r\nAmboi, amboi, amboi, amboi, amboi, amboi, amboi\r\nAmboi, amboi, amboi\r\nAmboi, amboi, amboi\r\nAmboi, amboi, amboi, amboi, amboi, amboi, amboi\r\n\r\n[Bridge]\r\nSampai bila orang kita layu ditolong mmmm\r\n(Sampai bila orang kita layu ditolong uuuuuu)\r\nKetua kampung gadai tanah untuk sepitis wang saku\r\n(Ketua kampung gadai tanah untuk sepitis wang saku)\r\nTapi aku aku tahu, aku cuma tulis lagu\r\n(Tapi apa kami tahu kami cuma nyanyi lagu)\r\nBukan nak sekolahkan korang, aku bahasakan aku\r\n(Bukan nak sekolahkan korang, aku bahasakan aku)\r\n\r\n[Outro]\r\nAmboi (amboi)\r\nAmboi (amboi)\r\nAmboi (amboi)\r\nAmboi (amboi)\r\nAmboi, amboi, amboi\r\nAmboi, amboi, amboi\r\nAmboi, amboi, amboi\r\nAmboi, amboi, amboi\r\nAmboi, amboi, amboi\r\nAmboi, amboi, amboi\r\nAmboi, amboi, amboi\r\nAmboi, amboi, amboi\r\nAmboi, amboi, amboi, amboi, amboi, amboi, amboi\r\nAmboi, amboi, amboi, amboi, amboi, amboi, amboi', 'ilsdQpRFWj8', 'amboi.jpg', 6),
(6, '1hz9l8sr5d', 'Malaysiaku', '3.48', '2018', 'Na.na.na.na eh Na.na.na.na eh\r\nSayangi Malaysia\r\nNa.na.na.na eh Na.na.na.na eh\r\nSayangi Malaysia (Malaysia)\r\n\r\nMalaysia..(ok ok ok ok)\r\nMalaysia\r\nTanah tumpah darahku, tanah tumpah darahku (tanah tumpah darahku)\r\nMalaysia..(Malaysia)\r\nMerah putih biru kuning\r\nKami siap setia setia rata gila warna kuning\r\n\r\nAaa.. aaa..\r\nDiluar ada cabaranya dunia penuh dengan geloranya (geloranya)\r\ntetapi kita tetap sama tetap sama teguh, teguh bersaudara (saudara)\r\nLangit dan bumi kita sama tak kira bangsa atau budaya\r\nSayangi cintai sepenuh jiwa hidup harmoni rakyat Malaysia\r\n\r\nNa.na.na.na eh Na.na.na.na eh\r\nSayangilah Malaysia\r\nNa.na.na.na eh Na.na.na.na eh\r\nSayangilah.. Malaysia..\r\n\r\nMalaysiaku.. Malaysiaku.. Malaysiaku.. Malaysiaku..\r\n\r\nIni negaraku oh yeh. yeh.yehh.\r\nIni Malaysiaku woh. woh. woh. wohh\r\nSelalu bersatu eh selalu bersatu\r\nSelalu dihatiku a. le. le. le. le\r\nNegaraku sampai bila - bila\r\nKita maju kita angkat bendera\r\nBudi bahasa budaya kita\r\nNegaraku kita nyanyi bersama\r\n\r\nWow.. Ibu pertiwi yangku sanjungi\r\nLaung bangga dijalan hati\r\nAyuh bersama kita berdiri\r\nBersatu sambil kita menyanyi\r\n\r\nBertapa indahnya tanah airku\r\nWarna warni serebi budaya yang hidup \r\nTak lekang dek panas tak pernah jemu \r\nTerbuka meluas disebuah tamu \r\nDikir (dikir), Zapin (zapin), joget lama terlucut zapin (zapin), mak yong (mak yong)\r\nJumpa wayang kulit tradisi terjalin mutu masih terjamin\r\n\r\nAi. ya. ya Malaysia\r\nAi. ya. ya Malaysia\r\nAi. ya. ya Malaysia\r\nSayangilah oh Malaysiaku\r\nNa. na. na. na eh Na. na. na. na eh\r\nSayangilah Malaysiaku\r\n\r\nAi. ya. ya Malaysia\r\nAi. ya. ya Malaysia\r\nAi. ya. ya Malaysia\r\nSayangilah oh Malaysiaku\r\nNa. na. na. na eh Na. na. na. na eh\r\nSayangilah Malaysiaku\r\nMalaysiaku oh yehh\r\n', 'a2OzyzDyzuU', 'malaysiaku.jpg', 1),
(12, '47wd1p8yal', 'On My Way', '3:13', '2019', '', 'llGQMlkgkpk', 'onmyway.png', 1),
(14, 'buox4kdcma', 'Shes Gone', '6.29', '2013', 'Bla Bla\r\nBla Bla\r\nBla Bla\r\nBla Bla', 'Nw8i9EBY7FU', 'shegone.png', 2),
(22, '8vglswe1t7', 'Manis-Manis Cinta', '4:53', '2019', 'Sungguh mati aku tak jemu\r\nWalau selalu kau di sisi ku\r\nSungguh mati aku tak jemu\r\nWalau selalu kau di sisi ku\r\n\r\nDenyut nadi degup jantung ku\r\nHanya untukmu cinta yang satu\r\nManis manis orang bercinta\r\nSiang malam mahu bersama\r\n\r\nKau berikan satu cintamu\r\nTulus suci hanya untukku\r\nKau berikan satu cintamu\r\nTulus suci hanya untukku\r\n\r\nJasad nyawa hela nafasku\r\nHanya untukmu cinta yang satu\r\nManis manis orang bercinta\r\nSiang malam mahu bersama\r\n\r\nJangan sampai ada air mata\r\nYang memisah kita di dunia\r\nJangan sampai ada kecurangan\r\nYang membunuh cinta cinta kita\r\n\r\nHanya engkau hatiku berpaut\r\nSanjungan batin ku\r\nHanya engkau jiwaku berteduh selamanya\r\n\r\nRembulan merangkai rindu ku\r\nSetiap kali kau menjauh\r\nPercaya (siapa?) pada ku (kenapa?)\r\nTak pernah kau jauh di hati\r\n\r\n\r\n \r\nWalaupun dijampi mentera\r\nTak mampu menewaskan cinta\r\nSentulah (di mana?) dapaklah (mengapa?)\r\nCintaku di kamar hatimu\r\n\r\nJangan sampai ada air mata\r\nYang memisah kita di dunia\r\nJangan sampai ada kecurangan\r\nYang membunuh cinta cinta kita\r\n\r\nHanya engkau hati ku berpaut\r\nSanjungan batin ku\r\nHanya engkau jiwa ku berteduh selamanya\r\n\r\nRembulan merangkai rinduku\r\nSetiap kali kau menjauh\r\nPercaya (siapa?) padaku (kenapa?)\r\nTak pernah kau jauh di hati\r\n\r\nWalaupun dijampi mentera\r\nTak mampu menewaskan cinta\r\nSentulah (di mana?) dapaklah (mengapa?)\r\nCintaku di kamar hatimu\r\n\r\nKalau hidup seribu tahun\r\nBersamamu aku tak jemu\r\nKalau hidup seribu tahun\r\nBersamamu aku tak jemu\r\n\r\nKalau mati boleh bersama\r\nTanam sekubur kita berdua\r\n\r\nManis manis orang bercinta\r\n(manis manis orang bercinta)\r\nSiang malam mahu bersama\r\n(siang malam mahu bersama)', '9UvhD9vubCw', 'maniscinta.jpg', 0),
(25, 'z8kx21wghm', 'Show Must Go On', '4:22', '1991', 'Empty spaces, what are we living for? Abandoned places, I guess we know the score On and on, does anybody know what we are looking for? Another hero, another mindless crime Behind the curtain, in the pantomime Hold the line, does anybody want to take it anymore? The show must go on The show must go on Yeah Inside my heart is breaking My make-up may be flaking But my smile still stays on Whatever happens, I\'ll leave it all to chance Another heartache, another failed romance On and on, does anybody know what we are living for? I guess I\'m learning (I\'m learning), I must be warmer now I\'ll soon be turning (turning, turning, turning), \'round the corner now Outside the dawn is breaking But inside in the dark I\'m aching to be free The show must go on The show must go on (yeah yeah) Ooh, inside my heart is breaking My make-up may be flaking But my smile still stays on Yeah My soul is painted like the wings of butterflies Fairy tales of yesterday will grow but never die I can fly my friends The show must go on, yeah The show must go on I\'ll face it with a grin I\'m never giving in On with the show Ooh, I\'ll top the bill, I\'ll overkill I have to find the will to carry on  (On with the show, on with the show) Show (show must go on, go on)', 't99KH0TR-J4', 's-l1000.jpg', 3),
(28, '6w83b4xpfi', 'Anta Permana', '3.26', '2018', 'Bicara minda dendangan hati\r\n\r\nJiwa dan raga yang melengkapi\r\n\r\n\r\nBagaikan bagaikan hangat mentari\r\n\r\nCinta yang sejati\r\n\r\n                      \r\n\r\nJauh di mata dekat di hati\r\n\r\nJika dirindu jangan curangi\r\n\r\nKe mana ke mana kan terbawa pergi\r\n\r\nTerduga diuji\r\n\r\n                       \r\n\r\nKu bila tersedar semuanya\r\n\r\nSempadan ilusi\r\n\r\n                     \r\n\r\nAndai bintang kan tak lagi berseri\r\n\r\nJanji kasih yang takkan terkhianati\r\n\r\nAndai habis nafas ku yang terakhir\r\n\r\nMasih ku cinta\r\n\r\nKerna ku pasti kau tiada pengganti\r\n\r\n                       \r\n\r\nSedangkan lidah tergigit jua\r\n\r\nInikan pula cinta manusia\r\n\r\nMelayang melayang dibawa pawana\r\n\r\nIringi cintamu\r\n\r\n                        \r\n\r\nBiar dikenang kasih, budi dan sayang\r\n\r\nBiar biarkan cinta anta permana', 'JZzPldJo4eM', 'antapermana.jpg', 0),
(30, 'wazdf3y2qi', 'Let it Go', '3:13', '2013', 'Let it Go 100x', 'L0MK7qz13bU', 'YUNG.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mp_singer`
--

CREATE TABLE `mp_singer` (
  `m_code` varchar(10) NOT NULL,
  `s_id` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mp_singer`
--

INSERT INTO `mp_singer` (`m_code`, `s_id`) VALUES
('6w83b4xpfi', 33),
('n182bd634w', 0);

-- --------------------------------------------------------

--
-- Table structure for table `singer`
--

CREATE TABLE `singer` (
  `s_id` int(3) NOT NULL,
  `m_code` varchar(10) NOT NULL,
  `s_name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `singer`
--

INSERT INTO `singer` (`s_id`, `m_code`, `s_name`) VALUES
(2, '79r2xtw5sj', 'Sufian Suhaimi'),
(3, '5vkd0oi6f4', 'Faizal Tahir'),
(4, 'hxu73igalf', 'Santesh'),
(5, 'ajkpqx962o', 'Altimet'),
(6, '1hz9l8sr5d', 'Syamel'),
(13, '47wd1p8yal', 'Alan Walker'),
(14, '47wd1p8yal', 'Sabrina Carpenter'),
(15, '47wd1p8yal', 'Farruko'),
(17, 'buox4kdcma', 'Steelheart'),
(25, '8vglswe1t7', 'Syafiq Farhain'),
(26, '8vglswe1t7', 'Baby Shima'),
(29, 'z8kx21wghm', 'Queen'),
(33, '6w83b4xpfi', 'Siti Nurhaliza'),
(35, 'wazdf3y2qi', 'Idina Menzel');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `afe`
--
ALTER TABLE `afe`
  ADD PRIMARY KEY (`afe_id`);

--
-- Indexes for table `cfe`
--
ALTER TABLE `cfe`
  ADD PRIMARY KEY (`cfe_id`);

--
-- Indexes for table `emotion`
--
ALTER TABLE `emotion`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`g_id`);

--
-- Indexes for table `lfe`
--
ALTER TABLE `lfe`
  ADD PRIMARY KEY (`lfe_id`);

--
-- Indexes for table `mp`
--
ALTER TABLE `mp`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `singer`
--
ALTER TABLE `singer`
  ADD PRIMARY KEY (`s_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `afe`
--
ALTER TABLE `afe`
  MODIFY `afe_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `cfe`
--
ALTER TABLE `cfe`
  MODIFY `cfe_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `emotion`
--
ALTER TABLE `emotion`
  MODIFY `e_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `g_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lfe`
--
ALTER TABLE `lfe`
  MODIFY `lfe_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `mp`
--
ALTER TABLE `mp`
  MODIFY `m_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `singer`
--
ALTER TABLE `singer`
  MODIFY `s_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
