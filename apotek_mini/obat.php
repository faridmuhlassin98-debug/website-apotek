<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Obat</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="sidebar">
        <h2>APOTEK SEHAT</h2>
        <a href="index.php">Beranda</a>
        <a href="obat.php">Daftar Obat</a>
    </div>

    <div class="content">
        <h1>Daftar Obat</h1>

        <?php
        $query = mysqli_query($koneksi, "SELECT * FROM obat ORDER BY nama_obat ASC");
        while ($data = mysqli_fetch_array($query)) {
            ?>

            <div class="card">
                <img src="assets/<?php echo $data['gambar']; ?>" alt="<?php echo $data['nama_obat']; ?>" class="card-img">
                <h3 class="card-title"><?php echo $data['nama_obat']; ?></h3>
                <p><?php echo substr($data['deskripsi'], 0, 100); ?></p>
                <p class="harga">Rp <?php echo number_format($data['harga'], 0, ',', '.'); ?></p>

                <a class="btn-beli" href="beli.php?id=<?php echo $data['id']; ?>">BELI</a>
            </div>
        <?php } ?>
    </div>

</body>

</html>