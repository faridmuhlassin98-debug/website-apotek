<?php
// beranda.php - Halaman Beranda
include 'koneksi.php';
session_start();

// Ambil obat terlaris
$query_terlaris = "SELECT * FROM obat ORDER BY terjual DESC LIMIT 3";
$result_terlaris = mysqli_query($conn, $query_terlaris);
$sql = "SELECT * FROM golongan_obat ORDER BY id";
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - Medivo Store</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>

<body>
    <!-- Header -->
    <div class="header">
        <div class="header-content">
            <div style="display: flex; align-items: center; gap: 1rem;">
                <button class="toggle-btn" onclick="toggleSidebar()">
                    <i class="fas fa-bars"></i>
                </button>
                <h1>MEDIVO STORE</h1>
            </div>
            <div class="header-right">
                <i class="fas fa-capsules" style="font-size: 1.5rem;"></i>
                <span>Kesehatan Mahasiswa</span>
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <nav>
            <a href="beranda.php" class="active">
                <i class="fas fa-home"></i>
                Beranda
            </a>
            <a href="daftar_obat.php">
                <i class="fas fa-pills"></i>
                Daftar Obat
            </a>
            <a href="transaksi.php">
                <i class="fas fa-file-invoice"></i>
                Transaksi
            </a>
        </nav>
    </div>

    <div class="main-content" id="mainContent">
        <div class="container">
            <div class="card hero-card">
                <h1>Selamat Datang di Medivo Store</h1>
                <p>Solusi kesehatan terpercaya untuk mahasiswa</p>
            </div>

            <div class="card">
                <h2 style="color: var(--hitam); margin-bottom: 1.5rem;">
                    <i class="fas fa-concierge-bell"></i> Layanan Kami
                </h2>
                <div class="layanan-grid">
                    <div class="layanan-item">
                        <i class="fas fa-shopping-cart" style="font-size: 2rem; color: #628ECB;"></i>
                        <h3>Pembelian Online</h3>
                        <p>Beli obat dengan mudah dan cepat</p>
                    </div>
                    <div class="layanan-item">
                        <i class="fas fa-box-open" style="font-size: 2rem; color: #628ECB;"></i>
                        <h3>Stok Lengkap</h3>
                        <p>Berbagai macam obat tersedia</p>
                    </div>
                    <div class="layanan-item">
                        <i class="fas fa-tags" style="font-size: 2rem; color: #628ECB;"></i>
                        <h3>Harga Terjangkau</h3>
                        <p>Khusus untuk mahasiswa</p>
                    </div>
                </div>
                <a href="daftar_obat.php" class="btn btn-primary btn-block" style="margin-top: 2rem;">
                    Beli Obat Sekarang
                </a>
            </div>
            <div class="card">
                <h2 style="color: var(--hitam) " margin-bottom: 1,5rem;>
                    <i class="fa-solid fa-circle-info"></i> Informasi Obat
                </h2>
                <div class="golongan-container">
                    <?php
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)):
                        ?>
                        <div class="golongan-card">
                            <?php if ($row['gambar']): ?>
                                <img src="images/<?php echo htmlspecialchars($row['gambar']); ?>"
                                    alt="<?php echo htmlspecialchars($row['nama']); ?>" class="gambar-obat"
                                    style="width: 10%; height: auto;">
                            <?php endif; ?>

                            <h3>
                                <span class="simbol"
                                    style="background-color: <?php echo htmlspecialchars($row['simbol_warna']); ?>"></span>
                                <?php echo htmlspecialchars($row['nama']); ?>
                            </h3>

                            <p><strong>Keterangan:</strong> <?php echo htmlspecialchars($row['keterangan_singkat']); ?>
                            </p>

                            <p><strong>Tempat
                                    Penjualan:</strong><br><?php echo htmlspecialchars($row['tempat_penjualan']); ?></p>

                            <div class="contoh-obat">
                                <strong>Contoh Obat:</strong><br>
                                <?php echo htmlspecialchars($row['contoh_obat']); ?>
                            </div>

                            <p><?php echo htmlspecialchars(substr($row['deskripsi'], 0, )); ?></p>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>

        <div class="card">
            <h2 style="color: var(--hitam); margin-bottom: 1.5rem;">
                <i class="fas fa-star"></i> Obat Terlaris
            </h2>
            <div class="obat-grid">
                <?php
                $rank = 1;
                while ($obat = mysqli_fetch_assoc($result_terlaris)):
                    ?>
                    <div class="obat-card">
                        <div style="position: relative;">
                            <img src="images/<?php echo $obat['gambar']; ?>" alt="<?php echo $obat['nama']; ?>"
                                onerror="this.src='https://via.placeholder.com/300x200?text=Obat'">
                            <div class="badge">#<?php echo $rank++; ?></div>
                        </div>
                        <div class="obat-card-content">
                            <h3><?php echo $obat['nama']; ?></h3>
                            <p><?php echo $obat['keterangan']; ?></p>
                            <div class="obat-price">Rp <?php echo number_format($obat['harga'], 0, ',', '.'); ?>
                            </div>
                            <div class="obat-stock">Terjual: <?php echo $obat['terjual']; ?> pcs</div>
                            <a href="beli_obat.php?id=<?php echo $obat['id']; ?>"
                                class="btn btn-primary btn-block btn-icon">
                                <i class="fas fa-shopping-cart"></i>
                                Beli
                            </a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
    </div>


    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');

            sidebar.classList.toggle('hidden');
            mainContent.classList.toggle('expanded');
        }
    </script>
</body>

</html>