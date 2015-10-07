<?php if (isset($_POST['Submit'])) {
$string = "<?php if (!isset($_SESSION)) session_start();
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
| Info: Session for Accounts.
| Special: DO NOT TOUCH!
|--------------------------------------------------------------------------|
| Creates Sessions that are saved so that accounts can stay connected.
|--------------------------------------------------------------------------|
*/
if (!isset(\$_SESSION))
    session_start();
/*
|--------------------------------------------------------------------------|
| Info: Session for Accounts. END.
|--------------------------------------------------------------------------|
*/

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
define('TITLE',		'FlameCMS');
define('FACEBOOK', 	'https://www.facebook.com/');
define('TWITTER',  	'https://twitter.com/');
define('YOUTUBE',  	'https://www.youtube.com/');
define('REDDIT',   	'https://www.reddit.com/');

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
define('SOAP_USER', 	'". $_POST['soap_acc']. "');
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
";
$fp = fopen('../system/config.php', 'w');
fwrite($fp, $string);
fclose($fp);
//header('Location: successful');
}
require_once('../system/config.php');
$domain = BASE_URL;
$htaccess = '# Copyright (C) '.date("Y").' FlameCMS <YET TO BE DETERMINED>

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
<html lang="en-gb" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Succesful - <?php echo $title ?></title>
        <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon">
        <link rel="apple-touch-icon-precomposed" href="assets/images/apple-touch-icon.png">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link id="data-uikit-theme" rel="stylesheet" href="assets/css/flame.docs.min.css">
        <link rel="stylesheet" href="assets/css/flame.css">
        <link rel="stylesheet" href="assets/css/highlight.css">
        <link rel="stylesheet" href="assets/css/animate.css">
        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/flame.min.js"></script>
        <script src="assets/js/highlight.js"></script>
        <script src="assets/js/docs.js"></script>
    </head>

    <body>

        <nav class="tm-navbar uk-navbar uk-navbar-attached">
            <div class="uk-container uk-container-center">

                <a class="uk-navbar-brand uk-hidden-small" href="<?php echo $baseUrl ?>"><img class="uk-margin uk-margin-remove animated hover <?php echo $animate ?>" src="assets/images/logos.png" width="120" data-uk-tooltip="{pos:'bottom-left'}" title="<?php echo $title ?>" alt="<?php echo $title ?>"></a>

                <ul class="uk-navbar-nav uk-hidden-small">
                    <li><a href="<?php echo $baseUrl ?>"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="https://github.com/FlameNET/FlameCMS"><i class="fa fa-github"></i> Github</a></li>
                    <li><a href="docs"><i class="fa fa-file-code-o"></i> Documentation</a></li>
                    <li><a href="contact"><i class="fa fa-envelope"></i> Contact</a></li>
                </ul>

                <a href="#tm-offcanvas" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas></a>

                <div class="uk-navbar-brand uk-navbar-center uk-visible-small"><img src="images/logos.png" width="100" height="40" title="<?php echo $title ?>" alt="<?php echo $title ?>"></div>

            </div>
        </nav>

        <div class="tm-section uk-overflow-container">
            <div class="uk-container uk-container-center uk-text-center">

				<div class="uk-overflow-container">
						<header>
							<h2>Finalizing...</h2>
						</header>
						<div class="uk-alert uk-alert-success">Trying to connect to database...
							<?php 
							$con=mysqli_connect(HOST,USER,PASSWORD,DB);

							// Check connection
							if (mysqli_connect_errno($con))
							  {
								echo '<div class="uk-alert uk-alert-danger">Failed to connect to MySQL: ' . mysqli_connect_error(); echo'</div>';
								exit();
							  }
							?>
							Succesful!
						</div>
						<br class="uk-hidden-small">
						<div class="uk-alert uk-alert-success">
						Attempting to import SQL files...
						<?php

						$mysqli = new mysqli(HOST,USER,PASSWORD,DB);

						if (mysqli_connect_error()) {
							exit('Connect Error (' . mysqli_connect_errno() . ') '
									. mysqli_connect_error());
						}
						
						@$sql = file_get_contents('../sql/FlameNET.sql');
						if (!$sql){
							exit ('<div class="uk-alert uk-alert-danger">Oops, something went wrong, cannot open the SQL file!</div>');
						}
						
						mysqli_multi_query($mysqli,$sql);

						$mysqli->close();
						?>
						Succesful!
						
						</div>
						<?php 
						error_reporting(E_ALL);
						ini_set('display_errors','On');
						$con=mysqli_connect(HOST,USER,PASSWORD,DB);

						// Check connection
						if (mysqli_connect_errno($con))
						  {
							echo '<div class="uk-alert uk-alert-danger">Failed to connect to MySQL: ' . mysqli_connect_error($con); echo'</div>';
							exit();
						  }
						  sleep(2);
						$email=mysqli_real_escape_string($con,$_POST['admin_email']);
						$temp_pass=mysqli_real_escape_string($con,$_POST['admin_pass']);
						$password=sha1(strtoupper($email). ":" .strtoupper($temp_pass));
						$firstname=mysqli_real_escape_string($con,$_POST['admin_first']);
						$lastname=mysqli_real_escape_string($con,$_POST['admin_last']);
						$lang=mysqli_real_escape_string($con,$_POST['lang']);
						//$username=mysqli_real_escape_string($mysqli,$_POST['admin_username']);
						$sql_add="INSERT 
						INTO account (first_name,
						last_name,
						email,
						password, secret_question, answer_question, country, date_of_birth, avatar, rol, activation_code) 
						VALUES ('".$firstname."',
						'".$lastname."',
						'".$email."',
						'".$password."',
						'18',
						'1',
						'".$lang."',
						'1990/01/01',
						'avatar.jpg',
						'5',
						NULL);";
						$query=@mysqli_query($con,$sql_add);
						if (mysqli_errno($con))
						  {
							echo '<div class="uk-alert uk-alert-danger">Failed to insert admin data to database: ' . mysqli_error($con); echo'</div>';
							exit();
						  }
						  else
						  {
							  echo '<div class="uk-alert uk-alert-success">The admin account was created!</div>';
						  }
						?>
						<br class="uk-hidden-small">
						<?php
						$fp = fopen(__ROOT__.'/.htaccess','w');
						if($fp)
						{
							fwrite($fp, $htaccess);
							fclose($fp);
						}
						?>
						<div class="uk-alert uk-alert-success">The .htaccess file has been created successfully!</div>
						<br class="uk-hidden-small">
						<div class="uk-alert uk-alert-warning">Please delete the install folder to start using FlameCMS!</div>
					<br>
					<br>
					<br>
					<br>
					<div class="uk-container uk-container-center uk-text-center">

						<ul class="uk-subnav uk-subnav-line">
							<li><a href="https://github.com/FlameNET/">GitHub</a></li>
							<li><a href="https://github.com/FlameNET/FlameCMS/issues">Issues</a></li>
							<li><a href="https://github.com/FlameNET/FlameCMS/blob/master/CHANGELOG.md">Changelog</a></li>
							<li><a href="https://twitter.com/FlameCMS">Twitter</a></li>
						</ul>

						<div class="uk-panel">
							<p>Made by <a href="http://flamenet.github.io/FlameCMS/">FlameNET</a> with love and caffeine.<br class="uk-hidden-small">Licensed under <a href="https://github.com/FlameNET/FlameCMS/blob/master/COPYING">GNU license</a>.</p>
							<a href="http://flamenet.github.io/FlameCMS/">
							</a>
						</div>

					</div>

				</div>
            </div>
        </div>

        <div id="tm-offcanvas" class="uk-offcanvas">

            <div class="uk-offcanvas-bar">

                <ul class="uk-nav uk-nav-offcanvas uk-nav-parent-icon" data-uk-nav="{ multiple: true }">
                    <li><a href="<?php echo $baseUrl ?>"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="https://github.com/FlameNET/FlameCMS"><i class="fa fa-github"></i> Github</a></li>
                    <li><a href="docs"><i class="fa fa-file-code-o"></i> Documentation</a></li>
                    <li><a href="contact"><i class="fa fa-envelope"></i> Contact</a></li>
                </ul>

            </div>

        </div>
    </body>
</html>
