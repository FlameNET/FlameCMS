<!DOCTYPE HTML>
<?php
include("config.php");
?>
<html>
	<head>
	<title>Dashboard - <?php echo $title ?></title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/init.js"></script>
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
		<link rel="stylesheet" href="/resources/demos/style.css">
		<script>
		$(function() {
		$( document ).tooltip();
		});
		</script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
			<link rel="stylesheet" href="css/style-noscript.css" />
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
	<body>

		<!-- Wrapper-->
			<div id="wrapper">
				
				<!-- Nav -->
					<nav id="nav">
						<a href="" class="icon fa-home"><span>Welcome</span></a>
						<a href="" class="icon fa-folder"><span>Setup</span></a>
						<a href="" class="icon fa-envelope active"><span>Final</span></a>
						<a href="http://goo.gl/0kmktS" class="icon fa-facebook"><span>Facebook</span></a>
					</nav>

				<!-- Main -->
					<div id="main">

				<!-- Contact -->
				<article id="contact" class="panel">
					<header>
						<h2>Finalizing...</h2>
					</header>
					<form action="#" method="post">
							<div class="row">
								<div class="12u">
								<textarea disabled name="message" placeholder="" rows="8">
								Trying to connect to database...
								<?php
								require_once('../system/config.php'); 
								$con=mysqli_connect(HOST,USER,PASSWORD,DB);

								// Check connection
								if (mysqli_connect_errno($con))
								  {
									echo 'Failed to connect to MySQL: ' . mysqli_connect_error();
									exit();
								  }
								?>
								Succesful!
								Attempting to import SQL files...
								<?php

								$mysqli = new mysqli(HOST,USER,PASSWORD,DB);

								if (mysqli_connect_error()) {
									exit('Connect Error (' . mysqli_connect_errno() . ') '
											. mysqli_connect_error());
								}
								
								@$sql = file_get_contents('../sql/FlameNET.sql');
								if (!$sql){
									exit ('Oops, something went wrong, cannot open the SQL file!');
								}

								mysqli_multi_query($mysqli,$sql);

								$mysqli->close();
								?>
								Succesful!
								Please delete the install folder to start using FlameCMS!
								</textarea>
								</div>
							</div>
						</div>
					</form>
				</article>			
			</div>	
			<!-- Footer -->
			<div id="footer">
				<ul class="copyright">
					<li>&copy; <a href="<?php echo $linkAuthor ?>"><?php echo $author ?></a></li><li>Powered by: <a href="#">AquaFlame.NET</a></li>
				</ul>
			</div>
		</div>
	</body>
</html>