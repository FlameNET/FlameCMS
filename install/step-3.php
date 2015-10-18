<?php include('config.php');?>
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
		<title>Step 3 - <?php echo $title ?></title>
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
						<p class="lead">Install now FlameCMS please fill all the fields, and make sure that the data is correct.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<form class="form-horizontal" method="post" action="successful.php">
					<fieldset>
						<legend>CMS Mysql configuration</legend>
						<div class="col-md-4">
							<div class="form-group">
								<label for="inputEmail" class="control-label">Database Host</label>
								<input type="text" class="form-control" name="hostname" placeholder="Database Host" required />
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="inputEmail" class="control-label">Database Username</label>
								<input type="text" class="form-control" name="username" placeholder="Database Username" required />
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="inputEmail" class="control-label">Database CMS</label>
								<input type="text" class="form-control" name="dbname" placeholder="Database CMS" required />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="inputEmail" class="control-label">Database Password</label>
								<input type="text" class="form-control" name="password" placeholder="Database Password" required />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="inputEmail" class="control-label">Database Port</label>
								<input type="text" class="form-control" name="port" placeholder="Database Port" required />
							</div>
						</div>
					</fieldset>
					<br/>
					<fieldset>
						<legend>Wow Mysql configuration</legend>
						<div class="col-md-3">
							<div class="form-group">
								<label for="inputEmail" class="control-label">Database Host</label>
								<input type="text" class="form-control" name="serverhostname" placeholder="Database Server Host" required />
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="inputEmail" class="control-label">Database Username</label>
								<input type="text" class="form-control" name="serverusername" placeholder="Database Server Username" required />
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="inputEmail" class="control-label">Database Password</label>
								<input type="text" class="form-control" name="serverpassword" placeholder="Database Server Password" required />
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="inputEmail" class="control-label">Database Port</label>
								<input type="text" class="form-control" name="serverport" placeholder="Database Server Port" required />
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="inputEmail" class="control-label">Auth Database</label>
								<input type="text" class="form-control" name="authdb" placeholder="Auth Database" required />
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="inputEmail" class="control-label">Characters Database</label>
								<input type="text" class="form-control" name="chardb" placeholder="Characters Database" required />
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="inputEmail" class="control-label">World Database</label>
								<input type="text" class="form-control" name="worlddb" placeholder="World Database" required />
							</div>
						</div>
					</fieldset>
					<br/>
					<fieldset>
						<legend>Wow soap configuration</legend>
						<div class="col-md-3">
							<div class="form-group">
								<label for="inputEmail" class="control-label">Soap IP</label>
								<input type="text" class="form-control" name="soap_ip" placeholder="127.0.0.1" required />
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="inputEmail" class="control-label">Soap Port</label>
								<input type="text" class="form-control" name="soap_port" placeholder="7878" required />
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="inputEmail" class="control-label">Soap User</label>
								<input type="text" class="form-control" name="soap_user" placeholder="1#1" required />
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="inputEmail" class="control-label">Soap Password</label>
								<input type="password" class="form-control" name="soap_pass" placeholder="123" required />
							</div>
						</div>
					</fieldset>
					<br/>
					<fieldset>
						<legend>CMS configuration</legend>
						<div class="col-md-4">
							<div class="form-group">
								<label for="inputEmail" class="control-label">Domain e.g (http://your.host/(if this cms is inside an folder))</label>
								<input type="text" class="form-control" name="cfgdom" placeholder="http://you.host/3.3.5a" required />
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="inputEmail" class="control-label">Realmlist</label>
								<input type="text" class="form-control" name="realmlist" placeholder="my.realmlist.host" required />
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="inputEmail" class="control-label">Default CMS Language:</label>
								<select class="form-control" id="select" name="lang" required>
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
							</div>
						</div>
					</fieldset>
					<br/>
					<fieldset>
						<legend>Admin Account</legend>
						<div class="col-md-6">
							<div class="form-group">
								<label for="inputEmail" class="control-label">First name</label>
								<input type="text" class="form-control" name="admin_first" placeholder="John" required />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="inputEmail" class="control-label">Last name</label>
								<input type="text" class="form-control" name="admin_last" placeholder="Doe" required />
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="inputEmail" class="control-label">Username</label>
								<input type="text" class="form-control" name="admin_user" placeholder="admin" required />
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="inputEmail" class="control-label">Password</label>
								<input type="password" class="form-control" name="admin_pass" placeholder="pass" required />
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="inputEmail" class="control-label">Email</label>
								<input type="email" class="form-control" name="admin_email" placeholder="email@provider.ex" required />
							</div>
						</div>
					</fieldset>

					<div class="form-group">
						<button type="submit"  class="btn btn-primary" name="Submit">Install FlameCMS Now</button>
						<button type="reset" class="btn btn-default">Cancel</button>
					</div>
				</form>
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