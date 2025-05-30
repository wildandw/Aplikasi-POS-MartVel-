<?php
// mengambil atau mengimpor koneksi 
require 'koneksi.php';

// metode permintaan post yang digunakan unutk mengirimkan data ke server
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kodeproduk = $_POST['kodeproduk'];
    $namaproduk = $_POST['namaproduk'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];

    // sql untuk update namaproduk, kategori dan harga dari tabel produk 
    $sql = "UPDATE produk SET namaproduk='$namaproduk', kategori='$kategori', harga='$harga' WHERE kodeproduk='$kodeproduk'";
    $result = mysqli_query($conn, $sql);

    // jika result muncul akses atau pindah kembali ke halaman produk dan jika error tampilkan error
    if ($result) {
        header("location: produk.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // tutup koneksi
    mysqli_close($conn);
} else {
    header("location: produk.php"); // Kembali ke halaman produk jika bukan request POST
}
