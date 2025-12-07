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
    <title>Beranda - Apotek Mahasiswa</title>
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

    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        <div class="container">
            <!-- Hero Section -->
            <div class="card hero-card">
                <h1>Selamat Datang di Apotek Mahasiswa</h1>
                <p>Solusi kesehatan terpercaya untuk mahasiswa</p>
            </div>

            <!-- Layanan -->
            <div class="card">
                <h2 style="color: #333; margin-bottom: 1.5rem;">
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
                <h2 style="color: hitam;"></h2>
            </div>

            <!-- Obat Terlaris -->
            <div class="card">
                <h2 style="color: hitam; margin-bottom: 1.5rem;">
                    <i class="fas fa-star"></i> Obat Terlaris
                </h2>
                <div class="obat-grid">
                    <!-- Obat 1 -->
                    <div class="obat-card">
                        <div style="position: relative;">
                            <img src="https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?w=300" alt="Vitamin C">
                            <div class="badge">#1</div>
                        </div>
                        <div class="obat-card-content">
                            <h3>Vitamin C 1000mg</h3>
                            <p>Suplemen vitamin C untuk daya tahan tubuh</p>
                            <div class="obat-price">Rp 25.000</div>
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
                            <img src="https://images.unsplash.com/photo-1471864190281-a93a3070b6de?w=300" alt="Paracetamol">
                            <div class="badge">#2</div>
                        </div>
                        <div class="obat-card-content">
                            <h3>Paracetamol 500mg</h3>
                            <p>Obat pereda demam dan nyeri</p>
                            <div class="obat-price">Rp 5.000</div>
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
                            <img src="https://images.unsplash.com/photo-1730388843790-f753ecf9ba94?q=80&w=435&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Amoxicillin">
                            <div class="badge">#3</div>
                        </div>
                        <div class="obat-card-content">
                            <h3>Amoxicillin 500mg</h3>
                            <p>Antibiotik untuk infeksi bakteri</p>
                            <div class="obat-price">Rp 15.000</div>
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