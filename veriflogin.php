<?php
// mengambil atau mengimpor koneksi 
require 'koneksi.php';

// mengirim username dan password ke server
$username = $_POST['username'];
$password = $_POST['password'];

// kemudian mengambil data dari yang sudah diinputkan dan dicocokkan dengan database tabel users
$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // jika result ada dan sesuai masuk ke halaman dashbord
    header("Location: dashboard.php");
} else {
    // jika salah tampilkan alert username atau password salah 
    echo "<script type='text/javascript'>alert('Username atau password salah!');document.location='login.php';</script> ";
}
