<?php 
include('config.php');
?>
<!DOCTYPE html>
<html lang="en-gb" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Step 3 - <?php echo $title ?></title>
        <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon">
        <link rel="apple-touch-icon-precomposed" href="assets/images/apple-touch-icon.png">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link id="data-uikit-theme" rel="stylesheet" href="assets/css/flame.docs.min.css">
        <link rel="stylesheet" href="assets/css/flame.css">
        <link rel="stylesheet" href="assets/css/highlight.css">
        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet" href="assets/css/normalize.css">
        <link rel="stylesheet" href="assets/css/foundation.min.css">
        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/foundation.min.js"></script>
        <script src="assets/js/flame.min.js"></script>
        <script src="assets/js/highlight.js"></script>
        <script src="assets/js/docs.js"></script>
		<style>
		.row{
			max-width:95%;
		}
		</style>
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

                <div class="uk-navbar-brand uk-navbar-center uk-visible-small"><img src="assets/images/logos.png" width="100" height="40" title="<?php echo $title ?>" alt="<?php echo $title ?>"></div>

            </div>
        </nav>
		<br>
		<div class="row">
			<div class="medium-12 columns">
				<form action="./successful" method="post" name="install">
						<fieldset>
						<legend>Install now FlameCMS World Of WarCraft Private Servers</legend>
						<div class="row">please fill all the fields, and make sure that the data it's correct.</div>
						<img src="assets/images/bg-step-3.png" width="100%">
						</fieldset>
						<fieldset>
							<legend>CMS Mysql configuration</legend>
								<div class="row">
									<div class="medium-6 columns">
										<label>Database Host
											<input type="text" name="hostname" placeholder="Database Host" required /></label>
									</div>
									<div class="medium-6 columns">
										<label>Database Username
											<input type="text" name="username" placeholder="Database Username" required /></label>
									</div>
									<div class="medium-6 columns">
										<label>Database CMS
											<input type="text" name="dbname" placeholder="Database CMS" required /></label>
									</div>
									<div class="medium-6 columns">
										<label>Database Password
											<input type="password" name="password" placeholder="Database Password" required /></label>
									</div>
									<div class="medium-6 columns left">
										<label>Database Port
											<input type="text" name="port" placeholder="Database Port" required /></label>
									</div>
						</fieldset>
						<fieldset>
							<legend>Wow Mysql configuration</legend>
								<div class="row">
									<div class="medium-6 columns">
										<label>Database Server Host
										<input type="text" name="serverhostname" placeholder="Database Server Host" required /></label></div>
									<div class="medium-6 columns">
										<label>Database Server Username
										<input type="text" name="serverusername" placeholder="Database Server Username" required /></label></div>
									<div class="medium-6 columns">
										<label>Database Server Password
										<input type="password" name="serverpassword" placeholder="Database Server Password" required /></label></div>
									<div class="medium-6 columns">
										<label>Database Server Port
										<input type="text" name="serverport" placeholder="Database Server Port" required /></label></div>
									<div class="medium-6 columns">
										<label>Auth Database
										<input type="text" name="authdb" placeholder="Auth Database" required /></label></div>
									<div class="medium-6 columns">
										<label>Characters Database
										<input type="text" name="chardb" placeholder="Characters Database" required /></label></div>
									<div class="medium-6 columns left">
										<label>World Database
										<input type="text" name="worlddb" placeholder="World Database" required /></label></div>
								</div>
						</fieldset>
						<fieldset>
							<legend>Wow soap configuration</legend>
								<div class="row">
									<div class="medium-6 columns">
										<label>Soap IP
										<input type="text" name="soap_ip" placeholder="127.0.0.1" required /></label></div>
									<div class="medium-6 columns">
										<label>Soap Port
										<input type="text" name="soap_port" placeholder="7878" required /></label></div>
									<div class="medium-6 columns">
										<label>Soap User
										<input type="text" name="soap_user" placeholder="1#1" required /></label></div>
									<div class="medium-6 columns">
										<label>Soap Password
										<input type="password" name="soap_pass" placeholder="123" required /></label></div>
							</div>
						</fieldset>
						<fieldset>
							<legend>CMS configuration</legend>
								<div class="row">
									<div class="medium-6 columns">
										<label>Domain e.g (http://your.host/ or http://your.host/3.3.5a (if this cms is inside an folder))<input type="text" name="cfgdom" placeholder="http://you.host/3.3.5a" required /></label></div>
									<div class="medium-6 columns">
										<label>realmlist<input type="text" name="realmlist" placeholder="my.realmlist.host" required /></label></div>
									<div class="medium-6 columns left">
										<label>
										Default CMS Language:
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
										</label>
									</div>
								</div>
						</fieldset>
						<fieldset>
							<legend>Admin Account</legend>
							<div class='row'>
								<div class="medium-6 columns">
										<label>First name<input type="text" name="admin_first" placeholder="admin" required /></label></div>
								<div class="medium-6 columns">
										<label>Last name<input type="text" name="admin_last" placeholder="cms" required /></label></div>
								<div class="medium-6 columns">
										<label>Username<input type="text" name="admin_user" placeholder="admin" required /></label></div>
								<div class="medium-6 columns">
										<label>Password<input type="password" name="admin_pass" placeholder="pass" required /></label></div>
								<div class="medium-6 columns left">
										<label>Email<input type="text" name="admin_email" placeholder="email@provider.ex" required /></label></div>
							</div>
						</fieldset>
						<br>
						<div class="row" align="center">
							<button type="submit" name="Submit"  class="u-button uk-button-large uk-button-primary" type="button" data-uk-button><i class="fa fa-check-circle-o"></i> Install FlameCMS Now</button>
						</div>
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
