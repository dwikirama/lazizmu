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
      <title>DAFTAR BERITA</title>
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
         table {
            width: 100%;
            border-collapse: collapse;
         }

         th {
            text-align: center;
            padding: 8px;
            background-color: #f2f2f2;
            border: 1px solid #dddddd;
         }

         td {
            text-align: center;
            padding: 8px;
            border: 1px solid #dddddd;
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
      <?php require_once 'Sidebar_Admin.php'; ?>
      <!-- Page Content -->
         <div id="content" class="p-4 p-md-5 pt-5">
            <div class="container">
               <div class="row">
                  <h3>Daftar Berita</h3>
                  <div class="mt-3">
                  <a href="tambah_berita.php" class="btn btn-primary">
                     Tambah Berita
                  </a>
                  </div>
                     <div class="col-lg-12">
                        <div class="row">
                           <table class="table table-bordered">
                                 <tr>
                                    <center>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Tanggal & Waktu</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                    </center>
                                 </tr>
                                 <?php foreach($berita as $row): ?>
                                    <tr>
                                       <td><?= $row['id']; ?></td>
                                       <td><?= $row['judul']; ?></td>
                                       <td><?= $row['tanggal']; ?></td>
                                       <td>
                                            <img src='uploads/<?= $row['gambar']; ?>' width='100' height='100' alt='<?= $row['judul']; ?>'>
                                       </td>
                                       <td>
                                          <a href="view_berita.php?id=<?= $row['id']; ?>" class="btn btn-success">View</a> |
                                          <a href="edit_berita.php?id=<?= $row['id']; ?>" class="btn btn-primary">Edit</a> |
                                          <a href="delete_berita.php?id=<?= $row['id']; ?>" class="btn btn-danger">Delete</a>
                                       </td>
                                    </tr>
                                 <?php endforeach; ?>
                           </table>
                           <a href="berita.php" class="btn btn-primary">
                              Lihat Tampilan User
                           </a>
                        </div>
                     </div>
               </div>
            </div>
         </div>
      <!-- Modal Tambah Data -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Data Berita Baru</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <!-- Form untuk menambahkan berita baru -->
                  <form method="POST" action="proses_tambah.php" enctype="multipart/form-data" id="formTambahData">>
                     <!-- Isi formulir sesuai kebutuhan -->
                     <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" required>
                     </div>
                     <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <input type="file" class="form-control-file" id="gambar" name="gambar" required>
                     </div>
                     <div class="form-group">
                        <label for="isi_berita">Isi berita</label>
                        <textarea class="form-control" id="editorTambah" name="isi" rows="4" required></textarea>
                     </div>
                     <button type="submit" class="btn btn-primary">Simpan</button>
                     </script>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!-- Modal Ubah Data -->
      <div class="modal fade" id="exampleModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ubah Data Berita</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <form method="POST" action="proses_edit.php" enctype="multipart/form-data">
                     <div class="form-group">
                        <label for="edit_judul">Judul</label>
                        <input type="text" class="form-control" id="edit_judul" name="edit_judul" value="<?php echo htmlspecialchars($berita['judul']); ?>" required>
                     </div>
                     <div class="form-group">
                        <label for="edit_gambar">Gambar</label>
                        <input type="file" id="edit_gambar" name="edit_gambar">
                        <img src="/uploads" id="gambar_edit" width="100">
                     </div>
                     <div class="form-group">
                        <label for="edit_isi_berita">Isi Berita</label>
                        <textarea class="form-control" id="edit_isi_berita" name="edit_isi_berita" rows="4" required><?php echo htmlspecialchars($berita['edit_isi_berita']); ?></textarea>
                     </div>
                     <input type="hidden" name="id_berita" value="<?php echo $berita['id']; ?>">
                     <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
      
      <!-- Scripts -->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/main.js"></script>
      <!-- JavaScript untuk Edit Data -->
      <script>
         $('#exampleModalEdit').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id_berita = button.data('id');
            var judul = button.data('judul');
            var isi = button.data('isi');
            var gambar = button.data('gambar');
            var modal = $(this);
            modal.find('.modal-body #id_berita').val(id_berita);
            modal.find('.modal-body #edit_judul').val(judul);
            modal.find('.modal-body #edit_isi').val(isi);
            modal.find('.modal-body #gambar_edit').attr("src", 'uploads/' + gambar);
         });
      </script>
   </body>
</html>