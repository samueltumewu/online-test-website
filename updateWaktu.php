<?php
session_start();

	if (isset($_GET['waktu']) === false) {
		header("Location: listSoalForStudent.php");
	} else {
		require 'pdo.php';
		$id = $_SESSION['dataLengkap']['id'];
		$soal = $_SESSION['idSoal'];
		$waktu = (int)$_GET['waktu'];
	    $sql = "UPDATE detail_soal SET waktu = $waktu WHERE id_client =  $id and id_soal = $soal";
	    $stmt = $pdo->prepare($sql);
	    $stmt->execute();
	    header("Location: listSoalForStudent.php");
	}
?>