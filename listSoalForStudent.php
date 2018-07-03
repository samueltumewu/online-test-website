<?php 
	session_start();
	function alert($msg) {
	    echo "<script type='text/javascript'>alert('$msg');</script>";
	}

	if (isset($_SESSION['ErrPhpC'])) {
		alert($_SESSION['ErrPhpC']);
		unset($_SESSION['ErrPhpC']);
	}

	if (isset($_SESSION['ErrPhpD'])) {
		alert($_SESSION['ErrPhpD']);
		unset($_SESSION['ErrPhpD']);
	}

	if ($_SESSION['dataLengkap']['type'] != 's') {
		$stringErrorA = "Akun anda tidak memiliki akses";
		$_SESSION['ErrPhpA'] = $stringErrorA;
		header("Location: index.php");
	}
	if (isset($_SESSION['dataLengkap']['id'])) {
		$idClient = $_SESSION['dataLengkap']['id'];
		$score=array();
		$waktuSisa=array();
		require 'pdo.php';
		$sql = "select * from soal";
		$stmt = $pdo->query($sql);
		$rows = $stmt->fetchAll();
		foreach ( $rows as $row ) {
			$judul[] = $row['judul'];
			$jumlahSoal[] = $row['jumlah_soal'];

			require 'pdo.php';
			$sql1 = "select * from detail_soal where id_soal = ".$row['id_soal']." and id_client = ".$_SESSION['dataLengkap']['id'] ;
			$stmt1 = $pdo->query($sql1);
			$rows1 = $stmt1->fetch();
			array_push($score, $rows1['score']);
			array_push($waktuSisa, $rows1['waktu']);
		}
		?>
			<!DOCTYPE html>
			<html>
			<head>
				<title>Daftar Soal</title>
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
				<!-- jQuery library -->
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
				<!-- Popper JS -->
				<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
				<!-- Latest compiled JavaScript -->
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script> 
				<link rel="stylesheet" type="text/css" href="lib/style/main_style.css">
			</head>
			<body>
				<div class="container">
					<span class="badge badge-pill badge-info"><a href="index.php" class="paging">Home</a></span>
					>
					<span class="badge badge-pill badge-info"><a href="dashboard_student.php" class="paging">Dashboard</a></span>
					<span class="badge badge-pill badge-info float-right"><a href="logoutAction.php" class="paging">Log Out</a></span>
				  <h2>Tabel Daftar Soal</h2>
				  <p>klik soal untuk melihat lebih detail</p>            
				  <table class="table table-hover table-bordered">
				    <thead class="thead-light">
				      <tr>
				        <th>No.</th>
				        <th>Judul</th>
				        <th>Jumlah Soal</th>
				        <th>Score</th>
				        <th>Sisa Waktu</th>
				        <th>Status</th>
				      </tr>
				    </thead>
				    <tbody>
				    	<?php
				    		for ($i=0; $i < sizeof($judul); $i++) { 
				    	    $cek = false;
				    			$j = $i+1;
				    			echo "<tr>";
				    			echo "<td>$j</td>";
				    			echo "<td>$judul[$i]</td>";
				    			echo "<td>$jumlahSoal[$i]</td>";
				    			if ($score[$i]>-1){
				    				echo "<td>$score[$i]</td>";
				    			}else{
				    				echo "<td>-</td>";
				    			}
				    			if ($waktuSisa[$i]>-1 && $score[$i]<0){
				    				echo "<td>$waktuSisa[$i] detik</td>";
				    				$cek = true;
				    			}else{
				    				echo "<td>-</td>";
				    			}
				    			if ($score[$i]>-1){
				    				echo "<td>Telah Dikerjakan <img src='img/checkIcon.png'></td>";
				    			}else{
				    				if(!$cek)
				    					echo "<td>Belum dikerjakan <img src='img/crossIcon.png'></td>";
				    				else
				    					echo "<td>Belum Selesai <img src='img/warningIcon.png'></td>";
				    			}
				    			echo "</tr>";
				    		}
				    	?>
				    </tbody>
				  </table>
				</div>

				<script type="text/javascript">
					$(document).ready(function(){
						$('.table > tbody > tr').click(function() {
    						// alert($(this).children().eq(1).text());
    						var judulSoal = $(this).children().eq(1).text();
    						window.location.href="workPage.php?judul="+judulSoal;
    						<?php $_SESSION['soalDipilih']='y'?>
						});
					});
				</script>
			</body>
			</html>
		<?php
	}
	
?>