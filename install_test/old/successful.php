<?php
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
