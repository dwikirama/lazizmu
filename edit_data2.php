<?php
// Fungsi untuk mendapatkan link Lihat Struktur Manajemen berdasarkan jenis
if (!function_exists('getLinkLihatPenghargaan')) {
    function getLinkLihatPenghargaan($jenis) {
        switch ($jenis) {
            Default:
                return 'lihatdatapenghargaan.php';
        }
    }
}

session_start();
if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
    exit(); // Pastikan untuk keluar setelah redirect
}

require('config.php');

// Mendapatkan parameter "jenis" dari URL
$jenis = isset($_GET['jenis']) ? $_GET['jenis'] : '';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Pilih tabel berdasarkan jenis
    $table = '';
    switch ($jenis) {
        Default:
            $table = 'penghargaan';
    }

    // Ambil data penghargaan berdasarkan ID
    $perintah = "SELECT * FROM penghargaan WHERE id = '$id'";
    $result = $conn->query($perintah);
    $data = $result->fetch_assoc();
} else {
    // Redirect ke halaman edit data
    switch ($jenis) {
        Default:
            header("location: lihatdatapenghargaan.php");
            exit();
    }
}

// Proses ubah data
if (isset($_POST['ubah'])) {
    $id = $_POST['id'];
    $deskripsi = $_POST['deskripsi'];

    // Periksa apakah foto baru diunggah
    if (!empty($_FILES['ubah_foto']['name'])) {
        $file = $_FILES['ubah_foto']['name'];
        $tmp_dir = $_FILES['ubah_foto']['tmp_name'];
        $ukuran = $_FILES['ubah_foto']['size'];
        $direktori = 'images/';
        $ekstensi = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        $valid_ekstensi = array('jpeg', 'jpg', 'png', 'gif'); // Ekstensi yang diizinkan
        $gambar = rand(1000, 1000000) . "." . $ekstensi;

        // Validasi gambar
        if (in_array($ekstensi, $valid_ekstensi)) {
            if ($ukuran < 1000000) {
                // Hapus foto lama jika ada
                $data_lama = $conn->query("SELECT foto FROM penghargaan WHERE id='$id'")->fetch_assoc();
                $foto_lama = $data_lama['foto'];
                if (!empty($foto_lama) && file_exists($direktori . $foto_lama)) {
                    unlink($direktori . $foto_lama);
                }

                move_uploaded_file($tmp_dir, $direktori . $gambar);
            } else {
                $pesan = "Ukuran gambar terlalu besar";
            }
        } else {
            $pesan = "Ekstensi gambar tidak valid";
        }
    } else {
        // Jika tidak ada foto baru, gunakan foto lama
        $data_lama = $conn->query("SELECT foto FROM penghargaan WHERE id='$id'")->fetch_assoc();
        $gambar = $data_lama['foto'];
    }

    // Update data ke database
    $stmt = $conn->prepare("UPDATE penghargaan SET foto=?, deskripsi=? WHERE id=?");

    if (!$stmt) {
        die('Error in prepare statement: ' . $conn->error);
    }

    $stmt->bind_param("ssi", $gambar, $deskripsi, $id);

    if ($stmt->execute()) {
        $pesan = "Data berhasil diperbarui";
    } else {
        $pesan = "Gagal memperbarui: " . $stmt->error;
    }

    $stmt->close();

    // Redirect ke halaman edit data
    switch ($jenis) {
        Default:
            header("location: lihatdatapenghargaan.php");
    }
    exit();
}
?>

