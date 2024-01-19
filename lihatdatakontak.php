<?php  
    session_start();
      if(!isset($_SESSION['login_user'])) {
        header("location: login.php");
      }else{

?>

<?php
require('config.php');

// Fungsi untuk menghapus data berdasarkan ID
function deleteContact($conn, $id) {
    $querySelect = "SELECT waktu_masuk FROM contact WHERE id = $id";
    $result = mysqli_query($conn, $querySelect);
    $row = mysqli_fetch_assoc($result);
    $waktu_masuk = $row['waktu_masuk'];

    $queryDelete = "DELETE FROM contact WHERE id = $id";
    mysqli_query($conn, $queryDelete);
}

// Tambahkan kondisi untuk menangani penghapusan data
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $idToDelete = $_GET['id'];
    deleteContact($conn, $idToDelete);
}

// Fungsi untuk mengupdate data kontak
function updateContact($conn, $id, $nama, $email, $alamat, $telepon, $pesan)
{
    $queryUpdate = "UPDATE `contact` SET 
        `nama`=?, 
        `email`=?, 
        `alamat`=?, 
        `telepon`=?, 
        `pesan`=? 
        WHERE `id`=?";
    
    $stmt = mysqli_prepare($conn, $queryUpdate);
    mysqli_stmt_bind_param($stmt, "sssssi", $nama, $email, $alamat, $telepon, $pesan, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

// Bagian pemrosesan formulir delete dan update di sini
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id'])) {
    // Ambil nilai dari formulir
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $pesan = $_POST['pesan'];

    // Panggil fungsi updateContact
    updateContact($conn, $id, $nama, $email, $alamat, $telepon, $pesan);

    // Redirect ke lihatdatakontak.php setelah berhasil diupdate
    header("Location: lihatdatakontak.php");
    exit();
}

// Fungsi untuk memperpendek dan menyembunyikan hash dengan SHA-256
function shortenAndHide($email, $length = 3) {
    $hashedEmail = hash('sha256', $email);
    $shortenedHash = substr($hashedEmail, 0, $length);
    return str_repeat('*', $length);
}

?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Data Pengunjung</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/413d50620c.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
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

            .form-control {
                position: relative;
                width: 100%;
                outline: 0;
                border: 2px solid #000;
                border-radius: 3px;
                padding: 10px;
                padding-left: 40px;
                background: transparent;
            }

            .icon-person {
                position: absolute;
                top: 9.1%;
                width: 38px;
                display: flex;
                justify-content: center;
                align-items: center;
                color: #000;
                padding: 10px;
                background: linear-gradient(to right, rgba(250, 255, 221, 0.797), #fecfef);
                border-right: 0.1px solid #000; 
                border-bottom-left-radius: 2px;
                border-top-left-radius: 2px;
            }
            
            .icon-mail {
                position: absolute;
                top: 25.3%;
                width: 38px;
                display: flex;
                justify-content: center;
                align-items: center;
                color: #000;
                padding: 10px;
                background: linear-gradient(to right, rgba(250, 255, 221, 0.797), #fecfef);
                border-right: 0.1px solid #000; 
                border-bottom-left-radius: 2px;
                border-top-left-radius: 2px;
            }

            .icon-home {
                position: absolute;
                top: 41.6%;
                width: 38px;
                display: flex;
                justify-content: center;
                align-items: center;
                color: #000;
                padding: 10px;
                background: linear-gradient(to right, rgba(250, 255, 221, 0.797), #fecfef);
                border-right: 0.1px solid #000; 
                border-bottom-left-radius: 2px;
                border-top-left-radius: 2px;
            }

            .icon-call {
                position: absolute;
                top: 57.8%;
                width: 38px;
                display: flex;
                justify-content: center;
                align-items: center;
                color: #000;
                padding: 10px;
                background: linear-gradient(to right, rgba(250, 255, 221, 0.797), #fecfef);
                border-right: 0.1px solid #000; 
                border-bottom-left-radius: 2px;
                border-top-left-radius: 2px;
            }

            .icon-chatbubbles {
                position: absolute;
                top: 74%;
                width: 38px;
                display: flex;
                justify-content: center;
                align-items: center;
                color: #000;
                padding: 10px;
                background: linear-gradient(to right, rgba(250, 255, 221, 0.797), #fecfef);
                border-right: 0.1px solid #000;
                border-bottom-left-radius: 2px;
                border-top-left-radius: 2px; 
            }

            .form-control:focus {
                color: #000;
                border-color: #000;
            }

            .form-control:focus ⁓ .icon-contact {
                color: #000;
            }

            /* Gaya untuk efek hover pada input */
            .form-control:hover {
                background: linear-gradient(to right, #f1c40f, #ffeb3b); /* Ubah warna gradient pada hover */
                cursor: pointer; /* Ganti kursor menjadi pointer pada hover */
            }

            /* Gaya untuk efek hover pada ikon-search */
            .input-search:hover {
                background: linear-gradient(to right, #f1c40f, #ffeb3b); /* Ubah warna gradient pada hover */
                cursor: pointer; /* Ganti kursor menjadi pointer pada hover */
            }

            .pagination-container {
                text-align: right;
            }

            .pagination-container:hover {
                transform: scale(1.2);
            }

            .icon-arrowback {
                color: black;
            }

            .icon-arrownext {
                color: black;
            }

            .icon-arrowforward {
                color: black;
            }

            /* Icon styling for smaller screens (adjust max-width as needed) */
            @media (max-width: 768px),
                   (max-width: 480px) {
            .icon-person,
            .icon-mail,
            .icon-home,
            .icon-call,
            .icon-chatbubbles {
                left: 4.5%; /* Adjust this value for smaller screens */
            }
        }
			/* Add more styling as needed */
	
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
        <div class="container1">
            <h2 style="text-align: center">Data Pengunjung</h2>
            <div class="search-container"><ion-icon name="search"></ion-icon> 
                <input type="text" class="input-search" id="searchInput" oninput="searchData()" placeholder="Cari">
            </div>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Waktu Masuk</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Pesan</th>
                    <th>Aksi</th>
                </tr>

                <?php
                $result = mysqli_query($conn, 'SELECT * FROM contact ORDER BY waktu_masuk DESC');
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr class='highlight'>";
                    echo "<td>" . $row['id'] . "</td>";
                    // Menampilkan waktu_masuk dengan format dd-mmm-yyyy hh:mm
                    echo "<td>" . date('d-M-Y H:i', strtotime($row['waktu_masuk'])) . "</td>";
                    echo "<td>" . $row['nama'] . "</td>";
                    // Menampilkan hash yang diperpendek dan sepenuhnya ditutupi dengan SHA-256
                    echo "<td>" . shortenAndHide($row['email']) . "</td>";
                    echo "<td>" . $row['alamat'] . "</td>";
                    echo "<td>" . $row['telepon'] . "</td>";
                    echo "<td>" . $row['pesan'] . "</td>";
                    echo "<td>
                            <div class='btn-group' role='group'>
                                <a href='#' class='btn btn-success btn-sm btn-ubah' data-bs-toggle='modal' data-bs-target='#exampleModal' data-id='{$row['id']}' data-nama='{$row['nama']}' data-email='{$row['email']}' data-alamat='{$row['alamat']}' data-telepon='{$row['telepon']}' data-pesan='{$row['pesan']}'>
                                    <ion-icon name='create'></ion-icon>
                                </a>
                                <a href='?action=delete&id={$row['id']}' class='btn btn-danger btn-sm' style='margin-left: 5px;'>
                                    <ion-icon name='trash'></ion-icon>
                                </a>
                            </div>
                        </td>";
                    echo "</tr>";
                }

                mysqli_close($conn);
                ?>
            </table>
            <!-- Tombol Prev dan Next -->
            <div class="pagination-container" style="float: right; margin-top: 10px;">
                <button class="icon-arrowback" onclick="changePage('prev')" onmouseover="zoomIn(this)" onmouseout="zoomOut(this)"><ion-icon name="arrow-back"></ion-icon></button>
                <button class="icon-arrowforward" onclick="changePage('next')" onmouseover="zoomIn(this)" onmouseout="zoomOut(this)"><ion-icon name="arrow-forward"></ion-icon></button>
            </div>

        
        <!-- Ubah -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Data</h1><br>
                        <span class="icon-close"><ion-icon name="close"></ion-icon></span>
                    </div>
                    <div class="modal-body">
                        <form id="ubahForm" action="lihatdatakontak.php" method="POST" onsubmit="return handleFormSubmission();">
                            <input type="hidden" name="id" id="ubahId">
                            <div class="mb-3">
                                <label for="ubahNama" class="form-label">Nama:</label>
                                <input type="text" class="form-control" id="ubahNama" name="nama" placeholder="Nama" required="required">
                                <div class="icon-person">
                                <ion-icon name="person"></ion-icon>
                                </div>
                            </div>
                            <div class="mb-3">
                                <span class="icon" id="registerEyeOff"><ion-icon name="eye-off"></ion-icon></span>
                                <label for="ubahEmail" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="ubahEmail" name="email" placeholder="Email" required="required">
                                <div class="icon-mail">
                                <ion-icon name="mail"></ion-icon>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="ubahAlamat" class="form-label">Alamat:</label>
                                <input type="text" class="form-control" id="ubahAlamat" name="alamat" placeholder="Alamat" required="required">
                                <div class="icon-home">
                                <ion-icon name="home"></ion-icon>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="ubahTelepon" class="form-label">Telepon:</label>
                                <input type="text" class="form-control" id="ubahTelepon" name="telepon" placeholder="Telepon" required="required">
                                <div class="icon-call">
                                <ion-icon name="call"></ion-icon>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="ubahPesan" class="form-label">Pesan:</label>
                                <textarea class="form-control" id="ubahPesan" name="pesan" placeholder="Ketik disini..." required></textarea>
                                <div class="icon-chatbubbles">
                                <ion-icon name="chatbubbles"></ion-icon>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" onclick="closeModalWithoutSaving()">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        <script>
            // Ambil nilai waktu saat ini dalam format timestamp
            var waktuSaatIni = Date.now();

            // Konversi timestamp ke format yang sesuai untuk elemen datetime-local
            var waktuFormatted = new Date(waktuSaatIni).toISOString().slice(0, -8);

            // Set nilai elemen datetime-local menggunakan nilai waktu yang sudah diformat
            document.getElementById('ubahWaktuMasuk').value = waktuFormatted;
        </script>
        <script>
        function handleFormSubmission() {
            // ...

            // Menampilkan pesan sukses (gunakan fungsi alert untuk tujuan demo)
            alert("Perubahan berhasil disimpan!");

            // Menutup modal setelah pengiriman formulir
            $('#exampleModal').modal('hide');

            // Perbarui tabel dengan data yang baru
            refreshTableData();

            // Prevent form submission (untuk mencegah pengiriman formulir default)
            return false;
        }

        function refreshTableData() {
            // Implementasikan logika untuk memperbarui tabel
            // Misalnya, dengan menggunakan AJAX untuk mengambil data terbaru
            // dan memasukkannya ke dalam tabel.

            // Contoh AJAX menggunakan jQuery:
            $.ajax({
                url: 'lihatdatakontak.php',
                method: 'GET',
                success: function(data) {
                    // Isi ulang tabel dengan data yang baru
                    $('#tabelDataKontak').html(data);
                },
                error: function(error) {
                    console.error('Error refreshing table data:', error);
                }
            });
        }

        function closeModalWithoutSaving() {
            $('#exampleModal').modal('hide');
        }

        $(document).ready(function () {
            $('.btn-ubah').click(function () {
                var id = $(this).data('id');
                var nama = $(this).data('nama');
                var email = $(this).data('email');
                var alamat = $(this).data('alamat');
                var telepon = $(this).data('telepon');
                var pesan = $(this).data('pesan');

                $('#ubahId').val(id);
                $('#ubahNama').val(nama);
                $('#ubahEmail').val(email);
                $('#ubahAlamat').val(alamat);
                $('#ubahTelepon').val(telepon);
                $('#ubahPesan').val(pesan);

                $('#exampleModal').modal('show');
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Mengambil elemen icon-close dan menambahkan event listener untuk menutup modal
            const iconClose = document.querySelector(".icon-close");
            if (iconClose) {
                iconClose.addEventListener("click", function () {
                    closeModalWithoutSaving();
                });
            }

            // Mengambil elemen icon-eye-off dan menambahkan event listener untuk mengubah tipe input email
            const iconEyeOff = document.getElementById("registerEyeOff");
            const emailInput = document.getElementById("ubahEmail");

            if (iconEyeOff && emailInput) {
                iconEyeOff.addEventListener("click", function () {
                    // Toggle tipe input antara password dan email
                    const isPassword = emailInput.type === "password";
                    emailInput.type = isPassword ? "email" : "password";
                    iconEyeOff.innerHTML = isPassword ? "<ion-icon name='eye'></ion-icon>" : "<ion-icon name='eye-off'></ion-icon>";
                });
            }
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

                // Loop melalui semua kolom sel pada baris tertentu
                for (var j = 2; j < tr[i].cells.length; j++) {
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
    <script>
        let currentPage = 1; // Halaman saat ini
        const rowsPerPage = 10; // Jumlah baris per halaman (sesuaikan dengan kebutuhan Anda)

        // Fungsi untuk mengubah halaman
        function changePage(action) {
            if (action === 'prev' && currentPage > 1) {
                currentPage--;
            } else if (action === 'next') {
                currentPage++;
            }

            // Panggil fungsi untuk menampilkan data pada halaman yang baru
            showDataOnPage();
        }

        // Fungsi untuk menampilkan data pada halaman yang ditentukan
        function showDataOnPage() {
            // Hitung indeks baris pertama dan terakhir untuk halaman saat ini
            const startIndex = (currentPage - 1) * rowsPerPage;
            const endIndex = startIndex + rowsPerPage;

            // Dapatkan semua baris dalam tabel
            const rows = document.querySelectorAll('table tr');

            // Sembunyikan semua baris
            rows.forEach((row, index) => {
                if (index === 0 || (index >= startIndex && index < endIndex)) {
                    row.style.display = ''; // Tampilkan baris header atau baris yang sesuai dengan halaman saat ini
                } else {
                    row.style.display = 'none'; // Sembunyikan baris lainnya
                }
            });
        }

        // Panggil fungsi pertama kali untuk menampilkan data pada halaman awal
        showDataOnPage();
    </script>
    <script>
		// Fungsi untuk memperbesar tombol
		function zoomIn(element) {
		  element.style.transform = "scale(1.2)";
		}
	
		// Fungsi untuk mengembalikan ukuran asli tombol
		function zoomOut(element) {
		  element.style.transform = "scale(1)";
		}
	  </script>
  </body>
</html>
<?php } ?>