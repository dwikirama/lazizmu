<?php
include 'config.php';

$infaq_id = $_POST['infaq_id'];
$nama = $_POST['nama'];
$telepon = $_POST['telepon'];
$nominal = $_POST['nominal'];
$wallet_id = $_POST['bankOption'];

// insert pembayaran
$pembayaran = mysqli_query($conn, "INSERT INTO pembayaran VALUES ('','$nama','$telepon','$nominal','$infaq_id','$wallet_id')");

echo "<script>
alert('Donasi Anda telah berhasil...Terima Kasih');
document.location.href='dns-infaq.php?id=" . $infaq_id . "';
</script>";
?>