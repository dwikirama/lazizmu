<?php
require('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $telepon = mysqli_real_escape_string($conn, $_POST['telepon']);
    $pesan = mysqli_real_escape_string($conn, $_POST['pesan']);

    $query = "INSERT INTO contact (nama, email, alamat, telepon, pesan) VALUES ('$nama', '$email', '$alamat', '$telepon', '$pesan')";

    $result = mysqli_query($conn, $query);

    if ($result) {
		// Kosongkan bagian ini atau tambahkan tindakan khusus jika diperlukan
		echo ""; 
	} else {
		// Kosongkan bagian ini atau tambahkan tindakan khusus jika diperlukan
		echo "";
	}	

    mysqli_close($conn);
}
session_start();
      if(!isset($_SESSION['login_user'])) {
        header("location: login.php");
      }else{
?>

<!doctype html>
<html lang="en">
  <head>
  	<title>kontak</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script src="https://kit.fontawesome.com/413d50620c.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style2.css">
		<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

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

			.text-center {
				text-align: center;
			}

			.warning-box {
				color: red;
				display: none;
				border: 1px solid #dc3545;
				background-color: #f8d7da;
				padding: 10px;
				border-radius: 5px;
				margin-top: 10px;
			}

			.success-notification {
			position: fixed;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			background-color: #4CAF50;
			color: white;
			text-align: center;
			padding: 16px;
			margin: 16px 0;
			display: none;
			border: 1px solid #4CAF50;
			border-radius: 5px;
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
		<?php require_once 'Sidebar_User.php'; ?>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">

		<div class="card-container">
            <div class="left">
                <div class="left-container">
                    <h2>Tentang Kami</h2>
                    <p>LAZISMU adalah lembaga zakat tingkat nasional yang berkhidmat dalam pemberdayaan masyarakat melalui pendayagunaan secara produktif dana zakat, infaq, wakaf dan dana kedermawanan lainnya baik dari perseorangan, lembaga, perusahaan dan instansi lainnya.</p>
                </div>
            </div>
            <div id="notification" class="notification"></div>
			<div id="successNotification" class="success-notification" style="display: none;">
				<p>Data telah berhasil dikirim!</p>
			</div>
			<div class="right">
				<div class="right-container">
					<h2 class="lg-view">Hubungi Kami</h2>
					<h2 class="sm-view">Hubungi Kami</h2>
					<form id="contactForm">
						<input type="text" name="nama" placeholder="Nama anda" required="required">
						<input type="email" name="email" placeholder="Email anda" required="required">
						<input type="text" name="alamat" placeholder="Alamat anda" required="required">
						<input type="tel" name="telepon" placeholder="Telepon anda" required="required">
						<textarea rows="10" name="pesan" placeholder="Pesan" required="required"></textarea>
						<button type="button" onclick="validateAndSubmit()">Kirim</button>
						<div class="text-center">
							<p id="formWarning" class="warning-box">Harap isi semua bidang formulir sebelum mengirim!!!</p>
						</div>
					</form>
				</div>
			</div>
        </div>
	  </div>
  </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
    function validateAndSubmit() {
    var form = document.getElementById("contactForm");

    // Periksa apakah formulir valid
    if (form.checkValidity()) {
        submitForm();
    } else {
        // Tampilkan peringatan di dalam kotak dan di tengah konten
        var formWarning = document.getElementById('formWarning');
        formWarning.style.display = 'block';

        // Setelah 7 detik, sembunyikan peringatan
        setTimeout(function() {
            formWarning.style.display = 'none';
        }, 7000);
    }
}

function submitForm() {
    var form = document.getElementById("contactForm");
    var formData = new FormData(form);

    $.ajax({
        type: "POST",
        url: "contact.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            // Mengubah latar belakang formulir berdasarkan kondisi
            if (response.includes('berhasil')) {
                form.classList.add('form-success');
                showNotification('');
                showSuccessNotification();

                // Menonaktifkan tombol Kirim
                var submitButton = form.querySelector('button');
                submitButton.disabled = true;

                // Mengosongkan formulir (opsional)
                form.reset();

                // Menyembunyikan formulir (opsional)
                // form.style.display = 'none';
            } else {
                form.classList.add('form-error');
                showNotification('Terjadi kesalahan, data tidak berhasil dikirim');
            }

            // Setelah 7 detik, hapus kelas yang telah ditambahkan
            setTimeout(function() {
                form.classList.remove('form-success', 'form-error');
            }, 70000);

            // Jika pengiriman berhasil, reload halaman contact.php (opsional)
            if (response.includes('berhasil')) {
                window.location = 'contact.php';
            }
        },
        error: function(error) {
            console.error("Error:", error);
        }
    });
}

function showSuccessNotification() {
    var successNotification = document.getElementById('successNotification');
    successNotification.style.display = 'block';

    // Sembunyikan notifikasi setelah 7 detik
    setTimeout(function() {
        successNotification.style.display = 'none';
    }, 70000);
}

function showNotification(message) {
    var notification = document.getElementById('notification');
    var successIcon = document.createElement('icon');
    successIcon.src = 'path/to/checkmark.png';  // Ganti dengan path ke gambar centang Anda
    successIcon.classList.add('success-icon');

    notification.innerHTML = '';
    notification.appendChild(successIcon);
    notification.innerHTML += '<p>' + message + '</p>';

    notification.style.display = 'block';

    // Sembunyikan pemberitahuan setelah 7 detik
    setTimeout(function() {
        notification.style.display = 'none';
    }, 70000);
}
</script>
  </body>
</html>
<?php } ?>