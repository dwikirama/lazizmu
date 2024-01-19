<?php
//Include file koneksi ke database
include "config.php";

if(isset($_POST["submit-daftar"])){
//menerima nilai dari kiriman form pendaftaran
$username=$_POST["username"];
$nama_lengkap=$_POST["nama_lengkap"];
$email=$_POST["email"]; 
$password=$_POST["password"]; 
$cpassword=$_POST["cpassword"]; 
$status=$_POST["status"];



	if ($password==$cpassword)
	{
		//Menginput data ke tabel
		$hasil=mysqli_query($conn, "INSERT INTO akun (username, nama_lengkap, email, password, status) 
		VALUES('$username', '$nama_lengkap', '$email', '".md5($password)."', '$status')");

		//Kondisi apakah berhasil atau tidak
			if ($hasil) 
			{
				echo "<script>
							alert('Anda Berhasil Registrasi !');
							document.location='login.php';
					</script>";
			}
			else 
			{
				echo "<script>
							alert('Registrasi Anda Gagal !');
							document.location='register.php';
					</script>";
			}
	}
	else 
		{
		echo "<script>
			alert('Password tidak cocok !');
			document.location='register.php';
		</script>";
		}
}
?>



