<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript">
		
		$(document).ready(function(){
			$.fn.updateValue = function() {
        	$(this).prev().val($(this).val());
    	};
		});
	</script>
</head>
<body>
	<form method="post" action="cek.php">
      <label class="form-check-label" for="radio1" style="display: block;">
        <input type="radio" class="form-check-input" name="optradio[1]">
        <input type="text" name="valueRadio[1]" class="form-control inputan" oninput="$(this).updateValue();">
      </label>
      <label class="form-check-label" for="radio2" style="display: block;">
        <input type="radio" class="form-check-input" name="optradio[1]">
        <input type="text" name="valueRadio[1]" class="form-control inputan" oninput="$(this).updateValue();">
      </label>
      <label class="form-check-label" for="radio3" style="display: block;">
        <input type="radio" class="form-check-input" name="optradio[1]">
        <input type="text" name="valueRadio[1]" class="form-control inputan" oninput="$(this).updateValue();">
      </label>
      <label class="form-check-label" for="radio4" style="display: block;">
        <input type="radio" class="form-check-input" name="optradio[1]">
        <input type="text" name="valueRadio[1]" class="form-control inputan" oninput="$(this).updateValue();">
      </label>

      <input type="submit" name="submit">
	</form>
</body>
</html>