-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2017 at 04:27 PM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_netsosial`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `id_agenda` int(5) NOT NULL,
  `tema` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tema_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `isi_agenda` text COLLATE latin1_general_ci NOT NULL,
  `tempat` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `pengirim` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `tgl_posting` date NOT NULL,
  `jam` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `dibaca` int(5) NOT NULL DEFAULT '1',
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`id_agenda`, `tema`, `tema_seo`, `isi_agenda`, `tempat`, `pengirim`, `gambar`, `tgl_mulai`, `tgl_selesai`, `tgl_posting`, `jam`, `dibaca`, `username`) VALUES
(64, 'Elton John Greatest Hits Tour', 'elton-john-greatest-hits-tour', 'November ini,  Indonesia akan disuguhkan salah satu konser megah dari legenda musik dunia yaitu Elton John. Penampilan Elton John yang pertama kalinya di Indonesia akan berlangsung pada 17 November 2012, di  Sentul International Convention Center, Bogor yang lokasinya tidak begitu jauh dari Jakarta.<br />\\r\\n<br />\\r\\nKonser Elton John ini merupakan bagian dari tur dunianya yang bertajuk “Greatest Hits Tour” dan akan dimulai pada awal November dari Latvia sampai ke Australia. Elton John akan membawa band lamanya yang terdiri dari Davey Johnstone, Nigel Olsson, Robert Birch, Kim Bullard dan John Mahon, dan empat backing vocal yaitu Rose  Batu (Sly dan The Family Stone), Lisa Bank, Tata Vega, dan Jean Witherspoon.\\r\\n', 'Sentul International Convention Center', 'Muhammad Akbar', '510070sc-elton.jpg', '2016-06-17', '2016-06-17', '2012-08-20', '20:00 - 22:00 Wib', 1, 'admin'),
(62, 'Maroon Live in Jakarta 2012', 'maroon-live-in-jakarta-2012', 'Maroon 5 akan kembali menghibur penggemar Jakarta mereka dengan sebuah konser pada 5 Oktober 2012 di Istora Senayan, Jakarta. Ini akan menjadi penampilan kedua mereka di tanah air setelah tampil pada konser sold out 27 April 2011 lalu. Grup musik beraliran pop rock yang berasal dari Los Angeles, California Amerika Serikat. Rencananya menggelar konsernya pada 5 Oktober 2012, di Istora Senayan, Jakarta. Java Musikindo selaku promotor telah mengumumkan pembagian kelas serta harga tiket konser. Band yang digawangi oleh Adam Levine (vokal/gitar), Jesse Carmichael (keyboard/gitar),Mickey Madden (bass), James Valentine (gitar), Matt Flynn (drum) ini menggelar konser di Jakarta sebagai bagian dari promo album barunya, Overexposed, yang dirilis Juni lalu.\\r\\n', 'Istora Senayan Jakarta', 'Willy Fernando', '209930maroon_live_in_jakarta_2012.jpg', '2016-10-05', '2016-10-05', '2012-08-19', '08:00 - 18:00 Wib', 0, 'admin'),
(63, 'Festival Musik Bambu Nusantara 2012', 'festival-musik-bambu-nusantara-2012', 'Bambu Nusantara ke-6 tahun ini akan digelar di Jakarta Convention Center (JCC), di Jalan Jenderal Gatot Subroto, Jakarta, pada 1 - 2 September 2012. Acara tersebut akan menghadirkan beraneka kreasi berbahan bambu dan tampilnya beragam seni dari bambu. Selain suguhan musik etnik berpadu dengan musik modern, dalam Acara ini juga akan turut diisi dengan pameran, seminar, merchandise, kuliner, dan fashion yang dipadu padankan dengan karya berbahan bambu.<br />\\r\\n', 'Jakarta Convention Center (JCC), Jakarta', 'Tommy Utama', '85235BambuNusantara2012.jpg', '2016-06-01', '2016-06-02', '2012-08-20', '09.00 - 21.00 Wib', 0, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(5) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `username` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `judul` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `sub_judul` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `youtube` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `judul_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `headline` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `utama` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `isi_berita` longtext CHARACTER SET latin1 NOT NULL,
  `keterangan_gambar` text COLLATE latin1_general_ci NOT NULL,
  `hari` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `dibaca` int(5) NOT NULL DEFAULT '1',
  `tag` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `status` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `premium` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `sumber_berita` text COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `id_kategori`, `username`, `judul`, `sub_judul`, `youtube`, `judul_seo`, `headline`, `aktif`, `utama`, `isi_berita`, `keterangan_gambar`, `hari`, `tanggal`, `jam`, `gambar`, `dibaca`, `tag`, `status`, `premium`, `sumber_berita`) VALUES
