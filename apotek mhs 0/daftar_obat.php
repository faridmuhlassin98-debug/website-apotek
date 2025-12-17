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
                        <img src="paracetamol.jpg" alt="Paracetamol">
                        <div class="obat-card-content">
                            <h3>Paracetamol 500mg</h3>
                            <p>Meredakan demam dan nyeri ringan-sedang</p>
                            <div style="display: flex; justify-content: space-between; align-items: center; margin: 1rem 0;">
                                <div class="obat-price">Rp 7.000</div>
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
                        <img src="amoxicillin.jpg" alt="Amoxicillin">
                        <div class="obat-card-content">
                            <h3>Amoxicillin 500mg</h3>
                            <p>Antibiotik untuk infeksi bakteri</p>
                            <div style="display: flex; justify-content: space-between; align-items: center; margin: 1rem 0;">
                                <div class="obat-price">Rp 10.000</div>
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
                        <img src="bioplacenton.jpg" alt="Bioplacenton">
                        <div class="obat-card-content">
                            <h3>Bioplacenton</h3>
                            <p>Obat untuk luka ringan, luka bakar, dan infeksi kulit</p>
                            <div style="display: flex; justify-content: space-between; align-items: center; margin: 1rem 0;">
                                <div class="obat-price">Rp 30.000</div>
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
                        <img src="dexamethasone" alt="Dexamethasone">
                        <div class="obat-card-content">
                            <h3>Dexamethasone</h3>
                            <p>Obat radang dan alergi berat</p>
                            <div style="display: flex; justify-content: space-between; align-items: center; margin: 1rem 0;">
                                <div class="obat-price">Rp 5.000</div>
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
                        <img src="antimo" alt="Antimo">
                        <div class="obat-card-content">
                            <h3>Antimo Dimenhydrinate</h3>
                            <p>Obat untuk mabuk perjalanan dan mual</p>
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
                        <img src="Promagh.jpg" alt="Promagh">
                        <div class="obat-card-content">
                            <h3>Promagh</h3>
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