<?php
include 'koneksi.php';
session_start();

// HANYA ambil nama_golongan & gambar dari DB, deskripsi dari PHP array
$query = "SELECT id, nama_golongan, gambar FROM informasi_obat ORDER BY id ASC";
$result = mysqli_query($conn, $query);

// ARRAY DESKRIPSI LENGKAP - TIDAK PERLU SQL PANJANG!
$deskripsi_golongan = [
    1 => 'Obat bebas atau over the counter (OTC) ditandai dengan logo bulat atau lingkaran hijau dengan garis tepi berwarna hitam. Obat ini dijual secara bebas dan dapat dibeli di warung, toko obat, serta apotek tanpa resep dokter. Contoh obat bebas adalah paracetamol, ibuprofen, dan antasida. Meski bisa dibeli secara bebas, Anda perlu mengonsumsi obat bebas sesuai aturan yang tertera pada kemasan. Jika dikonsumsi secara berlebih, ada risiko gangguan kesehatan yang mengintai. Misalnya, konsumsi paracetamol dalam jangka panjang atau dosisnya berlebih dapat menyebabkan kerusakan hati.',
    
    2 => 'Obat bebas terbatas termasuk dalam golongan obat yang dapat diperoleh tanpa resep dokter dan dapat dibeli di warung, toko obat, serta apotek. Namun, ada peringatan terkait takaran dan aturan khusus dalam penggunaannya, seperti obat kumur maupun obat oles khusus bagian luar tubuh. Tanda dari obat bebas terbatas adalah adanya logo bulat atau lingkaran biru bergaris tepi hitam. Beberapa contoh golongan obat bebas terbatas meliputi chlorpheniramine, mebendazole, dekstrometorfan, cetirizine, dan terbinafine.',
    
    3 => 'Obat keras ditandai dengan logo lingkaran berwarna merah dengan garis tepi berwarna hitam dan huruf K di tengah yang menyentuh garis tepi. Obat keras tidak bisa dibeli secara sembarangan karena memerlukan resep dokter. Obat golongan ini memang sering dijual di apotek atau toko obat online, tetapi pembelian dan penggunaannya harus sesuai anjuran dokter untuk mencegah efek samping dan penyalahgunaan obat.',
    
    4 => 'Simbol dari obat golongan narkotika berupa lingkaran merah dengan logo seperti tanda plus di dalamnya. Obat golongan narkotika tidak boleh dikonsumsi sembarangan karena bisa menyebabkan penyalahgunaan maupun ketergantungan obat. Oleh karena itu, obat ini hanya bisa diperoleh dengan resep dokter dan dikonsumsi di bawah pengawasannya. Obat ini terbuat dari tanaman, bahan sintetis, atau semisintetis yang dapat menurunkan kesadaran atau menghilangkan rasa nyeri. Beberapa obat yang termasuk golongan narkotika meliputi codeine, morfin, tramadol, diazepam, dan phenobarbital.',
    
    5 => 'Golongan obat fitofarmaka ditandai dengan logo kristal salju berwarna hijau di dalam lingkaran kuning dengan garis tepi berwarna hijau. Fitofarmaka merupakan obat herbal atau obat tradisional dari bahan alami yang sudah teruji secara klinis dan produknya telah memenuhi standar yang ditetapkan. Berikut ini adalah beberapa contoh obat fitofarmaka yang beredar di pasaran: Obat fitofarmaka dengan kandungan meniran hijau untuk meningkatkan daya tahan tubuh. Obat fitofarmaka dengan kandungan kayu manis dan bunga bungur untuk menurunkan kadar gula darah.',
    
    6 => 'Obat herbal terstandar (OHT) ditandai dengan simbol lingkaran kuning bergaris tepi hiju dengan tiga bintang hijau di dalamnya. Golongan obat ini terbuat dari ekstrak atau penyaringan bahan alami, seperti tanaman obat, bagian tubuh hewan, maupun mineral yang sudah teruji secara ilmiah atau penelitian praklinis.',
    
    7 => 'Jamu merupakan obat yang terbuat dari bahan herbal atau alami yang sudah dipercaya secara turun-temurun dapat mengatasi keluhan atau penyakit tertentu. Obat ini ditandai dengan adanya logo lingkaran putih dengan garis tepi berwarna hijau yang di dalamnya terdapat gambar tumbuhan atau pohon berwarna hijau. Pilihan obat golongan jamu yang dijual di pasaran sangat banyak. Berikut ini adalah beberapa kandungan yang biasa ditemukan dalam obat jamu beserta khasiatnya: (1) Jamu yang mengandung daun wungu, kunyit, daun miana, kunci pepet, dan temu giring untuk meringankan gejala wasir atau ambeien. (2) Jamu dengan kandungan temulawak untuk meningkatan nafsu makan dan menjaga fungsi hati. (3) Jamu yang mengandung ekstrak buah pinang untuk mengatasi diare.'
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>7 Golongan Obat - Apotek Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Header & Sidebar sama seperti sebelumnya -->
    <div class="header">...</div>
    <div class="sidebar" id="sidebar">...</div>

    <div class="main-content" id="mainContent">
        <div class="container">
            <div class="card hero-card">
                <h1><i class="fas fa-certificate"></i> 7 Golongan Obat Resmi Indonesia</h1>
                <p>Klasifikasi penting untuk keamanan, cara pakai, & aturan pembelian</p>
            </div>

            <div class="golongan-grid">
                <?php while($golongan = mysqli_fetch_assoc($result)): ?>
                <div class="golongan-card">
                    <div class="golongan-logo">
                        <?php if($golongan['gambar']): ?>
                            <img src="<?= htmlspecialchars($golongan['gambar']) ?>" alt="<?= htmlspecialchars($golongan['nama_golongan']) ?>">
                        <?php else: ?>
                            <div class="logo-placeholder"><i class="fas fa-prescription-bottle-alt"></i></div>
                        <?php endif; ?>
                    </div>
                    <div class="golongan-content">
                        <h3><?= htmlspecialchars($golongan['nama_golongan']) ?></h3>
                        <div class="golongan-desc">
                            <?= nl2br($deskripsi_golongan[$golongan['id']] ?? 'Deskripsi belum tersedia.'); ?>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</body>
</html>
