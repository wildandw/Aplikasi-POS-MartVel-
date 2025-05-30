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
            <li><a href="produk.php" class="active">Produk</a></li>
          </ul>
        </div>
        <!-- tampilan untuk mencari produk -->
        <div class="right">
          <div class="form-input">
            <form action="#" method="GET">
              <!-- memanggil method get untuk memanggil produk di dalam tabel produk function search berada di line 67 -->
              <input type="search" id="searchInput" name="kategoriSearch" placeholder="Cari berdasarkan kategori.." />
              <button class="search-btn" type="button">
                <i class="bx bx-search"></i>
              </button>
            </form>
          </div>
        </div>
      </div>


      <table class="product-table">
        <thead>
          <tr>
            <th>No</th>
            <th>Kode Produk</th>
            <th>Nama Produk</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          require("koneksi.php");
          $searchText = isset($_GET['kategoriSearch']) ? $_GET['kategoriSearch'] : ''; //kategorisearch diambil dari name kategori dari line 44
          // function search untuk mencari produk berdasarkan kategori
          $sql = "SELECT * FROM produk"; // mengambil data dari tabel produk
          if (!empty($searchText)) {
            $sql .= " WHERE kategori LIKE '%$searchText%'";
          }

          $hasil = mysqli_query($conn, $sql);
          $n = 1;

          while ($row = mysqli_fetch_row($hasil)) {
            list($kodeproduk, $namaproduk, $kategori, $harga) = $row;
            echo "<tr>
                  <td>$n</td>
                  <td>$kodeproduk</td>
                  <td>$namaproduk</td>
                  <td class='kategori'>$kategori</td>
                  <td>Rp.$harga</td>
                  <td>
                      <button class='edit-btn'><a href='editproduk.php?kodeproduk=$kodeproduk'><i class='bx bx-edit'></i></a></button>
                      <button class='delete-btn'><a href='hapusproduk.php?kodeproduk=$kodeproduk' onclick=\"return confirm('Anda Yakin mau menghapus data ini?')\"><i class='bx bx-trash'></i></a></button>
                  </td>
              </tr>";
            $n++;
          }
          ?>

      </table>

      <div id="resultMessage" class="result-message"></div>

      <div id="resultMessage" class="result-message"></div>

      <!-- modal bootstrap tambah data produk -->
      <button class="add-main-produk" type="button">Tambah Produk</button>
      <div class="modal1" id="modal1TambahProduk">
        <div class="modal1-content">
          <div class="modal1-header">
            <h5>Tambah Produk</h5>
          </div>
          <div class="modal1-body">
            <form id="formTambahProduk" action="aksitambahproduk.php" method="post">
              <div class="form-group">
                <div class="form-row">
                  <label for="kodeProduk">Kode Produk</label>
                  <?php
                  require("koneksi.php");
                  // membuat kodeproduk otomatis ketika kodeproduk terbesar diambil maka tambah urutannya dan diawali dengan huruf PROD
                  $query = mysqli_query($conn, "SELECT max(kodeproduk) as kodeTerbesar FROM produk");
                  $data = mysqli_fetch_array($query);
                  $kodebarang = $data['kodeTerbesar'];
                  $urutan = (int) substr($kodebarang, 4);
                  $urutan++;
                  $kodeproduk = "PROD" . sprintf("%03s", $urutan);
                  //lalu tampilkan 
                  ?>
                  <input type="text" id="kodeproduk" name="kodeproduk" value="<?php echo $kodeproduk; ?>" readonly />
                </div>
                <div class="form-row">
                  <label for="namaProduk">Nama Produk</label>
                  <input type="text" id="namaproduk" name="namaproduk" required />
                </div>
                <div class="form-row">
                  <label for="kategori">Kategori</label><br>
                  <select name="kategori" id="kategori" required />
                  <option value="Minuman">Minuman</option>
                  <option value="Makanan">Makanan</option>
                  <option value="Kesehatan">Kesehatan</option>
                  <option value="Elektronik">Elektronik</option>
                  <option value="Perawatan">Perawatan</option>
                  </select>
                </div>
                <div class="form-row">
                  <label for="harga">Harga</label>
                  <input type="text" id="harga" name="harga" required />
                </div>
              </div>
              <div class="modal1-footer">
                <button class="btn btn-secondary" id="btnReset">Reset</button>
                <button class="btn btn-primary" id="btnSimpan">Simpan</button>
              </div>
            </form>
          </div>

        </div>
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
  <!-- Perubahan pada kode JavaScript -->
  <script>
    // function untuk search menggunakan sorting kategori

    document.addEventListener("DOMContentLoaded", function() {
      const searchInput = document.getElementById("searchInput");
      const resultMessage = document.getElementById("resultMessage");
      const rows = document.querySelectorAll(".product-table tbody tr");
      const tableBody = document.querySelector(".product-table tbody");

      function filterRows() {
        // ketika mengetik di search apapun yg di input ubah ke huruf kecil semua
        const searchText = searchInput.value.toLowerCase();
        let foundRows = 0;

        rows.forEach(function(row) {
          const kategoriCell = row.querySelector(".kategori");
          const kategoriText = kategoriCell.textContent.toLowerCase();

          if (kategoriText.includes(searchText)) {
            row.style.display = "";
            foundRows++;
          } else {
            row.style.display = "none";
          }
        });

        // Tampilkan pesan jika tidak ada kategori yang ditemukan
        if (foundRows === 0) {
          resultMessage.textContent = "Kategori tidak ditemukan";
        } else {
          resultMessage.textContent = "";
        }
      }

      searchInput.addEventListener("input", filterRows);

      filterRows();
    });
  </script>

  <script src="js/formodal1.js"></script>
  <script src="js/formodal2.js"></script>
  <script src="js/formodal.js"></script>
  <script src="js/dashboard.js"></script>

</body>

</html>