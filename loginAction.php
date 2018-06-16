<?php
session_start();
?>

<?php
	require_once "pdo.php";
	if (isset($_SESSION['dataLengkap'])) {
		if($_SESSION['dataLengkap']['type'] == 't'){
				header("Location: dashboard_teacher.php");
		} else {
				header("Location: dashboard_student.html");
		}
	}
	else if ( isset($_POST['username']) && isset($_POST['pass']) ) {
		$stmt = $pdo->query("SELECT * FROM client where username = '".$_POST['username']."' and password = password('".$_POST['pass']."')");
		$rows = $stmt->fetch();
		if ($rows) {
			$arr_data = array('name' => $rows['name'],
							  'lastname' =>$rows['last_name'],
							  'type' => $rows['type'],
							  'id' => $rows['id_client']
						);
			$_SESSION['dataLengkap'] = $arr_data;

			if($_SESSION['dataLengkap']['type'] == 't'){
				header("Location: dashboard_teacher.php");
			} else {
				header("Location: dashboard_student.php");
			}
		}else{
			$stringErrorB = "username atau password salah";
			$_SESSION['ErrPhpB'] = $stringErrorB;
			header("Location: index.php");
		}
	} else {
		$stringErrorA = "Silahkan Login Terlebih Dahulu";
		$_SESSION['ErrPhpA'] = $stringErrorA;
		header("Location: index.php");
	}
	
?>

