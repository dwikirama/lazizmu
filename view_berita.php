<?php
    session_start();
    
    // Sisipkan file koneksi ke database setelah pengecekan sesi login
    include('config.php');
    
    // Memeriksa apakah pengguna telah login, jika belum, maka arahkan ke halaman login.php
    if (!isset($_SESSION['login_user'])) {
        header("location: login.php");
        exit(); // Pastikan untuk menghentikan eksekusi skrip setelah melakukan redirect
    } else {
        // Melakukan query untuk mendapatkan data dari tabel berita
        $query = "SELECT id, judul, gambar, isi FROM berita";
        $result = mysqli_query($conn, $query);
    
        // Periksa apakah query memiliki hasil atau mengalami kesalahan
        if (!$result) {
            die("Query error: " . mysqli_error($conn)); // Tampilkan pesan kesalahan query
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
      <title>VIEW BERITA</title>
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
        /* Misalnya, atur tampilan konten berita */
        .news-container {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .news-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .news-image {
            max-width: 100%;
            height: auto;
            margin-bottom: 15px;
        }
        .news-content {
            font-size: 16px;
            line-height: 1.6;
        }
        .btn-back {
         display: inline-block;
         padding: 10px 20px;
         font-size: 16px;
         text-decoration: none;
         background-color: #3498db;
         color: #ffffff;
         border-radius: 5px;
         border: none;
         transition: background-color 0.3s ease;
         }
         .btn-back:hover {
         background-color: #2980b9;
         }
      </style>
   </head>
   <body id="page-top">
      <div class="menu-top">
         <div class="custom-menu">
            <button type="button" id="sidebarCollapse" class="btn btn-primary">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle Menu</span>
            </button>
         </div>
         <h1><a href="index.php" class="logo">
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
                  <a href="beranda.php">Beranda</a>
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
</head>
<body>

    <!-- Bagian konten untuk menampilkan detail berita -->
    <div class="news-container">
        <?php
            // Misalnya, ambil data berita dari variabel atau database
            $id_berita = $_GET['id']; // Ambil ID berita dari URL
            
            // Query untuk mengambil detail berita dengan ID tertentu dari database
            $query = "SELECT * FROM berita WHERE id = $id_berita";
            $result = $conn->query($query);

            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
        ?>
               <div class="news-title" style="text-align: center;"><?php echo $row['judul']; ?></div>
               <div class="news-image" style="text-align: center;">
                     <img src="uploads/<?php echo $row['gambar']; ?>" alt="Gambar Berita">
               </div>
               <div class="news-content"><?php echo $row['isi']; ?></div>
        <?php
            } else {
                echo "Berita tidak ditemukan.";
            }
        ?>
      <button onclick="goBack()" class="btn-back">Kembali</button>
    </div>
    <a href="daftar_berita.php">
      <script>
         function goBack() {
         window.history.back();
         }
      </script>
    <!-- Scroll to Top Button-->
    

    <!-- Script tambahan jika diperlukan -->
   <!-- Scripts -->
   <script src="js/jquery.min.js"></script>
   <script src="js/popper.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/main.js"></script>

</body>
</html>
