<?php
session_start();

// Sisipkan file koneksi ke database setelah pengecekan sesi login
include('config.php');

// Memeriksa apakah pengguna telah login, jika belum, maka arahkan ke halaman login.php
if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
    exit(); // Pastikan untuk menghentikan eksekusi skrip setelah melakukan redirect
} else
    // Fetch the data from your database table 'berita'
    $result = $conn->query("SELECT * FROM berita");

// Check if data is retrieved successfully
if ($result && $result->num_rows > 0) {
    // Initialize an empty array to store the fetched data
    $berita = [];

    // Fetch each row and store it in the $berita array
    while ($row = $result->fetch_assoc()) {
        $berita[] = $row;
    }
} else {
    // If no data is found, set $berita as an empty array or handle the case accordingly
    $berita = [];




}


//   ini punyaknya adhika..... :)

function rupiah($angka)
{

    $hasil_rupiah = number_format($angka, 2, ',', '.');
    return $hasil_rupiah;

}
// mengambil data jumlah program
$jumlah_program = mysqli_query($conn, "SELECT * FROM infaq");
$tampil_jumlah_program = mysqli_num_rows($jumlah_program);


// mengambil data total dana tersalurkan
$total_dana = mysqli_query($conn, "SELECT SUM(nominal) AS total_dana FROM pembayaran");
$row_total_dana = mysqli_fetch_assoc($total_dana);
$tampil_total_dana = rupiah($row_total_dana['total_dana']);

// mengambil data donatur terdaftar
$donatur = mysqli_query($conn, "SELECT * FROM pembayaran");
$tampil_donatur = mysqli_num_rows($donatur);





