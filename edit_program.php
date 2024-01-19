<?php
include "config.php";
session_start();
if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
} else {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM infaq where id=$id"));

    }
    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $nama = $_POST['namap'];
        $type = $_POST['type'];

        $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM infaq where id=$id"));

        if (!file_exists($_FILES['foto']['tmp_name']) || !is_uploaded_file($_FILES['foto']['tmp_name'])) {
            $foto = $row['foto'];
        } else {
            $foto = $_FILES['foto']['name'];

            move_uploaded_file($_FILES['foto']['tmp_name'], 'uploads/' . $foto);
            unlink('uploads/' . $row['foto']);
        }

        $query = mysqli_query($conn, "UPDATE infaq SET namap='$nama', foto='$foto',type='$type' WHERE id=$id");

        echo "<script>
alert('Edit data berhasil');
document.location.href='admin_program.php';
</script>";
    }
    ?>

    <!doctype html>
    <html lang="en">

    <head>
        <title>EDIT PROGRAM</title>
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

                <h1 style="text-align:center;" class="mb-4">Tambah Data Program</h1>

                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="submit">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <div class="row">
                        <div class="col-4">
                            <label for="">foto</label><br>
                            <img width="100" src="uploads/<?= $row['foto'] ?>" alt="">
                            <input type="file" name="foto" id="" class="form-control" accept="image/*">
                            <small class="text-info">abaikan apabila tidak ingin mengubah foto</small>
                        </div>
                        <div class="col-4">
                            <label for="">Nama</label>
                            <input type="text" class="form-control" required name="namap" value="<?= $row['namap'] ?>">
                        </div>
                        <div class="col-4">
                            <label for="">Kategori</label>
                            <select name="type" id="" class="form-control" required>

                                <option <?= $row['type'] == 'infaq' ? 'selected' : '' ?> value="infaq">Infaq</option>
                                <option <?= $row['type'] == 'infaq' ? 'selected' : '' ?> value="zakat">Zakat</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="mt-4 btn btn-primary">Simpan</button>
                </form>

            </div>
        </div>

        <script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
    </body>

    </html>
<?php } ?>