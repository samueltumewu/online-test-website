<?php 
	session_start();
	
	if ($_SESSION['dataLengkap']['type'] != 't') {
		$stringErrorA = "Akun anda tidak memiliki akses";
		$_SESSION['ErrPhpA'] = $stringErrorA;
		header("Location: index.php");
	}
	if (isset($_SESSION['dataLengkap']['id'])) {
		$idClient = $_SESSION['dataLengkap']['id'];
		require 'pdo.php';
		$sql = "select * from detail_soal inner join soal ON detail_soal.id_soal=soal.id_soal where detail_soal.id_client='".$idClient."'";
		$stmt = $pdo->query($sql);
		$rows = $stmt->fetchAll();
		foreach ( $rows as $row ) {
			$judul[] = $row['judul'];
			$jumlahSoal[] = $row['jumlah_soal'];
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
				<span class="badge badge-pill badge-info"><a href="dashboard_teacher.php" class="paging">Dashboard</a></span>
				<span class="badge badge-pill badge-info float-right"><a href="logoutAction.php" class="paging">Log Out</a></span>
				  <h2>Tabel Daftar Soal</h2>
				  <p>klik soal untuk melihat lebih detail</p>            
				  <table class="table table-hover table-bordered">
				    <thead class="thead-light">
				      <tr>
				        <th>No.</th>
				        <th>Judul</th>
				        <th>Jumlah Soal</th>
				      </tr>
				    </thead>
				    <tbody>
				    	<?php
				    		if(isset($judul)){
				    			for ($i=0; $i < sizeof($judul); $i++) { 
				    				$j = $i+1;
				    				echo "<tr>";
				    				echo "<td>$j</td>";
				    				echo "<td>$judul[$i]</td>";
				    				echo "<td>$jumlahSoal[$i]</td>";
				    				echo "</tr>";
				    			}
				    		}
				    	?>
				    </tbody>
				  </table>
				  <div id="txtHint"></div>
				</div>

				<script type="text/javascript">
					function go(x){
						var xmlhttp = new XMLHttpRequest();
						xmlhttp.onreadystatechange = function() {
							if (this.readyState == 4 && this.status == 200) {
								document.getElementById("txtHint").innerHTML = this.responseText;
							}
						};
						xmlhttp.open("GET", "getdetail.php?q=" + x, true);
						xmlhttp.send();
					}
					$(document).ready(function(){
						var judul;
						$('.table > tbody > tr').click(function() {
    						judul = $(this).children().eq(1).text();
    						go(judul);
						});
					});

				</script>
			</body>
			</html>
		<?php
	}
	
?>