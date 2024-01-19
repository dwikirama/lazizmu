<?php  
include "config.php";
    session_start();
      if(!isset($_SESSION['login_user'])) {
        header("location: login.php");
      }else{

?>

<!doctype html>
<html lang="en">
  <head>
  	<title>TAMPILAN DATA KONSULTASI ONLINE</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/413d50620c.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/bootstrap2.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    

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
				display:block;
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
			<img src="https://lazismulumajang.org/wp-content/uploads/2021/07/lembaga-amil-zakat-infaq-infak-dan-sedekah-sadaqah-muhammadiyah-lumajang-logo-header4.png" alt="LUMAJANG"></a></h1>
    </div>
		
		<div class="wrapper d-flex align-items-stretch">
        <?php require_once 'Sidebar_Admin.php'; ?>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">

	  <h1 style="text-align:center;">Tampilan Data Konsultasi Online</h1>

<table class="table">
    <thead class="table-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Id Konsultasi Online</th>
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
<tbody>

<?php
if (isset($_GET['hapus'])) {
    $id_ko = $_GET['hapus'];
    if (!empty($id_ko)) {
    $sqlhapus = "DELETE FROM konsultasi_online where id_ko='$id_ko'";
    
    if ($conn->query($sqlhapus) === false) {
    trigger_error("Periksa Perintah SQL Manual Anda : " . $sqlhapus . "Error : " . $conn->error, E_USER_ERROR);
    }else {
    // echo "<meta http-equiv='refresh' content=0.1; url =? page=data-siswa>";
    }   
}
}
$no = 0;
$sql = "SELECT * FROM konsultasi_online order by id_ko DESC";
$hasil = $conn->query($sql);
if ($hasil === false) {
    trigger_error("SQL Manual Anda Salah : " . $sql . "Error : " . $conn->error, E_USER_ERROR);
    } else {
    while ($data = $hasil->fetch_array()) {
$no++;
?>

<tr>
    <td> <?php echo $no; ?></td>
    <td> <?php echo $data['id_ko']; ?></td>
    <td> <?php echo $data['nama']; ?></td>
    <td> <?php echo $data['email']; ?></td>
    <td>
    <!-- Button Aksi   -->
    <a href="?page=Tampilan_Data&hapus=<?php echo $data['id_ko']; ?>" class="btn btn-success btn-sm">
    Selesai
    </a>

    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#View<?php echo $data['id_ko']; ?>">
    View
    </button>

    <a href="?page=Tampilan_Data&hapus=<?php echo $data['id_ko']; ?>" class="btn btn-danger btn-sm">
    Hapus
    </a>

    <!-- Modal View -->
    <div class="modal fade" id="View<?php echo $data['id_ko']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title fw-bold text-white" id="exampleModalLabel">Data Konsultasi Online</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-4">
                        ID Konsultasi <br />
                        Nama <br />
                        No.Telepon/Hp <br />
                        Email <br />
                        Alamat <br />
                        Pertanyaan <br />
                        Saran <br />
                    </div>
                    <div class="col-sm-8">
                    : <?php echo $data['id_ko'] ?><br />
                    : <?php echo $data['nama'] ?><br />
                    : <?php echo $data['contact'] ?><br />
                    : <?php echo $data['email'] ?><br />
                    : <?php echo $data['alamat'] ?><br />
                    : <?php echo $data['question'] ?><br />
                    : <?php echo $data['answer'] ?><br />
                    </div>
                </div>
            </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-target="#exampleModalToggle2" data-toggle="modal">Answer</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <form action="" method="post">
    <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Answer Question</h1>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-4">
                        Nama <br />
                        Email <br />
                        Pertanyaan <br />
                    </div>
                    <div class="col-sm-8">
                    : <?php echo $data['nama'] ?><br />
                    : <?php echo $data['email'] ?><br />
                    : <?php echo $data['question'] ?><br />
                    </div>
                </div>    
                <div class="mb-3">
                    <label for="answer">Answer :</label>
				    <textarea class="form-control" id="answer" name="answer" ></textarea>
                </div>   
            </div>
        <div class="modal-footer">
            <input type="hidden" name="id_ko" value="<?php echo $data['id_ko']; ?>">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="balas">Save changes</button>
        </div>
        </div>
    </div>
    </div>
    </form>
    <?php
        if(isset($_POST["balas"])){
            $id_ko = $_POST["id_ko"];
            $answer = $_POST["answer"];

            $sql = "UPDATE konsultasi_online SET answer='$answer' where id_ko='$id_ko'";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo "<script> alert ('data telah berhasil di tambahkan'); window.location ='Tampilan_Data_KO.php' </script>"; 
            }
        }
        ?>
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