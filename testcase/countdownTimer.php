<html>
	<head>
		<link rel="stylesheet" href="../lib/flipclock.css">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="../lib/flipclock.min.js"></script>	
		<script src="../lib/flipclock.js"></script>	
		<script src="../lib/factory.js"></script>	
		<script src="../lib/base.js"></script>	
		<link rel="stylesheet" type="text/css" href="../lib/style/main_style.css">
		<script type="text/javascript">
			var clock;
			var lastTime
			var waktu = 120;
			$(document).ready(function() {			
				$("#stop").click(function(){
					clock.stop(function(){
						lastTime = clock.getTime().getTimeSeconds();
						console.log((lastTime));
						waktu = Number(lastTime);
					});
				});
				$(window).on("unload", function(e) {
					clock.stop(function(){
						lastTime = clock.getTime().getTimeSeconds();
						console.log((lastTime));
						waktu = Number(lastTime);
					});
    				window.location.href="cek.php?waktu="+waktu;
				});
				$('#start').click(function(){
					clock = $('.clock').FlipClock(waktu, {
						countdown: true
					});
				});
			});
		</script>
	</head>
	<body>
		<div class="clock"></div>
		<div>
		<button id="stop">STOP</button>
		<button id="start">START</button>
		</div>
	</body>
</html>