<nav id="sidebar">
				<div class="custom-menu"></div>
				<div class="p-4 pt-5">
		  		<h1><a href="index.php" class="logo" style="font-size: xx-large;"><img src="" alt="">LAZISMU LUMAJANG</a></h1>
	        <ul class="list-unstyled components mb-5">
			<li>
				<a><i class="fa-solid fa-user-tie" style="color: #ffffff; padding: 5px;"></i><?php echo  $_SESSION['login_user']; ?></a>
			</li>
	          <li class="active">
				<a href="beranda.php">Beranda</a>
	            <a href="#tentangkamiSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> Tentang Kami</a>
	            <ul class="collapse list-unstyled" id="tentangkamiSubmenu">
                <li>
                    <a href="Admin_profil-lembaga.php">Profil Lembaga</a>
                </li>
                <li>
                    <a href="Admin_visi-misi.php">Visi & Misi</a>
                </li>
                <li>
                    <a href="lihatstrukturmanajemen.php">Struktur Manajemen</a>
                </li>
				<li>
					<a href="lihatdatapenghargaan.php">Penghargaan</a>
				</li>
				<li>
					<a href="kantor_layanan.html">Kantor Layanan</a>
				</li>
	            </ul>
	          </li>
	          <li>
	              <a href="admin_program.php">Program</a>
	          </li>
	          <li>
              <a href="#layananSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Layanan</a>
              <ul class="collapse list-unstyled" id="layananSubmenu">
                <li>
                    <a href="Tampilan_Data_JD.php">Jemput Donasi</a>
                </li>
				<li>
                    <a href="Tampilan_Data_KO.php">Konsultasi Online</a>
                </li>
				<li>
                    <a href="lihatqrkodedonasi.php">QR Code Donasi</a>
                </li>
              </ul>
	          </li>
	          <li>
				<a href="daftar_berita.php">Berita</a>
			</li>
			</li>
			<li>
			  <a href="lihatdatakontak.php">Contact</a>
	        </li>
			<li>
			  <a href="logout.php">Logout</a>
	        </li>
	        </ul>

	        <div class="mb-5">
		        <div class="social_media">
		          <a href="https://www.facebook.com/lazismulumajangorg"><i class="fab fa-facebook-f"></i></a>
		          <a href="https://twitter.com/LAZISMU"><i class="fab fa-twitter"></i></a>
		          <a href="https://www.instagram.com/lazismulumajang"><i class="fab fa-instagram"></i></a>
		        </div>
			</div>

	        <div class="footer">
	        	<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
	        </div>
	      </div>
    	</nav>