<?php
    session_start();
    
    // Sisipkan file koneksi ke database setelah pengecekan sesi login
    include('config.php');
    
    // Memeriksa apakah pengguna telah login, jika belum, maka arahkan ke halaman login.php
    if (!isset($_SESSION['login_user'])) {
        header("location: login.php");
        exit(); // Pastikan untuk menghentikan eksekusi skrip setelah melakukan redirect
    } else 
        // Lakukan pengecekan apakah form telah disubmit
    if(isset($_POST['submit'])) {
      // Tangani upload gambar disini
      $judul = $_POST['judul'];
      $isi = $_POST['isi'];
      $status = $_POST['status'];
      $gambar = $_FILES['gambar']['name']; // Ambil nama gambar yang diupload

      // Lakukan validasi form di sini
      if(empty($judul) || empty($isi) || empty($gambar)) {
          echo "Judul, Isi, dan Gambar tidak boleh kosong.";
      } else {
          // Jika semua field diisi, proses insert ke database
          $stmt = $conn->prepare("INSERT INTO tabel_berita (judul, isi, status, gambar) VALUES (?, ?, ?, ?)");
          $stmt->bind_param("ssss", $judul, $isi, $status, $gambar);
          
          // Lakukan proses upload gambar di sini
          $target_dir = "uploads/"; // Direktori untuk menyimpan gambar
          $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
          $uploadOk = 1;
          $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

          // Check jika file gambar sudah ada
          if (file_exists($target_file)) {
              echo "Maaf, file gambar sudah ada.";
              $uploadOk = 0;
          }

          // Check ukuran file gambar
          if ($_FILES["gambar"]["size"] > 500000) {
              echo "Maaf, ukuran file gambar terlalu besar.";
              $uploadOk = 0;
          }

          // Izinkan hanya format gambar tertentu
          if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
              echo "Maaf, hanya format JPG, JPEG, dan PNG yang diizinkan.";
              $uploadOk = 0;
          }

          // Lakukan upload gambar jika semua kondisi terpenuhi
          if ($uploadOk == 0) {
              echo "Maaf, gambar tidak diupload.";
          } else {
              if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
                  // Lakukan query ke database jika upload gambar berhasil
                  if ($stmt->execute()) {
                      echo "Data berhasil ditambahkan.";
                  } else {
                      echo "Error: " . $conn->error;
                  }
              } else {
                  echo "Maaf, terjadi kesalahan saat upload gambar.";
              }
          }
      }
  }
