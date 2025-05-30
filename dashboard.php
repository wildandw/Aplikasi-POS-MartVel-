<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/dashboard.css" />
  <link rel="icon" type="image/x-icon" href="img/icon.png" />
  <title>Dashboard</title>
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

    <!-- Profile -->
    <main>
      <div class="header">
        <div class="left">
          <h1>Beranda</h1>
          <div class="company-info">
            <img src="img/dashboard.png" alt="Ourmart" class="ourmart-logo" />
            <p>
              <span>Martvel</span> adalah sebuah Platform belanja berbasis web
              Terpercaya! Kami hadir dengan pengalaman belanja yang mudah,
              aman, dan menyenangkan untuk makanan, minuman, kesehatan, elektronik, dan
              perawatan Anda. Dengan komitmen untuk memberikan
              layanan terbaik, kami menjadi mitra terpercaya dalam memenuhi
              kebutuhan harian Anda, menyediakan produk berkualitas dari
              berbagai kategori dalam satu platform praktis. Kami mengutamakan
              kualitas dengan bekerja sama dengan produsen dan distributor
              terpercaya, serta selalu menjaga kebersihan dan kesegaran produk
              kami. Nikmati kemudahan belanja, harga kompetitif, dan layanan
              pelanggan yang responsif bersama kami.
            </p>
          </div>
        </div>
      </div>
    </main>
    <!--  -->

    <!-- Modal -->
    <div class="modal" id="modal">
      <div class="modal-content scale-up">
        <div class="modal-header">
          <h5 class="modal-title">Profile</h5>
        </div>
        <div class="modal-body">
          <!-- informasi profil -->
          <img src="img/profile.jpg" alt="Profile Photo" />
          <h4>Admin</h4>
        </div>
        <div class="modal-footer">
          <!-- berpindah halaman ke halaman about -->
          <a href="aboutUs.php">
            <button type="button" class="btn btn-secondary" id="btn-about">
              <i class="bx bx-user-circle"></i>About Us
            </button></a>
          <!-- berpindah halaman ke halaman login -->
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