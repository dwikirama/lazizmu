<?php
include('config.php');

$del = $_GET['del'];

$perintah2 = "SELECT * FROM badaneksekutif WHERE id='$del'";
$result = $conn->query($perintah2);

if ($result) {
    $b = $result->fetch_assoc();
    
    $gambarPath = "images/" . $b['foto'];

    if (file_exists($gambarPath)) {
        if (unlink($gambarPath)) {
            $perintah1 = "DELETE FROM badaneksekutif WHERE id='$del'";
            $del2 = $conn->query($perintah1);

            if ($del2) {
                // Set notifikasi delete ke parameter URL
                header("Location: lihatstrukturmanajemen.php?pesan=Gambar berhasil dihapus");
                exit();
            } else {
                header("Location: lihatstrukturmanajemen.php?pesan=Gagal menghapus data: " . $conn->error);
                exit();
            }
        } else {
            header("Location: lihatstrukturmanajemen.php?pesan=Gagal menghapus gambar: Tidak dapat dihapus");
            exit();
        }
    } else {
        $perintah1 = "DELETE FROM badaneksekutif WHERE id='$del'";
        $del2 = $conn->query($perintah1);

        if ($del2) {
            header("Location: lihatstrukturmanajemen.php?pesan=Data berhasil dihapus (tanpa gambar)");
            exit();
        } else {
            header("Location: lihatstrukturmanajemen.php?pesan=Gagal menghapus data: " . $conn->error);
            exit();
        }
    }
} else {
    header("Location: lihatstrukturmanajemen.php?pesan=Gagal koneksi: " . $conn->error);
    exit();
}

// Tutup koneksi
$conn->close();
?>
