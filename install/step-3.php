<?php if (isset($_POST['Submit'])) {
$string = "<?php
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

/*
|--------------------------------------------------------------------------|
| Info: CMS Connection Variables END.
|--------------------------------------------------------------------------|
*/

/*
|--------------------------------------------------------------------------|
| MAINTENANCE
| DEVELOPMENT_ENVIRONMENT
| DIRECTORY_SEPARATOR
| Dirname __ROOT__
| Special: DO NOT TOUCH!
|--------------------------------------------------------------------------|
| Creates Sessions that are saved so that accounts can stay connected.
|--------------------------------------------------------------------------|
*/
define('MAINTENANCE', false);
define('DEVELOPMENT_ENVIRONMENT', false);
define('DS', DIRECTORY_SEPARATOR);
define('__ROOT__', dirname(dirname(__FILE__)));
define('__WEBKIT__', __ROOT__.DS.'system'.DS.'webkit'.DS.'');

/*
|--------------------------------------------------------------------------|
| System Core CMS FlameNet.
|--------------------------------------------------------------------------|
*/
require(__ROOT__.DS.'system'.DS.'FlameCore.php');
";
$fp = fopen('../system/config.php', 'w');
fwrite($fp, $string);
fclose($fp);
header('Location: successful');
}
include('config.php');
?>
<!DOCTYPE html>
<html lang="en-gb" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Step 3 - <?php echo $title ?></title>
        <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
        <link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon.png">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link id="data-uikit-theme" rel="stylesheet" href="css/flame.docs.min.css">
        <link rel="stylesheet" href="css/flame.css">
        <link rel="stylesheet" href="css/highlight.css">
        <link rel="stylesheet" href="css/animate.css">
        <script src="js/jquery.js"></script>
        <script src="js/flame.min.js"></script>
        <script src="js/highlight.js"></script>
        <script src="js/docs.js"></script>
		<style>
		body{
			background-image: url("images/bg-step-3.png");
			background-repeat: no-repeat;
			background-color: #fff;
		}
		</style>
    </head>

    <body>

        <nav class="tm-navbar uk-navbar uk-navbar-attached">
            <div class="uk-container uk-container-center">

                <a class="uk-navbar-brand uk-hidden-small" href="<?php echo $baseUrl ?>"><img class="uk-margin uk-margin-remove animated hover <?php echo $animate ?>" src="images/logos.png" width="120" data-uk-tooltip="{pos:'bottom-left'}" title="<?php echo $title ?>" alt="<?php echo $title ?>"></a>

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
		<br>
		<div class="uk-container">

			<div class="uk-overflow-container uk-grid-divider">

				<form action="" method="post" name="install" class="uk-form" >
					<fieldset data-uk-margin>
						<legend>Install now FlameCMS World Of WarCraft Private Servers</legend>
						<div class="uk-form-row">
							<input type="text" name="hostname" placeholder="Database Host" required />
						</div>
						<div class="uk-form-row">
							<input type="text" name="username" placeholder="Database Username" required />
						</div>
						<div class="uk-form-row">
							<input type="text" name="dbname" placeholder="Database CMS" required />
						</div>
						<div class="uk-form-row">
							<input type="password" name="password" placeholder="Database Password" required />
						</div>
						<div class="uk-form-row">
							<input type="text" name="port" placeholder="Database Port" required />
						</div>
						<div class="uk-form-row">
							<input type="text" name="serverhostname" placeholder="Database Server Host" required />
						</div>
						<div class="uk-form-row">
							<input type="text" name="serverusername" placeholder="Database Server Username" required />
						</div>
						<div class="uk-form-row">
							<input type="password" name="serverpassword" placeholder="Database Server Password" required />
						</div>
						<div class="uk-form-row">
							<input type="text" name="serverport" placeholder="Database Server Port" required />
						</div>
						<div class="uk-form-row">
							<input type="text" name="authdb" placeholder="Auth Database" required />
						</div>
						<div class="uk-form-row">
							<input type="text" name="chardb" placeholder="Characters Database" required />
						</div>
						<div class="uk-form-row">
							<input type="text" name="worlddb" placeholder="World Database" required />
						</div>
						<div class="uk-form-row">
							<input type="text" name="cfgdom" placeholder="Domain" required />
						</div>
						
						<div class="uk-form-row">
							<input type="text" name="soap_ip" placeholder="Soap IP e.g.: 127.0.0.1" required />
						</div>
						<div class="uk-form-row">
							<input type="text" name="soap_port" placeholder="Soap Port e.g.: 7878" required />
						</div>
						<div class="uk-form-row">
							<input type="text" name="soap_user" placeholder="Soap User e.g.: 1#1" required />
						</div>
						<div class="uk-form-row">
							<input type="text" name="soap_pass" placeholder="Soap Password e.g.: 123" required />
						</div>
						
						<div class="uk-form-row">
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
						</div>
						<br>
						<button type="submit" name="Submit"  class="u-button uk-button-large uk-button-primary" type="button" data-uk-button><i class="fa fa-check-circle-o"></i> Install FlameCMS Now</button>
					</fieldset>
				</form>
			</div>
		</div>
        <div class="tm-section uk-overflow-container">
            <div class="uk-container uk-container-center uk-text-center">

				<div class="uk-overflow-container">

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
