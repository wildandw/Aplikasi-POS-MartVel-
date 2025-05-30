<!DOCTYPE html>
<html>

<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="css/login.css" />
  <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/a81368914c.js"></script>
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link rel="icon" type="image/x-icon" href="img/icon.png" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>

<body>
  <div class="container">
    <div class="login-content">
      <!-- form yg mengambil aksi dari veriflogin.php dengan method post -->
      <form action="veriflogin.php" method="post">
        <h2 class="title">Login</h2>
        <div class="input-div one">
          <div class="i">
            <i class="fas fa-user"></i>
          </div>
          <div class="div">
            <!-- jika kosong tampil keterangan harus diisi dan function js tersebut tersimpan di file js/main.js -->
            <h5>Username</h5>
            <input type="text" class="input" required oninvalid="this.setCustomValidity('Please enter your username.')" oninput="this.setCustomValidity('')" name="username" />
          </div>
        </div>
        <div class="input-div pass">
          <div class="i">
            <i class="fas fa-lock"></i>
          </div>
          <div class="div">
            <!-- jika kosong tampil keterangan harus diisi dan function js tersebut tersimpan di file js/main.js -->
            <h5>Password</h5>
            <input type="password" class="input" required oninvalid="this.setCustomValidity('Please enter your password.')" oninput="this.setCustomValidity('')" name="password" />
          </div>
        </div>
        <input type="submit" class="btn" value="Login" />
      </form>
    </div>
    <div class="logo">
      <i class="bx bxs-shopping-bags"></i>
      <div class="logo-name">Martvel</div>
    </div>
  </div>
  <script type="text/javascript" src="js/main.js"></script>
</body>

</html>