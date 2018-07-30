<!DOCTYPE html>
<html lang="en">
<head>
	<title>Online Test</title>
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
</head>
<body>
	<div id="menuRegis" class="container-fluid">
	<h3>SIGN UP</h3>
	<form action="regisAction.php" method="post">
		<div class="form-group"> 
			<label>Name</label><br>
			<input type="text" name="name" placeholder="Jane" class="form-control">			
		</div>
		<div class="form-group">
			<label>Last Name</label><br>
			<input type="text" name="last_name" placeholder="Doe" class="form-control">
		</div>
		<div class="form-group">
			<label>Email</label><br>
			<div id="errorD" class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
			  <strong>Ups!</strong> Email already used!
			</div>
			<div id="errorE" class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
			  <strong>Ups!</strong> Email format is wrong!
			</div>
			<input type="text" name="email" id='email' placeholder="name@example.com" class="form-control">
			<!-- <input type="hidden" name="type" id="type"> -->
		</div>
		<div class="form-group">
			<label>Username</label><br>
			<div id="errorA" class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
			  <strong>Ups!</strong> try another username!
			</div>
			<input type="text" name="username" placeholder="janedoe123" id="username" class="form-control">
		</div>
		<div class="form-group">
			<label>Password</label><br>
			<input type="password" id="pwd1" class="form-control">
		</div>
		<div class="form-group">
			<label>Re-type Password</label><br>
			<div id="errorB" class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
			  <strong>Ups!</strong> password doesn't match!
			</div>
			<input type="password" name='password' id="pwd2" class="form-control"><br>
		</div>

		<div class="form-group">
		<div id="errorC" class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
			  <strong>Ups!</strong> Make sure your data is valid!
			</div>
			<button type="submit" id='btn-submit' class="btn btn-primary btn-block">SIGN UP</button>
		</div>
	</form>
	</div>

<?php
session_start();
require_once "pdo.php";
$stmt = $pdo->query("SELECT * FROM client");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
$result = Array();
$res_email = Array();
foreach ( $rows as $row ) {
	$result[] = $row['username'];
	$res_email[] = $row['email'];
}
$json_email = json_encode($res_email);
$json_array = json_encode($result);

$tipe_isset = false;
?>

<script type="text/javascript">
	
	$(document).ready(function(){
		var validated_username = false;
		var validated_pwd = false;
		var validated_email = false;
		var arr_uname = <?php echo $json_array; ?>;
		var arr_email = <?php echo $json_email; ?>;
		
		$('#username').on('input',function(){
			if(arr_uname.length > 0){
				for (var i = arr_uname.length - 1; i >= 0; i--) {
					if ($('#username').val() == arr_uname[i]){	
						$('#errorA').slideDown();
						validated_username = false;
						break;
					}else{
						$('#errorA').hide();
						validated_username = true;
						$('#errorC').hide();
					}
				}
			} else {
				validated_username = true;
			}
		});
		$('#email').on('change',function(){
			var email_identik = false;
			var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
			var input = $('#email').val();
			if (pattern.test(input)) {
				validated_email =true;
				for (var i = arr_email.length - 1; i >= 0; i--) {
					if (input == arr_email[i]) {
						email_identik=true;
					}
				}

				if (!email_identik) {
					// if ($('#email').val().includes('@teacher')){
					// 	//$('#type').val('t');
					// 	<?php $_SESSION['tipe'] = 't';?>

					// }else{
					// 	//$('#type').val('s');
					// 	<?php 
					// 		if (isset($_SESSION['tipe']) === false) {
					// 			$_SESSION['tipe'] = 's';
					// 		} 
					// 	?>
					// }

					$('#errorD').hide();
					validated_email=true;
					$('#errorC').hide();
				}else{
					$('#errorD').slideDown();
					validated_email=false;
				}

			}else{
				$('#errorD').hide();
				validated_email =false;
			}
			if (pattern.test(input)==true) {
				console.log("YA");
				validated_email =true;
				$('#errorE').hide();
			}else{
				$('#errorE').slideDown();
			}
		});
		$('#pwd2').on('input', function(){
			if ($('#pwd2').val() != $('#pwd1').val()) {
				$('#errorB').slideDown();
				validated_pwd = false;
			}else{
				$('#errorB').hide();
				validated_pwd = true;
				console.log("pwdTrue");
				$('#errorC').hide();
			}
		});
		$('#pwd1').on('input', function(){					
			if ($('#pwd2').val() != $('#pwd1').val()) {
				$('#errorB').slideDown();
				validated_pwd = false;
			}else{
				$('#errorB').hide();
				validated_pwd = true;
				console.log("pwdTrue");
				$('#errorC').hide();
			}
		});
		$('#btn-submit').on('click',function(){
			if (validated_pwd && validated_username) {
				console.log("SAFE");
			}else{
				console.log("DANGER");
			}
		});
		$('form').on('submit',function(){
			if(validated_pwd && validated_username && validated_email){
		        document.form.submit();
		        $('#errorC').hide();
		        return true;
		    }
		    else  {
		    	$('#errorC').slideDown();
		        return false;
		    }
		});
	});
</script>

</body>
</html>