(598, 40, 'admin', 'Laksa Betawi yang Menggugah Selera', '', '', 'laksa-betawi-yang-menggugah-selera', 'N', 'N', 'N', 'Makanan khas betawi yang satu ini memang sudah agak jarang bisa ditemui. Namun bukan berarti punah. Di beberapa lokasi tertentu, anda masih bisa menemukan Laksa betawi. Bagi anda yang belum mengetahui apa itu Laksa Betawi, Laksa betawi adalah Penganan berjenis mie yang diberi bumbu. Laksa Betawi memiliki kuah berwarna kekuningan. Campuran udang rebon yang ada dalam kuah laksa, membuat rasanya menjadi segar dan di padu aroma khas udang.<br /><br />Selain itu, Makanan ini menggunakan Ketupat. Isi dari ketupat laksa betawi adalah irisan ketupat, telur, kemangi, tauge. kucai, bihun, perkedel, dan bawang goreng, serta kuahnya yang kental dengan taburan udang kering. Namun ada yang bilang bahwa Bihun dan perkedel hanya variasi tambahan dari laksa, bukan bawaan asli nya.<br /><br />Cara lain untuk menikmati Laksa adalah menggunakan Semur betawi. Paduan rasa manis pada semur, tentu nya akan menambah rasa gurih di lidah. Namun hal ini bukan suatu keharusan. Tergantung selera masing-masing.<br /><br />Cara mengolah Laksa Betawi<br /><br />Mengolah laksa betawi susah-susah gampang. Bumbunya sederhana, terdiri dari kunyit, lengkuas, sereh, daun salam, daun jeruk, jahe, jintan, lada, temu kunci, serta dua kilogram udang rebon. Semua bumbu dihaluskan dengan lumpang lalu ditumis dan dicampur dengan santan cair.<br /><br />Bumbu baru ditambahkan dengan santan kental. Proses ini dilakukan sampai tiga kali. Sejak dahulu hingga sekarang. Dengan proses yang agak rumit, tidak aneh kalau makanan ini jadi agak langka. Orang maunya langsung jadi tanpa memikirkan cara pembuatannya.<br /><br />', '', 'Kamis', '2012-10-25', '02:13:20', '', 14, 'kuliner', 'Y', 'N', ''),
(608, 39, 'admin', 'Bos Amazon Temukan Mesin Apollo 11', '', 'http://www.youtube.com/embed/mxMiN9iYlkQ', 'bos-amazon-temukan-mesin-apollo-11', 'N', 'N', 'N', 'Jeff Bezos, pendiri retailer online terbesar Amazon, mengumumkan bahwa ia dan timnya telah menemukan 5 mesin Apollo 11 yang jatuh pada tahun 1969 di Samudera Atlantik.<br /><br />Kini, Jeff Bezos merencanakan untuk mengangkat satu atau dua dari mesin tersebut ke permukaan untuk kemudian dipamerkan di Museum Penerbangan di kampung halamannya, Seattle. Sebelumnya, Jeff Bezos akan meminta izin terlebih dahulu kepada Nasa selaku pemilik dari Apollo 11.<br /><br />Seluruh biaya yang diperlukan dalam ekspedisi dan pengangkatan mesin Apollo 11 akan ditanggung oleh Jeff Bezos sendiri. Sementara itu, Nasa menyatakan akan menunggu kabar lebih lanjut tentang penemuan oleh tim Jeff Bezos tersebut.<br /><br />Mesin berkekuatan 32 juta tenaga kuda (hp) yang mampu membakar 6.000 pon kerosin dan oksigen cair per detik tersebut telah membawa Apollo 11 mendarat dengan sukses di bulan pada tahun 1969. Namun dalam perjalanan kembali ke bumi, mesin tersebut terbakar hingga terjatuh di Samudera Atlantik dan belum ditemukan hingga akhirnya Jeff Bezos mengumumkan berita ini.', '', 'Senin', '2012-11-19', '04:51:31', '', 74, 'internasional', 'Y', 'N', ''),
(611, 21, 'laura', 'Duel Swiss di Semifinal Cincinnati Masters', 'Tenis Cincinnati Masters 2012', '', 'duel-swiss-di-semifinal-cincinnati-masters', 'N', 'N', 'N', 'Cincinnati - Dua petenis asal Swiss berhasil mengempaskan lawan-lawannya dan akan bertemu di semifinal Cincinnati Masters. Stanislas Wawrinka sukses membungkam petenis Kanada, Milos Raonic, sementara Roger Federer berhasil menumbangkan Mardy Fish.<br />&nbsp;<br />Wawrinka mengalahkan Raonic dengan pertarungan sengit. Bahkan sebelumnya, petenis 27 tahun tersebut sempat tertinggal di set pertama. Pada set awal tersebut, Wawrinka takluk 2-6.<br />&nbsp;<br />Namun pada set kedua, Wawrinka mampu mengendalikan permainan, dia mampu mengembalikan dengan baik pukulan keras dari Raonic. Hingga akhirnya sukses merebut set kedua ini dengan skor 7-6.<br />&nbsp;<br />Setelah berhasil menyamakan keadaan, Wawrinka terus mendominasi dan mengakhiri perlawanan Raonic dengan skor akhir di set ketiga 6-4. &ldquo;Saya bermain hebat setelah menjalani dua bulan yang menyulitkan,&rdquo; ujar Wawrinka, seperti disitat Yahoo Sports, Sabtu (18/8/2012).<br />&nbsp;<br />Nantinya di babak semifinal, Wawrinka bakal menghadapi rekan senegaranya, Federer yang menghentikan langkah Fish dengan skor 6-3 7-6. Dengan gugurnya Fish atas Federer, maka tak ada satu pun petenis Amerika yang berpeluang menjadi juara di kandang sendiri.<br />', 'Stanislas Wawrinka.\r\n', 'Minggu', '2012-08-19', '05:22:25', '', 16, 'olahraga', 'N', 'N', ''),
(612, 19, 'laura', 'Google Pakai Motorola untuk Gugat Apple', '', '', 'google-pakai-motorola-untuk-gugat-apple', 'N', 'N', 'N', 'Jakarta - Perang gugatan antara para produsen smartphone belum menunjukkan tanda berakhir. Yang terbaru, Motorola menuding Apple melanggar tujuh patennya.<br /><br />Vendor ponsel yang diakuisisi Google pun meminta pihak berwewenang untuk memblokir impor iPhone, iPad dan komputer Mac. Perangkat-perangkat tersebut diminta dilarang beredar di Amerika Serikat.<br /><br />Komplain Motorola didaftarkan ke lembaga International Trade Comission (ITC). Paten yang dipermasalahkan terkait location reminders, notifikasi email, pemutar video dan sebagainya.<br /><br />&quot;Kami ingin menyelesaikan persoalan paten tersebut, namun ketidakmauan Apple untuk melisensinya membuat kami tidak punya pilihan selain mempertahankan inovasi kami,&quot; demikian pernyataan Motorola yang TerasJakarta kutip dari DigitalTrends, Minggu (19/8/2012).<br /><br />Hal ini dinilai sebagai perang antara Google dan Apple, dengan Google menggunakan paten Motorola untuk menyerang Apple. Terlebih lagi, Apple banyak memperkarakan vendor Android seperti Samsung dan juga Motorola sendiri.', '', 'Senin', '2012-08-20', '04:49:48', '', 15, 'teknologi', 'Y', 'N', ''),
(614, 48, 'admin', 'Zuckerberg akan Berhenti Pimpin Facebook?', 'Buntut Anjloknya di Bursa Saham', '', 'zuckerberg-akan-berhenti-pimpin-facebook', 'N', 'N', 'Y', 'Jakarta - Harga saham Facebook terus terjun bebas. Rekor harga terendah terjadi baru-baru ini senilai USD 19,06 dari harga awalnya USD 38. Buruknya performa saham Facebook ini memunculkan spekulasi bahwa Mark Zuckerberg tidak seharusnya terus memimpin Facebook sebagai CEO.<br /><br />Seorang analis industri menilai bahwa Zuckerberg yang dikenal dengan dandanan kasualnya bisa fokus pada urusan teknologi di Facebook. Sedangkan bisnis Facebook dipegang oleh orang yang benar-benar kompeten.<br /><br />&quot;Saya pikir ada rasa kurang percaya terhadap kemampuannya untuk menjalankan korporasi,&quot; kata Andre Stoltman, pengacara sekuritas di New York yang TerasJakarta kutip dari ComputerWorld, Minggu (19/8/2012).<br /><br />&quot;Zuckerberg, dipandang dari sisi manapun memang adalah orang yang jenius. Akan tetapi Anda seharusnya memiliki chief executive yang dewasa dan lebih berpengalaman dalam menjalankan perusahaan tersebut,&quot; imbuhnya.<br /><br />Namun demikian, Zuckerberg tetap punya dukungan untuk terus memimpin Facebook. Patrik Moorhead, analis di Moor Insights &amp; Strategy, menyatakan masih terlalu awal untuk membicarakan kemungkinan pergantian CEO Facebook.<br /><br />&quot;Dia telah menyediakan visi yang diperlukan Facebook untuk menjadi sebesar sekarang dan mereka tetap akan membutuhkan dia sebagai pemandu. Zuckerberg harus tetap ada di posisi top sekarang,&quot; kata Patrik.<br /><br />Karten Weide selaku analis di IDC menyatakan pula bahwa Zuckerberg tidak akan memberi kesempatan pada orang lain untuk memimpin perusahaan yang didirikannya itu.<br /><br />&quot;Mark Zuckerberg tidak akan lengser dalam waktu dekat. Dia adalah pria dalam sebuah misi, yaitu ingin memaksa dunia, jika perlu, agar lebih terbuka. Dan sebagai pria dalam sebuah misi, dia tidak mengutamakan soal bisnis,&quot; demikian pendapat Karten.<br />', '<font face="Verdana, Arial, Helvetica, sans-serif" color="#000000">Mark Zuckerberg</font>\r\n', 'Jumat', '2012-11-02', '04:59:50', '', 37, 'teknologi', 'Y', 'N', ''),
(610, 21, 'dewi', 'Max Biaggi Bantah ke Ducati Musim Depan ', '', '', 'max-biaggi-bantah-ke-ducati-musim-depan-', 'N', 'N', 'Y', 'Roma- Mantan pembalap MotoGP Max Biaggi tengah menikmati kariernya di World Super Bike (WSBK). Terlebih, pencapaiannya di musim ini cukup membuatnya bahagia.<br /><br />Biaggi masih memimpin di puncak klasemen WSBK musim ini dengan 272 poin. Hasil ini membuatnya semakin bersemangat untuk menorehkan lagi prestasi juara seperti yang ditorehkannya pada 2010.<br /><br />Situasi seperti itu, semakin membuat The Roman Emperor, julukan Biaggi, nyaman membela timnya Aprilia. Makanya, saat disinggung masalah isu kepindahannya ke Ducati musim depan, Biaggi buru-buru membantah. Dia menegaskan ingin mengakhiri kariernya bersama Aprilia.<br /><br />Setelah empat tahun melanglang buana di ajang MotoGP dengan prestasi terbaik menjadi runner-up pada musim pertamanya bersama Yamaha, Biaggi memutuskan hengkang pada 2005. Dua tahun berikutnya, pembalap kelahiran Juni 1971 ini terjun ke arena WSBK.<br /><br />Sebelum berlabuh di Aprilia, Biaggi lebih dulu bergabung dengan Suzuki di tahun pertamanya, dan setahun berikutnya ke Ducati sebelum akhirnya melompat ke Aprilia pada 2009.', 'Max Biaggi.\r\n', 'Minggu', '2012-08-19', '05:13:20', '', 20, 'olahraga', 'N', 'N', ''),
(615, 21, 'dewi', 'Foto Panas Beredar Lagi, Nikita Mirzani Syok', '', '', 'foto-panas-beredar-lagi-nikita-mirzani-syok', 'N', 'N', 'Y', 'Jakarta - Nama Nikita Mirzani memang sedang naik daun belakangan ini. Dengan keberaniannya dalam menampilkan lekuk tubuhnya di beberapa film yang diperaninya, dirinya pun sempat didaulat dengan predikat sebagai salah satu artis hot tanah air.<br /><br />Namun, keberaniannya tersebut ternyata harus seiring dengan pil pahit yang ditelannya. Beberapa waktu lalu, foto topless dirinya sempat beredar luas di dunia maya. Dan kini, kembali foto-foto yang memperlihatkan kenekatannya di depan kamera dipertontonkan.<br /><br />Dalam foto-foto ini, Nikita hanya menutupi payudaranya dengan jari ataupun rambutnya, tanpa mengenakan sehelai baju pun. Saat dikonfirmasi, Nikita mengaku syok.<br /><br />&quot;Gue syok. Gak tahu mau ngomong apa lagi. Itu foto emang udah lama banget,&quot; tuturnya, Rabu (15/8).<br /><br />Artis yang sempat mengisi program Kakek Kakek Narsis di Trans TV ini belum mau memberikan konfirmasi lebih. Dirinya masih mencari ketenangan atas musibah yang menimpanya untuk ke sekian kali.<br /><br />&quot;Gak bisa mikir. Mau ngomong apa. Kasih nafas dulu, kasih gue ketenangan. Ya Tuhan, ada aja musibah menimpa hidup gue. Pokoknya maaf gak bisa ngomong banyak,&quot; tukasnya.', 'Nikita Mirzani \r\n', 'Senin', '2012-08-20', '05:24:44', '', 25, 'hiburan,selebritis', 'Y', 'N', ''),
(613, 19, 'admin', 'Lenovo Yakin Kalahkan Microsoft Surface', '', '', 'lenovo-yakin-kalahkan-microsoft-surface', 'N', 'N', 'N', 'Jakarta - Microsoft akan menjual tablet produksi sendiri yang bernama Surface. Beberapa mitra produsen PC kabarnya tak senang dengan kehadiran Surface yang dianggap sebagai pesaing. Namun Lenovo percaya diri tablet buatannya akan mampu mengalahkan Surface.<br /><br />&quot;Microsoft memang kuat di software, namun saya tidak percaya mereka bisa menyediakan hardware terbaik di dunia. Sedangkan Lenovo bisa,&quot; klaim CEO Lenovo, Yang Yuanqing.<br /><br />&quot;Meskipun kami tidak suka Microsoft membuat hardware, namun meskipun mereka memulai bisnis hardware ini, kami pikir itu hanya berarti satu kompetitor bertambah lagi,&quot; imbuhnya, yang TerasJakarta kutip dari ComputerWorld, Minggu (19/8/2012).<br /><br />Sebelumnya, kehadiran Microsoft Surface mendapat perlawanan dari Acer. Vendor komputer asal Taiwan itu menyatakan bahwa kedatangan Surface akan berdampak negatif bagi ekosistem industri PC.<br /><br />Di masa lalu, Microsoft memang selalu bermitra dengan vendor PC untuk membuat komputer berbasis sistem operasi Windows. Namun untuk Windows 8, mereka memutuskan membuat tablet PC sendiri.<br /><br />Bahkan, ada kabar yang beredar bahwa Surface akan dijual hanya USD 199. Jika benar, bisa jadi Surface sukses besar mengingat harganya yang sangat terjangkau. Kabarnya, Surface akan dipasarkan sekitar bulan Oktober mendatang, bersamaan dengan perkenalan resmi OS Windows 8.', '', 'Senin', '2012-08-20', '04:53:44', '', 14, 'teknologi', 'Y', 'N', ''),
(617, 23, 'admin', '"Expendables 2" Impian Jean Claude Van Damme', '', 'http://www.youtube.com/embed/7rkdTcQLwZ4', 'expendables-2-impian-jean-claude-van-damme', 'N', 'N', 'N', 'Peran dalam Expendables 2 telah lama diinginkan oleh Jean-Claude Van Damme. Pasalnya aktor laga yang satu ini punya impian untuk bermain bersama Arnold Schwarzenegger, Sylvester Stallone dan Bruce Willis.<br /><br />Van Damme yang memerankan si jahat Jean Vilain dalam Expendables 2 mengungkap kepada PostMedia bahwa kesempatan yang didapat untuk bermain bersama kedua aktor idamannya itu sangatlah berharga.<br /><br />&quot;Aku selalu berharap untuk bisa membuat film bersama salah satu dari mereka. Kini aku bermain film bersama keduanya,&quot; ungkapnya. Ahli bela diri asal Belgia ini juga mengaku kagum dengan dedikasi Stallone dalam membuat film laga spektakuler ini (Expendables).<br /><br />&quot;Aku melihat pria dengan usia lebih dari 60 dan ia masih bisa menikmati apa yang ia lakukan. Aku bahagia kembali, ia (Stallone) membuatku cinta kepada film lagi,&quot; komentarnya.<br /><br />Seperti filmnya yang pertama, The Expendables 2 sudah pasti menyajikan baku hantam, adegan tembak-menembak yang intens, serta ledakan di mana-mana. Itulah alasan mengapa The Expendables 2 dibuat, supaya adrenalin penonton terpacu.', 'Jean-Claude Van Damme.\r\n', 'Senin', '2012-08-20', '05:47:30', '', 23, 'film,hiburan', 'Y', 'N', ''),
(616, 21, 'admin', 'Nyanyikan Anti Putin, Personel Pussy Riot Dibui', '', '', 'nyanyikan-anti-putin-personel-pussy-riot-dibui', 'N', 'N', 'N', 'Rusia - Pengadilan Rusia memvonis penjara dua tahun personel band Pussy Riot karena menyanyikan lagu anti Presiden Vladimir Putin.<br /><br />Pengadilan menetapkan tiga anggota band itu bersalah melakukan &#39;hooliganisme&#39; dengan motivasi agama.<br />&nbsp;<br />Hakim Marina Syrova mengatakan para anggota band &quot;secara berhati-hati merencanakan&quot; nyanyian mereka tanggal 21 Februari lalu di dalam katedral di Moskow. &quot;Tolokonnikova, Alyokhina dan Samutsevich melakukan &quot;hooliganisme&quot; -- dengan kata lain pelanggaran berat ketertiban umum,&quot; kata Syrova.<br /><br />&quot;Pengadilan menyatakan mereka bersalah. Pengadilan meraih putusan berdasarkan kesaksian terdakwa sendiri dan bukti lain,&quot; tambahnya.<br /><br />Jaksa menuntut hukuman tiga tahun penjara atas tiga anggota band itu.<br /><br />Para pendukung band itu melakukan protes di sejumlah tempat di Moskow.&nbsp; Keamanan ketat pun diterapkan dan sejumlah jalan ditutup.<br /><br />Pussy Riot mengecam kasus tersebut yang mereka katakan diorganisir Putin.<br /><br /><strong>Buat Marah Gereja</strong><br /><br />Sejumah selebriti termasuk bintang pop Amerika, Madonna, menyerukan agar mereka dibebaskan.<br /><br />Ketiga anggota band itu mengatakan &quot;doa punk&quot; mereka adalah tindak politik untuk memprotes gereja ortodoks Rusia yang mendukung Presiden Putin.<br /><br />Dalam penampilan seronok mereka di dekat altar mereka meminta Bunda Maria untuk &quot;menggeser Putin&quot;.<br /><br />Nyanyian mereka membuat marah gereja Ortodoks dan ketua gereka Kirill menyebutkan penampilan itu sama saja dengan penghujatan agama. Namun sejumlah warga Rusia menganggap kasus itu sebagai upaya pemerintah membungkam kritikan.', '<span class="judul judul_artikel2011">Pussy Riot. </span>\r\n', 'Senin', '2012-08-20', '05:30:13', '', 17, 'hiburan,musik', 'Y', 'N', ''),
(619, 31, 'admin', '4 Alasan Kenapa Memaafkan Penting Bagi Kesehatan', '', '', '4-alasan-kenapa-memaafkan-penting-bagi-kesehatan', 'N', 'N', 'N', 'Jakarta - Memaafkan bukan berarti melupakan, tapi memberi kesempatan kepada diri sendiri untuk menghapus rasa kesal dan dendam terhadap orang lain. Dengan demikian, rasa marah dan tekanan yang mengganggu emosi pun dapat diredakan. Akibatnya, pikiran jadi lebih tenang dan jauh dari stres. Sejatinya, tak hanya itu saja manfaat kesehatan dari memaafkan orang lain.<br /><br />Secara ilmiah, memaafkan kesalahan orang lain dapat bermanfaat baik bagi kesehatan fisik maupun mental. Secara sosial, memaafkan orang lain merupakan wujud kebesaran jiwa dan perilaku yang dianggap baik. Ada banyak manfaat kesehatan dari memaafkan orang lain seperti dilansir Mayo Clinic dan Telegraph, Minggu (19/8/2012) antara lain:<br /><br /><strong>1. Terhindar dari Penyakit Tekanan Darah Tinggi</strong><br />Para peneliti dari University of California, San Diego menemukan bahwa orang-orang yang bisa melepaskan kemarahannya dan memaafkan kesalahan orang lain cenderung lebih rendah risikonya mengalami lonjakan tekanan darah.<br /><br />Peneliti meminta lebih dari 200 relawan untuk memikirkan saat temannya menyinggung perasaan. Setengah dari kelompok diperintahkan untuk berpikir mengapa hal tersebut bisa membuatnya marah, sedangkan yang lainnya didorong untuk memaafkan kesalahan tersebut. Peneliti menemukan bahwa orang yang marah mengalami peningkatan tekanan darah lebih besar dibanding orang yang pemaaf.<br /><strong><br />2. Terhindar dari Risiko Penyalahgunaan Obat dan Alkohol</strong><br />Sejumlah penelitian telah membuktikan bahwa rasa benci, dendam dan permusuhan dapat memicu tekanan darah tinggi. Stres muncul ketika perasaan kecewa atau tersakiti. Memaafkan adalah sebuah proses perdamaian dengan diri sendiri. Seseorang yang memberi maaf justru akan merasa lebih rileks untuk menerima kondisinya.<br /><br />Dengan kondisi mental yang lebih rileks, seseorang juga akan terhindar dari risiko penyalahgunaan alkohol dan obat terlarang. Risiko tersebut umumnya dihadapi oleh para pendendam yang membutuhkan jalan pintas untuk lepas dari beban emosi negatifnya.<br /><br /><strong>3. Menurunkan Risiko Serangan Jantung</strong><br />Para ilmuwan membuktikan bahwa permintaan maaf yang ditujukan pada seseorang bisa meningkatkan kesehatan jantungnya. Orang yang mengalami perlakuan kasar akan mengalami peningkatan tekanan darah yang dapat memicu serangan jantung atau stroke. Namun ketika mendengarkan kata &#39;maaf&#39;, tekanan darah akan menurun kembali.<br /><br />Tekanan darah yang diukur dalam penelitian adalah tekanan darah diastolik, yaitu tekanan dalam darah antara detak jantung atau tekanan dalam arteri-arteri ketika jantung istirahat setelah kontraksi. Jika terlalu tinggi atau terjadi untuk waktu yang lama, dapat meningkatkan kemungkinan stroke atau serangan jantung.<br /><br /><strong>4. Jauh dari Stres dan Depresi</strong><br />Sebuah penelitian yang dimuat Personality and Social Psychology Bulletin menemukan bahwa memafkan secara positif dapat mengurangi gejala depresi. Tak hanya itu, memaafkan akan mengembalikan pikiran positif, dan memperbaiki hubungan. Selain itu, memaafkan juga berkaitan dengan perilaku positif lain seperti sifat dermawan, murah hati dan tidak mudah tertekan.<br />', '', 'Sabtu', '2012-11-17', '08:14:51', '', 23, 'kesehatan', 'Y', 'N', ''),
(625, 41, 'admin', 'Effendi Ghazali: Putaran Kedua Pilkada DKI Ketat', '', '', 'effendi-ghazali-putaran-kedua-pilkada-dki-ketat', 'N', 'Y', 'N', 'Jakata - Pengamat politik dari Universitas Indonesia, Effendi Ghazali, mengungkapkan pada putaran kedua pemilihan kepala daerah (Pilkada) pada September mendatang, akan terjadi persaingan ketat antara pasangan Joko Widodo-Basuki T Purnaka dengan pasangan Fauzi Bowo-Nachrowi Ramli.<br /><br />&ldquo;Kami telah mengadakan survey internal, dan hasilnya, akan terjadi persaingan ketat antara Pak Jokowi dan Pak Fauzi Bowo. Tidak seperti hasil sebelumnya yang memang jauh jarak perolehannya,&rdquo; ujarnya ditemui di acara open house yang diadakan Gubernur Fauzi Bowo, di rumah dinasnya Jalan Taman Suropati No. 7, Jakarta Pusat, Minggu (19/08/2012).<br /><br />Meski demikian, Effendi urung menyebutkan nilai dari survey yang dilakukan oleh pihaknya, mengingat masih ada margin eror yang besar dari 450 responden yang dilakukan survey. &ldquo;Siapa yang lebih unggul, belum bisa saya kasih tahu sekarang, karena survey kami agak besar margin errornya,&rdquo; jelasnya.<br /><br />Menyinggung maraknya penggunaan isu SARA yang terjadi selama bulan ramadhan kemarin, Effendi angkat bicara. Menurutnya, penggunaan isu SARA yang dilakukan oleh pihak-pihak tertentu sudah menimbulkan dampak yang besar, baik di kalangan masyarakat bawah maupun untuk calon pasangan. &ldquo;Itu jelas ada dampaknya. Bahkan pengaruhnya cukup besar untuk pilkada putaran kedua nanti,&rdquo; tandasnya.', 'Joko Widodo (kiri), Fauzi Bowo (kanan)\r\n', 'Jumat', '2012-09-14', '10:42:25', '', 24, 'metropolitan', 'Y', 'N', ''),
(624, 41, 'admin', 'Tuntut THR, Ratusan Pekerja Transjakarta Mogok', '', '', 'tuntut-thr-ratusan-pekerja-transjakarta-mogok', 'N', 'N', 'N', 'Jakarta - Ratusan pekerja bus koridor I (Blok M-Kota) dan X (Cililitan-Tanjung Priok) mogok bekerja. pramudi, teknisi, dan petugas keamanan menuntut kenaikan upah dan pembayaran Tunjangan Hari Raya (THR). Mereka di depan Pool Pinang Ranti, Jalan Raya Pondok Gede, Pinang Ranti, Makassar, Jakarta Timur, sambil berorasi membentangkan spanduk bertemakan agar PT Jakarta Expres Trans (JET) membayar THR.<br /><br />Menurut&nbsp; pramudi Bus TransJakarta Koridor I, Maya, pihaknya terpaksa melakukan mogok operasi karena pihak perusahaan tidak membayarkan kewajibannya memberikan THR.<br /><br />&quot;Sementara, anak-anak sudah menunggu di rumah ingin jalan-jalan ke mal untuk beli baju Lebaran,&quot; ujarnya kepada wartawan, Senin (13/08/2012).<br /><br />Sedangkan Abdul Chakim berharap, selain memberikan THR perusahaan PT JET juga menaikan upah. Pasalnya, untuk Pramudi yang di bawah manajeman PT JET upahnya bervariasi mulai dari Rp2,4 juta-Rp2,8 juta. Sedangkan pramudi yang berada di bawah manajemen gajinya mencapai Rp5,3 juta.<br /><br />&quot;THR kami segera terbayar dan gaji kami dinaikkan sejajar dengan pramudi dari koridor lainnya,&quot; imbuhnya.<br /><br />Hingga bubar aksi berjalan berdamai, pihak perusahaan berjanji akan membayarka THR dan menaikan upah para pekerja bus Transjakarta.', '', 'Senin', '2012-08-20', '10:14:24', '', 63, 'metropolitan', 'Y', 'N', ''),
(622, 31, 'admin', 'Orang Beriman Kondisi Fisik n Mentalnya Lebih Sehat', '', '', 'orang-beriman-kondisi-fisik-n-mentalnya-lebih-sehat', 'N', 'N', 'N', '<p>Orang yang beriman disayang Tuhan, mungkin itulah sebabnya kemudian orang yang beriman juga memiliki kondisi kesehatan yang baik. Nyatanya, berbagai penelitian menunjukkan bahwa orang-orang yang memiliki keyakinan dan keimanan yang teguh juga memiliki kondisi fisik yang lebih prima.<br /> <br /> "Keyakinan terhadap agama bisa mengurangi stres, depresi, dan meningkatkan kualitas hidup," kata Dr Harold G. Koenig, profesor psikiatri dan ilmu perilaku di Duke University Medical Center seperti dilansir Medpagetoday.com, Minggu (19/8/2012).<br /> <br /> Data sebuah penelitian yang dimuat American Journal of Health Promotion tahun 2005 menyimpulkan bahwa orang yang banyak berdoa lebih banyak mendapat manfaat kesehatan dengan cara menerapkan perilaku yang sehat, menjalankan antisipasi terhadap penyakit dan lebih puas terhadap pelayanan kesehatan.<br /> <br /> Sebuah penelitian tahun 2006 yang dimuat British Medical Journal juga menemukan bahwa kehadiran dalam sebuah acara keagamaan ternyata berkaitan dengan penurunan risiko penyakit menular.<br /> <br /> Menurut Koenig, adanya keyakinan beragama dan kegiatan spiritual berhubungan dengan risiko penyakit atau gangguan kesehatan yang lebih rendah, misalnya stres, penyakit kardiovaskular, tekanan darah, reaktivitas kardiovaskular, gangguan metabolisme serta dapat menjamin keberhasilan operasi jantung. Namun di sisi lain, Koenig juga memperingatkan bahwa cara kerja Tuhan ini tidak dapat diukur dengan cara dan metode apapun.<br /> <br /> "Saya percaya bahwa doa efektif, tapi tidak berfungsi secara ilmiah dan tidak dapat diprediksi. Tidak ada alasan ilmiah atau teologis atas setiap efek dari keyakinan yang dapat dipelajari atau didokumentasi, seolah-olah Tuhan adalah bagian dari alam semesta yang dapat diprediksi. Ilmu pengetahuan tidak dirancang untuk membuktikan hal-hal yang supranatural," kata Koenig.<br /> <br /> Selain itu, keyakinan terhadap agama juga telah dikaitkan dengan umur panjang, perkembangan penyakit kognitif yang lebih lambat dan penuaan yang sehat. Senada dengan Koenig, dr Robert A. Hummer, profesor sosiologi di University of Texas di Austin yang berfokus pada hubungan antara agama dan rendahnya risiko kematian juga memiliki pendapat yang sama.<br /> <br /> Hummer merujuk sebuah penelitian yang melacak beberapa orang berusia 51 - 61 tahun selama 8 tahun untuk mendokumentasikan tingkat ketahanan hidupnya. Penelitian tersebut menemukan bahwa peserta yang tidak menghadiri acara keagamaan sama sekali memiliki kemungkinan 64 persen lebih tinggi mengalami kematian dibandingkan orang yang sering beribadah.</p>', '', 'Senin', '2012-08-20', '08:51:08', '', 26, 'kesehatan', 'Y', 'N', ''),
(623, 41, 'netipli', 'Mau jadi Megapolitan atau Megapelitan?', '', '', 'mau-jadi-megapolitan-atau-megapelitan', 'N', 'N', 'N', 'Jakarta - Peneliti bidang perkotaan Yayat Supriatna menilai konsep megapolitan dengan Jakarta sebagai pusatnya sudah semestinya diterapkan.<br /><br />Namun, sebagai inti kawasan dengan dukungan kekuatan pendanaan yang lebih besar, pemerintah Jakarta terkesan enggan berbagi madu dengan wilayah-wilayah pendukungnya.<br /><br />Yayat lantas menyindir sikap pemerintah Jakarta yang dipandangnya terlampau pelit terhadap pemerintah di daerah pendukung.<br /><br />&quot;Sebenarnya mau jadi megapolitan atau megapelitan. Kalau untuk mengatasi banjir di Jakarta lalu dengan pembangunan waduk di hilir, Kabupaten Bogor, kenapa cuma kasih dana hibah Rp 5 miliar?&quot; sindir Yayat saat menjadi pembicara dalam seminar manajemen perkotaan di Kampus Pascasarjana Universitas Mercu Buana.<br /><br />Jumlah tersebut menurut Yayat terlalu kecil untuk mengongkosi pembangunan waduk untuk menyalurkan air Sungai Ciliwung.<br /><br />Dana yang dimiliki Pemprov DKI sendiri jauh lebih besar, selain memiliki kemampuan untuk memperoleh sumber dana tambahan.<br /><br />&quot;Apalagi kerugian yang diakibatkan oleh banjir di Jakarta jauh lebih besar dari nilai Rp 5 miliar,&quot; imbuh Yayat.<br /><br />Peneliti dari Universitas Trisakti ini menyebutkan, harus ada kompensasi yang dikeluarkan Jakarta untuk mengatasi persoalan-persoalan kota jika ingin bekerja sama dengan daerah pendukung. Untuk itu, sangat tidak beralasan bila pemerintah Jakarta terlalu irit dalam soal kompensasi antarwilayah.<br /><br />&quot;Wajar jika Pemerintah Bogor, misalnya, tidak siap membangun waduk. Ya, karena kompensasinya terlalu kecil,&quot; tandas Yayat.<br /><br />Ia berharap, pemerintah Jakarta pada periode mendatang lebih mampu membangun sinergi dengan wilayah sekitarnya dan tidak arogan sebagai Ibu Kota negara.<br /><br />&quot;Jakarta tidak bisa menyelesaikan problem-problemnya sendirian. Jakarta butuh bantuan dari kawasan penyangga baik untuk atasi banjir, transportasi, pemukiman hingga sumber daya manusianya,&quot; pungkas Yayat.<br />', '', 'Selasa', '2012-10-02', '10:02:51', '', 27, 'metropolitan', 'Y', 'N', ''),
(644, 41, 'admin', '"Banjir Jakarta" Paling Dicari di Google', 'Jakarta Darurat Banjir', '', 'banjir-jakarta-paling-dicari-di-google', 'N', 'Y', 'N', '<p>Jakarta - Banjir yang mengguyur Jakarta beberapa hari lalu membuat sejumlah lokasi di ibukota banjir. Internet, jadi media yang digunakan warga Jakarta untuk mencari tahu informasi terkini seputar banjir. &nbsp;</p><p>Dalam laporan Pencarian Terhangat Google Indonesia sepanjang 11 - 17 Januari 2013, kata kunci &quot;Banjir di Jakarta&quot; adalah yang paling banyak dimasukkan dalam mesin pencari Google.</p><p>Tak hanya mesin pencari, beberapa platform milik Google juga digunakan untuk memberi informasi seputar banjir. Ada Google Crisis Response, yang menyajikan informasi lokasi-lokasi banjir di Jakarta. Bahkan, layanan ini juga memperlihatkan kondisi lalu lintas yang macet akibat banjir.</p><p>Di dalam Google Crisis Response juga terdapat beberapa nomor telepon penting dari lembaga pemerintah DKI Jakarta maupun swadaya masyarakat, yang dapat dihubungi oleh warga untuk mendapat bantuan dan evakuasi.</p><p>Selain layanan Google, jejaring sosial Twitter juga banyak digunakan untuk mencari informasi terkini. Beberapa akun Twitter yang memberi informasi banjir antara lain @TMCPoldaMetro dan @LewatMana.</p><p>Situs web pemberi informasi lalu lintas LewatMana.com juga laris dikunjungi dalam sepekan ini. LewatMana memperlihatkan kondisi lalu lintas dan gambar dari CCTV. Ia menduduki peringkat 10 Pencarian Terhangat Google Indonesia pada 11 - 17 Januari 2013.</p><p>Dalam sepekan ini, warga juga ingin tahu soal perkiraan cuaca dengan memasukkan kata kunci BMKG di mesin pencari Google. BMKG (Badan Meteorologi Klimatologi dan Geofisika) masuk ke posisi 9 sebagai topik yang paling dicari di Google Indonesia pekan ini. (Sumber: kompas.com)</p>', '', 'Senin', '2013-01-21', '09:46:27', '', 31, 'nasional', 'Y', 'N', ''),
(645, 48, 'admin', 'Korban dan Pelaku Pemerkosaan parah', 'Seleksi Calon Hakim Agung', '', 'korban-dan-pelaku-pemerkosaan-saling-menikmati', 'N', 'N', 'Y', '<p>Calon hakim agung Muhammad Daming Sanusi menyatakan, hukuman mati tidak layak diberlakukan bagi pelaku pemerkosaan. Penjelasannya soal ini mengundang tawa sejumlah anggota Komisi III saat berlangsung fit and proper test hakim agung di Komisi III DPR pada Senin (14/1/2013) ini.</p><p>&quot;Bagaimana menurut Anda, apabila kasus perkosaan ini dibuat menjadi hukuman mati?&quot; tanya anggota Komisi III dari Fraksi PAN, Andi Azhar, ketika itu kepada Daming.</p><p>Daming menjawab, &quot;Yang diperkosa dengan yang memerkosa ini sama-sama menikmati. Jadi, harus pikir-pikir terhadap hukuman mati.&quot;</p><p>Jawaban Daming ini pun langsung mengundang tawa, tetapi tidak sedikit yang mencibir pernyataannya. Dijumpai seusai menjalani fit and proper test, Daming berdalih bahwa pernyataannya itu hanya untuk mencairkan suasana.</p><p>&quot;Kita tadi terlalu tegang, jadi supaya tidak terlalu tegang,&quot; imbuhnya.</p><p>Menurut Daming, hukuman mati harus dipertimbangkan baik-baik. Ia beralasan, dirinya belum memberikan jawaban tegas apakah ia mendukung atau tidak penerapan hukuman mati bagi pelaku pemerkosaan. &quot;Tentu kita harus pertimbangkan baik-baik kasus tertentu, seperti narkoba, korupsi, saya setuju. Tapi untuk kasus pemerkosan, harus dipertimbangkan dulu. Tadi saya belum memberikan jawaban yang tegas,&quot; kata Daming.</p><p>Menanggapi pernyataan itu, anggota Komisi III lain dari Fraksi Partai Demokrat, Himmatul Aliya Setiawati, menilai candaan Daming sangat tidak pantas.</p><p>&quot;Saya kira candaannya tidak pas. Saya setuju ada hukuman mati ya,&quot; ucap Aliya.</p><p>Meski menganggap tak pantas, ia menilai jawaban Daming sudah memenuhi kriteria yang diharapkan dari seorang hakim agung. &quot;Dari Fraksi Gerindra menyatakan tidak akan memilih, tapi kalau saya sih soal memilih kita lihat nilai-nilai keseluruhannya,&quot; tutur Aliya. (Sumber: kompas.com</p>', '', 'Senin', '2013-01-21', '15:59:46', '', 53, 'hukum', 'Y', 'N', ''),
(602, 2, 'admin', 'La Nyalla Kembalikan Riedl Jadi Pelatih Timnas', '', '', 'la-nyalla-kembalikan-riedl-jadi-pelatih-timnas', 'Y', 'N', 'N', 'Jakarta - Jakarta - Setelah membentuk Timnas, PSSI versi KLB pimpinan La Nyalla Mahmud Matalitti menunjuk Alfred Riedl sebagai pelatihnya.<br /><br />Pria asal Austria itu sebelumnya pernah menukangi Timnas, namun dipecat pada 13 Juli 2011 akibat kisruh ditubuh PSSI. Dengan penunjukan itu, berarti Riedl akan kembali jadi peramu permainan skuad &#39;Pasukan Garuda&#39; jelang Piala AFF di Malaysia, November mendatang. <br /><br />Menurut Acting Sekjen PSSI Tigor Shalom Boboy,&nbsp; Riedl ditunjuk oleh Direktur Teknik Timnas Benny Dollo yang sebelumnya diberi mandat oleh PSSI&nbsp; Rabu (8/8/2012) lalu. <br /><br />&quot;Benny Dollo telah memberikan rekomendasinya terkait posisi pelatih kepala tim nasional senior kepada Exco PSSI melalui Ketua Umum La Nyalla Mahmud Mattalitti. Posisi pelatih kepala tim nasional senior yg direkomendasikan oleh Benny Dollo selaku Direktur Teknik adalah Alfred Riedl,&quot; ujar Tigor melalui rilis yang diterima INILAH.COM, Kamis (16/8/2012).<br /><br />Tigor mengungkapkan bahwa Riedl sudah menyatakan kesediaannya terhadap penunjukannya sebagai pelatih kepala tim nasional senior. Pria 62 tahun itu akan&nbsp; tiba di Indonesia pada akhir Agustus 2012.<br /><br />Setelah itu, Riedl akan langsung menyusun nama-nama siapa saja yang akan masuk dalam tim besutannya.<br /><br />&quot;Susunan Managemen dan Official serta pemain Tim Nasional akan diumumkan pasca lebaran menunggu konfirmasi pelatih kepala Alfred Riedl,&quot; tukas Tigor.<br /><br />Sebelumnya, pihak PSSI KLB pimpinan La Nyalla menyatakan membentuk Timnas sendiri setelah mandegnya pertemuan Joint Committee PSSI. Menurut pihak La Nyalla, seharusnya pembentukan Timnas dibahas di komite bersama tersebut melibatkan dua belah pihak, antara kubu Djohar Arifin dengan pihaknya.<br /><br />Piala AFF akan diselenggarakan 22 November hingga 22 Desember 2012 dengan tuan rumah Malaysia dan Thailand. Indonesia akan bermain di Grup B yang bertempat di Malaysia bersama Malaysia, Singapura dan Runner Up babak penyisihan.', '', 'Minggu', '2012-08-19', '03:19:23', '', 21, 'bola,olahraga', 'Y', 'N', ''),
(603, 36, 'laura', '4 Teknologi yang Bakal Bertahan Sampai 2030', '', '', '4-teknologi-yang-bakal-bertahan-sampai-2030', 'Y', 'Y', 'N', 'Perkembangan teknologi telah mengantarkan berbagai perangkat yang lebih kecil, cepat dan tangguh ke dalam genggaman tangan. Ada juga yang telah ditinggalkan atau digantikan teknologi lain, seperti sebuah floppy disk. &nbsp;<br />Selain teknologi yang ditiggalkan, ada juga beberapa teknologi yang diprediksi akan tetap bertahan sampai puluhan tahun ke depan. Seperti dilansir Live Science, Sabtu (18/8/2012), berikut empat teknologi yang diprediksi akan bertahan sampai 2030.<br /><br /><strong>1. Papan Ketik QWERTY</strong><br />Teknologi untuk melakukan input telah semakin banyak, ada voice recognition, handwriting recognition dan gesture control. Ini diperkiraka akan semakin akurat dan populer dalam dua dekade ke depan. Namun, sampai nanti ditemukan cara input teks menggunakan kendali pikiran, metode mengetik akan tetap sebuah metode menyusun teks yang paling akurat.<br />Kehadiran papan ketik di tablet dan telefon genggam memang semakin terancam, namun layout QWERTY yang sejak dulu digunakan akan terus hidup.<br /><br /><strong>2. PC</strong><br />Beberapa orang berpendapat kita sedang memasuki zaman pasca PC. Pasalnya kini orang semakin sering menghabiskan waktu menggunakan smartphone dan tablet ketimbang menggunakan komputer desktop tradisional berbasis Windows atau Mac.<br />Namun di sisi lain, ketika sudah waktunya menggarap pekerjaan yang benar-benar serius, terutama yang melibatkan multitasking, PC masih merupakan perangkat yang&nbsp; paling bisa diandalkan.<br />&nbsp;<br />Pada 2030, ukuran serta bentuk PC mungkin akan berubah. Beberapa orang bahkan berpendapat bahwa dengan adanya prosesor berotak empat, telefon genggam dan tablet menjelma menjadi PC. Tetap saja, apapun faktor yang mempengaruhi, pengguna yang fokus pada produktivitas akan membutuhkan sebuah komputer utama dengan kemampuan proses yang tinggi dan sanggup multitasking.<br />&nbsp;<br /><strong>3. USB Ports</strong><br />Sekarang telah lebih dari 15 tahun sejak USB pertama kali diperkenalkan dan kita akan sulit membayangkan hidup tanpa USB. Ini hampir menjadi sebuah standar untuk membuat Anda bisa menransfer data dan menghubungkan dengan berbagai hal seperti papan ketik atau harddisk eksternal. Beberapa orang berpendapat bahwa standar seperti Thunderbolt dari Intel akan menandingi USB, tapi mereka tidak memiliki dasar instalasi untuk menandingi USB. Standar ini diprediksi akan semakin berkembang ke depannya.<br /><strong><br />4. Uang Tunai</strong><br />Ada beberapa perdebatan mengenai apakah kartu kredit dan debit akan sepenuhnya digantikan oleh sistem pembayaran mobile dalam beberapa tahun ke depan. Walau bagaimanapun, uang tunai tampaknya akan tetap dibawa meski pada 2030.<br />&nbsp;<br />Pasalnya di era informasi ini, membayar dengan uang tunai adalah cara terbaik untuk membuat pembelian yang Anda lakukan tetap anonim dan pribadi. Selain itu, uang kertas memiliki perlindungan terbaik dalam melawan pencuri indentitas karena orang yang menerima pembayaran tidak harus mengetahui nama Anda.', '', 'Sabtu', '2012-11-17', '03:27:34', '', 21, 'teknologi', 'Y', 'N', ''),
(604, 19, 'admin', 'Usai China, Indonesia Tuan Rumah Miss World 2013', '', '', 'usai-china-indonesia-tuan-rumah-miss-world-2013', 'Y', 'N', 'N', 'Masyarakat Indonesia pantas bahagia dua kali lipat saat penyelenggaraan final Miss World 2012. Bukan saja prestasi Ines Putri yang masuk dalam jajaran 15 besar, tetapi Indonesia juga diumumkan menjadi lokasi penyelenggaraan Miss World 2013.<br />&nbsp;<br />Ajang Miss World 2012 di Ordos, Mongolia, China, berlangsung sukses. Diikuti 116 finalis dari seantero dunia, Miss World yang diselenggarakan ke-62 tahun ini akhirnya mendaulat Wenxia Yu sebagai Miss World 2012.<br /><br />Selama setahun, wakil dari Republik Rakyat China ini akan berkeliling dunia dan menjalankan misi sosial dalam program yang dikemas secara baik bernama Beauty with a Purpose.<br /><br />Adapun masa tugas terakhir dari pemilik tinggi badan 177 sentimeter ini akan dilakukan saat penyelenggaraan Miss World 2013 di Indonesia. Dan, kepastian soal lokasi penyelenggaraan Miss World dilakukan secara simbolis saat malam final Miss World 2012. Saat itu, Nana Putra, Managing Director MNC Group menerima bendera Miss World.<br /><br />Rencananya, Miss World 2013 diselenggarakan September dengan mengambil lokasi karantina di Bali. Sementara itu, Jakarta sebagai Ibu Kota Indonesia dipilih menjadi lokasi malam final Miss World 2013.<br /><br />&ldquo;Jakarta akan menjadi tuan rumah malam final Miss World 2013. Namun tepatnya di mana lokasi tersebut, kami belum bisa memastikan,&rdquo; tutur Kanti Mirdiati kepada Okezone di Blacksteer Lounge, Belleza Shopping Arcades, Permata Hijau, Jakarta, belum lama ini.<br /><br />Project Director Miss Indonesia &amp; Managing Director RCTI ini pun menjelaskan alasan Jakarta dipilih sebagai lokasi malam final Miss World 2013.<br /><br />&ldquo;Ini merupakan bagian dari upaya memperkenalkan Jakarta dan Indonesia sendiri ke mata dunia. Kebanyakan orang luar negeri tahu Bali, tapi tidak tahu kalau Bali ada di Indonesia. Mereka mengira bahwa Bali itu sebuah negara,&rdquo; ucap wanita ramah ini.', '', 'Minggu', '2012-08-19', '03:37:05', '', 25, 'internasional', 'Y', 'N', ''),
(605, 39, 'admin', 'Memalukan! Bu Guru di AS Bercinta dengan 4 Muridnya ', 'Didakwa Penyimpangan Seks', '', 'memalukan-bu-guru-di-as-bercinta-dengan-4-muridnya-', 'Y', 'N', 'N', 'Texas - Memalukan! Seorang guru SMA di Amerika Serikat diadili karena berhubungan seks dengan empat muridnya sementara murid kelima merekam aksi mesum tersebut.<br /><br />Wanita bernama Brittni Colleps tersebut dikenai sejumlah dakwaan, termasuk seks menyimpang dan hubungan tidak pantas antara pendidik dan pelajar.<br /><br />Wanita berumur 28 tahun itu tadinya merupakan guru Bahasa Inggris di SMA Fort Worth, Texas. Di persidangan yang digelar hari ini seperti dilansir MyFoxDFW.com, Kamis (16/8/2012), terungkap bahwa terdakwa yang telah memiliki tiga anak itu, menggunakan pesan-pesan SMS untuk mendekati kelima pelajar putra tersebut.<br /><br />Salah seorang remaja mengaku, dia dan Colleps berkirim 100 SMS dalam satu hari saat musim semi pada tahun 2010. Pesan-pesan itu kemudian kian menjadi-jadi sehingga akhirnya mereka sepakat untuk bertemu guna bercinta.<br /><br />&quot;Dia (Colleps) bilang dia mendambakan... bahwa saya punya sesuatu yang dia inginkan,&quot; kata remaja tersebut.<br /><br />Diungkapkan remaja laki-laki tersebut, dalam satu kesempatan, empat remaja berhubungan intim dengan bu guru yang telah dipecat tersebut. Para remaja tersebut sebenarnya sudah bisa digolongkan dewasa, namun hukum melindungi para pelajar dari hubungan dengan seseorang yang jabatannya lebih tinggi, dalam hal ini guru.<br /><br />Seorang remaja lainnya merekam adegan seks tersebut dengan video telepon genggamnya. Video tersebut diputar di persidangan.<br /><br />Jika terbukti bersalah, Colleps terancam hukuman penjara maksimum 20 tahun. Suaminya, Christopher Colleps, seorang tentara AS, telah menegaskan bahwa dirinya akan terus mendukung istrinya dan bahwa mereka akan tetap mempertahankan rumah tangga mereka.', 'Brittni Colleps (foto:abc)\r\n', 'Minggu', '2012-08-19', '04:20:50', '', 42, 'internasional', 'Y', 'N', ''),
(606, 42, 'admin', 'Astagfirullah, Festival Wine Digelar di Halaman Masjid ', '', '', 'astagfirullah-festival-wine-digelar-di-halaman-masjid-', 'N', 'N', 'N', 'Beer El-Sabe - Kelompok Muslim menyatakan kemarahannya atas rencana penyelenggaraan Festival Wine di kota Beer el-Sabe, Israel. Kemarahan karena, penyelenggaraan akan dilaksanakan di halaman luar sebuah bangunan bekas masjid kuno di wilayah tersebut.<br /><br />Menurut laporan media Israel, Gerakan Islam di Israel mengatakan festival ini merupakan &quot;dosa tak termaafkan&quot;. Festival juga dianggap sebagai pukulan keras bagi umat Muslim di sana Sebab menurut kelompok Muslim tersebut, publisitas festival anggur merupakan penghinaan terhadap sensitivitas Muslim. Seperti diketahui Islam melarang konsumsi alkohol.<br /><br />Festival &quot;Salut Wine dan Beer Festival&quot; ke enam ini rencananya akan diselenggarakan di pelataran sebuah bangunan bekas masjid di Beer el-Sabe, pada 5-6 September. Festival akan menampilkan minuman beralkohol dari sekitar 30 pabrik dan perkebunan anggur di seluruh negeri.<br /><br />Pusat Hukum untuk Hak Minoritas Arab di Israel, Kamis (16/8) lalu, mengirimkan surat pada Jaksa Agung, Menteri Kebudayaan dan Olahraga Israel serta Kotamadya Beer el-Sabe. Mereka menuntut agar festival Wine di wilayah tersebut dibatalkan. &quot; Penggunaan pelataran Masjid untuk festival minuman beralkohol adalah sesuatu yang sensitif. Sebab Islam melarang konsumsi alkohol dan tak sesuai dengan penggunaan masjid untuk beribadah,&quot; tulis organisasi tersebut dalam surat ke Jaksa Aram Mahameed.<br /><br />Surat juga menambahkan, Festival Wine melanggar keputusan Mahkamah Agung Israel yang keluar Juni 2011 lalu. Dalam keputusan tersebut memerintahkan masjid untuk diubah menjadi museum sejarah dan kebudayaan Islam.<br /><br />Masjid yang dibangun pada Era Usmani pada 1906 ini sempat menjadi tempat ibadah hingga 1948. Kemudian berubah menjadi penjara dan pengadilan hingga 1952. Lalu dari 1953-1991 dibuka sebagai Museum Tanah Negeb. Pada 2002 sempat ada sebuah petisi yang meminta masjid untuk dibuka kembali sebagai tempat ibadah.', '', 'Minggu', '2012-08-19', '04:32:25', '', 32, 'dunia-islam', 'Y', 'N', ''),
(607, 39, 'netipli', 'Moskow Larang Parade Gay Selama 100 Tahun', '', '', 'moskow-larang-parade-gay-selama-100-tahun', 'Y', 'Y', 'N', '<p>Pengadilan di Moskow mengukuhkan keputusan untuk melarang parade homoseksual untuk seratus tahun ke depan.<br /><br />Langkah ini dilakukan menyusul upaya pegiat hak homoseksual Rusia, Nikolay Alexeyev untuk membatalkan keputusan pemerintah kota melarang parade.<br /><br />Ia meminta hak melakukan parade selama 100 tahun ke depan.<br /><br />Alexeyev juga menentang larangan kota St Petersburgh untuk menyebarkan &quot;propaganda homoseksual.&quot;</p><p>Mahkamah hak asasi Eropa telah  meminta pemerintah Rusia untuk membayar kerugian kepada Alexeyev.</p><p>Alexeyev mengatakan Jumat (17/08) ia akan kembali ke Mahkamah Eropa untuk meminta agar menetapkan bahwa larangan itu tidak adil.</p><p>Pemerintah kota Moskow menyatakan parade gay akan menimbulkan risiko gangguan ketertiban umum.</p><p>Pemkot juga mengatakan sebagian besar warga Moskow menentang kegiatan itu.</p><p>Bulan September lalu, Dewan Eropa -pengawasan HAM di Eropa- akan meneliti tanggapan Rusia atas keputusan Mahkamah Eropa sebelumnya tentang hak gay, menurut media Rusia.</p><p>Bulan Oktober 2010, Mahkamah Eropa mengatakan Rusia melakukan diskriminasi terhadap Alexeyev karena orientasi seksualnya.</p><p>Mahkamah saat itu menangani larangan Moskow atas parade gay antara tahun 2006-2008.</p>', 'Nikolay Alexeye. \r\n', 'Sabtu', '2012-11-17', '04:43:57', '', 30, 'internasional', 'Y', 'N', ''),
(597, 36, 'admin', 'Pasar Tiban Kalibata Selalu Ramai Pengunjung', '', '', 'pasar-tiban-kalibata-selalu-ramai-pengunjung', 'Y', 'Y', 'N', 'Jakarta - Pasar tiban, atau pasar musiman, istilah untuk menjelaskan pasar yang musiman, tidak punya tempat menetap. Ada juga istilah pasar malam, pasar tumpah atau pasar kaget. Biasanya pasar ini mengambil waktu tertentu misalnya: bulan puasa, atau hari tertentu yang libur. Pasar tiban di Kalibata &lsquo;buka&rsquo; tiap hari minggu.<br /><br />Bermacam-macam barang dijajakan, mulai dari pakaian, mainan anak-anak, sepatu, tas, tanaman hias, jajan pasar, peralatan rumah tanggga, sprei, parfum, buku dan majalah bekas, pigura, dll. Semua dengan harga murah. Pasar ini mengambil tempat sepanjang jalan dari menuju Stasiun Kalibata sampai depan STEKPI, samping periumahan DPR RI Kalibata.<br /><br />Pasar ini awalnya tidak begitu ramai. Waktu itu setiap hari minggu di danau Taman Makam pahlawan (TMP) Kalibata banyak orang yang melakukan olah raga pagi. Muda-mudi paling banyak. Hukum ekonomi berjalan, di mana ada keramaian selalu ada yang menggunakan peluang. Maka ada orang jualan bubur ayam, lontong sayur, ketoprak dan lainnya. Mengambil tempat sempit di depan gerbang parkir TMP.<br /><br />Lama-lama ada yang berjualan pakaian, mainan, poster, dan lainnya. Semakin banyak yang berjualan dan mengambil tempat di sepanjang jalan depan TMP. Di sini mulai ada masalah, kemacetan. Mungkin karena pengunjung semakin banyak, membuat kemacetan, pasar &lsquo;dipindah&rsquo; ke dalam. Hingga sekarang. Sebenarnya tidak tahu dipindah atau pindah sendiri, mungkin pihak berwenang berprinsip, yang penting tidak mebuat jalan macet.<br /><br />Jadilah seperti sekarang, pasar tiban menjadi hiburan sendiri untuk warga Kalibata, Pancoran, Pasar minggu dan sekitarnya. Tempatnya yang relatif jauh dari jalan raya, masih hijau, memang enak buat jalan-jalan. Setelah lelah jalan-jalan melihat-lihat barang, tersedia berbagai warung yang meyediakan berbagai menu, tinggal pilih: Nasi uduk, lontong sayur, nasi rames, mendowan, bubur ayam, pecel lele, warung Padang, warung Sunda. Juga minuman, ada es tebu, Es Teh, es buah.<br /><br />Penasaran, sempatkan hari muingggu ke Kalibata. Tersedia angkutan dari berbagai arah: Dari Blok M, naik Kopaja 57, Dari Cililitan kopaja 57/ Metrimini 64, dari Kampung melayu dan Pasar Minggu naik M16, dari Manggarai naik Metromini 62. Jangan lupa ajak keluarga, sekalian makan bersama di hari Minggu.<br />', '', 'Minggu', '2012-08-19', '01:54:07', '', 28, 'wisata', 'Y', 'N', ''),
(627, 36, 'laura', 'Nikmatnya Bubur Ayam Cikini', '', '', 'nikmatnya-bubur-ayam-cikini', 'N', 'N', 'N', 'Jakarta - Jika Anda pecinta kuliner Bubur, pasti sudah mengenal Bubur Cikini H. Sulaiman. Bubur yang satu ini memang terbilang populer di Jakarta. Kabarnya bubur ini didirikan sejak tahun 1980-an. Bisa bertahan sampai sekarang tentu merupakan jaminan tersendiri. Kualitas rasa adalah modal utama sebuah usaha kuliner selalu diterima konsumen. Bubur Cikini H. Sulaiman memiliki hal tersebut.<br /><br />Dahulu Bubur Cikini H. Sulaiman bisa dijumpai di tenda kaki lima. Jam operasional juga dimulai sekitar jam 6 sore hari. Namun kini Bubur Cikini H. Sulaiman telah memiliki tempat permanen yang lebih nyaman. Jam operasional juga berubah. Kini Bubur Cikini juga bisa dinikmati di pagi hari. Bagi yang suka menu bubur untuk sarapan, jangan sampai melewatkan Bubur Cikini.<br /><br />Soal menu, Bubur Cikini H. Sulaiman tentu menyajikan menu bubur sebagai sajian utama. Menu yang bisa dicicipi antara lain Bubur Ayam Biasa, Bubur Ayam Telur, Nasi Goreng Ayam, Nasi Goreng Otokwok, Mie Goreng/Rebus, Telur Goreng, Empal Gentong Nasi/Lontong, Ati Ampela, aneka minuman dan masih banyak lagi lainnya. Jika Ingin menikmati empal Gentong Nasi/Lontong harus datang di hari Sabtu atau Minggu sebab menu tersebut tidak tersedia setiap harinya.<br /><br />Soal harga memang fluktuatif. Bisa berubah kapanpun. Tetapi sebagai deskripsi harga, seporsi Bubur Ayam Biasa bisa dinikmati dengan harga Rp.13.000 per porsi, menu Bubur Telur juga di harga yang sama. Untuk Nasi Goreng Ayam bisa dinikmati dengan membayar Rp.15.000, sedangkan Nasi Goreng Otokwok bisa dinikmati dengan harga Rp,17.000. Bagi yang menyukai menu Empal Gentong Nasi/Lontong bisa dicicipi dengan membayar Rp.20.000 per porsi. Cukup murah!', '', 'Selasa', '2012-08-21', '13:55:20', '', 29, 'kuliner', 'Y', 'N', '');
INSERT INTO `berita` (`id_berita`, `id_kategori`, `username`, `judul`, `sub_judul`, `youtube`, `judul_seo`, `headline`, `aktif`, `utama`, `isi_berita`, `keterangan_gambar`, `hari`, `tanggal`, `jam`, `gambar`, `dibaca`, `tag`, `status`, `premium`, `sumber_berita`) VALUES
(628, 36, 'admin', 'Soto Betawi H. Husein sangat enak sekali', '', '', 'soto-betawi-h-husein', 'N', 'N', 'N', 'Indonesia sangat kaya akan khazanah kuliner. Masing-masing wilayah mempunyai makanan yang khas. Meskipun sama jenisnya, namun rasa dan racikannya berbeda.<br />Sama seperti daerah-daerah lain di Indonesia, masyarakat Betawi juga mempunyai makanan khas yaitu soto Betawi. Salah satu yang terkenal adalah soto Betawi Haji Husein yang ada di kawasan Minangkabau, Manggarai, Jakarta Selatan. Di tempat seluas 5 x 10 meter, Bang Husein, 57; panggilan akrabnya, membuka usahanya dari pukul 07.00 WIB hingga dagangannya habis. Usaha ini telah dirintisnya sejak tahun 1989. Sebelum membuka usaha sendiri, ia terlebih dahulu belajar dari pamannya sejak tahun 1970-an.<br /><br />Saya sudah mulai ikut usaha sejak Kelas 4 SD. Waktu itu ikut Uwak (panggilan paman-Red) jualan sate, tongseng, sama soto, kata Bang Husein. Bapak empat orang anak ini mengaku memilih soto karena lebih praktis, selain itu ia ingin melestarikan makanan asli Betawi.<br />Yang membedakan soto Betawi Haji Husein dengan soto di daerah lainnya adalah proses pengolahan isi sotonya. Olahan daging sapi yang berupa daging, jeroan, dan kikil terlebih dahulu direbus; baru kemudian digoreng. Yang hampir sama biasanya soto Makassar, cuma biasanya dagingnya direbus saja, nggak digoreng, ujar pria kelahiran Jakarta ini.<br />Dalam sehari Bang Husein biasa menyediakan 50 Kg olahan daging sapi yang terdiri dari daging, jeroan, dan kikil. Mulai pukul 03.00 WIB ia merebus semuanya hingga pukul 06.00 WIB. Menurutnya proses merebus membutuhkan waktu yang cukup lama. Bumbu yang digunakan untuk kuah sotonya hanya terdiri dari rempah-rempah biasa yang banyak dijual di pasar. Bahan-bahan itu kemudian diracik sedemikian rupa sehingga mempunyai rasa yang khas. Kuah soto Betawi umumnya kental karena menggunakan santan. Dalam sehari ia bisa menghabiskan berpuluh butir kelapa tua untuk diolah menjadi santan.<br /><br />Setiap hari warungnya selalu ramai dikunjungi orang. Biasanya mereka datang pada saat jam istirahat makan siang. Penikmat soto Haji Husein berasal dari berbagai kalangan. Mulai dari yang berkantong tipis sampai yang berkantong tebal. Demikian lakunya, tidak jarang pelanggannya harus antre menunggu pelanggan lain yang sedang makan.<br />Tempatnya yang terletak persis di pinggir jalan terkadang tidak muat menampung sepeda motor dan mobil yang dikendarai para pelanggannya. Tak jarang pula orang-orang kantoran datang jauh-jauh hanya untuk merasakan kenikmatan sotonya.<br /><br />Melihat banyaknya pengunjung yang datang, bisa dipastikan rasanya pastilah menggugah selera. Dalam sehari Bang Husein mengaku bisa menghabiskan lebih kurang 100 porsi. Untuk satu porsinya ia hargai Rp16.000, itu sudah termasuk nasi. Omzet per-bulannya bisa mencapai lebih kurang Rp20 juta. Ke-12 orang karyawan kini membantunya melayani pelanggan setiap hari. Waktu awal buka mah cuma berdua. Sekarang pegawainya nggak pernah berubah, ungkapnya. Di antara karyawannya ada dua anak lelakinya yang ikut membantu.<br />Usaha ini merupakan usaha keluarga turun-temurun. Bang Husein merupakan generasi keempat. Sebelum di tempatnya saat ini ia sempat merasakan berjualan keliling menggunakan pikulan.<br /><br />Uang Rp400.000 menjadi modal awal usahanya. Dulu uang segitu besar, bisa buat beli semua, katanya. Usaha ini dijalaninya mulai dari bawah sekali. Bahan-bahan sotonya didapatkan dengan cara mengutang. Ia juga harus membayar sewa tempat.<br />Saat ini dengan omzet besar ia tidak perlu lagi mengutang. Bahkan sejak tahun 2000 tempatnyapun sudah menjadi milik pribadi. Asal ada kemauan, semua pasti bisa. Yang penting jangan pernah bosan kalau usaha, ujarnya. Untuk mempertahankan cita-rasa agar tidak berubah, Bang Husein selalu memerhatikan takaran komposisinya. Hal inilah yang menjadi salah satu daya tarik pengunjung untuk kembali karena rasa tidak berubah-ubah.<br /><br />Meski sudah menjadi pemilik, kakek dua orang cucu ini masih melayani sendiri para pelanggannya. Ia tidak canggung berbaur dengan karyawan lainnya. Ini juga menjadi salah satu trik untuk menarik pelanggannya. Terkadang para pelanggan yang seumurnya apabila dilayani olehnya akan merasa senang. Menurut mereka liat muka kita aja udah enak, makanan nomer dua, katanya sambil tertawa. Pertemuan seperti ini seperti sebuah nostalgia baginya.<br />Semua jerih payahnya telah membuahkan hasil yang cukup membanggakan baginya. Dari hasilnya berjualan ia sudah bisa pergi haji dan membiayai anak-anaknya sekolah. Ia juga sudah memberangkatkan dua karyawannya untuk menunaikan ibadah haji. Soto Betawi Bang Husein buka dari Senin sampai Minggu. Khusus hari Jumat ia sengaja tidak membuka warungnya untuk ibadah sholat Jumat. Pada bulan Ramadhan ia juga menutup usahanya sebulan penuh.<br /><br />Inilah Bang Husein, usahanya dijalani secara seimbang dengan ibadah. Ia juga tidak sungkan membagi rahasia dapurnya. Rezeki mah ada aja, udah ada yang ngatur. Selain usaha juga jangan lupa berdoa, ujarnya.', '', 'Selasa', '2012-08-21', '14:35:48', '', 23, 'kuliner', 'Y', 'N', ''),
(629, 31, 'admin', 'Cokelat Hitam Turunkan Tekanan Darah', '', '', 'cokelat-hitam-turunkan-tekanan-darah', 'N', 'N', 'N', 'Cokelat hitam sudah lama diketahui manfaatnya bagi kesehatan. Hasil analisa terhadap 20 studi menunjukkan, konsumsi cokelat hitam setiap hari akan menurunkan tekanan darah.<br /><br />Penelitian yang dilakukan The Cochrane Group melaporkan, zat aktif dalam cokelat bermanfaat untuk membuat pembuluh darah lebih rileks. Akibatnya, tekanan darah pun turun.<br /><br />Zat aktif yang punya efek positif tersebut adalah flavonol, yang di dalam tubuh akan menghasilkan zat kimia oksida nitrat dan membuat pembuluh darah lemas sehingga darah lebih lancar bersirkulasi.<br /><br />Analisis yang dibuat tersebut mengombinasikan beberapa penelitian sebelumnya untuk mengetahui ada tidaknya efek cokelat bagi tekanan darah. Cokelat hitam yang dikonsumsi partisipan dalam penelitian itu cukup banyak, antara 3 gram sampai 105 gram setiap hari.<br /><br />Namun penurunan tekanan darah yang dihasilkan tidak terlalu besar, hanya 2-3 mmHg. Akan tetapi penelitian hanya dilakukan selama dua minggu sehingga tidak diketahui dampaknya dalam jangka panjang.<br /><br />&quot;Meski kami belum mendapat bukti adanya efek jangka panjang penurunan tekanan darah, tetapi penurunan sedikit dalam jangka pendek ini mungkin dalam jangka panjang bisa berkontribusi pada penurunan risiko penyakit jantung,&quot; kata Karin Ried, dari National Institute of Integrative Medicine di Melbourne, Australia.<br /><br />Tekanan darah tinggi cukup banyak diderita dan diperkirakan menjadi penyebab terbanyak stroke dan penyakit jantung.<br /><br />Bila Anda ingin mendapatkan manfaat dari cokelat hitam, sebaiknya pastikan produk yang dibeli mengandung cokelat dalam jumlah tinggi karena kebanyakan produk di pasaran lebih banyak kandungan gula dan lemaknya.<br /><br />Selain cokelat, kacang, aprikot, blackberries, dan apel juga mengandung flavonol meski kadarnya lebih rendah daripada cokelat.', '', 'Selasa', '2012-08-21', '14:48:52', '', 27, 'kesehatan', 'Y', 'N', ''),
(630, 19, 'admin', 'Bos Yahoo Bajak 2 Karyawan Google', '', '', 'bos-yahoo-bajak-2-karyawan-google', 'N', 'N', 'N', 'Marissa Mayer, sang CEO Yahoo kembali memperkuat &#39;pasukannya&#39;. Pernah bernaung di bawah bendera Google, Mayer pun membajak dua karyawan dari kantor terdahulunya tersebut.<br /><br />Wanita yang diangkat menjadi CEO perusahaan internet pada bulan Juli lalu ini telah mempekerjakan mantan<em> Product Marketing Manager</em> Google yang bernama Andrew Schulte. Ia kini menjadi kepala staff di tubuh Yahoo.<br /><br />Schultebergabung dengan Google pada tahun 2007. Ia sempat menangani kampanye marketing Google+. Penegasan kepindahan dirinya ia tuliskan di akun Twitter maupun profil LinkedInnya.<br /><br />Sebelum Schulte, Mayer sudah membajak Anne Espiritu di mana duluanya bekerja sebagai<em> consumer technology PR </em>di Google, demikian dikutip dari <em>Cnet</em>, Senin (20/8/2012).<br /><br />Mayer memang tengah sibuk menata struktur manajemen Yahoo. Perusahaan ini kabarnya juga tengah berburu <em>Chief Operating Officer </em>(COO) dengan pengalaman di bidang manajemen finansial dan restrukturisasi perusahaan.', '', 'Selasa', '2012-08-21', '14:58:08', '', 21, 'teknologi', 'Y', 'N', ''),
(631, 36, 'admin', 'Perusahaan Besar Sharp Tak Lagi Produksi TV?', '', '', 'perusahaan-besar-sharp-tak-lagi-produksi-tv', 'N', 'N', 'N', '<p>Tokyo - Sharp kabarnya mempertimbangkan untuk lebih fokus memproduksi panel LCD (liquid crsytal display) sehingga perlu menjual sejumlah unit bisnisnya. Perusahaan asal Jepang ini berencana untuk tak lagi merakit TV.<br /> <br /> Sharp seperti dilaporkan surat kabar setempat Nikkei, disebut-sebut akan melepas unit bisnis mesin fotokopi dan pendingin ruangan (AC) agar lebih fokus dalam persaingan pasar LCD.<br /> <br /> Namun seperti dilansir Reuters dan dikutip detikINET, Sabtu (18/8/2012), Sharp melalui juru bicaranya menolak laporan tersebut. "Kami mempelajari berbagai pengukuran, namun tidak ada fakta yang mendukung laporan surat kabar Nikke mengenai kemungkinan penjualan operasional utama Sharp," ujar juru bicara tersebut.<br /> <br /> Performa perusahaan elektronik ini memang tidak menggembirakan awal bulan ini, dengan harga saham yang merosot pada titik terendahnya dalam 40 tahun terakhir.<br /> <br /> Nikkei menyebutkan, sebagai bagian dari upaya pemulihan, Sharp juga akan melakukan spinoff pabriknya di pusat Jepang, yang membuat panel LCD untuk smartphone dan tablet, termasuk untuk komponen iPhone dan iPad Apple.<br /> <br /> "Sharp mungkin saja menerima suntikan investasi dari pabrikan lain dan menjalankan operasional pabrik bersama-sama, seperti yang dilakukan Hon Hai roPrecision asal Taiwan di pabrik Sakai yang berlokasi di prefecture Osaka," tulis Nikkei.<br /> <br /> Saham Sharp turun 1,14% menjadi 173 yen pada penutupan perdagangan Jumat.</p>', '', 'Selasa', '2012-08-21', '15:01:36', '', 38, 'teknologi', 'Y', 'N', ''),
(632, 19, 'admin', 'Kemungkinan Kodak Batal Jual Paten', '', '', 'kemungkinan-kodak-batal-jual-paten', 'N', 'N', 'N', 'New York - Kodak berencana menjual sebagian dari paten-patennya guna melindungi perusahaannya dari kebangkrutan. Namun belakangan, sang pionir di dunia fotografi ini menimbang ulang rencana tersebut.<br /><br />Dilaporkan bahwa Kodak bisa jadi hanya menjual sebagian paten digital imaging yang hendak dilepas, atau malah tidak menjualnya satupun, demikian seperti dikutip detikINET dari AllThingsD, Senin (20/8/2012).<br /><br />Kabar ini menyusul pemberitaan sebelumnya yang mengatakan bahwa Kodak telah menunda pengumuman hasil penjualan patennya. &quot;Kodak belum mencapai kepastian atau persetujuan untuk menjual portofolio paten digital imagingnya, &quot;ujar Kodak dalam sebuah pernyataan.<br /><br />Suara resmi tersebut menyugestikan bahwa lelang paten yang sudah berjalan tidak berjalan sesuai harapan perusahaan yang berbasis di Rochester, New York, Amerika Serikat ini.<br /><br />Sebuah sumber yang mengetahui hal itu mengatakan bahwa tawaran yang datang untuk portofolio ini hanya berada di bawah angka USD 2 miliar.<br /><br />Sebelumnya, Wall Street Journal pernah melaporkan bahwa tawaran awal datang dari dua konsorsium, di mana dipimpin oleh perusahaan raksasa, Google dan Apple.<br /><br />Seperti diketahui, Kodak berjuang keras menyelematkan &#39;nyawa&#39; perusahaan. Selain menjual sebagian dari 1.100 patennya, Kodak juga telah keluar dari bisnis kamera dan beralih ke digital printing serta penciptaan aplikasi-aplikasi baru di bidang tersebut.', '', 'Selasa', '2012-08-21', '15:07:45', '', 23, 'teknologi', 'Y', 'N', ''),
(633, 31, 'admin', 'Apakah dia mengalami Depresi? Cek Bicaranya', '', '', 'apakah-dia-mengalami-depresi-cek-bicaranya', 'N', 'N', 'N', '<p>Jakarta, Beberapa orang pandai menyembunyikan perasaan, dari luar tampak baik-baik saja meski hatinya menangis tercabik-cabik. Para ilmuwan baru-baru ini berhasil menentukan dengan tepat tingkat keparahan depresi berdasarkan cara berbicara.<br /> <br /> Dalam penelitian yang diklaim sebagai yang terbesar di dunia tersebut, para ilmuwan menemukan bahwa cara berbicara susah dipalsukan ketika seseorang sedang depresi. Perubahan cara bicara itu bisa dipakai untuk mengukur tingkat keparahan depresi yang dialami.<br /> <br /> Adam Vogel, kepala Speech Neuroscience Unit di University of Melbourne mengatakan bahwa cara berbicara adalah penanda kesehatan otak yang sangat kuat. Berbagai perubahan yang terjadi pada cara berbicara bisa menunjukkan seberapa bagus otak bekerja.<br /> <br /> "Cara berbicara orang yang sedang depresi berubah dan dipengaruhi oleh terapi yang diberikan, menjadi lebih cepat dengan jeda yang lebih pendek," kata Vogel dalam laporannya di jurnal Biological Psychiatry seperti dikutip dari Medindia, Selasa (21/8/2012).<br /> <br /> Dalam penelitian tersebut, Vogel melakukan pengamatan terhadap 105 pasien yang sedang menjalani terapi untuk menyembuhkan depresi. Beberapa hal yang diamati antara lain waktu, nada dan intonasi bicara yang kemudian dibandingkan dengan hasil pemeriksaan psikologis.<br /> <br /> Para pasien diminta melakukan panggilan telepon ke sebuah mesin penjawab otomatis. Ada yang diminta berbicara apa saja, mengungkapkan perasaan dan sebagian hanya diminta untuk membaca teks supaya tidak perlu repot-reopot memikirkan mau bicara tentang apa.<br /> <br /> "Temuan ini memungkinkan para psikolog jadi lebih fleksibel dalam memeriksa pasien dari jarak jauh, hanya dengan mendengarkan pola dan cara berbicara meski dari lokasi yang sangat jauh atau di kampung-kampung," kata James Mundt dari Centre for Psychological Consultation di Wisconsin.</p>', '', 'Selasa', '2012-08-21', '15:13:07', '', 23, 'kesehatan', 'Y', 'N', ''),
(634, 31, 'admin', 'Makanan Penyumbang KegemukaN', '', '', 'makanan-penyumbang-kegemukan', 'N', 'N', 'N', '<p>Jakarta - Salah satu faktor yang banyak bikin orang jadi gemuk adalah mengonsumsi makanan yang berlebihan dan salah. Untuk itu ketahui makanan apa saja yang ditemui sehari-hari dan bisa bikin gemuk.<br /> <br /> "Yang paling banyak bikin gemuk adalah makanan dengan kandungan gula murni dan tepung," ujar dr Pauline Endang, SpGK dari FKUI, Rabu (15/8/2012).<br /> <br /> dr Pauline menjelaskan banyak orang yang kadang tidak suka nasi tapi ia suka mengemil. Namun sayangnya cemilan ini makanan yang manis dengan kadar gula tinggi, kadang ada telur dan menteganya sehingga kalori tinggi.<br /> <br /> "Makanan-makanan ini tidak bikin kenyang, jadi orang yang mengonsumsi bawaannya ia ingin makan terus apalagi jika ditambah dengan makan gorengan yang kandungan lemaknya tinggi," ungkapnya.<br /> <br /> Hal senada juga diungkapkan oleh ahli gizi dr Inge Permadhi, MS, SpGK bahwa makanan tinggi kalori, tinggi gula dan tinggi lemak bisa menyebabkan seseorang mengalami kegemukan.<br /> <br /> "Misalnya makanan berminyak, daging yang ada gajih, mentega, margarin, makanan-makanan ini rasanya enak dan gurih sehingga bikin orang ketagihan," ujar dr Inge dari Departemen Ilmu Gizi FKUI.<br /> <br /> Berikut ini beberapa makanan yang diketahui bisa menyumbang kegemukan yaitu:<br /> <br /> 1. Gorengan, mengandung banyak lemak dan juga kolesterol<br /> 2. Martabak, mengandung tinggi gula dan lemak<br /> 3. Cake, mengandung tinggi gula dan lemak<br /> 4. Minuman manis, mengandung tinggi gula dan kalori<br /> 5. Minuman soda, menyebabkan timbunan lemak visceral di perut<br /> 6. Kerupuk, mengandung karbohidrat dan kadar lemak yang tinggi<br /> 7. Es krim,mengandung tinggi gula dan lemak<br /> 8. Daging yang masih ada gajihnya<br /> 9. Fast food atau makanan cepat saji, kandungan lemak dan kalorinya tinggi tapi cenderung minim nutrisi<br /> 10. Keripik, kandungan lemak dan gula dari keripik ini membuat jumlah kalorinya tinggi serta ditambah dengan tinggi garam<br /> 11. Sereal manis, mengandung karbohidrat yang tinggi dan ditambah dengan gula yang bisa memicu penimbunan lemak<br /> 12. Krim-krim penambah minuman (Whipped cream), mengandung kadar lemak yang tinggi<br /> <br /> "Kandungan dari bahan makanan ini bila asupannya melebihi kebutuhan tubuh maka akan diubah dan disimpan di dalam sel lemak dan tentu saja membuat seseorang jadi gemuk," ujar Dr Marini Siregar, MGizi, SpGK dari RS Premier Jatinegara.<br /> <br /> Dr Marini menyarankan agar tidak menjadi gemuk yang terpenting adalah keseimbangan antara apa yang dimakan dengan aktivitas fisik yang dilakukan. Jika termasuk orang yang aktivitas fisiknya rendah, asupan makanannya harus disesuaikan tidak boleh terlalu banyak.<br /> <br /> "Jangan lupa mengonsumsi air yang cukup agar metabolisme dalam tubuh berjalan dengan baik, serta sayuran dan buah yang mengandung serat tinggi akan membuat kita merasa lebih kenyang sehingga mengurangi asupan makanan yang lain dan tidak akan terjadi kegemukan," ujar Dr Marini.</p>', '', 'Selasa', '2012-08-21', '15:23:01', '', 26, 'kesehatan', 'Y', 'N', ''),
(635, 39, 'admin', 'Foto Bugil Pangeran Harry Beredar', '', '', 'foto-bugil-pangeran-harry-beredar', 'N', 'N', 'N', 'Las Vegas - Pangeran Harry dari Inggris kembali membuat sensasi. Kali ini TMZ, sebuah situs hiburan Amerika Serikat, merilis foto-foto bugil adik Pangeran William itu, Selasa (21/8/2012).<br /><br />Menurut TMZ, foto itu diambil ketika putra kedua Pangeran Charles itu berpesta dengan teman-temannya di kamar hotelnya di Las Vegas, Jumat (18/8/2012).<br /><br />Mengutip sumbernya, TMZ melaporkan, Harry dan teman-temannya turun ke bar hotel dan bertemu sejumlah perempuan, yang kemudian diundangnya ke kamar suite-nya di hotel itu.<br /><br />Suasana pun menjadi liar karena anak-anak muda itu mengadakan permainan biliar. Dalam aturan permainan itu, yang kalah harus melepas pakaian, sampai akhirnya semua peserta bugil.<br /><br />Beberapa orang yang hadir di pesta itu memotret kehebohan pesta tersebut. Dalam salah satu foto, tampak Harry dalam keadaan telanjang bulat dengan kedua tangan menutupi alat vitalnya. Sementara itu, foto lainnya menunjukkan Harry memeluk seorang perempuan yang juga terlihat bugil.<br /><br />Kepada TMZ, Keluarga Kerajaan Inggris mengatakan, &quot;Kami tidak berkomentar tentang foto-foto itu saat ini.&quot; ', '', 'Kamis', '2012-08-23', '01:39:51', '', 31, 'internasional', 'Y', 'N', ''),
(636, 2, 'admin', 'Hukuman Ganda Korea Diperingan, Greysia/Meiliana Tunggu Nasib', 'Buntut Pertandingan "Sabun" di Olimpiade London', '', 'hukuman-ganda-korea-diperingan-greysiameiliana-tunggu-nasib', 'N', 'N', 'N', 'Seoul - Otoritas bulutangkis Korea Selatan, Rabu (22/8) mengurangi hukuman untuk empat pemain yang diduga sengaja kalah pada pertandingan di Olimpiade London, dari dua tahun menjadi enam bulan setelah terjadi proses banding.<br />&nbsp;&nbsp;&nbsp; &nbsp;<br />Jung Kyung-Eun, Kim Ha-Na, Ha Jung-Eun, dan Kim Min-Jung dilarang berpartisipasi di kompetisi-kompetisi domestik dan internasional selama enam bulan, demikian disampaikan oleh Asosiasi Bulutangkis Korea, Rabu.<br />&nbsp;&nbsp; &nbsp;<br />Keempat atlet itu berkata mereka hanya mengikuti perintah pelatih Sung Han-Kook, dan asisten Kim Moon-Soo. Sebelumnya, hukuman seumur hidup mereka telah dikurangi menjadi dua tahun.<br />&nbsp;&nbsp; &nbsp;<br />Delapan pebulutangkis ganda putri, dari Korea Selatan, Indonesia, dan China didiskualifikasi dari Olimpiade karena sengaja mengalah agar dapat mengamankan posisi yang lebih menguntungkan di babak berikutnya.<br />&nbsp;&nbsp; &nbsp;<br />Skandal ini membuat bintang bulutangkis China, Yu Yang, pensiun dari bulutangkis.<br />&nbsp;&nbsp; &nbsp;<br />PresidenFederasi Bulutangkis Dunia, Kang Young-Joong, telah menepis rumor bahwapublikasi yang buruk dari olahraga ini dapat membahayakan masa depan bulutangkis di Olimpiade.<br />&nbsp;&nbsp; &nbsp;<br />Korea Selatan mendapat satu medali perunggu dari cabang olahraga bulutangkis di London - itu merupakan penampilan terburuk sepanjang partisipasi mereka di Olimpiade.<br /><br />Sementaradi Indonesia, PBSI akhirnya memutuskan akan menjatuhkan sanksi kepada dua pemain ganda putri andalannya, Greysia Polii dan Meiliana Jauhari. Seperti diketahui, Greysia/Meiliana harus didiskualifkasi dari OlimpiadeLondon 2012 karena diduga sengaja mengalah pada penyisihan grup untuk menghindari lawan berat di babak perempat final.<br />&nbsp;<br />Badminton WorldFederation (BWF) memutuskan Greysia/Meiliana dan lawannya, Ha Jung Eun/Kim Min Jung dari Korea didiskualifikasi dari turnamen paling bergengsi tersebut. Pasangan terkuat dunia asal China, Wang Xiaoli/Yu Yang dan Kim Ha Na/Jung Kyung Eun dari Korea juga terkena diskualifikasi.<br /><br />&ldquo;Kami tak mau dipengaruhi oleh keputusan yang diambil oleh Korea atau China, karena setiap organisasi memiliki kebijakan masing-masing. Walaupun demikian, kami menghargai IOC dan BWF yang telah memutuskan bahwa Greysia/Meiliana bersalah, hal ini tidak boleh terulang lagi kedepannya. PBSI akan memberikan sanksi, namun belumbisa diumumkan bentuk sankisnya seperti apa&rdquo; ujar Sekjen PBSI, Yacob Rusdianto di Pelatnas Cipayung, Selasa (21/8) sepersti dikutip situs PBSI.<br />&nbsp;<br />Saat ini PBSI masih dalam proses diskusi mengenai sanksi yang akan diberikan kepada Greysia/Meiliana dan belum ada keputusan serta pemberitahuan resmi kepada keduanya. Namun ia mengaku telah beberapa kali mengadakan pertemuan kekeluargaan bersama kedua pemain untuk membicarakan masalah ini dan kemungkinan-kemungkinan yang akan terjadi.', 'Suasana pertandingan memalukan itu.\r\n', 'Kamis', '2012-08-23', '01:47:26', '', 22, 'olahraga', 'Y', 'N', ''),
(637, 2, 'admin', 'Zeelenberg: Lorenzo Akan Bangkit di Brno', 'MotoGP', '', 'zeelenberg-lorenzo-akan-bangkit-di-brno', 'N', 'N', 'N', 'London - Setelah harus bekerja keras merebut posisi kedua di Indianapolis,  Manajer tim Yamaha, Wilco Zeelenberg, yakin pebalap Jorge Lorenzo akan  bangkit di MotoGP seri Ceko.<p>Lorenzo diyakini dapat tampil sebagaipemenang untuk menjaga posisi tertinggi di klasemen sementara.         &quot;Sirkuit Indianapolis menyulitkan kami saat start. Namun, Sirkuit Brno memiliki lintasan yang halus dan cepat. Saya yakin kami dapat tampil lebih baik di sana,&quot; kata Zeelenberg, London, Rabu (22/8/2012) diLondon.</p><p>Lorenzo menang di Brno pada musim 2010 tetapi finis keempat di musim 2011. Lorenzo akan berusaha merebut kemenangan keenam pada musim ini di Brno.</p>Kemenangan ini penting bagi Lorenzo untuk memastikan langkahnya menjadi juara dunia di musim ini. Jika sampai kalah dari Dani Pedrosa, gelar juara dunia harus ditentukan sampai lombadi akhir musim', 'Pebalap Yamaha, Jorge Lorenzo, dengan motor Jupiter Z1 di paddock Yamaha. \r\n', 'Kamis', '2012-08-23', '01:52:27', '', 18, 'olahraga', 'Y', 'N', ''),
(638, 2, 'admin', 'Tyson Peringatkan "Rapper" 50 Cent', '', '', 'tyson-peringatkan-rapper-50-cent', 'N', 'N', 'N', 'New York - Mantan juara dunia tinju kelas berat Mike Tyson memperingatkan rapper 50 Cent yang kini bertindak sebagai promotor tinju.<br /><br />Rapper yang bernama asli Curtis Jackson ini baru saja mendirikan The Money Team (TMT) Promotions bersama petinju legendaris AS lainnya, Floyd Mayweather Jr. TMT bergerak di bidang pertandingan tinju profesional.<br /><br />Saat mendirikan perusahaan ini, 50 Cent bermaksud melakukan perubahan mendasar pada olahraga tinju profesional di AS.<br /><br />Namun, Tyson yang pernah malang melintang di dunia tinju antara 1985 hingga 2005 ini memperingatkan 50 Cent tentang &quot;kotornya&quot; dunia tinju profesional.<br /><br />&quot;Anda harus tahu tentang dunia tinju. Ini merupakan bisnis yang legal, tetapi tidak semua berjalan terbuka,&quot; kata Tyson. &quot;Memang seharusnya bisnis ini dikelola pemerintah.&quot;<br /><br />&quot;50 (Cent) adalah seorang bintang rap, penghibur, dan enterpreneur. Namun, ia sama sekali tidak mengerti dunia tinju,&quot; lanjut juara dunia tinju kelas berat 1986-1990 ini.<br /><br />Menurut Tyson, pengetahuan tentang tinju diperoleh 50 Cent hanya versi dari Floyd Mayweather.&nbsp; &quot;Begitu dia berkecimpung di dunia ini, ia harus tahu bahwa kawan bisa menjadi lawan,&quot; kata Tyson. &quot;Mereka hanya inginkan uang Anda dan ingin terus menguasai dunia ini.&quot;<br /><br />50 Cent mendapatkan izin promotornya di New York pada Juli lalu, dan mendapat izin usahanya di Nevada. Saat ini mereka telah mengikat beberapa petinju potensial, seperti petinju kelas bulu Yuriorkis Gamboa dari Kuba dan Billy Dib dari Australia.', 'Mike Tyson\r\n', 'Kamis', '2012-08-23', '01:56:01', '', 30, 'olahraga', 'Y', 'N', ''),
(639, 23, 'admin', 'Hilman Hariwijaya dan Eko Patrio akan Re-cycle Film "Lupus"', '', '', 'hilman-hariwijaya-dan-eko-patrio-akan-recycle-film-lupus', 'N', 'N', 'N', 'Jakarta - Kabar gembira bagi Anda pecinta novel maupun serial Lupus. Pasalnya, tokoh fiksi rekaan Hilman Wijaya ini akan segera diangkat ke layar lebar oleh rumah produksi eKomando Production.<br /><br />&quot;Nanti mau produksi film Lupus, kita re-cycle. Kita mudain lagi,&quot; ujar Eko, pemilik eKomando Production, saat ditemui di kawasan dr Saharjo, Jakarta, Kamis (16/8/2012).<br /><br />Film Lupus diangkat kembali ke layar lebar bukan tanpa alasan. Menurut Eko, tokoh Lupus merupakan anak muda yang konyol tetapi inspiratif. Setiap seri Lupus selalu mengangkat unsur persahabatan. Tak ada nuansa politis atau hal lainnya.<br /><br />&quot;Di Lupus ada persahabatan yang abadi, bahu-membahu. Tidak pernah berkaitan dengan masalah politik dan sebagainya. Di sini pure banget yang diangkat pertemanan,&quot; tambah Eko.<br /><br />Saat ini skenario sudah rampung dibuat oleh penulisnya, Hilman Hariwijaya. Meski demikian, tokoh Lupus hingga saat ini belum ditentukan. Rencananya, Lupus mulai tayang di bioskop pada Februari 2013, bertepatan dengan Hari Valentine.', '', 'Kamis', '2012-08-23', '02:21:00', '', 14, 'film,hiburan', 'Y', 'N', ''),
(640, 23, 'admin', 'Marvel Umumkan Jadwal Rilis "The Avengers 2"', '', '', 'marvel-umumkan-jadwal-rilis-the-avengers-2', 'N', 'N', 'N', 'Los Angeles - The Avengers is back. Setelah memastikan Joss Whedon bakal kembali berada di balik layar, Marvel juga mengumumkan jadwal penayangan perdana The Avengers 2.<br /><br />Rencanannya, film kumpulan para superhero ini akan dirilis pada tanggal 1 Mei 2015 mendatang setelah mereka menanyangkan film-film terkaitnya seperti Iron 3, Captain America 2 dan Thor 2.<br /><br />Meski belum memiliki judul, Marvel dan Disney sudah siap untuk kembali memproduksi film terlaris ketiga box office sepanjang masa. &quot;Walt Disney telah mengumumkan tanggal perilisan sekuel dari film blockbuster superhero terbesar dan film terlaris ketiga sepanjang masa, The Avengers,&quot; tulisnya dalam rilis yang dilansir Digital Spy.<br /><br />&quot;Josh Whedon akan kembali menulis naskah dan menyutradarai sekuel Avengers ini dan akan dirilis pada 1 Mei 2015,&quot; tambah Marvel.<br /><br />Menyusul pengumuman tersebut, bisa dipastikan bahwa para bintang The Avengers seperti Robert Downey Jr, Chris Hemsworth dan Chris Evens akan kembali tampil untuk memeriahkan film tersebut.', 'The Avengers\r\n', 'Kamis', '2012-08-23', '02:33:21', '', 37, 'film,hiburan', 'Y', 'N', ''),
(641, 23, 'admin', 'Film Dirilis, Dewi Lestari Deg-degan Menunggu Pemutarannya', '', 'http://www.youtube.com/embed/QgDWRe1TNRg', 'film-dirilis-dewi-lestari-degdegan-menunggu-pemutarannya', 'N', 'N', 'N', '<p>Jakarta -&nbsp; Penulis novel laris "Perahu Kertas", Dewi Lestari, mengaku tegang menjelang penayangan perdana film Perahu Kertas di bioskop hari ini. "Sangat deg-degan," kata penulis dengan nama pena Dee itu usai jumpa pembaca novel Perahu Kertas di Gramedia Matraman, Jakarta, Kamis. Film yang diangkat dari novel setebal 456 halaman itu sudah tayang khusus untuk media dan undangan Rabu (8/8/2012) lalu. <br /> <br /> "Kalau yang kemarin kan baru wartawan dan undangan, tetapi kalau sekarang yang dihadapi real judgment (penilaian nyata), sekarang penonton yang menilai. Lama film tayang di bioskop kan ditentukan dari penonton," kata Dee.<br /> <br /> Film&nbsp; Perahu Kertas disutradarai oleh Hanung Bramantyo. Artis muda Maudy Ayunda dan Adipati Dolken yang pernah beradu akting di film&nbsp; Malaikat Tanpa Sayap menjadi pemeran utama film tersebut.<br /> <br /> Meskipun ada beberapa adegan film yang berbeda dengan kisah dalam novel namun Dee mengatakan hampir 80 persen jalan cerita film Perahu Kertas&nbsp; sama dengan novel.<br /> <br /> "Kalau ada yang protes itu risiko ya, pasti ada dan buat saya itu wajar. Komparasi pasti terjadi. Tetapi sebagai film, Perahu Kertas solid," kata ibu dua anak itu.</p>', '', 'Kamis', '2012-08-23', '02:40:30', '', 37, 'film,hiburan', 'Y', 'N', ''),
(642, 39, 'admin', 'Israel, Tumor yang Harus Dihancurkan dari Muka Bumi', '', '', 'israel-tumor-yang-harus-dihancurkan-dari-muka-bumi', 'Y', 'N', 'N', '<p>Teheran - Israel adalah "tumor kanker" yang akan segera dihancurkan, kata Presiden Iran, Mahmoud Ahmadinejad, Jumat (17/8/2012), kepada para demonstran yang melakukan protes tahunan terhadap eksistensi negara Yahudi itu.<br /> <br /> "Rezim Zionis dan warga Zionis adalah satu tumor kanker. Kendatipun satu sel dari mereka dikeluarkan dalam satu inci tanah (Palestina), pada masa depan sejarah ini (bagi eksistensi Israel) akan terulang kembali," katanya dalam satu pidato di Teheran untuk memperingati Hari Quds Iran yang disiarkan langsung televisi negara itu.<br /> <br /> "Negara-negara dari kawasan ini akan segera mengusir kaum Zionis perampas tanah Palestina.... Sebuah Timur Tengah baru pasti dibentuk. Dengan bantuan Allah dan negara-negara kawasan ini, Timur Tengah baru tidak akan ditemukan lagi orang-orang Amerika dan Zionis," katanya.<br /> <br /> Peringatan itu dilakukan pada saat ketegangan meningkat antara Israel dan Iran menyangkut program nuklir Iran yang disengketakan itu.<br /> <br /> Israel pekan-pekan belakangan ini meningkatkan ancaman-ancamannya untuk menghancurkan fasilitas-fasilitas nuklir Iran guna mencegah Teheran mampu memproduksi senjata-senjata atom. Iran yang terkena sanksi-sanksi Barat membantah tuduhan itu dan menegaskan bahwa program nuklirnya hanya untuk tujuan damai. Militernya memperingatkan akan menghancurkan Israel jika diserang.<br /> <br /> Televisi Pemerintah Iran menunjukkan, massa berpawai di bawah sinar matahari yang menyengat di Teheran dan kota-kota lain negara itu untuk memperingati Hari Quds (Jerusalem) yang bertujuan membebaskan kota Jerusalem, yanga akan dijadikan ibu kota negara Palestina masa depan (Israel juga bersikeras untuk menjadikan Jerusalem sebagai ibu kotanya).<br /> <br /> Para pengunjuk rasa membawa bendera-bendera Palestina dan foro-foto pemimpin tertinggi Iran, Ayatollah Ali Khamenei, dan spanduk bertuliskan "Ganyang Israel" dan "Ganyang Amerika". Satu kelompok orang di Teheran terlihat membakar satu bendera Israel.<br /> <br /> Unjuk rasa itu telah menjadi kegiatan tahunan selama Ramadhan di Iran sejak Revolusi Islam tahun 1979. Para pengunjuk rasa menegaskan antipati Iran terhadap Israel dan sekutunya Amerika Serikat serta mendukung perjuangan rakyat Palestina, yang Khamenei sebut "satu tugas agama."<br /> <br /> Pemimpin tertinggi itu, Rabu, menyebut Israel sebagai "hasil pertumbuhan Zionis gadungan dan palsu" di Timur Tengah yang "akan dilenyapkan".<br /> <br /> Pemimpin Pengawal Revolusi yang berpengaruh, Jenderal Mohammed Ali Jafari, mengemukakan kepada kantor berita Fars, ketika menghadiri unjuk rasa di Teheran itu, bahwa "negara Iran sekarang berada di garis depan perlawanan regional anti-Israel dalam menunjukkan kebenciannya pada Israel." Ia menambahkan, Iran tetap mempertahankan sikap tegas itu.<br /> <br /> Ahmadinejad dalam pidatonya menyatakan, Zionis menimbulkan perang dunia pertama dan kedua, dan "menguasai masalah-masalah dunia, sejak saat itu mereka menguasai Pemerintah AS."</p>', '', 'Kamis', '2012-08-23', '02:49:25', '', 60, 'internasional', 'Y', 'N', ''),
(643, 42, 'admin', 'Fatima Nabil, Presenter TV Berjilbab Pertama di Mesir', '', '', 'fatima-nabil-presenter-tv-berjilbab-pertama-di-mesir', 'N', 'N', 'N', '<p>Kairo - FatimaNabil mencatat sejarah. Ia menjadi presenter pertama yang berjilbab yang muncul di televisi milik pemerintah Mesir. Dalam balutan jilbab berwarna krem, dan jas hitam Fatima membacakan buletin berita siang, Minggu 2 September 2012.&nbsp;</p><p>&quot;Akhirnya revolusi juga terjadi di televisi milik pemerintah,&quot; kata Nabil. Ia berharap kemunculannya ini diikuti tak hanya presenter berita tapi juga presenter cuaca dan lainnya.</p><p>&quot;Saat ini, standar bukan tergantung pada jilbab, yang sebenarnya merupakan pilihan pribadi setiap perempuan. Tapilebih pada profesionalitas dan intelektual,&quot; ujarnya.</p><p>Sejak televisi pemerintah ini berdiri tahun 1960, dibawah rejim PresidenHosni Mubarok, perempuan yang mengenakan jilbab dilarang menjadi presenter. Aturan ini sempat ditentang sejumlah aktivis hak asasi dan kelompok liberal, namun kandas.</p><p>Pemerintah baru yang dipimpin Presiden Mohammed Mursi, mencabut aturan ini. Menteri InformasiBaru Saleh Abdel-Makshoud mengatakan sudah banyak perempuan berjilbab yang muncul sebagai presenter di channel-channel televisi Arab dan internasional. Jadi perubahan ini tak menjadi masalah apalagi saat ini hampir 70% perempuan Mesir mengenakan jilbab.</p><p>Petinggi stasiun televisi tersebut mengatakan munculnya Nabila bisa membangkitkan semangat perempuan lain yang ingin tetap mempertahankan jilbab mereka tanpa harus takut kehilangan pekerjaan. (Sumber: Tempo.co)</p>', 'Fatima Nabil\r\n', 'Kamis', '2012-11-22', '10:07:13', '', 22, 'internasional', 'Y', 'N', ''),
(650, 48, 'admin', 'Roy Suryo Menpora, SBY Dipertanyakan', '', '', 'roy-suryo-menpora-sby-dipertanyakan', 'Y', 'N', 'N', '<p>Pengamat politik dari Charta Politika, Yunarto Wijaya mempertanyakan dasar keputusan SBY menunjuk Roy Suryo sebagai Menpora. Apalagi, kata Yunarto, ada pernyataan SBY yang menegaskan Roy cakap untuk mengemban tugas sebagai Menpora.</p><p>Menurut Yunarto, Roy selama ini lebih dikenal sebagai pakar foto digital dan video serta dosen di sebuah perguruan tinggi negeri. &quot;Namun, belum terdengar kiprahnya di bidang kepemudaan dan olahraga,&quot; kata Yunarto. Sementara, tugas Menpora yang berat dan masa tugasnya relatif singkat idealnya mengutamakan figur yang kompetensinya teruji di bidang kepemudaan dan olahraga.</p><p>Karena itu, Yunarto menduga penunjukan Roy bukan karena kompetensi, melainkan representasi politik. &quot;Ditunjuknya kader Partai Demokrat Roy Suryo sebagai Menpora menunjukkan faktor politisnya sangat kuat,&quot; katanya. (sumber: republika.co.id)<br /></p>', 'Roy Suryo saat dilantik jadi Menpora', 'Jumat', '2013-01-25', '00:01:04', '', 84, 'politik', 'Y', 'N', ''),
(651, 21, 'admin', 'Banjir Jakarta, Kerugian Ekonomi Capai Rp 1 Triliun', 'Jakarta Darurat Banjir', 'http://www.youtube.com/embed/RQMbr4DBqXk', 'banjir-jakarta-kerugian-ekonomi-capai-rp-1-triliun', 'N', 'N', 'Y', '<p>Ketua Asosiasi Pengusaha Indonesia Sofjan Wanandi mengatakan, banjir yang melanda Jakarta sepekan ini telah menimbulkan kerugian ekonomi yang cukup tinggi. Biaya bencana yang ditanggung untuk sekadar menyediakan makan&nbsp; bagi para pengungsi pun mencapai Rp 1 miliar lebih. </p><p>Hal itu disampaikan Sofjan, saat ditemui di area bencana banjir di Penjaringan, Jakarta Utara, Minggu (20/1/2013).</p><p>Sofjan menegaskan, tak bergeraknya roda ekonomi di Jakarta akibat bencana banjir menyebabkan kerugian lebih dari Rp 1 triliun. Aktivitas perdagangan menjadi tidak berjalan, dan kawasan Industri Pulogadung juga ikut lumpuh karena tak memperoleh suplai listrik akibat gardu listrik terendam banjir. </p><p>Negara importir pun, katanya, mulai mempertanyakan kapan Jakarta bisa pulih, karena ini sangat terkait dengan kegiatan ekspor komoditas keluar negeri dari seluruh daerah di Indonesia yang bertumpu di Jakarta.</p><p>&rdquo;Importir itu mulai bertanya-tanya, kapan banjir di Jakarta bisa surut. Kendati mereka saat ini memahami Jakarta sedang dilanda bencana,&rdquo; kata Sofjan. (sumber: kompas.com)</p>', 'Banjir di daerah Pluit', 'Jumat', '2013-01-25', '00:06:15', '', 12, 'ekonomi', 'Y', 'N', ''),
(652, 48, 'admin', 'Hary Tanoe Mundur dari Partai Nasdem', '', '', 'hary-tanoe-mundur-dari-partai-nasdem', 'N', 'Y', 'N', '<p>Ketua Dewan Pakar DPP Partai Nasional Demokrat (Nasdem) Hary Tanoesoedibjo menyatakan mundur dari keanggotaan Partai Nasdem. Hal itu disampaikannya secara resmi dalam jumpa pers, Senin (21/1/2013), di Jakarta.</p><p>&quot;Saya menyatakan mundur dalam kapasitas saya sebagai Ketua Dewan Pakar. Mulai hari ini, saya bukan lagi anggota dari Partai Nasdem. Keputusan ini saya lakukan dengan berat hati,&quot; kata Hary.</p><p>Ia menyatakan, sejak bergabung dengan Partai Nasdem pada 9 Oktober 2011, Hary merasa telah melakukan upaya terbaik, baik energi, pikiran, dana, maupun risiko, untuk berpartisipasi membesarkan Partai Nasdem. &quot;Target utamanya lolos verifikasi dan lolos sebagai partai peserta pemilu. Saya merupakan bagian yang ikut meloloskan Nasdem,&quot; kata bos MNC Grup ini.</p><p>&quot;Keputusan saya ini tidak mengenakkan, tapi pada satu titik saya harus memutuskan ini. Aktivitas politik harus tetap dijalankan. Destiny keterlibatan saya di politik adalah menjadi bagian dari perubahan untuk bangsa Indonesia menjadi lebih baik. Saya ingin ikut andil secara nyata, langsung. Karena bagaimanapun politik menjadi satu bagian ideologi dan bagian dari masa depan kita,&quot; papar Hary.</p><p>Perpecahan di tubuh Nasdem mulai merebak ketika beredar kabar adanya faksi di dalam partai itu. Dikabarkan, Surya Paloh yang akan menjadi ketua umum partai itu berseberangan dengan faksi Hary Tanoe. Beberapa waktu lalu, kelompok Surya Paloh memecat Sekjen Garda Pemuda Nasional Demokrat (GPND), Saiful Haq.</p><p>Tentang alasannya mundur, Hary mengatakan karena ada perbedaan pendapat dengan Ketua Majelis Tinggi Partai Nasdem Surya Paloh (sumber: kompas.com) </p>', 'Hary Tanoe saat memberikan keterangan pers', 'Jumat', '2013-01-25', '00:58:26', '', 15, 'politik', 'Y', 'N', ''),
(653, 41, 'admin', 'Ketika "Ciyus" Terucap dari Mulut Jokowi', '', '', 'ketika-ciyus-terucap-dari-mulut-jokowi', 'N', 'Y', 'N', '<p>Kata <em>ciyus</em> atau serius sering terdengar diucapkan anak-anak zaman sekarang yang sering dijuluki anak baru gede (ABG). Nah, ketika bahasa gaul itu diucapkan oleh Joko Widodo, para pewarta yang bertugas meliput kegiatan Gubernur DKI Jakarta itu tak bisa menahan tawa karena nadanya yang sedikit medok.</p><p>Terhitung sudah dua kali Jokowi melontarkan kata itu kepada wartawan.    Pertama, saat Jumat (18/1/2013)malam lalu, ketika Jokowi meninjau perbaikan Tanggul Kanal Banjir Barat(KBB) di Latuharhary, Jakarta Pusat. Seharian raut muka Jokowi begitu serius dan tegang karena pengerjaan tanggul yang masih belum selesai, ditambah hujan deras yang terus mengguyur Ibu Kota. Pendek kata, Jokowi tampak sangat suntuk dan senyum khasnya pun tak terpancar dari dirinya.</p><p>Saatitu, Jokowi menghampiri wartawan yang sudah menunggunya di luar rel kereta api yang terputus. Lantas para wartawan berniat mencairkan suasana dengan melontarkan pertanyaan-pertanyaan konyol kepada Jokowi, seperti &quot;Apabila tanggul selesai, ditandai oleh pemotongan pita di Sency(Senayan City)?&quot;. Mendengar pertanyaan itu, senyum yang hilang dari Jokowi akhirnya muncul kembali.</p><p>Seraya mengernyitkan dahinya, Jokowi bertanya, &quot;Apa itu Sency?&quot;   Wartawan pun langsung menjelaskan kalau Sency itu adalah kependekan dari Senayan City. Mengetahui hal tersebut, Jokowi pun tertawa dan mengatakan kalau berbicara hendaknya jangan disingkat-singkat. &quot;Oh, <em>kirain </em>saya sensitif itu maksudnya. <em>Mbok</em>, jangan disingkat-singkat, <em>tho</em>,&quot; kata Jokowi.</p><p>Pembicaraan itu pula yang membuat Jokowi melontarkan kata <em>ciyus</em> dan <em>miapah</em> kepada wartawan. &quot;Kalau <em>ciyus miapah </em>itu apa? Ha-ha-ha,&quot; kata Jokowi yang membuat suasana lokasi tersebut yang awalnya tegang menjadi ramai. </p><p>Kata <em>ciyus </em>kembalidiucapkan Jokowi, Selasa (22/1/2013) kemarin, saat berbincang dengan wartawan di Balaikota DKI. Bahasa gaul itu keluar kembali setelah ia ditanya terkait kinerjanya 100 hari. </p><p>Saat itu, Jokowi ditanya masalah Jakarta apa yang membuat Jokowi pusing. Jokowi pun menjawab  takada persoalan yang membuatnya pusing karena ia telah menghadapi  masalah itu sejak ia memimpin Solo selama delapan tahun. Namun, ada satumasa Jokowi mengaku tidak memiliki semangat. &quot;Yaitu kalau pas B sama pas T. Apa  itu? Pokoknya pas B sama pas T. <em>Ciyuss</em>,&quot; canda Jokowi yang mengundang  tawa para wartawan. (sumber: kompas.com)</p>', '', 'Jumat', '2013-01-25', '01:11:01', '', 19, 'metropolitan', 'Y', 'N', ''),
(654, 31, 'admin', 'Bahaya Mendiagnosis Penyakit Lewat Internet', '', '', 'bahaya-mendiagnosis-penyakit-lewat-internet', 'N', 'Y', 'N', '<p>Apakah Anda mengunjungi &quot;dokter Google&quot; lebih sering dari dokter di klinik? Anda tidak sendiri. Dalam sebuah survei tahun lalu di Amerika diketahui bahwa 35 persen responden mencocokkan gejala penyakitnya di internet dan mendiagnosis dirinya sendiri.</p><p>Masih menurut survei yang dilakukan The Pew Research Center&#39;s Internet &amp; American Life Project itu, sekitar 41 responden mengatakan diagnosis sendiri itu ternyata dikonfirmasi kebenarannya oleh dokter. </p><p>Tetapi, sekitar satu dari tiga responden mengaku tidak pernah pergi ke dokter untuk mencari opini kedua. Malahan, 18 persen responden mengatakan bahwa upayamendiagnosis sendiri itu ternyata salah ketika ditanyakan ke dokter. </p><p>Meskisurvei yang melibatkan 3.000 responden itu sebenarnya dilakukan untuk mengetahui siapa yang mencari informasi kesehatan secara <em>online</em>, tetapi para profesional medis merasa khawatir dengan tren itu.</p><p>&quot;Rata-ratatiap orang mengunjungi empat situs lalu memutuskan ia menderita kanker dan akan segera meninggal. Padahal, di internet banyak informasi yang keliru,&quot; kata Rahul K Khare, dokter unit gawat darurat dari NorthwesternMemorial Hospital.</p><p>Menurut Khare, ia sering menemukan pasien yang hidupnya menjadi penuh kecemasan karena mereka merasa menderita penyakit berat setelah mencocokkan gejala yang dirasakannya dengan informasi di internet. (sumber: kompas.com)</p>', '', 'Jumat', '2013-01-25', '01:18:13', '', 20, 'kesehatan', 'Y', 'N', ''),
(655, 19, 'admin', 'Microsoft Update Windows 8.2 Agustus?', '', '', 'microsoft-update-windows-82-pada-agustus', 'N', 'Y', 'Y', '<p><span>Kebocoran mengenai update OS Windows 8 yang kedua datang menghinggapi Microsoft. Windows 8.1 update 2 direncanakan diperbarui pada Agustus mendatang.</span><br /><br /><span>Melalui sebuah gambar yang diklaim otentik berasal dari Rusia, informasi dari dokumen itu hampir sama dengan rumor yang beredar selama ini.</span><br /><br /><span>Sementara itu, update untuk Threshold masih menjadi rumor dan belum diketahui kapan akan dilaksanakan. Microsoft belum mengkonfirmasi apapun terkait gambar bocornya&nbsp;</span><em>update</em><span>&nbsp;windows 8.1 update 2 tersebut seperti dilansir&nbsp;</span><em>Neowin</em><span>, Senin (21/7/2014).</span><br /><br /><span>Belum diketahui seperti apa detail fitur yang dihadirkan pada Windows 8.2. Sementara Windows 9 dikabarkan memiliki tampilan antarmuka Metro baru.</span><br /><br /><span>Selain itu, terdapat menu start baru dan aplikasi Metro dengan tampilan jendela yang disertakan dalam&nbsp;</span><em>update&nbsp;</em><span>tersebut. Konon, Microsoft sedang mempertimbangkan membuat versi gratis dari Windows 9.</span><br /><br /><span>Informasi yang beredar juga menyebutkan bahwa Microsoft sedang bekerja pada Windows Cloud. Menurut WZor, ada tim di Microsoft yang bekerja pada prototype sistem operasi, di mana pengguna bisa mengunduh gratis dan menambahkan fungsionalitas melalui sistem berlangganan.</span></p>', '', 'Senin', '2014-07-21', '21:22:52', '', 52, 'internasional,teknologi', 'Y', 'N', ''),
(656, 39, 'admin', 'Usai Bertempur, Tentara Israel Hilang di Gaza', 'Seorang tentara Israel dilaporkan menghilang di Jalur Gaza. Hal ini terjadi usai terjadinya pertempuran mematikan yang terjadi di Jalur Gaza pada akhir pekan lalu.', 'http://www.youtube.com/embed/hkzpLJjZQbA', 'usai-bertempur-tentara-israel-hilang-di-gaza', 'Y', 'Y', 'Y', '<p><span>Melansir </span><em>Boston Herald</em><span>, Selasa (22/7/2014), pejabat pertahanan Israel mengatakan, tentaranya hilang usai pertempuran mematikan di Gaza terjadi pada pekan lalu. Namun, tidak jelas apakah tentara tersebut masih hidup atau sudah tewas.</span><br /><br /><span>Konflik yang terjadi antara Israel dan Hamas sejauh ini sudah menyebabkan sekira 25 tentara Israel tewas dan ratusan warga Palestina. Sebagian besar korban warga Palestina adalah anak-anak.</span><br /><br /><span>Memanasnya situasi itu membuat sejumlah desakan gencatan berdatangan dari sejumlah negara dan organisasi internasional.</span><br /><br /><span>Sebelumnya, Sekretaris Jendral Perserikatan Bangsa - Bangsa (PBB) Ban Ki-moon dan Menteri Luar Negeri Amerika Serikat (AS) John Kerry melakukan pertemuan di Kairo, Mesir. Pertemuan di bertujuan untuk mendesak agar konflik yang terjadi di Gaza segera dihentikan.</span><br /><br /><span>Mengingat agresi yang militer yang dilancarkan Israel merupakan pelanggaran hukum humaniter internasional. Menyusul banyak warga sipil yang telah menjadi korban akibat pertempuran yang dilakukan Israel dan Hamas.</span> <br /><br /><span>Sebelumnya, Sekretaris Jendral Perserikatan Bangsa - Bangsa (PBB) Ban Ki-moon dan Menteri Luar Negeri Amerika Serikat (AS) John Kerry melakukan pertemuan di Kairo, Mesir. Pertemuan di bertujuan untuk mendesak agar konflik yang terjadi di Gaza segera dihentikan.</span><br /><br />Mengingat agresi yang militer yang dilancarkan Israel merupakan pelanggaran hukum humaniter internasional. Menyusul banyak warga sipil yang telah menjadi korban akibat pertempuran yang dilakukan Israele dan Hamas.</p><p><span>Komentar paling pedas Khamenei adalah Iran tidak pernah mengenal Israel. Negara ini juga secara terang-terangan mendukung Hamas. Hamas sendiri sudah dimasukan ke dalam daftar hitam terorisme oleh Israel.</span><br /><br /><span>Selain itu, Khamenei dan beberapa pemimpin Iran berjanji akan menghilangkan Israel dari peta dunia. Bahkan, beberapa pekan lalu, Khamenei menyatakan peristiwa pembantaian warga Yahudi oleh Nazi satu abad lalu, hanyalah sebuah ilusi yang tak nyata.</span></p><p><span><span>Komentar paling pedas Khamenei adalah Iran tidak pernah mengenal Israel. Negara ini juga secara terang-terangan mendukung Hamas. Hamas sendiri sudah dimasukan ke dalam daftar hitam terorisme oleh Israel.</span><br /><br /><span>Selain itu, Khamenei dan beberapa pemimpin Iran berjanji akan menghilangkan Israel dari peta dunia. Bahkan, beberapa pekan lalu, Khamenei menyatakan peristiwa pembantaian warga Yahudi oleh Nazi satu abad lalu, hanyalah sebuah ilusi yang tak nyata.</span></span></p>', 'Tentara Israel Bersimbah Darah', 'Minggu', '2016-07-31', '13:22:26', '', 2, 'yahudi,israel,palestina,internasional,hukum,teknologi', 'Y', 'N', ''),
(657, 39, 'admin', 'Unjuk Rasa Anti-Yahudi Dikecam Eropa', '', '', 'unjuk-rasa-antiyahudi-dikecam-eropa', 'N', 'Y', 'Y', '<p><strong>PARIS&nbsp;</strong><span>- Demo anti-Yahudi yang menyeruak di dunia mendapat kecaman dari negara besar di Eropa. Kecaman tersebut datang dari Jerman, Prancis dan Italia.</span><br /><br /><span>Melalui menteri luar negerinya, masing-masing negara mengutuk aksi unjuk rasa yang sering berujung dengan kericuhan dan tindak kekerasan.</span><br /><br /><span>"Hasutan, permusuhan, serangan terhadap orang-orang Yahudi tidak memiliki tempat di masyarakat kami,"&nbsp; sebut pernyataan gabungan tiga Menlu tersebut, seperti dikutip dari&nbsp;</span><em>DNA</em><span>, Rabu (23/7/2014).</span><br /><br /><span>Tidak bisa dipungkiri sejak agresi Israel dilancarkan, protes besar terjadi di beberapa negara. Di Prancis, unjuk rasa kelompok Pro-Palestina diakhiri pembakaran di sejumlah objek di depan toko yang dimiliki warga Yahudi.</span><br /><br /><span>Bahkan di negara ini, akibat memanasnya kondisi di Gaza, ketegangan antara kelompok Pro-Palestina dan warga Yahudi di Prancis acap kali terjadi. Prancis sendiri merupakan negara dengan populasi warga Yahudi terbanyak di Eropa.</span><br /><br /><span>Tidak hanya di Prancis, kondisi di Gaza pun jauh lebih buruk. Akibat pertempuran Hamas-Israel jumlah korban, khususnya dari warga sipil Palestina mencapai hampir 600 orang.</span></p>', '', 'Rabu', '2014-07-23', '14:37:32', '', 21, 'internasional,israel,palestina,yahudi', 'Y', 'N', '');
INSERT INTO `berita` (`id_berita`, `id_kategori`, `username`, `judul`, `sub_judul`, `youtube`, `judul_seo`, `headline`, `aktif`, `utama`, `isi_berita`, `keterangan_gambar`, `hari`, `tanggal`, `jam`, `gambar`, `dibaca`, `tag`, `status`, `premium`, `sumber_berita`) VALUES
(658, 39, 'admin', 'Inggris Bela Serangan Roket Hamas', '', '', 'inggris-bela-serangan-roket-hamas', 'N', 'Y', 'Y', '<p>LONDON - Seorang anggota Parlemen Inggris membela serangan roket yang dilesakkan oleh Hamas ke arah Israel. Namun pembelaannya itu diganjar dengan sanksi indisipliner terhadapnya.</p><p>Anggota Parlemen Inggris dari Partai Liberal Demokrat, David Ward, lewat akun Twitter miliknya menulis pernyataan yang membela serangan roket dari Hamas.</p><p>&quot;The big question is - if I lived in #Gaza would I fire a rocket? - probably yes. &#39;Pertanyaan besar saat ini, apabila saya tinggal di #Gaza apakah saya akan menembakkan roket? mungkin saja iya&#39;,&quot; tulis Ward dalam akun pribadinya, seperti dikutip The Guardian, Rabu (23/7/2014).</p><p>Pihak Partai Liberal Demokrat pun langsung melontarkan kecaman atas tulisan dari Ward. Juru bicara partai mengatakan bahwa pihak partainya akan menerapkan sanksi terhadap Ward.</p><p>Sementara pihak Partai Konservatif yang menguasai koalisi pemerintahan bersama Liberal Demokrat menyatakan Ward harus menarik komentarnya.</p><p>&quot;Tidak seharusnya seorang anggota parlemen menulis tindakan yang memicu kekerasan. Tindakannya tidak bertanggung jawab,&quot; ucap pihak Konservatif.</p><p>Ini bukan pertama kalinya Ward mengecam tindakan Israel. Pada Juli 2013 lalu, Ward menyebut pihak Zionis diambang kekalahan dalam perang. Dirinya pun mempertanyakan sampai kapan negara apartheid seperti Israel bisa bertahan.</p>', '', 'Selasa', '2016-08-23', '10:25:48', 'g1.jpg', 0, 'yahudi,israel,palestina,internasional,hukum', 'Y', 'Y', ''),
(659, 48, 'admin', 'Target-Target Serangan kafir Israel di Gaza palestina', '', '', 'targettarget-serangan-kafir-israel-di-gaza-palestina', 'N', 'Y', 'Y', '<p><strong>GAZA</strong>&nbsp;- Israel makin gencar melakukan serangan ke Gaza, baik melalui udara maupun darat. Masjid menjadi salah satu target serangan dari Negara Yahudi itu.<br /><br />Sekira 15 warga Palestina dilaporkan tewas dan 20 lainnya dalam serangan udara Isarel ke sebuah masjid di Kota Gaza pada Sabtu 19 Juli 2014 lalu. Masjid itu terletak tidak jauh dari rumah milik Komandan Polisi Gaza.<br /><br />Rudal-rudal dari Israel menghancurkan sebagian dari bangunan masjid. Alquran yang berada di dalam masjid pun tampak rusak akibat serangan. Demikian diberitakan&nbsp;<em>Associated Press</em>, Rabu (23/7/2014).<br /><br />Selain itu, serangan Israel juga diarahkan ke rumah sakit yang berada di Gaza. Blokade yang dilakukan oleh Israel makin membuat rumah sakit sulit untuk beroperasi.<br /><br />Kementerian Kesehatan Gaza menjelaskan, blokade telah memperburuk kualitas hidup warga yang terluka akibat konflik ini. 136 obat yang diperlukan sudah makin menipis dan diperkirakan akan habis dalam waktu beberapa hari ke depan.<br /><br />Kantung kekuatan Hamas menjadi target penting yang diincar oleh Israel. Namun serangan terhadap basis kekuatan Hamas tersebut justru lebih sering menimpa warga sipil.<br /><br />Hingga saat ini lebih dari 630 warga Palestina dilaporkan tewas dalam serangan yang dilakukan Israel ke Gaza. Sementara 30 warga Israel dilakukan turut tewas dalam pertempuran yang sudah berlangsung sekira 15 hari tersebut.</p>', '', 'Selasa', '2016-08-23', '10:26:37', 'g3.jpg', 0, 'yahudi,israel,palestina', 'Y', 'Y', ''),
(660, 39, 'admin', 'Hamas Sebut PM Israel seperti Hitler suka membantai', '', '', 'hamas-sebut-pm-israel-seperti-hitler-suka-membantai', 'N', 'Y', 'Y', '<p><strong>GAZA&nbsp;</strong>- Pernyataan keras disampaikan Hamas kepada Israel. Faksi garis keras Palestina ini menyamakan Perdana Menteri (PM) Israel, Benjamin Netanyahu dengan pemimpin Nazi, Adolf Hitler.<br /><br />Cercaan Hamas ini disampaikan oleh Juru Bicaranya Osama Hamdan. Menurut Hamdan, pernyataan ini muncul akibat&nbsp; yang dilakukan Israel kepada warga Gaza, sama persis dengan pembantaian warga Yahudi oleh Hitler.<br /><br />&quot;PM Israel sudah kehilangan moral dia adalah cerminan dari Hitler dan tentara Nazi,&quot; sebut Hamdan, seperti dikutip dari&nbsp;<em>Times of Israel</em>, Rabu (23/7/2014).<br /><br />&quot;Pasukan Israel juga berlaku sama (dengan tentara Nazi) mereka disuruh membunuh warga Palestina jika, ini sama saja dengan yang dilakukan Hitler di abad lalu,&quot; tambah dia.<br /><br />Pernyataan Hamdan disampaikannya bukan tanpa alasan. Setelah Israel melancarkan agresi ke Gaza, hampir 600 warga Palestina menjadi korban jiwa kekejaman Israel.<br /><br />Parahnya lagi, korban jiwa dari Palestina kebanyakan adalah bocah dan perempuan. Hal tersebut bertentangan dengan pernyataan PM Israel yang mengatakan, serangan ke Gaza ditujukan untuk menghancurkan Hamas.</p>', '', 'Selasa', '2016-08-23', '10:26:08', 'g2.jpg', 0, 'yahudi', 'Y', 'Y', ''),
(661, 39, 'admin', 'Tampung Pengungsi Muslim Palestina terkena Serangan', '', '', 'tampung-pengungsi-muslim-palestina-terkena-serangan', 'N', 'Y', 'Y', '<p><strong>GAZA&nbsp;</strong><span>- Agresi Israel di Gaza meninggalkan duka mendalam bagi warga Palestina. Tidak hanya kehilangan nyawa, warga Palestina yang selamat harus tega melihat rumah mereka porak poranda dihancurkan Israel.</span><br /><br /><span>Penduduk Palestina pun saat ini&nbsp; tinggal di tempat-tempat penampungan sementara. Salah satu tempat penampungan yang ada di Gaza adalah sebuah gereja Orthodoks Yunani, Santo Porphyrius.</span><br /><br /><span>Gereja ini menampung hampir 1.000 pengungsi Palestina yang mayoritas bergama Islam. Tidak hanya menyediakan tempat tinggal, Gereja Santo Porphyrius turut memberikan makanan, minuman, selimut, tempat duduk, mainan dan bahkan halaman belakang yang biasa digunakan bocah Palestina bermain sepak bola.</span><br /><br /><span>"Kami membuka gereja untuk menolong warga, ini sudah menjadi tugas gereja dan kami akan membantu mereka sekuat tenaga," sebut salah satu pengurus gereja, Archbishop Alexios, seperti dikutip dari&nbsp;</span><em>Arab News</em><span>, Rabu (23/7/2014).</span><br /><br /><span>"Awalnya ada 600 warga dan sekarang sudah ribuan, kebanyakan dari mereka adalah peremupuan, anak-anak dan orang tua yang kondisinya lemah," tambah dia.</span><br /><br /><span>Gereja Santo Porphyrius memang bukan tempat yang paling aman bagi pengungsi Palestina. Pasalnya, tidak lama setelah para pengungsi berdatangan, roket dari Israel menerjang daerah dekat gereja tersebut.</span><br /><br /><span>Namun hal ini dapat menjadi bukti bagaimana agresi Israel tidak meruntuhkan semangat warga Palestina untuk tetap bersatu dan saling membantu tanpa memandang ras, etnis atau agama.</span><br /><br /><span>Sekedar informasi, warga Kristen Palestina merupakan penduduk minoritas. Jumlah mereka hanya sekitar 1.400 jiwa.&nbsp;</span></p>', '', 'Rabu', '2014-07-23', '15:14:48', '', 23, 'palestina', 'Y', 'N', ''),
(662, 39, 'admin', 'Iran Dorong Palestina Terus Lawan Israel Sampai titik Akhir', '', '', 'iran-dorong-palestina-terus-lawan-israel', 'N', 'Y', 'Y', '<p><span>Pemimpin tertinggi Iran, Ayatollah Ali Khamenei menyampaikan pernyataan kontroversial terkait ketegangan di Gaza. Khamenei mendorong agar Palestina terus melawan Israel.</span><br /><br /><span>"Salah satu cara untuk menghentikan rezim kurang ajar ini adalah melanjutkan perlawanan dan dan perjuangan bersenjata harus diperluas ke Tepi Barat," sebut Khamenei, seperti dikutip dari&nbsp;</span><em>IRNA,&nbsp;</em><span>Kamis (24/7/2014).</span><br /><br /><span>Khamenei dikenal sebagai musuh besar Israel. Beberapa komentarnya membuat panas telinga pemimpin Israel.</span><br /><br /><span>Komentar paling pedas Khamenei adalah Iran tidak pernah mengenal Israel. Negara ini juga secara terang-terangan mendukung Hamas. Hamas sendiri sudah dimasukan ke dalam daftar hitam terorisme oleh Israel.</span><br /><br /><span>Selain itu, Khamenei dan beberapa pemimpin Iran berjanji akan menghilangkan Israel dari peta dunia. Bahkan, beberapa pekan lalu, Khamenei menyatakan peristiwa pembantaian warga Yahudi oleh Nazi satu abad lalu, hanyalah sebuah ilusi yang tak nyata.</span></p>', '', 'Kamis', '2014-07-24', '09:15:57', '', 243, 'palestina', 'Y', 'N', ''),
(663, 39, 'admin', 'Surat dari Dokter Norwegia untuk para pemimpin perang', '', '', 'surat-dari-dokter-norwegia-untuk-para-pemimpin-perang', 'N', 'Y', 'N', '<p><span>Seorang dokter asal Norwegia menulis surat kepada Presiden Amerika Serikat (AS) Barack Obama. Surat tersebut menjelaskan situasi yang terjadi saat ini di Gaza.</span><br /><br /><span>Berikut isi surat itu seperti dilansirÂ </span><em>Middle East Monitor</em><span>, Selasa (22/7/2014):</span><br /><br /><em>Kepada teman-teman<br /><br />Tadi malam sangat mencekam akibat serangan darat yang dilancarkan ke Gaza kepada semua warga sipil tak bersalah yang terluka dan meninggal akibat mengalami pendarahan serta menggigil.<br />Para pahlawan di ambulans dan di seluruh rumah sakit Gaza bekerja 12 sampai 24 jam tanpa dibayar (Baca :Â <a href=\\"http://international.okezone.com/read/2014/07/17/412/1014052/cerita-getir-petugas-ambulans-di-gaza-2\\">Cerita Getir Petugas Ambulans</a>). Mereka mencoba memahami dan peduli atas kekacauan ini.Â <br /><br />Sekarang, sekali lagi manusia diperlakukan seperti binatang oleh tentara yang paling bermoral di dunia\\" (sic!).<br /><br />Kepedulian saya tidak ada habisnya, dengan rasa sakit, penderitaan dan syok yang diterima oleh mereka. Saya kagum terhadap staf dan relawan yang tidak ada habisnya.<br /><br />Kedekatan saya dengan PalestinaÂ  memberi saya kekuatan, meskipun sesaat saya ingin berteriak usai melihat seseorang menangis sambil mencium kulit dan rambut anaknya yangÂ  berlumuran darah di dalam pelukan.<br /><br />Lebih dari 100 korban berdatangan dari wilayah Shifa dalam 24 jam terakhir yang ditampung di sebuah rumah sakit.<br /><br />Tidak ada listrik, air, pakaian, obat-obatan, dan sejumlah fasilitas di rumah sakit seperti monitor semua berkarat seolah-olah baru diambil kemarin dari museum. Namun, para pahlawan ini tidak mengeluh. Mereka langsung saja bekerja seperti prajurit dengan keteguhan yang sangat besar.<br /><br />Dan ketika saya menulis surat ini sendirian di tempat tidur untuk Anda, air mata saya mengalir tapi tidak berguna untuk menyembuhkan rasa sakit atas kesedihan, kemarahan dan ketakutan. Ini tidak terjadi!<br /><br />Sekarang, suara simfoni dari perang mesin Israel yang mengerikan bermunculan dari kapal angkatan laut di ujung di pantai, pesawat F16 yang menderu, drone dan helikopter Apache yang bising.Â <br />Begitu banyak yang dibuat dan didanai oleh AS.Â <br /><br />Obama - apakah Anda punya hati?Â <br /><br />Saya mengundang Anda untuk menghabiskan waktu satu malam, hanya satu malam dengan kami di Rumah Sakit Shifa. Mungkin Anda bisa menyamar sebagai petugas kebersihan.<br /><br />Saya yakin, 100 persen, itu akan mengubah sejarah.<br /><br />Tak seorang pun dengan hati dan kekuatan bisa berjalan pada malam hari di Shifa tanpa bertekad untuk mengakhiri pembantaian rakyat Palestina.<br /><br />Aliran sungai darah akan tetap mengalir setiap malam. Aku bisa mendengar telah ada instrumen kematian yang sedang didengungkan.<br /><br />Silakan lakukan yang Anda bisa lakukan.</em></p>', '', 'Minggu', '2016-07-31', '12:34:11', '7.jpg', 0, 'palestina', 'Y', 'N', ''),
(664, 48, 'admin', 'Jokowi janji mati-matian bela Palestina', '', '', 'jokowi-janji-matimatian-bela-palestina', 'N', 'Y', 'Y', '<p><strong>Merdeka.com -&nbsp;</strong><span>Capres&nbsp;</span><strong><a href="http://profil.merdeka.com/indonesia/j/joko-widodo/">Jokowi</a></strong><span>&nbsp;kembali menegaskan dukungannya untuk kemerdekaan 100 persen bagi Palestina.&nbsp;</span><strong><a href="http://profil.merdeka.com/indonesia/j/joko-widodo/">Jokowi</a></strong><span>&nbsp;berjanji akan mati-matian membela negeri yang dijepit Israel ini.</span><br /><br /><span>"Kita lihat apa yang mereka butuhkan. Mereka butuh tandatangan untuk dukungan ya kita tanda tangan. Mereka butuh diplomasi ya diplomasi. Butuh kedutaan ya kita buka kedutaan," kata&nbsp;</span><strong><a href="http://profil.merdeka.com/indonesia/j/joko-widodo/">Jokowi</a></strong><span>&nbsp;saat bertemu relawan seluruh Jakarta di GOR Yudo, Kelapa Gading, Kamis (26/6).</span><br /><br /><span>"Ini dukungan tanpa reserve," tegas&nbsp;</span><strong><a href="http://profil.merdeka.com/indonesia/j/joko-widodo/">Jokowi</a></strong><span>.</span><br /><br /><span>Sebelumnya&nbsp;</span><strong><a href="http://profil.merdeka.com/indonesia/j/joko-widodo/">Jokowi</a></strong><span>&nbsp;sudah menyatakan dukungannya pada kemerdekaan Palestina.&nbsp;</span><strong><a href="http://profil.merdeka.com/indonesia/j/joko-widodo/">Jokowi</a></strong><span>&nbsp;juga mendukung Palestina menjadi anggota Perserikatan Bangsa-Bangsa (PBB).</span><br /><br /><span>"Saya dan&nbsp;</span><strong><a href="http://profil.merdeka.com/indonesia/m/muhammad-jusuf-kalla/">JK</a></strong><span>&nbsp;mendukung penuh Palestina menjadi negara merdeka dan mendukung penuh Palestina menjadi anggota penuh Dewan Perserikatan Bangsa-Bangsa (PBB)," kata&nbsp;</span><strong><a href="http://profil.merdeka.com/indonesia/j/joko-widodo/">Jokowi</a></strong><span>&nbsp;dalam pemaparan visi misi di debat capres di Hotel Holiday Inn, Kemayoran, Jakarta Pusat, Minggu (22/6).</span></p><p><span>Bagaimana lontaran-lantaran Gubernur DKI Jakarta ini soal kebebasan Palestina dari tangan Israel. Tentu akan menarik jika kita menyaksikan secara langsung cara diplomasi yang dilakukan tokoh yang dikenal dengan blusukannya ini. Apakah Jokowi akan blusukan juga ke jalur Gaza? Atau hanya diplomasi wacana yang dilakukan para tokoh politik pada umumnya.</span></p><p><span style="color: #c0c0c0;">Sumber :&nbsp;http://www.merdeka.com/peristiwa/jokowi-janji-mati-matian-bela-palestina.html</span></p>', '', 'Kamis', '2014-07-24', '19:23:27', '', 63, 'nasional', 'Y', 'N', ''),
(665, 48, 'admin', 'Risma Akan Tolak Tawaran Jadi Menteri', '', '', 'jabatan-belum-tuntas-risma-akan-tolak-tawaran-jadi-menteri', 'N', 'Y', 'Y', '<h3>"Saya tidak ingin. Saya masih punya janji, saya di Surabaya saja."</h3><p><span>Wali Kota Surabaya Tri Rismaharini mengaku tidak tertarik masuk ke dalam kabinet Joko Widodo-Jusuf Kalla.&nbsp;</span><br /><br /><span>Risma mengatakan masih punya janji pada warga Surabaya. Sehingga dia ingin menuntaskan janjinya memimpin Surabaya hingga berakhir.</span><br /><br /><span>"Tidak, tidak. Saya tidak ingin (masuk kabinet). Saya masih punya janji, saya di Surabaya saja," kata Risma, Kamis 24 Juli 2014.</span><br /><br /><span>Hingga saat ini pun Risma mengaku belum mendapatkan tawaran apa pun untuk masuk dalam kabinet Jokowi-JK. Menurut Risma, selama bertemu dengan pimpinan partai, tak ada perbincangan soal kabinet.</span><br /><br /><span>Namun dia menegaskan kalaupun ada tawaran, dia tetap akan menuntaskan janjinya pada masyarakat Surabaya. "Kalau nanti ada yang&nbsp;</span><em>nawari</em><span>, ya nanti saja," ujarnya.</span><br /><br /><span>Di media sosial Facebook muncul polling nama-nama untuk duduk di kabinet Jokowi-JK. Salah satunya Tri Rismaharini. Wali Kota Surabaya itu ditempatkan sebagai Menteri Pendayagunaan Aparatur Negara dan Reformasi Birokrasi.</span><br /><br /><span>Polling itu diakui Jokowi untuk meminta masukan kepada masyarakat terkait siapa-siapa saja yang tepat untuk mengisi kabinetnya lima tahun ke depan.</span></p><p><span>Sumber :&nbsp;http://politik.news.viva.co.id/news/read/524505-jabatan-belum-tuntas--risma-akan-tolak-tawaran-jadi-menteri/</span></p>', '', 'Jumat', '2014-07-25', '13:18:31', '', 21, 'nasional', 'Y', 'N', ''),
(666, 19, 'admin', 'Pentax Q-S1 Kamera Mirorless Style Retro', '', '', 'pentax-qs1-kamera-mirorless-style-retro', 'N', 'Y', 'N', '<p>Q-S1 ini menawarkan ISO sampai 12,800 dengan kecepatan shutter sampai 1/2000 detik , selain itu kamera kompak ini pun menyertakan sensor gyro untuk mengurangi efek getaran atau goyangan. Kamera kompak retro ini pun mampu merekam video FULL HD dengan kecepatan 30fps dan mendukung 8 lensa yang kompatibel dengan Q-mount.</p><p>Ada juga fungsi efek digital filter sebanyak 17 buah untuk menghasilkan efek bokeh, plus ada tambahan 21 mode adegan/scene serta mode 11 custom image. Layar LCDnya berukuran 3 inci beresolusi 460K dengan teknologi anti pantulan dan mendukung 170 derajat sudut pandang.</p><p>Sayangnya kamera ini masih belum mendukung Wi-Fi yang mulai dibutuhkan untuk kemudahan berbagai foto.</p><p>Q-S1 akan tersedia pada awal September 2014 dengan harga sekitar 500 USD untuk body saja dan 637 USD untuk kit dengan lensa 5-15mm.</p>', '', 'Senin', '2014-08-11', '01:01:13', '', 4, 'teknologi', 'Y', 'N', ''),
(667, 19, 'admin', 'Apple iWatch Bakal Dirilis Bulan Depan', '', '', 'apple-iwatch-bakal-dirilis-bulan-depan', 'N', 'Y', 'N', '<p>iWatch yang sudah lama dinanti-nanti oleh banyak pihak bakal secara resmi diluncurkan. Salah satu orang yang punya reputasi bagus dalam membocorkan informasi produk Apple, John Gruber, menyatakan bahwa iWatch akan direlease bulan depan.</p><p>Peryataan seorang publisher asal Philadelphia ini memang dipercaya banyak orang sebagai kebenaran. Pasalnya, Apple akan menggelar event pada 9 September mendatang. Kemungkinan besar, iPhone 6 sekaligus iWatch bakal secara resmi direlease pada saat yang bersamaan saat itu juga. Keihatannya, Apple benar-benar sibuk untuk menyiapkan dua produk ini mengingat persaingann yang semakin berat. Dengan meluncurkan dua produk sekaligus, diharapkan bakal mendobrak pasar dan menciptakan momentum positif.</p><p>Smartwatch ini diprediksi akan direlease dengan inovasi yang &ldquo;out of the box&rdquo; cirikhas Apple. iWatch diberitakan bakal menggunakan beberapa sensor yang dapat metrik-metrik kesehatan, seperti tingkat tekanan darah, tingkat denyut jantung atau bahkan tingkat gula darah si pengguna. Meski begitu, masih menjadi pernyataan bagaimana kualitas sistem internet yang ada pada iWatch.</p>', '', 'Senin', '2014-08-11', '01:04:24', '', 3, 'teknologi', 'Y', 'N', ''),
(668, 19, 'admin', 'ROBOT Kecil Cikal Bakal Transformer', '', '', 'robot-kecil-cikal-bakal-transformer', 'N', 'Y', 'Y', '<p>Anda penyuka Transformer? Tentu hal yang paling menarik saat menonton film Transformer salah satunya adalah saat adegan transformasi yang begitu keren dari sebuah mobil atau truk menjadi robot yang gagah. Nah tapi jangan pernah berpikir kalau Transformer tidak mungkin terwujud di masa depan karena banyak film fiksi yang menjadi non fiksi berkat kecanggihan teknologi. Nah kali ini ada robot kecil yang mampu menampilkan kemampuan berubah diri dengan konsep lipatan karena terinspirasi dari ORIGAMI (seni melipat kertas Jepang) dan proses biologi.</p>\\r\\n<p>Walau robot yang Anda lihat ini bukan seperti robot keren seperti Transformer tapi robot origami hasil ciptaan periset dari MIT dan Harvard ini mampu merubah bentuk dari robot yang “datar” seperti kertas menjadi bentuk aslinya dengan empat kaki yang bisa berjalan.</p>\\r\\n<p>Desain robot ini juga terpinspirasi dari proses biologi seperti bagaimana amino acid membentuk protein dari struktur datar menjadi coil tiga dimensi.</p>\\r\\n<p>Robot ini memulai berubah bentuk saat panas diaplikasikan pada “ Shrinky dinks” (nama material yang digunakan) sebagai bagian dari materi kertas komposit yang digunakan pada tubuh robot ini. Memang tampilan robot ini sangat sederhana dan tidak menarik karena memang robot ini menggunakan bahan yang sangat murah dan mereka ingin menghasilkan prototipe pertama untuk konsep transformasi robot yang mereka pikirkan dalam waktu yang singkat.</p>', '', 'Minggu', '2016-07-31', '12:32:35', '6.jpg', 0, 'teknologi', 'Y', 'N', ''),
(669, 31, 'admin', '5 Buah Penangkal Racun dalam Tubuh', '', '', '5-buah-penangkal-racun-dalam-tubuh', 'N', 'Y', 'N', '<p><span>Setiap hari tubuh memproduksi racun yang berasal dari udara yang dihirup dan makanan yang dikonsumsi. Akhirnya, racun pun memengaruhi kesehatan kita. Kulit mengalami kerusakan, pencernaan yang bermasalah, sampai ketidakseimbangan hormon, merupakan akibat dari racun yang ada di dalam tubuh.</span><br /><br /><span>Maka itu, untuk membersihkan racun-racun dalam tubuh (detoksifikasi), dianjurkan untuk mengonsumsi beberapa jenis buah yang memiliki peran besar untuk hal ini. </span><br /><br /><span>Lemon kaya akan vitamin C, yang membantuh tubuh memproduksi glutation. Glutation adalah antioksidan yang membantu membuang racun yang ada di hati. Minum air lemon setiap hari, membantu mendetoksifikasi hati Anda. Selain sistem kekebalan yang baik, pencernaan pun turut merasakan manfaatnya.</span></p>\\r\\n<p><span>Buah nanas tidak hanya mengandung vitamin C, tapi juga mengandung enzim bromelain. Enzim ini dapat menenangkan dan membersihkan usus dari racun. Hal ini juga dikenal sebagai anti-inflamasi yang kuat, yang dapat membantu mengurangi rasa sakit akibat peradangan.</span></p>\\r\\n<p><span> </span></p>', '', 'Minggu', '2016-07-31', '12:32:25', '5.jpg', 2, 'kesehatan', 'Y', 'N', ''),
(670, 31, 'dewi', '7 Efek Buruk dari Konsumsi Obat Tidur', '', '', '7-efek-buruk-dari-konsumsi-obat-tidur', 'N', 'Y', 'N', '<p>Konsumsi obat tidur kerap dipilih bagi mereka yang mengalami kesulitan tidur atau insomnia. Mereka berpikir bahwa obat tidur mampu memberikan apa yang diinginkan, yaitu tidur dengan lelap. Namun kenyataannya, obat tidur tidak dapat mengobati kondisi tersebut, bahkan hanya memperburuk masalah saja. <br /><br />Di bawah ini beberapa jenis masalah terkait dengan pil tidur dan penggunaan yang terlalu berlebihan, seperti dikutip <em>Health Me Up</em>, Senin (11/8/2014):</p>\\r\\n<p>1. Efek samping dari obat tidur dapat membuat orang yang meminumnya merasa lupa, merasa pusing, bingung, dan sulit untuk berpikir keesokan harinya.</p>\\r\\n<p>2. Berlebihan dalam mengonsumsinya, akan memaksa Anda untuk meningkatkan asupannya agar Anda benar-benar tertidur. Sudah jelas, akan menimbulkan efek samping yang lebih besar.</p>\\r\\n<p>3. Terlalu sering mengonsumsi obat tidur akan membuat Anda ketergantungan yang berkepanjangan. Tidur lelap secara alami, tampaknya hanya mimpi yang jauh dari angan, yang hanya akan membuat Anda mengalami sulit tidur dan kerap merasa cemas.</p>\\r\\n<p>4. Jika Anda berhenti mengonsumsinya, secara perlahan tubuh akan menggigil, berkeringat, dan mual.</p>\\r\\n<p>5. Anda harus tahu bahwa obat tidur akan memengaruhi proses dari obat jenis lainnya yang sedang Anda konsumsi. Apakah itu obat pusing, demam, dan lain-lain.</p>\\r\\n<p>6. Kondisi akan semakin parah, saat Anda menggabungkannya dengan obat penghilang rasa sakit atau obat penenang.</p>\\r\\n<p>7. Anda harus menyadari bahwa masalah tidur mungkin menjadi pemicu terjadinya beberapa penyakit kesehatan mental, yang mendasari terjadinya gangguan tidur. Dan obat tidak selalu menjadi pilihan yang tepat.</p>', '', 'Minggu', '2016-07-31', '12:32:14', '4.jpg', 11, 'kesehatan', 'Y', 'N', ''),
(671, 23, 'admin', 'Ahli Kejiwaan Sebut Marshanda Keterlaluan', '', '', 'ahli-kejiwaan-sebut-marshanda-keterlaluan', 'N', 'Y', 'Y', '<p>LEWAT sebuah video berjudul “The Truth Part #1” yang diunggah ke Youtube Kamis (7/8) malam, Marshanda muncul menjelaskan insiden penjemputan paksa yang dia alami pada 26 Juli 2014 lalu.</p>\\r\\n<p>Saat itu, saat sedang berada di kamar apartemennya, Caca--sapaan akrabnya--mengaku didatangi oleh tak kurang dari 7 orang. Mereka terdiri dari 3 petugas dari rumah sakit jiwa, petugas kepolisian, petugas keamanan apartemen, serta pengurus apartemen.</p>\\r\\n<p>Pada kesempatan itu, menurut Caca, perawat laki-laki dan perempuan memaksa dirinya untuk disuntuk dan dibawa ke rumah sakit untuk diopname.</p>\\r\\n<p>“Aku enggak terima dan dengan hormat meminta mereka untuk keluar dari apartemen aku. Kareka aku sudah merasa enggak nyaman,” bilang ibu satu anak itu.</p>\\r\\n<p>Namun sang perawat tetap pada pendiriannya dan kemudian menelepon dr. Richard Budiman, dokter ahli kejiwaan yang selama ini menangani Caca. Telepon itu kemudian diberikan kepada Caca.</p>\\r\\n<p>“dr. Richard bilang, \\''Ca, beberapa hari ini kamu sudah keterlaluan lho, Ca. Sudah banyak tindakan kamu yang keluar jalur, sudah banyak diomongin di TV\\'',” Caca menirukan apa yang dikatakan dr. Richard di seberang telepon.</p>\\r\\n<p>“Saya enggak nangkap apa yang disebut keluar jalur secara psikis. Akhirnya saya bilang, yasudah dok, saya telepon pengacara saya dulu deh,” lanjutnya.</p>\\r\\n<p>Usaha Caca untuk menghubungi pengacara OC Kaligis saat itu sia-sia. Teleponnya tak diangkat. Karena terus didesak, bintang sinetron “Bidadari” itu akhirnya pasrah menerima suntikan di lengan kanan dan kirinya.</p>', '', 'Minggu', '2016-07-31', '12:32:03', '3.jpg', 3, 'selebritis,musik,metropolitan', 'Y', 'N', ''),
(674, 23, 'admin', 'Jessica Mila Menabung Untuk Bisnis Kuliner', '', '', 'jessica-mila-menabung-untuk-bisnis-kuliner', 'N', 'N', 'Y', '<p>Aneka komentar di Twitter tidak pernah dimasukkan ke hati olehÂ <a href=\\"http://tabloidbintang.com/profile/jessica-mila\\">Jessica Mila</a>, gadis berdarah Jawa, Belanda, dan Manado ini.Â </p>\\r\\n<p>\\"Ada juga yang memarahiku (di Twitter) gara-gara mutusin Tristan. Ada yang mengancam, katanya kalau enggak balik lagi, dia enggak mau menonton (GGS) lagi,\\" tambahnya.Â <br />Â Â  Â <br />Setelah meraih Sarjana Ekonomi Universitas Bina Nusantara Jakarta, Mila fokus pada kariernya. \\"Aku ingin fokus berkarier dulu. Sambil mengumpulkan modal, inginnya nanti bisnis. Antara bisnis kuliner dan bisnis salon,\\" beri tahu Mila.Â </p>\\r\\n<p>Selain sinetron, Mila pernah tampil dalam film Slank Nggak Ada Matinya dan Marmut Merah Jambu, tapi bukan pemeran utama.Â </p>\\r\\n<p>\\"Inginnya nanti ada film dengan aku sebagai pemeran utamanya. Ada tawaran, tapi enggak jadi karena didahului GGS,\\" bilang Mila yang semakin dikenal berkat GGS. \\"Sebelumnya lebih tahu muka, sekarang sudah tahu namanya juga,\\" Mila kembali bersyukur. Â </p>', '', 'Minggu', '2016-07-31', '12:30:46', '1.jpg', 70, 'selebritis,metropolitan,hiburan', 'N', 'N', ''),
(678, 48, 'robby', 'Polri Sudah Tangkap 12 Orang Teror Bom Sarinah', 'Pasca teror ledakan dan penyerangan yang dilakukan di kawasan Sarinah', '', 'polri-sudah-tangkap-12-orang-teror-bom-sarinah', 'Y', 'N', 'Y', '<div>Pasca teror ledakan dan penyerangan yang dilakukan di kawasan Sarinah, Jakarta, polisi sudah berhasil meringkus sebanyak 12 orang diduga terkait aksi tersebut. Penangkapan dilakukan sejak 14 Januari hingga sampai saat ini. 12 orang ditangkap di berbagai daerah Jabar, Jateng maupun Kaltim, ujar Badrodin saat jumpa pers di Mabes Polri, Jakarta, Sabtu (16/1/2016).</div><div><br /></div><div>Dari 12 orang yang diamankan kepolisian, lanjut Badrodin, pihaknya berhasil menyita barang bukti seperti senjata api laras pendek, enam magazine, lima HP dan serta barang bukti pendukung lainnya. Menurutnya, pihak polisi memiliki waktu selama seminggu guna pengembangan kasus untuk menentukan peran masing-masing dari mereka dalam aksi teror di Sarinah. Nama (yang diamankan) teknis penyidikan, tidak bisa kami sampaikan, ujar jenderal polisi bintang empat ini.Â </div><div>Â </div><div>Pasca teror ledakan dan penyerangan yang dilakukan di kawasan Sarinah, Jakarta, polisi sudah berhasil meringkus sebanyak 12 orang diduga terkait aksi tersebut. Penangkapan dilakukan sejak 14 Januari hingga sampai saat ini. 12 orang ditangkap di berbagai daerah Jabar, Jateng maupun Kaltim, ujar Badrodin saat jumpa pers di Mabes Polri, Jakarta, Sabtu (16/1/2016).</div><div><br /></div><div>Dari 12 orang yang diamankan kepolisian, lanjut Badrodin, pihaknya berhasil menyita barang bukti seperti senjata api laras pendek, enam magazine, lima HP dan serta barang bukti pendukung lainnya. Menurutnya, pihak polisi memiliki waktu selama seminggu guna pengembangan kasus untuk menentukan peran masing-masing dari mereka dalam aksi teror di Sarinah. Nama (yang diamankan) teknis penyidikan, tidak bisa kami sampaikan, ujar jenderal polisi bintang empat ini. </div><div>Â </div><div>Pasca teror ledakan dan penyerangan yang dilakukan di kawasan Sarinah, Jakarta, polisi sudah berhasil meringkus sebanyak 12 orang diduga terkait aksi tersebut. Penangkapan dilakukan sejak 14 Januari hingga sampai saat ini. 12 orang ditangkap di berbagai daerah Jabar, Jateng maupun Kaltim, ujar Badrodin saat jumpa pers di Mabes Polri, Jakarta, Sabtu (16/1/2016).</div><div><br /></div><div>Dari 12 orang yang diamankan kepolisian, lanjut Badrodin, pihaknya berhasil menyita barang bukti seperti senjata api laras pendek, enam magazine, lima HP dan serta barang bukti pendukung lainnya. Menurutnya, pihak polisi memiliki waktu selama seminggu guna pengembangan kasus untuk menentukan peran masing-masing dari mereka dalam aksi teror di Sarinah. Nama (yang diamankan) teknis penyidikan, tidak bisa kami sampaikan, ujar jenderal polisi bintang empat ini. Â </div>', 'Salah satu Foto Pelaku Bom Sarinah, Jakarta', 'Minggu', '2016-01-17', '15:01:32', 'foto.jpg', 58, 'hukum,nasional', 'N', 'N', ''),
(684, 54, 'dewi', 'Banyak Ditemukan Error Pada Beberapa Aplikasiii', 'Cara Mengatasi Error Pada Beberapa Aplikasi di Software Area', 'https://www.youtube.com/embed/vqZBUrQdhXw', 'banyak-ditemukan-error-pada-beberapa-aplikasiii', 'N', 'N', 'N', '<p>Gloria Natapradja Setelah perjuangan Gloria ingin menjadi salah seorang dari anggota Paskibraka (Pasukan Pengibar Bendera Pusaka ) Nasional 2016 pupus, kabar terbarunya yang pasti akanmembuat semangat gadis cantik asal Kota Depok kembali bangkit adalah ia akan diangkat menjadi Duta Olahraga, hal ini secar alangsung diungkapkan oleh Kemenpora kepada awak media belum lama ini. Seperti diketahui, gagalnya Gloria jadi Paskibraka karena masalah dua kewarganegaraan yang ia miliki yaitu Perancis dan Indonesia. Kabar Gloria Natapradja akan diangkat menjadi duta olahraga diungkapkan langsung oleh Imam nachrawi kepada wak media belum lama ini, ia sangat berniat menjadikan Gloria yang dikenal wanita tangguh dan ramah ini menjadi bagian dari Kemenpora kedepannya setelah ia dicoret menjadi anggota Paskibraka Nasional 2016. Menteri Pemuda dan Olahraga (Menpora) Imam Nachrawi di kompleks Parlemen mengatkan harapanya jika hal ini bisa terjadi, karen aia menganggap jika Gloria adalah perempuan tangguh dan perlu diberikan support terbaik dan menjadi teladan bagi pemuda yang lain.</p>', 'Si Kembar dan Kawan-kawan', 'Senin', '2016-08-22', '13:02:57', 'foto_kembar_21.jpg', 5, 'yahudi,film,hukum,wisata', 'N', 'N', ''),
(688, 22, 'dewi', 'Lowongan Kerja Programmer Junior, Senior, System Analys', 'Dibutuhkan cepat programmer junior', '', 'lowongan-kerja-programmer-junior-senior-system-analys', 'N', 'N', 'N', '<p>PT IFARS Pharmaceutical Laboratories, perusahaan yang bergerak dibidang manufaktur farmasi. PT IFARS Pharmaceutical Laboratories, perusahaan yang bergerak dibidang manufaktur farmasi perusahaan yang bergerak dibidang manufaktur farmasi.</p><p>Silahkan kirim surat lamaran anda disertai dengan CV, foto 4×6 berwarna (1), fotocopy KTP, fotocopy ijazah atau SKL, fotocopy transkrip akademik, surat keterangan sehat dari dokter (asli), fotokopy SKCK (1), serta surat pendukung yang lain ke Email : hrd@ifars.co.id, Pos : PT IFARS Pharmaceutical Laboratories Jl. Raya Solo-Sragen Km 14,9 Kebakkramat Karanganyar.</p>', 'PT IFARS Pharmaceutical Laboratories', 'Senin', '2016-08-22', '13:02:44', 'lowker2.jpg', 106, 'teknologi,nasional,hiburan', 'Y', 'N', ''),
(692, 36, 'netipli', 'Stik PC atau Gamepad single TURBO kualitas Super', 'Stik PC Kualitas premium atau super bukan merek abal-abal', '', 'stik-pc-atau-gamepad-single-turbo-kualitas-super', 'N', 'N', 'N', '<p>Khamenei dikenal sebagai musuh besar Israel. Beberapa komentarnya membuat panas telinga pemimpin Israel.&nbsp;Komentar paling pedas Khamenei adalah Iran tidak pernah mengenal Israel. Negara ini juga secara terang-terangan mendukung Hamas. Hamas sendiri sudah dimasukan ke dalam daftar hitam terorisme oleh Israel.<br />\r\n<br />\r\nSelain itu, Khamenei dan beberapa pemimpin Iran berjanji akan menghilangkan Israel dari peta dunia. Bahkan, beberapa pekan lalu, Khamenei menyatakan peristiwa pembantaian warga Yahudi oleh Nazi satu abad lalu, hanyalah sebuah ilusi yang tak nyata.</p>\r\n', 'Stik Warna Kuning', 'Minggu', '2016-09-18', '18:41:44', '01.jpg', 135, 'teknologi,hiburan', 'Y', 'N', '');

