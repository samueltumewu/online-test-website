<?php
session_start();

	
	function insertSoal($pertanyaan, $jawaban, $choices, $nomor, $id_soal){
		//QUERY KEDALAM TABEL PERTANYAAN
		require 'pdo.php';
	    $sql = "INSERT INTO pertanyaan (pertanyaan, jawaban, nomor,choice1, choice2, choice3, choice4, id_soal)
           VALUES (:pertanyaan, :jawaban, :nomor,:choice1, :choice2, :choice3, :choice4, :id_soal)";
	    $stmt = $pdo->prepare($sql);
	    $stmt->execute(array(
	        ':pertanyaan' => $pertanyaan,
	        ':jawaban' => $jawaban,
	        ':nomor' => $nomor,
	        ':choice1' => $choices[0],
	        ':choice2' => $choices[1],
	        ':choice3' => $choices[2],
	        ':choice4' => $choices[3],
	        ':id_soal' => $id_soal
	        ));
	}
	function getIdSoal($judul){
		try{
			require 'pdo.php';
			$sql = "select * from soal where judul = '".$judul."'";
			$stmt = $pdo->query($sql);
			$rows = $stmt->fetch();
			return $rows["id_soal"];
		}catch(Exception $e){
			echo $e;
		}
		
	}

	if(!empty($_POST['soal']) && !empty($_POST['optradio']) && !empty($_POST['valueRadio']) && !empty($_POST['judulSoal'])){
		// echo "<pre>";
		// var_dump($_POST['soal']);
		// var_dump($_POST['optradio']);
		// var_dump($_POST['valueRadio']);
		// echo "</pre>";

		require 'pdo.php';
		//QUERY KEDALAM TABEL SOAL
			$jumlahSoal = sizeof($_POST['soal']);
			$sql = "INSERT INTO soal (judul, jumlah_soal)
	           VALUES (:judul, :jumlah_soal)";
		    $stmt = $pdo->prepare($sql);
		    $stmt->execute(array(
		        ':judul' => $_POST['judulSoal'],
		        ':jumlah_soal' => $jumlahSoal
		        ));

		//QUERY KEDALAM TABEL PERTANYAAN
			echo "<pre>";
			foreach ($_POST['soal'] as $key => $value) {
				//echo "Soal: $value\n";
				foreach ($_POST['optradio'] as $key1 => $value1) {
					if ($key1 == $key) {
						//echo "Pilihan: ";
						foreach ($_POST['valueRadio'] as $key2 => $value2) {
							if ($key1 == $key2) {
								$arr = array();
								foreach ($value2 as $key3 => $value3) {
									// echo "$value3 ";
									array_push($arr, $value3);
								}
							}
						}
						insertSoal($value, $value1, $arr, $key, getIdSoal($_POST['judulSoal']) );
					}
				}
				//echo "\n------------------------------------------\n";
			}
			echo "</pre>";


		//QUERY KEDALAM TABEL DETAIL_SOAL
			$sql = "INSERT INTO detail_soal (id_client, id_soal)
	           VALUES (:client, :soal)";
		    $stmt = $pdo->prepare($sql);
		    $stmt->execute(array(
		        ':client' => $_SESSION['dataLengkap']['id'],
		        ':soal' =>  getIdSoal($_POST['judulSoal'])
		        ));


		header("Location: listSoalForTeacher.php");
	} else {
		$stringErrorE = "Semua inputan harus terisi";
		$_SESSION['ErrPhpE'] = $stringErrorE;
		header("Location: bikinSoal.php");
	}
?>