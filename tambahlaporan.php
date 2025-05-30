<?php
require("koneksi.php"); // Sertakan koneksi database

$keranjang = mysqli_query($conn, "SELECT * FROM keranjang");
$jumlah_data = mysqli_num_rows($keranjang);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Data dari tabel keranjang ditambah dengan hasil bayar kembalian dan total
    $id_transaksi = $_POST['id_transaksi'];
    $namaproduk_array = $_POST['namaproduk']; //dibuat array karena jika produk ditambahkan ke keranjang lebih dari satu maka dibuat array atau objek
    $harga_array = $_POST['harga']; //dibuat array karena jika produk ditambahkan ke keranjang lebih dari satu maka dibuat array atau objek
    $jumlah_array = $_POST['jumlah']; //dibuat array karena jika produk ditambahkan ke keranjang lebih dari satu maka dibuat array atau objek
    $sub_total_array = $_POST['sub_total']; //dibuat array karena jika produk ditambahkan ke keranjang lebih dari satu maka dibuat array atau objek
    $total = $_POST['total'];
    $bayar = $_POST['bayar'];
    $kembalian = $_POST['kembalian'];
    $tgl = $_POST['tgl'];

    // loop jumlah data dari banyaknya data pada keranjang
    for ($i = 0; $i < $jumlah_data; $i++) {
        $namaproduk = $namaproduk_array[$i];
        $harga = $harga_array[$i];
        $jumlah = $jumlah_array[$i];
        $sub_total = $sub_total_array[$i];
        // masukan data ke tabel laporan
        $sql_insert = "INSERT INTO laporan (id_transaksi, namaproduk, harga, jumlah, sub_total, total, bayar, kembalian, tgl)
                   VALUES ('$id_transaksi', '$namaproduk', '$harga', '$jumlah', '$sub_total', '$total', '$bayar', '$kembalian', '$tgl')";

        $insert_result = mysqli_query($conn, $sql_insert);

        if ($insert_result) {
            echo '<script>alert("Transaksi berhasil dicatat.");</script>';
            // setelah ditambahkan pindah ke halaman struk.php
            header("Location: struk.php");
        } else {
            echo "Error: " . $sql_insert . "<br>" . mysqli_error($conn);
        }
    }
}
