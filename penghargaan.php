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
  	<title>PENGHARGAAN</title>
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
				text-align: center;
			}

			.logo img {
				width: 100px;
				height: auto;
				margin-right: 10px;
				}

			p {
				color: black;
			}

			/* Tambahkan ini ke dalam tag <style> */
			.lazismu-image {
    			max-width: 100%; /* Gambar tidak boleh melebihi lebar container */
    			height: 100%; /* Menyesuaikan tinggi sesuai aspek rasio gambar */
    			display: block; /* Menghindari margin bawah pada elemen inline */
    			margin: 0 auto; /* Agar gambar berada di tengah jika container lebih lebar */
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
			<h2 class="mb-4">Penghargaan</h2>

			<?php
			// Ambil data dari database
			$perintah = "SELECT * FROM penghargaan ORDER BY id ASC";
			$result = $conn->query($perintah);

			// Tampilkan data secara dinamis
			while ($data = $result->fetch_assoc()) {
			?>
				<img src="./images/<?php echo $data['foto']; ?>" alt="<?php echo $data['deskripsi']; ?>" class="img-fluid">
				<p><?php echo $data['deskripsi']; ?></p><br>
			<?php } ?>

			<div class="banner">
				<img src="./images/LAZISMU BAWAH.png" alt="Banner Image" class="lazismu-image">
			</div>
		</div>

  </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>