-- --------------------------------------------------------

--
-- Table structure for table `berita_bayar_bonus`
--

CREATE TABLE `berita_bayar_bonus` (
  `id_berita_bayar_bonus` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `bonus_publish` int(11) NOT NULL,
  `waktu_bayar` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita_bayar_bonus`
--

INSERT INTO `berita_bayar_bonus` (`id_berita_bayar_bonus`, `username`, `bonus_publish`, `waktu_bayar`) VALUES
(1, 'dewi', 10000, '2016-08-17 23:37:16'),
(2, 'dewi', 10000, '2016-08-17 23:26:24'),
(3, 'dewi', 5000, '2016-09-21 20:01:54');

-- --------------------------------------------------------

--
-- Table structure for table `berita_catatan`
--

CREATE TABLE `berita_catatan` (
  `id_berita_catatan` int(11) NOT NULL,
  `id_berita` int(11) NOT NULL,
  `catatan` text NOT NULL,
  `waktu_catatan` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita_catatan`
--

INSERT INTO `berita_catatan` (`id_berita_catatan`, `id_berita`, `catatan`, `waktu_catatan`) VALUES
(1, 670, 'Tolong Beritanya lebih dirapikan lagi, dan jangan lupa untuk Bekerja keras, namun selalu merasa cukup, mencintai berbuat baik dan berbagi, senantiasa bersyukur', '2016-08-17 14:10:14'),
(2, 672, 'Berita sudah Bagus, Tapi perlu diganti gambarnya dengan yang cocok.', '2016-08-17 13:15:24'),
(3, 670, 'Beritanya sudah Rapi, Kalau bisa gambarnya tolong diperbanyak,..', '2016-08-17 04:13:14');

-- --------------------------------------------------------

--
-- Table structure for table `berita_komentar`
--

CREATE TABLE `berita_komentar` (
  `id_komentar` int(5) NOT NULL,
  `id_berita` int(5) NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `isi_komentar` text COLLATE latin1_general_ci NOT NULL,
  `tgl_komentar` date NOT NULL,
  `jam_komentar` time NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `berita_komentar`
--

INSERT INTO `berita_komentar` (`id_komentar`, `id_berita`, `username`, `isi_komentar`, `tgl_komentar`, `jam_komentar`, `aktif`) VALUES
(155, 688, 'laura', 'Saya Berikan Komentar, Programmer Junior, Programmer Senior, System Analys', '2016-09-18', '13:45:57', 'Y'),
(149, 688, 'netipli', 'Setelah membentuk Timnas, PSSI versi KLB pimpinan La Nyalla Mahmud Matalitti menunjuk Alfred Riedl sebagai pelatihnya.', '2014-08-09', '17:34:35', 'Y'),
(152, 650, 'laura', ' Pemimpin  tertinggi  Iran,  Ayatollah  Ali  Khamenei  menyampaikan  pernyataan  kontroversial  terkait  ketegangan  di  Gaza.  Khamenei  mendorong  agar  Palestina  terus  melawan  Israel.   ', '2014-08-17', '17:46:28', 'Y'),
(154, 688, 'dewi', 'Pharmaceutical Laboratories, perusahaan yang bergerak dibidang manufaktur farmasi?', '2016-09-18', '11:43:57', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `berita_penghasilan`
--

CREATE TABLE `berita_penghasilan` (
  `id_berita_penghasilan` int(11) NOT NULL,
  `id_berita` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `waktu_publish` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita_penghasilan`
--

INSERT INTO `berita_penghasilan` (`id_berita_penghasilan`, `id_berita`, `jumlah`, `waktu_publish`) VALUES
(1, 672, 12000, '2016-08-17 09:07:21'),
(3, 670, 15000, '2016-08-17 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `berita_view`
--

CREATE TABLE `berita_view` (
  `id_berita_view` int(11) NOT NULL,
  `id_berita` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal_view` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita_view`
--

INSERT INTO `berita_view` (`id_berita_view`, `id_berita`, `jumlah`, `tanggal_view`) VALUES
(1, 688, 2, '2016-08-22'),
(2, 672, 2, '2016-08-22'),
(3, 684, 4, '2016-08-22'),
(4, 688, 2, '2016-08-30'),
(5, 688, 2, '2016-09-06'),
(6, 688, 2, '2016-09-18'),
(7, 669, 2, '2016-09-18'),
(8, 671, 2, '2016-09-18'),
(9, 662, 4, '2016-09-18'),
(10, 672, 2, '2016-09-18'),
(11, 690, 4, '2016-09-18'),
(12, 691, 1, '2016-09-18'),
(13, 692, 17, '2016-09-18'),
(14, 631, 10, '2016-09-18'),
(15, 692, 17, '2016-09-19'),
(16, 670, 10, '2016-09-19'),
(17, 615, 1, '2016-09-19'),
(18, 627, 1, '2016-09-21'),
(19, 692, 17, '2016-09-21'),
(20, 608, 2, '2016-09-21'),
(21, 684, 4, '2016-09-21'),
(22, 641, 1, '2016-09-21'),
(23, 662, 1, '2016-09-21'),
(24, 688, 2, '2016-09-21'),
(25, 661, 1, '2016-09-21'),
(26, 672, 2, '2016-09-21'),
(27, 610, 2, '2016-09-21'),
(28, 692, 1, '2016-09-22'),
(29, 688, 2, '2016-09-22'),
(30, 692, 1, '2016-09-23'),
(31, 688, 2, '2016-09-23'),
(32, 692, 1, '2016-10-09');

-- --------------------------------------------------------

--
-- Table structure for table `halamanstatis`
--

CREATE TABLE `halamanstatis` (
  `id_halaman` int(5) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `judul_seo` varchar(100) NOT NULL,
  `isi_halaman` text NOT NULL,
  `tgl_posting` date NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `dibaca` int(5) NOT NULL DEFAULT '1',
  `jam` time NOT NULL,
  `hari` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `halamanstatis`
--

INSERT INTO `halamanstatis` (`id_halaman`, `judul`, `judul_seo`, `isi_halaman`, `tgl_posting`, `gambar`, `username`, `dibaca`, `jam`, `hari`) VALUES
(46, 'Tentang Kami Tunggul News', 'tentang-kami-tunggul-news', '<p>Tunggul.com merupakan portal online berita dan hiburan yang berfokus pada pembaca Indonesia baik yang berada di tanah air maupun yang tinggal di luar negeri. Berita Tunggul.com diupdate selama 24 jam dan mendapatkan kunjungan lebih dari 190 juta pageviews setiap bulannya (Sumber: Google Analytics).</p>\r\n<p>Tunggul.com memiliki beragam konten dari berita umum, politik, peristiwa, internasional, ekonomi, lifestyle, selebriti, sports, bola, auto, teknologi, dan lainya. Tunggul juga merupakan salah satu portal pertama yang memberikan inovasi konten video dan mobile (handphone). Para pembaca kami adalah profesional, karyawan kantor, pengusaha, politisi, pelajar, dan ibu rumah tangga.</p>\r\n<p>Konten berita Tunggul.com ditulis secara tajam, singkat, padat, dan dinamis sebagai respons terhadap tuntutan masyarakat yang semakin efisien dalam membaca berita. Selain itu konsep portal berita online juga semakin menjadi pilihan masyarakat karena sifatnya yang up-to-date dan melaporkan kejadian peristiwa secara instant pada saat itu juga sehingga masyarakat tidak perlu menunggu sampai esok harinya untuk membaca berita yang terjadi.</p>\r\n<p>Tunggul.com resmi diluncurkan (Commercial Launch) sebagai portal berita pada 1 Maret 2007) dan merupakan cikal-bakal bisnis online pertama milik PT Php MU Tbk, sebuah perusahan media terintegrasi yang terbesar di Indonesia dan di Asia Tenggara. PHPMU juga memiliki dan mengelola bisnis media TV (RCTI, MNC TV, Global TV), media cetak (Koran Seputar Indonesia, Tabloid Genie, Tabloid Mom &amp; Kiddie, majalah HighEnd, dan Trust), media radio (SINDO, Trijaya FM, ARH Global, Radio Dangdut Indonesia, V Radio), serta sejumlah bisnis media lainnya (mobile VAS, Manajemen artis, rumah produksi film, agen iklan, dll).</p>\r\n<p>Sampai dengan bulan Oktober 2008, Tunggul.com mendapatkan peringkat ke 24 dari Top 100 website terpopuler di Indonesia (Sumber: Alexa.com), peringkat ini terus naik yang disebabkan semakin banyak pengunjung situs yang mengakses Tunggul.com setiap harinya. Selain itu, jumlah pengguna internet yang mencapai 25 juta (Sumber: data APJII per 2005) diperkirakan untuk terus tumbuh dengan signifikan dalam beberapa tahun ke depan.</p>', '2014-04-07', '', 'admin', 103, '13:10:57', 'Senin'),
(48, 'Alamat Perusahaan', 'alamat-perusahaan', '<p>Tunggul.com merupakan portal online berita dan hiburan yang berfokus pada pembaca Indonesia baik yang berada di tanah air maupun yang tinggal di luar negeri. Berita Tunggul.com diupdate selama 24 jam dan mendapatkan kunjungan lebih dari 190 juta pageviews setiap bulannya (Sumber: Google Analytics).</p>\\\\r\\\\n<p>\\\\r\\\\n</p>\\\\r\\\\n<p>Tunggul.com memiliki beragam konten dari berita umum, politik, peristiwa, internasional, ekonomi, lifestyle, selebriti, sports, bola, auto, teknologi, dan lainya. Tunggul juga merupakan salah satu portal pertama yang memberikan inovasi konten video dan mobile (handphone). Para pembaca kami adalah profesional, karyawan kantor, pengusaha, politisi, pelajar, dan ibu rumah tangga.</p>\\\\r\\\\n<p>\\\\r\\\\n</p>\\\\r\\\\n<p>Tunggul.com memiliki beragam konten dari berita umum, politik, peristiwa, internasional, ekonomi, lifestyle, selebriti, sports, bola, auto, teknologi, dan lainya. Tunggul juga merupakan salah satu portal pertama yang memberikan inovasi konten video dan mobile (handphone). Para pembaca kami adalah profesional, karyawan kantor, pengusaha, politisi, pelajar, dan ibu rumah tangga.</p>', '2016-05-15', '', 'admin', 9, '07:21:46', 'Senin');

-- --------------------------------------------------------

--
-- Table structure for table `hubungi`
--

CREATE TABLE `hubungi` (
  `id_hubungi` int(5) NOT NULL,
  `nama` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `subjek` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `pesan` text COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `dibaca` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `hubungi`
--

INSERT INTO `hubungi` (`id_hubungi`, `nama`, `email`, `subjek`, `pesan`, `tanggal`, `jam`, `dibaca`) VALUES
(34, 'Landung Trilaksono', 'landungtrilaksono@gmail.com', 'Nomer kontak jurusan akuntansi', 'Maaf saya mau hubungi jurusan akuntansi di nomer berapa ya? Terima kasih', '2013-10-16', '00:00:00', 'Y'),
(35, 'yusri renor', 'aciafifah@gmail.com', 'pertanyaan', 'bagaimana cara mengunduh nomor ujian fak. pertanian', '2014-01-19', '00:00:00', 'Y'),
(36, 'Lusi Rahmawati', 'robby.prihandaya@gmail.com', 'xvgxcvxc', 'gbvibviubuibiub', '2014-07-02', '00:00:00', 'Y'),
(38, 'Udin Sedunia', 'udin.sedunia@gmail.com', 'Ip Pengirim : 120.177.28.244', 'Silahkan menghubungi kami melalui private message melalui form yang berada pada bagian kanan halaman ini. Kritik dan saran Anda sangat penting bagi kami untuk terus meningkatkan kualitas produk dan layanan yang kami berikan kepada Anda.', '2015-06-02', '00:00:00', 'Y'),
(39, 'Robby Prihandaya', 'robby.prihandaya@gmail.com', 'Mau tanya Sesuatu', 'November ini,  Indonesia akan disuguhkan salah satu konser megah dari legenda musik dunia yaitu Elton John', '2016-05-12', '19:33:58', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `identitas`
--

CREATE TABLE `identitas` (
  `id_identitas` int(5) NOT NULL,
  `nama_website` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `url` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `facebook` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `rekening` varchar(100) NOT NULL,
  `no_telp` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `meta_deskripsi` varchar(250) NOT NULL,
  `meta_keyword` varchar(250) NOT NULL,
  `favicon` varchar(50) NOT NULL,
  `maps` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `identitas`
--

INSERT INTO `identitas` (`id_identitas`, `nama_website`, `email`, `url`, `facebook`, `rekening`, `no_telp`, `meta_deskripsi`, `meta_keyword`, `favicon`, `maps`) VALUES
(1, 'PT. TUNAS HARMONI ABADI', 'robby.prihandaya1@gmail.com', 'http://localhost/thanet', 'https://www.facebook.com/robbyprihandaya, https://twitter.com/robbyprihandaya', '3511887071', '081267771344', 'Menyajikan berita terbaru, tercepat, dan terpercaya seputar tunggul hitam.', 'berita, terbaru, terpercaya, terpopuler, tercepat', 'favicon.png', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3989.3358607198243!2d100.35483479999999!3d-0.8910373999999999!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4b8aa1a4e0441%3A0x3f81ebb48d31a38b!2sTunggul+Hitam%2C+Padang+Utara%2C+Kota+Padang%2C+Sumatera+Barat+25173!5e0!3m2!1sid!2sid!4v1408275531365');

-- --------------------------------------------------------

--
-- Table structure for table `iklantengah`
--

CREATE TABLE `iklantengah` (
  `id_iklantengah` int(5) NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `iklantengah`
--

INSERT INTO `iklantengah` (`id_iklantengah`, `judul`, `username`, `url`, `gambar`, `tgl_posting`) VALUES
(1, 'Iklan Home Utama 728 x 90', 'admin', 'http://phpmu.com', '728x90.jpg', '2016-05-16'),
(2, 'Iklan detail berita 728 x 15', 'admin', 'http://phpmu.com', '728x15.jpg', '2016-09-20'),
(3, 'Iklan detail berita 728 x 90', 'admin', 'http://phpmu.com', '728x90.jpg', '2016-09-20');

-- --------------------------------------------------------

--
-- Table structure for table `jual_beli`
--

CREATE TABLE `jual_beli` (
  `id_jual_beli` int(11) NOT NULL,
  `id_berita` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` varchar(50) NOT NULL,
  `foto` text NOT NULL,
  `jumlah` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jual_beli`
--

INSERT INTO `jual_beli` (`id_jual_beli`, `id_berita`, `nama_produk`, `harga`, `berat`, `foto`, `jumlah`) VALUES
(4, 692, 'Stik PC atau Gamepad single TURBO kualitas Super', 95000, '120 Gram', '11.jpg,21.jpg,31.jpg,12.jpg,22.jpg,32.jpg', '1 Kotak');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(5) NOT NULL,
  `nama_kategori` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `kategori_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `sidebar` int(10) NOT NULL,
  `komisi` enum('Y','N') COLLATE latin1_general_ci NOT NULL,
  `lowker` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `jual_beli` enum('Y','N') COLLATE latin1_general_ci NOT NULL,
  `level_user` enum('penulis','user') COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `username`, `kategori_seo`, `aktif`, `sidebar`, `komisi`, `lowker`, `jual_beli`, `level_user`) VALUES
(19, 'Teknologi', '', 'teknologi', 'Y', 2, 'Y', 'N', 'N', 'penulis'),
(21, 'Ekonomi', '', 'ekonomi', 'N', 0, 'Y', 'N', 'N', 'penulis'),
(22, 'Lowongan Kerja', '', 'lowker', 'Y', 0, 'N', 'Y', 'N', 'penulis'),
(23, 'Hiburan', '', 'hiburan', 'Y', 3, 'Y', 'N', 'N', 'penulis'),
(31, 'Kesehatan ', '', 'kesehatan-', 'Y', 0, 'Y', 'N', 'N', 'penulis'),
(36, 'Jual Beli', '', 'jual-beli', 'Y', 0, 'N', 'N', 'Y', 'user'),
(34, 'Seni & Budaya', '', 'seni--budaya', 'N', 0, 'Y', 'N', 'N', 'penulis'),
(37, 'Sekitar Kita', '', 'sekitar-kita', 'N', 0, 'Y', 'N', 'N', 'penulis'),
(39, 'Internasional', '', 'internasional', 'Y', 1, 'Y', 'N', 'N', 'penulis'),
(40, 'Kuliner', '', 'kuliner', 'Y', 0, 'Y', 'N', 'N', 'penulis'),
(41, 'Metropolitan', '', 'metropolitan', 'N', 0, 'Y', 'N', 'N', 'penulis'),
(42, 'Dunia Islam', '', 'dunia-islam', 'N', 0, 'Y', 'N', 'N', 'penulis'),
(44, 'Wisata', '', 'wisata', 'N', 0, 'Y', 'N', 'N', 'penulis'),
(46, 'Daerah', '', 'daerah', 'N', 0, 'Y', 'N', 'N', 'penulis'),
(47, 'Gaya Hidup', '', 'gaya-hidup', 'N', 0, 'Y', 'N', 'N', 'penulis'),
(48, 'Hukum', '', 'hukum', 'N', 0, 'Y', 'N', 'N', 'penulis'),
(53, 'Tokoh', 'admin', 'tokoh', 'N', 0, 'Y', 'N', 'N', 'penulis'),
(54, 'Tutorial', 'admin', 'tutorial', 'Y', 0, 'Y', 'N', 'N', 'penulis'),
(2, 'Olahraga', 'admin', 'olahraga', 'Y', 4, 'Y', 'N', 'N', 'penulis');

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `id_logo` int(5) NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id_logo`, `gambar`) VALUES
(15, 'header.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `lowker`
--

CREATE TABLE `lowker` (
  `id_lowker` int(11) NOT NULL,
  `id_berita` int(11) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `posisi` varchar(255) NOT NULL,
  `propinsi` varchar(100) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `alamat_lengkap` text NOT NULL,
  `tanggal_berakhir` varchar(255) NOT NULL,
  `syarat_syarat` text NOT NULL,
  `kontak` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lowker`
--

INSERT INTO `lowker` (`id_lowker`, `id_berita`, `nama_perusahaan`, `posisi`, `propinsi`, `kota`, `alamat_lengkap`, `tanggal_berakhir`, `syarat_syarat`, `kontak`) VALUES
(1, 688, 'PT IFARS Pharmaceutical Laboratories', 'Programmer Junior, Programmer Senior, System Analys', 'Padang', 'Sumatera Barat', 'Jl. Raya Solo-Sragen Km 14,9 Kebakkramat Karanganyar.', 'Pendaftaran ditutup tanggal 7 September 2016 pukul 24.00 WIB.', 'Berpengalaman kerja minimal 2 tahun. Memahami Front End dan Back End. Bermotivasi tinggi untuk berkembang, inovatif, serta inisiatif.', 'No Telp. 0751461695 / Email. perusahaan@programmer.com');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(5) NOT NULL,
  `id_parent` int(5) NOT NULL DEFAULT '0',
  `nama_menu` varchar(30) NOT NULL,
  `link` varchar(100) NOT NULL,
  `aktif` enum('Ya','Tidak') NOT NULL DEFAULT 'Ya',
  `position` enum('Top','Bottom') DEFAULT 'Bottom',
  `urutan` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `id_parent`, `nama_menu`, `link`, `aktif`, `position`, `urutan`) VALUES
(8, 0, 'Informasi', '#', 'Ya', 'Bottom', 4),
(7, 0, 'Home Page', '', 'Ya', 'Bottom', 1),
(11, 8, 'Politik', 'berita/kategori/politik', 'Ya', 'Bottom', 1),
(12, 8, 'Ekonomi', 'berita/kategori/ekonomi', 'Ya', 'Bottom', 2),
(125, 0, 'Login', 'auth/login', 'Ya', 'Top', 1),
(14, 8, 'Teknologi', 'berita/kategori/teknologi', 'Ya', 'Bottom', 3),
(113, 0, 'Tentang Kami', 'page/detail/tentang-kami-tunggul-news', 'Ya', 'Bottom', 2),
(134, 0, 'Lowongan Kerja', 'berita/kategori/lowker', 'Ya', 'Bottom', 6),
(116, 0, 'Contact Us', 'contact', 'Ya', 'Bottom', 7),
(127, 0, 'Semua Berita', 'berita', 'Ya', 'Bottom', 3),
(126, 0, 'Register', 'auth/register', 'Ya', 'Top', 2),
(132, 8, 'Internasional', 'berita/kategori/internasional', 'Ya', 'Bottom', 5),
(133, 0, 'Jual Beli', 'berita/kategori/jual-beli', 'Ya', 'Bottom', 5);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `message` text CHARACTER SET latin1 NOT NULL,
  `file_upload` varchar(255) CHARACTER SET latin1 NOT NULL,
  `user1` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `user2` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip_address` varchar(40) CHARACTER SET latin1 NOT NULL,
  `stat` int(2) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message`, `file_upload`, `user1`, `user2`, `date_time`, `ip_address`, `stat`) VALUES
(1, 'Halooo Dewii,..', '', 'admin', 'dewi', '2016-08-20 08:48:59', '127.0.0.1', 0),
(2, 'Haloo Juga mas Robby Prihandaya,..', '', 'dewi', 'admin', '2016-08-20 14:14:51', '::1', 0),
(3, 'Ini mas filenya,..', 'mapel_dek.csv', 'dewi', 'admin', '2016-08-20 14:22:16', '::1', 0),
(4, 'Maaf mas, ini saya kirimkan lagi,..', 'halaman_baru.jpg', 'dewi', 'admin', '2016-08-20 14:22:58', '::1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `messages_chat`
--

CREATE TABLE `messages_chat` (
  `id_chat` int(11) NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `pesan` text CHARACTER SET latin1 NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modul`
--

CREATE TABLE `modul` (
  `id_modul` int(5) NOT NULL,
  `nama_modul` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `link` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `static_content` text COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `publish` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `status` enum('user','admin') COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `urutan` int(5) NOT NULL,
  `link_seo` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `modul`
--

INSERT INTO `modul` (`id_modul`, `nama_modul`, `username`, `link`, `static_content`, `gambar`, `publish`, `status`, `aktif`, `urutan`, `link_seo`) VALUES
(2, 'Manajemen User', '', 'administrator/user', '', '', 'Y', 'user', 'Y', 22, ''),
(18, ' Berita', '', 'administrator/berita', '', '', 'Y', 'user', 'Y', 5, 'semua-berita.html'),
(19, 'Iklan Utama', '', 'administrator/banner', '', '', 'N', 'user', 'N', 9, ''),
(10, 'Manajemen Modul', '', 'administrator/modul', '', '', 'Y', 'user', 'Y', 23, ''),
(31, 'Kategori Berita ', '', 'administrator/kategori', '', '', 'Y', 'user', 'Y', 6, ''),
(33, 'Jajak Pendapat', '', 'administrator/poling', '', '', 'Y', 'user', 'Y', 18, ''),
(34, 'Tag Berita', '', 'administrator/tag', '', '', 'Y', 'user', 'Y', 7, ''),
(35, 'Komentar Berita', '', 'administrator/komentar', '', '', 'Y', 'user', 'Y', 8, ''),
(41, 'Agenda Padang', '', 'administrator/agenda', '', '', 'Y', 'user', 'Y', 17, 'semua-agenda.html'),
(43, 'Berita Foto', '', 'administrator/album', '', '', 'Y', 'user', 'Y', 11, ''),
(44, 'Galeri Berita Foto', '', 'administrator/galerifoto', '', '', 'Y', 'user', 'Y', 12, ''),
(45, 'Template Web', '', 'administrator/templates', '', '', 'Y', 'user', 'Y', 16, ''),
(46, 'Sensor Kata', '', 'administrator/katajelek', '', '', 'Y', 'user', 'Y', 10, ''),
(61, 'Identitas Website', '', 'administrator/identitas', '', '', 'Y', 'user', 'Y', 1, ''),
(57, 'Menu Utama', '', 'administrator/menuutama', '', '', 'Y', 'user', 'Y', 2, ''),
(58, 'Sub Menu', '', 'administrator/submenu', '', '', 'Y', 'user', 'Y', 3, ''),
(59, 'Halaman Baru', '', 'administrator/halamanstatis', '', '', 'Y', 'user', 'Y', 4, ''),
(62, 'Video', '', 'administrator/video', '', '', 'Y', 'user', 'Y', 13, ''),
(63, 'Playlist Video', '', 'administrator/playlist', '', '', 'Y', 'user', 'Y', 14, ''),
(64, 'Tag Video', '', 'administrator/tagvid', '', '', 'Y', 'user', 'Y', 15, ''),
(65, 'Komentar Video', '', 'administrator/komentarvid', '', '', 'Y', 'user', 'Y', 15, ''),
(66, 'Logo Website', '', 'administrator/logo', '', '', 'Y', 'user', 'Y', 15, ''),
(67, 'Iklan Layanan', '', 'administrator/iklanatas', '', '', 'N', 'admin', 'N', 19, ''),
(68, 'Iklan Depan', '', 'administrator/iklantengah', '', '', 'N', 'admin', 'N', 20, ''),
(69, 'Iklan Kiri', '', 'administrator/pasangiklan', '', '', 'N', 'admin', 'N', 21, ''),
(70, 'Hubungi Kami', '', 'administrator/hubungi', '', '', 'Y', 'user', 'Y', 24, '');

-- --------------------------------------------------------

--
-- Table structure for table `pasangiklan`
--

CREATE TABLE `pasangiklan` (
  `id_pasangiklan` int(5) NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `pasangiklan`
--

INSERT INTO `pasangiklan` (`id_pasangiklan`, `judul`, `username`, `url`, `gambar`, `tgl_posting`) VALUES
(1, 'Iklan Sidebar Kanan 300 x 1050', 'admin', 'http://phpmu.com', '300x1050.jpg', '2014-06-22'),
(2, 'Iklan Halaman Detail Berita 336 x 280', 'admin', 'http://phpmu.com', '336x280.jpg', '2016-09-20');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id_slide` int(5) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id_slide`, `keterangan`, `gambar`, `waktu`) VALUES
(1, 'Ribuan Orang dari Seluruh Pelosok Indonesia Telah Bergabung Bersama Kami.', 'slide2.jpg', '2016-05-13 08:09:18'),
(2, 'Selamat Datang Di PT. Tunas Harmoni Abadi, Makassar, Indonesia.', 'slide.jpg', '2016-05-13 08:10:18');

-- --------------------------------------------------------

--
-- Table structure for table `statistik`
--

CREATE TABLE `statistik` (
  `ip` varchar(20) NOT NULL DEFAULT '',
  `tanggal` date NOT NULL,
  `hits` int(10) NOT NULL DEFAULT '1',
  `online` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statistik`
--

INSERT INTO `statistik` (`ip`, `tanggal`, `hits`, `online`) VALUES
('223.255.231.148', '2014-05-06', 1, '1399357334'),
('223.255.231.147', '2014-05-15', 3, '1400119147'),
('223.255.224.73', '2014-05-15', 12, '1400123797'),
('223.255.224.69', '2014-05-16', 2, '1400215103'),
('118.96.51.231', '2014-05-16', 19, '1400233044'),
('223.255.231.146', '2014-05-16', 2, '1400228049'),
('::1', '2014-06-20', 2, '1403230579'),
('::1', '2014-06-22', 8, '1403436591'),
('223.255.231.154', '2014-06-26', 1, '1403739948'),
('223.255.231.148', '2014-06-26', 6, '1403745715'),
('223.255.224.74', '2014-06-26', 1, '1403748060'),
('223.255.224.69', '2014-06-26', 1, '1403753239'),
('223.255.224.77', '2014-06-29', 1, '1404039342'),
('::1', '2014-07-02', 6, '1404277263'),
('127.0.0.1', '2014-07-17', 2, '1405582494'),
('127.0.0.1', '2014-07-21', 1, '1405929828'),
('36.76.60.43', '2014-07-21', 1, '1405951864'),
('223.255.231.154', '2014-07-21', 2, '1405957200'),
('223.255.227.21', '2014-07-22', 1, '1405995171'),
('223.255.231.146', '2014-07-22', 1, '1405997152'),
('223.255.227.21', '2014-07-23', 1, '1406100212'),
('223.255.227.17', '2014-07-23', 1, '1406104552'),
('223.255.227.23', '2014-07-24', 1, '1406168095'),
('223.255.231.153', '2014-07-24', 1, '1406204439'),
('223.255.231.146', '2014-07-25', 1, '1406268985'),
('180.76.5.193', '2014-08-06', 1, '1407302738'),
('180.76.5.23', '2014-08-06', 1, '1407304739'),
('202.67.36.241', '2014-08-06', 1, '1407305643'),
('198.148.27.22', '2014-08-06', 1, '1407306703'),
('180.251.170.42', '2014-08-06', 7, '1407310167'),
('128.199.171.191', '2014-08-06', 3, '1407323435'),
('223.255.231.149', '2014-08-06', 2, '1407309879'),
('223.255.227.28', '2014-08-06', 8, '1407311801'),
('103.24.49.242', '2014-08-06', 1, '1407312326'),
('223.255.231.146', '2014-08-06', 1, '1407313297'),
('180.214.233.34', '2014-08-06', 1, '1407321063'),
('66.249.77.87', '2014-08-06', 1, '1407323509'),
('223.255.227.30', '2014-08-06', 1, '1407325862'),
('180.254.207.13', '2014-08-06', 5, '1407330687'),
('114.79.13.199', '2014-08-06', 1, '1407336900'),
('202.152.199.34', '2014-08-06', 7, '1407337100'),
('180.76.6.21', '2014-08-07', 1, '1407347753'),
('114.79.13.55', '2014-08-07', 3, '1407354277'),
('114.125.41.136', '2014-08-07', 1, '1407352625'),
('180.76.6.147', '2014-08-07', 1, '1407355344'),
('180.76.6.64', '2014-08-07', 1, '1407367237'),
('69.171.247.116', '2014-08-07', 1, '1407379834'),
('69.171.247.119', '2014-08-07', 1, '1407379834'),
('69.171.247.114', '2014-08-07', 1, '1407379834'),
('69.171.247.115', '2014-08-07', 1, '1407379834'),
('202.67.34.29', '2014-08-07', 2, '1407380415'),
('36.76.52.112', '2014-08-07', 1, '1407380496'),
('223.255.231.145', '2014-08-07', 5, '1407387045'),
('223.255.231.153', '2014-08-07', 2, '1407388883'),
('223.255.227.27', '2014-08-07', 1, '1407393087'),
('180.76.5.25', '2014-08-07', 1, '1407394749'),
('223.255.231.146', '2014-08-07', 1, '1407397183'),
('157.55.39.248', '2014-08-07', 1, '1407397231'),
('180.254.200.55', '2014-08-07', 2, '1407399466'),
('110.139.67.15', '2014-08-07', 8, '1407399221'),
('180.242.17.64', '2014-08-07', 11, '1407414373'),
('141.0.8.59', '2014-08-07', 1, '1407412384'),
('110.76.149.91', '2014-08-07', 1, '1407422367'),
('223.255.231.151', '2014-08-07', 3, '1407426943'),
('82.145.209.206', '2014-08-07', 1, '1407430369'),
('223.255.227.28', '2014-08-08', 3, '1407469589'),
('66.93.156.50', '2014-08-08', 1, '1407472340'),
('202.62.17.47', '2014-08-08', 1, '1407484393'),
('36.70.135.163', '2014-08-08', 6, '1407485987'),
('173.252.74.115', '2014-08-08', 1, '1407485153'),
('118.96.58.136', '2014-08-08', 2, '1407486347'),
('114.79.29.68', '2014-08-08', 1, '1407502537'),
('66.220.156.113', '2014-08-08', 1, '1407503375'),
('112.215.66.79', '2014-08-08', 1, '1407503381'),
('125.163.113.156', '2014-08-08', 9, '1407508824'),
('180.76.5.94', '2014-08-08', 1, '1407508624'),
('120.172.9.192', '2014-08-08', 1, '1407515634'),
('202.67.41.51', '2014-08-08', 1, '1407515702'),
('180.253.243.222', '2014-08-09', 1, '1407542724'),
('36.75.224.20', '2014-08-09', 1, '1407548005'),
('180.76.5.65', '2014-08-09', 1, '1407548865'),
('66.249.77.77', '2014-08-09', 2, '1407582711'),
('180.76.6.137', '2014-08-09', 1, '1407553037'),
('66.249.77.87', '2014-08-09', 1, '1407554836'),
('66.249.77.97', '2014-08-09', 2, '1407562640'),
('120.177.44.126', '2014-08-09', 2, '1407558625'),
('223.255.231.145', '2014-08-09', 3, '1407558663'),
('36.73.64.113', '2014-08-09', 1, '1407558640'),
('36.72.187.12', '2014-08-09', 1, '1407560351'),
('202.67.41.51', '2014-08-09', 1, '1407561096'),
('114.125.60.68', '2014-08-09', 4, '1407561514'),
('202.67.40.50', '2014-08-09', 1, '1407562007'),
('180.76.6.136', '2014-08-09', 1, '1407562581'),
('110.232.81.2', '2014-08-09', 5, '1407563275'),
('146.185.28.59', '2014-08-09', 1, '1407564768'),
('120.174.157.139', '2014-08-09', 1, '1407568139'),
('223.255.227.23', '2014-08-09', 2, '1407570163'),
('193.105.210.119', '2014-08-09', 1, '1407577518'),
('125.162.57.66', '2014-08-09', 2, '1407579822'),
('180.241.163.1', '2014-08-09', 8, '1407580493'),
('36.76.44.163', '2014-08-09', 6, '1407603574'),
('180.76.5.144', '2014-08-09', 1, '1407582757'),
('107.167.103.40', '2014-08-09', 1, '1407586189'),
('36.68.48.23', '2014-08-09', 1, '1407586974'),
('192.99.218.151', '2014-08-09', 4, '1407587574'),
('36.74.55.24', '2014-08-09', 3, '1407589161'),
('118.97.212.184', '2014-08-09', 8, '1407595169'),
('36.72.114.118', '2014-08-09', 2, '1407597684'),
('180.76.5.153', '2014-08-09', 1, '1407602870'),
('180.76.5.59', '2014-08-09', 1, '1407603153'),
('180.76.5.18', '2014-08-10', 1, '1407606581'),
('180.254.155.156', '2014-08-10', 2, '1407607003'),
('180.76.6.42', '2014-08-10', 1, '1407608363'),
('36.68.242.217', '2014-08-10', 5, '1407627100'),
('66.249.77.77', '2014-08-10', 2, '1407633623'),
('202.67.44.64', '2014-08-10', 1, '1407629598'),
('180.76.6.43', '2014-08-10', 1, '1407631270'),
('118.97.212.182', '2014-08-10', 4, '1407632228'),
('139.0.102.140', '2014-08-10', 1, '1407633944'),
('66.249.77.87', '2014-08-10', 1, '1407636902'),
('66.249.77.97', '2014-08-10', 1, '1407639983'),
('180.76.6.159', '2014-08-10', 1, '1407640798'),
('118.97.212.181', '2014-08-10', 3, '1407642556'),
('36.68.46.37', '2014-08-10', 2, '1407642940'),
('180.76.5.69', '2014-08-10', 1, '1407645158'),
('180.76.5.80', '2014-08-10', 1, '1407648268'),
('180.76.5.143', '2014-08-10', 1, '1407650068'),
('223.255.231.145', '2014-08-10', 1, '1407650216'),
('180.76.6.149', '2014-08-10', 1, '1407657020'),
('36.77.183.218', '2014-08-10', 2, '1407657119'),
('127.0.0.1', '2014-08-10', 2, '1407660057'),
('127.0.0.1', '2014-08-11', 2, '1407725194'),
('127.0.0.1', '2014-08-12', 1, '1407862185'),
('127.0.0.1', '2014-08-13', 1, '1407899819'),
('127.0.0.1', '2014-08-17', 44, '1408287630'),
('127.0.0.1', '2014-08-18', 253, '1408372590'),
('127.0.0.1', '2014-08-19', 4, '1408413702'),
('::1', '2014-08-19', 90, '1408433250'),
('::1', '2014-08-31', 1, '1409487043'),
('::1', '2015-03-11', 11, '1426061663'),
('::1', '2015-03-12', 1, '1426114982'),
('::1', '2015-03-15', 32, '1426430637'),
('::1', '2015-03-18', 137, '1426666506'),
('::1', '2015-03-19', 143, '1426751746'),
('::1', '2015-03-21', 198, '1426912294'),
('::1', '2015-03-22', 554, '1427039069'),
('127.0.0.1', '2015-03-22', 1, '1427030317'),
('::1', '2015-03-23', 275, '1427093113'),
('::1', '2015-03-24', 42, '1427179474'),
('::1', '2015-03-25', 45, '1427251499'),
('39.225.164.2', '2015-05-14', 7, '1431584409'),
('119.110.72.130', '2015-05-14', 30, '1431595368'),
('89.145.95.2', '2015-05-14', 1, '1431582645'),
('66.220.158.118', '2015-05-14', 1, '1431582842'),
('66.220.158.115', '2015-05-14', 1, '1431582852'),
('66.220.158.112', '2015-05-14', 3, '1431595371'),
('66.220.158.119', '2015-05-14', 1, '1431582942'),
('114.125.43.185', '2015-05-14', 5, '1431602132'),
('119.110.72.130', '2015-05-15', 1, '1431673658'),
('114.125.45.206', '2015-05-16', 18, '1431741581'),
('66.220.158.116', '2015-05-16', 1, '1431741049'),
('66.220.158.118', '2015-05-16', 1, '1431741224'),
('66.220.158.114', '2015-05-16', 1, '1431741233'),
('39.229.6.148', '2015-05-16', 11, '1431791037'),
('39.225.236.155', '2015-05-17', 8, '1431862096'),
('119.110.72.130', '2015-05-19', 6, '1432006569'),
('89.145.95.42', '2015-05-19', 2, '1432006661'),
('114.121.133.117', '2015-05-19', 3, '1432046663'),
('124.195.114.65', '2015-05-28', 16, '1432832381'),
('66.220.158.119', '2015-05-28', 1, '1432831000'),
('66.220.158.115', '2015-05-28', 1, '1432831013'),
('66.220.158.116', '2015-05-28', 1, '1432832385'),
('124.195.114.65', '2015-05-29', 77, '1432836214'),
('66.220.158.113', '2015-05-29', 1, '1432835961'),
('66.249.84.178', '2015-05-29', 1, '1432836220'),
('103.246.200.14', '2015-05-29', 1, '1432851867'),
('103.246.200.59', '2015-05-29', 1, '1432851916'),
('114.124.5.250', '2015-05-29', 6, '1432852876'),
('173.252.105.114', '2015-05-29', 1, '1432852770'),
('120.180.175.150', '2015-05-29', 36, '1432864082'),
('103.246.200.50', '2015-05-29', 1, '1432863615'),
('103.246.200.1', '2015-05-29', 1, '1432863650'),
('103.246.200.33', '2015-05-29', 1, '1432863711'),
('103.246.200.44', '2015-05-29', 1, '1432863795'),
('120.174.144.115', '2015-05-29', 1, '1432908445'),
('119.110.72.130', '2015-05-29', 27, '1432912022'),
('173.252.90.117', '2015-05-29', 1, '1432910852'),
('173.252.90.116', '2015-05-29', 1, '1432910873'),
('173.252.90.118', '2015-05-29', 1, '1432911344'),
('173.252.90.122', '2015-05-29', 1, '1432911470'),
('66.249.84.190', '2015-05-30', 1, '1432945579'),
('39.254.117.222', '2015-05-30', 1, '1432991226'),
('66.249.84.178', '2015-05-31', 1, '1433037242'),
('120.176.92.190', '2015-06-01', 3, '1433128955'),
('66.102.6.210', '2015-06-01', 1, '1433134430'),
('120.164.44.28', '2015-06-01', 13, '1433149419'),
('124.195.118.227', '2015-06-01', 1, '1433170960'),
('120.177.28.244', '2015-06-02', 8, '1433220043'),
('66.249.84.190', '2015-06-02', 1, '1433247837'),
('120.190.75.179', '2015-06-03', 7, '1433302768'),
('119.110.72.130', '2015-06-03', 4, '1433302761'),
('89.145.95.2', '2015-06-03', 1, '1433302690'),
('66.249.71.147', '2015-06-07', 46, '1433696370'),
('66.249.71.130', '2015-06-07', 30, '1433696150'),
('66.249.71.164', '2015-06-07', 37, '1433696154'),
('173.252.74.113', '2015-06-07', 8, '1433694061'),
('173.252.74.117', '2015-06-07', 3, '1433676319'),
('66.249.64.57', '2015-06-07', 1, '1433674283'),
('173.252.88.89', '2015-06-07', 5, '1433677999'),
('173.252.88.86', '2015-06-07', 2, '1433677597'),
('173.252.74.119', '2015-06-07', 7, '1433694862'),
('66.249.79.117', '2015-06-07', 1, '1433674983'),
('173.252.88.84', '2015-06-07', 2, '1433676738'),
('173.252.74.115', '2015-06-07', 3, '1433676460'),
('173.252.74.114', '2015-06-07', 2, '1433694204'),
('173.252.74.118', '2015-06-07', 3, '1433676180'),
('173.252.74.112', '2015-06-07', 5, '1433695314'),
('173.252.88.85', '2015-06-07', 2, '1433677804'),
('173.252.88.90', '2015-06-07', 1, '1433676251'),
('173.252.74.116', '2015-06-07', 5, '1433695249'),
('173.252.88.87', '2015-06-07', 2, '1433677488'),
('173.252.88.88', '2015-06-07', 1, '1433677370'),
('66.249.79.130', '2015-06-07', 1, '1433694848'),
('66.220.156.116', '2015-06-07', 2, '1433696197'),
('66.249.67.104', '2015-06-07', 1, '1433696147'),
('66.220.156.112', '2015-06-07', 2, '1433696173'),
('66.220.146.22', '2015-06-07', 1, '1433696162'),
('66.249.67.117', '2015-06-07', 1, '1433696288'),
('66.220.156.114', '2015-06-07', 1, '1433696309'),
('66.220.156.117', '2015-06-08', 3, '1433711204'),
('66.249.71.164', '2015-06-08', 32, '1433779112'),
('66.220.146.25', '2015-06-08', 2, '1433736854'),
('66.220.156.116', '2015-06-08', 2, '1433709422'),
('66.249.71.147', '2015-06-08', 29, '1433748751'),
('66.220.156.112', '2015-06-08', 4, '1433715007'),
('66.220.146.20', '2015-06-08', 1, '1433696744'),
('66.249.71.130', '2015-06-08', 38, '1433777391'),
('66.220.156.118', '2015-06-08', 2, '1433712628'),
('66.220.146.27', '2015-06-08', 1, '1433712556'),
('66.220.146.26', '2015-06-08', 1, '1433712746'),
('66.249.67.104', '2015-06-08', 4, '1433746797'),
('66.220.146.22', '2015-06-08', 1, '1433714244'),
('66.220.156.115', '2015-06-08', 2, '1433714821'),
('66.249.67.117', '2015-06-08', 2, '1433780504'),
('120.176.251.49', '2015-06-08', 2, '1433737104'),
('66.220.156.119', '2015-06-08', 1, '1433737457'),
('66.249.71.147', '2015-06-09', 3, '1433836081'),
('66.249.71.130', '2015-06-09', 4, '1433835126'),
('66.249.67.104', '2015-06-09', 1, '1433788622'),
('66.249.71.164', '2015-06-09', 1, '1433823064'),
('66.249.71.130', '2015-06-10', 5, '1433953790'),
('66.249.67.117', '2015-06-10', 1, '1433911605'),
('66.249.71.164', '2015-06-10', 3, '1433954890'),
('66.249.71.147', '2015-06-10', 2, '1433953573'),
('66.249.71.147', '2015-06-11', 1, '1433957808'),
('66.249.71.164', '2015-06-11', 2, '1433990805'),
('68.180.228.104', '2015-06-11', 1, '1433975257'),
('66.249.71.130', '2015-06-11', 1, '1433991891'),
('36.68.28.19', '2015-06-14', 5, '1434224041'),
('120.164.46.127', '2015-06-14', 2, '1434239557'),
('66.249.67.248', '2015-06-15', 1, '1434362861'),
('104.193.10.50', '2015-06-15', 3, '1434372762'),
('104.193.10.50', '2015-06-16', 2, '1434454308'),
('36.80.234.114', '2015-06-16', 4, '1434443273'),
('173.252.74.115', '2015-06-16', 1, '1434443264'),
('173.252.74.114', '2015-06-16', 1, '1434443279'),
('119.110.72.130', '2015-06-16', 1, '1434467216'),
('124.195.116.71', '2015-06-17', 3, '1434551738'),
('120.184.130.21', '2015-06-27', 1, '1435386862'),
('66.249.84.246', '2015-06-27', 1, '1435387150'),
('120.176.176.106', '2015-06-28', 7, '1435461088'),
('66.220.158.114', '2015-06-28', 1, '1435461007'),
('66.249.84.129', '2015-06-28', 1, '1435466083'),
('66.249.84.246', '2015-06-29', 2, '1435563211'),
('66.249.84.252', '2015-06-29', 1, '1435563206'),
('66.249.84.246', '2015-06-30', 3, '1435677685'),
('66.249.84.252', '2015-06-30', 1, '1435645799'),
('66.249.84.252', '2015-07-01', 1, '1435710707'),
('66.249.84.129', '2015-07-01', 1, '1435711780'),
('120.177.18.200', '2015-07-02', 1, '1435824891'),
('::1', '2015-11-25', 15, '1448407930'),
('::1', '2015-12-01', 12, '1448944568'),
('::1', '2015-12-03', 9, '1449138520'),
('::1', '2015-12-05', 26, '1449279360'),
('::1', '2015-12-07', 4, '1449442678'),
('::1', '2015-12-08', 8, '1449532582'),
('::1', '2015-12-13', 31, '1449974628'),
('::1', '2015-12-18', 9, '1450418535'),
('::1', '2015-12-21', 10, '1450654644'),
('::1', '2015-12-24', 3, '1450917714'),
('::1', '2015-12-25', 4, '1451037761'),
('::1', '2015-12-26', 5, '1451086546'),
('::1', '2016-01-01', 5, '1451626224'),
('::1', '2016-01-12', 6, '1452564572'),
('::1', '2016-01-16', 7, '1452913899'),
('::1', '2016-05-16', 37, '1463417273'),
('::1', '2016-04-27', 6, '1461765262'),
('::1', '2016-05-15', 7, '1463323116'),
('::1', '2016-05-03', 6, '1462232162'),
('::1', '2016-05-08', 7, '1462664246'),
('::1', '2016-05-11', 6, '1462969419'),
('::1', '2016-05-12', 6, '1463014545'),
('127.0.0.1', '2016-05-15', 3, '1463269324'),
('::1', '2016-05-17', 45, '1463492558'),
('::1', '2016-05-18', 2, '1463585646'),
('::1', '2016-07-31', 203, '1469950523'),
('::1', '2016-08-02', 176, '1470129213'),
('::1', '2016-08-05', 68, '1470409393'),
('::1', '2016-08-07', 15, '1470541916'),
('::1', '2016-08-08', 92, '1470637467'),
('::1', '2016-08-15', 30, '1471214273'),
('::1', '2016-08-17', 307, '1471443543'),
('::1', '2016-08-18', 84, '1471516653'),
('::1', '2016-08-19', 22, '1471571282'),
('::1', '2016-08-20', 361, '1471698142'),
('::1', '2016-08-21', 243, '1471783090'),
('::1', '2016-08-22', 319, '1471863953'),
('::1', '2016-08-23', 16, '1471924721'),
('::1', '2016-08-25', 2, '1472119848'),
('::1', '2016-08-26', 1, '1472203442'),
('::1', '2016-08-27', 2, '1472280027'),
('::1', '2016-08-30', 7, '1472561367'),
('::1', '2016-09-06', 11, '1473156422'),
('::1', '2016-09-18', 373, '1474203690'),
('::1', '2016-09-19', 296, '1474294625'),
('::1', '2016-09-21', 157, '1474463221'),
('::1', '2016-09-21', 157, '1474463221'),
('::1', '2016-09-22', 159, '1474546725'),
('::1', '2016-09-23', 81, '1474630596'),
('::1', '2016-09-24', 90, '1474723332'),
('::1', '2016-10-09', 66, '1476001391'),
('::1', '2016-10-14', 7, '1476464278'),
('::1', '2016-10-15', 49, '1476468149'),
('::1', '2017-07-02', 39, '1499005619');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id_tag` int(5) NOT NULL,
  `nama_tag` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `tag_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `count` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id_tag`, `nama_tag`, `username`, `tag_seo`, `count`) VALUES
(22, 'Hiburan', '', 'hiburan', 18),
(28, 'Teknologi', '', 'teknologi', 12),
(27, 'Metropolitan', '', 'metropolitan', 32),
(26, 'Nasional', '', 'nasional', 42),
(25, 'Kesehatan', '', 'kesehatan', 16),
(24, 'Olahraga', '', 'olahraga', 11),
(34, 'Wisata', '', 'wisata', 4),
(36, 'Hukum', '', 'hukum', 16),
(37, 'Film', '', 'film', 25),
(38, 'Musik', '', 'musik', 12),
(40, 'Internasional', '', 'internasional', 27),
(41, 'Bola', '', 'bola', 20),
(43, 'Selebritis', '', 'selebritis', 9),
(49, 'Palestina', 'admin', 'palestina', 6),
(50, 'Israel', 'admin', 'israel', 3),
(51, 'Yahudi', 'admin', 'yahudi', 4);

-- --------------------------------------------------------

--
-- Table structure for table `teman`
--

CREATE TABLE `teman` (
  `id_teman` int(11) NOT NULL,
  `user1` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `user2` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `confirm` enum('Y','N') NOT NULL,
  `waktu_teman` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teman`
--

INSERT INTO `teman` (`id_teman`, `user1`, `user2`, `confirm`, `waktu_teman`) VALUES
(5, 'tommy', 'dewi', 'Y', '2016-10-15 01:00:47'),
(2, 'dewi', 'netipli', 'Y', '2016-08-20 13:28:16'),
(3, 'dewi', 'willy', 'N', '2016-08-20 16:19:40'),
(4, 'laura', 'udin', 'Y', '2016-08-20 23:21:20'),
(10, 'dewi', 'tommy', 'N', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `id_templates` int(5) NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `pembuat` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `folder` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id_templates`, `judul`, `username`, `pembuat`, `folder`, `aktif`) VALUES
(17, 'PHP[mu] Template V.3 Full Color', 'admin', 'Robby Prihandaya', 'tha-net', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `kota` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `provinsi` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `negara` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `facebook` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `twitter` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `g_plus` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `pekerjaan` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `alamat_lengkap` text COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `status_hubungan` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `pendidikan` text COLLATE latin1_general_ci NOT NULL,
  `nama_bank` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `atas_nama` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `no_rekening` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `tentang_saya` text COLLATE latin1_general_ci NOT NULL,
  `foto` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'user',
  `blokir` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `id_session` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `waktu_daftar` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `nama_lengkap`, `tanggal_lahir`, `kota`, `provinsi`, `negara`, `facebook`, `twitter`, `g_plus`, `pekerjaan`, `alamat_lengkap`, `email`, `no_telp`, `status_hubungan`, `pendidikan`, `nama_bank`, `atas_nama`, `no_rekening`, `tentang_saya`, `foto`, `level`, `blokir`, `id_session`, `waktu_daftar`) VALUES
('admin', 'bff0cc42103de1b4721370e84dc24f635a7afeca41198c9b3e03946a1b6b7191d14356408a5e57ce6daf77e6e800c66fac7ab0482d57d48d23e6808e4b562daa', 'Robby Prihandaya', '1989-06-05', 'Padang', 'Sumatera Barat', 'Indonesia', 'https://www.facebook.com/robbyprihandaya', 'https://twitter.com/robbyprihandaya', 'https://plus.google.com/106633506064864167239', 'Freelance', 'Jl. Angkasa Puri, Perundam 4, Tunggul Hitam', 'robby.prihandaya@gmail.com', '081267771344', 'Menikah', 'S1', 'BRI', 'Robby Prihandaya', '1007238237291211', 'Designer Developer & Freelance, Padang , Indonesia <br> Robby is a student in Universitas Putra Indonesia ''YPTK'' Padang and web developer for design from Padang. He founded PHPmu in june 2013 and publishes new tutorials.', 'robby.jpg', 'admin', 'N', '82712d6185313c5cab37780e6aa1bb571b2283efa92fd7153a28bbb3e34b0489dcc5a943ae7f61c5380184fea2ee750c40718a1601d9e7748427a767bdc3f64b', '0000-00-00 00:00:00'),
('dewi', '82712d6185313c5cab37780e6aa1bb571b2283efa92fd7153a28bbb3e34b0489dcc5a943ae7f61c5380184fea2ee750c40718a1601d9e7748427a767bdc3f64b', 'Dewiit Safitriii', '1989-02-17', 'Padang', 'Sumaterat Barat', 'Indonesia', 'https://www.facebook.com/dewiitsafitri', 'https://twitter.com/dewiitsafitri', 'https://plus.google.com/106633506064864167239', 'Ibuh Rumah Tangga', 'Jl. LInggar Jati VI, Perupuk Tabing', 'dewiit.safitri@gmail.com', '082173054500', 'Ibuh Rumah Tangga', 'Ibuh Rumah Tangga', 'BCA', 'Dewiit Safitri', '3453453524', 'Bekerja keras, namun selalu merasa cukup, mencintai berbuat baik dan berbagi, senantiasa bersyukur dan berterima-kasih maka tereliye percaya, sejatinya kita sudah menggenggam kebahagiaan hidup ini.', 'avatar21.png', 'penulis', 'N', '82712d6185313c5cab37780e6aa1bb571b2283efa92fd7153a28bbb3e34b0489dcc5a943ae7f61c5380184fea2ee750c40718a1601d9e7748427a767bdc3f64b', '0000-00-00 00:00:00'),
('netipli', '5e3f54d831a936fae95a90932d4d911e9cd16510edb0828f5bd9180df860e091f5714ebbbc2d8fa7d6f08ce31bcc3742fec78c15aadce21f81c9b8ce91b159bf', 'Netipli Sosiall', '1990-07-12', 'Padang', 'Sumatera Barat', 'wni', 'https://www.facebook.com/tiefliesiskom', 'https://www.twitter.com/tiefliesiskom', 'https://plus.google.com/106633506064416234234', 'Freelance', 'Jl. Ulak Karang, NO 145 D', 'netipli.netsosial@gmail.com', '082167881244', 'Freelance', 'Freelance', '', '', '', 'Saya Hanyalah seorang penulis amatiran yang biasa menulis hanya untuk kesenangan saja, dan mencoba berjuang ditengah hidup yang cukup keras di kota padang tercinta.', 'avatar51.png', 'user', 'N', '0c68c3c3b2c5ab823fc41f505a1f0787', '2016-08-18 09:42:46'),
('tommy', 'e3bb0d1fb8d4d0aa070f22a9f73c975222449bb5466dc89033f66a8be07d6e8345308aa298e78066871c6844964e6b63f7be4327525c5025001c76b94310e2f2', 'Tommy Utama', '1985-08-18', 'Padang', 'Sumatera Barat', 'wni', 'https://www.facebook.com/tommyutama', 'https://www.twitter.com/tommyutama', 'https://plus.google.com/1066335060644162342345', 'Swasta', 'Jl.Deperde, Tunggul Hitam', 'tommy.utama@gmail.com', '081266882611', 'Menikah', 'Sarjana Hukum', 'Danamon', 'Tommy Utama', '231231231', 'Saya Hanyalah seorang penulis amatiran yang biasa menulis hanya untuk kesenangan saja, dan mencoba berjuang ditengah hidup yang cukup keras di kota padang tercinta.', 'avatar41.png', 'penulis', 'N', '65f185ec6bd47af8f082f8196d0b4d24', '2016-08-20 15:17:14'),
('willy', '181676ffcb279fc91cfb9cb5f07be65b23224b05059f9f2ff0158aa520693a805496be090242c3cdf56c0463f278aba4b01c7115ea356eda346ef8270e402696', 'Willy Fernando', '1987-04-07', 'Payakumbuh', 'Sumatera Barat', 'wni', 'https://www.facebook.com/willyfernando', 'https://www.twitter.com/willyfernando', 'https://plus.google.com/1066335060643462342345', 'Swasta', 'Jl. Tiaka Raya, Batang Tabik', 'willy.fernando@gmail.com', '081333561233', 'Duda', 'Sarjana Komputer', 'Mandiri', 'Willy Fernando', '6245234123213', 'Bekerja keras, namun selalu merasa cukup, mencintai berbuat baik dan berbagi, senantiasa bersyukur dan berterima-kasih maka tereliye percaya, sejatinya kita sudah menggenggam kebahagiaan hidup ini.', '', 'penulis', 'N', 'e7236697824fb37763235980f1061218', '2016-08-20 15:21:53'),
('laura', 'ca946a52760d2c5e2670aa899019f09638e72462d8a9ff272dffb16d14e3873457ce6be0a3ecf205fdb0c8141bbe560b01240f1f1307e31b231cb18428ec5974', 'Laura Izatin Nissa', '1994-02-18', 'Padang', 'Sumatera Barat', 'wni', 'https://www.facebook.com/laurahikmahizatin', 'https://www.twitter.com/laurahikmahizatin', 'https://plus.google.com/1066335060643462347560', 'Mahasiswa', 'Jl. Bundo Kanduang, No 45 B', 'laura.izatin@gmail.com', '082178902333', 'Lajang', 'Sarjana Hukum', '', '', '', 'Ingin sebenarnya menjadi penulis, hanya saja kadang tidak bisa, mama saya juga seorang penulis dan hasil karya tulis saya udah saya publish ke blog.', '', 'user', 'N', '680e89809965ec41e64dc7e447f175ab', '2016-08-20 15:26:17'),
('udin', '701b8e57d1f5bea33aff7748846c47dc113f0d1d5c340086b174a9836f0600ca5db28ae8a02b295cd7d5edbe38d4519a0396fe0aaf2efd4d8d561754ce4cdff7', 'Udin Sedunia', '2000-09-23', 'Padang', 'Sumatera Barat', 'Indonesia', 'https://www.facebook.com/tiefliesiskom', 'https://www.twitter.com/tiefliesiskom', 'https://plus.google.com/106633506064416234234', 'Swasta', 'Jl. Diponegoro No 16 C', 'udin.sedunia@gmail.com', '082178123455', 'Lajang', 'S1', 'Danamon', 'UDin Sedunia', '352412313123', 'Saya Hanyalah seorang penulis amatiran yang biasa menulis hanya untuk kesenangan saja, dan mencoba berjuang ditengah hidup yang cukup keras di kota padang tercinta.', 'avatar1.png', 'penulis', 'N', '', '0000-00-00 00:00:00'),
('roberto', 'd3f7b54c8a85ce8b96f23a500dd07f01e5f500835f9a6c9adc022ecf911ff4d20ecba0ba6dca18114b1cf8faff2c79cb3dd60b4f9fa7662bd41f4f1f71821972', 'roberto roberto', '2017-07-12', 'Padang', 'Sumbar', 'wni', 'https://www.facebook.com/robbyprihandaya', 'https://www.twitter.com/robbyprihandaya', 'https://www.plusgoogle.com/robbyprihandaya', 'Wiraswasta', 'Jl. Badendeng Balado', 'roberto@gmail.com', '081267771388', 'Bertunangan', 'asdasd', '', '', '', 'sadasdasasdasdasdasdasdasdasdasdsadsadsadsadsadsadsadsad', '', 'user', 'Y', 'c1bfc188dba59d2681648aa0e6ca8c8e', '2017-07-02 21:25:05');

-- --------------------------------------------------------

--
-- Table structure for table `users_media`
--

CREATE TABLE `users_media` (
  `id_users_media` int(11) NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `file_media` text CHARACTER SET latin1 NOT NULL,
  `waktu_upload` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `users_media`
--

INSERT INTO `users_media` (`id_users_media`, `username`, `file_media`, `waktu_upload`) VALUES
(2, 'dewi', '2.jpg', '2016-09-19 00:00:00'),
(3, 'dewi', '3.jpg', '2016-09-19 00:00:00'),
(4, 'laura', '4.jpg', '2016-09-19 00:00:00'),
(5, 'laura', '5.jpg', '2016-09-19 00:00:00'),
(6, 'dewi', '6.jpg', '2016-09-19 00:00:00'),
(7, 'netipli', '7.jpg', '2016-09-19 00:00:00'),
(8, 'laura', '1.jpg', '2016-09-19 04:06:00');

-- --------------------------------------------------------

--
-- Table structure for table `users_modul`
--

CREATE TABLE `users_modul` (
  `id_umod` int(11) NOT NULL,
  `id_session` varchar(255) NOT NULL,
  `id_modul` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_modul`
--

INSERT INTO `users_modul` (`id_umod`, `id_session`, `id_modul`) VALUES
(42, '82712d6185313c5cab37780e6aa1bb571b2283efa92fd7153a28bbb3e34b0489dcc5a943ae7f61c5380184fea2ee750c40718a1601d9e7748427a767bdc3f64b', 64),
(41, '82712d6185313c5cab37780e6aa1bb571b2283efa92fd7153a28bbb3e34b0489dcc5a943ae7f61c5380184fea2ee750c40718a1601d9e7748427a767bdc3f64b', 45),
(38, '82712d6185313c5cab37780e6aa1bb571b2283efa92fd7153a28bbb3e34b0489dcc5a943ae7f61c5380184fea2ee750c40718a1601d9e7748427a767bdc3f64b', 2),
(40, '82712d6185313c5cab37780e6aa1bb571b2283efa92fd7153a28bbb3e34b0489dcc5a943ae7f61c5380184fea2ee750c40718a1601d9e7748427a767bdc3f64b', 10),
(39, '82712d6185313c5cab37780e6aa1bb571b2283efa92fd7153a28bbb3e34b0489dcc5a943ae7f61c5380184fea2ee750c40718a1601d9e7748427a767bdc3f64b', 18),
(32, '680e89809965ec41e64dc7e447f175ab', 66),
(31, '680e89809965ec41e64dc7e447f175ab', 45),
(30, '680e89809965ec41e64dc7e447f175ab', 18);

-- --------------------------------------------------------

--
-- Table structure for table `ym`
--

CREATE TABLE `ym` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `ym_icon` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `berita_bayar_bonus`
--
ALTER TABLE `berita_bayar_bonus`
  ADD PRIMARY KEY (`id_berita_bayar_bonus`);

--
-- Indexes for table `berita_catatan`
--
ALTER TABLE `berita_catatan`
  ADD PRIMARY KEY (`id_berita_catatan`);

--
-- Indexes for table `berita_komentar`
--
ALTER TABLE `berita_komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `berita_penghasilan`
--
ALTER TABLE `berita_penghasilan`
  ADD PRIMARY KEY (`id_berita_penghasilan`);

--
-- Indexes for table `berita_view`
--
ALTER TABLE `berita_view`
  ADD PRIMARY KEY (`id_berita_view`);

--
-- Indexes for table `halamanstatis`
--
ALTER TABLE `halamanstatis`
  ADD PRIMARY KEY (`id_halaman`);

--
-- Indexes for table `hubungi`
--
ALTER TABLE `hubungi`
  ADD PRIMARY KEY (`id_hubungi`);

--
-- Indexes for table `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`id_identitas`);

--
-- Indexes for table `iklantengah`
--
ALTER TABLE `iklantengah`
  ADD PRIMARY KEY (`id_iklantengah`);

--
-- Indexes for table `jual_beli`
--
ALTER TABLE `jual_beli`
  ADD PRIMARY KEY (`id_jual_beli`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id_logo`);

--
-- Indexes for table `lowker`
--
ALTER TABLE `lowker`
  ADD PRIMARY KEY (`id_lowker`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages_chat`
--
ALTER TABLE `messages_chat`
  ADD PRIMARY KEY (`id_chat`);

--
-- Indexes for table `modul`
--
ALTER TABLE `modul`
  ADD PRIMARY KEY (`id_modul`);

--
-- Indexes for table `pasangiklan`
--
ALTER TABLE `pasangiklan`
  ADD PRIMARY KEY (`id_pasangiklan`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id_slide`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id_tag`);

--
-- Indexes for table `teman`
--
ALTER TABLE `teman`
  ADD PRIMARY KEY (`id_teman`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id_templates`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `users_media`
--
ALTER TABLE `users_media`
  ADD PRIMARY KEY (`id_users_media`);

--
-- Indexes for table `users_modul`
--
ALTER TABLE `users_modul`
  ADD PRIMARY KEY (`id_umod`);

--
-- Indexes for table `ym`
--
ALTER TABLE `ym`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id_agenda` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=695;
--
-- AUTO_INCREMENT for table `berita_bayar_bonus`
--
ALTER TABLE `berita_bayar_bonus`
  MODIFY `id_berita_bayar_bonus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `berita_catatan`
--
ALTER TABLE `berita_catatan`
  MODIFY `id_berita_catatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `berita_komentar`
--
ALTER TABLE `berita_komentar`
  MODIFY `id_komentar` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;
--
-- AUTO_INCREMENT for table `berita_penghasilan`
--
ALTER TABLE `berita_penghasilan`
  MODIFY `id_berita_penghasilan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `berita_view`
--
ALTER TABLE `berita_view`
  MODIFY `id_berita_view` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `halamanstatis`
--
ALTER TABLE `halamanstatis`
  MODIFY `id_halaman` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `hubungi`
--
ALTER TABLE `hubungi`
  MODIFY `id_hubungi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `identitas`
--
ALTER TABLE `identitas`
  MODIFY `id_identitas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `iklantengah`
--
ALTER TABLE `iklantengah`
  MODIFY `id_iklantengah` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `jual_beli`
--
ALTER TABLE `jual_beli`
  MODIFY `id_jual_beli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `id_logo` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `lowker`
--
ALTER TABLE `lowker`
  MODIFY `id_lowker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `messages_chat`
--
ALTER TABLE `messages_chat`
  MODIFY `id_chat` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `modul`
--
ALTER TABLE `modul`
  MODIFY `id_modul` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `pasangiklan`
--
ALTER TABLE `pasangiklan`
  MODIFY `id_pasangiklan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id_slide` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id_tag` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `teman`
--
ALTER TABLE `teman`
  MODIFY `id_teman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `id_templates` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `users_media`
--
ALTER TABLE `users_media`
  MODIFY `id_users_media` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users_modul`
--
ALTER TABLE `users_modul`
  MODIFY `id_umod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `ym`
--
ALTER TABLE `ym`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
