<?php
include('config.php');

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $del = $_GET['id'];

    $query = "SELECT * FROM berita WHERE id='$del'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $b = mysqli_fetch_assoc($result);
        
        $gambarPath = "uploads/" . $b['gambar'];

        if (file_exists($gambarPath) && unlink($gambarPath)) {
            $deleteQuery = "DELETE FROM berita WHERE id='$del'";
            $deleteResult = mysqli_query($conn, $deleteQuery);

            if ($deleteResult) {
                header("Location: daftar_berita.php?pesan=Berita berhasil dihapus");
                exit();
            } else {
                header("Location: daftar_berita.php?pesan=Gagal menghapus data: " . mysqli_error($conn));
                exit();
            }
        } else {
            header("Location: daftar_berita.php?pesan=Gagal menghapus gambar: Tidak dapat dihapus");
            exit();
        }
    } else {
        header("Location: daftar_berita.php?pesan=Berita tidak ditemukan");
        exit();
    }
} else {
    header("Location: daftar_berita.php?pesan=ID Berita tidak valid");
    exit();
}

$conn->close();
?>
