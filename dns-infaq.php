<?php
session_start();
if (!isset($_SESSION['login_user'])) {
	header("location: login.php");
} else {
	include "./config.php";

	$id = $_GET['id'];
	$row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM infaq WHERE id = $id"));

	?>
	<!doctype html>
	<html lang="en">

	<head>
		<title>INFAQ</title>
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
				display: block;
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

			.donation {
				display: flex;
				justify-content: flex-start;
				max-width: 600px;
				margin: auto;
			}

			.donation a {
				text-decoration: none;
				color: #000;
				padding: 10px;
				position: relative;
				font-weight: bold;
			}

			.donation a:hover {
				background-color: rgba(28, 169, 89, 0.5);
				/* Transparansi pada hover */
				color: #ffffff;
			}

			/* Style untuk tombol infaq */
			.back-btn,
			.home-btn {
				background-color: rgba(255, 255, 255, 0.3);
				/* Warna latar belakang dengan transparansi */
				color: #ffffff;
				margin-right: 10px;
				padding: 10px;
				transition: transform 0.3s;
			}

			.back-btn,
			.home-btn:hover {
				transform: scale(1.2);
			}

			.infaq-box {
				/* Gaya untuk lapisan background putih transparan di dalam donation-box */
				background-color: rgba(255, 255, 255, 0.8);
				padding: 15px;
				width: 88%;
				height: auto;
				border-radius: 5px;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
				margin-bottom: 20px;
				text-align: center;
				display: flex;
				flex-direction: column;
				/* Mengubah orientasi flex ke kolom */
				justify-content: space-between;
				max-width: 100%;
				/* Menambahkan max-width */
				position: relative;
			}

			.infaq-box1 {
				/* Gaya untuk lapisan background putih transparan di dalam donation-box */
				background-color: rgba(255, 255, 255, 0.8);
				padding: 15px;
				width: 88%;
				height: auto;
				border-radius: 5px;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
				margin-bottom: 20px;
				text-align: left;
				display: flex;
				flex-direction: column;
				/* Mengubah orientasi flex ke kolom */
				justify-content: space-between;
				max-width: 100%;
				/* Menambahkan max-width */
				position: relative;
			}

			/* ... CSS sebelumnya ... */

			/* Tambahkan media query untuk menyesuaikan tata letak saat lebar layar lebih kecil */
			@media (max-width: 768px) {
				.infaq-section {
					flex-direction: column;
					/* Mengubah orientasi flex ke kolom */
					align-items: center;
					/* Pusatkan item secara horizontal */
				}

				.infaq-box {
					width: 100%;
					/* Lebar box mengambil 100% dari parent (infaq-section) */
				}

				.infaq-item {
					width: 100%;
					/* Lebar item menjadi 100% */
				}
			}


			.infaq-section {
				/* Gaya untuk lapisan background putih transparan di dalam infaq-section */
				background-color: rgba(255, 255, 255, 0.5);
				padding: 15px;
				max-width: 800px;
				height: auto;
				border-radius: 9px;
				display: flex;
				flex-direction: column;
				/* Mengubah orientasi flex ke kolom */
				justify-content: space-around;
				/* Untuk menyeimbangkan jarak antar box */
				align-items: center;
				/* Pusatkan item secara horizontal */
				margin: auto;
				margin-top: 20px;
			}

			.infaq-item {
				text-align: center;
				width: 100%;
				/* Lebar item menjadi 100% */
				position: relative;
				/* Tambahkan position relative untuk menentukan ukuran infaq-box */
			}

			.infaq-content {
				margin-top: 10px;
			}

			.infaq-img {
				width: 100%;
				/* Lebar gambar mengambil 100% dari parent (infaq-item) */
				height: auto;
				/* Tinggi otomatis menyesuaikan aspek rasio */
				border-radius: none;
				border: 2px solid rgb(0, 0, 0);
				/* Menambahkan garis border jika diinginkan */
				margin: 0 auto;
				/* Pusatkan gambar secara horizontal */
			}

			.infaq-name {
				margin-top: 10px;
				color: #000;
				font-weight: bold;
				text-align: left;
			}

			.donate-btn {
				background-color: rgba(28, 169, 89, 0.5);
				color: #ffffff;
				border: none;
				padding: 10px;
				cursor: pointer;
				position: relative;
				object-position: center;
				display: inline-block;
				transition: transform 0.3s;
			}

			.donate-btn:hover {
				transform: scale(1.2);
			}

			.infaq-maps {
				text-align: left;
				font-weight: bold;
			}

			.infaq-image {
				text-align: left;
				/* Pusatkan teks */
			}

			.infaq-image img {
				width: 100px;
				/* Sesuaikan dengan lebar yang diinginkan */
				height: auto;
				/* Biarkan tinggi disesuaikan secara otomatis */
				border-radius: 50%;
				/* Membuat gambar lingkaran */
				border: 1px solid #000;
				/* Menentukan lebar dan warna border */
			}

			.infaq-box1 details img {
				max-width: 100%;
				/* Maksimum lebar gambar adalah 100% dari lebar elemen details */
				height: auto;
				/* Tinggi gambar disesuaikan secara otomatis agar tetap proporsional */
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
					<img src="https://lazismulumajang.org/wp-content/uploads/2021/07/lembaga-amil-zakat-infaq-infak-dan-sedekah-sadaqah-muhammadiyah-lumajang-logo-header4.png"
						alt="LUMAJANG"></a></h1>
		</div>

		<div class="wrapper d-flex align-items-stretch">
		<?php require_once 'Sidebar_User.php'; ?>

			<!-- Page Content  -->
			<div id="content" class="p-4 p-md-5 pt-5">
				<div class="donation">
					<a href="program.php" class="back-btn" onmouseover="zoomIn(this)" onmouseout="zoomOut(this)"><ion-icon
							name="arrow-back"></ion-icon> Kembali</a>
					<a href="program.php" class="home-btn" onmouseover="zoomIn(this)" onmouseout="zoomOut(this)"><ion-icon
							name="home-outline"></ion-icon> Home</a>
				</div>

				<div class="infaq-section">
					<div class="infaq-box">
						<div class="infaq-item">
							<img src="uploads/<?= $row['foto'] ?>" alt="infaq1" class="infaq-img">
							<div class="infaq-content">
								<div class="infaq-name">
									<?= $row['namap'] ?>

								</div>
								<button class="donate-btn" onmouseover="zoomIn(this)" onmouseout="zoomOut(this)"><a
										href="forminfaq.php?id=<?= $row['id'] ?>">DONASI SEKARANG</a></button>
							</div>
						</div>
					</div>
				</div>

				<div class="infaq-section">
					<div class="infaq-box1">
						<div class="infaq-name">PENGGALANG DANA</div>
						<div class="infaq-image">
							<img src="https://lazismulumajang.org/wp-content/uploads/2022/02/lembaga-amil-Zakat-infaq-infak-dan-sedekah-sadaqah-muhammadiyah-lumajang-foto-profil-500x500-1-150x150.jpg"
								alt="Lazismu">
							<span><a href="index.php">Tim Lazismu Lumajang </a>✔️</span>
						</div>
					</div>
				</div>

				<div class="infaq-section">
					<div class="infaq-box1">
						<div class="infaq-name">Keterangan</div>
						<p>Assalamu'alaikum.. <br><br>
							<b>Infaq</b> menjadi salah satu ibadah sosial yang utama, karena mengandung pengertian bahwa
							selain berdampak nyata terhadap membantu kesulitan saudara muslim orang lain yang mengalami
							kesulitan ekonomi. <br><br>
						<details style="color:#000">
							<summary>Baca Selengkapnya</summary>
							<b><i>“Perumpamaan orang yang menginfakkan hartanya di jalan Allah seperti sebutir biji yang
									menumbuhkan tujuh tangkai, pada setiap tangkai ada seratus biji. Allah melipatgandakan
									bagi siapa yang Dia kehendaki, dan Allah Maha Luas, Maha Mengetahui.” (QS. Al-Baqarah:
									261).</i></b><br><br>
							Sobat Lazismu, mari sisihkan Sebagian rezeki kita untuk yang membutuhkan, karena sejatinya dalam
							rezeki kita ada juga bagian untuk saudara-saudara kita yang membutuhkan. <br><br>
							<b><i>Dan pada harta-harta mereka ada hak untuk orang miskin yang meminta dan orang miskin yang
									tidak mendapatkan bagian. (QS. Adz-Dzariyat: 19).</i></b><br><br>
							Insya Allah dengan berinfaq termasuk bentuk kita mensyukuri segala nikmat dan rezeki yang Allah
							berikan, berapapun yang Anda berikan sangat berarti besar bagi yang menerima. <br><br>
							Infaq dari Sobat Lazismu yang terkumpul akan disalurkan untuk 5 program utama yaitu:
							<b>Pendidikan, Kesehatan, Ekonomi, Sosial Dakwah</b> dan <b>Kemanusiaan.</b></p>
							<div class="img">
								<img src="./images/infaq lazismu 1.jpg" alt="1">
								<img src="./images/infaq lazismu 2.jpg" alt="2">
								<img src="./images/infaq lazismu 3.jpg" alt="3">
								<img src="./images/infaq lazismu 4.jpg" alt="4">
								<img src="./images/infaq lazismu 5.jpg" alt="5">
								<img src="./images/infaq lazismu 6.jpg" alt="6">
							</div>
							<p>Dari Abu Hurairah dia berkata, Rasulullah bersabda,<br><br>
								<b><i>Barangsiapa yang membantu seorang muslim (dalam) suatu kesusahan di dunia maka Allah
										akan menolongnya dalam kesusahan pada hari kiamat, dan barangsiapa yang meringankan
										(beban) seorang muslim yang sedang kesulitan maka Allah akan meringankan (bebannya)
										di dunia dan akhirat. (HR Muslim no. 2699).</i></b>
							</p>
						</details>
					</div>
				</div>

			</div>
		</div>
		</div>
		</div>

		<script src="js/jquery.min.js"></script>
		<script src="js/popper.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/main.js"></script>
		<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
		<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
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