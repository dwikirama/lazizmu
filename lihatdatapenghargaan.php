<?php  
    session_start();
      if(!isset($_SESSION['login_user'])) {
        header("location: login.php");
      }else{

?>

<?php
require('config.php');

// Inisialisasi pesan
$pesan = '';

// Proses tambah data
if (isset($_POST['kirim'])) {
    $deskripsi = $_POST['deskripsi'];

    // Menyiapkan validasi gambar yang akan diupload
    $file = $_FILES['foto']['name'];
    $tmp_dir = $_FILES['foto']['tmp_name'];
    $ukuran = $_FILES['foto']['size'];
    $direktori = 'images/'; // Path tempat simpan
    $ekstensi = strtolower(pathinfo($file, PATHINFO_EXTENSION)); // Dapatkan info gambar
    $valid_ekstensi = array('jpeg', 'jpg', 'png', 'gif'); // Ekstensi yang diizinkan
    $gambar = rand(1000, 1000000) . "." . $ekstensi;

    // Mulai validasi
    // Cek ekstensi gambar
    if (in_array($ekstensi, $valid_ekstensi)) {
        // Cek ukuran gambar
        if ($ukuran < 1000000) {
            // Buat direktori jika belum ada
            if (!file_exists($direktori)) {
                mkdir($direktori, 0777, true);
            }

            move_uploaded_file($tmp_dir, $direktori . $gambar);

            // Simpan data ke database dengan MySQLi
            $stmt = $conn->prepare("INSERT INTO penghargaan (foto, deskripsi) VALUES (?, ?)");

            // Periksa apakah prepare statement berhasil
            if (!$stmt) {
                die('Error in prepare statement: ' . $conn->error);
            }

            $stmt->bind_param("ss", $gambar, $deskripsi);

            // Periksa apakah execute statement berhasil
            if ($stmt->execute()) {
                $pesan = "Data berhasil disimpan";
            } else {
                $pesan = "Gagal menyimpan: " . $stmt->error;
            }

            $stmt->close();
        } else {
            $pesan = "Ukuran gambar terlalu besar";
        }
    } else {
        $pesan = "Ekstensi gambar tidak valid";
    }
}

// Jumlah data per halaman
$jumlahDataPerHalaman = 8;

// Tentukan halaman saat ini
$halamanSaatIni = isset($_GET['halaman']) ? $_GET['halaman'] : 1;

// Hitung batas awal data yang akan ditampilkan
$batasAwalData = ($halamanSaatIni - 1) * $jumlahDataPerHalaman;

// Proses ubah data
if (isset($_POST['ubah'])) {
    $id = $_POST['id'];
    $deskripsi = $_POST['deskripsi'];

    // Periksa apakah foto baru diunggah
    if (!empty($_FILES['foto']['name'])) {
        $file = $_FILES['foto']['name'];
        $tmp_dir = $_FILES['foto']['tmp_name'];
        $ukuran = $_FILES['foto']['size'];
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
}

// Ambil data dari database
$perintah = "SELECT * FROM penghargaan ORDER BY id ASC";
$result = $conn->query($perintah);
?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Halaman Lihat Data Penghargaan</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/413d50620c.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style5.css">
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

            /* Tambahkan CSS ini pada bagian <style> di dalam tag <head> atau dalam file CSS terpisah */
            .icon-btn {
                color: #fff; /* Warna teks putih */
                border: none; /* Hapus border */
                padding: 8px 12px; /* Atur padding */
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 14px;
                margin-right: 5px; /* Jarak antar tombol */
                cursor: pointer;
                border-radius: 5px; /* Rounding border */
            }

            .btn-edit {
                background-color: #ffc107; /* Warna kuning untuk tombol "Edit" */
            }

            .btn-delete {
                background-color: #dc3545; /* Warna merah untuk tombol "Delete" */
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
			<img src="https://lazismulumajang.org/wp-content/uploads/2021/07/lembaga-amil-zakat-infaq-infak-dan-sedekah-sadaqah-muhammadiyah-lumajang-logo-header4.png" alt="LUMAJANG"></a></h1>
    </div>
		
		<div class="wrapper d-flex align-items-stretch">
        <?php require_once 'Sidebar_Admin.php'; ?>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
      <body class="body1">
        <!-- Notifikasi -->
        <?php if (!empty($pesan)) : ?>
            <script>
        // Menampilkan alert
                alert("<?php echo $pesan; ?>");
            </script>
        <?php endif; ?>

        <div class="container1">
            <h2 style="text-align: center">Data Penghargaan</h2>
            <div class="search-container"><ion-icon name="search"></ion-icon> 
                    <input type="text" class="input-search" id="searchInput" oninput="searchData()" placeholder="Cari">
                    <button type="button" class="btn btn-primary tombol-tambah" data-toggle="modal" data-target="#exampleModal">
                        Tambah Data
                    </button>
                </div>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Foto</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    while ($data = $result->fetch_assoc()) {
                    ?>
                        <tr class="highlight">
                            <td><?php echo $data['id']; ?></td>
                            <td>
                                <?php
                                $direktori = 'images/';
                                $gambar = $data['foto'];
                                $path_gambar = $direktori . $gambar;

                                // Periksa apakah gambar ada di direktori
                                if (file_exists($path_gambar)) {
                                    echo "<img src='$path_gambar' width='60' height='80'>";
                                } else {
                                    echo "Gambar tidak ditemukan";
                                }
                                ?>
                            </td>
                            <td><?php echo $data['deskripsi']; ?></td>
                            <td>
                                <!-- Gantilah bagian AKSI dengan yang berikut -->
                                <div class="aksi-container">
                                    <a href="edit_data2.php?jenis=penghargaan&id=<?php echo $data['id']; ?>" class="icon-btn btn-edit" onmouseover="zoomIn(this)" onmouseout="zoomOut(this)">
                                        <ion-icon name="create"></ion-icon>
                                    </a>

                                    <!-- Ubah bagian ini pada tombol "Delete" -->
                                    <a href="del.php?del=<?php echo $data['id']; ?>&jenis=penghargaan" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" class="icon-btn btn-delete" onmouseover="zoomIn(this)" onmouseout="zoomOut(this)">
                                        <ion-icon name="trash"></ion-icon>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </table>

                <!-- Tambahkan navigasi paginasi -->
                <div class="pagination">
                    <?php
                    $queryJumlahData = "SELECT COUNT(*) AS jumlah FROM badaneksekutif";
                    $resultJumlahData = $conn->query($queryJumlahData);
                    $rowJumlahData = $resultJumlahData->fetch_assoc();

                    $jumlahHalaman = ceil($rowJumlahData['jumlah'] / $jumlahDataPerHalaman);

                    for ($i = 1; $i <= $jumlahHalaman; $i++) {
                        $activeClass = ($i == $halamanSaatIni) ? 'active' : '';

                        echo "<a class='$activeClass' href='?halaman=$i'>$i</a>";
                    }
                    ?>

                <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="" enctype="multipart/form-data" id="formTambahData">
                            <!-- Isi form modal sesuai kebutuhan -->
                            <label for="modalFoto" class="form-label">Foto:</label>
                            <input type="file" class="form-control" name="foto" id="foto" required="required">

                            <label>Deskripsi:</label>
                            <input type="text" class="form-control" name="deskripsi" id="deskripsi" required="required">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" name="kirim" id="kirim" value="SIMPAN">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Ubah Data -->
        <div class="modal fade" id="exampleModalUbah" tabindex="-1" aria-labelledby="exampleModalLabelUbah" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabelUbah">Ubah Data</h1>
                        <span class="icon-close" data-dismiss="modal" aria-label="Close"><ion-icon name="close"></ion-icon></span>
                    </div>
                    <div class="modal-body">
                        <form id="ubahForm" action="lihatdatapenghargaan.php" method="POST" enctype="multipart/form-data" onsubmit="return handleFormSubmission();">
                            <input type="hidden" name="id" id="ubahId">
                            <!-- Tambahkan input untuk data yang akan diubah (contoh: nama, jabatan) -->
                            <div class="mb-3">
                                <label for="ubahDeskripsi" class="form-label">Deskripsi:</label>
                                <input type="text" class="form-control" id="ubahDeskripsi" name="deskripsi" placeholder="Deskripsi" required="required">
                            </div>
                            <!-- ... Tambahkan input untuk data lainnya sesuai kebutuhan -->

                            <!-- Input untuk memperbarui foto -->
                            <div class="mb-3">
                                <label for="ubahFoto" class="form-label">Foto Baru (Opsional):</label>
                                <input type="file" class="form-control" name="foto" id="ubahFoto">
                            </div>

                            <!-- Input hidden untuk menyimpan nama file foto lama -->
                            <input type="hidden" name="foto_lama" id="fotoLama">

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary" name="ubah">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </body>
      </div>  

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- Tambahkan script untuk jQuery dan Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!-- Tambahkan script untuk jQuery dan Bootstrap JS -->
    <script>
        $(document).ready(function(){
            // Menampilkan modal ketika tombol "Tambah Data" diklik
            $('#btnTambahData').click(function(){
                $('#exampleModal').modal('show');
            });

            // Menampilkan modal otomatis jika pesan tidak kosong
            <?php if (!empty($pesan)) : ?>
                $('#exampleModal').modal('show');
            <?php endif; ?>

            // Reset formulir modal saat formulir ditutup
            $('#exampleModal').on('hidden.bs.modal', function () {
                $('#formTambahData')[0].reset();
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('.btn-ubah').click(function () {
                var id = $(this).data('id');
                var deksripsi = $(this).data('deksripsi');
                var foto = $(this).data('foto'); // Tambahkan data foto

                $('#ubahId').val(id);
                $('#ubahDeskripsi').val(deksripsi);
                $('#fotoLama').attr('src', 'images/' + foto); // Tampilkan foto yang sudah ada

                $('#exampleModalUbah').modal('show'); // Gunakan ID modal yang sudah diubah
            });
        });
    </script>
    <script>
        function searchData() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.querySelector("table");
            tr = table.getElementsByTagName("tr");

            for (i = 1; i < tr.length; i++) { // Mulai dari 1 untuk melewati baris header
                var found = false; // Tambahkan variabel untuk menandai apakah ada hasil pencarian

                // Loop melalui kolom nama dan jabatan pada baris tertentu
                for (var j = 1; j <= 2; j++) {
                    td = tr[i].cells[j];
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            found = true; // Setel found menjadi true jika ada hasil pencarian
                            break; // Hentikan loop jika sudah ditemukan hasil pencarian
                        }
                    }
                }

                // Tampilkan atau sembunyikan baris berdasarkan hasil pencarian
                if (found) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    </script>
  </body>
</html>
<?php } ?>