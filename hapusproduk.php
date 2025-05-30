<?php
// mengambil atau mengimpor koneksi 
require 'koneksi.php';

$kodeproduk = $_GET['kodeproduk']; //mengambil value kodeproduk

$query = "delete from produk where kodeproduk='$kodeproduk'"; //kemudian hapus menggunakan sql delete dari tabel produk yg dimana namaproduknya sesuai dengan yg diambil/dipilih
mysqli_query($conn, $query);

header("location:produk.php");//berpindah halaman ke produk.php
