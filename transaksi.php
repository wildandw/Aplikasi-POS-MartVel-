<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/dashboard.css" />
  <link rel="icon" type="image/x-icon" href="img/icon.png" />
  <title>Transaksi</title>
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
          <h1>Transaksi</h1>
          <ul class="breadcrumb">
            <li><a href="dashboard.php">Beranda </a></li>
            /
            <li><a href="transaksi.php" class="active">Transaksi</a></li>
          </ul>
        </div>
      </div>

      <!-- menyisipkan atau mengambil data dari koneksi.php -->
      <?php include 'koneksi.php'; ?>
      <?php $barang = mysqli_query($conn, "SELECT * FROM produk"); // mengambil data dari tabel produk
      $jsArray = "var harga = new Array();"; //array harga untuk ditampilkan bersamaan dengan dipilihnya produk
      // array namaproduk digunakan untuk ditampilan dan dipilih untuk dimasukan ke keranjang
      $jsArray1 = "var namaproduk = new Array();";  ?>

      <form method="post">
        <div class="form-group">
          <div class="form-row">
            <label for="nama-pembeli">Nama Produk:</label>
            <!-- menggunakan function changeValue untuk menampilkan harga ketika namaproduk dipilih dari array yang sudah dibuat -->
            <input type="text" id="namaproduk" name="namaproduk" list="datalist1" onchange="changeValue(this.value)" aria-describedby="basic-addon2" required>
            <datalist id="datalist1">
              <?php if (mysqli_num_rows($barang)) { ?>
                <?php while ($row_brg = mysqli_fetch_array($barang)) { ?>
                  <option value="<?php echo $row_brg["namaproduk"] ?>"> <?php echo $row_brg["namaproduk"] ?>
                  <?php $jsArray .= "harga['" . $row_brg['namaproduk'] . "'] = {harga:'" . addslashes($row_brg['harga']) . "'};";
                  $jsArray1 .= "namaproduk['" . $row_brg['namaproduk'] . "'] = {namaproduk:'" . addslashes($row_brg['namaproduk']) . "'};";
                } ?>
                <?php } ?>
            </datalist>
          </div>
          <div class="form-row">
            <label for="harga">Harga:</label>
            <!-- tampilkan value harga -->
            <!-- function total digunakan untuk menambahkan harga dan jumlah yg diinput ditampilkan secara otomatis -->
            <input type="number" class="form-control" id="harga" onchange="total()" value="<?php echo $row['harga']; ?>" name="harga" readonly>
          </div>
          <div class="form-row">
            <label for="jumlah">Jumlah:</label>
            <input type="number" class="form-control" id="jumlah" onchange="total()" name="jumlah" required>
          </div>
          <div class="form-row">
            <label for="subtotal">Subtotal:</label>
            <input type="number" class="form-control" name="sub_total" id="sub_total" onchange="total()" />
          </div>
          <div class="form-row">
            <button class="add-product-btn" name="save" value="simpan" type="submit" type="button">Tambah Keranjang</button>
          </div>
        </div>
      </form>
      <!-- jika name save sudah disimpan  post data berikut untuk dimasukkan ke keranjang -->
      <?php
      if (isset($_POST['save'])) {
        $namaproduk = $_POST['namaproduk'];
        $harga = $_POST['harga'];
        $jumlah = $_POST['jumlah'];
        $sub_total = $_POST['sub_total'];


        $sql = "INSERT INTO keranjang (namaproduk, harga, jumlah, sub_total)
                 VALUES('$namaproduk','$harga','$jumlah','$sub_total')";
        $query = mysqli_query($conn, $sql);

        if ($query) {
          echo '<script>window.location=""</script>';
        } else {
          echo "Error :" . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
      } ?>

      <!-- Kelompok 2 -->
      <div class="product-table-container">
        <h1>Keranjang</h1>
        <table class="product-table">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Produk</th>
              <th>Jumlah</th>
              <th>Harga</th>
              <th>Subtotal</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody id="produkkeranjang">
            <!-- Isi tabel produk  -->
            <tr>
              <?php
              require("koneksi.php");
              $sql = "select * from keranjang"; // mengambil data dari tabel keranjang
              $hasil = mysqli_query($conn, $sql);
              $row = mysqli_fetch_row($hasil);

              $n = 1;
              do {
                list($namaproduk, $harga, $jumlah, $sub_total) = $row;
                echo "<tr>
                    <td>$n</td>
                    <td>$namaproduk</td>
                    <td>$harga</td>
                    <td>$jumlah</td>
                    <td>$sub_total</td>
                    <td>
                    
                <button class='delete-btn'><a href='hapuskeranjang.php?namaproduk=$namaproduk' onclick=\"return confirm('Anda Yakin mau menghapus data ini?')\"><i class='bx bx-trash'></i></button>
              </td>
              </tr>
          </tbody>";
                $n++;
              } while ($row = mysqli_fetch_row($hasil));
              ?>
        </table>
      </div>

      <?php
      $query = mysqli_query($conn, "SELECT * FROM keranjang");
      $total = 0;
      $tot_bayar = 0;
      $no = 1;
      while ($r = $query->fetch_assoc()) {
        $total = $r['harga'] * $r['jumlah'];
        $tot_bayar += $total;
      }
      error_reporting(0);
      ?>

      <!-- bawah -->
      <form action="tambahlaporan.php" method="post">
        <?php
        $data_barang = mysqli_query($conn, "SELECT * FROM keranjang"); //mengambil data dari tabel keranjang
        while ($d = mysqli_fetch_array($data_barang)) {
        ?>
          <!-- tampilkan array dari keranjang yang sudah disimpan ke dalam variabel data_barang -->
          <!-- kemudian tampilkan per bagian dari data tabel -->
          <input type="hidden" class="form-control" name="namaproduk[]" id="namaproduk" value="<?php echo $d['namaproduk']; ?>">
          <input type="hidden" class="form-control" name="jumlah[]" id="jumlah" value="<?php echo $d['jumlah']; ?>">
          <input type="hidden" class="form-control" name="harga[]" id="harga" value="<?php echo $d['harga']; ?>">
          <input type="hidden" class="form-control" name="sub_total[]" id="sub_total" value="<?php echo $d['sub_total']; ?>">
        <?php } ?>
        <div class="form-group">
          <div class="form-row">
            <label for="idtransaksi">ID Transaksi:</label>
            <!-- membuat id transaksi otomatis seperti membuat kodeproduk otomatis di tambah data -->
            <?php
            require("koneksi.php");
            $query = mysqli_query($conn, "SELECT max(id_transaksi) as kodeTerbesar FROM laporan");
            $data = mysqli_fetch_array($query);
            $kodebarang = $data['kodeTerbesar'];
            $urutan = (int) substr($kodebarang, 4);
            $urutan++;
            $id_transaksi = "TRX" . sprintf("%03s", $urutan); ?>
            <input type="text" class="form-control" id="id_transaksi" name="id_transaksi" value="<?php echo $id_transaksi; ?>" readonly>
          </div>
          <div class="form-row">
            <label for="total">Total:</label>
            <input type="text" value="<?php echo $tot_bayar; ?>" id="total" name="total" readonly>
          </div>

          <div class="form-row">
            <label for="bayar">Tunai:</label>
            <input type="number" class="form-control form-control-sm" name="bayar" id="bayar" onchange="totalnya()">
          </div>
          <div class="form-row">
            <label for="kembalian">Kembalian:</label>
            <input type="number" class="form-control form-control-sm" name="kembalian" id="kembalian" readonly>
          </div>
          <input type="hidden" class="form-control form-control-sm" name="tgl" id="tgl" value="<?php echo date("d F Y"); ?>" readonly>
          <div class="form-actions">
            <a href='resetkeranjang.php'>
              <button type="button" class="cancel-btn">
                <i class="bx bx-message-alt-x"></i>Reset
              </button>
            </a>
            <button type="submit" class="pay-btn">
              <i class="bx bx-paper-plane"></i>Bayar
            </button>
          </div>
        </div>
      </form>
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
          <h4>Aziyusman Maulana</h4>
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
  <script src="js/formodal.js"></script>
  <script src="js/dashboard.js"></script>
  <script>
    <?php echo $jsArray; ?>
    <?php echo $jsArray1; ?>

    // function digunakan untuk menampilkan harga dan produk otomatis
    // ketika namaproduk dipilih otomatis harga keluar
    function changeValue(namaproduk) {
      document.getElementById("namaproduk").value = namaproduk;
      document.getElementById("harga").value = harga[namaproduk].harga;
    };

    // function digunakan untuk menghitung harga dan jumlah item yg dipilih dan disimpan di subtotal
    function total() {
      var harga = parseInt(document.getElementById('harga').value);
      var jumlahbeli = parseInt(document.getElementById('jumlah').value);
      var jumlah = harga * jumlahbeli;
      document.getElementById('sub_total').value = jumlah;
    }

    // function digunakan untuk menampilkan pertambahan dari setiap subtotal
    function totalnya() {
      var harga = parseInt(document.getElementById('total').value);
      var pembayaran = parseInt(document.getElementById('bayar').value);
      var kembali = pembayaran - harga;
      document.getElementById('kembalian').value = kembali;
    }
  </script>
</body>

</html>