-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jan 2024 pada 15.07
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app-berita`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Teknologi'),
(2, 'Olahraga'),
(3, 'Otomotif'),
(4, 'kesehatan'),
(5, 'keuangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `news_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `comments`
--

INSERT INTO `comments` (`comment_id`, `news_id`, `user_id`, `content`, `created_at`) VALUES
(3, 1, 25, 'coba', '2023-12-31 08:15:30'),
(6, 1, 46, 'sama aja tau', '2023-12-31 08:29:49'),
(9, 3, 46, 'mantap', '2023-12-31 08:39:14'),
(10, 3, 46, 'sudah mantap ini', '2023-12-31 08:39:42'),
(11, 3, 46, 'woah\r\n', '2023-12-31 08:40:19'),
(12, 3, 46, 'coba', '2023-12-31 08:43:28'),
(13, 1, 46, 'noh', '2023-12-31 08:43:59'),
(14, 3, 46, 'okay', '2023-12-31 08:44:08'),
(15, 3, 46, 'pabrikan mobil\r\n', '2023-12-31 10:13:47'),
(16, 2, 41, 'percobaan', '2024-01-01 10:06:43'),
(17, 3, 41, 'kenapa tuh', '2024-01-01 10:07:14'),
(18, 3, 41, 'crypto', '2024-01-01 10:07:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_factories`
--

CREATE TABLE `db_factories` (
  `id` int(9) NOT NULL,
  `name` varchar(31) NOT NULL,
  `uid` varchar(31) NOT NULL,
  `class` varchar(63) NOT NULL,
  `icon` varchar(31) NOT NULL,
  `summary` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_migrations`
--

CREATE TABLE `db_migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `db_migrations`
--

INSERT INTO `db_migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(24, '2020-02-22-222222', 'Tests\\Support\\Database\\Migrations\\ExampleMigration', 'tests', 'Tests\\Support', 1703077704, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `image` varchar(60) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `category_id`, `author_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Efek samping kecanduan hp', 'Di era digital ini, ponsel pintar telah menjadi bagian tak terpisahkan dari kehidupan sehari-hari. Meskipun memberikan kemudahan dan konektivitas, penggunaan berlebihan atau kecanduan terhadap ponsel dapat membawa dampak negatif pada kesejahteraan mental dan fisik seseorang.\r\n\r\nMenurunnya Kualitas Tidur\r\nSalah satu dampak yang paling mencolok dari kecanduan ponsel adalah berkurangnya kualitas tidur. Paparan cahaya biru dari layar ponsel dapat mengganggu produksi hormon melatonin, yang bertanggung jawab untuk mengatur siklus tidur. Pergantian waktu tidur yang sehat dengan waktu terus-menerus memeriksa ponsel dapat menyebabkan gangguan tidur dan kelelahan.\r\n\r\nMenurunnya Produktivitas\r\nKecanduan ponsel juga dapat menghambat produktivitas sehari-hari. Pengguna sering kali terjebak dalam spiral tak terbatas melihat media sosial, bermain game, atau menonton video, menghabiskan waktu berharga yang seharusnya digunakan untuk tugas-tugas penting atau kegiatan produktif lainnya.\r\n\r\nDampak pada Kesehatan Mental\r\nPaparan berlebihan terhadap konten negatif di media sosial atau perbandingan diri dengan kehidupan orang lain dapat menyebabkan tekanan mental dan stres. Kecanduan ponsel juga dapat memperburuk masalah kesehatan mental yang sudah ada, seperti kecemasan dan depresi.\r\n\r\nMenurunnya Keterlibatan Sosial\r\nMeskipun terhubung secara daring, kecanduan ponsel dapat menyebabkan penurunan keterlibatan sosial di dunia nyata. Pengguna sering kali lebih tertarik dengan layar ponsel mereka daripada berinteraksi dengan orang di sekitarnya. Ini dapat merugikan hubungan sosial dan pengalaman langsung dengan lingkungan sekitar.\r\n\r\nMengatasi Kecanduan Ponsel\r\nUntuk mengatasi dampak negatif kecanduan ponsel, penting untuk menetapkan batas waktu penggunaan, terutama sebelum tidur. Selain itu, berusaha untuk meningkatkan interaksi sosial langsung dan mengganti waktu layar dengan kegiatan fisik atau hobi dapat membantu mengembalikan keseimbangan dalam hidup.\r\n\r\nMelalui kesadaran akan dampak negatif kecanduan ponsel, kita dapat bersama-sama menciptakan kebiasaan yang lebih sehat dan menemukan keseimbangan yang diperlukan untuk kehidupan yang berkualitas.', 1, 1, '1704116734_561b9cc3f34fcf8da0a4.jpg', '2023-12-15 17:00:00', '2024-01-01 13:45:34'),
(2, 'Pabrikan Mobil Terkemuka Meluncurkan Model Baru dengan Teknologi Canggih', 'Di tengah ekspektasi tinggi dari penggemar otomotif, pabrikan mobil terkemuka hari ini mengumumkan peluncuran model terbaru mereka, yang dijanjikan membawa inovasi teknologi dan performa yang luar biasa.\r\n\r\nMelibatkan upaya kolaboratif antara insinyur terbaik dan desainer kreatif, model terbaru ini menawarkan kombinasi yang mengagumkan antara gaya futuristik dan fitur-fitur terkini yang mendefinisikan masa depan otomotif.\r\n\r\nTeknologi Canggih dan Performa Unggul\r\nSalah satu sorotan dari model terbaru ini adalah implementasi teknologi canggih yang akan memberikan pengalaman mengemudi yang tak tertandingi. Sistem penggerak terbaru dan mesin yang dioptimalkan untuk efisiensi bahan bakar menjadi fokus utama dalam pengembangan model ini.\r\n\r\nDipersenjatai dengan berbagai sensor dan kamera, mobil ini juga dilengkapi dengan fitur keamanan tingkat tinggi dan kemampuan self-driving yang akan meningkatkan kenyamanan dan keamanan para pengguna.\r\n\r\nDesain yang Revolusioner\r\nDesain eksterior mobil ini mencuri perhatian dengan garis-garis yang dinamis dan aerodinamis. Penggunaan material ringan tetapi kuat meningkatkan efisiensi bahan bakar dan performa keseluruhan kendaraan.\r\n\r\nInterior mobil ini tidak kalah menarik, dengan kenyamanan dan fungsionalitas menjadi fokus utama. Sistem hiburan terbaru, konektivitas yang mudah, dan desain ergonomis menciptakan lingkungan yang menyenangkan di dalam kabin.\r\n\r\nRamah Lingkungan\r\nDengan semakin meningkatnya kekhawatiran akan dampak lingkungan, model terbaru ini juga menunjukkan komitmen pabrikan untuk berkelanjutan. Sistem emisi yang ramah lingkungan dan desain yang mengurangi jejak karbon adalah langkah positif menuju mobilitas yang lebih bersih.\r\n\r\nAntusiasme dari Penggemar\r\nReaksi awal dari para penggemar otomotif tidak dapat diabaikan. Media sosial dipenuhi dengan komentar dan tanggapan positif terhadap fitur-fitur baru dan desain yang revolusioner. Beberapa penggemar bahkan sudah melakukan pemesanan prapenjualan untuk mendapatkan akses eksklusif ke model ini.\r\n\r\nDengan melihat respons awal yang sangat positif, model terbaru ini menjanjikan untuk menjadi sukses besar di pasar otomotif global. Dengan inovasi teknologi, performa luar biasa, dan komitmen terhadap keberlanjutan, pabrikan mobil terkemuka ini terus mengukir namanya dalam sejarah otomotif.\r\n\r\nSeiring dengan revolusi teknologi dan desain, masa depan otomotif terlihat semakin cerah, dan para penggemar tidak sabar untuk melihat bagaimana model terbaru ini akan mengubah dinamika industri otomotif.', 3, 1, '1704116665_789d7f354edd19804b5c.jpg', '2023-12-16 04:10:03', '2024-01-01 13:44:25'),
(3, 'Tim Sepak Bola Lokal Raih Kemenangan Mengagumkan di Turnamen Regional', 'Dalam sebuah pertunjukan yang memukau, tim sepak bola lokal memperoleh kemenangan yang mengesankan dalam turnamen regional terbaru. Dengan semangat juang dan keterampilan yang luar biasa, para pemain berhasil mengalahkan lawan-lawan tangguh dan mempersembahkan kemenangan untuk komunitas mereka.\r\n\r\nPerforma Gemilang di Lapangan\r\nDari menit pertama hingga peluit akhir, tim sepak bola ini menunjukkan performa yang memukau. Strategi permainan yang cerdas, serangan yang tajam, dan pertahanan yang kokoh membedakan mereka dari pesaing-pesaing mereka. Sejumlah gol indah dan assist brilian menciptakan momen-momen mengesankan yang dikenang oleh penonton dan penggemar setia.\r\n\r\nKebersamaan Tim dan Semangat Suporter\r\nTidak hanya keterampilan individu yang mempesona, tetapi juga kebersamaan dan semangat tim yang terlihat sepanjang pertandingan. Setiap pemain memberikan kontribusi maksimal untuk kesuksesan tim, menggambarkan kerja sama yang kuat dan dedikasi yang tak terbantahkan.\r\n\r\nSuporter setia tim sepak bola ini juga berperan besar dalam menciptakan atmosfer yang menyenangkan di stadion. Sorakan, spanduk, dan nyanyian khas suporter menciptakan atmosfer yang penuh semangat, memberikan dorongan ekstra bagi para pemain di lapangan.\r\n\r\nPujian untuk Pelatih dan Manajemen Tim\r\nKeberhasilan tim tidak lepas dari peran pelatih dan manajemen yang telaten. Strategi permainan yang dirancang dengan baik, latihan yang intensif, dan pengelolaan tim yang efisien adalah faktor-faktor kunci yang mengarah pada pencapaian luar biasa ini. Para pemain juga memberikan penghormatan kepada pelatih mereka atas panduan dan motivasi yang terus-menerus.\r\n\r\nTantangan Berikutnya dan Aspirasi Masa Depan\r\nDengan kemenangan ini, tim sepak bola lokal menatap masa depan dengan optimisme. Mereka berencana untuk menghadapi tantangan berikutnya di level yang lebih tinggi dan terus membangun prestasi mereka. Aspirasi untuk meraih prestasi nasional dan internasional semakin menguat, menciptakan semangat kompetisi yang sehat di tingkat lokal.\r\n\r\nReaksi dari Komunitas\r\nReaksi dari komunitas setempat sangat positif. Dari anak-anak kecil hingga warga dewasa, kemenangan ini menjadi sumber inspirasi dan kebanggaan. Semangat olahraga dan solidaritas komunitas terus tumbuh, membuktikan bahwa olahraga memiliki kekuatan untuk menyatukan orang dari berbagai latar belakang.\r\n\r\nKemenangan ini tidak hanya sebuah pencapaian bagi tim sepak bola, tetapi juga sebuah cerminan dari semangat sportivitas dan kebersamaan dalam dunia olahraga. Semua mata sekarang tertuju pada perjalanan mendebarkan yang akan dijalani oleh tim sepak bola lokal ini di masa mendatang.', 2, 1, '1704116610_43ecef98a0b357821a64.jpg', '2023-12-15 17:00:00', '2024-01-01 13:43:30'),
(4, 'Mobil Listrik Terbaru Muncul dengan Desain Futuristik dan Teknologi Terkini', 'Dalam langkah revolusioner menuju mobilitas berkelanjutan, pabrikan mobil terkemuka mengumumkan peluncuran mobil listrik terbaru mereka. Model ini tidak hanya menawarkan efisiensi energi tinggi, tetapi juga menyajikan desain futuristik yang memukau dan teknologi terkini untuk memenuhi kebutuhan mobilitas masa depan.\r\n\r\nDesain yang Mengagumkan\r\nSalah satu fitur paling mencolok dari mobil listrik terbaru ini adalah desainnya yang mengagumkan. Garis-garis aerodinamis, permukaan mulus, dan elemen-elemen desain futuristik menciptakan tampilan luar yang memikat. Penggunaan material ringan dan teknologi pembuatan inovatif juga berkontribusi pada penampilan yang menawan ini.\r\n\r\nSistem Penggerak Listrik Terbaru\r\nMobil ini dilengkapi dengan sistem penggerak listrik terbaru yang tidak hanya memberikan performa tinggi, tetapi juga ramah lingkungan. Motor listrik canggih dan baterai tahan lama menjadikan kendaraan ini pilihan yang tepat bagi mereka yang peduli dengan lingkungan.\r\n\r\nTeknologi Konektivitas dan Keamanan\r\nDalam upaya untuk menciptakan pengalaman mengemudi yang terhubung, mobil ini dilengkapi dengan teknologi konektivitas tinggi. Layar sentuh berukuran besar, sistem infotainment yang cerdas, dan integrasi smartphone memastikan pengguna tetap terhubung di setiap perjalanan.\r\n\r\nKeamanan juga menjadi fokus utama, dengan fitur-fitur canggih seperti sistem pengereman otomatis, peringatan tabrakan, dan kemampuan self-driving dalam kondisi tertentu. Semua ini dirancang untuk meningkatkan keamanan pengendara dan penumpang.\r\n\r\nKeunggulan Ramah Lingkungan\r\nDengan beralih ke mobil listrik, pabrikan ini memberikan kontribusi besar untuk mengurangi emisi karbon dan jejak lingkungan. Model ini bukan hanya kendaraan ramah lingkungan, tetapi juga simbol dari pergeseran menuju masa depan transportasi yang berkelanjutan.\r\n\r\nRespons Positif dari Komunitas\r\nReaksi awal terhadap peluncuran ini sangat positif. Para penggemar otomotif dan pecinta teknologi memberikan apresiasi tinggi terhadap inovasi desain dan teknologi yang dibawa oleh mobil listrik ini. Banyak yang menilai langkah ini sebagai tonggak penting dalam perkembangan industri otomotif global.\r\n\r\nPerjalanan Masa Depan\r\nMobil listrik terbaru ini menandai langkah penting dalam perjalanan menuju mobilitas berkelanjutan. Sebagai perwujudan visi masa depan transportasi, mobil ini tidak hanya menjadi pilihan bagi para pengguna yang mencari kinerja tinggi, tetapi juga bagi mereka yang berkomitmen untuk melindungi lingkungan.', 3, 1, '1704116561_e35756d6e17d4e6ccb26.jpeg', '2023-12-16 17:00:00', '2024-01-01 13:42:41'),
(28, 'Inovasi Terkini Dunia Otomotif: Mobil Listrik Tanpa Pengemudi Siap Menggebrak', 'Pada tanggal 1 Januari 2024, industri otomotif kembali mencatat terobosan signifikan dengan pengenalan teknologi mobil listrik tanpa pengemudi. Sebuah perusahaan terkemuka di bidang otomotif global berhasil menghadirkan kendaraan revolusioner yang diharapkan dapat mengubah paradigma transportasi di masa depan.\r\n\r\nMobil ini dilengkapi dengan teknologi kecerdasan buatan yang canggih, menggunakan sensor radar, kamera, dan lidar untuk mendeteksi objek di sekitarnya dan membuat keputusan secara real-time. Sistem ini memungkinkan mobil untuk menghindari rintangan, mengikuti aturan lalu lintas, dan bahkan melakukan parkir sendiri.\r\n\r\nSelain itu, mobil ini didukung oleh tenaga listrik sepenuhnya, menjadikannya ramah lingkungan dan meminimalkan jejak karbon. Baterai canggihnya memberikan jarak tempuh yang impresif, sementara teknologi pengisian daya cepat memungkinkan pengguna untuk mengisi daya dengan mudah.\r\n\r\nPara pakar industri meyakini bahwa kehadiran mobil listrik tanpa pengemudi ini akan membuka pintu bagi transformasi besar dalam mobilitas urban. Mereka mengharapkan adopsi yang cepat di berbagai kota besar di seluruh dunia, membawa perubahan positif dalam hal keamanan, efisiensi, dan keberlanjutan lingkungan.\r\n\r\nMeskipun masih ada beberapa tantangan teknis dan regulasi yang perlu diatasi, namun inovasi ini menandai langkah besar menuju visi masa depan otomotif yang lebih modern dan berkelanjutan.', 3, 36, '1704116434_5d80458bd378f64faba2.jpg', '2023-12-31 17:00:00', '2024-01-01 13:40:34'),
(29, 'Inovasi Kesehatan Terbaru: Aplikasi Kesehatan Mental Membantu Mengatasi Tantangan Pandemi', 'Pada tanggal 1 Januari 2024, dunia kesehatan menyaksikan kemunculan inovasi terbaru yang fokus pada kesehatan mental sebagai respons terhadap tantangan kesehatan yang diakibatkan oleh pandemi global.\r\n\r\nSebuah perusahaan teknologi kesehatan meluncurkan aplikasi revolusioner yang dirancang khusus untuk membantu individu mengelola kesehatan mental mereka di tengah-tengah ketidakpastian dan stres pandemi. Aplikasi ini menyediakan berbagai fitur, termasuk pelacakan mood harian, latihan relaksasi, dan sumber daya dukungan kesehatan mental yang dapat diakses pengguna kapan saja.\r\n\r\nDokter dan psikolog yang terlibat dalam pengembangan aplikasi ini menekankan pentingnya menyediakan solusi yang dapat diakses oleh masyarakat umum. Mereka berharap bahwa aplikasi ini dapat menjadi alat yang efektif dalam mengatasi lonjakan masalah kesehatan mental yang terjadi seiring dengan pandemi COVID-19.\r\n\r\nPemerintah dan lembaga kesehatan juga memberikan dukungan penuh terhadap inisiatif ini, mengakui bahwa aspek kesehatan mental merupakan bagian integral dari kesejahteraan holistik. Beberapa negara bahkan mempertimbangkan untuk memasukkan aplikasi ini ke dalam sistem kesehatan nasional mereka untuk memastikan akses yang lebih luas.\r\n\r\nMelalui langkah-langkah inovatif ini, diharapkan bahwa masyarakat dapat lebih mudah mengelola stres dan meningkatkan kesehatan mental mereka, mendukung upaya pencegahan dan pemulihan selama periode pandemi ini.', 4, 36, '1704116387_72e41c3513ecf0e5b23d.jpg', '2023-12-31 17:00:00', '2024-01-01 13:39:47'),
(30, 'Dinamika Terkini Dunia Keuangan: Investasi Berkelanjutan Menjadi Fokus Utama', 'Pada tanggal 1 Januari 2024, dunia keuangan menyaksikan pergeseran signifikan dalam paradigma investasi, dengan investasi berkelanjutan menjadi fokus utama di tengah tuntutan masyarakat dan perubahan iklim yang semakin mendesak.\r\n\r\nSejumlah lembaga keuangan besar dan investor global telah mengumumkan komitmen untuk mengintegrasikan faktor-faktor lingkungan, sosial, dan tata kelola perusahaan (Environmental, Social, and Governance/ESG) dalam keputusan investasi mereka. Langkah ini dianggap sebagai respons terhadap meningkatnya kesadaran akan tanggung jawab sosial dan dampak lingkungan dari kegiatan investasi.\r\n\r\nPerusahaan-perusahaan terkemuka di sektor keuangan juga berlomba-lomba meluncurkan produk investasi berkelanjutan, dari obligasi hijau hingga dana indeks ESG. Hal ini mencerminkan permintaan yang semakin tinggi dari investor yang menginginkan portofolio mereka berkontribusi pada perubahan positif di masyarakat dan lingkungan.\r\n\r\nSelain itu, teknologi blockchain dan cryptocurrency terus menjadi perbincangan di dunia keuangan. Banyak institusi keuangan mulai memanfaatkan teknologi ini untuk meningkatkan transparansi, keamanan, dan efisiensi dalam transaksi keuangan.\r\n\r\nMeskipun pasar keuangan masih dihadapkan pada beberapa ketidakpastian terkait perubahan ekonomi global, langkah-langkah ini menunjukkan bahwa semakin banyak pelaku pasar yang memprioritaskan keberlanjutan dan tanggung jawab dalam pengelolaan keuangan mereka.', 5, 36, '1704116343_9ae270fc8ba7ef105d2f.jpg', '2023-12-31 17:00:00', '2024-01-01 13:39:03'),
(31, 'Pasar Cryptocurrency Mengalami Pertumbuhan Pesat: Menarik Perhatian Investor Global', 'Pada tanggal 1 Januari 2024, pasar cryptocurrency mencatat pertumbuhan pesat yang menarik perhatian investor global, menciptakan gelombang optimisme di tengah lanskap keuangan yang terus berubah.\r\n\r\nBitcoin, mata uang kripto paling populer, mencapai rekor harga tertinggi baru dalam beberapa bulan terakhir, mendorong minat investor institusional dan individu. Faktor-faktor seperti adopsi massal oleh perusahaan besar, permintaan yang terus meningkat, dan persepsi mata uang kripto sebagai alat lindung nilai, semuanya berkontribusi pada momentum positif ini.\r\n\r\nSelain Bitcoin, altcoin atau mata uang kripto alternatif juga mengalami pertumbuhan signifikan. Proyek-proyek blockchain yang inovatif dan aplikasi baru dari teknologi ini semakin mendapatkan perhatian investor, menciptakan beragam peluang di pasar.\r\n\r\nSementara itu, regulator keuangan di berbagai negara terus mengkaji kerangka regulasi untuk menanggapi perkembangan pesat di sektor cryptocurrency. Langkah-langkah regulatif ini dianggap penting untuk memberikan kejelasan dan keamanan kepada investor, sekaligus memitigasi risiko terkait.\r\n\r\nMeskipun volatilitas tetap menjadi ciri khas pasar cryptocurrency, tren positif ini mencerminkan pergeseran paradigma dalam pandangan keuangan global terhadap aset digital. Sejumlah tokoh terkemuka di dunia keuangan menyatakan pandangan optimis mereka terkait potensi jangka panjang dari teknologi blockchain dan mata uang kripto.', 5, 45, '1704116296_0cff3e3707329ce9a889.jpg', '2023-12-31 17:00:00', '2024-01-01 13:38:16'),
(32, 'Perkembangan Baru di Bidang Kesehatan: Teknologi Genom dan Terapi Sel Membuka Peluang Baru', 'Pada tanggal 1 Januari 2024, terjadi lonjakan inovasi di bidang kesehatan dengan kemajuan teknologi genom dan terapi sel, membuka pintu bagi penanganan penyakit yang lebih efektif dan personal.\r\n\r\nTeknologi genom semakin diterapkan dalam diagnosis dan pengobatan penyakit genetik. Penelitian dan pengembangan baru memungkinkan identifikasi lebih cepat dan akurat terhadap kelainan genetik, memberikan dasar bagi pengembangan terapi yang disesuaikan secara genetik.\r\n\r\nSelain itu, terapi sel, terutama terapi sel CAR-T (Chimeric Antigen Receptor T-cell), menjadi sorotan dalam pengobatan kanker. Teknologi ini memanfaatkan kemampuan sistem kekebalan tubuh untuk melawan sel kanker secara spesifik, menjanjikan tingkat keberhasilan yang lebih tinggi dan efek samping yang lebih rendah dibandingkan dengan metode tradisional.\r\n\r\nBeberapa perusahaan farmasi terkemuka telah mengumumkan kolaborasi dengan perusahaan teknologi genom untuk mengembangkan terapi yang dapat diakses secara luas. Meskipun beberapa tantangan masih perlu diatasi, optimisme tentang potensi penyembuhan yang lebih efektif dan presisi semakin berkembang.\r\n\r\nSelain itu, pandemi COVID-19 juga mempercepat inovasi di sektor kesehatan digital. Peningkatan adopsi telemedicine dan pengembangan aplikasi kesehatan pintar menjadi tren yang tidak dapat dihindari, memungkinkan pasien untuk mengakses layanan kesehatan secara virtual dengan lebih mudah.\r\n\r\nDengan perkembangan ini, diharapkan masyarakat dapat merasakan manfaat nyata dalam pengobatan penyakit yang lebih personal, efektif, dan mudah diakses. Itulah gambaran singkat tentang perkembangan terkini di bidang kesehatan, Dhan. Jika ada pertanyaan lebih lanjut atau topik lain yang ingin dibahas, silakan beri tahu.', 4, 45, '1704116195_801537be615a1aa365ec.jpg', '2023-12-31 17:00:00', '2024-01-01 13:36:35'),
(40, 'test', 'cobatesting', 1, 25, '1704115459_d02543e1d9802039cf8c.jpg', '2024-01-01 06:12:20', '2024-01-01 13:24:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(1, 'doni', 'doni@gmail.com', '$2y$10$TlgUcKHKpJgcNdqAKADJWOBH9ryBoNcIlkpwlnP3xITMMF8JbNHXy', 'author'),
(2, 'Rahmat', 'rahmat@gmail.com', '$2y$10$YvEaUoPc1m40PNgk9MKo9Ogx/Mo4.1MRFRsosxyqcKsEJNVMTSN/2', 'admin'),
(25, 'kahfi', 'kahfi@gmail.com', '$2y$10$VOvAxCCMrA5zUktNbTC0XOFhVKTL4Q8nslYDyBOVaA/oI1m9gMznC', 'author'),
(36, 'rohim', 'rohim@gmail.com', '$2y$10$ubU1oeOhFmZES8zTx658keW0Vpz5AMruL0x.RkmeeNxBvORccgUte', 'author'),
(41, 'israq', 'israq@gmail.com', '$2y$10$n7lJTWEPbX1neGYdWGkNKe9AWQWv5BK7BcX6F8lsu560z23u10rhy', 'visitor'),
(45, 'heru', 'heru@gmail.com', '$2y$10$m.vefR3qacBOiKth9yqjj.Yost1FGibO.NhTs.F89ddRMVDb5zTqu', 'author'),
(46, 'deni', 'deni@gmail.com', '$2y$10$RV2sCHpHL7.tfgWjS.Evl./J7QhNJ5MtyhmyQJzXGc5obNdqQJgoW', 'visitor');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `news_id` (`news_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `db_factories`
--
ALTER TABLE `db_factories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `uid` (`uid`),
  ADD KEY `deleted_at_id` (`deleted_at`,`id`),
  ADD KEY `created_at` (`created_at`);

--
-- Indeks untuk tabel `db_migrations`
--
ALTER TABLE `db_migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `db_factories`
--
ALTER TABLE `db_factories`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `db_migrations`
--
ALTER TABLE `db_migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `news_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
