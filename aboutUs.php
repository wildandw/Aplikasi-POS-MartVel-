<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="css/dashboard.css" />
  <link rel="icon" type="image/x-icon" href="img/icon.png" />
  <title>About Me</title>
</head>

<body>
  <!-- Mengambil tampilan sidebar dari sidebar.php -->
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
      <div class="header">
        <div class="left">
          <h1>About Us</h1>
        </div>
      </div>
      <!-- Carousel profil setiap anggota -->
      <div class="carousel">
        <div class="slider__warpper">
          <div class="flex__container flex--pikachu flex--active" data-slide="1">
            <div class="flex__item flex__item--left">
              <div class="flex__content">
                <p class="text--sub">-Berbuat Baik Sebar Kebahagiaan-</p>
                <h1 class="text--big">Aziyusman</h1>
                <p class="text--normal">
                  Nama saya Aziyusman Maulana, seorang mahasiswa yang sedang
                  menempuh pendidikan di Universitas Komputer Indonesia
                  Program Studi Teknik Informatika angkatan 2022. Saya
                  tertarik dengan pemrograman dan desain grafis. Dengan
                  pengetahuan dan keterampilan tersebut, semoga dapat
                  memberikan dampak positif pada karier masa depan saya.
                </p>
              </div>
              <p class="text__background">Aziyusman</p>
            </div>
            <div class="flex__item flex__item--right"></div>
            <img class="pokemon__img" src="img/azi.png" />
          </div>
          <div class="flex__container flex--piplup animate--start" data-slide="2">
            <div class="flex__item flex__item--left">
              <div class="flex__content">
                <p class="text--sub">-Perlahan Tapi Pasti-</p>
                <h1 class="text--big">Wildan</h1>
                <p class="text--normal">
                  Nama saya Wildan Dwi Wijaksana, seorang mahasiswa yang
                  sedang menempuh pendidikan di Universitas Komputer Indonesia
                  Program Studi Teknik Informatika angkatan 2022. Saya
                  tertarik dengan teknologi khususnya pemrograman, sekarang
                  saya juga mulai tertarik untuk explore mengenai data. Selain
                  itu saya juga mempunyai hobi bermain sepak bola.
                </p>
              </div>
              <p class="text__background">Wildan</p>
            </div>
            <div class="flex__item flex__item--right"></div>
            <img class="pokemon__img" src="img/wildan.png" />
          </div>
          <div class="flex__container flex--blaziken animate--start" data-slide="3">
            <div class="flex__item flex__item--left">
              <div class="flex__content">
                <p class="text--sub">-Menyerah Bukanlah Pilihan-</p>
                <h1 class="text--big">Atam</h1>
                <p class="text--normal">
                  Nama saya Atam Kartam, seorang mahasiswa yang sedang
                  menempuh pendidikan di Universitas Komputer Indonesia
                  Program Studi Teknik Informatika angkatan 2022. Selain
                  menjadi mahasiswa, saya juga akhir akhir ini memiliki hobi
                  membuat konten di platform YouTube dan TikTok.
                </p>
              </div>
              <p class="text__background">Atam</p>
            </div>
            <div class="flex__item flex__item--right"></div>
            <img class="pokemon__img" src="img/atam.png" />
          </div>
        </div>

        <div class="slider__navi">
          <a href="#" class="slide-nav active" data-slide="1">Azi</a>
          <a href="#" class="slide-nav" data-slide="2">Wildan</a>
          <a href="#" class="slide-nav" data-slide="3">Atam</a>
        </div>
      </div>
      <!--  -->
    </main>
    <!-- Modal untuk tampilan profil -->
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

  <script>
    // fungsi untuk slide setiap halaman profil anggota
    $(".slide-nav").on("click", function(e) {
      e.preventDefault();
      var current = $(".flex--active").data("slide"),
        next = $(this).data("slide");

      $(".slide-nav").removeClass("active");
      $(this).addClass("active");

      if (current === next) {
        return false;
      } else {
        $(".slider__warpper")
          .find(".flex__container[data-slide=" + next + "]")
          .addClass("flex--preStart");
        $(".flex--active").addClass("animate--end");
        setTimeout(function() {
          $(".flex--preStart")
            .removeClass("animate--start flex--preStart")
            .addClass("flex--active");
          $(".animate--end")
            .addClass("animate--start")
            .removeClass("animate--end flex--active");
        }, 800);
      }
    });

    // fungsi next otomatis setiap 3000 atau 3detik
    function autoClickNav() {
      const slideNavs = document.querySelectorAll(".slider__navi a");
      let currentIndex = 0;

      function nextSlide() {
        currentIndex = (currentIndex + 1) % slideNavs.length;
        slideNavs[currentIndex].click();
      }

      setInterval(nextSlide, 3000);
    }

    autoClickNav();
  </script>
  <script src="js/about.js"></script>
  <script src="js/formodal.js"></script>
  <script src="js/dashboard.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>