<?php
// daftar_obat.php - Halaman Daftar Obat
include 'koneksi.php';
session_start();

// Ambil semua obat
$query = "SELECT * FROM obat ORDER BY nama ASC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Obat - Medivo Store</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
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

    <div class="sidebar" id="sidebar">
        <nav>
            <a href="beranda.php">
                <i class="fas fa-home"></i>
                Beranda
            </a>
            <a href="daftar_obat.php" class="active">
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
            <div class="card">
                <h1 style="color: #333; margin-bottom: 2rem;">
                    <i class="fas fa-pills"></i> Daftar Obat
                </h1>

                <div class="obat-grid">
                    <?php while ($obat = mysqli_fetch_assoc($result)): ?>
                        <div class="obat-card">
                            <img src="images/<?php echo $obat['gambar']; ?>" alt="<?php echo $obat['nama']; ?>"
                                onerror="this.src='https://via.placeholder.com/300x200?text=Obat'">
                            <div class="obat-card-content">
                                <h3><?php echo $obat['nama']; ?></h3>
                                <p><?php echo $obat['keterangan']; ?></p>
                                <div
                                    style="display: flex; justify-content: space-between; align-items: center; margin: 1rem 0;">
                                    <div class="obat-price">Rp <?php echo number_format($obat['harga'], 0, ',', '.'); ?>
                                    </div>
                                    <div class="obat-stock">Stok: <?php echo $obat['stok']; ?></div>
                                </div>
                                <a href="beli_obat.php?id=<?php echo $obat['id']; ?>"
                                    class="btn btn-primary btn-block btn-icon">
                                    <i class="fas fa-shopping-cart"></i>
                                    Beli Sekarang
                                </a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>

                <?php if (mysqli_num_rows($result) == 0): ?>
                    <div class="empty-state">
                        <i class="fas fa-box-open" style="font-size: 4rem; color: #ccc;"></i>
                        <p>Belum ada obat tersedia</p>
                    </div>
                <?php endif; ?>
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