<?php
	session_start();
	
	if (isset($_SESSION['soalDipilih']) && isset($_GET['judul'])) {
		require 'pdo.php';
		$sql = "select * from soal inner join pertanyaan ON soal.id_soal=pertanyaan.id_soal where soal.judul = '".$_GET['judul']."'";
		$stmt = $pdo->query($sql);
		$rows = $stmt->fetchAll();
		foreach ( $rows as $row ) {
			$pertanyaan[] = $row['pertanyaan'];
			$jawaban[] = $row['jawaban'];
			$a[] = $row['choice1'];
			$b[] = $row['choice2'];
			$c[] = $row['choice3'];
			$d[] = $row['choice4'];
			$idsoal[] = $row['id_soal'];
		}
		$_SESSION['idSoal'] = $idsoal[0];
		$_SESSION['jawaban'] = $jawaban;

		require 'pdo.php';
		//MELAKUKAN PENGECEKAN APAKAH DATA SUDAH PERNAH DIISI
		$cek = "SELECT * FROM detail_soal WHERE id_client = '".$_SESSION['dataLengkap']['id']."' AND id_soal = '".$_SESSION['idSoal']."'";
		$cekq = $pdo->query($cek);
		$counterRow = $cekq->rowCount();
		//JIKA TIDAK ADA MAKA AKAN DITAMBAHKAN
		if ($counterRow < 1) {
			$sql = "INSERT INTO detail_soal (id_client, id_soal, waktu, score)
	           VALUES (:client, :soal, :waktu, :score)";
		    $stmt = $pdo->prepare($sql);
		    $stmt->execute(array(
		        ':client' => $_SESSION['dataLengkap']['id'],
		        ':soal' =>  $row['id_soal'],
		        ':waktu' => -1,
		        ':score' => -1
		        ));
		}

		function getWaktu(){
			require 'pdo.php';
			$cek1 = "SELECT * FROM detail_soal WHERE id_client = '".$_SESSION['dataLengkap']['id']."' AND id_soal = '".$_SESSION['idSoal']."'";
			$cekQuery = $pdo->query($cek1);
			$returnValue = $cekQuery->fetch();
			if ($returnValue['waktu'] == -1){
				return 30;
			} else {
				return $returnValue['waktu'];
			}
		}

		function isScored(){
			require 'pdo.php';
			$client = $_SESSION['dataLengkap']['id'];
			$cek1 = "SELECT * FROM detail_soal WHERE id_client = $client AND id_soal = '".$_SESSION['idSoal']."'";
			$cekQuery = $pdo->query($cek1);
			$returnValue1 = $cekQuery->fetch();
			if ($returnValue1['score'] > -1){
				return 0;
			} else {
				return 1;
			}
		}
?>
			<!DOCTYPE html>
			<html>
			<head>
				<title>TES</title>
				<meta charset="utf-8">
				<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script> 
				<link rel="stylesheet" type="text/css" href="lib/style/main_style.css">

				<!-- flipClock plugin -->
				<link rel="stylesheet" href="lib/flipclock.css">
				<script src="lib/flipclock.min.js"></script>	
				<script src="lib/flipclock.js"></script>	
				<script src="lib/factory.js"></script>	
				<script src="lib/base.js"></script>	
			</head>
			<body>
				<div class="container">
					<div class="clock"></div>
					<form id='form' action="submitAns.php" method="post">
						<?php
							for ($i=0; $i < sizeof($pertanyaan); $i++) { 
						?>
						<label name='soal[1]' class="form-control" rows="3" id="comment"><?php echo $pertanyaan[$i]?></label>
						<div class="form-check">
					      <label class="form-check-label" for="radio1" style="display: block;">
					        <input type="radio" class="form-check-input" name="optradio[<?php echo $i?>]" oninput="$(this).updateValue();">
					        <label name="valueRadio[<?php echo $i?>][]" class="form-control"><?php echo $a[$i]?>
					      </label>
					      <label class="form-check-label" for="radio2" style="display: block;">
					        <input type="radio" class="form-check-input" name="optradio[<?php echo $i?>]" oninput="$(this).updateValue();">
					        <label name="valueRadio[<?php echo $i?>][]" class="form-control"><?php echo $b[$i]?>
					      </label>
					      <label class="form-check-label" for="radio3" style="display: block;">
					        <input type="radio" class="form-check-input" name="optradio[<?php echo $i?>]" oninput="$(this).updateValue();">
					        <label name="valueRadio[<?php echo $i?>][]" class="form-control"><?php echo $c[$i]?>
					      </label>
					      <label class="form-check-label" for="radio4" style="display: block;">
					        <input type="radio" class="form-check-input" name="optradio[<?php echo $i?>]" oninput="$(this).updateValue();">
					        <label name="valueRadio[<?php echo $i?>][]" class="form-control"><?php echo $d[$i]?>
					      </label>
					    </div>
					    <br>
					    <?php
					    	}
					   	?>
					   	<button type="submit" id='btn-submit' class="btn btn-primary btn-block">SUBMIT</button>
				   	</form>
			   </div>
			</body>
				<script type="text/javascript">
					var clock;
					var lastTime
					var waktu = <?php echo getWaktu(); ?>;
					var isScored = <?php echo isScored(); ?>;
					$(document).ready(function() {		
						if (waktu == 0 || isScored == 0){
							<?php
								$string = "Soal telah dikerjakan";
								$_SESSION['ErrPhpD']=$string; 
							?>
							console.log("TES");
							window.location.href = "listSoalForStudent.php";
						} else {
							<?php unset($_SESSION['ErrPhpD']); ?>
							clock = $('.clock').FlipClock(waktu, {
								countdown: true,
								callbacks: {
						            stop: function() {
						               	document.getElementById('form').submit();
						               }
						           }
						       });
							$(window).on("unload", function(e) {
								clock.stop(function(){
									lastTime = clock.getTime().getTimeSeconds();
									waktu = Number(lastTime);
									window.location.href="updateWaktu.php?waktu="+waktu;
								});
							});		
							$.fn.updateValue = function() {
								$(this).val($.trim($(this).next().text()));
							};
						}
					});
				</script>
			</html>
		<?php
	}
	 else {
		$stringErrorC = "Silahkan Pilih Soal Terlebih Dahulu";
		$_SESSION['ErrPhpC'] = $stringErrorC;
		header("Location: listSoalForStudent.php");
	}
?>