<?php
require('config.php');
session_start();
if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
}
?>

<!doctype html>
<html lang="en">
  <head>
  	<title>BADAN PENGAWAS</title>
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

			.organizational-structure {
				display: flex;
				justify-content: space-between;
				max-width: 600px; /* Sesuaikan dengan lebar yang diinginkan */
				margin: auto;
			}
			
			.organizational-structure a {
				text-decoration: none;
				color: #000;
				padding: 10px;
			}

			.organizational-structure a:hover {
				background-color: rgb(40, 20, 129);
				color: #ffffff;
			}
			
			/* Hapus semua properti lain pada .organizational-structure a */
			

			/* Style untuk tombol Badan Eksekutif */
			.executive-btn {
    			background-color: none;
    			color: #ffffff;
				transition: transform 0.3s;
			}

			.executive-btn:hover {
				transform: scale(1.2);
			}

			/* Style untuk tombol Badan Pengurus */
			.management-btn {
    			background-color: none;
    			color: #ffffff;
				transition: transform 0.3s;
			}

			.management-btn:hover {
				transform: scale(1.2);
			}

			/* Style untuk tombol Badan Pengawas */
			.supervisory-btn {
    			background-color: none;
    			color: #ffffff;
				transition: transform 0.3s;
			}

			.supervisory-btn:hover {
				transform: scale(1.2);
			}

			/* Style untuk tombol Dewan Syariah */
			.sharia-council-btn {
    			background-color: none;
    			color: #ffffff;
				transition: transform 0.3s;
			}

			.sharia-council-btn:hover {
				transform: scale(1.2);
			}

			.management-section {
				display: flex;
				flex-wrap: wrap;
				justify-content: space-between;
				align-items: center;
				max-width: 800px;
				margin: auto;
				margin-top: 20px;
			}
	
			.management-item {
				text-align: center;
				width: 30%; /* Sesuaikan lebar gambar dan teks */
				margin-bottom: 20px;
			}
	
			.management-img {
				width: 100%;
				height: auto;
				border-radius: 50%;
				border-color: bisque;
			}
	
			.management-name {
				margin-top: 10px;
				font-weight: bold;
			}

	
		@media (max-width: 600px) {
			.organizational-structure {
				display: flex;
				justify-content: space-between;
				max-width: 600px; /* Sesuaikan dengan lebar yang diinginkan */
				margin: auto;
			}
				
			.organizational-structure a {
				text-decoration: none;
				color: #000;
				padding: 10px;
			}
	
			.organizational-structure a:hover {
				background-color: rgb(40, 20, 129);
				color: #ffffff;
			}

				/* Style untuk tombol Badan Eksekutif */
			.executive-btn {
    			background-color: none;
    			color: #ffffff;
				transition: transform 0.3s;
			}

			.executive-btn:hover {
				transform: scale(1.2);
			}

			/* Style untuk tombol Badan Pengurus */
			.management-btn {
    			background-color: none;
    			color: #ffffff;
				transition: transform 0.3s;
			}

			.management-btn:hover {
				transform: scale(1.2);
			}

			/* Style untuk tombol Badan Pengawas */
			.supervisory-btn {
    			background-color: none;
    			color: #ffffff;
				transition: transform 0.3s;
			}

			.supervisory-btn:hover {
				transform: scale(1.2);
			}

			/* Style untuk tombol Dewan Syariah */
			.sharia-council-btn {
    			background-color: none;
    			color: #ffffff;
				transition: transform 0.3s;
			}

			.sharia-council-btn:hover {
				transform: scale(1.2);
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
		<?php require_once 'Sidebar_User.php'; ?>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
		<div class="organizational-structure">
			<a href="badan_eksekutif.php" class="executive-btn" onmouseover="zoomIn(this)" onmouseout="zoomOut(this)">Badan Eksekutif</a>
			<a href="badan_pengurus.php" class="management-btn" onmouseover="zoomIn(this)" onmouseout="zoomOut(this)">Badan Pengurus</a>
			<a href="badan_pengawas.php" class="supervisory-btn" onmouseover="zoomIn(this)" onmouseout="zoomOut(this)">Badan Pengawas</a>
			<a href="dewan_syariah.php" class="sharia-council-btn" onmouseover="zoomIn(this)" onmouseout="zoomOut(this)">Dewan Syariah</a>
		</div>

		<div class="management-section">
			<?php
			$perintah_pengurus = "SELECT * FROM badanpengawas";
			$result_pengurus = $conn->query($perintah_pengurus);
		
			while ($data_pengurus = $result_pengurus->fetch_assoc()) {
			?>
				<div class="management-item">
					<img src="./images/<?php echo $data_pengurus['foto']; ?>" alt="<?php echo $data_pengurus['nama']; ?>" class="management-img">
					<div class="management-name"><?php echo $data_pengurus['nama']; ?>
						<p><?php echo $data_pengurus['jabatan']; ?></p>
					</div>
				</div>
			<?php
			}
			?>
		</div>
	</div>
  </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
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