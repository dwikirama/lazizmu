<?php 
include 'config.php';

session_start();
      if(!isset($_SESSION['login_user'])) {
        header("location: login.php");
      }else{

$visi_misi = mysqli_real_escape_string($conn, isset($_POST['visi_misi']) ? $_POST['visi_misi'] : '');
$query = mysqli_query($conn, "UPDATE tbl_visi_misi SET visi_misi = '$visi_misi' WHERE id = 1");

if($query){
	$_SESSION['sukses'] = 'Visi Misi Berhasil Diubah!';
	header('Location: Admin_visi-misi.php');
} else {
	$_SESSION['gagal'] = 'Visi Misi Gagal Diubah!';
	header('Location: Admin_visi-misi.php');
}
 } ?>