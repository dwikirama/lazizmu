<?php  
    session_start();
      if(!isset($_SESSION['login_user'])) {
        header("location: login.php");
      }else{

?>
<!doctype html>
<html lang="en">
  <head>
  	<title>KANTOR LAYANAN</title>
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
		<h2 class="mb-4">Kantor Layanan</h2>
		<div class="map-container"><img src="./images/kantor layanan.png" alt="Logo" id="map-image">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.682929714507!2d113.22884789999999!3d-8.1337263!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd667e8a70b59b7%3A0x60194722bdab9e1e!2sLazismu%20Lumajang!5e0!3m2!1sid!2sid!4v1700368164395!5m2!1sid!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>"></iframe>"></iframe>
			<div id="location-info">
				<p><strong>Kecamatan Lumajang</strong></p>
				<p>Jl. Brantas No.36, Jogoyudan</p>
				<p>Telp/WA: 0852-3779-3434</p>
				<p>G-Maps: <a href="https://g.page/lazismulumajang" target="_blank">g.page/lazismulumajang</a></p>

			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.682929714507!2d113.22884789999999!3d-8.1337263!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd667e8a70b59b7%3A0x60194722bdab9e1e!2sLazismu%20Lumajang!5e0!3m2!1sid!2sid!4v1700368503681!5m2!1sid!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			<div id="location-info">
				<p><strong>Kecamatan Senduro</strong></p>
				<p>Jl. PB. Sudirman No.66, Senduro</p>
				<p>Telp/WA: 0857-5580-6620</p>
				<p>G-Maps: <a href="https://g.page/lazismusenduro" target="_blank">g.page/lazismusenduro</a></p>

			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126366.3245933473!2d112.96414799726561!3d-8.208020200000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6691d8f8b6a27%3A0xca17aed4f9717c5a!2sLembaga%20Amil%20Zakat%20Nasional%3A%20Kantor%20Layanan%20Lazismu%20Pasirian!5e0!3m2!1sid!2sid!4v1700369040945!5m2!1sid!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			<div id="location-info">
				<p><strong>Kecamatan Pasirian</strong></p>
				<p>Jl. Raya Pasirian No.58, Pasirian</p>
				<p>Telp/WA: 0823-3155-5368</p>
				<p>G-Maps: <a href="https://g.page/lazismupasirian" target="_blank">g.page/lazismupasirian</a></p>

			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.682929714507!2d113.22884789999999!3d-8.1337263!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd667e8a70b59b7%3A0x60194722bdab9e1e!2sLazismu%20Lumajang!5e0!3m2!1sid!2sid!4v1700368164395!5m2!1sid!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>"></iframe>"></iframe>
			<div id="location-info">
				<p><strong>Kecamatan Tempeh</strong></p>
				<p>Jl. Raya Besuk No.124, Tempeh</p>
				<p>Telp/WA: 0852-3308-7374</p>
				<p>G-Maps: <a href="https://g.page/lazismutempeh" target="_blank">g.page/lazismutempeh</a></p>

			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.5878513374673!2d113.17951597511335!3d-8.143370991886748!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd66914ac0a6d0d%3A0x89bc035b09f43c17!2sLembaga%20Amil%20Zakat%20Nasional%3A%20Kantor%20Layanan%20Lazismu%20Sumbersuko!5e0!3m2!1sid!2sid!4v1700369352498!5m2!1sid!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			<div id="location-info">
				<p><strong>Kecamatan Sumbersuko</strong></p>
				<p>Jl. Semeru No.101, Desa Purwosono</p>
				<p>Telp/WA: -</p>
				<p>G-Maps: <a href="https://g.page/lazismusumbersuko" target="_blank">g.page/lazismusumbersuko</a></p>

			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3950.2142431755797!2d113.1265572751127!3d-8.079619691948558!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6438bbcabbd5d%3A0xb2dd2b9462ad4dbb!2sLembaga%20Amil%20Zakat%20Nasional%3A%20Kantor%20Layanan%20Lazismu%20Gucialit!5e0!3m2!1sid!2sid!4v1700369696774!5m2!1sid!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			<div id="location-info">
				<p><strong>Kecamatan Gucialit</strong></p>
				<p>Gucialit</p>
				<p>Telp/WA: 0813-5828-5979</p>
				<p>G-Maps: <a href="https://g.page/lazismugucialit" target="_blank">g.page/lazismugucialit</a></p>
				
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63186.57045634373!2d112.99806054863281!3d-8.1865664!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd66b3a7de1db81%3A0x74869535d6ee4ced!2sLembaga%20Amil%20Zakat%20Nasional%3A%20Kantor%20Layanan%20Lazismu%20Candipuro!5e0!3m2!1sid!2sid!4v1700369910852!5m2!1sid!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			<div id="location-info">
				<p><strong>Kecamatan Candipuro</strong></p>
				<p>Candipuro</p>
				<p>Telp/WA: 0813-3138-9575</p>
				<p>G-Maps: <a href="https://g.page/lazismucandipuro" target="_blank">g.page/lazismucandipuro</a></p>

			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.682929714507!2d113.22884789999999!3d-8.1337263!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd667e8a70b59b7%3A0x60194722bdab9e1e!2sLazismu%20Lumajang!5e0!3m2!1sid!2sid!4v1700368164395!5m2!1sid!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>"></iframe>"></iframe>
			<div id="location-info">
				<p><strong>Kecamatan Jatiroto</strong></p>
				<p>Jatiroto</p>
				<p>Telp/WA: 0815-5200-016</p>
				<p>G-Maps: <a href="https://g.page/lazismujatiroto" target="_blank">g.page/lazismujatirojo</a></p>
			
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.682929714507!2d113.22884789999999!3d-8.1337263!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd667e8a70b59b7%3A0x60194722bdab9e1e!2sLazismu%20Lumajang!5e0!3m2!1sid!2sid!4v1700368164395!5m2!1sid!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>"></iframe>"></iframe>
			<div id="location-info">
				<p><strong>Kecamatan Tempursari</strong></p>
				<p>Tempursari</p>
				<p>Telp/WA: 0852-3049-0401</p>
				<p>G-Maps: <a href="https://g.page/lazismutempursari" target="_blank">g.page/lazismutempursari</a></p>

			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.682929714507!2d113.22884789999999!3d-8.1337263!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd667e8a70b59b7%3A0x60194722bdab9e1e!2sLazismu%20Lumajang!5e0!3m2!1sid!2sid!4v1700368164395!5m2!1sid!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>"></iframe>"></iframe>
			<div id="location-info">
				<p><strong>Kecamatan Yosowilangun</strong></p>
				<p>Yosowilangun</p>
				<p>Telp/WA: 0823-0173-5793</p>
				<p>G-Maps: <a href="https://g.page/lazismuyosowilangun" target="_blank">g.page/lazismuyosowilangun</a></p>

			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.05105437219!2d113.33175649678955!3d-8.1976119!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd66154c5cd7abb%3A0x5fa76eed14bf7a2b!2sLembaga%20Amil%20Zakat%20Nasional%3A%20Kantor%20Layanan%20Lazismu%20Rowokangkung!5e0!3m2!1sid!2sid!4v1700370608481!5m2!1sid!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			<div id="location-info">
				<p><strong>Kecamatan Rowokangkung</strong></p>
				<p>Jl. Mayjen Soekertijo, Sidorejo</p>
				<p>Telp/WA: 0852-3020-0023</p>
				<p>G-Maps: <a href="https://g.page/lazismurowokangkung" target="_blank">g.page/lazismurowokangkung</a></p>

			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.682929714507!2d113.22884789999999!3d-8.1337263!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd667e8a70b59b7%3A0x60194722bdab9e1e!2sLazismu%20Lumajang!5e0!3m2!1sid!2sid!4v1700368503681!5m2!1sid!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			<div id="location-info">
				<p><strong>Kecamatan Kunir</strong></p>
				<p>Kunir</p>
				<p>Telp/WA: 0813-3614-1891</p>
				<p>G-Maps: <a href="https://g.page/lazismukunir" target="_blank">g.page/lazismukunir</a></p>

			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.682929714507!2d113.22884789999999!3d-8.1337263!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd667e8a70b59b7%3A0x60194722bdab9e1e!2sLazismu%20Lumajang!5e0!3m2!1sid!2sid!4v1700368503681!5m2!1sid!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			<div id="location-info">
				<p><strong>Kecamatan Padang</strong></p>
				<p>Padang</p>
				<p>Telp/WA: 0853-3424-1854</p>
				<p>G-Maps: <a href="https://g.page/lazismupadang" target="_blank">g.page/lazismupadang</a></p>

			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.682929714507!2d113.22884789999999!3d-8.1337263!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd667e8a70b59b7%3A0x60194722bdab9e1e!2sLazismu%20Lumajang!5e0!3m2!1sid!2sid!4v1700368503681!5m2!1sid!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			<div id="location-info">
				<p><strong>Kecamatan Padang</strong></p>
				<p>Kedungjajang</p>
				<p>Telp/WA: 0813-5613-15139</p>
				<p>G-Maps: <a href="https://g.page/lazismukedungjajang" target="_blank">g.page/lazismukedungjajang</a></p>

			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.682929714507!2d113.22884789999999!3d-8.1337263!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd667e8a70b59b7%3A0x60194722bdab9e1e!2sLazismu%20Lumajang!5e0!3m2!1sid!2sid!4v1700368503681!5m2!1sid!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			<div id="location-info">
				<p><strong>Kecamatan Klakah</strong></p>
				<p>Klakah</p>
				<p>Telp/WA: -</p>
				<p>G-Maps: <a href="https://g.page/lazismuklakah" target="_blank">g.page/lazismuklakah</a></p>

			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1011097.177240576!2d111.96259434042808!3d-8.142306713710681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd651b7a41e58b5%3A0x7c08e1f8d71f2758!2sLembaga%20Amil%20Zakat%20Nasional%3A%20Kantor%20Layanan%20Lazismu%20Ranuyoso!5e0!3m2!1sid!2sid!4v1700371352495!5m2!1sid!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			<div id="location-info">
				<p><strong>Kecamatan Ranuyoso</strong></p>
				<p>Klakah</p>
				<p>Telp/WA: 0852-3779-3434</p>
				<p>G-Maps: <a href="https://g.page/lazismuranuyoso" target="_blank">g.page/lazismuranuyoso</a></p>

			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.682929714507!2d113.22884789999999!3d-8.1337263!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd667e8a70b59b7%3A0x60194722bdab9e1e!2sLazismu%20Lumajang!5e0!3m2!1sid!2sid!4v1700368503681!5m2!1sid!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			<div id="location-info">
				<p><strong>Kecamatan Randuagung</strong></p>
				<p>Randuagung</p>
				<p>Telp/WA: -</p>
				<p>G-Maps: <a href="https://g.page/lazismuranduagung" target="_blank">g.page/lazismuranduagung</a></p>

			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.682929714507!2d113.22884789999999!3d-8.1337263!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd667e8a70b59b7%3A0x60194722bdab9e1e!2sLazismu%20Lumajang!5e0!3m2!1sid!2sid!4v1700368503681!5m2!1sid!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			<div id="location-info">
				<p><strong>Kecamatan Tekung</strong></p>
				<p>Tekung</p>
				<p>Telp/WA: -</p>
				<p>G-Maps: <a href="https://g.page/lazismutekung" target="_blank">g.page/lazismutekung</a></p>

			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.682929714507!2d113.22884789999999!3d-8.1337263!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd667e8a70b59b7%3A0x60194722bdab9e1e!2sLazismu%20Lumajang!5e0!3m2!1sid!2sid!4v1700368503681!5m2!1sid!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			<div id="location-info">
				<p><strong>Kecamatan Sukodono</strong></p>
				<p>Sukodono</p>
				<p>Telp/WA: -</p>
				<p>G-Maps: <a href="https://g.page/lazismusukodono" target="_blank">g.page/lazismusukodono</a></p>

			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.682929714507!2d113.22884789999999!3d-8.1337263!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd667e8a70b59b7%3A0x60194722bdab9e1e!2sLazismu%20Lumajang!5e0!3m2!1sid!2sid!4v1700368503681!5m2!1sid!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			<div id="location-info">
				<p><strong>Kecamatan Pronojiwo</strong></p>
				<p>Pronojiwo</p>
				<p>Telp/WA: -</p>
				<p>G-Maps: <a href="https://g.page/lazismupronojiwo" target="_blank">g.page/lazismupronojiwo</a></p>

			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.682929714507!2d113.22884789999999!3d-8.1337263!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd667e8a70b59b7%3A0x60194722bdab9e1e!2sLazismu%20Lumajang!5e0!3m2!1sid!2sid!4v1700368503681!5m2!1sid!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			<div id="location-info">
				<p><strong>Kecamatan Pasrujambe</strong></p>
				<p>Pasrujambe</p>
				<p>Telp/WA: -</p>
				<p>G-Maps: <a href="https://g.page/lazismupasrujambe" target="_blank">g.page/lazismupasrujambe</a></p>
				  </div>
			  </div>
			<div>

			</div>
		</div>

        <h2 class="mb-4"></h2>
        <p></p>
        <p></p>
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
<?php } ?>