?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Lazizmu Lumajang</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/413d50620c.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
            margin: 0;
            padding: 0;
            touch-action: manipulation;
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

        .swiper-container {
            width: 100%;
            height: 100%;
            position: relative;
            overflow: hidden;
        }

        .swiper-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .swiper-button-next,
        .swiper-button-prev {
            color: #fff;
            font-size: 18px;
        }

        .counters-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        .counter {
            text-align: center;
            margin: 20px auto;
            margin: 20px;
            font-size: 24px;
            flex: 1;
            max-width: 300px;
        }

        .counter-number {
            font-weight: bold;
        }

        .counter-title {
            margin-top: 10px;
            font-size: 16px;
            color: #000000;
        }

        .swiper-pagination {
            position: absolute;
            bottom: 20px;
            display: flex;
            justify-content: center;
            width: 100%;
        }

        .swiper-pagination-bullet {
            width: 8px;
            height: 8px;
            background-color: #000000;
            opacity: 0.7;
            margin: 0 5px;
            cursor: pointer;
        }

        .swiper-pagination-bullet-active {
            opacity: 1;
        }

        .lazismu-image {
            max-width: 100%;
            /* Gambar tidak boleh melebihi lebar container */
            height: auto;
            /* Menyesuaikan tinggi sesuai aspek rasio gambar */
            display: block;
            /* Menghindari margin bawah pada elemen inline */
        }

        .news-container {
            margin-top: 30px;
            text-align: center;
        }

        .news-container img {
            width: 100%;
            max-width: 600px;
            height: auto;
            margin-bottom: 20px;
        }

        .news-container h3 {
            color: #000000;
        }

        .read-more-btn {
            display: inline-flexbox;
            padding: 5px 20px;
            background-color: #a13dff;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
            transition: background-color 0.3s ease;
            text-align: center;
            align-items: center;
        }

        .read-more-btn:hover {
            background-color: rgb(255, 247, 30);
        }

        /* Menambahkan styling untuk grid gambar berita */
        .news-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            /* Membagi div menjadi 3 kolom dengan lebar yang sama */
            gap: 20px;
            /* Jarak antar kolom */
            margin-top: 30px;
        }

        .news-item {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .news-item img {
            width: 100%;
            height: auto;
            display: block;
        }

        .news-content {
            padding: 15px;
            position: absolute;
            bottom: 0;
            /* Sesuaikan dengan preferensi Anda */
            left: 0;
            width: 100%;
            background: rgba(255, 255, 255, 0.616);
            /* Warna latar belakang untuk memastikan teks terlihat */
            padding: 4px;
            box-sizing: border-box;
            transition: background 0.3s;
            /* Efek transisi untuk perubahan warna latar belakang */
            z-index: 2;
        }

        .news-content h3 {
            font-size: 14px;
        }

        .read-more {
            display: block;
            margin-top: 10px;
            padding: 6px;
            background-color: #3498db;
            color: #ffffff;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .read-more:hover {
            background-color: #ffffff;
        }

        /* Tampilan responsif untuk Android */
        @media only screen and (max-width: 600px) {
            .news-item {
                position: relative;
                overflow: hidden;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                margin-bottom: 10px;
                /* Tambahkan margin agar tidak rapat antar berita */
            }

            .news-content {
                position: static;
                width: auto;
                background: none;
                padding: 0;
                margin-top: 10px;
            }

            .news-content h3 {
                font-size: 13px;
                margin-bottom: 2%;
                /* Tambahkan margin agar tidak rapat dengan link */
            }

            .read-more {
                display: contents;
                text-align: center;
                color: #ff0000;
                text-decoration: none;
                margin-top: auto;
                font-size: 10px;
                transition: background-color 0.3s ease;
            }

            .read-more:hover {
                background-color: transparent;
            }
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
                <img src="https://lazismulumajang.org/wp-content/uploads/2021/07/lembaga-amil-zakat-infaq-infak-dan-sedekah-sadaqah-muhammadiyah-lumajang-logo-header4.png"
                    alt="LUMAJANG"></a></h1>
    </div>

    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="./images/apel-ambulan.jpg" alt="Gambar 1">
            </div>
            <div class="swiper-slide">
                <img src="./images/lazizmu2.jpg" alt="Gambar 2">
            </div>
            <div class="swiper-slide">
                <a href="qrkodedonasi.php">
                    <img src="./images/lazizmu3.jpg" alt="Gambar 3">
                </a>
            </div>
            <div class="swiper-slide">
                <img src="./images/lazismu4.jpg" alt="Gambar 3">
            </div>
            <div class="swiper-slide">
                <img src="./images/lazismu5.jpg" alt="Gambar 3">
            </div>
            <div class="swiper-slide">
                <img src="./images/lazismu6.jpg" alt="Gambar 3">
            </div>
            <div class="swiper-slide">
                <img src="./images/lazismu7.jpg" alt="Gambar 3">
            </div>
            <!-- Tambahkan gambar selanjutnya sesuai kebutuhan -->
        </div>
        <!-- Tombol navigasi -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <!-- Pagination -->
        <div class="swiper-pagination"></div>
    </div>

    <div class="counters-container">
        <div class="counter" data-duration="2000" data-to-value="35" data-from-value="0">
            <span class="counter-number-prefix"></span>
            <span class="counter-number">
                <?= $tampil_jumlah_program ?>
            </span>
            <span class="counter-number-suffix"></span>
            <div class="counter-title">Jumlah Program</div>
        </div>

        <div class="counter" data-duration="2000" data-to-value="1732647937" data-from-value="0" data-delimiter=".">
            <span class="counter-number-prefix">Rp</span>
            <span class="counter-number">
                <?= $tampil_total_dana ?>
            </span>
            <span class="counter-number-suffix"></span>
            <div class="counter-title">Total Dana Tersalurkan</div>
        </div>

        <div class="counter" data-duration="2000" data-to-value="2058" data-from-value="0">
            <span class="counter-number-prefix"></span>
            <span class="counter-number">
                <?= $tampil_donatur ?>
            </span>
            <span class="counter-number-suffix"></span>
            <div class="counter-title">Donatur Terdaftar</div>
        </div>
    </div>

    <div class="wrapper d-flex align-items-stretch">
        <?php require_once 'Sidebar_User.php'; ?>

        <!-- Berita Baru -->
        <div id="content" class="p-4 p-md-5 pt-5">
            <div class="news-container">
                <h2 class="mb-4">Berita Terbaru</h2>

                <!-- Grid Gambar Berita -->
                <div class="news-grid">
                    <?php
                    // Lakukan koneksi ke basis data
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "db_lazizmu";

                    // Membuat koneksi
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Periksa koneksi
                    if ($conn->connect_error) {
                        die("Koneksi gagal: " . $conn->connect_error);
                    }

                    // Query untuk mengambil berita terbaru dari basis data
                    $sql = "SELECT * FROM berita ORDER BY tanggal DESC LIMIT 6";
                    ; // Misalnya, ambil 6 berita terbaru
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Output data setiap baris
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="news-item">';
                            echo '<img src="uploads/' . $row['gambar'] . '" alt="' . $row['judul'] . '" style="max-width: 100%;">'; // Menambahkan style untuk gambar
                            echo '<div class="news-content">';
                            echo '<h3>' . $row['judul'] . '</h3>';
                            echo '<a href="view_berita.php?id=' . $row['id'] . '" class="read-more">Baca Selengkapnya »</a>';
                            echo '</div></div>';
                        }
                    } else {
                        echo "Tidak ada berita yang tersedia.";
                    }
                    $conn->close();
                    ?>
                </div>
                <div><a href="berita.php" class="read-more-btn">Berita Lainnya</a></div>
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
    <script src="counter.widget.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            autoplay: {
                delay: 3000,
            },
        });

    </script>

</body>

</html>