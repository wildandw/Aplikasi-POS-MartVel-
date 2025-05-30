<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/dashboard.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="img/icon.png" />
    <title>Laporan</title>
</head>

<body>
    <!-- mengambil sidebar dari sidebar.php untuk memudahkan jika ada perubahan sidebar di setiap halamannya -->
    <?php
    include 'sidebar.php';
    ?>

    <!-- Content -->
    <div class="content dashboard">
        <!-- Navbar -->
        <nav>
            <i class="bx bx-menu"></i>

            <a href="#" class="profile" id="profile-link">
                <img src="img/profile.jpg" />
            </a>
        </nav>
        <!-- End of Navbar  -->

        <main>
            <!-- tabel laporan -->
            <div class="product-table-container">
                <h1>Laporan</h1>
                <table class="product-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Id Transaksi</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Sub Total</th>
                            <th>Total</th>
                            <th>Bayar</th>
                            <th>Kembalian</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // mengimpor data dari koneksi.php
                        require("koneksi.php");
                        $sql = "select * from laporan"; //mengambil data dari tabel laporan
                        $hasil = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_row($hasil);

                        $n = 1;
                        do {
                            list($id_transaksi, $namaproduk, $harga, $jumlah, $sub_total, $total, $bayar, $kembalian, $tgl) = $row; //list setiap field dari tabel laporan 
                            // dan ditampilkan dalam bentuk tabel
                            echo "<tr> 
                    <td>$n</td>
                    <td>$id_transaksi</td>
                    <td>$namaproduk</td>
                    <td>$harga</td>
                    <td>$jumlah</td>
                    <td>$sub_total</td>
                    <td>$total</td>
                    <td>$bayar</td>
                    <td>$kembalian</td>
                    <td>$tgl</td>
                            
                </tr>
                </tbody>";
                            $n++; //n untuk variabel no yg bertambah ketika data pada tavel ikut bertambah
                        } while ($row = mysqli_fetch_row($hasil));
                        ?>
                </table>
            </div>
        </main>

        <!-- Modal -->
        <div class="modal" id="modal">
            <div class="modal-content scale-up">
                <div class="modal-header">
                    <h5 class="modal-title">Profile</h5>
                </div>
                <div class="modal-body">
                    <!-- Add profile information here -->
                    <img src="img/profile.jpg" alt="Profile Photo" />
                    <h4>Admin</h4>
                </div>
                <div class="modal-footer">
                    <a href="aboutUs.php">
                        <button type="button" class="btn btn-secondary" id="btn-about">
                            <i class="bx bx-user-circle"></i>About Us
                        </button></a>
                    <a href="login.php">
                        <button type="button" class="btn btn-logout" id="btn-logout">
                            <i class="bx bx-log-out-circle"></i>Logout
                        </button></a>
                </div>
            </div>
        </div>
    </div>
    <!--  -->

    <script src="js/formodal.js"></script>
    <script src="js/dashboard.js"></script>
</body>

</html>