<?php
include "config.php";

if(isset($_POST["submit"])){
	$nama = $_POST["nama"];
	$contact = $_POST["contact"];
	$email = $_POST["email"];
	$alamat = $_POST["alamat"];
	$jenis_donasi = $_POST["jenis_donasi"];
	$jumlah_donasi = $_POST["jumlah_donasi"];
	$pickup_date = $_POST["pickup_date"];
	$pickup_time = $_POST["pickup_time"];

	$sql = "INSERT INTO jemput_donasi (nama,contact,email,alamat,jenis_donasi,jumlah_donasi,pickup_date,pickup_time) VALUES
	('$nama','$contact','$email','$alamat','$jenis_donasi','$jumlah_donasi','$pickup_date','$pickup_time')";

	$result = mysqli_query($conn, $sql);

	if ($result) {
		echo "<script> alert ('data telah berhasil di kirim'); window.location ='jemput_donasi.php' </script>"; 
	}
}
session_start();
      if(!isset($_SESSION['login_user'])) {
        header("location: login.php");
      }else{
?>


<!doctype html>
<html lang="en">
  <head>
  	<title>JEMPUT DONASI</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script src="https://kit.fontawesome.com/413d50620c.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="css/bootstrap2.min.css">
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
			
			.card-container {
			    display: flex;
			}

			.left {
			    flex: 1;
			    height: 480px;
			    background-color: #866ec7;
			}

			.right {
			    display: flex;
			    flex: 1;
			    height: 1000px;
			    background-color: #ffffff;
			    justify-content: center;
			    align-items: center;
			}

			.left {
			    display: flex;
			    flex: 1;
			    height: 1000px;
			    justify-content: center;
			    align-items: center;
			    color: #ffffff;
			}


			.left-container {
			    height: 50%;
			    width: 80%;
			    text-align: center;
			    line-height: 22px
			}

			.left p {
			    font-size: 0.9rem;
			}


			.right-container {
			    width: 70%;
			    height: 80%;
			    text-align: center;
			}

			input,
			textarea,
			select {
			    background-color: #eee;
			    border: none;
			    padding: 12px 15px;
			    margin: 8px 0;
			    width: 100%;
			    font-size: 0.8rem;
			    resize: none;
			}

			input:focus,
			textarea:focus,
			select:focus {
			    outline: 1px solid #00b4cf;
			}

			button {
			    border-radius: 20px;
			    border: 1px solid #00b4cf;
			    background-color: #00b4cf;
			    color: #ffffff;
			    font-size: 12px;
			    font-weight: bold;
			    padding: 12px 45px;
			    letter-spacing: 1px;
			    text-transform: uppercase;
			    transition: transform 80ms ease-out;
			    cursor: pointer;
			}

			button:hover {
			    opacity: 0.7;
			}

			textarea {
			    height: 90px;
			}


			/* responsive */

			@media only screen and (max-width: 600px){
			    .left {
			        display: none;
			    }

			    .lg-view {
			        display: none;
			    }
			}

			@media only screen and (min-width: 600px) {
			    .sm-view {
			        display: none;
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

		<div class="card-container">
            <div class="left">
                <div class="left-container">
                    <h3>Layanan Jemput Donasi Zakat, Infaq dan Sedekah bagi perorangan maupun perusahaan ini tersedia untuk wilayah Kabupaten Lumajang</h3>
                    <p>Kemudahan Anda dalam menunaikan zakat, infaq dan sedekah adalah kewajiban bagi kami. Lazismu Lumajang melalui Layanan Jemput Donasi akan menindaklanjuti atas permintaan penjemputan donasi Anda.</p>
                </div>
            </div>
            <div class="right">
                <div class="right-container">
                    <form action="" method="post">
                        <h2>Jemput Donasi</h2>
                        <label for="name">Nama Lengkap *</label>
        				<input type="text" id="name" name="nama" >
                        <label for="contact">Telepon / HP *</label>
        				<input type="text" id="contact" name="contact" >
        				<label for="email">Email</label>
        				<input type="email" id="email" name="email" >
                        <label for="address">Alamat *</label>
        				<input type="text" id="address" name="alamat" >
                        <label for="donation_type">Jenis Donasi *</label>
        				<select id="donation_type" name="jenis_donasi">
						  <option value="" disabled="disabled" selected></option>
						  <option value="infaq">Infaq</option>
						  <option value="sedekah">Sedekah</option>
						  <option value="kemanusian">Kemanusian</option>
						  <option value="zakat">Zakat</option>
						</select>
						<label for="donation_amount">Jumlah Donasi *</label>
        				<input type="text" id="donation_amount" name="jumlah_donasi" >
        				<label for="pickup_date">Tanggal Penjemputan *</label>
        				<input type="date" id="pickup_date" name="pickup_date">
        				<label for="pickup_time">Jam Penjemputan *</label>
        				<input type="time" id="pickup_time" name="pickup_time">
                        <button type="submit" name="submit">Kirim</button>
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
  </body>
</html>
<?php } ?>