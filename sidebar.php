<!-- Sidebar -->
<div class="sidebar">
    <a href="dashboard.php" class="logo">
        <i class="bx bxs-shopping-bags"></i>
        <div class="logo-name"><span>Mart</span>vel</div>
    </a>
    <!-- ketika salah satu dari alamat sidebar di klik berpindah halaman dan setiap bagiannya memunculkan class aktif yang dimana ketika dipilih akan muncul kelihatan berbeda dengan alamat sidebar lainnya -->
    <ul class="side-menu">
        <li <?php if (basename($_SERVER['PHP_SELF']) == 'dashboard.php') echo 'class="active"'; ?>>
            <a href="dashboard.php"><i class="bx bx-home-smile"></i>Beranda</a>
        </li>
        <li <?php if (basename($_SERVER['PHP_SELF']) == 'produk.php') echo 'class="active"'; ?>>
            <a href="produk.php"><i class="bx bx-package"></i>Produk</a>
        </li>
        <li <?php if (basename($_SERVER['PHP_SELF']) == 'transaksi.php') echo 'class="active"'; ?>>
            <a href="transaksi.php"><i class="bx bx-credit-card"></i>Transaksi</a>
        </li>
        <li <?php if (basename($_SERVER['PHP_SELF']) == 'laporan.php') echo 'class="active"'; ?>>
            <a href="laporan.php"><i class='bx bx-file-blank'></i>Laporan</a>
        </li>
        <li <?php if (basename($_SERVER['PHP_SELF']) == 'login.php') echo 'class="active"'; ?>>
            <a href="login.php" class="logout"><i class="bx bx-log-out-circle"></i>Logout</a>
        </li>
    </ul>
</div>
<!-- End of Sidebar -->