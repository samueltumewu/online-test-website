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
	        <a class="nav-link" href="#aboutUs">About Us</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#" data-toggle="modal" data-target="#myModal">Log In</a>	      	
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#contactUs">Contact Us</a>
	      </li>
	      <?php
		        if (isset($_SESSION['dataLengkap'])) {
		        	echo '<li class="nav-item">';
	        		echo '<a class="nav-link" href="logoutAction.php">Log Out</a>';
	     			echo '</li>';
		        }
		  ?>
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
							<a href="dashboard_teacher.php">Masuk sebagai <?php echo $_SESSION['dataLengkap']['name']." "?><?php echo $_SESSION['dataLengkap']['lastname']?></a>
		        <?php 
		        		} else {
		        	?>
		        			<a href="dashboard_student.php">Masuk sebagai <?php echo $_SESSION['dataLengkap']['name']." "?><?php echo $_SESSION['dataLengkap']['lastname']?></a>
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
	
	<div class="container margintops" id="aboutUs">
		<h4 align="center">About Us</h4><hr>
	    <div class="row" style="margin-bottom: 30px;">
	      <div class="col-md-3 borders">
	      	<p>
	      		Aliquam maximus est quis est rutrum, congue ullamcorper tortor luctus. Sed quis ultricies risus, vitae mollis orci. Proin odio libero, rhoncus ac urna ut, sollicitudin rutrum massa. Curabitur nec justo id magna euismod interdum vehicula at odio. Sed enim nisl, tempus semper lorem semper, consequat tempor diam. Maecenas rhoncus ante nec mi vulputate placerat. Donec gravida auctor libero. In ante risus, gravida vitae sapien ac, auctor pretium odio. Praesent a pulvinar 
	      	</p>
	      </div>
	      <div class="col-md-3 d-none d-md-block borders">
	      	<img src="img/course_4.jpg">
	      </div>
	      <div class="col-md-3 borders" style="border-left: 1px solid black;">
	      	<p>
	      		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vulputate, sapien sed tempor convallis, quam nisi elementum purus, at viverra purus diam ut diam. Proin non dapibus tellus. Mauris eleifend nibh ut enim rhoncus, in mattis ante aliquam. Praesent luctus nisi urna. Nulla tempus volutpat nulla, tristique accumsan ipsum scelerisque ac. Nunc ullamcorper urna ut eros vehicula, eget egestas orci tempor. Nulla ut faucibus neque. In eget ultrices massa. Suspendisse potenti. Phasellus malesuada lobortis ipsum, nec porta metus facilisis eget. Sed et dapibus erat. 
	      	</p>
	  	  </div>
	      <div class="col-md-3 d-none d-md-block borders">
	      	<img src="img/course_9.jpg">
	      </div>
	    </div>

	    <h4 align="center" id="contactUs">Contact Us</h4><hr>
	    <div class="row" style="margin-bottom: 30px;">
	    	<div class="col-md-6  borders" style="margin-bottom: 30px;">
	    		<h5>Telp:</h5>
	    		<h6>+62812345678</h6>
	    		<br>
	    		<h5>Email:</h5>
	    		<h6>onlineTes.customer@info.com</h6>
	    	</div>
	      <div class="col-md-6  borders" style="border-left: 1px solid black;">
	      	<div id="googleMap" style="width:100%;height:300px;"></div>
	      </div>
	    </div>
  	</div>


<script type="text/javascript">
	$(document).ready(function(){
		$("#regis").click(function(){
			window.location.href = "register.php";
		});
	});
</script>
<script type="text/javascript">
	function myMap() {
		var mapProp= {
			center:new google.maps.LatLng(-7.33904519,112.73690427),
			zoom:14,
		};
		var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
		var loc = {lat: -7.33904519, lng: 112.73690427};
		var marker = new google.maps.Marker({position: loc, map: map});
	}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=
AIzaSyCwl_KuhqTT8PwHq9HxzOGnAtADabh_F7s
&callback=myMap"></script>
</script>

</body>
</html>