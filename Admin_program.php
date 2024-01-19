<?php
include "config.php";
session_start();
if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
} else {

?>

    <!doctype html>
    <html lang="en">

    <head>
        <title>ADMIN PROGRAM</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script src="https://kit.fontawesome.com/413d50620c.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/bootstrap2.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>


        <style>
            body {
                font-family: 'Poppins', sans-serif;
                overflow-x: hidden;
                margin: 0;
                padding: 0;
            }

            .banner-container {
                overflow: hidden;
            }

            .banner {
                width: auto;
                height: auto;
                display: block;
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

        <div class="wrapper d-flex align-items-stretch">
            <?php require_once 'Sidebar_Admin.php'; ?>

            <!-- Page Content  -->
            <div id="content" class="p-4 p-md-5 pt-5">

                <h1 style="text-align:center;">Tampilan Data Program</h1>
                <a href="admin_program.php" class="btn btn-primary btn-sm mb-2">Tampilan Data Program</a>
                <a href="tampilan_data_donatur.php" class="btn btn-primary btn-sm mb-2 ml-2">Lihat Data Donatur</a><br>
                <a href="tambah_data_program.php" class="btn btn-primary btn-sm mb-2 ml-2">Tambah Data Program</a>
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>

                                <th scope="col">Foto</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Tipe Program</th>

                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            if (isset($_GET['hapus'])) {
                                $id = $_GET['hapus'];
                                if (!empty($id)) {
                                    $sqlhapus = "DELETE FROM infaq where id='$id'";

                                    if ($conn->query($sqlhapus) === false) {
                                        trigger_error("Periksa Perintah SQL Manual Anda : " . $sqlhapus . "Error : " . $conn->error, E_USER_ERROR);
                                    } else {
                                        // echo "<meta http-equiv='refresh' content=0.1; url =? page=data-siswa>";
                                    }
                                }
                            }
                            $no = 0;
                            $sql = "SELECT * FROM infaq ";
                            $hasil = $conn->query($sql);
                            if ($hasil === false) {
                                trigger_error("SQL Manual Anda Salah : " . $sql . "Error : " . $conn->error, E_USER_ERROR);
                            } else {
                                while ($data = $hasil->fetch_array()) {
                                    $no++;
                                    ?>

                                    <tr>
                                        <td>
                                            <?php echo $no; ?>
                                        </td>
                                        <td>
                                            <img width="100" src="uploads/<?php echo $data['foto']; ?>" alt="">

                                        </td>
                                        <td>
                                            <?php echo $data['namap']; ?>
                                        </td>
                                        <td>
                                            <?php echo $data['type']; ?>
                                        </td>

                                        <td class="d-flex flex-nowrap">
                                            <!-- Button Aksi   -->


                                            <form class="mr-2" action="" method="post"
                                                onclick="return confirm('Anda yakin?') ? this.submit() : false">
                                                <input type="hidden" name="delete" value="<?= $data['id'] ?>">
                                                <input type="hidden" name="foto" value="<?= $data['foto'] ?>">
                                                <a href="?page=Tampilan_Data&hapus=<?php echo $data['id']; ?>" class="btn btn-danger btn-sm">
                                                Hapus
                                            </a>
                                            </form>

                                            

                                            <a href="edit_program.php?id=<?php echo $data['id']; ?>" class="btn btn-warning btn-sm">
                                                Edit
                                            </a>





                                        </td>
                                    </tr>

                                <?php }
                            } ?>
                        </tbody>
                    </table>

            </div>
        </div>

        <script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
    </body>

    </html>
<?php } ?>