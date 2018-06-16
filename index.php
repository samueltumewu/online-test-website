<?php
session_start();

function alert($msg) {
	    echo "<script type='text/javascript'>alert('$msg');</script>";
	}
if (isset($_SESSION['ErrPhpA'])) {
	alert($_SESSION['ErrPhpA']);
	session_destroy();
}
else if (isset($_SESSION['ErrPhpB'])) {
	alert($_SESSION['ErrPhpB']);
	session_destroy();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>ONLINE TEST</title>
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
	<!-- NAVIGASI BAR -->
	<nav class="navbar navbar-expand-lg navbar-light navbar-custom fixed-top">
	  <a class="navbar-brand" href="#">ONLINE TEST</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto bringToCenter">
	      <li class="nav-item">
	        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#">About Us</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#" data-toggle="modal" data-target="#myModal">Log In</a>	      	
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#">Contact Us</a>
	      </li>
	    </ul>
	  </div>	
	</nav>
	<!-- END OF NAVIGASI BAR -->
	<!-- LOG IN MENU -->
	  <div class="modal" id="myModal">
	    <div class="modal-dialog">
	      <div class="modal-content">
	      
	        <!-- Modal Header -->
	        <div class="modal-header">
	          <h4 class="modal-title">LOG IN MENU</h4>
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	        </div>
	        
	        <!-- Modal body -->
	        <div class="modal-body">
	          <form id="LoginForm" method="post" action="loginAction.php">
	          	<img src="img/user.png">
	          	<label>  Username</label><br>
	          	<input type="text" name="username" id="username"><br>
	          	<img src="img/lock.png">
	          	<label>  Password</label><br>
	          	<input type="password" name="pass"><br>
	          	<br>
		        <button type="submit" class="btn btn-success" id="login">LOGIN</button>
		        <br>
		        <?php
		        	if (isset($_SESSION['dataLengkap'])) {
		        		if ($_SESSION['dataLengkap']['type']=='t') {
		        	?>
							<a href="dashboard_teacher.php">Masuk sebagai <?php echo $_SESSION['dataLengkap']['name']?><?php echo $_SESSION['dataLengkap']['lastname']?></a>
		        <?php 
		        		} else {
		        	?>
		        			<a href="dashboard_student.php">Masuk sebagai <?php echo $_SESSION['dataLengkap']['name']?><?php echo $_SESSION['dataLengkap']['lastname']?></a>
		        <?php
		        		}
		        	?>
		        		<a style="float: right; margin-right: 60px;" href="logoutAction.php">Logout</a>
		        <?php
		        		}
		        	?>
	          </form>
	        </div>
	        
	        <!-- Modal footer -->
	        <div class="modal-footer">
		      <button type="button" class="btn btn-primary" id="regis">REGISTER</button>
	          <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
	        </div>
	        
	      </div>
	    </div>
	  </div>
	<!--END OF SCRIPT FOR LOGIN MENU-->

	<!-- HOME CONTENT -->
	<div id="home">
		<div id="demo" class="carousel slide d-none d-sm-block" data-ride="carousel">
		    <ul class="carousel-indicators">
		      <li data-target="#demo" data-slide-to="0" class="active"></li>
		      <li data-target="#demo" data-slide-to="1"></li>
		      <li data-target="#demo" data-slide-to="2"></li>
		    </ul>
		    <div class="carousel-inner">
		      <div class="carousel-item active">
		        <img src="img/event_1.jpg" alt="">
		        <div class="carousel-caption caption-color">
		          <h4>Easy to Use</h4>
		          <p>for teachers and students</p>
		        </div>
		      </div>
		      <div class="carousel-item">
		        <img src="img/event_2.jpg" alt="">
		        <div class="carousel-caption caption-color">
		          <h4>More Flexible time</h4>
		          <p>anywhere and anytime</p>
		        </div>
		      </div>
		      <div class="carousel-item">
		        <img src="img/event_3.png" alt="">
		        <div class="carousel-caption caption-color">
		          <h4><strong>TRY ONLINE TEST TODAY!</strong></h4>
		        </div>
		      </div>
		    </div>
		    <a class="carousel-control-prev" href="#demo" data-slide="prev">
		      <span class="carousel-control-prev-icon"></span>
		    </a>
		    <a class="carousel-control-next" href="#demo" data-slide="next">
		      <span class="carousel-control-next-icon"></span>
		    </a>
		  </div>
	</div>
	<!-- END OF HOME CONTENT -->	
	
	<div class="container-fluid margintops">
	    <div class="row">
	      <div class="col-md-3 bg-warning borders">COL MD 3</div>
	      <div class="col-md-3 col-xl-6 d-none d-sm-block bg-success borders">COL MD 6</div>
	      <div class="col-md-3 bg-warning borders">COL MD 3</div>
	    </div>
	    <div class="row">
	      <div class="col-md-6 bg-warning borders">COL MD 6.11</div>
	      <div class="col-md-6 bg-success borders">COL MD 6.12</div>
	    </div>
  	</div>


<script type="text/javascript">
	$(document).ready(function(){
		$("#regis").click(function(){
			window.location.href = "register.php";
		});
	});
</script>


</body>
</html>