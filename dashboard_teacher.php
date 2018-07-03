<?php
session_start();
if ($_SESSION['dataLengkap']['type'] != 't') {
	$stringErrorA = "Akun anda tidak memiliki akses";
	$_SESSION['ErrPhpA'] = $stringErrorA;
	header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard <?php echo $_SESSION['dataLengkap']['name']?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script> 
	
	<link rel="stylesheet" type="text/css" href="lib/style/main_style.css">
</script>
</head>
<body class="container-fluid">
	<span class="badge badge-pill badge-info"><a href="index.php" class="paging">Home</a></span>
	<span class="badge badge-pill badge-info float-right"><a href="logoutAction.php" class="paging">Log Out</a></span>
	<h3 class="welcome-tag">Welcome <?php echo $_SESSION['dataLengkap']['name']?> <?php echo $_SESSION['dataLengkap']['lastname']?></h3>
	
	    <div class="row">
	      <div class="col-md-6 borders behind" style="margin-bottom: 20px;">
			  <div class="card" style="background-color: lightblue;">
			    <div class="card-body">
			      <h4 class="card-title">1. Membuat Soal</h4>
			      <p class="card-text">Fitur ini untuk membuat soal baru. anda bisa mengisi judul soal, jumlah soal. jenis soal yang bisa dibuat adalah pillihan ganda</p>
			      <a href="bikinSoal.php" class="btn btn-primary">Lanjut</a>
			    </div>
			    <img class="card-img-bottom paddingUntukImg" src="img/gambarTambahSoal.png" alt="Gambar Tambah Soal" style="width:100%;">
			  </div>
	      </div>
	      <div class="col-md-6 borders behind">
			  <div class="card" style="background-color: lightblue;">
			    <div class="card-body">
			      <h4 class="card-title">2. Daftar Soal</h4>
			      <p class="card-text">Fitur ini untuk menampilkan daftar soal yang pernah dibuat dan anda bisa menghapus soal-soal yang sudah pernah dibuat</p>
			      <a href="listSoalForTeacher.php" class="btn btn-primary">Lanjut</a>
			    </div>
			    <img class="card-img-bottom paddingUntukImg" src="img/gambarLiatSoalTeacher.png" alt="Card image" style="width:100%;">		
			  </div>
	      </div>
	    </div>
</body>
</html>