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

<div class="container">
	<form class="form-group" id="form" method="post">
			<label>Judul Soal:</label>
			<input type="text" name="judulSoal">
			<label style="margin-left: 20px;">Jumlah Soal: <span id="counterSoal">1</span></label>
			<br>
			<button type="button" id='add' class="btn btn-primary btn-block">Add Question</button>
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
	var counter = 1;
	$(document).ready(function(){
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