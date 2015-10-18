<?php include('config.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- tags -->
	<meta name="description" content="FlameCMS Install">
	<meta name="author" content="Luis Cortés Juarez Oneluiz">
	<link rel="icon" href="assets/images/favicon.ico">
	<title><?php echo $title ?></title>
	<!-- Bootstrap core CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<!-- Custom styles for this template -->
	<link href="assets/css/cover.css" rel="stylesheet">
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="assets/js/ie10-viewport-bug-workaround.js"></script>
</head>
<body>
	<div class="site-wrapper">
		<div class="site-wrapper-inner">
			<div class="cover-container">
				<div class="masthead clearfix">
					<div class="inner">
						<h3 class="masthead-brand" style="margin-top: -8px;" width="20px"><a href="<?php echo $baseUrl ?>"><image src="assets/images/logo.png"></a></h3>
						<nav class="nav nav-masthead">
							<a class="nav-link active" href="<?php echo $baseUrl; ?>"><i class="fa fa-home"></i> Home</a>
							<a class="nav-link" href="https://github.com/FlameNET/"><i class="fa fa-github"></i> Github</a>
							<a class="nav-link" href="#"><i class="fa fa-file-code-o"></i> Documentation</a>
							<a class="nav-link" href="#"><i class="fa fa-envelope"></i> Contact</a>
						</nav>
					</div>
				</div>
				<div class="inner cover">
					<h1 class="cover-heading" style="text-shadow: 3px 3px 2px #000;color: #fff;">Welcome to FlameCMS</h1>
					<p class="lead">Content Management System for World of Warcraft Servers.</p>
					<div class="btn-group btn-group-justified">
					  <a href="step-2.php" class="btn btn-primary">Install Now</a>
					  <a href="https://www.google.com/" class="btn btn-default">No, Thanks</a>
					</div>
				</div>
				<div class="mastfoot">
					<div class="inner">
						<p>Developed by <a href="<?php echo $linkAuthor; ?>">FlameNET</a> | <a href="<?php echo $linkAuthor; ?>"><i class="fa fa-github"></i> Github</a> | <a href="https://www.facebook.com/WoWFailureCMS-AquaflameCMS-141791002519526/"><i class="fa fa-facebook"></i> Facebook</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
	<script src="assets/js/bootstrap.min.js"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>