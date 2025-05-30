<?php
// mengambil atau mengimpor koneksi 
require 'koneksi.php';

$query = "DELETE FROM keranjang"; //menghapus semua data pada tabel keranjang
mysqli_query($conn, $query);

// berpindah halaman ke transaksi.php
header("location:transaksi.php");
