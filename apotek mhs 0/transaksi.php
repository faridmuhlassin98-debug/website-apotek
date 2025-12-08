<?php
include 'koneksi.php';
session_start();

// Query untuk mengambil data transaksi beserta nama obat
$query = "SELECT t.*, o.nama AS nama_obat 
          FROM transaksi t 
          JOIN obat o ON t.id_obat = o.id 
          ORDER BY t.id DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi - Apotek Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Header -->
    <div class="header">
        <div class="header-content">
            <div style="display: flex; align-items: center; gap: 1rem;">
                <button class="toggle-btn" onclick="toggleSidebar()">
                    <i class="fas fa-bars"></i>
                </button>
                <h1>Apotek Mahasiswa</h1>
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
            <a href="beranda.php">
                <i class="fas fa-home"></i>
                Beranda
            </a>
            <a href="daftar_obat.php">
                <i class="fas fa-pills"></i>
                Daftar Obat
            </a>
            <a href="transaksi.php" class="active">
                <i class="fas fa-file-invoice"></i>
                Transaksi
            </a>
        </nav>
    </div>


    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        <div class="container">
            <div class="card">
                <h1 style="color: #333; margin-bottom: 2rem;">
                    <i class="fas fa-file-invoice"></i> Riwayat Transaksi
                </h1>


                <?php if(mysqli_num_rows($result) > 0): ?>
                <?php while($transaksi = mysqli_fetch_assoc($result)): ?>
                <div class="transaksi-item">
                    <div class="transaksi-header">
                        <h3><?= htmlspecialchars($transaksi['nama_obat']) ?></h3>
                        <p class="transaksi-date">
                            <i class="fas fa-calendar"></i>
                            <?= date('d/m/Y H:i', strtotime($transaksi['tanggal'])) ?>
                        </p>
                    </div>
                    <div class="transaksi-details">
                        <div>
                            <p><strong>Nama:</strong> <?= htmlspecialchars($transaksi['nama_pembeli']) ?></p>
                            <p><strong>Alamat:</strong> <?= htmlspecialchars($transaksi['alamat']) ?></p>
                            <p><strong>No. HP:</strong> <?= htmlspecialchars($transaksi['no_hp']) ?></p>
                        </div>
                        <div style="text-align: right;">
                            <p><strong>Jumlah:</strong> <?= $transaksi['jumlah'] ?> pcs</p>
                            <div class="transaksi-total">
                                Rp <?= number_format($transaksi['total'], 0, ',', '.') ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
                <?php else: ?>
                <p>Tidak ada transaksi.</p>
                <?php endif; 
                ?>

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