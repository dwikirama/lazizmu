<!DOCTYPE html>
<!---Coding By CodingLab | www.codinglabweb.com--->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!--<title>Registration Form in HTML CSS</title>-->
    <!---Custom CSS File--->
    <link rel="stylesheet" href="register.css" />
    <title>Registration Lazimu Lumajang</title>
  </head>
  <body>
    <section class="container">
      <header>Registration Form</header>
      <form action="simpan_register.php" method="POST" class="form">
        <div class="input-box">
          <label>Username</label>
          <input type="text" placeholder="Enter Username" name="username" required />
        </div>

        <div class="input-box">
          <label>Full Name</label>
          <input type="text" placeholder="Enter full name" name="nama_lengkap" required />
        </div>

        <div class="input-box">
          <label>Email Address</label>
          <input type="text" placeholder="Enter email address" name="email" required />
        </div>

        <div class="column">
          <div class="input-box">
            <label>Password</label>
            <input type="password" placeholder="Enter Password" name="password"required />
          </div>
          <div class="input-box">
            <label>Confirm Password</label>
            <input type="password" placeholder="Enter Confirm Password" name="cpassword" required />
          </div>
        </div>
        <div class="input-box">
          <label>Status</label>
            <div class="select-box">
              <select name="status">
                <option hidden>Pilih Status</option>
                <option>Admin</option>
                <option>User</option>
              </select>
            </div>
        </div>

        <div class="remember-forgot">
            <label><input type="checkbox" name="agree_terms">Saya menyetujui syarat & ketentuan</label>
        </div>
        <button type="submit" class="btn" name="submit-daftar">Daftar</button>
        <div class="login-register">
            <p>Sudah memiliki akun? <a href="login.php" class="register-link">Masuk</a></p>
        </div>

      </form>
    </section>
  </body>
</html>