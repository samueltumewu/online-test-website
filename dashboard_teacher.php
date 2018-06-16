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
	<title>Welcome <?php echo $_SESSION['dataLengkap']['name']?></title>
	<meta charset="utf-8">
	<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
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
<body>
<h1>Welcome <?php echo $_SESSION['dataLengkap']['name']?> <?php echo $_SESSION['dataLengkap']['lastname']?></h1>

<div>


</body>
</html>