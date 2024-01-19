<?php
session_start();
include('config.php');

if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("SELECT * FROM berita WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo 'Berita tidak ditemukan.';
        exit();
    }

    $row = $result->fetch_assoc();
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
    <!-- Form untuk mengedit berita -->
    <form action="proses_edit.php" method="post" enctype="multipart/form-data">
      <h3>Form Edit Berita</h3>
        <label for="judul">Judul</label>
        <input type="text" name="judul" value="<?php echo htmlspecialchars($row['judul']); ?>">
        
        <label for="gambar">Gambar</label>
        <input type="file" name="gambar">

        <!-- Tampilkan gambar yang sedang diedit -->
        <img src="uploads/<?php echo htmlspecialchars($row['gambar']); ?>" width="200" height="auto" alt="Gambar Berita">
        
        <label for="isi">Isi</label> 
        <textarea name="isi"><?php echo htmlspecialchars($row['isi']); ?></textarea>
        
        <!-- Sembunyikan id_berita dalam input type hidden -->
        <input type="hidden" name="id_berita" value="<?php echo $row['id']; ?>">
        
        <button type="submit" name="submit">Simpan Perubahan</button>
    </form>

    <!-- Your script tags and JavaScript for client-side validation here -->
    <script>
        document.querySelector('form').addEventListener('submit', function (event) {
            const judul = document.querySelector('input[name="judul"]').value;
            const isi = document.querySelector('textarea[name="isi"]').value;

            if (judul.trim() === '' || isi.trim() === '') {
                event.preventDefault();
                alert('Judul dan Isi tidak boleh kosong.');
            }
        });
    </script>

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
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        $judul = $_POST['judul'];
        $isi = $_POST['isi'];
        $id_berita = $_POST['id_berita'];

        // Validate and sanitize inputs
        $judul = htmlspecialchars(trim($judul));
        $isi = htmlspecialchars(trim($isi));

        // File upload handling
        if (!empty($_FILES['gambar']['name'])) {
            // Handle file upload here (similar to your previous code)
            // Validate file type and move uploaded file to a secure location
            $gambar = $_FILES['gambar']['name'];
            // Move uploaded file
            move_uploaded_file($_FILES['gambar']['tmp_name'], 'uploads/' . $gambar);
        } else {
            // Jika tidak ada file baru, gunakan file yang sudah ada di database
            $gambar = $row['gambar'];
        }

        // Update query 
        $stmt = $conn->prepare("UPDATE berita SET judul=?, isi=?, gambar=? WHERE id=?");
        // Assuming $gambar is the name of the uploaded file, adjust as per your implementation

        $stmt->bind_param("sssi", $judul, $isi, $gambar, $id_berita);

        if ($stmt->execute()) {
            header("Location: daftar_berita.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    }
    ?>
    <!-- Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>

<?php
} else {
    echo 'ID berita tidak ditemukan.';
}
?>
