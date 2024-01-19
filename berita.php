<?php
    session_start();
    
   // Sisipkan file koneksi ke database setelah pengecekan sesi login
    include('config.php');
    
   // Memeriksa apakah pengguna telah login, jika belum, maka arahkan ke halaman login.php
    if (!isset($_SESSION['login_user'])) {
        header("location: login.php");
        exit(); // Pastikan untuk menghentikan eksekusi skrip setelah melakukan redirect
    } else 
        // Fetch the data from your database table 'berita'
   $result = $conn->query("SELECT * FROM berita");

   // Check if data is retrieved successfully
   if ($result && $result->num_rows > 0) {
      // Initialize an empty array to store the fetched data
      $berita = [];

      // Fetch each row and store it in the $berita array
      while ($row = $result->fetch_assoc()) {
         $berita[] = $row;
      }
   } else {
      // If no data is found, set $berita as an empty array or handle the case accordingly
      $berita = [];
   }
?>
<!DOCTYPE html>
<html>
   <head>
      <title>BERITA</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <script src="https://kit.fontawesome.com/413d50620c.js" crossorigin="anonymous"></script>
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
         .mt-3 {
         margin-top: 10px;
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
         <h1><a href="index.php" class="logo">
            <img src="https://lazismulumajang.org/wp-content/uploads/2021/07/lembaga-amil-zakat-infaq-infak-dan-sedekah-sadaqah-muhammadiyah-lumajang-logo-header4.png" alt="LUMAJANG"></a>
         </h1>
      </div>
      <div class="wrapper d-flex align-items-stretch">
      <?php require_once 'Sidebar_User.php'; ?>
      
        <!-- Begin Page Content -->
        <div class="container-fluid">
            
            <!-- Berita Terbaru -->
            <h1 class="h3 mb-4 text-gray-800">Berita Terbaru</h1>
        
            <div class="row">
                <?php
                // Ambil data berita dari database
                // Lakukan koneksi ke database dan query untuk mengambil data berita
                // Gantilah koneksi dan query sesuai dengan konfigurasi database Anda
        
                // Contoh pengambilan data berita (Anda perlu menggantinya dengan query yang sesuai)
                $query = "SELECT * FROM berita ORDER BY id DESC LIMIT 6"; // Misalnya, ambil 6 berita terbaru
                $result = $conn->query($query);
        
                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                            <div class="col-lg-4 mb-4">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary"><?= $row['judul'] ?></h6>
                                    </div>
                                    <div class="card-body">
                                        <img class="img-fluid mb-3" src="uploads/<?= $row['gambar'] ?>" alt="Gambar Berita">
                                        <?php
                                        // Mendapatkan deskripsi dari database
                                        $deskripsi = $row['isi'];

                                        // Memotong deskripsi menjadi 100 kata
                                        $deskripsi_potong = implode(' ', array_slice(explode(' ', $deskripsi), 0, 30));

                                        // Menampilkan deskripsi potongan
                                        echo '<p>' . $deskripsi_potong . '...</p>';
                                        ?>
                                        <!-- Tautan "Lihat Berita" menuju halaman detail berita -->
                                        <a href="view_berita.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-icon-split">
                                            <span class="icon text-white-50">
                                            <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                                            </span>
                                            <span class="text">Baca Selengkapnya >></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php
                    }
                } else {
                    echo "Tidak ada berita yang tersedia.";
                }
                ?>
            </div>
        
        </div>
        <!-- /.container-fluid -->
</div>
<!-- End of Content Wrapper -->
    <!-- Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>