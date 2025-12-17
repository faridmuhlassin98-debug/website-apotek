<?php
// beranda.php - Halaman Beranda
include 'koneksi.php';
session_start();

// Ambil obat terlaris
$query_terlaris = "SELECT * FROM obat ORDER BY terjual DESC LIMIT 3";
$result_terlaris = mysqli_query($conn, $query_terlaris);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <title>Beranda - MEDIFO</title>
=======
    <title>Beranda - Medivo Store</title>
>>>>>>> ed7924fc8fbb0f9aa9e701e0bc09c7ac59b645ff
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>

<body>
    <div class="header">
        <div class="header-content">
            <div style="display: flex; align-items: center; gap: 1rem;">
                <button class="toggle-btn" onclick="toggleSidebar()">
                    <i class="fas fa-bars"></i>
                </button>
                <h1>Medivo Store</h1>
            </div>
            <div class="header-right">
                <i class="fas fa-capsules" style="font-size: 1.5rem;"></i>
                <span>Kesehatan Mahasiswa</span>
            </div>
        </div>
    </div>

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
            <a href="informasi_obat.php" class="<?= basename($_SERVER['PHP_SELF']) == 'informasi_obat.php' ? 'active' : '' ?>">
                <i class="fas fa-info-circle"></i>
                Informasi Obat
            </a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        <div class="container">
            <!-- Hero Section -->
            <div class="card hero-card">
                <h1>Selamat Datang di Medivo Store</h1>
                <p>Solusi kesehatan terpercaya untuk mahasiswa</p>
            </div>

            <!-- Layanan -->
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

            <!-- INFORMASI OBAT - KLIK LANGSUNG KE FITUR -->
            <div class="card">
                <a href="informasi_obat.php" style="text-decoration: none; color: inherit; display: block;">
                    <div style="display: flex; align-items: center; padding: 2rem; cursor: pointer; transition: all 0.3s ease; border-radius: inherit;">
                        <div style="width: 70px; height: 70px; background: linear-gradient(135deg, #667eea, #764ba2); border-radius: 16px; display: flex; align-items: center; justify-content: center; margin-right: 1.5rem; flex-shrink: 0; box-shadow: 0 4px 12px rgba(102,126,234,0.3);">
                            <i class="fas fa-info-circle" style="color: white; font-size: 1.8rem;"></i>
                        </div>
                        <div style="flex: 1;">
                            <h2 style="color: var(--hitam); margin: 0 0 0.5rem 0; font-size: 1.5rem; font-weight: 700;">
                                Informasi Golongan Obat
                            </h2>
                            <p style="color: #666; margin: 0; font-size: 1rem; line-height: 1.6;">
                                Kenali 7 golongan obat resmi Indonesia beserta logo, ciri khas, dan aturan penggunaannya
                            </p>
                        </div>
                        <div style="color: #667eea; font-size: 1.3rem; font-weight: 600; opacity: 0.8;">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Obat Terlaris -->
            <div class="card">
                <h2 style="color: var(--hitam); margin-bottom: 1.5rem;">
                    <i class="fas fa-star"></i> Obat Terlaris
                </h2>
                <div class="obat-grid">
                    <!-- Obat 1 -->
                    <div class="obat-card">
                        <div style="position: relative;">
                            <img src="paracetamol.jpg" alt="Paracetamol">
                            <div class="badge">#1</div>
                        </div>
                        <div class="obat-card-content">
                            <h3>Paracetamol 500mg</h3>
                            <p>Meredakan demam dan nyeri ringan-sedang</p>
                            <div class="obat-price">Rp 7.000</div>
                            <div class="obat-stock">Terjual: 200 pcs</div>
                            <a href="beli_obat.php?id=1" class="btn btn-primary btn-block btn-icon">
                                <i class="fas fa-shopping-cart"></i>
                                Beli
                            </a>
                        </div>
                    </div>

                    <!-- Obat 2 -->
                    <div class="obat-card">
                        <div style="position: relative;">
                            <img src="amoxicillin.jpg" alt="Amoxicillin">
                            <div class="badge">#2</div>
                        </div>
                        <div class="obat-card-content">
                            <h3>Amoxicillin 500mg</h3>
                            <p>Antibiotik untuk infeksi bakteri</p>
                            <div class="obat-price">Rp 10.000</div>
                            <div class="obat-stock">Terjual: 150 pcs</div>
                            <a href="beli_obat.php?id=2" class="btn btn-primary btn-block btn-icon">
                                <i class="fas fa-shopping-cart"></i>
                                Beli
                            </a>
                        </div>
                    </div>

                    <!-- Obat 3 -->
                    <div class="obat-card">
                        <div style="position: relative;">
                            <img src="bioplacenton.jpg" alt="Bioplacenton">
                            <div class="badge">#3</div>
                        </div>
                        <div class="obat-card-content">
                            <h3>Bioplacenton</h3>
                            <p>Obat untuk luka ringan, luka bakar, dan infeksi kulit</p>
                            <div class="obat-price">Rp 30.000</div>
                            <div class="obat-stock">Terjual: 120 pcs</div>
                            <a href="beli_obat.php?id=3" class="btn btn-primary btn-block btn-icon">
                                <i class="fas fa-shopping-cart"></i>
                                Beli
                            </a>
                        </div>
                    </div>
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
