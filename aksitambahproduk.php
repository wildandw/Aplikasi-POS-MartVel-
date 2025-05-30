<?php
// mengambil atau mengimpor koneksi 
require("koneksi.php");
// metode post digunakan untuk mengirimkan data ke server
$kodeproduk      = $_POST['kodeproduk'];
$namaproduk      = $_POST['namaproduk'];
$kategori        = $_POST['kategori'];
$harga           = $_POST['harga'];

// jika kode produk tidak kosong insert atau tambahkan ke dalam tabel produk
if ($kodeproduk != '') {
    $sql = "INSERT into produk values ('$kodeproduk','$namaproduk','$kategori','$harga') ";
    $hasil = mysqli_query($conn, $sql);

    // ini untuk membuat kode produk otomatis dengan berawalan prod dan ditambahkan urutan yg dibuat dari 000 dan terus bertambah seiring bertambahnya data
    $query = mysqli_query($conn, "SELECT max(kodeproduk) as kodeTerbesar FROM produk");
    $data = mysqli_fetch_array($query);
    $kodeproduk = $data['kodeTerbesar'];
    $urutan = (int) substr($kodeproduk, 3, 3);
    $urutan++;
    $huruf = "PROD";
    $kodeproduk = $huruf . sprintf("%03s", $urutan);
    // memunculkan informasi bahwa data berhasil ditambahkan dengan menggunakn echo
    echo "Produk telah ditambahkan";
    echo "<script type='text/javascript'>alert('Data dengan kode produk $kodeproduk telah berhasil ditambahkan');document.location='produk.php';</script> ";
} else {
    // jika kodeproduk terisi halaman langsung berpindah ke produk.php dan beri informasi bahwa data tidak boleh ada yg kosong
    echo "<script type='text/javascript'>alert('Data tidak boleh ada yang kosong');document.location='produk.php';</script> ";
}
