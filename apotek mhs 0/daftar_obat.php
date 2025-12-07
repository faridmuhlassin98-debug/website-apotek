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
    <title>Daftar Obat - Apotek Mahasiswa</title>
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

    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        <div class="container">
            <div class="card">
                <h1 style="color: #333; margin-bottom: 2rem;">
                    <i class="fas fa-pills"></i> Daftar Obat
                </h1>
                
                <div class="obat-grid">
                    <!-- Obat 1 -->
                    <div class="obat-card">
                        <img src="https://images.unsplash.com/photo-1471864190281-a93a3070b6de?w=300" alt="Paracetamol">
                        <div class="obat-card-content">
                            <h3>Paracetamol 500mg</h3>
                            <p>Obat pereda demam dan nyeri</p>
                            <div style="display: flex; justify-content: space-between; align-items: center; margin: 1rem 0;">
                                <div class="obat-price">Rp 5.000</div>
                                <div class="obat-stock">Stok: 100</div>
                            </div>
                            <a href="beli_obat.php?id=1" class="btn btn-primary btn-block btn-icon">
                                <i class="fas fa-shopping-cart"></i>
                                Beli Sekarang
                            </a>
                        </div>
                    </div>

                    <!-- Obat 2 -->
                    <div class="obat-card">
                        <img src="https://images.unsplash.com/photo-1730388843790-f753ecf9ba94?q=80&w=435&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Amoxicillin">
                        <div class="obat-card-content">
                            <h3>Amoxicillin 500mg</h3>
                            <p>Antibiotik untuk infeksi bakteri</p>
                            <div style="display: flex; justify-content: space-between; align-items: center; margin: 1rem 0;">
                                <div class="obat-price">Rp 15.000</div>
                                <div class="obat-stock">Stok: 80</div>
                            </div>
                            <a href="beli_obat.php?id=2" class="btn btn-primary btn-block btn-icon">
                                <i class="fas fa-shopping-cart"></i>
                                Beli Sekarang
                            </a>
                        </div>
                    </div>

                    <!-- Obat 3 -->
                    <div class="obat-card">
                        <img src="https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?w=300" alt="Vitamin C">
                        <div class="obat-card-content">
                            <h3>Vitamin C 1000mg</h3>
                            <p>Suplemen vitamin C untuk daya tahan tubuh</p>
                            <div style="display: flex; justify-content: space-between; align-items: center; margin: 1rem 0;">
                                <div class="obat-price">Rp 25.000</div>
                                <div class="obat-stock">Stok: 150</div>
                            </div>
                            <a href="beli_obat.php?id=3" class="btn btn-primary btn-block btn-icon">
                                <i class="fas fa-shopping-cart"></i>
                                Beli Sekarang
                            </a>
                        </div>
                    </div>

                    <!-- Obat 4 -->
                    <div class="obat-card">
                        <img src="https://images.unsplash.com/photo-1587854692152-cbe660dbde88?w=300" alt="OBH Combi">
                        <div class="obat-card-content">
                            <h3>OBH Combi</h3>
                            <p>Obat batuk berdahak</p>
                            <div style="display: flex; justify-content: space-between; align-items: center; margin: 1rem 0;">
                                <div class="obat-price">Rp 18.000</div>
                                <div class="obat-stock">Stok: 60</div>
                            </div>
                            <a href="beli_obat.php?id=4" class="btn btn-primary btn-block btn-icon">
                                <i class="fas fa-shopping-cart"></i>
                                Beli Sekarang
                            </a>
                        </div>
                    </div>

                    <!-- Obat 5 -->
                    <div class="obat-card">
                        <img src="https://images.unsplash.com/photo-1585435557343-3b092031a831?w=300" alt="Antasida">
                        <div class="obat-card-content">
                            <h3>Antasida</h3>
                            <p>Obat maag dan asam lambung</p>
                            <div style="display: flex; justify-content: space-between; align-items: center; margin: 1rem 0;">
                                <div class="obat-price">Rp 8.000</div>
                                <div class="obat-stock">Stok: 70</div>
                            </div>
                            <a href="beli_obat.php?id=5" class="btn btn-primary btn-block btn-icon">
                                <i class="fas fa-shopping-cart"></i>
                                Beli Sekarang
                            </a>
                        </div>
                    </div>

                    <!-- Obat 6 -->
                    <div class="obat-card">
                        <img src="https://images.unsplash.com/photo-1576602976047-174e57a47881?w=300" alt="Promag">
                        <div class="obat-card-content">
                            <h3>Promag</h3>
                            <p>Obat untuk mengatasi maag</p>
                            <div style="display: flex; justify-content: space-between; align-items: center; margin: 1rem 0;">
                                <div class="obat-price">Rp 12.000</div>
                                <div class="obat-stock">Stok: 90</div>
                            </div>
                            <a href="beli_obat.php?id=6" class="btn btn-primary btn-block btn-icon">
                                <i class="fas fa-shopping-cart"></i>
                                Beli Sekarang
                            </a>
                        </div>
                    </div>

                    <!-- Obat 7 -->
                    <div class="obat-card">
                        <img src="https://plus.unsplash.com/premium_photo-1671721439617-491242a0507f?q=80&w=394&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Bodrex">
                        <div class="obat-card-content">
                            <h3>Bodrex</h3>
                            <p>Obat sakit kepala</p>
                            <div style="display: flex; justify-content: space-between; align-items: center; margin: 1rem 0;">
                                <div class="obat-price">Rp 7.000</div>
                                <div class="obat-stock">Stok: 120</div>
                            </div>
                            <a href="beli_obat.php?id=7" class="btn btn-primary btn-block btn-icon">
                                <i class="fas fa-shopping-cart"></i>
                                Beli Sekarang
                            </a>
                        </div>
                    </div>

                    <!-- Obat 8 -->
                    <div class="obat-card">
                        <img src="https://plus.unsplash.com/premium_photo-1668487826871-2f2cac23ad56?q=80&w=812&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Mixagrip">
                        <div class="obat-card-content">
                            <h3>Mixagrip</h3>
                            <p>Obat flu dan demam</p>
                            <div style="display: flex; justify-content: space-between; align-items: center; margin: 1rem 0;">
                                <div class="obat-price">Rp 9.000</div>
                                <div class="obat-stock">Stok: 100</div>
                            </div>
                            <a href="beli_obat.php?id=8" class="btn btn-primary btn-block btn-icon">
                                <i class="fas fa-shopping-cart"></i>
                                Beli Sekarang
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