?>
<!DOCTYPE html>
<html>
   <head>
      <title>Sidebar 02</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <script src="https://kit.fontawesome.com/413d50620c.js" crossorigin="anonymous"></script>
      <script src="https://cdn.tiny.cloud/1/aushucn97y8qz0o3f38f0fboeilurtsofdnyaqdfzbv4t9rf/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
      <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="css/style.css">
      <style>
        body {
         font-family: 'Poppins', sans-serif;
         overflow-x: hidden;
         margin: 0;
         padding: 0;
         }
        .banner-container {
         overflow: hidden;
         }
        .banner {
         width: auto;
         height: auto;
         display:block;
         }
        .white-space {
         height: 65px;
         width: auto;
         background-color: #ffffff;
         }
        .navbar {
         background-color: #150327;
         padding: 15px;
         box-shadow: 0 4px 6px #ffffff;
         display: flex;
         justify-content: space-between;
         align-items: center;
         position: relative;
         z-index: 1;
         }
        .navbar-buttons {
         margin-left: auto;
         }
        .navbar-buttons button,
        .navbar-buttons a {
         margin-left: 10px;
         background-color: #150327;
         border-radius: 2cm;
         border-style: double;
         border-color: bisque;
         }
        .menu-top {
         background-image: url(./images/LAZISMU\ BAWAH.png);
         background-color: rgba(250, 255, 221, 0.797);
         background-size: auto;
         background-repeat: no-repeat;
         background-position: center;
         padding: 15px;
         display: flex;
         justify-content: space-between;
         align-items: center;
         position: relative;
         z-index: 2;
         color: #ffffff;
         }
        .menu-top a {
         color: #ffffff;
         text-decoration: none;
         margin: auto;
         }
        #sidebarCollapse {
         margin-right: 18px;
         }
        #content {
         width: 100%;
         padding: 15px;
         background: linear-gradient(to right, rgba(250, 255, 221, 0.797), #fecfef);
         }
        .logo img {
         width: 100px;
         height: auto;
         margin-right: 10px;
         }
        p {
         color: black;
         }
         * {
         font-family: "Trebuchet MS";
         }
        h1 {
         text-transform: uppercase;
         color: salmon;
         }
        button {
         background-color: salmon;
         color: #fff;
         padding: 10px;
         text-decoration: none;
         font-size: 12px;
         border: 0px;
         margin-top: 20px;
         }
        label {
         margin-top: 10px;
         float: left;
         text-align: left;
         width: 100%;
         }
        input[type="text"],
        input[type="file"],
        textarea {
         padding: 6px;
         width: 100%;
         box-sizing: border-box;
         background: #f8f8f8;
         border: 2px solid #ccc;
         outline-color: salmon;
         }
        div {
         width: 100%;
         height: auto;
         }
        .base {
         width: 400px;
         height: auto;
         padding: 20px;
         margin: 0 auto;
         background: #ededed;
         }
         /* Style untuk form */
        form {
            margin: 20px auto;
            padding: 20px;
            background-color: #f8f8f8;
            border: 2px solid #ccc;
            border-radius: 5px;
            width: 80%;
            max-width: 600px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="file"],
        textarea {
            padding: 10px;
            margin-bottom: 15px;
            width: calc(100% - 22px);
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button[type="submit"] {
            background-color: salmon;
            color: #fff;
            padding: 12px 20px;
            text-decoration: none;
            font-size: 16px;
            border: 0px;
            border-radius: 5px;
            cursor: pointer;
            display: block;
            width: 100%;
        }
      </style>
   </head>
   <body>
      <div class="menu-top">
         <div class="custom-menu">
            <button type="button" id="sidebarCollapse" class="btn btn-primary">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle Menu</span>
            </button>
         </div>
         <h1><a href="index.html" class="logo">
            <img src="https://lazismulumajang.org/wp-content/uploads/2021/07/lembaga-amil-zakat-infaq-infak-dan-sedekah-sadaqah-muhammadiyah-lumajang-logo-header4.png" alt="LUMAJANG"></a>
         </h1>
      </div>
      <div class="wrapper d-flex align-items-stretch">
      <nav id="sidebar">
         <div class="custom-menu"></div>
         <div class="p-4 pt-5">
            <h1><a href="index.html" class="logo" style="font-size: xx-large;"><img src="" alt="">LAZISMU LUMAJANG</a></h1>
            <ul class="list-unstyled components mb-5">
               <li>
                  <a><i class="fa-solid fa-user" style="color: #ffffff; padding: 5px;"></i><?php echo  $_SESSION['login_user']; ?></a>
               </li>
               <li class="active">
                  <a href="beranda.html">Beranda</a>
                  <a href="#tentangkamiSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> Tentang Kami</a>
                  <ul class="collapse list-unstyled" id="tentangkamiSubmenu">
                     <li>
                        <a href="profil_lembaga.html">Profil Lembaga</a>
                     </li>
                     <li>
                        <a href="visi_misi.html">Visi & Misi</a>
                     </li>
                     <li>
                        <a href="struktur_manajemen.html">Struktur Manajemen</a>
                     </li>
                     <li>
                        <a href="penghargaan.html">Penghargaan</a>
                     </li>
                     <li>
                        <a href="kantor_layanan.html">Kantor Layanan</a>
                     </li>
                  </ul>
               </li>
               <li>
                  <a href="program.html">Program</a>
               </li>
               <li>
                  <a href="#layananSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Layanan</a>
                  <ul class="collapse list-unstyled" id="layananSubmenu">
                     <li>
                        <a href="#">AmbulansMU</a>
                     </li>
                     <li>
                        <a href="Tampilan_Data_JD.php">Jemput Donasi</a>
                     </li>
                     <li>
                        <a href="Tampilan_Data_KO.php">Konsultasi Online</a>
                     </li>
                     <li>
                        <a href="qrkodedonasi.html">QR Code Donasi</a>
                     </li>
                  </ul>
               </li>
               <li>
                  <a href="daftar_berita.php">Berita</a>
               </li>
               </li>
               <li>
                  <a href="lihatdatakontak.php">Contact</a>
               </li>
               <li>
                  <a href="logout.php">Logout</a>
               </li>
            </ul>
            <div class="mb-5">
               <div class="social_media">
                  <a href="https://www.facebook.com/lazismulumajangorg"><i class="fab fa-facebook-f"></i></a>
                  <a href="https://twitter.com/LAZISMU"><i class="fab fa-twitter"></i></a>
                  <a href="https://www.instagram.com/lazismulumajang"><i class="fab fa-instagram"></i></a>
               </div>
            </div>
            <div class="footer">
               <p>
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
               </p>
            </div>
         </div>
      </nav>
    <!-- Page Content -->
      <form action="proses_tambah.php" method="post" enctype="multipart/form-data">
      <h3 center>Form Tambah Berita</h3>
         <label for="judul">Judul</label>
         <input type="text" name="judul">
         <label for="gambar">Gambar</label>
         <input type="file" name="gambar">
         <label for="isi">Isi</label> 
         <textarea name="isi"></textarea>
         <button type="submit" name="submit">Simpan</button>
      </form>
  <script>
  tinymce.init({
   selector: 'textarea',
    plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
    menubar: 'file edit view insert format tools table help',
    toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen preview save print | insertfile image media template link anchor codesample | ltr rtl',
    autosave_restore_when_empty: false,  
    autosave_retention: "30m"
  });  
  </script>

    <!-- Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>