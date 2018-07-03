<?php
	require 'pdo.php';
	$sql = "select * from soal inner join pertanyaan ON soal.id_soal=pertanyaan.id_soal where soal.judul = 'judul dummy'";
	$stmt = $pdo->query($sql);
	$rows = $stmt->fetchAll();
	foreach ( $rows as $row ) {
		$pertanyaan[] = $row['pertanyaan'];
		$jawaban[] = $row['jawaban'];
		$a[] = $row['choice1'];
		$b[] = $row['choice2'];
		$c[] = $row['choice3'];
		$d[] = $row['choice4'];
	}
	?>
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
			<div class="container">
	<?php
		?>
				<label name='soal[1]' class="form-control" rows="3" id="comment"><?php echo $pertanyaan[$i]?></label>
				<br>
				<div class="form-check">
			      <label class="form-check-label" for="radio1" style="display: block;">
			        <input type="radio" class="form-check-input" name="optradio[<?php echo $i?>]">
			        <label name="valueRadio[<?php echo $i?>][]" class="form-control" oninput="$(this).updateValue();" value=''><?php echo $a[$i]?>
			      </label>
			      <label class="form-check-label" for="radio2" style="display: block;">
			        <input type="radio" class="form-check-input" name="optradio[<?php echo $i?>]">
			        <label name="valueRadio[<?php echo $i?>][]" class="form-control" oninput="$(this).updateValue();" value=''><?php echo $b[$i]?>
			      </label>
			      <label class="form-check-label" for="radio3" style="display: block;">
			        <input type="radio" class="form-check-input" name="optradio[<?php echo $i?>]">
			        <label name="valueRadio[<?php echo $i?>][]" class="form-control" oninput="$(this).updateValue();" value=''><?php echo $c[$i]?>
			      </label>
			      <label class="form-check-label" for="radio4" style="display: block;">
			        <input type="radio" class="form-check-input" name="optradio[<?php echo $i?>]">
			        <label name="valueRadio[<?php echo $i?>][]" class="form-control" oninput="$(this).updateValue();" value=''><?php echo $d[$i]?>
			      </label>
			    </div>
			    <br>
			
		<?php
		// echo "<label>$pertanyaan[$i]</label><br>";
		// echo "<label>$a[$i]</label><br>";
		// echo "<label>$b[$i]</label><br>";
		// echo "<label>$c[$i]</label><br>";
		// echo "<label>$d[$i]</label><br>";
	}
	?>
	</div>