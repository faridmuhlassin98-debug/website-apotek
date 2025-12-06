<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "db_apotek";

$koneksi = mysqli_connect("localhost", "root", "", "db_apotek");

if (!$koneksi) {
    die("Koneksi gagal!: " .
        mysqli_connect_error());
}
?>