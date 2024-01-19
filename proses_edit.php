<?php
session_start();
include('config.php');

if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_berita = $_POST['id_berita'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];

    // Menangani gambar yang diunggah
    if ($_FILES['gambar']['name'] !== "") {
        $gambar = $_FILES['gambar']['name'];
        $temp = $_FILES['gambar']['tmp_name'];

        $upload_dir = "uploads/";
        move_uploaded_file($temp, $upload_dir . $gambar);

        $query = "UPDATE berita SET judul=?, isi=?, gambar=? WHERE id=?";
        $stmt = mysqli_prepare($conn, $query);

        mysqli_stmt_bind_param($stmt, "sssi", $judul, $isi, $gambar, $id_berita);
    } else {
        $query = "UPDATE berita SET judul=?, isi=? WHERE id=?";
        $stmt = mysqli_prepare($conn, $query);

        mysqli_stmt_bind_param($stmt, "ssi", $judul, $isi, $id_berita);
    }

    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        header("location: daftar_berita.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
