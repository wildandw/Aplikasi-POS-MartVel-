<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/dashboard.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="img/icon.png" />
    <title>Dashboard</title>
</head>

<body>
    <!-- mengambil sidebar dari sidebar.php untuk memudahkan jika ada perubahan sidebar di setiap halamannya -->
    <?php
    include 'sidebar.php';
    ?>

    <!-- Content -->
    <div class="content">
        <!-- Navbar -->
        <nav>
            <i class="bx bx-menu"></i>
            <a href="#" class="profile" id="profile-link">
                <img src="img/profile.jpg" />
            </a>
        </nav>
        <!-- End of Navbar  -->
        <main>
            <div class="header">
                <div class="left">
                    <h1>Produk</h1>
                    <ul class="breadcrumb">
                        <li><a href="dashboard.php">Beranda</a></li>
                        <li>/</li>
                        <li><a href="produk.php">Produk</a></li>
                        <li>/</li>
                        <li><a href="editproduk.php" class="active">Edit Produk</a></li>
                    </ul>
                </div>
            </div>
            <!-- menyisipkan/mengambil data dari file koneksi -->
            <?php
            include 'koneksi.php';
            $kodeproduk = $_GET['kodeproduk']; //mengambil data kode produk
            $sql = "SELECT * FROM produk WHERE kodeproduk = '$kodeproduk'"; // mengambil semua data dari tabel produk dimana kodeproduk yg dipilih untuk di edit
            $query  = mysqli_query($conn, $sql);
            $row   = mysqli_fetch_array($query);

            // array untuk kategori
            $kategori = array(
                "Minuman" => "Minuman",
                "Makanan" => "Makanan",
                "Kesehatan" => "Kesehatan",
                "Elektronik" => "Elektronik",
                "Perawatan" => "Perawatan"
            );

            ?>
            <div class="modal2-body">
                <!-- form edit dengan aksi diambil dari aksieditproduk.php dan menggunakan method post untuk mengirim data ke server -->
                <form id="formEditProduk" action="aksieditproduk.php" method="post">
                    <div class="form-group">
                        <div class="form-row">
                            <label for="kodeProduk">Kode Produk</label>

                            <input type="text" id="kodeproduk" name="kodeproduk" value="<?php echo $row['kodeproduk']; ?>" readonly /> <!-- input text yg langsung memunculkan value -->
                        </div>
                        <div class="form-row">
                            <label for="namaProduk">Nama Produk</label>
                            <input type="text" id="namaproduk" name="namaproduk" value="<?php echo $row['namaproduk']; ?>" /> <!-- input text yg langsung memunculkan value -->
                        </div>
                        <div class="form-row">
                            <label for="kategori">Kategori</label>
                            <select id="kategori" name="kategori">
                                <?php
                                // digunakan untuk mengulang array kategori yang tadi kita buat dan ditampilkan jika kita sudah memilih sebelumnya 
                                foreach ($kategori as $key => $value) {
                                    $selected = ($row['kategori'] == $value) ? 'selected' : '';
                                    echo '<option value="' . $value . '" ' . $selected . '>' . $value . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-row">
                            <label for="harga">Harga</label>
                            <input type="text" id="harga" name="harga" value="<?php echo $row['harga']; ?>" /> <!-- input text yg langsung memunculkan value -->
                        </div>
                        <button class="btn btn-primary" id="btnSimpan" type="submit">Simpan</button>
                        <a href="produk.php">
                            <button class="btn btn-secondary" id="btnKembali" type="button">Kembali</button>
                        </a>
                    </div>
                </form>

            </div>
            <div class="modal2-footer">
            </div>

            <!-- Modal informasi profil-->
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
    </main>

    <script>
        // mengambil elemen berdasarkan id menambahkank event listener untuk tombol "Simpan"
        // dan tampilkan alert 
        document.getElementById("btnSimpan").addEventListener("click", function() {
            alert('Data dengan kode produk <?php echo $row['kodeproduk']; ?> telah berhasil diupdate');
        });
    </script>
    <script src="js/formodal1.js"></script>
    <script src="js/formodal2.js"></script>
    <script src="js/formodal.js"></script>
    <script src="js/dashboard.js"></script>
</body>

</html>