<?php if (isset($_POST["Submit"])) {
$string = '<?php
/**
* Copyright (C) '.date('Y').' FlameCMS <YET TO BE DETERMINED>
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
define("LANGUAGE",	"'.$_POST['lang'].'");

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
define("TITLE",		"FlameCMS");
define("FACEBOOK", 	"https://www.facebook.com/");
define("TWITTER",  	"https://twitter.com/");
define("YOUTUBE",  	"https://www.youtube.com/");
define("REDDIT",   	"https://www.reddit.com/");

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
define("HOST",		"'. $_POST["hostname"]. '");
define("USER",		"'. $_POST["username"]. '");
define("PASSWORD",	"'. $_POST["password"]. '");
define("PORT",		"'. $_POST["port"]. '");
define("DB",		"'. $_POST["dbname"]. '");
define("AUTH",		"'. $_POST["authdb"]. '");
define("CHARACTERS","'. $_POST["chardb"]. '");
define("WORLD",		"'. $_POST["worlddb"]. '");
/*
|--------------------------------------------------------------------------|
| Info: DO NOT TOUCH THESE UNLESS YOU KNOW WHAT YOU ARE DOING.
|--------------------------------------------------------------------------|
*/
define("BASE_URL",	"'. $_POST["cfgdom"]. '");
define("CORE",		"webkit/");
define("ROOT",		"/");

/*
|--------------------------------------------------------------------------|
| Info: CMS Connection Variables END.
|--------------------------------------------------------------------------|
*/

/*
|--------------------------------------------------------------------------|
| System Core CMS FlameNet.
|--------------------------------------------------------------------------|
*/
require( str_replace("//","/",dirname(__FILE__)."/") ."../system/core.php");';
$fp = fopen("../system/config.php", "w");
fwrite($fp, $string);
fclose($fp);
header("Location: succesful.php");
}
include("config.php");
?>
<!DOCTYPE HTML>
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
									Database Host: <input type="text" name="hostname" placeholder="127.0.0.1" required />
									Database Username: <input type="text" name="username" placeholder="root" required />
									Database Password: <input type="password" name="password" placeholder="password" required />
									Database Port:<input type="text" name="port" placeholder="3306" required />
									<a href="#" title="First, create an empty database with this name!">Website Database:</a>
									<input type="text" name="dbname" placeholder="DB Name" required />
									Auth Database:
									<input type="text" name="authdb" placeholder="Auth DB Name" required />
									Characters Database:
									<input type="text" name="chardb" placeholder="Characters Db Name" required />
									World Database:
									<input type="text" name="worlddb" placeholder="World DB Name" required />
									<span>
									Select Your Language:
									<select name="lang">
									  <option value="cn">简体中文</option>
									  <option value="en" selected="selected">English</option>
									  <option value="es">Espa&ntilde;ol</option>
									  <option value="de">Deutsch</option>
									  <option value="fr">Fran&ccedil;ais</option>
									  <option value="gr">ελληνικά</option>
									  <option value="it">Italiano</option>
									  <option value="ko">한국어</option>
									  <option value="pt">Portugu&ecirc;s</option>
									  <option value="ru">&#1056;&#1091;&#1089;&#1089;&#1082;&#1080;&#1081;</option>
									  <option value="tw">繁體中文</option>
									</select>
									</span>
									<a href="#" title="If you don't have a domain just add the following: http://localhost/">Domain:</a>
									<input type="text" name="cfgdom" required />
									<p><center><input type="submit" name="Submit" value="Install FlameCMS Now"></center></p>
									</form>
								</section>
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