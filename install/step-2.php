<?php
include('config.php');
ob_start(); 
phpinfo(INFO_MODULES); 
$info = ob_get_contents(); 
ob_end_clean(); 
$info = stristr($info, 'Client API version'); 
preg_match('/[1-9].[0-9].[1-9][0-9]/', $info, $match); 
$mysqlVersion = $match[0]; 
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- tags -->
		<meta name="description" content="FlameCMS Install">
		<meta name="author" content="Luis Cortés Juarez Oneluiz">
		<link rel="icon" href="assets/images/favicon.ico">
		<title>Step 2 - <?php echo $title ?></title>
		<!-- Bootstrap core CSS -->
		<link href="assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="assets/css/sticky-footer.css" rel="stylesheet">
		<link href="assets/css/flame.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	</head>
<body>
	<div class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<a href="<?php echo $baseUrl ?>" class="navbar-brand" style="padding: 10.5px;"><image src="assets/images/logo_black.png"></a>
				<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="navbar-collapse collapse" id="navbar-main">
				<ul class="nav navbar-nav navbar-right">
					<li><a class="nav-link active" href="<?php echo $baseUrl; ?>"><i class="fa fa-home"></i> Home</a></li>
					<li><a class="nav-link" href="https://github.com/FlameNET/"><i class="fa fa-github"></i> Github</a></li>
					<li><a class="nav-link" href="#"><i class="fa fa-file-code-o"></i> Documentation</a></li>
					<li><a class="nav-link" href="#"><i class="fa fa-envelope"></i> Contact</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div id="wrap">
		<div class="container">

			<div class="page-header" id="banner">
				<div class="row">
					<div class="col-lg-8 col-md-7 col-sm-6">
						<h1>Application requirements</h1>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="table-responsive">
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>Modules</th>
								<th>Required version</th>
								<th>Installed version</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>PHP Version</td>
								<td>5.5.1</td>
								<td><?php echo phpversion(); ?></td>
							</tr>
							<tr>
								<td>MySQLI Client API version</td>
								<td>5.0.11</td>
								<td><?php echo $mysqlVersion ?></td>
							</tr>
							<tr>
								<td>Apache Server Version</td>
								<td>2.2.29</td>
								<td><?php echo apache_get_version(); ?></td>
							</tr>
							<tr>
								<td>Operating System</td>
								<td>Windows/Linux</td>
								<td> <?php echo php_uname('s'); echo " "; echo php_uname('v'); ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<center>
					<a href="step-3" class="btn btn-primary">Go to the installation process</a>
				</center>
			</div>
		</div>
    </div>
	<div id="footer">
		<div class="container">
			<p class="pull-left text-muted creditos"> &copy; <?php echo date('Y'); ?> All rights reserved <a href="<?php echo $linkAuthor; ?>"><?php echo $title; ?></a> | Version <a>V1.1 Development</a></p>
			<div class="pull-right">
				<ul class="nav nav-pills payments creditosFormasPago">
					<li><i class="fa fa-github"></i></li>
				</ul> 
			</div>
		</div>
	</div>
	<!-- Javascript files at the end for the page to load faster -->
	<script src="assets/js/jquery-1.10.2.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/bootswatch.js"></script>
	<!-- Javascript files at the end for the page to load faster -->
</body>
</html>
