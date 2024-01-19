<?php 
include 'config.php';
?>

<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!----==== CSS ====-->
    <link rel="stylesheet" href="login.css">
    
    <!----==== Icounscout Link ====-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    
     <title>Login Lazimu Lumajang</title>
</head>
<body>
    <div class="container">
        <h2>Masuk</h2>
        <form method="POST" action="">
        <div class="input-box">
            <input type="text" name="username"required>
            <label for="">Username</label>
        </div>
        <div class="input-box">
            <input type="password" id="password" spellcheck="false" name="password" required>
            <label for="password">Password</label>
            <i class="uil uil-eye-slash toggle" id="togglePassword"></i>
        </div>
        <div class="remember-forgot">
            <label><input type="checkbox" name="agree_terms">Saya menyetujui syarat & ketentuan</label>
        </div>
        <button type="submit" class="btn" name="submit">Masuk</button>
        <div class="login-register">
            <p>Tidak memiliki akun? <a href="register.php" class="register-link">Daftar Sekarang</a></p>
        </div>
        </form>
    </div>

    <?php 
        if(isset($_POST['submit'])) {
          $user = $_POST['username'];
          $password = $_POST['password'];

          // Query untuk memilih tabel
          $cek_data = mysqli_query($conn, "SELECT * FROM akun WHERE username = '$user' AND password = '".md5($password)."'");
          $hasil = mysqli_fetch_array($cek_data);
          $status = $hasil['status'];
          $login_user = $hasil['username'];
          $row = mysqli_num_rows($cek_data);

          // Pengecekan Kondisi Login Berhasil/Tidak
            if ($row == 1) {
                session_start();   
                $_SESSION['login_user'] = $login_user;

                if ($status == 'admin') {
                  header('location: index_admin.php');
                }elseif ($status == 'user') {
                  header('location: index_user.php'); 
                }
            }else{
                header("location: login.php");
            }
        }
       ?>

    <script>

        var password = document.getElementById('password');
        var toggler = document.getElementById('togglePassword');
        showHidePassword = () => {
        if (password.type == 'password') {
        password.setAttribute('type', 'text');
        toggler.classList.add('uil-eye');
        } else {
        toggler.classList.remove('uil-eye-slash');
        password.setAttribute('type', 'password');
        }
        };
        toggler.addEventListener('click', showHidePassword);

    </script>

</body>
</html>