<?php
// Fungsi untuk mendapatkan link Lihat Struktur Manajemen berdasarkan jenis
function getLinkLihatEdit($jenis) {
    switch ($jenis) {
        Default:
            return 'lihatdatapenghargaan.php';
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <title>Halaman Edit Data</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/413d50620c.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style4.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

    <style>
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

        .container {
            background-color: #fff;
            border: 2px solid #007bff; /* Border dengan warna biru dan ketebalan 2px */
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2); /* Efek bayangan */
            padding: 20px;
            width: 400px;
            position: relative;
            background-size: 40px 40px; /* Atur jarak antar garis */
            background: linear-gradient(
                -45deg,
                rgba(0, 123, 255, 0.5) 25%,
                transparent 25%,
                transparent 50%,
                rgba(0, 123, 255, 0.5) 50%,
                rgba(0, 123, 255, 0.5) 75%,
                transparent 75%,
                transparent
            );
        }

        h2 {
            text-align: center;
            color: #007bff;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            box-sizing: border-box;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #0056b3;
        }

        .error-message {
            color: red;
            margin-top: 10px;
        }

        /* Styling for file input */
        .custom-file-upload {
            border: 1px solid #ccc;
            display: inline-block;
            padding: 6px 12px;
            cursor: pointer;
            background-color: #f8f9fa;
        }

        .custom-file-upload input[type="file"] {
            display: none;
        }

        .custom-file-upload:hover {
            background-color: #e9e
        }

        .text-center {
            text-align: center;
        }

        h2.text-center {
            text-align: center;
        }

        /* Gaya untuk highlight pada form edit data */
        form#formEditData {
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Efek bayangan dengan warna dan ketebalan tertentu */
            background: linear-gradient(to right, rgba(250, 255, 221, 0.797), #fecfef); /* Linear gradient highlight */
            border: 2px solid #000; /* Border dengan warna hitam dan ketebalan 2px */
        }

        .text-center img {
            width: 100%;
            height: auto;
            border-radius: 5px;
            border: 2px solid #000; /* Ganti #007bff dengan #000 untuk warna hitam */
            box-sizing: border-box;
        }

        input#deskripsi:hover {
            background: linear-gradient(to right, #f1c40f, #ffeb3b); /* Ubah warna gradient pada hover */
            cursor: pointer; /* Ganti kursor menjadi pointer pada hover */
            border: 1px solid #007bff; /* Warna border saat dihover */
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
            <img src="https://lazismulumajang.org/wp-content/uploads/2021/07/lembaga-amil-zakat-infaq-infak-dan-sedekah-sadaqah-muhammadiyah-lumajang-logo-header4.png"
                 alt="LUMAJANG"></a></h1>
</div>

<div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
        <div class="custom-menu"></div>
        <div class="p-4 pt-5">
            <h1><a href="#" class="logo" style="font-size: xx-large;"><img src="" alt="">LAZISMU LUMAJANG</a></h1>
            <ul class="list-unstyled components mb-5">
                <li>
                    <a><i class="fa-solid fa-user" style="color: #ffffff; padding: 5px;"></i><?php echo $_SESSION['login_user']; ?></a>
                </li>
                <li class="active">
                    <a href="beranda.html">Beranda</a>
                    <a href="#tentangkamiSubmenu" data-toggle="collapse" aria-expanded="false"
                       class="dropdown-toggle"> Tentang Kami</a>
                    <ul class="collapse list-unstyled" id="tentangkamiSubmenu">
                        <li>
                            <a href="profil_lembaga.html">Profil Lembaga</a>
                        </li>
                        <li>
                            <a href="visi_misi.html">Visi & Misi</a>
                        </li>
                        <li>
                            <a href="lihatstrukturmanajemen.php">Struktur Manajemen</a>
                        </li>
                        <li>
                            <a href="lihatdatapenghargaan.php">Penghargaan</a>
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
                    <a href="#layananSubmenu" data-toggle="collapse" aria-expanded="false"
                       class="dropdown-toggle">Layanan</a>
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
                    <a href="#">Berita</a>
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
                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved |
                    This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a
                            href="https://colorlib.com" target="_blank">Colorlib.com</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>
        </div>
    </nav>

    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">
        <body class="body1">
            <div class="container">
                <!-- Tombol Kembali ke Lihat Struktur Manajemen -->
                <ion-icon name="eye" id="lihatEditIcon"></ion-icon><br>
                <a href="<?php echo getLinkLihatPenghargaan($jenis); ?>" class="btn btn-secondary" style="float: right;">Kembali</a>
                <!-- Teks "Edit Data" ke kiri -->
                <h2 style="text-align: left;">Edit Data</h2>
                <form method="post" action="" enctype="multipart/form-data" id="formEditData">
                    <!-- Isi form modal sesuai kebutuhan -->
                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

                    <!-- Ganti label "Foto" dengan "Foto Lama" dan tambahkan class "text-center" untuk styling -->
                    <label for="fotoLama" class="text-center">Foto Lama:</label>
                    <div class="text-center">
                        <img src="images/<?php echo $data['foto']; ?>" alt="Foto Lama" style="width: 150px; height: 200px;">
                    </div>

                    <!-- Ganti label "Nama" dengan "Nama" -->
                    <label>Deskripsi:</label>
                    <input type="text" name="deskripsi" id="deskripsi" value="<?php echo $data['deskripsi']; ?>" required="required">

                    <!-- Tambahkan input file untuk ubah foto -->
                    <label for="ubahFoto">Ubah Foto (opsional):</label>
                    <label class="custom-file-upload">
                        <input type="file" name="ubah_foto" id="ubahFoto" onchange="displayFileName(this)"> Pilih File
                    </label>
                    <!-- Tampilkan nama berkas setelah dipilih -->
                    <div id="fileName"></div>

                    <button type="submit" name="ubah" id="ubah">Ubah</button>
                </form>
                
                <!-- Script JavaScript untuk menampilkan nama berkas -->
                <script>
                    function displayFileName(input) {
                        const fileNameElement = document.getElementById('fileName');
                        if (input.files.length > 0) {
                            const fileName = input.files[0].name;
                            fileNameElement.innerText = 'Nama File: ' + fileName;
                        } else {
                            fileNameElement.innerText = '';
                        }
                    }
                </script>
                <!-- Tambahkan script untuk jQuery dan Bootstrap JS -->
                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
                <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        // Reset formulir modal saat halaman dimuat
                        document.getElementById('formEditData').reset();

                        // Mendapatkan jenis dari PHP
                        var jenis = "<?php echo $jenis; ?>";

                        // Mendapatkan link Lihat Struktur Manajemen berdasarkan jenis
                        var linkLihatStruktur = "<?php echo getLinkLihatPenghargaan($jenis); ?>";

                        // Menambahkan event listener untuk mengarahkan ikon mata ke link Lihat Struktur Manajemen
                        document.getElementById('lihatEditIcon').addEventListener('click', function() {
                            switch (jenis) {
                                default:
                                    // Ganti ini dengan header dan location yang sesuai untuk default
                                    window.location.href = 'penghargaan.php';
                            }
                        });
                    });
                </script>
            </div>

        <!-- Tambahkan script JavaScript untuk reset formulir modal saat halaman dimuat -->
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
        <!-- Tambahkan script untuk jQuery dan Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Reset formulir modal saat halaman dimuat
                document.getElementById('formEditData').reset();
            });
        </script>
    </div>
      </body>
  </body>
</html>