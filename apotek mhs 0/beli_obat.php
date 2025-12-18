<?php
// beli_obat.php - Halaman Form Pembelian
include 'koneksi.php';
session_start();

// Cek apakah ada ID obat
if (!isset($_GET['id'])) {
    header("Location: daftar_obat.php");
    exit();
}

$id_obat = clean_input($_GET['id']);

// Ambil data obat
$query = "SELECT * FROM obat WHERE id = '$id_obat'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 0) {
    header("Location: daftar_obat.php");
    exit();
}

$obat = mysqli_fetch_assoc($result);

// Proses pembelian
if (isset($_POST['beli'])) {
    $nama_pembeli = clean_input($_POST['nama']);
    $alamat = clean_input($_POST['alamat']);
    $no_hp = clean_input($_POST['no_hp']);
    $jumlah = clean_input($_POST['jumlah']);
    $total = $obat['harga'] * $jumlah;

    // Validasi stok
    if ($jumlah > $obat['stok']) {
        $error = "Stok tidak mencukupi!";
    } else {
        // Insert transaksi
        $query_insert = "INSERT INTO transaksi (id_obat, nama_pembeli, alamat, no_hp, jumlah, total) 
                        VALUES ('$id_obat', '$nama_pembeli', '$alamat', '$no_hp', '$jumlah', '$total')";

        if (mysqli_query($conn, $query_insert)) {
            // Update stok dan terjual
            $stok_baru = $obat['stok'] - $jumlah;
            $terjual_baru = $obat['terjual'] + $jumlah;

            $query_update = "UPDATE obat SET stok = '$stok_baru', terjual = '$terjual_baru' WHERE id = '$id_obat'";
            mysqli_query($conn, $query_update);

            $_SESSION['success'] = "Pembelian berhasil! Silakan cek halaman Transaksi.";
            header("Location: transaksi.php");
            exit();
        } else {
            $error = "Terjadi kesalahan saat memproses pembelian.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beli Obat - Medivo Store</title>
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
            <div class="card">
                <h1 style="color: #333; margin-bottom: 2rem;">
                    <i class="fas fa-shopping-cart"></i> Form Pembelian
                </h1>

                <?php if (isset($error)): ?>
                    <div class="alert alert-danger" style="display: block;">
                        <i class="fas fa-exclamation-circle"></i> <?php echo $error; ?>
                    </div>
                <?php endif; ?>

                <div id="alertContainer"></div>

                <form method="POST">
                    <div class="detail-grid">
                        <div class="product-image">
                            <img src="images/<?php echo $obat['gambar']; ?>"
                                 alt="<?= htmlspecialchars($obat['nama'] ?? 'Obat') ?>">
                            <div class="product-info">
                                <h2><?= htmlspecialchars($obat['nama'] ?? 'Paracetamol 500mg') ?></h2>
                                <p><?= htmlspecialchars($obat['deskripsi'] ?? 'Obat berkualitas') ?></p>
                                <div class="obat-price">
                                    Rp <?= number_format($obat['harga'] ?? 5000, 0, ',', '.') ?> / pcs
                                </div>
                                <p>Stok tersedia: <span id="stokDisplay"><?= $obat['stok'] ?? 100 ?></span></p>
                            </div>
                        </div>

                        <div>
                            <div class="form-group">
                                <label for="nama">Nama Lengkap <span style="color: red;">*</span></label>
                                <input type="text" id="nama" name="nama" class="form-control" required
                                       placeholder="Masukkan nama lengkap">
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat <span style="color: red;">*</span></label>
                                <textarea id="alamat" name="alamat" class="form-control" required
                                          placeholder="Masukkan alamat lengkap"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="no_hp">No. Handphone <span style="color: red;">*</span></label>
                                <input type="tel" id="no_hp" name="no_hp" class="form-control" required
                                       placeholder="08xx-xxxx-xxxx">
                            </div>

                            <div class="form-group">
                                <label for="jumlah">Jumlah <span style="color: red;">*</span></label>
                                <div class="quantity-control">
                                    <button type="button" class="quantity-btn" onclick="decreaseQty()">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <input type="number" id="jumlah" name="jumlah" value="1" min="1"
                                           max="<?= $obat['stok'] ?? 100 ?>" class="form-control quantity-input"
                                           onchange="updateTotal()">
                                    <button type="button" class="quantity-btn" onclick="increaseQty()">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="total-box">
                                <div style="display: flex; justify-content: space-between; align-items: center;">
                                    <span class="total-label">Total Pembayaran:</span>
                                    <span class="total-amount" id="totalAmount">
                                        Rp <?= number_format(($obat['harga'] ?? 5000) * 1, 0, ',', '.') ?>
                                    </span>
                                </div>
                            </div>

                            <button type="submit" name="beli" class="btn btn-primary btn-block">
                                <i class="fas fa-check-circle"></i> Konfirmasi Pembelian
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // *** HARGANYA SUDAH AMBIL DARI DATABASE SESUAI OBAAT ***
        const hargaSatuan = <?php echo json_encode($obat['harga'] ?? 5000); ?>;
        const stokMax = <?php echo json_encode($obat['stok'] ?? 100); ?>;

        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            sidebar.classList.toggle('hidden');
            mainContent.classList.toggle('expanded');
        }

        function updateTotal() {
            const jumlah = parseInt(document.getElementById('jumlah').value) || 1;
            const total = hargaSatuan * jumlah;
            document.getElementById('totalAmount').textContent = 
                'Rp ' + total.toLocaleString('id-ID');
        }

        function increaseQty() {
            const input = document.getElementById('jumlah');
            const currentVal = parseInt(input.value) || 1;
            if (currentVal < stokMax) {
                input.value = currentVal + 1;
                updateTotal();
            }
        }

        function decreaseQty() {
            const input = document.getElementById('jumlah');
            const currentVal = parseInt(input.value) || 1;
            if (currentVal > 1) {
                input.value = currentVal - 1;
                updateTotal();
            }
        }

        // Inisialisasi saat halaman load
        document.addEventListener('DOMContentLoaded', function() {
            // Update total pertama kali
            updateTotal();
            
            // Validasi input jumlah
            document.getElementById('jumlah').addEventListener('input', function () {
                let val = parseInt(this.value);
                if (isNaN(val) || val < 1) val = 1;
                if (val > stokMax) val = stokMax;
                this.value = val;
                updateTotal();
            });

            // Validasi no HP hanya angka
            document.getElementById('no_hp').addEventListener('input', function () {
                this.value = this.value.replace(/[^0-9]/g, '');
            });
        });
    </script>
</body>
</html>
