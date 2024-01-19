<?php
session_start();

if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
    exit();
} else {
    include('config.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];

    $gambar = $_FILES['gambar']['name'];
    $file_tmp = $_FILES['gambar']['tmp_name'];

    if ($gambar != "") {
        // Validasi ekstensi gambar
        $allowed_extensions = array('png', 'jpg', 'jpeg');
        $file_extension = strtolower(pathinfo($gambar, PATHINFO_EXTENSION));

        if (in_array($file_extension, $allowed_extensions)) {
            $upload_directory = 'uploads/';
            $random_number = rand(1, 999);
            $new_filename = $random_number . '-' . $gambar;
            $file_upload_path = $upload_directory . $new_filename;

            if (move_uploaded_file($file_tmp, $file_upload_path)) {
                // Menggunakan NOW() untuk tanggal saat melakukan INSERT
                $query = "INSERT INTO berita (judul, tanggal, isi, gambar) VALUES (?, NOW(), ?, ?)";
                $stmt = mysqli_prepare($conn, $query);

                mysqli_stmt_bind_param($stmt, "sss", $judul, $isi, $new_filename);

                if (mysqli_stmt_execute($stmt)) {
                    header("Location: daftar_berita.php");
                    exit();
                } else {
                    handle_sql_error($stmt, $conn); // Pass $stmt as an argument to handle_sql_error
                }
            } else {
                display_error("Gagal mengunggah file: Penyimpanan gambar gagal.");
            }
        } else {
            display_error("Ekstensi gambar yang diperbolehkan hanya jpg, jpeg, atau png.");
        }
    } else {
        display_error("Gambar tidak boleh kosong.");
    }
} else {
    header("Location: daftar_berita.php");
    exit();
}

function handle_sql_error($stmt, $conn) {
    display_error("Maaf, terjadi kesalahan pada sistem kami. Silakan coba lagi nanti.");
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

function display_error($message) {
    echo "<script>alert('$message');window.location='daftar_berita.php';</script>";
}
?>
