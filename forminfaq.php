<?php
session_start();
if (!isset($_SESSION['login_user'])) {
	header("location: login.php");
} else {
	include "./config.php";

	$id = $_GET['id'];
	$row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM infaq WHERE id = $id"));

	$wallet = mysqli_query($conn, "SELECT * FROM wallet");


	?>
	<!doctype html>
	<html lang="en">

	<head>
		<title>FORM INFAQ</title>
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

				/* ... Bagian CSS sebelumnya ... */

				.infaq-section1 {
					flex-direction: column;
					/* Mengubah orientasi flex ke kolom pada tampilan Android */
					align-items: center;
					/* Pusatkan item secara horizontal pada tampilan Android */
				}

				#customAmountContainer {
					width: 30%;
					/* Lebar input mengambil 100% pada tampilan Android */
					margin-top: 10px;
					/* Sesuaikan margin di atas input pada tampilan Android */
				}

				#customAmount {
					font-size: 60%;
					/* Sesuaikan ukuran font sesuai kebutuhan */
				}

				/* ... Bagian CSS setelahnya ... */


				.infaq-name {
					margin: 8px 0;
					/* Atur margin untuk membuat label berada satu per satu ke samping */
					display: flex;
					flex-direction: row;
					/* Tampilkan secara horizontal */
					align-items: center;
					justify-content: center;
					font-size: 18px;
					/* Sesuaikan ukuran font sesuai kebutuhan */
				}


				.infaq-name label {
					margin: 0 8px;
					/* Sesuaikan margin untuk membuat label berada satu per satu ke samping */
					font-size: 10px;
					/* Sesuaikan ukuran font untuk layar yang lebih kecil */
					margin: 0 1px;
					/* Sesuaikan margin untuk membuat label berada satu per satu ke samping */
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
				justify-content: space-between;
				/* Untuk menyeimbangkan jarak antar box */
				align-items: center;
				/* Pusatkan item secara horizontal */
				margin: auto;
				margin-top: 20px;
			}

			.infaq-section1 {
				background-color: rgba(255, 255, 255, 0.5);
				padding: 15px;
				max-width: 800px;
				height: auto;
				border-radius: 9px;
				display: flex;
				justify-content: space-between;
				align-items: center;
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

			.infaq-name1 {
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


			.infaq-name input[type="radio"] {
				display: none;
				/* Sembunyikan input radio yang sebenarnya */
			}

			.infaq-name label {
				cursor: pointer;
				padding: 2px 4px;
				margin: 0 8px;
				/* Sesuaikan margin agar tidak terlalu lebar */
				border: 1px solid #ccc;
				border-radius: 5px;
				display: flex;
				justify-content: center;
				align-items: center;
				text-align: center;
				transition: transform 0.3s;
				max-width: 100%;
				/* Set maksimum lebar untuk label */
				white-space: nowrap;
				/* Jangan lipat teks ke baris baru */
			}


			.infaq-name input[type="radio"]:checked+label {
				background-color: #4CAF50;
				/* Warna latar belakang saat input dipilih */
				color: #fff;
				/* Warna teks saat input dipilih */
			}

			/* Menambahkan ukuran pada input radio di dalam .infaq-name */
			.infaq-name input[type="radio"] {
				width: 100px;
				/* Sesuaikan lebar input radio */
				height: 30px;
				/* Sesuaikan tinggi input radio */
				margin-right: 5px;
				/* Sesuaikan margin di sebelah kanan input radio jika diperlukan */
			}

			#customAmount::placeholder::before {
				content: "Rp ";
				color: black;
				/* Ganti warna teks menjadi hitam */
				opacity: 0.5;
				/* Opasitas untuk memberikan efek lebih ringan */
				margin-right: 8px;
				/* Berikan jarak antara "Rp" dengan teks "Masukkan nominal" */
			}

			#customAmount::placeholder {
				color: blue;
				/* Ubah warna untuk teks placeholder */
			}

			#customAmountContainer input {
				width: 100%;
				/* Lebar input mengambil 100% dari parent (customAmountContainer) */
				padding: 5px;
				/* Sesuaikan padding agar lebih kompak */
			}

			#customAmountContainer label {
				margin-left: 5px;
				/* Berikan margin di kiri label */
			}

			/* Gaya untuk bagian metode pembayaran */
			.payment-method {
				margin-top: 20px;
			}

			label[for="paymentSelect"] {
				display: block;
				margin-bottom: 5px;
				color: #000;
				/* Warna teks label */
			}

			#paymentSelect {
				width: 100%;
				padding: 8px;
				margin-bottom: 10px;
			}

			button {
				background-color: #4CAF50;
				color: white;
				padding: 10px 15px;
				border: none;
				border-radius: 5px;
				cursor: pointer;
			}

			button:hover {
				background-color: #45a049;
			}

			/* Gaya untuk lapisan background putih transparan di dalam infaq-section */
			/* Gaya untuk lapisan background putih transparan di dalam infaq-section */
			.notification-overlay {
				display: none;
				position: fixed;
				top: 50%;
				left: 50%;
				transform: translate(-50%, -50%);
				padding: 20px;
				background-color: #fff;
				border: 1px solid #ddd;
				border-radius: 10px;
				z-index: 999;
				text-align: center;
				max-width: 90%;
				/* Ukuran maksimum 90% dari lebar layar */
				width: 300px;
				/* Ukuran minimum 300px */
			}

			/* CSS setelahnya */

			/* Aturan media queries untuk perangkat berukuran kecil seperti ponsel */
			@media only screen and (max-width: 600px) {
				.notification-overlay {
					max-width: 90%;
					width: 90%;
				}
			}

			/* Aturan media queries untuk perangkat berukuran sedang seperti tablet */
			@media only screen and (min-width: 601px) and (max-width: 1024px) {
				.notification-overlay {
					max-width: 70%;
					width: 70%;
				}
			}

			/* Gaya untuk gambar Transfer Bank */
			.bank-transfer-image {
				max-width: 100%;
				height: auto;
				margin-top: 10px;
				/* Ubah sesuai kebutuhan desain */
			}

			#bankImage {
				width: 50px;
				/* Sesuaikan ukuran sesuai kebutuhan Anda */
				height: auto;
				/* Biarkan tinggi otomatis agar proporsi gambar tetap terjaga */
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
					<a href="dns-infaq.php?id=<?= $row['id'] ?>" class="back-btn" onmouseover="zoomIn(this)"
						onmouseout="zoomOut(this)"><ion-icon name="arrow-back"></ion-icon> Kembali</a>
					<a href="beranda.php" class="home-btn" onmouseover="zoomIn(this)" onmouseout="zoomOut(this)"><ion-icon
							name="home-outline"></ion-icon> Home</a>
				</div>

				<div class="infaq-section">
					<div class="infaq-box">
						<div class="infaq-item">
							<img src="uploads/<?= $row['foto'] ?>" alt="infaq1" class="infaq-img">
							<div class="infaq-content">
								<div class="infaq-name1">
									<?= $row['namap'] ?>


								</div>
								<button class="donate-btn" onmouseover="zoomIn(this)" onmouseout="zoomOut(this)"><a
										href="#">DONASI SEKARANG</a></button>
							</div>
						</div>
					</div>
				</div>

				<form action="proses_bayar.php" method="post">
					<div class="infaq-section1">
						<input type="hidden" name="infaq_id" value="<?= $row['id'] ?>">
						<div class="infaq-item">
							<div class="infaq-content">
								<div class="infaq-name">
									<h4>Pembayaran</h4>

									<!-- <input type="radio" name="donationAmount" id="donationnominal" value="nominal">
									<label for="donationnominal" onclick="toggleCustomAmount()">Nominal</label>
									<div id="customAmountContainer" style="display: none;">
										<input type="text" id="customAmount" placeholder="Rp   Masukkan nominal" oninput="updateNominal()">
									</div> -->
									<input type="number" name="nominal" placeholder="Masukkan Nominal" required="required"
										style="width:100%;margin-bottom:10px;">
									<input type="text" name="nama" placeholder="Nama anda" required="required"
										style="width:100%;margin-bottom:10px;">
									<input type="tel" name="telepon" placeholder="Telepon anda" required="required"
										style="width:100%;margin-bottom:10px;">

								</div>
							</div>
						</div>

						<div class="infaq-box">
							<div class="infaq-item">
								<div class="infaq-image text-center">

									<span>METODE PEMBAYARAN</span>
								</div>
							</div>
							<div class="payment-method">
								<label for="paymentSelect">Pilih Metode Pembayaran:</label>
								<select id="paymentSelect" name="paymentMethod" onchange="showNotification()">
									<option value=""></option>
									<option value="transfer">Pembayaran melalui (Bank & Dana)</option>
									<!-- Tambahkan opsi lainnya jika diperlukan -->
								</select>

							</div>
						</div>

						<!-- Kotak pemberitahuan -->
						<div id="notificationOverlay" class="notification-overlay">
							<p>Pembayaran Instan (Cepat & Mudah)</p>

							<!-- Pilihan bank dengan gambar -->
							<label for="bankSelect">Pilih pembayaran:</label>
							<select id="bankSelect" name="bankOption" onchange="showBankImage()">
								<option value="" data-image="" data-account="1234567890" selected disabled>Pilih salah satu
								</option>
								<?php while ($row = mysqli_fetch_assoc($wallet)): ?>
									<option value="<?= $row['id'] ?>" data-image="images/<?= $row['logo'] ?>"
										data-account="1234567890" data-paylink="proses_bayar.php">
										<?= $row['namaw'] ?>
									</option>

									<!-- Tambahkan opsi bank lainnya jika diperlukan -->
								<?php endwhile; ?>
							</select>

							<div id="bankImageContainer">
								<!-- Container untuk menampilkan gambar bank -->
								<img id="bankImage" src="" alt="Bank Logo">
							</div>

							<!-- Tombol untuk membayar sekarang dan dialihkan ke akun bank atau Dana -->
							<button type="submit">Bayar Sekarang</button>
						</div>

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

		<script>
			function toggleCustomAmount() {
				var customAmountContainer = document.getElementById("customAmountContainer");
				var donationnominal = document.getElementById("donationnominal");

				if (donationnominal.checked) {
					customAmountContainer.style.display = "block";
				} else {
					customAmountContainer.style.display = "none";
				}
			}
		</script>

		<script>
			function formatRupiah(angka) {
				var number_string = angka.replace(/[^,\d]/g, '').toString(),
					split = number_string.split(','),
					sisa = split[0].length % 3,
					rupiah = split[0].substr(0, sisa),
					ribuan = split[0].substr(sisa).match(/\d{3}/gi);

				// tambahkan titik jika yang diinput sudah lebih dari 3 digit
				if (ribuan) {
					separator = sisa ? '.' : '';
					rupiah += separator + ribuan.join('.');
				}

				rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
				return rupiah;
			}

			function updateNominal() {
				var inputNominal = document.getElementById('customAmount');
				var formattedNominal = formatRupiah(inputNominal.value);
				inputNominal.value = formattedNominal;
			}

			function showNotification() {
				var paymentSelect = document.getElementById("paymentSelect");
				var selectedOption = paymentSelect.options[paymentSelect.selectedIndex].value;

				if (selectedOption === "transfer") {
					document.getElementById("notificationOverlay").style.display = "block";
				} else {
					document.getElementById("notificationOverlay").style.display = "none";
				}
			}

			function hideNotification() {
				document.getElementById("notificationOverlay").style.display = "none";
			}
		</script>

		<script>
			function showBankImage() {
				var selectedBank = document.getElementById("bankSelect");
				var selectedImage = selectedBank.options[selectedBank.selectedIndex].getAttribute("data-image");
				document.getElementById("bankImage").src = selectedImage;
			}
		</script>

		<script>
			function payNow() {
				// Dapatkan informasi dari opsi yang dipilih
				var selectedOption = document.getElementById("bankSelect");
				var payLink = selectedOption.options[selectedOption.selectedIndex].getAttribute("data-paylink");

				// Redirect ke aplikasi Dana jika opsi pembayaran adalah Dana
				if (selectedOption.value === "dana") {
					window.location.href = "android-app://com.dana/launch?link=" + encodeURIComponent(payLink);
				} else {
					// Redirect ke link pembayaran bank dengan memasukkan nomor rekening
					var accountNumber = selectedOption.options[selectedOption.selectedIndex].getAttribute("data-account");
					window.location.href = payLink + "?account=" + accountNumber;
				}
			}
		</script>
	</body>

	</html>
<?php } ?>