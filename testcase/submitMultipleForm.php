<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#btn_submit').click(function(){
				$('form[name=test]').attr('action','cek.php');
  				$('form[name=test]').submit();
			});
		});
	</script>
</head>
<body>
	<form name='test' method='post'>
		<input type="text" name="soal[]">
		<input type="radio" name="gender[1]" value="male" checked> Male<br>
		<input type="radio" name="gender[1]" value="female" checked> Female<br>
		<input type="text" name="soal[]">
		<input type="radio" name="gender[2]" value="male" checked> Male<br>
		<input type="radio" name="gender[2]" value="female" checked> Female<br>
		<input type="text" name="soal[]">
		<input type="radio" name="gender[3]" value="male" checked> Male<br>
		<input type="radio" name="gender[3]" value="female" checked> Female<br>

		<input type="submit" name="btn_submit" id="btn_submit">
	</form>
</body>
</html>