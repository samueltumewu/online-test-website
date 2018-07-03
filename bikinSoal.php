<?php
session_start();
if ($_SESSION['dataLengkap']['type'] != 't') {
	$stringErrorA = "Akun anda tidak memiliki akses";
	$_SESSION['ErrPhpA'] = $stringErrorA;
	header("Location: index.php");
}
function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
if (isset($_SESSION['ErrPhpE'])) {
	alert($_SESSION['ErrPhpE']);
	unset($_SESSION['ErrPhpE']);
}

	require_once "pdo.php";
	$stmt = $pdo->query("SELECT * FROM soal");
	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$judul = Array();
	foreach ( $rows as $row ) {
		$judul[] = $row['judul'];
	}
	$json_judulSoal = json_encode($judul);
?>

<!DOCTYPE html>
<html>
<head>
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

<div class="container">
	<span class="badge badge-pill badge-info"><a href="index.php" class="paging">Home</a></span>
	 >
	<span class="badge badge-pill badge-info"><a href="dashboard_teacher.php" class="paging">Dashboard</a></span>
	<div style="margin-bottom: 20px;"></div>
	<form class="form-group" id="form" method="post">
			<label>Judul Soal:</label>
			<input type="text" name="judulSoal" id="inputanJudul">
			<label style="margin-left: 20px;" class="fixed-label">Jumlah Soal: <span id="counterSoal">1</span></label>
			<br>
			<button type="button" id='add' class="btn btn-primary btn-block sticky-top">Add Question</button>
			<br>
			<div class="clearFloat"></div>
			<label id="label">Nomor 1</label>
			<textarea name='soal[1]' class="form-control" rows="3" id="comment"></textarea>
			<br>
			<div class="form-check">
		      <label class="form-check-label" for="radio1" style="display: block;">
		        <input type="radio" class="form-check-input" name="optradio[1]">
		        <input type="text" name="valueRadio[1][]" class="form-control" oninput="$(this).updateValue();">
		      </label>
		      <label class="form-check-label" for="radio2" style="display: block;">
		        <input type="radio" class="form-check-input" name="optradio[1]">
		        <input type="text" name="valueRadio[1][]" class="form-control" oninput="$(this).updateValue();">
		      </label>
		      <label class="form-check-label" for="radio3" style="display: block;">
		        <input type="radio" class="form-check-input" name="optradio[1]">
		        <input type="text" name="valueRadio[1][]" class="form-control" oninput="$(this).updateValue();">
		      </label>
		      <label class="form-check-label" for="radio4" style="display: block;">
		        <input type="radio" class="form-check-input" name="optradio[1]">
		        <input type="text" name="valueRadio[1][]" class="form-control" oninput="$(this).updateValue();">
		      </label>
		    </div>
			<br>
	</form>

	<input type="submit" name="btn_submit" class="btn btn-success btn-block" id="btn_submit" value="SAVE">
<div>

<script type="text/javascript">
	$(document).ready(function(){
		var counter = 1;
		var arr_judul = <?php echo $json_judulSoal; ?>;
		$("#inputanJudul").on('change',function(){
			var input = $("#inputanJudul").val();
				for (var i = arr_judul.length - 1; i >= 0; i--) {
					if (input.toLowerCase() == arr_judul[i].toLowerCase()) {
						alert('Judul telah ada. masukkan judul yang lain');
						$('#inputanJudul').val("");
					}
				}
		});
		$("#add").click(function(){
			counter = counter + 1;
			$('#form').append('<br><label>Nomor '+counter+'</label><textarea name="soal['+counter+']" class="form-control" rows="3" id="comment"></textarea><br><div class="form-check"><label class="form-check-label" for="radio1" style="display: block;"><input type="radio" class="form-check-input" name="optradio['+counter+']"><input type="text" name="valueRadio['+counter+'][]" class="form-control" oninput="$(this).updateValue();"></label><label class="form-check-label" for="radio2" style="display: block;"><input type="radio" class="form-check-input" name="optradio['+counter+']"><input type="text" name="valueRadio['+counter+'][]" class="form-control" oninput="$(this).updateValue();"></label><label class="form-check-label" for="radio3" style="display: block;"><input type="radio" class="form-check-input" name="optradio['+counter+']"><input type="text" name="valueRadio['+counter+'][]" class="form-control" oninput="$(this).updateValue();"></label><label class="form-check-label" for="radio4" style="display: block;"><input type="radio" class="form-check-input" name="optradio['+counter+']"><input type="text" name="valueRadio['+counter+'][]" class="form-control" oninput="$(this).updateValue();"></label></div>');
			$('#counterSoal').text(counter);
		});
		$('#btn_submit').click(function(){
			console.log("CEK");
			$('#form').attr('action','querySoal.php');
  			$('#form').submit();
		});
		$.fn.updateValue = function() {
        	$(this).prev().val($(this).val());
    	};
	});
</script>
</body>
</html>