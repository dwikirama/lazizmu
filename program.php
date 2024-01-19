<?php
session_start();
if (!isset($_SESSION['login_user'])) {
	header("location: login.php");
} else {
	include "./config.php";

	$type = 'infaq';
	if (isset($_GET['type'])) {
		$type = $_GET['type'];
	}
	$query = mysqli_query($conn, "SELECT * FROM infaq WHERE type = '$type'");
	?>
	<!doctype html>
	<html lang="en">

	<head>
		<title>PROGRAM DONASI</title>
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
			.infaq-btn {
				background-color: rgba(255, 255, 255, 0.3);
				/* Warna latar belakang dengan transparansi */
				color: #ffffff;
				margin-right: 10px;
				padding: 10px;
				transition: transform 0.3s;
			}

			.infaq-btn:hover {
				transform: scale(1.2);
			}

			/* Style untuk tombol zakat */
			.zakat-btn {
				background-color: rgba(255, 255, 255, 0.3);
				/* Warna latar belakang dengan transparansi */
				color: #ffffff;
				margin-left: 10px;
				padding: 10px;
				transition: transform 0.3s;
			}

			.zakat-btn:hover {
				transform: scale(1.2);
			}

			/* ... CSS sebelumnya ... */

			.infaq-box {
				/* Gaya untuk lapisan background putih transparan di dalam donation-box */
				background-color: rgba(255, 255, 255, 0.8);
				padding: 10px;
				width: 272px;
				height: 268px;
				border-radius: 5px;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
				margin-bottom: 20px;
				text-align: center;
				display: flex;
				flex-direction: column;
				justify-content: space-between;
				max-width: 100%;
				/* Menambahkan max-width */
				position: relative;
				transition: transform 0.3s;
			}

			.infaq-box:hover {
				transform: scale(1.2);
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
				justify-content: space-around;
				/* Untuk menyeimbangkan jarak antar box */
				align-items: center;
				margin: auto;
				margin-top: 20px;
			}

			.infaq-item {
				text-align: center;
				width: 100%;
				/* Mengubah width menjadi 100% */
				position: relative;
				/* Tambahkan position relative untuk menentukan ukuran infaq-box */
			}

			.infaq-content {
				margin-top: 10px;
			}

			.infaq-img {
				width: 100%;
				/* Ukuran gambar mengambil 100% dari parent (infaq-item) */
				max-width: 252px;
				/* Ukuran maksimum gambar */
				height: auto;
				/* Biarkan tinggi menyesuaikan agar tidak terdistorsi */
				border-radius: none;
				border: 2px solid bisque;
				/* Menambahkan garis border jika diinginkan */
				margin: 0 auto;
				/* Pusatkan gambar secara horizontal */
			}

			.infaq-name {
				margin-top: 10px;
				color: #000;
				font-weight: bold;
				text-align: center;
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
					<a href="program.php" class="infaq-btn" onmouseover="zoomIn(this)" onmouseout="zoomOut(this)"><ion-icon
							name="pricetag"></ion-icon> Infaq</a>
					<a href="program.php?type=zakat" class="zakat-btn" onmouseover="zoomIn(this)"
						onmouseout="zoomOut(this)"><ion-icon name="pricetag"></ion-icon> Zakat</a>
				</div>

				<div class="infaq-section">
					<?php while ($row = mysqli_fetch_assoc($query)): ?>
						<div class="infaq-box" onmouseover="zoomIn(this)" onmouseout="zoomOut(this)">
							<div class="infaq-item">
								<img src="uploads/<?= $row['foto'] ?>" alt="infaq1" class="infaq-img">
								<div class="infaq-content">
									<div class="infaq-name">
										<?= $row['namap'] ?>
									</div>
									<button class="donate-btn" onmouseover="zoomIn(this)" onmouseout="zoomOut(this)"><a
											href="dns-infaq.php?id=<?= $row['id'] ?>">DONASI SEKARANG</a></button>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
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