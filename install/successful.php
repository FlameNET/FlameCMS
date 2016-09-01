<?php 
if (isset($_POST['Submit'])){
	$string = 
	"<?php
		/**
		* Copyright (C) ".date("Y")." FlameCMS <http://flamenet.github.io/FlameCMS/>
		*
		* This program is free software; you can redistribute it and/or modify
		* it under the terms of the GNU General Public License as published by
		* the Free Software Foundation; either version 2 of the License, or
		* (at your option) any later version.
		*
		* This program is distributed in the hope that it will be useful,
		* but WITHOUT ANY WARRANTY; without even the implied warranty of
		* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
		* GNU General Public License for more details.
		*
		* You should have received a copy of the GNU General Public License
		* along with this program; if not, write to the Free Software
		* Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
		**/

		/*
		|--------------------------------------------------------------------------|
		| Info: CMS Language System.
		|--------------------------------------------------------------------------|
		| Specifies the Language that your CMS will show.
		| Under Heavy Work. Please do not touch.
		|--------------------------------------------------------------------------|
		*/
		define('LANGUAGE',	'".$_POST['lang']."');

		/*
		|--------------------------------------------------------------------------|
		| Info: CMS Language System END.
		|--------------------------------------------------------------------------|
		*/
		/*
		|--------------------------------------------------------------------------|
		| Info: CMS Community System.
		|--------------------------------------------------------------------------|
		| Important Links to Social sites & the title of the CMS.
		| Under Heavy Work. Please do not touch.
		|--------------------------------------------------------------------------|
		*/
		define('TITLE',		'". $_POST['cs_title'] ."');
		define('FACEBOOK',	'". $_POST['cs_fb'] ."');
		define('TWITTER',	'". $_POST['cs_twitter'] ."');
		define('YOUTUBE',	'". $_POST['cs_yt'] ."');
		define('REDDIT',	'". $_POST['cs_reddit'] ."');

		/*
		|--------------------------------------------------------------------------|
		| Info: CMS Community System END.
		|--------------------------------------------------------------------------|
		*/
		/*
		|--------------------------------------------------------------------------|
		| Info: CMS Connection Variables.
		|--------------------------------------------------------------------------|
		| Please set these to your MySQL Connection. 
		| If you don\'t know what you are doing, please contact with one of FlameCMS
		| Developers to help you.
		|--------------------------------------------------------------------------|
		*/
		define('HOST',		'". $_POST['hostname']. "');
		define('USER',		'". $_POST['username']. "');
		define('PASSWORD',	'". $_POST['password']. "');
		define('PORT',		'". $_POST['port']. "');
		define('DB',		'". $_POST['dbname']. "');


		/*
		|--------------------------------------------------------------------------|
		| Info: Server Connection Variables.
		|--------------------------------------------------------------------------|
		| Please set these to your MySQL Connection. 
		| If you don\'t know what you are doing, please contact with one of FlameCMS
		| Developers to help you.
		|--------------------------------------------------------------------------|
		*/
		define('SERVERHOST',	'". $_POST['serverhostname']. "');
		define('SERVERUSER',	'". $_POST['serverusername']. "');
		define('SERVERPASSWORD','". $_POST['serverpassword']. "');
		define('SERVERPORT',	'". $_POST['serverport']. "');
		define('AUTH',			'". $_POST['authdb']. "');
		define('CHARACTERS',	'". $_POST['chardb']. "');
		define('WORLD',			'". $_POST['worlddb']. "');
		/*
		|--------------------------------------------------------------------------|
		|  Soap settings
		|--------------------------------------------------------------------------|
		| Bind SOAP service to IP/hostname.
		| TCP port to reach the SOAP service.
		| SOAP IP		= 127.0.0.1
		| SOAP PORT		= 7878
		| SOAP SOAP		= 1#1 // EXAMPLE
		| USER PASSWORD = your password account
		| SOAP KEY		= your key
		*/
		define('SOAP_IP',		'". $_POST['soap_ip']. "');
		define('SOAP_PORT', 	'". $_POST['soap_port']. "');
		define('SOAP_USER', 	'". $_POST['soap_user']. "');
		define('SOAP_PASS', 	'". $_POST['soap_pass']. "');
		define('SOAP_KEY',		'abcdefghijklmnopqrstuvwxyz0123456789');

		/*
		|--------------------------------------------------------------------------|
		| Info: DO NOT TOUCH THESE UNLESS YOU KNOW WHAT YOU ARE DOING.
		|--------------------------------------------------------------------------|
		*/
		define('BASE_URL',		'". $_POST['cfgdom']. "');
		define('ADMIN_URL',		'". $_POST['cfgdom']. "admin/');
		define('ACCOUNT_URL',	'". $_POST['cfgdom']. "account/');
		define('TIMEZONE',		'America/Costa_Rica');

		/*
		|--------------------------------------------------------------------------|
		| System Core CMS FlameNet.
		|--------------------------------------------------------------------------|
		*/
		require('FlameCore.php');
	?>
	";

	$fp = fopen('../system/config.php', 'w');
		fwrite($fp, $string);
		fclose($fp);
	}

	require_once('../system/config.php');
	$domain = BASE_URL;

	$htaccess = 
		'# Copyright (C) '.date("Y").' FlameCMS <http://flamenet.github.io/FlameCMS/>

		# Page Error
		ErrorDocument 404 '.$domain.'404

		Options +FollowSymLinks
		RewriteEngine On

		# PHP redirect if any.
		RewriteCond %{REQUEST_FILENAME} !-f
		RewriteCond %{REQUEST_FILENAME} !-d
		RewriteCond %{REQUEST_FILENAME}\.php -f
		RewriteRule ^(.*)$ $1.php [L,QSA]

		## Enable Apache mod_rewrite to rewrite the URL
		RewriteEngine On

		## Friendly URL of Articles
		RewriteRule ^blog/(.+)/(.+)$ article.php?id=$1&title=$2 [QSA]
		';

	include('config.php');
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
		<title>Succesful - <?php echo $title ?></title>
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
						<h1></h1>
						<p class="lead">Finalize</p>
					</div>
				</div>
			</div>

			<header>
				<h2>Finalizing...</h2>
			</header>

			<div class="alert alert-dismissible alert-success">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<strong>Well done!</strong> Trying to connect to database...
				Succesful!
			</div>
				<?php 
				$con=mysqli_connect(HOST,USER,PASSWORD,DB,PORT);

				// Check connection
				if (mysqli_connect_errno($con)):
					echo '<div class="alert alert-dismissible alert-danger">
						  <button type="button" class="close" data-dismiss="alert">×</button>
						  <strong>Oh snap!</strong> Failed to connect to MySQL: ' . mysqli_connect_error(); echo'</div>';
					exit();
				endif;
				?>
			<br class="uk-hidden-small">
			<div class="alert alert-dismissible alert-success">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<strong>Well done!</strong> 
			Attempting to import SQL files...Succesful!
			</div>
			<?php

			$mysqli = new mysqli(HOST,USER,PASSWORD,DB,PORT);

			if (mysqli_connect_error()):
				exit('Connect Error (' . mysqli_connect_errno() . ') '
						. mysqli_connect_error());
			endif;
			
			@$sql = file_get_contents('../sql/FlameNET.sql');
			if (!$sql):
				exit ('<div class="alert alert-dismissible alert-danger">
					  <button type="button" class="close" data-dismiss="alert">×</button>
					  <strong>Oh snap!</strong> something went wrong, cannot open the SQL file!</div>');
			endif;
			
			mysqli_multi_query($mysqli,$sql);

			$mysqli->close();
			?>
			
			<?php 
			error_reporting(E_ALL);
			ini_set('display_errors','On');
			$con=mysqli_connect(HOST,USER,PASSWORD,DB,PORT);

			// Check connection
			if (mysqli_connect_errno($con)):
				echo '<div class="alert alert-dismissible alert-danger">
					  <button type="button" class="close" data-dismiss="alert">×</button>
					  <strong>Oh snap!</strong> Failed to connect to MySQL: ' . mysqli_connect_error($con); echo'</div>';
				exit();
			endif;
			sleep(2);
			$email=mysqli_real_escape_string($con,$_POST['admin_email']);
			$temp_pass=mysqli_real_escape_string($con,$_POST['admin_pass']);
			$password=sha1(strtoupper($email). ":" .strtoupper($temp_pass));
			$firstname=mysqli_real_escape_string($con,$_POST['admin_first']);
			$lastname=mysqli_real_escape_string($con,$_POST['admin_last']);
			$lang=mysqli_real_escape_string($con,$_POST['lang']);
			//$username=mysqli_real_escape_string($mysqli,$_POST['admin_username']);
			$sql_add="INSERT INTO account (first_name, last_name, email, PASSWORD, secret_question, answer_question, country, date_of_birth, avatar, rol, activation_code) VALUE
			('".$firstname."',
			'".$lastname."',
			'".$email."',
			'".$password."',
			'18',
			'1',
			'".$lang."',
			'1990/01/01',
			'avatar.jpg',
			'5',
			NULL)";
			$query=@mysqli_query($con,$sql_add);
			if (mysqli_errno($con)):
				echo '<div class="alert alert-dismissible alert-danger">
					  <button type="button" class="close" data-dismiss="alert">×</button>
					  <strong>Oh snap!</strong> Failed to insert admin data to database: ' . mysqli_error($con); echo'</div>';
				exit();
			 
			else:
				echo '<div class="alert alert-dismissible alert-success">
					  <button type="button" class="close" data-dismiss="alert">×</button>
					  <strong>Well done!</strong> The admin account was created!</div>';
			endif;
			?>
			<br class="uk-hidden-small">
			<?php
			$fp = fopen(__ROOT__.'/.htaccess','w');
			if($fp):
				fwrite($fp, $htaccess);
				fclose($fp);
			endif;
			?>
			<div class="alert alert-dismissible alert-success">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<strong>Well done!</strong> The .htaccess file has been created successfully!
			</div>
			<br class="uk-hidden-small">
			<div class="alert alert-dismissible alert-warning">
				<button type="button" class="close" data-dismiss="alert">×</button>
				Please delete the install folder to start using FlameCMS!
			</div>


	<div id="footer">
		<div class="container">
			<p class="pull-left text-muted creditos"> &copy; <?php echo date('Y'); ?> All rights reserved <a href="<?php echo $linkAuthor; ?>"><?php echo $title; ?></a> | Version <a>V1.1 Development</a></p>
			<div class="pull-right">
				<ul class="nav nav-pills payments creditosFormasPago">
					<li><i class="fa fa-github" style="left=-5;"></i></li>
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
