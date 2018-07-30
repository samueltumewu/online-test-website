	<?php 
	session_start();
	function alert($msg) {
	    echo "<script type='text/javascript'>alert('$msg');</script>";
	}
	require 'pdo.php';
	$soal = $_SESSION['idSoal'];
    $sql = "select jumlah_soal from soal WHERE id_soal = $soal";
    $stmt = $pdo->query($sql);
    $jumlahSoal = $stmt->fetch()['jumlah_soal'];

	$score = 0;
	if (isset($_POST['optradio'])) {
		alert("TES");
		foreach ($_POST['optradio'] as $key => $value) {
			foreach ($_SESSION['jawaban'] as $key1 => $value1) {
				if ($key === $key1) {
					if ($value === $value1) {
						$score += 1;
					}
				}
			}
		}
	}
	$score = ($score/$jumlahSoal)*100;
	if (empty($_POST['optradio'])) {
		$score = 0;
	}
	require 'pdo.php';
	$id = $_SESSION['dataLengkap']['id'];
	$soal = $_SESSION['idSoal'];
	$waktu = (int)$_GET['waktu'];
    $sql = "UPDATE detail_soal SET score = $score WHERE id_client =  $id and id_soal = $soal";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
?>