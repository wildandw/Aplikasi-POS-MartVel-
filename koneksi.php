<?php
//menghubungkan syntax php yg dibuat dengan database sehingga bisa digunakan untuk mengelola informasi atau menyimpan data
$conn = mysqli_connect("localhost", "root", "", "db_pointofsale"); //berisi namahost database,nama pengguna,kata sandi, dan nama database

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
