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
						<a href="#me" class="icon fa-home active"><span>Welcome</span></a>
						<a href="#work" class="icon fa-folder"><span>Setup</span></a>
						<a href="#contact" class="icon fa-envelope"><span>Contact</span></a>
						<a href="http://goo.gl/0kmktS" class="icon fa-facebook"><span>Facebook</span></a>
					</nav>

				<!-- Main -->
					<div id="main">
						
						<!-- Me -->
							<article id="me" class="panel">
								<header>
									<h1>FlameCMS</h1>
									<p>Content Management System <br>for World of Warcraft Servers</p>
								</header>
								<a href="#work" class="jumplink pic">
									<span class="arrow icon fa-chevron-right"><span>See my work</span></span>
									<img src="images/me.jpg" alt="" />
								</a>
							</article>

						<!-- Work --> 
							<article id="work" class="panel">
								<header>
									<h2>Setup</h2>
								</header>
								<p>
								
									Welcome to the setup of <?php echo $title ?>!<br>
									We are going to need some information about your server.<br>
									These information are credentials that are gonna be used for the functionality of the CMS!
								</p>
								<section>
									<form action="" method="post" name="install" id="install">
									Database Host: <input type="text" name="hostname">
									Database Username: <input type="text" name="username">
									Database Password: <input type="password" name="password">
									<a href="#" title="First, create an empty database with this name!">Website Database:</a>
									<input type="text" name="dbname">
									Auth Database:
									<input type="text" name="authdb">
									Characters Database:
									<input type="text" name="chardb">
									World Database:
									<input type="text" name="worlddb">
									<a href="#" title="If you don't have a domain just add the following: http://localhost/">Domain:</a>
									<input type="text" name="cfgdom">
									<p><center><input type="submit" name="Submit" value="Install FlameCMS Now"></center></p>
									</form>
								</section>
								<?php
	if (isset($_POST["Submit"])) {
		$string = '<?php

/**
* Copyright (C) 2014 FlameCMS <YET TO BE DETERMINED>
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
if (!isset($_SESSION))
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
$cms["title"]		= "FlameCMS";
$cms["Facebook"] 	= "http://www.facebook.com/";
$cms["Twitter"]  	= "http://twitter.com/";
$cms["Youtube"]  	= "http://www.youtube.com/";
$cms["Reddit"]   	= "http://www.reddit.com/";
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
$cms_host			= "'. $_POST["hostname"]. '";
$cms_user			= "'. $_POST["username"]. '";
$cms_pass			= "'. $_POST["password"]. '";
$cms_db				= "'. $_POST["dbname"]. '";
$cms_wdb			= "'. $_POST["worlddb"]. '";
$cms_adb			= "'. $_POST["authdb"]. '";
$cms_cdb			= "'. $_POST["chardb"]. '";
/*
|--------------------------------------------------------------------------|
| Info: DO NOT TOUCH THESE UNLESS YOU KNOW WHAT YOU ARE DOING.
|--------------------------------------------------------------------------|
*/
$cms_core			= "webkit/";
$cms_root			= "/";
$cms_add			= "'. $_POST["cfgdom"]. '";
/*
|--------------------------------------------------------------------------|
| Info: CMS Connection Variables END.
|--------------------------------------------------------------------------|
*/
/*
|--------------------------------------------------------------------------|
| Info: CMS Connection System.
|--------------------------------------------------------------------------|
| Under Heavy Work. Please do not touch.
|--------------------------------------------------------------------------|
*/
$con=mysqli_connect($cms_host,$cms_user,$cms_pass,$cms_db);
if (mysqli_connect_errno()) {
  echo "Failed to connect to Database: " . mysqli_connect_error();
}
/*
|--------------------------------------------------------------------------|
| Info: CMS Connection System END.
|--------------------------------------------------------------------------|
*/
';
		$fp = fopen("../webkit/config.php", "w");
		fwrite($fp, $string);
		fclose($fp);
		header("Location: succesful.php");
	}?>
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