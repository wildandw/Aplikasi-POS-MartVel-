<?php
// mengambil atau mengimpor koneksi 
require 'koneksi.php';

$namaproduk = $_GET['namaproduk']; //mengambil value namaproduk

$query = "delete from keranjang where namaproduk='$namaproduk'"; //kemudian hapus menggunakan sql delete dari tabel keranjang yg dimana namaproduknya sesuai dengan yg diambil/dipilih
mysqli_query($conn, $query);

// berpindah halaman ke transaksi.php
header("location:transaksi.php");
