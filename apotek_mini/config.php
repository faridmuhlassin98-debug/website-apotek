<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "db_apotek";

$koneksi = mysqli_connect("localhost", "root", "", "db_apotek", port:3307);

if (!$koneksi) {
    die("Koneksi gagal!: " .
mysqli_connect_error());
}
?>