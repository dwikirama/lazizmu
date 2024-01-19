<?php
include('config.php');

$del = isset($_GET['del']) ? $_GET['del'] : '';
$jenis = isset($_GET['jenis']) ? $_GET['jenis'] : '';

// Handle delete operation
if (!empty($del) && !empty($jenis)) {
    $perintah2 = "SELECT * FROM $jenis WHERE id='$del'";
    $result = $conn->query($perintah2);

    if ($result) {
        $b = $result->fetch_assoc();
        
        $gambarPath = "images/" . $b['foto'];

        if (file_exists($gambarPath)) {
            if (unlink($gambarPath)) {
                $perintah1 = "DELETE FROM $jenis WHERE id='$del'";
                $del2 = $conn->query($perintah1);

                if ($del2) {
                    // Set notifikasi delete ke parameter URL
                    switch ($jenis) {
                        case 'badaneksekutif':
                            header("Location: lihatstrukturmanajemen.php?pesan=Gambar berhasil dihapus");
                            break;
                        case 'badanpengurus':
                            header("Location: lihatstrukturmanajemen2.php?pesan=Gambar berhasil dihapus");
                            break;
                        case 'badanpengawas':
                            header("Location: lihatstrukturmanajemen3.php?pesan=Gambar berhasil dihapus");
                            break;
                        case 'dewansyariah':
                            header("Location: lihatstrukturmanajemen4.php?pesan=Gambar berhasil dihapus");
                            break;
                        case 'penghargaan':
                            header("Location: lihatdatapenghargaan.php?pesan=Gambar berhasil dihapus");
                            break;
                        case 'kodedonasi':
                            header("Location: lihatqrkodedonasi.php?pesan=Gambar berhasil dihapus");
                            break;
                        default:
                            header("Location: lihatstrukturmanajemen.php?pesan=Gambar berhasil dihapus");
                    }
                    exit();
                } else {
                    switch ($jenis) {
                        case 'badaneksekutif':
                            header("Location: lihatstrukturmanajemen.php?pesan=Gagal menghapus data: " . $conn->error);
                            break;
                        case 'badanpengurus':
                            header("Location: lihatstrukturmanajemen2.php?pesan=Gagal menghapus data: " . $conn->error);
                            break;
                        case 'badanpengawas':
                            header("Location: lihatstrukturmanajemen3.php?pesan=Gagal menghapus data: " . $conn->error);
                            break;
                        case 'dewansyariah':
                            header("Location: lihatstrukturmanajemen4.php?pesan=Gagal menghapus data: " . $conn->error);
                            break;
                        case 'penghargaan':
                            header("Location: lihatdatapenghargaan.php?pesan=Gagal menghapus data: " . $conn->error);
                            break;
                        case 'kodedonasi':
                            header("Location: lihatqrkodedonasi.php?pesan=Gagal menghapus data: " . $conn->error);
                            break;
                        default:
                            header("Location: lihatstrukturmanajemen.php?pesan=Gagal menghapus data: " . $conn->error);
                    }
                    exit();
                }
            } else {
                switch ($jenis) {
                    case 'badaneksekutif':
                        header("Location: lihatstrukturmanajemen.php?pesan=Gagal menghapus gambar: Tidak dapat dihapus");
                        break;
                    case 'badanpengurus':
                        header("Location: lihatstrukturmanajemen2.php?pesan=Gagal menghapus gambar: Tidak dapat dihapus");
                        break;
                    case 'badanpengawas':
                        header("Location: lihatstrukturmanajemen3.php?pesan=Gagal menghapus gambar: Tidak dapat dihapus");
                        break;
                    case 'dewansyariah':
                        header("Location: lihatstrukturmanajemen4.php?pesan=Gagal menghapus gambar: Tidak dapat dihapus");
                        break;
                    case 'penghargaan':
                        header("Location: lihatdatapenghargaan.php?pesan=Gagal menghapus gambar: Tidak dapat dihapus");
                        break;
                    case 'kodedonasi':
                        header("Location: lihatqrkodedonasi.php?pesan=Gagal menghapus gambar: Tidak dapat dihapus");
                        break;
                    default:
                        header("Location: lihatstrukturmanajemen.php?pesan=Gagal menghapus gambar: Tidak dapat dihapus");
                }
                exit();
            }
        } else {
            $perintah1 = "DELETE FROM $jenis WHERE id='$del'";
            $del2 = $conn->query($perintah1);

            if ($del2) {
                switch ($jenis) {
                    case 'badaneksekutif':
                        header("Location: lihatstrukturmanajemen.php?pesan=Data berhasil dihapus (tanpa gambar)");
                        break;
                    case 'badanpengurus':
                        header("Location: lihatstrukturmanajemen2.php?pesan=Data berhasil dihapus (tanpa gambar)");
                        break;
                    case 'badanpengawas':
                        header("Location: lihatstrukturmanajemen3.php?pesan=Data berhasil dihapus (tanpa gambar)");
                        break;
                    case 'dewansyariah':
                        header("Location: lihatstrukturmanajemen4.php?pesan=Data berhasil dihapus (tanpa gambar)");
                        break;
                    case 'penghargaan':
                        header("Location: lihatdatapenghargaan.php?pesan=Data berhasil dihapus (tanpa gambar)");
                        break;
                    case 'kodedonasi':
                        header("Location: lihatqrkodedonasi.php?pesan=Data berhasil dihapus (tanpa gambar)");
                        break;
                    default:
                        header("Location: lihatstrukturmanajemen.php?pesan=Data berhasil dihapus (tanpa gambar)");
                }
                exit();
            } else {
                switch ($jenis) {
                    case 'badaneksekutif':
                        header("Location: lihatstrukturmanajemen.php?pesan=Gagal menghapus data: " . $conn->error);
                        break;
                    case 'badanpengurus':
                        header("Location: lihatstrukturmanajemen2.php?pesan=Gagal menghapus data: " . $conn->error);
                        break;
                    case 'badanpengawas':
                        header("Location: lihatstrukturmanajemen3.php?pesan=Gagal menghapus data: " . $conn->error);
                        break;
                    case 'dewansyariah':
                        header("Location: lihatstrukturmanajemen4.php?pesan=Gagal menghapus data: " . $conn->error);
                        break;
                    case 'penghargaan':
                        header("Location: lihatdatapenghargaan.php?pesan=Gagal menghapus data: " . $conn->error);
                        break;
                    case 'kodedonasi':
                        header("Location: lihatqrkodedonasi.php?pesan=Gagal menghapus data: " . $conn->error);
                        break;
                    default:
                        header("Location: lihatstrukturmanajemen.php?pesan=Gagal menghapus data: " . $conn->error);
                }
                exit();
            }
        }
    } else {
        switch ($jenis) {
            case 'badaneksekutif':
                header("Location: lihatstrukturmanajemen.php?pesan=Gagal koneksi: " . $conn->error);
                break;
            case 'badanpengurus':
                header("Location: lihatstrukturmanajemen2.php?pesan=Gagal koneksi: " . $conn->error);
                break;
            case 'badanpengawas':
                header("Location: lihatstrukturmanajemen3.php?pesan=Gagal koneksi: " . $conn->error);
                break;
            case 'dewansyariah':
                header("Location: lihatstrukturmanajemen4.php?pesan=Gagal koneksi: " . $conn->error);
                break;
            case 'penghargaan':
                header("Location: lihatdatapenghargaan.php?pesan=Gagal koneksi: " . $conn->error);
                break;
            case 'kodedonasi':
                header("Location: lihatqrkodedonasi.php?pesan=Gagal koneksi: " . $conn->error);
                break;
            default:
                header("Location: lihatstrukturmanajemen.php?pesan=Gagal koneksi: " . $conn->error);
        }
        exit();
    }
} else {
    // Jika parameter 'del' atau 'jenis' tidak ada, redirect ke halaman lain
    switch ($jenis) {
        case 'badanpengurus':
            header("location: lihatstrukturmanajemen2.php");
            break;
        case 'badanpengawas':
            header("location: lihatstrukturmanajemen3.php");
            break;
        case 'dewansyariah':
            header("location: lihatstrukturmanajemen4.php");
            break;
        case 'penghargaan':
            header("Location: lihatdatapenghargaan.php");
            break;
        case 'kodedonasi':
            header("Location: lihatqrkodedonasi.php");
            break;
        default:
            header("location: lihatstrukturmanajemen.php");
    }
    exit();
}

// Tutup koneksi
$conn->close();
?>
